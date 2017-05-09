<?php
	if(!defined('BRAIN_CMS')) 
	{ 
		die('Sorry but you cannot access this file!'); 
	}
	function sendEmailNewPassword()
	{
		global $lang, $email,$dbh,$config;
		if (isset($_POST['sendresetpasswordnow']))
		{	
			$getUserinfo = $dbh->prepare("SELECT id, mail, username FROM users WHERE mail = :mail");
			$getUserinfo->bindParam(':mail', $_POST['useremail']); 
			$getUserinfo->execute();
			$getInfo = $getUserinfo->fetch();
			if ($getUserinfo->RowCount() > 0)
			{
				$resetKeyhash = md5(str_shuffle(1290*3+$getInfo['id']));
				$addResetKey = $dbh->prepare("
				INSERT INTO
				resetpassword
				(userid,resetkey)
				VALUES
				(
				:userid, 
				:resetkey
				)");
				$addResetKey->bindParam(':userid', $getInfo['id']);
				$addResetKey->bindParam(':resetkey', $resetKeyhash);
				$addResetKey->execute();
				$infoUser = $dbh->prepare("SELECT id, username FROM users WHERE id = :id LIMIT 1");
				$infoUser->bindParam(':id', $getInfo['id']);
				$infoUser->execute();
				$getInfoUser = $infoUser->fetch();
				$mailBody = file_get_contents($_SERVER['DOCUMENT_ROOT'].$email['mailTemplate']); 
				$mailBody = str_replace('%logo%', $email['mailLogo'], $mailBody); 
				$mailBody = str_replace('%hotelname%', $config['hotelName'], $mailBody); 
				$mailBody = str_replace('%username%', $getInfoUser['username'], $mailBody); 
				$mailBody = str_replace('%keylink%', '<a href="'.$config['hotelUrl'].'/newpassword/'.$resetKeyhash.'">'.$config['hotelUrl'].'/newpassword/'.$resetKeyhash.'</a>', $mailBody); 
				email($_POST['useremail'],$mailBody);
				return html::errorSucces($lang["FemailIsSend"]);
			}
			else
			{
				return html::error($lang["FnoEmailUser"]);
			}
		}
	}
	function changePassword()
	{
		global $lang, $dbh;
		if (isset($_POST['resetpasswordnow']))
		{
			if (isset($_POST['key']) && !empty($_POST['key']))
			{
				if (isset($_POST['password_reset']) && !empty($_POST['password_reset']))
				{
					if (isset($_POST['password_repeat_reset']) && !empty($_POST['password_repeat_reset']))
					{
						if ($_POST['password_reset'] == $_POST['password_repeat_reset'])
						{
							if (strlen($_POST['password_reset']) >= 6)
							{
								$getResetKey = $dbh->prepare("SELECT resetkey, enable , userid FROM resetpassword WHERE resetkey = :key AND enable = '0' LIMIT 1");
								$getResetKey->bindParam(':key', $_POST['key']);
								$getResetKey->execute();
								$getInfo = $getResetKey->fetch();
								if ($getResetKey->RowCount() > 0)
								{
									$newsPassword = user::hashed($_POST['password_reset']);
									$updatePassword = $dbh->prepare("UPDATE users SET password = :password  WHERE id = :userid");
									$updatePassword->bindParam(':password', $newsPassword); 
									$updatePassword->bindParam(':userid', $getInfo['userid']); 
									$updatePassword->execute(); 
									$disableKey = $dbh->prepare("UPDATE resetpassword SET enable = '1'  WHERE userid = :userid AND resetkey = :resetkey");
									$disableKey->bindParam(':userid', $getInfo['userid']); 
									$disableKey->bindParam(':resetkey', $_POST['key']); 
									$disableKey->execute(); 	
									return Html::errorSucces($lang["FPasschange"]);
								}
								else
								{
									return html::error($lang["FkeyError"]);
								}
							}
							else
							{
								return html::error($lang["Fpasswordshort"]);
							}
						}
						else
						{
							return html::error($lang["Fpasswordsempty"]);
						}
					}
					else
					{
						return html::error($lang["Femailempty"]);
					}
				}
				else
				{
					return html::error($lang["Femailempty"]);
				}
			}
			else
			{
				return html::error($lang["Femailempty"]);
			}
		}
	}
	function email($useEmail, $mailBody)
	{
		global $config,$email;
		require 'system/app/plugins/PHPmailer/PHPMailerAutoload.php';
		$mail = new PHPMailer(); // create a new object
		$mail->IsSMTP(); // send via SMTP
		$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = $email['SMTPSecure']; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = $email['mailServerHost'];
		$mail->Port = $email['mailServerPort'];
		$mail->IsHTML(true);
		$mail->Username = $email['mailUsername'];
		$mail->Password = $email['mailPassword'];
		$mail->setFrom($email['mailUsername'], $config['hotelName']);
		$mail->Subject = 'Reset Password';
		$mail->Body = $mailBody;
		$mail->AddAddress($useEmail);
		$mail->Send();
	}
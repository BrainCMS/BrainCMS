<?php
	if(!defined('BRAIN_CMS')) 
	{ 
		die('Sorry but you cannot access this file!'); 
	}
	function staffApplication()
	{
		Global $lang, $dbh;
		if (isset($_POST['addsollie']))
		{
			
			
				switch ($_POST['functie']) {
					case 1:
					$functieName = "Junior Moderator";
					break;
					case 2:
					$functieName = "Eventteam";
					break;
					case 3:
					$functieName = "Spamteam";
					break;
					case 4:
					$functieName = "Builders";
					break;
					case 5:
					$functieName = "Trial DJ";
					break;
					case 6:
					$functieName = "Pixelaar";
					break;
				}
				$username = User::userData('username');
				$AddSollie = $dbh->prepare("INSERT INTO staffapplication (
				username, 
				realname, 
				skype, 
				age, 
				functie, 
				onlinetime, 
				quarrel, 
				serious, 
				improve,
				experience,
				microphone, 
				ip, 
				date
				) VALUES (
				:username, 
				:realname, 
				:skype, 
				:age, 
				:functieName, 
				:onlinetime, 
				:quarrel, 
				:serious, 
				:improve,
				:experience,
				:microphone, 
				:userip, 
				:time
				)");
				$AddSollie->bindParam(':username', $username);
				$AddSollie->bindParam(':realname', $_POST['realname']);
				$AddSollie->bindParam(':skype', $_POST['skype']);
				$AddSollie->bindParam(':age', $_POST['age']);
				$AddSollie->bindParam(':functieName', $functieName);
				$AddSollie->bindParam(':onlinetime', $_POST['onlinetime']);
				$AddSollie->bindParam(':quarrel', $_POST['quarrel']);
				$AddSollie->bindParam(':serious', $_POST['serious']);
				$AddSollie->bindParam(':improve', $_POST['improve']);
				$AddSollie->bindParam(':experience', $_POST['experience']);
				$AddSollie->bindParam(':microphone', $_POST['microphone']);
				$AddSollie->bindParam(':userip', userIp());
				$AddSollie->bindParam(':time', time());
				$AddSollie->execute();
				return html::errorSucces($lang["Ssend"]);
			}
		
	
	}
?>
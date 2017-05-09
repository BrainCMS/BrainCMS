<?php
	if(!defined('BRAIN_CMS')) 
	{ 
		die('Sorry but you cannot access this file!'); 
	}
	function wardrope()
	{
		global $dbh,$config,$lang,$emuUse;
		if (isset($_POST['editlook']))
		{
			$getUserLook = $dbh->prepare("SELECT * from ".$emuUse['user_wardrobe']." WHERE id = :lookid and user_id = :userid ");
			$getUserLook->bindParam(':lookid', $_POST['lookid']);
			$getUserLook->bindParam(':userid', $_SESSION['id']);
			$getUserLook->execute();
			if ($getUserLook->RowCount() == 1)
			{
				$getUserLookData = $getUserLook->fetch();
				$updateUserLook = $dbh->prepare("UPDATE users SET look = :look WHERE id = :id");
				$updateUserLook->bindParam(':look', $getUserLookData['look']);
				$updateUserLook->bindParam(':id', $_SESSION['id']);
				$updateUserLook->execute(); 
				header('Location: '.$config['hotelUrl'].'/settingsavatar');
			}
			else
			{
				return html::error('This is not allowed!');
			}
		}
	}
?>
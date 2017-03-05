<?php
	if(!defined('BRAIN_CMS')) 
	{ 
		die('Sorry but you cannot access this file!'); 
	}
	function deleteCommand()
	{
		global $dbh,$lang;
		if (isset($_POST['deletecommand']))
		{
			$getCommandUserId = $dbh->prepare("SELECT userid FROM cms_news_message WHERE userid = :id");
			$getCommandUserId->bindParam(':id', $_SESSION['id']);
			$getCommandUserId->execute();
			$getCommandUserId2 = $getCommandUserId->fetch();
			if (User::userData('id') == $getCommandUserId2['userid'] ||  User::userData('rank') >= 3)
			{
				$deleteCommand = $dbh->prepare("DELETE FROM cms_news_message WHERE hash= :hash AND newsid = :newsid");
				$deleteCommand->bindParam(':hash', $_POST['hashid']);
				$deleteCommand->bindParam(':newsid', $_GET['id']);
				$deleteCommand->execute();
				return Html::errorSucces("Nieuws reactie verwijderd");
			}
			else
			{
				return Html::error("Er is iets mis gegaan!");
			}
		}
	}
?>	
<?php
	if(!defined('BRAIN_CMS')) 
	{ 
		die('Sorry but you cannot access this file!'); 
	}
	/* 
		Functions list Class Game.
		--------------- 
		sso();
		usersOnline();
		homeRoom();
	*/
	class Game 
	{
		public static function sso($page)
		{
			global $dbh,$config;
			$sessionKey  = 'Brain-'.$config['brainversion'].'-'.substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 25).'-SSO';
			if($page == 'client')
			{
				$stmt = $dbh->prepare("UPDATE users SET auth_ticket = :sso , last_online = :timenow WHERE id = :id");
				$stmt->bindParam(':timenow',  strtotime("now"));
				$stmt->bindParam(':id', $_SESSION['id']);
				$stmt->bindParam(':sso', $sessionKey);
				$stmt->execute();
			}
			else if ($page == 'register')
			{
				return $sessionKey;
			}
		}
		Public static function usersOnline()
		{
			global $dbh;
			$userCount = $dbh->prepare("SELECT online FROM users WHERE online = '1'");
			$userCount->execute();
			return $userCount->RowCount();
		}
		public static function homeRoom()
		{
			global $dbh, $hotel;
			$stmt = $dbh->prepare("UPDATE users SET home_room = :homeroom WHERE id = :id");
			$stmt->bindParam(':homeroom', $hotel['homeRoom']);
			$stmt->bindParam(':id', $_SESSION['id']);
			$stmt->execute();
		}
	} 
?>
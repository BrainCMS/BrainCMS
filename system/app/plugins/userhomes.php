<?php
	if(!defined('BRAIN_CMS')) 
	{ 
		die('Sorry but you cannot access this file!'); 
	}
	function userHome($key)
	{
		global $dbh,$config;
		if ($config['hotelEmu'] == 'arcturus')
		{
			if (in_array($key, array('activity_points', 'vip_points')))
			{
				switch($key)
				{
					case "activity_points":
					$key = '0';
					break;
					case "vip_points":
					$key = '5';
					break;
					default:
					//Nothing
					break;
				}
				$getUser = $dbh->prepare("SELECT id,username FROM users WHERE username = :user");
				$getUser->bindParam(':user', $_GET['user']);
				$getUser->execute();
				$usersSql = $getUser->fetch();
				$getUserCurrency = $dbh->prepare("SELECT ".$key.",user_id,type,amount FROM users_currency WHERE user_id = :id AND type = :type");
				$getUserCurrency->bindParam(':type', $key);
				$getUserCurrency->bindParam(':id', $usersSql['id']);
				$getUserCurrency->execute();
				$getUserCurrencyData = $getUserCurrency->fetch();
				echo $getUserCurrencyData['amount'];
			}
			else
			{	
				$getUser = $dbh->prepare("SELECT id,username,motto,credits,look,account_created,last_online,mail FROM users WHERE username = :user");
				$getUser->bindParam(':user', $_GET['user']);
				$getUser->execute();
				$usersSql = $getUser->fetch();
				return $usersSql[$key];
			}
		}
		else{
			$getUser = $dbh->prepare("SELECT id,username,motto,credits,vip_points,activity_points,look,account_created,last_online,mail FROM users WHERE username = :user LIMIT 1");
			$getUser->bindParam(':user',$_GET['user']);
			$getUser->execute();
			$usersSql = $getUser->fetch();
			if($usersSql['credits'] == "") {
				exit();
			}
			return filter($usersSql[$key]);
		}
	}
?>
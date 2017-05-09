<?php
	if(!defined('BRAIN_CMS')) 
	{ 
		die('Sorry but you cannot access this file!'); 
	}
	/* 
		Functions list Class Admin.
		--------------- 
		error();
		gelukt();
		CheckRank();
		staffpin();
		staffCheck();
		UpdateUser();
		UpdateUserOfTheWeek();
		UpdateNews();
		searchUser();
		searchUserOfTheWeek();
		EditUser();
		EditUserOfTheWeek();
		EditNews();
		LookSollie();
		DeleteNews();
		DeleteSollie();
		DeleteBans();
		PostNews();
	*/
	Class Admin
	{
		public static function error($errorName)
		{
			echo "<div class=\"alert alert-block alert-danger \"><strong>" . $errorName . "</div>";
		}
		public static function succeed($errorName)
		{
			echo "<div class=\"alert alert-block alert-success \"><strong>" . $errorName . "</div>";
		}
		public static function CheckRank($rank)
		{
			global $config;
			{
				if (User::userData('rank') <= $rank)
				{
					header('Location: '.$config['hotelUrl'].'/index');	
					exit();
				}
			}
		}
		public static function UpdateUser()
		{
			global $dbh,$config;
			if (isset($_POST['update'])) 
			{
				if ($config['hotelEmu'] == 'arcturus')
				{
					$upateUser = $dbh->prepare("UPDATE users SET 
					motto=:motto,
					username=:name,
					mail=:mail,
					credits=:credits,
					teamrank=:teamrank,
					rank=:rank
					WHERE username = :name");
					$upateUser->bindParam(':motto', $_POST['motto']); 
					$upateUser->bindParam(':name', $_POST['naam']); 
					$upateUser->bindParam(':mail', $_POST['mail']); 
					$upateUser->bindParam(':credits', $_POST['credits']); 
					$upateUser->bindParam(':teamrank', $_POST['teamrank']); 
					$upateUser->bindParam(':rank', $_POST['rank']); 
					$upateUser->execute(); 
					$getUserCurrency = $dbh->prepare("SELECT * FROM users WHERE username=:username LIMIT 1");
					$getUserCurrency->bindParam(':username', $_POST['naam']);
					$getUserCurrency->execute();
					$getUserCurrencyData = $getUserCurrency->fetch();
					$updateUserCurrencyDuckets = $dbh->prepare("UPDATE users_currency SET 
					amount=:activity_points
					WHERE user_id = :user_id and type = 0");
					$updateUserCurrencyDuckets->bindParam(':user_id', $getUserCurrencyData['id']);
					$updateUserCurrencyDuckets->bindParam(':activity_points', $_POST['activity_points']);
					$updateUserCurrencyDuckets->execute(); 
					$updateUserCurrencyDiamonds = $dbh->prepare("UPDATE users_currency SET 
					amount=:vip_points
					WHERE user_id = :user_id and type = 5");
					$updateUserCurrencyDiamonds->bindParam(':user_id', $getUserCurrencyData['id']);
					$updateUserCurrencyDiamonds->bindParam(':vip_points', $_POST['vip_points']); 
					$updateUserCurrencyDiamonds->execute(); 
					Admin::succeed("The user is saved!");
				}
				else
				{
					$upateUser = $dbh->prepare("UPDATE users SET 
					motto=:motto,
					username=:name,
					mail=:mail,
					credits=:credits,
					vip_points=:vip_points,
					activity_points=:activity_points,
					teamrank=:teamrank,
					rank=:rank
					WHERE username = :name");
					$upateUser->bindParam(':motto', $_POST['motto']); 
					$upateUser->bindParam(':name', $_POST['naam']); 
					$upateUser->bindParam(':mail', $_POST['mail']); 
					$upateUser->bindParam(':credits', $_POST['credits']); 
					$upateUser->bindParam(':vip_points', $_POST['vip_points']); 
					$upateUser->bindParam(':activity_points', $_POST['activity_points']); 
					$upateUser->bindParam(':teamrank', $_POST['teamrank']); 
					$upateUser->bindParam(':rank', $_POST['rank']); 
					$upateUser->execute(); 
					Admin::succeed("The user is saved!");
				}
			}
		}
		public static function UpdateUserOfTheWeek()
		{
			global $dbh;
			if (isset($_POST['update'])) 
			{
				$getUserData = $dbh->prepare("SELECT id,username FROM users WHERE username = :name");
				$getUserData->bindParam(':name', $_POST['naam']); 
				$getUserData->execute(); 
				$upateUser2 = $getUserData->fetch();
				if ($upateUser = $dbh->prepare("UPDATE uotw SET userid=:userdata,text=:txt"))
				{
					$upateUser->bindParam(':userdata', $upateUser2['id']); 
					$upateUser->bindParam(':txt', $_POST['uftwtext']); 
					$upateUser->execute();
					Admin::succeed("The user now has UOTW");
				}
				else 
				{
					Admin::error("Did not work!");
				}  
			}
		}
		public static function UpdateNews()
		{
			global $dbh;
			if (isset($_POST['update'])) 
			{
				$editNews = $dbh->prepare("UPDATE cms_news SET 
				id=:id,
				title=:title,
				shortstory=:shortstory,
				longstory=:longstory,
				image=:topstory
				WHERE id = :id");
				$editNews->bindParam(':title', $_POST['title']);
				$editNews->bindParam(':shortstory', $_POST['shortstory']);
				$editNews->bindParam(':topstory', $_POST['topstory']);
				$editNews->bindParam(':longstory', $_POST['longstory']);
				$editNews->bindParam(':id', $_POST['id']);
				$editNews->execute();
				Admin::succeed("News message edited!");
			}
		}
		public static function searchUser()
		{
			global $dbh,$config;
			if(isset($_POST['zoek'])) {	
				$searchUser = $dbh->prepare("SELECT * FROM users WHERE username = :user");
				$searchUser->bindParam(':user', $_POST['user']); 
				$searchUser->execute();
				if ($searchUser->RowCount() == 1)
				{
					Admin::succeed('User '.$_POST['user'].' found! Click <a href ="'.$config['hotelUrl'].'/adminpan/gebruiker/'.$_POST['user'].'">here</a> in order to go to his account.');
				}
				else
				{
					Admin::error("User ".$_POST['user']." not found!");
				}
			}
		}
		public static function searchUserOfTheWeek()
		{
			global $dbh,$config;
			if(isset($_POST['searching'])) {	
				$searchUser = $dbh->prepare("SELECT * FROM users WHERE username = :user");
				$searchUser->bindParam(':user', $_POST['user']); 
				$searchUser->execute();
				if ($searchUser->RowCount() == 1)
				{
					Admin::succeed(''.$_POST['user'].' Found! Klik <a href ="'.$config['hotelUrl'].'/adminpan/giveuseroftheweek/'.$_POST['user'].'">here</a> in order to give this user '.$config['hotelName'].' of the week!');
				}
				else
				{
					Admin::error("User ".$_POST['user']." not found!");
				}
			}
			if(isset($_POST['delete'])) {	
				$upateUser = $dbh->prepare("UPDATE uotw SET userid = '0' ,text = 'empty'");
				$upateUser->execute();
				Admin::succeed("You have removed UOTW");
			}
		}
		public static function EditUser($variable)
		{
			global $dbh,$config;
			if (isset($_GET['user'])) {
				if ($config['hotelEmu'] == 'arcturus')
				{
					if ( in_array($variable, array('activity_points', 'vip_points')) )
					{
						switch($variable)
						{
							case "activity_points":
							$variable = '0';
							break;
							case "vip_points":
							$variable = '5';
							break;
							default:
							break;
						}
						$getUserCurrency = $dbh->prepare("SELECT * FROM users WHERE username=:username LIMIT 1");
						$getUserCurrency->bindParam(':username', $_GET['user']);
						$getUserCurrency->execute();
						$getUserCurrencyData = $getUserCurrency->fetch();
						$stmt = $dbh->prepare("SELECT ".$variable.",user_id,type,amount FROM users_currency WHERE user_id = :id AND type = :type");
						$stmt->bindParam(':id', $getUserCurrencyData['id']);
						$stmt->bindParam(':type', $variable);
						$stmt->execute();
						if ($stmt->RowCount() > 0)
						{
							$row = $stmt->fetch();
							return $row['amount'];
						}
						else
						{
							return '0';
						}
					}
					else
					{	
						$getUser = $dbh->prepare("SELECT * FROM users WHERE username=:username LIMIT 1");
						$getUser->bindParam(':username', $_GET['user']);
						$getUser->execute();
						if ($getUser->RowCount() == 1) 
						{
							$user = $getUser->fetch();
							return filter($user[$variable]);
						} 
						else 
						{
							Admin::error("user not found!"); exit;
						}
					}
				}
				else
				{
					$getUser = $dbh->prepare("SELECT * FROM users WHERE username=:username LIMIT 1");
					$getUser->bindParam(':username', $_GET['user']);
					$getUser->execute();
					if ($getUser->RowCount() == 1) 
					{
						$user = $getUser->fetch();
						return filter($user[$variable]);
					} 
					else 
					{
						Admin::error("user not found!"); exit;
					}
				}
			}
		}
		public static function EditUserOfTheWeek($variable)
		{
			global $dbh;
			if (isset($_GET['user'])) {
				$getUser = $dbh->prepare("SELECT * FROM users WHERE username=:username LIMIT 1");
				$getUser->bindParam(':username', $_GET['user']);
				$getUser->execute();
				if ($getUser->RowCount() == 1) 
				{
					$user = $getUser->fetch();
					return filter($user[$variable]);
				} 
				else 
				{
					Admin::error("user not found!"); exit;
				}
			}
		}
		public static function EditNews($variable)
		{
			global $dbh;
			if (isset($_GET['news'])) 
			{
				$getNews = $dbh->prepare("SELECT * FROM cms_news WHERE id=:newsid LIMIT 1");
				$getNews->bindParam(':newsid', $_GET['news']);
				$getNews->execute();
				if ($getNews->RowCount() == 1) 
				{
					$news = $getNews->fetch();
					return $news[$variable];
				} 
				else 
				{
					Admin::error("No news found!"); exit;
				}
			}
		}
		public static function LookSollie($variable)
		{
			Global $dbh,$config;
			if (isset($_GET['look'])) 
			{
				$getSollie = $dbh->prepare("SELECT * FROM staffapplication WHERE id=:look LIMIT 1");
				$getSollie->bindParam(':look', $_GET['look']);
				$getSollie->execute();
				if ($getSollie->RowCount() == 1) 
				{
					$data = $getSollie->fetch();
					$datenow = date('d-m-Y', $data['date']);
					return filter($data[$variable]);
				} 
				else 
				{
					header('Location: '.$config['hotelUrl'].'/adminpan/sollie');
				}
			}
		}
		public static function DeleteNews()
		{
			Global $dbh;
			if(isset($_GET['delete'])) 
			{ 
				$deleteNews = $dbh->prepare("DELETE FROM cms_news WHERE id=:newsid");
				$deleteNews->bindParam(':newsid', $_GET['delete']);
				$deleteNews->execute();
				Admin::succeed('The news message was deleted!');
			}
		}
		public static function DeleteSollie()
		{
			Global $config, $dbh;
			if(isset($_GET['delete'])) 
			{ 
				$deleteSollie = $dbh->prepare("DELETE FROM staffapplication WHERE id=:newsid");
				$deleteSollie->bindParam(':newsid', $_GET['delete']);
				$deleteSollie->execute();
				Admin::succeed('Application removed!');
				header('Location: '.$config['hotelUrl'].'/adminpan/sollie');
			}
		}
		public static function DeleteBans()
		{
			Global $dbh;
			if(isset($_GET['delete'])) 
			{ 
				$deleteBan = $dbh->prepare("DELETE FROM bans WHERE id=:newsid");
				$deleteBan->bindParam(':newsid', $_GET['delete']);
				$deleteBan->execute();
				Admin::succeed('Ban removed!');
			}
		}
		public static function PostNews()
		{
			global $dbh;
			if (isset($_POST['postnews']))
			{
				$_SESSION['title'] = $_POST['title'];
				$_SESSION['news'] = $_POST['news'];
				if (!empty($_POST['title']))
				{
					if (!empty($_POST['news']))
					{
						$postNews = $dbh->prepare("
						INSERT INTO cms_news(title,image,shortstory,longstory,author,date,type,roomid,updated)
						VALUES
						(
						:title,
						:topstory, 
						:slogan,
						:news,
						:id,
						:time,
						'1',
						'1',
						'1'
						)");
						$postNews->bindParam(':title', $_POST['title']);
						$postNews->bindParam(':slogan', $_POST['slogan']);
						$postNews->bindParam(':topstory', $_POST['topstory']);
						$postNews->bindParam(':news', $_POST['news']);
						$postNews->bindParam(':id', $_SESSION['id']);
						$postNews->bindParam(':time', strtotime('now'));
						$postNews->execute();
						$_SESSION['title'] = '';
						$_SESSION['kort'] = '';
						$_SESSION['news'] ='';
						Admin::succeed("News item is posted!");
					}
					else
					{
						Admin::error("News item is empty!");
						return;
					}
				}
				else
				{
					Admin::error("There is no title!");
					return;
				}
			}
			else
			{
			}
		}
	}						
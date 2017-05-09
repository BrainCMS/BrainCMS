<?php
	if(!defined('BRAIN_CMS')) 
	{ 
		die('Sorry but you cannot access this file!'); 
	}
	/* 
		Functions list Class Html.
		--------------- 
		checkBan();
		page();
		pageHK();
		error();
		errorSucces();
		loadPlugins();
	*/
	class Html 
	{
		private static function checkBan($ip, $username = null)
		{
			global $dbh;
			$ipBan = $dbh->prepare("SELECT bantype,expire FROM bans WHERE bantype = 'ip' && value = :ip");
			$ipBan->bindParam(':ip', $ip);
			$ipBan->execute();
			if ($ipBan->RowCount() === 1)
			{
				$queryIp = $dbh->prepare("SELECT bantype,expire FROM bans WHERE bantype = 'ip' && value = :ip");
				$queryIp->bindParam(':ip', $ip);
				$queryIp->execute();
				while ($rowIp = $queryIp->fetch())
				{
					if ($rowIp['expire'] >= strtotime('now'))
					{
						return true;
						
					}
					else
					{
						return false;
					}
				}
			}
			else if ($username !== null)
			{
				$userBan = $dbh->prepare("SELECT bantype,expire FROM bans WHERE bantype = 'user' && value = :username");
				$userBan->bindParam(':username', $username);
				$userBan->execute();
				if ($userBan->RowCount() === 1)
				{
					$userBan = $dbh->prepare("SELECT bantype,expire FROM bans WHERE bantype = 'user' && value = :username");
					$userBan->bindParam(':username', $username);
					$userBan->execute();
					while ($rowUser = $userBan->fetch())
					{
						if ($rowUser['expire'] >= strtotime('now'))
						{
							return true;
						}
						else
						{
							return false;
						}
					}
				}
			}
			else
			{
				return false;
			}
		}
		public static function page()
		{
			global $dbh, $emu, $config, $lang, $hotel, $version,$emuUse;
			if (defined('PHP_VERSION') && PHP_VERSION >= 5.6) 
			{
				true;
			} 
			else 
			{
				echo 'PHP version is lower then PHP 5.6 your PHP version is '.PHP_VERSION.'';
				exit;
			}
			if (self::checkBan(userIp(), User::userData('username')))
			{
				include Z . H . S .'/banned.php';
				exit();
			}
			else
			{
				if(isset($_GET['url']))
				{
					$page = filter($_GET['url']);
					$allowed = array(); 
					foreach (new DirectoryIterator(Z . H . S) as $file) { 
						$file = explode('.php', $file);
						$allowed[] = $file[0];
					} 
					if($page)
					{ 
						if (!$config['maintenance'] == true || isset($_SESSION['adminlogin'])	){
							$fileExists = Z . H . S ."/{$page}.php";
							if(file_exists($fileExists))
							{
								$content = in_array($page, $allowed) ? include(Z . H . S ."/{$page}.php") : '';
							} 
							else 
							{
								include Z . H . S .'/404.php'; 
							}
						}
						else
						{
							if ($page == 'adminlogin')
							{
								include A . I . 'adminlogin.php'; 
							}
							else
							{
								include A . I . 'index.php'; 
							}
						}
					} 
					else 
					{
						include Z . H . S .'/pages/index.php';
					}
				} 
				else 
				{
					include A . H . S . '/pages/index.php';
					header('Location: '.$config['hotelUrl'].'/index');
				}
			}
			if(loggedIn()){ 
				switch($page)
				{
					case "index":
					case "register":
					header('Location: '.$config['hotelUrl'].'/me');
					break;
					case "changename";
					if ($config['facebookLogin'] == true)
					{
						if (User::userData('fbenable') >= 1)
						{
							header('Location: '.$config['hotelUrl'].'/me');	
							exit();
						}
					}
					break;
					case "game":
					case "client":
					case "hotel":
					if ($config['facebookLogin'] == true)
					{
						if (User::userData('fbenable') == 0)
						{
							header('Location: '.$config['hotelUrl'].'/changename');	
							exit();
						}
					}
					break;
					default:
					//Nothing
					break;
				}
			}
			if(!loggedIn()){ 
				switch($page)
				{
					case "me":
					case "settingspassword":
					case "settingsemail":
					case "settingshotel":
					case "sollicitaties":
					case "stats":
					case "game":
					case "client":
					case "hotel":
					case "pin":
					case "password":
					case "community":
					case "news":
					case "staff":
					case "teams":
					case "advertentie_tips":
					case "online":
					case "home/":
					case "changename":
					header('Location: '.$config['hotelUrl'].'/index');
					break;
					default:
					//Nothing
					break;
				}
			}
		}
		public static function pageHK()
		{
			global $dbh, $config, $lang, $hotel, $version;
			if(isset($_GET['url']))
			{
				$pageHK = filter($_GET['url']);
				$allowed = array(); 
				foreach (new DirectoryIterator(J) as $file) { 
					$file = explode('.php', $file);
					$allowed[] = $file[0];
				} 
				if($pageHK)
				{ 
					
					$fileExists = J ."{$pageHK}.php";
					if(file_exists(filter($fileExists)))
					{
						$content = in_array($pageHK, $allowed) ? include(J ."/{$pageHK}.php") : '';
					} 
					else 
					{
						include J . "/404.php"; 
					}
				} 
				else 
				{
					include J . "/dash.php";
				}
			} 
			else 
			{
				include J . "dash.php";
				header('Location: '.$config['hotelUrl'].'/adminpan/dash');
			}
			switch($pageHK)
			{
				case $pageHK:
				admin::CheckRank(3);
				break;
				default:
				//Nothing
				break;
			}
		} 
		public static function error($errorName)
		{
			echo '<div class="error" style="display: block;">'.$errorName.'</div>';
		}
		public static function errorSucces($succesMessage)
		{
			echo '<div class="errorSucces" style="display: block;">'.$succesMessage.'</div>';
		}
		public static function loadPlugins()
		{
			$pluginDir = A . B . K;
			foreach (glob($pluginDir."*.php") as $filename) {
				require_once $pluginDir."".basename($filename)."";
			}
		}
	}
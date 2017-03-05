<?php
	if(!defined('BRAIN_CMS')) 
	{ 
		die('Sorry but you cannot access this file!'); 
	}
	function staffPinHk()
	{
		global $dbh,$config, $lang;
		if (isset($_POST['loginPin']))
		{
			if (!empty($_POST['PINbox']))
			{
				$stmt = $dbh->prepare("SELECT pin FROM users WHERE id = :id");
				$stmt->bindParam(':id', $_SESSION['id']);
				$stmt->execute();
				$pin = $stmt->fetch();
				if ($_POST['PINbox'] == $pin['pin'])
				{
					$_SESSION['staffCheckHk'] = '1';
					header('Location: '.$config['hotelUrl'].'/adminpan/dash');
				}
				else{
					echo $lang["Ppinwrong"];
				}
			}
			else{
				echo $lang["Pnopin"];
			}
		}
	}
	function staffCheckHk()
	{
		global $config;
		if($config['staffCheckHk'] == true)
		{
			if (user::userData('rank') > $config['staffCheckHkMinimumRank'])
			{
				if (empty($_SESSION['staffCheckHk'])) 
				{ 
					header('Location: '.$config['hotelUrl'].'/adminpan/pin');
					exit;
				}
			}
		}
	}
?>
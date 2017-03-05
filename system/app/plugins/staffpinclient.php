<?php
	if(!defined('BRAIN_CMS')) 
	{ 
		die('Sorry but you cannot access this file!'); 
	}
	function staffPin()
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
					$_SESSION['staffCheck'] = '1';
					header('Location: '.$config['hotelUrl'].'/client');
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
	function staffCheck()
	{
		global $config,$hotel;
		if($hotel['staffCheckClient'] == true)
		{
			if (User::userData('rank') >= $hotel['staffCheckClientMinimumRank'])
			{
				if (empty($_SESSION['staffCheck'])) 
				{ 
					header('Location: '.$config['hotelUrl'].'/pin');
					exit;
				}
			}
		}
	}
?>
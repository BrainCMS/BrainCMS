<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(1); // Turn off all error reporting
	if(!defined('BRAIN_CMS')) 
	{ 
		die('Sorry but you cannot access this file!'); 
	}
	function userlike($id)
	{
		if (loggedIn())
		{
			global $dbh,$config;
			if ($config['userLikeEnable'] == true)
			{
				$getUserID = $dbh->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");
				$getUserID->bindParam(':id', $id);
				$getUserID->execute();
				$row = $getUserID->fetch();
				$getUserLikes = $dbh->prepare("SELECT*FROM users_like WHERE likefrom = :id AND userid = :userid LIMIT 1");
				$getUserLikes->bindParam(':id', $_SESSION['id']);
				$getUserLikes->bindParam(':userid', $row['id']);
				$getUserLikes->execute();
				if ($getUserLikes->RowCount() == 0)
				{
					$userliked = '0';
					$userlikedIcon = 'up';
				}
				else
				{
					$userliked = '1';
					$userlikedIcon = 'down';
				}
				if ($_GET['url'] == 'news')
				{
					$likeurl=  '<a href="'.$config['hotelUrl'].'/index.php?url='.$_GET['url'].'&id='.$_GET['id'].'&respect'.$userliked.'='.$row['id'].'&username='.$row['username'].'">';
					$likeurlBack = ''.$config['hotelUrl'].'/'.$_GET['url'].'/'.$_GET['id'].'';
				}
				else if ($_GET['url'] == 'home')
				{
					$likeurl=  '<a href="'.$config['hotelUrl'].'/index.php?url='.$_GET['url'].'&user='.$_GET['user'].'&respect'.$userliked.'='.$row['id'].'&username='.$row['username'].'">';
					$likeurlBack = ''.$config['hotelUrl'].'/'.$_GET['url'].'/'.$_GET['user'].'';
				}
				else
				{
					$likeurl=  '<a href="'.$config['hotelUrl'].'/index.php?url='.$_GET['url'].'&respect'.$userliked.'='.$row['id'].'&username='.$row['username'].'">';
					$likeurlBack= ''.$config['hotelUrl'].'/'.$_GET['url'].'';
				}
				echo'<b>(<font color="#00C103">';
				echo $row['user_likes'];
				echo '</font>)</b>'.$likeurl.' <img src="'.$config['hotelUrl'].'/templates/'.$config['skin'].'/style/images/icons/'.$userlikedIcon.'.png"></a>';
				if (isset($_GET['respect0']))
				{
					if ($_GET['username'] == $row['username'])
					{
						if ($getUserLikes->RowCount() == 0)
						{
							$giveUserLike = $dbh->prepare("
							INSERT INTO
							users_like
							(userid,likefrom)
							VALUES
							(
							:userid, 
							:likefrom
							)");
							$giveUserLike->bindParam(':userid', $row['id']);
							$giveUserLike->bindParam(':likefrom', $_SESSION['id']);
							$giveUserLike->execute();
							$giveLikePlus = '1';
							$giveUserLikeTable = $dbh->prepare("
							UPDATE users SET 
							user_likes=user_likes + :giveLikePlus 
							WHERE 
							id=:id
							LIMIT 1");
							$giveUserLikeTable->bindParam(':id',  $row['id']);
							$giveUserLikeTable->bindParam(':giveLikePlus', $giveLikePlus);
							$giveUserLikeTable->execute();
							header('Location: '.$likeurlBack.'');
						}	
						else
						{
							header('Location: '.$likeurlBack.'');
						}	
					}	
				}
				if (isset($_GET['respect1']))
				{
					if ($_GET['username'] == $row['username'])
					{
						if (!$getUserLikes->RowCount() == 0)
						{
							$RemoveUserLike = $dbh->prepare("DELETE FROM users_like WHERE likefrom=:likefrom AND userid = :userid");
							$RemoveUserLike->bindParam(':likefrom', $_SESSION['id']);
							$RemoveUserLike->bindParam(':userid', $row['id']);
							$RemoveUserLike->execute();
							$removeLikeMin = '1';
							$removeUserLikeTable = $dbh->prepare("
							UPDATE users SET 
							user_likes=user_likes - :removeLikeMin
							WHERE 
							id=:id
							LIMIT 1");
							$removeUserLikeTable->bindParam(':id',  $row['id']);
							$removeUserLikeTable->bindParam(':removeLikeMin', $removeLikeMin);
							$removeUserLikeTable->execute();
							header('Location: '.$likeurlBack.'');
						}
						else
						{
							header('Location: '.$likeurlBack.'');
						}
					}
				}
			}
		}
	}
?>
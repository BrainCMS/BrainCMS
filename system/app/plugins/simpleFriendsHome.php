<?php
	if(!defined('BRAIN_CMS')) 
	{ 
		die('Sorry but you cannot access this file!'); 
	}
	function friendListHome()
	{
		global $dbh,$config;
		$getUserFrend = userHome('id');
		echo '<link rel="stylesheet" href="'.$config['hotelUrl'].'/templates/brain/style/css/simplefriends.css?v=2" type="text/css">';
		//INFORMATIE VAN TYPE 1
		
		$getRelations1 = $dbh->prepare("SELECT * FROM user_relationships WHERE user_id = :id AND type = '1' ORDER BY RAND()");
		$getRelations1->bindParam(':id', $getUserFrend);
		$getRelations1->execute();
		$infoRelations1 = $getRelations1->fetch();
		$infoRelationsNum = $getRelations1->rowCount();
		$getUser = $dbh->prepare("SELECT id,username,look,online FROM users WHERE id = :targetId");
		$getUser->bindParam(':targetId', $infoRelations1['target']);
		$getUser->execute();
		$infoFriends = $getUser->fetch();
		if($infoFriends['online'] == '1'){
			$friend_online = "<span class='friend_online'>online</span>";
			}else{
			$friend_online = "<span class='friend_online'>offline</span>";
		}
		if($infoRelationsNum == '0'){
			echo '
			<div class="friend_1" style="padding: 10px;">
			'.userHome('username').' has no friends in this category!
			<img src="'.$config['hotelUrl'].'/templates/brain/style/images/icons/iconlove.png" class="friend_icon" style="margin-top: -10px;float: right;">
			</div>
			';
			}else{
			if($infoRelationsNum == '1'){
				$infoNumtext = "Make more friends in this category :)";
				}else{
				$infoRelationsNum = $infoRelationsNum - 1;
				$infoNumtext = "".userHome('username')." has <b>" . $infoRelationsNum . "</b> friend more in the category";
			}
			echo '
			<div class="friend_1"">
			<table>
			<tr>
			<td>
			<div class="circle_friend">
			<div class="friend_head" style="background: url(https://avatar-retro.com/habbo-imaging/avatarimage?figure='. filter($infoFriends['look']) .'&head_direction=2&action=wav&headonly=1)">
			</div>
			</div>
			</td>
			<td>
			<img src="'.$config['hotelUrl'].'/templates/brain/style/images/icons/iconlove.png" class="friend_icon">
			</td>
			<td>
			'. $infoFriends['username'] .'
			</td>
			<td style="width: 100%;">
			'.  $friend_online .'
			</td>
			</tr>
			</table>
			<div class="numRows_friend">
			'. $infoNumtext .'
			</div>
			</div>
			';
		}
		//INFORMATIE VAN TYPE 2
		$getRelations1 = $dbh->prepare("SELECT * FROM user_relationships WHERE user_id = :id AND type = '2' ORDER BY RAND()");
		$getRelations1->bindParam(':id', $getUserFrend);
		$getRelations1->execute();
		$infoRelations1 = $getRelations1->fetch();
		$infoRelationsNum = $getRelations1->rowCount();
		$getUser = $dbh->prepare("SELECT id,username,look,online FROM users WHERE id = :targetId");
		$getUser->bindParam(':targetId', $infoRelations1['target']);
		$getUser->execute();
		$infoFriends = $getUser->fetch();
		if($infoFriends['online'] == '1'){
			$friend_online = "<span class='friend_online'>online</span>";
			}else{
			$friend_online = "<span class='friend_online'>offline</span>";
		}
		if($infoRelationsNum == '0'){
			echo '
			<div class="friend_2" style="padding: 10px;">
			'.userHome('username').' has no no friends in this category!
			<img src="'.$config['hotelUrl'].'/templates/brain/style/images/icons/iconbest.png" class="friend_icon" style="margin-top: -10px;float: right;">
			</div>
			';
			}else{
			if($infoRelationsNum == '1'){
				$infoNumtext = "Make more friends in this category :)";
				}else{
				$infoRelationsNum = $infoRelationsNum - 1;
				$infoNumtext = "".userHome('username')." has <b>" . $infoRelationsNum . "</b> friend more in the category";
			}
			echo '
			<div class="friend_2"">
			<table>
			<tr>
			<td>
			<div class="circle_friend">
			<div class="friend_head" style="background: url(https://avatar-retro.com/habbo-imaging/avatarimage?figure='. filter($infoFriends['look']) .'&head_direction=2&action=wav&headonly=1)">
			</div>
			</div>
			</td>
			<td>
			<img src="'.$config['hotelUrl'].'/templates/brain/style/images/icons/iconbest.png" class="friend_icon">
			</td>
			<td>
			'. $infoFriends['username'] .'
			</td>
			<td style="width: 100%;">
			'.  $friend_online .'
			</td>
			</tr>
			</table>
			<div class="numRows_friend">
			'. $infoNumtext .'
			</div>
			</div>
			';
		}
		//INFORMATIE VAN TYPE 3
		$getRelations1 = $dbh->prepare("SELECT * FROM user_relationships WHERE user_id = :id AND type = '3' ORDER BY RAND()");
		$getRelations1->bindParam(':id', $getUserFrend);
		$getRelations1->execute();
		$infoRelations1 = $getRelations1->fetch();
		$infoRelationsNum = $getRelations1->rowCount();
		$getUser = $dbh->prepare("SELECT id,username,look,online FROM users WHERE id = :targetId");
		$getUser->bindParam(':targetId', $infoRelations1['target']);
		$getUser->execute();
		$infoFriends = $getUser->fetch();
		if($infoFriends['online'] == '1'){
			$friend_online = "<span class='friend_online'>online</span>";
			}else{
			$friend_online = "<span class='friend_online'>offline</span>";
		}
		if($infoRelationsNum == '0'){
			echo '
			<div class="friend_3" style="padding: 10px;">
			'.userHome('username').' has no friends in this category!
			<img src="'.$config['hotelUrl'].'/templates/brain/style/images/icons/iconheat.png" class="friend_icon" style="margin-top: -10px;float: right;">
			</div>
			';
			}else{
			if($infoRelationsNum == '1'){
				$infoNumtext = "Make more friends in this category :)";
				}else{
				$infoRelationsNum = $infoRelationsNum - 1;
				$infoNumtext = "".userHome('username')." has <b>" . $infoRelationsNum . "</b> friend more in the category";
			}
			echo '
			<div class="friend_3"">
			<table>
			<tr>
			<td>
			<div class="circle_friend">
			<div class="friend_head" style="background: url(https://avatar-retro.com/habbo-imaging/avatarimage?figure='. filter($infoFriends['look']) .'&head_direction=2&action=wav&headonly=1)">
			</div>
			</div>
			</td>
			<td>
			<img src="'.$config['hotelUrl'].'/templates/brain/style/images/icons/iconheat.png" class="friend_icon">
			</td>
			<td>
			'. $infoFriends['username'] .'
			</td>
			<td style="width: 100%;">
			'.  $friend_online .'
			</td>
			</tr>
			</table>
			<div class="numRows_friend">
			'. $infoNumtext .'
			</div>
			</div>
			';
		}
	}
?>
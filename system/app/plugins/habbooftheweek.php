<?php
	if(!defined('BRAIN_CMS')) 
	{ 
		die('Sorry but you cannot access this file!'); 
	}
	function userOfTheWeek()
	{
		global $config;
		echo'<style>.staff-offline
		{
		text-indent: -9999px;
		width: 0px;
		margin-right: 25px;
		height: 0px;
		border: 5px solid #F37373;
		box-shadow: 0px 0px 0px 1px rgba(0,0,0,0.2);
		border-radius: 50%;
		float: right;
		}
		.staff-online{text-indent: -9999px;
		width: 0px;
		margin-right: 25px;
		height: 0px;
		border: 5px solid #73F375;
		box-shadow: 0px 0px 0px 1px rgba(0,0,0,0.2);
		border-radius: 50%;
		float: right;
		}
		</style>
		';
		global $dbh,$lang;
		$getUOTW = $dbh->prepare("SELECT userid,text FROM uotw");
		$getUOTW->execute();
		$getUOTWData = $getUOTW->fetch();
		$getUser = $dbh->prepare("SELECT id,look,username,motto,online FROM users WHERE id = :id");
		$getUser->bindParam(':id', $getUOTWData['userid']);
		$getUser->execute();
		$getUserData = $getUser->fetch();
		$getUserBadge = $dbh->prepare("SELECT badge_id,user_id,badge_slot FROM user_badges WHERE user_id = :id AND badge_slot = 1 LIMIT 1");
		$getUserBadge->bindParam(':id', $getUOTWData['userid']);
		$getUserBadge->execute();
		$getUserDataBadge = $getUserBadge->fetch();
		if ($getUserBadge->RowCount() > 0)
		{
			$userBadge = '<img style="padding-right: 10px;" src="'.$config['badgeURL'].'/'.$getUserDataBadge['badge_id'].'.gif" align="right">';
		}
		else
		{
			false;
		}
		If($getUser->RowCount() > 0)
		{
			if($getUserData['online'] == 1){ $OnlineStatus = "online"; } else { $OnlineStatus = "offline"; }
			echo '<div class="userNew" style="height: 110px;  background: url(https://avatar-retro.com/habbo-imaging/avatarimage?figure='.filter($getUserData['look']).'&direction=2&head_direction=3&action=crr=667&gesture=sml);float: left;background-repeat: no-repeat;"></div>';
			echo ''.$lang["Hname"].'  <a href ="/home/'.filter($getUserData['username']).'"><b style="color:#046fe0;text-decoration: underline;">'.filter($getUserData['username']).'</a><span class="staff-'.$OnlineStatus.'"></span></b> ';
			echo '<div style="">'.$lang["Hmotto"].'  <b>'.filter($getUserData['motto']).'</b>'.$userBadge.'</div>'.userlike($getUserData['id']).'';
			echo '<div style=""><h4>'.filter($getUOTWData['text']).'</h4></div>';
		}
		else
		{
			echo '<div class="userNew" style="height: 110px;  background: url(/templates/brain/style/images/icons/ghost.png);float: left;background-repeat: no-repeat;"></div>';
			echo '<b style="color:#046fe0;text-decoration: underline;">No User Found</a><span class="staff-'.$OnlineStatus.'"></b> ';
		}
	}
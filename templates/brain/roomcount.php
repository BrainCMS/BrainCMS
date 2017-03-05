<?php
	$sql = $dbh->prepare("SELECT id,users_now,caption,owner FROM rooms WHERE users_now > 0 ORDER BY users_now DESC LIMIT 5");
	$sql->execute();
	If($sql->RowCount() > 0)
	{
		while ($on = $sql->fetch())
		{
			echo'
			<a  style="text-decoration: none;color: #000;">
			<img  src="/templates/brain/style/images/icons/habbo_online_anim.gif" align="right"> 
			';
			if ($on['users_now'] == 0)
			{
				$onlineUsers = '<img style="padding-right: 10px;" src="/templates/brain/style/images/icons/room_icon_1.gif" align="left">';
			}
			else if ($on['users_now'] > 29)
			{
				$onlineUsers = '<img style="padding-right: 10px;" src="/templates/brain/style/images/icons/room_icon_5.gif" align="left">';
			}
			else if ($on['users_now'] > 19)
			{
				$onlineUsers = '<img style="padding-right: 10px;" src="/templates/brain/style/images/icons/room_icon_4.gif" align="left">';
			}
			else if ($on['users_now'] > 9)
			{
				$onlineUsers = '<img style="padding-right: 10px;" src="/templates/brain/style/images/icons/room_icon_3.gif" align="left">';
			}
			else if ($on['users_now'] > 0)
			{
				$onlineUsers = '<img style="padding-right: 10px;" src="/templates/brain/style/images/icons/room_icon_2.gif" align="left">';
			}
			echo $onlineUsers;
			$getMembers = $dbh->prepare("SELECT username FROM users WHERE id = :owner");
			$getMembers->bindParam(':owner', $on['owner']);
			$getMembers->execute();
			$getMemberss = $getMembers->fetch();
			echo'
			<div class="users_now">
			</div>
			<div class="caption">
			<b>'.filter($on['caption']).'.</b>                    </div>
			<div class="owner">
			Currently <b>'.filter($on['users_now']).'</b> user(s) in the room.<br>
			Room owner: <a href="/home/'.filter($getMemberss['username']) .'"><b>'.filter($getMemberss['username']).'</a></b>
			</div>
			<hr>
			</a>
			';
		}
	}
	else
	{
		echo '
		<img style="padding-right: 10px;" src="/templates/brain/style/images/icons/room_icon_1.gif" align="left">
		<div class="users_now">
		</div>
		<div class="caption">
		<b><br>there are no users in a room.</b></div>
		<div class="owner">
		</div>
		';
	}
?>		
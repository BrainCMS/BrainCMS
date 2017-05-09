<?php
	include_once 'includes/header.php';
?>
<title><?= $config['hotelName'] ?>: <?= $lang["Sstaff"] ?></title>
<div class="center">
<?php
		include_once 'includes/alerts.php';
	?>
	<div style="width: 600px;"class="columleft">
		<style>.staff-offline{text-indent:-9999px;width:0px;position:absolute;margin-top:6px;margin-left:7px;height:0px;border:5px solid #F37373;box-shadow:0px 0px 0px 1px rgba(0,0,0,0.2);border-radius:50%;}.staff-online{text-indent:-9999px;width:0px;position:absolute;margin-top:6px;margin-left:7px;height:0px;border:5px solid #73F375;box-shadow:0px 0px 0px 1px rgba(0,0,0,0.2);border-radius:50%;}</style>
		<?php
			$getRanks = $dbh->prepare("SELECT id,name,badgeid,tab_colour FROM ranks WHERE id in (9,8,7,6,5,4,3,2)  ORDER BY id DESC");
			$getRanks->execute();
			while ($Ranks = $getRanks->fetch())
			{	
				echo '
				<div class="box">
				<div class="' . $Ranks['tab_colour'] . ' title">' . $Ranks['name'] . '</div> 
				<div class="mainBox" style="float;left">
				<div class="boxHeader"></div>
				';
				$getMembers = $dbh->prepare("SELECT id,username,motto,look,online FROM users WHERE rank = :ranid");
				$getMembers->bindParam(':ranid', $Ranks['id']);
				$getMembers->execute();
				if ($getMembers->RowCount() > 0)
				{
					while ($member = $getMembers->fetch())
					{
						$username = filter($member['username']);
						$motto = filter($member['motto']);
						$look = filter($member['look']);
						$online = filter($member['online']);
						if($online == 1){ $OnlineStatus = "online"; } else { $OnlineStatus = "offline"; }
						echo '
						<a href="/home/'.$username.'"><div style="pointer;float: left;padding-top: 20px;border-radius: 5px;border: 1px solid rgba(0, 0, 0, 0.2);border-bottom: 2px solid rgba(0, 0, 0, 0.2);width: 275px;margin-bottom: 5px;margin-left: 5px;margin-right: 5px;">
						<div id="column" style="border: 2px dotted rgba(0, 0, 0, 0.2);margin-top: -10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;float: left;height:55px;width: 55px;border-radius: 555px;-moz-border-radius: 555px;-webkit-border-radius: 555px;background:url(https://avatar-retro.com/habbo-imaging/avatarimage?figure='.$look.'&head_direction=2&direction=2&action=wlk&gesture=sml) no-repeat;background-position: 50% 10%;"></div>
						<b  style="font-size: 16px;">' .$username . ' ';  userlike($member['id']);   echo'</b> <span class="staff-'.$OnlineStatus.'"></span> 
						<img src="'.$config['badgeURL'].'' . $Ranks['badgeid'] . '.gif" style="margin-right:5px;margin-top: 30px;" align="right"> 
						</a>
						<br>  <img src="/templates/brain/style/images/icons/motto.png"> <i style="font-size: 12px;">' .$motto . '</i>
						<BR>
						</div>
						';
					}
				}
				else
				{
					echo $lang["Snostaff"];
				}
				echo '
				</div>
				</div>';
			}
		?>
	</div>
	<div style="width: 370px;" class="columright">
		<div class="box">
			<div class="black title">
				<?= $lang["Sthestaff"] ?>
			</div>
			<div class="mainBox" style="float;left">
				<div class="boxHeader"></div>
			<?= $lang["Sthestafftext"] ?></div>
		</div>
	</div>
	<?php
		include_once 'includes/footer.php';
	?>
</body>
</html>					
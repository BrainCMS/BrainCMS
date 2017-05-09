<?php
	include_once 'includes/header.php';
?>
<style></style>
<title><?= $config['hotelName'] ?>: <?= userHome('username'); ?> </title>
<div class="center">
<?php
		include_once 'includes/alerts.php';
	?>
	<div style="width: 500px; margin-left: 0px;" class="columright">
		<div style = "" class="box">
			<div class="title">
				<?= userHome('username'); ?>'s <?= $lang["Huserprofile"] ?> <?= userlike(userHome('id')) ?>
			</div>
			<div class="mainBox" style="float;left">
				<div id="column" style="    width: 460px;height: 400px;background: url('/templates/brain/style/images/icons/Hotel_HP_BG.png') no-repeat;background-color: #FFF;">
					<div class='boxbg1'>
						<div class="platte" style="float: left;margin-left:-5px;margin-top:5px;width:119px;height:165px">
							<img src="https://avatar-retro.com/habbo-imaging/avatarimage?figure=<?= userHome('look'); ?>&direction=2&head_direction=3&action=wlk&gesture=sml" style="-webkit-filter: drop-shadow(0 1px 0 #FFFFFF) drop-shadow(0 -1px 0 #FFFFFF) drop-shadow(1px 0 0 #FFFFFF) drop-shadow(-1px 0 0 #FFFFFF);margin-top: -20px;position: absolute;margin-left: 25px;">
						</div>
						<div class="mission">	 <?= filter(userHome('motto')); ?></div>
					</div>
					<div class="boxbg3">
						<div class='boxx credits'>
							<?= userHome('username'); ?>  <?= $lang["Hhas"] ?> <b> <?= userHome('credits'); ?> </b> <?= $lang["Hcredits"] ?>
						</div>
						<div class='boxx pixel'>
							<?= userHome('username'); ?>  <?= $lang["Hhas"] ?> <b> <?= userHome('activity_points'); ?> </b> <?= $lang["Hduckets"] ?>
						</div>
						<div class='boxx sterne'>
							<?= userHome('username'); ?>  <?= $lang["Hhas"] ?> <b> <?= userHome('vip_points'); ?> </b> <?= $lang["Hdiamond"] ?>
						</div>
						<div class='boxx register'>
							<?= $lang["Hjoined"] ?> <b><?php echo date("d-m-y, H:i",userHome('account_created'));?></b>
						</div>
						<div class='boxx register'>
							<?= $lang["Hlastonline"] ?> <b><?php echo date("d-m-y, H:i", userHome('last_online')); ?></b>
						</div>
					</div>
					<div class="boxbg2">
						<div class="sternbg">
							<div class="smalltext" style="text-align: center;"></div>
							<div class="smalltext" style="width: 100%;text-align: center;"><b><?= userHome('username'); ?>:</b> <?= $lang["Hhometext"] ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="box">
			<div class="title blue">Relationship status of <?= userHome('username'); ?></div>
			<div class="mainBox" style="float;left">
				<div class="boxHeader"></div>
				<div class="friendlist" style="display: inline-block;">
					<?= friendListHome() ?>
				</div>
			</div>
		</div>
	</div>
	<div style="width: 470px;margin-left: 10px;" class="columleft">
		<div class="box">
			<div class="green title">
				<?= $lang["Hbagesof"] ?> <?= userHome('username'); ?>
			</div>
			<div class="mainBox" style="float;left">
				<?php
					$userId = userHome('id');
					$stmt = $dbh->prepare("SELECT*FROM user_badges WHERE user_id = :userid");
					$stmt->bindParam(':userid', $userId);
					$stmt->execute();
					if (!$stmt->RowCount() == 0)
					{
						while($badge = $stmt->fetch())
						{
							echo"<img src=\"".$config['badgeURL']."".filter($badge["badge_id"]).".GIF\">";
						}
					}
					else
					{
						echo userHome('username').' has no badges yet';
					}
				?>
			</div>
		</div>
		<div class="box">
			<div class="blue title">
				<?= $lang["Hfrendsof"] ?> <?= userHome('username'); ?>
			</div>
			<div class="mainBox" style="float;left">
				<div style="width: 450px; height: 400px; overflow-y: scroll;">
					<?php
						$userId = userHome('id');
						$sql = $dbh->prepare("SELECT * FROM messenger_friendships WHERE user_one_id=:userid OR user_two_id=:userid");
						$sql->bindParam(':userid', $userId);
						$sql->execute();
						if (!$sql->RowCount() == 0)
						{
							while($news = $sql->fetch())
							{
								$id = (userHome('id') == $news['user_two_id'] ? $news['user_one_id'] : $news['user_two_id']);
								$getUser = $dbh->prepare("SELECT * FROM users WHERE id = :id");
								$getUser->bindParam(':id', $id);
								$getUser->execute();
								$getUserData = $getUser->fetch();
								echo'
								<a href="/home/'.filter($getUserData['username']).'"> <img style="float: right;" src="https://avatar-retro.com/habbo-imaging/avatarimage?figure='.filter($getUserData['look']).'&direction=3&head_direction=3&action=wav&gesture=sml&size=s&headonly=0"> 
								<b>'.filter($getUserData['username']).'</b>    </a><br>'.filter($getUserData['motto']).'<br><br><br><hr>  
								'.userlike($getUserData['id']).'';
							}
						}
						else
						{
							echo userHome('username').' has no friends yet';
						}
					?>
				</div>
			</div>
		</div>
	</div>
	<?php
		include_once 'includes/footer.php';
	?>
</div>
</div>
</body>
</html>
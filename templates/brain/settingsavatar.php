<?php
	include_once 'includes/header.php';
?>
<title><?= $config['hotelName'] ?>: <?= $lang["Ssettings"] ?></title>
<div class="center">
	<?php
		include_once 'includes/alerts.php';
	?>
	<div style="margin-left: 0px;" class="columright">
		<div style = "" class="box">
			<div class="title">
				<?= $lang["Ssettings"] ?>
			</div>
			<div class="mainBox" style="float;left">
				<a href="/settingspassword"><?= $lang["Schangepassword"] ?></a><br>
				<a href="/settingsemail"><?= $lang["Schangeemail"] ?></a><br>
				<a href="/settingshotel"><?= $lang["Shotelsettings"] ?></a><br>
				<b>My Wardrope<b>
				</div>
				</div>
				<div class="box">
					<div class="title blue">
						Your look now
					</div>
					<div class="mainBox" style="float;left">
						<div class="userlooknow">
							<div class="avatar" style="width: 120px;height: 242px; background-image: url(https://www.habbo.com.tr/habbo-imaging/avatarimage?head_direction=2&direction=2&size=l&figure=<?= User::userData('look') ?>);"></div>
						</div>
					</div>
				</div>
			</div>
			<div style="margin-left: 10px;" class="columleft">
				<div class='box'>
					<div class='title green'>My Wardrope</div>
					<div class='mainBox'>
						<center>
							<?php 
								wardrope();
								$getUserLook = $dbh->prepare("SELECT * from ".$emuUse['user_wardrobe']." WHERE user_id = :id ORDER BY slot_id DESC");
								$getUserLook->bindParam(':id', $_SESSION['id']);
								$getUserLook->execute();
								if ($getUserLook->RowCount() > 0)
								{
									while ($getUserLookData = $getUserLook->fetch())
									{
										echo'<form action="" method="POST"><div class="userLookAvatar">
										<div class= "userLookAvatarlook" style="background-image: url(https://www.habbo.com.tr/habbo-imaging/avatarimage?head_direction=4&direction=4&size=m&figure='.$getUserLookData['look'].');"></div>
										</a>
										<input type="submit" value="Use this look" name="editlook" class="submit">
										<input type="hidden" value="'.$getUserLookData['id'].'" name="lookid">
										</div></form>';
									}
								}
								else
								{
									echo'<div class="userLookAvatar">
									<div class= "userLookAvatarlook" style="background-image: url(/templates/brain/style/images/icons/ghost.png);"></div>
									</a>
									<input type="submit" value="No looks" name="editlook" class="submit">
									</div>';
								}
							?>
						</center>
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
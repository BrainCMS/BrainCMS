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
			<b><?= $lang["Schangepassword"] ?></a></b><br>
			<a href="/settingsemail"><?= $lang["Schangeemail"] ?></a><br>
			<a href="/settingshotel"><?= $lang["Shotelsettings"] ?></a><br>
			<a href="/settingsavatar">My Wardrope</a>
			</div>
		</div>
	</div>
	<div style="margin-left: 10px;" class="columleft">
		<div class='box'>
			<div class='title red'><?= $lang["Schangepassword"] ?></div>
			<div class='mainBox'>
				<form action="" method="POST">
				<?php User::editPassword(); ?>
					<b><?= $lang["Spasswordnow"] ?></b>
					<input  placeholder="*****************" type="password" name="oldpassword" value="" id="avatarmotto" style="margin-bottom: 3px;width: 100%;"><br>
					<span style="font-size:12px;color:gray;"><?= $lang["Spasswordnowtext"] ?></span><br><br>
					<b><?= $lang["Snewpassword"] ?></b>
					<input  placeholder="*****************"  type="password" name="newpassword" value="" id="avatarmotto" style="margin-bottom: 3px;width: 100%;"><br>
					<span style="font-size:12px;color:gray;"><?= $lang["Snewpasswordtext"] ?></span>
					<input type="submit" class="submit" value="<?= $lang["Ssave"] ?>" name="password" style="margin-top: 10px;">
				</form>
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
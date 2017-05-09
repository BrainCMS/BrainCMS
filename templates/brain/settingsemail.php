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
				<b><?= $lang["Schangeemail"] ?></b><br>
				<a href="/settingshotel"><?= $lang["Shotelsettings"] ?></a><br>
				<a href="/settingsavatar">My Wardrope</a>
			</div>
		</div>
	</div>
	<div style="margin-left: 10px;" class="columleft">
		<div class='box'>
			<div class='title red'><?= $lang["Schangeemail"] ?></div>
			<div class='mainBox'>
			<?php User::editEmail(); ?>
				<form action="" method="post">
					<b><?= $lang["Syouremail"] ?></b>
					<input type="text" name="email" value="<?= User::userData('mail') ?>" id="avatarmotto" autocomplete="off" style="margin-bottom: 3px;width: 100%;">
					<span style="font-size:12px;color:gray;"><?= $lang["Syouremailtext"] ?></span>
					<input type="submit" class="submit" value="<?= $lang["Ssave"] ?>" name="account" style="margin-top: 10px;">
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
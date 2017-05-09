<?php
	include_once 'includes/header.php';
?>
<title><?= $config['hotelName'] ?>: <?= $lang["Aads"] ?></title>
<div class="center">
<?php
		include_once 'includes/alerts.php';
	?>
	<div style="width: 500px;"class="columleft">
		<div class="box">
			<div class="title">
				<?= $lang["Abringadsheader"] ?>
			</div>
			<div class="mainBox" style="float;left">
			<?= $lang["Abringadstext"] ?></div>
		</div>
		<div class="box">
			<div class="blue title">
				<?= $lang["Aadvertisementheader"] ?>
			</div>
			<div class="mainBox" style="float;left">
				<div class="boxHeader"></div>
				<?= $lang["Aadvertisementtext"] ?>
			</div>
		</div>
	</div>
	<div style="width: 470px;" class="columright">
		<div class="box">
			<div class="green title">
				<?= $lang["Advertiserightheader"] ?>
			</div>
			<div class="mainBox" style="float;left">
				<div class="boxHeader"></div>
				<?= $lang["Advertiserighttext"] ?>
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
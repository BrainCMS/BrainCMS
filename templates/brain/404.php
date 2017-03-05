<?php
	include_once 'includes/header.php';
?>
<title><?= $config['hotelName'] ?>: <?= User::userData('username') ?></title>
<div class="center">
	<div class="columleft" style="width: 100%;">
		<div class="box">
			<div class="title red">
				404
			</div>
			<div class="mainBox" style="float;left">
				<div class="boxHeader"></div>
				Deze pagina bestaat niet!
			</div>
		</div>
	</div>
	<?php
		include_once 'includes/footer.php';
	?>
</div>
</body>
</html>			
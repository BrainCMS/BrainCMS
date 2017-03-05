<html>
	<head>
		<link rel="stylesheet" href="<?= $config['hotelUrl']?>/system/maintenance/css/style.css" type="text/css" media="all" />
	</head>
	<body>
		<div id="gradient" />
		<div id="back1"></div>
		<div id="back2"></div>
		<div class="box">
			<font size="6"><?= $lang["Mtitle"] ?></font><br><br>
			<?php
				if($config['twitterEnable'] == true)
				{
				?>
				<a class="twitter-timeline" data-width="320" data-height="420" data-link-color="#FAB81E" href="<?= $config['twitter'] ?>">Tweets by <?= $config['hotelName'] ?></a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
				<?php
				}
			?></br>
		</div>
		<div class="box">
			<i><a href="adminlogin"><?= $lang["Mstafflogin"] ?></a></i>
		</div>
	</body>
</html>
<html>
	<head>
		<link rel="stylesheet" href="<?= $config['hotelUrl']?>/system/maintenance/css/style.css" type="text/css" media="all" />
	</head>
	<body>
		<div id="gradient" />
		<div id="back1"></div>
		<div id="back2"></div>
		<div class="box">
			<?php User::Login(); ?>	
			<form method="post">
				<div class="pfeil"> 	</div>
				<input type="text" id="username" name="username" placeholder="<?php echo $lang['Iusername']; ?>">
				<input type="password" id="password" name="password" placeholder="<?php echo $lang['Ipassword']; ?>">
				<button style="float: right;" type="submit" class="submit" name="login"><div style="color: white"><b><?= $lang["Ilogin"] ?></b></div>
				</div>
			</button>
			</form>
	</div>
</body>
</html>
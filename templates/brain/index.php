

<html>
	<head>
		<meta name="robots" content="index,follow,all"/>
		<meta name="description" content="Maak vrienden, doe mee en val op!"/>
		<meta name="keywords" content="<?= $config['hotelName'] ?>, <?= $config['hotelName'] ?>hotel, <?= $config['hotelName'] ?> hotel, virtueel, wereld, sociaal netwerk, gratis, community, avatar, chat, online, tiener, roleplaying, doe mee, sociaal, groepen, forums, veilig, speel, games, online, vrienden, tieners, zeldzaams, zeldzame meubi, verzamelen, maak, verzamel, kom in contact, meubi, meubeks, huisdieren, kamer inrichten, delen, uitdrukking, badges, hangout, muziek, beroemdheid, VIP-visits, celebs, mmo, mmorpgs, massive multiplayer"/>
		<meta name="build" content="AuroraCMS - RELEASE-02082016"/>
		<title><?= $config['hotelName'] ?> Hotel: Beleef het plezier!</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<!DOCTYPE>
		<html lang="en">
			<script type="text/javascript">function siteUrl() {return "";}function showReg() {window.location = siteUrl() + "register";}  function fblogin() {window.location = siteUrl() + "/system/app/plugins/fblogin/fbconfig.php";}</script>
		
	</head>
		<body>
            <div id="site">
				<div id="body">
					<link rel="stylesheet" href="/templates/brain/style/css/index/style.css?v=17">
					<link rel="stylesheet" href="/templates/brain/style/css/index/StyleIndex.css?v=4">
					<style type="text/css">
						@import url(https://fonts.googleapis.com/css?family=Ubuntu:400,700,300);
						@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,300,700);
					</style>
					<?php User::Login(); ?>	
					<header style="background-position-x: -4607px;">
						<div id="main">
							<div class="left">
								<div id="banner-counter-container-box">
									<img src="/templates/brain/style/images/logo/logo.png" style="margin-top: -20px"><br>
									<div class="text">
										<div class="animated bounceIn"><b><?= Game::usersOnline() ?></b> <?= $config['hotelName'] ?>'s Online!</div>
									</div>
								</div>
							</div>
							<div class="animated bounceIn">
								<div class="login">
									<form method="post">
											<div class="pfeil"> 	</div>
											<input type="text" id="username" name="username" placeholder="<?php echo $lang['Iusername']; ?>">
											<input type="password" id="password" name="password" placeholder="<?php echo $lang['Ipassword']; ?>">
											<a style="text-decoration : none" href="/forget"><div class="buttonforgot"><div class="buttonforgottxt">Forgot password</div></div></a>
												<button type="submit" class="submit" name="login"><img src="/templates/brain/style/images/login/go.gif">
												</div>
											</button>
											</form>
									</div>
								</div>
							</header>
							<div id="main" class="pcon">
								<div id="info-container-box">
									<div class="ajax">
									</div>
									<div class="text">
										<div class="animated bounceIn">
											<center>
												<h2><b><?php echo $lang['Islogan1']; ?></b></h2>
												<p><b><?php echo $lang['Islogan2']; ?></b></p>
											</center>
										</div>
									</div>
									<div onclick="showReg();" id="registerbutton">
										<div class="animated bounceIn"><?php echo $lang['Iregister']; ?>
										</div>
									</div>
									<?php
										if($config['facebookLogin'] == true)
										{
										?>
										<div onclick="fblogin();" id="registerbuttonfb">
											<div class="animated bounceIn">Facebook Login
											</div>
										</div>
										<?php 
										}
									?>
								</div>
								<div id="recorder-container-box" style="background-image: url(/templates/brain/style/images/login/spielbox-bg.png)">
									<div class="text">
										<div class="animated bounceIn">
											<b>
												<center><?php echo $lang['Itext1header']; ?></center>
											</b>
										<?php echo $lang['Itext1']; ?></div>
									</div>
								</div>
								<div id="recorder-container-box" style="background-image: url(/templates/brain/style/images/login/eventbox-bg.png); margin-left: 19px;">
									<div class="text">
										<div class="animated bounceIn">
											<b>
												<center><?php echo $lang['Itext2header']; ?></center>
											</b>
										<?php echo $lang['Itext2']; ?></div>
									</div>
								</div>
								<div id="recorder-container-box" style="background-image: url(/templates/brain/style/images/login/updatebox-bg.png); float: right; margin-right: 0px;">
									<div class="text">
										<div class="animated bounceIn">
											<b>
												<center><?php echo $lang['Itext3header']; ?></center>
											</b>
										<?php echo $lang['Itext3']; ?></div>
									</div>
								</div>
							</div>
							<br>
							<div id="footer" style="font-family: verdana, arial, sans-serif;">
								<div id="inner">
									<div id="middle"> <?php echo $lang['ICopyright1']; ?>
										<?php echo $lang['ICopyright2']; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</body>
			</html>			
<style>
	.error {
		text-align: center;
		font-size: 13px;
		background: #f44336;
		display: none;
		width: 100%;
		color: #fff;
		padding: 0 10px;
		border-radius: 2px;
		margin-bottom: 8px;
		line-height: 40px;
	}
</style>
<?php
	
	if(isset($_GET['userref'])) {
		$userref = $_GET['userref'];
	}
	else{
		$userref = null;
	}
	
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title><?= $config['hotelName'] ?> | Maak vrienden, doe mee en val op!</title>
		<link href="https://bootswatch.com/paper/bootstrap.css" rel="stylesheet" type="text/css">
		<link href="/templates/brain/style/css/register.css?v=<?= rand(1,100011111) ?>" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300normal,300italic,400normal,400italic,600normal,600italic,700normal,700italic,800normal,800italic&amp;subset=all" rel="stylesheet" type="text/css">
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
		<link href="/templates/brain/style/css/avatargenerate.css" rel="stylesheet" />
		<meta name="description" content="Virtuele wereld waar je vrienden kunt maken en ontmoeten.">
		<meta name="keywords" content="<?= $config['hotelName'] ?>, <?= $config['hotelName'] ?>hotel, <?= $config['hotelName'] ?> hotel, virtueel, wereld, sociaal netwerk, gratis, community, avatar, chat, online, tiener, roleplaying, doe mee, sociaal, groepen, forums, veilig, speel, games, on, vrienden, tieners, zeldzaams, zeldzame meubi, verzamelen, maak, verzamel, kom in contact, meubi, meubeks, huisdieren, kamer inrichten, delen, uitdrukking, badges, hangout, muziek, beroemdheid, VIP-visits, celebs, mmo, mmorpgs, massive multiplayer">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-latest.js"></script>
		<script src="./templates/brain/js/register.js?v=<?= rand(1,100011111) ?>"></script>
		<script type="text/javascript">
			var language = '<?php echo $config['lang']; ?>';
		</script>
	</head>
	<body>
		<nav style="height: 56px;" class="navbar navbar-default">
			<div class="navbar-header"><a href="/"></a></div>
			<div class="container"><div class="users-online" id="users-online"><span id="usersOnline"><?= Game::usersOnline() ?></span> <?= $config['hotelName'] ?>'s online.</div>
		</nav>
			<div class="container">
				<div class="logotipo" style="color: #158cba;width: 82px; height: 34px; font-size: 37px; font-family: 'Pacifico', cursive; top: -2px; position: absolute;"><a style="color: #158cba; text-decoration: none;" href="/"> <?= $config['hotelName'] ?> </a></div>
				<div style="clear:both;"></div>
				<div class="panel panel-success" style="width: 56%;float: left;padding: 8px;">
						<fieldset>
							<legend><?php echo $lang['Rregister']; ?></legend>
							<span class="error" id="top"></span>
							<div class="form-group">
								<label for="inputUsername" class="col-lg-4 control-label"><?php echo $lang['Rname']; ?></label>
								<div class="col-lg-8">
									<input type="text" class="form-control" name="username" id="username" onkeyup="checkUsernameOrEmail(this.value, 'username')" placeholder="<?php echo $lang['Rname']; ?>...">
									<i class="glyphicon glyphicon-user form-control-feedback" style="right: 10px;"></i>
								</div>
							</div>
							<div class="form-group">
								<label for="inputUsername" class="col-lg-4 control-label"><?php echo $lang['Rmotto']; ?></label>
								<div class="col-lg-8">
									<input type="text" class="form-control" name="motto" id="motto" placeholder="<?php echo $lang['Rmotto']; ?>" value="<?= $config['startMotto'] ?>">
									<i class="glyphicon glyphicon-star form-control-feedback" style="right: 10px;"></i>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail" class="col-lg-4 control-label"><?php echo $lang['Remail']; ?></label>
								<div class="col-lg-8">
									<input type="text" class="form-control" name="email" id="email" onkeyup="checkUsernameOrEmail(this.value, 'email')"  placeholder="<?php echo $lang['Remail']; ?>...">
									<i class="glyphicon glyphicon-envelope form-control-feedback" style="right: 10px;"></i>
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword" class="col-lg-4 control-label"><?php echo $lang['Rpassword']; ?></label>
								<div class="col-lg-8">
									<input type="password" class="form-control" name="password" id="password"  onkeyup="checkPasswords(this.value, 'password')" placeholder="<?php echo $lang['Rpassword']; ?>...">
									<i class="glyphicon glyphicon-lock form-control-feedback" style="right: 10px;"></i>
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword2" class="col-lg-4 control-label"><?php echo $lang['Rrepeatpassword']; ?></label>
								<div class="col-lg-8">
									<input type="password" class="form-control" name="password_repeat" id="password_repeat"  onkeyup="checkPasswords(this.value, 'password_repeat')"  placeholder="<?php echo $lang['Rrepeatpassword']; ?>...">
									<i class="glyphicon glyphicon-lock form-control-feedback" style="right: 10px;"></i>
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword2" class="col-lg-4 control-label">Referrer</label>
								<div class="col-lg-8">
									<input type="text" class="form-control" name="referrer" id="referrer" value="<?= $userref; ?>" onkeyup="checkUsernameOrEmail(this.value, 'referrer')"  placeholder="">
									If you were referred to this site by an existing member of <?= $config['hotelName'] ?>
									<i class="glyphicon glyphicon-tag form-control-feedback" style="right: 10px;"></i>
								</div>
							</div>
							<div class="form-group">
								<div style="width: 0%;" class="col-lg-8">
									<div id="avatarSelector" class="builder-viewport" style="margin-top: -45px;">
										<div class="main-navigation">
											<ul>
												<li class="active">
													<a href="#" data-navigate="hd" data-subnav="gender"><img src="/templates/brain/style/images/avatarreg/body.png" /></a>
												</li>
												<li>
													<a href="#" data-navigate="hr" data-subnav="hair"><img src="/templates/brain/style/images/avatarreg/hair.png" /></a>
												</li>
												<li>
													<a href="#" data-navigate="ch" data-subnav="tops"><img src="/templates/brain/style/images/avatarreg/tops.png" /></a>
												</li>
												<li>
													<a href="#" data-navigate="lg" data-subnav="bottoms"><img src="/templates/brain/style/images/avatarreg/bottoms.png" /></a>
												</li>
											</ul>
										</div>
										<div class="sub-navigation">
											<ul id="gender" class="display">
												<li>
													<a href="#" class="male nav-selected" data-gender="M"></a>
												</li>
												<li>
													<a href="#" class="female" data-gender="F"></a>
												</li>
											</ul>
											<ul id="hair" class="hidden">
												<li>
													<a href="#" class="hair nav-selected" data-navigate="hr"></a>
												</li>
												<li>
													<a href="#" class="hats" data-navigate="ha"></a>
												</li>
												<li>
													<a href="#" class="hair-accessories" data-navigate="he"></a>
												</li>
												<li>
													<a href="#" class="glasses" data-navigate="ea"></a>
												</li>
												<li>
													<a href="#" class="moustaches" data-navigate="fa"></a>
												</li>
											</ul>
											<ul id="tops" class="hidden">
												<li>
													<a href="#" class="tops nav-selected" data-navigate="ch"></a>
												</li>
												<li>
													<a href="#" class="chest" data-navigate="cp"></a>
												</li>
												<li>
													<a href="#" class="jackets" data-navigate="cc"></a>
												</li>
												<li>
													<a href="#" class="accessories" data-navigate="ca"></a>
												</li>
											</ul>
											<ul id="bottoms" class="hidden">
												<li>
													<a href="#" class="bottoms nav-selected" data-navigate="lg"></a>
												</li>
												<li>
													<a href="#" class="shoes" data-navigate="sh"></a>
												</li>
												<li>
													<a href="#" class="belts" data-navigate="wa"></a>
												</li>
											</ul>
										</div>
										<div id="clothes-colors">
											<div id="clothes"></div>
											<div id="colors"></div>
										</div>
										<div id="avatar">
											<img id="myHabbo" value="" src="" alt="My Habbo" title="My Habbo" />
											<input type="hidden" name="habbo-avatar" id="avatar_code">
										</div>
									</div>
								</div>
							</div>
							<?php
								if($config['recaptchaSiteKeyEnable'] == true)
								{
								?>
								<div class="form-group">
									<label for="inputcaptcha" class="col-lg-4 control-label"><?php echo $lang['Rrobot']; ?></label>
									<div class="col-lg-8">
										<div class="g-recaptcha" data-sitekey="<?= $config['recaptchaSiteKey'] ?>"></div>
									</div>
								</div>
								<?php
								}
							?><div style="clear:both;"></div>
							<center>
							<div class="form-group" style="text-align: right;">
							<div class="col-lg-8 col-lg-offset-4">
								<a href="/index" class="btn btn-default"><?php echo $lang['Rback']; ?></a>
								<button type="submit" name="register" id="registerSubmit" class="btn btn-primary"><?php echo $lang['Rregister']; ?></button>
							</div>
						</div></center>
					</fieldset></div>
				<div style="float: right; width: 42%;" class="list-group">
					<a class="list-group-item">
						<div class="subimage1"></div>
						<h4 class="list-group-item-heading"><?php echo $lang['Rtext1header']; ?></h4>
						<p class="list-group-item-text"><?php echo $lang['Rtext1']; ?></p>
					</a>
					<a  class="list-group-item">
						<div class="subimage2"></div>
						<h4 class="list-group-item-heading"><?php echo $lang['Rtext2header']; ?></h4>
						<p class="list-group-item-text"><?php echo $lang['Rtext2']; ?></p>
					</a>
					<a  class="list-group-item">
						<div class="subimage3"></div>
						<h4 class="list-group-item-heading"><?php echo $lang['Rtext3header']; ?></h4>
						<p class="list-group-item-text"><?php echo $lang['Rtext3']; ?></p>
					</a>
					<a  class="list-group-item">
						<div class="subimage4"></div>
						<h4 class="list-group-item-heading"><?php echo $lang['Rtext4header']; ?></h4>
						<p class="list-group-item-text"><?php echo $lang['Rtext4']; ?></p>
					</a>
				</div>
				<div style="clear:both;"></div><footer class="footer" style="font-size: 13.5px; font-weight: 100;">
					<center>
						<?php echo $lang['RCopyright']; ?>
					</div>
				</body>
			</html>
		<script src="https://code.jquery.com/jquery-latest.min.js?v=4" type="text/javascript"></script>
		<script src="/templates/brain/style/js/jquery.avatargenerate.js?v=17" type="text/javascript"></script>	
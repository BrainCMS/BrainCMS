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
	
	if(isset($_GET['key'])) {
		filter($key = $_GET['key']);
	}
	else{
		filter($key = '');
	}
	
?>
<html lang="nl-NL">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title><?= $config['hotelName'] ?> | Forgot password</title>
		<link href="https://bootswatch.com/paper/bootstrap.css" rel="stylesheet" type="text/css">
		<link href="/templates/brain/style/css/register.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300normal,300italic,400normal,400italic,600normal,600italic,700normal,700italic,800normal,800italic&amp;subset=all" rel="stylesheet" type="text/css">
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
		<link href="/templates/brain/style/css/avatargenerate.css" rel="stylesheet" />
		<meta name="description" content="Virtuele wereld waar je vrienden kunt maken en ontmoeten.">
		<meta name="keywords" content="<?= $config['hotelName'] ?>, <?= $config['hotelName'] ?>hotel, <?= $config['hotelName'] ?> hotel, virtueel, wereld, sociaal netwerk, gratis, community, avatar, chat, online, tiener, roleplaying, doe mee, sociaal, groepen, forums, veilig, speel, games, on, vrienden, tieners, zeldzaams, zeldzame meubi, verzamelen, maak, verzamel, kom in contact, meubi, meubeks, huisdieren, kamer inrichten, delen, uitdrukking, badges, hangout, muziek, beroemdheid, VIP-visits, celebs, mmo, mmorpgs, massive multiplayer">
	</head>
	<body>
		<nav style="height: 56px;" class="navbar navbar-default">
			<div class="navbar-header"> <a href="/"></a>    
			</div>
			<div class="container"><div class="users-online" id="users-online"><span id="usersOnline"><?= Game::usersOnline() ?></span> <?= $config['hotelName'] ?>'s online.</div>
			</nav>
			<div class="container">
				<div class="logotipo" style="color: #158cba;width: 82px; height: 34px; font-size: 37px; font-family: 'Pacifico', cursive; top: -2px; position: absolute;"><a style="color: #158cba; text-decoration: none;" href="/"> <?= $config['hotelName'] ?> </a></div>
				<div style="clear:both;"></div>
				<div class="panel panel-success" style="    width: 100%;float: left;padding: 8px;">
					<form method="post" class="form-horizontal">
						<fieldset>
							<legend><?php echo $lang['Rregister']; ?></legend>
							<?php changePassword(); ?>
							<div class="form-group">
								<label style= "width: 20%;" class="col-lg-4 control-label">Reset key</label>
								<div class="col-lg-8">
									<input value= "<?php echo $key; ?>"type="text" class="form-control" name="key" id="key" placeholder="">
									<i class="glyphicon glyphicon-lock form-control-feedback" style="right: 10px;"></i>
								</div>
							</div>
							<div class="form-group">
								<label style= "width: 20%;" class="col-lg-4 control-label"><?php echo $lang['Rpassword']; ?></label>
								<div class="col-lg-8">
									<input type="password" class="form-control" name="password_reset" id="password" placeholder="<?php echo $lang['Rpassword']; ?>...">
									<i class="glyphicon glyphicon-lock form-control-feedback" style="right: 10px;"></i>
								</div>
							</div>
							<div class="form-group">
								<label style= "width: 20%;" class="col-lg-4 control-label"><?php echo $lang['Rrepeatpassword']; ?></label>
								<div class="col-lg-8">
									<input type="password" class="form-control" name="password_repeat_reset" id="password_repeat" placeholder="<?php echo $lang['Rrepeatpassword']; ?>...">
									<i class="glyphicon glyphicon-lock form-control-feedback" style="right: 10px;"></i>
								</div>
							</div>
							<div class="form-group" style="text-align: center;">
								<div class="col-lg-8 col-lg-offset-2">
								</div>
								</div
							<div class="form-group" style="text-align: right;">
							<div class="col-lg-8 col-lg-offset-4">
								<a href="/index" class="btn btn-default"><?php echo $lang['Rback']; ?></a>
								<button href="/me"   type="submit" name="resetpasswordnow"class="btn btn-primary">Confirm</button>
							</div>
						</div>
					</fieldset>
				</form>
				
				<div style="clear:both;"></div><footer class="footer" style="font-size: 13.5px; font-weight: 100;">
					<center>
						<?php echo $lang['RCopyright']; ?>
					</div>
				</body>
			</html>
			<script src="https://code.jquery.com/jquery-latest.min.js?v=4" type="text/javascript"></script>
		<script src="/templates/brain/style/js/jquery.avatargenerate.js?v=13" type="text/javascript"></script>																
<?php
	error_reporting(1);
?>
<html lang="en">
	<head>
		<script src="/templates/brain/style/js/index/index.js?v=4"></script>
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin">
		<link rel="stylesheet" href="/templates/brain/style/css/main2.css?v=<?= $config['hash'] ?>" type="text/css">
		<link rel="stylesheet" href="/templates/brain/style/css/home.css?v=<?= $config['hash'] ?>" type="text/css">
	</head>
	<style>
		input[type="submitred"], input:-webkit-autofill, .submitred {
		-webkit-appearance: none;
		border-radius: 3px;
		height: 35px;
		width: 100%;
		background: #c70c0c;
		border-bottom: 2px solid #3c0606;
		color: rgba(255,255,255,1);
		cursor: pointer;
		text-align: center;
		display: block;
		text-decoration: none;
		border: 0px;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-latest.js"></script>	
	<body background="/templates/brain/style/images/headerbg/background2016.png">
		<title><?= $lang["Bblockked"] ?></title>
		<div class="center">
			<div style="width: 100%;" class="columleft">
				<div class="box">
					<div class="title red">
						<?= $lang["Bhotelblack"] ?>
					</div>
					<div class="mainBox" style="float;left">
						<?php 
							if (loggedIn())
							{
								$user = User::userData('username');
							}
							else
							{
								$user = null;
							}
							$banQuery = $dbh->prepare("SELECT * FROM bans WHERE (bantype = 'user' && value = :user) OR (bantype = 'ip' && value = '".userIp()."')");
							$banQuery->bindParam(':user', $user); 
							$banQuery->execute(); 
							while($banInfo = $banQuery->fetch())
							{
							?>
							<img src='http://i.imgur.com/Rug0VxW.gif' align='right'>
							<?= $lang["Bvisitor"] ?>
							<i><b><?= $banInfo['reason']; ?></b></i>
							<br /><br />
							<?= $lang["Bbantil"] ?> <b><u><?php echo gmdate("d-m-Y H:i", $banInfo['added_date']); ?></u></b> <?= $lang["Buntil"] ?> <b><u><?php echo gmdate("d-m-Y H:i", $banInfo['expire']); ?></u></b>.<br />Ban ID: <b><?= $banInfo['id']; ?></b><br /><hr>
							<?= $lang["Bwrong"]  ?>
							<br>
							
							<?php 
								
								if ($banInfo['expire'] <= strtotime('now'))
								{
									echo'Verlopen';
								}
								else
								{
							echo'No niet verlopen';
								}
								
							?>
							
							
							<?php
							}
						?>
					</div>
				</div>
				<div class="boxfooter">
					<?= $config['hotelName'] ?> &copy; 2016 - 2017 |
					<span style="cursor:pointer;text-decoration:underline;" class='lireSuite' onclick="document.location.href='/#'">Algemene voorwaarden</span> |
					<span style="cursor:pointer;text-decoration:underline;" class='lireSuite' onclick="document.location.href='#'">Privacyverklaring</span> |
					<span style="cursor:pointer;text-decoration:underline;" class='lireSuite' onclick="document.location.href='#'">Gids voor ouders</span>
				</div>
				</body>
				</html>														
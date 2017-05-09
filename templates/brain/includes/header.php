<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin">
		<link rel="stylesheet" href="/templates/brain/style/css/main2.css?v=22" type="text/css">
		<link rel="stylesheet" href="/templates/brain/style/css/home.css" type="text/css">
	</head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript">
        $(document).ready(function(e) {
            $.ajaxSetup({
                cache:true
			});
            setInterval(function() {
                $('#onlinecount').load('/onlinecount');
			}, 1500);
            $( "#onlinecount").click(function() {
				$('#onlinecount').load('/onlinecount');
			});
		});
	</script>
	<script type="text/javascript">
        $(document).ready(function(e) {
            $.ajaxSetup({
                cache:true
			});
            setInterval(function() {
                $('#roomcount').load('/roomcount');
			}, 5500);
            $( "#roomcount").click(function() {
				$('#roomcount').load('/roomcount');
			});
		});
		</script>
	<body>
		<header id="mainheader">
			<div class="center">
				<a href="#">
					<div class="head_enter">
						<a href="/client" onclick="window.open('/client','new','toolbar=0,scrollbars=0,location=1,statusbar=1,menubar=0,resizable=1,width=1270,height=700');return false;" class="btn btn-success"><?= $lang["Hgoto"] ?></a> 
						<a onclick="<?= $config['hotelUrl'] ?>/logout" href="<?= $config['hotelUrl'] ?>/logout" class="btn btn-danger"><?= $lang["HsignOut"] ?></a>
					</div> 
					<div class="wrap">
						<div class="logo">
						</div>
					</a>
					<div id="onlinecount"><small><b><?= Game::usersOnline() ?></b> <?= $config['hotelName'] ?>'s online.</small></div>
					<?php
						if (User::userData('rank') > '3')
						{
							echo'	
							<div class="langbox"><a href="/adminpan/dash"><img src="/templates/brain/style/images/menuicons/settings_icon.png" style="padding:7px;float:right;"> </div>
							';
						}
					?>
				</div>
			</header>
			<nav>
				<div id="navigator">
					<div class="center">
						<ul>
							<li class="blauw">
								<a href="/"><?= User::userData('username') ?></a>
								<div class="submenu">
									<a href="/me"><?= User::userData('username') ?></a>
									<a href="/settingspassword"><?= $lang["Naccountsettings"] ?></a> 
									<a href="/home/<?= User::userData('username') ?>"><?= $lang["Nmyprofile"] ?></a>
									<a href="/sessionlog"><?= $lang["Nsessionlog"] ?></a>
									<a href="/logout"><?= $lang["NsignOut"] ?></a>
								</div>
							</li>
							<li class="rood">
								<a href="/community"><?= $lang["Ncommunity"] ?></a>
								<div class="submenu">
									<a href="/community"><?= $lang["Ncommunity"] ?></a>
									<a href="/sollicitaties"><?= $lang["Nstaffapply"] ?></a>
									<a href="<?php
										$getLastNewsId = $dbh->prepare("SELECT id FROM cms_news ORDER BY ID DESC LIMIT 1");
										$getLastNewsId->execute();
										$row = $getLastNewsId->fetch();
										echo "/news/".$row['id']."";
										?>">
									<?= $lang["Nnews"] ?></a>
									<a href="/advertentie_tips"><?= $lang["Nadvertisementtips"] ?></a>
									<a href="/stats"><?= $lang["Nstatistics"] ?></a>
									<a href="/online"><?= $lang["Nonline"] ?> <?= $config['hotelName'] ?>'s</a>
								</div>
							</li>
							<li class="paars">
								<a href="/staff"><?= $lang["Nstaff"] ?></a>
								<div class="submenu">
									<a href="/staff"><?= $lang["Nstaff"] ?></a>
									<a href="/teams"><?= $lang["Nteams"] ?></a>
								</div>
							</li>
							<li class="groen">
								<a href="/vip"><?= $lang["Sshopnaviname"] ?></a>
								<div class="submenu">
									<a href="/vip"><?= $lang["Vvipnaviname"] ?></a>
								</div>
							</li>
							<a href="<?= $config['hotelUrl'] ?>/logout"><li class="logout"><?= $lang["NsignOut"] ?></li></a>
						</ul>
					</div>
				</nav>	
				
				
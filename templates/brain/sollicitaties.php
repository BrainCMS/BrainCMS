<?php
	include_once 'includes/header.php';
?>
<title><?= $config['hotelName'] ?>: <?= $lang["Nstaffapply"] ?></title>
<div class="center">
<?php
		include_once 'includes/alerts.php';
	?>
	<div class="columleft">
		<div class="box">
			<div class="title">
				<?= $lang["Nstaffapply"] ?>
			</div>
			<div class="mainBox" style="float;left">
				<div class="boxHeader"></div>
				<form action="" method="POST">
					<?php staffApplication(); ?>
					<center><h3><font color="blue"></center></h3></font><img src="/templates/brain/style/images/icons/solli_succes.gif" align="right"> 
					<h1><?= $lang["Nstaffapply"] ?></h1>
					<hr><h2><?= $lang["Naboutyourself"] ?></h2>
					<p><label><b><?= $lang["Nyourname"] ?></b><br>
					<input type="text" name="username" size="400" placeholder="<?= $lang["Nyourname"] ?>" value= "<?= User::userData('username') ?>" id="username" style="width: 100%;" disabled></p>
					<p><label><b><?= $lang["Nyourrealname"] ?></b><br>
					<input type="text" name="realname" size="400" placeholder="<?= $lang["Nyourrealname"] ?>" value= "" id="username" style="width: 100%;"></p>
					<p><label><b>Skype:</b><br>
					<input type="text" name="skype" size="400" placeholder="Skype" value= "" id="username" style="width: 100%;"></p>
					<p><label><b><?= $lang["Nyourage"] ?></b><br>
					<input type="number" name="age" size="400" placeholder="<?= $lang["Nyourage"] ?>" value= "" id="username" style="width: 100%;"></p>
					<hr><h2><?= $lang["Nstaffapply"] ?></h2>
					</p><label><b><?= $lang["Nfunction"] ?></b>
					<select style="width: 100%;" name="functie" class="form-control">
		                <option name="functie" value="1">Junior Moderator</option> 					
						<option name="functie" value="2">Eventteam</option> 
						<option name="functie" value="3">Spamteam</option> 
						<option name="functie" value="4">Builders</option> 
						<option name="functie" value="5">Trail DJ</option>
						<option name="functie" value="6">Pixelaar</option>
					</select>	</p>
					<p><label><b><?= $lang["Nonlineweak"] ?></b><br>
					<input type="number" name="onlinetime" size="400" placeholder="10" id="amount" style="width: 100%;"></p>
					<p><label><b><?= $lang["Nyourexperience"] ?></b><br>
					<textarea name="experience" size="400" rows="5" cols="50" style="width: 100%;"> </textarea></p>
					<p><label><b><?= $lang["Npeoplearguing"] ?></b><br>
					<textarea name="quarrel" size="400" rows="5" cols="50" style="width: 100%;"> </textarea></p>
					<p><label><b><?= $lang["Nyoutrust"] ?></b><br>
					<textarea name="serious" size="400" rows="5" cols="50" style="width: 100%;"> </textarea></p>
					<p><label><b><?= $lang["Nimprovehotel"] ?></b><br>
					<textarea name="improve" size="400" rows="5" cols="50" style="width: 100%;"> </textarea></p>
					</p><label><b><?= $lang["Nmicrophone"] ?></b><br>
					<select style="width: 100%;" name="microphone" class="form-control">
						<option name="microphone" value="1"><?= $lang["Nyes"] ?></option>
						<option name="microphone" value="2"><?= $lang["Nnoe"] ?></option>
					</select></p>
					<input type="submit" value="<?= $lang["Nsubmit"] ?>" name="addsollie" class="submit" style="float:right" >
					</form>
					</div>
					</div></div>
					<div class="columright">
						<div class="box">
							<div class="title green">
								<?= $lang["Nstaffapply"] ?>
							</div>
							<?= $lang["NText"] ?>
							<?php
								include_once 'includes/footer.php';
							?>
						</div>
					</div>
					</body>
					</html>																				
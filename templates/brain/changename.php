<?php
	include_once 'includes/header.php';
?>
<title><?= $config['hotelName'] ?>: <?= $lang["Ssettings"] ?></title>
<div class="center">
<?php
		include_once 'includes/alerts.php';
	?>
	<div style="width:100%;margin-left: 10px;" class="columleft">
		<div class='box'>
			<div class='title red'>Kies een gebruikersnaam</div>
			<div class='mainBox'>
				<?php User::editUsername(); ?>
				<form action="" method="post">
					<b>Kies een gebruikersnaam</b>
					<input type="text" name="username" value="" placeholder="Vul een gebruikersnaam in" style="margin-bottom: 3px;width: 100%;">
					<input type="submit" class="submit" value="Gebruikersnaam opslaan" name="editusername" style="margin-top: 10px;">
				</form>
			</div>
		</div>
		
		<?php
			include_once 'includes/footer.php';
		?>
	</div>
</div>
</body>
</html>			
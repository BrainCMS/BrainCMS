<?php
	include_once 'includes/header.php';
?>
<title><?= $config['hotelName'] ?>: Online</title>
<div class="center">
	<?php
		include_once 'includes/alerts.php';
	?>
	<div style="width: 100%;" class="columleft">
		<div class="box">
			<div class="title blue">
				<?= $lang["Oonline"] ?>
			</div>
			<div class="mainBox" style="float;left">
				<?php 
					$getOnline = $dbh->prepare("SELECT id,username,motto,online,look from users WHERE online = '1' ORDER BY RAND()");
					$getOnline->execute();
					if ($getOnline->RowCount() > 0)
					{
						while ($onlineRow = $getOnline->fetch())
						{
						?>
						<div style="cursor:pointer;float: left;padding-top: 20px;border-radius: 5px;border: 1px solid rgba(0, 0, 0, 0.2);border-bottom: 2px solid rgba(0, 0, 0, 0.2);width: 225px;margin-bottom: 10px;margin-left: 5px;margin-right: 5px;">
							<div id="column" style="border: 2px dotted rgba(0, 0, 0, 0.2);margin-top: -10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;float: left;height:55px;width: 55px;border-radius: 555px;-moz-border-radius: 555px;-webkit-border-radius: 555px;background:url(https://avatar-retro.com/habbo-imaging/avatarimage?figure=<?= filter($onlineRow['look']) ?>&head_direction=3&amp;action=wav) no-repeat;background-position: 50% 10%;"></div>
						<b style="font-size: 12px; color: black;"><a href = "/home/<?= filter($onlineRow['username']) ?>"><?= filter($onlineRow['username']) ?> <?= userlike($onlineRow['id']) ?></a></b><br><?= filter($onlineRow['motto']) ?></a>
					</div>		
					<?php
					}
				}
				else
				{
					echo'<div class="userNewBox">
					<div class="userNew" style="background: url(/templates/brain/style/images/icons/ghost.png); background-position: 15px 2px;width: 80px;float: left;background-repeat: no-repeat;"></div>
					<div class="userNewName">
					<div style="font-size: 12px;">No Online Users</div>
					</div>
					</div>';
				}
				echo "</div>";
			?>
		</div>
		<?php
			include_once 'includes/footer.php';
		?>
	</div>
</div>
</body>
</html>			
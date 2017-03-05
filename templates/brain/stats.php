<?php
	include_once 'includes/header.php';
?>
<title><?= $config['hotelName'] ?>: <?= $lang["Sstats"] ?></title>
<div class="center">
	<div style="width: 100%;"class="columleft">
	<div class="box">
			<div class="title red">
				Most Online
			</div>
			<div class="mainBox" style="float;left">
				     <?php 
							$belcr_get = $dbh->prepare("SELECT OnlineTime,users.username,users.look,users.id from users, user_stats WHERE rank < 10 AND users.id = user_stats.id ORDER BY `OnlineTime` DESC  LIMIT 6");
							$belcr_get->execute();
							while ($belcr_row = $belcr_get->fetch())
							{
							?>
							
					<div style="pointer;float: left;padding-top: 20px;border-radius: 5px;border: 1px solid rgba(0, 0, 0, 0.2);border-bottom: 2px solid rgba(0, 0, 0, 0.2);width: 300px;margin-bottom: 10px;margin-left: 5px;margin-right: 5px;">
						<div id="column" style="border: 2px dotted rgba(0, 0, 0, 0.2);margin-top: -10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;float: left;height:55px;width: 55px;border-radius: 555px;-moz-border-radius: 555px;-webkit-border-radius: 555px;background:url(https://avatar-retro.com/habbo-imaging/avatarimage?figure=<?= filter($belcr_row['look']) ?>&head_direction=3&amp;action=wav) no-repeat;background-position: 50% 10%;"></div>
						<b  style="font-size: 16px;"><?= filter($belcr_row['username']) ?> </b> <?= userlike($belcr_row['id']) ?>
						<a href="/home/<?= filter($belcr_row['username']) ?>" class="tooltip">
						</a>
						<br> <b style="font-size: 12px;"><?php echo date("d \D\a\y\s\ H \h\\o\\u\\r\s\  \a\\n\\d\\ i \m\i\\n\u\\t\\e\\s",filter($belcr_row['OnlineTime'])) ?> Online Time
						
					</div>
					<?php
					}
					echo "</div>";
				?>
			</div>
			<div class="box">
					<div class="title green">
						Most Respect
					</div>
					<div class="mainBox" style="float;left">
						<?php 
							$belrs_get = $dbh->prepare("SELECT `Respect`,`id` FROM `user_stats` ORDER BY Respect desc LIMIT 6");
							$belrs_get->execute();
							while ($belrs_row = $belrs_get->fetch())
							{
							$belrs2_get = $dbh->prepare("SELECT * FROM `users` WHERE `id` = '" . $belrs_row['id'] . "'");
							$belrs2_get->execute();
							$belrs2_row = $belrs2_get->fetch();
							?>
							<div style="pointer;float: left;padding-top: 20px;border-radius: 5px;border: 1px solid rgba(0, 0, 0, 0.2);border-bottom: 2px solid rgba(0, 0, 0, 0.2);width: 300px;margin-bottom: 10px;margin-left: 5px;margin-right: 5px;">
								<div id="column" style="border: 2px dotted rgba(0, 0, 0, 0.2);margin-top: -10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;float: left;height:55px;width: 55px;border-radius: 555px;-moz-border-radius: 555px;-webkit-border-radius: 555px;background:url(https://avatar-retro.com/habbo-imaging/avatarimage?figure=<?= filter($belrs2_row['look']) ?>&head_direction=3&amp;action=wav) no-repeat;background-position: 50% 10%;"></div>
								<b  style="font-size: 16px;"><?= filter($belrs2_row['username']) ?> </b> <?= userlike($belrs2_row['id']) ?>
								<a href="/home/<?= filter($belrs2_row['username']) ?>" class="tooltip"> <img src="/templates/brain/style/images/icons/mostrespect.gif" align="right">
								</a>
								<br> <b style="font-size: 12px;"><?= filter($belrs_row['Respect']) ?></b> <?= $lang["Srespects"] ?>
							</div>
							<?php
							}
							echo "</div>";
						?>
					</div>
		<div class="box">
			<div class="title blue">
				<?= $lang["Smostdia"] ?>
			</div>
			<div class="mainBox" style="float;left">
				<?php 
					$belcr_get = $dbh->prepare("SELECT id,vip_points,username,look from users WHERE rank < 5 ORDER BY `vip_points` DESC  LIMIT 6");
					$belcr_get->execute();
					while ($belcr_row = $belcr_get->fetch())
					{
					?>
					<div style="pointer;float: left;padding-top: 20px;border-radius: 5px;border: 1px solid rgba(0, 0, 0, 0.2);border-bottom: 2px solid rgba(0, 0, 0, 0.2);width: 300px;margin-bottom: 10px;margin-left: 5px;margin-right: 5px;">
						<div id="column" style="border: 2px dotted rgba(0, 0, 0, 0.2);margin-top: -10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;float: left;height:55px;width: 55px;border-radius: 555px;-moz-border-radius: 555px;-webkit-border-radius: 555px;background:url(https://avatar-retro.com/habbo-imaging/avatarimage?figure=<?= filter($belcr_row['look']) ?>&head_direction=3&amp;action=wav) no-repeat;background-position: 50% 10%;"></div>
						<b  style="font-size: 16px;"><?= filter($belcr_row['username']) ?> </b> <?= userlike($belcr_row['id']) ?>
						<a href="/home/<?= filter($belcr_row['username']) ?>" class="tooltip"> <img src="/templates/brain/style/images/icons/diamondje.png" align="right">
						</a>
						<br> <b style="font-size: 12px;"><?= filter($belcr_row['vip_points']) ?></b> <?= $lang["Sdiamond"] ?>
					</div>
					<?php
					}
					echo "</div>";
				?>
			</div>
			<div class="box">
				<div class="title purple">
					<?= $lang["Smostduck"] ?>
				</div>
				<div class="mainBox" style="float;left">
					<?php 
						$belcr_get = $dbh->prepare("SELECT id,activity_points,username,look from users WHERE rank < 5 ORDER BY `activity_points` DESC  LIMIT 6");
						$belcr_get->execute();
						while ($belcr_row = $belcr_get->fetch())
						{
						?>
						<div style="pointer;float: left;padding-top: 20px;border-radius: 5px;border: 1px solid rgba(0, 0, 0, 0.2);border-bottom: 2px solid rgba(0, 0, 0, 0.2);width: 300px;margin-bottom: 10px;margin-left: 5px;margin-right: 5px;">
							<div id="column" style="border: 2px dotted rgba(0, 0, 0, 0.2);margin-top: -10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;float: left;height:55px;width: 55px;border-radius: 555px;-moz-border-radius: 555px;-webkit-border-radius: 555px;background:url(https://avatar-retro.com/habbo-imaging/avatarimage?figure=<?= filter($belcr_row['look']) ?>&head_direction=3&amp;action=wav) no-repeat;background-position: 50% 10%;"></div>
							<b  style="font-size: 16px;"><?= filter($belcr_row['username']) ?> </b> <?= userlike($belcr_row['id']) ?>
							<a href="/home/<?= filter($belcr_row['username']) ?>" class="tooltip"> <img src="/templates/brain/style/images/icons/ducket.png?v=1" align="right">
							</a>
							<br> <b style="font-size: 12px;"><?= filter($belcr_row['activity_points']) ?></b> <?= $lang["Sduckets"] ?>
						</div>
						<?php
						}
						echo "</div>";
					?>
				</div>
				<div class="box">
					<div class="title yellow">
						<?= $lang["Smostcred"] ?>
					</div>
					<div class="mainBox" style="float;left">
						<?php 
							$belcr_get = $dbh->prepare("SELECT id,credits,username,look from users WHERE rank < 5 ORDER BY `credits` DESC  LIMIT 6");
							$belcr_get->execute();
							while ($belcr_row = $belcr_get->fetch())
							{
							?>
							<div style="pointer;float: left;padding-top: 20px;border-radius: 5px;border: 1px solid rgba(0, 0, 0, 0.2);border-bottom: 2px solid rgba(0, 0, 0, 0.2);width: 300px;margin-bottom: 10px;margin-left: 5px;margin-right: 5px;">
								<div id="column" style="border: 2px dotted rgba(0, 0, 0, 0.2);margin-top: -10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;float: left;height:55px;width: 55px;border-radius: 555px;-moz-border-radius: 555px;-webkit-border-radius: 555px;background:url(https://avatar-retro.com/habbo-imaging/avatarimage?figure=<?= filter($belcr_row['look']) ?>&head_direction=3&amp;action=wav) no-repeat;background-position: 50% 10%;"></div>
								<b  style="font-size: 16px;"><?= filter($belcr_row['username']) ?> </b> <?= userlike($belcr_row['id']) ?>
								<a href="/home/<?= filter($belcr_row['username']) ?>" class="tooltip"> <img src="/templates/brain/style/images/icons/credit.gif" align="right">
								</a>
								<br> <b style="font-size: 12px;"><?= filter($belcr_row['credits']) ?></b> <?= $lang["Scredits"] ?>
							</div>
							<?php
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
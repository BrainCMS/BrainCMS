<?php
	include_once 'includes/header.php';
?>
<title><?= $config['hotelName'] ?>: <?= $lang["Sstats"] ?></title>
<div class="center">
	<?php
		include_once 'includes/alerts.php';
	?>
	<div style="width: 100%;"class="columleft">
		<div class="box">
			<div class="title red">
				Most Online
			</div>
			<div class="mainBox" style="float;left">
				<?php 
					$belrs_get = $dbh->prepare("SELECT `".$emuUse['OnlineTime']."`,`".$emuUse['user_stats_user_id']."` FROM `".$emuUse['user_stats']."` ORDER BY ".$emuUse['OnlineTime']." desc LIMIT 6");
					$belrs_get->execute();
					while ($belcr_row = $belrs_get->fetch())
					{
						$belrs2_get = $dbh->prepare("SELECT * FROM `users` WHERE `id` = '" . $belcr_row[$emuUse['user_stats_user_id']] . "'");
						$belrs2_get->execute();
						$belrs2_row = $belrs2_get->fetch();
					?>
					<div style="pointer;float: left;padding-top: 20px;border-radius: 5px;border: 1px solid rgba(0, 0, 0, 0.2);border-bottom: 2px solid rgba(0, 0, 0, 0.2);width: 300px;margin-bottom: 10px;margin-left: 5px;margin-right: 5px;">
						<div id="column" style="border: 2px dotted rgba(0, 0, 0, 0.2);margin-top: -10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;float: left;height:55px;width: 55px;border-radius: 555px;-moz-border-radius: 555px;-webkit-border-radius: 555px;background:url(https://avatar-retro.com/habbo-imaging/avatarimage?figure=<?= filter($belrs2_row['look']) ?>&head_direction=3&amp;action=wav) no-repeat;background-position: 50% 10%;"></div>
						<b  style="font-size: 16px;"><?= filter($belrs2_row['username']) ?> </b> <?= userlike($belrs2_row['id']) ?>
						<a href="/home/<?= filter($belrs2_row['username']) ?>" class="tooltip">
						</a>
						<br> <b style="font-size: 12px;"><?php 
						
								$d = floor($belcr_row[$emuUse['OnlineTime']]/86400);
								$h = floor(($belcr_row[$emuUse['OnlineTime']]-$d*86400)/3600);
								$time_str = $d.' Days '.$h.' Hours ';
								echo $time_str;
										
						?>
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
							$belrs_get = $dbh->prepare("SELECT `".$emuUse['respect']."`,`".$emuUse['user_stats_user_id']."` FROM `".$emuUse['user_stats']."` ORDER BY ".$emuUse['respect']." desc LIMIT 6");
							$belrs_get->execute();
							while ($belrs_row = $belrs_get->fetch())
							{
								$belrs2_get = $dbh->prepare("SELECT * FROM `users` WHERE `id` = '" . $belrs_row[$emuUse['user_stats_user_id']] . "'");
								$belrs2_get->execute();
								$belrs2_row = $belrs2_get->fetch();
							?>
							<div style="pointer;float: left;padding-top: 20px;border-radius: 5px;border: 1px solid rgba(0, 0, 0, 0.2);border-bottom: 2px solid rgba(0, 0, 0, 0.2);width: 300px;margin-bottom: 10px;margin-left: 5px;margin-right: 5px;">
								<div id="column" style="border: 2px dotted rgba(0, 0, 0, 0.2);margin-top: -10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;float: left;height:55px;width: 55px;border-radius: 555px;-moz-border-radius: 555px;-webkit-border-radius: 555px;background:url(https://avatar-retro.com/habbo-imaging/avatarimage?figure=<?= filter($belrs2_row['look']) ?>&head_direction=3&amp;action=wav) no-repeat;background-position: 50% 10%;"></div>
								<b  style="font-size: 16px;"><?= filter($belrs2_row['username']) ?> </b> <?= userlike($belrs2_row['id']) ?>
								<a href="/home/<?= filter($belrs2_row['username']) ?>" class="tooltip"> <img src="/templates/brain/style/images/icons/mostrespect.gif" align="right">
								</a>
								<br> <b style="font-size: 12px;"><?= filter($belrs_row[$emuUse['respect']]) ?></b> <?= $lang["Srespects"] ?>
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
								if ($config['hotelEmu'] == 'arcturus')
								{
									$belcr_get2 = $dbh->prepare("SELECT * from users_currency WHERE type = 5 ORDER BY `amount` DESC  LIMIT 6");
									$belcr_get2->execute();
									while ($belcr_row2 = $belcr_get2->fetch())
									{
										$belcr_get = $dbh->prepare("SELECT * from users WHERE id = :id");
										$belcr_get->bindParam(':id', $belcr_row2['user_id']);
										$belcr_get->execute();
										$belcr_row = $belcr_get->fetch();
									?>
									<div style="pointer;float: left;padding-top: 20px;border-radius: 5px;border: 1px solid rgba(0, 0, 0, 0.2);border-bottom: 2px solid rgba(0, 0, 0, 0.2);width: 300px;margin-bottom: 10px;margin-left: 5px;margin-right: 5px;">
										<div id="column" style="border: 2px dotted rgba(0, 0, 0, 0.2);margin-top: -10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;float: left;height:55px;width: 55px;border-radius: 555px;-moz-border-radius: 555px;-webkit-border-radius: 555px;background:url(https://avatar-retro.com/habbo-imaging/avatarimage?figure=<?= filter($belcr_row['look']) ?>&head_direction=3&amp;action=wav) no-repeat;background-position: 50% 10%;"></div>
										<b  style="font-size: 16px;"><?= filter($belcr_row['username']) ?> </b> <?= userlike($belcr_row['id']) ?>
										<a href="/home/<?= filter($belcr_row['username']) ?>" class="tooltip"> <img src="/templates/brain/style/images/icons/diamondje.png" align="right">
										</a>
										<br> <b style="font-size: 12px;"><?= filter($belcr_row2['amount']) ?></b> <?= $lang["Sdiamond"] ?>
									</div>
									<?php
									}
								}
								else
								{
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
								if ($config['hotelEmu'] == 'arcturus')
								{
									$belcr_get2 = $dbh->prepare("SELECT * from users_currency WHERE type = 0 ORDER BY `amount` DESC  LIMIT 6");
									$belcr_get2->execute();
									while ($belcr_row2 = $belcr_get2->fetch())
									{
										$belcr_get = $dbh->prepare("SELECT * from users WHERE id = :id");
										$belcr_get->bindParam(':id', $belcr_row2['user_id']);
										$belcr_get->execute();
										$belcr_row = $belcr_get->fetch();
									?>
									<div style="pointer;float: left;padding-top: 20px;border-radius: 5px;border: 1px solid rgba(0, 0, 0, 0.2);border-bottom: 2px solid rgba(0, 0, 0, 0.2);width: 300px;margin-bottom: 10px;margin-left: 5px;margin-right: 5px;">
										<div id="column" style="border: 2px dotted rgba(0, 0, 0, 0.2);margin-top: -10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;float: left;height:55px;width: 55px;border-radius: 555px;-moz-border-radius: 555px;-webkit-border-radius: 555px;background:url(https://avatar-retro.com/habbo-imaging/avatarimage?figure=<?= filter($belcr_row['look']) ?>&head_direction=3&amp;action=wav) no-repeat;background-position: 50% 10%;"></div>
										<b  style="font-size: 16px;"><?= filter($belcr_row['username']) ?> </b> <?= userlike($belcr_row['id']) ?>
										<a href="/home/<?= filter($belcr_row['username']) ?>" class="tooltip"> <img src="/templates/brain/style/images/icons/ducket.png" align="right">
										</a>
										<br> <b style="font-size: 12px;"><?= filter($belcr_row2['amount']) ?></b> <?= $lang["Sduckets"] ?>
									</div>
									<?php
									}
								}
								else
								{
									$belcr_get = $dbh->prepare("SELECT id,vip_points,username,look from users WHERE rank < 5 ORDER BY `vip_points` DESC  LIMIT 6");
									$belcr_get->execute();
									while ($belcr_row = $belcr_get->fetch())
									{
									?>
									<div style="pointer;float: left;padding-top: 20px;border-radius: 5px;border: 1px solid rgba(0, 0, 0, 0.2);border-bottom: 2px solid rgba(0, 0, 0, 0.2);width: 300px;margin-bottom: 10px;margin-left: 5px;margin-right: 5px;">
										<div id="column" style="border: 2px dotted rgba(0, 0, 0, 0.2);margin-top: -10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;float: left;height:55px;width: 55px;border-radius: 555px;-moz-border-radius: 555px;-webkit-border-radius: 555px;background:url(https://avatar-retro.com/habbo-imaging/avatarimage?figure=<?= filter($belcr_row['look']) ?>&head_direction=3&amp;action=wav) no-repeat;background-position: 50% 10%;"></div>
										<b  style="font-size: 16px;"><?= filter($belcr_row['username']) ?> </b> <?= userlike($belcr_row['id']) ?>
										<a href="/home/<?= filter($belcr_row['username']) ?>" class="tooltip"> <img src="/templates/brain/style/images/icons/ducket.png?v=1" align="right">
										</a>
										<br> <b style="font-size: 12px;"><?= filter($belcr_row['vip_points']) ?></b> <?= $lang["Sduckets"] ?>
									</div>
									<?php
									}
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
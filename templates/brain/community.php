<?php
	include_once 'includes/header.php';
?>
<title><?= $config['hotelName'] ?>: <?= $lang["Ccommunity"] ?></title>
<div class="center">
<?php
		include_once 'includes/alerts.php';
	?>
	<div class="columleft">
		<div class="box">
			<div class="title">
				<?= $lang["Crandomplayers"] ?>
			</div>
			<div class="mainBox" style="float;left">
				<div class="boxHeader"></div>
				<?php
					$sqlGetUsersByRankDev = $dbh->prepare("SELECT username,look FROM users ORDER BY ID DESC LIMIT 5");
					$sqlGetUsersByRankDev->execute();
					while ($getUsersDev = $sqlGetUsersByRankDev->fetch())
					{
					?>
					<div class="userNewBox">
						<a href="/home/<?= filter($getUsersDev['username']) ?>"><div class="userNew" style="background: url(https://avatar-retro.com/habbo-imaging/avatarimage?figure=<?= filter($getUsersDev['look']) ?>&direction=3&head_direction=3&action=wav&headonly=0); background-position: 15px 2px;width: 80px;float: left;background-repeat: no-repeat;"></div>
							<div class="userNewName">
							<?= filter($getUsersDev['username']) ?></a>
						</div>
					</div>
					<?php
					}
					echo "</div>";
				?>
			</div>
		</div>
		<div class="columright">
			<div class="boxnews">
				<?php
					$sql = $dbh->prepare("SELECT id,title,image,shortstory FROM cms_news ORDER BY id DESC LIMIT 1");
					$sql->execute();
					while ($news = $sql->fetch())
					{
						echo'
						<div class="newsFirstImage" style="background-image: url('.filter($news["image"]).');">
						<div class="newsTitle">
						'.filter($news["title"]).'
						</div>
						<div class="newsTitleShort">
						'.filter($news["shortstory"]).'
						</div>
						<div class="newsTitleRead">
						<div class="newsTitleReadName">
						<a href="/news/'.filter($news["id"]).'">Lees meer »</a>
						</div>
						</div>
						</div>';
					}
				?>
			</div>
			<div class="box">
				<div class="title green">
					<?= $lang["Cnowinroom"] ?>
				</div>
				<div class="mainBox" style="float;left">
					<div class="boxHeader"></div>
					<div class="scroll" style="width:330px;overflow-y: auto;overflow-x: hidden;">
						<div id="roomcount"><?= $lang["Cloading"] ?></div>
					</div>
				</div>
			</div>
		</div>
		<?php
			include_once 'includes/footer.php';
		?>
	</div>
</div>
</body>
</html>			
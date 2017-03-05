<?php
	include_once 'includes/header.php';
?>
<title><?= $config['hotelName'] ?>: <?= User::userData('username') ?></title>
<div class="center">
	<div class="columleft">
		<div class="boxuser">
			<div class="userplate">
				<img src="/templates/brain/style/images/icons/online/<?= User::userData('online') ?>.png" style="float:left;padding: 5px;">
				<div class="useravatar">
					<div class="avatar" style="background-image:url(https://avatar-retro.com/habbo-imaging/avatarimage?figure=<?= User::userData('look') ?>&amp;direction=2&amp;head_direction=3&amp;action=crr=667&amp;gesture=sml);"></div>
				</div>
			</div>
			<div class="userfirst">
				<div class="usernamebox">
					<div class="username">
						<?= User::userData('username') ?> <?= userlike(User::userData('id')) ?>
					</div>
				</div>
				<div class="usermottobox">
					<div class="usermotto">
						<?= User::userData('motto') ?>
					</div>
				</div>
				<div class="userbuttonbox">
					<a href="/client" onclick="window.open('/client','new','toolbar=0,scrollbars=0,location=1,statusbar=1,menubar=0,resizable=1,width=1270,height=700');return false;"><div class="userbutton">
						<?= $lang["Mgoto"] ?>
					</div></a>
				</div>
			</div>
			<div class="userstatsbox">
				<div style="color: #f8ef2b; background-image: url(/templates/brain/style/images/icons/crediticon.png);" class="userstats ">
					<?= User::userData('credits') ?> <?= $lang["Mcredits"] ?>
				</div>
			</div>
			<div class="userstatsbox">
				<div style="color: #e99bdc; background-image: url(/templates/brain/style/images/icons/duckicon.png);" class="userstats">
					<?= User::userData('activity_points') ?> <?= $lang["Mduckets"] ?>
				</div>
			</div>
			<div style="margin-bottom: 0px;" class="userstatsbox">
				<div style="color: #6caff4; background-image: url(/templates/brain/style/images/icons/diaicon.png);" class="userstats">
					<?= User::userData('vip_points') ?>
					<?= $lang["Mdiamond"] ?>
				</div>
			</div>
		</div>
		<div style="padding: 10px;"class="box">
			<?= User::userRefClaim(); ?>
			<div class="refcountbox">
				<div class="refcountboxnumber">
					<?php
						$refCount = $dbh->prepare("SELECT refid FROM referrer WHERE refid = :refid");
						$refCount->bindParam(':refid', $_SESSION['id']);
						$refCount->execute();
						echo $refCount->RowCount();
					?>
				</div>
				<div class="refcountboxtext">
					<?= $lang["MrefUsers"] ?>
				</div>
			</div>
			<div class="refcountboxurlbox">
				<div class="refcountboxurltext">
					<a href="<?= $config['hotelUrl'] ?>/register/<?= User::userData('username') ?>"><?= $config['hotelUrl'] ?>/register/<?= User::userData('username') ?></a>
				</div>
				<div>
					<center><?= $lang["MrefLink"] ?></center>
				</div>
			</div>
			<div class="refdiabox">
				<?= $lang["MrefDiaBank"] ?>
				<div class="refdiaboxnumber">
					<?php
						$bankCount = $dbh->prepare("SELECT userid,diamonds FROM referrerbank WHERE userid = :userid");
						$bankCount->bindParam(':userid', $_SESSION['id']);
						$bankCount->execute();
						$bankCountData = $bankCount->fetch();
						if($bankCount->RowCount() == 0)
						{
							echo'0';
						}
						else
						{
							echo $bankCountData['diamonds'];
						}
					?>
					<img src="/templates/brain/style/images/icons/diaicon.png" align="">
				</div>
				<div class="refdiaboxtext">
					<form method="post">
						<input type="submit" class="submit" value="<?= $lang["MrefButton"] ?>" name="claimdiamonds" style="margin-top: 10px;">
					</form>
				</div>
			</div>
		</div>
		<div style = "height: 169px;" class="box">
			<div class="lblue title">
				<?= $lang["Mnewinhabbo"] ?>
			</div>
			<div class="mainBox" style="float;left">
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
			<div style = "height: 169px;" class="box">
				<div class="blue title">
					<?= $lang["Mtopgroupsinhabbo"] ?>
				</div>
				<div class="mainBox" style="float;left">
					<?php
						$getem = $dbh->prepare("SELECT *,COUNT(*) AS count FROM groups,group_memberships WHERE groups.id = group_memberships.group_id GROUP BY group_memberships.group_id ORDER BY count DESC LIMIT 5");
						$getem->execute();
						if ($getem->RowCount() > 0)
						{
							while ($row = $getem->fetch())
							{
								echo '<div class="groupboxbg">
								<a class="tooltip" href="#"><div class="userNew" style="background: url('. $config['groupBadgeURL'].' '.filter($row['badge']).'); background-position: 30px 15px;width: 80px;float: left;background-repeat: no-repeat;"></div>
								<div class="userNewName">
								'. filter($row['name']).'
								<span>
								<h3>'.filter($row['name']).'</h3>
								<hr>
								'.filter($row['desc']).'
								</span>
								</a>
								</div>
								</div>';
							}
						}
						else
						{
							echo'<div class="groupboxbg">
							<a class="tooltip" href="#"><div class="userNew" style="background: url(/templates/brain/style/images/icons/ghostgroup.gif); background-position: 30px 15px;width: 80px;float: left;background-repeat: no-repeat;"></div>
							<div class="userNewName">
							No Groups
							<span>
							<h3>No Groups</h3>
							<hr>
							Be the first to create a group!
							</span>
							</a>
							</div>
							</div>';
						}
					?>
				</div>
			</div>
			<?php
				if($config['facebookEnable'] == true)
				{
				?>
				<div class="box">
					<div class="purple title">
						<?= $lang["Mfacebook"] ?>
					</div>
					<div class="mainBox" style="float;left">
						<div id="fb-root"></div>
						<script>(function(d, s, id) {
							var js, fjs = d.getElementsByTagName(s)[0];
							if (d.getElementById(id)) return;
							js = d.createElement(s); js.id = id;
							js.src = "//connect.facebook.net/nl_NL/sdk.js#xfbml=1&version=v2.7&appId=183748235334636";
							fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>
						<center><div class="fb-page" data-href="<?= $config['facebook'] ?>" data-tabs="timeline" data-width="500" data-height="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?= $config['facebook'] ?>" class="fb-xfbml-parse-ignore"><a href="<?= $config['facebook'] ?>"><?= $config['hotelName'] ?> Hotel - World Wide Community</a></blockquote></div></center>
					</div>
				</div>
				<?php
				}
			?>
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
						<a href="/news/'.filter($news["id"]).'">'.$lang["Mreadmore"].' »</a>
						</div>
						</div>
						</div>';
					}
				?>
			</div>
			<div class="box">
				<div class="title green">
					<?= $lang["Muotw"] ?>
				</div>
				<div class="mainBox" style="float;left">
					<div class="boxHeader"></div>
					<?= userOfTheWeek() ?>
				</div>
			</div>
			<div class="box">
				<div class="title orange">
					<?= $lang["Mnowinroom"] ?>
				</div>
				<div class="mainBox" style="float;left">
					<div class="boxHeader"></div>
					<div class="scroll" style="width:330px;overflow-y: auto;overflow-x: hidden;">
						<div id="roomcount"><?= $lang["mloading"] ?></div>
					</div>
				</div>
			</div>
			<div class="box">
				<div class="title blue">Relationship status</div>
				<div class="mainBox" style="float;left">
					<div class="boxHeader"></div>
					<div class="friendlist" style="display: inline-block;">
						<?= friendList() ?>
					</div>
				</div>
			</div>
			<?php
				if($config['twitterEnable'] == true)
				{
				?>
				<div class="box">
					<div class="yellow title">
						<?= $lang["Mtwitter"] ?>
					</div>
					<a class="twitter-timeline" data-width="320" data-height="420" data-link-color="#FAB81E" href="<?= $config['twitter'] ?>">Tweets by <?= $config['hotelName'] ?></a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
				</div>
				<?php
				}
			?>
		</div>
		<?php
			include_once 'includes/footer.php';
		?>
	</div>
</div>
</body>
</html>																
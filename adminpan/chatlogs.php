<?php
	include_once "includes/head.php";
	include_once "includes/header.php";
	include_once "includes/navi.php";
	admin::CheckRank(3);
?>
<aside class="right-side">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<section class="panel">
					<header class="panel-heading">
						Room Chatlogs<br>
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							<table class="table table-striped table-bordered table-condensed">
								<b>	<strong><tr><td><b>ID</b></td><td><b>User ID</b></td><td><b>Room ID</b></td><td><b>Message</b></td><td><b>Date</b></td></tr></strong></b
								<tbody>
								<?php
									$getArticles = $dbh->prepare("SELECT * FROM chatlogs ORDER BY id DESC  LIMIT 1000");
									$getArticles->execute();
									while($news = $getArticles->fetch())
									{
										echo'';
										echo'<tr>
										<td>'.$news["id"].'</td>
										<td style="width: 13%;">'.$news["user_id"].'</td>
										<td style="width: 7%;">'.$news["room_id"].'</td>
										<td style="width: 25%;">'.filter($news["message"]).'</td>
										<td>'. gmdate('d-m-Y, H:i ', $news['timestamp']).'</td>
										';
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<?php
				include_once "includes/footer.php";
				include_once "includes/script.php";
			?>							
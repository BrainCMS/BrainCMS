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
						Word Filter<br>
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							<table class="table table-striped table-bordered table-condensed">
								<b>	<strong><tr><td><b>Word</b></td><td><b>To</b></td></strong></b>
									<tbody>
										<?php
											if ($config['hotelEmu'] == 'arcturus')
											{
												$getArticles = $dbh->prepare("SELECT * FROM wordfilter");
												$getArticles->execute();
												while($news = $getArticles->fetch())
												{
													echo'<tr>
													<td style="width: 13%;">'.$news["key"].'</td>
													<td style="width: 7%;">'.$news["replacement"].'</td>
													';
												}	
											}
											else
											
											{
												$getArticles = $dbh->prepare("SELECT * FROM wordfilter");
												$getArticles->execute();
												while($news = $getArticles->fetch())
												{
													echo'<tr>
													<td style="width: 13%;">'.$news["word"].'</td>
													<td style="width: 7%;">'.$news["replacement"].'</td>
													';
												}
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
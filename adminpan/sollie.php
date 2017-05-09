<?php
	include_once "includes/head.php";
	include_once "includes/header.php";
	include_once "includes/navi.php";
	admin::CheckRank(8);
?>
<aside class="right-side">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<section class="panel">
					<header class="panel-heading">
						Applications<br>
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							<table class="table table-striped table-bordered table-condensed">
								<b>	<strong><tr><td><b>User</b></td><td><b>Age</b></td><td><b>Rank</b></td><td><b>Date</b></td><td><b>IP</b></td><td><b>View</b></td></tr></strong></b>
								<tbody>
								<?php
									$getArticles = $dbh->prepare("SELECT * FROM staffapplication ORDER BY id DESC");
									$getArticles->execute();
									while($news = $getArticles->fetch())
									{
										echo'<tr>
										<td style="width: 20%;">'.$news["username"].'</td>
										<td style="width: 10%;">'.$news["age"].'</td>
										<td style="width: 20%;">'.$news["functie"].'</td>
										<td>'. date('d-m-Y', $news['date']).'</td>
										<td>'.$news["ip"].'</td>
										<td><a href='.$config['hotelUrl'].'/adminpan/sollielook/'.$news["id"].'><i style="padding-top: 4px; color:green;" class="fa fa-edit"></i></center></a></td>
										</tr>';
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
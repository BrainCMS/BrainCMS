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
						Banned Users<br>
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							<?php admin::DeleteBans(); ?>
							<table class="table table-striped table-bordered table-condensed">
								<b>	<strong><tr><td><b>ID</b></td><td><b>Banned Users</b></td><td><b>Ban type</b></td><td><b>Reason</b></td><td><b>Banned by</b></td><td><b>Ban Date</b></td><td><b>Expiry Date</b></td></tr></strong></b
								<tbody>
								<?php
									$getArticles = $dbh->prepare("SELECT * FROM bans ORDER BY id DESC");
									$getArticles->execute();
									while($news = $getArticles->fetch())
									{
										echo'';
										echo'<tr>
										<td>'.$news["id"].'</td>
										<td style="width: 13%;">'.$news["value"].'</td>
										<td style="width: 7%;">'.$news["bantype"].'</td>
										<td style="width: 25%;">'.$news["reason"].'</td>
										<td>'.$news["added_by"].'</td>
										<td>'. gmdate('d-m-Y H:i', $news['added_date']).'</td>
										<td>'. gmdate('d-m-Y H:i', $news['expire']).'</td>
										';
										if (User::userData('rank') > '5')
										{
											echo'	
											<td><a href='.$config['hotelUrl'].'/adminpan/bans/delete/'.$news["id"].'><i style="padding-top: 4px; color:red;" class="fa fa-trash"></i></center></a></td>
											</tr>
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
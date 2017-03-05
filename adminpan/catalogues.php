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
						Horba Catalogus
						<form action="" method="POST">
						</header>
						<div class="panel-body">
							<table class="table table-striped table-bordered table-condensed">
								<tbody>
									<tr><td style="width: 5%;">ID</td><td style="width: 5%;"><strong>Icon</strong></td><td><strong>Naam</strong></td><!--<td style="width: 5%;"><strong>Edit</strong></td></tr>-->
									<?php
										$sql = DB::Query("SELECT * FROM catalog_pages WHERE parent_id = '-1' ORDER BY order_num ASC");
										while($cat = $sql->fetch_assoc())
										{
											echo'';
											echo'<tr>
											<td>'.$cat["id"].'</td>
											<td>   <img style="padding-left: 13px;padding-top: 2px;"src="/swf/c_images/catalogue/icon_'.$cat["icon_image"].'.png">     </td>
											<td>'.$cat["caption"].'</td>
											<!--<td><center><a href="editcatalogues.php?cat='.$cat["id"].'"><i  style="padding-top: 5px; color:green;" class="fa fa-edit"></i></a></td></tr>-->';
										}
									?>
								</tbody>
							</table>
						</div>
					</section>
				</div>
			</form>
		</div>
		
		<?php
			include_once "includes/footer.php";
			include_once "includes/script.php";
		?>													
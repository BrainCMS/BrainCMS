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
						Give <?php echo admin::EditUserOfTheWeek("username"); ?>  user of the week
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							<?php admin::EditUserOfTheWeek("username"); 
								admin::UpdateUserOfTheWeek();
							?>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Username</label>
								<div class="col-sm-10">
									<?php echo admin::EditUserOfTheWeek("username"); ?>
									<input type="hidden"  value="<?php echo admin::EditUserOfTheWeek("username"); ?>" name="naam" class="form-control" disable>
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Motto</label>
								<div class="col-sm-10">
								<?php echo admin::EditUserOfTheWeek("motto"); ?>
									<input type="hidden"  value="<?php echo admin::EditUserOfTheWeek("motto"); ?>" name="motto" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">UOTW text</label>
								<div class="col-sm-10">
									<input type="txt"  value="" name="uftwtext" class="form-control">
								</div>
							</div>
							<br><br>
							
							<button style="width: 140px;
							float: right;
						margin-right: 14px;" name="update" type="submit" class="btn btn-success">Save UOTW</button></form>
						
					</div>
				</section>
			</div>
		</div>
		<?php
			include_once "includes/footer.php";
			include_once "includes/script.php";
		?>																				
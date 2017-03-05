
<?php
	include_once "../includes/settings.php";
	Users::loggedNo();
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
						Social
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							<?php admin::EditSocial("facebook"); 
								admin::UpdateSocial();
								
							?>
							<h2>Social Instellingen</h2><hr>
							
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Facebook</label>
								<div class="col-sm-10">
									<input type="hidden"  value="<?php echo admin::EditSocial("id"); ?>" name="id" class="form-control">
									<input type="text"  value="<?php echo admin::EditSocial("facebook"); ?>" name="facebook" class="form-control">
								</div>
							</div>
							<br><br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Skype</label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo admin::EditSocial("skype"); ?>" name="skype" class="form-control">
								</div>
							</div>
							<br><br>
							
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Twitter</label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo admin::EditSocial("twitter"); ?>" name="twitter" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Google+</label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo admin::EditSocial("google"); ?>" name="google" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Youtube</label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo admin::EditSocial("youtube"); ?>" name="youtube" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Instagram</label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo admin::EditSocial("instagram"); ?>" name="instagram" class="form-control">
								</div>
							</div>
							<br><br>
							<button style="width: 140px;
							float: right;
						margin-right: 14px;" name="update" type="submit" class="btn btn-success">Social opslaan</button></form>
						
					</div>
				</section>
			</div>
			
			</form>
		</div>
		<?php
			include_once "includes/footer.php";
			include_once "includes/script.php";
		?>									a		
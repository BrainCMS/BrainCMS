<?php
	include_once "includes/head.php";
	include_once "includes/header.php";
	include_once "includes/navi.php";
	admin::CheckRank(7);
?>
<aside class="right-side">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<section class="panel">
					<header class="panel-heading">
						Edit <?php echo admin::EditUser("username"); ?>'s Account
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							<?php admin::EditUser("username"); 
								admin::UpdateUser();
							?>
							<h2>Account Details</h2><hr>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Username</label>
								<div class="col-sm-10">
									<?php echo admin::EditUser("username"); ?>
									<input type="hidden"  value="<?php echo admin::EditUser("username"); ?>" name="naam" class="form-control" disable>
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">E-Mail</label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo admin::EditUser("mail"); ?>" name="mail" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Motto</label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo admin::EditUser("motto"); ?>" name="motto" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Rank</label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo admin::EditUser("rank"); ?>" name="rank" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Team Rank</label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo admin::EditUser("teamrank"); ?>" name="teamrank" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Credits</label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo admin::EditUser("credits"); ?>" name="credits" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Duckets</label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo admin::EditUser("activity_points"); ?>" name="activity_points" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Diamonds</label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo admin::EditUser("vip_points"); ?>" name="vip_points" class="form-control">
								</div>
							</div>
							<br><br>
							<button style="width: 140px;
							float: right;
						margin-right: 14px;" name="update" type="submit" class="btn btn-success">Save Edits</button></form>
						<!--<?php
							if (User::userData('rank') > '7')
							{
								echo'<a href="gebruiker.php?user='. admin::EditUser("username") .'&delete='. admin::EditUser("id") .'">
								<button style="width: 160px;
								float: right;
								margin-right: 14px;" name="delete" type="submit" class="btn btn-danger">Gebruiker verwijderen</button>
								</a><form action="client.php" method="POST" target="_blank">
								<input type="hidden" name="sso" value='. admin::EditUser("username") .'>
								<button style="width: 140px;
								float: right;
								margin-right: 14px;" name="postsso" type="submit" class="btn btn-default">Hotel in met '.admin::EditUser("username").'</button>
								</form>';
							}
							echo'';
						?>-->
					</div>
				</section>
			</div>
		</div>
		<?php
			include_once "includes/footer.php";
			include_once "includes/script.php";
		?>																				
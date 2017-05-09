<?php
	include_once "includes/head.php";
	include_once "includes/header.php";
	include_once "includes/navi.php";
	admin::CheckRank(7);
?>
<script src="js/ckeditor/ckeditor.js"></script>
<aside class="right-side">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<section class="panel">
					<header class="panel-heading">
						<b><?php echo admin::LookSollie("username"); ?>'s Application</b>.
					</header>
					<div class="panel-body">
						<?php admin::DeleteSollie(); ?>
						<div class="col-md-6">
							Username:<br><b><?php echo admin::LookSollie("username"); ?></b> <br><br>
							Real Name:<br><b><?php echo admin::LookSollie("realname"); ?></b> <br><br>
							Age:<br><b><?php echo admin::LookSollie("age"); ?></b> <br><br>
							Skype:<br><b><?php echo admin::LookSollie("skype"); ?></b> <br><br>
							Rank:<br><b><?php echo admin::LookSollie("functie"); ?></b> <br><br>
							Number of hours online per week:<br><b><?php echo admin::LookSollie("onlinetime"); ?></b> <br><br>
							Experience at other hotels:<br><b><?php echo admin::LookSollie("experience"); ?></b> <br><br>
						</div>
						<div class="col-md-6">
							If 2 people have an argument:<br><b><?php echo admin::LookSollie("quarrel"); ?></b> <br><br>
							Trust and Serious:<br><b><?php echo admin::LookSollie("serious"); ?></b> <br><br>
							What Can you bring to the Hotel:<br><b><?php echo admin::LookSollie("improve"); ?></b> <br><br>
							Date of apply:<br><b><?php echo date('d-m-Y H:i', admin::LookSollie("date")) ?></b> <br><br>
							IP of the User:<br><b><?php echo admin::LookSollie("ip"); ?></b> <br><br>
							<?php
								if (User::userData('rank') > '8')
								{
								?>
								<a href = "<?php echo''.$config['hotelUrl'].'/adminpan/sollielook/delete/'.admin::LookSollie("id").'' ?>"><button style="width: 200px;
									float: left;
									margin-right: 14px;" value="<?php echo admin::LookSollie("id"); ?>" name="DeleteSollieNow" type="submit" class="btn btn-danger">Remove Application</button>
								</a></div>
								<?php
								}
								else{
								?>
								<?php
								}
						?>
					</div>
				</div>
			</div>
			<?php
				include_once "includes/footer.php";
				include_once "includes/script.php";
			?>												
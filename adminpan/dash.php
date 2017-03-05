<?php
	include_once "includes/head.php";
	include_once "includes/header.php";
	include_once "includes/navi.php";
	$_SESSION['title'] = '';
	$_SESSION['slogan'] = '';
	$_SESSION['news'] ='';
?>
<aside class="right-side">
	<section class="content">
		<!-- Main row -->
		<div class="row">
			<div class="col-md-8">
				<!--earning graph start-->
				<section class="panel">
					<header class="panel-heading">
						<b>   The Staff Panel used in <?= $config['hotelName'] ?> Hotel.</b><br>
					</header>
					<div class="panel-body">
						<?php 
							checkVersion();
						?>
						Welcome to <?= $config['hotelName'] ?> Hotel's Housekeeping<b></b>!<br>
						Use the Admin Panel as it should, rules are rules and arrangements have been agreed.						
                        <br>Everything you do here we can figure out.
						<br>
						<br>
						<br>It may be that not everything works and that there are few functions.
						<br>We're going to quietly build and grow longer and longer during the months!
						<br>
						<br>
						If something does not work you should report it to <b> <?= $config['hotelName'] ?> Owner</b>.
						<br>Then he can do something to fix/improve it!
					</div>
				</section>
				<!--earning graph end-->
			</div>
			<div class="col-lg-4">
				<!--chat start-->
				<section class="panel">
					<header class="panel-heading">
						<b>   USING THE ADMIN PANEL </b>
					</header>
					<div class="panel-body">
						<div class="alert alert-block alert-danger">
							<button data-dismiss="alert" class="close close-sm" type="button">
								<i class="fa fa-times"></i>
							</button>
							<strong>The housekeeping is intended not to fool around but to make it easier to manage things, If you're caught fooling around in the Housekeeping of <?= $config['hotelName'] ?>, You are going to get deranked!
							</div>
						</div>
					</section>
				</div>
			</div>
			<?php
				include_once "includes/footer.php";
				include_once "includes/script.php";
			?>					
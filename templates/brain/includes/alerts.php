<style type="text/css">
		.box {
			padding: 0px 10px 0px 10px;
		}
	</style>
	<?php
		$bankCount = $dbh->prepare("SELECT userid,diamonds FROM referrerbank WHERE userid = :userid && diamonds != '0'");
		$bankCount->bindParam(':userid', $_SESSION['id']);
		$bankCount->execute();
		if($bankCount->RowCount() > 0 && $config['alertReferrer'] == true)
		{
			echo "
				<div class='box'>
					<div class='title red'>
						".$lang['Adiamondsclaim']." 
					</div>
				</div>";
		}
		if($config['alert'] !== 'nomessage' && $config['alert'] !== '')
		{
			echo "
				<div class='box'>
					<div class='title red'>
						".$lang['AadminMessage'] . '<b>'. $config['alert']."</b> 
					</div>
				</div>";
		}
	?>
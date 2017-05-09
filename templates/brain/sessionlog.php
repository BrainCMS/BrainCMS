<?php
	include_once 'includes/header.php';
?>
<title><?= $config['hotelName'] ?>: <?= $lang["Ssettings"] ?></title>
<div class="center">
	<?php
		include_once 'includes/alerts.php';
	?>
	<div style="width: 100%;" class="columleft">
		<div class='box'>
			<div class='title green'>Login geschiedenis</div>
			<div class='mainBox'>
				<table>
					<tr>
						<th>IP</th>
						<th>Datum</th>
						<th>Browser</th>
					</tr>
					<?php
						$getUserSessions = $dbh->prepare("SELECT userid,ip,date,browser FROM user_session_log WHERE userid = :id order by date DESC");
						$getUserSessions->bindParam(':id', $_SESSION['id']);
						$getUserSessions->execute();
						while ($getUserSessionsData = $getUserSessions->fetch())
						{
							$hidIp = preg_replace("/(\d+\.\d+\.)\d+\.\d+/", "$1**.**", $getUserSessionsData['ip']);
							echo '
							<tr>
							<td>'.$hidIp.'</td>
							<td>'.gmdate("d-m-Y H:i:s", $getUserSessionsData['date']).'</td>
							<td>'.$getUserSessionsData['browser'].'</td>
							</tr>
							';
						}
					?>
				</table>
			</div>
		</div>
	</div>
	<?php
		include_once 'includes/footer.php';
	?>
</div>
</div>
</body>
</html>			
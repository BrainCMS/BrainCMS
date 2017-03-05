<?php
	if(!defined('BRAIN_CMS')) 
	{ 
		die('Sorry but you cannot access this file!'); 
	}
	
global $dbh, $config;
$hotelName = $config['hotelName'];
$belcr_get = $dbh->prepare("SELECT vip_points,username,look,motto from users WHERE rank < 5 ORDER BY `vip_points` DESC LIMIT 1");
$belcr_get->execute();
$belcr_get_info = $belcr_get->fetch();
		
$name = filter($belcr_get_info['username']);
$motto = filter($belcr_get_info['motto']);
$diamanten = filter($belcr_get_info['vip_points']);
$look = filter($belcr_get_info['look']);
	
$version = file_get_contents('http://www.fizzhotel.nl/version.txt');

	//Wanneer iemand op de knop "zet uit" klikt, moet de juiste query uitgevoerd op de juiste plugin.
  if (isset($_POST['off'])) {
	$stmt = $dbh->prepare("UPDATE `simpleplugin` SET `on` = '0' WHERE `plugin` = :plugin");
	$stmt->bindParam(':plugin', $_POST['plugin']); 
	$stmt->execute(); 
  }
  	//Wanneer iemand op de knop "zet aan" klikt, moet de juiste query uitgevoerd op de juiste plugin.
  if (isset($_POST['on'])) {
	$stmt = $dbh->prepare("UPDATE `simpleplugin` SET `on` = '1' WHERE `plugin` = :plugin");
	$stmt->bindParam(':plugin', $_POST['plugin']); 
	$stmt->execute(); 
  }

//Check of simpleplugin tabel al bestaat
$dix = $dbh->prepare("SHOW TABLES LIKE 'simpleplugin'");
$dix->execute();
$dixyon = $dix->rowCount();

//Als simpleplugin tabel niet bestaat, maak de tabel aan en voeg de plugins toe aan de tabel.
if($dixyon == 0) {
	echo "table don't exist";
  $cspt = $dbh->prepare("CREATE TABLE `simpleplugin` (
  `plugin` varchar(255) DEFAULT NULL,
  `on` varchar(255) DEFAULT NULL
)");
  $cspt->execute();
  
  $ispdfsf = $dbh->prepare("INSERT INTO `simpleplugin` VALUES ('snowflakes', '1');");
  $ispdfsf->execute();
  
  $ispdfr = $dbh->prepare("INSERT INTO `simpleplugin` VALUES ('richest', '1');");
  $ispdfr->execute();
  
  $ispdvc = $dbh->prepare("INSERT INTO `simpleplugin` VALUES ('version', '0.5');");
  $ispdvc->execute();
}

function pluginData($plugin)
		{
			global $dbh;
				$stmt = $dbh->prepare("SELECT * FROM simpleplugin WHERE plugin = :plugin");
				$stmt->bindParam('plugin', $plugin);
				$stmt->execute();
				$row = $stmt->fetch();
				return filter($row['on']);
			}

$rank = User::userData('rank');

$richest = pluginData('richest');
$snowflakes = pluginData('snowflakes');
if($snowflakes == 1) {
	echo "<script type='text/javascript' src='http://fizzhotel.nl/snowstorm.js'></script>";
}else {
	
}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<style>
.simplep td {
	padding: 5px;
}
</style>

<script>

    var hotelName = <?php echo json_encode($hotelName); ?>;
	var rank = <?php echo json_encode($rank); ?>;
	var richest = <?php echo json_encode($richest); ?>;
	var thisversion = '0.5';
	
	if(richest == 1){var richestof = "<span class='label label-success'> AAN </span></li>"; var setOnOrOffR = "<form action='' method='post'><input type='text' name='plugin' value='richest' hidden><input type='submit' value='Zet uit' name='off'></form>";}else{var richestof = "<span class='label label-danger'> UIT </span></li>"; var setOnOrOffR = "<form action='' method='post'><input type='text' name='plugin' value='richest' hidden><input type='submit' value='Zet aan' name='on'></form>";}
			
	var snowflakes = <?php echo json_encode($snowflakes); ?>;
	if(snowflakes == 1){var snowflakesof = "<span class='label label-success'> AAN </span></li>"; var setOnOrOffSf = "<form action='' method='post'><input type='text' name='plugin' value='snowflakes' hidden><input type='submit' value='Zet uit' name='off'></form>"; }else{var snowflakesof = "<span class='label label-danger'> UIT </span></li>"; var setOnOrOffSf = "<form action='' method='post'><input type='text' name='plugin' value='snowflakes' hidden><input type='submit' value='Zet aan' name='on'></form>"; }
	
if(count === 0) {

}else {
	$(".boxfooter").append(" | Made Possible By: simplePLUGIN");
}

if(count === 0) {

}else {
	$(".footer-main").append(" | Made Possible By: simplePLUGIN");
}

//Als Richest aan staat dan 
if(richest === '1') {
	//check of je op /me pagina bent
if(window.location.pathname === "/me") {
	//Check of het script al is uitgevoerd
if(count === 0) {
	
} 
else 
{
	var name = <?php echo json_encode($name); ?>;
	var motto = <?php echo json_encode($motto); ?>;
	var diamanten = <?php echo json_encode($diamanten); ?>;
	var look = <?php echo json_encode($look); ?>;
	
	$(".columright").prepend("<div class='box'><div class='title lblue'>Rijkste " + hotelName + " op dit moment</div><div class='mainBox' style='float:left'><div class='userNew' style='height: 110px;  background: url(https://avatar-retro.com/habbo-imaging/avatarimage?figure="+ look + "&direction=2&head_direction=3&action=crr=667&gesture=sml);float: left;background-repeat: no-repeat;'></div> <div style='width: 100%;'>Naam: <b>"+ name +"</b></div> <div style='width: 100%;'>Motto: <b>"+motto+"</b></div> <div style='width: 100%;'><h4>"+name+" heeft in totaal <span style='color: #158cba;'>"+diamanten+" diamanten</span> en hiermee de meeste van "+hotelName+"!</h4></div></div></div>");
}
} else {
	
}}

//VersionCheck

if(window.location.pathname === "/adminpan/dash") {
	//Als je op /adminpan/dash pagina bent dan
	if(count === 0) {
		//Als de count op 0 staat dan
	}
	else {
				//Als count niet op 0 staat, check simplePLUGIN versie
				var version = <?php echo json_encode($version); ?>;
				//Als versie klopt met de versie op de server, laat een goedkeuringsmelding zien
				if(version === thisversion) {
					$(".panel-body").first().prepend("<div style='width: 100%;background-color: green;border-radius: 5px;padding: 10px;color: white;margin-bottom: 10px;font-size: 17px;'>Deze versie van simplePLUGIN is up-to-date! Versie: "+thisversion+"</div>");
					
				} else {
					//Als de versie afwijkt van de versie op de server, laat dan een foutmelding zien
					$(".panel-body").first().prepend("<div style='width: 100%;background-color: red;border-radius: 5px;padding: 10px;color: white;margin-bottom: 10px;font-size: 17px;'> Deze versie van simplePLUGIN is out-dated! Graag updaten! Nieuwe Versie: "+version+"</div>");
					
				}
				


} 
}else {
	
}

//PluginPanel

if(rank >= 8) {
if(window.location.pathname === "/adminpan/dash") {
	//Als je op /adminpan/dash bent dan..
	if( count === 0 ) {
		//Als pluginPanelSpawn gelijk staat aan 0 dan..
		//Helemaal niks doen, want de Plugin Panel staat er al.
	} else {
		//Als pluginPanelSpawn niet gelijk staat aan 0 dan..
		//Spawn de plugin panel want die is er nog niet.
		$(".panel").first().after("<section class='panel'><header class='panel-heading'><b>Het simplePLUGIN panel voor "+hotelName+ " Hotel.</b><br></header><div class='panel-body'>Via dit paneel kan je simplePLUGINS in " +hotelName+" hotel aan en uit zetten naar jouw wensen! <br> <table class='simplep'><tr><td>Rijkste "+hotelName+"</td><td>"+richestof+"</td><td>"+ setOnOrOffR +"</tr><tr><td>Sneeuwvlokjes</td><td>"+snowflakesof+"</td><td>"+setOnOrOffSf+"</td></tr></table></div></section>");
	}
	
} else {
	//Als je niet op /admin/dash bent dan..
}} else {
	//Als rank niet gelijk is aan of boven 8.
}

var count = 0;

</script>
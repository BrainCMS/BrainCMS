<?php
	staffCheck();
	Game::sso('client');	
	Game::homeRoom();	
	
?>
<html>
</body>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title><?= $config['hotelName'] ?> - Game</title>
	<script src="/templates/brain/client/js/jquery-latest.js" type="text/javascript"></script>
	<script src="/templates/brain/client/js/jquery-ui.js" type="text/javascript"></script>
	<script src="/templates/brain/client/js/flashclient.js"></script>
	<script src="/templates/brain/client/js/flash_detect_min.js"></script>
	<script src="/templates/brain/client/js/client.js" type="text/javascript"></script>
</head>
<body>
	<center>
		<div id="client-ui">
			<div id="client" style='position:absolute; left:0; right:0; top:0; bottom:0; overflow:hidden; height:100%; width:100%;'></div>
		</div>
		<script>
			var Client = new SWFObject("<?= $hotel['swfFolderSwf'] ?>", "client", "100%", "100%", "10.0.0");
			Client.addVariable("client.allow.cross.domain", "0"); 
			Client.addVariable("client.notify.cross.domain", "1");
			Client.addVariable("connection.info.host", "<?= $hotel['emuHost'] ?>");
			Client.addVariable("connection.info.port", "<?= $hotel['emuPort'] ?>");
			Client.addVariable("site.url", "<?= $config['hotelUrl'] ?>");
			Client.addVariable("url.prefix", "<?= $config['hotelUrl'] ?>"); 
			Client.addVariable("client.reload.url", "<?= $config['hotelUrl'] ?>/me");
			Client.addVariable("client.fatal.error.url", "<?= $config['hotelUrl'] ?>/me");
			Client.addVariable("client.connection.failed.url", "<?= $config['hotelUrl'] ?>/me");
			Client.addVariable("external.override.texts.txt", "<?= $hotel['external_Texts_Override'] ?>"); 
			Client.addVariable("external.override.variables.txt", "<?= $hotel['external_Variables_Override'] ?>"); 	
			Client.addVariable("external.variables.txt", "<?= $hotel['external_Variables'] ?>");
			Client.addVariable("external.texts.txt", "<?= $hotel['external_Texts'] ?>"); 
			Client.addVariable("external.figurepartlist.txt", "<?= $hotel['figuredata'] ?>"); 
			Client.addVariable("flash.dynamic.avatar.download.configuration", "<?= $hotel['figuremap'] ?>");
			Client.addVariable("productdata.load.url", "<?= $hotel['productdata'] ?>"); 
			Client.addVariable("furnidata.load.url", "<?= $hotel['furnidata'] ?>");
			Client.addVariable("use.sso.ticket", "1"); 
			Client.addVariable("sso.ticket", "<?= User::userData('auth_ticket') ?>");
			Client.addVariable("processlog.enabled", "0");
			Client.addVariable("client.starting", "<?= $config['hotelName'] ?> is loading...");
			Client.addVariable("flash.client.url", "<?= $hotel['swfFolder'] ?>/"); 
			Client.addVariable("flash.client.origin", "popup");
			Client.addVariable("nux.lobbies.enabled", "true");
			Client.addVariable("country_code", "NL");
			Client.addParam('base', '<?= $hotel['swfFolder'] ?>/');
			Client.addParam('allowScriptAccess', 'always');
			Client.addParam('menu', false);
			Client.addParam('wmode', "opaque");
			Client.write('client');
			
			FlashExternalInterface.signoutUrl = "<?= $config['hotelUrl'] ?>/logout";
		</script>
	</center>
</body>
</html>
</center>
</div>
<script>
	//no flash?!
	if(!FlashDetect.installed){
		window.location.href = "<?= $config['hotelUrl'] ?>/noflash.php"; 	
	}
</script>
</head>







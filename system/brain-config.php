<?php
	if(!defined('BRAIN_CMS')) 
	{ 
		die('Sorry but you cannot access this file!'); 
	}
	
	/* Database Setting */
	$db['host'] = '127.0.0.1'; //Mysql's Host
	$db['port'] = '3306'; //Mysql's port
	$db['user'] = "root"; //Mysql's user
	$db['pass'] = '*****'; //Mysql's password
	$db['db'] = "hotel"; //Mysql's database
	
	/* Emu Settings */
	$config['hotelEmu'] = 'plusemu'; // plusemu // arcturus

	/* Client Setting */
	$hotel['emuHost'] = "127.0.0.1"; //IP of VPS//IP of Proxy
	$hotel['emuPort'] = "30000";  //Port of VPS//Port of Proxy
	$hotel['staffCheckClient'] = false; //Enable the staff pin in the client (true) or disable it (false)
	$hotel['staffCheckClientMinimumRank'] = 3; //Minium staff rank to get the staff pin in the client
	$hotel['homeRoom'] = '0'; //Set the start room when you get in the hotel
	$hotel['external_Variables'] = "http://127.0.0.1/swf/gamedata/external_variables.txt";
	$hotel['external_Variables_Override'] = "http://127.0.0.1/swf/gamedata/override/external_override_variables.txt";
	$hotel['external_Texts'] = "http://127.0.0.1/swf/gamedata/external_flash_texts.txt";
	$hotel['external_Texts_Override'] = "http://127.0.0.1/swf/gamedata/override/external_flash_override_texts.txt";
	$hotel['productdata'] = "http://127.0.0.1/swf/gamedata/productdata.txt";
	$hotel['furnidata'] = "http://127.0.0.1/swf/gamedata/furnidata.xml";
	$hotel['figuremap'] = "http://127.0.0.1/swf/gamedata/figuremap.xml";
	$hotel['figuredata'] = "http://127.0.0.1/swf/gamedata/figuredata.xml";
	$hotel['swfFolder'] = "http://127.0.0.1/swf/gordon/PRODUCTION-201701242205-837386173";
	$hotel['swfFolderSwf'] = "http://127.0.0.1/swf/gordon/PRODUCTION-201701242205-837386173/Habbo.swf";
	
	/* Website Setting */
	$config['hotelUrl'] = "http://127.0.0.1";//Address of your hotel. Does not end with a "/"
	$config['skin'] = "brain"; //Skin/template of your website
	$config['lang'] = "en"; //Language of your website /en/nl/es
	$config['hotelName'] = "Brain"; //Name of your hotel
	$config['favicon'] = "http://127.0.0.1/templates/brain/style/images/favicon/favicon.ico";
	$config['staffCheckHk'] = false; //Enable the staff pin in the housekeeping (true) or disable it (false)
	$config['staffCheckHkMinimumRank'] = 3; //Minium staff rank to get the staff pin in the housekeeping
	$config['maintenance'] = false; //Enable the maintenance of your website (true) or disable it (false)
	$config['maintenancekMinimumRankLogin'] = 3; //Minium staff rank to login when the website is in maintenance
	$config['groupBadgeURL'] = "http://127.0.0.1/swf/habbo-imaging/badge.php?badge=";
	$config['badgeURL'] = "http://127.0.0.1/swf/c_images/album1584/"; 
	$config['userLikeEnable'] = true; // Enable user likes 
	$config['newsCommandEnable'] = true; //Enable news commands
	$config['newsCommandFilter'] = true; //Enable wordfilter on news commands (the filter use the db tabels wordfilter and wordfilter_characters)
	
	/* Facebook Login Settings
		You need a Facebook app for this to work go to
		https://developers.facebook.com/apps/ */
	 
	$config['facebookLogin'] = false; //Enable the Facebook login (true) or disable it (false)
	$config['facebookAPPID'] = '334162590sdaf292528';
	$config['facebookAPPSecret'] = 'ce2504ff5adsfa3ff7a6a2fa6d984cd8836';
	
	/* Email Settings */
	$email['mailServerHost'] = 'smtp.gmail.com';
	$email['mailServerPort'] = 587;
	$email['SMTPSecure'] = 'TLS';
	$email['mailUsername'] = 'gmail@gmail.com';
	$email['mailPassword'] = '*****';
	$email['mailLogo'] = 'http://127.0.0.1/templates/brain/style/images/logo/logo.png';
	$email['mailTemplate'] = '/system/app/plugins/PHPmailer/temp/resetpassword.html';
	
	/* Social settings */
	$config['facebook'] = 'https://www.facebook.com/Habbo/';
	$config['facebookEnable'] = false;
	$config['twitter'] = 'https://twitter.com/Habbo';
	$config['twitterEnable'] = false;
	
	/* Register Setting */
	$config['startMotto'] = "Welkom in Brain!"; //Regsiter start motto
	$config['credits']	= "10000";
	$config['duckets']	= "20000";
	$config['diamonds']	= "10";
	$config['diamondsRef']	= "10";
	$config['registerEnable'] = true;
	
	/* Google recaptcha Site Key  
	   Go to this website to create a recaptcha Site Key: https://www.google.com/recaptcha/intro/index.html	*/
	$config['recaptchaSiteKey'] = "6LdzewwUAAAAABkJ3vsdfCDca9qmLGDaWAHqMRtFEs2";
	$config['recaptchaSiteKeyEnable'] = false;
	
	/* Buy VIP Settings */
	$config['vipCost'] = "25";
	$config['vipRankToGet'] = "3";
	$config['vipBadge'] = "vip";
?>
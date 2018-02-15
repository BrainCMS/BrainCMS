<?php
	if(!defined('BRAIN_CMS')) {
        die('Sorry but you cannot access this file!');
    }
	
	/* ---- MySQL ---- */
	$db['host'] = '127.0.0.1'; // IP or localhost.
	$db['port'] = '3306';      // The default port number is 3306.
	$db['user'] = "root";      // Database Username
	$db['pass'] = '*****';     // Database Password
	$db['db'] = "hotel";       //Mysql's database
	
	/* ---- Emulator ---- */
	$config['hotelEmu'] = 'plusemu'; // plusemu // arcturus

	/* ---- Client ---- */
	$hotel['emuHost'] = "91.134.247.208";        // Server/Proxy IP
	$hotel['emuPort'] = "30000";                 // Server/Proxy Port
	$hotel['staffCheckClient'] = false;          // Enable (true) or Disable (false) client passcode for staff
	$hotel['staffCheckClientMinimumRank'] = 3;   // Minimum rank before requiring a pin (We recommend at least 3 if enabled)
	$hotel['homeRoom'] = '0';                    // Set the welcome room (Room ID)
	$hotel['external_Variables'] = "/swf/gamedata/external_variables.txt"; // REQUIRED
	$hotel['external_Variables_Override'] = "/swf/gamedata/override/external_override_variables.txt"; // OPTIONAL
	$hotel['external_Texts'] = "/swf/gamedata/external_flash_texts.txt"; // REQUIRED
	$hotel['external_Texts_Override'] = "/swf/gamedata/override/external_flash_override_texts.txt"; // OPTIONAL
	$hotel['productdata'] = "/swf/gamedata/productdata.txt"; // REQUIRED
	$hotel['furnidata'] = "/swf/gamedata/furnidata.xml"; // REQUIRED
	$hotel['figuremap'] = "/swf/gamedata/figuremap.xml"; // REQUIRED
	$hotel['figuredata'] = "/swf/gamedata/figuredata.xml"; // REQUIRED
	$hotel['swfFolder'] = "/swf/gordon/PRODUCTION-201701242205-837386173"; // REQUIRED
	$hotel['swfFolderSwf'] = "/swf/gordon/PRODUCTION-201701242205-837386173/habbo.swf"; // REQUIRED
	$hotel['onlineCounter'] = true;     // Enable the online user count in-game
	$hotel['diamonds.enabled'] = true;  // Enable diamonds? Diamonds are a secondary base currency
	
	/* ---- CMS ---- */
	$config['hotelUrl'] = "http://127.0.0.1";    // Your domain - don't include a trailing slash at the end
	$config['skin'] = "brain";                   // Which template do you wish to use in a live production environment (upload to /templates/<SkinName>)
	$config['lang'] = "en";                      // Set the CMS language (en/nl/es)
	$config['hotelName'] = "Brain";              // Hotel name
	$config['favicon'] = "/favicon.ico";         // Recommend to upload your favicon to root.
	$config['staffCheckHk'] = false;             // Enable (true) or Disable (false) staff passcode for Housekeeping
	$config['staffCheckHkMinimumRank'] = 3;      // Minimum rank before requiring a pin (We recommend at least 3 if enabled)
	$config['maintenance'] = false;              // Enable (true) or Disable (false) maintenance mode (/system/maintenance)
	$config['maintenancekMinimumRankLogin'] = 3; // Minimum rank to allow access when maintenance mode is enabled
	$config['groupBadgeURL'] = "/swf/habbo-imaging/badge.php?badge="; // REQUIRED
	$config['badgeURL'] = "/swf/c_images/album1584/";  // REQUIRED
	$config['userLikeEnable'] = true;            // Enable user likes across the CMS
	$config['newsCommandEnable'] = true;         //Enable news commands
	$config['newsCommandFilter'] = true;         //Enable wordfilter on news commands (the filter use the db tabels wordfilter and wordfilter_characters)
	$config['alertReferrer'] = true;
	$config['alert'] = 'BrainCMS Beta';          //Alert message. If you don't want a alert, you fill in 'nomessage' or you do leave it blank.
	$config['brainversion'] = '1.8.1';           // Please do not change.
	
	/* ---- Facebook ---- */
	/* ----
        You will need to setup a Facebook App for this plugin to work
        Facebook Developers:
        https://developers.facebook.com/apps
    ---- */
	 
	$config['facebookLogin'] = false; // Enable (true) or Disable (false) logging in with Facebook
	$config['facebookAPPID'] = '334162590sdaf292528'; // Facebook App ID
	$config['facebookAPPSecret'] = 'ce2504ff5adsfa3ff7a6a2fa6d984cd8836'; // Facebook App Secret Key
	
	
	/* ---- Email & SMTP ---- */
	$email['mailServerHost'] = 'smtp.gmail.com'; // Host
	$email['mailServerPort'] = 587; // 25/465/587. We suggest using port 587 with TLS.
	$email['SMTPSecure'] = 'TLS'; // Connection type
	$email['mailUsername'] = 'gmail@gmail.com'; // SMTP username (email)
	$email['mailPassword'] = '*****'; // SMTP password
	$email['mailLogo'] = 'http://yourhotellink.org/templates/brain/style/images/logo/logo.png'; // Hotel logo
	$email['mailTemplate'] = '/system/app/plugins/PHPmailer/temp/resetpassword.html'; // Email template
	
	/* ---- Social Media ---- */
	$config['facebook'] = 'https://www.facebook.com/Habbo/'; // Facebok page
	$config['facebookEnable'] = false;                       // Enable (true) or Disable (false) Facebook widget
	$config['twitter'] = 'https://twitter.com/Habbo';        // Twitter profile
	$config['twitterEnable'] = false;                        // Enable (true) or Disable (false) Twitter widget
	
	/* ---- Registration  ---- */
	$config['startMotto'] = "Welkom in Brain!";  // Default motto
	$config['credits']	= "10000";               // Starting credit currency
	$config['duckets']	= "20000";               // Starting duckets currency
	$config['diamonds']	= "10";                  // Starting diamonds currency
	$config['diamondsRef']	= "10";              // How many dimaonds per a referral?
	$config['registerEnable'] = true;            // Enable (true) or Disable (false) registration (/regsiter)
	
	/* ---- reCAPTCHA  ---- */
	/* ----
        You will need to setup a reCAPTCHA Profile for this to work correctly.
        reCAPTCHA Admin Panel:
        https://www.google.com/recaptcha/admin
    ---- */

    $config['recaptchaSiteKey'] = "6LdzewwUAAAAABkJ3vsdfCDca9qmLGDaWAHqMRtFEs2";    // reCAPTCHA site key
	$config['recaptchaSiteKeyEnable'] = false;                                      // Enable (true) or Disable (false) reCAPTCHA on registration (/regsiter)
	
	/* Buy VIP Settings */
	$config['vipCost'] = "25";      // VIP price (In diamonds)
	$config['vipRankToGet'] = "3";  // Promote to rank (ID)
	$config['vipBadge'] = "vip";    // VIP badge (must be in badge_definitions table) TIP: /system/optional-extras/badge_definitions.txt
	

	/* ---- DO NOT EDIT  ---- */
	switch($config['hotelEmu'])
	{
		case "arcturus":
		$emuUse['user_wardrobe']  = 'users_wardrobe ';
		$emuUse['ip_last'] = 'ip_current';
		$emuUse['respect'] = 'respects_received';
		$emuUse['user_stats'] = 'users_settings';
		$emuUse['user_stats_user_id'] = 'user_id';
		$emuUse['OnlineTime'] = 'online_time';
		break;
		case "plusemu":
		$emuUse['user_wardrobe']  = 'user_wardrobe ';
		$emuUse['ip_last'] = 'ip_last';
		$emuUse['respect'] = 'Respect';
		$emuUse['user_stats'] = 'user_stats';
		$emuUse['user_stats_user_id'] = 'id';
		$emuUse['OnlineTime'] = 'OnlineTime';
		break;
		default:
		//Nothing
		break;
	}
?>
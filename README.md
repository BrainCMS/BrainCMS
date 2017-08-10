# BrainCMS #

BrainCMS is a [Habbo Retro][6] Content Management System ("CMS") by [RetroRipper][1]. Fancy trying a live demo of BrainCMS? Visit the [BrainCMS Demo][2]! You can also play a live Retro - Visit [https://playlegit.ca][3] running a custom version of BrainCMS.

## What's in BrainCMS? ##
- Choose the default "Home Room" via the [brain-config.php][4] file.
- Security: Client passcode
- Security: Housekeeping passcode
- User Profiles
- User of the week
- Staff page
- Team page
- Statistics page
- Application page
- In the register page Habbo Creator and Google Recaptcha
- Room visitors on the me page
- Login via Facebook
- Languages (EN_us/NL/ES)
- Housekeeping (NL and English as of v1.7.0) 

## BrainCMS Requirements ##
- PHP 5.6+
- Mysqli
- Xampp/IIS 

### Version ###
The latest stable vesion of BrainCMS is: v1.8.0.1-STABLE.

### Updated Plugins ###
    newscomment.php      / small bug fix. (Add variable $config on line 8).
    staffapplication.php / small bug fix (change on staffApplication to staffapplication on line 34).
    userhomes.php        / to update the replace it with the new userhomes.php from 1.8.0
    wardrope.php         / add a new variable $emuUse on line 8 and replace user_wardrobe with ".$emuUse['user_wardrobe']."

### New Plugins ###
	wordfilter.php // Filter plugin use te tabels wordfilter and wordfilter_characters

### Addons ###
	[Addons (or, add-ins)][5] can be installed manually by following the files inside the download(s).

### Update Classes ###
	class.admin.php  / to update the replace it with the new class.admin.php from 1.8.0  // Fix ArcturusEMU for the adminpan // Need to fix Chatlog,Private Messages,Trade logs and Banlist
    class.html.php   / add a new variable $emuUse on line 72.
    class.user.php   / to update the replace it with the new class.user.php from 1.8.0
    
### Templates ###
    settingsavatar.php / on line 39 replace user_wardrobe with ".$emuUse['user_wardrobe']."
    stats.php          / to update the replace it with the new stats.php from 1.8.0
	me.php / add look editor button on line 13.
	[New] style/images/icons/editlook.gif
    [New] style/images/icons/mostrespect.gif

### New config options ###
	Add switch statement to switching  between PlusEMU and ArcturusEMU.
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


### Adminpan ###
	sollie.php / on line 21 change staffApplication to staffapplication.
    
### New table in the database ###
	New Table structure for `ranks` it was missing form the arcturus database.
    Update 1.7.8 to 1.8.0 Only if you use arcturus!.sql




[1]: https://retroripper.com/braincms.php
[2]: https://brain.retroripper.com
[3]: https://playlegit.ca/index
[4]: https://github.com/BrainCMS/BrainCMS/wiki/How-do-I-change-the-default-home-room
[5]: https://github.com/BrainCMS/BrainCMS/tree/master/brain-addons
[6]: https://help.habbo.com/hc/en-us/articles/221642388-What-are-Retro-sites-

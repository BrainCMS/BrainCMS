# BrainCMS #

BrainCMS is a Habbo Retro CMS by [RetroRipper][1]. Looking to [demo BrainCMS][2]? You can also play [Robbo Hotel][3].

## What's in BrainCMS? ##
- Choose start room in the brain-config.php file.
- Staff Pin
- User Home's
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
The latest stable vesion of BrainCMS is: v1.7.0

### Updated ###
	Userlike.php // You can now enable or disable it
	simpleFriendsHome.php //language changed
	simpleFriends.php // Add images
	newscomment.php // You can now enable or disable it
	habbooftheweek.php //online status and badge

### New Plugins ###
	wordfilter.php // Filter plugin use te tabels wordfilter and wordfilter_characters

### Update Classes ###
	None

### Ttemplates ###
	news.php // Edit php to enable or disable the news commands
	roomcount.php // If there are no users in a room, You get to see that
	me.php // Edit the group display, If there are no groups You get to see that
	home.php // Edit language

### New config options ###
	$config['userLikeEnable'] = true;
	$config['newsCommandEnable'] = true;
	$config['newsCommandFilter'] = true;


### Adminpan ###
	English added
    
### New table in the database ###
	wordfilter_characters




[1]: https://retroripper.com/braincms.php
[2]: https://brain.retroripper.com
[3]: https://robbo.pw
### Version ###
The latest stable vesion of BrainCMS is [v1.8.0.1][1].

### Core ###
	None

### Plugins ###
	None

### Classes ###
	None

### Templates ###
	None
    
### Configuration ###
	None

### Admin ###
	None
    
### MySQL ###
	None
    
### Notes ###
	Added BrainCMS Addons (By RetroRipper)
    > Password Reset (SMTP): 13-12-2016 11:34:20
    > By VIP Membership: 11-12-2016 10:11:08
    GitHub Wiki is here (sample: [How do I change the default home room?][2]).
    
### Version ###
BrainCMS [v1.7.2][1].

### Core ###
	None

### Plugins ###
	Updated: passwordforgot.php [Line 63]

### Classes ###
	None

### Templates ###
	Add: \templates\brain\style\css\index\style.css > .buttonforgottxt .buttonforgot .buttonforgot:hover
	Add: \templates\brain\index.php > Forgot password link (/index)
    
### Configuration ###
	None


### Admin ###
	None
    
    
### MySQL ###
	None
    

BrainCMS v[1.7.0][1]:

### Core ###
	None

### Updated Plugins ###
	Userlike.php // You can now enable or disable it
	simpleFriendsHome.php //language changed
	simpleFriends.php // Add images
	newscomment.php // You can now enable or disable it
	habbooftheweek.php //online status and badge

### New Plugins ###
	wordfilter.php // Filter plugin use the wordfilter and wordfilter_characters tables

### Classes ###
	None

### Templates ###
	news.php // Edit php to enable or disable the news commands
	roomcount.php // If there are no users in a room, You get to see that
	me.php // Edit the group display, If there are no groups You get to see that
	home.php // Edit language
    
### Configuration ###
	$config['userLikeEnable'] = true;
	$config['newsCommandEnable'] = true;
	$config['newsCommandFilter'] = true;


### Admin ###
	English (en_US) translation added.
    
    
### MySQL ###
	wordfilter_characters (New Table)
    
[1]: https://github.com/BrainCMS/BrainCMS/releases
[2]: https://github.com/BrainCMS/BrainCMS/wiki/How-do-I-change-the-default-home-room
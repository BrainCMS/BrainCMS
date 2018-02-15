DROP TABLE IF EXISTS `users_like`;
CREATE TABLE `users_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) DEFAULT NULL,
  `likefrom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

ALTER TABLE users ADD user_likes int(11) DEFAULT 0;

DROP TABLE IF EXISTS `uotw`;
CREATE TABLE `uotw` (
  `userid` varchar(255) DEFAULT NULL,
  `text` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `uotw` VALUES ('1', 'I love Brain');

DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `badgeid` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO `teams` VALUES ('1', 'Spam Team', 'SPAM');
INSERT INTO `teams` VALUES ('3', 'Bouw Team', 'BOUW');
INSERT INTO `teams` VALUES ('4', 'Event Team', 'EVENT');
INSERT INTO `teams` VALUES ('5', 'Pixelaar', 'PIXEL');
INSERT INTO `teams` VALUES ('6', 'Gok Team', 'GOK');

DROP TABLE IF EXISTS `staffapplication`;
CREATE TABLE `staffapplication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text,
  `realname` text,
  `skype` text,
  `age` text,
  `functie` text,
  `onlinetime` text,
  `experience` text,
  `quarrel` text,
  `serious` text,
  `improve` text,
  `microphone` text,
  `ip` text,
  `date` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `resetpassword`;
CREATE TABLE `resetpassword` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `resetkey` varchar(255) DEFAULT NULL,
  `enable` enum('0','1') DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `referrerbank`;
CREATE TABLE `referrerbank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) DEFAULT NULL,
  `diamonds` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `referrer`;
CREATE TABLE `referrer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` decimal(10,0) DEFAULT NULL,
  `refid` decimal(10,0) DEFAULT NULL,
  `diamonds` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE users ADD pin VARCHAR(4);
ALTER TABLE users ADD teamrank int(1) DEFAULT 0;
ALTER TABLE users ADD fbid varchar(255) DEFAULT NULL;
ALTER TABLE users ADD fbenable  enum('0','1','2') DEFAULT 2;

DROP TABLE IF EXISTS `cms_news_message`;
CREATE TABLE `cms_news_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(11) NOT NULL DEFAULT '0',
  `newsid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `message` varchar(250) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `cms_news_like`;
CREATE TABLE `cms_news_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(255) DEFAULT NULL,
  `newsid` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for `cms_news`
-- ----------------------------
DROP TABLE IF EXISTS `cms_news`;
CREATE TABLE `cms_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT '0',
  `shortstory` text NOT NULL,
  `longstory` text NOT NULL,
  `author` varchar(100) NOT NULL DEFAULT 'Tom',
  `date` int(11) NOT NULL DEFAULT '0',
  `type` varchar(100) NOT NULL DEFAULT '1',
  `roomid` varchar(100) NOT NULL DEFAULT '1',
  `updated` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `wordfilter_characters`;
CREATE TABLE `wordfilter_characters` (
  `character` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `replacement` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of wordfilter_characters
-- ----------------------------
INSERT INTO `wordfilter_characters` VALUES ('Ã†', 'A');
INSERT INTO `wordfilter_characters` VALUES ('Ã', 'A');
INSERT INTO `wordfilter_characters` VALUES ('Ã‚', 'A');
INSERT INTO `wordfilter_characters` VALUES ('Ãƒ', 'A');
INSERT INTO `wordfilter_characters` VALUES ('Ã€', 'A');
INSERT INTO `wordfilter_characters` VALUES ('Ä‚', 'A');
INSERT INTO `wordfilter_characters` VALUES ('Ä„', 'A');
INSERT INTO `wordfilter_characters` VALUES ('Ç¼', 'A');
INSERT INTO `wordfilter_characters` VALUES ('Ä€', 'A');
INSERT INTO `wordfilter_characters` VALUES ('Ã…', 'A');
INSERT INTO `wordfilter_characters` VALUES ('Ã„', 'A');
INSERT INTO `wordfilter_characters` VALUES ('Ã ', 'a');
INSERT INTO `wordfilter_characters` VALUES ('Ã¡', 'a');
INSERT INTO `wordfilter_characters` VALUES ('Ã¢', 'a');
INSERT INTO `wordfilter_characters` VALUES ('Ã£', 'a');
INSERT INTO `wordfilter_characters` VALUES ('Ã¤', 'a');
INSERT INTO `wordfilter_characters` VALUES ('Ã¥', 'a');
INSERT INTO `wordfilter_characters` VALUES ('Äƒ', 'a');
INSERT INTO `wordfilter_characters` VALUES ('Ä', 'a');
INSERT INTO `wordfilter_characters` VALUES ('Ä…', 'a');
INSERT INTO `wordfilter_characters` VALUES ('Ã¦', 'a');
INSERT INTO `wordfilter_characters` VALUES ('Ç½', 'a');
INSERT INTO `wordfilter_characters` VALUES ('Ãž', 'b');
INSERT INTO `wordfilter_characters` VALUES ('Ã¾', 'b');
INSERT INTO `wordfilter_characters` VALUES ('ÃŸ', 's');
INSERT INTO `wordfilter_characters` VALUES ('Ã‡', 'C');
INSERT INTO `wordfilter_characters` VALUES ('ÄŒ', 'C');
INSERT INTO `wordfilter_characters` VALUES ('Ä†', 'C');
INSERT INTO `wordfilter_characters` VALUES ('Äˆ', 'C');
INSERT INTO `wordfilter_characters` VALUES ('ÄŠ', 'C');
INSERT INTO `wordfilter_characters` VALUES ('Ã§', 'c');
INSERT INTO `wordfilter_characters` VALUES ('Ä', 'c');
INSERT INTO `wordfilter_characters` VALUES ('Ä‡', 'c');
INSERT INTO `wordfilter_characters` VALUES ('Ä‰', 'c');
INSERT INTO `wordfilter_characters` VALUES ('Ä‹', 'c');
INSERT INTO `wordfilter_characters` VALUES ('Ä', 'D');
INSERT INTO `wordfilter_characters` VALUES ('ÄŽ', 'D');
INSERT INTO `wordfilter_characters` VALUES ('Ä‘', 'd');
INSERT INTO `wordfilter_characters` VALUES ('Ä', 'd');
INSERT INTO `wordfilter_characters` VALUES ('Ãˆ', 'E');
INSERT INTO `wordfilter_characters` VALUES ('Ã‰', 'E');
INSERT INTO `wordfilter_characters` VALUES ('ÃŠ', 'E');
INSERT INTO `wordfilter_characters` VALUES ('Ã‹', 'E');
INSERT INTO `wordfilter_characters` VALUES ('Ä”', 'E');
INSERT INTO `wordfilter_characters` VALUES ('Ä’', 'E');
INSERT INTO `wordfilter_characters` VALUES ('Ä˜', 'E');
INSERT INTO `wordfilter_characters` VALUES ('Ä–', 'E');
INSERT INTO `wordfilter_characters` VALUES ('Ã¨', 'e');
INSERT INTO `wordfilter_characters` VALUES ('Ã©', 'e');
INSERT INTO `wordfilter_characters` VALUES ('Ãª', 'e');
INSERT INTO `wordfilter_characters` VALUES ('Ã«', 'e');
INSERT INTO `wordfilter_characters` VALUES ('Ä•', 'e');
INSERT INTO `wordfilter_characters` VALUES ('Ä“', 'e');
INSERT INTO `wordfilter_characters` VALUES ('Ä™', 'e');
INSERT INTO `wordfilter_characters` VALUES ('Ä—', 'e');
INSERT INTO `wordfilter_characters` VALUES ('Äœ', 'G');
INSERT INTO `wordfilter_characters` VALUES ('Äž', 'G');
INSERT INTO `wordfilter_characters` VALUES ('Ä ', 'G');
INSERT INTO `wordfilter_characters` VALUES ('Ä¢', 'G');
INSERT INTO `wordfilter_characters` VALUES ('Ä', 'g');
INSERT INTO `wordfilter_characters` VALUES ('ÄŸ', 'g');
INSERT INTO `wordfilter_characters` VALUES ('Ä¡', 'g');
INSERT INTO `wordfilter_characters` VALUES ('Ä£', 'g');
INSERT INTO `wordfilter_characters` VALUES ('Ä¤', 'H');
INSERT INTO `wordfilter_characters` VALUES ('Ä¦', 'H');
INSERT INTO `wordfilter_characters` VALUES ('Ä¥', 'h');
INSERT INTO `wordfilter_characters` VALUES ('Ä§', 'h');
INSERT INTO `wordfilter_characters` VALUES ('ÃŒ', 'I');
INSERT INTO `wordfilter_characters` VALUES ('Ã', 'I');
INSERT INTO `wordfilter_characters` VALUES ('ÃŽ', 'I');
INSERT INTO `wordfilter_characters` VALUES ('Ã', 'I');
INSERT INTO `wordfilter_characters` VALUES ('Ä°', 'I');
INSERT INTO `wordfilter_characters` VALUES ('Ä¨', 'I');
INSERT INTO `wordfilter_characters` VALUES ('Äª', 'I');
INSERT INTO `wordfilter_characters` VALUES ('Ä¬', 'I');
INSERT INTO `wordfilter_characters` VALUES ('Ä®', 'I');
INSERT INTO `wordfilter_characters` VALUES ('Ã¬', 'i');
INSERT INTO `wordfilter_characters` VALUES ('Ã­', 'i');
INSERT INTO `wordfilter_characters` VALUES ('Ã®', 'i');
INSERT INTO `wordfilter_characters` VALUES ('Ã¯', 'i');
INSERT INTO `wordfilter_characters` VALUES ('Ä¯', 'i');
INSERT INTO `wordfilter_characters` VALUES ('Ä©', 'i');
INSERT INTO `wordfilter_characters` VALUES ('Ä«', 'i');
INSERT INTO `wordfilter_characters` VALUES ('Ä­', 'i');
INSERT INTO `wordfilter_characters` VALUES ('Ä±', 'i');
INSERT INTO `wordfilter_characters` VALUES ('Ä´', 'J');
INSERT INTO `wordfilter_characters` VALUES ('Äµ', 'j');
INSERT INTO `wordfilter_characters` VALUES ('Ä¶', '?');
INSERT INTO `wordfilter_characters` VALUES ('Ä·', 'k');
INSERT INTO `wordfilter_characters` VALUES ('Ä¸', 'k');
INSERT INTO `wordfilter_characters` VALUES ('Ä¹', 'L');
INSERT INTO `wordfilter_characters` VALUES ('Ä»', 'L');
INSERT INTO `wordfilter_characters` VALUES ('Ä½', 'L');
INSERT INTO `wordfilter_characters` VALUES ('Ä¿', 'L');
INSERT INTO `wordfilter_characters` VALUES ('Å', 'L');
INSERT INTO `wordfilter_characters` VALUES ('Äº', 'l');
INSERT INTO `wordfilter_characters` VALUES ('Ä¼', 'l');
INSERT INTO `wordfilter_characters` VALUES ('Ä¾', 'l');
INSERT INTO `wordfilter_characters` VALUES ('Å€', 'l');
INSERT INTO `wordfilter_characters` VALUES ('Å‚', 'l');
INSERT INTO `wordfilter_characters` VALUES ('Ã‘', 'N');
INSERT INTO `wordfilter_characters` VALUES ('Åƒ', 'N');
INSERT INTO `wordfilter_characters` VALUES ('Å‡', 'N');
INSERT INTO `wordfilter_characters` VALUES ('Å…', 'N');
INSERT INTO `wordfilter_characters` VALUES ('ÅŠ', 'N');
INSERT INTO `wordfilter_characters` VALUES ('Ã±', 'n');
INSERT INTO `wordfilter_characters` VALUES ('Å„', 'n');
INSERT INTO `wordfilter_characters` VALUES ('Åˆ', 'n');
INSERT INTO `wordfilter_characters` VALUES ('Å†', 'n');
INSERT INTO `wordfilter_characters` VALUES ('Å‹', 'n');
INSERT INTO `wordfilter_characters` VALUES ('Å‰', 'n');
INSERT INTO `wordfilter_characters` VALUES ('Ã’', 'O');
INSERT INTO `wordfilter_characters` VALUES ('Ã“', 'O');
INSERT INTO `wordfilter_characters` VALUES ('Ã”', 'O');
INSERT INTO `wordfilter_characters` VALUES ('Ã–', 'O');
INSERT INTO `wordfilter_characters` VALUES ('Ã•', 'O');
INSERT INTO `wordfilter_characters` VALUES ('Ã˜', 'O');
INSERT INTO `wordfilter_characters` VALUES ('ÅŒ', 'O');
INSERT INTO `wordfilter_characters` VALUES ('ÅŽ', 'O');
INSERT INTO `wordfilter_characters` VALUES ('Å', 'O');
INSERT INTO `wordfilter_characters` VALUES ('Å’', 'o');
INSERT INTO `wordfilter_characters` VALUES ('Ã²', 'o');
INSERT INTO `wordfilter_characters` VALUES ('Ã³', 'o');
INSERT INTO `wordfilter_characters` VALUES ('Ã´', 'o');
INSERT INTO `wordfilter_characters` VALUES ('Ãµ', 'o');
INSERT INTO `wordfilter_characters` VALUES ('Ã¶', 'o');
INSERT INTO `wordfilter_characters` VALUES ('Ã¸', 'o');
INSERT INTO `wordfilter_characters` VALUES ('Å', 'o');
INSERT INTO `wordfilter_characters` VALUES ('Å', 'o');
INSERT INTO `wordfilter_characters` VALUES ('Å‘', 'o');
INSERT INTO `wordfilter_characters` VALUES ('Å“', 'o');
INSERT INTO `wordfilter_characters` VALUES ('Ã°', 'o');
INSERT INTO `wordfilter_characters` VALUES ('Å”', 'R');
INSERT INTO `wordfilter_characters` VALUES ('Å˜', 'R');
INSERT INTO `wordfilter_characters` VALUES ('Å•', 'r');
INSERT INTO `wordfilter_characters` VALUES ('Å™', 'r');
INSERT INTO `wordfilter_characters` VALUES ('Å—', 'r');
INSERT INTO `wordfilter_characters` VALUES ('Å ', 'S');
INSERT INTO `wordfilter_characters` VALUES ('Åœ', 'S');
INSERT INTO `wordfilter_characters` VALUES ('Åš', 'S');
INSERT INTO `wordfilter_characters` VALUES ('Åž', 'S');
INSERT INTO `wordfilter_characters` VALUES ('Å¡', 's');
INSERT INTO `wordfilter_characters` VALUES ('Å¤', 'T');
INSERT INTO `wordfilter_characters` VALUES ('Å›', 's');
INSERT INTO `wordfilter_characters` VALUES ('Å', 's');
INSERT INTO `wordfilter_characters` VALUES ('ÅŸ', 's');
INSERT INTO `wordfilter_characters` VALUES ('Å¦', 'T');
INSERT INTO `wordfilter_characters` VALUES ('Å¢', 'T');
INSERT INTO `wordfilter_characters` VALUES ('Å§', 't');
INSERT INTO `wordfilter_characters` VALUES ('Å£', 't');
INSERT INTO `wordfilter_characters` VALUES ('Å¥', 't');
INSERT INTO `wordfilter_characters` VALUES ('Ã™', 'U');
INSERT INTO `wordfilter_characters` VALUES ('Ãš', 'U');
INSERT INTO `wordfilter_characters` VALUES ('Ã›', 'U');
INSERT INTO `wordfilter_characters` VALUES ('Ãœ', 'U');
INSERT INTO `wordfilter_characters` VALUES ('Å¨', 'U');
INSERT INTO `wordfilter_characters` VALUES ('Åª', 'U');
INSERT INTO `wordfilter_characters` VALUES ('Å¬', 'U');
INSERT INTO `wordfilter_characters` VALUES ('Å®', 'U');
INSERT INTO `wordfilter_characters` VALUES ('Å°', 'U');
INSERT INTO `wordfilter_characters` VALUES ('Å²', 'U');
INSERT INTO `wordfilter_characters` VALUES ('Ã¹', 'u');
INSERT INTO `wordfilter_characters` VALUES ('Ãº', 'u');
INSERT INTO `wordfilter_characters` VALUES ('Ã»', 'u');
INSERT INTO `wordfilter_characters` VALUES ('Ã¼', 'u');
INSERT INTO `wordfilter_characters` VALUES ('Å©', 'u');
INSERT INTO `wordfilter_characters` VALUES ('Å«', 'u');
INSERT INTO `wordfilter_characters` VALUES ('Å­', 'u');
INSERT INTO `wordfilter_characters` VALUES ('Å¯', 'u');
INSERT INTO `wordfilter_characters` VALUES ('Å³', 'W');
INSERT INTO `wordfilter_characters` VALUES ('Å´', 'W');
INSERT INTO `wordfilter_characters` VALUES ('áº€', 'W');
INSERT INTO `wordfilter_characters` VALUES ('áº‚', 'W');
INSERT INTO `wordfilter_characters` VALUES ('áº„', 'W');
INSERT INTO `wordfilter_characters` VALUES ('Åµ', 'w');
INSERT INTO `wordfilter_characters` VALUES ('áº', 'w');
INSERT INTO `wordfilter_characters` VALUES ('áºƒ', 'w');
INSERT INTO `wordfilter_characters` VALUES ('áº…', 'w');
INSERT INTO `wordfilter_characters` VALUES ('Ã', 'Y');
INSERT INTO `wordfilter_characters` VALUES ('Å¸', 'Y');
INSERT INTO `wordfilter_characters` VALUES ('Å¶', 'Y');
INSERT INTO `wordfilter_characters` VALUES ('Ã½', 'y');
INSERT INTO `wordfilter_characters` VALUES ('Ã¿', 'y');
INSERT INTO `wordfilter_characters` VALUES ('Å·', 'y');
INSERT INTO `wordfilter_characters` VALUES ('Å½', 'Z');
INSERT INTO `wordfilter_characters` VALUES ('Å¹', 'Z');
INSERT INTO `wordfilter_characters` VALUES ('Å»', 'Z');
INSERT INTO `wordfilter_characters` VALUES ('Å¾', 'z');
INSERT INTO `wordfilter_characters` VALUES ('Åº', 'z');
INSERT INTO `wordfilter_characters` VALUES ('Å¼', 'z');
INSERT INTO `wordfilter_characters` VALUES ('â€œ', '\\');
INSERT INTO `wordfilter_characters` VALUES ('â€', '\\');
INSERT INTO `wordfilter_characters` VALUES ('â€¦', '.');
INSERT INTO `wordfilter_characters` VALUES ('â€”', '-');
INSERT INTO `wordfilter_characters` VALUES ('â€“', '-');
INSERT INTO `wordfilter_characters` VALUES ('Â¿', '?');
INSERT INTO `wordfilter_characters` VALUES ('Â¡', '!');
INSERT INTO `wordfilter_characters` VALUES ('é', 'e');

-- ----------------------------
-- Table structure for `user_session_log`
-- ----------------------------
DROP TABLE IF EXISTS `user_session_log`;
CREATE TABLE `user_session_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `ranks`
-- ----------------------------
DROP TABLE IF EXISTS `ranks`;
CREATE TABLE `ranks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `badgeid` varchar(5) NOT NULL,
  `title` varchar(50) NOT NULL,
  `tab_colour` enum('red','green','pixeldarkblue','orange','blue','settings','pixellightblue') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ranks
-- ----------------------------
INSERT INTO `ranks` VALUES ('1', 'User', 'VIP', 'User', 'red');
INSERT INTO `ranks` VALUES ('2', 'Trial Moderators', 'TMOD', 'Trial Moderation Staff', 'green');
INSERT INTO `ranks` VALUES ('3', 'Moderators', 'ADM', 'Community Moderation Staff', 'settings');
INSERT INTO `ranks` VALUES ('4', 'Senior Moderators', 'SMOD', 'Moderator Coordinators/Leaders', 'orange');
INSERT INTO `ranks` VALUES ('5', 'Administrators', 'ADM', 'Administrative Staff', 'pixeldarkblue');
INSERT INTO `ranks` VALUES ('6', 'Managers', 'MNGR', 'Head Administrative Staff', 'green');
INSERT INTO `ranks` VALUES ('7', 'Community Leaders', 'ADM', 'Lead Administrative Staff', 'settings');
INSERT INTO `ranks` VALUES ('8', 'Developers', 'DEV', '', 'pixellightblue');
INSERT INTO `ranks` VALUES ('9', 'Owners', 'OWNR', 'Backend Administrators/Hotel Creators', 'red');

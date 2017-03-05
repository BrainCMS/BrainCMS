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
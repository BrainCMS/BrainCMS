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
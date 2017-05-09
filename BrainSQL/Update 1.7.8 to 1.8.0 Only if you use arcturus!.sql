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
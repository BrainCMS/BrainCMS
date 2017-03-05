DROP TABLE IF EXISTS `uotw`;
CREATE TABLE `uotw` (
  `userid` varchar(255) DEFAULT NULL,
  `text` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `uotw` VALUES ('1', 'I love Brain');
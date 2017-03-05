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


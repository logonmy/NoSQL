http://dev.mysql.com/doc/refman/5.6/en/federated-create-connection.html


SET FOREIGN_KEY_CHECKS=0;
// 192.168.2.105
-- ----------------------------
-- Table structure for federated_table
-- ----------------------------
DROP TABLE IF EXISTS `federated_table`;
CREATE TABLE `federated_table` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '',
  `other` int(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `other_key` (`other`)
) ENGINE=FEDERATED DEFAULT CHARSET=latin1 CONNECTION='mysql://root:root@192.168.2.106:3306/federated/test_table';



SET FOREIGN_KEY_CHECKS=0;

//192.168.2.106

-- ----------------------------
-- Table structure for test_table
-- ----------------------------
DROP TABLE IF EXISTS `test_table`;
CREATE TABLE `test_table` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '',
  `other` int(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `other_key` (`other`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

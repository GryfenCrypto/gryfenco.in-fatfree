/*

Source Database       : gryfencoin_db

Target Server Type    : MYSQL
Target Server Version : 50538
File Encoding         : 65001

Date: 2014-09-06 18:32:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `faucet`
-- ----------------------------
DROP TABLE IF EXISTS `faucet`;
CREATE TABLE `faucet` (
  `id` bigint(9) NOT NULL AUTO_INCREMENT,
  `user_ip` varchar(256) CHARACTER SET utf8 NOT NULL,
  `gaddress` varchar(35) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip_idx` (`user_ip`(255)) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

ALTER TABLE `faucet` ADD UNIQUE `ip_gaddr_index`(`user_ip`,`gaddress`);
-- ----------------------------
-- Records of faucet
-- ----------------------------

-- ----------------------------
-- Table structure for `sessions`
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '',
  `data` text,
  `csrf` text,
  `ip` varchar(40) DEFAULT NULL,
  `agent` varchar(255) DEFAULT NULL,
  `stamp` int(11) DEFAULT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sessions
-- ----------------------------
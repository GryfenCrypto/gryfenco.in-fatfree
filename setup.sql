/*
Navicat MySQL Data Transfer

Source Server         : gryfencoin_db
Source Server Version : 50538
Source Host           : 192.168.1.2:3306
Source Database       : gryfencoin_db

Target Server Type    : MYSQL
Target Server Version : 50538
File Encoding         : 65001

Date: 2014-09-03 22:31:36
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

-- ----------------------------
-- Records of faucet
-- ----------------------------

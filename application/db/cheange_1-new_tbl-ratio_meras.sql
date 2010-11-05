/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : listafe

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-11-05 10:54:07
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `ratio_meras`
-- ----------------------------
DROP TABLE IF EXISTS `ratio_meras`;
CREATE TABLE `ratio_meras` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` smallint(5) unsigned NOT NULL,
  `scalar` tinyint(1) unsigned NOT NULL,
  `relativ` tinyint(1) unsigned NOT NULL,
  `value` decimal(4,2) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ratio_meras
-- ----------------------------

/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : listafe

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-11-04 09:51:03
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `meras`
-- ----------------------------
DROP TABLE IF EXISTS `meras`;
CREATE TABLE `meras` (
  `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of meras
-- ----------------------------
INSERT INTO `meras` VALUES ('1', 'Грамы', '0');
INSERT INTO `meras` VALUES ('2', 'Штуки', '0');
INSERT INTO `meras` VALUES ('3', 'Милилитры', '0');
INSERT INTO `meras` VALUES ('4', 'Столовая ложка', '0');
INSERT INTO `meras` VALUES ('5', 'Чайная ложка', '0');
INSERT INTO `meras` VALUES ('6', 'Стакан', '0');

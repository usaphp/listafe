/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : listafe

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-11-10 15:12:37
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `translate_statuses`
-- ----------------------------
DROP TABLE IF EXISTS `translate_statuses`;
CREATE TABLE `translate_statuses` (
  `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of translate_statuses
-- ----------------------------
INSERT INTO `translate_statuses` VALUES ('1', 'new');
INSERT INTO `translate_statuses` VALUES ('2', 'working');
INSERT INTO `translate_statuses` VALUES ('3', 'finished');
INSERT INTO `translate_statuses` VALUES ('4', 'approved');

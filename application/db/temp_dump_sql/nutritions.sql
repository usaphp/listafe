/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : listafe

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-11-26 10:50:32
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `nutritions`
-- ----------------------------
DROP TABLE IF EXISTS `nutritions`;
CREATE TABLE `nutritions` (
  `id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `nutrition_category_id` int(50) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nutritions
-- ----------------------------
INSERT INTO `nutritions` VALUES ('4', '2');
INSERT INTO `nutritions` VALUES ('5', '4');
INSERT INTO `nutritions` VALUES ('6', '4');
INSERT INTO `nutritions` VALUES ('7', '3');

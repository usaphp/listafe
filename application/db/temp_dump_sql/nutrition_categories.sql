/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : listafe

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-11-26 10:50:06
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `nutrition_categories`
-- ----------------------------
DROP TABLE IF EXISTS `nutrition_categories`;
CREATE TABLE `nutrition_categories` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `value` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nutrition_categories
-- ----------------------------
INSERT INTO `nutrition_categories` VALUES ('1', null);
INSERT INTO `nutrition_categories` VALUES ('2', '1');
INSERT INTO `nutrition_categories` VALUES ('3', null);
INSERT INTO `nutrition_categories` VALUES ('4', null);

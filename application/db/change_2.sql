/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : listafe

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-12-14 10:13:11
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `nutrition_categories`
-- ----------------------------
DROP TABLE IF EXISTS `nutrition_categories`;
CREATE TABLE `nutrition_categories` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `tagname` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nutrition_categories
-- ----------------------------
INSERT INTO `nutrition_categories` VALUES ('1', 'calorie');
INSERT INTO `nutrition_categories` VALUES ('2', 'protein');
INSERT INTO `nutrition_categories` VALUES ('3', 'carbo');
INSERT INTO `nutrition_categories` VALUES ('4', 'vitamin');
INSERT INTO `nutrition_categories` VALUES ('5', 'mineral');
INSERT INTO `nutrition_categories` VALUES ('6', 'fat');
INSERT INTO `nutrition_categories` VALUES ('7', 'sterol');
INSERT INTO `nutrition_categories` VALUES ('8', 'othes');

/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : listafe

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-11-26 10:48:57
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `languages_nutritions`
-- ----------------------------
DROP TABLE IF EXISTS `languages_nutritions`;
CREATE TABLE `languages_nutritions` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `nutrition_id` smallint(5) unsigned NOT NULL,
  `language_id` tinyint(1) unsigned NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of languages_nutritions
-- ----------------------------
INSERT INTO `languages_nutritions` VALUES ('4', '4', '1', 'Сахароза', null);
INSERT INTO `languages_nutritions` VALUES ('5', '5', '1', 'Витамин B6', null);
INSERT INTO `languages_nutritions` VALUES ('6', '6', '1', 'Витамин B12', null);
INSERT INTO `languages_nutritions` VALUES ('7', '5', '2', 'Vitamit B6', null);
INSERT INTO `languages_nutritions` VALUES ('8', '4', '2', 'Saharoza', null);
INSERT INTO `languages_nutritions` VALUES ('9', '7', '1', 'Глюкоза', null);

/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : listafe

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-11-26 10:48:42
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `languages_products`
-- ----------------------------
DROP TABLE IF EXISTS `languages_products`;
CREATE TABLE `languages_products` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` smallint(4) unsigned NOT NULL,
  `language_id` tinyint(1) unsigned NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of languages_products
-- ----------------------------
INSERT INTO `languages_products` VALUES ('1', '1', '1', 'Оrange', null);
INSERT INTO `languages_products` VALUES ('2', '1', '2', 'Апельси', null);
INSERT INTO `languages_products` VALUES ('3', '2', '1', 'Бана', '');
INSERT INTO `languages_products` VALUES ('4', '2', '2', 'Banana', null);
INSERT INTO `languages_products` VALUES ('5', '3', '1', 'Курица', null);
INSERT INTO `languages_products` VALUES ('6', '3', '2', 'Chicken', null);

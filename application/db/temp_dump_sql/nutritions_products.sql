/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : listafe

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-11-26 10:50:00
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `nutritions_products`
-- ----------------------------
DROP TABLE IF EXISTS `nutritions_products`;
CREATE TABLE `nutritions_products` (
  `id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(50) unsigned NOT NULL,
  `nutrition_id` int(50) unsigned NOT NULL,
  `value` decimal(10,2) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nutritions_products
-- ----------------------------
INSERT INTO `nutritions_products` VALUES ('6', '2', '1', '2.00');
INSERT INTO `nutritions_products` VALUES ('7', '2', '2', '2.00');

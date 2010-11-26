/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : listafe

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-11-26 10:50:13
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `nutrition_categories_products`
-- ----------------------------
DROP TABLE IF EXISTS `nutrition_categories_products`;
CREATE TABLE `nutrition_categories_products` (
  `id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(50) unsigned NOT NULL,
  `nutrition_category_id` int(50) unsigned NOT NULL,
  `value` decimal(10,2) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nutrition_categories_products
-- ----------------------------
INSERT INTO `nutrition_categories_products` VALUES ('4', '2', '1', '1.00');
INSERT INTO `nutrition_categories_products` VALUES ('5', '2', '2', '1.00');
INSERT INTO `nutrition_categories_products` VALUES ('6', '1', '1', '2.00');
INSERT INTO `nutrition_categories_products` VALUES ('7', '1', '2', '4.00');
INSERT INTO `nutrition_categories_products` VALUES ('8', '1', '3', '8.00');
INSERT INTO `nutrition_categories_products` VALUES ('9', '1', '4', '2.00');

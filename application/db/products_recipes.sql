/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : listafe

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-10-25 09:33:19
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `products_recipes`
-- ----------------------------
DROP TABLE IF EXISTS `products_recipes`;
CREATE TABLE `products_recipes` (
  `id` int(7) unsigned NOT NULL AUTO_INCREMENT,
  `recipe_id` smallint(5) unsigned NOT NULL,
  `product_id` mediumint(6) unsigned NOT NULL,
  `mera_id` tinyint(2) NOT NULL,
  `value` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products_recipes
-- ----------------------------
INSERT INTO `products_recipes` VALUES ('1', '1', '21', '1', '1');
INSERT INTO `products_recipes` VALUES ('2', '1', '20', '2', '2');
INSERT INTO `products_recipes` VALUES ('3', '1', '24', '3', '1');
INSERT INTO `products_recipes` VALUES ('4', '2', '24', '3', '5');
INSERT INTO `products_recipes` VALUES ('5', '2', '20', '3', '2');
INSERT INTO `products_recipes` VALUES ('6', '2', '22', '4', '3');
INSERT INTO `products_recipes` VALUES ('7', '2', '21', '5', '1');
INSERT INTO `products_recipes` VALUES ('8', '2', '26', '3', '1');
INSERT INTO `products_recipes` VALUES ('9', '2', '25', '2', '5');

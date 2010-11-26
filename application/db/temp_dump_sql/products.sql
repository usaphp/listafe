/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : listafe

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-11-26 10:44:50
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `product_category_id` tinyint(3) unsigned NOT NULL,
  `image` varchar(20) DEFAULT NULL,
  `mera_id` tinyint(1) unsigned NOT NULL,
  `price` decimal(10,2) unsigned NOT NULL,
  `mera_for_price` tinyint(3) unsigned NOT NULL,
  `units_for_price` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`product_category_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', '3', 'pi_2.jpg', '3', '4.00', '1', '5');
INSERT INTO `products` VALUES ('2', '1', null, '2', '2.00', '1', '2');

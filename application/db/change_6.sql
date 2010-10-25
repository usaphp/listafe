/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : povarenok

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-10-25 14:39:34
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `product_nutrition_category_facts`
-- ----------------------------
DROP TABLE IF EXISTS `product_nutrition_category_facts`;
CREATE TABLE `product_nutrition_category_facts` (
`id`  int(50) UNSIGNED NOT NULL AUTO_INCREMENT ,
`product_id`  int(50) UNSIGNED NOT NULL ,
`nutrition_category_id`  int(50) UNSIGNED NOT NULL ,
`value`  decimal(10,2) UNSIGNED NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=47

;

-- ----------------------------
-- Records of product_nutrition_category_facts
-- ----------------------------
BEGIN;
INSERT INTO `product_nutrition_category_facts` VALUES ('35', '22', '1', '12.00'), ('36', '24', '2', '54.00'), ('37', '22', '3', '34.00'), ('38', '22', '4', '59.00'), ('39', '22', '10', '53.00'), ('40', '22', '6', '6.00'), ('41', '19', '1', '5.00'), ('42', '19', '2', '6.00'), ('43', '19', '3', '7.00'), ('44', '19', '4', '8.00'), ('45', '19', '10', '9.00'), ('46', '19', '6', '10.00');
COMMIT;

-- ----------------------------
-- Auto increment value for `product_nutrition_category_facts`
-- ----------------------------
ALTER TABLE `product_nutrition_category_facts` AUTO_INCREMENT=47;

/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : povarenok

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-10-11 09:42:34
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `categories`
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
`id`  tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT ,
`name`  varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=13

;

-- ----------------------------
-- Records of categories
-- ----------------------------
BEGIN;
INSERT INTO `categories` VALUES ('11', 'Фрукты'), ('10', 'Овощи'), ('12', 'gghfh');
COMMIT;

-- ----------------------------
-- Table structure for `ci_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
`session_id`  varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '0' ,
`ip_address`  varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '0' ,
`user_agent`  varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL ,
`last_activity`  int(10) UNSIGNED NOT NULL DEFAULT 0 ,
`user_data`  text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL ,
PRIMARY KEY (`session_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_bin

;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------
BEGIN;
INSERT INTO `ci_sessions` VALUES ('2e17c0e9d4db7ec49a9c14b7e4defe21', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 6.1; ru; rv:1.', '1286538046', '');
COMMIT;

-- ----------------------------
-- Table structure for `meras`
-- ----------------------------
DROP TABLE IF EXISTS `meras`;
CREATE TABLE `meras` (
`id`  tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT ,
`name`  varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=7

;

-- ----------------------------
-- Records of meras
-- ----------------------------
BEGIN;
INSERT INTO `meras` VALUES ('1', 'Грамы'), ('2', 'Штуки'), ('3', 'Милилитры'), ('4', 'Столовая ложка'), ('5', 'Чайная ложка'), ('6', 'Стакан');
COMMIT;

-- ----------------------------
-- Table structure for `nutrition_categories`
-- ----------------------------
DROP TABLE IF EXISTS `nutrition_categories`;
CREATE TABLE `nutrition_categories` (
`id`  int(50) UNSIGNED NOT NULL AUTO_INCREMENT ,
`name`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=7

;

-- ----------------------------
-- Records of nutrition_categories
-- ----------------------------
BEGIN;
INSERT INTO `nutrition_categories` VALUES ('1', 'Витамины'), ('2', 'Белки'), ('3', 'Жиры'), ('4', 'Углеводы'), ('5', 'Минералы'), ('6', 'Прочее');
COMMIT;

-- ----------------------------
-- Table structure for `nutritions`
-- ----------------------------
DROP TABLE IF EXISTS `nutritions`;
CREATE TABLE `nutritions` (
`id`  int(50) UNSIGNED NOT NULL AUTO_INCREMENT ,
`name`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`nutrition_category_id`  int(50) UNSIGNED NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=7

;

-- ----------------------------
-- Records of nutritions
-- ----------------------------
BEGIN;
INSERT INTO `nutritions` VALUES ('2', 'Железо', '5'), ('3', 'Витамин A', '1'), ('4', 'Сахар', '4'), ('6', 'Витамин C', '1');
COMMIT;

-- ----------------------------
-- Table structure for `product_detail_nutrition_facts`
-- ----------------------------
DROP TABLE IF EXISTS `product_detail_nutrition_facts`;
CREATE TABLE `product_detail_nutrition_facts` (
`id`  int(50) UNSIGNED NOT NULL AUTO_INCREMENT ,
`product_id`  int(50) UNSIGNED NOT NULL ,
`ingredient_id`  int(50) UNSIGNED NOT NULL ,
`value`  decimal(10,1) NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=3

;

-- ----------------------------
-- Records of product_detail_nutrition_facts
-- ----------------------------
BEGIN;
INSERT INTO `product_detail_nutrition_facts` VALUES ('1', '22', '1', '0.5'), ('2', '24', '4', '12.5');
COMMIT;

-- ----------------------------
-- Table structure for `product_nutrition_facts`
-- ----------------------------
DROP TABLE IF EXISTS `product_nutrition_facts`;
CREATE TABLE `product_nutrition_facts` (
`id`  int(50) UNSIGNED NOT NULL AUTO_INCREMENT ,
`product_id`  int(50) UNSIGNED NOT NULL ,
`nutrition_category_id`  int(50) UNSIGNED NOT NULL ,
`value`  decimal(10,2) UNSIGNED NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=3

;

-- ----------------------------
-- Records of product_nutrition_facts
-- ----------------------------
BEGIN;
INSERT INTO `product_nutrition_facts` VALUES ('1', '22', '3', '13.00'), ('2', '19', '5', '6.00');
COMMIT;

-- ----------------------------
-- Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
`id`  smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT ,
`name`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`category_id`  tinyint(3) UNSIGNED NOT NULL ,
`description`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`image`  varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`mera_id`  tinyint(1) UNSIGNED NOT NULL ,
`price`  decimal(10,2) UNSIGNED NOT NULL ,
`mera_for_price`  tinyint(3) UNSIGNED NOT NULL ,
`units_for_price`  tinyint(3) UNSIGNED NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=25

;

-- ----------------------------
-- Records of products
-- ----------------------------
BEGIN;
INSERT INTO `products` VALUES ('22', 'Вишня3', '7', 'фывыфв фыв ыфв ы', 'pi22.jpg', '1', '0.00', '0', '0'), ('24', 'Майонез', '9', 'фыв ыфв ыфв ыф выф впцкп укп укп ', 'pi24.jpg', '1', '0.00', '0', '0'), ('19', 'Вишня', '11', 'Вишня широко представлена в немецкой (киршвассер, штрудель) и украинской национальных кухнях (вареники с вишней). Из вишни готовят компоты, варенья, наливки, ликёры (в частности, португальская жинжинья).', 'pi19.jpg', '2', '0.00', '0', '0'), ('20', 'Вишня2', '10', 'asdsa dsa dsa ds ad a', 'pi20.jpg', '2', '0.00', '0', '0'), ('21', 'Банан', '7', '', 'pi21.jpg', '2', '0.00', '0', '0');
COMMIT;

-- ----------------------------
-- Table structure for `recipes`
-- ----------------------------
DROP TABLE IF EXISTS `recipes`;
CREATE TABLE `recipes` (
`id`  mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT ,
`name`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`prepare_time`  smallint(4) UNSIGNED NOT NULL ,
`cook_time`  smallint(4) UNSIGNED NOT NULL ,
`servings`  tinyint(2) UNSIGNED NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of recipes
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Indexes structure for table `categories`
-- ----------------------------
CREATE UNIQUE INDEX `name` USING BTREE ON `categories`(`name`) ;

-- ----------------------------
-- Auto increment value for `categories`
-- ----------------------------
ALTER TABLE `categories` AUTO_INCREMENT=13;

-- ----------------------------
-- Auto increment value for `meras`
-- ----------------------------
ALTER TABLE `meras` AUTO_INCREMENT=7;

-- ----------------------------
-- Auto increment value for `nutrition_categories`
-- ----------------------------
ALTER TABLE `nutrition_categories` AUTO_INCREMENT=7;

-- ----------------------------
-- Auto increment value for `nutritions`
-- ----------------------------
ALTER TABLE `nutritions` AUTO_INCREMENT=7;

-- ----------------------------
-- Auto increment value for `product_detail_nutrition_facts`
-- ----------------------------
ALTER TABLE `product_detail_nutrition_facts` AUTO_INCREMENT=3;

-- ----------------------------
-- Auto increment value for `product_nutrition_facts`
-- ----------------------------
ALTER TABLE `product_nutrition_facts` AUTO_INCREMENT=3;

-- ----------------------------
-- Indexes structure for table `products`
-- ----------------------------
CREATE UNIQUE INDEX `name` USING BTREE ON `products`(`name`) ;
CREATE INDEX `category_id` USING BTREE ON `products`(`category_id`) ;

-- ----------------------------
-- Auto increment value for `products`
-- ----------------------------
ALTER TABLE `products` AUTO_INCREMENT=25;

-- ----------------------------
-- Auto increment value for `recipes`
-- ----------------------------
ALTER TABLE `recipes` AUTO_INCREMENT=1;

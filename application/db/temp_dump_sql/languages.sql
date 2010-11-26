/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : listafe

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-11-26 10:51:18
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `languages`
-- ----------------------------
DROP TABLE IF EXISTS `languages`;
CREATE TABLE `languages` (
  `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of languages
-- ----------------------------
INSERT INTO `languages` VALUES ('1', 'Russian');
INSERT INTO `languages` VALUES ('2', 'English');

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

-- ----------------------------
-- Table structure for `languages_nutrition_categories`
-- ----------------------------
DROP TABLE IF EXISTS `languages_nutrition_categories`;
CREATE TABLE `languages_nutrition_categories` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nutrition_category_id` smallint(5) unsigned NOT NULL,
  `language_id` smallint(5) unsigned NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `descritption` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of languages_nutrition_categories
-- ----------------------------
INSERT INTO `languages_nutrition_categories` VALUES ('13', '1', '1', 'Белок', null);
INSERT INTO `languages_nutrition_categories` VALUES ('14', '2', '1', 'Жиры', null);
INSERT INTO `languages_nutrition_categories` VALUES ('15', '3', '1', 'Углеводы', null);
INSERT INTO `languages_nutrition_categories` VALUES ('20', '4', '1', 'Витамины', null);
INSERT INTO `languages_nutrition_categories` VALUES ('21', '1', '2', 'Protein', null);
INSERT INTO `languages_nutrition_categories` VALUES ('23', '2', '2', 'Fat', null);

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

-- ----------------------------
-- Table structure for `languages_product_categories`
-- ----------------------------
DROP TABLE IF EXISTS `languages_product_categories`;
CREATE TABLE `languages_product_categories` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `product_category_id` smallint(4) unsigned NOT NULL,
  `language_id` tinyint(1) unsigned NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of languages_product_categories
-- ----------------------------
INSERT INTO `languages_product_categories` VALUES ('5', '1', '1', 'Фрукт');
INSERT INTO `languages_product_categories` VALUES ('6', '1', '2', 'Fruits');
INSERT INTO `languages_product_categories` VALUES ('9', '3', '1', 'Мясо');

-- ----------------------------
-- Table structure for `languages_recipes`
-- ----------------------------
DROP TABLE IF EXISTS `languages_recipes`;
CREATE TABLE `languages_recipes` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `recipe_id` smallint(5) unsigned NOT NULL,
  `language_id` tinyint(1) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of languages_recipes
-- ----------------------------
INSERT INTO `languages_recipes` VALUES ('1', '1', '1', 'Первы');
INSERT INTO `languages_recipes` VALUES ('2', '2', '1', 'Лимонный сок');
INSERT INTO `languages_recipes` VALUES ('3', '1', '2', 'First');

-- ----------------------------
-- Table structure for `languages_recipe_steps`
-- ----------------------------
DROP TABLE IF EXISTS `languages_recipe_steps`;
CREATE TABLE `languages_recipe_steps` (
  `id` smallint(4) NOT NULL AUTO_INCREMENT,
  `recipe_step_id` smallint(4) unsigned NOT NULL,
  `language_id` tinyint(1) unsigned NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `text` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of languages_recipe_steps
-- ----------------------------
INSERT INTO `languages_recipe_steps` VALUES ('1', '1', '1', null, 'первый');
INSERT INTO `languages_recipe_steps` VALUES ('2', '1', '2', null, 'first');

-- ----------------------------
-- Table structure for `nutritions`
-- ----------------------------
DROP TABLE IF EXISTS `nutritions`;
CREATE TABLE `nutritions` (
  `id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `nutrition_category_id` int(50) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nutritions
-- ----------------------------
INSERT INTO `nutritions` VALUES ('4', '2');
INSERT INTO `nutritions` VALUES ('5', '4');
INSERT INTO `nutritions` VALUES ('6', '4');
INSERT INTO `nutritions` VALUES ('7', '3');

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

-- ----------------------------
-- Table structure for `product_categories`
-- ----------------------------
DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `value` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_categories
-- ----------------------------
INSERT INTO `product_categories` VALUES ('1', null);
INSERT INTO `product_categories` VALUES ('3', '1');

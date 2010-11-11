/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : listafe

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-11-11 09:10:05
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `meras`
-- ----------------------------
DROP TABLE IF EXISTS `meras`;
CREATE TABLE `meras` (
  `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of meras
-- ----------------------------
INSERT INTO `meras` VALUES ('1', 'Грамы', '1');
INSERT INTO `meras` VALUES ('2', 'Штуки', '2');
INSERT INTO `meras` VALUES ('3', 'Литры', '1');
INSERT INTO `meras` VALUES ('4', 'Столовая ложка', '2');
INSERT INTO `meras` VALUES ('6', 'Стакан', '2');

-- ----------------------------
-- Table structure for `meras_products`
-- ----------------------------
DROP TABLE IF EXISTS `meras_products`;
CREATE TABLE `meras_products` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` smallint(5) unsigned NOT NULL,
  `mera_id` tinyint(2) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of meras_products
-- ----------------------------
INSERT INTO `meras_products` VALUES ('1', '28', '2');
INSERT INTO `meras_products` VALUES ('6', '28', '4');
INSERT INTO `meras_products` VALUES ('5', '28', '1');
INSERT INTO `meras_products` VALUES ('7', '28', '6');

-- ----------------------------
-- Table structure for `nutritions`
-- ----------------------------
DROP TABLE IF EXISTS `nutritions`;
CREATE TABLE `nutritions` (
  `id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `nutrition_category_id` int(50) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nutritions
-- ----------------------------
INSERT INTO `nutritions` VALUES ('2', '5', 'Железо');
INSERT INTO `nutritions` VALUES ('3', '1', 'Витамин A');
INSERT INTO `nutritions` VALUES ('6', '1', 'Витамин C');
INSERT INTO `nutritions` VALUES ('7', '1', 'Витамин B6');
INSERT INTO `nutritions` VALUES ('8', '1', 'Витамин B12');
INSERT INTO `nutritions` VALUES ('10', '5', 'Йод');

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
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nutritions_products
-- ----------------------------
INSERT INTO `nutritions_products` VALUES ('25', '0', '6', '2.00');
INSERT INTO `nutritions_products` VALUES ('2', '0', '5', '6.00');
INSERT INTO `nutritions_products` VALUES ('24', '0', '3', '1.00');
INSERT INTO `nutritions_products` VALUES ('42', '28', '0', '4.00');
INSERT INTO `nutritions_products` VALUES ('49', '28', '7', '5.00');
INSERT INTO `nutritions_products` VALUES ('51', '0', '2', '12.00');
INSERT INTO `nutritions_products` VALUES ('40', '28', '2', '6.00');
INSERT INTO `nutritions_products` VALUES ('48', '28', '6', '5.00');
INSERT INTO `nutritions_products` VALUES ('47', '28', '3', '1.00');

-- ----------------------------
-- Table structure for `nutrition_categories`
-- ----------------------------
DROP TABLE IF EXISTS `nutrition_categories`;
CREATE TABLE `nutrition_categories` (
  `id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nutrition_categories
-- ----------------------------
INSERT INTO `nutrition_categories` VALUES ('1', 'Витамины');
INSERT INTO `nutrition_categories` VALUES ('2', 'Белки');
INSERT INTO `nutrition_categories` VALUES ('3', 'Жиры');
INSERT INTO `nutrition_categories` VALUES ('4', 'Углеводы');
INSERT INTO `nutrition_categories` VALUES ('5', 'Минералы');
INSERT INTO `nutrition_categories` VALUES ('6', 'Прочее');

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
) ENGINE=MyISAM AUTO_INCREMENT=150 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nutrition_categories_products
-- ----------------------------
INSERT INTO `nutrition_categories_products` VALUES ('37', '28', '3', '12.00');
INSERT INTO `nutrition_categories_products` VALUES ('132', '29', '1', '1.00');
INSERT INTO `nutrition_categories_products` VALUES ('133', '29', '2', '23.00');
INSERT INTO `nutrition_categories_products` VALUES ('134', '26', '3', '12.00');
INSERT INTO `nutrition_categories_products` VALUES ('135', '29', '1', '1.00');
INSERT INTO `nutrition_categories_products` VALUES ('136', '29', '2', '23.00');
INSERT INTO `nutrition_categories_products` VALUES ('137', '28', '3', '12.00');
INSERT INTO `nutrition_categories_products` VALUES ('138', '29', '4', '25.00');
INSERT INTO `nutrition_categories_products` VALUES ('139', '28', '5', '14.00');
INSERT INTO `nutrition_categories_products` VALUES ('140', '29', '6', '25.00');
INSERT INTO `nutrition_categories_products` VALUES ('141', '28', '0', '16.00');

-- ----------------------------
-- Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `product_category_id` tinyint(3) unsigned NOT NULL,
  `description` text,
  `image` varchar(20) DEFAULT NULL,
  `mera_id` tinyint(1) unsigned NOT NULL,
  `price` decimal(10,2) unsigned NOT NULL,
  `mera_for_price` tinyint(3) unsigned NOT NULL,
  `units_for_price` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`) USING BTREE,
  KEY `category_id` (`product_category_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('26', 'Апельсин', '11', '', 'pi26.jpg', '2', '60.00', '0', '1');
INSERT INTO `products` VALUES ('20', 'Вишня2', '10', 'asdsa dsa dsa ds ad a', 'pi20.jpg', '2', '0.00', '0', '0');
INSERT INTO `products` VALUES ('21', 'Банан', '7', '', 'pi21.jpg', '2', '0.00', '0', '0');
INSERT INTO `products` VALUES ('27', 'майонез', '11', '', null, '3', '12.00', '0', '10');
INSERT INTO `products` VALUES ('29', 'яйцо', '14', '', null, '4', '1.00', '0', '111');
INSERT INTO `products` VALUES ('28', 'Гранатт', '14', '', 'pi_28.jpg', '0', '17.00', '0', '131');

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products_recipes
-- ----------------------------
INSERT INTO `products_recipes` VALUES ('1', '1', '0', '3', '12');
INSERT INTO `products_recipes` VALUES ('12', '13', '20', '4', '12');
INSERT INTO `products_recipes` VALUES ('13', '13', '21', '2', '1');

-- ----------------------------
-- Table structure for `product_categories`
-- ----------------------------
DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_categories
-- ----------------------------
INSERT INTO `product_categories` VALUES ('11', 'Фрукты');
INSERT INTO `product_categories` VALUES ('10', 'Овощи');
INSERT INTO `product_categories` VALUES ('15', 'Рыба');
INSERT INTO `product_categories` VALUES ('14', 'Мясо');
INSERT INTO `product_categories` VALUES ('16', 'Орех');
INSERT INTO `product_categories` VALUES ('17', 'Сухофрукт');

-- ----------------------------
-- Table structure for `ratio_meras`
-- ----------------------------
DROP TABLE IF EXISTS `ratio_meras`;
CREATE TABLE `ratio_meras` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` smallint(5) unsigned NOT NULL,
  `scalar` tinyint(1) unsigned NOT NULL,
  `relative` tinyint(1) unsigned NOT NULL,
  `scalar_value` smallint(5) unsigned NOT NULL,
  `relative_value` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ratio_meras
-- ----------------------------
INSERT INTO `ratio_meras` VALUES ('4', '21', '1', '4', '1', '2');
INSERT INTO `ratio_meras` VALUES ('2', '21', '1', '6', '6', '7');
INSERT INTO `ratio_meras` VALUES ('3', '21', '3', '4', '2', '3');
INSERT INTO `ratio_meras` VALUES ('5', '26', '1', '4', '1', '3');

-- ----------------------------
-- Table structure for `recipes`
-- ----------------------------
DROP TABLE IF EXISTS `recipes`;
CREATE TABLE `recipes` (
  `id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `prepare_time` smallint(4) unsigned NOT NULL,
  `cook_time` smallint(4) unsigned NOT NULL,
  `servings` tinyint(2) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of recipes
-- ----------------------------
INSERT INTO `recipes` VALUES ('1', '1', '1', '2', '3');
INSERT INTO `recipes` VALUES ('13', 'проба', '1', '2', '3');

-- ----------------------------
-- Table structure for `recipes_images`
-- ----------------------------
DROP TABLE IF EXISTS `recipes_images`;
CREATE TABLE `recipes_images` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `recipe_id` int(10) NOT NULL,
  `image_type` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of recipes_images
-- ----------------------------
INSERT INTO `recipes_images` VALUES ('1', '1', '1');
INSERT INTO `recipes_images` VALUES ('3', '13', '1');

-- ----------------------------
-- Table structure for `recipes_steps`
-- ----------------------------
DROP TABLE IF EXISTS `recipes_steps`;
CREATE TABLE `recipes_steps` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `recipe_id` int(5) DEFAULT NULL,
  `step` tinyint(2) unsigned NOT NULL,
  `text` text NOT NULL,
  `image` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of recipes_steps
-- ----------------------------
INSERT INTO `recipes_steps` VALUES ('1', '1', '1', 'jfg', 'sp_1_1.jpg');
INSERT INTO `recipes_steps` VALUES ('21', '1', '2', 'jfg', '');
INSERT INTO `recipes_steps` VALUES ('26', '13', '1', '22222', '');
INSERT INTO `recipes_steps` VALUES ('25', '13', '2', '22222', 'sp_13_16.jpg');

-- ----------------------------
-- Table structure for `translate_recipes`
-- ----------------------------
DROP TABLE IF EXISTS `translate_recipes`;
CREATE TABLE `translate_recipes` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `url` varchar(150) NOT NULL,
  `original` text NOT NULL,
  `translate` text NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of translate_recipes
-- ----------------------------
INSERT INTO `translate_recipes` VALUES ('1', 'первый', 'www.google.ru', 'dslfhjvb', 'адлыриsd c   lkjhk   h вмлоdsривjlkhr erыалv мриывsdfроа имлорыsdf', '3', '0000-00-00 00:00:00', '2010-11-10 14:43:21');
INSERT INTO `translate_recipes` VALUES ('5', '', '0', 'sldkfjvl', 'lsdhjfbvklshdbfv', '3', '2010-11-10 14:01:36', '2010-11-10 14:01:36');
INSERT INTO `translate_recipes` VALUES ('6', '', '0', 'juiniunbiubnui', 'yvyubin', '4', '2010-11-10 14:05:37', '2010-11-10 14:05:37');
INSERT INTO `translate_recipes` VALUES ('7', '', '0', 'sdfvbk', ',sdkjhfbv', '0', '2010-11-10 14:28:50', '2010-11-10 14:28:50');
INSERT INTO `translate_recipes` VALUES ('8', '', '0', 'sdfjvlskj', 'lhsdbfvkh', '4', '2010-11-10 14:28:59', '2010-11-10 14:29:10');
INSERT INTO `translate_recipes` VALUES ('9', '', '0', 'sdjhfbvks', 'khsdbfkvjhsf', '4', '2010-11-10 14:29:22', '2010-11-10 14:29:22');
INSERT INTO `translate_recipes` VALUES ('10', '0', 'ya.ru', '1233lsjd', 'долыавдм', '1', '2010-11-10 14:36:23', '2010-11-10 14:42:41');
INSERT INTO `translate_recipes` VALUES ('11', 'орщшрщш', 'щшощшщш', 'щшрщшрщшщ', 'ываываывав', '3', '2010-11-10 14:44:51', '2010-11-10 14:45:06');
INSERT INTO `translate_recipes` VALUES ('12', 'чмчсчм', 'смсчмчсм', 'ываыавыаыв', 'ываывавыа', '2', '2010-11-10 14:45:28', '2010-11-10 14:45:28');

-- ----------------------------
-- Table structure for `translate_statuses`
-- ----------------------------
DROP TABLE IF EXISTS `translate_statuses`;
CREATE TABLE `translate_statuses` (
  `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of translate_statuses
-- ----------------------------
INSERT INTO `translate_statuses` VALUES ('1', 'new');
INSERT INTO `translate_statuses` VALUES ('2', 'working');
INSERT INTO `translate_statuses` VALUES ('3', 'finished');
INSERT INTO `translate_statuses` VALUES ('4', 'approved');

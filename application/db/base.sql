/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : listafe

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-11-10 18:28:56
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `meras`
-- ----------------------------
DROP TABLE IF EXISTS `meras`;
CREATE TABLE `meras` (
`id`  tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT ,
`name`  varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`type`  tinyint(1) UNSIGNED NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=7

;

-- ----------------------------
-- Table structure for `meras_products`
-- ----------------------------
DROP TABLE IF EXISTS `meras_products`;
CREATE TABLE `meras_products` (
`id`  smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT ,
`product_id`  smallint(5) UNSIGNED NOT NULL ,
`mera_id`  tinyint(2) UNSIGNED NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=8

;

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
AUTO_INCREMENT=9

;

-- ----------------------------
-- Table structure for `nutrition_categories_products`
-- ----------------------------
DROP TABLE IF EXISTS `nutrition_categories_products`;
CREATE TABLE `nutrition_categories_products` (
`id`  int(50) UNSIGNED NOT NULL AUTO_INCREMENT ,
`product_id`  int(50) UNSIGNED NOT NULL ,
`nutrition_category_id`  int(50) UNSIGNED NOT NULL ,
`value`  decimal(10,2) UNSIGNED NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=150

;

-- ----------------------------
-- Table structure for `nutritions`
-- ----------------------------
DROP TABLE IF EXISTS `nutritions`;
CREATE TABLE `nutritions` (
`id`  int(50) UNSIGNED NOT NULL AUTO_INCREMENT ,
`nutrition_category_id`  int(50) UNSIGNED NOT NULL ,
`name`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=11

;

-- ----------------------------
-- Table structure for `nutritions_products`
-- ----------------------------
DROP TABLE IF EXISTS `nutritions_products`;
CREATE TABLE `nutritions_products` (
`id`  int(50) UNSIGNED NOT NULL AUTO_INCREMENT ,
`product_id`  int(50) UNSIGNED NOT NULL ,
`nutrition_id`  int(50) UNSIGNED NOT NULL ,
`value`  decimal(10,2) UNSIGNED NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=52

;

-- ----------------------------
-- Table structure for `product_categories`
-- ----------------------------
DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories` (
`id`  tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT ,
`name`  varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=18

;

-- ----------------------------
-- Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
`id`  smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT ,
`name`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`product_category_id`  tinyint(3) UNSIGNED NOT NULL ,
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
AUTO_INCREMENT=30

;

-- ----------------------------
-- Table structure for `products_recipes`
-- ----------------------------
DROP TABLE IF EXISTS `products_recipes`;
CREATE TABLE `products_recipes` (
`id`  int(7) UNSIGNED NOT NULL AUTO_INCREMENT ,
`recipe_id`  smallint(5) UNSIGNED NOT NULL ,
`product_id`  mediumint(6) UNSIGNED NOT NULL ,
`mera_id`  tinyint(2) NOT NULL ,
`value`  smallint(5) UNSIGNED NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=14

;

-- ----------------------------
-- Table structure for `ratio_meras`
-- ----------------------------
DROP TABLE IF EXISTS `ratio_meras`;
CREATE TABLE `ratio_meras` (
`id`  tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT ,
`product_id`  smallint(5) UNSIGNED NOT NULL ,
`scalar`  tinyint(1) UNSIGNED NOT NULL ,
`relative`  tinyint(1) UNSIGNED NOT NULL ,
`scalar_value`  smallint(5) UNSIGNED NOT NULL ,
`relative_value`  smallint(5) UNSIGNED NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=6

;

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
AUTO_INCREMENT=14

;

-- ----------------------------
-- Table structure for `recipes_images`
-- ----------------------------
DROP TABLE IF EXISTS `recipes_images`;
CREATE TABLE `recipes_images` (
`id`  int(9) UNSIGNED NOT NULL AUTO_INCREMENT ,
`recipe_id`  int(10) NOT NULL ,
`image_type`  tinyint(1) NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=4

;

-- ----------------------------
-- Table structure for `recipes_steps`
-- ----------------------------
DROP TABLE IF EXISTS `recipes_steps`;
CREATE TABLE `recipes_steps` (
`id`  int(6) UNSIGNED NOT NULL AUTO_INCREMENT ,
`recipe_id`  int(5) NULL DEFAULT NULL ,
`step`  tinyint(2) UNSIGNED NOT NULL ,
`text`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`image`  varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=27

;

-- ----------------------------
-- Table structure for `translate_recipes`
-- ----------------------------
DROP TABLE IF EXISTS `translate_recipes`;
CREATE TABLE `translate_recipes` (
`id`  smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT ,
`name`  varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`url`  varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`original`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`translate`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`status`  tinyint(1) UNSIGNED NOT NULL ,
`created`  datetime NOT NULL ,
`updated`  datetime NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=13

;

-- ----------------------------
-- Table structure for `translate_statuses`
-- ----------------------------
DROP TABLE IF EXISTS `translate_statuses`;
CREATE TABLE `translate_statuses` (
`id`  tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT ,
`name`  varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=5

;

-- ----------------------------
-- Auto increment value for `meras`
-- ----------------------------
ALTER TABLE `meras` AUTO_INCREMENT=7;

-- ----------------------------
-- Auto increment value for `meras_products`
-- ----------------------------
ALTER TABLE `meras_products` AUTO_INCREMENT=8;

-- ----------------------------
-- Auto increment value for `nutrition_categories`
-- ----------------------------
ALTER TABLE `nutrition_categories` AUTO_INCREMENT=9;

-- ----------------------------
-- Auto increment value for `nutrition_categories_products`
-- ----------------------------
ALTER TABLE `nutrition_categories_products` AUTO_INCREMENT=150;

-- ----------------------------
-- Auto increment value for `nutritions`
-- ----------------------------
ALTER TABLE `nutritions` AUTO_INCREMENT=11;

-- ----------------------------
-- Auto increment value for `nutritions_products`
-- ----------------------------
ALTER TABLE `nutritions_products` AUTO_INCREMENT=52;

-- ----------------------------
-- Indexes structure for table `product_categories`
-- ----------------------------
CREATE UNIQUE INDEX `name` USING BTREE ON `product_categories`(`name`) ;

-- ----------------------------
-- Auto increment value for `product_categories`
-- ----------------------------
ALTER TABLE `product_categories` AUTO_INCREMENT=18;

-- ----------------------------
-- Indexes structure for table `products`
-- ----------------------------
CREATE UNIQUE INDEX `name` USING BTREE ON `products`(`name`) ;
CREATE INDEX `category_id` USING BTREE ON `products`(`product_category_id`) ;

-- ----------------------------
-- Auto increment value for `products`
-- ----------------------------
ALTER TABLE `products` AUTO_INCREMENT=30;

-- ----------------------------
-- Auto increment value for `products_recipes`
-- ----------------------------
ALTER TABLE `products_recipes` AUTO_INCREMENT=14;

-- ----------------------------
-- Auto increment value for `ratio_meras`
-- ----------------------------
ALTER TABLE `ratio_meras` AUTO_INCREMENT=6;

-- ----------------------------
-- Auto increment value for `recipes`
-- ----------------------------
ALTER TABLE `recipes` AUTO_INCREMENT=14;

-- ----------------------------
-- Auto increment value for `recipes_images`
-- ----------------------------
ALTER TABLE `recipes_images` AUTO_INCREMENT=4;

-- ----------------------------
-- Auto increment value for `recipes_steps`
-- ----------------------------
ALTER TABLE `recipes_steps` AUTO_INCREMENT=27;

-- ----------------------------
-- Auto increment value for `translate_recipes`
-- ----------------------------
ALTER TABLE `translate_recipes` AUTO_INCREMENT=13;

-- ----------------------------
-- Auto increment value for `translate_statuses`
-- ----------------------------
ALTER TABLE `translate_statuses` AUTO_INCREMENT=5;

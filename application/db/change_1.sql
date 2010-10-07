/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : povarenok

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-10-07 13:32:57
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
AUTO_INCREMENT=10

;

-- ----------------------------
-- Records of categories
-- ----------------------------
BEGIN;
INSERT INTO `categories` VALUES ('7', 'Овощи'), ('8', 'Фрукты'), ('9', 'Приправы');
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
INSERT INTO `ci_sessions` VALUES ('7906ea501d619ea65261a2ef6dc6a774', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) Ap', '1284961654', ''), ('98c91ebb160ac440ee7b0683176d184c', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 6.1; ru; rv:1.', '1284985825', ''), ('a46bf6a510c39f2af7bd31a3b5a81deb', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) Ap', '1284961654', '');
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
-- Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
`id`  smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT ,
`name`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`category_id`  tinyint(3) UNSIGNED NULL DEFAULT NULL ,
`description`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`image`  varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`calories`  smallint(5) UNSIGNED NOT NULL ,
`protein`  decimal(3,1) UNSIGNED NOT NULL ,
`carbo`  decimal(3,1) UNSIGNED NOT NULL ,
`fat`  decimal(3,1) UNSIGNED NOT NULL ,
`mera_id`  tinyint(1) UNSIGNED NULL DEFAULT NULL ,
`price`  decimal(8,2) UNSIGNED NOT NULL ,
`units_for_price`  smallint(5) UNSIGNED NOT NULL ,
`units_mera_id`  tinyint(1) UNSIGNED NOT NULL ,
`created`  datetime NOT NULL ,
`updated`  datetime NOT NULL ,
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
INSERT INTO `products` VALUES ('22', 'Вишня3', '7', 'фывыфв фыв ыфв ы', 'pi22.jpg', '123', '12.0', '12.0', '12.0', '1', '123.00', '12', '1', '2010-09-07 13:28:19', '2010-09-07 13:28:19'), ('24', 'Майонез', '9', 'фыв ыфв ыфв ыф выф впцкп укп укп ', 'pi24.jpg', '1234', '12.0', '5.0', '12.0', '1', '150.00', '150', '1', '2010-09-20 05:49:19', '2010-09-20 05:49:19'), ('19', 'Вишня', null, 'Вишня широко представлена в немецкой (киршвассер, штрудель) и украинской национальных кухнях (вареники с вишней). Из вишни готовят компоты, варенья, наливки, ликёры (в частности, португальская жинжинья).', 'pi19.jpg', '47', '1.0', '23.0', '0.2', '2', '120.00', '5', '5', '2010-08-12 01:02:50', '2010-08-13 17:36:39'), ('20', 'Вишня2', null, 'asdsa dsa dsa ds ad a', 'pi20.jpg', '17', '1.0', '12.0', '0.2', '2', '120.00', '100', '4', '2010-08-12 23:10:08', '2010-08-12 23:10:08'), ('21', 'Банан', '7', '', 'pi21.jpg', '123', '12.0', '12.0', '12.0', '2', '123.00', '100', '2', '2010-09-01 17:05:05', '2010-09-06 22:20:21');
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
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`parent_id`  int(11) NOT NULL DEFAULT 0 ,
`name`  varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_bin
AUTO_INCREMENT=3

;

-- ----------------------------
-- Records of roles
-- ----------------------------
BEGIN;
INSERT INTO `roles` VALUES ('1', '0', 'User'), ('2', '0', 'Admin');
COMMIT;

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`role_id`  int(11) NOT NULL DEFAULT 1 ,
`username`  varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL ,
`password`  varchar(34) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL ,
`email`  varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL ,
`banned`  tinyint(1) NOT NULL DEFAULT 0 ,
`ban_reason`  varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL ,
`newpass`  varchar(34) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL ,
`newpass_key`  varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL ,
`newpass_time`  datetime NULL DEFAULT NULL ,
`last_ip`  varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL ,
`last_login`  datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ,
`created`  datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ,
`modified`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_bin
AUTO_INCREMENT=3

;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', '2', 'admin', '$1$780.C80.$aONlte.NrtiV/8jRDbgr10', 'admin@localhost.com', '0', null, null, null, null, '127.0.0.1', '2010-08-20 03:25:14', '2008-11-30 04:56:32', '2010-08-20 03:24:50'), ('2', '1', 'user', '$1$bO..IR4.$CxjJBjKJ5QW2/BaYKDS7f.', 'user@localhost.com', '0', null, null, null, null, '127.0.0.1', '2008-12-01 14:04:14', '2008-12-01 14:01:53', '2008-12-01 14:04:14');
COMMIT;

-- ----------------------------
-- Indexes structure for table `categories`
-- ----------------------------
CREATE UNIQUE INDEX `name` USING BTREE ON `categories`(`name`) ;

-- ----------------------------
-- Auto increment value for `categories`
-- ----------------------------
ALTER TABLE `categories` AUTO_INCREMENT=10;

-- ----------------------------
-- Auto increment value for `meras`
-- ----------------------------
ALTER TABLE `meras` AUTO_INCREMENT=7;

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

-- ----------------------------
-- Auto increment value for `roles`
-- ----------------------------
ALTER TABLE `roles` AUTO_INCREMENT=3;

-- ----------------------------
-- Auto increment value for `users`
-- ----------------------------
ALTER TABLE `users` AUTO_INCREMENT=3;

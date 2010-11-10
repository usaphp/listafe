/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : povarenok

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-11-10 17:30:41
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `admin_user_types`
-- ----------------------------
DROP TABLE IF EXISTS `admin_user_types`;
CREATE TABLE `admin_user_types` (
`id`  smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT ,
`name`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`roles`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=3

;

-- ----------------------------
-- Records of admin_user_types
-- ----------------------------
BEGIN;
INSERT INTO `admin_user_types` VALUES ('1', 'admin', null), ('2', 'translater', 'translate');
COMMIT;

-- ----------------------------
-- Table structure for `admin_users`
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
`id`  smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT ,
`username`  varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`password`  varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`admin_user_type_id`  tinyint(2) NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=4

;

-- ----------------------------
-- Records of admin_users
-- ----------------------------
BEGIN;
INSERT INTO `admin_users` VALUES ('1', 'ksenia', 'tamerlan', '1'), ('2', 'translate', '123456', '2'), ('3', 'admin', 'admin', '1');
COMMIT;

-- ----------------------------
-- Auto increment value for `admin_user_types`
-- ----------------------------
ALTER TABLE `admin_user_types` AUTO_INCREMENT=3;

-- ----------------------------
-- Auto increment value for `admin_users`
-- ----------------------------
ALTER TABLE `admin_users` AUTO_INCREMENT=4;

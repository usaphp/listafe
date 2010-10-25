/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : listafe

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-10-20 14:56:12
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `recipes_steps`
-- ----------------------------
DROP TABLE IF EXISTS `recipes_steps`;
CREATE TABLE `recipes_steps` (
`id`  int(6) UNSIGNED NOT NULL AUTO_INCREMENT ,
`recipe_id`  int(5) NULL DEFAULT NULL ,
`text`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`image`  varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of recipes_steps
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Auto increment value for `recipes_steps`
-- ----------------------------
ALTER TABLE `recipes_steps` AUTO_INCREMENT=1;

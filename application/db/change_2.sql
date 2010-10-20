/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : listafe

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-10-20 10:47:48
*/

SET FOREIGN_KEY_CHECKS=0;
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
AUTO_INCREMENT=9

;

-- ----------------------------
-- Auto increment value for `recipes_images`
-- ----------------------------
ALTER TABLE `recipes_images` AUTO_INCREMENT=9;

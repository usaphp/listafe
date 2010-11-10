/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : listafe

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-11-10 15:13:18
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `translate_recipes`
-- ----------------------------
DROP TABLE IF EXISTS `translate_recipes`;
CREATE TABLE `translate_recipes` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(150) NOT NULL,
  `original` text NOT NULL,
  `translate` text NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of translate_recipes
-- ----------------------------
INSERT INTO `translate_recipes` VALUES ('1', 'google.ru', 'ljsdljfnvlsjdfoughlhsldkjv', 'адлыриsd c   lkjhk   h вмлоdsривjlkhr erыалv мриывsdfроа имлоры', '2', '0000-00-00 00:00:00', '2010-11-10 11:58:36');

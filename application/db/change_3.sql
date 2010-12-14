/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : listafe

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-12-14 11:01:56
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `nutritions`
-- ----------------------------
DROP TABLE IF EXISTS `nutritions`;
CREATE TABLE `nutritions` (
  `id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `nutrition_category_id` int(50) unsigned NOT NULL,
  `units` varchar(6) DEFAULT NULL,
  `Nutr_No` varchar(3) DEFAULT NULL,
  `Num_Dec` varchar(1) DEFAULT NULL,
  `SR_Order` float DEFAULT NULL,
  `Tagname` varchar(20) DEFAULT NULL,
  `group_list` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=147 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nutritions
-- ----------------------------
INSERT INTO `nutritions` VALUES ('1', '2', 'g', '203', '2', '600', 'PROTEIN', '3');
INSERT INTO `nutritions` VALUES ('2', '6', 'g', '204', '2', '800', 'FAT', '3');
INSERT INTO `nutritions` VALUES ('3', '3', 'g', '205', '2', '1100', 'CARBO', '3');
INSERT INTO `nutritions` VALUES ('4', '8', 'g', '207', '2', '1000', 'ASH', '2');
INSERT INTO `nutritions` VALUES ('5', '1', 'kcal', '208', '0', '300', 'ENERG_KCAL', '3');
INSERT INTO `nutritions` VALUES ('6', '1', 'g', '209', '2', '2200', 'STARCH', '2');
INSERT INTO `nutritions` VALUES ('7', '1', 'g', '210', '2', '1600', 'SUCS', '2');
INSERT INTO `nutritions` VALUES ('8', '1', 'g', '211', '2', '1700', 'GLUS', '2');
INSERT INTO `nutritions` VALUES ('9', '1', 'g', '212', '2', '1800', 'FRUS', '2');
INSERT INTO `nutritions` VALUES ('10', '1', 'g', '213', '2', '1900', 'LACS', '2');
INSERT INTO `nutritions` VALUES ('11', '1', 'g', '214', '2', '2000', 'MALS', '2');
INSERT INTO `nutritions` VALUES ('12', '1', 'g', '221', '1', '18200', 'ALC', '2');
INSERT INTO `nutritions` VALUES ('13', '8', 'g', '255', '2', '100', 'WATER', '2');
INSERT INTO `nutritions` VALUES ('14', '1', 'g', '257', '2', '700', 'AdjProt', '2');
INSERT INTO `nutritions` VALUES ('15', '1', 'mg', '262', '0', '18300', 'CAFFN', '2');
INSERT INTO `nutritions` VALUES ('16', '1', 'mg', '263', '0', '18400', 'THEBRN', '2');
INSERT INTO `nutritions` VALUES ('17', '1', 'kJ', '268', '0', '400', 'ENERC_KJ', '2');
INSERT INTO `nutritions` VALUES ('18', '3', 'g', '269', '2', '1500', 'SUGAR', '3');
INSERT INTO `nutritions` VALUES ('19', '1', 'g', '287', '2', '2100', 'GALS', '2');
INSERT INTO `nutritions` VALUES ('20', '3', 'g', '291', '1', '1200', 'FIBER', '3');
INSERT INTO `nutritions` VALUES ('21', '5', 'mg', '301', '0', '5300', 'CA', '2');
INSERT INTO `nutritions` VALUES ('22', '5', 'mg', '303', '2', '5400', 'FE', '2');
INSERT INTO `nutritions` VALUES ('23', '5', 'mg', '304', '0', '5500', 'MG', '2');
INSERT INTO `nutritions` VALUES ('24', '5', 'mg', '305', '0', '5600', 'P', '2');
INSERT INTO `nutritions` VALUES ('25', '5', 'mg', '306', '0', '5700', 'K', '2');
INSERT INTO `nutritions` VALUES ('26', '5', 'mg', '307', '0', '5800', 'NA', '3');
INSERT INTO `nutritions` VALUES ('27', '5', 'mg', '309', '2', '5900', 'ZN', '2');
INSERT INTO `nutritions` VALUES ('28', '5', 'mg', '312', '3', '6000', 'CU', '2');
INSERT INTO `nutritions` VALUES ('29', '5', 'mcg', '313', '1', '6240', 'FLD', '2');
INSERT INTO `nutritions` VALUES ('30', '5', 'mg', '315', '3', '6100', 'MN', '2');
INSERT INTO `nutritions` VALUES ('31', '5', 'mcg', '317', '1', '6200', 'SE', '2');
INSERT INTO `nutritions` VALUES ('32', '4', 'IU', '318', '0', '7500', 'VITA_IU', '2');
INSERT INTO `nutritions` VALUES ('33', '4', 'mcg', '319', '0', '7430', 'RETOL', '2');
INSERT INTO `nutritions` VALUES ('34', '4', 'mcg_RA', '320', '0', '7420', 'VITA_RAE', '3');
INSERT INTO `nutritions` VALUES ('35', '4', 'mcg', '321', '0', '7440', 'CARTB', '2');
INSERT INTO `nutritions` VALUES ('36', '4', 'mcg', '322', '0', '7450', 'CARTA', '2');
INSERT INTO `nutritions` VALUES ('37', '4', 'mg', '323', '2', '7900', 'TOCPHA', '2');
INSERT INTO `nutritions` VALUES ('38', '4', 'IU', '324', '0', '8750', 'VITD', '2');
INSERT INTO `nutritions` VALUES ('39', '4', 'mcg', '325', '1', '8710', 'ERGCAL', '2');
INSERT INTO `nutritions` VALUES ('40', '4', 'mcg', '326', '1', '8720', 'CHOCAL', '2');
INSERT INTO `nutritions` VALUES ('41', '4', 'mcg', '328', '1', '8700', 'VITD', '2');
INSERT INTO `nutritions` VALUES ('42', '4', 'mcg', '334', '0', '7460', 'CRYPX', '2');
INSERT INTO `nutritions` VALUES ('43', '4', 'mcg', '337', '0', '7530', 'LYCPN', '2');
INSERT INTO `nutritions` VALUES ('44', '4', 'mcg', '338', '0', '7560', 'LUT_ZEA', '2');
INSERT INTO `nutritions` VALUES ('45', '1', 'mg', '341', '2', '8000', 'TOCPHB', '2');
INSERT INTO `nutritions` VALUES ('46', '1', 'mg', '342', '2', '8100', 'TOCPHG', '2');
INSERT INTO `nutritions` VALUES ('47', '1', 'mg', '343', '2', '8200', 'TOCPHD', '2');
INSERT INTO `nutritions` VALUES ('48', '4', 'mg', '401', '1', '6300', 'VITC', '3');
INSERT INTO `nutritions` VALUES ('49', '4', 'mg', '404', '3', '6400', 'THIA', '2');
INSERT INTO `nutritions` VALUES ('50', '4', 'mg', '405', '3', '6500', 'RIBF', '2');
INSERT INTO `nutritions` VALUES ('51', '4', 'mg', '406', '3', '6600', 'NIA', '2');
INSERT INTO `nutritions` VALUES ('52', '4', 'mg', '410', '3', '6700', 'PANTAC', '2');
INSERT INTO `nutritions` VALUES ('53', '4', 'mg', '415', '3', '6800', 'VITB6A', '2');
INSERT INTO `nutritions` VALUES ('54', '4', 'mcg', '417', '0', '6900', 'FOL', '2');
INSERT INTO `nutritions` VALUES ('55', '4', 'mcg', '418', '2', '7300', 'VITB12', '2');
INSERT INTO `nutritions` VALUES ('56', '4', 'mg', '421', '1', '7220', 'CHOLN', '2');
INSERT INTO `nutritions` VALUES ('57', '4', 'mcg', '428', '1', '8950', 'MK4', '2');
INSERT INTO `nutritions` VALUES ('58', '4', 'mcg', '429', '1', '8900', 'VITK1D', '2');
INSERT INTO `nutritions` VALUES ('59', '4', 'mcg', '430', '1', '8800', 'VITK1', '2');
INSERT INTO `nutritions` VALUES ('60', '4', 'mcg', '431', '0', '7000', 'FOLAC', '2');
INSERT INTO `nutritions` VALUES ('61', '4', 'mcg', '432', '0', '7100', 'FOLFD', '2');
INSERT INTO `nutritions` VALUES ('62', '4', 'mcg_DF', '435', '0', '7200', 'FOLDFE', '2');
INSERT INTO `nutritions` VALUES ('63', '4', 'mg', '454', '1', '7270', 'BETN', '2');
INSERT INTO `nutritions` VALUES ('64', '2', 'g', '501', '3', '16300', 'TRP_G', '1');
INSERT INTO `nutritions` VALUES ('65', '2', 'g', '502', '3', '16400', 'THR_G', '1');
INSERT INTO `nutritions` VALUES ('66', '2', 'g', '503', '3', '16500', 'ILE_G', '1');
INSERT INTO `nutritions` VALUES ('67', '2', 'g', '504', '3', '16600', 'LEU_G', '1');
INSERT INTO `nutritions` VALUES ('68', '2', 'g', '505', '3', '16700', 'LYS_G', '1');
INSERT INTO `nutritions` VALUES ('69', '2', 'g', '506', '3', '16800', 'MET_G', '1');
INSERT INTO `nutritions` VALUES ('70', '2', 'g', '507', '3', '16900', 'CYS_G', '1');
INSERT INTO `nutritions` VALUES ('71', '2', 'g', '508', '3', '17000', 'PHE_G', '1');
INSERT INTO `nutritions` VALUES ('72', '2', 'g', '509', '3', '17100', 'TYR_G', '1');
INSERT INTO `nutritions` VALUES ('73', '2', 'g', '510', '3', '17200', 'VAL_G', '1');
INSERT INTO `nutritions` VALUES ('74', '2', 'g', '511', '3', '17300', 'ARG_G', '1');
INSERT INTO `nutritions` VALUES ('75', '2', 'g', '512', '3', '17400', 'HISTN_G', '1');
INSERT INTO `nutritions` VALUES ('76', '2', 'g', '513', '3', '17500', 'ALA_G', '1');
INSERT INTO `nutritions` VALUES ('77', '2', 'g', '514', '3', '17600', 'ASP_G', '1');
INSERT INTO `nutritions` VALUES ('78', '2', 'g', '515', '3', '17700', 'GLU_G', '1');
INSERT INTO `nutritions` VALUES ('79', '2', 'g', '516', '3', '17800', 'GLY_G', '1');
INSERT INTO `nutritions` VALUES ('80', '2', 'g', '517', '3', '17900', 'PRO_G', '1');
INSERT INTO `nutritions` VALUES ('81', '2', 'g', '518', '3', '18000', 'SER_G', '1');
INSERT INTO `nutritions` VALUES ('82', '2', 'g', '521', '3', '18100', 'HYP', '2');
INSERT INTO `nutritions` VALUES ('83', '4', 'mg', '573', '2', '7920', 'VitE_ad', '2');
INSERT INTO `nutritions` VALUES ('84', '4', 'mcg', '578', '2', '7340', 'VitB12_ad', '2');
INSERT INTO `nutritions` VALUES ('85', '6', 'mg', '601', '0', '15700', 'CHOLE', '3');
INSERT INTO `nutritions` VALUES ('86', '6', 'g', '605', '3', '15400', 'FATRN', '3');
INSERT INTO `nutritions` VALUES ('87', '6', 'g', '606', '3', '9700', 'FASAT', '3');
INSERT INTO `nutritions` VALUES ('88', '6', 'g', '607', '3', '9800', 'F4D0', '1');
INSERT INTO `nutritions` VALUES ('89', '6', 'g', '608', '3', '9900', 'F6D0', '1');
INSERT INTO `nutritions` VALUES ('90', '6', 'g', '609', '3', '10000', 'F8D0', '1');
INSERT INTO `nutritions` VALUES ('91', '6', 'g', '610', '3', '10100', 'F10D0', '1');
INSERT INTO `nutritions` VALUES ('92', '6', 'g', '611', '3', '10300', 'F12D0', '1');
INSERT INTO `nutritions` VALUES ('93', '6', 'g', '612', '3', '10500', 'F14D0', '1');
INSERT INTO `nutritions` VALUES ('94', '6', 'g', '613', '3', '10700', 'F16D0', '1');
INSERT INTO `nutritions` VALUES ('95', '6', 'g', '614', '3', '10900', 'F18D0', '1');
INSERT INTO `nutritions` VALUES ('96', '6', 'g', '615', '3', '11100', 'F20D0', '1');
INSERT INTO `nutritions` VALUES ('97', '6', 'g', '617', '3', '12100', 'F18D1', '1');
INSERT INTO `nutritions` VALUES ('98', '6', 'g', '618', '3', '13100', 'F18D2', '1');
INSERT INTO `nutritions` VALUES ('99', '6', 'g', '619', '3', '13900', 'F18D3', '1');
INSERT INTO `nutritions` VALUES ('100', '6', 'g', '620', '3', '14700', 'F20D4', '1');
INSERT INTO `nutritions` VALUES ('101', '6', 'g', '621', '3', '15300', 'F22D6', '1');
INSERT INTO `nutritions` VALUES ('102', '6', 'g', '624', '3', '11200', 'F22D0', '1');
INSERT INTO `nutritions` VALUES ('103', '6', 'g', '625', '3', '11500', 'F14D1', '1');
INSERT INTO `nutritions` VALUES ('104', '6', 'g', '626', '3', '11700', 'F16D1', '1');
INSERT INTO `nutritions` VALUES ('105', '6', 'g', '627', '3', '14250', 'F18D4', '1');
INSERT INTO `nutritions` VALUES ('106', '6', 'g', '628', '3', '12400', 'F20D1', '1');
INSERT INTO `nutritions` VALUES ('107', '6', 'g', '629', '3', '15000', 'F20D5', '1');
INSERT INTO `nutritions` VALUES ('108', '6', 'g', '630', '3', '12500', 'F22D1', '1');
INSERT INTO `nutritions` VALUES ('109', '6', 'g', '631', '3', '15200', 'F22D5', '1');
INSERT INTO `nutritions` VALUES ('110', '6', 'mg', '636', '0', '15800', 'PHYSTR', '1');
INSERT INTO `nutritions` VALUES ('111', '6', 'mg', '638', '0', '15900', 'STID7', '1');
INSERT INTO `nutritions` VALUES ('112', '6', 'mg', '639', '0', '16000', 'CAMD5', '1');
INSERT INTO `nutritions` VALUES ('113', '6', 'mg', '641', '0', '16200', 'SITSTR', '1');
INSERT INTO `nutritions` VALUES ('114', '6', 'g', '645', '3', '11400', 'FAMS', '1');
INSERT INTO `nutritions` VALUES ('115', '6', 'g', '646', '3', '12900', 'FAPU', '1');
INSERT INTO `nutritions` VALUES ('116', '6', 'g', '652', '3', '10600', 'F15D0', '1');
INSERT INTO `nutritions` VALUES ('117', '6', 'g', '653', '3', '10800', 'F17D0', '1');
INSERT INTO `nutritions` VALUES ('118', '6', 'g', '654', '3', '11300', 'F24D0', '1');
INSERT INTO `nutritions` VALUES ('119', '6', 'g', '662', '3', '11900', 'F16D1T', '1');
INSERT INTO `nutritions` VALUES ('120', '6', 'g', '663', '3', '12300', 'F18D1T', '1');
INSERT INTO `nutritions` VALUES ('121', '6', 'g', '664', '3', '12700', 'F22D1T', '1');
INSERT INTO `nutritions` VALUES ('122', '6', 'g', '665', '3', '13800', 'F18D2T', '1');
INSERT INTO `nutritions` VALUES ('123', '6', 'g', '666', '3', '13700', 'F18D2I', '1');
INSERT INTO `nutritions` VALUES ('124', '6', 'g', '669', '3', '13600', 'F18D2TT', '1');
INSERT INTO `nutritions` VALUES ('125', '6', 'g', '670', '3', '13300', 'F18D2CLA', '1');
INSERT INTO `nutritions` VALUES ('126', '6', 'g', '671', '3', '12800', 'F24D1C', '1');
INSERT INTO `nutritions` VALUES ('127', '6', 'g', '672', '3', '14300', 'F20D2CN6', '1');
INSERT INTO `nutritions` VALUES ('128', '6', 'g', '673', '3', '11800', 'F16D1C', '1');
INSERT INTO `nutritions` VALUES ('129', '6', 'g', '674', '3', '12200', 'F18D1C', '1');
INSERT INTO `nutritions` VALUES ('130', '6', 'g', '675', '3', '13200', 'F18D2CN6', '1');
INSERT INTO `nutritions` VALUES ('131', '6', 'g', '676', '3', '12600', 'F22D1C', '1');
INSERT INTO `nutritions` VALUES ('132', '6', 'g', '685', '3', '14100', 'F18D3CN6', '1');
INSERT INTO `nutritions` VALUES ('133', '6', 'g', '687', '3', '12000', 'F17D1', '1');
INSERT INTO `nutritions` VALUES ('134', '6', 'g', '689', '3', '14400', 'F20D3', '1');
INSERT INTO `nutritions` VALUES ('135', '6', 'g', '693', '3', '15500', 'FATRNM', '1');
INSERT INTO `nutritions` VALUES ('136', '6', 'g', '695', '3', '15600', 'FATRNP', '1');
INSERT INTO `nutritions` VALUES ('137', '6', 'g', '696', '3', '10400', 'F13D0', '1');
INSERT INTO `nutritions` VALUES ('138', '6', 'g', '697', '3', '11600', 'F15D1', '1');
INSERT INTO `nutritions` VALUES ('139', '6', 'g', '851', '3', '14000', 'F18D3CN3', '1');
INSERT INTO `nutritions` VALUES ('140', '6', 'g', '852', '3', '14500', 'F20D3N3', '1');
INSERT INTO `nutritions` VALUES ('141', '6', 'g', '853', '3', '14600', 'F20D3N6', '1');
INSERT INTO `nutritions` VALUES ('142', '6', 'g', '855', '3', '14900', 'F20D4N6', '1');
INSERT INTO `nutritions` VALUES ('143', '6', 'g', '856', '3', '14200', 'F20D3_und', '1');
INSERT INTO `nutritions` VALUES ('144', '6', 'g', '857', '3', '15100', 'F21D5', '1');
INSERT INTO `nutritions` VALUES ('145', '6', 'g', '858', '3', '15160', 'F22D4', '1');
INSERT INTO `nutritions` VALUES ('146', '6', 'g', '859', '3', '12310', 'F18D1TN7', '1');

/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : listafe

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-12-16 12:55:51
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
  `Group_List` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Nutr_No` varchar(3) DEFAULT NULL,
  `Num_Dec` varchar(1) DEFAULT NULL,
  `SR_Order` float DEFAULT NULL,
  `Tagname` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=147 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nutritions
-- ----------------------------
INSERT INTO `nutritions` VALUES ('1', '2', 'g', '3', '203', '2', '600', 'PROTEIN');
INSERT INTO `nutritions` VALUES ('2', '6', 'g', '3', '204', '2', '800', 'FAT');
INSERT INTO `nutritions` VALUES ('3', '3', 'g', '3', '205', '2', '1100', 'CARBO');
INSERT INTO `nutritions` VALUES ('4', '8', 'g', '2', '207', '2', '1000', 'ASH');
INSERT INTO `nutritions` VALUES ('5', '1', 'kcal', '3', '208', '0', '300', 'ENERG_KCAL');
INSERT INTO `nutritions` VALUES ('6', '3', 'g', '2', '209', '2', '2200', 'STARCH');
INSERT INTO `nutritions` VALUES ('7', '3', 'g', '2', '210', '2', '1600', 'SUCS');
INSERT INTO `nutritions` VALUES ('8', '3', 'g', '2', '211', '2', '1700', 'GLUS');
INSERT INTO `nutritions` VALUES ('9', '3', 'g', '2', '212', '2', '1800', 'FRUS');
INSERT INTO `nutritions` VALUES ('10', '3', 'g', '2', '213', '2', '1900', 'LACS');
INSERT INTO `nutritions` VALUES ('11', '3', 'g', '2', '214', '2', '2000', 'MALS');
INSERT INTO `nutritions` VALUES ('12', '8', 'g', '2', '221', '1', '18200', 'ALC');
INSERT INTO `nutritions` VALUES ('13', '8', 'g', '2', '255', '2', '100', 'WATER');
INSERT INTO `nutritions` VALUES ('14', '1', 'g', '2', '257', '2', '700', 'AdjProt');
INSERT INTO `nutritions` VALUES ('15', '8', 'mg', '2', '262', '0', '18300', 'CAFFN');
INSERT INTO `nutritions` VALUES ('16', '8', 'mg', '2', '263', '0', '18400', 'THEBRN');
INSERT INTO `nutritions` VALUES ('17', '1', 'kJ', '2', '268', '0', '400', 'ENERC_KJ');
INSERT INTO `nutritions` VALUES ('18', '3', 'g', '3', '269', '2', '1500', 'SUGAR');
INSERT INTO `nutritions` VALUES ('19', '3', 'g', '2', '287', '2', '2100', 'GALS');
INSERT INTO `nutritions` VALUES ('20', '3', 'g', '3', '291', '1', '1200', 'FIBER');
INSERT INTO `nutritions` VALUES ('21', '5', 'mg', '2', '301', '0', '5300', 'CA');
INSERT INTO `nutritions` VALUES ('22', '5', 'mg', '2', '303', '2', '5400', 'FE');
INSERT INTO `nutritions` VALUES ('23', '5', 'mg', '2', '304', '0', '5500', 'MG');
INSERT INTO `nutritions` VALUES ('24', '5', 'mg', '2', '305', '0', '5600', 'P');
INSERT INTO `nutritions` VALUES ('25', '5', 'mg', '2', '306', '0', '5700', 'K');
INSERT INTO `nutritions` VALUES ('26', '5', 'mg', '3', '307', '0', '5800', 'NA');
INSERT INTO `nutritions` VALUES ('27', '5', 'mg', '2', '309', '2', '5900', 'ZN');
INSERT INTO `nutritions` VALUES ('28', '5', 'mg', '2', '312', '3', '6000', 'CU');
INSERT INTO `nutritions` VALUES ('29', '5', 'mcg', '2', '313', '1', '6240', 'FLD');
INSERT INTO `nutritions` VALUES ('30', '5', 'mg', '2', '315', '3', '6100', 'MN');
INSERT INTO `nutritions` VALUES ('31', '5', 'mcg', '2', '317', '1', '6200', 'SE');
INSERT INTO `nutritions` VALUES ('32', '4', 'IU', '2', '318', '0', '7500', 'VITA_IU');
INSERT INTO `nutritions` VALUES ('33', '4', 'mcg', '2', '319', '0', '7430', 'RETOL');
INSERT INTO `nutritions` VALUES ('34', '4', 'mcg_RA', '3', '320', '0', '7420', 'VITA_RAE');
INSERT INTO `nutritions` VALUES ('35', '4', 'mcg', '2', '321', '0', '7440', 'CARTB');
INSERT INTO `nutritions` VALUES ('36', '4', 'mcg', '2', '322', '0', '7450', 'CARTA');
INSERT INTO `nutritions` VALUES ('37', '4', 'mg', '2', '323', '2', '7900', 'TOCPHA');
INSERT INTO `nutritions` VALUES ('38', '4', 'IU', '2', '324', '0', '8750', 'VITD');
INSERT INTO `nutritions` VALUES ('39', '4', 'mcg', '2', '325', '1', '8710', 'ERGCAL');
INSERT INTO `nutritions` VALUES ('40', '4', 'mcg', '2', '326', '1', '8720', 'CHOCAL');
INSERT INTO `nutritions` VALUES ('41', '4', 'mcg', '2', '328', '1', '8700', 'VITD');
INSERT INTO `nutritions` VALUES ('42', '4', 'mcg', '2', '334', '0', '7460', 'CRYPX');
INSERT INTO `nutritions` VALUES ('43', '4', 'mcg', '2', '337', '0', '7530', 'LYCPN');
INSERT INTO `nutritions` VALUES ('44', '4', 'mcg', '2', '338', '0', '7560', 'LUT_ZEA');
INSERT INTO `nutritions` VALUES ('45', '1', 'mg', '2', '341', '2', '8000', 'TOCPHB');
INSERT INTO `nutritions` VALUES ('46', '1', 'mg', '2', '342', '2', '8100', 'TOCPHG');
INSERT INTO `nutritions` VALUES ('47', '1', 'mg', '2', '343', '2', '8200', 'TOCPHD');
INSERT INTO `nutritions` VALUES ('48', '4', 'mg', '3', '401', '1', '6300', 'VITC');
INSERT INTO `nutritions` VALUES ('49', '4', 'mg', '2', '404', '3', '6400', 'THIA');
INSERT INTO `nutritions` VALUES ('50', '4', 'mg', '2', '405', '3', '6500', 'RIBF');
INSERT INTO `nutritions` VALUES ('51', '4', 'mg', '2', '406', '3', '6600', 'NIA');
INSERT INTO `nutritions` VALUES ('52', '4', 'mg', '2', '410', '3', '6700', 'PANTAC');
INSERT INTO `nutritions` VALUES ('53', '4', 'mg', '2', '415', '3', '6800', 'VITB6A');
INSERT INTO `nutritions` VALUES ('54', '4', 'mcg', '2', '417', '0', '6900', 'FOL');
INSERT INTO `nutritions` VALUES ('55', '4', 'mcg', '2', '418', '2', '7300', 'VITB12');
INSERT INTO `nutritions` VALUES ('56', '4', 'mg', '2', '421', '1', '7220', 'CHOLN');
INSERT INTO `nutritions` VALUES ('57', '4', 'mcg', '2', '428', '1', '8950', 'MK4');
INSERT INTO `nutritions` VALUES ('58', '4', 'mcg', '2', '429', '1', '8900', 'VITK1D');
INSERT INTO `nutritions` VALUES ('59', '4', 'mcg', '2', '430', '1', '8800', 'VITK1');
INSERT INTO `nutritions` VALUES ('60', '4', 'mcg', '2', '431', '0', '7000', 'FOLAC');
INSERT INTO `nutritions` VALUES ('61', '4', 'mcg', '2', '432', '0', '7100', 'FOLFD');
INSERT INTO `nutritions` VALUES ('62', '4', 'mcg_DF', '2', '435', '0', '7200', 'FOLDFE');
INSERT INTO `nutritions` VALUES ('63', '4', 'mg', '2', '454', '1', '7270', 'BETN');
INSERT INTO `nutritions` VALUES ('64', '2', 'g', '1', '501', '3', '16300', 'TRP_G');
INSERT INTO `nutritions` VALUES ('65', '2', 'g', '1', '502', '3', '16400', 'THR_G');
INSERT INTO `nutritions` VALUES ('66', '2', 'g', '1', '503', '3', '16500', 'ILE_G');
INSERT INTO `nutritions` VALUES ('67', '2', 'g', '1', '504', '3', '16600', 'LEU_G');
INSERT INTO `nutritions` VALUES ('68', '2', 'g', '1', '505', '3', '16700', 'LYS_G');
INSERT INTO `nutritions` VALUES ('69', '2', 'g', '1', '506', '3', '16800', 'MET_G');
INSERT INTO `nutritions` VALUES ('70', '2', 'g', '1', '507', '3', '16900', 'CYS_G');
INSERT INTO `nutritions` VALUES ('71', '2', 'g', '1', '508', '3', '17000', 'PHE_G');
INSERT INTO `nutritions` VALUES ('72', '2', 'g', '1', '509', '3', '17100', 'TYR_G');
INSERT INTO `nutritions` VALUES ('73', '2', 'g', '1', '510', '3', '17200', 'VAL_G');
INSERT INTO `nutritions` VALUES ('74', '2', 'g', '1', '511', '3', '17300', 'ARG_G');
INSERT INTO `nutritions` VALUES ('75', '2', 'g', '1', '512', '3', '17400', 'HISTN_G');
INSERT INTO `nutritions` VALUES ('76', '2', 'g', '1', '513', '3', '17500', 'ALA_G');
INSERT INTO `nutritions` VALUES ('77', '2', 'g', '1', '514', '3', '17600', 'ASP_G');
INSERT INTO `nutritions` VALUES ('78', '2', 'g', '1', '515', '3', '17700', 'GLU_G');
INSERT INTO `nutritions` VALUES ('79', '2', 'g', '1', '516', '3', '17800', 'GLY_G');
INSERT INTO `nutritions` VALUES ('80', '2', 'g', '1', '517', '3', '17900', 'PRO_G');
INSERT INTO `nutritions` VALUES ('81', '2', 'g', '1', '518', '3', '18000', 'SER_G');
INSERT INTO `nutritions` VALUES ('82', '2', 'g', '2', '521', '3', '18100', 'HYP');
INSERT INTO `nutritions` VALUES ('83', '4', 'mg', '2', '573', '2', '7920', 'VitE_ad');
INSERT INTO `nutritions` VALUES ('84', '4', 'mcg', '2', '578', '2', '7340', 'VitB12_ad');
INSERT INTO `nutritions` VALUES ('85', '7', 'mg', '3', '601', '0', '15700', 'CHOLE');
INSERT INTO `nutritions` VALUES ('86', '6', 'g', '3', '605', '3', '15400', 'FATRN');
INSERT INTO `nutritions` VALUES ('87', '6', 'g', '3', '606', '3', '9700', 'FASAT');
INSERT INTO `nutritions` VALUES ('88', '6', 'g', '1', '607', '3', '9800', 'F4D0');
INSERT INTO `nutritions` VALUES ('89', '6', 'g', '1', '608', '3', '9900', 'F6D0');
INSERT INTO `nutritions` VALUES ('90', '6', 'g', '1', '609', '3', '10000', 'F8D0');
INSERT INTO `nutritions` VALUES ('91', '6', 'g', '1', '610', '3', '10100', 'F10D0');
INSERT INTO `nutritions` VALUES ('92', '6', 'g', '1', '611', '3', '10300', 'F12D0');
INSERT INTO `nutritions` VALUES ('93', '6', 'g', '1', '612', '3', '10500', 'F14D0');
INSERT INTO `nutritions` VALUES ('94', '6', 'g', '1', '613', '3', '10700', 'F16D0');
INSERT INTO `nutritions` VALUES ('95', '6', 'g', '1', '614', '3', '10900', 'F18D0');
INSERT INTO `nutritions` VALUES ('96', '6', 'g', '1', '615', '3', '11100', 'F20D0');
INSERT INTO `nutritions` VALUES ('97', '6', 'g', '1', '617', '3', '12100', 'F18D1');
INSERT INTO `nutritions` VALUES ('98', '6', 'g', '1', '618', '3', '13100', 'F18D2');
INSERT INTO `nutritions` VALUES ('99', '6', 'g', '1', '619', '3', '13900', 'F18D3');
INSERT INTO `nutritions` VALUES ('100', '6', 'g', '1', '620', '3', '14700', 'F20D4');
INSERT INTO `nutritions` VALUES ('101', '6', 'g', '1', '621', '3', '15300', 'F22D6');
INSERT INTO `nutritions` VALUES ('102', '6', 'g', '1', '624', '3', '11200', 'F22D0');
INSERT INTO `nutritions` VALUES ('103', '6', 'g', '1', '625', '3', '11500', 'F14D1');
INSERT INTO `nutritions` VALUES ('104', '6', 'g', '1', '626', '3', '11700', 'F16D1');
INSERT INTO `nutritions` VALUES ('105', '6', 'g', '1', '627', '3', '14250', 'F18D4');
INSERT INTO `nutritions` VALUES ('106', '6', 'g', '1', '628', '3', '12400', 'F20D1');
INSERT INTO `nutritions` VALUES ('107', '6', 'g', '1', '629', '3', '15000', 'F20D5');
INSERT INTO `nutritions` VALUES ('108', '6', 'g', '1', '630', '3', '12500', 'F22D1');
INSERT INTO `nutritions` VALUES ('109', '6', 'g', '1', '631', '3', '15200', 'F22D5');
INSERT INTO `nutritions` VALUES ('110', '7', 'mg', '2', '636', '0', '15800', 'PHYSTR');
INSERT INTO `nutritions` VALUES ('111', '6', 'mg', '1', '638', '0', '15900', 'STID7');
INSERT INTO `nutritions` VALUES ('112', '6', 'mg', '1', '639', '0', '16000', 'CAMD5');
INSERT INTO `nutritions` VALUES ('113', '6', 'mg', '1', '641', '0', '16200', 'SITSTR');
INSERT INTO `nutritions` VALUES ('114', '6', 'g', '1', '645', '3', '11400', 'FAMS');
INSERT INTO `nutritions` VALUES ('115', '6', 'g', '1', '646', '3', '12900', 'FAPU');
INSERT INTO `nutritions` VALUES ('116', '6', 'g', '1', '652', '3', '10600', 'F15D0');
INSERT INTO `nutritions` VALUES ('117', '6', 'g', '1', '653', '3', '10800', 'F17D0');
INSERT INTO `nutritions` VALUES ('118', '6', 'g', '1', '654', '3', '11300', 'F24D0');
INSERT INTO `nutritions` VALUES ('119', '6', 'g', '1', '662', '3', '11900', 'F16D1T');
INSERT INTO `nutritions` VALUES ('120', '6', 'g', '1', '663', '3', '12300', 'F18D1T');
INSERT INTO `nutritions` VALUES ('121', '6', 'g', '1', '664', '3', '12700', 'F22D1T');
INSERT INTO `nutritions` VALUES ('122', '6', 'g', '1', '665', '3', '13800', 'F18D2T');
INSERT INTO `nutritions` VALUES ('123', '6', 'g', '1', '666', '3', '13700', 'F18D2I');
INSERT INTO `nutritions` VALUES ('124', '6', 'g', '1', '669', '3', '13600', 'F18D2TT');
INSERT INTO `nutritions` VALUES ('125', '6', 'g', '1', '670', '3', '13300', 'F18D2CLA');
INSERT INTO `nutritions` VALUES ('126', '6', 'g', '1', '671', '3', '12800', 'F24D1C');
INSERT INTO `nutritions` VALUES ('127', '6', 'g', '1', '672', '3', '14300', 'F20D2CN6');
INSERT INTO `nutritions` VALUES ('128', '6', 'g', '1', '673', '3', '11800', 'F16D1C');
INSERT INTO `nutritions` VALUES ('129', '6', 'g', '1', '674', '3', '12200', 'F18D1C');
INSERT INTO `nutritions` VALUES ('130', '6', 'g', '1', '675', '3', '13200', 'F18D2CN6');
INSERT INTO `nutritions` VALUES ('131', '6', 'g', '1', '676', '3', '12600', 'F22D1C');
INSERT INTO `nutritions` VALUES ('132', '6', 'g', '1', '685', '3', '14100', 'F18D3CN6');
INSERT INTO `nutritions` VALUES ('133', '6', 'g', '1', '687', '3', '12000', 'F17D1');
INSERT INTO `nutritions` VALUES ('134', '6', 'g', '1', '689', '3', '14400', 'F20D3');
INSERT INTO `nutritions` VALUES ('135', '6', 'g', '1', '693', '3', '15500', 'FATRNM');
INSERT INTO `nutritions` VALUES ('136', '6', 'g', '1', '695', '3', '15600', 'FATRNP');
INSERT INTO `nutritions` VALUES ('137', '6', 'g', '1', '696', '3', '10400', 'F13D0');
INSERT INTO `nutritions` VALUES ('138', '6', 'g', '1', '697', '3', '11600', 'F15D1');
INSERT INTO `nutritions` VALUES ('139', '6', 'g', '1', '851', '3', '14000', 'F18D3CN3');
INSERT INTO `nutritions` VALUES ('140', '6', 'g', '1', '852', '3', '14500', 'F20D3N3');
INSERT INTO `nutritions` VALUES ('141', '6', 'g', '1', '853', '3', '14600', 'F20D3N6');
INSERT INTO `nutritions` VALUES ('142', '6', 'g', '1', '855', '3', '14900', 'F20D4N6');
INSERT INTO `nutritions` VALUES ('143', '6', 'g', '1', '856', '3', '14200', 'F20D3_und');
INSERT INTO `nutritions` VALUES ('144', '6', 'g', '1', '857', '3', '15100', 'F21D5');
INSERT INTO `nutritions` VALUES ('145', '6', 'g', '1', '858', '3', '15160', 'F22D4');
INSERT INTO `nutritions` VALUES ('146', '6', 'g', '1', '859', '3', '12310', 'F18D1TN7');

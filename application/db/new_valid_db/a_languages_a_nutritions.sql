/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : swap_nutrition

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-12-01 16:15:16
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `a_languages_a_nutritions`
-- ----------------------------
DROP TABLE IF EXISTS `a_languages_a_nutritions`;
CREATE TABLE `a_languages_a_nutritions` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `a_nutrition_id` smallint(5) unsigned NOT NULL,
  `a_language_id` tinyint(1) unsigned NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `nutr_def` text,
  `abbrev` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of a_languages_a_nutritions
-- ----------------------------
INSERT INTO `a_languages_a_nutritions` VALUES ('1', '1', '1', 'Calcium', 'CA', 'Calcium');
INSERT INTO `a_languages_a_nutritions` VALUES ('2', '2', '1', 'Iron', 'FE', 'Iron');
INSERT INTO `a_languages_a_nutritions` VALUES ('3', '3', '1', 'Magnesium', 'MG', 'Magnesium');
INSERT INTO `a_languages_a_nutritions` VALUES ('4', '4', '1', 'Phosphorus', 'P', 'Phosphorus');
INSERT INTO `a_languages_a_nutritions` VALUES ('5', '5', '1', 'Potassium', 'K', 'Potassium');
INSERT INTO `a_languages_a_nutritions` VALUES ('6', '6', '1', 'Sodium', 'NA', 'Sodium');
INSERT INTO `a_languages_a_nutritions` VALUES ('7', '7', '1', 'Zinc', 'ZN', 'Zinc');
INSERT INTO `a_languages_a_nutritions` VALUES ('8', '8', '1', 'Copper', 'CU', 'Copper');
INSERT INTO `a_languages_a_nutritions` VALUES ('9', '9', '1', 'Manganese', 'MN', 'Manganese');
INSERT INTO `a_languages_a_nutritions` VALUES ('10', '10', '1', 'Selenium', 'SE', 'Selenium');
INSERT INTO `a_languages_a_nutritions` VALUES ('11', '11', '1', 'Vitamin C', 'VITC', 'Vit_C');
INSERT INTO `a_languages_a_nutritions` VALUES ('12', '12', '1', 'Thiamin', 'THIA', 'Thiamin');
INSERT INTO `a_languages_a_nutritions` VALUES ('13', '13', '1', 'Riboflavin', 'RIBF', 'Riboflavin');
INSERT INTO `a_languages_a_nutritions` VALUES ('14', '14', '1', 'Niacin', 'NIA', 'Niacin');
INSERT INTO `a_languages_a_nutritions` VALUES ('15', '15', '1', 'Pantothenic Acid', 'PANTAC', 'Panto_Acid');
INSERT INTO `a_languages_a_nutritions` VALUES ('16', '16', '1', 'Vitamin B6', 'VITB6A', 'Vit_B6');
INSERT INTO `a_languages_a_nutritions` VALUES ('17', '17', '1', 'Folate, total', 'FOL', 'Folate_Tot');
INSERT INTO `a_languages_a_nutritions` VALUES ('18', '18', '1', 'Folic acid', 'FOLAC', 'Folic_Acid');
INSERT INTO `a_languages_a_nutritions` VALUES ('19', '19', '1', 'Folate, food', 'FOLFD', 'Food_Folate');
INSERT INTO `a_languages_a_nutritions` VALUES ('20', '20', '1', 'Folate, DFE', 'FOLDFE', 'Folate_DFE');
INSERT INTO `a_languages_a_nutritions` VALUES ('21', '21', '1', 'Choline', 'CHOLN', 'Choline_Tot');
INSERT INTO `a_languages_a_nutritions` VALUES ('22', '22', '1', 'Vitamin B12', 'VITB12', 'Vit_B12');
INSERT INTO `a_languages_a_nutritions` VALUES ('23', '23', '1', 'Vitamin A IU', 'VITA_IU', 'Vit_A_IU');
INSERT INTO `a_languages_a_nutritions` VALUES ('24', '24', '1', 'Vitamin A, RAE', 'VITA_RAE', 'Vit_A_RAE');
INSERT INTO `a_languages_a_nutritions` VALUES ('25', '25', '1', 'Retinol', 'RETOL', 'Retinol');
INSERT INTO `a_languages_a_nutritions` VALUES ('26', '26', '1', 'Carotene, beta', 'CARTB', 'Alpha_Carot');
INSERT INTO `a_languages_a_nutritions` VALUES ('27', '27', '1', 'Carotene, alpha', 'CARTA', 'Beta_Carot');
INSERT INTO `a_languages_a_nutritions` VALUES ('28', '28', '1', 'Cryptoxanthin, beta', 'CRYPX', 'Beta_Crypt');
INSERT INTO `a_languages_a_nutritions` VALUES ('29', '29', '1', 'Lycopene', 'LYCPN', 'Lycopene');
INSERT INTO `a_languages_a_nutritions` VALUES ('30', '30', '1', 'Lutein + zeaxanthin', 'LUT+ZEA', 'Lut+Zea');
INSERT INTO `a_languages_a_nutritions` VALUES ('31', '31', '1', 'Vitamin E', 'TOCPHA', 'Vit_E');
INSERT INTO `a_languages_a_nutritions` VALUES ('32', '32', '1', 'Vitamin D (D2 + D3)', 'VITD', 'Vit_D_mcg');
INSERT INTO `a_languages_a_nutritions` VALUES ('33', '33', '1', 'Vitamin D IU', 'VITD', 'ViVit_D_IU');
INSERT INTO `a_languages_a_nutritions` VALUES ('34', '34', '1', 'Vitamin K', 'VITK1', 'Vit_K');
INSERT INTO `a_languages_a_nutritions` VALUES ('35', '35', '1', 'Saturated Fat', null, 'FA_Sat');
INSERT INTO `a_languages_a_nutritions` VALUES ('36', '36', '1', 'Monounsaturated Fat', null, 'FA_Mono');
INSERT INTO `a_languages_a_nutritions` VALUES ('37', '37', '1', 'Polyunsaturated Fat', null, 'FA_Poly');
INSERT INTO `a_languages_a_nutritions` VALUES ('38', '38', '1', 'Cholesterol', 'CHOLE', 'Cholestrl');
INSERT INTO `a_languages_a_nutritions` VALUES ('39', '39', '1', null, null, 'GmWt_1');
INSERT INTO `a_languages_a_nutritions` VALUES ('40', '40', '1', null, null, 'GmWt_Desc1');
INSERT INTO `a_languages_a_nutritions` VALUES ('41', '41', '1', null, null, 'GmWt_2');
INSERT INTO `a_languages_a_nutritions` VALUES ('42', '42', '1', null, null, 'GmWt_Desc2');
INSERT INTO `a_languages_a_nutritions` VALUES ('43', '43', '1', null, null, 'Refuse_Pct');
INSERT INTO `a_languages_a_nutritions` VALUES ('44', '44', '1', 'Water', 'WATER', 'Water');
INSERT INTO `a_languages_a_nutritions` VALUES ('45', '45', '1', 'Ash', 'ASH', 'Ash');
INSERT INTO `a_languages_a_nutritions` VALUES ('46', '46', '1', 'Proteine', 'PROCNT', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('47', '47', '1', 'Total lipid (fat)', 'FAT', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('48', '48', '1', 'Energy', 'ENERC_KCAL', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('49', '49', '1', 'Starch', 'STARCH', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('50', '50', '1', 'Sucrose', 'SUCS', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('51', '51', '1', 'Glucose (dextrose)', 'GLUS', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('52', '52', '1', 'Fructose', 'FRUS', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('53', '53', '1', 'Lactose', 'LACS', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('54', '54', '1', 'Maltose', 'MALS', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('55', '55', '1', 'Alcohol, ethyl', 'ALC', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('56', '56', '1', 'Caffeine', 'CAFFN', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('57', '57', '1', 'Theobromine', 'THEBRN', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('58', '58', '1', 'Sugars, total', 'SUGAR', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('59', '59', '1', 'Galactose', 'GALS', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('60', '60', '1', 'Fiber, total dietary', 'FIBTG', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('61', '61', '1', 'Tocopherol, beta', 'TOCPHB', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('62', '62', '1', 'Tocopherol, gamma', 'TOCPHG', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('63', '63', '1', 'Tocopherol, delta', 'TOCPHD', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('64', '64', '1', 'Fatty acids, total trans', 'FATRN', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('65', '65', '1', 'Fatty acids, total saturated', 'FASAT', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('66', '66', '1', 'Tryptophan', 'TRP_G', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('67', '67', '1', 'Threonine', 'THR_G', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('68', '68', '1', 'Isoleucine', 'ILE_G', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('69', '69', '1', 'Leucine', 'LEU_G', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('70', '70', '1', 'Lysine', 'LYS_G', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('71', '71', '1', 'Methionine', 'MET_G', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('72', '72', '1', 'Cystine', 'CYS_G', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('73', '72', '1', 'Phenylalanine', 'PHE_G', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('74', '74', '1', 'Tyrosine', 'TYR_G', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('75', '75', '1', 'Valine', 'VAL_G', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('76', '76', '1', 'Arginine', 'ARG_G', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('77', '77', '1', 'Histidine', 'HISTN_G', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('78', '78', '1', 'Alanine', 'ALA_G', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('79', '79', '1', 'Aspartic acid', 'ASP_G', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('80', '80', '1', 'Glutamic acid', 'GLU_G', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('81', '81', '1', 'Glycine', 'GLY_G', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('82', '82', '1', 'Proline', 'PRO_G', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('83', '83', '1', 'Serine', 'SER_G', null);
INSERT INTO `a_languages_a_nutritions` VALUES ('84', '84', '1', 'Hydroxyproline', 'HYP', null);

-- ----------------------------
-- Table structure for `a_nutritions`
-- ----------------------------
DROP TABLE IF EXISTS `a_nutritions`;
CREATE TABLE `a_nutritions` (
  `id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `a_nutrition_category_id` int(50) unsigned NOT NULL,
  `units` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of a_nutritions
-- ----------------------------
INSERT INTO `a_nutritions` VALUES ('1', '5', 'mg');
INSERT INTO `a_nutritions` VALUES ('2', '5', 'mg');
INSERT INTO `a_nutritions` VALUES ('3', '5', 'mg');
INSERT INTO `a_nutritions` VALUES ('4', '5', 'mg');
INSERT INTO `a_nutritions` VALUES ('5', '5', 'mg');
INSERT INTO `a_nutritions` VALUES ('6', '5', 'mg');
INSERT INTO `a_nutritions` VALUES ('7', '5', 'mg');
INSERT INTO `a_nutritions` VALUES ('8', '5', 'mg');
INSERT INTO `a_nutritions` VALUES ('9', '5', 'mg');
INSERT INTO `a_nutritions` VALUES ('10', '5', 'mg');
INSERT INTO `a_nutritions` VALUES ('11', '4', 'mg');
INSERT INTO `a_nutritions` VALUES ('12', '4', 'mg');
INSERT INTO `a_nutritions` VALUES ('13', '4', 'mg');
INSERT INTO `a_nutritions` VALUES ('14', '4', 'mcg');
INSERT INTO `a_nutritions` VALUES ('15', '4', 'mg');
INSERT INTO `a_nutritions` VALUES ('16', '4', 'mg');
INSERT INTO `a_nutritions` VALUES ('17', '4', 'mg');
INSERT INTO `a_nutritions` VALUES ('18', '4', 'mg');
INSERT INTO `a_nutritions` VALUES ('19', '4', 'mcg');
INSERT INTO `a_nutritions` VALUES ('20', '4', 'mcg_DF');
INSERT INTO `a_nutritions` VALUES ('21', '4', 'mg');
INSERT INTO `a_nutritions` VALUES ('22', '4', 'mcg');
INSERT INTO `a_nutritions` VALUES ('23', '4', 'IU');
INSERT INTO `a_nutritions` VALUES ('24', '4', 'mcg_RA');
INSERT INTO `a_nutritions` VALUES ('25', '4', 'mcg');
INSERT INTO `a_nutritions` VALUES ('26', '4', 'mcg');
INSERT INTO `a_nutritions` VALUES ('27', '4', 'mcg');
INSERT INTO `a_nutritions` VALUES ('28', '4', 'mcg');
INSERT INTO `a_nutritions` VALUES ('29', '4', 'mcg');
INSERT INTO `a_nutritions` VALUES ('30', '4', 'mcg');
INSERT INTO `a_nutritions` VALUES ('31', '4', 'mg');
INSERT INTO `a_nutritions` VALUES ('32', '4', 'mcg');
INSERT INTO `a_nutritions` VALUES ('33', '4', 'IU');
INSERT INTO `a_nutritions` VALUES ('34', '4', 'mcg');
INSERT INTO `a_nutritions` VALUES ('35', '6', 'mg');
INSERT INTO `a_nutritions` VALUES ('36', '6', 'mg');
INSERT INTO `a_nutritions` VALUES ('37', '6', 'mg');
INSERT INTO `a_nutritions` VALUES ('38', '7', 'mg');
INSERT INTO `a_nutritions` VALUES ('39', '4', 'mg');
INSERT INTO `a_nutritions` VALUES ('40', '4', 'mg');
INSERT INTO `a_nutritions` VALUES ('41', '4', 'mg');
INSERT INTO `a_nutritions` VALUES ('42', '4', 'mg');
INSERT INTO `a_nutritions` VALUES ('43', '4', 'mg');
INSERT INTO `a_nutritions` VALUES ('44', '8', 'g');
INSERT INTO `a_nutritions` VALUES ('45', '8', 'g');
INSERT INTO `a_nutritions` VALUES ('46', '2', 'g');
INSERT INTO `a_nutritions` VALUES ('47', '6', 'g');
INSERT INTO `a_nutritions` VALUES ('48', '1', 'kj');
INSERT INTO `a_nutritions` VALUES ('49', '3', 'g');
INSERT INTO `a_nutritions` VALUES ('50', '3', 'g');
INSERT INTO `a_nutritions` VALUES ('51', '3', 'g');
INSERT INTO `a_nutritions` VALUES ('52', '3', 'g');
INSERT INTO `a_nutritions` VALUES ('53', '3', 'g');
INSERT INTO `a_nutritions` VALUES ('54', '3', 'g');
INSERT INTO `a_nutritions` VALUES ('55', '8', 'g');
INSERT INTO `a_nutritions` VALUES ('56', '3', 'mg');
INSERT INTO `a_nutritions` VALUES ('57', '3', 'mg');
INSERT INTO `a_nutritions` VALUES ('58', '4', 'g');
INSERT INTO `a_nutritions` VALUES ('59', '4', 'g');
INSERT INTO `a_nutritions` VALUES ('60', '4', 'g');
INSERT INTO `a_nutritions` VALUES ('61', '4', 'g');
INSERT INTO `a_nutritions` VALUES ('62', '4', 'g');
INSERT INTO `a_nutritions` VALUES ('63', '4', 'mg');
INSERT INTO `a_nutritions` VALUES ('64', '6', 'g');
INSERT INTO `a_nutritions` VALUES ('65', '6', 'g');
INSERT INTO `a_nutritions` VALUES ('66', '2', 'g');
INSERT INTO `a_nutritions` VALUES ('67', '2', 'g');
INSERT INTO `a_nutritions` VALUES ('68', '2', 'g');
INSERT INTO `a_nutritions` VALUES ('69', '2', 'g');
INSERT INTO `a_nutritions` VALUES ('70', '2', 'g');
INSERT INTO `a_nutritions` VALUES ('71', '2', 'g');
INSERT INTO `a_nutritions` VALUES ('72', '2', 'g');
INSERT INTO `a_nutritions` VALUES ('73', '2', 'g');
INSERT INTO `a_nutritions` VALUES ('74', '2', 'g');
INSERT INTO `a_nutritions` VALUES ('75', '2', 'g');
INSERT INTO `a_nutritions` VALUES ('76', '2', 'g');
INSERT INTO `a_nutritions` VALUES ('77', '2', 'g');
INSERT INTO `a_nutritions` VALUES ('78', '2', 'g');
INSERT INTO `a_nutritions` VALUES ('79', '2', 'g');
INSERT INTO `a_nutritions` VALUES ('80', '2', 'g');
INSERT INTO `a_nutritions` VALUES ('81', '2', 'g');
INSERT INTO `a_nutritions` VALUES ('82', '2', 'g');
INSERT INTO `a_nutritions` VALUES ('83', '2', 'g');
INSERT INTO `a_nutritions` VALUES ('84', '2', 'g');

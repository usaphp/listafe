/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : readprint_local

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-12-08 10:21:05
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `reports`
-- ----------------------------
DROP TABLE IF EXISTS `reports`;
CREATE TABLE `reports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `report_on_id` int(10) unsigned DEFAULT NULL,
  `report_on_type` varchar(255) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reports
-- ----------------------------
INSERT INTO reports VALUES ('1', '27', 'review', '1', '2010-12-06 00:30:18');
INSERT INTO reports VALUES ('2', '15', 'review', '1', '2010-12-06 00:31:05');
INSERT INTO reports VALUES ('3', '50', 'comment', '1', '2010-12-06 01:04:45');
INSERT INTO reports VALUES ('4', '34', 'review', '1', '2010-12-06 03:24:52');
INSERT INTO reports VALUES ('5', '3', 'review', '1', '2010-12-06 04:45:25');







/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : readprint_local

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-12-08 10:21:40
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `review_comments`
-- ----------------------------
DROP TABLE IF EXISTS `review_comments`;
CREATE TABLE `review_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `review_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `comment` mediumtext,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of review_comments
-- ----------------------------
INSERT INTO review_comments VALUES ('1', '1', '1', 'asadasd', '0', '2010-11-15 03:47:36');
INSERT INTO review_comments VALUES ('2', '1', '1', 'all this mistaken idea', '1', '2010-11-15 03:51:03');
INSERT INTO review_comments VALUES ('3', '1', '4', 'the actual teachings of the great', '0', '2010-11-15 03:53:45');
INSERT INTO review_comments VALUES ('4', '1', '4', 'wasssap', '1', '2010-11-15 03:53:55');
INSERT INTO review_comments VALUES ('5', '1', '4', '\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', '3', '2010-11-15 04:30:08');
INSERT INTO review_comments VALUES ('6', '1', '4', 'Sed quis metus a ligula consectetur blandit. Ut rutrum, odio eget semper lobortis, elit erat auctor leo, vitae luctus metus tortor id dolor. Aliquam lacinia velit a neque tempus eu varius lacus dignissim. Nulla eros quam, tempus eget rhoncus non, mollis ut magna. Integer nec pretium elit. Nulla elementum egestas sodales. Maecenas vel risus in lectus imperdiet pulvinar. Sed vitae pretium magna. Nam vitae augue lorem. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque pellentesque purus in leo volutpat sodales. Ut dignissim ipsum at risus semper tempor.', '0', '2010-11-15 05:01:15');
INSERT INTO review_comments VALUES ('7', '1', '4', 'Aenean sit amet leo urna, eget commodo mi. Aliquam in quam sed leo ullamcorper aliquet eu et nunc. Nam congue mauris a tellus lacinia venenatis. Nunc pharetra malesuada lacus, aliquam sagittis lacus adipiscing id. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus eu lectus lacus. Curabitur non fringilla metus. Etiam in felis ligula. Donec et quam mauris, et tempor risus. Vivamus iaculis tempus gravida. Etiam id velit at est placerat iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse dui mi, pulvinar sed aliquam sed, gravida eget augue. In pellentesque lorem sed mi tincidunt tempus. Nulla facilisi. Aenean venenatis, nunc vel suscipit interdum, dolor sapien vehicula erat, a placerat metus diam sed nibh. Aenean pellentesque, lacus ut malesuada auctor, nibh nibh semper eros, et mattis libero nulla quis nunc.', '3', '2010-11-15 05:26:38');
INSERT INTO review_comments VALUES ('10', '1', '1', 'Nam vitae augue lorem. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus\n\nRead more: Online Books, Poems, Short Stories - Read Print Library http://local.readprint/review/review_comments/1#ixzz15QTBY4BP\n1000s of FREE online books', '6', '2010-11-15 22:54:02');
INSERT INTO review_comments VALUES ('11', '1', '1', 'In hac habitasse platea dictumst. Integer lacus nunc, imperdiet tempus pretium vitae, viverra sit amet risus. Aliquam et purus ante. Suspendisse nisi augue, dignissim eu commodo tempus, sodales id lorem. Maecenas nec mauris et enim ornare tempus. Mauris elementum tortor id dolor viverra ac pellentesque dolor auctor. Duis ultricies tincidunt tortor, vel venenatis sapien laoreet id. Proin quis ipsum nibh, vel ultricies turpis. Sed eget arcu orci, sit amet porta nisl. Vivamus malesuada cursus vehicula. Praesent arcu nisl, ullamcorper ac pretium sed, elementum eget neque.', '0', '2010-11-15 22:54:31');
INSERT INTO review_comments VALUES ('12', '3', '1', 'Maecenas vel risus in lectus imperdiet pulvinar. Sed vitae pretium magna. Nam vitae augue lorem. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque pellentesque purus in leo volutpat sodales.', '0', '2010-11-15 23:47:48');
INSERT INTO review_comments VALUES ('13', '5', '4', 'Aliquam lacinia velit a neque tempus eu varius lacus dignissim. Nulla eros quam, tempus eget rhoncus non', '0', '2010-11-17 00:28:38');
INSERT INTO review_comments VALUES ('14', '2', '4', 'Suspendisse nisi augue', '0', '2010-11-17 04:06:07');
INSERT INTO review_comments VALUES ('15', '12', '4', 'Post a comment', '0', '2010-11-22 04:55:06');
INSERT INTO review_comments VALUES ('16', '17', '4', '2dwedwed', '0', '2010-11-25 22:59:46');
INSERT INTO review_comments VALUES ('17', '1', '1', 'some text', '0', '2010-11-29 22:17:51');
INSERT INTO review_comments VALUES ('18', '1', '1', 'some text', '0', '2010-11-29 22:18:16');
INSERT INTO review_comments VALUES ('19', '3', '1', 'bla bla bla', '0', '2010-11-29 23:16:34');
INSERT INTO review_comments VALUES ('20', '10', '1', 'fine', '0', '2010-11-30 02:33:17');
INSERT INTO review_comments VALUES ('36', '12', '1', 'asdasda', '0', '2010-12-02 01:34:52');
INSERT INTO review_comments VALUES ('37', '12', '1', 'fdsf', '0', '2010-12-02 01:35:36');
INSERT INTO review_comments VALUES ('38', '12', '1', 'fsdfs', '0', '2010-12-02 01:38:12');
INSERT INTO review_comments VALUES ('39', '12', '1', 'stepan ti ne prav', '0', '2010-12-02 03:36:22');
INSERT INTO review_comments VALUES ('40', '12', '7', 'sadas', '39', '2010-12-02 03:42:54');
INSERT INTO review_comments VALUES ('41', '12', '1', 'ne pon9tno', '38', '2010-12-02 03:45:53');
INSERT INTO review_comments VALUES ('42', '12', '1', 'dl9 stepanan', '0', '2010-12-02 03:46:43');
INSERT INTO review_comments VALUES ('43', '12', '7', 'maksimu', '42', '2010-12-02 03:48:34');
INSERT INTO review_comments VALUES ('44', '20', '1', 'asdasd', '0', '2010-12-02 03:55:48');
INSERT INTO review_comments VALUES ('45', '14', '6', 'stepan eto tebe', '0', '2010-12-02 05:48:23');
INSERT INTO review_comments VALUES ('46', '14', '6', 'thank yoou  for your letter', '45', '2010-12-02 05:48:45');
INSERT INTO review_comments VALUES ('47', '14', '7', 'pismo na gmail', '45', '2010-12-02 05:51:45');
INSERT INTO review_comments VALUES ('48', '14', '7', 'sdadasd', '45', '2010-12-02 05:52:27');
INSERT INTO review_comments VALUES ('49', '32', '1', 'dsfsdfd', '0', '2010-12-06 00:53:15');
INSERT INTO review_comments VALUES ('50', '15', '1', 'sdfsdf', '0', '2010-12-06 01:04:36');
INSERT INTO review_comments VALUES ('51', '15', '1', '333333333', '50', '2010-12-06 02:46:53');
INSERT INTO review_comments VALUES ('52', '15', '1', 'submit', '50', '2010-12-06 02:50:15');


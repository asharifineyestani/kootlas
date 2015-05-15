/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : ali

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2015-05-16 01:54:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ci_sessions
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------
INSERT INTO `ci_sessions` VALUES ('d6ad7215cf9d80e8c353b5cd266adf7c', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.152 Safari/537.36', '1431723317', 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"logged_in\";a:3:{s:8:\"username\";s:7:\"kootlas\";s:2:\"id\";s:1:\"1\";s:4:\"type\";s:10:\"tutor_type\";}}');
INSERT INTO `ci_sessions` VALUES ('fd03ee82a9b153d2556d4cee1128daa1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.152 Safari/537.36', '1431721384', 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"logged_in\";a:3:{s:8:\"username\";s:5:\"akbar\";s:2:\"id\";s:2:\"18\";s:4:\"type\";s:10:\"tutor_type\";}}');

-- ----------------------------
-- Table structure for kootlas_event
-- ----------------------------
DROP TABLE IF EXISTS `kootlas_event`;
CREATE TABLE `kootlas_event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(200) DEFAULT NULL,
  `event_text` varchar(2000) DEFAULT NULL,
  `event_date` datetime DEFAULT NULL,
  `event_city` varchar(50) DEFAULT NULL,
  `event_state` decimal(65,0) DEFAULT NULL,
  `event_owner` int(11) DEFAULT NULL,
  `event_price` int(10) DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kootlas_event
-- ----------------------------

-- ----------------------------
-- Table structure for kootlas_user
-- ----------------------------
DROP TABLE IF EXISTS `kootlas_user`;
CREATE TABLE `kootlas_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(100) DEFAULT NULL,
  `user_lname` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_mobile` varchar(100) DEFAULT NULL,
  `user_level` int(11) DEFAULT NULL,
  `user_disable` int(11) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_username` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kootlas_user
-- ----------------------------
INSERT INTO `kootlas_user` VALUES ('1', 'ali', 'sharifi', 'kootlas@yahoo.com', '09185257989', '1', '0', 'c94e69e6d5bba8d671ef2f3a2fa10956', 'kootlas');

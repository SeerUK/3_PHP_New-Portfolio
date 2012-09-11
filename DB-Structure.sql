/*
Navicat MySQL Data Transfer

Source Server         : Local Development
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : ew_portfolio

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2012-09-11 07:26:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tblblogentry`
-- ----------------------------
DROP TABLE IF EXISTS `tblblogentry`;
CREATE TABLE `tblblogentry` (
  `intBlogEntryId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `strBlogTitle` varchar(255) NOT NULL,
  `strBlogSubtitle` varchar(255) DEFAULT NULL,
  `strContent` longtext NOT NULL,
  `stmTimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`intBlogEntryId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

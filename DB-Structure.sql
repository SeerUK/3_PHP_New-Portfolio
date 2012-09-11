SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tblblogentry`
-- ----------------------------
DROP TABLE IF EXISTS `tblblogentry`;
CREATE TABLE `tblblogentry` (
  `intBlogEntryId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `strBlogTitle` varchar(255) NOT NULL,
  `strBlogSubtitle` varchar(255) NULL,
  `strContent` longtext NOT NULL,
  `stmTimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`intBlogEntryId`)
)
ENGINE=InnoDB;

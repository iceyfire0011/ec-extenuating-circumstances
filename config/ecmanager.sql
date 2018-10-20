/*
MySQL Data Transfer
Source Host: localhost
Source Database: ecmanager
Target Host: localhost
Target Database: ecmanager
Date: 08-Apr-17 4:28:27 PM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for complain
-- ----------------------------
DROP TABLE IF EXISTS `complain`;
CREATE TABLE `complain` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(250) NOT NULL,
  `cdetails` text NOT NULL,
  `duedate` datetime NOT NULL,
  `finaldate` datetime NOT NULL,
  `courseid` int(11) NOT NULL,
  PRIMARY KEY (`cid`),
  KEY `courseid` (`courseid`),
  CONSTRAINT `complain_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `course` (`courseid`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for course
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `courseid` int(11) NOT NULL AUTO_INCREMENT,
  `coursename` varchar(250) NOT NULL,
  `did` int(11) NOT NULL,
  PRIMARY KEY (`courseid`),
  KEY `did` (`did`),
  CONSTRAINT `course_ibfk_1` FOREIGN KEY (`did`) REFERENCES `department` (`did`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `did` int(11) NOT NULL,
  `dname` varchar(250) NOT NULL,
  `fid` int(11) DEFAULT NULL,
  PRIMARY KEY (`did`),
  UNIQUE KEY `dname` (`dname`),
  KEY `fid` (`fid`),
  CONSTRAINT `department_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `facultycoord` (`fid`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for evidence
-- ----------------------------
DROP TABLE IF EXISTS `evidence`;
CREATE TABLE `evidence` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `ename` varchar(250) NOT NULL,
  `etype` enum('jpeg','jpg','png','gif','pdf') DEFAULT NULL,
  `eupdate` datetime NOT NULL,
  `scid` int(11) NOT NULL,
  PRIMARY KEY (`eid`),
  KEY `scid` (`scid`),
  CONSTRAINT `evidence_ibfk_1` FOREIGN KEY (`scid`) REFERENCES `subjectcomplain` (`scid`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for facultycoord
-- ----------------------------
DROP TABLE IF EXISTS `facultycoord`;
CREATE TABLE `facultycoord` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`fid`),
  KEY `uid` (`uid`),
  CONSTRAINT `facultycoord_ibfk_3` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for solution
-- ----------------------------
DROP TABLE IF EXISTS `solution`;
CREATE TABLE `solution` (
  `solid` int(11) NOT NULL AUTO_INCREMENT,
  `solvedate` datetime NOT NULL,
  `solution` longtext,
  `scid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  PRIMARY KEY (`solid`),
  KEY `scid` (`scid`),
  KEY `fid` (`fid`),
  CONSTRAINT `solution_ibfk_1` FOREIGN KEY (`scid`) REFERENCES `subjectcomplain` (`scid`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `solution_ibfk_4` FOREIGN KEY (`fid`) REFERENCES `facultycoord` (`fid`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  PRIMARY KEY (`sid`),
  KEY `uid` (`uid`),
  KEY `did` (`did`),
  CONSTRAINT `student_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `student_ibfk_2` FOREIGN KEY (`did`) REFERENCES `department` (`did`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for subjectcomplain
-- ----------------------------
DROP TABLE IF EXISTS `subjectcomplain`;
CREATE TABLE `subjectcomplain` (
  `scid` int(11) NOT NULL AUTO_INCREMENT,
  `sctitle` varchar(250) NOT NULL,
  `scdetails` text NOT NULL,
  `submissiontime` datetime NOT NULL,
  `replyabledate` datetime NOT NULL,
  `numevidence` int(11) NOT NULL DEFAULT '0',
  `status` enum('solved','unsolved','denied') NOT NULL DEFAULT 'unsolved',
  `sid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  PRIMARY KEY (`scid`),
  KEY `sid` (`sid`),
  KEY `cid` (`cid`),
  CONSTRAINT `subjectcomplain_ibfk_3` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `subjectcomplain_ibfk_4` FOREIGN KEY (`cid`) REFERENCES `complain` (`cid`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(250) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `ucatagori` enum('student','administrator','coordinator','manager') NOT NULL,
  `attempts` int(11) NOT NULL,
  `timestamps` bigint(20) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uname` (`uname`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- View structure for totalclaims
-- ----------------------------
DROP VIEW IF EXISTS `totalclaims`;
CREATE VIEW `totalclaims` AS select count(`subjectcomplain`.`scid`) AS `numclaim` from `subjectcomplain`;

-- ----------------------------
-- View structure for numstdcompindept
-- ----------------------------
DROP VIEW IF EXISTS `numstdcompindept`;
CREATE VIEW `numstdcompindept` AS select count(distinct `student`.`sid`) AS `numstd`,`department`.`dname` AS `dname` from ((((`student` join `department`) join `course`) join `complain`) join `subjectcomplain`) where ((`department`.`did` = `student`.`did`) and (`department`.`did` = `course`.`did`) and (`complain`.`courseid` = `course`.`courseid`) and (`subjectcomplain`.`cid` = `complain`.`cid`)) group by `department`.`dname`;

-- ----------------------------
-- View structure for numclaimperdept
-- ----------------------------
DROP VIEW IF EXISTS `numclaimperdept`;
CREATE VIEW `numclaimperdept` AS select count(`subjectcomplain`.`scid`) AS `claims`,`department`.`did` AS `did`,`department`.`dname` AS `dname` from (((`department` join `course`) join `complain`) join `subjectcomplain`) where ((`subjectcomplain`.`cid` = `complain`.`cid`) and (`course`.`courseid` = `complain`.`courseid`) and (`course`.`did` = `department`.`did`)) group by `department`.`did` desc;

-- ----------------------------
-- View structure for claimpercent
-- ----------------------------
DROP VIEW IF EXISTS `claimpercent`;
CREATE VIEW `claimpercent` AS select `totalclaims`.`numclaim` AS `numclaim`,`numclaimperdept`.`claims` AS `claims`,`numclaimperdept`.`dname` AS `dname`,((`numclaimperdept`.`claims` * 100) / `totalclaims`.`numclaim`) AS `percent`,year(`subjectcomplain`.`submissiontime`) AS `year` from (((((`totalclaims` join `numclaimperdept`) join `department`) join `course`) join `complain`) join `subjectcomplain`) where ((`department`.`did` = `course`.`did`) and (`course`.`courseid` = `complain`.`courseid`) and (`complain`.`cid` = `subjectcomplain`.`cid`)) group by `numclaimperdept`.`claims`;


-- ----------------------------
-- View structure for usercheck
-- ----------------------------
DROP VIEW IF EXISTS `usercheck`;
CREATE  VIEW `usercheck` AS select `user`.`uid` AS `uid`,`user`.`uname` AS `uname`,`user`.`fullname` AS `fullname`,`user`.`password` AS `password`,`user`.`email` AS `email`,`user`.`ucatagori` AS `ucatagori`,`user`.`attempts` AS `attempts`,`user`.`timestamps` AS `timestamps` from `user`;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'Tag Jin', '1234', 'admin@ecmanager.com', 'administrator', '0', '0');
INSERT INTO `user` VALUES ('2', 'stdsyn', 'Syn Bade', '1234', 's.m.abdulwassae@gmail.com', 'student', '0', '0');
INSERT INTO `user` VALUES ('3', 'coormaan', 'Keher Maan', '1234', 'oopslinker@gmail.com', 'coordinator', '0', '0');
INSERT INTO `user` VALUES ('4', 'mnglaila', 'Alif Laila', '1234', 'a@a.c', 'manager', '0', '0');
INSERT INTO `user` VALUES ('5', 'stdsofan', 'Sofan Isbah', '1234', 'b@b.b', 'student', '0', '0');
INSERT INTO `user` VALUES ('6', 'corkala', 'Ja kala', '1234', 'c@c.c', 'coordinator', '0', '0');

INSERT INTO `facultycoord` VALUES ('1', '3');
INSERT INTO `facultycoord` VALUES ('2', '6');

INSERT INTO `department` VALUES ('1', 'Computer Science', '1');
INSERT INTO `department` VALUES ('2', 'Math', '2');

INSERT INTO `student` VALUES ('1', '2', '1');
INSERT INTO `student` VALUES ('2', '5', '2');



-- ----------------------------
-- Trigger structure for countevidence
-- ----------------------------
DELIMITER ;;
CREATE TRIGGER `countevidence` AFTER INSERT ON `evidence` FOR EACH ROW update subjectcomplain, (SELECT COUNT(eid) as numevidence, evidence.scid as escid FROM subjectcomplain,evidence WHERE subjectcomplain.scid=evidence.scid GROUP BY escid) as countevidednce
	set subjectcomplain.numevidence= countevidednce.numevidence
	where subjectcomplain.scid=escid;;
DELIMITER ;

-- ----------------------------
-- Trigger structure for accptsolve
-- ----------------------------
DELIMITER ;;
CREATE TRIGGER `accptsolve` AFTER INSERT ON `solution` FOR EACH ROW UPDATE subjectcomplain  set STATUS='solved' WHERE scid=new.scid;;
DELIMITER ;

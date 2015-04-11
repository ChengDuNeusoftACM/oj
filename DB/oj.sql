-- MySQL dump 10.13  Distrib 5.1.73, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: oj
-- ------------------------------------------------------
-- Server version	5.1.73

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin_grooup_level`
--

DROP TABLE IF EXISTS `admin_grooup_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_grooup_level` (
  `gid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `glid` int(11) NOT NULL AUTO_INCREMENT,
  `levelmark` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`glid`),
  KEY `FK_admin_grooup_level` (`gid`),
  KEY `FK_admin_grooup_level2` (`lid`),
  CONSTRAINT `FK_admin_grooup_level` FOREIGN KEY (`gid`) REFERENCES `admin_group` (`gid`),
  CONSTRAINT `FK_admin_grooup_level2` FOREIGN KEY (`lid`) REFERENCES `level` (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_grooup_level`
--

LOCK TABLES `admin_grooup_level` WRITE;
/*!40000 ALTER TABLE `admin_grooup_level` DISABLE KEYS */;
INSERT INTO `admin_grooup_level` VALUES (1,1,2,'1,2,3'),(1,2,3,'4,5,6'),(1,3,4,'7,8,9'),(1,4,5,'10,11,12'),(1,5,6,'13,14,15'),(1,6,7,'16,17,18'),(1,7,8,'19,20,21'),(1,8,9,'22,23,24'),(1,9,10,'25,26,27'),(2,9,11,'25,26,27');
/*!40000 ALTER TABLE `admin_grooup_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_group`
--

DROP TABLE IF EXISTS `admin_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_group` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(9) DEFAULT NULL,
  `desci` text,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_group`
--

LOCK TABLES `admin_group` WRITE;
/*!40000 ALTER TABLE `admin_group` DISABLE KEYS */;
INSERT INTO `admin_group` VALUES (1,'admin',NULL),(2,'超级管理员','超级管理员');
/*!40000 ALTER TABLE `admin_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_user`
--

DROP TABLE IF EXISTS `admin_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `psd` varchar(45) DEFAULT NULL,
  `name` varchar(9) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  KEY `FK_admin_user_group` (`gid`),
  CONSTRAINT `FK_admin_user_group` FOREIGN KEY (`gid`) REFERENCES `admin_group` (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_user`
--

LOCK TABLES `admin_user` WRITE;
/*!40000 ALTER TABLE `admin_user` DISABLE KEYS */;
INSERT INTO `admin_user` VALUES (1,1,'@@','21232f297a57a5a743894a0e4a801fc3','admin','admin',NULL);
/*!40000 ALTER TABLE `admin_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alevel`
--

DROP TABLE IF EXISTS `alevel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alevel` (
  `alid` int(11) NOT NULL AUTO_INCREMENT,
  `lid` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `desci` text,
  PRIMARY KEY (`alid`),
  KEY `FK_level_alevel` (`lid`),
  CONSTRAINT `FK_level_alevel` FOREIGN KEY (`lid`) REFERENCES `level` (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alevel`
--

LOCK TABLES `alevel` WRITE;
/*!40000 ALTER TABLE `alevel` DISABLE KEYS */;
INSERT INTO `alevel` VALUES (1,1,'添加权限',''),(2,1,'删除权限',''),(3,1,'修改权限',''),(4,2,'添加管理员组',''),(5,2,'删除管理员组',''),(6,2,'修改管理员组',''),(7,3,'添加管理员',''),(8,3,'删除管理员',''),(9,3,'修改管理员',''),(10,4,'添加题目',''),(11,4,'删除题目',''),(12,4,'修改题目',''),(13,5,'添加用户',''),(14,5,'删除用户',''),(15,5,'修改用户',''),(16,6,'添加队伍',''),(17,6,'删除队伍',''),(18,6,'修改队伍',''),(19,7,'添加比赛',''),(20,7,'删除比赛',''),(21,7,'修改比赛',''),(22,8,'添加新闻',''),(23,8,'删除新闻',''),(24,8,'修改新闻',''),(25,9,'添加提交记录',NULL),(26,9,'删除提交记录',NULL),(27,9,'修改提交记录',NULL);
/*!40000 ALTER TABLE `alevel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `code`
--

DROP TABLE IF EXISTS `code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `code` (
  `soid` int(11) NOT NULL,
  `source` text,
  PRIMARY KEY (`soid`),
  CONSTRAINT `FK_code_solution` FOREIGN KEY (`soid`) REFERENCES `solution` (`soid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `code`
--

LOCK TABLES `code` WRITE;
/*!40000 ALTER TABLE `code` DISABLE KEYS */;
/*!40000 ALTER TABLE `code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `complieinfo`
--

DROP TABLE IF EXISTS `complieinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `complieinfo` (
  `soid` int(11) NOT NULL,
  `error` text,
  PRIMARY KEY (`soid`),
  CONSTRAINT `FK_complie_solution` FOREIGN KEY (`soid`) REFERENCES `solution` (`soid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `complieinfo`
--

LOCK TABLES `complieinfo` WRITE;
/*!40000 ALTER TABLE `complieinfo` DISABLE KEYS */;
/*!40000 ALTER TABLE `complieinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contest`
--

DROP TABLE IF EXISTS `contest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contest` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(100) DEFAULT NULL,
  `desci` text,
  `private` tinyint(1) DEFAULT '0',
  `langmask` int(11) DEFAULT NULL,
  `type` tinyint(1) DEFAULT '0',
  `level` smallint(6) DEFAULT '0',
  PRIMARY KEY (`cid`),
  KEY `FK_admin_contest` (`uid`),
  CONSTRAINT `FK_admin_contest` FOREIGN KEY (`uid`) REFERENCES `admin_user` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contest`
--

LOCK TABLES `contest` WRITE;
/*!40000 ALTER TABLE `contest` DISABLE KEYS */;
INSERT INTO `contest` VALUES (1,1,'A register contest Test','2014-10-20 12:00:00','2014-10-20 17:00:00',0,'2014-12-27 05:55:38','d41d8cd98f00b204e9800998ecf8427e','For Test',1,111,0,0),(2,1,'Luoxin','2014-10-20 12:00:00','2014-10-20 17:00:00',0,'2014-12-27 05:55:38','c9130efba1317c16406d67270f657af3','For Test',1,111,1,0),(3,1,'A register contest','2014-10-20 12:00:00','2014-10-20 17:00:00',0,'2014-12-27 05:55:38','10ed1697617fe7758b4236d5b791286c','For Test',1,111,0,0),(5,1,'fewfwe','2015-01-21 14:30:01','2015-01-28 18:45:01',0,'2015-01-23 14:08:15','','',1,0,0,0),(6,1,'dwd','2015-01-31 09:45:15','2015-02-05 18:45:15',0,'2015-01-23 14:09:38','','',0,111,0,0),(7,1,'ss','2015-01-24 22:00:53','2015-01-29 14:50:53',0,'2015-01-23 14:59:26','','',0,111,0,0);
/*!40000 ALTER TABLE `contest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contest_forum`
--

DROP TABLE IF EXISTS `contest_forum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contest_forum` (
  `cfid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `title` text,
  `context` text,
  `author` varchar(45) DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_time` datetime DEFAULT NULL,
  PRIMARY KEY (`cfid`),
  KEY `FK_contest_forum` (`cid`),
  CONSTRAINT `FK_contest_forum` FOREIGN KEY (`cid`) REFERENCES `contest` (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contest_forum`
--

LOCK TABLES `contest_forum` WRITE;
/*!40000 ALTER TABLE `contest_forum` DISABLE KEYS */;
/*!40000 ALTER TABLE `contest_forum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contest_problem`
--

DROP TABLE IF EXISTS `contest_problem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contest_problem` (
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `newname` varchar(100) DEFAULT NULL,
  `newid` varchar(100) DEFAULT NULL,
  `submit` int(11) DEFAULT NULL,
  `accpet` int(11) DEFAULT NULL,
  `sloved` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_problem_contest` (`pid`),
  KEY `FK_problem_contest2` (`cid`),
  CONSTRAINT `FK_problem_contest` FOREIGN KEY (`pid`) REFERENCES `problem` (`pid`),
  CONSTRAINT `FK_problem_contest2` FOREIGN KEY (`cid`) REFERENCES `contest` (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contest_problem`
--

LOCK TABLES `contest_problem` WRITE;
/*!40000 ALTER TABLE `contest_problem` DISABLE KEYS */;
INSERT INTO `contest_problem` VALUES (1,1,31,'A + B Problem','A',NULL,NULL,NULL),(2,1,32,'A+B','B',NULL,NULL,NULL),(1,7,33,'A + B Problem','A',NULL,NULL,NULL),(2,7,34,'A+B','B',NULL,NULL,NULL),(1,2,35,'A + B Problem','A',NULL,NULL,NULL),(2,2,36,'A+B','B',NULL,NULL,NULL);
/*!40000 ALTER TABLE `contest_problem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contest_replay`
--

DROP TABLE IF EXISTS `contest_replay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contest_replay` (
  `crid` int(11) NOT NULL AUTO_INCREMENT,
  `cfid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `context` text,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_time` datetime DEFAULT NULL,
  PRIMARY KEY (`crid`),
  KEY `FK_forum_replay` (`cfid`),
  KEY `FK_user_replay` (`uid`),
  CONSTRAINT `FK_forum_replay` FOREIGN KEY (`cfid`) REFERENCES `contest_forum` (`cfid`),
  CONSTRAINT `FK_user_replay` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contest_replay`
--

LOCK TABLES `contest_replay` WRITE;
/*!40000 ALTER TABLE `contest_replay` DISABLE KEYS */;
/*!40000 ALTER TABLE `contest_replay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contest_team`
--

DROP TABLE IF EXISTS `contest_team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contest_team` (
  `cid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ischeck` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_contest_team` (`cid`),
  KEY `FK_contest_team2` (`tid`),
  CONSTRAINT `FK_contest_team` FOREIGN KEY (`cid`) REFERENCES `contest` (`cid`),
  CONSTRAINT `FK_contest_team2` FOREIGN KEY (`tid`) REFERENCES `team` (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contest_team`
--

LOCK TABLES `contest_team` WRITE;
/*!40000 ALTER TABLE `contest_team` DISABLE KEYS */;
/*!40000 ALTER TABLE `contest_team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contest_user`
--

DROP TABLE IF EXISTS `contest_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contest_user` (
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ischeck` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_contest_user` (`cid`),
  KEY `FK_contest_user2` (`uid`),
  CONSTRAINT `FK_contest_user` FOREIGN KEY (`cid`) REFERENCES `contest` (`cid`),
  CONSTRAINT `FK_contest_user2` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contest_user`
--

LOCK TABLES `contest_user` WRITE;
/*!40000 ALTER TABLE `contest_user` DISABLE KEYS */;
INSERT INTO `contest_user` VALUES (1,2,22,1),(2,2,24,1);
/*!40000 ALTER TABLE `contest_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `level`
--

DROP TABLE IF EXISTS `level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `level` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(9) DEFAULT NULL,
  `desci` text,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `level`
--

LOCK TABLES `level` WRITE;
/*!40000 ALTER TABLE `level` DISABLE KEYS */;
INSERT INTO `level` VALUES (1,'权限管理','level'),(2,'管理员组','admin_group'),(3,'管理员','admin_user'),(4,'题目','problem'),(5,'用户','user'),(6,'队伍','team'),(7,'比赛','contest'),(8,'新闻','news'),(9,'提交记录','sol');
/*!40000 ALTER TABLE `level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logininfo`
--

DROP TABLE IF EXISTS `logininfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logininfo` (
  `uid` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IPv4` char(21) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  CONSTRAINT `FK_amdin_logininfo` FOREIGN KEY (`uid`) REFERENCES `admin_user` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logininfo`
--

LOCK TABLES `logininfo` WRITE;
/*!40000 ALTER TABLE `logininfo` DISABLE KEYS */;
/*!40000 ALTER TABLE `logininfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `cnid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `title` text,
  `context` text,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_time` datetime DEFAULT NULL,
  PRIMARY KEY (`cnid`),
  KEY `FK_admin_news` (`uid`),
  KEY `FK_contest_news` (`cid`),
  CONSTRAINT `FK_admin_news` FOREIGN KEY (`uid`) REFERENCES `admin_user` (`uid`),
  CONSTRAINT `FK_contest_news` FOREIGN KEY (`cid`) REFERENCES `contest` (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,1,1,'test','eeee','2015-01-23 10:47:51',NULL);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problem`
--

DROP TABLE IF EXISTS `problem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `problem` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `pname` text,
  `desci` text,
  `input` text,
  `output` text,
  `indata` text,
  `outdata` text,
  `hint` text,
  `source` text,
  `author` text,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contest_num` int(11) DEFAULT '0',
  `level` int(11) DEFAULT NULL,
  `memory` int(11) DEFAULT '0',
  `time` int(11) DEFAULT '0',
  `special` tinyint(1) DEFAULT '0',
  `accepted` int(11) DEFAULT '0',
  `submit` int(11) DEFAULT '0',
  `solved` int(11) DEFAULT '0',
  `visibily` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`pid`),
  KEY `FK_problem_admin` (`uid`),
  CONSTRAINT `FK_problem_admin` FOREIGN KEY (`uid`) REFERENCES `admin_user` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problem`
--

LOCK TABLES `problem` WRITE;
/*!40000 ALTER TABLE `problem` DISABLE KEYS */;
INSERT INTO `problem` VALUES (1,1,'A + B Problem','Calculate a+b','Two integer a,b','Output a+b','1 2','3','Sample problem','local','admin','2014-12-27 05:55:38',0,0,64,500,0,0,5,1,1),(2,1,'A+B','A+B','A+B','A+B','1 1\r\n2 2','2\r\n3','','','','2014-12-27 05:56:18',0,NULL,256,1,0,0,0,0,1);
/*!40000 ALTER TABLE `problem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `runtimeinfo`
--

DROP TABLE IF EXISTS `runtimeinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `runtimeinfo` (
  `soid` int(11) NOT NULL,
  `error` text,
  PRIMARY KEY (`soid`),
  CONSTRAINT `FK_runtime_solution` FOREIGN KEY (`soid`) REFERENCES `solution` (`soid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `runtimeinfo`
--

LOCK TABLES `runtimeinfo` WRITE;
/*!40000 ALTER TABLE `runtimeinfo` DISABLE KEYS */;
/*!40000 ALTER TABLE `runtimeinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solution`
--

DROP TABLE IF EXISTS `solution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solution` (
  `soid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `cid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `code` text,
  `result` int(11) DEFAULT '0',
  `language` int(11) DEFAULT '0',
  `memory` int(11) DEFAULT '0',
  `time` int(11) DEFAULT '0',
  `length` int(11) DEFAULT '0',
  `process` int(11) DEFAULT '0',
  PRIMARY KEY (`soid`),
  KEY `FK_problem_solution` (`pid`),
  KEY `FK_solution_contest` (`cid`),
  KEY `FK_user_solution` (`uid`),
  CONSTRAINT `FK_problem_solution` FOREIGN KEY (`pid`) REFERENCES `problem` (`pid`),
  CONSTRAINT `FK_solution_contest` FOREIGN KEY (`cid`) REFERENCES `contest` (`cid`),
  CONSTRAINT `FK_user_solution` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solution`
--

LOCK TABLES `solution` WRITE;
/*!40000 ALTER TABLE `solution` DISABLE KEYS */;
INSERT INTO `solution` VALUES (19,1,NULL,2,'2014-12-27 08:12:34','sdsdsd',11,1,0,0,0,0),(20,1,NULL,2,'2014-12-27 08:13:55','#include<cstdio>\nint main(){\n	int a,b;\n  	scanf(\"%d%d\",&a,&b);\n  	printf(\"%d\\n\",a+b);\n}',11,1,0,0,0,0),(23,1,NULL,2,'2014-12-27 08:15:11','#include<cstdio>\nint main()\n{\n  int a,b;\n  scanf(\"%d%d\",&a,&b);\n  printf(\"%d\\n\",a+b);\n}',11,1,0,0,0,0),(24,1,NULL,2,'2014-12-27 08:27:06','sdsd',11,1,0,0,0,0),(25,1,NULL,2,'2014-12-27 09:03:21','',11,1,0,0,0,0),(26,1,1,3,'2014-12-28 06:27:50','#include&lt;cstdio&gt;\nint main()\n{\n  int a,b;\n  scanf(&quot;%d %d&quot;,&amp;a,&amp;b);\n  printf(&quot;%d\\n&quot;,a+b);\n}',11,0,0,0,0,0),(27,1,1,3,'2014-12-28 06:30:50','#include&lt;cstdio&gt;\nint main()\n{\n  int a,b;\n  while(~scanf(&quot;%d %d&quot;,&amp;a,&amp;b))\n  printf(&quot;%d\\n&quot;,a+b);\n}',11,0,0,0,0,0),(28,1,1,3,'2014-12-28 06:42:29','#include&lt;cstido&gt;\nint main(){\n    int a,b;\n    scanf(&quot;%d %d&quot;,&amp;a,&amp;b);\n    printf(&quot;%d\\n&quot;,a+b);\n}\n',11,0,0,0,0,0),(29,1,1,3,'2014-12-28 07:00:18','#include<cstido>\nint main(){\n    int a,b;\n    scanf(&quot;%d %d&quot;,&amp;a,&amp;b);\n    printf(&quot;%d\\n&quot;,a+b);\n}\n',11,0,0,0,0,0),(30,1,1,3,'2014-12-28 07:02:39','#include<cstido>\nint main(){\n    int a,b;\n    scanf(\"%d %d\",&amp;a,&amp;b);\n    printf(\"%d\\n\",a+b);\n    return 0;\n}\n',11,0,0,0,0,0),(31,1,1,3,'2014-12-28 07:04:58','#include<cstido>\nint main(){\n    int a,b;\n    scanf(\"%d %d\",&a,&b);\n    printf(\"%d\\n\",a+b);\n    return 0;\n}\n',11,0,0,0,0,0),(32,1,1,3,'2014-12-28 07:05:31','#include<cstdio>\nint main(){\n    int a,b;\n    scanf(\"%d %d\",&a,&b);\n    printf(\"%d\\n\",a+b);\n    return 0;\n}\n',11,0,0,0,0,0),(33,1,1,3,'2014-12-28 07:06:04','#include<stdio.h>\nint main(){\n    int a,b;\n    scanf(\"%d %d\",&a,&b);\n    printf(\"%d\\n\",a+b);\n    return 0;\n}\n',11,0,0,0,0,0),(34,1,1,3,'2014-12-28 07:09:56','#include<stdio.h>\nint main(){\n    int a,b;\n    scanf(\"%d %d\",&a,&b);\n    printf(\"%d\\n\",a+b);\n    return 0;\n}\n',4,0,1056,2,0,3),(35,1,1,3,'2014-12-28 07:10:48','#include<stdio.h>\nint main(){\n    int a,b;\n    scanf(\"%d %d\",&a,&b);\n    printf(\"%d\\n\",a-b);\n    return 0;\n}\n',6,0,1056,0,0,1),(36,1,1,4,'2014-12-30 14:20:00','cfdasasdsa',11,0,0,0,0,0),(37,1,NULL,12,'2015-01-25 16:58:42','fewfwefwefew',0,1,0,0,0,0),(38,1,NULL,12,'2015-01-25 17:18:56','dqdqwdqw',0,1,0,0,100,0);
/*!40000 ALTER TABLE `solution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `head_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES (4,'ss','2015-01-14 13:51:58',5),(5,'AC','2015-01-21 17:41:13',1);
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_invite`
--

DROP TABLE IF EXISTS `team_invite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_invite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_invite`
--

LOCK TABLES `team_invite` WRITE;
/*!40000 ALTER TABLE `team_invite` DISABLE KEYS */;
/*!40000 ALTER TABLE `team_invite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `grade` smallint(6) DEFAULT NULL,
  `class` smallint(6) DEFAULT NULL,
  `major` varchar(15) DEFAULT NULL,
  `name` varchar(9) DEFAULT NULL,
  `sex` tinyint(1) DEFAULT '0',
  `submit` int(11) DEFAULT '0',
  `solved` int(11) DEFAULT '0',
  `ip` varchar(20) DEFAULT NULL,
  `language` int(11) DEFAULT '0',
  `note` text,
  PRIMARY KEY (`uid`),
  KEY `FK_user_team` (`tid`),
  CONSTRAINT `FK_user_team` FOREIGN KEY (`tid`) REFERENCES `team` (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,5,'test','test@tt.com','098f6bcd4621d373cade4e832627b4f6','2014-12-27 05:55:37',0,0,'','',0,4,3,NULL,0,NULL),(2,5,'scs','123@qq.com','4297f44b13955235245b2497399d7a93','2014-12-27 08:04:17',NULL,NULL,NULL,NULL,0,5,2,NULL,0,NULL),(3,NULL,'yangjie','540509089@qq.com','2fcd23f49f3675994dc8eac407f884eb','2014-12-28 05:19:53',NULL,NULL,NULL,NULL,0,6,4,NULL,0,NULL),(4,NULL,'jbface','jbface@qq.com','25f9e794323b453885f5181f1b624d0b','2014-12-30 14:15:34',NULL,NULL,NULL,NULL,0,2,1,NULL,0,NULL),(5,4,'xxx','123@qq.com','4297f44b13955235245b2497399d7a93','2015-01-14 11:29:05',NULL,NULL,NULL,NULL,0,0,0,NULL,0,NULL),(6,NULL,'qwe','123@qq.com','4297f44b13955235245b2497399d7a93','2015-01-14 11:32:27',NULL,NULL,NULL,NULL,0,0,0,NULL,0,NULL),(7,NULL,'123123','123@qq.com','4297f44b13955235245b2497399d7a93','2015-01-14 12:03:09',NULL,NULL,NULL,'123123',0,0,0,NULL,0,NULL),(8,NULL,'123123','123@qq.com','4297f44b13955235245b2497399d7a93','2015-01-14 12:03:10',NULL,NULL,NULL,'123123',0,0,0,NULL,0,NULL),(9,NULL,'xczcz','123@qq.com','4297f44b13955235245b2497399d7a93','2015-01-14 12:03:15',NULL,NULL,NULL,'xczcz',0,0,0,NULL,0,NULL),(10,NULL,'xczczcc','123@qq.com','4297f44b13955235245b2497399d7a93','2015-01-14 12:03:18',NULL,NULL,NULL,'xczczcc',0,0,0,NULL,0,NULL),(11,NULL,'123','123@qq.com','4297f44b13955235245b2497399d7a93','2015-01-14 12:03:26',NULL,NULL,NULL,'123',0,0,0,NULL,0,NULL),(12,NULL,'z309241990','z309241990@qq.com','7496873a4c7c140697574802bd17c699','2015-01-25 16:58:11',NULL,NULL,NULL,'z30924199',0,0,0,NULL,0,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-30  4:53:04

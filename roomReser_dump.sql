-- MySQL dump 10.13  Distrib 5.5.27, for Linux (i686)
--
-- Host: localhost    Database: roomReser
-- ------------------------------------------------------
-- Server version	5.5.27

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
-- Table structure for table `Booking`
--

DROP TABLE IF EXISTS `Booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Booking` (
  `user` int(11) NOT NULL,
  `confirmedBy` int(11) NOT NULL,
  `madeAt` time NOT NULL,
  `madeOn` date NOT NULL,
  `roomId` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `description` varchar(300) DEFAULT NULL,
  `Start_Date` date NOT NULL DEFAULT '0000-00-00',
  `End_Date` date NOT NULL DEFAULT '0000-00-00',
  `Start_Time` time NOT NULL DEFAULT '00:00:00',
  `End_Time` time NOT NULL DEFAULT '00:00:00',
  `Repeat_Type` char(9) NOT NULL DEFAULT 'None',
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`booking_id`),
  UNIQUE KEY `booking_id` (`booking_id`),
  KEY `user` (`user`),
  KEY `confirmedBy` (`confirmedBy`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Booking`
--

LOCK TABLES `Booking` WRITE;
/*!40000 ALTER TABLE `Booking` DISABLE KEYS */;
INSERT INTO `Booking` VALUES (2,2,'23:57:43','2011-11-17',1,1,'to delete others bookign','2011-11-18','2011-11-20','00:00:00','07:00:00','DAILY',8),(1,1,'17:34:41','2011-11-19',1,1,'dumb c','2011-11-19','2011-11-19','23:00:00','24:00:00','DAILY',11),(1,2,'00:03:56','2011-11-18',6,1,'adslfaf','2011-11-18','2011-11-18','08:00:00','09:30:00','DAILY',9),(9,5,'16:19:50','2011-11-22',1,0,'Exam.','2011-11-23','2011-11-30','16:00:00','19:00:00','DAILY',34),(1,1,'17:35:26','2011-11-19',1,1,'dumb c','2011-11-19','2011-11-19','23:00:00','24:00:00','DAILY',12),(1,1,'14:37:42','2011-11-20',5,1,'adf','2011-11-20','2011-11-20','21:00:00','23:30:00','DAILY',13),(1,1,'14:41:40','2011-11-20',11,1,'fff','2011-11-20','2011-11-20','21:30:00','23:00:00','DAILY',14),(1,2,'19:50:35','2011-11-20',1,0,'first ','2011-11-21','2011-11-21','05:00:00','05:30:00','DAILY',17),(2,2,'20:31:04','2011-11-20',1,1,'second','2011-11-21','2011-11-21','07:30:00','08:00:00','DAILY',18),(2,2,'20:31:41','2011-11-20',1,0,'morini','2011-11-21','2011-11-21','00:00:00','01:30:00','DAILY',19),(2,2,'20:32:29','2011-11-20',1,1,'colide','2011-11-21','2011-11-21','05:30:00','06:00:00','DAILY',20),(2,2,'20:32:54','2011-11-20',1,1,'asf','2011-11-21','2011-11-21','21:30:00','24:00:00','DAILY',21),(1,2,'02:45:31','2011-11-21',5,0,'sfasf','2011-11-21','2011-11-21','06:30:00','09:00:00','DAILY',22),(1,2,'02:48:08','2011-11-21',1,0,'asf;lakf','2011-11-21','2011-11-21','15:30:00','17:30:00','DAILY',23),(1,2,'07:13:15','2011-11-21',1,0,'asdf','2011-11-21','2011-11-21','08:00:00','15:30:00','DAILY',24),(1,2,'02:43:03','2011-11-22',6,0,'asdf','2011-11-22','2011-11-22','14:30:00','23:59:59','DAILY',25),(1,2,'02:44:42','2011-11-22',8,0,'ff','2011-11-26','2011-11-28','06:30:00','09:00:00','DAILY',26),(1,2,'02:50:06','2011-11-22',1,0,'fff','2011-11-22','2011-11-22','07:00:00','08:30:00','DAILY',27),(1,5,'14:30:22','2011-11-22',1,0,'Elocution Competition.','2011-11-22','2011-11-22','19:00:00','22:30:00','DAILY',28),(1,5,'15:59:19','2011-11-24',1,0,'DISCO PARTY','2011-11-25','2011-11-25','16:00:00','17:30:00','DAILY',38),(1,2,'00:00:00','0000-00-00',5,0,'asdfj','2011-11-18','2011-11-18','09:00:00','09:30:00','DAILY',30),(1,2,'00:00:00','0000-00-00',5,0,'asdfj','2011-11-20','2011-11-20','09:00:00','09:30:00','DAILY',31),(1,5,'16:41:32','2011-11-22',5,0,'Tute','2011-11-22','2011-11-22','17:30:00','22:00:00','WEEKLY',35),(1,5,'16:42:37','2011-11-22',1,0,'Algorithm Tute','2011-11-23','2011-11-24','15:00:00','18:00:00','DAILY',36),(1,5,'16:42:37','2011-11-22',1,0,'Algorithm Tute','2011-11-27','2011-11-30','15:00:00','18:00:00','DAILY',37),(1,7,'06:55:26','2012-04-25',1,0,'kjhkl','2012-04-26','2012-04-28','08:00:00','08:30:00','DAILY',39),(1,8,'08:28:59','2012-04-26',5,0,'sport','2012-04-28','2012-04-30','09:00:00','16:00:00','DAILY',40),(1,5,'00:02:51','2012-08-28',5,0,'xyz','2012-08-28','2012-08-28','09:00:00','11:00:00','DAILY',41);
/*!40000 ALTER TABLE `Booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Building`
--

DROP TABLE IF EXISTS `Building`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Building` (
  `buildId` int(11) NOT NULL AUTO_INCREMENT,
  `buildingName` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`buildId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Building`
--

LOCK TABLES `Building` WRITE;
/*!40000 ALTER TABLE `Building` DISABLE KEYS */;
INSERT INTO `Building` VALUES (1,'Nilgiri'),(2,'Vindhya'),(3,'Himalayas');
/*!40000 ALTER TABLE `Building` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Category`
--

DROP TABLE IF EXISTS `Category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Category` (
  `catId` int(11) NOT NULL AUTO_INCREMENT,
  `catName` varchar(30) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`catId`),
  UNIQUE KEY `catName` (`catName`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Category`
--

LOCK TABLES `Category` WRITE;
/*!40000 ALTER TABLE `Category` DISABLE KEYS */;
INSERT INTO `Category` VALUES (1,'Projector_Room',NULL),(2,'AC',NULL),(3,'Teach_lab',NULL),(6,'Public Addressing System','Speakers');
/*!40000 ALTER TABLE `Category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Requests`
--

DROP TABLE IF EXISTS `Requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Requests` (
  `reqNo` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(100) DEFAULT NULL,
  `creator` varchar(25) DEFAULT NULL,
  `creatorEmail` varchar(50) DEFAULT NULL,
  `creatorPhone` varchar(15) DEFAULT NULL,
  `concernedPName` varchar(15) DEFAULT NULL,
  `concernedPEmail` varchar(50) DEFAULT NULL,
  `concernedPPhone` varchar(15) DEFAULT NULL,
  `appStatus` varchar(25) DEFAULT 'Pending',
  `reqGId` int(10) DEFAULT NULL,
  `reqDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `eventStartDate` date DEFAULT NULL,
  `eventEndDate` date DEFAULT NULL,
  `eventStartTime` time DEFAULT NULL,
  `eventEndTime` time DEFAULT NULL,
  `eventTitle` varchar(40) DEFAULT NULL,
  `eventDesc` varchar(1000) DEFAULT NULL,
  `concernedAdmin` int(2) DEFAULT NULL,
  `room` varchar(10) DEFAULT NULL,
  `reqType` varchar(10) DEFAULT 'One Time',
  PRIMARY KEY (`reqNo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Requests`
--

LOCK TABLES `Requests` WRITE;
/*!40000 ALTER TABLE `Requests` DISABLE KEYS */;
INSERT INTO `Requests` VALUES (1,'6598c37665dc0b70b0fe44a6a315011a8b3a636f','Nehal','nehal.wani@students','9052480529','Ayush Chug','ayush.chug@students.iiit.','9052400628','Pending',0,'2012-10-14 13:23:32','2012-11-01','2012-10-10','08:30:00','00:20:10','CProTute','Fachcho Ko C Nahi Ati',1,'SH2','One Time'),(2,'6598c17665dc0b70b0fe44a6a315011a8b3a636f','Amish','amish.wani@students','9052480529','Ankush Jain','ankush.jain@students.iiit','9052401628','Pending',0,'0000-00-00 00:00:00','2012-01-01','2011-10-10','09:30:00','00:00:00','CProTute','Fachcho Ko C Nahi Ati',1,'SH2','Weekly'),(3,'3f9487b2c99ae49c8a665b093b83d25e87916eb9','Amish','amish.wani@students.iiit.','9988619407','Nehal','nehal.wani@students.iiit.','9052480529','',0,'2012-10-14 14:30:23','2012-01-02','2012-10-10','06:00:00','00:20:06','CPro','Game!',0,'SH2','Daily'),(4,'f45bd55bbe34ceadb71ce14a9afc853f52bef30f','Amish','amish.wani@students.iiit.ac.in','9988619407','Nehal','nehal.wani@students.iiit.','9052480529','',0,'2012-10-14 14:32:57','2012-01-02','2012-10-10','06:00:00','00:20:06','CPro','Game!',0,'SH2','Daily'),(5,'d29cb78e88cd34425bc8563bcb90c66e13002263','Mayank','mayank.g@students.iiit.ac.in','9911223399','Kapil','kapil.kumar@students.iiit.ac.in','9052400628','',0,'2012-10-14 19:32:20','2012-11-02','2012-10-12','09:00:00','09:00:00','ITWS','To Teach!',0,'SH1','Daily');
/*!40000 ALTER TABLE `Requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Room`
--

DROP TABLE IF EXISTS `Room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Room` (
  `roomId` int(11) NOT NULL AUTO_INCREMENT,
  `roomName` varchar(8) NOT NULL,
  `buildingName` int(11) NOT NULL,
  `blockName` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `capacity` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`roomId`),
  UNIQUE KEY `roomName` (`roomName`),
  KEY `building` (`buildingName`),
  KEY `block` (`blockName`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Room`
--

LOCK TABLES `Room` WRITE;
/*!40000 ALTER TABLE `Room` DISABLE KEYS */;
INSERT INTO `Room` VALUES (1,'N301',1,0,'EMPTY',100),(2,'302_NIL',1,0,NULL,100),(3,'TL1',1,0,NULL,0),(4,'TL2',1,0,NULL,0),(5,'SH1',2,0,NULL,250),(6,'SH2',2,0,NULL,250),(10,'305_NIL',1,0,NULL,100),(8,'CR1',2,0,NULL,0),(9,'CR2',2,0,NULL,0),(11,'TS',3,0,NULL,0);
/*!40000 ALTER TABLE `Room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Room_Cat`
--

DROP TABLE IF EXISTS `Room_Cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Room_Cat` (
  `roomId` int(11) NOT NULL,
  `catId` int(11) NOT NULL,
  PRIMARY KEY (`roomId`,`catId`),
  KEY `catId` (`catId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Room_Cat`
--

LOCK TABLES `Room_Cat` WRITE;
/*!40000 ALTER TABLE `Room_Cat` DISABLE KEYS */;
INSERT INTO `Room_Cat` VALUES (1,1),(2,1),(3,3),(4,3),(5,1),(5,2),(6,1),(6,2),(8,1),(9,1);
/*!40000 ALTER TABLE `Room_Cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Updates`
--

DROP TABLE IF EXISTS `Updates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Updates` (
  `description` varchar(500) NOT NULL,
  `up_time` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Updates`
--

LOCK TABLES `Updates` WRITE;
/*!40000 ALTER TABLE `Updates` DISABLE KEYS */;
INSERT INTO `Updates` VALUES ('user requested for 301_NIL for dates 2011-11-19 to 2011-11-19 from 23:00:00 to 24:00:00. Description of activity : dumb c','838:59:59'),('user requested for Room TS for dates 2011-11-20 to 2011-11-20 from Hrs.21:30:00 to 23:00:00.<br/> Description of activity : fff','838:59:59'),('parag requested for Room 301_NIL for dates 2011-11-21 to 2011-11-21 from Hrs.05:00:00 to 05:30:00.<br/> Description of activity : dance','00:00:00'),('abhay requested for Room 301_NIL for dates 2011-11-21 to 2011-11-21 from Hrs.05:00:00 to 05:30:00.<br/> Description of activity : colli','00:00:00'),('parag requested for Room 301_NIL for dates 2011-11-21 to 2011-11-21 from Hrs.05:00:00 to 05:30:00.<br/> Description of activity : first ','00:00:00'),('abhay requested for Room 301_NIL for dates 2011-11-21 to 2011-11-21 from Hrs.07:30:00 to 08:00:00.<br/> Description of activity : second','00:00:00'),('abhay requested for Room 301_NIL for dates 2011-11-21 to 2011-11-21 from Hrs.00:00:00 to 01:30:00.<br/> Description of activity : morini','838:59:59'),('abhay requested for Room 301_NIL for dates 2011-11-21 to 2011-11-21 from Hrs.05:30:00 to 06:00:00.<br/> Description of activity : colide','838:59:59'),('abhay requested for Room 301_NIL for dates 2011-11-21 to 2011-11-21 from Hrs.21:30:00 to 24:00:00.<br/> Description of activity : asf','00:00:00'),('parag requested for Room SH1 for dates 2011-11-21 to 2011-11-21 from Hrs.06:30:00 to 09:00:00.<br/> Description of activity : sfasf','838:59:59'),('parag requested for Room 301_NIL for dates 2011-11-21 to 2011-11-21 from Hrs.15:30:00 to 17:30:00.<br/> Description of activity : asf;lakf','00:00:00'),('parag requested for Room 301_NIL for dates 2011-11-21 to 2011-11-21 from Hrs.08:00:00 to 15:30:00.<br/> Description of activity : asdf','00:00:00'),('parag requested for Room SH2 for dates 2011-11-22 to 2011-11-22 from Hrs.14:30:00 to 23:59:59.<br/> Description of activity : asdf','00:00:00'),('parag requested for Room CR1 for dates 2011-11-26 to 2011-11-28 from Hrs.06:30:00 to 09:00:00.<br/> Description of activity : ff','00:00:00'),('parag requested for Room 301_NIL for dates 2011-11-22 to 2011-11-22 from Hrs.07:00:00 to 08:30:00.<br/> Description of activity : fff','838:59:59'),('parag requested for Room 301_NIL for dates 2011-11-22 to 2011-11-22 from Hrs.19:00:00 to 22:30:00.<br/> Description of activity : Elocution Competition.','838:59:59'),('parag requested for Room 301_NIL for dates 2011-11-23 to 2011-11-23 from Hrs.17:00:00 to 18:30:00.<br/> Description of activity : Yoga activities.','838:59:59'),('anshul requested for Room 301_NIL for dates 2011-11-23 to 2011-12-22 from Hrs.15:30:00 to 18:00:00.<br/> Description of activity : Dance Club','00:00:00'),('parag requested for Room 301_NIL for dates 2011-11-23 to 2011-11-30 from Hrs.15:00:00 to 18:00:00.<br/> Description of activity : Algorithm Tute','00:00:00'),('anshul requested for Room 301_NIL for dates 2011-11-23 to 2011-11-30 from Hrs.16:00:00 to 19:00:00.<br/> Description of activity : Exam.','00:00:00'),('parag requested for Room SH1 for dates 2011-11-22 to 2011-11-22 from Hrs.17:30:00 to 22:00:00.<br/> Description of activity : Tute','00:00:00'),('parag requested for Room 301_NIL for dates 2011-11-25 to 2011-11-25 from Hrs.16:00:00 to 17:30:00.<br/> Description of activity : DISCO PARTY','838:59:59'),('user1 requested for Room 301_NIL for dates 2012-04-26 to 2012-04-28 from Hrs.08:00:00 to 08:30:00.<br/> Description of activity : kjhkl','00:00:00'),('user1 requested for Room SH1 for dates 2012-04-28 to 2012-04-30 from Hrs.09:00:00 to 16:00:00.<br/> Description of activity : sport','00:00:00'),('user1 requested for Room SH1 for dates 2012-08-28 to 2012-08-28 from Hrs.09:00:00 to 11:00:00.<br/> Description of activity : xyz','00:00:00');
/*!40000 ALTER TABLE `Updates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (1,'user1','user1','user1@students.iiit.ac.in',0),(2,'super.user','super.user','super.user@students.iiit.ac.in',1),(5,'priveleged.user1','priveleged.user1','priveleged.user1@students.iiit.ac.in',2),(8,'priveleged.user2','priveleged.user2','priveleged.user2@students.iiit.ac.in',2),(7,'priveleged.user3','priveleged.user3','priveleged.user3@students.iiit.ac.in',2),(9,'user2','user2','user2@students.iiit.ac.in',0),(11,'user3','user3','user3@students.iiit.ac.in',0),(12,'Ansh','password','anshul.soni@students.iiit.ac.in',0),(13,'nehaljwani','iiit123','nehal.wani@students.iiit.ac.in',0);
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-10-15  5:25:38

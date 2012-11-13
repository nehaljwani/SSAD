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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Category`
--

LOCK TABLES `Category` WRITE;
/*!40000 ALTER TABLE `Category` DISABLE KEYS */;
INSERT INTO `Category` VALUES (1,'Projector_Room',NULL),(2,'AC',NULL),(3,'Teach_lab',NULL),(6,'Public Addressing System','Speakers'),(7,'',''),(8,'Mosquitos','Buuz buuz');
/*!40000 ALTER TABLE `Category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CourseRooms`
--

DROP TABLE IF EXISTS `CourseRooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CourseRooms` (
  `Code` varchar(10) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Room` varchar(10) DEFAULT NULL,
  `Day` varchar(10) DEFAULT NULL,
  `StartTime` varchar(10) DEFAULT NULL,
  `EndTime` varchar(10) DEFAULT NULL,
  `Type` varchar(10) DEFAULT NULL,
  `PrevRoom` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CourseRooms`
--

LOCK TABLES `CourseRooms` WRITE;
/*!40000 ALTER TABLE `CourseRooms` DISABLE KEYS */;
INSERT INTO `CourseRooms` VALUES ('ICS101','Computer Programming','H101','Thu','10.30','11.25','UG1','SH1'),('ICS101','Computer Programming','H101','Tue','10.30','11.25','UG1','SH1'),('ICS101','Computer Programming','H101','Fri','10.30','11.25','UG1','SH1'),('ICS101','Computer Programming','H101','Mon','10.30','11.25','UG1','SH1'),('ICS102','IT Workshop I','H101','Thu','10.30','11.25','UG1','SH1'),('ICS102','IT Workshop I','H101','Tue','10.30','11.25','UG1','SH1'),('ICS102','IT Workshop I','H101','Fri','10.30','11.25','UG1','SH1'),('ICS102','IT Workshop I','H101','Mon','10.30','11.25','UG1','SH1'),('IEC101','Digital Logic and Processors','H101','Fri','09.30','10.25','UG1','SH1'),('IEC101','Digital Logic and Processors','H101','Mon','09.30','10.25','UG1','SH1'),('IEC101','Digital Logic and Processors','H101','Wed','09.30','10.25','UG1','SH1'),('IEC102','Electrical Science I','H101','Thu','09.30','10.25','UG1','SH1'),('IEC102','Electrical Science I','H101','Tue','09.30','10.25','UG1','SH1'),('IMA101','Mathematics I','H101','Wed','08.30','09.25','UG1','SH1'),('IMA101','Mathematics I','H101','Fri','08.30','09.25','UG1','SH1'),('IMA101','Mathematics I','H101','Mon','08.30','09.25','UG1','SH1'),('ICS101','Computer Programming','H102','Fri','12.00','13.00','UG1','CR2'),('ICS101','Computer Programming','H102','Mon','12.00','12.25','UG1','CR2'),('ICS101','Computer Programming','H102','Thu','12.00','13.00','UG1','CR2'),('ICS101','Computer Programming','H102','Tue','12.00','13.00','UG1','CR2'),('ICS102','IT Workshop I','H102','Tue','12.00','13.00','UG1','CR2'),('ICS102','IT Workshop I','H102','Fri','12.00','13.00','UG1','CR2'),('ICS102','IT Workshop I','H102','Mon','12.00','13.00','UG1','CR2'),('ICS102','IT Workshop I','H102','Thu','12.00','13.00','UG1','CR2'),('IEC101','Digital Logic and Processors','H102','Wed','08.30','09.30','UG1','CR2'),('IEC101','Digital Logic and Processors','H102','Fri','08.30','09.30','UG1','CR2'),('IEC101','Digital Logic and Processors','H102','Mon','08.30','09.30','UG1','CR2'),('IEC102','Electrical Science I','H102','Thu','08.30','09.25','UG1','CR2'),('IEC102','Electrical Science I','H102','Tue','08.30','09.25','UG1','CR2'),('IMA101','Mathematics I','H102','Fri','09.30','10.25','UG1','CR2'),('IMA101','Mathematics I','H102','Mon','09.30','10.25','UG1','CR2'),('IMA101','Mathematics I','H102','Wed','09.30','10.25','UG1','CR2'),('ICS211','Algorithms','B4-304','Wed','10.00','11.25','UG2','SH2'),('ICS211','Algorithms','B4-304','Sat','10.00','11.25','UG2','SH2'),('ICS231','Operating Systems','B4-304','Mon','10.00','11.25','UG2','SH2'),('ICS231','Operating Systems','B4-304','Thu','10.00','11.25','UG2','SH2'),('ICS241','Introduction to Databases','B4-304','Tue','10.00','11.25','UG2','SH2'),('ICS241','Introduction to Databases','B4-304','Fri','10.00','11.25','UG2','SH2'),('ICS261','SSAD & Project','B4-304','Mon','11.30','12.55','UG2','SH2'),('ICS261','SSAD & Project','B4-304','Thu','11.30','12.55','UG2','SH2'),('IMA201','Mathematics III','B4-304','Tue','11.30','12.55','UG2','SH2'),('IMA201','Mathematics III','B4-304','Sat','11.30','12.55','UG2','SH2'),('ISC201','Science I','B4-304','Tue','11.30','12.55','UG2','SH2'),('ISC201','Science I','B4-304','Fri','11.30','12.55','UG2','SH2'),('ECE205','Linear Electronic Circuits','H104','Thu','10.00','11.25','UG2','101'),('ECE205','Linear Electronic Circuits','H104','Mon','10.00','11.25','UG2','101'),('ECE225','Embedded Hardware Design','H104','Fri','10.00','11.25','UG2','101'),('ECE225','Embedded Hardware Design','H104','Tue','10.00','11.25','UG2','101'),('ECE230','Probability & Random Processes','H104','Sat','11.30','12.55','UG2','101'),('ECE230','Probability & Random Processes','H104','Wed','11.30','12.55','UG2','101'),('ECE241','Signals and Systems','H104','Thu','11.30','12.55','UG2','101'),('ECE241','Signals and Systems','H104','Mon','11.30','12.55','UG2','101'),('ECE260','Electrical Science II','H104','Tue','14.00','15.25','UG2','101'),('ECE260','Electrical Science II','H104','Fri','14.00','15.25','UG2','101'),('CSE531','Operating Systems (PG)','H202','Mon','08.30','09.55','PG1','N104'),('CSE531','Operating Systems (PG)','H202','Thu','08.30','09.55','PG1','N104'),('CSE603','Advanced Problem Solving','H202','Tue','11.00','13.00','PG1','N104'),('CSE603','Advanced Problem Solving','H202','Fri','11.00','13.00','PG1','N104'),('CSE611','Discrete Maths and Algorithms','H202','Thu','11.30','13.00','PG1','N104'),('CSE611','Discrete Maths and Algorithms','H202','Mon','11.30','13.00','PG1','N104'),('CSE411','Complexity and Advanced Algorithms','SH1','Wed','11.30','12.55','BC','204'),('CSE411','Complexity and Advanced Algorithms','SH1','Sat','11.30','12.55','BC','204'),('CSE415','Principles of Programming Languages','SH1','Thu','11.30','12.55','BC','SH1'),('CSE415','Principles of Programming Languages','SH1','Mon','11.30','12.55','BC','SH1'),('CSE419','Compilers','SH1','Fri','08.30','09.55','BC','SH2'),('CSE419','Compilers','SH1','Tue','08.30','09.55','BC','SH2'),('CSE435','Advanced Computer Networks','SH1','Mon','08.30','09.55','BC','SH2'),('CSE435','Advanced Computer Networks','SH1','Thu','08.30','09.55','BC','SH2'),('CSE471','Statistical Methods in AI','SH1','Fri','10.00','11.25','BC','N104'),('CSE471','Statistical Methods in AI','SH1','Tue','10.00','11.25','BC','N104'),('CEG421','Building Energy Simulation','SH1','Thu','10.00','11.25','Elective','103'),('CEG421','Building Energy Simulation','SH1','Mon','10.00','11.25','Elective','103'),('CEG561','Advanced Topics in Remote Sensing','SH1','Mon','14.00','15.25','Elective','104'),('CEG561','Advanced Topics in Remote Sensing','SH1','Thu','14.00','15.25','Elective','104'),('CEG628','Soil Dynamics and Machine Foundations','SH2','Fri','10.00','11.25','Elective','102'),('CEG628','Soil Dynamics and Machine Foundations','SH2','Tue','10.00','11.25','Elective','102'),('CEG631','Foundation Engineering and Design','SH2','Thu','11.30','12.55','Elective','201'),('CEG631','Foundation Engineering and Design','SH2','Mon','11.30','12.55','Elective','201'),('CES442','Disaster Management','SH2','Mon','10.00','11.25','Elective','202'),('CES442','Disaster Management','SH2','Thu','10.00','11.25','Elective','202'),('CES625','Advanced Reinforce Concrete Design','SH2','Mon','14.00','15.25','Elective','N104'),('CES625','Advanced Reinforce Concrete Design','SH2','Thu','14.00','15.25','Elective','N104'),('CES631','Structural Dynamics','SH2','Thu','08.30','09.55','Elective','301'),('CES631','Structural Dynamics','SH2','Mon','08.30','09.55','Elective','301'),('CES634','CASE Workshop','CR1','Thu','10.00','11.25','Elective','203'),('CES634','CASE Workshop','CR1','Mon','10.00','11.25','Elective','203'),('CES641','Seismic Eva and Strengthening of Buildings','CR1','Fri','08.30','09.55','Elective','101'),('CES641','Seismic Eva and Strengthening of Buildings','CR1','Tue','08.30','09.55','Elective','101'),('CLG211','Introduction to Linguistics','CR2','Thu','10.00','11.25','Elective','B4301'),('CLG211','Introduction to Linguistics','CR2','Tue','10.00','11.25','Elective','B4301'),('CLG411','Linguistics 1: Language Typology and Universals','CR2','Mon','11.30','12.55','Elective','B4301'),('CLG411','Linguistics 1: Language Typology and Universals','CR2','Thu','11.30','12.55','Elective','B4301'),('CLG413','Phonetics and Phonology','CR2','Sat','11.30','12.55','Elective','201'),('CLG413','Phonetics and Phonology','CR2','Wed','11.30','12.55','Elective','201'),('CLG421','Computational Linguistics I','CR2','Thu','14.00','15.25','Elective','101'),('CLG421','Computational Linguistics I','CR2','Mon','14.00','15.25','Elective','101'),('CLG451','Linguistic Data : Collection and Analysis','H103','Tue','10.00','11.25','Elective','B6309'),('CLG451','Linguistic Data : Collection and Analysis','H103','Fri','10.00','11.25','Elective','B6309'),('CLG513','Event and Time in Discourse','H103','Thu','08.30','09.55','Elective','B4301'),('CLG513','Event and Time in Discourse','H103','Mon','08.30','09.55','Elective','B4301'),('CLG611','Basic Maths I','H103','Thu','10.00','11.25','Elective','102'),('CLG611','Basic Maths I','H103','Mon','10.00','11.25','Elective','102'),('CLG661','Computers and Scripting I','H103','Tue','11.30','12.55','Elective','102'),('CLG661','Computers and Scripting I','H103','Fri','11.30','12.55','Elective','102'),('CSE445','Data Warehousing and Data Mining','H103','Wed','10.00','11.25','Elective','103'),('CSE445','Data Warehousing and Data Mining','H103','Sat','10.00','11.25','Elective','103'),('CSE463','Introduction to Middleware Systems','H104','Sat','10.00','11.25','Elective','N104'),('CSE463','Introduction to Middleware Systems','H104','Wed','10.00','11.25','Elective','N104'),('CSE472','Natural Language Processing','H104','Mon','08.30','09.55','Elective','CR1'),('CSE472','Natural Language Processing','H104','Thu','08.30','09.55','Elective','CR1'),('CSE478','Digital Image Processing','H104','Thu','14.00','15.25','Elective','102'),('CSE478','Digital Image Processing','H104','Mon','14.00','15.25','Elective','102'),('CSE483','Mobile Robotics','H203','Fri','14.00','15.25','Elective','202'),('CSE483','Mobile Robotics','H203','Tue','14.00','15.25','Elective','202'),('CSE485','Intro to Cognitive Science','H203','Wed','11.30','12.55','Elective','104'),('CSE485','Intro to Cognitive Science','H203','Sat','11.30','12.55','Elective','104'),('CSE502','Parallel Programming','H203','Tue','10.00','11.25','Elective','CR1'),('CSE502','Parallel Programming','H203','Fri','10.00','11.25','Elective','CR1'),('CSE504','Modern Computer Architecture','H203','Wed','10.00','11.25','Elective','102'),('CSE504','Modern Computer Architecture','H203','Sat','10.00','11.25','Elective','102'),('CSE540','Research in Information Security','H203','Thu','11.30','12.55','Elective','103'),('CSE540','Research in Information Security','H203','Mon','11.30','12.55','Elective','103'),('CSE545','Advances in Data Mining','H203','Thu','14.00','15.25','Elective','201'),('CSE545','Advances in Data Mining','H203','Mon','14.00','15.25','Elective','201'),('CSE565','Cloud Computing','H203','Wed','08.30','09.55','Elective','SH2'),('CSE565','Cloud Computing','H203','Sat','08.30','09.55','Elective','SH2'),('CSE577','Machine Learning','H203','Thu','08.30','09.55','Elective','201'),('CSE577','Machine Learning','H203','Mon','08.30','09.55','Elective','201'),('CSE591','Spatial Informatics','H204','Thu','08.30','09.55','Elective','202'),('CSE591','Spatial Informatics','H204','Mon','08.30','09.55','Elective','202'),('CSE592','Ecological and Geospatial Modeling','H204','Tue','08.30','09.55','Elective','202'),('CSE592','Ecological and Geospatial Modeling','H204','Fri','08.30','09.55','Elective','202'),('CSE602','Computer Problem Solving','H204','Tue','10.00','11.25','Elective','304'),('CSE602','Computer Problem Solving','H204','Fri','10.00','11.25','Elective','304'),('CSE861','Software Quality Engineering','H204','Thu','14.00','15.25','Elective','202'),('CSE861','Software Quality Engineering','H204','Mon','14.00','15.25','Elective','202'),('CSE991','Research Methodology','H204','Sat','08.30','09.55','Elective','N104'),('CSE991','Research Methodology','H204','Wed','08.30','09.55','Elective','N104'),('ECE381','Electromagnetic Theory and Applications','H204','Thu','10.00','11.25','Elective','B6309'),('ECE381','Electromagnetic Theory and Applications','H204','Mon','10.00','11.25','Elective','B6309'),('ECE436','Communication Theory II','H204','Sat','11.30','12.55','Elective','202'),('ECE436','Communication Theory II','H204','Wed','11.30','12.55','Elective','202'),('ECE442','Time Frequency Analysis','H303','Wed','08.30','09.55','Elective','101'),('ECE442','Time Frequency Analysis','H303','Sat','08.30','09.55','Elective','101'),('ECE446','Speech Systems','H303','Fri','10.00','11.25','Elective','103'),('ECE446','Speech Systems','H303','Tue','10.00','11.25','Elective','103'),('ECE448','Speech Signal Processing','H303','Thu','08.30','09.55','Elective','101'),('ECE448','Speech Signal Processing','H303','Mon','08.30','09.55','Elective','101'),('ECE451','Linear Control Systems','H304','Thu','08.30','09.55','Elective','102'),('ECE451','Linear Control Systems','H304','Mon','08.30','09.55','Elective','102'),('ECE461','Analog and Mixed Signal Design','H304','Mon','14.00','15.25','Elective','103'),('ECE461','Analog and Mixed Signal Design','H304','Thu','14.00','15.25','Elective','103'),('ECE467','CMOS Radio Frequencey Integrated Circuit Design','H304','Sat','11.30','12.55','Elective','203'),('ECE467','CMOS Radio Frequencey Integrated Circuit Design','H304','Wed','11.30','12.55','Elective','203'),('ECE530','Broadband Networks','N104','Sat','11.30','12.55','Elective','CR1'),('ECE530','Broadband Networks','N104','Wed','11.30','12.55','Elective','CR1'),('ECE539','Information Theory and Coding','N104','Tue','14.00','15.25','Elective','201'),('ECE539','Information Theory and Coding','N104','Fri','14.00','15.25','Elective','201'),('ECE561','VLSI Algorithms','SH1','Fri','14.00','15.25','Elective','104'),('ECE561','VLSI Algorithms','SH1','Tue','14.00','15.25','Elective','104'),('ECE661','Embedded Systems','SH2','Fri','14.00','15.25','Elective','103'),('ECE661','Embedded Systems','SH2','Tue','14.00','15.25','Elective','103'),('HSS240','Sense of Past','N104','Tue','08.30','10.00','Elective','C1302'),('HSS240','Sense of Past','N104','Thu','08.30','10.00','Elective','C1302'),('HSS290','Confluence of Humanities and CS','H304','Thu','10.00','11.30','Elective','CEHConf'),('HSS290','Confluence of Humanities and CS','H304','Tue','10.00','11.30','Elective','CEHConf'),('HSS310','Ontology','H203','Thu','10.00','11.25','Elective','CR1'),('HSS310','Ontology','H203','Mon','10.00','11.25','Elective','CR1'),('HSS332','Installation as a Form of Art','H204','Fri','14.00','15.25','Elective','203'),('HSS332','Installation as a Form of Art','H204','Tue','14.00','15.25','Elective','203'),('HSS342','Classical Language: Sanskrit II','H304','Wed','08.30','09.55','Elective','CR1'),('HSS342','Classical Language: Sanskrit II','H304','Sat','08.30','09.55','Elective','CR1'),('HSS346','Imagined Futures: Readings in Science Fiction','N104','Tue','11.30','12.55','Elective','B6309'),('HSS346','Imagined Futures: Readings in Science Fiction','N104','Fri','11.30','12.55','Elective','B6309'),('HSS352','Innovation and Technology Management','SH1','Tue','11.30','12.55','Elective','103'),('HSS352','Innovation and Technology Management','SH1','Fri','11.30','12.55','Elective','103'),('HSS354','Non-Violence','SH1','Wed','14.00','15.25','Elective','201'),('HSS354','Non-Violence','SH1','Sat','14.00','15.25','Elective','201'),('HSS360','Economics and Organizations','CR2','Tue','08.30','09.55','Elective','B6309'),('HSS360','Economics and Organizations','CR2','Thu','08.30','09.55','Elective','B6309'),('HSS362','Political and Economic Thought for Human Society','CR2','Wed','14.00','15.25','Elective','102'),('HSS362','Political and Economic Thought for Human Society','CR2','Sat','14.00','15.25','Elective','102'),('HSS401','Space Time in Arts and Humanities','H103','Sat','14.00','15.25','Elective','101'),('HSS401','Space Time in Arts and Humanities','H103','Wed','14.00','15.25','Elective','101'),('HSS422','Classical Text Reading','H104','Tue','11.30','12.55','Elective','201'),('HSS422','Classical Text Reading','H104','Fri','11.30','12.55','Elective','201'),('HSS462','Studies in Alternative Development','H203','Tue','11.30','12.55','Elective','104'),('HSS462','Studies in Alternative Development','H203','Fri','11.30','12.55','Elective','104'),('ICS331','Algorithms and Operating Systems','H203','Wed','14.00','15.25','Elective','CR1'),('ICS331','Algorithms and Operating Systems','H203','Sat','14.00','15.25','Elective','CR1'),('IMA403','Mathematical Analysis','H204','Wed','10.00','11.25','Elective','101'),('IMA403','Mathematical Analysis','H204','Sat','10.00','11.25','Elective','101'),('IMA404','Number Theory and Cryptology','H303','Thu','10.00','11.25','Elective','104'),('IMA404','Number Theory and Cryptology','H303','Mon','10.00','11.25','Elective','104'),('IMA406','Operations Research','H303','Fri','08.30','09.55','Elective','102'),('IMA406','Operations Research','H303','Tue','08.30','09.55','Elective','102'),('SCI101','General Physics','H102','Thu','10.00','11.25','Elective','B4304'),('SCI101','General Physics','H102','Tue','10.00','11.25','Elective','B4304'),('SCI311','Chemical Basis of Everyday Phenomena','H304','Fri','08.30','09.55','Elective','104'),('SCI311','Chemical Basis of Everyday Phenomena','H304','Tue','08.30','09.55','Elective','104'),('SCI421','Advanced Biology(Cellular/Molecular/Genetic)','CR1','Thu','11.30','12.55','Elective','102'),('SCI421','Advanced Biology(Cellular/Molecular/Genetic)','CR1','Sat','11.30','12.55','Elective','102'),('SCI422','Molecular Biology','H103','Thu','11.30','12.55','Elective','202'),('SCI422','Molecular Biology','H103','Mon','11.30','12.55','Elective','202'),('SCI462','Intro to Quantum Field Theory','H103','Tue','08.30','09.55','Elective','201'),('SCI462','Intro to Quantum Field Theory','H103','Fri','08.30','09.55','Elective','201'),('SCI463','Quantuam Information and Computing','H303','Wed','10.00','11.25','Elective','104'),('SCI463','Quantuam Information and Computing','H303','Sat','10.00','11.25','Elective','104'),('SCI541','Advanced Biomolecular Architecture','H304','Wed','10.00','11.25','Elective','201'),('SCI541','Advanced Biomolecular Architecture','H304','Sat','10.00','11.25','Elective','201'),('SCI550','Maths and Statistics','SH2','Fri','11.30','12.55','Elective','101'),('SCI550','Maths and Statistics','SH2','Tue','11.30','12.55','Elective','101'),('SCI635','\"Optics, Symmetry and Spectroscopy\"','CR1','Tue','14.00','15.25','Elective','102'),('SCI635','\"Optics, Symmetry and Spectroscopy\"','CR1','Fri','14.00','15.25','Elective','102'),('SCI643','Biomolecular Structure Interaction and Dynamics','H104','Tue','08.30','09.55','Elective','103'),('SCI643','Biomolecular Structure Interaction and Dynamics','H104','Fri','08.30','09.55','Elective','103'),('SCI644','Biomolecular Structure and Supramolecular Chemistry','H201','Thu','10.00','11.25','Elective','201'),('CEA611','','CR2','Tue','14.00','15.25','PG1','N104'),('CEA611','','CR2','Fri','14.00','15.25','PG1','N104'),('CEA611','','CR2','Mon','00.00','00.00','PG1','N104');
/*!40000 ALTER TABLE `CourseRooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DaySlots`
--

DROP TABLE IF EXISTS `DaySlots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DaySlots` (
  `slot` varchar(20) NOT NULL,
  `starttime` varchar(10) NOT NULL,
  `endtime` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DaySlots`
--

LOCK TABLES `DaySlots` WRITE;
/*!40000 ALTER TABLE `DaySlots` DISABLE KEYS */;
INSERT INTO `DaySlots` VALUES ('MORNING','08:00:00','13:00:00'),('AFTERNOON','14:00:00','18:00:00'),('EVENING','18:00:00','22:00:00');
/*!40000 ALTER TABLE `DaySlots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Feedback_Form`
--

DROP TABLE IF EXISTS `Feedback_Form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Feedback_Form` (
  `Name` char(50) DEFAULT NULL,
  `Email_id` varchar(50) DEFAULT NULL,
  `Comment` varchar(200) DEFAULT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Feedback_Form`
--

LOCK TABLES `Feedback_Form` WRITE;
/*!40000 ALTER TABLE `Feedback_Form` DISABLE KEYS */;
INSERT INTO `Feedback_Form` VALUES ('kapil','','Gud','2012-11-09 16:30:26'),('Nehal','','Rocks\r\n','2012-11-09 16:31:13'),('Ankush','','Partner','2012-11-09 16:51:00'),('alkjsa','','jkashdsaj\r\n','2012-11-09 16:51:12'),('asdsaasd','','sdasda','2012-11-09 16:51:16'),('wqewqw','','wqeewq','2012-11-09 16:51:20'),('wqewqwe','','qwewqe','2012-11-09 16:51:26'),('adsadasas','','asddsa','2012-11-09 16:51:47'),('aadsjsah','','kjhads','2012-11-09 16:51:54'),('oqwpowi','','OIuiuio\r\n','2012-11-09 16:52:16'),('fwe','','rwere','2012-11-09 16:52:27'),('appaji','','Talk To Dean.!','2012-11-11 16:49:08');
/*!40000 ALTER TABLE `Feedback_Form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Groups`
--

DROP TABLE IF EXISTS `Groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Groups` (
  `groupName` varchar(200) DEFAULT NULL,
  `level` int(2) NOT NULL,
  PRIMARY KEY (`level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Groups`
--

LOCK TABLES `Groups` WRITE;
/*!40000 ALTER TABLE `Groups` DISABLE KEYS */;
INSERT INTO `Groups` VALUES ('Student',0),('Parliament',1),('Acad Office',2),('SLC Chair',3),('Dean Academics',4),('Manager (Admin)',5),('TA',6),('Faculty',7);
/*!40000 ALTER TABLE `Groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Instances`
--

DROP TABLE IF EXISTS `Instances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Instances` (
  `reqNo` int(11) NOT NULL DEFAULT '0',
  `hash` varchar(100) DEFAULT NULL,
  `creator` varchar(25) DEFAULT NULL,
  `creatorEmail` varchar(50) DEFAULT NULL,
  `creatorPhone` varchar(15) DEFAULT NULL,
  `concernedPName` varchar(15) DEFAULT NULL,
  `concernedPEmail` varchar(50) DEFAULT NULL,
  `concernedPPhone` varchar(15) DEFAULT NULL,
  `appStatus` varchar(25) DEFAULT 'Accepted',
  `reqGId` int(10) DEFAULT NULL,
  `reqDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `eventStartDate` date DEFAULT NULL,
  `eventEndDate` date DEFAULT NULL,
  `eventStartTime` time DEFAULT NULL,
  `eventEndTime` time DEFAULT NULL,
  `eventTitle` varchar(40) DEFAULT NULL,
  `eventDesc` varchar(1000) DEFAULT NULL,
  `eventDays` varchar(50) DEFAULT NULL,
  `concernedAdmin` int(2) DEFAULT NULL,
  `room` varchar(10) DEFAULT NULL,
  `reqType` varchar(10) DEFAULT 'One Time'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Instances`
--

LOCK TABLES `Instances` WRITE;
/*!40000 ALTER TABLE `Instances` DISABLE KEYS */;
/*!40000 ALTER TABLE `Instances` ENABLE KEYS */;
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
  `eventDays` varchar(50) DEFAULT NULL,
  `concernedAdmin` int(2) DEFAULT NULL,
  `room` varchar(10) DEFAULT NULL,
  `reqType` varchar(10) DEFAULT 'One Time',
  `reqRejectReason` varchar(1000) DEFAULT 'Your request is pending! :)',
  `modifyTimestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`reqNo`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Requests`
--

LOCK TABLES `Requests` WRITE;
/*!40000 ALTER TABLE `Requests` DISABLE KEYS */;
INSERT INTO `Requests` VALUES (1,'6598c37665dc0b70b0fe44a6a315011a8b3a636f','Nehal','nehal.wani@students','9052480529','Ayush Chug','ayush.chug@students.iiit.','9052400628','Pending',0,'2012-10-14 13:23:32','2012-11-01','2012-10-10','08:30:00','00:20:10','CProTute','Fachcho Ko C Nahi Ati','1',1,'SH2','One Time','Specify a reason for rejection (optional)','0000-00-00 00:00:00'),(2,'6598c17665dc0b70b0fe44a6a315011a8b3a636f','Amish','amish.wani@students','9052480529','Ankush Jain','ankush.jain@students.iiit','9052401628','Pending',0,'0000-00-00 00:00:00','2012-01-01','2011-10-10','09:30:00','00:00:00','CProTute','Fachcho Ko C Nahi Ati','1',1,'SH2','Weekly','Your request is pending! :)','0000-00-00 00:00:00'),(3,'3f9487b2c99ae49c8a665b093b83d25e87916eb9','Amish','amish.wani@students.iiit.','9988619407','Nehal','nehal.wani@students.iiit.','9052480529','Pending',0,'2012-10-14 14:30:23','2012-01-02','2012-10-10','06:00:00','00:20:06','CPro','Game!','1',0,'SH2','Daily','Specify a reason for rejection (optional)','0000-00-00 00:00:00'),(4,'f45bd55bbe34ceadb71ce14a9afc853f52bef30f','Amish','amish.wani@students.iiit.ac.in','9988619407','Nehal','nehal.wani@students.iiit.','9052480529','Pending',0,'2012-10-14 14:32:57','2012-01-02','2012-10-10','06:00:00','00:20:06','CPro','Game!','1',0,'SH2','Daily','A request conflicting with your request was accepted.','0000-00-00 00:00:00'),(5,'d29cb78e88cd34425bc8563bcb90c66e13002263','Mayank','mayank.g@students.iiit.ac.in','9911223399','Kapil','kapil.kumar@students.iiit.ac.in','9052400628','Pending',0,'2012-10-14 19:32:20','2012-11-02','2012-10-12','09:00:00','09:00:00','ITWS','To Teach!','1',0,'SH1','Daily','Your request is pending! :)','0000-00-00 00:00:00'),(6,'1485eb3521ca2fea36f1be6022bcacac941822cf','Nehal','','9988619407','Nehal','','9988619407','Pending',0,'2012-10-15 06:27:06','2012-12-16','2012-09-15','01:30:00','01:30:00','Event','Bla!','1',3,'N301','Daily','Your request is pending! :)','0000-00-00 00:00:00'),(7,'4b37d590af37224f63bd3eba0adb46c952a54d43','Nehal','','9988619407','Nehal','','9988619407','Pending',0,'2012-10-15 06:34:23','2012-12-16','2012-09-15','01:30:00','01:30:00','Event','Bla!','1',3,'N301','Daily','Your request is pending! :)','0000-00-00 00:00:00'),(8,'fde760e161b1ccf07237aa2827a9e2613902c12a','Nehal','','9988619407','Nehal','','9988619407','Pending',0,'2012-10-15 06:34:32','2012-12-16','2012-09-15','01:30:00','01:30:00','Event','Bla!','1',3,'N301','One Time','Your request is pending! :)','0000-00-00 00:00:00'),(12,'818982b48c1a83c012faf97f6632b220e19f0c1b','Kshitij','kansal@gmail.com','9090909090','Nehal','nehal@gmail.com','9090909090','Pending',0,'2012-10-15 15:22:06','2012-10-15','2012-12-20','09:00:00','09:30:00','Felicity','Organize!','1',1,'N301','Multiple','Your request is pending! :)','0000-00-00 00:00:00'),(13,'2ce15a4e57c715fc38083fed0418c1c243376df3','Ayush','ayush.lodha@students.iiit.ac.in','9182736409','Ayush','ayush.lodha@students.iiit.ac.in','9182736409','Pending',0,'2012-10-15 16:11:32','2012-10-20','2012-12-15','08:00:00','08:30:00','Math 3 Tut','Facho ko maths nah ati','1',3,'302_NIL','Multiple','Your request is pending! :)','0000-00-00 00:00:00'),(14,'b8589f501416b19c3d210ba86fbb11ffb64ccb8d','Ankus','ankush.jain@students.iiit.ac.in','9988619407','Ankus','ankush.jain@students.iiit.ac.in','9988619407','Pending',0,'2012-10-15 18:56:30','2012-10-16','2012-10-15','23:00:00','23:30:00','Kush','Tem Job!','',1,'N301','One Time','Your request is pending! :)','0000-00-00 00:00:00'),(15,'fef52615422c7f74147a8e21be8b3b4bdf522fee','Ankus','ankush.jain@students.iiit.ac.in','9988619407','Ankus','ankush.jain@students.iiit.ac.in','9988619407','Pending',0,'2012-10-15 19:16:33','2012-10-16','2012-10-15','23:00:00','23:30:00','Kush','Tem Job!','',1,'N301','One Time','Your request is pending! :)','0000-00-00 00:00:00'),(16,'da3a4adbc923a9961c963cf70e682693dbe8686a','Kapil','kapil.kuam@students.iiit.ac.in','9988619407','Kapil','kapil.kuam@students.iiit.ac.in','9988619407','Pending',0,'2012-10-15 19:25:27','2012-10-16','2012-12-15','23:00:00','23:30:00','Kush','Tem Job!','',1,'N301','Multiple','Your request is pending! :)','0000-00-00 00:00:00'),(17,'205f91a4e0cfd26d8c1c5a64a49a0dc565be3eea','Kapil','kapil.kuam@students.iiit.ac.in','9988619407','Kapil','kapil.kuam@students.iiit.ac.in','9988619407','Pending',0,'2012-10-15 19:26:26','2012-10-16','2012-12-15','23:00:00','23:30:00','Kush','Tem Job!','1,7,',1,'N301','Multiple','Your request is pending! :)','0000-00-00 00:00:00'),(18,'e8e505c4c56405411487df22a81e3fcdc7937915','Kapil','temp@u.com','9988619407','Kapil','temp@u.com','9988619407','Pending',0,'2012-10-15 19:30:22','2012-10-02','2012-10-02','23:00:00','23:30:00','Kush','Tem Job!','1,7,',1,'TS','One Time','Your request is pending! :)','0000-00-00 00:00:00'),(19,'2fdb703bd5e7b263515c71a2b172d76e5fa02074','Kapil','temp@u.com','9988619407','Kapil','temp@u.com','9988619407','Pending',0,'2012-10-15 20:05:38','2012-10-02','2012-10-02','23:00:00','23:30:00','Kush','Tem Job!','1,7,',1,'TS','One Time','Your request is pending! :)','0000-00-00 00:00:00'),(20,'ed11c8cf06a2d37b3d113027183b1ad56f46bbb2','Nehal','nehalwani@gmail.com','9012990129','Kisna','kisna@iit.ac.in','9196781230','Pending',0,'2012-10-15 23:57:01','2012-10-02','2012-10-02','23:00:00','23:30:00','Felicity','Live!','',1,'TS','One Time','Your request is pending! :)','0000-00-00 00:00:00'),(21,'72f5c31574611242822bb7fe25c32a0fb775b8f4','Nehal','nehalwani@gmai.cpm','9012990129','Kisna','kisna@gmail.com','9196781230','Pending',0,'2012-10-16 00:24:46','2012-10-02','2012-10-02','23:00:00','23:30:00','Felicity','Live!','3',1,'TS','One Time','A request conflicting with your request was accepted.','0000-00-00 00:00:00'),(22,'8dfc4a54602c80f097387bf6f12e9327a6d53467','Nehal','nehalwani@gmai.cpm','9012990129','Kisna','kisna@gmail.com','9196781230','Pending',0,'2012-10-16 00:25:22','2012-10-02','2012-10-02','23:00:00','23:30:00','Felicity','Live!','3',1,'TS','One Time','A request conflicting with your request was accepted.','0000-00-00 00:00:00'),(23,'a54409ea7f17627a638f92afe63201637c9c8491','Deepsh Jain','deepesh.jain@iit.ac.in','9012990129','Anisa','anish@snig.com','9052480529','Pending',0,'2012-10-16 08:49:57','2012-10-16','2012-10-16','08:00:00','08:30:00','Science Tute','Masti!','3',1,'TS','One Time','A request conflicting with your request was accepted.','0000-00-00 00:00:00'),(24,'e66f0f0d493ed61d5ff51665cfdb27a4d7cbbe8c','Deepsh','jain@gmail.com','9012990129','Deepsh','jain@gmail.com','9012990129','Pending',0,'2012-10-16 08:50:33','2012-10-16','2012-10-16','08:00:00','09:00:00','Science Tute','Masti!','3',1,'TS','One Time','A request conflicting with your request was accepted.','0000-00-00 00:00:00'),(25,'11fa046ab5284948b7b7121be0b185a2213f6126','Deepsh','jain@gmail.com','9012990129','Deepsh','jain@gmail.com','9012990129','Pending',0,'2012-10-16 09:06:00','2012-10-16','2012-10-16','08:00:00','09:00:00','Science Tute','Masti!','3',2,'TS','One Time','A request conflicting with your request was accepted.','0000-00-00 00:00:00'),(26,'564f5d0b763458b465ab7bc13e849de06c8e2832','Ankush Jain','ankush.jain@students.iiit.ac.in','8106853163','Ankush Jain','ankush.jain@students.iiit.ac.in','8106853163','Pending',0,'2012-10-16 16:07:26','2012-10-14','2012-10-20','18:30:00','19:00:00','Boo blah','THe qukck brown fox jpumed over teh lazy dog','2,3,4,',1,'TL1','Multiple','Typos!!','0000-00-00 00:00:00'),(27,'717c2e46342d7d989c8343495a506f394616365e','Doppleganger','ankush.jain@students.iiit.ac.in','8106853163','Doppleganger','ankush.jain@students.iiit.ac.in','8106853163','Pending',0,'2012-10-16 16:12:19','2012-10-16','2012-10-16','18:00:00','19:00:00','Something','Blah blah','3',1,'N301','One Time','A request conflicting with your request was accepted.','0000-00-00 00:00:00'),(28,'0894d1c4a9bcf2024e663fbb362af2813142c6fd','kkiddu','ankush.jain@students.iiit.ac.in','8404546554','kkiddu','ankush.jain@students.iiit.ac.in','8404546554','Pending',0,'2012-10-16 16:14:39','2012-10-14','2012-10-20','17:30:00','18:30:00','New event','Boo boo boo','2,3,4,',1,'N301','Multiple','A request conflicting with your request was accepted.','0000-00-00 00:00:00'),(29,'816c1bc01c9d56066879432d9e0cc63483898bc2','Albus Percival Wulfric Br','dumy@hogwarts.com','1800112233','Albus Percival ','dumy@hogwarts.com','1800112233','Pending',0,'2012-10-16 16:19:20','2012-10-18','2012-10-18','08:30:00','09:00:00','Orientation','New fachas at Hogwarts','5',3,'Team18','One Time','Your request is pending! :)','0000-00-00 00:00:00'),(30,'10c2dc007d4f8f7b7300a077b562c89fb36c701a','Albus Percival Wulfric Br','','1800112233','Albus Percival ','','1800112233','Pending',0,'2012-10-16 16:20:30','2012-10-16','2012-10-16','17:00:00','20:00:00','Orientation','New fachas at Hogwarts','3',3,'N301','One Time','A request conflicting with your request was accepted.','0000-00-00 00:00:00'),(32,'2dfc055913f9206ac1a3a4039c40d7678ddb3871','Jawani','nehal.wani@students.iiit.ac.in','9012990129','Digital','ankush.jain@students.iiit.ac.in','9052400628','Pending',0,'2012-10-16 18:12:17','2012-08-20','2012-12-16','04:00:00','04:30:00','SSAD Tutorial','2nd years dont know about design','7,',2,'SH2','Multiple','You are too intelligent for this!','0000-00-00 00:00:00'),(33,'3ac4abf28d0cb3970fa10a655951660c7db001a6','Shubham','shubham.sangal@students.iiit.ac.in','9090909090','Kapil','kapil.kumar@students.iiit.ac.in','9090909090','Pending',0,'2012-10-17 10:22:35','2012-09-17','2012-12-10','03:30:00','04:30:00','Math 1 Tute','Test','6,7,',1,'302_NIL','Multiple','Your request is pending! :)','0000-00-00 00:00:00'),(34,'a0b0729e7f5d71b609f3e5b14bf08a2e04aca611','Ankush','ankush.jain@students.iiit.ac.in','9090909090','Anisa','anirudh.goyal@students.iiit.ac.in','9090909090','Pending',0,'2012-10-17 10:26:34','2012-10-17','2012-11-17','08:30:00','09:00:00','Speech By Anisa','Tada!','4,5,',1,'N301','Multiple','Your request is pending! :)','0000-00-00 00:00:00'),(35,'60344bf9bd8c664b0f956979fbe321f8fa24be62','Nehal','nehajw.wani@students.iiit.ac.in','9090909090','Nehal','nehal.wani@stduents.iiit.ac.in','9090909090','Pending',0,'2012-10-17 10:29:32','2012-11-17','2012-11-17','08:30:00','09:00:00','Test','Test','7',3,'N301','One Time','Your request is pending! :)','0000-00-00 00:00:00'),(36,'6b11669d0dec1ab48734613d9e668121c852d1bd','','','','','','','Pending',0,'2012-11-09 05:00:31','0000-00-00','0000-00-00','00:00:00','00:00:00','','','5',0,'','','Your request is pending! :)','0000-00-00 00:00:00'),(37,'bd3fb180c2ca6d2f0579076b21101b42e7e68efd','','','','','','','Pending',0,'2012-11-09 05:00:31','0000-00-00','0000-00-00','00:00:00','00:00:00','','','5',0,'','','Your request is pending! :)','0000-00-00 00:00:00'),(39,'830f0e198d56c8db6b81e783628bfef29199bede','Test2','test@test.com','1','Test2','test@test.com','1','Pending',0,'2012-11-10 22:15:40','2012-11-13','2012-11-13','05:30:00','06:30:00','TUTS','Tut','3',1,'N301','One Time','A request conflicting with your request was accepted.','0000-00-00 00:00:00'),(40,'bdccba96b16fd41ec281869521b3dcd685126fd0','Test3','test@test.com','1','Test3','test@test.com','1','Pending',0,'2012-11-10 22:16:24','2012-11-13','2012-11-13','06:00:00','07:00:00','TUTS','Tut','3',1,'N301','One Time','A request conflicting with your request was accepted.','0000-00-00 00:00:00'),(41,'02eb19235798b8d98bfb194cb06eab06c0635dbd','Ankush Jain','ankush.jain@students.iiit.ac.in','1122334455','Ankush Jain','ankush.jain@students.iiit.ac.in','1122334455','Pending',0,'2012-11-10 22:39:14','2012-11-14','2012-11-14','06:30:00','07:00:00','CULT','Break a leg','4',1,'TL1','One Time','Specify a reason for rejection (optional)','0000-00-00 00:00:00'),(42,'31c6d589a8ff1a3309d25b1dcef4cd124d2027b3','Ankush Jain','ankush.jain@students.iiit.ac.in','1122334455','Ankush Jain','ankush.jain@students.iiit.ac.in','1122334455','Pending',0,'2012-11-10 22:42:12','2012-11-20','2012-11-20','09:00:00','09:30:00','TUTS','Fachon ko C nahi aati','3',1,'SH1','One Time','Your request is pending! :)','0000-00-00 00:00:00'),(44,'4f744b0196461da2f960f2c0b3b1d49f80481ff2','Kal El','ankush.jain@students.iiit.ac.in','1122334455','Kal El','ankush.jain@students.iiit.ac.in','1122334455','Pending',0,'2012-11-10 23:13:26','2012-11-11','2012-11-11','00:00:00','00:00:00','LABS','Testing with Javascript','1',1,'SH1','One Time','Your request is pending! :)','0000-00-00 00:00:00'),(45,'af66529e0abf8a68a9d6f93e11223e5b0b456b0d','Test4','test@test.com','1122334455','Test4','test@test.com','1122334455','Pending',0,'2012-11-10 23:14:03','2012-11-13','2012-11-13','06:30:00','07:30:00','TUTS','Testing with Javascript','3',1,'N301','One Time','Your request is pending! :)','0000-00-00 00:00:00'),(46,'903d4ac29ec32c0d2c1160c0d8bfada55c9e8b97','Kal El','ankush.jain@students.iiit.ac.in','1122334455','Kal El','ankush.jain@students.iiit.ac.in','1122334455','Pending',0,'2012-11-10 23:16:08','2012-11-11','2012-11-11','00:00:00','00:00:00','LABS','Testing with Javascript','1',1,'SH1','One Time','Specify a reason for rejection (optional)','0000-00-00 00:00:00'),(47,'2de0a685d36e324b78efca0c592573f5aff2dde1','Kal El','ankush.jain@students.iiit.ac.in','1122334455','Kal El','ankush.jain@students.iiit.ac.in','1122334455','Pending',0,'2012-11-10 23:18:51','2012-11-11','2012-11-11','00:00:00','00:00:00','LABS','Testing with Javascript','1',1,'SH1','One Time','Specify a reason for rejection (optional)','0000-00-00 00:00:00'),(48,'4415f596141f3944733e0dc62cae58c97cc9829f','Kal El','ankush.jain@students.iiit.ac.in','1122334455','Kal El','ankush.jain@students.iiit.ac.in','1122334455','Pending',0,'2012-11-10 23:22:56','2012-11-11','2012-11-11','00:00:00','00:00:00','LABS','Testing with Javascript','1',1,'SH1','One Time','Specify a reason for rejection (optional)','0000-00-00 00:00:00'),(49,'45838715d7c0143d0912c25317d97952da08de35','Kal El','ankush.jain@students.iiit.ac.in','1122334455','Kal El','ankush.jain@students.iiit.ac.in','1122334455','Pending',0,'2012-11-10 23:23:51','2012-11-11','2012-11-11','00:00:00','00:00:00','LABS','Testing with Javascript','1',1,'SH1','One Time','Specify a reason for rejection (optional)','0000-00-00 00:00:00'),(50,'49b65cc9a185434251565971bf67f9a60ed118c6','Kal El','ankush.jainnn@students.iiit.ac.in','1122334455','Kal El','ankush.jainnn@students.iiit.ac.in','1122334455','Pending',0,'2012-11-11 00:01:33','2012-11-11','2012-11-11','07:30:00','08:00:00','LABS','Testing with Javascript','1',1,'SH1','One Time','Your request is pending! :)','0000-00-00 00:00:00'),(51,'47a2bda3b85874d1d6658c1f1d1c473c945d20df','Kal El','ankush.jain@students.iiit.ac.in','1122334455','Kal El','ankush.jain@students.iiit.ac.in','1122334455','Pending',0,'2012-11-11 15:12:58','2012-11-16','2012-11-16','00:00:00','00:00:00','LABS','Testing with Javascript','6',1,'SH1','One Time','Screwed!','0000-00-00 00:00:00'),(52,'b5cd17c88997eb58326e458ea7e96d4cbe399a83','Kal El','ankush.jain@students.iiit.ac.in','1122334455','Kal El','ankush.jain@students.iiit.ac.in','1122334455','Cancelled',0,'2012-11-13 10:39:01','2012-11-18','2012-11-30','09:30:00','11:30:00','LABS','Testing with Javascript','1,2,5,7,',1,'TL1','Multiple','Test','0000-00-00 00:00:00');
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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Room`
--

LOCK TABLES `Room` WRITE;
/*!40000 ALTER TABLE `Room` DISABLE KEYS */;
INSERT INTO `Room` VALUES (1,'N301',1,0,'EMPTY',100),(2,'302_NIL',1,0,NULL,100),(3,'TL1',1,0,NULL,0),(4,'TL2',1,0,NULL,0),(5,'SH1',2,0,NULL,250),(6,'SH2',2,0,NULL,250),(10,'305_NIL',1,0,NULL,100),(8,'CR1',2,0,NULL,0),(9,'CR2',2,0,NULL,0),(11,'TS',3,0,NULL,0),(12,'Team18',4,0,'Boo',100);
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
INSERT INTO `Room_Cat` VALUES (1,1),(2,1),(3,3),(4,3),(5,1),(5,2),(6,1),(6,2),(8,1),(9,1),(12,1),(12,2);
/*!40000 ALTER TABLE `Room_Cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tablem`
--

DROP TABLE IF EXISTS `Tablem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tablem` (
  `Code` varchar(10) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Day` varchar(5) DEFAULT NULL,
  `StartTime` varchar(10) DEFAULT NULL,
  `EndTime` varchar(10) DEFAULT NULL,
  `PrevRoom` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tablem`
--

LOCK TABLES `Tablem` WRITE;
/*!40000 ALTER TABLE `Tablem` DISABLE KEYS */;
INSERT INTO `Tablem` VALUES ('SCI421','Advanced Biology(Cellular/Molecular/Genetic)','Sat','11.30','12.55','102'),('SCI421','Advanced Biology(Cellular/Molecular/Genetic)','Thu','11.30','12.55','102'),('SCI541','Advanced Biomolecular Architecture','Sat','10.00','11.25','201'),('SCI541','Advanced Biomolecular Architecture','Wed','10.00','11.25','201'),('CSE435','Advanced Computer Networks','Mon','08.30','09.55','SH2'),('CSE435','Advanced Computer Networks','Thu','08.30','09.55','SH2'),('CSE603','Advanced Problem Solving','Fri','11.00','13.00','N104'),('CSE603','Advanced Problem Solving','Tue','11.00','13.00','N104'),('CES625','Advanced Reinforce Concrete Design','Mon','14.00','15.25','N104'),('CES625','Advanced Reinforce Concrete Design','Thu','14.00','15.25','N104'),('CEG561','Advanced Topics in Remote Sensing','Mon','14.00','15.25','104'),('CEG561','Advanced Topics in Remote Sensing','Thu','14.00','15.25','104'),('CSE545','Advances in Data Mining','Mon','14.00','15.25','201'),('CSE545','Advances in Data Mining','Thu','14.00','15.25','201'),('ICS211','Algorithms','Sat','10.00','11.25','COMMON'),('ICS211','Algorithms','Wed','10.00','11.25','COMMON'),('ICS331','Algorithms and Operating Systems','Sat','14.00','15.25','CR1'),('ICS331','Algorithms and Operating Systems','Wed','14.00','15.25','CR1'),('ECE461','Analog and Mixed Signal Design','Mon','14.00','15.25','103'),('ECE461','Analog and Mixed Signal Design','Thu','14.00','15.25','103'),('CLG611','Basic Maths I','Mon','10.00','11.25','102'),('CLG611','Basic Maths I','Thu','10.00','11.25','102'),('SCI643','Biomolecular Structure Interaction and Dynamics','Fri','08.30','09.55','103'),('SCI643','Biomolecular Structure Interaction and Dynamics','Tue','08.30','09.55','103'),('SCI644','Biomolecular Structure and Supramolecular Chemistry','Mon','10.00','11.25','201'),('SCI644','Biomolecular Structure and Supramolecular Chemistry','Thu','10.00','11.25','201'),('ECE530','Broadband Networks','Sat','11.30','12.55','CR1'),('ECE530','Broadband Networks','Wed','11.30','12.55','CR1'),('CEG421','Building Energy Simulation','Mon','10.00','11.25','103'),('CEG421','Building Energy Simulation','Thu','10.00','11.25','103'),('CES634','CASE Workshop','Mon','10.00','11.25','203'),('CES634','CASE Workshop','Thu','10.00','11.25','203'),('ECE467','CMOS Radio Frequencey Integrated Circuit Design','Sat','11.30','12.55','203'),('ECE467','CMOS Radio Frequencey Integrated Circuit Design','Wed','11.30','12.55','203'),('SCI373','CNS Lab','Thu','14.00','17.00',''),('SCI311','Chemical Basis of Everyday Phenomena','Fri','08.30','09.55','104'),('SCI311','Chemical Basis of Everyday Phenomena','Tue','08.30','09.55','104'),('HSS342','Classical Language: Sanskrit II','Sat','08.30','09.55','CR1'),('HSS342','Classical Language: Sanskrit II','Wed','08.30','09.55','CR1'),('HSS422','Classical Text Reading','Fri','11.30','12.55','201'),('HSS422','Classical Text Reading','Tue','11.30','12.55','201'),('CSE565','Cloud Computing','Sat','08.30','09.55','SH2'),('CSE565','Cloud Computing','Wed','08.30','09.55','SH2'),('ECE436','Communication Theory II','Sat','11.30','12.55','202'),('ECE436','Communication Theory II','Wed','11.30','12.55','202'),('CSE419','Compilers','Fri','08.30','09.55','SH2'),('CSE419','Compilers','Tue','08.30','09.55','SH2'),('CSE411','Complexity and Advanced Algorithms','Sat','11.30','12.55','204'),('CSE411','Complexity and Advanced Algorithms','Wed','11.30','12.55','204'),('CLG421','Computational Linguistics I','Mon','14.00','15.25','101'),('CLG421','Computational Linguistics I','Thu','14.00','15.25','101'),('CSE602','Computer Problem Solving','Fri','10.00','11.25','304'),('CSE602','Computer Problem Solving','Tue','10.00','11.25','304'),('CLG661','Computers and Scripting I','Fri','11.30','12.55','102'),('CLG661','Computers and Scripting I','Tue','11.30','12.55','102'),('HSS290','Confluence of Humanities and CS','Thu','10.00','11.30','CEHConf'),('HSS290','Confluence of Humanities and CS','Tue','10.00','11.30','CEHConf'),('CSE445','Data Warehousing and Data Mining','Sat','10.00','11.25','103'),('CSE445','Data Warehousing and Data Mining','Wed','10.00','11.25','103'),('CSE478','Digital Image Processing','Mon','14.00','15.25','102'),('CSE478','Digital Image Processing','Thu','14.00','15.25','102'),('IEC101','Digital Logic and Processors','Fri','08.30','09.30','CR2'),('IEC101','Digital Logic and Processors','Fri','09.30','10.25','SH1'),('IEC101','Digital Logic and Processors','Mon','08.30','09.30','CR2'),('IEC101','Digital Logic and Processors','Mon','09.30','10.25','SH1'),('IEC101','Digital Logic and Processors','Wed','08.30','09.30','CR2'),('IEC101','Digital Logic and Processors','Wed','09.30','10.25','SH1'),('CES442','Disaster Management','Mon','10.00','11.25','202'),('CES442','Disaster Management','Thu','10.00','11.25','202'),('CSE611','Discrete Maths and Algorithms','Mon','11.30','13.00','N104'),('CSE611','Discrete Maths and Algorithms','Thu','11.30','13.00','N104'),('CSE592','Ecological and Geospatial Modeling','Fri','08.30','09.55','202'),('CSE592','Ecological and Geospatial Modeling','Tue','08.30','09.55','202'),('HSS360','Economics and Organizations','Thu','08.30','09.55','B6309'),('HSS360','Economics and Organizations','Tue','08.30','09.55','B6309'),('ECE260','Electrical Science II','Fri','14.00','15.25','101'),('ECE260','Electrical Science II','Tue','14.00','15.25','101'),('IEC102','Electrical Science I','Thu','08.30','09.25','CR2'),('IEC102','Electrical Science I','Thu','09.30','10.25','SH1'),('IEC102','Electrical Science I','Tue','08.30','09.25','CR2'),('IEC102','Electrical Science I','Tue','09.30','10.25','SH1'),('ECE381','Electromagnetic Theory and Applications','Mon','10.00','11.25','B6309'),('ECE381','Electromagnetic Theory and Applications','Thu','10.00','11.25','B6309'),('ECE661','Embedded Systems','Fri','14.00','15.25','103'),('ECE661','Embedded Systems','Tue','14.00','15.25','103'),('IHS101','English I','Sat','11.30','12.55','B4301'),('IHS101','English I','Wed','11.30','12.55','B4301'),('CLG513','Event and Time in Discourse','Mon','08.30','09.55','B4301'),('CLG513','Event and Time in Discourse','Thu','08.30','09.55','B4301'),('CEG631','Foundation Engineering and Design','Mon','11.30','12.55','201'),('CEG631','Foundation Engineering and Design','Thu','11.30','12.55','201'),('SCI101','General Physics','Thu','10.00','11.25','B4304'),('SCI101','General Physics','Tue','10.00','11.25','B4304'),('IHS103','Human Values I','Sat','08.30','09.55','1021042012'),('IHS103','Human Values I','Tue','15.30','17.00',''),('IHS105','Humanities Skills I','Sat','11.30','12.55','N305N303N3'),('IHS105','Humanities Skills I','Wed','11.30','12.55',''),('HSS346','Imagined Futures: Readings in Science Fiction','Fri','11.30','12.55','B6309'),('HSS346','Imagined Futures: Readings in Science Fiction','Tue','11.30','12.55','B6309'),('ECE539','Information Theory and Coding','Fri','14.00','15.25','201'),('ECE539','Information Theory and Coding','Tue','14.00','15.25','201'),('HSS352','Innovation and Technology Management','Fri','11.30','12.55','103'),('HSS352','Innovation and Technology Management','Tue','11.30','12.55','103'),('HSS332','Installation as a Form of Art','Fri','14.00','15.25','203'),('HSS332','Installation as a Form of Art','Tue','14.00','15.25','203'),('CSE485','Intro to Cognitive Science','Sat','11.30','12.55','104'),('CSE485','Intro to Cognitive Science','Wed','11.30','12.55','104'),('SCI462','Intro to Quantum Field Theory','Fri','08.30','09.55','201'),('SCI462','Intro to Quantum Field Theory','Tue','08.30','09.55','201'),('CLG211','Introduction to Linguistics','Thu','10.00','11.25','B4301'),('CLG211','Introduction to Linguistics','Tue','10.00','11.25','B4301'),('CSE463','Introduction to Middleware Systems','Sat','10.00','11.25','N104'),('CSE463','Introduction to Middleware Systems','Wed','10.00','11.25','N104'),('ECE451','Linear Control Systems','Mon','08.30','09.55','102'),('ECE451','Linear Control Systems','Thu','08.30','09.55','102'),('ECE205','Linear Electronic Circuits','Mon','10.00','11.25','101'),('ECE205','Linear Electronic Circuits','Thu','10.00','11.25','101'),('CLG451','Linguistic Data : Collection and Analysis','Fri','10.00','11.25','B6309'),('CLG451','Linguistic Data : Collection and Analysis','Tue','10.00','11.25','B6309'),('CLG411','Linguistics 1: Language Typology and Universals','Mon','11.30','12.55','B4301'),('CLG411','Linguistics 1: Language Typology and Universals','Thu','11.30','12.55','B4301'),('CSE577','Machine Learning','Mon','08.30','09.55','201'),('CSE577','Machine Learning','Thu','08.30','09.55','201'),('IMA403','Mathematical Analysis','Sat','10.00','11.25','101'),('IMA403','Mathematical Analysis','Wed','10.00','11.25','101'),('IMA101','Mathematics I','Fri','08.30','09.25','SH1'),('IMA101','Mathematics I','Fri','09.30','10.25','CR2'),('IMA101','Mathematics I','Mon','08.30','09.25','SH1'),('IMA101','Mathematics I','Mon','09.30','10.25','CR2'),('IMA101','Mathematics I','Wed','08.30','09.25','SH1'),('IMA101','Mathematics I','Wed','09.30','10.25','CR2'),('IMA201','Mathematics III','Sat','11.30','12.55','SH2'),('SCI550','Maths and Statistics','Fri','11.30','12.55','101'),('SCI550','Maths and Statistics','Tue','11.30','12.55','101'),('CSE483','Mobile Robotics','Fri','14.00','15.25','202'),('CSE483','Mobile Robotics','Tue','14.00','15.25','202'),('CSE504','Modern Computer Architecture','Sat','10.00','11.25','102'),('CSE504','Modern Computer Architecture','Wed','10.00','11.25','102'),('SCI422','Molecular Biology','Mon','11.30','12.55','202'),('SCI422','Molecular Biology','Thu','11.30','12.55','202'),('CSE472','Natural Language Processing','Mon','08.30','09.55','CR1'),('CSE472','Natural Language Processing','Thu','08.30','09.55','CR1'),('HSS354','Non-Violence','Sat','14.00','15.25','201'),('HSS354','Non-Violence','Wed','14.00','15.25','201'),('IMA404','Number Theory and Cryptology','Mon','10.00','11.25','104'),('IMA404','Number Theory and Cryptology','Thu','10.00','11.25','104'),('HSS310','Ontology','Mon','10.00','11.25','CR1'),('HSS310','Ontology','Thu','10.00','11.25','CR1'),('ICS231','Operating Systems','Mon','10.00','11.25','SH2'),('ICS231','Operating Systems','Thu','10.00','11.25','SH2'),('CSE531','Operating Systems (PG)','Mon','08.30','09.55','N104'),('CSE531','Operating Systems (PG)','Thu','08.30','09.55','N104'),('IMA406','Operations Research','Fri','08.30','09.55','102'),('IMA406','Operations Research','Tue','08.30','09.55','102'),('SCI635','\"Optics, Symmetry and Spectroscopy\"','Fri','14.00','15.25','102'),('SCI635','\"Optics, Symmetry and Spectroscopy\"','Tue','14.00','15.25','102'),('CSE502','Parallel Programming','Fri','10.00','11.25','CR1'),('CSE502','Parallel Programming','Tue','10.00','11.25','CR1'),('CLG413','Phonetics and Phonology','Sat','11.30','12.55','201'),('CLG413','Phonetics and Phonology','Wed','11.30','12.55','201'),('HSS362','Political and Economic Thought for Human Society','Sat','14.00','15.25','102'),('HSS362','Political and Economic Thought for Human Society','Wed','14.00','15.25','102'),('CSE415','Principles of Programming Languages','Mon','11.30','12.55','SH1'),('CSE415','Principles of Programming Languages','Thu','11.30','12.55','SH1'),('ECE230','Probability & Random Processes','Sat','11.30','12.55','101'),('ECE230','Probability & Random Processes','Wed','11.30','12.55','101'),('SCI463','Quantuam Information and Computing','Sat','10.00','11.25','104'),('SCI463','Quantuam Information and Computing','Wed','10.00','11.25','104'),('CSE991','Research Methodology','Sat','08.30','09.55','N104'),('CSE991','Research Methodology','Wed','08.30','09.55','N104'),('CSE540','Research in Information Security','Mon','11.30','12.55','103'),('CSE540','Research in Information Security','Thu','11.30','12.55','103'),('ICS261','SSAD & Project','Mon','11.30','12.55','SH2'),('ICS261','SSAD & Project','Thu','11.30','12.55','SH2'),('ISC201','Science I','Fri','11.30','12.55','SH2'),('SCI371','Science Lab 1','Mon','14.00','17.00',''),('CES641','Seismic Eva and Strengthening of Buildings','Fri','08.30','09.55','101'),('CES641','Seismic Eva and Strengthening of Buildings','Tue','08.30','09.55','101'),('HSS240','Sense of Past','Thu','08.30','10.00','C1302'),('HSS240','Sense of Past','Tue','08.30','10.00','C1302'),('ECE241','Signals and Systems','Mon','11.30','12.55','101'),('ECE241','Signals and Systems','Thu','11.30','12.55','101'),('CSE861','Software Quality Engineering','Mon','14.00','15.25','202'),('CSE861','Software Quality Engineering','Thu','14.00','15.25','202'),('CEG628','Soil Dynamics and Machine Foundations','Fri','10.00','11.25','102'),('CEG628','Soil Dynamics and Machine Foundations','Tue','10.00','11.25','102'),('HSS401','Space Time in Arts and Humanities','Sat','14.00','15.25','101'),('HSS401','Space Time in Arts and Humanities','Wed','14.00','15.25','101'),('CSE591','Spatial Informatics','Mon','08.30','09.55','202'),('CSE591','Spatial Informatics','Thu','08.30','09.55','202'),('ECE448','Speech Signal Processing','Mon','08.30','09.55','101'),('ECE448','Speech Signal Processing','Thu','08.30','09.55','101'),('ECE446','Speech Systems','Fri','10.00','11.25','103'),('ECE446','Speech Systems','Tue','10.00','11.25','103'),('CSE471','Statistical Methods in AI','Fri','10.00','11.25','N104'),('CSE471','Statistical Methods in AI','Tue','10.00','11.25','N104'),('CES631','Structural Dynamics','Mon','08.30','09.55','301'),('CES631','Structural Dynamics','Thu','08.30','09.55','301'),('HSS462','Studies in Alternative Development','Fri','11.30','12.55','104'),('HSS462','Studies in Alternative Development','Tue','11.30','12.55','104'),('ECE442','Time Frequency Analysis','Sat','08.30','09.55','101'),('ECE442','Time Frequency Analysis','Wed','08.30','09.55','101'),('ECE561','VLSI Algorithms','Fri','14.00','15.25','104'),('ECE561','VLSI Algorithms','Tue','14.00','15.25','104'),('CEA611','','Tue','14.00','15.25','N104'),('CEA611','','Fri','14.00','15.25','N104'),('CEA611','','Mon','00.00','00.00','N104'),('ICS101','Computer Programming','Fri','10.30','11.25','SH1'),('ICS101','Computer Programming','Fri','12.00','13.00','CR2'),('ICS101','Computer Programming','Mon','10.30','11.25','SH1'),('ICS101','Computer Programming','Mon','12.00','12.25','CR2'),('ICS101','Computer Programming','Thu','10.30','11.25','SH1'),('ICS101','Computer Programming','Thu','12.00','13.00','CR2'),('ICS101','Computer Programming','Tue','10.30','11.25','SH1'),('ICS101','Computer Programming','Tue','12.00','13.00','CR2'),('ICS102','IT Workshop I','Fri','10.30','11.25','SH1'),('ICS102','IT Workshop I','Fri','12.00','13.00','CR2'),('ICS102','IT Workshop I','Mon','10.30','11.25','SH1'),('ICS102','IT Workshop I','Mon','12.00','13.00','CR2'),('ICS102','IT Workshop I','Thu','10.30','11.25','SH1'),('ICS102','IT Workshop I','Thu','12.00','13.00','CR2'),('ICS102','IT Workshop I','Tue','10.30','11.25','SH1'),('ICS102','IT Workshop I','Tue','12.00','13.00','CR2'),('CEA611','Theory of Elasticity','Fri','14.00','15.25','N104'),('CEA611','Theory of Elasticity','Tue','14.00','15.25','N104'),('CSE505','Scripting and Computer Environments','Fri','14.00','15.25','305'),('CSE505','Scripting and Computer Environments','Tue','14.00','15.25','305'),('ECE225','Embedded Hardware Design','Fri','10.00','11.25','101'),('ECE225','Embedded Hardware Design','Tue','10.00','11.25','101'),('ICS241','Introduction to Databases','Fri','10.00','11.25','COMMON'),('ICS241','Introduction to Databases','Tue','10.00','11.25','COMMON'),('IMA201','Mathematics III','Tue','11.30','12.55','SH2'),('ISC201','Science I','Tue','11.30','12.55','SH2');
/*!40000 ALTER TABLE `Tablem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tableme`
--

DROP TABLE IF EXISTS `Tableme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tableme` (
  `Code` varchar(10) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tableme`
--

LOCK TABLES `Tableme` WRITE;
/*!40000 ALTER TABLE `Tableme` DISABLE KEYS */;
INSERT INTO `Tableme` VALUES ('ISC202','Science II','UG3'),('ICS211','Algorithms ','UG2'),('CSE371','Artificial Intelligence ','UG2'),('ECE335','Communication Theory I','UG2'),('ICS251','Computer Networks','UG2'),('IEC239','Digital Signal Analysis and Applications','UG2'),('ECE341','Digital Signal Processing ','UG2'),('ECE260','Electrical Science II','UG2'),('ECE291','Electronics Workshop II ','UG2'),('ECE225','Embedded Hardware Design','UG2'),('IEG201','Engineering Systems','UG2'),('CSE311','Formal Methods ','UG2'),('CSE251','Graphics ','UG2'),('IHS107','Human Values II','UG2'),('IHS201','Humanities ','UG2'),('ECE361','Intro to VLSI','UG2'),('ICS241','Introduction to Databases','UG2'),('ECE205','Linear Electronic Circuits','UG2'),('ICS231','Operating Systems ','UG2'),('ECE230','Probability & Random Processes','UG2'),('ISC201','Science I','UG2'),('ECE241','Signals and Systems','UG2'),('ICS261','SSAD & Project','UG2'),('H9991','Art and Craft','UG1'),('H9997','Art and Medium','UG1'),('IEC103','Basic Electronic Circuits','UG1'),('ICS101','Computer Programming ','UG1'),('ICS104','Computer System Organization','UG1'),('H9993','Creative Movement ','UG1'),('ICS103','Data Structures ','UG1'),('IEC101','Digital Logic and Processors','UG1'),('IEC102','Electrical Science I','UG1'),('IEC104','Electronics Workshop I','UG1'),('IHS101','English I','UG1'),('IHS102','English II','UG1'),('IHS103','Human Values I','UG1'),('ICS102','IT Workshop I','UG1'),('ICS105','IT Workshop II','UG1'),('IMA101','Mathematics I','UG1'),('IMA102','Mathematics II','UG1'),('H9992','Painting and Folk Art','UG1'),('H9996','Photography and Film','UG1'),('H9995','Site and Art','UG1'),('CSE603','Advanced Problem Solving ','PG1'),('CSE611','Discrete Maths and Algorithms','PG1'),('CSE531','Operating Systems (PG)','PG1'),('CSE505','Scripting and Computer Environments','PG1'),('CEA611','Theory of Elasticity','PG1'),('IMA201','Mathematics III','UG2'),('CSE435','Advanced Computer Networks','BC'),('CSE419','Compilers ','BC'),('CSE411','Complexity and Advanced Algorithms','BC'),('CSE441','Database Systems ','BC'),('CSE431','Distributed Systems','BC'),('CSE481','Optimization Methods','BC'),('CSE415','Principles of Programming Languages ','BC'),('CSE461','Software Engineering','BC'),('CSE471','Statistical Methods in AI','BC'),('CSE662','A Systems View of Business','Elective'),('ECE441','Adaptive Signal Processing ','Elective'),('CEA711','Adv. Mechanics of Materials','Elective'),('SCI652','Advanced Bioinformatics ','Elective'),('SCI421','Advanced Biology(Cellular/Molecular/Genetic)','Elective'),('SCI541','Advanced Biomolecular Architecture','Elective'),('CSE519','Advanced Compilers','Elective'),('CES625','Advanced Reinforce Concrete Design','Elective'),('CSE561','Advanced Software Engineering','Elective'),('CES626','Advanced Steel Design','Elective'),('CES611','Advanced Structural Analysis','Elective'),('HSS601','Advanced Topics in Humanities','Elective'),('CEG561','Advanced Topics in Remote Sensing','Elective'),('CSE545','Advances in Data Mining','Elective'),('CSE541','Advances in Database Systems','Elective'),('HSS330','Aesthetics Narrative and Design','Elective'),('AGR588','Agricultural Marketing','Elective'),('CEG411','Agricultural Production Economics','Elective'),('ICS331','Algorithms and Operating Systems','Elective'),('SCI461','Algorithms used in Scientific Simulations','Elective'),('ECE461','Analog and Mixed Signal Design','Elective'),('AGR587','Applied Agricultural Workshop II','Elective'),('AGR583','Applied Agriculture (eSagu) Workshop - I','Elective'),('AGR585','Applied Crop Producation Technology II','Elective'),('AGR581','Applied Crop Production Technology I','Elective'),('AGR582','Applied Crop Protection Technology I','Elective'),('AGR586','Applied Crop Protection Technology II','Elective'),('CLG611','Basic Maths I','Elective'),('SCI650','Bioinformatics Resources','Elective'),('SCI644','Biomolecular Structure and Supramolecular Chemistry','Elective'),('SCI643','Biomolecular Structure Interaction and Dynamics ','Elective'),('ECE530','Broadband Networks','Elective'),('CEG421','Building Energy Simulation','Elective'),('CES634','CASE Workshop','Elective'),('SCI311','Chemical Basis of Everyday Phenomena','Elective'),('SCI431','Classical and Quantum Mechanics-I','Elective'),('HSS341','Classical Language: Sanskrit I','Elective'),('HSS342','Classical Language: Sanskrit II','Elective'),('SCI342','Classical Mechanics','Elective'),('HSS422','Classical Text Reading','Elective'),('CSE565','Cloud Computing','Elective'),('ECE467','CMOS Radio Frequencey Integrated Circuit Design','Elective'),('SCI373','CNS Lab','Elective'),('CSE586','Cognitive Neuroscience','Elective'),('ECE337','Communication Networks ','Elective'),('ECE436','Communication Theory II','Elective'),('SCI762','Complex Systems: Dynamics','Elective'),('CSE518','Computational Geometry','Elective'),('CLG421','Computational Linguistics I','Elective'),('CLG422','Computational Linguistics II','Elective'),('BIO483','Computational Structural Biology','Elective'),('CES711','Computer Analysis and Structural Systems','Elective'),('CSE602','Computer Problem Solving','Elective'),('CLG661','Computers and Scripting I','Elective'),('CES651','Concrete Engineering','Elective'),('CSE503','Concurrent Data Structures','Elective'),('HSS290','Confluence of Humanities and CS','Elective'),('HSS355','Corporate Strategy','Elective'),('HSS432','Creative Writing','Elective'),('HSS344','Creative Writing and Literary Appreciation in Hindi','Elective'),('HSS433','Creative Writing:Poetry from the Outside In','Elective'),('CSE445','Data Warehousing and Data Mining ','Elective'),('HSS414','Debates on Truth across Philosophical Traditions','Elective'),('SCI861','Density Functional Theory in Molecular Physics','Elective'),('HSS363','Dharma Polity and Constitution of India','Elective'),('CSE478','Digital Image Processing ','Elective'),('ECE463','Digital System Design','Elective'),('CES442','Disaster Management','Elective'),('CSE612','\"Dynamic, Concurrent Functional Language\"','Elective'),('CES441','Earthquake Engineering and Disaster Management','Elective'),('CSE592','Ecological and Geospatial Modeling','Elective'),('HSS360','Economics and Organizations','Elective'),('HSS353','Education & Self','Elective'),('CSE566','e-Governance','Elective'),('ECE381','Electromagnetic Theory and Applications','Elective'),('ECE559','Embedded Robotics II','Elective'),('ECE661','Embedded Systems','Elective'),('SCI481','Environmental Science','Elective'),('HSS322','Epistemology in Indian Philosophy','Elective'),('CLG513','Event and Time in Discourse','Elective'),('AGR584','Farm Management','Elective'),('HSS431','\"Form, Arts and Aesthetics\"','Elective'),('HSS411','Formal Approaches of Indian and Greek thought','Elective'),('CEG631','Foundation Engineering and Design','Elective'),('HSS348','Gandhi and India','Elective'),('HSS461','Gandhian Thought','Elective'),('SCI341','General and Structural Chemistry','Elective'),('SCI101','General Physics','Elective'),('HSS415','Generative Ontology','Elective'),('HSS416','Greek Thought','Elective'),('CEG422','Green Buildings','Elective'),('HSS300','History of Ideas','Elective'),('CSE564','Human Computer Interaction','Elective'),('HSS343','Human Condition and Mahabharata','Elective'),('HSS361','Human Rights','Elective'),('ICS291','ICTs in Agriculture','Elective'),('HSS402','Images of Science','Elective'),('HSS346','Imagined Futures: Readings in Science Fiction','Elective'),('HSS323','Indian Thoughts on Cognition and Communication','Elective'),('CLG542','Information Dynamics in Language & Machine Translation','Elective'),('CSE539','Information Security: Research and Mgmt','Elective'),('ECE539','Information Theory and Coding','Elective'),('HSS352','Innovation and Technology Management','Elective'),('HSS332','Installation as a Form of Art','Elective'),('HSS451','Intelligence: A Technology of Mind','Elective'),('CSE563','Internals of Application Servers','Elective'),('SCI551','Intro to Bioinformatics','Elective'),('SCI320','Intro to Biology','Elective'),('CSE485','Intro to Cognitive Science','Elective'),('SCI462','Intro to Quantum Field Theory','Elective'),('ECE452','Intro to Robotics: Mechanics and Control','Elective'),('CSE601','Introduction to Computer Systems and Technologies','Elective'),('CLG211','Introduction to Linguistics','Elective'),('CSE463','Introduction to Middleware Systems','Elective'),('SCI765','Introduction to Systems Biology','Elective'),('HSS324','Introduction to Vedic Darshan','Elective'),('SCI370','Learning Science by doing: A Lab-based Approach','Elective'),('ECE451','Linear Control Systems ','Elective'),('CLG451','Linguistic Data : Collection and Analysis','Elective'),('CLG411','Linguistics 1: Language Typology and Universals','Elective'),('CSE577','Machine Learning ','Elective'),('IMA403','Mathematical Analysis','Elective'),('SCI550','Maths and Statistics','Elective'),('HSS312','\"Meaning: Cognition ,Language and Ontology\"','Elective'),('HSS313','Minds and Machines','Elective'),('CSE536','Mobile Information Systems','Elective'),('CSE483','Mobile Robotics ','Elective'),('SCI433','Modelling and Simulations','Elective'),('CSE504','Modern Computer Architecture','Elective'),('SCI422','Molecular Biology','Elective'),('CSE482','Multi Agent Systems ','Elective'),('CSE473','Multiple Text Processing','Elective'),('CSE573','Natural Language Application','Elective'),('CSE472','Natural Language Processing ','Elective'),('ECE434','Network Theory','Elective'),('HSS354','Non-Violence','Elective'),('IMA404','Number Theory and Cryptology','Elective'),('IMA401','Numerical Analysis - I','Elective'),('IMA402','Numerical Analysis - II','Elective'),('HSS321','Ontologies in Indian Philosophy','Elective'),('HSS310','Ontology','Elective'),('HSS412','Ontology of Language','Elective'),('HSS333','\"Ontology of Re-Creation Sports, Stories and Movies\"','Elective'),('IMA406','Operations Research','Elective'),('SCI635','\"Optics, Symmetry and Spectroscopy\"','Elective'),('SCI344','Organic Chemistry and BMSID','Elective'),('CSE502','Parallel Programming','Elective'),('HSS364','\"Partitioned Politics, Fragmented Nation\"','Elective'),('CSE663','Performance Modeling of Software Systems','Elective'),('HSS314','Phenomenology of Perception','Elective'),('HSS311','Philosophy of Mind','Elective'),('CLG413','Phonetics and Phonology','Elective'),('ECE566','Photonics','Elective'),('HSS362','Political and Economic Thought for Human Society','Elective'),('CEG511','Principles and Practices of Organic Forming','Elective'),('SCI419','Principles and Techniques of Instrumental Analysis','Elective'),('SCI719','Principles and Techniques of Instrumental Analysis','Elective'),('CSE418','Principles of Information Security','Elective'),('CEG441','Process Engineering','Elective'),('CSE568','Product Design and Engineering','Elective'),('SCI463','Quantum Information and Computing','Elective'),('SCI432','Quantum Mechanics II ','Elective'),('ECE535','Radar Systems','Elective'),('SCI753','Reading in Molecular Docking','Elective'),('CEG461','Remote Sensing','Elective'),('CSE540','Research in Information Security','Elective'),('CSE991','Research Methodology','Elective'),('SCI371','Science Lab 1','Elective'),('SCI372','Science Lab II','Elective'),('ICS141','\"SDLC, Database Application Development and Project Mgmt\"','Elective'),('HSS351','Search for a Humane Society','Elective'),('CES641','Seismic Eva and Strengthening of Buildings','Elective'),('HSS413','Seminar Course on Exactitude','Elective'),('HSS240','Sense of Past','Elective'),('HSS357','Social and Technical Innovation','Elective'),('HSS260','Society and Development ','Elective'),('CSE562','Software Platforms','Elective'),('CSE861','Software Quality Engineering','Elective'),('CEG628','Soil Dynamics and Machine Foundations','Elective'),('HSS401','Space Time in Arts and Humanities','Elective'),('CSE591','Spatial Informatics ','Elective'),('ECE448','Speech Signal Processing','Elective'),('ECE446','Speech Systems ','Elective'),('CSE682','Spoken Language Interface','Elective'),('SCI435','Statistical Mechanics','Elective'),('CES631','Structural Dynamics','Elective'),('HSS462','Studies in Alternative Development','Elective'),('SCI754','Symmetry and Unification of Forces','Elective'),('CSE587','System and Resource Virtualization','Elective'),('HSS553','Technology in the Service of Society','Elective'),('HSS200','\"Theoretical Humanities and Formalisms, Digital Humanities\"','Elective'),('SCI752','Theoretical Physics','Elective'),('HSS334','Theories of Arts and Aesthetics','Elective'),('HSS301','\"Theory of Society, History and Justice\"','Elective'),('SCI111','Thermodynamics and Kinetics','Elective'),('ECE442','Time Frequency Analysis ','Elective'),('CSE913','Topics in Computational Geometry','Elective'),('ECE564','Topics in Embedded Systems','Elective'),('CSE964','Topics in HCI','Elective'),('CSE846','Topics in Information Access','Elective'),('SCI761','Topics in Nanosciences','Elective'),('HSS417','Topics in Ontology','Elective'),('CSE912','Topics in Parallel Processing','Elective'),('SCI831','Topics in Physical Chemistry','Elective'),('SCI751','Topics in Physics','Elective'),('CSE911','Topics in Programming Languages','Elective'),('CSE962','Topics in Software Engineering','Elective'),('ECE531','Topics in Wireless Communications','Elective'),('ECE534','Topics in Wireless Security','Elective'),('IMA405','UG Topics in Mathematics','Elective'),('HSS347','Understanding Human Society and Cultural Variations','Elective'),('ECE561','VLSI Algorithms','Elective'),('ECE465','VLSI Architectures','Elective'),('HSS345','Yogavasishtam:A Philosophical Poem','Elective'),('CEG421','','Elective'),('CEG421','','Elective'),('CEG421','','Elective'),('ISC202','Science II','UG3'),('ICS211','Algorithms ','UG2'),('CSE371','Artificial Intelligence ','UG2'),('ECE335','Communication Theory I','UG2'),('ICS251','Computer Networks','UG2'),('IEC239','Digital Signal Analysis and Applications','UG2'),('ECE341','Digital Signal Processing ','UG2'),('ECE260','Electrical Science II','UG2'),('ECE291','Electronics Workshop II ','UG2'),('ECE225','Embedded Hardware Design','UG2'),('IEG201','Engineering Systems','UG2'),('CSE311','Formal Methods ','UG2'),('CSE251','Graphics ','UG2'),('IHS107','Human Values II','UG2'),('IHS201','Humanities ','UG2'),('ECE361','Intro to VLSI','UG2'),('ICS241','Introduction to Databases','UG2'),('ECE205','Linear Electronic Circuits','UG2'),('ICS231','Operating Systems ','UG2'),('ECE230','Probability & Random Processes','UG2'),('ISC201','Science I','UG2'),('ECE241','Signals and Systems','UG2'),('ICS261','SSAD & Project','UG2'),('H9991','Art and Craft','UG1'),('H9997','Art and Medium','UG1'),('IEC103','Basic Electronic Circuits','UG1'),('ICS101','Computer Programming ','UG1'),('ICS104','Computer System Organization','UG1'),('H9993','Creative Movement ','UG1'),('ICS103','Data Structures ','UG1'),('IEC101','Digital Logic and Processors','UG1'),('IEC102','Electrical Science I','UG1'),('IEC104','Electronics Workshop I','UG1'),('IHS101','English I','UG1'),('IHS102','English II','UG1'),('IHS103','Human Values I','UG1'),('ICS102','IT Workshop I','UG1'),('ICS105','IT Workshop II','UG1'),('IMA101','Mathematics I','UG1'),('IMA102','Mathematics II','UG1'),('H9992','Painting and Folk Art','UG1'),('H9996','Photography and Film','UG1'),('H9995','Site and Art','UG1'),('CSE603','Advanced Problem Solving ','PG1'),('CSE611','Discrete Maths and Algorithms','PG1'),('CSE531','Operating Systems (PG)','PG1'),('CSE505','Scripting and Computer Environments','PG1'),('CEA611','Theory of Elasticity','PG1'),('IMA201','Mathematics III','UG2'),('CSE435','Advanced Computer Networks','BC'),('CSE419','Compilers ','BC'),('CSE411','Complexity and Advanced Algorithms','BC'),('CSE441','Database Systems ','BC'),('CSE431','Distributed Systems','BC'),('CSE481','Optimization Methods','BC'),('CSE415','Principles of Programming Languages ','BC'),('CSE461','Software Engineering','BC'),('CSE471','Statistical Methods in AI','BC'),('CSE662','A Systems View of Business','Elective'),('ECE441','Adaptive Signal Processing ','Elective'),('CEA711','Adv. Mechanics of Materials','Elective'),('SCI652','Advanced Bioinformatics ','Elective'),('SCI421','Advanced Biology(Cellular/Molecular/Genetic)','Elective'),('SCI541','Advanced Biomolecular Architecture','Elective'),('CSE519','Advanced Compilers','Elective'),('CES625','Advanced Reinforce Concrete Design','Elective'),('CSE561','Advanced Software Engineering','Elective'),('CES626','Advanced Steel Design','Elective'),('CES611','Advanced Structural Analysis','Elective'),('HSS601','Advanced Topics in Humanities','Elective'),('CEG561','Advanced Topics in Remote Sensing','Elective'),('CSE545','Advances in Data Mining','Elective'),('CSE541','Advances in Database Systems','Elective'),('HSS330','Aesthetics Narrative and Design','Elective'),('AGR588','Agricultural Marketing','Elective'),('CEG411','Agricultural Production Economics','Elective'),('ICS331','Algorithms and Operating Systems','Elective'),('SCI461','Algorithms used in Scientific Simulations','Elective'),('ECE461','Analog and Mixed Signal Design','Elective'),('AGR587','Applied Agricultural Workshop II','Elective'),('AGR583','Applied Agriculture (eSagu) Workshop - I','Elective'),('AGR585','Applied Crop Producation Technology II','Elective'),('AGR581','Applied Crop Production Technology I','Elective'),('AGR582','Applied Crop Protection Technology I','Elective'),('AGR586','Applied Crop Protection Technology II','Elective'),('CLG611','Basic Maths I','Elective'),('SCI650','Bioinformatics Resources','Elective'),('SCI644','Biomolecular Structure and Supramolecular Chemistry','Elective'),('SCI643','Biomolecular Structure Interaction and Dynamics ','Elective'),('ECE530','Broadband Networks','Elective'),('CEG421','Building Energy Simulation','Elective'),('CES634','CASE Workshop','Elective'),('SCI311','Chemical Basis of Everyday Phenomena','Elective'),('SCI431','Classical and Quantum Mechanics-I','Elective'),('HSS341','Classical Language: Sanskrit I','Elective'),('HSS342','Classical Language: Sanskrit II','Elective'),('SCI342','Classical Mechanics','Elective'),('HSS422','Classical Text Reading','Elective'),('CSE565','Cloud Computing','Elective'),('ECE467','CMOS Radio Frequencey Integrated Circuit Design','Elective'),('SCI373','CNS Lab','Elective'),('CSE586','Cognitive Neuroscience','Elective'),('ECE337','Communication Networks ','Elective'),('ECE436','Communication Theory II','Elective'),('SCI762','Complex Systems: Dynamics','Elective'),('CSE518','Computational Geometry','Elective'),('CLG421','Computational Linguistics I','Elective'),('CLG422','Computational Linguistics II','Elective'),('BIO483','Computational Structural Biology','Elective'),('CES711','Computer Analysis and Structural Systems','Elective'),('CSE602','Computer Problem Solving','Elective'),('CLG661','Computers and Scripting I','Elective'),('CES651','Concrete Engineering','Elective'),('CSE503','Concurrent Data Structures','Elective'),('HSS290','Confluence of Humanities and CS','Elective'),('HSS355','Corporate Strategy','Elective'),('HSS432','Creative Writing','Elective'),('HSS344','Creative Writing and Literary Appreciation in Hindi','Elective'),('HSS433','Creative Writing:Poetry from the Outside In','Elective'),('CSE445','Data Warehousing and Data Mining ','Elective'),('HSS414','Debates on Truth across Philosophical Traditions','Elective'),('SCI861','Density Functional Theory in Molecular Physics','Elective'),('HSS363','Dharma Polity and Constitution of India','Elective'),('CSE478','Digital Image Processing ','Elective'),('ECE463','Digital System Design','Elective'),('CES442','Disaster Management','Elective'),('CSE612','\"Dynamic, Concurrent Functional Language\"','Elective'),('CES441','Earthquake Engineering and Disaster Management','Elective'),('CSE592','Ecological and Geospatial Modeling','Elective'),('HSS360','Economics and Organizations','Elective'),('HSS353','Education & Self','Elective'),('CSE566','e-Governance','Elective'),('ECE381','Electromagnetic Theory and Applications','Elective'),('ECE559','Embedded Robotics II','Elective'),('ECE661','Embedded Systems','Elective'),('SCI481','Environmental Science','Elective'),('HSS322','Epistemology in Indian Philosophy','Elective'),('CLG513','Event and Time in Discourse','Elective'),('AGR584','Farm Management','Elective'),('HSS431','\"Form, Arts and Aesthetics\"','Elective'),('HSS411','Formal Approaches of Indian and Greek thought','Elective'),('CEG631','Foundation Engineering and Design','Elective'),('HSS348','Gandhi and India','Elective'),('HSS461','Gandhian Thought','Elective'),('SCI341','General and Structural Chemistry','Elective'),('SCI101','General Physics','Elective'),('HSS415','Generative Ontology','Elective'),('HSS416','Greek Thought','Elective'),('CEG422','Green Buildings','Elective'),('HSS300','History of Ideas','Elective'),('CSE564','Human Computer Interaction','Elective'),('HSS343','Human Condition and Mahabharata','Elective'),('HSS361','Human Rights','Elective'),('ICS291','ICTs in Agriculture','Elective'),('HSS402','Images of Science','Elective'),('HSS346','Imagined Futures: Readings in Science Fiction','Elective'),('HSS323','Indian Thoughts on Cognition and Communication','Elective'),('CLG542','Information Dynamics in Language & Machine Translation','Elective'),('CSE539','Information Security: Research and Mgmt','Elective'),('ECE539','Information Theory and Coding','Elective'),('HSS352','Innovation and Technology Management','Elective'),('HSS332','Installation as a Form of Art','Elective'),('HSS451','Intelligence: A Technology of Mind','Elective'),('CSE563','Internals of Application Servers','Elective'),('SCI551','Intro to Bioinformatics','Elective'),('SCI320','Intro to Biology','Elective'),('CSE485','Intro to Cognitive Science','Elective'),('SCI462','Intro to Quantum Field Theory','Elective'),('ECE452','Intro to Robotics: Mechanics and Control','Elective'),('CSE601','Introduction to Computer Systems and Technologies','Elective'),('CLG211','Introduction to Linguistics','Elective'),('CSE463','Introduction to Middleware Systems','Elective'),('SCI765','Introduction to Systems Biology','Elective'),('HSS324','Introduction to Vedic Darshan','Elective'),('SCI370','Learning Science by doing: A Lab-based Approach','Elective'),('ECE451','Linear Control Systems ','Elective'),('CLG451','Linguistic Data : Collection and Analysis','Elective'),('CLG411','Linguistics 1: Language Typology and Universals','Elective'),('CSE577','Machine Learning ','Elective'),('IMA403','Mathematical Analysis','Elective'),('SCI550','Maths and Statistics','Elective'),('HSS312','\"Meaning: Cognition ,Language and Ontology\"','Elective'),('HSS313','Minds and Machines','Elective'),('CSE536','Mobile Information Systems','Elective'),('CSE483','Mobile Robotics ','Elective'),('SCI433','Modelling and Simulations','Elective'),('CSE504','Modern Computer Architecture','Elective'),('SCI422','Molecular Biology','Elective'),('CSE482','Multi Agent Systems ','Elective'),('CSE473','Multiple Text Processing','Elective'),('CSE573','Natural Language Application','Elective'),('CSE472','Natural Language Processing ','Elective'),('ECE434','Network Theory','Elective'),('HSS354','Non-Violence','Elective'),('IMA404','Number Theory and Cryptology','Elective'),('IMA401','Numerical Analysis - I','Elective'),('IMA402','Numerical Analysis - II','Elective'),('HSS321','Ontologies in Indian Philosophy','Elective'),('HSS310','Ontology','Elective'),('HSS412','Ontology of Language','Elective'),('HSS333','\"Ontology of Re-Creation Sports, Stories and Movies\"','Elective'),('IMA406','Operations Research','Elective'),('SCI635','\"Optics, Symmetry and Spectroscopy\"','Elective'),('SCI344','Organic Chemistry and BMSID','Elective'),('CSE502','Parallel Programming','Elective'),('HSS364','\"Partitioned Politics, Fragmented Nation\"','Elective'),('CSE663','Performance Modeling of Software Systems','Elective'),('HSS314','Phenomenology of Perception','Elective'),('HSS311','Philosophy of Mind','Elective'),('CLG413','Phonetics and Phonology','Elective'),('ECE566','Photonics','Elective'),('HSS362','Political and Economic Thought for Human Society','Elective'),('CEG511','Principles and Practices of Organic Forming','Elective'),('SCI419','Principles and Techniques of Instrumental Analysis','Elective'),('SCI719','Principles and Techniques of Instrumental Analysis','Elective'),('CSE418','Principles of Information Security','Elective'),('CEG441','Process Engineering','Elective'),('CSE568','Product Design and Engineering','Elective'),('SCI463','Quantum Information and Computing','Elective'),('SCI432','Quantum Mechanics II ','Elective'),('ECE535','Radar Systems','Elective'),('SCI753','Reading in Molecular Docking','Elective'),('CEG461','Remote Sensing','Elective'),('CSE540','Research in Information Security','Elective'),('CSE991','Research Methodology','Elective'),('SCI371','Science Lab 1','Elective'),('SCI372','Science Lab II','Elective'),('ICS141','\"SDLC, Database Application Development and Project Mgmt\"','Elective'),('HSS351','Search for a Humane Society','Elective'),('CES641','Seismic Eva and Strengthening of Buildings','Elective'),('HSS413','Seminar Course on Exactitude','Elective'),('HSS240','Sense of Past','Elective'),('HSS357','Social and Technical Innovation','Elective'),('HSS260','Society and Development ','Elective'),('CSE562','Software Platforms','Elective'),('CSE861','Software Quality Engineering','Elective'),('CEG628','Soil Dynamics and Machine Foundations','Elective'),('HSS401','Space Time in Arts and Humanities','Elective'),('CSE591','Spatial Informatics ','Elective'),('ECE448','Speech Signal Processing','Elective'),('ECE446','Speech Systems ','Elective'),('CSE682','Spoken Language Interface','Elective'),('SCI435','Statistical Mechanics','Elective'),('CES631','Structural Dynamics','Elective'),('HSS462','Studies in Alternative Development','Elective'),('SCI754','Symmetry and Unification of Forces','Elective'),('CSE587','System and Resource Virtualization','Elective'),('HSS553','Technology in the Service of Society','Elective'),('HSS200','\"Theoretical Humanities and Formalisms, Digital Humanities\"','Elective'),('SCI752','Theoretical Physics','Elective'),('HSS334','Theories of Arts and Aesthetics','Elective'),('HSS301','\"Theory of Society, History and Justice\"','Elective'),('SCI111','Thermodynamics and Kinetics','Elective'),('ECE442','Time Frequency Analysis ','Elective'),('CSE913','Topics in Computational Geometry','Elective'),('ECE564','Topics in Embedded Systems','Elective'),('CSE964','Topics in HCI','Elective'),('CSE846','Topics in Information Access','Elective'),('SCI761','Topics in Nanosciences','Elective'),('HSS417','Topics in Ontology','Elective'),('CSE912','Topics in Parallel Processing','Elective'),('SCI831','Topics in Physical Chemistry','Elective'),('SCI751','Topics in Physics','Elective'),('CSE911','Topics in Programming Languages','Elective'),('CSE962','Topics in Software Engineering','Elective'),('ECE531','Topics in Wireless Communications','Elective'),('ECE534','Topics in Wireless Security','Elective'),('IMA405','UG Topics in Mathematics','Elective'),('HSS347','Understanding Human Society and Cultural Variations','Elective'),('ECE561','VLSI Algorithms','Elective'),('ECE465','VLSI Architectures','Elective'),('HSS345','Yogavasishtam:A Philosophical Poem','Elective'),('ISC202','Science II','UG3'),('ICS211','Algorithms ','UG2'),('CSE371','Artificial Intelligence ','UG2'),('ECE335','Communication Theory I','UG2'),('ICS251','Computer Networks','UG2'),('IEC239','Digital Signal Analysis and Applications','UG2'),('ECE341','Digital Signal Processing ','UG2'),('ECE260','Electrical Science II','UG2'),('ECE291','Electronics Workshop II ','UG2'),('ECE225','Embedded Hardware Design','UG2'),('IEG201','Engineering Systems','UG2'),('CSE311','Formal Methods ','UG2'),('CSE251','Graphics ','UG2'),('IHS107','Human Values II','UG2'),('IHS201','Humanities ','UG2'),('ECE361','Intro to VLSI','UG2'),('ICS241','Introduction to Databases','UG2'),('ECE205','Linear Electronic Circuits','UG2'),('ICS231','Operating Systems ','UG2'),('ECE230','Probability & Random Processes','UG2'),('ISC201','Science I','UG2'),('ECE241','Signals and Systems','UG2'),('ICS261','SSAD & Project','UG2'),('H9991','Art and Craft','UG1'),('H9997','Art and Medium','UG1'),('IEC103','Basic Electronic Circuits','UG1'),('ICS101','Computer Programming ','UG1'),('ICS104','Computer System Organization','UG1'),('H9993','Creative Movement ','UG1'),('ICS103','Data Structures ','UG1'),('IEC101','Digital Logic and Processors','UG1'),('IEC102','Electrical Science I','UG1'),('IEC104','Electronics Workshop I','UG1'),('IHS101','English I','UG1'),('IHS102','English II','UG1'),('IHS103','Human Values I','UG1'),('ICS102','IT Workshop I','UG1'),('ICS105','IT Workshop II','UG1'),('IMA101','Mathematics I','UG1'),('IMA102','Mathematics II','UG1'),('H9992','Painting and Folk Art','UG1'),('H9996','Photography and Film','UG1'),('H9995','Site and Art','UG1'),('CSE603','Advanced Problem Solving ','PG1'),('CSE611','Discrete Maths and Algorithms','PG1'),('CSE531','Operating Systems (PG)','PG1'),('CSE505','Scripting and Computer Environments','PG1'),('CEA611','Theory of Elasticity','PG1'),('IMA201','Mathematics III','UG2'),('CSE435','Advanced Computer Networks','BC'),('CSE419','Compilers ','BC'),('CSE411','Complexity and Advanced Algorithms','BC'),('CSE441','Database Systems ','BC'),('CSE431','Distributed Systems','BC'),('CSE481','Optimization Methods','BC'),('CSE415','Principles of Programming Languages ','BC'),('CSE461','Software Engineering','BC'),('CSE471','Statistical Methods in AI','BC'),('CSE662','A Systems View of Business','Elective'),('ECE441','Adaptive Signal Processing ','Elective'),('CEA711','Adv. Mechanics of Materials','Elective'),('SCI652','Advanced Bioinformatics ','Elective'),('SCI421','Advanced Biology(Cellular/Molecular/Genetic)','Elective'),('SCI541','Advanced Biomolecular Architecture','Elective'),('CSE519','Advanced Compilers','Elective'),('CES625','Advanced Reinforce Concrete Design','Elective'),('CSE561','Advanced Software Engineering','Elective'),('CES626','Advanced Steel Design','Elective'),('CES611','Advanced Structural Analysis','Elective'),('HSS601','Advanced Topics in Humanities','Elective'),('CEG561','Advanced Topics in Remote Sensing','Elective'),('CSE545','Advances in Data Mining','Elective'),('CSE541','Advances in Database Systems','Elective'),('HSS330','Aesthetics Narrative and Design','Elective'),('AGR588','Agricultural Marketing','Elective'),('CEG411','Agricultural Production Economics','Elective'),('ICS331','Algorithms and Operating Systems','Elective'),('SCI461','Algorithms used in Scientific Simulations','Elective'),('ECE461','Analog and Mixed Signal Design','Elective'),('AGR587','Applied Agricultural Workshop II','Elective'),('AGR583','Applied Agriculture (eSagu) Workshop - I','Elective'),('AGR585','Applied Crop Producation Technology II','Elective'),('AGR581','Applied Crop Production Technology I','Elective'),('AGR582','Applied Crop Protection Technology I','Elective'),('AGR586','Applied Crop Protection Technology II','Elective'),('CLG611','Basic Maths I','Elective'),('SCI650','Bioinformatics Resources','Elective'),('SCI644','Biomolecular Structure and Supramolecular Chemistry','Elective'),('SCI643','Biomolecular Structure Interaction and Dynamics ','Elective'),('ECE530','Broadband Networks','Elective'),('CEG421','Building Energy Simulation','Elective'),('CES634','CASE Workshop','Elective'),('SCI311','Chemical Basis of Everyday Phenomena','Elective'),('SCI431','Classical and Quantum Mechanics-I','Elective'),('HSS341','Classical Language: Sanskrit I','Elective'),('HSS342','Classical Language: Sanskrit II','Elective'),('SCI342','Classical Mechanics','Elective'),('HSS422','Classical Text Reading','Elective'),('CSE565','Cloud Computing','Elective'),('ECE467','CMOS Radio Frequencey Integrated Circuit Design','Elective'),('SCI373','CNS Lab','Elective'),('CSE586','Cognitive Neuroscience','Elective'),('ECE337','Communication Networks ','Elective'),('ECE436','Communication Theory II','Elective'),('SCI762','Complex Systems: Dynamics','Elective'),('CSE518','Computational Geometry','Elective'),('CLG421','Computational Linguistics I','Elective'),('CLG422','Computational Linguistics II','Elective'),('BIO483','Computational Structural Biology','Elective'),('CES711','Computer Analysis and Structural Systems','Elective'),('CSE602','Computer Problem Solving','Elective'),('CLG661','Computers and Scripting I','Elective'),('CES651','Concrete Engineering','Elective'),('CSE503','Concurrent Data Structures','Elective'),('HSS290','Confluence of Humanities and CS','Elective'),('HSS355','Corporate Strategy','Elective'),('HSS432','Creative Writing','Elective'),('HSS344','Creative Writing and Literary Appreciation in Hindi','Elective'),('HSS433','Creative Writing:Poetry from the Outside In','Elective'),('CSE445','Data Warehousing and Data Mining ','Elective'),('HSS414','Debates on Truth across Philosophical Traditions','Elective'),('SCI861','Density Functional Theory in Molecular Physics','Elective'),('HSS363','Dharma Polity and Constitution of India','Elective'),('CSE478','Digital Image Processing ','Elective'),('ECE463','Digital System Design','Elective'),('CES442','Disaster Management','Elective'),('CSE612','\"Dynamic, Concurrent Functional Language\"','Elective'),('CES441','Earthquake Engineering and Disaster Management','Elective'),('CSE592','Ecological and Geospatial Modeling','Elective'),('HSS360','Economics and Organizations','Elective'),('HSS353','Education & Self','Elective'),('CSE566','e-Governance','Elective'),('ECE381','Electromagnetic Theory and Applications','Elective'),('ECE559','Embedded Robotics II','Elective'),('ECE661','Embedded Systems','Elective'),('SCI481','Environmental Science','Elective'),('HSS322','Epistemology in Indian Philosophy','Elective'),('CLG513','Event and Time in Discourse','Elective'),('AGR584','Farm Management','Elective'),('HSS431','\"Form, Arts and Aesthetics\"','Elective'),('HSS411','Formal Approaches of Indian and Greek thought','Elective'),('CEG631','Foundation Engineering and Design','Elective'),('HSS348','Gandhi and India','Elective'),('HSS461','Gandhian Thought','Elective'),('SCI341','General and Structural Chemistry','Elective'),('SCI101','General Physics','Elective'),('HSS415','Generative Ontology','Elective'),('HSS416','Greek Thought','Elective'),('CEG422','Green Buildings','Elective'),('HSS300','History of Ideas','Elective'),('CSE564','Human Computer Interaction','Elective'),('HSS343','Human Condition and Mahabharata','Elective'),('HSS361','Human Rights','Elective'),('ICS291','ICTs in Agriculture','Elective'),('HSS402','Images of Science','Elective'),('HSS346','Imagined Futures: Readings in Science Fiction','Elective'),('HSS323','Indian Thoughts on Cognition and Communication','Elective'),('CLG542','Information Dynamics in Language & Machine Translation','Elective'),('CSE539','Information Security: Research and Mgmt','Elective'),('ECE539','Information Theory and Coding','Elective'),('HSS352','Innovation and Technology Management','Elective'),('HSS332','Installation as a Form of Art','Elective'),('HSS451','Intelligence: A Technology of Mind','Elective'),('CSE563','Internals of Application Servers','Elective'),('SCI551','Intro to Bioinformatics','Elective'),('SCI320','Intro to Biology','Elective'),('CSE485','Intro to Cognitive Science','Elective'),('SCI462','Intro to Quantum Field Theory','Elective'),('ECE452','Intro to Robotics: Mechanics and Control','Elective'),('CSE601','Introduction to Computer Systems and Technologies','Elective'),('CLG211','Introduction to Linguistics','Elective'),('CSE463','Introduction to Middleware Systems','Elective'),('SCI765','Introduction to Systems Biology','Elective'),('HSS324','Introduction to Vedic Darshan','Elective'),('SCI370','Learning Science by doing: A Lab-based Approach','Elective'),('ECE451','Linear Control Systems ','Elective'),('CLG451','Linguistic Data : Collection and Analysis','Elective'),('CLG411','Linguistics 1: Language Typology and Universals','Elective'),('CSE577','Machine Learning ','Elective'),('IMA403','Mathematical Analysis','Elective'),('SCI550','Maths and Statistics','Elective'),('HSS312','\"Meaning: Cognition ,Language and Ontology\"','Elective'),('HSS313','Minds and Machines','Elective'),('CSE536','Mobile Information Systems','Elective'),('CSE483','Mobile Robotics ','Elective'),('SCI433','Modelling and Simulations','Elective'),('CSE504','Modern Computer Architecture','Elective'),('SCI422','Molecular Biology','Elective'),('CSE482','Multi Agent Systems ','Elective'),('CSE473','Multiple Text Processing','Elective'),('CSE573','Natural Language Application','Elective'),('CSE472','Natural Language Processing ','Elective'),('ECE434','Network Theory','Elective'),('HSS354','Non-Violence','Elective'),('IMA404','Number Theory and Cryptology','Elective'),('IMA401','Numerical Analysis - I','Elective'),('IMA402','Numerical Analysis - II','Elective'),('HSS321','Ontologies in Indian Philosophy','Elective'),('HSS310','Ontology','Elective'),('HSS412','Ontology of Language','Elective'),('HSS333','\"Ontology of Re-Creation Sports, Stories and Movies\"','Elective'),('IMA406','Operations Research','Elective'),('SCI635','\"Optics, Symmetry and Spectroscopy\"','Elective'),('SCI344','Organic Chemistry and BMSID','Elective'),('CSE502','Parallel Programming','Elective'),('HSS364','\"Partitioned Politics, Fragmented Nation\"','Elective'),('CSE663','Performance Modeling of Software Systems','Elective'),('HSS314','Phenomenology of Perception','Elective'),('HSS311','Philosophy of Mind','Elective'),('CLG413','Phonetics and Phonology','Elective'),('ECE566','Photonics','Elective'),('HSS362','Political and Economic Thought for Human Society','Elective'),('CEG511','Principles and Practices of Organic Forming','Elective'),('SCI419','Principles and Techniques of Instrumental Analysis','Elective'),('SCI719','Principles and Techniques of Instrumental Analysis','Elective'),('CSE418','Principles of Information Security','Elective'),('CEG441','Process Engineering','Elective'),('CSE568','Product Design and Engineering','Elective'),('SCI463','Quantum Information and Computing','Elective'),('SCI432','Quantum Mechanics II ','Elective'),('ECE535','Radar Systems','Elective'),('SCI753','Reading in Molecular Docking','Elective'),('CEG461','Remote Sensing','Elective'),('CSE540','Research in Information Security','Elective'),('CSE991','Research Methodology','Elective'),('SCI371','Science Lab 1','Elective'),('SCI372','Science Lab II','Elective'),('ICS141','\"SDLC, Database Application Development and Project Mgmt\"','Elective'),('HSS351','Search for a Humane Society','Elective'),('CES641','Seismic Eva and Strengthening of Buildings','Elective'),('HSS413','Seminar Course on Exactitude','Elective'),('HSS240','Sense of Past','Elective'),('HSS357','Social and Technical Innovation','Elective'),('HSS260','Society and Development ','Elective'),('CSE562','Software Platforms','Elective'),('CSE861','Software Quality Engineering','Elective'),('CEG628','Soil Dynamics and Machine Foundations','Elective'),('HSS401','Space Time in Arts and Humanities','Elective'),('CSE591','Spatial Informatics ','Elective'),('ECE448','Speech Signal Processing','Elective'),('ECE446','Speech Systems ','Elective'),('CSE682','Spoken Language Interface','Elective'),('SCI435','Statistical Mechanics','Elective'),('CES631','Structural Dynamics','Elective'),('HSS462','Studies in Alternative Development','Elective'),('SCI754','Symmetry and Unification of Forces','Elective'),('CSE587','System and Resource Virtualization','Elective'),('HSS553','Technology in the Service of Society','Elective'),('HSS200','\"Theoretical Humanities and Formalisms, Digital Humanities\"','Elective'),('SCI752','Theoretical Physics','Elective'),('HSS334','Theories of Arts and Aesthetics','Elective'),('HSS301','\"Theory of Society, History and Justice\"','Elective'),('SCI111','Thermodynamics and Kinetics','Elective'),('ECE442','Time Frequency Analysis ','Elective'),('CSE913','Topics in Computational Geometry','Elective'),('ECE564','Topics in Embedded Systems','Elective'),('CSE964','Topics in HCI','Elective'),('CSE846','Topics in Information Access','Elective'),('SCI761','Topics in Nanosciences','Elective'),('HSS417','Topics in Ontology','Elective'),('CSE912','Topics in Parallel Processing','Elective'),('SCI831','Topics in Physical Chemistry','Elective'),('SCI751','Topics in Physics','Elective'),('CSE911','Topics in Programming Languages','Elective'),('CSE962','Topics in Software Engineering','Elective'),('ECE531','Topics in Wireless Communications','Elective'),('ECE534','Topics in Wireless Security','Elective'),('IMA405','UG Topics in Mathematics','Elective'),('HSS347','Understanding Human Society and Cultural Variations','Elective'),('ECE561','VLSI Algorithms','Elective'),('ECE465','VLSI Architectures','Elective'),('HSS345','Yogavasishtam:A Philosophical Poem','Elective'),('CEA611','','PG1'),('CEA611','','PG1'),('CEA611','','PG1');
/*!40000 ALTER TABLE `Tableme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `Tablet`
--

DROP TABLE IF EXISTS `Tablet`;
/*!50001 DROP VIEW IF EXISTS `Tablet`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `Tablet` (
  `Code` tinyint NOT NULL,
  `Name` tinyint NOT NULL,
  `Type` tinyint NOT NULL,
  `Day` tinyint NOT NULL,
  `StartTime` tinyint NOT NULL,
  `EndTime` tinyint NOT NULL,
  `PrevRoom` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `Tablet1`
--

DROP TABLE IF EXISTS `Tablet1`;
/*!50001 DROP VIEW IF EXISTS `Tablet1`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `Tablet1` (
  `Code` tinyint NOT NULL,
  `Name` tinyint NOT NULL,
  `Type` tinyint NOT NULL,
  `Day` tinyint NOT NULL,
  `StartTime` tinyint NOT NULL,
  `EndTime` tinyint NOT NULL,
  `PrevRoom` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `UG1`
--

DROP TABLE IF EXISTS `UG1`;
/*!50001 DROP VIEW IF EXISTS `UG1`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `UG1` (
  `Code` tinyint NOT NULL,
  `Name` tinyint NOT NULL,
  `Type` tinyint NOT NULL,
  `Day` tinyint NOT NULL,
  `StartTime` tinyint NOT NULL,
  `EndTime` tinyint NOT NULL,
  `PrevRoom` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

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
  `email` varchar(50) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (16,'Acad Office','nehal.wani@students.iiit.ac.in',2),(17,'SLC Chair','nehal.wani@students.iiit.ac.in',3),(18,'Dean Academics','nehal.wani@students.iiit.ac.in',4),(19,'Manager (Admin)','nehal.wani@students.iiit.ac.in',5),(14,'Student','nehal.wani@students.iiit.ac.in',0),(15,'Parliament','nehal.wani@students.iiit.ac.in',1),(23,'kapil kumar','kapil@gmail.com',6),(20,'TA','nehal.wani@students.iiit.ac.in',6),(21,'Faculty','nehal.wani@students.iiit.ac.in',7),(25,'Ankush Jain','ankush.jain@students.iiit.ac.in',2),(26,'Shubham Sangal','shubham.sangal@students.iiit.ac.in',2),(27,'Kapil Kumar','kapil.kumar@students.iiit.ac.in',2);
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ccPerson`
--

DROP TABLE IF EXISTS `ccPerson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ccPerson` (
  `reqNo` int(11) DEFAULT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ccPerson`
--

LOCK TABLES `ccPerson` WRITE;
/*!40000 ALTER TABLE `ccPerson` DISABLE KEYS */;
INSERT INTO `ccPerson` VALUES (48,'ankush.jain@students.iiit.ac.in'),(49,'ankush.jain@students.iiit.ac.in'),(49,'nehal.wani@students.iiit.ac.in'),(49,'deepesh.jain@students.iiit.ac.in'),(46,'chikni@chameli.com'),(46,'chikni@chameli.com'),(46,'chikni@chameli.com'),(46,'ankyj@gmail.com'),(49,'ankush.jain@students.iiit.ac.in'),(49,'nehal@blah.com'),(46,'chikni@chameli.com'),(46,'ankush.jain@students.iiit.ac.in'),(46,'chikni@chameli.com'),(46,'ankush.jain@students.iiit.ac.in'),(46,'chikni@chameli.com'),(46,'ankush.jain@students.iiit.ac.in'),(46,'chikni@chameli.com'),(46,'ankush.jain@students.iiit.ac.in'),(46,'chikni@chameli.com'),(46,'ankush.jain@students.iiit.ac.in'),(46,'chikni@chameli.com'),(46,'ankush.jain@students.iiit.ac.in'),(46,'chikni@chameli.com'),(46,'ankush.jain@students.iiit.ac.in'),(46,'chikni@chameli.com'),(46,'ankush.jain@students.iiit.ac.in'),(46,'chikni@chameli.com'),(46,'ankush.jain@students.iiit.ac.in'),(48,'ankush.jain@students.iiit.ac.in'),(47,'ankush.jain@students.iiit.ac.in'),(47,'nehal@blah.com'),(50,'ankush.jainnn@students.iiit.ac.in'),(50,'ankush.jain@students.iiit.ac.in'),(50,'nehal.wani@students.iiit.ac.in'),(50,'deepesh.jain@students.iiit.ac.in'),(51,'ankush.jain@students.iiit.ac.in'),(51,'ankush.jain@students.iiit.ac.in'),(51,'nehal.wani@students.iiit.ac.in'),(51,'deepesh.jain@students.iiit.ac.in'),(52,'ankush.jain@students.iiit.ac.in'),(52,'ankush.jain@students.iiit.ac.in'),(52,'nehal.wani@students.iiit.ac.in'),(52,'deepesh.jain@students.iiit.ac.in');
/*!40000 ALTER TABLE `ccPerson` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clash`
--

DROP TABLE IF EXISTS `clash`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clash` (
  `Code` varchar(10) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Day` varchar(5) DEFAULT NULL,
  `StartTime` varchar(10) DEFAULT NULL,
  `EndTime` varchar(10) DEFAULT NULL,
  `Type` varchar(10) DEFAULT NULL,
  `Others` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clash`
--

LOCK TABLES `clash` WRITE;
/*!40000 ALTER TABLE `clash` DISABLE KEYS */;
INSERT INTO `clash` VALUES ('ICS101','Computer Programming','Fri','12.00','13.00','UG1','CR2'),('ICS102','IT Workshop I','Fri','12.00','13.00','UG1','CR2'),('ICS101','Computer Programming','Mon','12.00','12.25','UG1','CR2'),('ICS102','IT Workshop I','Mon','12.00','13.00','UG1','CR2'),('ICS101','Computer Programming','Thu','12.00','13.00','UG1','CR2'),('ICS102','IT Workshop I','Thu','12.00','13.00','UG1','CR2'),('ICS101','Computer Programming','Tue','12.00','13.00','UG1','CR2'),('ICS102','IT Workshop I','Tue','12.00','13.00','UG1','CR2'),('ICS101','Computer Programming','Fri','10.30','11.25','UG1','SH1'),('ICS102','IT Workshop I','Fri','10.30','11.25','UG1','SH1'),('ICS101','Computer Programming','Mon','10.30','11.25','UG1','SH1'),('ICS102','IT Workshop I','Mon','10.30','11.25','UG1','SH1'),('ICS101','Computer Programming','Thu','10.30','11.25','UG1','SH1'),('ICS102','IT Workshop I','Thu','10.30','11.25','UG1','SH1'),('ICS101','Computer Programming','Tue','10.30','11.25','UG1','SH1'),('ICS102','IT Workshop I','Tue','10.30','11.25','UG1','SH1'),('CSE505','Scripting and Computer Environments','Fri','14.00','15.25','PG1','305'),('CEA611','Theory of Elasticity','Fri','14.00','15.25','PG1','N104'),('CSE505','Scripting and Computer Environments','Tue','14.00','15.25','PG1','305'),('CEA611','Theory of Elasticity','Tue','14.00','15.25','PG1','N104'),('ISC201','Science I','Tue','11.30','12.55','UG2','SH2'),('IMA201','Mathematics III','Tue','11.30','12.55','UG2','SH2'),('ICS101','Computer Programming','Fri','12.00','13.00','UG1','CR2'),('ICS102','IT Workshop I','Fri','12.00','13.00','UG1','CR2'),('ICS101','Computer Programming','Mon','12.00','12.25','UG1','CR2'),('ICS102','IT Workshop I','Mon','12.00','13.00','UG1','CR2'),('ICS101','Computer Programming','Thu','12.00','13.00','UG1','CR2'),('ICS102','IT Workshop I','Thu','12.00','13.00','UG1','CR2'),('ICS101','Computer Programming','Tue','12.00','13.00','UG1','CR2'),('ICS102','IT Workshop I','Tue','12.00','13.00','UG1','CR2'),('ICS101','Computer Programming','Fri','10.30','11.25','UG1','SH1'),('ICS102','IT Workshop I','Fri','10.30','11.25','UG1','SH1'),('ICS102','IT Workshop I','Mon','10.30','11.25','UG1','SH1'),('ICS101','Computer Programming','Mon','10.30','11.25','UG1','SH1'),('ICS101','Computer Programming','Thu','10.30','11.25','UG1','SH1'),('ICS102','IT Workshop I','Thu','10.30','11.25','UG1','SH1'),('ICS101','Computer Programming','Tue','10.30','11.25','UG1','SH1'),('ICS102','IT Workshop I','Tue','10.30','11.25','UG1','SH1'),('CSE505','Scripting and Computer Environments','Fri','14.00','15.25','PG1','305'),('CEA611','Theory of Elasticity','Fri','14.00','15.25','PG1','N104'),('CSE505','Scripting and Computer Environments','Tue','14.00','15.25','PG1','305'),('CEA611','Theory of Elasticity','Tue','14.00','15.25','PG1','N104'),('ISC201','Science I','Tue','11.30','12.55','UG2','SH2'),('IMA201','Mathematics III','Tue','11.30','12.55','UG2','SH2'),('ECE225','Embedded Hardware Design','Fri','10.00','11.25','UG2','101'),('ICS241','Introduction to Databases','Fri','10.00','11.25','UG2','COMMON'),('ECE225','Embedded Hardware Design','Tue','10.00','11.25','UG2','101'),('ICS241','Introduction to Databases','Tue','10.00','11.25','UG2','COMMON');
/*!40000 ALTER TABLE `clash` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dassod`
--

DROP TABLE IF EXISTS `dassod`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dassod` (
  `Code` varchar(10) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Room` varchar(10) DEFAULT NULL,
  `Day` varchar(10) DEFAULT NULL,
  `StartTime` varchar(10) DEFAULT NULL,
  `EndTime` varchar(10) DEFAULT NULL,
  `Type` varchar(10) DEFAULT NULL,
  `PrevRoom` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dassod`
--

LOCK TABLES `dassod` WRITE;
/*!40000 ALTER TABLE `dassod` DISABLE KEYS */;
INSERT INTO `dassod` VALUES ('CSE505','','H202','Tue','14.00','15.25','PG1','305'),('CSE505','','H202','Fri','14.00','15.25','PG1','305'),('CSE505','','H202','Mon','00.00','00.00','PG1','305');
/*!40000 ALTER TABLE `dassod` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventTitle`
--

DROP TABLE IF EXISTS `eventTitle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventTitle` (
  `title` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventTitle`
--

LOCK TABLES `eventTitle` WRITE;
/*!40000 ALTER TABLE `eventTitle` DISABLE KEYS */;
INSERT INTO `eventTitle` VALUES ('TUTS'),('LABS'),('D LECT.'),('FAC.TALKS'),('CULT'),('WORKSHOP'),('SEMINAR');
/*!40000 ALTER TABLE `eventTitle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `Tablet`
--

/*!50001 DROP TABLE IF EXISTS `Tablet`*/;
/*!50001 DROP VIEW IF EXISTS `Tablet`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = latin1 */;
/*!50001 SET character_set_results     = latin1 */;
/*!50001 SET collation_connection      = latin1_swedish_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `Tablet` AS select distinct `Tablem`.`Code` AS `Code`,`Tablem`.`Name` AS `Name`,`Tableme`.`Type` AS `Type`,`Tablem`.`Day` AS `Day`,`Tablem`.`StartTime` AS `StartTime`,`Tablem`.`EndTime` AS `EndTime`,`Tablem`.`PrevRoom` AS `PrevRoom` from (`Tablem` join `Tableme`) where (`Tablem`.`Code` = `Tableme`.`Code`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `Tablet1`
--

/*!50001 DROP TABLE IF EXISTS `Tablet1`*/;
/*!50001 DROP VIEW IF EXISTS `Tablet1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = latin1 */;
/*!50001 SET character_set_results     = latin1 */;
/*!50001 SET collation_connection      = latin1_swedish_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `Tablet1` AS select `Tablet`.`Code` AS `Code`,`Tablet`.`Name` AS `Name`,`Tablet`.`Type` AS `Type`,`Tablet`.`Day` AS `Day`,`Tablet`.`StartTime` AS `StartTime`,`Tablet`.`EndTime` AS `EndTime`,`Tablet`.`PrevRoom` AS `PrevRoom` from `Tablet` where ((`Tablet`.`Type` = 'BC') or ((`Tablet`.`Type` = 'Elective') and (not((`Tablet`.`Name` like '%Lab%'))))) order by `Tablet`.`Type`,`Tablet`.`Code`,`Tablet`.`StartTime` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `UG1`
--

/*!50001 DROP TABLE IF EXISTS `UG1`*/;
/*!50001 DROP VIEW IF EXISTS `UG1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = latin1 */;
/*!50001 SET character_set_results     = latin1 */;
/*!50001 SET collation_connection      = latin1_swedish_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `UG1` AS select distinct `Tablem`.`Code` AS `Code`,`Tablem`.`Name` AS `Name`,`Tableme`.`Type` AS `Type`,`Tablem`.`Day` AS `Day`,`Tablem`.`StartTime` AS `StartTime`,`Tablem`.`EndTime` AS `EndTime`,`Tablem`.`PrevRoom` AS `PrevRoom` from (`Tablem` join `Tableme`) where ((`Tablem`.`Code` = `Tableme`.`Code`) and (`Tableme`.`Type` like 'UG1')) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-11-13 16:15:43

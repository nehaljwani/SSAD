-- MySQL dump 10.13  Distrib 5.5.27, for Linux (i686)
--
-- Host: localhost    Database: dbapp
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
-- Table structure for table `AuthorizedSC`
--

DROP TABLE IF EXISTS `AuthorizedSC`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthorizedSC` (
  `ASCID` int(10) NOT NULL AUTO_INCREMENT,
  `Brand` varchar(100) DEFAULT NULL,
  `Address` varchar(500) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`ASCID`),
  KEY `Brand` (`Brand`),
  CONSTRAINT `AuthorizedSC_ibfk_1` FOREIGN KEY (`Brand`) REFERENCES `Brand` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AuthorizedSC`
--

LOCK TABLES `AuthorizedSC` WRITE;
/*!40000 ALTER TABLE `AuthorizedSC` DISABLE KEYS */;
INSERT INTO `AuthorizedSC` VALUES (1,'Toshiba','Toshiba America Information Systems, Inc. Digital Products Division 9740 Irvine Boulevard Irvine, CA 92618-1697','(949) 583-3000'),(3,'AMD','No.11, Chambers @ Mantri, Richmond Road , Bengaluru /Bangalore','(80) 30924700 ,'),(4,'Acer','ABCD','1234');
/*!40000 ALTER TABLE `AuthorizedSC` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `AuthorizedService`
--

DROP TABLE IF EXISTS `AuthorizedService`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthorizedService` (
  `ASCID` int(10) DEFAULT NULL,
  `ServicesSupported` varchar(500) DEFAULT NULL,
  KEY `ASCID` (`ASCID`),
  CONSTRAINT `AuthorizedService_ibfk_1` FOREIGN KEY (`ASCID`) REFERENCES `AuthorizedSC` (`ASCID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AuthorizedService`
--

LOCK TABLES `AuthorizedService` WRITE;
/*!40000 ALTER TABLE `AuthorizedService` DISABLE KEYS */;
INSERT INTO `AuthorizedService` VALUES (1,'X,Y,Z'),(3,'Repair, Replacement'),(4,'A, B, C');
/*!40000 ALTER TABLE `AuthorizedService` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Brand`
--

DROP TABLE IF EXISTS `Brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Brand` (
  `Name` varchar(100) NOT NULL DEFAULT '',
  `Description` varchar(500) DEFAULT NULL,
  `Rating` int(1) DEFAULT NULL,
  PRIMARY KEY (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Brand`
--

LOCK TABLES `Brand` WRITE;
/*!40000 ALTER TABLE `Brand` DISABLE KEYS */;
INSERT INTO `Brand` VALUES ('Acer','Indian ',6),('AMD','Description17',4),('Dell','Description5',3),('Intel','Motherboard D845GVSR',4),('LG','Life is Gud',7),('Microsoft','Description2',5),('Seagate','Description6',6),('Sony','Description3',4),('Toshiba','Description19',6),('Tp-Link','Description4',4);
/*!40000 ALTER TABLE `Brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Customer`
--

DROP TABLE IF EXISTS `Customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Customer` (
  `CustID` int(10) NOT NULL AUTO_INCREMENT,
  `Address` varchar(500) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Username` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`CustID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Customer`
--

LOCK TABLES `Customer` WRITE;
/*!40000 ALTER TABLE `Customer` DISABLE KEYS */;
INSERT INTO `Customer` VALUES (14,'#1304, Delhi','deepesh.jain@idiots.com','Deepesh','90129723','user1'),(15,'#113, Patiala, Punjab','anku.94@gmail.com','Ankush','9052488912','ankush'),(16,'#304, Muzzaffarnagar, Uttar Pradesh','mayankrocks.1993@gmail.com','Mayank','9052400628','mayank'),(17,'#909, GMCH, Chandigarh','amishwani@gmail.com','Amish','8800850083','amish'),(18,'#145, Jail Road, KhaiGali, Hyderabad','akansha@gmail.com','Akansha','01722638971','akansha'),(19,'#1304, Delhi','new@gmail.com','new','90129723','new');
/*!40000 ALTER TABLE `Customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Driver`
--

DROP TABLE IF EXISTS `Driver`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Driver` (
  `EmpID` int(10) NOT NULL DEFAULT '0',
  `LicenseNo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`EmpID`),
  CONSTRAINT `Driver_ibfk_1` FOREIGN KEY (`EmpID`) REFERENCES `Employee` (`EmpID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Driver`
--

LOCK TABLES `Driver` WRITE;
/*!40000 ALTER TABLE `Driver` DISABLE KEYS */;
INSERT INTO `Driver` VALUES (2,'IUHSD7461');
/*!40000 ALTER TABLE `Driver` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Employee`
--

DROP TABLE IF EXISTS `Employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Employee` (
  `EmpID` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Address` varchar(500) DEFAULT NULL,
  `DOJ` date DEFAULT NULL,
  `Salary` int(7) DEFAULT NULL,
  `PAN` char(10) DEFAULT NULL,
  `Category` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`EmpID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Employee`
--

LOCK TABLES `Employee` WRITE;
/*!40000 ALTER TABLE `Employee` DISABLE KEYS */;
INSERT INTO `Employee` VALUES (2,'Tanvir Khanna','1990-07-22','#408, Kachi Nagar, Luckhnow','2012-11-26',5000,'APLOS91022','Driver'),(3,'Nehal','1993-08-06','#2008, Sabzi Street, Mumbai','2012-11-13',50000,'ABHNJ0493L','Manager'),(4,'Ankush Jain','1994-02-28','Near Easyday, Thapar College, Patiala','2010-02-01',1000000,'ABCDPQ1234','Engineer'),(6,'Manveer Singh','1991-01-01','#505, Sabzi Market Road, Bathinda','2012-11-08',15000,'APLOR21022','SalesPerson');
/*!40000 ALTER TABLE `Employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Engineer`
--

DROP TABLE IF EXISTS `Engineer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Engineer` (
  `EmpID` int(10) NOT NULL DEFAULT '0',
  `Specialization` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`EmpID`),
  CONSTRAINT `Engineer_ibfk_1` FOREIGN KEY (`EmpID`) REFERENCES `Employee` (`EmpID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Engineer`
--

LOCK TABLES `Engineer` WRITE;
/*!40000 ALTER TABLE `Engineer` DISABLE KEYS */;
INSERT INTO `Engineer` VALUES (4,'CSE');
/*!40000 ALTER TABLE `Engineer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Feedback`
--

DROP TABLE IF EXISTS `Feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Feedback` (
  `CustID` int(10) DEFAULT NULL,
  `OrderID` int(10) DEFAULT NULL,
  `TicketNo` int(10) NOT NULL DEFAULT '0',
  `Feedback` varchar(1000) DEFAULT NULL,
  `Rating` int(5) DEFAULT NULL,
  KEY `CustID` (`CustID`),
  CONSTRAINT `Feedback_ibfk_1` FOREIGN KEY (`CustID`) REFERENCES `Customer` (`CustID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Feedback`
--

LOCK TABLES `Feedback` WRITE;
/*!40000 ALTER TABLE `Feedback` DISABLE KEYS */;
INSERT INTO `Feedback` VALUES (15,2,14,'Product is awesome.',10),(16,0,0,'Product Is Bad.',5);
/*!40000 ALTER TABLE `Feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Forwarding`
--

DROP TABLE IF EXISTS `Forwarding`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Forwarding` (
  `TicketNo` int(10) NOT NULL DEFAULT '0',
  `ProductName` varchar(100) DEFAULT NULL,
  `ProblemDesc` varchar(1000) DEFAULT NULL,
  `ASCID` int(10) DEFAULT NULL,
  `Status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`TicketNo`),
  KEY `ASCID` (`ASCID`),
  CONSTRAINT `Forwarding_ibfk_3` FOREIGN KEY (`ASCID`) REFERENCES `AuthorizedSC` (`ASCID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Forwarding_ibfk_4` FOREIGN KEY (`TicketNo`) REFERENCES `Ticket` (`TicketNo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Forwarding`
--

LOCK TABLES `Forwarding` WRITE;
/*!40000 ALTER TABLE `Forwarding` DISABLE KEYS */;
/*!40000 ALTER TABLE `Forwarding` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `HDD`
--

DROP TABLE IF EXISTS `HDD`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `HDD` (
  `ID` int(10) NOT NULL DEFAULT '0',
  `Size` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  CONSTRAINT `HDD_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `Items` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `HDD`
--

LOCK TABLES `HDD` WRITE;
/*!40000 ALTER TABLE `HDD` DISABLE KEYS */;
INSERT INTO `HDD` VALUES (5,'1TB');
/*!40000 ALTER TABLE `HDD` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Items`
--

DROP TABLE IF EXISTS `Items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Items` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Description` varchar(1000) DEFAULT NULL,
  `Brand` varchar(50) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Price` int(8) DEFAULT NULL,
  `Category` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `Brand` (`Brand`),
  CONSTRAINT `Items_ibfk_1` FOREIGN KEY (`Brand`) REFERENCES `Brand` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Items`
--

LOCK TABLES `Items` WRITE;
/*!40000 ALTER TABLE `Items` DISABLE KEYS */;
INSERT INTO `Items` VALUES (1,'Desc1','Intel','8D6DASD4',15000,'Motherboard'),(2,'Desc2.5','Intel','KD45ASD4',25000,'Motherboard'),(3,'Desc3','AMD','A-15ASD4',17000,'Motherboard'),(5,'Occupies less volume and is portable.','Toshiba','Toshiba Canvio Basic 3.0 1 ',4999,'HDD'),(6,' 4 Cores, 2 MB (L2), 6 MB (L3), 45 nm Manufacturing Process','AMD','AM3 Athlon II 260 Processor',6784,'Processor'),(11,'Super Duper Fast!','AMD','D845GVSR',50000,'Processor'),(12,'Nice Res!','LG','Plasma',25000,'Monitor');
/*!40000 ALTER TABLE `Items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Manager`
--

DROP TABLE IF EXISTS `Manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Manager` (
  `EmpID` int(10) NOT NULL DEFAULT '0',
  `Department` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`EmpID`),
  CONSTRAINT `Manager_ibfk_1` FOREIGN KEY (`EmpID`) REFERENCES `Employee` (`EmpID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Manager`
--

LOCK TABLES `Manager` WRITE;
/*!40000 ALTER TABLE `Manager` DISABLE KEYS */;
INSERT INTO `Manager` VALUES (3,'');
/*!40000 ALTER TABLE `Manager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Monitor`
--

DROP TABLE IF EXISTS `Monitor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Monitor` (
  `ID` int(10) NOT NULL DEFAULT '0',
  `Resolution` varchar(20) DEFAULT NULL,
  `ScreenSize` int(4) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  CONSTRAINT `Monitor_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `Items` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Monitor`
--

LOCK TABLES `Monitor` WRITE;
/*!40000 ALTER TABLE `Monitor` DISABLE KEYS */;
INSERT INTO `Monitor` VALUES (12,'1920x1800',17);
/*!40000 ALTER TABLE `Monitor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Motherboard`
--

DROP TABLE IF EXISTS `Motherboard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Motherboard` (
  `ID` int(10) NOT NULL DEFAULT '0',
  `Chipset` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  CONSTRAINT `Motherboard_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `Items` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Motherboard`
--

LOCK TABLES `Motherboard` WRITE;
/*!40000 ALTER TABLE `Motherboard` DISABLE KEYS */;
INSERT INTO `Motherboard` VALUES (1,'NCR 53C91'),(2,'NCR 53D92'),(3,'KMC AM-L92');
/*!40000 ALTER TABLE `Motherboard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `OrderItems`
--

DROP TABLE IF EXISTS `OrderItems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `OrderItems` (
  `OrderID` int(10) NOT NULL DEFAULT '0',
  `Item` varchar(100) DEFAULT NULL,
  `Quantity` int(10) DEFAULT NULL,
  KEY `OrderID` (`OrderID`),
  CONSTRAINT `OrderItems_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `SalesOrder` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `OrderItems`
--

LOCK TABLES `OrderItems` WRITE;
/*!40000 ALTER TABLE `OrderItems` DISABLE KEYS */;
INSERT INTO `OrderItems` VALUES (1,'1',6),(1,'3',2),(1,'5',1),(2,'1',3),(2,'2',1),(10,'2',4),(10,'3',1),(11,'2',4),(11,'3',1),(12,'3',2),(13,'3',2),(14,'3',2),(15,'6',1),(15,'1',8),(16,'2',3),(17,'1',6);
/*!40000 ALTER TABLE `OrderItems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Payment`
--

DROP TABLE IF EXISTS `Payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Payment` (
  `OrderID` int(10) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Amount` int(10) DEFAULT NULL,
  `PaymentMethod` varchar(20) DEFAULT NULL,
  KEY `OrderID` (`OrderID`),
  CONSTRAINT `Payment_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `SalesOrder` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Payment`
--

LOCK TABLES `Payment` WRITE;
/*!40000 ALTER TABLE `Payment` DISABLE KEYS */;
INSERT INTO `Payment` VALUES (9,'First payment',1000,'cheque'),(16,'True',15000,'cash');
/*!40000 ALTER TABLE `Payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Processor`
--

DROP TABLE IF EXISTS `Processor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Processor` (
  `ID` int(10) NOT NULL DEFAULT '0',
  `Frequency` int(5) DEFAULT NULL,
  `Cores` int(3) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  CONSTRAINT `Processor_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `Items` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Processor`
--

LOCK TABLES `Processor` WRITE;
/*!40000 ALTER TABLE `Processor` DISABLE KEYS */;
INSERT INTO `Processor` VALUES (6,3,2),(11,10,12);
/*!40000 ALTER TABLE `Processor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `RAM`
--

DROP TABLE IF EXISTS `RAM`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `RAM` (
  `ID` int(10) NOT NULL DEFAULT '0',
  `Frequency` int(5) DEFAULT NULL,
  `Size` int(5) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  CONSTRAINT `RAM_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `Items` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `RAM`
--

LOCK TABLES `RAM` WRITE;
/*!40000 ALTER TABLE `RAM` DISABLE KEYS */;
/*!40000 ALTER TABLE `RAM` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SalesOrder`
--

DROP TABLE IF EXISTS `SalesOrder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SalesOrder` (
  `OrderID` int(10) NOT NULL AUTO_INCREMENT,
  `CustID` int(10) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  PRIMARY KEY (`OrderID`),
  KEY `CustID` (`CustID`),
  CONSTRAINT `SalesOrder_ibfk_1` FOREIGN KEY (`CustID`) REFERENCES `Customer` (`CustID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SalesOrder`
--

LOCK TABLES `SalesOrder` WRITE;
/*!40000 ALTER TABLE `SalesOrder` DISABLE KEYS */;
INSERT INTO `SalesOrder` VALUES (1,14,'2012-11-20'),(2,15,'2012-10-24'),(9,15,'2012-11-07'),(10,15,'2012-11-07'),(11,15,'2012-11-07'),(12,15,'2012-11-07'),(13,15,'2012-11-07'),(14,15,'2012-11-07'),(15,15,'2012-11-07'),(16,16,'2012-11-07'),(17,16,'2012-11-08');
/*!40000 ALTER TABLE `SalesOrder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SalesPerson`
--

DROP TABLE IF EXISTS `SalesPerson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SalesPerson` (
  `EmpID` int(10) NOT NULL DEFAULT '0',
  `SalesNo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`EmpID`),
  CONSTRAINT `SalesPerson_ibfk_1` FOREIGN KEY (`EmpID`) REFERENCES `Employee` (`EmpID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SalesPerson`
--

LOCK TABLES `SalesPerson` WRITE;
/*!40000 ALTER TABLE `SalesPerson` DISABLE KEYS */;
INSERT INTO `SalesPerson` VALUES (6,'');
/*!40000 ALTER TABLE `SalesPerson` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Shipment`
--

DROP TABLE IF EXISTS `Shipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Shipment` (
  `OrderID` int(10) NOT NULL DEFAULT '0',
  `PreferredDate` date DEFAULT NULL,
  `PreferredTime` time DEFAULT NULL,
  `Address` varchar(1000) DEFAULT NULL,
  `Status` varchar(200) DEFAULT NULL,
  `DeliveryDate` date DEFAULT NULL,
  PRIMARY KEY (`OrderID`),
  CONSTRAINT `Shipment_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `SalesOrder` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Shipment`
--

LOCK TABLES `Shipment` WRITE;
/*!40000 ALTER TABLE `Shipment` DISABLE KEYS */;
INSERT INTO `Shipment` VALUES (1,'2012-12-01','17:00:00','Gryffindor Tower, Hogwarts','Processing','0000-00-00'),(2,'2012-11-15','07:00:00','The Shire, Middle Earth','Unread','0000-00-00'),(14,'2012-12-23','08:00:00','E-14, OBH, IIIT Hyderabad, Gachibowli','Unread','0000-00-00'),(15,'2012-12-15','09:00:00','Hell, Underground','Unread','0000-00-00'),(16,'2012-12-15','17:00:00','#1305, Sec31-C, Chandigarh','Unread','0000-00-00'),(17,'2013-01-01','17:00:00','#1305, Sec31-C, Chandigarh','Unread','0000-00-00');
/*!40000 ALTER TABLE `Shipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SupplyItems`
--

DROP TABLE IF EXISTS `SupplyItems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SupplyItems` (
  `OrderID` int(10) NOT NULL DEFAULT '0',
  `Item` int(10) DEFAULT NULL,
  `Quantity` int(5) DEFAULT NULL,
  `RatePerItem` int(8) DEFAULT NULL,
  PRIMARY KEY (`OrderID`),
  CONSTRAINT `SupplyItems_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `SalesOrder` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SupplyItems`
--

LOCK TABLES `SupplyItems` WRITE;
/*!40000 ALTER TABLE `SupplyItems` DISABLE KEYS */;
/*!40000 ALTER TABLE `SupplyItems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SupplyOrder`
--

DROP TABLE IF EXISTS `SupplyOrder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SupplyOrder` (
  `OrderID` int(10) NOT NULL DEFAULT '0',
  `VendID` int(10) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  PRIMARY KEY (`OrderID`),
  KEY `VendID` (`VendID`),
  CONSTRAINT `SupplyOrder_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `SalesOrder` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `SupplyOrder_ibfk_3` FOREIGN KEY (`VendID`) REFERENCES `Vendor` (`VendID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SupplyOrder`
--

LOCK TABLES `SupplyOrder` WRITE;
/*!40000 ALTER TABLE `SupplyOrder` DISABLE KEYS */;
/*!40000 ALTER TABLE `SupplyOrder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SupplyReceipt`
--

DROP TABLE IF EXISTS `SupplyReceipt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SupplyReceipt` (
  `VendID` int(10) DEFAULT NULL,
  `OrderID` int(10) NOT NULL DEFAULT '0',
  `Description` varchar(100) DEFAULT NULL,
  `Amount` int(10) DEFAULT NULL,
  `PaymentMethod` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`OrderID`),
  KEY `VendID` (`VendID`),
  CONSTRAINT `SupplyReceipt_ibfk_1` FOREIGN KEY (`VendID`) REFERENCES `Vendor` (`VendID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `SupplyReceipt_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `SalesOrder` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SupplyReceipt`
--

LOCK TABLES `SupplyReceipt` WRITE;
/*!40000 ALTER TABLE `SupplyReceipt` DISABLE KEYS */;
/*!40000 ALTER TABLE `SupplyReceipt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Ticket`
--

DROP TABLE IF EXISTS `Ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ticket` (
  `CustID` int(10) DEFAULT NULL,
  `TicketNo` int(10) NOT NULL AUTO_INCREMENT,
  `Grievance` varchar(200) DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` varchar(200) DEFAULT 'Unread',
  PRIMARY KEY (`TicketNo`),
  KEY `CustID` (`CustID`),
  CONSTRAINT `Ticket_ibfk_1` FOREIGN KEY (`CustID`) REFERENCES `Customer` (`CustID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ticket`
--

LOCK TABLES `Ticket` WRITE;
/*!40000 ALTER TABLE `Ticket` DISABLE KEYS */;
INSERT INTO `Ticket` VALUES (15,14,'Shitty service, crappy toilets','2011-12-31 18:30:00','Processing'),(14,15,'My motherboard burst into flames. I want full refund.','0000-00-00 00:00:00','Unread'),(16,16,'Monitor is not turning on properly.','2012-11-07 19:30:30','Unread'),(16,17,'My laptop does not work','2012-11-08 16:34:20','Unread');
/*!40000 ALTER TABLE `Ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `Username` varchar(20) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  UNIQUE KEY `UserName` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES ('admin','5f4dcc3b5aa765d61d8327deb882cf99'),('user1','e6e3be2d833cdf5d9d4c7bc2f85cd098'),('ankush','e6e3be2d833cdf5d9d4c7bc2f85cd098'),('mayank','e6e3be2d833cdf5d9d4c7bc2f85cd098'),('amish','e6e3be2d833cdf5d9d4c7bc2f85cd098'),('akansha','e6e3be2d833cdf5d9d4c7bc2f85cd098'),('new','e6e3be2d833cdf5d9d4c7bc2f85cd098');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Vendor`
--

DROP TABLE IF EXISTS `Vendor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Vendor` (
  `VendID` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(500) DEFAULT NULL,
  `Phone` int(15) DEFAULT NULL,
  PRIMARY KEY (`VendID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Vendor`
--

LOCK TABLES `Vendor` WRITE;
/*!40000 ALTER TABLE `Vendor` DISABLE KEYS */;
INSERT INTO `Vendor` VALUES (1,'James Shaw Hadden','#508-B, Sacred Road, Market Area, Downhatten',129),(6,'McLaren S','#908, Lingampally, Hyderabad, Andhra Pradesh',2147483647);
/*!40000 ALTER TABLE `Vendor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `VendorBrands`
--

DROP TABLE IF EXISTS `VendorBrands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `VendorBrands` (
  `VendID` int(10) NOT NULL DEFAULT '0',
  `Brands` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`VendID`),
  CONSTRAINT `VendorBrands_ibfk_1` FOREIGN KEY (`VendID`) REFERENCES `Vendor` (`VendID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `VendorBrands`
--

LOCK TABLES `VendorBrands` WRITE;
/*!40000 ALTER TABLE `VendorBrands` DISABLE KEYS */;
INSERT INTO `VendorBrands` VALUES (1,'Samsung, LG'),(6,'Samsung, Dell, HP');
/*!40000 ALTER TABLE `VendorBrands` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-11-11 16:59:43

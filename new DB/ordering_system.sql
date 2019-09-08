/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.1.37-MariaDB : Database - ordering_system
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ordering_system` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ordering_system`;

/*Table structure for table `tblautonumbers` */

DROP TABLE IF EXISTS `tblautonumbers`;

CREATE TABLE `tblautonumbers` (
  `AUTOID` int(11) NOT NULL AUTO_INCREMENT,
  `AUTOSTART` varchar(30) NOT NULL,
  `AUTOEND` int(11) NOT NULL,
  `AUTOINC` int(11) NOT NULL,
  `AUTOKEY` varchar(30) NOT NULL,
  PRIMARY KEY (`AUTOID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tblautonumbers` */

insert  into `tblautonumbers`(`AUTOID`,`AUTOSTART`,`AUTOEND`,`AUTOINC`,`AUTOKEY`) values 
(1,'02983',9,1,'userid'),
(2,'000',78,1,'employeeid'),
(3,'0',16,1,'APPLICANT'),
(4,'69125',43,1,'ORDERNO');

/*Table structure for table `tblcategory` */

DROP TABLE IF EXISTS `tblcategory`;

CREATE TABLE `tblcategory` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `Categories` varchar(90) NOT NULL,
  `StoreID` int(11) NOT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tblcategory` */

insert  into `tblcategory`(`CategoryID`,`Categories`,`StoreID`) values 
(5,'Watches',2101),
(6,'T-shirts',2101),
(7,'Necklace',2101);

/*Table structure for table `tblcustomer` */

DROP TABLE IF EXISTS `tblcustomer`;

CREATE TABLE `tblcustomer` (
  `CustomerID` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerName` varchar(90) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `CustomerAddress` varchar(90) NOT NULL,
  `CustomerContact` varchar(90) NOT NULL,
  `Sex` varchar(30) NOT NULL,
  `Customer_Username` varchar(90) NOT NULL,
  `Customer_Password` varchar(90) NOT NULL,
  `Customer_Photo` varchar(90) NOT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB AUTO_INCREMENT=570 DEFAULT CHARSET=latin1;

/*Data for the table `tblcustomer` */

insert  into `tblcustomer`(`CustomerID`,`CustomerName`,`Email`,`CustomerAddress`,`CustomerContact`,`Sex`,`Customer_Username`,`Customer_Password`,`Customer_Photo`) values 
(569,'charlie libaton','test@gmail.com','Test Address','09451245686','Male','qwe','056eafe7cf52220de2df36845b8ed170c67e23e3','');

/*Table structure for table `tblinventory` */

DROP TABLE IF EXISTS `tblinventory`;

CREATE TABLE `tblinventory` (
  `TransID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductID` int(11) NOT NULL,
  `Stocks` int(11) NOT NULL,
  `Sold` int(11) NOT NULL,
  `Remaining` int(11) NOT NULL,
  PRIMARY KEY (`TransID`),
  UNIQUE KEY `ProductID` (`ProductID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `tblinventory` */

insert  into `tblinventory`(`TransID`,`ProductID`,`Stocks`,`Sold`,`Remaining`) values 
(3,7,23,40,0),
(5,9,0,0,0),
(6,10,0,0,0),
(7,11,0,0,0),
(8,12,0,0,0),
(9,13,0,0,0),
(10,14,0,0,0),
(11,1,90,0,90),
(12,2,78,10,68),
(15,5,15,0,15),
(16,6,15,0,15);

/*Table structure for table `tblloan` */

DROP TABLE IF EXISTS `tblloan`;

CREATE TABLE `tblloan` (
  `loanid` int(11) NOT NULL AUTO_INCREMENT,
  `loanname` varchar(50) DEFAULT NULL,
  `loanpercent` varchar(50) DEFAULT NULL,
  `loanMonth` varchar(50) DEFAULT NULL,
  `loandescription` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`loanid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tblloan` */

insert  into `tblloan`(`loanid`,`loanname`,`loanpercent`,`loanMonth`,`loandescription`) values 
(1,'asdasdasdasdasd','.3 loanidasdasdas','3 Months loanidasdasd','test loanidasdasda'),
(5,'w','w','w','ww');

/*Table structure for table `tblproduct` */

DROP TABLE IF EXISTS `tblproduct`;

CREATE TABLE `tblproduct` (
  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(90) NOT NULL,
  `Description` varchar(90) NOT NULL,
  `Price` double NOT NULL,
  `DateExpire` date NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `StoreID` int(11) NOT NULL,
  `Image1` text NOT NULL,
  `Image2` text NOT NULL,
  `Image3` text NOT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tblproduct` */

insert  into `tblproduct`(`ProductID`,`ProductName`,`Description`,`Price`,`DateExpire`,`CategoryID`,`StoreID`,`Image1`,`Image2`,`Image3`) values 
(5,'G-shock','G-SHOCK shock resistant military and tactical watches with outstanding water resistant fea',3200,'2019-09-28',5,2101,'photos/Gents-Watches.jpg','photos/Silks-sents.jpg','photos/watches.jpg'),
(6,'T-shirt Model 1','Tshirt deisgn',3200,'2019-09-21',6,2101,'photos/penshoppe.jpg','photos/','photos/');

/*Table structure for table `tblstockin` */

DROP TABLE IF EXISTS `tblstockin`;

CREATE TABLE `tblstockin` (
  `StockinID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `DateReceive` date NOT NULL,
  PRIMARY KEY (`StockinID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tblstockin` */

insert  into `tblstockin`(`StockinID`,`ProductID`,`Quantity`,`DateReceive`) values 
(2,2,78,'2019-02-03'),
(5,5,15,'2019-09-02'),
(6,6,15,'2019-09-02');

/*Table structure for table `tblstockout` */

DROP TABLE IF EXISTS `tblstockout`;

CREATE TABLE `tblstockout` (
  `StockoutID` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `DateSold` date NOT NULL,
  `Status` varchar(30) NOT NULL DEFAULT 'Pending',
  `Remarks` varchar(90) NOT NULL,
  `OrderNo` varchar(90) NOT NULL,
  `HView` tinyint(1) NOT NULL,
  PRIMARY KEY (`StockoutID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tblstockout` */

insert  into `tblstockout`(`StockoutID`,`CustomerID`,`ProductID`,`Quantity`,`DateSold`,`Status`,`Remarks`,`OrderNo`,`HView`) values 
(3,12,2,5,'2019-08-28','Cancelled','','6912537',0),
(4,12,2,3,'2019-08-28','Confirmed','','6912538',0),
(5,12,2,2,'2019-08-28','Confirmed','','6912539',0);

/*Table structure for table `tblstore` */

DROP TABLE IF EXISTS `tblstore`;

CREATE TABLE `tblstore` (
  `StoreID` int(11) NOT NULL AUTO_INCREMENT,
  `StoreName` varchar(90) NOT NULL,
  `StoreAddress` varchar(90) NOT NULL,
  `ContactNo` varchar(90) NOT NULL,
  `st_Image1` text NOT NULL,
  `st_Image2` text NOT NULL,
  `st_Image3` text NOT NULL,
  PRIMARY KEY (`StoreID`)
) ENGINE=InnoDB AUTO_INCREMENT=2102 DEFAULT CHARSET=latin1;

/*Data for the table `tblstore` */

insert  into `tblstore`(`StoreID`,`StoreName`,`StoreAddress`,`ContactNo`,`st_Image1`,`st_Image2`,`st_Image3`) values 
(2101,'Watch Ur Toyo','','','','','');

/*Table structure for table `tblsummary` */

DROP TABLE IF EXISTS `tblsummary`;

CREATE TABLE `tblsummary` (
  `SummaryID` int(11) NOT NULL AUTO_INCREMENT,
  `OrderNo` varchar(90) NOT NULL,
  `TotalAmount` double NOT NULL,
  `TransDate` date NOT NULL,
  PRIMARY KEY (`SummaryID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tblsummary` */

insert  into `tblsummary`(`SummaryID`,`OrderNo`,`TotalAmount`,`TransDate`) values 
(1,'6912535',92,'2019-01-31'),
(2,'6912537',115,'2019-08-28'),
(3,'6912538',69,'2019-08-28'),
(4,'6912540',16249186184,'2019-09-01'),
(5,'6912541',4642624624,'2019-09-01'),
(6,'6912542',333,'2019-09-01');

/*Table structure for table `tblterms` */

DROP TABLE IF EXISTS `tblterms`;

CREATE TABLE `tblterms` (
  `id` int(11) NOT NULL,
  `Terms` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblterms` */

insert  into `tblterms`(`id`,`Terms`) values 
(1,'EDIT Termstessss');

/*Table structure for table `tblusers` */

DROP TABLE IF EXISTS `tblusers`;

CREATE TABLE `tblusers` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(90) NOT NULL,
  `Username` varchar(90) NOT NULL,
  `Password` varchar(90) NOT NULL,
  `Role` varchar(90) NOT NULL,
  `PicLoc` text NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=29839 DEFAULT CHARSET=latin1;

/*Data for the table `tblusers` */

insert  into `tblusers`(`UserID`,`FullName`,`Username`,`Password`,`Role`,`PicLoc`) values 
(2101,'ako to','admin','d033e22ae348aeb5660fc2140aec35850c4da997','Administrator','photos/2019-01-22.png'),
(29838,'','test','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3','Staff','photos/FYGA6QAIRO1DN0F.LARGE.jpg');

/*Table structure for table `tblvarcat` */

DROP TABLE IF EXISTS `tblvarcat`;

CREATE TABLE `tblvarcat` (
  `varcatid` int(11) NOT NULL AUTO_INCREMENT,
  `variationcat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`varcatid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tblvarcat` */

insert  into `tblvarcat`(`varcatid`,`variationcat`) values 
(1,'Color'),
(2,'Size'),
(8,'Size 2');

/*Table structure for table `tblvariation` */

DROP TABLE IF EXISTS `tblvariation`;

CREATE TABLE `tblvariation` (
  `varid` int(11) NOT NULL AUTO_INCREMENT,
  `varcatid` varchar(50) DEFAULT NULL,
  `variation` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`varid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tblvariation` */

insert  into `tblvariation`(`varid`,`varcatid`,`variation`) values 
(1,'1','Blue,Black,Green,Red'),
(2,'2','Small,Medium,Large,Extra Large'),
(4,'8','1,2,3,4,5,6,7\r\n');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

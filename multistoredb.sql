-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2019 at 02:39 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multistoredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblautonumbers`
--

CREATE TABLE `tblautonumbers` (
  `AUTOID` int(11) NOT NULL,
  `AUTOSTART` varchar(30) NOT NULL,
  `AUTOEND` int(11) NOT NULL,
  `AUTOINC` int(11) NOT NULL,
  `AUTOKEY` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblautonumbers`
--

INSERT INTO `tblautonumbers` (`AUTOID`, `AUTOSTART`, `AUTOEND`, `AUTOINC`, `AUTOKEY`) VALUES
(1, '02983', 8, 1, 'userid'),
(2, '000', 78, 1, 'employeeid'),
(3, '0', 16, 1, 'APPLICANT'),
(4, '69125', 37, 1, 'ORDERNO');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `CategoryID` int(11) NOT NULL,
  `Categories` varchar(90) NOT NULL,
  `StoreID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`CategoryID`, `Categories`, `StoreID`) VALUES
(3, 'Gamot Sa Ubo', 2101);

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` varchar(90) NOT NULL,
  `CustomerAddress` varchar(90) NOT NULL,
  `CustomerContact` varchar(90) NOT NULL,
  `Sex` varchar(30) NOT NULL,
  `Customer_Username` varchar(90) NOT NULL,
  `Customer_Password` varchar(90) NOT NULL,
  `Customer_Photo` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`CustomerID`, `CustomerName`, `CustomerAddress`, `CustomerContact`, `Sex`, `Customer_Username`, `Customer_Password`, `Customer_Photo`) VALUES
(1, 'qweqweqwe', '', '', 'Female', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', ''),
(2, 'asd', '', '', 'Female', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', ''),
(3, 'asde', 'asd', '123213', 'Female', 'a', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', ''),
(4, '21', 'asdsad', '213', 'Female', 'a', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', ''),
(5, '', '', '', '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', ''),
(6, 'asd', 'asd', '12312312', 'Female', 'a', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', ''),
(7, 'sasad', 'asdas', '213123', 'Female', 'a', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', ''),
(8, 'asdsad', 'asdasd', '123123', 'Male', 'r', '4dc7c9ec434ed06502767136789763ec11d2c4b7', ''),
(9, 'a', 'a', 'a', 'Female', 'a', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', ''),
(10, 'saadasd', 'asdasd', '213', 'Male', 'c', '84a516841ba77a5b4648de2cd0dfcb30ea46dbb4', 'photos/2019-01-13 (2).png'),
(11, 'Bebe\'s Store', 'Kabankalan City, Negros Occidental, Philippines', '9012312312', 'Female', 'bebe', 'b6204a75b33ab44405d3c00d38a1fd3f67ac2706', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblinventory`
--

CREATE TABLE `tblinventory` (
  `TransID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Stocks` int(11) NOT NULL,
  `Sold` int(11) NOT NULL,
  `Remaining` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblinventory`
--

INSERT INTO `tblinventory` (`TransID`, `ProductID`, `Stocks`, `Sold`, `Remaining`) VALUES
(3, 7, 23, 40, 0),
(5, 9, 0, 0, 0),
(6, 10, 0, 0, 0),
(7, 11, 0, 0, 0),
(8, 12, 0, 0, 0),
(9, 13, 0, 0, 0),
(10, 14, 0, 0, 0),
(11, 1, 90, 0, 90),
(12, 2, 78, 0, 78);

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(90) NOT NULL,
  `Description` varchar(90) NOT NULL,
  `Price` double NOT NULL,
  `DateExpire` date NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `StoreID` int(11) NOT NULL,
  `Image1` text NOT NULL,
  `Image2` text NOT NULL,
  `Image3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`ProductID`, `ProductName`, `Description`, `Price`, `DateExpire`, `CategoryID`, `StoreID`, `Image1`, `Image2`, `Image3`) VALUES
(2, 'asd', 'sad', 23, '2019-02-05', 3, 2101, 'photos/close.jpg', 'photos/capislogo.png', 'photos/computer-lab-banner1 copy.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblstockin`
--

CREATE TABLE `tblstockin` (
  `StockinID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `DateReceive` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstockin`
--

INSERT INTO `tblstockin` (`StockinID`, `ProductID`, `Quantity`, `DateReceive`) VALUES
(2, 2, 78, '2019-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `tblstockout`
--

CREATE TABLE `tblstockout` (
  `StockoutID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `DateSold` date NOT NULL,
  `Status` varchar(30) NOT NULL DEFAULT 'Pending',
  `Remarks` varchar(90) NOT NULL,
  `OrderNo` varchar(90) NOT NULL,
  `HView` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblstore`
--

CREATE TABLE `tblstore` (
  `StoreID` int(11) NOT NULL,
  `StoreName` varchar(90) NOT NULL,
  `StoreAddress` varchar(90) NOT NULL,
  `ContactNo` varchar(90) NOT NULL,
  `st_Image1` text NOT NULL,
  `st_Image2` text NOT NULL,
  `st_Image3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstore`
--

INSERT INTO `tblstore` (`StoreID`, `StoreName`, `StoreAddress`, `ContactNo`, `st_Image1`, `st_Image2`, `st_Image3`) VALUES
(8, 'Jano\'s store', 'Kabankalan City, Negros Occidental, Philippines', '90123123', '', '', ''),
(9, 'Bebe\'s Store', 'Kabankalan City, Negros Occidental, Philippines', '09876890123', '', '', ''),
(2101, 'Admin\'s Store', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblsummary`
--

CREATE TABLE `tblsummary` (
  `SummaryID` int(11) NOT NULL,
  `OrderNo` varchar(90) NOT NULL,
  `TotalAmount` double NOT NULL,
  `TransDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsummary`
--

INSERT INTO `tblsummary` (`SummaryID`, `OrderNo`, `TotalAmount`, `TransDate`) VALUES
(1, '6912535', 92, '2019-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `UserID` int(11) NOT NULL,
  `FullName` varchar(90) NOT NULL,
  `Username` varchar(90) NOT NULL,
  `Password` varchar(90) NOT NULL,
  `Role` varchar(90) NOT NULL,
  `PicLoc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`UserID`, `FullName`, `Username`, `Password`, `Role`, `PicLoc`) VALUES
(8, 'Jano\'s store', 'jan', '14e793d896ddc8ca6911747228e86464cf420065', 'Store', 'photos/2019-01-27.png'),
(9, 'Bebe\'s Store', 'bebe', 'b6204a75b33ab44405d3c00d38a1fd3f67ac2706', 'Store', 'photos/shibaura-1-4.jpg'),
(2101, 'Janno Palacios', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', 'photos/2019-01-22.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblautonumbers`
--
ALTER TABLE `tblautonumbers`
  ADD PRIMARY KEY (`AUTOID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `tblinventory`
--
ALTER TABLE `tblinventory`
  ADD PRIMARY KEY (`TransID`),
  ADD UNIQUE KEY `ProductID` (`ProductID`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `tblstockin`
--
ALTER TABLE `tblstockin`
  ADD PRIMARY KEY (`StockinID`);

--
-- Indexes for table `tblstockout`
--
ALTER TABLE `tblstockout`
  ADD PRIMARY KEY (`StockoutID`);

--
-- Indexes for table `tblstore`
--
ALTER TABLE `tblstore`
  ADD PRIMARY KEY (`StoreID`);

--
-- Indexes for table `tblsummary`
--
ALTER TABLE `tblsummary`
  ADD PRIMARY KEY (`SummaryID`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblautonumbers`
--
ALTER TABLE `tblautonumbers`
  MODIFY `AUTOID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblinventory`
--
ALTER TABLE `tblinventory`
  MODIFY `TransID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblstockin`
--
ALTER TABLE `tblstockin`
  MODIFY `StockinID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblstockout`
--
ALTER TABLE `tblstockout`
  MODIFY `StockoutID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblstore`
--
ALTER TABLE `tblstore`
  MODIFY `StoreID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2102;

--
-- AUTO_INCREMENT for table `tblsummary`
--
ALTER TABLE `tblsummary`
  MODIFY `SummaryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2019 at 04:55 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbitrack`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `PCPAdmin` varchar(256) NOT NULL,
  `WCPCAdmin` varchar(256) NOT NULL,
  `InvestAdmin` varchar(256) NOT NULL,
  `pwdAdmin` longtext NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `adminview`
--

CREATE TABLE `adminview` (
  `userID` int(11) NOT NULL,
  `benNum` int(11) NOT NULL,
  `compOffense` varchar(150) NOT NULL,
  `dateComi` date NOT NULL,
  `compStatus` longtext NOT NULL,
  `compInv` varchar(200) NOT NULL,
  `compRemarks` longtext NOT NULL,
  `dateCompl` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminview`
--

INSERT INTO `adminview` (`userID`, `benNum`, `compOffense`, `dateComi`, `compStatus`, `compInv`, `compRemarks`, `dateCompl`) VALUES
(0, 1, 'pananakit kay maria', '2019-03-07', 'COMPLETED', 'SPO1 CRUZ', 'click for more info', NULL),
(0, 2, 'pananakit', '2019-08-08', 'Under Investigation', 'SPO1 bautista', 'wala', NULL),
(0, 3, 'pananait', '2019-09-08', '', 'Under Investigationspo 1 bautista', 'sdofosa', NULL),
(0, 4, 'wrwq', '2018-02-03', '', 'Under Investigationspo1 manila', 'ifjas', NULL),
(0, 5, 'pananakit kay ', '2019-03-07', '', 'Under InvestigationSPO1 CRUZ', 'click for more info', NULL),
(0, 6, 'hello', '0000-00-00', '', 'Under Investigationsecret', 'ano walang remarks', NULL),
(0, 7, 'Pananakit ni Ravince', '0000-00-00', '', 'Under InvestigationSPO1 Romero', 'MAsakit', NULL),
(0, 8, 'sdfasf', '0000-00-00', '', 'under_investigationsadfsd', 'safsa', NULL),
(0, 9, 'wrwqr', '0000-00-00', '', 'under_investigationwerwrw', 'wrwe', NULL),
(0, 10, 'qwerwer', '0000-00-00', 'under_investigation', 'wqrwqr', 'wqerw', NULL),
(0, 11, 'wqerwrw', '0000-00-00', 'under_investigation', 'wqerwr', 'qwerwqe', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_signup`
--

CREATE TABLE `admin_signup` (
  `signupadminId` int(11) NOT NULL,
  `fnameAdmin` varchar(30) NOT NULL,
  `mnameAdmin` varchar(30) DEFAULT NULL,
  `lnameAdmin` varchar(30) NOT NULL,
  `usernameAdmin` varchar(30) NOT NULL,
  `adminPosition` varchar(30) NOT NULL,
  `adminRole` varchar(30) NOT NULL,
  `adminPassword` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_signup`
--

INSERT INTO `admin_signup` (`signupadminId`, `fnameAdmin`, `mnameAdmin`, `lnameAdmin`, `usernameAdmin`, `adminPosition`, `adminRole`, `adminPassword`) VALUES
(1, 'Paulyn', 'T. ', 'Romero', 'Plynrmr', 'PO1', 'admin', '$2y$10$4WT1z84s7zaxrlV6zVw1eOQ'),
(2, 'Paulyn', 'Tablada', 'Romero', 'Chacha', 'PO3', 'investigator', '$2y$10$Aiz8Qe7UdCulBc/NlKWU..3'),
(3, 'Rosiebelt', 'Ayupan', 'Abisado', 'belt', 'PO1', 'investigator', '$2y$10$H8.FIOy5fk8lRPePvoPXfOe');

-- --------------------------------------------------------

--
-- Table structure for table `complainant_signup`
--

CREATE TABLE `complainant_signup` (
  `ComplainantId` int(11) NOT NULL,
  `referenceNumber` varchar(30) NOT NULL,
  `fName` varchar(30) NOT NULL,
  `lName` varchar(30) NOT NULL,
  `compPwd` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complainant_signup`
--

INSERT INTO `complainant_signup` (`ComplainantId`, `referenceNumber`, `fName`, `lName`, `compPwd`) VALUES
(1, '7890', 'Pau', 'Romero', '$2y$10$ImflcNL0DXURljypT0ozD.x'),
(2, '445566', 'Charity', 'Huilar', '$2y$10$Lyotm24df487veXrtSkzNOY'),
(3, '1213', 'fdjs', 'jsfsdjkf', '$2y$10$fa6FCA1EP0.0At0bAtb1oOn');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `benNum` int(11) NOT NULL,
  `dateAns` date NOT NULL,
  `feed_process` varchar(30) NOT NULL,
  `feed_accomodation` varchar(30) NOT NULL,
  `feed_service` varchar(30) NOT NULL,
  `feed_comments` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackId`, `userId`, `benNum`, `dateAns`, `feed_process`, `feed_accomodation`, `feed_service`, `feed_comments`) VALUES
(1, 0, 0, '0000-00-00', 'napakahusay', 'mahusay', 'mahusay', 'panget ni nikko'),
(2, 0, 0, '2019-03-13', 'nangangailangan', 'hindimahusay', 'mahusay', 'Testing'),
(3, 2, 0, '2019-03-13', 'napakahusay', 'napakahusay', 'napakahusay', 'Good JOb'),
(4, 2, 1, '2019-03-13', 'napakahusay', 'napakahusay', 'napakahusay', 'sdfafdsf'),
(5, 2, 0, '2019-03-13', 'hindimahusay', 'hindimahusay', 'nangangailangan', 'ayaw ko na mag thesis\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `incident_mgmt`
--

CREATE TABLE `incident_mgmt` (
  `incidentTicket` int(11) NOT NULL,
  `incident` varchar(300) NOT NULL,
  `date_time` datetime NOT NULL,
  `incidentInv` varchar(300) NOT NULL,
  `incidentReport` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `isAdmin` tinyint(1) NOT NULL,
  `idUsers` int(11) NOT NULL,
  `fnameUser` varchar(256) NOT NULL,
  `mnameUser` varchar(256) NOT NULL,
  `lnameUser` varchar(256) NOT NULL,
  `uidUsers` varchar(256) NOT NULL,
  `emailUsers` varchar(256) NOT NULL,
  `pwdUsers` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`isAdmin`, `idUsers`, `fnameUser`, `mnameUser`, `lnameUser`, `uidUsers`, `emailUsers`, `pwdUsers`) VALUES
(1, 2, '', '', '', 'admin', 'admin@gmail.com', '$2y$10$EApl2QifzTV.JRG5/n33DOBUQwTXbyOTK/HacFw35bTMF7xUIN12O'),
(0, 3, '', '', '', 'pau', 'paulyn@gmail.com', '$2y$10$lf9gq9vJxVm00z8/kXFaNeaq/QD5HK.SRGHc5wKfhvIiAwgEzmYZe'),
(0, 7, 'sfsf', 'sffs', 'sfsfsa', 'hello', 'trish98@gmail.com', '$2y$10$X/eiAqohBzU/zLH5neRO..uNMWUR91HaVau0omjj1eCK5HMLKK0c2'),
(0, 8, 'sdff', 'asfsaf', 'sdfasf', 'sfsdf', 'trish98@gmail.com', '$2y$10$MVC39Pn//tHYt5Iaj2.iJeu5j63MhzESobuhYLxook4os.rbm2XYm'),
(0, 9, 'werwqr', 'werwqer', 'wqerwqr', 'hellooo', 'trish98@gmail.com', '$2y$10$pX8mOA8Ff5xCKmVG/txcl.qx0wYenOAiRkMSNuQj/ytsTMFBg7efi'),
(0, 10, 'ewqf', 'wefwqef', 'wefwqf', 'jello', 'trish98@gmail.com', '$2y$10$KlblQJC3cOuG.n1thi.Iyuo3BRGF7jIE1KYyNvanfCP5fy0pHy2x2'),
(0, 11, 'werw', 'werqwr', 'werw', 'werwq', 'trish98@gmail.com', '$2y$10$6vtioLSX6VRh1T5NbKHh.enLGYin3BTwNXbpWWuAvJ6cMt6idzB7S'),
(0, 12, 'hello', 'hello', 'hello', 'trishy', 'trish98@gmail.com', '$2y$10$i/OsOf/xvgJwIxrOPThBvujLD51m1x8cBAwbhsLhuJnVSn24rRcA2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `adminview`
--
ALTER TABLE `adminview`
  ADD PRIMARY KEY (`benNum`);

--
-- Indexes for table `admin_signup`
--
ALTER TABLE `admin_signup`
  ADD PRIMARY KEY (`signupadminId`);

--
-- Indexes for table `complainant_signup`
--
ALTER TABLE `complainant_signup`
  ADD PRIMARY KEY (`ComplainantId`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackId`);

--
-- Indexes for table `incident_mgmt`
--
ALTER TABLE `incident_mgmt`
  ADD PRIMARY KEY (`incidentTicket`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminview`
--
ALTER TABLE `adminview`
  MODIFY `benNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admin_signup`
--
ALTER TABLE `admin_signup`
  MODIFY `signupadminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `complainant_signup`
--
ALTER TABLE `complainant_signup`
  MODIFY `ComplainantId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `incident_mgmt`
--
ALTER TABLE `incident_mgmt`
  MODIFY `incidentTicket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

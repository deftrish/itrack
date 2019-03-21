-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 21, 2019 at 09:11 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

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
  `PCPAdmin` varchar(256) DEFAULT NULL,
  `WCPCAdmin` varchar(256) DEFAULT NULL,
  `InvestAdmin` varchar(256) DEFAULT NULL,
  `idAdmin` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `admin_type` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`PCPAdmin`, `WCPCAdmin`, `InvestAdmin`, `idAdmin`, `userID`, `admin_type`) VALUES
(NULL, NULL, NULL, 1, 0, 'didm'),
(NULL, NULL, NULL, 2, 17, 'didm'),
(NULL, NULL, NULL, 3, 18, 'didm'),
(NULL, NULL, NULL, 4, 19, 'incharge'),
(NULL, NULL, NULL, 5, 20, 'incharge'),
(NULL, NULL, NULL, 6, 0, 'investigator'),
(NULL, NULL, NULL, 7, 21, 'didm'),
(NULL, NULL, NULL, 8, 22, 'didm'),
(NULL, NULL, NULL, 9, 23, 'didm'),
(NULL, NULL, NULL, 10, 24, 'investigator');

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
(0, 12, 'Nagnakaw ng cellphone', '0000-00-00', 'under_investigation', 'SPO3 Romero', 'edi remarks', NULL),
(0, 13, 'Nagnakaw ng cellphone', '2011-08-17', 'under_investigation', 'SPO3 Romero', 'Still on going', NULL),
(0, 14, 'Nangholdap ng student', '2014-08-21', 'under_investigation', 'SPO5 Sy', 'On going ', NULL),
(0, 20, 'Nagbugbog sa computer shop', '2019-02-20', 'cleared', 'SPO6 Garcia', 'Still on-going', NULL);

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
  `incidentReport` longtext NOT NULL,
  `incidentCategory` varchar(100) NOT NULL,
  `incidentPriority` varchar(100) NOT NULL,
  `incidentDesc` varchar(300) NOT NULL,
  `is_closed` tinyint(1) NOT NULL,
  `is_archived` tinyint(1) NOT NULL,
  `resolved_at` datetime NOT NULL,
  `closed_by` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incident_mgmt`
--

INSERT INTO `incident_mgmt` (`incidentTicket`, `incident`, `date_time`, `incidentInv`, `incidentReport`, `incidentCategory`, `incidentPriority`, `incidentDesc`, `is_closed`, `is_archived`, `resolved_at`, `closed_by`) VALUES
(1, 'sdf', '2019-03-13 11:11:00', '2', 'sfdasfsdf\r\n					', 'networkInterruption', 'high', 'aaaaa', 1, 0, '0000-00-00 00:00:00', '0'),
(2, 'Feedback not working', '2019-03-18 22:00:00', '2', 'Feedback is not working', 'networkInterruption', 'low', 'sdfsdf', 1, 0, '0000-00-00 00:00:00', '0'),
(3, '343', '2019-03-15 22:22:00', '2', '					kkk', 'networkInterruption', 'medium', 's', 0, 0, '0000-00-00 00:00:00', '0'),
(4, 'Feedback not working', '2019-03-21 21:00:00', '24', 'It is not working s', '12', '', '', 1, 0, '2019-03-21 21:00:54', '2'),
(5, 'Fail to load entries in admin view', '2023-02-03 03:15:00', '2', 'does not show', '', '', '', 1, 0, '2019-03-21 20:34:54', '5');

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
  `pwdUsers` varchar(256) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`isAdmin`, `idUsers`, `fnameUser`, `mnameUser`, `lnameUser`, `uidUsers`, `pwdUsers`, `isDeleted`) VALUES
(1, 2, 'first name', 'middle name', 'last name', 'admin', '$2y$10$EApl2QifzTV.JRG5/n33DOBUQwTXbyOTK/HacFw35bTMF7xUIN12O', 0),
(0, 3, '', '', '', 'pau', '$2y$10$lf9gq9vJxVm00z8/kXFaNeaq/QD5HK.SRGHc5wKfhvIiAwgEzmYZe', 0),
(0, 7, 'sfsf', 'sffs', 'sfsfsa', 'hello', '$2y$10$X/eiAqohBzU/zLH5neRO..uNMWUR91HaVau0omjj1eCK5HMLKK0c2', 0),
(0, 8, 'sdff', 'asfsaf', 'sdfasf', 'sfsdf', '$2y$10$MVC39Pn//tHYt5Iaj2.iJeu5j63MhzESobuhYLxook4os.rbm2XYm', 0),
(0, 9, 'werwqr', 'werwqer', 'wqerwqr', 'hellooo', '$2y$10$pX8mOA8Ff5xCKmVG/txcl.qx0wYenOAiRkMSNuQj/ytsTMFBg7efi', 0),
(0, 10, 'ewqf', 'wefwqef', 'wefwqf', 'jello', '$2y$10$KlblQJC3cOuG.n1thi.Iyuo3BRGF7jIE1KYyNvanfCP5fy0pHy2x2', 0),
(0, 11, 'werw', 'werqwr', 'werw', 'werwq', '$2y$10$6vtioLSX6VRh1T5NbKHh.enLGYin3BTwNXbpWWuAvJ6cMt6idzB7S', 0),
(0, 12, 'hello', 'hello', 'hello', 'trishy', '$2y$10$i/OsOf/xvgJwIxrOPThBvujLD51m1x8cBAwbhsLhuJnVSn24rRcA2', 0),
(1, 16, 'Rosiebelt', 'Jun', 'Abisado', '', '$2y$10$lfx6p7jn2Naig/dhxMbT2OOsvc4I1fi/9DoD95DGTDv3r9XCeBVUi', 0),
(1, 17, 'Rosiebelt', 'Jun', 'Abisado', '', '$2y$10$kQ5y16xV4ez2e5KNmO0/fOLbEpqCC0LYbA5uxC0kwWx6fyDLqUejK', 0),
(1, 18, 'trish', 'chua', 'chua', '', '$2y$10$BHZcL.x1DUVu3BTxRwGrreDeX.fLnQTeRzeuxZKwKneTTLeQjRkrK', 1),
(1, 19, 'Paulyn', 'T', 'Romero', '', '$2y$10$p6cpjerBlaD5I6oFvDZH8eIIEUhaUDsW6fb7PKJqQPAhVL6GijlnW', 0),
(1, 20, 'Genedine ', 'A.', 'Magbitang', '', '$2y$10$TSeZiwQhgrjnyC8Vz4qI0.iNflcftVMbooc3mwMWGlLXrDmvmZDiK', 0),
(1, 21, 'Beltjun', 'Beltjun', 'beltjun', '', '$2y$10$prriHce9WZ0VV94FOMZxKOTKPkJ65yVMx4NiDqpBpUVFQkPhIrmDS', 0),
(1, 22, 'belt', 'belt', 'belt', '', '$2y$10$tLdw77r1NCd5EQxANiwLgOqbuU8ndwanuy6jrGSTaWUjUzJkQpW1u', 1),
(1, 23, 'Lorem', 'Ipsilom', 'Last', 'lorem', '$2y$10$ZLoudT/pg2ujO4rfTBxHK.syhdKXDuIbjM3IH6iay3bmV82ix7LWW', 0),
(1, 24, 'Jolo', 'R.', 'Sunga', 'jsunga', '$2y$10$j031b5s13MClWGn0LvitW.BGgFGSlWryO/x4q6uyBHg8LUu61UdAi', 0);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `adminview`
--
ALTER TABLE `adminview`
  MODIFY `benNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `incident_mgmt`
--
ALTER TABLE `incident_mgmt`
  MODIFY `incidentTicket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

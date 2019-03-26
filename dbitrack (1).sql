-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2019 at 08:27 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.15

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
(NULL, NULL, NULL, 2, 17, 'itms'),
(NULL, NULL, NULL, 3, 18, 'didm'),
(NULL, NULL, NULL, 4, 19, 'incharge'),
(NULL, NULL, NULL, 5, 20, 'incharge'),
(NULL, NULL, NULL, 6, 0, 'investigator'),
(NULL, NULL, NULL, 7, 21, 'didm'),
(NULL, NULL, NULL, 8, 22, 'didm'),
(NULL, NULL, NULL, 9, 23, 'didm'),
(NULL, NULL, NULL, 10, 24, 'investigator'),
(NULL, NULL, NULL, 11, 25, 'didm'),
(NULL, NULL, NULL, 12, 26, 'investigator'),
(NULL, NULL, NULL, 13, 27, 'investigator'),
(NULL, NULL, NULL, 14, 28, 'incharge'),
(NULL, NULL, NULL, 15, 37, 'didm'),
(NULL, NULL, NULL, 16, 38, 'itms'),
(NULL, NULL, NULL, 17, 39, 'investigator'),
(NULL, NULL, NULL, 18, 40, 'incharge');

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
  `remark_id` int(11) NOT NULL,
  `dateCompl` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminview`
--

INSERT INTO `adminview` (`userID`, `benNum`, `compOffense`, `dateComi`, `compStatus`, `compInv`, `compRemarks`, `remark_id`, `dateCompl`) VALUES
(32, 12, 'Nagnakaw ng cellphone', '0000-00-00', 'under_investigation', 'SPO3 Romero', 'On going', 18, NULL),
(34, 13, 'Nagnakaw ng cellphone', '2011-08-17', 'under_investigation', 'SPO3 Romero', 'On going', 10, NULL),
(33, 20, 'Nagbugbog sa computer shop', '2019-02-20', 'solved', 'SPO6 Garcia', 'On going', 14, '2019-03-15'),
(35, 33, 'Nambulabog ng kapitbahay', '2019-03-22', 'solved', 'SPO2 Dalisay', 'On going', 13, '2019-03-22'),
(36, 34, 'Nambubulabog ng Kapitbahay', '2019-03-22', 'under_investigation', 'SPO2 Dalisay', 'On going', 16, NULL);

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
(5, 2, 0, '2019-03-13', 'hindimahusay', 'hindimahusay', 'nangangailangan', 'ayaw ko na mag thesis\r\n'),
(6, 36, 0, '2019-03-24', 'hindimahusay', 'mahusay', 'mahusay', 'Napakasaya hehe');

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
(1, 'sdf', '2019-03-13 11:11:00', '2', 'sfdasfsdf\r\n					', 'networkInterruption', 'high', 'aaaaa', 1, 0, '2019-03-24 06:31:28', '25'),
(2, 'Feedback not working', '2019-03-18 22:00:00', '2', 'Feedback is not working', 'networkInterruption', 'low', 'sdfsdf', 1, 0, '0000-00-00 00:00:00', '0'),
(3, '343', '2019-03-15 22:22:00', '2', '					kkk', 'networkInterruption', 'medium', 's', 1, 0, '2019-03-23 07:20:40', '2'),
(4, 'Feedback not working', '2019-03-21 21:00:00', '24', 'It is not working s', '12', '', '', 1, 0, '2019-03-21 21:00:54', '2'),
(5, 'Fail to load entries in admin view', '2023-02-03 03:15:00', '2', 'does not show', '', '', '', 0, 0, '0000-00-00 00:00:00', ''),
(6, '', '0000-00-00 00:00:00', '2', '					', 'UI', 'medium', 'Hello', 1, 0, '2019-03-22 12:10:46', '2'),
(7, 'I cannot access the case', '2019-03-22 17:03:00', '2', 'Hello po\r\n', '', '', '', 1, 0, '2019-03-22 09:30:15', '2'),
(8, 'Report not generate', '2019-03-22 19:15:00', '2', 'I cannot generate reports anong petsa na uwian na', 'UI', 'medium', 'Anubayan, uwi na! ako na bahala sau ;)', 1, 0, '2019-03-22 12:16:06', '2'),
(9, 'Cancel button not working', '2019-03-22 19:25:00', '2', 'Ano ba ayusin agad ha					', '', '', '', 1, 0, '2019-03-22 12:25:37', '2'),
(10, 'Re-open ui ', '2019-03-22 23:21:00', '2', 'Re-open user interface is not good					', 'UI', 'medium', 'We will fix this', 1, 0, '2019-03-23 01:21:56', '2'),
(11, 'Feedback not working', '2019-03-23 21:04:00', '24', 'Feedback not working', '', '', '', 1, 0, '2019-03-23 02:08:37', '24'),
(12, 'Feedback not working', '2019-03-23 09:32:00', '24', 'Feedback is not working', 'systemError', 'high', 'Wait a minute', 1, 0, '2019-03-23 10:55:29', '2'),
(13, 'Generating of reports not working', '2019-03-24 13:27:00', '25', 'Generating of reports not working, why is that? I need to create that report asap', '', '', '', 0, 0, '0000-00-00 00:00:00', ''),
(14, 'Testing', '2019-03-15 00:12:00', '37', 'hahah testing\r\n', '', '', '', 0, 0, '0000-00-00 00:00:00', ''),
(15, 'hello didm', '2019-03-25 01:11:00', '37', 'hello again, didm here					', '', '', '', 0, 0, '0000-00-00 00:00:00', ''),
(16, 'hello police', '2019-03-25 01:55:00', '40', 'Hello police\r\n', 'UI', 'low', 'Will check!', 0, 0, '0000-00-00 00:00:00', ''),
(17, 'Submit button not working', '0000-00-00 00:00:00', '39', '	Submit button is not functioning properly', '', '', '', 0, 0, '0000-00-00 00:00:00', ''),
(18, 'Hello duty', '2019-03-24 19:17:43', '39', 'Hello duty', 'UI', 'low', 'Oy ', 0, 0, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE `remarks` (
  `id` int(11) NOT NULL,
  `remark` varchar(300) NOT NULL,
  `adminview_id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `remarks`
--

INSERT INTO `remarks` (`id`, `remark`, `adminview_id`, `userID`, `created_at`) VALUES
(2, 'some changes need to change', 12, 2, '2019-03-24 04:50:47'),
(3, 'another change', 12, 2, '2019-03-24 06:13:03'),
(4, '', 12, 2, '2019-03-24 06:17:53'),
(5, '', 12, 2, '2019-03-24 06:18:01'),
(6, 'final testing remarks', 12, 2, '2019-03-24 06:45:03'),
(7, 'hahah', 12, 2, '2019-03-24 06:50:21'),
(8, 'that someday it will lead me back to you', 12, 25, '2019-03-24 07:04:56'),
(9, 'ffffff', 13, 25, '2019-03-24 07:24:31'),
(10, 'lost stars', 13, 25, '2019-03-24 07:24:53'),
(11, 'kjkjkjkj', 20, 25, '2019-03-24 07:37:33'),
(12, 'dag dag bayad', 20, 2, '2019-03-24 07:37:49'),
(13, 'solved', 33, 2, '2019-03-24 10:33:54'),
(14, 'solved', 20, 2, '2019-03-24 10:34:10'),
(15, 'asdfsadfsdf', 34, 2, '2019-03-24 16:55:20'),
(16, 'Processing', 34, 2, '2019-03-24 16:55:45'),
(17, 'test duty', 12, 39, '2019-03-24 17:54:00'),
(18, 'yo', 12, 39, '2019-03-24 18:57:54');

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
(1, 17, 'Rosiebeltaaaa', 'Jun', 'Abisado', 'rosie', '$2y$10$9orG5n99EqLaz53oCr9./u3pXtHVfPEHY9CYFbyHdK1x5mOOrXRQ.', 0),
(1, 18, 'trish', 'chua', 'chua', '', '$2y$10$BHZcL.x1DUVu3BTxRwGrreDeX.fLnQTeRzeuxZKwKneTTLeQjRkrK', 1),
(1, 19, 'Paulyn', 'T', 'Romero', '', '$2y$10$p6cpjerBlaD5I6oFvDZH8eIIEUhaUDsW6fb7PKJqQPAhVL6GijlnW', 1),
(1, 20, 'Genedine ', 'A.', 'Magbitang', '', '$2y$10$TSeZiwQhgrjnyC8Vz4qI0.iNflcftVMbooc3mwMWGlLXrDmvmZDiK', 1),
(1, 21, 'Beltjun', 'Beltjun', 'beltjun', '', '$2y$10$prriHce9WZ0VV94FOMZxKOTKPkJ65yVMx4NiDqpBpUVFQkPhIrmDS', 1),
(1, 22, 'belt', 'belt', 'belt', '', '$2y$10$tLdw77r1NCd5EQxANiwLgOqbuU8ndwanuy6jrGSTaWUjUzJkQpW1u', 1),
(1, 23, 'Lorem', 'Ipsilom', 'Last', 'lorem', '$2y$10$ZLoudT/pg2ujO4rfTBxHK.syhdKXDuIbjM3IH6iay3bmV82ix7LWW', 1),
(1, 24, 'Jolo', 'R.', 'Sunga', 'jsunga', '$2y$10$j031b5s13MClWGn0LvitW.BGgFGSlWryO/x4q6uyBHg8LUu61UdAi', 1),
(1, 25, 'Divinagracia', 'R', 'Mariano', 'Gmariano', '$2y$10$MO400pcL6/KoNnj.ePI/y./Z/FHCixQB1GQaNqizgihc/slBl1ZLm', 1),
(1, 26, 'Christopher ', 'D. ', 'Ladao', 'cladao', '$2y$10$ytpbj77FRrftYyfbZDIBuez9jC6dAAX2zhLeSftCIVcYXW.xipaNS', 1),
(1, 27, 'Christopher ', 'D. ', 'Ladao', 'cladao', '$2y$10$QQ59Y/77DAwqDIoYBtOmEeKaqs6jEJ0dQn6Y7HrVvGwsvyCa64qkO', 1),
(1, 28, 'William', 'C.', 'Cortez', 'wcortez', '$2y$10$KbT7w.B/Le0zWX4aYqW/ueG79JX/VxIF.lSJD80RVsdmt79sC4VC2', 1),
(0, 29, 'sdf', 'asdf', 'asdf', 'asdf', '$2y$10$prxTZF8d22g6duI65glKR.Bjru1Nc.bdjO8OBhqyIT4AT0gv9aLWa', 0),
(0, 32, '1', '1', '1', '1', '$2y$10$JL7Konf5.FdK/ym1irTIqeiAbJGuvyoJPwc2Vt2OelDfu3bEciJw6', 0),
(0, 33, 'Trish', 'Tamesis', 'Chua', 'tchua', '$2y$10$eCBWAbYhoqItVRMmrq7jzezczx4V1J9385qhLEfhZQSgxIzvQxFB2', 0),
(0, 34, 'Genedine', 'Louise ', 'Magbitang', 'gmagbitang', '$2y$10$s2uAFLsjO1KfBa6squQGCerZKuOEyZTqu/DK27o8QPPzBIyK3yuoa', 0),
(0, 35, 'Tess', 'Tablada', 'Rmero', 'tromero', '$2y$10$tjaNT6G/EW3FjAMvg3dzh.6YyFyYPg2oIg0953hUB4izVtdHhfFJK', 0),
(0, 36, 'Charity', 'Mae', 'Huilar', 'Chacha', '$2y$10$LkdHX.3LkylnT8qF3SuAf.N9n.huDvbay9SDHcpOjI2GV8G7gIlbG', 0),
(1, 37, 'A', 'A', 'a', 'didm', '$2y$10$apkD/HL7N5TXdUv9WMkkrOOMmP97zz7VhmDXLw4izaT8SkvTPaCS2', 0),
(1, 38, 'b', 'b', 'b', 'itms', '$2y$10$p02vqAdBWDdmw9P84CY1p.mJaSo8cTKEDxg69szlQXSnbD5jcJINW', 0),
(1, 39, 'c', 'c', 'c', 'duty', '$2y$10$BPvjN21RsAEXh3JdzIlmHeyDlz5bi3GdF3fPtbvUbe5icI8rj0g5m', 0),
(1, 40, 'd', 'd', 'd', 'police', '$2y$10$fnxGjP1We6FE9wWVf5iLi.Pg4LNYphEEuEH2ZbNHF9z4kNk1PMX5W', 0);

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
-- Indexes for table `remarks`
--
ALTER TABLE `remarks`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `adminview`
--
ALTER TABLE `adminview`
  MODIFY `benNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `incident_mgmt`
--
ALTER TABLE `incident_mgmt`
  MODIFY `incidentTicket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `remarks`
--
ALTER TABLE `remarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

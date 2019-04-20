-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 20, 2019 at 08:52 AM
-- Server version: 5.6.43
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cp897744_itrackDB`
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
(NULL, NULL, NULL, 18, 40, 'incharge'),
(NULL, NULL, NULL, 19, 41, 'itms'),
(NULL, NULL, NULL, 20, 42, 'itms'),
(NULL, NULL, NULL, 21, 43, 'itms'),
(NULL, NULL, NULL, 22, 44, 'investigator');

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
(32, 12, 'Nagnakaw ng cellphone', '0000-00-00', 'solved', 'SPO3 Romero', 'On going', 18, NULL),
(34, 13, 'Nagnakaw ng cellphone', '2011-08-17', 'cleared', 'SPO3 Romero', 'On going', 10, NULL),
(33, 20, 'Nagbugbog sa computer shop', '2019-02-20', 'solved', 'SPO6 Garcia', 'On going', 14, '2019-03-15'),
(35, 33, 'Nambulabog ng kapitbahay', '2019-03-22', 'solved', 'SPO2 Dalisay', 'On going', 13, '2019-03-22'),
(36, 34, 'Nambubulabog ng Kapitbahay', '2019-03-22', 'under_investigation', 'SPO2 Dalisay', 'On going', 16, NULL),
(46, 35, 'Pagnanakaw ng Kotse', '2019-04-03', 'under_investigation', 'PO3 Ramirez', '', 20, NULL),
(45, 36, 'Kidnapping', '2019-04-02', 'under_investigation', 'PO1 Tamesis', '', 19, NULL),
(47, 37, 'Nanaksak ', '2019-04-08', 'under_investigation', 'SPO1 ROMERO', '', 0, NULL);

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
(5, 2, 0, '2019-03-31', 'hindimahusay', 'hindimahusay', 'nangangailangan', 'ayaw ko na mag thesis\r\n'),
(6, 36, 0, '2019-03-24', 'hindimahusay', 'mahusay', 'mahusay', 'Napakasaya hehe'),
(7, 36, 0, '2019-03-25', 'mahusay', 'mahusay', 'mahusay', '1212121'),
(8, 45, 0, '2019-04-04', 'hindimahusay', 'mahusay', 'mahusay', 'Nasiyahan ako'),
(9, 47, 0, '2019-04-08', 'mahusay', 'mahusay', 'mahusay', 'Maganda ang iyong serbisyo');

-- --------------------------------------------------------

--
-- Table structure for table `incident_history`
--

CREATE TABLE `incident_history` (
  `id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `incident_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incident_history`
--

INSERT INTO `incident_history` (`id`, `date_time`, `user_id`, `action`, `description`, `incident_id`) VALUES
(1, '2019-04-03 11:37:57', 17, 'Resolved', 'This incident has been resolved', 5),
(2, '2019-04-03 11:40:30', 17, 'Resolved', 'This incident has been resolved', 20),
(3, '2019-04-03 11:40:41', 37, 'Returned', 'This incident has been returned with a comment: asdfasfdsf', 20),
(4, '2019-04-03 11:52:27', 17, 'Escalated', 'This incident has been escalated to  Ravince Soriano', 20),
(5, '2019-04-03 11:52:49', 17, 'Escalated', 'This incident has been escalated to  Genedine Magbitang', 13),
(6, '2019-04-03 20:13:09', 37, 'Re-open', 'This incident has been re opened', 14),
(7, '2019-04-03 20:16:00', 17, 'Resolved', 'This incident has been resolved', 14),
(8, '2019-04-03 20:16:11', 37, 'Completed', 'This incident has been completed', 14),
(9, '2019-04-03 20:16:25', 37, 'Re-open', 'This incident has been re opened', 14),
(10, '2019-04-03 19:53:15', 37, 'Re-open', 'This incident has been re opened', 19),
(11, '2019-04-03 21:06:06', 38, 'Resolved', 'This incident has been resolved', 23),
(12, '2019-04-03 21:06:26', 37, 'Returned', 'This incident has been returned with a comment: Still not okay', 23),
(13, '2019-04-03 21:06:41', 41, 'Escalated', 'This incident has been escalated to  Patricia  Chua', 23),
(14, '2019-04-03 21:07:04', 38, 'Resolved', 'This incident has been resolved', 23),
(15, '2019-04-03 21:07:58', 38, 'Escalated', 'This incident has been escalated to  Ravince Soriano', 23),
(16, '2019-04-03 21:09:03', 37, 'Returned', 'This incident has been returned with a comment: still not okay', 23),
(17, '2019-04-03 21:12:24', 38, 'Resolved', 'This incident has been resolved', 24),
(18, '2019-04-03 21:15:23', 37, 'Returned', 'This incident has been returned with a comment: Still not okay', 24),
(19, '2019-04-03 21:15:54', 38, 'Escalated', 'This incident has been escalated to  Ravince Soriano', 24),
(20, '2019-04-03 21:16:42', 41, 'Resolved', 'This incident has been resolved', 24),
(21, '2019-04-03 21:17:00', 37, 'Completed', 'This incident has been completed', 24),
(22, '2019-04-03 21:17:23', 37, 'Re-open', 'This incident has been re opened', 24),
(23, '2019-04-03 21:17:56', 41, 'Resolved', 'This incident has been resolved', 24),
(24, '2019-04-03 21:18:07', 37, 'Completed', 'This incident has been completed', 24),
(25, '2019-04-03 23:08:34', 38, 'Resolved', 'This incident has been resolved', 26),
(26, '2019-04-03 23:10:47', 37, 'Completed', 'This incident has been completed', 26),
(27, '2019-04-03 23:12:37', 38, 'Resolved', 'This incident has been resolved', 27),
(28, '2019-04-03 23:13:00', 37, 'Returned', 'This incident has been returned with a comment: I cant', 27),
(29, '2019-04-03 23:13:20', 38, 'Escalated', 'This incident has been escalated to  Ravince Soriano', 27),
(30, '2019-04-03 23:14:11', 41, 'Resolved', 'This incident has been resolved', 27),
(31, '2019-04-03 23:14:25', 37, 'Completed', 'This incident has been completed', 27),
(32, '2019-04-04 01:41:51', 41, 'Resolved', 'This incident has been resolved', 23),
(33, '2019-04-04 01:41:57', 41, 'Resolved', 'This incident has been resolved', 20),
(34, '2019-04-04 01:42:02', 41, 'Resolved', 'This incident has been resolved', 22),
(35, '2019-04-04 01:42:17', 37, 'Completed', 'This incident has been completed', 22),
(36, '2019-04-04 01:42:23', 37, 'Completed', 'This incident has been completed', 20),
(37, '2019-04-04 01:42:29', 37, 'Completed', 'This incident has been completed', 23),
(38, '2019-04-04 05:39:08', 41, 'Escalated', 'This incident has been escalated to  Paulyn Romero', 14),
(39, '2019-04-04 06:04:36', 38, 'Resolved', 'This incident has been resolved', 28),
(40, '2019-04-04 06:05:34', 37, 'Completed', 'This incident has been completed', 28),
(41, '2019-04-20 02:36:43', 41, 'Escalated', 'This incident has been escalated to  Ravince Soriano', 31),
(42, '2019-04-20 03:22:03', 41, 'Resolved', 'This incident has been resolved', 31),
(43, '2019-04-20 05:18:24', 37, 'Completed', 'This incident has been completed', 31),
(44, '2019-04-20 05:52:55', 37, 'Re-open', 'This incident has been re opened', 31),
(45, '2019-04-20 05:54:46', 41, 'Resolved', 'This incident has been resolved', 31);

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
  `closed_by` varchar(11) NOT NULL,
  `complete` tinyint(1) NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_returned` tinyint(1) NOT NULL,
  `comment` varchar(300) DEFAULT NULL,
  `escalated_to` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incident_mgmt`
--

INSERT INTO `incident_mgmt` (`incidentTicket`, `incident`, `date_time`, `incidentInv`, `incidentReport`, `incidentCategory`, `incidentPriority`, `incidentDesc`, `is_closed`, `is_archived`, `resolved_at`, `closed_by`, `complete`, `updated_at`, `is_returned`, `comment`, `escalated_to`) VALUES
(1, 'sdf', '2019-03-13 11:11:00', '2', 'sfdasfsdf\r\n					', 'networkInterruption', 'high', 'aaaaa', 1, 0, '2019-03-24 06:31:28', '25', 0, '0000-00-00 00:00:00', 0, NULL, 0),
(2, 'Feedback not working', '2019-03-18 22:00:00', '2', 'Feedback is not working', 'networkInterruption', 'low', 'sdfsdf', 1, 0, '0000-00-00 00:00:00', '0', 0, '0000-00-00 00:00:00', 0, NULL, 0),
(3, '343', '2019-03-15 22:22:00', '2', '					kkk', 'networkInterruption', 'medium', 's', 1, 0, '2019-03-23 07:20:40', '2', 0, '0000-00-00 00:00:00', 0, NULL, 0),
(4, 'Feedback not working', '2019-03-21 21:00:00', '24', 'It is not working s', '12', '', '', 1, 0, '2019-03-21 21:00:54', '2', 0, '0000-00-00 00:00:00', 0, NULL, 0),
(5, 'Fail to load entries in admin view', '2023-02-03 03:15:00', '2', 'does not show', '', '', '', 1, 0, '2019-04-03 11:37:57', '17', 0, '2019-04-03 11:37:57', 0, NULL, 0),
(6, '', '0000-00-00 00:00:00', '2', '					', 'UI', 'medium', 'Hello', 1, 0, '2019-03-22 12:10:46', '2', 0, '0000-00-00 00:00:00', 0, NULL, 0),
(7, 'I cannot access the case', '2019-03-22 17:03:00', '2', 'Hello po\r\n', '', '', '', 1, 0, '2019-03-22 09:30:15', '2', 0, '0000-00-00 00:00:00', 0, NULL, 0),
(8, 'Report not generate', '2019-03-22 19:15:00', '2', 'I cannot generate reports anong petsa na uwian na', 'UI', 'medium', 'Anubayan, uwi na! ako na bahala sau ;)', 1, 0, '2019-03-22 12:16:06', '2', 0, '0000-00-00 00:00:00', 0, NULL, 0),
(9, 'Cancel button not working', '2019-03-22 19:25:00', '2', 'Ano ba ayusin agad ha					', '', '', '', 1, 0, '2019-03-22 12:25:37', '2', 0, '0000-00-00 00:00:00', 0, NULL, 0),
(10, 'Re-open ui ', '2019-03-22 23:21:00', '2', 'Re-open user interface is not good					', 'UI', 'medium', 'We will fix this', 1, 0, '2019-03-23 01:21:56', '2', 0, '0000-00-00 00:00:00', 0, NULL, 0),
(11, 'Feedback not working', '2019-03-23 21:04:00', '24', 'Feedback not working', '', '', '', 1, 0, '2019-03-23 02:08:37', '24', 0, '0000-00-00 00:00:00', 0, NULL, 0),
(12, 'Feedback not working', '2019-03-23 09:32:00', '24', 'Feedback is not working', 'systemError', 'high', 'Wait a minute', 1, 0, '2019-03-23 10:55:29', '2', 0, '0000-00-00 00:00:00', 0, NULL, 0),
(13, 'Generating of reports not working', '2019-03-24 13:27:00', '25', 'Generating of reports not working, why is that? I need to create that report asap', '', '', '', 0, 0, '0000-00-00 00:00:00', '', 0, '2019-04-03 11:52:49', 0, NULL, 42),
(14, 'Testing', '2019-04-03 20:16:25', '37', 'hahah testing\r\n', '', '', '', 0, 0, '0000-00-00 00:00:00', '', 0, '2019-04-04 05:39:08', 0, NULL, 43),
(15, 'hello didm', '2019-03-25 01:11:00', '37', 'hello again, didm here					', '', '', '', 0, 0, '2019-03-30 09:18:38', '0', 0, '0000-00-00 00:00:00', 0, NULL, 0),
(16, 'hello police', '2019-03-25 01:55:00', '40', 'Hello police\r\n', 'UI', 'low', 'Will check!', 0, 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', 0, NULL, 0),
(17, 'Submit button not working', '0000-00-00 00:00:00', '39', '	Submit button is not functioning properly', '', '', '', 0, 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', 0, NULL, 0),
(18, 'Hello duty', '2019-03-24 19:17:43', '39', 'Hello duty', 'UI', 'low', 'Oy ', 0, 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', 0, NULL, 0),
(19, 'cannot login', '2019-04-03 19:53:15', '37', 'Basta', 'UI', 'high', 'sdfsdf', 0, 0, '0000-00-00 00:00:00', '', 0, '2019-04-03 19:53:15', 0, NULL, 0),
(20, 'button not working', '2019-04-02 20:09:00', '37', 'Button not working', 'systemError', 'medium', 'Will fix this immidiately', 1, 0, '2019-04-04 01:41:57', '41', 1, '2019-04-04 01:42:23', 0, 'asdfasfdsf', 41),
(21, 'feedback not working', '2019-04-02 21:04:00', '37', 'Feedback not working', 'UI', 'medium', 'Wait a minute', 0, 0, '0000-00-00 00:00:00', '', 0, '2019-04-02 04:34:51', 1, NULL, 17),
(22, 'Button Malfunction', '2019-04-01 21:30:00', '37', 'Button Malfunction', 'UI', 'medium', 'User interface', 1, 0, '2019-04-04 01:42:02', '41', 1, '2019-04-04 01:42:17', 0, 'pangit ng code', 41),
(23, 'Dashboard not working', '2019-04-04 05:14:00', '37', 'Dashboard is not working', 'systemError', 'medium', 'Wait for further announcement.', 1, 0, '2019-04-04 01:41:51', '41', 1, '2019-04-04 01:42:29', 0, 'still not okay', 41),
(24, 'feedback not working', '2019-04-03 21:17:23', '37', 'Feedback not working', 'systemError', 'medium', 'Will fix that immediately.', 1, 0, '2019-04-03 21:17:56', '41', 1, '2019-04-03 21:18:07', 0, 'Still not okay', 41),
(25, 'button not working', '2019-04-04 05:22:00', '38', 'button', '', '', '', 0, 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', 0, NULL, 0),
(26, 'Account creation error', '2019-04-04 07:05:00', '37', 'Account creation is having an error', 'networkInterruption', 'low', 'restart the website in your pc', 1, 0, '2019-04-03 23:08:34', '38', 1, '2019-04-03 23:10:47', 0, NULL, 0),
(27, 'Account creation error', '2019-04-04 07:11:00', '37', 'Account creation error', 'networkInterruption', 'low', 'refresh pc', 1, 0, '2019-04-03 23:14:11', '41', 1, '2019-04-03 23:14:25', 0, 'I cant', 41),
(28, 'The button for case archive is not working', '2019-04-04 14:02:00', '37', 'The button for case is not working', 'systemError', 'low', 'Fixing it right now.', 1, 0, '2019-04-04 06:04:36', '38', 1, '2019-04-04 06:05:34', 0, NULL, 0),
(29, '', '0000-00-00 00:00:00', '37', '', '', '', '', 0, 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', 0, NULL, 0),
(30, 'Fail to load entries in Incident Management Log', '2019-01-04 10:23:00', '37', 'Refreshing the Incident Management Log does not show the entries of the logs. ', '', '', '', 0, 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', 0, NULL, 0),
(31, 'Incident History entries not showing up ', '2019-04-20 05:52:55', '37', 'When I was trying to access the incident history, the entries are not showing up. It only shows a blank table.', 'UI', 'high', 'I have changed the code for this error not to repeat again', 1, 0, '2019-04-20 05:54:46', '41', 0, '2019-04-20 05:54:46', 0, NULL, 41);

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE `remarks` (
  `id` int(11) NOT NULL,
  `remark` varchar(300) NOT NULL,
  `adminview_id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `remark_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `remarks`
--

INSERT INTO `remarks` (`id`, `remark`, `adminview_id`, `userID`, `created_at`, `remark_status`) VALUES
(2, 'some changes need to change', 12, 2, '2019-03-24 04:50:47', 'under_investigation'),
(3, 'another change', 12, 2, '2019-03-24 06:13:03', 'cleared'),
(4, '', 12, 2, '2019-03-24 06:17:53', 'cleared'),
(5, '', 12, 2, '2019-03-24 06:18:01', 'cleared'),
(6, 'final testing remarks', 12, 2, '2019-03-24 06:45:03', 'cleared'),
(7, 'hahah', 12, 2, '2019-03-24 06:50:21', 'cleared'),
(8, 'that someday it will lead me back to you', 12, 25, '2019-03-24 07:04:56', 'solved'),
(9, 'ffffff', 13, 25, '2019-03-24 07:24:31', 'under_investigation'),
(10, 'lost stars', 13, 25, '2019-03-24 07:24:53', 'cleared'),
(11, 'kjkjkjkj', 20, 25, '2019-03-24 07:37:33', 'under_investigation'),
(12, 'dag dag bayad', 20, 2, '2019-03-24 07:37:49', 'cleared'),
(13, 'solved', 33, 2, '2019-03-24 10:33:54', 'under_investigation'),
(14, 'solved', 20, 2, '2019-03-24 10:34:10', 'under_investigation'),
(15, 'asdfsadfsdf', 34, 2, '2019-03-24 16:55:20', 'under_investigation'),
(16, 'Processing', 34, 2, '2019-03-24 16:55:45', 'cleared'),
(17, 'test duty', 12, 39, '2019-03-24 17:54:00', 'solved'),
(18, 'yo', 12, 39, '2019-03-24 18:57:54', 'solved'),
(19, 'On going', 36, 39, '2019-04-04 02:55:26', ''),
(20, 'The case is still ongoing', 35, 39, '2019-04-04 05:52:51', '');

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
(1, 17, 'Genedine', 'A.', 'Magbitang', 'Gmagbitang', '$2y$10$ZlQwGZevDaxwHult1h.HuuGQ/a3h1WdsktDyxnWQoMiBMPz/ps.Oe', 0),
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
(1, 37, 'Paulyn', 'T.', 'Romero', 'didm', '$2y$10$TxRAD5vBGuvzH5KumrS1QuwkzkYUzFT6NETZjTlx2VIUO/jHgnZPi', 0),
(1, 38, 'Patricia', 'T.', ' Chua', 'Pchua', '$2y$10$oakvn0t0vBdkyZwwbRuYcerjRATFKrQjFji8/WuTxyjlXDrQOijg.', 0),
(1, 39, 'Mildred', 'c', 'Duran', 'duty', '$2y$10$eKb0b4f0omlOaLI1KUKTNOJ9Ze0ubEsPAP8oJqt4iMC51qO05X4i6', 0),
(1, 40, 'd', 'd', 'd', 'police', '$2y$10$NkENLYYdKL.GzUqlaxVDxeE6FJWWqg1l4IrsljMb3NOWfgEgOV19K', 0),
(1, 41, 'Ravince', 'T. ', 'Soriano', 'rsoriano', '$2y$10$jgMQ2MzRfCdbBGCxVnEyl.POgTvsjPjH74d9jDmssydF1JWErxoZu', 0),
(1, 42, 'Genedine', 'T,', 'Magbitang', 'Gmagbitang', '$2y$10$YQrxGNCnOTgQPVcCUuko7u2ZJNN9laTBn0Vr5gOlt5VFxzvWznVw2', 0),
(1, 43, 'Paulyn', 'T. ', 'Romero', 'Promero', '$2y$10$igxstIPXU6A0OZVr5/NrmuaHqHcwn3228wmltZlENM7.CE/L/SaOa', 0),
(1, 44, 'Paula', 'T.', 'Romero', 'Duty', '$2y$10$J8b.js3nmtxFuBSqocEmTO5Q.PmtGLvfgWQXDx7pWLPUjC4Zp1goy', 0),
(0, 45, 'Miguel', 'D', 'Benevides', 'Mdben', '$2y$10$/QCwxVrBbOJcE2d..p4I0.xKW3yquRB0aGwKaHSuyz0XUBFj/dBA.', 0),
(0, 46, 'Maria', 'M', 'Makiling', 'Maria', '$2y$10$TEkMJvfo/frl/JSxUOst0.CaFu73odz0LGhMD7KIKpCtsHsbQf6eu', 0),
(0, 47, 'JM', 'De', 'Guzman', 'Complainant', '$2y$10$mOECKNna83Td09Ryg8c85ed.oGHvcX6CSdMbDtpiwMEP6RsvKBd1.', 0);

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
-- Indexes for table `incident_history`
--
ALTER TABLE `incident_history`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `adminview`
--
ALTER TABLE `adminview`
  MODIFY `benNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `incident_history`
--
ALTER TABLE `incident_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `incident_mgmt`
--
ALTER TABLE `incident_mgmt`
  MODIFY `incidentTicket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `remarks`
--
ALTER TABLE `remarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

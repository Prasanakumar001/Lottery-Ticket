-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2023 at 10:13 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luckywin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `phonenumber`, `email`) VALUES
(1, 'admin', 'admin@123', '7339120184', 'admin@123.com');

-- --------------------------------------------------------

--
-- Table structure for table `editor`
--

CREATE TABLE `editor` (
  `id` int(100) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `editor`
--

INSERT INTO `editor` (`id`, `content`, `created`, `status`) VALUES
(8, '<p>Our Privacy Policy Was Posted On 13 Sep 2012 And Last Updated On 12 Sep 2021.</p>\r\n<p>This Privacy Policy Describes Our Policies And Procedures On The Collection, Use And Disclosure Of Your Information When You Use The Service And Tells You About Your Privacy Rights And How The Law Protects You.</p>\r\n<p>We Use Your Personal Data To Provide And Improve The Service. By Using The Service, You Agree To The Collection And Use Of Information In Accordance With This Privacy Policy.</p>', '2023-10-24 21:00:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(100) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_start_date` varchar(255) NOT NULL,
  `event_start_time` varchar(255) NOT NULL,
  `event_end_date` varchar(255) NOT NULL,
  `event_end_time` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `event_cat` varchar(255) NOT NULL,
  `updated` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_start_date`, `event_start_time`, `event_end_date`, `event_end_time`, `price`, `status`, `event_cat`, `updated`) VALUES
(1, 'vithun jackpot', '2023-09-27', '13:44', '2023-09-27', '13:49', '10', 1, 'OneDay', '2023-09-27 13:47:05'),
(2, '30 lakhs jayanthi', '2023-10-04', '22:40', '2023-10-05', '01:37', '100', 1, 'OneDay', '2023-10-04 22:52:16'),
(3, 'chumma1', '2023-10-04', '23:27', '2023-10-05', '14:26', '10', 0, 'OneDay', ''),
(4, 'hf', '2023-10-05', '01:10', '2023-10-05', '01:10', '10', 0, 'OneDay', ''),
(5, 'event 3 o clock', '2023-10-05', '15:01', '2023-10-05', '16:01', '1', 0, 'OneDay', ''),
(6, 'geevan1', '2023-10-05', '21:02', '2023-10-05', '22:59', '10', 0, 'OneDay', ''),
(7, 'PSTEST Card', '2023-10-05', '22:02', '2023-10-05', '23:01', '10', 0, 'OneDay', ''),
(8, 'gowtham ka teen ', '2023-10-06', '16:11', '2023-10-06', '17:10', '40', 1, 'OneDay', '2023-10-06 16:16:10'),
(9, '40 lakh', '2023-10-10', '15:01', '2023-10-10', '15:05', '100', 1, 'OneDay', '2023-10-10 15:05:10'),
(10, 'event 10 lakh', '2023-10-10', '16:33', '2023-10-11', '18:34', '40', 0, 'Days', ''),
(11, 'event 2 50 lakh', '2023-10-10', '16:34', '2023-10-10', '20:34', '80', 1, 'OneDay', '2023-10-10 16:41:02'),
(12, 'evee1', '2023-10-11', '20:07', '2023-10-11', '22:05', '100', 0, 'OneDay', ''),
(13, 'event gowtham', '2023-10-12', '15:02', '2023-10-12', '17:59', '100', 1, 'OneDay', '2023-10-12 15:03:44'),
(14, 'jaynthi', '2023-10-13', '15:34', '2023-10-13', '15:56', '50', 1, 'OneDay', '2023-10-13 15:38:13'),
(15, 'diwali dhamaka', '2023-10-17', '12:22', '2023-10-17', '13:37', '100', 1, 'OneDay', '2023-10-17 12:24:46'),
(16, 'check1', '2023-10-17', '12:28', '2023-10-17', '14:26', '200', 1, 'OneDay', '2023-10-17 12:28:56'),
(17, 'PS V CART', '2023-10-19', '03:35', '2023-10-20', '03:35', '100', 0, 'Week', ''),
(33, 'Master', '2023-10-18', '22:06', '2023-10-18', '22:06', '40', 0, 'OneDay', ''),
(34, 'master', '2023-10-18', '22:20', '2023-10-18', '23:17', '10', 0, 'OneDay', ''),
(35, 'pk1', '2023-10-20', '15:23', '2023-10-20', '21:23', '1', 0, 'OneDay', ''),
(36, 'shjegdh', '2023-10-24', '19:06', '2023-10-25', '20:10', '100', 0, 'OneDay', ''),
(37, 'hjbjh', '2023-10-25', '23:11', '2023-10-26', '19:15', '120', 0, 'OneDay', '');

-- --------------------------------------------------------

--
-- Table structure for table `event_tickets`
--

CREATE TABLE `event_tickets` (
  `id` int(100) NOT NULL,
  `event_id` int(100) NOT NULL,
  `event_ticket` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_tickets`
--

INSERT INTO `event_tickets` (`id`, `event_id`, `event_ticket`, `quantity`) VALUES
(1, 1, '1', 3),
(2, 1, '2', 5),
(3, 1, '3', 5),
(4, 1, '4', 5),
(5, 1, '5', 5),
(6, 1, '6', 5),
(7, 1, '7', 5),
(8, 1, '8', 5),
(9, 1, '9', 5),
(10, 1, '10', 5),
(11, 1, '11', 0),
(12, 1, '12', 5),
(13, 1, '13', 5),
(14, 1, '14', 5),
(15, 1, '15', 5),
(16, 1, '16', 5),
(17, 1, '17', 5),
(18, 1, '18', 5),
(19, 1, '19', 5),
(20, 1, '20', 5),
(21, 2, '1', 0),
(22, 2, '2', 0),
(23, 2, '3', 1),
(24, 2, '4', 1),
(25, 2, '5', 1),
(26, 2, '6', 1),
(27, 2, '7', 1),
(28, 2, '8', 1),
(29, 2, '9', 1),
(30, 2, '10', 1),
(31, 3, '0', 0),
(32, 3, '1', 0),
(33, 3, '2', 0),
(34, 3, '3', 0),
(35, 3, '4', 0),
(36, 3, '5', 0),
(37, 3, '6', 0),
(38, 3, '7', 0),
(39, 3, '8', 0),
(40, 3, '9', 0),
(41, 3, '10', 0),
(42, 4, '0', 1),
(43, 4, '1', 1),
(44, 4, '2', 1),
(45, 5, '1', 1),
(46, 5, '2', 1),
(47, 6, '1', 1),
(48, 6, '2', 1),
(49, 7, '1', 1),
(50, 7, '2', 1),
(51, 8, '2500', 0),
(52, 8, '2501', 0),
(53, 8, '2502', 1),
(54, 8, '2503', 0),
(55, 8, '2504', 1),
(56, 8, '2505', 0),
(57, 9, '2000', 5),
(58, 9, '2001', 5),
(59, 9, '2002', 5),
(60, 9, '2003', 5),
(61, 9, '2004', 5),
(62, 9, '2005', 4),
(63, 10, '2222', 4),
(64, 10, '2223', 4),
(65, 10, '2224', 4),
(66, 10, '2225', 4),
(67, 11, '2000', 3),
(68, 11, '2001', 3),
(69, 11, '2002', 4),
(70, 11, '2003', 4),
(71, 11, '2004', 3),
(72, 11, '2005', 3),
(73, 11, '2006', 3),
(74, 12, '1', 1),
(75, 12, '2', 0),
(76, 12, '3', 1),
(77, 12, '4', 1),
(78, 12, '5', 1),
(79, 13, '3000', 0),
(80, 13, '3001', 1),
(81, 13, '3002', 1),
(82, 13, '3003', 1),
(83, 13, '3004', 1),
(84, 13, '3005', 1),
(85, 14, '3000', 0),
(86, 14, '3001', 1),
(87, 14, '3002', 1),
(88, 14, '3003', 1),
(89, 14, '3004', 1),
(90, 14, '3005', 1),
(91, 15, '4000', 0),
(92, 15, '4001', 1),
(93, 15, '4002', 1),
(94, 15, '4003', 1),
(95, 15, '4004', 1),
(96, 15, '4005', 1),
(97, 16, '9000', 0),
(98, 16, '9001', 1),
(99, 16, '9002', 1),
(100, 16, '9003', 1),
(101, 16, '9004', 1),
(102, 16, '9005', 1),
(103, 17, '1111', 1),
(104, 17, '1112', 1),
(105, 17, '1113', 1),
(106, 17, '1114', 1),
(107, 17, '1115', 1),
(108, 17, '1116', 1),
(109, 17, '1117', 1),
(110, 17, '1118', 1),
(111, 17, '1119', 1),
(112, 17, '1120', 1),
(113, 18, '23', 1),
(114, 18, '24', 1),
(115, 19, '0', 1),
(116, 19, '1', 1),
(117, 19, '2', 1),
(118, 19, '3', 1),
(119, 19, '4', 1),
(120, 19, '5', 1),
(121, 19, '6', 1),
(122, 19, '7', 1),
(123, 19, '8', 1),
(124, 19, '9', 1),
(125, 19, '10', 1),
(126, 20, '0', 1),
(127, 20, '1', 1),
(128, 20, '2', 1),
(129, 20, '3', 1),
(130, 20, '4', 1),
(131, 20, '5', 1),
(132, 20, '6', 1),
(133, 20, '7', 1),
(134, 20, '8', 1),
(135, 20, '9', 1),
(136, 20, '10', 1),
(137, 21, '0', 1),
(138, 21, '1', 1),
(139, 21, '2', 1),
(140, 21, '3', 1),
(141, 21, '4', 1),
(142, 21, '5', 1),
(143, 21, '6', 1),
(144, 21, '7', 1),
(145, 21, '8', 1),
(146, 21, '9', 1),
(147, 21, '10', 1),
(148, 22, '1', 1),
(149, 22, '2', 1),
(150, 23, '1', 1),
(151, 23, '2', 1),
(152, 24, '1', 1),
(153, 24, '2', 1),
(154, 25, '1', 1),
(155, 25, '2', 1),
(156, 26, '5', 1),
(157, 26, '6', 1),
(158, 27, '7', 1),
(159, 27, '8', 1),
(160, 27, '9', 1),
(161, 28, '7', 1),
(162, 28, '8', 1),
(163, 28, '9', 1),
(164, 29, '7', 1),
(165, 29, '8', 1),
(166, 29, '9', 1),
(167, 30, '7', 1),
(168, 30, '8', 1),
(169, 30, '9', 1),
(170, 31, '6', 1),
(171, 31, '7', 1),
(172, 31, '8', 1),
(173, 32, '8', 1),
(174, 32, '9', 1),
(175, 33, '1', 1),
(176, 33, '2', 1),
(177, 33, '3', 1),
(178, 33, '4', 1),
(179, 33, '5', 1),
(180, 34, '1', 1),
(181, 34, '2', 1),
(182, 34, '3', 1),
(183, 34, '4', 1),
(184, 34, '5', 1),
(185, 35, '0', 1),
(186, 35, '1', 1),
(187, 35, '2', 1),
(188, 35, '3', 1),
(189, 35, '4', 1),
(190, 35, '5', 1),
(191, 35, '6', 1),
(192, 35, '7', 1),
(193, 35, '8', 1),
(194, 35, '9', 1),
(195, 35, '10', 1),
(196, 36, '1', 1),
(197, 36, '2', 1),
(198, 36, '3', 1),
(199, 36, '4', 1),
(200, 36, '5', 1),
(201, 36, '6', 1),
(202, 37, '8', 1),
(203, 37, '9', 1),
(204, 37, '10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `title`, `image`, `status`) VALUES
(3, 'carousel1', '1696425154.jpg', 0),
(4, 'gtyr', '1696426850.jpg', 0),
(5, 'afdfsf', '1696437767.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `title`, `image`, `created`, `status`) VALUES
(5, 'luckywin', '1696935423.png', '2023-10-10 10:58:48', 0),
(6, 'luckywin', '1696935521.png', '2023-10-24 15:23:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `id` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`id`, `title`, `image`, `created`, `status`) VALUES
(2, 'diwali offer', '1698161683.png', '2023-10-24 15:34:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `userid` int(100) NOT NULL,
  `event_id` int(100) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` int(100) NOT NULL,
  `total` varchar(255) NOT NULL,
  `grandtotal` double(10,2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ticket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `event_id`, `price`, `qty`, `total`, `grandtotal`, `created`, `ticket`) VALUES
(1, 1, 1, '10', 5, '50', 50.00, '2023-09-27 08:15:16', '11'),
(2, 1, 1, '10', 2, '20', 20.00, '2023-09-27 08:15:59', '1'),
(3, 1, 2, '100', 1, '100', 200.00, '2023-10-04 17:21:01', '1'),
(4, 1, 2, '100', 1, '100', 200.00, '2023-10-04 17:21:01', '2'),
(5, 1, 3, '10', 1, '10', 110.00, '2023-10-05 08:42:09', '0'),
(6, 1, 3, '10', 1, '10', 110.00, '2023-10-05 08:42:09', '1'),
(7, 1, 3, '10', 1, '10', 110.00, '2023-10-05 08:42:09', '2'),
(8, 1, 3, '10', 1, '10', 110.00, '2023-10-05 08:42:09', '3'),
(9, 1, 3, '10', 1, '10', 110.00, '2023-10-05 08:42:09', '4'),
(10, 1, 3, '10', 1, '10', 110.00, '2023-10-05 08:42:09', '5'),
(11, 1, 3, '10', 1, '10', 110.00, '2023-10-05 08:42:09', '6'),
(12, 1, 3, '10', 1, '10', 110.00, '2023-10-05 08:42:09', '7'),
(13, 1, 3, '10', 1, '10', 110.00, '2023-10-05 08:42:09', '8'),
(14, 1, 3, '10', 1, '10', 110.00, '2023-10-05 08:42:09', '9'),
(15, 1, 3, '10', 1, '10', 110.00, '2023-10-05 08:42:09', '10'),
(16, 1, 8, '40', 1, '40', 80.00, '2023-10-06 10:42:13', '2500'),
(17, 1, 8, '40', 1, '40', 80.00, '2023-10-06 10:42:13', '2505'),
(18, 3, 8, '40', 1, '40', 40.00, '2023-10-06 10:45:05', '2503'),
(19, 1, 8, '40', 1, '40', 40.00, '2023-10-06 10:48:01', '2501'),
(20, 6, 9, '100', 1, '100', 100.00, '2023-10-10 09:33:43', '2005'),
(21, 1, 11, '80', 1, '80', 160.00, '2023-10-10 11:05:07', '2000'),
(22, 1, 11, '80', 1, '80', 160.00, '2023-10-10 11:05:07', '2001'),
(23, 4, 11, '80', 1, '80', 240.00, '2023-10-10 11:09:26', '2004'),
(24, 4, 11, '80', 1, '80', 240.00, '2023-10-10 11:09:26', '2006'),
(25, 4, 11, '80', 1, '80', 240.00, '2023-10-10 11:09:26', '2005'),
(26, 1, 12, '100', 1, '100', 100.00, '2023-10-11 16:30:02', '2'),
(27, 4, 13, '100', 1, '100', 100.00, '2023-10-12 09:32:42', '3000'),
(28, 4, 14, '50', 1, '50', 50.00, '2023-10-13 10:06:33', '3000'),
(29, 1, 15, '100', 1, '100', 100.00, '2023-10-17 06:53:55', '4000'),
(30, 1, 16, '200', 1, '200', 200.00, '2023-10-17 06:58:24', '9000');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `password`, `phonenumber`, `email`) VALUES
(14, 'natarajan', '12345', '9442087001', 'natarajan@gmail.com'),
(16, 'Jagan', '123456vC@', '9843637686', 'pcvchella99@gmail.com');

-- --------------------------------------------------------

--
-- Stand-in structure for view `sumarry`
-- (See below for the actual view)
--
CREATE TABLE `sumarry` (
`ticket_id` varchar(255)
,`event_id` varchar(255)
,`event_name` varchar(255)
,`event_ticket` varchar(255)
,`userid` int(100)
,`name` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `summary`
-- (See below for the actual view)
--
CREATE TABLE `summary` (
`ticket_id` varchar(255)
,`event_id` varchar(255)
,`event_name` varchar(255)
,`event_ticket` varchar(255)
,`userid` int(100)
,`name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(100) NOT NULL,
  `content` text NOT NULL,
  `created` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `content`, `created`, `status`) VALUES
(3, '<h2>INDIAN LOTTERY LAWS :</h2>\r\n<p>Although There Are Some Gambling Restrictions In India, Legislation For Lotteries And Gambling In General Is Set By Each Individual State And There Are Many States Which Allow People To Play Lotteries Both Online And At Land-Based Lottery Retailers.</p>', '2023-10-07 14:21:45', 1),
(4, '<h2>INDIAN LOTTERIES :</h2>\r\n<p>Individual Indian States Have The Authority To Control Lottery Games In Their Particular Jurisdiction And Ensure That All Lottery Draws That Take Place Are Run Fairly And Comply With The Rules And Regulations Of That Particular Game. Some Of The States Which Allow Lottery Games To Be Played Include Goa, Punjab And Sikkim Governments.</p>', '2023-10-07 14:22:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `winnerlist`
--

CREATE TABLE `winnerlist` (
  `id` int(100) NOT NULL,
  `ticket_id` varchar(255) NOT NULL,
  `event_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `winnerlist`
--

INSERT INTO `winnerlist` (`id`, `ticket_id`, `event_id`) VALUES
(1, '1', '1'),
(2, '2', '1'),
(3, '11', '1'),
(4, '21', '2'),
(5, '22', '2'),
(6, '23', '2'),
(7, '56', '8'),
(8, '58', '9'),
(9, '62', '9'),
(10, '67', '11'),
(11, '69', '11'),
(12, '71', '11'),
(13, '79', '13'),
(14, '82', '13'),
(15, '85', '14'),
(16, '86', '14'),
(17, '88', '14'),
(18, '91', '15'),
(19, '93', '15'),
(20, '96', '15'),
(21, '97', '16'),
(22, '100', '16');

-- --------------------------------------------------------

--
-- Structure for view `sumarry`
--
DROP TABLE IF EXISTS `sumarry`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sumarry`  AS SELECT `wl`.`ticket_id` AS `ticket_id`, `wl`.`event_id` AS `event_id`, `ev`.`event_name` AS `event_name`, `et`.`event_ticket` AS `event_ticket`, `o`.`userid` AS `userid`, `r`.`name` AS `name` FROM ((((`winnerlist` `wl` join `events` `ev` on(`ev`.`id` = `wl`.`event_id`)) join `event_tickets` `et` on(`et`.`id` = `wl`.`ticket_id`)) join `orders` `o`) join `register` `r` on(`r`.`id` = `o`.`userid`)) WHERE `wl`.`event_id` = `o`.`event_id` AND `et`.`event_ticket` = `o`.`ticket` ;

-- --------------------------------------------------------

--
-- Structure for view `summary`
--
DROP TABLE IF EXISTS `summary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `summary`  AS SELECT `wl`.`ticket_id` AS `ticket_id`, `wl`.`event_id` AS `event_id`, `ev`.`event_name` AS `event_name`, `et`.`event_ticket` AS `event_ticket`, `o`.`userid` AS `userid`, `r`.`name` AS `name` FROM ((((`winnerlist` `wl` join `events` `ev` on(`ev`.`id` = `wl`.`event_id`)) join `event_tickets` `et` on(`et`.`id` = `wl`.`ticket_id`)) join `orders` `o`) join `register` `r` on(`r`.`id` = `o`.`userid`)) WHERE `wl`.`event_id` = `o`.`event_id` AND `et`.`event_ticket` = `o`.`ticket` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `editor`
--
ALTER TABLE `editor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_tickets`
--
ALTER TABLE `event_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `winnerlist`
--
ALTER TABLE `winnerlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `editor`
--
ALTER TABLE `editor`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `event_tickets`
--
ALTER TABLE `event_tickets`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `winnerlist`
--
ALTER TABLE `winnerlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

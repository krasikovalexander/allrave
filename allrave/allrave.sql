-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2015 at 05:48 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `allrave`
--

-- --------------------------------------------------------

--
-- Table structure for table `fx_account_details`
--

CREATE TABLE IF NOT EXISTS `fx_account_details` (
`id` bigint(20) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(160) DEFAULT NULL,
  `customer` varchar(150) NOT NULL,
  `city` varchar(40) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `address` varchar(64) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `vat` varchar(32) NOT NULL,
  `language` varchar(40) DEFAULT 'english',
  `avatar` varchar(32) NOT NULL DEFAULT 'default_avatar.jpg'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `fx_account_details`
--

INSERT INTO `fx_account_details` (`id`, `user_id`, `fullname`, `customer`, `city`, `country`, `address`, `phone`, `vat`, `language`, `avatar`) VALUES
(2, 2, 'navi', '0', NULL, NULL, '', '', '', 'english', 'default_avatar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fx_activities`
--

CREATE TABLE IF NOT EXISTS `fx_activities` (
`activity_id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `module` varchar(32) CHARACTER SET latin1 NOT NULL,
  `module_field_id` int(11) NOT NULL,
  `activity` varchar(255) CHARACTER SET latin1 NOT NULL,
  `activity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `icon` varchar(32) CHARACTER SET latin1 DEFAULT 'fa-coffee',
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=674 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_activities`
--

INSERT INTO `fx_activities` (`activity_id`, `user`, `module`, `module_field_id`, `activity`, `activity_date`, `icon`, `deleted`) VALUES
(1, 1, 'Clients', 1, 'Added a new customer 360itpro', '2014-11-16 03:49:38', 'fa-user', 0),
(2, 1, 'Users', 1, 'Updated System User : Navrinder Singh', '2014-11-16 04:30:49', 'fa-edit', 0),
(3, 1, 'Customers', 1, 'Updated Customer 360itpro', '2014-11-16 04:44:55', 'fa-edit', 0),
(7, 1, 'events', 1, 'Admin created a project #PRO81183', '2014-11-16 05:33:33', 'fa-coffee', 0),
(8, 1, 'events', 1, 'Added a task aaa', '2014-11-16 05:38:35', 'fa-tasks', 0),
(9, 1, 'Customers', 1, 'Updated Customer 360itpro', '2014-11-16 06:49:06', 'fa-edit', 0),
(10, 1, 'events', 1, 'Admin edited a project #PRO81183', '2014-11-17 18:31:25', 'fa-coffee', 0),
(11, 1, 'events', 1, 'Admin edited a project #PRO81183', '2014-11-17 18:31:36', 'fa-coffee', 0),
(12, 1, 'events', 1, 'Admin edited a project #PRO81183', '2014-11-17 18:36:31', 'fa-coffee', 0),
(13, 1, 'events', 1, 'Admin edited a project #PRO81183', '2014-11-17 19:04:55', 'fa-coffee', 0),
(14, 1, 'events', 1, 'Admin edited a project #PRO81183', '2014-11-17 19:05:24', 'fa-coffee', 0),
(15, 1, 'events', 1, 'Admin edited a project #PRO81183', '2014-11-17 19:10:44', 'fa-coffee', 0),
(16, 1, 'Customers', 2, 'Added a new customer aa', '2014-11-17 22:49:38', 'fa-user', 0),
(17, 1, 'Customers', 2, 'Added a new customer asd', '2014-11-17 22:51:47', 'fa-user', 0),
(27, 1, 'event_orders', 1, 'admin deleted a event_order', '2014-11-18 21:18:04', 'fa-times', 0),
(20, 1, 'Customers', 4, 'Added a new customer Private', '2014-11-18 17:12:05', 'fa-user', 0),
(21, 1, 'Customers', 5, 'Added a new customer other', '2014-11-18 17:20:56', 'fa-user', 0),
(22, 1, 'Customers', 6, 'Added a new customer qqq', '2014-11-18 17:22:05', 'fa-user', 0),
(23, 1, 'Admin', 1, 'Updated Event 360itprooo', '2014-11-18 19:23:52', 'fa-edit', 0),
(24, 1, 'Admin', 1, 'Updated Event 360it', '2014-11-18 19:23:58', 'fa-edit', 0),
(25, 1, 'Admin', 1, 'Updated Event 360', '2014-11-18 19:24:05', 'fa-edit', 0),
(26, 1, 'Admin', 1, 'Updated Event Public', '2014-11-18 19:24:58', 'fa-edit', 0),
(31, 1, 'event_orders', 3, 'Created an Issue #242566', '2014-11-18 22:27:05', 'fa-plus', 0),
(30, 1, 'event_orders', 2, 'admin deleted a event_order', '2014-11-18 22:25:58', 'fa-times', 0),
(527, 1, 'events', 8, 'Admin added a file <a href="http://localhost/hotel/resource/project-files/EVENT-EVE93455-02.jpg" target="_blank">EVENT-EVE93455-02.jpg</a>', '2014-12-23 18:33:09', 'fa-file', 0),
(33, 1, 'Customers', 7, 'Added a new Event Type Public', '2014-11-18 22:38:45', 'fa-user', 0),
(34, 1, 'Customers', 8, 'Added a new Event Type Other', '2014-11-18 22:38:52', 'fa-user', 0),
(35, 1, 'Admin', 4, 'Updated Event Confirmed', '2014-11-19 00:11:09', 'fa-edit', 0),
(36, 1, 'Admin', 4, 'Updated Event Confirmed', '2014-11-19 00:11:17', 'fa-edit', 0),
(37, 1, 'Admin', 8, 'Updated Event CCC', '2014-11-19 00:29:36', 'fa-edit', 0),
(38, 1, 'Admin', 8, 'Updated Event CCC', '2014-11-19 00:30:30', 'fa-edit', 0),
(39, 1, 'Admin', 7, 'Updated Event a', '2014-11-19 00:31:14', 'fa-edit', 0),
(40, 1, 'Admin', 7, 'Updated Event a', '2014-11-19 00:32:10', 'fa-edit', 0),
(41, 1, 'Admin', 7, 'Updated Event a', '2014-11-19 00:33:15', 'fa-edit', 0),
(42, 1, 'Admin', 7, 'Updated Event a', '2014-11-19 00:33:20', 'fa-edit', 0),
(43, 1, 'Admin', 7, 'Updated Event a', '2014-11-19 00:33:24', 'fa-edit', 0),
(44, 1, 'Admin', 7, 'Updated Event AAAA', '2014-11-19 00:33:34', 'fa-edit', 0),
(45, 1, 'Admin', 7, 'Updated Event AAAA', '2014-11-19 00:33:39', 'fa-edit', 0),
(46, 1, 'Admin', 7, 'Updated Event AAAA', '2014-11-19 00:37:19', 'fa-edit', 0),
(47, 1, 'Admin', 7, 'Updated Event AAAA', '2014-11-19 00:37:27', 'fa-edit', 0),
(48, 1, 'Admin', 7, 'Updated Event AAAA', '2014-11-19 00:37:40', 'fa-edit', 0),
(49, 1, 'Admin', 7, 'Updated Event AAAA', '2014-11-19 00:37:49', 'fa-edit', 0),
(50, 1, 'Admin', 7, 'Updated Event AAAA', '2014-11-19 00:37:55', 'fa-edit', 0),
(51, 1, 'Admin', 7, 'Updated Event AAAA', '2014-11-19 00:38:06', 'fa-edit', 0),
(52, 1, 'Admin', 7, 'Updated Event AAAA', '2014-11-19 00:38:26', 'fa-edit', 0),
(53, 1, 'Admin', 7, 'Updated Event AAAA', '2014-11-19 15:28:23', 'fa-edit', 0),
(54, 1, 'Admin', 7, 'Updated Event Declined', '2014-11-19 15:28:35', 'fa-edit', 0),
(55, 1, 'Admin', 8, 'Updated Event CCC', '2014-11-19 15:34:48', 'fa-edit', 0),
(56, 1, 'Admin', 9, 'Added a new Event Status yes', '2014-11-19 16:19:04', 'fa-user', 0),
(57, 1, 'Admin', 10, 'Added a new Event Status yes', '2014-11-19 16:20:24', 'fa-user', 0),
(58, 1, 'Admin', 11, 'Added a new Event Status yes', '2014-11-19 16:22:10', 'fa-user', 0),
(59, 1, 'Admin', 12, 'Added a new Event Status yes', '2014-11-19 16:25:36', 'fa-user', 0),
(60, 1, 'Admin', 9, 'Added a new Event Status aaa', '2014-11-19 16:31:39', 'fa-user', 0),
(61, 1, 'Admin', 9, 'Updated Event aaaa', '2014-11-19 17:11:57', 'fa-edit', 0),
(62, 1, 'Admin', 9, 'Updated Event aaaa', '2014-11-19 17:12:03', 'fa-edit', 0),
(63, 1, 'Admin', 10, 'Added a new Event Status vv', '2014-11-19 17:32:08', 'fa-user', 0),
(64, 1, 'Admin', 10, 'Updated Event vvv', '2014-11-19 17:32:15', 'fa-edit', 0),
(65, 1, 'Admin', 11, 'Added a new Event Status aaa', '2014-11-19 19:29:46', 'fa-user', 0),
(66, 1, 'Admin', 12, 'Added a new Event Status aaa', '2014-11-19 19:29:55', 'fa-user', 0),
(67, 1, 'Admin', 12, 'Updated Event aaaf', '2014-11-19 19:33:43', 'fa-edit', 0),
(68, 1, 'Admin', 13, 'Added a new Table Layout aa', '2014-11-19 20:01:17', 'fa-user', 0),
(69, 1, 'Admin', 13, 'Updated Event aaa', '2014-11-19 20:02:03', 'fa-edit', 0),
(70, 1, 'Customers', 2, 'Updated Customer Navi', '2014-11-19 20:42:14', 'fa-edit', 0),
(71, 1, 'Rooms', 1, 'Added a new Room test', '2014-11-22 20:32:46', 'fa-user', 0),
(72, 1, 'Rooms', 2, 'Added a new Room test', '2014-11-22 20:34:48', 'fa-user', 0),
(73, 1, 'Rooms', 3, 'Added a new Room test', '2014-11-22 20:38:19', 'fa-user', 0),
(74, 1, 'Admin', 3, 'Updated Room ', '2014-11-22 21:55:52', 'fa-edit', 0),
(75, 1, 'Admin', 3, 'Updated Room ', '2014-11-22 21:55:59', 'fa-edit', 0),
(76, 1, 'Admin', 3, 'Updated Room ', '2014-11-22 21:56:04', 'fa-edit', 0),
(77, 1, 'Rooms', 4, 'Added a new Sub Room testing', '2014-11-22 22:36:55', 'fa-user', 0),
(78, 1, 'Admin', 4, 'Updated Room ', '2014-11-22 22:40:06', 'fa-edit', 0),
(79, 1, 'Admin', 4, 'Updated Room ', '2014-11-22 22:41:29', 'fa-edit', 0),
(80, 1, 'Rooms', 4, 'Added a new Room Green', '2014-11-22 22:58:29', 'fa-user', 0),
(81, 1, 'Rooms', 5, 'Added a new Room Blue', '2014-11-22 23:44:22', 'fa-user', 0),
(82, 1, 'Admin', 4, 'Updated Room ', '2014-11-22 23:49:39', 'fa-edit', 0),
(83, 1, 'Rooms', 5, 'Added a new Room Layout room1', '2014-11-23 06:36:50', 'fa-user', 0),
(84, 1, 'Rooms', 6, 'Added a new Room Layout room1', '2014-11-23 06:42:05', 'fa-user', 0),
(85, 1, 'rooms', 6, 'Updated Room Layout room1', '2014-11-23 06:45:38', 'fa-edit', 0),
(86, 1, 'rooms', 6, 'Updated Room Layout room1aaa', '2014-11-23 06:45:45', 'fa-edit', 0),
(87, 1, 'rooms', 6, 'Updated Room Layout room1aaa', '2014-11-23 06:47:16', 'fa-edit', 0),
(88, 1, 'rooms', 6, 'Updated Room Layout room1aaa', '2014-11-23 06:52:13', 'fa-edit', 0),
(89, 1, 'rooms', 6, 'Updated Room Layout room1aaa', '2014-11-23 06:53:17', 'fa-edit', 0),
(90, 1, 'Rooms', 7, 'Added a new Room Layout room3', '2014-11-23 07:18:27', 'fa-user', 0),
(91, 1, 'Rooms', 8, 'Added a new Room Layout room1', '2014-11-23 07:20:56', 'fa-user', 0),
(92, 1, 'rooms', 8, 'Updated Room Layout room1', '2014-11-23 07:24:09', 'fa-edit', 0),
(93, 1, 'rooms', 8, 'Updated Room Layout room1', '2014-11-23 07:24:14', 'fa-edit', 0),
(94, 1, 'rooms', 8, 'Updated Room Layout room1', '2014-11-23 07:24:56', 'fa-edit', 0),
(95, 1, 'rooms', 8, 'Updated Room Layout room1', '2014-11-23 07:25:41', 'fa-edit', 0),
(96, 1, 'rooms', 8, 'Updated Room Layout room1', '2014-11-23 07:26:35', 'fa-edit', 0),
(97, 1, 'rooms', 8, 'Updated Room Layout room1', '2014-11-23 07:26:39', 'fa-edit', 0),
(98, 1, 'rooms', 8, 'Updated Room Layout room1', '2014-11-23 07:26:42', 'fa-edit', 0),
(99, 1, 'rooms', 8, 'Updated Room Layout room1', '2014-11-23 07:26:49', 'fa-edit', 0),
(100, 1, 'Rooms', 9, 'Added a new Room Hire Types AAA', '2014-11-23 07:42:30', 'fa-user', 0),
(101, 1, 'rooms', 9, 'Updated Room Hire Types AAAbb', '2014-11-23 07:43:36', 'fa-edit', 0),
(102, 1, 'Rooms', 10, 'Added a new Room Hire Types AAA', '2014-11-23 07:44:06', 'fa-user', 0),
(103, 1, 'Rooms', 11, 'Added a new locations ABC', '2014-11-23 08:03:10', 'fa-user', 0),
(104, 1, 'rooms', 11, 'Updated locations ABCD', '2014-11-23 08:04:04', 'fa-edit', 0),
(105, 1, 'rooms', 11, 'Updated conference_hire_costs ', '2014-11-24 03:09:46', 'fa-edit', 0),
(106, 1, 'rooms', 11, 'Updated conference_hire_costs ', '2014-11-24 03:09:56', 'fa-edit', 0),
(107, 1, 'rooms', 11, 'Updated conference_hire_costs ', '2014-11-24 03:10:01', 'fa-edit', 0),
(108, 1, 'rooms', 11, 'Updated conference_hire_costs ', '2014-11-24 03:11:12', 'fa-edit', 0),
(109, 1, 'rooms', 11, 'Updated conference_hire_costs ', '2014-11-24 04:03:24', 'fa-edit', 0),
(110, 1, 'menus', 6, 'Added a new Menu bbb', '2014-11-24 05:14:49', 'fa-user', 0),
(111, 1, 'menus', 4, 'Updated Menu Greenmm', '2014-11-24 05:25:13', 'fa-edit', 0),
(112, 1, 'menus', 4, 'Updated Menu Greenmm', '2014-11-24 05:25:19', 'fa-edit', 0),
(113, 1, 'menus', 7, 'Added a new Menu bbb', '2014-11-24 06:02:37', 'fa-user', 0),
(114, 1, 'menus', 8, 'Added a new Menu cccc', '2014-11-24 06:02:44', 'fa-user', 0),
(115, 1, 'menus', 4, 'Updated Package ', '2014-11-24 07:52:10', 'fa-edit', 0),
(116, 1, 'menus', 4, 'Updated Package ', '2014-11-24 07:59:14', 'fa-edit', 0),
(117, 1, 'menus', 4, 'Updated Package ', '2014-11-24 07:59:20', 'fa-edit', 0),
(118, 1, 'menus', 4, 'Updated Package ', '2014-11-24 08:00:28', 'fa-edit', 0),
(119, 1, 'menus', 4, 'Updated Package ', '2014-11-24 08:00:33', 'fa-edit', 0),
(120, 1, 'Rooms', 6, 'Added a new Room Red', '2014-11-24 16:58:05', 'fa-user', 0),
(121, 1, 'menus', 4, 'Updated Package ', '2014-11-24 17:23:22', 'fa-edit', 0),
(122, 1, 'menus', 4, 'Updated Package ', '2014-11-24 17:23:26', 'fa-edit', 0),
(123, 1, 'menus', 4, 'Updated Package ', '2014-11-24 17:23:32', 'fa-edit', 0),
(124, 1, 'menus', 4, 'Updated Package ', '2014-11-24 17:24:02', 'fa-edit', 0),
(125, 1, 'menus', 4, 'Updated Package ', '2014-11-24 17:24:05', 'fa-edit', 0),
(126, 1, 'menus', 4, 'Updated Package ', '2014-11-24 17:33:27', 'fa-edit', 0),
(127, 1, 'menus', 4, 'Updated Package ', '2014-11-24 17:33:34', 'fa-edit', 0),
(128, 1, 'menus', 4, 'Updated Package ', '2014-11-24 17:34:28', 'fa-edit', 0),
(129, 1, 'menus', 4, 'Updated Package ', '2014-11-24 17:36:11', 'fa-edit', 0),
(130, 1, 'menus', 4, 'Updated Package ', '2014-11-24 17:36:14', 'fa-edit', 0),
(131, 1, 'menus', 4, 'Updated Package ', '2014-11-24 17:37:10', 'fa-edit', 0),
(132, 1, 'menus', 4, 'Updated Package ', '2014-11-24 17:37:14', 'fa-edit', 0),
(133, 1, 'menus', 4, 'Updated Package ', '2014-11-24 17:37:17', 'fa-edit', 0),
(134, 1, 'menus', 4, 'Updated Package ', '2014-11-24 18:39:16', 'fa-edit', 0),
(135, 1, 'menus', 4, 'Updated Package ', '2014-11-24 18:41:54', 'fa-edit', 0),
(136, 1, 'menus', 4, 'Updated Package ', '2014-11-24 18:43:01', 'fa-edit', 0),
(137, 1, 'menus', 1, 'Updated Menu 11', '2014-11-24 20:28:42', 'fa-edit', 0),
(138, 1, 'menus', 1, 'Updated Menu ', '2014-11-24 20:36:14', 'fa-edit', 0),
(139, 1, 'menus', 1, 'Updated Menu ', '2014-11-24 20:36:20', 'fa-edit', 0),
(140, 1, 'menus', 1, 'Updated Menu ', '2014-11-24 20:39:03', 'fa-edit', 0),
(141, 1, 'menus', 1, 'Updated Menu ', '2014-11-24 20:40:13', 'fa-edit', 0),
(142, 1, 'menus', 1, 'Updated Menu ', '2014-11-24 20:40:16', 'fa-edit', 0),
(143, 1, 'menus', 1, 'Updated Menu ', '2014-11-24 20:43:22', 'fa-edit', 0),
(144, 1, 'menus', 1, 'Updated Menu ', '2014-11-24 20:44:49', 'fa-edit', 0),
(145, 1, 'Rooms', 1, 'Added a new locations New York', '2014-11-24 23:36:21', 'fa-user', 0),
(146, 1, 'Rooms', 2, 'Added a new locations Fremont', '2014-11-24 23:36:32', 'fa-user', 0),
(147, 1, 'staff', 1, 'Added a New Staff ', '2014-11-24 23:44:15', 'fa-user', 0),
(148, 1, 'staff', 1, 'Updated Staff ', '2014-11-25 00:30:38', 'fa-edit', 0),
(149, 1, 'staff', 1, 'Updated Staff ', '2014-11-25 00:32:44', 'fa-edit', 0),
(150, 1, 'staff', 1, 'Updated Staff ', '2014-11-25 00:32:47', 'fa-edit', 0),
(151, 1, 'staff', 1, 'Added a New Staff ', '2014-11-25 00:58:13', 'fa-user', 0),
(152, 1, 'staff', 2, 'Added a New Staff ', '2014-11-25 01:00:06', 'fa-user', 0),
(153, 1, 'Rooms', 1, 'Added a new Room Layout Banquet', '2014-11-25 19:18:39', 'fa-user', 0),
(154, 1, 'events', 2, 'Admin created a project #EVE35325', '2014-11-25 23:11:18', 'fa-coffee', 0),
(155, 1, 'events', 3, 'Admin created a project #', '2014-11-26 00:42:06', 'fa-coffee', 0),
(156, 1, 'menus', 4, 'Updated Platter Menu ', '2014-11-26 15:42:42', 'fa-edit', 0),
(157, 1, 'menus', 5, 'Added a new Platter Menu ', '2014-11-26 15:43:36', 'fa-user', 0),
(158, 1, 'menus', 4, 'Updated Cocktail Menu ', '2014-11-26 15:57:12', 'fa-edit', 0),
(159, 1, 'menus', 6, 'Added a new Cocktail Menu ', '2014-11-26 19:39:30', 'fa-user', 0),
(160, 1, 'menus', 6, 'Updated Appetizers Menu ', '2014-11-26 19:48:18', 'fa-edit', 0),
(161, 1, 'menus', 4, 'Updated Entrees Menu ', '2014-11-26 19:52:45', 'fa-edit', 0),
(162, 1, 'menus', 6, 'Added a new Cocktail Menu ', '2014-11-26 19:53:09', 'fa-user', 0),
(163, 1, 'menus', 6, 'Updated Mains Menu ', '2014-11-26 19:54:01', 'fa-edit', 0),
(164, 1, 'menus', 6, 'Added a new Desserts Menu ', '2014-11-26 19:54:19', 'fa-user', 0),
(165, 1, 'menus', 4, 'Updated Cocktail Menu ', '2014-11-26 19:54:25', 'fa-edit', 0),
(166, 1, 'menus', 7, 'Added a new Cocktail Menu ', '2014-11-26 19:54:57', 'fa-user', 0),
(167, 1, 'menus', 6, 'Updated Appetizers Menu ', '2014-11-26 19:55:01', 'fa-edit', 0),
(168, 1, 'menus', 6, 'Added a new Cocktail Menu ', '2014-11-26 19:55:28', 'fa-user', 0),
(169, 1, 'menus', 6, 'Updated Sides Menu ', '2014-11-26 19:55:33', 'fa-edit', 0),
(170, 1, 'menus', 6, 'Added a new Refreshments Menu ', '2014-11-26 19:55:52', 'fa-user', 0),
(171, 1, 'menus', 6, 'Updated Refreshments Menu ', '2014-11-26 19:55:57', 'fa-edit', 0),
(172, 1, 'menus', 4, 'Updated Beverages Menu ', '2014-11-26 19:57:03', 'fa-edit', 0),
(173, 1, 'menus', 6, 'Added a new Cocktail Menu ', '2014-11-26 19:57:15', 'fa-user', 0),
(174, 1, 'menus', 4, 'Updated ', '2014-11-26 19:58:50', 'fa-edit', 0),
(175, 1, 'menus', 6, 'Added a new Equipment and decoration Menu ', '2014-11-26 19:59:01', 'fa-user', 0),
(176, 1, 'menus', 8, 'Added a new Beverage Package ', '2014-11-26 21:27:48', 'fa-user', 0),
(177, 1, 'menus', 4, 'Updated ', '2014-11-26 21:37:28', 'fa-edit', 0),
(178, 1, 'menus', 4, 'Updated ', '2014-11-26 21:37:34', 'fa-edit', 0),
(179, 1, 'menus', 4, 'Updated ', '2014-11-26 21:39:10', 'fa-edit', 0),
(180, 1, 'menus', 8, 'Updated ', '2014-11-26 21:39:52', 'fa-edit', 0),
(181, 1, 'menus', 7, 'Updated ', '2014-11-26 21:44:10', 'fa-edit', 0),
(182, 1, 'menus', 6, 'Updated ', '2014-11-26 21:55:11', 'fa-edit', 0),
(183, 1, 'menus', 5, 'Updated ', '2014-11-26 21:55:19', 'fa-edit', 0),
(184, 1, 'menus', 5, 'Updated ', '2014-11-26 21:55:25', 'fa-edit', 0),
(185, 1, 'rooms', 10, 'Updated Room Hire Types AAA', '2014-11-26 22:23:27', 'fa-edit', 0),
(186, 1, 'Rooms', 1, 'Added a new Sub Room asa', '2014-11-26 22:24:58', 'fa-user', 0),
(187, 1, 'Admin', 13, 'Updated Event aaaa', '2014-11-26 22:43:09', 'fa-edit', 0),
(188, 1, 'Admin', 4, 'Updated Event Confirmed', '2014-11-26 22:45:54', 'fa-edit', 0),
(189, 1, 'Admin', 8, 'Updated Event CCC', '2014-11-26 22:47:53', 'fa-edit', 0),
(190, 1, 'Admin', 8, 'Updated Event CCC', '2014-11-26 22:48:17', 'fa-edit', 0),
(191, 1, 'Admin', 1, 'Added a new Event Status aa', '2014-11-26 22:48:43', 'fa-user', 0),
(192, 1, 'Admin', 1, 'Updated Event aafff', '2014-11-26 22:50:24', 'fa-edit', 0),
(193, 1, 'Admin', 13, 'Updated Event aaaa', '2014-11-26 22:50:54', 'fa-edit', 0),
(194, 1, 'event_settings', 1, 'Updated Booking Limits ', '2014-11-28 05:21:04', 'fa-edit', 0),
(195, 1, 'event_settings', 1, 'Updated Booking Limits ', '2014-11-28 05:22:46', 'fa-edit', 0),
(196, 1, 'event_settings', 1, 'Updated Booking Limits ', '2014-11-28 05:23:06', 'fa-edit', 0),
(197, 1, 'event_settings', 1, 'Updated Booking Limits ', '2014-11-28 05:35:24', 'fa-edit', 0),
(198, 1, 'event_settings', 1, 'Updated Hour Settings ', '2014-11-28 06:46:27', 'fa-edit', 0),
(199, 1, 'event_settings', 1, 'Updated Hour Settings ', '2014-11-28 06:46:31', 'fa-edit', 0),
(200, 1, 'event_settings', 1, 'Updated Hour Settings 12', '2014-11-28 07:08:25', 'fa-edit', 0),
(201, 1, 'event_settings', 1, 'Updated Hour Settings 24', '2014-11-28 07:08:29', 'fa-edit', 0),
(202, 1, 'event_settings', 1, 'Updated Calendar View ', '2014-11-28 08:12:48', 'fa-edit', 0),
(203, 1, 'event_settings', 1, 'Updated Calendar View ', '2014-11-28 08:26:59', 'fa-edit', 0),
(204, 1, 'event_settings', 1, 'Updated Calendar View ', '2014-11-28 08:33:52', 'fa-edit', 0),
(205, 1, 'event_settings', 1, 'Updated Calendar View ', '2014-11-28 08:34:38', 'fa-edit', 0),
(206, 1, 'event_settings', 1, 'Updated Calendar View ', '2014-11-28 08:35:18', 'fa-edit', 0),
(207, 1, 'event_settings', 1, 'Updated Calendar View ', '2014-11-28 08:36:14', 'fa-edit', 0),
(208, 1, 'event_settings', 1, 'Updated Calendar View ', '2014-11-28 08:37:33', 'fa-edit', 0),
(209, 1, 'event_settings', 1, 'Updated Calendar View ', '2014-11-28 08:37:37', 'fa-edit', 0),
(210, 1, 'event_settings', 1, 'Updated Calendar View ', '2014-11-28 08:37:40', 'fa-edit', 0),
(211, 1, 'event_settings', 1, 'Updated Calendar View ', '2014-11-28 08:39:38', 'fa-edit', 0),
(212, 1, 'event_settings', 1, 'Updated Calendar View ', '2014-11-28 08:41:03', 'fa-edit', 0),
(213, 1, 'event_settings', 1, 'Updated Calendar View ', '2014-11-28 08:46:24', 'fa-edit', 0),
(214, 1, 'event_settings', 1, 'Updated Calendar View ', '2014-11-28 08:49:03', 'fa-edit', 0),
(215, 1, 'event_settings', 1, 'Updated Calendar View ', '2014-11-28 08:52:08', 'fa-edit', 0),
(216, 1, 'event_settings', 1, 'Updated Calendar View ', '2014-11-28 08:52:13', 'fa-edit', 0),
(217, 1, 'event_settings', 1, 'Updated Calendar View ', '2014-11-28 08:53:00', 'fa-edit', 0),
(218, 1, 'event_settings', 1, 'Updated Calendar View ', '2014-11-28 08:54:37', 'fa-edit', 0),
(219, 1, 'event_settings', 1, 'Updated Calendar View ', '2014-11-28 08:56:20', 'fa-edit', 0),
(220, 1, 'event_settings', 1, 'Updated Calendar View ', '2014-11-28 08:57:34', 'fa-edit', 0),
(221, 1, 'event_settings', 1, 'Updated Calendar View ', '2014-11-28 09:00:37', 'fa-edit', 0),
(222, 1, 'event_settings', 1, 'Updated Calendar View ', '2014-11-28 09:02:22', 'fa-edit', 0),
(223, 1, 'event_settings', 1, 'Updated Calendar View ', '2014-11-28 09:02:53', 'fa-edit', 0),
(224, 1, 'event_settings', 1, 'Updated Calendar View ', '2014-11-28 09:04:37', 'fa-edit', 0),
(225, 1, 'event_settings', 1, 'Updated Calendar View ', '2014-11-28 09:04:42', 'fa-edit', 0),
(226, 1, 'events', 4, 'Admin created a project #EVE63167', '2014-11-28 16:27:44', 'fa-coffee', 0),
(227, 1, 'events', 1, 'Admin edited a project #PRO81183', '2014-11-28 19:13:34', 'fa-coffee', 0),
(228, 1, 'events', 1, 'Admin edited a project #PRO81183', '2014-11-28 19:34:03', 'fa-coffee', 0),
(229, 1, 'events', 1, 'Admin edited a project #PRO81183', '2014-11-28 19:34:20', 'fa-coffee', 0),
(230, 1, 'events', 1, 'Admin edited a project #PRO81183', '2014-11-28 19:48:38', 'fa-coffee', 0),
(231, 1, 'events', 1, 'Admin edited a project #PRO81183', '2014-11-28 20:12:19', 'fa-coffee', 0),
(232, 1, 'events', 1, 'Admin edited a project #PRO81183', '2014-11-28 20:14:14', 'fa-coffee', 0),
(233, 1, 'events', 1, 'Admin edited a project #PRO81183', '2014-11-28 20:15:29', 'fa-coffee', 0),
(234, 1, 'events', 1, 'Admin edited a project #PRO81183', '2014-11-28 20:17:53', 'fa-coffee', 0),
(235, 1, 'events', 1, 'Admin edited a project #PRO81183', '2014-11-28 20:19:08', 'fa-coffee', 0),
(236, 1, 'events', 1, 'Admin edited a project #PRO81183', '2014-11-28 20:20:07', 'fa-coffee', 0),
(237, 1, 'events', 1, 'Admin edited a project #PRO81183', '2014-11-28 20:20:38', 'fa-coffee', 0),
(238, 1, 'events', 1, 'Admin edited a project #PRO81183', '2014-11-28 20:24:54', 'fa-coffee', 0),
(239, 1, 'events', 1, 'Admin edited a project #PRO81183', '2014-11-28 20:25:05', 'fa-coffee', 0),
(240, 1, 'events', 1, 'Admin edited a project #PRO81183', '2014-11-28 20:25:39', 'fa-coffee', 0),
(241, 1, 'events', 1, 'Admin edited a project #PRO81183', '2014-11-28 20:25:49', 'fa-coffee', 0),
(242, 1, 'events', 1, 'Admin edited a project #PRO81183', '2014-11-28 20:27:19', 'fa-coffee', 0),
(243, 1, 'events', 1, 'Admin edited a project #PRO81183', '2014-11-28 20:31:36', 'fa-coffee', 0),
(244, 1, 'events', 1, 'Admin edited a project #PRO81183', '2014-11-28 20:31:43', 'fa-coffee', 0),
(526, 1, 'events', 8, 'Admin added a file <a href="http://localhost/hotel/resource/project-files/EVENT-EVE93455-01.jpg" target="_blank">EVENT-EVE93455-01.jpg</a>', '2014-12-23 18:32:55', 'fa-file', 0),
(521, 1, 'event_orders', 5, 'admin deleted a event_order', '2014-12-23 18:09:50', 'fa-times', 0),
(249, 1, 'estimates', 1, 'Estimate #EST86187 created.', '2014-12-01 20:19:03', 'fa-plus', 0),
(250, 1, 'estimates', 1, 'Converted EST #EST86187 to Invoice', '2014-12-01 20:19:14', 'fa-laptop', 0),
(253, 1, 'event_settings', 1, 'Updated Hour Settings fgh', '2014-12-01 21:08:02', 'fa-edit', 0),
(254, 1, 'event_settings', 1, 'Updated Hour Settings aaaaaa', '2014-12-01 21:08:42', 'fa-edit', 0),
(257, 1, 'rooms', 11, 'Updated conference_hire_costs ', '2014-12-02 00:09:20', 'fa-edit', 0),
(258, 1, 'Rooms', 1, 'Updated Day View ', '2014-12-02 00:10:13', 'fa-edit', 0),
(259, 1, 'Rooms', 1, 'Updated Day View ', '2014-12-02 00:10:22', 'fa-edit', 0),
(260, 1, 'Rooms', 1, 'Updated Day View ', '2014-12-02 00:11:05', 'fa-edit', 0),
(261, 1, 'Rooms', 1, 'Updated Day View ', '2014-12-02 00:11:09', 'fa-edit', 0),
(262, 1, 'Rooms', 1, 'Updated Day View ', '2014-12-02 00:11:37', 'fa-edit', 0),
(263, 1, 'Rooms', 1, 'Updated Day View ', '2014-12-02 00:11:43', 'fa-edit', 0),
(264, 1, 'Rooms', 1, 'Updated Day View ', '2014-12-02 00:12:00', 'fa-edit', 0),
(265, 1, 'Rooms', 1, 'Updated Day View ', '2014-12-02 00:12:40', 'fa-edit', 0),
(266, 1, 'Rooms', 1, 'Updated Day View ', '2014-12-02 00:12:42', 'fa-edit', 0),
(267, 1, 'rooms', 11, 'Updated conference_hire_costs ', '2014-12-02 15:44:50', 'fa-edit', 0),
(268, 1, 'Rooms', 1, 'Updated Day View ', '2014-12-02 15:51:04', 'fa-edit', 0),
(269, 1, 'Rooms', 1, 'Updated Day View ', '2014-12-02 16:25:13', 'fa-edit', 0),
(270, 1, 'Rooms', 1, 'Updated Day View ', '2014-12-02 16:25:35', 'fa-edit', 0),
(271, 1, 'Rooms', 1, 'Updated Day View ', '2014-12-02 16:26:55', 'fa-edit', 0),
(272, 1, 'rooms', 11, 'Updated conference_hire_costs ', '2014-12-02 16:29:04', 'fa-edit', 0),
(273, 1, 'rooms', 11, 'Updated conference_hire_discosts ', '2014-12-02 16:42:30', 'fa-edit', 0),
(274, 1, 'rooms', 11, 'Updated conference_hire_discosts ', '2014-12-02 16:42:34', 'fa-edit', 0),
(275, 1, 'rooms', 11, 'Updated conference_hire_discosts ', '2014-12-02 16:42:37', 'fa-edit', 0),
(276, 1, 'Rooms', 12, 'Added a new conference_hire_costs ', '2014-12-02 16:53:21', 'fa-user', 0),
(277, 1, 'Rooms', 12, 'Added a new conference_hire_discosts ', '2014-12-02 16:54:15', 'fa-user', 0),
(278, 1, 'Rooms', 13, 'Added a new conference_hire_discosts ', '2014-12-02 16:55:53', 'fa-user', 0),
(279, 1, 'Rooms', 2, 'Added a new standard_hire_costs ', '2014-12-02 17:09:54', 'fa-user', 0),
(280, 1, 'Rooms', 1, 'Updated Day View ', '2014-12-02 17:12:53', 'fa-edit', 0),
(281, 1, 'Rooms', 3, 'Added a new standard_hire_costs ', '2014-12-02 17:13:08', 'fa-user', 0),
(282, 1, 'Rooms', 2, 'Added a new Discounted rate 11', '2014-12-02 17:14:57', 'fa-user', 0),
(283, 1, 'Rooms', 13, 'Added a new conference_hire_costs ', '2014-12-02 18:40:16', 'fa-user', 0),
(284, 1, 'Rooms', 14, 'Added a new conference_hire_costs ', '2014-12-02 18:40:39', 'fa-user', 0),
(285, 1, 'Rooms', 13, 'Added a new conference_hire_costs ', '2014-12-02 18:41:52', 'fa-user', 0),
(286, 1, 'Rooms', 14, 'Added a new conference_hire_discosts ', '2014-12-02 18:43:17', 'fa-user', 0),
(287, 1, 'rooms', 13, 'Updated conference_hire_costs ', '2014-12-02 18:49:55', 'fa-edit', 0),
(288, 1, 'rooms', 13, 'Updated conference_hire_costs ', '2014-12-02 18:55:23', 'fa-edit', 0),
(289, 1, 'rooms', 13, 'Updated conference_hire_costs ', '2014-12-02 19:06:03', 'fa-edit', 0),
(290, 1, 'rooms', 13, 'Updated conference_hire_costs ', '2014-12-02 19:06:07', 'fa-edit', 0),
(291, 1, 'rooms', 14, 'Updated conference_hire_discosts ', '2014-12-02 19:20:46', 'fa-edit', 0),
(292, 1, 'rooms', 14, 'Updated conference_hire_discosts ', '2014-12-02 19:21:26', 'fa-edit', 0),
(293, 1, 'rooms', 14, 'Updated conference_hire_discosts ', '2014-12-02 19:21:32', 'fa-edit', 0),
(294, 1, 'Rooms', 3, 'Updated Day View ', '2014-12-02 19:22:40', 'fa-edit', 0),
(295, 1, 'Rooms', 3, 'Updated Day View ', '2014-12-02 19:25:33', 'fa-edit', 0),
(296, 1, 'Rooms', 3, 'Updated Day View ', '2014-12-02 19:26:00', 'fa-edit', 0),
(297, 1, 'Rooms', 3, 'Updated Day View ', '2014-12-02 19:26:19', 'fa-edit', 0),
(298, 1, 'Rooms', 3, 'Updated Day View ', '2014-12-02 19:26:45', 'fa-edit', 0),
(299, 1, 'Rooms', 3, 'Updated Day View ', '2014-12-02 19:26:50', 'fa-edit', 0),
(300, 1, 'Rooms', 3, 'Updated ', '2014-12-02 19:32:04', 'fa-edit', 0),
(301, 1, 'Rooms', 3, 'Updated ', '2014-12-02 19:32:08', 'fa-edit', 0),
(302, 1, 'Rooms', 3, 'Updated ', '2014-12-02 19:32:12', 'fa-edit', 0),
(303, 1, 'Rooms', 3, 'Added a new Discounted rate 22', '2014-12-02 19:34:32', 'fa-user', 0),
(304, 1, 'Rooms', 3, 'Added a new Discounted rate 22', '2014-12-02 19:37:04', 'fa-user', 0),
(305, 1, 'Rooms', 4, 'Added a new standard_hire_costs ', '2014-12-02 19:37:20', 'fa-user', 0),
(306, 1, 'Rooms', 4, 'Added a new Discounted rate 000', '2014-12-02 19:37:29', 'fa-user', 0),
(307, 1, 'Rooms', 4, 'Updated ', '2014-12-02 19:37:36', 'fa-edit', 0),
(308, 1, 'Rooms', 4, 'Updated ', '2014-12-02 19:37:42', 'fa-edit', 0),
(309, 1, 'staff', 1, 'Added a New Staff ', '2014-12-02 20:01:13', 'fa-user', 0),
(311, 1, 'menus', 1, 'Added a new Platter Menu ', '2014-12-02 21:24:54', 'fa-user', 0),
(312, 1, 'menus', 1, 'Added a new Package ', '2014-12-02 21:45:24', 'fa-user', 0),
(313, 1, 'menus', 1, 'Updated Package ', '2014-12-02 21:52:27', 'fa-edit', 0),
(314, 1, 'menus', 1, 'Updated Package ', '2014-12-02 21:52:30', 'fa-edit', 0),
(315, 1, 'menus', 1, 'Updated Package ', '2014-12-02 21:52:35', 'fa-edit', 0),
(316, 1, 'menus', 1, 'Updated Package ', '2014-12-02 21:52:38', 'fa-edit', 0),
(317, 1, 'menus', 2, 'Added a new Package ', '2014-12-02 22:05:40', 'fa-user', 0),
(318, 1, 'menus', 3, 'Added a new Package ', '2014-12-02 22:06:49', 'fa-user', 0),
(522, 1, 'event_orders', 6, 'admin deleted a event_order', '2014-12-23 18:09:54', 'fa-times', 0),
(320, 1, 'events', 0, 'Added a task zz,12', '2014-12-03 20:07:41', 'fa-tasks', 0),
(321, 1, 'events', 0, 'Added a task zz,12', '2014-12-03 20:09:04', 'fa-tasks', 0),
(322, 1, 'events', 0, 'Added a task ', '2014-12-03 21:45:37', 'fa-tasks', 0),
(323, 1, 'events', 0, 'Added a task ', '2014-12-03 21:49:10', 'fa-tasks', 0),
(324, 1, 'events', 0, 'Added a task ', '2014-12-03 21:50:43', 'fa-tasks', 0),
(325, 1, 'events', 0, 'Added a task ', '2014-12-03 21:52:07', 'fa-tasks', 0),
(326, 1, 'events', 0, 'Added a task ', '2014-12-03 23:17:29', 'fa-tasks', 0),
(327, 1, 'events', 0, 'Added a task ', '2014-12-04 00:12:17', 'fa-tasks', 0),
(328, 1, 'events', 0, 'Added a task ', '2014-12-04 00:26:36', 'fa-tasks', 0),
(329, 1, 'events', 0, 'Added a task ', '2014-12-04 01:04:25', 'fa-tasks', 0),
(330, 1, 'events', 0, 'Added a task ', '2014-12-04 01:13:45', 'fa-tasks', 0),
(331, 1, 'events', 0, 'Added a task ', '2014-12-04 01:16:20', 'fa-tasks', 0),
(332, 1, 'Admin', 4, 'Updated Event pending', '2014-12-04 01:51:51', 'fa-edit', 0),
(333, 1, 'Admin', 7, 'Updated Event confirmed', '2014-12-04 01:52:20', 'fa-edit', 0),
(334, 1, 'Admin', 8, 'Added a new Event Status booked', '2014-12-04 01:52:34', 'fa-user', 0),
(335, 1, 'Admin', 5, 'Updated Room ', '2014-12-05 15:19:50', 'fa-edit', 0),
(336, 1, 'Admin', 4, 'Updated Room ', '2014-12-05 15:20:17', 'fa-edit', 0),
(337, 1, 'Admin', 6, 'Updated Room ', '2014-12-05 15:20:29', 'fa-edit', 0),
(338, 1, 'Admin', 8, 'Updated Event 11', '2014-12-16 18:20:59', 'fa-edit', 0),
(339, 1, 'Admin', 8, 'Updated Event qq', '2014-12-16 18:21:20', 'fa-edit', 0),
(340, 1, 'Admin', 8, 'Updated Event aaa', '2014-12-16 18:21:41', 'fa-edit', 0),
(341, 1, 'Admin', 8, 'Updated Event aaa', '2014-12-16 18:21:43', 'fa-edit', 0),
(342, 1, 'Admin', 9, 'Added a New Service Type bbb', '2014-12-16 18:24:55', 'fa-user', 0),
(343, 1, 'Admin', 8, 'Updated Event Security Officer', '2014-12-16 20:35:19', 'fa-edit', 0),
(344, 1, 'Admin', 8, 'Updated Event Security Officer', '2014-12-16 20:36:00', 'fa-edit', 0),
(345, 1, 'Admin', 10, 'Added a New Service Type Bartender', '2014-12-16 20:36:22', 'fa-user', 0),
(346, 1, 'Admin', 11, 'Added a New Service Type Additional Waiter', '2014-12-16 20:36:35', 'fa-user', 0),
(347, 1, 'Admin', 12, 'Added a New Service Type Wireless Mic/Speaker', '2014-12-16 20:36:53', 'fa-user', 0),
(348, 1, 'Admin', 13, 'Added a New Service Type Additional Décor', '2014-12-16 20:37:05', 'fa-user', 0),
(349, 1, 'Admin', 14, 'Added a New Service Type DJ Services', '2014-12-16 20:37:17', 'fa-user', 0),
(350, 1, 'Admin', 15, 'Added a New Service Type Cake', '2014-12-16 20:37:29', 'fa-user', 0),
(351, 1, 'Admin', 5, 'Updated Room ', '2014-12-18 16:33:08', 'fa-edit', 0),
(352, 1, 'Admin', 5, 'Updated Room ', '2014-12-18 16:38:35', 'fa-edit', 0),
(353, 1, 'Rooms', 7, 'Added a new Room aa', '2014-12-18 16:58:23', 'fa-user', 0),
(354, 1, 'Admin', 4, 'Updated Room ', '2014-12-18 16:59:51', 'fa-edit', 0),
(355, 1, 'Admin', 6, 'Updated Room ', '2014-12-18 17:00:10', 'fa-edit', 0),
(358, 1, 'events', 5, 'Admin created a event #', '2014-12-19 18:15:58', 'fa-coffee', 0),
(359, 1, 'events', 6, 'Admin created a event #', '2014-12-19 18:34:20', 'fa-coffee', 0),
(360, 1, 'events', 7, 'Admin created a event #EVE11214', '2014-12-19 18:43:28', 'fa-coffee', 0),
(361, 1, 'events', 7, 'Admin edited a project #', '2014-12-19 19:46:02', 'fa-coffee', 0),
(362, 1, 'events', 7, 'Admin edited a project #', '2014-12-19 19:47:13', 'fa-coffee', 0),
(363, 1, 'events', 7, 'Admin edited a project #', '2014-12-19 19:48:06', 'fa-coffee', 0),
(364, 1, 'events', 7, 'Admin edited a project #', '2014-12-19 19:49:13', 'fa-coffee', 0),
(365, 1, 'events', 7, 'Admin edited a project #', '2014-12-19 19:51:23', 'fa-coffee', 0),
(366, 1, 'events', 7, 'Admin edited a project #', '2014-12-19 19:51:37', 'fa-coffee', 0),
(367, 1, 'events', 7, 'Admin edited a project #', '2014-12-19 19:51:56', 'fa-coffee', 0),
(368, 1, 'events', 7, 'Admin edited a project #', '2014-12-19 19:54:26', 'fa-coffee', 0),
(369, 1, 'events', 7, 'Admin edited a project #', '2014-12-19 19:54:32', 'fa-coffee', 0),
(370, 1, 'events', 7, 'Admin edited a project #', '2014-12-19 19:56:22', 'fa-coffee', 0),
(371, 1, 'events', 7, 'Admin edited a project #', '2014-12-19 19:58:05', 'fa-coffee', 0),
(372, 1, 'events', 7, 'Admin edited a project #', '2014-12-19 19:58:12', 'fa-coffee', 0),
(373, 1, 'events', 7, 'Admin edited a project #', '2014-12-19 19:59:59', 'fa-coffee', 0),
(374, 1, 'events', 7, 'Admin edited a project #', '2014-12-19 20:00:06', 'fa-coffee', 0),
(375, 1, 'events', 7, 'Admin edited a project #', '2014-12-19 20:01:48', 'fa-coffee', 0),
(376, 1, 'events', 7, 'Admin edited a project #', '2014-12-19 20:02:34', 'fa-coffee', 0),
(377, 1, 'events', 7, 'Admin edited a project #', '2014-12-19 20:04:04', 'fa-coffee', 0),
(378, 1, 'events', 7, 'Admin edited a project #', '2014-12-19 20:04:14', 'fa-coffee', 0),
(379, 1, 'events', 7, 'Admin edited a project #', '2014-12-19 20:06:29', 'fa-coffee', 0),
(524, 1, 'events', 8, 'Admin created a event #EVE93455', '2014-12-23 18:27:19', 'fa-coffee', 0),
(381, 1, 'event_orders', 9, 'Created an Issue #347528', '2014-12-19 21:36:53', 'fa-plus', 0),
(385, 1, 'event_orders', 10, 'admin deleted a event_order', '2014-12-19 21:46:13', 'fa-times', 0),
(384, 1, 'event_orders', 11, 'admin deleted a event_order', '2014-12-19 21:46:07', 'fa-times', 0),
(386, 1, 'event_orders', 9, 'Marked Issue #347528 as Confirmed', '2014-12-19 21:46:18', 'fa-info', 0),
(387, 1, 'event_orders', 9, 'Marked Issue #347528 as Resolved', '2014-12-19 21:46:24', 'fa-info', 0),
(388, 1, 'event_orders', 9, 'Marked Issue #347528 as Verified', '2014-12-19 21:46:53', 'fa-info', 0),
(389, 1, 'event_orders', 9, 'Marked Issue #347528 as Unconfirmed', '2014-12-19 21:46:56', 'fa-info', 0),
(390, 1, 'event_orders', 9, 'Marked Issue #347528 as Verified', '2014-12-19 21:54:14', 'fa-info', 0),
(391, 1, 'event_orders', 9, 'Marked Issue #347528 as Verified', '2014-12-19 21:56:01', 'fa-info', 0),
(392, 1, 'event_orders', 9, 'Marked Issue #347528 as Verified', '2014-12-19 21:58:18', 'fa-info', 0),
(393, 1, 'event_orders', 9, 'Marked Issue #347528 as Verified', '2014-12-19 21:58:21', 'fa-info', 0),
(394, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-19 22:05:55', 'fa-info', 0),
(395, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-19 22:06:01', 'fa-info', 0),
(396, 1, 'event_orders', 9, 'Marked Issue #347528 as order-completed', '2014-12-19 22:06:03', 'fa-info', 0),
(523, 1, 'event_orders', 7, 'admin deleted a event_order', '2014-12-23 18:09:59', 'fa-times', 0),
(398, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-19 22:08:29', 'fa-info', 0),
(399, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-19 22:08:33', 'fa-info', 0),
(400, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-19 22:09:06', 'fa-info', 0),
(401, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-19 22:12:44', 'fa-info', 0),
(402, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-19 22:14:04', 'fa-info', 0),
(403, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-19 22:34:39', 'fa-info', 0),
(404, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-19 22:37:49', 'fa-info', 0),
(405, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-19 22:39:15', 'fa-info', 0),
(406, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-19 22:39:17', 'fa-info', 0),
(407, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-19 22:39:22', 'fa-info', 0),
(408, 1, 'event_orders', 9, 'Marked Issue #347528 as order-received', '2014-12-19 22:40:03', 'fa-info', 0),
(409, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-19 23:59:23', 'fa-info', 0),
(410, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-20 00:01:47', 'fa-info', 0),
(411, 1, 'event_orders', 9, 'Marked Issue #347528 as order-received', '2014-12-20 00:02:36', 'fa-info', 0),
(412, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-20 00:02:38', 'fa-info', 0),
(413, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-20 00:02:40', 'fa-info', 0),
(414, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-20 00:02:42', 'fa-info', 0),
(415, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-20 00:04:16', 'fa-info', 0),
(416, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-20 00:06:05', 'fa-info', 0),
(417, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-20 00:09:10', 'fa-info', 0),
(418, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-20 00:09:13', 'fa-info', 0),
(419, 1, 'event_orders', 9, 'Marked Issue #347528 as Verified', '2014-12-20 00:18:14', 'fa-info', 0),
(420, 1, 'event_orders', 9, 'Marked Issue #347528 as Verified', '2014-12-20 00:18:18', 'fa-info', 0),
(421, 1, 'event_orders', 9, 'Marked Issue #347528 as Verified', '2014-12-20 00:18:45', 'fa-info', 0),
(422, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-20 00:19:37', 'fa-info', 0),
(423, 1, 'event_orders', 9, 'Marked Issue #347528 as Verified', '2014-12-20 00:19:54', 'fa-info', 0),
(424, 1, 'event_orders', 9, 'Marked Issue #347528 as Verified', '2014-12-20 00:19:57', 'fa-info', 0),
(425, 1, 'event_orders', 9, 'Marked Issue #347528 as Verified', '2014-12-20 00:20:15', 'fa-info', 0),
(426, 1, 'event_orders', 9, 'Marked Issue #347528 as Verified', '2014-12-20 00:20:18', 'fa-info', 0),
(427, 1, 'event_orders', 9, 'Marked Issue #347528 as Verified', '2014-12-20 00:20:23', 'fa-info', 0),
(428, 1, 'event_orders', 9, 'Marked Issue #347528 as Verified', '2014-12-20 00:22:10', 'fa-info', 0),
(429, 1, 'event_orders', 9, 'Marked Issue #347528 as orderplaced', '2014-12-20 00:25:18', 'fa-info', 0),
(430, 1, 'event_orders', 9, 'Marked Issue #347528 as orderplaced', '2014-12-20 00:25:28', 'fa-info', 0),
(431, 1, 'event_orders', 9, 'Marked Issue #347528 as orderplaced', '2014-12-20 00:27:15', 'fa-info', 0),
(432, 1, 'event_orders', 9, 'Marked Issue #347528 as orderplaced', '2014-12-20 00:27:18', 'fa-info', 0),
(433, 1, 'event_orders', 9, 'Marked Issue #347528 as orderplaced', '2014-12-20 00:27:24', 'fa-info', 0),
(434, 1, 'event_orders', 9, 'Marked Issue #347528 as orderplaced', '2014-12-20 00:27:30', 'fa-info', 0),
(435, 1, 'event_orders', 9, 'Marked Issue #347528 as orderplaced', '2014-12-20 00:27:34', 'fa-info', 0),
(436, 1, 'event_orders', 9, 'Marked Issue #347528 as orderplaced', '2014-12-20 00:27:39', 'fa-info', 0),
(437, 1, 'event_orders', 9, 'Marked Issue #347528 as orderplaced', '2014-12-20 00:28:07', 'fa-info', 0),
(438, 1, 'event_orders', 9, 'Marked Issue #347528 as orderplaced', '2014-12-20 00:28:23', 'fa-info', 0),
(439, 1, 'event_orders', 9, 'Marked Issue #347528 as orderplaced', '2014-12-20 00:28:28', 'fa-info', 0),
(440, 1, 'event_orders', 9, 'Marked Issue #347528 as orderplaced', '2014-12-20 00:31:52', 'fa-info', 0),
(441, 1, 'event_orders', 9, 'Marked Issue #347528 as orderplaced', '2014-12-20 00:33:01', 'fa-info', 0),
(442, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-20 00:39:28', 'fa-info', 0),
(443, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-20 00:39:31', 'fa-info', 0),
(444, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-20 00:40:10', 'fa-info', 0),
(445, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-20 00:40:13', 'fa-info', 0),
(446, 1, 'event_orders', 9, 'Marked Issue #347528 as Verified', '2014-12-20 00:40:17', 'fa-info', 0),
(447, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-20 00:40:39', 'fa-info', 0),
(448, 1, 'event_orders', 9, 'Marked Issue #347528 as Verified', '2014-12-20 00:40:41', 'fa-info', 0),
(449, 1, 'event_orders', 9, 'Marked Issue #347528 as Verified', '2014-12-20 00:41:00', 'fa-info', 0),
(450, 1, 'event_orders', 9, 'Marked Issue #347528 as Verified', '2014-12-20 00:41:03', 'fa-info', 0),
(451, 1, 'event_orders', 9, 'Marked Issue #347528 as Verified', '2014-12-20 00:41:16', 'fa-info', 0),
(452, 1, 'event_orders', 9, 'Marked Issue #347528 as Verified', '2014-12-20 00:41:27', 'fa-info', 0),
(453, 1, 'event_orders', 9, 'Marked Issue #347528 as Verified', '2014-12-20 00:41:38', 'fa-info', 0),
(454, 1, 'event_orders', 9, 'Marked Issue #347528 as Verified', '2014-12-20 00:42:02', 'fa-info', 0),
(455, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-20 00:42:04', 'fa-info', 0),
(456, 1, 'event_orders', 9, 'Marked Issue #347528 as Verified', '2014-12-20 00:42:13', 'fa-info', 0),
(457, 1, 'event_orders', 9, 'Marked Issue #347528 as Verified', '2014-12-20 00:42:57', 'fa-info', 0),
(458, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-20 00:42:59', 'fa-info', 0),
(459, 1, 'event_orders', 9, 'Marked Issue #347528 as Verified', '2014-12-20 00:43:02', 'fa-info', 0),
(460, 1, 'event_orders', 9, 'Marked Issue #347528 as order-completed', '2014-12-20 00:43:05', 'fa-info', 0),
(461, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-20 00:43:18', 'fa-info', 0),
(462, 1, 'event_orders', 9, 'Marked Issue #347528 as order-received', '2014-12-20 00:43:39', 'fa-info', 0),
(463, 1, 'event_orders', 9, 'Marked Issue #347528 as order-completed', '2014-12-20 00:43:42', 'fa-info', 0),
(464, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-20 00:48:42', 'fa-info', 0),
(465, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-20 00:48:45', 'fa-info', 0),
(466, 1, 'event_orders', 9, 'Marked Issue #347528 as order-received', '2014-12-20 00:48:48', 'fa-info', 0),
(467, 1, 'event_orders', 9, 'Marked Issue #347528 as order-completed', '2014-12-20 00:48:51', 'fa-info', 0),
(468, 1, 'event_orders', 9, 'Marked Issue #347528 as order-received', '2014-12-20 00:48:54', 'fa-info', 0),
(469, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-20 00:49:36', 'fa-info', 0),
(470, 1, 'event_orders', 9, 'Marked Issue #347528 as order-completed', '2014-12-20 00:49:38', 'fa-info', 0),
(471, 1, 'event_orders', 9, 'Marked Issue #347528 as order-received', '2014-12-20 00:53:47', 'fa-info', 0),
(472, 1, 'estimates', 2, 'Estimate #EST62656 created.', '2014-12-22 15:12:40', 'fa-plus', 0),
(473, 1, 'Admin', 0, 'Updated Event a', '2014-12-22 16:10:38', 'fa-edit', 0),
(474, 1, 'Admin', 0, 'Updated Event aa', '2014-12-22 16:12:57', 'fa-edit', 0),
(475, 1, 'Admin', 13, 'Updated Event aaab', '2014-12-22 16:16:21', 'fa-edit', 0),
(476, 1, 'Admin', 14, 'Added a new Table Layout ccc', '2014-12-22 16:17:40', 'fa-user', 0),
(477, 1, 'Admin', 13, 'Updated Event Bartendar', '2014-12-22 16:22:03', 'fa-edit', 0),
(478, 1, 'Admin', 15, 'Added a new Table Layout Waiter', '2014-12-22 16:22:18', 'fa-user', 0),
(479, 1, 'Admin', 1, 'Updated Scheduling ', '2014-12-22 17:39:04', 'fa-edit', 0),
(480, 1, 'Admin', 2, 'Added a new Scheduling ', '2014-12-22 18:12:58', 'fa-user', 0),
(481, 1, 'Admin', 2, 'Updated Scheduling ', '2014-12-22 18:13:16', 'fa-edit', 0),
(482, 1, 'Admin', 3, 'Added a new Scheduling ', '2014-12-22 18:24:07', 'fa-user', 0),
(483, 1, 'Admin', 4, 'Added a new Scheduling ', '2014-12-22 18:25:08', 'fa-user', 0),
(484, 1, 'events', 1, 'Admin added a file <a href="http://localhost/hotel/resource/project-files/PROJECT-aa-0.jpg" target="_blank">PROJECT-aa-0.jpg</a>', '2014-12-22 21:23:26', 'fa-file', 0),
(485, 1, 'events', 51, 'Admin added a file <a href="http://localhost/hotel/resource/project-files/EVENT-PRO81183-09.jpg" target="_blank">EVENT-PRO81183-09.jpg</a>', '2014-12-22 23:02:33', 'fa-file', 0),
(486, 1, 'events', 0, 'Admin added a file <a href="http://localhost/hotel/resource/project-files/EVENT--02.jpg" target="_blank">EVENT--02.jpg</a>', '2014-12-22 23:40:58', 'fa-file', 0),
(487, 1, 'events', 1, 'Admin added a file <a href="http://localhost/hotel/resource/project-files/EVENT-PRO81183-010.jpg" target="_blank">EVENT-PRO81183-010.jpg</a>', '2014-12-22 23:45:49', 'fa-file', 0),
(488, 1, 'events', 1, 'Admin added a file <a href="http://localhost/hotel/resource/project-files/EVENT-PRO81183-011.jpg" target="_blank">EVENT-PRO81183-011.jpg</a>', '2014-12-22 23:46:40', 'fa-file', 0),
(489, 1, 'events', 1, 'Admin added a file <a href="http://localhost/hotel/resource/project-files/EVENT-PRO81183-012.jpg" target="_blank">EVENT-PRO81183-012.jpg</a>', '2014-12-22 23:50:06', 'fa-file', 0),
(490, 1, 'events', 1, 'Admin added a file <a href="http://localhost/hotel/resource/project-files/EVENT-PRO81183-013.jpg" target="_blank">EVENT-PRO81183-013.jpg</a>', '2014-12-22 23:54:22', 'fa-file', 0),
(491, 1, 'events', 1, 'Admin added a file <a href="http://localhost/hotel/resource/project-files/EVENT-PRO81183-014.jpg" target="_blank">EVENT-PRO81183-014.jpg</a>', '2014-12-22 23:58:57', 'fa-file', 0),
(492, 1, 'events', 1, 'Admin added a file <a href="http://localhost/hotel/resource/project-files/EVENT-PRO81183-015.jpg" target="_blank">EVENT-PRO81183-015.jpg</a>', '2014-12-23 00:02:46', 'fa-file', 0),
(493, 1, 'events', 0, 'Admin deleted a file EVENT-PRO81183-015.jpg', '2014-12-23 00:12:32', 'fa-times', 0),
(494, 1, 'events', 0, 'Admin deleted a file EVENT-PRO81183-014.jpg', '2014-12-23 00:12:41', 'fa-times', 0),
(495, 1, 'events', 0, 'Admin deleted a file EVENT-PRO81183-013.jpg', '2014-12-23 00:15:24', 'fa-times', 0),
(496, 1, 'events', 0, 'Admin deleted a file EVENT-PRO81183-012.jpg', '2014-12-23 00:15:48', 'fa-times', 0),
(497, 1, 'events', 0, 'Admin deleted a file EVENT-PRO81183-011.jpg', '2014-12-23 00:21:03', 'fa-times', 0),
(498, 1, 'events', 1, 'Admin added a file <a href="http://localhost/hotel/resource/project-files/EVENT-PRO81183-011.jpg" target="_blank">EVENT-PRO81183-011.jpg</a>', '2014-12-23 00:21:16', 'fa-file', 0),
(499, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-23 00:49:37', 'fa-info', 0),
(500, 1, 'event_orders', 9, 'Marked Issue #347528 as order-received', '2014-12-23 00:49:40', 'fa-info', 0),
(501, 1, 'event_orders', 9, 'Marked Issue #347528 as order-completed', '2014-12-23 00:49:42', 'fa-info', 0),
(502, 1, 'events', 7, 'Admin added a file <a href="http://localhost/hotel/resource/project-files/EVENT-EVE11214-0.jpg" target="_blank">EVENT-EVE11214-0.jpg</a>', '2014-12-23 01:12:06', 'fa-file', 0),
(503, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-23 15:53:59', 'fa-info', 0),
(504, 1, 'event_orders', 9, 'Marked Issue #347528 as order-received', '2014-12-23 15:54:55', 'fa-info', 0),
(505, 1, 'event_orders', 9, 'Marked Issue #347528 as order-completed', '2014-12-23 15:55:09', 'fa-info', 0),
(506, 1, 'event_orders', 9, 'Edited an Issue #347528', '2014-12-23 16:10:29', 'fa-pencil', 0),
(507, 1, 'event_orders', 9, 'Edited an Order #347528', '2014-12-23 16:12:43', 'fa-pencil', 0),
(508, 1, 'event_orders', 9, 'Edited an Order #347528', '2014-12-23 16:14:26', 'fa-pencil', 0),
(509, 1, 'event_orders', 9, 'Edited an Order #347528', '2014-12-23 16:15:11', 'fa-pencil', 0),
(510, 1, 'event_orders', 9, 'Edited an Order #347528', '2014-12-23 16:16:37', 'fa-pencil', 0),
(511, 1, 'event_orders', 9, 'Edited an Order #347528', '2014-12-23 16:20:47', 'fa-pencil', 0),
(512, 1, 'event_orders', 9, 'Edited an Order #347528', '2014-12-23 16:21:00', 'fa-pencil', 0),
(513, 1, 'event_orders', 9, 'Added a comment to a event_order', '2014-12-23 16:21:15', 'fa-comment', 0),
(514, 1, 'event_orders', 10, 'Created an Order #329293', '2014-12-23 16:21:34', 'fa-plus', 0),
(515, 1, 'event_orders', 11, 'Created an Order #264184', '2014-12-23 16:22:16', 'fa-plus', 0),
(516, 1, 'event_orders', 9, 'Edited an Order #347528', '2014-12-23 16:22:39', 'fa-pencil', 0),
(517, 1, 'event_orders', 12, 'Created an Order #147139', '2014-12-23 16:22:57', 'fa-plus', 0),
(525, 1, 'events', 8, 'Admin added a file <a href="http://localhost/hotel/resource/project-files/EVENT-EVE93455-0.jpg" target="_blank">EVENT-EVE93455-0.jpg</a>', '2014-12-23 18:28:31', 'fa-file', 0),
(520, 1, 'event_orders', 4, 'admin deleted a event_order', '2014-12-23 18:09:44', 'fa-times', 0),
(528, 1, 'events', 0, 'Admin deleted a file EVENT-EVE93455-03.jpg', '2014-12-23 18:38:45', 'fa-times', 0),
(529, 1, 'events', 0, 'Admin deleted a file EVENT-EVE93455-05.jpg', '2014-12-23 20:31:12', 'fa-times', 0),
(530, 1, 'event_orders', 9, 'Marked Issue #347528 as order-placed', '2014-12-23 20:33:21', 'fa-info', 0),
(531, 1, 'event_orders', 9, 'Marked Issue #347528 as order-received', '2014-12-23 20:33:25', 'fa-info', 0),
(532, 1, 'event_orders', 9, 'Marked Issue #347528 as order-completed', '2014-12-23 20:33:27', 'fa-info', 0),
(533, 1, 'event_settings', 1, 'Updated Hour Settings ', '2014-12-23 22:50:11', 'fa-edit', 0),
(534, 1, 'event_settings', 1, 'Updated Hour Settings ', '2014-12-23 22:52:46', 'fa-edit', 0),
(535, 1, 'event_settings', 1, 'Updated Hour Settings ', '2014-12-23 22:52:50', 'fa-edit', 0),
(536, 1, 'event_settings', 1, 'Updated Hour Settings ', '2014-12-23 22:52:56', 'fa-edit', 0),
(537, 1, 'event_settings', 1, 'Updated Hour Settings ', '2014-12-23 22:54:35', 'fa-edit', 0),
(538, 1, 'event_settings', 1, 'Updated Hour Settings ', '2014-12-23 22:54:39', 'fa-edit', 0),
(539, 1, 'events', 9, 'Admin created a event #EVE77355', '2014-12-24 00:57:12', 'fa-coffee', 0),
(540, 1, 'events', 10, 'Admin created a event #EVE64647', '2014-12-24 01:01:03', 'fa-coffee', 0),
(541, 1, 'events', 11, 'Admin created a event #EVE49968', '2014-12-24 01:03:56', 'fa-coffee', 0),
(542, 1, 'events', 12, 'Admin created a event #EVE53248', '2014-12-24 01:13:12', 'fa-coffee', 0),
(543, 1, 'menus', 11, 'Updated Package ', '2014-12-24 01:16:57', 'fa-edit', 0),
(544, 1, 'events', 4, 'Deleted Event #4 from the system', '2014-12-30 20:51:39', 'fa-times', 0),
(545, 1, 'events', 10, 'Deleted Event #10 from the system', '2014-12-30 20:51:46', 'fa-times', 0),
(546, 1, 'events', 9, 'Deleted Event #9 from the system', '2014-12-30 20:51:50', 'fa-times', 0),
(547, 1, 'events', 11, 'Deleted Event #11 from the system', '2014-12-30 20:51:56', 'fa-times', 0),
(548, 1, 'events', 8, 'Admin edited a project #', '2014-12-30 20:52:58', 'fa-coffee', 0),
(549, 1, 'events', 7, 'Admin edited a project #', '2014-12-30 20:53:31', 'fa-coffee', 0),
(550, 1, 'estimates', 3, 'Estimate #EST35595 created.', '2015-01-01 08:48:36', 'fa-plus', 0),
(551, 1, 'estimates', 3, 'Admin edited ESTIMATE #EST35595', '2015-01-01 08:53:53', 'fa-pencil', 0),
(552, 1, 'estimates', 3, 'Admin edited ESTIMATE #EST35595', '2015-01-01 09:06:10', 'fa-pencil', 0),
(553, 1, 'estimates', 3, 'Admin edited ESTIMATE #EST35595', '2015-01-01 09:08:52', 'fa-pencil', 0),
(554, 1, 'estimates', 3, 'Admin edited ESTIMATE #EST35595', '2015-01-01 09:10:34', 'fa-pencil', 0),
(555, 1, 'estimates', 3, 'Admin edited ESTIMATE #EST35595', '2015-01-01 09:10:40', 'fa-pencil', 0),
(556, 1, 'estimates', 2, 'Admin edited ESTIMATE #EST62656', '2015-01-01 09:37:00', 'fa-pencil', 0),
(557, 1, 'estimates', 3, 'Admin edited ESTIMATE #EST35595', '2015-01-01 09:37:10', 'fa-pencil', 0),
(558, 1, 'estimates', 3, 'Admin edited ESTIMATE #EST35595', '2015-01-01 09:43:03', 'fa-pencil', 0),
(559, 1, 'estimates', 3, 'Admin edited ESTIMATE #EST35595', '2015-01-01 09:45:50', 'fa-pencil', 0),
(560, 1, 'estimates', 3, 'Admin edited ESTIMATE #EST35595', '2015-01-01 09:50:39', 'fa-pencil', 0),
(561, 1, 'estimates', 3, 'Admin edited ESTIMATE #EST35595', '2015-01-01 09:57:53', 'fa-pencil', 0),
(562, 1, 'estimates', 3, 'Admin edited ESTIMATE #EST35595', '2015-01-01 09:58:00', 'fa-pencil', 0),
(563, 1, 'events', 13, 'Admin created a event #', '2015-01-01 10:10:00', 'fa-coffee', 0),
(564, 1, 'events', 15, 'Admin created a event #', '2015-01-01 10:15:31', 'fa-coffee', 0),
(565, 1, 'events', 17, 'Admin created a event #', '2015-01-01 11:20:53', 'fa-coffee', 0),
(566, 1, 'invoices', 3, 'INVOICE #INV723396 created.', '2015-01-01 12:48:03', 'fa-plus', 0);
INSERT INTO `fx_activities` (`activity_id`, `user`, `module`, `module_field_id`, `activity`, `activity_date`, `icon`, `deleted`) VALUES
(567, 1, 'invoices', 3, 'Admin edited INVOICE #INV723396', '2015-01-01 12:53:49', 'fa-pencil', 0),
(568, 1, 'invoices', 3, 'Admin edited INVOICE #INV723396', '2015-01-01 12:54:02', 'fa-pencil', 0),
(569, 1, 'invoices', 3, 'Payment of USD 75.6 received and applied to INVOICE #INV723396', '2015-01-01 12:56:26', 'fa-usd', 0),
(570, 1, 'events', 20, 'Admin created a event #', '2015-01-01 13:20:23', 'fa-coffee', 0),
(571, 1, 'invoices', 4, 'Payment of USD 162 received and applied to INVOICE #INV99595', '2015-01-01 13:22:21', 'fa-usd', 0),
(573, 1, 'event_orders', 9, 'Marked Issue #347528 as order-received', '2015-01-01 13:54:39', 'fa-info', 0),
(574, 1, 'event_orders', 9, 'Marked Issue #347528 as order-received', '2015-01-01 13:55:28', 'fa-info', 0),
(575, 1, 'event_orders', 13, 'Created an Order #681412', '2015-01-01 13:59:01', 'fa-plus', 0),
(576, 1, 'event_orders', 14, 'Created an Order #597668', '2015-01-01 16:36:23', 'fa-plus', 0),
(577, 1, 'invoices', 5, 'INVOICE #INV854991 created.', '2015-01-01 16:59:41', 'fa-plus', 0),
(578, 1, 'event_orders', 13, 'Edited an Order #681412', '2015-01-01 17:12:55', 'fa-pencil', 0),
(579, 1, 'event_orders', 12, 'Edited an Order #147139', '2015-01-01 17:22:30', 'fa-pencil', 0),
(580, 1, 'event_orders', 15, 'Created an Order #131148', '2015-01-01 17:22:41', 'fa-plus', 0),
(581, 1, 'events', 20, 'Admin edited a project #', '2015-01-02 17:20:18', 'fa-coffee', 0),
(582, 1, 'events', 21, 'Admin created a event #', '2015-01-02 18:37:38', 'fa-coffee', 0),
(583, 1, 'events', 23, 'Admin created a event #', '2015-01-02 18:46:08', 'fa-coffee', 0),
(584, 1, 'events', 24, 'Admin created a event #', '2015-01-02 18:49:07', 'fa-coffee', 0),
(585, 1, 'events', 25, 'Admin created a event #', '2015-01-02 18:53:03', 'fa-coffee', 0),
(586, 1, 'events', 26, 'Admin created a event #', '2015-01-02 18:55:59', 'fa-coffee', 0),
(587, 1, 'events', 29, 'Admin created a event #', '2015-01-02 19:45:31', 'fa-coffee', 0),
(588, 1, 'events', 29, 'Deleted Event #29 from the system', '2015-01-02 19:48:06', 'fa-times', 0),
(589, 1, 'events', 28, 'Admin edited a project #', '2015-01-02 19:49:35', 'fa-coffee', 0),
(590, 1, 'events', 28, 'Admin edited a project #', '2015-01-02 19:52:34', 'fa-coffee', 0),
(591, 1, 'events', 28, 'Admin edited a project #', '2015-01-02 19:56:40', 'fa-coffee', 0),
(592, 1, 'events', 28, 'Deleted Event #28 from the system', '2015-01-02 20:05:11', 'fa-times', 0),
(593, 1, 'events', 27, 'Deleted Event #27 from the system', '2015-01-02 20:05:15', 'fa-times', 0),
(594, 1, 'events', 26, 'Deleted Event #26 from the system', '2015-01-02 20:05:19', 'fa-times', 0),
(595, 1, 'events', 25, 'Deleted Event #25 from the system', '2015-01-02 20:05:23', 'fa-times', 0),
(596, 1, 'events', 24, 'Deleted Event #24 from the system', '2015-01-02 20:05:27', 'fa-times', 0),
(597, 1, 'events', 23, 'Deleted Event #23 from the system', '2015-01-02 20:05:30', 'fa-times', 0),
(598, 1, 'events', 22, 'Deleted Event #22 from the system', '2015-01-02 20:05:34', 'fa-times', 0),
(599, 1, 'events', 21, 'Deleted Event #21 from the system', '2015-01-02 20:05:37', 'fa-times', 0),
(600, 1, 'events', 20, 'Deleted Event #20 from the system', '2015-01-02 20:05:40', 'fa-times', 0),
(601, 1, 'events', 19, 'Deleted Event #19 from the system', '2015-01-02 20:05:44', 'fa-times', 0),
(602, 1, 'events', 18, 'Deleted Event #18 from the system', '2015-01-02 20:05:47', 'fa-times', 0),
(603, 1, 'events', 17, 'Deleted Event #17 from the system', '2015-01-02 20:05:50', 'fa-times', 0),
(604, 1, 'events', 16, 'Deleted Event #16 from the system', '2015-01-02 20:05:55', 'fa-times', 0),
(605, 1, 'events', 15, 'Deleted Event #15 from the system', '2015-01-02 20:05:58', 'fa-times', 0),
(606, 1, 'events', 14, 'Deleted Event #14 from the system', '2015-01-02 20:06:02', 'fa-times', 0),
(607, 1, 'events', 13, 'Deleted Event #13 from the system', '2015-01-02 20:06:06', 'fa-times', 0),
(608, 1, 'events', 12, 'Deleted Event #12 from the system', '2015-01-02 20:06:09', 'fa-times', 0),
(609, 1, 'events', 8, 'Deleted Event #8 from the system', '2015-01-02 20:06:12', 'fa-times', 0),
(610, 1, 'events', 7, 'Deleted Event #7 from the system', '2015-01-02 20:06:15', 'fa-times', 0),
(611, 1, 'events', 6, 'Deleted Event #6 from the system', '2015-01-02 20:06:18', 'fa-times', 0),
(612, 1, 'events', 5, 'Deleted Event #5 from the system', '2015-01-02 20:06:22', 'fa-times', 0),
(613, 1, 'events', 3, 'Deleted Event #3 from the system', '2015-01-02 20:06:25', 'fa-times', 0),
(614, 1, 'events', 2, 'Deleted Event #2 from the system', '2015-01-02 20:06:28', 'fa-times', 0),
(615, 1, 'events', 1, 'Deleted Event #1 from the system', '2015-01-02 20:06:31', 'fa-times', 0),
(616, 1, 'events', 30, 'Admin created a event #', '2015-01-02 20:18:03', 'fa-coffee', 0),
(617, 1, 'events', 31, 'Admin created a event #', '2015-01-02 20:22:58', 'fa-coffee', 0),
(618, 1, 'invoices', 13, 'Payment of USD 162 received and applied to INVOICE #INV91612', '2015-01-02 20:23:54', 'fa-usd', 0),
(619, 1, 'event_orders', 9, 'Marked Issue #347528 as order-received', '2015-01-02 20:25:11', 'fa-info', 0),
(620, 1, 'event_orders', 9, 'Marked Issue #347528 as order-completed', '2015-01-02 20:25:14', 'fa-info', 0),
(621, 1, 'events', 30, 'Admin edited a project #', '2015-01-02 20:35:04', 'fa-coffee', 0),
(622, 1, 'events', 30, 'Admin edited a project #', '2015-01-02 20:41:14', 'fa-coffee', 0),
(623, 1, 'events', 30, 'Admin edited a project #', '2015-01-02 21:16:16', 'fa-coffee', 0),
(624, 1, 'events', 30, 'Admin edited a project #', '2015-01-02 21:16:28', 'fa-coffee', 0),
(625, 1, 'events', 32, 'Admin created a event #', '2015-01-02 21:35:06', 'fa-coffee', 0),
(626, 1, 'events', 33, 'Admin created a event #', '2015-01-02 21:35:26', 'fa-coffee', 0),
(627, 1, 'Admin', 5, 'Added a new Scheduling ', '2015-01-02 21:37:10', 'fa-user', 0),
(628, 1, 'events', 34, 'Admin created a event #', '2015-01-02 21:38:50', 'fa-coffee', 0),
(629, 1, 'events', 35, 'Admin created a event #', '2015-01-02 21:39:37', 'fa-coffee', 0),
(630, 1, 'event_settings', 1, 'Updated Hour Settings ', '2015-01-02 21:40:26', 'fa-edit', 0),
(631, 1, 'events', 36, 'Admin created a event #', '2015-01-02 21:40:27', 'fa-coffee', 0),
(632, 1, 'events', 37, 'Admin created a event #', '2015-01-02 21:46:29', 'fa-coffee', 0),
(633, 1, 'Admin', 6, 'Added a new Scheduling ', '2015-01-02 22:02:16', 'fa-user', 0),
(634, 1, 'Admin', 7, 'Added a new Scheduling ', '2015-01-02 22:03:59', 'fa-user', 0),
(635, 1, 'invoices', 19, 'Payment of USD 150 received and applied to INVOICE #INV81566', '2015-01-03 00:04:10', 'fa-usd', 0),
(636, 1, 'event_orders', 16, 'Created an Order #488598', '2015-01-03 00:05:11', 'fa-plus', 0),
(637, 1, 'events', 38, 'Admin created a event #', '2015-01-03 00:06:26', 'fa-coffee', 0),
(638, 1, 'events', 39, 'Admin created a event #', '2015-01-03 00:27:17', 'fa-coffee', 0),
(639, 1, 'events', 39, 'Admin edited a project #', '2015-01-04 06:59:18', 'fa-coffee', 0),
(640, 1, 'event_orders', 9, 'Marked Issue #347528 as order-received', '2015-01-04 07:54:58', 'fa-info', 0),
(641, 1, 'events', 43, 'Admin created a event #', '2015-01-04 13:43:45', 'fa-coffee', 0),
(642, 1, 'events', 44, 'Admin created a event #', '2015-01-04 13:44:44', 'fa-coffee', 0),
(643, 1, 'events', 45, 'Admin created a event #', '2015-01-04 14:23:42', 'fa-coffee', 0),
(644, 1, 'events', 46, 'Admin created a event #', '2015-01-04 14:26:17', 'fa-coffee', 0),
(645, 1, 'events', 47, 'Admin created a event #', '2015-01-04 14:28:18', 'fa-coffee', 0),
(646, 1, 'events', 48, 'Admin created a event #', '2015-01-04 14:28:32', 'fa-coffee', 0),
(647, 1, 'events', 49, 'Admin created a event #', '2015-01-04 14:40:41', 'fa-coffee', 0),
(648, 1, 'events', 50, 'Admin created a event #', '2015-01-04 14:44:22', 'fa-coffee', 0),
(649, 1, 'events', 51, 'Admin created a event #', '2015-01-04 14:48:42', 'fa-coffee', 0),
(650, 1, 'events', 52, 'Admin created a event #', '2015-01-04 14:48:50', 'fa-coffee', 0),
(651, 1, 'events', 53, 'Admin created a event #', '2015-01-04 14:49:14', 'fa-coffee', 0),
(652, 1, 'events', 54, 'Admin created a event #', '2015-01-04 14:51:14', 'fa-coffee', 0),
(653, 1, 'events', 55, 'Admin created a event #', '2015-01-04 14:51:31', 'fa-coffee', 0),
(654, 1, 'events', 56, 'Admin created a event #', '2015-01-04 15:12:02', 'fa-coffee', 0),
(655, 1, 'estimates', 42, 'Admin edited ESTIMATE #EST73792', '2015-01-04 15:51:41', 'fa-pencil', 0),
(656, 1, 'events', 56, 'Deleted Event #56 from the system', '2015-01-04 16:36:00', 'fa-times', 0),
(657, 1, 'events', 56, 'Admin created a event #', '2015-01-05 11:33:28', 'fa-coffee', 0),
(658, 1, 'invoices', 36, 'Payment of USD 300 received and applied to INVOICE #INV72112', '2015-01-05 11:36:48', 'fa-usd', 0),
(659, 1, 'events', 57, 'Admin created a event #', '2015-01-05 11:49:05', 'fa-coffee', 0),
(660, 1, 'events', 40, 'Deleted Event #40 from the system', '2015-01-05 20:19:26', 'fa-times', 0),
(661, 1, 'events', 41, 'Deleted Event #41 from the system', '2015-01-06 15:31:43', 'fa-times', 0),
(662, 1, 'events', 42, 'Deleted Event #42 from the system', '2015-01-06 15:31:51', 'fa-times', 0),
(663, 1, 'events', 43, 'Deleted Event #43 from the system', '2015-01-06 15:31:57', 'fa-times', 0),
(664, 1, 'events', 45, 'Deleted Event #45 from the system', '2015-01-06 15:32:05', 'fa-times', 0),
(665, 1, 'events', 49, 'Deleted Event #49 from the system', '2015-01-06 15:32:10', 'fa-times', 0),
(666, 1, 'events', 47, 'Deleted Event #47 from the system', '2015-01-06 15:32:17', 'fa-times', 0),
(667, 1, 'Admin', 8, 'Added a new Scheduling ', '2015-01-06 18:10:12', 'fa-user', 0),
(668, 1, 'Admin', 9, 'Added a new Scheduling ', '2015-01-06 18:10:23', 'fa-user', 0),
(669, 1, 'Admin', 10, 'Added a new Scheduling ', '2015-01-07 20:26:49', 'fa-user', 0),
(670, 1, 'invoices', 37, 'Payment of USD 200 received and applied to INVOICE #INV71316', '2015-01-19 23:53:07', 'fa-usd', 0),
(671, 1, 'Admin', 11, 'Added a new Scheduling ', '2015-01-19 23:55:22', 'fa-user', 0),
(672, 1, 'event_orders', 17, 'Created an Order #668623', '2015-01-20 00:05:20', 'fa-plus', 0),
(673, 1, 'Customers', 9, 'Added a new Event Type birthday', '2015-01-20 00:16:52', 'fa-user', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fx_admin`
--

CREATE TABLE IF NOT EXISTS `fx_admin` (
`co_id` int(11) NOT NULL,
  `event_ref` int(32) NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `event_status` varchar(10) NOT NULL DEFAULT '-',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_admin`
--

INSERT INTO `fx_admin` (`co_id`, `event_ref`, `event_type`, `event_status`, `date_added`) VALUES
(4, 1117569, 'Confirmed', 'a', '2014-11-18 17:12:05'),
(7, 9136188, 'Public', '', '2014-11-18 22:38:45'),
(8, 9291637, 'Other', '', '2014-11-18 22:38:52'),
(9, 4218283, 'birthday', '', '2015-01-20 00:16:52');

-- --------------------------------------------------------

--
-- Table structure for table `fx_booking_limits`
--

CREATE TABLE IF NOT EXISTS `fx_booking_limits` (
`id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `event_ref` int(60) NOT NULL,
  `month_limit` int(10) NOT NULL,
  `day_limit` int(10) NOT NULL,
  `expiry_date` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fx_booking_limits`
--

INSERT INTO `fx_booking_limits` (`id`, `date_added`, `event_ref`, `month_limit`, `day_limit`, `expiry_date`) VALUES
(1, '2014-11-28 05:35:24', 3161263, 8, 7, '');

-- --------------------------------------------------------

--
-- Table structure for table `fx_calendar_view`
--

CREATE TABLE IF NOT EXISTS `fx_calendar_view` (
`id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `event_ref` int(60) NOT NULL,
  `view1` text NOT NULL,
  `view2` text NOT NULL,
  `view3` varchar(50) NOT NULL,
  `view4` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fx_calendar_view`
--

INSERT INTO `fx_calendar_view` (`id`, `date_added`, `event_ref`, `view1`, `view2`, `view3`, `view4`) VALUES
(1, '2014-11-28 09:04:42', 123, '1,5,8', 'Grid', '1,5,8', 'last_month');

-- --------------------------------------------------------

--
-- Table structure for table `fx_captcha`
--

CREATE TABLE IF NOT EXISTS `fx_captcha` (
`captcha_id` bigint(13) unsigned NOT NULL,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `word` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_captcha`
--

INSERT INTO `fx_captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(1, 1413789321, '::1', 'pIBDR2Zl'),
(2, 1416324369, '127.0.0.1', 'mICFCDvs'),
(3, 1416435444, '127.0.0.1', 'x08aFrkQ');

-- --------------------------------------------------------

--
-- Table structure for table `fx_comments`
--

CREATE TABLE IF NOT EXISTS `fx_comments` (
`comment_id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `posted_by` int(11) NOT NULL,
  `message` text CHARACTER SET latin1 NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_comment_replies`
--

CREATE TABLE IF NOT EXISTS `fx_comment_replies` (
`reply_id` int(11) NOT NULL,
  `parent_comment` int(11) NOT NULL,
  `reply_msg` text CHARACTER SET latin1 NOT NULL,
  `replied_by` int(11) NOT NULL,
  `del` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No',
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_companies`
--

CREATE TABLE IF NOT EXISTS `fx_companies` (
`co_id` int(11) NOT NULL,
  `customer_ref` int(32) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `primary_contact` varchar(10) NOT NULL DEFAULT '-',
  `customer_email` varchar(64) NOT NULL,
  `customer_website` varchar(255) NOT NULL,
  `customer_phone` varchar(64) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(255) NOT NULL,
  `VAT` varchar(64) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `notes` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_companies`
--

INSERT INTO `fx_companies` (`co_id`, `customer_ref`, `customer_name`, `primary_contact`, `customer_email`, `customer_website`, `customer_phone`, `customer_address`, `city`, `country`, `VAT`, `date_added`, `notes`) VALUES
(1, 8127689, '360itpro', '-', 'info@360itpro.com', '360itpro.com', '9779980068', 'fermont', 'Fermont', 'United States of America', '', '2014-11-15 22:19:38', 'nnn'),
(2, 6599967, 'Navi', '-', 'aa@gmail.com', '', '7777777777', 'fdgdf', '', 'United States of America', '', '2014-11-17 17:19:38', 'ngvf');

-- --------------------------------------------------------

--
-- Table structure for table `fx_config`
--

CREATE TABLE IF NOT EXISTS `fx_config` (
  `config_key` varchar(255) CHARACTER SET latin1 NOT NULL,
  `value` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_config`
--

INSERT INTO `fx_config` (`config_key`, `value`) VALUES
('allowed_files', 'gif|jpg|png|pdf|doc|txt|docx|xls|zip|rar'),
('base_url', 'http://localhost:8000/allrave/'),
('contact_person', 'EventRP'),
('cron_key', '34WI2L12L87I1A65M90M9A42N41D08A26I'),
('customer_address', 'Fermont'),
('customer_city', 'Fermont'),
('customer_country', 'United States of America'),
('customer_domain', 'http://localhost/hotel/'),
('customer_email', 'navrinder@360itpro.com'),
('customer_logo', 'logo.png'),
('customer_name', 'EventRP'),
('customer_phone', '+123 456 789'),
('decimal_separator', ','),
('default_currency', 'USD'),
('default_currency_symbol', '$'),
('default_tax', '8.25'),
('default_terms', 'Thank you for your business. Please process this invoice within the due date.'),
('demo_mode', 'FALSE'),
('developer', 'ig63Yd/+yuA8127gEyTz9TY4pnoeKq8dtocVP44+BJvtlRp8Vqcetwjk51dhSB6Rx8aVIKOPfUmNyKGWK7C/gg=='),
('email_estimate_message', 'Hi {CLIENT}<br>\r\nThanks for your business inquiry. <br>\r\n\r\nThe estimate EST {REF} is attached with this email. <br>\r\nEstimate Overview:<br>\r\nEstimate # : EST {REF}<br>\r\nAmount: {CURRENCY} {AMOUNT}<br>\r\n \r\nYou can view the estimate online at:<br>\r\n{LINK}<br>\r\n\r\nBest Regards,<br>\r\n{COMPANY}'),
('email_invoice_message', 'Hello {CLIENT}<br>\r\nHere is the invoice of {CURRENCY} {AMOUNT}<br>\r\nYou can view the invoice online at:<br>\r\n\r\n{LINK}<br>\r\n\r\n\r\nBest Regards,<br>\r\n\r\n{COMPANY}'),
('end_time', '24'),
('file_max_size', '8000'),
('invoice_logo', 'invoice_logo.png'),
('language', 'english'),
('paypal_cancel_url', 'paypal/cancel'),
('paypal_email', 'navrinder@360itpro.com'),
('paypal_ipn_url', 'paypal/t_ipn/ipn'),
('paypal_live', 'TRUE'),
('paypal_success_url', 'paypal/success'),
('protocol', 'mail'),
('reminder_message', 'Hello {CLIENT}<br>\r\nThis is a friendly reminder to pay your invoice of {CURRENCY} {AMOUNT}<br>\r\n\r\nYou can view the invoice online at:<br>\r\n\r\n{LINK}<br>\r\n\r\n\r\nBest Regards,<br>\r\n\r\n{COMPANY}'),
('reset_key', '34WI2L12L87I1A65M90M9A42N41D08A26I'),
('security_deposit', '600'),
('service_charge', '15'),
('sidebar_theme', 'dark'),
('site_author', '360itpro'),
('site_desc', 'eventRP'),
('smtp_host', ''),
('smtp_pass', 'yHMhW2M211+RnGhRORE40R7RA1neupFwE1ybIfX7s3WYtir/CBeUXOeeaGFiPYK6GByCA0ynePV9ubMKv2k0GQ=='),
('smtp_port', '25'),
('smtp_user', ''),
('start_time', '1'),
('thousand_separator', '.'),
('use_postmark', 'FALSE'),
('webmaster_email', 'navrinder@360itpro.com'),
('website_name', 'EventRP');

-- --------------------------------------------------------

--
-- Table structure for table `fx_countries`
--

CREATE TABLE IF NOT EXISTS `fx_countries` (
`id` int(6) NOT NULL,
  `value` varchar(250) CHARACTER SET latin1 NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=243 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_countries`
--

INSERT INTO `fx_countries` (`id`, `value`) VALUES
(1, 'Afghanistan'),
(2, 'Aringland Islands'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'Antigua and Barbuda'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Bahamas'),
(18, 'Bahrain'),
(19, 'Bangladesh'),
(20, 'Barbados'),
(21, 'Belarus'),
(22, 'Belgium'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bhutan'),
(27, 'Bolivia'),
(28, 'Bosnia and Herzegovina'),
(29, 'Botswana'),
(30, 'Bouvet Island'),
(31, 'Brazil'),
(32, 'British Indian Ocean territory'),
(33, 'Brunei Darussalam'),
(34, 'Bulgaria'),
(35, 'Burkina Faso'),
(36, 'Burundi'),
(37, 'Cambodia'),
(38, 'Cameroon'),
(39, 'Canada'),
(40, 'Cape Verde'),
(41, 'Cayman Islands'),
(42, 'Central African Republic'),
(43, 'Chad'),
(44, 'Chile'),
(45, 'China'),
(46, 'Christmas Island'),
(47, 'Cocos (Keeling) Islands'),
(48, 'Colombia'),
(49, 'Comoros'),
(50, 'Congo'),
(51, 'Congo'),
(52, ' Democratic Republic'),
(53, 'Cook Islands'),
(54, 'Costa Rica'),
(55, 'Ivory Coast (Ivory Coast)'),
(56, 'Croatia (Hrvatska)'),
(57, 'Cuba'),
(58, 'Cyprus'),
(59, 'Czech Republic'),
(60, 'Denmark'),
(61, 'Djibouti'),
(62, 'Dominica'),
(63, 'Dominican Republic'),
(64, 'East Timor'),
(65, 'Ecuador'),
(66, 'Egypt'),
(67, 'El Salvador'),
(68, 'Equatorial Guinea'),
(69, 'Eritrea'),
(70, 'Estonia'),
(71, 'Ethiopia'),
(72, 'Falkland Islands'),
(73, 'Faroe Islands'),
(74, 'Fiji'),
(75, 'Finland'),
(76, 'France'),
(77, 'French Guiana'),
(78, 'French Polynesia'),
(79, 'French Southern Territories'),
(80, 'Gabon'),
(81, 'Gambia'),
(82, 'Georgia'),
(83, 'Germany'),
(84, 'Ghana'),
(85, 'Gibraltar'),
(86, 'Greece'),
(87, 'Greenland'),
(88, 'Grenada'),
(89, 'Guadeloupe'),
(90, 'Guam'),
(91, 'Guatemala'),
(92, 'Guinea'),
(93, 'Guinea-Bissau'),
(94, 'Guyana'),
(95, 'Haiti'),
(96, 'Heard and McDonald Islands'),
(97, 'Honduras'),
(98, 'Hong Kong'),
(99, 'Hungary'),
(100, 'Iceland'),
(101, 'India'),
(102, 'Indonesia'),
(103, 'Iran'),
(104, 'Iraq'),
(105, 'Ireland'),
(106, 'Israel'),
(107, 'Italy'),
(108, 'Jamaica'),
(109, 'Japan'),
(110, 'Jordan'),
(111, 'Kazakhstan'),
(112, 'Kenya'),
(113, 'Kiribati'),
(114, 'Korea (north)'),
(115, 'Korea (south)'),
(116, 'Kuwait'),
(117, 'Kyrgyzstan'),
(118, 'Lao People''s Democratic Republic'),
(119, 'Latvia'),
(120, 'Lebanon'),
(121, 'Lesotho'),
(122, 'Liberia'),
(123, 'Libyan Arab Jamahiriya'),
(124, 'Liechtenstein'),
(125, 'Lithuania'),
(126, 'Luxembourg'),
(127, 'Macao'),
(128, 'Macedonia'),
(129, 'Madagascar'),
(130, 'Malawi'),
(131, 'Malaysia'),
(132, 'Maldives'),
(133, 'Mali'),
(134, 'Malta'),
(135, 'Marshall Islands'),
(136, 'Martinique'),
(137, 'Mauritania'),
(138, 'Mauritius'),
(139, 'Mayotte'),
(140, 'Mexico'),
(141, 'Micronesia'),
(142, 'Moldova'),
(143, 'Monaco'),
(144, 'Mongolia'),
(145, 'Montserrat'),
(146, 'Morocco'),
(147, 'Mozambique'),
(148, 'Myanmar'),
(149, 'Namibia'),
(150, 'Nauru'),
(151, 'Nepal'),
(152, 'Netherlands'),
(153, 'Netherlands Antilles'),
(154, 'New Caledonia'),
(155, 'New Zealand'),
(156, 'Nicaragua'),
(157, 'Niger'),
(158, 'Nigeria'),
(159, 'Niue'),
(160, 'Norfolk Island'),
(161, 'Northern Mariana Islands'),
(162, 'Norway'),
(163, 'Oman'),
(164, 'Pakistan'),
(165, 'Palau'),
(166, 'Palestinian Territories'),
(167, 'Panama'),
(168, 'Papua New Guinea'),
(169, 'Paraguay'),
(170, 'Peru'),
(171, 'Philippines'),
(172, 'Pitcairn'),
(173, 'Poland'),
(174, 'Portugal'),
(175, 'Puerto Rico'),
(176, 'Qatar'),
(177, 'Runion'),
(178, 'Romania'),
(179, 'Russian Federation'),
(180, 'Rwanda'),
(181, 'Saint Helena'),
(182, 'Saint Kitts and Nevis'),
(183, 'Saint Lucia'),
(184, 'Saint Pierre and Miquelon'),
(185, 'Saint Vincent and the Grenadines'),
(186, 'Samoa'),
(187, 'San Marino'),
(188, 'Sao Tome and Principe'),
(189, 'Saudi Arabia'),
(190, 'Senegal'),
(191, 'Serbia and Montenegro'),
(192, 'Seychelles'),
(193, 'Sierra Leone'),
(194, 'Singapore'),
(195, 'Slovakia'),
(196, 'Slovenia'),
(197, 'Solomon Islands'),
(198, 'Somalia'),
(199, 'South Africa'),
(200, 'South Georgia and the South Sandwich Islands'),
(201, 'Spain'),
(202, 'Sri Lanka'),
(203, 'Sudan'),
(204, 'Suriname'),
(205, 'Svalbard and Jan Mayen Islands'),
(206, 'Swaziland'),
(207, 'Sweden'),
(208, 'Switzerland'),
(209, 'Syria'),
(210, 'Taiwan'),
(211, 'Tajikistan'),
(212, 'Tanzania'),
(213, 'Thailand'),
(214, 'Togo'),
(215, 'Tokelau'),
(216, 'Tonga'),
(217, 'Trinidad and Tobago'),
(218, 'Tunisia'),
(219, 'Turkey'),
(220, 'Turkmenistan'),
(221, 'Turks and Caicos Islands'),
(222, 'Tuvalu'),
(223, 'Uganda'),
(224, 'Ukraine'),
(225, 'United Arab Emirates'),
(226, 'United Kingdom'),
(227, 'United States of America'),
(228, 'Uruguay'),
(229, 'Uzbekistan'),
(230, 'Vanuatu'),
(231, 'Vatican City'),
(232, 'Venezuela'),
(233, 'Vietnam'),
(234, 'Virgin Islands (British)'),
(235, 'Virgin Islands (US)'),
(236, 'Wallis and Futuna Islands'),
(237, 'Western Sahara'),
(238, 'Yemen'),
(239, 'Zaire'),
(240, 'Zambia'),
(241, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `fx_day_view`
--

CREATE TABLE IF NOT EXISTS `fx_day_view` (
`id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `event_ref` int(60) NOT NULL,
  `day_view` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fx_day_view`
--

INSERT INTO `fx_day_view` (`id`, `date_added`, `event_ref`, `day_view`) VALUES
(1, '2014-11-28 07:08:29', 123, '24');

-- --------------------------------------------------------

--
-- Table structure for table `fx_desserts`
--

CREATE TABLE IF NOT EXISTS `fx_desserts` (
  `item` varchar(50) NOT NULL,
  `cost_price` int(100) NOT NULL,
  `customer_price` int(100) NOT NULL,
`id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `menus_ref` int(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fx_desserts`
--

INSERT INTO `fx_desserts` (`item`, `cost_price`, `customer_price`, `id`, `date_added`, `menus_ref`) VALUES
('P2', 99, 120, 5, '2014-11-26 15:43:35', 8252214),
('sdas', 345, 324, 6, '2014-11-26 19:54:19', 9726246);

-- --------------------------------------------------------

--
-- Table structure for table `fx_driver`
--

CREATE TABLE IF NOT EXISTS `fx_driver` (
`id` int(11) NOT NULL,
  `driver_name` varchar(50) NOT NULL,
  `driver_license` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fx_dry_till`
--

CREATE TABLE IF NOT EXISTS `fx_dry_till` (
  `package` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `cost_price` int(100) NOT NULL,
  `customer_price` int(100) NOT NULL,
`id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `menus_ref` int(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fx_dry_till`
--

INSERT INTO `fx_dry_till` (`package`, `description`, `cost_price`, `customer_price`, `id`, `date_added`, `menus_ref`) VALUES
('p1', '', 99, 110, 4, '2014-11-26 15:42:42', 3161263),
('P2', '', 99, 120, 5, '2014-11-26 15:43:35', 8252214),
('asasre', '', 111, 222, 6, '2014-11-26 19:55:01', 4917721),
('vfb', '', 44, 55, 7, '2014-11-26 19:54:57', 4477973);

-- --------------------------------------------------------

--
-- Table structure for table `fx_entrees`
--

CREATE TABLE IF NOT EXISTS `fx_entrees` (
  `item` varchar(50) NOT NULL,
  `cost_price` int(100) NOT NULL,
  `customer_price` int(100) NOT NULL,
`id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `menus_ref` int(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fx_entrees`
--

INSERT INTO `fx_entrees` (`item`, `cost_price`, `customer_price`, `id`, `date_added`, `menus_ref`) VALUES
('P2', 99, 120, 5, '2014-11-26 15:43:35', 8252214);

-- --------------------------------------------------------

--
-- Table structure for table `fx_estimates`
--

CREATE TABLE IF NOT EXISTS `fx_estimates` (
`est_id` int(11) NOT NULL,
  `reference_no` varchar(32) CHARACTER SET latin1 NOT NULL,
  `event_id` varchar(64) CHARACTER SET latin1 NOT NULL,
  `due_date` varchar(40) CHARACTER SET latin1 NOT NULL,
  `notes` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'Looking forward for your business.',
  `tax` float NOT NULL DEFAULT '0',
  `status` enum('Accepted','Declined','Pending') CHARACTER SET latin1 NOT NULL DEFAULT 'Pending',
  `date_sent` varchar(64) CHARACTER SET latin1 NOT NULL,
  `est_deleted` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No',
  `date_saved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `emailed` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No',
  `invoiced` enum('Yes','No') CHARACTER SET latin1 DEFAULT 'No'
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_estimates`
--

INSERT INTO `fx_estimates` (`est_id`, `reference_no`, `event_id`, `due_date`, `notes`, `tax`, `status`, `date_sent`, `est_deleted`, `date_saved`, `emailed`, `invoiced`) VALUES
(20, 'EST39697', '30', '05-01-2015', 'Looking forward to doing business with you.', 8.25, 'Pending', '', 'No', '2015-01-02 20:18:03', 'No', 'No'),
(21, 'EST24834', '31', '16-01-2015', 'Looking forward to doing business with you.', 8.25, 'Pending', '', 'No', '2015-01-02 20:22:58', 'No', 'No'),
(22, 'EST58828', '32', '30-01-2015', 'Looking forward to doing business with you.', 8.25, 'Pending', '', 'No', '2015-01-02 21:35:06', 'No', 'No'),
(23, 'EST95968', '33', '09-01-2015', 'Looking forward to doing business with you.', 8.25, 'Pending', '', 'No', '2015-01-02 21:35:26', 'No', 'No'),
(24, 'EST55917', '34', '09-01-2015', 'Looking forward to doing business with you.', 8, 'Pending', '', 'No', '2015-01-02 21:38:50', 'No', 'No'),
(25, 'EST47465', '35', '09-01-2015', 'Looking forward to doing business with you.', 8, 'Pending', '', 'No', '2015-01-02 21:39:37', 'No', 'No'),
(26, 'EST73179', '36', '09-01-2015', 'Looking forward to doing business with you.', 8, 'Pending', '', 'No', '2015-01-02 21:40:27', 'No', 'No'),
(27, 'EST91971', '37', '06-01-2015', 'Looking forward to doing business with you.', 8, 'Pending', '', 'No', '2015-01-02 21:46:29', 'No', 'No'),
(28, 'EST68915', '38', '05-01-2015', 'Looking forward to doing business with you.', 8, 'Pending', '', 'No', '2015-01-03 00:06:26', 'No', 'No'),
(29, 'EST81987', '39', '05-01-2015', 'Looking forward to doing business with you.', 8, 'Pending', '', 'No', '2015-01-03 00:27:17', 'No', 'No'),
(30, 'EST58247', '43', '9-1-2015', 'Looking forward to doing business with you.', 8, 'Pending', '', 'No', '2015-01-04 13:43:45', 'No', 'No'),
(31, 'EST81685', '45', '9-1-2015', 'Looking forward to doing business with you.', 8, 'Pending', '', 'No', '2015-01-04 14:23:42', 'No', 'No'),
(32, 'EST78985', '46', '9-1-2015', 'Looking forward to doing business with you.', 8, 'Pending', '', 'No', '2015-01-04 14:26:17', 'No', 'No'),
(33, 'EST68685', '47', '9-1-2015', 'Looking forward to doing business with you.', 8, 'Pending', '', 'No', '2015-01-04 14:28:17', 'No', 'No'),
(34, 'EST13134', '48', '9-1-2015', 'Looking forward to doing business with you.', 8, 'Pending', '', 'No', '2015-01-04 14:28:31', 'No', 'No'),
(35, 'EST52621', '49', '9-1-2015', 'Looking forward to doing business with you.', 8, 'Pending', '', 'No', '2015-01-04 14:40:41', 'No', 'No'),
(36, 'EST91144', '50', '24-01-2015', 'Looking forward to doing business with you.', 8, 'Pending', '', 'No', '2015-01-04 14:44:22', 'No', 'No'),
(37, 'EST79236', '51', '24-01-2015', 'Looking forward to doing business with you.', 8, 'Pending', '', 'No', '2015-01-04 14:48:41', 'No', 'No'),
(38, 'EST93136', '52', '24-01-2015', 'Looking forward to doing business with you.', 8, 'Pending', '', 'No', '2015-01-04 14:48:50', 'No', 'No'),
(39, 'EST53182', '53', '24-01-2015', 'Looking forward to doing business with you.', 8, 'Pending', '', 'No', '2015-01-04 14:49:14', 'No', 'No'),
(40, 'EST28845', '54', '24-01-2015', 'Looking forward to doing business with you.', 8, 'Pending', '', 'No', '2015-01-04 14:51:14', 'No', 'No'),
(41, 'EST33178', '55', '24-01-2015', 'Looking forward to doing business with you.', 8, 'Pending', '', 'No', '2015-01-04 14:51:30', 'No', 'No'),
(42, 'EST73792', '32', '25-01-2015', 'Looking forward to doing business with you.', 8.25, 'Pending', '', 'No', '2015-01-04 15:12:01', 'No', 'No'),
(43, 'EST53641', '56', '05-01-2015', 'Looking forward to doing business with you.', 8.25, 'Pending', '', 'No', '2015-01-05 11:33:28', 'No', 'No'),
(44, 'EST76864', '57', '05-01-2015', 'Looking forward to doing business with you.', 8.25, 'Pending', '', 'No', '2015-01-05 11:49:04', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `fx_estimate_items`
--

CREATE TABLE IF NOT EXISTS `fx_estimate_items` (
`item_id` int(11) NOT NULL,
  `estimate_id` int(11) NOT NULL,
  `item_desc` varchar(200) CHARACTER SET latin1 NOT NULL,
  `unit_cost` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_cost` float NOT NULL,
  `date_saved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_estimate_items`
--

INSERT INTO `fx_estimate_items` (`item_id`, `estimate_id`, `item_desc`, `unit_cost`, `quantity`, `total_cost`, `date_saved`) VALUES
(34, 20, 'Additional Décor', 100, 1, 100, '2015-01-02 20:18:03'),
(35, 20, 'Security Officer', 200, 1, 200, '2015-01-02 20:18:03'),
(36, 21, 'Cake', 45, 1, 45, '2015-01-02 20:22:58'),
(37, 21, 'DJ Services', 50, 1, 50, '2015-01-02 20:22:58'),
(38, 21, 'Bartender', 55, 1, 55, '2015-01-02 20:22:58'),
(39, 22, 'Wireless Mic/Speaker', 55, 1, 55, '2015-01-02 21:35:06'),
(40, 22, 'Bartender', 25, 1, 25, '2015-01-02 21:35:06'),
(41, 22, 'Security Officer', 100, 1, 100, '2015-01-02 21:35:06'),
(42, 23, 'Cake', 60, 1, 60, '2015-01-02 21:35:26'),
(43, 23, 'Additional Waiter', 120, 1, 120, '2015-01-02 21:35:26'),
(44, 24, 'Cake', 60, 1, 60, '2015-01-02 21:38:50'),
(45, 24, 'Additional Waiter', 120, 1, 120, '2015-01-02 21:38:50'),
(46, 25, 'Cake', 60, 1, 60, '2015-01-02 21:39:37'),
(47, 25, 'Additional Waiter', 120, 1, 120, '2015-01-02 21:39:37'),
(48, 26, 'Cake', 60, 1, 60, '2015-01-02 21:40:27'),
(49, 26, 'Additional Waiter', 120, 1, 120, '2015-01-02 21:40:27'),
(50, 27, 'Additional Décor', 100, 1, 100, '2015-01-02 21:46:29'),
(51, 27, 'Security Officer', 100, 1, 100, '2015-01-02 21:46:29'),
(52, 28, 'Additional Décor', 100, 1, 100, '2015-01-03 00:06:26'),
(53, 28, 'Security Officer', 100, 1, 100, '2015-01-03 00:06:26'),
(54, 29, 'Cake', 60, 1, 60, '2015-01-03 00:27:17'),
(55, 29, 'Additional Décor', 100, 1, 100, '2015-01-03 00:27:17'),
(56, 29, 'Wireless Mic/Speaker', 100, 1, 100, '2015-01-03 00:27:17'),
(57, 29, 'Bartender', 25, 1, 25, '2015-01-03 00:27:17'),
(58, 29, 'Security Officer', 55, 1, 55, '2015-01-03 00:27:17'),
(59, 29, 'Venue Rental', 100, 1, 100, '2015-01-03 00:27:17'),
(60, 29, 'Catering Bayout', 0, 1, 0, '2015-01-03 00:27:17'),
(61, 29, 'Extras', 340, 1, 340, '2015-01-03 00:27:17'),
(64, 29, 'Security Deposit', 500, 1, 500, '2015-01-03 00:27:17'),
(65, 30, 'Additional Décor', 100, 1, 100, '2015-01-04 13:43:45'),
(66, 30, 'Additional Waiter', 120, 1, 120, '2015-01-04 13:43:45'),
(67, 30, 'Venue Rental', 112, 1, 112, '2015-01-04 13:43:45'),
(68, 30, 'Catering Bayout', 600, 1, 600, '2015-01-04 13:43:45'),
(69, 30, 'Extras', 220, 1, 220, '2015-01-04 13:43:45'),
(70, 30, 'Security Deposit', 500, 1, 500, '2015-01-04 13:43:45'),
(71, 0, 'Additional Décor', 100, 1, 100, '2015-01-04 13:44:44'),
(72, 0, 'Additional Waiter', 120, 1, 120, '2015-01-04 13:44:44'),
(73, 0, 'Venue Rental', 112, 1, 112, '2015-01-04 13:44:44'),
(74, 0, 'Catering Bayout', 600, 1, 600, '2015-01-04 13:44:44'),
(75, 0, 'Extras', 220, 1, 220, '2015-01-04 13:44:44'),
(76, 0, 'Security Deposit', 500, 1, 500, '2015-01-04 13:44:44'),
(77, 31, 'Additional Décor', 100, 1, 100, '2015-01-04 14:23:42'),
(78, 31, 'Additional Waiter', 120, 1, 120, '2015-01-04 14:23:42'),
(79, 31, 'Venue Rental', 112, 1, 112, '2015-01-04 14:23:42'),
(80, 31, 'Catering Bayout', 600, 1, 600, '2015-01-04 14:23:42'),
(81, 31, 'Extras', 220, 1, 220, '2015-01-04 14:23:42'),
(82, 31, 'Security Deposit', 500, 1, 500, '2015-01-04 14:23:42'),
(83, 32, 'Additional Décor', 100, 1, 100, '2015-01-04 14:26:17'),
(84, 32, 'Additional Waiter', 120, 1, 120, '2015-01-04 14:26:17'),
(85, 32, 'Venue Rental', 112, 1, 112, '2015-01-04 14:26:17'),
(86, 32, 'Catering Bayout', 600, 1, 600, '2015-01-04 14:26:17'),
(87, 32, 'Extras', 220, 1, 220, '2015-01-04 14:26:17'),
(88, 32, 'Security Deposit', 500, 1, 500, '2015-01-04 14:26:17'),
(89, 33, 'Additional Décor', 100, 1, 100, '2015-01-04 14:28:18'),
(90, 33, 'Additional Waiter', 120, 1, 120, '2015-01-04 14:28:18'),
(91, 33, 'Venue Rental', 112, 1, 112, '2015-01-04 14:28:18'),
(92, 33, 'Catering Bayout', 600, 1, 600, '2015-01-04 14:28:18'),
(93, 33, 'Extras', 220, 1, 220, '2015-01-04 14:28:18'),
(94, 33, 'Security Deposit', 500, 1, 500, '2015-01-04 14:28:18'),
(95, 34, 'Additional Décor', 100, 1, 100, '2015-01-04 14:28:31'),
(96, 34, 'Additional Waiter', 120, 1, 120, '2015-01-04 14:28:31'),
(97, 34, 'Venue Rental', 112, 1, 112, '2015-01-04 14:28:31'),
(98, 34, 'Catering Bayout', 600, 1, 600, '2015-01-04 14:28:31'),
(99, 34, 'Extras', 220, 1, 220, '2015-01-04 14:28:31'),
(100, 34, 'Security Deposit', 500, 1, 500, '2015-01-04 14:28:31'),
(101, 35, 'Additional Décor', 100, 1, 100, '2015-01-04 14:40:41'),
(102, 35, 'Additional Waiter', 120, 1, 120, '2015-01-04 14:40:41'),
(103, 35, 'Venue Rental', 112, 1, 112, '2015-01-04 14:40:41'),
(104, 35, 'Catering Bayout', 600, 1, 600, '2015-01-04 14:40:41'),
(105, 35, 'Extras', 220, 1, 220, '2015-01-04 14:40:41'),
(106, 35, 'Security Deposit', 500, 1, 500, '2015-01-04 14:40:41'),
(107, 36, 'Additional Décor', 100, 1, 100, '2015-01-04 14:44:22'),
(108, 36, 'Additional Waiter', 120, 1, 120, '2015-01-04 14:44:22'),
(109, 36, 'Venue Rental', 112, 1, 112, '2015-01-04 14:44:22'),
(110, 36, 'Catering Bayout', 600, 1, 600, '2015-01-04 14:44:22'),
(111, 36, 'Extras', 220, 1, 220, '2015-01-04 14:44:22'),
(112, 36, 'Security Deposit', 500, 1, 500, '2015-01-04 14:44:22'),
(113, 37, 'Additional Décor', 100, 1, 100, '2015-01-04 14:48:41'),
(114, 37, 'Additional Waiter', 120, 1, 120, '2015-01-04 14:48:41'),
(115, 37, 'Venue Rental', 112, 1, 112, '2015-01-04 14:48:41'),
(116, 37, 'Catering Bayout', 600, 1, 600, '2015-01-04 14:48:41'),
(117, 37, 'Extras', 220, 1, 220, '2015-01-04 14:48:41'),
(118, 37, 'Security Deposit', 500, 1, 500, '2015-01-04 14:48:41'),
(119, 38, 'Additional Décor', 100, 1, 100, '2015-01-04 14:48:50'),
(120, 38, 'Additional Waiter', 120, 1, 120, '2015-01-04 14:48:50'),
(121, 38, 'Venue Rental', 112, 1, 112, '2015-01-04 14:48:50'),
(122, 38, 'Catering Bayout', 600, 1, 600, '2015-01-04 14:48:50'),
(123, 38, 'Extras', 220, 1, 220, '2015-01-04 14:48:50'),
(124, 38, 'Security Deposit', 500, 1, 500, '2015-01-04 14:48:50'),
(125, 39, 'Additional Décor', 100, 1, 100, '2015-01-04 14:49:14'),
(126, 39, 'Additional Waiter', 120, 1, 120, '2015-01-04 14:49:14'),
(127, 39, 'Venue Rental', 112, 1, 112, '2015-01-04 14:49:14'),
(128, 39, 'Catering Bayout', 600, 1, 600, '2015-01-04 14:49:14'),
(129, 39, 'Extras', 220, 1, 220, '2015-01-04 14:49:14'),
(130, 39, 'Security Deposit', 500, 1, 500, '2015-01-04 14:49:14'),
(131, 40, 'Additional Décor', 100, 1, 100, '2015-01-04 14:51:14'),
(132, 40, 'Additional Waiter', 120, 1, 120, '2015-01-04 14:51:14'),
(133, 40, 'Venue Rental', 112, 1, 112, '2015-01-04 14:51:14'),
(134, 40, 'Catering Bayout', 600, 1, 600, '2015-01-04 14:51:14'),
(135, 40, 'Extras', 220, 1, 220, '2015-01-04 14:51:14'),
(136, 40, 'Security Deposit', 500, 1, 500, '2015-01-04 14:51:14'),
(137, 41, 'Additional Décor', 100, 1, 100, '2015-01-04 14:51:30'),
(138, 41, 'Additional Waiter', 120, 1, 120, '2015-01-04 14:51:30'),
(139, 41, 'Venue Rental', 112, 1, 112, '2015-01-04 14:51:31'),
(140, 41, 'Catering Bayout', 600, 1, 600, '2015-01-04 14:51:31'),
(141, 41, 'Extras', 220, 1, 220, '2015-01-04 14:51:31'),
(145, 42, 'Venue Rental', 112, 1, 112, '2015-01-04 15:12:01'),
(146, 42, 'Catering Bayout', 600, 1, 600, '2015-01-04 15:12:01'),
(147, 42, 'Extras', 220, 1, 220, '2015-01-04 15:12:01'),
(148, 43, 'Additional Décor', 100, 1, 100, '2015-01-05 11:33:28'),
(149, 43, 'Additional Waiter', 120, 1, 120, '2015-01-05 11:33:28'),
(150, 43, 'Security Officer', 100, 1, 100, '2015-01-05 11:33:28'),
(151, 43, 'Venue Rental', 112, 1, 112, '2015-01-05 11:33:28'),
(152, 43, 'Catering Bayout', 500, 1, 500, '2015-01-05 11:33:28'),
(153, 44, 'Additional Décor', 100, 1, 100, '2015-01-05 11:49:04'),
(154, 44, 'Additional Waiter', 120, 1, 120, '2015-01-05 11:49:04'),
(155, 44, 'Security Officer', 100, 1, 100, '2015-01-05 11:49:04'),
(156, 44, 'Venue Rental', 112, 1, 112, '2015-01-05 11:49:04'),
(157, 44, 'Catering Bayout', 500, 1, 500, '2015-01-05 11:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `fx_events`
--

CREATE TABLE IF NOT EXISTS `fx_events` (
`event_id` int(11) NOT NULL,
  `event_code` varchar(32) CHARACTER SET latin1 NOT NULL,
  `event_title` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'Project Title',
  `customer_name` varchar(100) NOT NULL,
  `client` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `due_date` time NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address` varchar(100) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `pax` varchar(50) NOT NULL,
  `event_status` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `service_type` text,
  `service_type_price` text,
  `venue_rental` varchar(100) NOT NULL,
  `catering_bayout` varchar(100) NOT NULL,
  `extras` varchar(100) NOT NULL,
  `state_tax` varchar(100) NOT NULL,
  `service_charge` varchar(100) NOT NULL,
  `security_deposit` varchar(100) NOT NULL,
  `grand_total` varchar(100) NOT NULL,
  `down_payment` varchar(100) NOT NULL,
  `total_balance` varchar(100) NOT NULL,
  `total_payment` varchar(100) NOT NULL,
  `progress` int(100) NOT NULL,
  `monthly_ins` varchar(100) NOT NULL,
  `no_of_ins` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_events`
--

INSERT INTO `fx_events` (`event_id`, `event_code`, `event_title`, `customer_name`, `client`, `start_date`, `due_date`, `date_created`, `address`, `telephone`, `email`, `start_time`, `end_time`, `pax`, `event_status`, `type`, `room_name`, `service_type`, `service_type_price`, `venue_rental`, `catering_bayout`, `extras`, `state_tax`, `service_charge`, `security_deposit`, `grand_total`, `down_payment`, `total_balance`, `total_payment`, `progress`, `monthly_ins`, `no_of_ins`) VALUES
(30, '', 'test Event', 'Arrik', '', '2015-01-05', '00:00:00', '2015-01-02 20:18:03', 'test', '0', 'test@gmail.com', '06:00:00', '06:00:00', '6', 'booked', 'Other', 'Red', 'Additional Décor,Additional Waiter,Security Officer', '100,200', '112', '0', '0', '0', '0', '600', 'NaN', '0', '0', '0', 0, '', 0),
(31, '', 'Anuall Party', 'Vicky', '', '2015-01-16', '00:00:00', '2015-01-02 20:22:58', '42808, Christy Street, Suite-216, Fremont', '5107441777', 'vicky@360itpro.com', '09:30:00', '11:00:00', '250', 'booked', 'Public', 'Green', 'Cake,DJ Services,Bartender', '45,50,55', '100', '20', '0', '0', '0', '20', '332.1', '20', '312.1', '0', 0, '2', 156),
(32, '', 'Conference Meeting ', 'Steven', '', '2015-01-30', '00:00:00', '2015-01-02 21:35:06', '21 Quinton Street, Warwick RI02888', '', 'steven.rossi@gmail.com', '11:00:00', '13:30:00', '25', 'booked', 'Confirmed', 'Blue', 'Wireless Mic/Speaker,Bartender,Security Officer', '55,25,100', '200', '100', '0', '0', '0', '100', '591.6', '100', '491.6', '0', 0, '5', 0),
(33, '', 'test Event', 'Arrik', '', '2015-01-09', '00:00:00', '2015-01-02 21:35:26', '401 Golden Shore Long Beach, CA 90802 United States', '1552479', 'studioowner@gmail.com', '06:00:00', '07:30:00', '6', 'booked', 'Other', 'Red', 'Cake,Additional Waiter', '60,120', '112', '100', '0', '0', '0', '400', '483.14000000000004', '200', '283.14000000000004', '0', 0, '50', 6),
(34, '', 'test Event', 'Arrik', '', '2015-01-09', '00:00:00', '2015-01-02 21:38:50', '401 Golden Shore Long Beach, CA 90802 United States', '1552479', 'studioowner@gmail.com', '06:00:00', '07:30:00', '6', 'booked', 'Other', 'Red', 'Cake,Additional Waiter', '60,120', '112', '100', '0', '0', '0', '400', '483.14000000000004', '200', '283.14000000000004', '0', 0, '50', 6),
(35, '', 'test Event', 'Arrik', '', '2015-01-09', '00:00:00', '2015-01-02 21:39:37', '401 Golden Shore Long Beach, CA 90802 United States', '1552479', 'studioowner@gmail.com', '06:00:00', '07:30:00', '6', 'booked', 'Other', 'Red', 'Cake,Additional Waiter', '60,120', '112', '100', '0', '0', '0', '400', '483.14000000000004', '200', '283.14000000000004', '0', 0, '50', 6),
(36, '', 'test Event', 'Arrik', '', '2015-01-09', '00:00:00', '2015-01-02 21:40:27', '401 Golden Shore Long Beach, CA 90802 United States', '1552479', 'studioowner@gmail.com', '06:00:00', '07:30:00', '6', 'booked', 'Other', 'Red', 'Cake,Additional Waiter', '60,120', '112', '100', '180', '0', '0', '400', '483.14000000000004', '200', '283.14000000000004', '0', 0, '50', 6),
(37, '', 'test Event', 'Arrik', '', '2015-01-06', '00:00:00', '2015-01-02 21:46:29', '401 Golden Shore Long Beach, CA 90802 United States', '1552479', 'test@gmail.com', '10:00:00', '11:00:00', '6', 'confirmed', 'Public', 'Red', 'Additional Décor,Security Officer', '100,100', '112', '0', '200', '25.74', '46.8', '500', '384.54', '100', '284.54', '0', 0, '50', 6),
(38, '', 'test1 Event', 'Arrik', '', '2015-01-05', '00:00:00', '2015-01-03 00:06:26', '6000 J Street Sacramento, CA 95819 United States', '1552479', 'test@gmail.com', '10:00:00', '12:00:00', '6', 'confirmed', 'Public', 'Red', 'Additional Décor,Security Officer', '100,100', '112', '0', '200', '25.74', '46.8', '500', '384.54', '50', '334.54', '0', 0, '20', 17),
(39, '', 'Birthday Party', 'Navi', '', '2015-01-05', '00:00:00', '2015-01-03 00:27:16', 'Fremont', '0', 'navi.sohal162@gmail.com', '06:00:00', '06:00:00', '50', 'booked', 'Public', 'Blue', 'Cake,Additional Décor,Wireless Mic/Speaker,Bartender,Security Officer', '60,100,100,25,55', '100', '0', '340', '36.3', '66', '600', '542.3', '0', '142.29999999999995', '0', 0, '40', 4),
(44, '', 'Birthday Party', 'Navi', '', '2015-01-09', '00:00:00', '2015-01-04 13:44:44', 'Fremont', '567567', 'navi.sohal162@gmail.com', '07:00:00', '06:00:00', '5', 'booked', 'Other', 'Red', 'Additional Décor,Additional Waiter', '100,120', '112', '600', '220', '76.89', '139.8', '500', '1148.69', '100', '1048.69', '0', 0, '100', 10),
(46, '', 'Birthday Party', 'Navi', '', '2015-01-09', '00:00:00', '2015-01-04 14:26:17', 'Fremont', '567567', 'navi.sohal162@gmail.com', '07:00:00', '06:00:00', '5', 'booked', 'Other', 'Red', 'Additional Décor,Additional Waiter', '100,120', '112', '600', '220', '76.89', '139.8', '500', '1148.69', '100', '1048.69', '0', 0, '100', 10),
(48, '', 'Birthday Party', 'Navi', '', '2015-01-09', '00:00:00', '2015-01-04 14:28:31', 'Fremont', '567567', 'navi.sohal162@gmail.com', '07:00:00', '06:00:00', '5', 'booked', 'Other', 'Red', 'Additional Décor,Additional Waiter', '100,120', '112', '600', '220', '76.89', '139.8', '500', '1148.69', '100', '1048.69', '0', 0, '100', 10),
(50, '', 'Birthday Party', 'Navi', '', '2015-01-24', '00:00:00', '2015-01-04 14:44:22', 'Fremont', '567567', 'navi.sohal162@gmail.com', '07:00:00', '06:00:00', '5', 'booked', 'Other', 'Red', 'Additional Décor,Additional Waiter', '100,120', '112', '600', '220', '76.89', '139.8', '500', '1148.69', '100', '1048.69', '0', 0, '100', 10),
(51, '', 'Birthday Party', 'Navi', '', '2015-01-24', '00:00:00', '2015-01-04 14:48:41', 'Fremont', '567567', 'navi.sohal162@gmail.com', '08:00:00', '10:00:00', '5', 'booked', 'Other', 'Red', 'Additional Décor,Additional Waiter', '100,120', '112', '600', '220', '76.89', '139.8', '500', '1148.69', '100', '1048.69', '0', 0, '100', 10),
(52, '', 'Birthday Party', 'Navi', '', '2015-01-24', '00:00:00', '2015-01-04 14:48:50', 'Fremont', '567567', 'navi.sohal162@gmail.com', '08:00:00', '11:00:00', '5', 'booked', 'Other', 'Red', 'Additional Décor,Additional Waiter', '100,120', '112', '600', '220', '76.89', '139.8', '500', '1148.69', '100', '1048.69', '0', 0, '100', 10),
(53, '', 'Birthday Party', 'Navi', '', '2015-01-24', '00:00:00', '2015-01-04 14:49:14', 'Fremont', '567567', 'navi.sohal162@gmail.com', '08:00:00', '11:30:00', '5', 'booked', 'Other', 'Red', 'Additional Décor,Additional Waiter', '100,120', '112', '600', '220', '76.89', '139.8', '500', '1148.69', '100', '1048.69', '0', 0, '100', 10),
(54, '', 'Birthday Party', 'Navi', '', '2015-01-24', '00:00:00', '2015-01-04 14:51:14', 'Fremont', '567567', 'navi.sohal162@gmail.com', '08:00:00', '12:00:00', '5', 'booked', 'Other', 'Red', 'Additional Décor,Additional Waiter', '100,120', '112', '600', '220', '76.89', '139.8', '500', '1148.69', '100', '1048.69', '0', 0, '100', 10),
(55, '', 'Birthday Party', 'Navi', '', '2015-01-24', '00:00:00', '2015-01-04 14:51:30', 'Fremont', '567567', 'navi.sohal162@gmail.com', '08:00:00', '13:00:00', '5', 'booked', 'Other', 'Red', 'Additional Décor,Additional Waiter', '100,120', '112', '600', '220', '76.89', '139.8', '500', '1148.69', '100', '1048.69', '0', 0, '100', 10),
(56, '', 'Birthday Party', 'Navi', '', '2015-01-05', '00:00:00', '2015-01-05 11:33:28', 'Fremont', '567567', 'navi.sohal162@gmail.com', '07:00:00', '08:00:00', '5', 'booked', 'Other', 'Red', 'Additional Décor,Additional Waiter,Security Officer', '100,120,100', '112', '500', '320', '76.89', '139.8', '600', '1148.69', '300', '848.69', '0', 0, '5', 170),
(57, '', 'Birthday Party', 'Navi', '', '2015-01-05', '00:00:00', '2015-01-05 11:49:04', 'Fremont', '567567', 'navi.sohal162@gmail.com', '08:00:00', '09:00:00', '5', 'booked', 'Other', 'Red', 'Additional Décor,Additional Waiter,Security Officer', '100,120,100', '112', '500', '320', '76.89', '139.8', '600', '1148.69', '300', '848.69', '0', 0, '5', 170);

-- --------------------------------------------------------

--
-- Table structure for table `fx_event_detail`
--

CREATE TABLE IF NOT EXISTS `fx_event_detail` (
`idevent` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `event` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fx_event_detail`
--

INSERT INTO `fx_event_detail` (`idevent`, `event_date`, `event_time`, `event`) VALUES
(1, '2013-05-28', '20:18:13', 'Japan Class'),
(2, '2013-05-28', '20:18:13', 'Japan Class 2'),
(3, '2014-11-20', '02:02:00', 'aaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `fx_event_orders`
--

CREATE TABLE IF NOT EXISTS `fx_event_orders` (
`event_order_id` int(11) NOT NULL,
  `issue_ref` int(11) NOT NULL,
  `event_order_status` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT 'orderplaced',
  `priority` varchar(100) CHARACTER SET latin1 NOT NULL,
  `reported_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_modified` varchar(64) CHARACTER SET latin1 NOT NULL,
  `order_required_by` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_event_orders`
--

INSERT INTO `fx_event_orders` (`event_order_id`, `issue_ref`, `event_order_status`, `priority`, `reported_on`, `last_modified`, `order_required_by`) VALUES
(9, 347528, 'order-received', 'Medium', '2014-12-19 16:06:53', '2014-12-23 11:22:39', '12-12-2015'),
(10, 329293, 'order-placed', 'Critical', '2014-12-23 10:51:34', '2014-12-23 11:21:34', '12-12-2015'),
(11, 264184, 'order-placed', 'Medium', '2014-12-23 10:52:16', '2014-12-23 11:22:16', '12-12-2015'),
(12, 147139, 'order-placed', 'Medium', '2014-12-23 10:52:57', '2015-01-01 18:22:30', '2015-01-03'),
(13, 681412, 'order-placed', 'High', '2015-01-01 08:29:01', '2015-01-01 18:12:55', '2015-01-01'),
(14, 597668, 'order-placed', 'Low', '2015-01-01 11:06:23', '2015-01-01 17:36:23', ''),
(15, 131148, 'order-placed', 'High', '2015-01-01 11:52:41', '2015-01-01 18:22:41', '2015-01-21'),
(16, 488598, 'order-placed', 'Low', '2015-01-02 18:35:11', '2015-01-03 00:05:11', 'Hasan'),
(17, 668623, 'order-placed', 'Low', '2015-01-20 00:05:20', '2015-01-20 05:35:20', '1/21/2015');

-- --------------------------------------------------------

--
-- Table structure for table `fx_event_order_comments`
--

CREATE TABLE IF NOT EXISTS `fx_event_order_comments` (
`c_id` int(11) NOT NULL,
  `event_order_id` int(11) NOT NULL,
  `comment_by` int(11) NOT NULL,
  `comment` text CHARACTER SET latin1 NOT NULL,
  `date_commented` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_event_order_comments`
--

INSERT INTO `fx_event_order_comments` (`c_id`, `event_order_id`, `comment_by`, `comment`, `date_commented`) VALUES
(2, 9, 1, 'vb n', '2014-12-23 16:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `fx_event_order_files`
--

CREATE TABLE IF NOT EXISTS `fx_event_order_files` (
`file_id` int(11) NOT NULL,
  `event_order` int(11) NOT NULL,
  `file_name` text CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_event_order_items`
--

CREATE TABLE IF NOT EXISTS `fx_event_order_items` (
`item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_desc` varchar(200) CHARACTER SET latin1 NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_saved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `priority` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_event_order_items`
--

INSERT INTO `fx_event_order_items` (`item_id`, `order_id`, `item_desc`, `quantity`, `date_saved`, `priority`) VALUES
(8, 3, 'qqq', 1, '2015-01-01 12:56:10', ''),
(9, 4, 'Cake', 1, '2015-01-01 13:20:23', ''),
(10, 4, 'DJ Services', 1, '2015-01-01 13:20:23', ''),
(11, 4, 'Additional Décor', 1, '2015-01-01 13:20:23', ''),
(12, 4, 'Wireless Mic/Speaker', 1, '2015-01-01 13:20:23', ''),
(13, 4, 'Additional Waiter', 1, '2015-01-01 13:20:23', ''),
(16, 10, 'ABC', 2, '2015-01-01 17:02:27', ''),
(17, 10, 'Test', 1, '2015-01-01 17:02:38', ''),
(18, 9, 'ff', 1, '2015-01-02 20:24:59', ''),
(19, 9, 'gfgf', 2, '2015-01-02 20:25:07', ''),
(20, 16, 'aasd', 1, '2015-01-03 00:05:25', ''),
(21, 17, 'coca cola', 2, '2015-01-20 00:05:56', '');

-- --------------------------------------------------------

--
-- Table structure for table `fx_event_room_setup`
--

CREATE TABLE IF NOT EXISTS `fx_event_room_setup` (
`t_id` int(11) NOT NULL,
  `room_setup_pid` int(100) NOT NULL,
  `cid` int(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pax` varchar(50) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_event_running_order`
--

CREATE TABLE IF NOT EXISTS `fx_event_running_order` (
`t_id` int(11) NOT NULL,
  `running_order_pid` int(100) NOT NULL,
  `cid` int(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pax` varchar(50) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_event_staff`
--

CREATE TABLE IF NOT EXISTS `fx_event_staff` (
`t_id` int(11) NOT NULL,
  `staff_pid` int(100) NOT NULL,
  `cid` int(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pax` varchar(50) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_event_staff`
--

INSERT INTO `fx_event_staff` (`t_id`, `staff_pid`, `cid`, `date_added`, `pax`, `notes`) VALUES
(1, 1, 2, '2014-12-04 00:26:36', '', '0'),
(2, 1, 2, '2014-12-04 01:04:25', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `fx_event_status`
--

CREATE TABLE IF NOT EXISTS `fx_event_status` (
`co_id` int(11) NOT NULL,
  `event_ref` int(32) NOT NULL,
  `show_in_cal` varchar(255) NOT NULL,
  `event_status` varchar(10) NOT NULL DEFAULT '-',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_event_status`
--

INSERT INTO `fx_event_status` (`co_id`, `event_ref`, `show_in_cal`, `event_status`, `date_added`) VALUES
(4, 1117569, 'no', 'pending', '2014-11-18 17:12:05'),
(7, 9136188, 'no', 'confirmed', '2014-11-18 22:38:45'),
(8, 6229716, 'no', 'booked', '2014-12-04 01:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `fx_files`
--

CREATE TABLE IF NOT EXISTS `fx_files` (
`file_id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `file_name` text CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_files`
--

INSERT INTO `fx_files` (`file_id`, `project`, `file_name`, `description`, `uploaded_by`, `date_posted`) VALUES
(20, 30, 'EVENT--01.jpg', 'Description', 1, '2015-01-02 20:19:33'),
(21, 30, 'EVENT--0.png', 'Description', 1, '2015-01-02 20:32:21'),
(22, 30, 'EVENT--0.png', 'Descriptionaaaa', 1, '2015-01-02 20:32:49'),
(23, 37, 'EVENT--0.png', 'Descriptiondsf', 1, '2015-01-02 23:20:12'),
(24, 31, 'EVENT--01.png', 'Description', 1, '2015-01-02 23:30:38');

-- --------------------------------------------------------

--
-- Table structure for table `fx_file_management`
--

CREATE TABLE IF NOT EXISTS `fx_file_management` (
`id` int(100) NOT NULL,
  `event_id` int(100) NOT NULL,
  `emp_cat` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fx_food`
--

CREATE TABLE IF NOT EXISTS `fx_food` (
`t_id` int(11) NOT NULL,
  `modify_pid` int(100) NOT NULL,
  `cid` int(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pax` varchar(50) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_food`
--

INSERT INTO `fx_food` (`t_id`, `modify_pid`, `cid`, `date_added`, `pax`, `notes`) VALUES
(1, 11, 2, '2014-11-16 05:38:35', '', ''),
(2, 1, 4, '2014-12-03 20:07:41', '4', '0'),
(3, 2, 4, '2014-12-03 20:09:04', '4', '0'),
(7, 0, 2, '2014-12-03 21:50:43', '4', '0'),
(8, 4, 2, '2014-12-03 21:52:07', '4', '0');

-- --------------------------------------------------------

--
-- Table structure for table `fx_full_slot`
--

CREATE TABLE IF NOT EXISTS `fx_full_slot` (
`id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fx_full_slot`
--

INSERT INTO `fx_full_slot` (`id`, `date`, `time`) VALUES
(1, '2015-04-03', '16:00:00'),
(2, '2015-04-03', '15:00:00'),
(3, '2015-04-07', '10:30:00'),
(4, '2015-04-07', '17:00:00'),
(5, '2015-04-07', '14:45:00'),
(6, '2015-04-07', '15:00:00'),
(7, '2015-04-11', '15:00:00'),
(8, '2015-04-11', '20:15:00'),
(9, '2015-04-07', '04:00:00'),
(10, '2015-04-07', '08:00:00'),
(11, '2015-04-07', '12:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `fx_invoices`
--

CREATE TABLE IF NOT EXISTS `fx_invoices` (
`inv_id` int(11) NOT NULL,
  `reference_no` varchar(32) CHARACTER SET latin1 NOT NULL,
  `event_id` varchar(64) CHARACTER SET latin1 NOT NULL,
  `due_date` varchar(40) CHARACTER SET latin1 NOT NULL,
  `notes` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'A finance charge of 1.5% will be made on unpaid balances after due day.Thank you for your business.',
  `allow_paypal` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'Yes',
  `tax` float NOT NULL DEFAULT '0',
  `recurring` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No',
  `r_freq` int(11) NOT NULL DEFAULT '31',
  `currency` varchar(32) CHARACTER SET latin1 NOT NULL DEFAULT 'USD',
  `status` enum('Unpaid','Paid') CHARACTER SET latin1 NOT NULL DEFAULT 'Unpaid',
  `archived` int(11) NOT NULL DEFAULT '0',
  `date_sent` varchar(64) CHARACTER SET latin1 NOT NULL,
  `inv_deleted` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No',
  `date_saved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `emailed` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No'
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_invoices`
--

INSERT INTO `fx_invoices` (`inv_id`, `reference_no`, `event_id`, `due_date`, `notes`, `allow_paypal`, `tax`, `recurring`, `r_freq`, `currency`, `status`, `archived`, `date_sent`, `inv_deleted`, `date_saved`, `emailed`) VALUES
(3, 'INV723396', '16', '0000-00-00', 'Thank you for your business. Please process this invoice within the due date.', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-01 12:48:02', 'No'),
(4, 'INV99595', '20', '02-01-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-01 13:20:23', 'No'),
(5, 'INV854991', '20', '01-01-2015', 'Thank you for your business. Please process this invoice within the due date.', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-01 16:59:41', 'No'),
(6, 'INV69475', '21', '03-01-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-02 18:37:38', 'No'),
(7, 'INV46486', '23', '03-01-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-02 18:46:08', 'No'),
(8, 'INV23224', '24', '03-01-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-02 18:49:07', 'No'),
(9, 'INV42642', '25', '03-01-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-02 18:53:03', 'No'),
(10, 'INV51891', '26', '03-01-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-02 18:55:59', 'No'),
(11, 'INV57531', '29', '03-01-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-02 19:45:31', 'No'),
(12, 'INV48264', '30', '05-01-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-02 20:18:03', 'No'),
(13, 'INV91612', '31', '16-01-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-02 20:22:58', 'No'),
(14, 'INV53941', '32', '30-01-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-02 21:35:06', 'No'),
(15, 'INV16618', '33', '09-01-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-02 21:35:26', 'No'),
(16, 'INV45465', '34', '09-01-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-02 21:38:50', 'No'),
(17, 'INV99249', '35', '09-01-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-02 21:39:37', 'No'),
(18, 'INV56527', '36', '09-01-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-02 21:40:27', 'No'),
(19, 'INV81566', '37', '06-01-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-02 21:46:29', 'No'),
(20, 'INV11355', '38', '05-01-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-03 00:06:26', 'No'),
(21, 'INV23164', '39', '05-01-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-03 00:27:17', 'No'),
(22, 'INV79911', '43', '9-1-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-04 13:43:45', 'No'),
(23, 'INV65618', '44', '9-1-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-04 13:44:44', 'No'),
(24, 'INV61179', '45', '9-1-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-04 14:23:42', 'No'),
(25, 'INV56251', '46', '9-1-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-04 14:26:17', 'No'),
(26, 'INV56399', '47', '9-1-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-04 14:28:18', 'No'),
(27, 'INV46455', '48', '9-1-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-04 14:28:31', 'No'),
(28, 'INV45797', '49', '9-1-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-04 14:40:41', 'No'),
(29, 'INV17173', '50', '24-01-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-04 14:44:22', 'No'),
(30, 'INV58178', '51', '24-01-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-04 14:48:42', 'No'),
(31, 'INV44422', '52', '24-01-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-04 14:48:50', 'No'),
(32, 'INV62244', '53', '24-01-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-04 14:49:14', 'No'),
(33, 'INV35917', '54', '24-01-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-04 14:51:14', 'No'),
(34, 'INV87291', '55', '24-01-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8.25, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-04 14:51:31', 'No'),
(35, 'INV52731', '56', '25-01-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8.25, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-04 15:12:02', 'No'),
(36, 'INV72112', '56', '05-01-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8.25, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-05 11:33:28', 'No'),
(37, 'INV71316', '57', '05-01-2015', 'Thank you for your business. Please process this invoice within the due date..', 'Yes', 8.25, 'No', 31, 'USD', 'Unpaid', 0, '', 'No', '2015-01-05 11:49:04', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `fx_ipn_log`
--

CREATE TABLE IF NOT EXISTS `fx_ipn_log` (
`id` int(11) NOT NULL,
  `listener_name` varchar(3) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Either IPN or API',
  `transaction_type` varchar(16) CHARACTER SET latin1 DEFAULT NULL COMMENT 'The type of call being made to the listener',
  `transaction_id` varchar(19) CHARACTER SET latin1 DEFAULT NULL COMMENT 'The unique transaction ID generated by PayPal',
  `status` varchar(16) CHARACTER SET latin1 DEFAULT NULL COMMENT 'The status of the call',
  `message` varchar(512) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Explanation of the call status',
  `ipn_data_hash` varchar(32) CHARACTER SET latin1 DEFAULT NULL COMMENT 'MD5 hash of the IPN post data',
  `detail` text CHARACTER SET latin1 COMMENT 'Detail text (potentially JSON) on this call',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_ipn_orders`
--

CREATE TABLE IF NOT EXISTS `fx_ipn_orders` (
`id` int(11) NOT NULL,
  `notify_version` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'IPN Version Number',
  `verify_sign` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Encrypted string used to verify the authenticityof the tansaction',
  `test_ipn` int(11) DEFAULT NULL,
  `protection_eligibility` varchar(24) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Which type of seller protection the buyer is protected by',
  `charset` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Character set used by PayPal',
  `btn_id` varchar(40) CHARACTER SET latin1 DEFAULT NULL COMMENT 'The PayPal buy button clicked',
  `address_city` varchar(40) CHARACTER SET latin1 DEFAULT NULL COMMENT 'City of customers address',
  `address_country` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Country of customers address',
  `address_country_code` varchar(2) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Two character ISO 3166 country code',
  `address_name` varchar(128) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Name used with address (included when customer provides a Gift address)',
  `address_state` varchar(40) CHARACTER SET latin1 DEFAULT NULL COMMENT 'State of customer address',
  `address_status` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'confirmed/unconfirmed',
  `address_street` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Customer''s street address',
  `address_zip` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Zip code of customer''s address',
  `first_name` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Customer''s first name',
  `last_name` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Customer''s last name',
  `payer_business_name` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Customer''s customer name, if customer represents a business',
  `payer_email` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Customer''s primary email address. Use this email to provide any credits',
  `payer_id` varchar(13) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Unique customer ID.',
  `payer_status` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'verified/unverified',
  `contact_phone` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Customer''s telephone number.',
  `residence_country` varchar(2) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Two-Character ISO 3166 country code',
  `business` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Email address or account ID of the payment recipient (that is, the merchant). Equivalent to the values of receiver_email (If payment is sent to primary account) and business set in the Website Payment HTML.',
  `receiver_email` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Primary email address of the payment recipient (that is, the merchant). If the payment is sent to a non-primary email address on your PayPal account, the receiver_email is still your primary email.',
  `receiver_id` varchar(13) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Unique account ID of the payment recipient (i.e., the merchant). This is the same as the recipients referral ID.',
  `custom` varchar(255) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Custom value as passed by you, the merchant. These are pass-through variables that are never presented to your customer.',
  `invoice` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Pass through variable you can use to identify your invoice number for this purchase. If omitted, no variable is passed back.',
  `memo` varchar(255) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Memo as entered by your customer in PayPal Website Payments note field.',
  `tax` decimal(10,2) DEFAULT NULL COMMENT 'Amount of tax charged on payment',
  `auth_id` varchar(19) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Authorization identification number',
  `auth_exp` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Authorization expiration date and time, in the following format: HH:MM:SS DD Mmm YY, YYYY PST',
  `auth_amount` int(11) DEFAULT NULL COMMENT 'Authorization amount',
  `auth_status` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Status of authorization',
  `num_cart_items` int(11) DEFAULT NULL COMMENT 'If this is a PayPal shopping cart transaction, number of items in the cart',
  `parent_txn_id` varchar(19) CHARACTER SET latin1 DEFAULT NULL COMMENT 'In the case of a refund, reversal, or cancelled reversal, this variable contains the txn_id of the original transaction, while txn_id contains a new ID for the new transaction.',
  `payment_date` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Time/date stamp generated by PayPal, in the following format: HH:MM:SS DD Mmm YY, YYYY PST',
  `payment_status` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Payment status of the payment',
  `payment_type` varchar(10) CHARACTER SET latin1 DEFAULT NULL COMMENT 'echeck/instant',
  `pending_reason` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'This variable is only set if payment_status=pending',
  `reason_code` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'This variable is only set if payment_status=reversed',
  `remaining_settle` int(11) DEFAULT NULL COMMENT 'Remaining amount that can be captured with Authorization and Capture',
  `shipping_method` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'The name of a shipping method from the shipping calculations section of the merchants account profile. The buyer selected the named shipping method for this transaction',
  `shipping` decimal(10,2) DEFAULT NULL COMMENT 'Shipping charges associated with this transaction. Format unsigned, no currency symbol, two decimal places',
  `transaction_entity` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Authorization and capture transaction entity',
  `txn_id` varchar(19) CHARACTER SET latin1 DEFAULT NULL COMMENT 'A unique transaction ID generated by PayPal',
  `txn_type` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'cart/express_checkout/send-money/virtual-terminal/web-accept',
  `exchange_rate` decimal(10,2) DEFAULT NULL COMMENT 'Exchange rate used if a currency conversion occured',
  `mc_currency` varchar(3) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Three character country code. For payment IPN notifications, this is the currency of the payment, for non-payment subscription IPN notifications, this is the currency of the subscription.',
  `mc_fee` decimal(10,2) DEFAULT NULL COMMENT 'Transaction fee associated with the payment, mc_gross minus mc_fee equals the amount deposited into the receiver_email account. Equivalent to payment_fee for USD payments. If this amount is negative, it signifies a refund or reversal, and either ofthose p',
  `mc_gross` decimal(10,2) DEFAULT NULL COMMENT 'Full amount of the customer''s payment',
  `mc_handling` decimal(10,2) DEFAULT NULL COMMENT 'Total handling charge associated with the transaction',
  `mc_shipping` decimal(10,2) DEFAULT NULL COMMENT 'Total shipping amount associated with the transaction',
  `payment_fee` decimal(10,2) DEFAULT NULL COMMENT 'USD transaction fee associated with the payment',
  `payment_gross` decimal(10,2) DEFAULT NULL COMMENT 'Full USD amount of the customers payment transaction, before payment_fee is subtracted',
  `settle_amount` decimal(10,2) DEFAULT NULL COMMENT 'Amount that is deposited into the account''s primary balance after a currency conversion',
  `settle_currency` varchar(3) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Currency of settle amount. Three digit currency code',
  `auction_buyer_id` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'The customer''s auction ID.',
  `auction_closing_date` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'The auction''s close date. In the format: HH:MM:SS DD Mmm YY, YYYY PSD',
  `auction_multi_item` int(11) DEFAULT NULL COMMENT 'The number of items purchased in multi-item auction payments',
  `for_auction` varchar(10) CHARACTER SET latin1 DEFAULT NULL COMMENT 'This is an auction payment - payments made using Pay for eBay Items or Smart Logos - as well as send money/money request payments with the type eBay items or Auction Goods(non-eBay)',
  `subscr_date` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Start date or cancellation date depending on whether txn_type is subcr_signup or subscr_cancel',
  `subscr_effective` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Date when a subscription modification becomes effective',
  `period1` varchar(10) CHARACTER SET latin1 DEFAULT NULL COMMENT '(Optional) Trial subscription interval in days, weeks, months, years (example a 4 day interval is 4 D',
  `period2` varchar(10) CHARACTER SET latin1 DEFAULT NULL COMMENT '(Optional) Trial period',
  `period3` varchar(10) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Regular subscription interval in days, weeks, months, years',
  `amount1` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for Trial period 1 for USD',
  `amount2` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for Trial period 2 for USD',
  `amount3` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for regular subscription  period 1 for USD',
  `mc_amount1` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for trial period 1 regardless of currency',
  `mc_amount2` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for trial period 2 regardless of currency',
  `mc_amount3` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for regular subscription period regardless of currency',
  `recurring` varchar(1) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Indicates whether rate recurs (1 is yes, blank is no)',
  `reattempt` varchar(1) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Indicates whether reattempts should occur on payment failure (1 is yes, blank is no)',
  `retry_at` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Date PayPal will retry a failed subscription payment',
  `recur_times` int(11) DEFAULT NULL COMMENT 'The number of payment installations that will occur at the regular rate',
  `username` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT '(Optional) Username generated by PayPal and given to subscriber to access the subscription',
  `password` varchar(24) CHARACTER SET latin1 DEFAULT NULL COMMENT '(Optional) Password generated by PayPal and given to subscriber to access the subscription (Encrypted)',
  `subscr_id` varchar(19) CHARACTER SET latin1 DEFAULT NULL COMMENT 'ID generated by PayPal for the subscriber',
  `case_id` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Case identification number',
  `case_type` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'complaint/chargeback',
  `case_creation_date` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Date/Time the case was registered',
  `order_status` enum('PAID','WAITING','REJECTED') CHARACTER SET latin1 DEFAULT NULL COMMENT 'Additional variable to make payment_status more actionable',
  `discount` decimal(10,2) DEFAULT NULL COMMENT 'Additional variable to record the discount made on the order',
  `shipping_discount` decimal(10,2) DEFAULT NULL COMMENT 'Record the discount made on the shipping',
  `ipn_track_id` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Internal tracking variable added in April 2011',
  `transaction_subject` varchar(255) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Describes the product for a button-based purchase',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_ipn_order_items`
--

CREATE TABLE IF NOT EXISTS `fx_ipn_order_items` (
`id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `item_name` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Item name as passed by you, the merchant. Or, if not passed by you, as entered by your customer. If this is a shopping cart transaction, Paypal will append the number of the item (e.g., item_name_1,item_name_2, and so forth).',
  `item_number` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Pass-through variable for you to track purchases. It will get passed back to you at the completion of the payment. If omitted, no variable will be passed back to you.',
  `quantity` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Quantity as entered by your customer or as passed by you, the merchant. If this is a shopping cart transaction, PayPal appends the number of the item (e.g., quantity1,quantity2).',
  `mc_gross` decimal(10,2) DEFAULT NULL COMMENT 'Full amount of the customer''s payment',
  `mc_handling` decimal(10,2) DEFAULT NULL COMMENT 'Total handling charge associated with the transaction',
  `mc_shipping` decimal(10,2) DEFAULT NULL COMMENT 'Total shipping amount associated with the transaction',
  `tax` decimal(10,2) DEFAULT NULL COMMENT 'Amount of tax charged on payment',
  `cost_per_item` decimal(10,2) DEFAULT NULL COMMENT 'Cost of an individual item',
  `option_name_1` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 1 name as requested by you',
  `option_selection_1` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 1 choice as entered by your customer',
  `option_name_2` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 2 name as requested by you',
  `option_selection_2` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 2 choice as entered by your customer',
  `option_name_3` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 3 name as requested by you',
  `option_selection_3` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 3 choice as entered by your customer',
  `option_name_4` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 4 name as requested by you',
  `option_selection_4` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 4 choice as entered by your customer',
  `option_name_5` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 5 name as requested by you',
  `option_selection_5` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 5 choice as entered by your customer',
  `option_name_6` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 6 name as requested by you',
  `option_selection_6` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 6 choice as entered by your customer',
  `option_name_7` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 7 name as requested by you',
  `option_selection_7` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 7 choice as entered by your customer',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fx_items`
--

CREATE TABLE IF NOT EXISTS `fx_items` (
`item_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `item_desc` varchar(200) CHARACTER SET latin1 NOT NULL,
  `unit_cost` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_cost` float NOT NULL,
  `date_saved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=177 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_items`
--

INSERT INTO `fx_items` (`item_id`, `invoice_id`, `item_desc`, `unit_cost`, `quantity`, `total_cost`, `date_saved`) VALUES
(8, 3, 'qqq', 70, 1, 70, '2015-01-01 12:56:10'),
(9, 4, 'Cake', 30, 1, 30, '2015-01-01 13:20:23'),
(10, 4, 'DJ Services', 30, 1, 30, '2015-01-01 13:20:23'),
(11, 4, 'Additional Décor', 30, 1, 30, '2015-01-01 13:20:23'),
(12, 4, 'Wireless Mic/Speaker', 30, 1, 30, '2015-01-01 13:20:23'),
(13, 4, 'Additional Waiter', 30, 1, 30, '2015-01-01 13:20:23'),
(14, 7, 'Additional Waiter', 120, 1, 120, '2015-01-02 18:46:08'),
(15, 8, 'Cake', 60, 1, 60, '2015-01-02 18:49:07'),
(16, 8, 'Cake', 120, 1, 120, '2015-01-02 18:49:07'),
(17, 8, 'Additional Waiter', 60, 1, 60, '2015-01-02 18:49:07'),
(18, 8, 'Additional Waiter', 120, 1, 120, '2015-01-02 18:49:07'),
(19, 9, 'Additional Décor', 100, 1, 100, '2015-01-02 18:53:03'),
(20, 9, 'Additional Décor', 120, 1, 120, '2015-01-02 18:53:03'),
(21, 9, 'Additional Waiter', 100, 1, 100, '2015-01-02 18:53:03'),
(22, 9, 'Additional Waiter', 120, 1, 120, '2015-01-02 18:53:03'),
(23, 10, 'Additional Décor', 120, 1, 120, '2015-01-02 18:55:59'),
(24, 10, 'Additional Waiter', 120, 1, 120, '2015-01-02 18:55:59'),
(25, 11, 'Additional Décor', 100, 1, 100, '2015-01-02 19:45:31'),
(26, 11, 'Additional Waiter', 120, 1, 120, '2015-01-02 19:45:31'),
(27, 12, 'Additional Décor', 100, 1, 100, '2015-01-02 20:18:03'),
(28, 12, 'Security Officer', 200, 1, 200, '2015-01-02 20:18:03'),
(29, 13, 'Cake', 45, 1, 45, '2015-01-02 20:22:58'),
(30, 13, 'DJ Services', 50, 1, 50, '2015-01-02 20:22:58'),
(31, 13, 'Bartender', 55, 1, 55, '2015-01-02 20:22:58'),
(32, 14, 'Wireless Mic/Speaker', 55, 1, 55, '2015-01-02 21:35:06'),
(33, 14, 'Bartender', 25, 1, 25, '2015-01-02 21:35:06'),
(34, 14, 'Security Officer', 100, 1, 100, '2015-01-02 21:35:06'),
(35, 15, 'Cake', 60, 1, 60, '2015-01-02 21:35:26'),
(36, 15, 'Additional Waiter', 120, 1, 120, '2015-01-02 21:35:26'),
(37, 14, 'desk', 200, 1, 200, '2015-01-02 21:38:39'),
(38, 16, 'Cake', 60, 1, 60, '2015-01-02 21:38:50'),
(39, 16, 'Additional Waiter', 120, 1, 120, '2015-01-02 21:38:50'),
(40, 17, 'Cake', 60, 1, 60, '2015-01-02 21:39:37'),
(41, 17, 'Additional Waiter', 120, 1, 120, '2015-01-02 21:39:37'),
(42, 18, 'Cake', 60, 1, 60, '2015-01-02 21:40:27'),
(43, 18, 'Additional Waiter', 120, 1, 120, '2015-01-02 21:40:27'),
(44, 19, 'Additional Décor', 100, 1, 100, '2015-01-02 21:46:29'),
(45, 19, 'Security Officer', 100, 1, 100, '2015-01-02 21:46:29'),
(46, 20, 'Additional Décor', 100, 1, 100, '2015-01-03 00:06:26'),
(47, 20, 'Security Officer', 100, 1, 100, '2015-01-03 00:06:26'),
(48, 21, 'Cake', 60, 1, 60, '2015-01-03 00:27:17'),
(49, 21, 'Additional Décor', 100, 1, 100, '2015-01-03 00:27:17'),
(50, 21, 'Wireless Mic/Speaker', 100, 1, 100, '2015-01-03 00:27:17'),
(51, 21, 'Bartender', 25, 1, 25, '2015-01-03 00:27:17'),
(52, 21, 'Security Officer', 55, 1, 55, '2015-01-03 00:27:17'),
(53, 21, 'Venue Rental', 100, 1, 100, '2015-01-03 00:27:17'),
(54, 21, 'Catering Bayout', 0, 1, 0, '2015-01-03 00:27:17'),
(55, 21, 'Extras', 340, 1, 340, '2015-01-03 00:27:17'),
(58, 21, 'Security Deposit', 500, 1, 500, '2015-01-03 00:27:17'),
(59, 22, 'Additional Décor', 100, 1, 100, '2015-01-04 13:43:45'),
(60, 22, 'Additional Waiter', 120, 1, 120, '2015-01-04 13:43:45'),
(61, 22, 'Venue Rental', 112, 1, 112, '2015-01-04 13:43:45'),
(62, 22, 'Catering Bayout', 600, 1, 600, '2015-01-04 13:43:45'),
(63, 22, 'Extras', 220, 1, 220, '2015-01-04 13:43:45'),
(64, 22, 'State Tax', 76.89, 1, 76.89, '2015-01-04 13:43:45'),
(65, 22, 'Service Charge', 139.8, 1, 139.8, '2015-01-04 13:43:45'),
(66, 22, 'Security Deposit', 500, 1, 500, '2015-01-04 13:43:45'),
(67, 23, 'Additional Décor', 100, 1, 100, '2015-01-04 13:44:44'),
(68, 23, 'Additional Waiter', 120, 1, 120, '2015-01-04 13:44:44'),
(69, 23, 'Venue Rental', 112, 1, 112, '2015-01-04 13:44:44'),
(70, 23, 'Catering Bayout', 600, 1, 600, '2015-01-04 13:44:44'),
(71, 23, 'Extras', 220, 1, 220, '2015-01-04 13:44:44'),
(72, 23, 'State Tax', 76.89, 1, 76.89, '2015-01-04 13:44:44'),
(73, 23, 'Service Charge', 139.8, 1, 139.8, '2015-01-04 13:44:44'),
(74, 23, 'Security Deposit', 500, 1, 500, '2015-01-04 13:44:44'),
(75, 24, 'Additional Décor', 100, 1, 100, '2015-01-04 14:23:42'),
(76, 24, 'Additional Waiter', 120, 1, 120, '2015-01-04 14:23:42'),
(77, 24, 'Venue Rental', 112, 1, 112, '2015-01-04 14:23:42'),
(78, 24, 'Catering Bayout', 600, 1, 600, '2015-01-04 14:23:42'),
(79, 24, 'Extras', 220, 1, 220, '2015-01-04 14:23:42'),
(80, 24, 'State Tax', 76.89, 1, 76.89, '2015-01-04 14:23:42'),
(81, 24, 'Service Charge', 139.8, 1, 139.8, '2015-01-04 14:23:42'),
(82, 24, 'Security Deposit', 500, 1, 500, '2015-01-04 14:23:42'),
(83, 25, 'Additional Décor', 100, 1, 100, '2015-01-04 14:26:17'),
(84, 25, 'Additional Waiter', 120, 1, 120, '2015-01-04 14:26:17'),
(85, 25, 'Venue Rental', 112, 1, 112, '2015-01-04 14:26:17'),
(86, 25, 'Catering Bayout', 600, 1, 600, '2015-01-04 14:26:17'),
(87, 25, 'Extras', 220, 1, 220, '2015-01-04 14:26:17'),
(88, 25, 'State Tax', 76.89, 1, 76.89, '2015-01-04 14:26:17'),
(89, 25, 'Service Charge', 139.8, 1, 139.8, '2015-01-04 14:26:17'),
(90, 25, 'Security Deposit', 500, 1, 500, '2015-01-04 14:26:17'),
(91, 26, 'Additional Décor', 100, 1, 100, '2015-01-04 14:28:18'),
(92, 26, 'Additional Waiter', 120, 1, 120, '2015-01-04 14:28:18'),
(93, 26, 'Venue Rental', 112, 1, 112, '2015-01-04 14:28:18'),
(94, 26, 'Catering Bayout', 600, 1, 600, '2015-01-04 14:28:18'),
(95, 26, 'Extras', 220, 1, 220, '2015-01-04 14:28:18'),
(96, 26, 'State Tax', 76.89, 1, 76.89, '2015-01-04 14:28:18'),
(97, 26, 'Service Charge', 139.8, 1, 139.8, '2015-01-04 14:28:18'),
(98, 26, 'Security Deposit', 500, 1, 500, '2015-01-04 14:28:18'),
(99, 27, 'Additional Décor', 100, 1, 100, '2015-01-04 14:28:32'),
(100, 27, 'Additional Waiter', 120, 1, 120, '2015-01-04 14:28:32'),
(101, 27, 'Venue Rental', 112, 1, 112, '2015-01-04 14:28:32'),
(102, 27, 'Catering Bayout', 600, 1, 600, '2015-01-04 14:28:32'),
(103, 27, 'Extras', 220, 1, 220, '2015-01-04 14:28:32'),
(104, 27, 'State Tax', 76.89, 1, 76.89, '2015-01-04 14:28:32'),
(105, 27, 'Service Charge', 139.8, 1, 139.8, '2015-01-04 14:28:32'),
(106, 27, 'Security Deposit', 500, 1, 500, '2015-01-04 14:28:32'),
(107, 28, 'Additional Décor', 100, 1, 100, '2015-01-04 14:40:41'),
(108, 28, 'Additional Waiter', 120, 1, 120, '2015-01-04 14:40:41'),
(109, 28, 'Venue Rental', 112, 1, 112, '2015-01-04 14:40:41'),
(110, 28, 'Catering Bayout', 600, 1, 600, '2015-01-04 14:40:41'),
(111, 28, 'Extras', 220, 1, 220, '2015-01-04 14:40:41'),
(112, 28, 'State Tax', 76.89, 1, 76.89, '2015-01-04 14:40:41'),
(113, 28, 'Service Charge', 139.8, 1, 139.8, '2015-01-04 14:40:41'),
(114, 28, 'Security Deposit', 500, 1, 500, '2015-01-04 14:40:41'),
(115, 29, 'Additional Décor', 100, 1, 100, '2015-01-04 14:44:22'),
(116, 29, 'Additional Waiter', 120, 1, 120, '2015-01-04 14:44:22'),
(117, 29, 'Venue Rental', 112, 1, 112, '2015-01-04 14:44:22'),
(118, 29, 'Catering Bayout', 600, 1, 600, '2015-01-04 14:44:22'),
(119, 29, 'Extras', 220, 1, 220, '2015-01-04 14:44:22'),
(120, 29, 'State Tax', 76.89, 1, 76.89, '2015-01-04 14:44:22'),
(121, 29, 'Service Charge', 139.8, 1, 139.8, '2015-01-04 14:44:22'),
(122, 29, 'Security Deposit', 500, 1, 500, '2015-01-04 14:44:22'),
(123, 30, 'Additional Décor', 100, 1, 100, '2015-01-04 14:48:42'),
(124, 30, 'Additional Waiter', 120, 1, 120, '2015-01-04 14:48:42'),
(125, 30, 'Venue Rental', 112, 1, 112, '2015-01-04 14:48:42'),
(126, 30, 'Catering Bayout', 600, 1, 600, '2015-01-04 14:48:42'),
(127, 30, 'Extras', 220, 1, 220, '2015-01-04 14:48:42'),
(128, 30, 'State Tax', 76.89, 1, 76.89, '2015-01-04 14:48:42'),
(129, 30, 'Service Charge', 139.8, 1, 139.8, '2015-01-04 14:48:42'),
(130, 30, 'Security Deposit', 500, 1, 500, '2015-01-04 14:48:42'),
(131, 31, 'Additional Décor', 100, 1, 100, '2015-01-04 14:48:50'),
(132, 31, 'Additional Waiter', 120, 1, 120, '2015-01-04 14:48:50'),
(133, 31, 'Venue Rental', 112, 1, 112, '2015-01-04 14:48:50'),
(134, 31, 'Catering Bayout', 600, 1, 600, '2015-01-04 14:48:50'),
(135, 31, 'Extras', 220, 1, 220, '2015-01-04 14:48:50'),
(136, 31, 'State Tax', 76.89, 1, 76.89, '2015-01-04 14:48:50'),
(137, 31, 'Service Charge', 139.8, 1, 139.8, '2015-01-04 14:48:50'),
(138, 31, 'Security Deposit', 500, 1, 500, '2015-01-04 14:48:50'),
(139, 32, 'Additional Décor', 100, 1, 100, '2015-01-04 14:49:14'),
(140, 32, 'Additional Waiter', 120, 1, 120, '2015-01-04 14:49:14'),
(141, 32, 'Venue Rental', 112, 1, 112, '2015-01-04 14:49:14'),
(142, 32, 'Catering Bayout', 600, 1, 600, '2015-01-04 14:49:14'),
(143, 32, 'Extras', 220, 1, 220, '2015-01-04 14:49:14'),
(144, 32, 'State Tax', 76.89, 1, 76.89, '2015-01-04 14:49:14'),
(145, 32, 'Service Charge', 139.8, 1, 139.8, '2015-01-04 14:49:14'),
(146, 32, 'Security Deposit', 500, 1, 500, '2015-01-04 14:49:14'),
(147, 33, 'Additional Décor', 100, 1, 100, '2015-01-04 14:51:14'),
(148, 33, 'Additional Waiter', 120, 1, 120, '2015-01-04 14:51:14'),
(149, 33, 'Venue Rental', 112, 1, 112, '2015-01-04 14:51:14'),
(150, 33, 'Catering Bayout', 600, 1, 600, '2015-01-04 14:51:14'),
(151, 33, 'Extras', 220, 1, 220, '2015-01-04 14:51:14'),
(152, 33, 'State Tax', 76.89, 1, 76.89, '2015-01-04 14:51:14'),
(153, 33, 'Service Charge', 139.8, 1, 139.8, '2015-01-04 14:51:14'),
(154, 33, 'Security Deposit', 500, 1, 500, '2015-01-04 14:51:14'),
(155, 34, 'Additional Décor', 100, 1, 100, '2015-01-04 14:51:31'),
(156, 34, 'Additional Waiter', 120, 1, 120, '2015-01-04 14:51:31'),
(157, 34, 'Venue Rental', 112, 1, 112, '2015-01-04 14:51:31'),
(158, 34, 'Catering Bayout', 600, 1, 600, '2015-01-04 14:51:31'),
(159, 34, 'Extras', 220, 1, 220, '2015-01-04 14:51:31'),
(163, 35, 'Additional Décor', 100, 1, 100, '2015-01-04 15:12:02'),
(164, 35, 'Additional Waiter', 120, 1, 120, '2015-01-04 15:12:02'),
(165, 35, 'Venue Rental', 112, 1, 112, '2015-01-04 15:12:02'),
(166, 35, 'Catering Bayout', 600, 1, 600, '2015-01-04 15:12:02'),
(167, 36, 'Additional Décor', 100, 1, 100, '2015-01-05 11:33:28'),
(168, 36, 'Additional Waiter', 120, 1, 120, '2015-01-05 11:33:28'),
(169, 36, 'Security Officer', 100, 1, 100, '2015-01-05 11:33:28'),
(170, 36, 'Venue Rental', 112, 1, 112, '2015-01-05 11:33:28'),
(171, 36, 'Catering Bayout', 500, 1, 500, '2015-01-05 11:33:28'),
(172, 37, 'Additional Décor', 100, 1, 100, '2015-01-05 11:49:04'),
(173, 37, 'Additional Waiter', 120, 1, 120, '2015-01-05 11:49:05'),
(174, 37, 'Security Officer', 100, 1, 100, '2015-01-05 11:49:05'),
(175, 37, 'Venue Rental', 112, 1, 112, '2015-01-05 11:49:05'),
(176, 37, 'Catering Bayout', 500, 1, 500, '2015-01-05 11:49:05');

-- --------------------------------------------------------

--
-- Table structure for table `fx_items_saved`
--

CREATE TABLE IF NOT EXISTS `fx_items_saved` (
`item_id` int(11) NOT NULL,
  `item_desc` varchar(200) CHARACTER SET latin1 NOT NULL,
  `unit_cost` int(11) NOT NULL,
  `deleted` enum('Yes','No') CHARACTER SET latin1 DEFAULT 'No'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_items_saved`
--

INSERT INTO `fx_items_saved` (`item_id`, `item_desc`, `unit_cost`, `deleted`) VALUES
(1, 'aa', 122, 'No'),
(2, '65ty', 55, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `fx_locations`
--

CREATE TABLE IF NOT EXISTS `fx_locations` (
  `locations` varchar(50) NOT NULL,
`id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `room_ref` int(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fx_locations`
--

INSERT INTO `fx_locations` (`locations`, `id`, `date_added`, `room_ref`) VALUES
('New York', 1, '2014-11-24 23:36:20', 4665897),
('Fremont', 2, '2014-11-24 23:36:32', 2364361);

-- --------------------------------------------------------

--
-- Table structure for table `fx_login_attempts`
--

CREATE TABLE IF NOT EXISTS `fx_login_attempts` (
`id` int(11) NOT NULL,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `fx_logistics`
--

CREATE TABLE IF NOT EXISTS `fx_logistics` (
  `item` varchar(50) NOT NULL,
  `cost_price` int(100) NOT NULL,
  `customer_price` int(100) NOT NULL,
`id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `menus_ref` int(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fx_logistics`
--

INSERT INTO `fx_logistics` (`item`, `cost_price`, `customer_price`, `id`, `date_added`, `menus_ref`) VALUES
('P2', 99, 120, 5, '2014-11-26 15:43:35', 8252214);

-- --------------------------------------------------------

--
-- Table structure for table `fx_mains`
--

CREATE TABLE IF NOT EXISTS `fx_mains` (
  `item` varchar(50) NOT NULL,
  `cost_price` int(100) NOT NULL,
  `customer_price` int(100) NOT NULL,
`id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `menus_ref` int(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fx_mains`
--

INSERT INTO `fx_mains` (`item`, `cost_price`, `customer_price`, `id`, `date_added`, `menus_ref`) VALUES
('p1', 99, 110, 4, '2014-11-26 15:42:42', 3161263),
('P2', 99, 120, 5, '2014-11-26 15:43:35', 8252214);

-- --------------------------------------------------------

--
-- Table structure for table `fx_menu_settings`
--

CREATE TABLE IF NOT EXISTS `fx_menu_settings` (
`id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `menus_ref` int(60) NOT NULL,
  `ms1` varchar(10) NOT NULL,
  `ms2` varchar(10) NOT NULL,
  `ms3` varchar(10) NOT NULL,
  `ms4` varchar(10) NOT NULL,
  `ms5` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fx_menu_settings`
--

INSERT INTO `fx_menu_settings` (`id`, `date_added`, `menus_ref`, `ms1`, `ms2`, `ms3`, `ms4`, `ms5`) VALUES
(1, '2014-11-24 20:44:49', 3161263, 'yes', 'yes', 'no', 'no', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `fx_modify_packages`
--

CREATE TABLE IF NOT EXISTS `fx_modify_packages` (
  `title` varchar(50) NOT NULL,
  `cost_price` int(100) NOT NULL,
  `customer_price` int(100) NOT NULL,
  `inclusions` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `individual_menus` text NOT NULL,
`id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `menus_ref` int(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fx_modify_packages`
--

INSERT INTO `fx_modify_packages` (`title`, `cost_price`, `customer_price`, `inclusions`, `type`, `individual_menus`, `id`, `date_added`, `menus_ref`) VALUES
('zz', 12, 12, 'Classic baby potato salad with shallot, celery, egg, parsley and Dijon mayonnaise Mixed cress salad with crisp apple, walnuts and blue cheese Italian salad of tomato, capsicum, crisp croutons, cucumber, red onion, parsley and olives Bbq Beef and herb sausages Bbq Italian pork sausages Bbq eggplant, zucchini ,capsicum, mushroom and cherry tomato skewers Oregano, lemon and smoked paprika marinated chicken skewers Bbq sautéed onions Sauces, fresh rolls and salted butter Seasonal sliced fresh fruit Assorted mini magnums', 'Cocktail', 'CCCC,GREENMM', 4, '2014-12-03 21:31:35', 4637791),
('qqqqqqqqq', 99, 55, 'Classic baby potato salad with shallot, celery, egg, parsley and Dijon mayonnaise Mixed cress salad with crisp apple, walnuts and blue cheese Italian salad of tomato, capsicum, crisp croutons, cucumber, red onion, parsley and olives Bbq Beef and herb sausages Bbq Italian pork sausages Bbq eggplant, zucchini ,capsicum, mushroom and cherry tomato skewers Oregano, lemon and smoked paprika marinated chicken skewers Bbq sautéed onions Sauces, fresh rolls and salted butter Seasonal sliced fresh fruit Assorted mini magnums', 'Cocktail', 'CCCC', 11, '2014-12-24 01:16:57', 8944742);

-- --------------------------------------------------------

--
-- Table structure for table `fx_notes`
--

CREATE TABLE IF NOT EXISTS `fx_notes` (
  `date` date NOT NULL,
  `notes` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fx_notes`
--

INSERT INTO `fx_notes` (`date`, `notes`) VALUES
('2014-12-04', 'sada');

-- --------------------------------------------------------

--
-- Table structure for table `fx_order_items`
--

CREATE TABLE IF NOT EXISTS `fx_order_items` (
`co_id` int(11) NOT NULL,
  `event_ref` int(32) NOT NULL,
  `order_items` varchar(10) NOT NULL DEFAULT '-',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_order_items`
--

INSERT INTO `fx_order_items` (`co_id`, `event_ref`, `order_items`, `date_added`) VALUES
(1, 5427674, 'aafff', '2014-11-26 22:48:43');

-- --------------------------------------------------------

--
-- Table structure for table `fx_payments`
--

CREATE TABLE IF NOT EXISTS `fx_payments` (
`p_id` int(11) NOT NULL,
  `invoice` int(11) NOT NULL,
  `paid_by` int(11) NOT NULL,
  `payer_email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `payment_method` varchar(64) CHARACTER SET latin1 NOT NULL,
  `amount` float NOT NULL,
  `trans_id` varchar(64) CHARACTER SET latin1 NOT NULL,
  `notes` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `month_paid` varchar(32) CHARACTER SET latin1 NOT NULL,
  `year_paid` varchar(32) CHARACTER SET latin1 NOT NULL,
  `inv_deleted` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_payments`
--

INSERT INTO `fx_payments` (`p_id`, `invoice`, `paid_by`, `payer_email`, `payment_method`, `amount`, `trans_id`, `notes`, `created_date`, `month_paid`, `year_paid`, `inv_deleted`) VALUES
(8, 13, 31, '', '2', 162, '751624', '', '2015-01-02 20:23:54', '01', '2015', 'No'),
(9, 19, 37, '', '2', 150, '176934', '', '2015-01-03 00:04:10', '01', '2015', 'No'),
(10, 36, 56, '', '1', 300, '147993', '', '2015-01-05 11:36:48', '01', '2015', 'No'),
(11, 37, 57, '', '1', 300, '439836', '', '2015-01-05 11:49:04', '01', '2015', 'No'),
(12, 37, 57, '', '2', 200, '246261', 'recieves by saif', '2015-01-19 23:53:07', '01', '2015', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `fx_payment_methods`
--

CREATE TABLE IF NOT EXISTS `fx_payment_methods` (
`method_id` int(11) NOT NULL,
  `method_name` varchar(64) CHARACTER SET latin1 NOT NULL DEFAULT 'Paypal'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_payment_methods`
--

INSERT INTO `fx_payment_methods` (`method_id`, `method_name`) VALUES
(1, 'Paypal'),
(2, 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `fx_refreshments`
--

CREATE TABLE IF NOT EXISTS `fx_refreshments` (
  `item` varchar(50) NOT NULL,
  `cost_price` int(100) NOT NULL,
  `customer_price` int(100) NOT NULL,
`id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `menus_ref` int(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fx_refreshments`
--

INSERT INTO `fx_refreshments` (`item`, `cost_price`, `customer_price`, `id`, `date_added`, `menus_ref`) VALUES
('p1', 99, 110, 4, '2014-11-26 15:42:42', 3161263),
('P2', 99, 120, 5, '2014-11-26 15:43:35', 8252214);

-- --------------------------------------------------------

--
-- Table structure for table `fx_reservation`
--

CREATE TABLE IF NOT EXISTS `fx_reservation` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `flight_number` varchar(50) DEFAULT NULL,
  `arrival_time` time DEFAULT NULL,
  `pickup_address` varchar(100) NOT NULL,
  `pickup_city` varchar(50) NOT NULL,
  `pickup_state` varchar(20) NOT NULL,
  `pickup_zip` int(11) NOT NULL,
  `dropoff_address` varchar(100) NOT NULL,
  `dropoff_city` varchar(50) NOT NULL,
  `dropoff_state` varchar(20) NOT NULL,
  `dropoff_zip` int(11) NOT NULL,
  `number_of_passengers` int(11) NOT NULL,
  `status` enum('new','accepted','rejected') NOT NULL DEFAULT 'new',
  `booking_time` datetime NOT NULL ,
  `vehicle_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fx_reservation`
--

INSERT INTO `fx_reservation` (`id`, `name`, `phone`, `email`, `date`, `flight_number`, `arrival_time`, `pickup_address`, `pickup_city`, `pickup_state`, `pickup_zip`, `dropoff_address`, `dropoff_city`, `dropoff_state`, `dropoff_zip`, `number_of_passengers`, `status`, `booking_time`, `vehicle_id`, `driver_id`) VALUES
(1, 'avinash', 1234567890, 'avithakur@gmail.com', '0000-00-00 00:00:00', 'abc47', '16:00:00', 'This is address line 1', '', '', 0, 'This is address line 2 ', '', '', 0, 2, 'accepted', '2015-04-01 20:48:41', NULL, NULL),
(39, '87687687', 1234566780, 'avinash.thakur@360itpro.com', '2015-04-07 15:15:00', 'abc47', '15:30:00', 'ghjhgjh', 'gjhgjh', '3', 32423, 'gjhgjhg', 'jhgjhg', '2', 76876, 2, 'accepted', '2015-04-04 01:57:49', NULL, NULL),
(40, 'avinash thakur', 1234566780, 'avinash.thakur@360itpro.com', '2015-04-08 15:45:00', 'abc47', '15:30:00', 'kjhkjh', 'kjhkjhkj', '1', 87687, 'kjhkjh', 'kjhkjh', '2', 76876, 2, 'rejected', '2015-04-04 02:01:28', NULL, NULL),
(41, '87687687', 1234566780, 'avinash.thakur@360itpro.com', '2015-04-09 15:45:00', 'abc47', '15:30:00', 'jkhkj', 'kjhkjhkjh', '1', 87687, 'kjhkjhkj', 'khjhkj', '1', 67890, 2, 'rejected', '2015-04-04 02:02:29', NULL, NULL),
(42, '876789', 1234566780, 'avinash.thakur@360itpro.com', '2015-04-07 04:00:00', 'abc47', '15:30:00', 'jhkjh', 'kjhkjhkjh', '1', 87687, 'jkhkjhkj', 'jhgjhg', '2', 76876, 1, 'accepted', '2015-04-04 02:04:56', NULL, NULL),
(43, '87687687', 1234566780, 'avinash.thakur@360itpro.com', '2015-04-09 15:45:00', 'abc47', '15:30:00', 'jkhkjh', 'kjhkjh', '3', 68766, 'jhkhkjh', 'jhgjhg', '2', 76876, 1, 'rejected', '2015-04-04 02:06:46', NULL, NULL),
(44, '87687687', 1234566780, 'avinash.thakur@360itpro.com', '2015-04-09 15:45:00', 'abc47', '15:30:00', 'jlhjkl', 'hkjhkj', '1', 87687, 'hkjlhkj', 'jlhkjh', '4', 68768, 2, 'new', '2015-04-04 02:08:53', NULL, NULL),
(45, '87687687', 1234566780, 'avinash.thakur@360itpro.com', '2015-04-07 12:00:00', 'abc47', '15:30:00', 'gh', 'kjhkjhkjh', '1', 87687, 'ghfhgfhg', 'hkjhkjh', '4', 78901, 2, 'accepted', '2015-04-04 02:10:23', NULL, NULL),
(46, 'avinash thakur', 1234566780, 'avinash.thakur@360itpro.com', '2015-04-09 04:00:00', 'abc47', '15:30:00', 'kjhghgkjh', 'kjhkjhkjh', '1', 87687, 'kjhkjhkj', 'jhgjhg', '2', 76876, 2, 'accepted', '2015-04-04 02:18:20', NULL, NULL),
(47, 'avinash thakur', 1234566780, 'avinash.thakur@360itpro.com', '2015-04-03 16:30:00', 'abc47', '15:30:00', 'address line 1', 'city1', 'state1', 12345, 'address line 2', 'city2', 'state2', 12312, 2, 'accepted', '2015-04-04 03:01:38', NULL, NULL),
(48, 'avinash thakur', 1234566780, 'avinash.thakur@360itpro.com', '2015-04-03 17:00:00', 'abc47', '15:30:00', 'vbcbvc', 'kjhkjhkjh', 'state1', 87687, 'khgjh', 'jhgjhg', 'state2', 76876, 1, 'accepted', '2015-04-04 03:03:35', NULL, NULL),
(49, 'avinash', 1234566780, 'avinash.thakur@360itpro.com', '2015-04-07 12:00:00', 'asdasd', '15:30:00', 'address1', 'city', 'state1', 12345, 'address2', 'city', 'state2', 23456, 2, 'rejected', '2015-04-06 19:14:50', NULL, NULL),
(50, 'avinash', 1234566780, 'avinash.thakur@360itpro.com', '2015-04-06 18:15:00', 'abc47', '15:30:00', 'address1', 'city1', 'state1', 87687, 'address2', 'city2', 'state2', 76876, 2, 'new', '2015-04-06 22:18:22', NULL, NULL),
(51, 'rahul', 2147483647, 'rahulg@360itpro.com', '2015-04-06 17:45:00', '123456', '15:30:00', '352215fdsfhkusdf', 'fremont', 'state1', 61546, '5464654165', 'fytfjhg', 'state4', 65454, 2, 'new', '2015-04-06 23:00:32', NULL, NULL),
(52, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:32', NULL, NULL),
(53, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:32', NULL, NULL),
(54, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:32', NULL, NULL),
(55, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:32', NULL, NULL),
(56, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:32', NULL, NULL),
(57, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:32', NULL, NULL),
(58, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:32', NULL, NULL),
(59, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:32', NULL, NULL),
(60, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:32', NULL, NULL),
(61, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:32', NULL, NULL),
(62, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:32', NULL, NULL),
(63, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:32', NULL, NULL),
(64, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:32', NULL, NULL),
(65, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:32', NULL, NULL),
(66, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:32', NULL, NULL),
(67, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:32', NULL, NULL),
(68, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(69, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(70, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(71, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(72, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(73, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(74, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(75, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(76, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(77, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(78, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(79, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(80, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(81, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(82, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(83, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(84, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(85, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(86, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(87, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(88, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(89, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(90, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(91, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(92, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(93, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(94, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(95, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(96, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(97, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(98, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:33', NULL, NULL),
(99, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:34', NULL, NULL),
(100, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:34', NULL, NULL),
(101, 'test', 1234567890, 'test@gmail.com', '2015-04-07 15:00:00', 'test147', '15:30:00', 'test address 1', 'test city 1', 'state1', 12345, 'test address 2', 'test city 2', 'state2', 67890, 2, 'new', '2015-04-07 09:27:34', NULL, NULL),
(102, 'aZ', 1234566780, 'avi@sadfds.com', '2015-04-08 08:00:00', '12', '15:30:00', 'HGFHGFHG', 'kjhkjhkjh', 'state1', 87687, 'hkjhkjh', 'jhgjhg', 'state1', 76876, 1, 'new', '2015-04-07 11:55:37', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fx_rides`
--

CREATE TABLE IF NOT EXISTS `fx_rides` (
`id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `begin` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fx_roles`
--

CREATE TABLE IF NOT EXISTS `fx_roles` (
`r_id` int(11) NOT NULL,
  `role` varchar(64) CHARACTER SET latin1 NOT NULL,
  `default` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_roles`
--

INSERT INTO `fx_roles` (`r_id`, `role`, `default`) VALUES
(1, 'admin', 1),
(2, 'client', 2),
(3, 'collaborator', 3);

-- --------------------------------------------------------

--
-- Table structure for table `fx_rooms`
--

CREATE TABLE IF NOT EXISTS `fx_rooms` (
  `room_name` varchar(50) NOT NULL,
  `min_pax` int(32) NOT NULL,
  `max_pax` int(10) NOT NULL,
  `available_for_public` varchar(10) NOT NULL,
  `multiple_book` varchar(10) NOT NULL,
  `color` varchar(10) NOT NULL,
  `location` varchar(50) NOT NULL,
`id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `room_ref` int(60) NOT NULL,
  `venue_rental` varchar(50) NOT NULL,
  `catering_bayout` varchar(50) NOT NULL,
  `extras` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fx_rooms`
--

INSERT INTO `fx_rooms` (`room_name`, `min_pax`, `max_pax`, `available_for_public`, `multiple_book`, `color`, `location`, `id`, `date_added`, `room_ref`, `venue_rental`, `catering_bayout`, `extras`) VALUES
('Green', 2, 50, 'yes', 'yes', '369E7F', 'test', 4, '2014-12-18 16:59:51', 3161263, '100', '55', '88'),
('Blue', 2, 5, 'yes', 'no', '457DFF', 'test', 5, '2014-12-18 16:38:35', 7954848, '100', '75', '80'),
('Red', 3, 5, 'yes', 'no', 'D12C42', 'test', 6, '2014-12-18 17:00:10', 2543727, '112', '34', '90');

-- --------------------------------------------------------

--
-- Table structure for table `fx_scheduling`
--

CREATE TABLE IF NOT EXISTS `fx_scheduling` (
`id` int(100) NOT NULL,
  `event_id` int(100) NOT NULL,
  `emp_cat` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fx_scheduling`
--

INSERT INTO `fx_scheduling` (`id`, `event_id`, `emp_cat`, `quantity`, `name`, `date_added`) VALUES
(5, 32, 'Waiter', 3, 'john ', '2015-01-02 21:37:10'),
(6, 37, 'Waiter', 1, 'qqq', '2015-01-02 22:02:16'),
(7, 37, 'Waiter', 1, 'qqq', '2015-01-02 22:03:59'),
(8, 57, 'Waiter', 0, 'W1', '2015-01-06 18:10:12'),
(9, 57, 'Bartendar', 0, 'B1', '2015-01-06 18:10:23'),
(10, 57, 'Waiter', 0, '', '2015-01-07 20:26:49'),
(11, 57, 'Waiter', 0, 'sam - asif', '2015-01-19 23:55:21');

-- --------------------------------------------------------

--
-- Table structure for table `fx_scheduling_cat`
--

CREATE TABLE IF NOT EXISTS `fx_scheduling_cat` (
`id` int(100) NOT NULL,
  `event_ref` int(32) NOT NULL,
  `scheduling` varchar(100) NOT NULL DEFAULT '-',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_scheduling_cat`
--

INSERT INTO `fx_scheduling_cat` (`id`, `event_ref`, `scheduling`, `date_added`) VALUES
(13, 3599177, 'Bartendar', '2014-11-19 20:01:17'),
(15, 4373753, 'Waiter', '2014-12-22 16:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `fx_service_type`
--

CREATE TABLE IF NOT EXISTS `fx_service_type` (
`id` int(100) NOT NULL,
  `event_ref` int(32) NOT NULL,
  `price` int(255) NOT NULL,
  `service_type` varchar(100) NOT NULL DEFAULT '-',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_service_type`
--

INSERT INTO `fx_service_type` (`id`, `event_ref`, `price`, `service_type`, `date_added`) VALUES
(8, 6229716, 100, 'Security Officer', '2014-12-04 01:52:34'),
(10, 1547617, 55, 'Bartender', '2014-12-16 20:36:22'),
(11, 6756797, 120, 'Additional Waiter', '2014-12-16 20:36:35'),
(12, 6917855, 25, 'Wireless Mic/Speaker', '2014-12-16 20:36:53'),
(13, 4928785, 100, 'Additional Décor', '2014-12-16 20:37:05'),
(14, 4298362, 50, 'DJ Services', '2014-12-16 20:37:17'),
(15, 9782165, 60, 'Cake', '2014-12-16 20:37:29');

-- --------------------------------------------------------

--
-- Table structure for table `fx_sides`
--

CREATE TABLE IF NOT EXISTS `fx_sides` (
  `item` varchar(50) NOT NULL,
  `cost_price` int(100) NOT NULL,
  `customer_price` int(100) NOT NULL,
`id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `menus_ref` int(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fx_sides`
--

INSERT INTO `fx_sides` (`item`, `cost_price`, `customer_price`, `id`, `date_added`, `menus_ref`) VALUES
('p1', 99, 110, 4, '2014-11-26 15:42:42', 3161263),
('P2', 99, 120, 5, '2014-11-26 15:43:35', 8252214);

-- --------------------------------------------------------

--
-- Table structure for table `fx_slot_processing`
--

CREATE TABLE IF NOT EXISTS `fx_slot_processing` (
`id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `reservation_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fx_slot_processing`
--

INSERT INTO `fx_slot_processing` (`id`, `date`, `reservation_id`) VALUES
(83, '2015-04-09 04:00:00', 46),
(84, '2015-04-09 04:15:00', 46),
(85, '2015-04-09 04:30:00', 46),
(86, '2015-04-09 04:45:00', 46),
(87, '2015-04-09 05:00:00', 46),
(88, '2015-04-09 05:15:00', 46),
(89, '2015-04-09 05:30:00', 46),
(90, '2015-04-09 05:45:00', 46);

-- --------------------------------------------------------

--
-- Table structure for table `fx_subscribers`
--

CREATE TABLE IF NOT EXISTS `fx_subscribers` (
`id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fx_subscribers`
--

INSERT INTO `fx_subscribers` (`id`, `email`, `created_at`) VALUES
(2, 'avi@sadfds.com', '2015-04-03 01:36:36'),
(4, 'avinash.thakur@360itpro.com', '2015-04-03 05:01:50'),
(5, 'rahulg@360itpro.com', '2015-04-06 23:00:32'),
(3, 'test@gmail.com', '2015-04-03 02:54:34');

-- --------------------------------------------------------

--
-- Table structure for table `fx_un_sessions`
--

CREATE TABLE IF NOT EXISTS `fx_un_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `fx_un_sessions`
--

INSERT INTO `fx_un_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('36a5e18f407f9d54c770c38bad4468f7', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36', 1428500581, 'a:3:{s:9:"user_data";s:0:"";s:14:"requested_page";s:58:"http://localhost/allrave/index.php/cron/check_new_requests";s:13:"previous_page";s:51:"http://localhost:8000/allrave/index.php/reservation";}'),
('edad95a0c02494e47fa321f807951d5f', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36', 1428494630, 'a:3:{s:9:"user_data";s:0:"";s:14:"requested_page";s:55:"http://localhost/allrave/index.php/cron/slot_processing";s:13:"previous_page";s:60:"http://localhost:8000/allrave/index.php/cron/slot_processing";}');

-- --------------------------------------------------------

--
-- Table structure for table `fx_users`
--

CREATE TABLE IF NOT EXISTS `fx_users` (
`id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2',
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `fx_users`
--

INSERT INTO `fx_users` (`id`, `username`, `password`, `email`, `role_id`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(1, 'admin', '$P$BG0UyYkDFv4MgN.48F8fgUlInRX5qM/', 'navrinder@360itpro.com', 1, 1, 0, NULL, NULL, NULL, NULL, NULL, '::1', '2015-04-07 16:20:08', '2014-10-20 09:17:58', '2015-04-07 14:20:08'),
(2, 'navi', '$P$BEVeqXwyupJ4jd54IkudxUmAPO/vt4/', 'navi.sohal162@gmail.com', 2, 1, 0, NULL, NULL, NULL, NULL, NULL, '::1', '2015-01-04 09:24:17', '2015-01-04 09:23:22', '2015-01-04 08:24:17');

-- --------------------------------------------------------

--
-- Table structure for table `fx_user_autologin`
--

CREATE TABLE IF NOT EXISTS `fx_user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `fx_user_autologin`
--

INSERT INTO `fx_user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`) VALUES
('8e21894c81815aa8f83ef3c86a5b4c1f', 1, 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/34.0.1847.116 Chrome/34.0.1847.116 Safari/537.36', '127.0.0.1', '2014-11-19 22:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `fx_vehicles`
--

CREATE TABLE IF NOT EXISTS `fx_vehicles` (
`id` int(11) NOT NULL,
  `vehicle_name` varchar(50) NOT NULL,
  `vehicle_number` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_notes`
--

CREATE TABLE IF NOT EXISTS `t_notes` (
  `date` date NOT NULL,
  `notes` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_notes`
--

INSERT INTO `t_notes` (`date`, `notes`) VALUES
('2014-12-04', 'sada');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fx_account_details`
--
ALTER TABLE `fx_account_details`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_activities`
--
ALTER TABLE `fx_activities`
 ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `fx_admin`
--
ALTER TABLE `fx_admin`
 ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `fx_booking_limits`
--
ALTER TABLE `fx_booking_limits`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_calendar_view`
--
ALTER TABLE `fx_calendar_view`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_captcha`
--
ALTER TABLE `fx_captcha`
 ADD PRIMARY KEY (`captcha_id`), ADD KEY `word` (`word`);

--
-- Indexes for table `fx_comments`
--
ALTER TABLE `fx_comments`
 ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `fx_comment_replies`
--
ALTER TABLE `fx_comment_replies`
 ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `fx_companies`
--
ALTER TABLE `fx_companies`
 ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `fx_config`
--
ALTER TABLE `fx_config`
 ADD PRIMARY KEY (`config_key`);

--
-- Indexes for table `fx_countries`
--
ALTER TABLE `fx_countries`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_day_view`
--
ALTER TABLE `fx_day_view`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_desserts`
--
ALTER TABLE `fx_desserts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_driver`
--
ALTER TABLE `fx_driver`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_dry_till`
--
ALTER TABLE `fx_dry_till`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_entrees`
--
ALTER TABLE `fx_entrees`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_estimates`
--
ALTER TABLE `fx_estimates`
 ADD PRIMARY KEY (`est_id`), ADD UNIQUE KEY `reference_no` (`reference_no`);

--
-- Indexes for table `fx_estimate_items`
--
ALTER TABLE `fx_estimate_items`
 ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `fx_events`
--
ALTER TABLE `fx_events`
 ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `fx_event_detail`
--
ALTER TABLE `fx_event_detail`
 ADD PRIMARY KEY (`idevent`), ADD KEY `event_date` (`event_date`);

--
-- Indexes for table `fx_event_orders`
--
ALTER TABLE `fx_event_orders`
 ADD PRIMARY KEY (`event_order_id`), ADD UNIQUE KEY `issue_ref` (`issue_ref`);

--
-- Indexes for table `fx_event_order_comments`
--
ALTER TABLE `fx_event_order_comments`
 ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `fx_event_order_files`
--
ALTER TABLE `fx_event_order_files`
 ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `fx_event_order_items`
--
ALTER TABLE `fx_event_order_items`
 ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `fx_event_room_setup`
--
ALTER TABLE `fx_event_room_setup`
 ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `fx_event_running_order`
--
ALTER TABLE `fx_event_running_order`
 ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `fx_event_staff`
--
ALTER TABLE `fx_event_staff`
 ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `fx_event_status`
--
ALTER TABLE `fx_event_status`
 ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `fx_files`
--
ALTER TABLE `fx_files`
 ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `fx_file_management`
--
ALTER TABLE `fx_file_management`
 ADD UNIQUE KEY `id_2` (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `fx_food`
--
ALTER TABLE `fx_food`
 ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `fx_full_slot`
--
ALTER TABLE `fx_full_slot`
 ADD PRIMARY KEY (`date`,`time`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `fx_invoices`
--
ALTER TABLE `fx_invoices`
 ADD PRIMARY KEY (`inv_id`), ADD UNIQUE KEY `reference_no` (`reference_no`);

--
-- Indexes for table `fx_ipn_log`
--
ALTER TABLE `fx_ipn_log`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_ipn_orders`
--
ALTER TABLE `fx_ipn_orders`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UniqueTransactionID` (`txn_id`);

--
-- Indexes for table `fx_ipn_order_items`
--
ALTER TABLE `fx_ipn_order_items`
 ADD PRIMARY KEY (`id`), ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `fx_items`
--
ALTER TABLE `fx_items`
 ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `fx_items_saved`
--
ALTER TABLE `fx_items_saved`
 ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `fx_locations`
--
ALTER TABLE `fx_locations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_login_attempts`
--
ALTER TABLE `fx_login_attempts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_logistics`
--
ALTER TABLE `fx_logistics`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_mains`
--
ALTER TABLE `fx_mains`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_menu_settings`
--
ALTER TABLE `fx_menu_settings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_modify_packages`
--
ALTER TABLE `fx_modify_packages`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `fx_notes`
--
ALTER TABLE `fx_notes`
 ADD PRIMARY KEY (`date`);

--
-- Indexes for table `fx_order_items`
--
ALTER TABLE `fx_order_items`
 ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `fx_payments`
--
ALTER TABLE `fx_payments`
 ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `fx_payment_methods`
--
ALTER TABLE `fx_payment_methods`
 ADD PRIMARY KEY (`method_id`);

--
-- Indexes for table `fx_refreshments`
--
ALTER TABLE `fx_refreshments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_reservation`
--
ALTER TABLE `fx_reservation`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_rides`
--
ALTER TABLE `fx_rides`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_roles`
--
ALTER TABLE `fx_roles`
 ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `fx_rooms`
--
ALTER TABLE `fx_rooms`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_scheduling`
--
ALTER TABLE `fx_scheduling`
 ADD UNIQUE KEY `id_2` (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `fx_scheduling_cat`
--
ALTER TABLE `fx_scheduling_cat`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_service_type`
--
ALTER TABLE `fx_service_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_sides`
--
ALTER TABLE `fx_sides`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_slot_processing`
--
ALTER TABLE `fx_slot_processing`
 ADD PRIMARY KEY (`date`,`reservation_id`), ADD KEY `id` (`id`);

--
-- Indexes for table `fx_subscribers`
--
ALTER TABLE `fx_subscribers`
 ADD PRIMARY KEY (`email`), ADD KEY `id` (`id`);

--
-- Indexes for table `fx_un_sessions`
--
ALTER TABLE `fx_un_sessions`
 ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `fx_users`
--
ALTER TABLE `fx_users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `fx_user_autologin`
--
ALTER TABLE `fx_user_autologin`
 ADD PRIMARY KEY (`key_id`,`user_id`);

--
-- Indexes for table `fx_vehicles`
--
ALTER TABLE `fx_vehicles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_notes`
--
ALTER TABLE `t_notes`
 ADD PRIMARY KEY (`date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fx_account_details`
--
ALTER TABLE `fx_account_details`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fx_activities`
--
ALTER TABLE `fx_activities`
MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=674;
--
-- AUTO_INCREMENT for table `fx_admin`
--
ALTER TABLE `fx_admin`
MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `fx_booking_limits`
--
ALTER TABLE `fx_booking_limits`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fx_calendar_view`
--
ALTER TABLE `fx_calendar_view`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fx_captcha`
--
ALTER TABLE `fx_captcha`
MODIFY `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fx_comments`
--
ALTER TABLE `fx_comments`
MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_comment_replies`
--
ALTER TABLE `fx_comment_replies`
MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_companies`
--
ALTER TABLE `fx_companies`
MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fx_countries`
--
ALTER TABLE `fx_countries`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=243;
--
-- AUTO_INCREMENT for table `fx_day_view`
--
ALTER TABLE `fx_day_view`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fx_desserts`
--
ALTER TABLE `fx_desserts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fx_driver`
--
ALTER TABLE `fx_driver`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_dry_till`
--
ALTER TABLE `fx_dry_till`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `fx_entrees`
--
ALTER TABLE `fx_entrees`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fx_estimates`
--
ALTER TABLE `fx_estimates`
MODIFY `est_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `fx_estimate_items`
--
ALTER TABLE `fx_estimate_items`
MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=158;
--
-- AUTO_INCREMENT for table `fx_events`
--
ALTER TABLE `fx_events`
MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `fx_event_detail`
--
ALTER TABLE `fx_event_detail`
MODIFY `idevent` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fx_event_orders`
--
ALTER TABLE `fx_event_orders`
MODIFY `event_order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `fx_event_order_comments`
--
ALTER TABLE `fx_event_order_comments`
MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fx_event_order_files`
--
ALTER TABLE `fx_event_order_files`
MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_event_order_items`
--
ALTER TABLE `fx_event_order_items`
MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `fx_event_room_setup`
--
ALTER TABLE `fx_event_room_setup`
MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_event_running_order`
--
ALTER TABLE `fx_event_running_order`
MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_event_staff`
--
ALTER TABLE `fx_event_staff`
MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fx_event_status`
--
ALTER TABLE `fx_event_status`
MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `fx_files`
--
ALTER TABLE `fx_files`
MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `fx_file_management`
--
ALTER TABLE `fx_file_management`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_food`
--
ALTER TABLE `fx_food`
MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `fx_full_slot`
--
ALTER TABLE `fx_full_slot`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `fx_invoices`
--
ALTER TABLE `fx_invoices`
MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `fx_ipn_log`
--
ALTER TABLE `fx_ipn_log`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_ipn_orders`
--
ALTER TABLE `fx_ipn_orders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_ipn_order_items`
--
ALTER TABLE `fx_ipn_order_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_items`
--
ALTER TABLE `fx_items`
MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=177;
--
-- AUTO_INCREMENT for table `fx_items_saved`
--
ALTER TABLE `fx_items_saved`
MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fx_locations`
--
ALTER TABLE `fx_locations`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fx_login_attempts`
--
ALTER TABLE `fx_login_attempts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_logistics`
--
ALTER TABLE `fx_logistics`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fx_mains`
--
ALTER TABLE `fx_mains`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fx_menu_settings`
--
ALTER TABLE `fx_menu_settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fx_modify_packages`
--
ALTER TABLE `fx_modify_packages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `fx_order_items`
--
ALTER TABLE `fx_order_items`
MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fx_payments`
--
ALTER TABLE `fx_payments`
MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `fx_payment_methods`
--
ALTER TABLE `fx_payment_methods`
MODIFY `method_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fx_refreshments`
--
ALTER TABLE `fx_refreshments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fx_reservation`
--
ALTER TABLE `fx_reservation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `fx_rides`
--
ALTER TABLE `fx_rides`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_roles`
--
ALTER TABLE `fx_roles`
MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fx_rooms`
--
ALTER TABLE `fx_rooms`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fx_scheduling`
--
ALTER TABLE `fx_scheduling`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `fx_scheduling_cat`
--
ALTER TABLE `fx_scheduling_cat`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `fx_service_type`
--
ALTER TABLE `fx_service_type`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `fx_sides`
--
ALTER TABLE `fx_sides`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fx_slot_processing`
--
ALTER TABLE `fx_slot_processing`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `fx_subscribers`
--
ALTER TABLE `fx_subscribers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fx_users`
--
ALTER TABLE `fx_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fx_vehicles`
--
ALTER TABLE `fx_vehicles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

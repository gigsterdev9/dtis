-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 01, 2018 at 04:27 AM
-- Server version: 5.5.60-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `infragre_dtis`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_trail`
--

CREATE TABLE IF NOT EXISTS `audit_trail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visitor_id` int(11) DEFAULT NULL,
  `visit_id` int(11) DEFAULT NULL,
  `user` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activity` char(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'created, modified',
  `mod_details` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`id`, `visitor_id`, `visit_id`, `user`, `timestamp`, `activity`, `mod_details`) VALUES
(1, 1, NULL, 'DTISDev', '2018-04-28 05:49:53', 'modified', 'field: h_address, old value: Atherton, QLD 4883\r\nAustralia, new value: Atherton, QLD 4883Australia | field: remarks, old value: , new value: asdf | '),
(2, 1, NULL, 'DTISDev', '2018-04-28 07:26:22', 'modified', 'field: remarks, old value: asdf, new value:  | '),
(3, 2, NULL, 'DTISDev', '2018-04-28 07:36:26', 'modified', 'field: h_address, old value: Atherton, QLD 4883\r\nAustralia, new value: Atherton, QLD 4883Australia | field: remarks, old value: , new value: Stella is a naturalized German by virtue of her marriage to Yogi | '),
(4, 2, NULL, 'DTISDev', '2018-04-28 07:40:29', 'modified', 'field: remarks, old value: Stella is a naturalized German by virtue of her marriage to Yogi, new value:  | '),
(5, 2, NULL, 'DTISDev', '2018-04-28 07:41:38', 'modified', 'no evident changes'),
(6, 1, NULL, 'DTISDev', '2018-04-28 07:51:56', 'modified', 'no evident changes'),
(7, 1, NULL, 'DTISDev', '2018-04-28 07:53:42', 'modified', 'field: mname, old value: , new value: X | '),
(8, 1, NULL, 'DTISDev', '2018-04-28 08:02:03', 'modified', 'field: b_address, old value: Atherton, QLD 4883\r\nAustralia, new value: Atherton, QLD 4883Australia | field: remarks, old value: , new value: asdf | '),
(9, 3, NULL, 'DTISDev', '2018-04-28 08:41:09', 'created', ''),
(10, 4, NULL, 'DTISDev', '2018-04-29 04:23:27', 'created', ''),
(11, 2, NULL, 'DTISDev', '2018-04-29 06:46:54', 'modified', 'field: b_address, old value: Atherton, QLD 4883\r\nAustralia, new value: Atherton, QLD 4883Australia | field: ice_address, old value: Atherton, QLD 4883\r\nAustralia, new value: Atherton, QLD 4883Australia | field: remarks, old value: , new value: Asdf | '),
(12, 2, NULL, 'DTISDev', '2018-04-29 06:47:24', 'modified', 'field: remarks, old value: Asdf, new value: Lorem ipsum dolor consectitur sit amet | '),
(13, 4, NULL, 'DTISDev', '2018-04-29 06:48:39', 'modified', 'no evident changes'),
(14, 4, NULL, 'DTISDev', '2018-04-29 06:52:23', 'modified', 'entry marked as deleted'),
(15, 4, NULL, 'DTISDev', '2018-04-29 06:53:36', 'modified', 'entry restored');

-- --------------------------------------------------------

--
-- Table structure for table `butanding_interaction`
--

CREATE TABLE IF NOT EXISTS `butanding_interaction` (
  `interaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `visit_id` int(11) NOT NULL,
  `boarding_pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `boat_id` int(11) NOT NULL,
  `bio_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `or_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `or_date` date NOT NULL,
  `remarks` text COLLATE utf8_unicode_ci NOT NULL,
  `trash` tinyint(1) NOT NULL,
  PRIMARY KEY (`interaction_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `butanding_interaction`
--

INSERT INTO `butanding_interaction` (`interaction_id`, `visit_id`, `boarding_pass`, `boat_id`, `bio_name`, `or_no`, `or_date`, `remarks`, `trash`) VALUES
(1, 1, '1234567890', 1, 'Juan dela Cruz', '1234567890', '2018-04-30', 'Asdf', 0),
(2, 2, '1234567890', 1, 'Juan dela Cruz', '1234567890', '2018-04-30', 'Asdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `firefly_watching`
--

CREATE TABLE IF NOT EXISTS `firefly_watching` (
  `cruise_id` int(11) NOT NULL AUTO_INCREMENT,
  `visit_id` int(11) NOT NULL,
  `boarding_pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `boat_id` int(11) NOT NULL,
  `guide_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `or_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `or_date` date NOT NULL,
  `remarks` text COLLATE utf8_unicode_ci NOT NULL,
  `trash` tinyint(1) NOT NULL,
  PRIMARY KEY (`cruise_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `island_hopping`
--

CREATE TABLE IF NOT EXISTS `island_hopping` (
  `interaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `visit_id` int(11) NOT NULL,
  `boarding_pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `boat_id` int(11) NOT NULL,
  `guide_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `or_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `or_date` date NOT NULL,
  `remarks` text COLLATE utf8_unicode_ci NOT NULL,
  `trash` tinyint(1) NOT NULL,
  PRIMARY KEY (`interaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `registered_boats`
--

CREATE TABLE IF NOT EXISTS `registered_boats` (
  `boat_id` int(11) NOT NULL AUTO_INCREMENT,
  `boat_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `operator` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date_registered` date NOT NULL,
  `remarks` text COLLATE utf8_unicode_ci NOT NULL,
  `trash` tinyint(1) NOT NULL,
  PRIMARY KEY (`boat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '180.190.51.129', 'DTISDev', '$2y$08$FtsB9q8nHlkljHSFGT1aneCLTlZx61fGlHkA12U7eI7K0CQKc93VS', NULL, 'pj.villarta@gmail.com', NULL, 'SFtVTmNpS-HnZReCqhXmxO456cdbaff03455e508', 1511194434, 'JEdROHNoZQJtDUXIdYtqRu', 1461879649, 1525079445, 1, 'Dev', 'DTIS', 'InfraGrey', NULL),
(2, '180.190.51.129', 'DTIS1', '$2y$08$8r.EqetPJ1DqU/SbIdR3ZuZVWfYtrvSfBIoxzYfR0WxbtEGkRDjSK', NULL, 'pj@infragrey.com', NULL, NULL, NULL, NULL, 1511485511, NULL, 1, 'User1', 'DTIS', 'InfraGrey', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE IF NOT EXISTS `visitors` (
  `visitor_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `h_address` text COLLATE utf8_unicode_ci NOT NULL,
  `nationality` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `bdate` date NOT NULL,
  `gender` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `civil_status` char(1) COLLATE utf8_unicode_ci NOT NULL COMMENT 'S single, M married, W widowed, O other',
  `mobile_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `occupation` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `b_address` text COLLATE utf8_unicode_ci NOT NULL,
  `b_contact_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `swimmer` tinyint(1) NOT NULL COMMENT '0 no; 1 yes',
  `diver` tinyint(1) NOT NULL COMMENT '0 no; 1 yes',
  `ice_fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'in case of emergency',
  `ice_address` text COLLATE utf8_unicode_ci NOT NULL,
  `ice_relationship` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ice_contact_nos` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0 undefined, 1 welcome, 2 conditional entry, 3 total ban',
  `remarks` text COLLATE utf8_unicode_ci NOT NULL,
  `trash` tinyint(1) NOT NULL,
  PRIMARY KEY (`visitor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`visitor_id`, `fname`, `mname`, `lname`, `h_address`, `nationality`, `bdate`, `gender`, `civil_status`, `mobile_no`, `email`, `occupation`, `b_address`, `b_contact_no`, `swimmer`, `diver`, `ice_fullname`, `ice_address`, `ice_relationship`, `ice_contact_nos`, `status`, `remarks`, `trash`) VALUES
(1, 'Jurgen', 'X', 'Freund', 'Atherton, QLD 4883Australia', 'German', '1960-01-01', 'M', 'M', '+61439793710', 'freundimages@gmail.com', 'Underwater Photographer', 'Atherton, QLD 4883\r\nAustralia', '+61439793710', 1, 1, 'Stella Chiu Freund', 'Atherton, QLD 4883\r\nAustralia', 'Wife', '+61439793710', 1, 'asdf', 0),
(2, 'Stella', 'Chiu', 'Freund', 'Atherton, QLD 4883Australia', 'German', '1965-01-01', 'F', 'M', '+61439793710', 'freundimages@gmail.com', 'Producer', 'Atherton, QLD 4883Australia', '+61439793710', 1, 1, 'Jurgen Freund', 'Atherton, QLD 4883Australia', 'Husband', '+61439793710', 1, 'Lorem ipsum dolor consectitur sit amet', 0),
(3, 'Steven', 'Allan', 'Spielberg', '4 Goldfield Rd.  Honolulu, HI 96815', 'American', '1946-12-18', 'M', 'M', '+1-202-555-0189', 'steven@sahrulselow.cf', 'Filmmaker', '4 Goldfield Rd. \nHonolulu, HI 96815', '+1-202-555-0189', 1, 1, 'Joseph L. Terry', '514 S. Magnolia St. \nOrlando, FL 32806', 'Assistant', '+1-202-555-0189', 1, '', 0),
(4, 'Davar', 'A', 'Behrooz', 'asdf', 'Afghan', '1980-04-29', 'M', 'S', '5555555', 'me@me.me', 'asdf', 'asdf', 'Behrooz', 1, 1, 'Armi Behrooz', 'asdf', 'Wife', '5555555', 1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE IF NOT EXISTS `visits` (
  `visit_id` int(11) NOT NULL AUTO_INCREMENT,
  `visitor_id` int(11) NOT NULL,
  `visit_date` date NOT NULL,
  `form_signed` tinyint(1) NOT NULL COMMENT '0 no; 1 yes',
  `butanding` tinyint(1) NOT NULL COMMENT 'butanding activity',
  `girawan` tinyint(1) NOT NULL COMMENT 'girawan activity',
  `firefly` tinyint(1) NOT NULL COMMENT 'firefly activity',
  `island_hop` tinyint(1) NOT NULL COMMENT 'island_hop activity',
  `visit_remarks` text COLLATE utf8_unicode_ci NOT NULL,
  `trash` tinyint(1) NOT NULL,
  PRIMARY KEY (`visit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`visit_id`, `visitor_id`, `visit_date`, `form_signed`, `butanding`, `girawan`, `firefly`, `island_hop`, `visit_remarks`, `trash`) VALUES
(1, 1, '2018-04-30', 1, 1, 0, 0, 0, '', 0),
(2, 2, '2018-04-30', 1, 1, 0, 0, 0, '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

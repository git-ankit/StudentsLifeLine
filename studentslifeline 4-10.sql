-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 04, 2017 at 11:49 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentslifeline`
--

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `date_created` timestamp NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_user`
--

DROP TABLE IF EXISTS `forum_user`;
CREATE TABLE IF NOT EXISTS `forum_user` (
  `forum_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  PRIMARY KEY (`forum_id`,`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `moderator_actions`
--

DROP TABLE IF EXISTS `moderator_actions`;
CREATE TABLE IF NOT EXISTS `moderator_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(1000) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `moderator_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

DROP TABLE IF EXISTS `noticeboard`;
CREATE TABLE IF NOT EXISTS `noticeboard` (
  `notice_id` int(255) NOT NULL AUTO_INCREMENT,
  `notice_did` varchar(10000) NOT NULL,
  `notice_time` datetime NOT NULL,
  `notice_title` varchar(200) NOT NULL,
  `notice_content` blob NOT NULL,
  PRIMARY KEY (`notice_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `noticeboard`
--

INSERT INTO `noticeboard` (`notice_id`, `notice_did`, `notice_time`, `notice_title`, `notice_content`) VALUES
(2, '2', '2017-09-12 00:00:00', 'dsdad', 0x3c21444f43545950452068746d6c3e0d0a3c68746d6c3e0d0a3c686561643e0d0a093c7469746c653e6166663c2f7469746c653e0d0a3c2f686561643e0d0a3c626f64793e0d0a61736673616664660d0a3c2f626f64793e0d0a3c2f68746d6c3e),
(3, '2', '2017-09-12 00:00:00', 'dsdad', '');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post` varchar(2000) NOT NULL,
  `date_created` timestamp NOT NULL,
  `reply_to` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

DROP TABLE IF EXISTS `thread`;
CREATE TABLE IF NOT EXISTS `thread` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(10000) NOT NULL,
  `started_by` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL,
  `anonymous` varchar(2) NOT NULL DEFAULT 'N',
  `status` int(10) NOT NULL DEFAULT '1',
  `forum_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_first` varchar(50) NOT NULL,
  `user_last` varchar(50) NOT NULL,
  `user_uid` varchar(50) NOT NULL,
  `user_pwd` varchar(10000) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `is_staff` varchar(2) NOT NULL,
  `date_joined` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `is_superadmin` varchar(2) NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_thread`
--

DROP TABLE IF EXISTS `user_thread`;
CREATE TABLE IF NOT EXISTS `user_thread` (
  `user_id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`thread_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

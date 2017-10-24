-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2017 at 03:52 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `name`, `description`, `date_created`, `created_by`, `status`) VALUES
(1, 'First thing', 'This is the very first forum on this page!', '2017-10-05 17:53:11', 2, 1),
(2, 'Test', 'Test ke liye banaya', '2017-10-05 18:50:03', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `forum_user`
--

CREATE TABLE `forum_user` (
  `forum_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `moderator_actions`
--

CREATE TABLE `moderator_actions` (
  `id` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `moderator_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

CREATE TABLE `noticeboard` (
  `notice_id` int(255) NOT NULL,
  `notice_did` varchar(10000) NOT NULL,
  `notice_time` datetime NOT NULL,
  `notice_title` varchar(200) NOT NULL,
  `notice_content` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `post` varchar(2000) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reply_to` int(11) DEFAULT NULL,
  `thread_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `post`, `date_created`, `reply_to`, `thread_id`, `user_id`, `status`) VALUES
(1, 'first post', '2017-10-24 14:48:59', NULL, 11, 2, 1),
(2, 'second post', '2017-10-24 15:29:20', NULL, 11, 2, 1),
(3, 'third post', '2017-10-24 15:29:41', NULL, 11, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `id` int(11) NOT NULL,
  `subject` varchar(10000) NOT NULL,
  `description` varchar(6000) NOT NULL,
  `started_by` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `anonymous` varchar(2) NOT NULL DEFAULT 'N',
  `status` int(10) NOT NULL DEFAULT '1',
  `forum_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`id`, `subject`, `description`, `started_by`, `created_on`, `anonymous`, `status`, `forum_id`) VALUES
(11, 'blah', 'lol', '2', '2017-10-24 14:02:00', 'N', 1, 1),
(12, 'lol', 'blah', '2', '2017-10-24 14:06:05', 'Y', 1, 1),
(13, 'opo', 'vovo', '2', '2017-10-24 14:06:48', 'N', 1, 1),
(14, 'joke', 'chalu hai', '2', '2017-10-24 14:08:50', 'N', 1, 1),
(15, 'kem', 'palty', '2', '2017-10-24 14:09:20', 'N', 1, 1),
(16, 'tm', 'loc', '2', '2017-10-24 14:09:48', 'N', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_first` varchar(50) NOT NULL,
  `user_last` varchar(50) NOT NULL,
  `user_uid` varchar(50) NOT NULL,
  `user_pwd` varchar(10000) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `is_staff` varchar(2) NOT NULL DEFAULT 'N',
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime DEFAULT NULL,
  `is_superadmin` varchar(2) NOT NULL DEFAULT 'N',
  `user_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_first`, `user_last`, `user_uid`, `user_pwd`, `user_email`, `is_staff`, `date_joined`, `last_login`, `is_superadmin`, `user_status`) VALUES
(2, 'Ankit', 'Tiwari', 'aat', '$2y$10$JVSe8/epCuq7AUOWqG4kj.wx96g/luGPxA//hvvhExmIUy39BZ47S', 'aat@somaiya.edu', 'N', '2017-10-05 17:51:49', NULL, 'N', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_thread`
--

CREATE TABLE `user_thread` (
  `user_id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_thread`
--

INSERT INTO `user_thread` (`user_id`, `thread_id`) VALUES
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_user`
--
ALTER TABLE `forum_user`
  ADD PRIMARY KEY (`forum_id`,`person_id`);

--
-- Indexes for table `moderator_actions`
--
ALTER TABLE `moderator_actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noticeboard`
--
ALTER TABLE `noticeboard`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_thread`
--
ALTER TABLE `user_thread`
  ADD PRIMARY KEY (`user_id`,`thread_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `moderator_actions`
--
ALTER TABLE `moderator_actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `noticeboard`
--
ALTER TABLE `noticeboard`
  MODIFY `notice_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

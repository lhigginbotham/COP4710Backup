-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2015 at 07:26 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `famil110_cop4710`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `email` varchar(255) NOT NULL,
  `permissions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`email`, `permissions`) VALUES
('hare.greg@knights.ucf.edu', 1),
('hare.greg@knights.ucf.edu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `attends_uni`
--

CREATE TABLE IF NOT EXISTS `attends_uni` (
  `uid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`cid` int(11) NOT NULL,
  `eid` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `body` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cid`, `eid`, `rating`, `email`, `body`) VALUES
(6, NULL, 3, 'a@a.com', 'qweqwe'),
(7, NULL, 3, 'a@a.com', 'TESTST'),
(8, NULL, 5, NULL, 'PHP IS FUN!'),
(9, NULL, 3, NULL, 'dasdasD'),
(10, NULL, 2, 'a@a.com', 'qweqwe'),
(11, NULL, 4, 'a@a.com', 'qweqwe'),
(13, 1, 4, 'a@a.com', 'qweqwe'),
(14, NULL, 4, 'a@a.com', 'qweqweqw'),
(15, 1, 4, 'a@a.com', 'qweqwe'),
(16, 1, 4, 'a@a.com', 'qeqweqw'),
(17, 1, 2, 'a@a.com', 'werewrewrewr'),
(18, 1, 5, 'a@a.com', 'This is proper comment. Hooray!'),
(19, 2, 5, 'a@a.com', 'I love commenting on events!'),
(23, 1, 3, 'a@a.com', 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
`eid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `category` int(11) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `stime` time NOT NULL,
  `etime` time NOT NULL,
  `address` varchar(255) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `visibility` int(11) NOT NULL,
  `rsvp` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eid`, `name`, `description`, `category`, `sdate`, `edate`, `stime`, `etime`, `address`, `latitude`, `longitude`, `phone`, `email`, `visibility`, `rsvp`, `uid`) VALUES
(1, 'Sample Event', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, '2025-11-11', '2025-11-11', '12:12:12', '12:12:15', '1600 Pennsylvania Avenue', 0, 0, 1234567890, 'a@a.com', 0, 0, 1),
(2, 'Another Event', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, '2015-05-11', '2015-06-11', '11:11:00', '12:00:00', '4000 Central Florida Avenue', 0, 0, 1112223333, 'a@a.com', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `follows_rso`
--

CREATE TABLE IF NOT EXISTS `follows_rso` (
  `oid` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follows_rso`
--

INSERT INTO `follows_rso` (`oid`, `email`) VALUES
(1, 'a@a.com');

-- --------------------------------------------------------

--
-- Table structure for table `hosts`
--

CREATE TABLE IF NOT EXISTS `hosts` (
  `eid` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `is_part_of`
--

CREATE TABLE IF NOT EXISTS `is_part_of` (
  `oid` int(11) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `manages_org`
--

CREATE TABLE IF NOT EXISTS `manages_org` (
  `oid` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE IF NOT EXISTS `organizations` (
`oid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `email` varchar(255) NOT NULL,
  `uid` int(11) DEFAULT '0',
  `otype` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`oid`, `name`, `description`, `email`, `uid`, `otype`) VALUES
(1, 'Greg''s Student Organization', 'This is a student organization that serves no purpose except to be a place holder for a database project. Pretty dumb organization right?', 'hare.greg@knights.ucf.edu', 555, 0),
(2, 'jasdja', 'kjjkwerew', 'greghare91@gmail.com', 555, 0),
(3, 'dsda', 'werewr', 'asde', 2, 0),
(4, 'sdsd', 'werwe', 'sdfsd', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `superadmins`
--

CREATE TABLE IF NOT EXISTS `superadmins` (
  `email` varchar(255) NOT NULL,
  `permissions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE IF NOT EXISTS `universities` (
`uid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `num_students` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`uid`, `email`, `domain`, `name`, `address`, `description`, `num_students`) VALUES
(1, 'email@email.com', 'www.usf.com', 'University of South Florida', '3000 Other Place Lane', 'USF.', 17000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `fname`, `lname`) VALUES
('a@a.com', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'a', 'a'),
('email@email.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'blah', 'blar'),
('greghare91@gmail.com', '13fbd79c3d390e5d6585a21e11ff5ec1970cff0c', 'sd', 'sajd'),
('hare.greg@knights.ucf.edu', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Greg', 'Hare'),
('harmonmichael@knights.ucf.edu', '3f111f899bb5510314a341454e8517011f373000', 'Michael', 'Harmon'),
('qwerty@qwe.rty', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'John', 'Smith'),
('w@w.com', 'aff024fe4ab0fece4091de044c58c9ae4233383a', 'w', 'w');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
 ADD KEY `email` (`email`);

--
-- Indexes for table `attends_uni`
--
ALTER TABLE `attends_uni`
 ADD PRIMARY KEY (`uid`,`email`), ADD KEY `email` (`email`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`cid`), ADD KEY `eid` (`eid`), ADD KEY `email` (`email`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`eid`), ADD KEY `uid` (`uid`);

--
-- Indexes for table `follows_rso`
--
ALTER TABLE `follows_rso`
 ADD PRIMARY KEY (`oid`,`email`), ADD KEY `email` (`email`);

--
-- Indexes for table `hosts`
--
ALTER TABLE `hosts`
 ADD PRIMARY KEY (`eid`,`email`), ADD KEY `email` (`email`);

--
-- Indexes for table `is_part_of`
--
ALTER TABLE `is_part_of`
 ADD PRIMARY KEY (`oid`,`uid`), ADD KEY `uid` (`uid`);

--
-- Indexes for table `manages_org`
--
ALTER TABLE `manages_org`
 ADD PRIMARY KEY (`oid`,`email`), ADD KEY `email` (`email`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
 ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `superadmins`
--
ALTER TABLE `superadmins`
 ADD KEY `email` (`email`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
 ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
ADD CONSTRAINT `Admins_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `attends_uni`
--
ALTER TABLE `attends_uni`
ADD CONSTRAINT `Attends_uni_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `universities` (`uid`),
ADD CONSTRAINT `Attends_uni_ibfk_2` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `Comments_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `events` (`eid`),
ADD CONSTRAINT `Comments_ibfk_2` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `universities` (`uid`);

--
-- Constraints for table `follows_rso`
--
ALTER TABLE `follows_rso`
ADD CONSTRAINT `follows_rso_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
ADD CONSTRAINT `follows_rso_ibfk_2` FOREIGN KEY (`oid`) REFERENCES `organizations` (`oid`);

--
-- Constraints for table `hosts`
--
ALTER TABLE `hosts`
ADD CONSTRAINT `Hosts_ibfk_1` FOREIGN KEY (`email`) REFERENCES `admins` (`email`),
ADD CONSTRAINT `Hosts_ibfk_2` FOREIGN KEY (`eid`) REFERENCES `events` (`eid`);

--
-- Constraints for table `is_part_of`
--
ALTER TABLE `is_part_of`
ADD CONSTRAINT `Is_part_of_ibfk_1` FOREIGN KEY (`oid`) REFERENCES `organizations` (`oid`),
ADD CONSTRAINT `Is_part_of_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `universities` (`uid`);

--
-- Constraints for table `manages_org`
--
ALTER TABLE `manages_org`
ADD CONSTRAINT `Manages_org_ibfk_1` FOREIGN KEY (`oid`) REFERENCES `organizations` (`oid`),
ADD CONSTRAINT `Manages_org_ibfk_2` FOREIGN KEY (`email`) REFERENCES `admins` (`email`);

--
-- Constraints for table `superadmins`
--
ALTER TABLE `superadmins`
ADD CONSTRAINT `SuperAdmins_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

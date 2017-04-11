
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2017 at 05:48 PM
-- Server version: 10.0.28-MariaDB-wsrep
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u963382604_spi`
--

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_description` text CHARACTER SET utf8 NOT NULL COMMENT 'Comma seperated values',
  `checksum` varchar(64) COLLATE utf8_bin NOT NULL,
  `doc_path` varchar(150) COLLATE utf8_bin NOT NULL,
  `uploaded_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `doc_description` (`doc_description`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `client_id` varchar(12) NOT NULL,
  `password` varchar(120) NOT NULL,
  `is_admin` tinyint(1) NOT NULL COMMENT '0-> User, 1-> Admin',
  `registered_at` datetime NOT NULL,
  `last_login_at` datetime NOT NULL,
  `last_password_reset` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `client_id`, `password`, `is_admin`, `registered_at`, `last_login_at`, `last_password_reset`) VALUES
(1, 'Administrator', 'admin', '$2a$10$ObsCexiSbLyqOA/B5usvJu9/vihoDPSO/9qxpBsHMKjk2yHNGAY0W', 1, '2016-10-03 22:28:46', '2017-03-30 09:02:01', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

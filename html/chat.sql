-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2020 at 08:09 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatbox`
--

CREATE TABLE `chatbox` (
  `id` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `msg` varchar(250) NOT NULL,
  `receiver` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatbox`
--

INSERT INTO `chatbox` (`id`, `username`, `msg`, `receiver`) VALUES
('1', 'saumya', ' hii', 'sanchi'),
('1', 'saumya', ' hii', 'harshita'),
('1', 'saumya', 'what are doing?', 'harshita'),
('1', 'saumya', ' hii', 'avi'),
('1', 'avi', ' ohh hii', ''),
('1', 'avi', 'jh;kh', 'avi'),
('1', 'sanchi', ' whats up', 'saumya'),
('1', 'saumya', ' Hii mansi', 'Mansi'),
('1', 'Girish', ' Hii', 'Mansi'),
('1', 'Mansi', ' Hii', 'saumya');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

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
-- Database: `signup`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `name` text NOT NULL,
  `password` char(250) NOT NULL,
  `city` text NOT NULL,
  `country` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `contact` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `id` varchar(250) NOT NULL,
  `friends` varchar(250) NOT NULL,
  `friendrequest` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`name`, `password`, `city`, `country`, `email`, `contact`, `address`, `id`, `friends`, `friendrequest`) VALUES
('Mansi', '$2y$10$sbokSUfy8AEzLfxbAkGNn.uXGus.MIOYE2a1j2PV5XMwkGiDk6GPm', 'Indore', 'India', 'mansi@gmail.com', '8965471236', 'pqwhhi', 'Indore8965471236', 'harshita,vidhi,muskan,saumya,saumya,avi,Bhavini,Girish,Amreeta', 'akshara,hrituja,prachi,sanchi'),
('Mansi', '$2y$10$sbokSUfy8AEzLfxbAkGNn.uXGus.MIOYE2a1j2PV5XMwkGiDk6GPm', 'Indore', 'India', 'mansi@gmail.com', '8965471236', 'pqwhhi', 'Indore8965471236', 'harshita,vidhi,muskan,saumya,saumya,avi,Bhavini,Girish,Amreeta', 'akshara,hrituja,prachi,sanchi'),
('vidhi', '$2y$10$D7hV9r61Bsba3ocoTEXfXe0hL8ULfqlsyXpy.5grQVQRayDSJDYou', 'hyderabad', 'india', 'vidhi89@gmail.com', '7894561237', 'ttyyuu', 'vellore7894561237', 'harshita,Mansi,harshita,avi,akshara,hrituja,prachi,Vanshika', 'saumya,sanchi'),
('avi', '$2y$10$9mL09EQxBVxPjIw5qZxuGOL4sFDPZDWndYKDB.k4jvv3NAYs9Vryq', 'chennai', 'india', 'avi76@gmail.com', '4569871238', 'iijjii', 'chennai4569871238', 'harshita,Mansi,vidhi,saumya', 'hrituja,pranoti'),
('muskan', '$2y$10$fAxsZtbDy.i6beqqLwmC/ugL7uHOYOw8Gf7iY8ZJbY0Jbhq4ZXXUe', 'jaipur', 'india', 'muskii43@gmail.com', '4862475937', 'ttggfff', 'jaipur4862475937', 'Mansi,harshita', 'vidhi,saumya'),
('harshita', '$2y$10$n0N8LuaYtv939qrbgM0cuOHr.2iitG9Oe2TAeJsjdW8uS9ncLKw1u', 'bhopal', 'india', 'harshita23@gmail.com', '9458763214', 'hhjjttdd', 'bhopal9458763214', 'Mansi,vidhi,rajkumar,ritisha,vidhi,muskan,avi,saumya,Bhavini,pranoti', 'Vanshika'),
('rajkumar', '$2y$10$zoHtyHeEccPlbyvvfM.Uj.L75YwSDjPgjY6.UbTbveQ87yye5/Mby', 'vellore', 'india', 'rajaraj@gmail.com', '9453001301', 'ssdfbkscsi', 'vellore9453001301', 'harshita', 'Mansi,vidhi,saumya'),
('ritisha', '$2y$10$lONp.mpuUPEBlkie0shS9.dcxrEVYvu/pUocixCI/MP8qe4fSGw6S', 'Portugal', 'Spain', 'rudupoopy@gmail.com', '6767546578', 'effisuiswducif', 'Portugal6767546578', 'harshita', 'Mansi,saumya'),
('saumya', '$2y$10$68ayxvtuatJXzQNg4lJ6/e3GYBXSai8yqT3MRbn6nuivNprfRmRfq', 'Vellore', 'India', 'saumya@gmail.com', '8005148725', 'B-85 Awas Vikas jhansi', 'Jhansi8005148725', 'Mansi,avi,harshita,sanchi', ''),
('Bhavini', '$2y$10$mUzmMOD7V1xZh3GJ3wkKY.ZbSJgQMD9/ZtALWhg6lWOahFyoiut86', 'Varanasi', 'India', 'bhavini@gmail.com', '8965489654', 'pqr,abc varanasi', 'Varanasi8965489654', 'harshita,Mansi', ''),
('akshara', '$2y$10$pTuDxgAD8BjwJV8dOwN9Ieh6kFaDwD.qW4Gciv5WqlMpW5nhLS/YO', 'lucknow', 'India', 'akshara12@gmail.com', '7651845430', 'A12,colony,lucknow', 'lucknow7651845430', 'vidhi', ''),
('prachi', '$2y$10$fZzzRVw2rdu0sQRvdsSmlulGNXw63Lq3NrFOe9v.R7gmR5sjUm2zu', 'delhi', 'India', 'prachi@gmail.com', '7548989654', 'b54,colony,delhi', 'delhi7548989654', 'vidhi', 'saumya'),
('pranoti', '$2y$10$YBqWLmf6I9Gs1CUUaX1xV.OXfglERPZQAGKVu4yWOkECBeT1NGlgS', 'nagpur', 'India', 'pranoti45@gmail.com', '7965489654', 'a34,colony,nagpur', 'nagpur7965489654', 'harshita', 'Mansi'),
('Vanshika', '$2y$10$VXQwvtjIHkIXp8jXtDAcBOWCo0H51ek0tbNP8kO0wYgtd99mmbYN2', 'Gwalior', 'India', 'vanshika45@gmail.com', '7894589651', 's56,moderncolony,gwalior', 'Gwalior7894589651', 'vidhi', 'saumya'),
('sanchi', '$2y$10$hABvQvlOjnz5IePkXxJ3K.kYQ1OrGGZ2/SqSuliUYRro0xiXtVl56', 'Kanpur', 'India', 'sanchi@gmail.com', '8965471235', '12,Bakers Street,kanpur', 'Kanpur8965471235', 'saumya', ''),
('Niharika', '$2y$10$8MkrzFEJyM9b.SXPnX5HoO/RlKyc3i9s4q7tE1vU1Qdt7F37cWgS6', 'Bhatinda', 'India', 'niharika@gmail.com', '8005148725', 'Punjab', 'Bhatinda8005148725', '', ''),
('Girish', '$2y$10$y8sd660SdiewytZ/7TxTi.roMC08f6Aux7l6E22YhUBrcP8aP26Ia', 'Kolhapur', 'India', 'girish@gmail.com', '9876789065', 'New Area,Kolhaur', 'Kolhapur9876789065', 'Mansi', ''),
('Amreeta', '$2y$10$EzOURtZWX6SDXceAYsyOIeCdNo1mJ3oEORIvWyWTyCtrZuN/AJKwW', 'Vellore', 'India', 'abc@gmail.com', '8005148725', 'fgdhgf', 'Vellore8005148725', 'Mansi', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

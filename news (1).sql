-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2015 at 03:39 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `code5`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `news_date` date NOT NULL,
  `year` year(4) NOT NULL DEFAULT '2015',
  `month` varchar(3) NOT NULL,
  `day` int(2) NOT NULL,
  `title` varchar(140) NOT NULL,
  `content` mediumtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `news_date`, `year`, `month`, `day`, `title`, `content`) VALUES
(1, '2015-10-04', 2015, 'OCT', 4, 'news1', 'Go Code5!'),
(3, '2015-11-02', 2015, 'NOV', 2, 'news2', 'Model is the place where actual database logic, alogrith exists for your application. Simply it works with data.'),
(4, '2015-11-03', 2015, 'NOV', 3, 'news3', 'Model is the place where actual database logic, alogrith exists for your application. Simply it works with data.'),
(5, '2015-11-04', 2015, 'NOV', 4, 'news4', 'View is the place where actual User Inteface is specified.\r\n\r\nIn this video, you’ll learn how to create a view in codeigniter and load it into the controller for displaying purpose.'),
(6, '2015-11-05', 2015, 'NOV', 5, 'news5', 'Codeigniter is PHP Framework which built on top of the MVC (Model - View - Controller) design pattern.\r\n\r\nIn this video, you’ll be learning about the MVC and how it is implemented in Codeigniter.'),
(7, '2015-11-08', 2015, 'NOV', 8, 'test', 'wahwahwahawahawhawawah'),
(8, '2015-11-10', 2015, 'NOV', 10, 'news 5', 'fhgfjjnn;m;lm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2020 at 11:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lingoland`
--

-- --------------------------------------------------------

--
-- Table structure for table `flashcards`
--
DROP TABLE `flashcards`;
CREATE TABLE `flashcards` (
  `cardid` int(10) UNSIGNED NOT NULL,
  `duedate` datetime DEFAULT NULL,
  `interval` int(10) NOT NULL,
  `front` varchar(1000) DEFAULT NULL,
  `back` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flashcards`
--

INSERT INTO `flashcards` (`cardid`, `duedate`, `interval`, `front`, `back`) VALUES
(1, '2020-09-15 23:59:00', 10, 'This is the front of the card', 'This is the back of the card'),
(2, '2020-10-31 12:59:00', 1, 'This is the front of another card', 'This is the back of another card'),
(3, '2120-10-31 12:59:00', 1000, 'This is the front of a card that should never be shown', 'This is the back of a card that should never be shown'),
(4, '2000-04-15 23:59:00', 10, 'This is the front of a card that is very overdue', 'This is the back of a card that is very overdue');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flashcards`
--
ALTER TABLE `flashcards`
  ADD PRIMARY KEY (`cardid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flashcards`
--
ALTER TABLE `flashcards`
  MODIFY `cardid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

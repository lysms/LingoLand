-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 03:00 PM
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
-- Table structure for table `auth`
--
DROP TABLE `flashcards`;
DROP TABLE `auth`;

CREATE TABLE `auth` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `username`, `password`, `firstname`, `lastname`, `language`) VALUES
(1, 'lingoland', '123456', 'Ling', 'Go', ''),
(7, 'lsmsms', '12345', 'yan', 'gda', 'chinese');

-- --------------------------------------------------------

--
-- Table structure for table `flashcards`
--

CREATE TABLE `flashcards` (
  `cardid` int(10) UNSIGNED NOT NULL,
  `duedate` datetime DEFAULT NULL,
  `interval` int(10) NOT NULL,
  `easefactor` int(10) UNSIGNED NOT NULL DEFAULT 250,
  `front` varchar(1000) DEFAULT NULL,
  `back` varchar(1000) DEFAULT NULL,
  `userID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flashcards`
--

INSERT INTO `flashcards` (`cardid`, `duedate`, `interval`, `easefactor`, `front`, `back`, `userID`) VALUES
(1, '2020-11-22 14:55:12', 0, 240, 'This is the front of the card', 'This is the back of the card', 1),
(2, '2020-10-31 12:59:00', 1, 250, 'This is the front of another card', 'This is the back of another card', 1),
(3, '2120-10-31 12:59:00', 1000, 250, 'This is the front of a card that should never be shown', 'This is the back of a card that should never be shown', 1),
(4, '2020-11-22 14:55:06', 0, 240, 'This is the front of a card that is very overdue', 'This is the back of a card that is very overdue', 1),
(5, '2020-11-22 14:55:06', 3, 250, 'This is the front of a card for user 7', 'This is the back of a card for user 7', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flashcards`
--
ALTER TABLE `flashcards`
  ADD PRIMARY KEY (`cardid`),
  ADD KEY `userCheck` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `flashcards`
--
ALTER TABLE `flashcards`
  MODIFY `cardid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flashcards`
--
ALTER TABLE `flashcards`
  ADD CONSTRAINT `userCheck` FOREIGN KEY (`userID`) REFERENCES `auth` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

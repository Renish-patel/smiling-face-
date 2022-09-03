-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2020 at 06:16 PM
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
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `fullname`, `email`, `password`) VALUES
(1, 'savan', 'vekariyahemang2000@gmail.com', '$2y$10$8mHaiY6Ud./SVEmNnUyfGeSOvgkFqeo0o6ccF58YVHHqzCb8jNVxm'),
(2, 'Savan ', 'savan9033@gmail.com', '$2y$10$lmCfIGDq5g8BIjzTSre6v.3qBnb7oirK5UNdBqiACCkM38xJBslW2'),
(3, 'Savan Mendapara', 'savan90333@gmail.com', '$2y$10$jqchJUOixIDrY/pQyTBZTu5xKbYdE8IINjUB0Qi159g3A6POunVJe'),
(4, 'savanmendapara', '123@gmail.com', '$2y$10$kngzwq9B6Li/cFShQRSHxuUGYGHz9E4a3./.bQiKZ3D0JS2RBcAlW'),
(5, 'abcd', '1234@gmail.com', '$2y$10$8e9lHTGFmeFDKl7mnqwrBuK2nBOmMvC2Yib8Z7Y.HtR2s6BAgiWVu'),
(6, 'Harsh ', 'harsh@gmail.com', '$2y$10$vFAhcEl5RX/6vlIJv3ST2.9kxDCkoYgXRvpyqI3ByzbIoOwrHqu8C'),
(7, 'hemang', 'vekariyahemang2361@gmail.com', '$2y$10$boIO27y5uLpfMgUWXn42kOCkkqUdbYHaF7wyB2E/6CWcO1EFkLtv2'),
(8, 'gunjan paladiya', 'gunjan@gmail.com', '$2y$10$V8NYGeCQY8zDLpL2fCNE3OMhZmUwBtmkzasiyyfvU1EXY7XoEeErG');

-- --------------------------------------------------------

--
-- Table structure for table `donate`
--

CREATE TABLE `donate` (
  `id` int(11) NOT NULL,
  `itemname` varchar(50) NOT NULL,
  `types` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `starttime` date NOT NULL,
  `endtime` date NOT NULL,
  `time` time NOT NULL,
  `address` varchar(100) NOT NULL,
  `pincode` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donate`
--

INSERT INTO `donate` (`id`, `itemname`, `types`, `description`, `starttime`, `endtime`, `time`, `address`, `pincode`) VALUES
(13, 'Gujrati dish', 'Food', '4 person ', '2020-03-27', '2020-03-28', '02:47:00', '13 Green Park Soc', 395006);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `donate` varchar(100) NOT NULL,
  `types` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contect` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `donate`, `types`, `username`, `email`, `contect`) VALUES
(1, 'Gujrati', 'Food', 'savan mendapara', 'savan2412mmm@gmail.coms', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donate`
--
ALTER TABLE `donate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `donate`
--
ALTER TABLE `donate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

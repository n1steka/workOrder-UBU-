-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 10:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `order`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `boss`
--

CREATE TABLE `boss` (
  `boss_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boss`
--

INSERT INTO `boss` (`boss_id`, `username`, `password`) VALUES
(1, 'boss', 'boss');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` char(8) NOT NULL,
  `username` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `username`, `lastname`, `phone`, `email`, `password`, `gender`) VALUES
('pc20d038', 'bataa', 'asd', '99048576', 'mongolzkarigun@gmail.com', 'asd', 'Эрэгтэй'),
('aj20d038', 'Usukhjargal', 'gantur', '+1 (847) 992-3243', 'vefyburino@mailinator.com', 'asd', 'Эрэгтэй'),
('aj23d033', 'lyleruni', 'ganaa', '+1 (945) 325-9945', 'narez@mailinator.com', 'Pa$$w0rd!', 'Эрэгтэй');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `file`) VALUES
(1, 'IMG-644e99a1dfe272.91523297.jpg'),
(2, 'IMG-644e9a15c65601.43055470.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` char(8) NOT NULL,
  `username` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(125) NOT NULL,
  `password` varchar(45) NOT NULL,
  `gender` char(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `lastname`, `phone`, `email`, `password`, `gender`) VALUES
('ba20d038', 'бизнес удирдлага', 'Norman', 1, 'fotutobut@mailinator.com', 'asd', 'Эрэгтэй'),
('pc20d038', 'Компьютер мэдээлэл технологи', 'munkherdene', 95598999, 'munkherdene.ts@ulaanbaatar.edu.mn', 'asd', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `workorder`
--

CREATE TABLE `workorder` (
  `order_id` int(11) NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `doneDate` varchar(255) DEFAULT NULL,
  `item` varchar(150) NOT NULL,
  `roomNumber` varchar(100) DEFAULT NULL,
  `problem` text NOT NULL,
  `userID` char(8) NOT NULL,
  `dataStatusId` int(1) DEFAULT NULL,
  `money_order` int(11) DEFAULT NULL,
  `file` text DEFAULT NULL,
  `orderStatus` int(1) DEFAULT NULL,
  `employee_id` char(10) DEFAULT NULL,
  `checkStatus` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `workorder`
--

INSERT INTO `workorder` (`order_id`, `orderDate`, `doneDate`, `item`, `roomNumber`, `problem`, `userID`, `dataStatusId`, `money_order`, `file`, `orderStatus`, `employee_id`, `checkStatus`) VALUES
(85, '2023-04-27 17:03:55', '04/27/2023 04:51:50', 'ййбыбйы', 'adsasdads', 'adsdasasd', 'pc20d038', 1, 125500, NULL, 1, 'pc20d038', 2),
(86, '2023-04-27 17:04:01', 'asd', 'asd', 'asd', 'dsa', 'ba20d038', 1, NULL, NULL, NULL, 'pc20d038', 2),
(92, '2023-04-30 17:27:36', NULL, 'asd', 'xD308', 'asdxD', 'pc20d038', 0, NULL, NULL, NULL, 'pc20d038', 0),
(93, '2023-04-30 20:11:03', '', 'xD', 'xD309', 'sda', 'ba20d038', NULL, 2222222, 'images/nature-3082832__340.jpg', NULL, 'pc20d038', NULL),
(95, '2023-04-30 17:30:03', NULL, 'asd', 'asdasd123123', 'asdasdas', 'pc20d038', 1, NULL, NULL, NULL, '', 0),
(96, '2023-04-30 19:10:27', '', 'ddas', 'dsa', 'ads', 'ba20d038', NULL, 2222, 'images/nature-3082832__340.jpg', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `boss`
--
ALTER TABLE `boss`
  ADD PRIMARY KEY (`boss_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);
ALTER TABLE `users` ADD FULLTEXT KEY `user_id_2` (`user_id`);

--
-- Indexes for table `workorder`
--
ALTER TABLE `workorder`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `userID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `boss`
--
ALTER TABLE `boss`
  MODIFY `boss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `workorder`
--
ALTER TABLE `workorder`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `workorder`
--
ALTER TABLE `workorder`
  ADD CONSTRAINT `workorder_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

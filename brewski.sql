-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 12, 2024 at 11:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brewski`
--

-- --------------------------------------------------------

--
-- Table structure for table `Inventory`
--

CREATE TABLE `Inventory` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `item` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Inventory`
--

INSERT INTO `Inventory` (`id`, `vendor_id`, `item`) VALUES
(13, 3, 'Soup'),
(14, 4, 'Soda cream pop');

-- --------------------------------------------------------

--
-- Table structure for table `Pub`
--

CREATE TABLE `Pub` (
  `id` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `pubname` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Pub`
--

INSERT INTO `Pub` (`id`, `rid`, `pubname`, `city`, `email`, `passwd`) VALUES
(3, 2, 'DranksDrunk', 'Accra', 'drank@gmail.com', '$2y$10$F5.9C9YN7yzo01sLjbV2le9h0BDSqVaojiubQFSEsNFMgw3QcYxsC'),
(4, 2, 'Bourbon', 'Kumasi', 'bourbon@gmail.com', '$2y$10$25gHCPO/ZqeIRVY1QbdFsuF5Zk9lmV.06IIdLXHDPbdnm9FHJI4Du'),
(5, 2, 'Tipsy Toucan', 'Accra', 'tipsytoucan@gmail.com', '$2y$10$BveorFzvtY/bS16mUMcsb.xCsR08E8cFFVddlhsDQPG/mxv0tjIjy');

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE `Role` (
  `rid` int(11) NOT NULL,
  `rname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`rid`, `rname`) VALUES
(1, 'admin'),
(2, 'vendor'),
(3, 'regular');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `rid`, `fname`, `lname`, `email`, `passwd`) VALUES
(6, 3, 'Kelvin', 'james', 'kelvin@gmail.com', '$2y$10$pF3hFet1w0xSyZp2ZwSJouSDkUaXPeQ.88oxZ3Dcx5OvaW72ZnDyO'),
(7, 3, 'Kevin', 'Coleman', 'kevin@gmail.com', '$2y$10$MsUiK0x6acdgXCqUJMc3dOy5AtvRn.ntaPCr7nTkWqIMTNbh/1OL.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Inventory`
--
ALTER TABLE `Inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `Pub`
--
ALTER TABLE `Pub`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rid` (`rid`);

--
-- Indexes for table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rid` (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Inventory`
--
ALTER TABLE `Inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `Pub`
--
ALTER TABLE `Pub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Inventory`
--
ALTER TABLE `Inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `Pub` (`id`);

--
-- Constraints for table `Pub`
--
ALTER TABLE `Pub`
  ADD CONSTRAINT `pub_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `Role` (`rid`);

--
-- Constraints for table `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `Role` (`rid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

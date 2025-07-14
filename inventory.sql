-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2023 at 12:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_detail`
--

CREATE TABLE `company_detail` (
  `id` int(10) NOT NULL,
  `name_Full` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `shoes_Brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_detail`
--

INSERT INTO `company_detail` (`id`, `name_Full`, `city`, `shoes_Brand`) VALUES
(4, 'END', 'LONDON', 'JORDAN 5 UNC BLUE US6'),
(5, 'NIKE STORE', 'LONDON', 'JORDAN 1 TAXI US10'),
(6, 'NIKE ONLINE ', 'FRANCE', 'JORDAN 5 CHICAGO US5'),
(7, 'SIZE?', 'TEXAS', 'JORDAN 3 FIRE RED US4'),
(8, 'COOL KICKS LA', 'CALIFORNIA', 'JORDAN 1 LOW X DIOR US7');

-- --------------------------------------------------------

--
-- Table structure for table `item_detail`
--

CREATE TABLE `item_detail` (
  `id` int(10) NOT NULL,
  `item_Name` varchar(255) NOT NULL,
  `unit_Price` varchar(255) NOT NULL,
  `total_Stock` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_detail`
--

INSERT INTO `item_detail` (`id`, `item_Name`, `unit_Price`, `total_Stock`) VALUES
(37, 'AIR JORDAN 1 RETRO HIGH OG TRUE BLUE US13', '180', '2'),
(38, 'NIKE DUNK LOW NEXT NATURE WHITE MINT WOMENS US4.5', '99', '6'),
(39, 'NIKE DUNK LOW GREY FOG US8', '99', '1'),
(40, 'NIKE DUNK LOW ROSE WHISPER WOMENS US9', '99', '10'),
(41, 'NIKE AIR MAX 95 SP X CORTEIZ RULES THE WORLD US12', '195', '2'),
(42, 'NIKE SB DUNK LOW X FLY STREETWEAR BLUE US5.5', '110', '6'),
(43, 'AIR JORDAN 1 MID DARK TEAL GREEN WOMENS US6', '77', '3'),
(44, 'AIR JORDAN 4 MILITARY BLACK US12', '210', '8'),
(45, 'JORDAN 5 UNC OFF-WHITE US10', '240', '1');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `id` int(10) NOT NULL,
  `item_Name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `unit_Price` varchar(255) NOT NULL,
  `purchase_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_detail`
--

INSERT INTO `purchase_detail` (`id`, `item_Name`, `quantity`, `unit_Price`, `purchase_Date`) VALUES
(3, 'Jordan 4 Military Blue US9', '2', '260', '2023-04-20'),
(4, 'NIKE SB DUNK SKATE LIKE A GIRL US10', '3', '225', '2023-04-23'),
(5, 'YEEZY SLIDE ONYX US14', '1', '90', '2021-04-25'),
(6, 'YEEZY SLIDE BONE US4', '1', '60', '2021-08-14'),
(7, 'JORDAN 3 PINE GREEN US8', '4', '210', '2023-04-18'),
(8, 'JORDAN 4 PHONTON DUST US11', '9', '210', '2023-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `sale_detail`
--

CREATE TABLE `sale_detail` (
  `id` int(10) NOT NULL,
  `item_Id` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `unit_Price` varchar(255) NOT NULL,
  `sale_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale_detail`
--

INSERT INTO `sale_detail` (`id`, `item_Id`, `quantity`, `unit_Price`, `sale_Date`) VALUES
(4, '41', '1', '325', '2023-02-18'),
(5, '38', '1', '490', '2022-01-23'),
(6, '45', '1', '230', '2023-01-02'),
(7, '44', '2', '547', '2021-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `sign_in`
--

CREATE TABLE `sign_in` (
  `id` int(10) NOT NULL,
  `user_Name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sign_in`
--

INSERT INTO `sign_in` (`id`, `user_Name`, `email`, `password`) VALUES
(33, 'tester', 'tester@gmail.com', 'e563195894b0f42c245148624e592610e2abf328');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_detail`
--
ALTER TABLE `company_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_detail`
--
ALTER TABLE `item_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_detail`
--
ALTER TABLE `sale_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_in`
--
ALTER TABLE `sign_in`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_detail`
--
ALTER TABLE `company_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `item_detail`
--
ALTER TABLE `item_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sale_detail`
--
ALTER TABLE `sale_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sign_in`
--
ALTER TABLE `sign_in`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

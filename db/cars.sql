-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2023 at 09:07 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cars`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_details`
--

CREATE TABLE `car_details` (
  `id` int(11) NOT NULL,
  `Company` varchar(255) NOT NULL,
  `Model` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `ARAI_Mileage` varchar(255) NOT NULL,
  `Fuel_type` varchar(255) NOT NULL,
  `Body_Type` varchar(255) NOT NULL,
  `Seating_Capacity` varchar(255) NOT NULL,
  `Fuel_Tank_Capacity` varchar(255) NOT NULL,
  `Engine_Displacement` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Max_Power` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_details`
--

INSERT INTO `car_details` (`id`, `Company`, `Model`, `Image`, `Description`, `ARAI_Mileage`, `Fuel_type`, `Body_Type`, `Seating_Capacity`, `Fuel_Tank_Capacity`, `Engine_Displacement`, `Price`, `Max_Power`) VALUES
(1, 'Hyundai', 'Hyundai Alcazar', 'Hyundai_alcazar.png', 'The Hyundai Alcazar is a compact crossover SUV with three-row seating produced by the South Korean manufacturer Hyundai in India. Introduced in April 2021.', '20.4 kmpl', 'Diesel/Petrol', 'SUV', '6,7', '50.0', '1493 cc - 1999 cc', '1,17,000.00', 'Rs. 16.71 Lakh*'),
(2, 'Hyundai', 'Hyundai i20', 'Hyundai_i20.png', 'Hyundai i20 price starts at ₹ 7.19 Lakh and goes up to ₹ 11.83 Lakh (Avg. ex-showroom). i20 comes in 19 variants. i20 top model price in petrol is ₹ 11.83 Lakh. i20 base model price in diesel is ₹ 8.43 Lakh.', '20.28 kmpl', 'Petrol/Deisel', 'Hatchback', '5', '37.0', '998 cc - 1493 cc', 'Rs.7.19 - 11.83 Lakh*', '81.86 - 118.36 Bhp'),
(21, 'Hyundai', 'Hyundai Santro', 'Hyundai_santro.png', 'nnn', '20.3 kmpl', 'Petrol/Diesel', 'Hatchback', '5', '35.0', '1086 cc - 999 cc', 'Rs. 2.72 - 6.45 Lakh*', ' 68 bhp'),
(24, 'Kia', 'Kia Seltos', 'kia_Seltos.png', 'nnn', '20.8 kmpl', 'Petrol/Diesel', 'SUV', '5', '50.0', '1493 cc', 'Rs.10.69 - 19.15 Lakh*', '113.43 bhp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_details`
--
ALTER TABLE `car_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_details`
--
ALTER TABLE `car_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

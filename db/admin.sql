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
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `Company` varchar(255) NOT NULL,
  `Model` varchar(255) NOT NULL,
  `Variant` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Year` varchar(255) NOT NULL,
  `Month` varchar(255) NOT NULL,
  `No_of_Owners` varchar(255) NOT NULL,
  `Color` varchar(255) NOT NULL,
  `Fuel_Type` varchar(255) NOT NULL,
  `Transmission` varchar(255) NOT NULL,
  `Insurrance_Type` varchar(255) NOT NULL,
  `Registration_Place` varchar(255) NOT NULL,
  `Number_Plate` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `KM_Driven` varchar(255) NOT NULL,
  `Engine_Capacity` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Comfort` varchar(255) NOT NULL,
  `Air_Conditioning` varchar(255) NOT NULL,
  `Power_Windows` varchar(255) NOT NULL,
  `Exteriors` varchar(255) NOT NULL,
  `External_Mirror` varchar(255) NOT NULL,
  `Interiors` varchar(255) NOT NULL,
  `Safety` varchar(255) NOT NULL,
  `Lock_System` varchar(255) NOT NULL,
  `NO_Of_Airbags` varchar(255) NOT NULL,
  `Battery_Condition` varchar(255) NOT NULL,
  `Tyre_Condition` varchar(255) NOT NULL,
  `Vehicle_Certified` varchar(255) NOT NULL,
  `Accidental` varchar(255) NOT NULL,
  `Service_History` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Services_Offered` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `Company`, `Model`, `Variant`, `Image`, `Year`, `Month`, `No_of_Owners`, `Color`, `Fuel_Type`, `Transmission`, `Insurrance_Type`, `Registration_Place`, `Number_Plate`, `Price`, `KM_Driven`, `Engine_Capacity`, `Address`, `Comfort`, `Air_Conditioning`, `Power_Windows`, `Exteriors`, `External_Mirror`, `Interiors`, `Safety`, `Lock_System`, `NO_Of_Airbags`, `Battery_Condition`, `Tyre_Condition`, `Vehicle_Certified`, `Accidental`, `Service_History`, `Description`, `Services_Offered`) VALUES
(1, 'Hyundai', 'i10', 'x1', 'hyundai.jpg', '2023', 'Feb', '2', 'Grey', 'DK', 'DK', 'DK', 'DK', 'xx xx 2134', '1100000', '10 KM', '', 'xxxxxxx', 'Navigation System , Crime Control', 'yes', 'yes', 'Alloy_Wheels', 'yes', 'Bluetooth , USB Compatibility', 'Rear Parking Camera , Parking Sensors', 'yes', '2', 'GOOD', 'GOOD', 'GOOD', 'GOOD', 'GOOD', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', 'Finance , Exchange');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

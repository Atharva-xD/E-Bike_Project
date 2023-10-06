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
-- Database: `ev`
--

-- --------------------------------------------------------

--
-- Table structure for table `bike_details`
--

CREATE TABLE `bike_details` (
  `id` int(11) NOT NULL,
  `Company` varchar(255) NOT NULL,
  `Model` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Riding_Range` varchar(255) NOT NULL,
  `Top_Speed` varchar(255) NOT NULL,
  `Weight` varchar(255) NOT NULL,
  `Battery_Charging_Time` varchar(255) NOT NULL,
  `Rated_Power` varchar(255) NOT NULL,
  `Seat_Height` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bike_details`
--

INSERT INTO `bike_details` (`id`, `Company`, `Model`, `Image`, `Description`, `Riding_Range`, `Top_Speed`, `Weight`, `Battery_Charging_Time`, `Rated_Power`, `Seat_Height`, `Price`) VALUES
(1, 'Ather', 'Ather_450X', 'images/Ather1.jpg', 'The high-performance super scooter Ather 450X features a powerful 6KW motor and advanced Lithium-ion battery with superfast charging.', '146 KM', '80 kmph', '111.6 Kg', '5 Hours 40 Minutes', '6200 W', '780 MM', '1,17,000.00'),
(2, 'Hero', 'Hero_Eddy', 'images/Hero_Eddy.png', 'Hero Electric Eddy is the brand’s most affordable slow-speed electric scooter. It’s available in two colors: yellow and blue.', '85 Km', '25 Kmph', '60 Kg', '5 Hours', '250 W', '-', '72,000.00'),
(3, 'TVS', 'TVS_IQube', 'Images/TVS-IQUBE.png', 'It is available in 2 variants and 7 colors.TVS iQube generates 3000 W power from its motor. TVS iQube comes up with front disc and rear drum brakes.', '100 KM', '78 Km/h', '117 Kg', '4 Hours 30 Minute', '3000 W', '770 MM', '96,510.00'),
(4, 'Bajaj', 'Bajaj_Chetak', 'images/Bajaj-Chetak.jpg', 'The Bajaj Chetak is powered by a 4080-watt BLDC Motor. The Bajaj Chetak takes 5 Hours to get fully charged its  battery and has a claimed range of 80 km/charge. It is available in one variant, Premium.', '95 Km', '63 Kmph', '132 Kg', '5 Hours', '4080 W', '745 MM', '1,52,000.00'),
(5, 'Revolt', 'Revolt_RV400', 'images/Revolt_Rv400.png', 'Revolt Motors provides a warranty on Battery for 6 years or 1,00,000 Kilometres, whichever occurs first, and on the Charger for 2 years only, from the date of purchase.', '150 KM', '85 KM/H', '108 Kg', '4 Hours 30 Minutes', '3000 W', '814 MM', '1,25,000.00'),
(6, 'Hero', 'Hero_Electric_Photon_LP', 'images/Hero_Electric_Photon_LP.png', 'The Hero Photon is the EV maker’s flagship electric scooter capable of reaching a top speed of over 45kmph. It is sold under the brand’s ‘City Speed’ range, which essentially encompasses all of its high-speed electric scooters.', '108 KM', '45 KM/H', '87 Kg', '5 Hours', '1200 W', '768 MM', '80,790.00');

-- --------------------------------------------------------

--
-- Table structure for table `book_now`
--

CREATE TABLE `book_now` (
  `id` int(11) NOT NULL,
  `Name1` varchar(255) NOT NULL,
  `Number1` varchar(10) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `razorpay_payment_id` varchar(255) NOT NULL,
  `Company` varchar(255) NOT NULL,
  `Color` varchar(255) NOT NULL,
  `Model` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_now`
--

INSERT INTO `book_now` (`id`, `Name1`, `Number1`, `order_id`, `razorpay_payment_id`, `Company`, `Color`, `Model`) VALUES
(16, 'Atharva Kalange', '9930465922', 'order_Kc1aruTCAwcJSG', 'pay_Kc1b0xJkbdGcUN', 'Ather', 'Black', 'Ather_450X');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Number1` varchar(10) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `Name`, `Username`, `Email`, `Number1`, `Password`) VALUES
(4, 'Sid Pawar', 'Sid', 'Sidhhinath@gmail.com', '8104771622', '123'),
(5, 'Atharva Kalange', 'Atharva', 'atharvakalange29@gmail.com', '9930465922', '123'),
(6, 'Atharva', 'Atom1x', 'atharva@gmail.com', '1234567892', '123');

-- --------------------------------------------------------

--
-- Table structure for table `test_ride`
--

CREATE TABLE `test_ride` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Number1` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `State1` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Day1` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_ride`
--

INSERT INTO `test_ride` (`id`, `FirstName`, `LastName`, `Number1`, `Email`, `Model`, `State1`, `City`, `Day1`) VALUES
(18, 'Atharva', 'Kalange', '8104771622', 'atharvakalange29@gmail.com', 'Ather_450X', 'Maharashtra', 'Thane', '20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bike_details`
--
ALTER TABLE `bike_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_now`
--
ALTER TABLE `book_now`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_ride`
--
ALTER TABLE `test_ride`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `number` (`Number1`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bike_details`
--
ALTER TABLE `bike_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `book_now`
--
ALTER TABLE `book_now`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `test_ride`
--
ALTER TABLE `test_ride`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2022 at 02:34 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `analyticsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `age_distribution`
--

CREATE TABLE `age_distribution` (
  `id` int(5) NOT NULL,
  `Year` int(5) NOT NULL,
  `Age` varchar(20) NOT NULL,
  `Total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `age_distribution`
--

INSERT INTO `age_distribution` (`id`, `Year`, `Age`, `Total`) VALUES
(1, 2000, '0-14', 70871),
(2, 2000, '15-18', 19921),
(3, 2000, '19-30', 38724),
(4, 2000, '31-60', 63503),
(5, 2000, '61-above', 8167),
(6, 2007, '0-14', 16690),
(7, 2007, '15-18', 5070),
(8, 2007, '19-30', 9456),
(9, 2007, '31-60', 16738),
(10, 2007, '61-above', 2802),
(11, 2010, '0-14', 83079),
(12, 2010, '15-18', 26858),
(13, 2010, '19-30', 54615),
(14, 2010, '31-60', 86656),
(15, 2010, '61-above', 11374),
(16, 2015, '0-14', 92862),
(17, 2015, '15-18', 32008),
(18, 2015, '19-30', 71521),
(19, 2015, '31-60', 98225),
(20, 2015, '61-above', 18431);

-- --------------------------------------------------------

--
-- Table structure for table `barangay_population`
--

CREATE TABLE `barangay_population` (
  `id` int(5) NOT NULL,
  `Year` int(5) NOT NULL,
  `Barangay` varchar(30) NOT NULL,
  `Total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barangay_population`
--

INSERT INTO `barangay_population` (`id`, `Year`, `Barangay`, `Total`) VALUES
(1, 2000, 'Binan', 43231),
(2, 2000, 'Bungahan', 8763),
(3, 2000, 'Canlalay', 18471),
(4, 2000, 'Casile', 24922),
(5, 2000, 'De La Paz', 24650),
(6, 2000, 'Ganado', 23811),
(7, 2000, 'Langkiwa', 17711),
(8, 2000, 'Loma', 16011),
(9, 2000, 'Malaban', 28024),
(10, 2000, 'Malamig', 10891),
(11, 2000, 'Mampalasan', 26811),
(12, 2000, 'Platero', 9287),
(13, 2000, 'Poblacion', 28421),
(14, 2000, 'San Antonio', 18192),
(15, 2000, 'San Francisco', 19097),
(16, 2000, 'San Jose', 9689),
(17, 2000, 'San Vicente', 10205),
(18, 2000, 'Sto. Domingo', 46601),
(19, 2000, 'Santo Nino', 49351),
(20, 2000, 'Santo Tomas', 30113),
(21, 2000, 'Soro soro', 14837),
(22, 2000, 'Timbao', 41837),
(23, 2000, 'Tubigan', 14217),
(24, 2000, 'Zapote', 12807),
(25, 2007, 'Binan', 31099),
(26, 2007, 'Bungahan', 18148),
(27, 2007, 'Canlalay', 19622),
(28, 2007, 'Casile', 35861),
(29, 2007, 'De La Paz', 31304),
(30, 2007, 'Ganado', 35183),
(31, 2007, 'Langkiwa', 27131),
(32, 2007, 'Loma', 6980),
(33, 2007, 'Malaban', 30636),
(34, 2007, 'Malamig', 28531),
(35, 2007, 'Mampalasan', 53741),
(36, 2007, 'Platero', 12866),
(37, 2007, 'Poblacion', 30311),
(38, 2007, 'San Antonio', 30468),
(39, 2007, 'San Francisco', 20324),
(40, 2007, 'San Jose', 9082),
(41, 2007, 'San Vicente', 11339),
(42, 2007, 'Sto. Domingo', 9548),
(43, 2007, 'Santo Nino', 9892),
(44, 2007, 'Santo Tomas', 39370),
(45, 2007, 'Soro soro', 9595),
(46, 2007, 'Timbao', 34971),
(47, 2007, 'Tubigan', 9331),
(48, 2007, 'Zapote', 18591),
(49, 2010, 'Binan', 37501),
(50, 2010, 'Bungahan', 17091),
(51, 2010, 'Canlalay', 19238),
(52, 2010, 'Casile', 34271),
(53, 2010, 'De La Paz', 29568),
(54, 2010, 'Ganado', 3952),
(55, 2010, 'Langkiwa', 25709),
(56, 2010, 'Loma', 6769),
(57, 2010, 'Malaban', 28550),
(58, 2010, 'Malamig', 29291),
(59, 2010, 'Mampalasan', 6086),
(60, 2010, 'Platero', 11428),
(61, 2010, 'Poblacion', 36401),
(62, 2010, 'San Antonio', 23067),
(63, 2010, 'San Francisco', 23429),
(64, 2010, 'San Jose', 8839),
(65, 2010, 'San Vicente', 8762),
(66, 2010, 'Sto. Domingo', 9456),
(67, 2010, 'Santo Nino', 9201),
(68, 2010, 'Santo Tomas', 38990),
(69, 2010, 'Soro soro', 16708),
(70, 2010, 'Timbao', 18746),
(71, 2010, 'Tubigan', 16416),
(72, 2010, 'Zapote', 24027),
(73, 2015, 'Binan', 24149),
(74, 2015, 'Bungahan', 21707),
(75, 2015, 'Canlalay', 43078),
(76, 2015, 'Casile', 19399),
(77, 2015, 'De La Paz', 14148),
(78, 2015, 'Ganado', 31374),
(79, 2015, 'Langkiwa', 15252),
(80, 2015, 'Loma', 28669),
(81, 2015, 'Malaban', 37817),
(82, 2015, 'Malamig', 12005),
(83, 2015, 'Mampalasan', 26513),
(84, 2015, 'Platero', 4064),
(85, 2015, 'Poblacion', 6911),
(86, 2015, 'San Antonio', 10420),
(87, 2015, 'San Francisco', 22965),
(88, 2015, 'San Jose', 5557),
(89, 2015, 'San Vicente', 35811),
(90, 2015, 'Sto. Domingo', 5977),
(91, 2015, 'Santo Nino', 8530),
(92, 2015, 'Santo Tomas', 6320),
(93, 2015, 'Soro soro', 6104),
(94, 2015, 'Timbao', 13490),
(95, 2015, 'Tubigan', 16741),
(96, 2015, 'Zapote', 16027);

-- --------------------------------------------------------

--
-- Table structure for table `birth_rate`
--

CREATE TABLE `birth_rate` (
  `id` int(5) NOT NULL,
  `Year` int(5) NOT NULL,
  `Total` int(20) NOT NULL,
  `Percentage` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `birth_rate`
--

INSERT INTO `birth_rate` (`id`, `Year`, `Total`, `Percentage`) VALUES
(1, 2000, 4488, 2),
(2, 2007, 5012, 2),
(3, 2010, 5488, 2),
(4, 2015, 5988, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cause_of_death`
--

CREATE TABLE `cause_of_death` (
  `id` int(5) NOT NULL,
  `Year` int(5) NOT NULL,
  `Cause` varchar(60) NOT NULL,
  `Total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cause_of_death`
--

INSERT INTO `cause_of_death` (`id`, `Year`, `Cause`, `Total`) VALUES
(1, 2000, 'Diseases of the circulatory system', 17),
(2, 2000, 'Ischaemic heart diseases', 16),
(3, 2000, 'Diseases of the respiratory system', 13),
(4, 2000, 'Neoplasms', 9),
(5, 2000, 'Cerebrovascular diseases', 8),
(6, 2000, ' Endocrine, nutritional', 7),
(7, 2000, 'Cerebrosvascular diseases', 5),
(8, 2000, 'Pneumonia', 4),
(9, 2000, 'Hypertensive diseases', 4),
(10, 2000, 'Diabetes Mellitus', 3),
(11, 2000, 'Diseases of the Heart', 2),
(12, 2000, 'Diseases of the Vascular System', 1),
(13, 2000, 'Malignant Neoplasms', 1),
(14, 2000, 'Accidents', 1),
(15, 2000, 'Tuberculosis, all forms', 1),
(16, 2007, 'Diseases of the circulatory system', 15),
(17, 2007, 'Ischaemic heart diseases', 12),
(18, 2007, 'Diseases of the respiratory system', 2),
(19, 2007, 'Neoplasms', 3),
(20, 2007, 'Cerebrovascular diseases', 8),
(21, 2007, ' Endocrine, nutritional', 8),
(22, 2007, 'Cerebrosvascular diseases', 3),
(23, 2007, 'Pneumonia', 1),
(24, 2007, 'Hypertensive diseases', 5),
(25, 2007, 'Diabetes Mellitus', 5),
(26, 2007, 'Diseases of the Heart', 6),
(27, 2007, 'Diseases of the Vascular System', 2),
(28, 2007, 'Malignant Neoplasms', 1),
(29, 2007, 'Accidents', 1),
(30, 2007, 'Tuberculosis, all forms', 3),
(31, 2010, 'Diseases of the circulatory system', 1054),
(32, 2010, 'Ischaemic heart diseases', 483),
(33, 2010, 'Diseases of the respiratory system', 340),
(34, 2010, 'Neoplasms', 326),
(35, 2010, 'Cerebrovascular diseases', 305),
(36, 2010, ' Endocrine, nutritional', 232),
(37, 2010, 'Cerebrosvascular diseases', 583),
(38, 2010, 'Pneumonia', 495),
(39, 2010, 'Hypertensive diseases', 345),
(40, 2010, 'Diabetes Mellitus', 340),
(41, 2010, 'Diseases of the Heart', 1029),
(42, 2010, 'Diseases of the Vascular System', 685),
(43, 2010, 'Malignant Neoplasms', 498),
(44, 2010, 'Accidents', 363),
(45, 2010, 'Tuberculosis, all forms', 247),
(46, 2015, 'Diseases of the circulatory system', 2156),
(47, 2015, 'Ischaemic heart diseases', 950),
(48, 2015, 'Diseases of the respiratory system', 561),
(49, 2015, 'Neoplasms', 541),
(50, 2015, 'Cerebrovascular diseases', 500),
(51, 2015, ' Endocrine, nutritional', 415),
(52, 2015, 'Cerebrosvascular diseases', 241),
(53, 2015, 'Pneumonia', 228),
(54, 2015, 'Hypertensive diseases', 215),
(55, 2015, 'Diabetes Mellitus', 199),
(56, 2015, 'Diseases of the Heart', 160),
(57, 2015, 'Diseases of the Vascular System', 144),
(58, 2015, 'Malignant Neoplasms', 114),
(59, 2015, 'Accidents', 104),
(60, 2015, 'Tuberculosis, all forms', 103);

-- --------------------------------------------------------

--
-- Table structure for table `death_rate`
--

CREATE TABLE `death_rate` (
  `id` int(5) NOT NULL,
  `Year` int(5) NOT NULL,
  `Total` int(20) NOT NULL,
  `Percentage` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `death_rate`
--

INSERT INTO `death_rate` (`id`, `Year`, `Total`, `Percentage`) VALUES
(1, 2000, 658, 3),
(2, 2007, 960, 4),
(3, 2010, 1360, 5),
(4, 2015, 1232, 5);

-- --------------------------------------------------------

--
-- Table structure for table `marital_status_population`
--

CREATE TABLE `marital_status_population` (
  `id` int(5) NOT NULL,
  `Year` int(5) NOT NULL,
  `Status` varchar(30) NOT NULL,
  `Total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marital_status_population`
--

INSERT INTO `marital_status_population` (`id`, `Year`, `Status`, `Total`) VALUES
(1, 2000, 'Single', 65781),
(2, 2000, 'Married', 70307),
(3, 2000, 'Widowed ', 5507),
(4, 2000, 'Divorced/Separated', 2258),
(5, 2000, 'Common-law/Live-in', 7365),
(6, 2000, 'Unknown', 724),
(7, 2007, 'Single', 91930),
(8, 2007, 'Married', 87037),
(9, 2007, 'Widowed ', 7616),
(10, 2007, 'Divorced/Separated', 3753),
(11, 2007, 'Common-law/Live-in', 14801),
(12, 2007, 'Unknown', 717),
(13, 2010, 'Single', 97308),
(14, 2010, 'Married', 94343),
(15, 2010, 'Widowed ', 8089),
(16, 2010, 'Divorced/Separated', 4183),
(17, 2010, 'Common-law/Live-in', 1996),
(18, 2010, 'Unknown', 620),
(19, 2015, 'Single', 121040),
(20, 2015, 'Married', 96437),
(21, 2015, 'Widowed ', 9967),
(22, 2015, 'Divorced/Separated', 5771),
(23, 2015, 'Common-law/Live-in', 35367),
(24, 2015, 'Unknown', 111);

-- --------------------------------------------------------

--
-- Table structure for table `population_growth_rate`
--

CREATE TABLE `population_growth_rate` (
  `id` int(5) NOT NULL,
  `Year` int(5) NOT NULL,
  `Total` int(20) NOT NULL,
  `Percentage` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `population_growth_rate`
--

INSERT INTO `population_growth_rate` (`id`, `Year`, `Total`, `Percentage`) VALUES
(1, 2010, 363396, 3),
(2, 2015, 373028, 4),
(4, 2000, 417654, 5),
(5, 2007, 424437, 5);

-- --------------------------------------------------------

--
-- Table structure for table `poverty_rate`
--

CREATE TABLE `poverty_rate` (
  `id` int(5) NOT NULL,
  `Year` int(5) NOT NULL,
  `Total` int(20) NOT NULL,
  `Percentage` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poverty_rate`
--

INSERT INTO `poverty_rate` (`id`, `Year`, `Total`, `Percentage`) VALUES
(1, 2000, 14142, 2),
(2, 2007, 21528, 2),
(3, 2010, 24007, 2),
(4, 2015, 29963, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teenage_pregnancy_population`
--

CREATE TABLE `teenage_pregnancy_population` (
  `id` int(5) NOT NULL,
  `Year` int(5) NOT NULL,
  `Total` int(20) NOT NULL,
  `Percentage` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teenage_pregnancy_population`
--

INSERT INTO `teenage_pregnancy_population` (`id`, `Year`, `Total`, `Percentage`) VALUES
(1, 2000, 3984, 1),
(2, 2007, 3014, 1),
(3, 2010, 5603, 1),
(4, 2015, 6401, 1);

-- --------------------------------------------------------

--
-- Table structure for table `total_gender_population`
--

CREATE TABLE `total_gender_population` (
  `id` int(5) NOT NULL,
  `Year` int(5) NOT NULL,
  `Gender` varchar(30) NOT NULL,
  `Total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `total_gender_population`
--

INSERT INTO `total_gender_population` (`id`, `Year`, `Gender`, `Total`) VALUES
(1, 2000, 'Male', 99430),
(2, 2000, 'Female', 101691),
(3, 2007, 'Male', 129934),
(4, 2007, 'Female', 132801),
(5, 2010, 'Male', 140162),
(6, 2010, 'Female', 142885),
(7, 2015, 'Male', 165392),
(8, 2015, 'Female', 166778);

-- --------------------------------------------------------

--
-- Table structure for table `total_household`
--

CREATE TABLE `total_household` (
  `id` int(5) NOT NULL,
  `Year` int(5) NOT NULL,
  `Total` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `total_household`
--

INSERT INTO `total_household` (`id`, `Year`, `Total`) VALUES
(1, 2000, 42307),
(2, 2007, 61680),
(3, 2010, 68816),
(4, 2015, 86752);

-- --------------------------------------------------------

--
-- Table structure for table `total_newborn`
--

CREATE TABLE `total_newborn` (
  `id` int(5) NOT NULL,
  `Year` int(5) NOT NULL,
  `Total` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `total_newborn`
--

INSERT INTO `total_newborn` (`id`, `Year`, `Total`) VALUES
(1, 2000, 5370),
(2, 2007, 6163),
(3, 2010, 6078),
(4, 2015, 6165);

-- --------------------------------------------------------

--
-- Table structure for table `total_population`
--

CREATE TABLE `total_population` (
  `id` int(5) NOT NULL,
  `Year` int(5) NOT NULL,
  `Total` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `total_population`
--

INSERT INTO `total_population` (`id`, `Year`, `Total`) VALUES
(1, 2000, 201186),
(2, 2007, 262735),
(3, 2010, 283396),
(4, 2015, 333028);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `code` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Username`, `Password`, `email`, `Status`, `code`) VALUES
(3, 'Admin', 'admin', 'jmatucad2@gmail.com', 'Admin', 0),
(12, 'matucad', '1128', 'jmatucad@gmail.com', 'User', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `age_distribution`
--
ALTER TABLE `age_distribution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangay_population`
--
ALTER TABLE `barangay_population`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `birth_rate`
--
ALTER TABLE `birth_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cause_of_death`
--
ALTER TABLE `cause_of_death`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `death_rate`
--
ALTER TABLE `death_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marital_status_population`
--
ALTER TABLE `marital_status_population`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `population_growth_rate`
--
ALTER TABLE `population_growth_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poverty_rate`
--
ALTER TABLE `poverty_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teenage_pregnancy_population`
--
ALTER TABLE `teenage_pregnancy_population`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_gender_population`
--
ALTER TABLE `total_gender_population`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_household`
--
ALTER TABLE `total_household`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_newborn`
--
ALTER TABLE `total_newborn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_population`
--
ALTER TABLE `total_population`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `age_distribution`
--
ALTER TABLE `age_distribution`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `barangay_population`
--
ALTER TABLE `barangay_population`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `birth_rate`
--
ALTER TABLE `birth_rate`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cause_of_death`
--
ALTER TABLE `cause_of_death`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `death_rate`
--
ALTER TABLE `death_rate`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `marital_status_population`
--
ALTER TABLE `marital_status_population`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `population_growth_rate`
--
ALTER TABLE `population_growth_rate`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `poverty_rate`
--
ALTER TABLE `poverty_rate`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teenage_pregnancy_population`
--
ALTER TABLE `teenage_pregnancy_population`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `total_gender_population`
--
ALTER TABLE `total_gender_population`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `total_household`
--
ALTER TABLE `total_household`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `total_newborn`
--
ALTER TABLE `total_newborn`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `total_population`
--
ALTER TABLE `total_population`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

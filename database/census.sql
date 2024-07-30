-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2024 at 09:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `census`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangay_census`
--

CREATE TABLE `barangay_census` (
  `id` int(11) NOT NULL,
  `house_number` varchar(250) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `barangay` varchar(255) DEFAULT NULL,
  `municipality` enum('madridejos','bantayan','santafe') DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `residence_status` enum('owner','boarder') DEFAULT NULL,
  `length_of_stay` varchar(255) DEFAULT NULL,
  `provincial_address` text DEFAULT NULL,
  `sex` enum('male','female') DEFAULT NULL,
  `civil_status` enum('single','married','widower','separated') DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `place_of_birth` varchar(255) DEFAULT NULL,
  `height` decimal(5,2) DEFAULT NULL,
  `weight` decimal(5,1) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `elementary_school` varchar(255) DEFAULT NULL,
  `elementary_address` varchar(255) DEFAULT NULL,
  `highschool` varchar(255) DEFAULT NULL,
  `highschool_address` varchar(255) DEFAULT NULL,
  `vocational_school` varchar(255) DEFAULT NULL,
  `vocational_address` varchar(255) DEFAULT NULL,
  `college` varchar(255) DEFAULT NULL,
  `college_address` varchar(255) DEFAULT NULL,
  `employment_duration` varchar(255) DEFAULT NULL,
  `employer_name` varchar(255) DEFAULT NULL,
  `employer_address` varchar(255) DEFAULT NULL,
  `occupant_name` varchar(255) DEFAULT NULL,
  `occupant_position` varchar(255) DEFAULT NULL,
  `occupant_age` int(11) DEFAULT NULL,
  `occupant_birth_date` date DEFAULT NULL,
  `occupant_civil_status` enum('single','married','widower','separated') DEFAULT NULL,
  `occupant_occupation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barangay_census`
--

INSERT INTO `barangay_census` (`id`, `house_number`, `last_name`, `first_name`, `middle_name`, `street`, `barangay`, `municipality`, `province`, `residence_status`, `length_of_stay`, `provincial_address`, `sex`, `civil_status`, `date_of_birth`, `place_of_birth`, `height`, `weight`, `contact_number`, `religion`, `elementary_school`, `elementary_address`, `highschool`, `highschool_address`, `vocational_school`, `vocational_address`, `college`, `college_address`, `employment_duration`, `employer_name`, `employer_address`, `occupant_name`, `occupant_position`, `occupant_age`, `occupant_birth_date`, `occupant_civil_status`, `occupant_occupation`) VALUES
(14, '123456', 'awdwd', 'awdadwa', 'awd', 'awdadad', 'adadad', 'bantayan', 'adadadawd', 'boarder', 'adwadadawd', 'adadadad', 'male', 'single', '2024-07-21', 'awdadadawd', 223.00, 9999.9, '352434234234', 'adawdada', 'awdadad', 'adadawa', 'adadawda', 'wdadadad', 'dadada', 'dadawd', 'dadawdada', 'adada', 'adadw', 'dadadad', 'awdadadawd', 'adadadad', 'adadadad', 23, '2024-07-16', 'single', 'awdawdada'),
(15, '2323232', 'adawd', 'adadaw', 'ada', 'adadaw', 'adawd', 'madridejos', 'adadawd', 'owner', 'dadadad', 'dadada', 'female', 'single', '2024-07-03', 'awdadwadaw', 121.00, 31.0, '123123123', 'wadwa', '', '', '', '', '', '', '', '', 'adadawdwa', 'adadada', 'adadadawd', 'adadawdad', 'awdadwad', 12, '2024-07-11', 'single', 'adawdadaw'),
(16, '343434', 'awdada', 'awdadad', 'adadad', 'adadawd', 'awdadawdaawd', 'santafe', 'adadad', 'owner', 'adadawdad', 'awdadadawd', 'male', 'single', '2024-07-10', 'adadawdawd', 213.00, 72.0, 'wadadawdaw', 'awdadawdawd', 'awdadawd', 'adad', 'wdawdad', 'adada', 'adawdaw', 'dadawd', 'wdad', 'awdawda', 'awdadawd', 'awdadwad', 'awdadwad', 'adadawd', 'awdawdada', 21, '2024-07-24', 'single', 'awdadadawd'),
(17, '55234234', 'Jubay', 'John Rey', 'N/A', 'adadaw', 'mancilang', 'madridejos', 'cebu', 'owner', 'none', 'dawdadawd', 'male', 'single', '2024-07-18', 'adadawdawd', 213.00, 414.0, '09382296605', 'awdadadw', 'awdadadw', 'adadawdawd', 'awdadawd', 'adadwdawd', 'awdadad', 'adawdawda', 'adadawd', 'adadad', 'adawdd', 'adadawd', 'adadwada', 'awdadawd', 'adadwadawd', 12, '2024-07-03', 'single', 'awdadadawd'),
(18, '111', 'batasinin', 'mark', 'servas', 'Purok Rose , Tarong Madridejos, Cebu', 'Tarong', 'madridejos', 'cebu', 'owner', 'asd', 'Purok Rose , Tarong Madridejos, Cebu', 'male', 'single', '2024-07-02', 'asdasd', 0.08, 0.7, '09668049106', '', 'sdss', 'dsfgd', 'fdgdggd', 'fdgdgfg', 'fddgdVHVH', 'YGYGGYG', 'VBVBB', 'Buu', 'uhuh', 'hhihih', 'hhihihi', 'iiibibib', 'bubbib', 1111, '2024-07-01', 'single', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `census_data`
--

CREATE TABLE `census_data` (
  `id` int(11) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `barangay` varchar(50) DEFAULT NULL,
  `municipality` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `residence_status` varchar(20) DEFAULT NULL,
  `length_of_stay` varchar(50) DEFAULT NULL,
  `provincial_address` text DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `civil_status` varchar(20) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `place_of_birth` varchar(100) DEFAULT NULL,
  `height` decimal(5,2) DEFAULT NULL,
  `weight` decimal(5,2) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `elementary_school` varchar(100) DEFAULT NULL,
  `elementary_address` varchar(100) DEFAULT NULL,
  `highschool` varchar(100) DEFAULT NULL,
  `highschool_address` varchar(100) DEFAULT NULL,
  `vocational_school` varchar(100) DEFAULT NULL,
  `vocational_address` varchar(100) DEFAULT NULL,
  `college` varchar(100) DEFAULT NULL,
  `college_address` varchar(100) DEFAULT NULL,
  `employment_duration` varchar(50) DEFAULT NULL,
  `employer_name` varchar(100) DEFAULT NULL,
  `employer_address` varchar(100) DEFAULT NULL,
  `occupant_name` varchar(100) DEFAULT NULL,
  `occupant_position` varchar(50) DEFAULT NULL,
  `occupant_age` int(11) DEFAULT NULL,
  `occupant_birth_date` date DEFAULT NULL,
  `occupant_civil_status` varchar(20) DEFAULT NULL,
  `occupant_occupation` varchar(100) DEFAULT NULL,
  `reference_name` varchar(100) DEFAULT NULL,
  `reference_address` varchar(100) DEFAULT NULL,
  `reference_contact` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `start_census` date NOT NULL,
  `end_census` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `municipality`, `start_census`, `end_census`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 'Madridejos', '2024-06-24', '2024-07-24', '08:00:00', '20:38:00', '2024-07-25 01:36:10', '2024-07-25 01:36:10'),
(2, 'Bantayan', '2024-07-09', '2024-07-17', '08:30:00', '12:00:00', '2024-07-27 09:50:22', '2024-07-27 09:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `password`, `municipality`) VALUES
(24, 'John Anthon', 'testing@gmail.com', 'yeah123', 'Santafe'),
(25, 'John Anthon', 'anton@gmail.com', '$2y$10$Ew/OCrQiWVXp/3Ll/yB60egjYwGOtTUKqN5HA/VwFlp1PwHUt1SCS', 'Madridejos'),
(26, 'Mark John', 'mark@gmail.com', '$2y$10$gSDbEPDtIhtQwzZy6Fi4Q.Gg7udd3HxpcmWohOKIxvMqTSLhQQcS2', 'Madridejos');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(1, 'Queenie', 'admin', '$2y$10$nNzwdh5nZZCnR5zQ6TJSC.sO4aXo2PVM8wYfWvW9A6cm9i4FRSmLK'),
(2, 'Johnskie', 'john', '$2y$10$/nwBqOuhozfCjfD2SpCIHOsFfIMnMDwYPHnq1Ez9hl7zUjMkt13le');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangay_census`
--
ALTER TABLE `barangay_census`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `census_data`
--
ALTER TABLE `census_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangay_census`
--
ALTER TABLE `barangay_census`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `census_data`
--
ALTER TABLE `census_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

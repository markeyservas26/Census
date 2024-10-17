-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 11:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `energy_sources`
--

CREATE TABLE `energy_sources` (
  `id` int(11) NOT NULL,
  `house_leader_id` int(11) DEFAULT NULL,
  `electricity` tinyint(1) DEFAULT NULL,
  `kerosene` tinyint(1) DEFAULT NULL,
  `liquefied_petroleum` tinyint(1) DEFAULT NULL,
  `oil` tinyint(1) DEFAULT NULL,
  `solar_panel_lamp` tinyint(1) DEFAULT NULL,
  `candle` tinyint(1) DEFAULT NULL,
  `battery` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `energy_sources`
--

INSERT INTO `energy_sources` (`id`, `house_leader_id`, `electricity`, `kerosene`, `liquefied_petroleum`, `oil`, `solar_panel_lamp`, `candle`, `battery`) VALUES
(75, 118, 1, 1, 1, 1, 1, 1, 1),
(76, 119, 1, 1, 1, 1, 1, 1, 1),
(77, 120, 1, 1, 1, 1, 1, 1, 1),
(78, 121, 1, 1, 1, 1, 1, 1, 1),
(79, 125, 1, 1, 1, 1, 1, 1, 1),
(80, 126, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `financial_accounts`
--

CREATE TABLE `financial_accounts` (
  `id` int(11) NOT NULL,
  `house_leader_id` int(11) DEFAULT NULL,
  `bank_account` tinyint(1) DEFAULT NULL,
  `digital_bank_account` tinyint(1) DEFAULT NULL,
  `emoney_account` tinyint(1) DEFAULT NULL,
  `nssla_account` tinyint(1) DEFAULT NULL,
  `cooperative_account` tinyint(1) DEFAULT NULL,
  `microfinance_ngo_account` tinyint(1) DEFAULT NULL,
  `remittance_center_account` tinyint(1) DEFAULT NULL,
  `prefer_not_answer` tinyint(1) DEFAULT NULL,
  `none` tinyint(1) DEFAULT NULL,
  `other` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `financial_accounts`
--

INSERT INTO `financial_accounts` (`id`, `house_leader_id`, `bank_account`, `digital_bank_account`, `emoney_account`, `nssla_account`, `cooperative_account`, `microfinance_ngo_account`, `remittance_center_account`, `prefer_not_answer`, `none`, `other`) VALUES
(106, 114, 1, 1, 1, 1, 1, 1, 1, 1, 1, ''),
(107, 115, 1, 1, 1, 1, 1, 1, 1, 1, 1, ''),
(108, 116, 1, 1, 1, 1, 1, 1, 1, 1, 1, ''),
(109, 117, 1, 1, 1, 1, 1, 1, 1, 1, 1, ''),
(110, 118, 1, 1, 1, 1, 1, 1, 1, 1, 1, ''),
(111, 119, 1, 1, 1, 1, 1, 1, 1, 1, 1, ''),
(112, 120, 1, 1, 1, 1, 1, 1, 1, 1, 1, ''),
(113, 121, 1, 1, 1, 1, 1, 1, 1, 1, 1, ''),
(114, 122, 1, 1, 1, 1, 1, 1, 1, 1, 1, ''),
(115, 123, 1, 1, 1, 1, 1, 1, 1, 1, 1, ''),
(116, 124, 1, 1, 1, 1, 1, 1, 1, 1, 1, ''),
(117, 125, 1, 1, 1, 1, 1, 1, 1, 1, 1, ''),
(118, 126, 1, 1, 1, 1, 1, 1, 1, 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `garbage`
--

CREATE TABLE `garbage` (
  `id` int(11) NOT NULL,
  `house_leader_id` int(11) DEFAULT NULL,
  `SegregatingWaste` tinyint(1) DEFAULT NULL,
  `Lettinggarbagetruckcollectwaste` tinyint(1) DEFAULT NULL,
  `Recycling` tinyint(1) DEFAULT NULL,
  `Composting` tinyint(1) DEFAULT NULL,
  `Burning` tinyint(1) DEFAULT NULL,
  `Dumpinginpitwithcover` tinyint(1) DEFAULT NULL,
  `Throwinginunhabitedlocations` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garbage`
--

INSERT INTO `garbage` (`id`, `house_leader_id`, `SegregatingWaste`, `Lettinggarbagetruckcollectwaste`, `Recycling`, `Composting`, `Burning`, `Dumpinginpitwithcover`, `Throwinginunhabitedlocations`, `created_at`) VALUES
(13, 118, 1, 1, 1, 1, 1, 1, 1, '2024-10-16 08:44:59'),
(14, 119, 1, 1, 1, 1, 1, 1, 1, '2024-10-16 08:46:04'),
(15, 120, 1, 1, 1, 1, 1, 1, 1, '2024-10-16 08:47:20'),
(16, 121, 1, 1, 1, 1, 1, 1, 1, '2024-10-16 08:54:08'),
(17, 125, 1, 1, 1, 1, 1, 1, 1, '2024-10-16 08:56:59'),
(18, 126, 1, 1, 1, 1, 1, 1, 1, '2024-10-16 08:57:48');

-- --------------------------------------------------------

--
-- Table structure for table `household_assets`
--

CREATE TABLE `household_assets` (
  `id` int(11) NOT NULL,
  `house_leader_id` int(11) DEFAULT NULL,
  `refrigerator` tinyint(1) DEFAULT NULL,
  `air_conditioner` tinyint(1) DEFAULT NULL,
  `washing_machine` tinyint(1) DEFAULT NULL,
  `stove_gas_range` tinyint(1) DEFAULT NULL,
  `radio_cassette` tinyint(1) DEFAULT NULL,
  `television` tinyint(1) DEFAULT NULL,
  `cd_vcd_dvd` tinyint(1) DEFAULT NULL,
  `landline_telephone` tinyint(1) DEFAULT NULL,
  `cellular_phone_basic` tinyint(1) DEFAULT NULL,
  `cellular_phone_smart` tinyint(1) DEFAULT NULL,
  `tablet` tinyint(1) DEFAULT NULL,
  `personal_computer` tinyint(1) DEFAULT NULL,
  `car` tinyint(1) DEFAULT NULL,
  `van` tinyint(1) DEFAULT NULL,
  `jeep` tinyint(1) DEFAULT NULL,
  `truck` tinyint(1) DEFAULT NULL,
  `motorcycle_scooter` tinyint(1) DEFAULT NULL,
  `e_bike` tinyint(1) DEFAULT NULL,
  `tricycle` tinyint(1) DEFAULT NULL,
  `bicycle` tinyint(1) DEFAULT NULL,
  `pedicab` tinyint(1) DEFAULT NULL,
  `motorized_boat` tinyint(1) DEFAULT NULL,
  `non_motorized_boat` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `household_assets`
--

INSERT INTO `household_assets` (`id`, `house_leader_id`, `refrigerator`, `air_conditioner`, `washing_machine`, `stove_gas_range`, `radio_cassette`, `television`, `cd_vcd_dvd`, `landline_telephone`, `cellular_phone_basic`, `cellular_phone_smart`, `tablet`, `personal_computer`, `car`, `van`, `jeep`, `truck`, `motorcycle_scooter`, `e_bike`, `tricycle`, `bicycle`, `pedicab`, `motorized_boat`, `non_motorized_boat`) VALUES
(96, 118, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 119, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 120, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 121, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 125, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 126, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `house_leader`
--

CREATE TABLE `house_leader` (
  `id` int(11) NOT NULL,
  `house_number` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `exname` varchar(20) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `municipality` varchar(50) DEFAULT NULL,
  `barangay` varchar(50) DEFAULT NULL,
  `purok` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `sex` enum('Male','Female','Other') DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `lcro` varchar(100) DEFAULT NULL,
  `marital_status` varchar(20) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `house_leader`
--

INSERT INTO `house_leader` (`id`, `house_number`, `lastname`, `firstname`, `middlename`, `exname`, `province`, `municipality`, `barangay`, `purok`, `dob`, `sex`, `age`, `occupation`, `lcro`, `marital_status`, `contact_number`, `religion`) VALUES
(114, '2323', 'Dela Cruz', 'John Anthon', 'Gidayawan', 'jr', 'Cebu', 'Madridejos', 'Mancilang', 'Purok Tulingan', '2024-10-16', 'Male', 25, 'Software Developer', 'Yes', 'divorced', '096928704875', 'Evangelicals'),
(115, '2323', 'Dela Cruz', 'John Anthon', 'Gidayawan', 'jr', 'Cebu', 'Madridejos', 'Mancilang', 'Purok Tulingan', '2024-10-16', 'Male', 25, 'Software Developer', 'Yes', 'divorced', '096928704875', 'Evangelicals'),
(116, '2323', 'Dela Cruz', 'John Anthon', 'Gidayawan', 'jr', 'Cebu', 'Madridejos', 'Mancilang', 'Purok Tulingan', '2024-10-16', 'Male', 25, 'Software Developer', 'Yes', 'divorced', '096928704875', 'Evangelicals'),
(117, '454545', 'asdas', 'dasdas', 'dasdasd', 'sr', 'asdasd', 'Madridejos', 'Mancilang', 'asdasd', '2024-10-07', 'Female', 23, 'asdasd', 'No', 'married', '09645454', 'Catholic'),
(118, '454545', 'asdas', 'dasdas', 'dasdasd', 'sr', 'asdasd', 'Madridejos', 'Mancilang', 'asdasd', '2024-10-07', 'Female', 23, 'asdasd', 'No', 'married', '09645454', 'Catholic'),
(119, '454545', 'asdas', 'dasdas', 'dasdasd', 'sr', 'asdasd', 'Madridejos', 'Mancilang', 'asdasd', '2024-10-07', 'Female', 23, 'asdasd', 'No', 'married', '09645454', 'Catholic'),
(120, '454545', 'asdas', 'dasdas', 'dasdasd', 'sr', 'asdasd', 'Madridejos', 'Mancilang', 'asdasd', '2024-10-07', 'Female', 23, 'asdasd', 'No', 'married', '09645454', 'Catholic'),
(121, '454545', 'asdas', 'dasdas', 'dasdasd', 'sr', 'asdasd', 'Madridejos', 'Mancilang', 'asdasd', '2024-10-07', 'Female', 23, 'asdasd', 'No', 'married', '09645454', 'Catholic'),
(122, '454545', 'asdas', 'dasdas', 'dasdasd', 'sr', 'asdasd', 'Madridejos', 'Mancilang', 'asdasd', '2024-10-07', 'Female', 23, 'asdasd', 'No', 'married', '09645454', 'Catholic'),
(123, '454545', 'asdas', 'dasdas', 'dasdasd', 'sr', 'asdasd', 'Madridejos', 'Mancilang', 'asdasd', '2024-10-07', 'Female', 23, 'asdasd', 'No', 'married', '09645454', 'Catholic'),
(124, '454545', 'asdas', 'dasdas', 'dasdasd', 'sr', 'asdasd', 'Madridejos', 'Mancilang', 'asdasd', '2024-10-07', 'Female', 23, 'asdasd', 'No', 'married', '09645454', 'Catholic'),
(125, '454545', 'asdas', 'dasdas', 'dasdasd', 'sr', 'asdasd', 'Madridejos', 'Mancilang', 'asdasd', '2024-10-07', 'Female', 23, 'asdasd', 'No', 'married', '09645454', 'Catholic'),
(126, '454545', 'asdas', 'dasdas', 'dasdasd', 'sr', 'asdasd', 'Madridejos', 'Mancilang', 'asdasd', '2024-10-07', 'Female', 23, 'asdasd', 'No', 'married', '09645454', 'Catholic');

-- --------------------------------------------------------

--
-- Table structure for table `housing`
--

CREATE TABLE `housing` (
  `id` int(11) NOT NULL,
  `house_leader_id` int(11) NOT NULL,
  `housing` date DEFAULT NULL,
  `electricity` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `housing`
--

INSERT INTO `housing` (`id`, `house_leader_id`, `housing`, `electricity`) VALUES
(6, 118, '2024-10-07', 'ELECTRICITY'),
(7, 119, '2024-10-07', 'ELECTRICITY'),
(8, 120, '2024-10-07', 'ELECTRICITY'),
(9, 121, '2024-10-07', 'ELECTRICITY'),
(10, 125, '2024-10-07', 'ELECTRICITY'),
(11, 126, '2024-10-07', 'ELECTRICITY');

-- --------------------------------------------------------

--
-- Table structure for table `housing_characteristics`
--

CREATE TABLE `housing_characteristics` (
  `id` int(11) NOT NULL,
  `house_leader_id` int(11) DEFAULT NULL,
  `single_house` tinyint(1) DEFAULT NULL,
  `duplex` tinyint(1) DEFAULT NULL,
  `row_house` tinyint(1) DEFAULT NULL,
  `multi_unit_residential` tinyint(1) DEFAULT NULL,
  `commercial_industrial_agricultural` tinyint(1) DEFAULT NULL,
  `institutional_living_quarters` tinyint(1) DEFAULT NULL,
  `other` tinyint(1) DEFAULT NULL,
  `other_type` varchar(100) DEFAULT NULL,
  `temporary_shelter` tinyint(1) DEFAULT NULL,
  `floor_area` float DEFAULT NULL,
  `metal_roofing` tinyint(1) DEFAULT NULL,
  `concrete_clay_slate` tinyint(1) DEFAULT NULL,
  `half_concrete` tinyint(1) DEFAULT NULL,
  `wood_bamboo` tinyint(1) DEFAULT NULL,
  `cogon_nipa` tinyint(1) DEFAULT NULL,
  `asbestos` tinyint(1) DEFAULT NULL,
  `makeshift_salvaged_improvised` tinyint(1) DEFAULT NULL,
  `concrete_brick_stone` tinyint(1) DEFAULT NULL,
  `wood_plywood` tinyint(1) DEFAULT NULL,
  `galvanized_iron_aluminum` tinyint(1) DEFAULT NULL,
  `bamboo_sawali_cogon_nipa` tinyint(1) DEFAULT NULL,
  `asbestos2` tinyint(1) DEFAULT NULL,
  `makeshift_salvaged_improvised2` tinyint(1) DEFAULT NULL,
  `floor_material` varchar(100) DEFAULT NULL,
  `bedrooms` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `housing_characteristics`
--

INSERT INTO `housing_characteristics` (`id`, `house_leader_id`, `single_house`, `duplex`, `row_house`, `multi_unit_residential`, `commercial_industrial_agricultural`, `institutional_living_quarters`, `other`, `other_type`, `temporary_shelter`, `floor_area`, `metal_roofing`, `concrete_clay_slate`, `half_concrete`, `wood_bamboo`, `cogon_nipa`, `asbestos`, `makeshift_salvaged_improvised`, `concrete_brick_stone`, `wood_plywood`, `galvanized_iron_aluminum`, `bamboo_sawali_cogon_nipa`, `asbestos2`, `makeshift_salvaged_improvised2`, `floor_material`, `bedrooms`) VALUES
(98, 118, 1, 1, 1, 1, 1, 1, 1, '1', 1, 23, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '23', 23),
(99, 119, 1, 1, 1, 1, 1, 1, 1, '1', 1, 23, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '23', 23),
(100, 120, 1, 1, 1, 1, 1, 1, 1, '1', 1, 23, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '23', 23),
(101, 121, 1, 1, 1, 1, 1, 1, 1, '1', 1, 23, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '23', 23),
(102, 125, 1, 1, 1, 1, 1, 1, 1, '1', 1, 23, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '23', 23),
(103, 126, 1, 1, 1, 1, 1, 1, 1, '1', 1, 23, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '23', 23);

-- --------------------------------------------------------

--
-- Table structure for table `improved_source`
--

CREATE TABLE `improved_source` (
  `id` int(11) NOT NULL,
  `house_leader_id` int(11) NOT NULL,
  `dwelling2` tinyint(1) DEFAULT 0,
  `yardorplot2` tinyint(1) DEFAULT 0,
  `PipedtoNeighbor` tinyint(1) DEFAULT 0,
  `PublicTap2` tinyint(1) DEFAULT 0,
  `TubeWell2` tinyint(1) DEFAULT 0,
  `ProtectedWell2` tinyint(1) DEFAULT 0,
  `RainWater2` tinyint(1) DEFAULT 0,
  `UnprotectedSpring2` tinyint(1) DEFAULT 0,
  `TankerTruck` tinyint(1) DEFAULT 0,
  `CartwithSmallTank` tinyint(1) DEFAULT 0,
  `WaterRefillingStation` tinyint(1) DEFAULT 0,
  `BottledWater` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `improved_source`
--

INSERT INTO `improved_source` (`id`, `house_leader_id`, `dwelling2`, `yardorplot2`, `PipedtoNeighbor`, `PublicTap2`, `TubeWell2`, `ProtectedWell2`, `RainWater2`, `UnprotectedSpring2`, `TankerTruck`, `CartwithSmallTank`, `WaterRefillingStation`, `BottledWater`) VALUES
(42, 118, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(43, 119, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(44, 120, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(45, 121, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(46, 121, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(47, 122, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(48, 123, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(49, 124, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(50, 125, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(51, 126, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `internet_access`
--

CREATE TABLE `internet_access` (
  `id` int(11) NOT NULL,
  `house_leader_id` int(11) DEFAULT NULL,
  `fixed_wired` tinyint(1) DEFAULT NULL,
  `fixed_wireless` tinyint(1) DEFAULT NULL,
  `satellite` tinyint(1) DEFAULT NULL,
  `mobile` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `internet_access`
--

INSERT INTO `internet_access` (`id`, `house_leader_id`, `fixed_wired`, `fixed_wireless`, `satellite`, `mobile`) VALUES
(106, 114, 1, 1, 1, 1),
(107, 115, 1, 1, 1, 1),
(108, 116, 1, 1, 1, 1),
(109, 117, 1, 1, 1, 1),
(110, 118, 1, 1, 1, 1),
(111, 119, 1, 1, 1, 1),
(112, 120, 1, 1, 1, 1),
(113, 121, 1, 1, 1, 1),
(114, 122, 1, 1, 1, 1),
(115, 123, 1, 1, 1, 1),
(116, 124, 1, 1, 1, 1),
(117, 125, 1, 1, 1, 1),
(118, 126, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `main_water_source`
--

CREATE TABLE `main_water_source` (
  `id` int(11) NOT NULL,
  `house_leader_id` int(11) NOT NULL,
  `PipedintoDwelling` tinyint(1) DEFAULT 0,
  `Pipedintoyardorplot` tinyint(1) DEFAULT 0,
  `PipedtoNeighbor` tinyint(1) DEFAULT 0,
  `PublicTap3` tinyint(1) DEFAULT 0,
  `TubeWell3` tinyint(1) DEFAULT 0,
  `ProtectedWell3` tinyint(1) DEFAULT 0,
  `RainWater3` tinyint(1) DEFAULT 0,
  `UnprotectedSpring3` tinyint(1) DEFAULT 0,
  `TankerTruck3` tinyint(1) DEFAULT 0,
  `CartwithSmallTank3` tinyint(1) DEFAULT 0,
  `WaterRefillingStation3` tinyint(1) DEFAULT 0,
  `BottledWater3` tinyint(1) DEFAULT 0,
  `UnprotectedWell3` tinyint(1) DEFAULT 0,
  `SurfacedWater3` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_water_source`
--

INSERT INTO `main_water_source` (`id`, `house_leader_id`, `PipedintoDwelling`, `Pipedintoyardorplot`, `PipedtoNeighbor`, `PublicTap3`, `TubeWell3`, `ProtectedWell3`, `RainWater3`, `UnprotectedSpring3`, `TankerTruck3`, `CartwithSmallTank3`, `WaterRefillingStation3`, `BottledWater3`, `UnprotectedWell3`, `SurfacedWater3`) VALUES
(50, 118, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(51, 119, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(52, 120, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(53, 121, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(54, 125, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(55, 126, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `older_household_members`
--

CREATE TABLE `older_household_members` (
  `id` int(11) NOT NULL,
  `house_leader_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `working` tinyint(1) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `income` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `older_household_members`
--

INSERT INTO `older_household_members` (`id`, `house_leader_id`, `name`, `age`, `working`, `occupation`, `income`) VALUES
(331, 118, 'asdasd', 23, 0, 'asda', 23.00),
(332, 118, 'asda', 23, 0, 'sdasd', 23.00),
(333, 118, 'sdasdas', 34, 0, 'asdasd', 23.00),
(334, 118, 'dasd', 23, 0, 'asdas', 23.00),
(335, 118, 'asdsad', 23, 0, 'asdasd', 23.00),
(336, 119, 'asdasd', 23, 0, 'asda', 23.00),
(337, 119, 'asda', 23, 0, 'sdasd', 23.00),
(338, 119, 'sdasdas', 34, 0, 'asdasd', 23.00),
(339, 119, 'dasd', 23, 0, 'asdas', 23.00),
(340, 119, 'asdsad', 23, 0, 'asdasd', 23.00),
(341, 120, 'asdasd', 23, 0, 'asda', 23.00),
(342, 120, 'asda', 23, 0, 'sdasd', 23.00),
(343, 120, 'sdasdas', 34, 0, 'asdasd', 23.00),
(344, 120, 'dasd', 23, 0, 'asdas', 23.00),
(345, 120, 'asdsad', 23, 0, 'asdasd', 23.00),
(346, 121, 'asdasd', 23, 0, 'asda', 23.00),
(347, 121, 'asda', 23, 0, 'sdasd', 23.00),
(348, 121, 'sdasdas', 34, 0, 'asdasd', 23.00),
(349, 121, 'dasd', 23, 0, 'asdas', 23.00),
(350, 121, 'asdsad', 23, 0, 'asdasd', 23.00),
(351, 125, 'asdasd', 23, 0, 'asda', 23.00),
(352, 125, 'asda', 23, 0, 'sdasd', 23.00),
(353, 125, 'sdasdas', 34, 0, 'asdasd', 23.00),
(354, 125, 'dasd', 23, 0, 'asdas', 23.00),
(355, 125, 'asdsad', 23, 0, 'asdasd', 23.00),
(356, 126, 'asdasd', 23, 0, 'asda', 23.00),
(357, 126, 'asda', 23, 0, 'sdasd', 23.00),
(358, 126, 'sdasdas', 34, 0, 'asdasd', 23.00),
(359, 126, 'dasd', 23, 0, 'asdas', 23.00),
(360, 126, 'asdsad', 23, 0, 'asdasd', 23.00);

-- --------------------------------------------------------

--
-- Table structure for table `public_safety`
--

CREATE TABLE `public_safety` (
  `id` int(11) NOT NULL,
  `house_leader_id` int(11) DEFAULT NULL,
  `safety_level` enum('Very safe','Safe','Unsafe','Very unsafe','I never go out at night/Does not apply','Don''t Know') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `public_safety`
--

INSERT INTO `public_safety` (`id`, `house_leader_id`, `safety_level`) VALUES
(106, 118, 'Very unsafe'),
(107, 119, 'Very unsafe'),
(108, 120, 'Very unsafe'),
(109, 121, 'Very unsafe'),
(110, 122, 'Very unsafe'),
(111, 123, 'Very unsafe'),
(112, 124, 'Very unsafe'),
(113, 125, 'Very unsafe'),
(114, 126, 'Very unsafe');

-- --------------------------------------------------------

--
-- Table structure for table `public_transportation`
--

CREATE TABLE `public_transportation` (
  `id` int(11) NOT NULL,
  `house_leader_id` int(11) DEFAULT NULL,
  `transportation` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `public_transportation`
--

INSERT INTO `public_transportation` (`id`, `house_leader_id`, `transportation`) VALUES
(106, 114, '1'),
(107, 115, '1'),
(108, 116, '1'),
(109, 117, '1'),
(110, 118, '1'),
(111, 119, '1'),
(112, 120, '1'),
(113, 121, '1'),
(114, 122, '1'),
(115, 123, '1'),
(116, 124, '1'),
(117, 125, '1'),
(118, 126, '1');

-- --------------------------------------------------------

--
-- Table structure for table `sanitation`
--

CREATE TABLE `sanitation` (
  `id` int(11) NOT NULL,
  `house_leader_id` int(11) NOT NULL,
  `improved_sanitation` varchar(255) DEFAULT NULL,
  `unimproved_sanitation` varchar(255) DEFAULT NULL,
  `open_defecation` varchar(60) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanitation`
--

INSERT INTO `sanitation` (`id`, `house_leader_id`, `improved_sanitation`, `unimproved_sanitation`, `open_defecation`) VALUES
(34, 118, 'Flush/Pour flush to piped sewer system', 'Pit Latrine without slab/Open pit', ''),
(35, 119, 'Flush/Pour flush to piped sewer system', 'Pit Latrine without slab/Open pit', ''),
(36, 120, 'Flush/Pour flush to piped sewer system', 'Pit Latrine without slab/Open pit', ''),
(37, 121, 'Flush/Pour flush to piped sewer system', 'Pit Latrine without slab/Open pit', ''),
(38, 125, 'Flush/Pour flush to piped sewer system', 'Pit Latrine without slab/Open pit', ''),
(39, 126, 'Flush/Pour flush to piped sewer system', 'Pit Latrine without slab/Open pit', '');

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

-- --------------------------------------------------------

--
-- Table structure for table `social_protection`
--

CREATE TABLE `social_protection` (
  `id` int(11) NOT NULL,
  `house_leader_id` int(11) DEFAULT NULL,
  `sss` tinyint(1) DEFAULT NULL,
  `gsis` tinyint(1) DEFAULT NULL,
  `philhealth` tinyint(1) DEFAULT NULL,
  `health_or_medical` tinyint(1) DEFAULT NULL,
  `never_go_out` tinyint(1) DEFAULT NULL,
  `dont_work` tinyint(1) DEFAULT NULL,
  `sss2` tinyint(1) DEFAULT NULL,
  `gsis2` tinyint(1) DEFAULT NULL,
  `philhealth2` tinyint(1) DEFAULT NULL,
  `health_or_medical2` tinyint(1) DEFAULT NULL,
  `never_go_out2` tinyint(1) DEFAULT NULL,
  `dont_know2` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `social_protection`
--

INSERT INTO `social_protection` (`id`, `house_leader_id`, `sss`, `gsis`, `philhealth`, `health_or_medical`, `never_go_out`, `dont_work`, `sss2`, `gsis2`, `philhealth2`, `health_or_medical2`, `never_go_out2`, `dont_know2`) VALUES
(106, 118, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(107, 119, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(108, 120, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(109, 121, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(110, 122, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(111, 123, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(112, 124, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(113, 125, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 1),
(114, 126, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `spouse`
--

CREATE TABLE `spouse` (
  `id` int(11) NOT NULL,
  `house_leader_id` int(11) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `extension` varchar(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `lcro` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spouse`
--

INSERT INTO `spouse` (`id`, `house_leader_id`, `lastname`, `firstname`, `middlename`, `extension`, `age`, `occupation`, `dob`, `lcro`, `address`, `status`) VALUES
(114, 114, 'Dela Cruz', 'Dreamgirl', 'Gidayawan', 'i', 24, 'Testing', '2024-10-16', 'yes', 'asdasdas', 'widowed'),
(115, 115, 'Dela Cruz', 'Dreamgirl', 'Gidayawan', 'i', 24, 'Testing', '2024-10-16', 'yes', 'asdasdas', 'widowed'),
(116, 116, 'Dela Cruz', 'Dreamgirl', 'Gidayawan', 'i', 24, 'Testing', '2024-10-16', 'yes', 'asdasdas', 'widowed'),
(117, 117, 'asdasd', 'asdas', 'dasdsa', 'iv', 23, 'asdsadsa', '2024-10-08', '', 'sadasdasdas', 'separated'),
(118, 118, 'asdasd', 'asdas', 'dasdsa', 'iv', 23, 'asdsadsa', '2024-10-08', '', 'sadasdasdas', 'separated'),
(119, 119, '', '', '', 'iv', 23, '', '0000-00-00', 'yes', '', 'not_reported'),
(120, 120, '', '', '', 'iv', 0, '', '0000-00-00', 'yes', '', 'not_reported'),
(121, 121, '', '', '', 'iv', 0, '', '0000-00-00', 'yes', '', 'not_reported'),
(122, 122, '', '', '', 'iv', 0, '', '0000-00-00', 'yes', '', 'not_reported'),
(123, 123, '', '', '', 'iv', 0, '', '0000-00-00', 'yes', '', 'not_reported'),
(124, 124, '', '', '', 'iv', 0, '', '0000-00-00', 'yes', '', 'not_reported'),
(125, 125, '', '', '', 'iv', 0, '', '0000-00-00', 'yes', '', 'not_reported'),
(126, 126, '', '', '', 'iv', 0, '', '0000-00-00', 'yes', '', 'not_reported');

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

-- --------------------------------------------------------

--
-- Table structure for table `tenturestatus`
--

CREATE TABLE `tenturestatus` (
  `id` int(11) NOT NULL,
  `house_leader_id` int(11) NOT NULL,
  `tentures_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenturestatus`
--

INSERT INTO `tenturestatus` (`id`, `house_leader_id`, `tentures_status`) VALUES
(9, 118, 'OWN HOUSE, RENT-FREE LOT WITHOUT CONSENT OF OWNER'),
(10, 119, 'OWN HOUSE, RENT-FREE LOT WITHOUT CONSENT OF OWNER'),
(11, 120, 'OWN HOUSE, RENT-FREE LOT WITHOUT CONSENT OF OWNER'),
(12, 121, 'OWN HOUSE, RENT-FREE LOT WITHOUT CONSENT OF OWNER'),
(13, 125, 'OWN HOUSE, RENT-FREE LOT WITHOUT CONSENT OF OWNER'),
(14, 126, 'OWN HOUSE, RENT-FREE LOT WITHOUT CONSENT OF OWNER');

-- --------------------------------------------------------

--
-- Table structure for table `toiletfacility`
--

CREATE TABLE `toiletfacility` (
  `id` int(11) NOT NULL,
  `house_leader_id` int(11) NOT NULL,
  `toilet_facility` varchar(255) DEFAULT NULL,
  `facility_with_others` varchar(255) DEFAULT NULL,
  `facility_with_members` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toiletfacility`
--

INSERT INTO `toiletfacility` (`id`, `house_leader_id`, `toilet_facility`, `facility_with_others`, `facility_with_members`) VALUES
(29, 118, 'In own Dwelling', 'Yes', 'Shared with General Public'),
(30, 119, 'In own Dwelling', 'Yes', 'Shared with General Public'),
(31, 120, 'In own Dwelling', 'Yes', 'Shared with General Public'),
(32, 121, 'In own Dwelling', 'Yes', 'Shared with General Public'),
(33, 125, 'In own Dwelling', 'Yes', 'Shared with General Public'),
(34, 126, 'In own Dwelling', 'Yes', 'Shared with General Public');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` int(11) NOT NULL,
  `leader_id` int(11) NOT NULL,
  `new_municipality` enum('Madridejos','Bantayan','Santafe') NOT NULL,
  `transfer_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unimproved_source`
--

CREATE TABLE `unimproved_source` (
  `id` int(11) NOT NULL,
  `house_leader_id` int(11) NOT NULL,
  `UnprotectedWell` tinyint(1) DEFAULT 0,
  `UnprotectedSpring3` tinyint(1) DEFAULT 0,
  `SurfacedWater3` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unimproved_source`
--

INSERT INTO `unimproved_source` (`id`, `house_leader_id`, `UnprotectedWell`, `UnprotectedSpring3`, `SurfacedWater3`) VALUES
(20, 125, 1, 1, 1),
(21, 126, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `OTP` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `OTP`) VALUES
(1, 'Queenie', 'admin', '$2y$10$nNzwdh5nZZCnR5zQ6TJSC.sO4aXo2PVM8wYfWvW9A6cm9i4FRSmLK', ''),
(2, 'Johnskie', 'john', '$2y$10$/nwBqOuhozfCjfD2SpCIHOsFfIMnMDwYPHnq1Ez9hl7zUjMkt13le', ''),
(3, 'johnrey', 'johnrey@gmail.com', '$2y$10$J8kV9Xa50NmQokoC0GzRjuo7.KMrIgbaxz/qqpkDfNu0nF5t6jjzO', '152783'),
(6, 'Johnskie', 'johnreyjubay315@gmail.com', '$2y$10$UsarisP6jBWkaP.1xcFuquzXBnGBzF3amxCloEA.6m1hg5dcJCxdS', '0');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `house_leader_id` int(11) DEFAULT NULL,
  `car` tinyint(1) DEFAULT NULL,
  `van` tinyint(1) DEFAULT NULL,
  `jeep` tinyint(1) DEFAULT NULL,
  `truck` tinyint(1) DEFAULT NULL,
  `motorcycle_scooter` tinyint(1) DEFAULT NULL,
  `e_bike` tinyint(1) DEFAULT NULL,
  `tricycle` tinyint(1) DEFAULT NULL,
  `bicycle` tinyint(1) DEFAULT NULL,
  `pedicab` tinyint(1) DEFAULT NULL,
  `motorized_boat` tinyint(1) DEFAULT NULL,
  `non_motorized_boat` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `house_leader_id`, `car`, `van`, `jeep`, `truck`, `motorcycle_scooter`, `e_bike`, `tricycle`, `bicycle`, `pedicab`, `motorized_boat`, `non_motorized_boat`) VALUES
(39, 118, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(40, 119, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(41, 120, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(42, 121, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(43, 125, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(44, 126, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `water_sanitation_hygiene`
--

CREATE TABLE `water_sanitation_hygiene` (
  `id` int(11) NOT NULL,
  `house_leader_id` int(11) NOT NULL,
  `community_water_supply` varchar(255) DEFAULT NULL,
  `point_source_water_supply` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `water_sanitation_hygiene`
--

INSERT INTO `water_sanitation_hygiene` (`id`, `house_leader_id`, `community_water_supply`, `point_source_water_supply`) VALUES
(43, 118, 'Piped into Dwelling', 'Unprotected (Open Dug Well)'),
(44, 119, 'Piped into Dwelling', 'Unprotected (Open Dug Well)'),
(45, 120, 'Piped into Dwelling', 'Unprotected (Open Dug Well)'),
(46, 121, 'Piped into Dwelling', 'Unprotected (Open Dug Well)'),
(47, 122, 'Piped into Dwelling', 'Unprotected (Open Dug Well)'),
(48, 123, 'Piped into Dwelling', 'Unprotected (Open Dug Well)'),
(49, 124, 'Piped into Dwelling', 'Unprotected (Open Dug Well)'),
(50, 125, 'Piped into Dwelling', 'Unprotected (Open Dug Well)'),
(51, 126, 'Piped into Dwelling', 'Unprotected (Open Dug Well)');

-- --------------------------------------------------------

--
-- Table structure for table `water_source_location`
--

CREATE TABLE `water_source_location` (
  `id` int(11) NOT NULL,
  `house_leader_id` int(11) NOT NULL,
  `watersource_location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `water_source_location`
--

INSERT INTO `water_source_location` (`id`, `house_leader_id`, `watersource_location`) VALUES
(36, 118, 'Elsewhere'),
(37, 119, 'Elsewhere'),
(38, 120, 'Elsewhere'),
(39, 121, 'Elsewhere'),
(40, 125, 'Elsewhere'),
(41, 126, 'Elsewhere');

-- --------------------------------------------------------

--
-- Table structure for table `younger_household_members`
--

CREATE TABLE `younger_household_members` (
  `id` int(11) NOT NULL,
  `house_leader_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `education_level` varchar(50) DEFAULT NULL,
  `academic_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `younger_household_members`
--

INSERT INTO `younger_household_members` (`id`, `house_leader_id`, `name`, `age`, `education_level`, `academic_status`) VALUES
(331, 118, 'sadas', 23, 'Elementary', 'yes'),
(332, 118, 'dasd', 23, 'Junior', 'yes'),
(333, 118, 'asdasd', 23, 'Senior', 'yes'),
(334, 118, 'asd', 23, 'Junior', 'yes'),
(335, 118, 'adasd', 23, 'Junior', 'yes'),
(336, 119, 'sadas', 23, 'Elementary', 'yes'),
(337, 119, 'dasd', 23, 'Junior', 'yes'),
(338, 119, 'asdasd', 23, 'Senior', 'yes'),
(339, 119, 'asd', 23, 'Junior', 'yes'),
(340, 119, 'adasd', 23, 'Junior', 'yes'),
(341, 120, 'sadas', 23, 'Elementary', 'yes'),
(342, 120, 'dasd', 23, 'Junior', 'yes'),
(343, 120, 'asdasd', 23, 'Senior', 'yes'),
(344, 120, 'asd', 23, 'Junior', 'yes'),
(345, 120, 'adasd', 23, 'Junior', 'yes'),
(346, 121, 'sadas', 23, 'Elementary', 'yes'),
(347, 121, 'dasd', 23, 'Junior', 'yes'),
(348, 121, 'asdasd', 23, 'Senior', 'yes'),
(349, 121, 'asd', 23, 'Junior', 'yes'),
(350, 121, 'adasd', 23, 'Junior', 'yes'),
(351, 125, 'sadas', 23, 'Elementary', 'yes'),
(352, 125, 'dasd', 23, 'Junior', 'yes'),
(353, 125, 'asdasd', 23, 'Senior', 'yes'),
(354, 125, 'asd', 23, 'Junior', 'yes'),
(355, 125, 'adasd', 23, 'Junior', 'yes'),
(356, 126, 'sadas', 23, 'Elementary', 'yes'),
(357, 126, 'dasd', 23, 'Junior', 'yes'),
(358, 126, 'asdasd', 23, 'Senior', 'yes'),
(359, 126, 'asd', 23, 'Junior', 'yes'),
(360, 126, 'adasd', 23, 'Junior', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `energy_sources`
--
ALTER TABLE `energy_sources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_leader_id` (`house_leader_id`);

--
-- Indexes for table `financial_accounts`
--
ALTER TABLE `financial_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_leader_id` (`house_leader_id`);

--
-- Indexes for table `garbage`
--
ALTER TABLE `garbage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `household_assets`
--
ALTER TABLE `household_assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_leader_id` (`house_leader_id`);

--
-- Indexes for table `house_leader`
--
ALTER TABLE `house_leader`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `housing`
--
ALTER TABLE `housing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_leader_id` (`house_leader_id`);

--
-- Indexes for table `housing_characteristics`
--
ALTER TABLE `housing_characteristics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_leader_id` (`house_leader_id`);

--
-- Indexes for table `improved_source`
--
ALTER TABLE `improved_source`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_leader_id` (`house_leader_id`);

--
-- Indexes for table `internet_access`
--
ALTER TABLE `internet_access`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_leader_id` (`house_leader_id`);

--
-- Indexes for table `main_water_source`
--
ALTER TABLE `main_water_source`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_leader_id` (`house_leader_id`);

--
-- Indexes for table `older_household_members`
--
ALTER TABLE `older_household_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_leader_id` (`house_leader_id`);

--
-- Indexes for table `public_safety`
--
ALTER TABLE `public_safety`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_leader_id` (`house_leader_id`);

--
-- Indexes for table `public_transportation`
--
ALTER TABLE `public_transportation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_leader_id` (`house_leader_id`);

--
-- Indexes for table `sanitation`
--
ALTER TABLE `sanitation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_leader_id` (`house_leader_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_protection`
--
ALTER TABLE `social_protection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_leader_id` (`house_leader_id`);

--
-- Indexes for table `spouse`
--
ALTER TABLE `spouse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_leader_id` (`house_leader_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tenturestatus`
--
ALTER TABLE `tenturestatus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_leader_id` (`house_leader_id`);

--
-- Indexes for table `toiletfacility`
--
ALTER TABLE `toiletfacility`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_leader_id` (`house_leader_id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leader_id` (`leader_id`);

--
-- Indexes for table `unimproved_source`
--
ALTER TABLE `unimproved_source`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_leader_id` (`house_leader_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_leader_id` (`house_leader_id`);

--
-- Indexes for table `water_sanitation_hygiene`
--
ALTER TABLE `water_sanitation_hygiene`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_leader_id` (`house_leader_id`);

--
-- Indexes for table `water_source_location`
--
ALTER TABLE `water_source_location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_leader_id` (`house_leader_id`);

--
-- Indexes for table `younger_household_members`
--
ALTER TABLE `younger_household_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_leader_id` (`house_leader_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `energy_sources`
--
ALTER TABLE `energy_sources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `financial_accounts`
--
ALTER TABLE `financial_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `garbage`
--
ALTER TABLE `garbage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `household_assets`
--
ALTER TABLE `household_assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `house_leader`
--
ALTER TABLE `house_leader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `housing`
--
ALTER TABLE `housing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `housing_characteristics`
--
ALTER TABLE `housing_characteristics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `improved_source`
--
ALTER TABLE `improved_source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `internet_access`
--
ALTER TABLE `internet_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `main_water_source`
--
ALTER TABLE `main_water_source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `older_household_members`
--
ALTER TABLE `older_household_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=361;

--
-- AUTO_INCREMENT for table `public_safety`
--
ALTER TABLE `public_safety`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `public_transportation`
--
ALTER TABLE `public_transportation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `sanitation`
--
ALTER TABLE `sanitation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `social_protection`
--
ALTER TABLE `social_protection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `spouse`
--
ALTER TABLE `spouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tenturestatus`
--
ALTER TABLE `tenturestatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `toiletfacility`
--
ALTER TABLE `toiletfacility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `unimproved_source`
--
ALTER TABLE `unimproved_source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `water_sanitation_hygiene`
--
ALTER TABLE `water_sanitation_hygiene`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `water_source_location`
--
ALTER TABLE `water_source_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `younger_household_members`
--
ALTER TABLE `younger_household_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=361;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `energy_sources`
--
ALTER TABLE `energy_sources`
  ADD CONSTRAINT `energy_sources_ibfk_1` FOREIGN KEY (`house_leader_id`) REFERENCES `house_leader` (`id`);

--
-- Constraints for table `financial_accounts`
--
ALTER TABLE `financial_accounts`
  ADD CONSTRAINT `financial_accounts_ibfk_1` FOREIGN KEY (`house_leader_id`) REFERENCES `house_leader` (`id`);

--
-- Constraints for table `household_assets`
--
ALTER TABLE `household_assets`
  ADD CONSTRAINT `household_assets_ibfk_1` FOREIGN KEY (`house_leader_id`) REFERENCES `house_leader` (`id`);

--
-- Constraints for table `housing`
--
ALTER TABLE `housing`
  ADD CONSTRAINT `housing_ibfk_1` FOREIGN KEY (`house_leader_id`) REFERENCES `house_leader` (`id`);

--
-- Constraints for table `housing_characteristics`
--
ALTER TABLE `housing_characteristics`
  ADD CONSTRAINT `housing_characteristics_ibfk_1` FOREIGN KEY (`house_leader_id`) REFERENCES `house_leader` (`id`);

--
-- Constraints for table `improved_source`
--
ALTER TABLE `improved_source`
  ADD CONSTRAINT `improved_source_ibfk_1` FOREIGN KEY (`house_leader_id`) REFERENCES `house_leader` (`id`);

--
-- Constraints for table `internet_access`
--
ALTER TABLE `internet_access`
  ADD CONSTRAINT `internet_access_ibfk_1` FOREIGN KEY (`house_leader_id`) REFERENCES `house_leader` (`id`);

--
-- Constraints for table `main_water_source`
--
ALTER TABLE `main_water_source`
  ADD CONSTRAINT `main_water_source_ibfk_1` FOREIGN KEY (`house_leader_id`) REFERENCES `house_leader` (`id`);

--
-- Constraints for table `older_household_members`
--
ALTER TABLE `older_household_members`
  ADD CONSTRAINT `older_household_members_ibfk_1` FOREIGN KEY (`house_leader_id`) REFERENCES `house_leader` (`id`);

--
-- Constraints for table `public_safety`
--
ALTER TABLE `public_safety`
  ADD CONSTRAINT `public_safety_ibfk_1` FOREIGN KEY (`house_leader_id`) REFERENCES `house_leader` (`id`);

--
-- Constraints for table `public_transportation`
--
ALTER TABLE `public_transportation`
  ADD CONSTRAINT `public_transportation_ibfk_1` FOREIGN KEY (`house_leader_id`) REFERENCES `house_leader` (`id`);

--
-- Constraints for table `sanitation`
--
ALTER TABLE `sanitation`
  ADD CONSTRAINT `sanitation_ibfk_1` FOREIGN KEY (`house_leader_id`) REFERENCES `house_leader` (`id`);

--
-- Constraints for table `social_protection`
--
ALTER TABLE `social_protection`
  ADD CONSTRAINT `social_protection_ibfk_1` FOREIGN KEY (`house_leader_id`) REFERENCES `house_leader` (`id`);

--
-- Constraints for table `spouse`
--
ALTER TABLE `spouse`
  ADD CONSTRAINT `spouse_ibfk_1` FOREIGN KEY (`house_leader_id`) REFERENCES `house_leader` (`id`);

--
-- Constraints for table `tenturestatus`
--
ALTER TABLE `tenturestatus`
  ADD CONSTRAINT `tenturestatus_ibfk_1` FOREIGN KEY (`house_leader_id`) REFERENCES `house_leader` (`id`);

--
-- Constraints for table `toiletfacility`
--
ALTER TABLE `toiletfacility`
  ADD CONSTRAINT `toiletfacility_ibfk_1` FOREIGN KEY (`house_leader_id`) REFERENCES `house_leader` (`id`);

--
-- Constraints for table `transfers`
--
ALTER TABLE `transfers`
  ADD CONSTRAINT `transfers_ibfk_1` FOREIGN KEY (`leader_id`) REFERENCES `house_leader` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `unimproved_source`
--
ALTER TABLE `unimproved_source`
  ADD CONSTRAINT `unimproved_source_ibfk_1` FOREIGN KEY (`house_leader_id`) REFERENCES `house_leader` (`id`);

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`house_leader_id`) REFERENCES `house_leader` (`id`);

--
-- Constraints for table `water_sanitation_hygiene`
--
ALTER TABLE `water_sanitation_hygiene`
  ADD CONSTRAINT `water_sanitation_hygiene_ibfk_1` FOREIGN KEY (`house_leader_id`) REFERENCES `house_leader` (`id`);

--
-- Constraints for table `water_source_location`
--
ALTER TABLE `water_source_location`
  ADD CONSTRAINT `water_source_location_ibfk_1` FOREIGN KEY (`house_leader_id`) REFERENCES `house_leader` (`id`);

--
-- Constraints for table `younger_household_members`
--
ALTER TABLE `younger_household_members`
  ADD CONSTRAINT `younger_household_members_ibfk_1` FOREIGN KEY (`house_leader_id`) REFERENCES `house_leader` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

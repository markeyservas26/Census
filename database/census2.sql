-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2024 at 08:17 AM
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
-- Table structure for table `energy_souce_cooking`
--

CREATE TABLE `energy_souce_cooking` (
  `house_leader_id` int(11) NOT NULL,
  `electricity` varchar(50) NOT NULL,
  `kerosene` varchar(50) NOT NULL,
  `liquefied_petroleum` varchar(50) NOT NULL,
  `charcoal` varchar(50) NOT NULL,
  `wood` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `energy_souce_cooking`
--

INSERT INTO `energy_souce_cooking` (`house_leader_id`, `electricity`, `kerosene`, `liquefied_petroleum`, `charcoal`, `wood`) VALUES
(238, '1', '1', '1', '0', '1');

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
(129, 238, 1, 1, 1, 0, 1, 1, 1);

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
(232, 238, 1, 1, 0, 0, 0, 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `floor_bedroom`
--

CREATE TABLE `floor_bedroom` (
  `id` int(11) NOT NULL,
  `house_leader_id` int(11) NOT NULL,
  `floor` int(11) DEFAULT NULL,
  `floor2` decimal(10,2) DEFAULT NULL,
  `bedrooms` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `floor_bedroom`
--

INSERT INTO `floor_bedroom` (`id`, `house_leader_id`, `floor`, `floor2`, `bedrooms`) VALUES
(37, 238, 2, 1000.00, 6);

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
  `Throwinginunhabitedlocations` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garbage`
--

INSERT INTO `garbage` (`id`, `house_leader_id`, `SegregatingWaste`, `Lettinggarbagetruckcollectwaste`, `Recycling`, `Composting`, `Burning`, `Dumpinginpitwithcover`, `Throwinginunhabitedlocations`) VALUES
(63, 238, 1, 1, 0, 1, 1, 0, 1);

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
  `personal_computer` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `household_assets`
--

INSERT INTO `household_assets` (`id`, `house_leader_id`, `refrigerator`, `air_conditioner`, `washing_machine`, `stove_gas_range`, `radio_cassette`, `television`, `cd_vcd_dvd`, `landline_telephone`, `cellular_phone_basic`, `cellular_phone_smart`, `tablet`, `personal_computer`) VALUES
(140, 238, 1, 1, 1, 1, 0, 1, 1, 0, 1, 1, 1, 1);

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
  `religion` varchar(50) DEFAULT NULL,
  `coordinates` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `house_leader`
--

INSERT INTO `house_leader` (`id`, `house_number`, `lastname`, `firstname`, `middlename`, `exname`, `province`, `municipality`, `barangay`, `purok`, `dob`, `sex`, `age`, `occupation`, `lcro`, `marital_status`, `contact_number`, `religion`, `coordinates`) VALUES
(238, '990429', 'Dela Cruz', 'John Anthon', 'Gidayawan', NULL, 'Cebu', 'madridejos', 'mancilang', 'Tulingan', '1995-06-07', 'Male', 29, 'Software Developer', 'Yes', 'married', '09774167345', 'Catholic', '11.2949711, 123.7359283');

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
(60, 238, '2021-07-08', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `housing_characteristics`
--

CREATE TABLE `housing_characteristics` (
  `id` int(11) NOT NULL,
  `house_leader_id` int(11) NOT NULL,
  `SINGLEHOUSE` tinyint(1) DEFAULT 0,
  `DUPLEX` tinyint(1) DEFAULT 0,
  `AAROW_HOUSE` tinyint(1) DEFAULT 0,
  `Multi_urb` tinyint(1) DEFAULT 0,
  `Cominag` tinyint(1) DEFAULT 0,
  `Institution_living` tinyint(1) DEFAULT 0,
  `none` tinyint(1) DEFAULT 0,
  `Othertype` tinyint(1) DEFAULT 0,
  `Temporaryevac` tinyint(1) DEFAULT 0,
  `Metalroofing` tinyint(1) DEFAULT 0,
  `concreteslateslate` tinyint(1) DEFAULT 0,
  `HG_concrete` tinyint(1) DEFAULT 0,
  `Woodbamboo` tinyint(1) DEFAULT 0,
  `Sodthatch` tinyint(1) DEFAULT 0,
  `Asbestos` tinyint(1) DEFAULT 0,
  `Msi_materials` tinyint(1) DEFAULT 0,
  `CMG` tinyint(1) DEFAULT 0,
  `CBS` tinyint(1) DEFAULT 0,
  `WBP` tinyint(1) DEFAULT 0,
  `WTP` tinyint(1) DEFAULT 0,
  `VCT` tinyint(1) DEFAULT 0,
  `Linoleum` tinyint(1) DEFAULT 0,
  `concrete` tinyint(1) DEFAULT 0,
  `earthsandmud` tinyint(1) DEFAULT 0,
  `wood` tinyint(1) DEFAULT 0,
  `coconutlumber` tinyint(1) DEFAULT 0,
  `bamboo` tinyint(1) DEFAULT 0,
  `msim` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `housing_characteristics`
--

INSERT INTO `housing_characteristics` (`id`, `house_leader_id`, `SINGLEHOUSE`, `DUPLEX`, `AAROW_HOUSE`, `Multi_urb`, `Cominag`, `Institution_living`, `none`, `Othertype`, `Temporaryevac`, `Metalroofing`, `concreteslateslate`, `HG_concrete`, `Woodbamboo`, `Sodthatch`, `Asbestos`, `Msi_materials`, `CMG`, `CBS`, `WBP`, `WTP`, `VCT`, `Linoleum`, `concrete`, `earthsandmud`, `wood`, `coconutlumber`, `bamboo`, `msim`) VALUES
(37, 238, 1, 1, 0, 0, 1, 0, 0, 0, 0, 1, 0, 1, 1, 1, 0, 0, 1, 1, 0, 1, 0, 0, 1, 1, 1, 0, 0, 0);

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
(158, 238, 1, 1, 0, 1, 0, 1, 1, 0, 0, 1, 1, 1);

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
(232, 238, 1, 1, 0, 0);

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
  `ProtectedSpring3` tinyint(1) DEFAULT 0,
  `TankerTruck3` tinyint(1) DEFAULT 0,
  `CartwithSmallTank3` tinyint(1) DEFAULT 0,
  `WaterRefillingStation3` tinyint(1) DEFAULT 0,
  `BottledWater3` tinyint(1) DEFAULT 0,
  `UnprotectedWell3` tinyint(1) DEFAULT 0,
  `UnprotectedSpring4` tinyint(1) DEFAULT 0,
  `SurfacedWater4` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_water_source`
--

INSERT INTO `main_water_source` (`id`, `house_leader_id`, `PipedintoDwelling`, `Pipedintoyardorplot`, `PipedtoNeighbor`, `PublicTap3`, `TubeWell3`, `ProtectedWell3`, `RainWater3`, `ProtectedSpring3`, `TankerTruck3`, `CartwithSmallTank3`, `WaterRefillingStation3`, `BottledWater3`, `UnprotectedWell3`, `UnprotectedSpring4`, `SurfacedWater4`) VALUES
(162, 238, 1, 1, 0, 1, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `older_household_members`
--

CREATE TABLE `older_household_members` (
  `id` int(11) NOT NULL,
  `house_leader_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `working` varchar(25) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `income` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `older_household_members`
--

INSERT INTO `older_household_members` (`id`, `house_leader_id`, `name`, `age`, `working`, `occupation`, `income`) VALUES
(809, 238, 'awd', 21, 'yes', 'awdawd', 2131.00);

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
(224, 238, 'Safe');

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
(232, 238, 'Yes');

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
(120, 238, 'Flush/Pour flush to piped sewer system', 'Pit Latrine without slab/Open pit', NULL);

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
  `dont_work` tinyint(1) DEFAULT NULL,
  `sss2` tinyint(1) DEFAULT NULL,
  `gsis2` tinyint(1) DEFAULT NULL,
  `philhealth2` tinyint(1) DEFAULT NULL,
  `health_or_medical2` tinyint(1) DEFAULT NULL,
  `dont_know2` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `social_protection`
--

INSERT INTO `social_protection` (`id`, `house_leader_id`, `sss`, `gsis`, `philhealth`, `health_or_medical`, `dont_work`, `sss2`, `gsis2`, `philhealth2`, `health_or_medical2`, `dont_know2`) VALUES
(221, 238, 1, 1, 1, 0, 0, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `spouse`
--

CREATE TABLE `spouse` (
  `id` int(11) NOT NULL,
  `house_leader_id` int(11) DEFAULT NULL,
  `spouse_lastname` varchar(50) DEFAULT NULL,
  `spouse_firstname` varchar(50) DEFAULT NULL,
  `spouse_middlename` varchar(50) DEFAULT NULL,
  `extension` varchar(20) DEFAULT NULL,
  `spouse_age` int(11) DEFAULT NULL,
  `spouse_occupation` varchar(100) DEFAULT NULL,
  `spouse_dob` date DEFAULT NULL,
  `spouse_lcro` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spouse`
--

INSERT INTO `spouse` (`id`, `house_leader_id`, `spouse_lastname`, `spouse_firstname`, `spouse_middlename`, `extension`, `spouse_age`, `spouse_occupation`, `spouse_dob`, `spouse_lcro`, `address`, `status`) VALUES
(240, 238, 'Illustrisimo', 'Darnie', '', NULL, 26, 'efsf', '1998-06-18', 'yes', 'Mancilang', 'married');

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
(27, 'Mark', 'mark@gmail.com', '$2y$10$xKfDIf2rC9lGKtqzu03nMOfJyo2lWPkx38g9KOXs9R6p3sH7xmzai', 'Madridejos');

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
(63, 238, 'OWNER-LIKE POSSESSION OF THE HOUSE AND LOT');

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
(115, 238, 'In own Dwelling', 'Yes', 'Shared with known household (Not Public)');

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
(128, 238, 0, 1, 0);

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
(3, 'johnrey', 'johnrey@gmail.com', '$2y$10$v2pdmI4IB4DDHpiKPIGIOe9lT8rqWBrUXkDr1/z6pbEob0EJKS4HK', '152783'),
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
(83, 238, 1, 0, 1, 1, 0, 1, 0, 1, 1, 0, 0);

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
(158, 238, 'Piped into Dwelling', 'RainWater');

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
(122, 238, 'In Own Dwelling');

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
(755, 238, 'wadwd', 15, 'Junior', 'Grade 9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `energy_souce_cooking`
--
ALTER TABLE `energy_souce_cooking`
  ADD PRIMARY KEY (`house_leader_id`);

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
-- Indexes for table `floor_bedroom`
--
ALTER TABLE `floor_bedroom`
  ADD PRIMARY KEY (`house_leader_id`),
  ADD UNIQUE KEY `id` (`id`);

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
  ADD PRIMARY KEY (`house_leader_id`),
  ADD UNIQUE KEY `id` (`id`);

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
-- AUTO_INCREMENT for table `energy_souce_cooking`
--
ALTER TABLE `energy_souce_cooking`
  MODIFY `house_leader_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `energy_sources`
--
ALTER TABLE `energy_sources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `financial_accounts`
--
ALTER TABLE `financial_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `floor_bedroom`
--
ALTER TABLE `floor_bedroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `garbage`
--
ALTER TABLE `garbage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `household_assets`
--
ALTER TABLE `household_assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `house_leader`
--
ALTER TABLE `house_leader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `housing`
--
ALTER TABLE `housing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `housing_characteristics`
--
ALTER TABLE `housing_characteristics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `improved_source`
--
ALTER TABLE `improved_source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `internet_access`
--
ALTER TABLE `internet_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `main_water_source`
--
ALTER TABLE `main_water_source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `older_household_members`
--
ALTER TABLE `older_household_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=810;

--
-- AUTO_INCREMENT for table `public_safety`
--
ALTER TABLE `public_safety`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `public_transportation`
--
ALTER TABLE `public_transportation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `sanitation`
--
ALTER TABLE `sanitation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `social_protection`
--
ALTER TABLE `social_protection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `spouse`
--
ALTER TABLE `spouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tenturestatus`
--
ALTER TABLE `tenturestatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `toiletfacility`
--
ALTER TABLE `toiletfacility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `unimproved_source`
--
ALTER TABLE `unimproved_source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `water_sanitation_hygiene`
--
ALTER TABLE `water_sanitation_hygiene`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `water_source_location`
--
ALTER TABLE `water_source_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `younger_household_members`
--
ALTER TABLE `younger_household_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=756;

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

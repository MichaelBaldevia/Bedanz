-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2018 at 09:20 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bedanz`
--

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Division` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `team_scoring`
--

CREATE TABLE `team_scoring` (
  `Id` int(100) NOT NULL,
  `Team_Id` varchar(100) NOT NULL,
  `Performance` int(10) NOT NULL,
  `Skill` int(10) NOT NULL,
  `Creativity_and_Originality` int(10) NOT NULL,
  `Audience_Impact` int(10) NOT NULL,
  `Late_Submission` int(10) NOT NULL DEFAULT '0',
  `Clothing_or_Props_Thrown` int(10) NOT NULL DEFAULT '0',
  `Routine_Length` int(10) NOT NULL DEFAULT '0',
  `Late_Start` int(10) NOT NULL DEFAULT '0',
  `Improper_Language` int(10) NOT NULL DEFAULT '0',
  `Lewd_Gestures` int(10) NOT NULL DEFAULT '0',
  `Damage_Incurring_Props` int(10) NOT NULL DEFAULT '0',
  `Falls_Trips_Tumbles` int(10) NOT NULL DEFAULT '0',
  `Comments` varchar(1000) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_scoring`
--

INSERT INTO `team_scoring` (`Id`, `Team_Id`, `Performance`, `Skill`, `Creativity_and_Originality`, `Audience_Impact`, `Late_Submission`, `Clothing_or_Props_Thrown`, `Routine_Length`, `Late_Start`, `Improper_Language`, `Lewd_Gestures`, `Damage_Incurring_Props`, `Falls_Trips_Tumbles`, `Comments`) VALUES
(1, 'Default Sample', 90, 90, 90, 90, 1, 1, 1, 1, 0, 0, 0, 0, 'Default Sample'),
(2, 'Default Sample1', 90, 90, 90, 90, 0, 0, 0, 0, 1, 1, 1, 1, 'Default Sample');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `team_scoring`
--
ALTER TABLE `team_scoring`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_scoring`
--
ALTER TABLE `team_scoring`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

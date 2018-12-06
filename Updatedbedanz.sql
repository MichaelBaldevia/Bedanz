-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2018 at 07:52 AM
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
-- Table structure for table `judge`
--

CREATE TABLE `judge` (
  `Id` int(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `User_Type` varchar(100) NOT NULL DEFAULT 'judge',
  `User_Name` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `judge`
--

INSERT INTO `judge` (`Id`, `Name`, `User_Type`, `User_Name`, `Password`) VALUES
(1, 'Jobert Lachica', 'judge', 'Jobert', 'Lachica'),
(2, 'Ytle Cruzado', 'judge', 'Ytle', 'Cruzado'),
(3, 'Josh Vidamo', 'judge', 'Josh', 'Vidamo'),
(4, 'bedanz', 'bedanz', 'bedanz', 'bedanz'),
(5, 'Michael Baldevia', 'admin', 'Michael', 'Baldevia');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Division` varchar(100) NOT NULL DEFAULT 'COLLEGE'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`Id`, `Name`, `Division`) VALUES
(32, 'Asian Institute of Computer Studies Sta. Rosa branch - UN Fam', 'High School'),
(33, 'Brainshire Science High School - The Prodigy', 'High School'),
(34, 'Brainshire Science High School - The P Rookies	', 'High School'),
(35, 'CHILD FORMATION CENTER - Benjamites', 'High School'),
(36, 'COLEGIO SAN AGUSTIN BIÑAN - CSA - BAILAGOS DANCE COMPANY', 'High School'),
(37, 'De La Salle University-Dasmariñas - Lasallian Patriots Dance Company', 'High School'),
(38, 'De La Salle Zobel - Zobel Dance Crew', 'High School'),
(39, 'Divine Light Academy - Divine Light Dance Company	', 'High School'),
(40, 'Far Eastern University(Alabang) - FEU Extensive Dancers', 'High School'),
(41, 'First Asia Institute of Technology and Humanities - FAITH Dance Company Rooks', 'High School'),
(42, 'Holy Rosary College - HRC Dance Company', 'High School'),
(43, 'Lakeshore Educational Institution - LSEI HOOFERS	', 'High School'),
(44, 'Malayan Colleges Laguna - Malayan Dance Crew', 'High School'),
(45, 'Olivarez College - Streets Enomenos', 'High School'),
(46, 'PAREF Woodrose - The Woodrose Dance Crew (WDC)', 'High School'),
(47, 'Queen Anne School - Maiestas', 'High School'),
(48, 'San Beda College Alabang - San Beda Dance Company', 'High School'),
(49, 'San Pedro College of Business Administration - Tigers of God	', 'High School'),
(50, 'St. Rose of Lima School Las Pinas - St. Rose of Lima Street Dance Varsity', 'High School'),
(51, 'The Fisher Valley College - SVD', 'High School'),
(52, 'Centro Escolar University Makati - CEU MAKATI DANCE COMPANY', 'COLLEGE'),
(53, 'Dr. Filemon C. Aguilar Memorial College of Las Piñas City - DFCAMPANY', 'COLLEGE'),
(54, 'FAITH Colleges - FAITH Dance Company', 'COLLEGE'),
(55, 'Immaculate Conception I-College of Arts and Technology - ICI Dance Company', 'COLLEGE'),
(56, 'Lyceum of the Philippines University-Manila - LPU Wildstyle Crew', 'COLLEGE'),
(57, 'Malayan Colleges Laguna	- Malayan Dance Crew	', 'COLLEGE'),
(58, 'Olivarez College - Streets Enomenos', 'COLLEGE'),
(59, 'San Pedro College of Business Administration - Tigers Of God	', 'COLLEGE'),
(60, 'The Fisher Valley College - Awesome Sauce', 'COLLEGE'),
(61, 'Treston International College - Treston Dance Company 	', 'COLLEGE'),
(62, 'University of Perpetual Help System Laguna(Biñan) - The Saints', 'COLLEGE');

-- --------------------------------------------------------

--
-- Table structure for table `team_deduction`
--

CREATE TABLE `team_deduction` (
  `Id` int(11) NOT NULL,
  `Team_Id` int(10) NOT NULL,
  `Late_Submission` int(10) NOT NULL,
  `Clothing_or_Props_Thrown` int(10) NOT NULL,
  `Routine_Length` int(10) NOT NULL,
  `Late_Start` int(10) NOT NULL,
  `Improper_Language` int(10) NOT NULL,
  `Lewd_Gestures` int(10) NOT NULL,
  `Damage_Incurring_Props` int(10) NOT NULL,
  `Falls_Trips_Tumbles` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_deduction`
--

INSERT INTO `team_deduction` (`Id`, `Team_Id`, `Late_Submission`, `Clothing_or_Props_Thrown`, `Routine_Length`, `Late_Start`, `Improper_Language`, `Lewd_Gestures`, `Damage_Incurring_Props`, `Falls_Trips_Tumbles`) VALUES
(8, 32, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 52, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `team_scoring`
--

CREATE TABLE `team_scoring` (
  `Id` int(100) NOT NULL,
  `Team_Id` varchar(100) NOT NULL,
  `Judge_Id` int(10) NOT NULL,
  `Performance` int(10) NOT NULL,
  `Skill` int(10) NOT NULL,
  `Creativity_and_Originality` int(10) NOT NULL,
  `Audience_Impact` int(10) NOT NULL,
  `Comments` varchar(1000) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_scoring`
--

INSERT INTO `team_scoring` (`Id`, `Team_Id`, `Judge_Id`, `Performance`, `Skill`, `Creativity_and_Originality`, `Audience_Impact`, `Comments`) VALUES
(20, '32', 1, 40, 40, 40, 40, 'Default Sample'),
(21, '52', 1, 40, 40, 40, 40, 'Default Sample');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `judge`
--
ALTER TABLE `judge`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `team_deduction`
--
ALTER TABLE `team_deduction`
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
-- AUTO_INCREMENT for table `judge`
--
ALTER TABLE `judge`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `team_deduction`
--
ALTER TABLE `team_deduction`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `team_scoring`
--
ALTER TABLE `team_scoring`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

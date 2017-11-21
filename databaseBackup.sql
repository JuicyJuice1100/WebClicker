-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 21, 2017 at 12:02 AM
-- Server version: 5.5.50-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team1`
--

-- --------------------------------------------------------

--
-- Table structure for table `Instructor`
--

CREATE TABLE IF NOT EXISTS `Instructor` (
  `InstructorId` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `HashedPassword` varchar(255) NOT NULL,
  `PasswordChanges` int(11) NOT NULL,
  `LastLogin` timestamp NULL DEFAULT NULL,
  `LastLogout` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Question`
--

CREATE TABLE IF NOT EXISTS `Question` (
  `QuestionId` int(11) NOT NULL COMMENT 'Question Number',
  `QuestionStatement` text NOT NULL COMMENT 'HTML Form',
  `CorrectAnswer` varchar(255) NOT NULL,
  `NumberOfPoints` int(11) NOT NULL,
  `TopicDescription` varchar(255) NOT NULL,
  `Keywords` varchar(255) NOT NULL,
  `SectionNumber` double NOT NULL,
  `PhpGraderCode` text NOT NULL,
  `NumberOfCorrectAnswers` int(11) DEFAULT NULL,
  `AveragePoints` double DEFAULT NULL,
  `StartTime` timestamp NULL DEFAULT NULL,
  `EndTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE IF NOT EXISTS `Student` (
  `StudentId` int(11) NOT NULL COMMENT 'StudentId',
  `Username` varchar(8) NOT NULL COMMENT 'NetId',
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `HashedPassword` varchar(255) NOT NULL,
  `PasswordChanges` int(11) NOT NULL,
  `LastLogin` timestamp NULL DEFAULT NULL,
  `LastLogout` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `SubmittedSolutions`
--

CREATE TABLE IF NOT EXISTS `SubmittedSolutions` (
  `QuestionId` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `StudentSubmission` varchar(255) DEFAULT NULL,
  `PointsEarned` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Instructor`
--
ALTER TABLE `Instructor`
  ADD PRIMARY KEY (`InstructorId`);

--
-- Indexes for table `Question`
--
ALTER TABLE `Question`
  ADD PRIMARY KEY (`QuestionId`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`StudentId`);

--
-- Indexes for table `SubmittedSolutions`
--
ALTER TABLE `SubmittedSolutions`
  ADD PRIMARY KEY (`QuestionId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

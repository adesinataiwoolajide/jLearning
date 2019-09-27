-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2019 at 01:41 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jlearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(15) NOT NULL,
  `time_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`user_id`, `name`, `email`, `password`, `role`, `time_registered`) VALUES
(1, 'Adesina Taiwo Olajumoke', 'tolajide74@gmail.com', 'b63e58a251cbdb2678919dbcd79fdc519c927304', 'Admin', '2019-09-27 06:06:48'),
(2, 'Adesina Taiwo Olajide', 'tolajide75@gmail.com', 'b63e58a251cbdb2678919dbcd79fdc519c927304', 'Admin', '2019-09-26 21:22:17'),
(3, 'Samson Ajibade', 'kolade@gmail.com', '7d18c347917942d1ca83f3b28d068246a3786215', 'Admin', '2019-09-26 21:14:48'),
(4, 'Jeremaiah', 'jerry@gmail.com', '7845277e39cb6a849fcf376218a323a8d35354fb', 'Admin', '2019-09-26 21:22:03'),
(6, 'Kolasope', 'kolasope@gmail.com', '1f680346f204138807e0209fb2e2377dcd5caeee', 'Student', '2019-09-26 22:28:58'),
(7, 'Deborah', 'deborah@gmail.com', '7a173610d1d24e3651e6fc25386b723875154ae7', 'Student', '2019-09-26 22:28:58'),
(8, 'Kemi', 'kemi@gmail.com', '0553ced5e059720b5cb5600f9b364e5f6230753b', 'Student', '2019-09-26 22:28:58'),
(9, 'Opeyemi', 'opeyemi@gmail.com', '85ebd7c3d7a3390ae75b8b410eb9acb82df6b720', 'Student', '2019-09-26 22:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `course_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_title`, `course_code`, `course_unit`, `course_status`, `course_file`, `dept_id`, `created_at`) VALUES
(14, 'Programming In High Level Languages', 'MFX220', '4', 'Required', 'Account Assignment.pdf', 2, '2019-09-27 05:46:37'),
(15, 'Structured Programming', 'CSC210', '3', 'Elective', 'ADESINA TAIWO CLASS WORK.docx', 3, '2019-09-27 05:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(255) NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `time_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `time_registered`) VALUES
(1, 'CHEMISTRY', '2019-09-26 20:56:05'),
(2, 'BIOLOGY', '2019-09-27 06:27:37'),
(3, 'COMPUTER', '2019-09-27 05:47:53'),
(10, 'ACCOUNTANCY', '2019-09-27 06:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student-id` int(255) NOT NULL,
  `student_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matric_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_id` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student-id`, `student_name`, `student_email`, `matric_number`, `phone_number`, `level`, `program`, `dept_id`, `created_at`) VALUES
(2, 'Kolasope', 'kolasope@gmail.com', '1203', '903833113', '100', 'Full Time', 1, NULL),
(3, 'Deborah', 'deborah@gmail.com', '1294', '903833333', '200', 'Full Time', 2, NULL),
(4, 'Kemi', 'kemi@gmail.com', '1225', '9038338103', '100', 'Part Time', 1, NULL),
(5, 'Opeyemi', 'opeyemi@gmail.com', '1236', '90383382243', '200', 'Part Time', 2, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student-id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student-id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

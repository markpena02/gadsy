-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 11:10 AM
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
-- Database: `gadsystem_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `proposer_id` int(11) NOT NULL,
  `evaluator_id` int(11) NOT NULL,
  `document` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `date_received` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_reviewed` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `college_office` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `proposer_id`, `evaluator_id`, `document`, `file`, `date_received`, `date_reviewed`, `status`, `remarks`, `description`, `college_office`) VALUES
(1, 1, 1, 'Gender Mainstreaming Review Form', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(2, 8, 2, '../uploads/gad.pdf', '../uploads/gad.pdf', '2024-05-21 06:09:48', '2024-05-20 16:00:00', 'Completed', 'Certification Issued', 's hsucks', ''),
(3, 8, 2, '../uploads/gad.pdf', '../uploads/gad.pdf', '2024-05-21 06:09:48', '2024-05-20 16:00:00', 'Completed', 'Certification Issued', 's hsucks', ''),
(12, 8, 2, '../uploads/Paragon.pdf', '../uploads/Paragon.pdf', '2024-05-21 07:40:59', '2024-05-20 16:00:00', 'Completed', 'Certification Issued', 'yan yan house', 'collegeOffice'),
(13, 8, 2, '../uploads/gad.pdf', '../uploads/gad.pdf', '2024-05-21 06:09:48', '2024-05-20 16:00:00', 'Completed', 'Certification Issued', 's hsucks', 'collegeOffice'),
(14, 8, 2, '../uploads/gad.pdf', '../uploads/gad.pdf', '2024-05-21 06:09:48', '2024-05-20 16:00:00', 'Completed', 'Certification Issued', 's hsucks', 'collegeOffice');

-- --------------------------------------------------------

--
-- Table structure for table `evaluators`
--

CREATE TABLE `evaluators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_initial` char(1) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `university_email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proponents`
--

CREATE TABLE `proponents` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `campus` varchar(100) NOT NULL,
  `college_office` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `role_summary` text NOT NULL,
  `university_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proponents`
--

INSERT INTO `proponents` (`id`, `full_name`, `dob`, `campus`, `college_office`, `position`, `role_summary`, `university_email`, `password`) VALUES
(1, '3213123', '2024-05-24', '12312312', '12312312312', '12', '12312312', '12312@gmail.com', '$2y$10$U4GFjEzOuA.aTHh3wxqHxezuers5gWzwipibNlDTPFo7p/w5q2eym'),
(2, '3213123', '2024-05-13', '12312312', '12312312312', '123123', '123123', '12312@gmail.com', '$2y$10$zaP.QaqBKSrBnnVULOp.auiY2PoZEKRqS3b/0CTYde76QigPZj0j.'),
(3, '123123', '2024-06-06', '123123qwe', 'qweqw eqw e', 'q weq w', '21312 qwe dq', '123123@gmail.com', '$2y$10$GkK7EhWWiplcvuVU1C/zgOBdGUaYJStKv2bweZy3pGCWFqfoDQTA6'),
(4, '123123', '2024-06-06', '123123qwe', 'qweqw eqw e', 'q weq w', '21312 qwe dq', '123123@gmail.com', '$2y$10$CL2YpjdD9Ej8sulvKtuvueZjJ0ltHtk/kvlc.0RR4vJDHi4lt6T7O'),
(5, '123123', '2024-06-06', '123123qwe', 'qweqw eqw e', 'q weq w', '21312 qwe dq', '123123@gmail.com', '$2y$10$10zT.WqZTll16zH8X2uUmurJ.WDj2qQG8nH/BbVTJXqUSIDn/igL2'),
(6, '12312312', '2024-05-23', '3123123123', '123123123', '123123123', '12312312312312', '123123123@gmail.com', '$2y$10$I5GNpKZNqPmNDiUmZTryKO9tdOuMxE7CIjMscPHGxhkNc1Bu7yZcK'),
(7, '123123123', '2024-05-22', '123123', '12312312', '123123', '123123123', '123123@gmail.com', '$2y$10$FwjkELI/bk/rT1k8V2w0wOHCCc8BboY21KXXdgwdiTZjQQrRf5MwO'),
(8, 'abcdabcdabcd', '2024-05-21', 'abcdabcdabcd', 'abcdabcdabcd', 'abcdabcdabcd', 'abcdabcdabcd', 'abcdabcdabcd@gmail.com', '$2y$10$qCBpoOq1P4akkXNNtunL4uzSP3YzGdgtc3.cV61LpDfMmAxoMWzAO'),
(9, 'ambot', '2024-05-29', 'ambot', 'ambot', 'ambot', 'ambot', 'ambot@gmail.com', '$2y$10$BK/DdsaoeLNOg2Ld0haMH.5s1Yz3WegiRdAR8kGKLNu1GH85sESE6');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` int(11) NOT NULL,
  `proposer_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `proponent_name` varchar(255) NOT NULL,
  `office` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `document` varchar(255) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL,
  `college_office` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `proposer_id`, `title`, `proponent_name`, `office`, `description`, `document`, `submitted_at`, `status`, `college_office`) VALUES
(27, 8, '123', '12312', '123123', '12312312 312 3', '../uploads/useplogo.png', '2024-05-21 06:08:08', 'pending', NULL),
(28, 8, 's hsucks', 's hsucks', 's hsucks', 's hsucks', '../uploads/gad.pdf', '2024-05-21 06:09:48', 'pending', NULL),
(29, 8, 'yan yan house', 'yan yan house', 'yan yan house', 'yan yan house', '../uploads/Paragon.pdf', '2024-05-21 07:40:59', 'pending', NULL),
(30, 8, '123', '123', '123', '123', '%PDF-1.7\r\n%????\r\n1 0 obj\r\n<</Type/Catalog/Pages 2 0 R/Lang(en) /StructTreeRoot 57 0 R/MarkInfo<</Marked true>>/Metadata 1454 0 R/ViewerPreferences 1455 0 R>>\r\nendobj\r\n2 0 obj\r\n<</Type/Pages/Count 14/Kids[ 3 0 R 25 0 R 27 0 R 29 0 R 31 0 R 33 0 R 35 0 R 37', '2024-05-21 08:27:29', 'pending', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluators`
--
ALTER TABLE `evaluators`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `university_email` (`university_email`);

--
-- Indexes for table `proponents`
--
ALTER TABLE `proponents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `evaluators`
--
ALTER TABLE `evaluators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proponents`
--
ALTER TABLE `proponents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

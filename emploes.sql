-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2022 at 09:50 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharm`
--

-- --------------------------------------------------------

--
-- Table structure for table `emploes`
--

CREATE TABLE `emploes` (
  `id` int(11) NOT NULL,
  `id_pharm` int(11) DEFAULT NULL,
  `name` tinytext COLLATE utf16_bin DEFAULT NULL,
  `type` tinytext COLLATE utf16_bin DEFAULT NULL,
  `username` tinytext COLLATE utf16_bin NOT NULL,
  `pwd` tinytext COLLATE utf16_bin NOT NULL,
  `avater` tinytext COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `emploes`
--

INSERT INTO `emploes` (`id`, `id_pharm`, `name`, `type`, `username`, `pwd`, `avater`) VALUES
(1, 1, 'wissam', 'admin', 'wissam', 'laithouna', ''),
(2, 1, 'mohsssen boulahbal', 'admin', 'mohssen', '@nothing159', ''),
(3, 1, 'hakim', 'admin', 'hakim', '@hakim159', ''),
(4, 1, 'rafik', 'worker', 'rafik', '@rafik', ''),
(5, 1, 'khouloud', 'worker', 'khouloud', '@khouloud', ''),
(6, 1, 'wided', 'worker', 'wided', '@wided', ''),
(7, 1, 'mehdi', 'worker', 'mehdi', '@mhdi', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emploes`
--
ALTER TABLE `emploes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emploes`
--
ALTER TABLE `emploes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2019 at 07:07 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foresedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(100) NOT NULL,
  `hrname` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `phno` int(14) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `dates` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `hrname`, `company`, `phno`, `emailid`, `address`, `status`, `dates`) VALUES
(5, 'Swetha Sankaran', 'Wakanda.inc', 2147483647, 'swethasankaran96@gmail.com', '6th Street, 2213', 'Called/Accepted', 1),
(6, 'Ramdev', 'Zoho', 123456789, 'babramdev123@gmail.com', 'anna nagar west, 6thmain road, cehnnai 40', 'Called/Accepted', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `vid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `token` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`vid`, `username`, `email`, `verified`, `token`, `password`) VALUES
(45, 'shantha', 'shantha2106@gmail.com', 0, '187b6cc116535064a81c72e404179c01f99417981801aac175da6f80ab9a6de6e9454fe3ace5ddc7aeffeb7810bcaf95cc09', '$2y$10$E/MatbW29yqcrhsstXh3NeJ1FBQHTFtGANWL/n6vbHEUdqaXCf72W'),
(46, 'Vignesh', 'vignesh6901@gmail.com', 1, '3cada33738adc700278a1f640e34e548a2a8b05d7e12a520a2da7a20c3851aed772f359ad6cd587db1ba44e79329fe2c5255', '$2y$10$635bg0WPUN9LpRafZajvyeXQP4I2mRNoRQvG6PtzJI8o87VlneVx.'),
(47, '7299914452', 'swethasankaran96@gmail.com', 0, '6130a9a4ad5debf5f45ae3996e2226f1d5a30c822cda24fdda124371b09d9ad8edd03037423259f2ec5aa34cfd7ff53ad167', '$2y$10$j5iJrmXO0FeM2JCAYZxMWe48bW/RTCvSZd7A3xF4nFKyCehQOZ8DS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`,`phno`,`emailid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`vid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

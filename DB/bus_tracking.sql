-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 06:43 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus tracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `gps_track`
--

CREATE TABLE `gps_track` (
  `rider_id` bigint(20) NOT NULL,
  `track_time` datetime NOT NULL DEFAULT current_timestamp(),
  `track_lng` decimal(11,7) NOT NULL,
  `track_lat` decimal(11,7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gps_track`
--

INSERT INTO `gps_track` (`rider_id`, `track_time`, `track_lng`, `track_lat`) VALUES
(0, '2023-06-15 10:43:26', '73.1039590', '21.0905256');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `feedback` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `mobile_no`, `feedback`) VALUES
(12, 'dharmendr bhai', 'parant1@gmail.com', '6352695104', 'This website is very help full for tracking school bus.'),
(13, 'gorakhnath', 'parant@gmail.com', '6352695104', 'amazing website!'),
(14, 'dishank bhai', 'parant2@gmail.com', '6352695104', 'fantastic website very help full !'),
(15, 'gorakhnath', 'gorakhnath@gmail.com', '6352695104', 'This System helps you to keep track your children travelling in the school bus.'),
(16, 'param', 'param@gmail.com', '6352695104', 'osm web page\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `eno` varchar(12) NOT NULL,
  `name` varchar(30) NOT NULL,
  `degree` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `dept` varchar(40) NOT NULL,
  `bus_route` varchar(40) NOT NULL,
  `addres` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`eno`, `name`, `degree`, `email`, `dept`, `bus_route`, `addres`, `status`, `id`) VALUES
('12', 'Jaykumar Pawar', 'Diploma', 'jaykumarpawar08@gmail.com', 'Computer', 'Surat', 'Saroli', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user',
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`, `image`) VALUES
(51, 'DRIVER', 'driver@gmail.com', '698d51a19d8a121ce581499d7b701668', 'driver', ''),
(52, 'admin ', 'admin@gmail.com', '698d51a19d8a121ce581499d7b701668', 'Admin', 'Pawar Jay.png'),
(53, 'gorakhnath', 'parant@gmail.com', '698d51a19d8a121ce581499d7b701668', 'Perant', ''),
(54, 'dharmendr bhai ', 'parant1@gmail.com', '698d51a19d8a121ce581499d7b701668', 'Perant', ''),
(55, 'dishank bhai', 'parant2@gmail.com', '698d51a19d8a121ce581499d7b701668', 'Perant', ''),
(56, 'param', 'param000@gmail.com', '985c7d985f90df4237b7c5c934ae2522', 'Perant', 'Screenshot_20221210_141555.png'),
(57, 'aa', 'aa@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Perant', 'Screenshot_2022-12-10-14-12-09-16_a27b88515698e5a58d06d430da63049d.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gps_track`
--
ALTER TABLE `gps_track`
  ADD PRIMARY KEY (`rider_id`),
  ADD KEY `track_time` (`track_time`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

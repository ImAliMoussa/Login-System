-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 21, 2019 at 08:19 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `MyUser`
--

CREATE TABLE `MyUser` (
  `user_id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `MyUser`
--

INSERT INTO `MyUser` (`user_id`, `email`, `username`, `password`, `registration_date`) VALUES
(13, 'mosalah@gmail.com', 'mosalah', '$2y$10$ObET7lyWFCtvGC2neB9pOOuhZetKk.9sCO0Xwq49QKBb9GC0lDIb6', '2019-10-20 22:26:16'),
(14, 'm@g.com', 'mosalahh', '$2y$10$OzxSUKhXlBtRSuL/jqTwQeHMeW2k5FMTcw34bo/6l8T3nkYjXw.BW', '2019-10-20 22:28:35'),
(15, 'alim@g.com', 'alimoussa', '$2y$10$K.BK/HwNViWbN9oCsWOK1.Rieh4HQdnHAFSrl7FH8V9/d4.bFgV8W', '2019-10-21 18:01:24'),
(16, 'hi@g.com', 'hiiiiiiii', '$2y$10$2Uy2WWhqsjIJlEIzvmFtOeRpi.//gw8dVZmS7.t2YeXogpKDS7xha', '2019-10-21 18:02:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `MyUser`
--
ALTER TABLE `MyUser`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `MyUser`
--
ALTER TABLE `MyUser`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

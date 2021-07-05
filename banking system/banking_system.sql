-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2021 at 03:58 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `sno` int(3) NOT NULL,
  `sender` text NOT NULL,
  `receiver` text NOT NULL,
  `amount` int(8) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`sno`, `sender`, `receiver`, `amount`, `datetime`) VALUES
(8, 'bhagi@gmail.com', 'komali@gmail.com', 100, '2021-07-05 19:02:30'),
(9, 'bhagi@gmail.com', 'komali@gmail.com', 100, '2021-07-05 19:03:36'),
(10, 'komali@gmail.com', 'bhagi@gmail.com', 100, '2021-07-05 19:06:07'),
(11, 'bhagi@gmail.com', 'bhagi@gmail.com', 100, '2021-07-05 19:07:55'),
(12, 'bhagi@gmail.com', 'komali@gmail.com', 100, '2021-07-05 19:09:42'),
(13, 'bhagi@gmail.com', 'bhag', 1000, '2021-07-05 19:10:30'),
(14, 'bhagi@gmail.com', 'komali@gmail.com', 1000, '2021-07-05 19:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `balance` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `balance`) VALUES
(1, 'Bhagi', 'bhagi@gmail.com', 51900),
(2, 'Komali', 'komali@gmail.com', 59200),
(3, 'Smrithi', 'smrithi@gmail.com', 25000),
(4, 'Raju', 'raju@gmail.com', 45000),
(5, 'Pavan', 'pavan@gmail.com', 25478),
(6, 'Eshwar', 'eshwar@gmail.com', 45476),
(7, 'Munna', 'munna@gmail.com', 32564),
(8, 'Kumari', 'kumari@gmail.com', 54623),
(9, 'Chandu', 'chandu@gmail.com', 60000),
(10, 'Mahathi', 'Mahathi@gmail.com', 46530);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `sno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

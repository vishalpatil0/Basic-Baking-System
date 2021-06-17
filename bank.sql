-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 03:43 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `srno` bigint(20) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`srno`, `name`, `email`, `balance`) VALUES
(1, 'Vishal Patil', 'vishalgpatil10@gmail.com', 1550000),
(2, 'Namrata Badge', 'namratabadge@gmail.com', 1500000),
(3, 'Vikas More', 'vikasmore@gmail.com', 899150),
(4, 'Harshada Patil', 'harshadapatil@gmail.com', 5000000),
(5, 'Rushikesh Patil', 'rushipatil@gmail.com', 4500000),
(6, 'Bhagyesh More', 'bhadyeshmore@gmail.com', 6300000),
(7, 'Ruchali Shinde', 'ruchushinde@gmail.com', 3600000),
(8, 'Anjali Joshi', 'anjalijoshi', 8500000),
(9, 'Utkarsh Bhosale', 'utkarshbhosale', 9500000);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `tno` int(11) NOT NULL,
  `sender` varchar(20) NOT NULL,
  `receiver` varchar(20) NOT NULL,
  `amount` double NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`tno`, `sender`, `receiver`, `amount`, `datetime`) VALUES
(2000, 'Namrata Badge', 'Bhagyesh More', 25693, '2021-06-17 15:31:39'),
(7002, 'Namrata Badge', 'Harshada Patil', 10000, '2021-06-17 15:39:22'),
(7003, 'Vikas More', 'Vikas More', 850, '2021-06-17 15:44:52'),
(7002, 'Namrata Badge', 'Bhagyesh More', 50000, '2021-06-17 15:45:20'),
(7001, 'Vishal Patil', 'Namrata Badge', 450000, '2021-06-17 15:46:23'),
(7004, 'Harshada Patil', 'Vishal Patil', 1000000, '2021-06-17 17:39:13'),
(7002, 'Namrata Badge', 'Vikas More', 100000, '2021-06-17 18:16:15'),
(7007, 'Ruchali Shinde', 'Vishal Patil', 1e15, '2021-06-17 18:33:45'),
(7004, 'Harshada Patil', 'Vikas More', 5e20, '2021-06-17 18:34:08'),
(7004, 'Harshada Patil', 'Vikas More', 5e20, '2021-06-17 18:34:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`srno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `srno` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

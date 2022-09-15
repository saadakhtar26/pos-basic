-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2022 at 04:15 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`) VALUES
(1, 0, 'Screw Drivers'),
(2, 1, 'Star Head');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `contact` varchar(13) DEFAULT NULL,
  `address` mediumtext DEFAULT NULL,
  `ref` varchar(150) DEFAULT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `contact`, `address`, `ref`, `reg_date`) VALUES
(1, 'Saad Akhtar', '03321712300', 'Islamabad', 'Neighbour', '2022-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `dasti_khata`
--

CREATE TABLE `dasti_khata` (
  `id` int(11) NOT NULL,
  `they_pay` tinyint(4) NOT NULL,
  `amount` mediumint(9) NOT NULL,
  `date_taken` date NOT NULL,
  `due_date` date NOT NULL,
  `person_name` varchar(150) NOT NULL,
  `disc` char(255) NOT NULL DEFAULT '',
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `total` mediumint(9) NOT NULL,
  `received` mediumint(9) NOT NULL,
  `pending` mediumint(9) NOT NULL,
  `due_date` date NOT NULL,
  `cust_id` int(255) DEFAULT NULL,
  `chain_id` int(11) DEFAULT 0,
  `pending_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `date`, `time`, `total`, `received`, `pending`, `due_date`, `cust_id`, `chain_id`, `pending_status`) VALUES
(1, '2022-09-15', '07:06:14', 108, 70, 38, '2022-09-22', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `name` char(255) NOT NULL,
  `rate` int(11) NOT NULL,
  `quantity` smallint(6) NOT NULL DEFAULT 1,
  `discount` mediumint(9) NOT NULL DEFAULT 0,
  `total` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice_id`, `name`, `rate`, `quantity`, `discount`, `total`) VALUES
(1, 1, 'High Quality', 60, 2, 10, 108);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `bar_code` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `discription` varchar(225) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `sub_category` int(11) NOT NULL DEFAULT 0,
  `buy_price` decimal(10,2) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `sale_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `bar_code`, `company`, `discription`, `category`, `sub_category`, `buy_price`, `rate`, `stock_quantity`, `sale_count`) VALUES
(1, 'High Quality ', '1234567890', 'Samsung', 'Used for electronics', 1, 2, '40.00', '60.00', 38, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dasti_khata`
--
ALTER TABLE `dasti_khata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dasti_khata`
--
ALTER TABLE `dasti_khata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

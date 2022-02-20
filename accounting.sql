-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2022 at 06:27 AM
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
-- Database: `accounting`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_heads`
--

CREATE TABLE `account_heads` (
  `id` int(11) NOT NULL,
  `type` enum('asset','liability','equity','income','expense') NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_heads`
--

INSERT INTO `account_heads` (`id`, `type`, `name`) VALUES
(1, 'asset', 'Cash'),
(2, 'asset', 'Petty cash'),
(3, 'asset', 'Cash equivalents'),
(4, 'asset', 'Short-term investments'),
(5, 'asset', 'Accounts receivable'),
(6, 'liability', 'Accounts payable'),
(7, 'liability', 'Insurance payable '),
(8, 'liability', 'Salaries payable'),
(9, 'liability', 'Rent payable'),
(10, 'equity', 'Owner’s Capital '),
(11, 'equity', 'Owner’s Withdrawals'),
(12, 'income', 'Dividends revenue'),
(13, 'income', 'Sales'),
(14, 'expense', 'Salaries expense'),
(15, 'expense', 'Depreciation expense-Furniture');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `status`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `type` enum('fixed','current') NOT NULL,
  `depreciation_rate` decimal(10,2) DEFAULT NULL,
  `txn_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `title`, `note`, `amount`, `date`, `type`, `depreciation_rate`, `txn_id`) VALUES
(5, 'Test asset', 'tst', '50000.00', '2022-02-01', 'fixed', '10.00', 36),
(6, 'Furniture', 'test', '20000.00', '2022-02-11', 'fixed', '5.00', 37),
(7, 'test', 'test', '12000.00', '2022-02-04', 'current', '0.00', 38);

-- --------------------------------------------------------

--
-- Table structure for table `equity`
--

CREATE TABLE `equity` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `txn_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equity`
--

INSERT INTO `equity` (`id`, `title`, `note`, `amount`, `date`, `txn_id`) VALUES
(2, 'test', 'test', '100000.00', '2022-02-10', 42),
(3, 'test', 'test', '2500.00', '2022-02-10', 43);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `people_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `txn_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `category_id`, `title`, `note`, `people_id`, `amount`, `date`, `txn_id`) VALUES
(13, 5, 'Dinner', 'Test Note', 4, '5000.00', '2022-02-04', 30),
(14, 4, 'Laptop', 'laptop notes', 7, '15000.00', '2022-02-11', 31),
(15, 2, 'Products Delivary', 'test notes', 5, '1500.00', '2022-02-17', 32);

-- --------------------------------------------------------

--
-- Table structure for table `expense_category`
--

CREATE TABLE `expense_category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense_category`
--

INSERT INTO `expense_category` (`id`, `category`, `status`) VALUES
(2, 'Transport', 'active'),
(4, 'Products', 'active'),
(5, 'Salary', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `people_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `txn_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `title`, `note`, `people_id`, `amount`, `date`, `txn_id`) VALUES
(2, 'test income', 'test income note', 4, '12000.00', '2022-02-16', 39),
(3, 'test', 'test', 5, '15000.00', '2022-02-16', 40),
(4, 'test', 'test', 6, '12000.00', '2022-02-24', 41);

-- --------------------------------------------------------

--
-- Table structure for table `liability`
--

CREATE TABLE `liability` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `people_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `txn_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `liability`
--

INSERT INTO `liability` (`id`, `title`, `note`, `people_id`, `amount`, `date`, `status`, `txn_id`) VALUES
(5, 'Test', 'test notes', 6, '12000.00', '2022-02-15', 'active', 33),
(6, 'Frank', 'test notes', 7, '2000.00', '2022-02-15', 'active', 34),
(7, 'Test Title', 'Test', 5, '5600.00', '2022-02-23', 'active', 35);

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `company` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `name`, `email`, `phone`, `address`, `company`, `status`) VALUES
(4, 'Smith', 'smith@gmail.com', '0246', 'New York', 'Smith and Brothers', 'active'),
(5, 'Tramp', 'tramp@doland.com', '01136', 'Nouakhali', 'Doland & Tramps', 'active'),
(6, 'Mr. Pabo', 'pabo@na.com', '015', 'Dhaka', 'PaboNa', 'active'),
(7, 'Frankling', 'frank@link.com', '01231', 'Washington DC', 'Frankling Sons', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) NOT NULL,
  `account_head_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `txn_type` enum('debit','credit') NOT NULL,
  `people_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `account_head_id`, `note`, `txn_type`, `people_id`, `amount`, `date`) VALUES
(1, 1, 'gg', 'debit', 1, '1234.00', '2022-02-05'),
(2, 10, 'hh', 'credit', 1, '678.00', '2022-02-11'),
(3, 15, 'hhh', 'credit', 1, '150.00', '2022-02-07'),
(4, 15, 'hhh', 'credit', 1, '150.00', '2022-02-07'),
(7, 15, '  hhh', 'credit', 1, '150.00', '2022-02-07'),
(16, 15, ' Hi', 'credit', 1, '700.00', '2022-02-08'),
(17, 2, 'test', 'credit', 1, '1500.00', '2022-02-15'),
(19, 6, 'Hello Tester Arif Vai', 'debit', 2, '500.00', '2022-02-17'),
(21, 7, 'Bye Jahid', 'credit', 3, '105.00', '2022-02-16'),
(22, 2, 'sadfasf', 'debit', 2, '500.00', '2022-02-17'),
(23, 2, 'fsdafsf', 'debit', 3, '0.00', '2022-02-19'),
(24, 2, 'fsdafsf', 'debit', 3, '0.00', '2022-02-19'),
(25, 3, 'sdfaasf', 'debit', 3, '500.00', '2022-02-20'),
(26, 3, 'fdssadf', 'debit', 2, '1500.00', '2022-02-26'),
(27, 13, 'fsdafs', 'credit', 2, '500.00', '2022-02-19'),
(28, 1, 'sdafasf', 'debit', 2, '500.00', '2022-02-19'),
(29, 11, 'fsadfsa', 'debit', 2, '500000.00', '2022-02-19'),
(30, 14, 'Test Note', 'credit', 4, '5000.00', '2022-02-04'),
(31, 15, 'laptop notes', 'credit', 7, '15000.00', '2022-02-11'),
(32, 15, 'test notes', 'credit', 5, '1500.00', '2022-02-17'),
(33, 6, 'test notes', 'debit', 6, '12000.00', '2022-02-15'),
(34, 9, 'test notes', 'debit', 7, '2000.00', '2022-02-15'),
(35, 8, 'Test', 'debit', 5, '5600.00', '2022-02-23'),
(36, 1, 'tst', 'debit', 4, '50000.00', '2022-02-01'),
(37, 3, 'test', 'debit', 4, '20000.00', '2022-02-11'),
(38, 4, 'test', 'debit', 5, '12000.00', '2022-02-04'),
(39, 13, 'test income note', 'credit', 4, '12000.00', '2022-02-16'),
(40, 12, 'test', 'credit', 5, '15000.00', '2022-02-16'),
(41, 13, 'test', 'credit', 6, '12000.00', '2022-02-24'),
(42, 10, 'test', 'debit', 4, '100000.00', '2022-02-10'),
(43, 11, 'test', 'credit', 5, '2500.00', '2022-02-10'),
(44, 2, 'test', 'debit', 4, '1500.00', '2022-02-18'),
(45, 6, 'hello Test', 'debit', 4, '12000.00', '2022-02-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_heads`
--
ALTER TABLE `account_heads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `txn_id` (`txn_id`);

--
-- Indexes for table `equity`
--
ALTER TABLE `equity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `txn_id` (`txn_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `people_id` (`people_id`),
  ADD KEY `txn_id` (`txn_id`);

--
-- Indexes for table `expense_category`
--
ALTER TABLE `expense_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`),
  ADD KEY `party_name` (`people_id`),
  ADD KEY `txn_id` (`txn_id`);

--
-- Indexes for table `liability`
--
ALTER TABLE `liability`
  ADD PRIMARY KEY (`id`),
  ADD KEY `party_name` (`people_id`),
  ADD KEY `txn_id` (`txn_id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_head_id` (`account_head_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_heads`
--
ALTER TABLE `account_heads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `equity`
--
ALTER TABLE `equity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `expense_category`
--
ALTER TABLE `expense_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `liability`
--
ALTER TABLE `liability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `assets_ibfk_1` FOREIGN KEY (`txn_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `equity`
--
ALTER TABLE `equity`
  ADD CONSTRAINT `equity_ibfk_1` FOREIGN KEY (`txn_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `expense_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `expense_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expense_ibfk_2` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expense_ibfk_3` FOREIGN KEY (`txn_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `income`
--
ALTER TABLE `income`
  ADD CONSTRAINT `income_ibfk_1` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `income_ibfk_2` FOREIGN KEY (`txn_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `liability`
--
ALTER TABLE `liability`
  ADD CONSTRAINT `liability_ibfk_1` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `liability_ibfk_2` FOREIGN KEY (`txn_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`account_head_id`) REFERENCES `account_heads` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2024 at 05:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atmdhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `aeration_dpt`
--

CREATE TABLE `aeration_dpt` (
  `id` int(11) NOT NULL,
  `inchargeName` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `startHour` int(11) DEFAULT NULL,
  `startMinute` int(11) DEFAULT NULL,
  `endHour` int(11) DEFAULT NULL,
  `endMinute` int(11) DEFAULT NULL,
  `teaLeafTemperature` float DEFAULT NULL,
  `atype` varchar(255) DEFAULT NULL,
  `r_type` varchar(255) DEFAULT NULL,
  `measurement` int(11) DEFAULT NULL,
  `units` varchar(50) DEFAULT NULL,
  `employeeCount` int(11) DEFAULT NULL,
  `MachineCount` int(11) DEFAULT NULL,
  `Weight1` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aeration_dpt`
--

INSERT INTO `aeration_dpt` (`id`, `inchargeName`, `date`, `startHour`, `startMinute`, `endHour`, `endMinute`, `teaLeafTemperature`, `atype`, `r_type`, `measurement`, `units`, `employeeCount`, `MachineCount`, `Weight1`) VALUES
(2, 'ravi', '2024-01-17', 4, 3, 4, 6, 0.4, 'Fire Wood ', 'FireWood', 5, 'm', 5, 0, -5),
(3, 'ravi', '2024-02-07', 6, 5, 3, 10, 5.7, 'Fire Wood ', 'FireWood', 26, 'm', 14, 15, 22),
(6, 'raja', '2024-02-05', 7, 12, 11, 13, 1.5, 'Fuel', 'Fuel', 10, 'L', 3, 8, 16),
(7, 'raja', '2024-02-05', 7, 12, 11, 13, 1.5, 'Fuel', 'Fuel', 10, 'L', 3, 8, 16),
(8, 'raja', '2024-02-22', 5, 10, 11, 5, 0.4, 'Fire Wood ', 'FireWood', 10, 'm', 4, 5, 13),
(9, 'raja', '2024-02-08', 12, 5, 4, 5, 1.1, 'Fire Wood ', 'FireWood', 6, 'm', 11, 20, 20),
(10, 'raja', '2024-02-08', 12, 5, 4, 5, 1.1, 'Fire Wood ', 'FireWood', 6, 'm', 11, 20, 20),
(11, 'Raja', '2024-02-14', 8, 10, 6, 8, 1.2, 'Fuel', 'Fuel', 5, 'L', 13, 13, 6),
(12, 'nive', '2024-02-13', 9, 8, 8, 8, 0.9, 'Fire Wood ', 'FireWood', 10, 'm', 12, 10, 21);

-- --------------------------------------------------------

--
-- Table structure for table `packing_dpt`
--

CREATE TABLE `packing_dpt` (
  `id` int(11) NOT NULL,
  `inchargeName` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `startHour` int(11) DEFAULT NULL,
  `startMinute` int(11) DEFAULT NULL,
  `endHour` int(11) DEFAULT NULL,
  `endMinute` int(11) DEFAULT NULL,
  `employeeCount` int(11) DEFAULT NULL,
  `tetype` varchar(255) DEFAULT NULL,
  `Weight1` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packing_dpt`
--

INSERT INTO `packing_dpt` (`id`, `inchargeName`, `date`, `startHour`, `startMinute`, `endHour`, `endMinute`, `employeeCount`, `tetype`, `Weight1`, `count`, `type_id`) VALUES
(2, 'raja', '2024-01-25', 3, 4, 4, 3, 3, 'OPA', 5, 3, 6),
(3, 'kamal', '2024-01-08', 1, 3, 3, 4, 8, 'FBOP', 4, 4, 2),
(12, 'ravi', '2024-02-15', 9, 6, 6, 4, 9, 'OP', 7, 5, NULL),
(13, 'ravi', '2024-02-15', 9, 6, 6, 4, 9, 'OP', 7, 5, NULL),
(14, 'ravi', '2024-02-15', 9, 6, 6, 4, 9, 'OP', 7, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rawmaterial`
--

CREATE TABLE `rawmaterial` (
  `r_id` int(11) DEFAULT NULL,
  `r_type` varchar(50) DEFAULT NULL,
  `t_quantity` int(11) DEFAULT NULL,
  `b_quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rawmaterial`
--

INSERT INTO `rawmaterial` (`r_id`, `r_type`, `t_quantity`, `b_quantity`) VALUES
(1, 'Fuel', 70, 64),
(2, 'Firewood', 79, 58);

-- --------------------------------------------------------

--
-- Table structure for table `rolling_dpt`
--

CREATE TABLE `rolling_dpt` (
  `id` int(11) NOT NULL,
  `inchargeName` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `startHour` int(11) DEFAULT NULL,
  `startMinute` int(11) DEFAULT NULL,
  `endHour` int(11) DEFAULT NULL,
  `endMinute` int(11) DEFAULT NULL,
  `employeeCount` int(11) DEFAULT NULL,
  `MachineCount` int(11) DEFAULT NULL,
  `teaLeafTemperature` float DEFAULT NULL,
  `Weight1` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rolling_dpt`
--

INSERT INTO `rolling_dpt` (`id`, `inchargeName`, `date`, `startHour`, `startMinute`, `endHour`, `endMinute`, `employeeCount`, `MachineCount`, `teaLeafTemperature`, `Weight1`) VALUES
(2, 'ravi', '2024-01-04', 4, 4, 1, 4, 10, 4, 0.4, 8),
(4, 'ravi', '2024-02-05', 12, 32, 10, 14, 14, 1, 13, 17),
(5, 'raja', '2024-02-19', 11, 9, 8, 9, 9, 1, 9, 13);

-- --------------------------------------------------------

--
-- Table structure for table `shifting_dpt`
--

CREATE TABLE `shifting_dpt` (
  `id` int(11) NOT NULL,
  `inchargeName` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `startHour` int(11) DEFAULT NULL,
  `startMinute` int(11) DEFAULT NULL,
  `endHour` int(11) DEFAULT NULL,
  `endMinute` int(11) DEFAULT NULL,
  `mtype` varchar(255) DEFAULT NULL,
  `MachineCount` int(11) DEFAULT NULL,
  `employeeCount` int(11) DEFAULT NULL,
  `tetype` varchar(255) DEFAULT NULL,
  `Weight1` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shifting_dpt`
--

INSERT INTO `shifting_dpt` (`id`, `inchargeName`, `date`, `startHour`, `startMinute`, `endHour`, `endMinute`, `mtype`, `MachineCount`, `employeeCount`, `tetype`, `Weight1`, `type_id`) VALUES
(1, 'neve', '2024-02-13', 12, 15, 12, 13, 'Bin Feeding Elavator', 20, 15, 'Dust', 35, NULL),
(2, 'neve', '2024-02-13', 7, 25, 2, 10, 'Bin Feeding Elavator', 14, 13, 'FBOP', 25, NULL),
(3, 'neve', '2024-02-13', 7, 25, 2, 10, 'Bin Feeding Elavator', 14, 13, 'FBOP', 25, NULL),
(4, 'ravi', '2024-01-31', 10, 12, 11, 9, 'Bin Feeding Elavator', 10, 12, 'FBOP', 5, NULL),
(5, 'ravi', '2024-01-31', 10, 12, 11, 9, 'Bin Feeding Elavator', 10, 12, 'FBOP', 5, NULL),
(6, 'ravi', '2024-01-31', 10, 12, 11, 9, '0', 10, 12, 'FBOP', 5, NULL),
(9, 'ravi', '2024-02-15', 12, 13, 1, 11, '0', 14, 11, 'BOP1', 18, NULL),
(11, 'neve', '2024-02-29', 9, 11, 10, 11, '0', 11, 11, 'BOPF', 200, NULL),
(12, 'rama', '2024-02-29', 12, 14, 9, 11, '0', 3, 9, 'OP', 74, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supply`
--

CREATE TABLE `supply` (
  `supply_id` int(11) NOT NULL,
  `supplier_name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `r_type` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `measurement` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supply`
--

INSERT INTO `supply` (`supply_id`, `supplier_name`, `date`, `r_type`, `quantity`, `measurement`, `user_id`) VALUES
(29, 'Raja', '2024-02-29', 'Fuel', 13, 'liters ', 14),
(34, 'Raja', '2024-02-06', 'Fuel', 16, 'liters ', 14),
(35, 'Raja', '2024-02-06', 'Fuel', 16, 'liters ', 14),
(36, 'Raja', '2024-02-06', 'Fuel', 16, 'liters ', 14),
(37, 'Kavi', '2024-02-06', 'Firewood', 19, 'Kilograms', 33),
(38, 'kavi', '2024-02-01', 'Firewood', 20, 'Meaters', 33),
(39, 'kavi', '2024-02-01', 'Firewood', 20, 'Meaters', 33),
(40, 'kavi', '2024-02-01', 'Firewood', 20, 'Meaters', 33),
(41, 'Raja', '2024-02-07', 'Fuel', 25, 'liters ', 14),
(42, 'raja', '2024-02-14', 'Tealeavees', 22, 'Kilograms', 14),
(43, 'raja', '2024-02-13', 'Tealeavees', 29, 'Kilograms', 14);

-- --------------------------------------------------------

--
-- Table structure for table `teaorder`
--

CREATE TABLE `teaorder` (
  `teabuyer_name` varchar(50) DEFAULT NULL,
  `order_weight` float DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `tetype` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teaorder`
--

INSERT INTO `teaorder` (`teabuyer_name`, `order_weight`, `order_id`, `tetype`, `user_id`, `order_date`) VALUES
('ravi', 9, 70, 'FBOP', 10, '2024-01-28'),
('ravi', 17, 71, 'BOP1', 10, '2024-01-28'),
('ravi', 15, 72, 'OPA', 10, '2024-01-28'),
('ravi', 15, 74, 'DUST', 10, '2024-01-28'),
('ravi', 17, 75, 'DUST1', 10, '2024-01-28'),
('Naruto', 7, 78, 'BOPF', 32, '2024-02-08'),
('Naruto', 90, 80, 'BOP', 32, '2024-02-08'),
('ravi', 31, 81, 'OP', 10, '2024-02-08'),
('ravi', 20, 82, 'BOP1', 10, '2024-02-09'),
('ravi', 30, 83, 'BOPF', 10, '2024-02-09'),
('ravi', 11, 84, 'FBOP', 10, '2024-02-09'),
('ravi', 11, 85, 'OP', 10, '2024-02-09'),
('ravi', 5, 86, 'OPA', 10, '2024-02-09'),
('ravi', 50, 91, 'DUST', 10, '2024-02-23'),
('ravi', 20, 92, 'DUST', 10, '2024-02-26'),
('Naruto', 10, 93, 'BOP', 32, '2024-02-26'),
('ravi', 30, 94, 'OPA', 10, '2024-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `teatype`
--

CREATE TABLE `teatype` (
  `type_id` int(11) NOT NULL,
  `tetype` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `a_weight` float DEFAULT NULL,
  `b_weight` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teatype`
--

INSERT INTO `teatype` (`type_id`, `tetype`, `description`, `image`, `a_weight`, `b_weight`) VALUES
(1, 'BOPF', 'This is one of the most common grade in Sri Lanka. Its characteristics include a neat, and fairly clear tea leaf which is smaller in size than the BOP. Its bright in color once brewed and has richness to its flavor.', 'img/bopf.jpg', 200, 130),
(2, 'FBOP', 'Grown at a low elevation in the southern part of Sri Lanka, where the sun is most intense but also has abundant rainfall as it is located in the tropical rain forest belt. As a result, the bushes grow fast and produce a tea which is renowned for its amber liquor with good strength.', 'img/fbop.jpg', 25, 14),
(3, 'BOP', 'is a system used to grade the tea. \'Broken\' refers to the treatment the leaf recieves in the roller and general handeling i.e the leaves are broken. \'Orange\' and \'pekoe\' refer to the size and quality of the leaves used. OP is at the top of the flush and so regarded as a higher quality.', 'img/bop.png', 31, 21),
(4, 'BOP1', 'This Pure Ceylon black tea is a fine grade of tea. This tea is similar to OP1 Tea, but little smaller in size. It is made of smaller and slightly wiry tea leaves.', 'img/bop1.png', 18, -2),
(5, 'OP', 'A whole leaf, well twisted tea. A delicate brew that varies in taste according to the different districts. Less wiry than OP1, but much more twisted than OPA.', 'img/op.png', 74, 34),
(6, 'OPA', 'The Orange Pekoe-A Tea in full, is a fine grade of tea which consists of slightly larger leaves, compared to other Orange Pekoe varieties like OP and OP1. OPA is the Ceylon black tea grade that has the boldest, large size leaves in appearance. Made of long bold and slightly twisted tea leaves. Once brewed, these teas have a rich aromatic forest-like scent and the lighter liquor generally has a light golden reddish color and a delicate lighter taste. This tea takes slightly longer time to brew compared to other teas, but has a unique taste compared to other smaller grades.', 'img/opa.jpg', 60, 30),
(7, 'DUST', 'Fine Dust tea is made of neat smallest broken leaf particles, consists of fairly clean broken leaf particles without much tea fiber or stalk. This is the grade found on most name brand Tea bags off the shelf. But unlike those teas, our teas are recently manufactured, fresher teas', 'img/dust.png', 60, 40),
(8, 'DUST1', 'This tea is made of neat smallest broken leaf particles, consists of fairly clean broken leaf particles without much tea fiber or stalk.', 'img/dust 1.png', 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `user_type` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `confirm_password` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `address`, `contact_number`, `user_type`, `email`, `password`, `confirm_password`, `user_id`) VALUES
('nive', 'galle', '0758596321', 'senior-fo', 'nive@gmail.com', '784512', '784512', 6),
('raja', 'jaffna', '0745263965', 'junior-fo1', 'raja@gmail.com', '748596', '748596', 7),
('ravi', 'matale', '0748596321', 'fo', 'ravi1@gmail.com', '748596', '748596', 9),
('ravi', 'jaffna', '0759632561', 'tea-buyer', 'ravi25@gmail.com', '301230', '301230', 10),
('kamal', 'galle', '0762942044', 'admin', 'kamal@gmail.com', '415263', '415263', 11),
('thiru', 'kandy', '0715506234', 'finance', 'thiru@gmail.com', '124578', '124578', 12),
('Raja', 'galle', '0758596332', 'supplier', 'Raja@gmail.com', '124578', '124578', 14),
(' Navin', 'Hatton', '0785296325', 'asst-fo1', 'navin@gmail.com', '748596', '748596', 16),
('Pravin', 'Galle', '0765263785', 'admin', 'pravin@gmail.com', '748596', '748596', 17),
('raja', 'colombo', '0758963256', 'supplier', 'raja52@gmail.com', '$2y$10$CbnT7CjUh48lfX1hVSI2uO.wF8x4kLhOAfVWzKpj8YAf9vdApqcum', '859632', 19),
('Naruto', 'matale', '0758596321', 'tea-buyer', 'naruto@gmail.com', '415263', '415263', 32),
('Kavi', 'Hatton', '0769632569', 'supplier', 'kavi@gmail.com', '748596', '748596', 33),
('raja', 'Saske ', '0762563264', 'supplier', 'saske@gmail.com', '415263', '415263', 34),
('Ramesh', 'Matale', '0759632569', 'tea-buyer', 'Ramesh@gmail.com', '986532', '986532', 37),
('naruto', 'galle', '0758596325', 'tea-buyer', 'natuto@gmail.com', '$2y$10$RDa1ocBzFPRckWzHQrRLzONXL3DAk.RSBxkUjRYPteXXtrNDLZqlK', '748596', 38);

-- --------------------------------------------------------

--
-- Table structure for table `withering_dpt`
--

CREATE TABLE `withering_dpt` (
  `id` int(11) NOT NULL,
  `inchargeName` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `startHour` int(11) DEFAULT NULL,
  `startMinute` int(11) DEFAULT NULL,
  `endHour` int(11) DEFAULT NULL,
  `endMinute` int(11) DEFAULT NULL,
  `rainfall` float DEFAULT NULL,
  `teaLeafTemperature` float DEFAULT NULL,
  `employeeCount` int(11) DEFAULT NULL,
  `Weight1` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `withering_dpt`
--

INSERT INTO `withering_dpt` (`id`, `inchargeName`, `date`, `startHour`, `startMinute`, `endHour`, `endMinute`, `rainfall`, `teaLeafTemperature`, `employeeCount`, `Weight1`) VALUES
(2, 'raju', '2024-01-11', 2, 5, 4, 5, 4, 0.4, 4, 4),
(4, 'ravi', '2024-01-17', 5, 10, 4, 10, 4, 0.3, 4, 5),
(5, 'raju', '2024-02-13', 11, 11, 12, 15, 15, 1.5, 14, 14),
(6, 'raju', '2024-02-13', 11, 11, 12, 15, 15, 1.5, 14, 14),
(7, 'raju', '2024-02-13', 11, 11, 12, 15, 15, 1.5, 14, 14),
(8, 'ravi', '2024-02-22', 4, 6, 9, 6, 8, 1.1, 10, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aeration_dpt`
--
ALTER TABLE `aeration_dpt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packing_dpt`
--
ALTER TABLE `packing_dpt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rolling_dpt`
--
ALTER TABLE `rolling_dpt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shifting_dpt`
--
ALTER TABLE `shifting_dpt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supply`
--
ALTER TABLE `supply`
  ADD PRIMARY KEY (`supply_id`);

--
-- Indexes for table `teaorder`
--
ALTER TABLE `teaorder`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_tea_order_user` (`user_id`);

--
-- Indexes for table `teatype`
--
ALTER TABLE `teatype`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `withering_dpt`
--
ALTER TABLE `withering_dpt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aeration_dpt`
--
ALTER TABLE `aeration_dpt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `packing_dpt`
--
ALTER TABLE `packing_dpt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rolling_dpt`
--
ALTER TABLE `rolling_dpt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shifting_dpt`
--
ALTER TABLE `shifting_dpt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `supply`
--
ALTER TABLE `supply`
  MODIFY `supply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `teaorder`
--
ALTER TABLE `teaorder`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `teatype`
--
ALTER TABLE `teatype`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `withering_dpt`
--
ALTER TABLE `withering_dpt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `teaorder`
--
ALTER TABLE `teaorder`
  ADD CONSTRAINT `fk_tea_order_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

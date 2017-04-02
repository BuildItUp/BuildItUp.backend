-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2017 at 11:21 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buildit`
--

-- --------------------------------------------------------

--
-- Table structure for table `budget_log`
--

CREATE TABLE `budget_log` (
  `id` int(11) NOT NULL,
  `worker_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `action` char(255) DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL,
  `token` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cash_flow`
--

CREATE TABLE `cash_flow` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `worker_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `amount` bigint(20) DEFAULT NULL,
  `description` text,
  `to_budget` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `provinces_id` int(11) DEFAULT NULL,
  `name` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `colleagues`
--

CREATE TABLE `colleagues` (
  `id` int(11) NOT NULL,
  `worker_id` int(11) DEFAULT NULL,
  `wor_worker_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `covered_loc`
--

CREATE TABLE `covered_loc` (
  `id` int(11) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `worker_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `fullname` char(255) DEFAULT NULL,
  `citizen_id` char(50) DEFAULT NULL,
  `photo_path` char(255) DEFAULT NULL,
  `address` char(255) DEFAULT NULL,
  `phone_number` char(20) DEFAULT NULL,
  `email` char(255) DEFAULT NULL,
  `budget` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `table_name` char(50) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `action` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `photo_path` char(255) DEFAULT NULL,
  `description` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `name` char(255) DEFAULT NULL,
  `type` char(50) DEFAULT NULL,
  `description` text,
  `estimated_budget` bigint(20) DEFAULT NULL,
  `fixed_budget` bigint(20) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `finish` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `name` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `id` int(11) NOT NULL,
  `name` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) not NULL,
  `username` char(255) DEFAULT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `pin` decimal(6,0) DEFAULT NULL,
  `login_as` char(10) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  'created_at' int(11) NOT NULL,
  'updated_at' int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `specialization_id` int(11) DEFAULT NULL,
  `fullname` char(255) DEFAULT NULL,
  `citizen_id` char(50) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `photo_path` char(255) DEFAULT NULL,
  `address` char(255) DEFAULT NULL,
  `phone_number` char(20) DEFAULT NULL,
  `email` char(255) DEFAULT NULL,
  `graduate` char(255) DEFAULT NULL,
  `graduate_date` date DEFAULT NULL,
  `avg_rating` float DEFAULT NULL,
  `personal_budget` bigint(20) DEFAULT NULL,
  `project_budget` bigint(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `worker_contacts`
--

CREATE TABLE `worker_contacts` (
  `id` int(11) NOT NULL,
  `worker_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `budget_log`
--
ALTER TABLE `budget_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `REFUND_LOG_FK` (`worker_id`),
  ADD KEY `TOP_UP_LOG_FK` (`customer_id`);

--
-- Indexes for table `cash_flow`
--
ALTER TABLE `cash_flow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `WORKER_SEND_MONEY_FK` (`worker_id`),
  ADD KEY `CUSTOMER_SEND_MONEY_FK` (`customer_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CITY_OF_PROVINCE_FK` (`provinces_id`);

--
-- Indexes for table `colleagues`
--
ALTER TABLE `colleagues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `KONTAK_KOLEGA_FK` (`wor_worker_id`),
  ADD KEY `KONTAK_KOLEGAS_FK` (`worker_id`);

--
-- Indexes for table `covered_loc`
--
ALTER TABLE `covered_loc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `LOKASI_YANG_DITANGANI_WORKER_FK` (`worker_id`),
  ADD KEY `KOTA_YANG_TERHANDLE_FK` (`city_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `EMAIL` (`email`),
  ADD KEY `INFO_UMUM_CUSTOMER_FK` (`user_id`),
  ADD KEY `KOTA_LAHIR_1_FK` (`city_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `USER_LOG_FK` (`user_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `NOTIFIKASI_USER_FK` (`user_id`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PROJECT_PROGRESS_FK` (`project_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CUSTOMER_PROJECTS_FK` (`customer_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `USERNAME` (`username`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `EMAIL` (`email`),
  ADD KEY `INFO_UMUM_WORKER_FK` (`user_id`),
  ADD KEY `SPESIALISASI_WORKER_FK` (`specialization_id`),
  ADD KEY `KOTA_LAHIR_FK` (`city_id`),
  ADD KEY `HANDLED_PROJECTS_FK` (`project_id`);

--
-- Indexes for table `worker_contacts`
--
ALTER TABLE `worker_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `WORKER_CONTACTS_FK` (`customer_id`),
  ADD KEY `WORKERS_FK` (`worker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `budget_log`
--
ALTER TABLE `budget_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cash_flow`
--
ALTER TABLE `cash_flow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `colleagues`
--
ALTER TABLE `colleagues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `covered_loc`
--
ALTER TABLE `covered_loc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `worker`
--
ALTER TABLE `worker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `worker_contacts`
--
ALTER TABLE `worker_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `budget_log`
--
ALTER TABLE `budget_log`
  ADD CONSTRAINT `FK_REFUND_LOG` FOREIGN KEY (`worker_id`) REFERENCES `worker` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TOP_UP_LOG` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `cash_flow`
--
ALTER TABLE `cash_flow`
  ADD CONSTRAINT `FK_CUSTOMER_SEND_MONEY` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_WORKER_SEND_MONEY` FOREIGN KEY (`worker_id`) REFERENCES `worker` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `FK_CITY_OF_PROVINCE` FOREIGN KEY (`provinces_id`) REFERENCES `provinces` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `colleagues`
--
ALTER TABLE `colleagues`
  ADD CONSTRAINT `FK_KONTAK_KOLEGA` FOREIGN KEY (`wor_worker_id`) REFERENCES `worker` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_KONTAK_KOLEGAS` FOREIGN KEY (`worker_id`) REFERENCES `worker` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `covered_loc`
--
ALTER TABLE `covered_loc`
  ADD CONSTRAINT `FK_KOTA_YANG_TERHANDLE` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_LOKASI_YANG_DITANGANI_WORKER` FOREIGN KEY (`worker_id`) REFERENCES `worker` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `FK_INFO_UMUM_CUSTOMER` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_KOTA_LAHIR_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `FK_USER_LOG` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `FK_NOTIFIKASI_USER` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `FK_PROJECT_PROGRESS` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `FK_CUSTOMER_PROJECTS` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `worker`
--
ALTER TABLE `worker`
  ADD CONSTRAINT `FK_HANDLED_PROJECTS` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_INFO_UMUM_WORKER` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_KOTA_LAHIR` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_SPESIALISASI_WORKER` FOREIGN KEY (`specialization_id`) REFERENCES `specialization` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `worker_contacts`
--
ALTER TABLE `worker_contacts`
  ADD CONSTRAINT `FK_WORKERS` FOREIGN KEY (`worker_id`) REFERENCES `worker` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_WORKER_CONTACTS` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

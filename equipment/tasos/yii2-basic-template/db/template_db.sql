-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 10:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `template_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrowing_user`
--

CREATE TABLE `borrowing_user` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `type` enum('student','employee','professor','other') NOT NULL,
  `phone` varchar(15) NOT NULL,
  `organization` varchar(64) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `translation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `ergo_id` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `supplier` varchar(64) NOT NULL,
  `invoice_number` int(35) NOT NULL,
  `invoice_date` date NOT NULL,
  `serial_number` varchar(64) NOT NULL,
  `borrowed_id` int(11) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ergo`
--

CREATE TABLE `ergo` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `name` varchar(127) NOT NULL,
  `pretty_name` varchar(127) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`, `pretty_name`, `date_created`, `date_updated`) VALUES
(1, 'male', 'ΑΡΕΝ', '2020-03-24 15:05:32', '2020-10-23 14:17:35'),
(2, 'female', 'ΘΗΛΥ', '2020-03-24 15:05:32', '2020-10-23 14:17:52'),
(3, 'unknown', 'ΑΓΝΩΣΤΟ', '2020-03-24 15:05:32', '2020-10-23 14:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `path` varchar(512) NOT NULL,
  `size` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `thumbnail_path` varchar(512) NOT NULL,
  `visible` int(11) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `name`, `path`, `size`, `width`, `height`, `thumbnail_path`, `visible`, `date_created`, `date_updated`) VALUES
(31, 'Hermes.png', 'upload/image/2/16038267561934001953.png', 62579, 512, 512, 'upload/image/2/thumbnail/16038267561080809399.png', 1, '2020-10-27 21:25:56', NULL),
(32, 'Hermes.png', 'upload/image/2/16038267641706189222.png', 62579, 512, 512, 'upload/image/2/thumbnail/16038267641852210751.png', 1, '2020-10-27 21:26:04', NULL),
(33, 'hera.png', 'upload/image/2/1603826772440550418.png', 54937, 512, 512, 'upload/image/2/thumbnail/1603826772998719638.png', 1, '2020-10-27 21:26:12', NULL),
(34, 'Male_Doctor-512.png', 'upload/image/2/16038268371835430232.png', 30555, 512, 512, 'upload/image/2/thumbnail/16038268371579619826.png', 1, '2020-10-27 21:27:17', NULL),
(35, 'Hermes.png', 'upload/image/2/160382708545480597.png', 62579, 512, 512, 'upload/image/2/thumbnail/16038270851768538859.png', 1, '2020-10-27 21:31:25', NULL),
(36, 'Hermes.png', 'upload/image/2/1603827098322679088.png', 62579, 512, 512, 'upload/image/2/thumbnail/16038270982022216687.png', 1, '2020-10-27 21:31:38', NULL),
(37, 'Hermes.png', 'upload/image/2/1603827113751493013.png', 62579, 512, 512, 'upload/image/2/thumbnail/1603827113151348866.png', 1, '2020-10-27 21:31:53', NULL),
(38, 'Male_Doctor-512.png', 'upload/image/2/1603827183913849602.png', 30555, 512, 512, 'upload/image/2/thumbnail/1603827183271511270.png', 1, '2020-10-27 21:33:03', NULL),
(39, 'Male_Doctor-512.png', 'upload/image/2/16038271931980411240.png', 30555, 512, 512, 'upload/image/2/thumbnail/16038271931571433725.png', 1, '2020-10-27 21:33:13', NULL),
(40, 'Male_Doctor-512.png', 'upload/image/2/16038273342123251215.png', 30555, 512, 512, 'upload/image/2/thumbnail/1603827334411407376.png', 1, '2020-10-27 21:35:34', NULL),
(41, 'Male_Doctor-512.png', 'upload/image/2/160382739295315938.png', 30555, 512, 512, 'upload/image/2/thumbnail/16038273921193409155.png', 1, '2020-10-27 21:36:32', NULL),
(42, 'zeus.png', 'upload/image/2/16038299481986410852.png', 40019, 682, 682, 'upload/image/2/thumbnail/16038299481024102340.png', 1, '2020-10-27 22:19:08', NULL),
(43, 'zeus.png', 'upload/image/2/1603829973122307000.png', 40019, 682, 682, 'upload/image/2/thumbnail/1603829973125416820.png', 1, '2020-10-27 22:19:33', NULL),
(44, 'Hermes.png', 'upload/image/2/16038300091764973202.png', 62579, 512, 512, 'upload/image/2/thumbnail/16038300091647415404.png', 1, '2020-10-27 22:20:09', NULL),
(45, 'Hermes.png', 'upload/image/2/16038300581385845569.png', 62579, 512, 512, 'upload/image/2/thumbnail/1603830058252514105.png', 1, '2020-10-27 22:20:58', NULL),
(46, 'Hermes.png', 'upload/image/2/1603830092800610893.png', 62579, 512, 512, 'upload/image/2/thumbnail/16038300921445264875.png', 1, '2020-10-27 22:21:32', NULL),
(47, 'Male_Doctor-512.png', 'upload/image/2/1603893537853312373.png', 30555, 512, 512, 'upload/image/2/thumbnail/16038935371170318150.png', 1, '2020-10-27 22:21:55', NULL),
(48, 'Hermes.png', 'upload/image/2/1603830130645272198.png', 62579, 512, 512, 'upload/image/2/thumbnail/16038301301315018108.png', 1, '2020-10-27 22:22:10', NULL),
(49, 'Ares.png', 'upload/image/2/160383103415409206.png', 59193, 512, 512, 'upload/image/2/thumbnail/1603831034645514098.png', 1, '2020-10-27 22:37:14', NULL),
(50, '16111308761351231694.png', 'upload/image/2/1611270732308521835.png', 33274, 399, 142, 'upload/image/2/thumbnail/16112707321967985449.png', 1, '2021-01-22 01:12:12', NULL),
(51, 'logompuioa.png', 'upload/image/9/16124399481827166457.png', 33274, 399, 142, 'upload/image/9/thumbnail/16124399481340054910.png', 1, '2021-02-04 13:59:08', NULL),
(52, 'logompuioa.png', 'upload/image/9/1612440146597467724.png', 33274, 399, 142, 'upload/image/9/thumbnail/16124401461954933732.png', 1, '2021-02-04 14:02:26', NULL),
(53, 'logompuioa.png', 'upload/image/9/16124403101981561078.png', 33274, 399, 142, 'upload/image/9/thumbnail/16124403101669545724.png', 1, '2021-02-04 14:05:10', NULL),
(54, 'logompuioa.png', 'upload/image/9/1612440594923114519.png', 33274, 399, 142, 'upload/image/9/thumbnail/1612440594650941631.png', 1, '2021-02-04 14:09:54', NULL),
(55, 'logompuioa.png', 'upload/image/9/1612440764818845215.png', 33274, 399, 142, 'upload/image/9/thumbnail/16124407641061409926.png', 1, '2021-02-04 14:12:44', NULL),
(56, 'Screenshot 2023-03-30 103749.png', 'upload/image/8/1681212741367462375.png', 312105, 2006, 761, 'upload/image/8/thumbnail/1681212741613973514.png', 1, '2023-04-11 14:32:21', NULL),
(57, 'Screenshot 2023-03-27 143720.png', 'upload/image/8/1681213286629052765.png', 582585, 841, 562, 'upload/image/8/thumbnail/1681213286268609697.png', 1, '2023-04-11 14:41:26', NULL),
(58, 'Screenshot 2023-03-27 143720.png', 'upload/image/8/16812133472036166335.png', 582585, 841, 562, 'upload/image/8/thumbnail/16812133471326785807.png', 1, '2023-04-11 14:42:27', NULL),
(59, 'Screenshot 2023-04-04 161628.png', 'upload/image/8/16812136411047711911.png', 369579, 728, 380, 'upload/image/8/thumbnail/16812136411092496846.png', 1, '2023-04-11 14:47:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(127) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_born` date NOT NULL,
  `country_id` int(11) NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `verification_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_updated` timestamp NULL DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `firstname`, `lastname`, `user_type_id`, `gender_id`, `image_id`, `phone`, `city`, `address`, `token`, `date_born`, `country_id`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `verification_token`, `date_updated`, `date_created`) VALUES
(2, 'admin', 'Odysseas', 'Tsakai', 10, 1, 49, '2147483647', 'Ioannina', 'Agias sofias 39, Anatoli', 'ydyrs5bRTlyAAbv4eDt1L4Orf5Bj_gPU', '1990-01-01', 83, '5mvxELr17-y-r0y6FDtzgqGe4SXz-hyx', '$2y$13$Lq1IJEb8U9Ndj2d/Nssz3ejIpl5x8Yn1Pn84/Vw2tALr1kMhUlelK', NULL, 'odysseas9494@gmail.com', 10, NULL, '2020-05-18 14:35:51', '2020-03-24 13:12:54'),
(8, 'doctor', 'ΓΙΑΤΡΟΣ', 'ΓΙΑΤΡΟΣ', 2, 1, 47, '6985953397', 'ΙΟΑΝΝΙΝΑ', '', 'XBuUg72NpNg7XE9gvVg1git_kRASP8zP', '1990-01-01', 83, 'OwOY4Qu_c6NkoUOJ2UUaUXj2TPP8lrrf', '$2y$13$m4bLKpXhwwlxSWiCtYIbA.UYdlpu5MWCHH4SCvLYXvV90Ro/QLGaC', NULL, 'doctor@gmail.com', 10, NULL, NULL, '2020-10-27 20:21:55'),
(34, 'tsv', 'Αναστάσιος', 'Βήττας', 10, 1, 59, '6941653439', '', '', '6VFfqA1gOkAD96RHrlMrUpt5pwtzNBw6', '1990-01-01', 0, 'QVn4UZvmBXisAeY2l_dAKI5qqr0xZNfd', '$2y$13$RFJXU5QFZIF4uTgoGJQlPuss8UTCMB6.6NWlyNIr54/8NGXbtDbV6', '6VFfqA1gOkAD96RHrlMrUpt5pwtzNBw6', 'tasosbhttas@yahoo.gr', 10, NULL, NULL, '2023-04-11 11:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `pretty_name` varchar(128) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `name`, `pretty_name`, `date_created`, `date_updated`) VALUES
(1, 'simple_user', 'Simple User', '2020-03-24 15:03:37', '0000-00-00 00:00:00'),
(2, 'manager', 'Doctor', '2020-03-24 15:04:03', '2020-12-27 08:18:57'),
(10, 'admin', 'Admin', '2020-03-24 15:04:03', '2020-03-24 15:04:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrowing_user`
--
ALTER TABLE `borrowing_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ergo_id` (`ergo_id`),
  ADD KEY `borrowed_id` (`borrowed_id`),
  ADD KEY `image_id` (`image_id`);

--
-- Indexes for table `ergo`
--
ALTER TABLE `ergo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `token` (`token`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD KEY `user_user_type_id_fk` (`user_type_id`),
  ADD KEY `user_ibfk_1` (`country_id`),
  ADD KEY `gender_id` (`gender_id`),
  ADD KEY `image_id` (`image_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `pretty_name` (`pretty_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrowing_user`
--
ALTER TABLE `borrowing_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ergo`
--
ALTER TABLE `ergo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowing_user`
--
ALTER TABLE `borrowing_user`
  ADD CONSTRAINT `borrowing_user_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `equipment` (`id`);

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `equipment_ibfk_1` FOREIGN KEY (`ergo_id`) REFERENCES `ergo` (`id`),
  ADD CONSTRAINT `equipment_ibfk_2` FOREIGN KEY (`borrowed_id`) REFERENCES `borrowing_user` (`id`),
  ADD CONSTRAINT `equipment_ibfk_3` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_user_type_id_fk` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

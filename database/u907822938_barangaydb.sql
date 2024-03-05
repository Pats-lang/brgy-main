-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 02:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u907822938_barangaydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `role` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `fullname`, `role`) VALUES
(1, 'admin1', '$2y$10$zs9N951Be4tU4vEeLK9zvuBbh3yOeMigbjWSueHs/IlKzMiocbA.W', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `img` varchar(500) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`) VALUES
(1, 'Marco', 'mrcodg13@gmail.com', 'PERAM UPUAN'),
(2, 'Arabella Belardo', 'belardoarabella@gmail.com', 'peram baso'),
(3, 'ARA', 'belardoarabella05@gmail.com', 'Hello!\n'),
(4, 'ARA', 'belardoarabella05@gmail.com', 'hI!'),
(5, 'ARA', 'belardoarabella05@gmail.com', 'YOW!');

-- --------------------------------------------------------

--
-- Table structure for table `request_assistant`
--

CREATE TABLE `request_assistant` (
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` int(11) NOT NULL,
  `purpose` varchar(500) NOT NULL,
  `request` varchar(60) NOT NULL,
  `id` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_brgyclrs`
--

CREATE TABLE `request_brgyclrs` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `yrs_res` int(4) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `purpose` varchar(500) NOT NULL,
  `request` varchar(500) NOT NULL,
  `status` int(2) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_brgyclrs`
--

INSERT INTO `request_brgyclrs` (`id`, `name`, `address`, `yrs_res`, `contact_no`, `purpose`, `request`, `status`, `email`) VALUES
(1, 'exampleName', 'exampleAddress', 20, 123456, 'examplePurpose', 'exampleRequest\r\n', 2, ''),
(2, 'Layka', 'NPC AREA A, DELENA COMPD., ROAD 7 EXT., GSIS HILLS', 12121, 11111111, 'adafasf', 'afasfaf', 2, 'afafa'),
(3, 'Layka', 'NPC AREA A, DELENA COMPD., ROAD 7 EXT., GSIS HILLS', 12121, 11111111, 'adafasf', 'afasfaf', 2, 'afafa'),
(4, 'qweqwe', 'qweqweq', 35345345, 234234234, 'sdfwewfw', 'wefwefwe', 2, 'werwer'),
(5, 'asdas', 'asdas', 231, 0, 'dasd', 'adasd', 2, 'asdas'),
(6, 'johloyd', '50 malolos', 2021, 90909091, 'asdasdasd', 'asdasdasd', 2, 'johnloydconag17@gmail.com'),
(7, 'lasasda', '50 malolos', 2121, 1111111, 'hah', 'agaga', 2, 'johnloydconag17@gmail.com`'),
(8, 'marco guzman', '50 malolos ave', 2321, 2147483647, 'educational purpose', 'barangay clearance', 2, 'johnloydconag17@gmail.com'),
(13, 'arabella', 'belardo', 212, 1323123, 'dasdasd', 'asdasd', 0, 'belardoarabella05@gmail.com'),
(14, 'arabella', 'belardo', 212, 1323123, 'dasdasd', 'asdasd', 0, 'belardoarabella05@gmail.com'),
(15, 'arabella', 'belardo', 212, 1323123, 'dasdasd', 'asdasd', 0, 'belardoarabella05@gmail.com'),
(16, 'arabella', 'belardo', 212, 1323123, 'dasdasd', 'asdasd', 0, 'belardoarabella05@gmail.com'),
(17, 'arabella', 'belardo', 212, 1323123, 'dasdasd', 'asdasd', 0, 'belardoarabella05@gmail.com'),
(18, 'arabella', 'belardo', 212, 1323123, 'dasdasd', 'asdasd', 0, 'belardoarabella05@gmail.com'),
(19, 'arabella', 'belardo', 212, 1323123, 'dasdasd', 'asdasd', 0, 'belardoarabella05@gmail.com'),
(20, 'arabella', 'belardo', 212, 1323123, 'dasdasd', 'asdasd', 0, 'belardoarabella05@gmail.com'),
(21, 'arabella', 'belardo', 212, 1323123, 'dasdasd', 'asdasd', 0, 'belardoarabella05@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `request_brgycoi`
--

CREATE TABLE `request_brgycoi` (
  `name` varchar(50) NOT NULL,
  `request` varchar(50) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `purpose` varchar(500) NOT NULL,
  `year_recidency` int(4) NOT NULL,
  `status` int(2) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_brgycoi`
--

INSERT INTO `request_brgycoi` (`name`, `request`, `contact_no`, `address`, `purpose`, `year_recidency`, `status`, `email`) VALUES
('Layka', 'asdasda', 23123, 'dsada', 'sdasdasd', 31231, 0, 'sdasd');

-- --------------------------------------------------------

--
-- Table structure for table `request_brgycor`
--

CREATE TABLE `request_brgycor` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `year_recidency` int(50) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `purpose` varchar(500) NOT NULL,
  `request` varchar(50) NOT NULL,
  `status` int(2) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_brgycor`
--

INSERT INTO `request_brgycor` (`id`, `name`, `address`, `year_recidency`, `contact_no`, `purpose`, `request`, `status`, `email`) VALUES
(1, 'asdasd', 'asdasd', 0, 1231323123, 'aasdasd', '', 0, ''),
(2, 'asdasd', 'asdasdasd', 13123, 123, 'adasd', 'sdasdd', 0, 'asdas'),
(3, 'asdasd', 'asdasdasd', 13123, 123, 'adasd', 'sdasdd', 0, 'asdas'),
(4, 'Layka', 'NPC AREA A, DELENA COMPD., ROAD 7 EXT., GSIS HILLS', 2121, 11111, 'asdasdd', 'asdasda', 0, 'sdasdas');

-- --------------------------------------------------------

--
-- Table structure for table `request_brgyid`
--

CREATE TABLE `request_brgyid` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `civil_status` varchar(20) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `precinct_no` int(11) NOT NULL,
  `gss_sss` int(11) NOT NULL,
  `tin` int(11) NOT NULL,
  `emg_name` varchar(50) NOT NULL,
  `emg_contact_no` varchar(20) NOT NULL,
  `status` int(2) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_brgyid`
--

INSERT INTO `request_brgyid` (`id`, `name`, `address`, `birth_date`, `civil_status`, `contact_no`, `precinct_no`, `gss_sss`, `tin`, `emg_name`, `emg_contact_no`, `status`, `email`) VALUES
(1, 'Cyrus Cantero', 'Libis', '2023-12-15', 'Single', '09517563059', 123, 123456, 123456789, 'Mami Gel', '214', 0, ''),
(2, 'JOHNLOYD KUNAG', 'KALOOCKAN', '2023-12-30', 'MARRIED', 'NUMBER GINAWA KONG V', 0, 0, 0, 'STRING', 'VARCAHR NA NUMBER', 0, ''),
(3, 'asda', 'asda', '2023-12-07', 'dadasd', '0', 0, 0, 0, 'weqweq', '0', 0, 'Martinezlaicamae17@gmail.com'),
(4, 'Layka', 'NPC AREA A, DELENA COMPD., ROAD 7 EXT., GSIS HILLS', '2023-12-15', 'single', '9636616469', 1112, 11111, 1111, 'maor', '11111', 0, 'Martinezlaicamae17@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `request_busclearance`
--

CREATE TABLE `request_busclearance` (
  `id` int(11) NOT NULL,
  `business_name` varchar(50) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `kof_business` varchar(50) NOT NULL,
  `yrs_res` int(4) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `purpose` varchar(500) NOT NULL,
  `status` int(2) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `account_id` int(11) NOT NULL,
  `precinct_number` varchar(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthday` date NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `sector` varchar(50) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `proof_of_identity` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL,
  `profile` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`account_id`, `precinct_number`, `first_name`, `middle_name`, `last_name`, `gender`, `birthday`, `marital_status`, `religion`, `sector`, `contact`, `address`, `email`, `proof_of_identity`, `username`, `password`, `account_created`, `status`, `profile`) VALUES
(1, 'example1', 'arabella', 'bellardo', 'example1', 'Others', '2023-12-01', 'Others', 'Others', 'None', 11111111111, '1 street', 'patriciapascual031@gmail.com', '656c7deaada71_NOV-09-23.png', 'arabella', 'belardo', '2023-12-03 05:09:07', 2, 'logo.jpg'),
(2, 'example2', 'laica', 'mae', 'martinez', 'Others', '2023-12-01', 'Others', 'Others', 'None', 22222222222, '2 street', '2', '656c7deaada71_NOV-09-23.png', 'laica', '12345', '2023-12-03 05:11:35', 2, 'logo.jpg'),
(3, '3', 'example3', 'example3', 'example3', 'Others', '2023-12-01', 'Others', 'Others', 'None', 33333333333, '3 street', '3', '656c7deaada71_NOV-09-23.png', 'example3', '$2y$10$Hj2xAkoHWXnAPXk78YP77eDw4.bKlHzoH3xedzZbQFWKKa2/bmP9y', '2023-12-03 06:15:33', 2, 'logo.jpg'),
(4, 'example4', 'example4', 'example4', 'example4', 'Others', '2023-12-19', 'Others', 'Others', 'None', 44444444444, 'street 4', '4', '656c7deaada71_NOV-09-23.png', 'example4', '$2y$10$z1dl5CAx8b7hwBcB/ZgPsOkJrdkFjcNmD1Q7laXvjTTrFeW2YtLka', '2023-12-03 06:27:59', 0, 'logo.jpg'),
(5, 'example7', 'example7', 'example7', 'example7', 'Others', '2023-12-01', 'Others', 'Others', 'None', 77777777777, '7 street id', '7', '656c7deaada71_NOV-09-23.png', 'example7', '$2y$10$9UlRMZdFMorR5GdCmgI4auYKRKEKGS3ObE2XcdjCZkdtHZljJuWpy', '2023-12-03 06:42:49', 0, 'logo.jpg'),
(6, 'example9', 'example9', 'example9', 'example9', 'Others', '2023-11-30', 'Others', 'Others', 'None', 99999999999, 'example9', '0', '656c7deaada71_NOV-09-23.png', 'admin', 'admin\r\n', '2023-12-03 06:55:40', 0, 'logo.jpg'),
(7, '', 'Marco', 'A.', 'de Guzman', 'Others', '2023-12-17', 'Others', 'Others', 'None', 9155555555, '2ND STREET', '0', '656ef205a594b_Screenshot (100)', 'mrco13', '$2y$10$06KRrJF01NnZ82qRK5dyo.0usCQVrfwpwCXG3ZoNArw6czrdDASXu', '2023-12-05 01:49:24', 0, 'logo.jpg'),
(8, '121212', 'ABEGAIL', 'PASION', 'RESIDUO', '0', '2023-12-30', 'Married', 'Christian', 'Residential', 9613443104, 'NPC AREA A, DELENA COMPD., ROAD 7 EXT., GSIS HILLS SUBD., BGY. 164, CALOOCAN CITY', 'belardoarabella05@gmail.com', '377465262_1889204731481842_2798947189495658249_n.jpg', '', '', '2023-12-18 18:27:20', 0, '377465262_1889204731481842_2798947189495658249_n.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_assistant`
--
ALTER TABLE `request_assistant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_brgyclrs`
--
ALTER TABLE `request_brgyclrs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_brgycor`
--
ALTER TABLE `request_brgycor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_brgyid`
--
ALTER TABLE `request_brgyid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_busclearance`
--
ALTER TABLE `request_busclearance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `request_assistant`
--
ALTER TABLE `request_assistant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_brgyclrs`
--
ALTER TABLE `request_brgyclrs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `request_brgycor`
--
ALTER TABLE `request_brgycor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `request_brgyid`
--
ALTER TABLE `request_brgyid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `request_busclearance`
--
ALTER TABLE `request_busclearance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

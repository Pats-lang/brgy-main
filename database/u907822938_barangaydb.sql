-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2024 at 04:04 PM
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
  `description` varchar(500) NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `img`, `title`, `description`, `last_modified`) VALUES
(1, '421942795_939844190823403_4852506872741483609_n.jpg', 'Barangay 20', 'Welcome!', '2024-04-05 06:06:35'),
(5, 'officials.jpg', 'Barangay Officials', '', '2024-03-26 07:53:10'),
(7, 'received_586949182760855-1.jpeg', 'SK', '', '2024-03-31 19:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `client_login`
--

CREATE TABLE `client_login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
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
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(100) NOT NULL,
  `img` varchar(1000) NOT NULL,
  `mission` varchar(1000) NOT NULL,
  `vission` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `img`, `mission`, `vission`) VALUES
(2, 'barangay.png', 'To achieve our vision, we will pursue a government that are geared towards transparency and accountability among its officials and employees, encourage community involvement among its constituents and considers environmental preservation and management in its developmental programs.', 'A self-reliant and progressive Barangay advocating principles and practices of good governance that help build and nurture accountability and responsibility among its public officials and employees, community participation among its constituents towards a livable and loveable environment.');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(100) NOT NULL,
  `info_des 1` mediumtext NOT NULL,
  `info_des2` mediumtext NOT NULL,
  `info_des3` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `info_des 1`, `info_des2`, `info_des3`) VALUES
(1, 'Alumni Association ', 'An alumni organization for a state university is a group or association formed by former students (alumni) of that particular state university. These organizations are typically established to serve various purposes and provide benefits to alumni, the university, and the broader community.', 'An alumni organization for a state university is a group or association formed by former students (alumni) of that particular state university. These organizations are typically established to serve various purposes and provide benefits to alumni, the university, and the broader community. \r\nAlumni organizations are essential for maintaining the spirit and legacy of a state university. They help alumni stay engaged with their alma mater, provide valuable resources, and contribute to the overall success and reputation of the university.');

-- --------------------------------------------------------

--
-- Table structure for table `inquire`
--

CREATE TABLE `inquire` (
  `id` int(11) NOT NULL,
  `i_name` varchar(50) NOT NULL,
  `i_email` varchar(200) NOT NULL,
  `i_message` varchar(1000) NOT NULL,
  `r_message` varchar(1000) NOT NULL,
  `i_status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquire`
--

INSERT INTO `inquire` (`id`, `i_name`, `i_email`, `i_message`, `r_message`, `i_status`) VALUES
(5, 'Margie Del Cstillo', 'patriciapascual031@gmail.com', 'can i have a custom event with my self place ?', 'namo', 1),
(9, 'Paula Jean ', 'paulajeanpascual@gmail.com', 'good day, are you offering a personalize event like the place of the event is will be from us ?', 'Yes, Ma\'am Paula but we need to talk about it. If you want to, we can call you via messenger or via viber so we can talk about it more.', 1),
(12, 'Joan Hazel Agpuldo', 'jhagpuldo.cbpa@gmail.com', 'hi ', 'hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 1),
(13, 'Arabella Belardo', 'belardoarabella05@gmail.com', 'hi po', 'hello pohello pohello pohello pohello pohello pohello pohello pohello pohello pohello po', 1),
(14, 'Paolo Rafael Tampico', 'paolorafaeltampico@gmail.com', 'Can you manage to organize an event for my 21st Birthday? ', 'Yes Sir Paolo! We are more than happy to organazie an event for you 21st Birthday!S', 1),
(15, 'Cathy', 'Ispongklong.031@gmail.com', 'kajfahdjkad', 'ahjkdhjahdad', 1),
(16, 'Cathy Llena ', 'cathy.llena@ucc-caloocan.edu.ph', 'can i request a special theme', 'yes we can offer that', 1),
(17, 'topeq', 'ispongklong.031@gmail.com', 'panget si tope?', 'oo panget sya ', 1),
(18, 'jhezryll roxas', 'jhezryll69@gmail.com', 'pogi mo jhez', 'oo nga pogi mo talaga', 1),
(19, 'jhezryll roxas', 'ispongklong.031@gmail.com', 'HAJHDSADHAHDSJADJAHDAJHD', 'HAJHDSADHAHDSJADJAHDAJHDHAJHDSADHAHDSJADJAHDAJHDHAJHDSADHAHDSJADJAHDAJHDHAJHDSADHAHDSJADJAHDAJHDHAJHDSADHAHDSJADJAHDAJHDHAJHDSADHAHDSJADJAHDAJHDHAJHDSADHAHDSJADJAHDAJHD', 1),
(20, 'percy ', 'ispongklong.031@gmail.com', 'ahdsahdad\r\n', 'bakiittt', 1),
(21, 'sadaadad', 'ispongklong.031@gmail.com', 'asdadsadsadsd', '', 0),
(22, 'jhezryll roxas', 'ispongklong.031@gmail.com', 'sadadsada', '', 0),
(23, 'jhezryll roxas', 'ispongklong.031@gmail.com', 'asdad', '', 0),
(24, 'jhezryll roxas', 'ispongklong.031@gmail.com', 'asdad', '', 0),
(25, 'jhezryll roxas', 'ispongklong.031@gmail.com', 'jtr', '', 0),
(26, 'Cyrus  Cruza Cantero', 'ccantero27@yahoo.com', 'asdsad', 'asdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsad', 1),
(27, 'John Loyd', 'asd@asdas', 'd', '', 0),
(28, 'test', 'asda@asdas', 'testtest', '', 0),
(29, 'asd', 'asd@test', 'asd', '', 0),
(30, 'johnloydconag', 'patriciapascual031@gmail.com', 'awwwww', '', 0),
(31, 'Paolo Rafael Salazar Tampico', 'paolorafaeltampico@gmail.com', 'Hello', 'Hi', 1),
(32, 'barangay20', 'barangay020@gmail.com', 'sample format', 'testing', 1),
(33, 'Layka', 'Martinezlaicamae17@gmail.com', 'bhjbjhuhgu', 'hello', 1),
(34, 'ronaaaaaaaaa', 'rsales059@gmail.com', 'hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 'helooooooooooooooo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `officials`
--

CREATE TABLE `officials` (
  `id` int(11) NOT NULL,
  `name_officials` varchar(1000) NOT NULL,
  `img_officials` varchar(10000) NOT NULL,
  `position` varchar(200) NOT NULL,
  `direct_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `officials`
--

INSERT INTO `officials` (`id`, `name_officials`, `img_officials`, `position`, `direct_timestamp`) VALUES
(1, 'Roel Alunan Esmana', 'KAP.jpg', 'Barangay Captain', '2024-03-25 11:23:10'),
(2, 'example 2', '300648639_438737708041921_250166913395214156_n.jpg', 'Barangay Secretary', '2024-03-25 11:27:00'),
(3, 'example 3', '309226377_5631596233589941_8774137317337940525_n.jpg', 'SK Chairman', '2024-03-25 11:27:20'),
(4, 'example 4', '370600580_988056842515636_3987781324144370246_n.jpg', 'Barangay Treasurer', '2024-03-25 11:27:32'),
(5, 'Alejandro E. Bautista', 'Alejandro E. Bautista.jpg', 'Barangay Kagawad', '2024-03-25 11:19:27'),
(6, 'Arlan Gurnot', 'Arlan Gurnot.jpg', 'Barangay Kagawad', '2024-03-25 11:20:08'),
(7, 'Arnold P. Bautista', 'Arnold P. Bautista.jpg', 'Barangay Kagawad', '2024-03-25 11:20:33'),
(8, 'Jeffrey Y. Tan', 'Jeffrey Y. Tan.jpg', 'Barangay Kagawad', '2024-03-25 11:20:49'),
(9, 'Jhoanna C. Cimarra', 'Jhoanna C. Cimarra.jpg', 'Barangay Kagawad', '2024-03-25 11:21:06'),
(10, 'Myla M. Nadurata', 'Myla M. Nadurata.jpg', 'Barangay Kagawad', '2024-03-25 11:21:27'),
(11, 'Nolan C. Asistio', 'Nolan C. Asistio.jpg', 'Barangay Kagawad', '2024-03-25 11:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(100) NOT NULL,
  `img` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `img`, `title`, `description`, `last_modified`) VALUES
(13, 'kaunlaran elementary school.jpg', 'Kaunlaran Elementary School', '', '2024-03-25 11:58:04'),
(16, 'covered court.jpg', 'Covered Court', '', '2024-03-25 11:57:10'),
(17, 'fire station.jpg', 'Fire Station', '', '2024-03-25 11:57:34'),
(18, 'palengke 2.jpg', 'Barangay 20 Palengke', '', '2024-03-25 11:58:38'),
(19, 'palengke.jpg', 'Barangay 20 Palengke', '', '2024-03-25 11:59:04'),
(20, 'palengke 3.jpg', 'Barangay 20 Palengke', '', '2024-03-25 12:01:45');

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
  `account_id` int(20) NOT NULL,
  `transaction_id` varchar(1000) NOT NULL,
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

INSERT INTO `request_brgyclrs` (`id`, `account_id`, `transaction_id`, `name`, `address`, `yrs_res`, `contact_no`, `purpose`, `request`, `status`, `email`) VALUES
(1, 1, '6789', 'exampleName', 'exampleAddress', 20, 123456, 'examplePurpose', 'exampleRequest\r\n', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `request_brgycoi`
--

CREATE TABLE `request_brgycoi` (
  `id` int(11) NOT NULL,
  `account_id` int(20) NOT NULL,
  `transaction_id` int(11) NOT NULL,
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

INSERT INTO `request_brgycoi` (`id`, `account_id`, `transaction_id`, `name`, `request`, `contact_no`, `address`, `purpose`, `year_recidency`, `status`, `email`) VALUES
(1, 1, 123456, 'Layka', 'asdasda', 23123, 'dsada', 'sdasdasd', 31231, 0, 'sdasd');

-- --------------------------------------------------------

--
-- Table structure for table `request_brgycor`
--

CREATE TABLE `request_brgycor` (
  `id` int(11) NOT NULL,
  `account_id` int(20) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
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

INSERT INTO `request_brgycor` (`id`, `account_id`, `transaction_id`, `name`, `address`, `year_recidency`, `contact_no`, `purpose`, `request`, `status`, `email`) VALUES
(1, 1, '1234', 'asdasd', 'asdasd', 0, 1231323123, 'aasdasd', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `request_brgyid`
--

CREATE TABLE `request_brgyid` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
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

INSERT INTO `request_brgyid` (`id`, `account_id`, `transaction_id`, `name`, `address`, `birth_date`, `civil_status`, `contact_no`, `precinct_no`, `gss_sss`, `tin`, `emg_name`, `emg_contact_no`, `status`, `email`) VALUES
(1, 0, 0, 'Cyrus Cantero', 'Libis', '2023-12-15', 'Single', '09517563059', 123, 123456, 123456789, 'Mami Gel', '214', 0, ''),
(2, 0, 0, 'JOHNLOYD KUNAG', 'KALOOCKAN', '2023-12-30', 'MARRIED', 'NUMBER GINAWA KONG V', 0, 0, 0, 'STRING', 'VARCAHR NA NUMBER', 0, ''),
(3, 0, 0, 'asda', 'asda', '2023-12-07', 'dadasd', '0', 0, 0, 0, 'weqweq', '0', 0, 'Martinezlaicamae17@gmail.com'),
(4, 0, 0, 'Layka', 'NPC AREA A, DELENA COMPD., ROAD 7 EXT., GSIS HILLS', '2023-12-15', 'single', '9636616469', 1112, 11111, 1111, 'maor', '11111', 0, 'Martinezlaicamae17@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `request_busclearance`
--

CREATE TABLE `request_busclearance` (
  `id` int(11) NOT NULL,
  `account_id` int(20) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `business_name` varchar(50) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `kof_business` varchar(50) NOT NULL,
  `yrs_res` int(4) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `purpose` varchar(500) NOT NULL,
  `status` int(2) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_busclearance`
--

INSERT INTO `request_busclearance` (`id`, `account_id`, `transaction_id`, `business_name`, `owner_name`, `kof_business`, `yrs_res`, `contact_no`, `purpose`, `status`, `email`) VALUES
(1, 1, 234, 'Hello', 'Hi', 'Food', 2, 0, 'Hello', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(2) NOT NULL,
  `sName` varchar(100) NOT NULL,
  `sDescription` varchar(1000) NOT NULL,
  `sAlias` varchar(100) NOT NULL,
  `sLogo` varchar(100) NOT NULL,
  `sLinks` varchar(1000) NOT NULL,
  `sAddress` varchar(100) NOT NULL,
  `sEmail` varchar(100) NOT NULL,
  `sContact` varchar(100) NOT NULL,
  `sMain` varchar(10000) NOT NULL,
  `sNorth` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sName`, `sDescription`, `sAlias`, `sLogo`, `sLinks`, `sAddress`, `sEmail`, `sContact`, `sMain`, `sNorth`) VALUES
(2, 'Barangay 20', 'Zone 2 , District II Caloocan City', 'EGBMS', 'barangay.png', 'https://www.facebook.com/barangay20zone2district2', 'Kaunlaran Village, Caloocan, Metro Manila', 'Barangay20@gmail.com', '9231065814', 'Barangay 20 in Caloocan City, located in the southern part of Caloocan City, is a dynamic neighborhood that pulsates with the energy of its residents and the rhythm of city life. The community is home to people from various backgrounds and walks of life, resulting in a diverse and eclectic mix of traditions, languages, and customs. In terms of amenities and infrastructure, Barangay 20 is well-equipped to cater to the needs of its residents. Schools, healthcare facilities, and markets are easily accessible, ensuring that essential services are accessible to everyone.', 'Barangay 20 is a barangay in the city of Caloocan. Its population as determined by the 2020 Census was 7,892. This represented 0.47% of the total population of Caloocan.');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `account_id` int(20) NOT NULL,
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

INSERT INTO `user_account` (`id`, `account_id`, `precinct_number`, `first_name`, `middle_name`, `last_name`, `gender`, `birthday`, `marital_status`, `religion`, `sector`, `contact`, `address`, `email`, `proof_of_identity`, `username`, `password`, `account_created`, `status`, `profile`) VALUES
(0, 1, 'SDdS', 'SsadSDa', 'SDsdS', 'sdSDsd', 'Male', '2024-04-11', 'Single', 'Muslim', 'Residential', 9321312312, 'SDsADad', 'example@gmail.com', '370205988_3368413556792750_9038403049331180789_n.jpg', 'example', '$2y$10$/AI6f9X6WYsazYN9dpJtMOIPTyBBfsfF0IU67GUq7y9G216aXd78i', '2024-04-05 12:27:53', 2, '370205988_3368413556792750_9038403049331180789_n.jpg');

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
-- Indexes for table `client_login`
--
ALTER TABLE `client_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquire`
--
ALTER TABLE `inquire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officials`
--
ALTER TABLE `officials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `request_brgycoi`
--
ALTER TABLE `request_brgycoi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `request_brgycor`
--
ALTER TABLE `request_brgycor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `request_brgyid`
--
ALTER TABLE `request_brgyid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_busclearance`
--
ALTER TABLE `request_busclearance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `client_login`
--
ALTER TABLE `client_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inquire`
--
ALTER TABLE `inquire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `officials`
--
ALTER TABLE `officials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `request_assistant`
--
ALTER TABLE `request_assistant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_brgyclrs`
--
ALTER TABLE `request_brgyclrs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `request_brgycoi`
--
ALTER TABLE `request_brgycoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request_brgycor`
--
ALTER TABLE `request_brgycor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `request_brgyid`
--
ALTER TABLE `request_brgyid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `request_busclearance`
--
ALTER TABLE `request_busclearance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `request_brgyclrs`
--
ALTER TABLE `request_brgyclrs`
  ADD CONSTRAINT `request_clrs` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request_brgycoi`
--
ALTER TABLE `request_brgycoi`
  ADD CONSTRAINT `request_coi` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request_brgycor`
--
ALTER TABLE `request_brgycor`
  ADD CONSTRAINT `request_cor` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request_busclearance`
--
ALTER TABLE `request_busclearance`
  ADD CONSTRAINT `request_busclearance_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

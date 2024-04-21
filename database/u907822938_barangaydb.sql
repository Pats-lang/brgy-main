-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2024 at 06:14 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_username` varchar(20) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_fullname` varchar(50) NOT NULL,
  `admin` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_username`, `admin_password`, `admin_fullname`, `admin`) VALUES
('araa', '$2y$10$vxZV5xLcIzxlqCf4x.qdAeQHy5jjuUqRWKDquhN51p4e/vbbLjqCG', 'Arabella Belardo', '1'),
('layka', '$2y$10$aYj1V1PWlNaQMxHXvRES/.2xnTPLvlXfO9pYzMLTOFgEsnTGEEM22', 'Laica Mae Martinez', '1'),
('marco', '$2y$10$ojNUeZEeJX7cGvg8TXllK.v2x4nSCOSHtJ8F0sOnLytkpYiwPZXNW', 'Marco de Guzman', '1'),
('rona', '$2y$10$GnJysKPQ2wUkY/yEws7UM.6da34n4Z6Y68wsw4tAdlPVWSLo5BLVi', 'Ronalaine Villaluna', '1'),
('rona26', '$2y$10$iRwInEkIxvg6v77nv9hoTu44LEiVKry0rUHRVQlVXdYzt35OBc1Em', 'Ronalaine N. Villalu', '2');

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
(5, 'officials.jpg', 'Barangay Officials', '', '2024-03-26 07:53:10'),
(7, 'received_586949182760855-1.jpeg', 'SK', '', '2024-03-31 19:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `change_logs`
--

CREATE TABLE `change_logs` (
  `id` int(10) NOT NULL,
  `admin` varchar(20) NOT NULL,
  `operation` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `change_logs`
--

INSERT INTO `change_logs` (`id`, `admin`, `operation`, `description`, `timestamp`) VALUES
(1, 'rona', 'add', 'Admin: <b>LAYKA</b> has been added to <b>System Administrators.</b>', '2024-04-16 02:36:13'),
(2, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-04-16 02:46:04'),
(3, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-04-16 02:46:49'),
(4, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-04-16 02:49:54'),
(5, 'rona', 'add', 'Alumni Member: <b>2024801</b> have been registered at  <b>Alumni Members.</b>', '2024-04-16 04:15:59'),
(6, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-04-16 05:05:34'),
(7, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-04-16 05:10:22'),
(8, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-04-16 14:57:05'),
(9, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-04-16 17:18:01'),
(10, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-04-17 14:45:55'),
(11, 'rona', 'add', 'Admin: <b>ARAA</b> has been added to <b>System Administrators.</b>', '2024-04-17 15:16:47'),
(12, 'araa', 'login', 'Admin: <b>ARAA</b> Just logged on to the System', '2024-04-17 15:17:01'),
(13, 'araa', 'add', 'Alumni Member: <b>20241302</b> have been registered at  <b>Alumni Members.</b>', '2024-04-17 15:52:36'),
(14, 'araa', 'add', 'Alumni Member: <b>2024401</b> have been registered at  <b>Alumni Members.</b>', '2024-04-17 15:53:51'),
(15, 'araa', 'add', 'Alumni Member: <b>2024402</b> have been registered at  <b>Alumni Members.</b>', '2024-04-17 18:00:19'),
(16, 'araa', 'login', 'Admin: <b>ARAA</b> Just logged on to the System', '2024-04-17 18:39:36'),
(17, 'layka', 'login', 'Admin: <b>LAYKA</b> Just logged on to the System', '2024-04-17 18:48:35'),
(18, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-04-17 19:19:37'),
(19, 'rona', 'add', 'Admin: <b>MARCO</b> has been added to <b>System Administrators.</b>', '2024-04-17 19:26:37'),
(20, 'rona', 'add', 'Alumni Member: <b>2024601</b> have been registered at  <b>Alumni Members.</b>', '2024-04-17 21:24:34'),
(21, 'rona', 'add', 'Alumni Member: <b>2024502</b> have been registered at  <b>Alumni Members.</b>', '2024-04-17 21:29:37'),
(22, 'rona', 'add', 'Alumni Member: <b>2024602</b> have been registered at  <b>Alumni Members.</b>', '2024-04-17 21:31:29'),
(23, 'rona', 'add', 'Alumni Member: <b>2024702</b> have been registered at  <b>Alumni Members.</b>', '2024-04-17 21:32:38'),
(24, 'araa', 'login', 'Admin: <b>ARAA</b> Just logged on to the System', '2024-04-18 08:00:11'),
(25, 'layka', 'login', 'Admin: <b>LAYKA</b> Just logged on to the System', '2024-04-18 11:07:54'),
(26, 'layka', 'edit', 'Announcement: <b>BARANGAY 20</b> has been updated at <b>Announcements.</b>', '2024-04-18 11:08:30'),
(27, 'layka', 'edit', 'Announcement: <b>BARANGAY 20</b> has been updated at <b>Announcements.</b>', '2024-04-18 11:12:02'),
(28, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-04-18 11:56:04'),
(29, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-04-18 21:05:22'),
(30, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-04-18 21:56:19'),
(31, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-04-19 09:36:39'),
(32, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-04-19 09:52:06'),
(33, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-04-19 09:59:07'),
(34, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-04-19 10:16:22'),
(35, 'marco', 'login', 'Admin: <b>MARCO</b> Just logged on to the System', '2024-04-19 15:32:07'),
(36, 'layka', 'login', 'Admin: <b>LAYKA</b> Just logged on to the System', '2024-04-20 06:05:28'),
(37, 'layka', 'edit', 'Announcement: <b>BARANGAY 20</b> has been updated at <b>Announcements.</b>', '2024-04-20 06:07:29'),
(38, 'layka', 'delete', 'Announcement: <b>AN1</b> have been deleted at <b>Announcements.</b>', '2024-04-20 06:07:59'),
(39, 'layka', 'edit', 'Inquiries <b> I-33</b> has been replied in<b>Inquiries.</b>', '2024-04-20 06:15:17'),
(40, 'rona26', 'login', 'Admin: <b>RONA26</b> Just logged on to the System', '2024-04-20 06:29:32'),
(41, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-04-20 06:32:35'),
(42, 'rona26', 'login', 'Admin: <b>RONA26</b> Just logged on to the System', '2024-04-20 06:32:58'),
(43, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-04-20 08:15:52'),
(44, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-04-20 11:57:37'),
(45, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-04-20 18:26:03'),
(46, 'rona', 'add', 'Alumni Member: <b>2024901</b> have been registered at  <b>Alumni Members.</b>', '2024-04-20 18:54:28'),
(47, 'rona', 'add', 'Alumni Member: <b>20241302</b> have been registered at  <b>Alumni Members.</b>', '2024-04-20 20:21:42'),
(48, 'rona', 'add', 'Alumni Member: <b>2024201</b> have been registered at  <b>Alumni Members.</b>', '2024-04-20 20:35:54'),
(49, 'rona', 'add', 'Alumni Member: <b>2024102</b> have been registered at  <b>Alumni Members.</b>', '2024-04-21 03:26:00'),
(50, 'rona', 'add', 'Alumni Member: <b>2024301</b> have been registered at  <b>Alumni Members.</b>', '2024-04-21 03:27:09'),
(51, 'rona', 'add', 'Alumni Member: <b>2024401</b> have been registered at  <b>Alumni Members.</b>', '2024-04-21 04:52:55'),
(52, 'rona', 'add', 'Alumni Member: <b>2024102</b> have been registered at  <b>Alumni Members.</b>', '2024-04-21 04:53:45'),
(53, 'rona', 'add', 'Alumni Member: <b>2024202</b> have been registered at  <b>Alumni Members.</b>', '2024-04-21 06:41:24'),
(54, 'rona', 'add', 'Alumni Member: <b>2024702</b> have been registered at  <b>Alumni Members.</b>', '2024-04-21 08:07:47'),
(55, 'rona', 'add', 'Alumni Member: <b>2024601</b> have been registered at  <b>Alumni Members.</b>', '2024-04-21 08:10:32'),
(56, 'rona', 'add', 'Alumni Member: <b>2024701</b> have been registered at  <b>Alumni Members.</b>', '2024-04-21 08:12:20'),
(57, 'rona', 'edit', ' Member: <b></b> has been edited at <b> Campus.</b>', '2024-04-21 08:55:05'),
(58, 'rona', 'edit', ' Member: <b></b> has been edited at <b> Campus.</b>', '2024-04-21 08:56:10'),
(59, 'rona', 'edit', ' Member: <b>PEREZ, DOMINIQUE MOHAMMAD DEJESUS</b> has been edited at <b> Campus.</b>', '2024-04-21 08:58:00'),
(60, 'rona', 'edit', ' Member: <b>GLENN, JULIET LEILA LEVY</b> has been edited at <b> Campus.</b>', '2024-04-21 09:02:07'),
(61, 'rona', 'edit', ' Member: <b></b> has been edited at <b> Campus.</b>', '2024-04-21 09:02:15'),
(62, 'rona', 'add', 'Resident Member: <b>2024802</b> have been registered at  <b>Resident Members.</b>', '2024-04-21 09:26:37'),
(63, 'rona', 'edit', ' Resident: <b>VELEZ, JAIME SYBILL MERCADO</b> has been edited at <b> Resident .</b>', '2024-04-21 09:29:40'),
(64, 'rona', 'add', 'Resident Member: <b>2024801</b> have been registered at  <b>Resident Members.</b>', '2024-04-21 09:34:31');

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
(33, 'Layka', 'Martinezlaicamae17@gmail.com', 'bhjbjhuhgu', 'ok', 1),
(34, 'ronaaaaaaaaa', 'rsales059@gmail.com', 'hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 'helooooooooooooooo', 1),
(35, 'fdfsf', 'rsales059@gmail.com', 'dsadadsdadad', 'dsfsfsfsfsfsfsfsfsf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(20) NOT NULL,
  `year` int(10) NOT NULL,
  `member_count` int(5) NOT NULL,
  `campus_id` varchar(5) DEFAULT NULL,
  `fullname` varchar(70) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `surfix` varchar(50) NOT NULL,
  `precinct` varchar(10) NOT NULL,
  `birth_date` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `civil_status` varchar(20) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `cellphone_no` varchar(20) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `time_registered` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL,
  `cid` int(2) NOT NULL,
  `idfront` varchar(100) NOT NULL,
  `idback` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `year`, `member_count`, `campus_id`, `fullname`, `lastname`, `firstname`, `middlename`, `surfix`, `precinct`, `birth_date`, `address`, `civil_status`, `religion`, `email_address`, `cellphone_no`, `picture`, `time_registered`, `status`, `cid`, `idfront`, `idback`) VALUES
(2024102, 2024, 1, '02', '', 'Manning', 'Selma', 'Yeo Walters', 'Nisi libero molestia', '5455-T', '2002-06-01', 'Libero amet consequ', 'Single', 'Iglesia ni Cristo', 'lirep@mailinator.com', '09566436566', 'avatar4.png', '2024-04-21 04:53:44', 1, 1, '', ''),
(2024202, 2024, 2, '02', '', 'Hebert', 'Finn', 'Latifah Ball', 'Id facere eos proid', '4545-G', '2007-10-29', 'Eos ut reprehenderi', 'Widow/er', 'Others', 'jovoqymyty@mailinator.com', '09456465555', 'avatar10.png', '2024-04-21 06:41:24', 3, 1, '', ''),
(2024301, 2024, 3, '01', '', 'Silva', 'Kylee', 'Calista Freeman', 'Lorem recusandae Mo', '9895-A', '2022-03-31', 'Obcaecati quam culpa', 'Single', 'Iglesia ni Cristo', 'rarynuv@mailinator.com', '09687686876', 'signature4.png', '2024-04-21 03:27:08', 3, 1, '', ''),
(2024302, 2024, 3, '02', 'Belardo, Arabella Bulawan', 'Belardo', 'Arabella', 'Bulawan', '', '5342-A', '2002-07-16', 'Caloocan city', 'Single', 'Roman Catholic', 'belardoarabella05@gmail.com', '09216390456', 'avatar8.png', '2024-04-21 07:22:56', 1, 1, '', ''),
(2024401, 2024, 4, '01', 'Blackburn, Herrod Madison Bates', 'Blackburn', 'Herrod', 'Madison Bates', 'Ut magnam inventore', '5454-F', '1982-08-29', 'Numquam quis aperiam', 'Single', 'Christian', 'rsales059@gmail.com', '09675756757', 'avatar8.png', '2024-04-21 04:52:55', 1, 1, '', ''),
(2024402, 2024, 4, '02', 'Belardo, Arabella Bulawan', 'Belardo', 'Arabella', 'Bulawan', '', '4632-B', '2002-07-16', 'caloocan', 'Single', 'Roman Catholic', 'belardoarabella05@gmail.com', '09216390456', 'avatar8.png', '2024-04-21 07:31:38', 1, 1, '', ''),
(2024501, 2024, 5, '01', 'Scott, Yuli Miriam Mcgowan', 'Scott', 'Yuli', 'Miriam Mcgowan', '', '3436-D', '2023-11-13', 'Et architecto veniam', 'Single', 'Christian', 'rsales059@gmail.com', '09434324324', 'avatar6.png', '2024-04-21 07:27:58', 1, 1, '', ''),
(2024502, 2024, 5, '02', 'Whitaker, Clayton Briar Terry', 'Whitaker', 'Clayton', 'Briar Terry', 'Consequatur Omnis s', '5657-B', '2001-07-26', 'Illo ab exercitation', 'Single', 'Roman Catholic', 'belardoarabella05@gmail.com', '09462663212', 'avatar3.png', '2024-04-21 07:59:46', 1, 1, '', ''),
(2024601, 2024, 6, '01', 'Perez, Dominique Mohammad Dejesus', 'Perez', 'Dominique', 'Mohammad Dejesus', 'Eiusmod fugit aliqu', '8676-D', '2000-12-07', 'dagat', 'Separated', 'Iglesia ni Cristo', 'epal.lang06@gmail.com', '09244567812', 'avatar4.png', '2024-04-21 08:10:32', 1, 1, '', ''),
(2024602, 2024, 6, '02', 'Glenn, Juliet Leila Levy', 'Glenn', 'Juliet', 'Leila Levy', 'Accusantium qui sed', '4543-C', '1977-04-27', 'kaunlaran', 'Married', 'Iglesia ni Cristo', 'belardoarabella05@gmail.com', '09162554332', 'avatar2.png', '2024-04-21 08:02:43', 1, 1, '', ''),
(2024701, 2024, 7, '01', '', 'Jones', 'Francesca', 'Ronan Dunlap', 'Cillum eligendi expl', '3532-C', '1974-01-05', 'Vitae nihil quibusda', 'Widow/er', 'Iglesia ni Cristo', 'epal.lang06@gmail.com', '09253647253', 'avatar6.png', '2024-04-21 08:12:20', 1, 1, '', ''),
(2024702, 2024, 7, '02', 'Delos Santo, Jasmine Bulawan', 'Delos Santo', 'Jasmine', 'Bulawan', 'Omnis vitae neque nu', '3532-B', '1996-04-30', 'Kaunlaran', 'Single', 'Roman Catholic', 'epal.lang06@gmail.com', '09251436726', 'avatar9.png', '2024-04-21 08:07:47', 1, 1, '', ''),
(2024801, 2024, 8, '01', 'Gaines, Bianca Karleigh Mcmahon', 'Gaines', 'Bianca', 'Karleigh Mcmahon', 'Numquam quia nihil n', '1465-O', '1992-07-01', 'Esse recusandae Ei', 'Married', 'Others', 'cyqotoporo@mailinator.com', '09565765766', 'avatar7.png', '2024-04-21 09:34:31', 0, 1, '', ''),
(2024802, 2024, 8, '02', 'Velez, Jaime Sybill Mercado', 'Velez', 'Jaime', 'Sybill Mercado', 'Fugit vel nobis qua', '1213-A', '1980-04-26', 'Qui modi corrupti v', 'Single', 'Roman Catholic', 'lapypyc@mailinator.com', '09576565766', 'avatar7.png', '2024-04-21 09:26:37', 2, 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `member_account`
--

CREATE TABLE `member_account` (
  `id` int(20) NOT NULL,
  `member_id` int(20) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member_account`
--

INSERT INTO `member_account` (`id`, `member_id`, `username`, `password`) VALUES
(1, 2024101, '', ''),
(2, 2024102, '', ''),
(3, 2024202, '', ''),
(4, 2024201, '', ''),
(5, 2024301, '', ''),
(6, 2024401, 'rona', '$2y$10$82Xha1o4p4sWj/i9BiESBeqUirCXg3xpFZ5GJ7m9Kjz'),
(7, 2024402, 'araa', '$2y$10$85s8pFPS3p86Kkn8lCsMueoLt1/bMEd485Kp0PKmDN6'),
(8, 0, '', '$2y$10$4Wk17.V.341wavGppdC81u0pfEzFJhzgSkVD1vEyK4m'),
(9, 2024601, 'user', 'user123'),
(10, 2024502, 'nanay', 'nanay'),
(11, 2024602, 'jibaj', '$2y$10$diKovUn.NQJHP5gBATFa5uPhLQhj9l2PAvR6U.Ja7an'),
(12, 2024702, 'layka', '$2y$10$C03brRC128sY6FAhxXV3weR6CRxd0Z9xD0ewXo4O1pO'),
(13, 2024802, 'layka', '$2y$10$7LzCuv8yHIavhwakwgSccuP1LyBns1fPIKC8p5Mmwnw'),
(14, 2024802, 'layka', '$2y$10$F54RL1L.I73kiuXZvcABleBL3FxhhoGiDCo.AGLIM2i'),
(15, 2024902, 'ronalaine', '$2y$10$6xHp4ZV2/37OggnPflnUG.DIz9cryFCdxDcNHfqC4e4UM6kpVrmQ.'),
(16, 20241002, 'araaa', '$2y$10$/kvqEAmRAG8fLDqHGHSJle6Pz4GO3EW0iBSXy72ze6JC05VRdyMdu'),
(17, 20241002, 'araaa', '$2y$10$4pnp2LK/vTnYtdNFCapmCebzJtSfuD6VOPcSOTZ73kb5XaK2DjuQG'),
(18, 20241002, 'araaa', '$2y$10$SYE65xy3DqC6Wd.u/SzUg.w6Hgj7FOPOzQATRFoMjAsZ7o3VuKV3u'),
(19, 20241102, 'laica', '$2y$10$LgblxPIyO7WoqE/wcnQBcuXZuS7D1.ZRUDwStKQcDXwRw/dL4918.'),
(20, 20241102, 'laica', '$2y$10$x8kNpYgaLVUc96gQUonXg.xqlT7goCTjIiuEo8oN0UTf5BNLaqq4K'),
(21, 2024701, 'layka', '$2y$10$Hc..J8PYcHsyhMnQc2GgCeIzLeVAzMQfBQAHj//6pmd103wC0uJdy'),
(22, 2024701, 'layka', '$2y$10$HlEBTX7A4flVcYR5kIPhjeO7jvL.kAMucYFsYPh5Kw6jjn0wHuGhW'),
(23, 20241102, 'layka', '$2y$10$8M1txuJq3Hgi9yvQglzokOFslnN.z5lQE5cKo9/FPDs/2ownbYcG2'),
(24, 2024801, 'layka', '$2y$10$tXyVZ.PjhBP.8o6kHpG.0OnjziWZVeVcZPpRBu4BiGUcB8u0nkvz.'),
(25, 20241202, 'wuzyzylyka', '$2y$10$ugDTUZ5XyMv1AA8e5kn1MOb4sttPXev62RzTmDCYORPjNZv88BsM2'),
(26, NULL, 'zyhes', '$2y$10$ABbxgiV4Jf7.6P033r69mOWs6PAyhWM3zVVMRmEATmn9uzjyi9yR2'),
(27, NULL, 'zyhes', '$2y$10$iKjbaiB3x2FfiTYa9HM.cezgbn7waw/K.2aDGUQMooOWTGjHJp7WG'),
(28, NULL, 'layka', '$2y$10$3Gk9qIZwLIdISd74Q/7XmOlqIqKGvw.Jc6IJptmqe16vAjUAIVHLe'),
(29, 20241202, 'layka', '$2y$10$KRqW6nMJ6tSb2bZ/faSs8eAfm8iYrVwj/M.5rMuoTwcNyn9KQAerK'),
(30, 20241202, 'layka', '$2y$10$U4/N91Z.DI85E7szEV.f7.jqh.j.dghQAO8BqnWpoT9tFSt4WI7.G'),
(31, 2024901, 'layka', '$2y$10$BlSpgiM6tpPpH/riwMj67.4IQi8e5j7VcaUa.6vr7qErnFbVZAmaa'),
(32, 2024901, 'layka', '$2y$10$CSrC25PSP6WrzRjEjO8U4.uyYYq7yQCNoVVQRrlha76IRBdB5ZWvS'),
(33, 20241202, 'rona', '$2y$10$j5yff4QU0AwKgMaU1IceNeRopazvm7kOd0dQIePAQccOjB.TSNoRu'),
(34, 2024901, 'arabella', '$2y$10$PvXx23XzhPDuuOBnzLzDO.m0PHvcbiWH80nqQZj99kgZIt41OrsfK'),
(35, 20241202, 'layka', '$2y$10$H7xHb0m72b.Ox/2/Z9dh0.dXktPJrOC3jmRKgH09M.in6yC4/jwHe'),
(36, 2024901, 'lahadapudi', '$2y$10$W2THpdUpSBUmhhFO9onwVe2HWs/sZer3HqV/0Bibs72cdsrOlvcXy'),
(37, 20241202, 'layka', '$2y$10$VwRjQu9jr8ea5gCdP2.i4uZzOvO5BOKsrPfxN1AyE8ce1IuPcZPd6'),
(38, 20241202, 'rona', '$2y$10$8Ti0/Kjst0zzhU4o1qioHOHYwt4kfyNQAh.LW8etVdFLGDUvf7.aW'),
(39, 2024901, 'layka', '$2y$10$K8bn/hU5xLCy0uZyOcK7qucr6rP0UaWstaxn5yxtyaWZbGwXVL4Be'),
(40, 20241202, 'layka', '$2y$10$e5/fWpzIJRiGOd7HseJiD.odqeLQC1O/toAokIoVaGp46e5fXtC4C'),
(41, 2024901, 'layka', '$2y$10$uaUaLwQSH61rvvUFDDjlaeNwaxmqHajXbQlp6tM6uDo/0b2Ku1e5W'),
(42, 2024901, 'rona', '$2y$10$t4Ykhl5OiX8CG8qWzz7wcekmXEvKY4WWK7c6.3TQq6eDTvYyo2sZ6'),
(43, 20241302, 'conag', '$2y$10$mMYa7Jp6f6yAj7EVabS/HO0MekXHdxxTZV2gl.dCLd4MoMN.QZ69K'),
(44, 2024102, 'layka', '$2y$10$Ouw/X4sbtvrPzYzehxJ8K.Sx/pywWh8GV0GShAaEnt29L7rbPLime'),
(45, 2024101, 'wumulenab', '$2y$10$lF10SN0Fct1DfcP1KfAUS.T.epZYjVxc5BtwUPni2zoKI1Q8ntnne'),
(46, 2024101, 'wumulenab', '$2y$10$HV2hyf41WlpQ1txjhJY5q.poP8qaA0qkwLBSupQGrYlrA06XxeNbO'),
(47, 2024201, 'pafyv', '$2y$10$Hb/k1jDu4RasuIzXeB24Y.ffecptYrirCMup9bngm1xEzig9c13Oq'),
(48, 2024102, 'ronaaaa', '$2y$10$89yxp7q8LoFRJsUDgwJY8OOU7wppwZ/lyRXaVS8vEnEWcH8dfGwVu'),
(49, 2024301, 'layka', '$2y$10$Pqx4sgktd7mljsIYdDh4nu/Z2afVrtaVDGIHrp/XjMfJYAsB5HSyq'),
(50, 2024401, 'ronaa', '$2y$10$OJZSEbq3jsfGAO7KiG6bJu5U0YB7JwKtUf0pBYJlGij3jSpEdsM7S'),
(51, 2024102, 'ropana', '$2y$10$Pmq4UGKCMULoVUJCRT9szOQntPeATGzxvyCq5ruc4z9JOKK2poBaS'),
(52, 2024202, 'pijusafuge', '$2y$10$bSANdRB3ZJ.IirIjAlA48e25rltzrQt.36x8X4.Am/enU4EEigMOW'),
(53, 2024302, 'abii', '$2y$10$WkAo0jnWuyEQHYTU4e1IxOe6OBNxPqpa2rb8/I9Pwdqu4W4bdh486'),
(54, 2024302, 'abii', '$2y$10$VAAi8dMXUBzwyJLxkQj2WumrUdrnSPAXLph0DKFKyc1apyBkWUdfy'),
(55, 2024302, 'abii', '$2y$10$uGws7CwKEIhvYDyuzaIUZeZqE6sqi6PwFhFyN3YTyKGA39HDAfmDO'),
(56, 2024302, 'abii', '$2y$10$1WIZ55suissBbG9f13AZfuDyk8tKT.9KcTBqpVemWjVFV08ct8j/q'),
(57, 2024501, 'rona', '$2y$10$rHotQ4nU5PYeeNwVgEYg3.29kuuvt4xQMlHnzWYCruqRYs1289ebC'),
(58, 2024402, 'ara1', '$2y$10$HVCtXB6N35DUvY4ypXtAHOhFilP6smNyk7uULDOoo.UZq/L9fnXSS'),
(59, 2024502, 'ara2', '$2y$10$Ev5Fkc9yLCIKWl8aPACkH.Uv4HsCcr5OaNKFTocxVFSNF.VUeXs36'),
(60, 2024602, 'ara3', '$2y$10$bhW0K2dF5OwL/D4Cyss59.tIx2lgnNtVRRHBCMm7hevaerp3wDpky'),
(61, 2024702, 'jas1', '$2y$10$g4rboTPK1mmVHG5I5mOqsO5PsVkhm3TS1fFcO3pM2K6CVRrRwFmwC'),
(62, 2024601, 'ulol', '$2y$10$GYMU2WfV9TnaYRIMeXKu9Oc1JRIzlkK1DVXD6mQyPEV6tTryweqtO'),
(63, 2024701, 'ulol2', '$2y$10$BLskB7J5lE1fHB0Mq4CsXuSMKyvb7is3Z9MYr3wgXzAwxXx2HdWmi'),
(64, 2024802, 'meborisopu', '$2y$10$roOzaZscpbKuzm9eDnGBRelhZGZWESZzdgBj3AJZDwGCpQ2rkOy8O'),
(65, 2024801, 'huqidyja', '$2y$10$JheF5h8IsCx.FBi4n9HM2uvuPKjrpsbXczHdUZ5Cl8DXsbF6hLdz6');

-- --------------------------------------------------------

--
-- Table structure for table `member_address`
--

CREATE TABLE `member_address` (
  `id` int(20) NOT NULL,
  `member_id` int(20) DEFAULT NULL,
  `residency` varchar(50) NOT NULL,
  `yrs_res` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member_address`
--

INSERT INTO `member_address` (`id`, `member_id`, `residency`, `yrs_res`) VALUES
(1, 2024101, 'Helper', '1990'),
(2, 2024102, 'Constraction Worker', '1989'),
(3, 2024202, 'Home Owner', '2012'),
(4, 2024201, 'Home Owner', '1973'),
(5, 2024301, 'Others', '2005'),
(6, 2024302, 'Constraction Worker', '1983'),
(7, 2024302, 'Constraction Worker', '1983'),
(8, 2024401, 'Constraction Worker', '1977'),
(9, 2024402, 'Tenant', '1975'),
(10, 2024501, 'Tenant', '1983'),
(11, 2024601, 'Helper', '2010'),
(12, 2024502, 'Tenant', '2009'),
(13, 2024602, 'Tenant', '1979'),
(14, 2024702, 'Tenant', '1997'),
(15, 2024802, 'Home Owner', '1981'),
(16, 2024802, 'Home Owner', '1981'),
(17, 2024902, 'Helper', '1983'),
(18, 20241002, 'Home Owner', '10'),
(19, 20241002, 'Home Owner', '10'),
(20, 20241002, 'Home Owner', '10'),
(21, 20241102, 'Permanent Resident', '10'),
(22, 20241102, 'Permanent Resident', '10'),
(23, 20241202, 'Tenant', '63'),
(24, NULL, 'Permanent Resident', '89'),
(25, NULL, 'Permanent Resident', '89'),
(26, NULL, 'Permanent Resident', '7');

-- --------------------------------------------------------

--
-- Table structure for table `member_emergency`
--

CREATE TABLE `member_emergency` (
  `id` int(20) NOT NULL,
  `member_id` int(20) DEFAULT NULL,
  `contact_name` varchar(50) NOT NULL,
  `contact_relation` varchar(50) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `contact_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member_emergency`
--

INSERT INTO `member_emergency` (`id`, `member_id`, `contact_name`, `contact_relation`, `contact_no`, `contact_address`) VALUES
(1, 2024101, 'Orli Ortiz', 'Perspiciatis esse', '09565766666', 'Facilis qui nostrud'),
(2, 2024102, 'Quynn Padilla', 'Voluptatem id conseq', '09454354354', 'Nostrum deserunt nat'),
(3, 2024202, 'Adena Gray', 'Aut obcaecati conseq', '09454353454', 'Odit magna ullam rep'),
(4, 2024201, 'Illana Cole', 'Non mollit consequat', '09435434444', 'Qui rerum temporibus'),
(5, 2024301, 'Doris Mcdowell', 'Proident ex possimu', '09546546545', 'Suscipit odit conseq'),
(6, 2024302, 'Moana Hayes', 'Provident expedita', '09656565655', 'Porro illum consequ'),
(7, 2024302, 'Moana Hayes', 'Provident expedita', '09656565655', 'Porro illum consequ'),
(8, 2024401, 'Bryar Odonnell', 'Quos voluptatibus ve', '09565765655', 'Nesciunt lorem prov'),
(9, 2024402, 'Knox Carrillo', 'In at ut autem sint', '09454654767', ''),
(10, 2024501, 'Patricia George', 'Iusto in in laborum', '09656565555', 'Tempore reprehender'),
(11, 0, '', '', '', ''),
(12, 2024601, 'Igor Matthews', 'Et error iure sint a', '09343243244', ''),
(13, 2024502, 'Carson Howell', 'Quia cumque ad corpo', '09554645656', ''),
(14, 2024602, 'Barry Conrad', 'Praesentium ex liber', '09434343444', ''),
(15, 2024702, 'Shaeleigh Tyson', 'Enim voluptatum debi', '09454654655', ''),
(16, 2024802, 'Branden Chen', 'Ducimus et elit ob', '09767676555', 'Quas id vero expedit'),
(17, 2024802, 'Branden Chen', 'Ducimus et elit ob', '09767676555', 'Quas id vero expedit'),
(18, 2024902, 'May Nieves', 'Consectetur irure l', '09657656566', 'Ipsum nulla soluta'),
(19, 20241002, 'Barbara Cohen', 'Grandmother', '09546545656', 'Compound'),
(20, 20241002, 'Barbara Cohen', 'Grandmother', '09546545656', 'Compound'),
(21, 20241002, 'Barbara Cohen', 'Grandmother', '09546545656', 'Compound'),
(22, 20241102, 'Aileen Martinez', '', '09296029187', ''),
(23, 20241102, 'Aileen Martinez', '', '09296029187', ''),
(24, 2024701, 'Melodie Mcintyre', '', '09656576566', ''),
(25, 2024701, 'Melodie Mcintyre', '', '09656576566', ''),
(26, 20241102, 'Wyoming Sears', '', '09878675654', ''),
(27, 2024801, 'Paloma Sparks', '', '09453454355', ''),
(28, 20241202, 'Hector Clements', '', '09978786555', ''),
(29, NULL, 'Alec Garner', '', '09432432432', ''),
(30, NULL, 'Alec Garner', '', '09432432432', ''),
(31, NULL, 'Irma Leonard', '', '09767666655', ''),
(32, 20241202, 'Dalton Walls', '', '09564654654', ''),
(33, 20241202, 'Dalton Walls', '', '09564654654', ''),
(34, 2024901, 'Jarrod Cole', '', '09534543544', ''),
(35, 2024901, 'Len Macdonald', '', '09657545643', ''),
(36, 20241202, 'Cathleen Huber', '', '09636616469', ''),
(37, 2024901, 'Cathleen Huber', '', '09636616469', ''),
(38, 20241202, 'Rhona Hester', '', '09897867544', ''),
(39, 2024901, 'Gary Santana', '', '09546456464', ''),
(40, 20241202, 'Casey Goodwin', '', '09675765555', ''),
(41, 20241202, 'Barbara Cohen', '', '09636616369', ''),
(42, 2024901, 'Breanna Cohen', '', '09656745635', ''),
(43, 20241202, 'Lila Stevenson', '', '09656545644', ''),
(44, 2024901, 'Barbara Cohen', '', '09564562242', ''),
(45, 2024901, 'Barbara Cohen', '', '09535423442', ''),
(46, 20241302, 'Kathleen Mcdaniel', '', '09545646546', ''),
(47, 2024102, 'McKenzie Calhoun', '', '09452342342', ''),
(48, 2024101, 'Miriam Whitney', '', '09634523424', ''),
(49, 2024101, 'Miriam Whitney', '', '09634523424', ''),
(50, 2024201, 'Athena Daniel', '', '09636616469', ''),
(51, 2024102, 'Dillon Booker', '', '09767567576', ''),
(52, 2024301, 'Destiny Preston', '', '09656444656', ''),
(53, 2024401, 'Magee Wall', '', '09654654555', ''),
(54, 2024102, 'Cathleen Lindsey', '', '09546343434', ''),
(55, 2024202, 'Samantha Vaughan', '', '09675765765', ''),
(56, 2024302, 'Laica Martinez', '', '09424675436', ''),
(57, 2024302, 'Laica Martinez', '', '09424675436', ''),
(58, 2024302, 'Laica Martinez', '', '09424675436', ''),
(59, 2024302, 'Laica Martinez', '', '09424675436', ''),
(60, 2024501, 'Devin Alvarado', '', '09767678678', ''),
(61, 2024402, 'Thelma Belardo', '', '09463253553', ''),
(62, 2024502, 'Arabella Belardo', '', '09123456789', ''),
(63, 2024602, 'John Lloyd Conag', '', '09263525345', ''),
(64, 2024702, 'Arabella Belardo', '', '09216390456', ''),
(65, 2024601, 'Remedios Booth', '', '09365625333', ''),
(66, 2024701, 'Keane Buchanan', '', '09525327627', ''),
(67, 2024802, 'Hayfa Cameron', '', '09876786765', ''),
(68, 2024801, 'Irene Sandoval', '', '09767576555', '');

-- --------------------------------------------------------

--
-- Table structure for table `member_proof`
--

CREATE TABLE `member_proof` (
  `id` int(20) NOT NULL,
  `member_id` int(20) DEFAULT NULL,
  `valid_id` varchar(50) NOT NULL,
  `proof_residency` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member_proof`
--

INSERT INTO `member_proof` (`id`, `member_id`, `valid_id`, `proof_residency`) VALUES
(70, 2024301, '../assets/images/proof-pictures/id1.jpg', '../assets/images/proof-pictures/doc2.jpg'),
(71, 2024401, '../assets/images/proof-pictures/avatar5.png', '../assets/images/proof-pictures/id2.jpg'),
(72, 2024102, '../assets/images/proof-pictures/id3.jpg', '../assets/images/proof-pictures/doc4.jpg'),
(73, 2024202, '../assets/images/proof-pictures/id4.png', '../assets/images/proof-pictures/doc3.png'),
(74, 2024302, 'Array', 'Array'),
(75, 2024302, 'Array', 'Array'),
(76, 2024302, 'Array', 'Array'),
(77, 2024302, 'Array', 'Array'),
(78, 2024501, '../assets/images/proof-pictures/id1.jpg', '../assets/images/proof-pictures/doc3.png'),
(79, 2024402, '../assets/images/proof-pictures/id1.jpg', '../assets/images/proof-pictures/doc2.jpg'),
(80, 2024502, '../assets/images/proof-pictures/id1.jpg', '../assets/images/proof-pictures/id2.jpg'),
(81, 2024602, '../assets/images/proof-pictures/id3.jpg', '../assets/images/proof-pictures/doc3.png'),
(82, 2024702, '../assets/images/proof-pictures/id1.jpg', '../assets/images/proof-pictures/doc4.jpg'),
(83, 2024601, '../assets/images/proof-pictures/id4.png', '../assets/images/proof-pictures/doc1.jpg'),
(84, 2024701, '../assets/images/proof-pictures/id3.jpg', '../assets/images/proof-pictures/doc2.jpg'),
(85, 2024802, '../assets/images/proof-pictures/id4.png', '../assets/images/proof-pictures/doc4.jpg'),
(86, 2024801, '../assets/images/proof-pictures/id1.jpg', '../assets/images/proof-pictures/doc4.jpg');

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
-- Table structure for table `proof`
--

CREATE TABLE `proof` (
  `id` int(20) NOT NULL,
  `member_id` int(20) DEFAULT NULL,
  `valid_id` varchar(100) NOT NULL,
  `proof_residency` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proof`
--

INSERT INTO `proof` (`id`, `member_id`, `valid_id`, `proof_residency`) VALUES
(39, 20232201, '', ''),
(42, 20232301, '', ''),
(54, 2023102, 'workComA', 'workPosA'),
(55, 2023102, 'workComB', 'workPosB'),
(56, 20232401, '', ''),
(57, 20232501, '', ''),
(58, 2023202, '', ''),
(59, 2023302, '', ''),
(60, 2023402, '', ''),
(61, 2024502, '', ''),
(62, 2024602, 'Macias and Aguirre Traders', 'Quasi quae non vel e'),
(63, 2024602, 'Macias and Aguirre Traders', 'Quasi quae non vel e'),
(64, 2024602, 'Macias and Aguirre Traders', 'Quasi quae non vel e'),
(65, 2024702, 'Brown and Goodwin Associates', 'Aliquid quae ipsum e');

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
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_username`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `change_logs`
--
ALTER TABLE `change_logs`
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
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `campus_id` (`campus_id`);

--
-- Indexes for table `member_account`
--
ALTER TABLE `member_account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_id` (`member_id`);

--
-- Indexes for table `member_address`
--
ALTER TABLE `member_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_id` (`member_id`);

--
-- Indexes for table `member_emergency`
--
ALTER TABLE `member_emergency`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_id` (`member_id`);

--
-- Indexes for table `member_proof`
--
ALTER TABLE `member_proof`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_id` (`member_id`);

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
-- Indexes for table `proof`
--
ALTER TABLE `proof`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_id` (`member_id`);

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
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `change_logs`
--
ALTER TABLE `change_logs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `member_account`
--
ALTER TABLE `member_account`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `member_address`
--
ALTER TABLE `member_address`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `member_emergency`
--
ALTER TABLE `member_emergency`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `member_proof`
--
ALTER TABLE `member_proof`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

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
-- AUTO_INCREMENT for table `proof`
--
ALTER TABLE `proof`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `request_assistant`
--
ALTER TABLE `request_assistant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_brgyclrs`
--
ALTER TABLE `request_brgyclrs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Constraints for table `member_proof`
--
ALTER TABLE `member_proof`
  ADD CONSTRAINT `member_proof_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

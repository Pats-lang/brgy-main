-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 02:33 PM
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
  `admin_fullname` varchar(20) NOT NULL,
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
(1, 'announce.jpg', 'Barangay 20', 'Welcome!', '2024-04-18 11:11:39'),
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
(43, 'rona', 'add', 'Resident Member: <b>2024101</b> have been registered at  <b>Resident Members.</b>', '2024-04-22 03:34:03'),
(44, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-04-23 06:39:21'),
(45, 'rona', 'edit', ' Resident: <b>LOPEZ, ANNA SANTOS</b> has been edited at <b> Resident .</b>', '2024-04-23 06:39:41'),
(46, 'marco', 'login', 'Admin: <b>MARCO</b> Just logged on to the System', '2024-04-23 12:39:57'),
(47, 'marco', 'login', 'Admin: <b>MARCO</b> Just logged on to the System', '2024-04-23 17:39:57'),
(48, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-04-24 01:29:57'),
(49, 'marco', 'login', 'Admin: <b>MARCO</b> Just logged on to the System', '2024-04-24 11:13:08'),
(50, 'marco', 'login', 'Admin: <b>MARCO</b> Just logged on to the System', '2024-04-24 11:57:07'),
(51, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-04-24 12:16:47'),
(52, 'rona', 'retrived', ' Resident: <b>GARRISON, FLEUR ODESSA CABRERA</b> has been Rejected at <b> Resident List .</b>', '2024-04-24 20:06:06'),
(53, 'rona', 'retrived', ' Resident: <b>GARRISON, FLEUR ODESSA CABRERA</b> has been Retrived at <b> Resident List .</b>', '2024-04-24 20:06:37'),
(54, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-04-24 22:40:47'),
(55, 'rona', 'add', 'Resident Member: <b>2024302</b> have been registered at  <b>Resident Members.</b>', '2024-04-24 22:43:01'),
(56, 'rona', 'accepted', ' Resident: <b>STEPHENSON, JACOB TATUM JACOBSON</b> has been Accepted at <b> Resident at List.</b>', '2024-04-24 22:43:59'),
(57, 'marco', 'login', 'Admin: <b>MARCO</b> Just logged on to the System', '2024-04-24 23:05:33'),
(58, 'marco', 'login', 'Admin: <b>MARCO</b> Just logged on to the System', '2024-04-24 23:11:29'),
(59, 'marco', 'login', 'Admin: <b>MARCO</b> Just logged on to the System', '2024-04-24 23:19:11'),
(60, 'marco', 'login', 'Admin: <b>MARCO</b> Just logged on to the System', '2024-04-25 05:27:33'),
(61, 'marco', 'login', 'Admin: <b>MARCO</b> Just logged on to the System', '2024-04-29 10:41:48');

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
-- Table structure for table `generatedpdf_id`
--

CREATE TABLE `generatedpdf_id` (
  `id` int(50) NOT NULL,
  `generated_file` varchar(10000) NOT NULL,
  `admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `generatedpdf_id`
--

INSERT INTO `generatedpdf_id` (`id`, `generated_file`, `admin`) VALUES
(1, '2024202', 'C:\\xampp\\htdocs\\brgy-main\\server/../assets/generat'),
(2, '2024202', 'Lopez, Anna Santos_2024202.pdf');

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
(1, 'Ronalaine Villaluna', 'rsales059@gmail.com', 'how to register in barangay 20?', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(20) NOT NULL,
  `year` int(10) NOT NULL,
  `member_count` int(5) NOT NULL,
  `campus_id` varchar(5) DEFAULT NULL,
  `fullname` varchar(50) NOT NULL,
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
  `signature` varchar(100) NOT NULL,
  `time_registered` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL,
  `cid` int(2) NOT NULL,
  `idfront` varchar(100) NOT NULL,
  `idback` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `year`, `member_count`, `campus_id`, `fullname`, `lastname`, `firstname`, `middlename`, `surfix`, `precinct`, `birth_date`, `address`, `civil_status`, `religion`, `email_address`, `cellphone_no`, `picture`, `signature`, `time_registered`, `status`, `cid`, `idfront`, `idback`) VALUES
(2024101, 2024, 1, '01', 'Garrison, Fleur Odessa Cabrera', 'Garrison', 'Fleur', 'Odessa Cabrera', 'Veniam quaerat ad a', '9876-G', '1982-08-14', 'Quisquam id eaque q', 'Married', 'Iglesia ni Cristo', 'cofyp@mailinator.com', '09645645467', 'avatar1.png', '', '2024-04-22 03:34:03', 1, 1, 'id_card_2024101.jpg', 'id_back_2024101.jpg'),
(2024102, 2024, 1, '02', 'Hanson, Trevor Maya Roman', 'Hanson', 'Trevor', 'Maya Roman', 'jr.', '4567-A', '2014-09-02', '603Exercitation volupta', 'Single', 'Roman Catholic', 'rsales059@gmail.com', '09656454353', 'avatar2.png', '', '2024-04-22 03:24:55', 0, 1, '', ''),
(2024202, 2024, 2, '02', 'Lopez, Anna Santos', 'Lopez', 'Anna', 'Santos', '', '1234-A', '2000-11-11', '21 3rd Street Avenue', 'Single', 'Roman Catholic', 'mrcodg13@gmail.com', '09155689713', 'avatar9.png', '', '2024-04-23 06:37:04', 1, 1, 'id_card_2024202.jpg', 'id_back_2024202.jpg'),
(2024302, 2024, 3, '02', 'Stephenson, Jacob Tatum Jacobson', 'Stephenson', 'Jacob', 'Tatum Jacobson', 'Perspiciatis autem', '1234-A', '1984-07-29', 'Non tempor eos quibu', 'Widow/er', 'Roman Catholic', 'rsales059@gmail.com', '09636616469', 'avatar3.png', '', '2024-04-24 22:43:01', 1, 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `member_account`
--

CREATE TABLE `member_account` (
  `id` int(20) NOT NULL,
  `member_id` int(20) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member_account`
--

INSERT INTO `member_account` (`id`, `member_id`, `username`, `password`) VALUES
(27, 2024102, 'user', '$2y$10$TTh1Bi8X/tqKOGH2hA.Df.vfrZw/40hiZEMNvsH1bsuVYuw9zEEK6'),
(28, 2024102, 'ronalaine', '$2y$10$SPTYV1CJJAxnhfMOTsERXuVfXois0F/NQWebRTXevxa5uiaGjU0i6'),
(29, 2024101, 'quvemohupa', '$2y$10$PAMXBQrgFNOndsJpABSWbu/OTfWYlU8po.9cfUaPF0FiQct1I6Efi'),
(30, 2024202, 'test', '$2y$10$nO5Rno3/wqSLWY9nvX7zFuyUKflQRC6EsY0dHUzpO6Fw8vU1.8hI6'),
(31, 2024302, 'rona', '$2y$10$svL51ktv.5A6.8l4Nn.FC.paoI0PB6tcQNuOv3VdEIdndSTXYMwPG');

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
(21, 2024202, 'Permanent Resident', '17'),
(22, 2024302, 'Tenant', '58');

-- --------------------------------------------------------

--
-- Table structure for table `member_emergency`
--

CREATE TABLE `member_emergency` (
  `id` int(20) NOT NULL,
  `member_id` int(20) DEFAULT NULL,
  `contact_name` varchar(50) NOT NULL,
  `contact_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member_emergency`
--

INSERT INTO `member_emergency` (`id`, `member_id`, `contact_name`, `contact_no`) VALUES
(30, 2024102, 'Gabriel Stone', '09655564534'),
(31, 2024102, 'Kamal Payne', '09546545333'),
(32, 2024101, 'Neve Houston', '09765654543'),
(33, 2024202, 'Jane Lopez', '09155689713'),
(34, 2024302, 'Alan Logan', '09636616469');

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
(74, 2024102, '../assets/images/proof-pictures/id1.jpg', '../assets/images/proof-pictures/doc3.png'),
(75, 2024102, '../assets/images/proof-pictures/id2.jpg', '../assets/images/proof-pictures/doc3.png'),
(76, 2024101, '../assets/images/proof-pictures/id4.png', '../assets/images/proof-pictures/doc1.jpg'),
(77, 2024202, '../assets/images/proof-pictures/id1.jpg', '../assets/images/proof-pictures/doc1.jpg'),
(78, 2024302, '../assets/images/proof-pictures/id2.jpg', '../assets/images/proof-pictures/doc3.png');

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
-- Table structure for table `request_brgybp`
--

CREATE TABLE `request_brgybp` (
  `id` int(11) NOT NULL,
  `member_id` int(20) NOT NULL,
  `transaction_id` varchar(1000) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `square_meter` varchar(100) NOT NULL,
  `floor` varchar(100) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `purpose` varchar(500) NOT NULL,
  `request` varchar(500) NOT NULL,
  `status` int(2) NOT NULL,
  `email` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_brgybp`
--

INSERT INTO `request_brgybp` (`id`, `member_id`, `transaction_id`, `name`, `address`, `square_meter`, `floor`, `contact_no`, `purpose`, `request`, `status`, `email`, `time`) VALUES
(1, 2024902, 'BP-2024-357697', 'Quinn Jimenez', 'Possimus rerum exer', '100 square meters', '5th floor', '2147483647', 'House', 'Building Permit', 0, 'dybimiz@mailinator.com', '2024-04-19 08:10:29'),
(2, 2024202, 'BP-2024-449108', 'Lopez, Anna Santos', '21 3rd Street Avenue', '1111', '', '09155689713', '', 'Barangay Building Permit', 0, 'mrcodg13@gmail.com', '2024-04-24 14:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `request_brgycert`
--

CREATE TABLE `request_brgycert` (
  `id` int(11) NOT NULL,
  `member_id` int(20) NOT NULL,
  `transaction_id` varchar(1000) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `yrs_res` int(4) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `purpose` varchar(500) NOT NULL,
  `request` varchar(500) NOT NULL,
  `status` int(2) NOT NULL,
  `email` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_brgycert`
--

INSERT INTO `request_brgycert` (`id`, `member_id`, `transaction_id`, `name`, `address`, `yrs_res`, `contact_no`, `purpose`, `request`, `status`, `email`, `time`) VALUES
(1, 2024902, 'CERT-2024-433296', 'Quinn Jimenez', 'Possimus rerum exer', 1983, '2147483647', 'Hello', 'Barangay Certificate', 0, 'dybimiz@mailinator.com', '2024-04-19 05:34:15'),
(2, 2024202, 'CERT-2024-278837', 'Lopez, Anna Santos', '21 3rd Street Avenue', 17, '09155689713', 'Example Barangay Certificate', 'Barangay Certificate', 0, 'mrcodg13@gmail.com', '2024-04-24 12:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `request_brgyclrs`
--

CREATE TABLE `request_brgyclrs` (
  `id` int(11) NOT NULL,
  `member_id` int(20) NOT NULL,
  `transaction_id` varchar(1000) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `yrs_res` int(4) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `purpose` varchar(500) NOT NULL,
  `request` varchar(500) NOT NULL,
  `status` int(2) NOT NULL,
  `email` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_brgyclrs`
--

INSERT INTO `request_brgyclrs` (`id`, `member_id`, `transaction_id`, `name`, `address`, `yrs_res`, `contact_no`, `purpose`, `request`, `status`, `email`, `time`) VALUES
(1, 1, '6789', 'exampleName', 'exampleAddress', 20, '123456', 'examplePurpose', 'exampleRequest\r\n', 2, '', '2024-04-18 15:33:33'),
(73, 2024902, '2024-475414', 'Quinn Jimenez', 'Possimus rerum exer', 1983, '2147483647', '', 'Barangay Clearance', 2, 'dybimiz@mailinator.com', '2024-04-21 17:03:21'),
(74, 2024902, '2024-175254', 'Quinn Jimenez', 'Possimus rerum exer', 1983, '2147483647', '134', 'Barangay Clearance', 0, 'dybimiz@mailinator.com', '2024-04-19 02:59:03'),
(75, 2024202, 'CLR-2024-617565', 'Lopez, Anna Santos', '21 3rd Street Avenue', 17, '2147483647', 'Katunayan', 'Barangay Clearance', 2, 'mrcodg13@gmail.com', '2024-04-25 05:33:58'),
(76, 2024202, 'CLR-2024-480850', 'Lopez, Anna Santos', '21 3rd Street Avenue', 17, '09634578916', 'Proof', 'Barangay Clearance', 2, 'mrcodg13@gmail.com', '2024-04-25 05:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `request_brgycoi`
--

CREATE TABLE `request_brgycoi` (
  `id` int(11) NOT NULL,
  `member_id` int(20) NOT NULL,
  `transaction_id` varchar(500) NOT NULL,
  `name` varchar(50) NOT NULL,
  `request` varchar(50) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `purpose` varchar(500) NOT NULL,
  `yrs_res` int(4) NOT NULL,
  `status` int(2) NOT NULL,
  `email` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_brgycoi`
--

INSERT INTO `request_brgycoi` (`id`, `member_id`, `transaction_id`, `name`, `request`, `contact_no`, `address`, `purpose`, `yrs_res`, `status`, `email`, `time`) VALUES
(1, 1, '123456', 'Layka', 'asdasda', '23123', 'dsada', 'sdasdasd', 31231, 0, 'sdasd', '2024-04-19 16:30:09'),
(2, 2024902, 'COI-2024-230007', 'Quinn Jimenez', 'Barangay Indigency', '2147483647', 'Possimus rerum exer', 'Financial', 1983, 2, 'dybimiz@mailinator.com', '2024-04-21 17:05:03'),
(22, 2024202, 'COI-2024-521376', 'Lopez, Anna Santos', 'Barangay Indigency', '09155689713', '21 3rd Street Avenue', 'gagana na ba ????', 17, 0, 'mrcodg13@gmail.com', '2024-04-23 13:39:28'),
(23, 2024202, 'COI-2024-579944', 'Lopez, Anna Santos', 'Barangay Indigency', '09634578916', '21 3rd Street Avenue', 'mm', 17, 1, 'mrcodg13@gmail.com', '2024-04-25 05:29:07'),
(24, 2024202, 'COI-2024-122066', 'Lopez, Anna Santos', 'Barangay Indigency', '09155689713', '21 3rd Street Avenue', 'Financial', 17, 0, 'mrcodg13@gmail.com', '2024-04-29 12:30:49');

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
(1, 1, '1234', 'asdasd', 'asdasd', 0, 1231323123, 'aasdasd', '', 2, '');

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
  `member_id` int(20) NOT NULL,
  `transaction_id` varchar(1000) NOT NULL,
  `business_name` varchar(50) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `kof_business` varchar(50) NOT NULL,
  `yrs_res` int(4) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `purpose` varchar(500) NOT NULL,
  `status` int(2) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `request` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_busclearance`
--

INSERT INTO `request_busclearance` (`id`, `member_id`, `transaction_id`, `business_name`, `owner_name`, `kof_business`, `yrs_res`, `contact_no`, `purpose`, `status`, `email`, `address`, `request`, `time`) VALUES
(1, 1, '234', 'Hello', 'Hi', 'Food', 2, '0', 'Hello', 0, '', '', '', '2024-04-19 10:43:35'),
(3, 2024902, 'BSCLR-2024-474781', 'Quinn Eatery', 'Quinn Jimenez', 'Food', 1983, '2147483647', 'Food', 2, 'dybimiz@mailinator.com', 'Possimus rerum exer', 'Business Clearance', '2024-04-21 17:03:54'),
(4, 2024202, 'BSCLR-2024-858914', 'Lopez Eatery', 'Lopez, Anna Santos', 'Food', 17, '09155689713', 'Food Business', 0, 'mrcodg13@gmail.com', '21 3rd Street Avenue', 'Business Clearance', '2024-04-24 14:01:14');

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
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generatedpdf_id`
--
ALTER TABLE `generatedpdf_id`
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
-- Indexes for table `request_assistant`
--
ALTER TABLE `request_assistant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_brgybp`
--
ALTER TABLE `request_brgybp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_brgycert`
--
ALTER TABLE `request_brgycert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_brgyclrs`
--
ALTER TABLE `request_brgyclrs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_brgycoi`
--
ALTER TABLE `request_brgycoi`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `generatedpdf_id`
--
ALTER TABLE `generatedpdf_id`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inquire`
--
ALTER TABLE `inquire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member_account`
--
ALTER TABLE `member_account`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `member_address`
--
ALTER TABLE `member_address`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `member_emergency`
--
ALTER TABLE `member_emergency`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `member_proof`
--
ALTER TABLE `member_proof`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

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
-- AUTO_INCREMENT for table `request_brgybp`
--
ALTER TABLE `request_brgybp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `request_brgycert`
--
ALTER TABLE `request_brgycert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request_brgyclrs`
--
ALTER TABLE `request_brgyclrs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `request_brgycoi`
--
ALTER TABLE `request_brgycoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Constraints for table `request_brgycor`
--
ALTER TABLE `request_brgycor`
  ADD CONSTRAINT `request_cor` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2024 at 08:20 PM
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
(1, '421942795_939844190823403_4852506872741483609_n.jpg', 'Barangay 20', 'Welcome!', '2024-04-05 06:06:35'),
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
(15, 'araa', 'add', 'Alumni Member: <b>2024402</b> have been registered at  <b>Alumni Members.</b>', '2024-04-17 18:00:19');

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
  `name` varchar(50) NOT NULL,
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

INSERT INTO `members` (`member_id`, `year`, `member_count`, `campus_id`, `name`, `precinct`, `birth_date`, `address`, `civil_status`, `religion`, `email_address`, `cellphone_no`, `picture`, `signature`, `time_registered`, `status`, `cid`, `idfront`, `idback`) VALUES
(2024101, 2024, 1, '01', 'Wylie Scott', 'Aliqua', '1995-01-08', 'Voluptas aperiam vol', 'LIVING-IN', 'Jehovah\\\'s Witnesses', 'konysi@mailinator.com', '09567575675', 'avatar1.png', 'signature1.png', '2024-04-17 16:51:58', 0, 1, '', ''),
(2024102, 2024, 1, '02', 'Basil Duran', 'Expedi', '1981-06-22', 'Rerum molestiae moll', 'Legally Separated', 'Baptist', 'vejofyv@mailinator.com', '09546546456', 'avatar1.png', 'avatar2.png', '2024-04-17 17:03:19', 0, 1, '', ''),
(2024201, 2024, 2, '01', 'Renee Case', 'Exerc7', '1996-12-09', 'Nisi voluptas tenetu', 'Others', 'Jehovah\\\'s Witnesses', 'kylyxuc@mailinator.com', '09454353454', 'avatar5.png', 'signature2.png', '2024-04-17 17:11:59', 0, 1, '', ''),
(2024202, 2024, 2, '02', 'Noble Hart', 'Assu56', '2006-07-30', 'Veritatis ut amet m', 'Single', 'Dating Daan', 'vipujyv@mailinator.com', '09454534444', 'avatar2.png', 'signature1.png', '2024-04-17 17:06:21', 0, 1, '', ''),
(2024301, 2024, 3, '01', 'Blair Reid', 'Qui454', '2016-03-12', 'Exercitation possimu', 'Widow/er', 'Iglesia ni Cristo', 'jyjyha@mailinator.com', '09543453432', 'avatar5.png', 'signature1.png', '2024-04-17 17:19:11', 0, 1, '', ''),
(2024302, 2024, 3, '02', 'Kylie Bonner', 'Est sy', '1988-05-30', 'Cumque omnis explica', 'Separated', 'Baptist', 'rsales059@gmail.com', '09545445444', 'avatar5.png', 'signature1.png', '2024-04-17 17:51:55', 0, 1, '', ''),
(2024401, 2024, 4, '01', 'Hakeem Howard', 'Corrup', '1994-08-17', 'Sint molestiae enim', 'Others', 'Iglesia ni Cristo', 'pera@mailinator.com', '09765656756', 'avatar1.png', 'signature1.png', '2024-04-17 17:57:14', 0, 1, '', ''),
(2024402, 2024, 4, '02', 'Zephania Calderon', '667676', '1997-12-24', 'Hic officia adipisci', 'LIVING-IN', 'Jehovah\\\'s Witnesses', 'dyzer@mailinator.com', '09767868686', 'avatar6.png', 'avatar7.png', '2024-04-17 18:00:19', 0, 1, '', ''),
(2024501, 2024, 5, '01', 'Morgan Lee', 'Volu66', '1970-02-01', 'Ea velit tempor do', 'Legally Separated', 'Jehovah\\\'s Witnesses', 'rsales059@gmail.com', '09545645444', 'avatar8.png', 'signature5.png', '2024-04-17 18:11:47', 0, 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `member_account`
--

CREATE TABLE `member_account` (
  `id` int(20) NOT NULL,
  `member_id` int(20) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
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
(7, 2024402, 'araa', '$2y$10$85s8pFPS3p86Kkn8lCsMueoLt1/bMEd485Kp0PKmDN6');

-- --------------------------------------------------------

--
-- Table structure for table `member_address`
--

CREATE TABLE `member_address` (
  `id` int(20) NOT NULL,
  `member_id` int(20) DEFAULT NULL,
  `residency` varchar(50) NOT NULL,
  `yrs_res` varchar(20) NOT NULL,
  `postal` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `brgy` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member_address`
--

INSERT INTO `member_address` (`id`, `member_id`, `residency`, `yrs_res`, `postal`, `district`, `brgy`, `region`, `province`, `city`) VALUES
(1, 2024101, 'Helper', '1990', '1400', 'District II', 'Barangay 20', 'Metro Manila', 'Metro Manila', 'Caloocan City'),
(2, 2024102, 'Constraction Worker', '1989', '1400', 'District II', 'Barangay 20', 'Metro Manila', 'Metro Manila', 'Caloocan City'),
(3, 2024202, 'Home Owner', '2012', '1400', 'District II', 'Barangay 20', 'Metro Manila', 'Metro Manila', 'Caloocan City'),
(4, 2024201, 'Home Owner', '1973', '1400', 'District II', 'Barangay 20', 'Metro Manila', 'Metro Manila', 'Caloocan City'),
(5, 2024301, 'Others', '2005', '1400', 'District II', 'Barangay 20', 'Metro Manila', 'Metro Manila', 'Caloocan City'),
(6, 2024302, 'Constraction Worker', '1983', '1400', 'District II', 'Barangay 20', 'Metro Manila', 'Metro Manila', 'Caloocan City'),
(7, 2024302, 'Constraction Worker', '1983', '1400', 'District II', 'Barangay 20', 'Metro Manila', 'Metro Manila', 'Caloocan City'),
(8, 2024401, 'Constraction Worker', '1977', '1400', 'District II', 'Barangay 20', 'Metro Manila', 'Metro Manila', 'Caloocan City'),
(9, 2024402, 'Tenant', '1975', '1400', 'District II', 'Barangay 20', 'Metro Manila', 'Metro Manila', 'Caloocan City'),
(10, 2024501, 'Tenant', '1983', '1400', 'District II', 'Barangay 20', 'Metro Manila', 'Metro Manila', 'Caloocan City');

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
(10, 2024501, 'Patricia George', 'Iusto in in laborum', '09656565555', 'Tempore reprehender');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `member_address`
--
ALTER TABLE `member_address`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `member_emergency`
--
ALTER TABLE `member_emergency`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `member_proof`
--
ALTER TABLE `member_proof`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

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

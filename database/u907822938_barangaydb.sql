-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 04:46 AM
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
(2, 'officials.jpg', 'Barangay Officials', '', '2024-05-02 18:54:25'),
(3, 'sk.jpeg', 'Sangguniang Kabataan', '', '2024-05-02 18:54:21');

-- --------------------------------------------------------

--
-- Table structure for table `barangay_inventory`
--

CREATE TABLE `barangay_inventory` (
  `id` int(11) NOT NULL,
  `picture` varchar(1000) NOT NULL,
  `item_name` varchar(1000) NOT NULL,
  `stocks` int(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barangay_inventory`
--

INSERT INTO `barangay_inventory` (`id`, `picture`, `item_name`, `stocks`, `time_added`) VALUES
(1, 'tolda.jpg', 'Trapal/Tent', 0, '2024-05-05 05:10:38'),
(2, 'monoblock chair.jpg', 'Monoblock Chair  1 set (50)', 2, '2024-05-05 07:06:04'),
(3, 'plastic table.jpg', 'Plastic Table 1set(10)', 3, '2024-05-02 19:56:42'),
(4, 'patrol tricycle.jpg', 'Barangay Tricycle Services/Patrol', 3, '2024-05-05 04:39:58'),
(7, 'patrol car.jpg', 'Barangay Patrol/Services Car', 4, '2024-05-05 06:19:26');

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
(1, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-05-02 19:08:11'),
(2, 'rona', 'add', 'Resident Member: <b>2024102</b> have been registered at  <b>Resident Members.</b>', '2024-05-02 19:13:31'),
(3, 'rona', 'add', 'Resident Member: <b>2024101</b> have been registered at  <b>Resident Members.</b>', '2024-05-02 19:15:55'),
(4, 'rona', 'accepted', ' Resident: <b>VILLALUNA, RONALAINE NIFRAS</b> has been Accepted at <b> Resident at List.</b>', '2024-05-02 19:16:43'),
(5, 'rona', 'edit', 'Barangay Officials <b>ARABELLA B. BELARDO</b> has been updated at <b>Barangay Officials.</b>', '2024-05-02 20:43:34'),
(6, 'rona', 'edit', 'Barangay Officials <b>LAICA MAE T. MARTINEZ</b> has been updated at <b>Barangay Officials.</b>', '2024-05-02 20:44:07'),
(7, 'rona', 'edit', 'Barangay Officials <b>RONALAINE N. VILLALUNA</b> has been updated at <b>Barangay Officials.</b>', '2024-05-02 20:44:31'),
(8, 'marco', 'login', 'Admin: <b>MARCO</b> Just logged on to the System', '2024-05-03 01:18:55'),
(9, 'marco', 'accepted', ' Resident: <b>FISHER, KIRESTIN AMITY BOOKER</b> has been Accepted at <b> Resident at List.</b>', '2024-05-03 01:26:13'),
(10, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-05-03 01:28:26'),
(11, 'rona', 'add', 'Resident Member: <b>2024102</b> have been registered at  <b>Resident Members.</b>', '2024-05-03 01:31:03'),
(12, 'rona', 'add', 'Resident Member: <b>2024102</b> have been registered at  <b>Resident Members.</b>', '2024-05-03 01:36:16'),
(13, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-05-03 01:43:58'),
(14, 'rona', 'add', 'Resident Member: <b>2024201</b> have been registered at  <b>Resident Members.</b>', '2024-05-03 01:45:10'),
(15, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-05-03 02:31:12'),
(16, 'rona', 'add', 'Resident Member: <b>2024301</b> have been registered at  <b>Resident Members.</b>', '2024-05-03 02:33:44'),
(17, 'rona', 'accepted', ' Resident: <b>LAGASCA, JASON POGI</b> has been Accepted at <b> Resident at List.</b>', '2024-05-03 02:34:37'),
(18, 'rona', 'edit', 'Settings: <b>BARANGAY</b> has been updated.', '2024-05-03 02:39:36'),
(19, 'rona', 'edit', 'Settings: <b>BARANGAY 20</b> has been updated.', '2024-05-03 02:39:45'),
(20, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-05-03 02:49:04'),
(21, 'rona', 'edit', 'Settings: <b>BARANGAY!!</b> has been updated.', '2024-05-03 02:49:26'),
(22, 'rona', 'edit', 'Settings: <b>BARANGAY 20</b> has been updated.', '2024-05-03 02:49:41'),
(23, 'rona', 'add', 'Resident Member: <b>2024401</b> have been registered at  <b>Resident Members.</b>', '2024-05-03 02:55:21'),
(24, 'rona', 'accepted', ' Resident: <b>SISON, JOSHUA TRINIDAD</b> has been Accepted at <b> Resident at List.</b>', '2024-05-03 02:55:56'),
(25, 'rona', 'accepted', ' Resident: <b>GO, DAVIDSON BALURAN</b> has been Accepted at <b> Resident at List.</b>', '2024-05-03 03:44:06'),
(26, 'rona', 'edit', 'Settings: <b>BARANGAY</b> has been updated.', '2024-05-03 03:50:19'),
(27, 'rona', 'edit', 'Settings: <b>BARANGAY 20</b> has been updated.', '2024-05-03 03:50:34'),
(28, 'rona', 'add', 'Send Message on Residents', '2024-05-03 03:53:35'),
(29, 'rona26', 'login', 'Admin: <b>RONA26</b> Just logged on to the System', '2024-05-03 03:54:44'),
(30, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-05-03 03:55:02'),
(31, 'marco', 'login', 'Admin: <b>MARCO</b> Just logged on to the System', '2024-05-03 04:07:39'),
(32, 'marco', 'edit', 'Settings: <b>BARANGAY</b> has been updated.', '2024-05-03 04:13:16'),
(33, 'marco', 'edit', 'Settings: <b>BARANGAY 20</b> has been updated.', '2024-05-03 04:13:33'),
(34, 'marco', 'add', 'Resident Member: <b>2024102</b> have been registered at  <b>Resident Members.</b>', '2024-05-03 04:17:20'),
(35, 'marco', 'add', 'Send Message on Residents', '2024-05-03 04:27:24'),
(36, 'layka', 'login', 'Admin: <b>LAYKA</b> Just logged on to the System', '2024-05-03 05:36:30'),
(37, 'layka', 'accepted', ' Resident: <b>FLORES, CAIRO APHRODITE RUIZ</b> has been Accepted at <b> Resident at List.</b>', '2024-05-03 05:37:09'),
(38, 'rona26', 'login', 'Admin: <b>RONA26</b> Just logged on to the System', '2024-05-03 05:37:50'),
(39, 'marco', 'login', 'Admin: <b>MARCO</b> Just logged on to the System', '2024-05-03 05:41:12'),
(40, 'marco', 'add', 'Send Message on Residents', '2024-05-03 05:42:16'),
(41, 'marco', 'add', 'Send Message on Residents', '2024-05-03 05:42:29'),
(42, 'marco', 'login', 'Admin: <b>MARCO</b> Just logged on to the System', '2024-05-03 05:44:22'),
(43, 'marco', 'login', 'Admin: <b>MARCO</b> Just logged on to the System', '2024-05-03 05:45:59'),
(44, 'marco', 'edit', 'Inquiries <b> I-2</b> has been replied in<b>Inquiries.</b>', '2024-05-03 05:47:39'),
(45, 'layka', 'login', 'Admin: <b>LAYKA</b> Just logged on to the System', '2024-05-03 05:53:55'),
(46, 'layka', 'edit', 'Settings: <b>BARANGAY</b> has been updated.', '2024-05-03 06:06:37'),
(47, 'layka', 'edit', 'Settings: <b>BARANGAY 20</b> has been updated.', '2024-05-03 06:06:47'),
(48, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-05-03 06:16:01'),
(49, 'marco', 'login', 'Admin: <b>MARCO</b> Just logged on to the System', '2024-05-03 06:36:06'),
(50, 'marco', 'login', 'Admin: <b>MARCO</b> Just logged on to the System', '2024-05-03 07:17:56'),
(51, 'marco', 'accepted', ' Resident: <b>TRINIDAD, EMERY AGUILAR</b> has been Accepted at <b> Resident at List.</b>', '2024-05-03 07:55:26'),
(52, 'layka', 'login', 'Admin: <b>LAYKA</b> Just logged on to the System', '2024-05-03 07:57:57'),
(53, 'layka', 'add', 'Send Message on Residents', '2024-05-03 07:58:07'),
(54, 'marco', 'login', 'Admin: <b>MARCO</b> Just logged on to the System', '2024-05-03 08:04:16'),
(55, 'marco', 'retrived', ' Resident: <b>LEVINE, MACKENZIE BEVIS WILSON</b> has been Rejected at <b> Resident List .</b>', '2024-05-03 08:04:31'),
(56, 'marco', 'accepted', ' Resident: <b>MARTINEZ, JEROME ANDREY MENDOZA</b> has been Accepted at <b> Resident at List.</b>', '2024-05-03 08:11:30'),
(57, 'marco', 'login', 'Admin: <b>MARCO</b> Just logged on to the System', '2024-05-03 08:16:24'),
(58, 'marco', 'edit', 'Settings: <b>BARANGAY</b> has been updated.', '2024-05-03 08:16:56'),
(59, 'marco', 'edit', 'Settings: <b>BARANGAY 20</b> has been updated.', '2024-05-03 08:17:05'),
(60, 'marco', 'edit', 'Inquiries <b> I-3</b> has been replied in<b>Inquiries.</b>', '2024-05-03 08:18:48'),
(61, 'marco', 'accepted', ' Resident: <b>PEARSON, BROCK MALIK HEAD</b> has been Accepted at <b> Resident at List.</b>', '2024-05-03 08:23:09'),
(62, 'marco', 'login', 'Admin: <b>MARCO</b> Just logged on to the System', '2024-05-04 02:49:19'),
(63, 'marco', 'edit', 'Settings: <b>BARANGAY</b> has been updated.', '2024-05-04 02:49:37'),
(64, 'marco', 'edit', 'Settings: <b>BARANGAY 20</b> has been updated.', '2024-05-04 02:49:57'),
(65, 'marco', 'accepted', ' Resident: <b>JOSEPH, ADRIA AUTUMN HERRERA</b> has been Accepted at <b> Resident at List.</b>', '2024-05-04 02:54:37'),
(66, 'marco', 'login', 'Admin: <b>MARCO</b> Just logged on to the System', '2024-05-04 03:00:20'),
(67, 'marco', 'add', 'Send Message on Residents', '2024-05-04 03:00:54'),
(68, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-05-04 03:03:06'),
(69, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-05-04 03:24:37'),
(70, 'rona', 'accepted', ' Resident: <b>HOBBS, ZENIA CHESTER PRINCE</b> has been Accepted at <b> Resident at List.</b>', '2024-05-04 03:25:05'),
(71, 'rona', 'edit', 'Settings: <b>BARANGAY</b> has been updated.', '2024-05-04 03:28:45'),
(72, 'rona', 'edit', 'Settings: <b>BARANGAY 20</b> has been updated.', '2024-05-04 03:28:59'),
(73, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-05-04 03:53:54'),
(74, 'rona', 'edit', 'Settings: <b>BARANGAY</b> has been updated.', '2024-05-04 03:54:48'),
(75, 'rona', 'edit', 'Settings: <b>BARANGAY 20</b> has been updated.', '2024-05-04 03:55:04'),
(76, 'rona', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2024-05-04 03:57:24'),
(77, 'rona', 'add', 'Send Message on Residents', '2024-05-04 03:58:38'),
(78, 'rona', 'accepted', ' Resident: <b>MARTINEZ, LAICA MAE TARDIO</b> has been Accepted at <b> Resident at List.</b>', '2024-05-04 04:07:52'),
(79, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-05-04 04:08:21'),
(80, 'rona', 'accepted', ' Resident: <b>AVERY, SCARLET CONAN DOTSON</b> has been Accepted at <b> Resident at List.</b>', '2024-05-04 04:56:04'),
(81, 'layka', 'login', 'Admin: <b>LAYKA</b> Just logged on to the System', '2024-05-04 05:11:17'),
(82, 'layka', 'login', 'Admin: <b>LAYKA</b> Just logged on to the System', '2024-05-04 05:20:27'),
(83, 'layka', 'login', 'Admin: <b>LAYKA</b> Just logged on to the System', '2024-05-04 05:27:11'),
(84, 'layka', 'accepted', ' Resident: <b>BUCKNER, INGA DIETER STAFFORD</b> has been Accepted at <b> Resident at List.</b>', '2024-05-04 05:42:58'),
(85, 'layka', 'edit', 'Inquiries <b> I-7</b> has been replied in<b>Inquiries.</b>', '2024-05-04 05:47:46'),
(86, 'layka', 'add', 'Send Message on Residents', '2024-05-04 05:48:04'),
(87, 'layka', 'edit', 'Settings: <b>EWAN</b> has been updated.', '2024-05-04 05:48:55'),
(88, 'layka', 'edit', 'Settings: <b>BARANGAY 20</b> has been updated.', '2024-05-04 05:49:14'),
(89, 'layka', 'login', 'Admin: <b>LAYKA</b> Just logged on to the System', '2024-05-04 05:59:35'),
(90, 'layka', 'edit', 'Settings: <b>,MAMAMO</b> has been updated.', '2024-05-04 06:01:28'),
(91, 'layka', 'edit', 'Settings: <b>BARANGAY 20</b> has been updated.', '2024-05-04 06:01:38'),
(92, 'layka', 'edit', 'Inquiries <b> I-8</b> has been replied in<b>Inquiries.</b>', '2024-05-04 06:02:10'),
(93, 'layka', 'add', 'Send Message on Residents', '2024-05-04 06:02:45'),
(94, 'marco', 'login', 'Admin: <b>MARCO</b> Just logged on to the System', '2024-05-04 06:14:56'),
(95, 'marco', 'accepted', ' Resident: <b>LEWIS, COLTON KEELY HERNANDEZ</b> has been Accepted at <b> Resident at List.</b>', '2024-05-04 06:15:26'),
(96, 'marco', 'add', 'Send Message on Residents', '2024-05-04 06:15:33'),
(97, 'marco', 'accepted', ' Resident: <b>CARRILLO, AMERY ULRIC NICHOLSON</b> has been Accepted at <b> Resident at List.</b>', '2024-05-04 07:27:04'),
(98, 'marco', 'add', 'Send Message on Residents', '2024-05-04 07:27:20'),
(99, 'marco', 'edit', 'Inquiries <b> I-9</b> has been replied in<b>Inquiries.</b>', '2024-05-04 07:31:08'),
(100, 'layka', 'login', 'Admin: <b>LAYKA</b> Just logged on to the System', '2024-05-04 07:55:57'),
(101, 'layka', 'accepted', ' Resident: <b>LUNA, JACK XANTHUS AYERS</b> has been Accepted at <b> Resident at List.</b>', '2024-05-04 07:56:36'),
(102, 'layka', 'add', 'Send Message on Residents', '2024-05-04 08:01:18'),
(103, 'layka', 'edit', 'Settings: <b>EWAN</b> has been updated.', '2024-05-04 08:02:08'),
(104, 'layka', 'edit', 'Settings: <b>BARANGAY 20</b> has been updated.', '2024-05-04 08:02:23'),
(105, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-05-04 08:24:09'),
(106, 'rona', 'accepted', ' Resident: <b>BARRON, VIOLET KARLEIGH BRADLEY</b> has been Accepted at <b> Resident at List.</b>', '2024-05-04 08:38:14'),
(107, 'rona', 'edit', 'Inquiries <b> I-10</b> has been replied in<b>Inquiries.</b>', '2024-05-04 08:44:21'),
(108, 'rona', 'edit', 'Settings: <b>GAGO</b> has been updated.', '2024-05-04 08:45:08'),
(109, 'rona', 'login', 'Admin: <b>RONA</b> Just logged on to the System', '2024-05-04 08:45:23'),
(110, 'rona', 'edit', 'Settings: <b>BARANGAY 20</b> has been updated.', '2024-05-04 08:45:32'),
(111, 'rona', 'accepted', ' Resident: <b>BALDWIN, MARIKO KARLEIGH SHIELDS</b> has been Accepted at <b> Resident at List.</b>', '2024-05-04 08:53:29'),
(112, 'rona', 'edit', 'Inquiries <b> I-1</b> has been replied in<b>Inquiries.</b>', '2024-05-04 08:59:12'),
(113, 'rona', 'add', 'Send Message on Residents', '2024-05-04 08:59:56'),
(114, 'rona', 'edit', 'Settings: <b>MAAM CATH</b> has been updated.', '2024-05-04 09:00:29'),
(115, 'rona', 'edit', 'Settings: <b>BARANGAY 20</b> has been updated.', '2024-05-04 09:00:49'),
(116, 'layka', 'login', 'Admin: <b>LAYKA</b> Just logged on to the System', '2024-05-05 04:22:51'),
(117, 'layka', 'accepted', ' Resident: <b>SCHMIDT, HARPER MOLLIE LYNN</b> has been Accepted at <b> Resident at List.</b>', '2024-05-05 04:30:41'),
(118, 'layka', 'login', 'Admin: <b>LAYKA</b> Just logged on to the System', '2024-05-05 04:42:25'),
(119, 'layka', 'add', 'Resident Member: <b>2024101</b> have been registered at  <b>Resident Members.</b>', '2024-05-05 04:43:48'),
(120, 'layka', 'accepted', ' Resident: <b>DOTSON, LUKE KENDALL BLANCHARD</b> has been Accepted at <b> Resident at List.</b>', '2024-05-05 04:44:00'),
(121, 'layka', 'accepted', ' Resident: <b>SIMON, DEMETRIA AMAL MCCALL</b> has been Accepted at <b> Resident at List.</b>', '2024-05-05 05:02:04'),
(122, 'layka', 'add', 'Send Message on Residents', '2024-05-05 05:06:17'),
(123, 'layka', 'login', 'Admin: <b>LAYKA</b> Just logged on to the System', '2024-05-05 05:07:35'),
(124, 'layka', 'add', 'Announcement: <b>EPAL</b> have been added at <b>Announcements.</b>', '2024-05-05 05:08:21'),
(125, 'layka', 'delete', 'Announcement: <b>AN8</b> have been deleted at <b>Announcements.</b>', '2024-05-05 05:08:39'),
(126, 'layka', 'edit', 'Inquiries <b> I-1</b> has been replied in<b>Inquiries.</b>', '2024-05-05 05:09:26'),
(127, 'layka', 'edit', 'Settings: <b>GAGO KA</b> has been updated.', '2024-05-05 05:10:04'),
(128, 'layka', 'edit', 'Settings: <b>BARANGAY 20</b> has been updated.', '2024-05-05 05:10:15'),
(129, 'layka', 'edit', 'Inquiries <b> I-2</b> has been replied in<b>Inquiries.</b>', '2024-05-05 05:40:56'),
(130, 'layka', 'accepted', ' Resident: <b>VINSON, CHARISSA BAXTER CONTRERAS</b> has been Accepted at <b> Resident at List.</b>', '2024-05-05 05:42:22'),
(131, 'layka', 'add', 'Send Message on Residents', '2024-05-05 05:42:43'),
(132, 'marco', 'login', 'Admin: <b>MARCO</b> Just logged on to the System', '2024-05-05 05:55:40'),
(133, 'marco', 'accepted', ' Resident: <b>KELLEY, KATO DIANA HANSON</b> has been Accepted at <b> Resident at List.</b>', '2024-05-05 05:56:05'),
(134, 'marco', 'edit', 'Inquiries <b> I-3</b> has been replied in<b>Inquiries.</b>', '2024-05-05 05:57:15'),
(135, 'marco', 'edit', 'Settings: <b>BARANGAY 11</b> has been updated.', '2024-05-05 05:57:43'),
(136, 'marco', 'edit', 'Settings: <b>BARANGAY 20</b> has been updated.', '2024-05-05 05:58:01'),
(137, 'marco', 'add', 'Send Message on Residents', '2024-05-05 06:00:51'),
(138, 'layka', 'login', 'Admin: <b>LAYKA</b> Just logged on to the System', '2024-05-05 06:02:56'),
(139, 'layka', 'accepted', ' Resident: <b>HOLLOWAY, WILLOW ISABELLE BROWNING</b> has been Accepted at <b> Resident at List.</b>', '2024-05-05 06:15:16'),
(140, 'layka', 'edit', 'Settings: <b>BARANGAY 11</b> has been updated.', '2024-05-05 06:16:50'),
(141, 'layka', 'edit', 'Settings: <b>BARANGAY 20</b> has been updated.', '2024-05-05 06:17:00'),
(142, 'layka', 'add', 'Send Message on Residents', '2024-05-05 06:19:17'),
(143, 'layka', 'login', 'Admin: <b>LAYKA</b> Just logged on to the System', '2024-05-05 06:21:41'),
(144, 'layka', 'add', 'Send Message on Residents', '2024-05-05 07:02:03'),
(145, 'layka', 'edit', 'Settings: <b>BARANGAY 11</b> has been updated.', '2024-05-05 07:05:22'),
(146, 'layka', 'login', 'Admin: <b>LAYKA</b> Just logged on to the System', '2024-05-05 07:05:33'),
(147, 'layka', 'edit', 'Settings: <b>BARANGAY 20</b> has been updated.', '2024-05-05 07:05:40'),
(148, 'layka', 'accepted', ' Resident: <b>OCHOA, FELICIA KEATON ROLLINS</b> has been Accepted at <b> Resident at List.</b>', '2024-05-05 07:15:07'),
(149, 'layka', 'login', 'Admin: <b>LAYKA</b> Just logged on to the System', '2024-05-05 07:23:24');

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
(1, '2024102', 'Schmidt, Harper Mollie Lynn_2024102.pdf'),
(2, '2024201', 'Simon, Demetria Amal Mccall_2024201.pdf'),
(3, '2024301', 'Vinson, Charissa Baxter Contreras_2024301.pdf'),
(4, '2024202', 'Kelley, Kato Diana Hanson_2024202.pdf'),
(5, '2024401', 'Holloway, Willow Isabelle Browning_2024401.pdf'),
(6, '2024202', 'Kelley, Kato Diana Hanson_2024202.pdf'),
(7, '2024302', 'Ochoa, Felicia Keaton Rollins_2024302.pdf');

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
(1, 'ronaaaaaaaaa', 'martinezlaicamae17@gmail.com', 'ewan ko', 'iojnnaumhjiooi', 1),
(2, 'ronaaaaaaaaa', 'martinezlaicamae17@gmail.com', 'hello', 'okay', 1),
(3, 'ronaaaaaaaaa', 'martinezlaicamae17@gmail.com', 'hello', 'hi', 1),
(4, 'Ronalaine Villaluna', 'martinezlaicamae17@gmail.com', 'hjahd', '', 0),
(5, 'Ronalaine Villaluna', 'martinezlaicamae17@gmail.com', 'jashdjad', '', 0);

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
(2024101, 2024, 1, '01', 'Dotson, Luke Kendall Blanchard', 'Dotson', 'Luke', 'Kendall Blanchard', 'Incidunt quibusdam', '5656-A', '1992-01-06', 'Velit non voluptates', 'Married', 'Christian', 'martinezlaicamae17@gmail.com', '09634578916', 'avatar6.png', '', '2024-05-05 04:43:48', 1, 1, '', ''),
(2024102, 2024, 1, '02', 'Schmidt, Harper Mollie Lynn', 'Schmidt', 'Harper', 'Mollie Lynn', 'Facilis sit ipsa u', '1234-A', '1971-08-04', 'Inventore nisi perfe', 'Married', 'Roman Catholic', 'martinezlaicamae17@gmail.com', '09634578916', 'avatar3.png', '', '2024-05-05 04:29:44', 1, 1, 'id_card_2024102.jpg', 'id_back_2024102.jpg'),
(2024201, 2024, 2, '01', 'Simon, Demetria Amal Mccall', 'Simon', 'Demetria', 'Amal Mccall', 'Debitis dolore quia', '2312-A', '1982-08-25', 'Id quia repudiandae', 'Single', 'Roman Catholic', 'martinezlaicamae17@gmail.com', '09123362877', 'avatar1.png', '', '2024-05-05 05:01:22', 1, 1, 'id_card_2024201.jpg', 'id_back_2024201.jpg'),
(2024202, 2024, 2, '02', 'Kelley, Kato Diana Hanson', 'Kelley', 'Kato', 'Diana Hanson', 'Mollitia nobis volup', '3423-D', '1972-11-22', 'Numquam cillum quibu', 'single', 'Others', 'radix@mailinator.com', '09618059457', 'avatar2.png', '', '2024-05-05 05:54:44', 1, 1, 'id_card_2024202.jpg', 'id_back_2024202.jpg'),
(2024301, 2024, 3, '01', 'Vinson, Charissa Baxter Contreras', 'Vinson', 'Charissa', 'Baxter Contreras', 'Excepturi reiciendis', '2134-S', '1988-10-30', 'Eligendi rem officia', 'Separated', 'Roman Catholic', 'martinezlaicamae17@gmail.com', '09267324585', 'avatar6.png', '', '2024-05-05 05:39:53', 1, 1, 'id_card_2024301.jpg', 'id_back_2024301.jpg'),
(2024302, 2024, 3, '02', 'Ochoa, Felicia Keaton Rollins', 'Ochoa', 'Felicia', 'Keaton Rollins', 'In eligendi cum sed', '4242-F', '1982-05-06', 'Obcaecati ea mollit', 'Separated', 'Roman Catholic', 'martinezlaicamae17@gmail.com', '09634578916', 'avatar2.png', '', '2024-05-05 07:14:21', 1, 1, 'id_card_2024302.jpg', 'id_back_2024302.jpg'),
(2024401, 2024, 4, '01', 'Holloway, Willow Isabelle Browning', 'Holloway', 'Willow', 'Isabelle Browning', 'Nobis pariatur In v', '1234-A', '2012-01-23', 'Eu molestias nobis v', 'single', 'Christian', 'martinezlaicamae17@gmail.com', '09984138200', 'avatar6.png', '', '2024-05-05 06:13:51', 1, 1, 'id_card_2024401.jpg', 'id_back_2024401.jpg');

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
(1, 2024102, 'test', '$2y$10$ucTnvvy1sAOp6715Fs/HWukSuKQuM6QefX7P/k3O8uwroilGBAe0C'),
(2, 2024101, 'marco', '$2y$10$Kh7EHoJx72Dc3BPQ8iQ43ud5LJsmCyo070wQ/Hw3mwO//Kh367Aja'),
(3, 2024201, 'louie09', '$2y$10$iLW2w5f9PWmDqK/5XP5TpeLCSdZrn4OClhsHh5tfE8ifFFzhESHRu'),
(4, 2024301, 'nicaganda', '$2y$10$QwVFVbYpc.iPgy1isATgTOWRCYpm8WOpZvGHjBhbfF081jYLoM062'),
(5, 2024202, 'rednal', '$2y$10$QG4e6cWLa21/b8bXmv5m5uRzM.i9AQinXbikv40Xqmp1JFeR8ckhS'),
(6, 2024401, 'jorejj', '$2y$10$MqTf60l85UP0jZvJaIn2Q.wsXP8ftLFplvebEV/XjKi1VVS1Q3QUK'),
(7, 2024202, 'renz', '$2y$10$MFgdVPsip.uS9LEJXmlbpevtoiZC7WQZJeX.xD5EBazhsDki432Gy'),
(8, 2024302, 'lai', '$2y$10$Iw40TcMKQmsLXKaNNhlutOrlGvEbY5UTf0mGhQE7G5UEEAkl0s5WS');

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
(1, 2024102, 'Permanent Resident', '4'),
(2, 2024101, 'Tenant', '98'),
(3, 2024201, 'Permanent Resident', '1'),
(4, 2024301, 'Permanent Resident', '12'),
(5, 2024202, 'Permanent Resident', '6'),
(6, 2024401, 'Permanent Resident', '6'),
(7, 2024202, 'Permanent Resident', '6'),
(8, 2024302, 'Permanent Resident', '5');

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
(1, 2024102, 'Cathleen Huber', '09763567892'),
(2, 2024101, 'Mallory Nicholson', '09634578916'),
(3, 2024201, 'Laica Martinez', '09287890344'),
(4, 2024301, 'Cathleen Huber', '09267324585'),
(5, 2024202, 'Cathleen Huber ', '09618059457'),
(6, 2024401, 'McKenzie Calhoun ', '09984138200'),
(7, 2024202, 'Laica Martinez', '09763456744'),
(8, 2024302, 'Laica Martinez', '09297029187');

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
(8, 2024102, '../assets/images/proof-pictures/id1.jpg', '../assets/images/proof-pictures/doc3.png'),
(9, 2024101, '../assets/images/proof-pictures/id1.jpg', '../assets/images/proof-pictures/doc3.png'),
(10, 2024201, '../assets/images/proof-pictures/id1.jpg', '../assets/images/proof-pictures/doc3.png'),
(11, 2024301, '../assets/images/proof-pictures/id1.jpg', '../assets/images/proof-pictures/doc3.png'),
(12, 2024202, '../assets/images/proof-pictures/id1.jpg', '../assets/images/proof-pictures/doc3.png'),
(13, 2024401, '../assets/images/proof-pictures/id1.jpg', '../assets/images/proof-pictures/doc3.png'),
(14, 2024202, '../assets/images/proof-pictures/id1.jpg', '../assets/images/proof-pictures/doc3.png'),
(15, 2024302, '../assets/images/proof-pictures/id1.jpg', '../assets/images/proof-pictures/doc3.png');

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
(2, 'Arabella B. Belardo', '300648639_438737708041921_250166913395214156_n.jpg', 'Barangay Secretary', '2024-05-02 20:43:14'),
(3, 'Laica Mae T. Martinez', '309226377_5631596233589941_8774137317337940525_n.jpg', 'SK Chairman', '2024-05-02 20:43:48'),
(4, 'Ronalaine N. Villaluna', '370600580_988056842515636_3987781324144370246_n.jpg', 'Barangay Treasurer', '2024-05-02 20:44:11'),
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
  `id` int(20) NOT NULL,
  `img` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `img`, `title`, `description`, `last_modified`) VALUES
(1, 'kaunlaran elementary school.jpg', 'Kaunlaran Elementary School', '', '2024-03-25 11:58:04'),
(2, 'covered court.jpg', 'Covered Court', '', '2024-03-25 11:57:10'),
(3, 'fire station.jpg', 'Fire Station', '', '2024-03-25 11:57:34'),
(4, 'palengke 2.jpg', 'Barangay 20 Palengke', '', '2024-03-25 11:58:38'),
(5, 'palengke.jpg', 'Barangay 20 Palengke', '', '2024-03-25 11:59:04'),
(6, 'palengke 3.jpg', 'Barangay 20 Palengke', '', '2024-03-25 12:01:45');

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
(1, 2024201, 'CLR-2024-596821', 'Simon, Demetria Amal Mccall', 'Id quia repudiandae', 1, '09123362877', 'boto mo', 'Barangay Clearance', 2, 'martinezlaicamae17@gmail.com', '2024-05-05 05:03:37'),
(2, 2024202, 'CLR-2024-846656', 'Kelley, Kato Diana Hanson', 'Numquam cillum quibu', 6, '09618059457', 'identity', 'Barangay Clearance', 2, 'radix@mailinator.com', '2024-05-05 05:59:56'),
(3, 2024401, 'CLR-2024-845900', 'Holloway, Willow Isabelle Browning', 'Eu molestias nobis v', 6, '09984138200', 'work', 'Barangay Clearance', 2, 'martinezlaicamae17@gmail.com', '2024-05-05 06:18:59');

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
(1, 2024301, 'COI-2024-482823', 'Vinson, Charissa Baxter Contreras', 'Barangay Indigency', '09267324585', 'Eligendi rem officia', 'education', 12, 2, 'martinezlaicamae17@gmail.com', '2024-05-05 05:45:39'),
(2, 2024102, 'COI-2024-831829', 'Schmidt, Harper Mollie Lynn', 'Barangay Indigency', '09634578916', 'Inventore nisi perfe', 'educ', 4, 2, 'martinezlaicamae17@gmail.com', '2024-05-05 07:03:17');

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

-- --------------------------------------------------------

--
-- Table structure for table `request_busclearance`
--

CREATE TABLE `request_busclearance` (
  `id` int(20) NOT NULL,
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
(1, 2024102, 'BSCLR-2024-274875', 'LOPEZ EATERY', 'Schmidt, Harper Mollie Lynn', 'FOOD', 4, '09634578916', 'pake mo', 2, 'martinezlaicamae17@gmail.com', 'Inventore nisi perfe', 'Business Clearance', '2024-05-05 04:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `request_tools`
--

CREATE TABLE `request_tools` (
  `id` int(11) NOT NULL,
  `member_id` int(20) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `Item` varchar(500) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `borrowed_sched` date NOT NULL,
  `return_sched` date NOT NULL,
  `contact` int(11) NOT NULL,
  `purpose` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_tools`
--

INSERT INTO `request_tools` (`id`, `member_id`, `transaction_id`, `Item`, `fullname`, `address`, `borrowed_sched`, `return_sched`, `contact`, `purpose`, `status`, `time_added`) VALUES
(1, 2024102, 'SER-2024-632652', 'Barangay Tricycle Services/Patrol', 'Schmidt, Harper Mollie Lynn', 'Inventore nisi perfe', '2024-05-05', '2024-05-05', 2147483647, 'school', 2, '2024-05-05 04:37:03'),
(2, 2024201, 'SER-2024-987321', 'Monoblock Chair  1 set (50)', 'Simon, Demetria Amal Mccall', 'Id quia repudiandae', '2024-05-05', '2024-05-05', 2147483647, 'birthday', 2, '2024-05-05 05:06:10'),
(3, 2024301, 'SER-2024-557060', 'Monoblock Chair  1 set (50)', 'Vinson, Charissa Baxter Contreras', 'Eligendi rem officia', '2024-05-05', '2024-05-06', 2147483647, 'event', 0, '2024-05-05 05:45:20'),
(4, 2024202, 'SER-2024-767596', 'Monoblock Chair  1 set (50)', 'Kelley, Kato Diana Hanson', 'Numquam cillum quibu', '2024-05-05', '2024-05-06', 2147483647, 'event', 2, '2024-05-05 06:00:12'),
(5, 2024401, 'SER-2024-463880', 'Barangay Patrol/Services Car', 'Holloway, Willow Isabelle Browning', 'Eu molestias nobis v', '2024-05-05', '2024-05-06', 2147483647, 'swimming', 2, '2024-05-05 06:19:26'),
(6, 2024102, 'SER-2024-828043', 'Monoblock Chair  1 set (50)', 'Schmidt, Harper Mollie Lynn', 'Inventore nisi perfe', '2024-05-05', '2024-05-05', 2147483647, 'birthday', 2, '2024-05-05 07:04:43');

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
-- Indexes for table `barangay_inventory`
--
ALTER TABLE `barangay_inventory`
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
-- Indexes for table `request_tools`
--
ALTER TABLE `request_tools`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `barangay_inventory`
--
ALTER TABLE `barangay_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `change_logs`
--
ALTER TABLE `change_logs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `generatedpdf_id`
--
ALTER TABLE `generatedpdf_id`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inquire`
--
ALTER TABLE `inquire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `member_account`
--
ALTER TABLE `member_account`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `member_address`
--
ALTER TABLE `member_address`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `member_emergency`
--
ALTER TABLE `member_emergency`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `member_proof`
--
ALTER TABLE `member_proof`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `officials`
--
ALTER TABLE `officials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `request_brgybp`
--
ALTER TABLE `request_brgybp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_brgycert`
--
ALTER TABLE `request_brgycert`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request_brgycor`
--
ALTER TABLE `request_brgycor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_brgyid`
--
ALTER TABLE `request_brgyid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_busclearance`
--
ALTER TABLE `request_busclearance`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request_tools`
--
ALTER TABLE `request_tools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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

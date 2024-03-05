-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2024 at 04:17 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(100) NOT NULL,
  `img` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `img`, `title`, `description`, `last_modified`) VALUES
(13, '3.jpg', 'UCC’s First Alumni Grand Homecoming', 'Since July 1, 1971, UCC’s foremost alumni reunion took place yet the historical event seemed belittled by alumni - interpreted by 136 registrants on attendance sheet, the night of Feb. 8, 2014 at Oukami Events Place, Grace Park, Caloocan City.', '2024-03-05 14:43:58'),
(16, '3.jpg', 'UCC’s First Alumni Grand Homecoming', 'Since July 1, 1971, UCC’s foremost alumni reunion took place yet the historical event seemed belittled by alumni - interpreted by 136 registrants on attendance sheet, the night of Feb. 8, 2014 at Oukami Events Place, Grace Park, Caloocan City.', '2024-03-05 14:43:58'),
(17, '1.jpg', 'UCC’s First Alumni Grand Homecoming', 'Since July 1, 1971, UCC’s foremost alumni reunion took place yet the historical event seemed belittled by alumni - interpreted by 136 registrants on attendance sheet, the night of Feb. 8, 2014 at Oukami Events Place, Grace Park, Caloocan City.', '2024-03-05 14:43:58'),
(18, '3.jpg', 'UCC’s First Alumni Grand Homecoming', 'Since July 1, 1971, UCC’s foremost alumni reunion took place yet the historical event seemed belittled by alumni - interpreted by 136 registrants on attendance sheet, the night of Feb. 8, 2014 at Oukami Events Place, Grace Park, Caloocan City.', '2024-03-05 14:43:58'),
(19, '3.jpg', 'UCC’s First Alumni Grand Homecoming', 'Since July 1, 1971, UCC’s foremost alumni reunion took place yet the historical event seemed belittled by alumni - interpreted by 136 registrants on attendance sheet, the night of Feb. 8, 2014 at Oukami Events Place, Grace Park, Caloocan City.', '2024-03-05 14:43:58'),
(20, '1.jpg', 'UCC’s First Alumni Grand Homecoming', 'Since July 1, 1971, UCC’s foremost alumni reunion took place yet the historical event seemed belittled by alumni - interpreted by 136 registrants on attendance sheet, the night of Feb. 8, 2014 at Oukami Events Place, Grace Park, Caloocan City.', '2024-03-05 14:43:58'),
(21, '3.jpg', 'UCC’s First Alumni Grand Homecoming', 'Since July 1, 1971, UCC’s foremost alumni reunion took place yet the historical event seemed belittled by alumni - interpreted by 136 registrants on attendance sheet, the night of Feb. 8, 2014 at Oukami Events Place, Grace Park, Caloocan City.', '2024-03-05 14:43:58'),
(22, '3.jpg', 'UCC’s First Alumni Grand Homecoming', 'Since July 1, 1971, UCC’s foremost alumni reunion took place yet the historical event seemed belittled by alumni - interpreted by 136 registrants on attendance sheet, the night of Feb. 8, 2014 at Oukami Events Place, Grace Park, Caloocan City.', '2024-03-05 14:43:58'),
(23, '1.jpg', 'UCC’s First Alumni Grand Homecoming', 'Since July 1, 1971, UCC’s foremost alumni reunion took place yet the historical event seemed belittled by alumni - interpreted by 136 registrants on attendance sheet, the night of Feb. 8, 2014 at Oukami Events Place, Grace Park, Caloocan City.', '2024-03-05 14:43:58'),
(24, '3.jpg', 'UCC’s First Alumni Grand Homecoming', 'Since July 1, 1971, UCC’s foremost alumni reunion took place yet the historical event seemed belittled by alumni - interpreted by 136 registrants on attendance sheet, the night of Feb. 8, 2014 at Oukami Events Place, Grace Park, Caloocan City.', '2024-03-05 14:43:58'),
(25, '3.jpg', 'UCC’s First Alumni Grand Homecoming', 'Since July 1, 1971, UCC’s foremost alumni reunion took place yet the historical event seemed belittled by alumni - interpreted by 136 registrants on attendance sheet, the night of Feb. 8, 2014 at Oukami Events Place, Grace Park, Caloocan City.', '2024-03-05 14:43:58'),
(26, '1.jpg', 'UCC’s First Alumni Grand Homecoming', 'Since July 1, 1971, UCC’s foremost alumni reunion took place yet the historical event seemed belittled by alumni - interpreted by 136 registrants on attendance sheet, the night of Feb. 8, 2014 at Oukami Events Place, Grace Park, Caloocan City.', '2024-03-05 14:43:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2024 at 07:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scholarsphere`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookchaptersbyfaculty`
--

CREATE TABLE `bookchaptersbyfaculty` (
  `srNo` int(11) NOT NULL,
  `University` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Faculty` varchar(100) NOT NULL,
  `Employee ID` int(11) NOT NULL,
  `other Author` varchar(100) NOT NULL,
  `Co-author` varchar(100) NOT NULL,
  `booktitle` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `pubdate` date NOT NULL,
  `pubyear` year(4) NOT NULL,
  `volume` int(11) NOT NULL,
  `pagefrom` int(11) NOT NULL,
  `pageto` int(11) NOT NULL,
  `scopus` enum('y','n') NOT NULL,
  `listedin` varchar(100) NOT NULL,
  `wos` enum('y','n') NOT NULL,
  `peer` enum('y','n') NOT NULL,
  `issn` varchar(100) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `pubname` varchar(100) NOT NULL,
  `affltn` varchar(100) NOT NULL,
  `corrauthor` varchar(100) NOT NULL,
  `citind` int(11) NOT NULL,
  `nocit` int(11) NOT NULL,
  `evdupload` varchar(100) NOT NULL,
  `othrinfo` varchar(100) DEFAULT NULL,
  `ref` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `Date And Time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookchaptersbyfaculty`
--

INSERT INTO `bookchaptersbyfaculty` (`srNo`, `University`, `Department`, `Faculty`, `Employee ID`, `other Author`, `Co-author`, `booktitle`, `region`, `pubdate`, `pubyear`, `volume`, `pagefrom`, `pageto`, `scopus`, `listedin`, `wos`, `peer`, `issn`, `isbn`, `pubname`, `affltn`, `corrauthor`, `citind`, `nocit`, `evdupload`, `othrinfo`, `ref`, `status`, `Date And Time`) VALUES
(1, 'Amity University Patna', 'ASET', 'Aman Choudhary', 78, 'Aman Choudhary', 'kashmiri Apple Stocks Predctn. sys', 'Stocks Predctn. sys', 'National', '2004-02-05', '2040', 66, 2, 3, 'y', 'UGC', 'y', 'y', '6465-64654', '6547-9788', 'AMAN  CHOUDHARY', 'UGC', 'sneha', 77, 33, '', 'N/A', 'N/A', 1, '2024-09-30 10:45:21'),
(2, 'Amity University Patna', 'ASET', '', 0, '', '', '', 'National', '0222-10-02', '0000', 0, 4244, 24, 'y', 'Others', 'y', 'n', '4225', '55', 'Asus', 'Asus', 'Asus', 555, 424, '', '', '', 0, '2024-09-30 10:45:21'),
(3, 'Amity University Patna', 'ASET', '', 0, '', '', '', 'National', '0222-10-02', '0000', 0, 4244, 24, 'y', 'Others', 'y', 'n', '4225', '55', 'sS', 'S', 'SF', 555, 424, '', '', '', 0, '2024-09-30 10:45:21'),
(4, 'Amity University Patna', 'All', 'Admin', 1, 'Admin', 'Apple Stocks Predctn.', 'Stocks Predctn.', 'National', '2004-02-05', '2040', 66, 2, 3, 'y', 'UGC', 'y', 'y', '6465-64654', '6547-9788', 'AMAN  CHOUDHARY', 'UGC', 'sneha', 77, 33, 'uploads/', 'N/A', 'N/A', 0, '2024-09-30 10:45:21'),
(5, 'Amity University Patna', 'ASET', 'Aman Choudhary', 78, 'Aman Choudhary', 'qq9911Asus12345', 'qq99Asus', 'International', '0222-10-02', '2066', 88, 4244, 24, 'y', 'PubMed', 'y', 'n', '2', '55', 'qqAsus', 'qqS', 'qqAsus', 555, 424, '', 'qqAsus', 'qqAsus', 0, '2024-09-30 10:45:21'),
(7, 'Amity University Patna', 'ASET', 'Aman Choudhary', 78, 'Aman Choudhary', 'RabindraNath ', 'Tagore', 'International', '2024-09-10', '1998', 85, 21, 32, 'y', 'PubMed', 'y', 'y', '3242-856', '4564-54621', 'princeton', 'University', 'None', 15, 12, '', 'NA', 'NA', 1, '2024-09-30 10:47:51');

-- --------------------------------------------------------

--
-- Table structure for table `booksbyfaculty`
--

CREATE TABLE `booksbyfaculty` (
  `srNo` int(11) NOT NULL,
  `University` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Faculty` varchar(100) NOT NULL,
  `Employee ID` int(11) NOT NULL,
  `other Author` varchar(100) NOT NULL,
  `Co-author` varchar(100) NOT NULL,
  `booktitle` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `pubdate` date NOT NULL,
  `pubyear` year(4) NOT NULL,
  `volume` varchar(100) NOT NULL,
  `pagefrom` int(11) NOT NULL,
  `pageto` int(11) NOT NULL,
  `scopus` enum('y','n') NOT NULL,
  `listedin` varchar(100) NOT NULL,
  `wos` enum('y','n') NOT NULL,
  `peer` enum('y','n') NOT NULL,
  `issn` varchar(100) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `pubname` varchar(100) NOT NULL,
  `affltn` varchar(100) NOT NULL,
  `corrauthor` varchar(100) NOT NULL,
  `citind` int(11) NOT NULL,
  `nocit` int(11) NOT NULL,
  `evdupload` varchar(100) NOT NULL,
  `othrinfo` varchar(100) DEFAULT NULL,
  `ref` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `Date And Time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booksbyfaculty`
--

INSERT INTO `booksbyfaculty` (`srNo`, `University`, `Department`, `Faculty`, `Employee ID`, `other Author`, `Co-author`, `booktitle`, `region`, `pubdate`, `pubyear`, `volume`, `pagefrom`, `pageto`, `scopus`, `listedin`, `wos`, `peer`, `issn`, `isbn`, `pubname`, `affltn`, `corrauthor`, `citind`, `nocit`, `evdupload`, `othrinfo`, `ref`, `status`, `Date And Time`) VALUES
(1, 'Amity University Patna', 'ASET', 'Aman Choudhary', 78, 'Aman Choudhary', 'Harry Potterdd34', 'Goblet Of Firepp34', 'International', '2026-07-10', '2028', '89', 66, 663, 'y', 'PubMed', 'y', 'y', '4434-6776', '76777-787777', 'God of war', 'PSP', 'Kratos', 888, 754, '', 'n/a', 'n/a', 1, '2024-09-30 10:53:15'),
(3, 'Amity University Patna', 'All', 'Admin', 1, 'Admin', 'adad', 'adad', 'National', '2024-10-01', '0000', '22', 22, 22, 'y', 'ICI', 'y', 'n', 'NA', 'NA2', ' adad', 'ada', 'add', 22, 22, 'uploads/', '', '', 0, '2024-09-30 10:53:15'),
(4, 'Amity University Patna', 'All', 'Admin', 1, 'Admin', 'Bottle', 'bottle', 'International', '2024-10-01', '2020', '22', 22, 22, 'y', 'Others', 'y', 'n', 'bottle', '22', 'bottle', 'bottle', 'bottle', 22, 22, 'uploads/', 'bottle', 'bottle', 0, '2024-09-30 10:53:15'),
(12, 'Amity University Patna', 'ASET', 'Aman Choudhary', 78, 'Aman Choudhary', 'Dhruv', 'Goblet Of Firepp', 'International', '2026-07-10', '2028', '89', 66, 663, 'y', 'PubMed', 'y', 'y', '4434-6776', '76777-787777', 'God of war', 'PSP', 'Kratos', 888, 754, 'uploads/', 'n/a', 'n/a', 1, '2024-09-30 10:53:15'),
(13, 'Amity University Patna', 'ASET', 'Aman Choudhary', 78, 'Aman Choudhary', 'Gorilla1233', 'gorilla3', 'International', '2024-09-05', '0000', '213', 4562, 2346, 'n', 'PubMed', 'y', 'n', 'bottle', '3456', 'Gorilla3', 'Gorilla3', 'Gorilla3', 198, 4263, '', 'Gorilla983', 'Gorilla983', 0, '2024-09-30 10:53:15'),
(14, 'Amity University Patna', 'ASET', 'Aman Choudhary', 78, 'Aman Choudhary', 'RabindraNath ', 'Tagore', 'National', '2024-09-04', '2023', '1', 22, 23, 'y', 'PubMed', 'y', 'n', '24', '4242', 'princeton', 'UP', 'Jane Austin', 24, 22, 'uploads/steel-magnolia-ccray.jpg', 'na', 'na', 1, '2024-09-30 10:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `papersbyfaculty`
--

CREATE TABLE `papersbyfaculty` (
  `srNo` int(11) NOT NULL,
  `University` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Faculty` varchar(100) NOT NULL,
  `Employee ID` int(11) NOT NULL,
  `other Author` varchar(100) NOT NULL,
  `Co-author` varchar(100) NOT NULL,
  `booktitle` varchar(100) NOT NULL,
  `journalname` varchar(100) NOT NULL,
  `conferenceName` varchar(100) NOT NULL,
  `conferencePaper` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `pubdate` date NOT NULL,
  `pubyear` year(4) NOT NULL,
  `volume` int(11) NOT NULL,
  `pagefrom` int(11) NOT NULL,
  `pageto` int(11) NOT NULL,
  `scopus` enum('y','n') NOT NULL,
  `listedin` varchar(100) NOT NULL,
  `wos` enum('y','n') NOT NULL,
  `peer` enum('y','n') NOT NULL,
  `issn` varchar(100) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `pubname` varchar(100) NOT NULL,
  `affltn` varchar(100) NOT NULL,
  `corrauthor` varchar(100) NOT NULL,
  `citind` int(11) NOT NULL,
  `nocit` int(11) NOT NULL,
  `evdupload` varchar(100) NOT NULL,
  `othrinfo` varchar(100) DEFAULT NULL,
  `ref` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `Date And Time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `papersbyfaculty`
--

INSERT INTO `papersbyfaculty` (`srNo`, `University`, `Department`, `Faculty`, `Employee ID`, `other Author`, `Co-author`, `booktitle`, `journalname`, `conferenceName`, `conferencePaper`, `region`, `pubdate`, `pubyear`, `volume`, `pagefrom`, `pageto`, `scopus`, `listedin`, `wos`, `peer`, `issn`, `isbn`, `pubname`, `affltn`, `corrauthor`, `citind`, `nocit`, `evdupload`, `othrinfo`, `ref`, `status`, `Date And Time`) VALUES
(1, 'Amity University Patna', 'ASET', 'Aman Choudhary', 78, 'Aman Choudhary', 'Aman Choudhary', 'ML model for Nvidia Stocks', 'Nvidia', 'Apple Glow WDC', 'WDC', 'International', '2024-10-10', '2028', 89, 66, 663, 'n', 'UGC', 'n', 'n', '4434-6776', '76777-787777', 'Steve Jobs', 'Steve Inst', 'Tim Cook', 888, 0, 'uploads/IMG-20240904-WA0008.jpg', 'n/a', 'n/a', 1, '2024-09-30 10:56:21'),
(2, 'Amity University Patna', 'ASET', 'Aman Choudhary', 78, 'Aman Choudhary', 'qq11Asus', 'qq11william shekespare ok', 'qq11GoogleYt ok', 'asus', 'asus', 'International', '2024-09-13', '0000', 134, 1, 2, 'y', 'PubMed', 'y', 'y', '3456', 'q2424', 'Asus', 'Asus', 'Asus', 22, 11, '', 'asus', 'asus', 0, '2024-09-30 10:56:21'),
(3, 'Amity University Patna', 'ASET', 'Aman Choudhary', 78, 'Aman Choudhary', 'Asus tuf', 'name william shekespare', 'GoogleYt shorts', 'asus tuggq', 'asus tiff', 'International', '2024-09-13', '0000', 134, 1, 2, 'y', 'PubMed', 'y', 'y', '3456', 'q2424', 'Asus tyff', 'Asus toff', 'tudd', 22, 11, '', 'asus tuff', 'asus', 0, '2024-09-30 10:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `registerinfo`
--

CREATE TABLE `registerinfo` (
  `emp_id` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `university` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `avatar_filename` varchar(1000) NOT NULL,
  `Date And Time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registerinfo`
--

INSERT INTO `registerinfo` (`emp_id`, `email`, `user_name`, `password`, `university`, `department`, `avatar_filename`, `Date And Time`) VALUES
('078', 'amannew@gmail.com', 'Aman Choudhary', '99', 'Amity University Patna', 'ASET', 'AmityOutside.jpg', '2024-09-30 10:58:44'),
('1', 'abhijit@ptn.amity.edu', 'Admin', 'admin', 'Amity University Patna', 'All', 'Screenshot 2023-06-12 120154.png', '2024-09-30 10:58:44'),
('1010', 'Dollar@wagger.com', 'Dollar', 'treats', 'bhowbhow', 'None', 'default.jpg', '2024-09-30 10:58:44'),
('12', 'shilpa.sinha3107@gmail.com', 'shilpa', 'abc', 'Amity University', 'Btech', 'back_arrow.png', '2024-09-30 10:58:44'),
('123', 'test@gmail.com', 'test', 'ttttt', 'test', 'test', '2023-02-27 193522.jpg', '2024-09-30 10:58:44'),
('123456', 'amannew111@gmail.com', 'Aman Ch.', '123456', 'aup', 'bca', 'default.jpg', '2024-09-30 10:58:44'),
('27170', 'pranjan@ptn.amity.edu', 'Preetish Ranjan', '12345678', 'Amity University Patna', 'ASET', 'Image0306.jpg', '2024-09-30 10:58:44'),
('27466', 'ssingh3@ptn.amity.edu', 'Shilpi', 'Beauty@0407', 'Amity University Patna', 'ASET', 'IMG-20200507-WA0003.jpg', '2024-09-30 10:58:44'),
('311072', 'rkumar2@ptn.amity.edu', 'Ritesh Kumar ', 'Rite@9021', 'Amity University Patna ', 'ARC', '1000029180.jpg', '2024-09-30 10:58:44'),
('7', 'aman.choudhary9834@gmail.com', 'amanchoudhary77433', 'aabbcc', 'amity', 'btech', 'IMG_20240329_230812.jpg', '2024-09-30 10:58:44');

-- --------------------------------------------------------

--
-- Table structure for table `researchpapersbyfaculty`
--

CREATE TABLE `researchpapersbyfaculty` (
  `srNo` int(11) NOT NULL,
  `University` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Faculty` varchar(100) NOT NULL,
  `Employee ID` int(11) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `Co-author` varchar(100) NOT NULL,
  `papertitle` varchar(100) NOT NULL,
  `journalname` varchar(100) NOT NULL,
  `article` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `pubdate` date NOT NULL,
  `pubyear` year(4) NOT NULL,
  `volume` int(11) NOT NULL,
  `pagefrom` int(11) NOT NULL,
  `pageto` int(11) NOT NULL,
  `impact` varchar(100) NOT NULL,
  `scopus` enum('y','n') NOT NULL,
  `listedin` varchar(100) NOT NULL,
  `wos` enum('y','n') NOT NULL,
  `peer` enum('y','n') NOT NULL,
  `issn` varchar(100) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `pubname` varchar(100) NOT NULL,
  `affltn` varchar(100) NOT NULL,
  `corrauthor` varchar(100) NOT NULL,
  `citind` int(11) NOT NULL,
  `nocit` int(11) NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `evdupload` varchar(100) NOT NULL,
  `othrinfo` varchar(100) DEFAULT NULL,
  `ref` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `Date And Time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `researchpapersbyfaculty`
--

INSERT INTO `researchpapersbyfaculty` (`srNo`, `University`, `Department`, `Faculty`, `Employee ID`, `Author`, `Co-author`, `papertitle`, `journalname`, `article`, `region`, `pubdate`, `pubyear`, `volume`, `pagefrom`, `pageto`, `impact`, `scopus`, `listedin`, `wos`, `peer`, `issn`, `isbn`, `pubname`, `affltn`, `corrauthor`, `citind`, `nocit`, `link`, `evdupload`, `othrinfo`, `ref`, `status`, `Date And Time`) VALUES
(1, 'Amity University Patna', 'ASET', 'Aman Choudhary', 78, 'Aman Choudhary', 'Aman Choudhary', 'ML model for Nvidia Stocks', 'Nvidia', '', '', '0000-00-00', '0000', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 0, 0, '', 'uploads/', '', '', 1, '2024-09-30 10:56:55'),
(2, 'Amity University Patna', 'ASET', 'Aman Choudhary', 78, 'Aman Choudhary', 'Aman Choudhary', 'ML model for Nvidia Stocks', 'Nvidia', 'Nvidia', 'International', '2024-09-11', '2025', 5, 45, 50, 'Practice', 'y', 'PubMed', 'y', 'y', '5565-8988', '745-6874', 'Nvidia', '', 'Dhruv kumar', 45, 55, '', 'uploads/', '', '', 1, '2024-09-30 10:56:55'),
(3, 'Amity University Patna', 'ASET', 'Aman Choudhary', 78, 'Aman Choudhary', 'Aman Choudhary', 'ML model for Nvidia Stocks', 'Nvidia', 'Nvidia', '', '0000-00-00', '0000', 5, 0, 0, 'Practice', '', '', '', '', '5565-8988', '745-6874', 'Nvidia', 'Intrntnl', 'Dhruv kumar', 45, 55, '', 'uploads/', '', '', 1, '2024-09-30 10:56:55'),
(4, 'Amity University Patna', 'ASET', 'Aman Choudhary', 78, 'Aman Choudhary', 'qqokAsus1111sasur', 'qqokAsus1111', 'qqokAsus1111', 'Asus', 'International', '2024-09-06', '2025', 88, 222, 22, 'Asus', 'n', 'PubMed', 'y', 'y', '88', '88', 'Asus', 'Asus', 'Asus', 88, 88, '', '', 'Asus', 'Asus', 0, '2024-09-30 10:56:55'),
(9, 'Amity University Patna', 'All', 'Admin', 1, 'Admin', 'Goldy', 'Mirzapur S4', 'ad', 'ada', 'International', '2024-09-06', '0000', 2424, 222, 22, '2424', 'n', 'PubMed', 'y', 'y', 'aad', 'q2424', 'adad', '2442', '242', 2424, 244, '', 'uploads/', '', '', 0, '2024-09-30 10:56:55'),
(10, 'Amity University Patna', 'All', 'Admin', 1, 'Admin', 'Goldy', 'Mirzapur S4', 'ad', 'ada', 'International', '2024-09-06', '0000', 2424, 222, 22, '2424', 'n', 'PubMed', 'y', 'y', 'aad', 'q2424', 'adad', '2442', '242', 2424, 244, '', 'uploads/', '', '', 0, '2024-09-30 10:56:55'),
(11, 'Amity University Patna', 'All', 'Admin', 1, 'Admin', 'Goldy', 'Mirzapur S4', 'ad', 'ada', 'International', '2024-09-06', '0000', 2424, 222, 22, '2424', 'n', 'PubMed', 'y', 'y', 'aad', 'q2424', 'adad', '2442', '242', 2424, 244, '', 'uploads/', '', '', 0, '2024-09-30 10:56:55'),
(12, 'Amity University Patna', 'All', 'Admin', 1, 'Admin', 'Aman Choudhary', 'ML model for Nvidia Stocks', 'Nvidia', '', '', '0000-00-00', '0000', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 0, 0, '', 'uploads/', '', '', 0, '2024-09-30 10:56:55'),
(13, 'Amity University Patna', 'All', 'Admin', 1, 'Admin', 'Goldy', 'Mirzapur S4', 'jj', 'ada', 'International', '2024-09-06', '2023', 2424, 222, 22, '55', 'n', 'PubMed', 'y', 'y', 'aad', 'q2424', 'adad', '2442', '242', 2424, 244, '', 'uploads/', '', '', 0, '2024-09-30 10:56:55'),
(14, 'Amity University Patna', 'All', 'Admin', 1, 'Admin', 'Goldy', 'Mirzapur S4', 'jj', 'ada', 'International', '2024-09-06', '2023', 2424, 222, 22, '55', 'n', 'PubMed', 'y', 'y', 'aad', 'q2424', 'adad', '2442', '242', 2424, 244, '', 'uploads/', '', '', 0, '2024-09-30 10:56:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookchaptersbyfaculty`
--
ALTER TABLE `bookchaptersbyfaculty`
  ADD PRIMARY KEY (`srNo`);

--
-- Indexes for table `booksbyfaculty`
--
ALTER TABLE `booksbyfaculty`
  ADD PRIMARY KEY (`srNo`);

--
-- Indexes for table `papersbyfaculty`
--
ALTER TABLE `papersbyfaculty`
  ADD PRIMARY KEY (`srNo`);

--
-- Indexes for table `registerinfo`
--
ALTER TABLE `registerinfo`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `researchpapersbyfaculty`
--
ALTER TABLE `researchpapersbyfaculty`
  ADD PRIMARY KEY (`srNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookchaptersbyfaculty`
--
ALTER TABLE `bookchaptersbyfaculty`
  MODIFY `srNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `booksbyfaculty`
--
ALTER TABLE `booksbyfaculty`
  MODIFY `srNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `papersbyfaculty`
--
ALTER TABLE `papersbyfaculty`
  MODIFY `srNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `researchpapersbyfaculty`
--
ALTER TABLE `researchpapersbyfaculty`
  MODIFY `srNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

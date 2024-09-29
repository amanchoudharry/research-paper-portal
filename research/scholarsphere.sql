-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2024 at 05:49 PM
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
  `srNo` INT NOT NULL,
  `University` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Faculty` varchar(100) NOT NULL,
  `Employee ID` INT NOT NULL,
  `other Author` varchar(100) NOT NULL,
  `Co-author` varchar(100) NOT NULL,
  `booktitle` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `pubdate` date NOT NULL,
  `pubyear` YEAR NOT NULL,
  `volume` INT NOT NULL,
  `pagefrom` INT NOT NULL,
  `pageto` INT NOT NULL,
  `scopus` enum('y','n') NOT NULL,
  `listedin` varchar(100) NOT NULL,
  `wos` enum('y','n') NOT NULL,
  `peer` enum('y','n') NOT NULL,
  `issn` varchar(100) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `pubname` varchar(100) NOT NULL,
  `affltn` varchar(100) NOT NULL,
  `corrauthor` varchar(100) NOT NULL,
  `citind` INT NOT NULL,
  `nocit` INT NOT NULL,
  `evdupload` varchar(100) NOT NULL,
  `othrinfo` varchar(100),
  `ref` varchar(100) ,
  `status` INT NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for table `booksbyfaculty`
--

CREATE TABLE `booksbyfaculty` (
  `srNo` INT NOT NULL,
  `University` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Faculty` varchar(100) NOT NULL,
  `Employee ID` INT NOT NULL,
  `other Author` varchar(100) NOT NULL,
  `Co-author` varchar(100) NOT NULL,
  `booktitle` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `pubdate` date NOT NULL,
  `pubyear` YEAR NOT NULL,
  `volume` varchar(100) NOT NULL,
  `pagefrom` INT NOT NULL,
  `pageto` INT NOT NULL,
  `scopus` enum('y','n') NOT NULL,
  `listedin` varchar(100) NOT NULL,
  `wos` enum('y','n') NOT NULL,
  `peer` enum('y','n') NOT NULL,
  `issn` varchar(100) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `pubname` varchar(100) NOT NULL,
  `affltn` varchar(100) NOT NULL,
  `corrauthor` varchar(100) NOT NULL,
  `citind` INT NOT NULL,
  `nocit` INT NOT NULL,
  `evdupload` varchar(100) NOT NULL,
  `othrinfo` varchar(100) ,
  `ref` varchar(100) ,
  `status` INT NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------
--
-- Table structure for table `papersbyfaculty`
--

CREATE TABLE `papersbyfaculty` (
  `srNo` INT NOT NULL,
  `University` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Faculty` varchar(100) NOT NULL,
  `Employee ID` INT NOT NULL,
  `other Author` varchar(100) NOT NULL,
  `Co-author` varchar(100) NOT NULL,
  `booktitle` varchar(100) NOT NULL,
  `journalname` varchar(100) NOT NULL,
  `conferenceName` varchar(100) NOT NULL,
  `conferencePaper` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `pubdate` date NOT NULL,
  `pubyear` YEAR NOT NULL,
  `volume` INT NOT NULL,
  `pagefrom` INT NOT NULL,
  `pageto` INT NOT NULL,
  `scopus` enum('y','n') NOT NULL,
  `listedin` varchar(100) NOT NULL,
  `wos` enum('y','n') NOT NULL,
  `peer` enum('y','n') NOT NULL,
  `issn` varchar(100) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `pubname` varchar(100) NOT NULL,
  `affltn` varchar(100) NOT NULL,
  `corrauthor` varchar(100) NOT NULL,
  `citind` INT NOT NULL,
  `nocit` INT NOT NULL,
  `evdupload` varchar(100) NOT NULL,
  `othrinfo` varchar(100) ,
  `ref` varchar(100) ,
  `status` INT NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- Table structure for table `registerinfo`
--

CREATE TABLE `registerinfo` (
  `emp_id` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `university` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `avatar_filename` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registerinfo`
--

INSERT INTO `registerinfo` (`emp_id`, `email`, `user_name`, `password`, `university`, `department`, `avatar_filename`) VALUES
('078', 'amannew@gmail.com', 'Aman Choudhary', '99', 'Amity University Patna', 'ASET', 'AmityOutside.jpg'),
('1', 'abhijit@ptn.amity.edu', 'Admin', 'admin', 'Amity University Patna', 'All', 'Screenshot 2023-06-12 120154.png'),
('10', 'Dollar@wagger.com', 'Dollar', 'treats', 'bhowbhow', 'None', 'default.jpg'),
('101', 'Dollar@wagger.com', 'dd', 'treats', 'bhowbhow', 'None', 'default.jpg'),
('1010', 'Dollar@wagger.com', 'Dollar', 'treats', 'bhowbhow', 'None', 'default.jpg'),
('12', 'shilpa.sinha3107@gmail.com', 'shilpa', 'abc', 'Amity University', 'Btech', 'back_arrow.png'),
('123', 'test@gmail.com', 'test', 'ttttt', 'test', 'test', '2023-02-27 193522.jpg'),
('123456', 'amannew111@gmail.com', 'Aman Ch.', '123456', 'aup', 'bca', 'default.jpg'),
('27170', 'pranjan@ptn.amity.edu', 'Preetish Ranjan', '12345678', 'Amity University Patna', 'ASET', 'Image0306.jpg'),
('27466', 'ssingh3@ptn.amity.edu', 'Shilpi', 'Beauty@0407', 'Amity University Patna', 'ASET', 'IMG-20200507-WA0003.jpg'),
('311072', 'rkumar2@ptn.amity.edu', 'Ritesh Kumar ', 'Rite@9021', 'Amity University Patna ', 'ARC', '1000029180.jpg'),
('7', 'aman.choudhary9834@gmail.com', 'amanchoudhary77433', 'aabbcc', 'amity', 'btech', 'IMG_20240329_230812.jpg'),
('7777', 'amannew111@gmail.com', 'Aman Ch.', '7777', 'aup', 'bca', 'default.jpg'),
('7781', 'amannew111@gmail.com', 'Aman Ch.', '7777', 'aup', 'bca', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `researchpapersbyfaculty`
--

CREATE TABLE `researchpapersbyfaculty` (
  `srNo` INT NOT NULL,
  `University` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Faculty` varchar(100) NOT NULL,
  `Employee ID` INT NOT NULL,
  `Author` varchar(100) NOT NULL,
  `Co-author` varchar(100) NOT NULL,
  `papertitle` varchar(100) NOT NULL,
  `journalname` varchar(100) NOT NULL,
  `article` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `pubdate` date NOT NULL,
  `pubyear` YEAR NOT NULL,
  `volume` INT NOT NULL,
  `pagefrom` INT NOT NULL,
  `pageto` INT NOT NULL,
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
  `citind` INT NOT NULL,
  `nocit` INT NOT NULL,
  `link` varchar(100) ,
  `evdupload` varchar(100) NOT NULL,
  `othrinfo` varchar(100) ,
  `ref` varchar(100) ,
  `status` INT NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


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
  MODIFY `srNo` INT NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booksbyfaculty`
--
ALTER TABLE `booksbyfaculty`
  MODIFY `srNo` INT NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `papersbyfaculty`
--
ALTER TABLE `papersbyfaculty`
  MODIFY `srNo` INT NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `researchpapersbyfaculty`
--
ALTER TABLE `researchpapersbyfaculty`
  MODIFY `srNo` INT NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

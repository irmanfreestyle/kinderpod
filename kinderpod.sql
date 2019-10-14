-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 14, 2019 at 08:02 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kinderpod`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`) VALUES
(1, 'adminkinderpod');

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `album_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`album_id`, `title`, `image`) VALUES
(7, 'Si Kancil', 'fb0092fa892f6df49a789975c2da99ca.png'),
(10, 'Alif anak baik', 'f7ef347c29e58fb2207bee816e7eaf03.jpg'),
(14, 'Malam Gelap', 'f8e1011a2dba132f162b758347e5b598.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `podcasts`
--

CREATE TABLE `podcasts` (
  `podcast_id` int(11) NOT NULL,
  `podcast_title` varchar(100) NOT NULL,
  `podcast_info` varchar(500) NOT NULL,
  `album_id_fk` int(11) NOT NULL,
  `file` varchar(200) NOT NULL,
  `album_title` varchar(50) NOT NULL,
  `podcast_announcer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `podcasts`
--

INSERT INTO `podcasts` (`podcast_id`, `podcast_title`, `podcast_info`, `album_id_fk`, `file`, `album_title`, `podcast_announcer`) VALUES
(17, 'Anak kampus episode 2 - masak air', 'Si kancil anak baik part 1', 10, '510db3403c47c54de47adc4b134179a5.mp3', 'Si Kancil', 'Ahmad'),
(20, 'Email Ku', 'Alif anak yang baik sandkand adknakd akdnkand akdkandk', 7, '97d053dd4127ae9897fcb1c78c7b19e5.mp3', 'Alif anak baik', 'Saidinar'),
(21, 'Malam Gelap Sekali', 'INi podcast pertama saya', 14, '50538cacf70f734b367b37da42034e2a.mp3', 'Malam Gelap', 'Admin'),
(22, 'Anak Kampus episode 1', 'Alif anak baik yang berkuliah di pagi hari', 10, '3c89a1a11b689ffb5f4d67b50c009ae0.mp3', 'Alif anak baik', 'Admin'),
(23, 'Pantai yang indah', 'Pantaiku adalah pantai indonesia, ada adakdadna andajndja dndjenjf ksndkndk adknadkn', 14, '3c89a1a11b689ffb5f4d67b50c009ae0.mp3', 'Malam Gelap', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `podcast_id` int(11) NOT NULL,
  `reviewer` varchar(20) NOT NULL,
  `rate` int(11) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `podcast_id`, `reviewer`, `rate`, `message`) VALUES
(1, 17, 'Hacker', 4, 'Good Podcast...'),
(2, 17, 'anonim', 5, 'Wow is the best'),
(3, 22, 'anonim', 2, 'Lumayan, tp suaranya kok kecil ya'),
(4, 23, 'Surya', 5, 'Keren nih podcast, ditunggu podcast selanjutnya'),
(5, 23, 'anonim', 4, 'Ntaps, bintang 4 gan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `podcasts`
--
ALTER TABLE `podcasts`
  ADD PRIMARY KEY (`podcast_id`),
  ADD KEY `podcasts_ibfk_1` (`album_id_fk`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating_ibfk_1` (`podcast_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `podcasts`
--
ALTER TABLE `podcasts`
  MODIFY `podcast_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `podcasts`
--
ALTER TABLE `podcasts`
  ADD CONSTRAINT `podcasts_ibfk_1` FOREIGN KEY (`album_id_fk`) REFERENCES `albums` (`album_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`podcast_id`) REFERENCES `podcasts` (`podcast_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

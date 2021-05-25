-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2021 at 05:56 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ormawa`
--

-- --------------------------------------------------------

--
-- Table structure for table `hmj`
--

CREATE TABLE `hmj` (
  `id` int(11) NOT NULL,
  `nama_hmj` varchar(50) NOT NULL,
  `akronim_hmj` varchar(10) NOT NULL,
  `tgl_berdiri` date NOT NULL,
  `jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hmj`
--

INSERT INTO `hmj` (`id`, `nama_hmj`, `akronim_hmj`, `tgl_berdiri`, `jurusan`) VALUES
(1, 'Himpunan Mahasiswa Teknik Informatika', 'HIMATIF', '2008-11-12', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `ukm`
--

CREATE TABLE `ukm` (
  `id` int(11) NOT NULL,
  `nama_ukm` varchar(50) NOT NULL,
  `akronim_ukm` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukm`
--

INSERT INTO `ukm` (`id`, `nama_ukm`, `akronim_ukm`) VALUES
(34, 'Seni Budaya Polindra', 'Sebura'),
(35, 'Forum Mahasiswa Bidikmisi', 'Formadiksi'),
(37, 'as', 'as');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`) VALUES
('saneglos005@gmail.com', 'hakim123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hmj`
--
ALTER TABLE `hmj`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ukm`
--
ALTER TABLE `ukm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hmj`
--
ALTER TABLE `hmj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ukm`
--
ALTER TABLE `ukm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 03:32 PM
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
-- Database: `db_informasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `hmj`
--

CREATE TABLE `hmj` (
  `id` int(11) NOT NULL,
  `nama_hmj` varchar(100) NOT NULL,
  `akronim_hmj` varchar(10) NOT NULL,
  `ig_hmj` varchar(255) NOT NULL,
  `logo_hmj` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hmj`
--

INSERT INTO `hmj` (`id`, `nama_hmj`, `akronim_hmj`, `ig_hmj`, `logo_hmj`) VALUES
(3, 'Himpunan Mahasiswa Teknik Informatika', 'HIMATIF', '', 'c12670fc5207c002e0c1b6556a3e7a63');

-- --------------------------------------------------------

--
-- Table structure for table `lathi`
--

CREATE TABLE `lathi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `akronim` varchar(15) NOT NULL,
  `ig` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lathi`
--

INSERT INTO `lathi` (`id`, `nama`, `akronim`, `ig`, `logo`) VALUES
(1, 'Badan Eksekurif Mahasiswa', 'BEM', 'https://www.instagram.com/bempolindra_/', 'b814a7048a5a5c485bcd27205ca0fee5'),
(2, 'Majelis Permusyawaratan Mahasiswa', 'MPM', 'https://www.instagram.com/mpmpolindra_/', '3ad32ed1f444c3639be1689daaae16b7');

-- --------------------------------------------------------

--
-- Table structure for table `orda`
--

CREATE TABLE `orda` (
  `id` int(11) NOT NULL,
  `nama_orda` varchar(100) NOT NULL,
  `akronim_orda` varchar(15) NOT NULL,
  `ig_orda` varchar(255) NOT NULL,
  `logo_orda` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orda`
--

INSERT INTO `orda` (`id`, `nama_orda`, `akronim_orda`, `ig_orda`, `logo_orda`) VALUES
(2, 'Keluarga Mahasiswa Kuningan', 'KEMUNING', '', 'a0d319e59faa97ab0b984e4871d6db13');

-- --------------------------------------------------------

--
-- Table structure for table `ukm`
--

CREATE TABLE `ukm` (
  `id` int(11) NOT NULL,
  `nama_ukm` varchar(50) NOT NULL,
  `akronim_ukm` varchar(20) NOT NULL,
  `ig_ukm` varchar(255) NOT NULL,
  `logo_ukm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukm`
--

INSERT INTO `ukm` (`id`, `nama_ukm`, `akronim_ukm`, `ig_ukm`, `logo_ukm`) VALUES
(2, 'Forum Mahasiswa Bidikmisi', 'FORMADIKSI', 'https://www.instagram.com/formadiksi_polindra/', 'a08abbc164d27a691eec21420abbf5ac'),
(3, 'Komunitas Pecinta Alam', 'KOMPA', 'https://www.instagram.com/kompa.polindra/', '081b8f17e8bab5935d50fe1250e63d07'),
(4, 'Seni Budaya Polindra', 'SEBURA', 'https://www.instagram.com/sebura_polindra/', 'c9d3b3fdae820e85ebd914e44d26232c'),
(5, 'Komunitas Mahasiswa Jurnalistik Pecinta Karya', 'KOPEN', 'https://www.instagram.com/kotakpena/', 'c96c9267fb52a1ff63026d6fb667c268'),
(6, 'Resimen Mahasiswa', 'MENWA', 'https://www.instagram.com/menwa_polindra/', '4aea4e91092b5d96bcbde08e507bfdb7'),
(7, 'Persatuan Olahraga Polindra', 'POPI', 'https://www.instagram.com/popipolindra_official/', '9be2b712a1d2b2800080fea8e94db270'),
(8, 'Robotika Politeknik Indramayu', 'RPI', 'https://www.instagram.com/robotika_polindra/', '6942af2fca184f4d704b7868d43807a3');

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

-- --------------------------------------------------------

--
-- Table structure for table `vmt`
--

CREATE TABLE `vmt` (
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `tujuan` text NOT NULL,
  `about` text NOT NULL,
  `id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vmt`
--

INSERT INTO `vmt` (`visi`, `misi`, `tujuan`, `about`, `id`) VALUES
('\"National Leading and Globaly Competitive Polytechnic\"\r\n<br>\r\n\"Politeknik Terdepan Tingkat Nasional Berdaya Saing Global\"', '1. Meningkatkan mutu, akses, dan relevansi pendidikan politeknik untuk menghasilkan lulusan sesuai kebutuhan pekerjaan; <br>\r\n2. Melakukan penelitian terapan dan pengabdian masyarakat untuk mengatasi persoalan industri dan masyarakat.', '- Menghasilkan lulusan yang berkualitas, mandiri, dan berdaya juang tinggi <br>\r\n- Menghasilkan produk akademik yang memberikan manfaat bagi masyarakat luas <br>\r\n- Memberikan kontribusi kepada kesejahteraan masyarakat melalui kegiatan pengabdian kepada masyarakat <br>\r\n- Menjalankan program kemitraan dengan industri dan dunia usaha untuk menjamin keberlanjutan penyelenggaraan pendidikan <br>', 'Politeknik Indramayu atau dikenal dengan nama POLINDRA, terlahir atas adanya rencana Pemerintah untuk meningkatkan jumlah pendidikan vokasi di Indonesia, pendidikan politeknik baru ini terbuka untuk semua pemerintah daerah namun Pemerintah mensyaratkan dana dari pusat harus di dampingi dana pemerintah daerah dan dilaksanakan dalam bentuk kompetisi proposal yang harus diajukan oleh setiap pemerintah daerah peminat.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hmj`
--
ALTER TABLE `hmj`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orda`
--
ALTER TABLE `orda`
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
-- Indexes for table `vmt`
--
ALTER TABLE `vmt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hmj`
--
ALTER TABLE `hmj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orda`
--
ALTER TABLE `orda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ukm`
--
ALTER TABLE `ukm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

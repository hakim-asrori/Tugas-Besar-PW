-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Bulan Mei 2021 pada 00.25
-- Versi server: 5.7.24
-- Versi PHP: 7.2.19

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
-- Struktur dari tabel `hmj`
--

CREATE TABLE `hmj` (
  `id` int(11) NOT NULL,
  `nama_hmj` varchar(100) NOT NULL,
  `akronim_hmj` varchar(10) NOT NULL,
  `tgl_berdiri` date NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hmj`
--

INSERT INTO `hmj` (`id`, `nama_hmj`, `akronim_hmj`, `tgl_berdiri`, `jurusan`) VALUES
(1, 'Himpunan Mahasiswa Teknik Informatika', 'HIMATIF', '2008-11-12', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukm`
--

CREATE TABLE `ukm` (
  `id` int(11) NOT NULL,
  `nama_ukm` varchar(50) NOT NULL,
  `akronim_ukm` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ukm`
--

INSERT INTO `ukm` (`id`, `nama_ukm`, `akronim_ukm`) VALUES
(1, 'Seni Budaya Polindra', 'SEBURA'),
(2, 'Resimen Mahasiswa', 'MENWA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`email`, `password`) VALUES
('saneglos005@gmail.com', 'hakim123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hmj`
--
ALTER TABLE `hmj`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ukm`
--
ALTER TABLE `ukm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hmj`
--
ALTER TABLE `hmj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ukm`
--
ALTER TABLE `ukm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

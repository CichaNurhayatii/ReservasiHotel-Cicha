-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1.
-- Generation Time: May 27, 2022 at 03:57 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hotel1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fasilitas`
--

CREATE TABLE `tbl_fasilitas` (
  `idfasilitas` int(20) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_fasilitas`
--

INSERT INTO `tbl_fasilitas` (`idfasilitas`, `jenis`, `deskripsi`, `gambar`) VALUES
(9, 'Rooftof', 'Untuk bersantai bersama pasangan,teman,atau keluarga', 'Rooftop.jpg'),
(11, 'Taman', 'Di hotel kami terdapat taman untuk anda bersantai bersama keluarga.', 'taman hotel_1.jpg'),
(12, 'Tempat Parkir ', 'Di hotel kami terdapat tempat parkir mobil dan motor yang luas', 'Tempat parkir.jpg'),
(13, 'Tangga Darurat', 'Jika terjadi hal yang tak diinginkan,kami sudah menyediakan tangga darurat', 'tangga darurat.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fasilitas_kamar`
--

CREATE TABLE `tbl_fasilitas_kamar` (
  `id_fasilitas` int(10) NOT NULL,
  `tipe_kamar` varchar(20) NOT NULL,
  `fasilitas` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_fasilitas_kamar`
--

INSERT INTO `tbl_fasilitas_kamar` (`id_fasilitas`, `tipe_kamar`, `fasilitas`) VALUES
(4, 'Superior', 'Terdapat fasilitas yaitu kasur,lemari,kamar mandi,coffee maker,televisi,dsb.'),
(8, 'Presidential Room', 'Single bad, Televisi, Lemari, Bath room dilengkapi dengan Bathup, Ruang tamu terpisah,  AC,dll'),
(9, 'Single Room', 'Single bad, bath room,Lemari,Ac, dan lainnya'),
(10, 'Standard Room', 'Single bad,lemari,bath room');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kamar`
--

CREATE TABLE `tbl_kamar` (
  `id_kamar` int(10) NOT NULL,
  `id_fasilitas` int(10) NOT NULL,
  `no_kamar` char(11) NOT NULL,
  `tarif` double NOT NULL,
  `foto` varchar(50) NOT NULL,
  `jumlah_kamar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kamar`
--

INSERT INTO `tbl_kamar` (`id_kamar`, `id_fasilitas`, `no_kamar`, `tarif`, `foto`, `jumlah_kamar`) VALUES
(28, 10, '1A', 300000, 'standard room.jpg', 0),
(29, 4, '2A', 500000, 'deluxe room.jpg', 0),
(30, 9, '3A', 650000, 'single room.jpg', 0),
(33, 8, '4A', 900000, 'presidential suite.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `level` enum('admin','resepsionis') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(1, 'Admin', '202cb962ac59075b964b07152d234b70', 'petugas', 'admin'),
(2, 'Resepsionis', '202cb962ac59075b964b07152d234b70', 'petugas2', 'resepsionis');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservasi`
--

CREATE TABLE `tbl_reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `nama_pemesan` varchar(30) NOT NULL,
  `email_pemesan` varchar(32) NOT NULL,
  `nama_tamu` varchar(30) NOT NULL,
  `no_telp` char(13) NOT NULL,
  `tgl_cek_in` date NOT NULL,
  `tgl_cek_out` date NOT NULL,
  `jumlah_kamar_dipesan` int(11) NOT NULL,
  `status` enum('cek in','cek out','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_reservasi`
--

INSERT INTO `tbl_reservasi` (`id_reservasi`, `id_kamar`, `nama_pemesan`, `email_pemesan`, `nama_tamu`, `no_telp`, `tgl_cek_in`, `tgl_cek_out`, `jumlah_kamar_dipesan`, `status`) VALUES
(26, 28, 'Wati', 'watii@gmail.com', 'Wati', '', '2022-05-26', '2022-05-28', 1, 'cek out'),
(27, 29, 'Amel', 'Amelia@gmail.com', 'Amelia', '', '2022-05-28', '2022-05-29', 2, 'cek in'),
(28, 30, 'Sasa', 'cici@gmail.com', 'Sasa', '', '2022-05-30', '2022-05-31', 1, 'cek in'),
(29, 33, 'AYU', 'aisyah@gmail.com', 'Ayu', '', '2022-05-29', '2022-05-31', 1, 'cek in'),
(30, 28, 'Nadia', 'nadia1@gmail.com', 'Nadia', '', '2022-05-26', '2022-05-27', 1, 'cek in'),
(31, 29, 'Gina', 'gina@gmail.com', 'Gia', '', '2022-05-27', '2022-05-28', 1, 'cek in'),
(32, 30, 'Hana', 'hana@gmail.com', 'Hana', '', '2022-05-29', '2022-05-30', 1, 'cek in');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_fasilitas`
--
ALTER TABLE `tbl_fasilitas`
  ADD PRIMARY KEY (`idfasilitas`);

--
-- Indexes for table `tbl_fasilitas_kamar`
--
ALTER TABLE `tbl_fasilitas_kamar`
  ADD PRIMARY KEY (`id_fasilitas`),
  ADD KEY `tipe_kamar` (`tipe_kamar`);

--
-- Indexes for table `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `id_fasilitas` (`id_fasilitas`),
  ADD KEY `tarif` (`tarif`),
  ADD KEY `jumlah_kamar` (`jumlah_kamar`);

--
-- Indexes for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tbl_reservasi`
--
ALTER TABLE `tbl_reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_fasilitas`
--
ALTER TABLE `tbl_fasilitas`
  MODIFY `idfasilitas` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_fasilitas_kamar`
--
ALTER TABLE `tbl_fasilitas_kamar`
  MODIFY `id_fasilitas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  MODIFY `id_kamar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_reservasi`
--
ALTER TABLE `tbl_reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  ADD CONSTRAINT `tbl_kamar_ibfk_1` FOREIGN KEY (`id_fasilitas`) REFERENCES `tbl_fasilitas_kamar` (`id_fasilitas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

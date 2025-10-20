-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2025 at 06:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasirdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kode_barang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `harga`, `jumlah`, `kode_barang`) VALUES
(1, 'Bola Basket Mikasa', 320000, 12, 'B0001'),
(2, 'Sepatu Running Ortuseight', 625000, 7, 'B0002'),
(3, 'Sepatu Trail Run 910', 625000, 7, 'B0003'),
(4, 'Sepatu Running 910', 450000, 9, 'B0004'),
(5, 'Jarsey Running Mils', 90000, 9, 'B0005'),
(6, 'Deker Kaki Sepak Bola', 18000, 4, 'B0006'),
(7, 'Deker Lutut', 12000, -1, 'B0007'),
(8, 'Deker Tangan', 16000, 5, 'B0008'),
(9, 'Bola Voli Mikasa', 310000, 6, 'B0009'),
(10, 'Kacamata Running', 110000, 7, 'B0010'),
(11, 'Jarsey Timnas Indonesia', 85000, 4, 'B0011'),
(14, 'Bola Basket Molten', 265000, 7, 'B0014'),
(1102, 'Sepatu Voli Adidas', 470000, 5, 'B0016'),
(1103, 'Sepatu Basket Nike', 335000, 3, 'B0032'),
(1104, 'Sepatu Sepak Bola Nike', 220000, 7, 'B0023'),
(1105, 'Kaos Kaki Puma', 20000, 11, 'B0011'),
(1106, 'Kaos Kaki Nike', 20000, 11, 'B0012'),
(1107, 'Kaos Kaki 910', 15000, 21, 'B0013'),
(1108, 'Kacamata Renang', 95000, 6, 'B0077'),
(1141, 'Sepatu Sepak Bola Adidas', 450000, 4, 'B0098');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama`) VALUES
(1, 'Admin'),
(2, 'Kasir');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal_waktu` datetime NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `total` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal_waktu`, `nomor`, `total`, `nama`, `bayar`, `kembali`) VALUES
(1, '2025-06-07 23:53:42', '828558', 739000, 'Galih Legowo', 800000, 61000),
(2, '2025-06-08 00:09:57', '856171', 574000, 'Galih Legowo', 580000, 6000),
(3, '2025-06-08 00:10:38', '120549', 915000, 'Galih Legowo', 920000, 5000),
(4, '2025-06-08 00:20:15', '979763', 500000, 'Galih Legowo', 500000, 0),
(5, '2025-06-08 17:47:18', '921482', 742000, 'M. Firmansyah Abdullah', 750000, 8000),
(6, '2025-06-08 17:56:25', '840587', 727000, 'M. Firmansyah Abdullah', 800000, 73000),
(7, '2025-06-15 14:09:02', '828992', 735000, 'M. Firmansyah Abdullah', 800000, 65000),
(8, '2025-06-15 18:12:27', '174600', 262000, 'M. Firmansyah Abdullah', 270000, 8000),
(9, '2025-06-15 18:12:45', '539768', 262000, 'M. Firmansyah Abdullah', 270000, 8000),
(10, '2025-06-18 21:48:06', '275684', 892000, 'M. Firmansyah Abdullah', 900000, 8000),
(11, '2025-06-18 21:55:12', '588954', 650000, 'M. Firmansyah Abdullah', 650000, 0),
(12, '2025-06-18 23:57:01', '501987', 460000, 'M. Firmansyah Abdullah', 500000, 40000),
(13, '2025-06-19 14:57:58', '703674', 468000, 'M. Firmansyah Abdullah', 470000, 2000),
(14, '2025-06-19 15:04:15', '245711', 555000, 'M. Firmansyah Abdullah', 560000, 5000),
(15, '2025-06-19 15:07:52', '417293', 180000, 'M. Firmansyah Abdullah', 200000, 20000),
(16, '2025-06-19 15:12:47', '538552', 40000, 'M. Firmansyah Abdullah', 50000, 10000),
(17, '2025-06-19 20:17:35', '907291', 367000, 'M. Firmansyah Abdullah', 400000, 33000),
(18, '2025-06-19 20:19:37', '935929', 730000, 'M. Firmansyah Abdullah', 730000, 0),
(19, '2025-06-19 23:25:51', '300126', 121000, 'Galih Legowo', 125000, 4000),
(20, '2025-06-26 01:11:59', '177597', 336000, 'Galih Legowo', 340000, 4000),
(21, '2025-07-03 11:07:55', '124129', 332000, 'M. Firmansyah Abdullah', 400000, 68000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_transaksi_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transaksi_detail`, `id_transaksi`, `id_barang`, `harga`, `qty`, `total`, `diskon`) VALUES
(1, 1, 7, 12000, 2, 0, 0),
(2, 1, 5, 90000, 1, 0, 0),
(3, 1, 2, 625000, 1, 0, 0),
(4, 2, 8, 16000, 1, 16000, 0),
(5, 2, 9, 180000, 3, 540000, 0),
(6, 2, 6, 18000, 1, 18000, 0),
(7, 3, 10, 110000, 1, 110000, 0),
(8, 3, 5, 90000, 2, 180000, 0),
(9, 3, 2, 625000, 1, 625000, 0),
(10, 4, 1, 250000, 2, 500000, 0),
(11, 5, 7, 12000, 1, 12000, 0),
(12, 5, 1107, 15000, 1, 15000, 0),
(13, 5, 5, 90000, 1, 90000, 0),
(14, 5, 2, 625000, 1, 625000, 0),
(15, 6, 5, 90000, 1, 90000, 0),
(16, 6, 7, 12000, 1, 12000, 0),
(17, 6, 2, 625000, 1, 625000, 0),
(18, 7, 10, 110000, 1, 110000, 0),
(19, 7, 2, 625000, 1, 625000, 0),
(20, 8, 7, 12000, 1, 12000, 0),
(21, 8, 1, 250000, 1, 250000, 0),
(22, 10, 1106, 25000, 1, 25000, 0),
(23, 10, 7, 12000, 1, 12000, 0),
(24, 10, 1, 230000, 1, 230000, 0),
(25, 10, 2, 625000, 1, 625000, 0),
(26, 11, 1106, 25000, 1, 25000, 0),
(27, 11, 2, 625000, 1, 625000, 0),
(28, 12, 1, 230000, 2, 460000, 0),
(29, 13, 6, 18000, 1, 18000, 0),
(30, 13, 1141, 450000, 1, 450000, 0),
(31, 14, 5, 90000, 1, 90000, 0),
(32, 14, 1107, 15000, 1, 15000, 0),
(33, 14, 4, 450000, 1, 450000, 0),
(34, 15, 9, 180000, 1, 180000, 0),
(35, 16, 1106, 25000, 1, 25000, 0),
(36, 16, 1107, 15000, 1, 15000, 0),
(37, 17, 1105, 20000, 1, 20000, 0),
(38, 17, 7, 12000, 1, 12000, 0),
(39, 17, 1103, 335000, 1, 335000, 0),
(40, 18, 5, 90000, 1, 90000, 0),
(41, 18, 1107, 15000, 1, 15000, 0),
(42, 18, 3, 625000, 1, 625000, 0),
(43, 19, 1106, 20000, 1, 20000, 0),
(44, 19, 8, 16000, 1, 16000, 0),
(45, 19, 11, 85000, 1, 85000, 0),
(46, 20, 8, 16000, 1, 16000, 0),
(47, 20, 1, 320000, 1, 320000, 0),
(48, 21, 1, 320000, 1, 320000, 0),
(49, 21, 7, 12000, 1, 12000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `role_id`) VALUES
(2, 'Firmansyah Abdullah', 'firman', 'firman', 2),
(4, 'Admin', 'admin', 'admin', 1),
(7, 'Galih Legowo', 'galih', 'galih', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_transaksi_detail`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1165;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_transaksi_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

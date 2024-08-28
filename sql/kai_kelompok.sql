-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 03:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kai_kelompok`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_petugas`
--

CREATE TABLE `data_petugas` (
  `id_petugas` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `nama_lengkap` varchar(225) NOT NULL,
  `tanggal_kelahiran` date NOT NULL,
  `umur` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_telfon` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_petugas`
--

INSERT INTO `data_petugas` (`id_petugas`, `id_pengguna`, `nama_lengkap`, `tanggal_kelahiran`, `umur`, `alamat`, `nomor_telfon`) VALUES
(1, 3, 'Raihan Iqbal', '2023-05-16', 13, 'Kamarung', '087673884738');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kereta`
--

CREATE TABLE `jadwal_kereta` (
  `id_jadwal` int(11) NOT NULL,
  `nama_kereta` varchar(50) NOT NULL,
  `kota_asal` varchar(50) NOT NULL,
  `kota_tujuan` varchar(50) NOT NULL,
  `jam_keberangkatan` time NOT NULL,
  `jam_kedatangan` time NOT NULL,
  `harga_tiket` decimal(10,2) NOT NULL,
  `kapasitas_gerbong` int(11) NOT NULL,
  `tanggal_keberangkatan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_kereta`
--

INSERT INTO `jadwal_kereta` (`id_jadwal`, `nama_kereta`, `kota_asal`, `kota_tujuan`, `jam_keberangkatan`, `jam_kedatangan`, `harga_tiket`, `kapasitas_gerbong`, `tanggal_keberangkatan`) VALUES
(2, '555 Bandung Cimahi Metropolitan (BCM)', 'Bandung', 'Cimahi', '07:20:00', '07:35:00', 5000.00, 50, '2023-05-15'),
(3, '443 Bandung Raya Ekonomi', 'Kiaracondong', 'Padalarang', '07:20:00', '07:40:00', 10000.00, 50, '2023-05-15'),
(4, '555 Bandung Cimahi Metropolitan (BCM)', 'Bandung', 'Cimahi', '09:25:00', '09:40:00', 5000.00, 50, '2023-05-15'),
(5, '789 Cimahi Bandung Lodaya (CBL', 'Cimahi', 'Bandung', '17:50:00', '18:00:00', 5000.00, 50, '2023-05-16'),
(6, '555 Bandung Cimahi Metropolitan (BCM)', 'Bandung', 'Cimahi', '07:20:00', '07:35:00', 5000.00, 50, '2023-05-16'),
(7, '443 Bandung Raya Ekonomi', 'Kiaracondong', 'Padalarang', '07:20:00', '07:40:00', 10000.00, 50, '2023-05-16'),
(8, '555 Bandung Cimahi Metropolitan (BCM)', 'Bandung', 'Cimahi', '09:25:00', '09:40:00', 5000.00, 47, '2023-05-16'),
(89, '789 Cimahi Bandung Lodaya (CBL', 'Cimahi', 'Bandung', '17:50:00', '18:00:00', 5000.00, 50, '2023-05-17'),
(90, '555 Bandung Cimahi Metropolitan (BCM)', 'Bandung', 'Cimahi', '07:20:00', '07:35:00', 5000.00, 50, '2023-05-17'),
(91, '443 Bandung Raya Ekonomi', 'Kiaracondong', 'Padalarang', '07:20:00', '07:40:00', 10000.00, 50, '2023-05-17'),
(92, '555 Bandung Cimahi Metropolitan (BCM)', 'Bandung', 'Cimahi', '09:25:00', '09:40:00', 5000.00, 50, '2023-05-17'),
(301, '443 Bandung Raya Ekonomi', 'Cimekar', 'Haurpugur', '17:50:00', '18:00:00', 5000.00, 100, '2023-05-17'),
(333, '789 Cimahi Bandung Lodaya (CBL', 'Cimahi', 'Bandung', '17:50:00', '18:00:00', 5000.00, 50, '2023-05-18'),
(334, '555 Bandung Cimahi Metropolitan (BCM)', 'Bandung', 'Cimahi', '07:20:00', '07:35:00', 5000.00, 50, '2023-05-18'),
(335, '443 Bandung Raya Ekonomi', 'Kiaracondong', 'Padalarang', '07:20:00', '07:40:00', 10000.00, 50, '2023-05-18'),
(336, '555 Bandung Cimahi Metropolitan (BCM)', 'Bandung', 'Cimahi', '09:25:00', '09:40:00', 5000.00, 50, '2023-05-18'),
(337, '443 Bandung Raya Ekonomi', 'Cimekar', 'Haurpugur', '17:50:00', '18:00:00', 5000.00, 100, '2023-05-18'),
(351, '789 Cimahi Bandung Lodaya (CBL', 'Cimahi', 'Bandung', '17:50:00', '18:00:00', 5000.00, 50, '2023-05-19'),
(352, '555 Bandung Cimahi Metropolitan (BCM)', 'Bandung', 'Cimahi', '07:20:00', '07:35:00', 5000.00, 49, '2023-05-19'),
(353, '443 Bandung Raya Ekonomi', 'Kiaracondong', 'Padalarang', '07:20:00', '07:40:00', 10000.00, 50, '2023-05-19'),
(354, '555 Bandung Cimahi Metropolitan (BCM)', 'Bandung', 'Cimahi', '09:25:00', '09:40:00', 5000.00, 50, '2023-05-19'),
(355, '443 Bandung Raya Ekonomi', 'Cimekar', 'Haurpugur', '17:50:00', '18:00:00', 5000.00, 100, '2023-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `level_pengguna`
--

CREATE TABLE `level_pengguna` (
  `id_level` int(11) NOT NULL,
  `nama_level` enum('admin','petugas','users') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level_pengguna`
--

INSERT INTO `level_pengguna` (`id_level`, `nama_level`) VALUES
(1, 'admin'),
(2, 'petugas'),
(3, 'users');

-- --------------------------------------------------------

--
-- Table structure for table `pendapatan`
--

CREATE TABLE `pendapatan` (
  `id_pendapatan` int(11) NOT NULL,
  `jumlah_pendapatan` decimal(10,2) NOT NULL,
  `tanggal_pendapatan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendapatan`
--

INSERT INTO `pendapatan` (`id_pendapatan`, `jumlah_pendapatan`, `tanggal_pendapatan`) VALUES
(1, 0.00, '2023-05-15'),
(2, 0.00, '2023-05-15'),
(3, 0.00, '2023-05-15'),
(4, 0.00, '2023-05-15'),
(5, 0.00, '2023-05-15'),
(6, 0.00, '2023-05-15'),
(7, 0.00, '2023-05-15'),
(8, 0.00, '2023-05-15'),
(9, 0.00, '2023-05-15'),
(10, 0.00, '2023-05-15'),
(11, 0.00, '2023-05-15'),
(12, 0.00, '2023-05-15'),
(13, 0.00, '2023-05-15'),
(14, 0.00, '2023-05-15'),
(15, 0.00, '2023-05-15'),
(16, 0.00, '2023-05-15'),
(17, 0.00, '2023-05-15'),
(18, 0.00, '2023-05-15'),
(19, 0.00, '2023-05-16'),
(20, 0.00, '2023-05-16'),
(21, 0.00, '2023-05-16'),
(22, 0.00, '2023-05-16'),
(23, 0.00, '2023-05-16'),
(24, 0.00, '2023-05-16'),
(25, 0.00, '2023-05-16'),
(26, 0.00, '2023-05-16'),
(27, 0.00, '2023-05-16'),
(28, 0.00, '2023-05-16'),
(29, 0.00, '2023-05-16'),
(30, 0.00, '2023-05-16'),
(31, 0.00, '2023-05-16'),
(32, 0.00, '2023-05-16'),
(33, 0.00, '2023-05-16'),
(34, 0.00, '2023-05-16'),
(35, 0.00, '2023-05-16'),
(36, 0.00, '2023-05-16'),
(37, 0.00, '2023-05-16'),
(38, 0.00, '2023-05-16'),
(39, 0.00, '2023-05-16'),
(40, 0.00, '2023-05-16'),
(41, 0.00, '2023-05-16'),
(42, 0.00, '2023-05-16'),
(43, 0.00, '2023-05-16'),
(44, 0.00, '2023-05-16'),
(45, 0.00, '2023-05-16'),
(46, 0.00, '2023-05-16'),
(47, 0.00, '2023-05-16'),
(48, 0.00, '2023-05-16'),
(49, 0.00, '2023-05-16'),
(50, 0.00, '2023-05-16'),
(51, 0.00, '2023-05-16'),
(52, 0.00, '2023-05-16'),
(53, 0.00, '2023-05-16'),
(54, 0.00, '2023-05-16'),
(55, 0.00, '2023-05-16'),
(56, 0.00, '2023-05-16'),
(57, 0.00, '2023-05-16'),
(58, 0.00, '2023-05-16'),
(59, 0.00, '2023-05-16'),
(60, 0.00, '2023-05-16'),
(61, 0.00, '2023-05-16'),
(62, 0.00, '2023-05-16'),
(63, 0.00, '2023-05-16'),
(64, 0.00, '2023-05-16'),
(65, 0.00, '2023-05-16'),
(66, 0.00, '2023-05-16'),
(67, 0.00, '2023-05-16'),
(68, 0.00, '2023-05-16'),
(69, 0.00, '2023-05-16'),
(70, 0.00, '2023-05-16'),
(71, 0.00, '2023-05-16'),
(72, 0.00, '2023-05-16'),
(73, 0.00, '2023-05-16'),
(74, 5000.00, '2023-05-16'),
(75, 5000.00, '2023-05-16'),
(76, 5000.00, '2023-05-16'),
(77, 5000.00, '2023-05-16'),
(78, 5000.00, '2023-05-16'),
(79, 5000.00, '2023-05-16'),
(80, 5000.00, '2023-05-16'),
(81, 5000.00, '2023-05-16'),
(82, 5000.00, '2023-05-16'),
(83, 5000.00, '2023-05-16'),
(84, 5000.00, '2023-05-16'),
(85, 5000.00, '2023-05-16'),
(86, 5000.00, '2023-05-16'),
(87, 5000.00, '2023-05-16'),
(88, 5000.00, '2023-05-16'),
(89, 5000.00, '2023-05-16'),
(90, 10000.00, '2023-05-16'),
(91, 10000.00, '2023-05-16'),
(92, 10000.00, '2023-05-16'),
(93, 10000.00, '2023-05-16'),
(94, 15000.00, '2023-05-16'),
(95, 15000.00, '2023-05-16'),
(96, 15000.00, '2023-05-16'),
(97, 15000.00, '2023-05-16'),
(98, 15000.00, '2023-05-16'),
(99, 15000.00, '2023-05-16'),
(100, 15000.00, '2023-05-16'),
(101, 15000.00, '2023-05-16'),
(102, 15000.00, '2023-05-16'),
(103, 15000.00, '2023-05-16'),
(104, 15000.00, '2023-05-16'),
(105, 15000.00, '2023-05-16'),
(106, 15000.00, '2023-05-16'),
(107, 15000.00, '2023-05-16'),
(108, 15000.00, '2023-05-16'),
(109, 15000.00, '2023-05-16'),
(110, 15000.00, '2023-05-16'),
(111, 15000.00, '2023-05-16'),
(112, 15000.00, '2023-05-16'),
(113, 15000.00, '2023-05-16'),
(114, 15000.00, '2023-05-16'),
(115, 15000.00, '2023-05-16'),
(116, 15000.00, '2023-05-16'),
(117, 15000.00, '2023-05-16'),
(118, 15000.00, '2023-05-16'),
(119, 15000.00, '2023-05-16'),
(120, 15000.00, '2023-05-16'),
(121, 15000.00, '2023-05-16'),
(122, 15000.00, '2023-05-16'),
(123, 15000.00, '2023-05-16'),
(124, 15000.00, '2023-05-16'),
(125, 15000.00, '2023-05-16'),
(126, 15000.00, '2023-05-16'),
(127, 15000.00, '2023-05-16'),
(128, 15000.00, '2023-05-16'),
(129, 15000.00, '2023-05-16'),
(130, 15000.00, '2023-05-16'),
(131, 15000.00, '2023-05-16'),
(132, 40000.00, '2023-05-16'),
(133, 40000.00, '2023-05-16'),
(134, 40000.00, '2023-05-16'),
(135, 40000.00, '2023-05-16'),
(136, 40000.00, '2023-05-16'),
(137, 40000.00, '2023-05-16'),
(138, 40000.00, '2023-05-16'),
(139, 40000.00, '2023-05-16'),
(140, 40000.00, '2023-05-16'),
(141, 40000.00, '2023-05-16'),
(142, 40000.00, '2023-05-16'),
(143, 40000.00, '2023-05-16'),
(144, 40000.00, '2023-05-16'),
(145, 40000.00, '2023-05-16'),
(146, 40000.00, '2023-05-16'),
(147, 40000.00, '2023-05-16'),
(148, 40000.00, '2023-05-16'),
(149, 40000.00, '2023-05-16'),
(150, 40000.00, '2023-05-16'),
(151, 40000.00, '2023-05-16'),
(152, 40000.00, '2023-05-16'),
(153, 40000.00, '2023-05-18'),
(154, 40000.00, '2023-05-18'),
(155, 40000.00, '2023-05-18'),
(156, 40000.00, '2023-05-18'),
(157, 40000.00, '2023-05-18'),
(158, 40000.00, '2023-05-18'),
(159, 40000.00, '2023-05-18'),
(160, 40000.00, '2023-05-18'),
(161, 40000.00, '2023-05-18'),
(162, 40000.00, '2023-05-18'),
(163, 40000.00, '2023-05-18'),
(164, 40000.00, '2023-05-18'),
(165, 40000.00, '2023-05-18'),
(166, 40000.00, '2023-05-18'),
(167, 40000.00, '2023-05-18'),
(168, 40000.00, '2023-05-18'),
(169, 40000.00, '2023-05-18'),
(170, 40000.00, '2023-05-18'),
(171, 40000.00, '2023-05-18'),
(172, 40000.00, '2023-05-18'),
(173, 40000.00, '2023-05-18'),
(174, 40000.00, '2023-05-18'),
(175, 40000.00, '2023-05-18'),
(176, 40000.00, '2023-05-18'),
(177, 40000.00, '2023-05-18'),
(178, 40000.00, '2023-05-18'),
(179, 40000.00, '2023-05-18'),
(180, 40000.00, '2023-05-18'),
(181, 40000.00, '2023-05-18'),
(182, 40000.00, '2023-05-18'),
(183, 40000.00, '2023-05-18'),
(184, 40000.00, '2023-05-18'),
(185, 40000.00, '2023-05-18'),
(186, 40000.00, '2023-05-18'),
(187, 40000.00, '2023-05-18'),
(188, 40000.00, '2023-05-18'),
(189, 40000.00, '2023-05-18'),
(190, 40000.00, '2023-05-18'),
(191, 40000.00, '2023-05-18'),
(192, 40000.00, '2023-05-18'),
(193, 40000.00, '2023-05-18'),
(194, 40000.00, '2023-05-18'),
(195, 40000.00, '2023-05-18'),
(196, 40000.00, '2023-05-18'),
(197, 40000.00, '2023-05-18'),
(198, 40000.00, '2023-05-18'),
(199, 40000.00, '2023-05-18'),
(200, 40000.00, '2023-05-18'),
(201, 40000.00, '2023-05-18'),
(202, 40000.00, '2023-05-18'),
(203, 40000.00, '2023-05-18'),
(204, 40000.00, '2023-05-18'),
(205, 40000.00, '2023-05-18'),
(206, 40000.00, '2023-05-18'),
(207, 40000.00, '2023-05-18'),
(208, 40000.00, '2023-05-18'),
(209, 40000.00, '2023-05-18'),
(210, 40000.00, '2023-05-18'),
(211, 40000.00, '2023-05-18'),
(212, 40000.00, '2023-05-18'),
(213, 40000.00, '2023-05-18'),
(214, 40000.00, '2023-05-18'),
(215, 15000.00, '2023-05-18'),
(216, 15000.00, '2023-05-18'),
(217, 15000.00, '2023-05-18'),
(218, 15000.00, '2023-05-18'),
(219, 15000.00, '2023-05-18'),
(220, 15000.00, '2023-05-18'),
(221, 15000.00, '2023-05-18'),
(222, 15000.00, '2023-05-18'),
(223, 15000.00, '2023-05-18'),
(224, 15000.00, '2023-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `email`, `password`, `id_level`) VALUES
(2, 'Milo', 'milo@gmail.com', '4bbe97464db8b8665411740d5c2a5e4a', 3),
(3, 'Raihan', 'raihan@gmai.com', 'daa6b8d04ce72d953d5501adc53ddd82', 2),
(4, 'Boby', 'boby@gmail.com', 'c83e4046a7c5d3c4bf4c292e1e6ec681', 3),
(5, 'Alya', 'alya@gmail.com', '11928ca22a60b25479e3f0799a0a3d5f', 3),
(9, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rincian_pemesanan`
--

CREATE TABLE `rincian_pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_jadwal` int(11) DEFAULT NULL,
  `tipe_id` varchar(255) DEFAULT NULL,
  `no_id` longtext DEFAULT NULL,
  `nama_lengkap` longtext DEFAULT NULL,
  `jumlah_penumpang` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `status_pembayaran` enum('Lunas','Belum Bayar','Dibatalkan') NOT NULL,
  `kode_pembayaran` varchar(225) NOT NULL,
  `nomor_kursi` varchar(225) NOT NULL,
  `waktu_pemesanan` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rincian_pemesanan`
--

INSERT INTO `rincian_pemesanan` (`id_pemesanan`, `id_pengguna`, `id_jadwal`, `tipe_id`, `no_id`, `nama_lengkap`, `jumlah_penumpang`, `total_harga`, `status_pembayaran`, `kode_pembayaran`, `nomor_kursi`, `waktu_pemesanan`) VALUES
(1, 2, 6, 'KTP', '3253453453453452', 'ALYA ANASTASYA', 1, 5000, 'Dibatalkan', 'P230515FJX4V', 'A1', '2023-05-15'),
(2, 2, 8, 'KTP', '3223423443342353', 'HENDRA WIJAYA', 1, 5000, 'Dibatalkan', 'P2305163L9I1', 'A1', '2023-05-16'),
(3, 2, 8, 'KTP', '3223423443342353', 'HENDRA WIJAYA', 1, 5000, 'Lunas', 'P230516TX4WU', 'A22', '2023-05-16'),
(4, 2, 8, 'KTP', '3223423443342353', 'HENDRA WIJAYA', 1, 5000, 'Lunas', 'P230516RGJ08', 'B69', '2023-05-16'),
(5, 4, 8, 'KTP', '3234342342345566', 'ALYA ANASTASYA', 1, 5000, 'Lunas', 'P230516MYQNR', 'B39', '2023-05-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_petugas`
--
ALTER TABLE `data_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `jadwal_kereta`
--
ALTER TABLE `jadwal_kereta`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD UNIQUE KEY `kota_asal` (`kota_asal`,`kota_tujuan`,`jam_keberangkatan`,`jam_kedatangan`,`tanggal_keberangkatan`);

--
-- Indexes for table `level_pengguna`
--
ALTER TABLE `level_pengguna`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD PRIMARY KEY (`id_pendapatan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `rincian_pemesanan`
--
ALTER TABLE `rincian_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_pengguna` (`id_pengguna`,`id_jadwal`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_petugas`
--
ALTER TABLE `data_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal_kereta`
--
ALTER TABLE `jadwal_kereta`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=392;

--
-- AUTO_INCREMENT for table `level_pengguna`
--
ALTER TABLE `level_pengguna`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pendapatan`
--
ALTER TABLE `pendapatan`
  MODIFY `id_pendapatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rincian_pemesanan`
--
ALTER TABLE `rincian_pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_petugas`
--
ALTER TABLE `data_petugas`
  ADD CONSTRAINT `data_petugas_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level_pengguna` (`id_level`);

--
-- Constraints for table `rincian_pemesanan`
--
ALTER TABLE `rincian_pemesanan`
  ADD CONSTRAINT `rincian_pemesanan_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_kereta` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rincian_pemesanan_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

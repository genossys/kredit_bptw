-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2019 at 05:13 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skr_bptw`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_angsuran`
--

CREATE TABLE `tb_angsuran` (
  `idAngsuran` int(11) NOT NULL,
  `noKontrak` varchar(50) NOT NULL,
  `idKreditur` int(11) NOT NULL,
  `jatuhTempo` date NOT NULL,
  `statusBayar` enum('belum','sudah') NOT NULL DEFAULT 'belum',
  `tanggalPembayaran` date DEFAULT NULL,
  `namaPetugas` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_angsuran`
--

INSERT INTO `tb_angsuran` (`idAngsuran`, `noKontrak`, `idKreditur`, `jatuhTempo`, `statusBayar`, `tanggalPembayaran`, `namaPetugas`) VALUES
(1, '12345', 4, '2019-08-19', 'sudah', '2019-08-19', 'Bhambang'),
(2, '12345', 4, '2019-09-19', 'sudah', '2019-08-19', 'Bhambang'),
(3, '12345', 4, '2019-10-19', 'sudah', '2019-08-19', 'Bhambang'),
(4, '12345', 4, '2019-11-19', 'sudah', '2019-08-19', 'Bhambang'),
(5, '12345', 4, '2019-12-19', 'sudah', '2019-08-19', 'Bhambang'),
(6, '12345', 4, '2020-01-19', 'sudah', '2019-08-19', 'Bhambang'),
(7, '12345', 4, '2020-02-19', 'sudah', '2019-08-19', 'Bhambang'),
(8, '12345', 4, '2020-03-19', 'sudah', '2019-08-23', 'Bhambang'),
(9, '12345', 4, '2020-04-19', 'sudah', '2019-08-23', 'Bhambang'),
(10, '12345', 4, '2020-05-19', 'sudah', '2019-08-23', 'Bhambang'),
(11, '12345', 4, '2020-06-19', 'sudah', '2019-08-23', 'Bhambang'),
(12, '12345', 4, '2020-07-19', 'belum', NULL, 'Bhambang'),
(13, '20190823052357', 5, '2019-08-23', 'sudah', '2019-08-23', 'Bhambang'),
(14, '20190823052357', 5, '2019-09-23', 'belum', NULL, 'Bhambang'),
(15, '20190823052357', 5, '2019-10-23', 'belum', NULL, 'Bhambang'),
(16, '20190823052357', 5, '2019-11-23', 'belum', NULL, 'Bhambang'),
(17, '20190823052357', 5, '2019-12-23', 'belum', NULL, 'Bhambang'),
(18, '20190823052357', 5, '2020-01-23', 'belum', NULL, 'Bhambang'),
(19, '20190823052357', 5, '2020-02-23', 'belum', NULL, 'Bhambang'),
(20, '20190823052357', 5, '2020-03-23', 'belum', NULL, 'Bhambang'),
(21, '20190823052357', 5, '2020-04-23', 'belum', NULL, 'Bhambang'),
(22, '20190823052357', 5, '2020-05-23', 'belum', NULL, 'Bhambang'),
(23, '20190823052357', 5, '2020-06-23', 'belum', NULL, 'Bhambang'),
(24, '20190823052357', 5, '2020-07-23', 'belum', NULL, 'Bhambang'),
(25, '20190823014851', 6, '2019-08-23', 'sudah', '2019-08-23', 'Bhambang'),
(26, '20190823014851', 6, '2019-09-23', 'belum', NULL, 'Bhambang'),
(27, '20190823014851', 6, '2019-10-23', 'belum', NULL, 'Bhambang'),
(28, '20190823014851', 6, '2019-11-23', 'belum', NULL, 'Bhambang'),
(29, '20190823014851', 6, '2019-12-23', 'belum', NULL, 'Bhambang'),
(30, '20190823014851', 6, '2020-01-23', 'belum', NULL, 'Bhambang'),
(31, '20190823014851', 6, '2020-02-23', 'belum', NULL, 'Bhambang'),
(32, '20190823014851', 6, '2020-03-23', 'belum', NULL, 'Bhambang'),
(33, '20190823014851', 6, '2020-04-23', 'belum', NULL, 'Bhambang'),
(34, '20190823014851', 6, '2020-05-23', 'belum', NULL, 'Bhambang'),
(35, '20190823014851', 6, '2020-06-23', 'belum', NULL, 'Bhambang'),
(36, '20190823014851', 6, '2020-07-23', 'belum', NULL, 'Bhambang'),
(37, '20190823021526', 8, '2019-08-23', 'sudah', '2019-08-23', 'Bhambang'),
(38, '20190823021526', 8, '2019-09-23', 'belum', NULL, 'Bhambang'),
(39, '20190823021526', 8, '2019-10-23', 'belum', NULL, 'Bhambang'),
(40, '20190823021526', 8, '2019-11-23', 'belum', NULL, 'Bhambang'),
(41, '20190823021526', 8, '2019-12-23', 'belum', NULL, 'Bhambang'),
(42, '20190823021526', 8, '2020-01-23', 'belum', NULL, 'Bhambang'),
(43, '20190823021526', 8, '2020-02-23', 'belum', NULL, 'Bhambang'),
(44, '20190823021526', 8, '2020-03-23', 'belum', NULL, 'Bhambang'),
(45, '20190823021526', 8, '2020-04-23', 'belum', NULL, 'Bhambang'),
(46, '20190823021526', 8, '2020-05-23', 'belum', NULL, 'Bhambang'),
(47, '20190823021526', 8, '2020-06-23', 'belum', NULL, 'Bhambang'),
(48, '20190823021526', 8, '2020-07-23', 'belum', NULL, 'Bhambang'),
(49, '20190827012051', 10, '2019-08-27', 'belum', NULL, 'Bhambang'),
(50, '20190827012051', 10, '2019-09-27', 'belum', NULL, 'Bhambang'),
(51, '20190827012051', 10, '2019-10-27', 'belum', NULL, 'Bhambang'),
(52, '20190827012051', 10, '2019-11-27', 'belum', NULL, 'Bhambang'),
(53, '20190827012051', 10, '2019-12-27', 'belum', NULL, 'Bhambang'),
(54, '20190827012051', 10, '2020-01-27', 'belum', NULL, 'Bhambang'),
(55, '20190827012051', 10, '2020-02-27', 'belum', NULL, 'Bhambang'),
(56, '20190827012051', 10, '2020-03-27', 'belum', NULL, 'Bhambang'),
(57, '20190827012051', 10, '2020-04-27', 'belum', NULL, 'Bhambang'),
(58, '20190827012051', 10, '2020-05-27', 'belum', NULL, 'Bhambang'),
(59, '20190827012051', 10, '2020-06-27', 'belum', NULL, 'Bhambang'),
(60, '20190827012051', 10, '2020-07-27', 'belum', NULL, 'Bhambang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bank`
--

CREATE TABLE `tb_bank` (
  `id` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_bank`
--

INSERT INTO `tb_bank` (`id`, `email`, `nama`, `alamat`, `contact`, `nohp`, `password`, `created_at`, `updated_at`) VALUES
(1, 'bigger.adv@gmail.com', 'mandiri', 'cilacap', 'aini2', '219388', '$2y$10$i5zXs7zVGro3DakIJJcStuVwC1Iaz9h9/E2Jx8Bb0aqeZyjwOjMCS', '2019-07-21 09:09:09', '2019-07-21 09:31:00'),
(2, 'bca@gmail.com', 'BCA cb cilacap', 'Cilacap', 'bca', '0271938122', '$2y$10$M7dzaZL1Tzrss5lXFvjy6eZ2oVWNsw4t/RRkm0XZL12/VqgNh.2VC', '2019-08-19 03:19:57', '2019-08-19 03:19:57');

--
-- Triggers `tb_bank`
--
DELIMITER $$
CREATE TRIGGER `ADbank` AFTER DELETE ON `tb_bank` FOR EACH ROW BEGIN
                    DELETE FROM `tb_user` WHERE `tb_user`.`email` = OLD.email;
                END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `BIbank` BEFORE INSERT ON `tb_bank` FOR EACH ROW BEGIN
                    INSERT INTO `tb_user` (`email`,  `nama`,`password` , `hakAkses` , `created_at`, `updated_at`) VALUES (NEW.email,  NEW.nama, NEW.password, 'bank' , NEW.created_at, NEW.updated_at);
                END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kredit`
--

CREATE TABLE `tb_kredit` (
  `id` int(11) NOT NULL,
  `noKontrak` varchar(50) NOT NULL,
  `idKreditur` int(11) NOT NULL,
  `idRumah` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `idBank` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `dp` bigint(20) NOT NULL,
  `angsuran` bigint(20) NOT NULL,
  `top` int(11) NOT NULL,
  `status` enum('proses','diterima','ditolak') NOT NULL DEFAULT 'proses',
  `alasanPenolakan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kredit`
--

INSERT INTO `tb_kredit` (`id`, `noKontrak`, `idKreditur`, `idRumah`, `idBank`, `tanggal`, `dp`, `angsuran`, `top`, `status`, `alasanPenolakan`) VALUES
(1, '12345', 4, 'Rumah001', 2, '2019-08-14', 120000000, 40000000, 12, 'diterima', NULL),
(2, '20190823052357', 5, 'Rumah001', 1, '2019-08-23', 120000000, 40000000, 12, 'diterima', NULL),
(3, '20190823014851', 6, 'Rumah001', 1, '2019-08-23', 300000000, 25000000, 12, 'diterima', NULL),
(4, '20190823021526', 8, 'Rumah002', 1, '2019-08-23', 2400000000, 800000000, 12, 'diterima', NULL),
(6, '20190827012051', 10, 'Rumah002', 1, '2019-08-27', 8400000000, 300000000, 12, 'diterima', NULL),
(7, '20190828025011', 9, 'Rumah001', 2, '2019-08-28', 120000000, 8000000, 60, 'ditolak', 'Pendapatan anda kurang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kreditur`
--

CREATE TABLE `tb_kreditur` (
  `id` int(11) NOT NULL,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nohp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urlFoto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_kreditur`
--

INSERT INTO `tb_kreditur` (`id`, `nik`, `nama`, `email`, `alamat`, `tgl_lahir`, `nohp`, `password`, `urlFoto`, `created_at`, `updated_at`) VALUES
(1, '332231823981', 'pradana mahendra', 'pradanamahendra@gmail.com', 'solo', '1992-02-27', '02910938', '$2y$10$wMpSeNRtTJgSBPd4QPmPdeRl/gkp2z302kavtiOdSxZwv5w8fx7p.', '33223182398187672575.jpeg', '2019-07-19 11:28:13', '2019-08-22 21:51:36'),
(4, '391729', 'aini', 'aini@gmail.com', 'cilacap', '1944-11-30', '12312', '$2y$10$6l9h1NPfa7DVrSCsDWU05ufu6TO8TczOQ0CDQ7urNPs6isrzrfml2', '391729930622790.png', '2019-07-21 10:27:53', '2019-07-21 10:27:53'),
(5, '12345', 'pradana', 'pradana@gmail.com', 'solo', '1992-11-26', '089218328', '$2y$10$eEW76j0dN3Qclg/CnJsWw.51.Vp6hnbzu3D34Zrhw/eOQRCKyeCtG', '12345903680791.jpg', '2019-08-22 21:34:56', '2019-08-22 21:34:56'),
(6, '2134124', 'bagus', 'bagus@gmail.com', 'solo', '2010-07-17', '082313', '$2y$10$igBfIvAgEJtRS1yiu2ONNOMzzFyWDfFzJnLLUcjTH1OBugnCLSqam', '2134124959465031.jpg', '2019-08-22 21:36:41', '2019-08-22 21:36:41'),
(7, '1234567', 'topik', 'topik@gmail.com', 'solo', '2019-03-06', '08908421908', '$2y$10$5pSWi4d/4fXe3hBk9JGpnuzRc/oHrYXH5BkmWVQeiYg8HMJyJeSuS', '12345671680347305.jpeg', '2019-08-22 21:39:02', '2019-08-22 21:39:02'),
(8, '0031293', 'pelanggan', 'pelanggan@gmail.com', 'solo', '2001-07-25', '098123098', '$2y$10$3TVCcu0PSM9u81mJOEX4j.Yk1d2OaKjIx31TRcB9C5XW6Yl1.giy.', '0031293468382691.jpeg', '2019-08-23 07:15:08', '2019-08-23 07:15:08'),
(9, '2019001', 'kreditur1', 'kreditur1@gmail.com', 'cilacap', '1989-07-20', '08418984', '$2y$10$juhFjQ3lPfTeyDF4e7/TKOzxytWdC31n9rGZkbIAmWjQ9YmZJWh8.', '20190011929844398.jpg', '2019-08-27 06:17:39', '2019-08-27 06:17:39'),
(10, '201950031', 'kreditur2', 'kreditur2@gmail.com', 'cilacap', '2000-06-20', '08319283', '$2y$10$i5t42Q/OXumZRZyqFjsre.K.e7Klcn7060mJ5Q6PCZ2SbZaYZyUBG', '2019500311065225343.jpg', '2019-08-27 06:20:28', '2019-08-27 06:20:28');

--
-- Triggers `tb_kreditur`
--
DELIMITER $$
CREATE TRIGGER `ADkreditur` AFTER DELETE ON `tb_kreditur` FOR EACH ROW BEGIN
                    DELETE FROM `tb_user` WHERE `tb_user`.`email` = OLD.email;
                END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `BIkreditur` BEFORE INSERT ON `tb_kreditur` FOR EACH ROW BEGIN
                    INSERT INTO `tb_user` (`email`, `nama`,`password` , `hakAkses` , `created_at`, `updated_at`) VALUES (NEW.email, NEW.nama, NEW.password, 'kreditur' , NEW.created_at, NEW.updated_at);
                END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rumah`
--

CREATE TABLE `tb_rumah` (
  `idRumah` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaRumah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hargaJual` bigint(20) NOT NULL DEFAULT '0',
  `lokasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusJual` enum('belum','terjual') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum',
  `urlFoto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_rumah`
--

INSERT INTO `tb_rumah` (`idRumah`, `namaRumah`, `hargaJual`, `lokasi`, `deskripsi`, `statusJual`, `urlFoto`, `created_at`, `updated_at`) VALUES
('Rumah001', 'Rumah Elegan', 600000000, 'Solo', '* Luas 105m\r\n* 2 Kamar Tidur kt 2\r\n* km/wc\r\n* bonus ac\r\n* posisi hook\r\n* Dekat masjid\r\n* Dekat pom bensin\r\n* Dekat klinik kesehatan\r\n* Lokasi utara masjid Al Aqso Gentan', 'belum', '648.jpg', '2019-08-09 09:55:09', '2019-08-27 06:18:00'),
('Rumah002', 'Rumah Mewah', 12000000000, 'Solo', '* Luas 1020m\r\n* 4 Kamar Tidur kt \r\n* km/wc\r\n* bonus ac\r\n* posisi hook\r\n* Dekat masjid\r\n* Dekat pom bensin\r\n* Dekat klinik kesehatan\r\n* Lokasi utara masjid Al Aqso Gentan', 'terjual', '438.jpg', '2019-08-09 09:58:30', '2019-08-27 06:22:03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` bigint(20) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hakAkses` enum('bank','admin','kreditur') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'kreditur',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `email`, `nama`, `password`, `hakAkses`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', 'bhambang', '$2y$10$JlpRSrwJxJfsNsOPwLBUwOI840i3JBjDDrMNZbzk/GtjwBg0KD.7.', 'admin', NULL, NULL),
(3, 'pradanamahendra@gmail.com', 'pradana mahendra', '$2y$10$wMpSeNRtTJgSBPd4QPmPdeRl/gkp2z302kavtiOdSxZwv5w8fx7p.', 'kreditur', '2019-07-19 11:28:13', '2019-07-19 11:28:13'),
(6, 'asd@gmail.com', 'asd', '$2y$10$8NkLXGfsN12cNkYaWn.0w.QAk1plr0jIi7lEuWAyGbFEdGhEieYUm', 'admin', '2019-07-19 12:53:27', '2019-07-19 12:53:27'),
(7, 'aaaa@aaa', 'aaa', '$2y$10$VNWj2iyrBydvLwAgsFNXXO26YDhXV1dhM/tkLBdycozllEAg.HzIO', 'admin', '2019-07-19 12:54:03', '2019-07-19 12:54:03'),
(8, 'eeee@eee', 'eeee', '$2y$10$w4YJyVvaQrsA./NCjmzWle6B27F4xvkDz29z9diuBf1/UJcN5u6va', 'admin', '2019-07-19 12:54:54', '2019-07-19 12:54:54'),
(9, 'bigger.adv@gmail.com', 'mandiri', '$2y$10$i5zXs7zVGro3DakIJJcStuVwC1Iaz9h9/E2Jx8Bb0aqeZyjwOjMCS', 'bank', '2019-07-21 09:09:09', '2019-07-21 09:09:09'),
(11, 'aini@gmail.com', 'aini', '$2y$10$6l9h1NPfa7DVrSCsDWU05ufu6TO8TczOQ0CDQ7urNPs6isrzrfml2', 'kreditur', '2019-07-21 10:27:53', '2019-07-21 10:27:53'),
(12, 'bca@gmail.com', 'BCA cb cilacap', '$2y$10$M7dzaZL1Tzrss5lXFvjy6eZ2oVWNsw4t/RRkm0XZL12/VqgNh.2VC', 'bank', '2019-08-19 03:19:57', '2019-08-19 03:19:57'),
(13, 'pradana@gmail.com', 'pradana', '$2y$10$eEW76j0dN3Qclg/CnJsWw.51.Vp6hnbzu3D34Zrhw/eOQRCKyeCtG', 'kreditur', '2019-08-22 21:34:56', '2019-08-22 21:34:56'),
(14, 'bagus@gmail.com', 'bagus', '$2y$10$igBfIvAgEJtRS1yiu2ONNOMzzFyWDfFzJnLLUcjTH1OBugnCLSqam', 'kreditur', '2019-08-22 21:36:41', '2019-08-22 21:36:41'),
(15, 'topik@gmail.com', 'topik', '$2y$10$5pSWi4d/4fXe3hBk9JGpnuzRc/oHrYXH5BkmWVQeiYg8HMJyJeSuS', 'kreditur', '2019-08-22 21:39:02', '2019-08-22 21:39:02'),
(16, 'pelanggan@gmail.com', 'pelanggan', '$2y$10$3TVCcu0PSM9u81mJOEX4j.Yk1d2OaKjIx31TRcB9C5XW6Yl1.giy.', 'kreditur', '2019-08-23 07:15:08', '2019-08-23 07:15:08'),
(17, 'kreditur1@gmail.com', 'kreditur1', '$2y$10$juhFjQ3lPfTeyDF4e7/TKOzxytWdC31n9rGZkbIAmWjQ9YmZJWh8.', 'kreditur', '2019-08-27 06:17:39', '2019-08-27 06:17:39'),
(18, 'kreditur2@gmail.com', 'kreditur2', '$2y$10$i5t42Q/OXumZRZyqFjsre.K.e7Klcn7060mJ5Q6PCZ2SbZaYZyUBG', 'kreditur', '2019-08-27 06:20:28', '2019-08-27 06:20:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_angsuran`
--
ALTER TABLE `tb_angsuran`
  ADD PRIMARY KEY (`idAngsuran`),
  ADD KEY `idKreditur` (`idKreditur`),
  ADD KEY `noKontrak` (`noKontrak`);

--
-- Indexes for table `tb_bank`
--
ALTER TABLE `tb_bank`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_bank_email_unique` (`email`);

--
-- Indexes for table `tb_kredit`
--
ALTER TABLE `tb_kredit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idBank` (`idBank`),
  ADD KEY `idKreditur` (`idKreditur`),
  ADD KEY `idRumah` (`idRumah`),
  ADD KEY `noKontrak` (`noKontrak`);

--
-- Indexes for table `tb_kreditur`
--
ALTER TABLE `tb_kreditur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_kreditur_nik_unique` (`nik`),
  ADD UNIQUE KEY `tb_kreditur_email_unique` (`email`);

--
-- Indexes for table `tb_rumah`
--
ALTER TABLE `tb_rumah`
  ADD PRIMARY KEY (`idRumah`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_user_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_angsuran`
--
ALTER TABLE `tb_angsuran`
  MODIFY `idAngsuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tb_bank`
--
ALTER TABLE `tb_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kredit`
--
ALTER TABLE `tb_kredit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_kreditur`
--
ALTER TABLE `tb_kreditur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_angsuran`
--
ALTER TABLE `tb_angsuran`
  ADD CONSTRAINT `tb_angsuran_ibfk_1` FOREIGN KEY (`idKreditur`) REFERENCES `tb_kreditur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_angsuran_ibfk_2` FOREIGN KEY (`noKontrak`) REFERENCES `tb_kredit` (`noKontrak`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_kredit`
--
ALTER TABLE `tb_kredit`
  ADD CONSTRAINT `tb_kredit_ibfk_1` FOREIGN KEY (`idBank`) REFERENCES `tb_bank` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_kredit_ibfk_2` FOREIGN KEY (`idKreditur`) REFERENCES `tb_kreditur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_kredit_ibfk_3` FOREIGN KEY (`idRumah`) REFERENCES `tb_rumah` (`idRumah`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

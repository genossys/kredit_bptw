-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2019 at 10:05 PM
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_06_17_072130_tb_master', 1),
(2, '2019_06_17_082914_tb_transaksi', 1),
(3, '2019_06_17_153147_relasi_transaksi', 1),
(4, '2019_06_18_191317_triger_user', 1),
(5, '2019_06_18_201745_add_url_foto', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_angsuran`
--

CREATE TABLE `tb_angsuran` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_angsuran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_proses` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `angsuran` bigint(20) NOT NULL DEFAULT '0',
  `denda` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'bigger.adv@gmail.com', 'mandiri', 'cilacap', 'aini2', '219388', '$2y$10$i5zXs7zVGro3DakIJJcStuVwC1Iaz9h9/E2Jx8Bb0aqeZyjwOjMCS', '2019-07-21 09:09:09', '2019-07-21 09:31:00');

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
                    INSERT INTO `tb_user` (`email`,  `nama`,`password` , `hakAkses` , `created_at`, `updated_at`) VALUES (NEW.email,  NEW.nama, NEW.password, 'kreditur' , NEW.created_at, NEW.updated_at);
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
  `dp` int(11) NOT NULL,
  `angsuran` int(11) NOT NULL,
  `top` int(11) NOT NULL,
  `status` enum('proses','diterima','ditolak') NOT NULL DEFAULT 'proses'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '332231823981', 'pradana mahendra', 'pradanamahendra@gmail.com', 'solo', '1992-02-29', '02910938', '$2y$10$wMpSeNRtTJgSBPd4QPmPdeRl/gkp2z302kavtiOdSxZwv5w8fx7p.', '33223182398187672575.jpeg', '2019-07-19 11:28:13', '2019-07-19 11:28:13'),
(4, '391729', 'aini', 'aini@gmail.com', 'cilacap', '1944-11-30', '12312', '$2y$10$6l9h1NPfa7DVrSCsDWU05ufu6TO8TczOQ0CDQ7urNPs6isrzrfml2', '391729930622790.png', '2019-07-21 10:27:53', '2019-07-21 10:27:53');

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
  `urlFoto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_rumah`
--

INSERT INTO `tb_rumah` (`idRumah`, `namaRumah`, `hargaJual`, `lokasi`, `deskripsi`, `urlFoto`, `created_at`, `updated_at`) VALUES
('1', 'Perumahan 36/50', 250000000, 'Jl. bla bla bla', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla', '873.png', NULL, '2019-07-21 11:42:11'),
('ad', 'asd', 123, 'asd', 'asd', '', '2019-07-21 10:58:54', '2019-07-21 10:58:54'),
('asdad', 'asdad', 12341, 'asd adsadad', 'asdasd', '895.jpg', '2019-07-21 11:08:00', '2019-07-21 11:44:27'),
('asdsadasd', 'iuasd', 2198309, 'sndaiusn', 'iundsiaund', '', '2019-07-21 11:36:52', '2019-07-21 11:36:52'),
('asdsadasdsad', 'asdsadsad', 231321, 'asdad', 'asdasd', '272.jpg', '2019-07-21 11:39:01', '2019-07-21 11:46:15'),
('nasd', 'iuasd', 2198309, 'sndaiusn', 'iundsiaund', '', '2019-07-21 11:36:39', '2019-07-21 11:36:39'),
('rumah0303', 'Perumahan Indah', 300000, 'solo', 'perumahan elite dengan type 50/90', '', '2019-07-21 10:55:38', '2019-07-21 10:55:38'),
('vfr', 'vrfvr', 34234, 'bgt', 'gbtbt', '', '2019-07-21 11:19:21', '2019-07-21 11:19:21');

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
(1, 'admin@gmail.com', 'admin', '$2y$10$JlpRSrwJxJfsNsOPwLBUwOI840i3JBjDDrMNZbzk/GtjwBg0KD.7.', 'admin', NULL, NULL),
(3, 'pradanamahendra@gmail.com', 'pradana mahendra', '$2y$10$wMpSeNRtTJgSBPd4QPmPdeRl/gkp2z302kavtiOdSxZwv5w8fx7p.', 'kreditur', '2019-07-19 11:28:13', '2019-07-19 11:28:13'),
(6, 'asd@gmail.com', 'asd', '$2y$10$8NkLXGfsN12cNkYaWn.0w.QAk1plr0jIi7lEuWAyGbFEdGhEieYUm', 'admin', '2019-07-19 12:53:27', '2019-07-19 12:53:27'),
(7, 'aaaa@aaa', 'aaa', '$2y$10$VNWj2iyrBydvLwAgsFNXXO26YDhXV1dhM/tkLBdycozllEAg.HzIO', 'admin', '2019-07-19 12:54:03', '2019-07-19 12:54:03'),
(8, 'eeee@eee', 'eeee', '$2y$10$w4YJyVvaQrsA./NCjmzWle6B27F4xvkDz29z9diuBf1/UJcN5u6va', 'admin', '2019-07-19 12:54:54', '2019-07-19 12:54:54'),
(9, 'bigger.adv@gmail.com', 'mandiri', '$2y$10$i5zXs7zVGro3DakIJJcStuVwC1Iaz9h9/E2Jx8Bb0aqeZyjwOjMCS', 'kreditur', '2019-07-21 09:09:09', '2019-07-21 09:09:09'),
(11, 'aini@gmail.com', 'aini', '$2y$10$6l9h1NPfa7DVrSCsDWU05ufu6TO8TczOQ0CDQ7urNPs6isrzrfml2', 'kreditur', '2019-07-21 10:27:53', '2019-07-21 10:27:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_angsuran`
--
ALTER TABLE `tb_angsuran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_angsuran_kode_angsuran_unique` (`kode_angsuran`),
  ADD UNIQUE KEY `tb_angsuran_kode_proses_unique` (`kode_proses`),
  ADD KEY `tb_angsuran_id_index` (`id`);

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
  ADD KEY `idBank` (`idBank`),
  ADD KEY `idKreditur` (`idKreditur`),
  ADD KEY `idRumah` (`idRumah`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_angsuran`
--
ALTER TABLE `tb_angsuran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_bank`
--
ALTER TABLE `tb_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kreditur`
--
ALTER TABLE `tb_kreditur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_angsuran`
--
ALTER TABLE `tb_angsuran`
  ADD CONSTRAINT `kode_proses_ifk` FOREIGN KEY (`kode_proses`) REFERENCES `tb_proseskredit` (`kode_proses`) ON DELETE CASCADE ON UPDATE CASCADE;

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

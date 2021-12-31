-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 31, 2021 at 06:56 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `calon_siswa`
--

CREATE TABLE `calon_siswa` (
  `id` int(11) NOT NULL,
  `nik` bigint(16) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `hp` varchar(16) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `calon_siswa`
--

INSERT INTO `calon_siswa` (`id`, `nik`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `hp`, `foto`, `status`, `created_at`, `update_at`, `created_by`) VALUES
(1, NULL, 'Waluyo', NULL, NULL, 'Pria', '08999777696', NULL, 1, '2021-11-22 20:35:46', '2021-12-29 10:54:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `attr` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `attr`, `value`) VALUES
(1, 'APP_NAME', 'Universitas BasisCoding'),
(2, 'APP_NAME_SLUG', 'UBCoding'),
(3, 'LOGO', 'logo-text.png'),
(8, 'RT', '02'),
(9, 'RW', '02'),
(10, 'KODE_POS', '42162'),
(11, 'KELURAHAN', '3673030003'),
(12, 'KECAMATAN', '3673030'),
(13, 'KABUPATEN', '3673'),
(14, 'PROVINSI', '36'),
(15, 'LATTITUDE', '-6.1067488'),
(16, 'LONGITUDE', '106.1370279'),
(30, 'EMAIL', 'basiscoding20@gmail.com'),
(31, 'WEBSITE', 'ubcoding.com'),
(32, 'APP_ICON', 'logo-icon.png'),
(34, 'SLOGAN', 'Teamwork Makes Everything Easier');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'kepsek', 'Kepala Sekolah'),
(3, 'panitia', 'Panitia'),
(4, 'calon_siswa', 'Calon Siswa'),
(5, 'pengajar', 'Pengajar');

-- --------------------------------------------------------

--
-- Table structure for table `group_menus`
--

CREATE TABLE `group_menus` (
  `id` int(11) NOT NULL,
  `group_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `menu_id` mediumint(8) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `group_menus`
--

INSERT INTO `group_menus` (`id`, `group_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `kepsek`
--

CREATE TABLE `kepsek` (
  `id` int(11) NOT NULL,
  `nik` bigint(16) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `hp` varchar(16) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `kepsek`
--

INSERT INTO `kepsek` (`id`, `nik`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `hp`, `foto`, `status`, `created_at`, `update_at`, `created_by`) VALUES
(1, NULL, 'Waluyo', NULL, NULL, 'Pria', '08999777696', NULL, 1, '2021-11-22 20:35:46', '2021-12-29 10:54:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `menu_name` varchar(100) DEFAULT NULL,
  `menu_icon` varchar(100) DEFAULT NULL,
  `menu_link` varchar(100) DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL,
  `parrent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_name`, `menu_icon`, `menu_link`, `sequence`, `parrent_id`) VALUES
(1, 'Konfigurasi', 'fa fa-gear', 'config', 2, 0),
(2, 'Master Data', 'fa fa-database', 'master-data', 3, 0),
(3, 'Data Pengajar', 'fa fa-users', 'data-pengajar', 1, 2),
(4, 'Data Siswa', NULL, 'data-siswa', 2, 2),
(5, 'Data Jurusan', NULL, 'data-jurusan', 3, 2),
(6, 'Data Ekstrakurikuler', NULL, 'data-ekstrakurikuler', 4, 2),
(8, 'PPDB', NULL, 'ppdb', 4, 0),
(9, 'Tahun Periode', NULL, 'tahun-periode', 1, 8),
(10, 'Gelombang', NULL, 'gelombang', 2, 8),
(11, 'Persyaratan', NULL, 'persyaratan', 3, 8),
(12, 'Kualifikasi', NULL, 'kualifikasi', 4, 8),
(13, 'Dashboard', 'fa fa-dashboard', 'dashboard', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `panitia`
--

CREATE TABLE `panitia` (
  `id` int(11) NOT NULL,
  `nik` bigint(16) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `hp` varchar(16) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `panitia`
--

INSERT INTO `panitia` (`id`, `nik`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `hp`, `foto`, `status`, `created_at`, `update_at`, `created_by`) VALUES
(1, NULL, 'Waluyo', NULL, NULL, 'Pria', '08999777696', NULL, 1, '2021-11-22 20:35:46', '2021-12-29 10:54:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nik` bigint(16) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `hp` varchar(16) DEFAULT NULL,
  `agama` varchar(15) DEFAULT NULL,
  `pendidikan` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`id`, `user_id`, `nik`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `hp`, `agama`, `pendidikan`, `foto`, `created_at`, `update_at`, `created_by`) VALUES
(2, 2, 3604042008970361, 'Ahmad Fatoni', 'Serang', '1997-12-01', 'Pria', '089676767123', 'Islam', 'STRATA II', NULL, '2021-12-29 20:46:27', '2021-12-31 16:54:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nik` bigint(16) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `hp` varchar(16) DEFAULT NULL,
  `agama` varchar(15) DEFAULT NULL,
  `jurusan_id` int(11) UNSIGNED DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_verified_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `verification_code` varchar(20) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `group_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `cookie` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `verification_code`, `username`, `password`, `group_id`, `cookie`, `status`, `foto`, `created_at`, `update_at`) VALUES
(1, 'admin@gmail.com', '2021-12-29 13:36:42', NULL, 'admin', '$2y$10$Hg4Ei1bY6RCjRL0u1jwNtOCjN9rry6/UWIipPJd5CfUU9eWurpQjS', 1, NULL, '1', NULL, '2021-12-29 19:37:22', NULL),
(2, 'pengajar@gmail.com', '2021-12-29 20:55:22', NULL, 'pengajar', '$2y$10$Hg4Ei1bY6RCjRL0u1jwNtOCjN9rry6/UWIipPJd5CfUU9eWurpQjS', 5, NULL, '1', NULL, '2021-12-29 20:44:54', '2021-12-29 20:55:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calon_siswa`
--
ALTER TABLE `calon_siswa`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `group_menus`
--
ALTER TABLE `group_menus`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_group_id_menus` (`group_id`) USING BTREE,
  ADD KEY `fk_menus_id` (`menu_id`) USING BTREE;

--
-- Indexes for table `kepsek`
--
ALTER TABLE `kepsek`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `panitia`
--
ALTER TABLE `panitia`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `userId` (`user_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `userId` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id` (`id`) USING BTREE,
  ADD KEY `fk_group_users` (`group_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calon_siswa`
--
ALTER TABLE `calon_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `group_menus`
--
ALTER TABLE `group_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kepsek`
--
ALTER TABLE `kepsek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `panitia`
--
ALTER TABLE `panitia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `group_menus`
--
ALTER TABLE `group_menus`
  ADD CONSTRAINT `fk_group_id_menus` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_menus_id` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD CONSTRAINT `pengajar_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_group_users` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

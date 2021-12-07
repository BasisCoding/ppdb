/*
 Navicat Premium Data Transfer

 Source Server         : phpmyadmin
 Source Server Type    : MySQL
 Source Server Version : 100421
 Source Host           : localhost:3306
 Source Schema         : silink-new

 Target Server Type    : MySQL
 Target Server Version : 100421
 File Encoding         : 65001

 Date: 07/12/2021 14:02:08
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for config
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `attr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of config
-- ----------------------------
INSERT INTO `config` VALUES (1, 'APP_NAME', 'Lingkungan BasisCoding');
INSERT INTO `config` VALUES (2, 'APP_NAME_SLUG', 'LBC');
INSERT INTO `config` VALUES (3, 'LOGO', 'logo-text.png');
INSERT INTO `config` VALUES (8, 'RT', '02');
INSERT INTO `config` VALUES (9, 'RW', '11');
INSERT INTO `config` VALUES (10, 'KODE_POS', '42162');
INSERT INTO `config` VALUES (11, 'KELURAHAN', '3673050008');
INSERT INTO `config` VALUES (12, 'KECAMATAN', '3673050');
INSERT INTO `config` VALUES (13, 'KOTA', '3673');
INSERT INTO `config` VALUES (14, 'PROVINSI', '36');
INSERT INTO `config` VALUES (15, 'LATTITUDE', '-6.1067488');
INSERT INTO `config` VALUES (16, 'LONGITUDE', '106.1370279');
INSERT INTO `config` VALUES (30, 'EMAIL', 'basiscoding20@gmail.com');
INSERT INTO `config` VALUES (31, 'WEBSITE', 'lbc.com');
INSERT INTO `config` VALUES (32, 'APP_ICON', 'logo-icon.png');
INSERT INTO `config` VALUES (34, 'SLOGAN', 'Teamwork Makes Everything Easier');

-- ----------------------------
-- Table structure for group_menus
-- ----------------------------
DROP TABLE IF EXISTS `group_menus`;
CREATE TABLE `group_menus`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `group_id` mediumint UNSIGNED NULL DEFAULT NULL,
  `menu_id` mediumint UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_group_id_menus`(`group_id`) USING BTREE,
  INDEX `fk_menus_id`(`menu_id`) USING BTREE,
  CONSTRAINT `group_menus_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `group_menus_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of group_menus
-- ----------------------------
INSERT INTO `group_menus` VALUES (1, 1, 1);
INSERT INTO `group_menus` VALUES (2, 1, 2);
INSERT INTO `group_menus` VALUES (3, 1, 3);
INSERT INTO `group_menus` VALUES (4, 1, 4);
INSERT INTO `group_menus` VALUES (5, 1, 5);
INSERT INTO `group_menus` VALUES (8, 1, 8);
INSERT INTO `group_menus` VALUES (9, 1, 9);
INSERT INTO `group_menus` VALUES (10, 1, 10);
INSERT INTO `group_menus` VALUES (11, 1, 11);
INSERT INTO `group_menus` VALUES (12, 1, 12);
INSERT INTO `group_menus` VALUES (13, 1, 13);
INSERT INTO `group_menus` VALUES (14, 1, 14);

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups`  (
  `id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES (1, 'administrator', 'Administrator');
INSERT INTO `groups` VALUES (2, 'ketua_rt', 'Ketua RT');
INSERT INTO `groups` VALUES (3, 'bendahara_rt', 'Bendahara RT');
INSERT INTO `groups` VALUES (4, 'sekretaris_rt', 'Sekretaris RT');
INSERT INTO `groups` VALUES (5, 'ketua_pemuda', 'Ketua Pemuda');
INSERT INTO `groups` VALUES (6, 'sekretaris_pemuda', 'Sekretaris Pemuda');
INSERT INTO `groups` VALUES (7, 'bendahara_pemuda', 'Bendahara Pemuda');
INSERT INTO `groups` VALUES (9, 'warga', 'Warga');

-- ----------------------------
-- Table structure for jenis_pekerjaan
-- ----------------------------
DROP TABLE IF EXISTS `jenis_pekerjaan`;
CREATE TABLE `jenis_pekerjaan`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 90 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jenis_pekerjaan
-- ----------------------------
INSERT INTO `jenis_pekerjaan` VALUES (1, 'BELUM/TIDAK BEKERJA', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (2, 'MENGURUS RUMAH TANGGA', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (3, 'PELAJAR/MAHASISWA', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (4, 'PENSIUNAN', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (5, 'PEGAWAI NEGERI SIPIL', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (6, 'TENTARA NASIONAL INDONESIA', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (7, 'KEPOLISIAN RI', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (8, 'PERDAGANGAN', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (9, 'PETANI/PEKEBUN', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (10, 'PETERNAK', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (11, 'NELAYAN/PERIKANAN', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (12, 'INDUSTRI', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (13, 'KONSTRUKSI', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (14, 'TRANSPORTASI', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (15, 'KARYAWAN SWASTA', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (16, 'KARYAWAN BUMN', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (17, 'KARYAWAN BUMD', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (18, 'KARYAWAN HONORER', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (19, 'BURUH HARIAN LEPAS', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (20, 'BURUH TANI/PERKEBUNAN', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (21, 'BURUH NELAYAN/PERIKANAN', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (22, 'BURUH PETERNAKAN', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (23, 'PEMBANTU RUMAH TANGGA', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (24, 'TUKANG CUKUR', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (25, 'TUKANG LISTRIK', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (26, 'TUKANG BATU', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (27, 'TUKANG KAYU', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (28, 'TUKANG SOL SEPATU', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (29, 'TUKANG LAS/PANDAI BESI', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (30, 'TUKANG JAHIT', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (31, 'TUKANG GIGI', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (32, 'PENATA RIAS', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (33, 'PENATA BUSANA', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (34, 'PENATA RAMBUT', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (35, 'MEKANIK', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (36, 'SENIMAN', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (37, 'TABIB', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (38, 'PARAJI', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (39, 'PERANCANG BUSANA', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (40, 'PENTERJEMAH', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (41, 'IMAM MESJID', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (42, 'PENDETA', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (43, 'PASTOR', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (44, 'WARTAWAN', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (45, 'USTADZ/MUBALIGH', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (46, 'JURU MASAK', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (47, 'PROMOTOR ACARA', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (48, 'ANGGOTA DPR-RI', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (49, 'ANGGOTA DPD', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (50, 'ANGGOTA BPK', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (51, 'PRESIDEN', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (52, 'WAKIL PRESIDEN', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (53, 'ANGGOTA MAHKAMAH KONSTITUSI', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (54, 'ANGGOTA KABINET/KEMENTERIAN', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (55, 'DUTA BESAR', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (56, 'GUBERNUR', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (57, 'WAKIL GUBERNUR', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (58, 'BUPATI', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (59, 'WAKIL BUPATI', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (60, 'WALIKOTA', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (61, 'WAKIL WALIKOTA', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (62, 'ANGGOTA DPRD PROVINSI', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (63, 'ANGGOTA DPRD KABUPATEN/KOTA', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (64, 'DOSEN', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (65, 'GURU', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (66, 'PILOT', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (67, 'PENGACARA', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (68, 'NOTARIS', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (69, 'ARSITEK', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (70, 'AKUNTAN', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (71, 'KONSULTAN', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (72, 'DOKTER', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (73, 'BIDAN', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (74, 'PERAWAT', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (75, 'APOTEKER', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (76, 'PSIKIATER/PSIKOLOG', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (77, 'PENYIAR TELEVISI', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (78, 'PENYIAR RADIO', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (79, 'PELAUT', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (80, 'PENELITI', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (81, 'SOPIR', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (82, 'PIALANG', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (83, 'PARANORMAL', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (84, 'PEDAGANG', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (85, 'PERANGKAT DESA', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (86, 'KEPALA DESA', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (87, 'BIARAWATI', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (88, 'WIRASWASTA', '2021-12-07 10:57:23');
INSERT INTO `jenis_pekerjaan` VALUES (89, 'LAINNYA', '2021-12-07 10:57:23');

-- ----------------------------
-- Table structure for login_attempts
-- ----------------------------
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `login` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` int UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of login_attempts
-- ----------------------------

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus`  (
  `id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `menu_icon` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `menu_link` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sequence` int NULL DEFAULT NULL,
  `parrent_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (1, 'Konfigurasi', 'fa fa-cogs', 'config', 2, 0);
INSERT INTO `menus` VALUES (2, 'Master Data', 'fa fa-database', 'master-data', 3, 0);
INSERT INTO `menus` VALUES (3, 'Data Penduduk', 'fa fa-users', 'data-penduduk', 1, 2);
INSERT INTO `menus` VALUES (4, 'Data Pemuda', NULL, 'data-pemuda', 2, 2);
INSERT INTO `menus` VALUES (5, 'Data Surat', NULL, 'data-surat', 3, 2);
INSERT INTO `menus` VALUES (8, 'Keluarga', 'fa fa-user-circle-o', 'keluarga', 4, 0);
INSERT INTO `menus` VALUES (9, 'Kegiatan', 'fa fa-universal-access', 'kegiatan', 5, 0);
INSERT INTO `menus` VALUES (10, 'Struktur Lingkungan', 'fa fa-sitemap', 'struktur', 2, 0);
INSERT INTO `menus` VALUES (11, 'Menu Management', 'fa fa-bars', 'menu-management', 4, 0);
INSERT INTO `menus` VALUES (12, 'Kualifikasi', NULL, 'kualifikasi', 4, 8);
INSERT INTO `menus` VALUES (13, 'Dashboard', 'fa fa-th-large', 'dashboard', 1, 0);
INSERT INTO `menus` VALUES (14, 'Data Rumah', 'fa fa-home', 'data-rumah', 4, 2);

-- ----------------------------
-- Table structure for penduduk
-- ----------------------------
DROP TABLE IF EXISTS `penduduk`;
CREATE TABLE `penduduk`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `nik` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_lengkap` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `tempat_lahir` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agama` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jenis_kelamin` enum('Pria','Wanita') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_perkawinan` enum('Belum Kawin','Kawin','Janda','Duda') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'Belum Kawin',
  `tanggal_perkawinan` date NULL DEFAULT NULL,
  `status_hidup` enum('Hidup','Meninggal') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'Hidup',
  `status_dalam_keluarga` enum('Kepala Keluarga','Istri','Anak') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kewarganegaraan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ayah` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ibu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pendidikan` enum('TIDAK / BELUM SEKOLAH','BELUM TAMAT SD / SEDERAJAT','TAMAT SD / SEDERAJAT','SLTP / SEDERAJAT','SLTA / SEDERAJAT','DIPLOMA IV/ STRATA I','DIPLOMA I / II','AKADEMI/ DIPLOMA III/S. MUDA','STRATA II','STRATA III') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pekerjaan_id` int NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp,
  `update_by` int NULL DEFAULT NULL,
  `update_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of penduduk
-- ----------------------------
INSERT INTO `penduduk` VALUES (2, 2, '3604042008970362', 'Ahmad', '2021-12-16', 'Serang', 'Islam', 'Pria', 'Kawin', NULL, 'Hidup', NULL, NULL, NULL, NULL, 'DIPLOMA IV/ STRATA I', 2, NULL, '2021-12-05 17:22:14', NULL, '2021-12-07 11:18:57');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email_verified_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `verification_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `group_id` mediumint UNSIGNED NULL DEFAULT NULL,
  `cookie` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp,
  `update_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id`(`id`) USING BTREE,
  INDEX `fk_group_users`(`group_id`) USING BTREE,
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (2, NULL, '2021-12-07 07:44:54', NULL, '3604042008970362', '$2y$10$Jon8LTm.ePxpuXxFt1vv1OkNc.H3pz8gCLgYpZ8sqD8DRe4cg15YK', NULL, NULL, NULL, NULL, '2021-12-05 17:22:14', '2021-12-07 07:44:54');

SET FOREIGN_KEY_CHECKS = 1;

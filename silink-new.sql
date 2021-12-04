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

 Date: 04/12/2021 09:24:39
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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES (1, 'admin', 'Administrator');
INSERT INTO `groups` VALUES (2, 'kepsek', 'Kepala Sekolah');
INSERT INTO `groups` VALUES (3, 'panitia', 'Panitia');
INSERT INTO `groups` VALUES (4, 'calon-siswa', 'Calon Siswa');

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
  `id` int NOT NULL AUTO_INCREMENT,
  `nik` bigint NULL DEFAULT NULL,
  `nama_lengkap` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penduduk
-- ----------------------------
INSERT INTO `penduduk` VALUES (1, 3604042008970361, 'Ahmad Fatoni', 'Pria', 1);
INSERT INTO `penduduk` VALUES (2, 3604042008980333, 'Saiyah', 'Wanita', 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_lengkap` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_verified_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `verification_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_hp` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `group_id` mediumint UNSIGNED NULL DEFAULT NULL,
  `cookie` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp,
  `update_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id`(`id`) USING BTREE,
  INDEX `fk_group_users`(`group_id`) USING BTREE,
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (2, 'Ahmad Fatoni', '', NULL, 'admin@gmail.com', '2021-11-30 08:22:29', NULL, 'admin', '$2y$10$v2Iwd/uNit2kyMQHS5bPUObw6ISnxge7XOhepJT.XMiBGiubAvRI.', NULL, '', 1, NULL, '1', '2021-11-30 08:21:44', '2021-11-30 08:22:29');

SET FOREIGN_KEY_CHECKS = 1;

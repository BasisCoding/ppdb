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

 Date: 30/11/2021 08:28:27
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
INSERT INTO `config` VALUES (1, 'APP_NAME', 'Universitas BasisCoding');
INSERT INTO `config` VALUES (2, 'APP_NAME_SLUG', 'UBCoding');
INSERT INTO `config` VALUES (3, 'LOGO', 'logo.png');
INSERT INTO `config` VALUES (8, 'RT', '02');
INSERT INTO `config` VALUES (9, 'RW', '02');
INSERT INTO `config` VALUES (10, 'KODE_POS', '42162');
INSERT INTO `config` VALUES (11, 'KELURAHAN', 'DRANGONG');
INSERT INTO `config` VALUES (12, 'KECAMATAN', 'TAKTAKAN');
INSERT INTO `config` VALUES (13, 'KABUPATEN', 'KOTA SERANG');
INSERT INTO `config` VALUES (14, 'PROVINSI', 'BANTEN');
INSERT INTO `config` VALUES (15, 'LATTITUDE', '-6.1067488');
INSERT INTO `config` VALUES (16, 'LONGITUDE', '106.1370279');
INSERT INTO `config` VALUES (30, 'EMAIL', 'basiscoding20@gmail.com');
INSERT INTO `config` VALUES (31, 'WEBSITE', 'ubcoding.com');
INSERT INTO `config` VALUES (32, 'APP_ICON', 'color.png');
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
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of group_menus
-- ----------------------------
INSERT INTO `group_menus` VALUES (1, 1, 1);
INSERT INTO `group_menus` VALUES (2, 1, 2);
INSERT INTO `group_menus` VALUES (3, 1, 3);
INSERT INTO `group_menus` VALUES (4, 1, 4);
INSERT INTO `group_menus` VALUES (5, 1, 5);
INSERT INTO `group_menus` VALUES (6, 1, 6);
INSERT INTO `group_menus` VALUES (8, 1, 8);
INSERT INTO `group_menus` VALUES (9, 1, 9);
INSERT INTO `group_menus` VALUES (10, 1, 10);
INSERT INTO `group_menus` VALUES (11, 1, 11);
INSERT INTO `group_menus` VALUES (12, 1, 12);
INSERT INTO `group_menus` VALUES (13, 1, 13);

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
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (1, 'Konfigurasi', 'settings', 'config', 2, 0);
INSERT INTO `menus` VALUES (2, 'Master Data', 'database', 'master-data', 3, 0);
INSERT INTO `menus` VALUES (3, 'Data Pengajar', 'users', 'data-pengajar', 1, 2);
INSERT INTO `menus` VALUES (4, 'Data Siswa', NULL, 'data-siswa', 2, 2);
INSERT INTO `menus` VALUES (5, 'Data Jurusan', NULL, 'data-jurusan', 3, 2);
INSERT INTO `menus` VALUES (6, 'Data Ekstrakurikuler', NULL, 'data-ekstrakurikuler', 4, 2);
INSERT INTO `menus` VALUES (8, 'PPDB', NULL, 'ppdb', 4, 0);
INSERT INTO `menus` VALUES (9, 'Tahun Periode', NULL, 'tahun-periode', 1, 8);
INSERT INTO `menus` VALUES (10, 'Gelombang', NULL, 'gelombang', 2, 8);
INSERT INTO `menus` VALUES (11, 'Persyaratan', NULL, 'persyaratan', 3, 8);
INSERT INTO `menus` VALUES (12, 'Kualifikasi', NULL, 'kualifikasi', 4, 8);
INSERT INTO `menus` VALUES (13, 'Dashboard', NULL, 'dashboard', 1, 0);

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

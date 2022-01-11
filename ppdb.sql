-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 11 Jan 2022 pada 04.38
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

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
-- Struktur dari tabel `calon_siswa`
--

CREATE TABLE `calon_siswa` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `nik` bigint(16) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `hp` varchar(16) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `jurusan_id` int(10) UNSIGNED NOT NULL,
  `status_registrasi` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `calon_siswa`
--

INSERT INTO `calon_siswa` (`id`, `user_id`, `nik`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `hp`, `foto`, `jurusan_id`, `status_registrasi`, `created_at`, `update_at`) VALUES
(1, 12, 1219872981287618, 'Waluyo', 'SERANG', '2022-01-11', 'Pria', 'Islam', '08999777696', NULL, 1, NULL, '2021-11-22 20:35:46', '2022-01-11 00:08:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `attr` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `config`
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
-- Struktur dari tabel `ekstrakurikuler`
--

CREATE TABLE `ekstrakurikuler` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_eskul` varchar(50) NOT NULL,
  `slug_eskul` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ekstrakurikuler`
--

INSERT INTO `ekstrakurikuler` (`id`, `nama_eskul`, `slug_eskul`, `deskripsi`, `created_at`, `update_at`) VALUES
(3, 'Marawis', 'marawis', '&lt;h2&gt;       &lt;img xss=&quot;removed&quot; k=&quot; data-filename=&quot;&gt;&lt;b&gt;SELAMAT DATANG DI WEBSITE PPDB SEKOLAH BASISCODING&lt;/b&gt;&lt;/h2&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;pada kesempatan kali ini saya selaku developer ingin mengucapkan terima kasih kepada instansi yang memberikan kesempatan kerja sama kepada saya.&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;hr&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', '2022-01-03 17:54:22', '2022-01-03 18:01:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gelombang`
--

CREATE TABLE `gelombang` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_gelombang` varchar(30) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `tahun_ajaran_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gelombang`
--

INSERT INTO `gelombang` (`id`, `nama_gelombang`, `start_date`, `end_date`, `tahun_ajaran_id`) VALUES
(2, 'Gelombang 1', '2022-01-31', '2022-02-28', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'kepsek', 'Kepala Sekolah'),
(3, 'panitia', 'Panitia'),
(4, 'calon_siswa', 'Calon Siswa'),
(5, 'pengajar', 'Pengajar'),
(6, 'siswa', 'Siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `group_menus`
--

CREATE TABLE `group_menus` (
  `id` int(11) NOT NULL,
  `group_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `menu_id` mediumint(8) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `group_menus`
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
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16),
(17, 1, 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `img_eskul`
--

CREATE TABLE `img_eskul` (
  `id` int(11) NOT NULL,
  `eskul_id` int(10) UNSIGNED NOT NULL,
  `foto` varchar(100) NOT NULL,
  `upload_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `slug_jurusan` varchar(30) NOT NULL,
  `logo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`, `slug_jurusan`, `logo`) VALUES
(1, 'Teknik Instalasi Tenaga Listik', 'TITL1', 'TITL.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepsek`
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
-- Dumping data untuk tabel `kepsek`
--

INSERT INTO `kepsek` (`id`, `nik`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `hp`, `foto`, `status`, `created_at`, `update_at`, `created_by`) VALUES
(1, NULL, 'Waluyo', NULL, NULL, 'Pria', '08999777696', NULL, 1, '2021-11-22 20:35:46', '2021-12-29 10:54:42', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
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
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `menu_name`, `menu_icon`, `menu_link`, `sequence`, `parrent_id`) VALUES
(1, 'Konfigurasi', 'fa fa-gear', 'config', 2, 0),
(2, 'Master Data', 'fa fa-database', 'master-data', 3, 0),
(3, 'Data Pengajar', 'fa fa-users', 'data-pengajar', 1, 2),
(4, 'Data Siswa', NULL, 'data-siswa', 2, 2),
(5, 'Data Jurusan', NULL, 'data-jurusan', 3, 2),
(6, 'Data Ekstrakurikuler', NULL, 'data-eskul', 4, 2),
(8, 'Konfigurasi PPDB', 'fa fa-chain-broken', 'ppdb', 4, 0),
(9, 'Tahun Periode', NULL, 'tahun-ajaran', 1, 8),
(10, 'Gelombang', NULL, 'gelombang', 2, 8),
(11, 'Persyaratan', NULL, 'persyaratan', 3, 8),
(12, 'Tahapan', NULL, 'tahapan', 4, 8),
(13, 'Dashboard', 'fa fa-dashboard', 'dashboard', 1, 0),
(14, 'PPDB', 'fa fa-fax', NULL, 5, 0),
(15, 'Data Pendaftar', 'fa fa-users', 'data-pendaftar', 1, 14),
(16, 'Data Registrasi', 'fa fa-users', 'data-registrasi', 2, 14),
(17, 'Kualifikasi', 'fa fa-check-circle-o', 'kualifikasi', 3, 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `panitia`
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
-- Dumping data untuk tabel `panitia`
--

INSERT INTO `panitia` (`id`, `nik`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `hp`, `foto`, `status`, `created_at`, `update_at`, `created_by`) VALUES
(1, NULL, 'Waluyo', NULL, NULL, 'Pria', '08999777696', NULL, 1, '2021-11-22 20:35:46', '2021-12-29 10:54:42', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajar`
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
-- Dumping data untuk tabel `pengajar`
--

INSERT INTO `pengajar` (`id`, `user_id`, `nik`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `hp`, `agama`, `pendidikan`, `foto`, `created_at`, `update_at`, `created_by`) VALUES
(2, 2, 3604042008970361, 'Ahmad Fatoni', 'Serang', '1997-12-01', 'Pria', '089676767123', 'Islam', 'STRATA II', NULL, '2021-12-29 20:46:27', '2021-12-31 16:54:58', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `persyaratan`
--

CREATE TABLE `persyaratan` (
  `id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `deskripsi` text NOT NULL,
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `persyaratan`
--

INSERT INTO `persyaratan` (`id`, `deskripsi`, `update_at`) VALUES
(0, '&lt;h3 xss=&quot;removed&quot;&gt;Calon peserta didik menyiapkan dokumen persyaratan sesuai jalur yang akan dipilih dan melakukan pemindaian (scan) dokumen persyaratan;&lt;/h3&gt;&lt;ul xss=&quot;removed&quot;&gt;&lt;li xss=&quot;removed&quot;&gt;Jalur Reguler, calon peserta didik mengupload :&lt;/li&gt;&lt;/ul&gt;&lt;ol xss=&quot;removed&quot;&gt;&lt;li xss=&quot;removed&quot;&gt;&lt;ol xss=&quot;removed&quot;&gt;&lt;li xss=&quot;removed&quot;&gt;Surat Keterangan Lulus;&lt;/li&gt;&lt;li xss=&quot;removed&quot;&gt;Surat Keterangan Nilai Rapor dari Sekolah Asal;&lt;/li&gt;&lt;li xss=&quot;removed&quot;&gt;Kartu Keluarga dan;&lt;/li&gt;&lt;li xss=&quot;removed&quot;&gt;Surat Pernyataan Tanggung Jawab Mutlak.&lt;/li&gt;&lt;li xss=&quot;removed&quot;&gt;Akta kelahiran dengan batas usia paling tinggi 21 ( dua puluh satu) tahun pada awal tahun pelajaran baru 2021/2022, dan belum menikah.&lt;/li&gt;&lt;/ol&gt;&lt;/li&gt;&lt;/ol&gt;&lt;ul xss=&quot;removed&quot;&gt;&lt;li xss=&quot;removed&quot;&gt;Jalur Afirmasi, calon peserta didik mengupload :&lt;/li&gt;&lt;/ul&gt;&lt;ol xss=&quot;removed&quot;&gt;&lt;li xss=&quot;removed&quot;&gt;&lt;ol xss=&quot;removed&quot;&gt;&lt;li xss=&quot;removed&quot;&gt;Surat Keterangan Lulus;&lt;/li&gt;&lt;li xss=&quot;removed&quot;&gt;Kartu Keluarga;&lt;/li&gt;&lt;li xss=&quot;removed&quot;&gt;Kartu Penanganan Keluarga Tidak Mampu;&lt;/li&gt;&lt;li xss=&quot;removed&quot;&gt;Bukti hasil diagnosa untuk calon peserta didik penyandang disabilitas dan;&lt;/li&gt;&lt;li xss=&quot;removed&quot;&gt;Surat Pernyataan Tanggung Jawab Mutlak.&lt;/li&gt;&lt;li xss=&quot;removed&quot;&gt;Akta kelahiran dengan batas usia paling tinggi 21 ( dua puluh satu) tahun pada awal tahun pelajaran baru 2021/2022, dan belum menikah.&lt;/li&gt;&lt;/ol&gt;&lt;/li&gt;&lt;/ol&gt;&lt;ul xss=&quot;removed&quot;&gt;&lt;li xss=&quot;removed&quot;&gt;Jalur Prestasi, calon peserta didik mengupload :&lt;/li&gt;&lt;/ul&gt;&lt;ol xss=&quot;removed&quot;&gt;&lt;li xss=&quot;removed&quot;&gt;&lt;ol xss=&quot;removed&quot;&gt;&lt;li xss=&quot;removed&quot;&gt;Surat Keterangan Lulus;&lt;/li&gt;&lt;li xss=&quot;removed&quot;&gt;Surat Keterangan Nilai Rapor dari Sekolah Asal dan;&lt;/li&gt;&lt;li xss=&quot;removed&quot;&gt;Sertifikat Kejuaraan Akademik dan Non Akademik.&lt;/li&gt;&lt;li xss=&quot;removed&quot;&gt;Akta kelahiran dengan batas usia paling tinggi 21 ( dua puluh satu) tahun pada awal tahun pelajaran baru 2021/2022, dan belum menikah.&lt;/li&gt;&lt;/ol&gt;&lt;/li&gt;&lt;/ol&gt;&lt;ul xss=&quot;removed&quot;&gt;&lt;li xss=&quot;removed&quot;&gt;Calon peserta didik melakukan pendaftaran menggunakan Nomor Induk Siswa Nasional (NISN) dan Nomor Pokok Sekolah Nasional (NPSN) sekolah asal ke laman PPDB dengan alamat: &lt;a href=&quot;http://kalsel.siap-ppdb.com/&quot; xss=&quot;removed&quot;&gt;http://kalsel.siap-ppdb.com&lt;/a&gt;/ untuk mengisi data diri dan mengunggah (upload) file hasil scan dokumen berupa (jpg dan pdf) sesuai dengan pilihan dan persyaratan yang ditentukan;&lt;/li&gt;&lt;li xss=&quot;removed&quot;&gt;Calon peserta didik mengisi formulir data diri, memilih jalur PPDB dan sekolah tujuan yang diminati pada laman PPDB;&lt;/li&gt;&lt;li xss=&quot;removed&quot;&gt;Calon peserta didik melakukan pengecekan ulang data pendaftaran dan melakukan submit data sebagai bentuk pernyataan mendaftarkan diri. Data pendaftaran yang sudah disubmit oleh calon peserta didik tidak dapat diubah atau dicabut;&lt;/li&gt;&lt;li xss=&quot;removed&quot;&gt;Pendaftar melakukan pencetakan bukti pendaftaran pada laman PPDB;&lt;/li&gt;&lt;li xss=&quot;removed&quot;&gt;Bagi calon peserta didik/orangtua yang terkendala dalam melakukan pendaftaran online dapat dibantu pihak panitia/posko PPDB sekolah.&lt;/li&gt;&lt;li xss=&quot;removed&quot;&gt;Sebelum mengikuti pendaftaran PPDB, Calon peserta didik dari luar Provinsi Kalimantan Selatan terlebih dahulu memperoleh rekomendasi dari sekolah asal dan rekomendasi dari Dinas Pendidikan dan Kebudayaan Provinsi Kalimantan Selatan melalui media yang memungkinkan.&lt;/li&gt;&lt;/ul&gt;', '2022-01-07 06:05:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
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

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `user_id`, `nik`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `hp`, `agama`, `jurusan_id`, `foto`, `created_at`, `update_at`, `created_by`) VALUES
(6, 11, 1231231231231231, 'Siswa', 'serang', '2021-12-26', 'Pria', NULL, 'Islam', 1, NULL, '2022-01-01 16:20:59', '2022-01-01 21:44:24', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahapan`
--

CREATE TABLE `tahapan` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `sequence` int(11) NOT NULL,
  `tahun_ajaran_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tahapan`
--

INSERT INTO `tahapan` (`id`, `judul`, `deskripsi`, `sequence`, `tahun_ajaran_id`, `created_at`) VALUES
(1, 'Tahap Pendaftaran', '&lt;h2&gt;&lt;b&gt;&lt;font xss=&quot;removed&quot; color=&quot;#000000&quot; xss=removed&gt;PENDAFTARAN&lt;/font&gt;&lt;/b&gt;&lt;/h2&gt;&lt;p&gt;pendaftaran dilakukan secara online melalui link ini &lt;a href=&quot;https://basiscoding.com/ppdb&quot; target=&quot;_blank&quot;&gt;https://basiscoding.com/ppdb&lt;/a&gt;&lt;/p&gt;&lt;p&gt;&lt;i&gt;&lt;b&gt;Terima Kasih&lt;/b&gt;&lt;/i&gt;&lt;br&gt;&lt;/p&gt;', 1, 3, '2022-01-08 22:14:07'),
(2, 'Tahap Pendaftaran', '&lt;p&gt;ll&lt;/p&gt;', 2, 3, '2022-01-07 08:29:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` int(10) UNSIGNED NOT NULL,
  `tahun` varchar(20) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `tahun`, `status`) VALUES
(2, '2021-2022', 0),
(3, '2022-2023', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `verification_code`, `username`, `password`, `group_id`, `cookie`, `status`, `foto`, `created_at`, `update_at`) VALUES
(1, 'admin@gmail.com', '2021-12-29 13:36:42', NULL, 'admin', '$2y$10$Hg4Ei1bY6RCjRL0u1jwNtOCjN9rry6/UWIipPJd5CfUU9eWurpQjS', 1, NULL, '1', NULL, '2021-12-29 19:37:22', NULL),
(2, 'pengajar@gmail.com', '2021-12-29 20:55:22', NULL, 'pengajar', '$2y$10$Hg4Ei1bY6RCjRL0u1jwNtOCjN9rry6/UWIipPJd5CfUU9eWurpQjS', 5, NULL, '1', NULL, '2021-12-29 20:44:54', '2021-12-29 20:55:22'),
(11, 'siswa1@gmail.com', '2022-01-02 03:44:24', NULL, '1asdasdasd', '$2y$10$5n/zhYi3Qt1kapHSV9CE9e5xzsTpfoOazCLw5URo6Qf2Y2B23pFh.', 6, NULL, '1', NULL, '2022-01-01 16:20:59', '2022-01-02 03:44:24'),
(12, 'calonsiswa@gmail.com', '2022-01-11 06:03:13', NULL, 'calon_siswa', '$2y$10$5n/zhYi3Qt1kapHSV9CE9e5xzsTpfoOazCLw5URo6Qf2Y2B23pFh.', 4, NULL, '1', NULL, '2022-01-01 16:20:59', '2022-01-11 06:03:13');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `calon_siswa`
--
ALTER TABLE `calon_siswa`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `jurusan_id` (`jurusan_id`);

--
-- Indeks untuk tabel `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug-eskul` (`slug_eskul`);

--
-- Indeks untuk tabel `gelombang`
--
ALTER TABLE `gelombang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tahun_ajaran_id` (`tahun_ajaran_id`);

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `group_menus`
--
ALTER TABLE `group_menus`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_group_id_menus` (`group_id`) USING BTREE,
  ADD KEY `fk_menus_id` (`menu_id`) USING BTREE;

--
-- Indeks untuk tabel `img_eskul`
--
ALTER TABLE `img_eskul`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eskul_id` (`eskul_id`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug_jurusan` (`slug_jurusan`);

--
-- Indeks untuk tabel `kepsek`
--
ALTER TABLE `kepsek`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `panitia`
--
ALTER TABLE `panitia`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `userId` (`user_id`);

--
-- Indeks untuk tabel `persyaratan`
--
ALTER TABLE `persyaratan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `userId` (`user_id`),
  ADD KEY `jurusan_id` (`jurusan_id`);

--
-- Indeks untuk tabel `tahapan`
--
ALTER TABLE `tahapan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id` (`id`) USING BTREE,
  ADD KEY `fk_group_users` (`group_id`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `calon_siswa`
--
ALTER TABLE `calon_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `gelombang`
--
ALTER TABLE `gelombang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `group_menus`
--
ALTER TABLE `group_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `img_eskul`
--
ALTER TABLE `img_eskul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kepsek`
--
ALTER TABLE `kepsek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `panitia`
--
ALTER TABLE `panitia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tahapan`
--
ALTER TABLE `tahapan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gelombang`
--
ALTER TABLE `gelombang`
  ADD CONSTRAINT `gelombang_ibfk_1` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `group_menus`
--
ALTER TABLE `group_menus`
  ADD CONSTRAINT `fk_group_id_menus` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_menus_id` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengajar`
--
ALTER TABLE `pengajar`
  ADD CONSTRAINT `pengajar_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_group_users` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

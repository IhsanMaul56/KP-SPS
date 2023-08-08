/*
Navicat MySQL Data Transfer

Source Server         : Zoey
Source Server Version : 100428
Source Host           : localhost:3306
Source Database       : kp-sps

Target Server Type    : MYSQL
Target Server Version : 100428
File Encoding         : 65001

Date: 2023-08-08 17:58:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for data_guru
-- ----------------------------
DROP TABLE IF EXISTS `data_guru`;
CREATE TABLE `data_guru` (
  `nip` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  `role` enum('guru','kurikulum') NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `agama` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `desa` varchar(255) NOT NULL,
  `rt` varchar(255) NOT NULL,
  `rw` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto_guru` blob NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of data_guru
-- ----------------------------

-- ----------------------------
-- Table structure for data_jurusan
-- ----------------------------
DROP TABLE IF EXISTS `data_jurusan`;
CREATE TABLE `data_jurusan` (
  `kode_jurusan` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama_kepala_jurusan` varchar(255) NOT NULL,
  PRIMARY KEY (`kode_jurusan`),
  UNIQUE KEY `data_jurusan_nip_unique` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of data_jurusan
-- ----------------------------

-- ----------------------------
-- Table structure for data_kelas
-- ----------------------------
DROP TABLE IF EXISTS `data_kelas`;
CREATE TABLE `data_kelas` (
  `kode_kelas` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama_wali` varchar(255) NOT NULL,
  PRIMARY KEY (`kode_kelas`),
  UNIQUE KEY `data_kelas_nip_unique` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of data_kelas
-- ----------------------------

-- ----------------------------
-- Table structure for data_mapel
-- ----------------------------
DROP TABLE IF EXISTS `data_mapel`;
CREATE TABLE `data_mapel` (
  `kode_mapel` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  PRIMARY KEY (`kode_mapel`),
  UNIQUE KEY `data_mapel_nip_unique` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of data_mapel
-- ----------------------------

-- ----------------------------
-- Table structure for data_nilai_akhir
-- ----------------------------
DROP TABLE IF EXISTS `data_nilai_akhir`;
CREATE TABLE `data_nilai_akhir` (
  `kode_nilai` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nis` varchar(255) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `kode_mapel` varchar(255) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `nip_pengampu` varchar(255) NOT NULL,
  `nama_pengampu` varchar(255) NOT NULL,
  `nip_guru_wali` varchar(255) NOT NULL,
  `nama_guru_wali` varchar(255) NOT NULL,
  `nilai_kehadiran` varchar(255) NOT NULL,
  `nilai_tugas` varchar(255) NOT NULL,
  `nilai_uts` varchar(255) NOT NULL,
  `nilai_uas` varchar(255) NOT NULL,
  `kb_pengetahuan` varchar(255) NOT NULL,
  `nilai_pengetahuan` varchar(255) NOT NULL,
  `desc_pengetahuan` longtext NOT NULL,
  `kb_keterampilan` varchar(255) NOT NULL,
  `nilai_keterampilan` varchar(255) NOT NULL,
  `desc_keterampilan` longtext NOT NULL,
  PRIMARY KEY (`kode_nilai`),
  UNIQUE KEY `data_nilai_akhir_nis_unique` (`nis`),
  UNIQUE KEY `data_nilai_akhir_kode_mapel_unique` (`kode_mapel`),
  UNIQUE KEY `data_nilai_akhir_nip_pengampu_unique` (`nip_pengampu`),
  UNIQUE KEY `data_nilai_akhir_nip_guru_wali_unique` (`nip_guru_wali`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of data_nilai_akhir
-- ----------------------------

-- ----------------------------
-- Table structure for data_nilai_sementara
-- ----------------------------
DROP TABLE IF EXISTS `data_nilai_sementara`;
CREATE TABLE `data_nilai_sementara` (
  `kode_nilai` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nis` varchar(255) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `kode_mapel` varchar(255) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `nip_pengampu` varchar(255) NOT NULL,
  `nama_pengampu` varchar(255) NOT NULL,
  `nip_guru_wali` varchar(255) NOT NULL,
  `nama_guru_wali` varchar(255) NOT NULL,
  `nilai_kehadiran` varchar(255) NOT NULL,
  `nilai_tugas` varchar(255) NOT NULL,
  `nilai_uts` varchar(255) NOT NULL,
  `nilai_uas` varchar(255) NOT NULL,
  `kb_pengetahuan` varchar(255) NOT NULL,
  `nilai_pengetahuan` varchar(255) NOT NULL,
  `desc_pengetahuan` longtext NOT NULL,
  `kb_keterampilan` varchar(255) NOT NULL,
  `nilai_keterampilan` varchar(255) NOT NULL,
  `desc_keterampilan` longtext NOT NULL,
  PRIMARY KEY (`kode_nilai`),
  UNIQUE KEY `data_nilai_sementara_nis_unique` (`nis`),
  UNIQUE KEY `data_nilai_sementara_kode_mapel_unique` (`kode_mapel`),
  UNIQUE KEY `data_nilai_sementara_nip_pengampu_unique` (`nip_pengampu`),
  UNIQUE KEY `data_nilai_sementara_nip_guru_wali_unique` (`nip_guru_wali`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of data_nilai_sementara
-- ----------------------------

-- ----------------------------
-- Table structure for data_siswa
-- ----------------------------
DROP TABLE IF EXISTS `data_siswa`;
CREATE TABLE `data_siswa` (
  `nis` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `agama` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `desa` varchar(255) NOT NULL,
  `rt` varchar(255) NOT NULL,
  `rw` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `nik_ayah` varchar(255) NOT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `pekerjaan_ayah` varchar(255) NOT NULL,
  `nik_ibu` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `pekerjaan_ibu` varchar(255) NOT NULL,
  `provinsi_ortu` varchar(255) NOT NULL,
  `kota_ortu` varchar(255) NOT NULL,
  `desa_ortu` varchar(255) NOT NULL,
  `rt_ortu` varchar(255) NOT NULL,
  `rw_ortu` varchar(255) NOT NULL,
  `alamat_ortu` varchar(255) NOT NULL,
  `foto_siswa` blob NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of data_siswa
-- ----------------------------

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_100000_create_password_reset_tokens_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2019_08_19_000000_create_failed_jobs_table', '1');
INSERT INTO `migrations` VALUES ('4', '2019_12_14_000001_create_personal_access_tokens_table', '1');
INSERT INTO `migrations` VALUES ('5', '2023_08_08_0001_create_data_guru_table', '1');
INSERT INTO `migrations` VALUES ('6', '2023_08_08_0001_create_data_jurusan_table', '1');
INSERT INTO `migrations` VALUES ('7', '2023_08_08_0001_create_data_kelas_table', '1');
INSERT INTO `migrations` VALUES ('8', '2023_08_08_0001_create_data_mapel_table', '1');
INSERT INTO `migrations` VALUES ('9', '2023_08_08_0001_create_data_nilai_akhir_table', '2');
INSERT INTO `migrations` VALUES ('10', '2023_08_08_0001_create_data_nilai_sementara_table', '2');
INSERT INTO `migrations` VALUES ('11', '2023_08_08_0001_create_data_siswa_table', '2');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: hrd2
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.20-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `additional_info`
--

DROP TABLE IF EXISTS `additional_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `additional_info` (
  `kode` varchar(255) NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `additional_info`
--

LOCK TABLES `additional_info` WRITE;
/*!40000 ALTER TABLE `additional_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `additional_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bagian`
--

DROP TABLE IF EXISTS `bagian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bagian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bagian` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bagian`
--

LOCK TABLES `bagian` WRITE;
/*!40000 ALTER TABLE `bagian` DISABLE KEYS */;
/*!40000 ALTER TABLE `bagian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bantuan`
--

DROP TABLE IF EXISTS `bantuan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bantuan` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `scan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bantuan`
--

LOCK TABLES `bantuan` WRITE;
/*!40000 ALTER TABLE `bantuan` DISABLE KEYS */;
/*!40000 ALTER TABLE `bantuan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `career_transition`
--

DROP TABLE IF EXISTS `career_transition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `career_transition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_scan` varchar(255) DEFAULT NULL,
  `proses` varchar(255) DEFAULT NULL,
  `tgl_efektif` varchar(255) DEFAULT NULL,
  `dept_lama` varchar(255) DEFAULT NULL,
  `dept_baru` varchar(255) DEFAULT NULL,
  `bagian_lama` varchar(255) DEFAULT NULL,
  `bagian_baru` varchar(255) DEFAULT NULL,
  `golongan_lama` varchar(255) DEFAULT NULL,
  `golongan_baru` varchar(255) DEFAULT NULL,
  `jabatan_lama` varchar(255) DEFAULT NULL,
  `jabatan_baru` varchar(255) DEFAULT NULL,
  `kode_jabatan_baru` varchar(255) DEFAULT NULL,
  `kode_jabatan_lama` varchar(100) DEFAULT NULL,
  `atasan1` varchar(255) DEFAULT NULL,
  `atasan2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `career_transition`
--

LOCK TABLES `career_transition` WRITE;
/*!40000 ALTER TABLE `career_transition` DISABLE KEYS */;
/*!40000 ALTER TABLE `career_transition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuti`
--

DROP TABLE IF EXISTS `cuti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_cuti` varchar(255) DEFAULT NULL,
  `cuti` varchar(255) DEFAULT NULL,
  `lama_cuti` int(255) DEFAULT NULL,
  `days_or_month` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuti`
--

LOCK TABLES `cuti` WRITE;
/*!40000 ALTER TABLE `cuti` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `daftar_lembur`
--

DROP TABLE IF EXISTS `daftar_lembur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `daftar_lembur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_lembur` varchar(19) DEFAULT NULL,
  `id_pkl` int(11) DEFAULT NULL,
  `dept` varchar(128) DEFAULT NULL,
  `shift` varchar(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `no_absen` int(128) DEFAULT NULL,
  `waktu_lembur_start` varchar(128) DEFAULT NULL,
  `waktu_lembur_stop` varchar(128) DEFAULT NULL,
  `istirahat` varchar(128) DEFAULT NULL,
  `total_jam_lembur` varchar(128) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `dibuat_oleh_nama` varchar(128) DEFAULT NULL,
  `dibuat_oleh_jabatan` varchar(128) DEFAULT NULL,
  `diperiksa_oleh_nama` varchar(128) DEFAULT NULL,
  `diperiksa_oleh_jabatan` varchar(128) DEFAULT NULL,
  `disetujui_oleh_nama` varchar(128) DEFAULT NULL,
  `disetujui_oleh_jabatan` varchar(128) DEFAULT NULL,
  `tanggal_ttd` date DEFAULT NULL,
  `tanggal_permohonan` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `status_tipe_lembur` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dept` (`dept`) USING BTREE,
  KEY `dibuat_oleh_jabatan` (`dibuat_oleh_jabatan`) USING BTREE,
  KEY `dibuat_oleh_nama` (`dibuat_oleh_nama`) USING BTREE,
  KEY `diperiksa_oleh_jabatan` (`diperiksa_oleh_jabatan`) USING BTREE,
  KEY `diperiksa_oleh_nama` (`diperiksa_oleh_nama`) USING BTREE,
  KEY `disetujui_oleh_jabatan` (`disetujui_oleh_jabatan`) USING BTREE,
  KEY `disetujui_oleh_nama` (`disetujui_oleh_nama`) USING BTREE,
  KEY `id` (`id`) USING BTREE,
  KEY `id_pkl` (`id_pkl`) USING BTREE,
  KEY `istirahat` (`istirahat`) USING BTREE,
  KEY `keterangan` (`keterangan`) USING BTREE,
  KEY `kode_lembur` (`kode_lembur`) USING BTREE,
  KEY `nama` (`nama`) USING BTREE,
  KEY `no_absen` (`no_absen`) USING BTREE,
  KEY `shift` (`shift`) USING BTREE,
  KEY `status` (`status`) USING BTREE,
  KEY `tanggal` (`tanggal`) USING BTREE,
  KEY `tanggal_permohonan` (`tanggal_permohonan`) USING BTREE,
  KEY `tanggal_ttd` (`tanggal_ttd`) USING BTREE,
  KEY `total_jam_lembur` (`total_jam_lembur`) USING BTREE,
  KEY `waktu_lembur_start` (`waktu_lembur_start`) USING BTREE,
  KEY `waktu_lembur_stop` (`waktu_lembur_stop`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daftar_lembur`
--

LOCK TABLES `daftar_lembur` WRITE;
/*!40000 ALTER TABLE `daftar_lembur` DISABLE KEYS */;
/*!40000 ALTER TABLE `daftar_lembur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_keluarga`
--

DROP TABLE IF EXISTS `data_keluarga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_keluarga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_scan` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `hubungan` varchar(255) DEFAULT NULL,
  `tempat` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_keluarga`
--

LOCK TABLES `data_keluarga` WRITE;
/*!40000 ALTER TABLE `data_keluarga` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_keluarga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_pengalaman_kerja`
--

DROP TABLE IF EXISTS `data_pengalaman_kerja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_pengalaman_kerja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_scan` varchar(255) DEFAULT NULL,
  `nama_perusahaan` varchar(255) DEFAULT NULL,
  `bagian` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `masa_kerja` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_pengalaman_kerja`
--

LOCK TABLES `data_pengalaman_kerja` WRITE;
/*!40000 ALTER TABLE `data_pengalaman_kerja` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_pengalaman_kerja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `code` varchar(255) DEFAULT NULL,
  `divisi` varchar(255) DEFAULT NULL,
  `dept` varchar(255) DEFAULT NULL,
  `bagian` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dept`
--

DROP TABLE IF EXISTS `dept`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dept` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `dept_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dept`
--

LOCK TABLES `dept` WRITE;
/*!40000 ALTER TABLE `dept` DISABLE KEYS */;
/*!40000 ALTER TABLE `dept` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dept_mail`
--

DROP TABLE IF EXISTS `dept_mail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dept_mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `dept_email2` varchar(100) DEFAULT NULL,
  `dept_email3` varchar(100) DEFAULT NULL,
  `dept_email4` varchar(100) DEFAULT NULL,
  `dept_email5` varchar(100) DEFAULT NULL,
  `dept_email1` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dept_mail`
--

LOCK TABLES `dept_mail` WRITE;
/*!40000 ALTER TABLE `dept_mail` DISABLE KEYS */;
/*!40000 ALTER TABLE `dept_mail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dept_mail_2`
--

DROP TABLE IF EXISTS `dept_mail_2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dept_mail_2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(25) DEFAULT NULL,
  `dept_email1` varchar(50) DEFAULT NULL,
  `dept_email2` varchar(50) DEFAULT NULL,
  `dept_email3` varchar(50) DEFAULT NULL,
  `dept_email4` varchar(50) DEFAULT NULL,
  `dept_email5` varchar(50) DEFAULT NULL,
  `dept_email6` varchar(50) DEFAULT NULL,
  `dept_email7` varchar(50) DEFAULT NULL,
  `dept_email8` varchar(50) DEFAULT NULL,
  `dept_email9` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dept_mail_2`
--

LOCK TABLES `dept_mail_2` WRITE;
/*!40000 ALTER TABLE `dept_mail_2` DISABLE KEYS */;
/*!40000 ALTER TABLE `dept_mail_2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dicipline`
--

DROP TABLE IF EXISTS `dicipline`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dicipline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_sp` date DEFAULT NULL,
  `no_scan` varchar(255) DEFAULT NULL,
  `sp` varchar(255) DEFAULT NULL,
  `alasan` varchar(1502) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dicipline`
--

LOCK TABLES `dicipline` WRITE;
/*!40000 ALTER TABLE `dicipline` DISABLE KEYS */;
/*!40000 ALTER TABLE `dicipline` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `divisi`
--

DROP TABLE IF EXISTS `divisi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `divisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `divisi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `divisi`
--

LOCK TABLES `divisi` WRITE;
/*!40000 ALTER TABLE `divisi` DISABLE KEYS */;
/*!40000 ALTER TABLE `divisi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_pribadi`
--

DROP TABLE IF EXISTS `email_pribadi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_pribadi` (
  `no_scan` int(11) NOT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `active_directory_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_pribadi`
--

LOCK TABLES `email_pribadi` WRITE;
/*!40000 ALTER TABLE `email_pribadi` DISABLE KEYS */;
/*!40000 ALTER TABLE `email_pribadi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) DEFAULT NULL,
  `nik2` varchar(255) DEFAULT NULL,
  `feedback` varchar(255) DEFAULT NULL,
  `tanggapan` varchar(500) DEFAULT NULL,
  `lokasi_feedback` varchar(500) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gol_darah`
--

DROP TABLE IF EXISTS `gol_darah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gol_darah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gol_darah` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gol_darah`
--

LOCK TABLES `gol_darah` WRITE;
/*!40000 ALTER TABLE `gol_darah` DISABLE KEYS */;
/*!40000 ALTER TABLE `gol_darah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `golongan`
--

DROP TABLE IF EXISTS `golongan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `golongan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `golongan` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `golongan`
--

LOCK TABLES `golongan` WRITE;
/*!40000 ALTER TABLE `golongan` DISABLE KEYS */;
/*!40000 ALTER TABLE `golongan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hari_libur`
--

DROP TABLE IF EXISTS `hari_libur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hari_libur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hari_libur`
--

LOCK TABLES `hari_libur` WRITE;
/*!40000 ALTER TABLE `hari_libur` DISABLE KEYS */;
/*!40000 ALTER TABLE `hari_libur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `im_karyawanbaru`
--

DROP TABLE IF EXISTS `im_karyawanbaru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `im_karyawanbaru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memo` varchar(255) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `dept` varchar(255) DEFAULT NULL,
  `dibuat_oleh` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `im_karyawanbaru`
--

LOCK TABLES `im_karyawanbaru` WRITE;
/*!40000 ALTER TABLE `im_karyawanbaru` DISABLE KEYS */;
/*!40000 ALTER TABLE `im_karyawanbaru` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interaksi_external`
--

DROP TABLE IF EXISTS `interaksi_external`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interaksi_external` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jobdesc` int(255) DEFAULT NULL,
  `interaksi_external` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interaksi_external`
--

LOCK TABLES `interaksi_external` WRITE;
/*!40000 ALTER TABLE `interaksi_external` DISABLE KEYS */;
/*!40000 ALTER TABLE `interaksi_external` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interaksi_internal`
--

DROP TABLE IF EXISTS `interaksi_internal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interaksi_internal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jobdesc` int(255) DEFAULT NULL,
  `interaksi_internal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interaksi_internal`
--

LOCK TABLES `interaksi_internal` WRITE;
/*!40000 ALTER TABLE `interaksi_internal` DISABLE KEYS */;
/*!40000 ALTER TABLE `interaksi_internal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jabatan`
--

DROP TABLE IF EXISTS `jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jabatan`
--

LOCK TABLES `jabatan` WRITE;
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis_kelamin`
--

DROP TABLE IF EXISTS `jenis_kelamin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jenis_kelamin` (
  `id` varchar(11) NOT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_kelamin`
--

LOCK TABLES `jenis_kelamin` WRITE;
/*!40000 ALTER TABLE `jenis_kelamin` DISABLE KEYS */;
/*!40000 ALTER TABLE `jenis_kelamin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis_lembur`
--

DROP TABLE IF EXISTS `jenis_lembur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jenis_lembur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(255) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_lembur`
--

LOCK TABLES `jenis_lembur` WRITE;
/*!40000 ALTER TABLE `jenis_lembur` DISABLE KEYS */;
/*!40000 ALTER TABLE `jenis_lembur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_description`
--

DROP TABLE IF EXISTS `job_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(255) DEFAULT NULL,
  `bagian` varchar(255) DEFAULT NULL,
  `no_scan` varchar(255) DEFAULT NULL,
  `dept` varchar(255) DEFAULT NULL,
  `struktur_organisasi` varchar(255) DEFAULT NULL,
  `fungsi_utama_jabatan` varchar(255) DEFAULT NULL,
  `pendidikan` varchar(255) DEFAULT NULL,
  `pengalaman` varchar(255) DEFAULT NULL,
  `kompetensi_teknis` varchar(255) DEFAULT NULL,
  `kompetensi_nonteknis` varchar(255) DEFAULT NULL,
  `dipesiapkan_oleh` varchar(255) DEFAULT NULL,
  `disetujui_oleh` varchar(255) DEFAULT NULL,
  `diterima_oleh` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_description`
--

LOCK TABLES `job_description` WRITE;
/*!40000 ALTER TABLE `job_description` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kec_kab_pro`
--

DROP TABLE IF EXISTS `kec_kab_pro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kec_kab_pro` (
  `kode` int(11) NOT NULL AUTO_INCREMENT,
  `kecamatan` varchar(128) DEFAULT NULL,
  `kabupaten` varchar(128) DEFAULT NULL,
  `provinsi` varchar(128) DEFAULT NULL,
  `kode_pos` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kec_kab_pro`
--

LOCK TABLES `kec_kab_pro` WRITE;
/*!40000 ALTER TABLE `kec_kab_pro` DISABLE KEYS */;
/*!40000 ALTER TABLE `kec_kab_pro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ket_resign`
--

DROP TABLE IF EXISTS `ket_resign`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ket_resign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc_resign` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ket_resign`
--

LOCK TABLES `ket_resign` WRITE;
/*!40000 ALTER TABLE `ket_resign` DISABLE KEYS */;
/*!40000 ALTER TABLE `ket_resign` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kode1bsc`
--

DROP TABLE IF EXISTS `kode1bsc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kode1bsc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode1` varchar(255) DEFAULT NULL,
  `perspective_bsc` varchar(255) DEFAULT NULL,
  `ket_bsc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kode1bsc`
--

LOCK TABLES `kode1bsc` WRITE;
/*!40000 ALTER TABLE `kode1bsc` DISABLE KEYS */;
/*!40000 ALTER TABLE `kode1bsc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kode2sto`
--

DROP TABLE IF EXISTS `kode2sto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kode2sto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode2` varchar(255) DEFAULT NULL,
  `strategic_obj_sto` varchar(255) DEFAULT NULL,
  `ket_sto` varchar(255) DEFAULT NULL,
  `kode1bsc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kode2sto`
--

LOCK TABLES `kode2sto` WRITE;
/*!40000 ALTER TABLE `kode2sto` DISABLE KEYS */;
/*!40000 ALTER TABLE `kode2sto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kode3kpc`
--

DROP TABLE IF EXISTS `kode3kpc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kode3kpc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode3` varchar(255) DEFAULT NULL,
  `kpi_company_kpc` varchar(255) DEFAULT NULL,
  `ket_kpc` varchar(255) DEFAULT NULL,
  `kode2sto` varchar(255) DEFAULT NULL,
  `kode1bsc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kode3kpc`
--

LOCK TABLES `kode3kpc` WRITE;
/*!40000 ALTER TABLE `kode3kpc` DISABLE KEYS */;
/*!40000 ALTER TABLE `kode3kpc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kode4stn`
--

DROP TABLE IF EXISTS `kode4stn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kode4stn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode4` varchar(255) DEFAULT NULL,
  `strategic_initiative_stn` varchar(255) DEFAULT NULL,
  `uom` varchar(255) DEFAULT NULL,
  `target` varchar(255) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `ket_stn` varchar(255) DEFAULT NULL,
  `kode3kpc` varchar(255) DEFAULT NULL,
  `kode2sto` varchar(255) DEFAULT NULL,
  `kode1bsc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kode4stn`
--

LOCK TABLES `kode4stn` WRITE;
/*!40000 ALTER TABLE `kode4stn` DISABLE KEYS */;
/*!40000 ALTER TABLE `kode4stn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kode5kpd`
--

DROP TABLE IF EXISTS `kode5kpd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kode5kpd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode5` varchar(255) DEFAULT NULL,
  `kpi_dept` varchar(255) DEFAULT NULL,
  `target` varchar(255) DEFAULT NULL,
  `dept` varchar(255) DEFAULT NULL,
  `ket_kpd` varchar(255) DEFAULT NULL,
  `kode4stn` varchar(255) DEFAULT NULL,
  `kode3kpc` varchar(255) DEFAULT NULL,
  `kode2sto` varchar(255) DEFAULT NULL,
  `kode1bsc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`) USING BTREE,
  KEY `kode5` (`kode5`) USING BTREE,
  KEY `kpi_dept` (`kpi_dept`) USING BTREE,
  KEY `target` (`target`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kode5kpd`
--

LOCK TABLES `kode5kpd` WRITE;
/*!40000 ALTER TABLE `kode5kpd` DISABLE KEYS */;
/*!40000 ALTER TABLE `kode5kpd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kompetensi`
--

DROP TABLE IF EXISTS `kompetensi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kompetensi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_scan` varchar(5) DEFAULT NULL,
  `dept` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kompetensi`
--

LOCK TABLES `kompetensi` WRITE;
/*!40000 ALTER TABLE `kompetensi` DISABLE KEYS */;
/*!40000 ALTER TABLE `kompetensi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kompetensi_nonteknis`
--

DROP TABLE IF EXISTS `kompetensi_nonteknis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kompetensi_nonteknis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_scan` varchar(255) DEFAULT NULL,
  `kompetensi_nonteknis` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kompetensi_nonteknis`
--

LOCK TABLES `kompetensi_nonteknis` WRITE;
/*!40000 ALTER TABLE `kompetensi_nonteknis` DISABLE KEYS */;
/*!40000 ALTER TABLE `kompetensi_nonteknis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kompetensi_teknis`
--

DROP TABLE IF EXISTS `kompetensi_teknis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kompetensi_teknis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_scan` varchar(255) DEFAULT NULL,
  `kompetensi_teknis` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kompetensi_teknis`
--

LOCK TABLES `kompetensi_teknis` WRITE;
/*!40000 ALTER TABLE `kompetensi_teknis` DISABLE KEYS */;
/*!40000 ALTER TABLE `kompetensi_teknis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kpi_individu`
--

DROP TABLE IF EXISTS `kpi_individu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kpi_individu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode6` varchar(255) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `no_scan` varchar(255) DEFAULT NULL,
  `no_scan_atasan` varchar(255) DEFAULT NULL,
  `kode5kpd` varchar(255) DEFAULT NULL,
  `target1` varchar(255) DEFAULT NULL,
  `ket1` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`) USING BTREE,
  KEY `kode5kpd` (`kode5kpd`) USING BTREE,
  KEY `kode6` (`kode6`) USING BTREE,
  KEY `no_scan` (`no_scan`) USING BTREE,
  KEY `no_scan_atasan` (`no_scan_atasan`) USING BTREE,
  KEY `tgl` (`tgl`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kpi_individu`
--

LOCK TABLES `kpi_individu` WRITE;
/*!40000 ALTER TABLE `kpi_individu` DISABLE KEYS */;
/*!40000 ALTER TABLE `kpi_individu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laporan_kpi`
--

DROP TABLE IF EXISTS `laporan_kpi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laporan_kpi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode8` varchar(255) DEFAULT NULL,
  `kode7` varchar(255) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `no_scan` varchar(255) DEFAULT NULL,
  `no_scan_atasan` varchar(255) DEFAULT NULL,
  `kode5kpd` varchar(255) DEFAULT NULL,
  `target1` varchar(255) DEFAULT NULL,
  `ket1` varchar(255) DEFAULT NULL,
  `aktual` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laporan_kpi`
--

LOCK TABLES `laporan_kpi` WRITE;
/*!40000 ALTER TABLE `laporan_kpi` DISABLE KEYS */;
/*!40000 ALTER TABLE `laporan_kpi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_delete_employee`
--

DROP TABLE IF EXISTS `log_delete_employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_delete_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `no_scan` varchar(128) DEFAULT NULL,
  `tgl` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_delete_employee`
--

LOCK TABLES `log_delete_employee` WRITE;
/*!40000 ALTER TABLE `log_delete_employee` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_delete_employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_delete_training`
--

DROP TABLE IF EXISTS `log_delete_training`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_delete_training` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `no_scan` varchar(128) DEFAULT NULL,
  `id_training` varchar(50) DEFAULT NULL,
  `tgl` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_delete_training`
--

LOCK TABLES `log_delete_training` WRITE;
/*!40000 ALTER TABLE `log_delete_training` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_delete_training` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_hacked`
--

DROP TABLE IF EXISTS `log_hacked`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_hacked` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `ip_address` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_hacked`
--

LOCK TABLES `log_hacked` WRITE;
/*!40000 ALTER TABLE `log_hacked` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_hacked` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_history_pkwt`
--

DROP TABLE IF EXISTS `log_history_pkwt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_history_pkwt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `no_scan` varchar(100) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  `ket_tambah` varchar(100) DEFAULT NULL,
  `ket_hapus` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_history_pkwt`
--

LOCK TABLES `log_history_pkwt` WRITE;
/*!40000 ALTER TABLE `log_history_pkwt` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_history_pkwt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_login`
--

DROP TABLE IF EXISTS `log_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `date_login` int(11) DEFAULT NULL,
  `keterangan` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_login`
--

LOCK TABLES `log_login` WRITE;
/*!40000 ALTER TABLE `log_login` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_login_2`
--

DROP TABLE IF EXISTS `log_login_2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_login_2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `date_login` datetime DEFAULT NULL,
  `keterangan` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_login_2`
--

LOCK TABLES `log_login_2` WRITE;
/*!40000 ALTER TABLE `log_login_2` DISABLE KEYS */;
INSERT INTO `log_login_2` VALUES (1,'admin','2024-04-26 16:12:57','L-DIT-000782.indotaichen.com');
/*!40000 ALTER TABLE `log_login_2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_login_tdl`
--

DROP TABLE IF EXISTS `log_login_tdl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_login_tdl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `date_login` int(11) DEFAULT NULL,
  `keterangan` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_login_tdl`
--

LOCK TABLES `log_login_tdl` WRITE;
/*!40000 ALTER TABLE `log_login_tdl` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_login_tdl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_logout`
--

DROP TABLE IF EXISTS `log_logout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_logout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `date_logout` int(11) DEFAULT NULL,
  `keterangan` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_logout`
--

LOCK TABLES `log_logout` WRITE;
/*!40000 ALTER TABLE `log_logout` DISABLE KEYS */;
INSERT INTO `log_logout` VALUES (1,'NOT FOUND',1714122771,'L-DIT-000782.indotaichen.com');
/*!40000 ALTER TABLE `log_logout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_logout_tdl`
--

DROP TABLE IF EXISTS `log_logout_tdl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_logout_tdl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `date_logout` int(11) DEFAULT NULL,
  `keterangan` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_logout_tdl`
--

LOCK TABLES `log_logout_tdl` WRITE;
/*!40000 ALTER TABLE `log_logout_tdl` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_logout_tdl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_new_employee_1`
--

DROP TABLE IF EXISTS `log_new_employee_1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_new_employee_1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `no_scan` varchar(128) DEFAULT NULL,
  `tgl` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_new_employee_1`
--

LOCK TABLES `log_new_employee_1` WRITE;
/*!40000 ALTER TABLE `log_new_employee_1` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_new_employee_1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_new_employee_2`
--

DROP TABLE IF EXISTS `log_new_employee_2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_new_employee_2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `no_scan` varchar(128) DEFAULT NULL,
  `tgl` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_new_employee_2`
--

LOCK TABLES `log_new_employee_2` WRITE;
/*!40000 ALTER TABLE `log_new_employee_2` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_new_employee_2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_new_training`
--

DROP TABLE IF EXISTS `log_new_training`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_new_training` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `no_scan` varchar(128) DEFAULT NULL,
  `tgl` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_new_training`
--

LOCK TABLES `log_new_training` WRITE;
/*!40000 ALTER TABLE `log_new_training` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_new_training` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_permohonan_izin_cuti`
--

DROP TABLE IF EXISTS `log_permohonan_izin_cuti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_permohonan_izin_cuti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_cuti` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `no_scan` varchar(10) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  `ket_tambah_cuti` varchar(128) DEFAULT NULL,
  `ket_edit_cuti` varchar(128) DEFAULT NULL,
  `ket_hapus_cuti` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_permohonan_izin_cuti`
--

LOCK TABLES `log_permohonan_izin_cuti` WRITE;
/*!40000 ALTER TABLE `log_permohonan_izin_cuti` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_permohonan_izin_cuti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_pkl_hapus`
--

DROP TABLE IF EXISTS `log_pkl_hapus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_pkl_hapus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `kode_lembur` varchar(100) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  `ket_hapus` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_pkl_hapus`
--

LOCK TABLES `log_pkl_hapus` WRITE;
/*!40000 ALTER TABLE `log_pkl_hapus` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_pkl_hapus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_pkwt_hapus`
--

DROP TABLE IF EXISTS `log_pkwt_hapus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_pkwt_hapus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `no_scan` varchar(100) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  `ket_hapus` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_pkwt_hapus`
--

LOCK TABLES `log_pkwt_hapus` WRITE;
/*!40000 ALTER TABLE `log_pkwt_hapus` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_pkwt_hapus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_pkwt_tambah`
--

DROP TABLE IF EXISTS `log_pkwt_tambah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_pkwt_tambah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `no_scan` varchar(100) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  `ket_tambah` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_pkwt_tambah`
--

LOCK TABLES `log_pkwt_tambah` WRITE;
/*!40000 ALTER TABLE `log_pkwt_tambah` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_pkwt_tambah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_pkwt_ubah`
--

DROP TABLE IF EXISTS `log_pkwt_ubah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_pkwt_ubah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `no_scan` varchar(100) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  `ket_ubah` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_pkwt_ubah`
--

LOCK TABLES `log_pkwt_ubah` WRITE;
/*!40000 ALTER TABLE `log_pkwt_ubah` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_pkwt_ubah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_resign`
--

DROP TABLE IF EXISTS `log_resign`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_resign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `no_scan` varchar(128) DEFAULT NULL,
  `tgl` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_resign`
--

LOCK TABLES `log_resign` WRITE;
/*!40000 ALTER TABLE `log_resign` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_resign` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_setting_add`
--

DROP TABLE IF EXISTS `log_setting_add`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_setting_add` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `tgl` varchar(50) DEFAULT NULL,
  `kode` varchar(128) DEFAULT NULL,
  `keterangan` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_setting_add`
--

LOCK TABLES `log_setting_add` WRITE;
/*!40000 ALTER TABLE `log_setting_add` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_setting_add` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_setting_add_delete`
--

DROP TABLE IF EXISTS `log_setting_add_delete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_setting_add_delete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `tgl` varchar(50) DEFAULT NULL,
  `kode` varchar(128) DEFAULT NULL,
  `keterangan` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_setting_add_delete`
--

LOCK TABLES `log_setting_add_delete` WRITE;
/*!40000 ALTER TABLE `log_setting_add_delete` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_setting_add_delete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_setting_add_edit`
--

DROP TABLE IF EXISTS `log_setting_add_edit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_setting_add_edit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `tgl` varchar(50) DEFAULT NULL,
  `kode` varchar(128) DEFAULT NULL,
  `keterangan` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_setting_add_edit`
--

LOCK TABLES `log_setting_add_edit` WRITE;
/*!40000 ALTER TABLE `log_setting_add_edit` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_setting_add_edit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_setting_divisi_add`
--

DROP TABLE IF EXISTS `log_setting_divisi_add`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_setting_divisi_add` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `tgl` varchar(50) DEFAULT NULL,
  `divisi` varchar(128) DEFAULT NULL,
  `keterangan` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_setting_divisi_add`
--

LOCK TABLES `log_setting_divisi_add` WRITE;
/*!40000 ALTER TABLE `log_setting_divisi_add` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_setting_divisi_add` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_setting_divisi_delete`
--

DROP TABLE IF EXISTS `log_setting_divisi_delete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_setting_divisi_delete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `tgl` varchar(50) DEFAULT NULL,
  `divisi` varchar(128) DEFAULT NULL,
  `keterangan` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_setting_divisi_delete`
--

LOCK TABLES `log_setting_divisi_delete` WRITE;
/*!40000 ALTER TABLE `log_setting_divisi_delete` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_setting_divisi_delete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_setting_divisi_edit`
--

DROP TABLE IF EXISTS `log_setting_divisi_edit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_setting_divisi_edit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `tgl` varchar(50) DEFAULT NULL,
  `divisi` varchar(128) DEFAULT NULL,
  `keterangan` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_setting_divisi_edit`
--

LOCK TABLES `log_setting_divisi_edit` WRITE;
/*!40000 ALTER TABLE `log_setting_divisi_edit` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_setting_divisi_edit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_update_employee_1`
--

DROP TABLE IF EXISTS `log_update_employee_1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_update_employee_1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `no_scan` varchar(128) DEFAULT NULL,
  `tgl` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_update_employee_1`
--

LOCK TABLES `log_update_employee_1` WRITE;
/*!40000 ALTER TABLE `log_update_employee_1` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_update_employee_1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_update_training`
--

DROP TABLE IF EXISTS `log_update_training`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_update_training` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `no_scan` varchar(128) DEFAULT NULL,
  `tgl` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_update_training`
--

LOCK TABLES `log_update_training` WRITE;
/*!40000 ALTER TABLE `log_update_training` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_update_training` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materi_training`
--

DROP TABLE IF EXISTS `materi_training`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materi_training` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) NOT NULL,
  `materi_training` varchar(255) DEFAULT NULL,
  `jenis_training` varchar(255) DEFAULT NULL,
  `penyelenggara` varchar(255) DEFAULT NULL,
  `tempat` varchar(255) DEFAULT NULL,
  `sertifikat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`kode`),
  KEY `kode` (`kode`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materi_training`
--

LOCK TABLES `materi_training` WRITE;
/*!40000 ALTER TABLE `materi_training` DISABLE KEYS */;
/*!40000 ALTER TABLE `materi_training` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `memo_pkwt`
--

DROP TABLE IF EXISTS `memo_pkwt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `memo_pkwt` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nomor_memo` varchar(50) DEFAULT NULL,
  `periode_awal` date DEFAULT NULL,
  `periode_akhir` date DEFAULT NULL,
  `dibuat_oleh` varchar(255) DEFAULT NULL,
  `mengetahui` varchar(255) DEFAULT NULL,
  `menyetujui` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `memo_pkwt`
--

LOCK TABLES `memo_pkwt` WRITE;
/*!40000 ALTER TABLE `memo_pkwt` DISABLE KEYS */;
/*!40000 ALTER TABLE `memo_pkwt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nama`
--

DROP TABLE IF EXISTS `nama`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nama`
--

LOCK TABLES `nama` WRITE;
/*!40000 ALTER TABLE `nama` DISABLE KEYS */;
/*!40000 ALTER TABLE `nama` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pekerjaan_inti`
--

DROP TABLE IF EXISTS `pekerjaan_inti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pekerjaan_inti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_scan` varchar(255) DEFAULT NULL,
  `pekerjaan_inti` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pekerjaan_inti`
--

LOCK TABLES `pekerjaan_inti` WRITE;
/*!40000 ALTER TABLE `pekerjaan_inti` DISABLE KEYS */;
/*!40000 ALTER TABLE `pekerjaan_inti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pendidikan`
--

DROP TABLE IF EXISTS `pendidikan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pendidikan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pendidikan` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pendidikan`
--

LOCK TABLES `pendidikan` WRITE;
/*!40000 ALTER TABLE `pendidikan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pendidikan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permohonan_izin_cuti`
--

DROP TABLE IF EXISTS `permohonan_izin_cuti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permohonan_izin_cuti` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kode_cuti` varchar(12) DEFAULT NULL,
  `nip` int(6) DEFAULT NULL,
  `dept` varchar(5) DEFAULT NULL,
  `pengganti_kerja` varchar(30) DEFAULT NULL,
  `lama_izin` varchar(3) DEFAULT NULL,
  `saldo_cuti` varchar(3) DEFAULT NULL,
  `days_or_month` varchar(5) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `ket` varchar(100) DEFAULT NULL,
  `dll` varchar(255) DEFAULT NULL,
  `alasan` varchar(200) DEFAULT NULL,
  `pemohon_nama` varchar(30) DEFAULT NULL,
  `pemohon_jabatan` varchar(30) DEFAULT NULL,
  `disetujui_nama_1` varchar(30) DEFAULT NULL,
  `disetujui_jabatan_1` varchar(30) DEFAULT NULL,
  `disetujui_nama_2` varchar(30) DEFAULT NULL,
  `disetujui_jabatan_2` varchar(30) DEFAULT NULL,
  `mengetahui_nama` varchar(30) DEFAULT NULL,
  `mengetahui_jabatan` varchar(30) DEFAULT NULL,
  `tgl_surat_pemohon` date DEFAULT NULL,
  `tgl_diset_mengetehui` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `alasan` (`alasan`) USING BTREE,
  KEY `days_or_year` (`days_or_month`) USING BTREE,
  KEY `dept` (`dept`) USING BTREE,
  KEY `disetujui_jabatan_1` (`disetujui_jabatan_1`) USING BTREE,
  KEY `disetujui_jabatan_2` (`disetujui_jabatan_2`) USING BTREE,
  KEY `disetujui_nama_1` (`disetujui_nama_1`) USING BTREE,
  KEY `disetujui_nama_2` (`disetujui_nama_2`) USING BTREE,
  KEY `dll` (`dll`) USING BTREE,
  KEY `id` (`id`) USING BTREE,
  KEY `ket` (`ket`) USING BTREE,
  KEY `kode_cuti` (`kode_cuti`) USING BTREE,
  KEY `lama_izin` (`lama_izin`) USING BTREE,
  KEY `mengetahui_jabatan` (`mengetahui_jabatan`) USING BTREE,
  KEY `mengetahui_nama` (`mengetahui_nama`) USING BTREE,
  KEY `nip` (`nip`) USING BTREE,
  KEY `pemohon_jabatan` (`pemohon_jabatan`) USING BTREE,
  KEY `pemohon_nama` (`pemohon_nama`) USING BTREE,
  KEY `pengganti_kerja` (`pengganti_kerja`) USING BTREE,
  KEY `status` (`status`) USING BTREE,
  KEY `tgl_diset_mengetehui` (`tgl_diset_mengetehui`) USING BTREE,
  KEY `tgl_mulai` (`tgl_mulai`) USING BTREE,
  KEY `tgl_selesai` (`tgl_selesai`) USING BTREE,
  KEY `tgl_surat_pemohon` (`tgl_surat_pemohon`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permohonan_izin_cuti`
--

LOCK TABLES `permohonan_izin_cuti` WRITE;
/*!40000 ALTER TABLE `permohonan_izin_cuti` DISABLE KEYS */;
/*!40000 ALTER TABLE `permohonan_izin_cuti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permohonan_kerja_lembur`
--

DROP TABLE IF EXISTS `permohonan_kerja_lembur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permohonan_kerja_lembur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_lembur` varchar(19) NOT NULL,
  `dept` varchar(128) NOT NULL,
  `shift` varchar(255) NOT NULL,
  `no_scan` varchar(10) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tujuan_lembur` varchar(1000) NOT NULL,
  `target_lembur` varchar(128) NOT NULL,
  `tipe_lembur` varchar(255) NOT NULL,
  `jam` varchar(1000) NOT NULL,
  `penyebab_lembur` varchar(255) NOT NULL,
  `dibuat_oleh_nama` varchar(128) NOT NULL,
  `dibuat_oleh_jabatan` varchar(128) NOT NULL,
  `diperiksa_oleh_nama` varchar(128) NOT NULL,
  `diperiksa_oleh_jabatan` varchar(128) NOT NULL,
  `ddpl_diketahui_nama` varchar(128) NOT NULL,
  `ddpl_diketahui_jabatan` varchar(128) NOT NULL,
  `dt_disetujui_nama` varchar(128) NOT NULL,
  `dt_disetujui_jabatan` varchar(128) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `status_tipe_lembur` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ddpl_diketahui_jabatan` (`ddpl_diketahui_jabatan`) USING BTREE,
  KEY `ddpl_diketahui_nama` (`ddpl_diketahui_nama`) USING BTREE,
  KEY `dept` (`dept`) USING BTREE,
  KEY `dibuat_oleh_jabatan` (`dibuat_oleh_jabatan`) USING BTREE,
  KEY `dibuat_oleh_nama` (`dibuat_oleh_nama`) USING BTREE,
  KEY `diperiksa_oleh_jabatan` (`diperiksa_oleh_jabatan`) USING BTREE,
  KEY `diperiksa_oleh_nama` (`diperiksa_oleh_nama`) USING BTREE,
  KEY `dt_disetujui_nama` (`dt_disetujui_nama`) USING BTREE,
  KEY `id` (`id`) USING BTREE,
  KEY `jam` (`jam`(767)) USING BTREE,
  KEY `kode_lembur` (`kode_lembur`) USING BTREE,
  KEY `nama` (`nama`) USING BTREE,
  KEY `no_scan` (`no_scan`) USING BTREE,
  KEY `penyebab_lembur` (`penyebab_lembur`) USING BTREE,
  KEY `shift` (`shift`) USING BTREE,
  KEY `status` (`status`) USING BTREE,
  KEY `tanggal` (`tanggal`) USING BTREE,
  KEY `target_lembur` (`target_lembur`) USING BTREE,
  KEY `tipe_lembur` (`tipe_lembur`) USING BTREE,
  KEY `tujuan_lembur` (`tujuan_lembur`(767)) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permohonan_kerja_lembur`
--

LOCK TABLES `permohonan_kerja_lembur` WRITE;
/*!40000 ALTER TABLE `permohonan_kerja_lembur` DISABLE KEYS */;
/*!40000 ALTER TABLE `permohonan_kerja_lembur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recruitment_permohonan`
--

DROP TABLE IF EXISTS `recruitment_permohonan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recruitment_permohonan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no` varchar(20) DEFAULT NULL,
  `tgl_fptk` date DEFAULT NULL,
  `sifat_permohonan` varchar(255) DEFAULT NULL,
  `alasan` varchar(255) DEFAULT NULL,
  `dept` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `total_need` varchar(255) DEFAULT NULL,
  `total_fulfil` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `kode_gol` varchar(255) DEFAULT NULL,
  `lt_target` varchar(255) DEFAULT NULL,
  `tgl_target` date DEFAULT NULL,
  `tgl_aktual` date DEFAULT NULL,
  `tgl_join` date DEFAULT NULL,
  `nama_pelamar` varchar(255) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `lulus_ojt` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recruitment_permohonan`
--

LOCK TABLES `recruitment_permohonan` WRITE;
/*!40000 ALTER TABLE `recruitment_permohonan` DISABLE KEYS */;
/*!40000 ALTER TABLE `recruitment_permohonan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recruitment_seleksi`
--

DROP TABLE IF EXISTS `recruitment_seleksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recruitment_seleksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no` varchar(20) DEFAULT NULL,
  `tgl_panggil` date DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `pendidikan` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `dept` varchar(255) DEFAULT NULL,
  `sumber` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `jabatan_dilamar` varchar(255) DEFAULT NULL,
  `int_hrd` date DEFAULT NULL,
  `hint_hrd` varchar(6) DEFAULT NULL,
  `psikotes` date DEFAULT NULL,
  `hpsikotes` varchar(6) DEFAULT NULL,
  `tes_lap` date DEFAULT NULL,
  `htes_lap` varchar(6) DEFAULT NULL,
  `int_user` date DEFAULT NULL,
  `hint_user` varchar(6) DEFAULT NULL,
  `offering` date DEFAULT NULL,
  `hoffering` varchar(6) DEFAULT NULL,
  `tgl_join` date DEFAULT NULL,
  `tgl_evaluasi` date DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recruitment_seleksi`
--

LOCK TABLES `recruitment_seleksi` WRITE;
/*!40000 ALTER TABLE `recruitment_seleksi` DISABLE KEYS */;
/*!40000 ALTER TABLE `recruitment_seleksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `religion`
--

DROP TABLE IF EXISTS `religion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `religion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `religion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `religion`
--

LOCK TABLES `religion` WRITE;
/*!40000 ALTER TABLE `religion` DISABLE KEYS */;
/*!40000 ALTER TABLE `religion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sertifikat`
--

DROP TABLE IF EXISTS `sertifikat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sertifikat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sertifikat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sertifikat`
--

LOCK TABLES `sertifikat` WRITE;
/*!40000 ALTER TABLE `sertifikat` DISABLE KEYS */;
/*!40000 ALTER TABLE `sertifikat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shift`
--

DROP TABLE IF EXISTS `shift`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(255) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shift`
--

LOCK TABLES `shift` WRITE;
/*!40000 ALTER TABLE `shift` DISABLE KEYS */;
/*!40000 ALTER TABLE `shift` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `id` varchar(50) NOT NULL,
  `jabatan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_email_idcard`
--

DROP TABLE IF EXISTS `status_email_idcard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_email_idcard` (
  `no_scan` varchar(100) DEFAULT NULL,
  `status_email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_email_idcard`
--

LOCK TABLES `status_email_idcard` WRITE;
/*!40000 ALTER TABLE `status_email_idcard` DISABLE KEYS */;
/*!40000 ALTER TABLE `status_email_idcard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_generate_cuti`
--

DROP TABLE IF EXISTS `status_generate_cuti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_generate_cuti` (
  `awal` varchar(100) DEFAULT NULL,
  `tgl_generate` date DEFAULT NULL,
  `status_generated` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_generate_cuti`
--

LOCK TABLES `status_generate_cuti` WRITE;
/*!40000 ALTER TABLE `status_generate_cuti` DISABLE KEYS */;
/*!40000 ALTER TABLE `status_generate_cuti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_idcseragam`
--

DROP TABLE IF EXISTS `status_idcseragam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_idcseragam` (
  `id` varchar(100) DEFAULT NULL,
  `status_seragam` varchar(100) DEFAULT NULL,
  `status_idcard` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_idcseragam`
--

LOCK TABLES `status_idcseragam` WRITE;
/*!40000 ALTER TABLE `status_idcseragam` DISABLE KEYS */;
/*!40000 ALTER TABLE `status_idcseragam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_kel`
--

DROP TABLE IF EXISTS `status_kel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_kel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_kel` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_kel`
--

LOCK TABLES `status_kel` WRITE;
/*!40000 ALTER TABLE `status_kel` DISABLE KEYS */;
/*!40000 ALTER TABLE `status_kel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_rumah`
--

DROP TABLE IF EXISTS `status_rumah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_rumah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_rumah`
--

LOCK TABLES `status_rumah` WRITE;
/*!40000 ALTER TABLE `status_rumah` DISABLE KEYS */;
/*!40000 ALTER TABLE `status_rumah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tanggung_jawab`
--

DROP TABLE IF EXISTS `tanggung_jawab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tanggung_jawab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jobdesc` varchar(255) DEFAULT NULL,
  `key_result_area` varchar(255) DEFAULT NULL,
  `job_responsibilities` varchar(255) DEFAULT NULL,
  `output` varchar(255) DEFAULT NULL,
  `perf_indicator` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tanggung_jawab`
--

LOCK TABLES `tanggung_jawab` WRITE;
/*!40000 ALTER TABLE `tanggung_jawab` DISABLE KEYS */;
/*!40000 ALTER TABLE `tanggung_jawab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tantangan_pekerjaan`
--

DROP TABLE IF EXISTS `tantangan_pekerjaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tantangan_pekerjaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jobdesc` int(255) DEFAULT NULL,
  `tantangan_pekerjaan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tantangan_pekerjaan`
--

LOCK TABLES `tantangan_pekerjaan` WRITE;
/*!40000 ALTER TABLE `tantangan_pekerjaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `tantangan_pekerjaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_gaji`
--

DROP TABLE IF EXISTS `tbl_gaji`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_gaji` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gaji` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_gaji`
--

LOCK TABLES `tbl_gaji` WRITE;
/*!40000 ALTER TABLE `tbl_gaji` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_gaji` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_jenis_jawab`
--

DROP TABLE IF EXISTS `tbl_jenis_jawab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_jenis_jawab` (
  `id_jenis_jawaban` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_jawaban` varchar(225) NOT NULL,
  PRIMARY KEY (`id_jenis_jawaban`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_jenis_jawab`
--

LOCK TABLES `tbl_jenis_jawab` WRITE;
/*!40000 ALTER TABLE `tbl_jenis_jawab` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_jenis_jawab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_kategori_question`
--

DROP TABLE IF EXISTS `tbl_kategori_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_kategori_question` (
  `id_kategori_question` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_question` varchar(225) NOT NULL,
  PRIMARY KEY (`id_kategori_question`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_kategori_question`
--

LOCK TABLES `tbl_kategori_question` WRITE;
/*!40000 ALTER TABLE `tbl_kategori_question` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_kategori_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_kontrak`
--

DROP TABLE IF EXISTS `tbl_kontrak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_kontrak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_scan` int(5) DEFAULT NULL,
  `kontrak_awal` date NOT NULL,
  `kontrak_akhir` date NOT NULL,
  `durasi` int(3) DEFAULT NULL,
  `keterangan` varchar(100) NOT NULL,
  `gaji` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `verifikasi` int(1) DEFAULT NULL,
  `libur` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_kontrak`
--

LOCK TABLES `tbl_kontrak` WRITE;
/*!40000 ALTER TABLE `tbl_kontrak` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_kontrak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_makar`
--

DROP TABLE IF EXISTS `tbl_makar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_makar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_ktp` varchar(16) DEFAULT NULL,
  `nik_krishand` varchar(50) DEFAULT NULL,
  `no_scan` varchar(6) NOT NULL DEFAULT '',
  `npwp` varchar(255) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `alamat_ktp` varchar(500) DEFAULT NULL,
  `alamat_domisili` varchar(255) DEFAULT NULL,
  `alamat_npwp` varchar(255) DEFAULT NULL,
  `kecamatan_domisili` varchar(128) DEFAULT NULL,
  `kabupaten_domisili` varchar(128) DEFAULT NULL,
  `kode_pos` varchar(255) DEFAULT NULL,
  `status_rumah` varchar(255) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL COMMENT 'L = Laki-Laki, P = Perempuan',
  `status_kel` varchar(5) DEFAULT NULL,
  `nama_sekolah` varchar(255) DEFAULT NULL,
  `pendidikan` varchar(10) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `ipk` varchar(11) DEFAULT NULL,
  `gol_darah` varchar(10) DEFAULT NULL,
  `email_pribadi` varchar(128) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `pengalaman_kerja` varchar(500) DEFAULT NULL,
  `keterampilan_khusus` varchar(500) DEFAULT NULL,
  `tgl_masuk` date NOT NULL,
  `status_karyawan` varchar(50) DEFAULT NULL,
  `tgl_tetap` date NOT NULL,
  `golongan` varchar(255) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `bagian` varchar(50) DEFAULT NULL,
  `atasan1` varchar(128) DEFAULT NULL,
  `atasan2` varchar(128) DEFAULT NULL,
  `no_bpjs_tk` varchar(128) DEFAULT NULL,
  `no_bpjs_kes` varchar(128) DEFAULT NULL,
  `status_aktif` varchar(1) DEFAULT NULL COMMENT '1 = Aktif, 2 = Tidak Aktif',
  `tgl_resign` date NOT NULL,
  `kode_jabatan` varchar(10) DEFAULT NULL,
  `nama_jabatan` varchar(255) DEFAULT NULL,
  `pot_cuti` int(255) DEFAULT NULL,
  `sisa_cuti` int(255) DEFAULT NULL,
  `tgl_surat_resign` date NOT NULL,
  `gaji` varchar(255) DEFAULT NULL,
  `ukuran_baju_polo` varchar(255) DEFAULT NULL,
  `ukuran_baju_shirt` varchar(255) DEFAULT NULL,
  `disabled_ub` varchar(255) DEFAULT NULL,
  `kartu_keluarga` varchar(255) DEFAULT NULL,
  `ttd` mediumtext DEFAULT NULL,
  `masa_berlaku_ktp` date DEFAULT NULL,
  `RT` varchar(10) DEFAULT NULL,
  `RW` varchar(10) DEFAULT NULL,
  `status_seragam` varchar(100) DEFAULT NULL,
  `tgl_seragam` date DEFAULT NULL,
  `masa_kerja` varchar(100) DEFAULT NULL,
  `status_idcard` varchar(100) DEFAULT NULL,
  `sisa_cuti_th_sebelumnya` varchar(100) DEFAULT NULL,
  `tgl_generate_cuti` varchar(100) DEFAULT NULL,
  `keterangan_resign` varchar(100) DEFAULT NULL,
  `tgl_evaluasi` date DEFAULT NULL,
  `status_email_kontrak` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`,`no_scan`),
  KEY `agama` (`agama`) USING BTREE,
  KEY `alamat_domisili` (`alamat_domisili`) USING BTREE,
  KEY `alamat_ktp` (`alamat_ktp`) USING BTREE,
  KEY `alamat_npwp` (`alamat_npwp`) USING BTREE,
  KEY `atasan1` (`atasan1`) USING BTREE,
  KEY `atasan2` (`atasan2`) USING BTREE,
  KEY `bagian` (`bagian`) USING BTREE,
  KEY `dept` (`dept`) USING BTREE,
  KEY `email_pribadi` (`email_pribadi`) USING BTREE,
  KEY `gol_darah` (`gol_darah`) USING BTREE,
  KEY `golongan` (`golongan`) USING BTREE,
  KEY `ipk` (`ipk`) USING BTREE,
  KEY `jabatan` (`jabatan`) USING BTREE,
  KEY `jenis_kelamin` (`jenis_kelamin`) USING BTREE,
  KEY `jurusan` (`jurusan`) USING BTREE,
  KEY `kabupaten_domisili` (`kabupaten_domisili`) USING BTREE,
  KEY `kecamatan_domisili` (`kecamatan_domisili`) USING BTREE,
  KEY `keterampilan_khusus` (`keterampilan_khusus`) USING BTREE,
  KEY `kode_jabatan` (`kode_jabatan`) USING BTREE,
  KEY `nama` (`nama`) USING BTREE,
  KEY `nama_jabatan` (`nama_jabatan`) USING BTREE,
  KEY `no_bpjs_kes` (`no_bpjs_kes`) USING BTREE,
  KEY `no_bpjs_tk` (`no_bpjs_tk`) USING BTREE,
  KEY `no_hp` (`no_hp`) USING BTREE,
  KEY `no_ktp` (`no_ktp`) USING BTREE,
  KEY `no_scan` (`no_scan`) USING BTREE,
  KEY `npwp` (`npwp`) USING BTREE,
  KEY `pendidikan` (`pendidikan`) USING BTREE,
  KEY `pengalaman_kerja` (`pengalaman_kerja`) USING BTREE,
  KEY `status_aktif` (`status_aktif`) USING BTREE,
  KEY `status_karyawan` (`status_karyawan`) USING BTREE,
  KEY `status_kel` (`status_kel`) USING BTREE,
  KEY `tempat_lahir` (`tempat_lahir`) USING BTREE,
  KEY `tgl_lahir` (`tgl_lahir`) USING BTREE,
  KEY `tgl_masuk` (`tgl_masuk`) USING BTREE,
  KEY `tgl_resign` (`tgl_resign`) USING BTREE,
  KEY `tgl_tetap` (`tgl_tetap`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_makar`
--

LOCK TABLES `tbl_makar` WRITE;
/*!40000 ALTER TABLE `tbl_makar` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_makar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_makar_temp`
--

DROP TABLE IF EXISTS `tbl_makar_temp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_makar_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_ktp` varchar(16) DEFAULT NULL,
  `nik_krishand` varchar(50) DEFAULT NULL,
  `no_scan` varchar(6) NOT NULL DEFAULT '',
  `npwp` varchar(255) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `alamat_ktp` varchar(500) DEFAULT NULL,
  `alamat_domisili` varchar(255) DEFAULT NULL,
  `alamat_npwp` varchar(255) DEFAULT NULL,
  `kecamatan_domisili` varchar(128) DEFAULT NULL,
  `kabupaten_domisili` varchar(128) DEFAULT NULL,
  `kode_pos` varchar(255) DEFAULT NULL,
  `status_rumah` varchar(255) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL COMMENT 'L = Laki-Laki, P = Perempuan',
  `status_kel` varchar(5) DEFAULT NULL,
  `nama_sekolah` varchar(255) DEFAULT NULL,
  `pendidikan` varchar(10) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `ipk` varchar(11) DEFAULT NULL,
  `gol_darah` varchar(10) DEFAULT NULL,
  `email_pribadi` varchar(128) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `pengalaman_kerja` varchar(500) DEFAULT NULL,
  `keterampilan_khusus` varchar(500) DEFAULT NULL,
  `tgl_masuk` date NOT NULL,
  `status_karyawan` varchar(50) DEFAULT NULL,
  `tgl_tetap` date NOT NULL,
  `golongan` varchar(255) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `bagian` varchar(50) DEFAULT NULL,
  `atasan1` varchar(128) DEFAULT NULL,
  `atasan2` varchar(128) DEFAULT NULL,
  `no_bpjs_tk` varchar(128) DEFAULT NULL,
  `no_bpjs_kes` varchar(128) DEFAULT NULL,
  `status_aktif` varchar(1) DEFAULT NULL COMMENT '1 = Aktif, 2 = Tidak Aktif',
  `tgl_resign` date NOT NULL,
  `kode_jabatan` varchar(10) DEFAULT NULL,
  `nama_jabatan` varchar(255) DEFAULT NULL,
  `pot_cuti` int(255) DEFAULT NULL,
  `sisa_cuti` int(255) DEFAULT NULL,
  `tgl_surat_resign` date NOT NULL,
  `gaji` varchar(255) DEFAULT NULL,
  `ukuran_baju_polo` varchar(255) DEFAULT NULL,
  `ukuran_baju_shirt` varchar(255) DEFAULT NULL,
  `disabled_ub` varchar(255) DEFAULT NULL,
  `kartu_keluarga` varchar(255) DEFAULT NULL,
  `ttd` mediumtext DEFAULT NULL,
  `masa_berlaku_ktp` date DEFAULT NULL,
  `RT` varchar(10) DEFAULT NULL,
  `RW` varchar(10) DEFAULT NULL,
  `status_seragam` varchar(100) DEFAULT NULL,
  `tgl_seragam` date DEFAULT NULL,
  `status_verifikasi` varchar(100) DEFAULT NULL,
  `tgl_verif` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`no_scan`),
  KEY `agama` (`agama`) USING BTREE,
  KEY `alamat_domisili` (`alamat_domisili`) USING BTREE,
  KEY `alamat_ktp` (`alamat_ktp`) USING BTREE,
  KEY `alamat_npwp` (`alamat_npwp`) USING BTREE,
  KEY `atasan1` (`atasan1`) USING BTREE,
  KEY `atasan2` (`atasan2`) USING BTREE,
  KEY `bagian` (`bagian`) USING BTREE,
  KEY `dept` (`dept`) USING BTREE,
  KEY `email_pribadi` (`email_pribadi`) USING BTREE,
  KEY `gol_darah` (`gol_darah`) USING BTREE,
  KEY `golongan` (`golongan`) USING BTREE,
  KEY `ipk` (`ipk`) USING BTREE,
  KEY `jabatan` (`jabatan`) USING BTREE,
  KEY `jenis_kelamin` (`jenis_kelamin`) USING BTREE,
  KEY `jurusan` (`jurusan`) USING BTREE,
  KEY `kabupaten_domisili` (`kabupaten_domisili`) USING BTREE,
  KEY `kecamatan_domisili` (`kecamatan_domisili`) USING BTREE,
  KEY `keterampilan_khusus` (`keterampilan_khusus`) USING BTREE,
  KEY `kode_jabatan` (`kode_jabatan`) USING BTREE,
  KEY `nama` (`nama`) USING BTREE,
  KEY `nama_jabatan` (`nama_jabatan`) USING BTREE,
  KEY `no_bpjs_kes` (`no_bpjs_kes`) USING BTREE,
  KEY `no_bpjs_tk` (`no_bpjs_tk`) USING BTREE,
  KEY `no_hp` (`no_hp`) USING BTREE,
  KEY `no_ktp` (`no_ktp`) USING BTREE,
  KEY `no_scan` (`no_scan`) USING BTREE,
  KEY `npwp` (`npwp`) USING BTREE,
  KEY `pendidikan` (`pendidikan`) USING BTREE,
  KEY `pengalaman_kerja` (`pengalaman_kerja`) USING BTREE,
  KEY `status_aktif` (`status_aktif`) USING BTREE,
  KEY `status_karyawan` (`status_karyawan`) USING BTREE,
  KEY `status_kel` (`status_kel`) USING BTREE,
  KEY `tempat_lahir` (`tempat_lahir`) USING BTREE,
  KEY `tgl_lahir` (`tgl_lahir`) USING BTREE,
  KEY `tgl_masuk` (`tgl_masuk`) USING BTREE,
  KEY `tgl_resign` (`tgl_resign`) USING BTREE,
  KEY `tgl_tetap` (`tgl_tetap`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_makar_temp`
--

LOCK TABLES `tbl_makar_temp` WRITE;
/*!40000 ALTER TABLE `tbl_makar_temp` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_makar_temp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pilihan_answer`
--

DROP TABLE IF EXISTS `tbl_pilihan_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pilihan_answer` (
  `id_pilihan` int(11) NOT NULL AUTO_INCREMENT,
  `type_pilihan` varchar(191) NOT NULL,
  `value_pilihan` varchar(191) NOT NULL,
  PRIMARY KEY (`id_pilihan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pilihan_answer`
--

LOCK TABLES `tbl_pilihan_answer` WRITE;
/*!40000 ALTER TABLE `tbl_pilihan_answer` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pilihan_answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_question`
--

DROP TABLE IF EXISTS `tbl_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_question` (
  `id_question` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `id_jenis_jawaban` int(11) NOT NULL,
  `id_kategori_question` int(11) NOT NULL,
  `title_quest` varchar(50) NOT NULL,
  PRIMARY KEY (`id_question`),
  KEY `id_jenis_jawaban` (`id_jenis_jawaban`) USING BTREE,
  KEY `id_kategori_question` (`id_kategori_question`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_question`
--

LOCK TABLES `tbl_question` WRITE;
/*!40000 ALTER TABLE `tbl_question` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_training`
--

DROP TABLE IF EXISTS `tbl_training`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_training` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_scan` int(6) NOT NULL,
  `kode_training` varchar(255) DEFAULT NULL,
  `tgl_training` varchar(20) DEFAULT NULL,
  `durasi_jam` int(4) DEFAULT NULL,
  `trainer` int(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `durasi_jam` (`durasi_jam`) USING BTREE,
  KEY `kode_training` (`kode_training`) USING BTREE,
  KEY `no_scan` (`no_scan`) USING BTREE,
  KEY `tgl_training` (`tgl_training`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_training`
--

LOCK TABLES `tbl_training` WRITE;
/*!40000 ALTER TABLE `tbl_training` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_training` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `todolist`
--

DROP TABLE IF EXISTS `todolist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `todolist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` date DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tugas` varchar(1000) DEFAULT NULL,
  `tgl_target` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `tgl_aktual` date DEFAULT NULL,
  `ket_status` varchar(500) DEFAULT NULL,
  `point_plus` int(3) DEFAULT NULL,
  `point_min` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `todolist`
--

LOCK TABLES `todolist` WRITE;
/*!40000 ALTER TABLE `todolist` DISABLE KEYS */;
/*!40000 ALTER TABLE `todolist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `training`
--

DROP TABLE IF EXISTS `training`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `training` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_training` varchar(255) DEFAULT NULL,
  `dept` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `training`
--

LOCK TABLES `training` WRITE;
/*!40000 ALTER TABLE `training` DISABLE KEYS */;
/*!40000 ALTER TABLE `training` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `training_needs_analiysis`
--

DROP TABLE IF EXISTS `training_needs_analiysis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `training_needs_analiysis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_training` int(11) DEFAULT NULL,
  `dept` varchar(20) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `bulan` varchar(5) DEFAULT NULL,
  `mingguke` varchar(10) DEFAULT NULL,
  `no_scan` varchar(10) DEFAULT NULL,
  `diajukan_oleh_nama` varchar(255) DEFAULT NULL,
  `diajukan_oleh_jabatan` varchar(255) DEFAULT NULL,
  `diajukan_oleh_tanggal` date DEFAULT NULL,
  `diketahui_oleh_nama` varchar(255) DEFAULT NULL,
  `diketahui_oleh_jabatan` varchar(255) DEFAULT NULL,
  `diketahui_oleh_tanggal` date DEFAULT NULL,
  `disetujui_oleh_nama` varchar(255) DEFAULT NULL,
  `disetujui_oleh_jabatan` varchar(255) DEFAULT NULL,
  `disetujui_oleh_tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `training_needs_analiysis`
--

LOCK TABLES `training_needs_analiysis` WRITE;
/*!40000 ALTER TABLE `training_needs_analiysis` DISABLE KEYS */;
/*!40000 ALTER TABLE `training_needs_analiysis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `training_program`
--

DROP TABLE IF EXISTS `training_program`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `training_program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_training` int(255) DEFAULT NULL,
  `tanggal_training` date DEFAULT NULL,
  `dept` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `training_program`
--

LOCK TABLES `training_program` WRITE;
/*!40000 ALTER TABLE `training_program` DISABLE KEYS */;
/*!40000 ALTER TABLE `training_program` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unit`
--

DROP TABLE IF EXISTS `unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unit`
--

LOCK TABLES `unit` WRITE;
/*!40000 ALTER TABLE `unit` DISABLE KEYS */;
/*!40000 ALTER TABLE `unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  `special_user` int(1) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `logged` int(1) DEFAULT NULL,
  `logged_tdl` int(1) DEFAULT NULL,
  `logged_reqApp` int(1) DEFAULT NULL,
  `dept` varchar(128) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'test','test1@indotaichen.com','profile1.png','$2y$10$L/pRK72QdYAksfVBsLOAfebgpqN4Jxpew8HA1pXNcI6Piuqfjzpjq',4,1,NULL,1713840937,0,NULL,NULL,'YND','HRIS'),(2,'Admin','test2@indotaichen.com','profile2.png','$2y$10$f3cTXPS2lPKMPMkOwA4JGuZIMoY5/9CmJOUlhEOtpRlW8KiXCIaW.',5,1,1,1553757305,1,1,NULL,'HRD','HRIS'),(3,'user','user1@indotaichen.com','profile1.png','$2y$10$f3cTXPS2lPKMPMkOwA4JGuZIMoY5/9CmJOUlhEOtpRlW8KiXCIaW.',6,1,NULL,1557469921,0,NULL,NULL,'KNT','HRIS');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_access_menu`
--

DROP TABLE IF EXISTS `user_access_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_access_menu`
--

LOCK TABLES `user_access_menu` WRITE;
/*!40000 ALTER TABLE `user_access_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_access_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_access_menu_tdl`
--

DROP TABLE IF EXISTS `user_access_menu_tdl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_access_menu_tdl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_access_menu_tdl`
--

LOCK TABLES `user_access_menu_tdl` WRITE;
/*!40000 ALTER TABLE `user_access_menu_tdl` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_access_menu_tdl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_menu`
--

DROP TABLE IF EXISTS `user_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_menu`
--

LOCK TABLES `user_menu` WRITE;
/*!40000 ALTER TABLE `user_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_menu_tdl`
--

DROP TABLE IF EXISTS `user_menu_tdl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_menu_tdl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_menu_tdl`
--

LOCK TABLES `user_menu_tdl` WRITE;
/*!40000 ALTER TABLE `user_menu_tdl` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_menu_tdl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_option_menu`
--

DROP TABLE IF EXISTS `user_option_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_option_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `js` varchar(128) DEFAULT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_option_menu`
--

LOCK TABLES `user_option_menu` WRITE;
/*!40000 ALTER TABLE `user_option_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_option_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role_tdl`
--

DROP TABLE IF EXISTS `user_role_tdl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_role_tdl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role_tdl`
--

LOCK TABLES `user_role_tdl` WRITE;
/*!40000 ALTER TABLE `user_role_tdl` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_role_tdl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_sub_menu`
--

DROP TABLE IF EXISTS `user_sub_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_sub_menu`
--

LOCK TABLES `user_sub_menu` WRITE;
/*!40000 ALTER TABLE `user_sub_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_sub_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_sub_menu_tdl`
--

DROP TABLE IF EXISTS `user_sub_menu_tdl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_sub_menu_tdl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_sub_menu_tdl`
--

LOCK TABLES `user_sub_menu_tdl` WRITE;
/*!40000 ALTER TABLE `user_sub_menu_tdl` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_sub_menu_tdl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vpot_table_answer`
--

DROP TABLE IF EXISTS `vpot_table_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vpot_table_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_scan` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `id_answer` int(11) NOT NULL,
  `answer` text DEFAULT NULL,
  `explanation` text DEFAULT NULL,
  `title_quest` varchar(191) NOT NULL,
  `tgl_pengisian` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vpot_table_answer`
--

LOCK TABLES `vpot_table_answer` WRITE;
/*!40000 ALTER TABLE `vpot_table_answer` DISABLE KEYS */;
/*!40000 ALTER TABLE `vpot_table_answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vpot_table_form`
--

DROP TABLE IF EXISTS `vpot_table_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vpot_table_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_question` int(11) NOT NULL,
  `a_choice` int(11) DEFAULT NULL,
  `b_choice` int(11) DEFAULT NULL,
  `c_choice` int(11) DEFAULT NULL,
  `d_choice` int(11) DEFAULT NULL,
  `title_quest` varchar(191) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `a_choice` (`a_choice`) USING BTREE,
  KEY `b_choice` (`b_choice`) USING BTREE,
  KEY `c_choice` (`c_choice`) USING BTREE,
  KEY `d_choice` (`d_choice`) USING BTREE,
  KEY `id_question` (`id_question`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vpot_table_form`
--

LOCK TABLES `vpot_table_form` WRITE;
/*!40000 ALTER TABLE `vpot_table_form` DISABLE KEYS */;
/*!40000 ALTER TABLE `vpot_table_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wewenang`
--

DROP TABLE IF EXISTS `wewenang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wewenang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jobdesc` int(255) DEFAULT NULL,
  `wewenang` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wewenang`
--

LOCK TABLES `wewenang` WRITE;
/*!40000 ALTER TABLE `wewenang` DISABLE KEYS */;
/*!40000 ALTER TABLE `wewenang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'hrd2'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-26 16:14:31

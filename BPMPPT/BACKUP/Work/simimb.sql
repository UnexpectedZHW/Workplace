-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 24, 2016 at 10:49 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simimb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ref_idx_fungsi`
--

CREATE TABLE IF NOT EXISTS `ref_idx_fungsi` (
  `ref_idx_fungsi_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nama_fungsi` varchar(128) DEFAULT NULL,
  `indeks_fungsi` decimal(18,0) DEFAULT NULL,
  `nama_singkat` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`ref_idx_fungsi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ref_idx_kegiatan`
--

CREATE TABLE IF NOT EXISTS `ref_idx_kegiatan` (
  `ref_idx_kegiatan_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(128) DEFAULT NULL,
  `index_kegiatan` decimal(18,0) DEFAULT NULL,
  PRIMARY KEY (`ref_idx_kegiatan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ref_idx_kepemilikan`
--

CREATE TABLE IF NOT EXISTS `ref_idx_kepemilikan` (
  `ref_idx_kepemilikan_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nama_kepemilikan` varchar(128) DEFAULT NULL,
  `indeks_kepemilikan` decimal(18,0) DEFAULT NULL,
  PRIMARY KEY (`ref_idx_kepemilikan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ref_idx_kompleksitas`
--

CREATE TABLE IF NOT EXISTS `ref_idx_kompleksitas` (
  `ref_idx_kompleksitas_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nama_kompleksitas` varchar(128) DEFAULT NULL,
  `indeks_kompleksitas` decimal(18,0) DEFAULT NULL,
  PRIMARY KEY (`ref_idx_kompleksitas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ref_idx_parameter`
--

CREATE TABLE IF NOT EXISTS `ref_idx_parameter` (
  `ref_idx_parameter_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nama_parameter` varchar(128) DEFAULT NULL,
  `indeks_parameter` decimal(18,0) DEFAULT NULL,
  PRIMARY KEY (`ref_idx_parameter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ref_idx_permanensi`
--

CREATE TABLE IF NOT EXISTS `ref_idx_permanensi` (
  `ref_idx_permanensi_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nama_permanensi` varchar(128) DEFAULT NULL,
  `indeks_permanensi` decimal(18,0) DEFAULT NULL,
  PRIMARY KEY (`ref_idx_permanensi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ref_idx_resiko_kebakaran`
--

CREATE TABLE IF NOT EXISTS `ref_idx_resiko_kebakaran` (
  `ref_idx_resiko_kebakaran_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nama_resiko_kebakaran` varchar(128) DEFAULT NULL,
  `indeks_resiko_kebakaran` decimal(18,0) DEFAULT NULL,
  PRIMARY KEY (`ref_idx_resiko_kebakaran_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ref_idx_waktu_kepemilikan`
--

CREATE TABLE IF NOT EXISTS `ref_idx_waktu_kepemilikan` (
  `ref_idx_waktu_kepemilikan_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nama_waktu_kepemilikan` varchar(128) DEFAULT NULL,
  `indeks_kepemilikan` decimal(18,0) DEFAULT NULL,
  PRIMARY KEY (`ref_idx_waktu_kepemilikan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ref_idx_waktu_penggunaan`
--

CREATE TABLE IF NOT EXISTS `ref_idx_waktu_penggunaan` (
  `ref_idx_waktu_penggunaan_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nama_waktu` varchar(128) DEFAULT NULL,
  `indeks_waktu_penggunaan` decimal(18,0) DEFAULT NULL,
  PRIMARY KEY (`ref_idx_waktu_penggunaan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ref_jenis_sertifikat`
--

CREATE TABLE IF NOT EXISTS `ref_jenis_sertifikat` (
  `ref_jenis_sertifikat_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nama_sertifikat` varchar(128) DEFAULT NULL,
  `singkatan_sertifikat` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`ref_jenis_sertifikat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ref_kabupaten`
--

CREATE TABLE IF NOT EXISTS `ref_kabupaten` (
  `id_kabupaten` int(3) NOT NULL AUTO_INCREMENT,
  `id_provinsi` int(3) NOT NULL,
  `nama_kabupaten` varchar(50) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `lat` double DEFAULT '0',
  `lon` double DEFAULT '0',
  PRIMARY KEY (`id_kabupaten`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ref_kabupaten`
--

INSERT INTO `ref_kabupaten` (`id_kabupaten`, `id_provinsi`, `nama_kabupaten`, `fullname`, `lat`, `lon`) VALUES
(1, 11, 'ACEH SELATAN', 'South Aceh, Aceh, Indonesia', 3.3115056, 97.3516558),
(2, 11, 'ACEH SINGKIL', 'Aceh Singkil, Aceh, Indonesia', 2.3589459, 97.87216),
(3, 11, 'BIREUEN', 'Bireuen, Aceh, Indonesia', 5.2016818, 96.702341),
(5, 12, 'XYZ', 'Xyz, Def', 0.123, 9.876);

-- --------------------------------------------------------

--
-- Table structure for table `ref_kecamatan`
--

CREATE TABLE IF NOT EXISTS `ref_kecamatan` (
  `id_provinsi` int(3) NOT NULL,
  `id_kabupaten` int(3) NOT NULL,
  `id_kecamatan` int(3) NOT NULL AUTO_INCREMENT,
  `nama_kecamatan` varchar(50) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `lat` double DEFAULT '0',
  `lon` double DEFAULT '0',
  PRIMARY KEY (`id_kecamatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ref_kecamatan`
--

INSERT INTO `ref_kecamatan` (`id_provinsi`, `id_kabupaten`, `id_kecamatan`, `nama_kecamatan`, `fullname`, `lat`, `lon`) VALUES
(11, 1, 1, 'BAKONGAN', 'Bakongan, South Aceh, Aceh, Indonesia', 2.9622427, 97.4705935),
(11, 1, 2, 'PASI RAJA', NULL, 0, 0),
(11, 1, 3, 'LABUHAN HAJI TIMUR', NULL, 0, 0),
(11, 2, 4, 'LAWE ALAS', NULL, 0, 0),
(11, 2, 5, 'SEMADAM', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ref_provinsi`
--

CREATE TABLE IF NOT EXISTS `ref_provinsi` (
  `id_provinsi` int(3) NOT NULL AUTO_INCREMENT,
  `nama_provinsi` varchar(50) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lon` double DEFAULT NULL,
  PRIMARY KEY (`id_provinsi`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `ref_provinsi`
--

INSERT INTO `ref_provinsi` (`id_provinsi`, `nama_provinsi`, `fullname`, `lat`, `lon`) VALUES
(11, 'NANGGROE ACEH DARUSSALAM', 'Aceh, Indonesia', 4.695135, 96.7493993),
(12, 'SUMATERA UTARA', 'North Sumatra, Indonesia', 2.0108563, 98.9784887),
(13, 'SUMATERA BARAT', 'West Sumatra, Indonesia', -0.7399397, 100.8000051),
(14, 'RIAU', 'Riau, Indonesia', 0.2933469, 101.7068294),
(16, 'JAMBI', 'Jambi, Jambi City, Jambi, Indonesia', -1.596672, 103.615799),
(17, 'SUMATERA SELATAN', 'South Sumatra, Indonesia', 0.1, 0.1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `value` longtext,
  `create_date` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT '0',
  `update_date` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemohon`
--

CREATE TABLE IF NOT EXISTS `tbl_pemohon` (
  `tbl_pemohon_id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(128) DEFAULT NULL,
  `nama_pemohon` varchar(128) DEFAULT NULL,
  `tipe_identitas` varchar(16) DEFAULT NULL,
  `no_identitas` varchar(128) DEFAULT NULL,
  `masaberlaku_identitas` date DEFAULT NULL,
  `kewarganegaraan` varchar(45) DEFAULT NULL,
  `alamat` varchar(1024) DEFAULT NULL,
  `ref_provinsi_id` smallint(6) DEFAULT NULL,
  `ref_kecamatan_id` smallint(6) DEFAULT NULL,
  `ref_desa_id` smallint(6) DEFAULT NULL,
  `ref_pedukuhan_id` smallint(6) DEFAULT NULL,
  `no_telp` varchar(45) DEFAULT NULL,
  `no_hp` varchar(45) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`tbl_pemohon_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `_perm_data`
--

CREATE TABLE IF NOT EXISTS `_perm_data` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `permKey` varchar(30) NOT NULL,
  `permName` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `permKey` (`permKey`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `_perm_data`
--

INSERT INTO `_perm_data` (`ID`, `permKey`, `permName`) VALUES
(1, 'provinsi_view', 'Provinsi View'),
(2, 'provinsi_add', 'Provinsi Add'),
(3, 'provinsi_edit', 'Provinsi Edit'),
(4, 'provinsi_del', 'Provinsi Delete'),
(5, 'kabupaten_view', 'Kabupaten View'),
(6, 'kabupaten_add', 'Kabupaten Add'),
(7, 'kabupaten_edit', 'Kabupaten Edit'),
(8, 'kabupaten_del', 'Kabupaten Delete'),
(9, 'kecamatan_view', 'Kecamatan View'),
(10, 'kecamatan_add', 'Kecamatan Add'),
(11, 'kecamatan_edit', 'Kecamatan Edit'),
(12, 'kecamatan_del', 'Kecamatan Delete');

-- --------------------------------------------------------

--
-- Table structure for table `_role_data`
--

CREATE TABLE IF NOT EXISTS `_role_data` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `rolename` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `_role_data_rolename` (`rolename`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `_role_data`
--

INSERT INTO `_role_data` (`id`, `rolename`) VALUES
(1, 'Admin All');

-- --------------------------------------------------------

--
-- Table structure for table `_role_perms`
--

CREATE TABLE IF NOT EXISTS `_role_perms` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `roleid` bigint(20) NOT NULL,
  `permid` bigint(20) NOT NULL,
  `value` decimal(3,0) NOT NULL DEFAULT '0',
  `adddate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `_role_perms_roleid` (`roleid`),
  KEY `_role_perms_permid` (`permid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `_role_perms`
--

INSERT INTO `_role_perms` (`id`, `roleid`, `permid`, `value`, `adddate`) VALUES
(13, 1, 2, '1', '0000-00-00 00:00:00'),
(14, 1, 4, '1', '0000-00-00 00:00:00'),
(15, 1, 3, '1', '0000-00-00 00:00:00'),
(16, 1, 1, '1', '0000-00-00 00:00:00'),
(17, 1, 6, '1', '0000-00-00 00:00:00'),
(18, 1, 8, '1', '0000-00-00 00:00:00'),
(19, 1, 7, '1', '0000-00-00 00:00:00'),
(20, 1, 5, '1', '0000-00-00 00:00:00'),
(21, 1, 10, '1', '0000-00-00 00:00:00'),
(22, 1, 12, '1', '0000-00-00 00:00:00'),
(23, 1, 11, '1', '0000-00-00 00:00:00'),
(24, 1, 9, '1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `_user_data`
--

CREATE TABLE IF NOT EXISTS `_user_data` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` longtext NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dateadded` datetime NOT NULL,
  `is_superadmin` int(11) NOT NULL DEFAULT '0',
  `lastlog` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `_user_data_username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `_user_data`
--

INSERT INTO `_user_data` (`id`, `username`, `password`, `name`, `email`, `dateadded`, `is_superadmin`, `lastlog`) VALUES
(1, 'su', '21232f297a57a5a743894a0e4a801fc3', 'Super Admin', NULL, '2016-01-13 00:00:00', 1, '2016-01-13 00:00:00'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin Keren', 'admin@localhost.com', '0000-00-00 00:00:00', 0, '2016-01-13 11:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `_user_perms`
--

CREATE TABLE IF NOT EXISTS `_user_perms` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) NOT NULL,
  `permid` bigint(20) NOT NULL,
  `value` decimal(3,0) NOT NULL DEFAULT '0',
  `adddate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `_user_perms_useridpermid` (`userid`,`permid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `_user_roles`
--

CREATE TABLE IF NOT EXISTS `_user_roles` (
  `userid` bigint(20) NOT NULL,
  `roleid` bigint(20) NOT NULL,
  `adddate` datetime DEFAULT NULL,
  PRIMARY KEY (`userid`,`roleid`),
  KEY `_user_roles_roleid` (`roleid`),
  KEY `_user_roles_userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `_user_roles`
--

INSERT INTO `_user_roles` (`userid`, `roleid`, `adddate`) VALUES
(2, 1, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

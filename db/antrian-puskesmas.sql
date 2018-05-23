# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.2.12-MariaDB)
# Database: antrian-puskesmas
# Generation Time: 2018-05-23 16:51:17 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table admin
# ------------------------------------------------------------

CREATE TABLE `admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL DEFAULT '',
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL DEFAULT '',
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;

INSERT INTO `admin` (`id`, `nama`, `alamat`, `no_hp`, `email`)
VALUES
	(2,'Administrators','JL Terusan Bendungan Sigura-gura D167 Malangs','082228069297','admins@gmail.com');

/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table antrian
# ------------------------------------------------------------

CREATE TABLE `antrian` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_poli` int(10) unsigned NOT NULL,
  `id_pasien` int(10) unsigned DEFAULT NULL,
  `w_antrian` datetime DEFAULT NULL,
  `no_antrian` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `antrian` WRITE;
/*!40000 ALTER TABLE `antrian` DISABLE KEYS */;

INSERT INTO `antrian` (`id`, `id_poli`, `id_pasien`, `w_antrian`, `no_antrian`)
VALUES
	(2,2,5,'2018-05-02 16:51:11',1),
	(3,2,1,'2018-05-02 18:05:22',1),
	(4,2,1,'2018-05-02 18:05:24',1),
	(5,1,5,'2018-05-02 18:09:40',1),
	(6,4,5,'2018-05-02 18:24:35',1),
	(7,2,5,'2018-05-02 18:26:19',1),
	(8,3,5,'2018-05-02 18:28:07',1),
	(9,1,5,'2018-05-09 16:43:31',1),
	(10,3,6,'2018-05-10 12:30:00',1),
	(11,2,1,'2018-05-19 17:53:31',1),
	(12,2,2,'2018-05-19 17:53:38',1),
	(13,2,2,'2018-05-20 00:55:51',1),
	(14,2,2,'2018-05-20 00:56:00',2),
	(15,2,1,'2018-05-20 00:58:47',3),
	(16,2,2,'2018-05-20 00:58:50',4),
	(17,2,2,'2018-05-20 01:00:45',5),
	(19,2,NULL,'2018-05-20 01:33:43',7),
	(20,2,NULL,'2018-05-20 01:37:02',8),
	(22,1,NULL,'2018-05-20 01:56:24',1),
	(23,1,NULL,'2018-05-20 01:56:26',2),
	(24,1,NULL,'2018-05-20 01:56:35',3),
	(25,3,NULL,'2018-05-20 01:56:40',1),
	(26,1,NULL,'2018-05-20 01:58:24',4),
	(27,2,NULL,'2018-05-20 02:10:28',9),
	(28,2,NULL,'2018-05-20 02:10:30',10),
	(29,1,NULL,'2018-05-20 02:10:36',5),
	(30,1,NULL,'2018-05-20 02:11:23',6),
	(31,2,NULL,'2018-05-20 02:12:03',11),
	(32,1,NULL,'2018-05-20 02:13:14',7),
	(33,1,NULL,'2018-05-20 02:13:27',8),
	(34,1,NULL,'2018-05-20 02:16:28',9),
	(35,1,NULL,'2018-05-20 02:18:24',10),
	(36,1,NULL,'2018-05-20 02:19:09',11),
	(37,1,NULL,'2018-05-20 02:19:20',12),
	(38,1,NULL,'2018-05-20 02:19:47',13),
	(39,1,NULL,'2018-05-20 02:20:25',14),
	(40,1,NULL,'2018-05-20 02:21:00',15),
	(41,1,NULL,'2018-05-20 02:22:32',16),
	(42,1,NULL,'2018-05-20 02:23:18',17),
	(43,5,NULL,'2018-05-20 02:24:45',1),
	(44,2,NULL,'2018-05-20 02:24:53',12),
	(45,3,NULL,'2018-05-20 02:25:02',2),
	(46,3,NULL,'2018-05-20 02:25:07',3),
	(47,2,NULL,'2018-05-20 02:25:15',13),
	(48,3,NULL,'2018-05-20 02:25:19',4),
	(49,2,NULL,'2018-05-20 02:25:43',14),
	(50,1,NULL,'2018-05-20 02:25:49',18),
	(51,2,NULL,'2018-05-20 02:27:28',15),
	(52,3,NULL,'2018-05-20 02:27:35',5),
	(53,5,NULL,'2018-05-20 02:27:40',2),
	(54,2,NULL,'2018-05-21 15:11:31',1);

/*!40000 ALTER TABLE `antrian` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table apoteker
# ------------------------------------------------------------

CREATE TABLE `apoteker` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL DEFAULT '',
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `apoteker` WRITE;
/*!40000 ALTER TABLE `apoteker` DISABLE KEYS */;

INSERT INTO `apoteker` (`id`, `nama`, `alamat`, `no_hp`, `email`)
VALUES
	(1,'Apotekers','Alamat Apotekers','082123212314','apotekers@gmail.com');

/*!40000 ALTER TABLE `apoteker` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table detail_resep_dokter
# ------------------------------------------------------------

CREATE TABLE `detail_resep_dokter` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_resep` int(10) unsigned NOT NULL,
  `nama_obat` varchar(255) NOT NULL DEFAULT '',
  `dosis` varchar(100) NOT NULL DEFAULT '',
  `harga` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table masyarakat
# ------------------------------------------------------------

CREATE TABLE `masyarakat` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL DEFAULT '',
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `kelamin` char(2) NOT NULL DEFAULT 'L',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `masyarakat` WRITE;
/*!40000 ALTER TABLE `masyarakat` DISABLE KEYS */;

INSERT INTO `masyarakat` (`id`, `nama`, `alamat`, `no_hp`, `email`, `kelamin`)
VALUES
	(1,'Dhimas Atha','JL Bunga Coklat 20 Malang','082228069292','athasamid@gmail.com','L');

/*!40000 ALTER TABLE `masyarakat` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pasien
# ------------------------------------------------------------

CREATE TABLE `pasien` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL DEFAULT '',
  `alamat` text NOT NULL,
  `kelamin` char(2) NOT NULL DEFAULT 'L',
  `tgl_lahir` date NOT NULL DEFAULT '0000-00-00',
  `tempat_lahir` varchar(100) NOT NULL DEFAULT '',
  `no_askes` varchar(100) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `id_masyarakat` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `pasien` WRITE;
/*!40000 ALTER TABLE `pasien` DISABLE KEYS */;

INSERT INTO `pasien` (`id`, `nama`, `alamat`, `kelamin`, `tgl_lahir`, `tempat_lahir`, `no_askes`, `no_telp`, `id_masyarakat`)
VALUES
	(5,'Dhimas Atha Abdillah','JL Terusan Bendungan Sigura-gura Blok D167 Malang','L','1995-06-06','Bojonegoro','3522150606950005','082228069292',1),
	(6,'G. W Arini','JL Bromo 30 Malang','P','1997-01-03','Kediri',NULL,'082228069293',1);

/*!40000 ALTER TABLE `pasien` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table poli
# ------------------------------------------------------------

DROP TABLE IF EXISTS `poli`;

CREATE TABLE `poli` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL DEFAULT '',
  `icon` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `poli` WRITE;
/*!40000 ALTER TABLE `poli` DISABLE KEYS */;

INSERT INTO `poli` (`id`, `nama`, `icon`)
VALUES
	(1,'POLI ANAK','images/icon-p.anak.png'),
	(2,'POLI GIGI','images/icon-p.gigi.png'),
	(3,'POLI UMUM','images/icon-p.umum.png'),
	(4,'POLI MATA','images/icon-mcu.png'),
	(5,'POLI THT','images/icon-p.bedah.png');

/*!40000 ALTER TABLE `poli` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table poli_dilayani
# ------------------------------------------------------------

CREATE TABLE `poli_dilayani` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_poli` int(10) unsigned NOT NULL,
  `waktu` date NOT NULL,
  `antrian` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `poli_dilayani` WRITE;
/*!40000 ALTER TABLE `poli_dilayani` DISABLE KEYS */;

INSERT INTO `poli_dilayani` (`id`, `id_poli`, `waktu`, `antrian`)
VALUES
	(1,3,'2018-05-10',30),
	(2,2,'2018-05-20',4),
	(3,1,'2018-05-20',17);

/*!40000 ALTER TABLE `poli_dilayani` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table resep_dokter
# ------------------------------------------------------------

CREATE TABLE `resep_dokter` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_antrian` int(10) unsigned NOT NULL,
  `nama_dokter` varchar(255) DEFAULT NULL,
  `nama_apoteker` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `id_pemilik` int(10) unsigned NOT NULL,
  `jenis_pemilik` varchar(100) NOT NULL DEFAULT '',
  `fcm_id` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `username`, `password`, `id_pemilik`, `jenis_pemilik`, `fcm_id`)
VALUES
	(1,'athasamid','$2y$10$Bkm3b6.39FBrkA5S/4tCSOjmYcf9MqlVC3PDTpKIW3ZjIVBLssAS6',1,'masyarakat',NULL),
	(3,'admin','$2y$10$yTkqEyLQQe/GVBxClHArR.KrtQwxH8J8pVkR7MjoXoNbnNUSczzmK',2,'admin',NULL),
	(7,'apoteker','$2y$10$56hpk5ACNr/Cs5/.HxpUNOnKrOvrO1BuQG25UhODehinhSZ8WBbku',1,'apoteker',NULL);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

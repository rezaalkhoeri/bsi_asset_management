-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.4.13-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win64
-- HeidiSQL Versi:               9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Membuang struktur basisdata untuk asset_management
CREATE DATABASE IF NOT EXISTS `asset_management` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `asset_management`;

-- membuang struktur untuk table asset_management.tb_detail_item
CREATE TABLE IF NOT EXISTS `tb_detail_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_item` int(11) NOT NULL,
  `serial_number` varchar(45) NOT NULL,
  `asset_number` varchar(45) NOT NULL,
  `value_price` varchar(45) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `condition` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel asset_management.tb_detail_item: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_detail_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_detail_item` ENABLE KEYS */;

-- membuang struktur untuk table asset_management.tb_detail_tiket
CREATE TABLE IF NOT EXISTS `tb_detail_tiket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tiket` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel asset_management.tb_detail_tiket: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_detail_tiket` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_detail_tiket` ENABLE KEYS */;

-- membuang struktur untuk table asset_management.tb_item
CREATE TABLE IF NOT EXISTS `tb_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(45) NOT NULL,
  `merek` varchar(45) NOT NULL,
  `stok` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel asset_management.tb_item: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_item` ENABLE KEYS */;

-- membuang struktur untuk table asset_management.tb_log_activity
CREATE TABLE IF NOT EXISTS `tb_log_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT 0,
  `action` varchar(45) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel asset_management.tb_log_activity: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_log_activity` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_log_activity` ENABLE KEYS */;

-- membuang struktur untuk table asset_management.tb_lokasi
CREATE TABLE IF NOT EXISTS `tb_lokasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lokasi` varchar(45) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel asset_management.tb_lokasi: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_lokasi` DISABLE KEYS */;
INSERT INTO `tb_lokasi` (`id`, `nama_lokasi`, `deskripsi`, `created_at`, `updated_at`) VALUES
	(1, 'Kantor Cabang 1', 'Jakarta', '2021-11-18 13:56:43', '2021-11-18 13:56:43'),
	(2, 'Kantor Cabang 2', 'Semarang', '2021-11-18 13:56:54', '2021-11-18 13:56:54'),
	(3, 'Kantor Cabang 3', 'Tegal', '2021-11-18 13:57:07', '2021-11-18 13:57:07');
/*!40000 ALTER TABLE `tb_lokasi` ENABLE KEYS */;

-- membuang struktur untuk table asset_management.tb_tiket
CREATE TABLE IF NOT EXISTS `tb_tiket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_tiket` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel asset_management.tb_tiket: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_tiket` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_tiket` ENABLE KEYS */;

-- membuang struktur untuk table asset_management.tb_tr_distribution
CREATE TABLE IF NOT EXISTS `tb_tr_distribution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_requisition` int(11) NOT NULL,
  `transactionCode` varchar(50) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `recipient` varchar(50) NOT NULL,
  `giver` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel asset_management.tb_tr_distribution: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_tr_distribution` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_tr_distribution` ENABLE KEYS */;

-- membuang struktur untuk table asset_management.tb_tr_procurement
CREATE TABLE IF NOT EXISTS `tb_tr_procurement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tiket` int(11) NOT NULL,
  `transactionCode` varchar(50) NOT NULL,
  `payment_method` varchar(45) NOT NULL,
  `deskripsi` text NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel asset_management.tb_tr_procurement: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_tr_procurement` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_tr_procurement` ENABLE KEYS */;

-- membuang struktur untuk table asset_management.tb_tr_requisition
CREATE TABLE IF NOT EXISTS `tb_tr_requisition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tiket` int(11) NOT NULL DEFAULT 0,
  `transactionCode` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost_center` varchar(45) NOT NULL,
  `requestor` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `deskripsi` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel asset_management.tb_tr_requisition: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_tr_requisition` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_tr_requisition` ENABLE KEYS */;

-- membuang struktur untuk table asset_management.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 0,
  `status` varchar(45) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel asset_management.tb_user: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` (`id`, `name`, `email`, `password`, `role_id`, `status`, `created_at`, `updated_at`) VALUES
	(2, 'superadmin', 'superadmin@gmail.com', '0192023a7bbd73250516f069df18b500', 5, '1', '2021-11-18 14:41:27', '2021-11-18 14:41:27');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;

-- membuang struktur untuk table asset_management.tb_user_role
CREATE TABLE IF NOT EXISTS `tb_user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel asset_management.tb_user_role: ~5 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_user_role` DISABLE KEYS */;
INSERT INTO `tb_user_role` (`id`, `role`) VALUES
	(1, 'admin'),
	(2, 'checker'),
	(3, 'manager'),
	(4, 'user'),
	(5, 'superadmin');
/*!40000 ALTER TABLE `tb_user_role` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2022 at 05:28 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `cicilan`
--

CREATE TABLE `cicilan` (
  `id` int(11) NOT NULL,
  `kode_nasabah` varchar(100) DEFAULT NULL,
  `pinjaman_id` int(11) DEFAULT NULL,
  `cicilan_ke` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id` int(11) UNSIGNED NOT NULL,
  `kode_nasabah` varchar(100) DEFAULT NULL,
  `pinjaman_id` int(11) DEFAULT NULL,
  `cicilan_ke` int(11) DEFAULT NULL,
  `jumlah` float DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keanggotaan`
--

CREATE TABLE `keanggotaan` (
  `id` int(11) UNSIGNED NOT NULL,
  `jenis` varchar(100) DEFAULT NULL,
  `simpanan_pokok` int(11) DEFAULT NULL,
  `simpanan_wajib` int(11) DEFAULT NULL,
  `wjb_belanja` int(11) NOT NULL,
  `hr_raya` int(11) NOT NULL,
  `bunga_simpanan` float DEFAULT NULL,
  `bunga_pinjaman` float DEFAULT NULL,
  `denda_pinjaman` float DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keanggotaan`
--

INSERT INTO `keanggotaan` (`id`, `jenis`, `simpanan_pokok`, `simpanan_wajib`, `wjb_belanja`, `hr_raya`, `bunga_simpanan`, `bunga_pinjaman`, `denda_pinjaman`, `keterangan`) VALUES
(1, 'PNS', 10000, 25000, 20000, 50000, 0.5, 1.2, 0, 'PNS'),
(2, 'BLUD', 10000, 25000, 20000, 30000, 0.5, 1.2, 0, 'blud');

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `id` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `departemen` varchar(40) DEFAULT '',
  `alamat` varchar(200) DEFAULT NULL,
  `hp` varchar(50) DEFAULT NULL,
  `keanggotaan_id` int(11) DEFAULT NULL,
  `tgl_masuk` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`id`, `kode`, `nama`, `departemen`, `alamat`, `hp`, `keanggotaan_id`, `tgl_masuk`) VALUES
(2, '1002', 'InAng', '0', 'Tenggilis, Surabaya', '', 1, '03/08/2017'),
(4, '1003', 'ivan', NULL, 'asd', '085647144900', 1, '2022-02-12'),
(5, '1004', 'yoga', NULL, 'asd', '085647144900', 2, '2022-02-12'),
(6, '1006', 'rizky', NULL, 'boyolali', '085647144900', 1, '03/16/2022');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id` int(11) NOT NULL,
  `kode_nasabah` varchar(100) NOT NULL DEFAULT '',
  `jenis` enum('Uang','Barang') NOT NULL,
  `jumlah` int(20) NOT NULL,
  `bunga` float DEFAULT NULL,
  `total_bayar` int(20) DEFAULT NULL,
  `lama` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `preference`
--

CREATE TABLE `preference` (
  `attr` varchar(200) DEFAULT NULL,
  `value` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preference`
--

INSERT INTO `preference` (`attr`, `value`) VALUES
('last_check_bunga', '2022-03-12'),
('kop_text', 'KOPERASI INDONESIA'),
('kop_koperasi', 'koperasi11.jpg'),
('kop_logo', 'Karya_Anak_Bangsa.jpg'),
('alamat', 'Jl. Raya Kalirungkut 7-9');

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `id` int(11) NOT NULL,
  `kode_nasabah` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis` enum('Pokok','Wajib','Sukarela','Bunga','Ambil','Wajib Belanja','Hari Raya') NOT NULL,
  `jumlah` float NOT NULL,
  `sld` float DEFAULT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simpanan`
--

INSERT INTO `simpanan` (`id`, `kode_nasabah`, `tanggal`, `jenis`, `jumlah`, `sld`, `created`) VALUES
(9, '1003', '2022-03-14', 'Wajib', 25000, 40000, 1647258085),
(10, '1003', '2022-03-14', 'Hari Raya', 50000, 75000, 1647258085),
(11, '1003', '2022-03-14', 'Wajib', 25000, 0, 1647258533),
(12, '1003', '2022-03-14', 'Hari Raya', 50000, 150000, 1647258533);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `barang_id` varchar(15) NOT NULL,
  `barang_nama` varchar(150) DEFAULT NULL,
  `barang_satuan` varchar(30) DEFAULT NULL,
  `barang_harpok` double DEFAULT NULL,
  `barang_harjul` double DEFAULT NULL,
  `barang_harjul_grosir` double DEFAULT NULL,
  `barang_stok` int(11) DEFAULT '0',
  `barang_min_stok` int(11) DEFAULT '0',
  `barang_tgl_input` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `barang_tgl_last_update` datetime DEFAULT NULL,
  `barang_kategori_id` int(11) DEFAULT NULL,
  `barang_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`barang_id`, `barang_nama`, `barang_satuan`, `barang_harpok`, `barang_harjul`, `barang_harjul_grosir`, `barang_stok`, `barang_min_stok`, `barang_tgl_input`, `barang_tgl_last_update`, `barang_kategori_id`, `barang_user_id`) VALUES
('089686010343', 'indomie soto ', 'Biji', 2900, 3500, 0, 3, 3, '2022-03-14 19:18:54', NULL, 55, 1),
('089686010947', 'indomie goreng', 'Biji', 3100, 3500, 0, 25, 25, '2022-03-14 19:21:43', NULL, 55, 1),
('089686017717', 'sarimi soto isi 2', 'Biji', 3500, 4000, 0, 6, 6, '2022-03-14 19:24:20', NULL, 55, 1),
('089686017748', 'sarimi goreng kremes', 'Biji', 3500, 4000, 0, 6, 6, '2022-03-14 19:24:59', NULL, 55, 1),
('089686018059', 'sarimi isi 2 ayam bawang', 'Biji', 3500, 4000, 0, 3, 3, '2022-03-14 19:20:00', NULL, 55, 1),
('089686043297', 'indomie sambal matah', 'Biji', 3000, 3500, 0, 6, 6, '2022-03-14 19:23:48', NULL, 55, 1),
('089686043648', 'indomie ayam pop', 'Biji', 3100, 3500, 0, 15, 15, '2022-03-14 19:20:56', NULL, 55, 1),
('089686048704', 'sarimi goreng ayam kecap', 'Biji', 3200, 4000, 0, 6, 6, '2022-03-14 19:15:57', NULL, 55, 1),
('089686060003', 'pop mie ayam bawang', 'Biji', 4500, 6000, 0, 12, 12, '2022-03-14 19:30:43', NULL, 55, 1),
('089686060027', 'pop mie ayam', 'Biji', 4500, 6000, 0, 12, 12, '2022-03-14 19:26:43', NULL, 55, 1),
('089686060126', 'pop mie baso', 'Biji', 4500, 6000, 0, 12, 12, '2022-03-14 19:26:13', NULL, 55, 1),
('089686060362', 'pop mie soto ayam', 'Biji', 4500, 6000, 0, 12, 12, '2022-03-14 19:33:47', NULL, 55, 1),
('089686060744', 'pop mie grg cup', 'Biji', 4500, 6000, 0, 7, 7, '2022-03-14 19:29:49', NULL, 55, 1),
('089686061024', 'pop mie ab 40gr', 'Biji', 3000, 4000, 0, 4, 4, '2022-03-14 19:28:00', NULL, 55, 1),
('089686061079', 'pop mie soto', 'Biji', 3000, 4000, 0, 3, 3, '2022-03-14 19:32:26', NULL, 55, 1),
('089686061123', 'pop mie baso sapi', 'Biji', 3000, 4000, 0, 5, 5, '2022-03-14 19:33:17', NULL, 55, 1),
('089686400526', 'saos if pedas manis', 'Biji', 7000, 8000, 0, 1, 1, '2022-03-15 00:11:08', NULL, 47, 1),
('089686401721', 'saos if tomat', 'Biji', 7000, 8000, 0, 6, 6, '2022-03-15 00:12:06', NULL, 55, 1),
('089686535259', 'sun pisang', 'Biji', 8000, 9000, 0, 3, 3, '2022-03-15 00:29:26', NULL, 55, 1),
('089686590036', 'chiki balls', 'Biji', 900, 1000, 0, 23, 23, '2022-03-14 23:51:49', NULL, 55, 1),
('089686591231', 'chiki balls', 'Biji', 900, 1000, 0, 18, 18, '2022-03-14 23:45:59', NULL, 55, 1),
('089686598018', 'chitato bbq', 'Biji', 2500, 3000, 0, 26, 26, '2022-03-14 22:13:01', NULL, 55, 1),
('089686604443', 'jet z', 'Biji', 900, 1000, 0, 40, 40, '2022-03-14 22:11:54', NULL, 55, 1),
('089686611601', 'q tella 30', 'Biji', 1500, 2000, 0, 7, 7, '2022-03-14 22:28:52', NULL, 55, 1),
('089686723007', 'chiki twist', 'Biji', 900, 1000, 0, 53, 53, '2022-03-14 22:18:29', NULL, 55, 1),
('089686723021', 'chiki twist 75', 'Biji', 8500, 10000, 0, 3, 3, '2022-03-14 22:22:18', '2022-03-15 12:22:41', 55, 1),
('089686729009', 'maxicorn', 'Biji', 1500, 2000, 0, 13, 13, '2022-03-14 22:42:04', NULL, 55, 1),
('089686732009', 'chitato lite ', 'Biji', 2500, 3000, 0, 29, 29, '2022-03-14 22:33:34', NULL, 55, 1),
('089686732016', 'chitato lite ', 'Biji', 5000, 6000, 0, 1, 1, '2022-03-14 23:50:13', NULL, 55, 1),
('089686923001', 'sarimi gelas ayam bawang', 'Biji', 900, 1000, 0, 3, 3, '2022-03-14 19:23:08', NULL, 55, 1),
('089686923032', 'sarimi gelas kari ayam', 'Biji', 890, 1000, 0, 10, 10, '2022-03-14 19:16:52', NULL, 55, 1),
('089686923124', 'sarimi gelas rs sosis', 'Biji', 890, 1000, 0, 10, 10, '2022-03-14 19:14:17', '2022-03-15 09:14:25', 55, 1),
('8886001012233', 'roma marie susu', 'Biji', 4900, 6000, 0, 5, 5, '2022-03-14 20:01:12', NULL, 55, 1),
('8886001100855', 'kiss mint', 'Biji', 6000, 7000, 0, 1, 1, '2022-03-14 20:52:23', NULL, 55, 1),
('8886007000036', 'teh poci', 'Biji', 3400, 4000, 0, 10, 10, '2022-03-15 00:38:16', NULL, 55, 1),
('8886007811076', 'teh sosro ', 'Biji', 5000, 6000, 0, 12, 12, '2022-03-15 00:17:02', NULL, 55, 1),
('8886007811366', 'teh poci', 'Biji', 3500, 4500, 0, 10, 0, '2022-03-15 00:44:46', NULL, 55, 1),
('8886007811465', 'poci lemon', 'Biji', 5000, 6000, 0, 11, 11, '2022-03-15 00:27:35', NULL, 55, 1),
('8886007811502', 'teh sosro 50', 'Biji', 7000, 8000, 0, 2, 2, '2022-03-15 00:19:33', NULL, 55, 1),
('8886007811533', 'teh sosro 15', 'Biji', 3000, 3500, 0, 1, 1, '2022-03-15 00:28:46', NULL, 55, 1),
('8886007821044', 'teh poci kuning', 'Biji', 3000, 3500, 0, 10, 10, '2022-03-15 00:39:18', NULL, 55, 1),
('8886013213208', 'french fries', 'Biji', 3000, 4000, 0, 5, 5, '2022-03-14 22:32:43', NULL, 55, 1),
('8886013223207', 'french fries', 'Biji', 8000, 9000, 0, 6, 6, '2022-03-14 22:44:03', '2022-03-15 12:44:31', 55, 1),
('8886047030130', 'gulas', 'Biji', 6000, 7000, 0, 3, 3, '2022-03-14 20:36:00', NULL, 55, 1),
('8888166338449', 'biscuit kering', 'Biji', 8000, 10000, 0, 1, 1, '2022-03-14 19:48:26', NULL, 55, 1),
('8888166341609', 'crispy crackers', 'Biji', 5900, 7000, 0, 1, 1, '2022-03-14 20:21:26', NULL, 55, 1),
('8888166341654', 'crizpy crackers', 'Biji', 5900, 7000, 0, 2, 2, '2022-03-14 20:13:25', NULL, 55, 1),
('8888166989559', 'monde 454 gr', 'Biji', 65000, 70000, 0, 2, 2, '2022-03-14 22:05:28', NULL, 55, 1),
('8888166989566', 'monde 908 gr', 'Biji', 117000, 122000, 0, 2, 2, '2022-03-14 22:06:32', NULL, 55, 1),
('8888166990050', 'monde serena', 'Biji', 55000, 60000, 0, 3, 3, '2022-03-14 22:07:12', NULL, 55, 1),
('896865350516', 'sun beras merah', 'Biji', 6500, 8000, 0, 4, 4, '2022-03-15 00:15:04', NULL, 55, 1),
('896865351506', 'sun kacang hj', 'Biji', 7000, 9000, 0, 2, 2, '2022-03-15 00:30:15', NULL, 55, 1),
('8990800022543', 'MENTOS', 'Biji', 2000, 3500, 0, 13, 13, '2022-03-14 20:41:02', NULL, 55, 1),
('8990800022550', 'mentos', 'Biji', 2500, 3500, 0, 4, 4, '2022-03-14 21:20:29', NULL, 55, 1),
('8991002304017', 'relaxa', 'Biji', 6000, 7000, 0, 2, 2, '2022-03-14 20:34:49', NULL, 55, 1),
('8991102160780', 'cookies ', 'Biji', 5800, 7000, 0, 2, 2, '2022-03-14 19:53:22', NULL, 55, 1),
('8991102230308', 'blaster', 'Biji', 6000, 7000, 0, 15, 15, '2022-03-14 21:00:19', NULL, 55, 1),
('8991102256766', 'cookies', 'Biji', 900, 1000, 0, 19, 19, '2022-03-14 23:42:47', NULL, 55, 1),
('8991102281416', 'mintz pep', 'Biji', 6000, 7000, 0, 2, 2, '2022-03-14 20:50:40', NULL, 55, 1),
('8991102281430', 'mintz ', 'Biji', 6000, 7000, 0, 1, 1, '2022-03-14 20:59:45', NULL, 55, 1),
('8991102283373', 'mintz', 'Biji', 6000, 7000, 0, 8, 8, '2022-03-14 21:01:09', NULL, 55, 1),
('8991102300544', 'tango vanilla 163 gr', 'Biji', 9900, 12000, 0, 3, 3, '2022-03-14 19:54:57', NULL, 55, 1),
('8991102303309', 'tango strw 163', 'Biji', 9800, 12000, 0, 3, 3, '2022-03-14 19:56:28', NULL, 55, 1),
('8991102320184', 'TANGO JAVA 130', 'Biji', 5500, 7000, 0, 4, 4, '2022-03-14 21:34:46', NULL, 55, 1),
('8991102384841', 'TANGO 130 COCO', 'Biji', 4900, 6000, 0, 11, 11, '2022-03-14 21:32:07', NULL, 55, 1),
('8991102387286', 'tango ', 'Biji', 1800, 2500, 0, 1, 1, '2022-03-14 21:29:55', NULL, 55, 1),
('8991102934565', 'tango 163 gr', 'Biji', 9900, 12000, 0, 1, 1, '2022-03-14 19:54:08', NULL, 55, 1),
('8991102965743', 'tango choco javamocca', 'Biji', 1500, 2000, 0, 2, 2, '2022-03-14 20:22:47', NULL, 55, 1),
('8991102987639', 'TANGO VANILLA  130', 'Biji', 5500, 7000, 0, 5, 5, '2022-03-14 21:34:13', NULL, 55, 1),
('8991102987875', 'tango pouch', 'Biji', 6500, 9000, 0, 1, 1, '2022-03-14 22:10:49', NULL, 55, 1),
('8991102989381', 'tango 130  buble', 'Biji', 5500, 6000, 0, 2, 2, '2022-03-14 21:30:53', NULL, 55, 1),
('8991115010102', 'babol ', 'Biji', 1500, 2500, 0, 18, 18, '2022-03-14 20:55:12', NULL, 55, 1),
('8991188943536', 'sasa santan', 'Biji', 3000, 4000, 0, 9, 9, '2022-03-15 00:36:53', NULL, 55, 1),
('8991719200114', 'bolpoint merah', 'Biji', 2500, 3000, 0, 3, 3, '2022-03-14 21:22:19', NULL, 55, 1),
('8992003783337', 'antangin permen', 'Biji', 2000, 2500, 0, 13, 13, '2022-03-14 20:59:22', NULL, 55, 1),
('8992702005976', 'INDOMILK BOTOL', 'Botol', 4000, 5000, 0, 10, 0, '2022-03-14 21:43:41', '2022-03-15 14:45:06', 55, 1),
('8992702019706', 'indomilk sct', 'Biji', 2000, 2500, 0, 1, 1, '2022-03-15 00:34:38', NULL, 55, 1),
('8992741902397', 'yupi roletto', 'Biji', 450, 500, 0, 21, 21, '2022-03-14 20:34:18', NULL, 55, 1),
('8992741941006', 'yupi burger', 'Biji', 400, 500, 0, 13, 13, '2022-03-14 21:19:05', NULL, 55, 1),
('8992753980406', 'primamil', 'Biji', 14000, 20000, 0, 19, 19, '2022-03-15 00:20:25', NULL, 55, 1),
('8992775000274', 'chocolatos', 'Biji', 1500, 2500, 0, 9, 9, '2022-03-14 20:39:41', NULL, 55, 1),
('8992775000502', 'gery kopyor', 'Biji', 6900, 8000, 0, 2, 2, '2022-03-14 19:55:44', NULL, 55, 1),
('8992775000663', 'gery sereal', 'Biji', 2000, 2500, 0, 5, 5, '2022-03-14 22:16:06', NULL, 55, 1),
('8992775001011', 'gery salut', 'Biji', 1500, 2000, 0, 20, 20, '2022-03-14 20:40:17', NULL, 55, 1),
('8992775001042', 'pilus ', 'Biji', 6000, 7000, 0, 1, 1, '2022-03-14 23:51:07', NULL, 55, 1),
('8992775001608', 'chocolatos ', 'Biji', 800, 1000, 0, 20, 20, '2022-03-14 20:48:02', NULL, 55, 1),
('8992775001653', 'gery salut', 'Biji', 1500, 2000, 0, 7, 7, '2022-03-14 21:24:44', NULL, 55, 1),
('8992775001783', 'gery salut ', 'Biji', 6800, 7500, 0, 1, 1, '2022-03-14 19:58:03', NULL, 55, 1),
('8992775001820', 'chocolatos', 'Biji', 1900, 2500, 0, 9, 9, '2022-03-14 20:37:37', NULL, 55, 1),
('8992775001844', 'chocolatos', 'Biji', 1000, 1500, 0, 7, 7, '2022-03-14 21:02:21', NULL, 55, 1),
('8992775001998', 'gery sanw', 'Biji', 900, 1000, 0, 1, 1, '2022-03-14 21:04:20', NULL, 55, 1),
('8992775002193', 'garuda crunchy', 'Biji', 2000, 2500, 0, 9, 9, '2022-03-14 22:34:17', NULL, 55, 1),
('8992775002391', 'garuda crunchy', 'Biji', 2000, 2500, 0, 9, 9, '2022-03-14 22:40:56', NULL, 55, 1),
('8992775004289', 'rosta panggang', 'Biji', 8500, 10000, 0, 1, 1, '2022-03-14 22:28:07', NULL, 55, 1),
('8992775110140', 'kacang garuda 155', 'Biji', 11000, 13000, 0, 3, 3, '2022-03-14 22:21:18', NULL, 55, 1),
('8992775110157', 'garuda ', 'Biji', 2500, 3000, 0, 2, 2, '2022-03-14 22:38:52', NULL, 55, 1),
('8992775112144', 'garuda kcng kulit', 'Biji', 8500, 9500, 0, 4, 4, '2022-03-14 23:45:08', NULL, 55, 1),
('8992775203415', 'rosta ', 'Biji', 2000, 2500, 0, 6, 6, '2022-03-14 22:47:02', NULL, 55, 1),
('8992775204054', 'garuda kacang atom', 'Biji', 2500, 3000, 0, 3, 3, '2022-03-14 22:15:26', NULL, 55, 1),
('8992775210222', 'garuda pedas', 'Biji', 8500, 10000, 0, 1, 1, '2022-03-14 22:42:44', NULL, 55, 1),
('8992775211410', 'pilus garuda', 'Biji', 6000, 7000, 0, 3, 3, '2022-03-14 22:40:21', NULL, 55, 1),
('8992775305102', 'gery salut ccnt', 'Biji', 6800, 7500, 0, 2, 2, '2022-03-14 20:03:22', '2022-03-15 10:03:39', 55, 1),
('8992775305164', 'gery matcha', 'Biji', 6800, 7500, 0, 3, 3, '2022-03-14 20:04:28', NULL, 55, 1),
('8992775311547', 'chocolatos ', 'Biji', 1200, 2500, 0, 11, 11, '2022-03-14 20:22:03', NULL, 55, 1),
('8992775311608', 'chocolatos', 'Biji', 400, 500, 0, 33, 33, '2022-03-14 21:18:28', NULL, 55, 1),
('8992775311981', 'CHOCOLATOS ', 'Biji', 800, 1000, 0, 1, 1, '2022-03-14 21:11:53', NULL, 55, 1),
('8992775315057', 'gery salut ', 'Biji', 6800, 7500, 0, 1, 1, '2022-03-14 20:00:34', NULL, 55, 1),
('8992907996079', 'TOZZIES', 'Biji', 1500, 2000, 0, 2, 2, '2022-03-14 21:10:50', NULL, 55, 1),
('8992907996284', 'tozzies keju', 'Biji', 1900, 2500, 0, 3, 3, '2022-03-14 21:02:57', NULL, 55, 1),
('8992918401098', 'madu nusantara ', 'Botol', 35000, 40000, 0, 1, 0, '2022-03-16 04:24:21', NULL, 55, 1),
('8992918401500', 'honeymon', 'Biji', 6500, 8000, 0, 14, 0, '2022-03-16 04:23:31', NULL, 55, 1),
('8992919776010', 'lazery', 'Biji', 2000, 2500, 0, 16, 16, '2022-03-14 21:16:41', NULL, 55, 1),
('8992919776027', 'lazery', 'Biji', 2000, 2500, 0, 2, 2, '2022-03-14 21:28:16', NULL, 55, 1),
('8992936115021', 'tong tji 25', 'Biji', 8500, 10000, 0, 20, 20, '2022-03-15 00:26:52', NULL, 55, 1),
('8992936214014', 'teh tong tji', 'Biji', 3000, 4000, 0, 10, 10, '2022-03-15 00:40:08', '2022-03-15 14:42:00', 55, 1),
('8993014731317', 'madu rasa', 'Biji', 1500, 2000, 0, 39, 39, '2022-03-14 21:07:00', NULL, 55, 1),
('8993027163754', 'happy tos', 'Biji', 4000, 5000, 0, 1, 1, '2022-03-14 22:37:05', NULL, 55, 1),
('8993027163907', 'happy tos ', 'Biji', 9000, 11000, 0, 3, 3, '2022-03-14 22:25:42', NULL, 55, 1),
('8993027164119', 'happytos', 'Biji', 10000, 11000, 0, 3, 3, '2022-03-14 22:17:02', NULL, 55, 1),
('8993039111255', 'regal ', 'Biji', 9800, 11000, 0, 5, 5, '2022-03-14 19:58:44', NULL, 55, 1),
('8993110071133', 'sosis ayam', 'Biji', 900, 1000, 0, 36, 36, '2022-03-14 21:09:00', NULL, 55, 1),
('8993110071508', 'SISIS SAPI', 'Biji', 800, 1000, 0, 12, 12, '2022-03-14 21:09:40', NULL, 55, 1),
('8993172000423', 'simba strw', 'Biji', 6900, 8000, 0, 4, 4, '2022-03-14 20:09:20', NULL, 55, 1),
('8993172902499', 'simba choco chips', 'Biji', 6900, 8000, 0, 1, 1, '2022-03-14 20:08:48', NULL, 55, 1),
('8993172960765', 'choco pillow', 'Biji', 8000, 9000, 0, 3, 3, '2022-03-14 22:29:30', NULL, 55, 1),
('8993172995460', 'choco chips', 'Biji', 6900, 8000, 0, 1, 1, '2022-03-14 20:08:11', NULL, 55, 1),
('8993175532464', 'NABATI 75', 'Biji', 4500, 5500, 0, 3, 3, '2022-03-14 21:40:18', NULL, 55, 1),
('8993175532891', 'nabati', 'Biji', 450, 500, 0, 10, 10, '2022-03-14 21:14:41', NULL, 55, 1),
('8993175533836', 'nabati 75 gr', 'Biji', 4500, 5500, 0, 4, 4, '2022-03-14 22:20:25', NULL, 55, 1),
('8993175535878', 'nabati rich', 'Biji', 1800, 2500, 0, 1, 1, '2022-03-14 20:06:46', NULL, 55, 1),
('8993175535885', 'nabati coco', 'Biji', 1900, 2500, 0, 4, 4, '2022-03-14 20:05:13', NULL, 55, 1),
('8993175537285', 'NABATI 127', 'Biji', 5500, 7000, 0, 5, 5, '2022-03-14 21:41:04', NULL, 55, 1),
('8993175537346', 'nabati richoco 127', 'Biji', 5800, 7500, 0, 4, 4, '2022-03-14 19:40:20', NULL, 55, 1),
('8993175537872', 'nabati rolls', 'Biji', 1800, 0, 0, 3, 3, '2022-03-14 20:27:44', '2022-03-15 10:31:24', 55, 1),
('8993175538541', 'NEXTAR', 'Biji', 2000, 3000, 0, 11, 11, '2022-03-14 21:08:03', NULL, 55, 1),
('8993175538572', '8993175538572', 'Biji', 17000, 19000, 0, 2, 2, '2022-03-14 22:38:14', NULL, 55, 1),
('8993175538596', 'nabati 115', 'Biji', 8000, 9000, 0, 2, 2, '2022-03-14 22:13:31', NULL, 55, 1),
('8993175538633', 'rolls richo', 'Biji', 1800, 2500, 0, 8, 8, '2022-03-14 20:36:59', NULL, 55, 1),
('8993175538824', 'siip ', 'Biji', 4000, 5000, 0, 3, 3, '2022-03-14 22:43:17', NULL, 55, 1),
('8993175538862', 'nabati siip', 'Biji', 4500, 5000, 0, 1, 1, '2022-03-14 22:30:01', '2022-03-15 12:30:37', 55, 1),
('8993175538909', 'siip bite', 'Biji', 4500, 5000, 0, 3, 3, '2022-03-14 22:17:55', NULL, 55, 1),
('8993175539210', 'nextar brow', 'Biji', 2200, 3000, 0, 1, 1, '2022-03-14 21:03:41', NULL, 55, 1),
('8993175539517', 'nabati wht', 'Biji', 1800, 2500, 0, 4, 4, '2022-03-14 20:17:03', NULL, 55, 1),
('8993175542241', 'nabati pink lava', 'Biji', 1800, 2500, 0, 6, 6, '2022-03-14 20:18:46', NULL, 55, 1),
('8993175548694', 'nabati yoghurt', 'Biji', 1800, 2500, 0, 8, 8, '2022-03-14 20:20:09', NULL, 55, 1),
('8993175549998', 'nabati ciki', 'Biji', 6000, 8000, 0, 4, 4, '2022-03-14 22:23:45', NULL, 55, 1),
('8993175550017', 'nabati ciki', 'Biji', 7000, 8000, 0, 1, 1, '2022-03-14 22:14:54', NULL, 55, 1),
('8993175550932', 'nextar roll', 'Biji', 6800, 7500, 0, 3, 3, '2022-03-14 19:52:50', NULL, 55, 1),
('8993175552615', 'NEXTAR 106 GR', 'Biji', 6900, 8000, 0, 2, 2, '2022-03-14 21:44:20', NULL, 55, 1),
('8994537001017', 'jahe spc', 'Biji', 6000, 7000, 0, 4, 4, '2022-03-14 20:26:10', NULL, 55, 1),
('8995108500038', 'rebo ori 150', 'Biji', 14000, 15000, 0, 2, 2, '2022-03-14 23:47:13', NULL, 55, 1),
('8995108500052', 'rebo milk 150', 'Biji', 13500, 15000, 0, 1, 1, '2022-03-14 22:39:39', NULL, 55, 1),
('8995108509499', 'rebo g tea 150', 'Biji', 14000, 15000, 0, 2, 2, '2022-03-14 22:45:04', NULL, 55, 1),
('8995108509550', 'rebo ori 70', 'Biji', 8000, 9000, 0, 6, 6, '2022-03-14 23:48:17', NULL, 55, 1),
('8995108509567', 'rebo 70 gr', 'Biji', 7500, 0, 0, 6, 6, '2022-03-14 22:19:02', '2022-03-15 12:19:49', 55, 1),
('8995108509574', 'rebo g tea 70', 'Biji', 8000, 9000, 0, 2, 2, '2022-03-14 22:45:40', NULL, 55, 1),
('8995108509857', 'rebo 70 caramel', 'Biji', 7000, 9000, 0, 3, 3, '2022-03-14 23:52:44', NULL, 55, 1),
('8996001300213', 'marie gold sct', 'Biji', 1500, 2000, 0, 1, 1, '2022-03-14 21:26:50', NULL, 55, 1),
('8996001301142', 'roma kelapa', 'Biji', 7900, 9000, 0, 3, 3, '2022-03-14 19:46:41', NULL, 55, 1),
('8996001301579', 'malkist cokelat kelapa ', 'Biji', 6800, 7500, 0, 2, 2, '2022-03-14 19:57:17', NULL, 55, 1),
('8996001302026', 'malkist crck 135', 'Biji', 6000, 7500, 0, 4, 4, '2022-03-14 19:59:23', NULL, 55, 1),
('8996001302248', 'sari gandum 149', 'Biji', 6000, 7000, 0, 4, 4, '2022-03-14 20:00:00', NULL, 55, 1),
('8996001302637', 'maklist cokelat', 'Biji', 5900, 7500, 0, 2, 2, '2022-03-14 20:24:22', NULL, 55, 1),
('8996001304044', 'slay olay 128 gr', 'Biji', 6800, 7500, 0, 4, 4, '2022-03-14 19:43:47', NULL, 55, 1),
('8996001304426', 'slay olay 128 gr', 'Biji', 6800, 7500, 0, 2, 2, '2022-03-14 19:43:16', NULL, 55, 1),
('8996001304433', 'slay olay 128 gr', 'Biji', 6800, 7500, 0, 5, 5, '2022-03-14 19:44:22', '2022-03-15 10:02:38', 55, 1),
('8996001305003', 'sari gandum ', 'Biji', 5900, 7000, 0, 2, 2, '2022-03-14 20:07:19', NULL, 55, 1),
('8996001305041', 'roma sanw coco', 'Biji', 6000, 7000, 0, 1, 1, '2022-03-14 20:06:04', NULL, 55, 1),
('8996001305058', 'roma sanwich ', 'Biji', 5666, 7000, 0, 1, 1, '2022-03-14 20:01:45', '2022-03-15 10:02:57', 55, 1),
('8996001307694', 'marie gold 120 gr', 'Biji', 17500, 19000, 0, 2, 2, '2022-03-14 19:52:03', NULL, 55, 1),
('8996001312353', 'malkist kopyor', 'Biji', 6800, 7500, 0, 2, 2, '2022-03-14 20:10:26', NULL, 55, 1),
('8996001312834', 'malkist roma tabur 88gr', 'Biji', 6900, 8000, 0, 3, 3, '2022-03-14 19:41:03', NULL, 55, 1),
('8996001320136', 'kopiko ex besar', 'Biji', 8950, 10500, 0, 8, 8, '2022-03-14 20:25:08', NULL, 55, 1),
('8996001326220', 'kis chery', 'Biji', 5500, 7000, 0, 3, 3, '2022-03-14 20:26:49', NULL, 55, 1),
('8996001328224', 'tamarin', 'Biji', 6000, 7000, 0, 4, 4, '2022-03-14 20:27:17', NULL, 55, 1),
('8996001340998', 'kopiko ', 'Biji', 1700, 2000, 0, 2, 2, '2022-03-14 21:19:40', NULL, 55, 1),
('8996001350515', 'keju zuper', 'Biji', 1000, 1500, 0, 9, 9, '2022-03-14 20:48:49', NULL, 55, 1),
('8996001350522', 'wafello coco', 'Biji', 1000, 1500, 0, 9, 9, '2022-03-14 20:20:45', NULL, 55, 1),
('8996001350829', 'wafello', 'Biji', 1800, 2500, 0, 4, 4, '2022-03-14 20:13:58', NULL, 55, 1),
('8996001351871', 'wafello ', 'Biji', 1800, 2500, 0, 1, 1, '2022-03-14 20:57:19', NULL, 55, 1),
('8996001351888', 'wafello caramel', 'Biji', 1800, 2500, 0, 5, 5, '2022-03-14 20:38:16', NULL, 55, 1),
('8996001358405', 'wafello butter caramel', 'Biji', 4900, 6000, 0, 6, 6, '2022-03-14 19:47:31', '2022-03-15 10:02:09', 55, 1),
('8996001375372', 'choki choki', 'Biji', 800, 1000, 0, 10, 10, '2022-03-14 21:15:15', NULL, 55, 1),
('8997003110015', 'davos', 'Biji', 1000, 1500, 0, 15, 15, '2022-03-14 21:17:34', NULL, 55, 1),
('8997004100015', 'alba pastiles', 'Biji', 9500, 11000, 0, 6, 6, '2022-03-14 20:49:31', NULL, 55, 1),
('8997011930612', 'ladaku', 'Biji', 900, 1500, 0, 4, 4, '2022-03-15 00:33:31', NULL, 55, 1),
('8997011931107', 'desaku ', 'Biji', 1000, 1500, 0, 5, 5, '2022-03-15 00:35:45', NULL, 55, 1),
('8997014050256', 'milton', 'Biji', 1000, 1500, 0, 6, 6, '2022-03-14 21:21:39', NULL, 55, 1),
('8997014050287', 'MILTON', 'Biji', 1000, 1500, 0, 6, 6, '2022-03-14 21:07:28', NULL, 55, 1),
('8997014050317', 'milton stw', 'Biji', 1000, 1500, 0, 1, 1, '2022-03-14 20:50:08', NULL, 55, 1),
('8997029660037', 'mama mia 2lt', 'Biji', 37500, 41000, 0, 8, 8, '2022-03-15 00:06:26', NULL, 55, 1),
('8997029660297', 'ma lezat 2lt', 'Biji', 37500, 41000, 0, 6, 6, '2022-03-15 00:05:09', NULL, 55, 1),
('8997032680275', 'taro net 65', 'Biji', 7000, 8000, 0, 9, 9, '2022-03-14 22:24:26', NULL, 55, 1),
('8997033700149', 'teh poci 25', 'Biji', 5000, 6000, 0, 5, 5, '2022-03-15 00:22:42', NULL, 55, 1),
('8997204304541', 'milk biscuit', 'Biji', 1500, 2000, 0, 2, 2, '2022-03-14 21:15:53', NULL, 55, 1),
('8997878003139', 'jagoan neon', 'Biji', 6000, 8000, 0, 1, 1, '2022-03-14 21:01:38', NULL, 55, 1),
('8998685011003', 'hexos', 'Biji', 1500, 2500, 0, 63, 63, '2022-03-14 20:38:55', NULL, 55, 1),
('8998685012000', 'hexos lemon', 'Biji', 1800, 2500, 0, 54, 54, '2022-03-14 20:51:35', NULL, 55, 1),
('8998685013007', 'hexos', 'Biji', 2000, 2500, 0, 55, 55, '2022-03-14 21:06:27', NULL, 55, 1),
('8998685021002', 'nano nano', 'Biji', 2000, 2500, 0, 33, 33, '2022-03-14 21:22:50', NULL, 55, 1),
('8998685051306', 'frozz mint', 'Biji', 7500, 8500, 0, 4, 4, '2022-03-14 20:47:08', NULL, 55, 1),
('8998685057308', 'frozz blue mint', 'Biji', 7500, 8500, 0, 1, 1, '2022-03-14 20:45:54', NULL, 55, 1),
('8998685179017', 'nano milky', 'Biji', 1500, 2500, 0, 5, 5, '2022-03-14 21:04:47', '2022-03-15 11:05:31', 55, 1),
('8998685184301', 'FROZZ COOL MINT', 'Biji', 7500, 8500, 0, 4, 4, '2022-03-14 20:44:00', NULL, 55, 1),
('8998685185308', 'frozz', 'Biji', 7500, 8500, 0, 4, 4, '2022-03-14 21:26:15', NULL, 55, 1),
('8998685186305', 'FROZZ ANGGUR', 'Biji', 7500, 8500, 0, 4, 4, '2022-03-14 20:44:31', NULL, 55, 1),
('8998685189306', 'FROZZ LEMON MINT', 'Biji', 7500, 8500, 0, 4, 4, '2022-03-14 20:45:14', NULL, 55, 1),
('8998685221013', 'nano milky ', 'Biji', 1500, 2500, 0, 4, 4, '2022-03-14 20:55:50', NULL, 55, 1),
('8998685226018', 'NANO MILKY', 'Biji', 2000, 2500, 0, 5, 5, '2022-03-14 21:10:12', NULL, 55, 1),
('8998685227015', 'nano milky', 'Biji', 1800, 2500, 0, 4, 4, '2022-03-14 20:54:38', NULL, 55, 1),
('8998694120345', 'choco mania', 'Biji', 6500, 7500, 0, 3, 3, '2022-03-14 22:12:26', NULL, 55, 1),
('8998866200325', 'mie sedap rasa soto', 'Biji', 3000, 3500, 0, 6, 6, '2022-03-14 19:22:22', NULL, 55, 1),
('8998866200813', 'sedap goreng cup', 'Biji', 4500, 6000, 0, 3, 3, '2022-03-14 19:27:20', NULL, 55, 1),
('8998866200820', 'sedap cup ayam bawang', 'Biji', 4500, 6000, 0, 2, 2, '2022-03-14 19:29:11', NULL, 55, 1),
('8998866200851', 'sedap baso cup spc', 'Biji', 4500, 6000, 0, 3, 3, '2022-03-14 19:28:39', NULL, 55, 1),
('8998866201827', 'teh javana', 'Botol', 2700, 3000, 0, 15, 0, '2022-03-16 04:27:53', NULL, 55, 1),
('8998866201841', 'golda', 'Botol', 2500, 3000, 0, 3, 3, '2022-03-15 00:09:40', NULL, 55, 1),
('8998866202404', 'sedap cup selection', 'Biji', 4500, 6000, 0, 3, 3, '2022-03-14 19:38:34', NULL, 55, 1),
('8998866202725', 'MILKU COCO', 'Biji', 2500, 3000, 0, 12, 12, '2022-03-14 21:41:31', NULL, 55, 1),
('8998866203227', 'sedap ayam bakar limau', 'Biji', 2900, 3500, 0, 13, 13, '2022-03-14 19:18:16', NULL, 55, 1),
('8998898101409', 'tolak angin cair', 'Biji', 3500, 4000, 0, 79, 79, '2022-03-14 21:24:08', NULL, 55, 1),
('8998898280401', 'tolak flu', 'Biji', 3500, 4000, 0, 12, 12, '2022-03-14 21:28:44', '2022-03-15 11:29:13', 55, 1),
('8998898338409', 'tolak linu', 'Biji', 3500, 4000, 0, 5, 5, '2022-03-14 21:27:19', NULL, 55, 1),
('8998898823905', 'tolak angin', 'Biji', 2000, 2500, 0, 17, 17, '2022-03-14 21:13:08', NULL, 55, 1),
('8999099919596', 'sgm soya', 'Biji', 25000, 30000, 0, 1, 1, '2022-03-15 00:24:25', NULL, 55, 1),
('8999099922978', 'sgm ananda', 'Biji', 10000, 14000, 0, 7, 7, '2022-03-15 00:25:31', NULL, 55, 1),
('8999099923012', 'sgm bunda 150', 'Biji', 18000, 25000, 0, 1, 1, '2022-03-15 00:18:06', NULL, 55, 1),
('8999988888989', 'larutan penyegar ', 'Biji', 3500, 4000, 0, 3, 3, '2022-03-15 00:13:46', NULL, 55, 1),
('8999999000066', 'taro net ', 'Biji', 4000, 5000, 0, 4, 4, '2022-03-14 23:53:35', NULL, 55, 1),
('8999999000165', 'taro ', 'Biji', 900, 1000, 0, 49, 49, '2022-03-14 23:44:10', NULL, 55, 1),
('95506296', 'strepsils', 'Biji', 12500, 13500, 0, 1, 1, '2022-03-14 21:23:28', NULL, 55, 1),
('95506319', 'strepsils', 'Biji', 12500, 13500, 0, 9, 9, '2022-03-14 21:21:07', NULL, 55, 1),
('pp 15000', 'papang 15000', 'Biji', 13000, 15000, 0, 50, 50, '2022-03-14 22:03:58', NULL, 55, 1),
('pp 30000', 'papang 30000', 'Biji', 28000, 30000, 0, 50, 50, '2022-03-14 22:04:29', NULL, 55, 1),
('sn 10000', 'snack 10000', 'Biji', 8000, 10000, 0, 0, 0, '2022-03-14 21:49:40', NULL, 55, 1),
('sn 11000', 'snack 11000', 'Biji', 9000, 11000, 0, 50, 50, '2022-03-14 21:56:26', NULL, 55, 1),
('sn 12000', 'snack 12000', 'Biji', 10000, 12000, 0, 50, 50, '2022-03-14 21:47:57', NULL, 55, 1),
('sn 12500', 'snack 12500', 'Biji', 10500, 12500, 0, 50, 50, '2022-03-14 22:02:39', NULL, 55, 1),
('sn 13000', 'snack 13000', 'Biji', 11000, 13000, 0, 50, 50, '2022-03-14 21:57:44', NULL, 55, 1),
('sn 14000', 'snack 14000', 'Biji', 12000, 14000, 0, 50, 50, '2022-03-14 21:58:21', NULL, 55, 1),
('sn 14500', 'snack 14500', 'Biji', 12500, 14500, 0, 50, 50, '2022-03-14 22:02:05', NULL, 55, 1),
('sn 15000', 'snack 15000', 'Biji', 13000, 15000, 0, 50, 50, '2022-03-14 21:58:54', NULL, 55, 1),
('sn 15500', 'snack 15500', 'Biji', 13500, 15500, 0, 50, 50, '2022-03-14 22:09:43', NULL, 55, 1),
('sn 16000', 'snack 16000', 'Biji', 14000, 16000, 0, 50, 50, '2022-03-14 22:00:44', NULL, 55, 1),
('sn 18000', 'snack 18000', 'Biji', 16000, 18000, 0, 50, 50, '2022-03-14 22:00:12', NULL, 55, 1),
('sn 35000', 'snack 35000', 'Biji', 33000, 35000, 0, 50, 50, '2022-03-14 22:01:23', NULL, 55, 1),
('sn 8000', 'snack 8000', 'Biji', 7000, 8000, 0, 50, 50, '2022-03-14 21:48:38', NULL, 55, 1),
('sn 9000', 'snack 9000', 'Biji', 8000, 9000, 0, 50, 50, '2022-03-14 21:49:11', NULL, 55, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_beli`
--

CREATE TABLE `tbl_beli` (
  `beli_nofak` varchar(15) DEFAULT NULL,
  `beli_tanggal` date DEFAULT NULL,
  `beli_suplier_id` int(11) DEFAULT NULL,
  `beli_user_id` int(11) DEFAULT NULL,
  `beli_kode` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_beli`
--

CREATE TABLE `tbl_detail_beli` (
  `d_beli_id` int(11) NOT NULL,
  `d_beli_nofak` varchar(15) DEFAULT NULL,
  `d_beli_barang_id` varchar(15) DEFAULT NULL,
  `d_beli_harga` double DEFAULT NULL,
  `d_beli_jumlah` int(11) DEFAULT NULL,
  `d_beli_total` double DEFAULT NULL,
  `d_beli_kode` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_jual`
--

CREATE TABLE `tbl_detail_jual` (
  `d_jual_id` int(11) NOT NULL,
  `d_jual_nofak` varchar(15) DEFAULT NULL,
  `d_jual_barang_id` varchar(15) DEFAULT NULL,
  `d_jual_barang_nama` varchar(150) DEFAULT NULL,
  `d_jual_barang_satuan` varchar(30) DEFAULT NULL,
  `d_jual_barang_harpok` double DEFAULT NULL,
  `d_jual_barang_harjul` double DEFAULT NULL,
  `d_jual_qty` int(11) DEFAULT NULL,
  `d_jual_diskon` double DEFAULT NULL,
  `d_jual_total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jual`
--

CREATE TABLE `tbl_jual` (
  `jual_nofak` varchar(15) NOT NULL,
  `jual_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `jual_total` double DEFAULT NULL,
  `jual_jml_uang` double DEFAULT NULL,
  `jual_kembalian` double DEFAULT NULL,
  `jual_user_id` int(11) DEFAULT NULL,
  `jual_keterangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kategori_id`, `kategori_nama`) VALUES
(55, 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_retur`
--

CREATE TABLE `tbl_retur` (
  `retur_id` int(11) NOT NULL,
  `retur_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `retur_barang_id` varchar(15) DEFAULT NULL,
  `retur_barang_nama` varchar(150) DEFAULT NULL,
  `retur_barang_satuan` varchar(30) DEFAULT NULL,
  `retur_harjul` double DEFAULT NULL,
  `retur_qty` int(11) DEFAULT NULL,
  `retur_subtotal` double DEFAULT NULL,
  `retur_keterangan` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suplier`
--

CREATE TABLE `tbl_suplier` (
  `suplier_id` int(11) NOT NULL,
  `suplier_nama` varchar(35) DEFAULT NULL,
  `suplier_alamat` varchar(60) DEFAULT NULL,
  `suplier_notelp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(35) DEFAULT NULL,
  `user_username` varchar(30) DEFAULT NULL,
  `user_password` varchar(35) DEFAULT NULL,
  `user_level` varchar(2) DEFAULT NULL,
  `user_status` varchar(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_level`, `user_status`) VALUES
(1, 'M Fikri Setiadi', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '1'),
(2, 'fikri', 'kasir', 'e10adc3949ba59abbe56e057f20f883e', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `level` varchar(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `level`, `username`, `password`) VALUES
(5, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', '21232f297a57a5a743894a0e4a801fc3'),
(6, 'Teller', 'teller', '8482dfb1bca15b503101eb438f52deed', '8482dfb1bca15b503101eb438f52deed');

-- --------------------------------------------------------

--
-- Table structure for table `wajib_belanja`
--

CREATE TABLE `wajib_belanja` (
  `id` int(11) NOT NULL,
  `kode_nasabah` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `jumlah` float NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wajib_belanja`
--

INSERT INTO `wajib_belanja` (`id`, `kode_nasabah`, `tanggal`, `jenis`, `jumlah`, `created`) VALUES
(8, '1003', '2022-03-14', 'Wajib Belanja', 20000, 1647258085),
(9, '1003', '2022-03-14', 'Wajib Belanja', 20000, 1647258533),
(11, '1003', '2022-03-14', 'Ambil Wajib Belanja', -40000, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cicilan`
--
ALTER TABLE `cicilan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keanggotaan`
--
ALTER TABLE `keanggotaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD KEY `barang_user_id` (`barang_user_id`),
  ADD KEY `barang_kategori_id` (`barang_kategori_id`);

--
-- Indexes for table `tbl_beli`
--
ALTER TABLE `tbl_beli`
  ADD PRIMARY KEY (`beli_kode`),
  ADD KEY `beli_user_id` (`beli_user_id`),
  ADD KEY `beli_suplier_id` (`beli_suplier_id`),
  ADD KEY `beli_id` (`beli_kode`);

--
-- Indexes for table `tbl_detail_beli`
--
ALTER TABLE `tbl_detail_beli`
  ADD PRIMARY KEY (`d_beli_id`),
  ADD KEY `d_beli_barang_id` (`d_beli_barang_id`),
  ADD KEY `d_beli_nofak` (`d_beli_nofak`),
  ADD KEY `d_beli_kode` (`d_beli_kode`);

--
-- Indexes for table `tbl_detail_jual`
--
ALTER TABLE `tbl_detail_jual`
  ADD PRIMARY KEY (`d_jual_id`),
  ADD KEY `d_jual_barang_id` (`d_jual_barang_id`),
  ADD KEY `d_jual_nofak` (`d_jual_nofak`);

--
-- Indexes for table `tbl_jual`
--
ALTER TABLE `tbl_jual`
  ADD PRIMARY KEY (`jual_nofak`),
  ADD KEY `jual_user_id` (`jual_user_id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tbl_retur`
--
ALTER TABLE `tbl_retur`
  ADD PRIMARY KEY (`retur_id`);

--
-- Indexes for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `wajib_belanja`
--
ALTER TABLE `wajib_belanja`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cicilan`
--
ALTER TABLE `cicilan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keanggotaan`
--
ALTER TABLE `keanggotaan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `simpanan`
--
ALTER TABLE `simpanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_detail_beli`
--
ALTER TABLE `tbl_detail_beli`
  MODIFY `d_beli_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_detail_jual`
--
ALTER TABLE `tbl_detail_jual`
  MODIFY `d_jual_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_retur`
--
ALTER TABLE `tbl_retur`
  MODIFY `retur_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wajib_belanja`
--
ALTER TABLE `wajib_belanja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_beli`
--
ALTER TABLE `tbl_beli`
  ADD CONSTRAINT `tbl_beli_ibfk_1` FOREIGN KEY (`beli_user_id`) REFERENCES `tbl_user` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_beli_ibfk_2` FOREIGN KEY (`beli_suplier_id`) REFERENCES `tbl_suplier` (`suplier_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_detail_beli`
--
ALTER TABLE `tbl_detail_beli`
  ADD CONSTRAINT `tbl_detail_beli_ibfk_1` FOREIGN KEY (`d_beli_barang_id`) REFERENCES `tbl_barang` (`barang_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_beli_ibfk_2` FOREIGN KEY (`d_beli_kode`) REFERENCES `tbl_beli` (`beli_kode`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_detail_jual`
--
ALTER TABLE `tbl_detail_jual`
  ADD CONSTRAINT `tbl_detail_jual_ibfk_1` FOREIGN KEY (`d_jual_barang_id`) REFERENCES `tbl_barang` (`barang_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_jual_ibfk_2` FOREIGN KEY (`d_jual_nofak`) REFERENCES `tbl_jual` (`jual_nofak`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_jual`
--
ALTER TABLE `tbl_jual`
  ADD CONSTRAINT `tbl_jual_ibfk_1` FOREIGN KEY (`jual_user_id`) REFERENCES `tbl_user` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

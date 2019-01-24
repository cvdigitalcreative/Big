-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2019 at 07:27 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendataan`
--
CREATE DATABASE IF NOT EXISTS `pendataan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pendataan`;

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `catatan_id` int(11) NOT NULL,
  `catatan_text` text,
  `catatan_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catatan`
--

INSERT INTO `catatan` (`catatan_id`, `catatan_text`, `catatan_tanggal`, `proyek_id`) VALUES
(3, '<ul><li>Foto tidak bagus&nbsp;</li><li>tidak jelas</li><li>sudah diupload ke kondisi kurang bagus</li><li>langsung cek kelapangan</li></ul>', '2019-01-14 18:19:04', 4),
(4, '<p>-</p>', '2019-01-16 06:29:36', 9);

-- --------------------------------------------------------

--
-- Table structure for table `foto_atap`
--

CREATE TABLE `foto_atap` (
  `fa_id` int(11) NOT NULL,
  `fa_gambar` varchar(50) DEFAULT NULL,
  `fa_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_atap`
--

INSERT INTO `foto_atap` (`fa_id`, `fa_gambar`, `fa_tanggal`, `proyek_id`) VALUES
(1, '6066672.jpg', '2019-01-14 18:00:15', 4),
(2, '2627586_20140217015353.jpg', '2019-01-14 18:00:15', 4);

-- --------------------------------------------------------

--
-- Table structure for table `foto_bahu_jalan`
--

CREATE TABLE `foto_bahu_jalan` (
  `fbj_id` int(11) NOT NULL,
  `fbj_gambar` varchar(50) DEFAULT NULL,
  `fbj_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_bahu_jalan`
--

INSERT INTO `foto_bahu_jalan` (`fbj_id`, `fbj_gambar`, `fbj_tanggal`, `proyek_id`) VALUES
(1, '1002.jpeg', '2019-01-14 18:00:15', 4),
(2, '1231.png', '2019-01-14 18:00:15', 4);

-- --------------------------------------------------------

--
-- Table structure for table `foto_belakang`
--

CREATE TABLE `foto_belakang` (
  `fb_id` int(11) NOT NULL,
  `fb_gambar` varchar(50) DEFAULT NULL,
  `fb_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_belakang`
--

INSERT INTO `foto_belakang` (`fb_id`, `fb_gambar`, `fb_tanggal`, `proyek_id`) VALUES
(1, '100.jpeg', '2019-01-14 06:02:47', 4),
(2, '2000.jpg', '2019-01-14 06:02:47', 4);

-- --------------------------------------------------------

--
-- Table structure for table `foto_dak`
--

CREATE TABLE `foto_dak` (
  `fd_id` int(11) NOT NULL,
  `fd_gambar` varchar(50) DEFAULT NULL,
  `fd_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_dak`
--

INSERT INTO `foto_dak` (`fd_id`, `fd_gambar`, `fd_tanggal`, `proyek_id`) VALUES
(5, 'Diagram_Blog.png', '2019-01-14 06:02:49', 4),
(6, 'custom-vs-packaged_productivity2.jpg', '2019-01-14 06:02:49', 4);

-- --------------------------------------------------------

--
-- Table structure for table `foto_depan`
--

CREATE TABLE `foto_depan` (
  `ftd_id` int(11) NOT NULL,
  `ftd_gambar` varchar(50) DEFAULT NULL,
  `ftd_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_depan`
--

INSERT INTO `foto_depan` (`ftd_id`, `ftd_gambar`, `ftd_tanggal`, `proyek_id`) VALUES
(1, 'SmartHome.png', '2019-01-14 06:02:46', 4),
(2, '16.png', '2019-01-16 06:29:35', 9),
(3, '171.png', '2019-01-16 06:29:36', 9);

-- --------------------------------------------------------

--
-- Table structure for table `foto_dinding`
--

CREATE TABLE `foto_dinding` (
  `fdd_id` int(11) NOT NULL,
  `fdd_gambar` varchar(50) DEFAULT NULL,
  `fdd_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_dinding`
--

INSERT INTO `foto_dinding` (`fdd_id`, `fdd_gambar`, `fdd_tanggal`, `proyek_id`) VALUES
(1, 'alur.170720215905_(1).png', '2019-01-14 18:08:49', 4),
(2, 'android11.png', '2019-01-14 18:08:49', 4);

-- --------------------------------------------------------

--
-- Table structure for table `foto_folding_gate`
--

CREATE TABLE `foto_folding_gate` (
  `ffg_id` int(11) NOT NULL,
  `ffg_gambar` varchar(50) DEFAULT NULL,
  `ffg_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_folding_gate`
--

INSERT INTO `foto_folding_gate` (`ffg_id`, `ffg_gambar`, `ffg_tanggal`, `proyek_id`) VALUES
(1, 'a.JPG', '2019-01-14 18:00:16', 4),
(2, 'AAEA1.jpg', '2019-01-14 18:00:16', 4);

-- --------------------------------------------------------

--
-- Table structure for table `foto_kanan`
--

CREATE TABLE `foto_kanan` (
  `fk_id` int(11) NOT NULL,
  `fk_gambar` varchar(50) DEFAULT NULL,
  `fk_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_kanan`
--

INSERT INTO `foto_kanan` (`fk_id`, `fk_gambar`, `fk_tanggal`, `proyek_id`) VALUES
(1, '1001.jpeg', '2019-01-14 06:02:47', 4),
(2, '20001.jpg', '2019-01-14 06:02:47', 4);

-- --------------------------------------------------------

--
-- Table structure for table `foto_kiri`
--

CREATE TABLE `foto_kiri` (
  `fkr_id` int(11) NOT NULL,
  `fkr_gambar` varchar(50) DEFAULT NULL,
  `fkr_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_kiri`
--

INSERT INTO `foto_kiri` (`fkr_id`, `fkr_gambar`, `fkr_tanggal`, `proyek_id`) VALUES
(7, '1650131.jpg', '2019-01-14 06:02:47', 4),
(8, '6066671.jpg', '2019-01-14 06:02:47', 4);

-- --------------------------------------------------------

--
-- Table structure for table `foto_kondisi_bangunan`
--

CREATE TABLE `foto_kondisi_bangunan` (
  `fkb_id` int(11) NOT NULL,
  `fkb_gambar` varchar(50) DEFAULT NULL,
  `fkb_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_kondisi_bangunan`
--

INSERT INTO `foto_kondisi_bangunan` (`fkb_id`, `fkb_gambar`, `fkb_tanggal`, `proyek_id`) VALUES
(3, '0f1ea92dcb4d291d6555be2eb7012e0e1.jpeg', '2019-01-03 16:00:39', 4),
(4, '11.jpg', '2019-01-03 16:00:39', 4);

-- --------------------------------------------------------

--
-- Table structure for table `foto_kwh_listrik`
--

CREATE TABLE `foto_kwh_listrik` (
  `fkl_id` int(11) NOT NULL,
  `fkl_gambar` varchar(50) DEFAULT NULL,
  `fkl_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_kwh_listrik`
--

INSERT INTO `foto_kwh_listrik` (`fkl_id`, `fkl_gambar`, `fkl_tanggal`, `proyek_id`) VALUES
(1, 'AAEA.jpg', '2019-01-14 06:02:48', 4),
(2, 'android1.png', '2019-01-14 06:02:48', 4);

-- --------------------------------------------------------

--
-- Table structure for table `foto_lantai`
--

CREATE TABLE `foto_lantai` (
  `fl_id` int(11) NOT NULL,
  `fl_gambar` varchar(50) DEFAULT NULL,
  `fl_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_lantai`
--

INSERT INTO `foto_lantai` (`fl_id`, `fl_gambar`, `fl_tanggal`, `proyek_id`) VALUES
(1, 'computer_icon_by_drunkensandwich.png', '2019-01-14 06:02:48', 4),
(2, 'bakso.jpg', '2019-01-14 06:02:49', 4);

-- --------------------------------------------------------

--
-- Table structure for table `foto_pam`
--

CREATE TABLE `foto_pam` (
  `fp_id` int(11) NOT NULL,
  `fp_gambar` varchar(50) DEFAULT NULL,
  `fp_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_pam`
--

INSERT INTO `foto_pam` (`fp_id`, `fp_gambar`, `fp_tanggal`, `proyek_id`) VALUES
(1, '165013.jpg', '2019-01-14 06:02:46', 4),
(2, '606667.jpg', '2019-01-14 06:02:46', 4);

-- --------------------------------------------------------

--
-- Table structure for table `foto_parkiran`
--

CREATE TABLE `foto_parkiran` (
  `fp_id` int(11) NOT NULL,
  `fp_gambar` varchar(50) DEFAULT NULL,
  `fp_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_parkiran`
--

INSERT INTO `foto_parkiran` (`fp_id`, `fp_gambar`, `fp_tanggal`, `proyek_id`) VALUES
(1, '0f1ea92dcb4d291d6555be2eb7012e0e.jpeg', '2019-01-14 17:50:00', 4),
(2, '1.jpg', '2019-01-14 17:50:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `foto_pintu_pintu`
--

CREATE TABLE `foto_pintu_pintu` (
  `fpp_id` int(11) NOT NULL,
  `fpp_gambar` varchar(50) DEFAULT NULL,
  `fpp_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_pintu_pintu`
--

INSERT INTO `foto_pintu_pintu` (`fpp_id`, `fpp_gambar`, `fpp_tanggal`, `proyek_id`) VALUES
(1, '123.png', '2019-01-03 15:06:51', 4),
(2, '2000.jpg', '2019-01-03 15:06:51', 4);

-- --------------------------------------------------------

--
-- Table structure for table `foto_proyek_surveyor`
--

CREATE TABLE `foto_proyek_surveyor` (
  `fps_id` int(11) NOT NULL,
  `proyek_id` int(11) DEFAULT NULL,
  `proyek_f_tampak_depan` varchar(100) DEFAULT NULL,
  `proyek_f_tetangga_kanan` varchar(100) DEFAULT NULL,
  `proyek_f_tetangga_kiri` varchar(100) DEFAULT NULL,
  `proyek_f_kanan` varchar(100) DEFAULT NULL,
  `proyek_f_kiri` varchar(100) DEFAULT NULL,
  `proyek_f_belakang` varchar(100) DEFAULT NULL,
  `proyek_f_pam` varchar(100) DEFAULT NULL,
  `proyek_f_kwh` varchar(100) DEFAULT NULL,
  `proyek_f_lantai` varchar(100) DEFAULT NULL,
  `proyek_f_dak` varchar(100) DEFAULT NULL,
  `proyek_f_dinding` varchar(100) DEFAULT NULL,
  `proyek_f_toilet` varchar(100) DEFAULT NULL,
  `proyek_f_tanah_belakang` varchar(100) DEFAULT NULL,
  `proyek_f_parkiran` varchar(100) DEFAULT NULL,
  `proyek_f_bahu_jalan` varchar(100) DEFAULT NULL,
  `proyek_f_atap` varchar(100) DEFAULT NULL,
  `proyek_f_folding_gate` varchar(100) DEFAULT NULL,
  `proyek_f_pintu` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `foto_tanah_belakang`
--

CREATE TABLE `foto_tanah_belakang` (
  `ftb_id` int(11) NOT NULL,
  `ftb_gambar` varchar(50) DEFAULT NULL,
  `ftb_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_tanah_belakang`
--

INSERT INTO `foto_tanah_belakang` (`ftb_id`, `ftb_gambar`, `ftb_tanggal`, `proyek_id`) VALUES
(3, '0f1ea92dcb4d291d6555be2eb7012e0e1.jpeg', '2019-01-14 17:56:51', 4),
(4, '11.jpg', '2019-01-14 17:56:51', 4);

-- --------------------------------------------------------

--
-- Table structure for table `foto_tetangga_kanan`
--

CREATE TABLE `foto_tetangga_kanan` (
  `ftk_id` int(11) NOT NULL,
  `ftk_gambar` varchar(50) DEFAULT NULL,
  `ftk_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_tetangga_kanan`
--

INSERT INTO `foto_tetangga_kanan` (`ftk_id`, `ftk_gambar`, `ftk_tanggal`, `proyek_id`) VALUES
(5, '18.png', '2019-01-14 06:02:48', 4),
(6, '19.png', '2019-01-14 06:02:48', 4);

-- --------------------------------------------------------

--
-- Table structure for table `foto_tetangga_kiri`
--

CREATE TABLE `foto_tetangga_kiri` (
  `ftkr_id` int(11) NOT NULL,
  `ftkr_gambar` varchar(50) DEFAULT NULL,
  `ftkr_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_tetangga_kiri`
--

INSERT INTO `foto_tetangga_kiri` (`ftkr_id`, `ftkr_gambar`, `ftkr_tanggal`, `proyek_id`) VALUES
(7, '17.png', '2019-01-14 06:02:48', 4),
(8, '123.png', '2019-01-14 06:02:48', 4);

-- --------------------------------------------------------

--
-- Table structure for table `foto_toilet`
--

CREATE TABLE `foto_toilet` (
  `ft_id` int(11) NOT NULL,
  `ft_gambar` varchar(50) DEFAULT NULL,
  `ft_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_toilet`
--

INSERT INTO `foto_toilet` (`ft_id`, `ft_gambar`, `ft_tanggal`, `proyek_id`) VALUES
(1, '0f1ea92dcb4d291d6555be2eb7012e0e.jpeg', '2019-01-03 14:50:56', 4),
(2, '1.jpg', '2019-01-03 14:50:56', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pengawas`
--

CREATE TABLE `pengawas` (
  `pengawas_id` int(11) NOT NULL,
  `pengawas_nama` varchar(50) DEFAULT NULL,
  `pengawas_alamat` text,
  `pengawas_hp` varchar(30) DEFAULT NULL,
  `pengawas_username` varchar(50) DEFAULT NULL,
  `pengawas_password` varchar(50) DEFAULT NULL,
  `pengawas_foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengawas`
--

INSERT INTO `pengawas` (`pengawas_id`, `pengawas_nama`, `pengawas_alamat`, `pengawas_hp`, `pengawas_username`, `pengawas_password`, `pengawas_foto`) VALUES
(1, 'Pengawas', 'Jln.Sultan Agung Palembang Sumatera Selatan', '0812418020', 'pengawas', '123456', '2627586_201402170153531.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_barang`
--

CREATE TABLE `permintaan_barang` (
  `pb_id` int(11) NOT NULL,
  `pb_proyek` varchar(100) DEFAULT NULL,
  `pb_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pb_nama_barang` varchar(100) DEFAULT NULL,
  `pb_spesifikasi` varchar(100) DEFAULT NULL,
  `pb_jumlah` int(5) DEFAULT NULL,
  `pb_satuan` varchar(20) DEFAULT NULL,
  `pb_rencana_pemakaian` text,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permintaan_barang`
--

INSERT INTO `permintaan_barang` (`pb_id`, `pb_proyek`, `pb_tanggal`, `pb_nama_barang`, `pb_spesifikasi`, `pb_jumlah`, `pb_satuan`, `pb_rencana_pemakaian`, `proyek_id`) VALUES
(1, 'Soekarno Hatta1', '2019-01-10 13:14:43', 'Semen', '3 shack', 1, 'shack', 'untuk corran atas kurang semen\r\n', 4),
(2, 'Musi 3', '2019-01-10 15:50:48', 'Semen', 'Holchim', 1, 'sak', 'Untuk bEton', 6);

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `proyek_id` int(11) NOT NULL,
  `proyek_nama` varchar(100) DEFAULT NULL,
  `proyek_petugas` varchar(50) DEFAULT NULL,
  `proyek_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_latitude` varchar(30) DEFAULT NULL,
  `proyek_longitude` varchar(30) DEFAULT NULL,
  `proyek_alamat` text,
  `proyek_status` int(2) DEFAULT NULL,
  `proyek_tgl_penawaran` date DEFAULT NULL,
  `proyek_tgl_awal_spk` date DEFAULT NULL,
  `proyek_tgl_akhir_spk` date DEFAULT NULL,
  `surveyor_id` int(11) DEFAULT NULL,
  `qc_id` int(11) DEFAULT NULL,
  `pengawas_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`proyek_id`, `proyek_nama`, `proyek_petugas`, `proyek_tanggal`, `proyek_latitude`, `proyek_longitude`, `proyek_alamat`, `proyek_status`, `proyek_tgl_penawaran`, `proyek_tgl_awal_spk`, `proyek_tgl_akhir_spk`, `surveyor_id`, `qc_id`, `pengawas_id`) VALUES
(4, 'Soekarno Hatta1', 'M. Fachrudin', '2018-12-11 17:00:00', '-2.9966036', '104.7378195', 'Jln.Sultan Agung Palembang Sumatera Selatan', 2, '2019-01-04', '2019-01-11', '2019-04-04', 4, 1, 1),
(5, 'Musi 4', 'M.Ozil', '2018-12-19 17:00:00', '-2.9966036', '104.7378195', 'Jln.Sultan Agung Palembang Sumatera Selatan', 1, '2019-01-02', NULL, NULL, 4, 1, NULL),
(6, 'Musi 3', 'M.Junin', '2018-12-19 17:00:00', '-2.9966036', '104.7378195', 'Jln.Sultan Agung Palembang Sumatera Selatan', 2, '2019-01-12', NULL, NULL, 4, NULL, NULL),
(7, 'Benten Kuto Besak', 'Khoru Anim', '2018-12-11 17:00:00', '-2.9966036', '104.7378195', 'Jln.Sultan Agung Palembang Sumatera Selatan', 3, '2019-01-16', NULL, NULL, 4, NULL, NULL),
(8, 'Musi 5', 'M.Lesmana', '2019-01-02 17:00:00', '-2.9814827', '104.79199589999999', 'L. R. Soekamto Komp PTC (Palembang Trade Centere) MALL Blok H. 1 No. 066 Lantai 3 Kel. 8 ilir Kec. Ilir Timur II Palembang 30114', 1, '2019-01-10', NULL, NULL, 4, NULL, NULL),
(9, 'Soekarno Hatta', 'M.pUji', '2019-01-08 17:00:00', '-2.9711045', '104.7474488', 'Jln.Sultan Agung Palembang Sumatera Selatan', 1, '2019-01-02', NULL, NULL, 4, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `proyek_file`
--

CREATE TABLE `proyek_file` (
  `pf_id` int(11) NOT NULL,
  `pf_bq` varchar(50) DEFAULT NULL,
  `pf_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek_file`
--

INSERT INTO `proyek_file` (`pf_id`, `pf_bq`, `pf_tanggal`, `proyek_id`) VALUES
(1, 'surat_lamaranS1_CPNS.docx', '2019-01-07 16:49:56', 4),
(2, 'report.pdf', '2019-01-07 17:07:38', 4);

-- --------------------------------------------------------

--
-- Table structure for table `proyek_file_bahan`
--

CREATE TABLE `proyek_file_bahan` (
  `pfb_id` int(11) NOT NULL,
  `pfb_nama` varchar(50) DEFAULT NULL,
  `pfb_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek_file_bahan`
--

INSERT INTO `proyek_file_bahan` (`pfb_id`, `pfb_nama`, `pfb_tanggal`, `proyek_id`) VALUES
(1, 'Progress_Report_V11.docx', '2019-01-17 16:13:06', 4);

-- --------------------------------------------------------

--
-- Table structure for table `proyek_file_jadwal`
--

CREATE TABLE `proyek_file_jadwal` (
  `pfj_id` int(11) NOT NULL,
  `pfj_jadwal` varchar(50) DEFAULT NULL,
  `pfj_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek_file_jadwal`
--

INSERT INTO `proyek_file_jadwal` (`pfj_id`, `pfj_jadwal`, `pfj_tanggal`, `proyek_id`) VALUES
(1, 'SS.xlsx', '2019-01-08 06:08:48', 4);

-- --------------------------------------------------------

--
-- Table structure for table `proyek_file_upah`
--

CREATE TABLE `proyek_file_upah` (
  `pfu_id` int(11) NOT NULL,
  `pfu_nama` varchar(50) DEFAULT NULL,
  `pfu_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek_file_upah`
--

INSERT INTO `proyek_file_upah` (`pfu_id`, `pfu_nama`, `pfu_tanggal`, `proyek_id`) VALUES
(1, 'Progress_Report_V1.docx', '2019-01-17 15:58:17', 4);

-- --------------------------------------------------------

--
-- Table structure for table `qc`
--

CREATE TABLE `qc` (
  `qc_id` int(11) NOT NULL,
  `qc_nama` varchar(50) DEFAULT NULL,
  `qc_alamat` text,
  `qc_hp` varchar(30) DEFAULT NULL,
  `qc_username` varchar(50) DEFAULT NULL,
  `qc_password` varchar(50) DEFAULT NULL,
  `qc_foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qc`
--

INSERT INTO `qc` (`qc_id`, `qc_nama`, `qc_alamat`, `qc_hp`, `qc_username`, `qc_password`, `qc_foto`) VALUES
(1, 'Administrator1', 'Jln.Sultan Agung Palembang Sumatera Selatan1', '21312', 'qcuser', '123456', '2000.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `surveyor`
--

CREATE TABLE `surveyor` (
  `surveyor_id` int(11) NOT NULL,
  `surveyor_nama` varchar(50) DEFAULT NULL,
  `surveyor_alamat` text,
  `surveyor_hp` varchar(30) DEFAULT NULL,
  `surveyor_username` varchar(50) DEFAULT NULL,
  `surveyor_password` varchar(50) DEFAULT NULL,
  `surveyor_foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surveyor`
--

INSERT INTO `surveyor` (`surveyor_id`, `surveyor_nama`, `surveyor_alamat`, `surveyor_hp`, `surveyor_username`, `surveyor_password`, `surveyor_foto`) VALUES
(4, 'Ncik', 'Jln.Sultan Agung Palembang Sumatera Selatan', '3', 'surveyor', '123456', '0f1ea92dcb4d291d6555be2eb7012e0e.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inbox`
--

CREATE TABLE `tbl_inbox` (
  `inbox_id` int(11) NOT NULL,
  `inbox_nama` varchar(40) DEFAULT NULL,
  `inbox_email` varchar(60) DEFAULT NULL,
  `inbox_kontak` varchar(20) DEFAULT NULL,
  `inbox_pesan` text,
  `inbox_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `inbox_status` int(11) DEFAULT '1' COMMENT '1=Belum dilihat, 0=Telah dilihat'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_inbox`
--

INSERT INTO `tbl_inbox` (`inbox_id`, `inbox_nama`, `inbox_email`, `inbox_kontak`, `inbox_pesan`, `inbox_tanggal`, `inbox_status`) VALUES
(1, 'M.Puji Lesmana', 'muhammadpuji63@gmail.com', NULL, '', '2018-11-05 11:43:56', 0),
(2, 'M.Puji Lesmana', 'muhammadpuji63@gmail.com', NULL, '089606603036', '2018-11-05 12:45:24', 0),
(3, 'M.Puji Lesmana', 'muhammadpuji63@gmail.com', NULL, 'sadd', '2018-11-05 12:46:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_nama` varchar(50) DEFAULT NULL,
  `pengguna_jenkel` varchar(2) DEFAULT NULL,
  `pengguna_username` varchar(30) DEFAULT NULL,
  `pengguna_password` varchar(35) DEFAULT NULL,
  `pengguna_email` varchar(50) DEFAULT NULL,
  `pengguna_nohp` varchar(20) DEFAULT NULL,
  `pengguna_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pengguna_photo` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`pengguna_id`, `pengguna_nama`, `pengguna_jenkel`, `pengguna_username`, `pengguna_password`, `pengguna_email`, `pengguna_nohp`, `pengguna_register`, `pengguna_photo`) VALUES
(3, 'SUadmin', 'L', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@gmail.com', '081377777776', '2018-11-18 17:29:48', 'a.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`catatan_id`);

--
-- Indexes for table `foto_atap`
--
ALTER TABLE `foto_atap`
  ADD PRIMARY KEY (`fa_id`);

--
-- Indexes for table `foto_bahu_jalan`
--
ALTER TABLE `foto_bahu_jalan`
  ADD PRIMARY KEY (`fbj_id`);

--
-- Indexes for table `foto_belakang`
--
ALTER TABLE `foto_belakang`
  ADD PRIMARY KEY (`fb_id`);

--
-- Indexes for table `foto_dak`
--
ALTER TABLE `foto_dak`
  ADD PRIMARY KEY (`fd_id`);

--
-- Indexes for table `foto_depan`
--
ALTER TABLE `foto_depan`
  ADD PRIMARY KEY (`ftd_id`);

--
-- Indexes for table `foto_dinding`
--
ALTER TABLE `foto_dinding`
  ADD PRIMARY KEY (`fdd_id`);

--
-- Indexes for table `foto_folding_gate`
--
ALTER TABLE `foto_folding_gate`
  ADD PRIMARY KEY (`ffg_id`);

--
-- Indexes for table `foto_kanan`
--
ALTER TABLE `foto_kanan`
  ADD PRIMARY KEY (`fk_id`);

--
-- Indexes for table `foto_kiri`
--
ALTER TABLE `foto_kiri`
  ADD PRIMARY KEY (`fkr_id`);

--
-- Indexes for table `foto_kondisi_bangunan`
--
ALTER TABLE `foto_kondisi_bangunan`
  ADD PRIMARY KEY (`fkb_id`);

--
-- Indexes for table `foto_kwh_listrik`
--
ALTER TABLE `foto_kwh_listrik`
  ADD PRIMARY KEY (`fkl_id`);

--
-- Indexes for table `foto_lantai`
--
ALTER TABLE `foto_lantai`
  ADD PRIMARY KEY (`fl_id`);

--
-- Indexes for table `foto_pam`
--
ALTER TABLE `foto_pam`
  ADD PRIMARY KEY (`fp_id`);

--
-- Indexes for table `foto_parkiran`
--
ALTER TABLE `foto_parkiran`
  ADD PRIMARY KEY (`fp_id`);

--
-- Indexes for table `foto_pintu_pintu`
--
ALTER TABLE `foto_pintu_pintu`
  ADD PRIMARY KEY (`fpp_id`);

--
-- Indexes for table `foto_proyek_surveyor`
--
ALTER TABLE `foto_proyek_surveyor`
  ADD PRIMARY KEY (`fps_id`),
  ADD KEY `proyek_id` (`proyek_id`);

--
-- Indexes for table `foto_tanah_belakang`
--
ALTER TABLE `foto_tanah_belakang`
  ADD PRIMARY KEY (`ftb_id`);

--
-- Indexes for table `foto_tetangga_kanan`
--
ALTER TABLE `foto_tetangga_kanan`
  ADD PRIMARY KEY (`ftk_id`);

--
-- Indexes for table `foto_tetangga_kiri`
--
ALTER TABLE `foto_tetangga_kiri`
  ADD PRIMARY KEY (`ftkr_id`);

--
-- Indexes for table `foto_toilet`
--
ALTER TABLE `foto_toilet`
  ADD PRIMARY KEY (`ft_id`);

--
-- Indexes for table `pengawas`
--
ALTER TABLE `pengawas`
  ADD PRIMARY KEY (`pengawas_id`);

--
-- Indexes for table `permintaan_barang`
--
ALTER TABLE `permintaan_barang`
  ADD PRIMARY KEY (`pb_id`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`proyek_id`);

--
-- Indexes for table `proyek_file`
--
ALTER TABLE `proyek_file`
  ADD PRIMARY KEY (`pf_id`);

--
-- Indexes for table `proyek_file_bahan`
--
ALTER TABLE `proyek_file_bahan`
  ADD PRIMARY KEY (`pfb_id`);

--
-- Indexes for table `proyek_file_jadwal`
--
ALTER TABLE `proyek_file_jadwal`
  ADD PRIMARY KEY (`pfj_id`);

--
-- Indexes for table `proyek_file_upah`
--
ALTER TABLE `proyek_file_upah`
  ADD PRIMARY KEY (`pfu_id`);

--
-- Indexes for table `qc`
--
ALTER TABLE `qc`
  ADD PRIMARY KEY (`qc_id`);

--
-- Indexes for table `surveyor`
--
ALTER TABLE `surveyor`
  ADD PRIMARY KEY (`surveyor_id`);

--
-- Indexes for table `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  ADD PRIMARY KEY (`inbox_id`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `catatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `foto_atap`
--
ALTER TABLE `foto_atap`
  MODIFY `fa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `foto_bahu_jalan`
--
ALTER TABLE `foto_bahu_jalan`
  MODIFY `fbj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `foto_belakang`
--
ALTER TABLE `foto_belakang`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `foto_dak`
--
ALTER TABLE `foto_dak`
  MODIFY `fd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `foto_depan`
--
ALTER TABLE `foto_depan`
  MODIFY `ftd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `foto_dinding`
--
ALTER TABLE `foto_dinding`
  MODIFY `fdd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `foto_folding_gate`
--
ALTER TABLE `foto_folding_gate`
  MODIFY `ffg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `foto_kanan`
--
ALTER TABLE `foto_kanan`
  MODIFY `fk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `foto_kiri`
--
ALTER TABLE `foto_kiri`
  MODIFY `fkr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `foto_kondisi_bangunan`
--
ALTER TABLE `foto_kondisi_bangunan`
  MODIFY `fkb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `foto_kwh_listrik`
--
ALTER TABLE `foto_kwh_listrik`
  MODIFY `fkl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `foto_lantai`
--
ALTER TABLE `foto_lantai`
  MODIFY `fl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `foto_pam`
--
ALTER TABLE `foto_pam`
  MODIFY `fp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `foto_parkiran`
--
ALTER TABLE `foto_parkiran`
  MODIFY `fp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `foto_pintu_pintu`
--
ALTER TABLE `foto_pintu_pintu`
  MODIFY `fpp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `foto_proyek_surveyor`
--
ALTER TABLE `foto_proyek_surveyor`
  MODIFY `fps_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `foto_tanah_belakang`
--
ALTER TABLE `foto_tanah_belakang`
  MODIFY `ftb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `foto_tetangga_kanan`
--
ALTER TABLE `foto_tetangga_kanan`
  MODIFY `ftk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `foto_tetangga_kiri`
--
ALTER TABLE `foto_tetangga_kiri`
  MODIFY `ftkr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `foto_toilet`
--
ALTER TABLE `foto_toilet`
  MODIFY `ft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pengawas`
--
ALTER TABLE `pengawas`
  MODIFY `pengawas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `permintaan_barang`
--
ALTER TABLE `permintaan_barang`
  MODIFY `pb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `proyek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `proyek_file`
--
ALTER TABLE `proyek_file`
  MODIFY `pf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `proyek_file_bahan`
--
ALTER TABLE `proyek_file_bahan`
  MODIFY `pfb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `proyek_file_jadwal`
--
ALTER TABLE `proyek_file_jadwal`
  MODIFY `pfj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `proyek_file_upah`
--
ALTER TABLE `proyek_file_upah`
  MODIFY `pfu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `qc`
--
ALTER TABLE `qc`
  MODIFY `qc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `surveyor`
--
ALTER TABLE `surveyor`
  MODIFY `surveyor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  MODIFY `inbox_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22 Feb 2019 pada 16.55
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendataan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan`
--

CREATE TABLE `catatan` (
  `catatan_id` int(11) NOT NULL,
  `catatan_text` text,
  `catatan_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_harian`
--

CREATE TABLE `data_harian` (
  `dh_id` int(11) NOT NULL,
  `dh_keahlian` varchar(100) DEFAULT NULL,
  `dh_jkeahlian` int(11) DEFAULT NULL,
  `dh_material_jenis` varchar(70) DEFAULT NULL,
  `dh_jumlah_material_terima` int(8) DEFAULT NULL,
  `dh_alat_yg_digunakan` varchar(70) DEFAULT NULL,
  `dh_jumlah_alat` varchar(50) DEFAULT NULL,
  `dh_pekerjaan` varchar(100) DEFAULT NULL,
  `dh_volume` varchar(30) DEFAULT NULL,
  `dh_keterangan` varchar(50) DEFAULT NULL,
  `lh_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_material`
--

CREATE TABLE `data_material` (
  `dm_id` int(11) NOT NULL,
  `dm_bahan` varchar(250) DEFAULT NULL,
  `dm_jumlah` int(30) NOT NULL,
  `dm_satuan` varchar(30) DEFAULT NULL,
  `dm_harga` int(30) NOT NULL,
  `dm_total` int(30) NOT NULL,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pekerjaan`
--

CREATE TABLE `data_pekerjaan` (
  `dp_id` int(11) NOT NULL,
  `dp_jenis_pekerjaan` text,
  `dp_satuan` varchar(30) DEFAULT NULL,
  `dp_volume` int(30) NOT NULL,
  `dp_hs_material` int(50) NOT NULL,
  `dp_hs_upah` int(50) NOT NULL,
  `dp_th_material` int(50) NOT NULL,
  `dp_th_upah` int(50) NOT NULL,
  `dp_total_harga` int(50) NOT NULL,
  `dp_progress` int(40) NOT NULL,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_upah`
--

CREATE TABLE `data_upah` (
  `du_id` int(11) NOT NULL,
  `du_jenis_pekerjaan` text,
  `du_satuan` varchar(20) DEFAULT NULL,
  `du_volume` int(30) NOT NULL,
  `du_harga` int(40) NOT NULL,
  `du_total` int(30) NOT NULL,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_atap`
--

CREATE TABLE `foto_atap` (
  `fa_id` int(11) NOT NULL,
  `fa_gambar` varchar(50) DEFAULT NULL,
  `fa_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_bahu_jalan`
--

CREATE TABLE `foto_bahu_jalan` (
  `fbj_id` int(11) NOT NULL,
  `fbj_gambar` varchar(50) DEFAULT NULL,
  `fbj_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_belakang`
--

CREATE TABLE `foto_belakang` (
  `fb_id` int(11) NOT NULL,
  `fb_gambar` varchar(50) DEFAULT NULL,
  `fb_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_dak`
--

CREATE TABLE `foto_dak` (
  `fd_id` int(11) NOT NULL,
  `fd_gambar` varchar(50) DEFAULT NULL,
  `fd_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_depan`
--

CREATE TABLE `foto_depan` (
  `ftd_id` int(11) NOT NULL,
  `ftd_gambar` varchar(50) DEFAULT NULL,
  `ftd_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_dinding`
--

CREATE TABLE `foto_dinding` (
  `fdd_id` int(11) NOT NULL,
  `fdd_gambar` varchar(50) DEFAULT NULL,
  `fdd_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_folding_gate`
--

CREATE TABLE `foto_folding_gate` (
  `ffg_id` int(11) NOT NULL,
  `ffg_gambar` varchar(50) DEFAULT NULL,
  `ffg_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_kanan`
--

CREATE TABLE `foto_kanan` (
  `fk_id` int(11) NOT NULL,
  `fk_gambar` varchar(50) DEFAULT NULL,
  `fk_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_kiri`
--

CREATE TABLE `foto_kiri` (
  `fkr_id` int(11) NOT NULL,
  `fkr_gambar` varchar(50) DEFAULT NULL,
  `fkr_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_kondisi_bangunan`
--

CREATE TABLE `foto_kondisi_bangunan` (
  `fkb_id` int(11) NOT NULL,
  `fkb_gambar` varchar(50) DEFAULT NULL,
  `fkb_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_kwh_listrik`
--

CREATE TABLE `foto_kwh_listrik` (
  `fkl_id` int(11) NOT NULL,
  `fkl_gambar` varchar(50) DEFAULT NULL,
  `fkl_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_lantai`
--

CREATE TABLE `foto_lantai` (
  `fl_id` int(11) NOT NULL,
  `fl_gambar` varchar(50) DEFAULT NULL,
  `fl_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_pam`
--

CREATE TABLE `foto_pam` (
  `fp_id` int(11) NOT NULL,
  `fp_gambar` varchar(50) DEFAULT NULL,
  `fp_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_parkiran`
--

CREATE TABLE `foto_parkiran` (
  `fp_id` int(11) NOT NULL,
  `fp_gambar` varchar(50) DEFAULT NULL,
  `fp_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_pekerjaan`
--

CREATE TABLE `foto_pekerjaan` (
  `fpk_id` int(11) NOT NULL,
  `fpk_foto` varchar(100) DEFAULT NULL,
  `fpk_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dp_id` int(11) NOT NULL,
  `proyek_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_pesan`
--

CREATE TABLE `foto_pesan` (
  `fpe_id` int(11) NOT NULL,
  `fpe_foto` varchar(100) DEFAULT NULL,
  `fpe_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_pintu_pintu`
--

CREATE TABLE `foto_pintu_pintu` (
  `fpp_id` int(11) NOT NULL,
  `fpp_gambar` varchar(50) DEFAULT NULL,
  `fpp_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_proyek_surveyor`
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
-- Struktur dari tabel `foto_tanah_belakang`
--

CREATE TABLE `foto_tanah_belakang` (
  `ftb_id` int(11) NOT NULL,
  `ftb_gambar` varchar(50) DEFAULT NULL,
  `ftb_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_tetangga_kanan`
--

CREATE TABLE `foto_tetangga_kanan` (
  `ftk_id` int(11) NOT NULL,
  `ftk_gambar` varchar(50) DEFAULT NULL,
  `ftk_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_tetangga_kiri`
--

CREATE TABLE `foto_tetangga_kiri` (
  `ftkr_id` int(11) NOT NULL,
  `ftkr_gambar` varchar(50) DEFAULT NULL,
  `ftkr_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_toilet`
--

CREATE TABLE `foto_toilet` (
  `ft_id` int(11) NOT NULL,
  `ft_gambar` varchar(50) DEFAULT NULL,
  `ft_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_harian`
--

CREATE TABLE `laporan_harian` (
  `lh_id` int(11) NOT NULL,
  `lh_noSPK` varchar(10) DEFAULT NULL,
  `lh_tglSPK` timestamp NULL DEFAULT NULL,
  `lh_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `lh_perpanjangan_waktu` timestamp NULL DEFAULT NULL,
  `lh_minggu` varchar(10) DEFAULT NULL,
  `lh_hari` varchar(10) DEFAULT NULL,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_keuangan`
--

CREATE TABLE `laporan_keuangan` (
  `lk_id` int(11) NOT NULL,
  `lk_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `lk_pengirim` varchar(40) DEFAULT NULL,
  `lk_keterangan` text,
  `lk_uang_masuk` varchar(30) DEFAULT NULL,
  `lk_uang_keluar` varchar(30) DEFAULT NULL,
  `lk_sisa_uang` varchar(30) DEFAULT NULL,
  `lk_nota` varchar(50) DEFAULT NULL,
  `proyek_id` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_material`
--

CREATE TABLE `laporan_material` (
  `lm_id` int(11) NOT NULL,
  `lm_bahan` varchar(100) DEFAULT NULL,
  `lm_keterangan` text,
  `lm_uang_masuk` int(30) NOT NULL,
  `lm_uang_keluar` int(30) NOT NULL,
  `lm_sisa_uang` int(30) NOT NULL,
  `lm_pengirim` varchar(40) DEFAULT NULL,
  `lm_nota` varchar(50) DEFAULT NULL,
  `lm_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_upah`
--

CREATE TABLE `laporan_upah` (
  `lu_id` int(11) NOT NULL,
  `lu_jenis_pekerjaan` varchar(100) DEFAULT NULL,
  `lu_keterangan` text,
  `lu_uang_masuk` int(30) NOT NULL,
  `lu_uang_keluar` int(30) NOT NULL,
  `lu_sisa_uang` int(30) NOT NULL,
  `lu_pengirim` varchar(40) DEFAULT NULL,
  `lu_nota` varchar(50) DEFAULT NULL,
  `lu_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengawas`
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
-- Dumping data untuk tabel `pengawas`
--

INSERT INTO `pengawas` (`pengawas_id`, `pengawas_nama`, `pengawas_alamat`, `pengawas_hp`, `pengawas_username`, `pengawas_password`, `pengawas_foto`) VALUES
(1, 'Pengawas', 'Jln.Sultan Agung Palembang Sumatera Selatan', '0812418020', 'pengawas', '123456', '2627586_201402170153531.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan_barang`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek_file`
--

CREATE TABLE `proyek_file` (
  `pf_id` int(11) NOT NULL,
  `pf_bq` varchar(50) DEFAULT NULL,
  `pf_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek_file_bahan`
--

CREATE TABLE `proyek_file_bahan` (
  `pfb_id` int(11) NOT NULL,
  `pfb_nama` varchar(50) DEFAULT NULL,
  `pfb_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek_file_jadwal`
--

CREATE TABLE `proyek_file_jadwal` (
  `pfj_id` int(11) NOT NULL,
  `pfj_jadwal` varchar(50) DEFAULT NULL,
  `pfj_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek_file_upah`
--

CREATE TABLE `proyek_file_upah` (
  `pfu_id` int(11) NOT NULL,
  `pfu_nama` varchar(50) DEFAULT NULL,
  `pfu_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proyek_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `qc`
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
-- Dumping data untuk tabel `qc`
--

INSERT INTO `qc` (`qc_id`, `qc_nama`, `qc_alamat`, `qc_hp`, `qc_username`, `qc_password`, `qc_foto`) VALUES
(1, 'Administrator1', 'Jln.Sultan Agung Palembang Sumatera Selatan1', '21312', 'qcuser', '123456', '2000.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `super_admin`
--

CREATE TABLE `super_admin` (
  `suadmin_id` int(11) NOT NULL,
  `suadmin_nama` varchar(70) DEFAULT NULL,
  `suadmin_username` varchar(50) DEFAULT NULL,
  `suadmin_password` varchar(50) DEFAULT NULL,
  `suadmin_foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `super_admin`
--

INSERT INTO `super_admin` (`suadmin_id`, `suadmin_nama`, `suadmin_username`, `suadmin_password`, `suadmin_foto`) VALUES
(1, 'Super Admin', 'suadmin', '123456', '2627586_20140217015353.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_nama` varchar(100) DEFAULT NULL,
  `supplier_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `supplier_alamat` text,
  `supplier_nohp` varchar(50) DEFAULT NULL,
  `supplier_spesialisasi` varchar(70) DEFAULT NULL,
  `supplier_provinsi` varchar(70) DEFAULT NULL,
  `supplier_kota` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surveyor`
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
-- Dumping data untuk tabel `surveyor`
--

INSERT INTO `surveyor` (`surveyor_id`, `surveyor_nama`, `surveyor_alamat`, `surveyor_hp`, `surveyor_username`, `surveyor_password`, `surveyor_foto`) VALUES
(4, 'Ncik', 'Jln.Sultan Agung Palembang Sumatera Selatan', '3', 'surveyor', '123456', '0f1ea92dcb4d291d6555be2eb7012e0e.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_inbox`
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
-- Dumping data untuk tabel `tbl_inbox`
--

INSERT INTO `tbl_inbox` (`inbox_id`, `inbox_nama`, `inbox_email`, `inbox_kontak`, `inbox_pesan`, `inbox_tanggal`, `inbox_status`) VALUES
(1, 'M.Puji Lesmana', 'muhammadpuji63@gmail.com', NULL, '', '2018-11-05 11:43:56', 0),
(2, 'M.Puji Lesmana', 'muhammadpuji63@gmail.com', NULL, '089606603036', '2018-11-05 12:45:24', 0),
(3, 'M.Puji Lesmana', 'muhammadpuji63@gmail.com', NULL, 'sadd', '2018-11-05 12:46:45', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_nama` varchar(50) DEFAULT NULL,
  `pengguna_jenkel` varchar(2) DEFAULT NULL,
  `pengguna_username` varchar(30) DEFAULT NULL,
  `pengguna_password` varchar(35) DEFAULT NULL,
  `pengguna_alamat` text,
  `pengguna_nohp` varchar(20) DEFAULT NULL,
  `pengguna_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pengguna_photo` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`pengguna_id`, `pengguna_nama`, `pengguna_jenkel`, `pengguna_username`, `pengguna_password`, `pengguna_alamat`, `pengguna_nohp`, `pengguna_register`, `pengguna_photo`) VALUES
(3, 'SUadmin12', 'L', 'admin', '123456', 'admin@gmail.com', '0813777777777', '2018-11-18 17:29:48', '0f1ea92dcb4d291d6555be2eb7012e0e1.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindakan_perbaikan`
--

CREATE TABLE `tindakan_perbaikan` (
  `td_id` int(11) NOT NULL,
  `td_penulis` varchar(50) DEFAULT NULL,
  `td_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `td_masalah` text,
  `td_analisis` text,
  `td_htj` varchar(50) DEFAULT NULL,
  `td_nama_penemu` varchar(50) DEFAULT NULL,
  `td_bagian_lokasi` varchar(100) DEFAULT NULL,
  `td_perbaikan_hh` text,
  `td_perbaikan_j` varchar(50) DEFAULT NULL,
  `td_perbaikan_ts` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `td_perbaikan_s` int(2) DEFAULT NULL,
  `td_tindakan_perbaikan_hh` text,
  `td_tindakan_perbaikan_j` varchar(50) DEFAULT NULL,
  `td_tindakan_perbaikan_ts` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `td_tindakan_perbaikan_s` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`catatan_id`);

--
-- Indexes for table `data_harian`
--
ALTER TABLE `data_harian`
  ADD PRIMARY KEY (`dh_id`);

--
-- Indexes for table `data_material`
--
ALTER TABLE `data_material`
  ADD PRIMARY KEY (`dm_id`);

--
-- Indexes for table `data_pekerjaan`
--
ALTER TABLE `data_pekerjaan`
  ADD PRIMARY KEY (`dp_id`);

--
-- Indexes for table `data_upah`
--
ALTER TABLE `data_upah`
  ADD PRIMARY KEY (`du_id`);

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
-- Indexes for table `foto_pekerjaan`
--
ALTER TABLE `foto_pekerjaan`
  ADD PRIMARY KEY (`fpk_id`);

--
-- Indexes for table `foto_pesan`
--
ALTER TABLE `foto_pesan`
  ADD PRIMARY KEY (`fpe_id`);

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
-- Indexes for table `laporan_harian`
--
ALTER TABLE `laporan_harian`
  ADD PRIMARY KEY (`lh_id`);

--
-- Indexes for table `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  ADD PRIMARY KEY (`lk_id`);

--
-- Indexes for table `laporan_material`
--
ALTER TABLE `laporan_material`
  ADD PRIMARY KEY (`lm_id`);

--
-- Indexes for table `laporan_upah`
--
ALTER TABLE `laporan_upah`
  ADD PRIMARY KEY (`lu_id`);

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
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`suadmin_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

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
-- Indexes for table `tindakan_perbaikan`
--
ALTER TABLE `tindakan_perbaikan`
  ADD PRIMARY KEY (`td_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `catatan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_harian`
--
ALTER TABLE `data_harian`
  MODIFY `dh_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_material`
--
ALTER TABLE `data_material`
  MODIFY `dm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_pekerjaan`
--
ALTER TABLE `data_pekerjaan`
  MODIFY `dp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_upah`
--
ALTER TABLE `data_upah`
  MODIFY `du_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_atap`
--
ALTER TABLE `foto_atap`
  MODIFY `fa_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_bahu_jalan`
--
ALTER TABLE `foto_bahu_jalan`
  MODIFY `fbj_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_belakang`
--
ALTER TABLE `foto_belakang`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_dak`
--
ALTER TABLE `foto_dak`
  MODIFY `fd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_depan`
--
ALTER TABLE `foto_depan`
  MODIFY `ftd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_dinding`
--
ALTER TABLE `foto_dinding`
  MODIFY `fdd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_folding_gate`
--
ALTER TABLE `foto_folding_gate`
  MODIFY `ffg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_kanan`
--
ALTER TABLE `foto_kanan`
  MODIFY `fk_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_kiri`
--
ALTER TABLE `foto_kiri`
  MODIFY `fkr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_kondisi_bangunan`
--
ALTER TABLE `foto_kondisi_bangunan`
  MODIFY `fkb_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_kwh_listrik`
--
ALTER TABLE `foto_kwh_listrik`
  MODIFY `fkl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_lantai`
--
ALTER TABLE `foto_lantai`
  MODIFY `fl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_pam`
--
ALTER TABLE `foto_pam`
  MODIFY `fp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_parkiran`
--
ALTER TABLE `foto_parkiran`
  MODIFY `fp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_pekerjaan`
--
ALTER TABLE `foto_pekerjaan`
  MODIFY `fpk_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_pesan`
--
ALTER TABLE `foto_pesan`
  MODIFY `fpe_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_pintu_pintu`
--
ALTER TABLE `foto_pintu_pintu`
  MODIFY `fpp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_proyek_surveyor`
--
ALTER TABLE `foto_proyek_surveyor`
  MODIFY `fps_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_tanah_belakang`
--
ALTER TABLE `foto_tanah_belakang`
  MODIFY `ftb_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_tetangga_kanan`
--
ALTER TABLE `foto_tetangga_kanan`
  MODIFY `ftk_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_tetangga_kiri`
--
ALTER TABLE `foto_tetangga_kiri`
  MODIFY `ftkr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_toilet`
--
ALTER TABLE `foto_toilet`
  MODIFY `ft_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan_harian`
--
ALTER TABLE `laporan_harian`
  MODIFY `lh_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  MODIFY `lk_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan_material`
--
ALTER TABLE `laporan_material`
  MODIFY `lm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan_upah`
--
ALTER TABLE `laporan_upah`
  MODIFY `lu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengawas`
--
ALTER TABLE `pengawas`
  MODIFY `pengawas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permintaan_barang`
--
ALTER TABLE `permintaan_barang`
  MODIFY `pb_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `proyek_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proyek_file`
--
ALTER TABLE `proyek_file`
  MODIFY `pf_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proyek_file_bahan`
--
ALTER TABLE `proyek_file_bahan`
  MODIFY `pfb_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proyek_file_jadwal`
--
ALTER TABLE `proyek_file_jadwal`
  MODIFY `pfj_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proyek_file_upah`
--
ALTER TABLE `proyek_file_upah`
  MODIFY `pfu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qc`
--
ALTER TABLE `qc`
  MODIFY `qc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `suadmin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT;

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

--
-- AUTO_INCREMENT for table `tindakan_perbaikan`
--
ALTER TABLE `tindakan_perbaikan`
  MODIFY `td_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

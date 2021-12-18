-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2020 at 01:21 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gemilang_sma_pmd`
--

-- --------------------------------------------------------

--
-- Table structure for table `nilai_danton`
--

CREATE TABLE `nilai_danton` (
  `id_d` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `suara` int(11) NOT NULL,
  `artikulasi` int(11) NOT NULL,
  `urutan_aba` int(11) NOT NULL,
  `expresi` int(11) NOT NULL,
  `suara2` int(11) NOT NULL,
  `artikulasi2` int(11) NOT NULL,
  `urutan_aba2` int(11) NOT NULL,
  `expresi2` int(11) NOT NULL,
  `suara3` int(11) NOT NULL,
  `artikulasi3` int(11) NOT NULL,
  `urutan_aba3` int(11) NOT NULL,
  `expresi3` int(11) NOT NULL,
  `suara4` int(11) NOT NULL,
  `artikulasi4` int(11) NOT NULL,
  `urutan_aba4` int(11) NOT NULL,
  `expresi4` int(11) NOT NULL,
  `total_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nilai_danton`
--

INSERT INTO `nilai_danton` (`id_d`, `id_peserta`, `suara`, `artikulasi`, `urutan_aba`, `expresi`, `suara2`, `artikulasi2`, `urutan_aba2`, `expresi2`, `suara3`, `artikulasi3`, `urutan_aba3`, `expresi3`, `suara4`, `artikulasi4`, `urutan_aba4`, `expresi4`, `total_nilai`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_final`
--

CREATE TABLE `nilai_final` (
  `id_nf` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `tn_murni` int(11) NOT NULL,
  `tn_kreasi` int(11) NOT NULL,
  `tn_formasi` int(11) NOT NULL,
  `tn_variasi` int(11) NOT NULL,
  `tn_pengurangan` int(11) NOT NULL,
  `total_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nilai_final`
--

INSERT INTO `nilai_final` (`id_nf`, `id_peserta`, `tn_murni`, `tn_kreasi`, `tn_formasi`, `tn_variasi`, `tn_pengurangan`, `total_nilai`) VALUES
(3, 1, 100, 0, 1000, 10, 10, 1100);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_formasi`
--

CREATE TABLE `nilai_formasi` (
  `id_f` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `gerakan` int(11) NOT NULL,
  `kekompakan` int(11) NOT NULL,
  `total_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_gerakan`
--

CREATE TABLE `nilai_gerakan` (
  `id_g` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `hormat_dj` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `laporan_dj` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `istirahat` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `periksa_kerapian` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `hormat` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `berhitung` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `set_lencang_kanan` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `lencang_kanan` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `hadap_kanan` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `hadap_kiri` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `serong_kanan` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `serong_kiri` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `balik_kanan` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `jalan_ditempat` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `hadap_kiri_henti` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `lencang_depan` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `buka_barisan` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `tutup_barisan` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `empat_langkah_kekanan` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `tiga_langkah_kebelakang` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `empat_langkah_kekiri` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `tiga_langkah_kedepan` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `melintang_kanan` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `henti` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `balik_kanan2` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `haluan_kanan` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `hadap_kanan_henti` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `langkah_tegap` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `langkah_biasa` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `dua_kali_belok_kanan` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `langkah_tegap2` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `hormat_kanan` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `langkah_biasa2` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `tiap_tiap_banjar` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `ganti_langkah` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `langkah_perlahan` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `langkah_biasa3` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `tiap_tiap_banjar2` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `lari` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `langkah_biasa4` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `tiap_tiap_banjar3` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `hadap_kiri_henti2` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `bubar` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `total_nilai` char(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nilai_gerakan`
--

INSERT INTO `nilai_gerakan` (`id_g`, `id_peserta`, `hormat_dj`, `laporan_dj`, `istirahat`, `periksa_kerapian`, `hormat`, `berhitung`, `set_lencang_kanan`, `lencang_kanan`, `hadap_kanan`, `hadap_kiri`, `serong_kanan`, `serong_kiri`, `balik_kanan`, `jalan_ditempat`, `hadap_kiri_henti`, `lencang_depan`, `buka_barisan`, `tutup_barisan`, `empat_langkah_kekanan`, `tiga_langkah_kebelakang`, `empat_langkah_kekiri`, `tiga_langkah_kedepan`, `melintang_kanan`, `henti`, `balik_kanan2`, `haluan_kanan`, `hadap_kanan_henti`, `langkah_tegap`, `langkah_biasa`, `dua_kali_belok_kanan`, `langkah_tegap2`, `hormat_kanan`, `langkah_biasa2`, `tiap_tiap_banjar`, `ganti_langkah`, `langkah_perlahan`, `langkah_biasa3`, `tiap_tiap_banjar2`, `lari`, `langkah_biasa4`, `tiap_tiap_banjar3`, `hadap_kiri_henti2`, `bubar`, `total_nilai`) VALUES
(1, 1, '1', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '7');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_juri`
--

CREATE TABLE `nilai_juri` (
  `id_nj` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `nilai_bahan_kostum` int(11) NOT NULL,
  `nilai_kerumitan_kostum` int(11) NOT NULL,
  `nilai_tema_kostum` int(11) NOT NULL,
  `nilai_selaras_kostum` int(11) NOT NULL,
  `total_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_kreasi`
--

CREATE TABLE `nilai_kreasi` (
  `id_k` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `gerakan_1` int(11) NOT NULL,
  `gerakan_2` int(11) NOT NULL,
  `gerakan_3` int(11) NOT NULL,
  `gerakan_4` int(11) NOT NULL,
  `gerakan_5` int(11) NOT NULL,
  `total_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nilai_kreasi`
--

INSERT INTO `nilai_kreasi` (`id_k`, `id_peserta`, `gerakan_1`, `gerakan_2`, `gerakan_3`, `gerakan_4`, `gerakan_5`, `total_nilai`) VALUES
(1, 1, 1, 1, 1, 1, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_minus`
--

CREATE TABLE `nilai_minus` (
  `id_nm` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `upacara_telat` int(11) NOT NULL,
  `upacara_tidak` int(11) NOT NULL,
  `anggota_kurang` int(11) NOT NULL,
  `anggota_tak_sesuai` int(11) NOT NULL,
  `danton_tak_sesuai` int(11) NOT NULL,
  `atribut_tak_sesuai` int(11) NOT NULL,
  `atribut_lepas` int(11) NOT NULL,
  `apatis` int(11) NOT NULL,
  `tak_siap_tampil` int(11) NOT NULL,
  `aba_tak_urut` int(11) NOT NULL,
  `aba_terlewat` int(11) NOT NULL,
  `aba_salah` int(11) NOT NULL,
  `pingsan` int(11) NOT NULL,
  `danton_pingsan` int(11) NOT NULL,
  `lewat_garis` int(11) NOT NULL,
  `total_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_supporter`
--

CREATE TABLE `nilai_supporter` (
  `id_s` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `kerumitan_gerakan` int(11) NOT NULL,
  `kekompakan_suara` int(11) NOT NULL,
  `kekompakan_gerakan` int(11) NOT NULL,
  `kesesuaian_kostum` int(11) NOT NULL,
  `kerumitan_gerakan2` int(11) NOT NULL,
  `kekompakan_suara2` int(11) NOT NULL,
  `kekompakan_gerakan2` int(11) NOT NULL,
  `kesesuaian_kostum2` int(11) NOT NULL,
  `kerumitan_gerakan3` int(11) NOT NULL,
  `kekompakan_suara3` int(11) NOT NULL,
  `kekompakan_gerakan3` int(11) NOT NULL,
  `kesesuaian_kostum3` int(11) NOT NULL,
  `kerumitan_gerakan4` int(11) NOT NULL,
  `kekompakan_suara4` int(11) NOT NULL,
  `kekompakan_gerakan4` int(11) NOT NULL,
  `kesesuaian_kostum4` int(11) NOT NULL,
  `total_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nilai_supporter`
--

INSERT INTO `nilai_supporter` (`id_s`, `id_peserta`, `kerumitan_gerakan`, `kekompakan_suara`, `kekompakan_gerakan`, `kesesuaian_kostum`, `kerumitan_gerakan2`, `kekompakan_suara2`, `kekompakan_gerakan2`, `kesesuaian_kostum2`, `kerumitan_gerakan3`, `kekompakan_suara3`, `kekompakan_gerakan3`, `kesesuaian_kostum3`, `kerumitan_gerakan4`, `kekompakan_suara4`, `kekompakan_gerakan4`, `kesesuaian_kostum4`, `total_nilai`) VALUES
(2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 11, 0, 11, 0, 111, 11, 1, 1, 154);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_variasi`
--

CREATE TABLE `nilai_variasi` (
  `id_v` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `kompak_gerakan` int(11) NOT NULL,
  `kompak_suara` int(11) NOT NULL,
  `indah_gerakan` int(11) NOT NULL,
  `rumit_gerakan` int(11) NOT NULL,
  `total_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_peserta`
--

CREATE TABLE `tb_peserta` (
  `id` int(11) NOT NULL,
  `no_peserta` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama_peserta` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kelas` char(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_peserta`
--

INSERT INTO `tb_peserta` (`id`, `no_peserta`, `nama_peserta`, `kelas`) VALUES
(1, '1', 'ALGHIFARI', 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `f_nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `l_nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `hak_akses` enum('Admin','Operator') COLLATE utf8_unicode_ci NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `f_nama`, `l_nama`, `username`, `password`, `hak_akses`, `last_login`) VALUES
(1, 'IBNU', 'SODIK', 'is01252', '$2y$10$O95FQt0sZ0QIg1N.Mic/5euSyLUOrZkT.jP/4uQmSRaw7lmTck9Pi', 'Admin', '2020-08-22 05:14:26'),
(3, 'SamDo', 'Anam', 'admin', '$2y$10$D7XPzwYVNXdbYzRz57VTuOovvEe0QQtagoygvkjDcqHynqrJ9NNSm', 'Admin', '2020-08-21 15:40:00'),
(5, 'Pikri', 'Elvan', 'elvan', '$2y$10$z5T9AThA58lkd5ijSntKk.2woqEu3cIqlEHOPAomYCrXIJANUkKwW', 'Admin', '2020-08-21 15:30:14'),
(6, 'Aldo', 'Sofyan', 'aldo', '$2y$10$QIWIwWjv1hrLd/bmka/vIu/q5W9bkT9lEP/87SFjVWGGokqR8/GoG', 'Operator', '2020-08-21 15:35:06'),
(7, 'Dhimas', 'Zyalfikar', 'dhimas', '$2y$10$2/.Gl.8KLBWqnip9/NW4/ebUf70rJFgYgPAS853DNo1Qy6Qv18/Qq', 'Operator', '2020-08-21 16:45:44'),
(8, 'Yumnaa', 'R A', 'yumnaa', '$2y$10$XunZ6iCaDlgjfFyxROurzuKazbx6P91fUlHRsf1AA/szcRWnMbQ1O', 'Operator', '2020-08-21 15:34:31'),
(9, 'Triksi', 'Prahadika', 'triksi', '$2y$10$IZt1xjsGh4NX4YPIVCWKVe8DOtQWG8T6JgDIAQ8znI/EMQ4Eutmrm', 'Operator', '2020-08-21 15:35:38'),
(10, 'So', 'Le', 'albi', '$2y$10$Ur/fKHVbD28Xyzod/B.XOupMGAQEu0ceccgXmvVIQ70/TKFEp4ZMy', 'Operator', '2020-08-21 20:54:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nilai_danton`
--
ALTER TABLE `nilai_danton`
  ADD PRIMARY KEY (`id_d`),
  ADD UNIQUE KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `nilai_final`
--
ALTER TABLE `nilai_final`
  ADD PRIMARY KEY (`id_nf`),
  ADD UNIQUE KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `nilai_formasi`
--
ALTER TABLE `nilai_formasi`
  ADD PRIMARY KEY (`id_f`);

--
-- Indexes for table `nilai_gerakan`
--
ALTER TABLE `nilai_gerakan`
  ADD PRIMARY KEY (`id_g`),
  ADD UNIQUE KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `nilai_juri`
--
ALTER TABLE `nilai_juri`
  ADD PRIMARY KEY (`id_nj`),
  ADD UNIQUE KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `nilai_kreasi`
--
ALTER TABLE `nilai_kreasi`
  ADD PRIMARY KEY (`id_k`),
  ADD UNIQUE KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `nilai_minus`
--
ALTER TABLE `nilai_minus`
  ADD PRIMARY KEY (`id_nm`),
  ADD UNIQUE KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `nilai_supporter`
--
ALTER TABLE `nilai_supporter`
  ADD PRIMARY KEY (`id_s`),
  ADD UNIQUE KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `nilai_variasi`
--
ALTER TABLE `nilai_variasi`
  ADD PRIMARY KEY (`id_v`),
  ADD UNIQUE KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nilai_danton`
--
ALTER TABLE `nilai_danton`
  MODIFY `id_d` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai_final`
--
ALTER TABLE `nilai_final`
  MODIFY `id_nf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nilai_formasi`
--
ALTER TABLE `nilai_formasi`
  MODIFY `id_f` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_gerakan`
--
ALTER TABLE `nilai_gerakan`
  MODIFY `id_g` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai_juri`
--
ALTER TABLE `nilai_juri`
  MODIFY `id_nj` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_kreasi`
--
ALTER TABLE `nilai_kreasi`
  MODIFY `id_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai_minus`
--
ALTER TABLE `nilai_minus`
  MODIFY `id_nm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai_supporter`
--
ALTER TABLE `nilai_supporter`
  MODIFY `id_s` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nilai_variasi`
--
ALTER TABLE `nilai_variasi`
  MODIFY `id_v` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2021 at 05:24 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bayar`
--

CREATE TABLE `jenis_bayar` (
  `id_jenis` int(11) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `th_pelajaran` varchar(10) NOT NULL,
  `tingkat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_bayar`
--

INSERT INTO `jenis_bayar` (`id_jenis`, `jumlah`, `th_pelajaran`, `tingkat`) VALUES
(17, '150000  ', '2020/2021', 'XI'),
(18, '180000', '2020/2021', 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `idjurusan` int(11) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`idjurusan`, `jurusan`) VALUES
(70, 'Rekayasa Perangkat Lunak'),
(1192, 'Teknik ELektronika Industri'),
(1289, 'Teknik Kendaraan Ringan'),
(1316, 'Teknik Sepeda Motor'),
(2063, 'Teknik Komputer dan Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `th_pelajaran` varchar(100) NOT NULL,
  `idjurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nis`, `kelas`, `th_pelajaran`, `idjurusan`) VALUES
(5, 0, 'XII TKRO 1', '2022/2023', 0),
(18, 0, 'XII RPL 3', '2020/2021', 70);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `bulan` varchar(100) NOT NULL,
  `tgl_bayar` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `nis`, `kelas`, `bulan`, `tgl_bayar`, `jumlah`) VALUES
(1, 3, 'xi', 'asd', 'sad', '213'),
(3, 0, '3', 'bln', 'tgl', '2000'),
(4, 3, 'SAD', 'bln', 'tgl', '123123'),
(5, 3, 'SAD', 'bln', 'tgl', '50000'),
(6, 3, 'XI RPL 3', 'bln', 'tgl', '232113'),
(7, 3, 'XI RPL 3', 'bln', 'tgl', '123123'),
(8, 3, 'XI RPL 3', 'March', 'Wed-Aug-2021', '123123'),
(9, 21, '', 'February', 'Sun-Aug-2021', '123123'),
(10, 33, '', 'July', 'Sat-Sep-2021', '200000000');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `idjurusan` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `idjurusan`, `id_kelas`) VALUES
(5, 'hjgghj', 1, 0),
(21, '12', 1, 0),
(23, '12', 1, 0),
(33, 'tes uzi', 1, 14),
(222, 'ntah', 23123, 0),
(34234, 'Anggi Arif ', 1289, 5),
(132123, 'Fauzi ikhsan', 34234, 0),
(222222, 'anto', 1, 0),
(823717, 'Muhammad Nurfauzi ikhsan', 70, 18);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `iduser` int(11) NOT NULL,
  `username` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `fullname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`iduser`, `username`, `password`, `admin`, `fullname`) VALUES
(9, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'admin'),
(10, 'uzi', 'd2a6e194da50ab1478744b3a74e3e003', 1, 'uzi'),
(11, 'fauzi', '0bd9897bf12294ce35fdc0e21065c8a7', 0, 'Muhammad Nurfauzi');

-- --------------------------------------------------------

--
-- Table structure for table `tapel`
--

CREATE TABLE `tapel` (
  `id_tapel` int(11) NOT NULL,
  `tapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `admin` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `admin`, `fullname`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 's', 's');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_bayar`
--
ALTER TABLE `jenis_bayar`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`idjurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `nis` (`nis`),
  ADD KEY `idjurusan` (`idjurusan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_jurusan` (`idjurusan`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `tapel`
--
ALTER TABLE `tapel`
  ADD PRIMARY KEY (`id_tapel`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_bayar`
--
ALTER TABLE `jenis_bayar`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `idjurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34235;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `nis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=823718;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tapel`
--
ALTER TABLE `tapel`
  MODIFY `id_tapel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

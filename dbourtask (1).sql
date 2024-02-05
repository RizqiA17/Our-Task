-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2024 at 03:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbourtask`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `nis` int(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`nis`, `nama`, `email`, `password`) VALUES
(69696969, 'Jajang Hideung Kawas Abu Gunung Sinabung', '1@email.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `group_kelompok`
--

CREATE TABLE `group_kelompok` (
  `id_kelompok` int(10) NOT NULL,
  `id_kelas` int(255) DEFAULT NULL,
  `id_tugas_group` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_mapel` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(4) NOT NULL,
  `nama_jurusan` varchar(255) DEFAULT NULL,
  `nis` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `nis`) VALUES
(3, 'PPLG', NULL),
(4, 'TJKT', NULL),
(5, 'DKV', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(6) NOT NULL,
  `id_juruasn` int(4) DEFAULT NULL,
  `tingkatan` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_juruasn`, `tingkatan`) VALUES
(1, NULL, 10),
(2, NULL, 11),
(3, NULL, 12);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(4) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`) VALUES
(1, 'Basa Jawa');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(10) NOT NULL,
  `nama_tugas` varchar(255) DEFAULT NULL,
  `tgl_dibuat` date DEFAULT current_timestamp(),
  `tgl_batas` date DEFAULT current_timestamp(),
  `mapel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tugas_group`
--

CREATE TABLE `tugas_group` (
  `id_tugas_group` int(10) NOT NULL,
  `nama_tugas_group` varchar(255) DEFAULT NULL,
  `tgl_dibuat_group` date DEFAULT current_timestamp(),
  `tgl_deadline_group` date DEFAULT current_timestamp(),
  `mapel` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `id_kelompok` int(10) DEFAULT NULL,
  `status_selesai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tugas_group`
--

INSERT INTO `tugas_group` (`id_tugas_group`, `nama_tugas_group`, `tgl_dibuat_group`, `tgl_deadline_group`, `mapel`, `keterangan`, `id_kelompok`, `status_selesai`) VALUES
(1, 'Implementasikan ke web', '2024-01-31', '2024-02-01', NULL, 'Ini keterangan Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem nulla deleniti repellat expedita, enim adipisci! Deleniti sed enim, ullam dicta quisquam harum commodi vel nihil obcaecati omnis, ab dolorum? Quas.', NULL, 0),
(2, 'sesorah basa jawa', '2024-02-04', '2024-02-02', 'Basa Jawa', 'buat sesorah dan maju', NULL, 95);

-- --------------------------------------------------------

--
-- Table structure for table `tugas_solo`
--

CREATE TABLE `tugas_solo` (
  `id_tugas_solo` int(10) NOT NULL,
  `nama_tugas_solo` varchar(255) DEFAULT NULL,
  `tgl_dibuat_solo` date DEFAULT current_timestamp(),
  `tgl_deadline_solo` date DEFAULT current_timestamp(),
  `keterangan` text DEFAULT NULL,
  `mapel` varchar(255) DEFAULT NULL,
  `status_selesai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tugas_solo`
--

INSERT INTO `tugas_solo` (`id_tugas_solo`, `nama_tugas_solo`, `tgl_dibuat_solo`, `tgl_deadline_solo`, `keterangan`, `mapel`, `status_selesai`) VALUES
(1, 'Design Database', '2024-01-31', '2024-02-01', 'Ini keterangan Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum delectus dignissimos voluptas fugiat, distinctio reiciendis laborum. Architecto vel reprehenderit iure dolores libero, voluptatem adipisci illo ipsa sapiente enim, natus quod?', NULL, 0),
(2, 'Makan Tempe Goreng', '2024-01-31', '2024-04-12', 'Tempe Goreng + Sambel!!!', NULL, 1),
(3, 'Nama Tugas', '2024-01-31', '2024-02-10', 'Keterangan Tugas', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `group_kelompok`
--
ALTER TABLE `group_kelompok`
  ADD PRIMARY KEY (`id_kelompok`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_juruasn` (`id_juruasn`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indexes for table `tugas_group`
--
ALTER TABLE `tugas_group`
  ADD PRIMARY KEY (`id_tugas_group`);

--
-- Indexes for table `tugas_solo`
--
ALTER TABLE `tugas_solo`
  ADD PRIMARY KEY (`id_tugas_solo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `group_kelompok`
--
ALTER TABLE `group_kelompok`
  MODIFY `id_kelompok` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `nip` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tugas_group`
--
ALTER TABLE `tugas_group`
  MODIFY `id_tugas_group` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tugas_solo`
--
ALTER TABLE `tugas_solo`
  MODIFY `id_tugas_solo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `group_kelompok`
--
ALTER TABLE `group_kelompok`
  ADD CONSTRAINT `group_kelompok_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `akun` (`nis`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_juruasn`) REFERENCES `jurusan` (`id_jurusan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

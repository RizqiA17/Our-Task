-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 19, 2024 at 04:54 PM
-- Server version: 8.3.0
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_our_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `distribution_kelas`
--

CREATE TABLE `distribution_kelas` (
  `id` int NOT NULL,
  `id_profile` int DEFAULT NULL,
  `id_kelas` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `distribution_kelas`
--


-- --------------------------------------------------------

--
-- Table structure for table `distribution_mapel`
--

CREATE TABLE `distribution_mapel` (
  `id` int NOT NULL,
  `id_profile` int DEFAULT NULL,
  `id_mapel` int DEFAULT NULL,
  `id_kelas` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `distribution_mapel`
--



-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int NOT NULL,
  `jurusan` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `jurusan`
--


-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int NOT NULL,
  `id_jurusan` int DEFAULT NULL,
  `sub_jurusan` int DEFAULT NULL,
  `grade` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `kelas`
--


-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` int NOT NULL,
  `mapel` varchar(17) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `mapel`
--

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int NOT NULL,
  `name` varchar(37) DEFAULT NULL,
  `no_induk` int DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(14) DEFAULT 'siswa',
  `pp_name` varchar(255) NOT NULL DEFAULT 'Profil.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `profile`
--
-- --------------------------------------------------------

--
-- Table structure for table `subtask_file`
--

CREATE TABLE `subtask_file` (
  `id` int NOT NULL,
  `id_subtask` int NOT NULL,
  `id_profile` int NOT NULL,
  `task_answer_file` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subtask_group`
--

CREATE TABLE `subtask_group` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description_file` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deadline` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_task` int NOT NULL,
  `progress` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'unfinished'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subtask_group`
--


-- --------------------------------------------------------

--
-- Table structure for table `subtask_group_distribution`
--

CREATE TABLE `subtask_group_distribution` (
  `id` int NOT NULL,
  `id_subtask` int NOT NULL,
  `id_profile` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subtask_group_distribution`
--


-- --------------------------------------------------------

--
-- Table structure for table `task_file`
--

CREATE TABLE `task_file` (
  `id` int NOT NULL,
  `id_task` int DEFAULT NULL,
  `id_profile` int NOT NULL,
  `task_answer_file` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `task_file`
--
---------------------------------------------------

--
-- Table structure for table `task_group`
--

CREATE TABLE `task_group` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `task_description_file` varchar(255) DEFAULT NULL,
  `id_mapel` int DEFAULT NULL,
  `id_kelas` int DEFAULT NULL,
  `id_guru` int DEFAULT NULL,
  `tgl_dibuat` datetime DEFAULT CURRENT_TIMESTAMP,
  `tgl_deadline` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `task_group`
--
-------------------------------------------------------

--
-- Table structure for table `task_group_distribution`
--

CREATE TABLE `task_group_distribution` (
  `id` int NOT NULL,
  `id_task` int DEFAULT NULL,
  `id_leader` int DEFAULT NULL,
  `id_profile` int DEFAULT NULL,
  `id_profile_leader` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `task_group_distribution`
--


-- --------------------------------------------------------

--
-- Table structure for table `task_group_leader`
--

CREATE TABLE `task_group_leader` (
  `id` int NOT NULL,
  `id_task` int NOT NULL,
  `id_profile` int DEFAULT NULL,
  `progress` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_group_leader`
--

-- --------------------------------------------------------

--
-- Table structure for table `task_solo`
--

CREATE TABLE `task_solo` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `task_description_file` varchar(255) DEFAULT NULL,
  `id_mapel` int DEFAULT NULL,
  `id_kelas` int DEFAULT NULL,
  `id_guru` int DEFAULT NULL,
  `tgl_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_deadline` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `task_solo`
--

-- --------------------------------------------------------

--
-- Table structure for table `task_solo_distribution`
--

CREATE TABLE `task_solo_distribution` (
  `id` int NOT NULL,
  `id_task` int DEFAULT NULL,
  `id_profile` int DEFAULT NULL,
  `progress` varchar(10) NOT NULL DEFAULT 'unfinished'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `task_solo_distribution`
--



--
-- Indexes for dumped tables
--

--
-- Indexes for table `distribution_kelas`
--
ALTER TABLE `distribution_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_profile` (`id_profile`,`id_kelas`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `distribution_mapel`
--
ALTER TABLE `distribution_mapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_profile` (`id_profile`,`id_mapel`,`id_kelas`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subtask_file`
--
ALTER TABLE `subtask_file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_subtask` (`id_subtask`,`id_profile`),
  ADD KEY `id_profile` (`id_profile`);

--
-- Indexes for table `subtask_group`
--
ALTER TABLE `subtask_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_task` (`id_task`);

--
-- Indexes for table `subtask_group_distribution`
--
ALTER TABLE `subtask_group_distribution`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_subtask` (`id_subtask`),
  ADD KEY `id_profile` (`id_profile`);

--
-- Indexes for table `task_file`
--
ALTER TABLE `task_file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_task` (`id_task`),
  ADD KEY `id_profile` (`id_profile`);

--
-- Indexes for table `task_group`
--
ALTER TABLE `task_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mapel` (`id_mapel`,`id_kelas`,`id_guru`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `task_group_distribution`
--
ALTER TABLE `task_group_distribution`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_task` (`id_task`,`id_profile`),
  ADD KEY `id_profile` (`id_profile`),
  ADD KEY `id_leader` (`id_leader`),
  ADD KEY `id_profile_leader` (`id_profile_leader`);

--
-- Indexes for table `task_group_leader`
--
ALTER TABLE `task_group_leader`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tugas` (`id_task`,`id_profile`);

--
-- Indexes for table `task_solo`
--
ALTER TABLE `task_solo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mapel` (`id_mapel`,`id_kelas`,`id_guru`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `task_solo_distribution`
--
ALTER TABLE `task_solo_distribution`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_task` (`id_task`,`id_profile`),
  ADD KEY `id_profile` (`id_profile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `distribution_mapel`
--
ALTER TABLE `distribution_mapel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=844;

--
-- AUTO_INCREMENT for table `subtask_file`
--
ALTER TABLE `subtask_file`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subtask_group`
--
ALTER TABLE `subtask_group`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `subtask_group_distribution`
--
ALTER TABLE `subtask_group_distribution`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `task_file`
--
ALTER TABLE `task_file`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `task_group`
--
ALTER TABLE `task_group`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `task_group_distribution`
--
ALTER TABLE `task_group_distribution`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2716;

--
-- AUTO_INCREMENT for table `task_group_leader`
--
ALTER TABLE `task_group_leader`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT for table `task_solo`
--
ALTER TABLE `task_solo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `task_solo_distribution`
--
ALTER TABLE `task_solo_distribution`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1513;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `distribution_kelas`
--
ALTER TABLE `distribution_kelas`
  ADD CONSTRAINT `distribution_kelas_ibfk_1` FOREIGN KEY (`id_profile`) REFERENCES `profile` (`id`),
  ADD CONSTRAINT `distribution_kelas_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`);

--
-- Constraints for table `distribution_mapel`
--
ALTER TABLE `distribution_mapel`
  ADD CONSTRAINT `distribution_mapel_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id`),
  ADD CONSTRAINT `distribution_mapel_ibfk_2` FOREIGN KEY (`id_profile`) REFERENCES `profile` (`id`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id`);

--
-- Constraints for table `subtask_file`
--
ALTER TABLE `subtask_file`
  ADD CONSTRAINT `subtask_file_ibfk_1` FOREIGN KEY (`id_profile`) REFERENCES `profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subtask_file_ibfk_2` FOREIGN KEY (`id_subtask`) REFERENCES `subtask_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subtask_group`
--
ALTER TABLE `subtask_group`
  ADD CONSTRAINT `subtask_group_ibfk_1` FOREIGN KEY (`id_task`) REFERENCES `task_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subtask_group_distribution`
--
ALTER TABLE `subtask_group_distribution`
  ADD CONSTRAINT `subtask_group_distribution_ibfk_1` FOREIGN KEY (`id_subtask`) REFERENCES `subtask_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subtask_group_distribution_ibfk_2` FOREIGN KEY (`id_profile`) REFERENCES `profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task_file`
--
ALTER TABLE `task_file`
  ADD CONSTRAINT `task_file_ibfk_1` FOREIGN KEY (`id_task`) REFERENCES `task_solo` (`id`),
  ADD CONSTRAINT `task_file_ibfk_3` FOREIGN KEY (`id_profile`) REFERENCES `profile` (`id`);

--
-- Constraints for table `task_group`
--
ALTER TABLE `task_group`
  ADD CONSTRAINT `task_group_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id`),
  ADD CONSTRAINT `task_group_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `task_group_ibfk_3` FOREIGN KEY (`id_guru`) REFERENCES `profile` (`id`);

--
-- Constraints for table `task_group_distribution`
--
ALTER TABLE `task_group_distribution`
  ADD CONSTRAINT `task_group_distribution_ibfk_3` FOREIGN KEY (`id_profile`) REFERENCES `profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_group_distribution_ibfk_5` FOREIGN KEY (`id_leader`) REFERENCES `task_group_leader` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_group_distribution_ibfk_6` FOREIGN KEY (`id_task`) REFERENCES `task_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_group_distribution_ibfk_7` FOREIGN KEY (`id_profile_leader`) REFERENCES `profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task_group_leader`
--
ALTER TABLE `task_group_leader`
  ADD CONSTRAINT `task_group_leader_ibfk_1` FOREIGN KEY (`id_task`) REFERENCES `task_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task_solo`
--
ALTER TABLE `task_solo`
  ADD CONSTRAINT `task_solo_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `task_solo_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `profile` (`id`),
  ADD CONSTRAINT `task_solo_ibfk_3` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id`);

--
-- Constraints for table `task_solo_distribution`
--
ALTER TABLE `task_solo_distribution`
  ADD CONSTRAINT `task_solo_distribution_ibfk_2` FOREIGN KEY (`id_task`) REFERENCES `task_solo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_solo_distribution_ibfk_3` FOREIGN KEY (`id_profile`) REFERENCES `profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

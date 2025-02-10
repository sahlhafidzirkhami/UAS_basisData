-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2025 at 12:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pegawai`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_pegawai_jabatan` ()   BEGIN
    SELECT 
        p.id_pegawai, 
        p.nama, 
        p.alamat, 
        p.tanggal_lahir, 
        p.jenis_kelamin, 
        j.nama_jabatan, 
        c.nama_cabang, 
        j.gaji_pokok
    FROM pegawai p
    JOIN jabatan j ON p.id_jabatan = j.id_jabatan
    JOIN cabang c ON p.id_cabang = c.id_cabang
    ORDER BY p.nama;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `id_cabang` int(11) NOT NULL,
  `nama_cabang` varchar(100) NOT NULL,
  `alamat_cabang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id_cabang`, `nama_cabang`, `alamat_cabang`) VALUES
(1, 'Bandung', 'Dago'),
(2, 'Jakarta', 'Blok M'),
(5, 'Semarang', 'kali pancur'),
(8, 'Bali', 'Kuta');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `gaji_pokok` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `gaji_pokok`) VALUES
(2, 'Personal Trainer I', 6000000.00);

--
-- Triggers `jabatan`
--
DELIMITER $$
CREATE TRIGGER `after_gaji_update` AFTER UPDATE ON `jabatan` FOR EACH ROW BEGIN
    IF OLD.gaji_pokok <> NEW.gaji_pokok THEN
        INSERT INTO riwayat_gaji (id_jabatan, gaji_lama, gaji_baru, tanggal_perubahan)
        VALUES (OLD.id_jabatan, OLD.gaji_pokok, NEW.gaji_pokok, NOW());
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `id_cabang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `alamat`, `tanggal_lahir`, `jenis_kelamin`, `id_jabatan`, `id_cabang`) VALUES
(1, 'Ahmad Fauzi', 'Jl. Merdeka No. 10, Bandung', '1990-05-12', 'L', 2, 5),
(2, 'Siti Aisyah', 'Jl. Dipatiukur No. 22, Bandung', '1995-08-25', 'P', 2, 5),
(3, 'hafidz', 'bandung', '2025-02-10', 'L', 2, 5),
(4, 'Rina Kusuma', 'Jl. Braga No. 30, Bandung', '1993-11-05', 'P', 2, 5),
(5, 'Dewi Anggraini', 'Jl. Setiabudi No. 50, Bandung', '1997-07-20', 'P', 2, 5),
(6, 'Hendra Saputra', 'Jl. Riau No. 12, Bandung', '1992-04-14', 'L', 2, 5),
(7, 'Nurul Hidayah', 'Jl. Dago No. 8, Bandung', '1996-09-09', 'P', 2, 5),
(8, 'Andi Pratama', 'Jl. Sukajadi No. 25, Bandung', '1991-12-30', 'L', 2, 5),
(9, 'Lilis Suryani', 'Jl. Cihampelas No. 40, Bandung', '1998-06-11', 'P', 2, 5),
(10, 'Rahmat Hidayat', 'Jl. Pasteur No. 5, Bandung', '1994-03-22', 'L', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_gaji`
--

CREATE TABLE `riwayat_gaji` (
  `id_riwayat` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `gaji_lama` decimal(10,2) NOT NULL,
  `gaji_baru` decimal(10,2) NOT NULL,
  `tanggal_perubahan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat_gaji`
--

INSERT INTO `riwayat_gaji` (`id_riwayat`, `id_jabatan`, `gaji_lama`, `gaji_baru`, `tanggal_perubahan`) VALUES
(2, 2, 3000000.00, 6000000.00, '2025-02-10 05:38:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id_cabang`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_cabang` (`id_cabang`);

--
-- Indexes for table `riwayat_gaji`
--
ALTER TABLE `riwayat_gaji`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id_cabang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `riwayat_gaji`
--
ALTER TABLE `riwayat_gaji`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`),
  ADD CONSTRAINT `pegawai_ibfk_2` FOREIGN KEY (`id_cabang`) REFERENCES `cabang` (`id_cabang`);

--
-- Constraints for table `riwayat_gaji`
--
ALTER TABLE `riwayat_gaji`
  ADD CONSTRAINT `riwayat_gaji_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 08, 2026 at 04:52 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `alamat` text NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `nama`, `email`, `no_hp`, `alamat`, `tgl_daftar`) VALUES
(31, 'Budi Santoso', 'budi@gmail.com', '081234567890', 'Malang', '2026-01-10'),
(32, 'Siti Aminah', 'siti@gmail.com', '081234567891', 'Surabaya', '2026-01-12'),
(33, 'Ahmad Dani', 'dani@gmail.com', '081234567892', 'Blitar', '2026-01-15'),
(34, 'Dewi Lestari', 'dewi@gmail.com', '081234567893', 'Kediri', '2026-01-20'),
(35, 'Rian Pratama', 'rian@gmail.com', '081234567894', 'Jember', '2026-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int NOT NULL,
  `kode_buku` varchar(10) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `pengarang` varchar(50) NOT NULL,
  `tahun` int NOT NULL,
  `stok` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `kode_buku`, `judul`, `pengarang`, `tahun`, `stok`) VALUES
(1, 'BK-001', 'Pemrograman Web', 'Andi Prasetyo', 2023, 5),
(2, 'BK-002', 'Basis Data MySQL', 'Budi Raharjo', 2022, 2),
(3, 'BK-003', 'Algoritma Pemrograman', 'Rinaldi Munir', 2021, 1),
(4, 'BK-004', 'Struktur Data', 'Rosa A.S.', 2020, 10),
(5, 'BK-005', 'Jaringan Komputer', 'Tanjung S.', 2023, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `id_pinjam` int NOT NULL,
  `id_anggota` int NOT NULL,
  `id_buku` int NOT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'dipinjam',
  `denda` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`id_pinjam`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `status`, `denda`) VALUES
(1, 1, 1, '2026-06-01', '2026-11-08', 'Dikembalikan', 0),
(2, 2, 2, '2026-06-02', NULL, 'Dipinjam', 0),
(3, 3, 3, '2026-06-03', NULL, 'Dipinjam', 0),
(4, 4, 4, '2026-06-04', '2026-06-07', 'Dikembalikan', 0),
(5, 5, 5, '2026-06-05', NULL, 'Dipinjam', 0),
(6, 1, 1, '2026-06-01', NULL, 'Dipinjam', 0),
(7, 2, 2, '2026-06-02', NULL, 'Dipinjam', 0),
(8, 3, 3, '2026-06-03', NULL, 'Dipinjam', 0),
(9, 4, 4, '2026-06-04', '2026-06-07', 'Dikembalikan', 0),
(10, 5, 5, '2026-06-05', NULL, 'Dipinjam', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD UNIQUE KEY `kode_buku` (`kode_buku`),
  ADD UNIQUE KEY `kode_buku_2` (`kode_buku`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `id_pinjam` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

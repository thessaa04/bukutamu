-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2024 at 03:08 AM
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
-- Database: `buku tamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `id_alat` int(11) NOT NULL,
  `nama_alat` varchar(255) NOT NULL,
  `merk_tipe_no_seri` varchar(255) DEFAULT NULL,
  `harga_satuan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

CREATE TABLE `buku_tamu` (
  `id_tamu` int(11) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `keperluan` text DEFAULT NULL,
  `unit_dituju` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku_tamu`
--

INSERT INTO `buku_tamu` (`id_tamu`, `nama_lengkap`, `instansi`, `alamat`, `no_telepon`, `keperluan`, `unit_dituju`, `created_at`) VALUES
(1, 'Theresia', 'unud', 'poh gading', '2222', 'wawancara tentang cuaca', 'meteorologi', '2024-08-07 03:33:57'),
(9, 'aaa', 'aa', 'aa', '2222', 'wawancara tentang cuaca', 'meteorologi', '2024-08-07 04:07:56');

-- --------------------------------------------------------

--
-- Table structure for table `data_inskal`
--

CREATE TABLE `data_inskal` (
  `id_inskal` int(11) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `cara_pengambilan` varchar(255) DEFAULT NULL,
  `kegunaan` varchar(255) DEFAULT NULL,
  `id_alat` int(11) DEFAULT NULL,
  `id_permohonan` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form_kepuasan`
--

CREATE TABLE `form_kepuasan` (
  `id_form` int(11) NOT NULL,
  `id_tamu` int(11) NOT NULL,
  `kesopanan` enum('Sangat Sopan dan Ramah','Sopan dan Ramah','Kurang Sopan dan Ramah','Tidak Sopan dan Tidak Ramah') NOT NULL,
  `kecakapan` enum('Sangat Cakap','Cakap','Kurang Cakap','Tidak Cakap') NOT NULL,
  `kenyamanan` enum('Sangat Nyaman','Nyaman','Kurang Nyaman','Tidak Nyaman') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `nama_layanan` varchar(255) NOT NULL,
  `deskripsi_layanan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permohonan`
--

CREATE TABLE `permohonan` (
  `id_permohonan` int(11) NOT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `no_tlp` varchar(20) DEFAULT NULL,
  `jalan` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kelurahan` varchar(255) DEFAULT NULL,
  `kota_provinsi` varchar(255) DEFAULT NULL,
  `tujuan` text DEFAULT NULL,
  `PNBP` varchar(100) DEFAULT NULL,
  `tanggal_kejadian` date DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_layanan` int(11) DEFAULT NULL,
  `id_surat` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat` int(11) NOT NULL,
  `jenis` varchar(100) DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `path_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `metode` varchar(100) DEFAULT NULL,
  `total_harga` varchar(100) DEFAULT NULL,
  `ebiling_bayar` blob DEFAULT NULL,
  `ebiling_lunas` blob DEFAULT NULL,
  `bukti_bayar` blob DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_permohonan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `identitas` blob DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `identitas`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Maedelien Tiffany Kariesta Simatupang', 'yyy@gmail.com', 0x75706c6f6164732f6964656e74697461732f363662313739616334353461642e6a7067, NULL, '$2y$10$NT3VOBAJbg5.QflagVgGk.EXX.0qO2qEaHArUJfdelIE/yZdpfLlC', 'pengguna', NULL, '2024-08-06 08:17:32', '2024-08-06 08:17:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indexes for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- Indexes for table `data_inskal`
--
ALTER TABLE `data_inskal`
  ADD PRIMARY KEY (`id_inskal`),
  ADD KEY `id_alat` (`id_alat`),
  ADD KEY `id_permohonan` (`id_permohonan`);

--
-- Indexes for table `form_kepuasan`
--
ALTER TABLE `form_kepuasan`
  ADD PRIMARY KEY (`id_form`),
  ADD KEY `id_tamu` (`id_tamu`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`id_permohonan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_layanan` (`id_layanan`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_permohonan` (`id_permohonan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  MODIFY `id_tamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `data_inskal`
--
ALTER TABLE `data_inskal`
  MODIFY `id_inskal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_kepuasan`
--
ALTER TABLE `form_kepuasan`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `id_permohonan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_inskal`
--
ALTER TABLE `data_inskal`
  ADD CONSTRAINT `data_inskal_ibfk_1` FOREIGN KEY (`id_alat`) REFERENCES `alat` (`id_alat`),
  ADD CONSTRAINT `data_inskal_ibfk_2` FOREIGN KEY (`id_permohonan`) REFERENCES `permohonan` (`id_permohonan`);

--
-- Constraints for table `form_kepuasan`
--
ALTER TABLE `form_kepuasan`
  ADD CONSTRAINT `form_kepuasan_ibfk_1` FOREIGN KEY (`id_tamu`) REFERENCES `buku_tamu` (`id_tamu`);

--
-- Constraints for table `permohonan`
--
ALTER TABLE `permohonan`
  ADD CONSTRAINT `permohonan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `permohonan_ibfk_2` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`),
  ADD CONSTRAINT `permohonan_ibfk_3` FOREIGN KEY (`id_surat`) REFERENCES `surat_keluar` (`id_surat`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_permohonan`) REFERENCES `permohonan` (`id_permohonan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

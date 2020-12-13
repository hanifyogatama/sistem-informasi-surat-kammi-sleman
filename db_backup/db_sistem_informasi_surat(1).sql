-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2020 at 05:47 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sistem_informasi_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id_departemen` int(11) NOT NULL,
  `nama_departemen` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id_departemen`, `nama_departemen`) VALUES
(1, 'Sosial dan masyarakat'),
(13, 'Kaderisasi'),
(14, 'Bendahara'),
(15, 'Sekretaris');

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id_disposisi` int(11) NOT NULL,
  `id_surat_masuk` int(11) NOT NULL,
  `id_departemen` int(11) NOT NULL,
  `batas_waktu` date NOT NULL,
  `id_status_surat` int(11) NOT NULL,
  `isi` varchar(200) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id_instansi` int(11) NOT NULL,
  `nama_instansi` varchar(200) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id_instansi`, `nama_instansi`, `alamat`) VALUES
(29, 'Kammi UNY', 'Yogyakarta'),
(30, 'Kammi Amikom', 'Yogyakarta'),
(31, 'Kammi UII', 'Yogyakarta'),
(32, 'Kammi Instiper', 'Yogyakarta'),
(33, 'Kammi UPN Veteran Yk', 'Yogyakarta'),
(34, 'Kammi UGM', 'Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `status_active`
--

CREATE TABLE `status_active` (
  `id_status_active` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_active`
--

INSERT INTO `status_active` (`id_status_active`, `status`) VALUES
(0, 'Non-Active'),
(1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `status_surat`
--

CREATE TABLE `status_surat` (
  `id_status_surat` int(11) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_surat`
--

INSERT INTO `status_surat` (`id_status_surat`, `status`) VALUES
(15, 'Rahasia'),
(16, 'Umum');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat_keluar` int(11) NOT NULL,
  `no_surat` varchar(150) NOT NULL,
  `id_instansi` int(11) NOT NULL,
  `id_status_surat` int(11) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `isi` varchar(200) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `file_surat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_surat_keluar`, `no_surat`, `id_instansi`, `id_status_surat`, `tanggal_surat`, `isi`, `keterangan`, `file_surat`) VALUES
(10, 'AB/552', 33, 16, '2020-12-14', 'sasa', 'sasa', '2020-Newsletter-PIKA-Februari23.pdf'),
(11, 'AB/551', 34, 16, '2020-12-01', 'typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software li', 'ssasas', '2020-Newsletter-PIKA-Februari24.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat_masuk` int(11) NOT NULL,
  `no_surat` varchar(200) NOT NULL,
  `id_instansi` int(11) NOT NULL,
  `id_status_surat` int(11) NOT NULL,
  `isi` varchar(200) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `file_surat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat_masuk`, `no_surat`, `id_instansi`, `id_status_surat`, `isi`, `tanggal_surat`, `tanggal_diterima`, `keterangan`, `file_surat`) VALUES
(38, 'AB/552', 34, 16, 'he 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2020-12-07', '2020-12-12', 'he 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Tugas_4_Hanif_Yogatama.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `id_role` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tanggal_dibuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `gambar`, `password`, `id_role`, `is_active`, `tanggal_dibuat`) VALUES
(4, 'Kammi Kamda Sleman', 'kammisleman@gmail.com', 'logo-kammi-revisi.jpg', '$2y$10$ZAryLwpf97cykylw9l6RF.8U0.LiXfmUeGU/EDWwKoT64x3MQiFTi', 1, 1, 1606183799),
(6, 'Sekretaris', 'sekretariskammisleman@gmail.com', 'default.png', '$2y$10$CBv2zmo3BVtBUsPsk6OQJes0I5bMbh/ZLHrlyYSgp006KiWuB/6FC', 2, 1, 1607131353),
(11, 'test', 'test@yahoo.com', 'default.png', '$2y$10$HmKLCuC3ih3Wf5gzaCiS8ODSWlN/TcFryDEhXHRNfAuAdKeM86gye', 2, 1, 1607823531);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id_acces_menu` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id_acces_menu`, `id_role`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(4, 1, 3),
(6, 1, 7),
(7, 1, 8),
(8, 2, 8),
(9, 2, 7),
(10, 1, 9),
(11, 1, 6),
(12, 2, 10),
(13, 2, 6),
(15, 1, 10),
(16, 1, 16),
(17, 2, 16),
(18, 1, 5),
(19, 1, 4),
(20, 2, 4),
(21, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id_menu`, `menu`) VALUES
(1, 'Home'),
(2, 'Admin'),
(4, 'User'),
(5, 'Menu'),
(6, 'Data Master'),
(7, 'Transaksi Surat'),
(10, 'Laporan');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'Sekretaris');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id_sub_menu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id_sub_menu`, `id_menu`, `title`, `url`, `icon`, `is_active`) VALUES
(2, 4, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 4, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 5, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 5, 'Sub Menu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 2, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 7, 'Surat Masuk', 'suratmasuk', 'fas fa-fw fa-envelope-open-text', 1),
(9, 7, 'Surat Keluar', 'suratkeluar', 'fas fa-fw fa-envelope', 1),
(10, 4, 'Ubah Password', 'user/ubahpassword', 'fas fa-fw fa-key', 1),
(11, 8, 'Departemen', 'departemen', 'fas fa-fw fa-user-friends', 1),
(12, 2, 'Backup Data', 'admin/backupdata', 'fas fa-fw fa-database', 1),
(13, 2, 'User Management', 'admin/user_management', 'fas fa-fw fa-users-cog', 1),
(14, 6, 'Instansi', 'instansi', 'fas fa-fw fa-user-tie', 1),
(15, 6, 'Departemen', 'departemen', 'fas fa-fw fa-building', 1),
(16, 6, 'Status Surat', 'statussurat', 'fas fa-fw fa-mail-bulk', 1),
(17, 10, 'Laporan', 'laporan', 'fas fa-fw fa-file-alt', 1),
(21, 1, 'Dashboard', 'dashboard', 'fas fa-fw fa-tachometer-alt', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_departemen`);

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `status_active`
--
ALTER TABLE `status_active`
  ADD PRIMARY KEY (`id_status_active`);

--
-- Indexes for table `status_surat`
--
ALTER TABLE `status_surat`
  ADD PRIMARY KEY (`id_status_surat`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`),
  ADD UNIQUE KEY `no_surat` (`no_surat`),
  ADD UNIQUE KEY `no_surat_2` (`no_surat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id_acces_menu`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id_sub_menu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id_departemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id_instansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `status_active`
--
ALTER TABLE `status_active`
  MODIFY `id_status_active` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_surat`
--
ALTER TABLE `status_surat`
  MODIFY `id_status_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id_acces_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

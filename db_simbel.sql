-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2021 at 03:08 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simbel`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` varchar(250) NOT NULL,
  `id_user` varchar(256) NOT NULL,
  `nama_guru` varchar(256) NOT NULL,
  `jekel` varchar(20) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `telp` varchar(256) NOT NULL,
  `temp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `id_user`, `nama_guru`, `jekel`, `alamat`, `telp`, `temp`) VALUES
('G-001', 'U-004', 'Indra Jaya', 'L', 'Jl.Rimbo Data Rt.03 Rw.01, Kelurahan Banda Buek, Kecamatan Lubuk Kilangan, Padang', '08323238833', 1),
('G-002', 'U-005', 'hendra., S,PD', 'L', 'Jl.Rimbo Data Rt.03 Rw.01, Kelurahan Banda Buek, Kecamatan Lubuk Kilangan, Padang', '08323238833', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_guru` varchar(100) NOT NULL,
  `id_jenis_program` int(11) NOT NULL,
  `hari` varchar(200) NOT NULL,
  `jam` time NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `id_mapel`, `id_guru`, `id_jenis_program`, `hari`, `jam`, `keterangan`) VALUES
(14, 1, 'G-001', 3, 'senin', '17:00:00', '-'),
(15, 2, 'G-002', 3, 'selasa', '17:00:00', '-');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_program`
--

CREATE TABLE `jenis_program` (
  `id` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `harga` double NOT NULL,
  `kuota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_program`
--

INSERT INTO `jenis_program` (`id`, `id_program`, `harga`, `kuota`) VALUES
(1, 1, 350000, 22),
(2, 2, 450000, 11),
(3, 3, 600000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL,
  `nama_mapel` varchar(256) NOT NULL,
  `keterangan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `nama_mapel`, `keterangan`) VALUES
(1, 'matematika', ''),
(2, 'bahasa inggris', ''),
(3, 'bahasa indonesia', ''),
(4, 'IPA', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` varchar(100) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `jumlah_bayar` double NOT NULL,
  `jenis_pembayaran` varchar(250) NOT NULL,
  `bukti` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `temp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_pendaftaran`, `tgl_bayar`, `jumlah_bayar`, `jenis_pembayaran`, `bukti`, `status`, `keterangan`, `temp`) VALUES
('PBY2981', 1, '2121-02-17', 600000, '', 'sat1.jpg', 2, '', 1),
('PBY2982', 2, '2021-06-12', 600000, '', 'moodboard.jpg', 2, '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `id_jenis_program` int(11) NOT NULL,
  `id_user` varchar(200) NOT NULL,
  `harga` double NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `id_jenis_program`, `id_user`, `harga`, `status`) VALUES
(1, 3, 'U-002', 600000, 1),
(2, 3, 'U-006', 600000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` varchar(200) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tempat_lahir` varchar(200) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `sekolah` varchar(256) NOT NULL,
  `nama_ortu` varchar(100) NOT NULL,
  `pekerjaan_ortu` varchar(250) NOT NULL,
  `alamat` text NOT NULL,
  `temp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `id_user`, `nama`, `kelas`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `sekolah`, `nama_ortu`, `pekerjaan_ortu`, `alamat`, `temp`) VALUES
('S-001', 'U-002', 'Satria Rahmat Putra', '3', 'L', 'padang', '2021-02-08', 'SMP N 11 PADANG', 'Nur', 'swasta', 'Jl.Rimbo Data Rt.03 Rw.01, Kelurahan Banda Buek, Kecamatan Lubuk Kilangan, Padang', 1);

-- --------------------------------------------------------

--
-- Table structure for table `siswa_pendaftaran`
--

CREATE TABLE `siswa_pendaftaran` (
  `id` int(11) NOT NULL,
  `id_siswa` varchar(200) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `keterangan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_pendaftaran`
--

INSERT INTO `siswa_pendaftaran` (`id`, `id_siswa`, `id_pendaftaran`, `status`, `keterangan`) VALUES
(5, 'S-001', 1, 1, 'lunas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_program`
--

CREATE TABLE `tb_program` (
  `id` int(11) NOT NULL,
  `nama_program` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_program`
--

INSERT INTO `tb_program` (`id`, `nama_program`) VALUES
(1, 'Low'),
(2, 'VIP'),
(3, 'VVIP');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(100) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `no_telp` varchar(200) NOT NULL,
  `image` varchar(150) NOT NULL,
  `password` varchar(260) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `temp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `no_telp`, `image`, `password`, `role_id`, `is_active`, `date_created`, `temp`) VALUES
('0', 'admin', 'admin@gmail.com', '', 'default.png', '$2y$10$hWI2gkMUd9sX06bgXu6QIO7GPIlqUHEeMAd3AC5qqXCIX7N5qv.AS', 1, 1, 1601653500, 1),
('U-002', 'Satria Rahmat Putra', 'satriarahmatputra@gmail.com', '08323238833', 'default.png', '$2y$10$n1hr70uFOPx9fEGHf5qc4eSfMOT8rHEfGDhl7vDkaZxqUmtNMFMdO', 2, 1, 1613550185, 2),
('U-004', 'Indra Jaya', 'indrajaya@gmail.com', '', 'default.png', '$2y$10$zDlS9C.Ykb4kRD2C49OnneGQepD/V4XPU2iE3BRPitKGeD6FomYvu', 3, 1, 1614010248, 4),
('U-005', 'hendra., S,PD', 'hendra@gmail.com', '', 'default.png', '$2y$10$hUb3vYJ17.YuyeizgqWZf.5jWIugjqRjA89yi8bGH4Le4R0aOYH/W', 3, 1, 1614010267, 5),
('U-006', 'bunga putri', 'bunga@gmail.com', '082323232', 'default.png', '$2y$10$sxw3mQbkrp.WWtUKqpn6oOfkcuKpGifzZNRNrvo3VGuwg3uVn1qV.', 2, 1, 1623500344, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(12, 1, 1),
(13, 1, 2),
(14, 1, 3),
(16, 2, 5),
(17, 2, 4),
(18, 1, 6),
(19, 2, 7),
(20, 3, 11),
(21, 1, 9),
(22, 3, 10),
(23, 2, 12),
(24, 3, 13);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Dashboard'),
(2, 'Program'),
(3, 'Konfirmasi'),
(4, 'Dashboard'),
(5, 'Bodata'),
(6, 'jadwal'),
(7, 'Jadwal'),
(9, 'Data'),
(10, 'Dashboard'),
(11, 'Jadwal'),
(12, 'Akun'),
(13, 'Akun');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(130) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'siswa'),
(3, 'guru');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(120) NOT NULL,
  `url` varchar(120) NOT NULL,
  `icon` varchar(120) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(17, 1, 'Dashboard', 'Admin', 'fas fa-fw fa-user-circle', 1),
(18, 1, 'pegawai', 'Pegawai', 'fas fa-fw fa-user-circle', 0),
(19, 2, 'Program', 'Program', '', 1),
(20, 2, 'Jenis Program', 'Program/index_JP', '', 1),
(23, 3, 'Konfirmasi Siswa', 'Konfirmasi/siswa', '', 1),
(24, 5, 'Data Diri', 'datadiri', '', 1),
(25, 4, 'Dashboard', 'siswa', '', 1),
(26, 6, 'Kelola jadwal', 'jadwal', '', 1),
(27, 3, 'Konfirmasi Guru', 'konfirmasi/guru', '', 1),
(28, 7, 'jadwal ku', 'siswa/jadwal', '', 1),
(29, 11, 'Mengajar', 'guru/jadwal', '', 1),
(30, 9, 'Guru', 'data', '', 1),
(31, 9, 'siswa', 'data/siswa', '', 1),
(32, 10, 'Dashboard', 'guru', '', 1),
(33, 12, 'Ganti Password', 'siswa/ganti_pass', '', 1),
(34, 13, 'Ganti Password', 'guru/ganti-password', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `temp` (`temp`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_program`
--
ALTER TABLE `jenis_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `temp` (`temp`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `temp` (`temp`);

--
-- Indexes for table `siswa_pendaftaran`
--
ALTER TABLE `siswa_pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_program`
--
ALTER TABLE `tb_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`temp`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jenis_program`
--
ALTER TABLE `jenis_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa_pendaftaran`
--
ALTER TABLE `siswa_pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_program`
--
ALTER TABLE `tb_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

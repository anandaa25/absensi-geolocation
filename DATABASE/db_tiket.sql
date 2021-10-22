-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2021 at 06:22 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tiket`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `kode_booking` varchar(100) NOT NULL,
  `tgl_booking` date NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `jml_penumpang` int(11) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`kode_booking`, `tgl_booking`, `id_jadwal`, `jml_penumpang`, `id_pelanggan`) VALUES
('BK0001', '2021-09-05', 8, 2, 'P-003'),
('BK00010', '2021-09-22', 14, 1, 'P-003'),
('BK0002', '2021-09-05', 9, 2, 'P-003'),
('BK0003', '2021-09-05', 8, 1, 'P-001'),
('BK0004', '2021-09-06', 9, 2, 'P-001'),
('BK0005', '2021-09-08', 11, 2, 'P-004'),
('BK0006', '2021-09-15', 12, 1, 'P-003'),
('BK0007', '2021-09-16', 13, 2, 'P-003'),
('BK0008', '2021-09-22', 14, 2, 'P-005'),
('BK0009', '2021-09-22', 14, 1, 'P-003');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id_bus` int(11) NOT NULL,
  `nama_bus` varchar(200) NOT NULL,
  `fasilitas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id_bus`, `nama_bus`, `fasilitas`) VALUES
(3, 'BUS EKSKUTIF - PCX', 'AC, WIFI, TOILET'),
(4, 'BUS REGULER PCX', 'TOILET');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_bus` int(11) NOT NULL,
  `id_asal` int(11) NOT NULL,
  `id_tujuan` int(11) NOT NULL,
  `tgl_berangkat` datetime NOT NULL,
  `harga` double NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_bus`, `id_asal`, `id_tujuan`, `tgl_berangkat`, `harga`, `status`) VALUES
(8, 3, 4, 5, '2021-09-06 11:37:00', 3000000, 1),
(9, 4, 4, 5, '2021-09-06 11:37:00', 2000000, 0),
(10, 3, 4, 5, '2021-09-07 14:36:00', 3000000, 0),
(11, 4, 4, 7, '2021-09-09 05:56:00', 3000000, 0),
(12, 4, 4, 6, '2021-09-16 15:07:00', 250000, 0),
(13, 4, 4, 5, '2021-09-17 09:59:00', 200000, 0),
(14, 3, 4, 5, '2021-09-22 00:49:00', 250000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kursi`
--

CREATE TABLE `kursi` (
  `id_kursi` int(50) NOT NULL,
  `id_jadwal` int(50) NOT NULL,
  `no_kursi` int(50) NOT NULL,
  `status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kursi`
--

INSERT INTO `kursi` (`id_kursi`, `id_jadwal`, `no_kursi`, `status`) VALUES
(102, 14, 1, 0),
(103, 14, 2, 0),
(104, 14, 3, 1),
(105, 14, 4, 1),
(106, 14, 5, 1),
(107, 14, 6, 0),
(108, 14, 7, 1),
(109, 14, 8, 0),
(110, 14, 9, 0),
(111, 14, 10, 0),
(112, 14, 11, 0),
(113, 14, 12, 0),
(114, 14, 13, 0),
(115, 14, 14, 0),
(116, 14, 15, 0),
(117, 14, 16, 0),
(118, 14, 17, 0),
(119, 14, 18, 0),
(120, 14, 19, 0),
(121, 14, 20, 0),
(122, 14, 21, 0),
(123, 14, 22, 0),
(124, 14, 23, 0),
(125, 14, 24, 0),
(126, 14, 25, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_daerah` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nama_daerah`) VALUES
(4, 'Padang'),
(5, 'Medan'),
(6, 'Panyabungan'),
(7, 'Tebing Tinggi');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(100) NOT NULL,
  `nama_pelanggan` varchar(256) NOT NULL,
  `jekel_pelanggan` char(1) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telp` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `jekel_pelanggan`, `alamat`, `telp`) VALUES
('P-001', 'satria rahmat putra', 'L', 'Rimbo Data', '083182233073'),
('P-003', 'Risya Dwi Aulia', 'P', 'Rimbo Data, RT.003/RW.001, Kel.Bandar Buat, Kec.Lubuk Kilangan', '083182233073'),
('P-004', 'cica', 'P', 'belimbing', '087876547362'),
('P-005', 'yudi', 'L', 'jl pariaman', '087898765676');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `nomor_pembayaran` varchar(100) NOT NULL,
  `kode_booking` varchar(100) NOT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `total_pembayaran` double NOT NULL,
  `bukti` varchar(250) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `nomor_pembayaran`, `kode_booking`, `tgl_pembayaran`, `total_pembayaran`, `bukti`, `status`) VALUES
(25, 'PBY2981', 'BK0001', '2021-09-05', 6000000, 'header-lamaran.png', 2),
(26, 'PBY2982', 'BK0002', NULL, 4000000, '', 0),
(27, 'PBY2983', 'BK0003', '2021-09-05', 3000000, 'header-lamaran1.png', 2),
(29, 'PBY2984', 'BK0004', '2021-09-06', 4000000, '20201023_102907_00001.png', 2),
(30, 'PBY2985', 'BK0005', '2021-09-08', 6000000, '2.PNG', 2),
(31, 'PBY2986', 'BK0006', '2021-09-15', 250000, 'registrasi.png', 2),
(32, 'PBY2987', 'BK0007', '2021-09-16', 400000, 'Screenshot_(3).png', 2),
(33, 'PBY2988', 'BK0008', '2021-09-22', 500000, 'babay.jpg', 2),
(34, 'PBY2989', 'BK0009', '2021-09-22', 250000, '20201023_102907_0000.png', 2),
(35, 'PBY29810', 'BK00010', NULL, 250000, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `id_pelanggan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `isi` text NOT NULL,
  `status` int(11) NOT NULL,
  `notif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `id_pelanggan`, `tanggal`, `isi`, `status`, `notif`) VALUES
(10, 'P-002', '2021-06-20', 'Hello form the other sideeee', 0, 0),
(11, 'P-001', '2021-06-22', 'ko baa ko??', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penumpang`
--

CREATE TABLE `penumpang` (
  `id_penumpang` varchar(11) NOT NULL,
  `kode_booking` varchar(100) NOT NULL,
  `nama_penumpang` varchar(100) NOT NULL,
  `no_identitas` int(11) NOT NULL,
  `id_kursi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penumpang`
--

INSERT INTO `penumpang` (`id_penumpang`, `kode_booking`, `nama_penumpang`, `no_identitas`, `id_kursi`) VALUES
('PN0001', 'BK0001', 'Satria Rahmat Putra', 2147483647, 38),
('PN00010', 'BK0006', 'kiki', 2147483647, 84),
('PN00011', 'BK0007', 'risya', 2147483647, 100),
('PN00012', 'BK0007', 'yanda', 2147483647, 101),
('PN00013', 'BK0008', 'vanny', 2147483647, 104),
('PN00014', 'BK0008', 'riska', 2147483647, 106),
('PN00015', 'BK0009', 'risya', 2147483647, 105),
('PN00016', 'BK00010', 'yuzuriha inori', 2147483647, 108),
('PN0002', 'BK0001', 'Risya Dwi Aulia', 2147483647, 39),
('PN0003', 'BK0002', 'Hexa Aristia', 2147483647, NULL),
('PN0004', 'BK0002', 'Satria Rahmat Putra', 2147483647, NULL),
('PN0005', 'BK0003', 'Siti', 2147483647, 40),
('PN0006', 'BK0004', 'risya', 2147483647, 41),
('PN0007', 'BK0004', 'tasya', 2147483647, 42),
('PN0008', 'BK0005', 'cica', 2147483647, 52),
('PN0009', 'BK0005', 'dya', 2147483647, 53);

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `nomor_tiket` varchar(100) NOT NULL,
  `id_penumpang` varchar(100) NOT NULL,
  `id_jadwal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `nomor_tiket`, `id_penumpang`, `id_jadwal`) VALUES
(23, 'TK0001', 'PN0001', 8),
(24, 'TK0002', 'PN0002', 8),
(25, 'TK0003', 'PN0001', 8),
(26, 'TK0004', 'PN0002', 8),
(27, 'TK0005', 'PN0005', 8),
(29, 'TK0006', 'PN0006', 9),
(30, 'TK0007', 'PN0007', 9),
(31, 'TK0008', 'PN0008', 11),
(32, 'TK0009', 'PN0009', 11),
(33, 'TK00010', 'PN00010', 12),
(34, 'TK00011', 'PN00011', 13),
(35, 'TK00012', 'PN00012', 13),
(36, 'TK00013', 'PN00013', 14),
(37, 'TK00014', 'PN00014', 14),
(38, 'TK00015', 'PN00015', 14);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(100) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
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

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `temp`) VALUES
('0', 'SuperAdmin', 'admin@gmail.com', 'default.png', '$2y$10$hWI2gkMUd9sX06bgXu6QIO7GPIlqUHEeMAd3AC5qqXCIX7N5qv.AS', 1, 1, 1601653500, 1),
('P-001', 'satria rahmat putra', 'satriarahmatputra@gmail.com', 'default.png', '$2y$10$T/VaC8GB3bId8iR3OTbylepYG9CvZm6aPAUmqiP3GoRusJR0mR4vm', 2, 1, 1624092987, 2),
('P-003', 'Risya Dwi Aulia', 'risyadwiaulia@gmail.com', 'default.png', '$2y$10$CHqmubP2EOnqRP0PPMj7Xegs1bsw1Yl7uYKJt.4D43YItwcD2vgKO', 2, 1, 1630862859, 3),
('P-004', 'cica', 'cica@gmail.com', 'default.png', '$2y$10$GCoou9SylGCeMCe/2hUdx.ogJ3pCyRY4147bqyRi9rP4mSDoQ/S4G', 2, 1, 1631073559, 4),
('P-005', 'yudi', 'yudiansyahpramana@gmail.com', 'default.png', '$2y$10$fhvCGjTGY/RtGLsTIopyQeikC47nObWY4kMc459PSsd5rMGHUPneG', 2, 1, 1632264940, 5);

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
(2, 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`kode_booking`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id_bus`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `kursi`
--
ALTER TABLE `kursi`
  ADD PRIMARY KEY (`id_kursi`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`id_penumpang`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`temp`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id_bus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kursi`
--
ALTER TABLE `kursi`
  MODIFY `id_kursi` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2021 at 11:56 AM
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
('BK0002', '2021-09-05', 9, 2, 'P-003'),
('BK0003', '2021-09-05', 8, 1, 'P-001');

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
(8, 3, 4, 5, '2021-09-06 11:37:00', 3000000, 0),
(9, 4, 4, 5, '2021-09-06 11:37:00', 2000000, 0);

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
(38, 8, 1, 1),
(39, 8, 2, 1),
(40, 8, 3, 1),
(41, 9, 1, 0),
(42, 9, 2, 0);

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
(5, 'Medan');

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
('P-003', 'Risya Dwi Aulia', 'P', 'Rimbo Data, RT.003/RW.001, Kel.Bandar Buat, Kec.Lubuk Kilangan', '083182233073');

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
(27, 'PBY2983', 'BK0003', '2021-09-05', 3000000, 'header-lamaran1.png', 2);

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
('PN0002', 'BK0001', 'Risya Dwi Aulia', 2147483647, 39),
('PN0003', 'BK0002', 'Hexa Aristia', 2147483647, NULL),
('PN0004', 'BK0002', 'Satria Rahmat Putra', 2147483647, NULL),
('PN0005', 'BK0003', 'Siti', 2147483647, 40);

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
(27, 'TK0005', 'PN0005', 8);

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
('P-003', 'Risya Dwi Aulia', 'risyadwiaulia@gmail.com', 'default.png', '$2y$10$CHqmubP2EOnqRP0PPMj7Xegs1bsw1Yl7uYKJt.4D43YItwcD2vgKO', 2, 1, 1630862859, 3);

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
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kursi`
--
ALTER TABLE `kursi`
  MODIFY `id_kursi` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

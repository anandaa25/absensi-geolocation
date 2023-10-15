-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Okt 2023 pada 07.01
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kepegawaian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `salary` double NOT NULL,
  `overtime` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`, `salary`, `overtime`) VALUES
(5, 'Kepala Projek Manager', 250000, 100000),
(6, 'Arsitek', 300000, 100000),
(7, 'Wakil Projek Manager', 200000, 80000),
(8, 'Kepala Pengawasan', 200000, 80000),
(9, 'Staf Pengawasan', 150000, 60000),
(10, 'CMO', 150000, 60000),
(11, 'Admin', 100000, 100000),
(12, 'Staff Marketing', 100000, 40000),
(13, 'OB', 100000, 40000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lembur`
--

CREATE TABLE `tb_lembur` (
  `id_lembur` int(11) NOT NULL,
  `id_pegawai` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `waktu_lembur` time NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_lembur`
--

INSERT INTO `tb_lembur` (`id_lembur`, `id_pegawai`, `date`, `waktu_lembur`, `status`) VALUES
(3, 'P-002', '2021-12-15', '19:25:00', 1),
(4, 'P-003', '2021-12-21', '20:23:00', 1),
(5, 'P-002', '2022-03-15', '19:15:00', 1),
(7, 'P-002', '2022-03-16', '19:30:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_payrol`
--

CREATE TABLE `tb_payrol` (
  `id_payrol` int(11) NOT NULL,
  `id_pegawai` varchar(255) NOT NULL,
  `periode` text NOT NULL,
  `tanggal` date NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `gaji_pokok` double NOT NULL,
  `gaji_lembur` double NOT NULL,
  `bonus` double NOT NULL,
  `keterangan` text NOT NULL,
  `gaji_bersih` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_payrol`
--

INSERT INTO `tb_payrol` (`id_payrol`, `id_pegawai`, `periode`, `tanggal`, `id_jabatan`, `gaji_pokok`, `gaji_lembur`, `bonus`, `keterangan`, `gaji_bersih`) VALUES
(11, 'P-002', '2021-12-31', '2021-12-15', 6, 600000, 200000, 100000, 'Jangan sering Telat', 900000),
(12, 'P-003', '2021-12-31', '2021-12-21', 5, 250000, 100000, 100000, 'Jangan sering Telat', 450000),
(14, 'P-002', '2022-03-31', '2022-03-16', 6, 900000, 200000, 0, 'Jangan sering Telat', 1100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `jekel` varchar(10) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `status_kepegawaian` int(2) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `id_user`, `nama_pegawai`, `jekel`, `pendidikan`, `status_kepegawaian`, `agama`, `jabatan`, `no_hp`, `alamat`, `foto`, `ktp`, `tanggal_masuk`) VALUES
('P-004', 'U-004', 'ananda prasta', 'P', 'Uhamka', 1, 'Islam', '12', '081213434851', 'jakarta timur', 'foto1.jpg', 'SCRIM.jpg', '2023-10-11'),
('P-005', 'U-005', 'nanda', 'L', 'uhamka', 1, 'Islam', '6', '01001', 'aaaaa', 'Tiara_Pebriandi-removebg-preview.jpg', 'about1.jpeg', '2023-10-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_presents`
--

CREATE TABLE `tb_presents` (
  `id_presents` int(11) NOT NULL,
  `id_pegawai` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `keterangan` int(2) NOT NULL,
  `foto_selfie_masuk` varchar(255) DEFAULT NULL,
  `foto_selfie_pulang` varchar(255) DEFAULT NULL,
  `keterangan_izin` text NOT NULL,
  `id_lembur` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_presents`
--

INSERT INTO `tb_presents` (`id_presents`, `id_pegawai`, `tanggal`, `waktu`, `keterangan`, `foto_selfie_masuk`, `foto_selfie_pulang`, `keterangan_izin`, `id_lembur`, `status`) VALUES
(38, 'P-002', '2021-12-14', '13:14:17', 2, 'IMG-20191228-WA0038.jpeg', 'IMG-20191227-WA0007.jpg', '', NULL, 2),
(39, 'P-002', '2021-12-13', '13:15:36', 4, '1634868378066.jpg', NULL, 'Sakit Perut', NULL, 4),
(40, 'P-002', '2021-12-12', '13:17:20', 5, NULL, NULL, 'Pulang Kampung', NULL, 5),
(41, 'P-002', '2021-12-11', '13:19:08', 2, 'IMG-20191228-WA00381.jpeg', 'IMG-20191228-WA00382.jpeg', '', NULL, 2),
(42, 'P-002', '2021-12-10', '13:20:22', 3, 'IMG-20191227-WA00071.jpg', 'IMG-20191228-WA00383.jpeg', '', 3, 3),
(43, 'P-002', '2021-12-15', '23:10:38', 3, 'IMG-20191106-WA0051.jpg', 'IMG-20191106-WA0050.jpg', '', 3, 3),
(44, 'P-002', '2021-12-19', '17:34:28', 2, 'DSC_0569.JPG', 'DSC_05691.JPG', '', NULL, 1),
(45, 'P-003', '2021-12-10', '20:24:49', 3, 'DSC_0551.JPG', 'DSC_0568.JPG', '', 4, 3),
(46, 'P-003', '2021-12-09', '20:34:46', 4, 'DSC_0568.JPG', NULL, 'Sakit Demam', NULL, 4),
(47, 'P-002', '2021-12-28', '19:36:13', 2, 'CV-SONYA2-DPK.png', 'CV-SONYA2-DPK1.png', '', NULL, 2),
(48, 'P-002', '2022-03-15', '13:26:08', 3, '10604598_741933989212100_603244537079931112_o.jpg', '10604598_741933989212100_603244537079931112_o1.jpg', '', 3, 3),
(49, 'P-002', '2022-03-14', '13:28:55', 2, '10604598_741933989212100_603244537079931112_o2.jpg', '10604598_741933989212100_603244537079931112_o3.jpg', '', NULL, 2),
(51, 'P-002', '2022-03-16', '15:52:42', 3, 'IMG-20211121-WA0036.jpeg', 'IMG-20210902-WA0021.jpeg', '', 3, 3),
(52, 'P-004', '2023-10-11', '11:40:35', 2, 'foto.jpg', 'foto2.jpg', '', NULL, 2),
(53, 'P-004', '2023-10-13', '11:47:58', 2, 'about1.jpeg', 'about2.jpeg', '', NULL, 2),
(54, 'P-005', '2023-10-13', '11:59:49', 2, 'WhatsApp_Image_2023-10-05_at_08_43_392.jpeg', 'about3.jpeg', '', NULL, 2),
(55, 'P-004', '2023-10-14', '18:19:27', 2, 'WhatsApp_Image_2023-10-05_at_08_43_393.jpeg', 'about4.jpeg', '', NULL, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `temp`) VALUES
('0', 'PT. Mandiri Rajawali Hutama', 'admin@gmail.com', 'default.png', '$2y$10$hWI2gkMUd9sX06bgXu6QIO7GPIlqUHEeMAd3AC5qqXCIX7N5qv.AS', 1, 1, 1601653500, 1),
('U-004', 'ananda prasta', 'anandaprastawarasatijanah@gmail.com', 'foto1.jpg', '$2y$10$dKd2nW8uav9GPDiOEQYueOLqtqwUW9rQNuSg/YfY.sCiI30j3/Rri', 2, 1, 1696999075, 4),
('U-005', 'nanda', 'anandaprasta25@gmail.com', 'Tiara_Pebriandi-removebg-preview.jpg', '$2y$10$jWsR80jYDhT/LtWbcWqG5ekVRmc58H.A.QMp.lMNdHpzDzxEYiI.G', 2, 1, 1697172727, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(130) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `tb_lembur`
--
ALTER TABLE `tb_lembur`
  ADD PRIMARY KEY (`id_lembur`);

--
-- Indeks untuk tabel `tb_payrol`
--
ALTER TABLE `tb_payrol`
  ADD PRIMARY KEY (`id_payrol`);

--
-- Indeks untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `tb_presents`
--
ALTER TABLE `tb_presents`
  ADD PRIMARY KEY (`id_presents`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`temp`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_lembur`
--
ALTER TABLE `tb_lembur`
  MODIFY `id_lembur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_payrol`
--
ALTER TABLE `tb_payrol`
  MODIFY `id_payrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_presents`
--
ALTER TABLE `tb_presents`
  MODIFY `id_presents` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Nov 2021 pada 14.43
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sempenabot`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bot`
--

CREATE TABLE `bot` (
  `id_bot` varchar(50) NOT NULL,
  `username_bot` varchar(50) NOT NULL,
  `api_token` varchar(255) NOT NULL,
  `url_bot` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `id_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_user` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(50) NOT NULL,
  `nama` text NOT NULL,
  `tahun_angkatan` int(4) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `makul`
--

CREATE TABLE `makul` (
  `id_makul` varchar(100) NOT NULL,
  `nama_makul` varchar(50) NOT NULL,
  `standart_nilai` double NOT NULL,
  `id_sem` varchar(50) NOT NULL,
  `id_ta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `makul`
--

INSERT INTO `makul` (`id_makul`, `nama_makul`, `standart_nilai`, `id_sem`, `id_ta`) VALUES
('071121MK0023', 'Bahasa Indonesia', 80, '231021SM0002', '231021TA0001'),
('071121MK0024', 'Bahasa Indonesia2', 78, '071121SM0003', '071121TA0003'),
('071121MK0025', 'Bahasa Indonesia', 78, '071121SM0003', '071121TA0003'),
('12560003', 'PPKN67', 90, '231021SM0002', '231021TA0002'),
('12560004', 'PPKN68', 78, '231021SM0001', '231021TA0001'),
('12560005', 'PPKN69', 90, '231021SM0002', '231021TA0002'),
('12560006', 'PPKN70', 78, '231021SM0001', '231021TA0001'),
('12560007', 'PPKN71', 90, '231021SM0002', '231021TA0002'),
('12560008', 'PPKN72', 78, '231021SM0001', '231021TA0001'),
('12560009', 'PPKN73', 90, '231021SM0002', '231021TA0002'),
('12560010', 'PPKN74', 78, '231021SM0001', '231021TA0001'),
('12560011', 'PPKN75', 90, '231021SM0002', '231021TA0002'),
('12560012', 'PPKN76', 78, '231021SM0001', '231021TA0001'),
('12560013', 'PPKN77', 90, '231021SM0002', '231021TA0002'),
('12560014', 'PPKN78', 78, '231021SM0001', '231021TA0001'),
('12560015', 'PPKN79', 90, '231021SM0002', '231021TA0002'),
('12560016', 'PPKN80', 78, '231021SM0001', '231021TA0001'),
('12560017', 'PPKN81', 90, '231021SM0002', '231021TA0002'),
('12560018', 'PPKN82', 78, '231021SM0001', '231021TA0001'),
('12560019', 'PPKN83', 90, '231021SM0002', '231021TA0002'),
('12560020', 'PPKN84', 78, '231021SM0001', '231021TA0001'),
('12560021', 'PPKN85', 90, '231021SM0002', '231021TA0002'),
('12560022', 'PPKN86', 78, '231021SM0001', '231021TA0001'),
('151121MK0026', 'Bahasa Indonesia', 78, '071121SM0003', '071121TA0003'),
('241021MK0001', 'Bahasa Indonesia', 78, '231021SM0001', '231021TA0002'),
('241021MK0002', 'Bahasa Indonesia2', 79, '231021SM0002', '231021TA0001'),
('241021MK0003', 'Bahasa Indonesia45', 80, '231021SM0002', '231021TA0002'),
('241021MK0004', 'PPKN', 78, '231021SM0001', '231021TA0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` varchar(50) NOT NULL,
  `nim` int(8) NOT NULL,
  `id_makul` int(10) NOT NULL,
  `nilai` decimal(50,0) NOT NULL,
  `tanggal_her` date NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nim`, `id_makul`, `nilai`, `tanggal_her`, `id_user`, `created_at`, `updated_at`, `deleted_at`) VALUES
('071121NI0019', 909, 12560022, '80', '2021-11-07', '', NULL, NULL, NULL),
('121121NI0020', 909, 12560019, '80', '2021-11-12', '101121AK0001', '2021-11-12 10:20:12', '2021-11-11 21:21:07', NULL),
('201121NI0021', 909, 71121, '40', '2021-11-20', '171121AK0003', '2021-11-20 07:08:19', '2021-11-19 18:11:48', NULL),
('201121NI0022', 909, 71121, '40', '2021-11-20', '171121AK0003', '2021-11-20 07:10:44', NULL, NULL),
('301021NI0001', 2410001, 241021, '89', '0000-00-00', '', NULL, NULL, NULL),
('301021NI0002', 2410001, 241021, '90', '0000-00-00', '', NULL, NULL, NULL),
('301021NI0003', 2410001, 241021, '91', '0000-00-00', '', NULL, NULL, NULL),
('301021NI0004', 2410001, 241021, '92', '0000-00-00', '', NULL, NULL, NULL),
('301021NI0005', 2410001, 241021, '93', '0000-00-00', '', NULL, NULL, NULL),
('301021NI0006', 2410001, 241021, '94', '0000-00-00', '', NULL, NULL, NULL),
('301021NI0007', 2410001, 241021, '95', '0000-00-00', '', NULL, NULL, NULL),
('301021NI0008', 2410001, 241021, '96', '0000-00-00', '', NULL, NULL, NULL),
('301021NI0009', 2410001, 241021, '97', '0000-00-00', '', NULL, NULL, NULL),
('301021NI0010', 2410001, 241021, '98', '0000-00-00', '', NULL, NULL, NULL),
('301021NI0011', 2410001, 241021, '99', '0000-00-00', '', NULL, NULL, NULL),
('301021NI0012', 2410001, 241021, '100', '0000-00-00', '', NULL, NULL, NULL),
('301021NI0013', 2410001, 241021, '101', '0000-00-00', '', NULL, NULL, NULL),
('301021NI0014', 2410001, 241021, '102', '0000-00-00', '', NULL, NULL, NULL),
('301021NI0015', 2410001, 241021, '103', '0000-00-00', '', NULL, NULL, NULL),
('301021NI0016', 2410001, 241021, '104', '0000-00-00', '', NULL, NULL, NULL),
('301021NI0017', 2410001, 241021, '105', '0000-00-00', '', NULL, NULL, NULL),
('311021NI0018', 2410001, 12560019, '80', '2021-10-31', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `id_sem` varchar(50) NOT NULL,
  `nama_sem` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`id_sem`, `nama_sem`, `keterangan`) VALUES
('071121SM0003', '4', 'aktif'),
('231021SM0001', '2', 'tidak aktif'),
('231021SM0002', '1', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_ta` varchar(50) NOT NULL,
  `nama_ta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_ta`, `nama_ta`) VALUES
('071121TA0003', '2021/2022'),
('231021TA0001', '2019/2020'),
('231021TA0002', '2018/2019');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bot`
--
ALTER TABLE `bot`
  ADD PRIMARY KEY (`id_bot`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `makul`
--
ALTER TABLE `makul`
  ADD PRIMARY KEY (`id_makul`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_sem`);

--
-- Indeks untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_ta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Agu 2022 pada 02.44
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahprumput`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` tinyint(1) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` tinyint(1) NOT NULL,
  `nama_kriteria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`) VALUES
(0, 'Protein Kasar'),
(1, 'Serat Kasar'),
(2, 'Produktivitas'),
(3, 'Bulu'),
(4, 'Palatabilitas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_alternatif`
--

CREATE TABLE `nilai_alternatif` (
  `id_n_alternatif` int(6) NOT NULL,
  `id_kriteria` tinyint(1) NOT NULL,
  `id_rumput1` tinyint(2) NOT NULL,
  `id_rumput2` tinyint(2) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_alternatif`
--

INSERT INTO `nilai_alternatif` (`id_n_alternatif`, `id_kriteria`, `id_rumput1`, `id_rumput2`, `nilai`) VALUES
(1, 0, 1, 2, 4),
(2, 0, 1, 3, 3),
(3, 0, 1, 4, 5),
(4, 0, 2, 3, 0.5),
(5, 0, 2, 4, 2),
(6, 0, 3, 4, 3),
(7, 1, 1, 2, 7),
(8, 1, 1, 3, 6),
(9, 1, 1, 4, 7),
(10, 1, 2, 3, 0.5),
(11, 1, 2, 4, 1),
(12, 1, 3, 4, 2),
(13, 2, 1, 2, 3),
(14, 2, 1, 3, 4),
(15, 2, 1, 4, 2),
(16, 2, 2, 3, 2),
(17, 2, 2, 4, 0.5),
(18, 2, 3, 4, 0.333),
(19, 3, 1, 2, 3),
(20, 3, 1, 3, 0.5),
(21, 3, 1, 4, 5),
(22, 3, 2, 3, 0.25),
(23, 3, 2, 4, 3),
(24, 3, 3, 4, 6),
(25, 4, 1, 2, 4),
(26, 4, 1, 3, 0.5),
(27, 4, 1, 4, 5),
(28, 4, 2, 3, 0.2),
(29, 4, 2, 4, 2),
(30, 4, 3, 4, 6),
(57, 0, 1, 6, 2),
(58, 0, 2, 6, 0.333),
(59, 0, 3, 6, 0.5),
(60, 0, 4, 6, 0.25),
(61, 0, 1, 7, 0.5),
(62, 0, 2, 7, 0.2),
(63, 0, 3, 7, 0.25),
(64, 0, 4, 7, 0.167),
(65, 0, 6, 7, 0.333),
(66, 0, 1, 8, 3),
(67, 0, 2, 8, 0.5),
(68, 0, 3, 8, 1),
(69, 0, 4, 8, 0.333),
(70, 0, 6, 8, 2),
(71, 0, 7, 8, 4),
(72, 1, 1, 6, 4),
(73, 1, 1, 7, 4),
(74, 1, 1, 8, 8),
(75, 1, 2, 6, 0.25),
(76, 1, 2, 7, 0.25),
(77, 1, 2, 8, 2),
(78, 1, 3, 6, 0.333),
(79, 1, 3, 7, 0.333),
(80, 1, 3, 8, 3),
(81, 1, 4, 6, 0.25),
(82, 1, 4, 7, 0.25),
(83, 1, 4, 8, 2),
(84, 1, 6, 7, 1),
(85, 1, 6, 8, 5),
(86, 1, 7, 8, 5),
(87, 2, 1, 6, 0.333),
(88, 2, 1, 7, 0.5),
(89, 2, 1, 8, 1),
(90, 2, 2, 6, 0.2),
(91, 2, 2, 7, 0.25),
(92, 2, 2, 8, 0.333),
(93, 2, 3, 6, 0.167),
(94, 2, 3, 7, 0.2),
(95, 2, 3, 8, 0.25),
(96, 2, 4, 6, 0.25),
(97, 2, 4, 7, 0.333),
(98, 2, 4, 8, 0.5),
(99, 2, 6, 7, 2),
(100, 2, 6, 8, 3),
(101, 2, 7, 8, 2),
(102, 4, 1, 6, 2),
(103, 4, 1, 7, 2),
(104, 4, 1, 8, 3),
(105, 4, 2, 6, 0.333),
(106, 4, 2, 7, 0.333),
(107, 4, 2, 8, 0.5),
(108, 4, 3, 6, 3),
(109, 4, 3, 7, 3),
(110, 4, 3, 8, 4),
(111, 4, 4, 6, 0.25),
(112, 4, 4, 7, 0.25),
(113, 4, 4, 8, 0.333),
(114, 4, 6, 7, 1),
(115, 4, 6, 8, 2),
(116, 4, 7, 8, 2),
(117, 3, 1, 6, 0.5),
(118, 3, 1, 7, 0.5),
(119, 3, 1, 8, 2),
(120, 3, 2, 6, 0.25),
(121, 3, 2, 7, 0.25),
(122, 3, 2, 8, 0.5),
(123, 3, 3, 6, 1),
(124, 3, 3, 7, 1),
(125, 3, 3, 8, 3),
(126, 3, 4, 6, 0.167),
(127, 3, 4, 7, 0.167);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_kriteria`
--

CREATE TABLE `nilai_kriteria` (
  `id_n_kriteria` tinyint(4) NOT NULL,
  `id_kriteria1` tinyint(1) NOT NULL,
  `id_kriteria2` tinyint(1) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_kriteria`
--

INSERT INTO `nilai_kriteria` (`id_n_kriteria`, `id_kriteria1`, `id_kriteria2`, `nilai`) VALUES
(1, 0, 1, 1),
(2, 0, 2, 5),
(3, 0, 3, 1),
(4, 0, 4, 1),
(5, 1, 2, 0.2),
(6, 1, 3, 1),
(7, 1, 4, 1),
(8, 2, 3, 0.333),
(9, 2, 4, 1),
(10, 3, 4, 0.5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rumput`
--

CREATE TABLE `rumput` (
  `id_rumput` tinyint(2) NOT NULL,
  `nama_rumput` varchar(20) NOT NULL,
  `pk` varchar(20) NOT NULL,
  `sk` varchar(20) NOT NULL,
  `produktivitas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rumput`
--

INSERT INTO `rumput` (`id_rumput`, `nama_rumput`, `pk`, `sk`, `produktivitas`) VALUES
(1, 'Pakchong', '16-18', '16', '250-275 ton/ha/tahun'),
(2, 'Gajah', '10,2-12,23', '29-33', '150-200 ton/ha/tahun'),
(3, 'Odot', '12-14', '29,6', '100-150 ton/ha/tahun'),
(4, 'Raja', '9,7-11,68', '31,69-32,49', '200-250 ton/ha/tahun'),
(6, 'Biograss', '14,33-14,64', '24,89-25,25', '319 ton/ha/tahun'),
(7, 'Biovitass', '17,85-18,52', '24,03-25,17', '289 ton/ha/tahun'),
(8, 'Gama Umami', '11,21-14,7', '34,26', '50 kg/meter2/siklus');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD PRIMARY KEY (`id_n_alternatif`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_rumput1` (`id_rumput1`),
  ADD KEY `id_rumput2` (`id_rumput2`);

--
-- Indeks untuk tabel `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  ADD PRIMARY KEY (`id_n_kriteria`),
  ADD KEY `id_kriteria1` (`id_kriteria1`),
  ADD KEY `id_kriteria2` (`id_kriteria2`);

--
-- Indeks untuk tabel `rumput`
--
ALTER TABLE `rumput`
  ADD PRIMARY KEY (`id_rumput`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  MODIFY `id_n_alternatif` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT untuk tabel `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  MODIFY `id_n_kriteria` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `rumput`
--
ALTER TABLE `rumput`
  MODIFY `id_rumput` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD CONSTRAINT `nilai_alternatif_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`),
  ADD CONSTRAINT `nilai_alternatif_ibfk_2` FOREIGN KEY (`id_rumput1`) REFERENCES `rumput` (`id_rumput`),
  ADD CONSTRAINT `nilai_alternatif_ibfk_3` FOREIGN KEY (`id_rumput2`) REFERENCES `rumput` (`id_rumput`);

--
-- Ketidakleluasaan untuk tabel `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  ADD CONSTRAINT `nilai_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria1`) REFERENCES `kriteria` (`id_kriteria`),
  ADD CONSTRAINT `nilai_kriteria_ibfk_2` FOREIGN KEY (`id_kriteria2`) REFERENCES `kriteria` (`id_kriteria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

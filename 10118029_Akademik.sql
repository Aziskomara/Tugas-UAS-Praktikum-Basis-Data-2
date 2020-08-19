-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Agu 2020 pada 14.04
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
-- Database: `10118029_akademik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nip` char(8) NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `jk` char(1) NOT NULL,
  `alamat` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nip`, `nama`, `jk`, `alamat`) VALUES
('20110112', 'Dodi permana', 'L', 'bandung'),
('20110113', 'Surnadi yansyah', 'L', 'subang'),
('20110120', 'Ratna sari putri', 'P', 'lembang'),
('20110122', 'Bagus dermawan', 'L', 'bandung'),
('20110124', 'Desi ayu ', 'P', '     subang     ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` char(8) NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `jk` char(1) NOT NULL,
  `alamat` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jk`, `alamat`) VALUES
('10110220', 'adi damsudin', 'L', 'sumedang'),
('10110221', 'samsul rizal', 'L', 'bandung'),
('10110223', 'ajijah putri', 'P', 'subang'),
('10110225', 'jakaria nugraha', 'L', 'banten'),
('10110229', 'saraswati putri', 'P', 'bandung'),
('10110230', 'lingga purnama', 'L', 'Cimahi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kode_mk` char(8) NOT NULL,
  `nama_mk` varchar(30) DEFAULT NULL,
  `sks` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`kode_mk`, `nama_mk`, `sks`) VALUES
('if110221', 'algoritma', 3),
('if110222', 'Aplikasi Web', 3),
('if110223', 'matematika dasar', 4),
('if110224', 'Metnum', 3),
('if110225', 'basisdata', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `nim` char(8) NOT NULL,
  `nip` char(8) NOT NULL,
  `kode_mk` char(8) NOT NULL,
  `uts` smallint(6) DEFAULT NULL,
  `uas` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`nim`, `nip`, `kode_mk`, `uts`, `uas`) VALUES
('10110220', '20110122', 'if110221', 30, 40),
('10110221', '20110113', 'if110221', 69, 70),
('10110221', '20110120', 'if110225', 50, 60),
('10110223', '20110113', 'if110223', 30, 90),
('10110225', '20110124', 'if110221', 50, 70),
('10110229', '20110112', 'if110223', 70, 78);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kode_mk`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`nim`,`nip`,`kode_mk`),
  ADD KEY `nip` (`nip`),
  ADD KEY `kode_mk` (`kode_mk`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`),
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`kode_mk`) REFERENCES `matakuliah` (`kode_mk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

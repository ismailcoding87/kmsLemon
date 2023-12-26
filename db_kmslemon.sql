-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Des 2023 pada 03.10
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kmslemon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_download`
--

CREATE TABLE `tb_download` (
  `id_download` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `teknik_budidaya` varchar(100) NOT NULL,
  `media_tanam` varchar(100) NOT NULL,
  `alat_tanam` varchar(100) NOT NULL,
  `teknik_penanaman` text NOT NULL,
  `perawatan` text NOT NULL,
  `hasil` text NOT NULL,
  `pengetahuan_pendukung` varchar(255) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `vidio` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `data` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_forum`
--

CREATE TABLE `tb_forum` (
  `id_diskusi` int(11) NOT NULL,
  `parent_diskusi_id` int(11) NOT NULL DEFAULT 0,
  `diskusi` text NOT NULL,
  `pengguna_id` int(11) NOT NULL DEFAULT 0,
  `diskusi_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pdokumentasi`
--

CREATE TABLE `tb_pdokumentasi` (
  `id_pengetahuan` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `teknik_budidaya` varchar(100) NOT NULL,
  `media_tanam` varchar(100) NOT NULL,
  `alat_tanam` varchar(100) NOT NULL,
  `teknik_penanaman` text NOT NULL,
  `perawatan` text NOT NULL,
  `hasil` text NOT NULL,
  `pengetahuan_pendukung` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `vidio` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `data` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('staff_it','pakar','pegawai','pengunjung') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama`, `email`, `username`, `password`, `role`) VALUES
(111, '', 'staffkmslemon@gmail.com', 'staff', '$2y$10$WomgxiSqLoYLn5ZOBRB1Tu3xWDtyMdIP26CK9VSKuawC9Gv9x/j16', 'staff_it');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ppengalaman`
--

CREATE TABLE `tb_ppengalaman` (
  `id_pengetahuan` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `teknik_budidaya` varchar(100) NOT NULL,
  `media_tanam` varchar(100) NOT NULL,
  `alat_tanam` varchar(100) NOT NULL,
  `teknik_penanaman` text NOT NULL,
  `perawatan` text NOT NULL,
  `hasil` text NOT NULL,
  `pengetahuan_pendukung` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `vidio` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `data` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ppublik`
--

CREATE TABLE `tb_ppublik` (
  `id_pengetahuan` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `teknik_budidaya` varchar(100) NOT NULL,
  `media_tanam` varchar(100) NOT NULL,
  `alat_tanam` varchar(100) NOT NULL,
  `teknik_penanaman` text NOT NULL,
  `perawatan` text NOT NULL,
  `hasil` text NOT NULL,
  `pengetahuan_pendukung` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `vidio` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `data` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_download`
--
ALTER TABLE `tb_download`
  ADD PRIMARY KEY (`id_download`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `tb_forum`
--
ALTER TABLE `tb_forum`
  ADD PRIMARY KEY (`id_diskusi`),
  ADD KEY `pengguna_id` (`pengguna_id`);

--
-- Indeks untuk tabel `tb_pdokumentasi`
--
ALTER TABLE `tb_pdokumentasi`
  ADD PRIMARY KEY (`id_pengetahuan`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `tb_ppengalaman`
--
ALTER TABLE `tb_ppengalaman`
  ADD PRIMARY KEY (`id_pengetahuan`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `tb_ppublik`
--
ALTER TABLE `tb_ppublik`
  ADD PRIMARY KEY (`id_pengetahuan`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_download`
--
ALTER TABLE `tb_download`
  MODIFY `id_download` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `tb_forum`
--
ALTER TABLE `tb_forum`
  MODIFY `id_diskusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT untuk tabel `tb_pdokumentasi`
--
ALTER TABLE `tb_pdokumentasi`
  MODIFY `id_pengetahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT untuk tabel `tb_ppengalaman`
--
ALTER TABLE `tb_ppengalaman`
  MODIFY `id_pengetahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT untuk tabel `tb_ppublik`
--
ALTER TABLE `tb_ppublik`
  MODIFY `id_pengetahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_download`
--
ALTER TABLE `tb_download`
  ADD CONSTRAINT `tb_download_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_forum`
--
ALTER TABLE `tb_forum`
  ADD CONSTRAINT `tb_forum_ibfk_1` FOREIGN KEY (`pengguna_id`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pdokumentasi`
--
ALTER TABLE `tb_pdokumentasi`
  ADD CONSTRAINT `tb_pdokumentasi_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_ppengalaman`
--
ALTER TABLE `tb_ppengalaman`
  ADD CONSTRAINT `tb_ppengalaman_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_ppublik`
--
ALTER TABLE `tb_ppublik`
  ADD CONSTRAINT `tb_ppublik_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

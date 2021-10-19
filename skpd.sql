-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Mar 2021 pada 03.56
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skpd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL,
  `tanggal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id`, `username`, `keterangan`, `image`, `tanggal`) VALUES
(4, 'user', 'laporan 1', 'user_1615168063.png', 1615168063),
(5, 'user', 'laporan 2', 'user_1615168078.jpg', 1615168078),
(6, 'kal', 'laporan 1', 'kal_1615168840.jpg', 1615168840),
(7, 'kal', 'laporan 2', 'kal_1615170474.jpeg', 1615170474),
(8, 'kal', 'laporan 3', 'kal_1615170971.jpg', 1615170971),
(9, 'user', 'lap 4', 'user_1615171434.jpeg', 1615171434),
(10, 'user', 'kkk', 'user_1615171474.jpeg', 1615171474),
(11, 'kal', 'ffff', 'kal_1615171522.png', 1615171522),
(12, 'user', 'aaaa', 'user_1615171575.PNG', 1615171575),
(13, 'kal', 'bbbb', 'kal_1615171609.png', 1615171609);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role_id` int(1) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `image`, `role_id`, `is_active`) VALUES
(1, 'user', '$2y$10$GPIvxOeM.t/.I.YFKrGkSOKs/DgpIo6S6ynZM8IF/90DiCcH20L7e', 'user', 'user.jpg', 2, 1),
(2, 'admin', '$2y$10$a/T3PNeUwht9/fQK6.eotudl2fbhoshFFmj647QgM/oD6wkyM1e2C', 'admin', 'default.jpg', 1, 1),
(3, 'asnan', '$2y$10$WhNJhkH4RnXTG1TMxPvUP.4LFpNp9y4eXeG5DX3xOHUN6m3d3weJi', 'asnan', 'default.jpg', 2, 0),
(4, 'kal', '$2y$10$c.KtMGWXPKbybXmCLJJJpOlCzMGRS28yGs64AbJAHYdSqGppQx3qK', 'kal', 'kal.jpg', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

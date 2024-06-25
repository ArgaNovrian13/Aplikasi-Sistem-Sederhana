-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 25 Jun 2024 pada 00.57
-- Versi server: 8.0.30
-- Versi PHP: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `id` int NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `jenisKelamin` varchar(10) NOT NULL,
  `tglLahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`id`, `firstName`, `lastName`, `jenisKelamin`, `tglLahir`, `alamat`, `no_hp`) VALUES
(1, 'Putri', 'Cerry', 'Perempuan', '2001-09-07', 'Jln.Nangka No.5,Jakarta Pusat', '082390786543'),
(2, 'Elisa', 'Putri', 'Perempuan', '2002-07-08', 'Jln.Sirsak No.6,Jakarta Timur', '082278905432'),
(5, 'Rizky', 'Ilham', 'Laki-Laki', '1999-07-01', 'Jln.Semangka No.5,Jakarta Timur', '082376540978'),
(6, 'Ilham', 'Abadi', 'Laki-Laki', '2004-05-12', 'Jln.Jeruk No.3c,Jakarta Pusat', '082245678902'),
(7, 'Joko', 'Sugianto', 'Laki-Laki', '2002-09-12', 'Jln.Jeruk No.2,Jakarta Pusat', '085290785643');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `passworduser` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `passworduser`) VALUES
(1, 'jhondoe', 'jhondoe02@gmail.com', 'c775e7b757ede630cd0aa1113bd102661ab38829ca52a6422ab782862f268646'),
(2, 'elisauta', 'elisa05@gmail.com', '17756315ebd47b7110359fc7b168179bf6f2df3646fcc888bc8aa05c78b38ac1'),
(3, 'rizki02', 'rizki13@gmail.com', '47efa27c1bfab5fcfaa772b9362dc151c6aac9d439321a77ae8581de0bb3ef17'),
(4, 'tono', 'tono@gmail.com', 'c775e7b757ede630cd0aa1113bd102661ab38829ca52a6422ab782862f268646'),
(5, 'budi', 'budi@gmail.com', '17756315ebd47b7110359fc7b168179bf6f2df3646fcc888bc8aa05c78b38ac1'),
(6, 'ilham', 'ilham@gmail.com', 'c775e7b757ede630cd0aa1113bd102661ab38829ca52a6422ab782862f268646'),
(7, 'stevejobs', 'steve@gmail.com', '1234567890');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data`
--
ALTER TABLE `data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jun 2021 pada 22.12
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectuas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_produk`
--

CREATE TABLE `data_produk` (
  `id` int(11) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Harga` double NOT NULL,
  `Deskripsi` text NOT NULL,
  `Tags` varchar(255) NOT NULL,
  `Kategori` varchar(255) NOT NULL,
  `Gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_produk`
--

INSERT INTO `data_produk` (`id`, `Nama`, `Harga`, `Deskripsi`, `Tags`, `Kategori`, `Gambar`) VALUES
(1, 'KAOS POLO DRY-EX PIQUE', 199000, 'Outstanding quick-drying capability while remaining smooth to the touch. Versatile so can be worn for sports and everyday. The front of the shirt is now made of jersey, so that the design can be worn in social settings as well. Ultra quick-drying properties recognized by athletes. Dries in roughly half the time as cotton so sweat doesn’t stick to the skin as much.', 'Pria Casual', 'Pakaian Pria', 'pria1.jpg'),
(2, 'KAOS POLO DRY-EX PIQUE', 199000, 'The front of the shirt is now made of jersey, so that the design can be worn in social settings as well. Ultra quick-drying properties recognized by athletes. Dries in roughly half the time as cotton so sweat doesn’t stick to the skin as much.', 'Pria Casual', 'Pakaian Pria', 'pria2.jpg'),
(3, 'KEMEJA BROADCLOTH EXTRA FINE', 299000, 'Dries in roughly half the time as cotton so sweat doesn’t stick to the skin as much. Outstanding quick-drying capability while remaining smooth to the touch. Versatile so can be worn for sports and everyday.', 'Pria Casual', 'Pakaian Pria', 'pria3.jpg'),
(9, 'KEMEJA BROADCLOTH EXTRA FINE', 299000, 'Dries in roughly half the time as cotton so sweat doesn’t stick to the skin as much.\r\nThe front of the shirt is now made of jersey, so that the design can be worn in social settings as well. Ultra quick-drying properties recognized by athletes. Dries in roughly half the time as cotton so sweat doesn’t stick to the skin as much.', 'Pria Casual', 'Pakaian Pria', 'pria4.jpg'),
(10, 'GAUN SIFON PLEATED', 266000, 'Dries in roughly half the time as cotton so sweat doesn’t stick to the skin as much. The front of the shirt is now made of jersey, so that the design can be worn in social settings as well. Ultra quick-drying properties recognized by athletes. Dries in roughly half the time as cotton so sweat doesn’t stick to the skin as much.', 'Wanita Casual', 'Pakaian Wanita', 'wan1.jpg'),
(11, 'GAUN WAFFLE CREW NECK', 266000, 'DRY EX function added.\r\nWith antibacterial and odor-neutralizing functions.\r\nUpdated collar design so it’s a more versatile shirt.\r\nSofter collar doesn’t curl easily. \r\nOutstanding quick-drying capability while remaining smooth to the touch. Versatile so can be worn for sports and everyday.\r\n', 'Wanita Casual', 'Pakaian Wanita', 'wan2.jpg'),
(12, 'GAUN SIFON PLEATED', 299000, 'Outstanding quick-drying capability while remaining smooth to the touch. Versatile so can be worn for sports and everyday.\r\nDRY EX function added.\r\nWith antibacterial and odor-neutralizing functions.\r\nUpdated collar design so it’s a more versatile shirt.\r\nSofter collar doesn’t curl easily.', 'Wanita Casual', 'Pakaian Wanita', 'wan3.jpg'),
(13, 'GAUN RAYON BAND COLLAR', 299000, 'The front of the shirt is now made of jersey, so that the design can be worn in social settings as well. Ultra quick-drying properties recognized by athletes. Dries in roughly half the time as cotton so sweat doesn’t stick to the skin as much. DRY EX function added.\r\nWith antibacterial and odor-neutralizing functions.\r\nUpdated collar design so it’s a more versatile shirt.\r\nSofter collar doesn’t curl easily.', 'Wanita Casual', 'Pakaian Wanita', 'wan4.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(5, 'admin', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(6, 'user', 'user', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(7, 'sakti', 'sakti', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_produk`
--
ALTER TABLE `data_produk`
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
-- AUTO_INCREMENT untuk tabel `data_produk`
--
ALTER TABLE `data_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jan 2024 pada 13.31
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toilet`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `checklists`
--

CREATE TABLE `checklists` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `kloset` tinyint(4) NOT NULL,
  `wastafel` tinyint(4) NOT NULL,
  `lantai` tinyint(4) NOT NULL,
  `dinding` tinyint(4) NOT NULL,
  `kaca` tinyint(4) NOT NULL,
  `bau` tinyint(4) NOT NULL,
  `sabun` tinyint(4) NOT NULL,
  `toilet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `toilets`
--

CREATE TABLE `toilets` (
  `id` int(11) NOT NULL,
  `location` varchar(50) DEFAULT NULL,
  `note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `role` tinyint(4) NOT NULL COMMENT '1:Admin\\n2:User',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `status`, `role`, `created_at`) VALUES
(1, 'admin', '$2y$10$Rvmt.4T4rn2MtNWyqptCjOZ8iKzrb963sPbXWnUdk/7mqMKP1YkNG', 'Admin Baik', 'admin@toilet.com', 1, 1, '2024-01-05 02:11:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `checklists`
--
ALTER TABLE `checklists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `toilet_id` (`toilet_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `toilets`
--
ALTER TABLE `toilets`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `checklists`
--
ALTER TABLE `checklists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `toilets`
--
ALTER TABLE `toilets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `checklists`
--
ALTER TABLE `checklists`
  ADD CONSTRAINT `FK_checklists_toilets` FOREIGN KEY (`toilet_id`) REFERENCES `toilets` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_checklists_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

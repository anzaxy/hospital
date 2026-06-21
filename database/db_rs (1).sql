-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jun 2026 pada 14.39
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `spesialis` varchar(100) NOT NULL,
  `no_telepon` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `spesialis`, `no_telepon`) VALUES
(1, 'Dr. Ahmad Wijaya, Sp.PD', 'Penyakit Dalam', '081234567891'),
(2, 'Dr. Siti Rahma, Sp.A', 'Anak', '081234567892'),
(3, 'Dr. Budi Santoso, Sp.JP', 'Jantung', '081234567893'),
(4, 'Dr. Dian Purnama, Sp.S', 'Saraf', '081234567894'),
(5, 'Dr. Andika Pratama, Sp.OG', 'Kandungan & Ginekologi', '081234567895'),
(6, 'Dr. Rina Maharani, Sp.M', 'Mata', '081234567896'),
(7, 'Dr. Hendra Gunawan, Sp.OT', 'Orthopaedi & Traumatologi', '081234567897'),
(8, 'Dr. Maya Sari, Sp.KK', 'Kulit & Kelamin', '081234567898'),
(9, 'Dr. Fajar Ramadhan, Sp.P', 'Paru', '081234567899');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text,
  `no_telepon` varchar(15) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `id_user`, `nama_lengkap`, `tanggal_lahir`, `alamat`, `no_telepon`, `email`) VALUES
(1, 3, 'Anisa Zahra Salsabila', '2006-12-02', 'Tengerang', '083895420116', 'azszahraas@gmail.com'),
(2, 4, 'Mikasa Ackerman', '1999-01-01', 'Paradise', '089812345678', 'mikasa@gmail.com'),
(3, 4, 'Bramantyo Adi Nugroho', '1992-11-05', 'Jl. Diponegoro No. 78, Yogyakarta', '081234567803', 'bramantyo.nugroho@gmail.com'),
(4, 5, 'Queena Salsabila Zahra', '2000-09-30', 'Jl. Sudirman No. 23, Surabaya', '081234567804', 'queena.zahra@gmail.com'),
(5, 6, 'Ganendra Maheswara Putra', '1996-04-17', 'Jl. Pahlawan No. 56, Semarang', '081234567805', 'ganendra.putra@gmail.com'),
(6, 7, 'Shakila Aulia Ramadhani', '1999-12-08', 'Jl. Gajah Mada No. 34, Medan', '081234567806', 'shakila.ramadhani@gmail.com'),
(7, 8, 'Muhammad Fahreza Al Ghifari', '1994-06-25', 'Jl. Imam Bonjol No. 67, Makassar', '081234567807', 'fahreza.ghifari@gmail.com'),
(8, 9, 'Keyla Safina Maharani', '2001-02-14', 'Jl. Ahmad Yani No. 89, Palembang', '081234567808', 'keyla.maharani@gmail.com'),
(9, 10, 'Bagaskara Dananjaya', '1997-08-19', 'Jl. Asia Afrika No. 12, Bandung', '081234567809', 'bagaskara.dananjaya@gmail.com'),
(10, 11, 'Alana Kirana Dewi', '2002-05-03', 'Jl. Raya Bogor No. 45, Bogor', '081234567810', 'alana.dewi@gmail.com'),
(11, 12, 'Raditya Arya Wardhana', '1993-10-11', 'Jl. Sisingamangaraja No. 78, Medan', '081234567811', 'raditya.wardhana@gmail.com'),
(12, 13, 'Azka Nurul Izzah', '2000-01-20', 'Jl. Kawi No. 34, Malang', '081234567812', 'azka.izzah@gmail.com'),
(13, 14, 'Pandu Wicaksono', '1995-07-29', 'Jl. Kalimantan No. 56, Balikpapan', '081234567813', 'pandu.wicaksono@gmail.com'),
(14, 15, 'Saskia Aurelia Putri', '2001-06-13', 'Jl. Cempaka No. 90, Denpasar', '081234567814', 'saskia.putri@gmail.com'),
(15, 16, 'Galang Prakoso', '1998-04-07', 'Jl. Mataram No. 23, Lombok', '081234567815', 'galang.prakoso@gmail.com'),
(16, 17, 'Zahra Khairunnisa', '2003-12-01', 'Jl. Dipatiukur No. 67, Bandung', '081234567816', 'zahra.khairunnisa@gmail.com'),
(17, 18, 'Dimas Aryo Bimo', '1996-09-18', 'Jl. Soekarno Hatta No. 45, Malang', '081234567817', 'dimas.bimo@gmail.com'),
(18, 19, 'Catherine Rose Sitorus', '1999-03-25', 'Jl. Sudirman No. 12, Medan', '081234567818', 'catherine.sitorus@gmail.com'),
(19, 20, 'Ardhana Putra Mahardika', '1994-11-30', 'Jl. Gatot Subroto No. 89, Jakarta Selatan', '081234567819', 'ardhana.mahardika@gmail.com'),
(20, 21, 'Farah Adiba Hanifa', '2002-08-07', 'Jl. Padjajaran No. 56, Bandung', '081234567820', 'farah.hanifa@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `keluhan_penyakit` text NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `jam_kunjungan` time NOT NULL,
  `status` enum('pending','disetujui','ditolak') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `id_pasien`, `id_dokter`, `keluhan_penyakit`, `tanggal_kunjungan`, `jam_kunjungan`, `status`, `created_at`) VALUES
(1, 2, 1, 'Sakit hati', '2026-06-21', '15:00:00', 'disetujui', '2026-06-20 06:57:01'),
(6, 1, 1, 'Demam tinggi selama 3 hari disertai batuk dan pilek', '2026-06-22', '09:00:00', 'disetujui', '2026-06-20 12:19:12'),
(7, 2, 3, 'Nyeri dada sebelah kiri, sesak napas, dan jantung berdebar', '2026-06-23', '10:30:00', 'pending', '2026-06-20 12:19:12'),
(8, 3, 6, 'Penglihatan kabur dan sering sakit kepala saat membaca', '2026-06-24', '13:00:00', 'disetujui', '2026-06-20 12:19:12'),
(9, 4, 5, 'Telat haid 2 bulan, mual di pagi hari, dan sering pusing', '2026-06-25', '14:30:00', 'ditolak', '2026-06-20 12:19:12'),
(10, 5, 8, 'Ruam merah pada kulit, gatal-gatal, dan bersisik', '2026-06-26', '08:30:00', 'pending', '2026-06-20 12:19:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','pasien') DEFAULT 'pasien',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role`, `created_at`) VALUES
(2, 'admin', '202cb962ac59075b964b07152d234b70', 'admin', '2026-06-16 14:33:21'),
(3, 'anisazahrasalsabila191', '482c811da5d5b4bc6d497ffa98491e38', 'pasien', '2026-06-16 09:59:01'),
(4, 'mikasa', '25bc1b7b8d1fd0caa4172a97800f7d63', 'pasien', '2026-06-16 10:04:38'),
(5, 'queen', 'fc72daa4bb1ab876248f7c18649aec8c', 'pasien', '2026-06-20 12:12:40'),
(6, 'ganendra', 'fc72daa4bb1ab876248f7c18649aec8c', 'pasien', '2026-06-20 12:12:40'),
(7, 'shakila', 'fc72daa4bb1ab876248f7c18649aec8c', 'pasien', '2026-06-20 12:12:40'),
(8, 'fahreza', 'fc72daa4bb1ab876248f7c18649aec8c', 'pasien', '2026-06-20 12:12:40'),
(9, 'keyla', 'fc72daa4bb1ab876248f7c18649aec8c', 'pasien', '2026-06-20 12:12:40'),
(10, 'bagaskara', 'fc72daa4bb1ab876248f7c18649aec8c', 'pasien', '2026-06-20 12:12:40'),
(11, 'alana', 'fc72daa4bb1ab876248f7c18649aec8c', 'pasien', '2026-06-20 12:12:41'),
(12, 'raditya', 'fc72daa4bb1ab876248f7c18649aec8c', 'pasien', '2026-06-20 12:12:41'),
(13, 'azka', 'fc72daa4bb1ab876248f7c18649aec8c', 'pasien', '2026-06-20 12:12:41'),
(14, 'pandu', 'fc72daa4bb1ab876248f7c18649aec8c', 'pasien', '2026-06-20 12:12:41'),
(15, 'saskia', 'fc72daa4bb1ab876248f7c18649aec8c', 'pasien', '2026-06-20 12:12:41'),
(16, 'galang', 'fc72daa4bb1ab876248f7c18649aec8c', 'pasien', '2026-06-20 12:12:41'),
(17, 'zahra', 'fc72daa4bb1ab876248f7c18649aec8c', 'pasien', '2026-06-20 12:12:41'),
(18, 'dimas', 'fc72daa4bb1ab876248f7c18649aec8c', 'pasien', '2026-06-20 12:12:41'),
(19, 'catherine', 'fc72daa4bb1ab876248f7c18649aec8c', 'pasien', '2026-06-20 12:12:41'),
(20, 'ardhana', 'fc72daa4bb1ab876248f7c18649aec8c', 'pasien', '2026-06-20 12:12:41'),
(21, 'farah', 'fc72daa4bb1ab876248f7c18649aec8c', 'pasien', '2026-06-20 12:12:41');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE,
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

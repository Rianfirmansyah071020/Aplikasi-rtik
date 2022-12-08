-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Okt 2022 pada 14.52
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rtik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agamas`
--

CREATE TABLE `agamas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `agamas`
--

INSERT INTO `agamas` (`id`, `agama`, `created_at`, `updated_at`) VALUES
(1, 'Islam', NULL, NULL),
(2, 'Kristen', '2022-10-22 08:42:26', '2022-10-22 08:42:26'),
(3, 'khatolik', '2022-10-22 08:42:33', '2022-10-22 08:42:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggotas`
--

CREATE TABLE `anggotas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `divisi_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `agama_id` bigint(20) UNSIGNED NOT NULL,
  `angkatan_id` bigint(20) UNSIGNED NOT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_th_lahir` date NOT NULL,
  `jekel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `tahun_selesai` year(4) DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `anggotas`
--

INSERT INTO `anggotas` (`id`, `divisi_id`, `status_id`, `agama_id`, `angkatan_id`, `nohp`, `nim`, `nama`, `tempat_lahir`, `tgl_th_lahir`, `jekel`, `alamat`, `tahun_masuk`, `tahun_selesai`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 1, '085364060618', '181100030', 'Rian Firmansyah', 'Singguling', '2000-10-07', 'Pria', 'Lubuk alung', 2019, 2022, 'KX0McsxnodeF87nWoNhc7IAsScxRREOVx7zCDTMR.jpg', NULL, '2022-10-23 01:12:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `angkatans`
--

CREATE TABLE `angkatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `angkatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `angkatans`
--

INSERT INTO `angkatans` (`id`, `angkatan`, `created_at`, `updated_at`) VALUES
(1, 'Angkatan 6', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikels`
--

CREATE TABLE `artikels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `anggota_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ringkasan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `artikels`
--

INSERT INTO `artikels` (`id`, `anggota_id`, `kategori_id`, `judul`, `ringkasan`, `isi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Pengertian Komputer', '<div>apakah kalian sudah tau apa itu komputer ? nah pada kesempatan kali ini kami akan menjelaskan a.....', '<div>apakah kalian sudah tau apa itu komputer ? nah pada kesempatan kali ini kami akan menjelaskan apa itu komputer,<br>Nah di kutip dari <a href=\"https://accurate.id/teknologi/pengertian-komputer/\">https://accurate.id/teknologi/pengertian-komputer/</a> , pengertian komputer secara umum yaitu komputer merupakan seperangkat alat elektronik yang bisa digunakan untuk mengolah data sesuai dengan berbagai prosedur yang sebelumnya sudah dirumuskan pada komputer, sehingga komputer mampu memberikan hasil informasi yang sangat bermanfaat untuk setiap penggunanya.<br>tidak hanya itu pengertian komputer adalah alat elektronik yang didalamnya terdapat rangkaian beragam dari komponen yang saling terhubung satu sama lain dan membentuk suatu sistem kerja.<br><br>Umumnya, komputer terdiri dari beberapa elemen utama yaitu perangkat keras (<em>hardware)</em> yang terdiri dari RAM, <em>processor, harddisk, CPU </em>dan motherboard, selanjutnya perangkat lunak (<em>software) </em>yaitu sistem operasi dan juga beragam aplikasi yang diinstall di dalam <em>hardware </em>agar bisa bekerja sesuai dengan perintah dari penggunannya.<br><br></div>', 'h5N3qvhfBoN8yxiDtFjkdfC3FRoyOMhMcDGUA2mp.jpg', '2022-10-23 00:59:50', '2022-10-23 01:01:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisis`
--

CREATE TABLE `divisis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `divisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `divisis`
--

INSERT INTO `divisis` (`id`, `divisi`, `created_at`, `updated_at`) VALUES
(1, 'Humas', NULL, NULL),
(2, 'Internal', '2022-10-22 08:41:20', '2022-10-22 08:41:20'),
(3, 'Infokom', '2022-10-22 08:41:29', '2022-10-22 08:41:29'),
(4, 'Litbang', '2022-10-22 08:41:38', '2022-10-22 08:41:38'),
(5, 'Training Of Trainer', '2022-10-22 08:41:45', '2022-10-22 08:41:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumentasis`
--

CREATE TABLE `dokumentasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dokumentasis`
--

INSERT INTO `dokumentasis` (`id`, `file`, `created_at`, `updated_at`) VALUES
(4, '1NtCkhSxV2X5N0wy8E7TvMH7m0ePhqjlk3HQOzde.jpg', '2022-10-23 00:34:07', '2022-10-23 00:34:07'),
(5, 'e0Np4WdTxvxgLnfUoiot7vRsjprjvmOtGDbfOW0H.jpg', '2022-10-23 00:34:27', '2022-10-23 00:34:27'),
(6, 'a1WY86tpmw0TsuOaFIy5HL7I3T4lePqWg14Ja0cr.jpg', '2022-10-23 00:34:42', '2022-10-23 00:34:42'),
(7, 'uoP6u0tyoQr9iIaAaXC8XqLHSdFBI5Gm4aV6tNCY.jpg', '2022-10-23 00:34:52', '2022-10-23 00:34:52'),
(8, 'FyyRLcfEgWylOdxUun98X8tnjbCfJiORnmMRWRe8.jpg', '2022-10-23 00:35:04', '2022-10-23 00:35:04'),
(9, '5CNp0Y3LrVZJMeiB7zwwleCIl7glLCCQf4vg19Cr.jpg', '2022-10-23 00:35:19', '2022-10-23 00:35:19'),
(10, 'MfrcdEbBaM5TLBhT6tfQMQiBjmBQJYQPG5msWMsH.jpg', '2022-10-23 00:35:44', '2022-10-23 00:35:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'Teknologi', '2022-10-22 08:42:52', '2022-10-22 08:42:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontents`
--

CREATE TABLE `kontents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kontents`
--

INSERT INTO `kontents` (`id`, `isi`, `created_at`, `updated_at`) VALUES
(1, '<h1><strong>Organisasi Relawan TIK Komisariat STMIK Indonesia Padang</strong></h1><div>merupakan organisasi yang bergerak dibidang sosial kemasyarakatan dan memiliki tujuan untuk mencerdaskan masyarakat khususnya dibidang ilmu teknologi.<br><br><strong>Relawan TIK Komisariat STMIK Indonesia Padang </strong>merupakan organisasi RTIK yang berada di kampus STMIK Indonesia Padang, yang sudah berdiri sejak beberapa tahun yang lalu. RTIK Komsat STMIK Indonesia Padang sudah banyak melakukan pengabdian masyarakat seperti ke solok, pariangan, tiku dan masih banyak lagi.<br><br><strong>Organisasi RTIK Komsat STMIK Indonesia Padang memiliki 5 Divisi yaitu:</strong></div><ol><li>Divisi Internal</li><li>Divisi Litbang</li><li>Divisi Humas</li><li>Divisi Training Of Trainer</li><li>Divisi Infokom</li></ol><div>Adapun tugas dan fungsi dari masing-masing divisi sebagai berikut</div><ol><li>Divisi Internal : seperti namanya divisi ini memiliki tugas yaitu untuk mengatur internal dari organisasi.</li><li>Divisi Litbang : Litbang merupakan singkatan dari <strong>Penelitian Dan Pengembangan. </strong>Tugas dari divisi ini yaitu melakukan penelitian dan pengembangan guna untuk memajukan organisasi.</li><li>Divisi Humas : Humas merupakan singkatan dari <strong>Hubungan Masyarakat. </strong>Tugas dari divisi ini yaitu sebagai penghubung antara organisasi dengan masyarakat luar, seperti sesama organisasi mahasiswa yang ada di kampus dan masyarakat luar kampus.</li><li>Divisi Training Of Trainer : Divisi Training Of Trainer atau juga biasa disebut dengan divisi TOT. Divisi TOT ini memiliki tugas yaitu untuk memberikan pelatihan kepada anggota guna untuk meningkatkan kualitas dari SDM organisasi.</li><li>Infokom : Infokom merupakan divisi yang memiliki tugas untuk mengelola semua sosial media dari organisasi</li></ol>', '2022-10-22 08:57:52', '2022-10-23 19:55:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_10_17_130953_create_pendaftars_table', 1),
(3, '2022_10_17_131026_create_artikels_table', 1),
(4, '2022_10_17_131056_create_anggotas_table', 1),
(5, '2022_10_17_131217_create_agamas_table', 1),
(6, '2022_10_17_131244_create_divisis_table', 1),
(7, '2022_10_17_131315_create_statuses_table', 1),
(8, '2022_10_17_131336_create_dokumentasis_table', 1),
(9, '2022_10_19_080855_create_users_table', 1),
(10, '2022_10_20_064448_create_kategoris_table', 1),
(11, '2022_10_21_055038_create_kontents_table', 1),
(12, '2022_10_22_093602_create_angkatans_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftars`
--

CREATE TABLE `pendaftars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `divisi_id` bigint(20) UNSIGNED NOT NULL,
  `agama_id` bigint(20) UNSIGNED NOT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_th_lahir` date NOT NULL,
  `jekel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendaftars`
--

INSERT INTO `pendaftars` (`id`, `divisi_id`, `agama_id`, `nohp`, `nim`, `nama`, `tempat_lahir`, `tgl_th_lahir`, `jekel`, `alamat`, `tujuan`, `tahun_masuk`, `gambar`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '085364060618', '181100030', 'Rian Firmansyah', 'Singguling', '2000-10-01', 'Pria', 'Lubuk alung', 'Ingin membagikan ilmu yang didapat ke masyarakat, dan ingin menjadi orang yang ahli di akademik maupun non akademik', 2022, 'fJjWgyM2AN7969Ct6510qoXQObpIQVjBFx3R5NRm.jpg', '2022-10-30 05:53:02', '2022-10-30 05:53:02'),
(3, 2, 1, '085364060618', '191100098', 'Nurmayanti', 'Batusangkar', '1999-05-28', 'Wanita', 'Batusangkar', 'Ingin belajar dan mengaplikasikan ilmu ke masyarakat', 2022, 'UkXLpQXVkS1JycvKgGVZsmhkPTJ077zVbYTOpMCs.jpg', '2022-10-30 22:44:15', '2022-10-30 22:44:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `statuses`
--

INSERT INTO `statuses` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kepengurusan', NULL, NULL),
(2, 'Alumni', '2022-10-22 08:42:04', '2022-10-22 08:42:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `anggota_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `anggota_id`, `email`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 1, 'rian@gmail.com', '$2y$10$eq64fRopHVxlzFIQ4WjqgeIYxtGRPLZlI/qpUuInqgKokqFpG8lJi', 'anggota', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agamas`
--
ALTER TABLE `agamas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `anggotas`
--
ALTER TABLE `anggotas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `angkatans`
--
ALTER TABLE `angkatans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `artikels`
--
ALTER TABLE `artikels`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `divisis`
--
ALTER TABLE `divisis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dokumentasis`
--
ALTER TABLE `dokumentasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kontents`
--
ALTER TABLE `kontents`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendaftars`
--
ALTER TABLE `pendaftars`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `statuses`
--
ALTER TABLE `statuses`
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
-- AUTO_INCREMENT untuk tabel `agamas`
--
ALTER TABLE `agamas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `anggotas`
--
ALTER TABLE `anggotas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `angkatans`
--
ALTER TABLE `angkatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `artikels`
--
ALTER TABLE `artikels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `divisis`
--
ALTER TABLE `divisis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `dokumentasis`
--
ALTER TABLE `dokumentasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kontents`
--
ALTER TABLE `kontents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pendaftars`
--
ALTER TABLE `pendaftars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

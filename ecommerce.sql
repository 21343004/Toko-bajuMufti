-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2025 pada 02.34
-- Versi server: 10.4.16-MariaDB
-- Versi PHP: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `status` enum('pending','paid','delivered','cancelled') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `stock`, `category_id`, `image`, `created_at`) VALUES
(1, 'Kaos Ryouta 7 SlamDunk', '150000.00', 'Unisex ( Untuk Cowok & Cewek)\r\n\r\nBahan \r\n\r\n- Reguler Fit = 100% Cotton Combed 30s bukan Carded\r\n\r\n- Oversize = HEAVYWEIGHT Cotton 200 GSM\r\n\r\nSablon = Premium DTF\r\n\r\n\r\n\r\nSize Chart (Panjang x Lebar):\r\n\r\n*Lebih baik tanya admin jika ragu untuk ukuran badan kamu ya*\r\n\r\n\r\n\r\nReguler Fit\r\n\r\nM: 67cm x 49cm [utk berat 40kg - 58kg]\r\n\r\nL: 71cm x 52cm [utk berat 58kg - 72kg]\r\n\r\nXL: 73cm x 55cm [utk berat 72kg - 86kg]\r\n\r\nXXL: 75cm x 58cm [utk berat 86kg - 100kg]\r\n\r\n\r\n\r\nOversize\r\n\r\nS: 70cm x 55cm [utk berat 40kg - 60kg]\r\n\r\nM: 72cm x 57cm [utk berat 60kg - 75kg]\r\n\r\nL: 74cm x 59cm [utk berat 75kg - 90kg]\r\n\r\nXL: 76cm x 61cm [utk berat 90kg - 105kg]\r\n\r\nXXL: 78cm x 64cm [utk berat 105kg - 120kg]\r\n\r\n\r\n\r\n*Toleransi ukuran +- 1-2cm\r\n\r\n----\r\n\r\nTRNOVR salah kirim size, cacat, atau kurang? Bisa retur dengan ketentuan:\r\n\r\n* Sertakan bukti video unboxing.\r\n\r\n\r\n\r\n* Maksimal konfirmasi retur 1 x 24 jam setelah produk diterima.\r\n\r\n\r\n\r\n* Hanya berlaku untuk produk cacat produksi (rusak, berlubang, dan robek).\r\n\r\n\r\n\r\n* Wajib memberi penilaian terbaik sebelum pengajuan proses retur.\r\n\r\n----\r\n\r\nSaran Pencucian:\r\n\r\n\r\n\r\n1. Jangan disikat\r\n\r\n2. Jangan gunakan pemutih\r\n\r\n3. Cuci dengan cara dibalik, luar-dalam pakaian\r\n\r\n4. Setrika dengan suhu sedang\r\n\r\n--\r\n\r\nTerima kasih sudah membaca dan selamat berbelanja!', 69, NULL, 'ryouta.jpeg', '2025-04-30 08:56:53'),
(2, 'Kaos Gojo Black', '120000.00', 'Dengan design yg lebih colorful dan karakter2 menginspirasi,\r\n\r\nkami dengan bangga mempersembahkan TRNOVR Anime Edition!\r\n\r\n\r\n\r\nUnisex ( Untuk Cowok & Cewek)\r\n\r\nBahan \r\n\r\n- Reguler Fit = 100% Cotton Combed 30s bukan Carded\r\n\r\n- Oversize = HEAVYWEIGHT Cotton 200 GSM\r\n\r\nSablon = Premium DTF\r\n\r\n\r\n\r\nSize Chart (Panjang x Lebar):\r\n\r\n*Lebih baik tanya admin jika ragu untuk ukuran badan kamu ya*\r\n\r\n\r\n\r\nReguler Fit\r\n\r\nM: 67cm x 49cm [utk berat 40kg - 58kg]\r\n\r\nL: 71cm x 52cm [utk berat 58kg - 72kg]\r\n\r\nXL: 73cm x 55cm [utk berat 72kg - 86kg]\r\n\r\nXXL: 75cm x 58cm [utk berat 86kg - 100kg]\r\n\r\n\r\n\r\nOversize\r\n\r\nS: 70cm x 55cm [utk berat 40kg - 60kg]\r\n\r\nM: 72cm x 57cm [utk berat 60kg - 75kg]\r\n\r\nL: 74cm x 59cm [utk berat 75kg - 90kg]\r\n\r\nXL: 76cm x 61cm [utk berat 90kg - 105kg]\r\n\r\nXL: 78cm x 64cm [utk berat 105kg - 120kg]\r\n\r\n\r\n\r\n*Toleransi ukuran +- 1-2cm\r\n\r\n----\r\n\r\nTRNOVR salah kirim size, cacat, atau kurang? Bisa retur dengan ketentuan:\r\n\r\n* Sertakan bukti video unboxing.\r\n\r\n\r\n\r\n* Maksimal konfirmasi retur 1 x 24 jam setelah produk diterima.\r\n\r\n\r\n\r\n* Hanya berlaku untuk produk cacat produksi (rusak, berlubang, dan robek).\r\n\r\n\r\n\r\n* Wajib memberi penilaian terbaik sebelum pengajuan proses retur.\r\n\r\n----\r\n\r\nSaran Pencucian:\r\n\r\n\r\n\r\n1. Jangan disikat\r\n\r\n2. Jangan gunakan pemutih\r\n\r\n3. Cuci dengan cara dibalik, luar-dalam pakaian\r\n\r\n4. Setrika dengan suhu sedang\r\n\r\n--\r\n\r\nTerima kasih sudah membaca dan selamat berbelanja!', 40, NULL, 'gojo.jpeg', '2025-04-30 09:00:41'),
(3, 'SlamDunk White n Black', '60000.00', 'Setiap barang yang berada di etalase berarti READY STOCK\r\n\r\n\r\n\r\nBahan 100% Cotton, Combed 24s\r\n\r\nSablon : DTF (DIGITAL TRANSFER FILM)\r\n\r\nSablon Hologram : Polyflex\r\n\r\n\r\n\r\nReady Size : S, M, L, XL, XXL\r\n\r\n(Lebar dada x Panjang ke bawah)\r\n\r\nS : 46 x 63 cm (Lingkar 92cm)\r\n\r\nM : 48 x 68 cm (Lingkar 96cm)\r\n\r\nL : 50 x 69 cm (Lingkar 100cm)\r\n\r\nXL : 53 x 71 cm (Lingkar 106cm)\r\n\r\nXXL : 55x 73 cm (Lingkar 110cm)\r\n\r\n3XL: 57 cm x 74 CM (Lingkar 114 cm)\r\n\r\n4XL : 59 X 76 CM (Lingkar 118 cm)\r\n\r\n5XL : 61 CM x 79 CM (Lingkar 122 cm)\r\n\r\nToleransi 1-2cm (harap maklum)\r\n\r\n\r\n\r\nNOTES:\r\n\r\n- CANTUMKAN WARNA YANG DIINGINKAN DI CATATAN,TIDAK MENCANTUMKAN CATATAN KAMI KIRIM WARNA UTAMA SESUAI FOTO PRODUK DI SETIAP VARIASI	\r\n\r\n\r\n\r\n\"Jangan lupa untuk mengukur baju yang ingin anda beli dan sesuaikan dengan ukuran dari kita, agar kaos sesuai dengan harapan kita\"\r\n\r\n\r\n\r\nSelamat Berbelanja.', 6, NULL, 'slamdunk.jpeg', '2025-04-30 09:03:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'admin', 'mufti@gmail.com', '123', 'admin', '2025-06-02 00:30:40');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

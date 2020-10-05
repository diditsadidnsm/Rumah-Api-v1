-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 05, 2020 at 10:13 AM
-- Server version: 10.3.24-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u4252425_rumahapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `slug`, `title`) VALUES
(1, 'fire-hydrant', 'Fire Hydrant'),
(3, 'fire-extinguisher', 'Fire Extinguisher');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `title`) VALUES
(1, 'Technology');

-- --------------------------------------------------------

--
-- Table structure for table `employment`
--

CREATE TABLE `employment` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employment`
--

INSERT INTO `employment` (`id`, `title`) VALUES
(1, 'Full time');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `id_departments` int(11) NOT NULL,
  `id_employment` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `quotes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `id_departments`, `id_employment`, `slug`, `title`, `code`, `description`, `location`, `quotes`) VALUES
(1, 1, 1, 'content-writer', 'Content Writer', 'CW-001', 'Perusahaan PT. Tigris Fire yang bergerak di bidang Alat Pemadam Kebakaran mencari seseorang anak muda untuk membantu di departemen Digital Marketing. Kualifikasi yang kami cari:\r\n<br><br>\r\n1. Memiliki skill MENULIS SEO\r\n<br><br>\r\n2. Skill untuk content writer untuk blog dan social media\r\n<br><br>\r\n3. Passion di bidang menulis\r\n<br><br>\r\n4. Komunikasi lancar, cepat dan bertanggung jawab memenuhi deadline\r\n<br><br>\r\nPosisi ini tidak terikat tempat dan waktu kerja, hanya saja ada deadline yang harus dipatuhi.', 'Bekasi, Indonesia', 'Content hasil Pemikiran Sendiri bukan dari Copy Paste dari Website lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `status` enum('waiting','paid','delivered','cancel') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders_confirm`
--

CREATE TABLE `orders_confirm` (
  `id` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(4) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `id_category`, `slug`, `title`, `description`, `price`, `is_available`, `image`) VALUES
(1, 1, 'hydrant-box-type-a1-std-uk-65-x-55-x-15-cm', 'Hydrant Box Type A1 STD UK (65X55X15) cm', 'Deskripsi Hydrant Box Type A1 STD UK (65X55X15) cm<br>\r\nFire hydrant box adalah kotak yang digunakan untuk menyimpan peralatan pemadam kebakaran (fire extinguishers). Fire hydrant box dibuat secara eksklusif oleh produsen yang bergerak di bidang peralatan fire hydrant untuk menjaga agar pemadam api tetap tersimpan dengan baik, pada saat alat pemadam kebakaran (fire brigade) perlu mengetahui lokasi pemadam kebakaran yang membutukan posisi sehingga tidak ada waktu tidak terlalu lama saat menyiapkan alat pemadam api untuk memadamkan api. Karena alat pemadam api sangat penting tentunya untuk penempatan tidak asal ada tempat untuk penyimpanan.\r\n<br><br>\r\nDengan fire hydrant box tentu sangat bermanfaat dan membantu tim menyiapkan petugas pemadam kebakaran untuk peralatan pemadam kebakaran dan mempermudah mencari lokasi peralatan pemadam kebakaran. Disamping itu, dengan menggunakan fire hydrant fire extinguisher terdapat ruang toko yang lebih indah dilihat dan indah.\r\n<br><br>\r\n\r\nLokasi<br>\r\nRumah Api<br>\r\nJl. RA Kartini No.61<br>\r\nMargahayu- Bekasi Timur 17113\r\n<br><br>\r\nSmart Buyer & Happy Shopping^.^', 890000, 1, 'fire-hydrant-box-outdoor-guardall-type-c-20201004200420.jpg'),
(3, 3, 'apar-1-kg', 'APAR 1 Kg', 'Deskripsi APAR 1 Kg<br>\r\nAlat Pemadam Api Ringan ( APAR )\r\n<br><br>\r\nAPAR yang telah LULUS UJI Lab Dinas Pemadam Kebakaran dan Bersertifikat\r\n<br><br>\r\nAPAR Merk Tigris Fire<br>\r\nJenis : Dry Chemical Powder<br>\r\nBerat isi : 1 Kg<br>\r\nBerat Kotor : 2.01 KG\r\n<br><br>\r\nEfektif Memadamkan Api untuk Kelas Kebakaran A, B, C.<br>\r\nKelengkapan : 1 unit tabung dengan pressure gauge, pin, nozzle, dan 1 buah bracket gantung / hanger<br>\r\nUkuran nya yang Mini Apar ini banyak digunakan di dalam Kendaraan.<br>\r\nJaminan Produk dan Tekanan Turun selama 1 ( Satu ) Tahun.\r\n<br><br>\r\n\r\nLokasi<br>\r\nRumah Api<br>\r\nJl. RA Kartini No.61<br>\r\nMargahayu- Bekasi Timur 17113\r\n<br><br>\r\nSmart Buyer & Happy Shopping^.^', 159000, 1, 'apar-1-kg-20201004234613.jpg'),
(4, 1, 'hydrant-box-type-a2-std-uk-100-x-80-x-18-cm', 'Hydrant Box Type A2 STD UK (100X80X18) cm', 'Deskripsi Hydrant Box Type A2 STD UK (100X80X18) cm<br>\r\nFire hydrant box adalah kotak yang digunakan untuk menyimpan peralatan pemadam kebakaran (fire extinguishers). Fire hydrant box dibuat secara eksklusif oleh produsen yang bergerak di bidang peralatan fire hydrant untuk menjaga agar pemadam api tetap tersimpan dengan baik, pada saat alat pemadam kebakaran (fire brigade) perlu mengetahui lokasi pemadam kebakaran yang membutukan posisi sehingga tidak ada waktu tidak terlalu lama saat menyiapkan alat pemadam api untuk memadamkan api. Karena alat pemadam api sangat penting tentunya untuk penempatan tidak asal ada tempat untuk penyimpanan.\r\n<br><br>\r\nDengan fire hydrant box tentu sangat bermanfaat dan membantu tim menyiapkan petugas pemadam kebakaran untuk peralatan pemadam kebakaran dan mempermudah mencari lokasi peralatan pemadam kebakaran. Disamping itu, dengan menggunakan fire hydrant fire extinguisher terdapat ruang toko yang lebih indah dilihat dan indah.\r\n<br><br>\r\n\r\nLokasi<br>\r\nRumah Api<br>\r\nJl. RA Kartini No.61<br>\r\nMargahayu- Bekasi Timur 17113\r\n<br><br>\r\nSmart Buyer & Happy Shopping^.^', 1144000, 1, 'hydrant-box-type-a2-std-uk-100x80x18-cm-20201004201209.jpg'),
(5, 1, 'hydrant-box-type-b-std-uk-125-x-75-x-18-cm', 'Hydrant Box Type B STD UK (125X75X18) cm', 'Deskripsi Hydrant Box Type B STD UK (125X75X18) cm<br>\r\nFire hydrant box adalah kotak yang digunakan untuk menyimpan peralatan pemadam kebakaran (fire extinguishers). Fire hydrant box dibuat secara eksklusif oleh produsen yang bergerak di bidang peralatan fire hydrant untuk menjaga agar pemadam api tetap tersimpan dengan baik, pada saat alat pemadam kebakaran (fire brigade) perlu mengetahui lokasi pemadam kebakaran yang membutukan posisi sehingga tidak ada waktu tidak terlalu lama saat menyiapkan alat pemadam api untuk memadamkan api. Karena alat pemadam api sangat penting tentunya untuk penempatan tidak asal ada tempat untuk penyimpanan.\r\n<br><br>\r\nDengan fire hydrant box tentu sangat bermanfaat dan membantu tim menyiapkan petugas pemadam kebakaran untuk peralatan pemadam kebakaran dan mempermudah mencari lokasi peralatan pemadam kebakaran. Disamping itu, dengan menggunakan fire hydrant fire extinguisher terdapat ruang toko yang lebih indah dilihat dan indah.\r\n<br><br>\r\n\r\nLokasi<br>\r\nRumah Api<br>\r\nJl. RA Kartini No.61<br>\r\nMargahayu- Bekasi Timur 17113\r\n<br><br>\r\nSmart Buyer & Happy Shopping^.^', 1320000, 1, 'hydrant-box-type-b-std-uk-125x75x18-cm-20201004201937.jpg'),
(6, 1, 'hydrant-box-type-c-std-uk-95-x-66-x-20-cm', 'Hydrant Box Type C STD UK (95X66X20) cm', 'Deskripsi Hydrant Box Type C STD UK (95X66X20) cm<br>\r\nFire hydrant box adalah kotak yang digunakan untuk menyimpan peralatan pemadam kebakaran (fire extinguishers). Fire hydrant box dibuat secara eksklusif oleh produsen yang bergerak di bidang peralatan fire hydrant untuk menjaga agar pemadam api tetap tersimpan dengan baik, pada saat alat pemadam kebakaran (fire brigade) perlu mengetahui lokasi pemadam kebakaran yang membutukan posisi sehingga tidak ada waktu tidak terlalu lama saat menyiapkan alat pemadam api untuk memadamkan api. Karena alat pemadam api sangat penting tentunya untuk penempatan tidak asal ada tempat untuk penyimpanan.\r\n<br><br>\r\nDengan fire hydrant box tentu sangat bermanfaat dan membantu tim menyiapkan petugas pemadam kebakaran untuk peralatan pemadam kebakaran dan mempermudah mencari lokasi peralatan pemadam kebakaran. Disamping itu, dengan menggunakan fire hydrant fire extinguisher terdapat ruang toko yang lebih indah dilihat dan indah.\r\n<br><br>\r\n\r\nLokasi<br>\r\nRumah Api<br>\r\nJl. RA Kartini No.61<br>\r\nMargahayu- Bekasi Timur 17113\r\n<br><br>\r\nSmart Buyer & Happy Shopping^.^', 1235000, 1, 'hydrant-box-type-c-std-uk-95x66x20-cm-20201004202855.jpg'),
(7, 3, 'apar-2-kg', 'APAR 2 Kg', 'Deskripsi APAR 2 Kg<br>\r\nAlat Pemadam Api Ringan ( APAR ) TIGRIS FIRE\r\n<br><br>\r\nAPAR yang telah LULUS UJI Lab Dinas Pemadam Kebakaran dan Bersertifikat\r\n<br><br>\r\nAPAR Merk Tigris Fire<br>\r\nJenis : Dry Chemical Powder<br>\r\nBerat Isi : 2 KG<br>\r\nBerat Kotor : 3.06 KG\r\n<br><br>\r\nEfektif Memadamkan Api untuk Kelas Kebakaran A , B, C.<br>\r\nKelengkapan : 1 unit tabung dengan pressure gauge, pin, nozzle, dan 1 buah bracket gantung / hanger<br>\r\nBanyak digunakan di Bangunan Komersial, Industri, Workshop, dll<br>\r\nJaminan Produk dan Tekanan Turun selama 1 ( Satu ) Tahun.\r\n<br><br>\r\n\r\nLokasi<br>\r\nRumah Api<br>\r\nJl. RA Kartini No.61<br>\r\nMargahayu- Bekasi Timur 17113\r\n<br><br>\r\nSmart Buyer & Happy Shopping^.^', 250000, 1, 'apar-2-kg-20201004203920.jpg'),
(8, 3, 'apar-3-kg', 'APAR 3 Kg', 'Deskripsi APAR 3 Kg<br>\r\nAlat Pemadam Api Ringan ( APAR )\r\n<br><br>\r\nAPAR yang telah LULUS UJI Lab DInas Pemadam Kebarakan dan Bersertifikasi\r\n<br><br>\r\nAPAR Merk Tigris Fire<br>\r\nJenis : Dry Chemical Powder<br>\r\nBerat Isi : 3 KG<br>\r\nBerat Kotor : 4.97 KG\r\n<br><br>\r\nEfektif Memadamkan Api untuk Kelas Kebakaran A , B, C.<br>\r\nKelengkapan : 1 unit tabung dengan pressure gauge, pin, nozzle, dan 1 buah bracket gantung / hanger<br>\r\nBanyak digunakan di Bangunan Komersial, Industri, Workshop, dll<br>\r\nJaminan Produk dan Tekanan Turun selama 1 ( Satu ) Tahun.\r\n<br><br>\r\n\r\nLokasi<br>\r\nRumah Api<br>\r\nJl. RA Kartini No.61<br>\r\nMargahayu- Bekasi Timur 17113\r\n<br><br>\r\nSmart Buyer & Happy Shopping^.^', 375000, 1, 'apar-3-kg-20201004204252.jpg'),
(9, 3, 'apar-4-kg', 'APAR 4 Kg', 'Deskripsi APAR 4 Kg<br>\r\nAlat Pemadam Api Ringan ( APAR )\r\n<br><br>\r\nAPAR yang telah LULUS UJI Lab Dinas Pemadam Kebakaran dan Bersertifikat\r\n<br><br>\r\nAPAR Merk Tigris Fire<br>\r\nJenis : Dry Chemical Powder<br>\r\nBerat Isi : 4 KG<br>\r\nBerat Kotor : 6 KG\r\n<br><br>\r\nEfektif Memadamkan Api untuk Kelas Kebakaran A , B, C.<br>\r\nKelengkapan : 1 unit tabung dengan pressure gauge, pin, nozzle, dan 1 buah bracket gantung / hanger<br>\r\nBanyak digunakan di Bangunan Komersial, Industri, Workshop, dll<br>\r\nJaminan Produk dan Tekanan Turun selama 1 ( Satu ) Tahun.\r\n<br><br>\r\n\r\nLokasi<br>\r\nRumah Api<br>\r\nJl. RA Kartini No.61<br>\r\nMargahayu- Bekasi Timur 17113\r\n<br><br>\r\nSmart Buyer & Happy Shopping^.^', 500000, 1, 'apar-4-kg-20201004204535.jpg'),
(10, 3, 'apar-5-kg', 'APAR 5 Kg', 'Deskripsi APAR 5 Kg<br>\r\nAlat Pemadam Api Ringan ( APAR )\r\n<br><br>\r\nAPAR yang telah LULUS UJI Lab Dinas Pemadam Kebakaran dan Bersertifikat\r\n<br><br>\r\nAPAR merk Tigris Fire<br>\r\nJenis : Dry Chemical Powder<br>\r\nBerat Isi : 5 KG<br>\r\nBerat Kotor : 7 KG\r\n<br><br>\r\nEfektif Memadamkan Api untuk Kelas Kebakaran A , B, C.<br>\r\nKelengkapan : 1 unit tabung dengan pressure gauge, pin, nozzle, dan 1 buah bracket gantung / hanger<br>\r\nBanyak digunakan di Bangunan Komersial, Industri, Workshop, dll<br>\r\nJaminan Produk dan Tekanan Turun selama 1 ( Satu ) Tahun.\r\n<br><br>\r\n\r\nLokasi<br>\r\nRumah Api<br>\r\nJl. RA Kartini No.61<br>\r\nMargahayu- Bekasi Timur 17113\r\n<br><br>\r\nSmart Buyer & Happy Shopping^.^', 700000, 1, 'apar-5-kg-20201004204725.jpg'),
(11, 3, 'apar-6-kg', 'APAR 6 Kg', 'Deskripsi APAR 6 Kg<br>\r\nAlat Pemadam Api Ringan ( APAR )\r\n<br><br>\r\nAPAR yang telah LULUS UJI Lab Dinas Pemadam Kebakaran dan Bersertifikat\r\n<br><br>\r\nAPAR Merk Tigris Fire<br>\r\nJenis : Dry Chemical Powder<br>\r\nBerat Isi : 6 KG<br>\r\nBerat Kotor : 9,3 KG\r\n<br><br>\r\nEfektif Memadamkan Api untuk Kelas Kebakaran A , B, C.<br>\r\nKelengkapan : 1 unit tabung dengan pressure gauge, pin, nozzle, dan 1 buah bracket gantung / hanger<br>\r\nBanyak digunakan di Bangunan Komersial, Industri, Workshop, dll<br>\r\nJaminan Produk dan Tekanan Turun selama 1 ( Satu ) Tahun.\r\n<br><br>\r\n\r\nLokasi<br>\r\nRumah Api<br>\r\nJl. RA Kartini No.61<br>\r\nMargahayu- Bekasi Timur 17113\r\n<br><br>\r\nSmart Buyer & Happy Shopping^.^', 845000, 1, 'apar-6-kg-20201004205101.jpg'),
(12, 3, 'apar-9-kg', 'APAR 9 Kg', 'Deskripsi APAR 9 Kg<br>\r\nAlat Pemadam Api Ringan ( APAR )\r\n<br><br>\r\nAPAR yang telah LULUS UJI Lab Dinas Pemadam Kebakaran dan Bersertifikat<br>\r\nAPAR merk Tigris Fire<br>\r\nJenis : Dry Chemical Powder<br>\r\nBerat Isi : 9 KG<br>\r\nBerat Kotor : 12 KG\r\n<br><br>\r\nEfektif Memadamkan Api untuk Kelas Kebakaran A , B, C.<br>\r\nKelengkapan : 1 unit tabung dengan pressure gauge, pin, nozzle, dan 1 buah bracket gantung / hanger<br>\r\nBanyak digunakan di Bangunan Komersial, Industri, Workshop, dll<br>\r\nJaminan Produk dan Tekanan Turun selama 1 ( Satu ) Tahun.\r\n<br><br>\r\n\r\nLokasi<br>\r\nRumah Api<br>\r\nJl. RA Kartini No.61<br>\r\nMargahayu- Bekasi Timur 17113\r\n<br><br>\r\nSmart Buyer & Happy Shopping^.^', 1085000, 1, 'apar-9-kg-20201004215421.jpg'),
(13, 3, 'apar-12-kg', 'APAR 12 KG', 'Deskripsi APAR 12 KG<br>\r\nAlat Pemadam Api Ringan ( APAR ) TIGRIS FIRE\r\n<br><br>\r\nAPAR yang telah LULUS UJI DAMKAR<br>\r\nUkuran 12 KG<br>\r\nBerat Isi : 12 KG<br>\r\nBerat Kotor : 15,9 KG\r\n<br><br>\r\nEfektif Memadamkan Api untuk Kelas Kebakaran A , B, C.<br>\r\nBanyak digunakan di Bangunan Komersial, Industri, Workshop, dll<br>\r\nJaminan Produk dan Tekanan Turun selama 1 ( Satu ) Tahun.<br>\r\n( Syarat & Ketentuan Berlaku ya )\r\n<br><br>\r\n\r\nLokasi<br>\r\nRumah Api<br>\r\nJl. RA Kartini No.61<br>\r\nMargahayu- Bekasi Timur 17113\r\n<br><br>\r\nSmart Buyer & Happy Shopping^.^', 1656000, 1, 'apar-12-kg-20201004215712.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','member') NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `telp`, `email`, `password`, `role`, `is_active`, `image`) VALUES
(1, 'Nashiruddien Sadid Mustaqim', '081385259169', 'diditsadidnsm180818@gmail.com', '$2y$10$FCNacOjkldTw80nwkzL.p.PDbbsZPIbdUCpRBiukFwgZzhw1G6hde', 'admin', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employment`
--
ALTER TABLE `employment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_confirm`
--
ALTER TABLE `orders_confirm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employment`
--
ALTER TABLE `employment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_confirm`
--
ALTER TABLE `orders_confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

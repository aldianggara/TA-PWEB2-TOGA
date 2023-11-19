-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 04:40 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_identitas` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `jabatan` tinyint(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id`, `nama`, `no_identitas`, `pass`, `status`, `jabatan`, `email`, `alamat`, `no_telepon`) VALUES
(1, 'Yusuf Ridho', '1234', '', 1, 1, 'ridho@teknokrat.ac.id', 'gedung tataan', '1234556788'),
(9, 'Lukas', '123456', '32323', 1, 1, 'lukas@tekno.id', 'Teluk', '12323'),
(2, 'risal syawaludin', '234123', '', 1, 2, 'risal@teknokrat.ac.id', 'gedung tataan', '8940184901'),
(10, 'SYDNEY', '45454', '444', 1, 2, 'lukas@teknokrat.ac.id', 'Teluk', '12323'),
(8, 'toat', '73482', '', 0, 5, 'toat@teknokrat.ac.id', 'taman sari', '98479329846'),
(3, 'lukas ', '823982', '', 1, 3, 'lukas@teknokrat.ac.id', 'teluk', '7327848103'),
(5, 'rusli', '892382', '', 0, 4, 'rusli@teknokrat.ac.id', 'panjang', '8948912891'),
(7, 'mimin', '892893', '', 0, 5, 'mimin@teknokrat.ac.id', 'kedaton', '8948928923'),
(6, 'datik', '894891', '', 1, 4, 'didit@teknokrat.ac.id', 'kedaton', '8402901901');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id` int(11) NOT NULL,
  `no_panggil` varchar(15) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `bahasa` varchar(50) NOT NULL,
  `isbn_issn` varchar(17) NOT NULL,
  `edisi` int(11) DEFAULT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `deskripsi_fisik` varchar(50) NOT NULL,
  `deskripsi_buku` longtext DEFAULT NULL,
  `sampul` text NOT NULL,
  `jumlah` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id`, `no_panggil`, `judul_buku`, `pengarang`, `penerbit`, `bahasa`, `isbn_issn`, `edisi`, `tahun_terbit`, `deskripsi_fisik`, `deskripsi_buku`, `sampul`, `jumlah`) VALUES
(3, '004.6 ABD p', '7 in 1 Pemrograman web untuk pemula', 'Rohi Abdullah', 'Jakarta : PT Elex Media Komputindo., 2019', 'Indonesia', '978-602-04-7943-9', 1, 2019, 'xiv + 320 hlm', 'Bagi pemula, tentu akan sangat tertinggal jika tidak cepat mengejarnya. Buku ini membahas 7 materi utama dalam mempelajari pemrograman web. Ketujuh bahasan ini akan sangat membantu pemula yang ingin menjadi web programmer dalam waktu yang singkat.Pembahasan dimulai dari pengetahuan dasar tentang pemrograman web, dilanjutkan dengan pembahasan 7 materi pemrograman web satu per satu disertai dengan contoh skrip beserta hasilnya. Disertai juga pembuatan aplikasi sederhana yang akan membantu pembaca menguasai pembuatan modul aplikasi.Untuk menunjang latihan pembaca, penulis juga menyertakan puluhan bonus skrip aplikatif.', 'https://cdn.gramedia.com/uploads/items/9786020638263.jpg', 1),
(1, '005.1 RAH p', 'Pemrograman Android dengan Flutter', 'Budi Raharjo', 'Bandung : Informatika., 2019', 'indonesia', '978-623-7131-06-9', 1, 2019, 'xiv + 354 hlm.', 'Buku ini berisi teknik-teknik yang diperlukan untuk membuat aplikasi Androld menggunakan Flutter, salah salu frarnework atau Software Development Kit (SDK) untuk pengembangan aplikasi mobile yang dapat berjalan di sistern operasi iOS dan Android. Meskipun Flutter dapat digunakan untuk mernbuat aplikasi untuk iOS. namun buku ini hanya membahas tentang penggunaan Flutter untuk Android\r\n\r\nFlutter diciptakan oleh Google dan dirilis pertama kall pada Mei 2017 (versi alpha). Pada Desernber 2018, Google meluncurkan Flutter 1.0.0 (versi stabil). Flutter menggunakan bahasa pernrograman Dart, yang juga diciptakan oleh Google dan dirilis pertama kali pada Oktober 2013. Flutter merupakan framework baru yang dirancang untuk rnempermudah dan mempercepat proses pembuatan aplikasi mobile, yang dulunya harus ditulis menggunakan Objective-C atau Switt (untuk i0S) dan Java atau Kotlin (untuk Androld). Dengan Flutter. kita hanya perlu mernpelajari satu bahasa pemrograrnan (Dart) untuk membuat aplikasi mobile yang dapat berjalan di dalam dua sistem operasi, iOS dan Android.', 'data:image/jpeg;base64,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', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sirkulasi`
--

CREATE TABLE `tb_sirkulasi` (
  `id` int(11) NOT NULL,
  `no_panggil` varchar(15) NOT NULL,
  `id_anggota` varchar(20) NOT NULL,
  `id_pustakawan` varchar(20) NOT NULL,
  `waktu_pinjam` datetime NOT NULL,
  `waktu_kembali` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sirkulasi`
--

INSERT INTO `tb_sirkulasi` (`id`, `no_panggil`, `id_anggota`, `id_pustakawan`, `waktu_pinjam`, `waktu_kembali`) VALUES
(6, '005.1 RAH p', '73482', '1234', '2023-06-09 23:47:16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`no_identitas`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`no_panggil`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tb_sirkulasi`
--
ALTER TABLE `tb_sirkulasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_sirkulasi`
--
ALTER TABLE `tb_sirkulasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

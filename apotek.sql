-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 12:36 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatting`
--

CREATE TABLE `chatting` (
  `id_chatting` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `chat` text DEFAULT NULL,
  `balasan` text DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatting`
--

INSERT INTO `chatting` (`id_chatting`, `id_pelanggan`, `id_pengguna`, `chat`, `balasan`, `time`, `status`) VALUES
(1, 1, 1, 'halo admin...', NULL, '2024-04-01 13:09:48', 1),
(2, 1, 1, NULL, 'apakah obat A ready?', '2024-04-01 13:10:28', 1),
(3, 1, 1, 'aku mau beli', NULL, '2024-04-01 13:14:57', 1),
(5, 1, 1, NULL, 'halo nabila', '2024-04-02 12:53:10', 1),
(6, 2, 1, 'haloo admin...', NULL, '2024-04-03 03:39:49', 0),
(7, 2, 1, NULL, 'halo saepul, ada yang bisa dibantu?', '2024-04-03 03:40:13', 0),
(8, 1, 1, 'aku perlu obat A', NULL, '2024-04-29 09:33:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_obat`
--

CREATE TABLE `detail_obat` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_obat`
--

INSERT INTO `detail_obat` (`id_detail`, `id_transaksi`, `id_obat`, `qty`) VALUES
(1, 1, 1, 2),
(2, 2, 1, 5),
(3, 3, 1, 1),
(4, 4, 4, 3),
(5, 4, 3, 1),
(6, 5, 4, 4),
(8, 7, 1, 2),
(9, 7, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_obat`
--

CREATE TABLE `kategori_obat` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_obat`
--

INSERT INTO `kategori_obat` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Kategori A'),
(3, 'Kategori C'),
(4, 'Kategori B');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_obat` varchar(125) NOT NULL,
  `deskripsi_obat` text NOT NULL,
  `keterangan` varchar(125) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` text NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `id_kategori`, `nama_obat`, `deskripsi_obat`, `keterangan`, `harga`, `foto`, `stok`) VALUES
(1, 1, 'Obat A', 'Deskripsi Obat A', 'pcs', 8880, 'abv1.png', 1000),
(3, 3, 'Obat B', 'Deskripsi Obat B', 'pcs', 4000, 'abv3.png', 95),
(4, 4, 'Obat C', 'Deskripsi Obat B', 'pcs', 3500, 'abv4.png', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(125) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `jk` varchar(125) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `level_member` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `stat_reward` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `no_hp`, `jk`, `username`, `password`, `level_member`, `point`, `stat_reward`) VALUES
(1, 'Nabila', 'Kuningan', '089887654541', 'Perempuan', 'nabila', 'nabila', 3, 0, 0),
(2, 'Saepul Anwar', 'Kuningan', '0899876565434', 'Laki - Laki', 'saepul', 'saepul', 3, 73, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(125) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `level_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level_pengguna`) VALUES
(1, 'Admin2', 'admin', 'admin', 1),
(3, 'Pemilik', 'pemilik', 'pemilik', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_obat`
--

CREATE TABLE `transaksi_obat` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tgl_transaksi` varchar(125) NOT NULL,
  `total_transaksi` int(11) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `stat_transaksi` int(11) NOT NULL,
  `bukti_pembayaran` text NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `point_transaksi` int(11) NOT NULL,
  `review` text DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_obat`
--

INSERT INTO `transaksi_obat` (`id_transaksi`, `id_pelanggan`, `tgl_transaksi`, `total_transaksi`, `ongkir`, `total_pembayaran`, `stat_transaksi`, `bukti_pembayaran`, `alamat_pengiriman`, `point_transaksi`, `review`, `time`) VALUES
(1, 1, '2024-04-01', 17760, 7000, 24760, 4, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', 'Kota Kuningan Prov. Jawa BaratExpedisi. jneCTC', 179, 'bagus banget pelayanannya', '2024-04-29 09:53:40'),
(2, 1, '2023-04-01', 44400, 7000, 51400, 2, '0', 'Kota Kuningan Prov. Jawa BaratExpedisi. jneCTC', 222, NULL, '2024-04-29 09:48:46'),
(4, 2, '2024-04-03', 14500, 7000, 21500, 4, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-12.jpg', 'Kota Kuningan Prov. Jawa BaratExpedisi. jneCTC', 73, NULL, '2024-04-29 09:48:46'),
(5, 1, '2024-04-29', 14000, 7000, 17721, 0, '0', 'Kota Kuningan Prov. Jawa BaratExpedisi. jneCTC', 70, NULL, '2024-04-29 09:48:46'),
(7, 0, '2024-04-29', 28260, 0, 0, 4, '0', 'Langsung', 0, NULL, '2024-04-29 09:48:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatting`
--
ALTER TABLE `chatting`
  ADD PRIMARY KEY (`id_chatting`);

--
-- Indexes for table `detail_obat`
--
ALTER TABLE `detail_obat`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `kategori_obat`
--
ALTER TABLE `kategori_obat`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `transaksi_obat`
--
ALTER TABLE `transaksi_obat`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatting`
--
ALTER TABLE `chatting`
  MODIFY `id_chatting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `detail_obat`
--
ALTER TABLE `detail_obat`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori_obat`
--
ALTER TABLE `kategori_obat`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi_obat`
--
ALTER TABLE `transaksi_obat`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

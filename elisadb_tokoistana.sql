-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2020 at 01:03 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elisadb_tokoistana`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `jenis_berita` varchar(20) NOT NULL,
  `judul_berita` varchar(100) NOT NULL,
  `keterangan` varchar(300) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tgl_post` date NOT NULL,
  `tgl_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `jenis_berita`, `judul_berita`, `keterangan`, `gambar`, `tgl_post`, `tgl_update`) VALUES
(1, 'Mix and Match OOTD', '5 Ide Mix and Match OOTD Colorful ala Selebgram', '5 Ide Mix and Match OOTD Colorful ala Selebgram', 'colorful4.jpg', '2020-11-25', '2020-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `no_order` varchar(15) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `no_order`, `id_produk`, `name`, `qty`) VALUES
(2, '20201113IS1QPBJ', 4, NULL, 1),
(3, '20201113IS1QPBJ', 1, NULL, 2),
(4, '20201113HDSMKNH', 4, NULL, 1),
(5, '20201113VBBFZ67', 4, NULL, 1),
(6, '20201113RJQOU7P', 5, NULL, 1),
(7, '20201113RKJF0OM', 4, NULL, 2),
(8, '20201114VFIVLSI', 4, NULL, 1),
(9, '20201115SDEHNCA', 4, NULL, 1),
(10, '20201115M7SBI2U', 5, NULL, 1),
(11, '20201116IHKGBTP', 4, NULL, 1),
(12, '20201117FDQGCP0', 4, NULL, 1),
(13, '20201117LJI4N70', 1, NULL, 1),
(14, '20201117JISNRGF', 1, 'Baju Anak Lucu', 1),
(16, '20201117TBTEM6H', 4, 'set baju tidur wanita', 1),
(17, '20201117J61JZBC', 4, 'set baju tidur wanita', 1),
(18, '20201121ZD6FEVY', 6, 'Jaket children boy', 1),
(19, '20201123X6SI1DZ', 5, 'baju set trendi', 1);

--
-- Triggers `detail_transaksi`
--
DELIMITER $$
CREATE TRIGGER `stok` AFTER INSERT ON `detail_transaksi` FOR EACH ROW BEGIN
UPDATE produk set stok = stok-NEW.qty
WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `judul_gambar` varchar(100) NOT NULL,
  `gambar` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id_produk`, `judul_gambar`, `gambar`) VALUES
(1, 4, 'gambar2', 'bajutidur2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  `tgl_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `tgl_update`) VALUES
(3, 'Fashion Wanita', '2020-11-24'),
(4, 'Fashion Pria', '2020-11-24'),
(5, 'Aksesoris', '2020-11-24'),
(6, 'Fashion Muslimah', '2020-11-24'),
(7, 'Fashion Bayi & Anak', '2020-11-24'),
(8, 'Perlengkapan Rumah', '2020-11-24'),
(9, 'Perawatan & Kecantik', '2020-11-24');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` text,
  `is_active` int(1) NOT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `no_telepon` text NOT NULL,
  `foto` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `password`, `is_active`, `alamat`, `no_telepon`, `foto`) VALUES
(4, 'Zayn Malik Ahmad', 'zayn@gmail.com', '$2y$10$cm/JDkwJ9VzQ1Ckk7ctgz.Ke3//aAe4NqtoSbcot8aPlAgr1iBtOO', 1, 'Girlington road, bradford, west yorkshire, BD8 9PA, United Kingdom', '081230388445', 'user.png'),
(5, 'Zayn', 'zayn12@gmail.com', '$2y$10$kJS/Wi8Z.lXWKHuCMTXICOgq537/qekjNIkKMAOiU8XpJ4QSx.83a', 0, 'Girlington road, bradford, west yorkshire, BD8 9PA, United Kingdom', '081230388446', 'user.png'),
(9, 'Elisa Qothrun Nada', 'elisaqothrunnada88@gmail.com', '$2y$10$12Ml7uUuwZ8AOMvuOGIiE.DBL0Q4mTHsBqQxs53vgh8uk60v241tC', 1, 'wonosari, sumber kalong', '081230388446', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan_token`
--

CREATE TABLE `pelanggan_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan_token`
--

INSERT INTO `pelanggan_token` (`id`, `email`, `token`, `date_created`) VALUES
(2, 'elisaqothrun88@gmail.com', '+TdQ5duHxBl4qO/IwxAqa/J3jsT9Cu6M6IwiwRwsHrI=', 1606060745),
(3, 'elisaqothrun88@gmail.com', 'Imud4t/ob9Dg5Qqx4z1ikZsPWvwf/mDjWGS9xXIXrd4=', 1606060839),
(4, 'elisaqothrunnada88@gmail.com', 'LHd/KJFVRyak7pIU2cSpnYJypLCq0P+gOT/1a2KzRQs=', 1606141521),
(5, 'elisaqothrunnada88@gmail.com', 'jlQkWcQxosSYf9ZkJGKS95pNf+UR5Jp+aWL+5kQeauc=', 1606141529),
(6, 'elisaqothrunnada88@gmail.com', '+nYHmw49f3xqyxDh/+9CaHn9fxx5s6iux90idueBdlg=', 1606143043),
(7, 'elisaqothrunnada88@gmail.com', '0GcTq3O2kPzmrVMjF+wt85h7Ne9jVfTRP98X9EtwATk=', 1606143547);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `keterangan` mediumtext NOT NULL,
  `gambar` tinytext NOT NULL,
  `stok` int(11) NOT NULL,
  `berat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `id_kategori`, `harga`, `keterangan`, `gambar`, `stok`, `berat`) VALUES
(1, 'Baju Anak Lucu', 7, 150000, 'cantik, bahan adem', 'bajuanak.jpg', 10, 300),
(4, 'Setelan baju tidur wanita', 3, 155000, 'bahan kaos', 'bajutidur.jpg', 0, 500),
(6, 'Jaket children boy', 7, 200000, 'bahan katun permium, adem, menyerap keringat', 'jaket.jpg', 9, 500);

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(10) DEFAULT NULL,
  `no_rek` varchar(24) DEFAULT NULL,
  `atas_nama` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `no_rek`, `atas_nama`) VALUES
(1, 'BRI', '1323-4516-2314-3342', 'Bobo'),
(2, 'BNI', '2234-4553-5533-2233', 'Candra');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_konfigurasi` int(11) NOT NULL,
  `nama_web` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `facebook` varchar(25) NOT NULL,
  `instagram` varchar(25) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_konfigurasi`, `nama_web`, `email`, `telepon`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`) VALUES
(1, 'Toko Istana', 'tokoistana@gmail.com', '08134567899', 'Banyuwangi', 'TokoIstana', 'TokoIstana', 'Toko istana adalah e-commerce yang bergerak pada bidang fashion trend masa kini', 'logo.jpg', 'icon.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_detail_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `no_order` varchar(15) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `nama_pelanggan` varchar(30) DEFAULT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `provinsi` varchar(15) DEFAULT NULL,
  `kota` varchar(15) DEFAULT NULL,
  `alamat` text,
  `kode_pos` varchar(8) DEFAULT NULL,
  `expedisi` varchar(15) DEFAULT NULL,
  `paket` varchar(50) DEFAULT NULL,
  `estimasi` varchar(50) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `status_bayar` int(1) DEFAULT NULL,
  `bukti_bayar` text,
  `atas_nama` varchar(25) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `status_order` int(1) DEFAULT NULL,
  `no_resi` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_detail_transaksi`, `id_pelanggan`, `no_order`, `name`, `qty`, `tgl_transaksi`, `nama_pelanggan`, `no_telepon`, `provinsi`, `kota`, `alamat`, `kode_pos`, `expedisi`, `paket`, `estimasi`, `ongkir`, `berat`, `grand_total`, `total_bayar`, `status_bayar`, `bukti_bayar`, `atas_nama`, `no_rek`, `nama_bank`, `status_order`, `no_resi`) VALUES
(3, 0, 1, '20201113IS1QPBJ', NULL, 0, '2020-11-13', 'Elisa Qothrun Nada', '0991123333', 'Bangka Belitung', 'Bangka Selatan', 'wonosari, sumber kalong', '29012', 'jne', 'OKE', '4-7', 54000, 502, 455000, 509000, 1, 'buktibayar2.jpg', 'Candra', '2234-4553-5533-2233', 'BANK BRI', 1, NULL),
(4, 0, 1, '20201113HDSMKNH', NULL, 0, '2020-11-13', 'Elisa Qothrun Nada', '0991123333', 'Jawa Timur', 'Banyuwangi', 'wonosari, sumber kalong', '12345', 'jne', 'CTC', '1-2', 6000, 500, 155000, 161000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(5, 0, 1, '20201113VBBFZ67', NULL, 0, '2020-11-13', 'Elisa Qothrun Nada', '0991123333', 'Kepulauan Riau', 'Batam', 'wonosari, sumber kalong', '1233', 'jne', 'OKE', '6-8', 38000, 500, 155000, 193000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(6, 0, 1, '20201113RJQOU7P', NULL, 0, '2020-11-13', 'Elisa Qothrun Nada', '0991123333', 'Bali', 'Bangli', 'bali', '11122', 'jne', 'OKE', '5-7', 16000, 500, 150000, 166000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(7, 0, 1, '20201113RKJF0OM', NULL, 0, '2020-11-13', 'elisa', '0991123333', 'Bangka Belitung', 'Bangka Barat', 'jember', '11', 'pos', 'Paket Kilat Khusus', '6-8 HARI', 48500, 1000, 310000, 358500, 1, NULL, NULL, NULL, NULL, 3, 'JP0923455'),
(8, 0, 1, '20201114VFIVLSI', NULL, 0, '2020-11-14', 'Elisa Qothrun Nada', '0991123333', 'Bangka Belitung', 'Bangka Barat', 'wonosari, sumber kalong', '68282', 'pos', 'Paket Kilat Khusus', '6-8 HARI', 48500, 500, 155000, 203500, 1, 'buktibayar1.jpg', 'Candra', '2234-4553-5533-2233', 'BANK BRI', 3, 'JP0922881'),
(9, 0, 1, '20201115SDEHNCA', NULL, 1, '2020-11-15', 'Elisa Qothrun Nada', '081230388446', 'Bangka Belitung', 'Bangka Barat', 'wonosari, sumber kalong, bondowoso rt:002 rw:003', '123444', 'jne', 'OKE', '4-7', 54000, 500, 155000, 209000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(10, 0, 1, '20201115M7SBI2U', NULL, 1, '2020-11-15', 'Elisa Qothrun Nada', '081230388446', 'Bali', 'Badung', 'wonosari, sumber kalong, bondowoso rt:002 rw:003', '29012', 'jne', 'OKE', '5-7', 16000, 500, 150000, 166000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(11, 0, 1, '20201116IHKGBTP', NULL, 1, '2020-11-16', 'Elisa Qothrun Nada', '081230388446', 'Bali', 'Bangli', 'wonosari, sumber kalong, bondowoso rt:002 rw:003', '29012', 'jne', 'OKE', '5-7', 16000, 500, 155000, 171000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(12, 0, 1, '20201117FDQGCP0', NULL, 1, '2020-11-17', 'Elisa Qothrun Nada', '081230388446', 'Bali', 'Bangli', 'wonosari, sumber kalong, bondowoso rt:002 rw:003', '29012', 'jne', 'OKE', '5-7', 16000, 500, 155000, 171000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(13, 0, 1, '20201117LJI4N70', NULL, 1, '2020-11-17', 'Elisa Qothrun Nada', '081230388446', 'Bangka Belitung', 'Bangka Tengah', 'wonosari, sumber kalong, bondowoso rt:002 rw:003', '29012', 'jne', 'OKE', '4-7', 54000, 1, 150000, 204000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(14, 0, 1, '20201117JISNRGF', NULL, 1, '2020-11-17', 'Elisa Qothrun Nada', '081230388446', 'Banten', 'Cilegon', 'wonosari, sumber kalong, bondowoso rt:002 rw:003', '12345', 'jne', 'OKE', '6-10', 20000, 1, 150000, 170000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(15, 0, 1, '20201117BLC5PX1', NULL, 1, '2020-11-17', 'Elisa Qothrun Nada', '081230388446', 'Bali', 'Bangli', 'wonosari, sumber kalong, bondowoso rt:002 rw:003', '29012', 'jne', 'OKE', '5-7', 16000, 500, 155000, 171000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(16, 0, 1, '20201117BLC5PX1', NULL, 1, '2020-11-17', 'Elisa Qothrun Nada', '081230388446', 'Bali', 'Bangli', 'wonosari, sumber kalong, bondowoso rt:002 rw:003', '29012', 'jne', 'OKE', '5-7', 16000, 500, 155000, 171000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(17, 0, 1, '20201117TBTEM6H', NULL, 1, '2020-11-17', 'Elisa Qothrun Nada', '081230388446', 'Bali', 'Bangli', 'wonosari, sumber kalong, bondowoso rt:002 rw:003', '29012', 'pos', 'Paket Kilat Khusus', '3-4 HARI', 25000, 500, 155000, 180000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(18, 0, 1, '20201117J61JZBC', NULL, 1, '2020-11-17', 'Elisa Qothrun Nada', '081230388446', 'Bali', 'Badung', 'wonosari, sumber kalong, bondowoso rt:002 rw:003', '29012', 'jne', 'OKE', '5-7', 16000, 500, 155000, 171000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(19, 0, 4, '20201121ZD6FEVY', NULL, 1, '2020-11-21', 'Zayn', '081230388445', 'Banten', 'Lebak', 'Girlington road, bradford, west yorkshire, BD8 9PA, United Kingdom', '29012', 'jne', 'OKE', '4-6', 24000, 500, 200000, 224000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(20, 0, 9, '20201123X6SI1DZ', NULL, 1, '2020-11-23', 'Elisa Qothrun Nada', '081230388446', 'Nusa Tenggara T', 'Alor', 'wonosari, sumber kalong', '29012', 'jne', 'OKE', '6-10', 71000, 500, 150000, 221000, 1, 'bajua4.jpg', 'Candra', '2234-4553-5533-2233', 'BANK BRI', 3, 'JP0922881');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `tanggal_update` date NOT NULL,
  `akses_level` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `tanggal_update`, `akses_level`) VALUES
(5, 'Dewi Candra Agustin', 'dewi@gmail.com', 'dewi', 'fde0b737496c53bb85d07b31a02985a3', '2020-11-24', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pelanggan_token`
--
ALTER TABLE `pelanggan_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_detail_transaksi` (`id_detail_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pelanggan_token`
--
ALTER TABLE `pelanggan_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

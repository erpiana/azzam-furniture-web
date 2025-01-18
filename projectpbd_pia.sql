-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2024 at 08:59 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectpbd_pia`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bahan` int(12) NOT NULL,
  `nama_bahan` varchar(50) NOT NULL,
  `satuan_ukur` varchar(50) NOT NULL,
  `harga_unit` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bahan`, `nama_bahan`, `satuan_ukur`, `harga_unit`) VALUES
(1, 'Kayu Jati', 'Meter Kubik', '2000000.00'),
(2, 'Kaca', 'Keping', '500000.00'),
(3, 'Besi', 'Kilogram', '80000.00'),
(4, 'Rotan', 'Meter', '100000.00'),
(5, 'Marmer', 'Meter Persegi', '1500000.00'),
(6, 'Busa', 'Kilogram', '120000.00'),
(7, 'Laminasi', 'Lembar', '200000.00'),
(8, 'Plywood', 'Lembar', '250000.00'),
(9, 'Sponge', 'Kilogram', '30000.00'),
(10, 'Plastik', 'Lembar', '60000.00'),
(12, 'Paku', 'Kiloan', '20000.00');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_produk`
--

CREATE TABLE `bahan_produk` (
  `id_bahan_produk` int(12) NOT NULL,
  `jumlah_bahan` int(5) NOT NULL,
  `harga_bahan` decimal(15,2) NOT NULL,
  `id_produk` int(12) DEFAULT NULL,
  `id_bahan` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bahan_produk`
--

INSERT INTO `bahan_produk` (`id_bahan_produk`, `jumlah_bahan`, `harga_bahan`, `id_produk`, `id_bahan`) VALUES
(1, 5, '1000000.00', 1, 1),
(2, 3, '600000.00', 2, 2),
(3, 10, '1200000.00', 3, 3),
(4, 8, '800000.00', 4, 4),
(5, 12, '1800000.00', 5, 5),
(6, 6, '1500000.00', 6, 6),
(7, 15, '2500000.00', 7, 7),
(8, 10, '700000.00', 8, 8),
(9, 7, '2000000.00', 9, 9),
(10, 20, '1000000.00', 10, 10),
(14, 4, '50000.00', 8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(12) NOT NULL,
  `jumlah_gaji` decimal(15,2) NOT NULL,
  `bonus` decimal(15,2) DEFAULT NULL,
  `id_sales` int(12) DEFAULT NULL,
  `id_kategori_gaji` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id_gaji`, `jumlah_gaji`, `bonus`, `id_sales`, `id_kategori_gaji`) VALUES
(1, '2000000.00', '100000.00', 1, 1),
(2, '2500000.00', '150000.00', 2, 2),
(3, '2000000.00', '120000.00', 3, 1),
(4, '2500000.00', '170000.00', 4, 2),
(5, '2000000.00', '130000.00', 5, 1),
(6, '2500000.00', '160000.00', 6, 2),
(7, '2000000.00', '110000.00', 7, 1),
(8, '2500000.00', '180000.00', 8, 2),
(9, '2000000.00', '125000.00', 9, 1),
(10, '2500000.00', '155000.00', 10, 2),
(14, '2000000.00', '50000.00', 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(12) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Karyawan'),
(2, 'Pengawas');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(12) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `no_hp_karyawan` varchar(15) NOT NULL,
  `alamat_karyawan` varchar(100) NOT NULL,
  `id_jabatan` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `no_hp_karyawan`, `alamat_karyawan`, `id_jabatan`) VALUES
(1, 'Ali Junaidi', '081234567890', 'Jl. Raya No.1, Padang', 1),
(2, 'Siti Amalia', '081234567891', 'Jl. Raya No.2, Bukittinggi', 2),
(3, 'Hadi Putra', '081234567892', 'Jl. Raya No.3, Solok', 1),
(4, 'Lina Fitriani', '081234567893', 'Jl. Raya No.4, Payakumbuh', 2),
(5, 'Rudi Maulana', '081234567894', 'Jl. Raya No.5, Sijunjung', 1),
(6, 'Dewi Nuraini', '081234567895', 'Jl. Raya No.6, Pariaman', 2),
(7, 'Fajar Rizki', '081234567896', 'Jl. Raya No.7, Padang Panjang', 1),
(8, 'Budi Santoso', '081234567897', 'Jl. Raya No.8, Pesisir Selatan', 2),
(9, 'Maya Rachmawati', '081234567898', 'Jl. Raya No.9, Agam', 1),
(10, 'Hana Kurnia', '081234567899', 'Jl. Raya No.10, Tanah Datar', 2),
(11, 'Zaza', '085868093361', 'Jln Cendrawasih Elang', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_workshop`
--

CREATE TABLE `karyawan_workshop` (
  `id_karyawan_workshop` int(12) NOT NULL,
  `tanggal_bergabung` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `id_workshop` int(12) DEFAULT NULL,
  `id_karyawan` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan_workshop`
--

INSERT INTO `karyawan_workshop` (`id_karyawan_workshop`, `tanggal_bergabung`, `status`, `id_workshop`, `id_karyawan`) VALUES
(1, '2024-01-10', 'Tetap', 1, 1),
(2, '2024-02-01', 'Tetap', 2, 2),
(3, '2024-03-01', 'Tetap', 3, 3),
(4, '2024-04-01', 'Tetap', 4, 4),
(5, '2024-05-01', 'Tetap', 5, 5),
(6, '2024-06-01', 'Kontrak', 6, 6),
(7, '2024-07-01', 'Tetap', 7, 7),
(8, '2024-08-01', 'Kontrak', 8, 8),
(9, '2024-09-01', 'Tetap', 9, 9),
(10, '2024-10-01', 'Tetap', 10, 10),
(11, '2024-12-02', 'Tetap', 11, 11);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_gaji`
--

CREATE TABLE `kategori_gaji` (
  `id_kategori_gaji` int(12) NOT NULL,
  `kategori_sales` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_gaji`
--

INSERT INTO `kategori_gaji` (`id_kategori_gaji`, `kategori_sales`) VALUES
(1, 'Sales Junior'),
(2, 'Sales Senior');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kategori_produk` int(12) NOT NULL,
  `nama_kategori_produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori_produk`, `nama_kategori_produk`) VALUES
(1, 'Kursi'),
(2, 'Meja'),
(3, 'Lemari'),
(4, 'Rak TV'),
(5, 'Tempat Tidur'),
(6, 'Meja Makan'),
(7, 'Sofa'),
(8, 'Lemari Pakaian'),
(9, 'Kursi Tamu'),
(10, 'Meja Kerja'),
(11, 'Rak Sepatu');

-- --------------------------------------------------------

--
-- Table structure for table `keahlian`
--

CREATE TABLE `keahlian` (
  `id_keahlian` int(12) NOT NULL,
  `nama_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keahlian`
--

INSERT INTO `keahlian` (`id_keahlian`, `nama_keahlian`) VALUES
(1, 'Desain Produk'),
(2, 'Pemasaran Digital'),
(3, 'Manajemen Produksi'),
(4, 'Pengendalian Kualitas'),
(5, 'Negosiasi Vendor'),
(6, 'Riset Pasar'),
(7, 'Pengolahan Bahan Baku'),
(8, 'Administrasi Keuangan'),
(9, 'Pengelolaan Gudang'),
(10, 'Pelayanan Pelanggan'),
(11, 'Pengembangan Pasar');

-- --------------------------------------------------------

--
-- Table structure for table `keahlian_karyawan`
--

CREATE TABLE `keahlian_karyawan` (
  `id_keahlian_karyawan` int(12) NOT NULL,
  `id_karyawan` int(12) DEFAULT NULL,
  `id_keahlian` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keahlian_karyawan`
--

INSERT INTO `keahlian_karyawan` (`id_keahlian_karyawan`, `id_karyawan`, `id_keahlian`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 2, 3),
(5, 3, 4),
(6, 3, 5),
(7, 4, 6),
(8, 5, 7),
(9, 6, 8),
(10, 7, 9);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(12) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `no_hp_pelanggan` varchar(15) NOT NULL,
  `alamat_pelanggan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `no_hp_pelanggan`, `alamat_pelanggan`) VALUES
(1, 'Zulfiqar Furniture', '082312345678', 'Jl. Raya No.8, Padang'),
(2, 'Aisyah Kurniawati', '081234567891', 'Jl. Sejahtera No.3, Bukittinggi'),
(3, 'Faisal Abadi', '081234567892', 'Jl. Pahlawan No.4, Solok'),
(4, 'Maya Sari', '081234567893', 'Jl. Raya No.5, Payakumbuh'),
(5, 'Lina Amalia', '081234567894', 'Jl. Merdeka No.2, Sijunjung'),
(6, 'Dedi Susanto', '081234567895', 'Jl. Harapan No.6, Pariaman'),
(7, 'Hana Fitri', '081234567896', 'Jl. Taman No.7, Bukittinggi'),
(8, 'Khalil Bintang', '081234567897', 'Jl. Merdeka No.1, Solok'),
(9, 'Putri Pratama', '081234567898', 'Jl. Industri No.2, Padang Panjang'),
(10, 'Anwar Hadi', '081234567899', 'Jl. Kebon No.4, Pesisir Selatan'),
(11, 'Atisa Putri', '084568093361', 'Jl. Cendrawasih no 16');

-- --------------------------------------------------------

--
-- Table structure for table `pemasok`
--

CREATE TABLE `pemasok` (
  `id_pemasok` int(12) NOT NULL,
  `tgl_pemasokan` date NOT NULL,
  `harga_bahan` decimal(15,2) NOT NULL,
  `ketersediaan` int(12) NOT NULL,
  `id_bahan` int(12) DEFAULT NULL,
  `id_vendor` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemasok`
--

INSERT INTO `pemasok` (`id_pemasok`, `tgl_pemasokan`, `harga_bahan`, `ketersediaan`, `id_bahan`, `id_vendor`) VALUES
(1, '2024-01-15', '500000.00', 100, 1, 1),
(2, '2024-02-10', '300000.00', 200, 2, 2),
(3, '2024-03-05', '700000.00', 50, 3, 3),
(4, '2024-04-20', '800000.00', 300, 4, 4),
(5, '2024-05-25', '1200000.00', 150, 5, 5),
(6, '2024-06-10', '600000.00', 500, 6, 6),
(7, '2024-07-15', '1500000.00', 250, 7, 7),
(8, '2024-08-05', '900000.00', 400, 8, 8),
(9, '2024-09-10', '700000.00', 100, 9, 9),
(10, '2024-10-25', '1000000.00', 300, 10, 10),
(11, '2024-12-04', '500000.00', 50, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(12) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `id_pelanggan` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `tanggal_pemesanan`, `id_pelanggan`) VALUES
(1, '2024-01-10', 1),
(2, '2024-02-05', 2),
(3, '2024-03-15', 3),
(4, '2024-04-01', 4),
(5, '2024-05-20', 5),
(6, '2024-06-01', 6),
(7, '2024-07-05', 7),
(8, '2024-08-10', 8),
(9, '2024-09-15', 9),
(10, '2024-10-01', 10),
(11, '2024-12-05', 11),
(13, '2024-12-14', 11),
(14, '2024-12-11', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_produk`
--

CREATE TABLE `pesanan_produk` (
  `id_pesanan_produk` int(12) NOT NULL,
  `jumlah_pesanan_produk` int(5) NOT NULL,
  `harga_total` decimal(15,2) NOT NULL,
  `id_produk` int(12) DEFAULT NULL,
  `id_pesanan` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan_produk`
--

INSERT INTO `pesanan_produk` (`id_pesanan_produk`, `jumlah_pesanan_produk`, `harga_total`, `id_produk`, `id_pesanan`) VALUES
(1, 2, '2400000.00', 1, 1),
(2, 3, '7500000.00', 2, 2),
(3, 1, '1800000.00', 3, 3),
(4, 4, '8800000.00', 4, 4),
(5, 2, '7000000.00', 5, 5),
(6, 5, '25000000.00', 6, 6),
(7, 1, '2200000.00', 7, 7),
(8, 3, '4800000.00', 8, 8),
(9, 1, '1600000.00', 9, 9),
(10, 2, '3600000.00', 10, 10),
(12, 20, '500000.00', 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(12) NOT NULL,
  `deskripsi_produk` varchar(100) NOT NULL,
  `tanggal_produk` date NOT NULL,
  `harga` decimal(15,2) NOT NULL,
  `id_kategori_produk` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `deskripsi_produk`, `tanggal_produk`, `harga`, `id_kategori_produk`) VALUES
(1, 'Kursi kayu jati minimalis, nyaman digunakan di ruang tamu', '2024-01-10', '1200000.00', 1),
(2, 'Meja makan kayu solid, cocok untuk 6 orang', '2024-02-01', '2500000.00', 2),
(3, 'Lemari pakaian 3 pintu dengan finishing modern', '2024-02-15', '1800000.00', 3),
(4, 'Rak TV kayu klasik, dengan desain elegan', '2024-03-01', '2200000.00', 4),
(5, 'Tempat tidur king size dengan bahan terbaik', '2024-03-05', '3500000.00', 5),
(6, 'Meja makan marmer premium dengan kursi set', '2024-04-01', '4500000.00', 6),
(7, 'Sofa kulit minimalis, sangat nyaman untuk ruang tamu', '2024-04-10', '5000000.00', 7),
(8, 'Lemari pakaian 5 pintu dengan sistem geser', '2024-05-01', '2700000.00', 8),
(9, 'Kursi tamu dengan desain elegan, cocok untuk ruang tamu', '2024-05-15', '1600000.00', 9),
(10, 'Meja kerja kayu solid, cocok untuk kantor rumahan', '2024-06-01', '1800000.00', 10),
(12, 'Terbuat dari bahan berkualitas tinggi', '2024-12-11', '1000000.00', 11);

-- --------------------------------------------------------

--
-- Table structure for table `produk_workshop`
--

CREATE TABLE `produk_workshop` (
  `id_produk_workshop` int(12) NOT NULL,
  `tgl_pengolahan` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `id_produk` int(12) DEFAULT NULL,
  `id_workshop` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk_workshop`
--

INSERT INTO `produk_workshop` (`id_produk_workshop`, `tgl_pengolahan`, `status`, `id_produk`, `id_workshop`) VALUES
(1, '2024-01-20', 'Proses', 1, 1),
(2, '2024-02-10', 'Proses', 2, 2),
(3, '2024-03-15', 'Selesai', 3, 3),
(4, '2024-04-05', 'Proses', 4, 4),
(5, '2024-05-10', 'Selesai', 5, 5),
(6, '2024-06-15', 'Proses', 6, 6),
(7, '2024-07-01', 'Selesai', 7, 7),
(8, '2024-08-01', 'Proses', 8, 8),
(9, '2024-09-01', 'Proses', 9, 9),
(10, '2024-10-10', 'Selesai', 10, 10),
(12, '2024-12-10', 'selesai', 12, 11);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id_sales` int(12) NOT NULL,
  `nama_sales` varchar(100) NOT NULL,
  `no_hp_sales` varchar(15) NOT NULL,
  `fax_sales` varchar(15) DEFAULT NULL,
  `id_wilayah` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id_sales`, `nama_sales`, `no_hp_sales`, `fax_sales`, `id_wilayah`) VALUES
(1, 'Rudi Sales', '081234567890', '021-3456789', 1),
(2, 'Fahmi Sales', '082345678901', '021-3456790', 2),
(3, 'Sinta Sales', '083456789012', '021-3456791', 3),
(4, 'Nina Sales', '084567890123', '021-3456792', 4),
(5, 'Dedi Sales', '085678901234', '021-3456793', 5),
(6, 'Tina Sales', '086789012345', '021-3456794', 6),
(7, 'Rina Sales', '087890123456', '021-3456795', 7),
(8, 'Lina Sales', '088901234567', '021-3456796', 8),
(9, 'Maya Sales', '089012345678', '021-3456797', 9),
(10, 'Budi Sales', '081345678901', '021-3456798', 10),
(11, 'Cherly Sales', '084568093361', '021-0978654', 11);

-- --------------------------------------------------------

--
-- Table structure for table `showroom`
--

CREATE TABLE `showroom` (
  `id_showroom` int(12) NOT NULL,
  `lokasi_showroom` varchar(100) NOT NULL,
  `id_wilayah` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `showroom`
--

INSERT INTO `showroom` (`id_showroom`, `lokasi_showroom`, `id_wilayah`) VALUES
(1, 'Showroom Padang', 1),
(2, 'Showroom Bukittinggi', 2),
(3, 'Showroom Solok', 3),
(4, 'Showroom Payakumbuh', 4),
(5, 'Showroom Sijunjung', 5),
(6, 'Showroom Pariaman', 6),
(7, 'Showroom Padang Panjang', 7),
(8, 'Showroom Pesisir Selatan', 8),
(9, 'Showroom Agam', 9),
(10, 'Showroom Tanah Datar', 10),
(11, 'Showroom Sawahlunto', 11);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(12) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `status_transaksi` varchar(50) NOT NULL,
  `id_showroom` int(12) DEFAULT NULL,
  `id_pelanggan` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_transaksi`, `status_transaksi`, `id_showroom`, `id_pelanggan`) VALUES
(1, '2024-01-25', 'Berhasil', 1, 1),
(2, '2024-02-20', 'Berhasil', 2, 2),
(3, '2024-03-10', 'Gagal', 3, 3),
(4, '2024-04-30', 'Berhasil', 4, 4),
(5, '2024-05-15', 'Berhasil', 5, 5),
(6, '2024-06-10', 'Gagal', 6, 6),
(7, '2024-07-01', 'Berhasil', 7, 7),
(8, '2024-08-01', 'Berhasil', 8, 8),
(9, '2024-09-05', 'Gagal', 9, 9),
(10, '2024-10-20', 'Berhasil', 10, 10),
(11, '2024-12-10', 'berhasil', 11, 11);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id_vendor` int(12) NOT NULL,
  `nama_vendor` varchar(50) NOT NULL,
  `no_telp_vendor` varchar(15) NOT NULL,
  `alamat_vendor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id_vendor`, `nama_vendor`, `no_telp_vendor`, `alamat_vendor`) VALUES
(1, 'PT. Jati Alam', '081234567890', 'Jl. Industri No.1, Padang'),
(2, 'CV. Kaca Kurnia', '082345678901', 'Jl. Raya No.2, Bukittinggi'),
(3, 'PT. Metalindo', '083456789012', 'Jl. Besi No.3, Payakumbuh'),
(4, 'CV. Rotan Abadi', '084567890123', 'Jl. Rotan No.4, Solok'),
(5, 'PT. Marmer Sejahtera', '085678901234', 'Jl. Marmer No.5, Sijunjung'),
(6, 'CV. Busa Jaya', '086789012345', 'Jl. Busa No.6, Pariaman'),
(7, 'PT. Laminasi Abadi', '087890123456', 'Jl. Laminasi No.7, Padang Panjang'),
(8, 'CV. Plywood Indo', '088901234567', 'Jl. Plywood No.8, Agam'),
(9, 'PT. Sponge Mitra', '089012345678', 'Jl. Sponge No.9, Tanah Datar'),
(10, 'CV. Plastik Mulia', '081345678901', 'Jl. Plastik No.10, Pesisir Selatan'),
(11, 'CV. Permata', '086754356754', 'Jl. Solok no 89 Blok E');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah_penjualan`
--

CREATE TABLE `wilayah_penjualan` (
  `id_wilayah` int(12) NOT NULL,
  `nama_wilayah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wilayah_penjualan`
--

INSERT INTO `wilayah_penjualan` (`id_wilayah`, `nama_wilayah`) VALUES
(1, 'Padang'),
(2, 'Bukittinggi'),
(3, 'Solok'),
(4, 'Payakumbuh'),
(5, 'Sijunjung'),
(6, 'Pariaman'),
(7, 'Padang Panjang'),
(8, 'Pesisir Selatan'),
(9, 'Agam'),
(10, 'Tanah Datar'),
(11, 'Sawahlunto');

-- --------------------------------------------------------

--
-- Table structure for table `workshop`
--

CREATE TABLE `workshop` (
  `id_workshop` int(12) NOT NULL,
  `lokasi_workshop` varchar(100) NOT NULL,
  `no_hp_workshop` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workshop`
--

INSERT INTO `workshop` (`id_workshop`, `lokasi_workshop`, `no_hp_workshop`) VALUES
(1, 'Workshop Padang', '081234567890'),
(2, 'Workshop Bukittinggi', '082345678901'),
(3, 'Workshop Solok', '083456789012'),
(4, 'Workshop Payakumbuh', '084567890123'),
(5, 'Workshop Sijunjung', '085678901234'),
(6, 'Workshop Pariaman', '086789012345'),
(7, 'Workshop Padang Panjang', '087890123456'),
(8, 'Workshop Pesisir Selatan', '088901234567'),
(9, 'Workshop Agam', '089012345678'),
(10, 'Workshop Tanah Datar', '081345678901'),
(11, 'Workshop Solok', '081543588767');

-- --------------------------------------------------------

--
-- Stand-in structure for view `z_detail_pesanan`
-- (See below for the actual view)
--
CREATE TABLE `z_detail_pesanan` (
`id_pesanan` int(12)
,`tanggal_pemesanan` date
,`nama_pelanggan` varchar(50)
,`nama_kategori_produk` varchar(50)
,`deskripsi_produk` varchar(100)
,`jumlah_pesanan_produk` int(5)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `z_detail_sales`
-- (See below for the actual view)
--
CREATE TABLE `z_detail_sales` (
`id_sales` int(12)
,`nama_sales` varchar(100)
,`fax_sales` varchar(15)
,`jumlah_gaji` decimal(15,2)
,`bonus` decimal(15,2)
,`kategori_sales` varchar(100)
,`lokasi_showroom` varchar(100)
,`nama_wilayah` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `z_detail_pesanan`
--
DROP TABLE IF EXISTS `z_detail_pesanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`erpiana24`@`localhost` SQL SECURITY DEFINER VIEW `z_detail_pesanan`  AS SELECT `pesanan`.`id_pesanan` AS `id_pesanan`, `pesanan`.`tanggal_pemesanan` AS `tanggal_pemesanan`, `pelanggan`.`nama_pelanggan` AS `nama_pelanggan`, `kategori_produk`.`nama_kategori_produk` AS `nama_kategori_produk`, `produk`.`deskripsi_produk` AS `deskripsi_produk`, `pesanan_produk`.`jumlah_pesanan_produk` AS `jumlah_pesanan_produk` FROM ((((`pesanan` join `pelanggan` on(`pesanan`.`id_pelanggan` = `pelanggan`.`id_pelanggan`)) join `pesanan_produk` on(`pesanan_produk`.`id_pesanan` = `pesanan`.`id_pesanan`)) join `produk` on(`pesanan_produk`.`id_produk` = `produk`.`id_produk`)) join `kategori_produk` on(`kategori_produk`.`id_kategori_produk` = `produk`.`id_kategori_produk`))  ;

-- --------------------------------------------------------

--
-- Structure for view `z_detail_sales`
--
DROP TABLE IF EXISTS `z_detail_sales`;

CREATE ALGORITHM=UNDEFINED DEFINER=`erpiana24`@`localhost` SQL SECURITY DEFINER VIEW `z_detail_sales`  AS SELECT `sales`.`id_sales` AS `id_sales`, `sales`.`nama_sales` AS `nama_sales`, `sales`.`fax_sales` AS `fax_sales`, `gaji`.`jumlah_gaji` AS `jumlah_gaji`, `gaji`.`bonus` AS `bonus`, `kategori_gaji`.`kategori_sales` AS `kategori_sales`, `showroom`.`lokasi_showroom` AS `lokasi_showroom`, `wilayah_penjualan`.`nama_wilayah` AS `nama_wilayah` FROM ((((`sales` join `gaji` on(`sales`.`id_sales` = `gaji`.`id_sales`)) join `kategori_gaji` on(`kategori_gaji`.`id_kategori_gaji` = `gaji`.`id_kategori_gaji`)) join `wilayah_penjualan` on(`wilayah_penjualan`.`id_wilayah` = `sales`.`id_wilayah`)) join `showroom` on(`showroom`.`id_wilayah` = `wilayah_penjualan`.`id_wilayah`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `bahan_produk`
--
ALTER TABLE `bahan_produk`
  ADD PRIMARY KEY (`id_bahan_produk`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_bahan` (`id_bahan`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `id_sales` (`id_sales`),
  ADD KEY `id_kategori_gaji` (`id_kategori_gaji`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `karyawan_workshop`
--
ALTER TABLE `karyawan_workshop`
  ADD PRIMARY KEY (`id_karyawan_workshop`),
  ADD KEY `id_workshop` (`id_workshop`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `kategori_gaji`
--
ALTER TABLE `kategori_gaji`
  ADD PRIMARY KEY (`id_kategori_gaji`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kategori_produk`);

--
-- Indexes for table `keahlian`
--
ALTER TABLE `keahlian`
  ADD PRIMARY KEY (`id_keahlian`);

--
-- Indexes for table `keahlian_karyawan`
--
ALTER TABLE `keahlian_karyawan`
  ADD PRIMARY KEY (`id_keahlian_karyawan`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_keahlian` (`id_keahlian`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`id_pemasok`),
  ADD KEY `id_bahan` (`id_bahan`),
  ADD KEY `id_vendor` (`id_vendor`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `pesanan_produk`
--
ALTER TABLE `pesanan_produk`
  ADD PRIMARY KEY (`id_pesanan_produk`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori_produk` (`id_kategori_produk`);

--
-- Indexes for table `produk_workshop`
--
ALTER TABLE `produk_workshop`
  ADD PRIMARY KEY (`id_produk_workshop`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_workshop` (`id_workshop`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id_sales`),
  ADD KEY `id_wilayah` (`id_wilayah`);

--
-- Indexes for table `showroom`
--
ALTER TABLE `showroom`
  ADD PRIMARY KEY (`id_showroom`),
  ADD KEY `id_wilayah` (`id_wilayah`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_showroom` (`id_showroom`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id_vendor`);

--
-- Indexes for table `wilayah_penjualan`
--
ALTER TABLE `wilayah_penjualan`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- Indexes for table `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`id_workshop`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_bahan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bahan_produk`
--
ALTER TABLE `bahan_produk`
  MODIFY `id_bahan_produk` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `karyawan_workshop`
--
ALTER TABLE `karyawan_workshop`
  MODIFY `id_karyawan_workshop` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kategori_gaji`
--
ALTER TABLE `kategori_gaji`
  MODIFY `id_kategori_gaji` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori_produk` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `keahlian`
--
ALTER TABLE `keahlian`
  MODIFY `id_keahlian` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `keahlian_karyawan`
--
ALTER TABLE `keahlian_karyawan`
  MODIFY `id_keahlian_karyawan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `id_pemasok` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pesanan_produk`
--
ALTER TABLE `pesanan_produk`
  MODIFY `id_pesanan_produk` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `produk_workshop`
--
ALTER TABLE `produk_workshop`
  MODIFY `id_produk_workshop` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id_sales` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `showroom`
--
ALTER TABLE `showroom`
  MODIFY `id_showroom` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id_vendor` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wilayah_penjualan`
--
ALTER TABLE `wilayah_penjualan`
  MODIFY `id_wilayah` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `workshop`
--
ALTER TABLE `workshop`
  MODIFY `id_workshop` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bahan_produk`
--
ALTER TABLE `bahan_produk`
  ADD CONSTRAINT `bahan_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bahan_produk_ibfk_2` FOREIGN KEY (`id_bahan`) REFERENCES `bahan_baku` (`id_bahan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gaji`
--
ALTER TABLE `gaji`
  ADD CONSTRAINT `gaji_ibfk_1` FOREIGN KEY (`id_sales`) REFERENCES `sales` (`id_sales`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gaji_ibfk_2` FOREIGN KEY (`id_kategori_gaji`) REFERENCES `kategori_gaji` (`id_kategori_gaji`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `karyawan_workshop`
--
ALTER TABLE `karyawan_workshop`
  ADD CONSTRAINT `karyawan_workshop_ibfk_1` FOREIGN KEY (`id_workshop`) REFERENCES `workshop` (`id_workshop`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `karyawan_workshop_ibfk_2` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keahlian_karyawan`
--
ALTER TABLE `keahlian_karyawan`
  ADD CONSTRAINT `keahlian_karyawan_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keahlian_karyawan_ibfk_2` FOREIGN KEY (`id_keahlian`) REFERENCES `keahlian` (`id_keahlian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemasok`
--
ALTER TABLE `pemasok`
  ADD CONSTRAINT `pemasok_ibfk_1` FOREIGN KEY (`id_bahan`) REFERENCES `bahan_baku` (`id_bahan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemasok_ibfk_2` FOREIGN KEY (`id_vendor`) REFERENCES `vendor` (`id_vendor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan_produk`
--
ALTER TABLE `pesanan_produk`
  ADD CONSTRAINT `pesanan_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_produk_ibfk_2` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori_produk`) REFERENCES `kategori_produk` (`id_kategori_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk_workshop`
--
ALTER TABLE `produk_workshop`
  ADD CONSTRAINT `produk_workshop_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produk_workshop_ibfk_2` FOREIGN KEY (`id_workshop`) REFERENCES `workshop` (`id_workshop`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah_penjualan` (`id_wilayah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `showroom`
--
ALTER TABLE `showroom`
  ADD CONSTRAINT `showroom_ibfk_1` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah_penjualan` (`id_wilayah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_showroom`) REFERENCES `showroom` (`id_showroom`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

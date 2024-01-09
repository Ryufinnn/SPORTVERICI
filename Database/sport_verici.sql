-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2017 at 07:32 PM
-- Server version: 5.0.67
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sport_verici`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `username` varchar(20) collate latin1_general_ci NOT NULL,
  `password` varchar(50) collate latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(50) collate latin1_general_ci NOT NULL,
  `level` varchar(15) collate latin1_general_ci NOT NULL default 'user',
  `blokir` enum('Y','N') collate latin1_general_ci NOT NULL default 'N',
  PRIMARY KEY  (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`username`, `password`, `nama_lengkap`, `level`, `blokir`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Ismal', 'admin', 'N'),
('pimpinan', '90973652b88fe07d05a4304f0a945de8', 'Diki', 'pimpinan', 'N'),
('gudang', '202446dd1d6028084426867365b0c7a1', 'Marco Reus', 'gudang', 'N'),
('supervisor', '09348c20a019be0318387c08df7a783d', 'chelsea', 'jual', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `kd_barang` varchar(20) NOT NULL,
  `nm_barang` varchar(20) NOT NULL,
  `satuan` varchar(12) NOT NULL,
  `harga_beli` int(8) NOT NULL,
  `harga_jual` int(8) NOT NULL,
  `stok` int(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_barang`, `nm_barang`, `satuan`, `harga_beli`, `harga_jual`, `stok`) VALUES
('SNR--010', 'Sepatu Nike Running', 'kardus', 300000, 500000, 9),
('BF-001', 'Bola Futsal', 'kardus', 80000, 150000, 21),
('J-001', 'Jersey Barcelona', 'kardus', 50000, 100000, 13),
('SNF-001', 'Sepatu Nike Futsal', 'kardus', 150000, 300000, 9),
('JM-001', 'Jesey Milan', 'Pcs', 50000, 100000, 9),
('JSP-005', 'Jesey Semen Padang', 'Pcs', 50000, 100000, 18),
('KS-006', 'Kaus Kaki Specs', 'Pcs', 30000, 70000, 23),
('CT-009', 'Celana Traning', 'Pcs', 60000, 100000, 34),
('RY-007', 'Reket Yonex', 'kardus', 80000, 150000, 13);

-- --------------------------------------------------------

--
-- Table structure for table `jual_tmp`
--

CREATE TABLE IF NOT EXISTS `jual_tmp` (
  `kd_barang` varchar(20) NOT NULL,
  `jml` int(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jual_tmp`
--


-- --------------------------------------------------------

--
-- Table structure for table `order_tmp`
--

CREATE TABLE IF NOT EXISTS `order_tmp` (
  `kd_barang` varchar(20) NOT NULL,
  `jml` int(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_tmp`
--


-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `no_order` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `kd_suplier` varchar(20) NOT NULL,
  `kd_barang` varchar(20) NOT NULL,
  `jml` int(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`no_order`, `tgl`, `kd_suplier`, `kd_barang`, `jml`) VALUES
('P-0006', '2016-05-16', 'S-0004  ', 'JERSEY', 20),
('P-0003', '2015-12-28', 'S-00000002  ', 'B-0002', 12),
('P-0004', '2015-12-29', 'S-00000002  ', 'B-0002', 12),
('P-0005', '2016-05-18', 'S-0004  ', 'JERSEY', 5),
('P-0007', '2016-05-31', 'S-0004  ', 'JERSEY', 1),
('P-0008', '2016-06-02', 'S-0004  ', 'JERSEY', 7),
('P-0009', '2016-12-01', 'S-0004  ', 'JERSEY', 10),
('P-0010', '2016-04-14', 'S-0004  ', 'BF-001', 7),
('P-0011', '2016-06-01', 'S-0004  ', 'CT-009', 5);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `no_faktur` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `jml` int(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`no_faktur`, `tgl`, `kd_barang`, `jml`) VALUES
('P-0021', '2016-01-09', 'B-0004', 1),
('P-0020', '2016-01-09', 'B-0004', 1),
('P-0018', '2016-01-09', 'B-0004', 1),
('P-0017', '2016-01-09', 'B-0004', 1),
('P-0015', '2016-01-09', 'B-0004', 1),
('P-0024', '2016-05-26', 'JERSEY', 3),
('P-0013', '2016-01-09', 'B-0004', 100),
('P-0012', '2016-01-09', 'B-0004', 100),
('P-0022', '2016-05-24', 'B-0004', 34),
('P-0023', '2016-05-28', 'B-0004', 32),
('P-0010', '2016-01-09', 'B-0004', 12),
('P-0005', '2016-01-09', 'B-0004', 5),
('P-0004', '2016-01-09', 'B-0004', 1),
('P-0024', '2016-05-26', 'SEPATU RUN', 1),
('P-0001', '2016-01-09', 'B-0004', 12),
('P-0025', '2016-05-28', 'JERSEY', 2),
('P-0026', '2016-05-28', 'JERSEY', 4),
('P-0027', '2016-05-30', 'SEPATU RUN', 2),
('P-0027', '2016-05-30', 'JERSEY', 1),
('P-0028', '2016-05-28', 'JERSEY', 3),
('P-0029', '2016-05-31', 'JERSEY', 2),
('P-0030', '2016-05-30', 'JERSEY', 5),
('P-0031', '2016-06-01', 'JERSEY', 3),
('P-0032', '2016-06-01', 'JERSEY', 5),
('P-0033', '2016-06-04', 'JERSEY', 2),
('P-0034', '2016-06-01', 'JERSEY', 5),
('P-0035', '2017-05-17', 'SNR--010', 1),
('P-0036', '2017-05-17', 'BF-001', 1),
('P-0037', '2017-05-17', 'J-001', 2),
('P-0038', '2017-05-17', 'SNF-001', 1),
('P-0039', '2017-05-17', 'JM-001', 1),
('P-0040', '2017-05-17', 'JSP-005', 2),
('P-0041', '2017-05-17', 'KS-006', 2),
('P-0042', '2017-05-17', 'CT-009', 1),
('P-0043', '2017-05-17', 'RY-007', 2);

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE IF NOT EXISTS `suplier` (
  `kd_suplier` varchar(20) NOT NULL,
  `nm_suplier` varchar(20) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `nohp` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suplier`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_eoq`
--

CREATE TABLE IF NOT EXISTS `tb_eoq` (
  `kd_barang` varchar(20) NOT NULL,
  `kb_tahun` int(8) NOT NULL,
  `biaya_simpan` int(8) NOT NULL,
  `biaya_pesan` int(8) NOT NULL,
  `jml_pesan` int(8) NOT NULL,
  `interfal` int(8) NOT NULL,
  `lama_pengiriman` int(8) NOT NULL,
  `stok_minimum` int(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_eoq`
--

INSERT INTO `tb_eoq` (`kd_barang`, `kb_tahun`, `biaya_simpan`, `biaya_pesan`, `jml_pesan`, `interfal`, `lama_pengiriman`, `stok_minimum`) VALUES
('JERSEY', 13, 5000, 5000, 5, 137, 4, 0),
('B-0001', 1000, 2000, 100, 10, 3, 2, 6),
('B-0003', 9000, 2000, 100, 30, 1, 2, 51),
('JM-001', 1, 1000, 1000, 1, 495, 2, 0);

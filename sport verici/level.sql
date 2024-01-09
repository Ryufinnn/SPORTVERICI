-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 03, 2010 at 03:05 AM
-- Server version: 5.0.67
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `level`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `username` varchar(30) collate latin1_general_ci NOT NULL,
  `password` varchar(50) collate latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) collate latin1_general_ci NOT NULL,
  `email` varchar(100) collate latin1_general_ci NOT NULL,
  `no_telp` varchar(20) collate latin1_general_ci NOT NULL,
  `level` varchar(20) collate latin1_general_ci NOT NULL default 'user',
  `blokir` enum('Y','N') collate latin1_general_ci NOT NULL default 'N',
  PRIMARY KEY  (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Syafri Arlis', 'arlies2301@upi-yptk.com', '081374557800', 'admin', 'N'),
('user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'aaa', '008970', 'user', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tdosen`
--

CREATE TABLE IF NOT EXISTS `tdosen` (
  `IDdosen` int(4) NOT NULL,
  `Nama_Dosen` varchar(25) NOT NULL,
  `Jekel` varchar(16) NOT NULL,
  `JenjangPendidikan` varchar(30) NOT NULL,
  `Kode_f` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tdosen`
--


-- --------------------------------------------------------

--
-- Table structure for table `tfakultas`
--

CREATE TABLE IF NOT EXISTS `tfakultas` (
  `Kode_f` int(2) NOT NULL,
  `Nama_fak` varchar(25) NOT NULL,
  `Status` enum('Y','N') NOT NULL,
  `No_SK` varchar(30) NOT NULL,
  PRIMARY KEY  (`Kode_f`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tfakultas`
--

INSERT INTO `tfakultas` (`Kode_f`, `Nama_fak`, `Status`, `No_SK`) VALUES
(26, 'Fakultas Ilmu Komputer', 'Y', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tjurusan`
--

CREATE TABLE IF NOT EXISTS `tjurusan` (
  `Kode_jur` int(3) NOT NULL,
  `Nama_jur` varchar(25) NOT NULL,
  `Kode_f` int(2) NOT NULL,
  `Status` varchar(30) NOT NULL,
  PRIMARY KEY  (`Kode_jur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tjurusan`
--

INSERT INTO `tjurusan` (`Kode_jur`, `Nama_jur`, `Kode_f`, `Status`) VALUES
(260, 'Manajemen Informatika', 26, 'Terakreditasi'),
(261, 'Sistem Informasi', 26, 'Terakreditasi'),
(262, 'Sistem Komputer', 26, 'Terakreditasi');

-- --------------------------------------------------------

--
-- Table structure for table `tkelas`
--

CREATE TABLE IF NOT EXISTS `tkelas` (
  `Id_Kelas` varchar(4) NOT NULL,
  `Nm_kelas` varchar(6) NOT NULL,
  `Kapasitas` int(3) NOT NULL,
  `Not_Active` enum('Y','N') NOT NULL,
  PRIMARY KEY  (`Id_Kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tkelas`
--

INSERT INTO `tkelas` (`Id_Kelas`, `Nm_kelas`, `Kapasitas`, `Not_Active`) VALUES
('001', 'SI-10', 60, 'N'),
('002', 'SI-9', 60, 'N'),
('003', 'SI-12', 60, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tmahasiswa`
--

CREATE TABLE IF NOT EXISTS `tmahasiswa` (
  `Nobp` varchar(14) NOT NULL,
  `Nama_mhs` varchar(25) NOT NULL,
  `Jekel` varchar(16) NOT NULL,
  `TmpatLahir` varchar(25) NOT NULL,
  `TglLahir` date NOT NULL,
  `Kelas` varchar(6) NOT NULL,
  `Kode_jur` varchar(8) NOT NULL,
  `NoTelp` varchar(16) NOT NULL,
  `Alamat` varchar(45) NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY  (`Nobp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmahasiswa`
--

INSERT INTO `tmahasiswa` (`Nobp`, `Nama_mhs`, `Jekel`, `TmpatLahir`, `TglLahir`, `Kelas`, `Kode_jur`, `NoTelp`, `Alamat`, `foto`) VALUES
('11101152610234', 'Syafriadi', 'Laki-Laki', 'Batam', '1993-05-29', 'SI-10', '261', '0878954432', 'Belimbing', ''),
('12101152600018', 'Mira Andika', 'Perempuan', 'Padang', '1986-06-15', 'SI-10', '260', '08135432525', 'Padang', ''),
('12101152610494', 'Afri Yusron', 'Laki-Laki', 'Padang', '1995-06-08', 'SI-10', '261', '08191341314', 'Lubuk Begalung', ''),
('12101152620379', 'Dede Suryadi', 'Laki-Laki', 'Padang', '1991-02-02', 'SI-9', '262', '081374656590', 'Lubuk Begalung', ''),
('12101152620733', 'Wahyuni Jonaidi', 'Perempuan', 'Padang', '1992-05-04', 'SK-1', '262', '08124141414', 'Lubuk Begalung Padang', '');

-- --------------------------------------------------------

--
-- Table structure for table `tmatakuliah`
--

CREATE TABLE IF NOT EXISTS `tmatakuliah` (
  `Idmk` int(4) NOT NULL,
  `KodeMK` varchar(12) NOT NULL,
  `NamaMK` varchar(25) NOT NULL,
  `SKS` int(2) NOT NULL,
  `JenisMK` varchar(12) NOT NULL,
  `Prasyarat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmatakuliah`
--

INSERT INTO `tmatakuliah` (`Idmk`, `KodeMK`, `NamaMK`, `SKS`, `JenisMK`, `Prasyarat`) VALUES
(1, 'KBKK82012', 'Kapita Selekta', 2, 'KBB', 'APBDS');

-- --------------------------------------------------------

--
-- Table structure for table `tnilai`
--

CREATE TABLE IF NOT EXISTS `tnilai` (
  `ID` varchar(8) NOT NULL,
  `Nobp` varchar(16) NOT NULL,
  `KodeMK` varchar(12) NOT NULL,
  `Kode_jur` varchar(12) NOT NULL,
  `Kode_f` varchar(4) NOT NULL,
  `Nilai_UTS` int(3) NOT NULL,
  `Nilai_UAS` int(3) NOT NULL,
  `NotActive` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tnilai`
--

INSERT INTO `tnilai` (`ID`, `Nobp`, `KodeMK`, `Kode_jur`, `Kode_f`, `Nilai_UTS`, `Nilai_UAS`, `NotActive`) VALUES
('N0000001', '12101152610494', 'KBKK82012', '261', '26', 80, 75, 'N'),
('N0000002', '12101152600018', 'KBKK82012', '260', '26', 80, 90, 'N');

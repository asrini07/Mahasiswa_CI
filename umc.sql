-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2018 at 02:44 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umc`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `jk` char(2) DEFAULT NULL,
  `alamat` varchar(225) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jk`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jurusan`, `email`, `foto`) VALUES
('160511024', 'Iyo Andaeni', 'P', 'Talunn', 'Cirebon', '1997-07-11', 'Teknik Informatika', 'iyo@gmail.com', '160511024.png'),
('160511042', 'ASRINI', 'P', 'Karangsari', 'Cirebon', '1997-11-11', 'Teknik Informatika', 'asrinirpl07@gmail.com', '160511042.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kode_mk` varchar(10) NOT NULL,
  `nama_mk` varchar(100) DEFAULT NULL,
  `sks` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`kode_mk`, `nama_mk`, `sks`) VALUES
('001', 'Matematika', 2),
('002', 'Logika Matematika', 2),
('003', 'Pengantar Teknologi Informasi', 3),
('004', 'Bahasa Inggris', 3),
('005', 'Kalkulus I', 2),
('006', 'Kalkulus II', 2),
('007', 'Al Islam Studi Kemuhammadiyahan', 2),
('008', 'Sistem Digital', 3),
('009', 'Bahasa Indonesia', 3),
('010', 'Sistem Operasi', 3),
('011', 'PBO', 3),
('012', 'Statistika & Probabilitas', 2),
('013', 'PWEB', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `kode_mk` varchar(10) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `semester` char(5) NOT NULL,
  `thn_akademik` year(4) NOT NULL,
  `nilai` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`kode_mk`, `nim`, `semester`, `thn_akademik`, `nilai`) VALUES
('002', '160511042', '1', 2016, 90),
('003', '160511024', '1', 2017, 90);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(8) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama_user`, `foto`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin.gif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kode_mk`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kode_mk`,`nim`,`semester`,`thn_akademik`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

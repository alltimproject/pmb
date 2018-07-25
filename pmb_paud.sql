-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 25, 2018 at 06:04 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmb_paud`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` varchar(10) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL,
  `keterangan_waktu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `keterangan_waktu`) VALUES
('K01', 'Kelas Pagi', '07:00 - 09:00'),
('K02', 'Kelas Siang', '10:00 - 12:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_murid`
--

CREATE TABLE `tb_murid` (
  `nim` varchar(10) NOT NULL,
  `nama_murid` varchar(50) NOT NULL,
  `tempat_lahir_murid` varchar(15) NOT NULL,
  `tgl_lahir_murid` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') NOT NULL,
  `foto_murid` text NOT NULL,
  `id_daftar` varchar(10) NOT NULL,
  `id_kelas` varchar(10) NOT NULL,
  `tanggal_terima` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_murid`
--

INSERT INTO `tb_murid` (`nim`, `nama_murid`, `tempat_lahir_murid`, `tgl_lahir_murid`, `jenis_kelamin`, `foto_murid`, `id_daftar`, `id_kelas`, `tanggal_terima`) VALUES
('MR2018001', 'Devan Dirgantara Putra', 'Jakarta', '2018-06-07', 'Laki-laki', 'foto_PD20180011.jpg', 'PD2018001', 'K01', '2018-07-25 12:54:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `id_daftar` varchar(10) NOT NULL,
  `nama_murid` varchar(50) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') NOT NULL,
  `pas_foto` text NOT NULL,
  `jalur` enum('Lokal','Umum','','') NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_wali` varchar(10) NOT NULL,
  `id_persyaratan` varchar(10) NOT NULL,
  `status` enum('Terima','Tolak','Proses','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`id_daftar`, `nama_murid`, `tempat_lahir`, `tgl_lahir`, `agama`, `jenis_kelamin`, `pas_foto`, `jalur`, `tanggal_daftar`, `id_wali`, `id_persyaratan`, `status`) VALUES
('PD2018001', 'Devan Dirgantara Putra', 'Jakarta', '2018-06-07', 'Islam', 'Laki-laki', 'foto_PD20180011.jpg', 'Lokal', '2018-07-25 12:48:09', 'WL00001', 'GL1801', 'Terima'),
('PD2018002', 'Kalyssa Innara Putri', 'Jakarta', '2018-07-04', 'Islam', 'Perempuan', 'foto_PD2018002.jpeg', 'Umum', '2018-07-25 12:49:15', 'WL00001', 'GL1801', 'Tolak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_persyaratan`
--

CREATE TABLE `tb_persyaratan` (
  `id_persyaratan` varchar(10) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `syarat_pendaftaran` text NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `kuota_murid` int(2) NOT NULL,
  `id_tahun_ajar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_persyaratan`
--

INSERT INTO `tb_persyaratan` (`id_persyaratan`, `keterangan`, `syarat_pendaftaran`, `tanggal_mulai`, `tanggal_akhir`, `kuota_murid`, `id_tahun_ajar`) VALUES
('GL1801', 'Gelombang 1', 'Umur 5 tahun', '2018-07-25', '2018-07-31', 20, 'TA2018-1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tahun_ajaran`
--

CREATE TABLE `tb_tahun_ajaran` (
  `id_tahun_ajar` varchar(10) NOT NULL,
  `tahun_awal` varchar(4) DEFAULT NULL,
  `tahun_akhir` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tahun_ajaran`
--

INSERT INTO `tb_tahun_ajaran` (`id_tahun_ajar`, `tahun_awal`, `tahun_akhir`) VALUES
('TA2018-1', '2018', '2019'),
('TA2018-2', '2019', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Ketua','Admin','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `email`, `password`, `level`) VALUES
('US003', 'Hesti', 'hestikuriawati@gmail.com', 'dd903de671a906601e2c887f383be291', 'Admin'),
('US01', 'Rico Ryan', 'ricoryan321@gmail.com', 'e188b61f13893cb49268b272f78f5ea7', 'Admin'),
('US02', 'Suryati', 'suryati@gmail.com', '8f3999af52e268b519eb941ae0e051a6', 'Ketua');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wali_murid`
--

CREATE TABLE `tb_wali_murid` (
  `id_wali` varchar(10) NOT NULL,
  `nama_wali` varchar(50) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_registrasi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_wali_murid`
--

INSERT INTO `tb_wali_murid` (`id_wali`, `nama_wali`, `no_ktp`, `email`, `password`, `telepon`, `alamat`, `tgl_registrasi`) VALUES
('WL00001', 'Haviz Indra Maulana', '126580162512', 'viz.ndinq@gmail.com', 'e727fe8dc43c98fdabf5ef54b3907262', '081355754092', 'Jakarta', '2018-07-25 12:44:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_murid`
--
ALTER TABLE `tb_murid`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `id_daftar` (`id_daftar`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`id_daftar`),
  ADD KEY `id_wali` (`id_wali`),
  ADD KEY `id_persyaratan` (`id_persyaratan`);

--
-- Indexes for table `tb_persyaratan`
--
ALTER TABLE `tb_persyaratan`
  ADD PRIMARY KEY (`id_persyaratan`),
  ADD KEY `id_tahun_ajar` (`id_tahun_ajar`);

--
-- Indexes for table `tb_tahun_ajaran`
--
ALTER TABLE `tb_tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun_ajar`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_wali_murid`
--
ALTER TABLE `tb_wali_murid`
  ADD PRIMARY KEY (`id_wali`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_murid`
--
ALTER TABLE `tb_murid`
  ADD CONSTRAINT `tb_murid_ibfk_1` FOREIGN KEY (`id_daftar`) REFERENCES `tb_pendaftaran` (`id_daftar`),
  ADD CONSTRAINT `tb_murid_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`);

--
-- Constraints for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD CONSTRAINT `tb_pendaftaran_ibfk_1` FOREIGN KEY (`id_persyaratan`) REFERENCES `tb_persyaratan` (`id_persyaratan`),
  ADD CONSTRAINT `tb_pendaftaran_ibfk_2` FOREIGN KEY (`id_wali`) REFERENCES `tb_wali_murid` (`id_wali`);

--
-- Constraints for table `tb_persyaratan`
--
ALTER TABLE `tb_persyaratan`
  ADD CONSTRAINT `tb_persyaratan_ibfk_1` FOREIGN KEY (`id_tahun_ajar`) REFERENCES `tb_tahun_ajaran` (`id_tahun_ajar`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

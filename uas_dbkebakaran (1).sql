-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 19, 2021 at 06:42 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_dbkebakaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id` int(11) NOT NULL,
  `no_damkar` varchar(13) NOT NULL,
  `no_polisi` varchar(13) NOT NULL,
  `no_rm` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id`, `no_damkar`, `no_polisi`, `no_rm`) VALUES
(1, '123456789301', '874087436781', '123564289362');

-- --------------------------------------------------------

--
-- Table structure for table `kebakaran`
--

CREATE TABLE `kebakaran` (
  `id` int(11) NOT NULL,
  `long` varchar(20) NOT NULL,
  `lat` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `akurasi` float NOT NULL,
  `suhu` varchar(5) NOT NULL,
  `status` int(1) NOT NULL,
  `tanggal_kejadian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kebakaran`
--

INSERT INTO `kebakaran` (`id`, `long`, `lat`, `foto`, `akurasi`, `suhu`, `status`, `tanggal_kejadian`) VALUES
(1, '-6.9396012', '109.1197926', 'default.png', 300, '200', 1, '2021-01-03 11:20:23'),
(2, '109.0833213', '-6.8696789', 'sdfdf', 300, '150', 0, '2022-03-08 07:13:35'),
(5, '9584', '294387', 'sdkfbjhfb', 66, '100', 1, '2019-08-07 09:30:10');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(1) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `nama`, `status`, `date_created`) VALUES
(1, 'Admin', 1, '2020-12-22 00:58:18'),
(2, 'Petugasss', 1, '2021-01-05 00:23:17'),
(3, 'operator', 0, '2021-01-04 14:13:59');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(80) NOT NULL,
  `no_wa` varchar(13) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_level` int(1) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `cookie` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `email`, `no_wa`, `password`, `id_level`, `foto`, `status`, `cookie`, `date_created`) VALUES
(1, 'Atik Mulyani', 'atikmulyani656@gmail.com', '123456789012', '$2y$10$Posv878N9IGEVvfcd/TNx.oT5sVz11DVXkjtw3VnvPQ0v.yafzjaG', 1, 'default.png', 1, 'R8kiWTkXCsSvQUTuDPZprtGNYFOuJyEUcsfb4zO5Eaj196ldxVq2H8KpP2VeALWn', '2021-01-05 00:24:06'),
(3, 'Rijal arfani', 'arfanirizal22@gmail.com', '123456789012', '$2y$10$gPJfFnHGdeLY5dVFHEi9leoV8cJyqY4uj1q98oUwW8Qv0qK0xSdSe', 2, 'default.png', 1, '9aHzft3lun498UVZT6wBzFm27aiyxq0EsPvLJnkGgjpKYpXsxNBPK82AerrOu56t', '2021-01-12 03:29:40'),
(4, 'balqis', 'balqis@gmail.com', '085740332389', '$2y$10$/UKf7GHqi3lfwpbxLczGcuevmYycssTKp.fIxPfc.GFq9sGqQ3C5q', 1, 'default.png', 1, '', '2021-01-19 03:40:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kebakaran`
--
ALTER TABLE `kebakaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
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
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kebakaran`
--
ALTER TABLE `kebakaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

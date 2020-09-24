-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Okt 2019 pada 17.49
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webgis_linggau`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` bigint(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  `pukul` varchar(20) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `status` enum('Publish','UnPublish') NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `judul`, `tgl`, `pukul`, `tempat`, `status`, `ket`) VALUES
(15, 'Rapat Dulu', '2019-06-18', '080808', 'ruang', 'Publish', 'kajajkadjadjka');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galery`
--

CREATE TABLE `galery` (
  `id_galery` bigint(20) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  `tgl` date NOT NULL,
  `status` enum('Publish','UnPublish') NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `galery`
--

INSERT INTO `galery` (`id_galery`, `kategori`, `judul`, `foto`, `tgl`, `status`, `ket`) VALUES
(30, 'Umum', 'haha', 'app/pengabdian/galery/foto/19700101_5d09cae17ce73_fandhy.jpg', '1970-01-01', 'Publish', 'adadd'),
(33, 'Jalan', 'web', 'app/pengabdian/galery/foto/20190619_5d0a48171a7ec_Air_Temam_11.JPG', '2018-02-11', 'Publish', 'tes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jembatan`
--

CREATE TABLE `jembatan` (
  `fid_jembat` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nm_jbtn` varchar(100) NOT NULL,
  `sungai` varchar(100) NOT NULL,
  `kecamatan` varchar(256) NOT NULL,
  `nama_jalan` text NOT NULL,
  `panjang_m` int(11) NOT NULL,
  `lebar_m` int(11) NOT NULL,
  `j_bentang` int(11) NOT NULL,
  `b_atas` varchar(20) NOT NULL,
  `ba_kondisi` varchar(20) NOT NULL,
  `b_bawah` varchar(20) NOT NULL,
  `bb_kondisi` varchar(20) NOT NULL,
  `fondasi` varchar(20) NOT NULL,
  `f_kondisi` varchar(50) NOT NULL,
  `koor_x` varchar(50) NOT NULL,
  `koor_y` varchar(50) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `foto` varchar(256) NOT NULL,
  `foto2` varchar(256) DEFAULT NULL,
  `foto3` varchar(256) DEFAULT NULL,
  `tpe_lantai` varchar(100) DEFAULT NULL,
  `l_kondisi` varchar(50) DEFAULT NULL,
  `thn_pembua` varchar(4) DEFAULT '0',
  `thn_penang` varchar(4) DEFAULT NULL,
  `no_jmbtn` varchar(20) NOT NULL,
  `file` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jembatan`
--

INSERT INTO `jembatan` (`fid_jembat`, `id`, `nm_jbtn`, `sungai`, `kecamatan`, `nama_jalan`, `panjang_m`, `lebar_m`, `j_bentang`, `b_atas`, `ba_kondisi`, `b_bawah`, `bb_kondisi`, `fondasi`, `f_kondisi`, `koor_x`, `koor_y`, `keterangan`, `foto`, `foto2`, `foto3`, `tpe_lantai`, `l_kondisi`, `thn_pembua`, `thn_penang`, `no_jmbtn`, `file`) VALUES
(42, 103, 'Ketue', 'Air Kati', 'KECAMATAN LUBUKLINGGAU BARAT I_B2', 'Jl. Ulak Lebar', 30, 1, 1, 'GTI', 'Rusak Ringan', 'Abutment', 'Rusak Ringan', 'Sumuran', 'Rusak Ringan', '259727.439534', '9636713.74271', '', '', '', '', 'PTI', 'Rusak Ringan', '', '', '25001001', ''),
(43, 104, 'Air Kati', 'Air Kati', 'KECAMATAN LUBUKLINGGAU SELATAN I', 'Jl. Lubuk Binjai', 25, 6, 1, 'GTI', 'Rusak Ringan', 'Abutment', 'Rusak Ringan', 'Tiang Pancang', 'Rusak Ringan', '267674.528555', '9629400.24689', 'PTI', '', '', '', 'PTI', 'Rusak Ringan', '', '', '1001003', ''),
(41, 105, 'Lubuk binjai/Air Kati', 'Temam', 'KECAMATAN LUBUKLINGGAU SELATAN I', 'Jl. TMMD Air Kati', 45, 11, 3, 'GBS', 'Baik', 'Abutment', 'Baik', 'Sumuran', 'Baik', '266480.603921', '9632176.21435', '', '', '', '', 'PTI', 'Baik', '', '', '83601002', ''),
(56, 106, 'Air Kasie', 'Kelingi', 'KECAMATAN LUBUKLINGGAU BARAT II_B1', 'Jl. Kasie II', 60, 3, 1, 'Cable Stayed', 'Sedang', 'Tiang Pilon', 'Sedang', 'Cor Beton', '', '257980.342225', '9632457.34586', 'Lantai Plat Besi', '', '', '', 'Lantai Plat Besi', '', '', '', '3501001', ''),
(47, 107, 'Jend Moh Hasan', 'Tidak Ada (Kereta)', 'KECAMATAN LUBUKLINGGAU TIMUR II', 'Jl. Jend. Moh Hasan', 27, 9, 0, 'GTI', 'Sedang', '-', '-', '-', '-', '262966.435445', '9633952.80278', 'Jembatan Rel Kereta', '', '', '', 'Jembatan Rel Kereta', '', '', '', '1101001', ''),
(46, 108, 'Mesat Seni', 'Mesat', 'KECAMATAN LUBUKLINGGAU TIMUR II', 'Jl. TMMD Air Kati', 25, 9, 0, 'GTI', 'Sedang', '-', '-', '-', '-', '263911.2082', '9634234.1983', '', '', '', '', '', '', '', '', '66101001', ''),
(14, 109, 'Tanjung Indah', 'Mesat', 'KECAMATAN LUBUKLINGGAU BARAT I', 'Jl. Cekdam 1', 12, 1, 0, 'GTI', 'Sedang', '-', '-', '-', '-', '262069.183674', '9634335.15903', '', '', '', '', '', '', '', '', '3101001', ''),
(15, 110, 'H. Matnur', 'Mesat', 'KECAMATAN LUBUKLINGGAU BARAT I_T2', 'Jl. H. Matnur', 13, 5, 1, 'GTI', 'Rusak Ringan', 'Abutment', 'Rusak Berat', 'Sumuran', 'Rusak Berat', '262691.074813', '9634481.44744', '', '', '', '', 'PTI', 'Rusak Ringan', '', '', '2701008', ''),
(16, 111, 'Pattimura', 'Mesat', 'KECAMATAN LUBUKLINGGAU TIMUR II', 'Jl. Pattimura 9', 12, 3, 0, 'GTI', 'Sedang', '-', '-', '-', '-', '262683.706153', '9634556.20561', '', '', '', '', '', '', '', '', '76001001', ''),
(17, 112, 'Patimura 2', 'Mesat', 'KECAMATAN LUBUKLINGGAU TIMUR II', 'Jl. Pattimura Dalam', 21, 4, 1, 'GTI', 'Rusak Ringan', 'Abutment', 'Rusak Ringan', 'Sumuran', 'Rusak Ringan', '262890.787123', '9634585.07171', '', '', '', '', 'PTI', 'Rusak Ringan', '', '', '3301020', ''),
(44, 113, 'Air Kati I', 'Temam', 'KECAMATAN LUBUKLINGGAU SELATAN I', 'Jl. Rahma-Air Kati', 21, 6, 1, 'GTI', 'Rusak Ringan', 'Abutment', 'Rusak Ringan', 'Sumuran', 'Rusak Ringan', '269299.20691', '9634585.1187', '', '', '', '', 'PTI', 'Rusak Ringan', '', '', '1001004', ''),
(22, 114, 'Lingkar Selatan', 'Mesat', 'KECAMATAN LUBUKLINGGAU TIMUR I_T2', 'Jl. Fatmawati Soekarno', 20, 6, 0, 'GTI', 'Sedang', '-', '-', '-', '-', '264656.638286', '9634966.64761', '', '', '', '', '', '', '', '', '601011', ''),
(53, 115, 'Kenanga 2', 'Mesat', 'KECAMATAN LUBUKLINGGAU SELATAN II_S1', 'Jl. Pengalih Bandara', 15, 4, 0, 'GTI', 'Sedang', '-', '-', '-', '-', '268289.792321', '9635133.79945', '', '', '', '', '', '', '', '', '1501010', ''),
(18, 116, 'Mesat Seni', 'Mesat', 'KECAMATAN LUBUKLINGGAU TIMUR II', 'Jl. Dempo Dalam', 30, 1, 1, 'Cable Stayed', 'Sedang', '-', '-', '-', '-', '263092.199383', '9635262.14623', '', '', '', '', '', '', '', '', '83601001', ''),
(24, 117, 'Pengalih Jalan Bandara', 'Mesat', 'KECAMATAN LUBUKLINGGAU TIMUR I', 'Jl. Pengalih Jalan Bandara', 30, 10, 0, 'GTI', 'Sedang', '-', '-', '-', '-', '266313.155131', '9635306.9954', '', '', '', '', '', '', '', '', '46301001', ''),
(19, 118, 'Karya 2', 'Mesat', 'KECAMATAN LUBUKLINGGAU TIMUR II', 'Jl. Bukit Kaba', 25, 2, 0, 'GTI', 'Sedang', '-', '-', '-', '-', '263286.860633', '9635402.53736', '', '', '', '', '', '', '', '', '23701009', ''),
(58, 119, 'Kayu Ara', 'Mesat', 'KECAMATAN LUBUKLINGGAU BARAT I_T1', 'Jl. Padat Karya', 59, 1, 0, 'GTI', 'Sedang', '-', '-', '-', '-', '257723.6234', '9631643.5114', '', '', '', '', '', '', '', '', '21901001', ''),
(21, 120, 'Merbabu', 'Mesat', 'KECAMATAN LUBUKLINGGAU TIMUR II', 'Jl. Bromo', 5, 3, 0, 'GTI', 'Sedang', '-', '-', '-', '-', '263919.138606', '9635444.22623', '', '', '', '', '', '', '', '', '30301016', ''),
(25, 121, 'Letkol Sukirno', 'Mesat', 'KECAMATAN LUBUKLINGGAU TIMUR I', 'Jl. Letkol Sukirno', 26, 9, 0, 'GTI', 'Sedang', '-', '-', '-', '-', '268291.364004', '9635456.48528', '', '', '', '', '', '', '', '', '1001001', ''),
(20, 122, 'Pelita', 'Mesat', 'KECAMATAN LUBUKLINGGAU TIMUR II', 'Jl. Pelita 3', 12, 3, 1, 'GTI', 'Baik', 'Abutment', 'Baik', 'Sumuran', 'Baik', '263655.723952', '9635498.92865', '', '', '', '', 'PTI', 'Baik', '', '', '78201001', ''),
(23, 123, 'Lingkar Selatan', 'Mesat', 'KECAMATAN LUBUKLINGGAU TIMUR I', 'Jl. Fatmawati Soekarno', 20, 5, 0, 'GTI', 'Sedang', '-', '-', '-', '-', '265782.373444', '9635506.22705', '', '', '', '', '', '', '', '', '601012', ''),
(55, 124, 'Pelita Jaya', 'Temam', 'KECAMATAN LUBUKLINGGAU BARAT II_S1', 'Jl. Dayang Torek', 65, 2, 2, 'Cable Stayed', 'Baik', 'Tiang Pilon', 'Baik', 'Cor Beton', 'Baik', '259708.371282', '9634600.33854', 'Lantai Plat Besi', '', '', '', 'Lantai Plat Besi', 'Baik', '', '', '25001002', ''),
(35, 125, 'Ulak Lebar', 'Kelingi', 'KECAMATAN LUBUKLINGGAU BARAT I_B2', 'Jl. Ulak Lebar', 70, 1, 3, 'Cable Stayed', 'Rusak Ringan', 'Tiang Pilon', 'Rusak Berat', 'Cor Beton', 'Sedang', '260422.502534', '9635798.56696', '', '', '', '', 'Lantai Kayu', 'Lantai Rusak Berat', '', '', '16701002', ''),
(12, 126, 'Depati Said', 'Seteki', 'KECAMATAN LUBUKLINGGAU UTARA II', 'Jl. Depati Said', 26, 8, 2, 'GTI', 'Rusak Ringan', 'Abutment', 'Rusak Ringan', 'Tiang Pancang', 'Rusak Ringan', '262326.24777', '9635941.42213', '', '', '', '', 'PTI', 'Sedang', '', '', '801001', ''),
(34, 127, 'Sudirman', 'Kelingi', 'KECAMATAN LUBUKLINGGAU BARAT II_U2', 'Jl. Jend Sudirman', 56, 6, 1, 'RBU', 'Rusak Ringan', 'Abutment', 'Rusak Ringan', 'Sumuran', 'Rusak Ringan', '262668.581401', '9636126.37049', '', '', '', '', 'PTI', 'Rusak Ringan', '', '', '1401024', ''),
(0, 128, 'Ahmad Yani', 'Kelingi', 'KECAMATAN LUBUKLINGGAU UTARA II', 'Jl. Ahmad Yani', 51, 8, 2, 'GTI', 'Rusak Ringan', 'Abutment', 'Rusak Ringan', 'Tiang Pancang', 'Rusak Ringan', '263116.911088', '9636159.21685', 'PTI', '', '', '', 'PTI', 'Rusak Ringan', '', '', '101001', ''),
(33, 129, 'Batu Urip', 'Kelingi', 'KECAMATAN LUBUKLINGGAU UTARA II', 'Jl. Batu Urip', 70, 1, 1, 'Cable Stayed', 'Rusak Berat', '-', 'Rusak Berat', 'Sumuran', 'Rusak Berat', '265508.201248', '9637446.16772', '', '', '', '', 'PTI', 'Rusak Berat', '', '', '15101006', ''),
(28, 130, 'Lubuk Durian', 'Mesat', 'KECAMATAN LUBUKLINGGAU BARAT I_S1', 'Jl. Syarif Alie', 60, 1, 0, 'GTI', 'Sedang', '-', '-', '-', '-', '258481.778277', '9632852.21081', '', '', '', '', '', '', '', '', '2601001', ''),
(26, 131, 'Air Temam', 'Mesat', 'KECAMATAN LUBUKLINGGAU SELATAN I', 'Jl. Air Temam', 35, 7, 2, 'RBU', 'Rusak Ringan', 'Abutment', 'Rusak Ringan', 'Sumuran', 'Rusak Ringan', '271551.773616', '9637848.6409', '', '', '', '', 'PTI', 'Rusak Ringan', '', '', '901005', ''),
(27, 132, 'Dayang Torek', 'Mesat', 'KECAMATAN LUBUKLINGGAU BARAT I_S1', 'Jl. Dayang Torek', 53, 2, 2, 'Cable Stayed', 'Sedang', '-', '-', '-', '-', '259209.7529', '9633909.4027', 'Jembatan Lama, Lantai Pipa Besi', '', '', '', 'Jembatan Lama, Lantai Pipa Besi', '', '', '', '16701001', ''),
(32, 133, 'Watervang', 'Kelingi', 'KECAMATAN LUBUKLINGGAU TIMUR I_U2', 'Jl. Watervang', 34, 2, 1, 'Cable Stayed', 'Baik', '-', '-', '-', '-', '266338.782909', '9638116.75552', '', '', '', '', 'Kayu', 'Rusak Berat', '', '', '16301028', ''),
(29, 134, 'Taba Pingin', 'Kelingi', 'KECAMATAN LUBUKLINGGAU TIMUR 1_S1', 'Jl. Bromo', 82, 1, 3, 'Cable Stayed', 'Sedang', '-', '-', '-', '-', '264034.379106', '9635435.50182', '', '', '', '', '', '', '', '', '15101006', ''),
(31, 135, 'Moneng Sepati', 'Kelingi', 'KECAMATAN LUBUKLINGGAU SELATAN II', 'Jl. Moneng Sepati', 27, 2, 1, 'Cable Stayed', 'Rusak Berat', '-', 'Rusak Berat', '-', '-', '268052.532274', '9638821.99587', '', '', '', '', 'Kayu', 'Rusak Berat', '', '', '13101017', ''),
(54, 136, 'Sudirman', 'Belalau', 'KECAMATAN LUBUKLINGGAU UTARA II', 'Jl. Jend Sudirman', 17, 5, 1, 'GTI', 'Rusak Berat', 'Abutment', 'Rusak Berat', 'Sumuran', 'Rusak Berat', '262168.977997', '9638935.07974', '', '', '', '', 'PTI Rusak Berat', 'Rusak Berat', '', '', '1401025', ''),
(30, 137, 'Raya Tugumulyo', 'Kelingi', 'KECAMATAN LUBUKLINGGAU SELATAN II', 'Jl. Raya Tugumulyo', 31, 7, 1, 'GTI', 'Baik', 'Abutment', 'Baik', 'Sumuran', 'Baik', '270931.403136', '9638959.34796', '', '', '', '', 'PTI', 'Baik', '', '', '32021', ''),
(40, 138, 'Malus I', 'Malus', 'KECAMATAN LUBUKLINGGAU UTARA I', 'Jl. Malus', 5, 3, 0, 'GTI', 'Sedang', '-', '-', '-', '-', '254587.184474', '9640297.89603', '', '', '', '', '', '', '', '', '85701001', ''),
(37, 139, 'Lingkar Utara', 'Bugin Jawi', 'KECAMATAN LUBUKLINGGAU UTARA II', 'Jl. Gajah Mada', 65, 9, 0, 'GTI', 'Sedang', '-', '-', '-', '-', '265330.125156', '9640377.82042', '', '', '', '', '', '', '', '', '1301014', ''),
(39, 140, 'Malus II', 'Malus', 'KECAMATAN LUBUKLINGGAU UTARA I', 'Jl. Malus', 44, 5, 0, 'GTI', 'Sedang', '-', '-', '-', '-', '256181.325176', '9640450.13494', '', '', '', '', '', '', '', '', '85701002', ''),
(57, 141, 'Soekarno Hatta I', 'Belalau', 'KECAMATAN LUBUKLINGGAU UTARA I', 'Jl. Soekarno Hatta', 22, 10, 1, 'GTI', 'Baik', 'Abutment', 'Baik', 'Sumuran', 'Baik', '260991.496631', '9640504.62291', '', '', '', '', 'PTI', 'Baik', '', '', '201023', ''),
(51, 142, 'Lingkar Utara', 'Belalau', 'KECAMATAN LUBUKLINGGAU SELATAN II_U1', 'Jl. Gajah Mada', 45, 9, 1, 'Cable Stayed', 'Sedang', '-', '-', '-', '-', '264206.619406', '9641581.33565', '', '', '', '', '', '', '', '', '1301015', ''),
(5, 143, 'Belalau IV', 'Belalau', 'KECAMATAN LUBUKLINGGAU UTARA I', 'Jl. Belalau II', 16, 6, 1, 'Cable Stayed', 'Sedang', '-', '-', '-', '-', '262276.771066', '9644894.26187', '', '', '', '', '', '', '', '', '1201010', ''),
(7, 144, 'Belalau III', 'Belalau', 'KECAMATAN LUBUKLINGGAU UTARA I', 'Jl. Belalau II', 14, 6, 0, 'GTI', 'Sedang', '-', '-', '-', '-', '264181.289254', '9645638.00193', '', '', '', '', '', '', '', '', '1201009', ''),
(4, 145, 'Belalau I', 'Bujuk', 'KECAMATAN LUBUKLINGGAU UTARA I', 'Jl. Belalau II', 6, 4, 0, 'GTI', 'Sedang', '-', '-', '-', '-', '260906.861659', '9645649.83401', '', '', '', '', '', '', '', '', '1201007', ''),
(6, 146, 'Belalau II', 'Belalau', 'KECAMATAN LUBUKLINGGAU UTARA I', 'Jl. Belalau II', 7, 4, 2, 'GTI', 'Baik', '-', '-', 'Sumuran', 'Baik', '263217.256384', '9645675.74189', '', '', '', '', 'PTI', 'Baik', '', '', '1201008', ''),
(3, 147, 'Lingkar Utara', 'Bujuk', 'KECAMATAN LUBUKLINGGAU UTARA I', 'Jl. Rencana Lingkar Utara', 31, 7, 1, 'GTI', 'Baik', 'Abutment', 'Baik', 'Sumuran', 'Baik', '261023.623646', '9646635.11195', '', '', '', '', 'PTI', 'Baik', '', '', '1301013', ''),
(11, 148, 'Margorejo', 'Megang', 'KECAMATAN LUBUKLINGGAU UTARA I', 'Jl. Nang Ali Solihin', 35, 11, 0, 'GTI', 'Sedang', '-', '-', '-', '-', '268195.163023', '9647013.08598', 'SAM_2264', '', '', '', '', '', '', '', '89401001', ''),
(10, 149, 'Nang Ali Solihin', 'Megang', 'KECAMATAN LUBUKLINGGAU UTARA I', 'Jl. Nang Ali Solihin', 16, 7, 1, 'GTI', 'Baik', 'Abutment', 'Baik', 'Sumuran', 'Baik', '268406.311224', '9647819.4201', '', '', '', '', 'PTI', 'Baik', '', '', '26101018', ''),
(49, 150, 'Lingkar Utara II', 'Belalau', 'KECAMATAN LUBUKLINGGAU UTARA I', 'Jl. Taba Baru 2', 20, 6, 1, 'GTI', 'Baik', 'Abutment', 'Baik', 'Sumuran', 'Baik', '264739.168638', '9647912.03735', '', '', '', '', 'PTI', 'Baik', '', '', '1301016', ''),
(2, 151, 'Tanjung Raya', 'Malus', 'KECAMATAN LUBUKLINGGAU UTARA I', 'Jl. Kantor Lurah Tanjung Raya', 27, 2, 1, 'Cable Stayed', 'Rusak Berat', '-', 'Rusak Berat', '-', '-', '259309.4569', '9648131.2636', '', '', '', '', 'Kayu', 'Rusak Berat', '', '', '24401026', ''),
(1, 152, 'Soekarno Hatta', 'Malus', 'KECAMATAN LUBUKLINGGAU UTARA I', 'Jl. Soekarno Hatta', 31, 9, 1, 'GTI', 'Baik', 'Abutment', 'Baik', 'Sumuran', 'Baik', '259240.687366', '9648134.39085', '', '', '', '', 'PTI', 'Baik', '', '', '201022', ''),
(9, 153, 'Nang Ali Solihin', 'Megang', 'KECAMATAN LUBUKLINGGAU UTARA I', 'Jl. Nang Ali Solihin', 26, 3, 1, 'GTI', 'Baik', 'Abutment', 'Baik', 'Sumuran', 'Baik', '269276.593392', '9649156.30846', '', '', '', '', 'PTI', 'Baik', '', '', '26101019', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL,
  `tipe` enum('jalan','jembatan') NOT NULL,
  `nama` varchar(50) NOT NULL,
  `link` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `tipe`, `nama`, `link`) VALUES
(1, 'jalan', 'KECAMATAN LUBUKLINGGAU BARAT I', '?p=976kjkkjfnnii&nmfilehtml=database/jalan/Lubuklinggau_Barat_1/index.html'),
(2, 'jalan', 'KECAMATAN LUBUKLINGGAU BARAT II', '?p=976kjkkjfnnii&nmfilehtml=database/jalan/Lubuklinggau_Barat_2/index.html'),
(3, 'jalan', 'KECAMATAN LUBUKLINGGAU UTARA I', '?p=976kjkkjfnnii&nmfilehtml=database/jalan/Lubuklinggau_Utara_1/index.html'),
(4, 'jalan', 'KECAMATAN LUBUKLINGGAU UTARA II', '?p=976kjkkjfnnii&nmfilehtml=database/jalan/Lubuklinggau_Utara_2/index.html'),
(5, 'jalan', 'KECAMATAN LUBUKLINGGAU TIMUR I', '?p=976kjkkjfnnii&nmfilehtml=database/jalan/Lubuklinggau_Timur_1/index.html'),
(6, 'jalan', 'KECAMATAN LUBUKLINGGAU TIMUR II', '?p=976kjkkjfnnii&nmfilehtml=database/jalan/Lubuklinggau_Timur_2/index.html'),
(7, 'jalan', 'KECAMATAN LUBUKLINGGAU SELATAN I', '?p=976kjkkjfnnii&nmfilehtml=database/jalan/Lubuklinggau_Selatan_1/index.html'),
(8, 'jalan', 'KECAMATAN LUBUKLINGGAU SELATAN II', '?p=976kjkkjfnnii&nmfilehtml=database/jalan/Lubuklinggau_Selatan_2/index.html'),
(9, 'jembatan', 'KECAMATAN LUBUKLINGGAU BARAT I', '?p=976kjkkjfnnii&nmfilehtml=database/jembatan/Jembatan_Linggau_Barat_1/index.html'),
(10, 'jembatan', 'KECAMATAN LUBUKLINGGAU BARAT II', '?p=976kjkkjfnnii&nmfilehtml=database/jembatan/Jembatan_Linggau_Barat_2/index.html'),
(11, 'jembatan', 'KECAMATAN LUBUKLINGGAU UTARA I', '?p=976kjkkjfnnii&nmfilehtml=database/jembatan/Jembatan_Linggau_Utara_1/index.html'),
(12, 'jembatan', 'KECAMATAN LUBUKLINGGAU UTARA II', '?p=976kjkkjfnnii&nmfilehtml=database/jembatan/Jembatan_Linggau_Utara_2/index.html'),
(13, 'jembatan', 'KECAMATAN LUBUKLINGGAU TIMUR I', '?p=976kjkkjfnnii&nmfilehtml=database/jembatan/Jembatan_Linggau_Timur_1/index.html'),
(14, 'jembatan', 'KECAMATAN LUBUKLINGGAU TIMUR II', '?p=976kjkkjfnnii&nmfilehtml=database/jembatan/Jembatan_Linggau_Timur_2/index.html'),
(15, 'jembatan', 'KECAMATAN LUBUKLINGGAU SELATAN I', '?p=976kjkkjfnnii&nmfilehtml=database/jembatan/Jembatan_Linggau_Selatan_1/index.html'),
(16, 'jembatan', 'KECAMATAN LUBUKLINGGAU SELATAN II', '?p=976kjkkjfnnii&nmfilehtml=database/jembatan/Jembatan_Linggau_Selatan_2/index.html');

-- --------------------------------------------------------

--
-- Struktur dari tabel `page`
--

CREATE TABLE `page` (
  `id_page` bigint(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `isi` longtext NOT NULL,
  `parent` bigint(20) NOT NULL,
  `tgl` datetime NOT NULL,
  `pembaca` bigint(20) NOT NULL,
  `status` enum('Publish','UnPublish') NOT NULL,
  `orders` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `page`
--

INSERT INTO `page` (`id_page`, `judul`, `deskripsi`, `isi`, `parent`, `tgl`, `pembaca`, `status`, `orders`) VALUES
(3, 'Profile', '<p>Profile dari UIN Raden Fatah Palembang</p>\r\n', '<p>Profile dari UIN Raden Fatah Palembang</p>\r\n', 0, '2016-06-02 21:16:31', 0, 'Publish', 0),
(4, 'Sejarah', '<p>Sejarah</p>\r\n', '<p style=\"text-align: justify;\"><b>Peristiwa Heroik 3 Desember</b></p>\r\n\r\n<p style=\"text-align: justify;\">Tanggal 3 Desember merupakan hari yang punya \"Makna Khusus\" bagi warga Departemen Pekerjaan Umum. Karena pada tanggal tersebut lima puluh tujuh tahun yanga lalu terjadi peristiwa bersejarah. Gugur tujuh orang karyawan yang berjuang mempertahankan markas Departemen PU di Kota Bandung yang dikenal sebagai \"Gedung Sate\". Peristiwa ini kemudian dikenang dan diperingati sebagai HARI KEBAKTIAN PEKERJAAN UMUM.</p>\r\n\r\n<p style=\"text-align: justify;\"><b>Gedung V & W</b> ini dipertahankan mati-matian sampai titik darah penghabisan oleh para pemuda/ pegawai Departemen PU. Karena mereka sadar, bahwa gedung tersebut pada waktu itu dipergunakan sebagai kantor Pusat Departemen.</p>\r\n\r\n<p>Setelah kemerdekaan Republik Indonesia diproklamirkan, para pemuda pegawai Departemen Pekerjaan Umum tidak mau ketinggalan dengan pemuda-pemuda lainnya di kota Bandung. Mereka mempersiapkan diri dalam menghadapi segala kemungkinan yang sekiranya akan dapat merintangi serta mengganggu kemerdekaan yang telah diproklamasikan.</p>\r\n\r\n<p style=\"text-align: justify;\">Jiwa dan semangat perjuangan yang menyala-nyala dari para patriot muda ini kemudian dihimpun dan disalurkan dalam suatu gerakan yang teratur dalam bentuk organisasi dengan nama gerakan Pemuda PU.</p>\r\n\r\n<p style=\"text-align: justify;\">Gedung Sate, telah berhasil diambil alih oleh gerakan pemuda PU dari tangan Jepang. Kewajiban mereka selanjutnya pada saat itu adalah mempertahankan dan memelihara apa yang telah diambil alih itu jangan sampai direbut kembali oleh musuh. Untuk dapat menyusun pertahanan yang kompak, maka gerakan pemuda ini lalu membentuk suatu seksi pertahanan yang dipersenjatai seperti granat, beberapa pucuk bedil dan senjata api lainnya hasil rampasan dari tentara Jepang.</p>\r\n\r\n<p style=\"text-align: justify;\">Mulanya gerakan pemuda ini hanya menghadapi sam kekuatan lawan. Yaitu tentara Jepang. Namun menjelang akhir bulan September 1945, di Tanah Air ini mulailah mengalir tentara Sekutu yang katanya ditugaskan untuk menjaga keamanan dan menyelesaikan tawanan perang akibat bertekuk lututnya Jepang pada Sekutu.</p>\r\n\r\n<p><b>Sumpah Setia</b></p>\r\n\r\n<p>Tepatnya tanggal 4 Oktober 1945, kota Bandung dimasuki tentara Sekutu yang di ikuti oleh serdadu Belanda dan NICA. Sejak saat itu suasana kota Bandung menjadi semakin tidak aman. Sejak itu pula gerakan pemuda pejuang harus berhadapan dengan tentara Jepang dan tentara Sekutu, Belanda dan NICA.\r\n\r\nDengan semakin gawatnya situasi pada waktu itu, para pegawai dari Kantor Pusat Dep. PU dibawah pimpinan Menteri Muda Perhubungan dan Pekerjaan Umum. Ir Pangeran Noor pada tanggal 20 Oktober telah mengangkat Sumpah Setia Kepada Pernerintah Republik Indonesia.\r\n\r\nHampir setiap hari kantor Departemen Perhubungan dan Pekerjaan Umum dikacau oleh tentara Sekutu/Belanda/NICA, akibatnya para pegawai tidak dapat melaksanakan tugasnya dengan tenang. Oleh karena itu, pada mulanya semua pegawai Departemen Perhubungan dan Pekerjaan Umum diperkenankan untuk tidak masuk kantor selama situasi belum aman. Kecuali para pegawai yang memang diserahi barang-barang milik negara yang ada di dalamnya. Tugas yang berat ini mereka terima sebagi suatu kewajiban yang mulia yang akan dilaksanakan dengan taruhan jiwa dan raga.</p>\r\n', 3, '2016-06-21 08:55:38', 0, 'Publish', 0),
(9, 'Pusat Penelitian', '<p>Sejarah Penelitian dan Pengembangan</p>\r\n', '<p style=\"text-align:justify\">&nbsp;&nbsp;&nbsp;&nbsp; Pusat penelitian dan pennerbitan sebelumnya Lembaga Penelitian sebagaimana namanya, pusat ini bertugas melakukan penelitian dan penerbitan karya-karya ilmiah yang dihasilkan oleh dosen dan mahasiswa. Posisi penting pusat ini terlihat dari aspek penelitian yang merupakan bagian dari Tri Dharma Perguruan Tinggi. Dengan kata lain, Puslit memiliki tugas yang sangat penting dalam menentukan keberhasilan UIN Raden Fatah Palembang di bidang penelitian ilmiah.</p>\r\n\r\n<p style=\"text-align:justify\">Dalam sejarahnya, Puslit pernah memiliki nama sebutan yang cukup banyak. Diresmikan pertama kali pada tahun 1969 melalui intruksi Rektor UIN Raden Fatah No. I tahun 1969, lembaga ini dikenal dengan sebutan lembaga ilmiah,Dakwah dan Penerbitan yang diketuai oleh Drs. Burlian Somad. Dari sebutannya, lembaga ini bukan saja mengurusi karya ilmiah dosen dan mahasiswa, tetapi juga mengurusi bidang dakwah Islam. Dengan kata lain, Puslit pada saat itu memiliki tugas yang sangat luas dibandingkan dengan sekarang.</p>\r\n\r\n<p style=\"text-align:justify\">Tetapi nama lengkap ini tidka bertahan lama, lTahun 1970, melalui keputusan Rektor UIN Raden Fatah Palembang No. III tahun 1970, Lembaga ilmiah, Dakwah dan Penerbitan berganti nama menjadi Lembaga Ilmiah dan Penerbitan. Yang ditunjuk sebagai ketua adalah Drs. R.S Poesponegoro menggantikan Drs. Burlian Somad. Disini terlihat spesifikasi tugas Puslit menjadi lebih khusus kepada kepada karya ilmiah dan penerbitan. Sedangkan bagian dakwah tidak menjadi perhatian Puslit lagi. Dalam kegiatannya, lembaga ini berhasil menerbitkan &ldquo;Majalah Ilmiah Al-Fatah&rdquo; sampai lima kali penerbitan dengan pemimpin redaksinya adalah Dr. Poesponegoro sendiri.</p>\r\n\r\n<p style=\"text-align:justify\">Seiring keluarnya keputusan Menteri Agama 1972 lembaga ilmiah da n Penerbitan juga berubah menjadi Lembaga Research dan Survey. Dari namanya, lembaga ini hanya bertugas melakukan penelitian (riset). Sedangkan penerbitan, sekalipun tidak disebut tetatpi tetap menjadi perhatian. Berdasarkan Surat Keputusan Menteri Agama No. B.III/3-b/7121 tanggal 28 Desember 1972, lembaga Research dan Survey ini diketuai oleh oleh Prof. KH. Zainal Abidin Fikry dan Drs. R.S. Poesponegoro sebagai sekretarisnya. Sedangkan anggotanya adalah ZamhariAbidin SH, KH. Malian Jaman, KH. Mohd. Toha Nur, Syekh Makki A. Rovi&rsquo;i L.M.L, Drs. Burlian Somad, K. Mohd. Rasyid Thalib, Drs. Alwy Hamry dan Drs. Usman Gani.</p>\r\n\r\n<p style=\"text-align:justify\">Pada masa ini, kegiatan penlitian cukup banyak dilakukan. Diantaranya adalah :</p>\r\n\r\n<ol>\r\n	<li style=\"text-align:justify\">Penelitian keagamaan (disesuaikan tahun 1972)</li>\r\n	<li style=\"text-align:justify\">Penelitian tentang &ldquo; Sejarah Agma Islam dan Perkembanganya di Bumi Sriwijaya&rdquo;; dikerjakann atas permintaan panitia Musabaqoh Tilawatil Qur&rsquo;an II Pertamina Unit II Plaju</li>\r\n	<li style=\"text-align:justify\">Penelitian tentang &ldquo; Klasifikasi Isi Al-Qur&rsquo;an&rdquo; yang diarahkan dalam dua bagian yaitun &ldquo;Ayat-ayat Munakahat&rdquo; serta &ldquo;Ayat-ayat Imu Jiwa&rdquo;,</li>\r\n	<li style=\"text-align:justify\">Survey dan Riset tentang kemerosotan Moral Muda-mudi</li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\">Pada tahun 1987, nama lembag Research dan Survey diganti menjadi Balai Penelitian. Sampai tahun 1995, balai penelitian tetap menjadi lembaga yang mengurusi pelaksanaan penelitian dosen dan mahasiswa di UIN Raden Fatah Palembang, lembaga ini akhirnya berubah namanya menjadi pusat penelitian (Puslit). Namun ini lah yang sering disebut di lingkungan kampus.</p>\r\n\r\n<p style=\"text-align:justify\">Sejak tahun 1995, pusat penelitian resmi berdiri sebagai lembaga yang bertugas melakukan kegiatan penelitian dan penulisan karya ilmiah di lingkungan UIN Raden Fatah Palembang. Nama ini melekat sampai tahun 2013 dan menjadi Pusat Penelitian dan penerbitan (Puslit). Oleh akerna itu,&nbsp; sudah beberapa orang dosen yang memimpin pusat penelitian ini diantaranya adalah Drs. Salman Ali (Alm), Prof. DR. H. Jalaluddin, Drs. H. Mal&rsquo;an Abdullah, Drs. Ahmad Zainal, Dr. Izomiddin, MA, Drs. Wijaya, M.Si, Phd, Drs. Muhammad Isnaini, S.Ag, M,Pd, Dr. Nyanyu Khodijah, dan Drs. Saiful Annur, M.Pd.</p>\r\n', 6, '2016-08-13 11:40:00', 0, 'Publish', 1),
(10, 'Pusat Pengabdian', '<p>Sejarah Pengabdian</p>\r\n', '<p style=\"text-align:justify\">UIN Raden Fatah Palembang mempunyai kewajiban mengamalkan Tri Dharma Perguruan Tinggi. Bahkan sebagai perguruan tinggi yang bercorak agama, dharma ketiga diharapkan menjadi trademark lembaga yang bercirikan keterpaduan antara peran-peran soal keagamaan dengan berbagai aspek kehidupan di masyarakat.</p>\r\n\r\n<p style=\"text-align:justify\">Perguruan Tinggi Agama Islam Negeri (PTAIN) merupakan salah satu institusi yang memiliki peran dan fungsi sebagai pengembangan keislaman, dakwah dan peningkatan kesejahteraan masyarakat melalui penyebaran dan informasi produk IPTEK. Oleh akrena itulah, perspektif pengembangan posdaya, diharapkan sebagai penopang perubahan sosial dan kembali menampatkannya dalam percepatan pencapain indikator tujuan pembangunan Milllenium atau Millenium Development Goals (MDGs), yaki depalan tujuan dan sasaran atau tujuan yang telah disetujui anggota untuk diupayakan agar tahun tercapai 2015 oleh seluruh PBB yang berjumlah 191 negara.</p>\r\n\r\n<p style=\"text-align:justify\">Dalms sejarahnya, LP2M terbagi atas dua lembaga yaitu pusat penelitian dan pusat pengabdian kepada masyarakat (P2M). Sejak tahun 1995, pusat penelitian resmi berdiri sebagai lembaga yang bertugas melakukan kegiatan penelitian dan penulisan karya ilmiah di lingkungan UIN Raden Fatah Palembang. Nama ini melekat sampai tahun 2013 dan memnjadi pusat penelitian.</p>\r\n\r\n<p style=\"text-align:justify\">Lembaga pengabdian kepada masyarakat (LPM) berganti nama pusat pengabdian kepada masyarakat (P2M) pada pelaksanaan KKN (Kuliah Kerja Nyata) ke 57 yang dilaksanakan di daerah Empat Lawang pada tahun 2011 yang dipimpim oleh Dr. Muhajirin, MA, dan LPM bergabung dengan pusat penelitian menjadi LP2M yaitu pada saat pelaksanaan KKN ke 62 pada tahun 2013. Kemudian KKN Tematik Posdaya angkatan 65 ke kabupaten Lahat dan Muba.</p>\r\n\r\n<p style=\"text-align:justify\">KKN yang diselenggarakan Lembaga Penelitian kepada Masyarakat (LP2M) Universitas Islam Negeri (UIN)Raden Fatah Palembang berkonsentrasi pada pemberdayaan masyarakat.</p>\r\n\r\n<p style=\"text-align:justify\">Hubungan dengan KKN Tematik Posdaya, mahasiswa berperan untuk membentuk posdaya sebagai bentuk manifestasi dari kegiatan KKN yang dilaksanakan dalam rangka penyebaran informasi dan implementasi keilmuan serta menyelesaikan pendidikan tinggi melalui proses pembelajaran dengan cara tunggal, bergaul serta beradaptasi dengan masyarakat.</p>\r\n\r\n<p style=\"text-align:justify\">Selanjutnya yang pernah memimpin P2M diantaranya yaitu Drs. H. Mardi Abdullah, Drs. H. Abdul Amri Sirgar, MA, Drs. H. M. Teguh Shobari, M. Hum, Drs. M. Zuhdi, M. Hi, Dr. Muhajirin, MA, dan H. Komaruddin, M.Si.</p>\r\n\r\n<p style=\"text-align:justify\">Sejak diberlakukannya ortaker tahun 2013, pelaksanaan dan penganbdian kepada masyarakat selanjutnya berada dibawah pengelolaan Lembaga Penelitian dan Pengabdian Masyarakat (LP2M). Di lembaga inilah pusat Penelitian bersama dengan Pusat Pengabdian Masyarakat (P2M) dan Pusat Studi Gender dan Anak (PSGA) melakukan berbagai kegiatan yang berkaitan dengan penelitian dan pengabdian yang menjadi bagian penting dari Tri Dharma Perguruan Tinggi.</p>\r\n', 27, '2016-08-13 11:26:08', 0, 'Publish', 1),
(16, 'Visi dan Misi ', '<p>Visi dan Misi</p>\r\n', '<p style=\"text-align: justify;\"><strong>Visi Kementerian Pekerjaan Umum dan Perumahan Rakyat tahun 2015-2019 adalah:</strong></p>\r\n\r\n<p style=\"text-align: center;\">\"TERWUJUDNYA INFRASTRUKTUR PEKERJAAN UMUM DAN PERUMAHAN RAKYAT YANG HANDAL</p>\r\n\r\n<p style=\"text-align: center;\">DALAM MENDUKUNG INDONESIA YANG BERDAULAT, MANDIRI, DAN BERKEPRIBADIAN</p>\r\n\r\n<p style=\"text-align: center;\">BERLANDASKAN GOTONG ROYONG\"</p>\r\n<br>\r\n\r\n<p style=\"text-align: justify;\">Misi Kementerian Pekerjaan Umum dan Perumahan Rakyat yang merupakan rumusan upaya yang akan dilaksanakan selama periode Renstra 2015 sampai 2019 dalam rangka mencapai visi serta mendukung upaya pencapaian target pembangunan nasional, berdasarkan mandat yang diemban oleh Kementerian Pekerjaan Umum dan Perumahan Rakyat sebagaimana yang tercantum di dalam Peraturan Pemerintah Nomor 165 Tahun 2014 tentang Penataan Tugas dan Fungsi Kabinet Kerja, amanat RPJMN tahap ketiga serta perubahan kondisi lingkungan strategis yang dinamis adalah sebagai berikut :</p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\">Mempercepat pembangunan infrastruktur sumberdaya air termasuk sumber daya maritim untuk mendukung ketahanan air, kedaulatan pangan, dan kedaulatan energi, guna menggerakkan sektor-sektor strategis ekonomi domestik dalam rangka kemandirian ekonomi;</li>\r\n	<li style=\"text-align: justify;\">Mempercepat pembangunan infrastruktur jalan untuk mendukung konektivitas guna meningkatkan produktivitas, efisiensi, dan pelayanan sistem logistik nasional bagi penguatan daya saing bangsa di lingkup global yang berfokus pada keterpaduan konektivitas daratan dan maritim;</li>\r\n	<li style=\"text-align: justify;\">Mempercepat pembangunan infrastruktur permukiman dan perumahan rakyat untuk mendukung layanan infrastruktur dasar yang layak dalam rangka mewujudkan kualitas hidup manusia Indonesia sejalan dengan prinsip \"infrastruktur untuk semua\";</li>\r\n	<li style=\"text-align: justify;\">Mempercepat pembangunan infrastruktur pekerjaan umum dan perumahan rakyat secara terpadu dari pinggiran didukung industri konstruksi yang berkualitas untuk keseimbangan pembangunan antardaerah, terutama di kawasan tertinggal, kawasan perbatasan, dan kawasan perdesaan, dalam kerangka NKRI;</li>\r\n	<li style=\"text-align: justify;\">Meningkatkan tata kelola sumber daya organisasi bidang pekerjaan umum dan perumahan rakyat yang meliputi sumber daya manusia, pengendalian dan pengawasan, kesekertariatan serta penelitian dan pengembangan untuk mendukung fungsi manajemen meliputi perencanaan yang terpadu, pengorganisasian yang efisien, pelaksanaan yang tepat, dan pengawasan yang ketat.</li>\r\n	', 3, '2019-05-14 08:56:14', 0, 'Publish', 0),
(17, 'Tugas dan Fungsi', '<p>Tugas dan Fungsi</p>\r\n', '\r\n<p style=\"text-align:justify\">Sesuai dengan Peraturan Presiden Nomor 15 Tahun 2015 tentang Kementerian Pekerjaan Umum dan Perumahan Rakyat dan Peraturan Presiden Nomor 135 Tahun 2018 tentang Perubahan atas Peraturan Presiden Nomor 15 Tahun 2015 tentang Kementerian Pekerjaan Umum dan Perumahan Rakyat.</p>\r\n\r\n<p style=\"text-align:justify\">Kementerian Pekerjaan Umum dan Perumahan Rakyat mempunyai tugas menyelenggarakan urusan pemerintahan di bidang pekerjaan umum dan perumahan rakyat untuk membantu Presiden dalam menyelenggarakan pemerintahan negara.</p>\r\n\r\n<p style=\"text-align:justify\">Dalam melaksanakan tugas sebagaimana dimaksud di atas, Kementerian Pekerjaan Umum dan Perumahan Rakyat menyelenggarakan  fungsi:</p>\r\n\r\n<ol>\r\n	<li style=\"text-align:justify\">perumusan, penetapan, dan pelaksanaan kebijakan di bidang pengelolaan sumber daya air, penyelenggaraan jalan, penyediaan perumahan dan pengembangan kawasan permukiman, pembiayaan infrastruktur, penataan bangunan gedung, sistem penyediaan air minum, sistem pengelolaan air limbah dan drainase lingkungan serta persampahan, dan pembinaan jasa konstruksi;</li>\r\n	<li style=\"text-align:justify\">koordinasi pelaksanaan tugas, pembinaan, dan pemberian dukungan administrasi kepada seluruh unsur organisasi di lingkungan Kementerian Pekerjaan Umum dan perumahan Rakyat;</li>\r\n	<li style=\"text-align:justify\">pengelolaan barang milik/kekayaan negara yang menjadi tanggung jawab Kementerian Pekerjaan Umum dan Perumahan Rakyat;</li>\r\n	<li style=\"text-align:justify\">pengawasan atas pelaksanaan tugas di lingkungan Kementerian Pekerjaan Umum dan Perumahan Rakyat;</li>\r\n        <li style=\"text-align:justify\">pelaksanaan bimbingan teknis dan supervisi atas pelaksanaan urusan Kementerian Pekerjaan Umum dan Perumahan Rakyat di daerah;</p>\r\n         <li style=\"text-align:justify\">pelaksanaan penyusunan kebijakan teknis dan strategi keterpaduan pengembangan infrastruktur pekerjaan umum dan perumahan rakyat;</p>\r\n         <li style=\"text-align:justify\">pelaksanaan penelitian dan pengembangan di bidang pekerjaan umum dan perumahan rakyat;</p>\r\n         <li style=\"text-align:justify\">pelaksanaan pengembangan sumber daya manusia di bidang pekerjaan umum dan perrrmahan rakyat;<p>\r\n         <li style=\"text-align:justify\">pelaksanaan dukungan yang bersifat substantif kepada seluruh unsur organisasi di lingkungan Kementerian Pekerjaan Umum dan Perumahan Rakyat; dan</P>\r\n         <li style=\"text-align:justify\">pelaksanaan fungsi lain yang diberikan oleh Presiden.</p>\r\n\r\n', 3, '2016-06-21 08:58:52', 0, 'Publish', 0),
(18, 'Struktur Organisasi', '<p>Struktur Organisasi</p>\r\n', '<p>Pimpinan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Fandhy Haudini, S.Kom</p>\r\n\r\n<p>Wakil&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Oden</p>\r\n\r\n<p>Kepala Bidang1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Toha</p>\r\n\r\n<p>Kepala Bidang2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Tolep</p>\r\n\r\n<p>Kepala Bidang3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Yakup</p>\r\n\r\n<p>Kasub Keuangan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Umi Kalsum</p>\r\n', 3, '2019-05-08 09:01:14', 0, 'Publish', 0),
(28, 'Program Kerja', '<p>Program Kerja Pengabdian</p>\r\n', '<p>Program Kerja Pengabdian</p>\r\n', 27, '2016-08-13 11:32:58', 0, 'Publish', 1),
(29, 'Program Kerja', '<p>Program Kerja PSGA</p>\r\n', '<p style=\"text-align: justify;\">Program dan Kegiatan PSGA Tahun 2014 dan 2015</p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\">Mengembangkan sumber daya manusia untuk mendukung visi dan misi Pusat Studi Gender dan Anak UIN Raden Fatah</li>\r\n	<li style=\"text-align: justify;\">Membentuk Sekolah Gender yang sumber daya manusianya adalah focal point pemerhati kajian Gender yang ada di UIN Raden Fatah</li>\r\n	<li style=\"text-align: justify;\">Menyelenggarakan Diskusi Ilmiah terstruktur dan terjadwal</li>\r\n	<li style=\"text-align: justify;\">Menyelenggarakan Komunikasi, Informasi dan Edukasi, Sosialisasi, Seminar dan Bintek Regional dan Nasional tentang gender dalam perspektif Islam</li>\r\n	<li style=\"text-align: justify;\">Melakukan penelitian mengenai masalah-masalah gender berkaitan dengan agama maupun masalah umum dalam perspektif Islam.</li>\r\n	<li style=\"text-align: justify;\">Membangun dan kerja sama dengan Instuisi lain yang mendukungprogram-program pemberdaya perempuan, anak yang berkeselarasaan gender</li>\r\n	<li style=\"text-align: justify;\">&nbsp;Menyebarkan hasil-hasil penelitian dan pengabdian masyarakat yang bernuansa kajian gender Islami melalui media elektronik dan non elektronik</li>\r\n	<li style=\"text-align: justify;\">Mensosialisasikan gender mainstreaming dalam berbagai kegiatan kampus</li>\r\n	<li style=\"text-align: justify;\">Mengembangkan kurikulum institut berspektif gender</li>\r\n	<li style=\"text-align: justify;\">Menerbitkan Jurnal An Nisa&rsquo;a setiap bulan Juni dan Desember</li>\r\n</ol>\r\n\r\n<p style=\"text-align: justify;\">Oleh karena itu, agenda kegiatan yang dilaksanakan oleh PSGA UIN Raden Fatah pada dasanya adalah proses pemberdayaan yang membutuhkan keterlibatan laki-laki dan perempuan, sebagaimana pembangunan itu sendiri dipandang sebagai agenda yang berpusat pada masyarakat, sehingga membutuhkan usaha dari kedua belah pihak (laki-laki dan perempuan).</p>\r\n', 26, '2016-08-13 11:38:03', 0, 'Publish', 3),
(31, 'Program Kerja', '<p>Program Kerja Penelitian</p>\r\n', '<p style=\"text-align:justify\"><strong>PROGRAM KERJA PENELITIAN</strong></p>\r\n\r\n<p style=\"text-align: justify;\">Sebagai bagian penting dari Tri Dharma Perguruan Tinggi, kedudukan Puslit sebagai pengelola penelitian di UIN menjadi sangat signifikasn. Apalagi semangat penelitian dari para dosen baik di lingkungan fakultas atau jurusan perlu mendapat wadah yang lebih beragam. Oleh karena itu, pada masa kepemimpinan Muhammad Isnaini, melalui SK Rektor tahun 2004, dibentuklah beberapa pusat kajian yaitu :</p>\r\n\r\n<ol>\r\n	<li>Pusat Kajian hukum Politik dan HAM</li>\r\n	<li>Pusat Kajian Keagamaan dan Masyarakat</li>\r\n	<li>Pusat Kajian Ekonomi dan Pemberdayaan Umat</li>\r\n	<li>Pusat Kajian Pendidikan Islam</li>\r\n	<li>Pusat Kajian Kependudukan dan Lingkungan Hidup</li>\r\n</ol>\r\n\r\n<p style=\"text-align: justify;\">Dalam plaksanaannya, peneliitan dan riset yang dilakukan oleh dosen-dosen di UIN Raden Fatah Palembang berjumlah sangat banyak dan terbagi dalam berbagai fokus persoalan. Selain itu juga, riset berbasis kemasyarakatan dan pengembangan metodologi serta pengayaan keilmuan terus dilakukan sampai hari ini. Paling tidak, dalam sepuluh ttahun terakhir ini, Puslit selalu memberikan bantuan penelitian kepada dosen prodi/jurusan baik dalam bentuk penelitian individual atau kelompok.</p>\r\n', 6, '2016-08-13 11:31:12', 0, 'Publish', 2),
(34, 'asaS', '<p>ASas</p>\r\n', '<p><a href=\"http://localhost/AplikasiLP2M/LP2M/elfinder/files/berita/Surat%20Pernytaan%20DPL.pdf\">AsAS</a></p>\r\n', 7, '2016-12-14 22:18:21', 0, 'Publish', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` bigint(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `isi` longtext NOT NULL,
  `tgl` date NOT NULL,
  `status` enum('Publish','UnPublish') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul`, `deskripsi`, `isi`, `tgl`, `status`) VALUES
(1, 'Besok Libur', '<p style=\"text-align:justify\">Libur-libur</p>\r\n', '<p>Hore Libur</p>\r\n', '2019-04-10', 'Publish'),
(3, 'Jalan-Jalan', '<p style=\"text-align:justify\">Jalan</p>\r\n', '<p style=\"text-align: justify;\">Jalan Besok Kemana</p>\r\n', '2019-04-10', 'Publish');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personalia`
--

CREATE TABLE `personalia` (
  `id_personalia` bigint(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `status` enum('Tidak Ada','Ada') NOT NULL,
  `tgl` datetime NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `personalia`
--

INSERT INTO `personalia` (`id_personalia`, `nama`, `nip`, `jabatan`, `status`, `tgl`, `foto`) VALUES
(1, 'Fandhy Haudini', '199604042019 2 003', 'Pimpinan', 'Ada', '2019-05-08 21:56:18', 'ipan.jpg'),
(2, 'Oden', 'NIP', 'Wakil Pimpinan', 'Tidak Ada', '2019-04-11 12:38:05', 'LOGO PU.jpg'),
(3, 'Toha', '567567', 'Kepala Bidang1', 'Ada', '2019-05-08 23:42:10', 'LOGO PU.jpg'),
(4, 'Tolep', '243566', 'Kepala Bidang2', 'Ada', '2019-04-10 07:56:36', 'LOGO PU.JPG'),
(5, 'Yakup', '234444', 'Kepada Bidang3', 'Ada', '2019-04-10 07:48:24', 'LOGO PU.JPG'),
(6, 'Umi Kalsum', '23444', 'Kasub Keuangan', 'Ada', '2019-04-11 07:44:08', 'LOGO PU.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shp`
--

CREATE TABLE `shp` (
  `id` int(11) NOT NULL,
  `nm_ruas` varchar(50) NOT NULL,
  `st_jalan` varchar(20) NOT NULL,
  `titik_peng` int(20) DEFAULT NULL,
  `titik_pe_1` varchar(100) DEFAULT NULL,
  `fungsi` text,
  `panjang` text,
  `lebar` text,
  `lb_kiri` int(20) DEFAULT NULL,
  `lb_kanan` int(20) DEFAULT NULL,
  `kelurahan` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `tipe_permu` text NOT NULL,
  `trotoar` text,
  `Drainase` text,
  `lhr` text NOT NULL,
  `akses_ke_j` text NOT NULL,
  `keterangan` text NOT NULL,
  `tahun` int(10) NOT NULL,
  `x_awal` int(30) NOT NULL,
  `x_akhir` int(30) NOT NULL,
  `y_awal` int(30) NOT NULL,
  `y_akhir` int(30) NOT NULL,
  `kd_join` int(10) NOT NULL,
  `n_ruas` int(10) NOT NULL,
  `kd_jalan` varchar(20) DEFAULT NULL,
  `file` text NOT NULL,
  `foto1` text NOT NULL,
  `foto2` text NOT NULL,
  `fotoSHP` text NOT NULL,
  `P_RUAS` varchar(50) DEFAULT NULL,
  `P_SURV` varchar(50) DEFAULT NULL,
  `L_JALAN` varchar(10) DEFAULT NULL,
  `LB_BAHU` varchar(10) DEFAULT NULL,
  `P_ASPAL_KM` varchar(50) DEFAULT NULL,
  `Kondisi_persen` decimal(2,0) DEFAULT NULL,
  `P_RIGID` varchar(20) DEFAULT NULL,
  `P_KON_BAIK` varchar(20) DEFAULT NULL,
  `P_KON_SED` varchar(20) DEFAULT NULL,
  `P_KON_RR` varchar(20) DEFAULT NULL,
  `P_KON_RB` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `shp`
--

INSERT INTO `shp` (`id`, `nm_ruas`, `st_jalan`, `titik_peng`, `titik_pe_1`, `fungsi`, `panjang`, `lebar`, `lb_kiri`, `lb_kanan`, `kelurahan`, `kecamatan`, `tipe_permu`, `trotoar`, `Drainase`, `lhr`, `akses_ke_j`, `keterangan`, `tahun`, `x_awal`, `x_akhir`, `y_awal`, `y_akhir`, `kd_join`, `n_ruas`, `kd_jalan`, `file`, `foto1`, `foto2`, `fotoSHP`, `P_RUAS`, `P_SURV`, `L_JALAN`, `LB_BAHU`, `P_ASPAL_KM`, `Kondisi_persen`, `P_RIGID`, `P_KON_BAIK`, `P_KON_SED`, `P_KON_RR`, `P_KON_RB`) VALUES
(1, 'Jl. Ketitiran 6', 'Kota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aspal', NULL, NULL, 'Rendah', 'K', '', 2008, 261801, 9635065, 9634987, 1074, 0, 0, '', '', '', '', '', '140.621642616', '', '2.5', '0.7', '', '0', 'Baik', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slide`
--

CREATE TABLE `slide` (
  `id_slide` bigint(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `isi` longtext NOT NULL,
  `img` text NOT NULL,
  `tgl` datetime NOT NULL,
  `status` enum('Publish','UnPublish') NOT NULL,
  `orders` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `slide`
--

INSERT INTO `slide` (`id_slide`, `judul`, `deskripsi`, `isi`, `img`, `tgl`, `status`, `orders`) VALUES
(67, 'tes', '<p>tes</p>', 'tes', 'app/pengabdian/berita/foto/20190619_5d0a4a7c5e587_webgis (2).JPG', '2019-06-19 07:45:00', 'Publish', 0),
(68, 'web', '', 'tes', 'app/pengabdian/berita/foto/20190619_5d0a4d515f2cc_slide.png', '2019-06-01 10:10:00', 'Publish', 0),
(70, 'web gis', '<p>Webgis Lubuklinggau...&nbsp;</p>\r\n', '<p>sfdsgfgfgdgdgdgdg</p>\r\n', 'app/pengabdian/berita/foto/20190619_5d0a56405be95_Kantor_Lurah_Sukajadi_1.JPG', '2019-06-19 09:09:09', 'Publish', 0),
(71, 'GIS', '<p>WebGIS linggau</p>\r\n', '<p>hahahahaha</p>\r\n', 'app/pengabdian/berita/foto/20190630_5d18815aa989e_Untitled.png', '1970-01-01 00:00:00', 'Publish', 0),
(72, 'gis', '<p>gissss</p>\r\n', '<p style=\"text-align: center;\">,nnnnnnnnnnnnnnnnnnnn</p>\r\n\r\n<p style=\"text-align: center;\">djjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj</p>\r\n\r\n<p style=\"text-align: center;\">ssssssssssss</p>\r\n', 'app/pengabdian/berita/foto/20190726_5d3b12633aa11_background-islami-maulid-nabi-8.jpg', '2019-07-16 23:02:00', 'Publish', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` bigint(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `id_login` int(11) NOT NULL,
  `waktu_registrasi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `role`, `id_login`, `waktu_registrasi`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', 'admin', 1, '2017-07-27 12:44:48'),
(2, 'pimpinan', '90973652b88fe07d05a4304f0a945de8', '', 'admin', 1, '2017-07-27 12:44:44'),
(35, 'fandhy', '9a9c29cdefefb60d36406ed99e700346', '', 'user', 1, '2017-07-27 12:44:36'),
(36, 'saipul', '0df98fedfb246b51562ba130fc39b376', '', 'user', 1, '2017-07-27 12:43:32'),
(42, 'syefriyeni', '953a1ff639d01db37327405d6781cbae', '', 'user', 0, '0000-00-00 00:00:00'),
(43, 'iwan', '01ccce480c60fcdb67b54f4509ffdb56', '', 'user', 0, '0000-00-00 00:00:00'),
(45, 'erin', '5f5be3890fa875bfe8fa797b4ba6a397', '', 'user', 0, '0000-00-00 00:00:00'),
(46, 'indra', 'ccda1683d8c97f8f2dff2ea7d649b42c', 'email@gmail.com', 'user', 0, '2019-05-30 23:31:41'),
(47, 'indra', 'e24f6e3ce19ee0728ff1c443e4ff488d', 'gensbookcities@gmail.com', 'user', 0, '2019-06-01 05:54:12'),
(49, 'tes', '28b662d883b6d76fd96e4ddc5e9ba780', 'tes@gmail.com', 'user', 0, '2019-06-18 01:15:23');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indeks untuk tabel `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`id_galery`);

--
-- Indeks untuk tabel `jembatan`
--
ALTER TABLE `jembatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id_page`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indeks untuk tabel `personalia`
--
ALTER TABLE `personalia`
  ADD PRIMARY KEY (`id_personalia`);

--
-- Indeks untuk tabel `shp`
--
ALTER TABLE `shp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `galery`
--
ALTER TABLE `galery`
  MODIFY `id_galery` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `jembatan`
--
ALTER TABLE `jembatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT untuk tabel `page`
--
ALTER TABLE `page`
  MODIFY `id_page` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `personalia`
--
ALTER TABLE `personalia`
  MODIFY `id_personalia` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `shp`
--
ALTER TABLE `shp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

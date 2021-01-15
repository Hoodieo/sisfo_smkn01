-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 02, 2021 at 05:24 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sk_sisfosmkn01`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id_guru` int(4) NOT NULL,
  `nama_guru` varchar(80) NOT NULL,
  `kode_guru` int(5) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tmp_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `pendidikan_akhir` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_guru`
--

INSERT INTO `tbl_guru` (`id_guru`, `nama_guru`, `kode_guru`, `nip`, `jenis_kelamin`, `tmp_lahir`, `tgl_lahir`, `pendidikan_akhir`) VALUES
(1201, 'Yan, S.P', '1', '19731015 200212 1 003', 'L', 'Kebombang', '1973-10-15', 'S1'),
(1202, 'Florentina, S.Ag', '2', '', 'P', 'Senyabang', '1998-02-20', 'S1'),
(1203, 'Sugiarto, Dip. Th', '3', '', 'L', 'Semangkar', '1978-08-18', 'DIII'),
(1204, 'Yulia, S.Pd.i', '4', '', 'P', 'Batang Tarang', '1985-07-16', 'S1'),
(1205, 'Yuniarti, S.Pd', '5', '19830803 200902 2 006', 'P', 'Batang tarang', '1983-08-03', 'S1'),
(1206, 'Fatimah Irdayani, S.Pd', '6', '19851002 200902 2 010', 'P', 'Sanggau', '1985-10-02', 'S1'),
(1207, 'Febriyanti Pakpahan, S.Pd', '7', NULL, 'P', 'Pontianak', '1990-02-25', 'S1'),
(1208, 'Martina Lena , S.Pd', '8', NULL, 'P', 'Senyabang', '1992-02-15', 'S1'),
(1209, 'Sriwahyuni, S.Pd', '9', NULL, 'P', 'Batang Tarang', '1989-06-15', 'S1'),
(1210, 'Fran Safer, S.Pd, M.Pd', '10', '19830912 200902 1 006', 'L', 'Calong', '1983-09-12', 'S2'),
(1211, 'Rosi Rosdiana, S.P.d', '11', '19850824 200902 2 007', 'P', 'Pontianak', '1985-08-24', 'S1'),
(1212, 'Cherry Julianto, S.Pd', '12', NULL, 'L', 'Singkawang', '1990-06-24', 'S1'),
(1213, 'Simon Sukarman, S.Pd', '13', '19790320 200604 1 006', 'L', 'Calong', '1979-03-20', 'S1'),
(1214, 'Kornelis RUba, S.P', '14', '19781115 200902 1 004', 'L', 'Loka Lodo', '1978-11-15', 'S1'),
(1215, 'Nurul Huda, S.P', '15', '19920219 201902 2 005', 'P', 'Sambas', '1992-02-19', 'S1'),
(1216, 'Martina Toya, S.Pd', '16', NULL, 'P', 'Anggan Limau', '1991-04-04', 'S1'),
(1217, 'Kuntoro Pratama Nusantara, S.Pd', '17', NULL, 'L', 'Makdadong', '1992-03-23', 'S1'),
(1218, 'Restu Karmela, S.Pd', '18', NULL, 'P', 'Makkawing', '1992-06-28', 'S1'),
(1219, 'Nuning Apriliya, S.Pd', '19', NULL, 'P', 'Jombang', '1993-04-21', 'S1'),
(1220, 'Theodora Novianti, S.E', '20', NULL, 'P', 'Entakai', '1995-12-27', 'S1'),
(1221, 'Eliana, S.Pd', '21', NULL, 'P', 'Kota Baru', '1990-04-14', 'S1'),
(1222, 'Emelia Neni Kusumawardani, S.E', '22', '19780909 200701 2 025', 'P', 'Sosok', '1978-09-09', 'S1'),
(1223, 'Elisabeth Erna, S.E', '23', NULL, 'P', 'Empirang Pokok', '1981-09-25', 'S1'),
(1224, 'Maulana, S.Pd', '24', '19911002 201902 1 001', 'L', 'Pontianak', '1991-10-02', 'S1'),
(1225, 'Agustin Efriyanti, S.Pd', '25', NULL, 'P', 'Batang tarang', '1978-08-01', 'S1'),
(1226, 'Ruben Gideon, S.Pd', '26', NULL, 'L', 'Tebang Benua', '1991-04-18', 'S1'),
(1227, 'Paulus Jaman, A.Md', '27', NULL, 'L', 'Keranjik', '1993-10-23', 'DIII'),
(1228, 'Kristiani, S.Kom', '28', NULL, 'P', 'Muyak', '1994-03-09', 'S1'),
(1229, 'Yusta Erliani, S.Pd', '29', '', 'P', 'Sekantot', '1995-05-17', 'S1'),
(1230, 'Raffi Debira Djinimangale, S.E', '30', NULL, 'P', 'Serukam', '1992-10-10', 'S1'),
(1231, 'Dehijah Srianti, A.Md', NULL, NULL, 'P', 'Batang Tarang', '1989-10-01', 'DII'),
(1232, 'Herman', NULL, NULL, 'L', 'Palembang', '1968-11-11', 'STM'),
(1233, 'Maksi Milianus Rampas', NULL, NULL, 'L', 'Floren NTT', '1978-10-12', 'SMP'),
(1234, 'Raden Heri Kurniawan', NULL, NULL, 'L', 'Batang Tarang', '1987-05-16', 'SMA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(4) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `jenjang` varchar(10) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `id_guru` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `jurusan`, `jenjang`, `kelas`, `id_guru`) VALUES
(1, 'TKJ', 'X', '1', 1202),
(2, 'TKJ', 'XI', '2', 1203);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id_mapel` int(4) NOT NULL,
  `kode_mapel` varchar(10) NOT NULL,
  `mata_pelajaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`id_mapel`, `kode_mapel`, `mata_pelajaran`) VALUES
(1, 'KIMIA', 'Kimia'),
(2, 'KJD', 'Komputer Dan Jaringan Dasar'),
(3, 'PD', 'Pemrograman Dasar'),
(4, 'SEJARAH', 'Sejarah Indonesia'),
(5, 'SB', 'Seni Budaya'),
(6, 'SKD', 'Simulasi Dan Komunikasi Digital'),
(7, 'SISKOM', 'Sistem Komputer'),
(8, 'BING', 'Bahasa Inggris'),
(9, 'MTK', 'Matematika'),
(10, 'AGM', 'Pendidikan Agama'),
(11, 'PJOK', 'Pendidikan Jasmani, Olahraga Dan Kesehatan'),
(12, 'PKN', 'Pendidikan Pancasila Dan Kewarganegaraan'),
(13, 'BP-BK', 'Budi Pekerti'),
(14, 'AIJ', 'Administrasi Infrastuktur Jaringan'),
(15, 'ASJ', 'Administrasi Sistem Jaringan'),
(16, 'BIND', 'Bahasa Indonesia'),
(17, 'DDG', 'Dasar Desain Grafis'),
(18, 'FISIKA', 'Fisika'),
(19, 'PPKK', 'Produk Kreatif Dan Kewirausahaan'),
(20, 'TJBLWAN', 'Teknologi Jaringan Berbasis Luas'),
(21, 'TLJ', 'Teknologi Layanan Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int(4) NOT NULL,
  `nis` varchar(5) NOT NULL,
  `nilai_harian` int(4) NOT NULL DEFAULT 0,
  `uts` int(4) NOT NULL DEFAULT 0,
  `uas` int(4) NOT NULL DEFAULT 0,
  `keterampilan` int(4) NOT NULL DEFAULT 0,
  `semester` varchar(10) NOT NULL,
  `tahun_ajar` varchar(10) NOT NULL,
  `kode_mapel` varchar(10) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `status` varchar(20) DEFAULT 'belum diverifikasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `nis`, `nilai_harian`, `uts`, `uas`, `keterampilan`, `semester`, `tahun_ajar`, `kode_mapel`, `id_kelas`, `status`) VALUES
(2, '700', 73, 10, 78, 82, 'ganjil', '2019/2020', 'PKN', 2, 'belum diverifikasi'),
(3, '703', 80, 63, 92, 23, 'ganjil', '2019/2020', 'PKN', 2, 'telah diverifikasi'),
(4, '707', 46, 55, 40, 10, 'ganjil', '2019/2020', 'PKN', 2, 'telah diverifikasi'),
(5, '708', 55, 79, 93, 99, 'ganjil', '2019/2020', 'PKN', 2, 'telah diverifikasi'),
(6, '708', 50, 70, 80, 70, 'ganjil', '2019/2020', 'AGM', 2, 'telah diverifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajar_mapel`
--

CREATE TABLE `tbl_pengajar_mapel` (
  `id_pengajar_mapel` int(4) NOT NULL,
  `id_kelas` int(4) NOT NULL,
  `id_mapel` int(4) NOT NULL,
  `id_guru` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengajar_mapel`
--

INSERT INTO `tbl_pengajar_mapel` (`id_pengajar_mapel`, `id_kelas`, `id_mapel`, `id_guru`) VALUES
(1, 1, 1, 1218),
(2, 1, 2, 1219),
(3, 1, 3, 1229),
(4, 1, 4, 1209),
(5, 1, 5, 1225),
(6, 1, 6, 1209),
(7, 1, 7, 1229),
(8, 1, 8, 1211),
(9, 1, 9, 1206),
(10, 1, 10, 1203),
(11, 1, 11, 1212),
(12, 1, 12, 1205),
(13, 1, 13, 1213),
(14, 1, 10, 1228),
(15, 2, 8, 1210),
(16, 2, 9, 1203),
(17, 2, 10, 1204),
(18, 2, 11, 1212),
(19, 2, 12, 1205),
(20, 2, 13, 1206),
(21, 2, 14, 1226),
(22, 2, 15, 1227),
(23, 2, 16, 1206),
(24, 2, 17, 1229),
(25, 2, 18, 1218),
(26, 2, 19, 1225),
(27, 2, 20, 1224),
(28, 2, 21, 1226),
(29, 2, 10, 1202);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id` int(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id`, `username`, `password`, `status`) VALUES
(1200, 'admin', 'admin', 'admin'),
(1201, '1201', '12345', 'kepala sekolah'),
(1202, '1202', '12345', 'Wali Kelas'),
(1203, '1203', '12345', 'Wali Kelas'),
(1204, '1204', '12345', 'admin'),
(1205, '1205', '12345', 'guru mapel'),
(1206, '1206', '12345', 'guru mapel'),
(1207, '1207', '12345', 'guru mapel'),
(1208, '1208', '12345', 'guru mapel'),
(1209, '1209', '12345', 'guru mapel'),
(1210, '1210', '12345', 'guru mapel'),
(1211, '1211', '12345', 'guru mapel'),
(1212, '1212', '12345', 'guru mapel'),
(1213, '1213', '12345', 'guru mapel'),
(1214, '1214', '12345', 'guru mapel'),
(1215, '1215', '12345', 'guru mapel'),
(1216, '1216', '12345', 'guru mapel'),
(1217, '1217', '12345', 'guru mapel'),
(1218, '1218', '12345', 'guru mapel'),
(1219, '1219', '12345', 'guru mapel'),
(1220, '1220', '12345', 'guru mapel'),
(1221, '1221', '12345', 'guru mapel'),
(1222, '1222', '12345', 'guru mapel'),
(1223, '1223', '12345', 'guru mapel'),
(1224, '1224', '12345', 'guru mapel'),
(1225, '1225', '12345', 'guru mapel'),
(1226, '1226', '12345', 'guru mapel'),
(1227, '1227', '12345', 'guru mapel'),
(1228, '1228', '12345', 'guru mapel'),
(1229, '1229', '12345', 'guru mapel'),
(1230, '1230', '12345', 'guru mapel'),
(1231, '1231', '12345', 'guru mapel'),
(1232, '1232', '12345', 'guru mapel'),
(1233, '1233', '12345', 'guru mapel'),
(1234, '1234', '12345', 'guru mapel'),
(4001, '4001', '12345', 'siswa'),
(4002, '4002', '12345', 'siswa'),
(4003, '4003', '12345', 'siswa'),
(4004, '4004', '12345', 'siswa'),
(4005, '4005', '12345', 'siswa'),
(4006, '4006', '12345', 'siswa'),
(4007, '4007', '12345', 'siswa'),
(4008, '4008', '12345', 'siswa'),
(4009, '4009', '12345', 'siswa'),
(4010, '4010', '12345', 'siswa'),
(4011, '4011', '12345', 'siswa'),
(4012, '4012', '12345', 'siswa'),
(4013, '4013', '12345', 'siswa'),
(4014, '4014', '12345', 'siswa'),
(4015, '4015', '12345', 'siswa'),
(4016, '4016', '12345', 'siswa'),
(4017, '4017', '12345', 'siswa'),
(4018, '4018', '12345', 'siswa'),
(4019, '4019', '12345', 'siswa'),
(4020, '4020', '12345', 'siswa'),
(4021, '4021', '12345', 'siswa'),
(4022, '4022', '12345', 'siswa'),
(4023, '4023', '12345', 'siswa'),
(4024, '4024', '12345', 'siswa'),
(4025, '4025', '12345', 'siswa'),
(4026, '4026', '12345', 'siswa'),
(4027, '4027', '12345', 'siswa'),
(4028, '4028', '12345', 'siswa'),
(4029, '4029', '12345', 'siswa'),
(4030, '4030', '12345', 'siswa'),
(4031, '4031', '12345', 'siswa'),
(4032, '4032', '12345', 'siswa'),
(4035, '4035', '12345', 'siswa'),
(4036, '4036', '12345', 'siswa'),
(4037, '4037', '12345', 'siswa'),
(4038, '4038', '12345', 'siswa'),
(4039, '4039', '12345', 'siswa'),
(4040, '4040', '12345', 'siswa'),
(4041, '4041', '12345', 'siswa'),
(4042, '4042', '12345', 'siswa'),
(4043, '4043', '12345', 'siswa'),
(4044, '4044', '12345', 'siswa'),
(4045, '4045', '12345', 'siswa'),
(4046, '4046', '12345', 'siswa'),
(4047, '4047', '12345', 'siswa'),
(4048, '4048', '12345', 'siswa'),
(4049, '4049', '12345', 'siswa'),
(4050, '4050', '12345', 'siswa'),
(4051, '4051', '12345', 'siswa'),
(4052, '4052', '12345', 'siswa'),
(4053, '4053', '12345', 'siswa'),
(4054, '4054', '12345', 'siswa'),
(4055, '4055', '12345', 'siswa'),
(4056, '4056', '12345', 'siswa'),
(4057, '4057', '12345', 'siswa'),
(4058, '4058', '12345', 'siswa'),
(4059, '4059', '12345', 'siswa'),
(4060, '4060', '12345', 'siswa'),
(4061, '4061', '12345', 'siswa'),
(4062, '4062', '12345', 'siswa'),
(4063, '4063', '12345', 'siswa'),
(4064, '4064', '12345', 'siswa'),
(4065, '4065', '12345', 'siswa'),
(4066, '4066', '12345', 'siswa'),
(4067, '4067', '12345', 'siswa'),
(4068, '4068', '12345', 'siswa'),
(4069, '4069', '12345', 'siswa'),
(4070, '4070', '12345', 'siswa'),
(5832, 'yan,_s.p', '12345', 'kepala sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(4) NOT NULL,
  `nama_siswa` varchar(80) NOT NULL,
  `nis` varchar(5) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `tmp_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `agama` varchar(20) NOT NULL,
  `nama_ortu` varchar(80) NOT NULL,
  `id_kelas` int(4) NOT NULL,
  `keterangan` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nama_siswa`, `nis`, `nisn`, `tmp_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `nama_ortu`, `id_kelas`, `keterangan`) VALUES
(4001, 'Adi Suryadi', '700', '35371852', 'Sanggau', '2003-05-06', '', 'Katolik', 'Anwar Afo', 2, ''),
(4002, 'Alexander', '701', '35372180', 'Senyabang', '2003-04-14', '', 'Katolik', 'Rudis', 2, NULL),
(4003, 'Ance Anjelina Salukh', '702', '28373747', 'Batang Tarang', '2002-10-11', NULL, 'Protestan', 'Simson Salukh', 2, NULL),
(4004, 'Andresius Afen', '703', '28373988', 'Makawing', '2002-07-22', NULL, 'Katolik', 'Siongku', 2, NULL),
(4005, 'Anonia Eka Saputri', '704', '34057214', 'Semoncol', '2004-07-25', NULL, 'Protestan', 'Abet Nego', 2, NULL),
(4006, 'Apolonius Welly', '705', '3920629', 'Munggu Ketobong', '2000-12-17', NULL, 'Protestan', 'Suryono Lodeng', 2, NULL),
(4007, 'Ardianus Rendi', '706', '11022180', 'Sejotang', '2001-07-08', NULL, 'Katolik', 'Paulus Atut', 2, NULL),
(4008, 'Asan', '707', '28373806', 'Batang Tarang', '2002-08-31', NULL, 'Protestan', 'Sumanto', 2, NULL),
(4009, 'Asia Aling', '708', '21285698', 'Kelabang', '2001-11-17', NULL, 'Protestan', 'Suani', 2, NULL),
(4010, 'Desi Putri Tampubolon', '709', '15172407', 'Sanggau', '2001-12-08', NULL, 'Protestan', 'Saut Manggara Tampubolon', 2, NULL),
(4011, 'Elfien', '710', '35372313', 'Sungai Asam', '2003-02-12', NULL, 'Katolik', 'Chang Syak Cin', 2, NULL),
(4012, 'Elsa', '711', '28374073', 'Benua', '2002-10-08', NULL, 'Protestan', 'Acung', 2, NULL),
(4013, 'Erma Melati', '712', '28374070', 'Benua', '2002-06-03', NULL, 'Protestan', 'Rupinus', 2, NULL),
(4014, 'Evi Vania', '713', '35372161', 'Perupuk', '2003-02-28', NULL, 'Katolik', 'Ateng', 2, NULL),
(4015, 'Fraulina Maria', '714', '38778476', 'Tebang Benua', '2003-11-30', NULL, 'Protestan', 'Minto', 2, NULL),
(4016, 'Herdian Holio Hardi', '715', '16684697', 'Lingga', '2001-03-02', NULL, 'Katolik', 'Kardius Akueng', 2, NULL),
(4017, 'Irna Sinulingga', '716', '34057215', 'Sei Tawa', '2003-09-19', NULL, 'Protestann', 'Langgker', 2, NULL),
(4018, 'Isna Wati', '717', '28374072', 'Benua', '2002-10-08', NULL, 'Protestan', 'Acung', 2, NULL),
(4019, 'Junita Sari', '718', '20791889', 'Tebang Benua', '2002-09-13', NULL, 'Protestan', 'Petrus Aini', 2, NULL),
(4020, 'Lidya Imelua Vega', '719', '35372015', 'Tamang', '2004-03-15', NULL, 'Protestan', 'Ir Stefanus.T.H', 2, NULL),
(4021, 'Uung', '720', '28373943', 'Keresep', '2003-10-30', NULL, 'Protestan', 'Kionglin', 2, NULL),
(4022, 'Linda', '721', '2428821', 'Rapun', '2000-03-10', NULL, 'Protestan', 'Liha', 2, NULL),
(4023, 'Milda Sriyati', '722', '17806081', 'Bayat', '2001-05-04', NULL, 'Protestan', 'Rudi', 2, NULL),
(4024, 'Nadila Olivia', '723', '38778465', 'Tebang Benua', '2003-06-06', NULL, 'Protestann', 'Sol Lupri', 2, NULL),
(4025, 'Paulus Roni Dwinarto', '724', '35372341', 'Empirang Ujung', '2003-11-19', NULL, 'Katolik', 'Ponsianus B', 2, NULL),
(4026, 'Piter Pan', '725', '35372370', 'Sungai Kelik', '2003-08-13', NULL, 'Protestan', 'Kornellus Ampong', 2, NULL),
(4027, 'Rico Gustavo', '726', '14851820', 'Semontol', '2001-03-21', NULL, 'Protestan', 'Elpianus Pandi', 2, NULL),
(4028, 'Seli Oktaviani', '727', '28373858', 'Temlang Taba', '2003-06-29', NULL, 'Protestan', 'Amengslus', 2, NULL),
(4029, 'Steven Rik', '728', '28373725', 'Pontianak', '2002-05-29', NULL, 'Katolik', 'Yunnal', 2, NULL),
(4030, 'Veronika Pela', '729', '19973139', 'Remba Jelindung', '2001-04-19', NULL, 'Katolik', 'Damianus Iran', 2, NULL),
(4031, 'Yuuta Apriyanti', '730', '4965252', 'Tebang Benua', '2002-09-14', NULL, 'Protestan', 'Bobianto Unyil', 2, NULL),
(4032, 'Yuvensius Prayogo Pangestuu', '731', '31330640', 'Batang Tarang', '2003-02-23', NULL, 'Katolik', 'Jan Min', 2, NULL),
(4035, 'Alan', '899', '7081227', 'Telabang', '2000-12-26', NULL, 'Katolik', 'Deron', 1, NULL),
(4036, 'Aldinata Retnas', '900', '41197552', 'Rujek', '2004-05-20', NULL, 'Katolik', 'Paulus Sumadi', 1, NULL),
(4037, 'Anggela Intan', '901', '49869040', 'Telabang', '2004-08-22', NULL, 'Katolik', 'Delly', 1, NULL),
(4038, 'Bendi Marseli', '902', '42730681', 'Sei Temborang', '2004-03-20', NULL, 'Katolik', 'Yakobus Ohay', 1, NULL),
(4039, 'Beti', '903', '17883226', 'Senyabang', '2002-01-23', NULL, 'Katolik', 'Mateus Matoh', 1, NULL),
(4040, 'Debbi Indrayani', '904', '28370003', 'Seribot', '2002-12-12', NULL, 'Katolik', 'Abu Bakar', 1, NULL),
(4041, 'Dionisiuss Ardi', '905', '40096450', 'Embangai', '2004-01-23', NULL, 'Katolik', 'Hardianus Acol', 1, NULL),
(4042, 'Elfa Joy', '906', '41009206', 'Lumut', '2004-07-02', NULL, 'Katolik', 'Anus', 1, NULL),
(4043, 'Eltiza Trimurni', '907', '33696949', 'Ensibau', '2003-02-24', NULL, 'Katolik', 'Anselmus Edy', 1, NULL),
(4044, 'Erina Erinn', '908', '22469225', 'Angan Limau', '2002-05-09', NULL, 'Katolik', 'H.Piyun Nadi', 1, NULL),
(4045, 'Eronimus', '909', '13810455', 'Keraci', '2001-04-03', NULL, 'Katolik', 'Anggelius Sudin', 1, NULL),
(4046, 'Florensius Sutio', '910', '20980896', 'Ambung Batu', '2002-09-09', NULL, 'Katolik', 'Stepanus', 1, NULL),
(4047, 'Fransiska', '911', '46017061', 'Parindu', '2004-07-15', NULL, 'Katolik', 'Bodol', 1, NULL),
(4048, 'Fransiskus Indra', '912', '40734651', 'Kebadu', '2004-02-12', NULL, 'Katolik', 'Martinus Salim', 1, NULL),
(4049, 'Gregorius Margun', '913', '41197511', 'Sebual', '2004-03-25', NULL, 'Katolik', 'Kaem', 1, NULL),
(4050, 'Herlina Sumiaty', '914', '34983123', 'Natal', '2003-04-02', NULL, 'Katolik', 'Martinus Natu', 1, NULL),
(4051, 'Inul Ria', '915', '30956571', 'Laman Tongon', '2003-09-21', NULL, 'Katolik', 'Alosius Bisan', 1, NULL),
(4052, 'Jesika Devi', '916', '35372178', '|Sei Adung', '2003-03-23', NULL, 'Katolik', 'Susanto', 1, NULL),
(4053, 'Karan', '917', '33468396', 'Mungguk Naning', '2003-12-02', NULL, 'Katolik', 'Onggo', 1, NULL),
(4054, 'Kasianus Erik', '918', '35372112', 'Syam', '2003-04-12', NULL, 'Katolik', 'Nicolaus Apun', 1, NULL),
(4055, 'Katarina Vegawati', '919', '41271345', 'Pelipit', '2004-04-23', NULL, 'Katolik', 'Tell', 1, NULL),
(4056, 'Magdalena Siliana', '920', '41197575', 'Syam', '2004-09-18', NULL, 'Katolik', 'Marianus Gaya', 1, NULL),
(4057, 'Maya Fetir Yanti', '921', '41197626', '| Semunsur', '2004-05-12', NULL, 'Katolik', 'Degel', 1, NULL),
(4058, 'Nabila Nurul Jannah', '922', '47512008', 'Jungkat', '2004-07-19', NULL, 'Katolik', 'Mansyur', 1, NULL),
(4059, 'Nataua', '923', '18459379', 'Sebandang', '2002-12-25', NULL, 'Katolik', 'Yohanes Anes', 1, NULL),
(4060, 'Neviani', '924', '41382869', 'Pontlanak', '2004-02-15', NULL, 'Katolik', 'Thjie Mung Klang', 1, NULL),
(4061, 'Oktaviano Feliks', '925', '41197704', 'Batang Tarang', '2004-10-02', NULL, 'Katolik', 'Hardiman', 1, NULL),
(4062, 'Oktavianus Feux', '926', '32222422', 'Pontianak', '2003-10-31', NULL, 'Katolik', 'Tiloy', 1, NULL),
(4063, 'Paulina Supratma', '927', '33302431', 'Bungkang', '2003-06-06', NULL, 'Katolik', 'Ry, Marno', 1, NULL),
(4064, 'Pranata Suganda', '928', '37746887', 'Calong', '2003-06-04', NULL, 'Katolik', 'Agus', 1, NULL),
(4065, 'Pransiskus Doni', '929', '35372004', 'Sebual', '2002-07-21', NULL, 'Katolik', 'Asu', 1, NULL),
(4066, 'Regina Rosita Acing', '930', '35495714', 'Jang', '2003-02-07', NULL, 'Katolik', 'Yanto', 1, NULL),
(4067, 'Santilia', '931', '36268423', 'Sosok', '2003-06-10', NULL, 'Katolik', 'Sudardin', 1, NULL),
(4068, 'Selomita Zwi', '932', '41497463', 'Mak Uing', '2004-02-27', NULL, 'Katolik', 'Petrus Tempel', 1, NULL),
(4069, 'Tri Gustina Lestari', '933', '35036167', 'Nekgajah', '2003-08-27', NULL, 'Katolik', 'Martinus Idey', 1, NULL),
(4070, 'Urbanus Diki Sanusi', '934', '35372395', 'Biyu', '2003-12-17', NULL, 'Katolik', 'Antonius Ahuy', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `fk_Idkelas_guru` (`id_guru`);
--
-- Indexes for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `fk_Idnilai_kelas` (`id_kelas`);
--
-- Indexes for table `tbl_pengajar_mapel`
--
ALTER TABLE `tbl_pengajar_mapel`
  ADD PRIMARY KEY (`id_pengajar_mapel`),
  ADD KEY `fk_Idpengajarmapel_kelas` (`id_kelas`),
  ADD KEY `fk_Idpengajarmapel_mapel` (`id_mapel`),
  ADD KEY `fk_Idpengajarmapel_guru` (`id_guru`);
--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `fk_Idsiswa_kelas` (`id_kelas`);
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1235;

--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_pengajar_mapel`
--
ALTER TABLE `tbl_pengajar_mapel`
  MODIFY `id_pengajar_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5833;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4071;

ALTER TABLE `tbl_kelas`
  ADD CONSTRAINT `fk_Idkelas_guru` FOREIGN KEY (`id_guru`) REFERENCES `tbl_guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `tbl_nilai`
  ADD CONSTRAINT `fk_Idnilai_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `tbl_siswa`
  ADD CONSTRAINT `fk_Idsiswa_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `tbl_pengajar_mapel`
  ADD CONSTRAINT `fk_Idpengajarmapel_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Idpengajarmapel_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Idpengajarmapel_guru` FOREIGN KEY (`id_guru`) REFERENCES `tbl_guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

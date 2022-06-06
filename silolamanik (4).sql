-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2020 at 08:28 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `silolamanik`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` date NOT NULL,
  `end_event` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `institusi`
--

CREATE TABLE `institusi` (
  `institusi_id` int(11) NOT NULL,
  `institusi_nama` varchar(255) NOT NULL,
  `institusi_no_akreditasi` varchar(255) NOT NULL,
  `institusi_tahun_akreditasi` varchar(255) NOT NULL,
  `institusi_status` varchar(255) NOT NULL,
  `institusi_alamat` varchar(255) NOT NULL,
  `institusi_telepon` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `tanggal_mou` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institusi`
--

INSERT INTO `institusi` (`institusi_id`, `institusi_nama`, `institusi_no_akreditasi`, `institusi_tahun_akreditasi`, `institusi_status`, `institusi_alamat`, `institusi_telepon`, `role_id`, `tanggal_mou`, `email`) VALUES
(3, 'D 3 RMIK STIKes Dharma Landbouw Padang', '84/SK.BAN-PT/Akred/PT/IV/2018', '2018', 'Akreditasi B', 'Jl. Jhoni Anwar No.29, Ulak Karang Utara, Kec. Padang Utara, Kota Padang, Sumatera Barat', '0751 - 7055462', 3, '0', ''),
(4, 'D 3 Keperawatan Akper Baiturrahmah Padang', '0027/LAM-PTKes/Akr/Dip/I/2017', '2017', 'Akreditasi B', 'Aie Pacah, Kec. Koto Tangah, Kota Padang, Sumatera Barat', ' (0751) 463058', 3, '0', ''),
(5, 'S 1 Farmasi Sekolah Tinggi Ilmu Farmasi (STIFarm) Padang', '0380/LAM-PTKes/Akr/Sar/VII/2019', '2019', 'Akreditasi B', 'Jl. Kurao Pagang, Dalam, Kec. Nanggalo, Kota Padang, Sumatera Barat 25147', '(0751) 444344', 0, '0', ''),
(6, 'S 1 Keperawatan STIKes YPAK Padang', '0551/LAM-PTKes/Akr/Sar/VIII/2018', '2018', 'Akreditasi B', 'Jl. S. Parman No. 120, Lolong Belanti, Kec. PadangUtara, Kota Padang Sumbar', ' (0751) 40789', 0, '0', ''),
(7, 'S 1 Psikologi Fakultas PsikologI UPI \"YPTK\" Padang', '502/SK/BAN-PT/Akred/S/V/2015', '2015', 'Akreditasi B', 'Jl. Raya Lubuk Begalung, Lubuk Begalung Nan XX, Kec. Lubuk Begalung, Kota Padang, Sumatera Barat', '(0751) 776666', 0, '0', ''),
(8, 'D 3 Keperawatan STIKes Mercubaktijaya Padang ', '1474/SK/BAN-PT/Akred/PT/V/2017', '2017', 'Akreditasi B', 'Surau Gadang, Kec. Nanggalo, Kota Padang, Sumatera Barat', '(0751) 442295', 0, '0', ''),
(9, 'S 1 Keperawatan STIKes Mercubaktijaya Padang ', '0436/LAM-PTKes/Akr/Sar/VIII/2019', '2019', 'Akreditasi B', 'Surau Gadang, Kec. Nanggalo, Kota Padang, Sumatera Barat', '(0751) 442295', 0, '0', ''),
(11, 'D 3 Keperawatan STIKes Perintis ', '0119/LAM-PTKes/Akr/Dip/XI/2015', '2015', 'Akreditasi B', 'Surau Gadang, Kec. Nanggalo, Kota Padang, Sumatera Barat', '0751-481992', 0, '0', ''),
(12, 'S 1 Keperawatan STIKes Perintis ', '0115/LAM-PTKes/Akr/Sar/XI/2015', '2015', 'Akreditasi B', 'Jl. Kusuma Bakti, Gulai Bancah, Koto Selayan, Kubu Gulai Bancah, Kec. Mandiangin, Koto Selayan, Kota Bukittinggi, Sumatera Barat', '0751-481992', 0, '0', ''),
(13, 'S 1 Keperawatan Fakultas Keperawatan UNAND ', '0356/LAM-PTKes/Akr/Sar/VII/2019', '2019', 'Akreditasi A', 'Limau Manis, Kec. Pauh, Kota Padang, Sumatera Barat', '(0751) 779233', 4, '0', ''),
(14, 'S 2 Keperawatan Fakultas Keperawatan UNAND ', '0493/LAM-PTKes/Akr/Mag/IV/2016', '2016', 'Akreditasi B', 'Limau Manis, Kec. Pauh, Kota Padang, Sumatera Barat', '(0751) 779233', 4, '0', ''),
(15, 'S 1 Keperawatan STIKes Syedza Saintika Padang', '0707-SK/BAN-PT/Ak-Surv/PT/VI/2016', '2016', 'Akreditasi B', 'Jalan Profesor Doktor Hamka No.228, Air Tawar Timur, Padang Utara, Air Tawar Tim., Kec. Padang Utara, Kota Padang, Sumatera Barat ', '(0751) 442699', 0, '0', ''),
(16, 'S 1 Keperawatan Fikes Universitas Dharmas Indonesia', '451/SK/BAN-PT/Akred/S/XI/2014', '2014', 'Akreditasi C', 'Jl. Lintas Sumatera KM 18 Koto Baru Kab. Dharmasraya Provinsi Sumatera Barat', '0813-6367-0736', 0, '0', ''),
(17, 'S 1 Keperawatan STIKes Indonesia', '1031/LAM-PTKes/Akr/Pro/XII/2016', '2016', 'Akreditasi B', 'Jl. Khatib Sulaiman No.17, Lolong Belanti, Kec. Padang Utara, Kota Padang, Sumatera Barat ', '(0751) 7056138', 0, '0', ''),
(18, 'S 1 Keperawatan STIKes Yarsi Sumbar Bukittinggi ', '0423/LAM-PTKes/Akr/Sar/VIII/2017', '2017', 'Akreditasi B', 'Jl. Tan Malaka, Bukit Cangang Kayu Ramang, Kec. Guguk Panjang, Kota Bukittinggi, Sumatera Barat 26116', ' 0752-21169', 0, '0', ''),
(19, 'D 3 Keperawatan STIKes Yarsi Sumbar Bukittinggi ', '0369//LAM-PTKes/Akr/Dip/II/2016', '2016', 'Akreditasi B', 'Jl. Tan Malaka, Bukit Cangang Kayu Ramang, Kec. Guguk Panjang, Kota Bukittinggi, Sumatera Barat 26116', ' 0752-21169', 0, '0', ''),
(21, 'S 1 Kedokteran Fakultas Kedokteran (UNBRAH)', '1429/SK/BAN-PT/Akred/S/V/2017', '2017', 'Akreditasi B', 'Jl. Raya By Pass, Aie Pacah, Koto tangah, Aie Pacah, kec. Koto Tangah, Kota Padang, Sumatera Barat', '(0751) 463069', 0, '0', ''),
(22, 'S 1 Keperawatan STIKes Ranah Minang', '3989/SK/BAN-PT/Akred/PT/IV/2019', '2019', 'Akreditasi B', 'Jl. Parak Gadang No.60, Simpang Haru, Kec. Padang Tim., Kota Padang, Sumatera Barat ', ' (0751) 33341', 0, '0', ''),
(23, 'S 1 Psikologi Islam UIN Imam Bonjol Padang', '3989/SK/BAN-PT/Ak/PNB/S/X/2017', '2017', 'Akreditasi B', 'Jl. S.Parman No.120, Lolong Belanti, Kec. Padang Utara, Kota Padang, Sumatera Barat', '(0751) 24435', 0, '0', ''),
(24, 'S 1 Keperawatan STIKes Alifah Padang', '0109/LAM-PTKes/Akr/Sar/XI/2015', '2015', 'Akreditasi B', 'Jl. Khatib Sulaiman No.58 B, Kota Padang, Sumatera Barat', '(0751) 7059849', 0, '0', ''),
(25, 'S 1 Keperawatan STIKes Nan Tongga ', '118/SK/BAN-PT/Akred/PT/VI/2018', '2018', 'Akreditasi C', 'Lubuk Alung, Kec.Lubuk Alung, Kabupaten Padang Pariaman, Sumatera Barat', '(0751) 96971', 0, '0', ''),
(26, 'S 1 Keperawatan STIKes Fort De Kock Bukittinggi', '3172/SK/BAN-PT/Akred/PT/XII/2016', '2016', 'Akreditasi B', 'Jl. Sukarno Hattta No.11, Manggis Ganting, Kec. Mandiangin Koto Selayan, Kota Bukittinggi, Sumatera Barat ', '(0752) 31877', 0, '0', ''),
(27, 'D 3 Keperawatan Akper Nabila ', '0579//LAM-Ptkes/Akr/Dip/IX/2017', '2017', 'Akreditasi B', 'Jalan Dr. H. Kamarullah No.1, Bukit Surungan, Kec. Padang Panjang Bar., Kota Padang Panjang, Sumatera Barat ', '(0752) 485510', 0, '0', ''),
(28, 'S 1 Keperawatan Institut Kesehatan Prima Nusantara ', '0742/LAM-PTKes/Akr/Sar/VIII/2016', '2016', 'Akreditasi B', 'Jl. Kusuma Bhakti No.99, Kubu Gulai Bancah, Kec. Mandiangin Koto Selayan, Kota Bukittinggi, Sumatera Barat 26111', '( 0752 )6218241', 0, '0', ''),
(29, 'S 1 Kedokteran Fakultas Kedokteran Universitas Andalas', '0878/LAM-PTKes/Akr/Pro/X/2016', '2016', 'Akreditasi A', 'Komplek Kampus Unand, Limau Manis, Kec. Pauh, Kota Padang, Sumatera Barat', '(0751) 31746', 0, '0', ''),
(30, 'D 3 Keperawatan Poltekkes Kemenkes Padang', '0315/LAM-PT-Kes/Akr/Dip/I/2016', '2016', 'Akreditasi B', 'Jl. Raya Siteba, Surau Gadang, Kec. Nanggalo, Kota Padang, Sumatera Barat 25146', '(0751) 7051718', 0, '0', ''),
(32, 'D 3 Keperawatan Akper Kesdam I/BB Padang', '376/SK/BAN-PT/Akred/PT/VII/2019', '2019', 'Akreditasi B', 'Jl. Ganting, Ganting Parak Gadang, Kec. Padang Timur, Kota Padang, Sumatera Barat', '(0751) 34204', 0, '0', ''),
(34, 'S 1 Farmasi Fakultas Farmasi UNAND', '0597/LAM-PTKes/Akre/Pro/IX/2017', '2017', 'Akreditasi A', 'Kampus UNAND, Jl. Limau Manis, Limau Manis, Kec. Pauh, Kota Padang, Sumatera Barat 25163', '(0751) 71181', 0, '31-10-2020', 'example@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `jadwal_id` int(11) NOT NULL,
  `institusi_id` int(11) NOT NULL,
  `jadwal_nama` varchar(255) NOT NULL,
  `jadwal_mulai` varchar(256) NOT NULL,
  `jadwal_akhir` varchar(256) NOT NULL,
  `jadwal_status` enum('draft','terkirim','approved') NOT NULL,
  `username` varchar(256) NOT NULL,
  `volume` int(11) NOT NULL,
  `file` varchar(256) NOT NULL,
  `type` varchar(256) NOT NULL,
  `size` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `jurusan_id` int(11) NOT NULL,
  `jurusan_nama` varchar(255) NOT NULL,
  `jurusan_supervisi` varchar(255) NOT NULL,
  `jurusan_pin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`jurusan_id`, `jurusan_nama`, `jurusan_supervisi`, `jurusan_pin`) VALUES
(1, 'D 3 Keperawatan ', 'Tinggi', 'Merah'),
(2, 'S 1 Keperawatan ', 'Moderat Tinggi', 'Kuning'),
(3, 'Profesi Ners', 'Moderat', 'Hijau'),
(4, 'S 1 Kedokteran (KKS)', 'Tinggi', 'Merah'),
(6, 'S 1 Psikologi ', 'Tinggi', 'Merah'),
(7, 'S 2 Keperawatan', 'Rendah', 'Biru'),
(9, 'S 1 Farmasi ', 'Tinggi', 'Merah'),
(10, 'S 1 Farmasi Profesi', 'Moderat Tinggi', 'Kuning'),
(11, 'D 3 Rekam Medis Dan Informasi Kesehatan  (RMIK)', 'Moderat Tinggi', 'Kuning');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
--

CREATE TABLE `kelompok` (
  `kelompok_id` int(11) NOT NULL,
  `periode_id` int(11) NOT NULL,
  `institusi_id` int(11) NOT NULL,
  `jadwal_id` int(11) NOT NULL,
  `ruangan_id` int(11) NOT NULL,
  `kelompok_nama` varchar(256) NOT NULL,
  `pembimbing_id` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `mahasiswa_id` int(11) NOT NULL,
  `jadwal_id` int(11) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `mahasiswa_nama` varchar(255) NOT NULL,
  `mahasiswa_npm` varchar(255) NOT NULL,
  `mahasiswa_jenis_kelamin` varchar(255) NOT NULL,
  `mahasiswa_jenis_praktek` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing`
--

CREATE TABLE `pembimbing` (
  `pembimbing_id` int(11) NOT NULL,
  `ruangan_id` int(11) NOT NULL,
  `pembimbing_nama` varchar(256) NOT NULL,
  `pembimbing_nip` varchar(255) NOT NULL,
  `pembimbing_jabatan` varchar(255) NOT NULL,
  `pembimbing_pangkat` varchar(255) NOT NULL,
  `pembimbing_pendidikan` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembimbing`
--

INSERT INTO `pembimbing` (`pembimbing_id`, `ruangan_id`, `pembimbing_nama`, `pembimbing_nip`, `pembimbing_jabatan`, `pembimbing_pangkat`, `pembimbing_pendidikan`, `role_id`) VALUES
(1, 26, 'Ns. Basmanelly, M. Kep. Sp. Kep J', '19701030 199303 2 002', 'Konsultan / R Inap IRNA A', 'IV-B Pembina TK 1', 'S 2 Kep. Jiwa', 3),
(2, 25, 'Ns. Netrida, M. Kep, Sp. Kep J', '19770529 199703 2 002', 'Konsultan / R Inap IRNA B', 'IV-B Pembina TK 1', 'S 2 Kep. Jiwa', 3),
(3, 26, 'Ns. Fristi Andriani, M. Kep', '19710827 201101 2 002', 'Kepala Instalasi Rawat Inap A', 'III-D Penata TK 1', 'Ns. Magister Manajemen ', 0),
(4, 25, 'Ns. Dwi Rahmi, SKM, S.Kep', '19701105 199403 2 002', 'Kepala Instalasi Rawat Inap B', 'IV-A Pembina', 'Ners', 0),
(5, 27, 'Ns. Nisa Lestari, S.Kep', '19850505 200902 2 001', 'Kepala Instalasi IGD', 'III-D Penata TK 1', 'Ners', 0),
(6, 27, 'Ns. Isna Devita, S.Kep', '19760614 199603 2 001', 'Ka Tim IGD', 'III-D Penata TK 1', 'Ners', 0),
(7, 2, 'Ns. Muharni Sinarthi, S.Kep', '19850916 201001 2 021', 'Kepala Ruangan Flamboyan', 'III-B Penata Muda TK 1', 'Ners', 0),
(8, 2, 'Ns. Okrita Sunelvia Dewi, S.Kep', '19771030 199703 2 002', 'Komite PPI', 'III-D Penata TK 1', 'Ners', 0),
(9, 2, 'Ns. Sri Wahyuni, S.Kep', '19750726 199803 2 002', 'Komite PPI', 'III-C Penata', 'Ners', 0),
(10, 3, 'Ns. Yondri Elva, SKM, S.Kep', '19690101 1997031 008', 'komite', 'IV-B Pembina TK 1', 'Ners', 0),
(12, 3, 'Ns. Agustian, S.Kep', '19680807 199403 1 010', 'Kepala Ruangan Cendrawasih', 'IV-A Pembina', 'Ners', 0),
(13, 3, 'Ns. Novita Bolin, S.Kep', '19861106 201403 2 001', 'Ka. Tim A Cendrawasih', 'III-B Penata Muda TK 1', 'Ners', 0),
(14, 1, 'Ns. Risa Aderina, S.Kep', '19871211 201101 2 002', 'Katim A Anggrek', 'III-B Penata Muda TK 1', 'Ners', 0),
(15, 1, 'Ns. Sari Andika Putri, S.Kep', '19890606 201101 2 001', 'Katim B Anggrek', 'III-B Penata Muda TK 1', 'Ners', 0),
(16, 8, 'Ns. Ratna Devi, S.Kep', '19670509 199403 2003', 'Kepala Ruangan Nuri', 'IV-A Pembina', 'Ners', 0),
(17, 3, 'Ns.Yenni Rahma Suhelma, S.Kep', '19710804 199203 2 002', 'Case Manager', 'IV-A Pembina', 'Ners', 0),
(18, 14, 'Ns. Ezzedin, S.Kep', '19730111 199303 1 003', 'Kepala Ruangan Napza', 'IV-A Pembina', 'Ners', 0),
(19, 5, 'Ns. Arluna Masjon, S.Kep', '19740713 199803 1 002', 'Kepala Ruangan Merpati', 'III-D Penata TK 1', 'Ners', 0),
(20, 5, 'Ns. Melyanti, S.Kep', '19730623 199703 2 002', 'Ka. Tim A Merpati', 'III-D Penata TK 1', 'Ners', 0),
(21, 5, 'Ns. Syarifah Husni, S.Kep', '19860703 201001 2 021', 'Ka. Tim B Merpati', 'III-B Penata Muda TK 1', 'Ners', 0),
(22, 13, 'Ns. Vicky Anggaria, S.Kep', '2013.04.1.007', 'Staf UPIP', 'II-A Pengatur Muda', 'Ners', 0),
(23, 13, 'Ns. Zahotman Eka Putra, S.Kep', '19701025 199703 1 004', 'Komite PPI', 'III-D Penata TK 1', 'Ners', 0),
(24, 9, 'Ns. Wisfi Desriyanti, S.Kep', '19751228 199703 2 003', 'Kepala Ruangan Teratai', 'III-C Penata', 'Ners', 0),
(25, 9, 'Ns. Toni Chandra, S.Kep', '2015.07.1.069', 'Staf Teratai', 'II-A Pengatur Muda', 'Ners', 0),
(26, 9, 'Ns. Cendra Fitria, S.Kep', '19780910 200003 2 004', 'Ka. Tim Napza', 'III-B Penata Muda TK 1', 'Ners', 0),
(27, 4, 'Ns. Milfayeti, S.Kep', '19770717 199703 2 003', 'Kepala Ruang Melati', 'III-C Penata', 'Ners', 0),
(28, 4, 'Ns. Listya Nanda Utami, S.Kep', '2014.04.2.030', 'Staf Melati', 'II-A Pengatur Muda', 'Ners', 0),
(29, 10, 'Ns. Yessi Karmelia, S.Kep', '19790912 199803 2 001', 'Karu Rawat Inap Anrem', 'III-B Penata Muda TK 1', 'Ners', 0),
(30, 1, 'Ns. Gusnita, S.Kep', '19770803 199903 2 001', 'Ka. Unit Poli Dewasa, Lanjut Usia & Umum', 'III-C Penata', 'Ners', 0),
(31, 10, 'Ns. Sri Surya Tenti, S.Kep', '19780126 199703 2 003', 'Staf Unit Poli Dewasa, Usia Lanjut & Umum', 'III-D Penata TK 1', 'Ners', 0),
(32, 28, 'dr. Dian Budianti Amalina, Sp.KJ', '19760829 200604 2 012', 'Dokter Spesialis Jiwa', 'IV-A Pembina', 'Spesialis Kedokteran Jiwa', 0),
(33, 28, 'dr. Silvia Erfan, SpKJ', '19760813 200604 2 002', 'Dokter Spesialis Jiwa', 'IV-A Pembina', 'Spesialis Kedokteran Jiwa', 0),
(34, 28, 'dr.Shinta Brisma,SpKJ', '19750505 200604 2 023', 'Dokter Spesialis Jiwa', 'IV-A Pembina', 'Spesialis Kedokteran Jiwa', 0),
(35, 28, 'dr.Rini Gusyaliza,Sp.KJ', '19830808 200812 2 004', 'Dokter Spesialis Jiwa', 'IV-A Pembina', 'Spesialis Kedokteran Jiwa', 0),
(36, 28, 'dr. Taufik Ashal, Sp.KJ', '19761014 200812 1 001', 'Dokter Spesialis Jiwa', 'IV-A Pembina', 'Spesialis Kedokteran Jiwa', 0),
(37, 28, 'Neni Andriani, M.Psi,Psikolog', '19800423 201001 2 016', 'Psikolog', 'III-D Penata TK 1', 'S 2 Psikolog', 0),
(38, 28, 'Dra.Kuswardhani Susari Putri,M.Psi,Psikolog', '19690408 199603 2 001', 'Psikolog', 'IV-A Pembina', 'S 2 Psikolog', 0),
(39, 21, 'Fitri Yulia,S.Farm.Apt', '19760403 200901 2 001', 'Apoteker', 'III-B Penata Muda TK 1', 'Apoteker', 0),
(40, 21, 'Dra.Desmery Soeshan,Apt', '19580105 198503 2 004', 'Apoteker', 'IV-D Pembina Utama Madya', 'Apoteker', 0),
(41, 21, 'Yuni Rahayu,S.Farm, Apt', '19840617 200901 2 002', 'Apoteker', 'III-C Penata', 'Apoteker', 0),
(42, 21, 'Dian Suhery,S.Farm,Apt', '19810323 200901 2 001', 'Apoteker', 'III-A Penata Muda', 'Apoteker', 0),
(43, 29, 'Dwi Muthia,Amd.PK', '19820313 201001 2 001', 'Rekam Medik', 'III-D Penata TK 1', 'D 3 Rekam Medik', 0),
(44, 29, 'Nofriyanty, Amd.PK', '19791196 200312 2 003', 'Rekam Medik', 'III-D Penata TK 1', 'D 3 Rekam Medik', 0),
(45, 29, 'Hasnaini, Amd.PK', '19780328 200604 2 008', 'Rekam Medik', 'III-D Penata TK 1', 'D 3 Rekam Medik', 0),
(46, 29, 'Ratih Koemala Sari,Amd.PK', '19850813 201001 2 037', 'Rekam Medik', 'III-D Penata TK 1', 'D 3 Rekam Medik', 0),
(47, 29, 'Jennifer Astra,S.ST', '19830807 201101 2 004', 'Rekam Medik', 'III-D Penata TK 1', 'D 3 Rekam Medik', 0),
(48, 29, 'Yeni Herlinda,A.Md', '19800426 200701 2 002', 'Rekam Medik', 'III-D Penata TK 1', 'D 3 Rekam Medik', 0),
(49, 29, 'Bahri Putra Lubis, AMF', '19861028 201101 1 003', 'Rekam Medik', 'III-D Penata TK 1', 'D 3 Rekam Medik', 3),
(50, 30, 'Eka Kurniati,S.ST', '19720709 199703 2 004', 'Gizi', 'III-D Penata TK 1', 'Sarjana Gizi', 0),
(51, 30, 'Mirza Astuti,S.GZ', '19701020 199403 2 003', 'Gizi', 'III-D Penata TK 1', 'Sarjana Gizi', 0),
(52, 20, 'Tri Satria,  A.Md.AK', '19831020 201101 2 003', 'Labor', 'III-A Penata Muda', 'Sarjana Muda Analis Kesehatan', 0),
(53, 20, 'Fanny Febriany, A.Md Ak', '19890224 201101 2 002', 'Labor', 'III-A Penata Muda', 'Sarjana Muda Analis Kesehatan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `periode_id` int(11) NOT NULL,
  `periode_nama` varchar(256) NOT NULL,
  `status` enum('belum dibuat','terkirim') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `ruangan_id` int(11) NOT NULL,
  `ruangan_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`ruangan_id`, `ruangan_nama`) VALUES
(1, 'Wisma Anggrek '),
(2, 'Wisma Flamboyan '),
(3, 'Wisma Cendrawasih '),
(4, 'Wisma Melati '),
(5, 'Wisma Merpati '),
(8, 'Wisma Nuri '),
(9, 'Wisma Teratai '),
(10, 'Wisma Anak dan Remaja  (Anrem) '),
(12, 'Wisma Dahlia '),
(13, 'UPIP'),
(14, 'Instalasi Napza'),
(15, 'Poliklinik Anak dan Remaja (Anrem)'),
(16, 'Poliklinik Dewasa '),
(17, 'Poliklinik Gigi '),
(18, 'Unit Psikologi '),
(19, 'Instalasi Rekam Medis'),
(20, 'Instalasi Laboratorium'),
(21, 'Instalasi Farmasi'),
(22, 'Bagian Tata Usaha'),
(23, 'Bagian Kepeg, Humas, Organisasi dan Hukum'),
(24, 'Bagian Keuangan'),
(25, 'R Inap IRNA B '),
(26, 'R Inap IRNA A '),
(27, 'IGD'),
(28, 'Rawat Jalan dan Rawat Inap'),
(29, 'Rekam Medik R. Jalan & R. Inap'),
(30, 'Instalasi Gizi');

-- --------------------------------------------------------

--
-- Stand-in structure for view `tabel_mahasiswa`
-- (See below for the actual view)
--
CREATE TABLE `tabel_mahasiswa` (
`jadwal_id` int(11)
,`jadwal_nama` varchar(255)
,`jadwal_mulai` varchar(256)
,`jadwal_akhir` varchar(256)
,`jadwal_status` enum('draft','terkirim','approved')
,`username` varchar(256)
,`volume` int(11)
,`file` varchar(256)
,`type` varchar(256)
,`size` varchar(256)
,`mahasiswa_jadwal_id` int(11)
,`mahasiswa_nama` varchar(255)
,`mahasiswa_npm` varchar(255)
,`mahasiswa_jenis_kelamin` varchar(255)
,`mahasiswa_jenis_praktek` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tabel_mahasiswa2`
-- (See below for the actual view)
--
CREATE TABLE `tabel_mahasiswa2` (
`jadwal_id` int(11)
,`jadwal_nama` varchar(255)
,`jadwal_mulai` varchar(256)
,`jadwal_akhir` varchar(256)
,`jadwal_status` enum('draft','terkirim','approved')
,`username` varchar(256)
,`mahasiswa_jadwal_id` int(11)
,`mahasiswa_nama` varchar(255)
,`mahasiswa_npm` varchar(255)
,`mahasiswa_jenis_kelamin` varchar(255)
,`mahasiswa_jenis_praktek` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `uraian_tugas`
--

CREATE TABLE `uraian_tugas` (
  `tugas_id` int(11) NOT NULL,
  `periode_id` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role_id` int(2) NOT NULL,
  `institusi_id` varchar(256) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama_akun` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL,
  `is_active` enum('Aktif','Tidak Aktif') NOT NULL,
  `date_created` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`, `institusi_id`, `username`, `password`, `nama_akun`, `image`, `is_active`, `date_created`) VALUES
(1, 1, '0', 'ssadmin', '$2y$10$3hXbvUZOPc61VHV9/O6KxuMGP2bjaD4pDu8f9hzdj/WNOIHt.qI76', 'Super Admin', 'programmer.png', 'Aktif', 13145),
(2, 2, '0', 'admin', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'Admin Diklat', 'default.png', 'Aktif', 1601609879),
(26, 6, '0', 'kabid_diklat', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'Kabid Diklat', 'default.png', 'Aktif', 2020);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(20) NOT NULL,
  `role_id` int(20) NOT NULL,
  `menu_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(32, 1, 7),
(33, 1, 8),
(35, 2, 4),
(36, 4, 5),
(37, 4, 2),
(39, 2, 6),
(41, 6, 7),
(42, 6, 2),
(43, 1, 2),
(44, 1, 3),
(45, 1, 4),
(46, 1, 5),
(47, 1, 6),
(52, 6, 4),
(53, 6, 6),
(54, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(4) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Diklat'),
(5, 'Jadwal'),
(6, 'Registrasi'),
(7, 'Supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Super Administrator'),
(2, 'Administrator'),
(3, 'Pembimbing'),
(4, 'Institusi'),
(5, 'Mahasiswa'),
(6, 'Supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(20) NOT NULL,
  `menu_id` int(20) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 3, 'Menu Management', 'menu', 'fas fa-fw fa-tasks', 1),
(3, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-indent', 1),
(4, 6, 'Registrasi Ins. Pendidikan', 'registrasi/institusi', 'fas fa-fw fa-address-card', 1),
(5, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(6, 4, 'Institusi Pendidikan', 'diklat/institusi', 'fas fa-fw fa-university', 1),
(7, 2, 'Profil', 'user', 'fas fa-fw fa-user', 1),
(8, 2, 'Ubah Profil', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(9, 4, 'Jurusan', 'diklat/jurusan', 'fas fa-fw fa-user-graduate', 1),
(10, 2, 'Ubah Kata Sandi', 'user/changepassword', 'fas fa-fw fa-key', 1),
(11, 4, 'Pembimbing', 'diklat/pembimbing', 'fas fa-fw fa-user-friends', 1),
(12, 4, 'Ruangan', 'diklat/ruangan', 'fas fa-fw fa-chalkboard', 1),
(16, 5, 'Buat Jadwal', 'institusi/schedule', 'fas fa-fw fa-calendar', 1),
(17, 5, 'Kirim Jadwal', 'institusi/dashboard', 'fas fa-fw fa-calendar-alt', 1),
(20, 4, 'Jadwal Diklat', 'diklat/dashboard', 'fas fa-fw fa-calendar-check', 1),
(21, 4, 'Kalender Diklat', 'diklat/kuota', 'fas fa-fw fa-calendar', 1),
(22, 4, 'Pembagian Kelompok', 'diklat/kelompok', 'fas fa-fw fa-users', 1),
(23, 7, 'Approve User', 'supervisor/approval_user', 'fas fa-fw fa-user', 1),
(24, 7, 'Approve Jadwal', 'supervisor/approval_jadwal', 'fas fa-fw fa-calendar-alt', 1),
(25, 4, 'Kirim Mahasiswa', 'diklat/kirim_mahasiswa', 'fas fa-fw fa-paper-plane', 1),
(27, 6, 'Registrasi Pembimbing', 'registrasi/pembimbing', 'fas fa-fw fa-address-card', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_jadwal`
-- (See below for the actual view)
--
CREATE TABLE `v_jadwal` (
`mahasiswa_id` int(11)
,`jadwal_id` int(11)
,`jurusan_id` int(11)
,`mahasiswa_nama` varchar(255)
,`mahasiswa_npm` varchar(255)
,`mahasiswa_jenis_kelamin` varchar(255)
,`mahasiswa_jenis_praktek` varchar(255)
,`jadwal_nama` varchar(255)
,`file` varchar(256)
,`type` varchar(256)
,`jurusan_nama` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_jadwalinstitusi`
-- (See below for the actual view)
--
CREATE TABLE `v_jadwalinstitusi` (
`institusi_nama` varchar(255)
,`institusi_id` varchar(256)
,`username` varchar(256)
);

-- --------------------------------------------------------

--
-- Structure for view `tabel_mahasiswa`
--
DROP TABLE IF EXISTS `tabel_mahasiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tabel_mahasiswa`  AS  select `jadwal`.`jadwal_id` AS `jadwal_id`,`jadwal`.`jadwal_nama` AS `jadwal_nama`,`jadwal`.`jadwal_mulai` AS `jadwal_mulai`,`jadwal`.`jadwal_akhir` AS `jadwal_akhir`,`jadwal`.`jadwal_status` AS `jadwal_status`,`jadwal`.`username` AS `username`,`jadwal`.`volume` AS `volume`,`jadwal`.`file` AS `file`,`jadwal`.`type` AS `type`,`jadwal`.`size` AS `size`,`mahasiswa`.`jadwal_id` AS `mahasiswa_jadwal_id`,`mahasiswa`.`mahasiswa_nama` AS `mahasiswa_nama`,`mahasiswa`.`mahasiswa_npm` AS `mahasiswa_npm`,`mahasiswa`.`mahasiswa_jenis_kelamin` AS `mahasiswa_jenis_kelamin`,`mahasiswa`.`mahasiswa_jenis_praktek` AS `mahasiswa_jenis_praktek` from (`jadwal` join `mahasiswa` on(`jadwal`.`jadwal_id` = `mahasiswa`.`jadwal_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `tabel_mahasiswa2`
--
DROP TABLE IF EXISTS `tabel_mahasiswa2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tabel_mahasiswa2`  AS  select `jadwal`.`jadwal_id` AS `jadwal_id`,`jadwal`.`jadwal_nama` AS `jadwal_nama`,`jadwal`.`jadwal_mulai` AS `jadwal_mulai`,`jadwal`.`jadwal_akhir` AS `jadwal_akhir`,`jadwal`.`jadwal_status` AS `jadwal_status`,`jadwal`.`username` AS `username`,`mahasiswa`.`jadwal_id` AS `mahasiswa_jadwal_id`,`mahasiswa`.`mahasiswa_nama` AS `mahasiswa_nama`,`mahasiswa`.`mahasiswa_npm` AS `mahasiswa_npm`,`mahasiswa`.`mahasiswa_jenis_kelamin` AS `mahasiswa_jenis_kelamin`,`mahasiswa`.`mahasiswa_jenis_praktek` AS `mahasiswa_jenis_praktek` from (`jadwal` join `mahasiswa` on(`jadwal`.`jadwal_id` = `mahasiswa`.`jadwal_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_jadwal`
--
DROP TABLE IF EXISTS `v_jadwal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jadwal`  AS  select `mahasiswa`.`mahasiswa_id` AS `mahasiswa_id`,`mahasiswa`.`jadwal_id` AS `jadwal_id`,`mahasiswa`.`jurusan_id` AS `jurusan_id`,`mahasiswa`.`mahasiswa_nama` AS `mahasiswa_nama`,`mahasiswa`.`mahasiswa_npm` AS `mahasiswa_npm`,`mahasiswa`.`mahasiswa_jenis_kelamin` AS `mahasiswa_jenis_kelamin`,`mahasiswa`.`mahasiswa_jenis_praktek` AS `mahasiswa_jenis_praktek`,`jadwal`.`jadwal_nama` AS `jadwal_nama`,`jadwal`.`file` AS `file`,`jadwal`.`type` AS `type`,`jurusan`.`jurusan_nama` AS `jurusan_nama` from ((`mahasiswa` join `jadwal` on(`mahasiswa`.`jadwal_id` = `jadwal`.`jadwal_id`)) join `jurusan` on(`jurusan`.`jurusan_id` = `mahasiswa`.`jurusan_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_jadwalinstitusi`
--
DROP TABLE IF EXISTS `v_jadwalinstitusi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jadwalinstitusi`  AS  select `institusi`.`institusi_nama` AS `institusi_nama`,`user`.`institusi_id` AS `institusi_id`,`jadwal`.`username` AS `username` from ((`user` join `institusi` on(`user`.`institusi_id` = `institusi`.`institusi_id`)) join `jadwal` on(`user`.`username` = `jadwal`.`username`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institusi`
--
ALTER TABLE `institusi`
  ADD PRIMARY KEY (`institusi_id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`jadwal_id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`jurusan_id`);

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`kelompok_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`mahasiswa_id`);

--
-- Indexes for table `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD PRIMARY KEY (`pembimbing_id`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`periode_id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`ruangan_id`);

--
-- Indexes for table `uraian_tugas`
--
ALTER TABLE `uraian_tugas`
  ADD PRIMARY KEY (`tugas_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `institusi`
--
ALTER TABLE `institusi`
  MODIFY `institusi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `jadwal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `jurusan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `kelompok_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `mahasiswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `pembimbing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `periode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `ruangan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `uraian_tugas`
--
ALTER TABLE `uraian_tugas`
  MODIFY `tugas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2022 at 07:28 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

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

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_event`, `end_event`) VALUES
(2, 'Jadwal untuk D3 Unand Keperawatan 10 orang', '2022-06-06', '2022-06-11'),
(3, 'S 1 Kedokteran Unand 3 Orang', '2022-06-22', '2022-06-30');

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
(22, 'S 1 Keperawatan STIKes Ranah Minang', '3989/SK/BAN-PT/Akred/PT/IV/2019', '2019', 'Akreditasi B', 'Jl. Parak Gadang No.60, Simpang Haru, Kec. Padang Tim., Kota Padang, Sumatera Barat ', ' (0751) 33341', 0, '21-11-2021', 'stikesranahminang@gmail.com'),
(23, 'S 1 Psikologi Islam UIN Imam Bonjol Padang', '3989/SK/BAN-PT/Ak/PNB/S/X/2017', '2017', 'Akreditasi B', 'Jl. S.Parman No.120, Lolong Belanti, Kec. Padang Utara, Kota Padang, Sumatera Barat', '(0751) 24435', 0, '0', ''),
(24, 'S 1 Keperawatan STIKes Alifah Padang', '0109/LAM-PTKes/Akr/Sar/XI/2015', '2015', 'Akreditasi B', 'Jl. Khatib Sulaiman No.58 B, Kota Padang, Sumatera Barat', '(0751) 7059849', 0, '0', ''),
(25, 'S 1 Keperawatan STIKes Nan Tongga ', '118/SK/BAN-PT/Akred/PT/VI/2018', '2018', 'Akreditasi C', 'Lubuk Alung, Kec.Lubuk Alung, Kabupaten Padang Pariaman, Sumatera Barat', '(0751) 96971', 0, '0', ''),
(26, 'S 1 Keperawatan STIKes Fort De Kock Bukittinggi', '3172/SK/BAN-PT/Akred/PT/XII/2016', '2016', 'Akreditasi B', 'Jl. Sukarno Hattta No.11, Manggis Ganting, Kec. Mandiangin Koto Selayan, Kota Bukittinggi, Sumatera Barat ', '(0752) 31877', 0, '0', ''),
(27, 'D 3 Keperawatan Akper Nabila ', '0579//LAM-Ptkes/Akr/Dip/IX/2017', '2017', 'Akreditasi B', 'Jalan Dr. H. Kamarullah No.1, Bukit Surungan, Kec. Padang Panjang Bar., Kota Padang Panjang, Sumatera Barat ', '(0752) 485510', 0, '0', ''),
(28, 'S 1 Keperawatan Institut Kesehatan Prima Nusantara ', '0742/LAM-PTKes/Akr/Sar/VIII/2016', '2016', 'Akreditasi B', 'Jl. Kusuma Bhakti No.99, Kubu Gulai Bancah, Kec. Mandiangin Koto Selayan, Kota Bukittinggi, Sumatera Barat 26111', '( 0752 )6218241', 0, '0', ''),
(29, 'S 1 Kedokteran Fakultas Kedokteran Universitas Andalas', '0878/LAM-PTKes/Akr/Pro/X/2016', '2016', 'Akreditasi A', 'Komplek Kampus Unand, Limau Manis, Kec. Pauh, Kota Padang, Sumatera Barat', '(0751) 31746', 0, '0', ''),
(30, 'D 3 Keperawatan Poltekkes Kemenkes Padang', '0315/LAM-PT-Kes/Akr/Dip/I/2016', '2016', 'Akreditasi B', 'Jl. Raya Siteba, Surau Gadang, Kec. Nanggalo, Kota Padang, Sumatera Barat 25146', '(0751) 7051718', 0, '0', ''),
(32, 'D 3 Keperawatan Akper Kesdam I/BB Padang', '376/SK/BAN-PT/Akred/PT/VII/2019', '2019', 'Akreditasi B', 'Jl. Ganting, Ganting Parak Gadang, Kec. Padang Timur, Kota Padang, Sumatera Barat', '(0751) 34204', 0, '31-12-2020', ''),
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

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`jadwal_id`, `institusi_id`, `jadwal_nama`, `jadwal_mulai`, `jadwal_akhir`, `jadwal_status`, `username`, `volume`, `file`, `type`, `size`) VALUES
(15, 22, 'D0022-254816', '31-01-2022', '12-02-2022', 'approved', 'IP012', 9, 'SURAT_JIWA.pdf', '.pdf', '520.15'),
(16, 32, 'D0032-182906', '28-02-2022', '26-03-2022', 'draft', 'IP031', 41, '', '', ''),
(17, 9, 'D009-32154', '14-02-2022', '19-02-2022', 'draft', 'IP006', 22, '', '', ''),
(18, 9, 'D009-317259', '21-02-2022', '26-02-2022', 'draft', 'IP006', 22, '', '', ''),
(19, 9, 'D009-108279', '28-02-2022', '05-03-2022', 'draft', 'IP006', 11, '', '', ''),
(20, 9, 'D009-682473', '21-03-2022', '26-03-2022', 'draft', 'IP006', 23, '', '', ''),
(21, 9, 'D009-308957', '21-03-2022', '26-02-2022', 'draft', 'IP006', 23, '', '', ''),
(22, 9, 'D009-597610', '28-03-2022', '02-04-2022', 'draft', 'IP006', 22, '', '', ''),
(23, 9, 'D009-179468', '25-04-2022', '30-04-2022', 'draft', 'IP006', 22, '', '', ''),
(24, 9, 'D009-234167', '09-05-2022', '14-05-2022', 'draft', 'IP006', 11, '', '', ''),
(25, 29, 'D0029-942385', '06-06-2022', '10-06-2022', 'approved', 'IP001', 10, 'dummies.pdf', '.pdf', '12.95'),
(26, 29, 'D0029-279163', '22-06-2022', '29-06-2022', 'approved', 'IP001', 3, 'dummy11.pdf', '.pdf', '12.95');

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
(11, 'D 3 Rekam Medis Dan Informasi Kesehatan  (RMIK)', 'Moderat Tinggi', 'Kuning'),
(12, 'D3 Administrasi Rumah Sakit', 'Moderat Tinggi', 'Kuning');

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
  `mahasiswa_id` int(11) NOT NULL,
  `status_nilai` enum('belum dibuat','draft','selesai','terkirim') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelompok`
--

INSERT INTO `kelompok` (`kelompok_id`, `periode_id`, `institusi_id`, `jadwal_id`, `ruangan_id`, `kelompok_nama`, `pembimbing_id`, `mahasiswa_id`, `status_nilai`) VALUES
(4, 2, 29, 25, 27, 'I', 5, 52, 'belum dibuat'),
(5, 2, 29, 25, 27, 'I', 5, 53, 'belum dibuat'),
(6, 3, 29, 26, 27, 'I', 5, 54, 'terkirim'),
(8, 3, 29, 26, 27, 'I', 5, 55, 'terkirim'),
(9, 3, 29, 26, 27, 'I', 5, 56, 'terkirim');

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

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`mahasiswa_id`, `jadwal_id`, `jurusan_id`, `mahasiswa_nama`, `mahasiswa_npm`, `mahasiswa_jenis_kelamin`, `mahasiswa_jenis_praktek`) VALUES
(1, 15, 3, 'Aida Fitri Yana', '052021001', 'Perempuan', 'Keperawatan-Profesi Ners'),
(2, 15, 3, 'ellyn Dwi Nindia Putri', '052021002', 'Perempuan', 'Keperawatan-Profesi Ners'),
(3, 15, 3, 'Elly Sabet', '052021003', 'Perempuan', 'Keperawatan-Profesi Ners'),
(4, 15, 3, 'Nesia Mahyuni', '052021004', 'Perempuan', 'Keperawatan-Profesi Ners'),
(5, 15, 3, 'Puteri Sollahirpa', '052021005', 'Perempuan', 'Keperawatan-Profesi Ners'),
(6, 15, 3, 'Nurul Halimah', '052021006', 'Perempuan', 'Keperawatan-Profesi Ners'),
(7, 15, 3, 'Tri Agusmi', '052021007', 'Perempuan', 'Keperawatan-Profesi Ners'),
(8, 15, 3, 'wahyu alvia aisyara', '052021008', 'Perempuan', 'Keperawatan-Profesi Ners'),
(9, 15, 3, 'Puteri Redtycha', '052021009', 'Perempuan', 'Keperawatan-Profesi Ners'),
(10, 16, 1, 'Adelia Septiani', '20001', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(11, 16, 1, 'Angela Putri Efandri', '20002', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(12, 16, 1, 'Anggita Nur Shafitri', '20003', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(13, 16, 1, 'Anggun Tri Wahyuni', '20004', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(14, 16, 1, 'Audrey Sheyla Putri', '20005', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(15, 16, 1, 'Ayu Cahya Ningsih', '20006', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(16, 16, 1, 'Azzah Ratu Zikra', '20007', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(17, 16, 1, 'Bunga Sukma Arum', '20008', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(18, 16, 1, 'Dana Sitepu', '20009', 'Laki-laki', 'Keperawatan D3-Praktek Klinik'),
(19, 16, 1, 'Daniva Indah Asyari', '20010', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(20, 16, 1, 'Dian Putri Ramadhani', '20011', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(21, 16, 1, 'Dine Pramaessella', '20012', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(22, 16, 1, 'Dini Fitricia Dulas', '20013', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(23, 16, 1, 'Fajar Kurnia Putra', '20014', 'Laki-laki', 'Keperawatan D3-Praktek Klinik'),
(24, 16, 1, 'Febi Ocah', '20015', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(25, 16, 1, 'Gusniwar', '20016', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(26, 16, 1, 'Hendrique Fhanandez', '20017', 'Laki-laki', 'Keperawatan D3-Praktek Klinik'),
(27, 16, 1, 'Hisma Tri Ananda', '20018', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(28, 16, 1, 'Indah Patliscia', '20019', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(29, 16, 1, 'Jihan Irma Suryani', '20020', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(30, 16, 1, 'Ladi Diana Lumbangaol', '20022', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(31, 16, 1, 'Lafika Sari', '20023', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(32, 16, 1, 'Lara Dwi Permatasari', '20024', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(33, 16, 1, 'Latifah Nur’aini Salsabila', '20025', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(34, 16, 1, 'Mitha Febia Andiri', '20026', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(35, 16, 1, 'Muhammad Iqbal', '20027', 'Laki-laki', 'Keperawatan D3-Praktek Klinik'),
(36, 16, 1, 'Muzi Tahrim', '20028', 'Laki-laki', 'Keperawatan D3-Praktek Klinik'),
(37, 16, 1, 'Putra Tua Sihaloho', '20029', 'Laki-laki', 'Keperawatan D3-Praktek Klinik'),
(38, 16, 1, 'Rahma Sari Ridwan', '20030', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(39, 16, 1, 'Rama Yongki Putra', '20031', 'Laki-laki', 'Keperawatan D3-Praktek Klinik'),
(40, 16, 1, 'Rindy Sri Hamesta', '20032', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(41, 16, 1, 'Sahmai Adha Purba', '20033', 'Laki-laki', 'Keperawatan D3-Praktek Klinik'),
(42, 16, 1, 'Shinta Rahmawati', '20034', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(43, 16, 1, 'Siskia Khairunnisak', '20035', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(44, 16, 1, 'Siti Ayu Intan Widuri', '20036', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(45, 16, 1, 'Syifa Lavica Rethy', '20037', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(46, 16, 1, 'Utari Kharisna', '20038', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(47, 16, 1, 'Wika Nofita', '20039', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(48, 16, 1, 'Wulan Ls', '20040', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(49, 16, 1, 'Yosa Ari Susanti', '20041', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(50, 16, 1, 'Yulita Nurazizah', '20042', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(52, 25, 1, 'Mahasiswa 1', '123123', 'Laki-laki', 'Keperawatan D3-Praktek Klinik'),
(53, 25, 1, 'Mahasiswa 2', '123124', 'Perempuan', 'Keperawatan D3-Praktek Klinik'),
(54, 26, 4, 'Mhs 1', '202201', 'Laki-laki', 'Kedokteran S1-Kepaniteraan Klinik Senior'),
(55, 26, 4, 'Mhs 2', '202202', 'Perempuan', 'Kedokteran S1-Kepaniteraan Klinik Senior'),
(56, 26, 4, 'Mhs 3', '202203', 'Laki-laki', 'Kedokteran S1-Kepaniteraan Klinik Senior');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nilai_id` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `nilai_angka` double NOT NULL,
  `nilai_huruf` varchar(256) NOT NULL,
  `keterangan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`nilai_id`, `mahasiswa_id`, `nilai_angka`, `nilai_huruf`, `keterangan`) VALUES
(4, 56, 92, 'A', '-'),
(5, 55, 82, 'B+', '-'),
(6, 54, 82, 'B+', '-');

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

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`periode_id`, `periode_nama`, `status`) VALUES
(2, '6 s/d 10 Juni', 'terkirim'),
(3, '22 s/d 29 Juni 2022', 'terkirim');

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
-- Table structure for table `upload_nilai`
--

CREATE TABLE `upload_nilai` (
  `id` int(11) NOT NULL,
  `file` varchar(256) NOT NULL,
  `type` varchar(256) NOT NULL,
  `size` varchar(256) NOT NULL,
  `jadwal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload_nilai`
--

INSERT INTO `upload_nilai` (`id`, `file`, `type`, `size`, `jadwal_id`) VALUES
(4, 'Basic_Export_Preview.pdf', '.pdf', '4.46', 26);

-- --------------------------------------------------------

--
-- Table structure for table `upload_tugas`
--

CREATE TABLE `upload_tugas` (
  `id` int(11) NOT NULL,
  `id_pembimbing` int(11) NOT NULL,
  `judul_tugas` varchar(256) NOT NULL,
  `catatan` text NOT NULL,
  `file` varchar(256) NOT NULL,
  `type` varchar(256) NOT NULL,
  `size` varchar(256) NOT NULL,
  `cretaedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL,
  `user` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload_tugas`
--

INSERT INTO `upload_tugas` (`id`, `id_pembimbing`, `judul_tugas`, `catatan`, `file`, `type`, `size`, `cretaedAt`, `status`, `user`) VALUES
(2, 5, 'Tugas 2', '', 'dummy14.pdf', '.pdf', '12.95', '2022-06-16 05:02:48', 2, '202201'),
(3, 5, 'Seminar Kesehatan Jiwa', 'Untuk pak bahri dar Mhs 1', 'label_(1)1.pdf', '.pdf', '10.82', '2022-06-16 05:19:17', 2, '202201'),
(4, 5, 'Seminar Kesehatan Jiwa 2', 'Untuk pak bahri', 'label1.pdf', '.pdf', '12.93', '2022-06-16 05:19:19', 2, '202201');

-- --------------------------------------------------------

--
-- Table structure for table `uraian_tugas`
--

CREATE TABLE `uraian_tugas` (
  `tugas_id` int(11) NOT NULL,
  `periode_id` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uraian_tugas`
--

INSERT INTO `uraian_tugas` (`tugas_id`, `periode_id`, `keterangan`) VALUES
(2, 2, '<p>Datang Jam 7.30 senin sd jumat</p>'),
(3, 3, '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><b>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce pretium nisi ut nulla aliquet aliquam. Nunc non ultrices turpis. Nullam laoreet mauris at ante aliquet, sed volutpat nunc fringilla. Fusce id tincidunt mauris. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec auctor accumsan viverra. Sed iaculis placerat lacinia. Vivamus porta, quam eget volutpat condimentum, nunc ante interdum massa, sed lacinia leo elit vitae lorem. Proin at purus et enim ornare consectetur at fermentum quam. Morbi purus risus, sollicitudin vitae gravida in, feugiat nec dui. Aliquam lacinia justo dapibus tempor pretium. Nam pellentesque rutrum mi, eu porta sapien pulvinar quis. Nulla ac pharetra nunc. Suspendisse potenti. Nulla elementum, lorem id gravida finibus, ligula nisl molestie magna, ac tristique massa mauris pretium turpis.</b></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec dapibus, enim et cursus auctor, elit odio viverra neque, sit amet dignissim diam nulla eu tellus. Curabitur gravida a turpis sit amet pretium. Integer id erat venenatis, faucibus nisi at, venenatis enim. Praesent fermentum tortor enim. Sed vitae arcu velit. Duis mollis a ante vel porta. Praesent lacinia felis leo, in sagittis tellus vehicula ut. Maecenas commodo bibendum urna, at lobortis libero viverra commodo. Mauris enim magna, pulvinar vel mollis ac, volutpat quis ipsum. Suspendisse congue, eros cursus gravida iaculis, ipsum quam pharetra urna, in auctor nisi quam at mauris. Quisque vitae orci vel lectus fermentum consectetur. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean condimentum augue sit amet ipsum dignissim, sit amet lacinia odio blandit.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Nam a ex eu diam suscipit luctus sed et libero. Quisque pulvinar in arcu sed facilisis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Cras vitae euismod erat, non dignissim mi. Sed at sodales magna. Integer sit amet tellus scelerisque, facilisis magna sit amet, sagittis lacus. Phasellus euismod nibh quis est semper, at accumsan purus eleifend. Sed sed sem a lorem hendrerit lobortis.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Curabitur euismod ornare massa, non vestibulum felis efficitur eu. Morbi pellentesque mi risus, ac auctor nisl condimentum in. Curabitur quis nibh mattis sem lacinia tempus. Nam eget faucibus augue, id auctor purus. Suspendisse potenti. Integer id augue turpis. Integer pulvinar, quam vel consectetur ultrices, ex tellus rhoncus mi, interdum sodales metus odio vitae mi. Sed in eros a quam accumsan congue sed venenatis odio.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Vivamus bibendum dolor non placerat consequat. Quisque mauris est, faucibus at felis quis, volutpat hendrerit lorem. Donec fringilla quis sem in consequat. Etiam ullamcorper odio mi, et dictum orci fringilla sit amet. Phasellus lobortis sollicitudin risus, id faucibus tortor aliquam eget. Vestibulum eget dignissim mi. Pellentesque interdum ornare nisi et elementum. Curabitur ultrices enim ut congue finibus.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role_id` int(2) NOT NULL,
  `institusi_id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama_akun` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL,
  `is_active` enum('Aktif','Tidak Aktif') NOT NULL,
  `date_created` int(20) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`, `institusi_id`, `username`, `password`, `nama_akun`, `image`, `is_active`, `date_created`, `keterangan`, `id_user`) VALUES
(1, 1, 0, 'ssadmin', '$2y$10$3hXbvUZOPc61VHV9/O6KxuMGP2bjaD4pDu8f9hzdj/WNOIHt.qI76', 'Super Admin', 'programmer.png', 'Aktif', 13145, '', 0),
(2, 2, 0, 'admin', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'Admin Diklat', 'default.png', 'Aktif', 1601609879, '', 0),
(26, 6, 0, 'kabid_diklat', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'Kabid Diklat', 'default.png', 'Aktif', 2020, '', 0),
(27, 4, 3, 'IP033', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'D 3 RMIK STIKes Dharma Landbouw Padang', 'default.png', 'Aktif', 1601609879, '', 0),
(28, 4, 4, 'IP029', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'D 3 Keperawatan Akper Baiturrahmah Padang', 'default.png', 'Aktif', 1601609879, '', 0),
(29, 4, 5, 'IP018', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'S 1 Farmasi Sekolah Tinggi Ilmu Farmasi (STIFarm) Padang', 'default.png', 'Aktif', 1601609879, '', 0),
(30, 4, 6, 'IP005', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'S 1 Keperawatan STIKes YPAK Padang', 'default.png', 'Aktif', 1601609879, '', 0),
(31, 4, 7, 'IP022', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'S 1 Psikologi Fakultas PsikologI UPI \"YPTK\" Padang', 'default.png', 'Aktif', 1601609879, '', 0),
(32, 4, 8, 'IP025', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'D 3 Keperawatan STIKes Mercubaktijaya Padang ', 'default.png', 'Aktif', 1601609879, '', 0),
(33, 4, 9, 'IP006', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'S 1 Keperawatan STIKes Mercubaktijaya Padang ', 'default.png', 'Aktif', 1601609879, '', 0),
(34, 4, 11, 'IP026', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'D 3 Keperawatan STIKes Perintis ', 'default.png', 'Aktif', 1601609879, '', 0),
(35, 4, 12, 'IP007', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'S 1 Keperawatan STIKes Perintis ', 'default.png', 'Aktif', 1601609879, '', 0),
(36, 4, 13, 'IP004', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'S 1 Keperawatan Fakultas Keperawatan UNAND ', 'default.png', 'Aktif', 1601609879, '', 0),
(37, 4, 14, 'IP003', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'S 2 Keperawatan Fakultas Keperawatan UNAND ', 'default.png', 'Aktif', 1601609879, '', 0),
(38, 4, 15, 'IP008', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'S 1 Keperawatan STIKes Syedza Saintika Padang', 'default.png', 'Aktif', 1601609879, '', 0),
(39, 4, 16, 'IP009', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'S 1 Keperawatan Fikes Universitas Dharmas Indonesia', 'default.png', 'Aktif', 1601609879, '', 0),
(40, 4, 17, 'IP010', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'S 1 Keperawatan STIKes Indonesia', 'default.png', 'Aktif', 1601609879, '', 0),
(41, 4, 18, 'IP011', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'S 1 Keperawatan STIKes Yarsi Sumbar Bukittinggi ', 'default.png', 'Aktif', 1601609879, '', 0),
(42, 4, 19, 'IP027', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'D 3 Keperawatan STIKes Yarsi Sumbar Bukittinggi ', 'default.png', 'Aktif', 1601609879, '', 0),
(43, 4, 21, 'IP002', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'S 1 Kedokteran Fakultas Kedokteran (UNBRAH)', 'default.png', 'Aktif', 1601609879, '', 0),
(44, 4, 22, 'IP012', '$2y$10$tBLQvPBFORwLcT1HA0XkA.gucLaZSVdGMaSG4zjxdw1VmtHhhRPR.', 'S 1 Keperawatan STIKes Ranah Minang', 'default.png', 'Aktif', 1601609879, '', 0),
(45, 4, 23, 'IP021', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'S 1 Psikologi Islam UIN Imam Bonjol Padang', 'default.png', 'Aktif', 1601609879, '', 0),
(46, 4, 24, 'IP013', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'S 1 Keperawatan STIKes Alifah Padang', 'default.png', 'Aktif', 1601609879, '', 0),
(47, 4, 26, 'IP015', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'S 1 Keperawatan STIKes Fort De Kock Bukittinggi', 'default.png', 'Aktif', 1601609879, '', 0),
(48, 4, 27, 'IP028', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'D 3 Keperawatan Akper Nabila ', 'default.png', 'Aktif', 1601609879, '', 0),
(49, 4, 28, 'IP016', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'S 1 Keperawatan Institut Kesehatan Prima Nusantara ', 'default.png', 'Aktif', 1601609879, '', 0),
(50, 4, 29, 'IP001', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'S 1 Kedokteran Fakultas Kedokteran Universitas Andalas', 'default.png', 'Aktif', 1601609879, '', 0),
(51, 4, 30, 'IP024', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'D 3 Keperawatan Poltekkes Kemenkes Padang', 'default.png', 'Aktif', 1601609879, '', 0),
(52, 4, 32, 'IP031', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'D 3 Keperawatan Akper Kesdam I/BB Padang', 'default.png', 'Aktif', 1601609879, '', 0),
(53, 4, 34, 'IP019', '$2y$10$COG0uMLeH.FOw7ngAPoTvuNx53zRjMZmfnueT5JbyKkiuSvwd9T7W', 'S 1 Farmasi Fakultas Farmasi UNAND', 'default.png', 'Aktif', 1601609879, '', 0),
(79, 4, 25, 'IP017', '$2y$10$r2Al/5i/57L2libyX3WCKOLUMwrJSmoPSaKB/MAOYrqqzZK3rFfIy', 'S1 Keperawatan Universitas Sumatera Barat', 'default.png', 'Tidak Aktif', 1644204967, 'S 1 Keperawatan STIKes Nan Tongga ', 0),
(80, 3, 32, 'PB001', '$2y$10$k9NEs9Lj82UZMj5Fquu6.Opmn26Z/hcj5CJ4QNo0iVNc7C3pZyCWu', 'dr. Dian Budianti Amalina, Sp.KJ', 'default.png', 'Aktif', 1648109670, 'Pembimbing Klinik', 0),
(82, 5, 5, '2021', '$2y$10$YfI0n9lq5oBK1SZYufQl4eQ.hJTGGNbe8mMJnCrV0feVAsYJOIlLO', 'Rio Mutiara', 'default.png', 'Aktif', 1654504854, '', 0),
(83, 3, 5, 'PB002', '$2y$10$uYWXNc05AHL1dMpaHUoRaey.K10UqqtMUPeG4a7SEgkCxMJr2K.FK', 'Ns. Nisa Lestari, S. Kep', 'default.png', 'Aktif', 1655277938, 'Pembimbing Klinik', 0),
(84, 5, 29, '202201', '$2y$10$Ju2QlJCZake9kkn0JaihzOfP04EX8sFrSl9PW9aC7xzcJmuetWuFW', 'Mhs 1', 'default.png', 'Aktif', 1655278768, '', 0),
(85, 5, 29, '202202', '$2y$10$4pZY/XAjQYbdZmeD7oRvLugtEA5snCrQaj.A8sn8wc1RCpd3O2a/q', 'Mhs 2', 'default.png', 'Aktif', 1655278799, '', 0),
(86, 5, 29, '202203', '$2y$10$fln4inUz99u8jGzQOW0MWufjYTugThcVfmC2LEZFJ8WBgmT1W8Jg2', 'Mhs 3', 'default.png', 'Aktif', 1655278814, '', 0),
(87, 3, 49, 'PB003', '$2y$10$DyXMv28zAXgLzMN73wV1cOlzfSc72tIufnMU50Mq7TIpQDihlmKB.', 'Bahri Putra Lubis', 'default.png', 'Aktif', 1655282953, 'Pembimbing Klinik', 0);

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
(54, 3, 2),
(55, 3, 8),
(57, 2, 2),
(60, 5, 2),
(61, 5, 9);

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
(7, 'Supervisor'),
(8, 'Pembimbing'),
(9, 'Mahasiswa');

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
(16, 5, 'Buat Jadwal', 'institusi/schedule', 'fas fa-fw fa-calendar-plus', 1),
(17, 5, 'Kirim Jadwal', 'institusi/dashboard', 'fas fa-fw fa-paper-plane', 1),
(20, 4, 'Jadwal Diklat', 'diklat/dashboard', 'fas fa-fw fa-calendar-check', 1),
(21, 4, 'Kalender Diklat', 'diklat/kuota', 'fas fa-fw fa-calendar', 1),
(22, 4, 'Pembagian Kelompok', 'diklat/kelompok', 'fas fa-fw fa-users', 1),
(23, 7, 'Approve User', 'supervisor/approval_user', 'fas fa-fw fa-user', 1),
(24, 7, 'Approve Jadwal', 'supervisor/approval_jadwal', 'fas fa-fw fa-calendar-alt', 1),
(25, 4, 'Kirim Mahasiswa', 'diklat/kirim_mahasiswa', 'fas fa-fw fa-paper-plane', 1),
(27, 6, 'Registrasi Pembimbing', 'registrasi/pembimbing', 'fas fa-fw fa-address-card', 1),
(28, 8, 'Input Nilai Mahasiswa', 'pembimbing/input_nilai', 'fas fa-fw fa-users', 1),
(29, 8, 'Kirim Nilai Mahasiswa', 'pembimbing/kirim_nilai', 'fas fa-fas fa-fw fa-paper-plane', 1),
(30, 4, 'Nilai Mahasiswa', 'diklat/nilai_mahasiswa', 'fas fa-fw fa-clipboard-check', 1),
(31, 5, 'Jadwal Praktek', 'institusi/jadwal_praktek', 'fas fa-fw fa-address-card', 1),
(32, 5, 'Rekap Nilai Mahasiswa', 'institusi/rekap_nilai', 'fas fa-fw fa-user-graduate', 1),
(312, 5, 'Download Nilai', 'institusi/download_nilai', 'fas fa-fw fa-download', 1),
(313, 9, 'Mahasiswa', 'mahasiswa', 'fas fa-users', 1),
(314, 6, 'Registrasi Mahasiswa', 'registrasi/mahasiswa', 'fas fa-users', 1),
(315, 8, 'Tugas Mahasiswa', 'pembimbing/tugasmahasiswa', 'nav-icon fas fa-book', 1);

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
,`institusi_id` int(11)
,`username` varchar(256)
);

-- --------------------------------------------------------

--
-- Structure for view `tabel_mahasiswa`
--
DROP TABLE IF EXISTS `tabel_mahasiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tabel_mahasiswa`  AS SELECT `jadwal`.`jadwal_id` AS `jadwal_id`, `jadwal`.`jadwal_nama` AS `jadwal_nama`, `jadwal`.`jadwal_mulai` AS `jadwal_mulai`, `jadwal`.`jadwal_akhir` AS `jadwal_akhir`, `jadwal`.`jadwal_status` AS `jadwal_status`, `jadwal`.`username` AS `username`, `jadwal`.`volume` AS `volume`, `jadwal`.`file` AS `file`, `jadwal`.`type` AS `type`, `jadwal`.`size` AS `size`, `mahasiswa`.`jadwal_id` AS `mahasiswa_jadwal_id`, `mahasiswa`.`mahasiswa_nama` AS `mahasiswa_nama`, `mahasiswa`.`mahasiswa_npm` AS `mahasiswa_npm`, `mahasiswa`.`mahasiswa_jenis_kelamin` AS `mahasiswa_jenis_kelamin`, `mahasiswa`.`mahasiswa_jenis_praktek` AS `mahasiswa_jenis_praktek` FROM (`jadwal` join `mahasiswa` on(`jadwal`.`jadwal_id` = `mahasiswa`.`jadwal_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `tabel_mahasiswa2`
--
DROP TABLE IF EXISTS `tabel_mahasiswa2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tabel_mahasiswa2`  AS SELECT `jadwal`.`jadwal_id` AS `jadwal_id`, `jadwal`.`jadwal_nama` AS `jadwal_nama`, `jadwal`.`jadwal_mulai` AS `jadwal_mulai`, `jadwal`.`jadwal_akhir` AS `jadwal_akhir`, `jadwal`.`jadwal_status` AS `jadwal_status`, `jadwal`.`username` AS `username`, `mahasiswa`.`jadwal_id` AS `mahasiswa_jadwal_id`, `mahasiswa`.`mahasiswa_nama` AS `mahasiswa_nama`, `mahasiswa`.`mahasiswa_npm` AS `mahasiswa_npm`, `mahasiswa`.`mahasiswa_jenis_kelamin` AS `mahasiswa_jenis_kelamin`, `mahasiswa`.`mahasiswa_jenis_praktek` AS `mahasiswa_jenis_praktek` FROM (`jadwal` join `mahasiswa` on(`jadwal`.`jadwal_id` = `mahasiswa`.`jadwal_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_jadwal`
--
DROP TABLE IF EXISTS `v_jadwal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jadwal`  AS SELECT `mahasiswa`.`mahasiswa_id` AS `mahasiswa_id`, `mahasiswa`.`jadwal_id` AS `jadwal_id`, `mahasiswa`.`jurusan_id` AS `jurusan_id`, `mahasiswa`.`mahasiswa_nama` AS `mahasiswa_nama`, `mahasiswa`.`mahasiswa_npm` AS `mahasiswa_npm`, `mahasiswa`.`mahasiswa_jenis_kelamin` AS `mahasiswa_jenis_kelamin`, `mahasiswa`.`mahasiswa_jenis_praktek` AS `mahasiswa_jenis_praktek`, `jadwal`.`jadwal_nama` AS `jadwal_nama`, `jadwal`.`file` AS `file`, `jadwal`.`type` AS `type`, `jurusan`.`jurusan_nama` AS `jurusan_nama` FROM ((`mahasiswa` join `jadwal` on(`mahasiswa`.`jadwal_id` = `jadwal`.`jadwal_id`)) join `jurusan` on(`jurusan`.`jurusan_id` = `mahasiswa`.`jurusan_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_jadwalinstitusi`
--
DROP TABLE IF EXISTS `v_jadwalinstitusi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jadwalinstitusi`  AS SELECT `institusi`.`institusi_nama` AS `institusi_nama`, `user`.`institusi_id` AS `institusi_id`, `jadwal`.`username` AS `username` FROM ((`user` join `institusi` on(`user`.`institusi_id` = `institusi`.`institusi_id`)) join `jadwal` on(`user`.`username` = `jadwal`.`username`)) ;

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
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`nilai_id`);

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
-- Indexes for table `upload_nilai`
--
ALTER TABLE `upload_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_tugas`
--
ALTER TABLE `upload_tugas`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `institusi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `jadwal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `jurusan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `kelompok_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `mahasiswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `pembimbing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `periode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `ruangan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `upload_nilai`
--
ALTER TABLE `upload_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `upload_tugas`
--
ALTER TABLE `upload_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `uraian_tugas`
--
ALTER TABLE `uraian_tugas`
  MODIFY `tugas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

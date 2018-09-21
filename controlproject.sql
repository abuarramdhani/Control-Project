-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2018 at 04:11 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `controlproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `credit_code` varchar(20) NOT NULL,
  `name_agen` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`credit_code`, `name_agen`, `address`) VALUES
('A-004', 'ANTALI JAYA MANDIRI, PT', 'Jl. Ot. Pattimaipauw SK. No. 37'),
('A-012', 'ANUGERAH PRIMA SEJAHTERAH, PT', 'Jl. Manggis Raya 44 Bojong Indah'),
('A-013', 'ALDORA SUKSES PERKASA', 'Jl.RE. Martadinata Komplek Pergudangan '),
('A-017', 'ADIB COLD LOGISTIC', 'Jl Puskesmas Lama No39 RT 005 RW 001'),
('B-003', 'BERKAH MUTIARA LAUT', 'Yos Sudarso'),
('B-004', 'BERKAH AGUNG MULIA, PT', 'Surabaya'),
('B-007', 'BINTANG LAUT PLATINUM, PT', 'Jl. Tanjung Sadari No. 125'),
('B-008', 'BORNEO FAMILI TRANSPORTAMA PT.', 'Pontianak'),
('B-011', 'BANGUN PAPUA, PT', 'Jl. Sungai memberamo kpr bni block a'),
('B-012', 'BINTAN MEGAH ABADI', ''),
('B-020', 'BUANA KONTENINDO EXPRESS, PT', 'Jl Abdul Muis No 80A,'),
('BER001', 'BERKAT RUKUN', 'BANJARMASIN'),
('C-005', 'CV. MAJU TRANS', 'Jl. Raya Manado - Bitung KM 28'),
('C-019', 'CITRA MANDIRI SEJATI, PT', ''),
('C-021', 'Charisma Sriwijaya Transindo, PT (Palembang)', 'JL RE MARTADINATA LR AMAL NO 3474'),
('E-001', 'EMKL IDAR GEMILANG, PT', 'Kompleks Pelabuhan A. Yani'),
('H-001', 'HALUANREZKI NUSACINDO, PT', 'JL. MANUNGGAL  NO. 9 RT. 32'),
('H-003', 'HARIBIMA ANUGRAH DAMARA , PT', 'Jl. Ganet No 2'),
('I-003', 'INTI LINGGA SEJAHTERA , PT', 'Jakarta\r\n'),
('J-001', 'JASA BERSAUDARA TRANS', 'Jl. Bung Tomo Swadaya II No.2A');

-- --------------------------------------------------------

--
-- Table structure for table `ap`
--

CREATE TABLE `ap` (
  `inv_ag` varchar(20) NOT NULL,
  `pay_ag` int(11) NOT NULL,
  `date_ag` date NOT NULL,
  `inv_ag_date` date DEFAULT NULL,
  `rent_genset` varchar(30) NOT NULL,
  `inv_genset` varchar(20) DEFAULT NULL,
  `pay_genset` int(11) NOT NULL,
  `date_genset` date NOT NULL,
  `inv_genset_date` date DEFAULT NULL,
  `name_ship` varchar(30) DEFAULT NULL,
  `inv_ship` varchar(20) NOT NULL,
  `pay_ship` int(11) NOT NULL,
  `date_ship` date NOT NULL,
  `inv_ship_date` date DEFAULT NULL,
  `name_ag` varchar(50) DEFAULT NULL,
  `inv_thc` varchar(20) DEFAULT NULL,
  `pay_thc` int(11) DEFAULT NULL,
  `date_thc` date DEFAULT NULL,
  `inv_thc_date` date DEFAULT NULL,
  `inv_handl` varchar(20) DEFAULT NULL,
  `pay_handl` int(11) DEFAULT NULL,
  `date_handl` date DEFAULT NULL,
  `inv_handl_date` date DEFAULT NULL,
  `inv_plug` varchar(20) DEFAULT NULL,
  `pay_plug` int(11) DEFAULT NULL,
  `date_plug` date DEFAULT NULL,
  `inv_plug_date` date DEFAULT NULL,
  `inv_lain` varchar(20) DEFAULT NULL,
  `pay_lain` int(11) DEFAULT NULL,
  `date_lain` date DEFAULT NULL,
  `inv_lain_date` date DEFAULT NULL,
  `IMO` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ap`
--

INSERT INTO `ap` (`inv_ag`, `pay_ag`, `date_ag`, `inv_ag_date`, `rent_genset`, `inv_genset`, `pay_genset`, `date_genset`, `inv_genset_date`, `name_ship`, `inv_ship`, `pay_ship`, `date_ship`, `inv_ship_date`, `name_ag`, `inv_thc`, `pay_thc`, `date_thc`, `inv_thc_date`, `inv_handl`, `pay_handl`, `date_handl`, `inv_handl_date`, `inv_plug`, `pay_plug`, `date_plug`, `inv_plug_date`, `inv_lain`, `pay_lain`, `date_lain`, `inv_lain_date`, `IMO`) VALUES
('GQ 891', 179000, '0000-00-00', NULL, '', 'OP54546', 116960, '0000-00-00', NULL, 'INDO CONTAINER LINE, PT', 'YHJ676', 300000, '0000-00-00', NULL, 'JASA BERSAUDARA TRANS', '', 60070, '0000-00-00', NULL, '', 0, '0000-00-00', NULL, '', 0, '0000-00-00', NULL, '', 0, '0000-00-00', NULL, '24-08-002'),
('', 0, '2018-09-20', '2018-09-06', '', '', 0, '2018-09-16', '2018-09-14', 'INDO CONTAINER LINE, PT', '', 0, '2018-09-12', '2018-09-26', 'ALDORA SUKSES PERKASA', '', NULL, '2018-09-17', '2018-09-05', '', NULL, '2018-09-05', '2018-09-05', '', NULL, '2018-09-26', '2018-09-10', '', NULL, '2018-09-26', '2018-09-26', '11-11-001'),
('', 0, '0000-00-00', '0000-00-00', '', '', 0, '0000-00-00', '0000-00-00', 'PELAYARAN MERATUS, PT', '', 0, '0000-00-00', '0000-00-00', 'INTI LINGGA SEJAHTERA , PT', '', 0, '0000-00-00', '0000-00-00', '', 0, '0000-00-00', '0000-00-00', '', 0, '0000-00-00', '0000-00-00', '', 0, '0000-00-00', '0000-00-00', '11-11-002');

-- --------------------------------------------------------

--
-- Table structure for table `ap2`
--

CREATE TABLE `ap2` (
  `IMO` varchar(12) NOT NULL,
  `IMO_v2` varchar(12) NOT NULL,
  `name_cust` varchar(30) NOT NULL,
  `inv_cust` varchar(30) NOT NULL,
  `inv_ag` varchar(30) NOT NULL,
  `pay_ag` int(11) NOT NULL,
  `inv_genset` varchar(30) NOT NULL,
  `pay_genset` int(11) NOT NULL,
  `inv_ship` varchar(30) NOT NULL,
  `pay_ship` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ap2`
--

INSERT INTO `ap2` (`IMO`, `IMO_v2`, `name_cust`, `inv_cust`, `inv_ag`, `pay_ag`, `inv_genset`, `pay_genset`, `inv_ship`, `pay_ship`) VALUES
('11-11-002', '11-08-007', 'Mendelez', '', '', 100000, '', 350000, '', 0),
('18-09-005', '18-10-006', 'Sukanda +2', 'Kampina', 'GQ777', 0, 'TY777', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ar`
--

CREATE TABLE `ar` (
  `IMO` varchar(12) DEFAULT NULL,
  `inv_cust` varchar(20) DEFAULT NULL,
  `inv_date` date DEFAULT NULL,
  `name_cust` varchar(20) DEFAULT NULL,
  `no_plug` varchar(20) NOT NULL,
  `inv_plug_date` date DEFAULT NULL,
  `pay_plug` int(11) DEFAULT NULL,
  `plug_pay_date` date DEFAULT NULL,
  `pay_plug_paid` int(11) DEFAULT NULL,
  `pay_inv` int(11) DEFAULT NULL,
  `inv_pay_date` date DEFAULT NULL,
  `pay_inv_paid` int(11) DEFAULT NULL,
  `no_faktur` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ar`
--

INSERT INTO `ar` (`IMO`, `inv_cust`, `inv_date`, `name_cust`, `no_plug`, `inv_plug_date`, `pay_plug`, `plug_pay_date`, `pay_plug_paid`, `pay_inv`, `inv_pay_date`, `pay_inv_paid`, `no_faktur`) VALUES
('12-04-005', 'KY 7834', NULL, 'Campina', '', NULL, 0, NULL, NULL, 316000, NULL, NULL, 'SPT 567'),
('18-09-001', 'OY 7834', NULL, 'Mendelez', '', NULL, 0, NULL, NULL, 0, NULL, NULL, NULL),
('22-08-18', 'LO 6363', NULL, 'KFC', '', NULL, 0, NULL, NULL, 0, NULL, NULL, NULL),
('24-08-002', 'PO 3838383', NULL, 'KFC', '', NULL, 0, NULL, NULL, 0, NULL, NULL, NULL),
('11-11-001', 'OY 7839', '2018-09-07', 'KFC', 'NU 76i', '2018-09-29', 298000, '2018-09-28', 1108000, 218800, '2018-09-17', 199000, 'SPT 890'),
('11-11-002', 'UI 767', NULL, 'Campina', '', NULL, 0, NULL, NULL, 1346500, NULL, NULL, NULL),
('222', 'A', NULL, 'A', 'A', NULL, 0, NULL, NULL, 0, NULL, NULL, NULL),
('00-01-001a', 'OY 7834', NULL, 'AICE', 'IL 97', NULL, 0, NULL, 128000, 0, NULL, 298000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `container`
--

CREATE TABLE `container` (
  `no_container` varchar(20) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `container`
--

INSERT INTO `container` (`no_container`, `size`) VALUES
('1002421', '20 ft'),
('1002735', '20 ft'),
('1002843', '20 ft'),
('1003014', '20 ft'),
('1006369', '20 ft'),
('1008672', '20 ft'),
('1012335', '20 ft'),
('1012696', '20 ft'),
('1018423', '20 ft'),
('1018640', '20 ft'),
('1018721', '20 ft'),
('1018887', '20 ft'),
('1024555', '20 ft'),
('1033217', '20 ft'),
('1033243', '20 ft'),
('1033876', '20 ft'),
('1033881', '20 ft'),
('1034678', '20 ft'),
('1035307', '20 ft'),
('1035457', '20 ft'),
('1037043', '20 ft'),
('1037233', '20 ft'),
('1037362', '20 ft'),
('1037470', '20 ft'),
('1038093', '20 ft'),
('1038414', '20 ft'),
('1038419', '20 ft'),
('1038482', '20 ft'),
('1038693', '20 ft'),
('1038923', '20 ft'),
('1039107', '20 ft'),
('1041906', '20 ft'),
('1043133', '20 ft'),
('1043940', '20 ft'),
('1045481', '20 ft'),
('1048201', '20 ft'),
('1050984', '20 ft'),
('1051695', '20 ft'),
('1051843', '20 ft'),
('1052496', '20 ft'),
('1052602', '20 ft'),
('1052620', '20 ft'),
('1052726', '20 ft'),
('1052802', '20 ft'),
('1053105', '20 ft'),
('1053255', '20 ft'),
('1053510', '20 ft'),
('1053569', '20 ft'),
('1054631', '20 ft'),
('1054884', '20 ft'),
('1055094', '20 ft'),
('1055279', '20 ft'),
('1055704', '20 ft'),
('1055920', '20 ft'),
('1055941', '20 ft'),
('1056315', '20 ft'),
('1056510', '20 ft'),
('1057158', '20 ft'),
('1057380', '20 ft'),
('1058004', '20 ft'),
(NULL, ''),
(NULL, ''),
('1058257', '20 ft');

-- --------------------------------------------------------

--
-- Table structure for table `op`
--

CREATE TABLE `op` (
  `IMO` varchar(12) NOT NULL,
  `no_container` varchar(200) NOT NULL,
  `stuff_date` date NOT NULL,
  `no_shipment` varchar(20) DEFAULT NULL,
  `no_seal` varchar(20) DEFAULT NULL,
  `full_empty` varchar(30) DEFAULT NULL,
  `payment` int(11) DEFAULT NULL,
  `deliv_date` date NOT NULL,
  `origin_town` varchar(30) DEFAULT NULL,
  `dest_town` varchar(30) NOT NULL,
  `vessel_name` varchar(30) NOT NULL,
  `arv_at_dest` date NOT NULL,
  `unload_at_conc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `op`
--

INSERT INTO `op` (`IMO`, `no_container`, `stuff_date`, `no_shipment`, `no_seal`, `full_empty`, `payment`, `deliv_date`, `origin_town`, `dest_town`, `vessel_name`, `arv_at_dest`, `unload_at_conc`) VALUES
('00-01-001a', '', '2018-09-06', 'A101', 'A101', '', NULL, '2018-09-06', '', 'Bogor', 'A. Purnama', '2018-09-17', '2018-09-24'),
('11-11-001', '', '2020-00-00', '555', '555', 'Full', 2000000, '2018-09-12', 'Solo', 'Yogyakarta', 'A. Purnama', '2018-09-26', '0000-00-00'),
('11-11-002', '1008672  20 ft,1012696  20 ft', '2018-09-06', '', '', NULL, 0, '2018-09-10', NULL, 'Yogyakarta', 'Caya', '0000-00-00', '0000-00-00'),
('111', '1008672,1018721', '2018-09-26', '11', '11', NULL, 111, '2018-09-24', NULL, 'Sukoharjo', 'Titaninum', '0000-00-00', '0000-00-00'),
('12-04-005', 'TBSU 6074 109', '2018-09-14', NULL, NULL, NULL, NULL, '2018-09-28', NULL, 'Tangerang', 'Caya', '0000-00-00', '0000-00-00'),
('18-09-001', 'TBSU 6074 108', '2018-09-19', NULL, NULL, NULL, NULL, '2018-09-24', NULL, 'Bekasi', 'I. Bravo', '0000-00-00', '0000-00-00'),
('18-09-005', 'TBSU 1002421 20', '2020-00-00', NULL, NULL, NULL, NULL, '2018-09-17', NULL, 'Balikpapan', 'Titaninum', '0000-00-00', '0000-00-00'),
('22-08-18', 'TBSU 6074 108', '2018-09-07', NULL, NULL, NULL, NULL, '2018-09-20', NULL, 'Balikpapan', 'I. Bravo', '0000-00-00', '0000-00-00'),
('222', '1018423 20 ft', '2018-09-11', '222', '22', 'Empty', NULL, '2018-09-02', 'Bandung', 'Bogor', 'A. Purnama', '0000-00-00', '0000-00-00'),
('24-08-002', 'TB8U 3126349', '2018-08-24', NULL, NULL, NULL, NULL, '2018-08-25', NULL, 'Singkawang', 'Titanium', '0000-00-00', '0000-00-00'),
('24-08-003', '1003014  20 ft,1008672  20 ft,1012696  20 ft', '2018-08-24', 'YJ 7272', 'AAA000', NULL, 7000000, '2018-08-25', NULL, 'Banjarmasin', 'O.Samudra', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `ship`
--

CREATE TABLE `ship` (
  `credit_code` varchar(20) NOT NULL,
  `name_ship` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ship`
--

INSERT INTO `ship` (`credit_code`, `name_ship`, `address`) VALUES
('201I005', 'INDONESIAN FORTUNE LLOYD, PT', 'Jl. Kebon Bawang VI no. 68C'),
('C-015', 'CTP Line', 'Jl. Tomang Raya No. 57'),
('I-001', 'INDO CONTAINER LINE, PT', 'Jl. Sunter Kirana Raya Blok NB 2 No. 1'),
('P-002', 'PELAYARAN MERATUS, PT', 'GEDUNG YOS SUDARSO'),
('P-003', 'PELNI, PT', 'Jakarta'),
('P-006', 'PT PPN PANURJWAN', 'Komp. Yos Sudarso Megah Blok B-15'),
('P-009', 'PELAYARAN MERATUS, PT (SBY)', 'GEDUNG YOS SUDARSO');

-- --------------------------------------------------------

--
-- Table structure for table `truck`
--

CREATE TABLE `truck` (
  `IMO` varchar(12) NOT NULL,
  `inv_truck` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `tujuan` varchar(30) NOT NULL,
  `pesanan` varchar(30) NOT NULL,
  `no_pol` varchar(10) NOT NULL,
  `jam` varchar(6) NOT NULL,
  `muatan` varchar(30) NOT NULL,
  `ukuran` varchar(20) NOT NULL,
  `b_jajan` varchar(30) NOT NULL,
  `b_kom` varchar(30) NOT NULL,
  `b_kawal` varchar(30) NOT NULL,
  `b_lain` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `truck`
--

INSERT INTO `truck` (`IMO`, `inv_truck`, `name`, `date`, `tujuan`, `pesanan`, `no_pol`, `jam`, `muatan`, `ukuran`, `b_jajan`, `b_kom`, `b_kawal`, `b_lain`) VALUES
('11-11-001', 'UK 733E', 'Koko', '2018-09-19', 'Banjarnegara', 'MTY 1x20', 'AB 7474 I', '19:00', 'TBSU 8807666', '20 ft', '90.000', '', '', ''),
('11-11-002', 'IK 920p', 'Hana', '2018-09-20', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `truck2`
--

CREATE TABLE `truck2` (
  `IMO_v2` varchar(12) NOT NULL,
  `name_truck` varchar(30) NOT NULL,
  `inv_truck` varchar(30) NOT NULL,
  `pay_truck` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `truck2`
--

INSERT INTO `truck2` (`IMO_v2`, `name_truck`, `inv_truck`, `pay_truck`) VALUES
('18-10-006', 'Deseel', '', ''),
('11-08-007', 'Komatsuuu', 'UK 733o', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `job_tittle` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `username`, `password`, `job_tittle`) VALUES
('Anna Melati', 'amel', 'amel', 'Truck'),
('Ani Anggraeni Putri', 'aniang', 'aniang', 'AP'),
('Iqbal', 'bal', 'bal', 'SuperAdmin'),
('Budi Surbakti', 'budisur', 'budisur', 'AR'),
('Juke Sentosa', 'juse', 'juse', 'Pajak'),
('Rina Permata', 'rinaper', 'rinaper', 'OP'),
('Santi Budiman', 'santibu', 'santibu', 'Supervisor'),
('Yuni Damayanti', 'yunida', 'yunida', 'Controller');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`credit_code`);

--
-- Indexes for table `ap`
--
ALTER TABLE `ap`
  ADD KEY `IMO` (`IMO`);

--
-- Indexes for table `ap2`
--
ALTER TABLE `ap2`
  ADD PRIMARY KEY (`IMO_v2`),
  ADD KEY `IMO` (`IMO`);

--
-- Indexes for table `op`
--
ALTER TABLE `op`
  ADD PRIMARY KEY (`IMO`);

--
-- Indexes for table `ship`
--
ALTER TABLE `ship`
  ADD PRIMARY KEY (`credit_code`);

--
-- Indexes for table `truck`
--
ALTER TABLE `truck`
  ADD KEY `IMO` (`IMO`);

--
-- Indexes for table `truck2`
--
ALTER TABLE `truck2`
  ADD KEY `IMO_v2` (`IMO_v2`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ap`
--
ALTER TABLE `ap`
  ADD CONSTRAINT `ap_ibfk_1` FOREIGN KEY (`IMO`) REFERENCES `op` (`IMO`);

--
-- Constraints for table `ap2`
--
ALTER TABLE `ap2`
  ADD CONSTRAINT `ap2_ibfk_1` FOREIGN KEY (`IMO`) REFERENCES `op` (`IMO`);

--
-- Constraints for table `truck`
--
ALTER TABLE `truck`
  ADD CONSTRAINT `truck_ibfk_1` FOREIGN KEY (`IMO`) REFERENCES `op` (`IMO`);

--
-- Constraints for table `truck2`
--
ALTER TABLE `truck2`
  ADD CONSTRAINT `truck2_ibfk_1` FOREIGN KEY (`IMO_v2`) REFERENCES `ap2` (`IMO_v2`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

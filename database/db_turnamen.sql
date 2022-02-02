-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2022 at 09:44 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_turnamen`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dtl_pertandingan`
--

CREATE TABLE `tb_dtl_pertandingan` (
  `id_dtl_pertandingan` int(11) NOT NULL,
  `id_team` varchar(25) DEFAULT NULL,
  `hasil` enum('MENANG','KALAH','SERI') DEFAULT NULL,
  `skor` varchar(2) DEFAULT '',
  `id_pertandingan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dtl_pertandingan`
--

INSERT INTO `tb_dtl_pertandingan` (`id_dtl_pertandingan`, `id_team`, `hasil`, `skor`, `id_pertandingan`) VALUES
(1069, 'TM2022010001', 'MENANG', '3', 'VS20220100001'),
(1070, 'TM2022010006', 'KALAH', '0', 'VS20220100001'),
(1071, 'TM2022010001', 'KALAH', '0', 'VS20220100002'),
(1072, 'TM2022010009', 'MENANG', '3', 'VS20220100002'),
(1073, 'TM2022010001', 'SERI', '1', 'VS20220100003'),
(1074, 'TM2022010012', 'SERI', '1', 'VS20220100003'),
(1075, 'TM2022010001', 'MENANG', '3', 'VS20220100004'),
(1076, 'TM2022010019', 'KALAH', '0', 'VS20220100004'),
(1077, 'TM2022010006', 'MENANG', '3', 'VS20220100005'),
(1078, 'TM2022010001', 'KALAH', '0', 'VS20220100005'),
(1079, 'TM2022010006', 'MENANG', '3', 'VS20220100006'),
(1080, 'TM2022010009', 'KALAH', '0', 'VS20220100006'),
(1081, 'TM2022010006', 'MENANG', '3', 'VS20220100007'),
(1082, 'TM2022010012', 'KALAH', '0', 'VS20220100007'),
(1083, 'TM2022010006', 'MENANG', '3', 'VS20220100008'),
(1084, 'TM2022010019', 'KALAH', '0', 'VS20220100008'),
(1085, 'TM2022010009', 'MENANG', '3', 'VS20220100009'),
(1086, 'TM2022010001', 'KALAH', '0', 'VS20220100009'),
(1087, 'TM2022010009', 'MENANG', '3', 'VS20220100010'),
(1088, 'TM2022010006', 'KALAH', '0', 'VS20220100010'),
(1089, 'TM2022010009', 'MENANG', '3', 'VS20220100011'),
(1090, 'TM2022010012', 'KALAH', '0', 'VS20220100011'),
(1091, 'TM2022010009', 'MENANG', '3', 'VS20220100012'),
(1092, 'TM2022010019', 'KALAH', '0', 'VS20220100012'),
(1093, 'TM2022010012', 'MENANG', '3', 'VS20220100013'),
(1094, 'TM2022010001', 'KALAH', '0', 'VS20220100013'),
(1095, 'TM2022010012', 'KALAH', '0', 'VS20220100014'),
(1096, 'TM2022010006', 'MENANG', '3', 'VS20220100014'),
(1097, 'TM2022010012', 'MENANG', '3', 'VS20220100015'),
(1098, 'TM2022010009', 'KALAH', '0', 'VS20220100015'),
(1099, 'TM2022010012', 'MENANG', '3', 'VS20220100016'),
(1100, 'TM2022010019', 'KALAH', '0', 'VS20220100016'),
(1101, 'TM2022010019', 'MENANG', '3', 'VS20220100017'),
(1102, 'TM2022010001', 'KALAH', '0', 'VS20220100017'),
(1103, 'TM2022010019', 'KALAH', '0', 'VS20220100018'),
(1104, 'TM2022010006', 'MENANG', '3', 'VS20220100018'),
(1105, 'TM2022010019', 'MENANG', '3', 'VS20220100019'),
(1106, 'TM2022010009', 'KALAH', '0', 'VS20220100019'),
(1107, 'TM2022010019', 'MENANG', '3', 'VS20220100020'),
(1108, 'TM2022010012', 'KALAH', '0', 'VS20220100020'),
(1109, 'TM2022010008', 'MENANG', '3', 'VS20220100021'),
(1110, 'TM2022010013', 'KALAH', '0', 'VS20220100021'),
(1111, 'TM2022010008', 'MENANG', '3', 'VS20220100022'),
(1112, 'TM2022010014', 'KALAH', '0', 'VS20220100022'),
(1113, 'TM2022010008', 'MENANG', '3', 'VS20220100023'),
(1114, 'TM2022010016', 'KALAH', '0', 'VS20220100023'),
(1115, 'TM2022010008', 'SERI', '1', 'VS20220100024'),
(1116, 'TM2022010017', 'SERI', '1', 'VS20220100024'),
(1117, 'TM2022010013', 'MENANG', '3', 'VS20220100025'),
(1118, 'TM2022010008', 'KALAH', '0', 'VS20220100025'),
(1119, 'TM2022010013', 'MENANG', '3', 'VS20220100026'),
(1120, 'TM2022010014', 'KALAH', '0', 'VS20220100026'),
(1121, 'TM2022010013', 'MENANG', '3', 'VS20220100027'),
(1122, 'TM2022010016', 'KALAH', '0', 'VS20220100027'),
(1123, 'TM2022010013', 'MENANG', '3', 'VS20220100028'),
(1124, 'TM2022010017', 'KALAH', '0', 'VS20220100028'),
(1125, 'TM2022010014', 'MENANG', '3', 'VS20220100029'),
(1126, 'TM2022010008', 'KALAH', '0', 'VS20220100029'),
(1127, 'TM2022010014', 'SERI', '1', 'VS20220100030'),
(1128, 'TM2022010013', 'SERI', '1', 'VS20220100030'),
(1129, 'TM2022010014', 'MENANG', '3', 'VS20220100031'),
(1130, 'TM2022010016', 'KALAH', '0', 'VS20220100031'),
(1131, 'TM2022010014', 'MENANG', '3', 'VS20220100032'),
(1132, 'TM2022010017', 'KALAH', '0', 'VS20220100032'),
(1133, 'TM2022010016', 'MENANG', '3', 'VS20220100033'),
(1134, 'TM2022010008', 'KALAH', '0', 'VS20220100033'),
(1135, 'TM2022010016', 'MENANG', '3', 'VS20220100034'),
(1136, 'TM2022010013', 'KALAH', '0', 'VS20220100034'),
(1137, 'TM2022010016', 'MENANG', '3', 'VS20220100035'),
(1138, 'TM2022010014', 'KALAH', '0', 'VS20220100035'),
(1139, 'TM2022010016', 'MENANG', '3', 'VS20220100036'),
(1140, 'TM2022010017', 'KALAH', '0', 'VS20220100036'),
(1141, 'TM2022010017', 'MENANG', '3', 'VS20220100037'),
(1142, 'TM2022010008', 'KALAH', '0', 'VS20220100037'),
(1143, 'TM2022010017', 'MENANG', '3', 'VS20220100038'),
(1144, 'TM2022010013', 'KALAH', '0', 'VS20220100038'),
(1145, 'TM2022010017', 'MENANG', '3', 'VS20220100039'),
(1146, 'TM2022010014', 'KALAH', '0', 'VS20220100039'),
(1147, 'TM2022010017', 'MENANG', '3', 'VS20220100040'),
(1148, 'TM2022010016', 'KALAH', '0', 'VS20220100040'),
(1149, 'TM2022010002', 'MENANG', '3', 'VS20220100041'),
(1150, 'TM2022010010', 'KALAH', '0', 'VS20220100041'),
(1151, 'TM2022010002', 'SERI', '1', 'VS20220100042'),
(1152, 'TM2022010011', 'SERI', '1', 'VS20220100042'),
(1153, 'TM2022010002', 'MENANG', '3', 'VS20220100043'),
(1154, 'TM2022010015', 'KALAH', '0', 'VS20220100043'),
(1155, 'TM2022010002', 'MENANG', '3', 'VS20220100044'),
(1156, 'TM2022010020', 'KALAH', '0', 'VS20220100044'),
(1157, 'TM2022010010', 'KALAH', '0', 'VS20220100045'),
(1158, 'TM2022010002', 'MENANG', '3', 'VS20220100045'),
(1159, 'TM2022010010', 'MENANG', '3', 'VS20220100046'),
(1160, 'TM2022010011', 'KALAH', '0', 'VS20220100046'),
(1161, 'TM2022010010', 'MENANG', '3', 'VS20220100047'),
(1162, 'TM2022010015', 'KALAH', '0', 'VS20220100047'),
(1163, 'TM2022010010', 'MENANG', '3', 'VS20220100048'),
(1164, 'TM2022010020', 'KALAH', '0', 'VS20220100048'),
(1165, 'TM2022010011', 'MENANG', '3', 'VS20220100049'),
(1166, 'TM2022010002', 'KALAH', '0', 'VS20220100049'),
(1167, 'TM2022010011', 'MENANG', '3', 'VS20220100050'),
(1168, 'TM2022010010', 'KALAH', '0', 'VS20220100050'),
(1169, 'TM2022010011', 'MENANG', '3', 'VS20220100051'),
(1170, 'TM2022010015', 'KALAH', '0', 'VS20220100051'),
(1171, 'TM2022010011', 'MENANG', '3', 'VS20220100052'),
(1172, 'TM2022010020', 'KALAH', '0', 'VS20220100052'),
(1173, 'TM2022010015', 'MENANG', '3', 'VS20220100053'),
(1174, 'TM2022010002', 'KALAH', '0', 'VS20220100053'),
(1175, 'TM2022010015', 'MENANG', '3', 'VS20220100054'),
(1176, 'TM2022010010', 'KALAH', '0', 'VS20220100054'),
(1177, 'TM2022010015', 'KALAH', '0', 'VS20220100055'),
(1178, 'TM2022010011', 'MENANG', '3', 'VS20220100055'),
(1179, 'TM2022010015', 'MENANG', '3', 'VS20220100056'),
(1180, 'TM2022010020', 'KALAH', '0', 'VS20220100056'),
(1181, 'TM2022010020', 'MENANG', '3', 'VS20220100057'),
(1182, 'TM2022010002', 'KALAH', '0', 'VS20220100057'),
(1183, 'TM2022010020', 'MENANG', '3', 'VS20220100058'),
(1184, 'TM2022010010', 'KALAH', '0', 'VS20220100058'),
(1185, 'TM2022010020', 'MENANG', '3', 'VS20220100059'),
(1186, 'TM2022010011', 'KALAH', '0', 'VS20220100059'),
(1187, 'TM2022010020', 'MENANG', '3', 'VS20220100060'),
(1188, 'TM2022010015', 'KALAH', '0', 'VS20220100060'),
(1189, 'TM2022010003', 'MENANG', '3', 'VS20220100061'),
(1190, 'TM2022010004', 'KALAH', '0', 'VS20220100061'),
(1191, 'TM2022010003', 'MENANG', '3', 'VS20220100062'),
(1192, 'TM2022010005', 'KALAH', '0', 'VS20220100062'),
(1193, 'TM2022010003', 'MENANG', '3', 'VS20220100063'),
(1194, 'TM2022010007', 'KALAH', '0', 'VS20220100063'),
(1195, 'TM2022010003', 'MENANG', '3', 'VS20220100064'),
(1196, 'TM2022010018', 'KALAH', '0', 'VS20220100064'),
(1197, 'TM2022010004', 'MENANG', '3', 'VS20220100065'),
(1198, 'TM2022010003', 'KALAH', '0', 'VS20220100065'),
(1199, 'TM2022010004', 'MENANG', '3', 'VS20220100066'),
(1200, 'TM2022010005', 'KALAH', '0', 'VS20220100066'),
(1201, 'TM2022010004', 'MENANG', '3', 'VS20220100067'),
(1202, 'TM2022010007', 'KALAH', '0', 'VS20220100067'),
(1203, 'TM2022010004', 'MENANG', '3', 'VS20220100068'),
(1204, 'TM2022010018', 'KALAH', '0', 'VS20220100068'),
(1205, 'TM2022010005', 'MENANG', '3', 'VS20220100069'),
(1206, 'TM2022010003', 'KALAH', '0', 'VS20220100069'),
(1207, 'TM2022010005', 'MENANG', '3', 'VS20220100070'),
(1208, 'TM2022010004', 'KALAH', '0', 'VS20220100070'),
(1209, 'TM2022010005', 'MENANG', '3', 'VS20220100071'),
(1210, 'TM2022010007', 'KALAH', '0', 'VS20220100071'),
(1211, 'TM2022010005', 'KALAH', '0', 'VS20220100072'),
(1212, 'TM2022010018', 'MENANG', '3', 'VS20220100072'),
(1213, 'TM2022010007', 'MENANG', '3', 'VS20220100073'),
(1214, 'TM2022010003', 'KALAH', '0', 'VS20220100073'),
(1215, 'TM2022010007', 'MENANG', '3', 'VS20220100074'),
(1216, 'TM2022010004', 'KALAH', '0', 'VS20220100074'),
(1217, 'TM2022010007', 'MENANG', '3', 'VS20220100075'),
(1218, 'TM2022010005', 'KALAH', '0', 'VS20220100075'),
(1219, 'TM2022010007', 'MENANG', '3', 'VS20220100076'),
(1220, 'TM2022010018', 'KALAH', '0', 'VS20220100076'),
(1221, 'TM2022010018', 'MENANG', '3', 'VS20220100077'),
(1222, 'TM2022010003', 'KALAH', '0', 'VS20220100077'),
(1223, 'TM2022010018', 'MENANG', '3', 'VS20220100078'),
(1224, 'TM2022010004', 'KALAH', '0', 'VS20220100078'),
(1225, 'TM2022010018', 'KALAH', '0', 'VS20220100079'),
(1226, 'TM2022010005', 'MENANG', '3', 'VS20220100079'),
(1227, 'TM2022010018', 'MENANG', '3', 'VS20220100080'),
(1228, 'TM2022010007', 'KALAH', '0', 'VS20220100080'),
(1285, 'TM2022010002', 'MENANG', '3', 'VS20220100081'),
(1286, 'TM2022010004', 'KALAH', '0', 'VS20220100081'),
(1287, 'TM2022010017', 'KALAH', '0', 'VS20220100082'),
(1288, 'TM2022010011', 'MENANG', '3', 'VS20220100082'),
(1289, 'TM2022010009', 'KALAH', '0', 'VS20220100083'),
(1290, 'TM2022010013', 'MENANG', '3', 'VS20220100083'),
(1291, 'TM2022010006', 'MENANG', '3', 'VS20220100084'),
(1292, 'TM2022010018', 'KALAH', '0', 'VS20220100084'),
(1293, 'TM2022010011', 'MENANG', '3', 'VS20220100085'),
(1294, 'TM2022010013', 'KALAH', '0', 'VS20220100085'),
(1295, 'TM2022010006', 'MENANG', '3', 'VS20220100086'),
(1296, 'TM2022010002', 'KALAH', '0', 'VS20220100086'),
(1313, 'TM2022010006', 'MENANG', '3', 'VS20220100087'),
(1314, 'TM2022010011', 'KALAH', '0', 'VS20220100087'),
(1315, 'TM2022010002', '', '', 'VS20220100088'),
(1316, 'TM2022010013', '', '', 'VS20220100088');

-- --------------------------------------------------------

--
-- Table structure for table `tb_event`
--

CREATE TABLE `tb_event` (
  `id_event` varchar(25) NOT NULL,
  `nm_event` varchar(250) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tgl_event` date DEFAULT NULL,
  `tgl_start_pendaftaran` datetime DEFAULT NULL,
  `tgl_selesai_pendaftaran` datetime DEFAULT NULL,
  `status` enum('BUKA','TUTUP') DEFAULT NULL,
  `biaya_pendaftaran` float DEFAULT NULL,
  `min_team` int(11) DEFAULT NULL,
  `max_team` int(11) DEFAULT NULL,
  `jml_team_playoff` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_event`
--

INSERT INTO `tb_event` (`id_event`, `nm_event`, `deskripsi`, `tgl_event`, `tgl_start_pendaftaran`, `tgl_selesai_pendaftaran`, `status`, `biaya_pendaftaran`, `min_team`, `max_team`, `jml_team_playoff`) VALUES
('EV2022010001', 'Ngabuburit Kaum Gamers Mobile Legend', '<p style=\"margin: 15px 0px 0px; color: rgb(51, 51, 51); font-family: arial; text-align: justify; outline: 0px !important;\"><img src=\"https://eventsemarang.id/wp-content/uploads/2019/05/AP-NGABUBURIT-KAUM-GAMERS-MOBILE-LEGENDS-SMRG-Copy.jpg\" style=\"width: 758.463px;\"><strong style=\"font-weight: bold; outline: 0px !important;\"><br></strong></p><p style=\"margin: 15px 0px 0px; color: rgb(51, 51, 51); font-family: arial; text-align: justify; outline: 0px !important;\"><strong style=\"font-weight: bold; outline: 0px !important;\">Ngabuburit Kaum Gamers Mobile Legend</strong><strong style=\"font-weight: bold; outline: 0px !important;\"><br style=\"outline: 0px !important;\"></strong><strong style=\"font-weight: bold; outline: 0px !important;\">Tanggal :&nbsp;</strong>01 – 02 Februari 2022<br style=\"outline: 0px !important;\"><strong style=\"font-weight: bold; outline: 0px !important;\">Tempat :</strong>&nbsp;Ferris Club Citragrand Semarang</p><p style=\"margin: 15px 0px 0px; color: rgb(51, 51, 51); font-family: arial; text-align: justify; outline: 0px !important;\"><strong style=\"font-weight: bold; outline: 0px !important;\">Deskripsi Event :</strong><strong style=\"font-weight: bold; outline: 0px !important;\"><br style=\"outline: 0px !important;\"></strong>Kriiik krik krik …!<br style=\"outline: 0px !important;\">Bingung ngabuburit cuma dirumah ajaa? atau galau main game MOBILE LEGENDS lawannya ituuuu ituu ajaa!</p><p style=\"margin: 15px 0px 0px; color: rgb(51, 51, 51); font-family: arial; text-align: justify; outline: 0px !important;\">Kalau kamu ngerasa “Jago” ngegame n punya tim yang solid buat tanding di tournament Mobile Legends.</p><p style=\"margin: 15px 0px 0px; color: rgb(51, 51, 51); font-family: arial; text-align: justify; outline: 0px !important;\">Kami tunggu kamu di Ferris Club CitraGrand Semarang, dimana ngabuburit kamu akan ngasah skill ngegames kamu. “Berani itu bukan jago kandang, Berani itu loe berani datang”</p><p style=\"margin: 15px 0px 0px; color: rgb(51, 51, 51); font-family: arial; text-align: justify; outline: 0px !important;\"><strong style=\"font-weight: bold; outline: 0px !important;\">Ketentuan :</strong></p><ul style=\"margin-bottom: 10px; padding-left: 15px; margin-left: 10px; color: rgb(51, 51, 51); font-family: arial; text-align: justify; outline: 0px !important;\"><li style=\"outline: 0px !important;\">Draft Pick Mode</li><li style=\"outline: 0px !important;\">Double Slot Allowed</li></ul><p style=\"margin: 15px 0px 0px; color: rgb(51, 51, 51); font-family: arial; text-align: justify; outline: 0px !important;\"><strong style=\"font-weight: bold; outline: 0px !important;\">Pendaftaran :</strong></p><ul style=\"margin-bottom: 10px; padding-left: 15px; margin-left: 10px; color: rgb(51, 51, 51); font-family: arial; text-align: justify; outline: 0px !important;\"><li style=\"outline: 0px !important;\">Tanggal :Pendaftaran : 01 – 02 Februari 2022</li><li style=\"outline: 0px !important;\">Biaya Pendaftaran : Rp 100.000 / Team</li><li style=\"outline: 0px !important;\">Fasilitas : Free Takjil</li><li style=\"outline: 0px !important;\">Kuota : 64 Slot Team</li></ul><p style=\"margin: 15px 0px 0px; color: rgb(51, 51, 51); font-family: arial; text-align: justify; outline: 0px !important;\"><strong style=\"font-weight: bold; outline: 0px !important;\">Hadiah :</strong></p><ul style=\"margin-bottom: 10px; padding-left: 15px; margin-left: 10px; color: rgb(51, 51, 51); font-family: arial; text-align: justify; outline: 0px !important;\"><li style=\"outline: 0px !important;\">Juara 1 : Rp 2.000.000</li><li style=\"outline: 0px !important;\">Juara 2 : Rp 1.500.000</li><li style=\"outline: 0px !important;\">Juara 3 : Rp 1.000.000</li></ul><p style=\"margin: 15px 0px 0px; color: rgb(51, 51, 51); font-family: arial; text-align: justify; outline: 0px !important;\"><strong style=\"font-weight: bold; outline: 0px !important;\">More Information :</strong></p><ul style=\"margin-bottom: 10px; padding-left: 15px; margin-left: 10px; color: rgb(51, 51, 51); font-family: arial; text-align: justify; outline: 0px !important;\"><li style=\"outline: 0px !important;\">Halilintar : 0857 4006 6660</li><li style=\"outline: 0px !important;\">Herry : 0856 4186 0228</li></ul>', '2022-02-01', '2022-01-10 00:00:00', '2022-01-16 23:59:00', 'BUKA', 100000, NULL, NULL, NULL),
('EV2022010002', 'Mobile Legend Top Game', '<p style=\"margin: 15px 0px 0px; color: rgb(51, 51, 51); font-family: arial; text-align: justify; outline: 0px !important;\"><img src=\"https://eventsemarang.id/wp-content/uploads/2019/05/AP-NGABUBURIT-KAUM-GAMERS-MOBILE-LEGENDS-SMRG-Copy.jpg\" style=\"width: 758.463px;\"><strong style=\"font-weight: bold; outline: 0px !important;\"><br></strong></p><p style=\"margin: 15px 0px 0px; color: rgb(51, 51, 51); font-family: arial; text-align: justify; outline: 0px !important;\"><strong style=\"font-weight: bold; outline: 0px !important;\">Ngabuburit Kaum Gamers Mobile Legend</strong><strong style=\"font-weight: bold; outline: 0px !important;\"><br style=\"outline: 0px !important;\"></strong><strong style=\"font-weight: bold; outline: 0px !important;\">Tanggal :&nbsp;</strong>01 – 02 Februari 2022<br style=\"outline: 0px !important;\"><strong style=\"font-weight: bold; outline: 0px !important;\">Tempat :</strong>&nbsp;Ferris Club Citragrand Semarang</p><p style=\"margin: 15px 0px 0px; color: rgb(51, 51, 51); font-family: arial; text-align: justify; outline: 0px !important;\"><strong style=\"font-weight: bold; outline: 0px !important;\">Deskripsi Event :</strong><strong style=\"font-weight: bold; outline: 0px !important;\"><br style=\"outline: 0px !important;\"></strong>Kriiik krik krik …!<br style=\"outline: 0px !important;\">Bingung ngabuburit cuma dirumah ajaa? atau galau main game MOBILE LEGENDS lawannya ituuuu ituu ajaa!</p><p style=\"margin: 15px 0px 0px; color: rgb(51, 51, 51); font-family: arial; text-align: justify; outline: 0px !important;\">Kalau kamu ngerasa “Jago” ngegame n punya tim yang solid buat tanding di tournament Mobile Legends.</p><p style=\"margin: 15px 0px 0px; color: rgb(51, 51, 51); font-family: arial; text-align: justify; outline: 0px !important;\">Kami tunggu kamu di Ferris Club CitraGrand Semarang, dimana ngabuburit kamu akan ngasah skill ngegames kamu. “Berani itu bukan jago kandang, Berani itu loe berani datang”</p><p style=\"margin: 15px 0px 0px; color: rgb(51, 51, 51); font-family: arial; text-align: justify; outline: 0px !important;\"><strong style=\"font-weight: bold; outline: 0px !important;\">Ketentuan :</strong></p><ul style=\"margin-bottom: 10px; padding-left: 15px; margin-left: 10px; color: rgb(51, 51, 51); font-family: arial; text-align: justify; outline: 0px !important;\"><li style=\"outline: 0px !important;\">Draft Pick Mode</li><li style=\"outline: 0px !important;\">Double Slot Allowed</li></ul><p style=\"margin: 15px 0px 0px; color: rgb(51, 51, 51); font-family: arial; text-align: justify; outline: 0px !important;\"><strong style=\"font-weight: bold; outline: 0px !important;\">Pendaftaran :</strong></p><ul style=\"margin-bottom: 10px; padding-left: 15px; margin-left: 10px; color: rgb(51, 51, 51); font-family: arial; text-align: justify; outline: 0px !important;\"><li style=\"outline: 0px !important;\">Tanggal :Pendaftaran : 01 – 02 Februari 2022</li><li style=\"outline: 0px !important;\">Biaya Pendaftaran : Rp 100.000 / Team</li><li style=\"outline: 0px !important;\">Fasilitas : Free Takjil</li><li style=\"outline: 0px !important;\">Kuota : 64 Slot Team</li></ul><p style=\"margin: 15px 0px 0px; color: rgb(51, 51, 51); font-family: arial; text-align: justify; outline: 0px !important;\"><strong style=\"font-weight: bold; outline: 0px !important;\">Hadiah :</strong></p><ul style=\"margin-bottom: 10px; padding-left: 15px; margin-left: 10px; color: rgb(51, 51, 51); font-family: arial; text-align: justify; outline: 0px !important;\"><li style=\"outline: 0px !important;\">Juara 1 : Rp 2.000.000</li><li style=\"outline: 0px !important;\">Juara 2 : Rp 1.500.000</li><li style=\"outline: 0px !important;\">Juara 3 : Rp 1.000.000</li></ul><p style=\"margin: 15px 0px 0px; color: rgb(51, 51, 51); font-family: arial; text-align: justify; outline: 0px !important;\"><strong style=\"font-weight: bold; outline: 0px !important;\">More Information :</strong></p><ul style=\"margin-bottom: 10px; padding-left: 15px; margin-left: 10px; color: rgb(51, 51, 51); font-family: arial; text-align: justify; outline: 0px !important;\"><li style=\"outline: 0px !important;\">Halilintar : 0857 4006 6660</li><li style=\"outline: 0px !important;\">Herry : 0856 4186 0228</li></ul>', '2022-02-19', '2022-01-10 00:00:00', '2022-01-16 23:59:00', 'BUKA', 150000, NULL, NULL, NULL),
('EV2022020001', 'Kumplul Bareng Gamers Mobile legend', '<p>test deskripsi</p>', '2022-02-28', '2022-02-05 00:00:00', '2022-02-12 23:59:00', 'BUKA', 250000, 20, 40, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_grup`
--

CREATE TABLE `tb_grup` (
  `id_grup` int(11) NOT NULL,
  `nm_grup` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_grup`
--

INSERT INTO `tb_grup` (`id_grup`, `nm_grup`) VALUES
(1, 'Grup A'),
(2, 'Grup B'),
(3, 'Grup C'),
(4, 'Grup D'),
(5, 'Grup E'),
(6, 'Grup F'),
(7, 'Grup G'),
(8, 'Grup H'),
(9, 'Grup I'),
(10, 'Grup J'),
(11, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal_grup`
--

CREATE TABLE `tb_jadwal_grup` (
  `id_jadwal` int(11) NOT NULL,
  `id_team` varchar(25) DEFAULT NULL,
  `id_event` varchar(25) DEFAULT NULL,
  `id_grup` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jadwal_grup`
--

INSERT INTO `tb_jadwal_grup` (`id_jadwal`, `id_team`, `id_event`, `id_grup`) VALUES
(97, 'TM2022010001', 'EV2022010001', 1),
(98, 'TM2022010006', 'EV2022010001', 1),
(99, 'TM2022010012', 'EV2022010001', 1),
(100, 'TM2022010009', 'EV2022010001', 1),
(101, 'TM2022010019', 'EV2022010001', 1),
(102, 'TM2022010017', 'EV2022010001', 2),
(103, 'TM2022010013', 'EV2022010001', 2),
(104, 'TM2022010014', 'EV2022010001', 2),
(105, 'TM2022010008', 'EV2022010001', 2),
(106, 'TM2022010016', 'EV2022010001', 2),
(107, 'TM2022010020', 'EV2022010001', 3),
(108, 'TM2022010015', 'EV2022010001', 3),
(109, 'TM2022010011', 'EV2022010001', 3),
(110, 'TM2022010002', 'EV2022010001', 3),
(111, 'TM2022010010', 'EV2022010001', 3),
(112, 'TM2022010007', 'EV2022010001', 4),
(113, 'TM2022010018', 'EV2022010001', 4),
(114, 'TM2022010003', 'EV2022010001', 4),
(115, 'TM2022010005', 'EV2022010001', 4),
(116, 'TM2022010004', 'EV2022010001', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_juara`
--

CREATE TABLE `tb_juara` (
  `id_juara` int(11) NOT NULL,
  `id_event` varchar(25) DEFAULT NULL,
  `juara` enum('JUARA 1','JUARA 2','JUARA 3') DEFAULT NULL,
  `id_team` varchar(25) DEFAULT NULL,
  `total_skor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `id_pendaftaran` varchar(25) NOT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `id_team` varchar(25) DEFAULT NULL,
  `id_event` varchar(25) DEFAULT NULL,
  `status_pendaftaran` enum('AKTIF','BELUM AKTIF') DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `id_pesanan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`id_pendaftaran`, `tgl_daftar`, `id_team`, `id_event`, `status_pendaftaran`, `bukti_bayar`, `id_pesanan`) VALUES
('DF2022010001', '2022-01-05', 'TM2022010001', 'EV2022010001', 'AKTIF', NULL, NULL),
('DF2022010002', '2022-01-06', 'TM2022010002', 'EV2022010001', 'AKTIF', NULL, NULL),
('DF2022010003', '2022-01-07', 'TM2022010003', 'EV2022010001', 'AKTIF', NULL, NULL),
('DF2022010004', '2022-01-08', 'TM2022010004', 'EV2022010001', 'AKTIF', NULL, NULL),
('DF2022010005', '2022-01-09', 'TM2022010005', 'EV2022010001', 'AKTIF', NULL, NULL),
('DF2022010006', '2022-01-10', 'TM2022010006', 'EV2022010001', 'AKTIF', NULL, NULL),
('DF2022010007', '2022-01-11', 'TM2022010007', 'EV2022010001', 'AKTIF', NULL, NULL),
('DF2022010008', '2022-01-12', 'TM2022010008', 'EV2022010001', 'AKTIF', NULL, NULL),
('DF2022010009', '2022-01-13', 'TM2022010009', 'EV2022010001', 'AKTIF', NULL, NULL),
('DF2022010010', '2022-01-14', 'TM2022010010', 'EV2022010001', 'AKTIF', NULL, NULL),
('DF2022010011', '2022-01-15', 'TM2022010011', 'EV2022010001', 'AKTIF', NULL, NULL),
('DF2022010012', '2022-01-16', 'TM2022010012', 'EV2022010001', 'AKTIF', NULL, NULL),
('DF2022010013', '2022-01-17', 'TM2022010013', 'EV2022010001', 'AKTIF', NULL, NULL),
('DF2022010014', '2022-01-18', 'TM2022010014', 'EV2022010001', 'AKTIF', NULL, NULL),
('DF2022010015', '2022-01-19', 'TM2022010015', 'EV2022010001', 'AKTIF', NULL, NULL),
('DF2022010016', '2022-01-16', 'TM2022010016', 'EV2022010001', 'AKTIF', NULL, '1561580157'),
('DF2022010017', '2022-01-05', 'TM2022010017', 'EV2022010001', 'AKTIF', NULL, NULL),
('DF2022010018', '2022-01-06', 'TM2022010018', 'EV2022010001', 'AKTIF', NULL, NULL),
('DF2022010019', '2022-01-07', 'TM2022010019', 'EV2022010001', 'AKTIF', NULL, NULL),
('DF2022010020', '2022-01-18', 'TM2022010020', 'EV2022010001', 'AKTIF', NULL, '788699680'),
('DF2022010021', '2022-01-05', 'TM2022010001', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010022', '2022-01-06', 'TM2022010002', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010023', '2022-01-07', 'TM2022010003', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010024', '2022-01-08', 'TM2022010004', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010025', '2022-01-09', 'TM2022010005', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010026', '2022-01-10', 'TM2022010006', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010027', '2022-01-11', 'TM2022010007', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010028', '2022-01-12', 'TM2022010008', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010029', '2022-01-13', 'TM2022010009', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010030', '2022-01-14', 'TM2022010010', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010031', '2022-01-15', 'TM2022010011', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010032', '2022-01-16', 'TM2022010012', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010033', '2022-01-17', 'TM2022010013', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010034', '2022-01-18', 'TM2022010014', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010035', '2022-01-19', 'TM2022010015', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010036', '2022-01-16', 'TM2022010016', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010037', '2022-01-05', 'TM2022010017', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010038', '2022-01-06', 'TM2022010018', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010039', '2022-01-07', 'TM2022010019', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010040', '2022-01-18', 'TM2022010020', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010041', '2022-01-19', 'TM2022010021', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010042', '2022-01-20', 'TM2022010022', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010043', '2022-01-21', 'TM2022010023', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010044', '2022-01-22', 'TM2022010024', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010045', '2022-01-23', 'TM2022010025', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010046', '2022-01-24', 'TM2022010026', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010047', '2022-01-25', 'TM2022010027', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010048', '2022-01-26', 'TM2022010028', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010049', '2022-01-27', 'TM2022010029', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010050', '2022-01-28', 'TM2022010030', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010051', '2022-01-29', 'TM2022010031', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010052', '2022-01-29', 'TM2022010032', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010053', '2022-01-29', 'TM2022010033', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010054', '2022-01-29', 'TM2022010034', 'EV2022020001', 'AKTIF', NULL, NULL),
('DF2022010055', '2022-01-29', 'TM2022010035', 'EV2022020001', 'AKTIF', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pertandingan`
--

CREATE TABLE `tb_pertandingan` (
  `id_pertandingan` varchar(25) NOT NULL,
  `tgl_pertandingan` datetime DEFAULT NULL,
  `id_grup` int(11) DEFAULT NULL,
  `id_event` varchar(25) DEFAULT NULL,
  `jenis_pertandingan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pertandingan`
--

INSERT INTO `tb_pertandingan` (`id_pertandingan`, `tgl_pertandingan`, `id_grup`, `id_event`, `jenis_pertandingan`) VALUES
('VS20220100001', '2022-01-24 14:30:00', 1, 'EV2022010001', 'GRUP'),
('VS20220100002', '2022-01-24 18:00:00', 1, 'EV2022010001', 'GRUP'),
('VS20220100003', '2022-01-26 10:00:00', 1, 'EV2022010001', 'GRUP'),
('VS20220100004', '2022-01-18 21:20:51', 1, 'EV2022010001', 'GRUP'),
('VS20220100005', '2022-01-18 21:20:51', 1, 'EV2022010001', 'GRUP'),
('VS20220100006', '2022-01-18 21:20:51', 1, 'EV2022010001', 'GRUP'),
('VS20220100007', '2022-01-18 21:20:51', 1, 'EV2022010001', 'GRUP'),
('VS20220100008', '2022-01-18 21:20:51', 1, 'EV2022010001', 'GRUP'),
('VS20220100009', '2022-01-18 21:20:51', 1, 'EV2022010001', 'GRUP'),
('VS20220100010', '2022-01-18 21:20:51', 1, 'EV2022010001', 'GRUP'),
('VS20220100011', '2022-01-18 21:20:51', 1, 'EV2022010001', 'GRUP'),
('VS20220100012', '2022-01-18 21:20:51', 1, 'EV2022010001', 'GRUP'),
('VS20220100013', '2022-01-18 21:20:51', 1, 'EV2022010001', 'GRUP'),
('VS20220100014', '2022-01-18 21:20:51', 1, 'EV2022010001', 'GRUP'),
('VS20220100015', '2022-01-18 21:20:51', 1, 'EV2022010001', 'GRUP'),
('VS20220100016', '2022-01-18 21:20:51', 1, 'EV2022010001', 'GRUP'),
('VS20220100017', '2022-01-18 21:20:51', 1, 'EV2022010001', 'GRUP'),
('VS20220100018', '2022-01-18 21:20:51', 1, 'EV2022010001', 'GRUP'),
('VS20220100019', '2022-01-18 21:20:51', 1, 'EV2022010001', 'GRUP'),
('VS20220100020', '2022-01-18 21:20:51', 1, 'EV2022010001', 'GRUP'),
('VS20220100021', '2022-01-18 21:20:51', 2, 'EV2022010001', 'GRUP'),
('VS20220100022', '2022-01-18 21:20:51', 2, 'EV2022010001', 'GRUP'),
('VS20220100023', '2022-01-18 21:20:51', 2, 'EV2022010001', 'GRUP'),
('VS20220100024', '2022-01-18 21:20:51', 2, 'EV2022010001', 'GRUP'),
('VS20220100025', '2022-01-18 21:20:51', 2, 'EV2022010001', 'GRUP'),
('VS20220100026', '2022-01-18 21:20:51', 2, 'EV2022010001', 'GRUP'),
('VS20220100027', '2022-01-18 21:20:51', 2, 'EV2022010001', 'GRUP'),
('VS20220100028', '2022-01-18 21:20:51', 2, 'EV2022010001', 'GRUP'),
('VS20220100029', '2022-01-18 21:20:51', 2, 'EV2022010001', 'GRUP'),
('VS20220100030', '2022-01-18 21:20:51', 2, 'EV2022010001', 'GRUP'),
('VS20220100031', '2022-01-18 21:20:51', 2, 'EV2022010001', 'GRUP'),
('VS20220100032', '2022-01-18 21:20:51', 2, 'EV2022010001', 'GRUP'),
('VS20220100033', '2022-01-18 21:20:51', 2, 'EV2022010001', 'GRUP'),
('VS20220100034', '2022-01-18 21:20:51', 2, 'EV2022010001', 'GRUP'),
('VS20220100035', '2022-01-18 21:20:51', 2, 'EV2022010001', 'GRUP'),
('VS20220100036', '2022-01-18 21:20:51', 2, 'EV2022010001', 'GRUP'),
('VS20220100037', '2022-01-18 21:20:51', 2, 'EV2022010001', 'GRUP'),
('VS20220100038', '2022-01-18 21:20:51', 2, 'EV2022010001', 'GRUP'),
('VS20220100039', '2022-01-18 21:20:51', 2, 'EV2022010001', 'GRUP'),
('VS20220100040', '2022-01-18 21:20:51', 2, 'EV2022010001', 'GRUP'),
('VS20220100041', '2022-01-18 21:20:51', 3, 'EV2022010001', 'GRUP'),
('VS20220100042', '2022-01-18 21:20:51', 3, 'EV2022010001', 'GRUP'),
('VS20220100043', '2022-01-18 21:20:51', 3, 'EV2022010001', 'GRUP'),
('VS20220100044', '2022-01-18 21:20:51', 3, 'EV2022010001', 'GRUP'),
('VS20220100045', '2022-01-18 21:20:51', 3, 'EV2022010001', 'GRUP'),
('VS20220100046', '2022-01-18 21:20:51', 3, 'EV2022010001', 'GRUP'),
('VS20220100047', '2022-01-18 21:20:51', 3, 'EV2022010001', 'GRUP'),
('VS20220100048', '2022-01-18 21:20:51', 3, 'EV2022010001', 'GRUP'),
('VS20220100049', '2022-01-18 21:20:51', 3, 'EV2022010001', 'GRUP'),
('VS20220100050', '2022-01-18 21:20:51', 3, 'EV2022010001', 'GRUP'),
('VS20220100051', '2022-01-18 21:20:51', 3, 'EV2022010001', 'GRUP'),
('VS20220100052', '2022-01-18 21:20:51', 3, 'EV2022010001', 'GRUP'),
('VS20220100053', '2022-01-18 21:20:51', 3, 'EV2022010001', 'GRUP'),
('VS20220100054', '2022-01-18 21:20:51', 3, 'EV2022010001', 'GRUP'),
('VS20220100055', '2022-01-18 21:20:51', 3, 'EV2022010001', 'GRUP'),
('VS20220100056', '2022-01-18 21:20:51', 3, 'EV2022010001', 'GRUP'),
('VS20220100057', '2022-01-18 21:20:51', 3, 'EV2022010001', 'GRUP'),
('VS20220100058', '2022-01-18 21:20:51', 3, 'EV2022010001', 'GRUP'),
('VS20220100059', '2022-01-18 21:20:51', 3, 'EV2022010001', 'GRUP'),
('VS20220100060', '2022-01-18 21:20:51', 3, 'EV2022010001', 'GRUP'),
('VS20220100061', '2022-01-18 21:20:51', 4, 'EV2022010001', 'GRUP'),
('VS20220100062', '2022-01-18 21:20:51', 4, 'EV2022010001', 'GRUP'),
('VS20220100063', '2022-01-18 21:20:51', 4, 'EV2022010001', 'GRUP'),
('VS20220100064', '2022-01-18 21:20:51', 4, 'EV2022010001', 'GRUP'),
('VS20220100065', '2022-01-18 21:20:51', 4, 'EV2022010001', 'GRUP'),
('VS20220100066', '2022-01-18 21:20:51', 4, 'EV2022010001', 'GRUP'),
('VS20220100067', '2022-01-18 21:20:51', 4, 'EV2022010001', 'GRUP'),
('VS20220100068', '2022-01-18 21:20:51', 4, 'EV2022010001', 'GRUP'),
('VS20220100069', '2022-01-18 21:20:51', 4, 'EV2022010001', 'GRUP'),
('VS20220100070', '2022-01-18 21:20:51', 4, 'EV2022010001', 'GRUP'),
('VS20220100071', '2022-01-18 21:20:51', 4, 'EV2022010001', 'GRUP'),
('VS20220100072', '2022-01-18 21:20:51', 4, 'EV2022010001', 'GRUP'),
('VS20220100073', '2022-01-18 21:20:51', 4, 'EV2022010001', 'GRUP'),
('VS20220100074', '2022-01-18 21:20:51', 4, 'EV2022010001', 'GRUP'),
('VS20220100075', '2022-01-18 21:20:51', 4, 'EV2022010001', 'GRUP'),
('VS20220100076', '2022-01-18 21:20:51', 4, 'EV2022010001', 'GRUP'),
('VS20220100077', '2022-01-18 21:20:51', 4, 'EV2022010001', 'GRUP'),
('VS20220100078', '2022-01-18 21:20:51', 4, 'EV2022010001', 'GRUP'),
('VS20220100079', '2022-01-18 21:20:51', 4, 'EV2022010001', 'GRUP'),
('VS20220100080', '2022-01-18 21:20:51', 4, 'EV2022010001', 'GRUP'),
('VS20220100081', '2022-02-01 08:00:00', NULL, 'EV2022010001', 'PLAYOFF1'),
('VS20220100082', '2022-02-01 08:00:00', NULL, 'EV2022010001', 'PLAYOFF1'),
('VS20220100083', '2022-02-01 08:00:00', NULL, 'EV2022010001', 'PLAYOFF1'),
('VS20220100084', '2022-02-01 08:00:00', NULL, 'EV2022010001', 'PLAYOFF1'),
('VS20220100085', '2022-02-05 11:00:00', NULL, 'EV2022010001', 'PLAYOFF2'),
('VS20220100086', '2022-02-05 11:00:00', NULL, 'EV2022010001', 'PLAYOFF2'),
('VS20220100087', '2022-02-09 17:00:00', NULL, 'EV2022010001', 'FINAL'),
('VS20220100088', '2022-02-08 17:00:00', NULL, 'EV2022010001', 'PEREBUTAN JUARA 3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peserta`
--

CREATE TABLE `tb_peserta` (
  `id_peserta` int(11) NOT NULL,
  `nm_peserta` varchar(30) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `id_team` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_peserta`
--

INSERT INTO `tb_peserta` (`id_peserta`, `nm_peserta`, `alamat`, `id_team`) VALUES
(1, 'Yusuf', 'Kudus', 'TM2022010016'),
(2, 'Wahyu', 'Pati', 'TM2022010016'),
(4, 'Anggota 1', 'Kudus', 'TM2022010020'),
(5, 'Anggota 2', 'Kudus', 'TM2022010020');

-- --------------------------------------------------------

--
-- Table structure for table `tb_team`
--

CREATE TABLE `tb_team` (
  `id_team` varchar(25) NOT NULL,
  `nm_team` varchar(50) DEFAULT NULL,
  `alamat_team` varchar(255) DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `id_user` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_team`
--

INSERT INTO `tb_team` (`id_team`, `nm_team`, `alamat_team`, `logo`, `id_user`) VALUES
('BYE', 'BYE', 'BYE', NULL, NULL),
('TM2022010001', 'EVOS Esports', 'Jakarta', '1642325743823.png', 'US2022010002'),
('TM2022010002', 'Blacklist International', 'Semarang', '1642325743823.png', 'US2022010003'),
('TM2022010003', 'ONIC PH', 'Kudus', '1642325743823.png', 'US2022010004'),
('TM2022010004', 'Onic Esports', 'Pati', '1642325743823.png', 'US2022010005'),
('TM2022010005', 'RRQ Hoshi', 'Demak', '1642325743823.png', 'US2022010006'),
('TM2022010006', 'Team SMG', 'Pati', '1642325743823.png', 'US2022010007'),
('TM2022010007', 'Todak', 'Kudus', '1642325743823.png', 'US2022010008'),
('TM2022010008', 'RSG SG', 'Jepara', '1642325743823.png', 'US2022010009'),
('TM2022010009', 'RED Canids', 'Kendal', '1642325743823.png', 'US2022010010'),
('TM2022010010', 'Keyd Stars', 'Purwodadi', '1642325743823.png', 'US2022010011'),
('TM2022010011', 'See You Soon', 'Semarang', '1642325743823.png', 'US2022010012'),
('TM2022010012', 'Natus Vincere/Navi', 'Pati', '1642325743823.png', 'US2022010013'),
('TM2022010013', 'Bedel', 'Jepara', '1642325743823.png', 'US2022010014'),
('TM2022010014', 'Malvinas Gaming', 'Kudus', '1642325743823.png', 'US2022010015'),
('TM2022010015', 'BloodThirstyKings', 'Kudus', '1642325743823.png', 'US2022010016'),
('TM2022010016', 'PAW Team', 'Kudus', '1642325743823.png', 'US2022010017'),
('TM2022010017', 'Moba Forever', 'Kudus', '1642325743823.png', 'US2022010018'),
('TM2022010018', 'Squad Player', 'Kudus', '1642325743823.png', 'US2022010019'),
('TM2022010019', 'Calpid', 'Kudus', '1642325743823.png', 'US2022010020'),
('TM2022010020', 'Always Win', 'Jakarta', '1642515157490.png', 'US2022010021'),
('TM2022010021', 'team21', 'Jakarta', '1642515157490.png', 'US2022010022'),
('TM2022010022', 'team22', 'Jakarta', '1642515157490.png', 'US2022010023'),
('TM2022010023', 'team23', 'Jakarta', '1642515157490.png', 'US2022010024'),
('TM2022010024', 'team24', 'Jakarta', '1642515157490.png', 'US2022010025'),
('TM2022010025', 'team25', 'Jakarta', '1642515157490.png', 'US2022010026'),
('TM2022010026', 'team26', 'Jakarta', '1642515157490.png', 'US2022010027'),
('TM2022010027', 'team27', 'Jakarta', '1642515157490.png', 'US2022010028'),
('TM2022010028', 'team28', 'Jakarta', '1642515157490.png', 'US2022010029'),
('TM2022010029', 'team29', 'Jakarta', '1642515157490.png', 'US2022010030'),
('TM2022010030', 'team30', 'Jakarta', '1642515157490.png', 'US2022010031'),
('TM2022010031', 'team31', 'Jakarta', '1642515157490.png', 'US2022010032'),
('TM2022010032', 'team32', 'Jakarta', '1642515157490.png', 'US2022010033'),
('TM2022010033', 'team33', 'Jakarta', '1642515157490.png', 'US2022010034'),
('TM2022010034', 'team34', 'Jakarta', '1642515157490.png', 'US2022010035'),
('TM2022010035', 'team35', 'Jakarta', '1642515157490.png', 'US2022010036');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(25) NOT NULL,
  `nm_user` varchar(30) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `hak_akses` enum('ADMIN','PESERTA') DEFAULT NULL,
  `status` enum('AKTIF','TIDAK AKTIF') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nm_user`, `username`, `password`, `hak_akses`, `status`) VALUES
('US2022010001', 'admin', 'admin', 'admin', 'ADMIN', 'AKTIF'),
('US2022010002', 'EVOS Esports', 'team1', 'team1', 'PESERTA', 'AKTIF'),
('US2022010003', 'Blacklist International', 'team2', 'team2', 'PESERTA', 'AKTIF'),
('US2022010004', 'ONIC PH', 'team3', 'team3', 'PESERTA', 'AKTIF'),
('US2022010005', 'Onic Esports', 'team4', 'team4', 'PESERTA', 'AKTIF'),
('US2022010006', 'RRQ Hoshi', 'team5', 'team5', 'PESERTA', 'AKTIF'),
('US2022010007', 'Team SMG', 'team6', 'team6', 'PESERTA', 'AKTIF'),
('US2022010008', 'Todak', 'team7', 'team7', 'PESERTA', 'AKTIF'),
('US2022010009', 'RSG SG', 'team8', 'team8', 'PESERTA', 'AKTIF'),
('US2022010010', 'RED Canids', 'team9', 'team9', 'PESERTA', 'AKTIF'),
('US2022010011', 'Keyd Stars', 'team10', 'team10', 'PESERTA', 'AKTIF'),
('US2022010012', 'See You Soon', 'team11', 'team11', 'PESERTA', 'AKTIF'),
('US2022010013', 'Natus Vincere/Na\'vi', 'team12', 'team12', 'PESERTA', 'AKTIF'),
('US2022010014', 'Bedel', 'team13', 'team13', 'PESERTA', 'AKTIF'),
('US2022010015', 'Malvinas Gaming', 'team14', 'team14', 'PESERTA', 'AKTIF'),
('US2022010016', 'BloodThirstyKings', 'team15', 'team15', 'PESERTA', 'AKTIF'),
('US2022010017', 'PAW', 'team16', 'team16', 'PESERTA', 'AKTIF'),
('US2022010018', 'Moba Forever', 'team17', 'team17', 'PESERTA', 'AKTIF'),
('US2022010019', 'Squad Player', 'team18', 'team18', 'PESERTA', 'AKTIF'),
('US2022010020', 'Calpid', 'team19', 'team19', 'PESERTA', 'AKTIF'),
('US2022010021', 'Joko', 'team20', 'team20', 'PESERTA', 'AKTIF'),
('US2022010022', 'team21', 'team21', 'team21', 'PESERTA', 'AKTIF'),
('US2022010023', 'team22', 'team22', 'team22', 'PESERTA', 'AKTIF'),
('US2022010024', 'team23', 'team23', 'team23', 'PESERTA', 'AKTIF'),
('US2022010025', 'team24', 'team24', 'team24', 'PESERTA', 'AKTIF'),
('US2022010026', 'team25', 'team25', 'team25', 'PESERTA', 'AKTIF'),
('US2022010027', 'team26', 'team26', 'team26', 'PESERTA', 'AKTIF'),
('US2022010028', 'team27', 'team27', 'team27', 'PESERTA', 'AKTIF'),
('US2022010029', 'team28', 'team28', 'team28', 'PESERTA', 'AKTIF'),
('US2022010030', 'team29', 'team29', 'team29', 'PESERTA', 'AKTIF'),
('US2022010031', 'team30', 'team30', 'team30', 'PESERTA', 'AKTIF'),
('US2022010032', 'team31', 'team31', 'team31', 'PESERTA', 'AKTIF'),
('US2022010033', 'team32', 'team32', 'team32', 'PESERTA', 'AKTIF'),
('US2022010034', 'team33', 'team33', 'team33', 'PESERTA', 'AKTIF'),
('US2022010035', 'team34', 'team34', 'team34', 'PESERTA', 'AKTIF'),
('US2022010036', 'team35', 'team35', 'team35', 'PESERTA', 'AKTIF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dtl_pertandingan`
--
ALTER TABLE `tb_dtl_pertandingan`
  ADD PRIMARY KEY (`id_dtl_pertandingan`),
  ADD KEY `FR_DTL_PERTANDINGAN_1` (`id_team`),
  ADD KEY `FR_DTL_PERTANDINGAN_2` (`id_pertandingan`);

--
-- Indexes for table `tb_event`
--
ALTER TABLE `tb_event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `tb_grup`
--
ALTER TABLE `tb_grup`
  ADD PRIMARY KEY (`id_grup`);

--
-- Indexes for table `tb_jadwal_grup`
--
ALTER TABLE `tb_jadwal_grup`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tb_juara`
--
ALTER TABLE `tb_juara`
  ADD PRIMARY KEY (`id_juara`),
  ADD KEY `FR_JUARA_1` (`id_event`),
  ADD KEY `FR_JUARA_2` (`id_team`);

--
-- Indexes for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `FR_PENDAFTARAN_1` (`id_team`),
  ADD KEY `FR_PENDAFTARAN_2` (`id_event`);

--
-- Indexes for table `tb_pertandingan`
--
ALTER TABLE `tb_pertandingan`
  ADD PRIMARY KEY (`id_pertandingan`),
  ADD KEY `FR_PERTANDINGAN_1` (`id_grup`),
  ADD KEY `FR_PERTANDINGAN_2` (`id_event`);

--
-- Indexes for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `FR_PESERTA_1` (`id_team`);

--
-- Indexes for table `tb_team`
--
ALTER TABLE `tb_team`
  ADD PRIMARY KEY (`id_team`),
  ADD KEY `FK_TEAM_1` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dtl_pertandingan`
--
ALTER TABLE `tb_dtl_pertandingan`
  MODIFY `id_dtl_pertandingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1325;

--
-- AUTO_INCREMENT for table `tb_grup`
--
ALTER TABLE `tb_grup`
  MODIFY `id_grup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_jadwal_grup`
--
ALTER TABLE `tb_jadwal_grup`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `tb_juara`
--
ALTER TABLE `tb_juara`
  MODIFY `id_juara` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_dtl_pertandingan`
--
ALTER TABLE `tb_dtl_pertandingan`
  ADD CONSTRAINT `FR_DTL_PERTANDINGAN_1` FOREIGN KEY (`id_team`) REFERENCES `tb_team` (`id_team`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FR_DTL_PERTANDINGAN_2` FOREIGN KEY (`id_pertandingan`) REFERENCES `tb_pertandingan` (`id_pertandingan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_juara`
--
ALTER TABLE `tb_juara`
  ADD CONSTRAINT `FR_JUARA_1` FOREIGN KEY (`id_event`) REFERENCES `tb_event` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FR_JUARA_2` FOREIGN KEY (`id_team`) REFERENCES `tb_team` (`id_team`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD CONSTRAINT `FR_PENDAFTARAN_1` FOREIGN KEY (`id_team`) REFERENCES `tb_team` (`id_team`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FR_PENDAFTARAN_2` FOREIGN KEY (`id_event`) REFERENCES `tb_event` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pertandingan`
--
ALTER TABLE `tb_pertandingan`
  ADD CONSTRAINT `FR_PERTANDINGAN_1` FOREIGN KEY (`id_grup`) REFERENCES `tb_grup` (`id_grup`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FR_PERTANDINGAN_2` FOREIGN KEY (`id_event`) REFERENCES `tb_event` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  ADD CONSTRAINT `FR_PESERTA_1` FOREIGN KEY (`id_team`) REFERENCES `tb_team` (`id_team`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_team`
--
ALTER TABLE `tb_team`
  ADD CONSTRAINT `FK_TEAM_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

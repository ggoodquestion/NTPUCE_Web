-- --------------------------------------------------------
-- 主機:                           172.16.100.37
-- 伺服器版本:                        8.0.30-0ubuntu0.20.04.2 - (Ubuntu)
-- 伺服器作業系統:                      Linux
-- HeidiSQL 版本:                  11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- 傾印 ntpuce 的資料庫結構
CREATE DATABASE IF NOT EXISTS `ntpuce` /*!40100 DEFAULT CHARACTER SET armscii8 COLLATE armscii8_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ntpuce`;

-- 傾印  資料表 ntpuce.carousel 結構
CREATE TABLE IF NOT EXISTS `carousel` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `url` varchar(200) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL DEFAULT '0',
  `href` varchar(200) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT '',
  `enable` tinyint(1) NOT NULL DEFAULT '1',
  `mods` varchar(200) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- 正在傾印表格  ntpuce.carousel 的資料：~9 rows (近似值)
/*!40000 ALTER TABLE `carousel` DISABLE KEYS */;
-- INSERT INTO `carousel` (`id`, `url`, `href`, `enable`, `mods`) VALUES
-- 	(1, 'http://ce.ntpu.edu.tw/images/ntpu.gif', '', 1, '15'),
-- 	(2, 'http://ce.ntpu.edu.tw/images/108???????????.jpg', 'http://www.ce.ntpu.edu.tw/mods/gallery/index.php?topic=6', 0, '16'),
-- 	(5, 'http://ce.ntpu.edu.tw/images/13418459_573601582812407_6033721298278110246_o.jpg', '', 1, '16'),
-- 	(6, 'http://ce.ntpu.edu.tw/images/image.png', 'http://www.ce.ntpu.edu.tw/mods/gallery/index.php?topic=7', 1, '16'),
-- 	(7, 'http://ce.ntpu.edu.tw/images/IMG_6326.JPG', '', 1, '16'),
-- 	(8, 'http://ce.ntpu.edu.tw/images/P1000407.JPG', '', 1, '16'),
-- 	(9, 'http://ce.ntpu.edu.tw/images/S__209543172.jpg', '', 1, '16'),
-- 	(10, 'http://ce.ntpu.edu.tw/images/??.jpg', '', 1, '16'),
-- 	(11, 'http://ce.ntpu.edu.tw/images/???_190627_0024.jpg', '', 1, '16');
-- /*!40000 ALTER TABLE `carousel` ENABLE KEYS */;

-- 傾印  資料表 ntpuce.ce_admin 結構
CREATE TABLE IF NOT EXISTS `ce_admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(20) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `password` varchar(60) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- 正在傾印表格  ntpuce.ce_admin 的資料：~0 rows (近似值)
/*!40000 ALTER TABLE `ce_admin` DISABLE KEYS */;
INSERT INTO `ce_admin` (`id`, `user`, `password`) VALUES
	(1, 'admin', '$2y$10$y9OEukkZuLkGj641aZ2toO7RtyFZd9DSkQFtGRyr6HihWYX6haP2m');
/*!40000 ALTER TABLE `ce_admin` ENABLE KEYS */;

-- 傾印  資料表 ntpuce.class 結構
CREATE TABLE IF NOT EXISTS `class` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `parent` smallint DEFAULT NULL,
  `mods` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- 正在傾印表格  ntpuce.class 的資料：~51 rows (近似值)
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT INTO `class` (`id`, `title`, `parent`, `mods`) VALUES
	(1, '????', NULL, '1'),
	(2, '????', NULL, '1'),
	(3, '????', NULL, '1'),
	(4, '????', NULL, '1'),
	(6, '?????', NULL, '1'),
	(8, '????', NULL, '1'),
	(9, '????', NULL, '1'),
	(10, '????', NULL, '1'),
	(11, '????', NULL, '3'),
	(12, '????', NULL, '3'),
	(13, '????', NULL, '3'),
	(14, '????', NULL, '3'),
	(15, '????', NULL, '2'),
	(16, '????', NULL, '2'),
	(17, '????', NULL, '2'),
	(18, '????/???', NULL, '2'),
	(19, '???', NULL, '2'),
	(20, '????', NULL, '2'),
	(21, '?????', NULL, '2'),
	(22, '????', NULL, '2'),
	(23, '????????', NULL, '2'),
	(24, '???', NULL, '2'),
	(25, '???', NULL, '2'),
	(27, '????', NULL, '5'),
	(28, 'Contact', NULL, '13'),
	(31, 'Introduction', NULL, '9'),
	(32, 'Education', NULL, '9'),
	(33, 'Faculty', NULL, '9'),
	(34, 'Admission', NULL, '9'),
	(35, 'Research', NULL, '9'),
	(36, 'IEET??', NULL, '1'),
	(37, 'Resource', NULL, '9'),
	(38, 'Event', NULL, '9'),
	(39, 'Intern', NULL, '9'),
	(40, 'IEET', NULL, '9'),
	(41, 'Announcement', NULL, '11'),
	(42, 'Admission Information', NULL, '11'),
	(43, 'Academic Activities', NULL, '11'),
	(44, 'Course Information', NULL, '11'),
	(45, 'Freshman', NULL, '10'),
	(46, 'Competition', NULL, '10'),
	(47, 'Senior Project', NULL, '10'),
	(48, 'Program', NULL, '10'),
	(49, 'Scholarship', NULL, '10'),
	(50, 'Alumni', NULL, '10'),
	(51, 'Departmental Society CE', NULL, '10'),
	(52, 'Photos', NULL, '10'),
	(53, 'CPE', NULL, '10'),
	(54, 'Honor Roll', NULL, '10'),
	(55, 'Q&A', NULL, '10'),
	(56, '????', NULL, '1');
/*!40000 ALTER TABLE `class` ENABLE KEYS */;

-- 傾印  資料表 ntpuce.document 結構
CREATE TABLE IF NOT EXISTS `document` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `path` varchar(80) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- 正在傾印表格  ntpuce.document 的資料：~0 rows (近似值)
/*!40000 ALTER TABLE `document` DISABLE KEYS */;
/*!40000 ALTER TABLE `document` ENABLE KEYS */;

-- 傾印  資料表 ntpuce.ga_item 結構
CREATE TABLE IF NOT EXISTS `ga_item` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL DEFAULT '0',
  `content` varchar(25) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT '0',
  `cover` varchar(200) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `href` varchar(200) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `topic` tinyint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin COMMENT='Item of ga_topic';

-- 正在傾印表格  ntpuce.ga_item 的資料：~95 rows (近似值)
/*!40000 ALTER TABLE `ga_item` DISABLE KEYS */;
INSERT INTO `ga_item` (`id`, `title`, `content`, `cover`, `href`, `topic`) VALUES
	(1, '??????????', '626d23e30a5d0', 'http://ce.ntpu.edu.tw:8080/images/??????????_page-0001.jpg', NULL, 1),
	(2, 'Device-to-Device ???????????', '626d23fd8ea8f', 'http://ce.ntpu.edu.tw:8080/images/Device-to-Device ???????????_page-0001.jpg', NULL, 1),
	(3, 'An Automatic Grade Input System', '626d2411303b7', 'http://ce.ntpu.edu.tw:8080/images/An Automatic Grade Input System_page-0001.jpg', NULL, 1),
	(4, '????????????????', '626d2424e7c8c', 'http://ce.ntpu.edu.tw:8080/images/????_????????????????.jpg', NULL, 1),
	(5, '?????', '626d243e3b94b', 'http://ce.ntpu.edu.tw:8080/images/?????.jpg', NULL, 1),
	(6, '??????????', '626d4f3baada7', 'http://ce.ntpu.edu.tw:8080/images/????- ??????????(???????????)_page-0001.jpg', NULL, 2),
	(7, 'Intelligent Tea Sensor ? IT’s ?????', '626d4f6815edc', 'http://ce.ntpu.edu.tw:8080/images/????_Intelligent Tea Sensor ? IT’s ?????_???????_page-0001.jpg', NULL, 2),
	(8, '?????????RSSI?????', '626d50096cbd0', 'http://ce.ntpu.edu.tw:8080/images/????_?????????RSSI?????_???_???_page-0001.jpg', NULL, 2),
	(9, '4G?5G?????????', '626d501ee9808', 'http://ce.ntpu.edu.tw:8080/images/????-4G?5G?????????(???)_page-0001 (1).jpg', NULL, 2),
	(10, 'A Study of Bit-Interleave Coded Modulation for Downlink Non-Orthogonal Multiple Access', '626d50339bdb2', 'http://ce.ntpu.edu.tw:8080/images/????-A Study of Bit-Interleave Coded Modulation for Downlink Non-Orthogonal Multiple Access(???????)_page-0001.jpg', NULL, 2),
	(11, 'MCS????????', '626d5048aa03a', 'http://ce.ntpu.edu.tw:8080/images/????-MCS????????(???????)_page-0001.jpg', NULL, 2),
	(12, 'Mission Critical push to talk', '626d5059de85e', 'http://ce.ntpu.edu.tw:8080/images/????-Mission Critical push to talk(???????)_page-0001.jpg', NULL, 2),
	(13, 'OTDOA?? - ?????????', '626d5073766b6', 'http://ce.ntpu.edu.tw:8080/images/????-OTDOA?? - ?????????(???????)_page-0001.jpg', NULL, 2),
	(14, '????????????', '626d50894596b', 'http://ce.ntpu.edu.tw:8080/images/????-????????????(???????)_page-0001 (1).jpg', NULL, 2),
	(15, '???Wilkinson??????', '626d509f96dbe', 'http://ce.ntpu.edu.tw:8080/images/????-???Wilkinson??????(???????)_page-0001.jpg', NULL, 2),
	(16, '?????-?????', '626d50b467691', 'http://ce.ntpu.edu.tw:8080/images/????-?????-?????(???????)_page-0001.jpg', NULL, 2),
	(17, '??????????????', '626d50c9d4c32', 'http://ce.ntpu.edu.tw:8080/images/????-??????????????(???)_page-0001.jpg', NULL, 2),
	(18, 'Active First Order-Low-Pass Filter', '626d536aac873', 'http://ce.ntpu.edu.tw:8080/images/A?_105???????_Active First Order-Low-Pass  Filter(???)_page-0001.jpg', NULL, 3),
	(19, 'Study _ Modeling of N-elements Phased Arrays', '626d53a1dd4bc', 'http://ce.ntpu.edu.tw:8080/images/B?_105???????_Study _ Modeling of N-elements Phased Arrays(???????????)_?????_page-0001.jpg', NULL, 3),
	(20, 'An approximate tapered-line impedance transformer', '626d53c0d0c30', 'http://ce.ntpu.edu.tw:8080/images/C?_105???????_An approximate tapered-line impedance transformer(???)_?????_page-0001.jpg', NULL, 3),
	(21, '???? 5G ??????????????????????', '626d53d8f3a64', 'http://ce.ntpu.edu.tw:8080/images/D?_105???????_???? 5G ??????????????????????(???????)_?????_page-0001.jpg', NULL, 3),
	(22, 'Binary Codebook Design for Broadcast System with Low Cost Receiver', '626d53f2f423d', 'http://ce.ntpu.edu.tw:8080/images/E?_105???????_Binary Codebook Design for Broadcast System with Low Cost Receiver(????????????)_?????_page-0001.jpg', NULL, 3),
	(23, 'Hybrid Automatic Repeat reQuest (HARQ)', '626d540ca01f5', 'http://ce.ntpu.edu.tw:8080/images/F?_105???????_Hybrid Automatic Repeat reQuest (HARQ)(??????)_?????_page-0001.jpg', NULL, 3),
	(24, 'VLC??????????', '626d542043c7b', 'http://ce.ntpu.edu.tw:8080/images/G?_105???????_VLC??????????(??????)_?????_page-0001.jpg', NULL, 3),
	(25, 'VLC??????????', '626d54281ac8b', 'http://ce.ntpu.edu.tw:8080/images/G?_105???????_VLC??????????(??????)_?????_page-0001.jpg', NULL, 3),
	(26, '??????????', '626d54332488c', 'http://ce.ntpu.edu.tw:8080/images/H?_105???????_??????????(??????)_?????_page-0001.jpg', NULL, 3),
	(27, 'Generalized Triangular Decomposition', '626d5445b2ff8', 'http://ce.ntpu.edu.tw:8080/images/I?_105???????_Generalized Triangular Decomposition(???????)_?????_page-0001.jpg', NULL, 3),
	(28, '???????????????', '626d545a6dea5', 'http://ce.ntpu.edu.tw:8080/images/J?_105???????_???????????????(??????)_?????_page-0001.jpg', NULL, 3),
	(29, 'NS2 ?????', '626d546ad3d15', 'http://ce.ntpu.edu.tw:8080/images/K?_105???????_NS2 ?????(??????)_?????_page-0001.jpg', NULL, 3),
	(30, '??????App', '626d547dcb788', 'http://ce.ntpu.edu.tw:8080/images/L?_105???????_??????App(???????)_?????_page-0001.jpg', NULL, 3),
	(31, '???????', '626d54a3104ed', 'http://ce.ntpu.edu.tw:8080/images/M?_105???????_??????????_?????_page-0001.jpg', NULL, 3),
	(32, '????', '626d54b741a0a', 'http://ce.ntpu.edu.tw:8080/images/N?_105???????_????(?????????)_?????_page-0001.jpg', NULL, 3),
	(33, '?????——???????', '626d54c856136', 'http://ce.ntpu.edu.tw:8080/images/O?_105???????_?????——???????(??????)_?????_page-0001.jpg', NULL, 3),
	(34, '?????', '626d54db6f9ee', 'http://ce.ntpu.edu.tw:8080/images/P?_105???????_?????(???????)_?????_page-0001.jpg', NULL, 3),
	(35, '?????', '626d54ddb4207', 'http://ce.ntpu.edu.tw:8080/images/P?_105???????_?????(???????)_?????_page-0001.jpg', NULL, 3),
	(36, '??????????', '626d54ec3b21c', 'http://ce.ntpu.edu.tw:8080/images/Q?_105???????_??????????(???????)_?????_page-0001.jpg', NULL, 3),
	(37, 'HTS???????????', '626d54fdb44f2', 'http://ce.ntpu.edu.tw:8080/images/R?_105???????_HTS???????????(??? ??? ???)_?????_page-0001.jpg', NULL, 3),
	(38, '????-??????????????', '626d5515bc006', 'http://ce.ntpu.edu.tw:8080/images/S?_105???????_????-??????????????(??????????????)_???_page-0001.jpg', NULL, 3),
	(39, 'Auto-car for Environment Detecting in Arduino', '626d5896e22c0', 'http://ce.ntpu.edu.tw:8080/images/????_Auto-car for Environment Detecting in Arduino_page-0001.jpg', NULL, 4),
	(40, 'Distributed Change Detection with Limited Bandwidth', '626d58d3569b8', 'http://ce.ntpu.edu.tw:8080/images/????_Distributed Change Detection with Limited Bandwidth_page-0001.jpg', NULL, 4),
	(41, 'Images Compressing via Autoencoder', '626d58e6cc670', 'http://ce.ntpu.edu.tw:8080/images/????_Images Compressing via Autoencoder_page-0001.jpg', NULL, 4),
	(42, '????????(cross road transportation analysis)', '626d58f3bca4a', 'http://ce.ntpu.edu.tw:8080/images/????_????????(cross road transportation analysis)_page-0001.jpg', NULL, 4),
	(43, '????????????', '626d59058e033', 'http://ce.ntpu.edu.tw:8080/images/????_????????????_page-0001.jpg', NULL, 4),
	(44, '???(IOV)??????', '626d5914f3609', 'http://ce.ntpu.edu.tw:8080/images/????_???(IOV)??????_page-0001.jpg', NULL, 4),
	(45, '?????????-???? ????', '626d5926e2f08', 'http://ce.ntpu.edu.tw:8080/images/????_?????????-???? ???? The Introduction of Project Report_page-0001.jpg', NULL, 4),
	(46, '?????????', '626d5936d800c', 'http://ce.ntpu.edu.tw:8080/images/????_?????????_page-0001.jpg', NULL, 4),
	(47, '??????????????????', '626d596ebfd8c', 'http://ce.ntpu.edu.tw:8080/images/????_??????????????????_page-0001.jpg', NULL, 4),
	(48, '????? (Narrowband Internet of Thing)', '626d5980ebcb2', 'http://ce.ntpu.edu.tw:8080/images/????_????? (Narrowband Internet of Thing)_page-0001.jpg', NULL, 4),
	(49, '?????????????????', '626d599000ab5', 'http://ce.ntpu.edu.tw:8080/images/????_?????????????????_page-0001.jpg', NULL, 4),
	(50, '?????', '626d599de79be', 'http://ce.ntpu.edu.tw:8080/images/????_?????_page-0001.jpg', NULL, 4),
	(51, '?????????????????', '626d59ae8e0f4', 'http://ce.ntpu.edu.tw:8080/images/????-?????????????????_page-0001.jpg', NULL, 4),
	(52, 'Compare 7th order bandpass filer based on LC resonance and combine HPF and LPF', '626d5a0b2f368', 'http://ce.ntpu.edu.tw:8080/images/q????_Compare 7th order bandpass filer based on LC resonance and combine HPF and LPF.jpg', NULL, 4),
	(53, '??????', '626d5a1836466', 'http://ce.ntpu.edu.tw:8080/images/q????_??????.jpg', NULL, 4),
	(54, 'Arduino????—????', '626d5a85ab0e0', 'http://ce.ntpu.edu.tw:8080/images/Arduino????—????????_v2.jpg', NULL, 5),
	(55, 'Ethercat Motion Platform', '626d5a94bec72', 'http://ce.ntpu.edu.tw:8080/images/Ethercat Motion Platform ????.png', NULL, 5),
	(56, 'Routing and Error Control for Minimizing Age of Information', '626d5aa777b82', 'http://ce.ntpu.edu.tw:8080/images/Routing and Error Control for Minimizing Age of Information.jpg', NULL, 5),
	(57, 'Smart Drinks', '626d5ab4bbb9c', 'http://ce.ntpu.edu.tw:8080/images/Smart Drinks.jpg', NULL, 5),
	(58, 'The Introduction of the Format of Project Report', '626d5ac3dd0cc', 'http://ce.ntpu.edu.tw:8080/images/The Introduction of the Format of Project Report.jpg', NULL, 5),
	(59, '??????????????', '626d5b20113c4', 'http://ce.ntpu.edu.tw:8080/images/??????????????.jpg', NULL, 5),
	(60, '?????????????????', '626d5b2cbf7d7', 'http://ce.ntpu.edu.tw:8080/images/?????????????????.jpg', NULL, 5),
	(61, '?????????????????', '626d5b3a7c6f2', 'http://ce.ntpu.edu.tw:8080/images/??_?????????????????.jpg', NULL, 5),
	(62, '???????', '626d5b4814e7a', 'http://ce.ntpu.edu.tw:8080/images/???????.jpg', NULL, 5),
	(63, '??????????????', '626d5b53d64d6', 'http://ce.ntpu.edu.tw:8080/images/??????????????.jpg', NULL, 5),
	(64, '?????', '626d5b6a23384', 'http://ce.ntpu.edu.tw:8080/images/?????.JPG', NULL, 5),
	(65, '????? Lights that sing', '626d5b79da6d3', 'http://ce.ntpu.edu.tw:8080/images/????? Lights that sing.jpg', NULL, 5),
	(66, '????????? (A laser pointer more than what you see)', '626d5b877555e', 'http://ce.ntpu.edu.tw:8080/images/????????? (A laser pointer more than what you see).jpg', NULL, 5),
	(67, '??????????? (Voice Activity Detection )', '626d5b93ac58a', 'http://ce.ntpu.edu.tw:8080/images/??????????? (Voice Activity Detection ).jpg', NULL, 5),
	(68, 'Are you happy?', '626e78a3e02df', 'http://ce.ntpu.edu.tw/images/PRJ-Post-NTPUCE  108-01_page-0001.jpg', NULL, 6),
	(69, 'Research on Theory and Simulation of Spectrum Auction System', '626e792f40424', 'http://ce.ntpu.edu.tw/images/PRJ-Post-NTPUCE  108-02_page-0001.jpg', NULL, 6),
	(70, '?????', '626e794c02ea1', 'http://ce.ntpu.edu.tw/images/PRJ-Post-NTPUCE  108-03_page-0001.jpg', NULL, 6),
	(71, '??????????', '626e79659456d', 'http://ce.ntpu.edu.tw/images/PRJ-Post-NTPUCE  108-04_page-0001.jpg', NULL, 6),
	(72, '?????????????', '626e7995b3847', 'http://ce.ntpu.edu.tw/images/PRJ-Post-NTPUCE  108-05_page-0001.jpg', NULL, 6),
	(73, '???????? Voice control car and Communication Technology', '626e79cad16a0', 'http://ce.ntpu.edu.tw/images/PRJ-Post-NTPUCE  108-06_page-0001.jpg', NULL, 6),
	(74, '??????? Technique of wireless audio & video - visible light communication', '626e7a2885b5b', 'http://ce.ntpu.edu.tw/images/PRJ-Post-NTPUCE  108-07_page-0001.jpg', NULL, 6),
	(75, 'Arduino????? Campus automatic sprinkler', '626e7a6e12c76', 'http://ce.ntpu.edu.tw/images/PRJ-Post-NTPUCE  108-08_page-0001.jpg', NULL, 6),
	(76, 'DeepAutoRescue: Autonomous UAV Disaster  Search and Rescue Machines by Deep Reinforcement Learning', '626e7ab397093', 'http://ce.ntpu.edu.tw/images/PRJ-Post-NTPUCE  108-09_page-0001.jpg', NULL, 6),
	(77, '?????????', '626e7afd64036', 'http://ce.ntpu.edu.tw/images/PRJ-Post-NTPUCE  108-10_page-0001.jpg', NULL, 6),
	(78, 'Jamming versus Communication: A game with reinforcement learning agents', '626e7b33310ce', 'http://ce.ntpu.edu.tw/images/PRJ-Post-NTPUCE  108-11_page-0001.jpg', NULL, 6),
	(79, '???? - ?????????', '626e7b54bbfad', 'http://ce.ntpu.edu.tw/images/PRJ-Post-NTPUCE  108-12_page-0001.jpg', NULL, 6),
	(80, '???? Infinite Light Mouse', '626e7b7b33e19', 'http://ce.ntpu.edu.tw/images/PRJ-Post-NTPUCE  108-13_page-0001.jpg', NULL, 6),
	(81, '?????????????????? Mobile device real-time optical character recognition and remote display', '626e7bcb4c927', 'http://ce.ntpu.edu.tw/images/PRJ-Post-NTPUCE  108-14_page-0001.jpg', NULL, 6),
	(82, '?????', '626e7be4afbb3', 'http://ce.ntpu.edu.tw/images/PRJ-Post-NTPUCE  108-15_page-0001.jpg', NULL, 6),
	(83, '????????????', '628df2ae9df7e', 'http://ce.ntpu.edu.tw/images/Screenshot 2022-05-25 165620.png', 'https://drive.google.com/file/d/1aMwKfspOIj3LKwo3Z7B2YcC_Ok0mOPqL/view?usp=sharing', 7),
	(84, '??????????????????', '628df2cd3f34e', 'http://ce.ntpu.edu.tw/images/Screenshot 2022-05-25 165736.png', 'https://drive.google.com/file/d/1kr90-WMX5yNMaZ69KKhibEKfQQFIpazY/view?usp=sharing', 7),
	(85, '?????????', '628df46440cf2', 'http://ce.ntpu.edu.tw/images/Screenshot 2022-05-25 165836.png', 'https://drive.google.com/file/d/1LV9Rvd_5vhPjWIuVopuVP_HGMF3o-Sjm/view?usp=sharing', 7),
	(86, '??Qlearning???????????', '628df47d160f7', 'http://ce.ntpu.edu.tw/images/Screenshot 2022-05-25 165908.png', 'https://drive.google.com/file/d/1z_ERM64SZdLfKx1d9jkFc2iyLhGSzvot/view?usp=sharing', 7),
	(87, '????', '628df4901d953', 'http://ce.ntpu.edu.tw/images/Screenshot 2022-05-25 165938.png', 'https://drive.google.com/file/d/1TBRN8MkEZ73VQyWVbceLDmqiuKoan1ba/view?usp=sharing', 7),
	(88, '??!Ciao Ciao!', '628df4b5e6866', 'http://ce.ntpu.edu.tw/images/Screenshot 2022-05-25 170016.png', 'https://drive.google.com/file/d/1gFH7JLV0muQxZflwEZ0KV_i7BR3mDY18/view?usp=sharing', 7),
	(89, '???????', '628df4cdedf7f', 'http://ce.ntpu.edu.tw/images/Screenshot 2022-05-25 170141.png', 'https://drive.google.com/file/d/1Ey0C8RcwY_ZcvnGK-Beclzu6S-8gC26D/view?usp=sharing', 7),
	(90, '??TTS????????????????', '628df4e822b10', 'http://ce.ntpu.edu.tw/images/Screenshot 2022-05-25 170216.png', 'https://drive.google.com/file/d/19QrqBNdoiWuYPb9hiN1xOP1iQSlHGOA6/view?usp=sharing', 7),
	(91, '????', '628df4fb54bb7', 'http://ce.ntpu.edu.tw/images/Screenshot 2022-05-25 170302.png', 'https://drive.google.com/file/d/10QBV8mff3j8SbU8ih8yxXPm_v7U9WFSi/view?usp=sharing', 7),
	(92, '?????', '628df512ae064', 'http://ce.ntpu.edu.tw/images/Screenshot 2022-05-25 170328.png', 'https://drive.google.com/file/d/1WQNAGZz3ejxURxp0Mk7pWP-8pWgPC3TJ/view?usp=sharing', 7),
	(93, '????????', '628df529b4959', 'http://ce.ntpu.edu.tw/images/Screenshot 2022-05-25 170401.png', 'https://drive.google.com/file/d/16SoAB_Rm91uKSvAFSWySByannT7aFk1D/view?usp=sharing', 7),
	(94, 'OPCUA-?????', '628df53ce3df7', 'http://ce.ntpu.edu.tw/images/Screenshot 2022-05-25 170559.png', 'https://drive.google.com/file/d/1mTa42TCTf2DyFmeJeAssaVYm-Ruxl9eC/view?usp=sharing', 7),
	(95, 'Wi-Fi?????????', '628df551f1408', 'http://ce.ntpu.edu.tw/images/Screenshot 2022-05-25 170634.png', 'https://drive.google.com/file/d/1WtObTeUXEjd_EtdR0Rl4yftl18W6QGU0/view?usp=sharing', 7);
/*!40000 ALTER TABLE `ga_item` ENABLE KEYS */;

-- 傾印  資料表 ntpuce.ga_topic 結構
CREATE TABLE IF NOT EXISTS `ga_topic` (
  `id` tinyint NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin COMMENT='Here record topic for ga_item to group same topic events.';

-- 正在傾印表格  ntpuce.ga_topic 的資料：~7 rows (近似值)
/*!40000 ALTER TABLE `ga_topic` DISABLE KEYS */;
INSERT INTO `ga_topic` (`id`, `name`) VALUES
	(1, '103??? ????'),
	(2, '104??? ????'),
	(3, '105??? ????'),
	(4, '106??? ????'),
	(5, '107??? ????'),
	(6, '108??? ????'),
	(7, '109??? ????');
/*!40000 ALTER TABLE `ga_topic` ENABLE KEYS */;

-- 傾印  資料表 ntpuce.mods 結構
CREATE TABLE IF NOT EXISTS `mods` (
  `id` tinyint NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- 正在傾印表格  ntpuce.mods 的資料：~12 rows (近似值)
/*!40000 ALTER TABLE `mods` DISABLE KEYS */;
INSERT INTO `mods` (`id`, `name`) VALUES
	(1, 'nav'),
	(2, 'lfcol'),
	(3, 'info'),
	(4, 'board'),
	(5, 'contact'),
	(9, 'nav_eng'),
	(10, 'lfcol_eng'),
	(11, 'info_eng'),
	(12, 'board_eng'),
	(13, 'contact_eng'),
	(15, 'home_banner'),
	(16, 'topic_banner');
/*!40000 ALTER TABLE `mods` ENABLE KEYS */;

-- 傾印  資料表 ntpuce.post 結構
CREATE TABLE IF NOT EXISTS `post` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `class` smallint DEFAULT NULL,
  `enable` tinyint(1) NOT NULL DEFAULT '1',
  `content` varchar(25) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `published` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `href` varchar(300) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin COMMENT='If ''href'' is not NULL, it redirect to the url. ';

-- 正在傾印表格  ntpuce.post 的資料：~0 rows (近似值)
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` (`id`, `title`, `class`, `enable`, `content`, `published`, `href`) VALUES
	(1, '????', 1, 1, '622cc197cd614', '2022-03-12 15:51:51', NULL),
	(2, '????', 2, 1, '622cc26eb98a3', '2022-03-12 15:55:26', NULL),
	(3, '????', 3, 1, '622cc37348571', '2022-03-12 15:59:47', NULL),
	(4, '????', 4, 1, '622cc3aee695a', '2022-03-12 16:00:46', NULL),
	(5, '?????', 6, 1, '622cc3d6c3304', '2022-03-12 16:01:26', NULL),
	(6, 'IEET??', 7, 1, '622cc3fa6aa82', '2022-03-12 16:02:02', NULL),
	(7, '??????????????????????110????1????(110?8?)', 11, 1, '62300374b4c5c', '2022-03-15 03:09:40', NULL),
	(8, '109????1????????????????????????', 11, 1, '623003cd62c71', '2022-03-15 03:11:09', NULL),
	(9, '??109????2???????????????????????????', 11, 1, '623003fe9f777', '2022-03-15 03:11:58', NULL),
	(10, '????????402?409??????', 11, 1, '6230041708ada', '2022-03-15 03:12:23', NULL),
	(11, '109????2??????????????????????????????', 11, 1, '6230042d8a2c7', '2022-03-15 03:12:45', NULL),
	(12, '??????????????????', 11, 1, '62300441c4c4a', '2022-03-15 03:13:05', NULL),
	(13, '?????????????????????110?9?24?', 11, 1, '62300455d820f', '2022-03-15 03:13:25', NULL),
	(14, '??110????1???????????????????????????', 11, 1, '623004702d7b1', '2022-03-15 03:13:52', NULL),
	(15, '??????????????????(??????(?)????????1???????????111?8?1?)', 11, 1, '623004b9451fd', '2022-03-15 03:15:05', NULL),
	(16, '110????1??????????????????????????', 11, 1, '623004d6a7a4b', '2022-03-15 03:15:34', NULL),
	(17, '110???-???????????????????????????', 12, 1, '6233dbf881349', '2022-03-18 01:10:16', NULL),
	(18, '??????110?????????????????????', 12, 1, '6233dc3685c6a', '2022-03-18 01:11:18', NULL),
	(19, '110???????????????????????????????', 12, 1, '6233dc5a12215', '2022-03-18 01:11:54', NULL),
	(20, '111???-???????????????????????????', 12, 1, '6233dc710a03d', '2022-03-18 01:12:17', NULL),
	(21, '111?????????????????????', 12, 1, '6233dc85add42', '2022-03-18 01:12:37', NULL),
	(22, '??????111????????????????????', 12, 1, '6233dc96c3196', '2022-03-18 01:12:54', NULL),
	(23, '111?????????????????????', 12, 1, '6233dcbca271c', '2022-03-18 01:13:32', NULL),
	(24, '111????????????????????', 12, 1, '6233dcd0a4875', '2022-03-18 01:13:52', NULL),
	(25, '????(110/01/08)?????????? (?????????????????)', 13, 1, '6233dcf47cc4a', '2022-03-18 01:14:28', NULL),
	(26, '????(110/03/26)???? ??? (??????????)', 13, 1, '6233dd090fa06', '2022-03-18 01:14:49', NULL),
	(27, '????????????109????2??????????', 13, 1, '6233dd1d73fa1', '2022-03-18 01:15:09', NULL),
	(28, '????????????109????2??????????_(???).pdf', 13, 1, '6233dd331b0ce', '2022-03-18 01:15:31', NULL),
	(29, '????????????109????2??????????', 13, 1, '6233dd45ba890', '2022-03-18 01:15:49', NULL),
	(30, '????(110/10/08)??????? (??????????MIC)', 13, 1, '6233dd592ce1e', '2022-03-18 01:16:09', NULL),
	(31, '????(110/11/05)???????? (??????????)', 13, 1, '6233dd6dc784a', '2022-03-18 01:16:29', NULL),
	(32, '????(111/01/14)??????? (??????????)', 13, 1, '6233dd84c9a49', '2022-03-18 01:16:52', NULL),
	(33, '????(111/03/11)????????(??????????????)', 13, 1, '6233dd97da23a', '2022-03-18 01:17:11', NULL),
	(39, '????', 14, 0, '624fb1ad55958', '2022-04-08 03:53:17', NULL),
	(40, '????', 14, 0, '624fb1ca6bdc2', '2022-04-08 03:53:46', NULL),
	(41, '????', 15, 1, '624ff0e1c132e', '2022-04-08 08:22:57', '/files/2019.pdf'),
	(42, '????', 16, 1, '624ff186db823', '2022-04-08 08:25:42', NULL),
	(43, 'Senior Project', 17, 1, '624ffbaacc836', '2022-04-08 09:08:58', NULL),
	(44, '????/???', 18, 1, '625023342e7fe', '2022-04-08 11:57:40', NULL),
	(45, 'Scholarship', 19, 1, '625027ab2983e', '2022-04-08 12:16:43', NULL),
	(46, '?????', 21, 1, '625027de24259', '2022-04-08 12:17:34', 'https://www.facebook.com/NTPUCESA/?fref=photo'),
	(47, '????', 22, 1, '6250280d82531', '2022-04-08 12:18:21', 'https://www.flickr.com/photos/147841653@N02/albums'),
	(48, '????????', 23, 1, '62502826b91ca', '2022-04-08 12:18:46', 'https://cpe.cse.nsysu.edu.tw/'),
	(49, '[ ?? ] ??????"???????????" ??', 24, 1, '6250284c12e5a', '2022-04-08 12:19:24', NULL),
	(50, '104?????', 24, 1, '6250286ec0e7c', '2022-04-08 12:19:58', NULL),
	(51, '105?????', 24, 1, '6250288ef09eb', '2022-04-08 12:20:30', NULL),
	(52, 'CPE??????', 24, 1, '625028a1880e5', '2022-04-08 12:20:49', NULL),
	(53, '??TOEFL', 24, 1, '625028b29fa12', '2022-04-08 12:21:06', NULL),
	(54, '106?????', 24, 1, '625028bd5d760', '2022-04-08 12:21:17', NULL),
	(55, '???', 25, 1, '6250292a2176a', '2022-04-08 12:23:06', NULL),
	(56, '???????????????', 11, 1, '625029e5e0afb', '2022-04-08 12:26:13', NULL),
	(57, '????(111/03/25)??????(???/?????????????)', 13, 1, '62502b2909f12', '2022-04-08 12:31:37', NULL),
	(58, 'Contact', 27, 1, '62591b4154d9d', '2022-04-15 07:14:09', NULL),
	(59, 'IEET ??', 36, 1, '62592ca458aef', '2022-04-15 08:28:20', NULL),
	(60, '????(111/04/22)???????(?????? ????)', 13, 1, '62624569f001a', '2022-04-22 06:04:25', NULL),
	(62, '??????????????????????1090408', 56, 1, '6262671515bc0', '2022-04-22 08:28:05', NULL),
	(63, '???????????????????????', 56, 1, '6262675588c54', '2022-04-22 08:29:09', NULL),
	(64, '???????????????', 56, 1, '626267b32ae61', '2022-04-22 08:30:43', NULL),
	(65, '??????????', 56, 1, '6262684dd1471', '2022-04-22 08:33:17', NULL),
	(66, '??????????', 56, 1, '62626b1612871', '2022-04-22 08:45:10', NULL),
	(67, '???????', 56, 1, '62626c6c624bd', '2022-04-22 08:50:52', NULL),
	(68, '???????', 56, 1, '62626f55da1bf', '2022-04-22 09:03:17', NULL),
	(69, '??110????2???????????????????????????', 11, 1, '62660dde7bed5', '2022-04-25 02:56:30', NULL),
	(70, 'Education', 32, 1, '62680e3b18675', '2022-04-26 15:22:35', NULL),
	(71, 'Faculty', 33, 1, '6268111192bd5', '2022-04-26 15:34:41', NULL),
	(72, '110??????????????????', 13, 1, '626f887d09bc1', '2022-05-02 07:30:05', NULL),
	(75, '????????????????_????', 10, 1, '627e1121c4dfd', '2022-05-13 08:04:49', NULL),
	(77, '??????????????????RF???????', 10, 1, '627e12ee35abf', '2022-05-13 08:12:30', NULL),
	(79, 'IEET', 40, 1, '627e1d0b354da', '2022-05-13 08:55:39', NULL),
	(80, 'Research', 35, 1, '627e31d6e5ed6', '2022-05-13 10:24:22', NULL),
	(81, 'Resource', 37, 1, '627e369cb5798', '2022-05-13 10:44:44', NULL),
	(82, 'contact', 28, 1, '627e3afc371e3', '2022-05-13 11:03:24', NULL),
	(84, '????????????110????2??????????', 13, 1, '6282ff557398f', '2022-05-17 01:50:13', NULL),
	(85, '????(111/05/27)??????(???????????/?????)', 13, 1, '628b1e6c646a8', '2022-05-23 05:41:00', NULL),
	(86, '110????2??????????????????????????', 11, 1, '62a042e058758', '2022-06-08 06:34:08', NULL),
	(88, '????????????110????2????????Microsoft teams??', 13, 1, '62b42dfbbeb50', '2022-06-23 09:10:19', NULL),
	(89, '????????????110????2????????????', 13, 1, '62b58d140722c', '2022-06-24 10:08:20', NULL),
	(90, '??????_??????(?)????????1???????????112?2?1??', 11, 1, '62c28831ef078', '2022-07-04 06:26:57', NULL),
	(91, '?????????????????', 10, 1, '62ec8e273f75a', '2022-08-05 03:27:35', NULL);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
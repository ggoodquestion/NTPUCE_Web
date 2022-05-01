-- --------------------------------------------------------
-- 主機:                           120.126.151.25
-- 伺服器版本:                        8.0.28-0ubuntu0.20.04.3 - (Ubuntu)
-- 伺服器作業系統:                      Linux
-- HeidiSQL 版本:                  11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- 傾印 ceweb 的資料庫結構
CREATE DATABASE IF NOT EXISTS `ceweb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ceweb`;

-- 傾印  資料表 ceweb.carousel 結構
CREATE TABLE IF NOT EXISTS `carousel` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `url` varchar(200) NOT NULL DEFAULT '0',
  `href` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '',
  `enable` tinyint(1) NOT NULL DEFAULT '1',
  `mods` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- 正在傾印表格  ceweb.carousel 的資料：~0 rows (近似值)
/*!40000 ALTER TABLE `carousel` DISABLE KEYS */;
/*!40000 ALTER TABLE `carousel` ENABLE KEYS */;

-- 傾印  資料表 ceweb.ce_admin 結構
CREATE TABLE IF NOT EXISTS `ce_admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(20) DEFAULT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- 正在傾印表格  ceweb.ce_admin 的資料：~0 rows (近似值)
/*!40000 ALTER TABLE `ce_admin` DISABLE KEYS */;
REPLACE INTO `ce_admin` (`id`, `user`, `password`) VALUES
	(1, 'admin', '$2y$10$y9OEukkZuLkGj641aZ2toO7RtyFZd9DSkQFtGRyr6HihWYX6haP2m');
/*!40000 ALTER TABLE `ce_admin` ENABLE KEYS */;

-- 傾印  資料表 ceweb.class 結構
CREATE TABLE IF NOT EXISTS `class` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `parent` smallint DEFAULT NULL,
  `mods` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- 正在傾印表格  ceweb.class 的資料：~51 rows (近似值)
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
REPLACE INTO `class` (`id`, `title`, `parent`, `mods`) VALUES
	(1, '系所簡介', NULL, '1'),
	(2, '教育目標', NULL, '1'),
	(3, '師資介紹', NULL, '1'),
	(4, '招生資訊', NULL, '1'),
	(6, '實驗室介紹', NULL, '1'),
	(8, '相關資源', NULL, '1'),
	(9, '活動剪影', NULL, '1'),
	(10, '實習徵才', NULL, '1'),
	(11, '系辦公告', NULL, '3'),
	(12, '招生快訊', NULL, '3'),
	(13, '學術活動', NULL, '3'),
	(14, '課務訊息', NULL, '3'),
	(15, '新生專區', NULL, '2'),
	(16, '競賽資訊', NULL, '2'),
	(17, '專題製作', NULL, '2'),
	(18, '學分學程/微學程', NULL, '2'),
	(19, '獎學金', NULL, '2'),
	(20, '系友專區', NULL, '2'),
	(21, '通訊系學會', NULL, '2'),
	(22, '相片集錦', NULL, '2'),
	(23, '大學程式能力檢定', NULL, '2'),
	(24, '榮譽榜', NULL, '2'),
	(25, '問與答', NULL, '2'),
	(27, '聯絡我們', NULL, '5'),
	(28, 'Contact', NULL, '13'),
	(31, 'Introduction', NULL, '9'),
	(32, 'Education', NULL, '9'),
	(33, 'Faculty', NULL, '9'),
	(34, 'Admission', NULL, '9'),
	(35, 'Research', NULL, '9'),
	(36, 'IEET認證', NULL, '1'),
	(37, 'Resource', NULL, '9'),
	(38, 'Event', NULL, '9'),
	(39, 'Intern', NULL, '9'),
	(40, 'IEEE', NULL, '9'),
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
	(56, '課程規劃', NULL, '1');
/*!40000 ALTER TABLE `class` ENABLE KEYS */;

-- 傾印  資料表 ceweb.document 結構
CREATE TABLE IF NOT EXISTS `document` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `path` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- 正在傾印表格  ceweb.document 的資料：~0 rows (近似值)
/*!40000 ALTER TABLE `document` DISABLE KEYS */;
/*!40000 ALTER TABLE `document` ENABLE KEYS */;

-- 傾印  資料表 ceweb.ga_item 結構
CREATE TABLE IF NOT EXISTS `ga_item` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '0',
  `content` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
  `cover` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `href` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `topic` tinyint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Item of ga_topic';

-- 正在傾印表格  ceweb.ga_item 的資料：~67 rows (近似值)
/*!40000 ALTER TABLE `ga_item` DISABLE KEYS */;
REPLACE INTO `ga_item` (`id`, `title`, `content`, `cover`, `href`, `topic`) VALUES
	(1, '雲端家庭防盜系統海報', '626d23e30a5d0', 'http://ce.ntpu.edu.tw:8080/images/雲端家庭防盜系統海報_page-0001.jpg', NULL, 1),
	(2, 'Device-to-Device 搜索式服務的探討與應用', '626d23fd8ea8f', 'http://ce.ntpu.edu.tw:8080/images/Device-to-Device 搜索式服務的探討與應用_page-0001.jpg', NULL, 1),
	(3, 'An Automatic Grade Input System', '626d2411303b7', 'http://ce.ntpu.edu.tw:8080/images/An Automatic Grade Input System_page-0001.jpg', NULL, 1),
	(4, '英文逐字對照發音語言學習系統開發', '626d2424e7c8c', 'http://ce.ntpu.edu.tw:8080/images/專題海報_英文逐字對照發音語言學習系統開發.jpg', NULL, 1),
	(5, '火災警報器', '626d243e3b94b', 'http://ce.ntpu.edu.tw:8080/images/火災警報器.jpg', NULL, 1),
	(6, '紅外線偵測避障自走車', '626d4f3baada7', 'http://ce.ntpu.edu.tw:8080/images/專題海報- 紅外線偵測避障自走車(黃品超、張志宏、王聖嘉)_page-0001.jpg', NULL, 2),
	(7, 'Intelligent Tea Sensor – IT’s 智慧泡茶器', '626d4f6815edc', 'http://ce.ntpu.edu.tw:8080/images/專題海報_Intelligent Tea Sensor – IT’s 智慧泡茶器_黃昱魁、陳惟榮_page-0001.jpg', NULL, 2),
	(8, '以模糊推論系統分析RSSI之室內定位', '626d50096cbd0', 'http://ce.ntpu.edu.tw:8080/images/專題海報_以模糊推論系統分析RSSI之室內定位_潘允涵_鍾聖芬_page-0001.jpg', NULL, 2),
	(9, '4G、5G行動通訊分析與預測', '626d501ee9808', 'http://ce.ntpu.edu.tw:8080/images/專題海報-4G、5G行動通訊分析與預測(鍾耀梁)_page-0001 (1).jpg', NULL, 2),
	(10, 'A Study of Bit-Interleave Coded Modulation for Downlink Non-Orthogonal Multiple Access', '626d50339bdb2', 'http://ce.ntpu.edu.tw:8080/images/專題海報-A Study of Bit-Interleave Coded Modulation for Downlink Non-Orthogonal Multiple Access(曾奕瑄、游承祐)_page-0001.jpg', NULL, 2),
	(11, 'MCS物聯交通感測系統', '626d5048aa03a', 'http://ce.ntpu.edu.tw:8080/images/專題海報-MCS物聯交通感測系統(周賢仁、吳昭沁)_page-0001.jpg', NULL, 2),
	(12, 'Mission Critical push to talk', '626d5059de85e', 'http://ce.ntpu.edu.tw:8080/images/專題海報-Mission Critical push to talk(莊智麟、林群穎)_page-0001.jpg', NULL, 2),
	(13, 'OTDOA定位 - 頻寬與錯誤率的關係', '626d5073766b6', 'http://ce.ntpu.edu.tw:8080/images/專題海報-OTDOA定位 - 頻寬與錯誤率的關係(陳亭穎、李育珊)_page-0001.jpg', NULL, 2),
	(14, '可見光通訊之室內定位研究', '626d50894596b', 'http://ce.ntpu.edu.tw:8080/images/專題海報-可見光通訊之室內定位研究(簡慧竹、吳承樊)_page-0001 (1).jpg', NULL, 2),
	(15, '改良式Wilkinson藕合器之設計', '626d509f96dbe', 'http://ce.ntpu.edu.tw:8080/images/專題海報-改良式Wilkinson藕合器之設計(林志炘、呂冠勳)_page-0001.jpg', NULL, 2),
	(16, '物聯網應用-智慧停車場', '626d50b467691', 'http://ce.ntpu.edu.tw:8080/images/專題海報-物聯網應用-智慧停車場(許永超、陳智圓)_page-0001.jpg', NULL, 2),
	(17, '海報口說旅遊中文翻譯英文系統', '626d50c9d4c32', 'http://ce.ntpu.edu.tw:8080/images/專題海報-海報口說旅遊中文翻譯英文系統(江振宇)_page-0001.jpg', NULL, 2),
	(18, 'Active First Order-Low-Pass Filter', '626d536aac873', 'http://ce.ntpu.edu.tw:8080/images/A組_105學年度專題海報_Active First Order-Low-Pass  Filter(賴昭旭)_page-0001.jpg', NULL, 3),
	(19, 'Study _ Modeling of N-elements Phased Arrays', '626d53a1dd4bc', 'http://ce.ntpu.edu.tw:8080/images/B組_105學年度專題海報_Study _ Modeling of N-elements Phased Arrays(賴見婷、吳秀英、周蘊蕙)_余帝穀老師_page-0001.jpg', NULL, 3),
	(20, 'An approximate tapered-line impedance transformer', '626d53c0d0c30', 'http://ce.ntpu.edu.tw:8080/images/C組_105學年度專題海報_An approximate tapered-line impedance transformer(廖鍇旻)_余帝穀教師_page-0001.jpg', NULL, 3),
	(21, '可應用於 5G 行動通訊天線陣列系統中之功率分配器的析與設計', '626d53d8f3a64', 'http://ce.ntpu.edu.tw:8080/images/D組_105學年度專題海報_可應用於 5G 行動通訊天線陣列系統中之功率分配器的析與設計(黃碧鈴、林郁昕)_余帝穀老師_page-0001.jpg', NULL, 3),
	(22, 'Binary Codebook Design for Broadcast System with Low Cost Receiver', '626d53f2f423d', 'http://ce.ntpu.edu.tw:8080/images/E組_105學年度專題海報_Binary Codebook Design for Broadcast System with Low Cost Receiver(苗瑞庭陳韋成陳嘉宏鄭翔升)_謝欣霖教師_page-0001.jpg', NULL, 3),
	(23, 'Hybrid Automatic Repeat reQuest (HARQ)', '626d540ca01f5', 'http://ce.ntpu.edu.tw:8080/images/F組_105學年度專題海報_Hybrid Automatic Repeat reQuest (HARQ)(施廷睿陳泰勳)_謝欣臨老師_page-0001.jpg', NULL, 3),
	(24, 'VLC可見光通訊研究與實作', '626d542043c7b', 'http://ce.ntpu.edu.tw:8080/images/G組_105學年度專題海報_VLC可見光通訊研究與實作(郭濟源鄭政民)_謝欣霖教師_page-0001.jpg', NULL, 3),
	(25, 'VLC可見光通訊研究與實作', '626d54281ac8b', 'http://ce.ntpu.edu.tw:8080/images/G組_105學年度專題海報_VLC可見光通訊研究與實作(郭濟源鄭政民)_謝欣霖教師_page-0001.jpg', NULL, 3),
	(26, '可見光通訊之室內定位', '626d54332488c', 'http://ce.ntpu.edu.tw:8080/images/H組_105學年度專題海報_可見光通訊之室內定位(陳謙新謝名斌)_謝欣霖老師_page-0001.jpg', NULL, 3),
	(27, 'Generalized Triangular Decomposition', '626d5445b2ff8', 'http://ce.ntpu.edu.tw:8080/images/I組_105學年度專題海報_Generalized Triangular Decomposition(蕭凱地、黎于榛)_黃昱智老師_page-0001.jpg', NULL, 3),
	(28, '智慧型車用網路之排程分析與設計', '626d545a6dea5', 'http://ce.ntpu.edu.tw:8080/images/J組_105學年度專題海報_智慧型車用網路之排程分析與設計(湯景旭白佳灝)_黃昱智老師_page-0001.jpg', NULL, 3),
	(29, 'NS2 車聯網模擬', '626d546ad3d15', 'http://ce.ntpu.edu.tw:8080/images/K組_105學年度專題海報_NS2 車聯網模擬(陳東源林器盛)_魏存毅老師_page-0001.jpg', NULL, 3),
	(30, '相片自動備份App', '626d547dcb788', 'http://ce.ntpu.edu.tw:8080/images/L組_105學年度專題海報_相片自動備份App(楊耘豪、吳穎誠)_魏存毅老師_page-0001.jpg', NULL, 3),
	(31, '自動送餐機器人', '626d54a3104ed', 'http://ce.ntpu.edu.tw:8080/images/M組_105學年度專題海報_自動送餐機器人孫得恭_白宏達老師_page-0001.jpg', NULL, 3),
	(32, '園丁幫手', '626d54b741a0a', 'http://ce.ntpu.edu.tw:8080/images/N組_105學年度專題海報_園丁幫手(黃冠球黃柏維陳彥誠)_白宏達教師_page-0001.jpg', NULL, 3),
	(33, '物聯網應用——藍牙遙控寫字機', '626d54c856136', 'http://ce.ntpu.edu.tw:8080/images/O組_105學年度專題海報_物聯網應用——藍牙遙控寫字機(黃琮淇楊秉宸)_王鵬華教師_page-0001.jpg', NULL, 3),
	(34, '地球溫度計', '626d54db6f9ee', 'http://ce.ntpu.edu.tw:8080/images/P組_105學年度專題海報_地球溫度計(張書豪、林品皓)_王鵬華教師_page-0001.jpg', NULL, 3),
	(35, '地球溫度計', '626d54ddb4207', 'http://ce.ntpu.edu.tw:8080/images/P組_105學年度專題海報_地球溫度計(張書豪、林品皓)_王鵬華教師_page-0001.jpg', NULL, 3),
	(36, '多功能遠端溫度監測器', '626d54ec3b21c', 'http://ce.ntpu.edu.tw:8080/images/Q組_105學年度專題海報_多功能遠端溫度監測器(楊博鈞、游輝吉)_王鵬華老師_page-0001.jpg', NULL, 3),
	(37, 'HTS語音合成暨情緒調適系統', '626d54fdb44f2', 'http://ce.ntpu.edu.tw:8080/images/R組_105學年度專題海報_HTS語音合成暨情緒調適系統(高晟哲 葉以深 陳世麟)_江振宇教師_page-0001.jpg', NULL, 3),
	(38, '詐騙剋星-人聲轉換與原音相似度評估系統', '626d5515bc006', 'http://ce.ntpu.edu.tw:8080/images/S組_105學年度專題海報_詐騙剋星-人聲轉換與原音相似度評估系統(徐邦耀余鎮豪邱涵許芯瑜曹又壬)_江振宇_page-0001.jpg', NULL, 3),
	(39, 'Auto-car for Environment Detecting in Arduino', '626d5896e22c0', 'http://ce.ntpu.edu.tw:8080/images/專題海報_Auto-car for Environment Detecting in Arduino_page-0001.jpg', NULL, 4),
	(40, 'Distributed Change Detection with Limited Bandwidth', '626d58d3569b8', 'http://ce.ntpu.edu.tw:8080/images/專題海報_Distributed Change Detection with Limited Bandwidth_page-0001.jpg', NULL, 4),
	(41, 'Images Compressing via Autoencoder', '626d58e6cc670', 'http://ce.ntpu.edu.tw:8080/images/專題海報_Images Compressing via Autoencoder_page-0001.jpg', NULL, 4),
	(42, '十字路口交通分析(cross road transportation analysis)', '626d58f3bca4a', 'http://ce.ntpu.edu.tw:8080/images/專題海報_十字路口交通分析(cross road transportation analysis)_page-0001.jpg', NULL, 4),
	(43, '即時加密無線影像傳輸系統', '626d59058e033', 'http://ce.ntpu.edu.tw:8080/images/專題海報_即時加密無線影像傳輸系統_page-0001.jpg', NULL, 4),
	(44, '車聯網(IOV)之應用及展望', '626d5914f3609', 'http://ce.ntpu.edu.tw:8080/images/專題海報_車聯網(IOV)之應用及展望_page-0001.jpg', NULL, 4),
	(45, '物聯網照亮你我生活-阿愣造型 智慧檯燈', '626d5926e2f08', 'http://ce.ntpu.edu.tw:8080/images/專題海報_物聯網照亮你我生活-阿愣造型 智慧檯燈 The Introduction of Project Report_page-0001.jpg', NULL, 4),
	(46, '科技無限智慧垃圾桶', '626d5936d800c', 'http://ce.ntpu.edu.tw:8080/images/專題海報_科技無限智慧垃圾桶_page-0001.jpg', NULL, 4),
	(47, '個人穿戴式健康照護裝置結合物聯網應用', '626d596ebfd8c', 'http://ce.ntpu.edu.tw:8080/images/專題海報_個人穿戴式健康照護裝置結合物聯網應用_page-0001.jpg', NULL, 4),
	(48, '窄帶務聯網 (Narrowband Internet of Thing)', '626d5980ebcb2', 'http://ce.ntpu.edu.tw:8080/images/專題海報_窄帶務聯網 (Narrowband Internet of Thing)_page-0001.jpg', NULL, 4),
	(49, '從賽局理論的觀點探討即時地圖之更新', '626d599000ab5', 'http://ce.ntpu.edu.tw:8080/images/專題海報_從賽局理論的觀點探討即時地圖之更新_page-0001.jpg', NULL, 4),
	(50, '智慧型窗戶', '626d599de79be', 'http://ce.ntpu.edu.tw:8080/images/專題海報_智慧型窗戶_page-0001.jpg', NULL, 4),
	(51, '中英文混合模型建立粵語語音合成系統', '626d59ae8e0f4', 'http://ce.ntpu.edu.tw:8080/images/專題海報-中英文混合模型建立粵語語音合成系統_page-0001.jpg', NULL, 4),
	(52, 'Compare 7th order bandpass filer based on LC resonance and combine HPF and LPF', '626d5a0b2f368', 'http://ce.ntpu.edu.tw:8080/images/q專題海報_Compare 7th order bandpass filer based on LC resonance and combine HPF and LPF.jpg', NULL, 4),
	(53, '目標追蹤系統', '626d5a1836466', 'http://ce.ntpu.edu.tw:8080/images/q專題海報_目標追蹤系統.jpg', NULL, 4),
	(54, 'Arduino機械手臂—顏色辨識', '626d5a85ab0e0', 'http://ce.ntpu.edu.tw:8080/images/Arduino機械手臂—顏色辨識專題海報_v2.jpg', NULL, 5),
	(55, 'Ethercat Motion Platform', '626d5a94bec72', 'http://ce.ntpu.edu.tw:8080/images/Ethercat Motion Platform 專題海報.png', NULL, 5),
	(56, 'Routing and Error Control for Minimizing Age of Information', '626d5aa777b82', 'http://ce.ntpu.edu.tw:8080/images/Routing and Error Control for Minimizing Age of Information.jpg', NULL, 5),
	(57, 'Smart Drinks', '626d5ab4bbb9c', 'http://ce.ntpu.edu.tw:8080/images/Smart Drinks.jpg', NULL, 5),
	(58, 'The Introduction of the Format of Project Report', '626d5ac3dd0cc', 'http://ce.ntpu.edu.tw:8080/images/The Introduction of the Format of Project Report.jpg', NULL, 5),
	(59, '分散式計算網路路之設計與分析', '626d5b20113c4', 'http://ce.ntpu.edu.tw:8080/images/分散式計算網路路之設計與分析.jpg', NULL, 5),
	(60, '具創新架構之寬頻微波正交混成耦合器', '626d5b2cbf7d7', 'http://ce.ntpu.edu.tw:8080/images/具創新架構之寬頻微波正交混成耦合器.jpg', NULL, 5),
	(61, '多重跳接式無線網路即時加密影像傳輸', '626d5b3a7c6f2', 'http://ce.ntpu.edu.tw:8080/images/海報_多重跳接式無線網路即時加密影像傳輸.jpg', NULL, 5),
	(62, '酒駕上路終結者', '626d5b4814e7a', 'http://ce.ntpu.edu.tw:8080/images/酒駕上路終結者.jpg', NULL, 5),
	(63, '基於機器學習的建築物辨識系統', '626d5b53d64d6', 'http://ce.ntpu.edu.tw:8080/images/基於機器學習的建築物辨識系統.jpg', NULL, 5),
	(64, '智能澆水車', '626d5b6a23384', 'http://ce.ntpu.edu.tw:8080/images/智能澆水車.JPG', NULL, 5),
	(65, '會唱歌的光 Lights that sing', '626d5b79da6d3', 'http://ce.ntpu.edu.tw:8080/images/會唱歌的光 Lights that sing.jpg', NULL, 5),
	(66, '雷射筆不只是雷射筆 (A laser pointer more than what you see)', '626d5b877555e', 'http://ce.ntpu.edu.tw:8080/images/雷射筆不只是雷射筆 (A laser pointer more than what you see).jpg', NULL, 5),
	(67, '語音活性系統實作與應用 (Voice Activity Detection )', '626d5b93ac58a', 'http://ce.ntpu.edu.tw:8080/images/語音活性系統實作與應用 (Voice Activity Detection ).jpg', NULL, 5);
/*!40000 ALTER TABLE `ga_item` ENABLE KEYS */;

-- 傾印  資料表 ceweb.ga_topic 結構
CREATE TABLE IF NOT EXISTS `ga_topic` (
  `id` tinyint NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Here record topic for ga_item to group same topic events.';

-- 正在傾印表格  ceweb.ga_topic 的資料：~5 rows (近似值)
/*!40000 ALTER TABLE `ga_topic` DISABLE KEYS */;
REPLACE INTO `ga_topic` (`id`, `name`) VALUES
	(1, '103學年度 專題海報'),
	(2, '104學年度 專題海報'),
	(3, '105學年度 專題海報'),
	(4, '106學年度 專題海報'),
	(5, '107學年度 專題海報');
/*!40000 ALTER TABLE `ga_topic` ENABLE KEYS */;

-- 傾印  資料表 ceweb.mods 結構
CREATE TABLE IF NOT EXISTS `mods` (
  `id` tinyint NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- 正在傾印表格  ceweb.mods 的資料：~12 rows (近似值)
/*!40000 ALTER TABLE `mods` DISABLE KEYS */;
REPLACE INTO `mods` (`id`, `name`) VALUES
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

-- 傾印  資料表 ceweb.post 結構
CREATE TABLE IF NOT EXISTS `post` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `class` smallint DEFAULT NULL,
  `enable` tinyint(1) NOT NULL DEFAULT '1',
  `content` varchar(25) DEFAULT NULL,
  `published` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `href` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='If ''href'' is not NULL, it redirect to the url. ';

-- 正在傾印表格  ceweb.post 的資料：~65 rows (近似值)
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
REPLACE INTO `post` (`id`, `title`, `class`, `enable`, `content`, `published`, `href`) VALUES
	(1, '系所簡介', 1, 1, '622cc197cd614', '2022-03-12 15:51:51', NULL),
	(2, '教育目標', 2, 1, '622cc26eb98a3', '2022-03-12 15:55:26', NULL),
	(3, '師資介紹', 3, 1, '622cc37348571', '2022-03-12 15:59:47', NULL),
	(4, '招生資訊', 4, 1, '622cc3aee695a', '2022-03-12 16:00:46', NULL),
	(5, '實驗室介紹', 6, 1, '622cc3d6c3304', '2022-03-12 16:01:26', NULL),
	(6, 'IEET認證', 7, 1, '622cc3fa6aa82', '2022-03-12 16:02:02', NULL),
	(7, '國立臺北大學通訊工程學系約聘教學人員徵聘，自110學年度第1學期起聘(110年8月)', 11, 1, '62300374b4c5c', '2022-03-15 03:09:40', NULL),
	(8, '109學年度第1學期音律電子股份有限公司清寒暨優秀獎學金獲獎名單', 11, 1, '623003cd62c71', '2022-03-15 03:11:09', NULL),
	(9, '本系109學年度第2學期音律電子股份有限公司清寒暨優秀獎學金即日起開始申請', 11, 1, '623003fe9f777', '2022-03-15 03:11:58', NULL),
	(10, '因應疫情升溫，電402、409教室暫時封閉', 11, 1, '6230041708ada', '2022-03-15 03:12:23', NULL),
	(11, '109學年度第2學期通訊工程學系音律電子股份有限公司清寒暨優秀獎學金獲獎名單', 11, 1, '6230042d8a2c7', '2022-03-15 03:12:45', NULL),
	(12, '國立臺北大學通訊工程學系誠徵教師公告', 11, 1, '62300441c4c4a', '2022-03-15 03:13:05', NULL),
	(13, '通訊工程學系一貫修讀學碩士學位申請，截止日110年9月24日', 11, 1, '62300455d820f', '2022-03-15 03:13:25', NULL),
	(14, '本系110學年度第1學期音律電子股份有限公司清寒暨優秀獎學金即日起開始申請', 11, 1, '623004702d7b1', '2022-03-15 03:13:52', NULL),
	(15, '國立臺北大學通訊工程學系徵聘教師公告(助理教授職級(含)以上約聘教學人員1名，起聘日期：中華民國111年8月1日)', 11, 1, '623004b9451fd', '2022-03-15 03:15:05', NULL),
	(16, '110學年度第1學期音律電子股份有限公司清寒暨優秀獎學金獲獎同學名單', 11, 1, '623004d6a7a4b', '2022-03-15 03:15:34', NULL),
	(17, '110學年度-臺北大學通工程學系【碩士一般招生考試】考試科目異動公告', 12, 1, '6233dbf881349', '2022-03-18 01:10:16', NULL),
	(18, '國立臺北大學110學年度通訊工程學系碩士班甄試招生面試時間表', 12, 1, '6233dc3685c6a', '2022-03-18 01:11:18', NULL),
	(19, '110學年度大學甄選入學個人申請「審查資料準備指引」及「個人資料表」', 12, 1, '6233dc5a12215', '2022-03-18 01:11:54', NULL),
	(20, '111學年度-臺北大學通工程學系【碩士一般招生考試】考試科目異動公告', 12, 1, '6233dc710a03d', '2022-03-18 01:12:17', NULL),
	(21, '111學年度碩士班甄試招生考試考生資料表及推薦表', 12, 1, '6233dc85add42', '2022-03-18 01:12:37', NULL),
	(22, '國立臺北大學111學年度通訊工程學系碩士班甄試招生面試名單', 12, 1, '6233dc96c3196', '2022-03-18 01:12:54', NULL),
	(23, '111學年度碩士班一般招生考試考生資料表及推薦表', 12, 1, '6233dcbca271c', '2022-03-18 01:13:32', NULL),
	(24, '111大學個人申請入學各學系審查資料準備指引。', 12, 1, '6233dcd0a4875', '2022-03-18 01:13:52', NULL),
	(25, '專題研討(110/01/08)－傅宜康標準策略處長 (聯發科技股份有限公司先進通訊技術處)', 13, 1, '6233dcf47cc4a', '2022-03-18 01:14:28', NULL),
	(26, '專題研討(110/03/26)－潘仁義 副教授 (中正大學通訊工程學系)', 13, 1, '6233dd090fa06', '2022-03-18 01:14:49', NULL),
	(27, '國立臺北大學通訊工程學系109學年度第2學期專題競賽活動公告', 13, 1, '6233dd1d73fa1', '2022-03-18 01:15:09', NULL),
	(28, '國立臺北大學通訊工程學系109學年度第2學期專題競賽活動公告_(連結版).pdf', 13, 1, '6233dd331b0ce', '2022-03-18 01:15:31', NULL),
	(29, '國立臺北大學通訊工程學系109學年度第2學期專題競賽獲獎名次', 13, 1, '6233dd45ba890', '2022-03-18 01:15:49', NULL),
	(30, '專題研討(110/10/08)－鍾曉君分析師 (資策會產業情報研究所MIC)', 13, 1, '6233dd592ce1e', '2022-03-18 01:16:09', NULL),
	(31, '專題研討(110/11/05)－陳立勝助理教授 (逢甲大學通訊工程學系)', 13, 1, '6233dd6dc784a', '2022-03-18 01:16:29', NULL),
	(32, '專題研討(111/01/14)－謝泊頷研究員 (中華電信研究院無線所)', 13, 1, '6233dd84c9a49', '2022-03-18 01:16:52', NULL),
	(33, '專題研討(111/03/11)－翁健家助理教授(國立臺灣海洋大學電機工程學系)', 13, 1, '6233dd97da23a', '2022-03-18 01:17:11', NULL),
	(39, '無線通訊', 14, 0, '624fb1ad55958', '2022-04-08 03:53:17', NULL),
	(40, '消息理論', 14, 0, '624fb1ca6bdc2', '2022-04-08 03:53:46', NULL),
	(41, '新生專區', 15, 1, '624ff0e1c132e', '2022-04-08 08:22:57', '/files/2019.pdf'),
	(42, '競賽資訊', 16, 1, '624ff186db823', '2022-04-08 08:25:42', NULL),
	(43, 'Senior Project', 17, 1, '624ffbaacc836', '2022-04-08 09:08:58', NULL),
	(44, '學分學程/微學程', 18, 1, '625023342e7fe', '2022-04-08 11:57:40', NULL),
	(45, 'Scholarship', 19, 1, '625027ab2983e', '2022-04-08 12:16:43', NULL),
	(46, '通訊系學會', 21, 1, '625027de24259', '2022-04-08 12:17:34', 'https://www.facebook.com/NTPUCESA/?fref=photo'),
	(47, '相片集錦', 22, 1, '6250280d82531', '2022-04-08 12:18:21', 'https://www.flickr.com/photos/147841653@N02/albums'),
	(48, '大學程式能力檢定', 23, 1, '62502826b91ca', '2022-04-08 12:18:46', 'https://cpe.cse.nsysu.edu.tw/'),
	(49, '[ 恭賀 ] 本系學生入圍"聯發科技物聯網開發競賽" 決賽', 24, 1, '6250284c12e5a', '2022-04-08 12:19:24', NULL),
	(50, '104學年度榜單', 24, 1, '6250286ec0e7c', '2022-04-08 12:19:58', NULL),
	(51, '105學年度榜單', 24, 1, '6250288ef09eb', '2022-04-08 12:20:30', NULL),
	(52, 'CPE大學能力檢定', 24, 1, '625028a1880e5', '2022-04-08 12:20:49', NULL),
	(53, '托福TOEFL', 24, 1, '625028b29fa12', '2022-04-08 12:21:06', NULL),
	(54, '106學年度榜單', 24, 1, '625028bd5d760', '2022-04-08 12:21:17', NULL),
	(55, '問與答', 25, 1, '6250292a2176a', '2022-04-08 12:23:06', NULL),
	(56, '鄭春枝女士紀念獎學金獎學金申請', 11, 1, '625029e5e0afb', '2022-04-08 12:26:13', NULL),
	(57, '專題研討(111/03/25)－陳志傑博士(研究員/長庚醫療人工智能核心實驗室)', 13, 1, '62502b2909f12', '2022-04-08 12:31:37', NULL),
	(58, 'Contact', 27, 1, '62591b4154d9d', '2022-04-15 07:14:09', NULL),
	(59, 'IEET 認證', 36, 1, '62592ca458aef', '2022-04-15 08:28:20', NULL),
	(60, '專題研討(111/04/22)－連紹宇副教授(中正大學資訊 工程學系)', 13, 1, '62624569f001a', '2022-04-22 06:04:25', NULL),
	(62, '國立臺北大學通訊工程學系外語能力指標檢核辦法1090408', 56, 1, '6262671515bc0', '2022-04-22 08:28:05', NULL),
	(63, '國立臺北大學通訊工程學系程式能力證明文件切結書', 56, 1, '6262675588c54', '2022-04-22 08:29:09', NULL),
	(64, '一貫修讀學碩士學位辦法及申請表', 56, 1, '626267b32ae61', '2022-04-22 08:30:43', NULL),
	(65, '學士班課程內容與流程', 56, 1, '6262684dd1471', '2022-04-22 08:33:17', NULL),
	(66, '碩士班課程內容與流程', 56, 1, '62626b1612871', '2022-04-22 08:45:10', NULL),
	(67, '碩士班修業規則', 56, 1, '62626c6c624bd', '2022-04-22 08:50:52', NULL),
	(68, '學士班修業規則', 56, 1, '62626f55da1bf', '2022-04-22 09:03:17', NULL),
	(69, '本系110學年度第2學期音律電子股份有限公司清寒暨優秀獎學金即日起開始申請', 11, 1, '62660dde7bed5', '2022-04-25 02:56:30', NULL),
	(70, 'Education', 32, 1, '62680e3b18675', '2022-04-26 15:22:35', NULL),
	(71, 'Faculty', 33, 1, '6268111192bd5', '2022-04-26 15:34:41', NULL);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- 正在傾印表格  ceweb.class 的資料：~23 rows (近似值)
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
	(25, '問與答', NULL, '2');
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

-- 傾印  資料表 ceweb.mods 結構
CREATE TABLE IF NOT EXISTS `mods` (
  `id` tinyint NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- 正在傾印表格  ceweb.mods 的資料：~4 rows (近似值)
/*!40000 ALTER TABLE `mods` DISABLE KEYS */;
REPLACE INTO `mods` (`id`, `name`) VALUES
	(1, 'nav'),
	(2, 'lfcol'),
	(3, 'info'),
	(4, 'board');
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='If ''href'' is not NULL, it redirect to the url. ';

-- 正在傾印表格  ceweb.post 的資料：~33 rows (近似值)
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
	(33, '專題研討(111/03/11)－翁健家助理教授(國立臺灣海洋大學電機工程學系)', 13, 1, '6233dd97da23a', '2022-03-18 01:17:11', NULL);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

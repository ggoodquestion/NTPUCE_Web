-- --------------------------------------------------------
-- 主機:                           172.16.100.37
-- 伺服器版本:                        8.0.30-0ubuntu0.20.04.2 - (Ubuntu)
-- 伺服器作業系統:                      Linux
-- HeidiSQL 版本:                  11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- 傾印 ntpuce 的資料庫結構
CREATE DATABASE IF NOT EXISTS `ntpuce` /*!40100 DEFAULT CHARACTER SET armscii8 COLLATE armscii8_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ntpuce`;

-- 傾印  資料表 ntpuce.class 結構
CREATE TABLE IF NOT EXISTS `class` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `parent` smallint DEFAULT NULL,
  `mods` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- 正在傾印表格  ntpuce.class 的資料：~51 rows (近似值)
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT INTO `class` (`id`, `title`, `parent`, `mods`) VALUES
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
	(56, '課程規劃', NULL, '1');
/*!40000 ALTER TABLE `class` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

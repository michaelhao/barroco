-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-07-27 12:12:03
-- 伺服器版本: 10.1.13-MariaDB
-- PHP 版本： 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `yo_u_1`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admintable`
--

CREATE TABLE `admintable` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT '管理者名稱',
  `acc` varchar(255) NOT NULL COMMENT '帳號',
  `pwd` varchar(255) NOT NULL COMMENT '密碼',
  `pic` varchar(255) NOT NULL COMMENT '大頭照',
  `email` varchar(255) NOT NULL COMMENT 'email',
  `title` varchar(255) NOT NULL COMMENT '職稱',
  `time` date NOT NULL COMMENT '建立時間',
  `right` int(11) NOT NULL DEFAULT '1' COMMENT '權限狀態:1.啟用 0.停權',
  `Recover` int(11) NOT NULL DEFAULT '0' COMMENT '資料狀態:0.正常 1.刪除'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `admintable`
--

INSERT INTO `admintable` (`id`, `name`, `acc`, `pwd`, `pic`, `email`, `title`, `time`, `right`, `Recover`) VALUES
(1, 'admin', 'admin', '25f9e794323b453885f5181f1b624d0b', '', 'sheilawong@fff.com', '1', '2014-07-09', 1, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `admintype`
--

CREATE TABLE `admintype` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `admintype`
--

INSERT INTO `admintype` (`id`, `name`) VALUES
(1, '最高管理者'),
(2, '執行者');

-- --------------------------------------------------------

--
-- 資料表結構 `backadmin`
--

CREATE TABLE `backadmin` (
  `id` int(11) NOT NULL,
  `webname` varchar(255) NOT NULL COMMENT '網站名稱',
  `webtitle` varchar(255) NOT NULL COMMENT '網站標題',
  `keyword` varchar(255) DEFAULT NULL COMMENT '關鍵字',
  `description` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL COMMENT 'email',
  `copyright` varchar(255) NOT NULL COMMENT '版權',
  `tel` varchar(255) DEFAULT NULL COMMENT '電話',
  `address` varchar(255) NOT NULL COMMENT '地址',
  `shipment` varchar(255) DEFAULT NULL COMMENT '運費',
  `free_shipment` varchar(255) DEFAULT NULL COMMENT '滿額免運'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `backadmin`
--

INSERT INTO `backadmin` (`id`, `webname`, `webtitle`, `keyword`, `description`, `email`, `copyright`, `tel`, `address`, `shipment`, `free_shipment`) VALUES
(1, '游於藝', '游於藝', '游於藝關鍵字', '游於藝描述', 'Im141313@gmail.com', 'Copyright © 2013 廣達文教基金會', 'TEL: 02-28821612', '台北市士林區後港街116號9樓　9F,116Hou-Kang St,Shih-Lin Dist,Taipei,R.O.C', '100', '1000');

-- --------------------------------------------------------

--
-- 資料表結構 `backmainmenu`
--

CREATE TABLE `backmainmenu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT '選單名稱',
  `link` varchar(255) NOT NULL COMMENT '功能列表連結',
  `listpage` varchar(255) NOT NULL COMMENT '列表頁面路徑',
  `insertpage` varchar(255) NOT NULL COMMENT '新增頁面路徑',
  `modifypage` varchar(255) NOT NULL COMMENT '修改頁面路徑',
  `recoverpage` varchar(255) NOT NULL COMMENT '回收桶頁面路徑',
  `typepage` varchar(255) NOT NULL COMMENT '類別頁面路徑',
  `showhide` int(11) DEFAULT '1',
  `admintype1_permission` int(11) NOT NULL DEFAULT '1' COMMENT '管理者檢視權限',
  `admintype2_permission` int(11) NOT NULL DEFAULT '1' COMMENT '管理者檢視權限',
  `admintype3_permission` int(11) NOT NULL DEFAULT '1' COMMENT '管理者檢視權限',
  `sort` int(11) DEFAULT NULL COMMENT '選單排序'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `backmainmenu`
--

INSERT INTO `backmainmenu` (`id`, `name`, `link`, `listpage`, `insertpage`, `modifypage`, `recoverpage`, `typepage`, `showhide`, `admintype1_permission`, `admintype2_permission`, `admintype3_permission`, `sort`) VALUES
(1, '首頁', 'page', 'list.php', 'insert.php', 'modify.php', '', '', 1, 1, 1, 1, 1),
(2, '管理員管理', 'page', 'adminlist.php', 'admininsert.php', 'adminmodify.php', 'adminrecover.php', '', 0, 1, 0, 0, 2),
(3, '類別管理', 'page', 'typelist.php', 'typeinsert.php', 'typemodify.php', 'typerecover.php', '', 0, 1, 0, 0, 3),
(21, '題目', 'page', 'qusetion_list.php', 'qusetion_insert.php', 'qusetion_modify.php', 'articlerecover.php', '', 1, 1, 1, 1, 16),
(22, '不雅字詞', 'page', 'word_list.php', 'word_insert.php', 'word_modify.php', '', '', 1, 1, 1, 1, 18),
(23, '題目選項', 'page', 'option_list.php', 'option_insert.php', 'option_modify.php', '', '', 0, 1, 1, 1, 17),
(25, '快問快答', 'page', 'score_qa_list.php', 'score_qa_insert.php', 'score_qa_modify.php', '', '', 1, 1, 1, 1, 20),
(26, '按圖索驥', 'page', 'score_pic_list.php', 'score_pic_insert.php', 'score_pic_modify.php', '', '', 1, 1, 1, 1, 21);

-- --------------------------------------------------------

--
-- 資料表結構 `bad_language`
--

CREATE TABLE `bad_language` (
  `id` int(11) NOT NULL COMMENT '不雅字詞ID',
  `created_at` datetime NOT NULL COMMENT '新增時間',
  `updated_at` datetime NOT NULL COMMENT '上傳時間',
  `name` varchar(255) NOT NULL COMMENT '字詞',
  `display` int(11) NOT NULL DEFAULT '1' COMMENT '顯示:1.顯示 2.隱藏',
  `recover` int(11) NOT NULL DEFAULT '0' COMMENT '資料狀態:0.正常 1.刪除',
  `sort` int(11) NOT NULL COMMENT '排序'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `bad_language`
--

INSERT INTO `bad_language` (`id`, `created_at`, `updated_at`, `name`, `display`, `recover`, `sort`) VALUES
(7, '2016-07-20 19:12:04', '2016-07-26 11:35:22', '幹222', 1, 0, 0),
(8, '2016-07-20 19:36:32', '2016-07-25 11:30:38', '趕羚羊sss', 1, 0, 0),
(9, '2016-07-21 11:03:31', '2016-07-21 11:10:09', 'ddddd能兒', 1, 0, 0),
(10, '2016-07-21 11:08:01', '0000-00-00 00:00:00', '草之百123', 1, 0, 0),
(11, '2016-07-22 14:15:10', '2016-07-22 14:16:34', '草之百趕羚', 1, 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `config`
--

CREATE TABLE `config` (
  `setting` varchar(255) NOT NULL,
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `config`
--

INSERT INTO `config` (`setting`, `value`) VALUES
('attack_mitigation_time', '+30 minutes'),
('attempts_before_ban', '30'),
('attempts_before_verify', '5'),
('bcrypt_cost', '10'),
('cookie_domain', NULL),
('cookie_forget', '+30 minutes'),
('cookie_http', '0'),
('cookie_name', 'authID'),
('cookie_path', '/'),
('cookie_remember', '+1 month'),
('cookie_secure', '0'),
('emailmessage_suppress_activation', '0'),
('emailmessage_suppress_reset', '0'),
('ite_password_reset_page', 'reset'),
('password_min_score', '3'),
('request_key_expiration', '+10 minutes'),
('site_activation_page', 'activate'),
('site_email', 'catxii@gmail.com'),
('site_key', 'fghuior.)/!/jdUkd8s2!7HVHG7777ghg'),
('site_name', '元佬麵團'),
('site_timezone', 'Asia/Taipei'),
('site_url', 'https://github.com/PHPAuth/PHPAuth'),
('smtp', '1'),
('smtp_auth', '1'),
('smtp_host', 'smtp.gmail.com'),
('smtp_password', '5j4zj6su3'),
('smtp_port', '465'),
('smtp_security', 'ssl'),
('smtp_username', 'falcoinno.email@gmail.com'),
('table_attempts', 'attempts'),
('table_requests', 'requests'),
('table_sessions', 'sessions'),
('table_users', 'users'),
('verify_email_max_length', '100'),
('verify_email_min_length', '5'),
('verify_email_use_banlist', '1'),
('verify_password_min_length', '6');

-- --------------------------------------------------------

--
-- 資料表結構 `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `panel` int(11) NOT NULL,
  `source_id` int(11) DEFAULT NULL COMMENT '對應ID',
  `file_timestamp` int(11) NOT NULL COMMENT '時間戳',
  `thumbnailUrl` longtext COMMENT '縮圖路徑',
  `url` longtext NOT NULL COMMENT '大圖路徑',
  `deleteUrl` longtext NOT NULL COMMENT '刪除圖片路徑',
  `file_type` varchar(255) NOT NULL COMMENT '檔案類型',
  `file_name` longtext NOT NULL COMMENT '檔案名稱',
  `file_size` int(11) NOT NULL COMMENT '檔案大小',
  `file_number` int(11) DEFAULT NULL COMMENT '欄位編號',
  `recover` int(11) DEFAULT '0',
  `created_at` datetime NOT NULL COMMENT '新增時間',
  `updated_at` datetime DEFAULT NULL COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `image`
--

INSERT INTO `image` (`id`, `panel`, `source_id`, `file_timestamp`, `thumbnailUrl`, `url`, `deleteUrl`, `file_type`, `file_name`, `file_size`, `file_number`, `recover`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 1467187498, 'http://localhost/young/assert/files/files/thumbnail/wow_mus.jpg', 'http://localhost/young/assert/files/files/wow_mus.jpg', 'http://localhost/young/assert/files/index.php?file=wow_mus.jpg', 'image/jpeg', 'wow_mus.jpg', 29555, 0, 0, '2016-06-29 16:05:09', NULL),
(2, 4, 3, 1467187590, 'http://localhost/young/assert/files/files/thumbnail/cleveland.jpg', 'http://localhost/young/assert/files/files/cleveland.jpg', 'http://localhost/young/assert/files/index.php?file=cleveland.jpg', 'image/jpeg', 'cleveland.jpg', 81892, 0, 0, '2016-06-29 16:06:51', NULL),
(3, 4, 4, 1467264487, 'http://localhost/young/assert/files/files/thumbnail/bochu.jpg', 'http://localhost/young/assert/files/files/bochu.jpg', 'http://localhost/young/assert/files/index.php?file=bochu.jpg', 'image/jpeg', 'bochu.jpg', 121682, 0, 0, '2016-06-30 13:28:19', NULL),
(4, 9, 5, 1467773732, 'http://localhost/ul/assert/files/files/thumbnail/wowkd%20%282%29.jpg', 'http://localhost/ul/assert/files/files/wowkd%20%282%29.jpg', 'http://localhost/ul/assert/files/index.php?file=wowkd%20%282%29.jpg', 'image/jpeg', 'wowkd (2).jpg', 38441, 0, 0, '2016-07-06 11:04:20', NULL),
(5, 8, 6, 1467777051, 'http://localhost/ul/assert/files/files/thumbnail/wowkd%20%283%29.jpg', 'http://localhost/ul/assert/files/files/wowkd%20%283%29.jpg', 'http://localhost/ul/assert/files/index.php?file=wowkd%20%283%29.jpg', 'image/jpeg', 'wowkd (3).jpg', 38441, 0, 0, '2016-07-06 11:50:56', NULL),
(6, 11, 5, 1467777304, 'http://localhost/ul/assert/files/files/thumbnail/kd%20%287%29.jpg', 'http://localhost/ul/assert/files/files/kd%20%287%29.jpg', 'http://localhost/ul/assert/files/index.php?file=kd%20%287%29.jpg', 'image/jpeg', 'kd (7).jpg', 49109, 0, 0, '2016-07-06 11:55:28', NULL),
(7, 9, 8, 1467778980, 'http://localhost/ul/assert/files/files/thumbnail/kd%20%288%29.jpg', 'http://localhost/ul/assert/files/files/kd%20%288%29.jpg', 'http://localhost/ul/assert/files/index.php?file=kd%20%288%29.jpg', 'image/jpeg', 'kd (8).jpg', 49109, 0, 0, '2016-07-06 12:23:12', NULL),
(8, 11, 6, 1467783176, 'http://localhost/ul/assert/files/files/thumbnail/wowmus%20%281%29.jpg', 'http://localhost/ul/assert/files/files/wowmus%20%281%29.jpg', 'http://localhost/ul/assert/files/index.php?file=wowmus%20%281%29.jpg', 'image/jpeg', 'wowmus (1).jpg', 29555, 0, 0, '2016-07-06 13:33:10', NULL),
(9, 11, 7, 1467784124, 'http://localhost/ul/assert/files/files/thumbnail/bochu%20%281%29.jpg', 'http://localhost/ul/assert/files/files/bochu%20%281%29.jpg', 'http://localhost/ul/assert/files/index.php?file=bochu%20%281%29.jpg', 'image/jpeg', 'bochu (1).jpg', 121682, 0, 0, '2016-07-06 13:49:00', NULL),
(10, 4, 9, 1467785682, 'http://localhost/ul/assert/files/files/thumbnail/kd%20%289%29.jpg', 'http://localhost/ul/assert/files/files/kd%20%289%29.jpg', 'http://localhost/ul/assert/files/index.php?file=kd%20%289%29.jpg', 'image/jpeg', 'kd (9).jpg', 49109, 0, 0, '2016-07-06 14:15:01', NULL),
(11, 10, 10, 1467786202, 'http://localhost/ul/assert/files/files/thumbnail/wowkd%20%284%29.jpg', 'http://localhost/ul/assert/files/files/wowkd%20%284%29.jpg', 'http://localhost/ul/assert/files/index.php?file=wowkd%20%284%29.jpg', 'image/jpeg', 'wowkd (4).jpg', 38441, 0, 0, '2016-07-06 14:23:36', NULL),
(12, 10, 11, 1467786526, 'http://localhost/ul/assert/files/files/thumbnail/david_west.jpg', 'http://localhost/ul/assert/files/files/david_west.jpg', 'http://localhost/ul/assert/files/index.php?file=david_west.jpg', 'image/jpeg', 'david_west.jpg', 189816, 0, 0, '2016-07-06 14:29:11', NULL),
(13, 12, NULL, 1467786955, 'http://localhost/ul/assert/files/files/thumbnail/kd%20%2810%29.jpg', 'http://localhost/ul/assert/files/files/kd%20%2810%29.jpg', 'http://localhost/ul/assert/files/index.php?file=kd%20%2810%29.jpg', 'image/jpeg', 'kd (10).jpg', 49109, 0, 0, '2016-07-06 14:36:08', NULL),
(14, 12, NULL, 1467787228, 'http://localhost/ul/assert/files/files/thumbnail/kd%20%2811%29.jpg', 'http://localhost/ul/assert/files/files/kd%20%2811%29.jpg', 'http://localhost/ul/assert/files/index.php?file=kd%20%2811%29.jpg', 'image/jpeg', 'kd (11).jpg', 49109, 0, 0, '2016-07-06 14:40:40', NULL),
(15, 12, 3, 1467788771, 'http://localhost/ul/assert/files/files/thumbnail/kd%20%2812%29.jpg', 'http://localhost/ul/assert/files/files/kd%20%2812%29.jpg', 'http://localhost/ul/assert/files/index.php?file=kd%20%2812%29.jpg', 'image/jpeg', 'kd (12).jpg', 49109, 0, 0, '2016-07-06 15:06:21', NULL),
(16, 12, 4, 1467788950, 'http://localhost/ul/assert/files/files/thumbnail/wowmus%20%282%29.jpg', 'http://localhost/ul/assert/files/files/wowmus%20%282%29.jpg', 'http://localhost/ul/assert/files/index.php?file=wowmus%20%282%29.jpg', 'image/jpeg', 'wowmus (2).jpg', 29555, 0, 0, '2016-07-06 15:09:34', NULL),
(17, 8, 12, 1467791506, 'http://localhost/ul/assert/files/files/thumbnail/cavs_final.jpg', 'http://localhost/ul/assert/files/files/cavs_final.jpg', 'http://localhost/ul/assert/files/index.php?file=cavs_final.jpg', 'image/jpeg', 'cavs_final.jpg', 115740, 0, 0, '2016-07-06 15:51:51', NULL),
(18, 4, 13, 1468922918, 'http://localhost/yo_u_1/assert/files/files/thumbnail/baloco.jpg', 'http://localhost/yo_u_1/assert/files/files/baloco.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=baloco.jpg', 'image/jpeg', 'baloco.jpg', 757540, 0, 0, '2016-07-19 18:09:26', NULL),
(19, 21, 14, 1468925437, 'http://localhost/yo_u_1/assert/files/files/thumbnail/12.jpg', 'http://localhost/yo_u_1/assert/files/files/12.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=12.jpg', 'image/jpeg', '12.jpg', 757540, 0, 0, '2016-07-19 18:50:44', NULL),
(20, 21, NULL, 1468984341, 'http://localhost/yo_u_1/assert/files/files/thumbnail/baloco%20%281%29.jpg', 'http://localhost/yo_u_1/assert/files/files/baloco%20%281%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=baloco%20%281%29.jpg', 'image/jpeg', 'baloco (1).jpg', 757540, 0, 0, '2016-07-20 11:12:48', NULL),
(21, 21, NULL, 1468987131, 'http://localhost/yo_u_1/assert/files/files/thumbnail/baloco%20%283%29.jpg', 'http://localhost/yo_u_1/assert/files/files/baloco%20%283%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=baloco%20%283%29.jpg', 'image/jpeg', 'baloco (3).jpg', 757540, 0, 0, '2016-07-20 11:59:01', NULL),
(22, 21, 15, 1468987179, 'http://localhost/yo_u_1/assert/files/files/thumbnail/baloco%20%284%29.jpg', 'http://localhost/yo_u_1/assert/files/files/baloco%20%284%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=baloco%20%284%29.jpg', 'image/jpeg', 'baloco (4).jpg', 757540, 0, 0, '2016-07-20 11:59:48', NULL),
(23, 21, 2, 1468992007, 'http://localhost/yo_u_1/assert/files/files/thumbnail/baloco%20%285%29.jpg', 'http://localhost/yo_u_1/assert/files/files/baloco%20%285%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=baloco%20%285%29.jpg', 'image/jpeg', 'baloco (5).jpg', 757540, 0, 0, '2016-07-20 13:20:17', NULL),
(24, 21, 4, 1468992184, 'http://localhost/yo_u_1/assert/files/files/thumbnail/baloco%20%286%29.jpg', 'http://localhost/yo_u_1/assert/files/files/baloco%20%286%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=baloco%20%286%29.jpg', 'image/jpeg', 'baloco (6).jpg', 757540, 0, 0, '2016-07-20 13:23:14', NULL),
(25, 21, 5, 1468992288, 'http://localhost/yo_u_1/assert/files/files/thumbnail/baloco%20%287%29.jpg', 'http://localhost/yo_u_1/assert/files/files/baloco%20%287%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=baloco%20%287%29.jpg', 'image/jpeg', 'baloco (7).jpg', 757540, 0, 0, '2016-07-20 13:24:57', NULL),
(26, 21, 6, 1468992385, 'http://localhost/yo_u_1/assert/files/files/thumbnail/baloco%20%288%29.jpg', 'http://localhost/yo_u_1/assert/files/files/baloco%20%288%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=baloco%20%288%29.jpg', 'image/jpeg', 'baloco (8).jpg', 757540, 0, 0, '2016-07-20 13:26:34', NULL),
(27, 21, 8, 1468992719, 'http://localhost/yo_u_1/assert/files/files/thumbnail/baloco%20%289%29.jpg', 'http://localhost/yo_u_1/assert/files/files/baloco%20%289%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=baloco%20%289%29.jpg', 'image/jpeg', 'baloco (9).jpg', 757540, 0, 0, '2016-07-20 13:32:10', NULL),
(28, 21, NULL, 1468993278, 'http://localhost/yo_u_1/assert/files/files/thumbnail/bochu%20%281%29.jpg', 'http://localhost/yo_u_1/assert/files/files/bochu%20%281%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=bochu%20%281%29.jpg', 'image/jpeg', 'bochu (1).jpg', 121682, 0, 0, '2016-07-20 13:41:42', NULL),
(29, 21, 11, 1468993390, 'http://localhost/yo_u_1/assert/files/files/thumbnail/bochu%20%282%29.jpg', 'http://localhost/yo_u_1/assert/files/files/bochu%20%282%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=bochu%20%282%29.jpg', 'image/jpeg', 'bochu (2).jpg', 121682, 0, 0, '2016-07-20 13:43:18', NULL),
(30, 21, 27, 1469004175, 'http://localhost/yo_u_1/assert/files/files/thumbnail/bochu%20%284%29.jpg', 'http://localhost/yo_u_1/assert/files/files/bochu%20%284%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=bochu%20%284%29.jpg', 'image/jpeg', 'bochu (4).jpg', 121682, 0, 0, '2016-07-20 16:43:04', NULL),
(31, 21, 28, 1469004326, 'http://localhost/yo_u_1/assert/files/files/thumbnail/baloco%20%2812%29.jpg', 'http://localhost/yo_u_1/assert/files/files/baloco%20%2812%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=baloco%20%2812%29.jpg', 'image/jpeg', 'baloco (12).jpg', 757540, 0, 0, '2016-07-20 16:45:36', NULL),
(32, 21, 29, 1469004445, 'http://localhost/yo_u_1/assert/files/files/thumbnail/12%20%281%29.jpg', 'http://localhost/yo_u_1/assert/files/files/12%20%281%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=12%20%281%29.jpg', 'image/jpeg', '12 (1).jpg', 757540, 0, 0, '2016-07-20 16:47:38', NULL),
(33, 21, 30, 1469004748, 'http://localhost/yo_u_1/assert/files/files/thumbnail/bochu%20%286%29.jpg', 'http://localhost/yo_u_1/assert/files/files/bochu%20%286%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=bochu%20%286%29.jpg', 'image/jpeg', 'bochu (6).jpg', 121682, 0, 0, '2016-07-20 16:52:31', NULL),
(34, 21, 31, 1469005303, 'http://localhost/yo_u_1/assert/files/files/thumbnail/bochu%20%287%29.jpg', 'http://localhost/yo_u_1/assert/files/files/bochu%20%287%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=bochu%20%287%29.jpg', 'image/jpeg', 'bochu (7).jpg', 121682, 0, 0, '2016-07-20 17:01:48', NULL),
(35, 21, NULL, 1469006815, 'http://localhost/yo_u_1/assert/files/files/thumbnail/bochu%20%288%29.jpg', 'http://localhost/yo_u_1/assert/files/files/bochu%20%288%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=bochu%20%288%29.jpg', 'image/jpeg', 'bochu (8).jpg', 121682, 0, 0, '2016-07-20 17:27:01', NULL),
(36, 21, NULL, 1469006941, 'http://localhost/yo_u_1/assert/files/files/thumbnail/bochu%20%289%29.jpg', 'http://localhost/yo_u_1/assert/files/files/bochu%20%289%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=bochu%20%289%29.jpg', 'image/jpeg', 'bochu (9).jpg', 121682, 0, 0, '2016-07-20 17:29:14', NULL),
(37, 21, 33, 1469007758, 'http://localhost/yo_u_1/assert/files/files/thumbnail/bochu%20%2810%29.jpg', 'http://localhost/yo_u_1/assert/files/files/bochu%20%2810%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=bochu%20%2810%29.jpg', 'image/jpeg', 'bochu (10).jpg', 121682, 0, 0, '2016-07-20 17:42:44', NULL),
(38, 21, 34, 1469009093, 'http://localhost/yo_u_1/assert/files/files/thumbnail/bochu%20%2811%29.jpg', 'http://localhost/yo_u_1/assert/files/files/bochu%20%2811%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=bochu%20%2811%29.jpg', 'image/jpeg', 'bochu (11).jpg', 121682, 0, 0, '2016-07-20 18:04:57', NULL),
(39, 21, 35, 1469009157, 'http://localhost/yo_u_1/assert/files/files/thumbnail/bochu%20%2812%29.jpg', 'http://localhost/yo_u_1/assert/files/files/bochu%20%2812%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=bochu%20%2812%29.jpg', 'image/jpeg', 'bochu (12).jpg', 121682, 0, 0, '2016-07-20 18:06:02', NULL),
(40, 21, NULL, 1469015085, 'http://localhost/yo_u_1/assert/files/files/thumbnail/12%20%282%29.jpg', 'http://localhost/yo_u_1/assert/files/files/12%20%282%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=12%20%282%29.jpg', 'image/jpeg', '12 (2).jpg', 757540, 0, 0, '2016-07-20 19:44:51', NULL),
(41, 21, 36, 1469015180, 'http://localhost/yo_u_1/assert/files/files/thumbnail/12%20%283%29.jpg', 'http://localhost/yo_u_1/assert/files/files/12%20%283%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=12%20%283%29.jpg', 'image/jpeg', '12 (3).jpg', 757540, 0, 0, '2016-07-20 19:46:28', NULL),
(42, 21, 37, 1469015369, 'http://localhost/yo_u_1/assert/files/files/thumbnail/bochu%20%2813%29.jpg', 'http://localhost/yo_u_1/assert/files/files/bochu%20%2813%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=bochu%20%2813%29.jpg', 'image/jpeg', 'bochu (13).jpg', 121682, 0, 0, '2016-07-20 19:49:35', NULL),
(43, 21, 39, 1469080699, 'http://localhost/yo_u_1/assert/files/files/thumbnail/12%20%284%29.jpg', 'http://localhost/yo_u_1/assert/files/files/12%20%284%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=12%20%284%29.jpg', 'image/jpeg', '12 (4).jpg', 757540, 0, 0, '2016-07-21 13:58:29', NULL),
(44, 21, 40, 1469093091, 'http://localhost/yo_u_1/assert/files/files/thumbnail/bochu%20%2814%29.jpg', 'http://localhost/yo_u_1/assert/files/files/bochu%20%2814%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=bochu%20%2814%29.jpg', 'image/jpeg', 'bochu (14).jpg', 121682, 0, 0, '2016-07-21 17:24:57', NULL),
(45, 21, 41, 1469168517, 'http://localhost/yo_u_1/assert/files/files/thumbnail/bochu%20%2815%29.jpg', 'http://localhost/yo_u_1/assert/files/files/bochu%20%2815%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=bochu%20%2815%29.jpg', 'image/jpeg', 'bochu (15).jpg', 121682, 0, 0, '2016-07-22 14:22:09', NULL),
(46, 21, 42, 1469168749, 'http://localhost/yo_u_1/assert/files/files/thumbnail/bochu%20%2816%29.jpg', 'http://localhost/yo_u_1/assert/files/files/bochu%20%2816%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=bochu%20%2816%29.jpg', 'image/jpeg', 'bochu (16).jpg', 121682, 0, 0, '2016-07-22 14:25:53', NULL),
(47, 21, 43, 1469168999, 'http://localhost/yo_u_1/assert/files/files/thumbnail/bochu%20%2817%29.jpg', 'http://localhost/yo_u_1/assert/files/files/bochu%20%2817%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=bochu%20%2817%29.jpg', 'image/jpeg', 'bochu (17).jpg', 121682, 0, 0, '2016-07-22 14:30:03', NULL),
(48, 21, 44, 1469169199, 'http://localhost/yo_u_1/assert/files/files/thumbnail/bochu%20%2818%29.jpg', 'http://localhost/yo_u_1/assert/files/files/bochu%20%2818%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=bochu%20%2818%29.jpg', 'image/jpeg', 'bochu (18).jpg', 121682, 0, 0, '2016-07-22 14:33:23', NULL),
(49, 21, 45, 1469169329, 'http://localhost/yo_u_1/assert/files/files/thumbnail/bochu%20%2819%29.jpg', 'http://localhost/yo_u_1/assert/files/files/bochu%20%2819%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=bochu%20%2819%29.jpg', 'image/jpeg', 'bochu (19).jpg', 121682, 0, 0, '2016-07-22 14:35:32', NULL),
(50, 21, 46, 1469169413, 'http://localhost/yo_u_1/assert/files/files/thumbnail/bochu%20%2820%29.jpg', 'http://localhost/yo_u_1/assert/files/files/bochu%20%2820%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=bochu%20%2820%29.jpg', 'image/jpeg', 'bochu (20).jpg', 121682, 0, 0, '2016-07-22 14:36:56', NULL),
(51, 21, NULL, 1469169516, 'http://localhost/yo_u_1/assert/files/files/thumbnail/bochu%20%2821%29.jpg', 'http://localhost/yo_u_1/assert/files/files/bochu%20%2821%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=bochu%20%2821%29.jpg', 'image/jpeg', 'bochu (21).jpg', 121682, 0, 0, '2016-07-22 14:38:39', NULL),
(52, 21, 47, 1469169693, 'http://localhost/yo_u_1/assert/files/files/thumbnail/bochu%20%2822%29.jpg', 'http://localhost/yo_u_1/assert/files/files/bochu%20%2822%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=bochu%20%2822%29.jpg', 'image/jpeg', 'bochu (22).jpg', 121682, 0, 0, '2016-07-22 14:41:38', NULL),
(53, 21, 48, 1469169754, 'http://localhost/yo_u_1/assert/files/files/thumbnail/bochu%20%2823%29.jpg', 'http://localhost/yo_u_1/assert/files/files/bochu%20%2823%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=bochu%20%2823%29.jpg', 'image/jpeg', 'bochu (23).jpg', 121682, 0, 0, '2016-07-22 14:42:37', NULL),
(54, 21, 49, 1469169874, 'http://localhost/yo_u_1/assert/files/files/thumbnail/bochu%20%2824%29.jpg', 'http://localhost/yo_u_1/assert/files/files/bochu%20%2824%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=bochu%20%2824%29.jpg', 'image/jpeg', 'bochu (24).jpg', 121682, 0, 0, '2016-07-22 14:44:39', NULL),
(55, 21, 55, 1469172636, 'http://localhost/yo_u_1/assert/files/files/thumbnail/wowkd.jpg', 'http://localhost/yo_u_1/assert/files/files/wowkd.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=wowkd.jpg', 'image/jpeg', 'wowkd.jpg', 38441, 0, 0, '2016-07-22 15:30:39', NULL),
(56, 21, 56, 1469174530, 'http://localhost/yo_u_1/assert/files/files/thumbnail/cleveland%20%281%29.jpg', 'http://localhost/yo_u_1/assert/files/files/cleveland%20%281%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=cleveland%20%281%29.jpg', 'image/jpeg', 'cleveland (1).jpg', 81892, 0, 0, '2016-07-22 16:02:14', NULL),
(57, 21, 0, 1469178581, 'http://localhost/yo_u_1/assert/files/files/thumbnail/wowkd%20%281%29.jpg', 'http://localhost/yo_u_1/assert/files/files/wowkd%20%281%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=wowkd%20%281%29.jpg', 'image/jpeg', 'wowkd (1).jpg', 38441, 0, 0, '2016-07-22 17:09:46', NULL),
(58, 21, 57, 1469417116, 'http://localhost/yo_u_1/assert/files/files/thumbnail/wowkd%20%283%29.jpg', 'http://localhost/yo_u_1/assert/files/files/wowkd%20%283%29.jpg', 'http://localhost/yo_u_1/assert/files/index.php?file=wowkd%20%283%29.jpg', 'image/jpeg', 'wowkd (3).jpg', 38441, 0, 0, '2016-07-25 11:25:22', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL COMMENT '題目ID',
  `created_at` datetime NOT NULL COMMENT '新增時間',
  `updated_at` datetime NOT NULL COMMENT '上傳時間',
  `description` varchar(255) NOT NULL COMMENT '題目描述',
  `pic` text NOT NULL COMMENT '題目圖片',
  `display` int(11) NOT NULL DEFAULT '1' COMMENT '顯示:1.顯示 2.隱藏',
  `recover` int(11) NOT NULL DEFAULT '0' COMMENT '資料狀態:0.正常 1.刪除',
  `sort` int(11) NOT NULL COMMENT '排序'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `question`
--

INSERT INTO `question` (`id`, `created_at`, `updated_at`, `description`, `pic`, `display`, `recover`, `sort`) VALUES
(39, '2016-07-21 13:58:48', '0000-00-00 00:00:00', '這是光影巴洛克嗎', '', 1, 0, 0),
(40, '2016-07-21 17:28:44', '0000-00-00 00:00:00', '他是寶村嗎?', '', 1, 0, 0),
(55, '2016-07-22 17:00:57', '0000-00-00 00:00:00', 'KD 是否加入勇士隊?', '', 1, 0, 0),
(56, '2016-07-22 16:02:38', '0000-00-00 00:00:00', '2016 騎士隊是否獲得總冠軍?', '', 1, 0, 0),
(57, '2016-07-27 13:57:42', '0000-00-00 00:00:00', '測試', '', 1, 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `question_option`
--

CREATE TABLE `question_option` (
  `id` int(11) NOT NULL COMMENT '選項ID',
  `question_id` int(11) NOT NULL COMMENT '問題ID',
  `created_at` datetime NOT NULL COMMENT '新增時間',
  `updated_at` datetime NOT NULL COMMENT '上傳時間',
  `description` varchar(255) NOT NULL COMMENT '選項描述',
  `correct` int(11) NOT NULL COMMENT 'true.正確 false.不正確',
  `display` int(11) NOT NULL DEFAULT '1' COMMENT '顯示:1.顯示 2.隱藏',
  `recover` int(11) NOT NULL DEFAULT '0' COMMENT '資料狀態:0.正常 1.刪除',
  `sort` int(11) NOT NULL COMMENT '排序'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `question_option`
--

INSERT INTO `question_option` (`id`, `question_id`, `created_at`, `updated_at`, `description`, `correct`, `display`, `recover`, `sort`) VALUES
(1, 39, '2016-07-21 00:00:00', '2016-07-22 13:58:54', 'YES', 0, 1, 0, 0),
(47, 40, '2016-07-22 13:58:24', '0000-00-00 00:00:00', 'YEE拉', 0, 1, 0, 0),
(48, 39, '2016-07-22 13:59:04', '0000-00-00 00:00:00', 'NO', 0, 1, 0, 0),
(53, 56, '2016-07-22 16:03:06', '2016-07-22 16:05:57', '不是', 0, 1, 0, 0),
(95, 55, '2016-07-22 18:24:14', '2016-07-25 11:10:18', '是嗎', 0, 1, 0, 0),
(106, 55, '2016-07-25 11:11:03', '2016-07-25 11:24:51', '不是', 0, 1, 0, 0),
(107, 56, '2016-07-25 11:25:09', '0000-00-00 00:00:00', '是嗎', 0, 1, 0, 0),
(108, 57, '2016-07-25 11:25:43', '2016-07-25 14:05:03', '哀', 0, 1, 0, 0),
(109, 57, '2016-07-27 10:58:09', '0000-00-00 00:00:00', '你知道嗎', 0, 1, 0, 0),
(110, 57, '2016-07-27 11:13:30', '2016-07-27 13:42:34', 'YEEE', 1, 1, 0, 0),
(111, 55, '2016-07-27 11:53:27', '2016-07-27 13:57:51', '沒錯', 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL COMMENT '分數id ',
  `type` int(11) NOT NULL COMMENT '11.問答12.按圖',
  `created_at` datetime NOT NULL COMMENT '新增時間',
  `updated_at` datetime NOT NULL COMMENT '上傳時間',
  `school` varchar(255) NOT NULL COMMENT '學校名稱',
  `name` varchar(255) NOT NULL COMMENT '登錄者',
  `score` int(11) NOT NULL COMMENT '分數',
  `display` int(11) NOT NULL DEFAULT '1' COMMENT '顯示:1.顯示 2.隱藏',
  `recover` int(11) NOT NULL DEFAULT '0' COMMENT '資料狀態:0.正常 1.刪除',
  `sort` int(11) NOT NULL COMMENT '排序'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `score`
--

INSERT INTO `score` (`id`, `type`, `created_at`, `updated_at`, `school`, `name`, `score`, `display`, `recover`, `sort`) VALUES
(8, 11, '2016-07-27 14:20:16', '0000-00-00 00:00:00', '爭倫', '爭歌', 50, 1, 0, 0),
(21, 12, '2016-07-27 14:20:16', '0000-00-00 00:00:00', '122222222', '111111', 50, 1, 0, 0),
(22, 11, '2016-07-27 14:20:16', '0000-00-00 00:00:00', '大爭倫', '大爭歌', 60, 1, 0, 0),
(23, 12, '2016-07-27 14:20:16', '0000-00-00 00:00:00', '122222222', '1歌', 90, 1, 0, 0),
(24, 12, '2016-07-27 17:17:16', '0000-00-00 00:00:00', '大家好', '理好', 88, 1, 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `panel` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL COMMENT '上層 ID',
  `name` varchar(255) NOT NULL COMMENT '中文類別名稱',
  `name_en` varchar(255) NOT NULL COMMENT '英文類別名稱',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `sort` int(11) NOT NULL COMMENT '排序',
  `recover` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `type`
--

INSERT INTO `type` (`id`, `panel`, `parent_id`, `name`, `name_en`, `created_at`, `updated_at`, `sort`, `recover`) VALUES
(11, 3, 3, '快問快答', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(12, 3, 3, '按圖索驥', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `admintable`
--
ALTER TABLE `admintable`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `admintype`
--
ALTER TABLE `admintype`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `backadmin`
--
ALTER TABLE `backadmin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `backmainmenu`
--
ALTER TABLE `backmainmenu`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `bad_language`
--
ALTER TABLE `bad_language`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `config`
--
ALTER TABLE `config`
  ADD UNIQUE KEY `setting` (`setting`);

--
-- 資料表索引 `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `question_option`
--
ALTER TABLE `question_option`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `admintable`
--
ALTER TABLE `admintable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `admintype`
--
ALTER TABLE `admintype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `backadmin`
--
ALTER TABLE `backadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `backmainmenu`
--
ALTER TABLE `backmainmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- 使用資料表 AUTO_INCREMENT `bad_language`
--
ALTER TABLE `bad_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '不雅字詞ID', AUTO_INCREMENT=12;
--
-- 使用資料表 AUTO_INCREMENT `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- 使用資料表 AUTO_INCREMENT `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '題目ID', AUTO_INCREMENT=58;
--
-- 使用資料表 AUTO_INCREMENT `question_option`
--
ALTER TABLE `question_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '選項ID', AUTO_INCREMENT=112;
--
-- 使用資料表 AUTO_INCREMENT `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分數id ', AUTO_INCREMENT=25;
--
-- 使用資料表 AUTO_INCREMENT `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2019 年 2 月 03 日 12:13
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE IF NOT EXISTS `gs_user_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf32_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf32_unicode_ci NOT NULL,
  `lpw` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(8, 'test10', 'test10', '$2y$10$0cXf.iqg3prlPGokOL9GauLlK1NIuS8Syl.iFiDOf7TVPHOmXF7VS', 1, 0),
(10, 'user1', 'user1', '$2y$10$azbRjr2AS0jgosxxCz0Z8.xTmYdCNVHuJkRV7Z6yr4yxsr6M8lC4C', 0, 0),
(11, 'user2', 'user2', '$2y$10$0GVyRFx1UXP/JuwWVsnynubwpGmWTTjVP7ZdilbYrvPfVnwrpmoN.', 0, 0),
(12, 'user3', 'user3', '$2y$10$tpcy/LoMBXu83mR6bX3clO/2kXvA/fprNYzhAE6lIoif1RR28dkGG', 1, 0),
(13, 'user4', 'user4', '$2y$10$ZZOxgxfacrOm1.FUjqwc4.ji1l5gCWpmvmFWij/Dvwdsm5R1wyiC.', 1, 0),
(14, 'user0', 'user0', '$2y$10$BCkntjVQYsTXsb1IG4VnsOED8faAUIVSwDlsLYWQx.kw3.Gz0glCK', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

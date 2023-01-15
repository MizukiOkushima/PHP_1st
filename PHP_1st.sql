-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2023 年 1 月 15 日 08:07
-- サーバのバージョン： 8.0.31
-- PHP のバージョン: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `PHP_1st`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `PHP_1st_table`
--

CREATE TABLE `PHP_1st_table` (
  `id` int NOT NULL,
  `username` varchar(30) NOT NULL,
  `comment` text NOT NULL,
  `postDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- テーブルのデータのダンプ `PHP_1st_table`
--

INSERT INTO `PHP_1st_table` (`id`, `username`, `comment`, `postDate`) VALUES
(1, '風吹けば名無し', '今日も盛り上がっていこう', '2023-01-14 01:23:45'),
(2, '風吹けば名無し', 'いちおつ', '2023-01-14 01:23:46'),
(3, '風吹けば名無し', 'いちょつ', '2023-01-14 01:23:47'),
(4, '風吹けば名無し', '実際のブラウザページからの投稿です。', '2023-01-14 01:23:48');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `PHP_1st_table`
--
ALTER TABLE `PHP_1st_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `PHP_1st_table`
--
ALTER TABLE `PHP_1st_table`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

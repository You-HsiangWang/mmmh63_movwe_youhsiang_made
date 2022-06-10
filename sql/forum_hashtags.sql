-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2022 年 06 月 06 日 05:28
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 8.0.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- 資料庫: `movwe_database`
--

-- --------------------------------------------------------

--
-- 資料表結構 `forum_hashtags`
--

CREATE TABLE `forum_hashtags` (
  `f_hashtag_sid` int(11) NOT NULL COMMENT '主鍵',
  `f_hashtag_name` varchar(255) NOT NULL COMMENT 'hashtag名'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `forum_hashtags`
--

INSERT INTO `forum_hashtags` (`f_hashtag_sid`, `f_hashtag_name`) VALUES
(1, '#韓劇心得'),
(2, '#2521'),
(3, '#南柱赫'),
(4, '#哈利波特'),
(5, '#鄧不利多');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `forum_hashtags`
--
ALTER TABLE `forum_hashtags`
  ADD PRIMARY KEY (`f_hashtag_sid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `forum_hashtags`
--
ALTER TABLE `forum_hashtags`
  MODIFY `f_hashtag_sid` int(11) NOT NULL AUTO_INCREMENT COMMENT '主鍵', AUTO_INCREMENT=6;
COMMIT;

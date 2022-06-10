-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2022 年 06 月 06 日 05:27
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
-- 資料表結構 `forum_has_hastag`
--

CREATE TABLE `forum_has_hastag` (
  `f_has_sid` int(11) NOT NULL COMMENT '主鍵',
  `f_has_forum_sid` int(11) NOT NULL COMMENT 'hastag對應到的文章sid',
  `f_has_hashtag_sid` int(11) NOT NULL COMMENT '文章對應到的hastag sid',
  `f_has_forum_title` varchar(255) NOT NULL COMMENT 'hastag對應到的文章title',
  `f_has_hastag_name` varchar(255) NOT NULL COMMENT '文章對應到的hashtag 名'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `forum_has_hastag`
--

INSERT INTO `forum_has_hastag` (`f_has_sid`, `f_has_forum_sid`, `f_has_hashtag_sid`, `f_has_forum_title`, `f_has_hastag_name`) VALUES
(1, 1, 1, '2521感想ㄧ事與願違是另有安排', '#韓劇心得'),
(2, 1, 2, '2521感想ㄧ事與願違是另有安排', '#2521'),
(3, 1, 3, '2521感想ㄧ事與願違是另有安排', '#南柱赫'),
(4, 2, 4, '最佳結局 怪獸與鄧不力多的秘密', '#哈利波特'),
(5, 2, 5, '最佳結局 怪獸與鄧不力多的秘密', '#鄧不利多');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `forum_has_hastag`
--
ALTER TABLE `forum_has_hastag`
  ADD PRIMARY KEY (`f_has_sid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `forum_has_hastag`
--
ALTER TABLE `forum_has_hastag`
  MODIFY `f_has_sid` int(11) NOT NULL AUTO_INCREMENT COMMENT '主鍵', AUTO_INCREMENT=6;
COMMIT;

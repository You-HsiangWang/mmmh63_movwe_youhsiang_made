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
-- 資料表結構 `forum_comment`
--

CREATE TABLE `forum_comment` (
  `f_comment_sid` int(11) NOT NULL COMMENT '留言sid',
  `f_comment_content` varchar(300) NOT NULL COMMENT '留言內容',
  `f_comment_forum_sid` int(11) NOT NULL COMMENT '關聯該片文章的sid',
  `f_comment_authur` varchar(255) NOT NULL COMMENT '該留言的作者',
  `f_comment_pic` varchar(255) NOT NULL COMMENT '作者圖片',
  `f_comment_uploadtime` datetime NOT NULL COMMENT '留言時間',
  `f_comment_likes` int(11) NOT NULL COMMENT '按讚次數',
  `f_comment_authur_sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `forum_comment`
--

INSERT INTO `forum_comment` (`f_comment_sid`, `f_comment_content`, `f_comment_forum_sid`, `f_comment_authur`, `f_comment_pic`, `f_comment_uploadtime`, `f_comment_likes`, `f_comment_authur_sid`) VALUES
(1, '我愛辣妹 辣妹愛我', 1, 'Eric', 'member_pic1.jpeg', '2022-06-03 07:22:43', 10, 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `forum_comment`
--
ALTER TABLE `forum_comment`
  ADD PRIMARY KEY (`f_comment_sid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `forum_comment`
--
ALTER TABLE `forum_comment`
  MODIFY `f_comment_sid` int(11) NOT NULL AUTO_INCREMENT COMMENT '留言sid', AUTO_INCREMENT=9;
COMMIT;

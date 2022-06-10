-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2022 年 06 月 06 日 05:31
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
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `member_sid` int(11) NOT NULL,
  `member_id` varchar(255) NOT NULL DEFAULT 'user0001',
  `member_email` varchar(255) NOT NULL,
  `member_password` varchar(255) NOT NULL,
  `member_invitecode` varchar(255) NOT NULL,
  `member_nickname` varchar(255) NOT NULL DEFAULT 'user0001',
  `member_avatar` varchar(255) NOT NULL,
  `member_points` int(11) NOT NULL DEFAULT 0,
  `member_info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`member_sid`, `member_id`, `member_email`, `member_password`, `member_invitecode`, `member_nickname`, `member_avatar`, `member_points`, `member_info`) VALUES
(1, 'user0001', 'example@gmail.com', 'example', '7654321', 'Eric', 'member_pic1.jpeg', 2000, '翔子學妹看日劇，只分享不劇透日劇分享、戀愛實境秀、電影日劇(播出完畢後)做分享每週不定期更新和大家分享我喜歡的作品'),
(2, 'user0002', 'yoli@gmail.com', 'yoliyoli', '', 'Yoli', 'member_pic2.jpeg', 3000, NULL),
(10, 'user0003', 'user003@gmail.com', '003003', '7654321', 'Elsa', 'member_pic3.jpeg', 2000, NULL),
(11, 'user0004', 'user4@gmail.com', '004004', '7654321', 'Anya', 'member_pic4.jpeg', 2000, NULL);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_sid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `member_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

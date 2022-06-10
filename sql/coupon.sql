-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2022 年 06 月 06 日 05:24
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
-- 資料表結構 `coupon`
--

CREATE TABLE `coupon` (
  `coupon_sid` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `coupon_type` int(11) NOT NULL COMMENT '1: limited\r\n2:ott\r\n3:shop',
  `coupon_brand` varchar(255) NOT NULL,
  `coupon_brand_img` varchar(255) DEFAULT NULL,
  `coupon_name` varchar(255) NOT NULL,
  `coupon_picture` varchar(255) NOT NULL,
  `coupon_price` int(11) NOT NULL,
  `coupon_total` int(11) DEFAULT NULL,
  `coupon_rest` int(11) DEFAULT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_notice` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `coupon`
--

INSERT INTO `coupon` (`coupon_sid`, `coupon_id`, `coupon_type`, `coupon_brand`, `coupon_brand_img`, `coupon_name`, `coupon_picture`, `coupon_price`, `coupon_total`, `coupon_rest`, `coupon_code`, `coupon_notice`) VALUES
(1, 1, 1, 'Netflix優惠券', 'netflix_s.svg', 'Netflix 7天試用兌換券', 'discount_7days.svg', 4000, 20, 15, 'MHA33RTY679', '<p>兌換後可將序號於註冊netflix帳號時使用，可獲得7天的免費試用期。</p><p>兌換後不可退貨。<br>一個帳號僅能兌換一次。<br>限量優惠，換完為止。</p>'),
(2, 2, 1, 'IQIYI優惠券', 'iqiyi_s.svg', '愛奇藝 4天試用兌換券', 'discount_4days.svg', 3500, 20, 10, 'HAM231T7K7Q', '<p>兌換後可將序號於註冊愛奇藝帳號時使用，可獲得4天的免費試用期。</p><p>兌換後不可退貨。<br>一個帳號僅能兌換一次。<br>限量優惠，換完為止。</p>'),
(3, 3, 1, 'IQIYI優惠券', 'iqiyi_s.svg', '愛奇藝 7天試用兌換券', 'discount_7days.svg', 4000, 20, 4, 'HVM927T2K7A', '<p>兌換後可將序號於註冊愛奇藝帳號時使用，可獲得7天的免費試用期。</p><p>兌換後不可退貨。<br>一個帳號僅能兌換一次。<br>限量優惠，換完為止。</p>'),
(4, 4, 2, 'Friday影音優惠券', 'friday_s.svg', 'Friday影音 免費租片兌換券', 'discount_free.svg', 1000, NULL, NULL, 'GRP922T2K7A', '<p>兌換後使用序號，可換取friday影音免費租片乙部。</p><p>兌換後不可退貨。<br>本平台有權修改使用規則。'),
(5, 5, 2, 'IQIYI影音優惠券', 'iqiyi_s.svg', 'IQIYI影音 免費租片兌換券', 'discount_free.svg', 1200, NULL, NULL, 'ARP922T2K7A', '<p>兌換後使用序號，可換取iqiyi影音免費租片乙部。</p><p>兌換後不可退貨。<br>本平台有權修改使用規則。'),
(6, 6, 2, 'IQIYI影音優惠券', 'iqiyi_s.svg', 'IQIYI影音 體驗2hr兌換券', 'discount_2hr.svg', 1500, NULL, NULL, 'BRP922T2K7A', '<p>兌換後使用序號，可換取iqiyi免費體驗2hr。</p><p>兌換後不可退貨。<br>本平台有權修改使用規則。'),
(7, 7, 2, 'IQIYI影音優惠券', 'iqiyi_s.svg', 'IQIYI影音 體驗3hr兌換券', 'discount_3hr.svg', 2000, NULL, NULL, 'CRP922T2K7A', '<p>兌換後使用序號，可換取iqiyi免費體驗3hr。</p><p>兌換後不可退貨。<br>本平台有權修改使用規則。'),
(8, 8, 2, 'Friday影音優惠券', 'friday_s.svg', 'Friday影音 體驗2hr兌換券', 'discount_2hr.svg', 1500, NULL, NULL, 'ZRP922T2K7A', '<p>兌換後使用序號，可換取friday影音免費體驗2hr。</p><p>兌換後不可退貨。<br>本平台有權修改使用規則。'),
(9, 9, 2, 'Friday影音優惠券', 'friday_s.svg', 'Friday影音 體驗3hr兌換券', 'discount_3hr.svg', 2000, NULL, NULL, 'ZRP922T2K5A', '<p>兌換後使用序號，可換取friday影音免費體驗3hr。</p><p>兌換後不可退貨。<br>本平台有權修改使用規則。'),
(10, 10, 3, '周邊商城折價券', NULL, '50元折價券', 'discount_50.svg', 2500, NULL, NULL, '1RP922T2K5A', '<p>兌換後使用序號，消費滿1000元即可折抵50元。</p><p>一筆訂單只能使用一張。<br>兌換後不可退貨。<br>本平台有權修改使用規則。'),
(11, 11, 3, '周邊商城折價券', NULL, '100元折價券', 'discount_100.svg', 5000, NULL, NULL, '2RP922T2K5A', '<p>兌換後使用序號，消費滿1000元即可折抵100元。</p><p>一筆訂單只能使用一張。<br>兌換後不可退貨。<br>本平台有權修改使用規則。'),
(12, 12, 3, '周邊商城折價券', NULL, '150元折價券', 'discount_150.svg', 7500, NULL, NULL, '3RP922T2K5A', '<p>兌換後使用序號，消費滿1000元即可折抵150元。</p><p>一筆訂單只能使用一張。<br>兌換後不可退貨。<br>本平台有權修改使用規則。'),
(13, 13, 3, '周邊商城折價券', NULL, '200元折價券', 'discount_200.svg', 9900, NULL, NULL, '4RP922T2K5A', '<p>兌換後使用序號，消費滿1000元即可折抵200元。</p><p>一筆訂單只能使用一張。<br>兌換後不可退貨。<br>本平台有權修改使用規則。'),
(14, 13, 3, '周邊商城折價券', NULL, '250元折價券', 'discount_250.svg', 12000, NULL, NULL, '5RP922T2K5A', '<p>兌換後使用序號，消費滿1000元即可折抵250元。</p><p>一筆訂單只能使用一張。<br>兌換後不可退貨。<br>本平台有權修改使用規則。');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_sid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

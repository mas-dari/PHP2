-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 12 月 16 日 02:12
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db3`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_an_table`
--

CREATE TABLE `gs_an_table` (
  `name` text NOT NULL,
  `dateOfBirth` text NOT NULL,
  `postalCode` text NOT NULL,
  `address` text NOT NULL,
  `telephoneNumber` text NOT NULL,
  `mail` text NOT NULL,
  `highSchool` text NOT NULL,
  `university` text NOT NULL,
  `companyName` text NOT NULL,
  `companyName2` text NOT NULL,
  `companyName3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `gs_an_table`
--

INSERT INTO `gs_an_table` (`name`, `dateOfBirth`, `postalCode`, `address`, `telephoneNumber`, `mail`, `highSchool`, `university`, `companyName`, `companyName2`, `companyName3`) VALUES
('名前を入力', '生年月日を入力', '郵便番号を入力', '住所を入力', '電話番号を入力', 'メールアドレスを入力', '高校を入力', '大学を入力', '職歴1を入力', '職歴2を入力', '職歴3を入力'),
('田中 太郎', '1990年1月1日', '135-0005', '東京都渋谷区神宮前6丁目35-3 011 JUNCTION harajuku', '03-6833-2979', 'メールアドレスを入力', 'ジーズ高等学校', '東京ジーズ大学', 'デジタルハリウッド', 'G\'s ACADEMY', 'ジーズアカデミー');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

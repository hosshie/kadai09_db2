-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2024 年 7 月 04 日 22:38
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
-- データベース: `gs_db_class`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `kadai08_db1`
--

CREATE TABLE `kadai08_db1` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `old` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `kinki` varchar(100) NOT NULL,
  `chart` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `kadai08_db1`
--

INSERT INTO `kadai08_db1` (`id`, `name`, `old`, `date`, `kinki`, `chart`) VALUES
(2, '我が名はテストだ', '〜10代', '2024-06-27 02:56:00', '高血圧・糖尿病', '終了済みのレッスンについて書くはずなのに未来の日時が選択できちゃうよーん！できるかな？'),
(3, '私はテスト２号機だ', '40代', '2024-06-20 23:12:00', '該当なし', 'ラジオボタンを複数選択できるようにしたいぶぅ');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `kadai08_db1`
--
ALTER TABLE `kadai08_db1`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `kadai08_db1`
--
ALTER TABLE `kadai08_db1`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

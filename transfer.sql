-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 27 2017 г., 16:14
-- Версия сервера: 5.6.26
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `transfer`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1490344821),
('m170324_083759_create_user_table', 1490352745),
('m170324_105547_create_usertransfer_table', 1490386296);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `balance` int(11) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `balance`, `auth_key`, `created_at`, `updated_at`) VALUES
(1, 'alex', 106, 'dzmzjI0IRgpyOxWcCueoWEH3jV1prdgr', 1490386650, 1490528883),
(2, 'mike', 386, 'XnT-oTEsu-PGjHa1U8G_KrQzfZfTYO-T', 1490386662, 1490388390),
(3, 'rex', -570, NULL, 1490386680, 1490386743),
(4, 'ricki', 45, NULL, 1490388331, 1490388331),
(5, 'алексей', 33, NULL, 1490390184, 1490390184);

-- --------------------------------------------------------

--
-- Структура таблицы `usertransfer`
--

CREATE TABLE IF NOT EXISTS `usertransfer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_user_id` int(11) DEFAULT NULL,
  `from_username` varchar(255) DEFAULT NULL,
  `to_user_id` int(11) DEFAULT NULL,
  `to_username` varchar(255) DEFAULT NULL,
  `summa` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `usertransfer`
--

INSERT INTO `usertransfer` (`id`, `from_user_id`, `from_username`, `to_user_id`, `to_username`, `summa`, `created_at`, `updated_at`) VALUES
(1, 1, 'alex', 2, 'mike', 10, 1490386662, 1490386662),
(2, 1, 'alex', 2, 'mike', 20, 1490386672, 1490386672),
(3, 1, 'alex', 3, 'rex', 30, 1490386680, 1490386680),
(4, 3, 'rex', 1, 'alex', 100, 1490386721, 1490386721),
(5, 3, 'rex', 2, 'mike', 500, 1490386743, 1490386743),
(6, 1, 'alex', 4, 'ricki', 45, 1490388331, 1490388331),
(7, 2, 'mike', 1, 'alex', 100, 1490388380, 1490388380),
(8, 2, 'mike', 1, 'alex', 44, 1490388390, 1490388390),
(9, 1, 'alex', 5, 'алексей', 33, 1490390184, 1490390184);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

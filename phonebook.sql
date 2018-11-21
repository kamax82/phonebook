-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 21 2018 г., 13:53
-- Версия сервера: 5.5.61-log
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `phonebook`
--

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` char(20) CHARACTER SET koi8u NOT NULL,
  `sname` char(20) CHARACTER SET koi8u DEFAULT NULL,
  `tel` int(11) NOT NULL,
  `email` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `sname`, `tel`, `email`) VALUES
(1, 'Maks', 'Karpuk', 235, 'kamax@atlex.ru'),
(12, 'Eugene', 'Nahodkin', 201, 'nahodkin@atlex.ru'),
(13, 'Elena', 'Nahodkina', 202, 'elena@atlex.ru'),
(17, 'Vitalii', 'Sharonov', 208, 'vit@atlex.ru'),
(18, 'Michael', 'Holopov', 210, 'm.holopov@atlex.ru'),
(20, 'Dmitry', 'Chernobrov', 211, ''),
(21, 'Vitaly', 'Chernobrov', 212, 'vitaly@atlex.ru'),
(22, 'Alexander', 'Kryzhanovsky', 214, 'falcon@atlex.ru'),
(23, 'Anton', 'Porabkovich', 217, 'anton@atlex.ru'),
(24, 'Irina', 'Avsineeva', 219, 'i.avsineeva@atlex.ru'),
(25, 'Lubov', 'Borisova', 220, 'luba@atlex.ru'),
(26, 'Alexander', 'Hudich', 228, 'alt@atlex.ru'),
(31, 'Nicokay', 'Malkov', 246, 'nikolay@atlex.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` char(20) NOT NULL,
  `pass` char(100) NOT NULL,
  `is_admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `pass`, `is_admin`) VALUES
(5, 'admin', '$2y$10$teDI1mVoJJIRL9mt39gvaej54uQP8tZtTfZFgjL7B0Gh./vMNnVU2', 1),
(6, 'max', '$2y$10$UyOav5VjfI/hHCpmVnzGde30ILbR6t4riBRdTXi.fgl7gj6Cisws2', 0),
(7, 'user', '$2y$10$QKKj0xLsB81WRisLgG6P4OFlT19Mp8cn6ZLVrNBuldjtJAvapZoUK', 0),
(9, 'kamax', '$2y$10$k670IHmzO9lIjLFrfMNnLeytoK/rs/nyKtLKWBwJKtInMFxiht9JO', 0),
(15, 'MaxK', '$2y$10$XPCdxfPXQVzTBTgVI0bhgeZwtHrOxaNb9y4Kck2ma0sXm1CSIHiqe', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numb` (`tel`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

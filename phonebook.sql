-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 20 2018 г., 14:35
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
(26, 'Alexander', 'Hudich', 228, 'alt@atlex.ru');

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
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

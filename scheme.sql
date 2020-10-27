-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 27 2020 г., 11:26
-- Версия сервера: 5.6.43
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `scheme`
--

-- --------------------------------------------------------

--
-- Структура таблицы `apartment`
--

CREATE TABLE `apartment` (
  `ID` int(11) NOT NULL,
  `Adress` text NOT NULL,
  `m2` text NOT NULL,
  `Room` int(11) NOT NULL,
  `Info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `apartment`
--

INSERT INTO `apartment` (`ID`, `Adress`, `m2`, `Room`, `Info`) VALUES
(1, 'ул. Одесская, дом, 22, корп.1', '76,5', 3, 'есть газ, парковочное место'),
(2, 'ул. Одесская, дом, 22, корп.1', '58,2', 2, 'есть газ, парковочное место, квартира с отделкой'),
(3, 'ул. Одесская, дом, 22, корп.1', '35,4', 1, 'есть газ, парковочное место'),
(4, 'ул. Котова, дом. 3, корп.2', '73,6', 3, 'парковочное место, квартира с отделкой'),
(5, 'ул. Котова, дом. 3, корп.2', '61,2', 2, 'парковочное место'),
(6, 'ул. Котова, дом. 3, корп.2', '38,7', 1, 'парковочное место'),
(7, 'ул. Михневская, дом.12, корп. 2', '74,8', 3, 'есть газ, квартира с отделкой'),
(8, 'ул. Михневская, дом.12, корп. 2', '59,3', 2, 'есть газ, квартира с отделкой'),
(9, 'ул. Михневская, дом.12, корп. 2', '37,1', 1, 'есть газ, квартира с отделкой'),
(11, 'ул. 1945 года, д. 8, корп. 1, кв. 394', '120', 2, 'Квартира Бизнес класс, парковочное место');

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `ID` int(11) NOT NULL,
  `Name` tinytext NOT NULL,
  `Address` text NOT NULL,
  `Phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`ID`, `Name`, `Address`, `Phone`) VALUES
(1, 'Андрейка', 'ул. большая Люблинская, д.23, корп.2, кв.110', '+79454382323'),
(2, 'Елена', 'Восточный проезд, д.23, корп.1, кв.1', '+74039452387'),
(3, 'Николай', 'ул. 1945 года, дом.12, корп.1, кв.32', '+74383943485'),
(4, 'Анастасия', 'ул. Сивашская, дом.5, корп.2, кв.54', '+74308469339'),
(7, 'Евгения', 'ул. Радио, д. 5, корп. 1, кв. 43', '+74329085423'),
(19, '1', '1', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `inquiry`
--

CREATE TABLE `inquiry` (
  `ID` int(11) NOT NULL,
  `ID_client` int(11) NOT NULL,
  `ID_apartament` int(11) NOT NULL,
  `data_add` text NOT NULL,
  `update_data` text NOT NULL,
  `deletion_date` text,
  `Activ` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `inquiry`
--

INSERT INTO `inquiry` (`ID`, `ID_client`, `ID_apartament`, `data_add`, `update_data`, `deletion_date`, `Activ`) VALUES
(7, 1, 1, '05.10.20', '06.10.20', '', '1'),
(8, 1, 2, '05.10.20', '06.10.20', '', '1'),
(9, 1, 3, '05.10.20', '06.10.20', '', '1'),
(10, 2, 7, '05.10.20', '06.10.20', '', '1'),
(11, 2, 8, '05.10.20', '06.10.20', '', '1'),
(12, 2, 9, '05.10.20', '06.10.20', '', '1'),
(16, 3, 1, '05.10.20', '06.10.20', '', '1'),
(17, 3, 2, '05.10.20', '06.10.20', '', '1'),
(18, 3, 3, '05.10.20', '06.10.20', '', '1'),
(19, 3, 4, '05.10.20', '06.10.20', '', '1'),
(20, 3, 5, '05.10.20', '06.10.20', '', '1'),
(21, 3, 6, '05.10.20', '06.10.20', '', '1'),
(22, 3, 7, '05.10.20', '06.10.20', '', '1'),
(23, 3, 8, '05.10.20', '06.10.20', '', '1'),
(24, 3, 9, '05.10.20', '06.10.20', '', '1'),
(25, 19, 1, '05.10.20', '26.10.20', '26.10.20', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `photo`
--

CREATE TABLE `photo` (
  `ID` int(11) NOT NULL,
  `ID_apartament` int(11) NOT NULL,
  `Photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `photo`
--

INSERT INTO `photo` (`ID`, `ID_apartament`, `Photo`) VALUES
(1, 1, '1rum00001.png'),
(2, 2, '1rum00002.png'),
(3, 3, '1rum00003.png'),
(4, 4, '2rum00001.png'),
(5, 5, '2rum00002.png'),
(6, 6, '2rum00003.png'),
(7, 7, '3rum00001.png'),
(8, 8, '3rum00002.png'),
(9, 9, '3rum00003.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `apartment`
--
ALTER TABLE `apartment`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_client` (`ID_client`),
  ADD KEY `id_aartament` (`ID_apartament`);

--
-- Индексы таблицы `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_apartament` (`ID_apartament`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `apartment`
--
ALTER TABLE `apartment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `photo`
--
ALTER TABLE `photo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `inquiry`
--
ALTER TABLE `inquiry`
  ADD CONSTRAINT `id_aartament` FOREIGN KEY (`ID_apartament`) REFERENCES `apartment` (`ID`),
  ADD CONSTRAINT `id_client` FOREIGN KEY (`ID_client`) REFERENCES `client` (`ID`);

--
-- Ограничения внешнего ключа таблицы `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `id_apartament` FOREIGN KEY (`ID_apartament`) REFERENCES `apartment` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

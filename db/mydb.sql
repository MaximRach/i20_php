-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 01 2022 г., 16:29
-- Версия сервера: 10.4.25-MariaDB
-- Версия PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mydb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categorys`
--

CREATE TABLE `categorys` (
  `idCategory` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categorys`
--

INSERT INTO `categorys` (`idCategory`, `name`, `description`) VALUES
(1, 'testCat1', 'test category 1'),
(2, 'testCat2', 'test category 2'),
(3, 'testCat3', 'test category 3');

-- --------------------------------------------------------

--
-- Структура таблицы `pics`
--

CREATE TABLE `pics` (
  `idpic` int(11) NOT NULL,
  `path` varchar(256) DEFAULT NULL,
  `altName` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pics`
--

INSERT INTO `pics` (`idpic`, `path`, `altName`) VALUES
(1, 'data/pics/1.png', 'test pic 1'),
(2, 'data/pics/2.png', 'test pic 2'),
(3, 'data/pics/3.png', 'test pic 3');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `idproduct` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `priceWithouthDiscount` float DEFAULT NULL,
  `priceWithPromo` float DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`idproduct`, `name`, `active`, `price`, `priceWithouthDiscount`, `priceWithPromo`, `description`) VALUES
(1, 'testPr1', 1, 120, 130, 110, 'test pr 1'),
(2, 'testPr2', 1, 170, 200, 160, 'test pr 2'),
(3, 'testPr3', 1, 180, 200, 150, 'test pr 3');

-- --------------------------------------------------------

--
-- Структура таблицы `productsCategorys`
--

CREATE TABLE `productsCategorys` (
  `idproductsCategorys` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `mainCat` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `productsCategorys`
--

INSERT INTO `productsCategorys` (`idproductsCategorys`, `idProduct`, `idCategory`, `mainCat`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 0),
(3, 2, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `productsPics`
--

CREATE TABLE `productsPics` (
  `idproductsPics` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `IdPic` int(11) NOT NULL,
  `mainPic` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `productsPics`
--

INSERT INTO `productsPics` (`idproductsPics`, `idProduct`, `IdPic`, `mainPic`) VALUES
(1, 1, 1, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`idCategory`);

--
-- Индексы таблицы `pics`
--
ALTER TABLE `pics`
  ADD PRIMARY KEY (`idpic`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`idproduct`);

--
-- Индексы таблицы `productsCategorys`
--
ALTER TABLE `productsCategorys`
  ADD PRIMARY KEY (`idproductsCategorys`),
  ADD KEY `idProduct2` (`idProduct`),
  ADD KEY `idCategory` (`idCategory`);

--
-- Индексы таблицы `productsPics`
--
ALTER TABLE `productsPics`
  ADD PRIMARY KEY (`idproductsPics`),
  ADD KEY `idProduct` (`idProduct`),
  ADD KEY `idPic` (`IdPic`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categorys`
--
ALTER TABLE `categorys`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `pics`
--
ALTER TABLE `pics`
  MODIFY `idpic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `idproduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `productsCategorys`
--
ALTER TABLE `productsCategorys`
  MODIFY `idproductsCategorys` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `productsPics`
--
ALTER TABLE `productsPics`
  MODIFY `idproductsPics` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `productsCategorys`
--
ALTER TABLE `productsCategorys`
  ADD CONSTRAINT `idCategory` FOREIGN KEY (`idCategory`) REFERENCES `categorys` (`idCategory`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idProduct2` FOREIGN KEY (`idProduct`) REFERENCES `products` (`idproduct`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `productsPics`
--
ALTER TABLE `productsPics`
  ADD CONSTRAINT `idPic` FOREIGN KEY (`IdPic`) REFERENCES `pics` (`idpic`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idProduct` FOREIGN KEY (`idProduct`) REFERENCES `products` (`idproduct`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

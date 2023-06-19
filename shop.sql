-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 01 2023 г., 21:24
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `Id` int(11) NOT NULL,
  `Name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`Id`, `Name`) VALUES
(1, 'Смартфоны и гаджеты'),
(2, 'Комплектующие'),
(3, 'Ноутбуки и компьютеры'),
(4, 'Компьютерная периферия'),
(5, 'Оргтехника и расходные материалы'),
(6, 'Сетевое и серверное оборудование'),
(7, 'Телевизоры, аудио, видео'),
(8, 'Бытовая техника и товары для дома'),
(9, 'Товары для геймеров'),
(10, 'Развлечения и отдых');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `Id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Cover` text NOT NULL,
  `Price` decimal(10,0) NOT NULL,
  `Info` text NOT NULL,
  `Specs` text NOT NULL,
  `Description` text NOT NULL,
  `Images` text NOT NULL,
  `Category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`Id`, `Name`, `Cover`, `Price`, `Info`, `Specs`, `Description`, `Images`, `Category_id`) VALUES
(1, 'Товар 1 testikous', '1.jpg', 1601659234, 'Тип клавиатуры: Мультимедия, Игровая\r\nТип клавиш: Механические\r\nТип переключателей: ROG NX Red (Linear)\r\nХод клавиши, мм: 4\r\nТип подключения: Проводной\r\nTEST', '[{\"name\":\"UID товара\",\"value\":\"90MP02E6-BKRA00\"},{\"name\":\"Производитель\",\"value\":\"ASUS\"},{\"name\":\"Модель\",\"value\":\"ROG Strix Flare II Animate\"},{\"name\":\"Тип\",\"value\":\"Клавиатура\"},{\"name\":\"Тип клавиатуры\",\"value\":\"Подробнее Мультимедия, Игровая\"},{\"name\":\"TEST\",\"value\":\"TEST\"}]', '                <p><b><font color=\"#ff0000\"><u>TEST</u></font></b></p><p>ROG Strix Flare II Animate</p>\r\n                <p>Игровая механическая клавиатура ROG Strix Flare II Animate: встроенный матричный дисплей AniMe Matrix, частота опроса\r\n                    интерфейса – 8000 Гц, заменяемые переключатели ROG NX или Cherry MX, металлические мультимедийные клавиши, отсоединяемая\r\n                    подставка под запястья со светорассеивателем.</p>\r\n                <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/S3k9r9tExaY?enablejsapi=1&amp;origin=https%3A%2F%2Fshop.kz\" title=\"ROG Strix Flare II Animate | Fully Loaded Flare | ROG\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen=\"\" data-gtm-yt-inspected-2255351_460=\"true\" id=\"147621963\" data-gtm-yt-inspected-11=\"true\"></iframe>', '[\"2.jpg\",\"3.jpg\",\"1_cat.jpg\",\"1_tree.jpg\"]', 9),
(2, 'Товар 2', '2.jpg', 10000, 'Тип клавиатуры: Мультимедия, Игровая\r\nТип клавиш: Механические\r\nТип переключателей: ROG NX Red (Linear)', '[{\"name\":\"Производитель\",\"value\":\"ASUS\"},{\"name\":\"Модель\",\"value\":\"ROG Strix Flare II Animate\"},{\"name\":\"Тип\",\"value\":\"Клавиатура\"},{\"name\":\"Тип клавиатуры\",\"value\":\"Подробнее Мультимедия, Игровая\"}]', '                <p>ROG Strix Flare II Animate</p>\r\n                <p>Игровая механическая клавиатура ROG Strix Flare II Animate: встроенный матричный дисплей AniMe Matrix, частота опроса\r\n                    интерфейса – 8000 Гц, заменяемые переключатели ROG NX или Cherry MX, металлические мультимедийные клавиши, отсоединяемая\r\n                    подставка под запястья со светорассеивателем.</p>\r\n                <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/S3k9r9tExaY?enablejsapi=1&amp;origin=https%3A%2F%2Fshop.kz\" title=\"ROG Strix Flare II Animate | Fully Loaded Flare | ROG\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen=\"\" data-gtm-yt-inspected-2255351_460=\"true\" id=\"147621963\" data-gtm-yt-inspected-11=\"true\"></iframe>', '[\"2.jpg\",\"3.jpg\",\"4.jpg\"]', 1),
(3, 'Товар 3', '5.jpg', 32100, 'Тип клавиатуры: Мультимедия, Игровая\r\nТип клавиш: Механические\r\nТип переключателей: ROG NX Red (Linear)\r\nХод клавиши, мм: 4\r\nТип подключения: Проводной', '[{\"name\":\"UID товара\",\"value\":\"90MP02E6-BKRA00\"},{\"name\":\"Производитель\",\"value\":\"ASUS\"},{\"name\":\"Модель\",\"value\":\"ROG Strix Flare II Animate\"},{\"name\":\"Тип\",\"value\":\"Клавиатура\"}]', '                <p>ROG Strix Flare II Animate</p>\r\n                <p>Игровая механическая клавиатура ROG Strix Flare II Animate: встроенный матричный дисплей AniMe Matrix, частота опроса\r\n                    интерфейса – 8000 Гц, заменяемые переключатели ROG NX или Cherry MX, металлические мультимедийные клавиши, отсоединяемая\r\n                    подставка под запястья со светорассеивателем.</p>\r\n                <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/S3k9r9tExaY?enablejsapi=1&amp;origin=https%3A%2F%2Fshop.kz\" title=\"ROG Strix Flare II Animate | Fully Loaded Flare | ROG\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen=\"\" data-gtm-yt-inspected-2255351_460=\"true\" id=\"147621963\" data-gtm-yt-inspected-11=\"true\"></iframe>', '[\"1.jpg\",\"2.jpg\",\"3.jpg\",\"4.jpg\",\"5.jpg\"]', 1),
(6, 'Товар 5', '2.jpg', 10000, 'Тип клавиатуры: Мультимедия, Игровая\r\nТип клавиш: Механические\r\nТип переключателей: ROG NX Red (Linear)', '[{\"name\":\"Производитель\",\"value\":\"ASUS\"},{\"name\":\"Модель\",\"value\":\"ROG Strix Flare II Animate\"},{\"name\":\"Тип\",\"value\":\"Клавиатура\"},{\"name\":\"Тип клавиатуры\",\"value\":\"Подробнее Мультимедия, Игровая\"}]', '                <p>ROG Strix Flare II Animate</p>\r\n                <p>Игровая механическая клавиатура ROG Strix Flare II Animate: встроенный матричный дисплей AniMe Matrix, частота опроса\r\n                    интерфейса – 8000 Гц, заменяемые переключатели ROG NX или Cherry MX, металлические мультимедийные клавиши, отсоединяемая\r\n                    подставка под запястья со светорассеивателем.</p>\r\n                <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/S3k9r9tExaY?enablejsapi=1&amp;origin=https%3A%2F%2Fshop.kz\" title=\"ROG Strix Flare II Animate | Fully Loaded Flare | ROG\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen=\"\" data-gtm-yt-inspected-2255351_460=\"true\" id=\"147621963\" data-gtm-yt-inspected-11=\"true\"></iframe>', '[\"2.jpg\",\"3.jpg\",\"4.jpg\"]', 4),
(7, 'Товар 6', '5.jpg', 32100, 'Тип клавиатуры: Мультимедия, Игровая\r\nТип клавиш: Механические\r\nТип переключателей: ROG NX Red (Linear)\r\nХод клавиши, мм: 4\r\nТип подключения: Проводной', '[{\"name\":\"UID товара\",\"value\":\"90MP02E6-BKRA00\"},{\"name\":\"Производитель\",\"value\":\"ASUS\"},{\"name\":\"Модель\",\"value\":\"ROG Strix Flare II Animate\"},{\"name\":\"Тип\",\"value\":\"Клавиатура\"}]', '                <p>ROG Strix Flare II Animate</p>\r\n                <p>Игровая механическая клавиатура ROG Strix Flare II Animate: встроенный матричный дисплей AniMe Matrix, частота опроса\r\n                    интерфейса – 8000 Гц, заменяемые переключатели ROG NX или Cherry MX, металлические мультимедийные клавиши, отсоединяемая\r\n                    подставка под запястья со светорассеивателем.</p>\r\n                <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/S3k9r9tExaY?enablejsapi=1&amp;origin=https%3A%2F%2Fshop.kz\" title=\"ROG Strix Flare II Animate | Fully Loaded Flare | ROG\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen=\"\" data-gtm-yt-inspected-2255351_460=\"true\" id=\"147621963\" data-gtm-yt-inspected-11=\"true\"></iframe>', '[\"1.jpg\",\"2.jpg\",\"3.jpg\",\"4.jpg\",\"5.jpg\"]', 4),
(9, 'ТОП ТОВАР МИРА', '8_Снимок экрана 2023-03-15 002527.jpg', 125000, 'Этот товар просто супер\r\nОчень удобный в использовании', '[{\"name\":\"Строение\",\"value\":\"Закрытый\"},{\"name\":\"Что то важное\",\"value\":\"Да\"},{\"name\":\"ТЕСТ\",\"value\":\" ТЕСТ\"}]', '<b>Топ товар</b> <u>потому чт</u>о <font color=\"#ff0000\"><b>я</b></font> <b>так сказал</b>', '[\"8_cat.jpg\",\"8_tree.jpg\"]', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `Id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Content` text NOT NULL,
  `Comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`Id`, `User_id`, `Date`, `Content`, `Comment`) VALUES
(1, 1, '2023-04-28', '{\"1\":1}', 'Что то тут надо писать, я хз что, но я пишу это что то'),
(2, 1, '2023-04-28', '{\"2\":1,\"3\":1}', ''),
(3, 1, '2023-04-30', '{\"8\":1}', '');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `Id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Good_id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Text` text NOT NULL,
  `Rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`Id`, `User_id`, `Good_id`, `Date`, `Text`, `Rate`) VALUES
(4, 1, 1, '2023-04-28', 'asdasdasd', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Login` text NOT NULL,
  `Password` text NOT NULL,
  `Phone` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`Id`, `Name`, `Login`, `Password`, `Phone`) VALUES
(1, 'George', 'dude@mail.ru', '$2y$10$XeT3Hz.9c9GHCNBR4mdDp.WVu6Zi/4iHTXxJf03bwY/J6WNn3PTCa', NULL),
(2, 'Иван', 'ivan2001@gmail.com', '$2y$10$ddePqjGVXiYVw5xi5lMt9OXQWVnq0nj./AUSkjP2AFL8QO18/zCnS', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Category_id` (`Category_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `orders_ibfk_1` (`User_id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `User_id` (`User_id`),
  ADD KEY `Good_id` (`Good_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_ibfk_1` FOREIGN KEY (`Category_id`) REFERENCES `categories` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`Good_id`) REFERENCES `goods` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

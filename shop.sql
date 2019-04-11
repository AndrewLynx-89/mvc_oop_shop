-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 11 2019 г., 18:53
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Структура таблицы `attribute_group`
--

CREATE TABLE `attribute_group` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `attribute_group`
--

INSERT INTO `attribute_group` (`id`, `title`) VALUES
(1, 'Механизм'),
(2, 'Стекло'),
(3, 'Ремешок'),
(4, 'Корпус'),
(5, 'Индикация');

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_product`
--

CREATE TABLE `attribute_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `attr_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `attribute_product`
--

INSERT INTO `attribute_product` (`id`, `attr_id`, `product_id`) VALUES
(6, 2, 12),
(7, 5, 12),
(8, 10, 12),
(9, 13, 12),
(10, 19, 12);

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_value`
--

CREATE TABLE `attribute_value` (
  `id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  `attr_group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `attribute_value`
--

INSERT INTO `attribute_value` (`id`, `value`, `attr_group_id`) VALUES
(1, 'Механика с автоподзаводом', 1),
(2, 'Механика с ручным заводом', 1),
(3, 'Кварцевый от батарейки', 1),
(4, 'Кварцевый от солнечного аккумулятора', 1),
(5, 'Сапфировое', 2),
(6, 'Минеральное', 2),
(7, 'Полимерное', 2),
(8, 'Стальной', 3),
(9, 'Кожаный', 3),
(10, 'Каучуковый', 3),
(11, 'Полимерный', 3),
(12, 'Нержавеющая сталь', 4),
(13, 'Титановый сплав', 4),
(14, 'Латунь', 4),
(15, 'Полимер', 4),
(16, 'Керамика', 4),
(17, 'Алюминий', 4),
(18, 'Аналоговые', 5),
(19, 'Цифровые', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`, `alias`, `parent_id`) VALUES
(1, 'Смартфоны', 'smartfony', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `product_id`, `img`) VALUES
(1, '1', 'QlD9ZFQnGcMPbz0RtVOtCcstm4ZzcE2a.jpg'),
(2, '1', 'QRtD3fjmWRjkP5ESU2n97JFox0YTfXDn.jpg'),
(3, '1', 'lDktw65oaiBI5MSap9zNDXNU7dx9r0sv.jpg'),
(4, '1', 'PHkTzjBjjk6yUAF9I9y42kZb23cVfBOh.jpg'),
(5, '1', 'RObHQ2KfpJMoRRWvWt7OShtOaaAWTmDF.jpg'),
(6, '1', 'QxMZEyfyMsI7RhQ4b1pNf9ihzzASrms4.jpg'),
(7, '1', 'i6WPnEdyq4zoDRnbip1nNKcvTSQ7azON.jpg'),
(8, '1', 'PGfP3IiHh5TqynN8fuq8a6Yiz8zTCzdT.jpg'),
(9, '3', 'l8eAyjOapBtnvKaPiFiwSf0Aog34XQ3p.jpg'),
(10, '3', 'sYLc0pxJhZC7hg3lizMVuBaytc1Mfkzg.jpg'),
(11, '3', 'tprRxw74lEbHYbyuZXl3hanKZkBeTfzo.jpg'),
(12, '3', 'Fekx4cUcrhvfxnf8VVy7WWcxeKCmJ42d.jpg'),
(13, '3', 'YVrNcygodqn52sJdssy4tbnrlY5csqu8.jpg'),
(14, '3', '6bvMW5fsMW3Hi0hlEsj46jNkSmxH0U8L.jpg'),
(15, '3', 'Dtwlt87TA0UVTRCa3XV6S7pCCyMP0x0e.jpg'),
(16, '4', 'tQOtIbN2JROFzo6ojb8jiHpIUTqyl7m8.jpg'),
(17, '4', 'tWqZMuozR8G2PChBxU9CQ8FVe8IkfUjx.jpg'),
(18, '4', '4NPD954aOemOQ09gVakuRsuLqmvGJzFI.jpg'),
(19, '4', 'r19eec6TdxeUIMR7EYazch7c7DtS5ffF.jpg'),
(20, '4', '9K7BcHoMybomHw3m1z4hSRYQMNziFPq0.jpg'),
(21, '4', 'oM3Ac9XtjRS4uSHEXT9wzs7RP6xyZCGX.jpg'),
(43, '11', 'wfKOtTkDHHtF9d1PCBy8qst1DtmJkcvD.jpg'),
(44, '11', 'aKDUQD924f9v58TThdO9ygrDRUnt9rA3.jpg'),
(45, '11', 'JfrgjkLtup5AkKzrcki3g2tQ9wsYL21J.jpg'),
(46, '11', 'EUq64lh0EWEV0zn3Z5egyBPiEeseGNKX.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `main_slider`
--

CREATE TABLE `main_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'no-slider-image.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `main_slider`
--

INSERT INTO `main_slider` (`id`, `title`, `subtitle`, `price`, `image`) VALUES
(1, 'Как слить средства в один акк?', 'asdasd', 150, 'af5f354dd91b9ac3d626b2d9c3985620.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `modifications`
--

CREATE TABLE `modifications` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `modifications`
--

INSERT INTO `modifications` (`id`, `product_id`, `title`, `price`) VALUES
(1, 8, 'Черный', 350),
(2, 8, 'Red', 9000);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `date_create` timestamp NOT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `single_image` varchar(255) NOT NULL DEFAULT 'no-image.png',
  `price` float NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `hit` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `alias`, `content`, `single_image`, `price`, `category_id`, `status`, `hit`) VALUES
(8, 'Как слить средства в один акк?', 'kak-slit-sredstva-v-odin-akk', '<p>wwqeqweqwe</p>\r\n', 'no-image.png', 150, 1, '0', '0'),
(10, 'Как слить средства в один акк?', 'kak-slit-sredstva-v-odin-akk-10', '<p>asdasdasdasd</p>\r\n', 'no-image.png', 150, 1, '0', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'avtar.jpg',
  `role` enum('user','admin') NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `fio`, `address`, `phone`, `email`, `avatar`, `role`, `status`, `token`) VALUES
(1, 'GTank', '$2y$10$B.2V9NAqva3dHBPSu2frKuCPtVPzleFCVdQy0XaFTqUqtW8iR3cS6', 'Андрей Рысь', NULL, '4554456566', 'user@mail.ru', 'avtar.jpg', 'admin', '1', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `attribute_group`
--
ALTER TABLE `attribute_group`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `attribute_product`
--
ALTER TABLE `attribute_product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attr_group_id` (`attr_group_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `main_slider`
--
ALTER TABLE `main_slider`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `modifications`
--
ALTER TABLE `modifications`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `attribute_group`
--
ALTER TABLE `attribute_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `attribute_product`
--
ALTER TABLE `attribute_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `attribute_value`
--
ALTER TABLE `attribute_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT для таблицы `main_slider`
--
ALTER TABLE `main_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `modifications`
--
ALTER TABLE `modifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD CONSTRAINT `attribute_value_ibfk_1` FOREIGN KEY (`attr_group_id`) REFERENCES `attribute_group` (`id`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

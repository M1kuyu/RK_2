-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 01 2024 г., 11:50
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(6, 1, 1, 1),
(7, 1, 1, 1),
(8, 1, 1, 1),
(9, 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `features` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`, `quantity`, `features`) VALUES
(1, 'Палатка для кемпинга', 'Просторная трехместная палатка с водонепроницаемой пропиткой и защитой от ветра. Идеально подходит для отдыха на природе в любую погоду.', 'tent.jpg', 5000.00, 10, 'Водонепроницаемая, Защита от ветра, Просторная'),
(2, 'Туристический рюкзак 50L', 'Легкий и прочный рюкзак с объёмом 50 литров, множеством карманов и отделений, удобной спинкой и регулируемыми ремнями для длительных походов.', 'backpack.jpg', 3200.00, 15, 'Объём 50L, Множественные карманы, Удобная спинка, Регулируемые ремни'),
(3, 'Спальный мешок для экстремальных условий', 'Теплый спальный мешок, выдерживающий температуры до -10°C. Влагозащищенный и легкий, он идеально подходит для холодных ночей на природе.', 'sleeping_bag.jpg', 2700.00, 12, 'Выдерживает до -10°C, Влагозащищенный, Легкий'),
(4, 'Портативная газовая плита', 'Компактная газовая плита, легко помещается в рюкзак. Работает на стандартных газовых баллонах и позволяет готовить на открытом воздухе.', 'camping_stove.jpg', 1500.00, 20, 'Компактная, Работает на стандартных баллонах, Легкая в использовании'),
(5, 'Набор походной посуды', 'Легкий и прочный набор алюминиевой посуды, включающий кастрюлю, сковороду, чашки и столовые приборы. Компактно складывается для удобства в транспортировке.', 'cookware_set.jpg', 800.00, 25, 'Алюминиевый, Компактный, Легкий и прочный'),
(6, 'Фонарь налобный водонепроницаемый', 'Удобный и мощный налобный фонарь с регулируемым светом и влагозащитой. Работает до 20 часов на одной зарядке, подходит для ночных походов и кемпинга.', 'headlamp.jpg', 1200.00, 30, 'Регулируемый свет, Водонепроницаемый, Длительное время работы'),
(7, 'Портативное зарядное устройство (солнечная батарея)', 'Портативная солнечная батарея, позволяющая заряжать смартфоны, камеры и другие устройства в условиях удаленности от сети.', 'solar_charger.jpg', 2500.00, 8, 'Портативное, Зарядка от солнца, Подходит для разных устройств'),
(8, 'Фильтр для воды', 'Компактный и надежный фильтр для очистки воды из природных источников. Идеально подходит для многодневных походов и кемпинга.', 'water_filter.jpg', 1400.00, 18, 'Компактный, Надежный, Подходит для многодневных походов');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'ADMIN', 'ADMIN@mail.com', '$2y$10$thoB.iE4QpI2p5ygs3E01e2JOWc.KlIcwWhbK8Wy4xNBtYN3rB84a', '2024-11-01 08:49:13');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 23 2023 г., 21:06
-- Версия сервера: 5.7.33-log
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `toy_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `assort`
--

CREATE TABLE `assort` (
  `id` int(11) NOT NULL,
  `model_ru` varchar(128) NOT NULL,
  `price` decimal(65,0) NOT NULL,
  `fulldescription_ru` text NOT NULL,
  `id_type` varchar(32) NOT NULL,
  `index_tovar` text,
  `colichestvo` int(11) DEFAULT NULL,
  `popularity` int(11) DEFAULT '0',
  `old_price` decimal(10,0) DEFAULT '0',
  `rate` int(11) NOT NULL DEFAULT '0',
  `details_count` int(11) DEFAULT '0',
  `product_data` datetime DEFAULT CURRENT_TIMESTAMP,
  `color_id` int(11) DEFAULT NULL,
  `usa_outlet` int(11) NOT NULL DEFAULT '0',
  `euro_outlet` int(11) NOT NULL DEFAULT '0',
  `dep` varchar(128) DEFAULT NULL,
  `rate_prod` int(11) DEFAULT NULL,
  `size` text,
  `split_in` text,
  `brand` int(11) DEFAULT NULL,
  `gender` int(11) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `assort`
--

INSERT INTO `assort` (`id`, `model_ru`, `price`, `fulldescription_ru`, `id_type`, `index_tovar`, `colichestvo`, `popularity`, `old_price`, `rate`, `details_count`, `product_data`, `color_id`, `usa_outlet`, `euro_outlet`, `dep`, `rate_prod`, `size`, `split_in`, `brand`, `gender`) VALUES
(217, 'Reebok', '5000', 'Большое количество хлопка придаёт футболке лёгкости и комфорта а эластан придаст мягкости и эластичности.  \r\nБлагодаря чему футболка отлично садиться по фигуре. \r\n\r\nДля нанесения рисунка мы используем высококачественные материалы, которые способствуют тому что изображение не отрывается, не трескается, не выгорает и не меняет цвет даже спустя 50-60 стирок! Не требует особенного ухода! \r\nСтирать при температуре не выше 40С. Этого достаточно для того, что бы футболка радовала Вас долгие годы!\r\n\r\nОсобенности :\r\n\r\nДвойной кант горловины  \r\nМягкая и приятная к телу\r\nКруглый ворот мужские футболки', '15', 'ппрпр', 42, 0, '0', 104, 1, '2022-11-29 23:06:10', 0, 1, 0, '555.000', 99, NULL, NULL, 5, 1),
(218, 'Signature C-Fiber', '10000', 'Большое количество хлопка придаёт футболке лёгкости и комфорта а эластан придаст мягкости и эластичности.  \r\nБлагодаря чему футболка отлично садиться по фигуре. \r\n\r\nДля нанесения рисунка мы используем высококачественные материалы, которые способствуют тому что изображение не отрывается, не трескается, не выгорает и не меняет цвет даже спустя 50-60 стирок! Не требует особенного ухода! \r\nСтирать при температуре не выше 40С. Этого достаточно для того, что бы футболка радовала Вас долгие годы!\r\n\r\nОсобенности :\r\n\r\nДвойной кант горловины  \r\nМягкая и приятная к телу\r\nКруглый ворот мужские футболки', '15', 'ппрпр', 422, 0, '13000', 29, 1, '2022-11-29 23:26:35', 0, 1, 0, '555.000', 99, NULL, NULL, 5, 1),
(219, 'Pangania', '9000', 'Свободная белая футболка из осенне-зимней коллекции создана с заботой не только о комфорте, но и об окружающей среде. Для пошива модели выбрали дышащее джерси из органического хлопка и волокон морских водорослей. Такая технология позволила использовать меньше растительного сырья и снизить вредное воздействие на почву. Материал пропитали маслом перечной мяты, благодаря антибактериальным свойствам которого можно будет сократить количество стирок, а значит, расход воды, электричества и времени.', '15', 'ASAsa', 11, 0, '9900', 69, 1, '2022-11-30 00:18:46', 0, 1, 0, '111', 111, 'xl', NULL, 6, 1),
(220, 'Платье Ноу нейм', '2000', 'Описание товара', '11', 'івіфв', 22, 0, '0', 25, 1, '2022-12-01 00:11:21', 0, 1, 1, '131313', 33, NULL, NULL, 6, 2),
(221, 'Куртка утепленная \"Ивита\"', '12000', 'Стильная и комфортная в носке утеплённая куртка отлично сохраняет тепло и защищает от холодного ветра в зимнее время.\r\nУтеплитель искусственный.\r\nПояс идёт в комплекте.\r\n', '10', 'bcsss', 11, 0, '0', 56, 1, '2022-12-09 15:20:03', 0, 1, 0, '11', 11, 'xs', NULL, 7, 2),
(222, 'Мужская футболка 365 Seasonal', '4990', 'Материал: 100% хлопок<br>\r\nСтрана-производитель: Португалия<br>\r\nРасслабленный крой<br>\r\nАнтибактериальное покрытие PPRMINT<br>\r\nЛаконичный брендинг<br>', '15', 'sss', 11, 0, '0', 149, 1, '2022-12-09 15:22:24', 0, 0, 1, '1', 1, 'xs,s,m,l,xl', '217,219', 7, 3),
(224, 'Кроссовки Lowa Zephyr Хаки', '14000', 'Усиленный подносок и задник из термопластического материала в тактических ботинках обеспечит защиту от травм, что очень важно в условиях эксплуатации военной обуви. Современный метод крепления подошвы путем прямого прилива является на сегодняшний день самым надежным в производстве обуви.', '6', 'LWZF-0000000', 2, 0, '0', 27, 0, '2022-12-22 03:42:10', NULL, 0, 0, NULL, NULL, '43,44', '225,224', 10, 1),
(225, 'Кроссовки 5.11 Tactical A/T ', '7000', 'Усиленный подносок и задник из термопластического материала в тактических ботинках обеспечит защиту от травм, что очень важно в условиях эксплуатации военной обуви. Современный метод крепления подошвы путем прямого прилива является на сегодняшний день самым надежным в производстве обуви.', '6', 'ОООООО', 222, 0, '0', 28, 0, '2022-12-22 03:48:48', NULL, 0, 0, NULL, NULL, '40.5,41,42,42.5,44', '225,224', 12, 1),
(227, 'Кроссовки 5.11 Tactical Range Master', '12500', 'Женские тактические кроссовки 5.11 Tactical Range Master Wp 12309-067 39 (US6.5) см Gunsmoke (844802351294)', '6', 'ЫВА', 21, 0, '0', 16, 0, '2022-12-22 03:53:35', NULL, 0, 0, NULL, NULL, '40.5,41,42', '', 12, 2),
(229, 'Lowa 1221', '3600', 'Лова кроссовки', '6', '213123', 22, 0, '5000', 19, 0, '2022-12-24 00:04:10', NULL, 0, 0, NULL, NULL, 'm', '225,224', 5, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `attributes`
--

CREATE TABLE `attributes` (
  `id` int(11) NOT NULL,
  `id_category` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'all',
  `type` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `attributes`
--

INSERT INTO `attributes` (`id`, `id_category`, `type`) VALUES
(1, 'all', 'Цвет'),
(2, 'all', 'Производитель'),
(3, '6', 'Страна'),
(4, '6', 'Тест');

-- --------------------------------------------------------

--
-- Структура таблицы `attributes_val`
--

CREATE TABLE `attributes_val` (
  `id` int(11) NOT NULL,
  `id_attr` int(11) NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `attributes_val`
--

INSERT INTO `attributes_val` (`id`, `id_attr`, `value`, `id_item`) VALUES
(1, 1, 'Синий', 217),
(3, 1, 'Голубой', 222),
(4, 1, 'Голубой', 221),
(7, 1, 'Хаки', 224),
(8, 2, 'Латвия', 224),
(9, 1, 'Черный', 225),
(10, 2, 'США', 225),
(11, 1, 'Черный', 226),
(12, 2, 'США', 226),
(56, 1, 'Черный', 228),
(57, 2, 'Китай', 228),
(58, 3, 'Япония', 228),
(59, 1, 'Серый/Красный', 227),
(60, 2, 'США', 227),
(61, 3, 'Япония', 227),
(65, 1, 'Оранжевый', 229),
(66, 2, 'Латвия', 229),
(67, 3, 'Япония', 229);

-- --------------------------------------------------------

--
-- Структура таблицы `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `banner`
--

INSERT INTO `banner` (`id`, `photo`, `url`, `date_add`) VALUES
(1, '1671835357sadsad.jpg', '/productinfo/225', '2022-12-24 02:25:50');

-- --------------------------------------------------------

--
-- Структура таблицы `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `author` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fulldescription` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `blog`
--

INSERT INTO `blog` (`id`, `author`, `data_create`, `photo`, `fulldescription`, `title`) VALUES
(3, 'Дед Мороз', '2022-12-23 15:39:17', '1671802757slide-1.jpg', '<div><h5 style=\"outline: none; margin-bottom: 10px; line-height: 1.2; font-size: 16px; font-family: Poppins, sans-serif; color: rgb(42, 60, 79); background-color: rgb(245, 244, 239);\"><b><h1>Sign up for our newsletter</h1></b></h5><h3>\r\nAdd your email address to sign up for our monthly emails and to receive promotional offers.</h3><div><i style=\"outline: none;\"><b></b></i></div></div>', 'Страница не найдена'),
(4, 'Дед Мороз', '2022-12-23 15:41:18', '1671802878blog-img3.jpg', '<div><h5 style=\"outline: none; margin-bottom: 10px; line-height: 1.2; font-size: 16px; font-family: Poppins, sans-serif; color: rgb(42, 60, 79); background-color: rgb(245, 244, 239);\"><b><h1>Sign up for our newsletter</h1><div><table class=\"table-1\"><tbody><tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr><tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr><tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr><tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr><tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr><tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr><tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr><tr><td> </td><td> </td><td>йцйц</td><td> </td><td>ц </td><td> </td><td>й </td><td> </td><td> </td><td> </td><td> </td></tr><tr><td> </td><td> </td><td> </td><td> </td><td>йц</td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr><tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr><tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr></tbody></table><br></div></b></h5><h3>\r\nAdd your email address to sign up for our monthly emails and to receive promotional offers.</h3><div><i style=\"outline: none;\"><b></b></i></div></div>', 'Страница не найдена'),
(5, 'Карлсон', '2022-12-23 23:04:24', '1671829464huy-be-by-huy-be-giovanni-the-santa-merry-christmas-and-happ.jpg', '<div><h3>Описание поста</h3><div>Текст какой-то</div></div><div><br></div>', 'Новый год ИДет');

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `pay_type` int(11) NOT NULL DEFAULT '1',
  `fulldescription` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`id`, `name`, `adress`, `phone`, `city`, `zip`, `mail`, `id_user`, `pay_type`, `fulldescription`) VALUES
(41, 'Мексиканец Тако', 'Ул.Придумана 3а', '899999999', 'Денвер', '1212', 'mexicano_admin@gmail.com', 1, 1, 'Text'),
(42, 'Тако Тако', 'Ул.Придумана 3а', '899999999', 'Денвер', '111121', 'mexicano_admin@gmail.com', 1, 1, '');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fulldescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_item` int(11) NOT NULL DEFAULT '0',
  `reply` text COLLATE utf8mb4_unicode_ci,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `name`, `fulldescription`, `date_create`, `id_item`, `reply`, `id_user`) VALUES
(21, 'Игорь Панасенко', 'Отличная футболка!!', '2022-12-21 17:28:45', 217, 'Стараемся', 0),
(22, 'Максим', 'Беру постоянно', '2022-12-25 12:28:45', 217, 'Спасибо вам за поддержку', 0),
(23, 'Мексиканец Тако', 'dsasd', '2022-12-21 18:43:29', 219, NULL, 1),
(24, 'Мексиканец Тако', 'wwasddsadsa', '2022-12-21 18:44:14', 222, NULL, 1),
(25, 'Мексиканец Тако', 'xczxczcxz', '2022-12-21 18:46:15', 222, NULL, 1),
(26, 'Мексиканец Тако', 'Крутые кроссовки', '2022-12-22 03:54:52', 227, NULL, 1),
(27, 'Мексиканец Тако', 'qwqw', '2022-12-22 04:48:49', 225, NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `community`
--

CREATE TABLE `community` (
  `id` int(11) NOT NULL,
  `telegram` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fulldescription` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int(11) NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_1` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_2` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `map_link` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `contact_info`
--

INSERT INTO `contact_info` (`id`, `email`, `phone_1`, `phone_2`, `adress`, `map_link`) VALUES
(1, 'leoray@gmail.com', 'phone 122', '21312321', 'adress', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3748.1812836849363!2d144.95343106869794!3d-37.81739907631358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4dd5a05d97%3A0x3e64f855a564844d!2s121+King+St%2C+Melbourne+VIC+3000%2C+Australia!5e0!3m2!1sen!2sin!4v1562916623921!5m2!1sen!2sin');

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name_ru` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_man` int(11) NOT NULL DEFAULT '0',
  `is_woman` int(11) NOT NULL DEFAULT '0',
  `is_accessorize` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`id`, `name_ru`, `is_man`, `is_woman`, `is_accessorize`) VALUES
(5, 'Rebook', 0, 0, 0),
(7, 'C.P Company', 0, 0, 0),
(10, 'Lowa', 0, 0, 0),
(12, '5.11', 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `equaring`
--

CREATE TABLE `equaring` (
  `id` int(11) NOT NULL,
  `login` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `equaring`
--

INSERT INTO `equaring` (`id`, `login`, `pass`) VALUES
(1, 'Логин екваринга12', 'Пароль екваринга');

-- --------------------------------------------------------

--
-- Структура таблицы `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `title_en` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ru` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_sp` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fulldescription_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fulldescription_ru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fulldescription_sp` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `name` varchar(228) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_news` varchar(28) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `info_data`
--

CREATE TABLE `info_data` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fulldescription_ru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `page` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'main'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `info_data`
--

INSERT INTO `info_data` (`id`, `name`, `fulldescription_ru`, `page`) VALUES
(20, 'valute', 'P', 'all-pages');

-- --------------------------------------------------------

--
-- Структура таблицы `lang_var`
--

CREATE TABLE `lang_var` (
  `id` int(11) NOT NULL,
  `slug` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_val` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lang_var`
--

INSERT INTO `lang_var` (`id`, `slug`, `text_val`) VALUES
(1, 'menu_home', 'Главная'),
(2, 'man', 'Мужское'),
(3, 'woman', 'Женское'),
(4, 'access', 'Аксессуары'),
(5, 'blog', 'Блог'),
(6, 'info', 'Информация'),
(7, 'contacts', 'Контакты'),
(8, 'about', 'О нас'),
(9, 'delivery', 'Доставка'),
(10, 'payment_back', 'Оплата и возврат'),
(11, 'profile', 'Профиль'),
(12, 'login', 'Войти в аккаунт'),
(13, 'registration', 'Зарегестрироватся'),
(14, 'settings', 'Настройки'),
(15, 'orders', 'Заказы'),
(16, 'wishlist', 'Список желаемого'),
(17, 'sign-out', 'Выйти'),
(18, 'clothes_and_foots', 'Обувь и одежда'),
(19, 'man_access', 'МУЖСКИЕ АКСЕССУАРЫ'),
(20, 'woman_access', 'ЖЕНСКИЕ АКСЕССУАРЫ'),
(21, 'privacy', 'Политика конфиденциальности'),
(22, 'newest', 'НОВИНКИ'),
(23, 'top_view', 'ЧАСТО ПРОСМАТРИВАЮТ'),
(24, 'last_news', 'ПОСЛЕДНИЕ НОВОСТИ'),
(25, 'footer_text', '© Leoray все права торговой марки защищены');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `page` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fulldescription` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `page`, `fulldescription`, `page_name`) VALUES
(2, 'about', '<span style=\"font-size: 16px;\"><h1 style=\"\"><span style=\"font-size: 12.96px; background-color: rgb(42, 46, 63);\"><b style=\"color: rgb(255, 0, 0);\"></b><h1 style=\"color: rgb(255, 0, 0);\"><b>ЛеоРай ТОП</b></h1><h3><font color=\"#0000ff\">\r\nкакойто текст</font></h3><div style=\"\"><b style=\"\"><font color=\"#0000ff\"></font></b></div></span></h1></span>', 'О нас'),
(3, 'terms_and_cond', 'Страница вип', 'Политика конфиденциальности'),
(4, 'delivery', 'Доставка', 'Доставка'),
(5, 'pay_and_rev', 'Оплата и возв', 'Оплата и возв');

-- --------------------------------------------------------

--
-- Структура таблицы `page_setting`
--

CREATE TABLE `page_setting` (
  `id` int(11) NOT NULL,
  `page_slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title_ru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_decription_ru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords_ru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ru` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Страница'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `page_setting`
--

INSERT INTO `page_setting` (`id`, `page_slug`, `meta_title_ru`, `meta_decription_ru`, `meta_keywords_ru`, `title_ru`) VALUES
(1, 'main', 'Главная страница', 'qwqw', 'wqwq', 'Главная страницаqw'),
(2, 'catalog', 'Каталог товаров', 'Каталог товаров', 'Каталог товаров', 'Каталог товаров'),
(3, 'about', 'About', 'About', 'About', 'О нас'),
(4, 'product_info', '', '', '', 'g'),
(5, 'contact', 'выф', 'ывф', 'выфыавы', 'Контакты'),
(6, 'order', 'Заказ', 'Заказ', 'Заказ', 'Заказ'),
(7, 'basced', 'Корзина', 'Корзина', 'Корзина', 'Корзина'),
(8, 'privacy', 'Политика конф', 'Политика конф', 'Политика конф', 'Политика конф'),
(9, 'delivery', 'доставка', 'Политика конф', 'Политика конф', 'Политика конф'),
(10, 'wishlist', 'Политика конф', 'Политика конф', 'Политика конф', 'Политика конф'),
(11, 'orders', 'Заказы', 'Заказ', 'Заказ', 'Заказы'),
(12, 'profile', 'Профиль', 'Заказ', 'Заказ', 'Заказ'),
(13, 'registration', 'Профиль', 'Заказ', 'Заказ', 'Заказ'),
(14, 'login', 'Профиль', 'Заказ', 'Заказ', 'Заказ');

-- --------------------------------------------------------

--
-- Структура таблицы `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `id_tovar` int(11) NOT NULL,
  `main` int(11) NOT NULL,
  `name_photo` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `photo`
--

INSERT INTO `photo` (`id`, `id_tovar`, `main`, `name_photo`) VALUES
(1032, 0, 1, '1667515630IMG_20221104_004328_874.jpg'),
(1033, 217, 1, '1669755970446878589_w640_h640_cholovicha-futbolka-reebok.webp'),
(1034, 218, 1, '1669757195226650023.jpg'),
(1035, 219, 1, '1669760326futbolka-pangaia-photo-d437.jpg'),
(1036, 220, 1, '1669846281product-2.jpg'),
(1037, 220, 0, '1669846281vector-displayads-1.png'),
(1038, 220, 0, '1669846281vuejs.png'),
(1039, 221, 1, '167059200342494c387a0bf0de51bd27f6361eb330.webp'),
(1040, 221, 0, '1670592003d065078cc59de2a326799e73f67bb5b4.webp'),
(1041, 221, 0, '1670592003d459e453a34d15f056dd2ce22434f228.webp'),
(1042, 222, 1, '1670592144365js-octs-bhb-0.jpg'),
(1043, 0, 1, '1671496396IMG_8842.PNG'),
(1044, 0, 1, 'no_photo.jpg'),
(1045, 0, 1, 'no_photo.jpg'),
(1046, 0, 1, 'no_photo.jpg'),
(1047, 0, 1, 'no_photo.jpg'),
(1048, 0, 1, 'no_photo.jpg'),
(1049, 0, 1, 'no_photo.jpg'),
(1050, 0, 1, 'no_photo.jpg'),
(1051, 0, 1, 'no_photo.jpg'),
(1052, 0, 1, '16715596015a35564ee96ec6.3153199215134449429562.png'),
(1053, 0, 1, '16715596365a35564ee96ec6.3153199215134449429562.png'),
(1054, 0, 1, '16715596695a35564ee96ec6.3153199215134449429562.png'),
(1055, 0, 1, '16715596815a35564ee96ec6.3153199215134449429562.png'),
(1056, 0, 1, '16715598205a35564ee96ec6.3153199215134449429562.png'),
(1057, 0, 1, '16715598425a35564ee96ec6.3153199215134449429562.png'),
(1058, 0, 1, '16715599475a35564ee96ec6.3153199215134449429562.png'),
(1059, 0, 1, '16715603115a35564ee96ec6.3153199215134449429562.png'),
(1060, 0, 1, '16715603295a35564ee96ec6.3153199215134449429562.png'),
(1061, 0, 1, '16715603565a35564ee96ec6.3153199215134449429562.png'),
(1062, 0, 1, '16715603765a35564ee96ec6.3153199215134449429562.png'),
(1063, 0, 1, '16715603885a35564ee96ec6.3153199215134449429562.png'),
(1064, 0, 1, '16715604115a35564ee96ec6.3153199215134449429562.png'),
(1065, 0, 1, '16715604285a35564ee96ec6.3153199215134449429562.png'),
(1066, 0, 1, '16715604295a35564ee96ec6.3153199215134449429562.png'),
(1067, 0, 1, '1671560455kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1068, 0, 1, '1671560471kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1069, 0, 1, '1671560496kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1070, 0, 1, '1671560519kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1071, 0, 1, '1671560531kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1072, 0, 1, '1671560541kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1073, 0, 1, '1671560599kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1074, 0, 1, '1671560664kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1075, 0, 1, '1671560693bpI3VCHP2kELjfo1M4c473JfekDmoo9NuuDQYStM.jpg'),
(1076, 0, 1, '1671560725bpI3VCHP2kELjfo1M4c473JfekDmoo9NuuDQYStM.jpg'),
(1077, 0, 1, '1671560749kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1078, 0, 1, '1671560791kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1079, 0, 1, '1671560812kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1080, 0, 1, '1671560818kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1081, 0, 1, '1671560844kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1082, 0, 1, '1671560863kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1083, 0, 1, '1671560932kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1084, 0, 1, '1671561022kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1085, 0, 1, '1671561040kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1086, 0, 1, '1671561136kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1087, 0, 1, '1671561137kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1088, 0, 1, '1671561161kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1089, 0, 1, '1671561163kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1090, 0, 1, '1671561164kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1091, 0, 1, '1671561165kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1092, 0, 1, '1671561165kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1093, 0, 1, '1671561165kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1094, 0, 1, '1671561165kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1095, 0, 1, '1671561165kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1096, 0, 1, '1671561165kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1097, 0, 1, '1671561166kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1098, 0, 1, '1671561166kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1099, 0, 1, '1671561166kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1100, 0, 1, '1671561166kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1101, 0, 1, '1671561166kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1102, 0, 1, '1671561608kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1103, 0, 1, '1671561630kisspng-knowledge-internet-area-network-cooperative-loan-i-digital-network-5b1ab7cc1f7e10.525996421528477644129.png'),
(1108, 224, 1, '1671673330282394405.jpg'),
(1109, 224, 0, '1671673330282394437.jpg'),
(1110, 224, 0, '1671673330282394425.jpg'),
(1111, 224, 0, '1671673330282394415.jpg'),
(1112, 225, 1, '1671673728282695665.jpg'),
(1113, 225, 0, '1671673728282695676.jpg'),
(1114, 225, 0, '1671673728282695668.jpg'),
(1115, 226, 1, '1671673802282695665.jpg'),
(1116, 226, 0, '1671673802282695676.jpg'),
(1117, 226, 0, '1671673802282695668.jpg'),
(1118, 227, 1, '1671674015294746262.jpg'),
(1119, 227, 0, '1671674015294746272.jpg'),
(1120, 227, 0, '1671674015294746269.jpg'),
(1125, 228, 0, '1671830346282394293.jpg'),
(1127, 229, 0, '1671833050Novelicious on Twitter.jfif'),
(1129, 229, 1, '1674484505betheme-26_1-nulled-full-demos-responsive-multipurpose-wordpress-theme.webp'),
(1130, 228, 0, '1674485487corptrain-3_3_8-nulled-corporate-training-wordpress-theme.webp');

-- --------------------------------------------------------

--
-- Структура таблицы `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `f_name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(18) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` text COLLATE utf8mb4_unicode_ci,
  `adress` text COLLATE utf8mb4_unicode_ci,
  `zip` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `profiles`
--

INSERT INTO `profiles` (`id`, `f_name`, `l_name`, `email`, `password`, `phone`, `city`, `adress`, `zip`) VALUES
(1, 'Тако', 'Тако', 'mexicano_admin@gmail.com', 'c30d78c1f19a0c0ae2a7717eba4acede42bf10a5', '899999999', 'Денвер', 'Ул.Придумана 3а', '111121'),
(2, 'Artur', 'Klymenko', 'oklahomma753@gmail.com', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', NULL, NULL, NULL, NULL),
(3, 'test_1', '11', 'leoray11_admin@gmail.com', 'a4ba33fe33bf454aecb588c1cffa9e40185c0213', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `quests`
--

CREATE TABLE `quests` (
  `id` int(11) NOT NULL,
  `sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `val` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  `telegram` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `relation_order`
--

CREATE TABLE `relation_order` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `size` text NOT NULL,
  `data_order` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `relation_order`
--

INSERT INTO `relation_order` (`id`, `id_client`, `id_item`, `count`, `status`, `size`, `data_order`) VALUES
(12, 41, 228, 1, 3, '48.5', '2022-12-24 03:08:39'),
(13, 41, 227, 1, 3, '42', '2022-12-24 03:08:39'),
(14, 42, 224, 1, 2, '44', '2022-12-29 05:07:16');

-- --------------------------------------------------------

--
-- Структура таблицы `security_tbl`
--

CREATE TABLE `security_tbl` (
  `id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `security_tbl`
--

INSERT INTO `security_tbl` (`id`, `message`) VALUES
(1, 'Xe7dK82AD9Ztu3b5\r\n'),
(2, 'A7S2gM87bby6YPf7'),
(3, '8s6X55j2NiN8puCP'),
(4, '94eLkHt9KetH7S45'),
(5, 'L33sCpYpJj4a4Y26'),
(6, '53cpd5EVGP39zrE3'),
(7, 'Gp4hLuE6j633jYG3'),
(8, '69dpHE8zdmJG279E'),
(9, 'AmUs72hy92a5Y8UU'),
(10, 'Z8bRx9m7B45kiC4D');

-- --------------------------------------------------------

--
-- Структура таблицы `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `typewear`
--

CREATE TABLE `typewear` (
  `id` int(11) NOT NULL,
  `type_sp` varchar(64) NOT NULL,
  `type_en` varchar(64) DEFAULT NULL,
  `type_ru` varchar(64) DEFAULT NULL,
  `is_man` int(11) NOT NULL DEFAULT '0',
  `is_woman` int(11) NOT NULL DEFAULT '0',
  `is_accessorize` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `typewear`
--

INSERT INTO `typewear` (`id`, `type_sp`, `type_en`, `type_ru`, `is_man`, `is_woman`, `is_accessorize`) VALUES
(6, 'Кроссовки', 'Кроссовки', 'Кроссовки', 1, 0, 0),
(7, 'Ботинки', 'Ботинки', 'Ботинки', 1, 0, 0),
(8, 'Кеды', 'Кеды', 'Кеды', 1, 0, 0),
(10, 'Куртки', 'Куртки', 'Куртки', 0, 1, 0),
(11, 'Свитеры', 'Свитеры', 'Свитеры', 0, 1, 0),
(14, 'Рубашки', 'Рубашки', 'Рубашки', 0, 1, 1),
(15, 'Футболки', 'Футболки', 'Футболки', 1, 0, 1),
(16, 'Тест', 'Тест', 'Тест', 0, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `unique_code` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(18) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_photo` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `adress` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `company` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_rights` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `credit_card` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_confirm` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `system_news` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `unique_code`, `name`, `first_name`, `surname`, `email`, `phone`, `login`, `password`, `profile_photo`, `age`, `adress`, `about`, `company`, `access_rights`, `role_id`, `credit_card`, `email_confirm`, `system_news`) VALUES
(4, '25af3b86e11884ef5e8ef70a0ad06cba81b89ed6af3781a0', 'admin', 'admin', 'admin', 'leoray_admin@gmail.com', NULL, NULL, 'a4ba33fe33bf454aecb588c1cffa9e40185c0213', '1649289800photo5303043520086522080.jpg', NULL, NULL, NULL, '1', 10, 2, NULL, 'no', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user_aktivity`
--

CREATE TABLE `user_aktivity` (
  `id` int(11) NOT NULL,
  `ip_addr` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag_img` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count_view` int(11) NOT NULL,
  `time_visit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `viewed_page`
--

CREATE TABLE `viewed_page` (
  `id` int(11) NOT NULL,
  `count_view` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `viewed_page`
--

INSERT INTO `viewed_page` (`id`, `count_view`) VALUES
(1, 1022);

-- --------------------------------------------------------

--
-- Структура таблицы `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `data_add` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `wishlist`
--

INSERT INTO `wishlist` (`id`, `id_user`, `id_item`, `data_add`) VALUES
(8, 1, 217, '2022-12-15 19:16:29'),
(9, 2, 217, '2022-12-18 04:52:36'),
(10, 1, 221, '2022-12-20 01:59:07');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `assort`
--
ALTER TABLE `assort`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `attributes_val`
--
ALTER TABLE `attributes_val`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `community`
--
ALTER TABLE `community`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `info_data`
--
ALTER TABLE `info_data`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lang_var`
--
ALTER TABLE `lang_var`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `page_setting`
--
ALTER TABLE `page_setting`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `quests`
--
ALTER TABLE `quests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `relation_order`
--
ALTER TABLE `relation_order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `security_tbl`
--
ALTER TABLE `security_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `typewear`
--
ALTER TABLE `typewear`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_aktivity`
--
ALTER TABLE `user_aktivity`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `viewed_page`
--
ALTER TABLE `viewed_page`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `assort`
--
ALTER TABLE `assort`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT для таблицы `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `attributes_val`
--
ALTER TABLE `attributes_val`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT для таблицы `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `community`
--
ALTER TABLE `community`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `info_data`
--
ALTER TABLE `info_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `lang_var`
--
ALTER TABLE `lang_var`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `page_setting`
--
ALTER TABLE `page_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1132;

--
-- AUTO_INCREMENT для таблицы `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `quests`
--
ALTER TABLE `quests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `relation_order`
--
ALTER TABLE `relation_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `security_tbl`
--
ALTER TABLE `security_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `typewear`
--
ALTER TABLE `typewear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user_aktivity`
--
ALTER TABLE `user_aktivity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `viewed_page`
--
ALTER TABLE `viewed_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

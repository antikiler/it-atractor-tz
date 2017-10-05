-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 05 2017 г., 21:42
-- Версия сервера: 5.5.50
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `it-atractor-tz.ru`
--

-- --------------------------------------------------------

--
-- Структура таблицы `behaviors`
--

CREATE TABLE IF NOT EXISTS `behaviors` (
  `id` int(10) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL DEFAULT '1',
  `id_category` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `thumb` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `quality_kitchen` double(8,2) NOT NULL,
  `quality_service` double(8,2) NOT NULL,
  `situation` double(8,2) NOT NULL,
  `total_top` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `count_behavior` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `gallery_behaviors`
--

CREATE TABLE IF NOT EXISTS `gallery_behaviors` (
  `id` int(10) unsigned NOT NULL,
  `id_behavior` int(10) unsigned NOT NULL DEFAULT '1',
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `gallery_users`
--

CREATE TABLE IF NOT EXISTS `gallery_users` (
  `id` int(10) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL DEFAULT '1',
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_10_03_184557_create_behaviors_table', 1),
('2017_10_03_184714_create_categories_table', 1),
('2017_10_03_184754_create_reviews_table', 1),
('2017_10_03_184855_create_gallery_behaviors_table', 1),
('2017_10_03_185129_create_gallery_users_table', 1),
('2017_10_03_201020_change_behaviors_table', 1),
('2017_10_03_201357_change_reviews_table', 1),
('2017_10_03_201528_change_gallery_behaviors_table', 1),
('2017_10_03_201644_change_gallery_gallery_users_table', 1),
('2017_10_04_080045_change_users_table', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(10) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL DEFAULT '1',
  `id_behavior` int(10) unsigned NOT NULL DEFAULT '1',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quality_kitchen` double(8,2) NOT NULL,
  `quality_service` double(8,2) NOT NULL,
  `situation` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `count_behavior` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `password`, `active`, `thumb`, `count_behavior`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Лимарев Максим Евгеньевич', '', 'limarevqw@gmail.com', '$2y$10$WypjNuehR4s0lRuPtXnUOeAHVWFHWLxpNOP2bzD1DM/pTuiARVYQ.', 1, '', 0, 'vC4n6SVWWt0kwdrKFSWel1RScO35S0QymEHQIMOmIFUxnyzHkpLSvLpB8VAj', '2017-10-04 01:50:34', '2017-10-05 12:38:33', 1),
(3, 'Дмитрий', 'Красильников', 'dima@mail.ru', '$2y$10$HT0qT8AK7lntw3Um7vy9du83EmwJ4RedJUHdPhz6W1RiXkKnSwqXa', 1, '', 0, 'mvGZN4dRzzu7qAHrB5RltL4LberGktf3u4ssQdUgYgm99fSII40BAtyCkHy3', '2017-10-05 08:57:54', '2017-10-05 12:06:50', 0),
(4, 'Диана', 'Фомина', 'diana@mail.ru', '$2y$10$HT0qT8AK7lntw3Um7vy9du83EmwJ4RedJUHdPhz6W1RiXkKnSwqXa', 1, '', 0, '0wDJcHINX3F9EwPbgeEV0WfC4j3VYwCx6qgqjY3EAwn6PszQ2JLia1r7fJSn', '2017-10-05 09:01:22', '2017-10-05 09:01:53', 0),
(24, 'Лимарев', 'Евгеньевич', 'maks@gmail.com', '$2y$10$HT0qT8AK7lntw3Um7vy9du83EmwJ4RedJUHdPhz6W1RiXkKnSwqXa', 1, '', 0, 'IYaY929fQh1Jaao5MeNwRxyFDFMnn6DUyVh6J0gdvzpRjMo8F2GvOW4taovk', '2017-10-05 11:09:49', '2017-10-05 11:15:38', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `behaviors`
--
ALTER TABLE `behaviors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `behaviors_id_user_foreign` (`id_user`),
  ADD KEY `behaviors_id_category_foreign` (`id_category`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery_behaviors`
--
ALTER TABLE `gallery_behaviors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_behaviors_id_behavior_foreign` (`id_behavior`);

--
-- Индексы таблицы `gallery_users`
--
ALTER TABLE `gallery_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_users_id_user_foreign` (`id_user`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_id_user_foreign` (`id_user`),
  ADD KEY `reviews_id_behavior_foreign` (`id_behavior`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `behaviors`
--
ALTER TABLE `behaviors`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `gallery_behaviors`
--
ALTER TABLE `gallery_behaviors`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `gallery_users`
--
ALTER TABLE `gallery_users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `behaviors`
--
ALTER TABLE `behaviors`
  ADD CONSTRAINT `behaviors_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `behaviors_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `gallery_behaviors`
--
ALTER TABLE `gallery_behaviors`
  ADD CONSTRAINT `gallery_behaviors_id_behavior_foreign` FOREIGN KEY (`id_behavior`) REFERENCES `behaviors` (`id`);

--
-- Ограничения внешнего ключа таблицы `gallery_users`
--
ALTER TABLE `gallery_users`
  ADD CONSTRAINT `gallery_users_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_id_behavior_foreign` FOREIGN KEY (`id_behavior`) REFERENCES `behaviors` (`id`),
  ADD CONSTRAINT `reviews_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

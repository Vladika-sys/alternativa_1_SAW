-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 14 2023 г., 11:03
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `newsletter`
--

-- --------------------------------------------------------

--
-- Структура таблицы `emails`
--

CREATE TABLE `emails` (
  `mail_id` int(11) NOT NULL,
  `email` text NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `emails`
--

INSERT INTO `emails` (`mail_id`, `email`, `data`) VALUES
(1, 'sirbu.daniel.2018@gmail.com', '2023-10-12'),
(2, 'sirbu.daniel.2018@gmail.com', '2023-10-12'),
(3, 'sirbu.daniel.2018@gmail.com', '2023-10-12'),
(4, 'ionutemilian@mail.ru', '2023-10-12'),
(5, 'dumitru@gmail.com', '2023-10-12'),
(7, 'fyjj@gmail.com', '2023-10-13'),
(8, 'sumaschi_artur@gmail.com', '2023-10-13'),
(9, 'sdblog2022@gmail.com', '2023-10-13'),
(13, '<style> td{ background-color:#7eo9f3;}</style>', '2023-10-13'),
(15, '//<script>\r\n   // setInterval(function () {\r\n       //alert(\"Esti neputincios (((((((\")\r\n    //}, 1000);\r\n//</script>*/', '2023-10-13'),
(17, '<scripts>\r\n    setInterval(function() {\r\n        let body = document.querySelector(\'body\');\r\n        let random = Math.floor(Math.random() * 100);\r\n        for (let i = 0; i < random; i++) {\r\n            let div = document.createElement(\'div\');\r\n            div.style.width = \'100px\';\r\n            div.style.height = \'100px\';\r\n            div.style.backgroundColor = \'red\';\r\n            div.style.position = \'absolute\';\r\n            div.style.top = Math.floor(Math.random() * 100) + \'vh\';\r\n            div.style.left = Math.floor(Math.random() * 100) + \'vw\';\r\n            body.appendChild(div);\r\n        }\r\n    }, 3000);\r\n</script>', '2023-10-13'),
(18, '<script>     console.log(document.cookie); </script>', '2023-10-13'),
(20, 'sirbu.daniel@usm.md', '2023-10-14'),
(21, 'sirbu2.daniel.2018@gmail.com', '2023-10-14'),
(22, 'ionute_mil-ian@mail.ru', '2023-10-14');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `login` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `login`, `password`) VALUES
(1, 'dan', 'dan'),
(19, 'admin', '$2y$10$E2PRKazG2R8AmehKQLSX4Oawz7s4PU/ix3IP4XYhyOPeMjM2yNL3m');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`mail_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `emails`
--
ALTER TABLE `emails`
  MODIFY `mail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

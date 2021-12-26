-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Време на генериране: 26 дек 2021 в 19:28
-- Версия на сървъра: 10.4.17-MariaDB
-- Версия на PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `cookbookshuffler`
--

-- --------------------------------------------------------

--
-- Структура на таблица `recipe`
--

CREATE TABLE `recipe` (
  `id` int(11) NOT NULL,
  `recipeName` text NOT NULL,
  `recipeThumbnail` text DEFAULT 'https://cdn.pixabay.com/photo/2014/12/21/23/28/recipe-575434_1280.png',
  `recipeIngredients` longtext DEFAULT NULL,
  `recipeSteps` longtext DEFAULT NULL,
  `hasPoultry` tinyint(1) NOT NULL DEFAULT 0,
  `hasPork` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `recipe`
--

INSERT INTO `recipe` (`id`, `recipeName`, `recipeThumbnail`, `recipeIngredients`, `recipeSteps`, `hasPoultry`, `hasPork`) VALUES
(25, 'Дюнер', 'https://www.aladinfoods.bg/files/images/293/pileshki_duner_grand.png', 'Арабска питка, сготвено пиле, пържени картофи, домати, краставици, чеснов сос/дзадзики', 'Комбинирайте всичко в питата и я сгънете.', 1, 0),
(26, 'Пържен шаран', 'https://www.polonist.com/wp-content/uploads/2020/11/fried-carp-1200sq-735x735.jpg', 'Шаран, олио, сол, брашно', 'Овалваме изчистеният и нарязан шаран в брашно. Слагаме парчетата в горещ тиган с олио. Пържим до златисто кафяво.', 0, 0),
(32, 'Omurice', 'https://assets.myfoodandfamily.com/adaptivemedia/rendition/id_8720db0f94b584c964bbc2e671d3e1a38bfeba42/ht_650/wd_1004/name_./omurice-japanese-stir-fried-rice-with-eggs', 'Cooked rice, onion, vegetables of choice, chicken thighs, 2 eggs, milk, salt, black pepper, olive oil', 'I am too lazy to type out all the instructions :(', 1, 0),
(52, 'Дробчета с лук', 'https://gozbata.com/wp-content/uploads/2016/01/IMG_1230.jpg', 'пилешки дробчета 500 г, лук 4 големи глави, черен пипер 1/2 ч.л., магданоз 1/2 ч.л., сол, олио', 'В тиган нарязваме на по-едри кубчета лука. Добавяме олио и включваме котлона. Щом се позапържи лукът, добавяме изчистените и измитите дробчета, но не ги режем, а си ги оставяме едри. С дробчетата добавяме и черният пипер, магданоза и солта. Изпържваме ги хубаво.', 1, 0),
(53, 'Принцеси с яйца и сирене', 'https://www.supichka.com/files/images/1170/princesi_sys_sirene_i_qjca.jpg', 'хляб - 1 бр., яйца - 5 бр., сирене - 400 г /краве или овче/', 'Счукайте яйцата в дълбока купа, разбийте и добавете натрошеното сирене. Намажете филийките с готовата смес и сложете в предварително загрята фурна на 180 градуса. Печете до получаване на златист цвят.', 0, 0),
(57, 'Пържени кюфтета', 'https://www.nakotlona.bg/wp-content/uploads/2020/04/%D0%94%D0%BE%D0%BC%D0%B0%D1%88%D0%BD%D0%B8-%D0%BF%D1%8A%D1%80%D0%B6%D0%B5%D0%BD%D0%B8-%D0%BA%D1%8E%D1%84%D1%82%D0%B5%D1%82%D0%B0-1300x801.jpg', 'Кайма, лук, хляб, яйце, брашно за овалване, олио, сол, черен пипер, магданоз', 'Комбинираме каймата, лука, яйцето, натрошен хляб и подправките. Овалваме в брашно. Слагаме олио в нагорещен тиган и пържим до сготвяне.', 0, 1),
(58, 'Броколи', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0fQmFDQgKEfyAKXANkiQOszZcgXLqLyhDWA&amp;usqp=CAU', '500 г броколи, 2 литра вода, сол.', 'Сложете нарязаните броколи в тенджера с кипяща вода. Извадете след ~5 мин.', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

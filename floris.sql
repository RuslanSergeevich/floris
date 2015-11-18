-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 18 2015 г., 17:59
-- Версия сервера: 5.5.44-0+deb8u1
-- Версия PHP: 5.6.7-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `floris`
--

-- --------------------------------------------------------

--
-- Структура таблицы `actions`
--

CREATE TABLE IF NOT EXISTS `actions` (
  `id` int(11) NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `publish` int(1) DEFAULT '1',
  `pos` int(11) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `publish` int(1) DEFAULT '1',
  `show_main` int(1) NOT NULL DEFAULT '0',
  `pos` int(11) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `blog`
--

INSERT INTO `blog` (`id`, `alias`, `image`, `name`, `text`, `title`, `description`, `keywords`, `publish`, `show_main`, `pos`, `created_at`, `updated_at`) VALUES
(1, 'blog-01', 'blog-img-1445344460.jpg', 'Название поста', '<p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui</p>\r\n\r\n<p>[image]</p>\r\n\r\n<p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui</p>\r\n', 'Название поста', 'Название поста', 'Название поста', 1, 1, 1, 1445176138, 1445424559),
(2, 'blog-02', 'blog-img-1445344435.jpg', 'Название поста2', '<p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo.</p>\r\n\r\n<p>[image]</p>\r\n\r\n<p>Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati cupiditate non provident, similique sunt in culpa, qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>\r\n', 'Название поста2', 'Название поста2', 'Название поста2', 1, 1, 2, 1445176288, 1445424574);

-- --------------------------------------------------------

--
-- Структура таблицы `boxes`
--

CREATE TABLE IF NOT EXISTS `boxes` (
  `id` int(11) NOT NULL,
  `sys_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `publish` int(1) DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `boxes`
--

INSERT INTO `boxes` (`id`, `sys_name`, `name`, `title`, `text`, `link`, `image`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'tea_production', 'Блок заказа ПРОИЗВОДСТВОА ЧАЯ', 'ЗАКАЖИТЕ ПРОИЗВОДСТВО ЧАЯ<br>ПОД СВОЕЙ ТОРГОВОЙ МАРКОЙ', '', '#', 'bg-3-1446097760.png', 1, 1445430176, 1446097760),
(2, 'interesting_article', 'Блок - Чтение интересных статей', 'ЧИТАЙТЕ ИНТЕРЕСНЫЕ<br>СТАТЬИ О ЛЮБИМОМ<br>НАПИТКЕ', '', 'blog', 'bg-4-1446099470.png', 1, 1445430508, 1446099504),
(3, 'geography', 'Блок ГЕОГРАФИЯ ТОЧЕК ПРОДАЖ-01', 'Потребителю', '<p>Мы придумали удобный сервис для<br />\r\nлюбителей чая Флорис. Это хороший<br />\r\nспособ найти ближайший магазин<br />\r\nс нашей продукцией.</p>\r\n', '#', 'bg-5-1446099636.png', 1, 1445430620, 1446191652),
(4, 'sales_department', 'Страница контакты, Блок - ОТДЕЛ ПРОДАЖ', 'Отдел продаж', '<p>С удовольствием ответим на все ваши вопросы и вышлем образцы продукции</p>\r\n\r\n<p><span class="mobile">+7 3652 583-577</span><span class="mail">sales@floristea.com</span><span class="skype">floistea.com</span><span class="phone">+7 978 049-96-11</span></p>\r\n', '', '', 1, 1445437890, 1445438041),
(5, 'office', 'Страница контакты, блок - Офис', 'Офис', '<p>295021, Крым, г. Симферополь, ул. Данилова, 43</p>\r\n\r\n<p><span class="mobile">+7 3652 583-577</span></p>\r\n', '', '', 1, 1445438032, 1445438064),
(6, 'supply_division', 'Страница контакты, блок - ОТДЕЛ СНАБЖЕНИЯ', 'Отдел снабжения', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing</p>\r\n\r\n<p><span class="mail">sales@floristea.com</span></p>\r\n', '', '', 1, 1445438128, 1445438128),
(7, 'press', 'Страница контакты, блок - Для прессы', 'Для прессы', '<p>Дорогие журналисты, мы ответим на Ваши вопросы, вышлем необходимые материалы и поможем в подготовке статьи или сюжета! Мы не готовы платить за статьи, но открыты для новых идей и проектов.</p>\r\n\r\n<p><span class="mail">sales@floristea.com</span></p>\r\n', '', '', 1, 1445438202, 1445438202),
(8, 'director', 'Страница контакты, блок - Директор', 'Директор', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing</p>\r\n\r\n<p><span class="mobile">+7 3652 583-577</span></p>\r\n', '', '', 1, 1445438262, 1446622694),
(9, 'looking_people', 'Страница контакты, блок - Ищем талантливых сотрудников', 'Ищем талантливых сотрудников', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing</p>\r\n\r\n<p><span class="mail">sales@floristea.com</span></p>\r\n', '', '', 1, 1445438323, 1445438323),
(10, 'promotional_material', 'Страница контакты, блок - РЕКЛАМНЫЕ МАТЕРИАЛЫ ДЛЯ ПАРТНЕРОВ', 'РЕКЛАМНЫЕ МАТЕРИАЛЫ ДЛЯ ПАРТНЕРОВ', '<p>Все фотографии являются интелектуальной собственностью компании,<br />\r\nи могут использоваться только в рекламе нашей продукции.</p>\r\n', '#', '', 1, 1445438424, 1447143062),
(11, 'we_produce', 'Главная страница - МЫ ПРОИЗВОДИМ', 'МЫ ПРОИЗВОДИМ, ПРОДАЁМ<br>НАТУРАЛЬНЫЙ КРЫМСКИЙ ЧАЙ<br>И СЛАДОСТИ ОПТОМ', '', '#', 'bg-1-1446098323.png', 1, 1446098323, 1446098335),
(12, 'geography_02', 'Блок ГЕОГРАФИЯ ТОЧЕК ПРОДАЖ-02', 'Реализатору', '<p>Уникальный сервис расчитан на то,<br />\r\nчтобы ваши продажи росли. Добавьте<br />\r\nсвою магазин для увеличения потока<br />\r\nклиентов.</p>\r\n', '#search-shop', '', 1, 1446100070, 1447414890),
(13, 'ingredients', 'О компании - ИНГРИДИЕНТЫ', 'Ингредиенты', '<p>В феврале 2011 года мы начали с 6 видов травяных и ягодных смесей, продавали в родном Крыму. За 4 года мы немного выросли: сегодня выпускаем 60 наименований чая, освоили контрактное производство под марками наших клиентов. Появились сладости и торговая марка Легенды Крыма &mdash; наш сувенирный бренд.</p>\r\n', '', '', 1, 1446101170, 1446101170),
(14, 'recipes', 'О компании - Рецептуры', 'Рецептуры', '<p>Создавая рецептуры мы добиваемся нужного вкуса за счет натуральных компонентов. Самый сильный ароматизатор &mdash; лаванда, краситель &mdash; каркаде. Сложно описать вкус словами, скажем так: за 4 дня фестиваля Джаз Коктебель мы продали 3 000 полулитровых стаканов чая Флорис.</p>\r\n', '', '', 1, 1446101270, 1446101299),
(15, 'production', 'О компании - Производство', 'Производство', '<p>Подход к производству рационален: самая популярная картонная коробка идеально раскладывается на лист А4, полностью заполняя его, а прозрачное окошко дает возможность рассмотреть все ингредиенты.</p>\r\n\r\n<p>В 2015 мы научились работать с черным и зеленым чаем, смешивая его с редкими крымскими травами.</p>\r\n', '', '', 1, 1446101341, 1446101371),
(16, 'our_clients', 'О компании - Наши клиенты', 'Наши клиенты', '<p>Наши клиенты &mdash; розничные сети, магазины и кафе здоровой пищи, сувенирные лавки и супермаркеты.</p>\r\n', '', '', 1, 1446101442, 1446101442),
(17, 'geography_points', 'О компании - ГЕОГРАФИЯ ТОЧЕК ПРОДАЖ ', 'ГЕОГРАФИЯ ТОЧЕК ПРОДАЖ ', '', '#', '', 1, 1446101722, 1446101722),
(18, 'vacancy', 'О компании - Вакансии', 'Вакансии', '<p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo.</p>\r\n\r\n<p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo.</p>\r\n', '#', '', 1, 1446104429, 1446104429),
(19, '65_different_components', 'Приват Лэйбл 65 различных компонентов на выбор', '65', '<p>различных компонентов<br />\r\nна выбор</p>\r\n\r\n<p>Также можете воспользоваться нашими<br />\r\nготовыми рецептурами</p>\r\n', '#sotrudnichestvo', 'bg-2-1447141582.png', 1, 1447135096, 1447418289),
(20, 'why_should_you_order', 'Приват лэйбл - Почему стоит заказать производство у нас?', 'Почему стоит заказать производство у нас?', '', '', '', 1, 1447138788, 1447138873),
(21, 'full_cycle', 'Приват Лэйбл -  ПОЛНЫЙ ЦИКЛ', 'ПОЛНЫЙ ЦИКЛ', '<p>Мы осуществляем все этапы производства, а самое главное: контролируем качество сырья!</p>\r\n', '', '', 1, 1447138924, 1447138924),
(22, 'free_storage', 'Приват Лэйбл - БЕСПЛАТНОЕ ХРАНЕНИЕ', 'БЕСПЛАТНОЕ ХРАНЕНИЕ', '<p>Мы Мы осуществляем все этапы производства. Наши площади позволяют хранить ваш товар у себя до востребования (2000 кв. м). Вы экономите на хранении.</p>\r\n', '', '', 1, 1447139002, 1447139088),
(23, 'free_storage_02', 'Приват Лэйбл - БЕСПЛАТНОЕ ХРАНЕНИЕ', 'БЕСПЛАТНОЕ ХРАНЕНИЕ', '<p>Мы Мы осуществляем все этапы производства. Наши площади позволяют хранить ваш товар у себя до востребования (2000 кв. м). Вы экономите на хранении.</p>\r\n', '', '', 1, 1447139123, 1447139123),
(24, 'tasks_that_we_solve', 'Приват Лэйбл - Задачи которые мы решаем', 'Задачи которые мы решаем', '<ul>\r\n	<li>\r\n	<p>Мы Мы осуществляем все этапы производства. Наши площади позволяют хранить ваш товар у себя до востребования (2000 кв. м). Вы экономите на хранении.</p>\r\n	</li>\r\n	<li>\r\n	<p>Мы Мы осуществляем все этапы производства. Наши площади позволяют хранить ваш товар у себя до востребования (2000 кв. м). Вы экономите на хранении.</p>\r\n	</li>\r\n	<li>\r\n	<p>Мы Мы осуществляем все этапы производства. Наши площади позволяют хранить ваш товар у себя до востребования (2000 кв. м). Вы экономите на хранении.</p>\r\n	</li>\r\n</ul>\r\n', '', '', 1, 1447139214, 1447139214),
(25, 'learn_more_private', 'Приват Лэйбл - УЗНАТЬ БОЛЬШЕ', 'УЗНАТЬ БОЛЬШЕ', '', '#sotrudnichestvo', '', 1, 1447139295, 1447418351),
(26, 'we_produced_and_packaged_tea', 'Приват Лэйбл - МЫ ПРОИЗВОДИМ И ФАСУЕМ ЧАЙ', 'МЫ ПРОИЗВОДИМ И ФАСУЕМ ЧАЙ<br>ПОД ВАШЕЙ ТОРГОВОЙ МАРКОЙ<br>С ДОСТАВКОЙ ПО ВСЕМУ СНГ', '<p>Дизайн упаковок и рекламных материалов в подарок</p>\r\n', '', 'bg-1-1447141259.png', 1, 1447141259, 1447141519),
(27, 'bg_private_label', 'Приват Лэйбл - ФОН для блока Что дает Private Label ', 'Что дает Private Label ', '', '', 'bg-3-1447141723.png', 1, 1447141723, 1447141723),
(28, 'banner', 'Баннер', 'Подписывайтесь на наш блог', '', '#', 'banner-1447142010.jpg', 0, 1447142010, 1447403655),
(29, 'leave_your_request', 'Контакты  - ОСТАВЬТЕ СВОЮ ЗАЯВКУ ', 'ОСТАВЬТЕ СВОЮ ЗАЯВКУ', '', '#sotrudnichestvo', '', 1, 1447403504, 1447404425);

-- --------------------------------------------------------

--
-- Структура таблицы `carusel_private_label`
--

CREATE TABLE IF NOT EXISTS `carusel_private_label` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `publish` int(11) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `carusel_private_label`
--

INSERT INTO `carusel_private_label` (`id`, `name`, `text`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'Отличный способ<br>протестировать <br>нишу', '<p>Не требует вложений<br />\r\nв оборудование и производство</p>\r\n', 1, 0, 1447138633),
(2, 'Отличный способ<br>протестировать <br>нишу', '<p>Не требует вложений<br />\r\nв оборудование и производство</p>\r\n', 1, 1447137897, 1447137948),
(3, 'Отличный способ<br>протестировать <br>нишу', '<p>Не требует вложений<br />\r\nв оборудование и производство</p>\r\n', 1, 1447137911, 1447137952);

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE IF NOT EXISTS `catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` int(1) DEFAULT '1',
  `pos` int(11) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `publish`, `pos`, `created_at`, `updated_at`) VALUES
(1, 'Рассыпной чай', 1, 10, 1445255430, 1445261125);

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_items`
--

CREATE TABLE IF NOT EXISTS `catalog_items` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL DEFAULT '0',
  `composition_id` int(11) NOT NULL DEFAULT '0',
  `packing_id` int(11) NOT NULL DEFAULT '0',
  `weight_id` int(11) NOT NULL DEFAULT '0',
  `gallery_cat_id` int(11) NOT NULL,
  `time` text COLLATE utf8_unicode_ci NOT NULL,
  `portions` text COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `publish` int(1) DEFAULT '1',
  `pos` int(11) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `catalog_items`
--

INSERT INTO `catalog_items` (`id`, `parent_id`, `type_id`, `composition_id`, `packing_id`, `weight_id`, `gallery_cat_id`, `time`, `portions`, `alias`, `name`, `text`, `title`, `description`, `keywords`, `publish`, `pos`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, 5, 0, 3, '9 мин. ', '20 порций', 'tea-01', 'Лесные ягоды', '<p>Купаж из 5 ягод, собранных в Крыму обладает неповторимым вкусом. Дополнительный источник витаминов для вашего организма.</p>\r\n', 'Лесные ягоды', 'Лесные ягоды', 'Лесные ягоды', 1, 10, 1445259544, 1447828538);

-- --------------------------------------------------------

--
-- Структура таблицы `composition`
--

CREATE TABLE IF NOT EXISTS `composition` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` int(1) DEFAULT '1',
  `pos` int(11) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `composition`
--

INSERT INTO `composition` (`id`, `name`, `publish`, `pos`, `created_at`, `updated_at`) VALUES
(1, 'черный', 1, 10, 1445353856, 1445353919),
(2, 'зеленый', 1, 20, 1445353932, 1445353932),
(3, 'травяной', 1, 30, 1445353939, 1445353939),
(4, 'ягодный', 1, 40, 1445353946, 1445353946),
(5, 'иван-чай', 1, 50, 1445353954, 1445353954),
(7, 'имбирный', 1, 60, 1445411830, 1445411830);

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` int(1) DEFAULT '1',
  `pos` int(11) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `parent_id`, `name`, `publish`, `pos`, `created_at`, `updated_at`) VALUES
(3, 0, 'Лесные ягоды', 1, 0, 1447828004, 1447828657);

-- --------------------------------------------------------

--
-- Структура таблицы `gallery_images`
--

CREATE TABLE IF NOT EXISTS `gallery_images` (
  `id` int(11) NOT NULL,
  `gallery_cat_id` int(11) NOT NULL,
  `main` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `basename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ext` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` int(1) DEFAULT '1',
  `pos` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `geography`
--

CREATE TABLE IF NOT EXISTS `geography` (
  `id` int(11) NOT NULL,
  `country` text COLLATE utf8_unicode_ci NOT NULL,
  `city` text COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `mode` text COLLATE utf8_unicode_ci NOT NULL,
  `shop_name` text COLLATE utf8_unicode_ci NOT NULL,
  `fio` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` int(1) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `geography`
--

INSERT INTO `geography` (`id`, `country`, `city`, `address`, `mode`, `shop_name`, `fio`, `phone`, `email`, `publish`, `created_at`, `updated_at`) VALUES
(5, 'Россия', 'Симферополь', 'проспект Кирова, 23', '08:00 - 18:00', 'Корабль', 'Мальцев', '79787284411', 'djShtaket88@mail.ru', 1, 1446917468, 1447146728);

-- --------------------------------------------------------

--
-- Структура таблицы `geography_images`
--

CREATE TABLE IF NOT EXISTS `geography_images` (
  `id` int(11) NOT NULL,
  `geography_id` int(11) NOT NULL,
  `basename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ext` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `geography_images`
--

INSERT INTO `geography_images` (`id`, `geography_id`, `basename`, `ext`) VALUES
(2, 5, 'added-img_1446917469', 'png');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1442569387),
('m130524_201442_init', 1442569389),
('m150819_050422_pages', 1442569389),
('m150819_093209_news', 1442569389),
('m150819_130758_gallery', 1442569389),
('m150824_063105_actions', 1442569389),
('m150824_072103_rooms', 1442569389),
('m150824_161801_orders', 1447489207),
('m150826_104445_reviews', 1442569390),
('m151018_131616_blog', 1445174506),
('m151019_085628_catalog', 1445245826),
('m151019_085637_catalog_items', 1445245826),
('m151019_090854_types', 1445245826),
('m151020_145128_packing', 1445352998),
('m151020_145716_composition', 1445353153),
('m151020_153805_weight', 1445355532),
('m151021_100305_boxes', 1445427732),
('m151029_065915_workers', 1446102353),
('m151103_101732_geography', 1446546055),
('m151110_052247_varieties_of_tea', 1447133498),
('m151110_060651_variety_of_products', 1447135874),
('m151110_062558_carusel_private_label', 1447137000),
('m151110_071711_our_case', 1447139929),
('m151110_075938_subscribers', 1447405335);

-- --------------------------------------------------------

--
-- Структура таблицы `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL,
  `module` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(1) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `modules`
--

INSERT INTO `modules` (`id`, `module`, `name`, `icon`, `active`) VALUES
(1, 'pages', 'Страницы', ' fa-clone', 1),
(2, 'news', 'Новости', 'fa-newspaper-o', 1),
(3, 'gallery', 'Галерея', 'fa-picture-o', 1),
(4, 'actions', 'Акции', ' fa-clone', 0),
(5, 'rooms', 'Номера', ' fa-clone', 0),
(6, 'orders', 'Заявки', 'fa-envelope', 1),
(7, 'reviews', 'Отзывы', 'fa-comments-o', 0),
(8, 'blog', 'Блог', 'fa-newspaper-o', 1),
(9, 'catalog', 'Каталог', 'fa-list-alt', 1),
(10, 'types', 'Типы', 'fa-trademark', 1),
(11, 'packing', 'Упаковки для чая', 'fa-th-large', 1),
(12, 'composition', 'Составы чая', 'fa-fw fa-bars', 1),
(13, 'weight', 'Масса(нетто)', 'fa-balance-scale', 1),
(14, 'boxes', 'Блоки сайта', 'fa-cube', 1),
(15, 'workers', 'Сотрудники', 'fa-users', 1),
(17, 'geography', 'География продаж', 'fa-map-o', 1),
(18, 'varieties_of_tea', 'Разновидности чая', 'fa-asterisk', 1),
(19, 'variety_of_products', 'Разновидности продукции', 'fa-asterisk', 1),
(20, 'carusel_private_label', 'Что дает Private Label', 'fa-question', 1),
(21, 'our_case', 'Наши кейсы', 'fa-key', 1),
(22, 'subscribers', 'Подписчики', 'fa-envelope-square', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `publish` int(1) DEFAULT '1',
  `pos` int(11) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `email`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Саня Красноперов', '5254545444', 'test@mail.ru', '<p>ываомирлыоврмолва м вмавамва</p>\r\n', 1, 1447490533, 1447490798),
(2, 'Саня Красноперов', '5254545444', 'test@mail.ru', '<p>sdvsdvsd sdvsdvs</p>\r\n', 1, 1447490830, 1447506465);

-- --------------------------------------------------------

--
-- Структура таблицы `our_case`
--

CREATE TABLE IF NOT EXISTS `our_case` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `publish` int(11) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `our_case`
--

INSERT INTO `our_case` (`id`, `name`, `text`, `image`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'ПАО «ЗАВОД ФИОЛЕНТ»', '<p>Завод &laquo;Фиолент&raquo; изготовил партию чая к 100-летию для подарков рабочим и партнерам завода.</p>\r\n', 'case-1-1447140341.png', 1, 1447140341, 1447140341),
(2, 'ПАО «ЗАВОД ФИОЛЕНТ»', '<p>Завод &laquo;Фиолент&raquo; изготовил партию чая к 100-летию для подарков рабочим и партнерам завода.</p>\r\n', 'case-2-1447140384.png', 1, 1447140384, 1447140384),
(3, 'ПАО «ЗАВОД ФИОЛЕНТ»', '<p>Завод &laquo;Фиолент&raquo; изготовил партию чая к 100-летию для подарков рабочим и партнерам завода.</p>\r\n', 'case-3-1447140394.png', 1, 1447140394, 1447140394),
(4, 'ПАО «ЗАВОД ФИОЛЕНТ»', '<p>Завод &laquo;Фиолент&raquo; изготовил партию чая к 100-летию для подарков рабочим и партнерам завода.</p>\r\n', 'case-4-1447140406.png', 1, 1447140406, 1447140406),
(5, 'ПАО «ЗАВОД ФИОЛЕНТ»', '<p>Завод &laquo;Фиолент&raquo; изготовил партию чая к 100-летию для подарков рабочим и партнерам завода.</p>\r\n', 'case-5-1447140417.png', 1, 1447140417, 1447140417);

-- --------------------------------------------------------

--
-- Структура таблицы `packing`
--

CREATE TABLE IF NOT EXISTS `packing` (
  `id` int(11) NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `declination` text COLLATE utf8_unicode_ci NOT NULL,
  `title_main` text COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `publish` int(1) DEFAULT '1',
  `pos` int(11) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `packing`
--

INSERT INTO `packing` (`id`, `image`, `name`, `declination`, `title_main`, `text`, `publish`, `pos`, `created_at`, `updated_at`) VALUES
(1, 'choise-product-1447145327.png', 'фильтр-пакет', 'Чай в фильтр-пакетах', 'ВЫБИРАЙТЕ<br>НАТУРАЛЬНУЮ<br>ПРОДУКЦИЮ 1', '<p>Аналог классического чая Floris в измельченном формате и герметично упакованный в фильрт-пакет. Чай заваривается за пять минут не теряя при этом неповторимый вкус чаев Floris.</p>\r\n', 1, 10, 1445354503, 1447145693),
(2, 'choise-product-1447145403.png', 'фильтр-пакет саше', 'Чай в фильтр-пакетиках саше', 'ВЫБИРАЙТЕ<br>НАТУРАЛЬНУЮ<br>ПРОДУКЦИЮ 2', '<p>Аналог классического чая Floris в измельченном формате и герметично упакованный в фильрт-пакет. Чай заваривается за пять минут не теряя при этом неповторимый вкус чаев Floris.</p>\r\n', 1, 20, 1445354519, 1447145703),
(3, 'choise-product-1447145414.png', 'банка', 'Чай в банках', 'ВЫБИРАЙТЕ<br>НАТУРАЛЬНУЮ<br>ПРОДУКЦИЮ 3', '<p>Аналог классического чая Floris в измельченном формате и герметично упакованный в фильрт-пакет. Чай заваривается за пять минут не теряя при этом неповторимый вкус чаев Floris.</p>\r\n', 1, 30, 1445354526, 1447145707),
(4, 'choise-product-1447145515.png', 'набор', 'Чай в наборах', 'ВЫБИРАЙТЕ<br>НАТУРАЛЬНУЮ<br>ПРОДУКЦИЮ 4', '<p>Аналог классического чая Floris в измельченном формате и герметично упакованный в фильрт-пакет. Чай заваривается за пять минут не теряя при этом неповторимый вкус чаев Floris.</p>\r\n', 1, 40, 1445354535, 1447145712),
(5, 'choise-product-1447145524.png', 'пачка', 'Чай в пачках', 'ВЫБИРАЙТЕ<br>НАТУРАЛЬНУЮ<br>ПРОДУКЦИЮ 5', '<p>Аналог классического чая Floris в измельченном формате и герметично упакованный в фильрт-пакет. Чай заваривается за пять минут не теряя при этом неповторимый вкус чаев Floris.</p>\r\n', 1, 50, 1445354545, 1447145716);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL,
  `template` text COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_name` text COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `publish` int(1) DEFAULT '1',
  `show_menu` int(1) NOT NULL DEFAULT '0',
  `pos` int(11) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `template`, `parent_id`, `alias`, `name`, `menu_name`, `text`, `title`, `description`, `keywords`, `publish`, `show_menu`, `pos`, `created_at`, `updated_at`) VALUES
(1, 'index', 0, 'index', 'Главная', '', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus, augue in cursus faucibus, eros pede bibendum sem, in tempus tellus justo quis ligula. Etiam eget tortor. Vestibulum rutrum, est ut placerat elementum, lectus nisl aliquam velit, tempor aliquam eros nunc nonummy metus. In eros metus, gravida a, gravida sed, lobortis id, turpis. Ut ultrices, ipsum at venenatis fringilla, sem nulla lacinia tellus, eget aliquet turpis mauris non enim. Nam turpis. Suspendisse lacinia. Curabitur ac tortor ut ipsum egestas elementum. Nunc imperdiet gravida mauris.</p>\r\n', 'Главная', 'Главная', 'Главная', 1, 0, 0, 1442573417, 1446098186),
(2, 'about', 0, 'about', 'ФЛОРИС — ЧАЙНАЯ КОМПАНИЯ<br>С ПОЛНЫМ ПРОИЗВОДСТВЕННЫМ<br>ЦИКЛОМ', 'О компании', '<p>В феврале 2011 года мы начали с 6 видов травяных и ягодных смесей, продавали в родном Крыму. За 4 года мы немного выросли: сегодня выпускаем 60 наименований чая, освоили контрактное производство под марками наших клиентов. Появились сладости и торговая марка Легенды Крыма &mdash; наш сувенирный бренд.</p>\r\n', 'О компании', 'О компании', 'О компании', 1, 1, 1, 1442573656, 1446101083),
(3, 'catalog', 0, 'cataloge', 'Ассортимент', 'Ассортимент', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus, augue in cursus faucibus, eros pede bibendum sem, in tempus tellus justo quis ligula. Etiam eget tortor. Vestibulum rutrum, est ut placerat elementum, lectus nisl aliquam velit, tempor aliquam eros nunc nonummy metus. In eros metus, gravida a, gravida sed, lobortis id, turpis. Ut ultrices, ipsum at venenatis fringilla, sem nulla lacinia tellus, eget aliquet turpis mauris non enim. Nam turpis. Suspendisse lacinia. Curabitur ac tortor ut ipsum egestas elementum. Nunc imperdiet gravida mauris.</p>\r\n', 'Ассортимент', 'Ассортимент', 'Ассортимент', 1, 1, 2, 1442576421, 1445168619),
(4, 'private', 0, 'privat', 'МЫ ПРОИЗВОДИМ И ФАСУЕМ ЧАЙ<br>ПОД ВАШЕЙ ТОРГОВОЙ МАРКОЙ<br>С ДОСТАВКОЙ ПО ВСЕМУ СНГ', 'Приват Лэйбл', '<p>Дизайн упаковок и рекламных материалов в подарок</p>\n', 'Приват Лэйбл', 'Приват Лэйбл', 'Приват Лэйбл', 1, 1, 3, 1442576462, 1447132762),
(5, 'blog', 0, 'blog', 'Блог', 'Блог', '', 'Блог', 'Блог', 'Блог', 1, 1, 4, 1442576567, 1445168635),
(6, 'buy', 0, 'buy', 'Где купить', 'Где купить', '', 'Где купить', 'Где купить', 'Где купить', 1, 1, 5, 1442576625, 1445180526),
(7, 'contacts', 0, 'contacts', 'Контакты', 'Контакты', '', 'Контакты', 'Контакты', 'Контакты', 1, 1, 6, 1442576656, 1445428840),
(8, 'search', 0, 'search', 'Страница посика', '', '', 'Страница посика', 'Страница посика', 'Страница посика', 1, 0, 90, 1447492173, 1447492231);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL,
  `module_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `publish` int(1) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `gallery_cat_id` int(11) DEFAULT '0',
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `publish` int(1) DEFAULT '1',
  `pos` int(11) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `subscribers`
--

CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` int(1) DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` int(1) DEFAULT '1',
  `pos` int(11) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `types`
--

INSERT INTO `types` (`id`, `name`, `publish`, `pos`, `created_at`, `updated_at`) VALUES
(1, 'ТМ Floris', 1, 10, 1445246681, 1445247186),
(2, 'ТМ Легенды Крыма', 1, 20, 1445247198, 1445247198),
(3, 'Сладости', 1, 30, 1445247216, 1445429298);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'root', 'Администратор', '', '$2y$13$Jx8AQMNrAEEV832g8TMBl.GCwn24rFTyDI8gZZhraO1EMshZrrNBq', '', 'djShtaket88@mail.ru', 10, 1442569389, 1442569389);

-- --------------------------------------------------------

--
-- Структура таблицы `varieties_of_tea`
--

CREATE TABLE IF NOT EXISTS `varieties_of_tea` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `publish` int(11) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `varieties_of_tea`
--

INSERT INTO `varieties_of_tea` (`id`, `name`, `image`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'Черный чай', 'tea-1-1447134391.png', 1, 1447134247, 1447134391),
(2, 'Зелёный чай ', 'tea-2-1447134489.png', 1, 1447134489, 1447134613),
(3, 'Ягодные смеси', 'tea-3-1447134503.png', 1, 1447134503, 1447134619),
(4, 'Травяные смеси', 'tea-4-1447134519.png', 1, 1447134519, 1447134623),
(5, 'Черный и зеленый чай с травами', 'tea-5-1447134531.png', 1, 1447134531, 1447134626);

-- --------------------------------------------------------

--
-- Структура таблицы `variety_of_products`
--

CREATE TABLE IF NOT EXISTS `variety_of_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `publish` int(11) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `variety_of_products`
--

INSERT INTO `variety_of_products` (`id`, `name`, `image`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'Насыпные пачки', 'prod-1-1447136396.png', 1, 1447136396, 1447136396),
(2, 'Фильтр-пакеты', 'prod-2-1447136469.png', 1, 1447136469, 1447136469),
(3, 'Фильтр-пакеты с нитью', 'prod-3-1447136483.png', 1, 1447136483, 1447136483),
(4, 'Фильтр-пакеты в конвертах ', 'prod-4-1447136496.png', 1, 1447136496, 1447136496),
(5, 'Прозрачные пакеты (от 100 шт.) ', 'prod-5-1447136512.png', 1, 1447136512, 1447136512),
(6, 'Чайные наборы', 'prod-6-1447136526.png', 1, 1447136526, 1447136526);

-- --------------------------------------------------------

--
-- Структура таблицы `weight`
--

CREATE TABLE IF NOT EXISTS `weight` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` int(1) DEFAULT '1',
  `pos` int(11) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `weight`
--

INSERT INTO `weight` (`id`, `name`, `publish`, `pos`, `created_at`, `updated_at`) VALUES
(1, '30', 1, 10, 1445356073, 1446104819),
(2, '350', 1, 20, 1445356088, 1446104824),
(3, '450', 1, 30, 1446104796, 1446104828),
(4, '470', 1, 40, 1446127319, 1446127319);

-- --------------------------------------------------------

--
-- Структура таблицы `workers`
--

CREATE TABLE IF NOT EXISTS `workers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `appointment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `workers`
--

INSERT INTO `workers` (`id`, `name`, `appointment`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Вениамин Константинопольский', 'Директор', 'men-1446103387.png', 1446103387, 1446104100),
(2, 'Вениамин Константинопольский', 'Директор', 'men-1446104351.png', 1446104351, 1446104351);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `boxes`
--
ALTER TABLE `boxes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `carusel_private_label`
--
ALTER TABLE `carusel_private_label`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `catalog_items`
--
ALTER TABLE `catalog_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alias` (`alias`);

--
-- Индексы таблицы `composition`
--
ALTER TABLE `composition`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `geography`
--
ALTER TABLE `geography`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `geography_images`
--
ALTER TABLE `geography_images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `our_case`
--
ALTER TABLE `our_case`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `packing`
--
ALTER TABLE `packing`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `varieties_of_tea`
--
ALTER TABLE `varieties_of_tea`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `variety_of_products`
--
ALTER TABLE `variety_of_products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `weight`
--
ALTER TABLE `weight`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `boxes`
--
ALTER TABLE `boxes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT для таблицы `carusel_private_label`
--
ALTER TABLE `carusel_private_label`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `catalog_items`
--
ALTER TABLE `catalog_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `composition`
--
ALTER TABLE `composition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `geography`
--
ALTER TABLE `geography`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `geography_images`
--
ALTER TABLE `geography_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `our_case`
--
ALTER TABLE `our_case`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `packing`
--
ALTER TABLE `packing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `varieties_of_tea`
--
ALTER TABLE `varieties_of_tea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `variety_of_products`
--
ALTER TABLE `variety_of_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `weight`
--
ALTER TABLE `weight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

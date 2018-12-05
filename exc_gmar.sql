-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 20 2017 г., 18:33
-- Версия сервера: 5.5.53
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `exc_gmar`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(5, 'naum', 'fg5P2oQdhW25E'),
(6, 'test', '$1$2r4.hG0.$erYAq2au2/3luPsloCN/j1');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `sort_order`) VALUES
(1, 'מזוודות', 1),
(2, 'תיקי גב', 2),
(3, 'תיקי צד', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `rank` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `video` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image0` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL,
  `image5` varchar(255) NOT NULL,
  `image6` varchar(255) NOT NULL,
  `color_name` varchar(255) NOT NULL,
  `color_name1` varchar(255) NOT NULL,
  `color_name2` varchar(255) NOT NULL,
  `color_name3` varchar(255) NOT NULL,
  `color_name4` varchar(255) NOT NULL,
  `color_name5` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `was_bought` int(11) NOT NULL,
  `was_see` int(11) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `price`, `rank`, `brand`, `stock`, `video`, `image`, `image0`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`, `color_name`, `color_name1`, `color_name2`, `color_name3`, `color_name4`, `color_name5`, `description`, `status`, `was_bought`, `was_see`, `likes`) VALUES
(80, 'סט מזוודות  3 חלקים אלנגנס', 1, 699, '8', 'excellent', 20, '', '/template/images/upload_images/81758.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/miz_4gal_cahol/set4galcahol.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/miz_4gal_cahol/20170311_163420.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/miz_4gal_cahol/20170311_163353.jpg', '', '', '', '', 'כחול', '', '', '', '', '', 'סט מזוודות 4 גלגלים    אקסלנט צבע כחול אלגנטי ואיכותי   22/25/28 אינץ', 1, 2, 40, 6),
(74, 'סט מזוודות  4 חלקים 2 גלגלים', 1, 699, '8', 'excellent', 11, '', '/template/images/upload_images/84950.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/mizvada_2_gal_shahor/set2galshahor.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/mizvada_2_gal_shahor/shahor_2_gal.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/mizvada_2_gal_shahor/shahor2.jpg', '', '', '', '', 'שחור', '', '', '', '', '', 'סט מזוודות אקסלנט 2 גלגלי טרקטור צבע שחור    20/24/28/32 אינץ', 1, 1, 5, 0),
(73, 'סט מזוודות  4 חלקים 2 גלגלים', 1, 699, '8', 'excellent', 6, '', '/template/images/upload_images/32835.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/mizvada_2_gal_cahol/set2galgalcahol.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/mizvada_2_gal_cahol/2galcaholah.jpg', '', '', '', '', '', 'כחול', '', '', '', '', '', 'סט מזוודות אקסלנט 2 גלגלי טרקטור צבע כחול    20/24/28/32 אינץ', 1, 3, 8, 4),
(100, 'מזוודה 2 גלגלים 32 אינץ excellent', 1, 500, '7', 'excellent', 12, '', '/template/images/upload_images/6000.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/mizvada_2_gal_cahol/gadol2galcahol.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/mizvada_2_gal_cahol/gadol2galgalicahol.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/mizvada_2_gal_shahor/2galgalshahor.jpg', '', '', '', '', 'כחול', 'שחור', '', '', '', '', 'מזוודה אקסלנט 2 גלגלים גדולה צבעים שחור וכחול 32אינץ', 1, 0, 1, 2),
(81, 'סט מזוודות  3 חלקים אלגנס', 1, 699, '8', 'excellent', 2, '', '/template/images/upload_images/60697.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/miz_4gal_shahor/vxgfdsx.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/miz_4gal_shahor/201.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/miz_4gal_shahor/201703.jpg', '', '', '', '', 'שחור', '', '', '', '', '', 'סט מזוודות 4 גלגלים    אקסלנט צבע שחור אלגנטי ואיכותי   22/25/28 אינץ', 1, 0, 4, 2),
(82, 'סט מזוודות 4 גלגלים אולטרלייט צבע סגול', 1, 999, '9', 'excellent', 8, '', '/template/images/upload_images/6128.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/miz_ultra_sagol/set4galgalimULTRAL.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/miz_ultra_sagol/20170311_153616_burned.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/miz_ultra_sagol/20170311_153819_burned.jpg', '', '', '', '', 'סגול', '', '', '', '', '', 'סט מזוודות 3 חלקים \"דגם אולטרלייט\" 4 גלגלים צבע סגול 20/24/28 אינץ.מזוודות מהקלות בעולם עשויה מהחומרים העמידים והאיכותיים  ביותר.המזוודות היפות בעולם', 1, 2, 18, 3),
(83, 'סט מזוודות 4 גלגלים אולטרלייט צבע שחור', 1, 999, '9', 'excellent', 2, '', '/template/images/upload_images/52643.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/miz_ultra_shahor/20170311_154451_burned.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/miz_ultra_shahor/20170311_154527.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/miz_ultra_shahor/20170311_154633.jpg', '', '', '', '', 'שחור', '', '', '', '', '', 'סט מזוודות 3 חלקים \"דגם אולטרלייט\" 4 גלגלים צבע שחור 20/24/28 אינץ.מזוודות מהקלות בעולם עשויה מהחומרים העמידים והאיכותיים  ביותר.המזוודות היפות בעולם', 1, 0, 35, 8),
(84, 'מזוודה 4 גלגלים 28 אינץ ULTRALIGHTWEIGHT', 1, 900, '8', 'excellent', 3, '', '/template/images/upload_images/81910.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/miz_ultra_sagol/20170311_153819_burned.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/miz_ultra_shahor/20170311_154736.jpg', '', '', '', '', '', 'סגול', 'שחור', '', '', '', '', ' ULTRALIGHT  מזוודה אקסלנט  28 אינץ', 1, 0, 2, 0),
(85, 'מזוודה 4 גלגלים 24 אינץ ULTRALIGHTWEIGHT', 1, 700, '8', 'excellent', 4, '', '/template/images/upload_images/12962.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/miz_ultra_sagol/20170311_153845_burned.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/miz_ultra_shahor/20170311_154804_burned.jpg', '', '', '', '', '', 'סגול', 'שחור', '', '', '', '', ' ULTRALIGHT  מזוודה אקסלנט  24 אינץ', 1, 0, 5, 4),
(86, 'מזוודה 4 גלגלים 20 אינץ ULTRALIGHTWEIGHT', 1, 399, '8', 'excellent', 10, '', '/template/images/upload_images/55801.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/miz_ultra_shahor/20170311_154853.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/miz_ultra_sagol/20170311_153933_burned.jpg', '', '', '', '', '', 'שחור', 'סגול', '', '', '', '', ' ULTRALIGHT  מזוודה אקסלנט  20 אינץ', 1, 0, 4, 3),
(91, 'מזוודה דגם אלגנס 28 אינץ ', 1, 600, '7', 'excellent', 10, '', '/template/images/upload_images/60868.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/miz_4gal_cahol/20170311_163353.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/miz_4gal_shahor/20170311.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/miz_4gal_shahor/20170311_1.jpg', '', '', '', '', 'כחול', 'שחור', '', '', '', '', 'מזוודה 4 גלגלים גדולה Excellent 28אינץ', 1, 0, 2, 0),
(92, 'מזוודה דגם אלגנס 25 אינץ ', 1, 500, '7', 'excellent', 10, '', '/template/images/upload_images/35386.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/miz_4gal_cahol/20170311_163420.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/miz_4gal_shahor/201703.jpg', '', '', '', '', '', 'כחול', 'שחור', '', '', '', '', 'מזוודה 4 גלגלים קטנה Excellent 25אינץ', 1, 0, 3, 0),
(93, 'מזוודה דגם אלגנס 22 אינץ ', 1, 299, '7', 'excellent', 15, '', '/template/images/upload_images/43833.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/miz_4gal_shahor/20170311_165805_bned.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/miz_4gal_cahol/20170311_163438_burned.jpg', '', '', '', '', '', 'שחור', 'כחול', '', '', '', '', 'מזוודה 4 גלגלים קטנה Excellent 22אינץ', 1, 0, 1, 0),
(97, 'מזוודה 2 גלגלים 28 אינץ excellent', 1, 400, '7', 'excellent', 15, '', '/template/images/upload_images/80423.jpg', '', '/template/images/exccellent_foto_belii _fon/mizvadot/mizvada_2_gal_shahor/20170311_161548.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/mizvada_2_gal_cahol/2galgalimf.jpg', '', '', '', '', 'כחול', 'שחור', '', '', '', '', 'מזוודה 2 גלגלים 28 אינץ', 1, 0, 1, 1),
(98, 'מזוודה 2 גלגלים 24 אינץ excellent', 1, 300, '7', 'excellent', 2, '', '/template/images/upload_images/36221.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/mizvada_2_gal_cahol/v20170311_160615_burned.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/mizvada_2_gal_shahor/shahor2.jpg', '', '', '', '', '', 'כחול', 'שחור', '', '', '', '', 'מזוודה 2 גלגלים 24 אינץ', 1, 0, 1, 0),
(99, 'מזוודה 2 גלגלים 20 אינץ excellent', 1, 199, '7', 'excellent', 3, '', '/template/images/upload_images/11685.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/mizvada_2_gal_shahor/20170311_161737.jpg', '/template/images/exccellent_foto_belii _fon/mizvadot/mizvada_2_gal_cahol/2galgalimf.jpg', '', '', '', '', '', 'שחור', 'כחול', '', '', '', '', 'מזוודה 2 גלגלים 20 אינץ', 1, 0, 1, 3),
(125, 'תיק גב קידס', 2, 59, '6', 'excellent', 15, '', '/template/images/upload_images/41087.jpg', '/template/images/exccellent_foto_belii _fon/tik_gav/tik_gav_zaruk_kids/20170311_183527.jpg', '/template/images/exccellent_foto_belii _fon/tik_gav/tik_gav_zaruk_kids/20170311_183653_burned.jpg', '/template/images/exccellent_foto_belii _fon/tik_gav/tik_gav_zaruk_kids/20170311_183744_burned.jpg', '', '', '', '', 'ירוק', 'כחול', 'שחור', 'ורוד', 'סגול', '', 'תיק גב קטן ומגניב', 1, 0, 4, 3),
(105, 'תיק גב קנבס גדול', 2, 99, '8', 'excellent', 8, '', '/template/images/upload_images/28787.jpg', '/template/images/exccellent_foto_belii _fon/tik_gav/canvas_gav_gadol/20170311_193826_burned.jpg', '/template/images/exccellent_foto_belii _fon/tik_gav/canvas_gav_gadol/20170311_193959_burned.jpg', '/template/images/exccellent_foto_belii _fon/tik_gav/canvas_gav_gadol/20170311_194135_burned.jpg', '', '', '', '', 'זית', 'חאקי', 'שחור', '', '', '', 'תיק גב קנבס גדול', 1, 0, 6, 2),
(130, 'תיק גב אורטו', 2, 99, '7', 'excellent', 1, '', '/template/images/upload_images/40535.jpg', '/template/images/exccellent_foto_belii _fon/tik_gav/tik_orto/20170311_174402_burned.jpg', '/template/images/exccellent_foto_belii _fon/tik_gav/tik_orto/20170311_174437_burned.jpg', '/template/images/exccellent_foto_belii _fon/tik_gav/tik_orto/20170311_174309_burned.jpg', '', '', '', '', 'תכלת', 'שחור', 'ורוד', '', '', '', 'תיק גב אורטו.גדול ואיכותי.מתאים לבית ספר,סטודנטים ומטיילים.הגב ורצועות הכתפיים מרופדים מאוד ונוחים', 1, 2, 18, 3),
(108, 'תיק גב קנבס קטן', 2, 79, '8', 'excellent', 14, '', '/template/images/upload_images/32987.jpg', '/template/images/exccellent_foto_belii _fon/tik_gav/canvas_gav_katan/20170311_194656_burned.jpg', '/template/images/exccellent_foto_belii _fon/tik_gav/canvas_gav_katan/20170311_194704_burned.jpg', '/template/images/exccellent_foto_belii _fon/tik_gav/canvas_gav_katan/20170311_194710_burned.jpg', '', '', '', '', 'חאקי', 'זית', 'שחור', '', '', '', 'תיק גב קנבס קטן', 1, 1, 6, 3),
(133, 'תיק צד קנבס', 3, 69, '7', 'excellent', 14, '', '/template/images/upload_images/54262.jpg', '/template/images/exccellent_foto_belii _fon/tik_cad/canvas_cad/20170311_185704.jpg', '/template/images/exccellent_foto_belii _fon/tik_cad/canvas_cad/20170311_185617.jpg', '/template/images/exccellent_foto_belii _fon/tik_cad/canvas_cad/20170311_185448.jpg', '', '', '', '', 'שחור', 'חאקי', 'זית', '', '', '', 'תיק צד קנבס. יפהיפה,מרובה תאים וכמובן מהאיכות הגבוהה ביותר', 1, 2, 1, 3),
(111, 'תיק גב דגם אלפא', 2, 99, '7', 'excellent', 15, '', '/template/images/upload_images/13011.jpg', '/template/images/exccellent_foto_belii _fon/tik_gav/tik_gav_alfa/20170311_190327_burned.jpg', '/template/images/exccellent_foto_belii _fon/tik_gav/tik_gav_alfa/20170311_190800_burned.jpg', '/template/images/exccellent_foto_belii _fon/tik_gav/tik_gav_alfa/20170311_190817_burned.jpg', '', '', '', '', 'כחול', 'שחור', 'ירוק', 'אדום', '', '', 'תיק גב דגם אלפא 5 צבעים', 1, 0, 1, 11),
(137, 'חגורת כסף', 3, 59, '5', 'excellent', 2, '', '/template/images/upload_images/64855.jpg', '/template/images/exccellent_foto_belii _fon/tik_cad/hagurat_kesef/20170311_200311.jpg', '/template/images/exccellent_foto_belii _fon/tik_cad/hagurat_kesef/20170311_200223.jpg', '', '', '', '', '', 'שחור', 'אפור', '', '', '', '', 'חגורת כסף מקצועית - לשמירת כסף מוסווה(מוסתר) בנסיעה. כוללת גומי המתרחב ומתהדק בהתאם למבנה הגוף. כוללת סןפג זיעה.   כוללת ניילון ייעודי למזעור הסיכון להרטבות שטרות כסף (כמו בתמונה) אבל מומלץ לא לקחת סיכון מיוחד כמובן.תפקיד הניילון הוא אך ורק למזער את הסיכו', 1, 1, 12, 2),
(139, 'תיק חדר כושר', 3, 59, '6', 'excellent', 2, '', '/template/images/upload_images/24272.jpg', '/template/images/exccellent_foto_belii _fon/tik_cad/sport_tik_cad_gadol_shahor/20170311_191343.jpg', '/template/images/exccellent_foto_belii _fon/tik_cad/sport_tik_cad_gadol_adom/20170311_191510.jpg', '/template/images/exccellent_foto_belii _fon/tik_cad/sport_tik_cad_gadol_cahol/20170311_191316.jpg', '', '', '', '', 'שחור', 'כחול', 'אדום', '', '', '', 'תיק חדר כושר 3 צבעים. תיק מעולה באיכותו ומגניב במראהו. לחדר כושר,קאנטרי וגם לים ולטבע', 1, 1, 3, 5),
(115, 'תיק גב לייט-בג גדול', 2, 99, '8', 'excellent', 12, '', '/template/images/upload_images/49887.jpg', '/template/images/exccellent_foto_belii _fon/tik_gav/tik_gav_kipling_gadol/20170311_181301_burned.jpg', '/template/images/exccellent_foto_belii _fon/tik_gav/tik_gav_kipling_gadol/20170311_180958_burned.jpg', '/template/images/exccellent_foto_belii _fon/tik_gav/tik_gav_kipling_gadol/20170311_181436_burned.jpg', '', '', '', '', 'כחול', 'שחור', 'סגול', '', '', '', 'תיק גב לייט-בג גדול 3 צבעים', 1, 0, 8, 2),
(118, 'תיק גב לייט-בג קטן', 2, 79, '8', 'excellent', 14, '', '/template/images/upload_images/65516.jpg', '/template/images/exccellent_foto_belii _fon/tik_gav/tik_gav_kipling_katan/v20170311_175845_burned.jpg', '/template/images/exccellent_foto_belii _fon/tik_gav/tik_gav_kipling_katan/v20170311_175653_burned.jpg', '/template/images/exccellent_foto_belii _fon/tik_gav/tik_gav_kipling_katan/v20170311_175624_burned.jpg', '', '', '', '', 'שחור', 'כחול', 'סגול', '', '', '', 'תיק גב לייט-בג קטן', 1, 0, 5, 1),
(142, 'תיק צד לייט-בג', 3, 69, '7', 'excellent', 14, '', '/template/images/upload_images/78972.jpg', '/template/images/exccellent_foto_belii _fon/tik_cad/tik_cad_kipling/20170311_201344.jpg', '/template/images/exccellent_foto_belii _fon/tik_cad/tik_cad_kipling/20170311_201350.jpg', '/template/images/exccellent_foto_belii _fon/tik_cad/tik_cad_kipling/20170311_201338.jpg', '', '', '', '', 'שחור', 'כחול', 'סגול', '', '', '', 'תיק צד לייט-בג. איכותי,קל,נוח ומגניב', 1, 22, 5, 3),
(122, 'תיק גב ספורט', 2, 79, '7', 'excellent', 2, '', '/template/images/upload_images/30994.jpg', '/template/images/exccellent_foto_belii _fon/tik_gav/tik_gav_sport/20170311_182852_burned.jpg', '/template/images/exccellent_foto_belii _fon/tik_gav/tik_gav_sport/20170311_182946_burned.jpg', '/template/images/exccellent_foto_belii _fon/tik_gav/tik_gav_sport/20170311_182921_burned.jpg', '', '', '', '', 'כתום', 'ירוק', 'שחור', '', '', '', 'תיק גב ספורט', 1, 0, 7, 2),
(146, 'תיק רחצה גדול', 3, 59, '6', 'excellent', 14, '', '/template/images/upload_images/86358.jpg', '/template/images/exccellent_foto_belii _fon/tik_cad/tik_rahaca/20170311_182146.jpg', '', '', '', '', '', '', 'שחור', '', '', '', '', '', 'תיק רחצה גדול.שלושה תאים.חומר מבודד לדחיית מים,מתאים לנופש\\צבא\\בית', 1, 5, 26, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `product_order`
--

CREATE TABLE `product_order` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `user_comment` text NOT NULL,
  `town` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mikud` varchar(255) NOT NULL,
  `products` text NOT NULL,
  `num_order` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date_of_order` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_order`
--

INSERT INTO `product_order` (`id`, `user_name`, `user_phone`, `totalPrice`, `user_comment`, `town`, `adress`, `email`, `mikud`, `products`, `num_order`, `status`, `date_of_order`) VALUES
(276, 'קרקק', 'קקק', 475, '', 'קק', 'קקק', '5233253', '5323223', '115,108,105 | 2,1,2 | כחול שחור,חאקי,זית חאקי', 6816, 1, '2017-08-11 02:14:27'),
(277, 'טסט', 'טסט', 99, '', 'טסט', 'טסט', 'טסט', 'טסט', '115 | 1 | סגול', 8842, 0, '2017-08-13 12:16:37'),
(292, 'naumtest', 't', 99, '', 'te', 't', 't', 't', '105 | 1 | זית', 433, 0, '2017-08-20 18:29:06'),
(293, 'ttt', 'tt', 2077, '', 'ttt', 'tt', 'tt', 'tt', '82,108 | 2,1 | סגול סגול,חאקי', 2568, 0, '2017-08-20 18:55:57'),
(284, 'naum', 'rrrr', 999, '', 'rrr', 'rrr', 'rr', 'rrrr', '83 | 1 | שחור', 8829, 0, '2017-08-17 16:03:40'),
(298, 'naum', 'teste', 699, '', 'tttetet', 'teste', 'tste', 'tst', '80 | 1 | כחול', 2014, 0, '2017-09-19 18:58:21'),
(297, 'testtesttest', 'etestets', 1404, '', 'testetst', 'testetst', 'tetstets', 'tetste', '105,83,142 | 2,1,3 | זית חאקי,שחור,כחול סגול שחור', 426, 0, '2017-09-13 22:02:33'),
(296, 'ttes', 'tetse', 237, '', 'tetsts', 'te', 'tes', 'tes', '108 | 3 | חאקי שחור זית', 4519, 0, '2017-09-13 19:30:51');

-- --------------------------------------------------------

--
-- Структура таблицы `stat`
--

CREATE TABLE `stat` (
  `id` int(11) NOT NULL,
  `date_of_enters` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `stat`
--

INSERT INTO `stat` (`id`, `date_of_enters`) VALUES
(2, '2017-10-14 14:56:41'),
(3, '2017-10-14 14:57:06'),
(4, '2017-10-14 14:57:12'),
(5, '2017-10-14 15:06:31'),
(6, '2017-10-14 15:10:08'),
(7, '2017-10-14 15:10:20'),
(8, '2017-10-14 15:24:24'),
(9, '2017-10-14 15:41:34'),
(10, '2017-10-14 15:45:10'),
(11, '2017-10-14 15:45:15'),
(12, '2017-10-14 16:35:20'),
(13, '2017-10-14 17:11:31'),
(14, '2017-10-14 17:18:26'),
(15, '2017-10-14 17:20:57'),
(16, '2017-10-14 17:24:21'),
(17, '2017-10-14 17:26:21'),
(18, '2017-10-14 17:26:30'),
(19, '2017-10-14 18:45:53'),
(20, '2017-10-14 18:46:31'),
(21, '2017-10-14 18:46:48'),
(22, '2017-10-14 18:48:03'),
(23, '2017-10-30 17:35:58'),
(24, '2017-10-30 17:58:04'),
(25, '2017-11-18 14:43:49'),
(26, '2017-11-18 14:44:06'),
(27, '2017-11-18 14:57:16'),
(28, '2017-11-18 15:00:08'),
(29, '2017-11-18 15:01:06'),
(30, '2017-11-18 15:01:22'),
(31, '2017-11-20 15:24:36'),
(32, '2017-11-20 15:24:52'),
(33, '2017-11-20 15:27:19'),
(34, '2017-11-20 15:31:52'),
(35, '2017-11-20 15:32:58');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `like_products` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `like_products`) VALUES
(17, 'naum', 'naum@test.ru', '$1$o14.R.3.$2joFxjOJV3byR4dESAEm51', '82,115'),
(18, 'test', 'test@test.ru', '$1$Vn2.4c5.$KK7gk3JFwFr97Jya0EBEt/', '161,86,108,73,139,118,130,122,125'),
(19, 'naum4331', 'naum4331@test.ru', '$1$6k4.Vy/.$L6qIsvSIzik2IQ7O1Vjkz0', ''),
(20, 'lala', 'fsafsaf@fsdfa.ru', '$1$b04.IZ1.$FBsleCysZWfHRU3XBYLyZ1', '105,130');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stat`
--
ALTER TABLE `stat`
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
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;
--
-- AUTO_INCREMENT для таблицы `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;
--
-- AUTO_INCREMENT для таблицы `stat`
--
ALTER TABLE `stat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

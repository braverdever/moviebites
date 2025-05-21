-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2025 at 10:12 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `quizx`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `image` varchar(200) NOT NULL,
  `role` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `username`, `email`, `password`, `mobile`, `image`, `role`) VALUES
(1, 'admin', 'admin', 'shrisolution6@gmail.com', 'admin', '', 'profile.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `chatters`
--

CREATE TABLE `chatters` (
  `name` text NOT NULL,
  `seen` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chat_rooms`
--

CREATE TABLE `chat_rooms` (
  `chat_room_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_rooms`
--

INSERT INTO `chat_rooms` (`chat_room_id`, `user_id`, `name`, `status`, `created_at`) VALUES
(1, '1,6,5,39', 'Material Design', '1', '2016-01-05 19:57:40'),
(6, '1,5,6,45', 'Android Support Design Library', '1', '2016-01-05 19:58:46'),
(7, '1,5,31,52,56,61', 'Android Studio', '1', '2016-01-05 19:58:46'),
(8, '1,5,9,11,12,35,37', 'Realtime Chat App', '1', '2016-01-05 19:58:46'),
(13, '2,4,3,6,5,7,9,29', 'firebase tilte demo', '1', '2019-04-27 04:57:23'),
(14, '7,10,9,21,6,5,33,26,42,47', 'Current Affairs', '1', '2020-02-06 17:30:59'),
(15, '11,60', 'testing', '0', '2020-02-06 18:08:52'),
(17, '30', 'testing', '0', '2020-02-08 07:14:50'),
(18, '37', 'ughhh', '0', '2020-02-08 09:21:12'),
(19, '45,53', 'Sport', '1', '2020-02-09 11:47:16'),
(20, '44,52,58', 'sport', '1', '2020-02-09 11:58:14'),
(21, '58,60', 'sehat', '1', '2020-02-10 16:12:09'),
(22, '63', 'Telugu', '1', '2020-02-11 07:14:22');

-- --------------------------------------------------------

--
-- Table structure for table `current_affers`
--

CREATE TABLE `current_affers` (
  `id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `descr` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `current_affers`
--

INSERT INTO `current_affers` (`id`, `date`, `title`, `descr`, `image`) VALUES
(3, '18/09/18', 'ISRO launches two satellites NovaSAR and S1-4 using PSLV-C42', '<p>Indian Space Research Organisation&nbsp;<strong>(ISRO)</strong> successfully launched two satellites&mdash; NovaSAR and S1-4-belonging to United Kingdom (UK) based Surrey Satelli... ........ currentaffairs.gktoday.in/month/current-affairs-september-2018 &copy; GKToday</p>\r\n', '61947_Japan-launches-ASTRO-H-satellite-to-study-black-holes-150x150.jpg'),
(4, '02/10/18', 'PM Narendra Modi conferred UNEP Champions of Earth Award 2018', '<p>Prime Minister Narendra Modi was conferred with United Nation&rsquo;s Champions of the Earth Award by UN Secretary General Antonio Guterres at ceremony in Delhi. He is among the six winners who received this award.&nbsp;</p>\r\n', '42228_Champions-of-Earth-Award.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `descri_prepa`
--

CREATE TABLE `descri_prepa` (
  `id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `descr` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `descri_prepa`
--

INSERT INTO `descri_prepa` (`id`, `date`, `title`, `descr`, `image`) VALUES
(2, '25/10/18', 'Sky News Arabic', '<p>reee</p>\r\n', '15739_architecture-art-building-165559.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `editional_vocab`
--

CREATE TABLE `editional_vocab` (
  `id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `descr` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `editional_vocab`
--

INSERT INTO `editional_vocab` (`id`, `date`, `title`, `descr`, `image`) VALUES
(1, '22/10/18', '[The Hindu] Amritsar disaster: avoidable tragedy', '<p>In a shocking and terrible disaster, at least 61 people were crushed by a train at Amritsar in Punjab on Friday while they were watching the burning of Ravan effigy on the occasion of Dussehra. The Amritsar train accident took place near Joda Phatak area of Choura Bazar. The train was en route from Jalandhar to Amritsar.</p>\r\n', '17413_images (2).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`id`, `title`, `description`, `duration`, `release_date`, `created_at`, `updated_at`) VALUES
(1, 'Episode 1: The Beginning', NULL, NULL, NULL, '2025-05-14 12:10:55', '2025-05-14 12:10:55'),
(2, 'Episode 2: The Mystery', NULL, NULL, NULL, '2025-05-14 12:10:55', '2025-05-14 12:10:55'),
(3, 'Episode 3: The Reveal', NULL, NULL, NULL, '2025-05-14 12:10:55', '2025-05-14 12:10:55');

-- --------------------------------------------------------

--
-- Table structure for table `hot_gk`
--

CREATE TABLE `hot_gk` (
  `id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `descr` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hot_gk`
--

INSERT INTO `hot_gk` (`id`, `date`, `title`, `descr`, `image`) VALUES
(1, '01/10/18', 'English', '<p>grammer</p>\r\n', '482_38_21-04-2018_Getafe_logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `latest_news`
--

CREATE TABLE `latest_news` (
  `id` int(11) NOT NULL,
  `date` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `descr` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(500) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `latest_news`
--

INSERT INTO `latest_news` (`id`, `date`, `title`, `descr`, `image`) VALUES
(1, '06/08/19', 'होम | देश | धारा 370 को हटाए जाने पर कांग्रेस के पूर्व अध्यक्ष राहुल गांधी ने दिया बयान', '<p>केंद्र सरकार द्वारा जम्मू-कश्मीर से धारा 370 हटाए जाने पर कांग्रेस के पूर्व अध्यक्ष&nbsp;<a href=\"https://khabar.ndtv.com/news/india/milind-deora-proposes-sachin-pilot-or-jyotiraditya-scindia-for-congress-president-2080197\" target=\"_self\">राहुल गांधी (Rahul Gandhi)</a>&nbsp;ने पहली बार प्रतिक्रिया दी है.&nbsp;<a href=\"https://khabar.ndtv.com/news/india/priyanka-gandhi-vadra-can-unite-the-congress-as-president-says-karn-singh-2080160\" target=\"_self\">उन्होंने (Rahul Gandhi)</a>&nbsp;NDTV से कहा कि चुकि वह अब पार्टी के अध्यक्ष नहीं है इसलिए वह इस मुद्दे पर बैठक नहीं बुला सकते. सूत्रों से मिला जानकारी के अनुसार धारा 370 हटाए जाने को लेकर पहले कांग्रेस पार्टी के अंदर स्थिति साफ नहीं थी लेकिन अब पार्टी में इस फैसले का विरोध करने पर सहमति बन गई है. कांग्रेस के अनुसार जिस तरह से इस धारा को हटाया गया है वह तरीका सही नहीं है.&nbsp;</p>\r\n', '94437_99db79fb9c4ab753e8cfdad71192e33e.png'),
(2, '26/08/19', 'पूर्व पीएम मनमोहन सिंह की सुरक्षा में कटौती, SPG नहीं अब Z+ कवर', '<p align=\"justify\">पूर्व प्रधानमंत्री मनमोहन सिंह से स्पेशल प्रोटेक्शन ग्रुप (एसपीजी) की सुरक्षा वापस ले ली गई है. इस बाबत गृह मंत्रालय ने कहा कि वर्तमान सुरक्षा कवर की समीक्षा की गई है. यह समीक्षा सुरक्षा एजेंसियों की ओर से संभावित खतरे को देखते हुए की जाती है. गृह मंत्रालय की ओर से कहा गया है कि एसपीजी सुरक्षा हटाए जाने के बाद मनमोहन सिंह को जेड प्लस की सुरक्षा कवर दी जाएगी.</p>\r\n\r\n<p align=\"justify\">गृह मंत्रालय ने पिछले महीने भी देश के कई बड़े नेताओं को मुहैया कराई जाने वाली सुरक्षा की समीक्षा की थी. गृह मंत्रालय की ओर से जारी आदेश के मुताबिक, आरजेडी अध्यक्ष लालू प्रसाद यादव, बीएसपी सांसद सतीश चंद्र मिश्रा, यूपी बीजेपी के नेता संगीत सोम, बीजेपी सांसद राजीव प्रताप रूडी की सुरक्षा घटा दी गई.</p>\r\n', '54334_manmohan_singh.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `chat_room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `chat_room_id`, `user_id`, `message`, `created_at`) VALUES
(1, 13, 2, 'hello', '0000-00-00 00:00:00'),
(2, 13, 2, 'hello', '0000-00-00 00:00:00'),
(3, 13, 2, 'hello', '0000-00-00 00:00:00'),
(4, 13, 2, 'hello', '0000-00-00 00:00:00'),
(5, 13, 2, 'hello', '0000-00-00 00:00:00'),
(6, 13, 2, 'hello', '0000-00-00 00:00:00'),
(7, 13, 2, 'hello', '0000-00-00 00:00:00'),
(8, 13, 2, 'hello', '2019-05-01 14:41:42'),
(9, 13, 2, 'hello', '2019-05-01 18:12:21'),
(10, 13, 6, 'hello', '2020-02-05 13:26:53'),
(11, 13, 6, 'all friend where are you', '2020-02-05 13:27:29'),
(12, 13, 5, 'how r you...', '2020-02-05 13:28:08'),
(13, 8, 5, 'hhhhiiiiii', '2020-02-05 13:29:51'),
(14, 7, 5, 'heyyyy', '2020-02-05 13:30:11'),
(15, 6, 5, 'jskk', '2020-02-05 13:30:22'),
(16, 1, 6, 'hmmm', '2020-02-05 13:30:35'),
(17, 1, 5, 'yesss', '2020-02-05 13:30:44'),
(18, 1, 5, 'heyyyy', '2020-02-05 13:30:54'),
(19, 6, 5, 'kkk', '2020-02-05 13:31:10'),
(20, 6, 5, 'g', '2020-02-05 13:31:23'),
(21, 8, 5, 'jskkk', '2020-02-05 13:32:02'),
(22, 13, 7, 'hi', '2020-02-06 22:54:29'),
(23, 13, 9, 'hi', '2020-02-06 22:59:08'),
(24, 8, 9, 'hi', '2020-02-06 22:59:21'),
(25, 14, 7, 'hi', '2020-02-06 23:01:04'),
(26, 14, 10, 'hello', '2020-02-06 23:03:46'),
(27, 14, 9, 'hi', '2020-02-06 23:28:28'),
(28, 8, 11, 'hwllo', '2020-02-06 23:38:39'),
(29, 8, 12, 'hello rasel', '2020-02-07 00:26:21'),
(31, 14, 21, 'hello', '2020-02-07 10:14:49'),
(35, 1, 6, 'yes rahul', '2020-02-07 10:26:17'),
(36, 6, 6, 'GM rahul', '2020-02-07 10:26:36'),
(37, 13, 6, 'GM friend', '2020-02-07 10:26:55'),
(39, 14, 6, 'hi', '2020-02-07 10:27:50'),
(40, 14, 6, 'hi', '2020-02-07 10:27:50'),
(41, 14, 5, 'jskkk', '2020-02-07 10:28:18'),
(42, 13, 29, 'uuhj', '2020-02-07 22:02:45'),
(43, 13, 29, 'uuhj', '2020-02-07 22:02:46'),
(44, 7, 31, 'hi', '2020-02-08 01:36:25'),
(45, 14, 33, 'hii', '2020-02-08 07:54:58'),
(46, 8, 35, 'hh', '2020-02-08 10:58:16'),
(47, 18, 37, 'hi', '2020-02-08 14:51:17'),
(48, 18, 37, 'hello', '2020-02-08 14:51:23'),
(49, 8, 37, 'hi', '2020-02-08 14:51:33'),
(50, 14, 26, 'hello', '2020-02-08 22:26:22'),
(51, 1, 39, 'hello', '2020-02-08 23:10:09'),
(52, 14, 42, 'bb', '2020-02-09 16:36:01'),
(53, 14, 42, 'bb', '2020-02-09 16:36:02'),
(54, 6, 45, 'What is this chat all about', '2020-02-09 17:16:47'),
(55, 19, 45, 'Hi there is it OK if I come tomorrow morning or tomorrow morning to arrange the pickup for the', '2020-02-09 17:17:44'),
(56, 14, 47, 'hy', '2020-02-09 20:48:00'),
(57, 20, 52, 'Hi', '2020-02-10 10:47:27'),
(58, 7, 52, 'hi', '2020-02-10 10:47:35'),
(59, 19, 53, 'Hello all chuhu', '2020-02-10 11:40:32'),
(60, 7, 56, 'hello', '2020-02-10 14:19:34'),
(61, 21, 58, 'hali', '2020-02-10 21:42:16'),
(62, 20, 58, 'hi', '2020-02-10 21:42:26'),
(63, 20, 58, 'whats up man ?', '2020-02-10 21:42:38'),
(64, 21, 60, '.??', '2020-02-11 04:15:41'),
(65, 15, 60, 'nice', '2020-02-11 04:15:57'),
(66, 21, 58, 'I want to ask a question', '2020-02-11 04:54:42'),
(67, 7, 61, 'hi', '2020-02-11 05:29:34'),
(68, 22, 63, 'ttt', '2020-02-11 12:44:29');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_status` varchar(20) DEFAULT NULL,
  `method` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `transaction_id`, `payment_date`, `amount`, `payment_status`, `method`) VALUES
(1, 1, NULL, '2024-06-01 00:00:00', '9.99', NULL, 'Credit Card'),
(2, 1, NULL, '2024-06-05 00:00:00', '2.99', NULL, 'PayPal');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `q_id` int(11) NOT NULL,
  `quiz_id` int(10) NOT NULL,
  `q_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `question_type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `no_of_answer` varchar(5) CHARACTER SET utf8 NOT NULL,
  `q_thumbnail` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `choice_a` varchar(100) CHARACTER SET utf8 NOT NULL,
  `choice_b` varchar(100) CHARACTER SET utf8 NOT NULL,
  `choice_c` varchar(100) CHARACTER SET utf8 NOT NULL,
  `choice_d` varchar(100) CHARACTER SET utf8 NOT NULL,
  `choice_e` varchar(100) CHARACTER SET utf8 NOT NULL,
  `answer` varchar(100) CHARACTER SET utf8 NOT NULL,
  `explanation` varchar(255) CHARACTER SET utf8 NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `que_back_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`q_id`, `quiz_id`, `q_title`, `question_type`, `no_of_answer`, `q_thumbnail`, `choice_a`, `choice_b`, `choice_c`, `choice_d`, `choice_e`, `answer`, `explanation`, `file_type`, `que_back_image`) VALUES
(1, 1, 'The first letter of the first word in a sentence should be', 'regular', '4', '', 'a large letter', 'a capital letter', 'the capital letter', 'an capital letter', '', 'Choice_B', 'a capital letter\n<img src =\"http://bytotech.com/envato/quiz/Qusestion_Images/eng_grm.png\" />', 'text', '<img src = http://bytotech.com/envato/quiz/Qusestion_Images/eng_grm.pngeng_grm.png>'),
(2, 1, 'The order of a basic positive sentence is', 'regular', '4', '', 'Subject-Verb-Object ', 'Verb-Object-Subject', 'Verb-Object-line', 'Subject-Verb-line', '', 'Choice_A', 'Subject-Verb-Object \n<img src =\"http://bytotech.com/envato/quiz/Qusestion_Images/eng_grm.png\" />', 'text', '<img src = http://bytotech.com/envato/quiz/Qusestion_Images/eng_grm.pngeng_grm.png>'),
(3, 1, 'Every sentence must have a subject and', 'regular', '4', '', ' a verb', 'an object', ' an verb', ' the verb', '', 'Choice_A', ' a verb\n<img src =\"http://bytotech.com/envato/quiz/Qusestion_Images/eng_grm.png\" />', 'text', '<img src = http://bytotech.com/envato/quiz/Qusestion_Images/eng_grm.pngeng_grm.png>'),
(4, 1, 'A plural subject needs', 'regular', '4', '', 'a singular verb', 'a plural verb', 'the plural verb', 'an plural verb', '', 'Choice_B', 'a plural verb\n<img src =\"http://bytotech.com/envato/quiz/Qusestion_Images/eng_grm.png\" />', 'text', '<img src = http://bytotech.com/envato/quiz/Qusestion_Images/eng_grm.pngeng_grm.png>'),
(5, 1, 'When two singular subjects are connected by or, use', 'regular', '4', '', 'a singular verb', 'a plural verb', 'an singular verb', 'the singular verb', '', 'Choice_A', 'a singular verb\n<img src =\"http://bytotech.com/envato/quiz/Qusestion_Images/eng_grm.png\" />', 'text', '<img src = http://bytotech.com/envato/quiz/Qusestion_Images/eng_grm.pngeng_grm.png>'),
(6, 2, 'વિશેષણ ઓળખાવો : જરા દૂધ આપો.', 'regular', '4', '', 'દર્શક વાચક', 'સંખ્યા વાચક', 'ગુણ વાચક', 'પરિમાણ વાચક', '', 'Choice_D', 'પરિમાણ વાચક\n<img src =\"http://bytotech.com/envato/quiz/Qusestion_Images/guj_grm.png\" />', 'text', '<img src = http://bytotech.com/envato/quiz/Qusestion_Images/guj_grm.pngguj_grm.png>'),
(7, 2, 'રૂઢીપ્રયોગનો અર્થ લખો : કાળસ કાઢવું', 'regular', '4', '', 'આખર આવવી', 'દશા બદલવી', 'આફત આવવી', 'મારી નાખવું', '', 'Choice_D', 'મારી નાખવું\n<img src =\"http://bytotech.com/envato/quiz/Qusestion_Images/guj_grm.png\" />', 'text', '<img src = http://bytotech.com/envato/quiz/Qusestion_Images/guj_grm.pngguj_grm.png>'),
(8, 2, 'શબ્દસમૂહ માટે એક શબ્દ આપો : જેમાં બધા પ્રકારનો મેળ હોય તે.', 'regular', '4', '', 'સામંજસ્ય', 'ભરપૂર', 'સમકરણ', 'બહુમેળ', '', 'Choice_A', 'સામંજસ્ય\n<img src =\"http://bytotech.com/envato/quiz/Qusestion_Images/guj_grm.png\" />', 'text', '<img src = http://bytotech.com/envato/quiz/Qusestion_Images/guj_grm.pngguj_grm.png>'),
(9, 2, 'સંધી છોડો : પ્રતિચ્છાયા', 'regular', '4', '', 'પ્રતિ+છાયા', 'પ્રતી+અચ્છાયા', 'પ્રતિ+અચ્છાયા', 'પ્રતી+છાયા', '', 'Choice_A', 'પ્રતિ+છાયા\n<img src =\"http://bytotech.com/envato/quiz/Qusestion_Images/guj_grm.png\" />', 'text', '<img src = http://bytotech.com/envato/quiz/Qusestion_Images/guj_grm.pngguj_grm.png>'),
(10, 2, '\"અલંકાર ઓળખાવો : તને મળવાનું મને એવું છે મન, મળવાને એક કરું ધરતી ગગન. \"', 'regular', '4', '', 'અંત્યાનુપ્રાસ', 'ઉત્પ્રેક્ષા', 'ઉપમા', 'રૂપક', '', 'Choice_A', 'અંત્યાનુપ્રાસ\n<img src =\"http://bytotech.com/envato/quiz/Qusestion_Images/guj_grm.png\" />', 'text', '<img src = http://bytotech.com/envato/quiz/Qusestion_Images/guj_grm.pngguj_grm.png>'),
(11, 3, 'रंचक-रंजक शब्द युग्म का अर्थ है ?', 'regular', '4', '', 'दातून-काजल', 'रिक्त-खून', 'रत्न-सर्प', 'थोड़ा-मेंहदी', '', 'Choice_D', 'थोड़ा-मेंहदी\n<img src =\"http://bytotech.com/envato/quiz/Qusestion_Images/hinidi.png\" />', 'text', '<img src = http://bytotech.com/envato/quiz/Qusestion_Images/hinidi.pnghinidi.png>'),
(12, 3, 'पार्थक्य का संधि विच्छेद होगा_', 'regular', '4', '', 'पृथक्+अ', 'पृथक्+य', 'पार्थ+ क्य', 'पर्थक्+य', '', 'Choice_B', 'पृथक्+य\n<img src =\"http://bytotech.com/envato/quiz/Qusestion_Images/hinidi.png\" />', 'text', '<img src = http://bytotech.com/envato/quiz/Qusestion_Images/hinidi.pnghinidi.png>'),
(13, 3, 'मात्रा के आधार पर स्वरो की संख्या होती है ?', 'regular', '4', '', '9', '10', '11', 'इनमें से कोई नहीं', '', 'Choice_C', '10\n<img src =\"http://bytotech.com/envato/quiz/Qusestion_Images/hinidi.png\" />', 'text', '<img src = http://bytotech.com/envato/quiz/Qusestion_Images/hinidi.pnghinidi.png>');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `qz_id` int(11) NOT NULL,
  `quiz_title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `cat_id` int(10) NOT NULL,
  `sub_cat_id` int(10) NOT NULL,
  `no_of_question` varchar(200) CHARACTER SET utf8 NOT NULL,
  `quiz_time` time NOT NULL,
  `dates` varchar(100) NOT NULL,
  `paid_category` varchar(200) CHARACTER SET utf8 NOT NULL,
  `paid_price` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `q_thumbnail_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`qz_id`, `quiz_title`, `cat_id`, `sub_cat_id`, `no_of_question`, `quiz_time`, `dates`, `paid_category`, `paid_price`, `q_thumbnail_image`) VALUES
(1, 'English Grammer', 17, 65, '', '00:05:00', '2020-02-05', '', '0', 'eng_grm.png'),
(2, 'Gujarati Vykran', 18, 64, '', '00:05:00', '2020-02-05', '', '0', 'guj_grm.png'),
(3, 'Hindi vykran', 19, 66, '', '00:03:00', '2020-02-05', '', '0', 'hinidi.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aboutus`
--

CREATE TABLE `tbl_aboutus` (
  `id` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_aboutus`
--

INSERT INTO `tbl_aboutus` (`id`, `description`) VALUES
(1, '<p><strong>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.</strong></p>\r\n\r\n<p>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n'),
(2, '<p><strong>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.</strong></p>\r\n\r\n<p>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n'),
(3, '<p><b>Policy</b></p>\r\n\r\n<p>Lorem Ipsum has been&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cid` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cid`, `category_name`, `category_image`, `status`) VALUES
(26, 'Horror', '', 1),
(27, 'Hidden Identity', '', 1),
(28, 'Love at first sight', '', 1),
(29, 'Toxic & Taboo', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contactus`
--

CREATE TABLE `tbl_contactus` (
  `id` int(11) NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `lattitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `landline_number` varchar(15) NOT NULL,
  `skype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contactus`
--

INSERT INTO `tbl_contactus` (`id`, `address`, `lattitude`, `longitude`, `email`, `mobile_number`, `landline_number`, `skype`) VALUES
(1, '<p>801, Dev Prime,&nbsp;<br />\r\nopp palladium Building,&nbsp;<br />\r\nOff to Sabarmati Ford Showroom, S.G.Highway,&nbsp;<br />\r\nMakarba, Ahmedabad, Gujarat 380058</p>\r\n', '22.9986992', '72.5010674', 'bytotechsolution@gmail.com', '+91 960150131', ' +91 79 4003 48', 'live:bytotechsolution');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_favorite`
--

CREATE TABLE `tbl_favorite` (
  `f_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `w_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_favorite`
--

INSERT INTO `tbl_favorite` (`f_id`, `user_id`, `w_id`, `created_at`) VALUES
(1, 1, 13, '2024-05-24 19:09:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_membership`
--

CREATE TABLE `tbl_membership` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(150) NOT NULL,
  `m_duration` varchar(150) NOT NULL,
  `m_price` float NOT NULL,
  `m_price_uk` float NOT NULL,
  `m_price_cd` float NOT NULL,
  `m_price_au` float NOT NULL,
  `m_price_nz` float NOT NULL,
  `m_price_inr` float NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_membership`
--

INSERT INTO `tbl_membership` (`m_id`, `m_name`, `m_duration`, `m_price`, `m_price_uk`, `m_price_cd`, `m_price_au`, `m_price_nz`, `m_price_inr`, `created_at`) VALUES
(2, 'Weekly VIP', '7', 15.55, 10, 25, 28, 30, 999, '2024-05-27 14:44:36'),
(3, 'Yearly VIP', '365', 300, 200, 400, 450, 430, 19999, '2024-05-27 14:45:43'),
(4, 'Basic Plan', '30', 9.99, 7.99, 12.99, 14.99, 15.99, 799, '2025-05-15 20:40:51'),
(5, 'Premium Plan', '90', 24.99, 19.99, 32.99, 37.99, 39.99, 1999, '2025-05-15 20:40:51'),
(6, 'Ultimate Plan', '365', 99.99, 79.99, 129.99, 149.99, 159.99, 7999, '2025-05-15 20:40:51'),
(7, 'Premium Plan', '90', 24.99, 19.99, 32.99, 37.99, 39.99, 1999, '2025-05-15 20:41:25'),
(8, 'Premium Plan', '90', 24.99, 19.99, 32.99, 37.99, 39.99, 1999, '2025-05-15 20:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`id`, `title`, `description`, `image`, `date`) VALUES
(9, 'Test', 'Test', '', ''),
(10, 'Test', 'Hi from admin', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qz_id` int(11) NOT NULL,
  `payment_status` varchar(10) CHARACTER SET utf8 NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `user_id`, `qz_id`, `payment_status`) VALUES
(19, 1, 119, '1'),
(21, 13, 119, '1'),
(22, 2147483647, 119, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_plans`
--

CREATE TABLE `tbl_plans` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_price` float NOT NULL,
  `p_price_uk` float NOT NULL,
  `p_price_cd` float NOT NULL,
  `p_price_au` float NOT NULL,
  `p_price_nz` float NOT NULL,
  `p_price_inr` float NOT NULL,
  `p_coins` int(11) NOT NULL,
  `p_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `p_bonus` int(11) NOT NULL,
  `p_bonus_percentage` int(11) NOT NULL,
  `p_bonus_coins` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_plans`
--

INSERT INTO `tbl_plans` (`p_id`, `p_name`, `p_price`, `p_price_uk`, `p_price_cd`, `p_price_au`, `p_price_nz`, `p_price_inr`, `p_coins`, `p_description`, `created_at`, `p_bonus`, `p_bonus_percentage`, `p_bonus_coins`) VALUES
(1, 'First', 3, 2, 5.5, 6.5, 8.5, 499, 500, '', '0000-00-00 00:00:00', 1, 10, '50'),
(3, 'Second', 10, 11.15, 13, 15.7, 18.9, 999, 1000, '', '0000-00-00 00:00:00', 1, 10, '100'),
(4, 'Third', 1.5, 1, 5.5, 4, 4.5, 99.15, 100, '', '0000-00-00 00:00:00', 0, 0, ''),
(5, 'Fourth', 15.15, 10.2, 16.3, 15.85, 20.2, 1999, 2000, '', '0000-00-00 00:00:00', 1, 20, '400'),
(6, 'Fifth', 20.23, 16.31, 25.25, 25.78, 30.25, 2499, 2500, '', '0000-00-00 00:00:00', 1, 35, '875'),
(7, 'Sixth', 14.12, 10.5, 14.89, 15.36, 26.32, 1499, 1500, '', '0000-00-00 00:00:00', 1, 20, '300');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_score`
--

CREATE TABLE `tbl_score` (
  `id` int(11) NOT NULL,
  `qz_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `quiz_time` varchar(200) NOT NULL,
  `score` float NOT NULL,
  `total_score` varchar(100) NOT NULL,
  `total_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_score`
--

INSERT INTO `tbl_score` (`id`, `qz_id`, `user_id`, `quiz_time`, `score`, `total_score`, `total_time`) VALUES
(2, 120, '106511184090904978843', '00:00:03', -0.25, '2', '00:20:00'),
(3, 121, '1818337268244125', '00:00:02', 1, '1', '00:10:10'),
(4, 120, '1818337268244125', '00:00:04', 2, '0.75', '00:20:00'),
(5, 120, '110842657470946279865', '00:00:08', 0.75, '2', '00:20:00'),
(6, 117, '110842657470946279865', '00:00:11', 1, '-0.25', '00:10:00'),
(8, 121, '106511184090904978843', '00:00:03', 1, '1', '00:10:10'),
(9, 118, '110842657470946279865', '00:00:10', 1, '1', '00:15:00'),
(10, 1, '5', '0:4:18', -1.25, '5', '0:0:8'),
(11, 2, '5', '0:0:19', -1.25, '5', '0:2:58'),
(12, 3, '5', '0:0:2', 1.75, '3', '0:2:19'),
(13, 1, '7', '0:0:33', -1.5, '5', '00:05:00'),
(14, 3, '7', '0:0:8', -0.75, '3', '00:03:00'),
(15, 1, '9', '0:4:14', -1.25, '5', '0:0:7'),
(16, 2, '9', '0:0:14', 0, '5', '00:05:00'),
(17, 2, '7', '0:0:9', 1.25, '5', '00:05:00'),
(18, 1, '10', '0:0:7', -0.25, '5', '00:05:00'),
(19, 1, '11', '0:1:2', 3.75, '5', '00:05:00'),
(20, 2, '11', '0:0:11', -0.75, '5', '00:05:00'),
(21, 1, '12', '0:0:6', -0.25, '5', '00:05:00'),
(22, 1, '15', '0:0:4', 1, '5', '00:05:00'),
(23, 1, '16', '0:0:11', -0.25, '5', '00:05:00'),
(24, 1, '17', '0:0:59', 0, '5', '00:05:00'),
(25, 1, '18', '0:0:6', 1, '5', '00:05:00'),
(26, 1, '19', '0:1:10', -1.25, '5', '00:05:00'),
(27, 1, '20', '0:0:4', -0.25, '5', '00:05:00'),
(28, 3, '20', '0:2:44', -0.75, '3', '0:0:3'),
(29, 2, '20', '0:0:13', 2.25, '5', '00:05:00'),
(30, 3, '21', '0:0:13', 0.5, '3', '00:03:00'),
(31, 1, '24', '0:0:5', -0.25, '5', '00:05:00'),
(32, 1, '28', '0:0:6', -0.25, '5', '00:05:00'),
(33, 1, '30', '0:0:20', 0, '5', '00:05:00'),
(34, 1, '32', '0:0:10', 1, '5', '00:05:00'),
(35, 1, '33', '0:4:17', 1.25, '5', '0:0:7'),
(36, 1, '31', '0:4:38', 1.25, '5', '0:0:3'),
(37, 1, '34', '0:0:17', 0, '5', '00:05:00'),
(38, 3, '35', '0:2:37', -0.5, '3', '0:0:6'),
(39, 1, '38', '0:0:5', -0.25, '5', '00:05:00'),
(40, 1, '26', '0:0:6', 3.75, '5', '0:0:13'),
(41, 5, '26', '0:0:7', -0.25, '1', '00:05:00'),
(42, 1, '39', '0:1:7', 2, '5', '00:05:00'),
(43, 5, '6', '0:4:34', 1, '1', '0:0:9'),
(44, 2, '41', '0:0:9', -0.25, '5', '00:05:00'),
(45, 3, '42', '0:0:3', 1, '3', '00:03:00'),
(46, 5, '45', '0:0:9', 1, '1', '00:05:00'),
(47, 1, '43', '0:0:8', -0.25, '5', '00:05:00'),
(48, 5, '44', '0:0:14', -0.25, '1', '00:05:00'),
(49, 1, '44', '0:1:3', 6.5, '5', '00:05:00'),
(50, 3, '47', '0:0:14', 0.5, '3', '0:2:38'),
(51, 1, '48', '0:2:28', 1, '5', '0:0:27'),
(52, 1, '49', '0:0:16', 0, '5', '00:05:00'),
(53, 1, '50', '0:0:5', -0.25, '5', '00:05:00'),
(54, 3, '50', '0:0:3', -0.25, '3', '00:03:00'),
(55, 1, '51', '0:0:6', -0.25, '5', '00:05:00'),
(56, 1, '52', '0:0:7', 0, '5', '0:4:13'),
(57, 3, '52', '0:0:9', 1.75, '3', '00:03:00'),
(58, 1, '55', '0:0:4', -0.25, '5', '00:05:00'),
(59, 3, '56', '0:0:5', 1, '3', '00:03:00'),
(60, 1, '58', '0:4:24', 0, '5', '0:0:6'),
(61, 1, '59', '0:4:38', -1.25, '5', '0:0:4'),
(62, 1, '60', '0:3:54', 1.25, '5', '0:0:15'),
(63, 1, '61', '0:4:29', 2.5, '5', '0:0:8'),
(64, 3, '61', '0:0:40', 1.75, '3', '00:03:00'),
(65, 1, '62', '0:0:5', -0.25, '5', '00:05:00'),
(66, 1, '63', '0:0:18', 0, '5', '00:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL,
  `app_name` varchar(255) NOT NULL,
  `app_logo` varchar(255) NOT NULL,
  `app_email` varchar(255) NOT NULL,
  `app_version` varchar(255) NOT NULL,
  `app_author` varchar(255) NOT NULL,
  `app_contact` varchar(255) NOT NULL,
  `app_website` varchar(255) NOT NULL,
  `app_description` text NOT NULL,
  `app_developed_by` varchar(255) NOT NULL,
  `app_privacy_policy` text NOT NULL,
  `app_terms_conditions` text NOT NULL,
  `app_from_email` varchar(255) DEFAULT NULL,
  `app_admin_email` varchar(255) DEFAULT NULL,
  `api_all_order_by` varchar(255) NOT NULL,
  `api_latest_limit` int(3) NOT NULL,
  `api_cat_order_by` varchar(255) NOT NULL,
  `api_cat_post_order_by` varchar(255) NOT NULL,
  `login_rewards` int(11) NOT NULL,
  `show_whatsapp_join` int(11) NOT NULL,
  `show_notification` int(11) NOT NULL,
  `stipe_publish_key` varchar(255) NOT NULL,
  `stipe_server_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `app_name`, `app_logo`, `app_email`, `app_version`, `app_author`, `app_contact`, `app_website`, `app_description`, `app_developed_by`, `app_privacy_policy`, `app_terms_conditions`, `app_from_email`, `app_admin_email`, `api_all_order_by`, `api_latest_limit`, `api_cat_order_by`, `api_cat_post_order_by`, `login_rewards`, `show_whatsapp_join`, `show_notification`, `stipe_publish_key`, `stipe_server_key`) VALUES
(1, 'MovieBites', 'QUIZ.png', 'info@bytotech.com', '1.0.0', 'bytotech', '+91 9601501313', 'www.bytotech.com', '<p>We collect the minimum amount of information about you that is commensurate with providing you with a satisfactory service. This policy indicates the type of processes that may result in data being collected about you. Your use of this website gives us the right to collect that information.&nbsp;</p>\r\n', 'SHREESOLUTIONS', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '																<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n															', 'info@bytotech.com', 'info@bytotech.com', '', 10, 'pid', 'ASC', 1, 1, 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory_list`
--

CREATE TABLE `tbl_subcategory_list` (
  `mid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_image` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_subcategory_list`
--

INSERT INTO `tbl_subcategory_list` (`mid`, `cid`, `menu_name`, `menu_image`, `status`) VALUES
(64, 18, 'Vykran', '6506_gujarati.jpg', 1),
(65, 17, 'Grammer', '45888_18225_depositphotos_91239302-stock-illustration-word-english-watercolor.jpg', 1),
(66, 19, 'Vykran', '15115_hinidi.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transections`
--

CREATE TABLE `tbl_transections` (
  `t_id` int(11) NOT NULL,
  `type` varchar(150) NOT NULL,
  `coins` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `transection_id` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_transections`
--

INSERT INTO `tbl_transections` (`t_id`, `type`, `coins`, `user_id`, `transection_id`, `created_at`) VALUES
(1, 'Facebook Login Bonus', 20, 73, '123456780', '2024-05-30 19:00:47'),
(2, 'Facebook Login Bonus', 20, 74, '123456780', '2024-05-30 19:03:44'),
(3, 'Facebook Login Bonus', 20, 75, '123456780', '2024-05-30 19:03:56'),
(4, 'Facebook Login Bonus', 20, 76, '123456780', '2024-05-30 19:04:11'),
(5, 'Facebook Login Bonus', 20, 77, '123456780', '2024-05-31 10:39:47'),
(6, 'Facebook Login Bonus', 20, 78, '123456780', '2024-05-31 10:40:20'),
(7, 'Facebook Login Bonus', 20, 80, '1234567800', '2024-06-03 12:46:45'),
(8, 'Facebook Login Bonus', 20, 81, '12345678000', '2024-06-03 12:50:18'),
(9, 'Facebook Login Bonus', 20, 82, '123456780000', '2024-06-03 12:50:41'),
(10, 'Facebook Login Bonus', 20, 83, '1234567800000', '2024-06-03 12:51:29'),
(11, 'Facebook Login Bonus', 20, 84, '12345678000000', '2024-06-03 12:51:50'),
(12, 'Facebook Login Bonus', 20, 85, '123456780000000', '2024-06-03 12:52:13'),
(13, 'Facebook Login Bonus', 20, 86, '1234567800000000', '2024-06-03 12:52:29'),
(14, 'Facebook Login Bonus', 20, 87, '12345678000000000', '2024-06-03 12:53:23'),
(15, 'Facebook Login Bonus', 20, 88, '123456780000000000', '2024-06-03 12:59:35'),
(16, 'Facebook Login Bonus', 20, 89, '1234567800000000000', '2024-06-03 13:17:41'),
(17, 'Facebook Login Bonus', 20, 101, '123456780124', '2024-06-05 12:10:32'),
(18, 'Facebook Login Bonus', 20, 102, '1234567801242', '2024-06-05 12:12:48'),
(19, 'Facebook Login Bonus', 50, 121, '122111415332320706', '2024-06-06 16:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE `tbl_video` (
  `v_id` int(11) NOT NULL,
  `v_title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_video` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_order` int(11) NOT NULL,
  `w_id` int(11) NOT NULL,
  `v_date` datetime NOT NULL,
  `is_paid` int(11) NOT NULL,
  `view_counts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`v_id`, `v_title`, `v_video`, `v_order`, `w_id`, `v_date`, `is_paid`, `view_counts`) VALUES
(16, 'Test 2', '52971_1000019942.mp4', 1, 2, '2024-05-01 00:00:00', 1, 0),
(17, 'Ok test', '39865_1000019942.mp4', 0, 2, '2024-05-01 00:00:00', 0, 0),
(18, '', 'Www.google.com', 0, 8, '0000-00-00 00:00:00', 1, 0),
(19, '', 'Teeting', 0, 8, '0000-00-00 00:00:00', 1, 0),
(20, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/Video387/waiter2.mp4', 0, 16, '0000-00-00 00:00:00', 1, 0),
(21, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/Video387/waiter3.mp4', 0, 16, '0000-00-00 00:00:00', 0, 0),
(24, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/Video387/waiter1.mp4', 0, 16, '0000-00-00 00:00:00', 0, 0),
(25, '', 'Www.google.com', 0, 18, '0000-00-00 00:00:00', 0, 0),
(26, '', 'Www.google.com', 0, 18, '0000-00-00 00:00:00', 0, 0),
(27, '', 'Www.google.com', 0, 18, '0000-00-00 00:00:00', 0, 0),
(28, '', 'Www.google.com', 0, 17, '0000-00-00 00:00:00', 0, 0),
(30, '', 'Www.google.com', 0, 13, '0000-00-00 00:00:00', 0, 0),
(31, '', 'Www.google.com', 0, 13, '0000-00-00 00:00:00', 0, 0),
(32, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/vidarka/BEST-FRIENDS-Fall-For-The-Same-Guy--What-Happens-Is-Shocking-b329b2aa63d3c93d59b650f93c83b4ca', 0, 30, '0000-00-00 00:00:00', 0, 0),
(33, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/vidarka/MARRIED-People-CAUGHT-CHEATING--What-Happens-Is-Shocking-6df5bbcc4f4635f314c1ec9e83436991/hls', 0, 30, '0000-00-00 00:00:00', 0, 0),
(34, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/vidarka/GREEDY-CEO-Cheats-His-Partners--He-Lives-To-Regret-It-91dc3e6be2e4987df3215216171a04b2/hls/me', 0, 30, '0000-00-00 00:00:00', 0, 0),
(35, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/vidarka/Man-KICKS-OUT-PREGNANT-Girlfriend--What-Happens-Next-Is-Shocking-134692099a4477086242d3ba1f85', 0, 30, '0000-00-00 00:00:00', 0, 0),
(36, '', 'Www.google.com', 0, 24, '0000-00-00 00:00:00', 0, 0),
(63, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/biological_test_snippets/chunk_001.mp4', 0, 32, '0000-00-00 00:00:00', 0, 0),
(64, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/biological_test_snippets/chunk_002.mp4', 0, 32, '0000-00-00 00:00:00', 0, 0),
(65, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/biological_test_snippets/chunk_003.mp4', 0, 32, '0000-00-00 00:00:00', 1, 0),
(66, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/biological_test_snippets/chunk_004.mp4', 0, 32, '0000-00-00 00:00:00', 1, 0),
(71, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/biological_test_snippets/chunk_005.mp4', 0, 32, '0000-00-00 00:00:00', 1, 0),
(72, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/biological_test_snippets/chunk_006.mp4', 0, 32, '0000-00-00 00:00:00', 1, 0),
(73, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/biological_test_snippets/chunk_007.mp4', 0, 32, '0000-00-00 00:00:00', 1, 0),
(74, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/biological_test_snippets/chunk_008.mp4', 0, 32, '0000-00-00 00:00:00', 1, 0),
(75, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/biological_test_snippets/chunk_009.mp4', 0, 32, '0000-00-00 00:00:00', 1, 0),
(76, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/biological_test_snippets/chunk_010.mp4', 0, 32, '0000-00-00 00:00:00', 1, 0),
(77, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/biological_test_snippets/chunk_011.mp4', 0, 32, '0000-00-00 00:00:00', 1, 0),
(78, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/biological_test_snippets/chunk_012.mp4', 0, 32, '0000-00-00 00:00:00', 1, 0),
(79, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/biological_test_snippets/chunk_013.mp4', 0, 32, '0000-00-00 00:00:00', 1, 0),
(80, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/biological_test_snippets/chunk_014.mp4', 0, 32, '0000-00-00 00:00:00', 1, 0),
(81, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/gender_test_snippets/chunk_002.mp4', 0, 33, '0000-00-00 00:00:00', 0, 0),
(82, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/gender_test_snippets/chunk_003.mp4', 0, 33, '0000-00-00 00:00:00', 0, 0),
(83, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/gender_test_snippets/chunk_004.mp4', 0, 33, '0000-00-00 00:00:00', 1, 0),
(84, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/gender_test_snippets/chunk_005.mp4', 0, 33, '0000-00-00 00:00:00', 1, 0),
(85, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/gender_test_snippets/chunk_006.mp4', 0, 33, '0000-00-00 00:00:00', 1, 0),
(86, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/gender_test_snippets/chunk_007.mp4', 0, 33, '0000-00-00 00:00:00', 1, 0),
(87, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/gender_test_snippets/chunk_008.mp4', 0, 33, '0000-00-00 00:00:00', 1, 0),
(88, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/gender_test_snippets/chunk_009.mp4', 0, 33, '0000-00-00 00:00:00', 1, 0),
(89, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/gender_test_snippets/chunk_010.mp4', 0, 33, '0000-00-00 00:00:00', 1, 0),
(90, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/gender_test_snippets/chunk_001.mp4', 0, 33, '0000-00-00 00:00:00', 0, 0),
(91, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/gender_test_snippets/chunk_001.mp4', 0, 33, '0000-00-00 00:00:00', 0, 0),
(92, '', 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/gender_test_snippets/chunk_001.mp4', 0, 33, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_views`
--

CREATE TABLE `tbl_views` (
  `view_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `w_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_views`
--

INSERT INTO `tbl_views` (`view_id`, `user_id`, `w_id`, `created_at`) VALUES
(1, 1, 13, '2024-05-24 19:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_series`
--

CREATE TABLE `tbl_web_series` (
  `w_id` int(11) NOT NULL,
  `cat_id` varchar(150) NOT NULL,
  `w_name` varchar(150) NOT NULL,
  `w_image` varchar(150) NOT NULL,
  `w_sub_title` varchar(255) NOT NULL,
  `w_description` text NOT NULL,
  `recommendation` int(11) NOT NULL,
  `view_counts` int(11) NOT NULL,
  `trending` int(11) NOT NULL,
  `is_new` int(11) NOT NULL,
  `is_slider` int(11) NOT NULL,
  `spring_into_saturday` int(11) NOT NULL,
  `w_especially_date` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `top_picks` int(11) NOT NULL,
  `w_type` varchar(150) NOT NULL,
  `w_status` int(11) NOT NULL,
  `w_trailer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_web_series`
--

INSERT INTO `tbl_web_series` (`w_id`, `cat_id`, `w_name`, `w_image`, `w_sub_title`, `w_description`, `recommendation`, `view_counts`, `trending`, `is_new`, `is_slider`, `spring_into_saturday`, `w_especially_date`, `created_at`, `top_picks`, `w_type`, `w_status`, `w_trailer`) VALUES
(2, '21', 'Demo', '44651_IMG-20240506-WA0003.jpg', 'demo demo', 'demo demo demo demo demo', 1, 0, 1, 1, 1, 67, '0000-00-00', '2024-04-30 15:47:30', 1, '', 0, ''),
(3, '17', 'Testing ', '66812_IMG-20240507-WA0005.jpg', 'Test', 'Teet', 1, 0, 1, 0, 1, 1, '0000-00-00', '2024-05-07 17:28:57', 0, '', 0, ''),
(6, '21', 'Vampire Hunters', '62557_TestImage.png', 'Vampires', 'While the show is mainly a drama with frequent comic relief, most episodes blend different genres, including horror, martial arts, romance, melodrama, farce, fantasy, supernatural, comedy, and, in one episode, musical comedy.', 1, 0, 1, 0, 1, 23, '0000-00-00', '2024-05-07 18:05:51', 0, '', 0, ''),
(32, '26', 'Biological', '59875_Placeholder.jpg', 'Biological Drama ', 'Biological Drama ', 1, 1000000, 1, 1, 1, 0, '1970-01-01', '2024-09-06 17:41:14', 1, 'Shows', 1, 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/biological_test_snippets/chunk_000.mp4'),
(33, '27', 'Gender Test', '45887_Placeholder.jpg', 'Gender Test', 'Gender Test', 1, 1000000, 1, 1, 1, 0, '1970-01-01', '2024-09-08 10:05:36', 1, 'Shows', 1, 'https://iblytest.sfo3.cdn.digitaloceanspaces.com/wp-content/uploads/videos/gender_test_snippets/chunk_000.mp4'),
(34, '27', 'Hidden', '', 'Bunny', 'Bunny', 0, 1000000, 0, 1, 0, 0, '1970-01-01', '2025-05-19 10:38:35', 0, 'Movies', 1, 'Trailer');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `amount`, `date`, `payment_method`, `status`, `description`) VALUES
(1, 1, '9.99', '2024-06-01 00:00:00', NULL, NULL, 'Subscription Payment'),
(2, 1, '2.99', '2024-06-05 00:00:00', NULL, NULL, 'Episode Unlock');

-- --------------------------------------------------------

--
-- Table structure for table `unlocked_episodes`
--

CREATE TABLE `unlocked_episodes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `episode_id` int(11) DEFAULT NULL,
  `unlocked_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unlocked_episodes`
--

INSERT INTO `unlocked_episodes` (`id`, `user_id`, `episode_id`, `unlocked_at`) VALUES
(1, 1, 1, '2024-06-02 10:00:00'),
(2, 1, 2, '2024-06-03 11:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `fb_id` varchar(255) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8 NOT NULL,
  `image` text CHARACTER SET utf8 NOT NULL,
  `token` text NOT NULL,
  `udid` text NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_type`, `fb_id`, `name`, `email`, `password`, `phone`, `image`, `token`, `udid`, `status`, `date`, `is_login`) VALUES
(1, 'Google', '109231778554785561027', 'Niraj Ajudiya', 'niraj@illumeably.com', '', '', 'https://lh3.googleusercontent.com/a/ACg8ocLKfwnnBvkwjiGIit4vAxOGjNNZ1OH-RmYjuPb5wtSkF__4IA=s320', 'eyJhbGciOiJSUzI1NiIsImtpZCI6ImVlMTkzZDQ2NDdhYjRhMzU4NWFhOWIyYjNiNDg0YTg3YWE2OGJiNDIiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJodHRwczovL2FjY291bnRzLmdvb2dsZS5jb20iLCJhenAiOiI3NjM3MzcyMTI4MTctYmFzY24wczIyNDg3czJ2cmsybjBjNmJ1bzFiMTcxMHEuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJhdWQiOiI3NjM3MzcyMTI4MTctYmFzY24wczIyNDg3czJ2cmsybjBjNmJ1bzFiMTcxMHEuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJzdWIiOiIxMDkyMzE3Nzg1NTQ3ODU1NjEwMjciLCJoZCI6ImlsbHVtZWFibHkuY29tIiwiZW1haWwiOiJuaXJhakBpbGx1bWVhYmx5LmNvbSIsImVtYWlsX3ZlcmlmaWVkIjp0cnVlLCJhdF9oYXNoIjoiUDZIa18wMjItLW1QNVlBZnprT2xlQSIsIm5vbmNlIjoiZ1UtMWtUOG55UXVqNGVELUtyM2F5OU5rT1U0d1JwVXg4clpiOEtsQTdCOCIsIm5hbWUiOiJOaXJhaiBBanVkaXlhIiwicGljdHVyZSI6Imh0dHBzOi8vbGgzLmdvb2dsZXVzZXJjb250ZW50LmNvbS9hL0FDZzhvY0xLZndubkJ2a3dqaUdJaXQ0dkF4T0dqTk5aMU9ILVJtWWp1UGI1d3RTa0ZfXzRJQT1zOTYtYyIsImdpdmVuX25hbWUiOiJOaXJhaiIsImZhbWlseV9uYW1lIjoiQWp1ZGl5YSIsImlhdCI6MTc0MjI4MTg5OSwiZXhwIjoxNzQyMjg1NDk5fQ.iCJcFnrpSbqBUZzf4GiDL75t_YkJ5MIZCU1AuKwI1LENn2X5ku_TXtMu4EKE5bvoalg3vs3SqkEfOHQjyvthO2rGOjIQgL6RBOmJYNDXBbH-s53Hyn07ZxhOAugBbuPa5fKrBnKqEJGHftfc-Ol9tweAOGXd5aWafPd9Qs3i2ym5BUcZLFbNvzKFGjvkBnz6UtY5A1ieLzliUKfiIp2P6hPwpU-HE93t16wyPSvKNzh54lqoEf3WUFSgNsr4vhNpiSE8LjgJQc5T6K9rWvQBdf_l5lwFv5sWds3ulrx-k7ClKz1orrZUgjcqz8M38_1zvk80_tIM05S1Nt69PHdXvg', 'DE37B1BE-B67E-46F2-B7AF-E29D48D09231', '1', '2025-05-21 07:50:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `login_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` text NOT NULL,
  `udid` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `login_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`login_id`, `user_id`, `token`, `udid`, `created_at`, `login_status`) VALUES
(1, 80, '1123456465', '1123456465', '2024-06-03 12:46:45', 1),
(2, 81, '1123456465', '1123456465', '2024-06-03 12:50:18', 1),
(3, 82, '1123456465', '1123456465', '2024-06-03 12:50:41', 1),
(4, 83, '1123456465', '1123456465', '2024-06-03 12:51:29', 1),
(5, 84, '1123456465', '1123456465', '2024-06-03 12:51:50', 1),
(6, 85, '1123456465', '1123456465', '2024-06-03 12:52:13', 1),
(7, 86, '1123456465', '1123456465', '2024-06-03 12:52:29', 1),
(8, 87, '1123456465', '1123456465', '2024-06-03 12:53:23', 1),
(9, 88, '1123456465', '1123456465', '2024-06-03 12:59:35', 1),
(10, 89, '1123456465', '1123456465', '2024-06-03 13:17:41', 0),
(11, 90, '1123456465', '1123456465', '2024-06-03 13:18:32', 1),
(12, 91, '', '', '2024-06-03 15:34:50', 1),
(13, 92, '', '', '2024-06-03 15:44:59', 1),
(14, 93, '', '', '2024-06-03 15:51:16', 1),
(15, 94, '1123456465', '11234564651', '2024-06-03 18:09:09', 1),
(16, 95, '', '', '2024-06-03 18:28:53', 1),
(17, 96, '', '', '2024-06-03 18:29:43', 1),
(18, 97, '', '', '2024-06-04 12:25:36', 1),
(19, 98, '', '', '2024-06-04 17:07:24', 1),
(20, 99, '', '', '2024-06-04 17:07:57', 1),
(21, 100, '', '', '2024-06-04 17:07:57', 1),
(22, 101, '1123456465', '1123456465', '2024-06-05 12:10:32', 1),
(23, 102, '1123456465', '1123456465', '2024-06-05 12:12:48', 1),
(24, 103, '', '', '2024-06-05 16:01:44', 1),
(25, 104, '', '', '2024-06-05 16:13:40', 1),
(26, 105, 'eyJhbGciOiJSUzI1NiIsImtpZCI6IjY3NGRiYmE4ZmFlZTY5YWNhZTFiYzFiZTE5MDQ1MzY3OGY0NzI4MDMiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJodHRwczovL2FjY291bnRzLmdvb2dsZS5jb20iLCJhenAiOiI3NjM3MzcyMTI4MTctYmFzY24wczIyNDg3czJ2cmsybjBjNmJ1bzFiMTcxMHEuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJhdWQiOiI3NjM3MzcyMTI4MTctYmFzY24wczIyNDg3czJ2cmsybjBjNmJ1bzFiMTcxMHEuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJzdWIiOiIxMDkyMzE3Nzg1NTQ3ODU1NjEwMjciLCJoZCI6ImlsbHVtZWFibHkuY29tIiwiZW1haWwiOiJuaXJhakBpbGx1bWVhYmx5LmNvbSIsImVtYWlsX3ZlcmlmaWVkIjp0cnVlLCJhdF9oYXNoIjoiZ3ZyMElnZC1jb01SUTE4QzBvNElUdyIsIm5vbmNlIjoiQlBMTFZfMVZRd0RrZFZ6RFNXV20tY3otZmZQSFUtVVRaak4zaHhWci03ZyIsIm5hbWUiOiJOaXJhaiBBanVkaXlhIiwicGljdHVyZSI6Imh0dHBzOi8vbGgzLmdvb2dsZXVzZXJjb250ZW50LmNvbS9hL0FDZzhvY0xLZndubkJ2a3dqaUdJaXQ0dkF4T0dqTk5aMU9ILVJtWWp1UGI1d3RTa0ZfXzRJQT1zOTYtYyIsImdpdmVuX25hbWUiOiJOaXJhaiIsImZhbWlseV9uYW1lIjoiQWp1ZGl5YSIsImlhdCI6MTcxNzU4NDIxNSwiZXhwIjoxNzE3NTg3ODE1fQ.ugvzjzM1UXAQG0o9u0tulSMqVhIBycsHC0CNqSxqg4STGOrviwLcekhpX7ysRH_qM34HVim5dKW9mCEGqz9ogzbkLHYEeJ5OA82NwTx7OAP8wuS_8nQ6CsPsSRpQR5m4ZrveKVUWY-G501P4PgIM-GX8eWTkkrEZzd6qAeSAIdzr45JWpcrAtSR4hUXzZ3ldN_VCIdTP918rQQcWc6jmBh8y4o5ch5vF3yrOiNnfyGbo6dr3Mry7Q6BpF9Jbz8T2dgzgLPAu-bMD0JtutSvp0oIoYB5ibk4Kq3QlPlVi_AzZksTvaJ3KSHRqRA6-E0fEUV0Fh1zcfd13XFqd9PBlIA', '1DA5DD52-94FF-4A9F-AC7D-9493F47C586A', '2024-06-05 16:16:13', 1),
(27, 106, '', '', '2024-06-05 16:19:32', 1),
(28, 107, '', '', '2024-06-05 16:24:20', 1),
(29, 108, '', '', '2024-06-05 16:24:45', 1),
(30, 109, '', '', '2024-06-06 14:58:14', 1),
(31, 110, 'eyJhbGciOiJSUzI1NiIsImtpZCI6IjY3NGRiYmE4ZmFlZTY5YWNhZTFiYzFiZTE5MDQ1MzY3OGY0NzI4MDMiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJodHRwczovL2FjY291bnRzLmdvb2dsZS5jb20iLCJhenAiOiI3NjM3MzcyMTI4MTctYmFzY24wczIyNDg3czJ2cmsybjBjNmJ1bzFiMTcxMHEuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJhdWQiOiI3NjM3MzcyMTI4MTctYmFzY24wczIyNDg3czJ2cmsybjBjNmJ1bzFiMTcxMHEuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJzdWIiOiIxMDkyMzE3Nzg1NTQ3ODU1NjEwMjciLCJoZCI6ImlsbHVtZWFibHkuY29tIiwiZW1haWwiOiJuaXJhakBpbGx1bWVhYmx5LmNvbSIsImVtYWlsX3ZlcmlmaWVkIjp0cnVlLCJhdF9oYXNoIjoiZ3ZyMElnZC1jb01SUTE4QzBvNElUdyIsIm5vbmNlIjoiQlBMTFZfMVZRd0RrZFZ6RFNXV20tY3otZmZQSFUtVVRaak4zaHhWci03ZyIsIm5hbWUiOiJOaXJhaiBBanVkaXlhIiwicGljdHVyZSI6Imh0dHBzOi8vbGgzLmdvb2dsZXVzZXJjb250ZW50LmNvbS9hL0FDZzhvY0xLZndubkJ2a3dqaUdJaXQ0dkF4T0dqTk5aMU9ILVJtWWp1UGI1d3RTa0ZfXzRJQT1zOTYtYyIsImdpdmVuX25hbWUiOiJOaXJhaiIsImZhbWlseV9uYW1lIjoiQWp1ZGl5YSIsImlhdCI6MTcxNzU4NDIxNSwiZXhwIjoxNzE3NTg3ODE1fQ.ugvzjzM1UXAQG0o9u0tulSMqVhIBycsHC0CNqSxqg4STGOrviwLcekhpX7ysRH_qM34HVim5dKW9mCEGqz9ogzbkLHYEeJ5OA82NwTx7OAP8wuS_8nQ6CsPsSRpQR5m4ZrveKVUWY-G501P4PgIM-GX8eWTkkrEZzd6qAeSAIdzr45JWpcrAtSR4hUXzZ3ldN_VCIdTP918rQQcWc6jmBh8y4o5ch5vF3yrOiNnfyGbo6dr3Mry7Q6BpF9Jbz8T2dgzgLPAu-bMD0JtutSvp0oIoYB5ibk4Kq3QlPlVi_AzZksTvaJ3KSHRqRA6-E0fEUV0Fh1zcfd13XFqd9PBlIA', '1DA5DD52-94FF-4A9F-AC7D-9493F47C586A', '2024-06-06 14:59:25', 1),
(32, 111, '', '', '2024-06-06 15:05:45', 1),
(33, 112, '', '', '2024-06-06 15:22:36', 1),
(34, 113, '', '', '2024-06-06 15:22:49', 1),
(35, 114, '', '', '2024-06-06 15:23:43', 1),
(36, 115, 'eyJhbGciOiJSUzI1NiIsImtpZCI6IjY3NGRiYmE4ZmFlZTY5YWNhZTFiYzFiZTE5MDQ1MzY3OGY0NzI4MDMiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJodHRwczovL2FjY291bnRzLmdvb2dsZS5jb20iLCJhenAiOiI3NjM3MzcyMTI4MTctYmFzY24wczIyNDg3czJ2cmsybjBjNmJ1bzFiMTcxMHEuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJhdWQiOiI3NjM3MzcyMTI4MTctYmFzY24wczIyNDg3czJ2cmsybjBjNmJ1bzFiMTcxMHEuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJzdWIiOiIxMDkyMzE3Nzg1NTQ3ODU1NjEwMjciLCJoZCI6ImlsbHVtZWFibHkuY29tIiwiZW1haWwiOiJuaXJhakBpbGx1bWVhYmx5LmNvbSIsImVtYWlsX3ZlcmlmaWVkIjp0cnVlLCJhdF9oYXNoIjoiZ3ZyMElnZC1jb01SUTE4QzBvNElUdyIsIm5vbmNlIjoiQlBMTFZfMVZRd0RrZFZ6RFNXV20tY3otZmZQSFUtVVRaak4zaHhWci03ZyIsIm5hbWUiOiJOaXJhaiBBanVkaXlhIiwicGljdHVyZSI6Imh0dHBzOi8vbGgzLmdvb2dsZXVzZXJjb250ZW50LmNvbS9hL0FDZzhvY0xLZndubkJ2a3dqaUdJaXQ0dkF4T0dqTk5aMU9ILVJtWWp1UGI1d3RTa0ZfXzRJQT1zOTYtYyIsImdpdmVuX25hbWUiOiJOaXJhaiIsImZhbWlseV9uYW1lIjoiQWp1ZGl5YSIsImlhdCI6MTcxNzU4NDIxNSwiZXhwIjoxNzE3NTg3ODE1fQ.ugvzjzM1UXAQG0o9u0tulSMqVhIBycsHC0CNqSxqg4STGOrviwLcekhpX7ysRH_qM34HVim5dKW9mCEGqz9ogzbkLHYEeJ5OA82NwTx7OAP8wuS_8nQ6CsPsSRpQR5m4ZrveKVUWY-G501P4PgIM-GX8eWTkkrEZzd6qAeSAIdzr45JWpcrAtSR4hUXzZ3ldN_VCIdTP918rQQcWc6jmBh8y4o5ch5vF3yrOiNnfyGbo6dr3Mry7Q6BpF9Jbz8T2dgzgLPAu-bMD0JtutSvp0oIoYB5ibk4Kq3QlPlVi_AzZksTvaJ3KSHRqRA6-E0fEUV0Fh1zcfd13XFqd9PBlIA', '1DA5DD52-94FF-4A9F-AC7D-9493F47C586A', '2024-06-06 15:24:16', 1),
(37, 116, '', '', '2024-06-06 15:24:50', 1),
(38, 117, '', '', '2024-06-06 15:25:03', 1),
(39, 118, 'eyJhbGciOiJSUzI1NiIsImtpZCI6IjY3NGRiYmE4ZmFlZTY5YWNhZTFiYzFiZTE5MDQ1MzY3OGY0NzI4MDMiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJodHRwczovL2FjY291bnRzLmdvb2dsZS5jb20iLCJhenAiOiI3NjM3MzcyMTI4MTctYmFzY24wczIyNDg3czJ2cmsybjBjNmJ1bzFiMTcxMHEuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJhdWQiOiI3NjM3MzcyMTI4MTctYmFzY24wczIyNDg3czJ2cmsybjBjNmJ1bzFiMTcxMHEuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJzdWIiOiIxMDkyMzE3Nzg1NTQ3ODU1NjEwMjciLCJoZCI6ImlsbHVtZWFibHkuY29tIiwiZW1haWwiOiJuaXJhakBpbGx1bWVhYmx5LmNvbSIsImVtYWlsX3ZlcmlmaWVkIjp0cnVlLCJhdF9oYXNoIjoiaGVGVUp1NUFwMVp3OGU1U09RcVJ1QSIsIm5vbmNlIjoiZXFyUnJxd0ZWUGhUYzU0SUJYOFRxc1l1aXBEb0lCZ2owSHZubmtvbWVmQSIsIm5hbWUiOiJOaXJhaiBBanVkaXlhIiwicGljdHVyZSI6Imh0dHBzOi8vbGgzLmdvb2dsZXVzZXJjb250ZW50LmNvbS9hL0FDZzhvY0xLZndubkJ2a3dqaUdJaXQ0dkF4T0dqTk5aMU9ILVJtWWp1UGI1d3RTa0ZfXzRJQT1zOTYtYyIsImdpdmVuX25hbWUiOiJOaXJhaiIsImZhbWlseV9uYW1lIjoiQWp1ZGl5YSIsImlhdCI6MTcxNzY2OTM1OSwiZXhwIjoxNzE3NjcyOTU5fQ.idoPEM4j5c9dmY1LgGOkg0E4eOCmPADMVumlZum7kliULX7TKSZyKNY1G4ZLMpO4tGfLdUZvlKVfbUGztSYFwHi8DBhe-O-Xh8GNW9D7ceJWB-PdCT4mQ5b5mNuzV6zIfLcPX93A9bcP2qR5PduaOE8j4dYkxO8CkYMu8KcuswbSLLfxjddMwEa1R4MfW8N4usk9OMFlDVzPeHPMyavDl_WFGdtBcE4aEIyM-P4bH1iRECLUawVVObP9128fUp5fRDFdRjTP-UmM0E9tJesUu-6jkiegz5g2r2Kme3QHcwsyJdYjho6dLySOyfuiliFsCim1O0YaYVv_nWBIkNIPdQ', '1DA5DD52-94FF-4A9F-AC7D-9493F47C586A', '2024-06-06 15:53:12', 1),
(40, 119, '', '', '2024-06-06 16:04:35', 1),
(41, 120, 'eyJhbGciOiJSUzI1NiIsImtpZCI6IjY3NGRiYmE4ZmFlZTY5YWNhZTFiYzFiZTE5MDQ1MzY3OGY0NzI4MDMiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJodHRwczovL2FjY291bnRzLmdvb2dsZS5jb20iLCJhenAiOiI3NjM3MzcyMTI4MTctYmFzY24wczIyNDg3czJ2cmsybjBjNmJ1bzFiMTcxMHEuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJhdWQiOiI3NjM3MzcyMTI4MTctYmFzY24wczIyNDg3czJ2cmsybjBjNmJ1bzFiMTcxMHEuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJzdWIiOiIxMDkyMzE3Nzg1NTQ3ODU1NjEwMjciLCJoZCI6ImlsbHVtZWFibHkuY29tIiwiZW1haWwiOiJuaXJhakBpbGx1bWVhYmx5LmNvbSIsImVtYWlsX3ZlcmlmaWVkIjp0cnVlLCJhdF9oYXNoIjoiLU9DOWU3ZVh6dnRMdGhVQkZVc1lsZyIsIm5vbmNlIjoiUUtPU2FuRi0tMFJVY21XQ0pJbktESVRnUUZON3NCRHRvMGhoOURDVVpRayIsIm5hbWUiOiJOaXJhaiBBanVkaXlhIiwicGljdHVyZSI6Imh0dHBzOi8vbGgzLmdvb2dsZXVzZXJjb250ZW50LmNvbS9hL0FDZzhvY0xLZndubkJ2a3dqaUdJaXQ0dkF4T0dqTk5aMU9ILVJtWWp1UGI1d3RTa0ZfXzRJQT1zOTYtYyIsImdpdmVuX25hbWUiOiJOaXJhaiIsImZhbWlseV9uYW1lIjoiQWp1ZGl5YSIsImlhdCI6MTcxNzY3MDM1MSwiZXhwIjoxNzE3NjczOTUxfQ.E-QoHXcGBZvDODQgUkBcJSZ8MvveOLMMJW32LyaQibvofVNpihCQ0R5B739Z388nrkWvbdmEN8sSJKwr-FTw2k56xWgF4oLGsEL6Emn4aPiuMOW0FckaP0Ep-QqGWBl2iL9LxEoByMS2FkHFSEHFH0FRdDy_-N6DWr6P943Qv6a_csVFApyNonKZhUifLnj7vjz4chE93fKkJFOa99WLy8abAGBGFarqJ3R4CvT1twrZYx2rBCYhlv8LeBwS_RNwnYTakEAYObfEI4uAyIYwZiLU52B6tUoRVIbTl8O6a210kjJYtL-5BYs3g2yguD2-Bdkg3s6aEkzXfUjj7jU1fw', '1DA5DD52-94FF-4A9F-AC7D-9493F47C586A', '2024-06-06 16:09:11', 1),
(42, 121, 'EAAWf2bi1ZCv4BO4uM7JbJ0yk12TqwQ8Af5LXh6oT3rjI38eYHqrHHoRW9VVlAZBD19pcKwi67aU7Rbz46J1LlalY11arl2tBiWg8ec9dyyYsqgwZC7T2EZBH1CDw20gt47TStHvr8dvscebw49DYk8ZB1SjvZAOGABOmNA4aAz1dbZBnZCCfE3W0BI16ZBzag3lvmDf3EMrZAU8TKiF5S31H4oohyRJOELQp5bk3OkD1XRnE6BGl8MlqIHJQXd0HONZCJ5hGAZDZD', '1DA5DD52-94FF-4A9F-AC7D-9493F47C586A', '2024-06-06 16:26:13', 1),
(43, 122, 'eyJraWQiOiJsVkhkT3g4bHRSIiwiYWxnIjoiUlMyNTYifQ.eyJpc3MiOiJodHRwczovL2FwcGxlaWQuYXBwbGUuY29tIiwiYXVkIjoiY29tLmlsbHVtZWFibHkuQml0ZXNTdHJlYW1pbmciLCJleHAiOjE3MTc4NTI0ODYsImlhdCI6MTcxNzc2NjA4Niwic3ViIjoiMDAxMTk1LmFjODVkZDVmNDhlYTRiYTM4OTE1N2E1YzBmYzZkMDQ5LjEzMzAiLCJjX2hhc2giOiJ6bFM1WFNLcl9oOW9YUEdyRy1JbUVnIiwiYXV0aF90aW1lIjoxNzE3NzY2MDg2LCJub25jZV9zdXBwb3J0ZWQiOnRydWV9.BjzxsNjWnwFhlVOAd356sYcNm_tK7PnsjKXRmw9l_DtZjDNKhLt5unUpoU_87bW3WH_fHRsa8hpFiLrWTDrdyrwGUMJ8sYw3qfIJN19spgwjsCGYZoKIgTGtLluJJjZOTmDn-OGkBIfSENi8Tsd5qkq3X1THBKYnnQgl4iqtonpHY5NrifsBYIAPRVRl_jM8b1IQ3odif2QMU3udsvQfNZcaM9v6CJkLswF4QnxazWG-UqFTGELNBOO8dJg-FJSS4beizuvzHL1p6bWSVWljrpDwf7UF6HiGUMMqCqzzkFiNCvZE1HzFATDECeIUmaR__cLR9-vidSr0ltV7S1ZdJA', '5B569051-6CE1-4946-9893-CC8EAA7C03D2', '2024-06-07 18:45:07', 1),
(44, 123, 'eyJraWQiOiJsVkhkT3g4bHRSIiwiYWxnIjoiUlMyNTYifQ.eyJpc3MiOiJodHRwczovL2FwcGxlaWQuYXBwbGUuY29tIiwiYXVkIjoiY29tLmlsbHVtZWFibHkuQml0ZXNTdHJlYW1pbmciLCJleHAiOjE3MTc4NTI0ODYsImlhdCI6MTcxNzc2NjA4Niwic3ViIjoiMDAxMTk1LmFjODVkZDVmNDhlYTRiYTM4OTE1N2E1YzBmYzZkMDQ5LjEzMzAiLCJjX2hhc2giOiJ6bFM1WFNLcl9oOW9YUEdyRy1JbUVnIiwiYXV0aF90aW1lIjoxNzE3NzY2MDg2LCJub25jZV9zdXBwb3J0ZWQiOnRydWV9.BjzxsNjWnwFhlVOAd356sYcNm_tK7PnsjKXRmw9l_DtZjDNKhLt5unUpoU_87bW3WH_fHRsa8hpFiLrWTDrdyrwGUMJ8sYw3qfIJN19spgwjsCGYZoKIgTGtLluJJjZOTmDn-OGkBIfSENi8Tsd5qkq3X1THBKYnnQgl4iqtonpHY5NrifsBYIAPRVRl_jM8b1IQ3odif2QMU3udsvQfNZcaM9v6CJkLswF4QnxazWG-UqFTGELNBOO8dJg-FJSS4beizuvzHL1p6bWSVWljrpDwf7UF6HiGUMMqCqzzkFiNCvZE1HzFATDECeIUmaR__cLR9-vidSr0ltV7S1ZdJA', '1DA5DD52-94FF-4A9F-AC7D-9493F47C586A', '2024-06-07 19:01:48', 1),
(45, 124, 'eyJraWQiOiJsVkhkT3g4bHRSIiwiYWxnIjoiUlMyNTYifQ.eyJpc3MiOiJodHRwczovL2FwcGxlaWQuYXBwbGUuY29tIiwiYXVkIjoiY29tLmlsbHVtZWFibHkuQml0ZXNTdHJlYW1pbmciLCJleHAiOjE3MTc4NTI0ODYsImlhdCI6MTcxNzc2NjA4Niwic3ViIjoiMDAxMTk1LmFjODVkZDVmNDhlYTRiYTM4OTE1N2E1YzBmYzZkMDQ5LjEzMzAiLCJjX2hhc2giOiJ6bFM1WFNLcl9oOW9YUEdyRy1JbUVnIiwiYXV0aF90aW1lIjoxNzE3NzY2MDg2LCJub25jZV9zdXBwb3J0ZWQiOnRydWV9.BjzxsNjWnwFhlVOAd356sYcNm_tK7PnsjKXRmw9l_DtZjDNKhLt5unUpoU_87bW3WH_fHRsa8hpFiLrWTDrdyrwGUMJ8sYw3qfIJN19spgwjsCGYZoKIgTGtLluJJjZOTmDn-OGkBIfSENi8Tsd5qkq3X1THBKYnnQgl4iqtonpHY5NrifsBYIAPRVRl_jM8b1IQ3odif2QMU3udsvQfNZcaM9v6CJkLswF4QnxazWG-UqFTGELNBOO8dJg-FJSS4beizuvzHL1p6bWSVWljrpDwf7UF6HiGUMMqCqzzkFiNCvZE1HzFATDECeIUmaR__cLR9-vidSr0ltV7S1ZdJA', '1DA5DD52-94FF-4A9F-AC7D-9493F47C586A', '2024-06-07 19:03:38', 1),
(46, 125, 'eyJhbGciOiJSUzI1NiIsImtpZCI6IjBlMzQ1ZmQ3ZTRhOTcyNzFkZmZhOTkxZjVhODkzY2QxNmI4ZTA4MjciLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJodHRwczovL2FjY291bnRzLmdvb2dsZS5jb20iLCJhenAiOiI3NjM3MzcyMTI4MTctYmFzY24wczIyNDg3czJ2cmsybjBjNmJ1bzFiMTcxMHEuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJhdWQiOiI3NjM3MzcyMTI4MTctYmFzY24wczIyNDg3czJ2cmsybjBjNmJ1bzFiMTcxMHEuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJzdWIiOiIxMDEyNzQ4Njc4NDc1MDkyMjI1MTAiLCJoZCI6ImlsbHVtZWFibHkuY29tIiwiZW1haWwiOiJyaXNoaUBpbGx1bWVhYmx5LmNvbSIsImVtYWlsX3ZlcmlmaWVkIjp0cnVlLCJhdF9oYXNoIjoibWN2eVVYak1maWhzQ1RvOGtDVHdodyIsIm5vbmNlIjoiRkI4akhld21VN1ROT3FpdWFJbG10bW8ybzlMaVdyeThwMWZlS0I3Z1E5TSIsIm5hbWUiOiJSaXNoaSBKZXRoaSIsInBpY3R1cmUiOiJodHRwczovL2xoMy5nb29nbGV1c2VyY29udGVudC5jb20vYS9BQ2c4b2NMWEEwTmhWSHFfNWVKbkhpUm1VLVpaWDdhQk54c3hETWNUZWs0V1JCWnU5ZElFaGc9czk2LWMiLCJnaXZlbl9uYW1lIjoiUmlzaGkiLCJmYW1pbHlfbmFtZSI6IkpldGhpIiwiaWF0IjoxNzIxMTA2NDk3LCJleHAiOjE3MjExMTAwOTd9.e47zdujtkr9FzH5lrFKkCrTJ-jVDCqEmbUgfZIlxE4uLIqAnf9wUYoFaJ2mvIMCWCSf0ecIAbuYUYIm32uTAXQb3SVRVgNLLG0YaAjyjW-Tm_YJaLrT3Yr6RJkzjldCnaDoKU96xkb_lF63anDLTGdb4-pjZdxW7H13PAPRTZ7gnniwyhXS342A9sjvKTCMVG8WanPfTlMeUhQcc6AWqTbrP5CnXjUHO5ml28EqmTwXdGiC5kd0tvkj09TagaS_A6yzYD17DEGJQRwuLXgs0ul808A7BhkRmYSxc47GytP3l2tSpwBSS5W1NP2joMJ3-xofIKrJQCGHakHR5Q_YkQw', 'CC7CB453-3DF2-4B14-808E-6627B9A1DDE3', '2024-07-16 10:38:17', 1),
(47, 126, '', '', '2024-07-24 16:40:47', 1),
(48, 1, 'eyJhbGciOiJSUzI1NiIsImtpZCI6ImVlMTkzZDQ2NDdhYjRhMzU4NWFhOWIyYjNiNDg0YTg3YWE2OGJiNDIiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJodHRwczovL2FjY291bnRzLmdvb2dsZS5jb20iLCJhenAiOiI3NjM3MzcyMTI4MTctYmFzY24wczIyNDg3czJ2cmsybjBjNmJ1bzFiMTcxMHEuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJhdWQiOiI3NjM3MzcyMTI4MTctYmFzY24wczIyNDg3czJ2cmsybjBjNmJ1bzFiMTcxMHEuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJzdWIiOiIxMDkyMzE3Nzg1NTQ3ODU1NjEwMjciLCJoZCI6ImlsbHVtZWFibHkuY29tIiwiZW1haWwiOiJuaXJhakBpbGx1bWVhYmx5LmNvbSIsImVtYWlsX3ZlcmlmaWVkIjp0cnVlLCJhdF9oYXNoIjoiWm52eVJ2eFRGVFBHQnNFbktuRTJUZyIsIm5vbmNlIjoicVczZkVXQUZqd3hzZllqekRNLXkwOV9aVjJuUkNHMmRrdVEyZ1dZUzN2RSIsIm5hbWUiOiJOaXJhaiBBanVkaXlhIiwicGljdHVyZSI6Imh0dHBzOi8vbGgzLmdvb2dsZXVzZXJjb250ZW50LmNvbS9hL0FDZzhvY0xLZndubkJ2a3dqaUdJaXQ0dkF4T0dqTk5aMU9ILVJtWWp1UGI1d3RTa0ZfXzRJQT1zOTYtYyIsImdpdmVuX25hbWUiOiJOaXJhaiIsImZhbWlseV9uYW1lIjoiQWp1ZGl5YSIsImlhdCI6MTc0MjI4MDQ2MywiZXhwIjoxNzQyMjg0MDYzfQ.GhJEzvN2Cc4Ip32HgEfqrjGeqzWJDM7PBfTvIgD6RPN90Jqp1XdwYVPpRvoC9rfR0Q-8WOKKLMh2lpSAz_yPGghI21xZxrEWcofah7lhEhg9NIcowVAVRwVv1Bd-m42tCQnZag9GeGCRqOWscESbmRViSpGEVqSAd3VtRU8WXyVfk6ALoTuHiF73ryirglMpcLgIX-m7chjYXRKPubWw6YZqbZjZuGpIQ1-fq6hkGtHIkOHllPlkcUp8JfjP7LECgSL47AOrvr2yK31aEK9Uy1JK6568CTiz7DMq6H6EtlotF1qKdN9rvzIeNQ6jQLmOzdjetar7I9PnoT4xux46pA', 'DE37B1BE-B67E-46F2-B7AF-E29D48D09231', '2025-03-18 12:17:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_membership`
--

CREATE TABLE `user_membership` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `membership_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_membership`
--

INSERT INTO `user_membership` (`id`, `user_id`, `membership_id`, `start_date`, `end_date`, `created_at`) VALUES
(1, 1, 1, '2025-04-30 00:00:00', '2025-05-30 00:00:00', '2025-05-15 20:40:51'),
(2, 2, 2, '2025-03-31 00:00:00', '2025-06-29 00:00:00', '2025-05-15 20:40:51'),
(3, 3, 3, '2024-11-16 00:00:00', '2025-11-16 00:00:00', '2025-05-15 20:40:51'),
(4, 4, 1, '2025-03-16 00:00:00', '2025-04-15 00:00:00', '2025-05-15 20:40:51'),
(5, 5, 2, '2025-01-15 00:00:00', '2025-04-15 00:00:00', '2025-05-15 20:40:51'),
(6, 1, 5, '2025-04-15 00:00:00', '2025-07-14 00:00:00', '2025-05-15 20:42:00'),
(7, 1, 7, '2025-04-15 00:00:00', '2025-07-14 00:00:00', '2025-05-15 20:42:00'),
(8, 1, 8, '2025-04-15 00:00:00', '2025-07-14 00:00:00', '2025-05-15 20:42:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_rooms`
--
ALTER TABLE `chat_rooms`
  ADD PRIMARY KEY (`chat_room_id`);

--
-- Indexes for table `current_affers`
--
ALTER TABLE `current_affers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `descri_prepa`
--
ALTER TABLE `descri_prepa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `editional_vocab`
--
ALTER TABLE `editional_vocab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hot_gk`
--
ALTER TABLE `hot_gk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `latest_news`
--
ALTER TABLE `latest_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`qz_id`);

--
-- Indexes for table `tbl_aboutus`
--
ALTER TABLE `tbl_aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tbl_contactus`
--
ALTER TABLE `tbl_contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_favorite`
--
ALTER TABLE `tbl_favorite`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `tbl_membership`
--
ALTER TABLE `tbl_membership`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_plans`
--
ALTER TABLE `tbl_plans`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_score`
--
ALTER TABLE `tbl_score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subcategory_list`
--
ALTER TABLE `tbl_subcategory_list`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `tbl_transections`
--
ALTER TABLE `tbl_transections`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `tbl_views`
--
ALTER TABLE `tbl_views`
  ADD PRIMARY KEY (`view_id`);

--
-- Indexes for table `tbl_web_series`
--
ALTER TABLE `tbl_web_series`
  ADD PRIMARY KEY (`w_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unlocked_episodes`
--
ALTER TABLE `unlocked_episodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `user_membership`
--
ALTER TABLE `user_membership`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `membership_id` (`membership_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chat_rooms`
--
ALTER TABLE `chat_rooms`
  MODIFY `chat_room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `current_affers`
--
ALTER TABLE `current_affers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `descri_prepa`
--
ALTER TABLE `descri_prepa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `editional_vocab`
--
ALTER TABLE `editional_vocab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hot_gk`
--
ALTER TABLE `hot_gk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `latest_news`
--
ALTER TABLE `latest_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `qz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_aboutus`
--
ALTER TABLE `tbl_aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_contactus`
--
ALTER TABLE `tbl_contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_favorite`
--
ALTER TABLE `tbl_favorite`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_membership`
--
ALTER TABLE `tbl_membership`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_plans`
--
ALTER TABLE `tbl_plans`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_score`
--
ALTER TABLE `tbl_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_subcategory_list`
--
ALTER TABLE `tbl_subcategory_list`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tbl_transections`
--
ALTER TABLE `tbl_transections`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tbl_views`
--
ALTER TABLE `tbl_views`
  MODIFY `view_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_web_series`
--
ALTER TABLE `tbl_web_series`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `unlocked_episodes`
--
ALTER TABLE `unlocked_episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user_membership`
--
ALTER TABLE `user_membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 24, 2024 at 02:18 AM
-- Server version: 10.4.28-MariaDB-log
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `businessdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `card_id` int(11) NOT NULL,
  `card_type` varchar(255) NOT NULL,
  `card_name` varchar(255) NOT NULL,
  `card_desc` varchar(255) NOT NULL,
  `card_attack` int(11) NOT NULL,
  `card_defense` int(11) NOT NULL,
  `card_regen` int(11) NOT NULL,
  `card_img` varchar(255) NOT NULL DEFAULT '"INSERT IMG URL"'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`card_id`, `card_type`, `card_name`, `card_desc`, `card_attack`, `card_defense`, `card_regen`, `card_img`) VALUES
(1, 'normal', 'Basic Attack Hit', 'Basic Attack 1 Desc', 5, 0, 0, 'basicattack1.png'),
(2, 'normal', 'Basic Attack Kick', 'Basic Attack 1 Desc', 5, 0, 0, 'basicattack2.png'),
(3, 'special', 'Special Attack', 'Special Attack Desc', 10, 0, 0, 'specialattack.png'),
(4, 'normal', 'Locked in', 'Basic Defense 1 Desc', 0, 5, 0, 'basicd1.png'),
(5, 'normal', 'Protection', 'Basic Defense 1 Desc', 0, 5, 0, 'basicd2.png'),
(6, 'special', 'Access Denied', 'Special Defense Desc', 0, 10, 0, 'speciald.png');

-- --------------------------------------------------------

--
-- Table structure for table `enemies`
--

CREATE TABLE `enemies` (
  `enemy_id` int(8) NOT NULL,
  `enemy_name` varchar(255) NOT NULL,
  `enemy_img` varchar(255) NOT NULL DEFAULT '"INSERT IMG URL"',
  `enemy_locationID` int(8) NOT NULL,
  `enemy_energy` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enemies`
--

INSERT INTO `enemies` (`enemy_id`, `enemy_name`, `enemy_img`, `enemy_locationID`, `enemy_energy`) VALUES
(1, 'King Kong', 'kingkong.png', 1, 30),
(2, 'Makgeoli Man', 'mokman.jpg', 2, 15),
(3, 'High School Girls', 'highschoolgirls.jpg', 3, 20),
(4, 'Trashy Russian Guy', 'russian.jpg', 4, 15),
(5, 'Sleazy Korean Club Promoter', 'bouncer.jpg', 5, 15),
(6, 'Drunk Office Worker', 'drunkofficeworker.jpg', 6, 25),
(7, 'Nighttime Runner', 'jogger.jpg', 7, 10),
(8, 'Kakao Bunny', 'kakaobunny.jpg', 8, 20),
(9, 'Europeans', 'backpackers.jpg', 9, 40),
(10, 'Tone Deaf Busker', 'busker.jpg', 10, 30),
(11, 'Frisky Freshman', 'freshman.jpg', 11, 15),
(12, 'Hungry Hungry Hippo', 'whale.jpg', 12, 30),
(13, 'Noisy Seatmate', 'noisy.jpg', 13, 30),
(14, 'PC방 Gamer', 'pcbang.jpg', 14, 20),
(15, 'Gwisin', 'gwisin2.jpg', 19, 20),
(16, 'Jeosung Saja (Korean Grim Reaper)', 'grimreaper.jpg', 16, 15),
(17, 'Gumiho (Nine-tailed fox)', 'fox2.jpg', 15, 20),
(18, 'Bulgae (Fire dogs)', 'bulgae.jpg', 17, 20),
(19, 'Dokkaebi', 'dokkaebi.jpg', 19, 25),
(20, 'Sexy Cult Member', 'cult.jpg', 25, 15),
(21, 'Yangachi', 'gangster.jpg', 24, 25),
(22, 'Japoke', 'hustler.jpg', 18, 30),
(23, 'Sushi Chef on Smoke Break', 'sushi.jpg', 25, 25),
(24, 'Pompous Waygookin English Teacher', 'englishteacher.jpg', 22, 15),
(25, 'Halabeoji', 'harbee.jpg', 20, 35),
(26, 'K-boo', 'kboo.jpg', 22, 15),
(27, 'Hiking Ajumma', 'ahjumma.jpg', 25, 35),
(28, 'Hipster', 'hipster.jpg', 18, 25),
(29, 'Korean overly curious about Waygooks', 'curious.jpg', 21, 20),
(30, 'Korean D-list famous person', 'dlist.jpg', 18, 15),
(31, 'Captain Migook', 'capmigook.jpg', 23, 20);

-- --------------------------------------------------------

--
-- Table structure for table `enemy_moves`
--

CREATE TABLE `enemy_moves` (
  `enemy_id` int(11) NOT NULL,
  `move_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enemy_moves`
--

INSERT INTO `enemy_moves` (`enemy_id`, `move_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(4, 13),
(4, 14),
(4, 15),
(4, 16),
(5, 17),
(5, 18),
(5, 19),
(5, 20),
(6, 21),
(6, 22),
(6, 23),
(6, 24),
(7, 25),
(7, 26),
(7, 27),
(7, 28),
(8, 29),
(8, 30),
(8, 31),
(8, 32),
(9, 33),
(9, 34),
(9, 35),
(9, 36),
(10, 37),
(10, 38),
(10, 39),
(10, 40),
(11, 41),
(11, 42),
(11, 43),
(11, 44),
(12, 45),
(12, 46),
(12, 47),
(12, 48),
(13, 49),
(13, 50),
(13, 51),
(13, 52),
(14, 53),
(14, 54),
(14, 55),
(14, 56),
(15, 57),
(15, 58),
(15, 59),
(16, 60),
(16, 61),
(16, 62),
(16, 63),
(17, 64),
(17, 65),
(17, 66),
(18, 70),
(18, 71),
(18, 72),
(19, 67),
(19, 68),
(19, 69),
(20, 82),
(20, 83),
(20, 84),
(21, 87),
(21, 88),
(21, 89),
(22, 90),
(22, 91),
(22, 92),
(23, 93),
(23, 94),
(23, 95),
(24, 96),
(24, 97),
(24, 98),
(25, 99),
(25, 100),
(25, 101),
(26, 102),
(26, 103),
(26, 104),
(27, 105),
(27, 106),
(27, 107),
(28, 108),
(28, 109),
(28, 110),
(29, 111),
(29, 112),
(29, 113),
(30, 114),
(30, 115),
(30, 116),
(31, 117),
(31, 118),
(31, 119),
(15, 121),
(17, 121),
(18, 122),
(19, 123),
(20, 124),
(21, 125),
(22, 126),
(23, 127),
(24, 128),
(25, 129),
(26, 130),
(27, 131),
(28, 132),
(29, 133),
(30, 134),
(31, 135);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(255) DEFAULT NULL,
  `event_description` varchar(255) DEFAULT NULL,
  `event_img` varchar(255) DEFAULT '"INSERT IMG URL"'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_description`, `event_img`) VALUES
(1, 'Meeting with the Makgeoli Man', 'Its been a long night and you stumble into the playground. A friendly face appears and offers you a beverage.', 'mokman.jpg'),
(2, 'Playground Faceoff', 'You somehow find yourself at a local playground away from the hustle and bustle. On the slides, you see some high school kids bullying a younger friend. You slowly approach them but as you get closer you realize they are quite big.', 'pgevent.jpg'),
(3, 'King Kong Kostume', 'You goto a pocha with a king kong theme. They want somebody to cosplay King Kong and look towards your general direction. They come up to you with the full costume.', 'kingkongevent.jpg'),
(4, 'Chicken Break', 'You find yourself at a BBQ Chicken. A basket of chicken is placed in front of you but you have yet to order. You are also given a glass of beer but it looks funny', 'chickenevent.png'),
(5, 'NRB Star', 'After pregaming at the local 7-11, you build the courage to step into a 노래방 and its your turn to sing.', 'nrbevent.jpg'),
(6, 'Bar Duh', 'Trying to find the best rooftop bar, a friend recommends Bar Da. The bar is not well lit and steps are slippery. As you take your next step, you lose your balance and as you flail wildly in the air, you grab a hold a hold of something in the darkness.', 'bardaevent.jpg'),
(7, 'Shopping for a hoodie', 'The night is cold and you try to find a way to warm up. You go inside Nike and start shopping', 'nikeevent.jpg'),
(9, 'Bar Da Night Out', 'As you walk the Hongdae streets, you decide to walk up the narrow stairs into the world famous Bar Da', 'booze.jpg'),
(10, 'Busking', 'Showcase your talents by busking in a lively street.', 'busker.jpg'),
(11, 'Mike\'s Cabin', 'You decide to visit Mikes Cabin, a cozy bar nestled in the Hongdae backstreet. As you approach, the inviting glow of a neon highball welcomes you inside.', 'cardsevent.jpg'),
(12, 'Kakao Friends', 'You enter into the Kakao Friends perusing for a cute stuffed animal and other cool knick knacks for your friends back home.', 'kakaoevent.jpg'),
(13, 'Playground Adventure', 'After passing club after club, bar after bar, you see a familiar area  with other degens hanging around at the local playground', 'pgevent2.jpg'),
(14, 'NANTA show', 'As you wander through the vibrant streets, you stumble upon the world-famous NANTA Theatre. The rhythmic beats and lively atmosphere emanating from the venue captivate your curiosity. The performers beckon you to choose your experience.', 'nantaevent.jpg'),
(15, 'Dance night at club FF', 'Get ready for a night of pulsating beats and neon lights as you step into the vibrant atmosphere of Club FF', 'ffevent.jpg'),
(16, '노래방 Singing Night', 'You head into a noraebang with you friends, ready to sing your heart out to classic kpop and american songs', 'nbrevent2.jpg'),
(17, 'College Companions', 'As your vision gets blurry, you stumble around hongdae until you end up at its namesake, Hongdae University. There you make friends and they ask where you want to go next.', 'collegeevent.jpg'),
(18, 'Chicken 아줌마', 'After a long night of partying, you end up at a chicken skewer cart. Many other people have the same idea so the chicken lady is not paying attention. A lone skewer is up for grabs', 'chickenevent.jpg'),
(19, 'PC방 Post Game', 'As you walk towards the train station to go back home, you see a red neon sign pointing towards a PC방. Instead of going home, you go down into the warm embrace of videogames and 분식.', 'pcroomevent.jpg'),
(20, 'Bought your friend a birthday present', 'It’s your friends birthday, what do you do for them?', 'presentevent.jpg'),
(21, 'Joined Chinese tour', 'You got swept up in a group tour of Chinese citizens and ended up in a Korean red ginseng store', 'tourevent.jpg'),
(22, 'Dog soup restaurant', 'You meet an attractive person who wants to take you to their favorite restaurant, but it turns out to be a Dog soup restaurant', 'dogevent.jpg'),
(23, 'Brandnu cocktails', 'You go into Brandnu and order unlimited cocktails', 'bnevent.jpg'),
(24, 'Weather is bad', 'The weather is bad, and you enter the closest place open, but an angry old man refuses service', 'weather.jpg'),
(25, 'Gentle Monster art display', 'You see the crazy art display at Gentle Monster and either look at the art or buy cool sunglasses', 'gmevent.jpg'),
(26, 'Beer Pong at Joons Bar', 'The bar owner and a suave, impeccably dressed older gent have invited you to engage in a friendly beer pong match', 'joonsevent.jpg'),
(27, 'Street food Soondae', 'Your friend is hungry, and a street food stall is selling Soondae (Korean blood sausage)', 'soondae.jpg'),
(28, 'Dropped wallet', 'You dropped your wallet, but you don’t want to go home just yet', 'wallet.jpg'),
(29, 'Makchang restaurant', 'Your friends force you to eat at a Makchang (grilled pork intestines) restaurant', 'makchang.jpg'),
(30, 'Bingsu + Soju = ?', 'The menu has Bingsu, and you either order the traditional Bingsu or drop a bottle of soju on it', 'bingsu.jpg'),
(31, 'Kimchi from the community side dish', 'While grilling meat, you notice the ajumma recycled kimchi into the community side dish selfbar', 'kimchievent.jpg'),
(32, 'Explosive diarrhea in the bathroom', 'While using the bathroom, you hear someone dealing with explosive diarrhea, and the cook exits without washing hands', 'dookie.jpg'),
(33, 'Illegal parking on the sidewalk', 'An older guy parks his car on the sidewalk, forcing you to walk into traffic', 'parkingevent.jpg'),
(34, 'Drunk girl throws up on you', 'An extremely drunk girl runs by your table throwing up all over the floor, splashing you with stray puke', 'drunkgirl.jpg'),
(35, 'Traditional tea ceremony invitation', 'A group of young adults ask you to join them in a traditional tea ceremony', 'teaevent.jpg'),
(36, 'Locked bathroom door', 'You have to use the toilet, but the door is locked', 'locked.jpg'),
(37, 'Couples kerfuffle', 'The couple you are hanging out with gets into a couples kerfuffle, turning into a slapfest', 'couplefight.jpg'),
(38, 'One night stand proposition', 'An attractive person comes up to you, saying they want to have a one night stand with you', 'hookup.jpg'),
(39, 'Long waiting time', 'The waiting time is much longer than you anticipated', 'longline.jpg'),
(40, 'Raccoon bites', 'You go to the raccoon cafe, and a raccoon bites you', 'rcooncafe.jpg'),
(41, 'You met a Dokkaebi from Korean Mythology', 'As you arrive at your next round, a Dokkaebi gives you an option. You can wrestle him, and if you win, you get a great reward. If you can solve his riddle, he will give you a greater reward. Or you can just take this reward (this would be a trick).', 'dokkaebi.jpg'),
(42, 'Met NolBu and HeungBu from Korean Mythology', 'On your way to your destination, you see a little bird with a broken leg. Do you leave the bird to die and take a shot in its honor? Do you heal it back to health? Or do you watch as your friend HeungBu nurses the bird back to health.', 'nolbu.jpg'),
(43, 'Met a tiger from Korean Mythology', 'As you are eating Tteokbokki, a tiger appears and asks you for a bite or he will eat you. Say no and ignore the tiger (tigers don’t eat rice cakes), climb a tree and hope the tiger doesn’t eat you, or climb a rope that appears from the sky.', 'tiger.jpg'),
(44, 'Met a 3 legged crow from Korean Mythology', 'As you are sitting at your current stop, a 3 legged crow lands on your shoulder. Just ignore it, give it a sip of your beer and some food, or call animal control to kill the mutant bird.', '3leggedcrow.jpg'),
(45, 'Met a bear and tiger from Korean Mythology', 'You are standing outside, a bear and a tiger come up to you asking how to become human. Give them some garlic and mugwort and tell them to go hangout in a cave, do a shot of soju with them to overlook as a bear and tiger are talking to you, or buy them a ', 'bearandtiger.jpg'),
(46, 'Met Gumiho, a Korean Mythological figure', 'A beautiful girl comes up to you asking you if you would like to join her for a drink. After a few drinks with her, the girl reveals she is Gumiho, a nine-tailed fox that needs to eat men\'s livers. She is on day 998 of not eating human flesh, after a 1000', 'fox2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `event_options`
--

CREATE TABLE `event_options` (
  `event_id` int(8) NOT NULL,
  `option_id` int(8) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_options`
--

INSERT INTO `event_options` (`event_id`, `option_id`, `id`) VALUES
(1, 1, 1),
(1, 2, 2),
(1, 3, 3),
(2, 10, 4),
(2, 11, 5),
(2, 12, 6),
(3, 7, 7),
(3, 8, 8),
(3, 9, 9),
(4, 4, 10),
(4, 5, 11),
(4, 6, 12),
(5, 48, 13),
(5, 49, 14),
(5, 50, 15),
(6, 51, 16),
(6, 52, 17),
(6, 53, 18),
(7, 14, 19),
(7, 13, 20),
(7, 15, 21),
(9, 16, 22),
(9, 17, 23),
(9, 18, 24),
(10, 19, 25),
(10, 20, 26),
(10, 21, 27),
(11, 22, 28),
(11, 23, 29),
(11, 24, 30),
(12, 25, 31),
(12, 26, 32),
(12, 39, 33),
(13, 27, 34),
(13, 28, 35),
(13, 29, 36),
(14, 30, 37),
(14, 31, 38),
(14, 32, 39),
(15, 33, 40),
(15, 34, 41),
(15, 35, 42),
(16, 19, 43),
(16, 9, 44),
(16, 48, 45),
(17, 40, 46),
(17, 41, 47),
(17, 42, 48),
(18, 43, 49),
(18, 44, 50),
(18, 45, 51),
(19, 45, 52),
(19, 46, 53),
(19, 47, 54),
(20, 54, 142),
(20, 55, 143),
(20, 56, 144),
(21, 57, 145),
(21, 58, 146),
(21, 59, 147),
(22, 60, 148),
(22, 61, 149),
(22, 62, 150),
(22, 66, 151),
(0, 67, 152),
(0, 68, 153),
(23, 69, 154),
(23, 70, 155),
(23, 71, 156),
(24, 72, 157),
(24, 73, 158),
(24, 74, 159),
(25, 75, 160),
(25, 76, 161),
(25, 77, 162),
(26, 78, 163),
(26, 79, 164),
(26, 80, 165),
(27, 81, 166),
(27, 82, 167),
(27, 83, 168),
(28, 84, 169),
(28, 85, 170),
(28, 86, 171),
(29, 87, 172),
(29, 88, 173),
(29, 89, 174),
(30, 90, 175),
(30, 91, 176),
(30, 92, 177),
(31, 93, 178),
(31, 94, 179),
(31, 95, 180),
(32, 96, 181),
(32, 97, 182),
(32, 98, 183),
(33, 99, 184),
(33, 100, 185),
(33, 101, 186),
(34, 102, 187),
(34, 103, 188),
(34, 104, 189),
(35, 105, 190),
(35, 106, 191),
(35, 107, 192),
(36, 108, 193),
(36, 109, 194),
(36, 110, 195),
(39, 111, 196),
(39, 112, 197),
(39, 113, 198),
(37, 114, 199),
(37, 115, 200),
(37, 116, 201),
(38, 117, 202),
(38, 118, 203),
(38, 119, 204),
(0, 120, 205),
(0, 121, 206),
(0, 122, 207),
(40, 123, 208),
(40, 124, 209),
(40, 125, 210),
(41, 126, 211),
(41, 127, 212),
(41, 128, 213),
(42, 129, 214),
(42, 130, 215),
(42, 131, 216),
(43, 132, 217),
(43, 133, 218),
(43, 134, 219),
(44, 135, 220),
(44, 136, 221),
(44, 137, 222),
(45, 138, 223),
(45, 139, 224),
(45, 140, 225),
(46, 156, 226),
(46, 157, 227),
(46, 158, 228);

-- --------------------------------------------------------

--
-- Table structure for table `gameplay_logs`
--

CREATE TABLE `gameplay_logs` (
  `run_id` int(8) NOT NULL,
  `player_name` varchar(255) NOT NULL,
  `run_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `run_energyLevel` int(8) NOT NULL DEFAULT 100,
  `run_moneyLevel` int(8) NOT NULL DEFAULT 100000,
  `run_drunkLevel` int(8) NOT NULL DEFAULT 0,
  `run_sessionID` varchar(255) NOT NULL,
  `run_completed` varchar(255) NOT NULL DEFAULT 'no',
  `player_identifier` varchar(255) NOT NULL,
  `run_score` int(11) DEFAULT 0,
  `store_visits_left` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gameplay_logs`
--

INSERT INTO `gameplay_logs` (`run_id`, `player_name`, `run_timestamp`, `run_energyLevel`, `run_moneyLevel`, `run_drunkLevel`, `run_sessionID`, `run_completed`, `player_identifier`, `run_score`, `store_visits_left`) VALUES
(16, 'Jason Choi', '2024-01-09 13:56:15', 160, 90000, -16, '7bo10po67k2fu6rcq1rjq16n6n', '1', 'choijason25@gmail.com', -1442560, 0),
(17, 'Jason Choi', '2024-01-09 13:59:58', 100, 100000, 0, 'v7ksgvmshj1pmkd09no2gn0bqn', '1', 'choijason25@gmail.com', 0, 0),
(18, 'Jason Choi', '2024-01-09 14:03:29', 105, 50000, -2, 'mvakbeiofqi8afh28dto2nbm4k', '1', 'choijason25@gmail.com', -100210, 0),
(19, 'Jason Choi', '2024-01-09 14:05:45', 130, 70000, -36, '0mtqq8ou1lq6om7n0kv0i0qo2h', '1', 'choijason25@gmail.com', -2524680, 0),
(20, 'Jason Choi', '2024-01-09 14:07:35', 71, 247000, -18, '0uc4b4a8hlted38m7jhqf009n9', '1', 'choijason25@gmail.com', -4447278, 0),
(21, 'Jason Choi', '2024-01-09 14:12:09', 120, 260000, -20, 'd3tjn01vjuc9dlmnmq2ob6gm9s', '1', 'choijason25@gmail.com', -5202400, 0),
(22, 'Jason Choi', '2024-01-09 14:22:05', 268, 7000, 42, 'kvbrnm4mlbupp4i4almnu3hs3d', '1', 'choijason25@gmail.com', 305256, 0),
(23, 'Jason Choi', '2024-01-09 14:25:23', 215, 455000, -129, 'nll13c7q7fijgk3qjs7c7ft7he', '1', 'choijason25@gmail.com', -58722735, 0),
(24, 'Jason Choi', '2024-01-10 00:40:57', 115, 80000, -4, '0qqvt78v78qo6mqcpe4c0bkkq2', '1', 'choijason25@gmail.com', -320460, 0),
(25, 'Jason Choi', '2024-01-10 00:45:12', 105, 95000, -1, '4hv1mmqerjifu1v101vh8c3pb8', '1', 'choijason25@gmail.com', -95105, 0),
(26, 'Jason Choi', '2024-01-10 01:23:09', 95, 80000, 10, '8qbmpe56ovg7l3mlmihcpbkf1t', '1', 'choijason25@gmail.com', 800950, 0),
(27, 'Jason Choi', '2024-01-10 01:29:27', 115, 100000, -4, 'bg38ns5ertircdatiolaf7rscq', '1', 'choijason25@gmail.com', -400460, 0),
(28, 'Jason Choi', '2024-01-10 01:45:35', 115, 100000, -4, 'fo55fn7fbmp6v51380o91pfva1', '1', 'choijason25@gmail.com', -400460, 0),
(29, 'Jason Choi', '2024-01-10 01:50:52', 105, 100000, 0, 'dqtsh89nu5o28d5m8r87q7ptid', '1', 'choijason25@gmail.com', 0, 0),
(30, 'Jason Choi', '2024-01-10 08:59:05', 173, 70000, 19, 'fd2dje7pqulsi41bg3df3nrl3g', '1', 'choijason25@gmail.com', 1333287, 0),
(31, 'Jason Choi', '2024-01-10 09:06:50', 105, 100000, 0, 'etctfdbirmm3vdjp2sel8k8k0c', '1', 'choijason25@gmail.com', 0, 0),
(32, 'Jason Choi', '2024-01-10 09:07:20', 114, 240000, 24, '9rgpm6rvdvtg45rfik3i1544ne', '1', 'choijason25@gmail.com', 5762736, 0),
(33, 'Jason Choi', '2024-01-11 04:13:24', 192, -32000, 8, '3321dlsil37dsrp6ms01uvlrhs', '1', 'choijason25@gmail.com', -254464, 0),
(34, 'Jason Choi', '2024-01-11 06:37:04', 108, 115000, 48, '4pomovh8kdpfka290s54db8463', '1', 'choijason25@gmail.com', 5525184, 0),
(35, 'Jason Choi', '2024-01-11 06:40:45', 100, 100000, 0, '23dc2ttjij5f2uukumji6ip6fv', '1', 'choijason25@gmail.com', 0, 0),
(36, 'Jason Choi', '2024-01-11 07:00:06', 109, 242000, 35, 'm23dovbba4cqna94mbfis27bpb', '1', 'choijason25@gmail.com', 8473815, 0),
(37, 'Jason Choi', '2024-01-11 07:53:34', 178, 330000, 14, 'mt03ci34jpd7jsqfmgalqt0nfc', '1', 'choijason25@gmail.com', 4622492, 0),
(38, 'Jason Choi', '2024-01-11 09:12:42', 140, 140000, 1, '9b54tmsjupmue2b7mke3bq384l', '1', 'choijason25@gmail.com', 140140, 0),
(39, 'Jason Choi', '2024-01-11 10:25:20', 100, 100000, 0, 'cmsuhsrpekcpdc5fn51snv2k8h', '1', 'choijason25@gmail.com', 0, 0),
(40, 'Jason Choi', '2024-01-11 10:25:30', 100, 100000, 0, 'v3pm3pkjfj64pcibpik75uhf2t', '1', 'choijason25@gmail.com', 0, 0),
(41, 'Jason Choi', '2024-01-11 10:25:55', 100, 100000, 0, 'gqr8ibasb08olbo3oj65g47jor', '1', 'choijason25@gmail.com', 0, 0),
(42, 'Jason Choi', '2024-01-11 10:26:59', 113, 127000, 10, 'bveh3etbt9hdval292j3o97855', '1', 'choijason25@gmail.com', 1271130, 0),
(43, 'Jason Choi', '2024-01-11 10:30:30', 105, 110000, 0, 'di0j8gej8ng3lck45jp53ro7nc', '1', 'choijason25@gmail.com', 0, 0),
(44, 'Jason Choi', '2024-01-11 11:42:06', 100, 100000, 0, '06lpsir1m59j4a36aen02qmbho', '1', 'choijason25@gmail.com', 0, 0),
(45, 'Jason Choi', '2024-01-11 11:43:22', 100, 100000, 0, '9k4joknij3qmgqn3mvm3cbr4jb', '1', 'choijason25@gmail.com', 0, 0),
(46, 'Jason Choi', '2024-01-11 11:45:19', 100, 100000, 0, 'u3iis9g6d3141194pj30bu8hf1', '1', 'choijason25@gmail.com', 0, 0),
(47, 'Jason Choi', '2024-01-11 11:45:50', 100, 100000, 0, 'ni4fj3ar3gdkpdnlvbrh30adq6', '1', 'choijason25@gmail.com', 0, 0),
(48, 'Jason Choi', '2024-01-11 11:46:41', 100, 100000, 0, 'qnn6j39tkl7b1a3id4laqntqvo', '1', 'choijason25@gmail.com', 0, 0),
(49, 'Jason Choi', '2024-01-11 11:50:53', 150, 146000, 4, 'v2evug5s756jhbtbcuqv81fm2p', '1', 'choijason25@gmail.com', 584600, 0),
(50, 'Jason Choi', '2024-01-11 11:51:45', 105, 95000, 4, 'b6lv7ghieebpd5pdm0pj92d8j5', '1', 'choijason25@gmail.com', 380420, 0),
(51, 'Jason Choi', '2024-01-11 11:52:41', 200, 95000, 10, 'lhqp5jf1da9oecigqtt851o3bh', '1', 'choijason25@gmail.com', 952000, 0),
(52, 'Jason Choi', '2024-01-11 11:55:47', 100, 100000, 0, 'lm4antcrnhhtasvnka25scovok', '1', 'choijason25@gmail.com', 0, 0),
(53, 'Jason Choi', '2024-01-11 11:57:25', 100, 100000, 0, 'tla80hmj1fai2an5204939rv3l', '1', 'choijason25@gmail.com', 0, 0),
(54, 'Jason Choi', '2024-01-11 12:03:15', 98, 97000, 0, '12j7b1bb4k1tksaphkskem58qg', '1', 'choijason25@gmail.com', 0, 0),
(55, 'Jason Choi', '2024-01-11 12:07:49', 105, 90000, 4, 'si4jn6710t6d4clr93d3n93bab', '1', 'choijason25@gmail.com', 360420, 0),
(56, 'Jason Choi', '2024-01-11 12:09:05', 100, 100000, 0, 'vtet3esj974qt9ttpcsc9lh8ea', '1', 'choijason25@gmail.com', 0, 0),
(57, 'Jason Choi', '2024-01-11 12:10:28', 95, 80000, 10, 'rv6nu5ciqdhf9vdh07o5v92gl1', '1', 'choijason25@gmail.com', 800950, 0),
(58, 'Jason Choi', '2024-01-11 12:11:08', 100, 100000, 0, 'v74h4v37n95s3gn8ne8ukuqbc9', '1', 'choijason25@gmail.com', 0, 0),
(59, 'Jason Choi', '2024-01-11 12:11:41', 123, 140000, 10, 't0f5utf2t5o8cdopmslfip09mg', '1', 'choijason25@gmail.com', 1401230, 0),
(60, 'Jason Choi', '2024-01-11 12:14:10', 108, 105000, 0, '6f6s4temjmbbc2ub99ek0akhq8', '1', 'choijason25@gmail.com', 0, 0),
(61, 'Jason Choi', '2024-01-11 12:15:40', 100, 100000, 0, 'pdn4envpi5bkkbf87qpv96qiqn', '1', 'choijason25@gmail.com', 0, 0),
(62, 'Jason Choi', '2024-01-11 12:16:54', 95, 80000, 10, 'fpmedo3teifoasue3jbu1p5e0r', '1', 'choijason25@gmail.com', 800950, 0),
(63, 'Jason Choi', '2024-01-11 12:20:39', 100, 100000, 0, 'b9t19kaotco550cosj80ada1po', '1', 'choijason25@gmail.com', 0, 0),
(64, 'Jason Choi', '2024-01-11 12:29:49', 100, 100000, 0, '1e5si03tu8454eiv183oakcm8u', '1', 'choijason25@gmail.com', 0, 0),
(65, 'Jason Choi', '2024-01-11 12:36:09', 103, 230000, 3, 'scmaifuhelq1npubjomqfadvi4', '1', 'choijason25@gmail.com', 690309, 0),
(66, 'Jason Choi', '2024-01-11 12:36:58', 135, 150000, 0, 'ajjaj67rja78d4q2dh8db7q84h', '1', 'choijason25@gmail.com', 0, 0),
(67, 'Jason Choi', '2024-01-11 12:38:35', 108, 90000, 0, '8ba2ifar9plkcqsnkjpvn52qg3', '1', 'choijason25@gmail.com', 0, 0),
(68, 'Jason Choi', '2024-01-11 12:39:40', 100, 100000, 0, 'rdndnudev40tc7j8sgpcu0tprq', '1', 'choijason25@gmail.com', 0, 0),
(69, 'Jason Choi', '2024-01-11 12:40:45', 100, 100000, 0, '5ovnk1u53j216jtv6kujncveb1', '1', 'choijason25@gmail.com', 0, 0),
(70, 'Jason Choi', '2024-01-11 12:46:13', 100, 100000, 0, 'b3385r9rv1ufgei6gf618mffkq', '1', 'choijason25@gmail.com', 0, 0),
(71, 'Jason Choi', '2024-01-11 12:48:14', 100, 100000, 0, 'eelu5dah04eh8qfnd30gkor9i0', '1', 'choijason25@gmail.com', 0, 0),
(72, 'Jason Choi', '2024-01-11 12:48:44', 98, 100000, 0, 'h0qs5c1n2enur4dd2ugt2i13vb', '1', 'choijason25@gmail.com', 0, 0),
(73, 'Jason Choi', '2024-01-11 12:49:26', 100, 100000, 0, 'd34aat6c6kou3lkj34uffer1vu', '1', 'choijason25@gmail.com', 0, 0),
(74, 'Jason Choi', '2024-01-11 12:49:50', 98, 250000, 3, 'r5ir2kb1jrboqtl7k2aq28qni0', '1', 'choijason25@gmail.com', 750294, 0),
(75, 'Jason Choi', '2024-01-11 12:51:10', 100, 100000, 0, 'p9vfaa1mgufknm0docpjj52bf2', '1', 'choijason25@gmail.com', 0, 0),
(76, 'Jason Choi', '2024-01-11 12:51:40', 120, 140000, 10, 'uc2p72e9icpkepa5re28hhbntg', '1', 'choijason25@gmail.com', 1401200, 0),
(77, 'Jason Choi', '2024-01-11 12:52:07', 135, 95000, 3, 'v7ldkr95bv6qe1sv2apc8t5jqj', '1', 'choijason25@gmail.com', 285405, 0),
(78, 'Jason Choi', '2024-01-11 12:53:39', 93, 260000, 0, 'sqtbjj7tqm4b4gv1ar382sjvlh', '1', 'choijason25@gmail.com', 0, 0),
(79, 'Jason Choi', '2024-01-11 12:55:06', 100, 100000, 0, '05ists75cne6gempl1qdat0dsk', '1', 'choijason25@gmail.com', 0, 0),
(80, 'Jason Choi', '2024-01-11 12:55:44', 100, 100000, 0, 'j0tg7pi54m1rk2aa9lnpaqm92i', '1', 'choijason25@gmail.com', 0, 0),
(81, 'Jason Choi', '2024-01-11 12:57:19', 98, 250000, 3, 'hb1fgj95sncntg3bcb3996if29', '1', 'choijason25@gmail.com', 750294, 0),
(82, 'Jason Choi', '2024-01-11 12:58:14', 95, 93000, 0, 'hqi1i167p7kg8dvk8gtvunrner', '1', 'choijason25@gmail.com', 0, 0),
(83, 'Jason Choi', '2024-01-11 12:59:17', 105, 80000, 0, 'nms8lr3o0gcsiq6injrlcdhqum', '1', 'choijason25@gmail.com', 0, 0),
(84, 'Jason Choi', '2024-01-11 23:52:45', 100, 100000, 0, '5uob2edc0qm64p1fou7v9es2m3', '1', 'choijason25@gmail.com', 0, 0),
(85, 'Jason Choi', '2024-01-12 00:51:50', 100, 100000, 0, 'nohuu9hlc4n11lfjc7vom3d7nk', '1', 'choijason25@gmail.com', 0, 0),
(86, 'Jason Choi', '2024-01-12 00:52:26', 98, 250000, 3, 'irju0bvs2rrk9ic2k1g9ebr06a', '1', 'choijason25@gmail.com', 750294, 0),
(87, 'Jason Choi', '2024-01-12 00:54:44', 100, 100000, 0, 'kgol7fgq7as5gn9rep4ghqpes5', '1', 'choijason25@gmail.com', 0, 0),
(88, 'Jason Choi', '2024-01-12 01:20:39', 140, 124990, 0, '3uti1brmq9108ds2hjg5m2oi9v', '1', 'choijason25@gmail.com', 0, 0),
(89, 'Jason Choi', '2024-01-12 02:00:12', 100, 100000, 0, '88ne0jkq5acjpkudij35gua6og', '1', 'choijason25@gmail.com', 0, 0),
(90, 'Jason Choi', '2024-01-12 02:01:17', 90, 100000, 0, 'dhv57addbmlj33bcrcigcuav0h', '1', 'choijason25@gmail.com', 0, 0),
(91, 'Jason Choi', '2024-01-12 02:01:52', 100, 100000, 0, '5bqlh8slcrvtrurijq1bpki7eo', '1', 'choijason25@gmail.com', 0, 0),
(92, 'Jason Choi', '2024-01-12 02:04:50', 100, 100000, 2, 'd3q7k8r5kbcrsv9qdq4d7jh17p', '1', 'choijason25@gmail.com', 200200, 0),
(93, 'Jason Choi', '2024-01-12 02:05:58', 100, 100000, 0, 'f7je64mfcvbccleddtqfv4g4v2', '1', 'choijason25@gmail.com', 0, 0),
(94, 'Jason Choi', '2024-01-12 02:08:13', 100, 100000, 0, '30ebmage2nrod8vs0cv8id08na', '1', 'choijason25@gmail.com', 0, 0),
(95, 'Jason Choi', '2024-01-12 02:08:32', 100, 100000, 0, 'vk883db338duvrmao9ri67pt1g', '1', 'choijason25@gmail.com', 0, 0),
(96, 'Jason Choi', '2024-01-12 02:09:08', 100, 100000, 0, 'ep90kcnkkb0gfel30dqrm2anqp', '1', 'choijason25@gmail.com', 0, 0),
(97, 'Jason Choi', '2024-01-12 02:32:03', 100, 100000, 0, 'b5pulj90og7jtnj24utimp6obc', '1', 'choijason25@gmail.com', 0, 0),
(98, 'Jason Choi', '2024-01-12 02:32:38', 100, 100000, 0, 'c5mtfkkqfeb4k7u7mbqlfe007l', '1', 'choijason25@gmail.com', 0, 0),
(99, 'Jason Choi', '2024-01-12 02:38:48', 100, 100000, 0, 'iob7kd3s2kvv1ijus3jmon4vho', '1', 'choijason25@gmail.com', 0, 0),
(100, 'Jason Choi', '2024-01-12 02:42:15', 100, 100000, 0, '87207p6rj37btv2lmnvdls4gp1', '1', 'choijason25@gmail.com', 0, 0),
(101, 'Jason Choi', '2024-01-12 02:49:45', 98, 95000, 1, 'f8bivr1ksumtpmmcjd2i2mnd6g', '1', 'choijason25@gmail.com', 95098, 0),
(102, 'Jason Choi', '2024-01-12 04:10:44', 95, 135000, 8, 'godi9vm76nltdkant93eqc31dc', '1', 'choijason25@gmail.com', 1080760, 0),
(103, 'Jason Choi', '2024-01-12 04:16:56', 105, 105000, 0, 'v6limc6ujvdpk463il2794h7sn', '1', 'choijason25@gmail.com', 0, 0),
(104, 'Jason Choi', '2024-01-12 04:27:40', 100, 100000, 0, 'jk5jf8ikrsl2le8mntgrec8olh', '1', 'choijason25@gmail.com', 0, 0),
(105, 'Jason Choi', '2024-01-12 04:27:53', 98, 80000, 0, 'a8snhf1tteu47cqbmpa777i333', '1', 'choijason25@gmail.com', 0, 0),
(106, 'Jason Choi', '2024-01-12 04:50:18', 100, 100000, 0, 'gkkurkoolrd02iptb6kvg3f60a', '1', 'choijason25@gmail.com', 0, 0),
(107, 'Jason Choi', '2024-01-12 04:59:47', 100, 100000, 0, 'i7bhjsj4r4122edg4gftm5la4a', '1', 'choijason25@gmail.com', 0, 0),
(108, 'Jason Choi', '2024-01-12 05:01:01', 105, 80000, 0, 'bc201pcpqropq5rq8hr2prho4b', '1', 'choijason25@gmail.com', 0, 0),
(109, 'Jason Choi', '2024-01-12 05:01:41', 100, 100000, 0, 'dntrhj1nb87693sv67o17lnjq5', '1', 'choijason25@gmail.com', 0, 0),
(110, 'Jason Choi', '2024-01-12 05:03:56', 90, 100000, 0, 'pqrc352le4ncanrc3ookfcl44a', '1', 'choijason25@gmail.com', 0, 0),
(111, 'Jason Choi', '2024-01-12 05:05:06', 100, 100000, 0, 'vldmgh35opsgqm84rrrn4v1ldg', '1', 'choijason25@gmail.com', 0, 0),
(112, 'Jason Choi', '2024-01-12 05:10:58', 90, 100000, 0, 'rd8v59v10veu8c5mnao6fnru7o', '1', 'choijason25@gmail.com', 0, 0),
(113, 'Jason Choi', '2024-01-12 05:35:46', 95, 100000, 0, 'cvrvcmskacsgmbe1onkalhoalg', '1', 'choijason25@gmail.com', 0, 0),
(114, 'Jason Choi', '2024-01-12 05:43:00', 65, 100000, 0, 'oh1sqd9ap75m4nmgcomc8uippc', '1', 'choijason25@gmail.com', 0, 0),
(115, 'Jason Choi', '2024-01-12 06:15:31', 115, 55000, 0, 'j4ocmcjtrduvdloijgr4vhkhu9', '1', 'choijason25@gmail.com', 0, 0),
(116, 'Jason Choi', '2024-01-12 07:01:39', 100, 100000, 0, '243lngjb2j3cc079n1jrocg9r0', '1', 'choijason25@gmail.com', 0, 0),
(117, 'Jason Choi', '2024-01-12 10:56:22', 100, 100000, 0, '9cgb2m2jchgtn4gltqg9hnov86', '1', 'choijason25@gmail.com', 0, 0),
(118, 'Jason Choi', '2024-01-12 11:11:07', 95, 100000, 1, 'ks8ft50p20nud8q35lrep9omm3', '1', 'choijason25@gmail.com', 100095, 0),
(119, 'Jason Choi', '2024-01-12 11:13:09', 60, 100000, 0, '7daq7iprs9chqlddbse9drklrq', '1', 'choijason25@gmail.com', 0, 0),
(120, 'Jason Choi', '2024-01-12 11:14:31', 100, 100000, 0, '8aa6j6uid9mi5mmddb2amv7989', '1', 'choijason25@gmail.com', 0, 0),
(121, 'Jason Choi', '2024-01-12 11:52:43', 50, 100000, 0, 'ikh3el38nqia3k1o9b33ia47v2', '1', 'choijason25@gmail.com', 0, 0),
(122, 'Jason Choi', '2024-01-12 11:55:59', 7, 100000, 0, '8hu8i2dbc5tcv5bsrafaenokui', '1', 'choijason25@gmail.com', 0, 0),
(123, 'Jason Choi', '2024-01-12 11:58:00', 2, 100000, 0, 'p903km9j42rvmsnk3l0u71ak6b', '1', 'choijason25@gmail.com', 0, 0),
(124, 'Jason Choi', '2024-01-12 11:59:47', 70, 100000, 0, 'ul66k09konab9f8gltjip6ud3j', '1', 'choijason25@gmail.com', 0, 0),
(125, 'Jason Choi', '2024-01-12 12:00:47', 103, 100000, 0, 'kkqc4af3q2sglev4urbt03o5sd', '1', 'choijason25@gmail.com', 0, 0),
(126, 'Jason Choi', '2024-01-12 12:01:29', 12, 200000, 0, '5jk4s0gdorren9rtlvh2aclmuj', '1', 'choijason25@gmail.com', 0, 0),
(127, 'Jason Choi', '2024-01-12 12:02:51', -15, 100000, 0, 'ijfh3bhnjnpsbkju5sr43jf2ga', '1', 'choijason25@gmail.com', 0, 0),
(128, 'Jason Choi', '2024-01-12 12:05:48', 100, 100000, 27, 'jvamctiper7n99kfsh3u6afoqn', '1', 'choijason25@gmail.com', 2702700, 0),
(129, 'Jason Choi', '2024-01-12 12:07:28', 38, 250000, 3, '10ht0koi60o0sronups8r5pgqk', '1', 'choijason25@gmail.com', 750114, 0),
(130, 'Jason Choi', '2024-01-12 12:10:57', -40, 90000, 10, '9r4h25pga8osoulmpce4ktutuk', '1', 'choijason25@gmail.com', 899600, 0),
(131, 'Jason Choi', '2024-01-13 04:36:35', -8, 20000, 0, 'htn71sf81mfprmciphp3931va6', '1', 'choijason25@gmail.com', 0, 0),
(132, 'Jason Choi', '2024-01-13 04:42:07', -59, 100000, 0, 'sg8bakj39r0g80k1fjarhatm0d', '1', 'choijason25@gmail.com', 0, 0),
(133, 'Jason Choi', '2024-01-13 04:42:43', -6, 100000, 0, '1a505huil4mn86rk92791pfri8', '1', 'choijason25@gmail.com', 0, 0),
(134, 'Jason Choi', '2024-01-13 04:50:14', -5, 100000, 0, 'l9mhbjt3a9mv4da2q66ri2q9o8', '1', 'choijason25@gmail.com', 0, 0),
(135, 'Jason Choi', '2024-01-13 05:04:41', -70, 100000, 0, 'n6s6fsv6150074kia2m5aeug0m', '1', 'choijason25@gmail.com', 0, 0),
(136, 'Jason Choi', '2024-01-13 05:06:35', -8, 55000, 14, 'ubvuojliml2nh7ea3nd3ohike9', '1', 'choijason25@gmail.com', 769888, 0),
(137, 'Jason Choi', '2024-01-13 06:23:31', 100, 100000, 0, '42pfgt04g1rsn5drhvi4v5nio3', '1', 'choijason25@gmail.com', 0, 0),
(138, 'Jason Choi', '2024-01-13 06:36:58', 100, 100000, 0, '0pkmtdcsg4r783vco3q2s0nl5j', '1', 'choijason25@gmail.com', 0, 0),
(139, 'Jason Choi', '2024-01-13 06:53:31', 100, 100000, 0, 'a2qtjuq81he3u649ki0osqb3ps', '1', 'choijason25@gmail.com', 0, 0),
(140, 'Jason Choi', '2024-01-13 07:04:13', 100, 100000, 0, '7q14jn9hivq0etibbe3kkio080', '1', 'choijason25@gmail.com', 0, 0),
(141, 'Jason Choi', '2024-01-13 09:11:51', 0, 133000, 9, '21v6hg7ohd7ifsuhc6k7ivo405', '1', 'choijason25@gmail.com', 1197000, 0),
(142, 'Jason Choi', '2024-01-13 09:51:24', 100, 100000, 0, 'ngf72r85cs78anp5f593s1s6gh', '1', 'choijason25@gmail.com', 0, 0),
(143, 'Jason Choi', '2024-01-13 09:52:58', 100, 100000, 0, 'k5japbnjvk3aofjb66bi23oun5', '1', 'choijason25@gmail.com', 0, 0),
(144, 'Jason Choi', '2024-01-13 10:02:15', 120, 140000, 10, 'kljtt6t8s2kq6q63nld3d01nsk', '1', 'choijason25@gmail.com', 1401200, 0),
(145, 'Jason Choi', '2024-01-13 10:16:54', 100, 100000, 0, 'tjho10urq46t7ha9fnuhaihb7p', '1', 'choijason25@gmail.com', 0, 0),
(146, 'Jason Choi', '2024-01-13 10:19:56', 92, 136000, 30, 'rislb06eb9ft76vs2n5mbisd74', '1', 'choijason25@gmail.com', 4082760, 0),
(147, 'Jason Choi', '2024-01-13 10:21:38', 100, 100000, 0, 'm0hgs430rndg4d2c45ug959o4q', '1', 'choijason25@gmail.com', 0, 0),
(148, 'Jason Choi', '2024-01-13 10:25:07', 100, 100000, 0, '5q69e4ot03un7hr907t6k7cesi', '1', 'choijason25@gmail.com', 0, 0),
(149, 'Jason Choi', '2024-01-13 10:25:35', 135, 46000, -30, 'b2oakiclm0olq9hom7pqbm8s19', '1', 'choijason25@gmail.com', -1384050, 0),
(150, 'Jason Choi', '2024-01-13 10:27:35', 100, 100000, 0, '2d3b5co8uurl9vuog5frtjinna', '1', 'choijason25@gmail.com', 0, 0),
(151, 'Jason Choi', '2024-01-13 10:29:39', 100, 100000, 0, 'fss444qqk3ce0hvmom11c4204m', '1', 'choijason25@gmail.com', 0, 0),
(152, 'Jason Choi', '2024-01-13 10:32:52', 100, 100000, 0, 'ca3s8qf71ov1g1b5mhe6u6qj72', '1', 'choijason25@gmail.com', 0, 0),
(153, 'Jason Choi', '2024-01-13 10:33:33', 102, 98000, 0, 'e95p61rn5lvd09rktaus8b14t9', '1', 'choijason25@gmail.com', 0, 0),
(154, 'Jason Choi', '2024-01-13 10:39:00', 39, 123000, 100, '226maqiqb07ialoqvvc52vm3e0', '1', 'choijason25@gmail.com', 12303900, 0),
(155, 'Jason Choi', '2024-01-13 10:48:20', 53, 50500, 100, 'te6kdfq1h25vb6kb4krg5khf0i', '1', 'jasonchoi13@gmail.com', 5055300, 0),
(156, 'Jason Choi', '2024-01-14 03:02:10', 98, 285000, 28, 'ft42svrs9gp9j2qmld6ajp3ild', '1', 'choijason25@gmail.com', 7982744, 0),
(157, 'Jason Choi', '2024-01-14 03:05:21', 47, 45000, 60, 'rqq9fntsbd197jkksfmrejc8er', '1', 'choijason25@gmail.com', 2702820, 0),
(158, 'Jason Choi', '2024-01-14 03:06:22', 93, 97500, 15, 'o793dhgcvd2o3dhuh6iaoa78bu', '1', 'choijason25@gmail.com', 1463895, 0),
(159, 'Jason Choi', '2024-01-14 03:14:15', 45, 78000, 110, 'gfg85lhu16kj3f64q1bvugpmji', '1', 'choijason25@gmail.com', 8584950, 0),
(160, 'Jason Choi', '2024-01-14 03:15:06', 26, -8000, 52, 'almm91c83bdtvhk0h6if7ai9cf', '1', 'choijason25@gmail.com', -414648, 0),
(161, 'Jason Choi', '2024-01-15 01:43:02', 40, 210000, 17, '14i0n81e9in5svvotf8it2hjuv', '1', 'choijason25@gmail.com', 3570680, 0),
(162, 'Jason Choi', '2024-01-15 02:38:41', 36, 66200, 49, 'mu0hfd04raolhrj4tad4i4pda0', '1', 'choijason25@gmail.com', 3245564, 0),
(163, 'Jason Choi', '2024-01-15 02:42:05', 100, 100000, 0, 'tfkuoglsk9ov4nrlg25eh25vei', '1', 'choijason25@gmail.com', 0, 0),
(164, 'Jason Choi', '2024-01-15 02:42:18', 100, 100000, 0, 'qb37lltrk4oa7mtpmee6n4lqlq', '1', 'choijason25@gmail.com', 0, 0),
(165, 'Jason Choi', '2024-01-15 02:42:27', 100, 100000, 0, '0aq70j75fa8v509s62lc0935rh', '1', 'choijason25@gmail.com', 0, 0),
(166, 'Jason Choi', '2024-01-15 02:49:39', 90, 140000, 10, 'n077rrn29cgqp78crtj702dpsg', '1', 'choijason25@gmail.com', 1400900, 0),
(167, 'Jason Choi', '2024-01-15 02:56:15', 100, 100000, 0, 'g0a3anskrdnmalp1inv1k4klhv', '1', 'choijason25@gmail.com', 0, 0),
(168, 'Jason Choi', '2024-01-15 02:56:24', 100, 100000, 0, 's9cp7h6ro2bkhsnlrdh1ckrf3u', '1', 'choijason25@gmail.com', 0, 0),
(169, 'Jason Choi', '2024-01-15 02:56:35', 100, 100000, 0, 'nn8ib9i4bflu6kopf7ibbpfuo1', '1', 'choijason25@gmail.com', 0, 0),
(170, 'Jason Choi', '2024-01-15 02:56:45', 100, 100000, 0, 'nhpul1g51pntf1v2d0shr6es5n', '1', 'choijason25@gmail.com', 0, 0),
(171, 'Jason Choi', '2024-01-15 02:56:55', 100, 100000, 0, 're7dgqjffh81srm8o5qs5t0q01', '1', 'choijason25@gmail.com', 0, 0),
(172, 'Jason Choi', '2024-01-15 03:25:14', -38, 41000, 44, '15okvqq8dttln89ku6njcjl35f', '1', 'choijason25@gmail.com', 1802328, 0),
(173, 'Jason Choi', '2024-01-15 03:27:46', 28, 26500, 2, 'krqph2ep0rc4v1andrvcj6m22f', '1', 'choijason25@gmail.com', 53056, 0),
(174, 'Jason Choi', '2024-01-15 09:51:51', 67, 85500, -38, 'r9g4kpi0h84fo9sf3701h0ifem', '0', 'choijason25@gmail.com', 0, 0),
(175, 'Jason Choi', '2024-01-15 09:55:41', 44, 63000, 10, 'fl4aq1roee804iho519psulo73', '0', 'choijason25@gmail.com', 630440, 0),
(176, 'Jason Choi', '2024-01-15 12:04:41', 70, 100000, 0, '8ia2pnci9bfd527qjugd269krr', '0', 'choijason25@gmail.com', NULL, 0),
(177, 'Jason Choi', '2024-01-15 12:08:07', 65, 230000, 18, 'quugp0n89h9qh8n35j4m603f3p', '0', 'choijason25@gmail.com', NULL, 0),
(178, 'Jason Choi', '2024-01-16 00:54:17', 61, 229000, 23, '9uvqsko9nfg2lafh25r1ip1v3i', '0', 'choijason25@gmail.com', 5268403, 0),
(179, 'Jason Choi', '2024-01-16 01:07:03', 45, 114000, 0, '4if7d6c13vo3q55hppclpc0v92', '0', 'choijason25@gmail.com', 0, 0),
(180, 'Jason Choi', '2024-01-16 01:09:46', 17, -15200, 5, 'tbmrhqjovuv9d78kvo1hdiqbik', '0', 'choijason25@gmail.com', 0, 0),
(181, 'Jason Choi', '2024-01-16 04:56:47', 71, 100000, 0, 'ndrquptitlb4v9pcg5qfpj46bq', '0', 'choijason25@gmail.com', 0, 0),
(182, 'Jason Choi', '2024-01-16 05:07:52', 100, 100000, 0, '4hhu7jm7q12df1f0bfmh294s7e', '0', 'choijason25@gmail.com', 0, 0),
(183, 'Jason Choi', '2024-01-16 05:33:25', 85, 100000, 0, 'pjfk9gal6gnpa4h8c3ov1unu1e', '0', '3288133608', 0, 0),
(184, 'Jason Choi', '2024-01-16 05:36:07', 100, 100000, 0, 'hvsdbt6u8ee6lej6finjar40fq', '0', '3288133608', 0, 0),
(185, 'Jason Choi', '2024-01-16 05:36:17', 100, 100000, 0, '5i2m14rm2h40dgbins8qol1vld', '0', 'choijason25@gmail.com', 0, 0),
(186, 'Jason Choi', '2024-01-16 06:24:54', 77, 100000, 0, '924ba6pnlavrdvol1d0u13t57k', '0', 'choijason25@gmail.com', 0, 0),
(187, 'Jason Choi', '2024-01-16 06:25:40', 97, 100000, 0, 'jp2n8jhppec11tqaablju16iot', '0', '3288133608', 0, 0),
(188, 'Jason Choi', '2024-01-16 06:35:23', 100, 100000, 0, 'ckr3krq1nij0tt3dh3ink1qpah', '0', '3288133608', 0, 0),
(189, 'Cullen Marshall', '2024-01-16 06:50:19', 100, 100000, 0, 'gnq0744iq25fr3157hbhjbgrgf', '0', 'cullenmarshall66@gmail.com', 0, 0),
(190, 'Cullen Marshall', '2024-01-16 06:50:56', 100, 100000, 0, 'maojn7upinnsfd6dhjt8ubf6hn', '0', 'bongsooma@gmail.com', 0, 0),
(191, 'Cullen Marshall', '2024-01-16 06:51:49', -24, 41000, 0, 'n1hm4rq479lm21e952n74une46', '0', 'bongsooma@gmail.com', 0, 0),
(192, 'Cullen Marshall', '2024-01-18 00:54:39', -10, 100000, 0, 't6ntrvj46pss4nnmuse58dhkts', '0', 'bongsooma@gmail.com', 0, 0),
(193, 'Cullen Marshall', '2024-01-18 00:56:17', 90, 100000, 0, 'g3523eea95n03bdv7g2qvvj0j8', '0', 'bongsooma@gmail.com', 0, 0),
(194, 'Cullen Marshall', '2024-01-18 01:05:16', 100, 100000, 0, '7oocv8oim6k8fcv9c4rmir69nj', '0', 'bongsooma@gmail.com', 0, 0),
(195, 'Cullen Marshall', '2024-01-18 01:05:32', 100, 100000, 0, 't959249j46vg631ejoqp3v5ra9', '0', 'bongsooma@gmail.com', 0, 0),
(196, 'Cullen Marshall', '2024-01-18 01:05:44', 100, 100000, 0, 'l7s8rv47srblcu2cerv0t7fjph', '0', 'bongsooma@gmail.com', 0, 0),
(197, 'Cullen Marshall', '2024-01-18 01:05:57', 100, 100000, 0, 'o0bsk0oaa0uaicffigh1gin4lc', '0', 'bongsooma@gmail.com', 0, 0),
(198, 'Cullen Marshall', '2024-01-18 01:06:15', -2, 100000, 0, 'j5j2an2tfcq66lh9j9sb90cq0i', '0', 'bongsooma@gmail.com', 0, 0),
(199, 'Cullen Marshall', '2024-01-18 01:08:00', 100, 100000, 0, 'rud9fe7154mepiue7evcbm49ig', '0', 'bongsooma@gmail.com', 0, 0),
(200, 'Cullen Marshall', '2024-01-18 01:08:18', 100, 100000, 0, 'in5orblloh410s1rnoko27v7t4', '0', 'bongsooma@gmail.com', 0, 0),
(201, 'Cullen Marshall', '2024-01-18 01:08:30', 95, 100000, 0, 'e22gna3pcp645jdpd2nvhrdqkk', '0', 'bongsooma@gmail.com', 0, 0),
(202, 'Cullen Marshall', '2024-01-18 01:08:58', 70, 100000, 0, 'cp9rtf935skh0mb8gs1bgek3a2', '0', 'bongsooma@gmail.com', 0, 0),
(203, 'Cullen Marshall', '2024-01-18 01:21:14', -4900, 90000, 0, 'v63ai2om7rlup9163cvjvd22vl', '0', 'bongsooma@gmail.com', 0, 0),
(204, 'Cullen Marshall', '2024-01-18 01:22:22', -16, 100000, 0, 'gn8ga6o30av19b793p5fjerl77', '0', 'bongsooma@gmail.com', 0, 0),
(205, 'Cullen Marshall', '2024-01-18 01:27:07', -4900, 100000, 0, '5tenldbi3df0reimgdtp61lq0i', '0', 'bongsooma@gmail.com', 0, 0),
(206, 'Cullen Marshall', '2024-01-18 01:27:41', 75, 100000, 0, '379ddf0cfk5o4lluf5g9gq4hnn', '0', 'bongsooma@gmail.com', 0, 0),
(207, 'Cullen Marshall', '2024-01-18 01:52:54', -60, 100000, 0, 'dvnv3v62572qng2c0lcj1h9fe2', '0', 'bongsooma@gmail.com', 0, 0),
(208, 'Cullen Marshall', '2024-01-18 01:54:45', -15, 50000, -25, 'qpg2112jcapkpp4n38j1c2uvej', '0', 'bongsooma@gmail.com', 0, -1),
(209, 'Cullen Marshall', '2024-01-18 02:02:36', 58, 100000, 0, 'ot0sc0s9p18b629g8tlfmdrh11', '0', 'bongsooma@gmail.com', 0, 0),
(210, 'Cullen Marshall', '2024-01-18 02:30:03', 70, 100000, 0, '0q3hkhi3fcdl0kfa61iij4s9j7', '0', 'bongsooma@gmail.com', 0, 0),
(211, 'Cullen Marshall', '2024-01-18 02:43:58', 100, 100000, 0, '18mdbnjvpo9eadqfuugi142t74', '0', 'bongsooma@gmail.com', 0, 0),
(212, 'Cullen Marshall', '2024-01-18 02:47:28', -7, 80000, 0, 'r0jgdl2ulcbu966pmvgpus8bbv', '0', 'bongsooma@gmail.com', 0, 0),
(213, 'Cullen Marshall', '2024-01-18 02:48:53', 60, 100000, 0, '5bvtj73anpiqnir2dt2cdso6nq', '0', 'bongsooma@gmail.com', 0, 0),
(214, 'Cullen Marshall', '2024-01-18 02:52:13', -6, 115000, 5, 'b61tpknhlocau3atfehtde04j9', '0', 'bongsooma@gmail.com', 0, 0),
(215, 'Cullen Marshall', '2024-01-18 02:54:21', -27, 50000, 10, 'pkp6ou4vj1grq2h6udqhh54e28', '0', 'bongsooma@gmail.com', 0, 0),
(216, 'Cullen Marshall', '2024-01-18 02:57:05', 50, 90000, 25, 'p2s2uqn4b2vl4j9hf17gfovtcn', '0', 'bongsooma@gmail.com', 0, 0),
(217, 'Cullen Marshall', '2024-01-18 05:42:37', -25, 100000, 0, 'fd8tnceefb0def6dbqc70jv95m', '0', 'bongsooma@gmail.com', 0, 0),
(218, 'Cullen Marshall', '2024-01-18 05:47:21', 90, 100000, 0, 'ck7c0jnuou4434vc58rkdvo0h6', '0', 'bongsooma@gmail.com', 0, 0),
(219, 'Cullen Marshall', '2024-01-18 05:49:47', 95, 75000, 25, '7kq6909p4cfu6t8or093nsit8m', '0', 'bongsooma@gmail.com', 0, 0),
(220, 'Cullen Marshall', '2024-01-18 05:50:56', -10, 43500, 0, 'ejgd03aq3pb6kr3bl51in1b9vp', '0', 'bongsooma@gmail.com', 0, -1),
(221, 'Cullen Marshall', '2024-01-18 05:53:39', 90, 100000, 0, 't9cj989opnm3iksrh4prijnudk', '0', 'bongsooma@gmail.com', 0, 0),
(222, 'Cullen Marshall', '2024-01-18 05:55:04', -40, 42000, 15, '366ig148ioint4g9r86bsa4kq8', '0', 'bongsooma@gmail.com', 0, -1),
(223, 'Cullen Marshall', '2024-01-18 05:57:47', 85, 100000, 0, 'vq0h0gs6b0v7dt37efimj9sg3t', '0', 'bongsooma@gmail.com', 0, 0),
(224, 'Cullen Marshall', '2024-01-18 06:10:26', 2, 115000, 0, 'ac76rhct3jut5v43f8cpo4f2it', '0', 'bongsooma@gmail.com', 0, 0),
(225, 'Cullen Marshall', '2024-01-18 06:16:57', 82, 100000, 0, '924afq2r4ub2fmp3b04lookjal', '0', 'bongsooma@gmail.com', 0, 0),
(226, 'Cullen Marshall', '2024-01-18 06:20:40', 100, 95000, 0, 'akdc600668o62eu6gsloik70nt', '0', 'bongsooma@gmail.com', 0, -1),
(227, 'Cullen Marshall', '2024-01-18 06:23:09', -5, 67000, 0, '6uerfh0tvhevi7bomd465dj1sc', '0', 'bongsooma@gmail.com', 0, -1),
(228, 'Cullen Marshall', '2024-01-18 06:26:20', -5, 90000, 0, '81j43bhogr06f9ermv3lgat5i9', '0', 'cullenmarshall66@gmail.com', 0, 0),
(229, 'Cullen Marshall', '2024-01-18 06:28:08', 100, 100000, 0, 'qv8cbtgv6qpfupvq5rfrdovv3a', '0', 'bongsooma@gmail.com', 0, 0),
(230, 'Cullen Marshall', '2024-01-18 06:32:42', -35, 67000, 0, 'tqasae6ssui9r9csk7gqjgumug', '0', 'bongsooma@gmail.com', 0, -1),
(231, 'Cullen Marshall', '2024-01-18 06:35:49', 30, 100000, 5, 'v48dt0jotfufoddtp854nakqf9', '0', 'bongsooma@gmail.com', 0, 0),
(232, 'Cullen Marshall', '2024-01-18 06:41:34', 70, 100000, 0, 'fc1mm3vf7jbr80012upg39lum0', '0', 'bongsooma@gmail.com', 0, 0),
(233, 'Cullen Marshall', '2024-01-18 06:46:52', 40, 100000, 0, 'uf3sp12d9gh6bs0uiao0lqgllm', '0', 'bongsooma@gmail.com', 0, 0),
(234, 'Cullen Marshall', '2024-01-18 06:49:05', 100, 70000, 0, 'stc8qbq7mdm8csju22f8o4vlk7', '0', 'bongsooma@gmail.com', 0, 0),
(235, 'Cullen Marshall', '2024-01-18 09:08:51', 90, 95000, 0, 'dgk9v2hufhvnfola4a1gpprobq', '0', 'bongsooma@gmail.com', 0, 0),
(236, 'Cullen Marshall', '2024-01-18 09:33:42', 100, 90000, 0, 'rhi9e5p7g9rqpn8o486a1rrkhs', '0', 'bongsooma@gmail.com', 0, -1),
(237, 'Cullen Marshall', '2024-01-18 11:15:59', 20, 80000, 0, 't8q5djnir81phv694rar691f3t', '0', 'bongsooma@gmail.com', 0, -1),
(238, 'Cullen Marshall', '2024-01-22 00:42:37', 100, 100000, 0, 'v1267fgfp3vme9oj2cda3v2s90', '0', 'bongsooma@gmail.com', 0, 0),
(239, 'Cullen Marshall', '2024-01-22 00:43:23', 100, 100000, 0, 'd93prq9c6mr6jd2u3j8rak14ch', '0', 'bongsooma@gmail.com', 0, 0),
(240, 'Cullen Marshall', '2024-01-22 00:49:51', 100, 100000, 0, 'dvrvo75ir06c5skm6gol4ad89o', '0', 'bongsooma@gmail.com', 0, 0),
(241, 'Cullen Marshall', '2024-01-22 00:57:44', 100, 100000, 0, '9gpg8h6laapo7r1rps1kvl253s', '0', 'bongsooma@gmail.com', 0, 0),
(242, 'Cullen Marshall', '2024-01-22 01:02:14', 0, 120000, 0, 'k4to49al1gqu6n0s12ro1m53rv', '0', 'bongsooma@gmail.com', 0, 0),
(243, 'Cullen Marshall', '2024-01-22 01:03:38', 75, 52000, 0, 'otin6t4tru7od4psnb89acq627', '0', 'bongsooma@gmail.com', 0, -1),
(244, 'Cullen Marshall', '2024-01-22 01:23:30', 100, 100000, 0, 'cmr1mvbioafec6v7g6a66d8an1', '0', 'bongsooma@gmail.com', 0, 2),
(245, 'Cullen Marshall', '2024-01-22 02:35:25', 100, 110000, 0, 'ih732e0mjqfcufghjps23vfd23', '0', 'bongsooma@gmail.com', 0, 2),
(246, 'Cullen Marshall', '2024-01-22 02:52:13', 90, 100000, 0, 'poreaer0gj2f4q1jim4600nm3n', '0', 'bongsooma@gmail.com', 0, 2),
(247, 'Cullen Marshall', '2024-01-22 02:54:12', 100, 87000, 0, 'ddsd3qr3d1m9fdgev82bpdlkn7', '0', 'bongsooma@gmail.com', 0, 1),
(248, 'Cullen Marshall', '2024-01-22 02:59:00', -15, 37500, 0, '31mmm8qr14densccppjnis5keu', '0', 'bongsooma@gmail.com', 0, 1),
(249, 'Cullen Marshall', '2024-01-22 03:19:04', 55, 16000, 55, 'v053s98vl40e155m01n2bfnn61', '0', 'bongsooma@gmail.com', 883025, 1),
(250, 'Cullen Marshall', '2024-01-22 06:06:12', -15, 100000, 0, '61mh7976u7sn697a2kufa9e0df', 'no', 'bongsooma@gmail.com', 0, 2),
(251, 'Cullen Marshall', '2024-01-22 06:44:08', -5, 75000, 5, '3danap0hadlv0muiibi1m561dp', 'no', 'bongsooma@gmail.com', 0, 2),
(252, 'Jason Choi', '2024-01-22 07:20:34', 65, 100000, 5, 'e5rdopsi47mqnv3kar1o4oaj6i', 'no', 'choijason25@gmail.com', 0, 2),
(253, 'Jason Choi', '2024-01-22 09:13:34', -10, 100000, 10, '3sq9rmg86j939mm2qbeg4ic391', 'no', 'choijason25@gmail.com', 0, 2),
(254, 'Jason Choi', '2024-01-22 09:16:40', 18, 16200, 29, '499p6kr4lb6qnpn34jrtpann56', 'yes', 'choijason25@gmail.com', 470322, 1),
(255, 'Jason Choi', '2024-01-22 09:23:54', 100, 100000, 0, 'a0mfrnd55sb72aso37gkf1g59u', 'no', 'choijason25@gmail.com', 0, 1),
(256, 'Jason Choi', '2024-01-22 09:34:15', 74, 84000, 75, 'dqkd13o42uftp4josess96e2rd', 'yes', 'choijason25@gmail.com', 6305550, 1),
(257, 'Jason Choi', '2024-01-23 02:47:05', 90, 100000, 10, 'louf00dlfp46lp5j7sa69aaqcs', 'no', 'choijason25@gmail.com', 0, 2),
(258, 'Jason Choi', '2024-01-23 02:52:05', 55, 105000, 55, 'dbss4hh5ghsfpdbpjo9cnjoni9', 'yes', 'choijason25@gmail.com', 5778025, 2),
(259, 'Jason Choi', '2024-01-23 03:18:51', 50, 115000, 25, 'ni2itbam5g21pntngj0attibh1', 'yes', 'choijason25@gmail.com', 2876250, 2),
(260, 'Jason Choi', '2024-01-23 03:21:54', 40, 65000, 40, 'n97kf2aj7434cv207o3lh3amki', 'no', 'choijason25@gmail.com', 0, 1),
(261, 'Jason Choi', '2024-01-23 03:25:03', 95, 73000, 35, 'oqeqstu23s2gk9s1pkjnv5d71q', 'no', 'choijason25@gmail.com', 0, 1),
(262, 'Jason Choi', '2024-01-23 04:52:38', 100, 100000, 0, 'jfrf0dgf1504reimg217bq5huh', 'no', 'choijason25@gmail.com', 0, 2),
(263, 'Jason Choi', '2024-01-23 05:03:49', 100, 100000, 0, 'prvpbrg0nhm8n9vvcc0fruanmo', 'no', 'choijason25@gmail.com', 0, 2),
(264, 'Jason Choi', '2024-01-23 05:04:59', 100, 94000, 0, '4f20lhqkpqibb15mam5hnhd9tg', 'no', '3288133608', 0, 1),
(265, 'Jason Choi', '2024-01-23 05:32:34', 100, 100000, 0, 'uu1g92jvkc5osjcemqi69eegv4', 'no', '3288133608', 0, 2),
(266, 'Jason Choi', '2024-01-23 05:33:43', 100, 100000, 0, 'qvtv6kjfkoo6kk10t23e0p7kav', 'no', '3288133608', 0, 2),
(267, 'Jason Choi', '2024-01-23 05:35:31', 70, 100000, 5, 'm7kep28pnhjftqild3meq2ik0k', 'no', '3288133608', 0, 2),
(268, 'Jason Choi', '2024-01-23 05:38:46', 45, 100000, 5, 'kr4padmoveii5jnfe70ca566lq', 'no', '3288133608', 0, 2),
(269, 'Jason Choi', '2024-01-23 05:41:13', 100, 100000, 0, 'ilfgo227v3ubj8c77joon5mbk4', 'no', '3288133608', 0, 2),
(270, 'Jason Choi', '2024-01-23 05:42:33', 100, 100000, 0, 'r45jund3s7ob3i9riela7d0r42', 'no', '3288133608', 0, 2),
(271, 'Jason Choi', '2024-01-23 05:46:38', 100, 100000, 5, 'ju7fojsd3ao628nnegogp4b129', 'no', '3288133608', 0, 2),
(272, 'Jason Choi', '2024-01-23 05:52:12', 100, 100000, 0, 'brtjgthiq4i1asnb90tg3kdlhq', 'no', '3288133608', 0, 2),
(273, 'Jason Choi', '2024-01-23 05:52:55', 100, 100000, 0, 'vv7lu483v7126rbfsbat2t4jeg', 'no', '3288133608', 0, 2),
(274, 'Jason Choi', '2024-01-23 05:54:01', 100, 100000, 0, 'k2ulgctqseej9lkb1lpmm0qvqr', 'no', '3288133608', 0, 2),
(275, 'Jason Choi', '2024-01-23 05:55:13', 100, 100000, 5, 'qs9a325npv01rod7auri3s57df', 'no', '3288133608', 0, 2),
(276, 'Jason Choi', '2024-01-23 05:56:07', 75, 80000, 25, 'q59vnh6lfp1sklbqi4tmtaq9lf', 'no', '3288133608', 0, 2),
(277, 'Jason Choi', '2024-01-23 06:39:44', 75, 95000, 20, 'kq7fsob5sumubfvlcn9sjn6kv3', 'no', 'choijason25@gmail.com', 0, 2),
(278, 'Jason Choi', '2024-01-23 08:47:04', 25, 30000, 105, '426fl53bnleb89thaj0uarf3b8', 'yes', 'choijason25@gmail.com', 3807600, 1),
(279, 'Jason Choi', '2024-01-23 09:14:39', 35, 2000, 100, 'uuuoka32ngmsnca9v12un0hhds', 'yes', 'choijason25@gmail.com', 203500, 1),
(280, 'Jason Choi', '2024-01-23 10:44:34', 0, 60000, 105, 'irubvdjkj7nr666tmhhbalvqta', 'no', 'choijason25@gmail.com', 0, 0),
(281, 'Jason Choi', '2024-01-23 12:32:06', 100, 100000, 0, 'gr06qtdfskbhu4gbaa41jht9do', 'no', '3288133608', 0, 2),
(282, 'Jason Choi', '2024-01-23 12:39:40', 25, 55000, 95, 'j4a8es9a84c94iec6rvbjsr11c', 'yes', 'choijason25@gmail.com', 5227375, 0),
(283, 'Jason Choi', '2024-01-23 12:43:28', 85, 30000, 55, 'dllej4suaigsuuarim5a9jhgrq', 'yes', '3288133608', 1654675, 0),
(284, 'Jason Choi', '2024-01-24 00:52:04', 100, 100000, 0, '9dvre8411dp2erneck431c4rcd', 'no', '3288133608', 0, 2),
(285, 'Jason Choi', '2024-01-24 01:15:19', 25, 127000, 20, 'gijcbi4lbttv1qp8qeddpah7fv', 'no', '3288133608', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(255) DEFAULT NULL,
  `location_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `location_name`, `location_img`) VALUES
(1, '키콩포차', 'kingkongpocha.jpg'),
(2, 'playground', 'playground.jpeg'),
(3, '노래방', 'nrb.jpg'),
(4, 'Bar Da', 'barda.jpg'),
(5, 'Club FF', 'clubff.jpg'),
(6, '치맥', 'chimaek.jpg'),
(7, 'Nike', 'nike.jpeg'),
(8, 'Kakao Friends', 'kakaofriends.jpg'),
(9, 'Mikes Cabin', 'mikescabin.jpeg'),
(10, 'Busking', 'busking.jpg'),
(11, '홍익대학교', 'hongik.jpg'),
(12, '길거리 닭꼬치', 'chickenskewers.jpg'),
(13, 'NANTA Theatre', 'nanta.jpg'),
(14, 'T1 PC방', 'pcbang.jpg'),
(15, 'Raccoon Cafe', 'rcooncafe.jpg'),
(16, 'Ginseng Shop', 'ginseng.jpg'),
(17, 'Soupe de Chien', 'dogsoup.jpg'),
(18, 'BrandNu Bar', 'brandnu.jpg'),
(19, 'Gentle Monster', 'gentmonster.jpg'),
(20, 'Restaurant de Viande d\'Anus', 'goprestaurant.jpg'),
(21, 'Zen Bar', 'zenbar.jpg'),
(22, 'Thursday Party', 'thurpa.jpg'),
(23, 'KFC', 'kfc.jpg'),
(24, 'Korean  BBQ restaurant', 'bbq.jpg'),
(25, 'Walking down the street', 'hongdaestreet.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `location_events`
--

CREATE TABLE `location_events` (
  `not_important` int(11) NOT NULL,
  `location_id` int(8) NOT NULL,
  `event_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location_events`
--

INSERT INTO `location_events` (`not_important`, `location_id`, `event_id`) VALUES
(1, 1, 3),
(2, 2, 1),
(3, 2, 2),
(4, 3, 16),
(6, 4, 6),
(7, 4, 9),
(8, 5, 15),
(9, 7, 7),
(10, 8, 12),
(11, 9, 11),
(12, 10, 10),
(13, 11, 17),
(14, 12, 18),
(15, 13, 14),
(16, 14, 19),
(17, 6, 4),
(18, 2, 13),
(19, 1, 20),
(25, 1, 34),
(27, 2, 21),
(28, 2, 24),
(29, 2, 27),
(30, 2, 28),
(43, 9, 20),
(44, 9, 24),
(47, 9, 38),
(49, 17, 22),
(51, 19, 25),
(52, 17, 24),
(53, 17, 32),
(56, 10, 35),
(57, 10, 27),
(58, 11, 35),
(62, 15, 40),
(63, 16, 21),
(65, 18, 23),
(67, 20, 29),
(68, 20, 31),
(83, 2, 36),
(85, 2, 41),
(86, 2, 42),
(87, 2, 43),
(88, 2, 44),
(89, 2, 45),
(90, 2, 46),
(157, 10, 28),
(159, 10, 36),
(187, 13, 28),
(219, 16, 36),
(221, 16, 41),
(222, 16, 42),
(223, 16, 43),
(224, 16, 44),
(225, 16, 45),
(226, 16, 46),
(259, 20, 24),
(265, 21, 39),
(266, 22, 37),
(267, 22, 38),
(268, 23, 34),
(269, 24, 24),
(270, 25, 26),
(271, 26, 36);

-- --------------------------------------------------------

--
-- Table structure for table `mart_items`
--

CREATE TABLE `mart_items` (
  `mart_id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `price_hit` int(11) NOT NULL,
  `energy_hit` int(11) DEFAULT NULL,
  `drunk_hit` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `item_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mart_items`
--

INSERT INTO `mart_items` (`mart_id`, `item`, `price_hit`, `energy_hit`, `drunk_hit`, `type`, `item_img`) VALUES
(1, 'Cass', -3000, 0, 5, 'drink', 'beer_svg.svg'),
(2, 'Hite', -3000, 0, 5, 'drink', 'beer_svg.svg'),
(3, 'Terra', -3000, 0, 5, 'drink', 'beer_svg.svg'),
(4, 'OB', -3000, 0, 5, 'drink', 'beer_svg.svg'),
(5, 'Red Soju', -5000, -5, 10, 'drink', 'soju_svg.svg'),
(6, 'Fresh Soju', -5000, -5, 10, 'drink', 'soju_svg.svg'),
(7, 'Cheap Wine', -5000, -10, 15, 'drink', 'wine_svg.svg'),
(8, 'Fancy Wine', -15000, -10, 20, 'drink', 'wine_svg.svg'),
(9, 'Whiskey', -30000, -15, 30, 'drink', 'wine_svg.svg'),
(10, 'Hot Six', -5000, 10, -5, 'drink', 'can_svg.svg'),
(11, 'Cock-a-Cola', -3000, 5, 0, 'drink', 'can_svg.svg'),
(12, 'Can Coffee', -3000, 10, -5, 'drink', 'can_svg.svg'),
(13, 'Water', -3000, 5, -5, 'drink', 'water_svg.svg'),
(14, 'Banana Milk', -3000, 10, 0, 'drink', 'can_svg.svg'),
(15, 'Ginseng', -50000, 30, -15, 'drink', 'ramen_svg.svg'),
(16, 'Tuna Kimbap', -5000, 10, -5, 'food', 'bap_svg.svg'),
(17, 'Spam Kimbap', -5000, 10, -5, 'food', 'bap_svg.svg'),
(18, 'Dried Fish', -3000, 5, 0, 'food', 'chicken_svg.svg'),
(19, 'Cone Ice Cream', -5000, 10, -5, 'food', 'ice_svg.svg'),
(20, 'Melon Ice Cream', -3000, 5, 0, 'food', 'ice_svg.svg'),
(21, 'Fried Chicken', -5000, 10, -5, 'food', 'chicken_svg.svg'),
(22, 'Sausage', -3000, 5, 0, 'food', 'chicken_svg.svg'),
(23, 'Jelly Candy', -5000, 10, -5, 'food', 'candy_svg.svg'),
(24, '도시락', -10000, 20, -10, 'food', 'bap_svg.svg'),
(25, 'Sandwich', -3000, 5, 0, 'food', 'sandwich_svg.svg'),
(26, 'Chips', -3000, 2, -1, 'food', 'ramen_svg.svg');

-- --------------------------------------------------------

--
-- Table structure for table `moves`
--

CREATE TABLE `moves` (
  `move_id` int(8) NOT NULL,
  `move_name` varchar(255) NOT NULL,
  `move_desc` varchar(255) NOT NULL,
  `move_attack` int(8) NOT NULL,
  `move_defend` int(8) NOT NULL,
  `move_regen` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `moves`
--

INSERT INTO `moves` (`move_id`, `move_name`, `move_desc`, `move_attack`, `move_defend`, `move_regen`) VALUES
(1, 'Gorilla Slam', 'King Kong uses his mighty fists to slam you', 5, 0, 0),
(2, 'Banana Break', 'King Kong eats a bushel of bananas to regain energy', 0, 0, 0),
(3, 'Primate Prison', 'King Kong calls his primate friends to ferociously deal damage', 15, 0, 0),
(4, 'Monkey Business', 'King Kong uses his fellow monkeys as a shield while he conducts his business', 0, 5, 0),
(5, 'Makgeoli Meteor', 'Makgeoli Man throws full makgeoli bottles at you', 5, 0, 0),
(6, 'Makgeoli Mirage', 'Makgeoli Man hides behind his cart and shields himself', 0, 5, 0),
(7, 'Makgeoli Break', 'Makgeoli Man drinks some of his makgeoli to recharge', 0, 0, 0),
(8, 'Makgeoli Mega Missile', 'Makgeoli Man slams his cart at full speed into you', 15, 0, 0),
(9, 'Gossip Girls', 'The high school girls say mean things about you', 5, 0, 0),
(10, 'Mirror mirror', 'The high school girls distract you with your own reflection!', 0, 5, 0),
(11, 'PowderRoom Pause', 'The high school girls take a break to fix their hair and makeup', 0, 0, 0),
(12, 'The GLORY', 'The high school girls use their curling irons to brand you', 15, 0, 0),
(13, 'Sweatsuit Swing', 'The Russian Guy swaggers up to you in his sweatsuit and attacks!', 5, 0, 0),
(14, 'Nesting Doll', 'The Russian Guy hides inside a nesting doll!', 0, 5, 0),
(15, 'Putin Power', 'Russian Guy prays to his diety and sends a missile your way', 20, 0, 0),
(16, 'White Russian', 'Russian Guy takes a cocktail break to regain his energy', 0, 0, 0),
(17, 'Clubbing', 'The Club Promoter hits on you!', 5, 0, 0),
(18, 'Club Cop-Out', 'The Club Promoter runs back into the club and hides', 0, 5, 0),
(19, 'Drinking on the Job', 'The Club Promoter takes a shot to regain his energy', 0, 0, 0),
(20, 'Kick Out', 'The Club Promoter kicks you out of the club and throws up on you. Yuck!', 15, 0, 0),
(21, 'Smokebomb', 'The office worker blows smoke in your face!', 5, 0, 0),
(22, 'Asian Squat', 'The office worker squats as you attack and dodges!', 0, 5, 0),
(23, 'Condition(ing)', 'The office worker takes a swig of condition and regains energy', 0, 0, 0),
(24, 'Blackout Drunk', 'The office worker throws up all over you. Yuck!', 15, 0, 0),
(25, 'Silent Sideswipe', 'The runner in his full blackout gear runs into you!', 5, 0, 0),
(26, 'Disappearing Dasher', 'The runner moves out from the well lit road and hides in the darkness', 0, 5, 0),
(27, 'H2O', 'The runner takes a water break and regains energy', 0, 0, 0),
(28, 'Running Rampage', 'The runner steps all over you and does massive damage!', 15, 0, 0),
(29, 'Poop Pellets', 'The Kakao Bunny poops on you!', 5, 0, 0),
(30, 'Bunny Burrow', 'The Bunny crawls into its burrow and hides!', 0, 5, 0),
(31, 'Carrot Cake', 'The Bunny takes a cake break and regains energy', 0, 0, 0),
(32, 'Bunny Barrage', 'The Bunny rears its hind legs and hits you with a barrage of attacks!', 15, 0, 0),
(33, 'Stank Breath', 'The English try to talk to you and you get hit with a whiff of their stanky breath!', 5, 0, 0),
(34, 'Teeth Gap', 'One European opens his mouth and the rest of the crew is able to hide between the gigantic gap in between his teeth!', 0, 5, 0),
(35, 'BO\'OH O\'WA\'ER', 'The Europeans take a \"water\" break and regain energy', 0, 0, 0),
(36, 'Revolutionary War', 'The English lose the Revolutionary War and damages itself! USA USA USA', -15, 0, 0),
(37, 'Shrill Screaming', 'The horrible buskers singing damages your ear drums!', 5, 0, 0),
(38, 'Autotune', 'The busker turns on autotune and is saved from the threats of the crowd', 0, 5, 0),
(39, 'Stop Singing', 'The crowd finally gets to the busker and forces him to take a break', 0, 0, 0),
(40, 'High Note Hellfire', 'The High Note of the busker kills all flying animals and rains their carcasses on you!', 20, 0, 0),
(41, 'Freshman Fight Club', 'The freshman gather around you and make you fight!', 5, 0, 0),
(42, 'Scatter', 'The freshman scatter away like rats and hide', 0, 5, 0),
(43, 'Non-Alcoholic Beer', 'The freshman drink non-alcoholic beer and regain energy', 0, 0, 0),
(44, 'Freshman 15', 'The freshman gather and attack!', 15, 0, 0),
(45, 'Chomp', 'The hippo chomps you!', 5, 0, 0),
(46, 'Submerge', 'The hippo submerges into a local river and hides', 0, 5, 0),
(47, 'Watermelon Crunch', 'The hippo eats a watermelon in one bite and regains energy', 0, 0, 0),
(48, 'Lizzo', 'The hippo calls its best friend, Lizzo, and the two of them charge at you!', 5, 0, 0),
(49, 'Talking Twat', 'The noisy seatmate talks your ear off!', 5, 0, 0),
(50, 'Deflects', 'The usher asks who keeps talking during the performance and your seatmate points at you!', 0, 5, 0),
(51, 'Intermission', 'Your seatmate goes off during intermission to get some snacks and regains energy', 0, 0, 0),
(52, 'Droning Death', 'After 2 hours of nonstop talking, it finally gets to you and you start bleeding out of your ears!', 15, 0, 0),
(53, 'Ramen Spill', 'The gamer next to you spills his ramen on you!', 5, 0, 0),
(54, 'Headset Hiding', 'The gamer puts on his headset and refuses to listen!', 0, 5, 0),
(55, 'Fried Rice Recharge', 'The gamer orders fried rice and regains energy', 0, 0, 0),
(56, 'VR', 'The gamer mistakes real life for a video game. He starts shooting you with a real gun!', 15, 0, 0),
(57, 'Ghostly Tickles', 'The Cheonyeo Gwisin conjures ghostly feathers and playfully tickles her opponents private parts, distracting them with laughter and causing a temporary decrease in their combat effectiveness.', 10, 5, 0),
(58, 'Spooky Peek-a-Boo Surprise', 'The ghostly lady suddenly disappears, only to reappear with her saggy ghosty boobs flopping around. While you are mesmerized by her see-thru body, and you are frozen cannot attack her', 0, 15, 0),
(59, 'Ghostly Poltergeist Party', 'The Cheonyeo Gwisin summons spectral disco lights, funky music, and  party decorations. You lose all your power to control yourself and dance endlessly  .', 5, 5, 0),
(60, 'Seoul Drain', 'Jeosung Saja drains the energy of his opponent, requiring a significant sacrifice of the player\'s energy. However, successfully defeating Jeosung Saja in this intense battle results in a great reward.', 20, 0, 0),
(61, 'Saja Scythe Slash', 'Jeosung Saja swings his ominous scythe with precision, dealing a normal amount of damage to his opponent.', 10, 0, 0),
(62, 'Shadowy Evasion', 'Jeosung Saja hides into the shadows, evading attacks and defending against incoming damage with a normal level of effectiveness.', 5, 0, 0),
(63, 'Seoul Binding Chains', 'Jeosung Saja uses string cheese chains that bind his opponent, causing a normal amount of damage while impairing the opponent\'s ability to defend effectively.', 10, 5, 0),
(64, 'Tail Wagging Distraction', 'The Gumiho wags her nine tails in a cute and distracting manner, momentarily confusing her opponent and reducing their ability to defend effectively. ', 5, 10, 0),
(65, 'Fox Me ', 'The Gumiho’s good looks freeze you, as she smacks you with her tails.', 5, 5, 0),
(66, 'Liver bite', 'The Gumiho bites your liver.', 15, 5, 0),
(67, 'Stone Cold Stunner', 'The Dokkaebi gives you the Stone Cold Stunner. The pours a can of beer on you', 10, 5, 0),
(68, 'Diddle with a Riddle', 'The Dokkaebi poses a perplexing riddle to the opponent, distracting them and making it difficult to focus on defense. While the you ponders the riddle, the Dokkaebi seizes the opportunity to deliver a surprise attack.', 10, 5, 0),
(69, 'I got your nose! ', 'The Dokkaebi  grabs your nose and won’t give it back', 5, 5, 0),
(70, 'Inferno Bite', 'Bulgae lunges forward, sinking its fiery teeth into its opponent. The intense heat from the bite not only deals damage but also reduces the opponent\'s ability to defend effectively. Watch out for the burn!', 15, 4, 0),
(71, 'Tail Wag Whirlwind', 'Bulgae starts wagging its tail rapidly, creating a mini-whirlwind of excitement. This move not only deals damage but also leaves the opponent slightly dizzy, reducing their ability to defend effectively.', 5, 5, 0),
(72, 'Fetch Fury', 'Bulgae conjures an ethereal ball and playfully tosses it towards the opponent. As the opponent tries to catch or dodge the fire ball, Bulgae seizes the opportunity to attack, dealing damage and leaving them momentarily vulnerable.', 10, 5, 0),
(79, 'Howl', 'Bulgae begins to sing Who Let the Dogs Out” by the Baha Men. He sucks at singing. It is really annoying', 5, 5, 0),
(82, 'Bible Smack', 'Smacks you upside the head with the word of Korean Jesus', 5, 0, 0),
(83, 'Cha-ombie', 'Gives you a cup of tea, which turns you into a mindless zombie', 5, 0, 0),
(84, 'Holy Spirit ', 'turns invisible and you are unable to damage them', 10, 10, 0),
(87, 'darts', 'he throws a dart in your eye', 20, 0, 0),
(88, 'pool cue up the rear', 'Sodomizes you with a pool cue', 5, 5, 0),
(89, 'hooker death stars', 'throws business cards for hookers from his motor scooter that give you minor paper cuts', 5, 5, 0),
(90, 'bitch slaps', 'His pimp hand is strong as he slaps you', 5, 0, 0),
(91, 'Slices you like a Kimbap', 'Pulls a knife out of his sock and slices you', 10, 0, 0),
(92, 'Cig Burns', 'Burns you with a cigarette', 5, 5, 0),
(93, 'Cig Burns', 'Burns you with a cigarette', 5, 5, 0),
(94, 'Can I stab?', 'Slices you up like sashimi', 10, 0, 0),
(95, 'Tuna smack', 'Slaps you with a dead tuna', 5, 5, 0),
(96, 'University', 'Just talks about their undergraduate degree and lists off their collegiate achievements', 15, 0, 0),
(97, 'Grammar Police', 'Corrects your grammar', 20, 0, 0),
(98, 'daddies credit card', 'cuts you with their father’s credit card', 5, 0, 0),
(99, 'hiking stick up the sphincter', 'Shoves his hiking stick up your stinkhole', 15, 0, 0),
(100, 'Parka defense', 'You cannot get through his generic, yet bulletproof jacket', 0, 10, 0),
(101, 'Denture destruction', 'He throws his dentures at you', 5, 0, 0),
(102, 'Asian size, American Fries', 'Her large western body wasn’t built for Asian sized clothes, creating a vacuum that sucks you in', 10, 5, 0),
(103, 'Where’s my Oppa', 'Her yearning to be in an abusive relationship with a k-pop Oppa creates a force field blocking all attacks', 0, 10, 0),
(104, 'Purse Cheese', 'She pulls out her emergency piece of purse American cheese and throws it in your face', 5, 0, 0),
(105, 'Colors', 'All the colors from her pants blind you from striking her', 0, 5, 0),
(106, 'Ajumma Power', 'She power kicks you with her hiking boots', 10, 5, 0),
(107, 'Visor of Doom', 'Her visor shoots botox needles into your face causing you to not be able to move, as she smacks you with her wallet phone case', 15, 5, 0),
(108, 'Baggy Pants', 'With the magic of their baggy pants, they levitate over you then stale bread from the trendiest cafe falls on your head.', 10, 5, 0),
(109, 'Chains', 'Their stainless steel chains block damage', 0, 15, 0),
(110, 'Insta-shame', 'They take a picture of you without their face slimming filter and with poor lighting and post it on their main Instagram account and their food Instagram account and their fashion account and their look I am richer than you account.', 10, 5, 0),
(111, 'Mildly racist complement', 'She says she likes big noses and touches your hair', 5, 5, 0),
(112, 'LaLaLAND', 'She starts singing that one song from LaLaLand until your ears bleed', 5, 10, 0),
(113, 'Ex-boyfriend', 'Another foreign dude who thinks he is her boyfriend punches you', 10, 5, 0),
(114, 'Rap Battle', 'The guy who was on a singing show 6 years ago challenges you to a rap battle, his raps are boring and lame', 5, 5, 0),
(115, 'Dance off', 'This dude starts breakdancing and kicks you in the face', 5, 10, 0),
(116, 'Let me see your grill, sir.', 'He shows off his shiny grill on his teeth. As it blinds you temporarily, lays the smackdown on you', 10, 10, 0),
(117, 'Eagle Droppings', 'Their eagle tattoo comes alive and shits on your head', 5, 5, 0),
(118, 'Don’t tread on me', 'He drop kicks you with his army boots', 10, 5, 0),
(119, 'Sweet taste of Freedom', 'He chugs a BudLight then spits it in your mouth causing you to choke on the sweet taste of freedom.', 5, 0, 0),
(120, 'Ghost Gag Gas', 'The Ghost passes a generous amount of ghostly gas, choking the energy out of you', 5, 5, 0),
(121, 'Foxtrot Unicorn Charlie Kilo', 'The fox takes your cox and puts it in her box, if you don’t have a cox then she takes your socks', 5, 10, 0),
(122, 'Swing for the Fences', 'He knocks you upside the head with his spiked club', 10, 0, 0),
(123, 'Yellow Snow Cones', 'He gives you a snow cone, but it’s not snow', 10, 0, 0),
(124, 'Naengmyeon ', 'She force feeds you noodles and choke on naengmyeon noodles. Also, the noodles don’t have any mustard or vinegar.', 10, 0, 0),
(125, 'Swift Sniff', 'He sprays his knockoff cologne that he pulled out from his man purse, which is fake as well.', 10, 0, 0),
(126, 'Bling Blast', 'He back hands you with his hand full of jewelry.', 10, 0, 0),
(127, 'Rice Balls of Steel', 'He throws his steel balls(of rice) at you', 10, 0, 0),
(128, 'Slip and Slide', 'He takes a sip of beer and throws up, causing you to slip. It wasn’t really his move, he just got lucky he is a lil bitch', 5, 10, 0),
(129, 'Nails you', 'He takes the nail clippers out of his vest, cuts his nails then flicks the dirty nails at your face.', 5, 0, 0),
(130, 'Oh My Gwad! ', 'She just starts complaining about her hagwon job. The woke uptalk and Wisconsin accent make you slam your head against the wall.', 10, 0, 0),
(131, 'Wheelie Bag of Doom', 'She rolls over your toes with her wheelie cart full of ingredients to make subpar side dishes for the week.', 5, 0, 0),
(132, 'Too Cool for your Soul', 'Their desperation to be cool rubs off on you, turning your ability to think for yourself as they suck any sense of originality from your soul.', 10, 0, 0),
(133, 'Operation Photo', 'They take a selfie with you, just to show off they have a waygookin friend, but edit your face to make you look like Ryan Gosling. Why him? ', 10, 0, 0),
(134, 'Spit hot fire', 'You cannot tell if the rapping is good or if he is a dragon, but he burns you with fire, or maybe a lighter.', 10, 0, 0),
(135, 'If you can\'t Dodge it Ram it', 'He shows you the interest rate he is paying on his vibrantly colored Dodge, which his wife is using to drive around and have an affair with his best friend. You burst into laughter so hard that you end up falling violently.', 10, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `option_id` int(11) NOT NULL,
  `option_description` text DEFAULT NULL,
  `option_energy` int(11) DEFAULT NULL,
  `option_money` int(11) DEFAULT NULL,
  `option_drunk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`option_id`, `option_description`, `option_energy`, `option_money`, `option_drunk`) VALUES
(1, 'Buy a few bottles of makgeolli and snap a pic with him for the \'gram. Dude\'s a legend.', -15, -10000, 15),
(2, 'Don\'t buy makgeolli. Make the Makgeolli Man slightly less happy. How could you.', 5, 0, 0),
(3, 'Drink with the Makgeolli Man!', -5, -5000, 10),
(4, 'Chimaek! Eat chicken and drink beer, obviously.', 10, -25000, 15),
(5, 'Drink the beer, but don\'t eat the chicken. It\'s that kind of night.', -10, -10000, 10),
(6, 'You\'re hungry - Eat the chicken, don\'t drink the beer.', 10, -10000, 0),
(7, 'Dress up as King Kong, look like a fool for a few hours - get paid!', -10, 20000, -10),
(8, 'Decline making a fool of yourself. Drink with your friends.', -5, -20000, 10),
(9, 'Run away. Who chose this place?', -15, 0, -15),
(10, 'You yell at the high school kids and they scatter. Your triumph fills you with warmth and energy! ', 10, 0, -10),
(11, 'You take a gulp from your pocket Soju for courage, then start swinging on the students. You miss entirely and fall over, but they leave without further incident.', -10, 0, 10),
(12, 'You run away after you see how absolutely massive these highschoolers are. The victim\'s cries can be heard into the night. Shamefully staring at your feet as you slink away, you find a 10,000 note in the gutter.', 0, 10000, 0),
(13, 'You find the perfect hoodie. It\'s warm and everything you could want. You are ready for the night!', 20, -30000, 0),
(14, 'You\'re unable to find the hoodie. The night has gotten colder and you are freezing, but at least it was warm inside the store.', 5, 0, -5),
(15, 'You\'re unable to find the hoodie you wanted, but instead find a cool t-shirt. It doesn\'t make you warm but at least you look good', 5, -20000, 0),
(16, 'Try to catch up with the crowd\'s vibe by pounding a few drinks.', -5, -10000, 10),
(17, 'Get on the dance floor and bust a move. People are so impressed they cover your tab.', -10, 10000, 20),
(18, 'You see the line to get in and decide against going. You find an extra 10,000 in your pants pocket. Serendipity.', 0, 10000, 0),
(19, 'You sing your heart out. Your performance is impressive! People throw money into the buskers\' guitar case and they toss you a 10,000 note for your effort.', 5, 10000, -5),
(20, 'Show off your dance moves and create an energetic atmosphere. People are amped! The buskers share a bit of their earnings. Where\'d you learn those moves?', -10, 15000, 0),
(21, 'You grab the nearest instrument and start jamming. Not bad! People come by offering free drinks after for your performance.', -5, 0, 15),
(22, 'Join a friendly card game with other visitors. Drinks flow, but you wrecked in the game and lose a few bets.', -15, -25000, 25),
(23, 'Walk straight up to the sexiest person you see at the bar and buy shots. They decline, but hey - now you have two shots!', -5, -10000, 10),
(24, 'Bet someone you can chug a beer faster than they can. You win, and they pay for your beer!', -5, 0, 10),
(25, 'You\'re unable to find anything special to buy for your friends back home, but you see a famous celebrity inside! You take a picture with her!', 15, 0, -5),
(26, 'You find exactly what your friends back home asked for. You buy the item and facetime your friend. They\'re so excited for the gift!', 20, -15000, 0),
(27, 'Climb onto the bathroom roof just like the old days. Some absolutely obliterated guy is already up there, and offers you some mystery drink.', -25, 0, 25),
(28, 'You choose to buy a couple convenience store beers and idle around while people-watching.', -5, -10000, 10),
(29, 'Your friends debate where to go next. You take the opportunity to just relax and recharge a bit.', 10, 0, -5),
(30, 'Choose a standard seat. Enjoy the show from a comfortable spot in the audience.', 15, -20000, -5),
(31, 'Feel the excitement of the show up close. You\'ll be right in the middle of the action, and the enthusiasm of the performance will make you feel energized and lively', 20, -40000, -10),
(32, 'Go for the back-row budget option. Save some coins while still enjoying the NANTA performance from a distance.', 10, -10000, -5),
(33, 'You\'re too sober to dance. Focus on the bar.', -5, -10000, 10),
(34, 'Pound a drink, then hit the floor. Do whatever trendy dance move your generation decided is cool.', -10, -5000, 15),
(35, 'Do three shots of tequila, jump up on stage during a punk performance, and launch yourself into the crowd. Mom would be so proud.', -10, -15000, 20),
(39, 'This is too touristy. You head next door and grab a drink while your friends are shopping.', -10, -10000, 10),
(40, 'You suggest going to noraebang after pregaming', 5, -10000, 10),
(41, 'You suggest getting some late-night snacks at the 길거리 cart.', 15, -10000, -5),
(42, 'You suggest that you just drink at the convenience store, because you haven\'t been paid yet this month. They take pity  on you and lend you some cash.', -5, 25000, 5),
(43, 'You take the skewer but leave 10000 won in the tip jar', 10, -10000, 0),
(44, 'You wait your turn until the lady asks for your order.', 5, -5000, -5),
(45, 'You barely make it in and fall asleep drunk on the keyboard. You wake up slightly energized. The owner notices the impression of a keyboard on your face, but he doesn\'t say anything.', 5, -5000, -5),
(46, 'You play games for an hour or so. You\'re amped!', 10, -5000, -5),
(47, 'You take sneaky sips of a drink while sending DMs to rally your friends.', -5, -5000, 10),
(48, 'Your falsetto impresses everybody. The noraebang employee opens your room\'s door so everyone can enjoy your incredible voice.', 10, 10000, 0),
(49, 'You are so bad. So, so bad. People leave in droves with their hands over their ears. You drink to erase the shame.', -15, 0, 20),
(50, 'Your friends video tape you singing and post it on the internet. You go viral - for better or for worse.', 0, 25000, 0),
(51, 'You grab the handrail. Your athletic ability saved you! It didn\'t look smooth, but you\'re in one piece.', 10, 0, 0),
(52, 'You reflexively reach out and touch someone inappropriately on accident. Shortly after, you notice that individual repeatedly glaring at you from across the bar. You bury yourself in your drink.', -10, -10000, 15),
(53, 'Jesus take the wheel! You fall backwards and bonk your head on the wall. You\'re actually okay, but one of the employees offers you some cash to not lodge a complaint.', -5, 15000, 0),
(54, 'You buy them a shot, but it gets them too drunk and they disappear for the night.', -5, -5000, 5),
(55, 'You buy them a cake, but they won’t eat it and it will be a waste of money.', 5, -5000, 0),
(56, 'You buy them a present, but they hate the present and literally stab you. You clean the wound with alcohol. From the inside.', -15, -20000, 20),
(57, 'You break something to get thrown out.', -10, 0, 10),
(58, 'You buy the cheapest thing and leave.', -5, -5000, 5),
(59, 'You sneak around until you find an alternative exit.', 10, 0, -5),
(60, 'You say you are going to the bathroom and sneak out. You find a 5,000 note for some reason.', 0, 5000, -5),
(61, 'You catch the restaurant on fire in protest of eating dog meat. In the chaos, you grab a handful of cash from the cardboard box they used as a register.', 0, 20000, -10),
(62, 'You have a drink with them, try to get to know them a little bit, maybe get their number if you mesh well together.', 15, -10000, 5),
(66, 'You eat the soup. Man’s best friend makes Man’s best soup.', -5, -5000, -5),
(67, 'You say you are going to the bathroom and sneak out.', 0, 0, -5),
(68, 'You catch the restaurant on fire in protest of eating dog meat.', 0, 0, -10),
(69, 'You just enjoy what you can.', -5, -5000, 5),
(70, 'You try to get your money’s worth and drink as much as you can.', -5, 0, 10),
(71, 'You don’t really want to drink so you just opt out and enjoy the music.', 15, 0, -5),
(72, 'You politely leave and move on to the next restaurant.', 10, 0, -10),
(73, 'You force your way to stay.', -10, 0, 5),
(74, 'You post on social media and make a big fuss, and do everything in your power to bring shame to the establishment.', 5, 0, -10),
(75, 'You go in, look at the art, and try on some cool sunglasses. Your buzz comes up a bit.', -5, -5000, 10),
(76, 'You go in, buy something, spend a lot of money, but have cool glasses.', 10, -10000, 0),
(77, 'You’re here to drink, not shop. It’s dark, you never wear sunglasses anyways. Go out and grab a beer.', -5, 0, 10),
(78, 'You show those old heads what\'s up and whoop their asses.', -5, 0, 20),
(79, 'Beer pong is for college frat boys... hard pass.', 15, 0, -10),
(80, 'You don\'t know how to play, you get your ass beat, but have fun. ', -5, -20000, 30),
(81, 'You grab a bottle of soju from the mart and eat the Soondae.', -5, -5000, 10),
(82, 'You tell them to wait for Monster Pizza! You find the taste nasty.', 10, -5000, -5),
(83, 'You watch others enjoy Soondae while you drink alone.', -10, 0, 5),
(84, 'You tell your friends and ask them to spot you the money. They do. You\'re a bit embarrassed.', -5, 15000, -5),
(85, 'You excessively drink and eat and see what happens.', 10, -10000, 20),
(86, 'You sip on water and eat the free snacks provided. You save some cash.', 10, 0, -5),
(87, 'You power through it, enjoying its unique taste. You feel the power surge through you!', 10, 0, 0),
(88, 'You feel squeamish and refuse to even consider trying it. Sit this round out. Save even more cash.', 0, 10000, 0),
(89, 'The only asshole you eat is your partner’s, you declare out loud. Drink to wash down the shame.', 0, 0, 10),
(90, 'You order the traditional Bingsu topped with sweet red beans, sober up a little bit.', 10, -5000, -5),
(91, 'You skip this boring shaved ice, the only cold thing entering your body is a beer.', -5, 0, 10),
(92, 'You drop a bottle of soju on the Bingsu and keep the party going.', -15, -5000, 15),
(93, 'You alert the manager, storm out of the restaurant, and post your experience on Social Media.', 5, 10000, -10),
(94, 'You confront the ajumma and school her on hygiene. She doesn\'t understand and thinks you\'re considering her for a Michelin star. She bribes you.', -5, 20000, -5),
(95, 'You do a shot of soju and let it go!', -5, 0, 10),
(96, 'You order an extra bottle of soju, in the name of hygiene.', -10, -5000, 15),
(97, 'You dismiss it and pray they wash their hands in the kitchen. Your blind faith gives you fortitude.', 15, 0, -5),
(98, 'You leave that place and never look back.', -5, 15000, -5),
(99, 'You report his illegal park job to the police. You\'re doing your part!', 10, 5000, -5),
(100, 'You pick up a pile of dog shit and put it on his door handles as a nice surprise for him when he returns. Buy yourself a drink as a reward.', 0, -5000, 10),
(101, 'You laugh it off because you know he bought that car on credit and has to always work overtime, just to look rich.', 0, 15000, -5),
(102, 'You sit there and do nothing. Obviously, they are way too drunk to have a logical conversation with them. Welcome to Hongdae!', 5, 5000, 0),
(103, 'You chase them down, demand they pay for your food and dry cleaning for your clothes. They... agree?', -10, 20000, -5),
(104, 'You stab a bitch.', 10, 0, -10),
(105, 'YOLO… Embrace the unique cultural experience.', 10, 0, -5),
(106, 'You tell them to skedaddle away. Take a swig from your Scotch Pocket.', -5, 0, 10),
(107, 'You pull the old switcheroo and get them to join your cult. You have a posse now.', 10, 10000, -5),
(108, 'You go into the business and ask them for the door code. They seem very uncomfortable. You take their welcome gift and walk right out.', -5, 10000, 0),
(109, 'You go up the steps trying every level until you find an open door.', -10, 10000, -5),
(110, 'You find a dark, poorly lit corner and let ‘er rip. Ah, sweet relief.', 10, 0, -10),
(111, 'The night is long and you don’t mind waiting. Go grab a beer from the mart and wait in line.', -5, -5000, -5),
(112, 'Skip this place and move on to the next location. No reason to waste the night standing in a line. Save some money, too.', -5, 10000, 0),
(113, 'Use your good looks and connive your way in. It takes a bit out of you, but you pay cover and get a free drink.', -5, -5000, 5),
(114, 'Not your relationship, not your problem. Mind your own business and continue on with your night.', -5, 0, 0),
(115, 'You buy a round of beers and try to calm everyone down, keep the night going.', -5, -10000, 10),
(116, 'You call the police and turn it into a huge deal. Someone calls you an idiot, hands you a 5,000, and tells you to buy a brain.', 5, 5000, -10),
(117, 'Ditch your friends, go find the nearest love motel. ( ͡° ͜ʖ ͡°)', 25, -10000, -10),
(118, 'Walk away. You’re not looking to hook up with some drunk person you met at a bar. That\'s GROSS.', 5, 0, 5),
(119, 'Have a drink with them, try to get to know them a little bit, maybe get their number if you mesh well together.', -5, -5000, 10),
(120, 'The waiting time is much longer than you anticipated. The night is long and you don’t mind waiting. Go grab a beer from the mart and wait in line.', 5, -5000, 5),
(121, 'Skip this place and move on to the next location. No reason to waste the night standing in a line.', -5, 10000, 0),
(122, 'Use your good looks and connive your way in.', -5, -5000, 5),
(123, 'You laugh it off. That’s what you get for petting a wild animal. Go to the hospital.', -10, 0, 10),
(124, 'Drink soju till the pain is gone.', -5, -5000, 15),
(125, 'Bite that lil bastard back.', 10, 0, -10),
(126, 'Wrestle the Dokkaebi and win for a great reward', -15, 25000, 0),
(127, 'Solve the Dokkaebi\'s riddle for a greater reward', -35, 40000, 0),
(128, 'Take the reward (trick)', 0, 0, 15),
(129, 'Leave the bird to die and take a shot in its honor', -5, 0, 15),
(130, 'Heal the bird back to health. He gives you some cash!', -15, 15000, 0),
(131, 'Watch as HeungBu nurses the bird back to health. Use those tricks on yourself.', 10, 0, 0),
(132, 'Say no and ignore the tiger (tigers don’t eat rice cakes).', 10, 0, 0),
(133, 'Climb a tree and hope the tiger doesn’t eat you. Find a 10,000 in the tree. Weird, but fortuitous.', -10, 10000, 0),
(134, 'Climb a rope that appears from the sky. It leads you to the soju heavens. You drink soju. They kick you out.', -5, 0, 15),
(135, 'Just ignore it', 0, 0, 0),
(136, 'Give it a sip of your beer and some food', 10, 0, -5),
(137, 'Call animal control to kill the mutant bird. The guy that shows up gives you cash for finally getting this one off his hit-list.', 10, 10000, 0),
(138, 'Give them some garlic and mugwort and tell them to go hangout in a cave. They think that\'s reasonable and buy you a bottle of chamisul. Also reasonable.', 0, 0, 10),
(139, 'Do a shot of soju with them to overlook as a bear and tiger are talking to you.', 5, 0, 5),
(140, 'Buy them a toothbrush, so they have clean teeth while eating you. They laugh at your bravery and reimburse you for the toothbrush, but clearly they have no idea how much a toothbrush costs and give you too much.', 0, 20000, 0),
(156, 'Avoid her for 2 days and wait for her to become a human. Nice.', 15, 0, 0),
(157, 'Run away (she’s hungry and needs to eat). You get away, realize how insane the situation was, and drink to calm your nerves.', -5, -5000, 15),
(158, 'Your liver is already shot from all the bottles of soju, she doesn’t want your liver… you see where the night takes you.', 5, 10000, -5);

-- --------------------------------------------------------

--
-- Table structure for table `seoulnights_users`
--

CREATE TABLE `seoulnights_users` (
  `id` int(11) NOT NULL,
  `user_identifier` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `login_method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seoulnights_users`
--

INSERT INTO `seoulnights_users` (`id`, `user_identifier`, `name`, `login_method`) VALUES
(1, 'choijason25@gmail.com', 'Jason Choi', 'google'),
(2, 'jasonchoi13@gmail.com', 'Jason Choi', 'google'),
(3, '3288133608', 'Jason Choi', 'kakao'),
(4, 'cullenmarshall66@gmail.com', 'Cullen Marshall', 'google'),
(5, 'bongsooma@gmail.com', 'Cullen Marshall', 'google');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `enemies`
--
ALTER TABLE `enemies`
  ADD PRIMARY KEY (`enemy_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_options`
--
ALTER TABLE `event_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gameplay_logs`
--
ALTER TABLE `gameplay_logs`
  ADD PRIMARY KEY (`run_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `location_events`
--
ALTER TABLE `location_events`
  ADD PRIMARY KEY (`not_important`);

--
-- Indexes for table `mart_items`
--
ALTER TABLE `mart_items`
  ADD PRIMARY KEY (`mart_id`);

--
-- Indexes for table `moves`
--
ALTER TABLE `moves`
  ADD PRIMARY KEY (`move_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `seoulnights_users`
--
ALTER TABLE `seoulnights_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `enemies`
--
ALTER TABLE `enemies`
  MODIFY `enemy_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `event_options`
--
ALTER TABLE `event_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `gameplay_logs`
--
ALTER TABLE `gameplay_logs`
  MODIFY `run_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `location_events`
--
ALTER TABLE `location_events`
  MODIFY `not_important` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- AUTO_INCREMENT for table `mart_items`
--
ALTER TABLE `mart_items`
  MODIFY `mart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `moves`
--
ALTER TABLE `moves`
  MODIFY `move_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `seoulnights_users`
--
ALTER TABLE `seoulnights_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

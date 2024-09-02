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
(12, 'Hungry Hungry Hippo', 'whale.png', 12, 30),
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
(47, 'Soak', 'The hippo relaxes for a turn', 0, 0, 0),
(48, 'Doe-Eyed', 'The hippo eyes you seductively...', 5, 0, 0),
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
(99, 'hiking stick', 'You get poked', 15, 0, 0),
(100, 'Parka defense', 'You cannot get through his generic, yet bulletproof jacket', 0, 10, 0),
(101, 'Denture destruction', 'He throws his dentures at you', 5, 0, 0),
(102, 'Freedom Fries', 'You get a handful of sizzling oily hand-cut fries in your face!', 10, 5, 0),
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

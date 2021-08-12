-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2021 at 03:35 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamingblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id_article` int(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `descriptionn` varchar(500) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp(),
  `contenu` mediumtext NOT NULL,
  `image_article` varchar(500) NOT NULL,
  `id_user` int(6) NOT NULL,
  `id_categorie` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id_article`, `titre`, `descriptionn`, `date_creation`, `contenu`, `image_article`, `id_user`, `id_categorie`) VALUES
(20, 'League of Legends', 'League of Legends is one of the world’s most popular video games, developed by Riot Games. It features a team-based competitive game mode based on strategy and outplaying opponents', '2021-08-03', '<p><em><strong>League of Legends</strong></em>&nbsp;(<em><strong>LoL</strong></em>), commonly referred to as&nbsp;<em><strong>League</strong></em>, is a 2009&nbsp;<a href=\"https://en.wikipedia.org/wiki/Multiplayer_online_battle_arena\">multiplayer online battle arena</a>&nbsp;video game developed and published by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Riot_Games\">Riot Games</a>. Inspired by&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Defense_of_the_Ancients\">Defense of the Ancients</a></em>, a&nbsp;<a href=\"https://en.wikipedia.org/wiki/Mod_(video_games)\">custom map</a>&nbsp;for&nbsp;<a href=\"https://en.wikipedia.org/wiki/Warcraft_III:_Reign_of_Chaos\"><em>Warcraft III</em></a>, Riot&#39;s founders sought to develop a stand-alone game in the same genre. Since its release in October 2009, the game has been&nbsp;<a href=\"https://en.wikipedia.org/wiki/Free-to-play\">free-to-play</a>&nbsp;and is monetized through&nbsp;<a href=\"https://en.wikipedia.org/wiki/Freemium\">purchasable</a>&nbsp;character customization. The game is available for&nbsp;<a href=\"https://en.wikipedia.org/wiki/Microsoft_Windows\">Microsoft Windows</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/MacOS\">macOS</a>.</p>\r\n\r\n<p>In the game, two teams of five players battle in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Player_versus_player\">player versus player</a>&nbsp;combat, each team occupying and defending their half of the map. Each of the ten players controls a character, known as a &quot;champion&quot;, with unique abilities and differing styles of play. During a match, champions become more powerful by collecting&nbsp;<a href=\"https://en.wikipedia.org/wiki/Experience_point\">experience points</a>, earning gold, and purchasing&nbsp;<a href=\"https://en.wikipedia.org/wiki/Item_(game_terminology)\">items</a>&nbsp;to defeat the opposing team. In the game&#39;s main mode, Summoner&#39;s Rift, a team wins by pushing through to the enemy base and destroying their &quot;Nexus&quot;, a large structure located within.</p>\r\n\r\n<p><em>League of Legends</em>&nbsp;received generally positive reviews; critics highlighted its accessibility, character designs, and production value. The game&#39;s long lifespan has resulted in a critical reappraisal, with reviews trending positively. The negative and abusive in-game behavior of its players, criticized since early in the game&#39;s lifetime, persists despite attempts by Riot to fix the problem. In 2019, the game regularly peaked at eight million concurrent players, and its popularity has led to tie-ins such as music videos, comic books, short stories, and an upcoming animated series. Its success has also spawned several&nbsp;<a href=\"https://en.wikipedia.org/wiki/Spin-off_(media)\">spin-off</a>&nbsp;video games, including a&nbsp;<a href=\"https://en.wikipedia.org/wiki/League_of_Legends:_Wild_Rift\">mobile version</a>&nbsp;and a&nbsp;<a href=\"https://en.wikipedia.org/wiki/Legends_of_Runeterra\">digital collectible card game</a>. A&nbsp;<a href=\"https://en.wikipedia.org/wiki/Massively_multiplayer_online_role-playing_game\">massively multiplayer online role-playing game</a>&nbsp;based on the property is in development.</p>\r\n\r\n<p>The game is often cited as the world&#39;s largest&nbsp;<a href=\"https://en.wikipedia.org/wiki/Esports\">esport</a>, with an international&nbsp;<a href=\"https://en.wikipedia.org/wiki/League_of_Legends_in_esports\">competitive scene</a>&nbsp;composed of 12 leagues. The domestic leagues culminate in the annual&nbsp;<a href=\"https://en.wikipedia.org/wiki/League_of_Legends_World_Championship\"><em>League of Legends</em>&nbsp;World Championship</a>. The&nbsp;<a href=\"https://en.wikipedia.org/wiki/2019_League_of_Legends_World_Championship\">2019 championship</a>&nbsp;had over 100 million unique viewers, peaking at a concurrent viewership of 44 million. Domestic and international events have been broadcast on&nbsp;<a href=\"https://en.wikipedia.org/wiki/Livestreaming\">livestreaming</a>&nbsp;websites such as&nbsp;<a href=\"https://en.wikipedia.org/wiki/Twitch_(service)\">Twitch</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/YouTube\">YouTube</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Bilibili\">Bilibili</a>, as well as&nbsp;<a href=\"https://en.wikipedia.org/wiki/Cable_television_in_the_United_States\">cable television</a>&nbsp;sports channel&nbsp;<a href=\"https://en.wikipedia.org/wiki/ESPN\">ESPN</a>.</p>\r\n', '../img/artblast_titlebar_KayleMorg-1.jpg', 13, 4),
(21, 'CALL OF DUTY®: WARZONE', 'A New Massive Combat Experience with up to 150 Players from the World of Call of Duty®: Modern Warfare® is Free-to-Play for Everyone', '2021-08-03', '<p><em><strong>Call of Duty: Warzone</strong></em>&nbsp;is a&nbsp;<a href=\"https://en.wikipedia.org/wiki/Free-to-play\">free-to-play</a>&nbsp;<a href=\"https://en.wikipedia.org/wiki/Battle_royale_game\">battle royale video game</a>&nbsp;released on March 10, 2020, for&nbsp;<a href=\"https://en.wikipedia.org/wiki/PlayStation_4\">PlayStation 4</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Xbox_One\">Xbox One</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Microsoft_Windows\">Microsoft Windows</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/PlayStation_5\">PlayStation 5</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Xbox_Series_X_and_Series_S\">Xbox Series X/S</a>. The game is a part of 2019&#39;s&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Call_of_Duty:_Modern_Warfare_(2019_video_game)\">Call of Duty: Modern Warfare</a></em>&nbsp;and is connected to 2020&#39;s&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Call_of_Duty:_Black_Ops_Cold_War\">Call of Duty: Black Ops: Cold War</a></em>&nbsp;(but does not require purchase of either titles) and was introduced during Season 2 of&nbsp;<em>Modern Warfare</em>&nbsp;content.&nbsp;<em>Warzone</em>&nbsp;is developed by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Infinity_Ward\">Infinity Ward</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Raven_Software\">Raven Software</a>&nbsp;(the latter later credited as the sole developer following the integration of Cold War&#39;s content) and published by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Activision\">Activision</a>.<a href=\"https://en.wikipedia.org/wiki/Call_of_Duty:_Warzone#cite_note-2\">[1]</a>&nbsp;<em>Warzone</em>&nbsp;allows online multiplayer combat among 150 players, although some limited-time game modes support 200 players. The game features both&nbsp;<a href=\"https://en.wikipedia.org/wiki/Cross-platform_play\">cross-platform play</a>&nbsp;and cross-platform progression between three games.</p>\r\n\r\n<p>The game features three main modes: Plunder, Resurgence, and Battle Royale.&nbsp;<em>Warzone</em>&nbsp;introduces a new in-game currency system which can be used at &quot;Buy Stations&quot; in and around the map. &quot;Loadout&quot; drops are an example of where Cash can be traded for limited access to players&#39; custom classes (which were shared with Modern Warfare&#39;s standard modes prior to Season 6, v1.29, but now are unique to Warzone). Players may also use Cash to purchase items such as &quot;killstreaks&quot; and gas masks. Cash can be found by looting buildings and killing players that have cash on them. At launch,&nbsp;<em>Warzone</em>&nbsp;only offered Trios, a squad capacity of three players. However, in free post launch content updates, Solos, Duos and Quads have all been added to the game.<a href=\"https://en.wikipedia.org/wiki/Call_of_Duty:_Warzone#cite_note-3\">[2]</a><a href=\"https://en.wikipedia.org/wiki/Call_of_Duty:_Warzone#cite_note-4\">[3]</a></p>\r\n\r\n<p>The game received generally positive reviews from critics, with the maps receiving specific praise. In April 2021, Activision announced that&nbsp;<em>Warzone</em>&nbsp;had surpassed 100 million active players.<a href=\"https://en.wikipedia.org/wiki/Call_of_Duty:_Warzone#cite_note-5\">[4]</a></p>\r\n', '../img/warzone.jpg', 13, 3),
(23, 'Dofus', 'Dofus is a tactical turn-oriented massively multiplayer online role-playing game developed and published by Ankama Games.', '2021-08-11', '<p><em><strong>Dofus</strong></em>&nbsp;is a&nbsp;<a href=\"https://en.wikipedia.org/wiki/Turn-based_tactics\">tactical turn-oriented</a>&nbsp;<a href=\"https://en.wikipedia.org/wiki/Massively_multiplayer_online_role-playing_game\">massively multiplayer online role-playing game</a>&nbsp;(MMORPG) developed and published by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Ankama_Games\">Ankama Games</a>,<a href=\"https://en.wikipedia.org/wiki/Dofus#cite_note-2\">[2]</a>&nbsp;a French computer game manufacturer. Originally released solely in French, it has since been translated into many other languages. The game includes both&nbsp;<a href=\"https://en.wikipedia.org/wiki/Pay_to_play#In_online_gaming\">pay-to-play</a>&nbsp;accounts offering the full experience and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Free-to-play\">free-to-play</a>&nbsp;accounts offering a more limited amount of content. Its success has led to the marketing of spin-off products, such as books, art, comics and a movie released in 2016. It has also led to the development of two continuations:&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Dofus_Arena\">Dofus Arena</a></em>, released at the beginning of 2006, which is an alternative &quot;tournament&quot; version of&nbsp;<em>Dofus</em>; and&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Wakfu\">Wakfu</a></em>, a continuation of&nbsp;<em>Dofus</em>.[<em><a href=\"https://en.wikipedia.org/wiki/Wikipedia:Citation_needed\">citation needed</a></em>]&nbsp;The game has attracted over 40 million players worldwide and is especially well known in France.<a href=\"https://en.wikipedia.org/wiki/Dofus#cite_note-3\">[3]</a></p>\r\n', '../img/une-dofus.jpg', 13, 1),
(24, 'new mmo', 'testest', '2021-08-11', '<p>text</p>\r\n', '../img/alex-escu-vdlhoDN0iAs-unsplash.jpg', 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(255) NOT NULL,
  `intitule_categorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_categorie`, `intitule_categorie`) VALUES
(1, 'MMO'),
(3, 'Shooter'),
(4, 'MOBA');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(6) NOT NULL,
  `intitule_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(255) NOT NULL,
  `id_article` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `user_id` int(255) NOT NULL,
  `parent_comment_id` int(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `id_article`, `username`, `comment`, `user_id`, `parent_comment_id`, `date`) VALUES
(11, 21, 'user1', 'test', 0, 0, '2021-08-12'),
(13, 23, 'user1', 'Dofus comment', 0, 0, '2021-08-12'),
(14, 23, 'user1', 'second dofus comment', 0, 0, '2021-08-12'),
(15, 23, 'user1', 'test', 0, 0, '2021-08-12');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_user` int(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_user`, `username`, `nom`, `prenom`, `email`, `password`, `id_role`) VALUES
(6, 'saralachgar', 'Sara', 'Lachgar', 'saralachgaar@gmail.com', '$2y$10$8UgUyRJvpWuvv7sC3HRgluChTJ7jTjuKoJESS10xwUglCm2muwCQO', 1),
(12, 'user4  ', 'user2', 'user2', 'user2@gmail.com', '$2y$10$S4oBug5K5g6Mg0Dpz8LHXuA.pz5zh7mbVxacofMQWRFfhMKWKgvrS', 2),
(13, 'user1', 'user1', 'user1', 'user1@gmail.com', '$2y$10$LJI6OkY.rN3BJNuJFbdnOOgU8UYsZF969kp7ABz0sDUXitIzRJG4y', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `test` (`id_categorie`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `id_article` (`id_article`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id_article` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_user` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `test` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

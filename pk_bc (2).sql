-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Erstellungszeit: 13. Sep 2016 um 21:15
-- Server-Version: 5.5.42
-- PHP-Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `pk_bc`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bc_posts`
--

CREATE TABLE `bc_posts` (
  `posts_id` int(11) NOT NULL,
  `username_user_id` int(11) NOT NULL,
  `posts_title` varchar(255) NOT NULL,
  `posts_mediaPath` varchar(255) NOT NULL,
  `posts_mediaPathCheck` int(11) NOT NULL,
  `posts_mainTag` varchar(10) NOT NULL,
  `posts_additionalTags` varchar(255) NOT NULL,
  `posts_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `likeCount` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `bc_posts`
--

INSERT INTO `bc_posts` (`posts_id`, `username_user_id`, `posts_title`, `posts_mediaPath`, `posts_mediaPathCheck`, `posts_mainTag`, `posts_additionalTags`, `posts_date`, `likeCount`) VALUES
(30, 23, 'Amating day in Korea', 'https://www.youtube.com/embed/_ITw8qk1V9I', 2, 'dancing', '#korea, #amk, #zerstoerer', '2016-09-13 02:43:35', 3),
(31, 23, 'hurdur in hamburg HLO2016 JAMIE Lichtenstein', '57d41bdbb6523.jpg', 1, 'dancing', '#simple, #longboard', '2016-09-13 02:43:35', 4),
(32, 23, 'lovely day in hamburg HLO2016', '57d41c0f4eaa8.jpg', 1, 'dancing', '#HLO2016, #dayaftertomorrow', '2016-09-13 12:20:57', 4),
(33, 23, 'asdasd', '57d41d3ee9d1b.jpg', 1, 'dancing', 'adasd, asdasd,asd', '2016-09-13 12:20:57', 5),
(34, 23, 'asdads', '57d41d6777653.jpg', 1, 'dancing', 'asdads', '2016-09-13 12:20:57', 5),
(35, 22, 'AMKAMKAMK', '57d72ac8674ca.jpg', 1, 'dancing', 'asdasdadasasd,asdasd', '2016-09-12 22:29:52', 1),
(36, 22, 'AMKAMKAMK', '57d72af38189b.jpg', 1, 'dancing', 'asdasdadasasd,asdasd', '2016-09-13 12:20:57', 2),
(37, 22, 'AMKAMAK', '57d768bfe0862.jpg', 1, 'dancing', 'asdasd', '2016-09-13 02:48:01', 1),
(38, 22, 'Sunny day in Hamburg || HLO2K16', '57d7e666a0721.jpg', 1, 'dancing', 'jump, jamdula', '2016-09-13 11:43:34', 0),
(39, 30, 'Cool ist es hier auf Boardcrew', '57d7ee956f938.jpg', 1, 'dancing', 'dance, amk, ich zerfertze euch ihr opfer', '2016-09-13 13:27:31', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bc_profiledata`
--

CREATE TABLE `bc_profiledata` (
  `profiledata_id` int(11) NOT NULL,
  `profiledata_cookieIdentifier` varchar(255) NOT NULL,
  `profiledata_cookieSecurityToken` varchar(255) NOT NULL,
  `profiledata_blocked` int(11) DEFAULT NULL,
  `profiledata_blockDuration` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bc_profiles`
--

CREATE TABLE `bc_profiles` (
  `profile_id` int(11) NOT NULL,
  `users_user_id` int(11) NOT NULL,
  `profile_profileImg` varchar(255) NOT NULL,
  `profile_backgroundImg` varchar(255) NOT NULL,
  `profile_gender` varchar(255) NOT NULL,
  `profile_style` varchar(255) NOT NULL,
  `profile_country` varchar(255) NOT NULL,
  `profile_city` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `bc_profiles`
--

INSERT INTO `bc_profiles` (`profile_id`, `users_user_id`, `profile_profileImg`, `profile_backgroundImg`, `profile_gender`, `profile_style`, `profile_country`, `profile_city`) VALUES
(1, 22, 'wqweqweqweqwe', 'qweqweqwe', '', '', '', ''),
(2, 23, '23', 'qwe', 'qwe', 'qwe', 'qwe', 'wqe'),
(3, 30, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bc_users`
--

CREATE TABLE `bc_users` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_role` enum('default','admin') NOT NULL DEFAULT 'default',
  `user_mail` varchar(255) NOT NULL,
  `user_hash` varchar(255) NOT NULL,
  `user_salt` varchar(255) NOT NULL,
  `user_validation` int(11) NOT NULL,
  `user_valHash` varchar(255) NOT NULL,
  `user_blocked` int(11) DEFAULT NULL,
  `user_regDate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `bc_users`
--

INSERT INTO `bc_users` (`user_id`, `user_username`, `user_role`, `user_mail`, `user_hash`, `user_salt`, `user_validation`, `user_valHash`, `user_blocked`, `user_regDate`) VALUES
(22, 'philipp', 'default', 'Abcde@de.de', '67856d121a74713823d514275f9f4f2a5cc2b68e10a78772e8f04d03009e37d8209004a617332cc42acd22b32615815a207e1a6bec155497d0b0a057310aebf2', '1d28b8ec91e6579d359859a1d2b68064b2b9249b05a2be998b1e0d2cdac1efb2e74cd61eb7c4100d47b973a54b2b4ea4c9fe017cbd6b64336961bf3dcf42379d', 0, '81a53d519214937182ab98860bbfdb1188631aac0cedf0b5de963faea084f0d665f7644c1260de8c3391918e3356c400e545e55bd76effef390cc0a1e1b1b30a', NULL, '2016-09-06 19:31:51'),
(23, 'jamie', 'default', 'lucadergeileblauedrache@gotmail.de', '44d38abcb02fa9f3fdb32b5cb791dd6497833c58310fb21f92eb42e05fa37c79d1963d7a5e295495691f5c256c11054b616ca54bc1d135000af788cb9db2fea1', 'a1776fb67b7eeae9a33aa518020bfe98b4b26df3d1594351e2b84430488818f931ae14fba82b68877ffd8eb39ae40cb6c19b14cab2c9cc92fb01acbc794e6fd5', 0, '5cf35cfe9803fca388c459b6bd12b057331d10efe9eb31c2963089fcc7da0f12c39edc8fd94484911816369bbccc143895236fe51d40f3c614c6b124c13a655b', NULL, '2016-09-06 19:32:37'),
(30, 'larissadietolle', 'default', 'asdasd@xn--sdasd-lra.de', '848510bc0acca6ab7192b85ced72e10d901661004c6800d94dccaa6e6906dfb7f0e21b68ad0e117a9cda5bd02517828cd7cd5f3f787c0c89c62ce24f3fc87bba', '77200b3b716592b830433bf4f6ac2c2a95048e77cb2834cbc77fe87e4df1ce1576b867709d25daf598566676a55dc0a754b83b50c8d51cb892d56b8c96d8c75b', 0, '3d94e81aea81db25f54c0506de2ca3c9a28517a236771e4d66ac1a9a10e7983d79b596bae3915640c754cca2625b1b76954e612012f450b07a1036ac22cd3717', NULL, '2016-09-13 14:17:35');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bc_user_has_followers`
--

CREATE TABLE `bc_user_has_followers` (
  `user_has_followers_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `bc_user_has_followers`
--

INSERT INTO `bc_user_has_followers` (`user_has_followers_id`, `user_id`, `follower_id`) VALUES
(42, 22, 23),
(43, 22, 30),
(44, 23, 22),
(45, 23, 30);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bc_user_has_liked`
--

CREATE TABLE `bc_user_has_liked` (
  `user_has_liked_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `bc_user_has_liked`
--

INSERT INTO `bc_user_has_liked` (`user_has_liked_id`, `user_id`, `post_id`) VALUES
(1, 23, 33),
(2, 23, 31),
(16, 22, 33),
(17, 22, 31),
(18, 22, 32),
(19, 22, 30),
(20, 22, 34),
(21, 23, 32),
(22, 23, 34),
(23, 23, 30),
(24, 28, 33),
(25, 28, 31),
(26, 28, 34),
(27, 27, 33),
(28, 27, 31),
(29, 27, 32),
(30, 27, 34),
(31, 27, 30),
(32, 22, 36),
(33, 22, 35),
(34, 22, 37),
(35, 30, 36),
(36, 30, 34),
(37, 30, 33),
(38, 30, 32);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bc_user_has_profile`
--

CREATE TABLE `bc_user_has_profile` (
  `users_has_profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profiledata_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bc_user_has_profiledata`
--

CREATE TABLE `bc_user_has_profiledata` (
  `users_has_profiledata_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bc_posts`
--
ALTER TABLE `bc_posts`
  ADD PRIMARY KEY (`posts_id`);

--
-- Indizes für die Tabelle `bc_profiles`
--
ALTER TABLE `bc_profiles`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indizes für die Tabelle `bc_users`
--
ALTER TABLE `bc_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indizes für die Tabelle `bc_user_has_followers`
--
ALTER TABLE `bc_user_has_followers`
  ADD PRIMARY KEY (`user_has_followers_id`);

--
-- Indizes für die Tabelle `bc_user_has_liked`
--
ALTER TABLE `bc_user_has_liked`
  ADD PRIMARY KEY (`user_has_liked_id`);

--
-- Indizes für die Tabelle `bc_user_has_profile`
--
ALTER TABLE `bc_user_has_profile`
  ADD PRIMARY KEY (`users_has_profile_id`);

--
-- Indizes für die Tabelle `bc_user_has_profiledata`
--
ALTER TABLE `bc_user_has_profiledata`
  ADD PRIMARY KEY (`users_has_profiledata_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bc_posts`
--
ALTER TABLE `bc_posts`
  MODIFY `posts_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT für Tabelle `bc_profiles`
--
ALTER TABLE `bc_profiles`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT für Tabelle `bc_users`
--
ALTER TABLE `bc_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT für Tabelle `bc_user_has_followers`
--
ALTER TABLE `bc_user_has_followers`
  MODIFY `user_has_followers_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT für Tabelle `bc_user_has_liked`
--
ALTER TABLE `bc_user_has_liked`
  MODIFY `user_has_liked_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT für Tabelle `bc_user_has_profile`
--
ALTER TABLE `bc_user_has_profile`
  MODIFY `users_has_profile_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `bc_user_has_profiledata`
--
ALTER TABLE `bc_user_has_profiledata`
  MODIFY `users_has_profiledata_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

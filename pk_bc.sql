-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Erstellungszeit: 08. Sep 2016 um 23:10
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
  `posts_mainTag` varchar(10) NOT NULL,
  `posts_additionalTags` varchar(255) NOT NULL,
  `posts_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `likeCount` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `bc_posts`
--

INSERT INTO `bc_posts` (`posts_id`, `username_user_id`, `posts_title`, `posts_mediaPath`, `posts_mainTag`, `posts_additionalTags`, `posts_date`, `likeCount`) VALUES
(6, 22, 'Nice day in Korea ', 'https://www.youtube.com/watch?v=WdGewsGMQ2E', 'dancing', 'fresh, style', '2016-09-08 15:02:25', 20),
(7, 23, 'London', 'https://www.youtube.com/watch?v=YXN_lNZZAZA', 'dancing', 'hallop, amk', '2016-09-08 15:18:17', 10);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `bc_profiles`
--

INSERT INTO `bc_profiles` (`profile_id`, `users_user_id`, `profile_profileImg`, `profile_backgroundImg`, `profile_gender`, `profile_style`, `profile_country`, `profile_city`) VALUES
(1, 22, 'wqweqweqweqwe', 'qweqweqwe', '', '', '', ''),
(2, 23, '23', 'qwe', 'qwe', 'qwe', 'qwe', 'wqe');

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `bc_users`
--

INSERT INTO `bc_users` (`user_id`, `user_username`, `user_role`, `user_mail`, `user_hash`, `user_salt`, `user_validation`, `user_valHash`, `user_blocked`, `user_regDate`) VALUES
(21, 'Peter', 'default', 'Peter@peter.com', 'f818a683b48f8311af511d3e515cbd7bb6eda0fd88166998e8990e9c33304d3454612b0268cc419cd00f88aeb6b112ba24287db7ef345d22cdbe620008772500', '6c7990bb92427f2494577f5a3b0cc4d300c8609718c32f8bd6a49874f27179c56f63d9311bf0497fb71237cf1ee0314e3bc0c2970f8cb45a9c6565ac09644840', 0, '72f83f5481b9c1d6d45fd8002c21ccfe0c3fab2d1d2f472c1345255c4dec2e49c5736e68fe287542b3f1c6eeba34c077c876e0a09f5facaedf49fc233acd4617', NULL, '2016-09-06 19:19:35'),
(22, 'Philipp', 'default', 'Abcde@de.de', '67856d121a74713823d514275f9f4f2a5cc2b68e10a78772e8f04d03009e37d8209004a617332cc42acd22b32615815a207e1a6bec155497d0b0a057310aebf2', '1d28b8ec91e6579d359859a1d2b68064b2b9249b05a2be998b1e0d2cdac1efb2e74cd61eb7c4100d47b973a54b2b4ea4c9fe017cbd6b64336961bf3dcf42379d', 0, '81a53d519214937182ab98860bbfdb1188631aac0cedf0b5de963faea084f0d665f7644c1260de8c3391918e3356c400e545e55bd76effef390cc0a1e1b1b30a', NULL, '2016-09-06 19:31:51'),
(23, 'luca', 'default', 'lucadergeileblauedrache@gotmail.de', '44d38abcb02fa9f3fdb32b5cb791dd6497833c58310fb21f92eb42e05fa37c79d1963d7a5e295495691f5c256c11054b616ca54bc1d135000af788cb9db2fea1', 'a1776fb67b7eeae9a33aa518020bfe98b4b26df3d1594351e2b84430488818f931ae14fba82b68877ffd8eb39ae40cb6c19b14cab2c9cc92fb01acbc794e6fd5', 0, '5cf35cfe9803fca388c459b6bd12b057331d10efe9eb31c2963089fcc7da0f12c39edc8fd94484911816369bbccc143895236fe51d40f3c614c6b124c13a655b', NULL, '2016-09-06 19:32:37'),
(24, 'hansolo', 'default', 'hansolo@hotmail.de', '57560c1cfebf64f40bf53bc55a364c0df5ccbc484c386bc84e24e0797c83f8515057c5ec7f08e4b9a96fa3457c91d7b7c03cf94faf3631ea91116a45ee9306a1', '5ec6389c6dfae167a65179aecd48366d9e21656d3a0ed91f6826465635a44a24f20e0afcc46e03f1d6f184fce14dca3f20d821e8264f35afc58722bd734e9f49', 0, '8a57b9d97eb3a4900b666e97297bc31891d264ab6495f416f61e9385adbd9efa1fe94acae5bc2e3c8d63e9bbabe265ad35aca3d92debf480d43509bdeffc1229', NULL, '2016-09-06 19:33:07'),
(25, 'panpan', 'default', 'panpan@hotmail.de', '802d12592eba045d2e1b4605fe76749947724322521c9d5f1fd184eb0afc03172339d25b45e0aa26cff3f7ae189ff1cac072941248cd7154579bb7e3ad22e178', '1c616362f8cd9b9fa4762c611061ea37a3927342b5ff41d667116be525ae954eef9f95263a133632399a0ed1c25532d31d9351c175463b512f0bd4cf032a1b1d', 0, '027df4f6f0d0ff155175a753ec0ef68c00a3236ad0401105bd169d02859f2b2e6382ab9937b110d2d045d8f6903f8c84b6e343c1eabee79d10bd20bd2cd1d42d', NULL, '2016-09-06 20:14:49'),
(26, 'Vane', 'default', 'vane@diegeile.de', 'af44276fc1de4eb6c4a581840e1bd95cce9c11ae21133e079ef397bdcd5f070771e9ee2bc17350d7ef699d479984f8ca2a32c571dd6a793acc22d396aa93a5bb', 'aa290e10f933386f5bff968ac5babd337fc3b3776ca4ad4e134b8089691dfa13c1dbeecd90065e4e715d61dd3539658833f36f897647dec0468afb6cce33b296', 0, 'bab21742016b76d5c9dfbdd166b4aa59df801e704bafc0ac14b0a602a4abe127a1790e4f78464a46f52d3c83e4497604f765060ce44c51c400e727399dc1ad7c', NULL, '2016-09-06 20:55:33');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bc_user_has_followers`
--

CREATE TABLE `bc_user_has_followers` (
  `user_has_followers_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bc_user_has_liked`
--

CREATE TABLE `bc_user_has_liked` (
  `user_has_liked_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `posts_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT für Tabelle `bc_profiles`
--
ALTER TABLE `bc_profiles`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `bc_users`
--
ALTER TABLE `bc_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT für Tabelle `bc_user_has_followers`
--
ALTER TABLE `bc_user_has_followers`
  MODIFY `user_has_followers_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `bc_user_has_liked`
--
ALTER TABLE `bc_user_has_liked`
  MODIFY `user_has_liked_id` int(11) NOT NULL AUTO_INCREMENT;
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

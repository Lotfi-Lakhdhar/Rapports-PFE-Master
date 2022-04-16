-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 10 Avril 2016 à 00:22
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `eportfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `titre`) VALUES
(1, 'eportfolio'),
(2, 'éducation');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `ref` varchar(60) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=80 ;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `username`, `email`, `content`, `created`, `ref`, `ref_id`, `parent_id`) VALUES
(1, 'lotfi', 'lotfi@lot.fr', 'commentaire 1\r\ncommentaire 1\r\ncommentaire 1\r\ncommentaire 1', '2016-03-16 00:00:00', 'page', 1, 30),
(2, 'test', 'test@test.fr', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.', '2016-04-01 00:00:00', 'page', 1, 0),
(48, 'prese', 'pse@j.fr', ' presentation', '2016-04-03 11:38:25', 'presentation', 13, 0),
(41, 'enfant1', 'email@fe.com', ' reponse 1 ', '2016-04-02 11:35:11', 'page', 1, 0),
(42, 'l''enfant 2', 'email@fe.com', ' reponse 2', '2016-04-02 11:36:00', 'page', 1, 41),
(43, 'enfant3', 'lotfi@lotfi.fr', ' reponse 3', '2016-04-02 11:36:24', 'page', 1, 41),
(44, 'reponse21', 'email@fe.com', ' reponse 21', '2016-04-02 11:37:12', 'page', 1, 41),
(45, 'reponse31', 'fr@h.fr', ' reponse 31', '2016-04-02 11:43:44', 'page', 1, 41),
(46, 'lortfi', 'lotfilakhdhar@gmail.com', ' mes objectifs', '2016-04-03 11:08:48', 'page', 2, 0),
(47, 'commentaire 2', 'vv@j.fr', ' lotfi', '2016-04-03 11:09:10', 'page', 2, 46),
(40, 'lotfi2', 'lotfi@lotfi.fr', ' sss', '2016-04-02 11:27:18', 'page', 1, 30),
(39, 'reponce', 'lotfilakhdhr@gmail.com', ' eee', '2016-04-02 10:49:51', 'page', 1, 2),
(30, 'pseudo', 'pseudo@gmail.com', ' Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.', '2016-04-02 06:05:26', 'page', 1, 0),
(34, 'llllll', 'lotfilakhdhr@gmail.com', '  message', '2016-04-02 10:27:00', 'page', 1, 30),
(35, 'lold', 'ss@s.fr', ' ssss', '2016-04-02 10:27:26', 'page', 1, 30),
(36, 'looe', 'aze@k.fr', ' ssssss', '2016-04-02 10:27:53', 'page', 1, 2),
(37, 'parent', 'parent@parent.fr', 'parent', '2016-04-02 10:40:08', 'page', 1, 0),
(38, 'enfant', 'enfant@gmail.com', ' enfant', '2016-04-02 10:41:44', 'page', 1, 37),
(49, 'pres2', 'ss@s.fr', ' preseenation 1 ', '2016-04-03 11:39:02', 'presentation', 13, 0),
(50, 'commentaire', 'email@fe.com', ' reponse', '2016-04-03 11:39:45', 'presentation', 13, 48),
(51, 'projet1', 'email@fe.com', ' projet1', '2016-04-03 11:54:06', 'projet', 17, 0),
(52, 'projet2', 'parent@parent.fr', ' projet2', '2016-04-03 11:54:27', 'projet', 17, 51),
(53, 'tache 1', 'lotfi@lotfi.fr', '  tache 1', '2016-04-03 11:59:52', 'tache', 4, 0),
(54, 'tache 2', 'lotfi@lotfi.fr', ' tache 2', '2016-04-03 12:00:29', 'tache', 4, 53),
(55, 'carnet 1', 'lotfi@lotfi.fr', '  carnet 1', '2016-04-03 12:03:50', 'carnet', 14, 0),
(56, 'carnet 2', 'ss@s.fr', ' carnet 2', '2016-04-03 12:04:15', 'carnet', 14, 55),
(57, 'kkkk', 'lotfilakhdhar@gmail.com', '  kkkk', '2016-04-03 03:12:08', 'page', 1, 41),
(58, 'alo', 'dd@h.fr', ' dd', '2016-04-03 03:13:09', 'page', 1, 30),
(59, 'emm', 'lotfi@lotfi.fr', ' emm', '2016-04-03 03:13:36', 'page', 1, 30),
(60, 'k1', 'email@fe.com', ' k1', '2016-04-03 03:56:47', 'page', 1, 57),
(61, 'eeeeeee', 'fqr@h.fr', ' eeeee', '2016-04-03 04:06:06', 'page', 1, 0),
(62, 'enfant', 'lotfi@lotfi.fr', ' enfanat', '2016-04-03 04:07:26', 'page', 1, 0),
(63, 'enfant', 'lotfi@lotfi.fr', ' enfant', '2016-04-03 04:08:39', 'page', 1, 0),
(64, 'r', 'lotfi@lotfi.fr', ' reponse', '2016-04-03 04:11:17', 'page', 1, 0),
(65, 'reponse', 'email@fe.com', ' email', '2016-04-03 04:13:20', 'page', 1, 0),
(66, 'test', 'email@fe.com', ' test', '2016-04-03 04:14:20', 'page', 1, 65),
(67, 'test', 'test@test.fr', ' test', '2016-04-03 04:15:17', 'page', 2, 46),
(68, 'test2', 'email@fe.com', ' test2', '2016-04-03 04:15:40', 'page', 2, 46),
(69, 'commentaire', 'email@fe.com', ' comentaire', '2016-04-03 04:16:09', 'page', 2, 46),
(70, 'reponse', 'email@fe.com', ' reponse', '2016-04-03 04:17:36', 'page', 2, 46),
(71, 'dernier commenatire', 'email.c@m.fr', ' dernier c  ', '2016-04-03 04:18:49', 'page', 2, 0),
(72, 'dernier', 'email@fe.com', ' email', '2016-04-03 04:19:18', 'page', 2, 71),
(73, 'dernier1', 'email@fe.com', ' demo', '2016-04-03 04:19:33', 'page', 2, 71),
(74, 'commenatire', 'parent@parent.fr', ' ggg', '2016-04-03 04:20:29', 'page', 2, 0),
(75, 'test', 'email@fe.com', ' test', '2016-04-03 04:20:59', 'page', 2, 0),
(76, 'dernier 2', 'email@fe.com', ' tt', '2016-04-03 04:21:51', 'page', 2, 71),
(77, 'comment', 'comment@gmail.com', ' test', '2016-04-09 01:57:17', 'presentation', 27, 0),
(78, 'comment 2', 'test@gmail.com', ' test 2', '2016-04-09 01:57:39', 'presentation', 27, 77),
(79, 'test', 'test@gmail.com', ' test', '2016-04-09 01:58:06', 'projet', 4, 0);

-- --------------------------------------------------------

--
-- Structure de la table `configs`
--

CREATE TABLE IF NOT EXISTS `configs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

CREATE TABLE IF NOT EXISTS `medias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_medias_posts1_idx` (`post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `medias`
--

INSERT INTO `medias` (`id`, `name`, `file`, `type`, `post_id`) VALUES
(1, 'hh', '2016-03/10391487_1206343472795193_8243795052621167606_n.png', 'img', 9),
(2, '', '2016-04/10391487_1206343472795193_8243795052621167606_n.png', 'img', 14),
(3, '', '2016-04/images.jpg', 'img', 14),
(4, 'page', '2016-04/10391487_1206343472795193_8243795052621167606_n.png', 'img', 1);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `content` text,
  `created` datetime DEFAULT NULL,
  `online` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_posts_users1_idx` (`users_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `name`, `content`, `created`, `online`, `type`, `slug`, `users_id`, `category_id`) VALUES
(1, 'Je me présente ', '<h2>Je me pr&eacute;sente</h2>\r\n<p><em>&Eacute;cris ici une petite pr&eacute;sentation:</em></p>\r\n<p>Ne mets pas de choses trop <a href="/formationPHP/eportfolio/site/pages/mes-objectifs-2" target="_blank">personnelles</a>.</p>\r\n<p>Tu peux aussi mettre des photos et des images.</p>\r\n<p>Mes go&ucirc;ts Ce que je pr&eacute;f&egrave;re Ce que je n''aime pas Mes musiques / films / livres Mon animal pr&eacute;f&eacute;r&eacute;</p>\r\n<p><img src="/eportfolio/site/img/2016-04/10391487_1206343472795193_8243795052621167606_n.png" alt="" width="642" height="642" /></p>', '2016-04-09 10:31:19', 1, 'page', 'je-me-presente', 1, 1),
(2, 'Mes objectifs', '<h2>Mes objectifs g&eacute;n&eacute;raux</h2>\r\n<p>objectif G 1 objectif G 2 objectif G 3</p>\r\n<h2>Mes objectifs particuliers</h2>\r\n<p>objectif P 1 objectif P 2 objectif P 3</p>', '2016-04-05 05:00:57', 1, 'page', 'mes-objectifs', 1, 1),
(3, 'Mes forces et mes défis', '<h2>Mes forces</h2>\r\n<ul>\r\n<li>lllllllllllllllllll</li>\r\n</ul>\r\n<h2>Mes d&eacute;fis</h2>', '2016-04-05 05:11:06', 1, 'page', 'mes-forces-et-mes-defis', 1, 1),
(4, 'titre projet', '<p>fhfgjhgqfh</p>', '2016-04-05 05:25:19', 1, 'projet', 'article-1', 1, 1),
(14, 'carnet 1l', '<p><img title="test" src="/formationPHP/eportfolio/site/img/2016-04/10391487_1206343472795193_8243795052621167606_n.png" alt="test" width="50" height="50" />bhfj<a href="/formationPHP/eportfolio/site/pages/je-me-presente-1">kbhqfjk</a></p>\r\n<p><img src="/formationPHP/eportfolio/site/img/2016-04/images.jpg" alt="" width="190" height="265" /></p>', '2016-04-09 05:53:58', 1, 'carnet', 'v', 1, 2),
(15, 'carnet 2', '', '2016-04-09 11:48:22', 1, 'carnet', 'carnet', 1, 2),
(17, 'titre 2', '<p>fff</p>', '2016-04-04 07:22:52', 1, 'projet', 'titre', 1, 2),
(19, 'test-1', '<p>test</p>', '2016-03-31 09:36:43', 1, 'projet', 'test', 1, 2),
(22, 'tâche', '<p>aaaa</p>', '2016-04-05 05:43:13', 1, 'projet', 'art', 1, 2),
(25, 'tâche', '<p>contenu</p>', '2016-04-05 05:47:37', 1, 'tache', 'tache', 1, 2),
(26, 'carnet 3', '<p>contenu</p>', '2016-04-09 11:49:37', 1, 'carnet', 'carnet-test', 1, 2),
(27, 'presentation', '<p><strong>contenu pr&eacute;s<a href="/formationPHP/eportfolio/site/pages/mes-forces-et-mes-defis-3">ent</a>ation</strong></p>', '2016-04-05 06:08:33', 1, 'presentation', 'presentation', 1, 2),
(28, 'tache', '<p>contenu</p>', '2016-04-05 10:21:52', 1, 'tache', 'tache', 1, 0),
(29, NULL, NULL, NULL, -1, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

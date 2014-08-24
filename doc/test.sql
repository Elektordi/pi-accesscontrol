-- phpMyAdmin SQL Dump
-- version 3.3.2deb1ubuntu1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Dim 24 Août 2014 à 17:01
-- Version du serveur: 5.1.73
-- Version de PHP: 5.3.2-1ubuntu4.26

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `accesscontrol`
--

-- --------------------------------------------------------

--
-- Structure de la table `cards`
--

CREATE TABLE IF NOT EXISTS `cards` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `blocked` tinyint(1) NOT NULL,
  `ref` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `cards`
--

INSERT INTO `cards` (`id`, `uid`, `user_id`, `blocked`, `ref`) VALUES
(1, 123456, 1, 0, 'Test card');

-- --------------------------------------------------------

--
-- Structure de la table `doors`
--

CREATE TABLE IF NOT EXISTS `doors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `version` varchar(50) NOT NULL,
  `lastseen` datetime DEFAULT NULL,
  `config` text,
  `serial` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `doors`
--

INSERT INTO `doors` (`id`, `name`, `ip`, `version`, `lastseen`, `config`, `serial`) VALUES
(1, 'Front door', '127.0.0.1', 'Dummy reader', '2013-05-04 00:00:41', 'useless=1\r\nanswer=42', '00000DUMMYSN00000');

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `groups`
--

INSERT INTO `groups` (`id`, `name`) VALUES
(1, 'Full Access');

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `timestamp` datetime NOT NULL,
  `action` varchar(50) NOT NULL,
  `card_id` int(10) unsigned DEFAULT NULL,
  `door_id` int(10) unsigned DEFAULT NULL,
  `result` varchar(10) DEFAULT NULL,
  `data` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `logs`
--

INSERT INTO `logs` (`id`, `timestamp`, `action`, `card_id`, `door_id`, `result`, `data`) VALUES
(1, '2013-05-04 00:01:43', 'READ', 1, 1, 'ACK', '123456');

-- --------------------------------------------------------

--
-- Structure de la table `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(10) unsigned NOT NULL,
  `door_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `rights`
--

INSERT INTO `rights` (`id`, `group_id`, `door_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NULL,
  `group_id` int(10) unsigned NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `group_id`, `admin`) VALUES
(1, 'admin', 'Admin user', 'admin@example.com', '891f619bb0ff41dbcfda886b06bc60e9afe3accf', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `web_logs`
--

CREATE TABLE IF NOT EXISTS `web_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `timestamp` datetime NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `action` varchar(50) NOT NULL,
  `object` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `web_logs`
--

INSERT INTO `web_logs` (`id`, `timestamp`, `user_id`, `action`, `object`) VALUES
(1, '2013-05-03 23:57:35', NULL, 'INSTALL', ''),
(2, '2013-05-03 23:57:35', 1, 'CREATE_USER', 'user/1');


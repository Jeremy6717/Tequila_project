-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 20 Décembre 2017 à 10:43
-- Version du serveur: 5.5.57-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `michelm_tequiladb`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `id_UNIQUE` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Structure de la table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `cou_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cou_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cou_id`),
  UNIQUE KEY `id_UNIQUE` (`cou_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=250 ;

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cust_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cust_firstname` varchar(45) DEFAULT NULL,
  `cust_lastname` varchar(45) DEFAULT NULL,
  `cust_email` varchar(45) DEFAULT NULL,
  `cust_address` varchar(45) DEFAULT NULL,
  `cust_postcode` varchar(10) DEFAULT NULL,
  `cust_city` varchar(45) DEFAULT NULL,
  `cust_cou_id` int(10) unsigned NOT NULL,
  `cust_gender` tinyint(1) NOT NULL,
  `cust_dob` text NOT NULL,
  PRIMARY KEY (`cust_id`,`cust_cou_id`),
  UNIQUE KEY `id_UNIQUE` (`cust_id`),
  KEY `fk_customer_country_idx` (`cust_cou_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=299 ;

-- --------------------------------------------------------

--
-- Structure de la table `orderline`
--

CREATE TABLE IF NOT EXISTS `orderline` (
  `ol_ord_id` int(10) unsigned NOT NULL,
  `ol_prod_id` int(10) unsigned NOT NULL,
  `ol_quantity` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ol_ord_id`,`ol_prod_id`),
  KEY `fk_order_has_product_product1_idx` (`ol_prod_id`),
  KEY `fk_order_has_product_order1_idx` (`ol_ord_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `ord_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ord_date` char(10) DEFAULT NULL,
  `ord_payment` varchar(15) DEFAULT NULL,
  `ord_cust_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ord_id`,`ord_cust_id`),
  UNIQUE KEY `id_UNIQUE` (`ord_id`),
  KEY `fk_order_customer1_idx` (`ord_cust_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=431 ;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `prod_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(45) DEFAULT NULL,
  `prod_description` varchar(255) DEFAULT NULL,
  `prod_price` float unsigned DEFAULT NULL,
  `prod_stock` int(10) unsigned DEFAULT NULL,
  `prod_vat` int(11) DEFAULT NULL,
  `prod_cat_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`prod_id`,`prod_cat_id`),
  KEY `fk_product_category1_idx` (`prod_cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=253 ;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `rol_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rol_label` varchar(50) NOT NULL,
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `usr_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usr_username` varchar(45) NOT NULL,
  `usr_firstname` varchar(45) DEFAULT NULL,
  `usr_lastname` varchar(45) DEFAULT NULL,
  `usr_email` varchar(255) NOT NULL,
  `usr_password` varchar(45) NOT NULL,
  `usr_newsletter` tinyint(4) DEFAULT '0',
  `usr_report` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`usr_id`),
  UNIQUE KEY `id_UNIQUE` (`usr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Structure de la table `users_roles`
--

CREATE TABLE IF NOT EXISTS `users_roles` (
  `usr_id` int(10) unsigned NOT NULL,
  `rol_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`usr_id`,`rol_id`),
  KEY `fk_user_has_role_role1_idx` (`rol_id`),
  KEY `fk_user_has_role_user1_idx` (`usr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_customer_country` FOREIGN KEY (`cust_cou_id`) REFERENCES `country` (`cou_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `orderline`
--
ALTER TABLE `orderline`
  ADD CONSTRAINT `fk_order_has_product_order1` FOREIGN KEY (`ol_ord_id`) REFERENCES `orders` (`ord_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_has_product_product1` FOREIGN KEY (`ol_prod_id`) REFERENCES `product` (`prod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order_customer1` FOREIGN KEY (`ord_cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category1` FOREIGN KEY (`prod_cat_id`) REFERENCES `category` (`cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `fk_user_has_role_role1` FOREIGN KEY (`rol_id`) REFERENCES `role` (`rol_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_role_user1` FOREIGN KEY (`usr_id`) REFERENCES `user` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

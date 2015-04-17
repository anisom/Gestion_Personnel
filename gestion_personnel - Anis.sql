-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 16 Mars 2015 à 12:23
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `gestion_personnel`
--
CREATE DATABASE IF NOT EXISTS `gestion_personnel` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gestion_personnel`;

-- --------------------------------------------------------


--
-- Structure de la table `employe`
--

CREATE TABLE employe (
  id_employe int(20) NOT NULL,
  nom_employe varchar(20),
  prenom_employe varchar(20),
  mail varchar(40),
  password varchar(50),
  id_admin boolean,
  id_ligue int(20)
);

-- --------------------------------------------------------

--
-- Structure de la table `ligue`
--

CREATE TABLE ligue (
  id_ligue int(20) NOT NULL,
  nom_ligue varchar(20),
  id_Employe_Admin int(20)
);

ALTER TABLE employe 
ADD CONSTRAINT PK_EMPLOYE PRIMARY KEY(id_employe);
ALTER TABLE ligue
ADD CONSTRAINT PK_LIGUE PRIMARY KEY(id_ligue);
ALTER TABLE employe 
ADD CONSTRAINT FK_EMPLOYE FOREIGN KEY (id_ligue) REFERENCES ligue(id_ligue);
ALTER TABLE ligue
ADD CONSTRAINT FK_LIGUE FOREIGN KEY (id_employe_admin) REFERENCES employe(id_employe);
  
INSERT INTO employe (id_employe,nom_employe,password,id_admin) VALUES(1,"root","toor",1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

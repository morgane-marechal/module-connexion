-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 02 déc. 2022 à 11:33
-- Version du serveur :  10.5.15-MariaDB-0+deb11u1
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `moduleconnexion`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `prenom`, `nom`, `password`) VALUES
(19, 'Mira1', 'Helene', 'Mirage', '$2y$10$DX8UeXg2G/LO7daW4EQvWuBIOwnglv7rFr6hMmPifnFQ7r2QEAbte'),
(20, 'Jeanne', 'Jeanne', 'Mirabia', '$2y$10$Ufz8V1F7baqxTyRPylHlZe/Wu.BnbJdQ2xIrIpR3VwVqM5zN9xLNW'),
(21, 'Donatello', 'Jerem', 'Rufus', '$2y$10$BCC5dx1t/U.T.YLtxaBZyOx/7kOUg1SNS6O2pRq..43.m5c3LmZHC'),
(22, 'admin', 'admin', 'admin', '$2y$10$GQumgFcvjtGMAzVWcma2me1jzXhDiTKfB04lM.ads4TsUye7LCg66'),
(23, 'SuperUnicorn', 'Alissa', 'Mirabia', '$2y$10$U2oxe/BiuWxLZT7TOC4MKORE6E0KB1awnQWb8v2KQm8itkYXFSXy6'),
(24, 'Mefisto', 'Ange', 'Dubien', '$2y$10$Hefax/4OoBgRm9HFTbGqHe8ow6sgXa1hth7Wy6J0IkRqanA94JoEa'),
(25, 'Tulipe', 'Magnolia', 'Bellefleur', '$2y$10$qobtsRI6zomEJ6E3npHA4uPWs0k5Mwzf2SmLHyoJb8VPuQybhMtNy');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

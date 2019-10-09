-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 09 Octobre 2019 à 09:05
-- Version du serveur :  5.7.27-0ubuntu0.18.04.1
-- Version de PHP :  7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Ikouq`
--

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

CREATE TABLE `ingredient` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nutri_score` int(11) NOT NULL,
  `mesure` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `allergene` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `ingredient`
--

INSERT INTO `ingredient` (`id`, `nom`, `nutri_score`, `mesure`, `url_photo`, `allergene`) VALUES
(1, 'poire', 1, 'unité', 'poire.jpg', 'none'),
(2, 'beurre', 5, 'g', 'beurre.jpg', 'lactose'),
(3, 'sucre', 4, 'g', 'sucre.jpg', 'none'),
(4, 'oeuf', 1, 'unité', 'oeuf.jpg', 'oeuf'),
(5, 'farine', 1, 'g', 'farine.jpg', 'gluten'),
(6, 'poudre d\'amandes', 1, 'g', 'poudre_amande.jpg', 'fruits oléagineux'),
(7, 'pâte brisée', 4, 'unité', 'pate_brisée.jpg', 'gluten'),
(8, 'betterave', 1, 'g', 'betterave.jpg', 'none'),
(9, 'tahine(purée de sésame)', 4, 'g', 'tahine', 'fruits oléagineux'),
(10, 'cumin', 1, 'càc', 'cumin.jpg', 'none'),
(11, 'jus de citron', 1, 'càc', 'jus_citron.jpg', 'none'),
(12, 'ail', 1, 'unité', 'ail.jpg', 'none'),
(13, 'huile d\'olive', 3, 'càs', 'huile_olive.jpg', 'none'),
(14, 'sel', 3, 'càc', 'sel.jpg', 'none'),
(15, 'melon', 1, 'g', 'melon.png', 'none'),
(16, 'sucre vanillé', 4, 'unité', 'sucre_vanille.png', 'gluten'),
(17, 'menthe', 1, 'feuille', 'menthe.png', 'none'),
(18, 'amandes effilées', 1, 'g', 'amandes_effilées.jpg', 'fruits oléagineux'),
(19, 'citron', 1, 'unité', 'citron.jpg', 'none'),
(20, 'pâte feuilletée', 4, 'unité', 'pate_feuilletée.jpg', 'gluten'),
(21, 'crème fraîche', 4, 'cL', 'creme_fraiche.jpg', 'lait'),
(22, 'kiri', 4, 'unité', 'kiri.jpg', 'lait'),
(23, 'champignons de paris', 1, 'g', 'champignon.jpg', 'none'),
(24, 'émincé de poulet', 1, 'g', 'emince_poulet.jpg', 'none'),
(25, 'poireau', 1, 'g', 'poireau.jpg', 'none'),
(26, 'vin blanc', 5, 'cL', 'vin_blanc.jpg', 'sulfite'),
(27, 'tomate', 1, 'g', 'tomate.jpg', 'none'),
(28, 'concombre', 1, 'g', 'concombre', 'none'),
(29, 'oignon', 1, 'unité', 'oignons', 'none'),
(30, 'basilic', 1, 'feuille', 'basilic.jpg', 'none'),
(31, 'persil', 1, 'g', 'persil.jpg', 'none'),
(32, 'vinaigre de xéres', 4, 'càc', 'vinaigre_xeres.jpg', 'none');

-- --------------------------------------------------------

--
-- Structure de la table `quantite`
--

CREATE TABLE `quantite` (
  `id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `fk_recette` int(11) DEFAULT NULL,
  `fk_ingredient` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `quantite`
--

INSERT INTO `quantite` (`id`, `quantite`, `fk_recette`, `fk_ingredient`) VALUES
(1, 4, 1, 1),
(2, 1, 1, 7),
(3, 100, 1, 2),
(4, 150, 1, 3),
(5, 2, 1, 4),
(6, 30, 1, 5),
(7, 90, 1, 6),
(8, 500, 2, 8),
(9, 80, 2, 9),
(10, 3, 2, 10),
(11, 4, 2, 11),
(12, 2, 2, 12),
(13, 2, 2, 13),
(14, 1, 2, 14),
(15, 1, 3, 16),
(16, 600, 3, 15),
(17, 10, 3, 17),
(18, 3, 4, 4),
(19, 150, 4, 3),
(20, 50, 4, 2),
(21, 45, 4, 5),
(22, 30, 4, 6),
(23, 30, 4, 18),
(24, 1, 4, 19),
(25, 2, 5, 20),
(26, 1, 5, 4),
(27, 10, 5, 26),
(28, 300, 5, 25),
(29, 300, 5, 24),
(30, 100, 5, 23),
(31, 1, 5, 22),
(32, 25, 5, 21),
(33, 2, 5, 20),
(34, 700, 6, 27),
(35, 200, 6, 28),
(36, 1, 6, 12),
(37, 1, 6, 29),
(38, 8, 6, 30),
(39, 4, 6, 31),
(40, 2, 6, 13),
(41, 1, 6, 32);

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE `recette` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `part` int(11) NOT NULL,
  `url_photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thermostat` int(11) NOT NULL,
  `temps_cuisson` int(11) NOT NULL,
  `regime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `plat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `instruction` longtext COLLATE utf8_unicode_ci NOT NULL,
  `duree` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `recette`
--

INSERT INTO `recette` (`id`, `nom`, `part`, `url_photo`, `thermostat`, `temps_cuisson`, `regime`, `plat`, `instruction`, `duree`) VALUES
(1, 'Tarte Amandine', 8, 'tarte_amandine.jpg', 7, 30, 'végétarien', 'Dessert', '1-Préchauffez votre four à 220°c.\r\n2-Mélangez dans un saladier le sucre et les œufs, puis ajoutez la farine et la poudre d\'amande. Ajouter le beurre fondu et mélangez.\r\n3-Étalez la pâte brisée dans un moule creux à bord haut, afin d\'avoir une belle épaisseur ou à défaut dans un moule à tarte.\r\n4-Épluchez les poires, coupez-les en deux et déposez-les sur la pâte brisée, en formant une couronne.\r\n5-Versez le contenu sur la pâte brisée.\r\n6-Pour finir, faites cuire 30 minutes et savourez !', 45),
(2, 'Houmous de betteraves', 6, 'houmous_betteraves.jpg', 0, 0, 'vegan', 'Entrée', '1-Pour cette recette, vos betteraves doivent être cuites, pelées et égouttées\r\n2-Couper les betteraves en morceaux grossiers\r\nDans votre mixeur, verser le tahine, la gousse d\'ail (de préférence écrasée) et les morceaux de betteraves\r\n3-Commencer à mixer\r\n4-Ajouter le jus de citron et l\'huile d\'olive\r\n5-Mixer à nouveau\r\n6-Ajouter le cumin et le sel\r\n7-Mixer pour obtenir un mélange bien homogène\r\n8-Goûter et rectifier l’assaisonnement si nécessaire\r\n9-Placer au frais\r\n10-A servir frais avec du pain, pain pita, dips de légumes etc..\r\nSi vous souhaitez en conserver il faudra mettre un filet d\'huile d\'olive sur le dessus, couvrir le bol de cellophane et le houmous se conservera ainsi environ 5 jours au frigo', 10),
(3, 'Soupe de melon', 4, 'soupe_de_melon.jpg', 0, 0, 'vegan', 'Dessert', '1-Couper le melon en cube.\r\n2-Mixer ensemble le melon, le sucre vanillé et les feuilles de menthe.\r\n3-Mettre le tout dans des verrines ou des jarres.\r\n4-Laisser reposer 30 min au frigo.\r\n5-Déguster frais avec quelques tuiles aux amandes !', 10),
(4, 'Tuiles aux amandes', 6, 'tuiles_amandes.jpg', 5, 10, 'végétarien', 'Dessert', '1-Préchauffer le four à 150°C (th-5).\r\n2-Faire fondre le beurre et ensuite le laisser refroidir.\r\n3-Mélanger les blancs d’œufs avec le sucre sans les monter en neige.\r\n4-Ajouter la farine, l\'amande en poudre et le beurre fondu.\r\n5-Ajouter un peu de zeste de citron (selon vos goûts) et mélanger.\r\n6-Sur une plaque de four avec papier sulfurisé, déposer des petits tas (une cuillère a café) de pâte assez espacé.\r\n7-Parsemer dessus les amandes effilées.\r\n8- Mettre au four 10 minutes. Les tuiles doivent être dorées sur les bords.\r\n9-Pour obtenir une forme cylindrique, déposer les tuiles encore chaude sur un rouleau de pâtisserie et laisser refroidir quelques secondes.\r\n10-Déguster avec une bonne soupe de melon!', 20),
(5, 'Feuilleté poulet aux poireau', 6, 'feuilleté__poulet.jpg', 6, 20, 'normal', 'Plat principal', '1-Préchauffer le four à 180°C(th-5)\r\n2-Faire le poulet dans une casserole. Assaisonner.\r\n3-Déglacer avec un vin blanc,puis réserver sur une assiette.\r\n4-Faire fondre le poireau dans la casserole où l\'on a cuit le poulet.\r\n5-Ajouter les champignons et assaisonner.\r\n6-Ajouter la crème fraîche et le kiri.\r\n7-Bien mélanger et laisser mijoter à feu doux en remuant  régulièrement.\r\n8-Une fois cuite, laisser refroidir la préparation.\r\n9-Découper les pâtes feuilletées en trois parties et placer au centre de celles-ci la préparation. Puis fermer de façon à faire un petit panier.\r\n10-Mettre un jaune d\'oeuf avec un peu d\'eau dans un récipient et appliquer le mélange avec un pinceau sur chaque feuilleté.\r\n11- Ajouter un peu d\'emmental pour faire gratiner et mettre au four 20 minutes.\r\n12- Servir chaud, accompagné de salade verte et d\'un vin blanc sec (Arbois-Béthanie par exemple)', 35),
(6, 'Gaspacho tomates', 4, 'gaspacho.jpg', 0, 5, 'vegan', 'Entrée', '1-Lavez le persil et le basilic. Pelez et émincez l\'oignon et l\'ail. \r\n2-Pelez le concombre, épépinez-les et coupez-le en morceaux.\r\n3-Ensuite, pour enlever facilement la peau des tomates, plongez-les quelques secondes dans une casserole d’eau bouillante, puis dans un saladier d\'eau froide. Retirez-leur la peau puis tranchez-les en deux, épépinez-les et émincez-les grossièrement.\r\n4-Pour préparer le gaspacho, mettez dans le bol du mixeur la chair de tomates, la chair de concombre, l\'ail, l\'oignon et les herbes, et mixez. \r\n5-Quand le mélange est homogène (à la fois velouté et épais), ajoutez l\'huile, le vinaigre de xérès (ou de vin), du sel et du poivre, et mixez à nouveau juste pour assaisonner. \r\n6-Rectifiez l\'assaisonnement au besoin, et réfrigérez au moins 30 min avant de servir votre soupe froide dans des bols ou des assiettes creuses.\r\n7-Déguster avec des tartines de pain grillé (et éventuellement frotté à l\'ail).', 20);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `quantite`
--
ALTER TABLE `quantite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8BF24A79B9945EBC` (`fk_recette`),
  ADD KEY `IDX_8BF24A799BC1B2E3` (`fk_ingredient`);

--
-- Index pour la table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT pour la table `quantite`
--
ALTER TABLE `quantite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT pour la table `recette`
--
ALTER TABLE `recette`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `quantite`
--
ALTER TABLE `quantite`
  ADD CONSTRAINT `FK_8BF24A799BC1B2E3` FOREIGN KEY (`fk_ingredient`) REFERENCES `ingredient` (`id`),
  ADD CONSTRAINT `FK_8BF24A79B9945EBC` FOREIGN KEY (`fk_recette`) REFERENCES `recette` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

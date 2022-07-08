-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 08 juil. 2022 à 00:16
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hamine`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `IDbook` int(11) NOT NULL,
  `book_titre` varchar(255) NOT NULL,
  `book_description` longtext NOT NULL,
  `book_lang` varchar(255) NOT NULL,
  `book_price` double NOT NULL,
  `book_isbn` varchar(255) NOT NULL,
  `book_released` varchar(255) NOT NULL,
  `book_image` varchar(255) NOT NULL,
  `book_editor` varchar(255) NOT NULL,
  `book_cover` varchar(255) NOT NULL,
  `book_amount` int(11) NOT NULL,
  `book_pages` int(11) NOT NULL,
  `unique_id` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`IDbook`, `book_titre`, `book_description`, `book_lang`, `book_price`, `book_isbn`, `book_released`, `book_image`, `book_editor`, `book_cover`, `book_amount`, `book_pages`, `unique_id`) VALUES
(1, 'Hamine', 'Hamine, un jeune garçon vivant une vie difficile, souvent perdu dans les ténèbres de la vie. Mais il gardait toujours espoir. ET cet espoir fut une jeune fille. Elle vient le sauver et le faire sortir de ses souffrances. Elle lui tendit la main comme personne ne l’a jamais fait. Sa vie fut métamorphosée en un clin d’œil, mais cette joie ne dura pas longtemps. La demoiselle finit par l’abandonner, en le laissant seul, baigne à nouveau dans la solitude et ses idées sombres. En Gardant en tête, malgré tout : l’espoir', 'Français', 50, '978-9920-37-738-6', '1 Mai 2019', 'Hamine-covert_image.png', 'Mohammed Amine Yahiaoui', '@le9ta', 100, 71, '621e4f10111d3'),
(2, 'La promesse', 'Imaginez que vous avez un rêve, que vous êtes entièrement prêt à tout faire , à fournir tous les efforts , à se battre corps et âme afin de le réaliser mais que tout d’un coup , il s’évapore. En un clin d’œil et à cause d’un simple événement qui n’a duré que quelques minutes, vous vous trouvez totalement désarmé, n’ayant aucune possibilité de le concrétiser.Perdu dans une obscurité infernale, aucune personne pour vous tenir la main, seul, égaré, triste, démotivé, déçu, malmené dans une voie sans échappatoire , sans aucun brin de lumière, sans signe d’issue, la seule idée qui vous tourmente c’est de quitter ce lieu même si cela coûterait votre vie. Allez-vous donc choisir la mort comme moyen de retrouver la paix ou arriverez-vous à trouver une manière plus réfléchie pour quitter cet endroit qui ne vous ressemble pas et que vous n’avez pas choisi de vous y retrouver ? Si vous estimez que le premier choix est le plus facile et que le deuxième est impossible , nous vous invitons à rendre ce dernier possible en lisant l’histoire de Najwa Awane, une grande athlète qui , grâce à une petite promesse qu’elle s’est faite a réussi à trouver une échappatoire très rayonnante de cette voie assez lugubre. Comment a-t-elle perdu son rêve en un tournemain? Comment s’est-elle débarrassée de ses idées suicidaires ? Quelle promesse s’est-elle donnée pour survivre son malheur? Comment a-t-elle réussi à bouleverser toute sa vie ? Qui l’a aidée ? Quand la vie nous occulte tous les moyens nous permettant de réaliser un rêve, n’est-ce qu’un signe pour en trouver un autre meilleur ? Eh bien , rassurez-vous car les réponses de ces questions ne sont dressées que dans notre livre La promesse . Qu’attendez-vous pour calmer votre curiosité ? Vous n’avez qu’à découvrir la merveilleuse histoire de Najwa Awane, une histoire EXTRAORDINAIRE MAIS VRAIE qui vous changera votre manière de voir la vie, qui sèmera en vous des graines d’optimisme, de persévérance, de réalisme , de confiance , d’amour mais surtout vous enseignera des leçons de vie que vous n’aurez jamais apprises à l’école. Rendez-vous le …. pour le lancement du merveilleux livre La promesse de l’écrivain Mohammed Amine Yahyaoui.', 'Français', 100, '978-9920-39-808-4', '5 Août 2020', 'Promise_covert_image.png', 'Mohammed Amine Yahiaoui', '@le9ta', 10, 153, '621e4f7714179');

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `IDcart` int(11) NOT NULL,
  `ID_user` varchar(250) NOT NULL,
  `ID_book` varchar(250) NOT NULL,
  `cart_quantity` int(11) NOT NULL,
  `cart_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cart`
--

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `IDorder` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ID_book` int(11) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`IDbook`);

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`IDcart`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`IDorder`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `IDbook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `IDcart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `IDorder` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

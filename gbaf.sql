-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 28, 2020 at 07:19 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gbaf`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `reponse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id_user`, `nom`, `prenom`, `username`, `mdp`, `question`, `reponse`) VALUES
(1, 'grasset', 'matthias', 'salut', '83b74fc26f1287a551f21d7c9ccfa68e65adc6d331dfa02643e504708fc06f8b', 'Quel est le modèle de votre première voiture ?', 'scenic'),
(10, 'Barbotin', 'Aurelien', 'aure31', '83b74fc26f1287a551f21d7c9ccfa68e65adc6d331dfa02643e504708fc06f8b', 'Quel est le modèle de votre première voiture ?', 'scenic'),
(11, 'Barbotin', 'Aurelien', 'aure', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'Quel est le modèle de votre première voiture ?', 'scenic'),
(16, 'test2', 'test2', 'test2', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'Quel est le modèle de votre première voiture ?', 'scenic'),
(17, 'test', 'test', 'test', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'Quel est le modèle de votre première voiture ?', 'clio'),
(18, 'test4', 'test4', 'test4', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'Quel est le nom de votre premier animal dosmestique ?', 'polux');

-- --------------------------------------------------------

--
-- Table structure for table `acteur`
--

CREATE TABLE `acteur` (
  `id_acteur` int(11) NOT NULL,
  `acteur` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acteur`
--

INSERT INTO `acteur` (`id_acteur`, `acteur`, `description`, `logo`) VALUES
(1, 'Formation_co', 'Formation&co est une association française présente sur tout le territoire.\r\nNous proposons à des personnes issues de tout milieu de devenir entrepreneur grâce à un crédit et un accompagnement professionnel et personnalisé.\r\nNotre proposition : \r\nun financement jusqu’à 30 000€ ;\r\nun suivi personnalisé et gratuit ;\r\nune lutte acharnée contre les freins sociétaux et les stéréotypes.\r\n\r\nLe financement est possible, peu importe le métier : coiffeur, banquier, éleveur de chèvres… . Nous collaborons avec des personnes talentueuses et motivées.\r\nVous n’avez pas de diplômes ? Ce n’est pas un problème pour nous ! Nos financements s’adressent à tous.\r\n', './images/formation_co.png'),
(2, 'Protectpeople ', 'Protectpeople finance la solidarité nationale.\r\nNous appliquons le principe édifié par la Sécurité sociale française en 1945 : permettre à chacun de bénéficier d’une protection sociale.\r\n\r\nChez Protectpeople, chacun cotise selon ses moyens et reçoit selon ses besoins.\r\nProectecpeople est ouvert à tous, sans considération d’âge ou d’état de santé.\r\nNous garantissons un accès aux soins et une retraite.\r\nChaque année, nous collectons et répartissons 300 milliards d’euros.\r\nNotre mission est double :\r\nsociale : nous garantissons la fiabilité des données sociales ;\r\néconomique : nous apportons une contribution aux activités économiques.\r\n\r\n\r\n', './images/protectpeople.png'),
(3, 'Dsa France', 'Dsa France accélère la croissance du territoire et s’engage avec les collectivités territoriales.\r\nNous accompagnons les entreprises dans les étapes clés de leur évolution.\r\nNotre philosophie : s’adapter à chaque entreprise.\r\nNous les accompagnons pour voir plus grand et plus loin et proposons des solutions de financement adaptées à chaque étape de la vie des entreprises\r\n\r\n', './images/Dsa_france.png'),
(4, 'CDE', 'La CDE (Chambre Des Entrepreneurs) accompagne les entreprises dans leurs démarches de formation. \r\nSon président est élu pour 3 ans par ses pairs, chefs d’entreprises et présidents des CDE.\r\n\r\n\r\n\r\n', './images/CDE.png');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `names` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL,
  `post` text NOT NULL,
  `date_add` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `names`, `id_user`, `id_acteur`, `post`, `date_add`) VALUES
(88, 'matthias', 1, 1, 'test1', '2020-12-23'),
(89, 'Aurelien', 11, 3, 'test1', '2020-12-23'),
(90, 'Aurelien', 11, 2, 'test1', '2020-12-27'),
(91, 'Aurelien', 11, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non nulla sagittis, lacinia magna ut, suscipit est. Suspendisse a enim nec ligula laoreet rhoncus fringilla vitae sem. Sed non enim sollicitudin, fermentum tellus sagittis, mattis nibh. Quisque et mattis quam, vitae ullamcorper magna. Mauris non sodales justo. Donec vitae libero varius elit tincidunt efficitur ut id neque. Ut mattis lorem a luctus pharetra. In ultricies facilisis mattis. Quisque elementum lacinia justo, ac rutrum enim ultrices non. Nullam laoreet nulla ac accumsan lobortis. Integer placerat semper libero. Quisque at porta diam, sit amet sollicitudin est. Praesent id congue augue. Aliquam porttitor ultricies urna, a efficitur velit egestas id. Quisque nisi tortor, cursus sed finibus in, consequat sit amet orci. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis viverra mi. Duis condimentum sapien a sapien elementum, ac hendrerit quam maximus. Etiam varius velit a fringilla posuere. Cras auctor, nibh in auctor consectetur, turpis justo lobortis ligula, malesuada congue magna tortor quis ligula. Vestibulum non fringilla nisi. Cras a finibus mauris. Nullam gravida purus id metus sagittis accumsan. Aliquam eros urna, condimentum nec efficitur in, tempor at lectus. Donec cursus ut leo quis dapibus. Cras ut elit ut arcu tincidunt varius. 3 paragraphes, 200 mots, 1347 caractères de Lorem Ipsum généré', '2020-12-27');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `id_vote` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL,
  `vote` enum('Likes','Dislikes') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`id_vote`, `id_user`, `id_acteur`, `vote`) VALUES
(102, 11, 1, 'Likes'),
(103, 11, 2, 'Dislikes'),
(104, 11, 4, 'Likes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `acteur`
--
ALTER TABLE `acteur`
  ADD PRIMARY KEY (`id_acteur`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id_vote`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `acteur`
--
ALTER TABLE `acteur`
  MODIFY `id_acteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `id_vote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 18 mars 2022 à 13:59
-- Version du serveur :  5.7.33-0ubuntu0.16.04.1
-- Version de PHP : 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `orangefab`
--

-- --------------------------------------------------------

--
-- Structure de la table `changepassword`
--

CREATE TABLE `changepassword` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `token` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `filename` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `file`
--

INSERT INTO `file` (`id`, `user_email`, `filename`) VALUES
(1, 'olivier@bigsmile.be', '0_118158924_gettyimages-507245091.jpg'),
(2, 'oli.desmet@hotmail.fr', '0Patchwork-temoins-slider.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `step2`
--

CREATE TABLE `step2` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `selling_point` varchar(2555) DEFAULT NULL,
  `business_model` varchar(128) DEFAULT NULL,
  `major_clients` varchar(255) NOT NULL,
  `business_create` varchar(128) DEFAULT NULL,
  `market_problem` text NOT NULL,
  `startup_country` varchar(256) NOT NULL,
  `startup_city` varchar(64) NOT NULL,
  `startup_people` int(11) NOT NULL,
  `track_apply` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `step2`
--

INSERT INTO `step2` (`id`, `id_user`, `selling_point`, `business_model`, `major_clients`, `business_create`, `market_problem`, `startup_country`, `startup_city`, `startup_people`, `track_apply`) VALUES
(2, 7, 'Braine l alleud', 'B to c', 'Compagnie ', '11 aout 201', 'Accounting', 'Belgique', 'Braine l alleud', 4, ''),
(3, 8, 'Turn broadband access gateways into open IoT hubs  ', 'Software/hardware sales with shared recurring revenue', 'Telecom operators', 'Heimgard Technologies has been created on Oct 1, 2021 as merger of 3 companies \'Pingcom, Jensen, Home Control)', 'Smart Home IoT security, Home IoT interoperability, mass enablement of Smart Home', 'LATAM, Europe', 'Oslo, Norway', 60, ''),
(4, 9, 'Propose mobile plans based on real phone usage.', 'B2B white label', 'Mobile (Virtual) Network Operators', 'December, 2020.', 'It\'s impossible mission for clients to choose the best fitting mobile plan from thousands of different contract clones on the market.', 'Hungary', 'Veszprém, Hungary', 3, ''),
(5, 10, 'test', 'test', 'test', '1939', 'test', 'test', 'test', 4, ''),
(6, 11, 'none (pc for (pc..android?/PchardwareblankdeletetoPCflashdriver', 'Terepcset', 'test', 'soundcloud.com/TH', '...mobilePC? reform blank hardware memory/ram/proccecor/connection to pc (onlineflash) driver', 'pc', 'antwerp', 1, ''),
(7, 12, 'Best practices in the field', 'Platform company ', 'Apple,Microsoft,Google,IBM', '2010', 'Uniform standards in data processing ', 'UK-US-EU-APAC-RU-KR-CN', 'Belgium ', 1, ''),
(8, 13, 'Best in class in telecommunications ', 'PaaS,SaaS,creative services and technology ', 'Euronext,Cisco,HP,ingrammicro', '2022', 'Uniform technology companies', '50', 'Ireland ', 1, ''),
(11, 16, 'vv', 'vv', 'vv', 'vv', 'vv', 'vv', 'vv', 1, ''),
(12, 17, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 1, ''),
(20, 25, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `step3`
--

CREATE TABLE `step3` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `turnover` varchar(128) DEFAULT NULL,
  `participate_accelerator` tinyint(1) NOT NULL,
  `which_accelerator` varchar(128) DEFAULT NULL,
  `money_raised` varchar(255) NOT NULL,
  `fab_expect` text NOT NULL,
  `why_collaborate` text NOT NULL,
  `hear_us` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `step3`
--

INSERT INTO `step3` (`id`, `id_user`, `turnover`, `participate_accelerator`, `which_accelerator`, `money_raised`, `fab_expect`, `why_collaborate`, `hear_us`) VALUES
(2, 7, '0', 0, '', '', 'Be more efficient and acquire new prospects. Join venture win win with orange belgium', 'Recommandation to all my customers', 'Internet '),
(3, 8, '€ 20M', 0, '', '', 'To get introduced to Orange Smart Home business owners and develop a joined realistic plan:\n- Define the IoT uses cases/packages that will attract Orange B2C customers\n- Define which level of cloud implementation is required and type of extra integrations (e.g. 24/7 security central)\n- Define the ideal inhome connected device that shall rund the IoT software and perform integration\n- Enable Orange retail shops to sell the (plug&play) IoT devices and get them trained in the solution\n- Agree on a recurring revenue sharing model \n- Set up, the marketing plans to the outside world', 'Increase ARPU for B2C customers, image of \"making homes smarter\" and Smart Home innovation, UX central operator. ', 'My previous companies were selling to Orange, I have some ex-colleagues in Orange.'),
(4, 9, '>€0', 0, '', '€1.2 mn', 'We are able to deliver a white-label mobile app for Orange globally.\n\nLet’s make a PoC together!', 'It can be a disruptive acquisition tool resulting a radically lower customer acquisition for you cost than the global average of $315 in telecom sector.', 'We are looking for global network operator to partner with.'),
(5, 10, '120000', 1, 'test', '', 'test', 'test', 'test'),
(6, 11, '...', 0, '', 'profit on satisfaction (free sharing without money but caring) Honest (primitive root)', 'test', 'sim card related ip connection for blank making hardware with ram memory/harddrivememory/procecor/ CPU/GHZ with mobile simcard connector to blank hardware (re)set with whatever driver for (mobilePC as it already is was and flashdrives to full software binary installment on blank hardware with linked mobile sim and ip for connection based ip/ID/reboot/privacy                    closed software legal id restore also if necessary for legal Belgian privacy compliance without opensource id/legal procecusion privacy agreement for every pc reporting acceslegality agreement for agreement abusers pc for sim id company linking as privacy and users agreements are … saying its legal no other opensource id changing abuse malware thief or issues by law as first blank hardware to set on simcard bootprocces for binary id simcard to legal resubmision', 'orange linked name and number! id'),
(7, 12, '41700000000000000', 0, '', '', 'Partnership-Co-operatie ', 'Investeren in infrastructuur en researchcentrum of affiliatie universiteit sponsor and businesses ', 'Linked in BKM Hasselt '),
(8, 13, '+500TB', 1, 'Glamp ', '', 'Business rollout,scale up fast', '400% ROI garantie ', 'BKM'),
(11, 16, '90', 0, '', '', 'qefq', 'qefqe', 'qefqe'),
(12, 17, 'd', 0, '', '', 'ddd', 'd', 'd'),
(20, 25, 'test', 0, '', '', 'test', 'test', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `company` varchar(128) NOT NULL,
  `website` varchar(256) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `phone` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `position` varchar(64) NOT NULL,
  `activity` varchar(255) DEFAULT NULL,
  `mail_sent` tinyint(1) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `company`, `website`, `firstname`, `lastname`, `phone`, `email`, `position`, `activity`, `mail_sent`, `created`) VALUES
(7, 'Yourcompta', 'Www.yourcompta.be', 'Meurisse ', 'Meurisse', '+32491919977', 'Bernard.meurisse@hotmail.be', 'Ceo', 'Your compta is our compta and no cost no bill. The custumer pays for what ', 1, '2021-09-25 15:45:04'),
(8, 'Heimgard Technologies', 'heimgardtechnologies.com/', 'Francis', 'Baestaens', '0473653992', 'francis.baestaens@heimgard.com', 'Technical Business Developer', 'We are on a mission to pioneer the definite breakthrough for smart homes by enabling telecom operators to sell Smart Homes as a service.', 1, '2021-10-29 12:03:46'),
(9, 'BillKiller Ltd.', 'billkiller.com/en/', 'Attila', 'Halmai', '+36307494823', 'attila.halmai@billkiller.com', 'CEO', 'We help network operators to acquire new clients for less.', 1, '2022-01-04 20:51:08'),
(10, 'orange', 'orange.com', 'juliette', 'malherbe', '0497791779', 'juliette.malherbe@orange.com', 'im', 'iuioelff', 1, '2022-01-05 08:45:02'),
(11, 'TH', 'soundcloud.com/TH', 'Thierry', 'Heirman', '0032498533912', 'heirmanthierry@outlook.com', 'test', 'reboot trough ip connection on network (inserted sim) connected reboot file transfer flash file driver', 1, '2022-01-11 07:10:27'),
(12, 'LabTop', 'Earth.Labtop.com', 'Brecht ', 'VROLIX ', '0460969206', 'v_rome@outlook.be', 'Owner ', 'Creative and technology specialist', 1, '2022-01-12 18:26:02'),
(13, 'L a b T o p', 'Labtop.com', 'ooo', 'Belgium ', '0460969206', 'brecht.vrolix@icloud.com', 'Co', 'Global data standards for export processing platform ', 1, '2022-01-12 19:06:13'),
(16, 'ff', 'ff.com', 'ff', 'ff', '09999999999', 'ariane.chan@orange.com', 'ff', 'kr', 1, '2022-02-16 13:36:17'),
(17, 'a', 'e.fr', 'a', 'a', '0000000000', 'a@orange.com', 'a', 'a', 1, '2022-02-28 13:22:36'),
(25, 'test', 'test.be', 'test', 'test', '0478342030', 'oli.desmet@hotmail.fr', 'test', 'test', 1, '2022-03-03 15:52:52');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `changepassword`
--
ALTER TABLE `changepassword`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `step2`
--
ALTER TABLE `step2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `step3`
--
ALTER TABLE `step3`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `changepassword`
--
ALTER TABLE `changepassword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `step2`
--
ALTER TABLE `step2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `step3`
--
ALTER TABLE `step3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `changepassword`
--
ALTER TABLE `changepassword`
  ADD CONSTRAINT `changepassword_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `step2`
--
ALTER TABLE `step2`
  ADD CONSTRAINT `step2_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `step3`
--
ALTER TABLE `step3`
  ADD CONSTRAINT `step3_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

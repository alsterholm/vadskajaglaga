-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Värd: 10.209.1.132
-- Skapad: 21 maj 2015 kl 13:09
-- Serverversion: 5.5.32
-- PHP-version: 5.3.10-1ubuntu3.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `176896-vsjl`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_swedish_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `ip` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `recipe_id` (`recipe_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL,
  `fullname` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `favorites`
--

CREATE TABLE IF NOT EXISTS `favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`recipe_id`),
  KEY `recipe_id` (`recipe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `ingredients`
--

CREATE TABLE IF NOT EXISTS `ingredients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_swedish_ci NOT NULL,
  `bgcolor` varchar(7) COLLATE utf8_swedish_ci NOT NULL,
  `fgcolor` varchar(7) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=276 ;

--
-- Dumpning av Data i tabell `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `bgcolor`, `fgcolor`) VALUES
(1, 'Potatis', '#a3855a', '#000000'),
(2, 'Röd paprika', '#d11313', '#ffffff'),
(3, 'Mjölk', '#ffffff', '#000000'),
(4, 'Smör', '#f9feb1', '#000000'),
(5, 'Gul paprika', '#fbf528', '#000000'),
(6, 'Rödlök', '#bc2c71', '#ffffff'),
(7, 'Gul lök', '#e7ea66', '#000000'),
(8, 'Matlagningsgrädde', '#f9f9e6', '#000000'),
(9, 'Vispgrädde', '#f9f9e6', '#000000'),
(10, 'Gurka', '#a7eb7a', '#000000'),
(11, 'Tomat', '#cf2c30', '#ffffff'),
(12, 'Jordnötter', '#e6d0aa', '#000000'),
(13, 'Cashewnötter', '#ead7b0', '#000000'),
(14, 'Köttfärs', '#df746f', '#ffffff'),
(15, 'Lax', '#ffdddd', '#000000'),
(16, 'Ägg', '#fcffc1', '#000000'),
(17, 'Socker', '#ffffff', '#000000'),
(18, 'Sambal oelek', '#910000', '#ffffff'),
(19, 'Tomatpuré', '#aa0000', '#ffffff'),
(20, 'Vatten', '#c4d1df', '#000000'),
(21, 'Avokado', '#008000', '#ffffff'),
(22, 'Grönkål', '#004200', '#ffffff'),
(23, 'Ananas', '#ffff00', '#000000'),
(24, 'Apelsin', '#ff8000', '#000000'),
(25, 'Ankbröst', '#ff8080', '#000000'),
(26, 'Aubergine', '#800080', '#ffffff'),
(27, 'Bacon', '#ff6464', '#000000'),
(28, 'Banan', '#ffff00', '#000000'),
(29, 'Björnbär', '#710071', '#ffffff'),
(30, 'Broccoli', '#008000', '#ffffff'),
(31, 'Blomkål', '#aeff5e', '#000000'),
(32, 'Brysselkål', '#5bb700', '#000000'),
(33, 'Bruna bönor', '#804000', '#ffffff'),
(34, 'Kidneybönor', '#9f0050', '#ffffff'),
(35, 'Svarta bönor', '#1a1a1a', '#ffffff'),
(36, 'Vita bönor', '#ffffff', '#000000'),
(37, 'Gröna bönor', '#008000', '#ffffff'),
(38, 'Linser', '#ffa851', '#000000'),
(39, 'Blåbär', '#000048', '#ffffff'),
(40, 'Bulgur', '#ffb366', '#000000'),
(41, 'Champinjoner', '#dbdbdb', '#000000'),
(42, 'Ljus choklad', '#9d4f00', '#ffffff'),
(43, 'Vit choklad', '#ffffff', '#000000'),
(44, 'Mörk choklad', '#400000', '#ffffff'),
(45, 'Chorizo', '#b90000', '#ffffff'),
(46, 'Couscous', '#ffd8b0', '#000000'),
(47, 'Dadlar', '#800040', '#ffffff'),
(48, 'Citrusfrukt', '#ffff48', '#000000'),
(49, 'Entrecôte', '#930000', '#ffffff'),
(50, 'Falukorv', '#ff8080', '#ffffff'),
(51, 'Fläder', '#ffff9d', '#000000'),
(52, 'Fetaost', '#f3f3f3', '#000000'),
(53, 'Fikon', '#c40062', '#ffffff'),
(54, 'Fläskfilé', '#ff9191', '#000000'),
(55, 'Blandfärs', '#ff5e5e', '#000000'),
(56, 'Nötfärs', '#ff8080', '#000000'),
(57, 'Fläskfärs', '#ff8080', '#000000'),
(58, 'Fläskkarré', '#ff6464', '#000000'),
(59, 'Fläskkotlett', '#ffa6a6', '#000000'),
(60, 'Fläsklägg', '#ff5353', '#000000'),
(61, 'Fläskytterfilé', '#ff8080', '#000000'),
(62, 'Granatäpple', '#ce0000', '#ffffff'),
(63, '', '#ffffff', '#000000'),
(64, 'Gravad lax', '#ff8040', '#000000'),
(65, 'Halloumi', '#ffffbf', '#000000'),
(66, 'Hjortron', '#ff8000', '#000000'),
(67, 'Hummer', '#ff2f2f', '#ffffff'),
(68, 'Hälleflundra', '#dbdbdb', '#000000'),
(69, 'Jordgubbar', '#ff0000', '#ffffff'),
(70, 'Jordärtskocka', '#bb5e00', '#ffffff'),
(71, 'Kalkonbröst', '#ff8080', '#000000'),
(72, 'Kalkonfilé', '#ff8080', '#000000'),
(73, 'Kalvfärs', '#ff8080', '#000000'),
(74, 'Kantareller', '#ff9562', '#000000'),
(75, 'Karljohansvamp', '#bb5e00', '#ffffff'),
(76, 'Kassler', '#ff8080', '#000000'),
(77, 'Kiwi', '#00ff00', '#000000'),
(78, 'Bratwurst', '#cc0000', '#ffffff'),
(79, 'Isterband ', '#bb5e00', '#ffffff'),
(80, 'Kabanoss', '#d50000', '#ffffff'),
(81, 'Knackwurst', '#ff7735', '#000000'),
(82, 'Merguez', '#804000', '#ffffff'),
(83, 'Salsiccia', '#ffa579', '#000000'),
(84, 'Stångkorv', '#cfcfcf', '#000000'),
(85, 'Värmlandskorv', '#c0c0c0', '#000000'),
(86, 'Salami', '#ca0000', '#ffffff'),
(87, 'Prinskorv', '#ce0000', '#ffffff'),
(88, 'Konärtskocka', '#a6ffa6', '#000000'),
(89, 'Kräftsjärtar', '#ff7979', '#000000'),
(90, 'Kycklingfilé', '#ffb0b0', '#000000'),
(91, 'Kycklingfärs', '#ffa8a8', '#000000'),
(92, 'Kycklingklubbor', '#ff8080', '#000000'),
(93, 'Kycklinglår', '#ff8080', '#000000'),
(94, 'Körsbär', '#ff0000', '#ffffff'),
(95, 'Hel kyckling', '#ff6464', '#000000'),
(96, 'Hel kalkon', '#ff9d9d', '#000000'),
(97, 'Helt lamm', '#ffffff', '#000000'),
(98, 'Lammfilé', '#ff5e5e', '#000000'),
(99, 'Lammfärs', '#ff8080', '#000000'),
(100, 'Lammkorv', '#ff6a6a', '#000000'),
(101, 'Lammkotlett', '#ff8080', '#000000'),
(102, 'Lammracks', '#b00000', '#ffffff'),
(103, 'Lammstek', '#ff8080', '#000000'),
(104, 'Laxfilé', '#ff8040', '#000000'),
(105, 'Hel lax', '#ff8040', '#000000'),
(106, 'Laxsida', '#ffa275', '#000000'),
(108, 'Lingon', '#ff2b2b', '#ffffff'),
(109, 'Makrill', '#ff8080', '#000000'),
(110, 'Mandlar', '#ffa275', '#000000'),
(111, 'Mango', '#ffff64', '#000000'),
(112, 'Marsipan', '#ffff9d', '#000000'),
(113, 'Matvete', '#ffcd9b', '#000000'),
(114, 'Vattenmelon', '#ff2f2f', '#ffffff'),
(115, 'Cantaloupemelon', '#ffff80', '#000000'),
(116, 'Galiamelon', '#ffff00', '#000000'),
(117, 'Honungsmelon', '#ffff00', '#000000'),
(118, 'Nätmelon', '#ffffae', '#000000'),
(119, 'Morot', '#ff8040', '#000000'),
(120, 'Mozzarella', '#ffffff', '#000000'),
(121, 'Musslor', '#000071', '#ffffff'),
(122, 'Oxfilé', '#d20000', '#ffffff'),
(123, 'Ostron', '#bcbcbc', '#ffffff'),
(124, 'Grön paprika', '#00a800', '#ffffff'),
(125, 'Passionsfrukt', '#80ff00', '#000000'),
(126, 'Bucati', '#ffff80', '#000000'),
(127, 'Cannelloni', '#ffff80', '#000000'),
(128, 'Farfalle', '#ffff80', '#000000'),
(129, 'Fettuccine', '#ffff80', '#000000'),
(130, 'Fusilli', '#ffff80', '#000000'),
(131, 'Gnocchi', '#ffff80', '#000000'),
(132, 'Lasagneplattor', '#ffff80', '#000000'),
(133, 'Makaroner', '#ffff80', '#000000'),
(134, 'Paglia e fieno', '#ffff80', '#000000'),
(135, 'Papardelle', '#ffff80', '#000000'),
(136, 'Penne', '#ffff80', '#000000'),
(137, 'Penne rigate', '#ffff80', '#000000'),
(138, 'Ravioli', '#ffff80', '#000000'),
(139, 'Spaghetti', '#ffff80', '#000000'),
(140, 'Strazzopreti', '#ffff80', '#000000'),
(141, 'Tagliatelle ', '#ffff80', '#000000'),
(142, 'Tajarin', '#ffff80', '#000000'),
(143, 'Tortellini', '#ffff80', '#000000'),
(144, 'Tortelloni', '#ffff80', '#000000'),
(145, 'Plommon', '#800040', '#ffffff'),
(146, 'Pumpa', '#ff8040', '#000000'),
(147, 'Päron', '#808000', '#ffffff'),
(148, 'Quinoa', '#ffffaa', '#000000'),
(149, 'Quorn', '#ffffa8', '#000000'),
(150, 'Passerade tomater', '#ff0000', '#ffffff'),
(151, 'Krossade tomater', '#ff0000', '#ffffff'),
(152, 'Soltorkade tomater', '#c60000', '#ffffff'),
(153, 'Körsbärstomater', '#ff0000', '#ffffff'),
(154, 'Cocktailtomater', '#ff0000', '#ffffff'),
(155, 'Plommontomater', '#ff0000', '#ffffff'),
(156, 'Rabarber', '#ff3535', '#ffffff'),
(158, 'Långkornigt ris', '#ffffff', '#000000'),
(159, 'Risottoris', '#ffffff', '#000000'),
(160, 'Svart ris', '#191919', '#ffffff'),
(161, 'Sushiris', '#ffffff', '#000000'),
(162, 'Gröris', '#ffffff', '#000000'),
(163, 'Rött ris', '#9b0000', '#ffffff'),
(164, 'Basmatiris', '#ffffff', '#000000'),
(165, 'Råris', '#ffffff', '#000000'),
(166, 'Jasminris', '#ffffff', '#000000'),
(167, 'Vildris', '#1d1d1d', '#ffffff'),
(168, 'Brunris', '#804000', '#ffffff'),
(169, 'Jams', '#804040', '#ffffff'),
(170, 'Kålrabbi', '#ffffca', '#000000'),
(171, 'Kålrot', '#d9ffb3', '#000000'),
(172, 'Majrova', '#ffddee', '#000000'),
(173, 'Oca', '#ffffbb', '#000000'),
(174, 'Selleri', '#80ff00', '#000000'),
(175, 'Rättika', '#f4f4f4', '#000000'),
(176, 'Rödbeta', '#800040', '#ffffff'),
(177, 'Sötpotatis', '#ff9b6a', '#000000'),
(178, 'Pepparrot', '#d26900', '#000000'),
(179, 'Persilja', '#00b700', '#000000'),
(180, 'Olivolja', '#006f00', '#ffffff'),
(181, 'Rapsolja', '#ffff80', '#000000'),
(182, 'Solrosolja', '#ffff80', '#000000'),
(183, 'Majsolja', '#ffffb9', '#000000'),
(184, 'Matolja', '#ffffb0', '#000000'),
(185, 'Linfröolja', '#ffffca', '#000000'),
(186, 'Jordnötsolja', '#ffffce', '#000000'),
(187, 'Räkor', '#ffc4c4', '#000000'),
(188, 'Köttbuljong', '#ff8040', '#000000'),
(189, 'Grönsaksbuljong', '#008000', '#ffffff'),
(190, 'Hönsbuljong', '#ec7600', '#000000'),
(191, 'Isbergssallad', '#00a400', '#ffffff'),
(192, 'Ruccolasallad', '#008000', '#ffffff'),
(193, 'Carminesallad', '#800040', '#ffffff'),
(194, 'Cosmopolitansallad', '#00c600', '#ffffff'),
(195, 'Crestasallad', '#00b300', '#ffffff'),
(197, 'Escarollesallad', '#00e800', '#000000'),
(198, 'Jungfrusallad', '#008000', '#ffffff'),
(199, 'Romansallad', '#00d500', '#000000'),
(200, 'Rosésallad', '#ae0057', '#ffffff'),
(201, 'Saffran', '#dd0000', '#ffffff'),
(202, 'Sill', '#e1e1e1', '#000000'),
(203, 'Sparris', '#ffffa8', '#000000'),
(204, 'Spenat', '#00df00', '#000000'),
(205, 'Squash', '#008000', '#ffffff'),
(206, 'Svarta vinbär', '#590059', '#ffffff'),
(207, 'Strömmingfilé', '#eaeaea', '#000000'),
(208, 'Tonfiskfilé', '#e2e2e2', '#000000'),
(209, 'Torskfilé', '#f2f2f2', '#000000'),
(210, 'Sockerärtor', '#00ff00', '#000000'),
(211, 'Vitlöksklyftor', '#ffffff', '#000000'),
(212, 'Färsk basilika', '#00a800', '#ffffff'),
(213, 'Färsk citronmeliss', '#008000', '#000000'),
(214, 'Färsk citrontimjan', '#00dd00', '#000000'),
(215, 'Purjolök', '#bbffbb', '#000000'),
(216, 'Riven ost', '#ffff80', '#000000'),
(217, 'Dijonsenap', '#d5d500', '#000000'),
(218, 'Hackad persilja', '#008000', '#ffffff'),
(219, 'Grillad kyckling', '#c10000', '#ffffff'),
(220, 'Pesto', '#008000', '#ffffff'),
(221, 'Pinjenötter', '#ffffb9', '#000000'),
(222, 'Creme fraiche', '#ffffff', '#000000'),
(223, 'Chilisås', '#ff3535', '#ffffff'),
(224, 'Vetemjöl', '#ffffff', '#000000'),
(226, 'Fläskkött', '#ff9f9f', '#000000'),
(227, 'Kantarellfond', '#ff8040', '#000000'),
(229, 'Timjan', '#00ff00', '#000000'),
(230, 'Parmesanost', '#ffffca', '#000000'),
(231, 'Chilifrukt', '#ff0000', '#ffffff'),
(232, 'Rökt lax', '#ff8000', '#000000'),
(233, 'Gräddfil', '#ffffff', '#000000'),
(234, 'Vaniljsocker', '#ffffff', '#000000'),
(235, 'Strösocker', '#ffffff', '#000000'),
(236, 'Kakao', '#5b2e00', '#ffffff'),
(237, 'Dill', '#008000', '#ffffff'),
(238, 'Vinäger', '#ffff80', '#000000'),
(239, 'Äggula', '#ffff00', '#000000'),
(240, 'Dragon', '#008040', '#ffffff'),
(241, 'Vitpepparkorn', '#ffffff', '#000000'),
(242, 'Pasta', '#ffff80', '#000000'),
(243, 'Vårlök', '#80ff00', '#000000'),
(244, 'Teriyakymarinad', '#b90000', '#ffffff'),
(245, 'Sesamfrö', '#ffffbf', '#000000'),
(246, 'Ajvar Relish', '#d20000', '#ffffff'),
(247, 'Västerbottenost', '#ffff80', '#000000'),
(248, 'Basilika', '#008000', '#ffffff'),
(249, 'Ädelost', '#c4ffc4', '#000000'),
(250, 'Kycklingfond', '#ffc1a4', '#000000'),
(251, 'Valnötter', '#ffce9d', '#000000'),
(252, 'Tacokrydda', '#ff8040', '#000000'),
(253, 'Oregano', '#009100', '#ffffff'),
(254, 'Spiskummin', '#9f5000', '#ffffff'),
(255, 'Chiliflakes', '#c10000', '#ffffff'),
(256, 'Paprikapulver', '#c46200', '#ffffff'),
(257, 'Curry', '#ffff80', '#000000'),
(258, 'Majskorn', '#ffff00', '#000000'),
(259, 'Oxfond', '#aa5500', '#ffffff'),
(260, 'Fransk senap', '#d9d900', '#000000'),
(261, 'Gräslök', '#80ff80', '#000000'),
(262, 'Citron', '#ffff75', '#000000'),
(263, 'Vitt vin', '#ffffca', '#000000'),
(264, 'Soya', '#161616', '#ffffff'),
(265, 'Lövbiff', '#ff8080', '#000000'),
(266, 'Buljong', '#b95c00', '#ffffff'),
(267, 'Idealmjöl', '#ffffff', '#000000'),
(268, 'Färskost', '#ffffb7', '#000000'),
(269, 'Buljongtärning', '#808000', '#ffffff'),
(270, 'Revbensspjäll', '#a80000', '#ffffff'),
(271, 'Äppeljuice', '#80ff00', '#000000'),
(272, 'Barbecuesås', '#ae0000', '#ffffff'),
(273, 'Vitkålshuvud', '#c1ffc1', '#000000'),
(274, 'Parmaskinka', '#ff9797', '#000000'),
(275, 'Kvisttomat', '#ff2222', '#ffffff');

-- --------------------------------------------------------

--
-- Tabellstruktur `ip_bans`
--

CREATE TABLE IF NOT EXISTS `ip_bans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) NOT NULL DEFAULT '0.0.0.0',
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `admin` int(11) DEFAULT NULL,
  `reason` text NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `admin` (`admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `ip_log`
--

CREATE TABLE IF NOT EXISTS `ip_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `id` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `recipe_id` (`recipe_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `recipes`
--

CREATE TABLE IF NOT EXISTS `recipes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_swedish_ci NOT NULL,
  `description` text COLLATE utf8_swedish_ci NOT NULL,
  `instructions` text COLLATE utf8_swedish_ci NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=40 ;

--
-- Dumpning av Data i tabell `recipes`
--

INSERT INTO `recipes` (`id`, `name`, `description`, `instructions`, `time`) VALUES
(3, 'Pastagratäng', 'En lättlagad pastagratäng som passar perfekt i matlådan. Går bra att frysa in.', '§Koka pastan enligt anvisningar.§Sätt ugnen på 250 °.§Ansa purjolöken och skär i skivor och bryn. Hetta upp matfett i stekpannan och bryn köttfärs tillsammans med purjolöken.§Tillsätt tomatkross, vitlök och låt småputtra ca 5 minuter. Smaka av med kryddor.§Varva pasta och köttfärsröra i en eldfast form. Häll över osten och gratinera i 10 minuter högt upp i ugnen.§Servera med sallad, tomat och paprika.', 30),
(4, 'Korv stroganoff', 'God och enkel husmanskost.', '§Skär korven i strimlor. Hacka löken och bryn i smöret.§Låt korven bryna med en stund.§Tillsätt tomatpurén och rör om. Späd med grädden. Koka ett par minuter.§Smaka av med salt och peppar.§Strö över persilja. §Servera med ris eller pasta.', 30),
(5, 'Kantarelldoftande fläskfilé i panna', 'Snabblagat och supergott.', '§Skär fläskfilén i centimetertjocka skivor. Krydda med salt o peppar.§Stek i en panna tillsammans med kantarellerna tills de är gyllenbruna.§Vispa ihop crème fraiche och kantarellfond.§Slå över fläskfilén och kantarellerna.§Rör om och låt småkoka i några minuter.§Blanda ner de halverade tomaterna och riv av bladen från färsk timjan, strö över.§Servera med nykokt pasta eller ugnsbakad klyftpotatis.', 15),
(6, 'Flygande Jakob', 'Den sötsalta storfavoriten som går hem hos de flesta familjer', '§Sätt ugnen på 225 grader. Plocka kycklingköttet från benen och fördela i en ugnssäker form. Stek bacon knaprigt, låt rinna av på hushållspapper.§Vispa grädden fluffig och blanda i chilisåsen. Bred ut blandningen över kycklingen. Dela bananerna och lägg ut. Du kan strö på bacon och jordnötter nu om du vill, eller vänta med det tills du tar ut kycklingen.§Gratinera i mitten eller nedre delen av ugnen i cirka 20 minuter. Strö sedan på bacon och jordnötter (om du inte lade på dem innan gratineringen)', 30),
(7, 'Fläskpannkaka', 'Enkel och god fläskpannkaka.', '§Sätt ugnen på 175°. Häll hälften av mjölken i en skål. Vispa ner mjöl och salt till en jämn smet. Häll i resten av mjölken. Vispa sist ner äggen.§Skär fläsket i små tärningar. Bryn dem lätt i en stekpanna.§Häll över i en smord långpanna. Häll smeten över fläsktärningarna.§Grädda i mitten av ugnen ca 50 min.§Servera med lingonsylt.', 45),
(8, 'Hemmagjord bearnaise', 'Mycket godare än färdigköpt', '§Finhacka löken. Krossa vitpepparkornen. Lägg lök, pepparkorn, vinäger och dragon i en kastrull. (Det går bra att använda både torkad och inlagd dragon.) Låt koka in tills en tredjedel återstår.§Ta kastrullen från värmen. Sila vätskan och låt svalna.§Tillsätt äggulor och vispa över vattenbad tills såsen blir krämig. (såsen får aldrig koka).§Ta bort kastrullen från värmen och vispa ner det skirade smöret. Börja droppvis. Öka sedan till en fin stråle när såsen binder.§Smaksätt med salt, peppar, persilja, finhackad dragon och ev cayennepeppar.', 30),
(9, 'Grillad haloumi', 'Grillad ost från cypern', '§Skär osten i centimetertjocka skivor. Pensla skivorna med 0.25 msk olivolja. Blanda samman vinegrett av 3 delar olivolja(0.75 msk), en del vinäger och lite grovmalen svartpeppar.§Skölj och riv sallad från olika salladssorter. Arrangera salladen på tallrikar.§Grilla osten ett par minuter på varje sida. Lägg de färdiga ostskivorna på salladsbädd och servera med vinägrett.', 15),
(10, 'Raggmunk', 'Hemmagjord raggmunk', '§Till raggmunkarna blandas den rårivna potatisen i en pannkakssmet.§Gör först i ordning smeten. Mät upp mjölk och salt. Tillsätt hälften av av mjölken och vispa ihop det till en klumpfri smet.§Vispa sedan i resten av mjölken och ägget.§Skala potatisen. Riv den fint. Eller skär den i bitar och riv i en matberedare. Blanda genast ner den rivna potatisen i smeten så att den inte mörknar.§Bryn lite fett i en stekpanna. Grädda smeten som tunna pannkakor( knappt 1 dl smet per pannkaka) eller som stora plättar, så råkakor.', 30),
(11, 'Pasta Alfredo', 'Klassisk god pastarätt.', '§Koka pastan enl. anvisningar på paketet. Låt rinna av väl och häll tillbaka i kastrullen.§ Medan pastan kokar: smält smöret i en kastrull på svag värme. Tillsätt parmesanost och grädde och ge det hela ett uppkok under omrörning. Sänk värmen och låt såsen sjuda under omrörning tills den tjocknat något. Tillsätt persilja, rör om och rör tills allt är blandat.§Häll såsen över pastan och blanda väl så att pastan är väl täckt. Garnera med örtkryddor, tex timjan', 15),
(12, 'Salamipasta', 'Snabba ryck för dagar då det är bråttom. Rätten ändrar karaktär efter vilken korv du använder.', '§Sätt igång pastakoket.§Skär travarna med salamiskivor i fyra delar, eller halvor om skivorna är små.§Lägg salamibitarna i en kall stekpanna, dra på värmen.§Skiva champinjonerna, lägg dem i pannan när salamin har stekt en stund och gett ifrån sig rejält med fett.§När champinjonerna känns klara, rör ned creme fraiche. Dra ett par varv med pepparkvarnen om det behövs.§Riv parmesanost över. Servera till den nykokta pastan.', 30),
(14, 'Tagliatelle med marinerad kycklingfilé och sesamfrön', 'God och enkel rätt.', '§Värm ugnen till 225°C.§Häll teriyakimarinaden i en ugnssäker form. Lägg i kycklingdelarna och vänd dem runt i marinaden. Stek mitt i ugnen, ca 20 minuter tills de är genomstekta. (Prova med sticka, köttsaften som rinner ut ska vara klar.) Pensla med marinaden ett par gånger under stektiden.§Koka pastan enligt anvisning på förpackningen. Strimla löken. Rosta sesamfrön under omrörning i en torr het stekpanna. Passa noga så fröna inte bränns.§Servera pastan med kyckling, lök, sesamfrön och en fräsch sallad.', 30),
(15, 'Pastasås', 'Enkel, snabb och god. Perfekt till matlådan.', '§Börja med att att tärna paprikan och bacon i precis så stora, eller små bitar du vill ha.§Fräs bacon i en het panna. Bacon med lite fett? Tillsätt en bit smör i pannan.§När baconet har börjat få färg, så tillsätter du paprikan och rör samman. Rör regelbundet och när paprikan ser ut att börja mjukna, så stänger du av plattan.§Klicka i ajvaren och creme fraichen i pannan och rör allting tillsammans. ', 15),
(16, 'Pasta med soltorkad tomat, basilika och kyckling', 'Fräsch och lättlagad pasta med kyckling', '§Koka pastan. Strimla kycklingen och bryn med lök och tomater.§Tillsätt buljong och grädde och låt koka ihop i 4-5 minuter.§Smaksätt med basilika, salt och peppar. Sila av pastan och vänd ner osten och kycklingsåsen.', 15),
(19, 'Ädelostgratinerad kyckling med valnötter', 'Smakrik kycklingrätt med knaprigt och krämigt osttäcke', '§Sätt ugnen på 200 grader.§Skär filéerna på längden i två delar. Finhacka löken och vitlöken. Stek lök och vitlök i smör tills de mjuknat och fått lite färg. Tillsätt kycklingbitarna och stek ca några minuter per sida. Salta och peppra och krydda med timjan.§Lägg kyckling och lök i en ugnsform. Mosa ihop ädelost med pressad vitlök, crème fraiche, valnötter och fond och bred ut över kycklingen. Gratinera 30 minuter. Servera med exempelvis haricot vertes.', 60),
(20, 'Krämig tacokyckling', 'Snabb pastasås som även kan användas som alternativ till tacofärs.', '§Putsa filéerna och skär i mindre bitar.§Bryn bitarna i en stekpanna och tillsätt tacokrydda. Häll på vatten och låt puttra lite.§Häll på créme fraiche och chilisås och låt puttra någon minut till.§Servera med pasta eller i tacos, till din favoritsallad', 15),
(21, 'Tacolasagne på kyckling', 'Veckans fredagsmys', '§Sätt ugnen på 200 grader.§Strimla kycklingfilé. Blanda ihop spiskummin och lika delar paprikapulver, chiliflakes, oregano, socker och salt (ca 1 tsk/4pers). Hetta upp en stekpanna med olja och stek kycklingen runt om tillsammans med kryddblandningen.§Häll mjölk, creme fraiche och krossade tomater i en tillbringare och mixa med en stavmixer. Krydda med salt, buljongpulver och svartpeppar. (Har du inte buljongpulver kan du bara krydda med en nypa extra salt).§Smörj en ugnsfast form. Varva tomatmjölk, kyckling och lasagneplattor. Avsluta med ett lager tomatmjölk och strö över ost. Grädda tills lasagnen har fått fin färg ca 25 min.§Servera med en grönsallad.', 45),
(22, 'Krämig kycklinggryta med curry', 'Krämig färgstark kycklinggryta till såväl vardag som fest!', '§Skär kycklingen i munsstora bitar. Hacka gullöken och stek den mjukt i pannan.§Stek kycklingbitarna så de är genomstekta. Krydda med salt och svartpeppar.§Ta fram en kastull och häll i matlagningsgrädden, mjölken och curryn. Tillsätt gärna mer matlagningsgrädde om du vill ha mera sås. Värm det på plattan tills det kokar lätt. Smaka av med salt och curry, beroende på hur starkt du vill ha det. Jag gillar en tjock sås så jag brukar ta i idealmjöl men det är ju en smaksak.§Häll såsen i grytan med kyckling och låt det koka ihop smarrigt! Jag brukar låta grytan koka ihop sig ca 20 minuter på låg värme men absolut inte nödvändigt, kan serveras direkt också! Tillsätt en burk majs och färsk paprika precis innan serveringen.§Serveras med pasta, färsk eller ”torkad” spelar ingen roll, lika gott! Passar även med ris.\n', 45),
(23, 'Tagliatelle med vitlöksdoftande fläskfilé i senapsås', 'God och supersnabb rätt.', '§Skiva svamp och fräs i matfett. Skär fläskfilén i bitar och bryn i stekpanna med hög kant.§Pressa över vitlök och lägg i svampen. Rör ihop grädde, vatten, fond och senap och häll över köttet.§Låt såsen koka ihop och köttet bli genomstekt. Blanda ner gräslöken i såsen. \n', 15),
(24, 'Jamie Olivers spaghetti med räkor och rucola', 'Recept komponerat av Jamie Oliver, ur boken Jamies Italien', '§Koka spaghettin i saltat vatten enligt anvisning på förpackningen.§Hetta upp en rejäl skvätt olivolja i en stekpanna och tillsätt vitlök och chili. När vitlöken börjar få färg tillsätts räkorna, som får fräsa med någon minut. Finhacka eller gör puré av de soltorkade tomaterna. Tillsätt sedan det vita vinet och tomatpurén och låt sjuda ett par minuter.§Låt den färdiga pastan rinna av i ett durkslag men spara lite av kokvattnet. Blanda spaghettin med såsen och tillsätt citronsaften och hälften av rucolan. Tillsätt lite av kokvattnet om såsen verkar vara för tjock. Smaka av med salt och peppar.§Lägg upp på dina tallrikar och strö över citronskalet och resten av rucolan', 30),
(25, 'Tagliatelle med lövbiff och svamp i krämig gräddsås', 'Lyxig pastarätt som är superlätt att laga.', '§Hacka vitlöken fint, strimla köttet och skiva champinjonerna. Fräs vitlöken gyllenbrun i smöret.§Lägg sedan ner kött och svamp och låt det fräsa någon minut. Strö över vetemjöl och rör om, tillsätt sedan buljong, grädde, senap, soja och dragon. Låt det puttra i ca. 5 min. Smaka av med salt och peppar.§Koka under tiden fyra portioner Barilla Tagliatelle.§Lägg pastan på en tallrik. Häll såsen på.§Servera gärna med en grönsallad. Dekorerat med färsk timjan och några rödbetschips. ', 30),
(26, 'Stuvade makaroner på annat sätt', 'En liten specialare.', '§Koka pastan(helst makaroner) i lättsaltat vatten enligt anvisningarna. Häll av vattnet. Vispa ut mjölet i lite mjölk till en redning.§Koka upp resten av mjölken tillsammans med smöret. Vispa i redningen och koka på svag värme 3-5 minuter. Rör om några gånger. Blanda försiktigt i makaronerna. Smaksätt ev med lite salt, peppar och riven muskotnöt.§Servera med stekt fläsk, bacon, köttbullar eller kryddig korv.', 15),
(27, 'Fläskfilé i vitlökssås', 'Krämig och god, passar perfekt alla dagar i veckan.', '§Rensa och skär fläskfilén i avlånga bitar (stavar).§Pressa vitlöksklyftan och bryn i olja, tillsätt fläskfilé bitarna och salt & peppar.§Klicka i osten i pannan, häll i grädden och rör om tills osten smälter.§Lägg i buljong tärningen och 2-3 stänk soja, rör om.§Låt det koka en stund, 5-10 min, tillsätt mer soja efter smak och eventuellt mer grädde om såsen är för tjock.§Koka den färska pastan.§Servera med en härlig sallad!', 30),
(28, 'Snabb lök och falukorvspanna', 'Gott när du har bråttom.', '§Skala och skär löken i stora klyftor. Finhacka persiljan. Dra skinnet av korven. Dela den på längden och skär sedan centimetertjockt tvärs över.§Smält ca 2 msk smör i en panna och fräs sedan löken 3-4 minuter. Lägg sedan i korven och fräs ytterligare lika länge.§Tillsätt salt, ta några tag med pepparkvarnen och blanda till sist i persiljan.§Servera med kokt potatis. \n', 15),
(29, 'Pasta med lax', 'Gott när du har bråttom', '§Koka pastan enligt anvisningarna på paketet. Låt laxen koka med de sista tre minuterna.§Häll av pastavattnet.§Koka upp grädden med buljongtärning och dill, låt sjuda i fyra minuter.§Lägg i pastan och laxen, rör om och låt allt bli genomvarmt.', 15),
(30, 'Grillad entrecôte', 'Servera med t ex ungsrostade grönsaker.', '§Skiva köttet.§Krydda båda sidorna av stekarna med salt och peppar och pensla dem med olivolja.§Stek i en het stekpanna, eller lägg dem på grillen, i 3 minuter på var sida.§Låt vila i två minuter innan du serverar.', 15),
(31, 'Amerikanska revbensspjäll', 'Om vädret inte är grillvänligt, går det bra att använda en grillpanna på spisen.', '§Sätt på grillen. Du kan också använda en grillpanna på spisen.§Skär revbensspjället i portionsbitar som är 3-4 revben stora och lägg dem i en stor panna. Häll på äppeljuice så att det täcker köttet. Sätt på ett lock och låt koka upp. Dra bort pannan från värmen och låt stå i 30 minuter.§Olja grillgallret lätt.§Lägg revbensspjällen på grillen och släng några vitlöksklyftor på de heta kolen.§Grilla i drygt 20 minuter. Vänd då och då.§Gör en glaze genom att blanda barbequesåsen med 5 dl äppeljuice från pannan. Krydda med vitlökspulver. Pensla spjällen med såsen och grilla i ytterligare 10 minuter.§Servera med grillad majs och barbeque-sås.\n', 45),
(33, 'Kyckling med kål och rökt fläsk', 'Det rökta fläsket ger mycket god smak till kålen.', '§Stek Strimla eller tärna sidfläsket i små bitar. Stek tills de fått lite färg och blivit knapriga. Tillsätt vitkålen skuren i bitar. Stek tills kålen mjuknat. Smaka av med salt, peppar, timjan.§Stek kycklingfiléerna och krydda med valfria kryddor. Servera med kål och fläskblandningen.', 45),
(34, 'Rårakor', 'Snabbt och superenkelt, och jättegott.', '§Skala och riv potatisen på grova sidan av rivjärnet.§Smält smör i en stekpanna och \nlåt det bli gyllenbrunt. Lägg i 1/4 av den rivna potatisen. Platta ut med en stekspade. Stek rårakorna ca 3 min på varje sida, tills de är \ngyllenbruna och lite frasiga. Salta och peppra.§Servera med stekt fläsk och lingonsylt. Eller som förrätt med rom, finhackad rödlök och gräddfil.', 30),
(35, 'Ädelostfyllda kycklingfiléer tillagade i mikrovågsugn', 'Servera med ris eller ett potatistillbehör.', '§Skär en ficka i sidan på varje filé och lägg i en bit ädelost. Lägg filéerna i en form. Pensla sedan dem med soya. Strö över dragon. Häll grädde runt om filéerna, täck sedan formen.§Tillaga på full effekt i ca 12 min (3 min/filé). Ta ut formen och strö lite rosépeppar över.', 30),
(36, 'Toscansk kyckling med grillade kvisttomater', 'Snabbt och enkelt.', '§Förbered en fin grillglöd. Rulla ihop filéerna och linda skinkan runt så du får fyra rullar. Salta och peppra.§Grilla på medelvärme i cirka 10 minuter. Vänd några gånger.§Lägg på tomatkvisten på slutet. Vänd en gång. Salta och peppra.§Stick i kycklingköttets tjockaste del, när klar saft rinner ut är kycklingen färdig.§Servera med pastasallad med pestodressing till. ', 15),
(37, 'Grillad lax med sparris och västerbottenssås', 'Mycket gott alla dagar i veckan.', '§Sätt ugnen på 175 grader. Koka potatis.§Lägg råsocker, kumminfrön, fänkålsfrö, chiliflakes, salt och rivet skal från citron (bara det gula annars blir det lätt beskt) i en mortel. Mortla ihop kryddorna ordentligt.§Skär laxfilén i portionsbitar och ringla lite olja över. Gnid in rubben ordenligt på båda sidor.\nHetta upp en panna med 1 msk olivolja och 1 klick smör. Stek laxfilén på båda sidor så att den får fin gyllenbrun färg. Ta en sked och svep smöret som blir kvar i panna över varje laxbit.§Lägg över laxen i en ugnsfast form och sätt in i ugnen ca 10- 20 min beroende på hur genomstekt du vill ha den.§Skala den nedersta delen av sparrisen och koka upp lite lättsaltat vatten i en vid kastrull eller stekpanna. Koka sparrisen 2 min strax innan det är dags att servera.§Sås- Skala och finhacka gul lök . När det är 5 min kvar av laxen så fräser du löken i en stekpanna med några droppar olja utan att den tar färg. Tillsätt grädde och låt det koka ihop ordentligt. Vispa ner västerbottensost lite i taget tills du får en krämig sås. Smaka av med salt och peppar.§Servera laxen med sparris, kokt potatis, västerbottensås och citronklyftor.', 30),
(38, 'Potatisgratäng', 'Bra grundrecept.', '§Sätt ugnen på 225°. Smörj en ugnssäker \nform.§Skala och skiva potatisen tunt. Skala och hacka löken.§Blanda grädde, pressad vitlök, salt och peppar i en skål.§Fördela hälften av potatisen och all lök i formen.§Häll över hälften av gräddblandningen. Rör i botten så \natt kryddorna kommer med.§Fördela resten av potatisen över. Häll på resten av grädden. Strö över osten.§Grädda i ugnen tills potatisen är mjuk, ca 45 min.', 45),
(39, 'Chili con carne', 'Gott grundrecept.', '§Skala och hacka löken. Kärna ur paprikan och skär den i bitar. Bryn löken i lite matfett på svag värme. Rör ner färsen och paprikan. Bryn alltsammans några minuter.§Lägg i resten av ingredienserna och kryddorna utom bönorna. Var försiktig med chilipeppar om grytan inte ska bli för stark. Koka grytan livligt utan lock ca 10 minuter. Rör om ofta. När det mesta av vätskan har kokat in, häll i bönorna och smaka av med salt och peppar.§Låt alltsammans bli genomvarmt. Servera med tortillachips och lite gräddfil.', 15);

-- --------------------------------------------------------

--
-- Tabellstruktur `recipe_ingredients`
--

CREATE TABLE IF NOT EXISTS `recipe_ingredients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe` int(11) NOT NULL,
  `ingredient` int(11) NOT NULL,
  `amount` float NOT NULL,
  `unit` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `recipe` (`recipe`),
  KEY `ingredient` (`ingredient`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=203 ;

--
-- Dumpning av Data i tabell `recipe_ingredients`
--

INSERT INTO `recipe_ingredients` (`id`, `recipe`, `ingredient`, `amount`, `unit`) VALUES
(6, 3, 14, 100, 'g'),
(7, 3, 136, 1.75, 'dl'),
(8, 3, 215, 0.25, 'st'),
(9, 3, 151, 0.25, 'burk(ar)'),
(10, 3, 211, 0.38, 'st'),
(11, 3, 216, 0.25, 'påse'),
(12, 4, 179, 0.25, 'msk'),
(13, 4, 8, 6.25, 'cl'),
(14, 4, 19, 0.75, 'msk'),
(15, 4, 7, 0.5, 'st'),
(16, 4, 50, 100, 'g'),
(17, 5, 54, 100, 'g'),
(18, 5, 222, 0.5, 'dl'),
(20, 5, 227, 5.75, 'krm'),
(21, 5, 74, 12.5, 'g'),
(22, 5, 153, 2.5, 'st'),
(23, 5, 229, 0.25, 'msk'),
(24, 6, 219, 0.25, 'st'),
(25, 6, 223, 0.25, 'dl'),
(26, 6, 12, 0.25, 'dl'),
(27, 6, 28, 0.5, 'st'),
(28, 6, 27, 0.25, 'paket'),
(29, 6, 8, 0.75, 'dl'),
(30, 7, 226, 75, 'g'),
(31, 7, 16, 1, 'st'),
(32, 7, 224, 0.75, 'dl'),
(33, 7, 3, 2, 'dl'),
(34, 8, 7, 0.12, 'st'),
(35, 8, 238, 0.25, 'msk'),
(36, 8, 241, 2.5, 'st'),
(38, 8, 239, 0.75, 'st'),
(39, 8, 4, 62.5, 'g'),
(40, 8, 179, 0.25, 'msk'),
(41, 8, 240, 0.25, 'krm'),
(42, 9, 65, 1, 'skivor'),
(44, 9, 238, 0.25, 'msk'),
(45, 10, 224, 0.5, 'dl'),
(46, 10, 3, 1.25, 'dl'),
(47, 10, 16, 0.25, 'st'),
(48, 10, 1, 2, 'st'),
(49, 11, 4, 22.5, 'g'),
(50, 11, 129, 125, 'g'),
(51, 11, 230, 37.5, 'g'),
(52, 11, 8, 0.75, 'dl'),
(53, 11, 179, 0.75, 'msk'),
(54, 12, 130, 1, 'port'),
(55, 12, 86, 62.5, 'g'),
(56, 12, 41, 50, 'g'),
(57, 12, 222, 6.25, 'cl'),
(58, 12, 230, 3.75, 'cl'),
(61, 14, 93, 125, 'g'),
(62, 14, 141, 100, 'g'),
(63, 14, 244, 0.25, 'dl'),
(64, 14, 243, 0.25, 'dl'),
(65, 14, 245, 1.25, 'cl'),
(66, 15, 27, 0.25, 'paket'),
(67, 15, 2, 0.25, 'st'),
(68, 15, 222, 0.5, 'dl'),
(69, 15, 246, 0.5, 'msk'),
(70, 15, 242, 1, 'port'),
(71, 16, 242, 100, 'g'),
(72, 16, 90, 150, 'g'),
(73, 16, 7, 0.25, 'st'),
(74, 16, 152, 2, 'st'),
(75, 16, 190, 0.25, 'dl'),
(76, 16, 9, 0.5, 'dl'),
(77, 16, 248, 2, 'krm'),
(78, 16, 247, 0.5, 'dl'),
(92, 19, 90, 175, 'g'),
(93, 19, 7, 0.25, 'st'),
(94, 19, 211, 0.75, 'st'),
(96, 19, 222, 0.5, 'dl'),
(97, 19, 249, 31.25, 'g'),
(98, 19, 251, 3.75, 'cl'),
(99, 19, 250, 0.25, 'msk'),
(100, 20, 252, 0.25, 'påse'),
(101, 20, 90, 125, 'g'),
(102, 20, 20, 1.25, 'cl'),
(103, 20, 222, 0.5, 'dl'),
(104, 20, 223, 0.75, 'msk'),
(105, 21, 216, 37.5, 'g'),
(106, 21, 222, 0.5, 'dl'),
(107, 21, 3, 6.25, 'dl'),
(108, 21, 151, 100, 'g'),
(109, 21, 90, 150, 'g'),
(110, 21, 132, 50, 'g'),
(111, 22, 90, 150, 'g'),
(112, 22, 7, 0.5, 'st'),
(113, 22, 8, 0.75, 'dl'),
(114, 22, 3, 0.5, 'dl'),
(115, 22, 257, 0.75, 'msk'),
(116, 22, 258, 0.25, 'burk(ar)'),
(117, 22, 2, 0.5, 'st'),
(118, 23, 54, 125, 'g'),
(119, 23, 242, 60, 'g'),
(120, 23, 41, 2.5, 'st'),
(121, 23, 259, 0.5, 'msk'),
(122, 23, 8, 0.5, 'dl'),
(123, 23, 20, 0.5, 'dl'),
(124, 23, 260, 0.5, 'msk'),
(125, 23, 211, 0.5, 'st'),
(126, 23, 261, 0.25, 'msk'),
(127, 24, 139, 112.5, 'g'),
(128, 24, 211, 0.5, 'st'),
(129, 24, 231, 0.38, 'st'),
(130, 24, 187, 100, 'g'),
(131, 24, 263, 1, 'glas'),
(132, 24, 152, 0.5, 'tsk'),
(133, 24, 262, 0.25, 'st'),
(134, 24, 192, 0.5, 'knippa'),
(135, 25, 242, 100, 'g'),
(136, 25, 265, 125, 'g'),
(137, 25, 211, 0.25, 'st'),
(138, 25, 41, 2.5, 'st'),
(139, 25, 4, 0.5, 'msk'),
(140, 25, 224, 0.5, 'msk'),
(141, 25, 266, 6.25, 'cl'),
(142, 25, 264, 0.5, 'tsk'),
(143, 25, 260, 5.75, 'krm'),
(144, 26, 242, 1.5, 'dl'),
(145, 26, 20, 0.5, 'l'),
(146, 26, 267, 0.75, 'msk'),
(147, 26, 3, 1.25, 'dl'),
(148, 26, 4, 0.25, 'msk'),
(149, 27, 54, 0, 'st'),
(150, 27, 268, 0.67, 'paket'),
(151, 27, 211, 0.33, 'st'),
(152, 27, 8, 3.5, 'cl'),
(153, 27, 242, 166.75, 'g'),
(154, 27, 264, 1, 'stänk'),
(155, 27, 189, 0.33, 'st'),
(156, 28, 50, 125, 'g'),
(157, 28, 179, 0.25, 'knippa'),
(158, 28, 6, 1, 'st'),
(159, 29, 269, 0.25, 'st'),
(160, 29, 8, 0.75, 'dl'),
(161, 29, 237, 0.5, 'msk'),
(163, 29, 104, 1, 'st'),
(164, 29, 242, 75, 'g'),
(165, 30, 49, 225, 'g'),
(166, 31, 270, 0.5, 'kg'),
(167, 31, 271, 0.5, 'l'),
(168, 31, 211, 0.5, 'st'),
(169, 31, 272, 0.5, 'dl'),
(170, 33, 273, 0.25, 'st'),
(171, 33, 226, 50, 'g'),
(172, 33, 90, 1, 'st'),
(173, 34, 4, 6.25, 'g'),
(174, 34, 1, 2, 'st'),
(175, 35, 90, 1, 'st'),
(176, 35, 249, 10, 'g'),
(177, 35, 264, 0.5, 'msk'),
(178, 35, 8, 3.75, 'cl'),
(179, 36, 90, 1, 'st'),
(180, 36, 274, 1, 'skiva'),
(181, 36, 275, 50, 'g'),
(182, 37, 15, 150, 'g'),
(183, 37, 1, 1, 'port'),
(184, 37, 7, 0.12, 'st'),
(185, 37, 247, 18.75, 'g'),
(186, 37, 203, 0.25, 'knippa'),
(187, 37, 8, 0.5, 'dl'),
(188, 37, 262, 0.25, 'st'),
(189, 38, 1, 2.5, 'st'),
(190, 38, 7, 0.38, 'st'),
(191, 38, 8, 1.25, 'dl'),
(192, 38, 211, 0.5, 'st'),
(193, 38, 216, 0.5, 'dl'),
(194, 39, 14, 125, 'g'),
(195, 39, 7, 0.5, 'st'),
(196, 39, 124, 0.38, 'st'),
(197, 39, 151, 0.25, 'st'),
(198, 39, 19, 1, 'msk'),
(199, 39, 188, 0.25, 'st'),
(200, 39, 255, 2, 'krm'),
(201, 39, 211, 0.38, 'st'),
(202, 39, 36, 0.25, 'burkar');

-- --------------------------------------------------------

--
-- Tabellstruktur `recipe_sugs`
--

CREATE TABLE IF NOT EXISTS `recipe_sugs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `portions` int(11) NOT NULL,
  `description` text NOT NULL,
  `instructions` text NOT NULL,
  `ingredients` text NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_swedish_ci NOT NULL,
  `salt` binary(32) NOT NULL,
  `fullname` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `joined` datetime NOT NULL,
  `group` int(11) NOT NULL,
  `register_ip` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `newsletter` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `users_session`
--

CREATE TABLE IF NOT EXISTS `users_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hash` varchar(64) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=1 ;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriktioner för tabell `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriktioner för tabell `ip_bans`
--
ALTER TABLE `ip_bans`
  ADD CONSTRAINT `ip_bans_ibfk_1` FOREIGN KEY (`admin`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Restriktioner för tabell `ip_log`
--
ALTER TABLE `ip_log`
  ADD CONSTRAINT `ip_log_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriktioner för tabell `password_resets`
--
ALTER TABLE `password_resets`
  ADD CONSTRAINT `password_resets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriktioner för tabell `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriktioner för tabell `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  ADD CONSTRAINT `recipe_ingredients_ibfk_1` FOREIGN KEY (`recipe`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recipe_ingredients_ibfk_2` FOREIGN KEY (`ingredient`) REFERENCES `ingredients` (`id`) ON UPDATE CASCADE;

--
-- Restriktioner för tabell `recipe_sugs`
--
ALTER TABLE `recipe_sugs`
  ADD CONSTRAINT `recipe_sugs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriktioner för tabell `users_session`
--
ALTER TABLE `users_session`
  ADD CONSTRAINT `users_session_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

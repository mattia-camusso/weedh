-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 12, 2020 at 08:06 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 5.6.40-24+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `AllCards`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards_art`
--

CREATE TABLE `cards_art` (
  `id` int(11) NOT NULL,
  `art` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'uknown',
  `artist` varchar(255) NOT NULL DEFAULT 'anonymous'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cards_art`
--

INSERT INTO `cards_art` (`id`, `art`, `name`, `artist`) VALUES
(1, 'Lutri-the-Spellchaser-Ikoria-MtG-Art.jpg', 'Lutri, the Spellchaser', 'Lie Setiawan'),
(2, 'Snapdax-Apex-of-the-Hunt-Ikoria-MtG-Art.jpg', 'Snapdax, Apex of the Hunt', 'Viktor Titov'),
(3, 'Witness-of-Tomorrows-Theros-Beyond-Death-Art.jpg', 'Witness of Tomorrows', 'Svetlin Velinov'),
(4, 'Thirst-for-Meaning-Theros-Beyond-Death-Art.jpg', 'Thirst for Meaning', 'Brian Valeza'),
(5, 'Thassas-Oracle-Theros-Beyond-Death-Art.jpg', 'Thassas Oracle', 'Jesper Ejsing'),
(6, 'Knight-of-the-Tusk-Core-Set-2019-Art.jpg', 'Knight of the Tusk', 'Jesper Ejsing'),
(7, 'Kroxa-Titan-of-Deaths-Hunger-Theros-Beyond-Death-Art.jpg', 'Kroxa, Titan of Deaths Hunger', 'Vincent Proce'),
(9, 'Atris-Oracle-of-Half-Truths-Theros-Beyond-Death-Art.jpg', 'Atris, Oracle of Half Truths', 'Bastien L. Deharme'),
(10, 'Erebos-Bleak-Hearted-Theros-Beyond-Death-Art-1.jpg', 'Erebos, Bleak Hearted', ' Chase Stone'),
(11, 'Ox-of-Agonas-Theros-Beyond-Death-Art.jpg', 'Ox of Agonas', 'Lie Setiawan'),
(13, 'Nyleas-Intervention-Theros-Beyond-Death-Art.jpg', 'Nyleas Intervention', 'Zezhou Chen'),
(14, 'Ardenvale-Tactician-Throne-of-Eldraine-MtG-Art.jpg', 'Ardenvale Tactician', 'Aaron Miller'),
(15, 'Lovestruck-Beast-Throne-of-Eldraine-MtG-Art.jpg', 'Lovestruck Beast', 'Tyler Walpole'),
(16, 'Animating-Faerie-Alt-Throne-of-Eldraine-MtG-Art.jpg', 'Animating Faerie', 'Chris Seaman'),
(17, 'Linden-the-Steadfast-Queen-Throne-of-Eldraine-MtG-Art.jpg', 'Linden, the Steadfast Queen', 'Ryan Pancoast'),
(18, 'Idyllic-Grange-Throne-of-Eldraine-MtG-Art.jpg', 'Idyllic Grange', 'Howard Lyon'),
(19, 'Leyline-of-Sanctity-Core-Set-2020-Art.jpg', 'Leyline of Sanctity', 'Noah Bradley'),
(20, 'Flood-of-Tears-Core-Set-2020-Art.jpg', 'Flood of Tears', 'Adam Paquette'),
(21, 'Nurturing-Peatland.jpg', 'Nurturing Peatland', 'Noah Bradley'),
(22, 'Planebound-Accomplice-Modern-Horizons-MtG-Art.jpg', 'Planebound Accomplice', 'Paul Scott Canavan'),
(23, 'Wings-of-Abandon-Modern-Horizons-MtG-Art.jpg', 'Wings of Abandon', 'Noah Bradley'),
(24, 'Secluded-Steppe-Modern-Horizons-MtG-Art.jpg', 'Secluded Steppe', 'Noah Bradley'),
(25, 'Soulherder-Modern-Horizons-MtG-Art.jpg', 'Soulherder', 'Seb McKinnon'),
(26, 'Rite-of-the-Serpent-MtG-Artwork.jpg', 'Rite of the Serpent', 'Seb McKinnon'),
(27, 'Bedevil-Ravnica-Allegiance-Art.jpg', 'Bedevil', 'Seb McKinnon'),
(28, 'Answered-Prayers-Modern-Horizons-MtG-Art.jpg', 'Answered Prayers', 'Seb McKinnon'),
(29, 'Bankrupt-in-Blood-Ravnica-Allegiance-Art.jpg', 'Bankrupt in Blood', 'Seb McKinnon'),
(30, 'Viviens-Arkbow-War-of-the-Spark-Art.jpg', 'Viviens Arkbow', 'Zack Stella'),
(31, 'Time-Wipe-War-of-the-Spark-Art.jpg', 'Time Wipe', 'Svetlin Velinov'),
(32, 'Forest-1-Guilds-of-Ravnica-MtG-Art.jpg', 'Forest', 'Svetlin Velinov'),
(33, 'Niv-Mizzet-Parun-Guilds-of-Ravnica-MtG-Art.jpg', 'Niv Mizzet, Parun', 'Svetlin Velinov'),
(34, 'Saruli-Caretaker-Ravnica-Allegiance-Art.jpg', 'Saruli Caretaker', 'Howard Lyon'),
(35, 'Seraph-of-the-Scales-Ravnica-Allegiance-Art.jpg', 'Seraph of the Scales', 'Magali Villeneuve');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `u_id`, `c_id`, `date`, `message`) VALUES
(2, 1, 1, '2020-04-09 00:32:02', 'Hello there'),
(8, 1, 1, '2020-04-09 17:15:39', 'snoop dog snap dax'),
(10, 1, 1, '2020-04-09 17:27:37', 'ciao mamma'),
(14, 1, 1, '2020-04-10 15:24:22', 'TEST'),
(17, 1, 1, '2020-04-10 15:45:25', 'aaa'),
(20, 1, 2, '2020-04-10 15:49:13', 'snapdax is a silly name'),
(21, 1, 1, '2020-04-10 15:50:54', 'lurtriii'),
(23, 1, 1, '2020-04-10 16:33:32', 'Shablamo'),
(24, 1, 5, '2020-04-11 02:21:35', 'Nice'),
(25, 1, 6, '2020-04-11 04:31:50', 'love the colors'),
(26, 1, 6, '2020-04-11 04:33:22', 'good boi'),
(27, 1, 23, '2020-04-12 01:18:02', 'nicee'),
(28, 1, 14, '2020-04-12 16:07:25', 'love the style'),
(29, 14, 16, '2020-04-12 16:09:25', 'so cool!'),
(30, 14, 2, '2020-04-12 16:10:35', 'big boi');

-- --------------------------------------------------------

--
-- Table structure for table `fav_art`
--

CREATE TABLE `fav_art` (
  `u_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fav_art`
--

INSERT INTO `fav_art` (`u_id`, `c_id`) VALUES
(1, 1),
(1, 2),
(1, 9),
(1, 13),
(1, 14),
(1, 23),
(1, 25),
(1, 26),
(13, 15),
(14, 16),
(14, 29);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL DEFAULT 'guest',
  `password` varchar(255) NOT NULL DEFAULT '0000',
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'Andrea', '1234', 'andrea@gmail.com'),
(2, 'gino', '1111', 'gino@gmail.com'),
(13, 'mattia', 'mattia', 'mattia@live.it'),
(14, 'gigi', 'gigi', 'gigi@gigi.g');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards_art`
--
ALTER TABLE `cards_art`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fav_art`
--
ALTER TABLE `fav_art`
  ADD PRIMARY KEY (`u_id`,`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards_art`
--
ALTER TABLE `cards_art`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

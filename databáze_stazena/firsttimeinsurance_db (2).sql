-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pon 22. srp 2022, 13:10
-- Verze serveru: 10.4.22-MariaDB
-- Verze PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `firsttimeinsurance_db`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `pojistenci`
--

CREATE TABLE `pojistenci` (
  `pojistenci_id` int(11) NOT NULL,
  `jmeno` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `prijmeni` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `ulice` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `mesto` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `psc` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `telefon` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `pojistenci`
--

INSERT INTO `pojistenci` (`pojistenci_id`, `jmeno`, `prijmeni`, `ulice`, `mesto`, `psc`, `email`, `telefon`) VALUES
(1, 'Jan', 'Huňař', 'Kpt. Jaroše 1424/15', 'Břeclav', '69002', 'jan.hunar@seznam.cz', '776668900'),
(5, 'Eva', 'Blažková', 'Revoluční 485', 'Tvrdonice', '69153', 'evule.blazkova@seznam.cz', '725894652');

-- --------------------------------------------------------

--
-- Struktura tabulky `pojisteni`
--

CREATE TABLE `pojisteni` (
  `pojisteni_id` int(11) NOT NULL,
  `pojistenec_id` int(11) NOT NULL,
  `pojisteni` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `castka` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `predmet` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `platnost_od` date NOT NULL,
  `platnost_do` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `pojisteni`
--

INSERT INTO `pojisteni` (`pojisteni_id`, `pojistenec_id`, `pojisteni`, `castka`, `predmet`, `platnost_od`, `platnost_do`) VALUES
(3, 1, 'Pojištění majetku', '200000000', 'Dům', '2022-08-18', '2032-08-19'),
(5, 5, 'Auto-pojištění', '123', 'Fabia', '2022-08-20', '2024-08-20');

-- --------------------------------------------------------

--
-- Struktura tabulky `pojistenidruhy`
--

CREATE TABLE `pojistenidruhy` (
  `pojisteni_druhy_id` int(11) NOT NULL,
  `pojisteni_druh` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `pojistenidruhy`
--

INSERT INTO `pojistenidruhy` (`pojisteni_druhy_id`, `pojisteni_druh`) VALUES
(4, 'Auto-pojištění'),
(1, 'Cestovní pojištění'),
(3, 'Důchodové pojištění'),
(2, 'Pojištění majetku'),
(5, 'Úrazové pojištění');

-- --------------------------------------------------------

--
-- Struktura tabulky `uzivatele`
--

CREATE TABLE `uzivatele` (
  `uzivatele_id` int(11) NOT NULL,
  `prihlasovaci_jmeno` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `heslo` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `uzivatele`
--

INSERT INTO `uzivatele` (`uzivatele_id`, `prihlasovaci_jmeno`, `heslo`, `admin`) VALUES
(1, 'janHunar', '$2y$10$n1iMMQQpXZOktJTIAWeXruo5XHzdgGLccmP8Lw5dThg0FAO7lEF5G', 0),
(2, 'admin', '$2y$10$TusdA5lxU.tL2.QLMhxpMOE8sNXHBorAP1Tmj9l5YcfjVy1R7id8q', 1),
(3, 'DavidP', '$2y$10$5sIe/0Je4y/EggDBx4HIS.KfMSutF0xMgDYZEC9H5QgdqlSswQ4xm', 0),
(4, 'JabukZ', '$2y$10$5e4LI1N9Ovk9072it9yKhO6u097FpGPdbCuTB.qs/xbnazENYIZfm', 0),
(8, 'frantaO', '$2y$10$tRqqNUXaRkX4N8PD.iJ1Ie1VA8iWM8.9U.bamcSj8rWaaGt2XVkz6', 0),
(9, 'franta123', '$2y$10$PmeTUSzyma6V4Ndr4kU/uewG9LQt4HRFHCRS.Qap1yQ78GYt7sZmi', 0),
(10, 'fanosh', '$2y$10$MC6Y56eJvRoF2pG61vmU2eeUnHRhUfKHCNsFE.H0I5KXJFJFZm3SG', 0),
(11, 'evaB', '$2y$10$NYE6yGYaLtcflxFWGzcMi.XKhmKmYLf.FMt1rmiPwXBj34rf.n90q', 0),
(12, 'viktorB', '$2y$10$NmA20PJXmVL1OSUuPaMlG.oPaIRpJn94arGpueYxkNsBtMAkDE30O', 0);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `pojistenci`
--
ALTER TABLE `pojistenci`
  ADD PRIMARY KEY (`pojistenci_id`);

--
-- Indexy pro tabulku `pojisteni`
--
ALTER TABLE `pojisteni`
  ADD PRIMARY KEY (`pojisteni_id`);

--
-- Indexy pro tabulku `pojistenidruhy`
--
ALTER TABLE `pojistenidruhy`
  ADD PRIMARY KEY (`pojisteni_druhy_id`),
  ADD UNIQUE KEY `pojisteni_druh` (`pojisteni_druh`);

--
-- Indexy pro tabulku `uzivatele`
--
ALTER TABLE `uzivatele`
  ADD PRIMARY KEY (`uzivatele_id`),
  ADD UNIQUE KEY `prihlasovaci_jmeno` (`prihlasovaci_jmeno`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `pojistenci`
--
ALTER TABLE `pojistenci`
  MODIFY `pojistenci_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pro tabulku `pojisteni`
--
ALTER TABLE `pojisteni`
  MODIFY `pojisteni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pro tabulku `pojistenidruhy`
--
ALTER TABLE `pojistenidruhy`
  MODIFY `pojisteni_druhy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pro tabulku `uzivatele`
--
ALTER TABLE `uzivatele`
  MODIFY `uzivatele_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

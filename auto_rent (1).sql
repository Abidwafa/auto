-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 06 apr 2023 om 09:14
-- Serverversie: 10.4.27-MariaDB
-- PHP-versie: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auto_rent`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `auto_lijst`
--

CREATE TABLE `auto_lijst` (
  `auto_id` int(11) NOT NULL,
  `auto_merk` varchar(255) NOT NULL,
  `auto_model` varchar(255) NOT NULL,
  `kenteken_nummer` varchar(255) NOT NULL,
  `auto_prijs` decimal(6,0) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `auto_lijst`
--

INSERT INTO `auto_lijst` (`auto_id`, `auto_merk`, `auto_model`, `kenteken_nummer`, `auto_prijs`, `foto`) VALUES
(58, '         ', '         ', '         ', '0', 'Screenshot_20230226_031431.png'),
(59, 'Bmw         ', 's_y143         ', '1234         ', '34999', 'Screenshot_20230212_013103.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE `klanten` (
  `klant_id` int(11) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL,
  `telefoo_nr` int(11) NOT NULL,
  `adres` varchar(255) NOT NULL,
  `plaats` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `klanten`
--

INSERT INTO `klanten` (`klant_id`, `voornaam`, `achternaam`, `telefoo_nr`, `adres`, `plaats`, `email`) VALUES
(8, 'khan', 'wafa', 2147483647, 'wester', 'amsterdam', 'abidwafa@gmail.com'),
(9, 'abid', 'wafa', 2147483647, 'westerjh     ', 'amsterdam', 'abidwafa13@gmail.com'),
(10, 'sultan', 'koni', 2147483647, 'wester', 'amsterdam', 'kamran00@live.nl');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medewerker`
--

CREATE TABLE `medewerker` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `medewerker`
--

INSERT INTO `medewerker` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$nVt/hOWDKAIO/HVfjJgOhOWrHfG39LIf0yige4wFEftLZeqm9u6K6');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservering`
--

CREATE TABLE `reservering` (
  `reservering_id` int(11) NOT NULL,
  `van` date NOT NULL,
  `tot` date NOT NULL,
  `auto_id` int(11) DEFAULT NULL,
  `klant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `reservering`
--

INSERT INTO `reservering` (`reservering_id`, `van`, `tot`, `auto_id`, `klant_id`) VALUES
(26, '2023-04-05', '2023-04-06', 58, 10),
(27, '2023-04-05', '2023-04-06', 58, 10);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `auto_lijst`
--
ALTER TABLE `auto_lijst`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexen voor tabel `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`klant_id`);

--
-- Indexen voor tabel `medewerker`
--
ALTER TABLE `medewerker`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `reservering`
--
ALTER TABLE `reservering`
  ADD PRIMARY KEY (`reservering_id`),
  ADD KEY `auto_id` (`auto_id`),
  ADD KEY `klant_id` (`klant_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `auto_lijst`
--
ALTER TABLE `auto_lijst`
  MODIFY `auto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT voor een tabel `klanten`
--
ALTER TABLE `klanten`
  MODIFY `klant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `medewerker`
--
ALTER TABLE `medewerker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `reservering`
--
ALTER TABLE `reservering`
  MODIFY `reservering_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `reservering`
--
ALTER TABLE `reservering`
  ADD CONSTRAINT `reservering_ibfk_1` FOREIGN KEY (`auto_id`) REFERENCES `auto_lijst` (`auto_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservering_ibfk_2` FOREIGN KEY (`klant_id`) REFERENCES `klanten` (`klant_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

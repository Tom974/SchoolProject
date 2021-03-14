-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 14 mrt 2021 om 19:45
-- Serverversie: 10.3.25-MariaDB-0ubuntu0.20.04.1
-- PHP-versie: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gebruikersnaam` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL,
  `telefoonnummer` varchar(255) NOT NULL,
  `geboortedatum` varchar(255) DEFAULT NULL COMMENT 'is nu ff varchar omdat ik gezeik het met date',
  `bsn-nummer` varchar(255) DEFAULT NULL,
  `access` varchar(255) NOT NULL DEFAULT '0' COMMENT 'iknow is varchar en dat het beter een tinyint had kunnen zijn.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`id`, `email`, `gebruikersnaam`, `wachtwoord`, `naam`, `achternaam`, `telefoonnummer`, `geboortedatum`, `bsn-nummer`, `access`) VALUES
(1, 'tommietom12@gmail.com', 'Tom974', '$2y$10$f0pZlAcrEs/iEyAuqS2Mxuta.YhaTmuQjjbZRM2Bxq8uEOGSfLxl2', 'Tom', 'Hartog', '0624254568', '11-03-2003', '35253235', '1');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

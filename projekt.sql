-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2020 at 04:20 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `korisnicko_ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `lozinka` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(4, 'Ivan Luka', 'Špoljar', 'ispoljar', '$2y$10$Eeuq/OQQ9d1yiMw7JNQM4.iHTgS4ddmetZorh4IgesN1i8B4zPV6S', 1),
(5, 'Ivan Luka', 'Špoljar', 'ispoljar@tvz.hr', '$2y$10$HtFR130bHKtUOizxjyadmOavRzNGOBGdDwcsZwGLr5JSTTH5Gf9Oa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `naslov` varchar(64) COLLATE latin2_croatian_ci NOT NULL,
  `sazetak` text COLLATE latin2_croatian_ci NOT NULL,
  `tekst` text COLLATE latin2_croatian_ci NOT NULL,
  `slika` varchar(64) COLLATE latin2_croatian_ci NOT NULL,
  `kategorija` varchar(64) COLLATE latin2_croatian_ci NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(85, '12.06.2020. - 03:59:41', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.  ', '15918960081292.jpg', 'Sport', 0),
(86, '12.06.2020. - 04:02:36', 'Using', 'Lorem Ipsum', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', '15918595692357.jpg', 'Sport', 0),
(87, '12.06.2020. - 04:05:25', 'Alternativni tekst', 'Lorem ipsum', 'Lorem ipsum je alternativni tekst, koji se rabi u kreiranju teksta strukture.', 'Loremipsumcom-Text.png', 'Kultura', 0),
(88, '12.06.2020. - 04:10:57', 'Knjige', 'Dolor sit amet', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'knjige.jpg', 'Kultura', 0),
(89, '12.06.2020. - 04:12:56', 'Lobortis', 'Cras lobortis', 'ras lobortis ullamcorper tortor, in tempus eros lobortis non. ', 'Loremipsumcom-Text.png', 'Kultura', 0),
(90, '12.06.2020. - 04:14:18', 'Varius', 'Sed varius', 'Sed varius eget metus sit amet pulvinar. Cras consectetur cursus\r\n\r\nurna, et euismod odio tincidunt in. Nam vel egestas enim.', 'knjige.jpg', 'Kultura', 0),
(91, '12.06.2020. - 04:16:16', 'Nogomet', 'Quisque vehicula', 'ed blandit elementum justo, quis scelerisque nisl. \r\n\r\nQuisque vehicula, augue ut volutpat iaculis, mi tellus ultricies turpis, vel aliquet nisi diam vel metus.\r\n\r\nFusce et justo elementum, dictum urna ut, consectetur diam.', '15919057788910.jpg', 'Sport', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

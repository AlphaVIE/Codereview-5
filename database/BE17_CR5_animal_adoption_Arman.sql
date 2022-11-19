-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 19. Nov 2022 um 16:02
-- Server-Version: 10.4.21-MariaDB
-- PHP-Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `BE17_CR5_animal_adoption_Arman`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `animals`
--

CREATE TABLE `animals` (
  `animal_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `photo` varchar(350) NOT NULL,
  `location` varchar(100) NOT NULL,
  `size` varchar(8) NOT NULL,
  `age` int(5) NOT NULL,
  `vaccinated` varchar(8) NOT NULL,
  `breed` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `animals`
--

INSERT INTO `animals` (`animal_id`, `name`, `photo`, `location`, `size`, `age`, `vaccinated`, `breed`) VALUES
(1, 'Willi', 'https://www.meerschweinchen-ratgeber.de/portal/images/proxy/75/75a106c3739d04efb7fa176bbde0f73c4e672124.jpg', 'Praterstraße 24', 'small', 3, 'No', 'Guinea-Pig'),
(2, 'Tanky', 'https://www.animals-digital.de/fileadmin/Bilder_und_Fotos/Tiere/Tierbilder/Tierbilder-lustig-2.jpg', 'Ostbahnweg 2', 'small', 14, 'No', 'Turtle'),
(3, 'Ruffy', 'https://media.istockphoto.com/id/507714936/de/foto/nahaufnahme-des-gemischt-breed-affen-zwischen-schimpansen-gattung-und-bonobo-lächeln.jpg?s=612x612&w=0&k=20&c=7XPWbKKl7RJnRq_brhObnrId4ipPuyF21C7tclNDuzw=', 'Hirschstettner Straße 19', 'large', 9, 'Yes', 'Monkey'),
(4, 'Snow', 'https://i.pinimg.com/550x/4b/61/3a/4b613a5dca753295935fec297e68c549.jpg', 'Vorgartenstraße 11', 'small', 1, 'No', 'Bunny'),
(5, 'KitKat', 'https://einfachtierisch.de/media/cache/article_teaser/cms/2015/09/Katze-lacht-in-die-Kamera-shutterstock-Foonia-76562038.jpg?347160', 'Linke Wienzeile 31', 'small', 1, 'Yes', 'Cat'),
(6, 'Freddie', 'https://i.pinimg.com/236x/62/58/3a/62583a4340830ba02b7ad79f94da9216--cute-puppies-cute-dogs.jpg', 'Babenbergerstraße 44', 'small', 2, 'Yes', 'Dog'),
(7, 'Goatie', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Hausziege_04.jpg/1200px-Hausziege_04.jpg', 'Marktplatz 1', 'medium', 11, 'Yes', 'Goat'),
(8, 'Shawn', 'https://media.istockphoto.com/id/182344013/de/foto/schaf.jpg?s=612x612&w=0&k=20&c=TuE51WcDQlxoR1asWDXAAbVmTMYX6ANV7U1ZHKtbRw4=', 'Schwarzenbergplatz 4', 'large', 8, 'Yes', 'Sheep'),
(9, 'Sugar', 'https://img.pixers.pics/pho_wat(s3:700/FO/13/57/84/3/700_FO1357843_424b614e36e28e48e20c597b292452d5.jpg,700,574,cms:2018/10/5bd1b6b8d04b8_220x50-watermark.png,over,480,524,jpg)/seitenschlaferkissen-pomeranian-spitz.jpg.jpg', 'Simmeringer Hauptstraße 16', 'small', 3, 'Yes', 'Dog'),
(10, 'Grumpy', 'https://media.cnn.com/api/v1/images/stellar/prod/190517103414-01-grumpy-cat-file-restricted.jpg?q=w_3000,h_2049,x_0,y_0,c_fill', 'Rechte Wienzeile 73', 'small', 7, 'Yes', 'Cat');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(75) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `picture` varchar(350) NOT NULL,
  `password` varchar(64) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `picture`, `password`, `status`) VALUES
(1, 'Arman', 'Nour', 'arman.sarrafi28@gmail.com', 123456, 'Simmering', 'https://img.br.de/755e174e-5fb3-4e56-ae20-3f77023fd905.jpeg?width=525&amp;q=85', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'adm'),
(3, 'Arman', 'Sarrafi', 'wien@gmail.com', 123456, 'Wien', 'https://img.br.de/755e174e-5fb3-4e56-ae20-3f77023fd905.jpeg?width=525&amp;q=85', 'e0bc60c82713f64ef8a57c0c40d02ce24fd0141d5cc3086259c19b1e62a62bea', 'user');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animal_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `animals`
--
ALTER TABLE `animals`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

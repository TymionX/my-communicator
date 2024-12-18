-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2024 at 05:33 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktura tabeli dla tabeli `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `id_rozmowy` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `tresc` text NOT NULL,
  `id_nadawcy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `id_rozmowy`, `data`, `tresc`, `id_nadawcy`) VALUES
(105, 2, '2024-12-18 17:05:59', 'witaj,. teście, jestem UWUsny', 5),
(106, 2, '2024-12-18 17:06:19', 'witaj uwu. jestem test', 1),
(107, 2, '2024-12-18 17:27:47', 'eeeeee', 5),
(108, 1, '2024-12-18 17:28:37', 'witaj tymku', 5),
(109, 1, '2024-12-18 17:29:00', 'witaj także', 3),
(110, 2, '2024-12-18 17:29:27', 'testtesta', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `messages_test`
--

CREATE TABLE `messages_test` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `tresc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages_test`
--

INSERT INTO `messages_test` (`id`, `id_users`, `tresc`) VALUES
(1, 1, 'hihihiha'),
(2, 2, 'allahakbar!');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rozmowa`
--

CREATE TABLE `rozmowa` (
  `id` int(11) NOT NULL,
  `id_rozmowca1` int(11) NOT NULL,
  `id_rozmowca2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rozmowa`
--

INSERT INTO `rozmowa` (`id`, `id_rozmowca1`, `id_rozmowca2`) VALUES
(1, 3, 5),
(2, 1, 5),
(3, 4, 5),
(4, 6, 7),
(5, 6, 8),
(7, 7, 8);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'test', 'test'),
(2, 'Test2', 'test'),
(3, 'tymek', '1234'),
(4, 'ubuntu', '1234'),
(5, 'uwu', 'uwu'),
(6, 'user1', 'user1'),
(7, 'user2', 'user2'),
(8, 'user3', 'user3');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `rozmowa`
--
ALTER TABLE `rozmowa`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `rozmowa`
--
ALTER TABLE `rozmowa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

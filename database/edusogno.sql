-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 03, 2023 at 01:02 PM
-- Server version: 5.7.24
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edusogno`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `attendees` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `attendees`, `description`) VALUES
(1, 'Edusogno', 'ulysses200915@varen8.com, qmonkey14@falixiao.com, mavbafpcmq@hitbase.net', 'Non lo so'),
(2, 'GitHub', 'ulysses200915@varen8.com', 'Github è qualcosa di strepitosooooo'),
(3, 'VsCode', 'dgipolga@edume.me , mavbafpcmq@hitbase.net', 'Giuro lo amo'),
(4, 'Atom', 'qmonkey14@falixiao.com', 'Mi fa proprio schiiiifooo'),
(5, 'Steam', 'dgipolga@edume.me , ulysses200915@varen8.com', 'Miglior launcher non esiste'),
(6, 'Slack', 'mavbafpcmq@hitbase.net', 'Mooolto moolto utile');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `reset_token_hash`, `reset_token_expires_at`) VALUES
(1, 'Marco Rossi', 'ulysses200915@varen8.com', '$2y$10$yQ8p3RsEvDe7FcRDCeZQWO064rF5DH2ix/2g3RPOFZzRJWmhMoW8e', NULL, NULL),
(2, 'Filippo D\'Amelio', 'qmonkey14@falixiao.com', '$2y$10$34ApOK31LZeHzmQYeQw6i.siRLsqOQVHVOqyEMwGVHAjGkEee4yKa', NULL, NULL),
(3, 'Gian Luca Carta', 'mavbafpcmq@hitbase.net', '$2y$10$NrPNETXESMD9PU/qIYwr3OzTw2Yzy/pEODLu/jVQuTzGmdDmrhn1O', NULL, NULL),
(4, 'Stella De Grandis', 'dgipolga@edume.me', '$2y$10$44ni8LQxL5eWW2K/bYSZR.99x35NFMCIBeqE6LP74EnS7mbnXq0Di', NULL, NULL),
(5, 'admin', 'admin@gmail.com', '$2y$10$reiCMlX7PIhEen9Je3i4sejGJBPmArjmM3fvsywDB8G4sASf5fkvG', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1-4.fc40
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 26, 2024 at 03:52 PM
-- Server version: 10.11.9-MariaDB
-- PHP Version: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `titre` text NOT NULL,
  `contenu` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`titre`, `contenu`, `id`) VALUES
('Article 1', 'Super article 1, dans cet article on va voir Andy', 1),
('Article 2', 'Super article 2, dand cet article on va voir Mathis', 2);

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE `commentaires` (
  `id_article` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `auteur` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`id_article`, `contenu`, `auteur`, `date`) VALUES
(1, '&lt;script&gt;console.log(&#039;XSS&#039;)&lt;/script&gt;', 'guillome.mignon@gmail.com', '2024-10-23'),
(2, 'Super, j&#039;adore votre contenu, continuez comme ça', 'guillome.mignon@gmail.com', '2024-10-23'),
(2, '&#039;&#039;&#039;&#039;', 'guillome.mignon@gmail.com', '2024-10-23'),
(1, 'Saut', 'guillome.mignon@gmail.com', '2024-10-23'),
(1, 'test', 'andy@test.com', '2024-11-26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `user_id`) VALUES
('Guillome', '$2y$10$SHfF5Y9cXfwDKErvFTk6cen.t70yxwTlsxuDXWqzpV2pL60IxXeTO', 'guillome.mignon@gmail.com', 1),
('Andy', '$2y$10$Ns3nrbqYgIu4kWRcim5bBOWMaWq6k45ZBOYW3tczsXtw5OwT0IfTy', 'andy@test.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

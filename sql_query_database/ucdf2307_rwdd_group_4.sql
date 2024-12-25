-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2024 at 12:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ucdf2307_rwdd_group_4`
--

-- --------------------------------------------------------

--
-- Table structure for table `css_quiz_answers`
--

CREATE TABLE `css_quiz_answers` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `date_attempted` varchar(200) NOT NULL,
  `q1_answer` varchar(200) NOT NULL,
  `q2_answer` varchar(200) NOT NULL,
  `q3_answer` varchar(200) NOT NULL,
  `q4_answer` varchar(200) NOT NULL,
  `q5_answer` varchar(200) NOT NULL,
  `q6_answer` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `html_quiz_answers`
--

CREATE TABLE `html_quiz_answers` (
  `id` int(11) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `date_attempted` varchar(200) NOT NULL,
  `q1_answer` varchar(200) NOT NULL,
  `q2_answer` varchar(200) NOT NULL,
  `q3_answer` varchar(200) NOT NULL,
  `q4_answer` varchar(200) NOT NULL,
  `q5_answer` varchar(200) NOT NULL,
  `q6_answer` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `date_created` varchar(200) NOT NULL,
  `date_modified` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `gender`, `country`, `is_admin`, `date_created`, `date_modified`) VALUES
(1, '', '', 'test@test.com', 'test', '', 'Malaysia', 1, '2024/12/23 04:11:09 am', ''),
(37, '', '', 'testes@fesfes.com', 'fmesfioems', '', 'Malaysia', 0, '2024/12/23 04:56:51 am', ''),
(38, '', '', 'test@test.com', 'testestestset', '', 'Malaysia', 0, '2024/12/23 04:57:30 am', ''),
(39, '', '', '123@test.com', 'test', '', 'Malaysia', 0, '2024/12/24 11:13:01 pm', ''),
(40, '', '', '123@test.com', 'utu35378957325', '', 'Malaysia', 0, '2024/12/24 11:14:28 pm', ''),
(41, '', '', 'test123@gmail.com', '1234567890', '', 'Malaysia', 0, '2024/12/24 11:17:46 pm', ''),
(80, '', '', 'test@test.com', 'test3213214214', '', 'Malaysia', 0, '2024/12/24 11:36:44 pm', ''),
(81, '', '', 'test@test.com', 'test3213214214', '', 'Malaysia', 0, '2024/12/24 11:37:23 pm', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `css_quiz_answers`
--
ALTER TABLE `css_quiz_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `html_quiz_answers`
--
ALTER TABLE `html_quiz_answers`
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
-- AUTO_INCREMENT for table `css_quiz_answers`
--
ALTER TABLE `css_quiz_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `html_quiz_answers`
--
ALTER TABLE `html_quiz_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

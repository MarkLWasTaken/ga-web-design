-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2024 at 02:40 PM
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
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_us_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date_submitted` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `css_quiz_answers`
--

CREATE TABLE `css_quiz_answers` (
  `css_quiz_answers_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `date_attempted` varchar(200) NOT NULL,
  `date_submitted` varchar(200) NOT NULL,
  `q1_answer` varchar(200) NOT NULL,
  `q2_answer` varchar(200) NOT NULL,
  `q3_answer` varchar(200) NOT NULL,
  `q4_answer` varchar(200) NOT NULL,
  `q5_answer` varchar(200) NOT NULL,
  `q6_answer` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `donation_id` int(11) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `bank_account_number` int(20) NOT NULL,
  `amount_donated` int(15) NOT NULL,
  `date_submitted` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `html_quiz_answers`
--

CREATE TABLE `html_quiz_answers` (
  `html_quiz_answers_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `date_attempted` varchar(200) NOT NULL,
  `date_submitted` varchar(200) NOT NULL,
  `q1_answer` varchar(200) NOT NULL,
  `q2_answer` varchar(200) NOT NULL,
  `q3_answer` varchar(200) NOT NULL,
  `q4_answer` varchar(200) NOT NULL,
  `q5_answer` varchar(200) NOT NULL,
  `q6_answer` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mailing_list`
--

CREATE TABLE `mailing_list` (
  `mailing_list_id` int(11) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `is_subscribed` tinyint(1) NOT NULL,
  `date_first_subscribed` varchar(200) NOT NULL,
  `date_modified` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email_address` varchar(200) NOT NULL,
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

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email_address`, `password`, `gender`, `country`, `is_admin`, `date_created`, `date_modified`) VALUES
(1, '', '', 'test@test.com', 'test', '', 'Malaysia', 1, '2024/12/23 04:11:09 am', ''),
(37, '', '', 'test2@test.com', 'fmesfioems', '', 'Malaysia', 0, '2024/12/23 04:56:51 am', ''),
(38, '', '', 'test3@test.com', 'testestestset', '', 'Malaysia', 0, '2024/12/23 04:57:30 am', ''),
(39, '', '', 'test4@test.com', 'test', '', 'Malaysia', 0, '2024/12/24 11:13:01 pm', ''),
(40, '', '', 'test5@test.com', 'utu35378957325', '', 'Malaysia', 0, '2024/12/24 11:14:28 pm', ''),
(41, '', '', 'test6@gmail.com', '1234567890', '', 'Malaysia', 0, '2024/12/24 11:17:46 pm', ''),
(80, '', '', 'test7@test.com', 'test3213214214', '', 'Malaysia', 0, '2024/12/24 11:36:44 pm', ''),
(81, '', '', 'test8@test.com', 'test3213214214', '', 'Malaysia', 0, '2024/12/24 11:37:23 pm', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_us_id`);

--
-- Indexes for table `css_quiz_answers`
--
ALTER TABLE `css_quiz_answers`
  ADD PRIMARY KEY (`css_quiz_answers_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`donation_id`);

--
-- Indexes for table `html_quiz_answers`
--
ALTER TABLE `html_quiz_answers`
  ADD PRIMARY KEY (`html_quiz_answers_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `mailing_list`
--
ALTER TABLE `mailing_list`
  ADD PRIMARY KEY (`mailing_list_id`),
  ADD KEY `email_address` (`email_address`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email_address` (`email_address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_us_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `css_quiz_answers`
--
ALTER TABLE `css_quiz_answers`
  MODIFY `css_quiz_answers_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `html_quiz_answers`
--
ALTER TABLE `html_quiz_answers`
  MODIFY `html_quiz_answers_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mailing_list`
--
ALTER TABLE `mailing_list`
  MODIFY `mailing_list_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `css_quiz_answers`
--
ALTER TABLE `css_quiz_answers`
  ADD CONSTRAINT `css_quiz_answers_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `html_quiz_answers`
--
ALTER TABLE `html_quiz_answers`
  ADD CONSTRAINT `html_quiz_answers_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `mailing_list`
--
ALTER TABLE `mailing_list`
  ADD CONSTRAINT `mailing_list_ibfk_1` FOREIGN KEY (`email_address`) REFERENCES `users` (`email_address`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

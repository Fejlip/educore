-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2020 at 11:18 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librus`
--

-- --------------------------------------------------------

--
-- Table structure for table `absences`
--

CREATE TABLE `absences` (
  `id` int(11) NOT NULL COMMENT 'Identyfikator nieobecności',
  `student_id` int(11) NOT NULL COMMENT 'Identyfikator ucznia',
  `subject_id` int(11) NOT NULL COMMENT 'Identyfikator przedmiotu',
  `teacher_id` int(11) NOT NULL COMMENT 'Identyfikator nauczyciela',
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Data nieobecności',
  `excused` tinyint(1) NOT NULL COMMENT 'Czy usprawiedliwiona',
  `delegation` tinyint(1) NOT NULL COMMENT 'Czy uczeń był na delegacji'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL COMMENT 'Identyfikator dnia w kalendarzu',
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Data',
  `description` text NOT NULL COMMENT 'Opis dnia',
  `is_day_off` tinyint(1) NOT NULL COMMENT 'Czy dzień jest wolny'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL COMMENT 'Identyfikator klasy',
  `name` varchar(4) NOT NULL COMMENT 'Nazwa klasy',
  `teacher_id` int(11) NOT NULL COMMENT 'Identyfikator wychowawcy klasy'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL COMMENT 'Identyfikator pracownika',
  `user_id` int(11) NOT NULL COMMENT 'Identyfikator użytkownika'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL COMMENT 'Identyfikator oceny',
  `student_id` int(11) NOT NULL COMMENT 'Identyfikator ucznia',
  `subject_id` int(11) NOT NULL COMMENT 'Identyfikator przedmiotu',
  `value` int(11) NOT NULL COMMENT 'Ocena',
  `weight` float NOT NULL COMMENT 'Waga oceny',
  `description` text NOT NULL COMMENT 'Opis oceny',
  `date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Data wystawienia',
  `teacher_id` int(11) NOT NULL COMMENT 'Identyfikator nauczyciela'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hours`
--

CREATE TABLE `hours` (
  `id` int(11) NOT NULL COMMENT 'Identyfikator godziny',
  `start` text NOT NULL COMMENT 'Godzina rozpoczęcia lekcji',
  `end` text NOT NULL COMMENT 'Godzina zakończenia lekcji'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL COMMENT 'Identyfikator lekcji',
  `hour_id` int(11) NOT NULL COMMENT 'Identyfikator godziny lekcyjnej (kiedy się odbywa)',
  `room_id` int(11) NOT NULL COMMENT 'Identyfikator sali',
  `teacher_id` int(11) NOT NULL COMMENT 'Identyfikator nauczyciela',
  `class_id` int(11) NOT NULL COMMENT 'Identyfikator klasy',
  `group_id` int(11) NOT NULL COMMENT 'Identyfikator grupy',
  `subject_id` int(11) NOT NULL COMMENT 'Identyfikator przedmiotu'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL COMMENT 'Identyfikator wiadomości',
  `date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Data wiadomości',
  `sender_id` int(11) NOT NULL COMMENT 'Identyfikator wysyłającego',
  `recipients_id` text NOT NULL COMMENT 'Identyfikatory odbiorców (oddzielone przecinkami), -1 = wszyscy',
  `recipients_id_read` text NOT NULL COMMENT 'Identyfikatory odbiorców, którzy odczytali wiadomość',
  `content` text NOT NULL COMMENT 'Treść wiadomości'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `metadata`
--

CREATE TABLE `metadata` (
  `school_name` text COLLATE utf16_polish_ci NOT NULL,
  `street_name` text COLLATE utf16_polish_ci NOT NULL,
  `street_nr` text COLLATE utf16_polish_ci NOT NULL,
  `zip_code` text COLLATE utf16_polish_ci NOT NULL,
  `city_name` text COLLATE utf16_polish_ci NOT NULL,
  `nip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_polish_ci;

--
-- Dumping data for table `metadata`
--

INSERT INTO `metadata` (`school_name`, `street_name`, `street_nr`, `zip_code`, `city_name`, `nip`) VALUES
('Szczecińskie Collegium Informatyczne', 'Mazowiecka', '13', '71-899', 'Szczecin', 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL COMMENT 'Identyfikator uprawnienia',
  `name` text NOT NULL COMMENT 'Nazwa uprawnienia (definiowana np. users.read)',
  `description` text NOT NULL COMMENT 'Opis uprawnienia'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL COMMENT 'Identyfikator sali',
  `number` int(11) NOT NULL COMMENT 'Numer sali'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL COMMENT 'Identyfikator ucznia',
  `user_id` int(11) NOT NULL COMMENT 'Identyfikator użytkownika',
  `class_id` int(11) NOT NULL COMMENT 'Identyfikator klasy',
  `group_id` int(11) NOT NULL COMMENT 'Identyfikator grupy'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL COMMENT 'Identyfikator przedmiotu',
  `name` text NOT NULL COMMENT 'Nazwa przedmiotu'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL COMMENT 'Identyfikator nauczyciela',
  `user_id` int(11) NOT NULL COMMENT 'Identyfikator użytkownika'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'Identyfikator użytkownika',
  `login` text NOT NULL COMMENT 'Login użytkownika',
  `password` text NOT NULL COMMENT 'Hasło użytkownika',
  `email` text NOT NULL COMMENT 'Email użytkownika',
  `name` text NOT NULL COMMENT 'Imię',
  `surname` text NOT NULL COMMENT 'Nazwisko',
  `permissions` text NOT NULL COMMENT 'Uprawnienia (zapisane w tablicy, oddzielone przecinkami)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `name`, `surname`, `permissions`) VALUES
(10, 'aa', '$2y$10$PuDqyDLFS/8SMGHp8eOuweYEzM0wcaGt4KWRcGkfi.1Gwbtep6TzW', 'a@a.pl', 'a', 'a', ''),
(11, 'aa', '$2y$10$fnKvCMgg33d5SHQM22fzgevZyLe7vLIL2fTVyrIZfTCbYqL18hZf2', 'a@a.pl', 'a', 'a', ''),
(12, 'aa', '$2y$10$J7F1mfL.pI8YhgbYm3JH9usmft45A3IWy.VGDPMKFNVUasub3PXH.', 'a@a.pl', 'a', 'a', ''),
(13, 'aa', '$2y$10$BMCa1ZPjel1KMXzzkbVYyebKFXHcRVq0K1A2.dEchdGvtNhpkQjRy', 'a@a.pl', 'a', 'a', ''),
(14, 'filip', '$2y$10$c0RLNl18nyg1E/kAfqK29epBKqEDyw1o2Bm19U3b6SHBhe3i87Evy', 'fh@fh.pl', 'filip', 'filip', ''),
(16, 'bb', '$2y$10$t8IGNKSyfGzxvNDwMRez2OxL12b87m3xtE20r2EDRhkFyBS8qxMoK', 'bb@bb.pl', 'bb', 'bb', ''),
(17, 'cc', '$2y$10$tCtq.Epoll4FKqVEN4lIG.MuaU8yjZJg.zWBUlxtpY0ktg09opCzW', 'cc@cc.pl', 'cc', 'cc', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absences`
--
ALTER TABLE `absences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hours`
--
ALTER TABLE `hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
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
-- AUTO_INCREMENT for table `absences`
--
ALTER TABLE `absences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identyfikator nieobecności';

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identyfikator dnia w kalendarzu';

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identyfikator klasy';

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identyfikator pracownika';

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identyfikator oceny';

--
-- AUTO_INCREMENT for table `hours`
--
ALTER TABLE `hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identyfikator godziny';

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identyfikator lekcji';

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identyfikator wiadomości';

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identyfikator uprawnienia';

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identyfikator sali';

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identyfikator ucznia';

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identyfikator przedmiotu';

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identyfikator nauczyciela';

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identyfikator użytkownika', AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

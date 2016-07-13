-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2016 at 12:58 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `komsai`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes_student`
--

CREATE TABLE IF NOT EXISTS `classes_student` (
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes_student`
--

INSERT INTO `classes_student` (`class_id`, `user_id`, `status`) VALUES
(1, 6, 1),
(3, 6, 1),
(5, 6, 0),
(6, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `class_announcements`
--

CREATE TABLE IF NOT EXISTS `class_announcements` (
  `class_id` int(11) NOT NULL,
  `announcement_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class_files`
--

CREATE TABLE IF NOT EXISTS `class_files` (
  `class_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `filename` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class_offerings`
--

CREATE TABLE IF NOT EXISTS `class_offerings` (
  `class_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `schedule` int(11) NOT NULL,
  `room_assignment` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `faculty_number` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `security_key` varchar(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_offerings`
--

INSERT INTO `class_offerings` (`class_id`, `year`, `semester`, `schedule`, `room_assignment`, `section`, `faculty_number`, `subject_id`, `security_key`) VALUES
(1, 2016, 2, 0, 0, 1, 0, 1, ''),
(3, 2017, 2, 0, 0, 2, 0, 2, ''),
(4, 2016, 2, 0, 0, 0, 0, 1, ''),
(5, 2016, 1, 0, 0, 1, 0, 3, '12345678'),
(6, 2016, 1, 0, 0, 0, 0, 4, '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `contact_numbers`
--

CREATE TABLE IF NOT EXISTS `contact_numbers` (
  `contact_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contact_number` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `user_id` int(11) NOT NULL,
  `faculty_number` int(11) NOT NULL,
  `upv_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `user_id` int(11) NOT NULL,
  `student_number` int(11) NOT NULL,
  `year_level` int(11) NOT NULL,
  `home_address` varchar(255) NOT NULL,
  `upv_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject_offerings`
--

CREATE TABLE IF NOT EXISTS `subject_offerings` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_title` varchar(255) NOT NULL,
  `unit` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_offerings`
--

INSERT INTO `subject_offerings` (`subject_id`, `subject_name`, `subject_title`, `unit`) VALUES
(1, 'CMSC 11', 'Introduction to Computer Science', 3),
(2, 'CMSC 21', 'Introduction to Computer Science 2', 3),
(3, 'CMSC 22', 'Fundamentals of Object-oriented Programming', 3),
(4, 'CMSC 123', 'Data Structures and Algorithms', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usertype_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `filename` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `filetype` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `email`, `password`, `usertype_id`, `remember_token`, `created_at`, `updated_at`, `filename`, `filetype`) VALUES
(5, 'Anfernee', 'Something', 'Sodusta', 'asodusta@komsai.com', '$2y$10$78bhgYd77t/oNdLBowriFuuM5NlXVycXH8QLWMYVacaZ/oc1zKMZu', 0, NULL, '2016-05-12 15:01:28', '2016-05-12 15:01:28', '', ''),
(6, 'Jessica Marie', 'C', 'Valderrama', 'jvalderrama@komsai.org', '$2y$10$wzFtPOwG7LdDQZgaGXOqwe4Ngy.s7qizFVXFUqXU7sDozLfGObeKm', 1, 'myBt4R9Aymsj7ijY1FtBDG77pI4FG3ysbM3DrFuNXIWGN48poDK59RMn64Gw', '2016-05-12 15:45:13', '2016-05-14 01:30:54', '', ''),
(7, 'Jason', 'Deloy', 'Bajade', 'jbajade@komsai.org', '$2y$10$tDLkJmijRvCagOBZ.i7PGeFv8AnuIKZPdGVnXERwgBMDWptLjEpvy', 1, 'f4LWNiNLJq6tR5GOBNrvOP1pZg3XHCAo6Ob8ZFAX8mNfgv9ux5yAAqZiQl8n', '2016-05-12 15:59:47', '2016-05-12 15:59:57', '', ''),
(8, 'Chrevic', 'Josef', 'Dangan', 'cdangan@komsai.org', '$2y$10$EA33oXB4h23KsDMuORVMmu92qZkQEM/BEIT7vDZ4MBAgBMoaELFJa', 2, 'J54EIpOZB2Ibya7Q1gl8HUiUrQti8B7NPxz8Gvyw3tNYp57rLbviEly6Vefl', '2016-05-13 06:42:39', '2016-05-13 08:35:25', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE IF NOT EXISTS `user_types` (
  `usertype_id` int(11) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`usertype_id`, `user_type`) VALUES
(1, 'student'),
(2, 'faculty'),
(3, 'alumni');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes_student`
--
ALTER TABLE `classes_student`
  ADD PRIMARY KEY (`class_id`,`user_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `class_announcements`
--
ALTER TABLE `class_announcements`
  ADD PRIMARY KEY (`class_id`,`announcement_id`);

--
-- Indexes for table `class_files`
--
ALTER TABLE `class_files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `class_offerings`
--
ALTER TABLE `class_offerings`
  ADD PRIMARY KEY (`class_id`,`faculty_number`,`subject_id`), ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `contact_numbers`
--
ALTER TABLE `contact_numbers`
  ADD PRIMARY KEY (`contact_id`,`user_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`user_id`,`faculty_number`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`user_id`,`student_number`);

--
-- Indexes for table `subject_offerings`
--
ALTER TABLE `subject_offerings`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`usertype_id`), ADD UNIQUE KEY `users_email_unique` (`email`), ADD KEY `usertype_id` (`usertype_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`usertype_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_files`
--
ALTER TABLE `class_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class_offerings`
--
ALTER TABLE `class_offerings`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `contact_numbers`
--
ALTER TABLE `contact_numbers`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subject_offerings`
--
ALTER TABLE `subject_offerings`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `usertype_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes_student`
--
ALTER TABLE `classes_student`
ADD CONSTRAINT `classes_student_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class_offerings` (`class_id`),
ADD CONSTRAINT `classes_student_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `class_announcements`
--
ALTER TABLE `class_announcements`
ADD CONSTRAINT `class_announcements_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class_offerings` (`class_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `class_offerings`
--
ALTER TABLE `class_offerings`
ADD CONSTRAINT `class_offerings_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject_offerings` (`subject_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

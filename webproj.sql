-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2024 at 01:13 AM
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
-- Database: `webproj`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `genre`, `year`, `image`) VALUES
(1, 'Web Technology', 'Jagadish Bhatta', 'CSIT / BCA', 2024, '../images/IMG20240811152326.jpg'),
(2, 'Design & Analysis Of Algorithm', 'Arjun Singh Saud', 'Bsc.CSIT / BCA / BIM', 2022, '../images/IMG20240811152320.jpg'),
(3, 'Cryptography', 'Ramesh Singh Saud', 'CSIT / BCA', 2024, '../images/IMG20240811152323.jpg'),
(4, 'Simulation & Modeling', 'Er Santosh Dhungana', 'Bsc CSIT / BCA', 2024, '../images/IMG20240811152333.jpg'),
(5, 'System Analysis & Design', 'Bhupendra Singh Saud', 'BCA / CSIT', 2023, '../images/IMG20240811152313.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'anishregmi', 'anishregmi@gmail.com', '$2y$10$IyKoJJBDz10DApIXRjpbR.44xZR4y9hbRrpI9ndIgsDiM9HJRukzy', '2024-08-10 22:45:07'),
(2, 'anita', 'anita@gmail.com', '$2y$10$r7C9d1ZOIAFviWNtDmJcr.6EXsZ2s5BcJudCbIQvXBKlCZjyEvu3e', '2024-08-10 23:26:17'),
(3, 'anishregmi', 'anish@gmail.com', '$2y$10$nq1IXZ5AW7.dgDpCFWIrjelkjTRN9vs0hoysFGUMo7yFPYt.FaSy2', '2024-08-11 21:38:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2020 at 10:25 AM
-- Server version: 5.7.28
-- PHP Version: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `99xt_store_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200508201314', '2020-05-10 05:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `xt_book`
--

CREATE TABLE `xt_book` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `xt_book`
--

INSERT INTO `xt_book` (`id`, `name`, `description`, `cover`, `price`, `created_at`) VALUES
(1, 'Fundamentals of Wavelets', 'Author: Goswami, Jaideva<br>Genre: signal_processing<br>Publisher: Wiley<br>', 'covers/cover1.jpg', '1000', '2020-05-10 07:40:45'),
(2, 'Data Smart', 'Author: Foreman, John<br>Genre: data_science<br>Publisher: Wiley<br>', 'covers/cover2.jpg', '500', '2020-05-10 07:40:45'),
(3, 'God Created the Integers', 'Author: Hawking, Stephen<br>Genre: mathematics<br>Publisher: Penguin<br>', 'covers/cover3.jpg', '300', '2020-05-10 07:40:45'),
(4, 'Superfreakonomics', 'Author: Dubner, Stephen<br>Genre: economics<br>Publisher: HarperCollins<br>', 'covers/cover4.jpg', '800', '2020-05-10 07:40:45'),
(5, 'Orientalism', 'Author: Said, Edward<br>Genre: history<br>Publisher: Penguin<br>', 'covers/cover5.jpg', '2000', '2020-05-10 07:40:45'),
(6, 'Nature of Statistical Learning Theory, The', 'Author: Vapnik, Vladimir<br>Genre: data_science<br>Publisher: Springer<br>', 'covers/cover6.jpg', '350', '2020-05-10 07:40:45'),
(7, 'Integration of the Indian States', 'Author: Menon, V P<br>Genre: history<br>Publisher: Orient Blackswan<br>', 'covers/cover7.jpg', '1280', '2020-05-10 07:40:45'),
(8, 'Drunkard\'s Walk, The', 'Author: Mlodinow, Leonard<br>Genre: science<br>Publisher: Penguin<br>', 'covers/cover8.jpg', '2300', '2020-05-10 07:40:45'),
(9, 'Image Processing & Mathematical Morphology', 'Author: Shih, Frank<br>Genre: signal_processing<br>Publisher: CRC<br>', 'covers/cover9.jpg', '1200', '2020-05-10 07:40:45'),
(10, 'How to Think Like Sherlock Holmes', 'Author: Konnikova, Maria<br>Genre: psychology<br>Publisher: Penguin<br>', 'covers/cover10.jpg', '1000', '2020-05-10 07:40:45'),
(11, 'Data Scientists at Work', 'Author: Sebastian Gutierrez<br>Genre: data_science<br>Publisher: Apress<br>', 'covers/cover11.jpg', '900', '2020-05-10 07:40:45'),
(12, 'Slaughterhouse Five', 'Author: Vonnegut, Kurt<br>Genre: fiction<br>Publisher: Random House<br>', 'covers/cover12.jpg', '800', '2020-05-10 07:40:45'),
(13, 'Birth of a Theorem', 'Author: Villani, Cedric<br>Genre: mathematics<br>Publisher: Bodley Head<br>', 'covers/cover13.jpg', '700', '2020-05-10 07:40:45'),
(14, 'Structure & Interpretation of Computer Programs', 'Author: Sussman, Gerald<br>Genre: computer_science<br>Publisher: MIT Press<br>', 'covers/cover14.jpg', '500', '2020-05-10 07:40:45'),
(15, 'Age of Wrath, The', 'Author: Eraly, Abraham<br>Genre: history<br>Publisher: Penguin<br>', 'covers/cover15.jpg', '550', '2020-05-10 07:40:45'),
(16, 'Trial, The', 'Author: Kafka, Frank<br>Genre: fiction<br>Publisher: Random House<br>', 'covers/cover16.jpg', '1000', '2020-05-10 07:40:45'),
(17, 'Statistical Decision Theory\'', 'Author: Pratt, John<br>Genre: data_science<br>Publisher: MIT Press<br>', 'covers/cover17.jpg', '1100', '2020-05-10 07:40:45'),
(18, 'Data Mining Handbook', 'Author: Nisbet, Robert<br>Genre: data_science<br>Publisher: Apress<br>', 'covers/cover18.jpg', '1200', '2020-05-10 07:40:45'),
(19, 'New Machiavelli, The', 'Author: Wells, H. G.<br>Genre: fiction<br>Publisher: Penguin<br>', 'covers/cover19.jpg', '1300', '2020-05-10 07:40:45'),
(20, 'Physics & Philosophy', 'Author: Heisenberg, Werner<br>Genre: science<br>Publisher: Penguin<br>', 'covers/cover20.jpg', '1400', '2020-05-10 07:40:45'),
(21, 'Making Software', 'Author: Oram, Andy<br>Genre: computer_science<br>Publisher: O\'Reilly<br>', 'covers/cover21.jpg', '900', '2020-05-10 07:40:45'),
(22, 'Analysis, Vol I', 'Author: Tao, Terence<br>Genre: mathematics<br>Publisher: HBA<br>', 'covers/cover22.jpg', '300', '2020-05-10 07:40:45'),
(23, 'Machine Learning for Hackers', 'Author: Conway, Drew<br>Genre: data_science<br>Publisher: O\'Reilly<br>', 'covers/cover23.jpg', '480', '2020-05-10 07:40:45'),
(24, 'Signal and the Noise, The', 'Author: Silver, Nate<br>Genre: data_science<br>Publisher: Penguin<br>', 'covers/cover24.jpg', '1120', '2020-05-10 07:40:45'),
(25, 'Python for Data Analysis', 'Author: McKinney, Wes<br>Genre: data_science<br>Publisher: O\'Reilly<br>', 'covers/cover25.jpg', '920', '2020-05-10 07:40:45'),
(26, 'Introduction to Algorithms', 'Author: Cormen, Thomas<br>Genre: computer_science<br>Publisher: MIT Press<br>', 'covers/cover26.jpg', '2300', '2020-05-10 07:40:45'),
(27, 'Beautiful and the Damned, The', 'Author: Deb, Siddhartha<br>Genre: nonfiction<br>Publisher: Penguin<br>', 'covers/cover27.jpg', '5200', '2020-05-10 07:40:45'),
(28, 'Outsider, The', 'Author: Camus, Albert<br>Genre: fiction<br>Publisher: Penguin<br>', 'covers/cover28.jpg', '850', '2020-05-10 07:40:45'),
(29, 'Complete Sherlock Holmes, The - Vol I', 'Author: Doyle, Arthur Conan<br>Genre: fiction<br>Publisher: Random House<br>', 'covers/cover29.jpg', '2300', '2020-05-10 07:40:45'),
(30, 'Complete Sherlock Holmes, The - Vol II', 'Author: Doyle, Arthur Conan<br>Genre: fiction<br>Publisher: Random House<br>', 'covers/cover30.jpg', '3100', '2020-05-10 07:40:45'),
(31, 'Wealth of Nations, The', 'Author: Smith, Adam<br>Genre: economics<br>Publisher: Random House<br>', 'covers/cover31.jpg', '850', '2020-05-10 07:40:45'),
(32, 'Pillars of the Earth, The', 'Author: Follett, Ken<br>Genre: fiction<br>Publisher: Random House<br>', 'covers/cover32.jpg', '2000', '2020-05-10 07:40:45'),
(33, 'Mein Kampf', 'Author: Hitler, Adolf<br>Genre: nonfiction<br>Publisher: Rupa<br>', 'covers/cover33.jpg', '3450', '2020-05-10 07:40:45'),
(34, 'Tao of Physics, The', 'Author: Capra, Fritjof<br>Genre: science<br>Publisher: Penguin<br>', 'covers/cover34.jpg', '2350', '2020-05-10 07:40:45'),
(35, 'Surely You\'re Joking Mr Feynman', 'Author: Feynman, Richard<br>Genre: science<br>Publisher: Random House<br>', 'covers/cover35.jpg', '1200', '2020-05-10 07:40:45'),
(36, 'Farewell to Arms, A', 'Author: Hemingway, Ernest<br>Genre: fiction<br>Publisher: Rupa<br>', 'covers/cover36.jpg', '1100', '2020-05-10 07:40:45'),
(37, 'Veteran, The', 'Author: Forsyth, Frederick<br>Genre: fiction<br>Publisher: Transworld<br>', 'covers/cover37.jpg', '950', '2020-05-10 07:40:45'),
(38, 'False Impressions', 'Author: Archer, Jeffery<br>Genre: fiction<br>Publisher: Pan<br>', 'covers/cover38.jpg', '875', '2020-05-10 07:40:45'),
(39, 'Last Lecture, The', 'Author: Pausch, Randy<br>Genre: nonfiction<br>Publisher: Hyperion<br>', 'covers/cover39.jpg', '450', '2020-05-10 07:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `xt_book_xt_category`
--

CREATE TABLE `xt_book_xt_category` (
  `xt_book_id` int(11) NOT NULL,
  `xt_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `xt_book_xt_category`
--

INSERT INTO `xt_book_xt_category` (`xt_book_id`, `xt_category_id`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 1),
(5, 2),
(6, 2),
(7, 1),
(8, 2),
(9, 1),
(10, 2),
(11, 1),
(12, 2),
(13, 1),
(14, 2),
(15, 1),
(16, 2),
(17, 2),
(18, 1),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 1),
(24, 1),
(25, 1),
(26, 2),
(27, 2),
(28, 1),
(29, 1),
(30, 1),
(31, 2),
(32, 2),
(33, 1),
(34, 1),
(35, 2),
(36, 2),
(37, 2),
(38, 1),
(39, 1);

-- --------------------------------------------------------

--
-- Table structure for table `xt_category`
--

CREATE TABLE `xt_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `xt_category`
--

INSERT INTO `xt_category` (`id`, `name`, `created_at`) VALUES
(1, 'Children', '2020-05-10 07:40:45'),
(2, 'Fiction', '2020-05-10 07:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `xt_coupon`
--

CREATE TABLE `xt_coupon` (
  `id` int(11) NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `xt_coupon`
--

INSERT INTO `xt_coupon` (`id`, `code`, `discount`, `created_at`) VALUES
(1, '95K8K', 15, '2020-05-10 07:40:45'),
(2, 'ASH1F', 15, '2020-05-10 07:40:45'),
(3, 'H56WE', 15, '2020-05-10 07:40:45'),
(4, 'C7O3E', 15, '2020-05-10 07:40:45'),
(5, 'YRG4B', 15, '2020-05-10 07:40:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `xt_book`
--
ALTER TABLE `xt_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xt_book_xt_category`
--
ALTER TABLE `xt_book_xt_category`
  ADD PRIMARY KEY (`xt_book_id`,`xt_category_id`),
  ADD KEY `IDX_453F9250AC93B256` (`xt_book_id`),
  ADD KEY `IDX_453F925045EE2BD5` (`xt_category_id`);

--
-- Indexes for table `xt_category`
--
ALTER TABLE `xt_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xt_coupon`
--
ALTER TABLE `xt_coupon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `xt_book`
--
ALTER TABLE `xt_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `xt_category`
--
ALTER TABLE `xt_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `xt_coupon`
--
ALTER TABLE `xt_coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `xt_book_xt_category`
--
ALTER TABLE `xt_book_xt_category`
  ADD CONSTRAINT `FK_453F925045EE2BD5` FOREIGN KEY (`xt_category_id`) REFERENCES `xt_category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_453F9250AC93B256` FOREIGN KEY (`xt_book_id`) REFERENCES `xt_book` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

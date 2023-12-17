-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8111
-- Generation Time: Oct 09, 2023 at 05:25 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yogabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `paragraph` longtext NOT NULL,
  `image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `paragraph`, `image`) VALUES
(3, 'Exploring the therapeutic effects of yoga', 'The objective of this study is to assess the findings of selected articles regarding the therapeutic effects of yoga and to provide a comprehensive review of the benefits of regular yoga practice. As participation rates in mind-body fitness programs such as yoga continue to increase, it is important for health care professionals to be informed about the nature of yoga and the evidence of its many therapeutic effects. Thus, this manuscript provides information regarding the therapeutic effects of yoga as it has been studied in various populations concerning a multitude of different ailments and conditions. Therapeutic yoga is defined as the application of yoga postures and practice to the treatment of health conditions and involves instruction in yogic practices and teachings to prevent reduce or alleviate structural, physiological, emotional and spiritual pain, suffering or limitations. Results from this study show that yogic practices enhance muscular strength and body flexibility, promote and improve respiratory and cardiovascular function, promote recovery from and treatment of addiction, reduce stress, anxiety, depression, and chronic pain, improve sleep patterns, and enhance overall well-being and quality of life.', 'https://fitpage.in/wp-content/uploads/2021/05/Article_Banner-1.jpg'),
(5, 'Increase your strength', 'While most people associate yoga with stretching and flexibility, some types of yoga classes can also be considered strength-building. It just depends on the class level, approach, and teacher. This makes yoga asana a multimodal form of exercise (4Trusted Source).\r\n\r\nYoga’s effectiveness at building strength has been studied in several specific contexts — for instance, as it pertains to people with breast cancer, older adults, and children (4Trusted Source, 12, 13Trusted Source).\r\n\r\nAnother study conducted on air force personnel found yoga to be an effective strength-building practice across many age groups of healthy participants (14Trusted Source).', 'https://www.sweat.com/cdn/shop/articles/Breath_en7a06d9fc389348ace233250fca6b90ae_1024x1024.jpg?v=1614640765'),
(6, 'What is yogic breathing?', 'The three-part breath, or full yogic breath, involves using the nose, chest, and belly to fully inhale and exhale.\r\n\r\nTo practice this breathing exercise:\r\n\r\nSit cross-legged on the floor or upright in a chair, with a tall spine. Take a few natural breaths in and out through the nose. Close the eyes if it is comfortable to do so.\r\nBreathing through the nose, take in a third of one’s full lung capacity deep into the diaphragm, expanding the belly. Breathe in the next third into the rib cage. Breathe in the final third into the upper chest.\r\nRelease the breath through the nose, in reverse order; emptying first the chest, then ribcage, then belly. Continue for up to 10 rounds before returning to the breath’s natural rhythm.', 'https://www.himalayanyogainstitute.com/wp-content/uploads/2018/11/22047843_1704058392961512_1085958845402301184_o-1200x675.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `forumquestion`
--

CREATE TABLE `forumquestion` (
  `id` int(11) NOT NULL,
  `question` longtext NOT NULL,
  `username` varchar(225) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forumquestion`
--

INSERT INTO `forumquestion` (`id`, `question`, `username`, `time`) VALUES
(1, 'when should i start yoga', 'Khushi Tiwari', '2023-09-03 08:53:03'),
(2, 'how are you', 'Khushi Tiwari', '2023-09-03 08:57:30'),
(3, 'testing question 2', 'Khushi Tiwari', '2023-09-03 09:08:01'),
(4, 'testing question 4', 'Khushi Tiwari', '2023-09-03 09:08:33'),
(5, 'hey what are the benifits of doing yoga', 'pwr', '2023-09-03 17:57:37'),
(6, 'What is ashtang yoga ', 'Khushi Tiwari', '2023-09-03 18:01:56'),
(7, 'hie', 'Khushi Tiwari', '2023-09-04 14:07:22'),
(8, 'What is ashtang yoga and its steps', 'Khushi Tiwari', '2023-09-06 07:03:22');

-- --------------------------------------------------------

--
-- Table structure for table `forumreply`
--

CREATE TABLE `forumreply` (
  `id` int(11) NOT NULL,
  `replyid` int(11) NOT NULL,
  `reply` longtext NOT NULL,
  `username` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forumreply`
--

INSERT INTO `forumreply` (`id`, `replyid`, `reply`, `username`, `time`) VALUES
(3, 4, 'test 4', 'Khushi Tiwari', '2023-09-03 09:25:16'),
(4, 2, 'im good', 'pwr', '2023-09-03 10:07:19'),
(5, 2, 'how is your mom', 'pwr', '2023-09-03 10:07:31'),
(6, 4, 'testidhvlds dfvio;bhosdfv pdf fij fpvbpofjjvb', 'pwr', '2023-09-03 10:44:27'),
(7, 4, 'deepak knaojiya', 'pwr', '2023-09-03 10:49:50'),
(8, 2, 'hii babyyy', 'pwr', '2023-09-03 17:53:09'),
(9, 2, 'I miss you baby', 'Khushi Tiwari', '2023-09-03 17:59:52'),
(10, 7, '', 'Khushi Tiwari', '2023-09-04 14:07:36'),
(11, 8, 'hello', 'Khushi Tiwari', '2023-09-06 07:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hashed_password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `hashed_password`) VALUES
(4, 'Khushi Tiwari', 'khushitiwari2415@gmail.com', '123'),
(5, 'pwr', 'bfn03175@omeie.com', 'bfn03175@omeie.com'),
(6, 'Khushi Tiwari', 'khushitiwari2415@gmail.com', 'khushitiwari2415@gmail.com'),
(7, 'Khushi Tiwari', 'khushitiwari2415@gmail.com', 'What is ashtang yoga');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forumquestion`
--
ALTER TABLE `forumquestion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forumreply`
--
ALTER TABLE `forumreply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `forumquestion`
--
ALTER TABLE `forumquestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `forumreply`
--
ALTER TABLE `forumreply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

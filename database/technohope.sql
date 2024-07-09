-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2024 at 05:23 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `technohope`
--

-- --------------------------------------------------------

--
-- Table structure for table `add researsch`
--

CREATE TABLE `add researsch` (
  `addResearsch_id` int(11) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `Drop file` varchar(255) NOT NULL,
  `Summary_AR` varchar(100) NOT NULL,
  `Summary_EN` varchar(225) NOT NULL,
  `Technology treeID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `Comment_Id` int(11) NOT NULL,
  `Content` varchar(255) NOT NULL,
  `Date` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact us`
--

CREATE TABLE `contact us` (
  `contactus_id` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `new sleter`
--

CREATE TABLE `new sleter` (
  `Newsleter_Id` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `Notification_id` int(11) NOT NULL,
  `Content` varchar(500) NOT NULL,
  `ReadStatus` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patents`
--

CREATE TABLE `patents` (
  `pantent_id` int(11) NOT NULL,
  `pantent_Titel` varchar(100) NOT NULL,
  `app_Number` int(11) NOT NULL,
  `pantent_Number` varchar(50) NOT NULL,
  `summary_AR` varchar(1000) NOT NULL,
  `summary_EN` varchar(1000) NOT NULL,
  `video_link` varchar(100) NOT NULL,
  `patent_Attributes` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
  `Suggestion_id` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `suggestiontype` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `technology`
--

CREATE TABLE `technology` (
  `technologyI_id` int(11) NOT NULL,
  `TechnologyType` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Funcation` varchar(225) NOT NULL,
  `Specialization` varchar(100) NOT NULL,
  `Phone` int(11) NOT NULL,
  `cv` varchar(225) NOT NULL,
  `usertype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstName`, `lastName`, `Email`, `password`, `Funcation`, `Specialization`, `Phone`, `cv`, `usertype`) VALUES
(1, '', '', 'ahmed@gmail.net', '123456', '', '', 0, '0', 'user'),
(2, '', '', 'hassan@yahoo.com', '123456789', '', '', 0, '0', 'user'),
(3, '', '', 'karim@gmail.com', '123456', '', '', 0, '0', 'admin'),
(4, '', '', 'mohamed@gmail.com', '123456', '', '', 0, '0', 'user'),
(5, '', '', 'mostafa@gmail.com', '123456', '', '', 0, '0', 'user'),
(6, '', '', 'rowan@gmail.com', '123456789', '', '', 0, '0', 'user'),
(7, '', '', 'user1@example.com', '12345', '', '', 0, '0', 'admin'),
(8, '', '', 'ziad@gmail.com', '12345', '', '', 0, '0', 'admin'),
(9, '', '', 'ahdfush@gmial.com', '222520', '', '', 0, '', ''),
(13, 'asasas', 'maddd', 'mobarahmed00@gmail.com', '1230', 'sdsadsadsa', 'dsad', 0, '', ''),
(15, 'adhm', 'mamon', 'mamon@gmail.com', '1230', 'sdsadsadsa', 'dsad', 0, ' cv_data/1707005413', ''),
(17, 'ali', 'mo', 'ali@asasa.com', '1020', 'dsdsadsdsd', 'erewrewrewr', 0, ' cv_data/1707005569', ''),
(23, 'asasas', 'maddd', 'ahmefamen3@gmail.com', 'asas', 'sdsadsadsa', 'dsadsadsadsadsa', 0, ' cv_data/1707005748', ''),
(25, 'xcxcxc', 'xssxsxsx', 'jivefov973@webonoid.com', '1221', 'dwdwdsdsd', 'w2e2ewwsews', 0, '../cv_data', ''),
(29, 'zzzzzzz', 'cccccccc', 'jdifdijfifdjid@zxcxzconoid.com', '1230', 'dwdwdsdsd', 'w2e2ewwsews', 0, '$', ''),
(35, 'dcsamk', 'cslnaclsnckls', 'csachsajcnsj@ccxgcxg.nat', '1230', 'dwdwdsdsd', 'w2e2ewwsews', 0, '../cv_data', ''),
(58, 'Ahmed', 'mahmoud', 'say2523d20@gmail.com', '2001', 'I want to create a function that takes a PDF or an image and transfers it to a specific file. It takes the name of the PDF or image and its location and saves them in the database in a row called cv.', 'I want to create a function that takes a PDF or an image and transfers it to a specific file. It tak', 2147483647, '', ''),
(59, 'Ahmed', 'mahmoud', 'say2523d201@gmail.com', '2001', 'I want to create a function that takes a PDF or an image and transfers it to a specific file. It takes the name of the PDF or image and its location and saves them in the database in a row called cv.', 'I want to create a function that takes a PDF or an image and transfers it to a specific file. It tak', 2147483647, 'data/', ''),
(60, 'Ahmed', 'mahmoud', 'say2523d21@gmail.com', '2001', 'I want to create a function that takes a PDF or an image and transfers it to a specific file. It takes the name of the PDF or image and its location and saves them in the database in a row called cv.', 'I want to create a function that takes a PDF or an image and transfers it to a specific file. It tak', 2147483647, '', ''),
(61, 'Ahmed', 'mahmoud', 'say2523d251@gmail.com', '2001', 'I want to create a function that takes a PDF or an image and transfers it to a specific file. It takes the name of the PDF or image and its location and saves them in the database in a row called cv.', 'I want to create a function that takes a PDF or an image and transfers it to a specific file. It tak', 2147483647, '', ''),
(86, 'Ahmed', 'mahmoud', 'ahmed1212121@gmail.com', '111222', 'I want to create a function that takes a PDF or an image and transfers it to a specific file. It takes the name of the PDF or image and its location and saves them in the database in a row called cv.', 'I want to create a function that takes a PDF or an image and transfers it to a specific file. It tak', 2147483647, '', ''),
(88, 'Ahmed', 'mahmoud', 'ahmefamen312@gmail.com', '1230', 'I want to create a function that takes a PDF or an image and transfers it to a specific file. It takes the name of the PDF or image and its location and saves them in the database in a row called cv.', 'I want to create a function that takes a PDF or an image and transfers it to a specific file. It tak', 2147483647, '', ''),
(90, 'Ahmed', 'mahmoud', 'edfsafsdfsdafasd@vfdsfd.fdfdfds', 'zxcv', 'I want to create a function that takes a PDF or an image and transfers it to a specific file. It takes the name of the PDF or image and its location and saves them in the database in a row called cv.', 'I want to create a function that takes a PDF or an image and transfers it to a specific file. It tak', 2147483647, '', ''),
(100, 'Ahmed', 'mahmoud', 'ahmed@gmail.com', '1230', 'I want to create a function that takes a PDF or an image and transfers it to a specific file. It takes the name of the PDF or image and its location and saves them in the database in a row called cv.', 'I want to create a function that takes a PDF or an image and transfers it to a specific file. It tak', 2147483647, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add researsch`
--
ALTER TABLE `add researsch`
  ADD PRIMARY KEY (`addResearsch_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `test` (`Technology treeID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`Comment_Id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contact us`
--
ALTER TABLE `contact us`
  ADD PRIMARY KEY (`contactus_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `new sleter`
--
ALTER TABLE `new sleter`
  ADD PRIMARY KEY (`Newsleter_Id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`Notification_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `patents`
--
ALTER TABLE `patents`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`Suggestion_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `technology`
--
ALTER TABLE `technology`
  ADD PRIMARY KEY (`technologyI_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add researsch`
--
ALTER TABLE `add researsch`
  ADD CONSTRAINT `add researsch_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `test` FOREIGN KEY (`Technology treeID`) REFERENCES `technology` (`technologyI_id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `contact us`
--
ALTER TABLE `contact us`
  ADD CONSTRAINT `contact us_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `new sleter`
--
ALTER TABLE `new sleter`
  ADD CONSTRAINT `new sleter_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `patents`
--
ALTER TABLE `patents`
  ADD CONSTRAINT `patents_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD CONSTRAINT `suggestion_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `technology`
--
ALTER TABLE `technology`
  ADD CONSTRAINT `technology_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

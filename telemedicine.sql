-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220531.aadb8cc914
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 01:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telemedicine`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `fee` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `serial_number` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `patient_id`, `doctor_id`, `schedule_id`, `fee`, `status`, `create_at`, `serial_number`, `account_number`) VALUES
(13, 43, 42, 89, '45', 1, '2022-12-11 04:21:58', '265247', '01941697253'),
(14, 43, 42, 72, '500', 1, '2022-12-10 15:45:16', '42567', '01866717285'),
(15, 43, 42, 70, '500', 1, '2022-12-10 15:59:41', '193243', '01941697253'),
(17, 43, 42, 75, '500', 1, '2022-12-10 17:05:11', '545118', '01234569'),
(18, 43, 42, 96, '500', 1, '2022-12-11 03:41:13', '632073', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `blog_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_title`, `description`, `blog_image`) VALUES
(5, 'test blog', '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum dolore amet magnam aliquid neque harum ex. Ad veritatis delectus ratione deleniti distinctio facilis nemo consequatur quo, minima, provident temporibus aspernatur!Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum dolore amet magnam aliquid neque harum ex. Ad veritatis delectus ratione deleniti distinctio facilis nemo consequatur quo, minima, provident temporibus aspernatur!Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum dolore amet magnam aliquid neque harum ex. Ad veritatis delectus ratione deleniti distinctio facilis nemo consequatur quo, minima, provident temporibus aspernatur!Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum dolore amet magnam aliquid neque harum ex. Ad veritatis delectus ratione deleniti distinctio facilis nemo consequatur quo, minima, provident temporibus aspernatur!Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum dolore amet magnam aliquid neque harum ex. Ad veritatis delectus ratione deleniti distinctio facilis nemo consequatur quo, minima, provident temporibus aspernatur!Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum dolore amet magnam aliquid neque harum ex. Ad veritatis delectus ratione deleniti distinctio facilis nemo consequatur quo, minima, provident temporibus aspernatur!Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum dolore amet magnam aliquid neque harum ex. Ad veritatis delectus ratione deleniti distinctio facilis nemo consequatur quo, minima, provident temporibus aspernatur!Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum dolore amet magnam aliquid neque harum ex. Ad veritatis delectus ratione deleniti distinctio facilis nemo consequatur quo, minima, provident temporibus aspernatur!Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum dolore amet magnam aliquid neque harum ex. Ad veritatis delectus ratione deleniti distinctio facilis nemo consequatur quo, minima, provident temporibus aspernatur!Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum dolore amet magnam aliquid neque harum ex. Ad veritatis delectus ratione deleniti distinctio facilis nemo consequatur quo, minima, provident temporibus aspernatur!Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum dolore amet magnam aliquid neque harum ex. Ad veritatis delectus ratione deleniti distinctio facilis nemo consequatur quo, minima, provident temporibus aspernatur!Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum dolore amet magnam aliquid neque harum ex. Ad veritatis delectus ratione deleniti distinctio facilis nemo consequatur quo, minima, provident temporibus aspernatur!Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum dolore amet magnam aliquid neque harum ex. Ad veritatis delectus ratione deleniti distinctio facilis nemo consequatur quo, minima, provident temporibus aspernatur!Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum dolore amet magnam aliquid neque harum ex. Ad veritatis delectus ratione deleniti distinctio facilis nemo consequatur quo, minima, provident temporibus aspernatur!</p>\r\n', 'images/blogs/1.jpg'),
(8, 'sdfsd', '<p>asasfasdfadfsd</p>\r\n', 'images/blogs/bb.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE `blog_comment` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_comment`
--

INSERT INTO `blog_comment` (`id`, `blog_id`, `user_id`, `comment`) VALUES
(1, 5, 43, 'test'),
(2, 5, 42, 'test 2'),
(3, 5, 43, 'gb');

-- --------------------------------------------------------

--
-- Table structure for table `blog_like_unlike`
--

CREATE TABLE `blog_like_unlike` (
  `like_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `like_unlike` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_like_unlike`
--

INSERT INTO `blog_like_unlike` (`like_id`, `blog_id`, `user_id`, `like_unlike`) VALUES
(11, 6, 43, 1),
(12, 5, 43, 1),
(13, 8, 43, 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `name` varchar(2000) NOT NULL,
  `department` varchar(3000) NOT NULL,
  `specialization` varchar(2000) NOT NULL,
  `visit_fee` int(12) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `user_id`, `name`, `department`, `specialization`, `visit_fee`) VALUES
(28, 32, 'Jasmine Powers', 'Neurology', 'Medicine, Diabetes', 26),
(29, 33, 'Jesse Sears', 'Gianologist', 'Medicine, Thyroid', 25),
(30, 34, 'Chanda Sargent', 'Neurology', 'Diabetes', 11),
(31, 35, 'Ainsley Davenport', 'Gianologist', 'Medicine, Thyroid', 65),
(32, 37, 'Athena Wade', 'Psychiatrist', 'Diabetes, Thyroid, Hormone', 67),
(33, 38, 'Eric Conley', 'Traumatology', 'Diabetes, Hormone', 73),
(34, 39, 'Heidi Ward', 'Gianologist', 'Diabetes', 65),
(35, 40, 'Duncan Benton', 'Dental', 'Diabetes, Thyroid', 7),
(36, 41, 'Conan Pratt', 'Radiology', 'Hormone', 5),
(37, 42, 'Mehedi', 'Neurology', 'Medicine, Thyroid', 500),
(40, 51, 'Ori Chaney', 'Neurology', 'Diabetes, Thyroid, Hormone', 31),
(41, 52, 'Carolyn Aguirre', 'Dental', 'Hormone', 53),
(42, 53, 'Colorado Golden', 'Traumatology', 'Medicine, Diabetes, Hormone', 32),
(43, 55, 'Ivory Rutledge', 'Neurology', 'Medicine, Diabetes', 31),
(44, 56, 'Rinah Bradshaw', 'Dental', 'Thyroid, Hormone', 8),
(45, 57, 'Chantale Mclaughlin', 'Psychiatrist', 'Medicine, Diabetes', 85),
(46, 58, 'Lillian Rojas', 'Radiology', 'Medicine, Thyroid, Hormone', 14),
(47, 60, 'Eric Church', 'Radiology', 'Medicine, Diabetes', 27),
(48, 61, 'Cameran Diaz', 'Medicine', 'Medicine, Diabetes, Thyroid, Hormone', 43),
(49, 62, 'Beverly Sloan', 'Gianologist', 'Hormone', 68),
(50, 63, 'test', 'Psychiatrist', 'Medicine, Diabetes', 500);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_schedule`
--

CREATE TABLE `doctor_schedule` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `shchedule_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_schedule`
--

INSERT INTO `doctor_schedule` (`id`, `doctor_id`, `patient_id`, `shchedule_date`, `start_time`, `end_time`) VALUES
(89, 42, 43, '2022-12-11', '12:34:00', '12:39:00'),
(90, 42, 43, '2022-12-11', '12:39:00', '12:44:00'),
(91, 42, NULL, '2022-12-11', '12:44:00', '12:49:00'),
(92, 42, NULL, '2022-12-11', '12:49:00', '12:54:00'),
(93, 42, NULL, '2022-12-11', '12:54:00', '12:59:00'),
(94, 42, NULL, '2022-12-12', '13:36:00', '14:21:00'),
(95, 42, NULL, '2022-12-12', '14:21:00', '15:06:00'),
(96, 42, 43, '2022-12-13', '10:30:00', '10:50:00'),
(97, 42, NULL, '2022-12-13', '10:50:00', '11:10:00'),
(98, 42, NULL, '2022-12-13', '11:10:00', '11:30:00'),
(99, 42, NULL, '2022-12-13', '11:30:00', '11:50:00'),
(100, 42, NULL, '2022-12-13', '11:50:00', '12:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `brand_name` varchar(2000) NOT NULL,
  `generic_name` varchar(2000) NOT NULL,
  `type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `user_id`, `brand_name`, `generic_name`, `type`) VALUES
(7, 0, 'Felix Lawson', 'Charissa Frank', ''),
(9, 44, 'India Bruce', 'Yolanda Ortega', 'Capsule'),
(11, 44, 'Carla Best', 'Hedwig Fletcher', 'Capsule'),
(12, 0, 'Yen Willis', 'Colton Morse', 'Tablet'),
(13, 0, 'Arden French', 'Chaney Burt', 'syrup'),
(14, 0, 'Lewis Odonnell', 'Hanae Ortega', 'Tablet'),
(15, 0, 'James Evans', 'Jonas Barber', 'syrup'),
(16, 44, 'Kennedy Garza', 'Eugenia Rhodes', 'Tablet'),
(17, 45, 'Gretchen Ray', 'Raya Hernandez', 'Tablet'),
(18, 44, 'Napa', 'test', 'Tablet');

-- --------------------------------------------------------

--
-- Table structure for table `post_comment`
--

CREATE TABLE `post_comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `details` varchar(10000) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `symptoms` varchar(255) DEFAULT NULL,
  `test` varchar(255) DEFAULT NULL,
  `advice` varchar(255) DEFAULT NULL,
  `prescription` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `appointment_id`, `symptoms`, `test`, `advice`, `prescription`) VALUES
(6, 42, NULL, NULL, NULL, ' Felix Lawson, Yen Willis, Lewis Odonnell, Napa, ');

-- --------------------------------------------------------

--
-- Table structure for table `prescription_medicine`
--

CREATE TABLE `prescription_medicine` (
  `id` int(11) NOT NULL,
  `medicine_name` varchar(2000) NOT NULL,
  `frequency` varchar(2000) NOT NULL,
  `instruction` varchar(3000) NOT NULL,
  `prescription_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `name` varchar(2000) DEFAULT NULL,
  `email` varchar(2000) DEFAULT NULL,
  `password` varchar(3000) DEFAULT NULL,
  `phone` varchar(3000) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `role` int(12) NOT NULL COMMENT '0-paitient,1-admin,2-doctor,3-medcomp\r\n',
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `dob`, `role`, `image`) VALUES
(42, 'Mehedi Hasan', 'doctor@gmail.com', '202cb962ac59075b964b07152d234b70', '01941697253', '1997-12-12', 2, 'IlMgnNvKli.jpeg'),
(43, 'user', 'user@gmail.com', '202cb962ac59075b964b07152d234b70', '018667178254', '1997-12-12', 0, 'images/users/10e0a246-a793-4f45-8462-567d0f5561131568193468366-Deewa-Printed-Jumpsuit-1581568193467754-5.jpg'),
(44, 'Steven Hood', 'pharma@gmail.com', '202cb962ac59075b964b07152d234b70', '+1 (175) 453-7831', NULL, 3, ''),
(49, 'Mysha', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '01859983081', '2022-11-13', 1, 'images/users/IMG_2532.JPG'),
(63, 'test', 'test@gmail.com', '202cb962ac59075b964b07152d234b70', '12345', '1996-12-12', 2, 'IlMgnNvKli.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_like_unlike`
--
ALTER TABLE `blog_like_unlike`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription_medicine`
--
ALTER TABLE `prescription_medicine`
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
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_like_unlike`
--
ALTER TABLE `blog_like_unlike`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prescription_medicine`
--
ALTER TABLE `prescription_medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




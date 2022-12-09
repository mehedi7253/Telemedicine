-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 06:14 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

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
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL,
  `title` varchar(2000) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `post_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_img` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(37, 42, 'Rhea Howe', 'Neurology', 'Medicine, Thyroid', 45),
(40, 51, 'Ori Chaney', 'Neurology', 'Diabetes, Thyroid, Hormone', 31),
(41, 52, 'Carolyn Aguirre', 'Dental', 'Hormone', 53),
(42, 53, 'Colorado Golden', 'Traumatology', 'Medicine, Diabetes, Hormone', 32),
(43, 55, 'Ivory Rutledge', 'Neurology', 'Medicine, Diabetes', 31),
(44, 56, 'Rinah Bradshaw', 'Dental', 'Thyroid, Hormone', 8),
(45, 57, 'Chantale Mclaughlin', 'Psychiatrist', 'Medicine, Diabetes', 85),
(46, 58, 'Lillian Rojas', 'Radiology', 'Medicine, Thyroid, Hormone', 14),
(47, 60, 'Eric Church', 'Radiology', 'Medicine, Diabetes', 27),
(48, 61, 'Cameran Diaz', 'Medicine', 'Medicine, Diabetes, Thyroid, Hormone', 43),
(49, 62, 'Beverly Sloan', 'Gianologist', 'Hormone', 68);

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
(1, 42, 43, '2022-11-17', '16:00:00', '16:30:00'),
(3, 51, NULL, '2022-11-19', '23:25:00', '23:40:00'),
(4, 51, NULL, '2022-11-19', '23:40:00', '23:55:00'),
(5, 42, 48, '2022-11-20', '22:00:00', '22:20:00'),
(6, 42, NULL, '2022-11-20', '22:20:00', '22:40:00'),
(7, 42, NULL, '2022-11-20', '22:40:00', '23:00:00');

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
(17, 45, 'Gretchen Ray', 'Raya Hernandez', 'Tablet');

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
  `prescription_date` date NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `advice` varchar(2000) NOT NULL,
  `test` varchar(3000) NOT NULL,
  `symptom` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(39, 'Heidi Ward', 'byras@mailinator.com', 'Pa$$w0rd!', '+1 (472) 897-9499', '2009-06-23', 2, '2.jpg'),
(40, 'Duncan Benton', 'disale@mailinator.com', 'Pa$$w0rd!', '+1 (772) 451-8141', '2011-02-07', 2, '1.jpg'),
(42, 'Rhea Howe', 'hola@gmail.com', '202cb962ac59075b964b07152d234b70', '+1 (566) 706-4926', '1990-12-12', 2, '3.jpg'),
(43, 'Willa Chavez', 'mif@gmail.com', '202cb962ac59075b964b07152d234b70', '+1 (731) 402-2944', '2001-01-20', 0, 'images/users/2.jpg'),
(44, 'Steven Hood', 'del@gmail.com', '202cb962ac59075b964b07152d234b70', '+1 (175) 453-7831', NULL, 3, ''),
(45, 'Vera Pitts', 'bul@gmail.com', '202cb962ac59075b964b07152d234b70', '+1 (717) 365-6539', NULL, 3, ''),
(46, 'Xyca Roberts', 'xyca@gmail.com', '202cb962ac59075b964b07152d234b70', '+1 (835) 474-4254', '1975-09-17', 2, 'doc1.jpg'),
(47, 'Jack Dotson', 'vat@gmail.com', '202cb962ac59075b964b07152d234b70', '+1 (732) 927-4614', '2002-12-02', 0, 'images/users/online-doctor-.jpg'),
(48, 'mysha Tamanna', '1001012@daffodil.ac', '202cb962ac59075b964b07152d234b70', '(01) 85998-3081', '2022-11-16', 0, '3.jpg'),
(49, 'Mysha', 'mysha@gmail.com', '202cb962ac59075b964b07152d234b70', '01859983081', '2022-11-13', 1, 'images/users/IMG_2532.JPG'),
(50, 'Shea Bolton', 'fake@gmail.com', '202cb962ac59075b964b07152d234b70', '+1 (446) 577-3749', '1997-05-15', 0, 'images/users/slider-bg-1.jpg'),
(51, 'Ori Chaney', 'Ori@gmail.com', '202cb962ac59075b964b07152d234b70', '+1 (521) 635-1959', '2000-07-28', 2, 'telemedicine.jpg'),
(53, 'Colorado Golden', 'rivyva@mailinator.com', '202cb962ac59075b964b07152d234b70', '+1 (573) 336-2806', '1983-11-20', 2, 'slider-bg-1.jpg'),
(54, 'Sandra Klein', 'poqu@mailinator.com', '202cb962ac59075b964b07152d234b70', '+1 (881) 381-8043', NULL, 3, ''),
(55, 'Ivory Rutledge', 'puwimaku@mailinator.com', '202cb962ac59075b964b07152d234b70', '+1 (613) 789-3827', '1984-03-05', 2, '1.png'),
(56, 'Rinah Bradshaw', 'peqita@mailinator.com', '202cb962ac59075b964b07152d234b70', '+1 (115) 753-7252', '1989-01-03', 2, 'blank-profile-picture-.png'),
(57, 'Chantale Mclaughlin', 'vahubikax@mailinator.com', '202cb962ac59075b964b07152d234b70', '+1 (236) 634-1301', '1974-08-22', 2, 'blank-profile-picture-.png'),
(58, 'Lillian Rojas', 'ratevoqaq@mailinator.com', '202cb962ac59075b964b07152d234b70', '+1 (509) 503-8324', '2021-03-20', 2, 'doctor.png'),
(59, 'Adele Cross', 'Adele@gmail.com', '202cb962ac59075b964b07152d234b70', '+1 (154) 925-2798', '1986-09-28', 0, 'images/users/favicon.png'),
(60, 'Eric Church', 'jukysoqysi@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '+1 (922) 475-5861', '2013-10-22', 2, '5539610.jpg'),
(61, 'Cameran Diaz', 'fugizufy@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '+1 (146) 277-8602', '2020-04-01', 2, '5539610.jpg'),
(62, 'Beverly Sloan', 'wufum@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '+1 (325) 903-6925', '2013-08-27', 2, '5539610.jpg');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescription_medicine`
--
ALTER TABLE `prescription_medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

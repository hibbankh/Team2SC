-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 08:29 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dsteng`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_name` varchar(100) DEFAULT NULL,
  `admin_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `admin_name`, `admin_image`) VALUES
(1, 'dstadmin', 'dstengad2016@gmail.com', '846e8d43157eb3810d262fa39e535ee4', 'Abdur Rahim', 'path/to/image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `service_type` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `requirements_description` text NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fin` varchar(20) NOT NULL,
  `company` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `upload_documents` varchar(255) DEFAULT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `service_type`, `contact_email`, `phone_number`, `requirements_description`, `fullname`, `username`, `email`, `fin`, `company`, `dob`, `upload_documents`, `booking_date`) VALUES
(1, 'Renovation Works', 'rehnumatahsin99@gmail.com', '+60177276679', 'jgkjbdfbdflbldb', 'Rehnuma', 'rehnuma08', 'rehnumatahsin99@gmail.com', 'B00654266', '', '1999-10-08', NULL, '2024-05-28 10:27:12'),
(2, 'Renovation Works', 'rehnumatahsin99@gmail.com', '+60177276679', 'gjfkfkykfkc', 'Rehnuma', 'rehnuma08', 'rehnumatahsin99@gmail.com', 'B00654266', '', '1999-10-08', NULL, '2024-05-28 10:33:35'),
(3, 'Renovation Works', 'rehnumatahsin99@gmail.com', '+60177276679', 'gjfkfkykfkc', 'Rehnuma', 'rehnuma08', 'rehnumatahsin99@gmail.com', 'B00654266', '', '1999-10-08', NULL, '2024-05-28 10:35:26'),
(4, 'Renovation Works', 'sinexpteltd95@gmail.com', '0169505170', 'jhvkvk', 'Rehnuma', 'rehnuma08', 'rehnumatahsin99@gmail.com', 'B00654266', '', '1999-10-08', '', '2024-05-28 10:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fin` varchar(20) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `dob` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `fullname`, `username`, `email`, `fin`, `company`, `dob`, `password`, `profile_image`) VALUES
(1, 'Rehnuma Tahsin', 'rahimtahsin', 'rahimtahsin@graduate.utm.my', 'B00654266', '', '1999-10-08', '$2y$10$veijFLP1jJidwcWFA/b0k.JekfZtC9coCNo2s3/o/LMfuBTOhnm5a', NULL),
(2, 'Rehnuma Tahsin', 'rahimtahsin', 'rahimtahsin@graduate.utm.my', 'B00654266', '', '1999-10-08', '$2y$10$g.zXOQ/ykrSiSQI1Owu7zeqseogA9IGPYgmCZIj04yiTj.gy2Iop6', NULL),
(3, 'Rehnuma Tahsin', 'rehnumatahsin', 'rahimtahsin@graduate.utm.my', 'B00654266', '', '1999-10-08', '$2y$10$.9T24C9L9h4dVvhNSHwmL.xUAjdSDWGQyyNGIB02OoEpqISDJj69q', NULL),
(4, 'tahsin rahim', 'tahsinrahim', 'sinexpteltd95@gmail.com', 'B00654266', 'sinex', '1999-10-08', '$2y$10$4CZQ/o/JzZ6h4WWfwk9L2./MMuxaEaUzcLqsv9qQfLbhUIkNlaHdi', NULL),
(5, 'MD ABDUR RAHIM ', 'rahimabdur', 'rahimmdabdur789@gmail.com', 'B00654263', 'SINEX PTE LTD', '1964-06-01', '$2y$10$s4jDpF3Mj4LcFfkDCK9wPu77ZFuMyk5I3IhPI1eXIzvoYhSwhxF9W', 'uploads/Papa pic old.jpg'),
(6, 'Rehnuma', 'rehnuma08', 'rehnumatahsin99@gmail.com', 'B00654266', '', '1999-10-08', '$2y$10$gYDueDsZZP5m7yNJiEN59eSagYp3re/a.841jbJ.uM6XL0ERA3jua', 'uploads/Me.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `number`, `subject`, `message`, `created_at`) VALUES
(1, 'RAHIM MD ABDUR', 'sinexpteltd95@gmail.com', '84199825', 'Application for....', 'sfcsdghtfjf', '2024-03-13 15:14:42'),
(3, 'REHNUMA', 'rehnumatahsin99@gmail.com', '0177276679', 'Application for....', 'Hi. I would like to....', '2024-05-12 19:07:16'),
(4, 'Tahsin rahim', 'sinexpteltd95@gmail.com', '84199825', 'heshjdtgk', 'wdesfglksg;', '2024-05-23 14:28:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

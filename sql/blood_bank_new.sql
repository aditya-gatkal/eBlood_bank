-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 20, 2025 at 12:40 AM
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
-- Database: `blood_bank_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'aditya', '$2y$10$bvScCjgPKh4W/MuS.ZACqem111JdFmlJpYN8vrY6SptAWb6K7OyI6'),
(2, 'test', 'testpass');

-- --------------------------------------------------------

--
-- Table structure for table `blood_inventory`
--

CREATE TABLE `blood_inventory` (
  `id` int(11) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `quantity` int(11) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_inventory`
--

INSERT INTO `blood_inventory` (`id`, `blood_group`, `quantity`, `last_updated`) VALUES
(1, 'A+', 10, '2025-03-18 19:24:20'),
(2, 'A-', 5, '2025-03-18 19:24:20'),
(3, 'B+', 12, '2025-03-18 19:24:20'),
(4, 'B-', 8, '2025-03-18 19:24:20'),
(5, 'O+', 15, '2025-03-18 19:24:20'),
(6, 'O-', 7, '2025-03-18 19:24:20'),
(7, 'AB+', 6, '2025-03-18 19:24:20'),
(8, 'AB-', 3, '2025-03-18 19:24:20'),
(9, 'A+', 10, '2025-03-18 19:40:18'),
(10, 'B+', 7, '2025-03-18 19:40:49'),
(11, 'O+', 37, '2025-03-18 19:41:04'),
(12, 'AB+', 21, '2025-03-18 19:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `blood_requests`
--

CREATE TABLE `blood_requests` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `hospital` varchar(255) NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `date_requested` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_requests`
--

INSERT INTO `blood_requests` (`id`, `patient_name`, `blood_group`, `contact`, `hospital`, `status`, `date_requested`) VALUES
(1, 'Aditya Ghayal', 'O+', '8080711986', 'Apollo Hospital', 'pending', '2025-03-21 22:34:44'),
(2, 'Shreekant Nagargoje', 'A-', '8765432109', 'Fortis Hospital', 'rejected', '2025-03-21 22:34:44'),
(3, 'Lata Doifode', 'B+', '7654321098', 'AIIMS Delhi', 'rejected', '2025-03-21 22:34:44'),
(4, 'Sudhir Shinde', 'AB+', '7545565678', 'TATA Mumbai', 'pending', '2025-03-21 22:34:44'),
(5, 'Ajay Aajari', 'O+', '8912343456', 'JJ Mumbai', 'rejected', '2025-03-21 22:34:44'),
(6, 'Sujay Hiwale', 'A+', '9980001223', 'SS BalBharati,Nashik', 'approved', '2025-03-21 22:41:41'),
(7, 'Vijay Vadkar', 'AB-', '7789898900', 'Lilavati,Mumbai', 'approved', '2025-03-21 22:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `blood_stock`
--

CREATE TABLE `blood_stock` (
  `id` int(11) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_stock`
--

INSERT INTO `blood_stock` (`id`, `blood_group`, `quantity`, `last_updated`) VALUES
(1, 'A+', 34, '2025-03-21 23:05:12'),
(2, 'A-', 17, '2025-03-21 23:05:12'),
(3, 'B+', 45, '2025-03-21 23:05:12'),
(4, 'B-', 7, '2025-03-21 23:05:12'),
(5, 'O+', 75, '2025-03-23 18:07:29'),
(6, 'O-', 47, '2025-03-21 23:05:12'),
(7, 'AB+', 22, '2025-03-21 23:05:12'),
(8, 'AB-', 26, '2025-03-21 23:05:12');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `contact` varchar(15) NOT NULL,
  `city` varchar(100) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`id`, `name`, `email`, `blood_group`, `gender`, `contact`, `city`, `date_registered`) VALUES
(1, 'Aditya Gatkal', 'abc@example.com', 'O+', 'Male', '8080711986', 'Sailu', '2025-03-21 22:01:03'),
(2, 'Nilesh Parve', 'bcd@example.com', 'A-', 'Male', '8080129784', 'Purna', '2025-03-21 22:01:03'),
(3, 'Pavan Javale', 'cde@example.com', 'B+', 'Male', '8766669689', 'Parbhani', '2025-03-21 22:01:03'),
(4, 'Vikas kadam', 'def@example.com', 'AB+', 'Male', '9529680709', 'Gangakhed', '2025-03-21 22:01:03'),
(5, 'Shrikant Shinde', 'efg@example.com', 'O-', 'Male', '9078121297', 'Bhokar', '2025-03-21 22:01:03'),
(6, 'Vishesh Chavan', 'fgh@example.com', 'B+', 'Male', '9234567890', 'Kinvat', '2025-03-21 22:01:03'),
(7, 'Rajkumar Mane', 'ghi@example.com', 'AB-', 'Male', '9112232425', 'Himayat Nagar', '2025-03-21 22:01:03'),
(8, 'Maroti Kamble', 'hij@example.com', 'O+', 'Male', '9876565612', 'Hingoli', '2025-03-21 22:01:03'),
(9, 'Deeepak Chauhan', 'ijk@example.com', 'B+', 'Male', '9789890129', 'Nanded', '2025-03-21 22:01:03'),
(10, 'Vinayak Chavan', 'jkl@example.com', 'O-', 'Male', '7875676721', 'Kandhar', '2025-03-21 22:01:03'),
(11, 'Vijay Zhol', 'klm@example.com', 'A+', 'Male', '8977127576', 'Nanded', '2025-03-21 22:09:40'),
(12, 'Sandeep Patil', 'lmn@example.com', 'O+', 'Male', '9112787812', 'Pune', '2025-03-21 22:22:47'),
(13, 'Rajeshwari Gayakwad', 'mno@example.com', 'A+', 'Male', '8234232323', 'Mumbai', '2025-03-23 19:41:49'),
(14, 'Abhinav Patil', 'nop@example.com', 'A-', 'Male', '9111239090', 'Nanded', '2025-03-23 19:48:30'),
(15, 'Abhinav Patil', 'opq@example.com', 'A-', 'Male', '9111239090', 'Nanded', '2025-03-23 19:54:34'),
(16, 'Abhinav Patil', 'pqr@example.com', 'A-', 'Male', '9111239090', 'Nanded', '2025-03-23 19:58:11'),
(17, 'Raj Jadhav', 'qrs@example.com', 'B-', 'Male', '7676768987', 'Dhule', '2025-03-23 19:59:35'),
(18, 'Krushna Deshmukh', 'rst@example.com', 'AB-', 'Male', '9987565612', 'Nashik', '2025-03-23 20:12:07'),
(19, 'Gaurav Parve', 'xyz@example.com', 'AB+', 'Male', '8080128711', 'Purna', '2025-03-25 16:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `date_sent` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `date_sent`) VALUES
(1, 'PARVE NILESH VIJAY', 'parvenilesh100@gmail.com', 'Good Job!', '2025-03-23 20:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `blood_group` varchar(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`blood_group`, `full_name`, `contact`, `location`, `status`) VALUES
('A+', 'Aditya Diliprao Gatkal', '8080711986', 'Sailu', 'Pending'),
('AB+', 'Nilesh Vijay parve', '8080129784', 'Purna', 'Pending'),
('B+', 'Javale Pavan Rameshwar', '8766669689', 'Parbhani', 'Pending'),
('B+', 'Chavan Vishesh Dinesh', '9078676745', 'Kinvat', 'Pending'),
('B+', 'vikas kadam', '08080129784', 'Parbhani', 'Pending'),
('A+', 'mane rajkumar', '9078676745', 'nanded', 'Pending'),
('O+', 'punnet Superstar', '8766681231', 'Delhi', 'Pending'),
('B+', 'Sarthak Dhage', '9098777382', 'Pune', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `requests_backup`
--

CREATE TABLE `requests_backup` (
  `id` int(11) NOT NULL DEFAULT 0,
  `patient_name` varchar(100) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `hospital` varchar(150) NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `request_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `blood_inventory`
--
ALTER TABLE `blood_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_requests`
--
ALTER TABLE `blood_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_stock`
--
ALTER TABLE `blood_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blood_inventory`
--
ALTER TABLE `blood_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `blood_requests`
--
ALTER TABLE `blood_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blood_stock`
--
ALTER TABLE `blood_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

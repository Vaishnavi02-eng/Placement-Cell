-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2022 at 01:11 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `placement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', 'admin@123', '14-05-2022 11:42:05 AM');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_head_quarter` varchar(100) NOT NULL,
  `company_website` varchar(255) NOT NULL,
  `company_nature_of_business` varchar(100) NOT NULL,
  `company_name_of_ceo` varchar(100) NOT NULL,
  `company_no_of_employees` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_head_quarter`, `company_website`, `company_nature_of_business`, `company_name_of_ceo`, `company_no_of_employees`) VALUES
(5, 'tcs', 'pune', 'www.tcs.com', 'IT service', 'jhkhpid', 6789),
(6, 'Wipro', 'Hydrabad', 'www.Wipro.com', 'IT service', 'ghjdhfjdkh', 6789),
(7, 'atos', 'Hydrabad', 'https://www.google.com/search?q=whatsapp+web&oq=&aqs=chrome.0.69i59i450l8.1630016j0j7&sourceid=chrome&ie=UTF-8', 'IT service', 'ghjdhfjdkh', 6789);

-- --------------------------------------------------------

--
-- Table structure for table `company_criteria`
--

CREATE TABLE `company_criteria` (
  `id` int(11) NOT NULL,
  `recruiter_id` varchar(50) NOT NULL,
  `jobrole` varchar(255) NOT NULL,
  `10th` float NOT NULL,
  `12th` float NOT NULL,
  `dbranch` varchar(255) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `train` varchar(255) NOT NULL,
  `inter` varchar(255) NOT NULL,
  `bond` varchar(255) NOT NULL,
  `backlog` int(11) NOT NULL,
  `gap_year` int(11) NOT NULL,
  `semester_3` float NOT NULL,
  `experience` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `ctc` varchar(255) NOT NULL,
  `aboutcompany` text NOT NULL,
  `pro` text NOT NULL,
  `appdate` date NOT NULL,
  `body` text NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_criteria`
--

INSERT INTO `company_criteria` (`id`, `recruiter_id`, `jobrole`, `10th`, `12th`, `dbranch`, `batch`, `train`, `inter`, `bond`, `backlog`, `gap_year`, `semester_3`, `experience`, `url`, `location`, `ctc`, `aboutcompany`, `pro`, `appdate`, `body`, `regDate`, `updationDate`) VALUES
(45, 's18_hale_vaishnavi@mgmcen.ac.in', 'java Developer', 60, 60, 'BTech', '2022', '3 month', 'pune', '1', 2, 2, 70, 5, 'https://www.w3schools.com/tags/att_input_type_checkbox.asp', 'pune', '7LPA', 'dfbgbd', 'bddfg', '2022-07-09', 'bdbdbdb', '2022-06-13 10:30:27', '2022-06-13 10:30:27'),
(46, 's18_hale_vaishnavi@mgmcen.ac.in', 'React Developer', 90, 90, 'BTech', '2022', '3 month', 'dhgkmj', 'gtfdhyf', 0, 0, 90, 0, 'https://www.w3schools.com/tags/att_input_type_checkbox.asp', 'pune', '2.4LPA', 'dfygfh', 'dfjhfgj', '2022-06-25', 'fdhfgj', '2022-06-13 11:12:55', '2022-06-13 11:12:55'),
(49, 's18_hale_vaishnavi@mgmcen.ac.in', 'System Associate Engineering', 60, 60, 'BTech', '2022', '3 month', 'hkjgfj', 'fhdgfgh', 0, 0, 65, 11, 'https://www.w3schools.com/tags/att_input_type_checkbox.asp', 'pune', '2.4LPA', 'dhffgjh', 'dhfgj', '2022-06-26', 'dhfgj', '2022-06-14 10:22:55', '2022-06-14 10:22:55'),
(67, 'shriya.pattewar@gmail.com', 'java Developer', 60, 60, 'BTech', '2022', '3 month', 'pune', '1', 0, 0, 60, 11, 'https://www.w3schools.com/tags/att_input_type_checkbox.asp', 'pune', '7LPA', 'dfgdfhb', 'fdhb g', '2022-06-22', 'dfhd', '2022-06-15 10:46:28', '2022-06-15 10:46:28'),
(68, 'shriya.pattewar@gmail.com', 'java Developer', 60, 60, 'BTech', '2022', '3 month', 'pune', '1', 0, 0, 60, 11, 'https://www.w3schools.com/tags/att_input_type_checkbox.asp', 'pune', '7LPA', 'dfgdfhb', 'fdhb g', '2022-06-22', 'dfhd', '2022-06-15 10:48:07', '2022-06-15 10:48:07'),
(69, 'shriya.pattewar@gmail.com', 'System Associate Engineering', 70, 70, 'BTech', '2022', '3 month', 'Tech Park One, Ground Floor, Airport Rd, Yerawada, Pune, Maharashtra 411006', '1', 0, 0, 65, 0, 'https://www.w3schools.com/tags/att_input_type_checkbox.asp', 'pune', '2.4LPA', 'Altimetrik is a digital business enablement company. We deliver bite-size outcomes as organizations scale digitalization to accelerate revenue growth without disrupting ongoing business operations. Our practitioners and agile engineering teams create solutions that drive transformation and achieve business goals.', '1)Aptitude/Technical Test.                2)Technical Interview         3)HR Round', '2022-06-23', 'vgjnghm', '2022-06-15 11:09:16', '2022-06-15 11:09:16'),
(70, 'shriya.pattewar@gmail.com', 'java Developer', 60, 60, 'BTech', '2022', '3 month', 'dhgkmj', '1', 0, 0, 65, 11, 'https://www.w3schools.com/tags/att_input_type_checkbox.asp', 'pune', '7LPA', 'dfgfnhjgf', 'fvhgj', '2022-06-24', 'fvghngmn', '2022-06-15 11:24:09', '2022-06-15 11:24:09'),
(71, 'shriya.pattewar@gmail.com', 'java Developer', 60, 60, 'BTech', '2022', '3 month', 'dhgkmj', '1', 0, 0, 65, 11, 'https://www.w3schools.com/tags/att_input_type_checkbox.asp', 'pune', '7LPA', 'dfgfnhjgf', 'fvhgj', '2022-06-24', 'fvghngmn', '2022-06-15 11:26:10', '2022-06-15 11:26:10');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `body`) VALUES
(13, 'varad', 'vaishnavihale2@gmail.com', 'esfs', ' drhfgh'),
(17, 'shriya', 'shriya.pattewar@gmail.com', 'rt4eryg', ' serdruhjkgh cvgfcgjnm xsdgf  nj edsg');

-- --------------------------------------------------------

--
-- Table structure for table `recruiter`
--

CREATE TABLE `recruiter` (
  `recruiter_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recruiter`
--

INSERT INTO `recruiter` (`recruiter_id`, `company_id`, `name`, `designation`, `emailid`, `contact_no`, `experience`, `password`) VALUES
(2, 5, 'shivkanya', 'HR', 'shriya.pattewar@gmail.com', 8600137622, '15', 'abc@123 '),
(3, 6, 'vaishnavi', 'HR', 's18_hale_vaishnavi@mgmcen.ac.in', 8600137622, '15', 'abc@1234 '),
(4, 7, 'varad', 'HR', 'mvpattewar@gmail.com', 8600137622, '11', 'ro^AcZl '),
(10, 7, 'vaishnavi', 'HR', 'vaishnavihale2@gmail.com', 8600137622, '11', '7cY3A#T '),
(16, 6, 'vaishnavi', 'HR', 'pattewarshriya@gmail.com', 8600137622, '15', 'ihlLnbm ');

-- --------------------------------------------------------

--
-- Table structure for table `recruiterlog`
--

CREATE TABLE `recruiterlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recruiterlog`
--

INSERT INTO `recruiterlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(53, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-11 08:39:13', '2022-06-11 08:39:13', 1),
(54, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-11 09:06:52', '2022-06-11 09:06:52', 1),
(55, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-11 10:25:17', '2022-06-11 10:25:17', 1),
(56, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-11 11:10:35', '2022-06-11 11:10:35', 1),
(57, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-11 11:33:21', '2022-06-11 11:33:21', 1),
(58, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-11 14:30:20', '2022-06-11 14:30:20', 1),
(59, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-11 15:24:58', '2022-06-11 15:24:58', 1),
(60, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-11 15:59:05', '2022-06-11 15:59:05', 1),
(61, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-12 09:53:26', '2022-06-12 09:53:26', 1),
(62, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-12 10:09:08', '2022-06-12 10:09:08', 1),
(63, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-12 12:08:51', '2022-06-12 12:08:51', 1),
(64, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-12 12:13:42', '2022-06-12 12:13:42', 1),
(65, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-12 12:22:29', '2022-06-12 12:22:29', 1),
(66, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 07:55:44', '2022-06-13 07:55:44', 1),
(67, 0, 'vaishnavihale2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 08:41:43', '2022-06-13 08:41:43', 0),
(68, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 08:41:46', '2022-06-13 08:41:46', 1),
(69, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 08:42:19', '2022-06-13 08:42:19', 1),
(70, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 10:09:12', '2022-06-13 10:09:12', 1),
(71, 0, 's18_hale_vaishnavi@mgmcen.ac.in', 0x3a3a3100000000000000000000000000, '2022-06-13 10:20:32', '2022-06-13 10:20:32', 1),
(72, 0, 's18_hale_vaishnavi@mgmcen.ac.in', 0x3a3a3100000000000000000000000000, '2022-06-13 11:12:00', '2022-06-13 11:12:00', 1),
(73, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 11:50:28', '2022-06-13 11:50:28', 1),
(74, 0, 'mvpat@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-14 09:11:42', '2022-06-14 09:11:42', 0),
(75, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-14 09:11:45', '2022-06-14 09:11:45', 1),
(76, 0, 's18_hale_vaishnavi@mgmcen.ac.in', 0x3a3a3100000000000000000000000000, '2022-06-14 10:22:09', '2022-06-14 10:22:09', 1),
(77, 0, 'vaishnavihale2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-14 10:46:36', '2022-06-14 10:46:36', 0),
(78, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-14 10:46:40', '2022-06-14 10:46:40', 1),
(79, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-15 09:05:35', '2022-06-15 09:05:35', 1),
(80, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-15 09:56:06', '2022-06-15 09:56:06', 1),
(81, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-15 10:15:18', '2022-06-15 10:15:18', 1),
(82, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-15 10:27:32', '2022-06-15 10:27:32', 1),
(83, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-15 11:08:05', '2022-06-15 11:08:05', 1),
(84, 0, 'pattewarshriya@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-15 11:22:50', '2022-06-15 11:22:50', 0),
(85, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-15 11:22:54', '2022-06-15 11:22:54', 1),
(86, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-17 08:44:57', '2022-06-17 08:44:57', 1),
(87, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-17 09:06:13', '2022-06-17 09:06:13', 1),
(88, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-17 10:00:17', '2022-06-17 10:00:17', 1),
(89, 0, 's18_hale_vaishnavi@mgmcen.ac.in', 0x3a3a3100000000000000000000000000, '2022-06-17 10:28:08', '2022-06-17 10:28:08', 1),
(90, 0, 's18_hale_vaishnavi@mgmcen.ac.in', 0x3a3a3100000000000000000000000000, '2022-06-17 10:43:26', '2022-06-17 10:43:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `city` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `10th` float NOT NULL,
  `12th` float NOT NULL,
  `course` int(11) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `backlog` int(1) NOT NULL,
  `gap_year` int(1) NOT NULL,
  `semester_3` float NOT NULL,
  `age` int(50) NOT NULL,
  `experience` int(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fullName`, `address`, `city`, `gender`, `10th`, `12th`, `course`, `branch`, `backlog`, `gap_year`, `semester_3`, `age`, `experience`, `email`, `password`, `resume`, `regDate`, `updationDate`) VALUES
(57, 'Vaishnavi Hale', 'Malegaon Road', 'nanded', 'female', 85, 85, 1, 'Computer Science Engineering', 0, 0, 85, 22, 0, 'vaishnavihale2@gmail.com', 'b24331b1a138cde62aa1f679164fc62f', 'upload/1-16a986a8-8584-46f5-ad62-fb40255d294f.pdf', '2022-06-11 09:02:30', ''),
(59, 'Shriya VIvek Pattewar', 'Vazirabad', 'Nanded', 'female', 65, 65, 1, 'Computer Science Engineering', 0, 0, 85, 23, 6, 'mvpattewar@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2022-06-13 10:32:30', ''),
(60, 'Vaishnavi Narendra Hale jkgcvoildjnbo', 'Vazirabad', 'Nanded', 'female', 36, 36, 2, 'Mechanical Engineering', 0, 0, 36, 21, 0, 'vaishn2@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', NULL, '2022-06-13 11:15:10', ''),
(61, 'bhavana', 'mondha', 'Nanded', 'female', 60, 59, 1, 'Computer Science Engineering', 0, 0, 79, 21, 0, 'abhavana7499@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2022-06-13 11:17:49', ''),
(62, 'hgklkdv', 'sssss', 'dfgd', 'female', 65, 65, 2, 'Mechanical Engineering', 0, 0, 75, 22, 15, 'mvpat@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2022-06-13 11:24:02', ''),
(63, 'sssss', 'Vazirabad', 'Nanded', 'female', 91, 91, 2, 'Information Technology Engineering', 0, 0, 91, 22, 0, 'vaish2@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', NULL, '2022-06-13 11:35:11', ''),
(68, 'Vaishnavi Narendra Hale', 'Vazirabad', 'Nanded', 'female', 80, 82, 1, 'Information Technology Engineering', 0, 0, 85, 22, 11, 'vaish20@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2022-06-14 10:37:11', ''),
(69, 'vaishnavi venkatesh baccheawar', 'Vazirabad', 'nanded', 'female', 90, 70, 1, 'Computer Science Engineering', 0, 0, 90, 22, 0, 's18_pattewar_shriya@mgmcen.ac.in', '6141c805fa55a910521deca13030590d', NULL, '2022-06-15 10:26:33', ''),
(72, 'Shriya VIvek Pattewar', 'Vazirabad', 'Nanded', 'female', 80, 82, 1, 'Electrical Engineering', 0, 0, 85, 22, 0, 'shriya.pattewar@gmail.com', 'b24331b1a138cde62aa1f679164fc62f', NULL, '2022-06-17 09:56:39', '');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(36, 54, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-11 08:35:43', '2022-06-11 08:35:43', 1),
(37, 54, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-11 08:40:59', '2022-06-11 08:40:59', 1),
(38, 57, 'vaishnavihale2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-11 09:03:19', '2022-06-11 09:03:19', 1),
(39, 57, 'vaishnavihale2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-11 10:00:37', '2022-06-11 10:00:37', 1),
(40, 57, 'vaishnavihale2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-11 10:25:37', '2022-06-11 10:25:37', 1),
(41, 57, 'vaishnavihale2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-11 10:52:21', '2022-06-11 10:52:21', 1),
(42, 57, 'vaishnavihale2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-11 12:40:44', '2022-06-11 12:40:44', 1),
(43, 57, 'vaishnavihale2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-11 13:48:45', '2022-06-11 13:48:45', 1),
(44, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-11 15:25:04', '2022-06-11 15:25:04', 0),
(45, 57, 'vaishnavihale2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-11 15:25:09', '2022-06-11 15:25:09', 1),
(46, 57, 'vaishnavihale2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-11 15:58:52', '2022-06-11 15:58:52', 1),
(47, 57, 'vaishnavihale2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-12 09:54:02', '2022-06-12 09:54:02', 1),
(48, 57, 'vaishnavihale2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-12 12:08:15', '2022-06-12 12:08:15', 1),
(49, 57, 'vaishnavihale2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-12 12:13:11', '2022-06-12 12:13:11', 1),
(50, 57, 'vaishnavihale2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-12 12:21:02', '2022-06-12 12:21:02', 1),
(51, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 07:42:46', '2022-06-13 07:42:46', 0),
(52, 57, 'vaishnavihale2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 07:42:50', '2022-06-13 07:42:50', 1),
(53, 57, 'vaishnavihale2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 08:10:01', '2022-06-13 08:10:01', 1),
(54, 57, 'vaishnavihale2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 10:18:38', '2022-06-13 10:18:38', 1),
(55, 59, 'mvpattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 10:32:39', '2022-06-13 10:32:39', 1),
(56, 59, 'mvpattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 10:51:46', '2022-06-13 10:51:46', 1),
(57, 57, 'vaishnavihale2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 11:03:30', '2022-06-13 11:03:30', 1),
(58, 59, 'mvpattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 11:03:47', '2022-06-13 11:03:47', 1),
(59, 57, 'vaishnavihale2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 11:09:29', '2022-06-13 11:09:29', 1),
(60, 59, 'mvpattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 11:09:54', '2022-06-13 11:09:54', 1),
(61, 57, 'vaishnavihale2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 11:13:18', '2022-06-13 11:13:18', 1),
(62, 60, 'vaishn2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 11:15:17', '2022-06-13 11:15:17', 1),
(63, 61, 'abhavana7499@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 11:18:02', '2022-06-13 11:18:02', 1),
(64, 59, 'mvpattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 11:21:37', '2022-06-13 11:21:37', 1),
(65, 62, 'mvpat@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 11:24:13', '2022-06-13 11:24:13', 1),
(66, 60, 'vaishn2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 11:27:05', '2022-06-13 11:27:05', 1),
(67, 61, 'abhavana7499@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 11:27:16', '2022-06-13 11:27:16', 1),
(68, 59, 'mvpattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 11:27:45', '2022-06-13 11:27:45', 1),
(69, 60, 'vaishn2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 11:33:57', '2022-06-13 11:33:57', 1),
(70, 63, 'vaish2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 11:35:16', '2022-06-13 11:35:16', 1),
(71, 61, 'abhavana7499@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 11:37:26', '2022-06-13 11:37:26', 1),
(72, 59, 'mvpattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 11:37:46', '2022-06-13 11:37:46', 1),
(73, 57, 'vaishnavihale2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 11:38:50', '2022-06-13 11:38:50', 1),
(74, 61, 'abhavana7499@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 11:48:17', '2022-06-13 11:48:17', 1),
(75, 59, 'mvpattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 11:48:24', '2022-06-13 11:48:24', 1),
(76, 62, 'mvpat@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 11:49:55', '2022-06-13 11:49:55', 1),
(77, 57, 'vaishnavihale2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 11:54:01', '2022-06-13 11:54:01', 1),
(78, 63, 'vaish2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 11:54:22', '2022-06-13 11:54:22', 1),
(79, 62, 'mvpat@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 11:55:01', '2022-06-13 11:55:01', 1),
(80, 0, 'vaish20@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-14 09:10:24', '2022-06-14 09:10:24', 0),
(81, 63, 'vaish2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-14 09:13:47', '2022-06-14 09:13:47', 1),
(82, 57, 'vaishnavihale2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-15 09:05:23', '2022-06-15 09:05:23', 1),
(83, 57, 'vaishnavihale2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-15 09:10:45', '2022-06-15 09:10:45', 1),
(84, 59, 'mvpattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-15 09:11:15', '2022-06-15 09:11:15', 1),
(85, 61, 'abhavana7499@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-15 09:12:00', '2022-06-15 09:12:00', 1),
(86, 59, 'mvpattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-15 09:12:26', '2022-06-15 09:12:26', 1),
(87, 59, 'mvpattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-15 09:15:28', '2022-06-15 09:15:28', 1),
(88, 62, 'mvpat@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-15 09:15:56', '2022-06-15 09:15:56', 1),
(89, 57, 'vaishnavihale2@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-15 09:18:57', '2022-06-15 09:18:57', 1),
(90, 61, 'abhavana7499@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-15 09:20:39', '2022-06-15 09:20:39', 1),
(91, 0, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-17 09:49:51', '2022-06-17 09:49:51', 0),
(92, 72, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-17 09:58:11', '2022-06-17 09:58:11', 1),
(93, 72, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-17 10:26:29', '2022-06-17 10:26:29', 1),
(94, 0, 's18_hale_vaishnavi@mgmcen.ac.in', 0x3a3a3100000000000000000000000000, '2022-06-17 10:50:54', '2022-06-17 10:50:54', 0),
(95, 61, 'abhavana7499@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-17 10:50:59', '2022-06-17 10:50:59', 1),
(96, 72, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-17 10:53:49', '2022-06-17 10:53:49', 1),
(97, 72, 'shriya.pattewar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-17 10:53:58', '2022-06-17 10:53:58', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `company_criteria`
--
ALTER TABLE `company_criteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruiter`
--
ALTER TABLE `recruiter`
  ADD PRIMARY KEY (`recruiter_id`);

--
-- Indexes for table `recruiterlog`
--
ALTER TABLE `recruiterlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
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
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `company_criteria`
--
ALTER TABLE `company_criteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `recruiter`
--
ALTER TABLE `recruiter`
  MODIFY `recruiter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `recruiterlog`
--
ALTER TABLE `recruiterlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

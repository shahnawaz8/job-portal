-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2018 at 09:56 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(50) NOT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `fName` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lName` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phoneNo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `accountType` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'employee' COMMENT 'admin,employee,employer'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `fName`, `lName`, `email`, `phoneNo`, `accountType`) VALUES
(1, 'Sandeep', '1234', 'Sandeep', 'DiL', 'admin@sandeepdil.com', '7838844121', 'employer'),
(2, 'kumar', '1234', 'kumar', 'dill', 'sjd@sdbsdnc.com', '6767676789', 'employer'),
(3, 'anuj', '1234', 'jo', 'ja', 'joja@hoja.com', '7878788989', 'employee'),
(4, 'admin', '1234', 'admin', 'user', 'admin@google.com', '7897897899', 'admin'),
(5, 'ashu11937', '7053', 'ashu', 'kumar', 'ashu@gmail.com', '6666767899', 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(50) NOT NULL,
  `userID` int(100) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `info` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `contactNo` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `userID`, `name`, `info`, `address`, `email`, `contactNo`) VALUES
(1, 2, 'Marvelous Anitech Pvt. Ltd.', 'Marvelous Anitech is a premier IT Company in Delhi; facilitates aspiring students to achieve a Marvelous career ahead.\r\n\r\nAt Marvelous Anitech we are committed to deliver best education & career opportunities for the students as well as for working professionals.\r\n\r\nWe are located at Delhi-Noida border and at 2 minutes walking distance from New Ashok Nagar Metro Station which makes Marvelous Anitech easily accessible from any region of Delhi-NCR.\r\n\r\nWe have designed spacious computer labs, classrooms, counseling rooms, reception area to provide ample space for academic activities. Our campus is also equipped with high speed Wi-Fi internet so that students can access internet anywhere in campus and learn their courses.\r\n\r\nWe have a league of expert faculties with years of experience in teaching as well as industrial work, which makes Marvelous Anitech best IT Company in Delhi. We also organize week-end and monthly workshops which are conducted by professional working at Team Leader and project manager positions with more than 5 years of experience.\r\n\r\nAt Marvelous Anitech we have a dedicated placement cell which ensure 100% placement record for our batches.', 'Marvelous Anitech Pvt. Ltd.\r\nUttam Nagar, Metro Piller 680,\r\nUttam Nagar West', 'info@marvelous.co.in', '7838844121'),
(2, 1, 'marvelous', 'We', 'Mravelous', 'info@marvelous.co.in', '7838844121');

-- --------------------------------------------------------

--
-- Table structure for table `jobapplications`
--

CREATE TABLE `jobapplications` (
  `id` int(50) NOT NULL,
  `jobID` int(50) NOT NULL,
  `userID` int(50) NOT NULL,
  `applyOn` varchar(200) NOT NULL,
  `talent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobapplications`
--

INSERT INTO `jobapplications` (`id`, `jobID`, `userID`, `applyOn`, `talent`) VALUES
(20, 1, 3, '1515910412', 'Traversing the DOM with JavaScript - YouTube.MP4'),
(21, 2, 3, '1515910652', 'An Introduction to DOM Events with JavaScript - YouTube.MP4'),
(22, 4, 3, '1515918832', 'Anuj_cv.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `jobcategories`
--

CREATE TABLE `jobcategories` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sb_pid` bigint(20) DEFAULT NULL,
  `sb_order_index` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jobcategories`
--

INSERT INTO `jobcategories` (`id`, `name`, `sb_pid`, `sb_order_index`) VALUES
(1, 'Administrative Services', 0, 1),
(2, 'Engineering Services', 0, 2),
(3, 'Marketing/Public Relations', 0, 3),
(4, 'Aerospace/Aviation/Defense', 0, 4),
(5, 'Computer Science', 2, 5),
(6, 'Mechanical', 2, 6),
(7, 'Agriculture Services', 0, 7),
(8, 'Architectural Services', 0, 8),
(14, 'Mass Communications', 0, 14),
(15, 'Pharmaceuticals', 0, 15),
(16, 'Construction & Mining', 0, 16),
(17, 'Consulting Services', 0, 17),
(18, 'Consumer Products', 0, 18),
(24, 'Customer Care Services', 0, 24),
(25, 'Educational Services', 0, 25),
(26, 'Placement Agencies', 0, 26),
(27, 'Financial Services', 0, 27),
(28, 'Accounting/Auditing', 27, 28),
(29, 'Banking', 27, 29),
(30, 'Finance/Economics', 27, 30),
(31, 'Insurance', 27, 31),
(32, 'Government and Policy', 0, 32),
(33, 'Healthcare Services', 0, 33),
(34, 'Nursing', 33, 34),
(38, 'Administration', 33, 38),
(39, 'Allied Health', 33, 39),
(40, 'LaboratoryServices', 33, 40),
(41, 'Medical Practitioners', 33, 41),
(42, 'Senior Management', 0, 42),
(43, 'admin', 33, 43);

-- --------------------------------------------------------

--
-- Table structure for table `jobexperience`
--

CREATE TABLE `jobexperience` (
  `id` int(50) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jobexperience`
--

INSERT INTO `jobexperience` (`id`, `title`) VALUES
(1, 'Fresher'),
(2, 'Less than 1 Year'),
(3, '1 to 2 Years'),
(4, '2 to 5 Years'),
(5, '5 to 7 Years'),
(6, '7 to 10 Years'),
(7, '10 to 15 Years'),
(8, 'More than 15 Years');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(50) NOT NULL,
  `jobTitle` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `jobExp` int(50) NOT NULL,
  `jobCat` int(50) NOT NULL,
  `jobDisc` longtext COLLATE utf8_unicode_ci NOT NULL,
  `userID` int(50) NOT NULL,
  `postedOn` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `jobTitle`, `jobExp`, `jobCat`, `jobDisc`, `userID`, `postedOn`) VALUES
(1, 'Php developer Required', 1, 2, 'We are looking for a php developer....\r\n\r\nShould have php skill\r\nShould have html knowledge \r\nShould have CSS skill\r\n\r\nJquery and Javascript is a +1 point', 1, '1429965856'),
(2, '.Net developer Required', 2, 2, 'We are looking for a good .Net Developer..\r\n\r\nShould have good knowledge of ASP.net \r\n\r\n', 1, '1429966153'),
(3, 'Core Php developer Required', 1, 2, 'We wanna have core php developer....\r\n\r\nThe jQuery and Javascript will be a +1 point\r\n\r\nShould have HTML CSS skill ', 1, '1429966891'),
(4, 'Sr. UI Designer / UI Developer / Web Designer / Graphic Designer', 3, 3, '     Company Name: Emagage\r\n    Website URL: https://www.emgage.in/\r\n    Position: UI Designer	\r\n    Experience: 4+ yrs.\r\n    Qualification: B. Tech. / M. Tech. / B.E. / M.E. / BCA / MCA\r\n    Location: Prahladnagar, Ahmedabad\r\n    Compensation: No bar for right candidate\r\n    Job Description:\r\n\r\n    Must have in-depth knowledge of HTML 4 and 5, CSS 2 and 3, Front end frameworks, LESS, Semantic Design Principles, JavaScript, jQuery, and image processing.\r\n    Experience with UI pattern implementation\r\n    Knowledge of or Exposure to SharePoint will be added advantage\r\n    Proficient with Photoshop or Equivalent\r\n    Experience with user interface design patterns and User Centric Design methodologies\r\n    Familiarity with basic coding techniques and best\r\n    Solid experience in creating/implementing wireframes, storyboards, and user flows\r\n    Excellent visual design skills with sensitivity to user-system interaction\r\n    Up-to-date with the latest UI trends, techniques, and technologies\r\n    Strong self-motivation with an ability to work with a team on multiple concurrent projects\r\n\r\n    Working Hours: 9.30am to 7.00pm\r\n    Working Days: Monday to Friday\r\n    Interview Timings: 10.30am 5.00pm\r\n    Interview Venue: B-1007, Mondeal Square, Opp. Honest Restaurant, Prahlad Nagar, Ahmedabad.\r\n\r\n    We are inviting all qualified and skilled applicants who are interested to work with our company and are suitable to our requirement to e- mail their updated CV at hr@emgage.in\r\n\r\nSalary: 3,50,000 - 8,50,000 P.A\r\n\r\nIndustry: IT-Software / Software Services\r\n\r\nFunctional Area: IT Software - Application Programming , Maintenance\r\n\r\nRole Category:Programming & Design\r\n\r\nRole:Graphic/Web Designer\r\n', 2, '1430505652');

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `id` int(50) NOT NULL,
  `courseName` varchar(200) NOT NULL,
  `univName` varchar(200) NOT NULL,
  `qYear` varchar(200) NOT NULL,
  `userID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`id`, `courseName`, `univName`, `qYear`, `userID`) VALUES
(1, '10th', 'hbse', '2005', '3'),
(2, '12th', 'hbse', '2007', '3'),
(5, '10th', 'hbse', '2005', '5');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(50) NOT NULL,
  `skillName` varchar(200) NOT NULL,
  `userID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skillName`, `userID`) VALUES
(1, 'php', 3),
(2, 'html', 3),
(4, 'php', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobapplications`
--
ALTER TABLE `jobapplications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobcategories`
--
ALTER TABLE `jobcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobexperience`
--
ALTER TABLE `jobexperience`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobapplications`
--
ALTER TABLE `jobapplications`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `jobcategories`
--
ALTER TABLE `jobcategories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `jobexperience`
--
ALTER TABLE `jobexperience`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2025 at 10:19 AM
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
-- Database: `project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `EOInumber` int(11) NOT NULL,
  `job_ref` varchar(5) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `dob` varchar(10) DEFAULT NULL,
  `gender` enum('Male','Female','Other','Prefer not to say') DEFAULT 'Prefer not to say',
  `street` varchar(40) NOT NULL,
  `suburb` varchar(40) NOT NULL,
  `state` varchar(3) NOT NULL,
  `postcode` char(4) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `skill1` varchar(20) DEFAULT NULL,
  `skill2` varchar(20) DEFAULT NULL,
  `skill3` varchar(20) DEFAULT NULL,
  `skill4` varchar(20) DEFAULT NULL,
  `other_skills` text DEFAULT NULL,
  `status` varchar(10) DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`EOInumber`, `job_ref`, `first_name`, `last_name`, `dob`, `gender`, `street`, `suburb`, `state`, `postcode`, `email`, `phone`, `skill1`, `skill2`, `skill3`, `skill4`, `other_skills`, `status`) VALUES
(1, 'UI456', 'Test', 'User', '2000-01-01', 'Male', '123 Test St', 'Melbourne', 'VIC', '3000', 'test@example.com', '0412345678', 'HTML', '', '', '', 'None', 'New'),
(3, 'UI456', 'Test', 'User', '01/01/2000', 'Male', '123 Test St', 'Melbourne', 'VIC', '3000', 'test@example.com', '0412345678', 'HTML', '', '', '', 'None', 'New'),
(4, 'UI456', 'Test', 'User', '01/01/2000', 'Male', '123 Test St', 'Melbourne', 'VIC', '0300', 'test@example.com', '0412345678', 'HTML', '', '', '', 'None', 'New'),
(5, 'UI456', 'Test', 'User', '01/01/2000', 'Male', '123 Test St', 'Melbourne', 'VIC', '0300', 'test@example.com', '0412345678', 'HTML', '', '', '', 'None', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `jobs_des`
--

CREATE TABLE `jobs_des` (
  `id` int(11) NOT NULL,
  `jobs_id` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `responsibilities` text NOT NULL,
  `benefits` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs_des`
--

INSERT INTO `jobs_des` (`id`, `jobs_id`, `title`, `description`, `responsibilities`, `benefits`) VALUES
(1, 'WEB12', 'Web Developer', 'Join our front-end and back-end development teams to build interactive, scalable, and high-performance web solutions.', 'Work with APIs and RESTful services to integrate back-end systems .\r\nCollaborate with UI/UX designers to enhance usability and accessibility.\r\nEnsure high performance and security across platforms.\r\nParticipate in Agile sprints and contribute to code reviews.', 'Access to the latest developer tools and cloud infrastructure.\r\nCertification sponsorship and continuous learning programs.\r\nFlexible work hours and hybrid options.'),
(2, 'UI456', 'UI/UX Designer', 'Shape how users interact with technology. Our design team values creativity, research, and simplicity to craft intuitive experiences.', 'Design intuitive and engaging interfaces for apps and websites.\r\nConduct user research, wireframing, and prototyping using Figma or Adobe XD.\r\nCollaborate with developers to ensure seamless implementation of design systems.\r\nTest and iterate based on user feedback and analytics.\r\nMaintain brand consistency across all design outputs.', 'Creative autonomy in project execution.\r\nCollaboration with diverse, cross-functional teams.\r\nAnnual design conference sponsorship.'),
(3, 'DB789', 'Database Engineer', 'Power our data-driven systems by designing and maintaining secure, high-availability databases.', 'Design, implement, and optimize SQL and NoSQL database architecture.\r\nDevelop and maintain backup, recovery, and monitoring systems.\r\nCollaborate with developers to ensure efficient data models and queries.\r\nEnsure database scalability and security best practices.\r\nAnalyze performance bottlenecks and implement solutions.', 'Work with industry-leading cloud database tools (AWS, Azure, MongoDB).\r\nStructured mentorship and leadership tracks.\r\nRemote-friendly and performance-based bonuses.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`EOInumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

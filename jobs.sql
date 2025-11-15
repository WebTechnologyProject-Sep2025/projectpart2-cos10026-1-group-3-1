-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 15, 2025 lúc 07:10 AM
-- Phiên bản máy phục vụ: 8.0.44
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `jobs`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs_des`
--

CREATE TABLE `jobs_des` (
  `id` int NOT NULL,
  `jobs_id` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `responsibilities` text NOT NULL,
  `benefits` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `jobs_des`
--

INSERT INTO `jobs_des` (`id`, `jobs_id`, `title`, `description`, `responsibilities`, `benefits`) VALUES
(1, 'WEB12', 'Web Developer', 'Join our front-end and back-end development teams to build interactive, scalable, and high-performance web solutions.', 'Work with APIs and RESTful services to integrate back-end systems .\r\nCollaborate with UI/UX designers to enhance usability and accessibility.\r\nEnsure high performance and security across platforms.\r\nParticipate in Agile sprints and contribute to code reviews.', 'Access to the latest developer tools and cloud infrastructure.\r\nCertification sponsorship and continuous learning programs.\r\nFlexible work hours and hybrid options.'),
(2, 'UI456', 'UI/UX Designer', 'Shape how users interact with technology. Our design team values creativity, research, and simplicity to craft intuitive experiences.', 'Design intuitive and engaging interfaces for apps and websites.\r\nConduct user research, wireframing, and prototyping using Figma or Adobe XD.\r\nCollaborate with developers to ensure seamless implementation of design systems.\r\nTest and iterate based on user feedback and analytics.\r\nMaintain brand consistency across all design outputs.', 'Creative autonomy in project execution.\r\nCollaboration with diverse, cross-functional teams.\r\nAnnual design conference sponsorship.'),
(3, 'DB789', 'Database Engineer', 'Power our data-driven systems by designing and maintaining secure, high-availability databases.', 'Design, implement, and optimize SQL and NoSQL database architecture.\r\nDevelop and maintain backup, recovery, and monitoring systems.\r\nCollaborate with developers to ensure efficient data models and queries.\r\nEnsure database scalability and security best practices.\r\nAnalyze performance bottlenecks and implement solutions.', 'Work with industry-leading cloud database tools (AWS, Azure, MongoDB).\r\nStructured mentorship and leadership tracks.\r\nRemote-friendly and performance-based bonuses.');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `jobs_des`
--
ALTER TABLE `jobs_des`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `jobs_des`
--
ALTER TABLE `jobs_des`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

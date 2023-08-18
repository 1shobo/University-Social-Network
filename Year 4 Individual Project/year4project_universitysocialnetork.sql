-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 03, 2023 at 10:35 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `year4project_universitysocialnetork`
--

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `accouncement`, `date`) VALUES
(1, 'Welcome to the new Student Social Network!', '2023-05-02'),
(2, 'Please ensure you treat one another kindly!', '2023-05-02'),
(3, 'There is a test today!', '2023-05-02');

--
-- Dumping data for table `chatmessages`
--

INSERT INTO `chatmessages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(33, 'UN00003', 'UN00002', 'What are you doing today?'),
(34, 'UN00002', 'UN00003', 'I am going out!'),
(35, 'UN00003', 'UN00002', 'That sounds fun'),
(36, 'UN00003', 'UN00001', 'Hi man'),
(37, 'UN00002', 'UN00001', 'How was your day?'),
(38, 'UN00001', 'UN00003', 'Did you finish the assignment'),
(39, 'UN00003', 'UN00001', 'Yeah I did'),
(40, 'UN00001', 'UN00003', 'Can you give me a hand with it?'),
(44, 'UN00001', 'UN00002', 'It was great, how was yours?'),
(45, 'UN00003', 'UN00002', 'I would love to go out'),
(47, 'UN00002', 'UN00001', 'It was so much fun'),
(48, 'UN00002', 'UN00001', 'I went out with friends today'),
(52, 'UN00001', 'UN00002', 'What did you guys get up to?'),
(53, 'UN00002', 'UN00001', 'We went ice skating and ate ice cream!'),
(61, 'UN00004', 'UN00002', 'Hi Kevin, I was hoping you could help me with the assignment we got toady!'),
(62, 'UN00004', 'UN00001', 'Hi Kevin'),
(63, 'UN00001', 'UN00004', 'Hi stephen');

--
-- Dumping data for table `discussionfeed`
--

INSERT INTO `discussionfeed` (`id`, `studentID`, `date`, `message`, `profilePicture`, `Name`) VALUES
(37, 'UN00002', '2023-05-01 13:02:37', 'I love this new student website!', '1682678472kathrynb.jpg', 'Kathryn Boyler'),
(40, 'UN00003', '2023-05-01 15:14:42', 'Me too, I think its gonna be so useful', '1681903016andrewpic.jpeg', 'Andrew Adebayo'),
(44, 'UNadmin', '2023-05-01 14:35:40', 'Please feel free to ask me any questions via, the messages feature!', 'admin.jpg', 'Admin');

--
-- Dumping data for table `studentlogin`
--

INSERT INTO `studentlogin` (`id`, `studentID`, `Name`, `Password`, `profilePicture`, `status`) VALUES
(1, 'UNadmin', 'Admin', 'Admin', 'admin.jpg', 'Offline now'),
(17, 'UN00001', 'Stephen Ayoshobo', 'stephen', '1683023380stephen.jpg', 'Offline now'),
(18, 'UN00002', 'Kathryn Boyler', 'kathrynspass', '1682983869kathrynb.jpg', 'Offline now'),
(19, 'UN00003', 'Andrew Adebayo', 'andrewspass', '1682984048andrewpic.jpeg', 'Offline now'),
(20, 'UN00004', 'Kevin McDonald', 'kevinspass', '1682984110kevin.jpg', 'Offline now');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

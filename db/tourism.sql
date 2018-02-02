-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2018 at 12:28 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `admin-tour`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `status`, `description`) VALUES
(1, 'danger', 'You have entered invalid password!...'),
(2, 'danger', 'Your current password is missing or incorrect!...'),
(3, 'danger', 'Password was not changed successfully!...'),
(4, 'success', 'Password has been successfully changed!...'),
(5, 'success', 'You have successfully login!...'),
(6, 'danger', 'Please enter your username and password!....'),
(7, 'danger', 'Invalid username or password!...'),
(9, 'success', 'Your changes saved successfully!...'),
(10, 'success', 'Your data was saved successfully!...'),
(11, 'danger', 'please enter your email address'),
(12, 'success', 'password reset email was sent successfully!...'),
(13, 'danger', 'Invalid email address!...'),
(14, 'danger', 'There was an error '),
(15, 'success', 'password was reset successfully '),
(16, 'danger', 'please check your reset code'),
(17, 'danger', 'new password and confirm password does not match'),
(18, 'danger', 'Old password is incorrect..!');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `authToken` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastLogin` datetime NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resetcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `createdAt`, `isActive`, `authToken`, `lastLogin`, `username`, `password`, `resetcode`) VALUES
(1, 'Sublime', 'dhanusha@sublime.lk', '2017-07-05 11:03:45', 1, 'a5d482031ae8717fda30a59cd6eaeed8', '2018-02-02 12:30:27', 'mahesh', '348c880664f2e1458b899ced2a3518e6', '66565');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

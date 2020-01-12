-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15-07-17 04:29
-- 서버 버전: 5.6.21
-- PHP 버전: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 데이터베이스: `restaurant1`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `reserve`
--

CREATE TABLE IF NOT EXISTS `reserve` (
`idx` int(11) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `reserve`
--

INSERT INTO `reserve` (`idx`, `time`, `date`, `amount`, `name`, `id`) VALUES
(1, '18:00:00', '2015-06-09', 120, 'admin', 'admin'),
(2, '18:00:00', '2015-05-20', 50, 'admin', 'admin'),
(3, '18:00:00', '2015-07-15', 45, 'admin', 'admin'),
(4, '20:00:00', '2015-07-15', 136, 'admin', 'admin'),
(5, '18:00:00', '2015-07-15', 16, 'admin', 'admin'),
(6, '18:00:00', '2015-08-26', 171, 'admin', 'admin'),
(7, '18:00:00', '2015-04-14', 70, 'admin', 'admin'),
(9, '20:00:00', '2015-02-14', 290, 'admin', 'admin'),
(10, '20:00:00', '2015-01-14', 520, 'admin', 'admin'),
(12, '20:00:00', '2015-11-14', 290, 'admin', 'admin'),
(13, '20:00:00', '2015-10-14', 90, 'admin', 'admin'),
(14, '20:00:00', '2015-09-14', 50, 'admin', 'admin'),
(15, '20:00:00', '2015-09-14', 150, 'admin', 'admin'),
(16, '20:00:00', '2015-08-14', 1200, 'admin', 'admin'),
(17, '18:00:00', '2015-07-16', 1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- 테이블 구조 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` varchar(110) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `user`
--

INSERT INTO `user` (`id`, `pw`, `mail`, `name`) VALUES
('a1231231a', '9a78211436f6d425ec38f5c4e02270801f3524f8', 'dfd123@df.c', 'rudxor123'),
('admin', 'c4645ab988f41638a541f1a826e288770f1ce3ff', 'sd@fd.fd', 'admin');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `reserve`
--
ALTER TABLE `reserve`
 ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `reserve`
--
ALTER TABLE `reserve`
MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

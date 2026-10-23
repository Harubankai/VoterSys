-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2026 at 04:56 AM
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
-- Database: `votesystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`) VALUES
(1, 'admin', '$2y$10$.eCbbGKwfqf/d0v6vGrNyOK/DGRTQlLPeJPfGHmZNzn1k527ZJyh2', 'St. Rose College', 'Admin', 'nobita.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `platform` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `position_id`, `firstname`, `lastname`, `photo`, `platform`) VALUES
(59, 17, 'Juan', 'Dela Cruz', 'bam.jpg', 'If elected, I will be your voice. I believe in shared leadership, where every student counts and is part of the change. Together, we’ll make a more inclusive, responsive, and empowered SSC.\r\n'),
(60, 17, 'Digong', 'Marcos', 'duter.jpg', 'If elected, I will be your voice. I believe in shared leadership, where every student counts and is part of the change. Together, we’ll make a more inclusive, responsive, and empowered SSC.'),
(62, 18, 'Jhonny', 'santos', 'js.jpg', 'If elected, I will be your voice. I believe in shared leadership, where every student counts and is part of the change. Together, we’ll make a more inclusive, responsive, and empowered SSC.'),
(63, 18, 'Lisa', 'Cayabyab', 'glo.jpg', 'If elected, I will be your voice. I believe in shared leadership, where every student counts and is part of the change. Together, we’ll make a more inclusive, responsive, and empowered SSC.'),
(64, 19, 'Aniceto', 'Vicente', 'bbm.jpg', 'If elected, I will be your voice. I believe in shared leadership, where every student counts and is part of the change. Together, we’ll make a more inclusive, responsive, and empowered SSC.'),
(65, 19, 'Sara', 'Montenegro', 'sra.jpg', 'If elected, I will be your voice. I believe in shared leadership, where every student counts and is part of the change. Together, we’ll make a more inclusive, responsive, and empowered SSC.'),
(66, 20, 'Kim', 'Corpuz', 'shuvee.jpg', 'If elected, I will be your voice. I believe in shared leadership, where every student counts and is part of the change. Together, we’ll make a more inclusive, responsive, and empowered SSC.'),
(68, 20, 'Marites', 'De guzman', 'len.jpg', 'If elected, I will be your voice. I believe in shared leadership, where every student counts and is part of the change. Together, we’ll make a more inclusive, responsive, and empowered SSC.'),
(69, 21, 'Ramon', 'Montenegro', 'coco.jpg', 'If elected, I will be your voice. I believe in shared leadership, where every student counts and is part of the change. Together, we’ll make a more inclusive, responsive, and empowered SSC.'),
(70, 21, 'Remy', 'Cayabyab', 'tt.jpg', 'If elected, I will be your voice. I believe in shared leadership, where every student counts and is part of the change. Together, we’ll make a more inclusive, responsive, and empowered SSC.'),
(71, 22, 'Ina', 'Magdangal', 'ina.jpg', 'If elected, I will be your voice. I believe in shared leadership, where every student counts and is part of the change. Together, we’ll make a more inclusive, responsive, and empowered SSC.\r\n'),
(72, 22, 'Karylle', 'torio', 'ccs.jpg', 'If elected, I will be your voice. I believe in shared leadership, where every student counts and is part of the change. Together, we’ll make a more inclusive, responsive, and empowered SSC.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `max_vote` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `description`, `max_vote`, `priority`) VALUES
(17, 'SSC President', 1, 1),
(18, 'SSC Vice President', 1, 2),
(19, 'SSC Senator on Record', 1, 3),
(20, 'SSC Senator on Finance', 1, 4),
(21, 'SSC Senator on Audit', 1, 5),
(22, 'SSC Senator on External Relation', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(11) NOT NULL,
  `voters_id` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `year` varchar(250) NOT NULL,
  `department` varchar(250) NOT NULL,
  `gmail` varchar(100) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `resettoken` int(100) DEFAULT NULL,
  `resettokenexpire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `voters_id`, `password`, `firstname`, `lastname`, `year`, `department`, `gmail`, `photo`, `resettoken`, `resettokenexpire`) VALUES
(431, 'B9D', '$2y$10$FsxUycLoJEvyuLRPwr1PbeM3ZkSzoAu1YFYp7Mbh78nd2avo3/PGC', 'Charles Godwin', 'Reyes', '4TH', 'BSCS', 'godwinreyes2000@gmail.com', '', NULL, NULL),
(432, '95C', '$2y$10$RSmMK9j/0pPZ7nMHpwdrTO0K5o4F655A7SF/E0bFgjZpkbMOr2KG6', 'madison', 'de vera', '4TH', 'BSCS', 'Madisondevera08@gmail.com', '1000121247.jpg', 8, '2025-04-22'),
(433, 'PNZ', '$2y$10$4q6MqUkBuUBeNnoLmA3ncO4AN/3kz/x3/jDm4U18ZTZqZSurj41Fm', 'Iris Gayle', 'East Central', '1ST', 'BSCS', 'johnemersonvicente15@gmail.com', '', NULL, NULL),
(434, '1FN', '$2y$10$nuwNFOG9KxImC7ZOCyUbVeZWzZxS4Uh16Wx2vIwc2zOPFpqxoQqFS', 'Mj', 'Jm', '2ND', 'BSCRIM', 'jamesellazar41@gmail.com', '', NULL, NULL),
(435, 'DK5', '$2y$10$CVvbgbvNwlDv4XTIbgN2pOsn89k8a7HJo3FnXTR.fJnOsjDrPewju', 'Don Joven', 'Maeling', '1ST', 'BSCS', 'a@gmail.com', '', NULL, NULL),
(436, 'LNJ', '$2y$10$q3rVRVNzGdDnphIv4BoWXeaGr5dG88yYxV59q0GcpGEHvxpzcK9Ri', 'Brayar', 'Fernando', '1ST', 'BSCRIM', 'jamesellazar23@gmail.com', '', NULL, NULL),
(438, '8TL', '$2y$10$hJH7W9dYDnd.Agtjnxxd/eGfr9DxhCypaRJP.NRJDMB.F1J8D/uMO', 'Gwyneth Estelle', 'Fontanilla', '4TH', 'BSCS', 'gwynethsfontanilla@gmail.com', '', NULL, NULL),
(439, '35M', '$2y$10$I6XDceMzkLhUUgUcwAL7LeR9xhXxSYoMwS2zmQJ.yjc.Pw8V/sEpu', 'April', 'Estacion', '1ST', 'BSCS', 'b@gmail.com', '', NULL, NULL),
(440, 'XHG', '$2y$10$4tq4HoFlvpE4EqpVD.C52O.jyRWPuX7oCl5ktxTc6j58audKMvApO', 'Meng', 'Gay', '2ND', 'BSCS', 'candorcarla@gmail.com', '', NULL, NULL),
(441, 'A4V', '$2y$10$J/Vg6aas1kie2DDcBlTblOSoNf6Yj.0BFtcIFv0ZmsSX.0SVmFsdO', 'Alen', 'Lazaga', '2ND', 'BSCRIM', 'jamesellazar11@gmail.com', '', NULL, NULL),
(442, '1BL', '$2y$10$MYTXz5hcKTK7CnaxLbBIM.SuaF4CoEUsMY/9I8n77FqTWpbgzqHrS', 'Rea', 'Lagmay', '2ND', 'BSCRIM', 'jamesellazar88@gmail.com', '', NULL, NULL),
(443, 'GMC', '$2y$10$XRAWMEuJNoD49uSfeLJxveqrOUTEBBTLbQNTOIRBN8Oeegbn4g4QW', 'Jame', 'Baskes', '2ND', 'BSCRIM', 'jamesellazar24@gmail.com', '', NULL, NULL),
(445, 'UBV', '$2y$10$qS3.sdplTf8L01i30FiUAuV2MTp5ZHIu5ZToxKSUzyJVJXnQzn7em', 'Thea', 'Go', '3RD', 'BSBA', 'theago@gmail.com', '', NULL, NULL),
(446, 'XHJ', '$2y$10$O9jht/yDBUZ1w9NSdJBWtOSXSBUqVKPzT1jSobvPkGGuUtSYLk6h6', 'Kristine', 'Southeast', '1ST', 'BSCS', 'c@gmail.com', '', NULL, NULL),
(447, '3MQ', '$2y$10$JQUyf7QgYP2hsfnmGTwoYeIQccYSc9b3Ayuoxqs7a0ZoM0zeYkVWy', 'Jomemel', 'Utut', '4TH', 'BSCS', 'mel@gmail.com', '', NULL, NULL),
(448, 'X4B', '$2y$10$ZxoBMDue9FEmBTV7K99tAOWX6ORhGrZ.T66UNoE1CYwH2WB9TF.MO', 'Theo', 'Lee', '2ND', 'BSA', 'theolee@gmail.com', '', NULL, NULL),
(449, 'WQ8', '$2y$10$iUfxN.c9Yzxg8eCIvXSQz.2Aj1zEwZZ5o724Rx.5fIG5hqcv30igS', 'Frances', 'Sumaoang', '4TH', 'BSCRIM', 'gwynethsfontanilla2@gmail.com', '', NULL, NULL),
(451, 'SY1', '$2y$10$GrPuOnBf6q2OmYm6gkwQo.YzFa9eXXbGI9BQO3/vLWIJjtBD/Gjdi', 'Jaymor Vincent', 'De Guzman', '4TH', 'BSCS', 'vincentjaymor@gmail.com', '', 0, '2025-04-22'),
(452, '3QM', '$2y$10$ns1PZAUIzkEi1zYeG0nOMOZxt.BXjg48rDtgj.tHM1B7CxuIzZu22', 'Lea', 'Facunla', '1ST', 'BSCRIM', 'leafacunla@gmail.com', '', NULL, NULL),
(454, 'DMU', '$2y$10$4u3ZeBh2i6R6oLlripu8ouXrl8Ws9s8DpKJxfIU0MR/jk/15AUULi', 'Karylle', 'E', '1ST', 'BSCS', 'e@gmail.com', '', NULL, NULL),
(455, 'TJX', '$2y$10$ZKP2ocxPgNlR9s3coF8wWOyNAiVzvzSoH5sEi2N0zLRFN2bKrzarO', 'James', 'Ellazar', '2ND', 'BSCRIM', 'jamesellazar499@gmail.com', '', NULL, NULL),
(456, 'ZKU', '$2y$10$4tBTo4oJpyzypY/u/RgrvOvaed9mlSqQUDk1GgvPBGjvoi..V3ry.', 'Kelvs', 'Mol', '3RD', 'EDUC', 'mol@gmail.com', '', NULL, NULL),
(457, 'M4Z', '$2y$10$QeS5QOZlVRRD7O7BtuPyuuBGMtLRbn/rxzGrENAOuCzGMKbVnwD0K', 'John', 'Haha', '1ST', 'BSBA', 'kj@gmail.com', '', NULL, NULL),
(458, 'UX2', '$2y$10$ZSsUk6P.En0oDGxvZuMQkeINBa1hjiEIf6coisu/igkEafbfHcaFC', 'Baninay', 'Val', '2ND', 'BSCRIM', 'jamesellazar44@gmail.com', '', NULL, NULL),
(459, '4T3', '$2y$10$H1bi11HnJXKZjxesIV0ugOzdaCjuQt07XEKW5/0uAAg/6.k.0zVA6', 'Natalia', 'Soriano', '3RD', 'EDUC', 'nathaliasoriano@gmail.com', '', NULL, NULL),
(460, '6A9', '$2y$10$pObTP.K350CY0kKDUwf3g.h7Rir.XvVkh8ZsntRhZsDGjsUkki1fe', 'Jacob', 'Mqnawari', '1ST', 'BSCS', 'j@gmail.com', '', NULL, NULL),
(461, '3LJ', '$2y$10$4sgV6M4kaV6GPh0N2LL79eO/cmrVc1YZazJzmD9cZw1ADOe22C/Jq', 'Carla', 'Ulog', '4TH', 'BSCS', 'candorcarl@gmail.com', '', NULL, NULL),
(462, 'FAL', '$2y$10$bXMJEOxV2eTkTlzyCYDd1..wYSiNUjGUEJVMr4U/HRiURyAQIUQYe', 'Jerson', 'Lagapak', '2ND', 'BSCRIM', 'jamesellazar97@gmail.com', '', NULL, NULL),
(463, 'KFQ', '$2y$10$HvJsFW.eDPUpCreve1V7Fu5IDs04W/EP8OGAj8ugVVM1icvn0eXie', 'Lumot', 'Ngayon', '1ST', 'BSCS', 'h@gmail.com', '', NULL, NULL),
(464, 'XZW', '$2y$10$5HzeJ/omiZ3aNS7XX2bly.ffIVyLSK64PQ8nww1JG9eZKgoZ5OoKe', 'Hahaha', 'Maeling', '1ST', 'BSCRIM', 'l@gmail.com', '', NULL, NULL),
(465, 'JD7', '$2y$10$PnDBCEh9gYUrB.xQ1Z5F1OULsDEsXKvYhBPphhG1EvSN1LbW0DDKW', 'Marjorie', 'Navarro', '3RD', 'BSA', 'marjorienavarro@gmail.com', '', NULL, NULL),
(466, '1Q9', '$2y$10$KdI2jlAx9FBYvsDs1MjtmeR5fIUbU8IOdobiaRo2ETf6dV5kM0ki2', 'Enchong', 'Reyes', '3RD', 'BSCS', '1234567890@gmail.com', '', NULL, NULL),
(467, 'G54', '$2y$10$T5B72A9iOYOtzlqRKSVLkOZbJSO7T8pPCJQVpwZhEcinYzB810I3C', 'Marian', 'Cruz', '1ST', 'EDUC', 'gwynethsfontanilla4@gmail.com', '', NULL, NULL),
(468, 'C4Q', '$2y$10$ELL0p.VPr5s4tZmjNDCEBOG.vMVpwwYVxmO8j8fKMr2nTEzlTKvlG', 'Ro', 'Ses', '4TH', 'BSCS', 'ses@gmail.com', '', NULL, NULL),
(469, 'Z8Q', '$2y$10$wemgX9huc4TWWrEk1d7XrON43pCR.EJyjc3aumbq4MDk/t9Fj5DjK', 'jon', 'daniel', '2ND', 'BSA', 'daniel@gmail.com', '', NULL, NULL),
(470, 'WB4', '$2y$10$tMOTiU6XDPmAr6ckjkUaTu4xgrPQRU4ucqZq8h0QcqbgvIJ2Yld6O', 'Grace', 'Dee', '1ST', 'EDUC', 'gwynethsfontanilla5@gmail.com', '', NULL, NULL),
(471, 'NZK', '$2y$10$47GPYVBOAjtZlqpEOLZbVOHkvFDlWz8AZuX.NBEvzxrTGJFfL90y2', 'Rea', 'Novenario', '4TH', 'BSCS', 'reanovernario@gmail.com', '', NULL, NULL),
(472, '23O', '$2y$10$PXJypnYRDMo1V9l1s0bbvOiXPN3Uzy48UmsMnudwrGTdcEV115V/K', 'Reyes', 'Reyes', '2ND', 'BSCRIM', '0987654321@gmail.com', '', NULL, NULL),
(473, '523', '$2y$10$OjVJuhMLuU6v1dY5PN8jNe2zN/CCBphaDeNuFTbPl.EWH9op/8sOy', 'Zet', 'Ty', '4TH', 'EDUC', 'zet@gmail.com', '', NULL, NULL),
(474, 'A4R', '$2y$10$e93nBy2UXxY8/9Qi9Cf0LeAz97gQIcIunVXHU245S5y5d4ZbT8pam', 'Reizel', 'Ochoco', '2ND', 'BSCRIM', 'jamesellazar111@gmail.com', '', NULL, NULL),
(475, 'GE5', '$2y$10$3LIokby3VzJiO4Chj4oNROXNhvsFS3vnf5RwPIcF5r9rtAgiuQ2/W', 'Men', 'Tos', '3RD', 'BSCRIM', 'men@gmail.com', '', NULL, NULL),
(476, 'U7D', '$2y$10$irmuWMZ6bndIAuuLyRq7/.V/4DMTOCFFtAtbaqjuANVJnF3fAnnnC', 'Erica', 'Buco', '1ST', 'EDUC', 'ericabuco@gmail.com', '', NULL, NULL),
(477, 'BEU', '$2y$10$SvmneYnkoXxEvuYhnZNhHuccrsSdyzfu4lw4I0sWnBLJZ.YKDq/AO', 'Tony', 'Grande', '2ND', 'BSCRIM', 'jamesellazar222@gmail.com', '', NULL, NULL),
(478, 'X45', '$2y$10$q2tqDnVTwdzgB5PpNwOcoOGfVNVwwSq63kzWZanW35Cnu2mlpzBri', 'Ann', 'Cruz', '2ND', 'BSA', 'anncruz@gmail.com', '', NULL, NULL),
(479, 'NSF', '$2y$10$lVFeWwFYZNuiXNIOFWozU.pW.H0uZ5RAk5C7ia7Np/g73vrqyufPa', 'Hans', 'Guzman', '1ST', 'EDUC', 'gwynethsfontanilla6@gmail.com', '', NULL, NULL),
(480, 'BVA', '$2y$10$sq1IqIh0sIpKzvrePlgEQ.uOId5qqvevzoywdMlqzmWIxSz/q6xmy', 'Neng', 'Neng', '2ND', 'BSBA', 'neng@gmail.com', '', NULL, NULL),
(481, 'XEV', '$2y$10$cr5ojH5wndnJPxzUzOScdeaanriFZ7XbOn7xs40PRUmksT18Tgz26', 'Beleya', 'astes', '2ND', 'BSCRIM', 'jamesellazar443@gmail.com', 'ssc.png', NULL, NULL),
(482, 'MNJ', '$2y$10$eD3cmZu4Akq/.UzU5ZeI7.Bra9iieLhNKEFfzsq4IcMtZVn9D7xma', 'Eclar', 'Eclar', '2ND', 'BSCS', 'eclar@gmail.com', '', NULL, NULL),
(483, '8W6', '$2y$10$oM/HLQo8XRNAvFQ88ajxxOODIxb1V.JK3nKo6UJDoVdcfmIIECbNq', 'Mama', 'Mo', '4TH', 'EDUC', 'mama@gmail.com', '', NULL, NULL),
(484, 'BSY', '$2y$10$FoCl0Xp75rOr3msZttjc..Y.sUIogeH78wikTy3BZVuGSJO.qL5ES', 'Moly', 'Molmol', '2ND', 'BSCRIM', 'jamesellazar555@gmail.com', '', NULL, NULL),
(485, 'E46', '$2y$10$mzx2rKxjMIUQz1leUxpTw.jynwyf9V64zeUMh2psDKRLbClTm5r2a', 'Cobe', 'Ho', '2ND', 'BSCRIM', 'cobeho@gmail.com', '', NULL, NULL),
(486, 'E5M', '$2y$10$Fvw0Q.i6nRS/HvtXWWXK7.EEjrME18BVE7bX5.lI7/aVmMC88ToYe', 'charles', 'corpuz', '4TH', 'BSCS', 'corpuz@gmail.com', '', NULL, NULL),
(487, 'X6G', '$2y$10$.pVXIKA0r23yBortI/uk.Os8uFW/sumA5NX.rfBk.I0hjZHj6NYQC', 'Andy', 'Canlas', '2ND', 'BSCRIM', 'jamesellazar666@gmail.com', '', NULL, NULL),
(488, 'LTE', '$2y$10$Saon7ZtIH6i7qzvIVP6wOuWWzSPil.UaI4DLbAD.HWoL0QjW.wEMu', 'Chair', 'Man', '3RD', 'BSBA', 'chair@gmail.com', '', NULL, NULL),
(489, 'ZO4', '$2y$10$PyFcrtKHeQC1APPcDB5xF.Vb1VDF4mI1tCt49Jm6vik3ZHKR9bKVi', 'Lebron', 'James', '2ND', 'BSCS', 'lebron@gmail.com', '', NULL, NULL),
(490, '1FW', '$2y$10$sjq5fU8QRAaPC5GLxKCuCepiX2MTl8OJIhx3ig9Sj5o600FzciBei', 'Franz', 'Smith', '2ND', 'EDUC', 'gwynethsfontanilla7@gmail.com', '', NULL, NULL),
(491, 'UMX', '$2y$10$SXlsN1phxZasB/r1cKMYaeqbu8q/wFudx.pZahsNJNN/PlgAiZ9kS', 'Jamal', 'Murray', '1ST', 'BSCS', 'jamal@gmail.com', '', NULL, NULL),
(492, 'MN2', '$2y$10$mw6j3YpFiiinSR4UluVPXuLBU2RvXmz9GLmFLldNhHW1YQ2ITU90C', 'hans', 'venz', '3RD', 'EDUC', 'venz@gmail.com', '', NULL, NULL),
(493, 'LYO', '$2y$10$u/UES6K6UWErDYEY1z6ZzemWGpghJ702einvUQ9hWMdTyuq2DDSEO', 'Belle', 'Lee', '4TH', 'EDUC', 'bellelee@gmail.com', '', NULL, NULL),
(494, '2EL', '$2y$10$RqJwKAQ1LWak9Ej7OTXEq.vRzSa8qyyr0dzhDnol4tG8JM07n2r/i', 'Curry', 'Banana', '2ND', 'BSCRIM', 'jamesellazar881@gmail.com', '', NULL, NULL),
(495, 'OW6', '$2y$10$y4mS/UdqeEwa3rlaDGvGN.00p04XgU6vOTQ4USGLPHIg2yVzXK/e2', 'Aaron', 'Gordon', '1ST', 'BSCS', 'Aaron@gmail.com', '', NULL, NULL),
(496, 'N1T', '$2y$10$xOuE.5cdwIplN7rfRqV77.0bDRr8Kg4IpY6ozIW4zzPDMNGigykYO', 'im the one yeah', 'Khaled', '1ST', 'BSCS', 'khaleed@gmail.com', 'ssc.png', NULL, NULL),
(497, 'Q4R', '$2y$10$7DBkWVImPPKywLh20CXkdOkgRPnDfprgifEylNk0Q0xk0LY0smRYq', 'Lewrong', 'Jamers', '1ST', 'BSCS', 'lebron1@gmail.com', 'favicon.ico', NULL, NULL),
(498, 'T34', '$2y$10$NHd72CkLLKWVxVNFJeENBumi5f4qXj7q6XGgOvzGyHUqiE.J.ch0a', 'sasa', 'sasa', '4TH', 'BSCS', 'aasa@gmail.com', '', 1, '2026-09-11'),
(500, '2026-0001', '$2y$10$A376QnxHffKiUzwZgdJO7e7zAGi/f1C2TGzsCHvZNTO9fjp7ZdZAm', 'qwery', 'dsds', '4TH', 'BSCS', 'genjutsukaido25@gmail.com', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `voters_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=501;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=992;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

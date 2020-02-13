-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2019 at 09:03 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `ay`
--

CREATE TABLE `ay` (
  `friend_id` int(100) DEFAULT NULL,
  `event1` int(100) DEFAULT NULL,
  `event2` int(100) DEFAULT NULL,
  `createdevent1` int(100) DEFAULT NULL,
  `createdevent2` int(100) DEFAULT NULL,
  `response1` int(5) DEFAULT NULL,
  `response2` int(5) DEFAULT NULL,
  `invitation1` int(5) DEFAULT NULL,
  `invitation2` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ay`
--

INSERT INTO `ay` (`friend_id`, `event1`, `event2`, `createdevent1`, `createdevent2`, `response1`, `response2`, `invitation1`, `invitation2`) VALUES
(9, NULL, NULL, 1201, NULL, NULL, NULL, 0, NULL),
(6, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ayhistory`
--

CREATE TABLE `ayhistory` (
  `event_id` int(100) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `rating` int(5) DEFAULT NULL,
  `head_count` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ayhistory`
--

INSERT INTO `ayhistory` (`event_id`, `status`, `rating`, `head_count`) VALUES
(1201, 0, 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ayrecived`
--

CREATE TABLE `ayrecived` (
  `friend_id` int(100) DEFAULT NULL,
  `response` int(5) DEFAULT NULL,
  `flag` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `aysent`
--

CREATE TABLE `aysent` (
  `friend_id` int(100) DEFAULT NULL,
  `response` int(5) DEFAULT NULL,
  `flag` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aysent`
--

INSERT INTO `aysent` (`friend_id`, `response`, `flag`) VALUES
(8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(100) NOT NULL,
  `type` varchar(5) NOT NULL,
  `title` varchar(32) NOT NULL,
  `state` varchar(32) NOT NULL,
  `city` varchar(32) NOT NULL,
  `pincode` int(10) NOT NULL,
  `building_name` varchar(32) NOT NULL,
  `catering_type` varchar(32) NOT NULL,
  `accomodation` varchar(5) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL,
  `max_people` int(10) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `type`, `title`, `state`, `city`, `pincode`, `building_name`, `catering_type`, `accomodation`, `date`, `time`, `max_people`, `message`) VALUES
(1, 'B', 'Metting 1', 'Tamil Nadu', 'Vellore', 632014, 'Vit', 'Nil', 'Nil', '2019-10-16', '12:30AM - 1:30PM', 1, 'bering charged laptop'),
(1101, 'B', 'birthday party', 'Uttar Pradesh', 'merrut', 122334, 'mall rode', 'Veg', 'N', '2019-01-01', '12:30AM - 9:00PM', 3, 'what ever'),
(1201, 'B', 'birthday party', 'Uttar Pradesh', 'varanasi', 221006, 'cantonment road', 'Non-Veg', 'A', '2019-10-31', '12:30AM - 9:00PM', 3, 'Please come'),
(7001, 'F', 'mandha', 'UP', 'Merrut', 111111, 'Raj Palace', 'Non-Veg', 'N', '2019-10-22', '12:30AM - 1:30PM', 3, 'ha hah ahahahah');

-- --------------------------------------------------------

--
-- Table structure for table `mahima`
--

CREATE TABLE `mahima` (
  `friend_id` int(100) DEFAULT NULL,
  `event1` int(100) DEFAULT NULL,
  `event2` int(100) DEFAULT NULL,
  `createdevent1` int(100) DEFAULT NULL,
  `createdevent2` int(100) DEFAULT NULL,
  `response1` int(5) DEFAULT NULL,
  `response2` int(5) DEFAULT NULL,
  `invitation1` int(5) DEFAULT NULL,
  `invitation2` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahima`
--

INSERT INTO `mahima` (`friend_id`, `event1`, `event2`, `createdevent1`, `createdevent2`, `response1`, `response2`, `invitation1`, `invitation2`) VALUES
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mahimahistory`
--

CREATE TABLE `mahimahistory` (
  `event_id` int(100) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `rating` int(5) DEFAULT NULL,
  `head_count` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mahimarecived`
--

CREATE TABLE `mahimarecived` (
  `friend_id` int(100) DEFAULT NULL,
  `response` int(5) DEFAULT NULL,
  `flag` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mahimasent`
--

CREATE TABLE `mahimasent` (
  `friend_id` int(100) DEFAULT NULL,
  `response` int(5) DEFAULT NULL,
  `flag` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prakhar`
--

CREATE TABLE `prakhar` (
  `friend_id` int(100) DEFAULT NULL,
  `event1` int(100) DEFAULT NULL,
  `event2` int(100) DEFAULT NULL,
  `createdevent1` int(100) DEFAULT NULL,
  `createdevent2` int(100) DEFAULT NULL,
  `response1` int(5) DEFAULT NULL,
  `response2` int(5) DEFAULT NULL,
  `invitation1` int(5) DEFAULT NULL,
  `invitation2` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prakhar`
--

INSERT INTO `prakhar` (`friend_id`, `event1`, `event2`, `createdevent1`, `createdevent2`, `response1`, `response2`, `invitation1`, `invitation2`) VALUES
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prakharhistory`
--

CREATE TABLE `prakharhistory` (
  `event_id` int(100) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `rating` int(5) DEFAULT NULL,
  `head_count` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prakharrecived`
--

CREATE TABLE `prakharrecived` (
  `friend_id` int(100) DEFAULT NULL,
  `response` int(5) DEFAULT NULL,
  `flag` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prakharrecived`
--

INSERT INTO `prakharrecived` (`friend_id`, `response`, `flag`) VALUES
(11, NULL, NULL),
(12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prakharsent`
--

CREATE TABLE `prakharsent` (
  `friend_id` int(100) DEFAULT NULL,
  `response` int(5) DEFAULT NULL,
  `flag` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prakharsent`
--

INSERT INTO `prakharsent` (`friend_id`, `response`, `flag`) VALUES
(7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(20) NOT NULL,
  `ageGroup` varchar(5) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `current` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `name`, `email`, `phone`, `ageGroup`, `password`, `gender`, `current`) VALUES
(6, 'va', 'va', 'vaibhavraj.goel2017@vitstudent.ac.in', 1234567890, 'C', 'va', 'M', 1),
(7, 'vaibhav', 'vaibhav', 'vaibhavrajgoel@gmail.com', 2147483647, 'D', 'vaibhav', 'M', 1),
(8, 'prakhar', 'prakhar sharma', 'prakharSharma@gmail.com', 2147483647, 'D', 'prakhar', 'M', 1),
(9, 'mahima', 'mahim goel', 'mahimagoel@gmail.com', 2147483647, 'D', 'mahima', 'F', 1),
(11, 'v2022', 'va', 'vaibhavrajgoel@gmail.com', 1212, 'A', 'asdf', 'M', 2),
(12, 'ay', 'ayush', 'ayush@gmail.com', 2147483647, 'D', '12345', 'M', 2);

-- --------------------------------------------------------

--
-- Table structure for table `v2022`
--

CREATE TABLE `v2022` (
  `friend_id` int(100) DEFAULT NULL,
  `event1` int(100) DEFAULT NULL,
  `event2` int(100) DEFAULT NULL,
  `createdevent1` int(100) DEFAULT NULL,
  `createdevent2` int(100) DEFAULT NULL,
  `response1` int(5) DEFAULT NULL,
  `response2` int(5) DEFAULT NULL,
  `invitation1` int(5) DEFAULT NULL,
  `invitation2` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `v2022`
--

INSERT INTO `v2022` (`friend_id`, `event1`, `event2`, `createdevent1`, `createdevent2`, `response1`, `response2`, `invitation1`, `invitation2`) VALUES
(7, 7001, NULL, 1101, NULL, 0, NULL, 0, NULL),
(6, NULL, NULL, 1101, NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `v2022history`
--

CREATE TABLE `v2022history` (
  `event_id` int(100) NOT NULL,
  `status` int(5) DEFAULT NULL,
  `rating` int(5) DEFAULT NULL,
  `head_count` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `v2022history`
--

INSERT INTO `v2022history` (`event_id`, `status`, `rating`, `head_count`) VALUES
(1, 1, 8, 20),
(1101, 0, 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `v2022recived`
--

CREATE TABLE `v2022recived` (
  `friend_id` int(100) DEFAULT NULL,
  `response` int(5) DEFAULT NULL,
  `flag` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `v2022sent`
--

CREATE TABLE `v2022sent` (
  `friend_id` int(100) DEFAULT NULL,
  `response` int(5) DEFAULT NULL,
  `flag` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `v2022sent`
--

INSERT INTO `v2022sent` (`friend_id`, `response`, `flag`) VALUES
(8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `va`
--

CREATE TABLE `va` (
  `friend_id` int(100) NOT NULL,
  `event1` int(100) DEFAULT NULL,
  `event2` int(100) DEFAULT NULL,
  `createdevent1` int(100) DEFAULT NULL,
  `createdevent2` int(100) DEFAULT NULL,
  `response1` int(5) DEFAULT NULL,
  `response2` int(5) DEFAULT NULL,
  `invitation1` int(5) DEFAULT NULL,
  `invitation2` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `va`
--

INSERT INTO `va` (`friend_id`, `event1`, `event2`, `createdevent1`, `createdevent2`, `response1`, `response2`, `invitation1`, `invitation2`) VALUES
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vahistory`
--

CREATE TABLE `vahistory` (
  `event_id` int(100) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `rating` int(5) DEFAULT NULL,
  `head_count` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vaibhav`
--

CREATE TABLE `vaibhav` (
  `friend_id` int(100) NOT NULL,
  `event1` int(100) DEFAULT NULL,
  `event2` int(100) DEFAULT NULL,
  `createdevent1` int(100) DEFAULT NULL,
  `createdevent2` int(100) DEFAULT NULL,
  `response1` int(5) DEFAULT NULL,
  `response2` int(5) DEFAULT NULL,
  `invitation1` int(5) DEFAULT NULL,
  `invitation2` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaibhav`
--

INSERT INTO `vaibhav` (`friend_id`, `event1`, `event2`, `createdevent1`, `createdevent2`, `response1`, `response2`, `invitation1`, `invitation2`) VALUES
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vaibhavhistory`
--

CREATE TABLE `vaibhavhistory` (
  `event_id` int(100) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `rating` int(5) DEFAULT NULL,
  `head_count` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vaibhavrecived`
--

CREATE TABLE `vaibhavrecived` (
  `friend_id` int(100) DEFAULT NULL,
  `response` int(5) DEFAULT NULL,
  `flag` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaibhavrecived`
--

INSERT INTO `vaibhavrecived` (`friend_id`, `response`, `flag`) VALUES
(8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vaibhavsent`
--

CREATE TABLE `vaibhavsent` (
  `friend_id` int(100) DEFAULT NULL,
  `response` int(5) DEFAULT NULL,
  `flag` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `varecived`
--

CREATE TABLE `varecived` (
  `friend_id` int(100) NOT NULL,
  `response` int(5) DEFAULT NULL,
  `flag` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vasent`
--

CREATE TABLE `vasent` (
  `friend_id` int(100) NOT NULL,
  `response` int(5) DEFAULT NULL,
  `flag` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `prakharsent`
--
ALTER TABLE `prakharsent`
  ADD UNIQUE KEY `friend_id` (`friend_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `v2022`
--
ALTER TABLE `v2022`
  ADD UNIQUE KEY `friend_id` (`friend_id`);

--
-- Indexes for table `v2022history`
--
ALTER TABLE `v2022history`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `va`
--
ALTER TABLE `va`
  ADD PRIMARY KEY (`friend_id`);

--
-- Indexes for table `vaibhav`
--
ALTER TABLE `vaibhav`
  ADD PRIMARY KEY (`friend_id`);

--
-- Indexes for table `varecived`
--
ALTER TABLE `varecived`
  ADD PRIMARY KEY (`friend_id`);

--
-- Indexes for table `vasent`
--
ALTER TABLE `vasent`
  ADD PRIMARY KEY (`friend_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7002;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2023 at 06:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lfprs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `aitest`
--

CREATE TABLE `aitest` (
  `id` int(11) NOT NULL,
  `petid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aitest`
--

INSERT INTO `aitest` (`id`, `petid`) VALUES
(2, 0),
(3, 0),
(5, 0),
(6, 2),
(10000, 0),
(10001, 66666);

-- --------------------------------------------------------

--
-- Table structure for table `notifylost`
--

CREATE TABLE `notifylost` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `petid` int(11) NOT NULL,
  `ownerid` int(11) NOT NULL,
  `petimage` varchar(255) NOT NULL,
  `contactname` varchar(255) NOT NULL,
  `contactnumber` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qrcode`
--

CREATE TABLE `qrcode` (
  `id` int(11) NOT NULL,
  `petid` varchar(255) NOT NULL,
  `qrtext` varchar(255) NOT NULL,
  `qrtest2` varchar(255) NOT NULL,
  `qrimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qrcode`
--

INSERT INTO `qrcode` (`id`, `petid`, `qrtext`, `qrtest2`, `qrimage`) VALUES
(1, '', 'testet', '', '1688222485.png'),
(2, '', 'testetasd', '', '1688222526.png'),
(3, '', 'asdfasdfasdf', '', '1688223322.png'),
(4, '', 'aa', '', '1688224251.png'),
(5, '', 'aa', '', '1688224475.png'),
(6, '', 'testestset', '', '1688224489.png'),
(7, '', 'alen', '', '1688224743.png'),
(8, '', 'alen', '', '1688224761.png'),
(9, '', 'alen', '', '1688224778.png'),
(10, '', 'alen', 'alenzmmb@gmail.com', 'images/64a04757266be.png'),
(11, '', 'alenzmmb@gmail.com', 'alenzmmb@gmail.com', 'images/64a047f0814b5.png'),
(12, '', 'test@test.com', 'test@test.com', 'images/64a0482fab94f.png'),
(13, '', 'asdfasdf', 'asdfasdf@asdf', 'images/64a05583bbd2b.png'),
(14, '', 'test', 'test@tse', 'images/64a118afe5b48.png'),
(15, '', 'test', 'testasdf@asd.copm', 'images/64a11a4c03607.png'),
(16, '', 'tsaeteaset', 'asdfasdfa@adsf.com', 'images/64a11aa5efc2a.png'),
(17, '', 'asdfasdf', 'asdfasdf@asdf.comk', 'images/64a11b10bf26a.png'),
(18, '', 'asdfasdfasdf', 'asdf@asdf.com', 'images/64a11b8648592.png'),
(19, '', 'asdfadsf', 'asdf@asdf.com', 'images/64a11bf38730d.png'),
(20, '', 'asdfasdfasdfasdfasdf', 'asdfasdf@asdf.com', 'images/64a11c4acb905.png'),
(21, '', '', 'asdfasdfasdfasdf@asdf.com', 'images/64a11c7a890f4.png'),
(22, '', '', 'asdfasdf@asdf.com', 'images/64a11ca1a7781.png'),
(23, '', 'asdfasdfasdfasdf', 'asdfasdf@asdf.com', 'images/64a11cf8462a9.png'),
(24, '', 'asdfasdf', 'asdafasdf@asdf.com', 'images/64a11d18f0965.png'),
(25, '', 'asdfasdfasdf', 'asdfasdf@asdf.coi', 'images/64a11ddcb40ca.png'),
(26, '', 'asdfasdfasdf', 'asdfasdf@asdf.com', 'images/64a11fe14bf52.png'),
(27, '', 'asdfasdfasdfasdf', 'asdfasdfasdfasdf', 'images/64a1201485674.png'),
(28, '', 'asdfasdfasdf', 'asdfasdf', 'images/64a1204340152.png'),
(29, '', 'asdfasdfasdf', 'asdfasdfasdf', 'images/64a12069926ef.png'),
(30, '99c69f', 'adsfasdfasdfasdf', 'asdfasdfasd', 'images/64a120abe7fea.png'),
(31, '2b6a44', 'ASDFASDFASD', 'FASDFASDFASD', 'images/64a12122c827d.png'),
(32, '13a7b1', 'asdfasdfasd', 'asdfasdfa@asdf.com', 'images/64a121ce34efb.png'),
(33, '13013a', '', '', 'images/64a1225ccb0d7.png'),
(34, 'd7deaf', 'testets', 'test@sdfs.com', 'images/64a122836b184.png'),
(35, '0c6ce7', 'testsaetset', 'asdfasdf@asd.com', 'images/64a122f0c738a.png');

-- --------------------------------------------------------

--
-- Table structure for table `registerpet`
--

CREATE TABLE `registerpet` (
  `id` int(11) NOT NULL,
  `petid` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL,
  `petname` varchar(255) NOT NULL,
  `pet` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `fur` varchar(255) NOT NULL,
  `petimage` varchar(255) NOT NULL,
  `ownersname` varchar(255) NOT NULL,
  `contactnumber` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `qr` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registerpet`
--

INSERT INTO `registerpet` (`id`, `petid`, `userid`, `petname`, `pet`, `breed`, `fur`, `petimage`, `ownersname`, `contactnumber`, `address`, `email`, `notes`, `qr`, `date`) VALUES
(14, '143362', 1, 'Brando', 'dog', 'Pitbull', 'Black', 'uploads/registeredpets/64a91b0bea3ad2023-07-08-10-15-07pitbull.jpg', 'Mark', '09761532523', 'Taguig City', 'mark@gmail.com', '', 'uploads/qrgenerated/64a91b0be4a5d.png', '2023-07-08'),
(15, '864856', 10, 'Cookie', 'dog', 'Japanese Breed', 'White', 'uploads/registeredpets/64a9508dbc5342023-07-08-14-03-25cook.jpg', 'Cherry Cantuba III', '09102560491', '1274 Tambunting St. Sta. Cruz Manila', 'cherry.7.18.02@gmail.com', 'saoli nyo lang may 50 kayo sakin.', 'uploads/qrgenerated/64a9508daac15.png', '2023-07-08'),
(23, 'fea11d', 1, 'Tyson', 'dog', 'Breed', 'Brown', 'uploads/registeredpets/64b148dcb7e7b2023-07-14-15-08-441.jpg', 'Alen', '09565284273', 'Tatalon, Quezon City', 'alenzmmb@gmail.com', 'Please contact me if ever', 'uploads/qrgenerated/64b148dca171a.png', '2023-07-14'),
(27, '4c12c3', 1, 'test', 'dog', 'tes', 'ttes', 'uploads/registeredpets/64b4171d4100f2023-07-16-18-13-17about-1.jpg', 'Alen Banez', '09565284273', 'Tatalon, Quezon City', 'alenzmmb@gmail.com', 'test', 'uploads/qrgenerated/64b4171d39e50.png', '2023-07-16'),
(28, '815a4b', 1, 'test', 'dog', 'test', 'etst', 'uploads/registeredpets/64b4176e80d6a2023-07-16-18-14-38gallery-5.jpg', 'Alen Banez', '09565284273', 'Tatalon, Quezon City', 'alenzmmb@gmail.com', 'asdf', 'uploads/qrgenerated/64b4176e7957c.png', '2023-07-16'),
(29, '9dc83a', 1, 'test2', 'dog', 'test', 'test', 'uploads/registeredpets/64b41827c763b2023-07-16-18-17-43about-1.jpg', 'Alen Banez', '09565284273', 'Tatalon, Quezon City', 'alenzmmb@gmail.com', 'asdfasdf', 'uploads/qrgenerated/64b41827bf953.png', '2023-07-16'),
(30, 'ccc241', 1, 'test', 'dog', 'test', 'test', 'uploads/registeredpets/64b4199a5d87f2023-07-16-18-23-54about-1.jpg', 'Alen Banez', '09565284273', 'Tatalon, Quezon City', 'alenzmmb@gmail.com', 'asdfasdf', 'uploads/qrgenerated/64b4199a56227.png', '2023-07-16'),
(32, '2635ec', 1, 'asdf', 'dog', 'asdf', 'asdfasdf', 'uploads/registeredpets/64b4259ac45412023-07-16-19-15-06about-1.jpg', 'Alen Banez', '09565284273', 'Tatalon, Quezon City', 'alenzmmb@gmail.com', 'asdf', 'uploads/qrgenerated/64b4259abd8bc.png', '2023-07-16'),
(34, 'edec04', 1, 'test', 'dog', 'test', 'asdf', 'uploads/registeredpets/64b426941581c2023-07-16-19-19-16about-1.jpg', 'Alen Banez', '09565284273', 'Tatalon, Quezon City', 'alenzmmb@gmail.com', 'asdf', 'uploads/qrgenerated/64b426940e97d.png', '2023-07-16'),
(36, '0521f2', 1, '0', '0', 'tes', 'testetst', 'uploads/registeredpets/64b462f0261fe2023-07-16-23-36-48about-1.jpg', 'Alen Banez', '09565284273', 'Tatalon, Quezon City', 'alenzmmb@gmail.com', 'test', 'uploads/qrgenerated/64b462f01f4a6.png', '2023-07-16'),
(39, 'f41ee9', 1, 'asdf', 'dog', 'as', 'dfasdf', 'uploads/registeredpets/64b538a5363922023-07-17-14-48-37about-1.jpg', 'Alen Banez', '09565284273', 'Tatalon, Quezon City', 'alenzmmb@gmail.com', 'asdf', 'uploads/qrgenerated/64b538a522d9c.png', '2023-07-17'),
(40, 'eac5cc', 1, 'asdf', 'dog', 'asdf', 'asdf', 'uploads/registeredpets/64b539a4ebfdf2023-07-17-14-52-52about-1.jpg', 'Alen Banez', '09565284273', 'Tatalon, Quezon City', 'alenzmmb@gmail.com', '', 'uploads/qrgenerated/64b539a4e41c8.png', '2023-07-17');

-- --------------------------------------------------------

--
-- Table structure for table `reportfoundpet`
--

CREATE TABLE `reportfoundpet` (
  `id` int(11) NOT NULL,
  `registered` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `petid` varchar(255) NOT NULL,
  `petname` varchar(255) NOT NULL,
  `pet` varchar(255) NOT NULL,
  `fur` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `petimage` varchar(255) NOT NULL,
  `placefound` varchar(255) NOT NULL,
  `foundername` varchar(255) NOT NULL,
  `foundercontact` varchar(255) NOT NULL,
  `founderemail` varchar(255) NOT NULL,
  `surrender` int(11) NOT NULL,
  `authorityname` varchar(255) NOT NULL,
  `authoritycontact` varchar(255) NOT NULL,
  `authorityaddress` varchar(255) NOT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT 1,
  `date` date NOT NULL,
  `expirationdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reportfoundpet`
--

INSERT INTO `reportfoundpet` (`id`, `registered`, `userid`, `petid`, `petname`, `pet`, `fur`, `breed`, `petimage`, `placefound`, `foundername`, `foundercontact`, `founderemail`, `surrender`, `authorityname`, `authoritycontact`, `authorityaddress`, `approved`, `date`, `expirationdate`) VALUES
(13, 0, 1, '143362', 'Brando', 'dog', 'Black', 'Pitbull', 'uploads/foundpets/64b48007817872023-07-17-01-40-55gallery-2.jpg', 'test2', 'Alen Banez', '09565284273', 'alenzmmb@gmail.com', 0, '', '', '', 0, '2023-07-17', '2023-09-17'),
(14, 0, 1, '143362', 'Brando', 'dog', 'Black', 'Pitbull', 'uploads/foundpets/64b4804b04fd02023-07-17-01-42-03about.jpg', 'test', 'Alen Banez', '09565284273', 'alenzmmb@gmail.com', 0, '', '', '', 0, '2023-07-17', '2023-09-17'),
(15, 1, 1, '143362', 'Brando', 'dog', 'Black', 'Pitbull', 'uploads/foundpets/64b480b9d7d492023-07-17-01-43-53bg_1.jpg', 'test', 'Alen Banez', '09565284273', 'alenzmmb@gmail.com', 0, '', '', '', 1, '2023-07-17', '2023-09-17');

-- --------------------------------------------------------

--
-- Table structure for table `reportlostpet`
--

CREATE TABLE `reportlostpet` (
  `id` int(11) NOT NULL,
  `registered` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `petname` varchar(255) NOT NULL,
  `pet` varchar(255) NOT NULL,
  `fur` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `petimage` varchar(255) NOT NULL,
  `lastfound` varchar(255) NOT NULL,
  `contactname` varchar(255) NOT NULL,
  `contactnumber` varchar(255) NOT NULL,
  `contactemail` varchar(255) NOT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT 1,
  `date` date NOT NULL,
  `expirationdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reportlostpet`
--

INSERT INTO `reportlostpet` (`id`, `registered`, `userid`, `petname`, `pet`, `fur`, `breed`, `petimage`, `lastfound`, `contactname`, `contactnumber`, `contactemail`, `approved`, `date`, `expirationdate`) VALUES
(34, 1, 1, 'Brando', 'dog', 'Black', 'Pitbull', 'uploads/lostpets/64b46287be1082023-07-16-23-35-03about-1.jpg', 'test', 'Alen Banez', '09565284273', 'alenzmmb@gmail.com', 1, '2023-07-16', '2023-09-16'),
(37, 1, 1, 'test', 'dog', 'testetst', 'tes', 'uploads/lostpets/64b4637904fde2023-07-16-23-39-05about.jpg', 'test', 'Alen Banez', '09565284273', 'alenzmmb@gmail.com', 1, '2023-07-16', '2023-09-16'),
(39, 1, 1, 'bcv', 'dog', 'cvb', 'cbv', 'uploads/lostpets/64b46c01569ab2023-07-17-00-15-29gallery-5.jpg', 'cvb', 'Alen Banez', '09565284273', 'alenzmmb@gmail.com', 0, '2023-07-17', '2023-09-17'),
(40, 1, 1, 'vbn', 'dog', 'vbn', 'vbn', 'uploads/lostpets/64b46c1bd02ac2023-07-17-00-15-55gallery-3.jpg', 'vbn', 'Alen Banez', '09565284273', 'alenzmmb@gmail.com', 0, '2023-07-17', '2023-09-17'),
(41, 0, 1, 'dsa', 'dog', 'asd', 'asd', 'uploads/lostpets/64b46cf89f6de2023-07-17-00-19-36image_5.jpg', 'asd', 'Alen Banez', '09565284273', 'alenzmmb@gmail.com', 0, '2023-07-17', '2023-09-17'),
(43, 0, 1, 'TESTER', 'dog', 'asdfasdfTESTER', 'asdfTESTER', 'uploads/lostpets/64b537b778fd02023-07-17-14-44-39about-1.jpg', 'TESTER', 'Alen Banez', '09565284273', 'alenzmmb@gmail.com', 1, '2023-07-17', '2023-09-17');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `loc` varchar(255) NOT NULL,
  `test2` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `loc`, `test2`, `date`) VALUES
(1, 'uploads/1920-doctor-holding-touching-hands-asian-senior-or-elderly-old-lady-woman-patient-with-love-care-helping-encourage-and-empathy-at-nursing-hospital-ward-healthy-strong-medical-con.jpg', '', '2023-07-02'),
(2, 'uploads/foundpets/1.png', 'uploads/lostpets/2Brigino.png', '2023-07-02'),
(3, 'uploads/foundpets/22.png', 'uploads/lostpets/22.png', '2023-07-02'),
(4, 'uploads/foundpets/64a06d0091c9f2023-07-01-20-14-24IMG.jpg', 'uploads/lostpets/64a06d00925e32023-07-01-20-14-24IMG.png', '2023-07-02'),
(5, 'uploads/foundpets/64a10ffdd6d432023-07-02-07-49-49Bulb On.png', 'uploads/lostpets/64a10ffdd85002023-07-02-07-49-49Bulb Off.png', '0000-00-00'),
(6, 'uploads/foundpets/64a11123300332023-07-02-07-54-43Activity-6.gif', 'uploads/lostpets/64a11123301942023-07-02-07-54-43Alen.jpg', '2023-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `test2`
--

CREATE TABLE `test2` (
  `id` int(11) NOT NULL,
  `pet` varchar(255) NOT NULL,
  `petcollar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test2`
--

INSERT INTO `test2` (`id`, `pet`, `petcollar`) VALUES
(1, '1', 'uploads/qrimage/2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `is_verified` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `phonenumber`, `address`, `password`, `verification_code`, `is_verified`) VALUES
(1, 'Alen', 'Banez', 'alenzmmb@gmail.com', '09565284273', 'Tatalon, Quezon City', '123', '', 1),
(10, 'Cherry', 'Cantuba III', 'cherry.7.18.02@gmail.com', '09102560491', '1274 Tambunting St. Sta. Cruz Manila', '-640509040147Che-', '9b388bb5a59e6bef152b9d46b0c55bcb', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aitest`
--
ALTER TABLE `aitest`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`petid`);

--
-- Indexes for table `notifylost`
--
ALTER TABLE `notifylost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifyownerid` (`ownerid`),
  ADD KEY `notifypetid` (`petid`),
  ADD KEY `notifyuserid` (`userid`);

--
-- Indexes for table `qrcode`
--
ALTER TABLE `qrcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registerpet`
--
ALTER TABLE `registerpet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registeruserid` (`userid`);

--
-- Indexes for table `reportfoundpet`
--
ALTER TABLE `reportfoundpet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userfoundpet` (`userid`);

--
-- Indexes for table `reportlostpet`
--
ALTER TABLE `reportlostpet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userlostpet` (`userid`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test2`
--
ALTER TABLE `test2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
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
-- AUTO_INCREMENT for table `aitest`
--
ALTER TABLE `aitest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10002;

--
-- AUTO_INCREMENT for table `notifylost`
--
ALTER TABLE `notifylost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `qrcode`
--
ALTER TABLE `qrcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `registerpet`
--
ALTER TABLE `registerpet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `reportfoundpet`
--
ALTER TABLE `reportfoundpet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reportlostpet`
--
ALTER TABLE `reportlostpet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `test2`
--
ALTER TABLE `test2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notifylost`
--
ALTER TABLE `notifylost`
  ADD CONSTRAINT `notifyownerid` FOREIGN KEY (`ownerid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notifypetid` FOREIGN KEY (`petid`) REFERENCES `reportlostpet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifyuserid` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registerpet`
--
ALTER TABLE `registerpet`
  ADD CONSTRAINT `registeruserid` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reportfoundpet`
--
ALTER TABLE `reportfoundpet`
  ADD CONSTRAINT `userfoundpet` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reportlostpet`
--
ALTER TABLE `reportlostpet`
  ADD CONSTRAINT `userlostpet` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

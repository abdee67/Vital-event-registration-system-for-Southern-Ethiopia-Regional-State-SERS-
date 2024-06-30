-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2024 at 09:35 PM
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
-- Database: `vera`
--

-- --------------------------------------------------------

--
-- Table structure for table `adoptevent`
--

CREATE TABLE `adoptevent` (
  `id` int(4) NOT NULL,
  `childbirthnum` varchar(30) NOT NULL,
  `fnameadopt` varchar(50) NOT NULL,
  `mnameadopt` varchar(50) NOT NULL,
  `lnameadopt` varchar(50) NOT NULL,
  `dobadopt` varchar(50) NOT NULL,
  `nationlityadopt` varchar(50) NOT NULL,
  `sexadopt` varchar(10) NOT NULL,
  `motherfname` varchar(100) NOT NULL,
  `adoptphoto` varchar(100) NOT NULL,
  `newfname` varchar(30) NOT NULL,
  `newmname` varchar(30) NOT NULL,
  `newlname` varchar(30) NOT NULL,
  `currparentfname` varchar(100) NOT NULL,
  `currparentplace` varchar(100) NOT NULL,
  `currparentphone` varchar(15) NOT NULL,
  `currparentphoto` varchar(100) NOT NULL,
  `courtname` varchar(100) NOT NULL,
  `attorneyfname` varchar(100) NOT NULL,
  `attorneyphone` varchar(15) NOT NULL,
  `rcode` varchar(3) NOT NULL,
  `zcode` varchar(3) NOT NULL,
  `wcode` varchar(3) NOT NULL,
  `kcode` varchar(4) NOT NULL,
  `adoptnum` varchar(30) NOT NULL,
  `regyear` varchar(10) NOT NULL,
  `regday` varchar(20) NOT NULL,
  `regmonth` varchar(20) NOT NULL,
  `age` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `adoptevent`
--

INSERT INTO `adoptevent` (`id`, `childbirthnum`, `fnameadopt`, `mnameadopt`, `lnameadopt`, `dobadopt`, `nationlityadopt`, `sexadopt`, `motherfname`, `adoptphoto`, `newfname`, `newmname`, `newlname`, `currparentfname`, `currparentplace`, `currparentphone`, `currparentphoto`, `courtname`, `attorneyfname`, `attorneyphone`, `rcode`, `zcode`, `wcode`, `kcode`, `adoptnum`, `regyear`, `regday`, `regmonth`, `age`) VALUES
(32, '', 'Abebe', 'Bekele', 'Atole', '2023-03-10', 'Ethiopian', 'Male', 'almaz belay', '@WallPaper_PC (6042).jpg', 'Mikail Werku', 'WERKU', 'AYTENEW', 'WERKU AYTENEW', 'DEBRE WERKE', '0947414310', 'photo_2024-04-29_17-23-21.jpg', 'Shaggar City', 'MR Ashenafi Belete', '0909090945', '07', '01', '03', '07', '0701030702024', '2024', '10-05-2024', 'May', '');

-- --------------------------------------------------------

--
-- Table structure for table `birthevent`
--

CREATE TABLE `birthevent` (
  `id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `mname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `momName` varchar(200) NOT NULL,
  `day` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `nationality` varchar(200) NOT NULL,
  `weight` varchar(200) NOT NULL,
  `blood` varchar(200) NOT NULL,
  `region` varchar(3) NOT NULL,
  `zone` varchar(3) NOT NULL,
  `woreda` varchar(3) NOT NULL,
  `kebele` varchar(3) NOT NULL,
  `eventnumber` varchar(30) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regtype` varchar(100) NOT NULL,
  `regyear` varchar(10) NOT NULL,
  `regdate` varchar(30) NOT NULL,
  `maritialStatus` varchar(20) NOT NULL,
  `marriageid` varchar(50) NOT NULL,
  `regmonth` varchar(20) NOT NULL,
  `age` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `birthevent`
--

INSERT INTO `birthevent` (`id`, `fname`, `mname`, `lname`, `momName`, `day`, `sex`, `nationality`, `weight`, `blood`, `region`, `zone`, `woreda`, `kebele`, `eventnumber`, `status`, `regtype`, `regyear`, `regdate`, `maritialStatus`, `marriageid`, `regmonth`, `age`) VALUES
(43, 'Abebe', 'Bekele', 'Atole', 'Abebech Tolosa', '2000-03-10', 'Male', 'Ethiopian', '4', 'B', '07', '01', '03', '07', '0701030712024', 'Dead', 'Passive', '2024', '10-05-2024', 'UnMarried', '', 'May', '24'),
(44, 'Kasahun', 'Belete', 'Kedahegn', 'Abebech Nalegne', '2023-11-02', 'Male', 'Ethiopian', '2', 'AB', '07', '01', '03', '07', '07010307442024', 'Dead', 'Active', '2024', '10-05-2024', 'UnMarried', '', 'May', '0');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `name`, `email`, `message`, `date`) VALUES
(1, 'Abdulaziz  Muhammed ', 'mcnan6@gmail.com', 'awesome', '2024 Feb Thu @ 07:29'),
(2, 'Natnael Solomon', 'natiyo47@gmail.com', 'TBH This is hilarious!Keep goin!!', '2024 Apr Wed @ 09:37');

-- --------------------------------------------------------

--
-- Table structure for table `deathevent`
--

CREATE TABLE `deathevent` (
  `id` int(5) NOT NULL,
  `birtheventnum` varchar(20) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `title` varchar(40) NOT NULL,
  `religion` varchar(40) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `edubackg` varchar(50) NOT NULL,
  `job` varchar(100) NOT NULL,
  `cause` varchar(200) NOT NULL,
  `dateofdeath` varchar(20) NOT NULL,
  `rcode` varchar(2) NOT NULL,
  `zcode` varchar(2) NOT NULL,
  `wcode` varchar(2) NOT NULL,
  `kcode` varchar(3) NOT NULL,
  `eventnumber` varchar(30) NOT NULL,
  `regyear` varchar(10) NOT NULL,
  `regmonth` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `deathevent`
--

INSERT INTO `deathevent` (`id`, `birtheventnum`, `fname`, `mname`, `lname`, `sex`, `nationality`, `title`, `religion`, `dob`, `edubackg`, `job`, `cause`, `dateofdeath`, `rcode`, `zcode`, `wcode`, `kcode`, `eventnumber`, `regyear`, `regmonth`) VALUES
(21, '', 'Abebe', 'Bekele', 'Atole', 'Female', 'Ethiopian', 'Mr.', 'Orthodox', '2000-03-10', '', 'Teacher', 'Measles', '10-05-2024', '07', '01', '03', '07', '0701030712024', '2024', 'May'),
(22, '', 'Aselefech', 'Mideksa', 'Belachew', 'Female', 'Ethiopian', 'Mrs.', 'Orthodox', '1992-10-10', '', 'Teacher', 'Cancer', '10-05-2024', '07', '01', '03', '07', '07010307222024', '2024', 'May'),
(23, '07010307442024', 'Kasahun', 'Belete', 'Kedahegn', 'Male', 'Ethiopian', 'Mr.', 'Orthodox', '2023-11-02', '', 'Teacher', 'Pneumonia', '2024-06-27', '07', '01', '03', '07', '07010307232024', '2024', 'June'),
(24, '0701030712024', 'Abebe', 'Bekele', 'Atole', 'Male', 'Ethiopian', 'Mr.', 'Protestant', '2000-03-10', '', 'Teacher', 'Measles', '2024-06-27', '07', '01', '03', '07', '07010307242024', '2024', 'June');

-- --------------------------------------------------------

--
-- Table structure for table `divorceevent`
--

CREATE TABLE `divorceevent` (
  `id` int(5) NOT NULL,
  `wfnamedv` varchar(50) NOT NULL,
  `wmnamedv` varchar(50) NOT NULL,
  `wlnamedv` varchar(50) NOT NULL,
  `wnationalitydv` varchar(50) NOT NULL,
  `wreligiondv` varchar(50) NOT NULL,
  `wjobdv` varchar(50) NOT NULL,
  `wphotodv` varchar(50) NOT NULL,
  `hfnamedv` varchar(50) NOT NULL,
  `hmnamedv` varchar(50) NOT NULL,
  `hlnamedv` varchar(50) NOT NULL,
  `hnationalitydv` varchar(50) NOT NULL,
  `hreligiondv` varchar(50) NOT NULL,
  `hjobdv` varchar(50) NOT NULL,
  `hphotodv` varchar(100) NOT NULL,
  `placedv` varchar(50) NOT NULL,
  `childnum` varchar(2) NOT NULL,
  `reasondv` varchar(200) NOT NULL,
  `courtnamedv` varchar(50) NOT NULL,
  `daydv` varchar(20) NOT NULL,
  `rcode` varchar(3) NOT NULL,
  `zcode` varchar(3) NOT NULL,
  `wcode` varchar(3) NOT NULL,
  `kcode` varchar(3) NOT NULL,
  `dveventnum` varchar(30) NOT NULL,
  `marriagenum` varchar(30) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regyear` varchar(10) NOT NULL,
  `regmonth` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `divorceevent`
--

INSERT INTO `divorceevent` (`id`, `wfnamedv`, `wmnamedv`, `wlnamedv`, `wnationalitydv`, `wreligiondv`, `wjobdv`, `wphotodv`, `hfnamedv`, `hmnamedv`, `hlnamedv`, `hnationalitydv`, `hreligiondv`, `hjobdv`, `hphotodv`, `placedv`, `childnum`, `reasondv`, `courtnamedv`, `daydv`, `rcode`, `zcode`, `wcode`, `kcode`, `dveventnum`, `marriagenum`, `status`, `regyear`, `regmonth`) VALUES
(21, 'Klakidan', 'Asefa', 'Tebarek', 'Ethiopian', 'Catholic', 'Yebet Imebet', '@WallPaper_PC (3494).jpg', 'Tirunehe', 'Smeneh', 'Tigabu', 'Ethiopian', 'Protestant', 'Ken Serategna', 'photo_2024-04-19_19-38-04.jpg', '07', '3', 'Mist-Hule eyeskere eyemat enena ljochen selam iyenesan new!!Bekagne ene kezi sekaram bet ayseram gar!!', 'Yesefer Abatoch', '10-05-2024', '07', '01', '03', '07', '0701030712024', '', 'divorced', '', ''),
(23, 'Hlina', 'Asefa', 'Dokule', 'Ethiopian', 'Orthodox', 'Yebet Imebet', 'desk.png', 'Kebede', 'Andargachew', 'Billgne', 'Ethiopian', 'Protestant', 'Ken Serategna', 'download.jpg', '07', '3', 'Mist-Hule eyeskere eyemat enena ljochen selam iyenesan new!!Bekagne ene kezi sekaram bet ayseram gar!!', 'Yesefer Abatoch', '27-06-2024', '07', '01', '03', '07', '07010307222024', '0701030712024', 'divorced', '27-06-2024', 'June');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `day` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kebele`
--

CREATE TABLE `kebele` (
  `id` int(3) NOT NULL,
  `num` varchar(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `woreda` varchar(50) NOT NULL,
  `zone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kebele`
--

INSERT INTO `kebele` (`id`, `num`, `name`, `woreda`, `zone`) VALUES
(38, '07', 'adis', '03', '01');

-- --------------------------------------------------------

--
-- Table structure for table `marriagevent`
--

CREATE TABLE `marriagevent` (
  `id` int(5) NOT NULL,
  `wbirthnum` varchar(30) NOT NULL,
  `wfname` varchar(100) NOT NULL,
  `wmname` varchar(100) NOT NULL,
  `wlname` varchar(100) NOT NULL,
  `wsex` varchar(10) NOT NULL,
  `wnationality` varchar(50) NOT NULL,
  `wreligion` varchar(50) NOT NULL,
  `wjob` varchar(100) NOT NULL,
  `wphoto` varchar(200) NOT NULL,
  `hbirthnum` varchar(30) NOT NULL,
  `hfname` varchar(100) NOT NULL,
  `hmname` varchar(100) NOT NULL,
  `hlname` varchar(100) NOT NULL,
  `hsex` varchar(10) NOT NULL,
  `hnationality` varchar(100) NOT NULL,
  `hreligion` varchar(50) NOT NULL,
  `hjob` varchar(100) NOT NULL,
  `hphoto` varchar(100) NOT NULL,
  `wreferencefname1` varchar(100) NOT NULL,
  `wreferencefname2` varchar(100) NOT NULL,
  `hreferencefname1` varchar(100) NOT NULL,
  `hreferencefname2` varchar(100) NOT NULL,
  `marriageday` varchar(50) NOT NULL,
  `rcode` varchar(3) NOT NULL,
  `zcode` varchar(3) NOT NULL,
  `wcode` varchar(3) NOT NULL,
  `kcode` varchar(3) NOT NULL,
  `marriagenum` varchar(30) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regyear` varchar(10) NOT NULL,
  `regmonth` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `marriagevent`
--

INSERT INTO `marriagevent` (`id`, `wbirthnum`, `wfname`, `wmname`, `wlname`, `wsex`, `wnationality`, `wreligion`, `wjob`, `wphoto`, `hbirthnum`, `hfname`, `hmname`, `hlname`, `hsex`, `hnationality`, `hreligion`, `hjob`, `hphoto`, `wreferencefname1`, `wreferencefname2`, `hreferencefname1`, `hreferencefname2`, `marriageday`, `rcode`, `zcode`, `wcode`, `kcode`, `marriagenum`, `status`, `regyear`, `regmonth`) VALUES
(12, '', 'Hlina', 'Asefa', 'Dokule', 'Female', 'Ethiopian', 'Protestant', 'Waiter', '@WallPaper_PC (0017).jpg', '', 'Kebede', 'Andargachew', 'Billgne', 'Male', 'Ethiopian', 'Protestant', 'Merchant', '@WallPaper_PC (3494).jpg', 'Aselefu', 'AsefaDokule', 'KebeduSlachew', 'Yenenesh', '10-05-2024', '07', '01', '03', '07', '0701030712024', 'Divorced', '2024', 'May'),
(13, '', 'Klakidan', 'Asefa', 'Tebarek', 'Female', 'Ethiopian', 'Catholic', 'Typist', '@WallPaper_PC (6042).jpg', '', 'Tirunehe', 'Smeneh', 'Tigabu', 'Male', 'Ethiopian', 'Catholic', 'Merchant', '@WallPaper_PC (1460).jpg', 'Asefa', 'Tirunesh', 'Tirunehe', 'yebeltal', '10-05-2024', '07', '01', '03', '07', '07010307132024', 'Married', '2024', 'May');

-- --------------------------------------------------------

--
-- Table structure for table `memberuser`
--

CREATE TABLE `memberuser` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(200) NOT NULL,
  `pic` varchar(400) NOT NULL,
  `rcode` varchar(2) NOT NULL,
  `zcode` varchar(2) NOT NULL,
  `wcode` varchar(2) NOT NULL,
  `kcode` varchar(2) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `firstlogin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `memberuser`
--

INSERT INTO `memberuser` (`id`, `name`, `email`, `phone`, `password`, `role`, `pic`, `rcode`, `zcode`, `wcode`, `kcode`, `FullName`, `firstlogin`) VALUES
(125, 'ABDULAZIZ', 'alaziizz67@gmail.com', '0977764845', '96e79218965eb72c92a549dd5a330112', 'admin', 'abdi.jpg', '07', '', '', '', 'Abdulaziz Muhammed', ''),
(147, 'Nati', 'natiyo@47gmail.com', '0986200611', '649c416172844fe1f1ec1dd3ae5783e0', 'Rver', 'Screenshot (5).png', '07', '', '', '', 'Natnael Solomon', '1'),
(148, 'ABENI', 'abeni@gmail.com', '0990099009', 'd8e323a810eeafb627bac2fb37e1440a', 'Zver', 'Screenshot (25).png', '07', '01', '', '', 'Abenezer Tesfaye', '1'),
(159, 'ASHU', 'ashu@gmail.com', '0990099234', '540f9ff61b54e004c26e346ffb4d3c1b', 'Wver', 'Screenshot (2).png', '07', '01', '03', '', 'Ashenafi Kendelo', '1'),
(170, 'ASFAW', 'asfaw@gmail.com', '0990099022', 'f42fdfea46ade58fd853615ddfbfe1eb', 'Kver', '@WallPaper_PC (1577).jpg', '07', '01', '03', '07', 'Asfaw Gzachew', '1');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `postedtime` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `postedtime`, `image`) VALUES
(2, 'ZONE UPDATE! ', 'helolllllllllllllllllllooooooooooooooooooooooeeeeee', '2024 May Tue 21:34:27', '');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(3) NOT NULL,
  `num` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `num`, `name`) VALUES
(1, '07', 'SNNP');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `eventnumber` varchar(30) NOT NULL,
  `forwhom` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `detail` varchar(4000) NOT NULL,
  `zone` varchar(3) NOT NULL,
  `woreda` varchar(3) NOT NULL,
  `kebele` varchar(3) NOT NULL,
  `day` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `reportby` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `eventnumber`, `forwhom`, `title`, `detail`, `zone`, `woreda`, `kebele`, `day`, `role`, `reportby`, `type`) VALUES
(58, '0701030712024', 'ARBAMINCH', 'MARRAIGE REPOR', '<p>sadf</p>\r\n', '01', '03', '07', '', 'Rver', 'nati', 'Death');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `slide_name` varchar(255) DEFAULT NULL,
  `slide_image` varchar(255) DEFAULT NULL,
  `slide_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slide_name`, `slide_image`, `slide_url`) VALUES
(20, 'mv', 'Screenshot (73).png', 'llllllllll'),
(21, 'vx', '28628656400_98ec0152e3_b.jpg', 'lddckv'),
(22, 'vd', 'images (5).jpeg', 'lddcks');

-- --------------------------------------------------------

--
-- Table structure for table `woreda`
--

CREATE TABLE `woreda` (
  `id` int(3) NOT NULL,
  `num` varchar(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `zone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `woreda`
--

INSERT INTO `woreda` (`id`, `num`, `name`, `zone`) VALUES
(50, '03', 'Arbaminch city', '01');

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `id` int(11) NOT NULL,
  `num` varchar(3) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`id`, `num`, `name`) VALUES
(41, '01', 'GOFA ZONE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoptevent`
--
ALTER TABLE `adoptevent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rcode` (`rcode`);

--
-- Indexes for table `birthevent`
--
ALTER TABLE `birthevent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deathevent`
--
ALTER TABLE `deathevent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divorceevent`
--
ALTER TABLE `divorceevent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kebele`
--
ALTER TABLE `kebele`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marriagevent`
--
ALTER TABLE `marriagevent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberuser`
--
ALTER TABLE `memberuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `woreda`
--
ALTER TABLE `woreda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoptevent`
--
ALTER TABLE `adoptevent`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `birthevent`
--
ALTER TABLE `birthevent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deathevent`
--
ALTER TABLE `deathevent`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `divorceevent`
--
ALTER TABLE `divorceevent`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kebele`
--
ALTER TABLE `kebele`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `marriagevent`
--
ALTER TABLE `marriagevent`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `memberuser`
--
ALTER TABLE `memberuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `woreda`
--
ALTER TABLE `woreda`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

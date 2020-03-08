-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2018 at 08:14 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movietheater`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `BranchName` varchar(50) NOT NULL,
  `District` varchar(20) NOT NULL,
  `Address` text NOT NULL,
  `TheaterAmount` int(11) NOT NULL,
  `BranchTel` varchar(11) NOT NULL,
  `AvailableTime` varchar(13) NOT NULL,
  `SellLocation` varchar(20) NOT NULL,
  `TheaterLocation` varchar(20) NOT NULL,
  `BranchManager` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`BranchName`, `District`, `Address`, `TheaterAmount`, `BranchTel`, `AvailableTime`, `SellLocation`, `TheaterLocation`, `BranchManager`) VALUES
('BNKCinema', 'Bangkok', '693 Sukumvit Road, Watthana,Bangkok 10110', 3, '023333333', '10:00-22:00', '4th floor, Emquotier', '5th floor, Emquotier', 'Mr.Job San'),
('KMUTT', 'Bangkok', '126 Pracha Uthit Road, Thung Khru, Bangkok 10140', 5, '022222222', '10:00-22:00', '12th floor, WW Bd.', '12th floor, WW Bd.', 'Mr.Chertam Manman');

-- --------------------------------------------------------

--
-- Table structure for table `buying`
--

CREATE TABLE `buying` (
  `OrderID` int(11) NOT NULL,
  `OrderType` varchar(10) NOT NULL,
  `Method` varchar(10) NOT NULL,
  `ProCode` varchar(4) DEFAULT NULL,
  `TransID` int(11) DEFAULT NULL,
  `CardNo` varchar(16) DEFAULT NULL,
  `CardHolder` varchar(60) DEFAULT NULL,
  `Bank` varchar(3) DEFAULT NULL,
  `EXPDate` date DEFAULT NULL,
  `SecurityCode` int(11) DEFAULT NULL,
  `PriceID` varchar(5) NOT NULL,
  `Cost` float NOT NULL,
  `ShowtimeID` varchar(9) NOT NULL,
  `MemberCode` int(11) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buying`
--

INSERT INTO `buying` (`OrderID`, `OrderType`, `Method`, `ProCode`, `TransID`, `CardNo`, `CardHolder`, `Bank`, `EXPDate`, `SecurityCode`, `PriceID`, `Cost`, `ShowtimeID`, `MemberCode`, `Timestamp`) VALUES
(1, 'Counter', 'Cash', 'M001', NULL, NULL, NULL, NULL, NULL, NULL, '5FRFV', 720, '610427002', 1, '2018-04-27 06:31:35'),
(1, 'Counter', 'Cash', 'M001', NULL, NULL, NULL, NULL, NULL, NULL, '5FRFV', 720, '610427002', 2, '2018-04-27 06:31:18'),
(2, 'Online', 'Transfer', 'M001', 1, '1234231434122134', 'Tamtam Manman', 'KTB', '2019-01-05', 123, '5FRFR', 315, '610427003', 2, '2018-04-28 05:52:40');

-- --------------------------------------------------------

--
-- Table structure for table `membercard`
--

CREATE TABLE `membercard` (
  `MemberCode` int(11) NOT NULL,
  `CardType` varchar(20) NOT NULL,
  `PersonalID` varchar(13) NOT NULL,
  `Member_FName` varchar(30) NOT NULL,
  `Member_LName` varchar(30) NOT NULL,
  `Sex` char(1) NOT NULL,
  `Occupation` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `MemberTel` varchar(12) NOT NULL,
  `MemberEmail` varchar(40) NOT NULL,
  `MemberStart` date NOT NULL,
  `MemberEnd` date NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MemberPoint` float NOT NULL,
  `MemberCash` int(11) NOT NULL,
  `ReviewAmount` int(11) NOT NULL,
  `HistoryAmount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membercard`
--

INSERT INTO `membercard` (`MemberCode`, `CardType`, `PersonalID`, `Member_FName`, `Member_LName`, `Sex`, `Occupation`, `DOB`, `MemberTel`, `MemberEmail`, `MemberStart`, `MemberEnd`, `Timestamp`, `MemberPoint`, `MemberCash`, `ReviewAmount`, `HistoryAmount`) VALUES
(1, 'Student', '1100100110111', 'Nutaya', 'Prawan', 'F', 'Student', '1998-04-29', '0912345678', 'xx@gmail.com', '2018-04-26', '2019-04-26', '2018-04-28 05:58:19', 46, 200, 1, 1),
(2, 'Student', '1100100220221', 'Natcha', 'Pam', 'F', 'Student', '1997-09-30', '0811911112', 'pz@gmail.com', '2018-04-27', '2019-04-27', '2018-04-28 05:58:34', 46, 0, 1, 1),
(3, 'Student', '1100100331323', 'Tamtam', 'Manman', 'F', 'Student', '1997-11-07', '0811121150', 'txm@gmail.com', '2018-04-27', '2019-04-27', '2018-04-28 06:01:40', 25.75, 500, 1, 1),
(4, 'Student', '1100100412314', 'Minto', 'Tama', 'F', 'Student', '1997-08-27', '0819876543', 'mmm@gmail,com', '2018-05-13', '2019-05-13', '2018-04-26 09:10:24', 0, 0, 0, 0),
(5, 'Student', '1100100454343', 'Noom', 'Sturtle', 'F', 'Student', '1998-03-09', '0987654321', 'hti@gmail.com', '2018-05-14', '2019-05-14', '2018-04-26 09:10:24', 0, 0, 0, 0),
(6, 'Regular', '1100100543565', 'Janwat', 'Tuetatsen', 'F', 'Actress', '1994-04-08', '0976543210', 'xoxo@gmail.com', '2018-05-14', '2019-05-14', '2018-04-28 05:19:40', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `membertype`
--

CREATE TABLE `membertype` (
  `CardType` varchar(20) NOT NULL,
  `Age` varchar(10) NOT NULL,
  `Discount` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membertype`
--

INSERT INTO `membertype` (`CardType`, `Age`, `Discount`) VALUES
('Regular', 'over 20', '5%'),
('Student', '7 - 22', '10%'),
('VIP', '-', '20%');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `MovieID` varchar(5) NOT NULL,
  `MovieName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `Length` int(11) NOT NULL,
  `Language` varchar(20) NOT NULL,
  `Genre` varchar(50) NOT NULL,
  `ReleaseDate` date NOT NULL,
  `Rate` varchar(10) DEFAULT NULL,
  `Story` text CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `Director` varchar(50) NOT NULL,
  `StarAvg` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`MovieID`, `MovieName`, `Length`, `Language`, `Genre`, `ReleaseDate`, `Rate`, `Story`, `Director`, `StarAvg`) VALUES
('C0001', 'Operation Red Sea', 139, 'Chinese', 'Drama / Romance', '2018-05-31', 'G', 'PLA Navy Marine Corps launch a hostage rescue operation in Ihwea and undergo a fierce battle with rebellions and terrorism.', 'Dante Lam', NULL),
('E0001', 'Avengers : Infinity War', 150, 'English', 'Action / Adventure / Fantasy', '2018-04-25', 'G', 'Avengers Assemble! After a Civil War, a Ragnarok, and the fight for Wakanda?Marvel?s mightiest heroes are coming back together for a fight of galactic proportions. Marvel Studios? ?Avengers: Infinity War? brings together the original team and more to unite and battle against the Mad Titan himself,Thanos.', 'Anthony Russo, Joe Russo', 5),
('E0002', 'I Kill Giants', 106, 'English', 'Drama / Fantasy / Thriller ', '2018-05-03', 'G', '\"I Kill Giants\" tells the story of a young misfit girl named Barbara (Wolfe) battling both real and imaginary monsters in her life. Joe Kelly, who wrote the award winning graphic novel he created with illustrator Ken Niimura, has also written the screenplay adaptation. Saldana will play school psychologist Mrs. Moll?, who plays a key role by helping Barbara face both internal and external threats, forming an inspiring bond with her in the process.', 'Anders Walter ', NULL),
('E0003', 'Truth or Dare ', 100, 'English', 'Horror / Thriller', '2018-05-03', 'G', 'Lucy Hale (\"Pretty Little Liars\") and Tyler Posey (\"Teen Wolf\") lead the cast of \"Blumhouse\'s Truth or Dare,\" a supernatural thriller from Blumhouse Productions (\"Happy Death Day,\" \"Get Out,\" \"Split\"). A harmless game of \"Truth or Dare\" among friends turns deadly when someone-or something-begins to punish those who tell a lie-or refuse the dare.', 'Jeff Wadlow ', NULL),
('T0001', 'น้อง พี่ ที่รัก', 130, 'Thai', 'Comedy', '2018-05-10', 'G', 'ตั้งแต่เด็ก ชัช (ซันนี่ สุวรรณเมธานนท์) คิดมาตลอดว่าน้องที่อยู่ในท้องแม่คือน้องชาย พอถึงวันที่แม่คลอดแล้วกลายเป็นน้องสาว ชัชจึงเซ็งระดับสิบ ความฝันที่จะได้เล่นหุ่นยนต์และเตะบอลแมนๆ กับน้องก็จบไป เพราะเล่นกับไอ้เจน (ญาญ่า อุรัสยา เสปอร์บันด์) ทีไร มันก็ร้องไห้งอแงทุกที ตั้งแต่เด็กจนโต ชัชกับเจนตีกันได้ ทุกเรื่อง เพราะเจนชอบทำตัวเหมือนเป็นแม่มากกว่าเป็นน้อง ส่วนชัชก็ชอบทำตัวเป็นภาระมากกว่าเป็นพี่ จะมีพี่ชายคนไหนที่ห่วยกว่าน้องสาวไปซะทุกด้าน ไม่ว่าจะเป็นเรื่องการเรียน กีฬา หน้าตา นิสัย แข่งกัน ยังไง เจนก็เพอร์เฟคกว่า เวลาเดียวที่ชัชจะโชว์เหนือทำตัวเป็นพี่ ก็คือตอนที่มีคนมาจีบเจน ชัชจะทำตัวกร่างไล่หนุ่มๆให้หนีหายไปหมด เหมือนเป็นการเอาคืน', 'Wittaya Thongyuyong', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `PriceID` varchar(5) NOT NULL,
  `SeatType` varchar(30) NOT NULL,
  `TheaterType` varchar(20) NOT NULL,
  `Day` varchar(3) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`PriceID`, `SeatType`, `TheaterType`, `Day`, `Price`) VALUES
('1MNDR', 'Reg', 'Digital', 'MON', 200),
('1MNDV', 'VIP', 'Digital', 'MON', 250),
('1MNFR', 'Reg', '4DX', 'MON', 350),
('1MNFV', 'VIP', '4DX', 'MON', 400),
('1MNTR', 'Reg', '3D', 'MON', 330),
('1MNTV', 'VIP', '3D', 'MON', 380),
('2TUDR', 'Reg', 'Digital', 'TUE', 200),
('2TUDV', 'VIP', 'Digital', 'TUE', 250),
('2TUFR', 'Reg', '4DX', 'TUE', 350),
('2TUFV', 'VIP', '4DX', 'TUE', 400),
('2TUTR', 'Reg', '3D', 'TUE', 330),
('2TUTV', 'VIP', '3D', 'TUE', 380),
('3WDDR', 'Reg', 'Digital', 'WED', 200),
('3WDDV', 'VIP', 'Digital', 'WED', 250),
('3WDFR', 'Reg', '4DX', 'WED', 350),
('3WDFV', 'VIP', '4DX', 'WED', 400),
('3WDTR', 'Reg', '3D', 'WED', 330),
('3WDTV', 'VIP', '3D', 'WED', 380),
('4THDR', 'Reg', 'Digital', 'THU', 100),
('4THDV', 'VIP', 'Digital', 'THU', 120),
('4THFR', 'Reg', '4DX', 'THU', 220),
('4THFV', 'VIP', '4DX', 'THU', 250),
('4THTR', 'Reg', '3D', 'THU', 180),
('4THTV', 'VIP', '3D', 'THU', 200),
('5FRDR', 'Reg', 'Digital', 'FRI', 200),
('5FRDV', 'VIP', 'Digital', 'FRI', 250),
('5FRFR', 'Reg', '4DX', 'FRI', 350),
('5FRFV', 'VIP', '4DX', 'FRI', 400),
('5FRTR', 'Reg', '3D', 'FRI', 330),
('5FRTV', 'VIP', '3D', 'FRI', 380),
('6SADR', 'Reg', 'Digital', 'SAT', 220),
('6SADV', 'VIP', 'Digital', 'SAT', 270),
('6SAFR', 'Reg', '4DX', 'SAT', 370),
('6SAFV', 'VIP', '4DX', 'SAT', 420),
('6SATR', 'Reg', '3D', 'SAT', 350),
('6SATV', 'VIP', '3D', 'SAT', 400),
('7SUDR', 'Reg', 'Digital', 'SUN', 220),
('7SUDV', 'VIP', 'Digital', 'SUN', 270),
('7SUFR', 'Reg', '4DX', 'SUN', 370),
('7SUFV', 'VIP', '4DX', 'SUN', 420),
('7SUTR', 'Reg', '3D', 'SUN', 350),
('7SUTV', 'VIP', '3D', 'SUN', 400);

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `ProCode` varchar(4) NOT NULL,
  `ProDetail` text CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `ProType` varchar(10) NOT NULL,
  `ProStart` date NOT NULL,
  `ProPeriod` int(11) NOT NULL,
  `ProAmount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`ProCode`, `ProDetail`, `ProType`, `ProStart`, `ProPeriod`, `ProAmount`) VALUES
('C001', 'บัตรเดบิต KBANK \r\nดูหนัง ทุกเรื่อง ทุกรอบเพียง 100 บาท\r\nแค่จ่ายผ่าน KBANK Debit', 'CRE', '2018-04-25', 120, 200),
('M001', 'ซื้อบัตรชม Avengers Infinity War ในระบบ 4DX รับไปเลย พวงกุญแจจากภาพยนตร์\r\n', 'Movie', '2018-04-25', 14, 200);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `OrderID` int(11) NOT NULL,
  `MemberCode` int(11) NOT NULL,
  `MovieID` varchar(5) NOT NULL,
  `Star` tinyint(4) NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`OrderID`, `MemberCode`, `MovieID`, `Star`, `Comment`) VALUES
(1, 1, 'E0001', 5, 'สนุกมากกกก'),
(1, 2, 'E0001', 5, 'oishii popcorn'),
(2, 3, 'E0001', 5, 'สุดยอดไปเลย');

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `SeatNo` varchar(3) NOT NULL,
  `ShowtimeID` varchar(9) NOT NULL,
  `PriceID` varchar(5) NOT NULL,
  `MemberCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`SeatNo`, `ShowtimeID`, `PriceID`, `MemberCode`) VALUES
('A08', '610427002', '5FRFV', 1),
('A09', '610427002', '5FRFV', 2),
('D05', '610427003', '5FRFR', 3);

-- --------------------------------------------------------

--
-- Table structure for table `seatorder`
--

CREATE TABLE `seatorder` (
  `OrderID` int(11) NOT NULL,
  `SeatNo` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seatorder`
--

INSERT INTO `seatorder` (`OrderID`, `SeatNo`) VALUES
(1, 'A08'),
(1, 'A09'),
(2, 'D05');

-- --------------------------------------------------------

--
-- Table structure for table `showtime`
--

CREATE TABLE `showtime` (
  `ShowTimeID` varchar(9) NOT NULL,
  `MovieID` varchar(5) NOT NULL,
  `Soundtrack` varchar(20) NOT NULL,
  `Subtitle` varchar(20) NOT NULL,
  `TheaterID` varchar(3) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `SeatRemaining` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `showtime`
--

INSERT INTO `showtime` (`ShowTimeID`, `MovieID`, `Soundtrack`, `Subtitle`, `TheaterID`, `Date`, `Time`, `SeatRemaining`) VALUES
('610427001', 'E0001', 'English', 'Thai', 'A01', '2018-04-27', '11:30:00', 400),
('610427002', 'E0001', 'English', 'Thai', 'A01', '2018-04-27', '14:00:00', 398),
('610427003', 'E0001', 'English', 'Thai', 'A01', '2018-04-27', '18:00:00', 399),
('610427004', 'E0001', 'English', 'Thai', 'A01', '2018-04-27', '21:00:00', 400);

-- --------------------------------------------------------

--
-- Table structure for table `theater`
--

CREATE TABLE `theater` (
  `TheaterID` varchar(3) NOT NULL,
  `BranchName` varchar(50) NOT NULL,
  `TheaterNo` int(11) NOT NULL,
  `TheaterType` varchar(20) NOT NULL,
  `RegSeat` int(11) DEFAULT NULL,
  `VipSeat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theater`
--

INSERT INTO `theater` (`TheaterID`, `BranchName`, `TheaterNo`, `TheaterType`, `RegSeat`, `VipSeat`) VALUES
('A01', 'KMUTT', 1, '4DX', 300, 100),
('A02', 'KMUTT', 2, '3D', 300, 100),
('A03', 'KMUTT', 3, 'Digital', 280, 100),
('A04', 'KMUTT', 4, 'Digital', 280, 100),
('A05', 'KMUTT', 5, 'Digital', 300, 100),
('B01', 'BNKCinema', 1, '3D', 350, 150),
('B02', 'BNKCinema', 2, 'Digital', 350, 150),
('B03', 'BNKCinema', 3, 'Digital', 300, 100);

-- --------------------------------------------------------

--
-- Table structure for table `topup`
--

CREATE TABLE `topup` (
  `MemberCode` int(11) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `TopUpAmount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topup`
--

INSERT INTO `topup` (`MemberCode`, `Timestamp`, `TopUpAmount`) VALUES
(1, '2018-04-28 05:54:05', 200),
(2, '2018-04-28 06:11:55', 1000),
(3, '2018-04-28 05:54:05', 500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`BranchName`);

--
-- Indexes for table `buying`
--
ALTER TABLE `buying`
  ADD PRIMARY KEY (`OrderID`,`MemberCode`),
  ADD KEY `ProCode` (`ProCode`),
  ADD KEY `TransID` (`TransID`),
  ADD KEY `PriceID` (`PriceID`),
  ADD KEY `ShowtimeID` (`ShowtimeID`),
  ADD KEY `MemberCode` (`MemberCode`);

--
-- Indexes for table `membercard`
--
ALTER TABLE `membercard`
  ADD PRIMARY KEY (`MemberCode`),
  ADD KEY `CardType` (`CardType`);

--
-- Indexes for table `membertype`
--
ALTER TABLE `membertype`
  ADD PRIMARY KEY (`CardType`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`MovieID`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`PriceID`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`ProCode`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`OrderID`,`MemberCode`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `MemberCode` (`MemberCode`),
  ADD KEY `MovieID` (`MovieID`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`SeatNo`,`ShowtimeID`),
  ADD KEY `ShowtimeID` (`ShowtimeID`),
  ADD KEY `PriceID` (`PriceID`),
  ADD KEY `MemberCode` (`MemberCode`);

--
-- Indexes for table `seatorder`
--
ALTER TABLE `seatorder`
  ADD PRIMARY KEY (`OrderID`,`SeatNo`) USING BTREE,
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `SeatNo` (`SeatNo`);

--
-- Indexes for table `showtime`
--
ALTER TABLE `showtime`
  ADD PRIMARY KEY (`ShowTimeID`),
  ADD KEY `MovieID` (`MovieID`),
  ADD KEY `MovieID_2` (`MovieID`),
  ADD KEY `TheaterID` (`TheaterID`);

--
-- Indexes for table `theater`
--
ALTER TABLE `theater`
  ADD PRIMARY KEY (`TheaterID`),
  ADD KEY `BranchName` (`BranchName`);

--
-- Indexes for table `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`MemberCode`,`Timestamp`),
  ADD KEY `MemberCode` (`MemberCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `membercard`
--
ALTER TABLE `membercard`
  MODIFY `MemberCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buying`
--
ALTER TABLE `buying`
  ADD CONSTRAINT `buying_ibfk_1` FOREIGN KEY (`ProCode`) REFERENCES `promotion` (`ProCode`) ON UPDATE CASCADE,
  ADD CONSTRAINT `buying_ibfk_3` FOREIGN KEY (`PriceID`) REFERENCES `price` (`PriceID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `buying_ibfk_4` FOREIGN KEY (`ShowtimeID`) REFERENCES `showtime` (`ShowTimeID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `buying_ibfk_5` FOREIGN KEY (`MemberCode`) REFERENCES `membercard` (`MemberCode`) ON UPDATE CASCADE;

--
-- Constraints for table `membercard`
--
ALTER TABLE `membercard`
  ADD CONSTRAINT `membercard_ibfk_1` FOREIGN KEY (`CardType`) REFERENCES `membertype` (`CardType`) ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `buying` (`OrderID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`MemberCode`) REFERENCES `membercard` (`MemberCode`) ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_3` FOREIGN KEY (`MovieID`) REFERENCES `movie` (`MovieID`) ON UPDATE CASCADE;

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `seat_ibfk_1` FOREIGN KEY (`ShowtimeID`) REFERENCES `showtime` (`ShowTimeID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `seat_ibfk_2` FOREIGN KEY (`PriceID`) REFERENCES `price` (`PriceID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `seat_ibfk_3` FOREIGN KEY (`MemberCode`) REFERENCES `membercard` (`MemberCode`) ON UPDATE CASCADE;

--
-- Constraints for table `seatorder`
--
ALTER TABLE `seatorder`
  ADD CONSTRAINT `seatorder_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `buying` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seatorder_ibfk_2` FOREIGN KEY (`SeatNo`) REFERENCES `seat` (`SeatNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `showtime`
--
ALTER TABLE `showtime`
  ADD CONSTRAINT `showtime_ibfk_1` FOREIGN KEY (`MovieID`) REFERENCES `movie` (`MovieID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `showtime_ibfk_2` FOREIGN KEY (`TheaterID`) REFERENCES `theater` (`TheaterID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `theater`
--
ALTER TABLE `theater`
  ADD CONSTRAINT `theater_ibfk_1` FOREIGN KEY (`BranchName`) REFERENCES `branch` (`BranchName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topup`
--
ALTER TABLE `topup`
  ADD CONSTRAINT `topup_ibfk_1` FOREIGN KEY (`MemberCode`) REFERENCES `membercard` (`MemberCode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

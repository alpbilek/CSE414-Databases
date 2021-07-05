-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2017 at 02:37 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userid`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(7, 'pms', 'pms123');

-- --------------------------------------------------------

--
-- Table structure for table `case`
--

CREATE TABLE `case` (
  `CID` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `PRISONER_NAME` varchar(30) NOT NULL,
  `CASE_TYPE` varchar(30) NOT NULL,
  `DESCRIPTION` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `case`
--

INSERT INTO `case` (`CID`, `PID`, `PRISONER_NAME`, `CASE_TYPE`, `DESCRIPTION`) VALUES
(3, 58, 'Duygu', 'murderer', 'Murdered his husband'),
(4, 54, 'Hakan', 'rapist', 'raped 5 women');

create table log_case (
  querytime datetime,
  comment varchar(255)
);
DELIMITER $$
create trigger CASE_UPDATE_LOG
after update
on `case`
for each row
begin
insert into log_case values
(now(),concat( "[",cast(new.`CID` as char),"]"," this case is updated."));
end 
$$
DELIMITER ;
-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FID` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `PRISONER_NAME` varchar(30) NOT NULL,
  `DATE` date NOT NULL,
  `ESCAPE_ATTEMPTS` int(11) NOT NULL,
  `JOB_PERFORMANCE` varchar(30) NOT NULL,
  `COMMENTS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
create table log_feedack (
  querytime datetime,
  comment varchar(255)
);
DELIMITER $$
create trigger FEEDBACK_UPDATE_LOG
after update
on `feedback`
for each row
begin
insert into log_feedack values
(now(),concat( "[",cast(new.`FID` as char),"]"," this feedback is updated."));
end 
$$
DELIMITER ;
--
-- Table structure for table `prisoner`
--

CREATE TABLE `prisoner` (
  `PID` int(11) NOT NULL,
  `PRISONER_NAME` varchar(30) NOT NULL,
  `AGE` int(11) NOT NULL,
  `SEX` varchar(6) NOT NULL,
  `TYPE` varchar(30) NOT NULL,
  `ADDRESS` text NOT NULL,
  `ENTRY_DATE` date NOT NULL,
  `RELEASE_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prisoner`
--

INSERT INTO `prisoner` (`PID`, `PRISONER_NAME`, `AGE`, `SEX`, `TYPE`, `ADDRESS`, `ENTRY_DATE`, `RELEASE_DATE`) VALUES
(54, 'Hakan', 29, 'Male', 'rapist', 'Avcilar', '2019-12-02', '2023-12-01'),
(55, 'Ferhat', 24, 'Male', 'Robbery', 'Gergel', '2002-02-04', '2023-01-03'),
(56, 'Aleyna', 24, 'Female', 'Thief', 'Baku', '2016-05-14', '2025-12-12'),
(57, 'Osman', 32, 'Male', 'terrorist', 'Poturge', '2017-12-31', '2025-12-13'),
(58, 'Duygu', 25, 'Female', 'murderer', 'Dardanel', '2015-09-30', '2035-06-24');

--
-- Triggers `prisoner`
--
CREATE TABLE `prisonerbackup` (
  `PID` int(11) NOT NULL,
  `PNAME` varchar(30) NOT NULL,
  `PAGE` int(11) NOT NULL,
  `PSEX` varchar(30) NOT NULL,
  `PTYPE` varchar(30) NOT NULL,
  `PADDRESS` text NOT NULL,
  `PENTRY` date NOT NULL,
  `PRELEASE` date NOT NULL,
  `DELETION_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
DELIMITER $$
CREATE TRIGGER `createhistory` BEFORE DELETE ON `prisoner` FOR EACH ROW INSERT INTO `prisonerbackup` SET `PID`= OLD.PID,`pname`= OLD.PRISONER_NAME,`PAGE`= OLD.AGE,`PSEX`= OLD.SEX,`PTYPE`= OLD.TYPE,`PADDRESS`= OLD.ADDRESS,`PENTRY`= OLD.ENTRY_DATE,`PRELEASE`= OLD.RELEASE_DATE
$$
DELIMITER ;



create table log_prisoner (
  querytime datetime,
  comment varchar(255)
);
DELIMITER $$
create trigger PRISONER_UPDATE_LOG
after update
on `prisoner`
for each row
begin
insert into log_prisoner values
(now(),concat( "[",cast(new.`PRISONER_NAME` as char),"]"," this prisoner is updated."));
end 
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `prisonerbackup`
--



--
-- Dumping data for table `prisonerbackup`
--



-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `SID` int(11) NOT NULL,
  `SNAME` varchar(30) NOT NULL,
  `AGE` int(11) NOT NULL,
  `SEX` varchar(6) NOT NULL,
  `ROLE` varchar(30) NOT NULL,
  `PHONENO` bigint(20) NOT NULL,
  `JOINDATE` date NOT NULL,
  `ADDRESS` text NOT NULL,
  `SALARY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO staff (`SID`, `SNAME`, `AGE`, `SEX`, `ROLE`, `PHONENO`, `JOINDATE`, `ADDRESS`,SALARY) VALUES
(2, 'Ibrahim', 25, 'male', 'inspector', 123456789, '2019-10-01', 'Yalvac',5500),
(6, 'Umur', 22, 'Male', 'SSP', 959586562, '2018-12-31', 'Kamyan',12340),
(7, 'Kaan', 22, 'Male', 'Jailer', 959586532, '2020-12-01', 'Samsun',2667),
(8, 'Meryem', 26, 'Female', 'SSP', 54535, '2021-01-13', 'Kocaeli',3415);

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--
create table log_staff (
  querytime datetime,
  comment varchar(255)
);
DELIMITER $$
create trigger STAFF_UPDATE_LOG
after update
on `staff`
for each row
begin
insert into log_staff values
(now(),concat( "[",cast(new.`SNAME` as char),"]"," this staff is updated."));
end 
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `PID` int(11) NOT NULL,
  `VISITOR_NAME` varchar(30) NOT NULL,
  `PRISONER_NAME` varchar(30) NOT NULL,
  `RELATION` varchar(30) NOT NULL,
  `DATE` date NOT NULL,
  `IN_TIME` time NOT NULL,
  `OUT_TIME` time NOT NULL,
  `ISSUING_AUTHORITY` varchar(30) NOT NULL,
  `SID` int(11) NOT NULL,
  `VISITOR_ADDRESS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`PID`, `VISITOR_NAME`, `PRISONER_NAME`, `RELATION`, `DATE`, `IN_TIME`, `OUT_TIME`, `ISSUING_AUTHORITY`, `SID`, `VISITOR_ADDRESS`) VALUES
(55, 'Berat', 'Ferhat', 'Groom', '2017-11-09', '17:58:00', '18:33:00', 'Kaan', 7, 'Hadimkoy'),
(54, 'Altan', 'Hakan', 'Brother', '2020-11-09', '16:23:00', '17:00:00', 'Meryem', 8, 'Davutpasa'),
(58, 'Umut', 'Duygu', 'Husband', '2016-12-08', '09:58:00', '11:33:00', 'Umur', 6, 'Tuzla');

--
-- Indexes for dumped tables
--
create table log_visitor (
  querytime datetime,
  comment varchar(255)
);
DELIMITER $$
create trigger VISITOR_UPDATE_LOG
after update
on `visitor`
for each row
begin
insert into log_visitor values
(now(),concat( "[",cast(new.`VISITOR_NAME` as char),"]"," this visitor is updated."));
end 
$$
DELIMITER ;

CREATE VIEW crime_types AS SELECT
`PRISONER_NAME`,`type` FROM `prisoner`;

CREATE VIEW staff_salary AS SELECT
`SNAME`,`SALARY` FROM `staff` WHERE staff.SALARY>3000;

CREATE VIEW feedback_view AS
SELECT `FID`,`ESCAPE_ATTEMPTS`,`COMMENTS`,prisoner.`SEX`,prisoner.`AGE`
FROM `prisoner` 
RIGHT JOIN `feedback`
ON `prisoner`.`PID` = `feedback`.`PID`;

CREATE VIEW staff_view AS
SELECT `PID`,`VISITOR_NAME`,`PRISONER_NAME`,`RELATION`
FROM `staff` 
LEFT JOIN `visitor`
ON `staff`.`SID` = `visitor`.`SID`;


CREATE VIEW prisoner_case_view AS
SELECT prisoner.`PRISONER_NAME`, `CID`,`CASE_TYPE` FROM prisoner
LEFT JOIN `case` ON prisoner.`PID` = `case`.`PID`
UNION
SELECT prisoner.`PRISONER_NAME`, `CID`,`CASE_TYPE` FROM prisoner
RIGHT JOIN `case` ON prisoner.`PID` = `case`.`PID`;



--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `case`
--
ALTER TABLE `case`
  ADD PRIMARY KEY (`CID`),
  ADD KEY `case_ibfk_1` (`PID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FID`),
  ADD KEY `PID` (`PID`);

--
-- Indexes for table `prisoner`
--
ALTER TABLE `prisoner`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `prisonerbackup`
--
ALTER TABLE `prisonerbackup`
  ADD PRIMARY KEY (`PID`,`PNAME`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`SID`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`PID`,`VISITOR_NAME`),
  ADD KEY `visitor_ibfk_2` (`SID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `case`
--
ALTER TABLE `case`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prisoner`
--
ALTER TABLE `prisoner`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `case`
--
ALTER TABLE `case`
  ADD CONSTRAINT `case_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `prisoner` (`PID`) ON DELETE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `prisoner` (`PID`) ON DELETE CASCADE;

--
-- Constraints for table `visitor`
--
ALTER TABLE `visitor`
  ADD CONSTRAINT `visitor_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `prisoner` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visitor_ibfk_2` FOREIGN KEY (`SID`) REFERENCES `staff` (`SID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
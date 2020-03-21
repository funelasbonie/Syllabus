-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2020 at 01:13 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `syllabus`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `USER_ID` varchar(15) NOT NULL,
  `NAME` varchar(80) DEFAULT NULL,
  `TYPE` varchar(50) DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`USER_ID`, `NAME`, `TYPE`, `USERNAME`, `PASSWORD`) VALUES
('01-1415-02532', 'Bonifacio Funelas III', 'Student', '01-1415-02532', '12345678'),
('01-1415-12345', 'Mara Baldovino', 'Student', '01-1415-12345', '12345678'),
('01-1516-00000', 'JD Funelas', 'Student', '01-1516-00000', '12345678'),
('131313', 'Admin', 'Admin', 'Admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `ACTIVITY_ID` varchar(50) DEFAULT NULL,
  `TITLE` text,
  `SCHEDULE` varchar(11) DEFAULT NULL,
  `MODULE_ID` varchar(50) DEFAULT NULL,
  `SUBJECT_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`ACTIVITY_ID`, `TITLE`, `SCHEDULE`, `MODULE_ID`, `SUBJECT_ID`) VALUES
('jgf333', 'Classifying basic rights as guaranteed by the Constitution ', 'Day 2', 'qwe111', 3000002),
('lll443', 'Analysing situation related to equal protection of law and due process of law', 'Day 3', 'qwe111', 3000002),
('hhh666', 'right against unreasonable searches and seizure', 'Day 4', 'qwe111', 3000002),
('ghf312', 'Nation Territory Assessing Philippine’s claim over the Spratly Island \r\n', 'Day 5', 'asd999', 3000002),
('asd753', 'Republicanism Evaluating Republicanism pas practiced in the Philippines \r\n', 'Day 6', 'asd999', 3000002),
('yyy553', 'Booting the Computer', 'Day 2', 'wer223', 3000001),
('gfh444', 'Identifying and using different kinds of Ubuntu software', 'Day 3', 'wer223', 3000001),
('hhh333', 'Completing and submitting web-based forms', 'Day 4', 'wer223', 3000001),
('jjs643', 'Chracterizing and organizing files and folders', 'Day 5', 'wer223', 3000001),
('hha831', 'Getting to know the parts of the computer', 'Day 6', 'gfh222', 3000001),
('jhg123', 'Saving a file in different file formats', 'Day 7', 'gfh222', 3000001),
('asd091', 'Applying password protection to a file', 'Day 8', 'gfh222', 3000001),
('jhg345', 'Creating, Editing and Formatting of worksheets', 'Day 9', 'asd666', 3000001),
('hfg318', 'Working with charts', 'Day10', 'asd666', 3000001),
('jhf333', 'Working with animations and transitions', 'Day 11', 'asd666', 3000001),
('jje230', 'Creating simple presentation and running slideshows of a certain topic', 'Day 12', 'asd666', 3000001),
('5e70a32be0e4f', 'c', 'Day 2', '4', 3000001),
('5e70a3491dd79', 'c', 'AD', '4', 3000001),
('5e70a3c07f376', 'c', 'as', '5e70a30f22740', 3000001),
('5e70a4acc4870', 'c2', 'Day', '5e70a30f22740', 3000001);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `CONTACT_ID` varchar(50) DEFAULT NULL,
  `INSTRUCTOR` varchar(80) DEFAULT NULL,
  `CONTACT_NO` varchar(80) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `CONSULTATION_HOURS` varchar(50) DEFAULT NULL,
  `SUBJECT_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`CONTACT_ID`, `INSTRUCTOR`, `CONTACT_NO`, `EMAIL`, `CONSULTATION_HOURS`, `SUBJECT_ID`) VALUES
('5e6e1c38c1632', 'John Frederick Leabres', '09123123123', 'juandelacruz@gmai.com', '06:12 pm - 08:12 pm', 3000001),
('5e7083f1b49a3', 'Mara Baldovino', '0912312312', 'juandelacruz@gmai.com', '05:12 pm - 07:12 pm', 3000002),
('5e70a3630ad1c', 'e', 'e', 'e', '05:12 pm - 07:12 pm', 3000001);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `COURSE_ID` int(11) NOT NULL,
  `TITLE` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`COURSE_ID`, `TITLE`) VALUES
(2000001, 'Bachelor of Science in Information Technology'),
(2000002, 'Bachelor of Science in Civil Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `MODULE_ID` varchar(50) DEFAULT NULL,
  `MODULE_NO` int(11) DEFAULT NULL,
  `TITLE` text,
  `ACTIVITIES` varchar(50) DEFAULT NULL,
  `SUBJECT_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`MODULE_ID`, `MODULE_NO`, `TITLE`, `ACTIVITIES`, `SUBJECT_ID`) VALUES
('wer223', 1, 'Introduction to Information and Communication Technology  (ICT)', '7000001', 3000001),
('gfh222', 2, 'Word Processing using LibreOffice-Writer', '7000001', 3000001),
('asd666', 3, 'Creating Worksheets and Presentations using Libreoffice', '7000001', 3000001),
('qwe111', 1, 'The Bill of Rights', '7000002', 3000002),
('asd999', 2, 'Policies and State Principles', '7000002', 3000002),
('5e6db9e7aa1b3', 3, 'asdasasd', '5e6db9e7aa1b3', 3000002),
('5e70a30f22740', 4, 'b', '5e70a30f22740', 3000001);

-- --------------------------------------------------------

--
-- Table structure for table `objectives`
--

CREATE TABLE `objectives` (
  `OBJECTIVE_ID` varchar(50) DEFAULT NULL,
  `OBJECTIVE` text,
  `SUBJECT_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `objectives`
--

INSERT INTO `objectives` (`OBJECTIVE_ID`, `OBJECTIVE`, `SUBJECT_ID`) VALUES
('ase764', 'Demonstrate adroitness in navigating the Ubuntu operating system and apply corresponding file operation ', 3000001),
('53dds2', 'Identify the different component of the computer system and classify both hardware and software components accordingly ', 3000001),
('ddf223', 'Invoke or Identify basic rights that should be upheld n particular situations', 3000002),
('asd333', 'Resolver issues involving conflicts between basic rights and state policies and principles', 3000002),
('5e70a05647946', 'asdas', 3000002),
('5e70a305dc806', 'a', 3000001);

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

CREATE TABLE `reference` (
  `REFERENCE_ID` varchar(50) DEFAULT NULL,
  `REFERENCE` text,
  `SUBJECT_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reference`
--

INSERT INTO `reference` (`REFERENCE_ID`, `REFERENCE`, `SUBJECT_ID`) VALUES
('tqm288', 'Introduction to Information Technology 1 Manual and Readings', 3000001),
('pop100', 'Baldauf, Kenneth J and Ralph M. Stair. Discovering Information Technology, Cengage Learning, 2009', 3000001),
('5e6dc3042e43f', 'asdasd', 3000002),
('5e70a2369b0c1', 'hahaha baka naman', 3000002),
('5e70a334976d9', 'd', 3000001);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `SCHEDULE_ID` int(11) DEFAULT NULL,
  `SCHEDULE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `std_subjects`
--

CREATE TABLE `std_subjects` (
  `STUDENT_ID` varchar(15) DEFAULT NULL,
  `SUBJECT_ID` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_subjects`
--

INSERT INTO `std_subjects` (`STUDENT_ID`, `SUBJECT_ID`) VALUES
('01-1415-02532', 3000002),
('01-1516-02533', 3000001),
('01-1415-02532', 3000003),
('01-1415-12345', 3000001),
('01-1415-12345', 3000004),
('01-1516-00000', 3000004),
('01-1516-00000', 3000001),
('01-1516-00000', 3000002),
('01-1415-02532', 3000001);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `STUDENT_ID` varchar(30) NOT NULL,
  `NAME` varchar(80) DEFAULT NULL,
  `COURSE` varchar(50) DEFAULT NULL,
  `YEAR` varchar(50) DEFAULT NULL,
  `SEMESTER` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`STUDENT_ID`, `NAME`, `COURSE`, `YEAR`, `SEMESTER`) VALUES
('01-1415-02532', 'Bonifacio Funelas III', '2000001', '1st', '1st'),
('01-1415-12345', 'Mara Baldovino', '2000002', '1st', '1st'),
('01-1516-00000', 'JD Funelas', '2000001', '1st', '1st');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `SUBJECT_ID` int(15) NOT NULL,
  `CODE` varchar(50) DEFAULT NULL,
  `TITLE` varchar(50) DEFAULT NULL,
  `COURSE` varchar(50) DEFAULT NULL,
  `DESCRIPTION` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SUBJECT_ID`, `CODE`, `TITLE`, `COURSE`, `DESCRIPTION`) VALUES
(3000001, 'ITE009', 'Introduction to Information Technology 1', '2000001', 'ITE 009 is a 3-unit introductory course on the use of computers and the user of word processing, spreadsheet, and presentation software for productivity. The course expounds on key concepts in ICT essential in appreciating the role of technology in day-to-day use of interaction. The students are trained to optimized use of the interest and worldwide web in communication, sharing, social interaction, and academic endeavors observing ethical and legal parameters. The laboratory component provides activities utilizing Linux-based OS in file management and navigation and the use of LibreOffice-Writerm LibreOffice-Calc, and LibreOffice-Impress, open-source productivity software in document, worksheet, and presentation preparation and distribution.'),
(3000002, 'POS001', 'Politics and Governance', '2000001', 'This subject will equip you the knowledge, attitudes and dispositions necessary for good citizenship. In particular this subject will make you knowledgeable about Bill of Rights, policies and state principles, as well as the duties and responsibilities provided for by law of elected public officials, eventually you will know how to stand up for you own rights while respecting the rights of others, know how to take action on the different policies and state principles, and be able to choose your leaders wisely.  ');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE `syllabus` (
  `SUBJECT_ID` int(11) NOT NULL,
  `OBJECTIVE_ID` int(11) DEFAULT NULL,
  `MODULE_ID` int(11) DEFAULT NULL,
  `REFERENCE` int(11) DEFAULT NULL,
  `CONTACT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `syllabus`
--

INSERT INTO `syllabus` (`SUBJECT_ID`, `OBJECTIVE_ID`, `MODULE_ID`, `REFERENCE`, `CONTACT`) VALUES
(3000001, NULL, NULL, NULL, NULL),
(3000002, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`COURSE_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`STUDENT_ID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`SUBJECT_ID`);

--
-- Indexes for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD PRIMARY KEY (`SUBJECT_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `COURSE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2000012;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `SUBJECT_ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3000005;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

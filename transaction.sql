-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TransactionID` int(11) NOT NULL,
  `from_cust_id` int(20) NOT NULL,
  `transferername` varchar(50) NOT NULL,
  `to_cust_id` int(11) NOT NULL,
  `receivername` varchar(50) NOT NULL,
  `cashtransfer` int(20) NOT NULL,
  `transfererbalance` int(11) NOT NULL,
  `receiverbalance` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `msgforreceiver` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`TransactionID`, `from_cust_id`, `transferername`, `to_cust_id`, `receivername`, `cashtransfer`, `transfererbalance`, `receiverbalance`, `date`, `msgforreceiver`) VALUES
(1, 5, 'Hardik Pandya', 8, 'Jasprit Bumrah', 2, 23851, 366346, '2020-11-9 03:35:46', 'Donation'),
(2, 5, 'Hardik Pandya', 8, 'Jasprit Bumrah', 2, 23849, 366348, '2020-11-9 03:35:48', ''),
(3, 3, 'Ishan Kishan', 8, 'Jasprit Bumrah', 89, 672379, 366437, '2020-11-9 03:35:56', ''),
(4, 8, 'Jasprit Bumrah', 10, 'Rahul Chahar', 34, 366403, 34155, '2020-11-10 10:30:17', 'Gift'),
(5, 2, 'Kieron Pollard', 9, 'Nathan CoulterNile', 45, 64740, 843669, '2020-11-10 10:30:17', 'work'),
(6, 1, 'Rohit Sharma', 7, 'Trent Boult', 78, 52638, 5970, '2020-11-10 10:30:18', 'personal'),
(7, 1, 'Rohit Sharma', 7, 'Trent Boult', 78, 52560, 6048, '2020-11-11 10:30:20', 'personal'),
(8, 1, 'Rohit Sharma', 7, 'Trent Boult', 78, 52482, 6126, '2020-11-11 10:30:30', 'project'),
(9, 7, 'Trent Boult', 9, 'Nathan CoulterNile', 43, 6083, 843712, '2020-11-12 12:10:53', 'work'),
(10, 7, 'Trent Boult', 9, 'Nathan CoulterNile', 43, 6083, 843712, '2020-11-12 12:10:53', 'work'),
(11, 1, 'Rohit Sharma', 2, 'Kieron Pollard', 67, 52415, 64807, '2020-11-12 12:11:48', 'work'),
(12, 1, 'Rohit Sharma', 2, 'Kieron Pollard', 67, 52415, 64807, '2020-11-13 01:15:08', 'work'),
(13, 1, 'Rohit Sharma', 7, 'Trent Boult', 56, 52359, 6139, '2020-11-14 01:15:08', ''),
(14, 1, 'Rohit Sharma', 4, 'Krunal Pandya', 67, 52292, 2977, '2020-11-14 07:30:40', ''),
(15, 4, 'Krunal Pandya', 1, 'Rohit Sharma', 78, 2899, 52370, '2020-11-14 07:40:14', ''),
(16, 4, 'Krunal Pandya', 2, 'Kieron Pollard', 78, 2821, 64885, '2020-11-15 07:12:31', ''),
(17, 1, 'Rohit Sharma', 6, 'Quinton DeKock', 78, 52292, 1950, '2020-11-15 08:03:11', 'Diwlai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TransactionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

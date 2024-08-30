-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2024 at 07:53 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `archive_invoices`
--

CREATE TABLE `archive_invoices` (
  `INVOICE_ID` int(11) NOT NULL,
  `NET_TOTAL` double DEFAULT 0,
  `INVOICE_DATE` date NOT NULL DEFAULT current_timestamp(),
  `NAME` varchar(80) NOT NULL,
  `TOTAL_AMOUNT` double NOT NULL,
  `TOTAL_DISCOUNT` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `archive_invoices`
--

INSERT INTO `archive_invoices` (`INVOICE_ID`, `NET_TOTAL`, `INVOICE_DATE`, `NAME`, `TOTAL_AMOUNT`, `TOTAL_DISCOUNT`) VALUES
(5, 97, '2024-04-18', 'Charles Reyes', 97, 0),
(6, 155, '2024-04-24', 'Peter Parker', 155, 0),
(7, 261, '2024-05-02', 'Justin Llanes', 261, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(20) COLLATE utf16_bin NOT NULL,
  `CONTACT_NUMBER` varchar(10) COLLATE utf16_bin NOT NULL,
  `ADDRESS` varchar(100) COLLATE utf16_bin NOT NULL,
  `DOCTOR_NAME` varchar(20) COLLATE utf16_bin NOT NULL,
  `DOCTOR_ADDRESS` varchar(100) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`ID`, `NAME`, `CONTACT_NUMBER`, `ADDRESS`, `DOCTOR_NAME`, `DOCTOR_ADDRESS`) VALUES
(5, 'Peter Parker', '9839283678', 'Binan, Laguna', 'Ryan Bang', 'San Pedro, Laguna'),
(6, 'Justin Llanes ', '9837658291', 'Sto. Tomas, Binan, Laguna', 'Mikael Barreras', 'Golden Meadow, San Antonio, Binan, Laguna'),
(8, 'Angelo Gonzales ', '9587683928', 'South City, Binan, Laguna', 'Adrian Hilapo', 'Sta. Rosa, Laguna'),
(9, 'Charles Reyes', '9368479211', 'San Pedro, Laguna', 'No Doctor', 'No Address'),
(10, 'Rae Sanchez ', '9883746728', 'San Antonio, Binan, Laguna', 'Angel Santos', 'Cabuyao, Laguna'),
(17, 'Manny Paquito', '9874678271', 'Sta Rosa, Laguna', 'Topher Artilla', 'Binan, Laguna'),
(18, 'Peter Llanes', '9876534521', 'Binan, Laguna', 'Charles Pedro', 'Sta Rosa, Laguna');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(8) NOT NULL,
  `name` varchar(50) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `payment_type` varchar(30) NOT NULL,
  `invoice_date` varchar(20) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `details` varchar(200) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `name`, `invoice_number`, `payment_type`, `invoice_date`, `details`, `amount`) VALUES
(1, 'Foodpanda', 1001, 'GCash', '19/04/2024', 'Employee Lunch', 187),
(7, 'Lalamove', 4001, 'Cash', '19/04/2024', 'Medicine Delivery', 153),
(30, 'Repair', 3001, 'Cash', '13/04/2024', 'Lights Repair', 650),
(31, 'Foodpanda', 1002, 'GCash', '11/04/2024', 'Admin Dinner', 238),
(32, 'Grab', 2001, 'Cash', '09/04/2024', 'Admin Lunch', 264),
(33, 'Lalamove', 4002, 'Cash', '08/04/2024', 'Medicine Delivery', 87),
(34, 'AquaGo', 5002, 'GCash', '05/04/2024', 'Mineral water for the pharmacy', 60);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `INVOICE_ID` int(11) NOT NULL,
  `NET_TOTAL` double NOT NULL DEFAULT 0,
  `INVOICE_DATE` date NOT NULL DEFAULT current_timestamp(),
  `CUSTOMER_ID` int(11) NOT NULL,
  `TOTAL_AMOUNT` double NOT NULL,
  `TOTAL_DISCOUNT` double NOT NULL,
  `PAYMENT_TYPE` varchar(20) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`INVOICE_ID`, `NET_TOTAL`, `INVOICE_DATE`, `CUSTOMER_ID`, `TOTAL_AMOUNT`, `TOTAL_DISCOUNT`, `PAYMENT_TYPE`) VALUES
(30, 58, '2024-05-03', 5, 62, 4, ''),
(31, 90, '2024-05-03', 7, 90, 0, ''),
(32, 10, '2024-05-06', 6, 10, 0, ''),
(33, 261, '2024-05-07', 9, 261, 0, ''),
(34, 11, '2024-05-09', 10, 11, 0, '1'),
(35, 22, '2024-05-14', 8, 22, 0, ''),
(36, 11, '2024-05-14', 6, 11, 0, ''),
(37, 61, '2024-05-14', 6, 61, 0, ''),
(38, 49.8, '2024-05-14', 6, 52, 2.2, ''),
(39, 49.8, '2024-05-14', 6, 52, 2.2, ''),
(40, 49.8, '2024-05-14', 6, 52, 2.2, '');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) COLLATE utf16_bin NOT NULL,
  `PACKING` varchar(20) COLLATE utf16_bin NOT NULL,
  `GENERIC_NAME` varchar(100) COLLATE utf16_bin NOT NULL,
  `SUPPLIER_NAME` varchar(100) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`ID`, `NAME`, `PACKING`, `GENERIC_NAME`, `SUPPLIER_NAME`) VALUES
(10, 'Neozep', '10 TAB', 'Phenylephrine', 'Peter Garcia'),
(12, 'Biogesic', '20 TAB', 'Paracetamol', 'Alexander Gawat'),
(13, 'Advil', '15 TAB', 'Ibuprofen', 'Angelbert Agorilla'),
(14, 'Imodium', '5 TAB', 'Loperamide', 'Peter Garcia'),
(15, 'Claritin', '25 TAB', 'Loratadine', 'Chris Artilagas'),
(16, 'Potencee', '250 ML', 'Ascorbic Acid', 'Chris Artillagas'),
(17, 'Bewell C', '120 ML', 'Ascorbic Acid', 'Allen Paningasan'),
(18, 'Ceelin', '250 ML', 'Ascorbic Acid', 'Angelbert Agorilla'),
(19, 'Tempra', '250ML', 'Paracetamol', 'Allen Paningasan'),
(20, 'Robitussin', '120 ML', 'Dextromethrophan Guaifenesin', 'Peter Garcia'),
(21, 'Chenelin', '10 TAB', 'Chenelin', 'Angelbert Agorilla'),
(22, 'George', '10 TAB', 'Bien', 'Angelbert Agorilla');

-- --------------------------------------------------------

--
-- Table structure for table `medicines_stock`
--

CREATE TABLE `medicines_stock` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) COLLATE utf16_bin NOT NULL,
  `BATCH_ID` varchar(20) COLLATE utf16_bin NOT NULL,
  `EXPIRY_DATE` varchar(10) COLLATE utf16_bin NOT NULL,
  `QUANTITY` int(11) NOT NULL,
  `MRP` double NOT NULL,
  `RATE` double NOT NULL,
  `INVOICE_NUMBER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `medicines_stock`
--

INSERT INTO `medicines_stock` (`ID`, `NAME`, `BATCH_ID`, `EXPIRY_DATE`, `QUANTITY`, `MRP`, `RATE`, `INVOICE_NUMBER`) VALUES
(5, 'Neozep', 'NE01', '06/24', 79, 11, 9, 0),
(6, 'Biogesic', 'BG01', '08/24', 23, 10, 8, 0),
(7, 'Advil', 'AV01', '02/24', 10, 12, 10, 0),
(8, 'Imodium', 'IM01', '09/24', 0, 15, 12, 0),
(9, 'Claritin', 'CL01', '01/25', 17, 13, 11, 0),
(10, 'Potencee', 'PO03', '08/25', 38, 261, 200, 0),
(11, 'Bewell C', 'BC05', '10/25', 0, 137, 100, 0),
(12, 'Ceelin', 'CE06', '01/25', 16, 293, 260, 0),
(13, 'Tempra', 'TE04', '09/25', 19, 254, 232, 0),
(14, 'Robitussin', 'RO05', '06/24', 0, 198, 156, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_info`
--

CREATE TABLE `pharmacy_info` (
  `p_name` varchar(30) NOT NULL,
  `p_address` varchar(200) NOT NULL,
  `p_email` varchar(100) NOT NULL,
  `p_contact_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacy_info`
--

INSERT INTO `pharmacy_info` (`p_name`, `p_address`, `p_email`, `p_contact_number`) VALUES
('Medsave RX Pharmacy', 'Cabuyao, Laguna', 'medsaverx@gmail.com', 976362173);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `SUPPLIER_NAME` varchar(100) COLLATE utf16_bin NOT NULL,
  `INVOICE_NUMBER` int(11) NOT NULL,
  `VOUCHER_NUMBER` int(11) NOT NULL,
  `PURCHASE_DATE` varchar(10) COLLATE utf16_bin NOT NULL,
  `TOTAL_AMOUNT` double NOT NULL,
  `PAYMENT_STATUS` varchar(20) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`SUPPLIER_NAME`, `INVOICE_NUMBER`, `VOUCHER_NUMBER`, `PURCHASE_DATE`, `TOTAL_AMOUNT`, `PAYMENT_STATUS`) VALUES
('Chris Artillagas', 32524, 2, '2024-04-28', 45, 'PAID'),
('Peter Garcia', 40724, 3, '2024-04-28', 450, 'PAID'),
('Alexander Gawat', 41324, 12, '2024-04-28', 300, 'PAID'),
('Angelbert Agorilla ', 202400001, 13, '2024-05-03', 9, 'PAID'),
('Chris Artillagas', 98765, 50, '2024-05-09', 160, 'PAID'),
('Chris Artillagas', 5435345, 51, '2024-05-09', 400, 'PAID'),
('Peter Garcia', 2321323, 52, '2024-05-09', 900, 'PAID'),
('Chris Artillagas', 2147483647, 56, '2024-05-09', 900, 'PAID'),
('Peter Garcia', 40724, 57, '2024-05-09', 45, 'PAID'),
('Chris Artillagas', 14344, 58, '2024-05-09', 90, 'PAID'),
('Chris Artillagas', 321, 59, '2024-05-14', 180, 'PAID'),
('Chris Artillagas', 123, 60, '2024-05-14', 900, 'PAID'),
('Chris Artillagas', 123, 61, '2024-05-14', 270, 'PAID'),
('Chris Artillagas', 987, 62, '2024-05-14', 180, 'PAID');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `ID` int(10) NOT NULL,
  `CUSTOMER_ID` int(20) NOT NULL,
  `INVOICE_NUMBER` varchar(50) NOT NULL,
  `MEDICINE_NAME` varchar(100) NOT NULL,
  `BATCH_ID` varchar(50) NOT NULL,
  `EXPIRY_DATE` date NOT NULL DEFAULT current_timestamp(),
  `QUANTITY` int(20) NOT NULL,
  `MRP` decimal(10,2) NOT NULL,
  `DISCOUNT` decimal(10,2) NOT NULL,
  `TOTAL` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`ID`, `CUSTOMER_ID`, `INVOICE_NUMBER`, `MEDICINE_NAME`, `BATCH_ID`, `EXPIRY_DATE`, `QUANTITY`, `MRP`, `DISCOUNT`, `TOTAL`) VALUES
(1, 6, '27', 'Neozep', 'NE01', '0000-00-00', 1, '11.00', '0.00', '11.00'),
(2, 6, '28', 'Neozep', 'NE01', '0000-00-00', 2, '11.00', '0.00', '22.00'),
(3, 6, '29', 'Neozep', 'NE01', '0000-00-00', 1, '11.00', '0.00', '11.00'),
(4, 5, '30', 'Neozep', 'NE01', '0000-00-00', 2, '11.00', '0.00', '22.00'),
(5, 5, '30', 'Biogesic', 'BG01', '0000-00-00', 4, '10.00', '10.00', '36.00'),
(6, 7, '31', 'Claritin', 'CL01', '0000-00-00', 3, '13.00', '0.00', '39.00'),
(7, 7, '31', 'Neozep', 'NE01', '0000-00-00', 1, '11.00', '0.00', '11.00'),
(8, 7, '31', 'Biogesic', 'BG01', '0000-00-00', 4, '10.00', '0.00', '40.00'),
(9, 6, '32', 'Biogesic', 'BG01', '0000-00-00', 1, '10.00', '0.00', '10.00'),
(10, 9, '33', 'Potencee', 'PO03', '0000-00-00', 1, '261.00', '0.00', '261.00'),
(11, 10, '34', 'Neozep', 'NE01', '0000-00-00', 1, '11.00', '0.00', '11.00'),
(12, 8, '35', 'Neozep', 'NE01', '0000-00-00', 2, '11.00', '0.00', '22.00'),
(13, 6, '36', 'Neozep', 'NE01', '0000-00-00', 1, '11.00', '0.00', '11.00'),
(14, 6, '37', 'Claritin', 'CL01', '0000-00-00', 3, '13.00', '0.00', '39.00'),
(15, 6, '37', 'Neozep', 'NE01', '0000-00-00', 2, '11.00', '0.00', '22.00'),
(16, 6, '38', 'Biogesic', 'BG01', '0000-00-00', 3, '10.00', '0.00', '30.00'),
(17, 6, '38', 'Neozep', 'NE01', '0000-00-00', 2, '11.00', '10.00', '19.80'),
(18, 6, '39', 'Biogesic', 'BG01', '0000-00-00', 3, '10.00', '0.00', '30.00'),
(19, 6, '39', 'Neozep', 'NE01', '0000-00-00', 2, '11.00', '10.00', '19.80'),
(20, 6, '40', 'Biogesic', 'BG01', '0000-00-00', 3, '10.00', '0.00', '30.00'),
(21, 6, '40', 'Neozep', 'NE01', '0000-00-00', 2, '11.00', '10.00', '19.80');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) COLLATE utf16_bin NOT NULL,
  `EMAIL` varchar(100) COLLATE utf16_bin NOT NULL,
  `CONTACT_NUMBER` varchar(10) COLLATE utf16_bin NOT NULL,
  `ADDRESS` varchar(100) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`ID`, `NAME`, `EMAIL`, `CONTACT_NUMBER`, `ADDRESS`) VALUES
(37, 'Chris Artillagas', 'chris@gmail.com', '9846578821', 'Dela Paz, Binan, Laguna'),
(38, 'Allen Paningasan ', 'allen_paningasan@gmail.com', '9472618372', 'Olivarez Homes, Binan, Laguna'),
(39, 'Angelbert Agorilla ', 'angelbert@gmail.com', '9987472812', 'South City, Binan, Laguna'),
(40, 'Peter Garcia', 'peter_garcia143@gmail.com', '9369692818', 'Golden City, Sta. Rosa, Laguna'),
(41, 'Alexander Gawat', 'xandergawat@gmail.com', '9374682198', 'Cabuyao, Laguna'),
(43, 'Sander Yawat', 'sander@gmail.com', '9876352616', 'Binan, Laguna'),
(44, 'Saturnina Reyes', 'saturn@gmail.com', '9876543212', 'Binan, Laguna');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(8) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `contact_number`, `address`, `role`) VALUES
(1, 'miggy@gmail.com', 'admin1', 'Miguel Reyes', '9989274389', 'Binan, Laguna', 'Admin'),
(2, 'justin@gmail.com', 'admin1', 'Justin Charles \r\n', '9732871632', 'Sta. Rosa, Laguna', 'Admin'),
(7, 'xian@gmail.com', 'admin1', 'Xian Tiu', '9123456789', 'Santa Rosa, Laguna', 'Employee'),
(8, 'ago@gmail.com', 'admin1', 'Berto Agorilla', '9832837482', 'South City, Binan', 'Employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archive_invoices`
--
ALTER TABLE `archive_invoices`
  ADD PRIMARY KEY (`INVOICE_ID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`INVOICE_ID`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `medicines_stock`
--
ALTER TABLE `medicines_stock`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `BATCH_ID` (`BATCH_ID`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`VOUCHER_NUMBER`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archive_invoices`
--
ALTER TABLE `archive_invoices`
  MODIFY `INVOICE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `INVOICE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `medicines_stock`
--
ALTER TABLE `medicines_stock`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `VOUCHER_NUMBER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

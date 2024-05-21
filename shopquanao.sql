-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 21, 2024 at 11:41 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopquanao`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `bill_name` varchar(255) NOT NULL,
  `bill_email` varchar(255) NOT NULL,
  `bill_address` varchar(200) NOT NULL,
  `bill_phone` varchar(20) NOT NULL,
  `bill_pttt` int(11) NOT NULL DEFAULT 0,
  `total` varchar(255) NOT NULL,
  `ngaydathang` varchar(200) NOT NULL,
  `bill_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `iduser`, `bill_name`, `bill_email`, `bill_address`, `bill_phone`, `bill_pttt`, `total`, `ngaydathang`, `bill_status`) VALUES
(2, 9, 'alex nguyen', 'nguyenbaloi2407@gmail.com', '123', '1235778888', 1, '300', '29/08/2022', 0),
(3, 9, 'alex nguyen', 'nguyenbaloi2407@gmail.com', '123', '1235778888', 1, '0', '29/08/2022', 0),
(4, 9, 'alex nguyen', 'nguyenbaloi2407@gmail.com', '123', '1235778888', 1, '0', '29/08/2022', 0),
(5, 13, 'baloi', 'alex@email.com', '273 An D. Vương, Phường 3, Quận 5', '098763456373', 0, '300', '21/05/2024', 0),
(6, 13, 'baloi', 'alex@email.com', '273 An D. Vương, Phường 3, Quận 5', '098763456373', 3, '300', '21/05/2024', 0);

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `noidung` text NOT NULL,
  `idpro` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `ngaybinhluan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`id`, `noidung`, `idpro`, `iduser`, `ngaybinhluan`) VALUES
(2, 'cibwiec\r\n', 12, 12, '26/08/2022'),
(3, 'csldc', 12, 12, '26/08/2022'),
(4, 'ciwbei\r\n', 7, 12, '26/08/2022'),
(5, 'good', 12, 9, '31/08/2022');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idpro` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(255) NOT NULL,
  `soluong` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `idbill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `iduser`, `idpro`, `img`, `name`, `price`, `soluong`, `thanhtien`, `idbill`) VALUES
(4, 9, 9, '38.jpg', 'Dresses', '300', 1, 300, 2),
(5, 13, 9, '38.jpg', 'Dresses', '300', 1, 300, 5),
(6, 13, 9, '38.jpg', 'Dresses', '300', 1, 300, 6);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `tendm` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendm`) VALUES
(7, 'Skirts & Tops'),
(8, 'Jeans'),
(9, 'Short & Skirts'),
(10, 'Dresses'),
(17, 'Sandals');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `gia` varchar(255) NOT NULL,
  `mota` text DEFAULT NULL,
  `luotxem` int(11) NOT NULL,
  `iddm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensp`, `img`, `gia`, `mota`, `luotxem`, `iddm`) VALUES
(3, 'Jeans', '61.jpg', '300', '', 0, 8),
(6, 'Dresses', '36.jpg', '250', '', 0, 10),
(7, 'Dresses', '30.jpg', '250', 'cwbcuiwb', 0, 10),
(8, 'Dresses', '27.jpg', '250', '', 0, 10),
(9, 'Dresses', '38.jpg', '300', '', 0, 10),
(10, 'Short & Skirts', '40.jpg', '300', '', 0, 9),
(11, 'Jeans', 'j8.jpg', '300', '', 0, 8),
(12, 'Dresses', 'j6.jpg', '300', 'wcecwcw', 0, 10),
(13, 'Jeans', 'j1.jpg', '300', '', 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `ngaysinh` varchar(200) NOT NULL,
  `dienthoai` varchar(255) DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `hoten`, `email`, `matkhau`, `ngaysinh`, `dienthoai`, `diachi`, `role`) VALUES
(9, 'alex nguyen', 'nguyenbaloi2407@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '1235778888', '123', 0),
(11, 'Lio', 'dcscdsc@email.com', 'd41d8cd98f00b204e9800998ecf8427e', '0002-02-02', '1235778889', '', 0),
(12, 'alex nguyen', 'baloi@gmail.com', '6e02af3158af9cbb9059fc9ecb6a96b4', '0022-02-22', '0903123778', '123/12 Quận 1, TP.HCM', 0),
(13, 'baloi', 'alex@email.com', '827ccb0eea8a706c4c34a16891f84e7b', '2002-05-01', '098763456373', '273 An D. Vương, Phường 3, Quận 5', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

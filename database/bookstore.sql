-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2021 at 03:53 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `special` tinyint(4) DEFAULT 0,
  `sale_off` int(3) DEFAULT 0,
  `picture` text DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `ordering` int(11) DEFAULT 10,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `description`, `price`, `special`, `sale_off`, `picture`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`, `category_id`) VALUES
(31, 'Samsung Galaxy A32', 'Thiết kế thời thượng cùng màu sắc bắt mắt\r\nSamsung Galaxy A32 4G có mặt lưng nhựa cao cấp với thiết kế đơn giản, trang nhã, không chỉ giúp bảo vệ máy mà còn tăng độ bóng bẩy cho smartphone, mang đến vẻ ngoài đẳng cấp cho người sở hữu.\r\nTổng kích thước thân máy mỏng chỉ 8.4 mm và có trọng lượng 184 g, hai cạnh bên cũng được vát cong nhẹ nhàng nên việc cầm nắm cũng chắc chắn hơn và thuận tiện cho mọi tác vụ.', '6690000', 1, 4, 'wx4uqb6MG8.jpg', '2021-03-15 06:44:42', 'Founder', '2021-03-31 16:30:43', 'Manager', 'active', 10, 4),
(50, 'Samsung Galaxy A52 (8GB/256GB)', 'Thời gian: Từ 1 - 5/4\r\n\r\nKhuyến mãi: \r\nGalaxy A52: Trả góp 0% + Giảm ngay 500.000đ hoặc Giảm ngay 500.000đ +  Giảm thêm 500.000đ qua VNPAY\r\nGalaxy A72: Trả góp 0% + Giảm ngay 500.000đ hoặc Giảm ngay 500.000đ +  Giảm thêm 500.000đ qua VNPAY\r\n\r\nBộ bán hàng chuẩn A52/A72: Hộp, sách hướng dẫn, cây lấy sim, cáp, sạc.\r\n\r\nLưu Ý: \r\n- Khuyến mãi Trả góp 0% KHÔNG áp dụng kèm giảm giá qua VNPAY\r\n- CHỈ Đặt và Nhận hàng trong thời gian diễn ra chương trình 1 - 5/4\r\n- CHỈ áp dụng khuyến mãi tại siêu thị có sẵn hàng hoặc giao hàng tận nơi.\r\n- MỘT khách hàng chỉ được mua MỘT máy/Model', '10290000', 1, 10, 'WmZ0CeA93c.jpg', '2021-03-31 16:58:57', 'Manager', NULL, NULL, 'active', 10, 4),
(51, 'iPhone XR 128GB', 'Màn hình tràn viền công nghệ LCD - True Tone\r\nThay vì sở hữu màn hình OLED truyền thống, chiếc smartphone này sở hữu màn hình LCD.\r\n\r\nBù lại với công nghệ True Tone cùng màn hình tràn viền rộng tới 6.1 inch, mọi trải nghiệm trên máy vẫn đem lại sự thích thú và hoàn hảo, như dòng cao cấp khác của Apple.\r\nNgoài ra, Apple cũng giới thiệu rằng, iPhone Xr được trang bị một loại công nghệ mới có tên Liquid Retina. Máy có độ phân giải 1792 x 828 Pixels cùng 1.4 triệu điểm ảnh.\r\n\r\nMượt mà mọi trải nghiệm nhờ chip Apple A12\r\nVới mỗi lần ra mắt, Apple lại giới thiệu một con chip mới và Apple A12 Bionic là con chip đầu tiên sản xuất với tiến trình 7nm được tích hợp trên iPhone Xr.\r\nApple A12 được tích hợp trí tuệ thông minh nhân tạo, mọi phản hồi trên máy đều nhanh chóng và gần như là ngay lập tức, kể cả khi bạn chơi game hay thao tác bình thường.', '16490000', 1, 0, 'Ro17q9aASQ.jpg', '2021-03-31 17:06:35', 'Manager', NULL, NULL, 'active', 10, 1),
(52, 'iPhone 12 Pro Max 512GB', 'Thu hút từ cái nhìn đầu tiên\r\nQuay trở lại đầy hoài niệm với thiết kế phẳng, vuông vức tương tự iPhone 4 nhưng không hề cho cảm giác lỗi thời mà hoàn toàn sang trọng với thiết kế tinh tế và được cấu tạo từ những vật liệu cao cấp hơn.\r\niPhone 12 Pro Max được chế tác từ mặt kính cường lực Ceramic Shield có độ bền gấp 4 lần iPhone tiền nhiệm, phần khung cấu tạo từ thép không gỉ cực kỳ chắc chắn. Mang lại khả năng chống trầy, chống va đập tốt hơn.\r\nSuper Retina XDR - mang đến trải nghiệm màn hình chân thực\r\nSau những phàn nàn về phần viền màn hình của iPhone 11 series thì nay chiếc iPhone 12 Pro Max 512GB đã được cải thiện triệt để với kích thước màn hình 6.7 inch, tỉ lệ màn hình so với thân máy tương đương 87.4% tăng tối đa diện tích hiển thị.\r\n\r\nCông nghệ màn hình Super Retina XDR mang đến trải nghiệm màn hình chân thực từng chi tiết. Nhờ tính năng True Tone tự động điều chỉnh cho độ chính xác màu sắc cao, ánh sáng hài hòa.', '40990000', 1, 0, 'kB184YoTaF.jpg', '2021-03-31 17:08:19', 'Manager', NULL, NULL, 'active', 10, 1),
(53, 'Điện thoại iPhone 12 mini 128GB', 'A14 Bionic cho sức mạnh hàng đầu\r\nMỗi thế hệ iPhone mới đều tương ứng với dòng CPU mới hơn nhằm mang lại hiệu năng mạnh mẽ nhất. Có lẽ đó, mà iPhone 12 mini có nguồn sức mạnh đến từ A14 Bionic với quy trình sản xuất 5 nm.\r\n\r\nĐây được coi là con chip thuộc top những con chip mạnh nhất đến từ Apple tính đến thời điểm hiện tại (10/2020) mang đến sức mạnh vượt trội.Đặc điểm nổi bật của iPhone 12 mini 128GB\r\n\r\nBộ sản phẩm chuẩn: Hộp, Sách hướng dẫn, Cây lấy sim, Cáp Lightning - Type C\r\n\r\nApple tiếp tục khẳng định vị thế của mình trên thị trường smartphone khi mới đây cho ra mắt mẫu iPhone 12 với nhiều điểm được tối ưu hơn, nâng cấp mạnh hơn. Trong đó, iPhone 12 mini 128 GB được ví như là phiên bản thu nhỏ hơn là bản rút gọn với cấu hình không khác gì mấy anh lớn có mức giá hấp dẫn hơn.\r\nA14 Bionic cho sức mạnh hàng đầu\r\nMỗi thế hệ iPhone mới đều tương ứng với dòng CPU mới hơn nhằm mang lại hiệu năng mạnh mẽ nhất. Có lẽ đó, mà iPhone 12 mini có nguồn sức mạnh đến từ A14 Bionic với quy trình sản xuất 5 nm.\r\n\r\nĐây được coi là con chip thuộc top những con chip mạnh nhất đến từ Apple tính đến thời điểm hiện tại (10/2020) mang đến sức mạnh vượt trội.\r\n\r\niPhone 12 Mini 128 GB | Chip A14 với tốc độ xử lí vượt trội\r\n\r\nApple khẳng định A14 nhanh hơn 50% so với bất kỳ CPU smartphone nào khác trên thị trường, đồng thời còn đi kèm với một GPU hiệu năng cao giúp cải thiện khả năng chơi game của thiết bị.\r\n\r\nXem thêm: Tìm hiểu chip xử lý Apple A14 Bionic. Hiệu năng mạnh đến mức nào?\r\n\r\nĐi kèm với cấu hình cao là hệ điều hành iOS 14 tối ưu hơn cũng như đã được nâng cấp thêm nhiều tính năng mới.', '20590000', 1, 10, 'x6P7rZzpdk.jpg', '2021-03-31 17:13:05', 'Manager', NULL, NULL, 'active', 10, 1),
(54, 'Xiaomi Mi11 5G', '', '21990000', 1, 2, 'lbizJjqDLv.jpg', '2021-03-31 17:30:26', 'Manager', NULL, NULL, 'active', 10, 3),
(55, 'Xiaomi Mi 10T Pro 5G', '', '12990000', 1, 3, 'MRV9NTtznB.jpg', '2021-03-31 17:31:04', 'Manager', NULL, NULL, 'active', 10, 3),
(56, 'Samsung Galaxy Z Fold2 5G', '', '50000000', 1, 0, 'YlNd328UIj.jpg', '2021-03-31 17:35:58', 'Manager', NULL, NULL, 'active', 10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` varchar(45) NOT NULL,
  `username` varchar(255) NOT NULL,
  `books` text NOT NULL,
  `prices` text NOT NULL,
  `quantities` text NOT NULL,
  `names` text NOT NULL,
  `pictures` text NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `username`, `books`, `prices`, `quantities`, `names`, `pictures`, `status`, `date`) VALUES
('CWbPqTjifs', 'dangvy202@gmail.com', '[\"33\"]', '[\"125666\"]', '[\"7\"]', '[\"dangvy test 4 \"]', '[\"yialndQbKT.png\"]', 0, '2021-03-31 11:29:54'),
('EL48vrFZNK', 'dangvy202@gmail.com', '[\"50\"]', '[\"10290000\"]', '[\"6\"]', '[\"Samsung Galaxy A52 (8GB/256GB)\"]', '[\"WmZ0CeA93c.jpg\"]', 0, '2021-04-11 07:36:26'),
('fVTKi6omhF', 'dangvy202@gmail.com', '[\"35\"]', '[\"123000\"]', '[\"1\"]', '[\"hahahaha\"]', '[\"39YhxV0zgu.jpg\"]', 0, '2021-03-31 11:17:42'),
('ISz075UBsH', 'dangvy202@gmail.com', '[\"34\"]', '[\"122222\"]', '[\"1\"]', '[\"dangvy test 5 \"]', '[\"HEsIhrVcOa.jpg\"]', 0, '2021-03-31 11:16:54'),
('iW9dfQlpR2', 'dangvy202@gmail.com', '[\"50\",\"51\"]', '[\"10290000\",\"16490000\"]', '[\"1\",\"1\"]', '[\"Samsung Galaxy A52 (8GB/256GB)\",\"iPhone XR 128GB\"]', '[\"WmZ0CeA93c.jpg\",\"Ro17q9aASQ.jpg\"]', 0, '2021-04-02 07:29:45'),
('krIbTC5cDm', 'dangvy202@gmail.com', '[\"34\"]', '[\"122222\"]', '[\"1\"]', '[\"dangvy test 5 \"]', '[\"HEsIhrVcOa.jpg\"]', 0, '2021-03-31 11:17:17'),
('mAeOHtgja3', 'dangvy202@gmail.com', '[\"31\",\"32\",\"35\"]', '[\"12222\",\"1200000\",\"123000\"]', '[\"200\",\"100\",\"100\"]', '[\"Dnag Vy test 123\",\"Sach hay\",\"hahahaha\"]', '[\"LhVDcObNae.jpg\",\"PneIXl7HcT.png\",\"39YhxV0zgu.jpg\"]', 0, '2021-03-31 10:35:08'),
('mtUGwAh1Fx', 'dangvy202@gmail.com', '[\"53\"]', '[\"20590000\"]', '[\"6\"]', '[\"u0110iu1ec7n thou1ea1i iPhone 12 mini 128GB\"]', '[\"x6P7rZzpdk.jpg\"]', 0, '2021-04-08 14:42:15'),
('O8SlqETb3k', 'dangvy202@gmail.com', '[\"35\"]', '[\"123000\"]', '[\"1\"]', '[\"hahahaha\"]', '[\"39YhxV0zgu.jpg\"]', 0, '2021-03-31 11:18:08'),
('vnOpRkmM6V', 'dangvy202@gmail.com', '[\"35\"]', '[\"123000\"]', '[\"1\"]', '[\"hahahaha\"]', '[\"39YhxV0zgu.jpg\"]', 0, '2021-03-31 11:21:48'),
('WCYJI2Gkov', 'dangvy202@gmail.com', '[\"34\",\"35\"]', '[\"122222\",\"123000\"]', '[\"2\",\"104\"]', '[\"dangvy test 5 \",\"hahahaha\"]', '[\"HEsIhrVcOa.jpg\",\"39YhxV0zgu.jpg\"]', 0, '2021-03-31 11:16:15'),
('YlrJ1zotAC', 'dangvy202@gmail.com', '[\"33\"]', '[\"125666\"]', '[\"1\"]', '[\"dangvy test 4 \"]', '[\"yialndQbKT.png\"]', 0, '2021-03-31 10:33:12'),
('zRpaetGr36', 'dangvy202@gmail.com', '[\"50\"]', '[\"10290000\"]', '[\"1\"]', '[\"Samsung Galaxy A52 (8GB/256GB)\"]', '[\"WmZ0CeA93c.jpg\"]', 0, '2021-04-03 05:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `picture` text DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `ordering` int(11) DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `picture`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`) VALUES
(1, 'IPHONE', 'fBZ6IuYyvU.jpg', '2013-12-09 00:00:00', 'admin', '2021-03-31 16:21:28', 'Manager', 'active', 10),
(2, 'OPPO', 'alRLG90feh.png', '2013-12-09 00:00:00', 'admin', '2021-03-31 16:21:43', 'Manager', 'active', 4),
(3, 'XIAOMI', 'licgNdh0ez.jpg', '2013-12-09 00:00:00', 'admin', '2021-03-31 16:22:33', 'Manager', 'active', 10),
(4, 'SAMSUNG', 'G6zXIcewYT.jpg', '2013-12-09 00:00:00', 'admin', '2021-03-31 16:23:58', 'Manager', 'active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `create` datetime NOT NULL,
  `create_by` varchar(255) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` varchar(255) NOT NULL,
  `rate` int(9) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `username`, `email`, `comment`, `create`, `create_by`, `modified`, `modified_by`, `rate`, `id_product`) VALUES
(66, 'Vy', '', 'sadasdasdas', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 5, 51),
(67, 'Vy', '', 'sadasdasdas', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 5, 51),
(68, '', '', 'asdasdasd', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 0, 51),
(69, '', '', 'asdasdasd', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 0, 51),
(70, '', '', 'hihihih', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 0, 51),
(71, '', '', 'hihihih', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 0, 51),
(72, '', '', 'hihihih', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 0, 51),
(73, '', '', 'hihihih', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 0, 51),
(74, '', '', 'gggg', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 0, 51),
(75, '', '', 'gggg', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 0, 51),
(76, '', '', 'aaaaa', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 0, 51),
(77, '', '', 'aaaaa', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 0, 51);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `group_acp` tinyint(1) DEFAULT 0,
  `created` datetime NOT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `modified` datetime NOT NULL,
  `modified_by` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `ordering` int(11) DEFAULT 10,
  `privilege_id` text NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`, `group_acp`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`, `privilege_id`, `picture`) VALUES
(1, 'Admin', 0, '2013-11-11 00:00:00', 'admin', '2013-11-12 00:00:00', 'admin', 'inactive', 5, '1,2,3,4,5,6,7,8,9,10', ''),
(2, 'Manager', 0, '2013-11-07 00:00:00', 'admin', '2013-12-03 00:00:00', 'admin', 'inactive', 4, '1,2,3,4,6,7,8,9,10', ''),
(3, 'Member', 0, '2013-11-12 00:00:00', 'admin', '2013-12-03 00:00:00', 'admin', 'inactive', 2, '', ''),
(4, 'Founder', 1, '2021-03-12 09:45:11', 'Manager', '0000-00-00 00:00:00', NULL, 'active', 10, '', ''),
(11, 'Founder test', 1, '2021-03-14 12:53:07', 'admin', '2021-03-08 12:53:07', NULL, 'active', 10, '', ''),
(12, 'asdsa', 1, '2021-03-15 06:35:08', 'Founder', '0000-00-00 00:00:00', NULL, 'active', 10, '', ''),
(13, 'haha', 1, '2021-03-27 04:03:55', 'Founder', '0000-00-00 00:00:00', NULL, 'active', 10, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE `privilege` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `module` varchar(45) NOT NULL,
  `controller` varchar(45) NOT NULL,
  `action` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`id`, `name`, `module`, `controller`, `action`) VALUES
(1, 'Hiển thị danh sách người dùng', 'admin', 'user', 'index'),
(2, 'Thay đổi status của người dùng', 'admin', 'user', 'status'),
(3, 'Cập nhật thông tin của người dùng', 'admin', 'user', 'form'),
(4, 'Thay đổi status của người dùng sử dụng Ajax', 'admin', 'user', 'ajaxStatus'),
(5, 'Xóa một hoặc nhiều người dùng', 'admin', 'user', 'trash'),
(6, 'Thay đổi vị trí hiển thị của các người dùng', 'admin', 'user', 'ordering'),
(7, 'Truy cập menu Admin Control Panel', 'admin', 'index', 'index'),
(8, 'Đăng nhập Admin Control Panel', 'admin', 'index', 'login'),
(9, 'Đăng xuất Admin Control Panel', 'admin', 'index', 'logout'),
(10, 'Cập nhật thông tin tài khoản quản trị', 'admin', 'index', 'profile');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `picture` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `thumb` int(11) NOT NULL,
  `link` text NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `ordering` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `picture`, `type`, `thumb`, `link`, `description`, `content`, `status`, `ordering`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(28, 'EmFo2nRlf0.png', 'main ads', 2, 'http://localhost/FONTENDZEND/index.php?module=backend&controller=banner&action=form', 'asdhjashjagsfasf', 'dfanasbfsabfsanmfb', 'active', 12, '2021-04-11 15:11:43', 'Founder', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(45) NOT NULL,
  `created` date DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `modified_by` varchar(45) DEFAULT NULL,
  `register_date` datetime DEFAULT NULL,
  `register_ip` varchar(25) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `ordering` int(11) DEFAULT 10,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `fullname`, `password`, `picture`, `created`, `created_by`, `modified`, `modified_by`, `register_date`, `register_ip`, `status`, `ordering`, `group_id`) VALUES
(1, 'nvan', 'nvan@gmail.com', 'Nguyễn Văn An', 'e10adc3949ba59abbe56e057f20f883e', '', '0000-00-00', '1', '0000-00-00', NULL, '0000-00-00 00:00:00', NULL, 'active', 4, 1),
(2, 'nvb', 'nvb@gmail.com', 'Nguyễn Văn B', 'e10adc3949ba59abbe56e057f20f883e', '', '0000-00-00', '1', '0000-00-00', NULL, '0000-00-00 00:00:00', NULL, 'active', 3, 2),
(3, 'nvc', 'nvc@gmail.com', 'Nguyễn Văn C', 'e10adc3949ba59abbe56e057f20f883e', '', '0000-00-00', '1', '0000-00-00', NULL, '0000-00-00 00:00:00', NULL, 'active', 2, 3),
(4, 'admin', 'admin@gmail.com', 'Admin', '202cb962ac59075b964b07152d234b70', 'Yy6xv9MCDV.jpg', '0000-00-00', '1', '2021-03-11', 'Manager', '0000-00-00 00:00:00', NULL, 'active', 1, 2),
(5, 'nguyenvana1', 'lthlan54@gmail.com', 'Admin 3', '3b269d99b6c31f1467421bbcfdec7908', '', '0000-00-00', NULL, '0000-00-00', NULL, '2013-11-19 18:11:45', '127.0.0.1', 'active', 10, 0),
(6, 'nguyenvana2', 'lthlan55@gmail.com', 'Admin 3', '3b269d99b6c31f1467421bbcfdec7908', '', '0000-00-00', NULL, '0000-00-00', NULL, '2013-11-19 18:11:09', '127.0.0.1', 'active', 10, 0),
(7, 'nguyenvana4', 'lthlan56@gmail.com', '', '3b269d99b6c31f1467421bbcfdec7908', '', '0000-00-00', NULL, '0000-00-00', NULL, '2013-11-19 18:11:08', '127.0.0.1', 'active', 10, 0),
(8, 'nguyenvana12', 'lthlan541@gmail.com', 'Admin 3', '3b269d99b6c31f1467421bbcfdec7908', '', '0000-00-00', NULL, '2013-12-02', '4', '2013-11-19 18:11:06', '127.0.0.1', 'active', 12, 1),
(9, 'nguyenvana122', 'lthlan5412@gmail.com', '', '3b269d99b6c31f1467421bbcfdec7908', '', '2013-12-02', '4', '2013-12-02', '4', '0000-00-00 00:00:00', NULL, 'active', 1, 3),
(10, 'admin01', 'admin01@gmail.com', 'Admin 123', 'e5c0fe73b84c06f43393b87a9c6acaa1', '', '0000-00-00', NULL, '2013-12-07', 'admin', '2013-12-03 08:12:23', '127.0.0.1', 'active', 10, 2),
(12, 'dangvy', 'dangvy202@gmail.com', 'Tran Dang Vy', '202cb962ac59075b964b07152d234b70', 'gdWDL1BOIA.jpg', '2021-03-12', 'Manager', '2021-03-20', 'Manager', NULL, '::1', 'active', 10, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `privilege`
--
ALTER TABLE `privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

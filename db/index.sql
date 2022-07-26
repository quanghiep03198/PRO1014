-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 25, 2022 lúc 11:10 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pro1014`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` int(2) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `name`) VALUES
(1, 'Sony Playstation'),
(2, 'Nitendo Switch'),
(3, 'Microsoft Xbox');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(20) NOT NULL,
  `order_id` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `order_stt_id` int(20) NOT NULL DEFAULT 1,
  `shipping_method_id` int(1) NOT NULL,
  `payment_method_id` int(1) NOT NULL,
  `total_amount` int(10) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `user_name`, `shipping_address`, `create_date`, `phone`, `order_stt_id`, `shipping_method_id`, `payment_method_id`, `total_amount`, `email`) VALUES
(15, 'AC2035SD', 0, 'Quang Hiệp', '60/66/Nguyễn Hoàng/Mai Dịch/Hà Nội', '2022-07-23 17:00:00', '0336089988', 1, 1, 1, 7000000, 'quanghiep031@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` int(20) NOT NULL,
  `order_id` int(20) NOT NULL,
  `product_id` int(10) NOT NULL,
  `unit_price` int(10) NOT NULL,
  `quantity` int(5) NOT NULL,
  `total` int(10) NOT NULL,
  `warranty_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `unit_price`, `quantity`, `total`, `warranty_time`) VALUES
(14, 15, 12, 7000000, 1, 7000000, '2024-07-23 17:52:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_status`
--

CREATE TABLE `order_status` (
  `id` int(20) NOT NULL,
  `stt_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_status`
--

INSERT INTO `order_status` (`id`, `stt_name`) VALUES
(1, 'Đang xử lý'),
(2, 'Đang giao hàng'),
(3, 'Hoàn thành'),
(4, 'Đã hủy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(1) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payment_method`
--

INSERT INTO `payment_method` (`id`, `name`) VALUES
(1, 'Giao hàng tiết kiệm'),
(2, 'Giao hàng nhanh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `posted_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `short_desc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `author_id` int(10) NOT NULL,
  `post_cate_id` int(10) NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_category`
--

CREATE TABLE `post_category` (
  `id` int(10) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_comment`
--

CREATE TABLE `post_comment` (
  `id` int(10) NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `posted_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `prod_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cate_id` int(2) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `discount` float(10,0) NOT NULL,
  `stock` int(5) NOT NULL,
  `warranty_time` int(1) NOT NULL,
  `man_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `prod_name`, `cate_id`, `image`, `price`, `description`, `discount`, `stock`, `warranty_time`, `man_id`) VALUES
(12, 'Playstation 4 - Slim', 1, 'ps4-slim.webp', '7000000', '<table class=\"table w-full\">\r\n		<tr>\r\n			<th>Tên sản phẩm</th>\r\n			<td>PlayStation®4</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Series sản phẩm</th>\r\n			<td>CUH-2000 series</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Ram</th>\r\n			<td>GDDR5 8GB</td>\r\n		</tr>\r\n		\r\n		<tr>\r\n			<th>Bo mạch chủ</th>\r\n			<td>\r\n				<ul>\r\n					<li>Single-chip custom processor</li>\r\n					<li>CPU : x86-64 AMD “Jaguar”, 8 cores</li>\r\n					<li>GPU : 1.84 TFLOPS, AMD Radeon™ based graphics engine</li>\r\n				</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Dung lượng bộ nhớ</th>\r\n			<td>500GB, 1TB</td>\r\n		</tr>\r\n\r\n		<tr>\r\n			<th>Cổng kết nối</th>\r\n			<td>Super-Speed USB (USB 3.1 Gen1) port × 2\r\n				AUX port × 1</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Kết nối</th>\r\n			<td>\r\n				<ul>\r\n					<li>Ethernet（10BASE-T, 100BASE-TX, 1000BASE-T）×1</li>\r\n					<li>IEEE 802.11 a/b/g/n/ac</li>\r\n					<li>Bluetooth®v4.0</li>\r\n				</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Điện tiêu thụ</th>\r\n			<td>AC 100-240V, 50/60Hz</td>\r\n		</tr>\r\n	</table>', 10, 100, 1, 1),
(13, 'Playstation 4 - Pro', 1, 'ps4-pro.webp', '8000000', '<table class=\"table w-full\">\r\n		<tr>\r\n			<th>Tên sản phẩm</th>\r\n			<td>PlayStation®4</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Series sản phẩm</th>\r\n			<td>CUH-2000 series</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Ram</th>\r\n			<td>GDDR5 8GB</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Bo mạch chủ</th>\r\n			<td>\r\n				<ul>\r\n					<li>Single-chip custom processor</li>\r\n					<li>CPU : x86-64 AMD “Jaguar”, 8 cores</li>\r\n					<li>GPU : 1.84 TFLOPS, AMD Radeon™ based graphics engine</li>\r\n				</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Dung lượng bộ nhớ</th>\r\n			<td>500GB, 1TB</td>\r\n		</tr>\r\n\r\n		<tr>\r\n			<th>Cổng kết nối</th>\r\n			<td>Super-Speed USB (USB 3.1 Gen1) port × 2\r\n				AUX port × 1</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Kết nối</th>\r\n			<td>\r\n				<ul>\r\n					<li>Ethernet（10BASE-T, 100BASE-TX, 1000BASE-T）×1</li>\r\n					<li>IEEE 802.11 a/b/g/n/ac</li>\r\n					<li>Bluetooth®v4.0</li>\r\n				</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Điện tiêu thụ</th>\r\n			<td>AC 100-240V, 50/60Hz</td>\r\n		</tr>\r\n	</table>', 10, 100, 2, 1),
(14, 'Playstation 5 - Digital Edition', 1, 'ps5.webp', '14000000', '', 0, 100, 2, 1),
(15, 'Playstation 5 - Standard Edition', 1, 'ps5.webp', '15000000', '', 0, 100, 2, 1),
(16, 'Dualshock 4', 2, 'ds4-black.webp', '1200000', '<table class=\"table\">\r\n	<tr>\r\n		<th>Tên sản phẩm</th>\r\n		<td>Tay cầm DUALSHOCK®4</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Tên sản phẩm</th>\r\n		<td>Tay cầm DUALSHOCK®4</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Mã sản phẩm</th>\r\n		<td>CUH-ZCT2</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Kích thước</th>\r\n		<td>1mm x 57mm x 100mm</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Trọng lượng</th>\r\n		<td>Xấp xỉ 210g</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Phím</th>\r\n		<td>\r\n			Nút PS, nút CHIA SẺ, nút TÙY CHỌN, nút Hướng (Lên / Xuống / Trái / Phải), Nút hành động (Hình tam giác, Hình tròn, Chữ thập, Hình vuông), nút R1 / L1 / R2 / L2, Nút thanh trái / L3, Thanh phải\r\n			Nút / R3, Nút Touch Pad/ Touch Pad/Cảm biến chuyển động\r\n		</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Pin</th>\r\n		<td>Pin sạc Lithium-ion tích hợp,DC3,65V,1000mAh</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Cổng kết nối</th>\r\n		<td>Bluetooth® v2.1</td>\r\n	</tr>\r\n</table>\r\n', 20, 100, 1, 1),
(17, 'Dualshock 4 - Gold', 2, 'ds4-gold.webp', '1200000', '<table class=\"table\">\r\n	<tr>\r\n		<th>Tên sản phẩm</th>\r\n		<td>Tay cầm DUALSHOCK®4</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Tên sản phẩm</th>\r\n		<td>Tay cầm DUALSHOCK®4</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Mã sản phẩm</th>\r\n		<td>CUH-ZCT2</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Kích thước</th>\r\n		<td>1mm x 57mm x 100mm</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Trọng lượng</th>\r\n		<td>Xấp xỉ 210g</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Phím</th>\r\n		<td>\r\n			Nút PS, nút CHIA SẺ, nút TÙY CHỌN, nút Hướng (Lên / Xuống / Trái / Phải), Nút hành động (Hình tam giác, Hình tròn, Chữ thập, Hình vuông), nút R1 / L1 / R2 / L2, Nút thanh trái / L3, Thanh phải\r\n			Nút / R3, Nút Touch Pad/ Touch Pad/Cảm biến chuyển động\r\n		</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Pin</th>\r\n		<td>Pin sạc Lithium-ion tích hợp,DC3,65V,1000mAh</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Cổng kết nối</th>\r\n		<td>Bluetooth® v2.1</td>\r\n	</tr>\r\n</table>\r\n', 20, 100, 1, 1),
(18, 'Dualshock 4 - Green Camouflage', 2, 'ds4-camo.webp', '1200000', '<table class=\"table\">\r\n	<tr>\r\n		<th>Tên sản phẩm</th>\r\n		<td>Tay cầm DUALSHOCK®4</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Tên sản phẩm</th>\r\n		<td>Tay cầm DUALSHOCK®4</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Mã sản phẩm</th>\r\n		<td>CUH-ZCT2</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Kích thước</th>\r\n		<td>1mm x 57mm x 100mm</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Trọng lượng</th>\r\n		<td>Xấp xỉ 210g</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Phím</th>\r\n		<td>\r\n			Nút PS, nút CHIA SẺ, nút TÙY CHỌN, nút Hướng (Lên / Xuống / Trái / Phải), Nút hành động (Hình tam giác, Hình tròn, Chữ thập, Hình vuông), nút R1 / L1 / R2 / L2, Nút thanh trái / L3, Thanh phải\r\n			Nút / R3, Nút Touch Pad/ Touch Pad/Cảm biến chuyển động\r\n		</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Pin</th>\r\n		<td>Pin sạc Lithium-ion tích hợp,DC3,65V,1000mAh</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Cổng kết nối</th>\r\n		<td>Bluetooth® v2.1</td>\r\n	</tr>\r\n</table>\r\n', 0, 100, 1, 1),
(19, 'Dualshock 4 - Magma Red', 2, 'ds4-red.webp', '1200000', '<table class=\"table\">\r\n	<tr>\r\n		<th>Tên sản phẩm</th>\r\n		<td>Tay cầm DUALSHOCK®4</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Tên sản phẩm</th>\r\n		<td>Tay cầm DUALSHOCK®4</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Mã sản phẩm</th>\r\n		<td>CUH-ZCT2</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Kích thước</th>\r\n		<td>1mm x 57mm x 100mm</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Trọng lượng</th>\r\n		<td>Xấp xỉ 210g</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Phím</th>\r\n		<td>\r\n			Nút PS, nút CHIA SẺ, nút TÙY CHỌN, nút Hướng (Lên / Xuống / Trái / Phải), Nút hành động (Hình tam giác, Hình tròn, Chữ thập, Hình vuông), nút R1 / L1 / R2 / L2, Nút thanh trái / L3, Thanh phải\r\n			Nút / R3, Nút Touch Pad/ Touch Pad/Cảm biến chuyển động\r\n		</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Pin</th>\r\n		<td>Pin sạc Lithium-ion tích hợp,DC3,65V,1000mAh</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Cổng kết nối</th>\r\n		<td>Bluetooth® v2.1</td>\r\n	</tr>\r\n</table>\r\n', 0, 100, 1, 1),
(20, 'Dualshock 4 - Blue', 2, 'ds4-blue.webp', '1200000', '<table class=\"table\">\r\n	<tr>\r\n		<th>Tên sản phẩm</th>\r\n		<td>Tay cầm DUALSHOCK®4</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Tên sản phẩm</th>\r\n		<td>Tay cầm DUALSHOCK®4</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Mã sản phẩm</th>\r\n		<td>CUH-ZCT2</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Kích thước</th>\r\n		<td>1mm x 57mm x 100mm</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Trọng lượng</th>\r\n		<td>Xấp xỉ 210g</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Phím</th>\r\n		<td>\r\n			Nút PS, nút CHIA SẺ, nút TÙY CHỌN, nút Hướng (Lên / Xuống / Trái / Phải), Nút hành động (Hình tam giác, Hình tròn, Chữ thập, Hình vuông), nút R1 / L1 / R2 / L2, Nút thanh trái / L3, Thanh phải\r\n			Nút / R3, Nút Touch Pad/ Touch Pad/Cảm biến chuyển động\r\n		</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Pin</th>\r\n		<td>Pin sạc Lithium-ion tích hợp,DC3,65V,1000mAh</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Cổng kết nối</th>\r\n		<td>Bluetooth® v2.1</td>\r\n	</tr>\r\n</table>\r\n', 0, 100, 1, 1),
(21, 'Dualshock 4 - white', 2, 'ds4-white.webp', '1200000', '<table class=\"table\">\r\n	<tr>\r\n		<th>Tên sản phẩm</th>\r\n		<td>Tay cầm DUALSHOCK®4</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Tên sản phẩm</th>\r\n		<td>Tay cầm DUALSHOCK®4</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Mã sản phẩm</th>\r\n		<td>CUH-ZCT2</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Kích thước</th>\r\n		<td>1mm x 57mm x 100mm</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Trọng lượng</th>\r\n		<td>Xấp xỉ 210g</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Phím</th>\r\n		<td>\r\n			Nút PS, nút CHIA SẺ, nút TÙY CHỌN, nút Hướng (Lên / Xuống / Trái / Phải), Nút hành động (Hình tam giác, Hình tròn, Chữ thập, Hình vuông), nút R1 / L1 / R2 / L2, Nút thanh trái / L3, Thanh phải\r\n			Nút / R3, Nút Touch Pad/ Touch Pad/Cảm biến chuyển động\r\n		</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Pin</th>\r\n		<td>Pin sạc Lithium-ion tích hợp,DC3,65V,1000mAh</td>\r\n	</tr>\r\n	<tr>\r\n		<th>Cổng kết nối</th>\r\n		<td>Bluetooth® v2.1</td>\r\n	</tr>\r\n</table>\r\n', 0, 100, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_category`
--

CREATE TABLE `product_category` (
  `id` int(2) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_category`
--

INSERT INTO `product_category` (`id`, `name`, `image`) VALUES
(1, 'Máy chơi game', 'game-console-icon.svg'),
(2, 'Tay Cầm Chơi Game', 'game-controller-icon.svg'),
(3, 'Phụ Kiện', 'assessory-icon.svg'),
(4, 'Thẻ PSN', 'image3.png'),
(5, 'Thẻ PSN', 'ps-plus.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_comment`
--

CREATE TABLE `product_comment` (
  `pr_comment_id` int(10) NOT NULL,
  `user_id` int(20) NOT NULL,
  `product_id` int(10) NOT NULL,
  `cmt_content` int(11) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_comment_reply`
--

CREATE TABLE `product_comment_reply` (
  `id` int(10) NOT NULL,
  `user_id` int(20) NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rep_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `cmt_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_feedback`
--

CREATE TABLE `product_feedback` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `user_id` int(20) NOT NULL,
  `pr_review_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_review`
--

CREATE TABLE `product_review` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `services`
--

CREATE TABLE `services` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cost` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping_method`
--

CREATE TABLE `shipping_method` (
  `id` int(1) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cost` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shipping_method`
--

INSERT INTO `shipping_method` (`id`, `name`, `cost`) VALUES
(1, 'HaNoi', 10000),
(2, 'HCM', 20000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `site_setting`
--

CREATE TABLE `site_setting` (
  `logo1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hotline` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `account` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(2) NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_role`
--

CREATE TABLE `user_role` (
  `id` int(2) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_role`
--

INSERT INTO `user_role` (`id`, `name`) VALUES
(0, 'admin'),
(1, 'staff'),
(2, 'author');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist_item`
--

CREATE TABLE `wishlist_item` (
  `id` int(10) NOT NULL,
  `wishlist_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ORDER_ID` (`order_id`),
  ADD UNIQUE KEY `order_id_2` (`order_id`),
  ADD KEY `lk_order_user` (`user_id`),
  ADD KEY `lk_order_orderstt` (`order_stt_id`),
  ADD KEY `lk_order_shipping` (`shipping_method_id`),
  ADD KEY `lk_order_payment` (`payment_method_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_orderitem_product` (`product_id`),
  ADD KEY `lk_orderitem_order` (`order_id`);

--
-- Chỉ mục cho bảng `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_post_user` (`author_id`),
  ADD KEY `lk_post_postcategory` (`post_cate_id`);

--
-- Chỉ mục cho bảng `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `post_comment`
--
ALTER TABLE `post_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_postcomment_user` (`user_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pro_manu` (`man_id`),
  ADD KEY `fk_pro_cate` (`cate_id`);

--
-- Chỉ mục cho bảng `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_comment`
--
ALTER TABLE `product_comment`
  ADD PRIMARY KEY (`pr_comment_id`),
  ADD KEY `lk_productcoment_user` (`user_id`),
  ADD KEY `lk_productcoment_product` (`product_id`);

--
-- Chỉ mục cho bảng `product_comment_reply`
--
ALTER TABLE `product_comment_reply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_productreply_user` (`user_id`),
  ADD KEY `lk_productreply_productcommnet` (`cmt_id`);

--
-- Chỉ mục cho bảng `product_feedback`
--
ALTER TABLE `product_feedback`
  ADD KEY `lk_feedback_product` (`product_id`),
  ADD KEY `lk_feedback_user` (`user_id`),
  ADD KEY `lk_feedback_productreview` (`pr_review_id`);

--
-- Chỉ mục cho bảng `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shipping_method`
--
ALTER TABLE `shipping_method`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_user_userrole` (`role_id`);

--
-- Chỉ mục cho bảng `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_wishlist_user` (`user_id`);

--
-- Chỉ mục cho bảng `wishlist_item`
--
ALTER TABLE `wishlist_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_wishlistitem_wishlist` (`wishlist_id`),
  ADD KEY `lk_wishlistitem_product` (`product_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post_comment`
--
ALTER TABLE `post_comment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `product_comment`
--
ALTER TABLE `product_comment`
  MODIFY `pr_comment_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_comment_reply`
--
ALTER TABLE `product_comment_reply`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_review`
--
ALTER TABLE `product_review`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `shipping_method`
--
ALTER TABLE `shipping_method`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wishlist_item`
--
ALTER TABLE `wishlist_item`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `lk_order_payment` FOREIGN KEY (`PAYMENT_METHOD_ID`) REFERENCES `payment_method` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lk_order_shipping` FOREIGN KEY (`SHIPPING_METHOD_ID`) REFERENCES `shipping_method` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `lk_post_postcategory` FOREIGN KEY (`post_cate_id`) REFERENCES `post_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lk_post_user` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `post_comment`
--
ALTER TABLE `post_comment`
  ADD CONSTRAINT `lk_postcomment_user` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_pro_cate` FOREIGN KEY (`cate_id`) REFERENCES `product_category` (`id`),
  ADD CONSTRAINT `fk_pro_manu` FOREIGN KEY (`man_id`) REFERENCES `manufacturer` (`id`),
  ADD CONSTRAINT `lk_product_manufacturer` FOREIGN KEY (`man_id`) REFERENCES `manufacturer` (`id`);

--
-- Các ràng buộc cho bảng `product_comment`
--
ALTER TABLE `product_comment`
  ADD CONSTRAINT `lk_productcoment_product` FOREIGN KEY (`PRODUCT_ID`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `lk_productcoment_user` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `product_comment_reply`
--
ALTER TABLE `product_comment_reply`
  ADD CONSTRAINT `lk_productreply_productcommnet` FOREIGN KEY (`cmt_id`) REFERENCES `product_comment` (`PR_COMMENT_ID`),
  ADD CONSTRAINT `lk_productreply_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `lk_user_userrole` FOREIGN KEY (`ROLE_ID`) REFERENCES `user_role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `lk_wishlist_user` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `wishlist_item`
--
ALTER TABLE `wishlist_item`
  ADD CONSTRAINT `lk_wishlistitem_product` FOREIGN KEY (`PRODUCT_ID`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lk_wishlistitem_wishlist` FOREIGN KEY (`WISHLIST_ID`) REFERENCES `wishlist` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

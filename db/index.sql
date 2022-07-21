-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 21, 2022 lúc 04:18 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

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
  `manu_id` int(2) NOT NULL,
  `manu_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufacturer`
--

INSERT INTO `manufacturer` (`manu_id`, `manu_name`) VALUES
(1, 'SONY'),
(2, 'NITENDO');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_parent_id` int(20) NOT NULL,
  `order_id` int(10) DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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

INSERT INTO `orders` (`order_parent_id`, `order_id`, `user_id`, `user_name`, `address`, `create_date`, `phone`, `order_stt_id`, `shipping_method_id`, `payment_method_id`, `total_amount`, `email`) VALUES
(1, 1, 1, 'Quang', 'HaNoi', '0000-00-00 00:00:00', '45345345', 1, 1, 1, 5000, 'abc@gmail.com'),
(3, 2, 2, 'HAI', 'HaNoi', '0000-00-00 00:00:00', '45345345', 2, 2, 2, 4000, 'abc@gmail.com'),
(7, 3, 3, 'Hiep', 'HaNoi', '0000-00-00 00:00:00', '45345345', 2, 2, 2, 3000, 'abc@gmail.com'),
(11, 4, 1, '', '', '2022-07-21 03:01:10', '', 1, 1, 1, 0, NULL),
(13, 5, 3, 'Hiep', '', '2022-07-21 03:25:20', '', 1, 1, 2, 0, NULL),
(14, 6, 3, 'Hiep', '', '2022-07-21 03:28:34', '', 1, 1, 2, 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(20) NOT NULL,
  `order_parent_id` int(20) NOT NULL,
  `product_id` int(10) NOT NULL,
  `unit_price` int(10) NOT NULL,
  `quantity` int(5) NOT NULL,
  `total` int(10) NOT NULL,
  `warranty_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_parent_id`, `product_id`, `unit_price`, `quantity`, `total`, `warranty_time`) VALUES
(1, 1, 4, 20, 20, 400, '0000-00-00 00:00:00'),
(2, 1, 4, 20, 30, 600, '0000-00-00 00:00:00'),
(6, 3, 7, 10, 30, 300, '0000-00-00 00:00:00'),
(7, 7, 7, 10, 30, 300, '0000-00-00 00:00:00'),
(8, 7, 7, 50, 30, 1500, '0000-00-00 00:00:00'),
(9, 3, 7, 50, 30, 1500, '0000-00-00 00:00:00'),
(11, 14, 7, 50, 30, 1500, '0000-00-00 00:00:00'),
(12, 14, 7, 5, 3, 15, '0000-00-00 00:00:00'),
(13, 14, 7, 5, 3, 15, '2022-07-21 03:49:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_status`
--

CREATE TABLE `order_status` (
  `order_stt_id` int(20) NOT NULL,
  `order_stt_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_status`
--

INSERT INTO `order_status` (`order_stt_id`, `order_stt_name`) VALUES
(1, 'Da TT'),
(2, 'Chua TT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment_method`
--

CREATE TABLE `payment_method` (
  `payment_method_id` int(1) NOT NULL,
  `method_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payment_method`
--

INSERT INTO `payment_method` (`payment_method_id`, `method_name`) VALUES
(1, 'Online'),
(2, 'Giao Tai Nha');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `post_id` int(10) NOT NULL,
  `post_body` longtext COLLATE utf8_unicode_ci NOT NULL,
  `post_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `posted_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_desc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) NOT NULL,
  `pst_cate_id` int(10) NOT NULL,
  `post_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_category`
--

CREATE TABLE `post_category` (
  `pst_cate_id` int(10) NOT NULL,
  `pst_cate_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_comment`
--

CREATE TABLE `post_comment` (
  `pst_comment_id` int(10) NOT NULL,
  `pst_comment_content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `posted_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cate_id` int(2) NOT NULL,
  `product_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `discount` float NOT NULL,
  `stock` int(5) NOT NULL,
  `warranty_time` int(1) NOT NULL,
  `manu_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `cate_id`, `product_img`, `price`, `description`, `discount`, `stock`, `warranty_time`, `manu_id`) VALUES
(1, 'Play Station 1', 1, 'img1', '500', 'ngon', 20, 5, 2, 2),
(4, 'Play Station 3', 3, 'img1', '500', 'ngon', 30, 5, 2, 1),
(5, 'Play Station 3', 3, 'img1', '500', 'ngon', 50, 5, 2, 1),
(6, 'Play Station 3', 3, 'img1', '500', 'ngon', 70, 5, 2, 1),
(7, 'Play Station 4', 3, 'img1', '500', 'ngon', 0, 5, 2, 1),
(8, '4', 3, 'img1', '500', 'ngon', 0, 5, 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_category`
--

CREATE TABLE `product_category` (
  `cate_id` int(2) NOT NULL,
  `cate_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cate_image` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_category`
--

INSERT INTO `product_category` (`cate_id`, `cate_name`, `cate_image`) VALUES
(1, 'Máy chơi game', 'img'),
(2, 'Tau Cầm Chơi Game', 'image1.png'),
(3, 'Phụ Kiện', 'image2.png'),
(4, 'Thẻ PSN', 'image3.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_comment`
--

CREATE TABLE `product_comment` (
  `pr_comment_id` int(10) NOT NULL,
  `user_id` int(20) NOT NULL,
  `product_id` int(10) NOT NULL,
  `cmt_content` int(11) NOT NULL,
  `coment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_comment_reply`
--

CREATE TABLE `product_comment_reply` (
  `pr_reply_id` int(10) NOT NULL,
  `user_id` int(20) NOT NULL,
  `pr_reply_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pr_reply_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `pr_comment_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_feedback`
--

CREATE TABLE `product_feedback` (
  `feedback_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `user_id` int(20) NOT NULL,
  `pr_review_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_feedback`
--

INSERT INTO `product_feedback` (`feedback_id`, `product_id`, `user_id`, `pr_review_id`) VALUES
(0, 1, 1, 1),
(0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_review`
--

CREATE TABLE `product_review` (
  `pr_review_id` int(10) NOT NULL,
  `pr_review_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_review`
--

INSERT INTO `product_review` (`pr_review_id`, `pr_review_name`) VALUES
(1, 'San pham tot'),
(2, 'San pham khong tot');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `services`
--

CREATE TABLE `services` (
  `service_id` int(10) NOT NULL,
  `service_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `service_cost` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping_method`
--

CREATE TABLE `shipping_method` (
  `shipping_method_id` int(1) NOT NULL,
  `method_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_cost` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shipping_method`
--

INSERT INTO `shipping_method` (`shipping_method_id`, `method_name`, `shipping_cost`) VALUES
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
  `user_id` int(20) NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(2) NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `role_id`, `avatar`, `email`, `phone`, `address`) VALUES
(1, 'Quang', '123456', 5, 'img4.png', 'quang@gmail.com', '0898898989', 'HaNoi'),
(2, 'Hai', '738373', 6, 'img6.png', 'hai@gmail.com', '053453453', 'HaiPhong'),
(3, 'Hiep', '353555345', 2, 'img8.png', 'hiep@gmail.com', '5345345345', 'Nam Dinh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(2) NOT NULL,
  `role_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_name`) VALUES
(2, 'user'),
(4, 'user'),
(5, 'admin'),
(6, 'user1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist_item`
--

CREATE TABLE `wishlist_item` (
  `wishlist_item_id` int(10) NOT NULL,
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
  ADD PRIMARY KEY (`manu_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_parent_id`),
  ADD UNIQUE KEY `ORDER_ID` (`order_id`),
  ADD KEY `lk_order_orderstt` (`order_stt_id`),
  ADD KEY `lk_order_payment` (`payment_method_id`),
  ADD KEY `lk_order_shipping` (`shipping_method_id`),
  ADD KEY `lk_order_user` (`user_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `lk_orderitem_product` (`product_id`),
  ADD KEY `lk_orderitem_order` (`order_parent_id`);

--
-- Chỉ mục cho bảng `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`order_stt_id`);

--
-- Chỉ mục cho bảng `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`payment_method_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `lk_post_postcategory` (`pst_cate_id`),
  ADD KEY `lk_post_user` (`user_id`);

--
-- Chỉ mục cho bảng `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`pst_cate_id`);

--
-- Chỉ mục cho bảng `post_comment`
--
ALTER TABLE `post_comment`
  ADD PRIMARY KEY (`pst_comment_id`),
  ADD KEY `lk_postcomment_user` (`user_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_pro_cate` (`cate_id`),
  ADD KEY `lk_product_manufacturer` (`manu_id`);

--
-- Chỉ mục cho bảng `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `product_comment`
--
ALTER TABLE `product_comment`
  ADD PRIMARY KEY (`pr_comment_id`),
  ADD KEY `lk_productcoment_product` (`product_id`),
  ADD KEY `lk_productcoment_user` (`user_id`);

--
-- Chỉ mục cho bảng `product_comment_reply`
--
ALTER TABLE `product_comment_reply`
  ADD PRIMARY KEY (`pr_reply_id`),
  ADD KEY `lk_productreply_productcommnet` (`pr_comment_id`),
  ADD KEY `lk_productreply_user` (`user_id`);

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
  ADD PRIMARY KEY (`pr_review_id`);

--
-- Chỉ mục cho bảng `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Chỉ mục cho bảng `shipping_method`
--
ALTER TABLE `shipping_method`
  ADD PRIMARY KEY (`shipping_method_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `lk_user_userrole` (`role_id`);

--
-- Chỉ mục cho bảng `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `lk_wishlist_user` (`user_id`);

--
-- Chỉ mục cho bảng `wishlist_item`
--
ALTER TABLE `wishlist_item`
  ADD PRIMARY KEY (`wishlist_item_id`),
  ADD KEY `lk_wishlistitem_product` (`product_id`),
  ADD KEY `lk_wishlistitem_wishlist` (`wishlist_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `manu_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_parent_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `order_status`
--
ALTER TABLE `order_status`
  MODIFY `order_stt_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `payment_method_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post_category`
--
ALTER TABLE `post_category`
  MODIFY `pst_cate_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post_comment`
--
ALTER TABLE `post_comment`
  MODIFY `pst_comment_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `product_category`
--
ALTER TABLE `product_category`
  MODIFY `cate_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `product_comment`
--
ALTER TABLE `product_comment`
  MODIFY `pr_comment_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_comment_reply`
--
ALTER TABLE `product_comment_reply`
  MODIFY `pr_reply_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_review`
--
ALTER TABLE `product_review`
  MODIFY `pr_review_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `shipping_method`
--
ALTER TABLE `shipping_method`
  MODIFY `shipping_method_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wishlist_item`
--
ALTER TABLE `wishlist_item`
  MODIFY `wishlist_item_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `lk_order_orderstt` FOREIGN KEY (`order_stt_id`) REFERENCES `order_status` (`ORDER_STT_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lk_order_payment` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_method` (`PAYMENT_METHOD_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lk_order_shipping` FOREIGN KEY (`shipping_method_id`) REFERENCES `shipping_method` (`SHIPPING_METHOD_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lk_order_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`USER_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `lk_orderitem_order` FOREIGN KEY (`order_parent_id`) REFERENCES `orders` (`order_parent_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `lk_post_postcategory` FOREIGN KEY (`pst_cate_id`) REFERENCES `post_category` (`PST_CATE_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lk_post_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`USER_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `post_comment`
--
ALTER TABLE `post_comment`
  ADD CONSTRAINT `lk_postcomment_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`USER_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_pro_cate` FOREIGN KEY (`cate_id`) REFERENCES `product_category` (`CATE_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lk_product_manufacturer` FOREIGN KEY (`manu_id`) REFERENCES `manufacturer` (`MANU_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `product_comment`
--
ALTER TABLE `product_comment`
  ADD CONSTRAINT `lk_productcoment_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lk_productcoment_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`USER_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `product_comment_reply`
--
ALTER TABLE `product_comment_reply`
  ADD CONSTRAINT `lk_productreply_productcommnet` FOREIGN KEY (`pr_comment_id`) REFERENCES `product_comment` (`pr_comment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lk_productreply_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`USER_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `product_feedback`
--
ALTER TABLE `product_feedback`
  ADD CONSTRAINT `lk_feedback_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lk_feedback_productreview` FOREIGN KEY (`pr_review_id`) REFERENCES `product_review` (`PR_REVIEW_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lk_feedback_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`USER_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `lk_user_userrole` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`ROLE_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `lk_wishlist_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `wishlist_item`
--
ALTER TABLE `wishlist_item`
  ADD CONSTRAINT `lk_wishlistitem_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lk_wishlistitem_wishlist` FOREIGN KEY (`wishlist_id`) REFERENCES `wishlist` (`wishlist_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

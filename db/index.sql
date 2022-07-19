-- query tạo database
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 19, 2022 lúc 06:02 PM
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
  `MANU_ID` int(2) NOT NULL,
  `MANU_NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `ORDER_PARENT_ID` int(20) NOT NULL,
  `ORDER_ID` int(10) DEFAULT NULL,
  `USER_ID` int(10) NOT NULL,
  `USER_NAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ADDRESS` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CREATE_DATE` timestamp NOT NULL DEFAULT current_timestamp(),
  `PHONE` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ORDER_STT_ID` int(20) NOT NULL DEFAULT 1,
  `SHIPPING_METHOD_ID` int(1) NOT NULL,
  `PAYMENT_METHOD_ID` int(1) NOT NULL,
  `TOTAL_AMOUNT` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `ITEM_ID` int(20) NOT NULL,
  `ORDER_ID` int(20) NOT NULL,
  `PRODUCT_ID` int(10) NOT NULL,
  `UNIT_PRICE` int(10) NOT NULL,
  `QUANTITY` int(5) NOT NULL,
  `TOTAL` int(10) NOT NULL,
  `WARRANTY_TIME` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_status`
--

CREATE TABLE `order_status` (
  `ORDER_STT_ID` int(20) NOT NULL,
  `ORDER_STT_NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment_method`
--

CREATE TABLE `payment_method` (
  `PAYMENT_METHOD_ID` int(1) NOT NULL,
  `METHOD_NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `POST_ID` int(10) NOT NULL,
  `POST_BODY` longtext COLLATE utf8_unicode_ci NOT NULL,
  `POST_TITLE` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `POSTED_DATE` timestamp NOT NULL DEFAULT current_timestamp(),
  `POST_DESC` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `USER_ID` int(10) NOT NULL,
  `PST_CATE_ID` int(10) NOT NULL,
  `POST_IMG` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_category`
--

CREATE TABLE `post_category` (
  `PST_CATE_ID` int(10) NOT NULL,
  `PST_CATE_NAME` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_comment`
--

CREATE TABLE `post_comment` (
  `PST_COMMENT_ID` int(10) NOT NULL,
  `PST_COMMENT_CONTENT` longtext COLLATE utf8_unicode_ci NOT NULL,
  `POSTED_DATE` timestamp NOT NULL DEFAULT current_timestamp(),
  `USER_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `PRODUCT_ID` int(10) NOT NULL,
  `PRODUCT_NAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CATE_ID` int(2) NOT NULL,
  `PRODUCT_IMG` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PRICE` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DESCRIPTION` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `DISCOUNT` float NOT NULL,
  `STOCK` int(5) NOT NULL,
  `WARRANTY_TIME` int(1) NOT NULL,
  `MANU_ID` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_category`
--

CREATE TABLE `product_category` (
  `CATE_ID` int(2) NOT NULL,
  `CATE_NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CATE_IMAGE` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_comment`
--

CREATE TABLE `product_comment` (
  `PR_COMMENT_ID` int(10) NOT NULL,
  `USER_ID` int(20) NOT NULL,
  `PRODUCT_ID` int(10) NOT NULL,
  `CMT_CONTENT` int(11) NOT NULL,
  `COMMENT_DATE` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_comment_reply`
--

CREATE TABLE `product_comment_reply` (
  `PR_REPLY_ID` int(10) NOT NULL,
  `USER_ID` int(20) NOT NULL,
  `PR_REPLY_CONTENT` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PR_REPLY_DATE` timestamp NOT NULL DEFAULT current_timestamp(),
  `PR_COMMENT_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_feedback`
--

CREATE TABLE `product_feedback` (
  `FEEDBACK_ID` int(10) NOT NULL,
  `PRODUCT_ID` int(10) NOT NULL,
  `USER_ID` int(20) NOT NULL,
  `PR_REVIEW_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_review`
--

CREATE TABLE `product_review` (
  `PR_REVIEW_ID` int(10) NOT NULL,
  `PR_REVIEW_NAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `services`
--

CREATE TABLE `services` (
  `SERVICE_ID` int(10) NOT NULL,
  `SERVICE_NAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SERVICE_COST` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping_method`
--

CREATE TABLE `shipping_method` (
  `SHIPPING_METHOD_ID` int(1) NOT NULL,
  `METHOD_NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SHIPPING_COST` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `site_setting`
--

CREATE TABLE `site_setting` (
  `LOGO1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `LOGO2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `FACEBOOK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `HOTLINE` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `USER_ID` int(20) NOT NULL,
  `USER_NAME` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ROLE_ID` int(2) NOT NULL,
  `AVATAR` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PHONE` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ADDRESS` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_role`
--

CREATE TABLE `user_role` (
  `ROLE_ID` int(2) NOT NULL,
  `ROLE_NAME` enum('admin','user','','') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `WISHLIST_ID` int(10) NOT NULL,
  `USER_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist_item`
--

CREATE TABLE `wishlist_item` (
  `WISHLIST_ITEM_ID` int(10) NOT NULL,
  `WISHLIST_ID` int(10) NOT NULL,
  `PRODUCT_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`MANU_ID`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ORDER_PARENT_ID`),
  ADD UNIQUE KEY `ORDER_ID` (`ORDER_ID`),
  ADD KEY `lk_order_user` (`USER_ID`),
  ADD KEY `lk_order_orderstt` (`ORDER_STT_ID`),
  ADD KEY `lk_order_shipping` (`SHIPPING_METHOD_ID`),
  ADD KEY `lk_order_payment` (`PAYMENT_METHOD_ID`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`ITEM_ID`),
  ADD KEY `lk_orderitem_product` (`PRODUCT_ID`),
  ADD KEY `lk_orderitem_order` (`ORDER_ID`);

--
-- Chỉ mục cho bảng `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`ORDER_STT_ID`);

--
-- Chỉ mục cho bảng `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`PAYMENT_METHOD_ID`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`POST_ID`),
  ADD KEY `lk_post_user` (`USER_ID`),
  ADD KEY `lk_post_postcategory` (`PST_CATE_ID`);

--
-- Chỉ mục cho bảng `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`PST_CATE_ID`);

--
-- Chỉ mục cho bảng `post_comment`
--
ALTER TABLE `post_comment`
  ADD PRIMARY KEY (`PST_COMMENT_ID`),
  ADD KEY `lk_postcomment_user` (`USER_ID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PRODUCT_ID`),
  ADD KEY `lk_product_manufacturer` (`MANU_ID`);

--
-- Chỉ mục cho bảng `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`CATE_ID`);

--
-- Chỉ mục cho bảng `product_comment`
--
ALTER TABLE `product_comment`
  ADD PRIMARY KEY (`PR_COMMENT_ID`),
  ADD KEY `lk_productcoment_user` (`USER_ID`),
  ADD KEY `lk_productcoment_product` (`PRODUCT_ID`);

--
-- Chỉ mục cho bảng `product_comment_reply`
--
ALTER TABLE `product_comment_reply`
  ADD PRIMARY KEY (`PR_REPLY_ID`),
  ADD KEY `lk_productreply_user` (`USER_ID`),
  ADD KEY `lk_productreply_productcommnet` (`PR_COMMENT_ID`);

--
-- Chỉ mục cho bảng `product_feedback`
--
ALTER TABLE `product_feedback`
  ADD KEY `lk_feedback_product` (`PRODUCT_ID`),
  ADD KEY `lk_feedback_user` (`USER_ID`),
  ADD KEY `lk_feedback_productreview` (`PR_REVIEW_ID`);

--
-- Chỉ mục cho bảng `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`PR_REVIEW_ID`);

--
-- Chỉ mục cho bảng `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`SERVICE_ID`);

--
-- Chỉ mục cho bảng `shipping_method`
--
ALTER TABLE `shipping_method`
  ADD PRIMARY KEY (`SHIPPING_METHOD_ID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`),
  ADD KEY `lk_user_userrole` (`ROLE_ID`);

--
-- Chỉ mục cho bảng `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`ROLE_ID`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`WISHLIST_ID`),
  ADD KEY `lk_wishlist_user` (`USER_ID`);

--
-- Chỉ mục cho bảng `wishlist_item`
--
ALTER TABLE `wishlist_item`
  ADD PRIMARY KEY (`WISHLIST_ITEM_ID`),
  ADD KEY `lk_wishlistitem_wishlist` (`WISHLIST_ID`),
  ADD KEY `lk_wishlistitem_product` (`PRODUCT_ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `MANU_ID` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `ORDER_PARENT_ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `ITEM_ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_status`
--
ALTER TABLE `order_status`
  MODIFY `ORDER_STT_ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `PAYMENT_METHOD_ID` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `POST_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post_category`
--
ALTER TABLE `post_category`
  MODIFY `PST_CATE_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post_comment`
--
ALTER TABLE `post_comment`
  MODIFY `PST_COMMENT_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `PRODUCT_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_category`
--
ALTER TABLE `product_category`
  MODIFY `CATE_ID` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_comment`
--
ALTER TABLE `product_comment`
  MODIFY `PR_COMMENT_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_comment_reply`
--
ALTER TABLE `product_comment_reply`
  MODIFY `PR_REPLY_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_review`
--
ALTER TABLE `product_review`
  MODIFY `PR_REVIEW_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `services`
--
ALTER TABLE `services`
  MODIFY `SERVICE_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `shipping_method`
--
ALTER TABLE `shipping_method`
  MODIFY `SHIPPING_METHOD_ID` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `USER_ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user_role`
--
ALTER TABLE `user_role`
  MODIFY `ROLE_ID` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `WISHLIST_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wishlist_item`
--
ALTER TABLE `wishlist_item`
  MODIFY `WISHLIST_ITEM_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `lk_order_orderstt` FOREIGN KEY (`ORDER_STT_ID`) REFERENCES `order_status` (`ORDER_STT_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lk_order_payment` FOREIGN KEY (`PAYMENT_METHOD_ID`) REFERENCES `payment_method` (`PAYMENT_METHOD_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lk_order_shipping` FOREIGN KEY (`SHIPPING_METHOD_ID`) REFERENCES `shipping_method` (`SHIPPING_METHOD_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lk_order_user` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`USER_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `lk_orderitem_order` FOREIGN KEY (`ORDER_ID`) REFERENCES `orders` (`ORDER_PARENT_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lk_orderitem_product` FOREIGN KEY (`PRODUCT_ID`) REFERENCES `product` (`PRODUCT_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `lk_post_postcategory` FOREIGN KEY (`PST_CATE_ID`) REFERENCES `post_category` (`PST_CATE_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lk_post_user` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`USER_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `post_comment`
--
ALTER TABLE `post_comment`
  ADD CONSTRAINT `lk_postcomment_user` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`USER_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `lk_product_manufacturer` FOREIGN KEY (`MANU_ID`) REFERENCES `manufacturer` (`MANU_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `product_comment`
--
ALTER TABLE `product_comment`
  ADD CONSTRAINT `lk_productcoment_product` FOREIGN KEY (`PRODUCT_ID`) REFERENCES `product` (`PRODUCT_ID`),
  ADD CONSTRAINT `lk_productcoment_user` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`USER_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `product_comment_reply`
--
ALTER TABLE `product_comment_reply`
  ADD CONSTRAINT `lk_productreply_productcommnet` FOREIGN KEY (`PR_COMMENT_ID`) REFERENCES `product_comment` (`PR_COMMENT_ID`),
  ADD CONSTRAINT `lk_productreply_user` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`USER_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `product_feedback`
--
ALTER TABLE `product_feedback`
  ADD CONSTRAINT `lk_feedback_product` FOREIGN KEY (`PRODUCT_ID`) REFERENCES `product` (`PRODUCT_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lk_feedback_productreview` FOREIGN KEY (`PR_REVIEW_ID`) REFERENCES `product_review` (`PR_REVIEW_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lk_feedback_user` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`USER_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `lk_user_userrole` FOREIGN KEY (`ROLE_ID`) REFERENCES `user_role` (`ROLE_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `lk_wishlist_user` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`USER_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `wishlist_item`
--
ALTER TABLE `wishlist_item`
  ADD CONSTRAINT `lk_wishlistitem_product` FOREIGN KEY (`PRODUCT_ID`) REFERENCES `product` (`PRODUCT_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lk_wishlistitem_wishlist` FOREIGN KEY (`WISHLIST_ID`) REFERENCES `wishlist` (`WISHLIST_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- query tạo tất cả các bảng
<?php
// lấy ra lượt mua của 1 sản phẩm
function get_bought_counter($product_id)
{
	$sql = "SELECT  COUNT(order_items.product_id) AS bought_counter FROM order_items 
        WHERE order_items.product_id = {$product_id}";
	return select_one_value($sql);
}

// lấy ra tất cả đơn hàng
function get_all_orders()
{
	$sql = "SELECT orders.*, order_status.id AS stt_id,order_status.stt_name AS stt_name, order_status.stt_icon, payment_method.name AS payment_method FROM orders 
            INNER JOIN order_status ON orders.order_stt_id =  order_status.id
            INNER JOIN payment_method ON payment_method.id = orders.payment_method_id";
	return select_all_records($sql);
}
// lấy ra tất cả trạng thái đơn hàng
function get_all_order_stt()
{
	$sql = "SELECT * FROM order_status";
	return select_all_records($sql);
}
// lấy tất cả đơn hàng chi tiết của 1 đơn hàng
// lấy ra tất cả orders của 1 user
// lấy ra các sản phẩm đã đặt mua trong đơn hàng
function get_order_details($order_id)
{
	$sql = "SELECT order_items.product_id ,
		orders.user_name,
		orders.shipping_address,
		orders.email,
        orders.order_key_id,
		product.prod_name AS product_name,
		product.image ,
		shipping_method.name AS shipping_method,
		payment_method.name AS payment_method,
		order_items.unit_price,
		order_items.quantity ,
		order_items.total,
		SUM(order_items.unit_price) AS temp_amount,
        orders.total_amount,
        DATE(orders.create_date) AS create_date,
		(orders.total_amount - SUM(order_items.unit_price)) AS shipping_cost,
         orders.order_notice,
         order_status.id AS order_stt_id,
         order_status.stt_name,
         order_status.stt_icon,
        DATE(order_items.warranty_time) AS warranty_expired_date
		FROM orders
		INNER JOIN order_items ON orders.id = order_items.id
		INNER JOIN product ON order_items.product_id = product.id
		INNER JOIN shipping_method ON orders.shipping_method_id= shipping_method.id
		INNER JOIN payment_method ON orders.payment_method_id = payment_method.id
		INNER JOIN order_status ON orders.order_stt_id = order_status.id
		WHERE orders.id = {$order_id}";
	return select_all_records($sql);
}

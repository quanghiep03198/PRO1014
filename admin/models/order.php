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
// lấy ra 1 đơn hàng theo từ khóa
function get_order_by_kw($kw)
{
	$sql = "SELECT orders.*, order_status.id AS stt_id,order_status.stt_name AS stt_name, order_status.stt_icon, payment_method.name AS payment_method FROM orders 
			INNER JOIN order_status ON orders.order_stt_id =  order_status.id
			INNER JOIN payment_method ON payment_method.id = orders.payment_method_id WHERE order_key_id = '{$kw}'";
	return select_single_record($sql);
}
// lấy ra tất cả trạng thái đơn hàng
function get_all_order_stt()
{
	$sql = "SELECT * FROM order_status";
	return select_all_records($sql);
}


// lấy ra các sản phẩm đã đặt mua trong đơn hàng
function get_all_order_items($order_id)
{
	$sql = "SELECT product.prod_name,
		product.image,
		order_items.unit_price,
        order_items.quantity,
        order_items.total,
		order_items.warranty_time AS warranty_expired_date
        FROM order_items
        JOIN product ON order_items.product_id = product.id
        JOIN orders ON order_items.order_id = orders.id
        WHERE order_items.order_id = {$order_id};";
	return select_all_records($sql);
}
// lấy ra thông tin của 1 đơn hàng
function get_order_details($order_id)
{
	$sql = "SELECT 	orders.order_key_id,
					orders.create_date,
					orders.user_name,
					orders.email,
					orders.shipping_address ,
					orders.order_notice,
					orders.total_amount,
					orders.order_stt_id,
					shipping_method.cost,
					total_amount - shipping_method.cost AS temp_amount,
					shipping_method.name AS shipping_method,
					payment_method.name AS payment_method,
					order_status.stt_name ,
					order_status.stt_icon
			FROM orders
			INNER JOIN order_status ON orders.order_stt_id = order_status.id
			INNER JOIN payment_method ON orders.payment_method_id = payment_method.id 
			INNER JOIN shipping_method ON orders.shipping_method_id = shipping_method.id 
			WHERE orders.id = {$order_id}";
	return select_single_record($sql);
}

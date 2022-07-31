
<?php
// lấy ra tất cả hình thức giao hàng
function get_all_shipping_methods()
{
    $sql = "SELECT * FROM shipping_method";
    return select_all_records($sql);
}
// lấy ra tất cả hình thức thanh toán
function get_all_payment_method()
{
    $sql = "SELECT * FROM payment_method";
    return select_all_records($sql);
}
// lấy ra tất cả orders của 1 user
function get_orders_group_by_user($user_id)
{
    $sql = "SELECT orders.id AS id,
        orders.order_key_id AS order_key_id,
        orders.create_date,
        shipping_address,
        phone,
        email,
        orders.order_stt_id AS stt_id,
        order_status.stt_name AS stt_name,
        order_status.stt_icon AS stt_icon,
        payment_method.name AS payment_method,
        orders.total_amount,
        order.notice
        FROM orders 
        INNER JOIN order_items ON orders.id = order_items.order_id
        INNER JOIN order_status ON orders.order_stt_id = order_status.id
        INNER JOIN payment_method ON orders.payment_method_id = payment_method.id
        WHERE user_id = {$user_id}";
    return select_all_records($sql);
}
// lấy ra 1 đơn hàng của 1 user
function get_one_order_by_user($user_id, $order_id)
{
    $sql = "SELECT orders.shipping_address ,
            shipping_method.name AS shipping_method,
            payment_method.name AS payment_method,
            order_status.stt_name AS order_status
            FROM orders
            INNER JOIN order_status ON orders.order_stt_id = order_status.id
            INNER JOIN payment_method ON orders.payment_method_id = payment_method.id 
            INNER JOIN shipping_method ON orders.shipping_method_id = shipping_method.id 
            WHERE orders.id = {$order_id} AND orders.user_id= {$user_id}";
    return select_single_record($sql);
}

// lấy ra trạng thái đơn hàng
function get_all_order_stt()
{
    $sql = "SELECT * FROM order_status";
    return select_all_records($sql);
}
// lấy ra các sản phẩm đã đặt mua trong đơn hàng
function get_all_order_items($order_id)
{
    $sql = "SELECT order_items.product_id ,
		product.prod_name AS product_name,
		product.image,
		order_items.unit_price,
		order_items.quantity ,
		order_items.total,
		SUM(order_items.unit_price) AS temp_amount,
        orders.total_amount,
		(orders.total_amount -SUM(order_items.unit_price)) AS shipping_cost,
         orders.order_notice,
        DATE(order_items.warranty_time)
		FROM order_items
		INNER JOIN orders ON orders.id = order_items.id
		INNER JOIN product ON order_items.product_id = product.id
		WHERE order_items.order_id = {$order_id}";
    return select_all_records($sql);
}

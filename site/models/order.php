
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


// lấy ra trạng thái đơn hàng
function get_all_order_stt()
{
    $sql = "SELECT * FROM order_status";
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
        orders.total_amount
        FROM orders 
        INNER JOIN order_items ON orders.id = order_items.order_id
        INNER JOIN order_status ON orders.order_stt_id = order_status.id
        INNER JOIN payment_method ON orders.payment_method_id = payment_method.id
        WHERE user_id = {$user_id}";
    return select_all_records($sql);
}


// lấy ra các sản phẩm đã đặt mua trong đơn hàng
function get_all_order_items($order_id)
{
    $sql = "SELECT order_items.id,
                    product.prod_name,
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
					order_status.stt_name AS order_status
			FROM orders
			INNER JOIN order_status ON orders.order_stt_id = order_status.id
			INNER JOIN payment_method ON orders.payment_method_id = payment_method.id 
			INNER JOIN shipping_method ON orders.shipping_method_id = shipping_method.id 
			WHERE orders.id = {$order_id}";
    return select_single_record($sql);
}


// lấy thông tin bảo hành của 1 đơn hàng
function get_warranty_expired_date($customer_infor, $order_key_id)
{
    $sql = "SELECT	product.prod_name,
		            product.image,
                    order_items.unit_price,
                    DATE(orders.create_date) AS create_date,
		            DATE(order_items.warranty_time) AS warranty_expire_date
            FROM order_items
            INNER JOIN product ON product.id = order_items.product_id
            INNER JOIN orders ON orders.id = order_items.order_id
            WHERE orders.order_key_id = '{$order_key_id}' AND orders.email = '{$customer_infor}'";
    return select_all_records($sql);
}


// lấy tất cả đầu mục feedback sản phẩm
function get_reviews_label()
{
    $sql = "SELECT * FROM  product_review";
    return select_all_records($sql);
}


// lấy số lượt đánh giá sản phẩm
function get_feedback_counter($id)
{
    $sql = "SELECT COUNT(product_feedback.id) FROM product_feedback
            INNER JOIN order_items ON product_feedback.order_item_id = order_items.id
            WHERE order_items.product_id = {$id}";
    return select_one_value($sql);
}


// lấy tất cả feedback 
function get_feedback_by_order_item($order_item_id)
{
    $sql = "SELECT * FROM product_feedback WHERE order_item_id = {$order_item_id}";
    return select_single_record($sql);
}


// lấy ra review được nhiều người chọn nhất
function get_most_feedback($product_id)
{
    $sql = "SELECT product_feedback.pr_review_id FROM order_items
            INNER JOIN product_feedback ON order_items.id = product_feedback.order_item_id
            WHERE order_items.product_id = {$product_id}
            GROUP BY product_feedback.pr_review_id
            ORDER BY COUNT(product_feedback.pr_review_id) DESC
            LIMIT 0,1";
    return select_one_value($sql);
}

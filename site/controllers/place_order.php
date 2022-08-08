<?php
include "../../lib/send_mail.php";
include "../../lib/db_execute.php";

include "../../PHPMailer/src/PHPMailer.php";
include "../../PHPMailer/src/SMTP.php";
include "../../PHPMailer/src/Exception.php";

$json = file_get_contents("php://input");
$order = json_decode($json, true);
extract($order);
print_r($order);
$cart_items = json_decode($cart_items, true);
// tính phí ship
$shipping_cost = select_one_value("SELECT cost FROM shipping_method WHERE id = {$shipping_method}");
// tính tổng tiền thanh toán
$tmp_amount = array_reduce($cart_items, function ($first_val, $cur_val) {
    return $first_val + $cur_val['total'];
}, 0);
$user_id = isset($_COOKIE['auth']) ? $_COOKIE['auth'] : null;
$total_amount = $tmp_amount + $shipping_cost; // tính tổng tiền thanh toán  = tổng tiền hàng + phí ship
$payment = 1; // phương thức thanh toán = 1 <-> thanh toán khi nhận hàng
$order_key_id = substr(md5(rand(0, 9999)), 0, 8); // tạo mã đơn hàng ngẫu nhiên
$lastID = execute_query("INSERT INTO orders( order_key_id,
                                            user_id,
                                            user_name,
                                            shipping_address,
                                            email,
                                            phone,
                                            create_date,
                                            shipping_method_id,
                                            payment_method_id,
                                            total_amount,
                                            order_notice)
                        VALUES( '{$order_key_id}',
                                {$user_id},
                                '{$customer_name}',
                                '{$address}',
                                '{$email}',
                                '{$phone}',
                                DATE(NOW()),
                                {$shipping_method},
                                {$payment},
                                {$total_amount},
                                '{$order_notice}')");
foreach ($cart_items as $items) {
    extract($items);
    execute_query("INSERT INTO order_items (order_id,
                                            product_id,
                                            unit_price,
                                            quantity,
                                            total,
                                            warranty_time)
                    VALUES ({$lastID},
                            {$id} ,
                            {$price} ,
                            {$qty} ,
                            {$total} ,
                            DATE_ADD(DATE(NOW()),INTERVAL {$warranty} MONTH))");

    execute_query("UPDATE product SET stock = (stock - {$qty}) WHERE product.id = {$id}");
}
$subject = "Chúc mừng bạn đã đặt hàng thành công!";
$body = "Mã đơn hàng của bạn là: <b>$order_key_id</b>";
send_verify_code($email, $subject, $body);

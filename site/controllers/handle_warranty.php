<?php
include_once "../../lib/db_execute.php";
include_once "../../site/models/order.php";

$json = file_get_contents("php://input");
$data = json_decode($json, true);
extract($data);

// check thông tin người dùng gửi đến

$error = [];
$is_invalid_email = select_one_value("SELECT email FROM orders WHERE email = '{$email}'") == null;
$is_invalid_order_key = select_one_value("SELECT order_key_id FROM orders WHERE order_key_id = '{$order_key_id}'") == null;

if ($is_invalid_email)
    $error['invalid_email'] = "Email không tồn tại!";
if ($is_invalid_order_key)
    $error['invalid_order_key'] = "Mã đơn hàng không tồn tại!";

if (empty($error))
    echo json_encode(get_warranty_expired_date($email, $order_key_id));
else
    echo json_encode($error);

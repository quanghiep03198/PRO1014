<?php
include_once "./lib/send_mail.php";

if (isset($_POST['checkout']) && !empty($_COOKIE['cart'])) {
    $cartList = json_decode($_COOKIE['cart']);
    // tính phí ship
    $shipping = $_POST['shipping_method'];
    $shipping_cost = select_one_value("SELECT cost FROM shipping_method WHERE id = {$shipping}");
    // tính tổng tiền thanh toán
    $tmp_amount = array_reduce($cartList, function ($first_val, $cur_val) {
        return $first_val + $cur_val->total;
    }, 0);
    $total_amount = $tmp_amount + $shipping_cost; // tính tổng tiền thanh toán  = tổng tiền hàng + phí ship
    // lấy thông tin người dùng 
    $userId = isset($_COOKIE['auth']) ? $_COOKIE['auth'] : 0;
    $customer_name = $_POST['customer_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $payment = 1; // phương thức thanh toán = 1 <-> thanh toán khi nhận hàng
    $order_key_id = substr(md5(rand(0, 9999)), 0, 8); // tạo mã đơn hàng ngẫu nhiên
    $order_notice = $_POST['order_notice'];

    // insert đơn hàng & sản phẩm vào đơn hàng
    $lastID = execute_query("INSERT INTO orders( order_key_id, user_id, user_name, shipping_address, email, phone, create_date, shipping_method_id, payment_method_id, total_amount,order_notice)
    VALUES( '{$order_key_id}', {$userId}, '{$customer_name}', '{$address}', '{$email}', '{$phone}', DATE(NOW()), {$shipping}, {$payment}, {$total_amount},'{$order_notice}')");
    foreach ($cartList as $item) {
        execute_query("INSERT INTO order_items (order_id , product_id , unit_price , quantity, total , warranty_time)
    VALUES ( {$lastID} , {$item->id} , {$item->price} , {$item->qty} , {$item->total} , DATE_ADD(DATE(NOW()),INTERVAL {$item->warranty} MONTH))");
        execute_query("UPDATE product SET stock = (stock - {$item->qty}) WHERE product.id = {$item->id}");
    }
    $subject = "Chúc mừng bạn đã đặt hàng thành công!";
    $body = "Mã đơn hàng của bạn là: <b>$order_key_id</b>";
    send_verify_code($email, $subject, $body);

    echo "<script>
            alert(`Cảm ơn bạn đã mua hàng, check email để nhận mã đơn hàng!`);
            window.location = '?page=product'
        </script>";
}

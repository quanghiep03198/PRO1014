<?php
if (isset($_POST['checkout']) && !empty($_COOKIE['cart'])) {
    $cartList = json_decode($_COOKIE['cart']);
    $customer_name = $_POST['customer_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $shipping = $_POST['shipping_method'];
    $payment = $_POST['payment_method'];
    $address = $_POST['address'];
    $total_amount = $_POST['total_amount'];
    $order_key_id = substr(md5(rand(0, 9999)), 0, 8); // tạo mã đơn hàng ngẫu nhiên

    if ($payment == 1) {
        $lastID = execute_query("INSERT INTO orders( order_key_id, user_id, user_name, shipping_address, email, phone, create_date, shipping_method_id, payment_method_id, total_amount)
                            VALUES( '{$order_key_id}', 0, '{$customer_name}', '{$address}', '{$email}', '{$phone}', CURRENT_DATE(), {$shipping}, {$payment}, {$total_amount})");

        foreach ($cartList as $item) {
            execute_query(
                "INSERT INTO order_items (order_id, product_id, unit_price, quantity, total, warranty_time)
                VALUES ({$lastID}, {$item->id}, {$item->price}, {$item->qty}, {$item->total}, DATE_ADD( CURRENT_DATE(),INTERVAL {$item->warranty} MONTH)  )"
            );
            execute_query("UPDATE product SET stock = (stock - {$item->qty}) WHERE product.id = {$item->id}");
        }
        echo "<script>alert(`Thank for buying our products!`);</script>";
    } else {
        echo '<script>
                alert(`Chức năng đang được cập nhật!`);
                history.go(-1);
            </script>';
    }
}

?>
<table>
    <tr>
        <th>Tên sản phẩm</th>
        <th>Đơn giá</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
    </tr>
    <?php foreach ($cartList as $item) : ?>
        <tr>
            <td><?= $item->name ?></td>
            <td><?= $item->price ?></td>
            <td><?= $item->qty ?></td>
            <td><?= $item->total ?></td>
        </tr>
    <?php endforeach; ?>
</table>
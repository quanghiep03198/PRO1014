
<?php
function get_all_shipping_methods()
{
    $sql = "SELECT * FROM shipping_method";
    return select_all_records($sql);
}
function get_all_payment_method()
{
    $sql = "SELECT * FROM payment_method";
    return select_all_records($sql);
}
function get_orders_group_by_user()
{
    $sql = "SELECT orders.id, orders.order_id AS order_id, orders.create_date, shipping_address, phone, email, order_status.name AS order_status, payment_method.name AS payment_method, orders.total_amount
        FROM orders 
        INNER JOIN order_items ON orders.parent_id = order_items.order_id
        INNER JOIN order_status ON orders.order_stt_id = order_status.id
        INNER JOIN payment_method ON order.payment_method_id = payment_method.id
        ";
    return select_all_records($sql);
}

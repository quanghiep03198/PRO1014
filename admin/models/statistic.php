<?php

function get_highest_turnover_groupby_month()
{
    $sql = "SELECT  SUM(total_amount) - SUM(shipping_method.cost) AS turn_over, DATE_FORMAT(orders.create_date,'%M') AS month
            FROM orders
            INNER JOIN shipping_method ON orders.shipping_method_id = shipping_method.id
            GROUP BY MONTH(orders.create_date)";
    return select_all_records($sql);
}
// lấy ra doanh số của sản phẩm trong tháng
function get_turnover_groupby_product($month)
{
    $sql = "SELECT product.image, product.prod_name, order_items.unit_price, SUM(order_items.quantity) AS sold, SUM(order_items.total) AS turnover
            FROM order_items
            INNER JOIN product ON product.id = order_items.product_id
            INNER JOIN orders ON orders.id = order_items.order_id
            WHERE MONTH(orders.create_date) = $month
            GROUP BY order_items.product_id";
    return select_all_records($sql);
}

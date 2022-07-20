<?php
include 'lib/db_execute.php';
// lấy tất cả sản phảm
function get_all_products()
{
    $sql = "SELECT * FROM product";
    $products = select_all_records($sql);
    return $products;
}

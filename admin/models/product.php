<?php
include '../lib/db_execute.php';
// lấy tất cả sản phảm
function get_all_products()
{
    $sql = "SELECT * FROM product";
    $products = select_all_records($sql);
    return $products;
}
// lấy ra 1 sản phẩm
function get_one_product()
{
    if (isset($_GET['id'])) :
        $sql = "SELECT * FROM product WHERE product_id = ";
        $product = select_single_record($sql);
        return $product;
    endif;
}

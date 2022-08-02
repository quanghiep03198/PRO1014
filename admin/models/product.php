<?php
// lấy ra tất cả danh muc sản phẩm
function get_all_categories()
{
    $sql = "SELECT * FROM  product_category";
    return select_all_records($sql);
}

// lấy ra tất cả nhà sản xuất
function get_all_manufacturer()
{
    $sql = "SELECT * FROM manufacturer";
    return select_all_records($sql);
}

// lấy ra tất cả sản phẩm
function get_all_products()
{
    $sql = "SELECT product.* FROM product";
    return select_all_records($sql);
}
// lấy ra 1 sản phẩm
function get_one_product($product_id)
{
    $sql = "SELECT product.* FROM product WHERE product.id = {$product_id}";
    return select_single_record($sql);
}

// lấy ra sản phẩm theo nhà sản xuất
function get_product_by_manu($man_id)
{
    $sql = "SELECT product.*,
            COUNT(order_items.id) AS bought_counter
            FROM product
            INNER JOIN manufacturer ON manufacturer.id = product.man_id
            INNER JOIN order_items ON product.id = order_items.product_id
            WHERE product.man_id = {$man_id}";
    return select_all_records($sql);
}

// lấy ra lượt mua của 1 sản phẩm
function get_bought_counter($product_id)
{
    $sql = "SELECT  COUNT(order_items.product_id) AS bought_counter FROM order_items 
        WHERE order_items.product_id = {$product_id}";
    return select_one_value($sql);
}

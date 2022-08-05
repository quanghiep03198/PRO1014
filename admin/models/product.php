<?php


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
            WHERE product.man_id = {$man_id}
            GROUP BY product.id;
            ";
    return select_all_records($sql);
}
// lấy sô lượng sản phẩm của mỗi danh mục
function get_product_qty_each_cate($cate_id)
{
    $sql = "SELECT COUNT(product.id) FROM product WHERE cate_id = {$cate_id} GROUP BY cate_id";
    return select_one_value($sql);
}

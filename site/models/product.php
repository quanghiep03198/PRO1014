<?php
// lấy ra tất cả sản phẩm
function get_all_products()
{
    $sort = isset($_GET['sort']) ? $_GET['sort'] : '';
    $sql = "SELECT * FROM product ORDER BY price {$sort}";
    return select_all_records($sql);
}



// lấy ra các sản phẩm mới nhập
function get_new_products()
{

    $sql = "SELECT product.*,manufacturer.name as manufacture FROM product
    INNER JOIN manufacturer ON product.man_id = manufacturer.id ORDER BY product.id DESC
    LIMIT 0,10";
    return     select_all_records($sql);
}
// lấy sản phẩm theo danh mục
function get_products_by_cate($cate, $manu)
{
    $sort = isset($_GET['sort']) ? $_GET['sort'] : '';
    $sql = "SELECT product.id, product.prod_name,product.price,product.image,product.discount,product.warranty_time FROM product
            WHERE product.cate_id = {$cate} AND product.man_id = {$manu}
            ORDER BY product.price {$sort}";
    return select_all_records($sql);
}
// lấy chi tiết 1 sản phẩm
function get_one_product($id)
{
    if (isset($id)) :
        $sql = "SELECT * FROM product WHERE id={$id}";
        return select_single_record($sql);
    endif;
}
// lấy số lượt đánh giá sản phẩm
function get_feedback_counter($id)
{
    $sql = "SELECT COUNT(id) FROM product_feedback WHERE product_id = $id";
    return select_one_value($sql);
}
// tìm sản phẩm theo keyword
function get_products_by_kw($kw)
{
    $sql = "SELECT * FROM product 
            INNER JOIN product_category ON product.cate_id = product.cate_id
            INNER JOIN manufacturer ON product.manu_id = manufacturer.manu_id
            WHERE product.product_name LIKE '%{$kw}%' OR 
            product_category.cate_name LIKE '%{$kw}%' OR 
            manufacturer.manu_name LIKE '%{$kw}%'";
    return select_all_records($sql);
}
// lọc sản phẩm theo giá
function get_products_by_price($sort)
{
}
// lấy ra sản phẩm được giảm giá
function get_discount_products()
{
    $sql = "SELECT * FROM product WHERE discount>0";
    return select_all_records($sql);
}
// lấy ra sản phẩm được mua nhiều
function get_best_seller_products()
{
    $sql = "SELECT product.id, product.prod_name, product.price,product.image,product.discount,
            COUNT(order_items.product_id) AS bought_counter FROM product
            INNER JOIN order_items ON product.id = order_items.product_id
            GROUP BY product_id
            ORDER BY bought_counter DESC 
            LIMIT 0,10";
    return select_all_records($sql);
}

<?php
// lấy ra tất cả sản phẩm
function get_all_products()
{
    $sort = isset($_GET['sort']) ? $_GET['sort'] : '';
    $sql = "SELECT product.* ,manufacturer.name AS man_name FROM product 
            INNER JOIN manufacturer 
            ON product.man_id = manufacturer.id ORDER BY price {$sort}";
    return select_all_records($sql);
}


// lấy ra các sản phẩm mới nhập
function get_new_products()
{
    $sql = "SELECT product.*,manufacturer.name as man_name FROM product
    INNER JOIN manufacturer ON product.man_id = manufacturer.id ORDER BY product.id DESC
    LIMIT 0,10";
    return     select_all_records($sql);
}
// lấy sản phẩm theo danh mục
function get_products_by_cate()
{
    $args_list = func_get_args();
    $sort = isset($_GET['sort']) ? $_GET['sort'] : '';
    $sql = "SELECT product.id, product.prod_name,product.price,product.image,product.discount,product.warranty_time,manufacturer.name as man_name FROM product
            INNER JOIN manufacturer ON product.man_id = manufacturer.id
            WHERE product.cate_id = {$args_list[0]} AND product.man_id = {$args_list[1]}
            ORDER BY product.price {$sort}";
    return select_all_records($sql);
}
function get_related_product()
{
    $args_list = func_get_args();
    $sql = "SELECT product.*, manufacturer.name AS man_name FROM product
            INNER JOIN manufacturer ON product.man_id = manufacturer.id
            WHERE product.cate_id = {$args_list[0]}
            GROUP BY product.id
            ";
    return select_all_records($sql);
}
// lấy chi tiết 1 sản phẩm
function get_one_product($id)
{
    if (isset($id)) :
        $sql = "SELECT product.*, manufacturer.name AS man_name FROM product 
        INNER JOIN manufacturer ON product.man_id = manufacturer.id WHERE product.id={$id}";
        return select_single_record($sql);
    endif;
}


// lấy số lượt đánh giá sản phẩm
#region
function get_feedback_counter($id)
{
    $sql = "SELECT COUNT(id) FROM product_feedback WHERE product_id = $id";
    return select_one_value($sql);
}
#endregion


// tìm sản phẩm theo keyword
function get_products_by_kw($kw)
{
    $sort = isset($_GET['sort']) ? $_GET['sort'] : '';
    $sql = "SELECT product.* FROM product 
            INNER JOIN product_category ON product.cate_id = product.cate_id
            INNER JOIN manufacturer ON product.man_id = manufacturer.id
            WHERE product.prod_name LIKE '%{$kw}%' OR 
            product_category.name LIKE '%{$kw}%' OR 
            manufacturer.name LIKE '%{$kw}%'
            GROUP BY product.id
            ORDER BY product.price {$sort}";
    return select_all_records($sql);
}

// lấy ra sản phẩm được giảm giá

function get_discount_products()
{
    $sql = "SELECT product.*,manufacturer.name AS man_name FROM product
    INNER JOIN manufacturer ON product.man_id = manufacturer.id
    WHERE discount>0";
    return select_all_records($sql);
}



// lấy ra sản phẩm được mua nhiều

function get_best_seller_products()
{
    $sql = "SELECT product.id, product.prod_name, product.price,product.image,product.discount,manufacturer.name AS man_name,
            COUNT(order_items.product_id) AS bought_counter FROM product
            INNER JOIN order_items ON product.id = order_items.product_id
            INNER JOIN manufacturer ON product.man_id = manufacturer.id
            GROUP BY order_items.product_id
            ORDER BY bought_counter DESC 
            LIMIT 0,10";
    return select_all_records($sql);
}



// lấy ra tên nhà sản xuất của 1 sản phẩm

function get_product_manufacturer($product_id)
{
    $sql = "SELECT manufacturer.name FROM product
        INNER JOIN manufacturer ON product.man_id = manufacturer.id
        WHERE product.id = {$product_id}";
    return select_one_value($sql);
}

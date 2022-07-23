<?php
function get_all_product()
{
    $sql = "SELECT * FROM product";
    return     select_all_records($sql);
}
function get_product_by_cate($cate, $manu)
{
    $sql = "SELECT product.id, product.prod_name,product.price,product.image FROM product
            WHERE product.cate_id = {$cate} AND product.man_id = {$manu}";
    return select_all_records($sql);
}
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
    $sql = "SELECT COUNT(feedback_id) FROM product_feedback WHERE product_id = $id";
    return select_one_value($sql);
}
// tìm sản phẩm theo keyword
function get_product_by_kw($kw)
{
    $sql = "SELECT * FROM product 
            INNER JOIN product_category ON product.cate_id = product.cate_id
            INNER JOIN manufacturer ON product.manu_id = manufacturer.manu_id
            WHERE product.product_name LIKE '%{$kw}%' OR 
            product_category.cate_name LIKE '%{$kw}%' OR 
            manufacturer.manu_name LIKE '%{$kw}%'";
    return select_all_records($sql);
}

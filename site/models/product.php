<?php
function get_all_product()
{
    $sql = "SELECT * FROM product";
    return     select_all_records($sql);
}
function get_product_by_cate($cate, $manu)
{
    $sql = "SELECT product.id, product.prod_name,product.price FROM product
            WHERE product.cate_id = {$cate} AND product.man_id = {$manu}";
    return select_all_records($sql);
}
function get_one_product($id)
{
    if (isset($id)) :
        $sql = "SELECT * FROM product WHERE {$id}";
        return select_single_record($sql);
    endif;
}
// lấy số lượt đánh giá sản phẩm
function get_feedback_counter($id)
{
    $sql = "SELECT COUNT(feedback_id) FROM product_feedback WHERE product_id = $id";
    return select_one_value($sql);
}

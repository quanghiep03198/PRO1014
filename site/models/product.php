<?php
function get_all_product()
{
    $sql = "SELECT * FROM PRODUCT COUNT(product_feedback.id) AS review_counter 
            INNER JOIN product_feedback ON product.id = product_feedback.product_id";
    return     select_all_records($sql);
}
function get_product_by_cate()
{
    if (isset($_GET['cate'], $_GET['mf'])) :
        $cate = $_GET['cate'];
        $manu = $_GET['mf'];

        $sql = "SELECT product.id, product.name,product.price, COUNT(product_feedback.id) AS review_counter
                INNER JOIN product_feedback ON product.id = product_feedback.product_id
                WHERE product.cate_id = {$cate} AND product.man_id = {$manu}";
        return select_all_records($sql);
    endif;
}
function get_one_product($id)
{
    if (isset($id)) :
        $sql = "SELECT * FROM product WHERE {$id}";
        return select_single_record($sql);
    endif;
}

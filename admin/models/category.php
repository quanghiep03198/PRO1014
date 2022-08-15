<?php
// lấy ra tất cả danh muc sản phẩm
function get_all_categories()
{
    $sql = "SELECT * FROM  product_category";
    return select_all_records($sql);
}
// lấy ra 1 danh mục sản phẩm
function get_one_category($cate_id)
{
    $sql = "SELECT * FROM product_category WHERE id = {$cate_id}";
    return select_single_record($sql);
}

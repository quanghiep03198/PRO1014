<?php
// lấy ra tất cả danh muc sản phẩm
function get_all_categories()
{
    $sql = "SELECT * FROM  product_category";
    return select_all_records($sql);
}

<?php
// lấy ra tất cả sản phẩm
function get_all_products()
{
    $sql = "SELECT product.*,
            manufacturer.name AS manu_name
            FROM product
            INNER JOIN manufacturer ON manufacturer.id = product.man_id";
    return select_all_records($sql);
}
// lấy ra tất cả nhà sản xuất
function get_all_manufacturer()
{
    $sql = "SELECT * FROM manufacturer";
    return select_all_records($sql);
}
// lấy ra sản phẩm theo nhà sản xuất
function get_product_by_manu($man_id)
{

    $sql = "SELECT product.*,
            manufacturer.name AS manu_name
            FROM product
            INNER JOIN manufacturer ON manufacturer.id = product.man_id
            WHERE product.man_id = {$man_id}";
    return select_all_records($sql);
}

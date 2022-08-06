<?php
function get_products_have_no_manufacturer()
{
    $sql = "SELECT * FROM product WHERE man_id NOT IN (SELECT id FROM manufacturer)";
    return select_all_records($sql);
}
// lấy ra 1 nhà sản xuất
function get_one_manufacturer($man_id)
{
    $sql = "SELECT * FROM manufacturer WHERE id = {$man_id}";
    return select_single_record($sql);
}

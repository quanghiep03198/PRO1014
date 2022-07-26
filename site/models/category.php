<?php
function get_all_categories()
{
    $sql = "SELECT * FROM product_category";
    return select_all_records($sql);
}
function get_all_manufacturer()
{
    $sql = "SELECT * FROM manufacturer";
    return select_all_records($sql);
}

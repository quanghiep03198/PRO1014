<?php
include 'lib/db_execute.php';

function get_all_product()
{
    $sql = "";
    $products = select_all_records($sql);
    return $products;
}

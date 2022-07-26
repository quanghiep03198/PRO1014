<?php
function page_render()
{
    // using models
    include_once 'admin/models/product.php';
    include_once 'admin/models/order.php';
    $page = isset($_GET['page']) ? str_replace("-", "/", $_GET['page']) : 'home';
    $file = "admin/views/{$page}.php";
    if (file_exists($file))
        include_once $file;
    else
        include_once 'error.php';
}

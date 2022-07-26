<?php
function page_render()
{
    // using models
    include_once 'site/models/product.php';
    include_once 'site/models/order.php';
    include_once 'site/models/category.php';
    $page = isset($_GET['page']) ? str_replace("-", "/", $_GET['page']) : 'home';
    $file = "site/views/{$page}.php";
    if (file_exists($file))
        include_once $file;
    else
        include_once 'error.php';
}

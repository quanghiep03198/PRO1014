<?php
// using models
include_once './admin/models/product.php';
include_once './admin/models/order.php';
include_once './admin/models/category.php';
include_once './admin/models/manufacturer.php';
include_once './admin/models/statistic.php';
include_once './admin/models/post.php';
include_once './admin/models/post_cate.php';
include_once './admin/models/user.php';
include_once './admin/models/service.php';
// using controllers
function render()
{
    $auth = get_user_data($_COOKIE['auth']);
    $page = isset($_GET['page']) ? str_replace("-", "/", $_GET['page']) : 'statistic';
    $file = "admin/views/{$page}.php";
    if (file_exists($file))
        include_once $file;
    else
        include_once 'error.php';
}

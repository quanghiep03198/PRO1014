<?php
// using models
include_once 'site/models/product.php';
include_once 'site/models/comment.php';
include_once 'site/models/order.php';
include_once 'site/models/category.php';
include_once 'site/models/service.php';
include_once 'site/models/post.php';
include_once 'site/models/user.php';
include_once 'site/models/wishlist.php';
function page_render()
{
    $settings = select_single_record("SELECT * FROM site_setting");
    extract($settings);

    global $auth; // nếu người dùng có đăng nhập thì lấy dữ liệu người dùng
    $page = isset($_GET['page']) ? str_replace("-", "/", $_GET['page']) : 'home';
    $file = "site/views/{$page}.php";
    if (str_contains($page, "account") && !isset($_COOKIE['auth']))
        header("location:./");
    include_once file_exists($file) ? $file : 'error.php';
}

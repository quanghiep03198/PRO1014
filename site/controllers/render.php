<?php

function page_render()
{
    global $auth; // nếu người dùng có đăng nhập thì lấy dữ liệu người dùng
    $page = isset($_GET['page']) ? str_replace("-", "/", $_GET['page']) : 'home';
    $file = "site/views/{$page}.php";
    if (str_contains($page, "account") && !isset($_COOKIE['auth']))
        header("location:./");
    include_once file_exists($file) ? $file : 'error.php';
}

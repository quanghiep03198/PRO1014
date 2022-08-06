<?php

function page_render()
{
    global $auth; // nếu người dùng có đăng nhập thì lấy dữ liệu người dùng

    $page = isset($_GET['page']) ? str_replace("-", "/", $_GET['page']) : 'home';
    $file = "site/views/{$page}.php";
    if (file_exists($file))
        include_once $file;
    else
        include_once 'error.php';
}

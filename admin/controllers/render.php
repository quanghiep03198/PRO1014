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
    global $auth;
    $page = isset($_GET['page']) ? str_replace("-", "/", $_GET['page']) : 'statistic';
    $file = "admin/views/{$page}.php";
    $ext = explode("/", $page);

    switch ($auth["role_id"]) {
        case "1":
            if (in_array($ext[0], ["user"]))
                echo '<script>
                    alert(`Đăng nhập với tài khoản admin để sử dụng!`);
                    window.location = "admin.php";
                </script>';
            break;
        case "2":
            if (in_array($ext[0], ["user", "product", "order", "manufacturer", "categories", "service", "statistic", "setting"]))
                echo '<script>
                    alert(`Đăng nhập với tài khoản admin hoặc nhân viên để sử dụng!`);
                    window.location = "admin.php?page=post-list";
                </script>';
            break;
        case "3":
            echo '<script>
                    alert(`Bạn không phải thành viên quản trị!`);
                    window.location = "index.php";
                </script>';
            break;
    }
    if (file_exists($file)) include_once $file;
    else include_once 'error.php';
}

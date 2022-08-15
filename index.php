<?php
// using global variable/function
include_once 'lib/global.php';
include_once 'lib/db_execute.php';
include_once 'lib/validate.php';
// using models
include_once 'site/models/product.php';
include_once 'site/models/comment.php';
include_once 'site/models/order.php';
include_once 'site/models/category.php';
include_once 'site/models/service.php';
include_once 'site/models/post.php';
include_once 'site/models/user.php';
include_once 'site/models/wishlist.php';
// controllers xử lý request của người dùng
include_once 'site/controllers/render.php';

session_start();


// nếu người dùng có đăng nhập -> lấy thông tin người dùng
if (isset($_COOKIE['auth']))
    $auth = get_user_data($_COOKIE['auth']);
// render page
page_render();

<?php
// using global variable/function
include_once 'lib/global.php';
include_once 'lib/db_execute.php';
include_once 'lib/validate.php';

// controllers xử lý request của người dùng
include_once 'site/controllers/render.php';

session_start();

// nếu người dùng có đăng nhập -> lấy thông tin người dùng
if (isset($_COOKIE['auth'])) :
    $auth = get_user_data($_COOKIE['auth']);
endif;
// render page
page_render();

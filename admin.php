<?php
// using global variable
include_once 'lib/global.php';
include_once 'lib/db_execute.php';
include_once 'lib/validate.php';


include_once './admin/controllers/render.php';

if (isset($_COOKIE['auth'])) {
    $auth = get_user_data($_COOKIE['auth']);
    render();
}
// nếu người dùng ko đăng nhập và cô tình truy cập vào trang sẽ yêu cầu người dùng quay lại
else
    header("Location: /index.php");

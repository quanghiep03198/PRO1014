<?php
// using global variable/function
include_once 'lib/global.php';
include_once 'lib/db_execute.php';
include_once 'lib/validate.php';
// sử dụng models để lấy dữ liệu từ database
include_once 'site/models/product.php';
include_once 'site/models/order.php';
include_once 'site/models/category.php';
include_once 'site/models/wishlist.php';
include_once 'site/models/comment.php';
include_once 'site/models/user.php';
// controllers xử lý request của người dùng
include_once 'site/controllers/render.php';
include_once 'site/controllers/handle_wishlist.php';
include_once 'site/controllers/handle_comment.php';

session_start();

if (isset($_POST['login-submit'])) {
    $account = $_POST['account'];
    $password = $_POST['password'];
    if (empty($account) || empty($password))
        echo "<script>alert(`Hãy nhập đầy đủ thông tin!`);</script>";
    if (!empty($account) && !empty($password)) :
        $auth = select_single_record("SELECT * FROM users WHERE account = '{$account}'");
        if (!is_null($auth)) {
            if (password_verify($password, $auth['password'])) {
                setcookie("auth", $auth['id']);
                $_SESSION['user_name'] = $auth['name'];
                if ($auth['role_id'] == 0 || $auth['role_id'] == 1) {
                    echo  "<script>alert(`Đăng nhập thành công!`)</script>";
                    echo  "<script>window.location = './admin.php'</script>";
                } else {
                    echo  "<script>alert(`Đăng nhập thành công!`)</script>";
                    echo  "<script>window.location = './'</script>";
                }
            } else
                echo "<script>alert(`Mật khẩu không chính xác!`)</script>";
        }
        // nếu kết quả trả về từ câu truy vẫn = null -> tài khoản không tồn tại
        else
            echo "<script>alert(`Tài khoản không tồn tại!`)</script>";
    endif;
}
// lây thông tin người dùng
$auth = get_user_data();
// render page
page_render();

<?php
include_once "../../lib/db_execute.php";
include_once "../../lib/validate.php";
include_once "../../site/models/user.php";


$json = file_get_contents("php://input");
$data = json_decode($json, true);
$error_count = 0;
$login_error = [];

extract($data);
check_empty($account, $password);
if ($error_count == 0) :
    $auth = select_single_record("SELECT * FROM users WHERE account = '{$account}'");
    if (!is_null($auth)) {
        if (password_verify($password, $auth['password'])) {
            echo json_encode($auth);
        } else {
            $login_error['err_password'] = "Mật khẩu không đúng!";
            echo  json_encode($login_error);
        }
    } else {
        $login_error['err_account'] = "Tài khoản không tồn tại!";
        echo  json_encode($login_error);
    }
endif;

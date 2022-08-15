<?php
include_once "../../lib/db_execute.php";

$json = file_get_contents("php://input");
$data = json_decode($json, true);
$error = [];

extract($data);
$user_password = select_one_value("SELECT password FROM users WHERE id = {$account}");

if (password_verify($current_password, $user_password)) {
    $newPassword = password_hash($new_password, PASSWORD_DEFAULT);
    execute_query("UPDATE users SET password = '{$newPassword}' WHERE users.id = '{$account}'");
    echo $json;
} else {
    $error['invalid_cur_password'] = "Mật khẩu hiện tại không đúng!";
    echo json_encode($error);
}

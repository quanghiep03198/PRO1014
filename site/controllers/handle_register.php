<?php
include_once "../../lib/db_execute.php";
include_once "../../lib/validate.php";
include_once "../../lib/send_mail.php";
include_once "../../site/models/user.php";

include "../../PHPMailer/src/PHPMailer.php";
include "../../PHPMailer/src/SMTP.php";
include "../../PHPMailer/src/Exception.php";
session_start();

$json = file_get_contents("php://input");
$data = json_decode($json, true);



$error_message = [];
// register
if (!empty($data) && array_key_exists("request", $data) && $data['request'] == "register") {
    extract($data);
    $notExistAccount = select_single_record("SELECT * FROM users WHERE account = '{$account}'") == null;

    if ($notExistAccount == true) {
        // bắn verify code về mail mà khách hàng đã gửi 
        $verifyCode = substr(md5(rand(0, 999999)), 0, 8);
        $subject = "Gửi bạn mã xác thực tài khoản";
        $body = "Mã xác thực của bạn là : <b>{$verifyCode}</b>";
        send_verify_code($email, $subject, $body);

        $data['password'] = password_hash($password, PASSWORD_DEFAULT);

        $_SESSION['account'] = json_encode($data); // lưu thông tin đăng ký trong session
        $_SESSION['verify_code'] = $verifyCode; // lưu verify code trong session

        // trả về response
        echo $_SESSION['account'];
    } else {
        $error_message['existing_account'] = "Tài khoản đã tồn tại!";
        echo json_encode($error_message);
    }
}
// verify mã xác thực
if (!empty($data) && array_key_exists("request", $data) && $data['request'] == "verify") {
    extract($data);
    if ($verify_code == $_SESSION['verify_code']) {
        $role = select_one_value("SELECT user_role.id FROM user_role WHERE user_role.id = 3");
        $sql = "INSERT INTO users (`account`,`password`,`name`,`email`,`address`,`phone`,`role_id`) 
                VALUES('{$account}','{$password}','{$username}','{$email}','{$address}','{$phone}','{$role}')";
        $user_id = execute_query($sql);
        execute_query("INSERT INTO wishlist (user_id) VALUES ('{$user_id}')");
        // xóa code verify lưu trên session
        $data['user_id'] = $user_id;
        $data['role'] = $role;
        echo json_encode($data);
        session_destroy();
        setcookie("active_time", "", time() - 9999);
    } else {
        $error_message['verify_code_err'] = "`Mã xác thực không chính xác !";
        echo $_SESSION['verify_code'];
        echo json_encode($error_message);
    }
}

if (isset($_GET['getcode']) && isset($_SESSION['account'])) {
    echo $_SESSION['account'];
}

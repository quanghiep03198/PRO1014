<?php
include_once '../../lib/db_execute.php';
include_once '../../lib/send_mail.php';
include_once '../../site/models/user.php';

include "../../PHPMailer/src/PHPMailer.php";
include "../../PHPMailer/src/SMTP.php";
include "../../PHPMailer/src/Exception.php";

$json = file_get_contents("php://input");
$data = json_decode($json, true);
$error_message = [];


if (!empty($data) && array_key_exists("request", $data) && $data["request"] == "get_code") :
    extract($data);
    $result = select_single_record("SELECT * FROM users WHERE account = '{$account}'");
    if ($result == null) {
        $error_message['invalid_account'] = "Tài khoản không tồn tại!";
        echo json_encode($error_message);
    } else {
        if ($email != $result['email']) {
            $error_message['invalid_email'] = "Email không đúng!";
            echo json_encode($error_message);
        } else {
            $verify_code = substr(md5(rand(0, 9999)), 0, 6);
            $subject = "Gửi bạn mã xác nhận đổi mật khẩu mới!";
            $body = "Mã xác thực của bạn là: <b>{$verify_code}</b><br>Mã xác thực có hiệu lực trong 5 phút!";

            // gửi mail và lưu tài khoản trong vòng 5 phút

            execute_query("UPDATE users SET password = '{$verify_code}' WHERE account = '{$account}'");
            send_verify_code($email, $subject, $body);
            echo json_encode($data);
        }
    }
endif;


if (!empty($data) && array_key_exists("request", $data) && $data["request"] == "recover_password") {
    extract($data);

    $code = select_one_value("SELECT password FROM users WHERE account = '{$_COOKIE['account']}'");

    if ($code == $verify_code) {
        $new_password = password_hash($new_password, PASSWORD_DEFAULT);
        execute_query("UPDATE users SET password = '{$new_password}' WHERE account = '{$_COOKIE['account']}'");
        echo $json;
    } else {
        $error_message['wrong_verify_code'] = "Mã xác thực không đúng!";
        echo json_encode($error_message);
    }
}

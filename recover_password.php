<?php
include_once './lib/db_execute.php';
include_once './lib/send_mail.php';
include_once './site/models/user.php';

if (isset($_POST['get_verify_code'])) :
    $account = select_single_record("SELECT * FROM users WHERE account = '{$_POST['account']}'");
    $all_users = get_all_users();
    if (!in_array($account, $all_users)) {
        echo '<script>alert(`Tài khoản không tồn tại!`)</script>';
    }
    if ($_POST['email'] != $account['email'])
        echo '<script>alert(`Email đăng ký không đúng!`)</script>';
    if (in_array($account, $all_users) && $_POST['email'] == $account['email']) {
        $verify_code = substr(md5(rand(0, 9999)), 0, 6);
        execute_query("UPDATE users SET password = '{$verify_code}' WHERE account = '{$_POST['account']}'");
        $receiver = $_POST['email'];
        $subject = "Gửi bạn mã xác nhận đổi mật khẩu mới!";
        $body = "Mã xác thực của bạn là: <b>{$verify_code}</b>
                <br>Mã xác thực có hiệu lực trong 5 phút!";

        // gửi mail và lưu tài khoản trong vòng 5 phút
        send_verify_code($receiver, $subject, $body);
        setcookie("account", $_POST['account'], time() + 300);
        echo '<script>alert(`Kiểm tra email để lấy mã xác thực`)</script>';

        header("Location: ./reset_password.php");
    }
endif;


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="" rel="stylesheet" />
    <title>Đăng ký</title>
    <link rel="stylesheet" href="./styles/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body class="w-screen h-screen flex justify-center items-center bg-center bg-no-repeat bg-cover" style="background-image: url('/img/banners/recover-password.webp');">
    <div class="max-w-[500px]  mx-auto bg-white bg-opacity-80 rounded-box p-10">
        <h1 class="sm:text-xl lg:text-3xl text-center font-semibold mb-10">Lấy lại mật khẩu</h1>
        <form action="" method="POST" class="w-full mx-auto " onsubmit="handleGetVerifyCode(this,event)">
            <div class="flex flex-col gap-5">
                <!-- tài khoản -->
                <div class="form-control">
                    <input data-name="tài khoản" name="account" class="input input-bordered w-full py-2 px-3 focus:outline-none focus:shadow-outline" id="account" type="text" placeholder="Tài khoản">
                    <small class=" text-error error-message font-semibold"></small>
                </div>
                <!-- email đăng ký -->
                <div class="form-control">
                    <input data-name="email đăng ký" name="email" type="email" class="input input-bordered w-full py-2 px-3 focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="Email đăng ký">
                    <small class=" text-error error-message font-semibold"></small>
                </div>

                <div class="flex items-center justify-center mt-[10px]">
                    <button type="submit" class="btn btn-md hover:btn-primary" name="get_verify_code">Lấy mã xác thực</button>
                </div>
            </div>
        </form>
    </div>
    <script src="./site/js/common.js"></script>
    <script src="./site/js/validate.js"></script>
    <script src="./site/js/handle-userdata.js"></script>
</body>

</html>
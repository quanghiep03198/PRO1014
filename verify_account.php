<?php
include_once "./lib/db_execute.php";
include_once "./lib/validate.php";
include_once "./lib/send_mail.php";
session_start();

if (isset($_POST['register_submit'])) {

    $account = $_POST['account'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    if (select_one_value("SELECT users.account FROM users WHERE users.account = '{$account}'") != $account) {
        // lưu tạm thông tin tài khoản vào cookie
        $verifyCode = substr(md5(rand(0, 999999)), 0, 8);
        setcookie("account", json_encode([$account, $password, $username, $email, $address, $phone]), time() + 3000);
        $_SESSION['verify_code'] = $verifyCode; // lưu verify code trong session
        send_verify_code($_POST['email'], $verifyCode);
    } else {
        echo '<script>
                alert(`Tài khoản đã tồn tại trong hệ thống`);
                history.go(-1);
            </script>';
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="" rel="stylesheet" />
    <title></title>
    <link rel="stylesheet" href="/styles/main.css">
</head>

<body class="w-screen h-screen flex justify-center items-center bg-center bg-no-repeat bg-cover" style="background-image: url('/img/banners/register-bg.webp');">
    <div class="max-w-3xl mx-auto bg-opacity-80">
        <form action="" method="POST" class=" flex flex-col gap-4 p-5 bg-white bg-opacity-70" id="verify-account__form">
            <h1 class="text-4xl font-semibold">Xác thực tài khoản</h1>
            <!-- tài khoản -->
            <div class="form-group">
                <input class="outline-none bg-inherit appearance-none border-b  w-full py-2 px-3 focus:outline-none focus:shadow-outline" name="verify_code" type="text" placeholder="Nhập mã xác thực">
                <small class="text-base text-error error-message font-semibold"></small>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block hover:btn-primary" name="verify_account">
                    Xác thực tài khoản
                </button>
            </div>
        </form>
    </div>

</body>

</html>
<?php

if (isset($_POST['verify_account']) && isset($_COOKIE['account'])) {
    $user = json_decode($_COOKIE['account']);
    if ($_POST['verify_code'] == $_SESSION['verify_code']) {
        $role = select_one_value("SELECT user_role.id FROM user_role WHERE user_role.name='client'");
        $sql = "INSERT INTO users (`account`,`password`,`name`,`email`,`address`,`phone`,`role_id`) 
        VALUE('{$user[0]}','{$user[1]}','{$user[2]}','{$user[3]}','{$user[4]}','{$user[5]}','{$role}')";
        $user_id = execute_query($sql);
        execute_query("INSERT INTO wishlist (user_id) VALUES ('{$user_id}')");
        // xóa code verify lưu trên session
        echo '<script>
                alert(`Đăng ký thành công`);
                history.go(-1)
            </script>';
        session_destroy();
    } else
        echo '<script>alert(`Mã xác thực không chính xác !`)</script>';
}

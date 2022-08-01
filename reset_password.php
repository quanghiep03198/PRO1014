<?php
include_once './lib/db_execute.php';
if (!isset($_COOKIE['account']))
    header("Location: ./");

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="" rel="stylesheet" />
    <title>Đăng ký</title>
    <link rel="stylesheet" href="./styles/main.css">
</head>

<body class="w-screen h-screen flex justify-center items-center bg-center bg-no-repeat bg-cover" style="background-image: url('/img/banners/recover-password.webp');">
    <div class="container mx-auto bg-white bg-opacity-80 rounded-box p-10">
        <form action="" method="POST" class="max-w-3xl mx-auto" onsubmit="handleRegisterError(this,event)">
            <h1 class="sm:text-xl lg:text-4xl text-center font-semibold mb-5">Thay đổi mật khẩu mới</h1>
            <div class="flex flex-col gap-5">
                <div class="form-control">
                    <label for="">Mã xác thực</label>
                    <input data-name="tài khoản" name="verify_code" class="input input-bordered  w-full  focus:outline-none focus:shadow-outline" type="text" placeholder="Mã xác thực">
                    <small class=" text-error error-message font-semibold"></small>
                </div>
                <div class="form-control">
                    <label for="">Mật khẩu mới</label>
                    <input data-name="email đăng ký" name="new_password" type="password" class="input input-bordered  w-full  focus:outline-none focus:shadow-outline" type="password" placeholder="Mật khẩu mới">
                    <small class=" text-error error-message font-semibold"></small>
                </div>
                <div class="form-control">
                    <label for="">Xác nhận mật khẩu mới</label>
                    <input data-name="email đăng ký" name="confirm_new_password" type="password" class="input input-bordered  w-full  focus:outline-none focus:shadow-outline" type="password" placeholder="Xác nhận mật khẩu mới">
                    <small class=" text-error error-message font-semibold"></small>
                </div>
                <div class="flex items-center justify-center mt-[10px]">
                    <button type="submit" class="btn btn-lg hover:btn-primary" name="reset_password">Thay đổi mật khẩu</button>
                </div>
            </div>
        </form>
    </div>
    <script src="site/js/common.js"></script>
    <script src="site/js/validate.js"></script>
</body>

</html>
<?php
if (isset($_POST['reset_password']) && isset($_COOKIE['account'])) :
    $code = $_POST['verify_code'];
    $verify_code = select_one_value("SELECT password FROM users WHERE account = '{$_COOKIE['account']}'");
    if (empty($error)) {
        if ($code == $verify_code) {
            $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
            execute_query("UPDATE users SET password = '{$new_password}' WHERE account = '{$_COOKIE['account']}'");
            echo "<script>alert(`Change password successfully!`);</script>";
            setcookie("account", "", time() - 301);
            echo "<script>window.location = window.location.href</script>";
        } else
            echo "<script>alert(`Mã xác thực không đúng!`);</script>";
    } else
        echo "<script>alert(`Đổi mật khẩu thất bại!`);</script>";
endif;

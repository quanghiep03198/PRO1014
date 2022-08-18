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
    <title>Reset mật khẩu</title>
    <link rel="stylesheet" href="./styles/main.css">
</head>

<body class="grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 items-stretch flex-grow min-h-screen ">
    <div class="h-screen sticky top-0 sm:hidden md:hidden ">
        <img src="/img/banners/contact-image.png" class="w-full h-full object-cover object-center" alt="">
    </div>
    <div class="container mx-auto bg-base-100 rounded-box shadow-2xl p-10 relative top-1/2 translate-y-1/2">
        <form action="" method="POST" class="max-w-3xl mx-auto" onsubmit="handleResetPassword(this,event)">
            <h1 class="sm:text-xl lg:text-4xl text-center font-semibold mb-5">Thay đổi mật khẩu mới</h1>
            <div class="flex flex-col gap-5">
                <div class="form-control h-24">
                    <label for="">Mã xác thực</label>
                    <input data-name="mã xác thực" name="verify_code" class="input input-bordered" type="text" placeholder="Mã xác thực">
                    <small class=" text-error error-message font-semibold"></small>
                </div>
                <div class="form-control h-24">
                    <label for="">Mật khẩu mới</label>
                    <input data-name="mật khẩu mới" name="new_password" type="password" class="input input-bordered" type="password" placeholder="Mật khẩu mới">
                    <small class=" text-error error-message font-semibold"></small>
                </div>
                <div class="form-control h-24">
                    <label for="">Xác nhận mật khẩu mới</label>
                    <input data-name="mật khẩu xác nhận" name="confirm_new_password" type="password" class="input input-bordered  w-full  focus:outline-none focus:shadow-outline" type="password" placeholder="Xác nhận mật khẩu mới">
                    <small class=" text-error error-message font-semibold"></small>
                </div>
                <div class="flex items-center justify-center mt-[10px]">
                    <input type="submit" data-name="recover_password" name="reset_password" class="btn btn-lg hover:btn-primary" value="Thay đổi mật khẩu">
                </div>
            </div>
        </form>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="js/common.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/handle-reset-password.js"></script>

</body>

</html>
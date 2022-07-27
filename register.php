<?php

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

<body class="w-screen h-screen flex justify-center items-center bg-center bg-no-repeat bg-cover" style="background-image: url('/img/banners/register-bg.webp');">
    <div class="max-w-4xl mx-auto px-10 p-10 bg-white bg-opacity-80">
        <form action="verify_account.php" method="POST" id="register-form">
            <h1 class="sm:text-xl lg:text-4xl text-center font-semibold mb-5">Đăng ký tài khoản</h1>
            <!-- tài khoản -->
            <div class="grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-10">
                <!-- form group left -->
                <div class="flex flex-col items-center">
                    <div class="form-group">
                        <input data-name="tài khoản" name="account" class="block outline-none bg-inherit appearance-none border-b  w-full py-2 px-3 focus:outline-none focus:shadow-outline" id="account" type="text" placeholder="Tài khoản">
                        <small class=" text-error error-message font-semibold"></small>
                    </div>

                    <div class="form-group">
                        <input data-name="mật khẩu" name="password" class="block outline-none bg-inherit appearance-none border-b  w-full py-2 px-3 focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="Mật khẩu">
                        <small class=" text-error error-message font-semibold"></small>
                    </div>
                    <!-- nhập lại mk  -->
                    <div class="form-group">
                        <input data-name="mật khẩu xác thực" name="confirm_password" class="block outline-none  bg-inherit appearance-none border-b  w-full py-2 px-3 focus:outline-none focus:shadow-outline" id="password2" type="password" placeholder="Xác nhận mật khẩu">
                        <small class=" text-error error-message font-semibold"></small>
                    </div>
                    <!-- tên  -->
                    <div class="form-group">
                        <input data-name="tên của bạn" name="username" class="block outline-none  bg-inherit  appearance-none border-b  w-full py-2 px-3 focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Tên của bạn ?">
                        <small class=" text-error error-message font-semibold"></small>
                    </div>
                </div>

                <!-- form group right -->
                <div class="flex flex-col items-center">
                    <!-- email  -->
                    <div class="form-group">
                        <input data-name="email" name="email" class="block outline-none  bg-inherit  appearance-none border-b  w-full py-2 px-3   focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Email">
                        <small class=" text-error error-message font-semibold"></small>
                    </div>
                    <!-- địa chỉ  -->
                    <div class="form-group">
                        <input data-name="địa chỉ" name="address" class="block outline-none  bg-inherit  appearance-none border-b  w-full py-2 px-3 focus:outline-none focus:shadow-outline" id="address" type="text" placeholder="Địa chỉ">
                        <small class=" text-error error-message font-semibold"></small>
                    </div>
                    <!-- sđt  -->
                    <div class="form-group">
                        <input data-name="số điện thoại" name="phone" class="block outline-none  bg-inherit  appearance-none border-b  w-full py-2 px-3 focus:outline-none focus:shadow-outline" id="phone" type="text" placeholder="Số điện thoại">
                        <small class=" text-error error-message font-semibold"></small>
                    </div>
                    <div class="form-group flex flex-col justify-center">
                        <span class="block align-middle">Đã có tài khoản? <a href="./?page=home" class="hover:link">Đăng nhập</a></span>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center mt-[10px]">
                <button type="submit" class="btn btn-block hover:btn-primary" name="register_submit">
                    Đăng ký
                </button>
            </div>
        </form>
    </div>
    <script src="site/js/common.js"></script>
    <script src="site/js/validate.js"></script>
    <script type="text/javascript">
        const account = $("#account")
        const password = $("#password")
        const confirmPassword = $("#password2")
        const username = $("#username")
        const email = $("#email")
        const address = $("#address")
        const phone = $("#phone")
        const form = $("#register-form")
        if (form) {
            form.onsubmit = () => {
                if (!isRequired(account, password, confirmPassword, username, email, address, phone))
                    return false
                if (!checkLength(password, 8))
                    return false
                if (!ckMatchingValue(confirmPassword, password))
                    return false
                if (!isEmail(email))
                    return false
                if (!isPhoneNumber(phone))
                    return false;
                return true

            }
        }
    </script>
</body>

</html>
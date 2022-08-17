<?php
if (!isset($_COOKIE["active_time"]))
    header("Location:index.php");

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="" rel="stylesheet" />
    <title>Xác thực tài khoản</title>
    <link rel="stylesheet" href="/styles/main.css">
</head>
<style>
    ::placeholder {
        font-size: 18px;
        color: white !important
    }
</style>

<body>
    <div class="grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 items-stretch flex-grow min-h-screen ">
        <div class="h-screen sticky top-0 sm:hidden md:hidden ">
            <img src="/img/banners/contact-image.png" class="w-full h-full object-cover object-center" alt="">
        </div>

        <form action="" method="POST" class=" max-w-5xl h-auto sm:p-5 md:p-5 lg:p-10  drop-shadow-xl flex flex-col gap-10 p-10 " id="verify-account__form" onsubmit="handleVerifyAccount(this,event)">
            <h1 class="sm:text-xl md:text-2xl lg:text-3xl font-semibold">Xác thực tài khoản</h1>
            <!-- tài khoản -->
            <div class="form-group">
                <label for="">Mã xác thực</label>
                <input class="input input-bordered w-full" name="verify_code" type="text" placeholder="Nhập mã xác thực">
                <small class="text-base text-error error-message font-semibold"></small>
            </div>
            <div class="form-group">
                <input type="submit" class="btn hover:btn-primary" data-name="verify" name="verify_account" value="Xác thực tài khoản">
            </div>
        </form>

    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/common.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/handle-register.js"></script>

</body>

</html>
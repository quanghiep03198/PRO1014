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

<body>
    <div class="fixed top-0 right-0 left-0 bottom-0 w-full h-full flex justify-center items-center bg-center bg-no-repeat bg-cover" style="background-image: url('/img/banners/register-bg.webp');">
        <div class="max-w-3xl mx-auto bg-opacity-80">
            <form action="" method="POST" class=" flex flex-col gap-10 p-10 bg-white bg-opacity-70" id="verify-account__form" onsubmit="handleVerifyAccount(this,event)">
                <h1 class="sm:text-xl md:text-2xl lg:text-3xl font-semibold">Xác thực tài khoản</h1>
                <!-- tài khoản -->
                <div class="form-group">
                    <input class="outline-none bg-inherit appearance-none border-b  w-full py-2 px-3 focus:outline-none focus:shadow-outline" name="verify_code" type="text" placeholder="Nhập mã xác thực">
                    <small class="text-base text-error error-message font-semibold"></small>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-block hover:btn-primary" data-name="verify" name="verify_account" value="Xác thực tài khoản">
                </div>
            </form>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/common.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/handle-register.js"></script>
    <script>

    </script>
</body>

</html>
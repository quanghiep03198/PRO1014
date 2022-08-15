<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="" rel="stylesheet" />
    <title>Quên mật khẩu</title>
    <link rel="stylesheet" href="./styles/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
    <div class="fixed w-full h-full bg-center bg-no-repeat bg-cover bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
        <div class="absolute top-1/2 right-1/2 translate-x-1/2 -translate-y-1/2 w-5xl bg-slate-700 bg-opacity-20 p-10 w-[-webkit-fill-available] max-w-5xl rounded-box shadow-2xl">
            <h1 class="sm:text-xl md:text-2xl lg:text-3xl text-center font-semibold mb-10 text-white">Lấy lại mật khẩu</h1>
            <form action="" method="POST" class="max-w-5xl mx-auto " onsubmit="handleGetVerifyCode(this,event)">
                <div class="flex flex-col gap-5">
                    <!-- tài khoản -->
                    <div class="form-control h-24">
                        <label for="">Tài khoản</label>
                        <input data-name="tài khoản" name="account" class="input input-bordered" id="account" type="text" placeholder="Tài khoản">
                        <small class=" text-error error-message font-semibold"></small>
                    </div>
                    <!-- email đăng ký -->
                    <div class="form-control h-24">
                        <label for="">Email đăng ký</label>
                        <input data-name="email đăng ký" name="email" type="email" class="input input-bordered" id="password" type="password" placeholder="Email đăng ký">
                        <small class=" text-error error-message font-semibold"></small>
                    </div>

                    <div class="flex items-center justify-center mt-[10px]">
                        <input type="submit" class="btn btn-md hover:btn-primary" data-name="get_code" name="get_verify_code" value="Lấy mã xác thực">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/common.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/handle-reset-password.js"></script>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="" rel="stylesheet" />
    <title>Đăng ký</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./styles/main.css">
</head>

<body>
    <div class="fixed center top-0 right-0 left-0 bottom-0 w-screen h-screen  bg-center bg-no-repeat bg-cover" style="background-image:url('/img/banners/register-bg.webp')">

        <div class="container mx-auto px-10 p-10 bg-white bg-opacity-80 rounded-box">
            <form action="verify_account.php" method="POST" class="relative max-w-5xl mx-auto" onsubmit="handleRegister(this,event)">
                <h1 class="sm:text-xl lg:text-4xl text-center font-semibold mb-5">Đăng ký tài khoản</h1>
                <!-- tài khoản -->
                <div class="grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-10">
                    <!-- form group left -->
                    <div class="flex flex-col gap-10 justify-between items-stretch">
                        <div class="form-control w-full">
                            <label for="">Tài khoản</label>
                            <input data-name="tài khoản" name="account" class="input  input-bordered  w-full  focus:outline-none focus:shadow-outline" id="account" type="text" placeholder="Tài khoản">
                            <small class=" text-base text-error error-message font-semibold"></small>
                        </div>

                        <div class="form-control w-full">
                            <label for="">Mật khẩu</label>
                            <input data-name="mật khẩu" name="password" class="input  input-bordered  w-full  focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="Mật khẩu">
                            <small class=" text-base text-error error-message font-semibold"></small>
                        </div>
                        <!-- nhập lại mk  -->
                        <div class="form-control w-full">
                            <label for="">Xác nhận mật khẩu</label>
                            <input data-name="mật khẩu xác thực" name="confirm_password" class="input  input-bordered  w-full  focus:outline-none focus:shadow-outline" id="password2" type="password" placeholder="Xác nhận mật khẩu">
                            <small class=" text-base text-error error-message font-semibold"></small>
                        </div>
                        <!-- tên  -->
                        <div class="form-control w-full">
                            <label for="">Tên của bạn</label>
                            <input data-name="tên của bạn" name="username" class="input  input-bordered  w-full  focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Tên của bạn ?">
                            <small class=" text-base text-error error-message font-semibold"></small>
                        </div>
                    </div>

                    <!-- form group right -->
                    <div class="flex flex-col gap-10 justify-start items-stretch">
                        <!-- email  -->
                        <div class="form-control w-full">
                            <label for="">Email</label>
                            <input data-name="email" name="email" class="input  input-bordered  w-full    focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Email">
                            <small class=" text-base text-error error-message font-semibold"></small>
                        </div>
                        <!-- địa chỉ  -->
                        <div class="form-control w-full">
                            <label for="">Địa chỉ</label>
                            <input data-name="địa chỉ" name="address" class="input  input-bordered  w-full  focus:outline-none focus:shadow-outline" id="address" type="text" placeholder="Địa chỉ">
                            <small class=" text-base text-error error-message font-semibold"></small>
                        </div>
                        <!-- sđt  -->
                        <div class="form-control w-full">
                            <label for="">Số điện thoại</label>
                            <input data-name="số điện thoại" name="phone" class="input  input-bordered  w-full  focus:outline-none focus:shadow-outline" id="phone" type="text" placeholder="Số điện thoại">
                            <small class=" text-base text-error error-message font-semibold"></small>
                        </div>
                        <div class="flex flex-col justify-center items-end">
                            <span class="text-end">Đã có tài khoản? <a href="index.php" class="font-semibold hover:link">Đăng nhập</a></span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <input type="submit" class="btn btn-lg hover:btn-primary my-10" data-name="register" name="register_submit" value="Đăng ký">
                </div>
            </form>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/js/common.js"></script>
    <script src="/js/validate.js"></script>
    <script src="js/handle-register.js"></script>
</body>

</html>
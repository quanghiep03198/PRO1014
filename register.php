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
    <div class="grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 items-stretch flex-grow min-h-screen ">
        <div class="h-screen sticky top-0 sm:hidden md:hidden ">
            <img src="/img/banners/contact-image.png" class="w-full h-full object-cover object-center" alt="">
        </div>
        <div class="container mx-auto p-10">
            <form action="verify_account.php" method="POST" class=" max-w-5xl h-auto sm:p-5 md:p-5 lg:p-10  drop-shadow-xl" onsubmit="handleRegister(this,event)">
                <h1 class="sm:text-xl md:text-2xl lg:text-4xl text-center font-semibold mb-5 ">Đăng ký tài khoản</h1>
                <!-- tài khoản -->
                <div class="grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-10">
                    <!-- form group left -->
                    <div class="flex flex-col gap-5 justify-between items-stretch">
                        <div class="form-control h-24 w-full">
                            <label for="">Tài khoản</label>
                            <input data-name="tài khoản" name="account" class="input  input-bordered  w-full  " id="account" type="text" placeholder="Tài khoản">
                            <small class=" text-base text-error error-message font-semibold"></small>
                        </div>

                        <div class="form-control h-24 w-full">
                            <label for="">Mật khẩu</label>
                            <input data-name="mật khẩu" name="password" class="input  input-bordered  w-full  " id="password" type="password" placeholder="Mật khẩu">
                            <small class=" text-base text-error error-message font-semibold"></small>
                        </div>
                        <!-- nhập lại mk  -->
                        <div class="form-control h-24 w-full">
                            <label for="">Xác nhận mật khẩu</label>
                            <input data-name="mật khẩu xác thực" name="confirm_password" class="input  input-bordered  w-full  " id="password2" type="password" placeholder="Xác nhận mật khẩu">
                            <small class=" text-base text-error error-message font-semibold"></small>
                        </div>
                        <!-- tên  -->
                        <div class="form-control h-24 w-full">
                            <label for="">Tên của bạn</label>
                            <input data-name="tên của bạn" name="username" class="input  input-bordered  w-full  " id="username" type="text" placeholder="Tên của bạn ?">
                            <small class=" text-base text-error error-message font-semibold"></small>
                        </div>
                    </div>

                    <!-- form group right -->
                    <div class="relative flex flex-col gap-5 justify-start items-stretch">
                        <!-- email  -->
                        <div class="form-control h-24 w-full">
                            <label for="">Email</label>
                            <input data-name="email" name="email" class="input  input-bordered  w-full    " id="email" type="email" placeholder="Email">
                            <small class=" text-base text-error error-message font-semibold"></small>
                        </div>
                        <!-- địa chỉ  -->
                        <div class="form-control h-24 w-full">
                            <label for="">Địa chỉ</label>
                            <input data-name="địa chỉ" name="address" class="input  input-bordered  w-full  " id="address" type="text" placeholder="Địa chỉ">
                            <small class=" text-base text-error error-message font-semibold"></small>
                        </div>
                        <!-- sđt  -->
                        <div class="form-control h-24 w-full">
                            <label for="">Số điện thoại</label>
                            <input data-name="số điện thoại" name="phone" class="input  input-bordered  w-full  " id="phone" type="text" placeholder="Số điện thoại">
                            <small class=" text-base text-error error-message font-semibold"></small>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col justify-center items-end">
                    <span class="text-end">Đã có tài khoản? <a href="index.php" class="font-semibold hover:link">Đăng nhập</a></span>
                </div>
                <div class="flex items-center justify-center">
                    <input type="submit" class="btn btn-lg btn-primary my-10 normal-case" data-name="register" name="register_submit" value="Đăng ký">
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
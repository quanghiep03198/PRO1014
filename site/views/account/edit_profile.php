<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thay đổi thông tin tài khoản</title>
</head>

<body>
    <!-- import header component -->
    <?php include_once "site/components/header.php" ?>
    <!--  -->
    <main class="w-full bg-slate-200 py-[50px]">
        <!-- import sidebar component -->
        <?php include_once "/site/components/account-sidebar.php" ?>
        <!--  -->
        <div class="p-5">
            <h1 class="text-4xl font-normal mb-10">Thay đổi thông tin</h1>
            <form action="" method="POST" class="flex flex-col gap-5" onsubmit="return handleErrorUpdateProfile(this,event)">
                <div class="form-group">
                    <label for="">Tên người dùng</label>
                    <input type="text" data-name="tên của bạn" name="username" class="input input-bordered w-full">
                    <small class="text-base text-error error-message font-semibold"></small>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" data-name="email" name="email" class="input input-bordered w-full">
                    <small class="text-base text-error error-message font-semibold"></small>
                </div>

                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" data-name="số điện thoại" name="phone" class="input input-bordered w-full">
                    <small class="text-base text-error error-message font-semibold"></small>
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" data-name="địa chỉ" name="address" class="input input-bordered w-full">
                    <small class="text-base text-error error-message font-semibold"></small>
                </div>
                <div>
                    <button type="submit " class="btn min-h-[45px] min-w-[180px] bg-[#4A4A4A] mt-[30px]">Cập nhật</button>
                </div>
            </form>
        </div>
    </main>
    <!-- import footer component -->
    <?php include_once "site/components/footer.php" ?>
    <!--  -->
    <script src="/js/common.js"></script>
    <script src="/js/validate.js"></script>
    <script src="/js/handle-userdata.js"></script>
</body>

</html>
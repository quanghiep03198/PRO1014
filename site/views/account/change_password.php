<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
    <!-- import header component -->
    <?php include_once "site/components/header.php" ?>
    <!--  -->
    <main class="w-full bg-slate-200 py-[50px]">

        <div class="grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-[1fr,2fr] items-stretch gap-5 px-10">
            <!-- import sidebar component -->
            <?php include_once "site/components/account-sidebar.php" ?>
            <!--  -->
            <div class="p-5 bg-white rounded-box shadow-2xl">
                <h1 class="text-[40px] font-light mb-[40px]">Đổi mật khẩu</h1>
                <form action="" method="POST" class="flex flex-col gap-5" onsubmit="handleErrorChangePassword(this,event)">
                    <div class="form-control h-24">
                        <label for="">Mật khẩu hiện tại</label>
                        <div class="pass mt-[10px]">
                            <input type="password" data-name="mật khẩu hiện tại" name="current_password" class="input input-bordered w-full">
                            <small class="text-base text-error error-message font-semibold"></small>
                        </div>
                    </div>
                    <div class="form-control h-24">
                        <label for="">Mật khẩu mới</label>
                        <input type="password" data-name="mật khẩu mới" name="new_password" class="input input-bordered w-full">
                        <small class="text-base text-error error-message font-semibold"></small>
                        <div class="pass mt-[10px]">
                        </div>
                    </div>
                    <div class="form-control h-24">
                        <label for="">Xác nhận mật khẩu mới</label>
                        <input type="password" data-name="mật khẩu xác thực" name="cfm_new_password" class="input input-bordered w-full">
                        <small class="text-base text-error error-message font-semibold"></small>
                    </div>
                    <div>
                        <input type="hidden" name="account" value=<?= $auth['id'] ?>>
                        <button type="submit" name="change_password" class="btn btn-lg hover:btn-primary w-auto">Đổi mật khẩu</button>
                    </div>
                </form>
            </div>

        </div>
    </main>
    <!-- import footer component -->
    <?php include_once "site/components/footer.php" ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/common.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/handle-userdata.js"></script>
</body>

</html>
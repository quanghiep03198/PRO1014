<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật thông tin tài khoản</title>

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
            <h1 class="text-4xl font-normal mb-10">Thông tin cá nhân</h1>
            <div class="flex flex-col gap-6">
                <div class="grid grid-cols-2 border-b">
                    <div class="tk text-[#858585] text-lg">Tài khoản</div>
                    <div class="ttk font-semibold text-lg"><?= $auth['account'] ?></div>
                </div>
                <!--  -->
                <div class="grid grid-cols-2 border-b">
                    <div class="tk text-[#858585] text-lg">Tên người dùng</div>
                    <div class="ttk font-semibold text-lg"><?= $auth['name'] ?></div>
                </div>
                <div class="grid grid-cols-2 border-b">
                    <div class="tk text-[#858585] text-lg">Email</div>
                    <div class="ttk font-semibold text-lg"><?= $auth['email'] ?></div>
                </div>
                <div class="grid grid-cols-2 border-b">
                    <div class="tk text-[#858585] text-lg">Số điện thoại</div>
                    <div class="ttk font-semibold text-lg"><?= $auth['phone'] ?></div>
                </div>

                <div class="grid grid-cols-2 border-b">
                    <div class="tk text-[#858585] text-lg">Địa chỉ</div>
                    <div class="ttk font-semibold text-lg"><?= $auth['address'] ?></div>
                </div>
            </div>
        </div>
    </main>
    <!-- import footer component -->
    <?php include_once "site/components/footer.php" ?>
    <!--  -->
    <script src="/js/handle-userdata.js"></script>
</body>

</html>
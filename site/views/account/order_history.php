<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng của bạn</title>
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>
    <!-- import header component -->
    <?php include_once "site/components/header.php" ?>

    <main class="w-full bg-slate-200 py-[50px]">
        <div class="grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-[1fr,2fr] items-stretch gap-5 px-10">
            <!-- import sidebar component -->
            <?php include_once "site/components/account-sidebar.php" ?>
            <div class="bg-white rounded-box shadow-2xl">
                <!-- code -->
            </div>
        </div>
    </main>
    <!-- import footer component -->
    <?php include_once "site/components/footer.php" ?>
    <script src="site/js/handle-userdata.js"></script>
    <script src="site/js/handle-post-request.js"></script>
</body>

</html>
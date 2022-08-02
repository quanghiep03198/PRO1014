<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Tiêu đề bài viết" ?></title>
</head>

<body>
    <!-- import header component -->
    <?php include_once "site/components/header.php" ?>

    <main class="w-full bg-slate-200 py-[50px]">
        <!-- import sidebar component -->
        <?php include_once "site/components/account-sidebar.php" ?>
        <div>
            <!-- code -->
        </div>
    </main>
    <!-- import footer component -->
    <?php include_once "site/components/footer.php" ?>
    <script src="js/handle-userdata.js"></script>
    <script src="js/handle-post-request.js"></script>
</body>

</html>
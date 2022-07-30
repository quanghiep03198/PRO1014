<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
    <link rel="stylesheet" href="styles/main.css">
</head>

<body class="bg-light">
    <?php include_once "site/components/header.php" ?>
    <main class="w-full bg-slate-200 py-[50px]">

    </main>
    <?php include_once "site/components/footer.php" ?>
    <script src="/site/js/common.js"></script>
    <script src="/site/js/validate.js"></script>
    <script src="/site/js/handle-cart.js"></script>
    <script src="/site/js/handle-userdata.js"></script>

    <script>
        const loadFile = (event) => {
            const photo = document.querySelector('#user-image');
            photo.style.display = "block";
            photo.src = URL.createObjectURL(event.target.files[0]);
            console.log(photo.src);
        };
    </script>
</body>

</html>
<?php
if (isset($_POST['update_avatar']) && isset($_COOKIE['auth'])) {
    $path = upload_file(ROOT_AVATAR, "avatar");
    execute_query("UPDATE users SET `avatar` = '{$path}' WHERE users.id = {$_COOKIE['auth']}");
    echo "<script>alert(`Đổi ảnh đại diện thành công!`)</script>";
    echo "<script>alert(`{$path}`)</script>";
    echo "<script>history.go(-1)</script>";
}

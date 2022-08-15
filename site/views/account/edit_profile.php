<?php

if (isset($_POST['update_profile'])) :
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $error_count = 0;

    check_empty($username, $email, $phone, $address);
    check_email($email);
    check_phoneNumber($phone);
    echo $error_count;

    if ($error_count == 0) :
        $sql = "UPDATE users SET name = '{$username}',
                                 email = '{$email}',
                                 phone = '{$phone}',
                                 address = '{$address}'
                WHERE users.id = {$auth['id']}";
        execute_query($sql);
        header("Location: ?page=account-edit_profile");

    endif;

endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thay đổi thông tin tài khoản</title>
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
                <h1 class="text-4xl font-normal mb-10">Thay đổi thông tin</h1>
                <form action="" method="POST" class="flex flex-col gap-5" onsubmit="handleErrorUpdateProfile(this,event)">
                    <div class="form-group">
                        <label for="">Tên người dùng</label>
                        <input type="text" data-name="tên của bạn" name="username" class="input input-bordered w-full" value="<?php echo $auth['name'] ?>">
                        <small class="text-base text-error error-message font-semibold"></small>
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" data-name="email" name="email" class="input input-bordered w-full" value="<?php echo $auth['email'] ?>">
                        <small class="text-base text-error error-message font-semibold"></small>
                    </div>

                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="text" data-name="số điện thoại" name="phone" class="input input-bordered w-full" value="<?php echo $auth['phone'] ?>">
                        <small class="text-base text-error error-message font-semibold"></small>
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ</label>
                        <input type="text" data-name="địa chỉ" name="address" class="input input-bordered w-full" value="<?php echo $auth['address'] ?>">
                        <small class="text-base text-error error-message font-semibold"></small>
                    </div>
                    <div>
                        <button type="submit" name="update_profile" class="btn hover:btn-primary">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <!-- import footer component -->
    <?php include_once "site/components/footer.php" ?>
    <!--  -->
    <script src="js/common.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/handle-userdata.js"></script>
</body>

</html>
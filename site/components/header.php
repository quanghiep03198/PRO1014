<?php
// include './lib/validate.php';
session_start();
if (isset($_POST['login-submit'])) {
    $account = $_POST['account'];
    $password = $_POST['password'];
    if (empty($account) || empty($password))
        echo "<script>alert(`Hãy nhập đầy đủ thông tin!`);</script>";
    if (!empty($account) && !empty($password)) :
        $userData = select_single_record("SELECT * FROM users WHERE account = '{$account}'");
        if (!is_null($userData)) {
            if (password_verify($password, $userData['password'])) {
                setcookie("auth", $userData['id']);
                $_SESSION['user_name'] = $userData['name'];
                if ($userData['role_id'] == 0 || $userData['role_id'] == 1) {
                    echo  "<script>alert(`Đăng nhập thành công!`)</script>";
                    echo  "<script>window.location = './admin.php'</script>";
                } else {
                    echo  "<script>alert(`Đăng nhập thành công!`)</script>";
                    echo  "<script>window.location = './'</script>";
                }
            } else
                echo "<script>alert(`Mật khẩu không chính xác!`)</script>";
        }
        // nếu kết quả trả về từ câu truy vẫn = null -> tài khoản không tồn tại
        else
            echo "<script>alert(`Tài khoản không tồn tại!`)</script>";
    endif;
}
if (isset($_COOKIE['auth']))
    $auth = select_single_record("SELECT * FROM users WHERE id = '{$_COOKIE['auth']}'");
?>

<header class="w-full bg-white" id="header">
    <div class="max-w-[90%] mx-auto navbar justify-between items-center">
        <!-- logo -->
        <div class="navbar-start">
            <a href=""><img class="sm:max-w-[7rem] lg:max-w-[10rem]" src=<?= ROOT_SITE . 'logo.png' ?> alt=""></a>
        </div>
        <!-- nav-link  -->
        <div class="navbar-center hidden lg:flex">
            <ul class="flex justify-center items-center gap-8">
                <li class="h-10 text-[20px] font-[600] hover:border-b-4 hover:border-gray-800"><a href="?page=home">Trang chủ</a></li>
                <li class="h-10 text-[20px] font-[600] hover:border-b-4 hover:border-gray-800"><a href="?page=product">Cửa hàng</a></li>
                <li class="h-10 text-[20px] font-[600] hover:border-b-4 hover:border-gray-800"><a href="?page=service">Dịch vụ</a></li>
                <li class="h-10 text-[20px] font-[600] hover:border-b-4 hover:border-gray-800"><a href="?page=post">Tin tức</a></li>
            </ul>
        </div>

        <div class="navbar-end items-center gap-4 pr-[10px]">
            <!-- nếu người dùng đã đăng nhập sẽ hiển thị thông tin tài khoản và tính năng cho người dùng -->
            <?php if (isset($_COOKIE['auth'])) : ?>
                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img src=<?= ROOT_AVATAR . $auth['avatar']  ?> />
                        </div>
                    </label>
                    <!-- submenu -->
                    <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-[300px]">
                        <li>
                            <a href="?page=account" class="justify-between">Tài khoản <span class="badge badge-lg"><?= $_SESSION['user_name'] ?></span></a>
                        </li>
                        <li><a href="./logout.php">Đăng xuất</a></li>
                    </ul>
                </div>
                <a href="?page=wishlist" class="text-xl"><i class="bi bi-heart"></i></a>
            <?php endif; ?>
            <!-- nếu người dùng chưa đăng nhập sẽ hiển thị nút đăng nhập -->
            <?php if (!isset($_COOKIE['auth'])) : ?>
                <label for="my-modal-3" class="modal-button text-2xl"><i class="bi bi-person"></i></label>
                <input type="checkbox" id="my-modal-3" class="modal-toggle" />
                <div class="modal">
                    <div class="modal-box relative">
                        <label for="my-modal-3" class="btn btn-circle btn-ghost absolute right-2 top-2">✕</label>
                        <form action="" method="post" class="flex flex-col gap-5">
                            <h1 class="text-center text-3xl font-semibold">Đăng nhập</h1>
                            <div class="form-group">
                                <label for="">Tài khoản</label>
                                <input class="input input-bordered w-full" type="text" name="account" id="">
                                <small class="text-base text-error error-message font-semibold"></small>
                            </div>
                            <div class="form-group">
                                <label for="">Mật khẩu</label>
                                <input class="input input-bordered w-full" type="text" name="password" id="">
                                <small class="text-base text-error error-message font-semibold"></small>
                            </div>
                            <span>Chưa có tài khoản? <a href="/register.php" class="font-medium hover:link hover:text-primary">Đăng ký</a></span>
                            <div class="form-group max-w-full mx-auto">
                                <button type="submit" name="login-submit" class="btn hover:btn-primary">Đăng nhập</button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
            <div class="indicator">
                <a href="?page=cart" class="text-xl"><i class="bi bi-cart3"></i></a>
                <span class="badge badge-md badge-error indicator-item text-white" id="cart-counter">
                </span>
            </div>
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-sm lg:hidden"><i class="bi bi-list"></i></label>
                <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a href="?page=home">Trang chủ</a></li>
                    <li><a href="?page=product">Cửa hàng</a></li>
                    <li><a href="?page=service">Dịch vụ</a></li>
                    <li><a href="?page=news">Tin tức</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
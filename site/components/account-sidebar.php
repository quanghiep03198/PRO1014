<?php
if (isset($_POST['update_avatar']) && isset($_COOKIE['auth'])) {
    $path = upload_file(ROOT_AVATAR, "avatar");
    execute_query("UPDATE users SET `avatar` = '{$path}' WHERE users.id = {$_COOKIE['auth']}");
    echo "<script>alert(`Đổi ảnh đại diện thành công!`)</script>";
    echo "<script>alert(`{$path}`)</script>";
    echo "<script>history.go(-1)</script>";
}
?>
<!-- sidebar -->
<aside class="flex flex-col justify-between bg-white h-screen sticky top-0 rounded-box shadow-2xl p-5 " aria-label="Sidebar">
    <nav>
        <ul class="space-y-2">
            <li>
                <a href="?page=account&act=view_profile" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <span class="ml-3">Thông tin tài khoản</span>
                </a>
            </li>
            <li>
                <a href="?page=account&act=edit_profile" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <span class="flex-1 ml-3 whitespace-nowrap">Thay đổi thông tin</span>
                </a>
            </li>
            <li>
                <a href="?page=account&act=change_password" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <span class="flex-1 ml-3 whitespace-nowrap">Đổi mật khẩu</span>
                </a>
            </li>
            <li>
                <a href="?page=account&act=wishlist" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <span class="flex-1 ml-3 whitespace-nowrap">Danh sách yêu thích</span>
                    <span class="inline-flex justify-center items-center p-3 ml-3 w-3 h-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full dark:bg-blue-900 dark:text-blue-200">3</span>
                </a>
            </li>
            <li>
                <a href="?page=account-order_history" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <span class="flex-1 ml-3 whitespace-nowrap">Lịch sử mua hàng</span>
                </a>
            </li>
        </ul>
    </nav>
    <form action="" enctype="multipart/form-data" method="POST" class="flex justify-start items-center gap-3">
        <div class="avatar relative">
            <img class="max-w-[60px] h-[60px] rounded-full" id="user-image" src=<?= ROOT_AVATAR . $auth['avatar'] ?> alt="">
            <label for="avatar" class="absolute center w-full h-full rounded-full bg-black bg-opacity-50 text-white text-xl center opacity-0 hover:opacity-100 hover:duration-300">
                <i class="bi bi-cloud-upload"></i>
            </label>
        </div>
        <div class="info text-start">
            <h3 class="text-lg hover:underline"> <a href=""><?= $_SESSION['user_name'] ?></a></h3>
            <p class="text-gray-500"><?= $auth['email'] ?></p>
        </div>
        <div class="camera ml-10">
            <input type="file" name="avatar" class="hidden" id="avatar" onchange="loadFile(event)">
            <button type="submit" name="update_avatar" class="text-2xl"><i class="bi bi-camera"></i></button>
        </div>
    </form>
</aside>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles/main.css">
</head>

<body class="bg-light">
    <?php include_once "site/components/header.php" ?>
    <main class="w-full bg-[#EDEDED] py-[50px]">
        <div class="grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-[1fr,2fr] items-stretch gap-10 px-5">
            <!-- sidebar -->
            <aside class="flex flex-col justify-between bg-white h-screen sticky top-0 rounded-2xl p-5 " aria-label="Sidebar">
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
                            <a href="?page=account&act=order_history" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                <span class="flex-1 ml-3 whitespace-nowrap">Lịch sử mua hàng</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <form action="" enctype="multipart/form-data" class="flex justify-start items-center gap-3">
                    <div class="avatar relative">
                        <img class="max-w-[60px] h-[60px] rounded-full" id="user-image" src=<?= ROOT_AVATAR . $auth['avatar'] ?> alt="">
                        <label for="avatar" class="absolute center w-full h-full rounded-full bg-black bg-opacity-50 text-white text-xs center opacity-0 hover:opacity-100 hover:duration-300">Upload</label>
                    </div>
                    <div class="info text-start">
                        <h3 class="text-lg hover:underline"> <a href=""><?= $_SESSION['user_name'] ?></a></h3>
                        <p class="text-gray-500"><?= $auth['email'] ?></p>
                    </div>
                    <div class="camera ml-10">
                        <input type="file" name="avatar" class="hidden" id="avatar" onchange="loadFile(event)">
                        <button type="submit" class="text-2xl"><i class="bi bi-camera"></i></button>
                    </div>
                </form>
            </aside>
            <!-- main interface -->
            <div class="w-auto bg-white rounded-2xl pb-10">
                <?php
                if (isset($_GET['act'])) {
                    switch ($_GET['act']) {
                        case 'view_profile':
                            require 'site/views/account/view_profile.php';
                            break;
                        case 'change_password':
                            require 'site/views/account/change_password.php';
                            break;
                        case 'edit_profile':
                            require 'site/views/account/edit_profile.php';
                            break;
                        case 'wishlist':
                            require 'site/views/account/wishlist.php';
                            break;
                        case 'order_history':
                            require 'site/views/account/order_history.php';
                            break;
                        case 'order_detail':
                            require 'site/views/account/order_detail.php';
                            break;
                        default:
                            require 'site/views/account/view_profile.php';
                            break;
                    }
                }
                ?>

            </div>
        </div>
    </main>
    <?php include_once "site/components/footer.php" ?>
    <script>
        const loadFile = (event) => {
            const photo = document.querySelector('#user-image');
            photo.style.display = "block";
            photo.src = URL.createObjectURL(event.target.files[0]);
            console.log(photo.src);
        };

        //    function clearFormData() {
        //        const inputs = document.querySelectorAll('input');
        //        for (const input of inputs) {
        //            if (!input.hasAttribute("disabled"))
        //                input.value = "";
        //        }
        //    }
    </script>
</body>

</html>
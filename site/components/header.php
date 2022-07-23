<header>
    <div class="container mx-auto navbar justify-between bg-base-100">
        <!-- logo -->
        <div class="navbar-start">
            <a href=""><img class="sm:max-w-[100px] lg:max-w-[150px]" src=<?= ROOT_SITE . 'logo.png' ?> alt=""></a>
        </div>
        <!-- nav-link  -->
        <div class="navbar-center hidden lg:flex">
            <ul class="flex justify-center items-center gap-8">
                <li class="h-10 text-[20px] font-[600] hover:border-b-4 hover:border-gray-800"><a href="?page=home">Trang chủ</a></li>
                <li class="h-10 text-[20px] font-[600] hover:border-b-4 hover:border-gray-800"><a href="?page=product">Cửa hàng</a></li>
                <li class="h-10 text-[20px] font-[600] hover:border-b-4 hover:border-gray-800"><a href="?page=service">Dịch vụ</a></li>
                <li class="h-10 text-[20px] font-[600] hover:border-b-4 hover:border-gray-800"><a href="?page=news">Tin tức</a></li>
            </ul>
        </div>
        <!-- user control -->
        <div class="navbar-end gap-4 pr-[10px]">
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img src="https://placeimg.com/80/80/people" />
                    </div>
                </label>
                <!-- submenu -->
                <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-[300px]">
                    <li>
                        <a class="justify-between">Tài khoản <span class="badge badge-lg">Quang Hiệp</span></a>
                    </li>
                    <li><a href="?page=account-infor">Settings</a></li>
                    <li><a href="../logout.php">Đăng xuất</a></li>
                </ul>
            </div>
            <a href="?page=wishlist" class="text-xl"><i class="bi bi-heart"></i></a>
            <div class="indicator">
                <a href="?page=cart" class="text-xl"><i class="bi bi-cart3"></i></a>
                <span class="badge badge-md badge-error indicator-item text-white">0</span>
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
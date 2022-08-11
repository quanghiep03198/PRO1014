<aside class="sticky top-0 h-screen z-50 sm:hidden md:block lg:block">
    <div class="md:h-screen lg:h-screen dropdown dropdown-hover sm:dropdown-end lg:dropdown-right">
        <!-- nav-icon -->
        <nav class="sm:w-screen sm:h-auto md:h-screen lg:h-screen p-[30px] flex md:flex-col lg:flex-col justify-between items-center bg-[color:var(--primary-color)] " tabindex="0">
            <ul class="flex md:flex-col lg:flex-col justify-center gap-4 items-center h-1/2">
                <li class=" text-white text-2xl hover:animate-bounce">
                    <i class="bi bi-bar-chart-line "></i>
                </li>
                <li class=" text-white text-2xl hover:animate-bounce">
                    <i class="bi bi-people"></i>
                </li>
                <li class=" text-white text-2xl hover:animate-bounce">
                    <i class="bi bi-box"></i>
                </li>
                <li class=" text-white text-2xl hover:animate-bounce">
                    <i class="bi bi-card-checklist"></i>
                </li>
                <li class=" text-white text-2xl hover:animate-bounce">
                    <i class="bi bi-newspaper"></i>
                </li>
                <li class=" text-white text-2xl hover:animate-bounce">
                    <i class="bi bi-list-check"></i>
                </li>
                <li class=" text-white text-2xl hover:animate-bounce">
                    <i class="bi bi-gear"></i>
                </li>
            </ul>
            <div class="flex flex-col justify-center items-center gap-5">
                <img src=<?php echo ROOT_AVATAR . $auth['avatar'] ?> alt="" class="min-w-[60px] h-[60px] rounded-full object-fill sm:hidden">
            </div>
        </nav>
        <!-- submenu -->
        <nav class="dropdown-content flex flex-col justify-between w-96 sm:h-auto md:h-screen lg:h-screen bg-[#858585] px-2 py-[30px]" tabindex="0">
            <ul class="flex flex-col justify-center gap-2 h-1/2">
                <li class="w-full p-2 text-white text-base hover:bg-white/30 hover:rounded-lg"><a href="?page=statistic">Thống kê doanh số</a> </li>
                <li class="w-full p-2 text-white text-base hover:bg-white/30 hover:rounded-lg"><a href="?page=user-list">Quản lý tài khoản</a> </li>
                <li class="w-full p-2 text-white text-base hover:bg-white/30 hover:rounded-lg"><a href="?page=product-list">Quản lý sản phẩm</a> </li>
                <li class="w-full p-2 text-white text-base hover:bg-white/30 hover:rounded-lg"><a href="?page=order-list">Quản lý đơn hàng</a> </li>
                <li class="w-full p-2 text-white text-base hover:bg-white/30 hover:rounded-lg"><a href="?page=post-list">Quản lý bài viết</a></li>
                <li class="w-full p-2 text-white text-base hover:bg-white/30 hover:rounded-lg"><a href="?page=service-list">Danh sách dịch vụ</a> </li>
                <li class="w-full p-2 text-white text-base hover:bg-white/30 hover:rounded-lg"><a href="?page=setting">Cài đặt website</a> </li>
            </ul>
            <div class="sm:hidden md:flex lg:flex md:flex-col lg:flex-col justify-center align-middle h-[60px]">
                <div class="flex flex-col justify-center gap-2">
                    <span class="px-2 text-white text-xl"><?= $auth['name'] ?></span>
                    <span class="px-2 text-gray-300"><?= $auth['email'] ?></span>
                    <a href="" class="text-sm text-white" onclick="logout()"><i class="bi bi-arrow-bar-left"></i> Đăng xuất</a>
                </div>
            </div>
        </nav>
    </div>
</aside>
<nav class="sm:flex sm:justify-around sm:items-center md:hidden lg:hidden  w-screen h-auto bg-gray-800 py-5">
    <button onclick="history.go(-1)"><i class="bi bi-caret-left text-white"></i></button>
    <a href="./admin.php"><i class="bi bi-house text-white"></i></a>
    <label for="my-modal-3" class="modal-button"><i class="bi bi-list text-white"></i></label>
    <input type="checkbox" id="my-modal-3" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box relative">
            <label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            <ul tabindex="0" class="menu">
                <li class="w-full p-2 text-base hover:bg-white/30 hover:rounded-lg"><a href="?page=statistic">Thống kê doanh số</a> </li>
                <li class="w-full p-2 text-base hover:bg-white/30 hover:rounded-lg"><a href="?page=user-list">Quản lý tài khoản</a> </li>
                <li class="w-full p-2 text-base hover:bg-white/30 hover:rounded-lg"><a href="?page=product-list">Quản lý sản phẩm</a> </li>
                <li class="w-full p-2 text-base hover:bg-white/30 hover:rounded-lg"><a href="?page=order-list">Quản lý đơn hàng</a> </li>
                <li class="w-full p-2 text-base hover:bg-white/30 hover:rounded-lg"><a href="?page=post-list">Quản lý bài viết</a></li>
                <li class="w-full p-2 text-base hover:bg-white/30 hover:rounded-lg"><a href="?page=service">Danh sách dịch vụ</a> </li>
                <li class="w-full p-2 text-base hover:bg-white/30 hover:rounded-lg"><a href="?page=setting">Cài đặt website</a> </li>
            </ul>
        </div>
    </div>
</nav>
<script src="js/handle-userdata.js"></script>
<footer class="bg-gray-700 px-5">
    <!-- footer main -->
    <div class="footer container mx-auto py-10 text-white ">
        <figure>
            <a href="?page=home"><img src=<?= ROOT_SITE . 'logo-footer.png' ?> alt=""></a>
        </figure>
        <!-- footer col -->
        <div class="flex flex-col justify-start gap-4">
            <h3 class="text-3xl font-medium mb-8">Hỗ trợ</h3>
            <a class="link link-hover text-lg font-normal">Chính sách bảo hành</a>
            <a class="link link-hover text-lg font-normal">Chính sách mua hàng</a>
            <a class="link link-hover text-lg font-normal">Chính sách thanh toán</a>
            <a class="link link-hover text-lg font-normal">Chính sách đổi trả</a>

        </div>
        <!-- footer col -->
        <div class="flex flex-col justify-start gap-4">
            <h3 class="text-3xl font-medium mb-8">Dịch vụ</h3>
            <a class="link link-hover text-lg font-normal">Cung cấp máy chơi game chính hãng</a>
            <a class="link link-hover text-lg font-normal">Sửa chữa lấy ngay</a>
            <a class="link link-hover text-lg font-normal">Thiết kế, lắp đặt PS Center</a>

        </div>
        <!-- footer col -->
        <div class="flex flex-col justify-start gap-4">
            <h3 class="text-3xl font-[600] text-[#fff] mb-8">Liên hệ</h3>
            <a class="link link-hover text-lg font-normal">
                <i class="bi bi-telephone"></i>
                <span class="indent-3"><?= $hotline ?></span>
            </a>
            <a class="link link-hover text-lg font-normal">
                <i class="bi bi-envelope"></i>
                <span class="indent-3"><?= $email ?></span>
            </a>
            <a class="link link-hover text-lg font-normal">
                <i class="bi bi-geo-alt"></i>
                <span class="indent-3"><?php echo $address ?></span>
            </a>
            <a class="link link-hover text-lg font-normal">
                <i class="bi bi-facebook"></i>
                <span class="indent-3"><?php echo $facebook ?></span>
            </a>
        </div>
    </div>
    <hr class="border-1 border-[#fff] w-full">
    <!-- footer-bottom -->
    <div class="text-center py-8">
        <p class="text-white text-5 font-light">Đại lý được ủy quyền bỏi Sony Việt Nam</p>
    </div>
</footer>
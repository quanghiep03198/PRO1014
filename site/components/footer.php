<footer class="bg-[color:var(--primary-color)]">
    <div class="container mx-auto flex justify-between sm:flex-col md:flex-col lg:flex-row gap-10 items-start py-[80px] text-white ">
        <!-- footer logo -->
        <picture>
            <a href="?page=home"><img src=<?= ROOT_SITE . 'logo-footer.png' ?> alt=""></a>
        </picture>
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
            <a class="link link-hover text-lg font-normal"><i class="bi bi-telephone"></i> 033 608 9988</a>
            <a class="link link-hover text-lg font-normal"><i class="bi bi-envelope"></i> pshnstore@gmail.com</a>
            <a class="link link-hover text-lg font-normal"><i class="bi bi-geo-alt"></i> Trịnh Văn Bô, Nam Từ Liêm, Hà Nội</a>
            <a class="link link-hover text-lg font-normal"><i class="bi bi-geo-alt"></i> https://fb.me/psstorevn</a>
        </div>
    </div>
    <hr class="border-1 border-[#fff] w-full">
    <!-- footer-bottom -->
    <div class="text-center py-8">
        <p class="text-[#fff] text-[20px] font-[400]">Đại lý được ủy quyền bỏi Sony Việt Nam</p>
    </div>
</footer>
<script type="text/javascript">
    // khởi tạo giỏ hàng trên localstorage
    if (!localStorage.getItem("cart")) localStorage.setItem("cart", JSON.stringify([]));
    const cartItems = [];
    const cartCounter = document.querySelector("#cart-counter");
    cartCounter.innerText = JSON.parse(localStorage.getItem("cart")).length;
</script>
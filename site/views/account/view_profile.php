<div class="p-5">
    <h1 class="text-4xl font-normal mb-10">Thông tin cá nhân</h1>
    <div class="flex flex-col gap-6">
        <div class="grid grid-cols-2 border-b">
            <div class="tk text-[#858585] text-lg">Tài khoản</div>
            <div class="ttk font-semibold text-lg"><?= $auth['account'] ?></div>
        </div>
        <!--  -->
        <div class="grid grid-cols-2 border-b">
            <div class="tk text-[#858585] text-lg">Tên người dùng</div>
            <div class="ttk font-semibold text-lg"><?= $auth['name'] ?></div>
        </div>
        <div class="grid grid-cols-2 border-b">
            <div class="tk text-[#858585] text-lg">Email</div>
            <div class="ttk font-semibold text-lg"><?= $auth['email'] ?></div>
        </div>
        <div class="grid grid-cols-2 border-b">
            <div class="tk text-[#858585] text-lg">Số điện thoại</div>
            <div class="ttk font-semibold text-lg"><?= $auth['phone'] ?></div>
        </div>

        <div class="grid grid-cols-2 border-b">
            <div class="tk text-[#858585] text-lg">Địa chỉ</div>
            <div class="ttk font-semibold text-lg"><?= $auth['address'] ?></div>
        </div>
    </div>
</div>
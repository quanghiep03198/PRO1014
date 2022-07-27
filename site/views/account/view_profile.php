 <form action="" method="post" class="ml-[30px]">
     <h1 class="text-[40px] font-normal mb-[60px]">Thông tin cá nhân</h1>
     <div class="grid grid-cols-2 mb-5">
         <div class="tk text-[#858585] text-lg">Tài khoản</div>
         <div class="ttk font-semibold text-lg"><?= $auth['account'] ?></div>
     </div>
     <!--  -->
     <div class="grid grid-cols-2 mb-5">
         <div class="tk text-[#858585] text-lg">Tên người dùng</div>
         <div class="ttk font-semibold text-lg"><?= $auth['name'] ?></div>
     </div>
     <div class="grid grid-cols-2 mb-5">
         <div class="tk text-[#858585] text-lg">Email</div>
         <div class="ttk font-semibold text-lg"><?= $auth['email'] ?></div>
     </div>
     <div class="grid grid-cols-2 mb-5">
         <div class="tk text-[#858585] text-lg">Số điện thoại</div>
         <div class="ttk font-semibold text-lg"><?= $auth['phone'] ?></div>
     </div>

     <div class="grid grid-cols-2 mb-5">
         <div class="tk text-[#858585] text-lg">Địa chỉ</div>
         <div class="ttk font-semibold text-lg"><?= $auth['address'] ?></div>
     </div>
 </form>
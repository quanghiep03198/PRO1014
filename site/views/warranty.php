<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tra cứu bảo hành sản phẩm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>

    <?php include_once 'site/components/header.php'; ?>

    <main>
        <div class="title w-full text-center ">
            <h2 class="text-[#fff] py-[50px] text-[30px] bg-[#4A4A4A]">Tra cứu bảo hành sản phẩm</h2>
        </div>
        <div class="hero bg-[#fff] py-[100px]">

            <div class="grid sm:grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                <div>
                    <form action="?page=warranty_result" method="POST" class="flex flex-col gap-5" onsubmit="return handleErrorWarrantySearch(this,event)">
                        <div class="form-group">
                            <label class="text-xl" for="">Email mua hàng</label>
                            <input type="text" data-name="số điện thoại/email" name="customer_infor" id="" class="input input-bordered  w-full">
                            <small class="text-base text-error error-message font-semibold"></small>
                        </div>

                        <div class="form-group">
                            <label class="text-xl" for="">Mã đơn hàng</label>
                            <input type="text" data-name="mã đơn hàng" name="order_key_id" id="" class="input input-bordered w-full">
                            <small class="text-base text-error error-message font-semibold"></small>
                        </div>

                        <button type="submit" name="search_warranty" class="btn min-h-[45px] min-w-[180px] bg-[#4A4A4A] mt-[30px]">Tra cứu</button>
                    </form>
                </div>
                <div class="w-full h-full object-cover"><img src="/img/warranty-banner.png" class="max-w-lg " /></div>
            </div>
        </div>
    </main>
    <?php include_once 'site/components/footer.php'; ?>
    <script src="js/common.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/handle-userdata.js"></script>

</body>

</html>
<?php
// get_warranty_expired_date()
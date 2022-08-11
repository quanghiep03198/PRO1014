<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tra cứu bảo hành sản phẩm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/swal.css">

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
                    <form action="" method="POST" class="flex flex-col gap-5">
                        <div class="form-group">
                            <label class="text-xl" for="">Email</label>
                            <input type="text" data-name="email" name="email" id="" class="input input-bordered  w-full">
                            <small class="text-base text-error error-message font-semibold"></small>
                        </div>

                        <div class="form-group">
                            <label class="text-xl" for="">Mã đơn hàng</label>
                            <input type="text" data-name="mã đơn hàng" name="order_key_id" id="" class="input input-bordered w-full">
                            <small class="text-base text-error error-message font-semibold"></small>
                        </div>

                        <!-- <button type="submit" name="search_warranty" class="btn min-h-[45px] min-w-[180px] bg-[#4A4A4A] mt-[30px]"></button> -->
                        <!-- The button to open modal -->
                        <label class="btn hover:btn-primary" onclick="handleSearchWarranty(this)">Tra cứu</label>

                        <!-- Put this part before </body> tag -->
                        <input type="checkbox" id="warranty-info" class="modal-toggle" />
                        <div class="modal">
                            <div class="modal-box relative !max-w-[1024px]">
                                <label for="warranty-info" class="btn btn-sm btn-circle absolute right-2 top-2" id="close-modal__btn">✕</label>
                                <h1 class="text-2xl font-bold text-center mb-10">Chi tiết đơn hàng</h1>
                                <div id="order-items-list" class="flex sm:flex-col items-center max-w-5xl"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="w-full h-full object-cover"><img src="/img/warranty-banner.png" class="max-w-lg " /></div>
            </div>
        </div>
    </main>
    <?php include_once 'site/components/footer.php'; ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/common.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/handle-userdata.js"></script>

</body>

</html>
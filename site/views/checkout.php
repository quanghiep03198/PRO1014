<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đặt hàng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/swal.css">

</head>
<style>

</style>

<body>
    <?php include_once 'site/components/header.php';  ?>
    <main class="px-5">
        <form action="" method="POST" class="max-w-3xl mx-auto" onsubmit="place_order(this,event)">
            <h2 class="sm:text-2xl lg:text-3xl font-semibold text-primary mb-5">1. Thông tin nhận hàng</h2>
            <div class="flex flex-col gap-6">
                <div class="form-group">
                    <label for="" class="label">Họ tên</label>
                    <input type="text" name="customer_name" data-name="tên" class="input input-bordered w-full focus:outline-none" value="<?php echo isset($auth) ? $auth['name'] : '' ?>">
                    <small class="text-base text-error error-message font-semibold"></small>
                </div>
                <div class="form-group">
                    <label for="" class="label">Số điện thoại</label>
                    <input type="text" name="phone" data-name="số điện thoại" class="input input-bordered w-full focus:outline-none" value=<?php echo isset($auth) ? $auth['phone'] : '' ?>>
                    <small class="text-base text-error error-message font-semibold"></small>
                </div>
                <div class="form-group">
                    <label for="" class="label">Email</label>
                    <input type="email" name="email" data-name="email" class="input input-bordered w-full focus:outline-none" value=<?php echo isset($auth) ? $auth['email'] : '' ?>>
                    <small class="text-base text-error error-message font-semibold"></small>
                </div>
                <div class="form-group">
                    <label for="" class="label">Địa chỉ</label>
                    <input type="text" name="address" data-name="địa chỉ" class="input input-bordered w-full focus:outline-none" value="<?php echo isset($auth) ? $auth['address'] : '' ?>">
                    <small class="text-base text-error error-message font-semibold"></small>
                </div>
                <div class="form-group">
                    <label for="" class="label">Ghi chú</label>
                    <input type="text" name="order_notice" data-name="ghi chú" class="input input-bordered w-full focus:outline-none" value="<?php echo isset($auth) ? $auth['address'] : '' ?>">
                </div>
                <div class="form-group">
                    <h2 class="sm:text-2xl lg:text-3xl font-semibold text-primary mb-5">2. Phương thức giao hàng</h2>
                    <label for="" class="label">Phương thức giao hàng</label>
                    <select class="select input-bordered w-full focus:outline-none" data-name="phương thức giao hàng" name="shipping_method">
                        <option value="" selected>Chọn phương thức giao hàng</option>
                        <?php foreach (get_all_shipping_methods() as $method) : extract($method) ?>
                            <option value=<?= $id ?> data-cash=<?= $cost ?>><?php echo "{$name} - {$cost}₫" ?></option>
                        <?php endforeach; ?>
                    </select>
                    <small class="text-base text-error error-message font-semibold"></small>
                </div>
                <div class="form-group my-10 flex justify-center items-center">
                    <button type="submit" name="checkout" id="place-order" class="btn btn-wide btn-lg hover:btn-primary">Đặt hàng</button>
                </div>
            </div>
        </form>

    </main>
    <?php include_once 'site/components/footer.php'; ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/common.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/handle-post-request.js"></script>
    <script type="text/javascript">
        const cartItems = JSON.parse(localStorage.getItem("cart"));
        if (cartItems.length == 0) {
            showMessage(alert.error.style, alert.error.icon, "Bạn chưa có sản phẩm nào trong giỏ hàng!")
            window.location = "?page=product";
        }
    </script>
</body>

</html>
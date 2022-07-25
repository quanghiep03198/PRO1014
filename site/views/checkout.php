<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đặt hàng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="styles/main.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script> -->
</head>

<body>
    <?php include_once 'site/components/header.php';  ?>
    <main>
        <div class="bg-[#EDEDED] sm:py-0 lg:py-10">
            <div class="container mx-auto bg-white sm:p-3 lg:p-10">
                <form action="?page=payment" method="POST" id="check-out__form">
                    <div class="grid sm:grid-cols-1 lg:grid-cols-2 gap-10">
                        <!-- form left -->
                        <div>
                            <h2 class="text-3xl font-semibold text-blue-500 mb-5">1. Thông tin nhận hàng</h2>
                            <div class="flex flex-col gap-5">
                                <div class="form-group">
                                    <label for="" class="label">Họ tên</label>
                                    <input type="text" name="customer_name" data-name="tên" class="input input-bordered w-full focus:outline-none">
                                    <small class="text-base text-error error-message font-semibold"></small>
                                </div>
                                <div class="form-group">
                                    <label for="" class="label">Số điện thoại</label>
                                    <input type="text" name="phone" data-name="số điện thoại" class="input input-bordered w-full focus:outline-none">
                                    <small class="text-base text-error error-message font-semibold"></small>
                                </div>
                                <div class="form-group">
                                    <label for="" class="label">Email</label>
                                    <input type="email" name="email" data-name="email" class="input input-bordered w-full focus:outline-none">
                                    <small class="text-base text-error error-message font-semibold"></small>
                                </div>
                                <div class="form-group">
                                    <label for="" class="label">Địa chỉ</label>
                                    <input type="text" name="address" data-name="địa chỉ" class="input input-bordered w-full focus:outline-none">
                                    <small class="text-base text-error error-message font-semibold"></small>
                                </div>
                            </div>
                        </div>
                        <!-- form right -->
                        <div class="flex flex-col justify-between">
                            <div class="form-group">
                                <h2 class="text-3xl font-semibold text-blue-500 mb-5">2. Phương thức giao hàng</h2>
                                <label for="" class="label">Phương thức giao hàng</label>
                                <select class="select input-bordered w-full focus:outline-none" data-name="phương thức giao hàng" name="shipping_method">
                                    <option value="" selected>Chọn phương thức giao hàng</option>
                                    <?php foreach (get_all_shipping_methods() as $method) : extract($method) ?>
                                        <option value=<?= $cost ?>><?php echo "{$name} - {$cost}₫" ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-base text-error error-message font-semibold"></small>

                            </div>
                            <div class="form-group">
                                <h2 class="text-3xl font-semibold text-blue-500 mb-5">3. Phương thức thanh toán</h2>
                                <label for="" class="label">Phương thức thanh toán</label>
                                <select class="select input-bordered w-full focus:outline-none" data-name="phương thức thanh toán" name="payment_method">
                                    <option value="" selected>Chọn phương thức giao hàng</option>
                                    <?php foreach (get_all_payment_method() as $method) : extract($method) ?>
                                        <option value=<?= $id ?>><?= $name ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-base text-error error-message font-semibold"></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group my-10">
                        <input type="hidden" name="total_amount">
                        <button type="submit" name="checkout" class="btn btn-wide">Xác nhận đơn hàng</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include_once 'site/components/footer.php'; ?>
    <script type="text/javascript" src="site/js/validate.js"></script>
    <script type="text/javascript" src="site/js/checkout.js"></script>
</body>

</html>
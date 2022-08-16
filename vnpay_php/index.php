<?php
include_once "../lib/db_execute.php";
include_once "../site/models/order.php";
include_once "../site/models/user.php";


$order_key_id = strtoupper(substr(md5(rand(0, 9999)), 0, 8));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tạo mới đơn hàng</title>

    <link rel="stylesheet" href="../styles/main.css">
    <script src="/vnpay_php/assets/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
    <?php require_once("./config.php"); ?>
    <div class="max-w-5xl mx-auto">
        <h3 class="text-3xl font-semibold my-5">Tạo mới đơn hàng</h3>
        <div class="table-responsive">
            <form action="/vnpay_php/vnpay_create_payment.php" id="create_form" method="post" onsubmit="createPayment(event)">

                <!-- order summary -->
                <input type="hidden" name="order_type" value="billpayment">
                <input type="hidden" class="input input-bordered" id="txtexpire" name="txtexpire" type="text" value=<?= $expire; ?> />

                <div class="form-control gap-5">
                    <div class="form-control gap-1">
                        <label for="order_id">Mã hóa đơn</label>
                        <input class="input input-bordered" id="order_id" name="order_id" type="text" value="<?php echo $order_key_id ?>" />
                    </div>
                    <div class="form-control gap-1">
                        <label for="amount">Số tiền</label>
                        <input class="input input-bordered" id="amount" name="amount" type="number" />
                    </div>
                    <div class="form-control gap-1">
                        <label for="order_desc">Nội dung thanh toán</label>
                        <textarea class="input input-bordered" cols="20" id="order_desc" name="order_desc" rows="2"></textarea>

                    </div>
                    <div class="form-control gap-1">
                        <label for="bank_code">Ngân hàng</label>
                        <select name="bank_code" id="bank_code" data-name="ngân hàng" class="select select-bordered">
                            <option value="">Không chọn</option>
                            <option value="NCB" selected> Ngan hang NCB</option>
                            <option value="AGRIBANK"> Ngan hang Agribank</option>
                            <option value="SCB"> Ngan hang SCB</option>
                            <option value="SACOMBANK">Ngan hang SacomBank</option>
                            <option value="EXIMBANK"> Ngan hang EximBank</option>
                            <option value="MSBANK"> Ngan hang MSBANK</option>
                            <option value="NAMABANK"> Ngan hang NamABank</option>
                            <option value="VNMART"> Vi dien tu VnMart</option>
                            <option value="VIETINBANK">Ngan hang Vietinbank</option>
                            <option value="VIETCOMBANK"> Ngan hang VCB</option>
                            <option value="HDBANK">Ngan hang HDBank</option>
                            <option value="DONGABANK"> Ngan hang Dong A</option>
                            <option value="TPBANK"> Ngân hàng TPBank</option>
                            <option value="OJB"> Ngân hàng OceanBank</option>
                            <option value="BIDV"> Ngân hàng BIDV</option>
                            <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                            <option value="VPBANK"> Ngan hang VPBank</option>
                            <option value="MBBANK"> Ngan hang MBBank</option>
                            <option value="ACB"> Ngan hang ACB</option>
                            <option value="OCB"> Ngan hang OCB</option>
                            <option value="IVB"> Ngan hang IVB</option>
                            <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                        </select>
                        <small class="text-base text-error error-message font-semibold"></small>

                    </div>
                    <input type="hidden" name="language" id="language" value="vn">
                </div>

                <!-- Thông tin giao hàng -->
                <div class="form-control gap-5">
                    <div class="form-control gap-1">
                        <h3 class="text-3xl font-semibold my-5">Thông tin giao hàng</h3>
                    </div>

                    <?php
                    if (isset($_COOKIE['auth'])) :
                        $auth = get_user_data($_COOKIE['auth']);
                        extract($auth);

                    endif;
                    ?>
                    <div class="form-control gap-1">
                        <label>Họ tên (*)</label>
                        <input class="input input-bordered" id="txt_ship_fullname" value="<?php echo isset($_COOKIE['auth']) ? $name : "" ?>" data-name="tên của bạn" name="txt_ship_fullname" type="text" />
                        <small class="text-base text-error error-message font-semibold"></small>

                    </div>
                    <div class="form-control gap-1">
                        <label>Email (*)</label>
                        <input class="input input-bordered" id="txt_ship_email" data-name="email" value="<?php echo isset($_COOKIE['auth']) ? $email : "" ?>" name="txt_ship_email" type="text" />
                        <small class="text-base text-error error-message font-semibold"></small>

                    </div>
                    <div class="form-control gap-1">
                        <label>Số điện thoại (*)</label>
                        <input class="input input-bordered" id="txt_ship_mobile" value="<?php echo isset($_COOKIE['auth']) ? $phone : "" ?>" data-name="số điện thoại" name="txt_ship_mobile" type="text" />
                        <small class="text-base text-error error-message font-semibold"></small>

                    </div>
                    <div class="form-control gap-1">
                        <label>Địa chỉ (*)</label>
                        <input class="input input-bordered" id="txt_ship_addr1" value="<?php echo isset($_COOKIE['auth']) ? $address : "" ?>" data-name="địa chỉ" name="txt_ship_addr1" type="text" />
                        <small class="text-base text-error error-message font-semibold"></small>

                    </div>
                    <div class="form-control gap-1">
                        <label for="" class="label">Phương thức giao hàng</label>
                        <select class="select input-bordered w-full focus:outline-none" id="shipping_method" data-name="phương thức giao hàng" name="shipping_method" onchange="getTotalAmount(this)">
                            <option value="" selected>Chọn phương thức giao hàng</option>
                            <?php foreach (get_all_shipping_methods() as $method) : extract($method) ?>
                                <option value=<?= $id ?> data-cash=<?= $cost ?>> <?php echo "{$name} - {$cost}₫" ?></option>
                            <?php endforeach; ?>
                        </select>
                        <small class="text-base text-error error-message font-semibold"></small>
                    </div>
                    <div class="form-control gap-1">
                        <label for="">Ghi chú</label>
                        <input type="text" class="input input-bordered" name="order_notice">
                    </div>
                    <!-- submit payment method -->
                    <div class="my-10">
                        <button type="submit" class="btn btn-primary" id="btnPopup">Thanh toán Post</button>
                        <button type="submit" name="redirect" id="redirect" class="btn btn-default">Thanh toán Redirect</button>
                    </div>

            </form>
        </div>
        <p>
            &nbsp;
        </p>
        <footer class="footer">
            <p>&copy; VNPAY <?php echo date('Y') ?></p>
        </footer>
    </div>
    <script src="../js/common.js"></script>
    <script src="../js/validate.js"></script>
    <script>
        // check giỏ hàng có sản phẩm không, nếu không -> bắn về trang sản phẩm
        const cartItems = JSON.parse(localStorage.getItem("cart"));
        if (cartItems.length == 0) {
            window.location = "?page=product";
        }

        //  tổng tiền tạm tính
        const tempAmount = cartItems.reduce((firstValue, currentValue) => {
            return firstValue + currentValue.total
        }, 0)
        console.log(tempAmount);
        const totalAmount = $("#amount")

        // tính phí ship        
        let shippingCost = 0
        const getTotalAmount = (select) => {
            const options = select.querySelectorAll("option")
            options.forEach(opt => {
                if (opt.selected == true) {
                    shippingCost = +opt.dataset.cash
                    totalAmount.value = +tempAmount + +shippingCost;
                    console.log(totalAmount.value);
                }
            })
        }
        totalAmount.value = +tempAmount + shippingCost;
        const createPayment = (event) => {
            const form = event.target

            const bankCode = form["bank_code"];
            const orderId = form["order_id"];
            const customerName = form["txt_ship_fullname"];
            const email = form["txt_ship_email"];
            const address = form["txt_ship_addr1"];
            const phone = form["txt_ship_mobile"];
            const shippingMethod = form["shipping_method"];
            const orderDesc = form["order_desc"]
            const cartItems = localStorage.getItem("cart");
            const orderNotice = form["order_notice"];

            if (areRequired(bankCode, customerName, email, address, phone, shippingMethod) == false)
                event.preventDefault();
            if (isEmail(email) == false)
                event.preventDefault();
            if (isPhoneNumber(phone) == false)
                event.preventDefault();

            const bill = {
                order_key_id: orderId.value,
                customer_name: customerName.value,
                email: email.value,
                address: address.value,
                phone: phone.value,
                shipping_method: shippingMethod.value,
                order_notice: orderNotice.value,
                payment: 2,
                cart_items: cartItems
            }
            if (shippingMethod.value == 0)
                bill.order_stt = 3
            else bill.order_stt = 5
            localStorage.setItem("bill", JSON.stringify(bill))
        }
    </script>


</body>

</html>
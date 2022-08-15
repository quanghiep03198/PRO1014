<?php
$order_key_id = substr(md5(rand(0, 9999)), 0, 8);
$total_amount


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
</head>

<body>
    <?php require_once("./config.php"); ?>
    <div class="max-w-5xl mx-auto">
        <h3 class="text-3xl font-semibold my-5">Tạo mới đơn hàng</h3>
        <div class="table-responsive">
            <form action="/vnpay_php/vnpay_create_payment.php" id="create_form" method="post">

                <!-- hidden -->
                <div class="hidden">
                    <label for="language">Loại hàng hóa </label>
                    <select name="order_type" id="order_type" class="input input-bordered">
                        <option value="topup">Nạp tiền điện thoại</option>
                        <option value="billpayment" selected>Thanh toán hóa đơn</option>
                        <option value="fashion">Thời trang</option>
                        <option value="other">Khác - Xem thêm tại VNPAY</option>
                    </select>
                </div>
                <!-- hidden -->

                <div class="form-control gap-5">
                    <div class="form-control gap-2">
                        <label for="order_id">Mã hóa đơn</label>
                        <input class="input input-bordered" id="order_id" name="order_id" type="text" value="<?php echo date("YmdHis") ?>" />
                    </div>
                    <div class="form-control gap-2">
                        <label for="amount">Số tiền</label>
                        <input class="input input-bordered" id="amount" name="amount" type="number" value="10000" />
                    </div>
                    <div class="form-control gap-2">
                        <label for="order_desc">Nội dung thanh toán</label>
                        <textarea class="input input-bordered" cols="20" id="order_desc" name="order_desc" rows="2"></textarea>
                    </div>
                    <div class="form-control gap-2">
                        <label for="bank_code">Ngân hàng</label>
                        <select name="bank_code" id="bank_code" class="select select-bordered">
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
                    </div>
                </div>

                <!-- hidden -->
                <div class="hidden">
                    <label for="language">Ngôn ngữ</label>
                    <select name="language" id="language" class="input input-bordered">
                        <option value="vn">Tiếng Việt</option>
                        <option value="en">English</option>
                    </select>
                </div>
                <div class="hidden">
                    <label>Thời hạn thanh toán</label>
                    <input class="input input-bordered" id="txtexpire" name="txtexpire" type="text" value="<?php echo $expire; ?>" />
                </div>

                <!-- hidden -->
                <!-- bill -->

                <div class="flex flex-col gap-3">
                    <h3>Thông tin hóa đơn (Billing)</h3>
                </div>
                <div class="flex flex-col gap-3">
                    <label>Họ tên (*)</label>
                    <input class="input input-bordered" id="txt_billing_fullname" name="txt_billing_fullname" type="text" />
                </div>
                <div class="flex flex-col gap-3">
                    <label>Email (*)</label>
                    <input class="input input-bordered" id="txt_billing_email" name="txt_billing_email" type="text" value="xonv@vnpay.vn" />
                </div>
                <div class="flex flex-col gap-3">
                    <label>Số điện thoại (*)</label>
                    <input class="input input-bordered" id="txt_billing_mobile" name="txt_billing_mobile" type="text" value="0934998386" />
                </div>
                <div class="flex flex-col gap-3">
                    <label>Địa chỉ (*)</label>
                    <input class="input input-bordered" id="txt_billing_addr1" name="txt_billing_addr1" type="text" value="22 Lang Ha" />
                </div>




                <div class="hidden">
                    <div class="flex flex-col gap-3 ">
                        <label>Mã bưu điện (*)</label>
                        <input class="input input-bordered" id="txt_postalcode" name="txt_postalcode" type="text" value="100000" />
                    </div>
                    <div class="flex flex-col gap-3 ">
                        <label>Tỉnh/TP (*)</label>
                        <input class="input input-bordered" id="txt_bill_city" name="txt_bill_city" type="text" value="Hà Nội" />
                    </div>
                    <div class="flex flex-col gap-3 ">
                        <label>Bang (Áp dụng cho US,CA)</label>
                        <input class="input input-bordered" id="txt_bill_state" name="txt_bill_state" type="text" value="" />
                    </div>
                    <div class="flex flex-col gap-3">
                        <label>Quốc gia (*)</label>
                        <input class="input input-bordered" id="txt_bill_country" name="txt_bill_country" type="text" value="VN" />
                    </div>
                </div>


                <!-- Thông tin giao hàng -->
                <div class="form-control gap-5">
                    <div class="form-control gap-2">
                        <h3 class="text-3xl font-semibold my-5">Thông tin giao hàng</h3>
                    </div>
                    <div class="form-control gap-2">
                        <label>Họ tên (*)</label>
                        <input class="input input-bordered" id="txt_ship_fullname" name="txt_ship_fullname" type="text" />
                    </div>
                    <div class="form-control gap-2">
                        <label>Email (*)</label>
                        <input class="input input-bordered" id="txt_ship_email" name="txt_ship_email" type="text" />
                    </div>
                    <div class="form-control gap-2">
                        <label>Số điện thoại (*)</label>
                        <input class="input input-bordered" id="txt_ship_mobile" name="txt_ship_mobile" type="text" />
                    </div>
                    <div class="form-control gap-2">
                        <label>Địa chỉ (*)</label>
                        <input class="input input-bordered" id="txt_ship_addr1" name="txt_ship_addr1" type="text" />
                    </div>
                </div>


                <!-- hidden -->
                <div class="hidden">
                    <div class="flex flex-col gap-3">
                        <label>Mã bưu điện (*)</label>
                        <input class="input input-bordered" id="txt_ship_postalcode" name="txt_ship_postalcode" type="text" value="1000000" />
                    </div>
                    <div class="flex flex-col gap-3">
                        <label>Tỉnh/TP (*)</label>
                        <input class="input input-bordered" id="txt_ship_city" name="txt_ship_city" type="text" value="Hà Nội" />
                    </div>
                    <div class="flex flex-col gap-3">
                        <label>Bang (Áp dụng cho US,CA)</label>
                        <input class="input input-bordered" id="txt_ship_state" name="txt_ship_state" type="text" value="" />
                    </div>
                    <div class="flex flex-col gap-3">
                        <label>Quốc gia (*)</label>
                        <input class="input input-bordered" id="txt_ship_country" name="txt_ship_country" type="text" value="VN" />
                    </div>
                    <div class="flex flex-col gap-3">
                        <h3>Thông tin gửi Hóa đơn điện tử (Invoice)</h3>
                    </div>
                    <div class="flex flex-col gap-3">
                        <label>Tên khách hàng</label>
                        <input class="input input-bordered" id="txt_inv_customer" name="txt_inv_customer" type="text" value="Lê Văn Phổ" />
                    </div>
                    <div class="flex flex-col gap-3">
                        <label>Công ty</label>
                        <input class="input input-bordered" id="txt_inv_company" name="txt_inv_company" type="text" value="Công ty Cổ phần giải pháp Thanh toán Việt Nam" />
                    </div>
                    <div class="flex flex-col gap-3">
                        <label>Địa chỉ</label>
                        <input class="input input-bordered" id="txt_inv_addr1" name="txt_inv_addr1" type="text" value="22 Láng Hạ, Phường Láng Hạ, Quận Đống Đa, TP Hà Nội" />
                    </div>
                    <div class="flex flex-col gap-3">
                        <label>Mã số thuế</label>
                        <input class="input input-bordered" id="txt_inv_taxcode" name="txt_inv_taxcode" type="text" value="0102182292" />
                    </div>
                    <div class="flex flex-col gap-3">
                        <label>Loại hóa đơn</label>
                        <select name="cbo_inv_type" id="cbo_inv_type" class="input input-bordered">
                            <option value="I">Cá Nhân</option>
                            <option value="O">Công ty/Tổ chức</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-3">
                        <label>Email</label>
                        <input class="input input-bordered" id="txt_inv_email" name="txt_inv_email" type="text" value="pholv@vnpay.vn" />
                    </div>
                    <div class="flex flex-col gap-3">
                        <label>Điện thoại</label>
                        <input class="input input-bordered" id="txt_inv_mobile" name="txt_inv_mobile" type="text" value="02437764668" />
                    </div>
                </div>
                <!-- hidden -->

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

    <script type="text/javascript">
        const cartItems = JSON.parse(localStorage.getItem("cart"));
        if (cartItems.length == 0) {
            window.location = "?page=product";
        }
    </script>


</body>

</html>
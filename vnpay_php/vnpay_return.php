<?php
include_once "../lib/db_execute.php";
include_once "../lib/send_mail.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>VNPAY RESPONSE</title>
    <!-- Bootstrap core CSS -->
    <link href="/vnpay_php/assets/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="/vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">
    <script src="/vnpay_php/assets/jquery-1.11.3.min.js"></script>
</head>

<body>
    <?php
    require_once("./config.php");
    $vnp_SecureHash = $_GET['vnp_SecureHash'];
    $inputData = array();
    foreach ($_GET as $key => $value) {
        if (substr($key, 0, 4) == "vnp_") {
            $inputData[$key] = $value;
        }
    }

    unset($inputData['vnp_SecureHash']);
    ksort($inputData);
    $i = 0;
    $hashData = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
    }

    $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
    ?>
    <!--Begin display -->
    <div class="container">
        <div class="header clearfix">
            <h3 class="text-muted">VNPAY RESPONSE</h3>
        </div>
        <div class="table-responsive">
            <div class="form-group">
                <label>Mã đơn hàng:</label>
                <label><?php echo $_GET['vnp_TxnRef'] ?></label>
            </div>
            <div class="form-group">
                <label>Số tiền:</label>
                <label><?php echo $_GET['vnp_Amount'] ?></label>
            </div>
            <div class="form-group">
                <label>Nội dung thanh toán:</label>
                <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
            </div>
            <div class="form-group">
                <label>Mã phản hồi (vnp_ResponseCode):</label>
                <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
            </div>
            <div class="form-group">
                <label>Mã GD Tại VNPAY:</label>
                <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
            </div>
            <div class="form-group">
                <label>Mã Ngân hàng:</label>
                <label><?php echo $_GET['vnp_BankCode'] ?></label>
            </div>
            <div class="form-group">
                <label>Thời gian thanh toán:</label>
                <label><?php echo $_GET['vnp_PayDate'] ?></label>
            </div>
            <div class="form-group">
                <label>Kết quả:</label>
                <label>
                    <?php
                    if ($secureHash == $vnp_SecureHash) {
                        if ($_GET['vnp_ResponseCode'] == '00') {
                            echo "<span style='color:blue'>GD thanh cong</span>";
                        } else {
                            echo "<span style='color:red'>GD khong thanh cong</span>";
                        }
                    } else {
                        echo "<span style='color:red'>Chu ky khong hop le</span>";
                    }
                    ?>

                </label>
            </div>
        </div>
        <a href="../index.php">Quay về trang chủ</a>
        <p>
            &nbsp;
        </p>
        <footer class="footer">
            <p>&copy; VNPAY <?php echo date('Y') ?></p>
        </footer>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/common.js"></script>
    <script>
        if (localStorage.getItem("cart") == null || localStorage.getItem("bill") == null)
            window.location = "../?page=home";

        const place_order = async () => {
            // lấy thông tin mua hàng từ localstorage
            const orderDetails = JSON.parse(localStorage.getItem("bill"))
            console.log("thông tin hóa đơn: ", orderDetails);
            Swal.fire({
                title: "Đang xử lý đơn hàng!",
                html: "Vui lòng chờ trong giây lát ...",
                allowEscapeKey: false,
                showConfirmButton: false,
                showLoaderOnConfirm: true,
                willOpen: () => {
                    Swal.showLoading();
                },
            });
            const response = await sendRequest("../site/controllers/place_order.php", orderDetails)
            console.log(response);

            await Swal.fire({
                title: "Đặt hàng thành công!",
                icon: "success",
                button: true,
            }).then(() => {
                window.location = "../index.php";
            });

            // reset số lượng sản phẩm trong giỏ hàng + thông tin đặt hàng
            await localStorage.clear()
            return JSON.parse(response)
        };
        <?php
        // nếu trạng thái giao dịch thành công -> request insert đơn hàng vào database
        if ($secureHash == $vnp_SecureHash) :
            if ($_GET['vnp_ResponseCode'] == '00') {
        ?>
                    (async function() {
                        try {
                            // submit đơn hàng
                            const response = await place_order();
                            console.log(response);
                            // lấy thông tin giao dịch
                            const params = new URLSearchParams(window.location.search)
                            const transaction = {}
                            params.forEach((value, key) => {
                                transaction[key] = value
                            })
                            if (response.hasOwnProperty("order_id")) {
                                transaction.order_id = response.order_id;
                                await sendRequest("../site/controllers/create_transaction.php", transaction);
                            }
                        } catch (error) {
                            console.log(error);
                        }
                    })()
        <?php

            } else
                echo "<script>alert(`Giao dịch không thành công`)</script>";
        endif;
        ?>
    </script>
</body>

</html>
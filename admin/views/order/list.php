<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/styles/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="flex items-stretch">

        <!-- import sidebar from component  -->
        <?php include_once "/xampp/htdocs/PRO1014/admin/components/sidebar.php" ?>
        <!-- sidebar  end -->
        <section class="w-full">
            <div class="bg-primary px-12 py-8 flex justify-between items-center mb-10">
                <h1 class="text-3xl text-white">Danh sách đơn hàng</h1>

            </div>

            <div class="container mx-auto">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Mã đơn hàng</th>
                            <th>Người đặt hàng</th>
                            <th>Ngày đặt hàng</th>
                            <th>Thanh toán</th>
                            <th>Địa chỉ giao hàng</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái đơn hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (get_all_orders() as $order) : extract($order) ?>
                            <tr>
                                <td><a href=<?php echo "?page=order-read&id={$id}" ?>><i class="bi bi-box-arrow-in-up-left"></i></a></td>
                                <td><span class="text-lg"><?= $order_key_id ?></span></td>
                                <td><span class="text-lg"><?= $user_name ?></span></td>
                                <td><span class="text-lg"><?= $create_date ?></span></td>
                                <td><span class="text-lg"><?= $payment_method ?></span></td>
                                <td><span class="w-[100px] text-lg truncate"><?= $shipping_address ?></span></td>
                                <td><span class="text-lg"><?= $total_amount . "₫" ?></span></td>
                                <td data-status=<?= $stt_id ?> class="order-stt">
                                    <span><?= $stt_icon ?></span>
                                    <span class="indent-2"><?= $stt_name ?></span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
    <script src="js/common.js"></script>
</body>

</html>
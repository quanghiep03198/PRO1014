<?php
if (isset($_GET['id'])) :
    $order_items = get_all_order_items($_GET['id']);

    // print_r($order_items);
    $order_summary = get_order_details($_GET['id']);
endif;
?>
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
        <section class="w-full min-h-screen">
            <div class="bg-primary px-12 py-8 flex justify-between items-center">
                <div>
                    <h1 class="text-3xl text-white">Đơn hàng: <?php echo $order_summary["order_key_id"] ?></h1>
                    <span class="text-zinc-300">Ngày đặt hàng: <?php echo $order_summary["create_date"] ?></span>
                </div>
                <form action="./admin/controllers/order.php" method="POST">
                    <input type="hidden" name="order_id" value=<?= $_GET['id'] ?>>

                    <?php if (!in_array($order_summary["order_stt_id"], [3, 4])) : ?>
                        <label for="" class="text-xl text-white">Trạng thái: </label>
                        <select name="order_status" id="" class="select select-bordered">
                            <option value="">Chọn</option>
                            <?php foreach (get_all_order_stt() as $stt) : extract($stt);
                                if ($id == 1) continue ?>
                                <option value=<?php echo $id ?>> <?= $stt_name ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button class="btn" name="update_order_stt">Xác nhận</button>
                    <?php endif; ?>
                </form>
            </div>

            <div class="max-w-full h-screen mx-auto bg-gray-300 grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 sm:p-0 md:p-5 lg:p-10 gap-10">
                <div class="flex flex-col justify-between items-stretch gap-10 h-full">
                    <!-- order items -->
                    <div class="bg-white rounded-box shadow-2xl p-5">
                        <h1 class="text-2xl font-medium">Sản phẩm đã đặt</h1>
                        <div class="w-full h-60 overflow-y-auto ">
                            <table class="table w-full">
                                <?php foreach (get_all_order_items($_GET['id']) as $item) : extract($item) ?>
                                    <tr class="items-stretch">
                                        <td>
                                            <div class="flex items-stretch gap-3">
                                                <img src=<?= ROOT_PRODUCT . $image ?> alt="" class="w-20 h-20 object-contain">
                                                <div class="flex flex-col justify-center gap-2">
                                                    <span class="text-lg font-medium"><?= $prod_name ?></span>
                                                    <span class="text-lg font-medium text-primary"><?= $unit_price . "₫" ?></span>
                                                </div>
                                            </div>
                                            <span class="text-zinc-500">Bảo hành đến: <?php echo $warranty_expired_date ?></span>
                                        </td>
                                        <td>
                                            <div class="flex flex-col justify-start gap-2 h-full">
                                                <span class="text-lg">Số lượng: <?= $quantity ?></span>
                                                <span class="text-lg font-medium"><?= $total . "₫" ?></span>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                    <!-- order summary -->
                    <div class="bg-white rounded-box shadow-2xl p-5">
                        <table class="table w-full mb-5">
                            <tr>
                                <td>Tạm tính</td>
                                <td><?= $order_summary["temp_amount"] . "₫" ?></td>
                            </tr>
                            <tr>
                                <td>Phí ship</td>
                                <td><?= $order_summary["cost"] . "₫" ?></td>
                            </tr>
                            <tr>
                                <th><span class="text-xl font-medium">Tổng tiền</span></th>
                                <th><span class="text-xl font-medium"><?= $order_summary["total_amount"] . "₫" ?></span></th>
                            </tr>
                        </table>
                        <p><span class="text-error">Ghi chú: </span><?php echo $order_summary["order_notice"] ?></p>
                    </div>
                </div>
                <!-- order details -->
                <div class="bg-white p-5 rounded-box shadow-2xl w-ful">
                    <h1 class="text-2xl font-medium">Thông tin đơn hàng</h1>
                    <?php if (!empty($order_summary)) : ?>
                        <table class="table w-full">
                            <tr>
                                <td class="flex items-center gap-2 text-zinc-500">
                                    <i class="bi bi-person"></i>
                                    <span class="indent-2">Khách hàng</span>
                                </td>
                                <td><?= $order_summary["user_name"] ?></td>
                            </tr>
                            <tr>
                                <td class="flex items-center gap-2 text-zinc-500">
                                    <i class="bi bi-envelope"></i>
                                    <span class="indent-2">Email</span>
                                </td>
                                <td><?= $order_summary["email"] ?></td>
                            </tr>
                            <tr>
                                <td class="flex items-center gap-2 text-zinc-500">
                                    <i class="bi bi-geo-alt"></i>
                                    <span class="indent-2">Địa chỉ giao hàng</span>
                                </td>
                                <td><?= $order_summary["shipping_address"] ?></td>
                            </tr>
                            <tr>
                                <td class="flex items-center gap-2 text-zinc-500">
                                    <i class="bi bi-truck"></i>
                                    <span class="indent-2">Hình thức giao hàng</span>
                                </td>
                                <td><?= $order_summary["shipping_method"] ?></td>
                            </tr>
                            <tr>
                                <td class="flex items-center gap-2 text-zinc-500">
                                    <i class="bi bi-credit-card"></i>
                                    <span class="indent-2">Hình thức thanh toán</span>
                                </td>
                                <td><?= $order_summary["payment_method"] ?></td>
                            </tr>
                            <tr>
                                <td class="flex items-center gap-2 text-zinc-500">
                                    <i class="bi bi-activity"></i>
                                    <span class="indent-2">Trạng thái đơn hàng</span>
                                </td>
                                <td>
                                    <?php echo $order_summary["stt_icon"] ?>
                                    <span><?= $order_summary["stt_name"] ?></span>
                                </td>
                            </tr>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <script src="js/common.js"></script>
</body>

</html>
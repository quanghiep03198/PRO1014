<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Đơn hàng - " ?></title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
    <!-- import header component -->
    <?php include_once "site/components/header.php" ?>

    <main class="w-full bg-slate-200 py-[50px]">
        <div class="grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-[1fr,2fr] items-stretch gap-5 px-10">
            <!-- import sidebar component -->
            <?php include_once "site/components/account-sidebar.php" ?>
            <div class="p-5 bg-white rounded-box shadow-2xl">
                <h1 class="text-2xl font-semibold mb-5">Sản phẩm đã đặt</h1>
                <!-- order items list -->
                <div class="flex flex-col items-stretch gap-5 border-b border-zinc-500 mb-10">
                    <?php if (isset($_GET['id'])) :
                        foreach (get_all_order_items($_GET['id']) as $item) : extract($item) ?>
                            <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 w-full">
                                <!-- col-left -->
                                <div class="flex items-center gap-4">
                                    <img src=<?php echo ROOT_PRODUCT . $image ?> alt="" class="w-[100px] h-[100px] object-contain">
                                    <div class="flex flex-col gap-3">
                                        <span class="text-xl font-semibold"><?= $product_name ?></span>
                                        <span class="text-blue-500 font-semibold"><?= $unit_price . "₫" ?></span>
                                    </div>
                                </div>
                                <!-- col-right -->
                                <div class="flex flex-col justify-center  gap-3">
                                    <span>Số lượng: <?= $quantity ?></span>
                                    <span class="text-2xl font-semibold"><?= $total . "₫" ?></span>
                                </div>
                            </div>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>
                <!-- order summary -->
                <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 w-full mb-10">
                    <!-- order notice -->
                    <div>
                        <p>
                            <span class="text-error">Ghi chú:</span>
                            <span class="indent-2 italic"><?= $order_notice ?></span>
                        </p>
                    </div>
                    <div>
                        <table class="table w-full">
                            <tr>
                                <td><span class="text-blue-500 font-medium">Tạm tính</span> </td>
                                <td> <?= $temp_amount . "₫" ?></td>
                            </tr>
                            <tr>
                                <td class="text-blue-500 font-medium"><span></span> Phí ship</td>
                                <td> <?= $shipping_cost ?></td>
                            </tr>
                            <tr>
                                <th><span class="text-xl text-blue-500">Tổng tiền</span> </th>
                                <th><span class="text-xl"><?= $total_amount . "₫" ?></span></th>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- order information -->
                <div>
                    <?php
                    $order_summary = get_one_order_by_user($auth['id'], $_GET['id']);
                    extract($order_summary);

                    ?>
                    <table class="table w-full">
                        <tr>
                            <td>
                                <span class="text-zinc-400">
                                    <span><i class="bi bi-geo-alt text-2xl"></i></span>
                                    <span class="indent-3">Địa chỉ giao hàng</span>
                                </span>
                            </td>
                            <td><?= $shipping_address ?></td>
                        </tr>
                        <tr>
                            <td>
                                <span class="text-zinc-400">
                                    <span><i class="bi bi-truck text-2xl"></i></span>
                                    <span class="indent-3">Hình thức giao hàng</span>
                                </span>
                            </td>
                            <td><?= $shipping_method ?></td>
                        </tr>
                        <tr>
                            <td>
                                <span class="text-zinc-400">
                                    <span><i class="bi bi-credit-card text-2xl"></i></span>
                                    <span class="indent-3">Hình thức thanh toán</span>
                                </span>
                            </td>
                            <td><?= $payment_method ?></td>
                        </tr>
                        <tr>
                            <td>
                                <span class="text-zinc-400">
                                    <span><i class="bi bi-activity text-2xl"></i></span>
                                    <span class="indent-3">Trạng thái đơn hàng</span>
                                </span>
                            </td>
                            <td><?= $order_status ?></td>
                        </tr>
                    </table>
                </div>
            </div>

    </main>
    <!-- import footer component -->
    <?php include_once "site/components/footer.php" ?>
    <script src="site/js/handle-userdata.js"></script>
    <script src="site/js/handle-post-request.js"></script>
</body>

</html>
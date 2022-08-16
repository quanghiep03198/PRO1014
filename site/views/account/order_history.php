<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng của bạn</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>
    <!-- import header component -->
    <?php include_once "site/components/header.php" ?>

    <main class="w-full bg-slate-200 py-[50px]">
        <div class="grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-[1fr,2fr] items-stretch gap-5 px-10">
            <!-- import sidebar component -->
            <?php include_once "site/components/account-sidebar.php" ?>
            <div class=" bg-white rounded-box shadow-2xl p-5">
                <!-- user's order interface top -->
                <div class="flex justify-between items-center mb-10">
                    <h1 class="text-3xl font-medium">Đơn hàng của bạn</h1>
                    <select name="" id="" class="select select-lg select-bordered" onchange="filterOrder(this)">
                        <?php foreach (get_all_order_stt() as $stt) : extract($stt) ?>
                            <option value=<?php echo $id ?>> <span><?= $stt_name ?></span> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <!-- user's order interface main -->
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt hàng</th>
                            <th>Hình thức thanh toán</th>
                            <th>Tổng tiền</th>
                            <th>Tình trạng đơn hàng</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $user_orders = get_orders_group_by_user($auth['id']);
                        if (is_array($user_orders)) :
                            foreach ($user_orders as $order) : extract($order) ?>
                                <tr>
                                    <td><a href=<?php echo "?page=account-order_detail&id={$id}" ?> class="text-2xl text-zinc-400"><i class="bi bi-box-arrow-in-left"></i></a></td>
                                    <td><?php echo $order_key_id ?></td>
                                    <td><?php echo $create_date  ?></td>
                                    <td><?php echo $payment_method ?></td>
                                    <td><?php echo $total_amount  . "₫" ?></td>
                                    <td data-status="<?php echo $stt_id ?>" class="order-stt font-medium">
                                        <span><?= $stt_icon ?></span>
                                        <span class="indent-2"><?= $stt_name ?></span>
                                    </td>
                                    <td>
                                        <?php if ($stt_id == 1) : ?>
                                            <form action="" method="post" onsubmit="confirmCancelOrder(event)">
                                                <input type="hidden" name="order_id" value=<?= $id ?>>
                                                <button type="submit" name="cancel_order" class="btn btn-sm hover:btn-error !capitalize">
                                                    <i class="bi bi-x"></i>
                                                    <span class="indent-1">Hủy đơn</span>
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <!-- import footer component -->
    <?php include_once "site/components/footer.php" ?>
    <script src="js/common.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/handle-userdata.js"></script>
    <script src="js/handle-order.js"></script>
    <script>
        const ordersStatus = document.querySelectorAll(".order-stt")
        const defineStatus = (stt) => {
            if (stt.dataset.status == 1)
                stt.classList.add("text-warning")
            if (stt.dataset.status == 2)
                stt.classList.add("text-infor")
            if (stt.dataset.status == 3)
                stt.classList.add("text-success")
            if (stt.dataset.status == 4)
                stt.classList.add("text-error")
        }
        if (ordersStatus)
            ordersStatus.forEach(stt => defineStatus(stt))
        // lọc đơn hàng

        const filterOrder = (select) => {
            ordersStatus.forEach(stt => {
                stt.parentElement.classList.add("hidden");
                if (select.value != "" && stt.dataset.status == select.value)
                    stt.parentElement.classList.remove("hidden")
                if (select.value == "")
                    stt.parentElement.classList.remove("hidden");
            })
        }
    </script>
</body>

</html>
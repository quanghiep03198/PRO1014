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
            <!-- user's order interface top -->
            <div class="container mx-auto flex justify-between items-center mb-10">
                <h1 class="text-3xl font-medium">Đơn hàng của bạn</h1>
                <div class="flex items-end gap-5">
                    <select name="" id="" class="select select-bordered" onchange="filterOrder(this)">
                        <?php foreach (get_all_order_stt() as $stt) : extract($stt) ?>
                            <option value=<?php echo $id ?>> <span><?= $stt_name ?></span> </option>
                        <?php endforeach; ?>
                    </select>
                    <form action="" method="GET">
                        <div class="form-control">
                            <div class="input-group">
                                <input type="hidden" name="page" value="order-list">
                                <input type="text" placeholder="Tìm kiếm đơn hàng" class="input input-bordered" name="order_key_id" />
                                <button class="btn btn-square" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="container mx-auto min-h-screen">
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

                        <?php
                        if (!isset($_GET['order_key_id'])) :
                            foreach (get_all_orders() as $order) : extract($order) ?>
                                <tr class="order">
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
                            <?php
                            endforeach;
                        endif;
                        if (isset($_GET['order_key_id'])) :
                            $kw = $_GET['order_key_id'];
                            $order = get_order_by_kw($kw);
                            if (!empty($order)) {
                                extract($order);
                            ?>
                                <tr class="order">
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

                            <?php
                            } else echo '<tr>
                                            <td colspan=8 class="p-10 text-2xl text-error font-medium text-center">Không có kết quả hợp lệ!</td>
                                        </tr>';
                            ?>
                            <div class="my-10">
                                <a href="?page=order-list" class="btn btn-ghost">Quay lại</a>
                            </div>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div id="pagination" class=" btn-group center p-10"></div>

            </div>
        </section>
    </div>
    <script src="/js/common.js"></script>
    <script src="/js/pagination.js"></script>
    <script>
        const pagination = new Pagination({
            selector: ".order",
            perPage: 10,
            style: "table-row"
        })
        const {
            showPage
        } = pagination;
        showPage(1)
        const ordersStatus = document.querySelectorAll(".order-stt")
        const defineStatus = (stt) => {
            if (stt.dataset.status == 1)
                stt.classList.add("text-warning")
            if (stt.dataset.status == 2)
                stt.classList.add("text-secondary")
            if (stt.dataset.status == 3)
                stt.classList.add("text-success")
            if (stt.dataset.status == 4)
                stt.classList.add("text-error")
            if (stt.dataset.status == 5)
                stt.classList.add("text-info")
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
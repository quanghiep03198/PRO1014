<?php
if (isset($_POST['search_warranty']) && isset($_POST['order_key_id']) && isset($_POST['customer_infor'])) :
    $items = get_warranty_expired_date($_POST['customer_infor'], $_POST['order_key_id']);
    setcookie("order_items", json_encode($items), time() + 3000);
endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tra cứu bảo hành sản phẩm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/styles/main.css">
</head>

<body>
    <!-- import header component -->
    <?php include_once "site/components/header.php" ?>
    <main>
        <div class="container mx-auto">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Sản phẩm đã mua</th>
                        <th>Ngày đặt hàng</th>
                        <th>Ngày hết hạn bảo hành</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_COOKIE['order_items'])) :
                        $order_items = json_decode($_COOKIE['order_items']);

                        if (count($order_items) != 0) :
                            foreach ($order_items as $item) :  ?>
                                <tr>
                                    <td><?= $item->order_key_id ?></td>
                                    <td>
                                        <div class="flex items-center gap-4">
                                            <img src=<?php echo ROOT_PRODUCT . $item->image ?> class="w-20 h-20 object-contain" alt="">
                                            <div class="flex flex-col justify-center gap-5">
                                                <span class="text-xl"><?= $item->product_name ?></span>
                                                <span class="text-xl text-blue-500"><?= $item->unit_price ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?= $item->create_date ?></td>
                                    <td><?= $item->warranty_expire_date ?></td>
                                </tr>
                    <?php
                            endforeach;
                        endif;
                        if (count($order_items) == 0) :
                            echo '<tr><td colspan=4>
                        <span>Đơn hàng bạn tìm kiếm không tồn tại</span>
                        <span>Vui lòng kiêm tra lại email/số điện thoại đặt hàng và mã đơn hàng chúng tôi gửi trong mail</span>
                </td></tr>';
                        endif;
                    endif; ?>
                </tbody>
            </table>
        </div>
    </main>
    <!-- import footer from component -->
    <?php include_once "site/components/footer.php" ?>
    <script src="site/js/common.js"></script>
</body>

</html>
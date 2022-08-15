<?php
$wish_list_items = get_wishList_items();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách yêu thích</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
    <!-- import header component -->
    <?php include_once "site/components/header.php" ?>
    <!--  -->
    <main class="w-full bg-slate-200 py-[50px]">
        <div class="grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-[1fr,2fr] items-stretch gap-5 px-10">
            <?php include_once "site/components/account-sidebar.php" ?>
            <!-- main interface -->
            <div class="overflow-x-auto bg-white rounded-box shadow-2xl">
                <div class="max-h-[1024px] overflow-y-scroll hidden-scrollbar">
                    <table class="table w-full table-compact">
                        <!-- head -->

                        <thead class="sticky top-0 z-50">
                            <tr>
                                <th></th>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Kho hàng</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($wish_list_items) === 0)
                                echo '<tr><td colspan="5" class="text-2xl text-center py-10 text-zinc-400">Bạn chưa có sản phẩm yêu thích nào!</td></tr>'
                            ?>

                            <?php foreach ($wish_list_items as $item) : extract($item) ?>
                                <tr>
                                    <td>
                                        <form action="" method="POST" onsubmit="delWishlistItem(this,event)">
                                            <input type="hidden" name="product_id" value=<?= $product_id ?>>
                                            <input type="hidden" name="REQUEST" value="DELETE">
                                            <button type="submit" class="btn-square btn-lg text-2xl text-zinc-400 hover:text-error"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="flex items-center gap-2">
                                            <picture><img src=<?= ROOT_PRODUCT .  $image ?> alt="" class="max-w-[100px] h-[100px] object-contain"></picture>
                                            <div class="flex flex-col gap-2">
                                                <span class="text-lg font-semibold"><?= $product_name ?></span>
                                                <span><?= get_product_manufacturer($product_id) ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex flex-col gap-2">
                                            <?php if ($discount > 0) : ?>
                                                <span class="line-through text-zinc-400"><?= $price . "₫" ?></span>
                                            <?php endif; ?>
                                            <span class="text-lg font"><?= $discount_price . "₫" ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <?php echo $stock > 0 ? '<span class="text-success text-lg">Còn hàng</span>' : '<span class="text-error text-lg">Hết hàng</span>' ?></td>
                                    <td>
                                        <form action="?page=cart" method="POST">
                                            <input type='hidden' name='product_id' value=<?= $product_id ?>>
                                            <input type='hidden' name='product_name' value="<?php echo $product_name ?>">
                                            <input type='hidden' name='manu' value="<?php echo get_product_manufacturer($product_id) ?>">
                                            <input type='hidden' name='price' value=<?= $price ?>>
                                            <input type='hidden' name='product_img' value=<?= $image ?>>
                                            <input type='hidden' name='qty' value=1>
                                            <input type='hidden' name='warranty' value=<?= $warranty_time ?>>
                                            <input type='hidden' name='total' value=<?= $price * 1 ?>>
                                            <button type="submit" onclick="addCart(this)" class="btn btn-md hover:btn-primary">mua ngay</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <!-- import footer component -->
    <?php include_once "site/components/footer.php" ?>
    <!--  -->
    <script src="js/common.js"></script>
    <script src="js/handle-cart.js"></script>
    <script src="js/handle-userdata.js"></script>
    <script src="js/handle-wishlist.js"></script>

</body>

</html>
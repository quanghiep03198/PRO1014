<?php

if (!isset($_GET['man_id']))
    $products = get_all_products();
else
    $products = get_product_by_manu($_GET['man_id']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục sản phẩm</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="flex items-stretch">
        <!-- import sidebar component -->
        <?php include_once "./admin/components/sidebar.php" ?>
        <section class="w-full">
            <div class="bg-primary px-[50px] py-[30px] flex justify-between items-center">
                <h3 class="text-3xl text-white">Danh sách sản phẩm</h3>
                <div class="dropdown dropdown-end ">
                    <label tabindex="0" class="text-white text-xl"><i class="bi bi-list"></i></label>
                    <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a href="?page=product-list">Danh sách sản phẩm</a></li>
                        <li><a href="?page=categories-list">Danh mục sản phẩm</a></li>
                    </ul>
                </div>
            </div>
            <div class="container mx-auto">
                <div class="flex justify-between items-center">
                    <select name="" onchange="window.location = this.value" class="select select-bordered my-5">
                        <option value=<?php echo "admin.php?page=product-list" ?>>Tất cả sản phẩm</option>
                        <?php foreach (get_all_manufacturer() as $item) : extract($item) ?>
                            <option value=<?php echo "admin.php?page=product-list&man_id={$id}" ?> <?php if (isset($_GET['man_id']) && $_GET['man_id'] == $id) echo "selected" ?>><?= $name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <a href="?page=product-create" class="btn btn-ghost"><i class="bi bi-plus text-2xl"></i><span>Thêm mới</span></a>
                </div>

                <!-- product list -->
                <table class="table table-compact w-full">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Kho hàng</th>
                            <th>Giảm giá</th>
                            <th>Lượt mua</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- lấy ra tất cả -->
                        <?php
                        foreach ($products as $item) : extract($item) ?>
                            <tr>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <img src=<?= ROOT_PRODUCT . $image ?> alt="" style="width: 100px; height:100px; object-fit:contain">
                                        <div class="flex flex-col justify-center gap-3">
                                            <span class="text-xl font-medium"><?= $prod_name ?> </span>
                                            <span class="text-lg"><?= $price . "₫" ?> </span>
                                        </div>

                                    </div>
                                </td>
                                <td class="text-lg"><?= $stock ?></td>
                                <td class="text-lg"><?= $discount . "%" ?></td>
                                <td class="text-lg"><?= get_bought_counter($id)  ?></td>
                                <td class="text-lg">
                                    <a href=<?php echo "?page=product-update&id={$id}" ?> class="font-medium hover:text-primary hover:link">Sửa</a>/
                                    <a href=<?php echo "?page=product-delete&id={$id}" ?> class="font-medium hover:text-error hover:link" onclick="return confirm(`Bạn chắc chắn muốn xóa sản phẩm này?`)">Xóa</a>
                                </td>
                            </tr>
                        <?php
                        endforeach; ?>
                        <!--  -->
                    </tbody>
                </table>
            </div>
        </section>

    </div>
</body>

</html>
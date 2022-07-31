<?php

if (!isset($_GET['man_id']))
    $products = get_all_products();
else
    $products = get_product_by_manu($_GET['man_id']);

?>
<style>
    td {
        border: 1px solid black;
        padding: 20px;
    }
</style>
<div class="bg-[rgba(64, 124, 180, 1)] px-[50px] py-[30px] flex justify-between items-center">
    <h3 class="text-3xl text-white">Quản lý sản phẩm</h3>
    <div class="flex justify-end gap-2">
        <ul>
            <li><a href="">Danh mục sản phẩm</a></li>
            <li><a href="">Thêm sản phẩm</a></li>
            <li><a href=""></a></li>
        </ul>
    </div>
</div>
<div class="overflow-x-auto">
    <select name="" onchange="window.location = this.value">
        <option value=<?php echo "admin.php?page=product-list" ?>>Tất cả sản phẩm</option>
        <?php foreach (get_all_manufacturer() as $item) : extract($item) ?>
            <option value=<?php echo "admin.php?page=product-list&man_id={$id}" ?> <?php
                                                                                    if (isset($_GET['man_id']) && $_GET['man_id'] == $id) echo "selected" ?>>
                <?= $name ?></option>
        <?php endforeach; ?>
    </select>
    <table class="table table-compact w-full">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Kho hàng</th>
                <th>Giảm giá</th>
                <th>Đánh giá</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <!-- lấy ra tất cả -->
            <?php
            foreach ($products as $item) : extract($item) ?>
                <tr>
                    <td><img src=<?= ROOT_PRODUCT . $image ?> alt="" style="width: 100px; height:100px; object-fit:contain"></td>
                    <td><?= $prod_name ?></td>
                    <td><?= $price ?></td>
                    <td><?= $manu_name ?></td>
                    <td><a href=<?php echo "admin.php?page=product-delete&id={$id}" ?>>Xóa sản phẩm</a></td>
                </tr>
            <?php
            endforeach; ?>
            <!--  -->
        </tbody>
    </table>
</div>
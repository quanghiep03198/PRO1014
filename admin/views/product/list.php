<?php
$products = select_all_records("SELECT * FROM product
INNER JOIN manufacturer ON product.man_id = manufacturer.id");
print_r($products)
?>
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
            <?php foreach ($products as $item) : extract($item) ?>
                <tr>
                    <td>
                        <div class="flex items-center gap-2">
                            <picture>
                                <img src=<?= $ROOT_PRODUCT . $image ?> alt="">
                            </picture>
                            <div>
                                <h3 class="text-xl"><?= $name ?></h3>
                                <p class="text-base text-[color:var(--primary-color)]"><?= $price ?></p>
                                <p class="text-base text-[color:var(--primary-color)]">Hãng sản xuất<?= $man_name ?></p>
                            </div>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
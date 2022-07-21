<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="container flex">
        <aside>
            <?php include 'components/sidebar.php' ?>
        </aside>
        <section class="main">
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
                        <?php foreach ($products as $item) : ?>
                            <tr>
                                <td>
                                    <div class="flex items-center gap-2">
                                        <picture></picture>
                                        <div>
                                            <h3 class="text-xl"><?= $item['product_name'] ?></h3>
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
        </section>
    </div>
</body>

</html>
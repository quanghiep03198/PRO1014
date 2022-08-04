<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/styles/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="/path/or/uri/to/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
</head>

<body>
    <div class="flex items-stretch">

        <!-- import sidebar from component  -->
        <?php include_once "/xampp/htdocs/PRO1014/admin/components/sidebar.php" ?>
        <!-- sidebar  end -->
        <section class="w-full">
            <div class="bg-primary px-12 py-8 flex justify-between items-center mb-10">
                <h1 class="text-3xl text-white">Danh mục sản phẩm</h1>
                <div class="dropdown dropdown-end ">
                    <label tabindex="0" class="text-white text-xl"><i class="bi bi-list"></i></label>
                    <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a href="?page=product-list">Danh sách sản phẩm</a></li>
                        <li><a href="?page=categories-list">Danh mục sản phẩm</a></li>
                    </ul>
                </div>
            </div>

            <!-- form sp  -->
            <div class="container mx-auto">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th><span class="text-lg">Danh mục</span> </th>
                            <th><span class="text-lg">Số sản phẩm</span> </th>
                            <th><span class="text-lg">Thao tác</span> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (get_all_categories()  as $item) : extract($item) ?>
                            <tr>
                                <td>
                                    <h3 class="text-lg"><?= $name ?></h3>
                                </td>
                                <td> <?= $productQtyEachCate = get_product_qty_each_cate($id) != null ? get_product_qty_each_cate($id) : 0 ?></td>
                                <td>
                                    <a href="?page=categories-update&id=<?php echo $id ?>" class="font-medium hover:text-primary">Sửa</a> /
                                    <a href="?page=categories-delete&id=<?php echo $id ?>" class="font-medium hover:text-error">Xóa
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
        <!-- grid end  -->
</body>

</html>
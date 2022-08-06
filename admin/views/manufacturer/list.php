<?php

$cate_list =  select_all_records("SELECT * FROM  manufacturer order by id");





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/styles/main.css">
    <link rel="stylesheet" href="/styles/tailwind.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="flex items-stretch">
        <?php include_once "/xampp/htdocs/PRO1014/admin/components/sidebar.php" ?>
        <section class="w-full">
            <div class="bg-primary px-12 py-8 flex justify-between items-center mb-10">
                <h1 class="text-3xl text-white">Danh sách sản xuất</h1>
                <div class="dropdown dropdown-end ">
                    <label tabindex="0" class="text-white text-xl"><i class="bi bi-list"></i></label>
                    <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-80">
                        <li><a href="?page=product-list">Danh sách sản phẩm</a></li>
                        <li><a href="?page=categories-list">Danh mục sản phẩm</a></li>
                        <li><a href="?page=manufacturer-list">Danh mục nhà sản xuất </a></li>
                    </ul>
                </div>
            </div>
            <div class="container mx-auto">
                <div class="flex justify-end items-center my-5">
                    <a href="?page=manufacturer-create" class="btn btn-ghost "><i class="bi bi-plus text-2xl"></i><span>Thêm mới</span></a>
                </div>
                <table class="table  w-full">
                    <thead>
                        <tr>
                            <th class="pl-6">Nhà sản xuất</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cate_list  as $item) : extract($item) ?>

                            <tr>
                                <td>
                                    <h3 class="text-xl"><?= $name ?></h3>
                                </td>
                                <td>
                                    <a href="?page=manufacturer-update&id=<?php echo $id ?>">Sửa</a> /
                                    <a href="/admin/controllers/manufacturer.php?id=<?php echo $id ?>" class="hover:text-error" onclick="return confirm(`Bạn chắc chắn muốn xóa nhà sản xuất này chứ ?`)">Xóa
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

    </div>

</body>

</html>
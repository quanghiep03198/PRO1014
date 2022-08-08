<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/main.css">
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
            <div class="bg-primary px-[50px] py-[30px] flex justify-between items-center">
                <h3 class="text-3xl text-white">Danh sách dịch vụ</h3>
            </div>

            <div class="container mx-auto">
                <div class="flex justify-end items-center my-5">
                    <a href="?page=service-create" class="btn btn-ghost "><i class="bi bi-plus text-2xl"></i><span>Thêm
                            mới</span></a>
                </div>

                <table class="table w-full">
                    <tr class="border-b">
                        <th><span class="text-lg">Danh mục</span> </th>
                        <th><span class="text-lg">Giá dịch vụ</span> </th>
                        <th><span class="text-lg">Thao tác</span> </th>
                    </tr>
                    <tbody>
                        <?php foreach (get_all_services()  as $item) : extract($item) ?>
                        <tr>
                            <td>
                                <span class="text-lg"><?= $name ?></span>
                            </td>
                            <td> <span class="text-lg"><?= $cost . "₫" ?></span></td>
                            <td>
                                <a href="?page=service-update&id=<?php echo $id ?>"
                                    class="font-medium hover:text-primary">Sửa</a> /
                                <a href="./admin/controllers/service.php?id=<?php echo $id ?>"
                                    class="font-medium hover:text-error"
                                    onclick="return confirm('Bạn chắc chắn muốn xóa danh mục sản phẩm này?')">Xóa
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
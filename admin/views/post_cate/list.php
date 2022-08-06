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
            <div class="bg-primary px-[50px] py-[30px] flex justify-between items-center">
                <h3 class="text-3xl text-white">Danh mục bài viết</h3>
                <div class="dropdown dropdown-end ">
                    <label tabindex="0" class="text-white text-xl"><i class="bi bi-list"></i></label>
                    <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-80">
                        <li><a href="?page=product-list">Danh sách sản phẩm</a></li>
                        <li><a href="?page=categories-list">Danh mục sản phẩm</a></li>
                    </ul>
                </div>
            </div>

            <div class="container mx-auto">
                <div class="flex justify-end items-center my-5">
                    <a href="?page=post_cate-create" class="btn btn-ghost "><i class="bi bi-plus text-2xl"></i><span>Thêm mới</span></a>
                </div>

                <table class="table w-full">
                    <tr class="border-b">
                        <th><span class="text-lg">Danh mục</span> </th>
                        <th><span class="text-lg">Thao tác</span> </th>
                    </tr>
                    <tbody>
                        <?php foreach (get_all_post_cate()  as $item) : extract($item) ?>
                            <tr>
                                <td>
                                    <h3 class="text-lg"><?= $name ?></h3>
                                </td>
                                <td>
                                    <a href="?page=post_cate-update&id=<?php echo $id ?>" class="font-medium hover:text-primary">Sửa</a> /
                                    <a href="./admin/controllers/post_cate.php?id=<?php echo $id ?>" class="font-medium hover:text-error" onclick="return confirm('Bạn chắc chắn muốn xóa danh mục sản phẩm này?')">Xóa
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
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
                <h3 class="text-3xl text-white">Danh sách dịch vụ</h3>
            </div>

            <div class="container mx-auto">
                <div class="flex justify-end items-center my-5">
                    <a href="?page=user-create" class="btn btn-ghost "><i class="bi bi-plus text-2xl"></i><span>Thêm mới</span></a>
                </div>

                <table class="table w-full">
                    <tr class="border-b">
                        <th><span class="text-lg">Tài khoản</span> </th>
                        <th><span class="text-lg">Số điện thoại</span> </th>
                        <th><span class="text-lg">Địa chỉ</span> </th>
                        <th><span class="text-lg">Vai trò</span> </th>
                        <th><span class="text-lg">Thao tác</span> </th>
                    </tr>
                    <tbody>
                        <?php foreach (get_all_users()  as $user) : extract($user) ?>
                            <tr>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <img src=<?php echo ROOT_AVATAR . $avatar ?> alt="" class="w-16 h-16 rounded-full">
                                        <div class="flex flex-col justify-center gap-3">
                                            <span class="text-lg font-medium"><?= $account ?></span>
                                            <span class="text-base"><?= $email ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td> <span class="text-lg"><?= $phone ?></span></td>
                                <td> <span class="text-lg"><?= $address ?></span></td>
                                <td> <span class="text-lg capitalize"><?= $role_name ?></span></td>
                                <td>
                                    <a href="?page=user-update&id=<?php echo $id ?>" class="font-medium hover:text-primary">Sửa</a> /
                                    <a href="./admin/controllers/user.php?id=<?php echo $id ?>" class="font-medium hover:text-error" onclick="return confirm('Bạn chắc chắn muốn xóa danh mục sản phẩm này?')">Xóa
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
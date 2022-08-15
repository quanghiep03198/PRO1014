<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo mới bài viết</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.tiny.cloud/1/xqzory9nvy597bn74b72f5de86nfknihmi10e9yfgi0fw699/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

</head>

<body>
    <div class="flex sm:flex-col-reverse justify-start items-stretch ">
        <!-- import sidebar -->
        <?php include_once "./admin/components/sidebar.php" ?>
        <section class="w-full h-screen overflow-y-scroll">
            <div class="bg-primary px-[50px] py-[30px] flex justify-between items-center">
                <h3 class="sm:text-xl md:text-2xl lg:text-3xl text-white">Danh sách bài viết</h3>
                <div class="dropdown dropdown-end ">
                    <label tabindex="0" class="text-white text-xl"><i class="bi bi-list"></i></label>
                    <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-80">
                        <li><a href="?page=post-list">Danh sách bài viết</a></li>
                        <li><a href="?page=post_cate-list">Danh mục bài viết</a></li>
                    </ul>
                </div>
            </div>


            <div class="container mx-auto">
                <div class="flex justify-end items-center my-5">
                    <a href="?page=post-create" class="btn btn-ghost "><i class="bi bi-plus text-2xl"></i><span>Thêm mới</span></a>
                </div>
                <!-- danh sách bài viết -->
                <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                    <?php foreach (get_all_posts() as $post) : extract($post) ?>
                        <div class="card bg-base-100 border w-96">
                            <div class="absolute top-1 right-2 dropdown dropdown-end z-50">
                                <label tabindex="0" class="text-white text-xl"><i class="bi bi-three-dots"></i></label>
                                <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                                    <li><a href="?page=post-update&id=<?= $id ?>">Sửa</a></li>
                                    <li><a href="/admin/controllers/spost.php?id=<?= $id ?>">Xóa</a></li>
                                </ul>
                            </div>
                            <img src=<?php echo ROOT_POST . $img ?> class="w-full h-60 object-cover">
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $title ?></h2>
                                <p class="mb-5 text-ellipsis overflow-hidden"><?php echo $short_desc ?></p>
                                <div class="card-actions justify-between">
                                    <span class="font-medium"><?php echo $create_date ?></span>
                                    <span>Đăng bởi: <span class="font-medium"><?php echo $author ?></span></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

    </div>
</body>

</html>
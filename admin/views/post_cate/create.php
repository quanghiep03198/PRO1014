<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/styles/main.css">
</head>

<body>
    <div class="flex items-stretch">
        <!-- import sidebar  from -->
        <?php include_once "./admin/components/sidebar.php" ?>

        <section class="w-full">
            <!-- title top -->
            <div class="bg-primary px-[50px] py-[30px] flex justify-between items-center">
                <h1 class="text-3xl text-white">Thêm mới danh mục bài viết</h1>
                <div class="dropdown dropdown-end ">
                    <label tabindex="0" class="text-white text-xl"><i class="bi bi-list"></i></label>
                    <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-80">
                        <li><a href="?page=post-list">Danh sách bài viết</a></li>
                        <li><a href="?page=post_cate-list">Danh mục bài viết</a></li>
                    </ul>
                </div>
            </div>
            <div class="container mx-auto grid gap-10 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2">
                <form action="/admin/controllers/post_cate.php" method="POST" onsubmit="handleCreatePostCateErr(this,event)" class="mb-10">
                    <div class="max-w-3xl flex flex-col gap-5">
                        <div class="form-control">
                            <label for="" class="label">Mã danh mục</label>
                            <input type="number" name="cate_id" class="input input-bordered" placeholder="">
                            <small class="text-base text-info font-semibold"><i class="bi bi-info-circle"></i> Bỏ trống nếu chưa có bài viết nào thuộc danh mục này</small>
                        </div>
                        <div class="form-control">
                            <label for="" class="label">Tên danh mục</label>
                            <input type="text" data-name="tên danh mục" name="cate_name" class="input input-bordered">
                            <small class="text-base text-error error-message font-semibold"></small>
                        </div>
                        <div class="form-control">
                            <button type="submit" name="create_post_cate" class="btn hover:btn-primary w-auto">Thêm mới danh mục</button>
                        </div>
                    </div>
                </form>

                <div>
                    <table class="table w-full">
                        <tr class="border-b">
                            <th>Bài viết</th>
                            <th>Mã danh mục (đã xóa)</th>
                        </tr>
                        <?php foreach (get_posts_have_no_cate() as $item) : extract($item) ?>
                            <tr>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <img src=<?= ROOT_POST . $image ?> alt="" class="w-24 h-24 object-contain">
                                    </div>
                                </td>
                                <td class="text-xl font-medium"><?= $cate_id ?></td>
                            </tr>
                        <?php endforeach; ?>

                    </table>
                </div>

            </div>
        </section>
        <script src="./js/common.js"></script>
        <script src="./js/validate.js"></script>
        <script>
            const handleCreatePostCateErr = (form, event) => {
                const cate_name = form['cate_name']
                if (isRequired(cate_name) == false) event.preventDefault()
            }
        </script>
</body>

</html>
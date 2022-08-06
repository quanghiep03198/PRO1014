<?php
if (isset($_GET['id'])) :
    $post_cate = get_one_post_cate($_GET['id']);
    extract($post_cate);
endif;

?>
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
            <div class="container mx-auto ">
                <form action="/admin/controllers/post_cate.php" method="POST" onsubmit="handleUpdatePostCateErr(this,event)" class="mb-10">
                    <div class="max-w-3xl flex flex-col gap-5">
                        <div class="form-control">
                            <label for="" class="label">Tên danh mục</label>
                            <input type="hidden" name="cate_id" class="input input-bordered" value=<?= $id ?>>
                            <input type="text" data-name="tên danh mục" name="cate_name" class="input input-bordered" value="<?php echo $name ?>">
                            <small class="text-base text-error error-message font-semibold"></small>
                        </div>
                        <div class="form-control">
                            <button type="submit" name="update_post_cate" class="btn hover:btn-primary w-auto">Thêm mới danh mục</button>
                        </div>
                    </div>
                </form>



            </div>
        </section>
        <script src="./js/common.js"></script>
        <script src="./js/validate.js"></script>
        <script>
            const handleUpdatePostCateErr = (form, event) => {
                const cate_name = form['cate_name']
                if (isRequired(cate_name) == false) event.preventDefault()
            }
        </script>
</body>

</html>
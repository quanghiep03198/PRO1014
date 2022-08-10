<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/styles/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
    <div class="flex items-stretch">
        <!-- import sidebar  from -->
        <?php include_once "./admin/components/sidebar.php" ?>

        <section class="w-full">
            <!-- title top -->
            <div class="bg-primary px-[50px] py-[30px] flex justify-between items-center">
                <h3 class="text-3xl text-white">Danh mục sản phẩm</h3>
                <div class="dropdown dropdown-end ">
                    <label tabindex="0" class="text-white text-xl"><i class="bi bi-list"></i></label>
                    <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-80">
                        <li><a href="?page=product-list">Danh sách sản phẩm</a></li>
                        <li><a href="?page=categories-list">Danh mục sản phẩm</a></li>
                        <li><a href="?page=manufacturer-list">Danh sách nhà sản xuất</a></li>
                    </ul>
                </div>
            </div>
            <div class="container mx-auto">
                <?php
                if (isset($_GET['id'])) :
                    $category = get_one_category($_GET['id']);
                    extract($category);
                ?>
                    <form action=<?php echo "/admin/controllers/category.php" ?> method="POST" onsubmit="handleUpdateCateError(this,event)" class="mb-10">
                        <div class="max-w-3xl flex flex-col gap-5">
                            <div class="form-control">
                                <label for="" class="label">Tên danh mục</label>
                                <input type="hidden" name="cate_id" value=<?= $id ?>>
                                <input type="text" name="cate_name" class="input input-bordered" value="<?php echo $name ?>">
                                <small class="text-base text-error error-message font-semibold"></small>
                            </div>
                            <div class="form-control">
                                <button type="submit" name="update_category" class="btn hover:btn-primary w-auto">Update danh mục</button>
                            </div>
                        </div>
                    </form>

                    <!-- danh sách các sản phẩm hiện ko có danh mục nào  -->

                <?php endif; ?>
            </div>
        </section>
        <script src="./js/common.js"></script>
        <script src="./js/validate.js"></script>
        <script>
            const handleUpdateCateError = (form, event) => {
                const cate_name = form['cate_name']
                if (areRequired(cate_name) == false) event.preventDefault()
            }
        </script>
</body>

</html>
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
                <h1 class="text-3xl text-white">Danh mục sản phẩm</h1>
                <div class="dropdown dropdown-end ">
                    <label tabindex="0" class="text-white text-xl"><i class="bi bi-list"></i></label>
                    <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-80">
                        <li><a href="?page=product-list">Danh sách sản phẩm</a></li>
                        <li><a href="?page=categories-list">Danh mục sản phẩm</a></li>
                        <li><a href="?page=manufacturer-list">Danh sách nhà sản xuất</a></li>
                    </ul>
                </div>
            </div>
            <div class="container mx-auto grid gap-10 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2">
                <form action="/admin/controllers/category.php" method="POST" onsubmit="handleCreateCateError(this,event)" class="mb-10">
                    <div class="max-w-3xl flex flex-col gap-5">
                        <div class="form-control">
                            <label for="" class="label">Mã danh mục</label>
                            <input type="number" name="cate_id" class="input input-bordered" placeholder="">
                            <small class="text-base text-info font-semibold"><i class="bi bi-info-circle"></i> Bỏ trống nếu chưa có sản phẩm nào thuộc danh mục này</small>
                        </div>
                        <div class="form-control">
                            <label for="" class="label">Tên danh mục</label>
                            <input type="text" data-name="tên danh mục" name="cate_name" class="input input-bordered">
                            <small class="text-base text-error error-message font-semibold"></small>
                        </div>
                        <div class="form-control">
                            <button type="submit" name="create_category" class="btn hover:btn-primary w-auto">Thêm mới danh mục</button>
                        </div>
                    </div>
                </form>

                <div>
                    <table class="table w-full">
                        <tr class="border-b">
                            <th>Sản phẩm</th>
                            <th>Mã danh mục (đã xóa)</th>
                        </tr>
                        <?php foreach (get_products_have_no_cate() as $item) : extract($item) ?>
                            <tr>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <img src=<?= ROOT_PRODUCT . $image ?> alt="" class="w-24 h-24 object-contain">
                                        <div class="flex flex-col justify-center gap-5">
                                            <span class="text-xl font-medium"><?= $prod_name ?></span>
                                            <span class="text-lg first-line:font-normal"><?= $price . "₫" ?></span>
                                        </div>
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
            const handleCreateCateError = (form, event) => {
                const cate_name = form['cate_name']
                if (areRequired(cate_name) == false) event.preventDefault()
            }
        </script>
</body>

</html>
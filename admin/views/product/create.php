<?php
$error = [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới sản phẩm</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.tiny.cloud/1/xqzory9nvy597bn74b72f5de86nfknihmi10e9yfgi0fw699/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

</head>

<body>
    <div class="flex justify-start items-stretch">
        <!-- import sidebar -->
        <?php include_once "./admin/components/sidebar.php" ?>
        <!--  -->
        <section class="w-full">
            <div class="bg-primary p-10 w-full mb-10 flex justify-between">
                <h1 class="text-white text-3xl">Thêm sản phẩm</h1>
                <div class="dropdown dropdown-end ">
                    <label tabindex="0" class="text-white"><i class="bi bi-list"></i></label>
                    <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-80">
                        <li><a href="?page=product-list">Danh sách sản phẩm</a></li>
                        <li><a href="?page=categories-list">Danh mục sản phẩm</a></li>
                        <li><a href="?page=manufacturer-list">Danh sách nhà sản xuất</a></li>
                    </ul>
                </div>
            </div>
            <form action="" method="post" enctype="multipart/form-data" class="w-full sm:p-5 md:p-10 lg:p-10 mx-auto" onsubmit="handleErrorCreateProduct(this,event)">
                <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-10 items-stretch mb-10">
                    <div class="flex flex-col gap-5">
                        <!-- tên sản phẩm -->
                        <div class="form-control">
                            <label class="text-xl">Tên sản phẩm</label>
                            <input type="text" dataa-name="tên sản phẩm" class="input input-bordered" name="product_name" id="">
                            <small class="text-base text-error error-message font-semibold">
                                <?php check_empty("product_name", "tên sản phẩm") ?>
                            </small>
                        </div>
                        <!-- giá sản phẩm -->
                        <div class="form-control">
                            <label class="text-xl">Giá</label>
                            <input type="text" data-name="giá sản phẩm" class="input input-bordered" name="price" id="">
                            <small class="text-base text-error error-message font-semibold">
                                <?php check_empty("price", "giá sản phẩm") ?>
                            </small>
                        </div>
                        <!-- danh mục sản phẩm -->
                        <div class="form-control">
                            <label class="text-xl">Danh mục sản phẩm</label>
                            <select name="category" data-name="danh mục sản phẩm" class="select select-bordered">
                                <option value="">Chọn danh mục sản phẩm</option>
                                <?php foreach (get_all_categories() as $cate) : extract($cate); ?>
                                    <option value=<?= $id ?>><?= $name ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-base text-error error-message font-semibold">
                                <?php check_empty("category", "danh mục sản phẩm") ?>
                            </small>
                        </div>
                        <!-- hãng sản xuất -->
                        <div class="form-control">
                            <label class="text-xl">Nhà sản xuất</label>
                            <select name="manufacturer" data-name="nhà sản xuất" class="select select-bordered">
                                <option value="">Chọn danh nhà sản xuất</option>
                                <?php foreach (get_all_manufacturer() as $cate) : extract($cate); ?>
                                    <option value=<?= $id ?>><?= $name ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-base text-error error-message font-semibold">
                                <?php check_empty("manufacturer", "nhà sản xuất") ?>
                            </small>
                        </div>
                        <!-- discount -->
                        <div class="form-control">
                            <label class="text-xl">Giảm giá</label>
                            <input type="number" class="input input-bordered" name="discount" value=0>
                        </div>
                        <!-- ảnh sản phẩm -->
                        <div class="form-control">
                            <label class="text-xl">Ảnh sản phẩm</label>
                            <input type="file" data-name="product_image" class="file:hover:btn-primary file:btn" name="product_image">
                            <small class="text-base text-error error-message font-semibold">
                                <?php check_image("product_image", "add_product") ?>
                            </small>

                        </div>

                    </div>
                    <div class="flex flex-col gap-5">
                        <!-- stock -->
                        <div class="form-control">
                            <label class="text-xl">Kho hàng</label>
                            <input type="number" data-name="số sản phẩm trong kho" class="input input-bordered" name="stock" id="">
                            <small class="text-base text-error error-message font-semibold">
                                <?php check_empty("stock", "kho hàng") ?>
                            </small>
                        </div>
                        <!-- thời gian bảo hành sản phẩm -->
                        <div class="form-control">
                            <label class="text-xl">Thời gian bảo hành</label>
                            <input type="number" data-name="thời gian bảo hành" class="input input-bordered" name="warranty_time" id="">
                            <small class="text-base text-error error-message font-semibold">
                                <?php check_empty("warranty_time", "thời gian bảo hành") ?>
                            </small>
                        </div>
                        <!-- mô tả -->
                        <div class="form-control">
                            <label class="text-xl">Mô tả</label>
                            <textarea name="description" data-name="mô tả sản phẩm"></textarea>
                            <small class="text-base text-error error-message font-semibold">
                                <?php check_empty("description", "mô tả sản phẩm") ?>
                            </small>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div>
                    <button type="submit" name="create_product" class="btn btn-lg hover:btn-primary w-auto">Thêm sản phẩm</button>
                </div>

            </form>
            <!-- code ở đây -->
        </section>
    </div>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
            toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
        });
    </script>
    <script src="./js/common.js"></script>
    <script src="./js/validate.js"></script>
    <script>
        const handleErrorCreateProduct = (form, event) => {
            // event.preventDefault();
            const productName = form['product_name'];
            const price = form['price'];
            const category = form['category'];
            const image = form['product_image'];
            const stock = form['stock'];
            const manufacturer = form['manufacturer'];
            const warrantyTime = form['warranty_time'];
            const description = form['description'];
            if (isRequired(productName, price, category, image, stock, warrantyTime, description, manufacturer) == false)
                event.preventDefault()
            if (isImage(image) == false)
                event.preventDefault()
        }
    </script>

</body>

</html>
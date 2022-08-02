<?php
$error_count = 0;
if (isset($_GET['id'])) :
    $product = get_one_product($_GET['id']);
    extract($product);
endif;

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
                <h1 class="text-white text-3xl">Update sản phẩm #<?php echo $_GET['id'] ?></h1>
                <div class="dropdown dropdown-end ">
                    <label tabindex="0" class="text-white"><i class="bi bi-list"></i></label>
                    <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a href="?page=product-list">Danh sách sản phẩm</a></li>
                        <li><a href="?page=categories-list">Danh mục sản phẩm</a></li>
                    </ul>
                </div>
            </div>
            <form action="/admin/controllers/product.php" method="post" enctype="multipart/form-data" class="container mx-auto" onsubmit="handleErrorUpdateProduct(this,event)">
                <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-10 items-stretch mb-10">
                    <div class="flex flex-col gap-5">
                        <!-- tên sản phẩm -->
                        <div class="form-control">
                            <label class="text-xl">Tên sản phẩm</label>
                            <input type="text" data-name="tên sản phẩm" class="input input-bordered" name="product_name" value="<?php echo $prod_name ?>">
                            <small class="text-base text-error error-message font-semibold"></small>
                        </div>
                        <!-- giá sản phẩm -->
                        <div class="form-control">
                            <label class="text-xl">Giá</label>
                            <input type="text" data-name="giá sản phẩm" class="input input-bordered" name="price" value=<?= $price ?>>
                            <small class="text-base text-error error-message font-semibold"></small>
                        </div>
                        <!-- danh mục sản phẩm -->
                        <div class="form-control">
                            <label class="text-xl">Danh mục sản phẩm</label>
                            <select name="category" data-name="danh mục sản phẩm" class="select select-bordered">
                                <option value="">Chọn danh mục sản phẩm</option>
                                <?php foreach (get_all_categories() as $cate) : extract($cate); ?>
                                    <option value=<?= $id ?> <?php if ($id == $cate_id) echo "selected" ?>><?= $name ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-base text-error error-message font-semibold"></small>
                        </div>
                        <!-- hãng sản xuất -->
                        <div class="form-control">
                            <label class="text-xl">Nhà sản xuất</label>
                            <select name="manufacturer" data-name="nhà sản xuất" class="select select-bordered">
                                <option value="">Chọn danh nhà sản xuất</option>
                                <?php foreach (get_all_manufacturer() as $cate) : extract($cate); ?>
                                    <option value=<?= $id ?> <?php if ($id == $man_id) echo "selected" ?>><?= $name ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-base text-error error-message font-semibold"></small>
                        </div>
                        <!-- discount -->
                        <div class="form-control">
                            <label class="text-xl">Giảm giá</label>
                            <input type="number" data-name="giảm giá" class="input input-bordered" name="discount" value=<?= $discount ?>>
                        </div>
                        <!-- ảnh sản phẩm -->
                        <div class="form-control">
                            <label class="text-xl">Ảnh sản phẩm</label>
                            <input type="file" data-name="ảnh sản phẩm" class="file:hover:btn-primary file:btn" name="product_image">
                            <small class="text-base text-error error-message font-semibold"></small>

                        </div>

                    </div>
                    <div class="flex flex-col gap-5">
                        <!-- stock -->
                        <div class="form-control">
                            <label class="text-xl">Kho hàng</label>
                            <input type="number" data-name="số sản phẩm trong kho" class="input input-bordered" name="stock" value=<?= $stock ?>>
                            <small class="text-base text-error error-message font-semibold"></small>
                        </div>
                        <!-- thời gian bảo hành sản phẩm -->
                        <div class="form-control">
                            <label class="text-xl">Thời gian bảo hành</label>
                            <input type="number" data-name="thời gian bảo hành" class="input input-bordered" name="warranty_time" value=<?= $warranty_time ?>>
                            <small class="text-base text-error error-message font-semibold"></small>
                        </div>
                        <!-- mô tả -->
                        <div class="form-control">
                            <label class="text-xl">Mô tả</label>
                            <textarea data-name="mô tả sản phẩm" name="description" value="<?php echo $description ?>"></textarea>
                            <small class="text-base text-error error-message font-semibold"></small>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div>
                    <input type="hidden" name="product_id" value=<?= $_GET['id'] ?>>
                    <button type="submit" name="update_product" class="btn btn-lg hover:btn-primary w-auto">Update sản phẩm</button>
                </div>

            </form>
            <!-- code ở đây -->
        </section>
    </div>
    <script src="./js/common.js"></script>
    <script src="./js/validate.js"></script>
    <script>
        const handleErrorUpdateProduct = (form, event) => {
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
</body>

</html>
<?php

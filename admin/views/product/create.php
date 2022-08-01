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
    <div class="flex justify-start items-stretch gap-5">
        <!-- import sidebar -->
        <?php include_once "./admin/components/sidebar.php" ?>
        <div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="flex flex-col gap-5">
                    <!-- tên sản phẩm -->
                    <div class="form-control">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" class="input input-bordered" name="product_name" id="">
                        <small class="text-base text-error error-message font-semibold">
                            <?php check_empty("product_name", "tên sản phẩm") ?>
                        </small>
                    </div>
                    <!-- giá sản phẩm -->
                    <div class="form-control">
                        <label for="">Giá</label>
                        <input type="text" class="input input-bordered" name="product_name" id="">
                        <small class="text-base text-error error-message font-semibold">
                            <?php check_empty("product_name", "tên sản phẩm") ?>
                        </small>
                    </div>
                    <div class="form-control">
                        <label for=""></label>
                        <input type="text" class="input input-bordered" name="product_name" id="">
                        <small class="text-base text-error error-message font-semibold">
                            <?php check_empty("product_name", "tên sản phẩm") ?>
                        </small>
                    </div>
                    <div class="form-control">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" class="input input-bordered" name="product_name" id="">
                        <small class="text-base text-error error-message font-semibold">
                            <?php check_empty("product_name", "tên sản phẩm") ?>
                        </small>
                    </div>
                    <div class="form-control">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" class="input input-bordered" name="product_name" id="">
                        <small class="text-base text-error error-message font-semibold">
                            <?php check_empty("product_name", "tên sản phẩm") ?>
                        </small>
                    </div>
                    <div class="form-control">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" class="input input-bordered" name="product_name" id="">
                        <small class="text-base text-error error-message font-semibold">
                            <?php check_empty("product_name", "tên sản phẩm") ?>
                        </small>
                    </div>
                    <div class="form-control">
                        <label for="">Mô tả</label>
                        <textarea name="description"></textarea>
                        <small class="text-base text-error error-message font-semibold">
                            <?php check_empty("description", "mô tả sản phẩm") ?>
                        </small>
                    </div>
                    <div class="form-control">
                        <button type="submit" name="add_product" class="btn">Thêm sản phẩm</button>
                    </div>
                </div>
            </form>
            <!-- code ở đây -->
        </div>
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
</body>

</html>
<?php
if (isset($_POST['add_product'])) {
    if (empty($error))
        print_r($error);
}

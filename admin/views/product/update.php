<?php
<<<<<<< HEAD

$error = [];

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM product 
    INNER JOIN product_category ON product.cate_id = product_category.id
    INNER JOIN manufacturer ON product.man_id = manufacturer.id
    WHERE product.id = {$id} ";
    $sp =  select_single_record($sql);
    extract($sp);
}

$manus = select_all_records("SELECT * FROM manufacturer");
$list_cate = select_all_records("SELECT * FROM product_category")

?>

=======
$error_count = 0;
if (isset($_GET['id'])) :
    $product = get_one_product($_GET['id']);
    extract($product);
endif;

?>
>>>>>>> 5cd59c5405faeb09bfe94eee0e8062fd9561699a
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
<<<<<<< HEAD
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/styles/main.css">
    <link rel="stylesheet" href="/styles/tailwind.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="/path/or/uri/to/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
</head>

<body>
    <div class="grid grid-cols-[120px,auto]">

        <!-- sidebar  -->
        <?php include_once "/xampp/htdocs/PRO1014/admin/components/sidebar.php" ?>
        <!-- sidebar  end -->
        <div class="right">
            <div class="themmoi py-[20px] bg-[#407CB4]">
                <h2 class="lg:text-[40px]  text-[25px] ml-[50px] text-[#fff]"> Update sản phẩm</h2>
            </div>

            <!-- form sp  -->
            <div class="block p-6 rounded-lg shadow-lg bg-white ">
                <form enctype="multipart/form-data" method="POST">
                    <input type="hidden" name="id" value="<?php if (isset($id) && ($id > 0)) echo $id  ?>">
                    <div class="grid lg:grid-cols-2 grid-cols-1 lg:gap-4">
                        <div class="form-group mb-6">
                            <label for="tensp">Tên sản phẩm</label>
                            <input type="text" name="tensp" id="tensp" class="form-control
                 block
                 w-full
                 px-3
                 py-1.5
                 text-base
                 font-normal
                 text-gray-700
                 bg-white bg-clip-padding
                 border border-solid border-gray-300
                 rounded
                 transition
                 ease-in-out
                 m-0
                 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput123" aria-describedby="emailHelp123" placeholder="" value="<?php echo $prod_name ?>">
                            <small>
                                <?php
                                check_empty("tensp", "tên sản phẩm")
                                ?>
                            </small>
                        </div>
                        <div class="form-group mb-6">
                            <label for="kho">Kho hàng</label>
                            <input type="text" name="kho" id="kho" class="form-control
                 block
                 w-full
                 px-3
                 py-1.5
                 text-base
                 font-normal
                 text-gray-700
                 bg-white bg-clip-padding
                 border border-solid border-gray-300
                 rounded
                 transition
                 ease-in-out
                 m-0
                 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput124" aria-describedby="emailHelp124" placeholder="" value="<?php echo $stock ?>">
                            <small>
                                <?php
                                check_empty("kho", "số lượng sản phẩm trong kho hàng")
                                ?>
                            </small>
                        </div>
                    </div>
                    <!-- grid end  -->
                    <div class="grid lg:grid-cols-2 grid-cols-1 lg:gap-4">
                        <div class="form-group mb-6">
                            <label for="giasp">Giá sản phẩm</label>
                            <input type="text" name="giasp" id="giasp" class="form-control
                 block
                 w-full
                 px-3
                 py-1.5
                 text-base
                 font-normal
                 text-gray-700
                 bg-white bg-clip-padding
                 border border-solid border-gray-300
                 rounded
                 transition
                 ease-in-out
                 m-0
                 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput123" aria-describedby="emailHelp123" placeholder="" value="<?php echo $price ?>">
                            <small>
                                <?php check_empty("giasp","giá sản phẩm")?>
                            </small>
                        </div>
                        <div class="form-group mb-6">
                            <div>Mô tả</div>
                            <textarea id="w3review" name="mota" rows="5" cols="100" value=" <?php echo $description ?> " class="border-[2px] border-[#000] ">

</textarea>
                            <small></small>
                        </div>
                    </div>
                    <!-- grid end  -->
                    <div class="grid lg:grid-cols-2 grid-cols-1 lg:gap-4">
                        <div class="form-group mb-6">
                            <label for="sale">Giảm giá</label>
                            <input type="text" name="sale" id="tensp" class="form-control
                 block
                 w-full
                 px-3
                 py-1.5
                 text-base
                 font-normal
                 text-gray-700
                 bg-white bg-clip-padding
                 border border-solid border-gray-300
                 rounded
                 transition
                 ease-in-out
                 m-0
                 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput123" aria-describedby="emailHelp123" placeholder="" value="<?php echo $discount ?>">


                        </div>
                        <div class="form-group mb-6">
                            <label for="timew">Thời giản bảo hành</label>
                            <input type="text" name="timew" id="timew" class="form-control
                 block
                 w-full
                 px-3
                 py-1.5
                 text-base
                 font-normal
                 text-gray-700
                 bg-white bg-clip-padding
                 border border-solid border-gray-300
                 rounded
                 transition
                 ease-in-out
                 m-0
                 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput124" aria-describedby="emailHelp124" placeholder="" value="<?php echo $warranty_time ?>">
                            <small>
                                <?php
                                check_empty("timew", "thời gian bảo hành sản phẩm")
                                ?>
                            </small>
                        </div>
                    </div>
                    <!-- grid end  -->
                    <div class="grid lg:grid-cols-2 grid-cols-1 lg:gap-4">
                        <div class="left">
                            <div class="form-group mb-6">
                                <label for="tensp">Nhà sản xuất</label>

                                <select name="manus_gr" id="" class="w-full border-2 py-[10px] rounded">

                                    <?php
                                    foreach ($manus as $nsx) : extract($nsx); ?>
                                        <option value=<?php echo $man_id ?> <?php if ($cate_id == $man_id) echo "selected" ?>> <?php echo  $name ?> </option>
                                    <?php endforeach; ?>

                                </select>
                                <small>
                                    <?php check_empty("manus_gr", "nhà sản xuất") ?>
                                </small>
                            </div>


                            <div class="form-group mb-6">
                                <label for="tensp">Danh mục sản phẩm</label>
                                <br>
                                <select name="group_dm" id="" class="w-full border-2 py-[10px] rounded">
                                    <?php foreach ($list_cate as $cate) : extract($cate); ?>
                                        <option value=<?php echo $id ?> <?php if ($cate_id = $id) echo "selected" ?>><?= $name ?> </option>
                                    <?php endforeach;    ?>
                                </select>
                                <small></small>
                            </div>
                        </div>


                        <!-- left end  -->
                        <div class="form-group mb-6">
                            <input type="file" name="fileUpload" id="fileUpload">
                        </div>
                    </div>

                    <a href="" class="btn font-[400]"> Nhập lại</a>
                    <button name="btn_submit" class="btn font-[400] ml-[10px]"> Update sản phẩm </button>
                </form>
            </div>
            <!-- form end  -->



        </div>


    </div>
    <!-- grid end  -->

=======
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
            <form action="/admin/controllers/product.php" method="post" enctype="multipart/form-data" class="w-full sm:p-5 md:p-10 lg:p-10 mx-auto" onsubmit="handleErrorUpdateProduct(this,event)">
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
            if (areRequired(productName, price, category, image, stock, warrantyTime, description, manufacturer) == false)
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
>>>>>>> 5cd59c5405faeb09bfe94eee0e8062fd9561699a
</body>

</html>
<?php
<<<<<<< HEAD
if (isset($_POST['btn_submit'])) {
    $tensp = $_POST['tensp'];
    $kho = $_POST['kho'];
    $fileUpload = $_FILES['fileUpload']['name'];
    $giasp = $_POST['giasp'];
    $mota = $_POST['mota'];
    $sale = $_POST['sale'];
    $timew = $_POST['timew'];
    $manus_gr = $_POST['manus_gr'];
    $group_dm = $_POST['group_dm'];
}
=======
>>>>>>> 5cd59c5405faeb09bfe94eee0e8062fd9561699a

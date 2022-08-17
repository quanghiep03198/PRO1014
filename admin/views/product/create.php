
<?php  
 


 
$sql = "SELECT * FROM manufacturer order by id";
$list_nsx =select_all_records($sql);


$sql = "SELECT * FROM product_category order by id";
$list_danhmuc = select_all_records($sql);

$sql = "SELECT * FROM product order by id";
$list_sp = select_all_records ($sql);


if (isset($_POST['btn_submit'])) {
   
    

    
    $tensp = $_POST['tensp'];
    $kho = $_POST['kho'];
    $fileUpload = $_FILES['fileUpload']['name'];
    $giasp = $_POST['giasp'];
    $mota = $_POST['mota'];
    $sale = $_POST['sale'];
    $timew = $_POST['timew'];
    $group_nsx = $_POST['group_nsx'];
    $group_dm = $_POST['group_dm'];



    $error = array();
    $target_dir = "D:\duan1\uploads\.";
    $target_file = $target_dir . basename($_FILES['fileUpload']['name']);
    // Kiểm tra kiểu file hợp lệ
    $type_file = pathinfo($_FILES['fileUpload']['name'], PATHINFO_EXTENSION);
    $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
    if (!in_array(strtolower($type_file), $type_fileAllow)) {
        $error['fileUpload'] = "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh";
    }
    //Kiểm tra kích thước file
    $size_file = $_FILES['fileUpload']['size'];
    if ($size_file > 5242880) {
        $error['fileUpload'] = "File bạn chọn không được quá 5MB";
    }
    // Kiểm tra file đã tồn tại trê hệ thống
    if (file_exists($target_file)) {
        $error['fileUpload'] = "File bạn chọn đã tồn tại trên hệ thống";
    }
    echo $_FILES["fileUpload"]["tmp_name"];
    if (empty($error)) {
        if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
            echo "Bạn đã upload file thành công";
            $flag = true;
        }
        else {
            echo "File bạn vừa upload gặp sự cố";
        }
    }

     $sqli =  "INSERT INTO product (prod_name, cate_id, image, price, description, discount, stock, warranty_time, man_id) VALUES ('$tensp','$group_dm','$fileUpload','$giasp','$mota','$sale','$kho','$timew','$group_nsx')";
    // $sqli = "INSERT INTO `product`(`name_pro`, `price`, `info`, `id_dm`,`img`) VALUES ('{$tenloai}','{$giasp}','{$info_pro}','{$group}','{$fileUpload}')";
    execute_query($sqli);
}
?>





















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
    
=======
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới sản phẩm</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.tiny.cloud/1/xqzory9nvy597bn74b72f5de86nfknihmi10e9yfgi0fw699/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
>>>>>>> 5cd59c5405faeb09bfe94eee0e8062fd9561699a
    <script>
        tinymce.init({
            selector: 'textarea',
            content_css: 'styles/main.css',
            plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
            toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
        });
    </script>
</head>

<body>
<<<<<<< HEAD
<div class="grid grid-cols-[120px,auto]">

<!-- sidebar  -->
 <?php include_once "/xampp/htdocs/PRO1014/admin/components/sidebar.php" ?> 
<!-- sidebar  end -->
<div class="right">
    <div class="themmoi py-[20px] bg-[#407CB4]">
        <h2 class="lg:text-[40px]  text-[25px] ml-[50px] text-[#fff]">Thêm mới sản phẩm</h2>
    </div>

    <!-- form sp  -->
    <div class="block p-6 rounded-lg shadow-lg bg-white ">
        <form enctype="multipart/form-data" method="POST">
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
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput123" aria-describedby="emailHelp123" placeholder="">
                    <small></small>
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
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput124" aria-describedby="emailHelp124" placeholder="">
                    <small></small>
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
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput123" aria-describedby="emailHelp123" placeholder="">
                    <small></small>
                </div>
                <div class="form-group mb-6">
                    <label for="mota">Mô tả</label>
                    <input type="text" name="mota" id="mota" class="form-control
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
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput124" aria-describedby="emailHelp124" placeholder="">
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
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput123" aria-describedby="emailHelp123" placeholder="">
                    <small></small>
                </div>
                <div class="form-group mb-6">
                    <label for="timew">Thời giản bảo hành</label>
                    <input type="text" name="timew" id="kho" class="form-control
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
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput124" aria-describedby="emailHelp124" placeholder="">
                    <small></small>
                </div>
            </div>
            <!-- grid end  -->
            <div class="grid lg:grid-cols-2 grid-cols-1 lg:gap-4">
                <div class="left">
                    <div class="form-group mb-6">
                        <label for="tensp">Nhà sản xuất</label>
                      
                        <select name="group_nsx" id="" class="w-full border-2 py-[10px] rounded">

<?php
foreach ($list_nsx as $nsx) {
extract($nsx);
echo '<option value=' . $id . '>' . $name . '</option>';
}
?>
<option value=""></option>
</select>
                        <small></small>
                    </div>

                    
                    <div class="form-group mb-6">
                        <label for="tensp">Danh mục sản phẩm</label>
                        <br>
                        <select name="group_dm" id="" class="w-full border-2 py-[10px] rounded">

                            <?php
                          foreach ($list_danhmuc as $sanpham) {
                              extract($sanpham);
                              echo '<option value=' . $id . '>' . $name . '</option>';
                          }
                          ?>
<option value=""></option>


</select>
<small></small>
</div>
</div>


<!-- left end  -->
<div class="form-group mb-6">
<input type="file" name="fileUpload"  id="fileUpload" >
</div>
</div>

<a href="" class="btn font-[400]"> Nhập lại</a>
<button name="btn_submit" class="btn font-[400] ml-[10px]">  Thêm mới sản phẩm </button>
</form>
</div>
<!-- form end  -->



</div>


</div>
<!-- grid end  -->
=======
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
            <form action="./admin/controllers/product.php" method="POST" enctype="multipart/form-data" class="w-full sm:p-5 md:p-10 lg:p-10 mx-auto" onsubmit="handleErrorCreateProduct(this,event)">
                <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-10 items-stretch mb-10">
                    <div class="flex flex-col gap-5">
                        <!-- tên sản phẩm -->
                        <div class="form-control">
                            <label class="text-xl">Tên sản phẩm</label>
                            <input type="text" data-name="tên sản phẩm" class="input input-bordered" name="product_name" id="">
                            <small class="text-base text-error error-message font-semibold"></small>
                        </div>
                        <!-- giá sản phẩm -->
                        <div class="form-control">
                            <label class="text-xl">Giá</label>
                            <input type="text" data-name="giá sản phẩm" class="input input-bordered" name="price" id="">
                            <small class="text-base text-error error-message font-semibold"></small>
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
                            <small class="text-base text-error error-message font-semibold"></small>
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
                            <small class="text-base text-error error-message font-semibold"></small>
                        </div>
                        <!-- discount -->
                        <div class="form-control">
                            <label class="text-xl">Giảm giá</label>
                            <input type="number" class="input input-bordered" name="discount" value=0>
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
                            <input type="number" data-name="số sản phẩm trong kho" class="input input-bordered" name="stock" id="">
                            <small class="text-base text-error error-message font-semibold"></small>
                        </div>
                        <!-- thời gian bảo hành sản phẩm -->
                        <div class="form-control">
                            <label class="text-xl">Thời gian bảo hành</label>
                            <input type="number" data-name="thời gian bảo hành" class="input input-bordered" name="warranty_time" id="">
                            <small class="text-base text-error error-message font-semibold"></small>
                        </div>
                        <!-- mô tả -->
                        <div class="form-control">
                            <label class="text-xl">Mô tả</label>
                            <textarea name="description" data-name="mô tả sản phẩm"></textarea>
                            <small class="text-base text-error error-message font-semibold"></small>
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
            if (areRequired(productName, price, category, image, stock, warrantyTime, description, manufacturer) == false)
                event.preventDefault()
            if (isImage(image) == false)
                event.preventDefault()
        }
    </script>

>>>>>>> 5cd59c5405faeb09bfe94eee0e8062fd9561699a
</body>

</html>
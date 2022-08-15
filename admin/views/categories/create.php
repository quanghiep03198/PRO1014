<<<<<<< HEAD

<?php  

  $error =[];

   if (isset($_POST['btn_submit'])) {
   
    

    
    $tendm = $_POST['tendm'];
    $fileUpload = $_FILES['fileUpload']['name'];

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


 

     $sqli =  "INSERT INTO `product_category`(`name`, `image`) VALUES ('$tendm','$fileUpload')";
    // $sqli = "INSERT INTO `product`(`name_pro`, `price`, `info`, `id_dm`,`img`) VALUES ('{$tenloai}','{$giasp}','{$info_pro}','{$group}','{$fileUpload}')";
    execute_query($sqli);
      

   }
?>




=======
>>>>>>> 5cd59c5405faeb09bfe94eee0e8062fd9561699a
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<<<<<<< HEAD
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
        <h2 class="lg:text-[40px]  text-[25px] ml-[50px] text-[#fff]">Thêm mới danh mục sản phẩm</h2>
    </div>

    <!-- form sp  -->
    <div class="block p-6 rounded-lg shadow-lg bg-white ">
        <form enctype="multipart/form-data" method="POST">
            <div class="grid lg:grid-cols-2 grid-cols-1 lg:gap-4">
                <div class="form-group mb-6">
                    <label for="tendm" class=" text-[20px] font-[500">Tên danh mục sản phẩm</label>
                    <input type="text" name="tendm" id="tendm" class="form-control
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
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput123" aria-describedby="emailHelp123" placeholder="" >
                    <small><?php check_empty("tendm", "Tên danh mục") ?></small>
                    <br>
                    <div class="form-group mb-6">
                        Thêm ảnh 
<input type="file" name="fileUpload"  id="fileUpload" >
</div>
                    <br>
<a href="" class="btn font-[400] max-w-[200px]"> Nhập lại</a>
<button name="btn_submit" class="btn font-[400] ml-[10px] max-w-[200px]">  Thêm mới danh mục </button>
                </div>
             
              

</form>
</div>


<!-- form end  -->






</div>
<!-- grid end  -->
=======
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
>>>>>>> 5cd59c5405faeb09bfe94eee0e8062fd9561699a
</body>

</html>
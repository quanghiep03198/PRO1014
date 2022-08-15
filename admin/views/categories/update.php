<<<<<<< HEAD

<?php  
  
$error =[];
  if(isset($_GET['id']) && $_GET['id']>0){
    $id = $_GET['id'];
    $sql = "SELECT * FROM product_category where id=$id";
    $dm =  select_single_record($sql);   
      
    extract($dm) ;
}
    

 

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


 

     $sqli =  "UPDATE`product_category` SET `name` = '$tendm' , `image` ='$fileUpload' where id = $id";
    // $sqli = "INSERT INTO `product`(`name_pro`, `price`, `info`, `id_dm`,`img`) VALUES ('{$tenloai}','{$giasp}','{$info_pro}','{$group}','{$fileUpload}')";
    execute_query($sqli);
      include "admin/views/categories/list.php" ;
   }
?>




=======
>>>>>>> 5cd59c5405faeb09bfe94eee0e8062fd9561699a
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/styles/main.css">
<<<<<<< HEAD
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
        <h2 class="lg:text-[40px]  text-[25px] ml-[50px] text-[#fff]">Update danh mục sản phẩm</h2>
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
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput123" aria-describedby="emailHelp123" placeholder="" value =" <?php echo $name ?>">
                    <small>  <small><?php check_empty("tendm", "Tên danh mục") ?></small></small>
                    <br>
                    <div class="form-group mb-6">
                        Thêm ảnh 
<input type="file" name="fileUpload"  id="fileUpload" >
</div>
                    <br>
<a href="" class="btn font-[400] max-w-[200px]"> Nhập lại</a>
<button name="btn_submit" class="btn font-[400] ml-[10px] max-w-[200px]">  Update danh mục </button>
                </div>
              

</form>
</div>

<!-- form end  -->






</div>
<!-- grid end  -->
=======
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
>>>>>>> 5cd59c5405faeb09bfe94eee0e8062fd9561699a
</body>

</html>
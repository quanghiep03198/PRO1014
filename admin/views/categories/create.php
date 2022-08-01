
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




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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
</body>

</html>
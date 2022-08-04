
<?php  

$error =[];

 if (isset($_POST['btn_submit'])) {
 
  

  
  $tendm = $_POST['tendm'];
  $cost = $_POST['cost'];

  




   $sqli =  "INSERT INTO `services`(`name`, `cost`) VALUES ('$tendm','$cost')";
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
      <h2 class="lg:text-[40px]  text-[25px] ml-[50px] text-[#fff]">Thêm mới dịch vụ</h2>
  </div>

  <!-- form sp  -->
  <div class="block p-6 rounded-lg shadow-lg bg-white ">
      <form enctype="multipart/form-data" method="POST">
          <div class="grid lg:grid-cols-2 grid-cols-1 lg:gap-4">
              <div class="form-group mb-6">
                  <label for="tendm" class=" text-[20px] font-[500">Tên dịch vụ</label>
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
                      
                  <label for="cost" class=" text-[20px] font-[500">Giá dịch vụ</label>
                      <input type="text" name="cost" id="cost" class="form-control
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
</div>






                  <br>
<a href="" class="btn font-[400] max-w-[200px]"> Nhập lại</a>
<button name="btn_submit" class="btn font-[400] ml-[10px] max-w-[200px]">  Thêm mới dịch vụ </button>
              </div>
           
            

</form>
</div>


<!-- form end  -->






</div>
<!-- grid end  -->
</body>

</html>
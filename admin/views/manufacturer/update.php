<<<<<<< HEAD

<?php  

$error =[];
if(isset($_GET['id']) && $_GET['id']>0){
    $id = $_GET['id'];
    $sql = "SELECT * FROM manufacturer where id=$id";
    $dm =  select_single_record($sql);   
      
    extract($dm) ;
}
    
 if (isset($_POST['btn_submit'])) {
 
  

    

  
  $tendm = $_POST['tendm'];
 



   $sqli =  "UPDATE `manufacturer` SET `name`='$tendm
   ' WHERE id=$id";
  // $sqli = "INSERT INTO `product`(`name_pro`, `price`, `info`, `id_dm`,`img`) VALUES ('{$tenloai}','{$giasp}','{$info_pro}','{$group}','{$fileUpload}')";
  execute_query($sqli);
      include "admin/views/manufacturer/list.php";

 }
?>




=======
>>>>>>> 5cd59c5405faeb09bfe94eee0e8062fd9561699a
<!DOCTYPE html>
<html lang="en">

<head>
<<<<<<< HEAD
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
  <div class="themmoi py-[20px] bg-[#407CB4] flex items-center justify-between">
      <h2 class="lg:text-[40px]  text-[25px] ml-[50px] text-[#fff]">Update nhà sản xuất</h2>
      <div class="1"><a href="?page=manufacturer-list" class="text-[#fff] hover:underline mr-[50px]"><i class="bi bi-house-door-fill"></i> Danh mục nhà sản xuất</a> </div>
  </div>

  <!-- form sp  -->
  <div class="block p-6 rounded-lg shadow-lg bg-white ">
      <form enctype="multipart/form-data" method="POST">
          <div class="grid lg:grid-cols-2 grid-cols-1 lg:gap-4">
              <div class="form-group mb-6">
                  <label for="tendm" class=" text-[20px] font-[500">Tên nhà sản xuất</label>
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
              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput123" aria-describedby="emailHelp123" placeholder="" value="<?php echo $name ?>">
                  <small><?php check_empty("tendm", "Tên danh mục") ?></small>
                  <br>
                  
             
<a href="" class="btn font-[400] max-w-[200px]"> Nhập lại</a>
<button name="btn_submit" class="btn font-[400] ml-[10px] max-w-[200px]">  Update nhà sản xuất </button>
              </div>
           
            

</form>
</div>


<!-- form end  -->






</div>
<!-- grid end  -->
=======
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/styles/main.css">
    <link rel="stylesheet" href="/styles/tailwind.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="flex items-stretch">
        <?php include_once "/xampp/htdocs/PRO1014/admin/components/sidebar.php" ?>
        <section class="w-full">
            <div class="bg-primary px-12 py-8 flex justify-between items-center mb-10">
                <h1 class="text-3xl text-white">Cập nhật nhà sản xuất</h1>
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
                <?php
                if (isset($_GET['id'])) :
                    $manufacturer = get_one_manufacturer($_GET['id']);
                    extract($manufacturer);

                ?>
                    <form action="/admin/controllers/manufacturer.php" method="POST" onsubmit="handleUpdateManError(this,event)" class="mb-10">
                        <div class="max-w-3xl flex flex-col gap-5">
                            <div class="form-control">
                                <label for="" class="label">Tên nhà sản xuất</label>
                                <input type="hidden" name="man_id" placeholder="" value=<?= $id ?>>
                                <input type="text" data-name="nhà sản xuất" name="man_name" class="input input-bordered" value="<?php echo $name ?>">
                                <small class="text-base text-error error-message font-semibold"></small>
                            </div>
                            <div class="form-control">
                                <button type="submit" name="update_manufacturer" class="btn hover:btn-primary w-auto">Cập nhật</button>
                            </div>
                        </div>
                    </form>
                <?php endif; ?>
                <div>
                    <table class="table w-full">
                        <tr class="border-b">
                            <th>Sản phẩm</th>
                            <th>Mã nhà sản xuất (đã xóa)</th>
                        </tr>
                        <?php foreach (get_products_have_no_manufacturer() as $item) : extract($item) ?>
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

    </div>
    <script src="./js/common.js"></script>
    <script src="./js/validate.js"></script>
    <script>
        const handleUpdateManError = (form, event) => {
            const man_name = form['man_name']
            if (areRequired(man_name) == false) event.preventDefault()
        }
    </script>
>>>>>>> 5cd59c5405faeb09bfe94eee0e8062fd9561699a
</body>

</html>

<?php
<<<<<<< HEAD

include_once 'lib/db_execute.php';


$product = "SELECT product.*, manufacturer.name AS manu_name FROM product INNER JOIN  manufacturer ON  manufacturer.id = product.man_id";

$products =  select_all_records($product);

if(!isset($_GET['man_id'])){
    $product = "SELECT product.*, manufacturer.name AS manu_name FROM product INNER JOIN  manufacturer ON  manufacturer.id = product.man_id";
    $products =  select_all_records($product);
}else{

    $idd = $_GET['man_id'];
    $product = "SELECT product.*, manufacturer.name AS manu_name FROM product INNER JOIN  manufacturer ON  manufacturer.id = product.man_id having man_id = $idd";
    $products = select_all_records ($product);

}

// $product = select_all_records("SELECT * FROM product where id");

// $result = execute_query("SELECT COUNT(1) FROM order_items where id = product_id"); 
// $num_rows = execute_query($result, 0, 0);
// 
// echo $num_rows;
$sql2 = "SELECT * FROM product_category order by id";
$product_category = select_all_records ($sql2);

$sql3 = "SELECT * FROM manufacturer order by id";
   $manufacturer = select_all_records ($sql3);



// if(!isset($_GET['man_id'])){
//     $sql3 = "SELECT * FROM manufacturer order by id";
//     $manufacturer = select_all_records ($sql3);
// }else{
//     $idd = $_GET['man_id'];
//     $sql3 = "SELECT * FROM manufacturer where id = $idd ";
//     $manufacturer = select_all_records ($sql3); 
// }


?>


=======
$products = !isset($_GET['man_id']) ? get_all_products() : get_product_by_manu($_GET['man_id']);
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
         <div class="quanly bg-[#407CB4] py-[30px] flex justify-between items-center">
            <div class="left">
            <h2 class="text-[#fff] text-[40px] mx-[30px]">Quản lý sản phẩm</h2>
            </div>
            <div class="right flex gap-[30px] px-[30px]">
              .
              <div class="dropdown  dropdown-end">
  <label tabindex="0" class="btn m-1 "><i class="bi bi-list mr-3"></i>menu</label>
  <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-80">
    <li>  <a href="?page=categories-list" class=" hover:underline"><i class="bi bi-folder "></i> Danh mục sản phẩm</a></li>
    <li>  <a href="?page=product-create" class=" hover:underline"><i class="bi bi-file-earmark-plus"></i> Thêm sản phẩm</a></li>
    <li>  <a href="?page=manufacturer-list" class=" hover:underline"><i class="bi bi-house-door-fill"></i> Nhà sản xuất</a></li>
  </ul>
</div>
    
      

           
                
            </div>
         </div>


            <div class="timkiem pl-[100px] py-[30px] " >
           
    
            <select class="py-[10px] border-[1px] rounded border-[#000]  text-center ml-[20px]" name="id_man" id="" onchange="window.location = this.value">
            <option value="?page=product-list" selected> Tất cả</option>
                <?php
foreach ($manufacturer as $manu) {
    extract($manu);
?>

<option value="?page=product-list&man_id=<?php echo $id ?>"  <?php if(isset($_GET['man_id']) && $_GET['man_id'] == $id) echo 'selected' ?> >     <?php  echo $name ?>   </option>;

   
    
<?php 
}
?>

            </select>
           
            </div>

<div class="overflow-x-auto">
    <table class="table table-compact w-full">
        <thead>
            <tr>
                <th class="pl-6">Sản phẩm</th>
                <th>Kho hàng</th>
                <th>Giảm giá</th>
                <th>Đánh giá</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products  as $item) : extract($item) ?>
        
                <tr>
                    <td>
                        <div class="flex items-center gap-2">
                            <picture>
                                <img src=<?= $image ?> >
                            </picture>
                            <div>
                                
                                <h3 class="text-xl"><?= $prod_name ?></h3>
                                <p class="text-base text-[color:var(--primary-color)]"><?= $price ?></p>
                                <p class="text-base text-[color:var(--primary-color)]">Hãng sản xuất : <?= $manu_name ?></p>
                            </div>
                        </div>
                    </td>
                    <td>   <?= $stock ?></td>

                        
                    <td><?= $discount?></td>
                    <td> <div class="rating">
                                                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                                                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                                                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                                                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" checked/>
                                                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                                                            </div> </td>

                                                            <td><a href="?page=product-update&id=<?php echo $id ?>"><i class="bi bi-pencil-square text-[25px]"></i></a> <a href="?page=product-delete&id=<?php echo $id ?> "><i class="bi bi-trash3-fill text-red-600 text-[25px] ml-[10px]"></i></a></td>
                                                         
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
  
   
</div>
</div> 
=======
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục sản phẩm</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="flex sm:flex-col-reverse items-stretch">
        <!-- import sidebar component -->
        <?php include_once "./admin/components/sidebar.php" ?>
        <section class="w-full">
            <div class="bg-primary px-[50px] py-[30px] flex justify-between items-center">
                <h3 class="text-3xl text-white">Danh sách sản phẩm</h3>
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
                <div class="flex justify-between items-center my-5">
                    <select name="" onchange="window.location = this.value" class="select select-bordered">
                        <option value=<?php echo "admin.php?page=product-list" ?>>Tất cả sản phẩm</option>
                        <?php foreach (get_all_manufacturer() as $item) : extract($item) ?>
                            <option value=<?php echo "admin.php?page=product-list&man_id={$id}" ?> <?php if (isset($_GET['man_id']) && $_GET['man_id'] == $id) echo "selected" ?>><?= $name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <a href="?page=product-create" class="btn btn-ghost"><i class="bi bi-plus text-2xl"></i><span>Thêm mới</span></a>
                </div>

                <!-- product list -->
                <table class="table table-compact w-full">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Kho hàng</th>
                            <th>Giảm giá</th>
                            <th>Lượt mua</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- lấy ra tất cả -->
                        <?php
                        foreach ($products as $item) : extract($item) ?>
                            <tr>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <img src=<?= ROOT_PRODUCT . $image ?> alt="" style="width: 100px; height:100px; object-fit:contain">
                                        <div class="flex flex-col justify-center gap-3">
                                            <span class="text-xl font-medium"><?= $prod_name ?> </span>
                                            <span class="text-lg"><?= $price . "₫" ?> </span>
                                        </div>

                                    </div>
                                </td>
                                <td class="text-lg"><?= $stock ?></td>
                                <td class="text-lg"><?= $discount . "%" ?></td>
                                <td class="text-lg"><?= get_bought_counter($id)  ?></td>
                                <td class="text-lg">
                                    <a href=<?php echo "?page=product-update&id={$id}" ?> class="font-medium hover:text-primary hover:link">Sửa</a>/
                                    <a href=<?php echo "./admin/controllers/product.php?id={$id}" ?> class="font-medium hover:text-error hover:link" onclick="return confirm(`Bạn chắc chắn muốn xóa sản phẩm này?`)">Xóa</a>
                                </td>
                            </tr>
                        <?php
                        endforeach; ?>
                        <!--  -->
                    </tbody>
                </table>
            </div>
        </section>

    </div>
>>>>>>> 5cd59c5405faeb09bfe94eee0e8062fd9561699a
</body>

</html>
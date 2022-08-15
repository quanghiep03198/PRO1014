<<<<<<< HEAD

<?php  

  $cate_list =  select_all_records("SELECT * FROM  product_category order by id");
 




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
    
=======
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="/path/or/uri/to/tinymce.min.js" referrerpolicy="origin"></script>

>>>>>>> 5cd59c5405faeb09bfe94eee0e8062fd9561699a
    <script>
        tinymce.init({
            selector: '#mytextarea'
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
    <div class="quanly bg-[#407CB4] py-[30px] flex justify-between items-center">
            <div class="left">
            <h2 class="text-[#fff] text-[40px] mx-[30px]">Danh mục sản phẩm</h2>
            </div>
            <div class="right flex gap-[30px] px-[30px]">
        
                <div class="1"><a href="?page=categories-create" class="text-[#fff] hover:underline"><i class="bi bi-file-earmark-plus"></i> Thêm mới danh mục</a> </div>
                
            </div>
         </div>

    <!-- form sp  -->
    <div class="overflow-x-auto">
    <table class="table table-compact w-full">
        <thead>
            <tr>
                <th class="pl-6">Danh mục</th>
                <th>Số sản phẩm</th>         
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cate_list  as $item) : extract($item) ?>
        
                <tr>
                    <td>
                        <div class="flex items-center gap-2">
                            <picture>
                                <img src=<?= $image ?> >
                            </picture>
                            <div>
                                
                                <h3 class="text-xl"><?= $name ?></h3>
                              
                                
                            </div>
                        </div>
                    </td>
                    <td>   <?= "?" ?></td>

                        
                    
                                                            <td><a href="?page=categories-update&id=<?php echo $id ?>"><i class="bi bi-pencil-square text-[25px]"></i></a> <a href="?page=categories-delete&id=<?php echo $id ?> "><i class="bi bi-trash3-fill text-red-600 text-[25px] ml-[10px]"></i></a></td>
                                                         
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
  
   
</div>

<!-- form end  -->






</div>
<!-- grid end  -->
=======
    <div class="flex items-stretch">

        <!-- import sidebar from component  -->
        <?php include_once "/xampp/htdocs/PRO1014/admin/components/sidebar.php" ?>
        <!-- sidebar  end -->
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

            <!-- form sp  -->
            <div class="container mx-auto">
                <div class="flex justify-end items-center my-5">
                    <a href="?page=categories-create" class="btn btn-ghost "><i class="bi bi-plus text-2xl"></i><span>Thêm mới</span></a>
                </div>

                <table class="table w-full">
                    <thead>
                        <tr>
                            <th><span class="text-lg">Danh mục</span> </th>
                            <th><span class="text-lg">Số sản phẩm</span> </th>
                            <th><span class="text-lg">Thao tác</span> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (get_all_categories()  as $item) : extract($item) ?>
                            <tr>
                                <td>
                                    <h3 class="text-lg"><?= $name ?></h3>
                                </td>
                                <td> <?= $productQtyEachCate = get_product_qty_each_cate($id) != null ? get_product_qty_each_cate($id) : 0 ?></td>
                                <td>
                                    <a href="?page=categories-update&id=<?php echo $id ?>" class="font-medium hover:text-primary">Sửa</a> /
                                    <a href="./admin/controllers/category.php?id=<?php echo $id ?>" class="font-medium hover:text-error" onclick="return confirm('Bạn chắc chắn muốn xóa danh mục sản phẩm này?')">Xóa
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </section>
        <!-- grid end  -->
>>>>>>> 5cd59c5405faeb09bfe94eee0e8062fd9561699a
</body>

</html>
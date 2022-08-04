
<?php  

$cate_list =  select_all_records("SELECT * FROM  services order by id");





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
  <div class="quanly bg-[#407CB4] py-[30px] flex justify-between items-center">
          <div class="left">
          <h2 class="text-[#fff] text-[40px] mx-[30px]">Danh mục dịch vụ</h2>
          </div>
          <div class="right flex gap-[30px] px-[30px]">
      
              <div class="1"><a href="?page=services-create" class="text-[#fff] hover:underline"><i class="bi bi-file-earmark-plus"></i> Thêm mới dịch vụ</a> </div>
              
          </div>
       </div>

  <!-- form sp  -->
  <div class="overflow-x-auto">
  <table class="table table-compact w-full">
      <thead>
          <tr>
              <th class="pl-6">Dịch vụ</th>
              <th>Giá dịch vụ</th>         
              <th>Thao tác</th>
          </tr>
      </thead>
      <tbody>
          <?php foreach ($cate_list  as $item) : extract($item) ?>
      
              <tr>
                  <td>
                      <div class="flex items-center gap-2">
                          
                          <div>
                              
                              <h3 class="text-xl"><?= $name ?></h3>
                            
                              
                          </div>
                      </div>
                  </td>
                  <td>   <?= $cost ?></td>

                      
                  
                                                          <td><a href="?page=services-update&id=<?php echo $id ?>"><i class="bi bi-pencil-square text-[25px]"></i></a> <a href="?page=services-delete&id=<?php echo $id ?> "><i class="bi bi-trash3-fill text-red-600 text-[25px] ml-[10px]"></i></a></td>
                                                       
                  
              </tr>
          <?php endforeach; ?>
      </tbody>
  </table>

 
</div>

<!-- form end  -->






</div>
<!-- grid end  -->
</body>

</html>
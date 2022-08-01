<?php

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

</body>

</html>
<?php
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

<?php
include_once "../../lib/validate.php";
include_once "../../lib/global.php";
include_once "../../lib/db_execute.php";

// xử lý thêm sản phẩm
if (isset($_POST['create_product'])) :
    $error_count = 0;
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $manufacturer = $_POST['manufacturer'];
    $discount = $_POST['discount'];
    $stock = $_POST['stock'];
    $warranty_time = $_POST['warranty_time'];
    $description = $_POST['description'];
    // check lỗi phía server
    check_empty($product_name, $price, $category, $manufacturer, $stock, $warranty_time, $description);
    check_image("product_image", 'update_product');

    if ($error_count != 0)
        echo "số lỗi: " . $error_count;
    // check tên sản phẩm đã tồn tại trong database hay chưa ?
    if ($error_count == 0) :
        $image = upload_file("../../img/products/", "product_image");
        $sql = "INSERT INTO product (prod_name, cate_id, image, price, description, discount, stock, warranty_time, man_id) 
                VALUES ('{$product_name}', '{$category}', '{$image}', {$price}, '{$description}', '{$discount}', {$stock}, {$warranty_time}, '{$manufacturer}')";
        execute_query($sql);
        echo "<script>
                alert(`Thêm sản phẩm thành công!`);
                history.go(-1)
            </script>";
    endif;

endif;
// sửa sản phẩm
if (isset($_POST['update_product'])) :
    $error_count = 0;
    $id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $manufacturer = $_POST['manufacturer'];
    $discount = $_POST['discount'];
    $stock = $_POST['stock'];
    $warranty_time = $_POST['warranty_time'];
    $description = $_POST['description'];
    // check lỗi phía server
    check_empty($id, $product_name, $price, $category, $manufacturer, $stock, $warranty_time, $description);
    check_image("product_image", 'update_product');

    if ($error_count != 0)
        echo "số lỗi: " . $error_count;
    // check tên sản phẩm đã tồn tại trong database hay chưa ?
    if ($error_count == 0) :
        $image = upload_file("../../img/products/", "product_image");
        $sql = "UPDATE product SET 
                prod_name = '{$product_name}',
                cate_id = '{$category}',
                image = '{$image}',
                price = {$price},
                description = '{$description}',
                discount = {$discount},
                stock = {$stock},
                warranty_time = {$warranty_time},
                man_id ='{$manufacturer}'
                WHERE id = {$id}";
        execute_query($sql);
        echo "<script>
                alert(`Update sản phẩm thành công!`);
                history.go(-1)
            </script>";
    endif;
endif;
// xóa sản phẩm
if (isset($_GET['id'])) {
    execute_query("DELETE FROM product WHERE id = {$_GET['id']}");
    header("Location: ?page=product-list");
}

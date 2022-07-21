<?php
include 'lib/db_execute.php';
// lấy tất cả sản phảm
function get_all_products()
{
    $sql = "SELECT * FROM product";
    $products = select_all_records($sql);
    return $products;
}
// lấy ra 1 sản phẩm
function get_one_product()
{
    if (isset($_GET['id'])) :
        $sql = "SELECT * FROM product WHERE product_id = ";
        $product = select_single_record($sql);
        return $product;
    endif;
}
// thêm sản phẩm
function add_product()
{
    global $error;
    if (isset($_POST['add_product'])) :
        if (!empty($error)) 
        return;
        $product_name = $_POST['product_name'];
        $cate = $_POST['cate'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $stock= $_POST['stock'];
        $warranty_time = $_POST['warranty'];
        $manufacturer = $_POST['manu'];
$img = 
        $sql = "INSERT INTO product (product_name, cate_id, product_img, price, description, discount, stock, warranty_time, manu_id) 
VALUES ();"
        
    endif;
}

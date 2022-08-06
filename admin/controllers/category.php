<?php
include_once "../../lib/validate.php";
include_once "../../lib/global.php";
include_once "../../lib/db_execute.php";
// thêm mới danh mục
if (isset($_POST['create_category'])) :
    $error_count = 0;
    $cate_id = $_POST['cate_id'];
    $cate_name = $_POST['cate_name'];

    check_empty($cate_name);
    if ($error_count == 0) :
        $sql1 =  "INSERT INTO `product_category`(id, name) VALUES ({$cate_id},'{$cate_name}')";
        execute_query($sql1);
        if ($cate_id != null) :
            $sql2 = "UPDATE product SET cate_id = {$cate_id} 
                    WHERE cate_id NOT IN (SELECT id FROM product_category')";
            execute_query($sql2);
        endif;
        echo "<script>alert(`Đã thêm mới danh mục sản phẩm!`);</script>";
        header("Location: ../../admin.php?page=categories-list");
    endif;
endif;
// update danh mục
if (isset($_POST['update_category'])) :
    $error_count = 0;
    $cate_id = $_POST['cate_id'];
    echo $cate_id;

    $cate_name = $_POST['cate_name'];
    check_empty($cate_id, $cate_name);
    if ($error_count == 0) :
        $sql =  "UPDATE product_category SET name = '{$cate_name}' WHERE id = {$cate_id}";
        execute_query($sql);
        echo "<script>alert(`Update danh mục sản phẩm thành công!`);</script>";
        header("Location: ../../admin.php?page=categories-list");

    endif;
endif;
if (isset($_GET['id'])) {
    $sql = "DELETE FROM product_category WHERE id = {$_GET['id']}";
    execute_query($sql);
    header("Location: ../../admin.php?page=categories-list");
}

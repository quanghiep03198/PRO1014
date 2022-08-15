<?php
include_once "../../lib/validate.php";
include_once "../../lib/global.php";
include_once "../../lib/db_execute.php";

if (isset($_POST['create_post_cate'])) :
    $error_count = 0;
    $cate_id = $_POST['cate_id'];
    $cate_name = $_POST['cate_name'];

    check_empty($cate_name);
    if ($error_count == 0) :
        $sql1 =  "INSERT INTO post_category (id, name) VALUES ('{$cate_id}','{$cate_name}')";
        execute_query($sql1);
        if ($cate_id != null) :
            $sql2 = "UPDATE posts SET post_cate_id = {$cate_id} 
                    WHERE post_cate_id NOT IN (SELECT id FROM post_category')";
            execute_query($sql2);
        endif;
        header("Location: ../../admin.php?page=post_cate-list");
    endif;
endif;
// update danh mục
if (isset($_POST['update_cate_category'])) :
    $error_count = 0;
    $cate_id = $_POST['cate_id'];
    echo $cate_id;

    $cate_name = $_POST['cate_name'];
    check_empty($cate_id, $cate_name);
    if ($error_count == 0) :
        $sql =  "UPDATE post_category SET name = '{$cate_name}' WHERE id = {$cate_id}";
        execute_query($sql);
        header("Location: ../../admin.php?page=post_cate-list");

    endif;
endif;
if (isset($_GET['id'])) {
    $sql = "DELETE FROM post_category WHERE id = {$_GET['id']}";
    execute_query($sql);
    header("Location: ../../admin.php?page=post_cate-list");
}

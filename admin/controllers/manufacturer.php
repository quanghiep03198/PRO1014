<?php
include_once "../../lib/validate.php";
include_once "../../lib/global.php";
include_once "../../lib/db_execute.php";


if (isset($_POST['create_manufacturer'])) :
    $man_name = $_POST['man_name'];
    $error_count = 0;
    check_empty($man_name);
    if ($error_count == 0) :
        $sql = "INSERT INTO manufacturer (name) VALUES ('{$man_name}')";
        execute_query($sql);
        if ($man_id != null) :
            $sql2 = "UPDATE product SET man_id = {$man_id} 
                    WHERE man_id NOT IN (SELECT id FROM manufacturer')";
            execute_query($sql2);
        endif;
    endif;
    header("Location: ../../admin.php?page=manufacturer-list");
endif;


if (isset($_POST['update_manufacturer'])) :
    $man_name = $_POST['man_name'];
    $man_id = $_POST['man_id'];
    $error_count = 0;
    check_empty($man_name);
    if ($error_count == 0) :
        $sql = "UPDATE manufacturer SET name = '{$man_name}' WHERE id = {$man_id}";
        execute_query($sql);
        header("Location: ../../admin.php?page=manufacturer-list");
    endif;
endif;

if (isset($_GET['id'])) {
    $sql = "DELETE FROM manufacturer WHERE id = {$_GET['id']}";
    execute_query($sql);
    header("Location: ../../admin.php?page=manufacturer-list");
}

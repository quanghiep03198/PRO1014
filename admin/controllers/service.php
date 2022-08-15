<?php
include_once "../../lib/validate.php";
include_once "../../lib/global.php";
include_once "../../lib/db_execute.php";
// thêm mới dịch vụ
if (isset($_POST['create_service'])) :
    $service_name = $_POST['service_name'];
    $cost = $_POST['cost'];
    $error_count = 0;

    check_empty($service_name, $cost);
    if ($error_count == 0) :
        $sql = "INSERT INTO services (name,cost) VALUES ( '{$service_name}', {$cost} )";
        execute_query($sql);
        header("Location: ../../admin.php?page=service-list");
    endif;
endif;
// update dịch vụ
if (isset($_POST['update_service'])) :
    $service_name = $_POST['service_name'];
    $cost = $_POST['cost'];
    $error_count = 0;

    check_empty($service_name, $cost);
    if (
        $error_count == 0
    ) :
        $sql = "UPDATE services SET name = '{$service_name}', cost = {$cost}";
        execute_query($sql);
        header("Location: ../../admin.php?page=service-list");
    endif;
endif;

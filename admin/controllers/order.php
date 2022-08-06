<?php
include_once "../../lib/validate.php";
include_once "../../lib/global.php";
include_once "../../lib/db_execute.php";

if (isset($_POST['update_order_stt'])) {
    $stt_id = $_POST['order_status'];
    $order_id = $_POST['order_id'];
    $sql = "UPDATE orders SET order_stt_id = {$stt_id} WHERE id = {$order_id}";
    execute_query($sql);
    header("Location: ../../admin.php?page=order-list");
}

<?php
include "../../lib/db_execute.php";
$json = file_get_contents("php://input");
$data = json_decode($json, true);
extract($data);
$cancel_stt_id = select_one_value("SELECT id from order_status WHERE stt_name LIKE '%đã hủy%'");
$sql = "UPDATE orders SET order_stt_id = {$cancel_stt_id} WHERE orders.id = {$order_id}";
execute_query($sql);
echo $json;

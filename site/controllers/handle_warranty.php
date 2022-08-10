<?php
include_once "../../lib/db_execute.php";
include_once "../../site/models/order.php";

$json = file_get_contents("php://input");
$data = json_decode($json, true);
extract($data);
$response = json_encode(get_warranty_expired_date($customer_infor, $order_key_id));
echo $response;

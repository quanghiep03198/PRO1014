<?php
include_once '../../lib/db_execute.php';

$json = file_get_contents("php://input");
$data = json_decode($json, true);
extract($data);
$sql = "INSERT INTO product_feedback (order_item_id,user_id,pr_review_id)
        VALUES({$order_item_id},{$user_id},{$pr_review_id})";
execute_query($sql);

echo $json;

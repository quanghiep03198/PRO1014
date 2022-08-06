<?php
include_once '../../lib/db_execute.php';
$json = file_get_contents("php://input");
$data = json_decode($json, true);
extract($data);
$comment_id = execute_query("INSERT INTO product_comment (user_id,product_id,cmt_content,comment_date) 
                                VALUE ('{$user}',{$product},'{$content}',DATE(NOW()))");
echo $json;

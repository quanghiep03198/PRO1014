<?php
include_once '../../lib/db_execute.php';
$json = file_get_contents("php://input");
$data = json_decode($json, true);

if (!array_key_exists("req", $data)) {
    extract($data);
    $commentId = execute_query("INSERT INTO product_comment (user_id,product_id,cmt_content,comment_date) 
                                VALUE ('{$user}',{$product},'{$content}',DATE(NOW()))");
    $data['posted_date'] = date('Y-m-d');
    $data['commentId'] = $commentId;
    echo json_encode($data);
}
if (array_key_exists("req", $data)) {
    extract($data);
    $data['posted_date'] = date('Y-m-d');
    execute_query(
        "INSERT INTO product_comment_reply (user_id, content, rep_date, cmt_id) VALUE ({$user}, '{$content}', DATE(NOW()), {$commentId})"
    );
    echo json_encode($data);
}
if (array_key_exists("post", $data)) {
    $data['posted_date'] = date('Y-m-d');
    extract($data);
    execute_query("INSERT INTO post_comment (user_id,post_id,content,posted_date) 
                    VALUE ('{$user}',{$post},'{$content}',DATE(NOW()) )");
    echo json_encode($data);
}

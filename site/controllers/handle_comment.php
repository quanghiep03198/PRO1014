<?php
include_once '../../lib/db_execute.php';
include_once '../../site/models/comment.php';

$json = file_get_contents("php://input");
$data = json_decode($json, true);
/**
 * bình luận và phản hồi bình luận về sản phẩm
 */
if (!array_key_exists("req", $data) && array_key_exists("productId", $data)) {
    extract($data);
    $commentId = execute_query("INSERT INTO product_comment (user_id,product_id,cmt_content,comment_date) 
                                VALUES ('{$user}',{$product},'{$content}',DATE(NOW()))");
    $data['commentId'] = $commentId;
    $data['posted_date'] = date('Y-m-d');
    $data['rep_counter'] = get_reply_counter($commentId);
    echo json_encode($data);
}

if (array_key_exists("req", $data) && array_key_exists("productId", $data)) {
    extract($data);
    execute_query(
        "INSERT INTO product_comment_reply (user_id, content, rep_date, cmt_id) VALUES ({$user}, '{$content}', DATE(NOW()), {$commentId})"
    );
    $data['posted_date'] = date('Y-m-d');
    $data['rep_counter'] = get_reply_counter($commentId);

    echo json_encode($data);
}
/**
 * bình luận và phản hồi bình luận về bài viết
 */
if (!array_key_exists("req", $data) && array_key_exists("postId", $data)) {
    extract($data);
    $commentId = execute_query("INSERT INTO post_comment (user_id,post_id,content,posted_date) 
                    VALUES ({$user},{$postId},'{$content}',DATE(NOW()))");
    $data['posted_date'] = date('Y-m-d');
    $data['commentId'] = $commentId;
    $data['rep_counter'] = get_post_reply_counter($commentId);
    echo json_encode($data);
}

if (array_key_exists("req", $data) && array_key_exists("postId", $data)) {
    extract($data);
    execute_query(
        "INSERT INTO post_comment_reply (user_id, content, rep_date, cmt_id) VALUES ({$user}, '{$content}', DATE(NOW()), {$commentId})"
    );
    $data['posted_date'] = date('Y-m-d');
    $data['rep_counter'] = get_post_reply_counter($commentId);
    echo json_encode($data);
}

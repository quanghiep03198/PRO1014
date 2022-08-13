<?php
// lấy tất cả bình luận về bài viết
function get_all_post_comments($post_id)
{
    $sql = "SELECT post_comment.*, users.name AS username,users.avatar AS avatar FROM post_comment
            INNER JOIN users ON post_comment.user_id = users.id
            INNER JOIN posts ON post_comment.post_id = posts.id
            WHERE post_comment.post_id = {$post_id}";
    return select_all_records($sql);
}

// lấy tất cả phản hồi bình luận về bài viết
function get_post_reply_comment($comment_id)
{
    $sql = "SELECT post_comment_reply.* , users.name AS username, users.avatar AS avatar 
            FROM post_comment_reply
            INNER JOIN users ON post_comment_reply.user_id = users.id
            INNER JOIN post_comment ON post_comment.id = post_comment_reply.cmt_id
            WHERE post_comment_reply.cmt_id = {$comment_id}";
    return select_all_records($sql);
}

// lấy tổng số phản hồi của 1 bình luận về bài viết
function get_post_reply_counter($comment_id)
{
    $sql = "SELECT COUNT(id) AS reply_counter FROM post_comment_reply WHERE cmt_id = {$comment_id}";
    return select_one_value($sql);
}



// lấy tất cả bình luận về sản phảm
function get_all_comments_of_prod($prod_id)
{
    $sql = "SELECT product_comment.*, users.name AS username,users.avatar AS avatar FROM product_comment
            INNER JOIN users ON product_comment.user_id = users.id
            INNER JOIN product ON product_comment.product_id = product.id
            WHERE product_comment.product_id = {$prod_id}";
    return select_all_records($sql);
}


// lấy tất cả phản hồi bình luận về sản phẩm
function get_product_reply_comments($comment_id)
{
    $sql = "SELECT product_comment_reply.* , users.name AS username, users.avatar AS avatar 
            FROM product_comment_reply
            INNER JOIN users ON product_comment_reply.user_id = users.id
            INNER JOIN product_comment ON product_comment.pr_comment_id = product_comment_reply.cmt_id
            WHERE product_comment_reply.cmt_id = {$comment_id}";
    return select_all_records($sql);
}


// lấy tất cả số lượng phản hồi về sản phẩm
function get_reply_counter($comment_id)
{
    $sql = "SELECT COUNT(id) AS reply_counter FROM product_comment_reply WHERE cmt_id = {$comment_id}";
    return select_one_value($sql);
}

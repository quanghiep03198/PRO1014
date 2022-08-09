<?php
function get_all_post_comments($post_id)
{
    $sql = "SELECT post_comment.*, users.name AS username,users.avatar AS avatar FROM post_comment
            INNER JOIN users ON post_comment.user_id = users.id
            INNER JOIN posts ON post_comment.post_id = posts.id
            WHERE post_comment.post_id = {$post_id}";
    return select_all_records($sql);
}
function get_all_comments_of_prod($prod_id)
{
    $sql = "SELECT product_comment.*, users.name AS username,users.avatar AS avatar FROM product_comment
            INNER JOIN users ON product_comment.user_id = users.id
            INNER JOIN product ON product_comment.product_id = product.id
            WHERE product_comment.product_id = {$prod_id}";
    return select_all_records($sql);
}
function get_all_rep_comment($comment_id)
{
    $sql = "SELECT product_comment_reply.* , users.name AS username, users.avatar AS avatar 
            FROM product_comment_reply
            INNER JOIN users ON product_comment_reply.user_id = users.id
            INNER JOIN product_comment ON product_comment.pr_comment_id = product_comment_reply.cmt_id
            WHERE product_comment_reply.cmt_id = {$comment_id}";
    return select_all_records($sql);
}

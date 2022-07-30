<?php
function get_all_comments()
{
    $sql = "SELECT product_comment.*, users.name AS username,users.avatar AS avatar FROM product_comment
            INNER JOIN users ON product_comment.user_id = users.id
            INNER JOIN product ON product_comment.product_id = product.id";
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
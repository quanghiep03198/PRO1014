<?php

// lấy tất cả bài viết
function get_all_posts()
{
    $sql = "SELECT posts.*,users.name AS author,users.avatar AS avatar, DATE(posted_date) AS create_date FROM posts 
            INNER JOIN users ON posts.author_id = users.id";
    return select_all_records($sql);
}
// lấy ra 1 bài viết theo mã bài viết
function get_one_post($post_id)
{
    $sql = "SELECT posts.title,
    posts.body,
    posts.short_desc,
    DATE(posted_date) AS posted_date,
    users.name AS author,
    users.avatar AS avatar 
     FROM posts 
            INNER JOIN users ON posts.author_id = users.id WHERE posts.id = {$post_id}";
    return select_single_record($sql);
}
// lấy ra bài viết theo danh mục
function get_posts_groupby_cate($cate_id)
{
    $sql = "SELECT posts.*, users.name AS author_name, post_category.name FROM posts
            INNER JOIN users ON post.author_id = user.id
            INNER JOIN post_category ON post.post_cate_id = post_category.id
            WHERE posts.post_cate_id = {$cate_id}
            ORDER BY post.posted_date";
    return select_all_records($sql);
}

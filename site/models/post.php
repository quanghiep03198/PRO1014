<?php

// lấy tất cả bài viết
function get_all_posts()
{
    $sql = "SELECT posts.*,users.name AS author,users.avatar AS avatar, DATE(posted_date) AS create_date, COUNT(posts.id) AS num_of_posts FROM posts 
            INNER JOIN users ON posts.author_id = users.id
            GROUP BY posts.id";
    return select_all_records($sql);
}
// lấy ra 1 bài viết theo mã bài viết
function get_one_post($post_id)
{
    $sql = "SELECT posts.id,posts.title,
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
    $sql = "SELECT posts.*, users.name AS author_name, post_category.name AS cate_name FROM posts
            INNER JOIN users ON posts.author_id = users.id
            INNER JOIN post_category ON posts.post_cate_id = post_category.id
            WHERE posts.post_cate_id = {$cate_id}
            GROUP BY posts.id
            ORDER BY posts.posted_date";
    return select_all_records($sql);
}
// lấy ra top 3 bài viết mới nhất
function get_new_posts($start, $last)
{
    $sql = "SELECT posts.*,users.name AS author,users.avatar AS avatar, DATE(posted_date) AS create_date FROM posts 
            INNER JOIN users ON posts.author_id = users.id
            LIMIT {$start},{$last}";
    return select_all_records($sql);
}
// lấy ra danh mục bài viết
function get_post_categories()
{
    $sql = "SELECT * FROM post_category";
    return select_all_records($sql);
}
function get_posts_by_kw($keyword)
{
    $sql = "SELECT posts.*,users.name AS author,users.avatar AS avatar,post_category.name AS cate_name, DATE(posted_date) AS create_date FROM posts 
            INNER JOIN users ON posts.author_id = users.id
             INNER JOIN post_category ON posts.post_cate_id = post_category.id
             WHERE post_category.name LIKE '%{$keyword}%' OR 
             posts.title LIKE '%{$keyword}%' OR
             posts.short_desc LIKE '%{$keyword}%'";
    return select_all_records($sql);
}
// lấy ra các bài viết có lượt bình luận cao nhất
function get_most_comment_post()
{
    $sql = "SELECT 	posts.* ,
                    users.name AS author_name,
                    users.avatar AS avatar, 
                    DATE(posts.posted_date) AS create_date,
                    COUNT(post_comment.id) AS comment_counter
            FROM posts
            JOIN users ON posts.author_id = users.id
            JOIN post_comment ON posts.id = post_comment.post_id
            GROUP BY posts.id
            ORDER BY COUNT(post_comment.id) DESC
            LIMIT 0,3";
    return select_all_records($sql);
}

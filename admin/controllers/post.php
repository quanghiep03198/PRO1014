<?php
include_once "../../lib/validate.php";
include_once "../../lib/global.php";
include_once "../../lib/db_execute.php";
// thêm mới bài viết
if (isset($_POST['create_post'])) :
    $title = $_POST['title'];
    $short_desc = $_POST['short_description'];
    $post_cate = $_POST['post_category'];
    $body = $_POST['body'];
    $auth = $_POST['author'];

    $error_count = 0;
    check_empty($title, $short_desc, $post_cate, $title);
    check_length($title, 10);
    check_length($body, 100);
    check_image("thumbnail", "create_post");
    if ($error_count == 0) :
        $thumbnail = upload_file("../../img/posts/", "thumbnail");
        $sql = "INSERT INTO posts (body,title,short_desc,author_id,post_cate_id,img)
                VALUES ('{$body}', '{$title}', '{$short_desc}', '{$auth}', '{$post_cate}', '{$thumbnail}')";
        execute_query($sql);
        header("Location: ../../admin.php?page=post-list");
    endif;
endif;
if (isset($_POST['update_post'])) :
    $title = $_POST['title'];
    $short_desc = $_POST['short_description'];
    $post_cate = $_POST['post_category'];
    $body = $_POST['body'];
    $auth = $_POST['author'];

    $error_count = 0;
    check_empty($title, $short_desc, $post_cate, $title);
    check_length($title, 10);
    check_length($body, 100);
    check_image("thumbnail", "create_post");
    if ($error_count == 0) :
        $thumbnail = upload_file("../../img/posts/", "thumbnail");
        $sql = "UPDATE posts SET 
                body = '{$body}',
                title = '{$title}',
                short_desc = '{$short_desc}',
                post_cate_id = '{$post_cate}',
                author_id = '{$auth}',
                img = '{$thumbnail}'";
        execute_query($sql);
        header("Location: ../../admin.php?page=post-list");
    endif;
endif;
if (isset($_GET['id'])) :
    $post_id = $_GET['id'];
    $sql = "DELETE FROM posts WHERE id = {$post_id}";
    execute_query($sql);
    header("Location: ../../admin.php?page=post-list");
endif;

<?php
include_once '../../lib/db_execute.php';

if (isset($_POST['content']) && isset($_POST['product_id']) && isset($_POST['username']) && isset($_POST['user']) && isset($_COOKIE['auth'])) {
    $product = mysqli_real_escape_string(get_db_connection(), $_POST['product_id']);
    $user = mysqli_real_escape_string(get_db_connection(), $_POST['user']);
    $username = mysqli_real_escape_string(get_db_connection(), $_POST['username']);
    $avatar = mysqli_real_escape_string(get_db_connection(), $_POST['avatar']);
    $content    = mysqli_real_escape_string(get_db_connection(), $_POST['content']);
    $create_date = mysqli_real_escape_string(get_db_connection(), date("Y-m-d"));
    $comment_id = execute_query("INSERT INTO product_comment (user_id,product_id,cmt_content,comment_date) 
                                VALUE ('{$user}',{$product},'{$content}',DATE(NOW()))");
    $response =   json_encode([
        "user" => $user,
        "username" => $username,
        "avatar" => $avatar,
        "content" => $content,
        "create_date" =>   $create_date,
        "comment_id" => $comment_id,
        "product_id" => $product
    ]);
    echo $response;
}

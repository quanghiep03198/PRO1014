<?php
include_once "../../lib/validate.php";
include_once "../../lib/global.php";
include_once "../../lib/db_execute.php";
//tạo tài khoản
if (isset($_POST['create_account'])) {
    $account = $_POST['account'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];
    // validate lỗi trước khi thêm vào database
    $error_count = 0;
    check_empty($account, $username, $password, $confirm_password, $address, $email, $phone, $role);
    check_matching($password, $confirm_password);
    check_length($password, 8);
    check_email($email);
    check_phoneNumber($phone);
    echo $error_count;

    // nếu ok -> thêm vào database
    if ($error_count == 0) :
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (`account`,`password`,`name`,`email`,`address`,`phone`,`role_id`) 
        VALUES('{$account}','{$password}','{$username}','{$email}','{$address}','{$phone}',{$role})";
        $user_id = execute_query($sql);
        if ($role == 3)
            execute_query("INSERT INTO wishlist (user_id) VALUES ('{$user_id}')");
        header("Location: ../../admin.php?page=user-list");

    endif;
}

// update tài khoản
if (isset($_POST['update_account'])) {
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];
    // validate lỗi trước khi thêm vào database
    $error_count = 0;
    check_empty($username, $address, $email, $phone, $role);
    check_email($email);
    check_phoneNumber($phone);
    echo $error_count;

    // nếu ok -> thêm vào database
    if ($error_count == 0) :
        $sql = "UPDATE users SET 
                `name` =  '{$username}',
                `email` = '{$email}',
                `address` = '{$address}',
                `phone` = '{$phone}',
                `role_id` = '{$role}'
                WHERE id = {$user_id}";
        execute_query($sql);
        header("Location: ../../admin.php?page=user-list");

    endif;
}
// xóa người dùng
if (isset($_GET['id'])) {
    execute_query("DELETE FROM users WHERE id = {$_GET['id']}");
    header("Location: ../../admin.php?page=user-list");
}

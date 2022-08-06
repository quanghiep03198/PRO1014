<?php
function get_user_data($user_id)
{
    $sql = "SELECT * FROM users WHERE users.id = {$user_id}";
    return select_single_record($sql);
}
function get_all_users()
{
    $sql = "SELECT users.*, user_role.name AS role_name FROM users 
    INNER JOIN user_role ON users.role_id = user_role.id
    WHERE role_id NOT IN (SELECT role_id FROM users WHERE role_id = 0 ) ";
    return select_all_records($sql);
}
// lấy ra tất cả vai trò của tài khoản
function get_all_user_roles()
{
    $sql = "SELECT * FROM user_role";
    return select_all_records($sql);
}

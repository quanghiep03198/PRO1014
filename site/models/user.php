<?php
function get_user_data($user_id)
{
    $sql = "SELECT * FROM users WHERE users.id = {$user_id}";
    return select_single_record($sql);
}
function get_all_users()
{
    $sql = "SELECT * FROM users";
    return select_all_records($sql);
}
function get_all_account_names()
{
    $sql = "SELECT account FROM users";
    return select_all_records($sql);
}

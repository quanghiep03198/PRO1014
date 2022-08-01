<?php
function get_user_data()
{
    if (isset($_COOKIE['auth'])) {
        $sql = "SELECT * FROM users WHERE users.id = {$_COOKIE['auth']}";
        return select_single_record($sql);
    }
}
function get_all_users()
{
    $sql = "SELECT * FROM users";
    return select_all_records($sql);
}

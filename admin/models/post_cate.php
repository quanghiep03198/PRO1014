<?php
function get_all_post_cate()
{
    $sql = "SELECT * FROM post_category";
    return select_all_records($sql);
}
function get_one_post_cate($post_cate_id)
{
    $sql = "SELECT * FROM post_category WHERE id = {$post_cate_id}";
    return select_single_record($sql);
}

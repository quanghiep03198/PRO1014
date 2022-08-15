<?php

// lấy ra danh sách dịch vụ
function get_all_services()
{
    $sql = "SELECT * FROM services";
    return select_all_records($sql);
}
// lấy ra 1 dịch vụ
function get_one_service($service_id)
{
    $sql = "SELECT * FROM services WHERE id = {$service_id}";
    return select_single_record($sql);
}

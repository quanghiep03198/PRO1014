<?php
function get_all_services()
{
    $sql = "SELECT * FROM services";
    return select_all_records($sql);
}

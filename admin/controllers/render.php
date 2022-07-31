<?php
function render()
{
    $page = isset($_GET['page']) ? str_replace("-", "/", $_GET['page']) : 'statistic';
    $file = "admin/views/{$page}.php";
    if (file_exists($file))
        include_once $file;
    else
        include_once 'error.php';
}

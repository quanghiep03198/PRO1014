<?php
function page_render()
{
    include_once 'site/components/header.php';
    $page = isset($_GET['page']) ? str_replace("-", "/", $_GET['page']) : 'home';
    $file = "site/views/{$page}.php";
    if (file_exists($file))
        include_once $file;
    else
        include_once 'error.php';
    include_once 'site/components/footer.php';
}

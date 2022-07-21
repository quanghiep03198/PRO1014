<?php
function render($path, $data = [])
{
    extract($data);
    $path = str_replace(".", "/", $path);
    include_once "views/{$path}.php";
}

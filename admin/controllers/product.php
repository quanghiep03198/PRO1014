<?php
require_once "models/product.php";
require_once "render.php";
function showProduct()
{
    $product = get_all_products();
    render("/product/list", ["products" => $product]);
}

<?php
require_once "../lib/routes.php";
require_once "controllers/product.php";

router_on("/admin/", function () {
});
// all product
router_on("/admin/product/list", function () {
    showProduct();
});
// one product
router_on("/admin/product/list?id", function () {
});

router_on("/404", function () {
    include './views/error.php';
});
router_resolve();

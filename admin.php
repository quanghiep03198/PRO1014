<?php
// using global variable
include_once 'lib/global.php';
include_once 'lib/db_execute.php';
include_once 'lib/validate.php';

// using models
include_once './admin/models/product.php';
// include_once './admin/models/order.php';
// using controllers
include_once './admin/controllers/render.php';

render();

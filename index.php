<?php
include_once 'lib/global.php';
// using global variable
include_once 'lib/db_execute.php';
include_once 'lib/validate.php';
include_once 'site/models/product.php';
include_once 'site/controllers/render.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <?php
    include_once 'site/components/header.php';
    render();
    include_once 'site/components/footer.php' ?>
    <script type="module" src="site/js/cart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="site/js/swiper.js"></script>
</body>

</html>
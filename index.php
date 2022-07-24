<?php
// using global variable/function
include_once 'lib/global.php';
include_once 'lib/db_execute.php';
include_once 'lib/validate.php';
// using models
include_once 'site/models/product.php';
// using controllers
include_once 'site/controllers/render.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="styles/main.css">

</head>

<body class="relative">
    <?php page_render();
    $cartItems = '<script>localStorage.getItem("cart")</script>';
    echo $cartItems;
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="site/js/swiper.js"></script>
    <script type="text/javascript">
        const $ = document.querySelector.bind(document);
        const $$ = document.querySelectorAll.bind(document);
    </script>
    <script type="text/javascript" src="site/js/cart.js"></script>
</body>

</html>
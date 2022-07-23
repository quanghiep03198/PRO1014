<?php
// using global variable
include_once '../lib/global.php';
include_once '../lib/db_execute.php';
include_once '../lib/validate.php';
// include data
include_once 'models/product.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <?php include_once 'components/header.php'; ?>
    <main>
        <?php
        $page = isset($_GET['page']) ? str_replace("-", "/", $_GET['page']) : 'home';
        $file = "pages/{$page}.php";
        if (file_exists($file))
            include_once $file;
        else include_once "pages/404.php"
        ?>
    </main>
    <?php include_once 'components/footer.php' ?>
    <script type="module" src="./js/cart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script type="text/javascript">
        var swiper = new Swiper(".product-slider", {
            slidesPerView: 5,
            spaceBetween: 5,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                "@0.00": {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                "@0.75": {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                "@1.00": {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                "@1.50": {
                    slidesPerView: 4,
                    spaceBetween: 50,
                },
            },
        });
    </script>
</body>

</html>
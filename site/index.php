<?php
// using global variable
include_once '../lib/global.php';
include_once '../lib/db_execute.php';
include_once '../lib/validate.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/main.css">
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
    <script type="module" src="js/cart.js"></script>
</body>

</html>
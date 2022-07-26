<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cửa hàng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>
    <?php include_once 'site/components/header.php'; ?>
    <main class="container w-full grid grid-cols-[1fr,3fr]">
        <!-- side bar -->
        <section class="sm:hidden lg:block">
            <?php include_once 'site/components/sidebar.php' ?>
        </section>
        <!-- product -->
        <section class="max-w-full mx-auto">
            <!-- product filter -->
            <div class="flex justify-end mb-10">
                <select class="select select-secondary w-full max-w-xs" onchange="window.location = this.value">
                    <?php if (isset($_GET['cate'])) : ?>
                        <option value=<?php echo "?page=product&cate={$_GET['cate']}&manu={$_GET['manu']}&sort=asc" ?> <?php echo isset($_GET['sort']) && $_GET['sort'] == 'asc' ? "selected" : "" ?>>Giá tăng dần</option>
                        <option value=<?php echo "?page=product&cate={$_GET['cate']}&manu={$_GET['manu']}&sort=desc" ?> <?php echo isset($_GET['sort']) && $_GET['sort'] == 'desc' ? "selected" : "" ?>>Giá giảm dần</option>
                    <?php endif; ?>
                    <?php if (isset($_GET['keyword'])) :  ?>
                        <option value=<?php echo "?page=product&kw={$_GET['kw']}&sort=asc" ?> <?php echo isset($_GET['sort']) && $_GET['sort'] == 'asc' ? "selected" : "" ?>>Giá tăng dần</option>
                        <option value=<?php echo "?page=product&kw={$_GET['kw']}&sort=desc" ?> <?php echo isset($_GET['sort']) && $_GET['sort'] == 'desc' ? "selected" : "" ?>>Giá giảm dần</option>
                    <?php endif; ?>
                    <?php if (!isset($_GET['cate']) && !isset($_GET['keyword'])) :  ?>
                        <option value=<?php echo "?page=product&sort=asc" ?> <?php echo isset($_GET['sort']) && $_GET['sort'] == 'asc' ? "selected" : "" ?>>Giá tăng dần</option>
                        <option value=<?php echo "?page=product&sort=desc" ?> <?php echo isset($_GET['sort']) && $_GET['sort'] == 'desc' ? "selected" : "" ?>>Giá giảm dần</option>
                    <?php endif; ?>
                </select>
            </div>
            <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 ">
                <?php
                if (!isset($_GET['cate']))
                    foreach (get_all_products() as $product) :
                        extract($product);
                        include("site/components/product-card.php");
                    endforeach;
                else
                    foreach (get_products_by_cate($_GET['cate'], $_GET['manu']) as $product) :
                        extract($product);
                        include("site/components/product-card.php");
                    endforeach
                ?>

            </div>
            <div class="pagination btn-group center p-10"></div>

            <!-- message -->
            <div class="absolute bottom-5 right-0 alert alert-success shadow-lg w-auto translate-x-[200%]">
                <div>
                    <i class="bi bi-check2-circle"></i><span class="pl-3">Đã thêm vào giỏ hàng!</span>
                </div>
            </div>
        </section>
    </main>
    <?php include_once 'site/components/footer.php'; ?>
    <script src="/site/js/common.js"></script>
    <script src="/site/js/add-cart.js"></script>
    <script src="/site/js/product-pagination.js"></script>
</body>

</html>
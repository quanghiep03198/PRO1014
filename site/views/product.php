<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cửa hàng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>
    <?php include_once 'site/components/header.php'; ?>
    <main class="w-full grid sm:grid-cols-1 lg:grid-cols-[1fr,3fr] gap-10 relative">
        <!-- side bar -->
        <?php include_once 'site/components/sidebar.php' ?>

        <!-- product -->
        <section class="px-5" id="price-filter">
            <div class="container mx-auto">
                <!-- product filter -->
                <div class="max-w-full mx-auto flex justify-start mb-8 gap-5">
                    <div class="flex flex-col gap-2">
                        <label for="" class="text-xl" id="#">Lọc theo giá</label>
                        <select class="select select-lg select-bordered" onchange="window.location = this.value">
                            <?php if (isset($_GET['cate'])) : ?>
                                <option value=<?php echo "?page=product&cate={$_GET['cate']}&manu={$_GET['manu']}&sort=asc" ?> <?php echo isset($_GET['sort']) && $_GET['sort'] == 'asc' ? "selected" : "" ?>>Giá tăng dần</option>
                                <option value=<?php echo "?page=product&cate={$_GET['cate']}&manu={$_GET['manu']}&sort=desc" ?> <?php echo isset($_GET['sort']) && $_GET['sort'] == 'desc' ? "selected" : "" ?>>Giá giảm dần</option>
                            <?php endif; ?>
                            <?php if (isset($_GET['kw'])) :  ?>
                                <option value=<?php echo "?page=product&kw={$_GET['kw']}&sort=asc" ?> <?php echo isset($_GET['sort']) && $_GET['sort'] == 'asc' ? "selected" : "" ?>>Giá tăng dần</option>
                                <option value=<?php echo "?page=product&kw={$_GET['kw']}&sort=desc" ?> <?php echo isset($_GET['sort']) && $_GET['sort'] == 'desc' ? "selected" : "" ?>>Giá giảm dần</option>
                            <?php endif; ?>
                            <?php if (!isset($_GET['cate']) && !isset($_GET['kw'])) :  ?>
                                <option value=<?php echo "?page=product&sort=asc" ?> <?php echo isset($_GET['sort']) && $_GET['sort'] == 'asc' ? "selected" : "" ?>>Giá tăng dần</option>
                                <option value=<?php echo "?page=product&sort=desc" ?> <?php echo isset($_GET['sort']) && $_GET['sort'] == 'desc' ? "selected" : "" ?>>Giá giảm dần</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>

                <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 relative" id="title">
                    <?php
                    // lấy tất cả sản phảm
                    if (!isset($_GET['cate']) && !isset($_GET['kw'])) :
                        $products = get_all_products();
                        if (count($products) == 0)
                            echo '<div class="center flex flex-col justify-center items-center">
                            <img src="/img/empty.png" alt="">
                            <p class="text-xl text-center">Sản phẩm không tồn tại!</p>
                        </div>';
                        foreach ($products as $product) :
                            extract($product);
                            include("site/components/product-card.php");
                        endforeach;
                    endif;
                    // lọc sản phẩm theo loại
                    if (isset($_GET['cate'])) :
                        $products = get_products_by_cate($_GET['cate'], $_GET['manu']);
                        if (count($products) == 0) :
                            echo '<div class="center flex flex-col justify-center items-center">
                            <img src="/img/empty.png" alt="">
                            <p class="text-xl text-center">Sản phẩm hiện đang được cập nhật hoặc đã hết hàng!</p>
                        </div>';
                        endif;
                        foreach ($products as $product) :
                            extract($product);
                            include("site/components/product-card.php");
                        endforeach;
                    endif;
                    // lọc sản phẩm theo từ khóa tìm kiếm
                    if (isset($_GET['kw']) && !isset($_GET['cate'])) :
                        $products = get_products_by_kw($_GET['kw']);
                        if (count($products) == 0) :
                            echo '<div class="center flex flex-col justify-center items-center">
                            <img src="/img/empty.png" alt="">
                            <p class="text-xl text-center">Sản phẩm không tồn tại!</p>
                        </div>';
                        endif;
                        foreach ($products as $product) :
                            extract($product);
                            include("site/components/product-card.php");
                        endforeach;
                    endif;
                    ?>

                </div>
                <div id="pagination" class=" btn-group center p-10"></div>
            </div>
        </section>
    </main>
    <?php include_once 'site/components/footer.php'; ?>
    <script src="site/js/common.js"></script>
    <script src="site/js/handle-cart.js"></script>
    <script src="site/js/handle-post-request.js"></script>
    <script src="site/js/pagination.js"></script>
    <script>
        const prodPagination = new Pagination('.card', 9);
        const showPage = prodPagination.showPage.bind(this)
        showPage(1)
    </script>
</body>

</html>
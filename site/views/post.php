<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
</head>
<style>
</style>

<body class="relative">
    <?php include_once 'site/components/header.php';  ?>
    <!-- HEADER END  -->
    <main class="container mx-auto">

        <div class="gr grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-[2.5fr,1fr] gap-10">
            <!-- main interface -->
            <div class="container">
                <!-- slider -->
                <div class="relative">
                    <div class="carousel w-full">
                        <?php for ($i = 1; $i <= 4; $i++) { ?>
                            <div class="relative carousel-item w-full text-white" id=<?= "item{$i}" ?>>
                                <img src="img/banners/cod.jpg" alt="" class="">
                                <span class="absolute top-5 left-5">27/7/2022</span>
                                <div class="absolute bottom-10 left-5 flex flex-col gap-3">
                                    <span>Đăng bởi:<span class="indent-2"><?php echo "Author_name" ?></span></span>
                                    <h3 class="text-2xl font-semibold"><?php echo "Call of Duty ghost Remaster" ?></h3>
                                    <a href=<?php echo "?page=post_detail&id=?" ?> class="link">Đọc tiếp</a>
                                </div>
                            </div>
                        <?php  } ?>
                    </div>
                    <div class="absolute bottom-4 flex justify-center w-full py-2 gap-2">
                        <?php for ($i = 1; $i <= 4; $i++) { ?>
                            <a href=<?= "#item{$i}" ?> class="pagination-button border-2 w-4 h-4 rounded-full " onclick="visited(this)"></a>
                        <?php  } ?>
                    </div>
                </div>
                <!-- tin tức mới  -->
                <article>
                    <h2 class="container text-center text-[40px] font-[600] underline pb-[50px] pt-[50px] " id="title">TIN TỨC MỚI</h2>
                    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 items-stretch gap-5">
                        <?php for ($i = 0; $i < 9; $i++) {
                            include "site/components/post-card.php";
                        } ?>
                    </div>
                    <div class="pagination btn-group center p-10"></div>
                </article>
            </div>
            <!-- sidebar -->
            <?php include_once "site/components/post-sidebar.php" ?>
        </div>
    </main>
    <?php include_once 'site/components/footer.php'; ?>
    <script src="/site/js/common.js"></script>
    <script>
        const paginationBtns = $(".pagination-button")

        function visited(button) {
            paginationBtns.forEach((btn) => {
                btn.classList.remove("btn-primary");
            })
            button.classList.add("btn-primary")
        }
        paginationBtns[0].classList.add("btn-primary");
    </script>
    <script src="/site/js/product-pagination.js"></script>
</body>

</html;
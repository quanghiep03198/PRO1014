<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <!-- main style -->
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/swal.css">

</head>


<body class="relative">
    <?php include_once 'site/components/header.php';  ?>
    <main class="px-4">
        <!-- banner -->
        <section class="w-full py-[5rem]">
            <?php include_once 'site/components/banner.php' ?>
        </section>

        <!-- explore new product -->
        <section class="container mx-auto py-[5rem]">
            <h2 class="lg:text-6xl text-3xl font-medium text-center mb-5"> Khám phá Playstation®4</h2>
            <p class="lg:text-xl text-base font-medium text-center mb-5">Những tựa games hấp dẫn, giải trí bất tận. Cùng PS Store tận hưởng ngày nghỉ với Playstation 4</p>
            <div class="flex flex-grow justify-center items-stretch gap-16 sm:flex-col md:flex-col lg:flex-row">
                <div class="flex flex-col gap-5">
                    <picture class="center">
                        <a href=""><img src=<?= ROOT_PRODUCT . 'ps4-slim.webp' ?> alt="" class="max-w-full h-60 object-contain"></a>
                    </picture>
                    <div>
                        <h3 class="text-3xl font-semibold mb-3">Playstation 4</h3>
                        <p class="text-lg mb-5">Cửa hàng game trực tuyến đa dạng, với<br> 1TB dụng lượng</p>
                        <a href="?page=prod_overview&id=12" class="btn btn-outline sm:btn-block md:btn-lg lg:btn-block">Khám phá ngay</a>
                    </div>
                </div>
                <div class="flex flex-col gap-5">
                    <picture class="center">
                        <a href=""><img src=<?= ROOT_PRODUCT . 'ps-vr.webp' ?> alt="" class="max-w-full h-60 object-cover"></a>
                    </picture>
                    <div class="text-left">
                        <h3 class="text-3xl font-semibold mb-3">Playstation VR</h3>
                        <p class="text-lg  mb-5">Trải nghiệm thế giới ảo với kính VR của<br> Sony</p>
                        <a href="" class="btn btn-outline sm:btn-block md:btn-lg lg:btn-block">Khám phá ngay</a>
                    </div>
                </div>
                <div class="flex flex-col gap-5">
                    <picture class="center">
                        <a href=""><img src=<?= ROOT_PRODUCT . 'ds4-black.webp' ?> alt="" class="max-w-full h-60 object-contain"></a>
                    </picture>
                    <div class="text-left ">
                        <h3 class="text-3xl font-semibold mb-3"><a href=""> Dualshock 4</a></h3>
                        <p class="text-lg  mb-5">Tay cầm chơi game cực chất với<br> bluetooth 5.0 và touchpad cảm biến</p>
                        <a href="?page=product&cate=2&manu=1" class="btn btn-outline sm:btn-block md:btn-lg lg:btn-block">Khám phá ngay</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- product-list -->
        <section class="w-auto py-[5rem]">
            <!-- nav-tabs -->
            <div class="tabs justify-center items-center max-w-lg mx-auto mb-5">
                <button onclick="showPanel(0)" class="tab sm:tab md:tab lg:tab-lg tab-bordered font-semibold text-2xl">Sản phẩm mới</button>
                <button onclick="showPanel(1)" class="tab sm:tab md:tab lg:tab-lg tab-bordered font-semibold text-2xl">Giảm giá</button>
                <button onclick="showPanel(2)" class="tab sm:tab md:tab lg:tab-lg tab-bordered font-semibold text-2xl">Mua nhiều</button>
            </div>
            <!-- new products-->
            <div class="swiper product-slider tab-panel">
                <div class="swiper-wrapper">
                    <?php foreach (get_new_products() as $product) : extract($product) ?>
                        <div class="swiper-slide ">
                            <?php include("site/components/product-card.php") ?>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <!-- sale off products -->
            <div class="swiper product-slider tab-panel">
                <div class="swiper-wrapper">
                    <?php foreach (get_discount_products() as $product) : extract($product) ?>
                        <div class="swiper-slide">
                            <?php include("site/components/product-card.php") ?>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <!-- best seller -->
            <div class="swiper product-slider tab-panel">
                <div class="swiper-wrapper">
                    <?php foreach (get_best_seller_products() as $product) : extract($product) ?>
                        <div class="swiper-slide">
                            <?php include("site/components/product-card.php"); ?>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </section>

        <!-- news -->
        <section>
            <h2 class="container text-center text-4xl font-semibold underline mb-10 ">TIN TỨC MỚI</h2>
            <div class="grid sm:grid-cols-1 lg:grid-cols-[2fr,1fr] pb-[50px] gap-[50px]">
                <!-- lastest news -->
                <div class="grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-3 items-stretch gap-5 w-full">
                    <?php foreach (get_new_posts(0, 3) as $post) : extract($post);
                        include "site/components/post-card.php";
                    endforeach; ?>
                </div>

                <!-- hot news -->
                <div>
                    <h3 class="text-[30px] font-[600] mb-[20px] mt-[50px] lg:mt-[0px]">Bài viết nổi bật</h3>
                    <div class="flex flex-col justify-between gap-[30px]">
                        <?php for ($i = 0; $i < 3; $i++) {
                            include "site/components/post-sidecard.php";
                        } ?>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>
    <?php include_once 'site/components/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/common.js"></script>
    <script src="js/handle-cart.js"></script>
    <script src="js/handle-post-request.js"></script>
    <script src="js/carousel.js"></script>
    <script>
        const panels = $('.tab-panel')
        const tabs = $('.tab');

        function showPanel(index) {
            panels.forEach(panel => panel.classList.add("hidden"))
            tabs.forEach(tab => tab.classList.remove("tab-active"))
            panels[index].classList.remove("hidden")
            tabs[index].classList.add("tab-active");
        }
        showPanel(0)
    </script>
</body>

</html>
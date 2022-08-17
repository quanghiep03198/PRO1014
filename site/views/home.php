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
            <div class="max-w-full mx-auto p-10 text-[color:(--var(primary-color))]">
                <div class="flex flex-grow justify-center gap-10 items-center sm:flex-col-reverse md:flex-col-reverse lg:flex-row">
                    <div class="flex basis-3/5 flex-col gap-5">
                        <h2 class="sm:text-2xl md:text-4xl lg:text-6xl font-extrabold">Playstation 5 - Digtal Edtion</h2>
                        <p class="sm:text-sm md:text-base lg:text-3xl">Khám phá sức mạnh ấn tượng <br> của AMD Ryzen “Zen 2”</p>
                        <div class="mt-5">
                            <a href="?page=product" class="btn btn-outline hover:btn-primary sm:btn-md sm:btn-block lg:btn-lg lg:btn-wide ">Xem ngay</a>
                        </div>
                    </div>
                    <picture>
                        <img class="lg:w-full" src=<?= ROOT_BANNER . 'banner-homepage.png' ?> alt="">
                    </picture>
                </div>
            </div>
        </section>

        <!-- explore new product -->
        <section class="container mx-auto py-[5rem]">
            <h2 class="lg:text-5xl text-3xl font-medium text-center mb-5"> Khám phá Playstation®4</h2>
            <p class="lg:text-xl text-base font-medium text-center mb-5">Những tựa games hấp dẫn, giải trí bất tận. Cùng PS Store tận hưởng ngày nghỉ với Playstation 4</p>
            <div class="flex flex-grow justify-center items-stretch gap-16 sm:flex-col md:flex-col lg:flex-row">
                <div class="flex flex-col items-center gap-5">
                    <picture class="center">
                        <a href=""><img src=<?= ROOT_PRODUCT . 'ps4-slim.webp' ?> alt="" class="max-w-full h-60 object-contain"></a>
                    </picture>
                    <div>
                        <h3 class="text-3xl font-semibold mb-3">Playstation 4</h3>
                        <p class="text-lg mb-5">Cửa hàng game trực tuyến đa dạng, với<br> 1TB dụng lượng</p>
                        <a href="?page=prod_overview&id=12" class="btn btn-outline hover:btn-primary sm:btn-block md:btn-lg lg:btn-block">Khám phá ngay</a>
                    </div>
                </div>
                <div class="flex flex-col items-center gap-5">
                    <picture class="center">
                        <a href=""><img src=<?= ROOT_PRODUCT . 'ps-vr.webp' ?> alt="" class="max-w-full h-60 object-cover"></a>
                    </picture>
                    <div class="text-left">
                        <h3 class="text-3xl font-semibold mb-3">Playstation VR</h3>
                        <p class="text-lg  mb-5">Trải nghiệm thế giới ảo với kính VR của<br> Sony</p>
                        <a href="" class="btn btn-outline hover:btn-primary sm:btn-block md:btn-lg lg:btn-block">Khám phá ngay</a>
                    </div>
                </div>
                <div class="flex flex-col items-center gap-5">
                    <picture class="center">
                        <a href=""><img src=<?= ROOT_PRODUCT . 'ds4-black.webp' ?> alt="" class="max-w-full h-60 object-contain"></a>
                    </picture>
                    <div class="text-left ">
                        <h3 class="text-3xl font-semibold mb-3"><a href=""> Dualshock 4</a></h3>
                        <p class="text-lg  mb-5">Tay cầm chơi game cực chất với<br> bluetooth 5.0 và touchpad cảm biến</p>
                        <a href="?page=product&cate=2&manu=1" class="btn btn-outline hover:btn-primary sm:btn-block md:btn-lg lg:btn-block">Khám phá ngay</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- product-list -->
        <section class="w-auto py-[5rem]">
            <!-- nav-tabs -->
            <div class="flex flex-nowrap justify-center items-center flex-grow max-w-3xl mx-auto mb-5">
                <button onclick="showPanel(0)" class="tab !basis-1/3 !flex-nowrap sm:tab md:tab lg:tab-lg tab-bordered font-semibold md:text-xl lg:text-xl">Sản phẩm mới</button>
                <button onclick="showPanel(1)" class="tab !basis-1/3 !flex-nowrap sm:tab md:tab lg:tab-lg tab-bordered font-semibold md:text-xl lg:text-xl">Giảm giá</button>
                <button onclick="showPanel(2)" class="tab !basis-1/3 !flex-nowrap sm:tab md:tab lg:tab-lg tab-bordered font-semibold md:text-xl lg:text-xl">Mua nhiều</button>
            </div>
            <!-- new products-->
            <div class="swiper product-slider tab-panel p-10">
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
            <div class="swiper product-slider tab-panel p-10">
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
            <div class="swiper product-slider tab-panel p-10">
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
        <section class="mb-10">
            <h2 class="container text-center text-4xl font-semibold underline underline-offset-8 mb-10 ">TIN TỨC MỚI</h2>
            <div class="grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-[1.8fr,1fr] lg:gap-10">
                <!-- lastest news -->
                <div class="grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-3 items-stretch gap-5 container mx-auto">
                    <?php foreach (get_new_posts(0, 3) as $post) : extract($post);
                        include "site/components/post-card.php";
                    endforeach; ?>
                </div>

                <!-- hot news -->
                <div>
                    <h3 class="text-3xl font-semibold mb-5">Bài viết nổi bật</h3>
                    <div class="flex flex-col justify-between gap-5">
                        <?php foreach (get_most_comment_post() as $post) : extract($post); ?>
                            <div class="card card-side rounded-box shadow-xl w-fit">
                                <figure class="basis-1/3">
                                    <a href="?page=post&id=<?= $post['id'] ?>"><img src=<?php echo ROOT_POST . $img ?> alt="" class="w-full h-full object-cover"></a>
                                </figure>
                                <div class="basis-2/3 p-5 card-body ">
                                    <div class="max-w-[240px]">
                                        <h2 class="font-semibold text-xl truncate"><?php echo $title ?></h2>
                                        <p class="font-normal truncate"><?php echo $short_desc ?></p>
                                    </div>
                                    <p class="text-sm font-bold">Đăng ngày: <span class="font-normal"><?php echo $create_date ?></span></p>
                                    <p class="text-sm font-bold">Bởi: <span class="font-normal"><?php echo $author_name ?></span></p>
                                    <div class="card-actions justify-end">
                                        <a href="?page=post&id=<?= $post['id'] ?>" class="btn hover:btn-primary">Đọc tiếp</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>
    <?php include_once 'site/components/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="js/common.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/handle-cart.js"></script>
    <script src="js/handle-userdata.js"></script>
    <script src="js/handle-wishlist.js"></script>
    <script src="js/carousel.js"></script>
    <script src="js/pagination.js"></script>
    <script>
        // const pagination = new Pagination({
        //     selector:"",
        // })
        const panels = $('.tab-panel')
        const tabs = $('.tab');

        function showPanel(tabindex) {
            panels.forEach(panel => panel.classList.add("hidden"))
            tabs.forEach(tab => tab.classList.remove("tab-active"))
            panels[tabindex].classList.remove("hidden")
            tabs[tabindex].classList.add("tab-active");
        }
        showPanel(0)
    </script>
</body>

</html>
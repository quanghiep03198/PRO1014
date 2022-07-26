<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="styles/main.css">

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
                        <a href="" class="btn btn-outline btn-block">Khám phá ngay</a>
                    </div>
                </div>
                <div class="flex flex-col gap-5">
                    <picture class="center">
                        <a href=""><img src=<?= ROOT_PRODUCT . 'ps-vr.webp' ?> alt="" class="max-w-full h-60 object-cover"></a>
                    </picture>
                    <div class="text-left">
                        <h3 class="text-3xl font-semibold mb-3">Playstation VR</h3>
                        <p class="text-lg  mb-5">Trải nghiệm thế giới ảo với kính VR của<br> Sony</p>
                        <a href="" class="btn btn-outline btn-block">Khám phá ngay</a>
                    </div>
                </div>
                <div class="flex flex-col gap-5">
                    <picture class="center">
                        <a href=""><img src=<?= ROOT_PRODUCT . 'ds4-black.webp' ?> alt="" class="max-w-full h-60 object-contain"></a>
                    </picture>
                    <div class="text-left ">
                        <h3 class="text-3xl font-semibold mb-3"><a href=""> Dualshock 4</a></h3>
                        <p class="text-lg  mb-5">Tay cầm chơi game cực chất với<br> bluetooth 5.0 và touchpad cảm biến</p>
                        <a href="" class="btn btn-outline btn-block">Khám phá ngay</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- product-list -->
        <section class="w-auto py-[5rem]">
            <!-- nav-tabs -->
            <div class="tabs justify-center items-center max-w-lg mx-auto mb-12">
                <button onclick="showPanel(0)" class="tab sm:tab md:tab lg:tab-lg tab-bordered font-semibold text-2xl">Sản phẩm mới</button>
                <button onclick="showPanel(1)" class="tab sm:tab md:tab lg:tab-lg tab-bordered font-semibold text-2xl">Giảm giá</button>
                <button onclick="showPanel(2)" class="tab sm:tab md:tab lg:tab-lg tab-bordered font-semibold text-2xl">Mua nhiều</button>
            </div>
            <!-- new products-->
            <div class="swiper product-slider tab-panel">
                <div class="swiper-wrapper">
                    <?php foreach (get_new_products() as $product) : extract($product) ?>
                        <div class="swiper-slide center">
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
                        <div class="swiper-slide center">
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
                        <div class="swiper-slide center">
                            <?php include("site/components/product-card.php") ?>
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
                    <div class="card bg-base-100 shadow-xl">
                        <picture>
                            <img src="/img/posts/cod-cold-war.png" alt="Shoes" class="center w-full h-64 object-fill" />
                        </picture>
                        <div class="card-body px-3">
                            <h2 class="card-title text-[16px]">Call of duty - Cold War đã có trên nền tảng Playstation</h2>
                            <p>Được phát hành vào ngày 6/7/2020, theo như Activistion công bố, đây hứa hẹn sẽ là tựa game ...</p>
                            <a href="?page=post&id=" class="btn btn-block">Xem thêm</a>
                            <div class="flex justify-start items-center gap-5">
                                <img src="https://placeimg.com/192/192/people" class="avatar w-12 h-12 rounded-full" />
                                <div>
                                    <span class="text-[15px]">Đăng bởi :</span> <span class="font-[600]">Quang Hiệp</span>
                                    <p class="text-[12px]">6/7/2022</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 shadow-xl">
                        <picture>
                            <img src="/img/posts/cod-cold-war.png" alt="Shoes" class="center w-full h-64 object-fill" />
                        </picture>
                        <div class="card-body px-3">
                            <h2 class="card-title text-[16px]">Call of duty - Cold War đã có trên nền tảng Playstation</h2>
                            <p>Được phát hành vào ngày 6/7/2020, theo như Activistion công bố, đây hứa hẹn sẽ là tựa game ...</p>
                            <a href="?page=post&id=" class="btn btn-block">Xem thêm</a>
                            <div class="flex justify-start items-center gap-5">
                                <img src="https://placeimg.com/192/192/people" class="avatar w-12 h-12 rounded-full" />
                                <div>
                                    <span class="text-[15px]">Đăng bởi :</span> <span class="font-[600]">Quang Hiệp</span>
                                    <p class="text-[12px]">6/7/2022</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 shadow-xl">
                        <picture>
                            <img src="/img/posts/cod-cold-war.png" alt="Shoes" class="center w-full h-64 object-fill" />
                        </picture>
                        <div class="card-body px-3">
                            <h2 class="card-title text-[16px]">Call of duty - Cold War đã có trên nền tảng Playstation</h2>
                            <p>Được phát hành vào ngày 6/7/2020, theo như Activistion công bố, đây hứa hẹn sẽ là tựa game ...</p>
                            <a href="?page=post&id=" class="btn btn-block">Xem thêm</a>
                            <div class="flex justify-start items-center gap-5">
                                <img src="https://placeimg.com/192/192/people" class="avatar w-12 h-12 rounded-full" />
                                <div>
                                    <span class="text-[15px]">Đăng bởi :</span> <span class="font-[600]">Quang Hiệp</span>
                                    <p class="text-[12px]">6/7/2022</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- hot news -->
                <div>
                    <h3 class="text-[30px] font-[600] mb-[20px] mt-[50px] lg:mt-[0px]">Bài viết nổi bật</h3>
                    <div class="flex flex-col justify-between gap-[30px]">
                        <div class="grid grid-cols-[1fr,2fr] items-stretch gap-2">
                            <picture class="f">
                                <a href="?page=post&id="><img src="/img/posts/cod-cold-war.png" alt="" class="w-full h-full object-cover"></a>
                            </picture>
                            <div>
                                <h3 class="text-xl font-semibold">Call Of Duty - Ghost Remaster</h3>
                                <p class="font-normal">Phiên bản remake của tựa game đình đám này hứa hẹn ...</p>
                                <p class="text-sm font-bold">Đăng ngày: <span class="font-normal">6/7/2022</span></p>
                                <p class="text-sm font-bold">Bởi: <span class="font-normal"> quanghiep03198</span></p>

                            </div>
                        </div>
                        <div class="grid grid-cols-[1fr,2fr] items-stretch gap-2">
                            <picture class="f">
                                <a href="?page=post&id="><img src="/img/posts/cod-cold-war.png" alt="" class="w-full h-full object-cover"></a>
                            </picture>
                            <div>
                                <h3 class="text-xl font-semibold">Call Of Duty - Ghost Remaster</h3>
                                <p class="font-normal">Phiên bản remake của tựa game đình đám này hứa hẹn ...</p>
                                <p class="text-sm font-bold">Đăng ngày: <span class="font-normal">6/7/2022</span></p>
                                <p class="text-sm font-bold">Bởi: <span class="font-normal"> quanghiep03198</span></p>

                            </div>
                        </div>
                        <div class="grid grid-cols-[1fr,2fr] items-stretch gap-2">
                            <picture class="f">
                                <a href="?page=post&id="><img src="/img/posts/cod-cold-war.png" alt="" class="w-full h-full object-cover"></a>
                            </picture>
                            <div>
                                <h3 class="text-xl font-semibold">Call Of Duty - Ghost Remaster</h3>
                                <p class="font-normal">Phiên bản remake của tựa game đình đám này hứa hẹn ...</p>
                                <p class="text-sm font-bold">Đăng ngày: <span class="font-normal">6/7/2022</span></p>
                                <p class="text-sm font-bold">Bởi: <span class="font-normal"> quanghiep03198</span></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>
    <?php include_once 'site/components/footer.php'; ?>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="site/js/swiper.js"></script>
    <script src="/site/js/common.js"></script>
    <script src="/site/js/add-cart.js"></script>
    <script type="text/javascript">
        const panels = document.querySelectorAll('.tab-panel')
        const tabs = document.querySelectorAll('.tab');

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
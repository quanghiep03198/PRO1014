<!-- banner -->
<div class="w-full">
    <?php include_once 'components/banner.php' ?>
</div>
<!-- devider -->
<div class="max-w-[1440px] m-auto">
    <hr class="border-1 border-[#000]">
</div>
<!-- explore new product -->
<div class="container mx-auto py-[10rem]">
    <h2 class="lg:text-6xl text-3xl font-medium text-center mb-5"> Khám phá Playstation®4</h2>
    <p class="lg:text-2xl text-base font-medium text-center mb-5">Những tựa games hấp dẫn, giải trí bất tận. Cùng PS Store tận hưởng ngày nghỉ với Playstation 4</p>
    <div class="flex flex-grow justify-between items-stretch gap-12 sm:flex-col md:flex-col lg:flex-row">
        <div class="flex flex-col gap-5">
            <a href=""><img src=<?= $ROOT_PRODUCT . 'ps4-slim.webp' ?> alt="" class="max-w-full h-60 object-contain"></a>
            <div>
                <h3 class="text-3xl font-semibold mb-3">Playstation 4</h3>
                <p class="text-lg mb-5">Cửa hàng game trực tuyến đa dạng, với<br> 1TB dụng lượng</p>
                <a href="" class="btn btn-outline btn-block">Khám phá ngay</a>
            </div>
        </div>
        <div class="flex flex-col gap-5">
            <a href=""><img src=<?= $ROOT_PRODUCT . 'ps-vr.webp' ?> alt="" class="max-w-full h-60 object-cover"></a>
            <div class="text-left">
                <h3 class="text-3xl font-semibold mb-3">Playstation VR</h3>
                <p class="text-lg  mb-5">Trải nghiệm thế giới ảo với kính VR của<br> Sony</p>
                <a href="" class="btn btn-outline btn-block">Khám phá ngay</a>
            </div>
        </div>
        <div class="flex flex-col gap-5">
            <a href=""><img src=<?= $ROOT_PRODUCT . 'ds4-black.webp' ?> alt="" class="max-w-full h-60 object-contain"></a>
            <div class="text-left ">
                <h3 class="text-3xl font-semibold mb-3"><a href=""> Dualshock 4</a></h3>
                <p class="text-lg  mb-5">Tay cầm chơi game cực chất với<br> bluetooth 5.0 và touchpad cảm biến</p>
                <a href="" class="btn btn-outline btn-block">Khám phá ngay</a>
            </div>
        </div>
    </div>
</div>
<!-- devider  -->
<div class="ke max-w-[1440px] m-auto">
    <hr class="border-1 border-[#000]">
</div>
<!-- product-filter -->
<div class="tabs justify-center gap-8 bg-[color:var(--primary-color)] py-5 max-w-full mx-auto text-white">
    <a href="" class="text-white sm: text-sm lg:text-xl tab tab-active">Sản phẩm mới</a>
    <a href="" class="text-white sm: text-sm lg:text-xl tab">Giảm giá</a>
    <a href="" class="text-white sm: text-sm lg:text-xl tab">Mua nhiều</a>
</div>
<!-- product list -->
<div class="swiper product-slider container mx-auto">
    <div class="swiper-wrapper">
        <?php foreach (get_all_product() as $product) : extract($product) ?>
            <div class="swiper-slide p-5">
                <div class='card shadow-lg w-80 rounded-md'>
                    <a href=<?php echo "?page=prod_overview&id={$id}" ?>>
                        <img src=<?= $ROOT_PRODUCT . $image ?> alt="" class="card-img max-w-[250px] h-[250px] object-contain">
                    </a>
                    <div class="card-body">
                        <h4 class='text-[20px] truncate '><?= $prod_name ?></h4>
                        <div class='rating'>
                            <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' disabled />
                            <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' disabled />
                            <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' disabled checked />
                            <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' disabled />
                            <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' disabled />
                        </div>
                        <p class="text-[16px]"><?= get_feedback_counter($id) . ' reviews' ?></p>
                        <span class='text-[#407CB4] text-[20px] font-[500]'><?= $price ?></span>
                        <!-- product information form -->
                        <form action='?page=addtocart' method='post'>
                            <input type='hidden' name='id' value='$PRODUCT_ID'>
                            <input type='hidden' name='name_pro' value=' $PRODUCT_NAME'>
                            <input type='hidden' name='price' value='$PRICE'>
                            <input type='hidden' name='img' value=''>
                            <button type='submit' class='btn btn-block bg-[#222222] hover:bg-orange-400 border-none mt-[10px]' name='add_btn'>Mua Ngay</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <!-- Add Arrows -->

</div>
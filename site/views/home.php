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
                        <div class='card w-96 rounded-md relative'>
                            <?php if ($discount > 0) : ?>
                                <span class="badge badge-secondary badge-error px-4 py-3 text-xl absolute top-0 right-0"><?= $discount . '%' ?></span>
                            <?php endif;  ?>
                            <picture class="center">
                                <a href=<?php echo "?page=prod_overview&id={$id}" ?>>
                                    <img src=<?= ROOT_PRODUCT . $image ?> alt="" class="card-img max-w-sm h-60 object-contain">
                                </a>
                            </picture>
                            <div class="card-body">
                                <detail class="flex flex-col gap-0">
                                    <h4 class='text-[20px] w-full truncate '><?= $prod_name ?></h4>
                                    <span class='text-[#407CB4] text-xl font-medium'><?= $price . '₫' ?></span>
                                    <div class='rating block'>
                                        <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' disabled />
                                        <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' disabled />
                                        <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' disabled checked />
                                        <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' disabled />
                                        <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' disabled />
                                    </div>
                                    <p><?= get_feedback_counter($id) . ' reviews' ?></p>
                                </detail>
                                <form action='?page=cart' method='post'>
                                    <div class="btn-group flex-nowrap w-full justify-items-stretch flex-grow">
                                        <!-- product information form -->
                                        <input type='hidden' name='id' value=<?= $id ?>>
                                        <input type='hidden' name='name' value="<?php echo $prod_name ?>">
                                        <input type='hidden' name='manu' value="<?php echo $manufacture ?>">
                                        <input type='hidden' name='price' value=<?= $price ?>>
                                        <input type='hidden' name='img' value=<?= $image ?>>
                                        <input type='hidden' name='qty' value=1>
                                        <input type='hidden' name='total' value=<?= $price * 1 ?>>
                                        <!-- product card button group -->
                                        <button type='submit' onclick="addCart(this)" class='flex-grow btn text-xl' name='add_btn'><i class="bi bi-cart3"></i></button>
                                        <button type="button" onclick="addCart(this)" class="flex-grow btn text-xl"><i class="bi bi-bag-plus"></i></button>
                                        <button type="button" onclick="addWishList(this)" class="flex-grow btn text-xl"><i class="bi bi-heart"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
                        <div class='card w-96 rounded-md relative'>
                            <?php if ($discount > 0) : ?>
                                <span class="badge badge-secondary badge-error px-4 py-3 text-xl absolute top-0 right-0"><?= $discount . '%' ?></span>
                            <?php endif;  ?>
                            <picture class="center">
                                <a href=<?php echo "?page=prod_overview&id={$id}" ?>>
                                    <img src=<?= ROOT_PRODUCT . $image ?> alt="" class="card-img max-w-sm h-60 object-contain">
                                </a>
                            </picture>
                            <div class="card-body">
                                <detail class="flex flex-col gap-0">
                                    <h4 class='text-[20px] w-full truncate '><?= $prod_name ?></h4>
                                    <span class='text-[#407CB4] text-xl font-medium'><?= $price . '₫' ?></span>
                                    <div class='rating block'>
                                        <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' disabled />
                                        <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' disabled />
                                        <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' disabled checked />
                                        <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' disabled />
                                        <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' disabled />
                                    </div>
                                    <p><?= get_feedback_counter($id) . ' reviews' ?></p>
                                </detail>
                                <form action='?page=cart' method='post'>
                                    <!-- product information form -->
                                    <input type='hidden' name='id' value=<?= $id ?>>
                                    <input type='hidden' name='name' value=<?= $prod_name ?>>
                                    <input type='hidden' name='price' value=<?= $price ?>>
                                    <input type='hidden' name='img' value=<?= $image ?>>
                                    <input type='hidden' name='qty' value=1>
                                    <!-- product card button group -->
                                    <div class="btn-group flex-nowrap w-full justify-items-stretch flex-grow">
                                        <button type='submit' onclick="addCart(this)" class='flex-grow btn text-xl' name='add_btn'><i class="bi bi-cart3"></i></button>
                                        <button type="button" onclick="addCart(this)" class="flex-grow btn text-xl"><i class="bi bi-bag-plus"></i></button>
                                        <button type="button" onclick="addWishList(this)" class="flex-grow btn text-xl"><i class="bi bi-heart"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
                        <div class='card w-96 rounded-md relative'>
                            <?php if ($discount > 0) : ?>
                                <span class="badge badge-secondary badge-error px-4 py-3 text-xl absolute top-0 right-0"><?= $discount . '%' ?></span>
                            <?php endif;  ?>
                            <picture class="center">
                                <a href=<?php echo "?page=prod_overview&id={$id}" ?>>
                                    <img src=<?= ROOT_PRODUCT . $image ?> alt="" class="card-img max-w-sm h-60 object-contain">
                                </a>
                            </picture>
                            <div class="card-body">
                                <detail class="flex flex-col gap-0">
                                    <h4 class='text-[20px] w-full truncate '><?= $prod_name ?></h4>
                                    <span class='text-[#407CB4] text-xl font-medium'><?= $price . '₫' ?></span>
                                    <div class='rating block'>
                                        <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' disabled />
                                        <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' disabled />
                                        <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' disabled checked />
                                        <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' disabled />
                                        <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' disabled />
                                    </div>
                                    <p><?= get_feedback_counter($id) . ' reviews' ?></p>
                                </detail>
                                <form action='?page=cart' method='post'>
                                    <!-- product information form -->
                                    <input type='hidden' name='id' value=<?= $id ?>>
                                    <input type='hidden' name='name' value=<?= $prod_name ?>>
                                    <input type='hidden' name='price' value=<?= $price ?>>
                                    <input type='hidden' name='img' value=<?= $image ?>>
                                    <input type='hidden' name='qty' value=1>
                                    <!-- product card button group -->
                                    <div class="btn-group flex-nowrap w-full justify-items-stretch flex-grow">
                                        <button type='submit' onclick="addCart(this)" class='flex-grow btn text-xl' name='add_btn'><i class="bi bi-cart3"></i></button>
                                        <button type="button" onclick="addCart(this)" class="flex-grow btn text-xl"><i class="bi bi-bag-plus"></i></button>
                                        <button type="button" onclick="addWishList(this)" class="flex-grow btn text-xl"><i class="bi bi-heart"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

    </section>

</main>
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
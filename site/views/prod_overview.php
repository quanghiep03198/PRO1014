<!-- PRODUCT OVERVIEW  -->
<?php
$product = get_one_product($_GET['id']);
extract($product);
?>
<div class="container w-full mx-auto py-10">
    <section>
        <div class="container mx-auto flex flex-grow justify-center items-stretch sm:flex-col md:flex-row lg:flex-row gap-16">
            <picture class="basis-1/2">
                <img src=<?= ROOT_PRODUCT . $image ?> alt="" class="max-w-full object-contain">
            </picture>
            <div class="w-full flex flex-col gap-5">
                <h2 class="text-4xl font-normal"><?= $prod_name ?></h2>
                <span class="font-semibold text-4xl"><?= $price  . 'đ' ?></span>
                <div class="rating">
                    <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                    <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                    <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                    <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                    <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                </div>
                <span class="font-medium text-2xl">Bảo hành : <span class="font-normal"><?= $warranty_time . ' năm' ?></span></span>
                <span class="font-medium text-2xl">Kho hàng : <span class="font-normal"> Còn hàng</span></span>
                <div class="custom-number-input h-full">
                    <div class="flex items-center gap-0 w-full rounded-lg relative bg-transparent mt-1">
                        <button type="button" data-action="decrement" class="btn btn-ghost btn-square btn-md text-2xl align-middle cursor-pointer">-</button>
                        <input type="number" min=1 value=1 class="quantity outline-none focus:outline-none text-center w-10 h-10 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700" name="custom-input-number"></input>
                        <button type="button" data-action="increment" class="btn btn-ghost btn-square btn-md text-2xl align-middle cursor-pointer">+</button>
                    </div>
                </div>
                <div class="py-[50px] flex justify-start items-center gap-8 text-capitalize">
                    <a href="" class="btn btn-wide sm:btn-sm md:btn-md lg:btn-lg">mua ngay</a>
                    <form action="">
                        <input type="hidden" value>
                        <input type="hidden" value>
                        <input type="hidden" value>
                        <input type="hidden" name="">
                        <a href="" class="btn btn-wide sm:btn-sm md:btn-md lg:btn-lg">thêm vào giỏ hàng</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="thong py-[80px]"><?= $description ?></div>
    </section>

    <!-- RELATED PRODUCTS  -->
    <section>
        <h2 class="font-[500] text-[35px] ">Sản phẩm liên quan</h2>
        <!-- product slider -->
        <div class="swiper product-slider container mx-auto">
            <div class="swiper-wrapper">
                <?php
                foreach (get_product_by_cate($cate_id, $man_id) as $items) : extract($items);
                ?>
                    <div class="swiper-slide p-5">
                        <div class='card shadow-lg w-80 rounded-md'>
                            <a href=<?php echo "?page=prod_overview&id={$id}" ?>>
                                <img src=<?= ROOT_PRODUCT . $image ?> alt="" class="card-img max-w-[250px] h-[250px] object-contain">
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
        </div>
    </section>
    <!-- comments  -->
    <section class="border-1 border-[#B9B9B9] rounded my-[30px] p-5">
        <h5 class="font-semibold text-xl"><i class="bi bi-chat-left-dots"></i> <span>Bình luận</span></h5>
        <div class="flex justify-start pl-[50px] items-center gap-3">
            <div class="card-actions justify-start ">
                <div class="avatar">
                    <div class="w-[50px] rounded-full mt-5">
                        <img src="https://placeimg.com/192/192/people" />
                    </div>
                </div>
            </div>
            <div>
                <span class="font-[600] text-[20px]"><?php /** tên người dùng */ ?></span>
                <p class="text-[20px]">Sản phẩm này hiện còn hàng không shop??</p>
            </div>
        </div>
        <!-- user infor -->
        <div class="rep pl-[100px] pt-[10px]">
            <img src="/img/rep.png" alt="" class="inline-block"> <span class="text-[#407CB4] font-[400] text-[20px] ">Phản hồi</span>
        </div>
        <!-- post comment form -->
        <form action="" method="post">
            <div class="lllp flex justify-start gap-[30px] items-center py-6 px-5">
                <img src="/img/Ellipse 1.png" alt="">
                <input type="text" name="" id="" placeholder="Write comment ..." class="min-h-[60px] 2xl:min-w-[900px] lg:min-w-[500px] min-w-[200px] px-[12px] border-2 rounded">
                <button><img src="/img/enter.png" alt=""></button>
            </div>
        </form>
    </section>
</div>
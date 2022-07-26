<!-- PRODUCT OVERVIEW  -->
<?php
$product = get_one_product($_GET['id']);
extract($product);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $prod_name ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>
    <?php include_once 'site/components/header.php';  ?>
    <main>
        <div class="p-10">
            <!-- product overview -->
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

                        <div class="py-[50px] flex justify-start items-center gap-8 text-capitalize">
                            <form action="?page=cart" method="POST">
                                <div class="flex items-center gap-0 w-full rounded-lg relative bg-transparent my-4">
                                    <button type="button" data-action="decrement" class="btn btn-ghost btn-square btn-md text-2xl align-middle cursor-pointer">-</button>
                                    <input type="number" name="qty" min=1 value=1 class="quantity outline-none focus:outline-none text-center w-10 h-10 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700" name="custom-input-number"></input>
                                    <button type="button" data-action="increment" class="btn btn-ghost btn-square btn-md text-2xl align-middle cursor-pointer">+</button>
                                </div>
                                <input type='hidden' name='id' value=<?= $id ?>>
                                <input type='hidden' name='name' value="<?php echo $prod_name ?>">
                                <input type='hidden' name='manu' value="<?php echo $manufacture ?>">
                                <input type='hidden' name='price' value=<?= $price ?>>
                                <input type='hidden' name='img' value=<?= $image ?>>
                                <input type='hidden' name='warranty' value=<?= $warranty_time ?>>
                                <input type='hidden' name='total' value=<?= $price * 1 ?>>
                                <!-- submit action -->
                                <button type='submit' onclick="addCart(this)" class='btn btn-primary'>
                                    <i class="bi bi-cart3"></i>
                                    <span class="indent-2">Mua ngay</span>
                                </button>
                                <button type="button" onclick="addCart(this)" class="btn btn-primary">
                                    <i class="bi bi-bag-plus"></i>
                                    <span class="indent-2">Thêm vào giỏ hàng</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="w-screen mx-auto py-[80px]"><?= $description ?></div>
            </section>

            <!-- RELATED PRODUCTS  -->
            <section>
                <h2 class="font-[500] text-[35px] ">Sản phẩm liên quan</h2>
                <!-- product slider -->
                <div class="swiper product-slider w-full">
                    <div class="swiper-wrapper">
                        <?php
                        foreach (get_products_by_cate($cate_id, $man_id) as $items) : extract($items);
                        ?>
                            <div class="swiper-slide p-5">
                                <?php include("site/components/product-card.php"); ?>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
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
    </main>
    <?php include_once 'site/components/footer.php'; ?>
    <script src="/site/js/common.js"></script>
    <script src="/site/js/add-cart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="site/js/swiper.js"></script>
</body>

</html>
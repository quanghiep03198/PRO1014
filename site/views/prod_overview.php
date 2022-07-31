<!-- PRODUCT OVERVIEW  -->
<?php
if (isset($_GET['id'])) {
    $product = get_one_product($_GET['id']);
    extract($product);
    $comments = get_all_comments_of_prod($_GET['id']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $prod_name ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>
    <?php include_once 'site/components/header.php';  ?>
    <main class="relative">
        <div class="grid gap-10 sm:grid-cols-1 lg:grid-cols-[1fr,3fr]">
            <div>
                <?php include_once 'site/components/sidebar.php' ?>
            </div>
            <div class="max-w-full flex flex-col gap-10 px-5">
                <!-- product overview -->
                <section>
                    <div class="container mx-auto grid sm:grid-cols-1 lg:grid-cols-[1fr,2.5fr] gap-10">
                        <!-- product image -->
                        <picture class="center">
                            <img src=<?= ROOT_PRODUCT . $image ?> alt="" class="object-cover center">
                        </picture>
                        <!-- product information -->
                        <div class="w-full flex flex-col gap-5">
                            <h2 class="text-3xl font-normal"><?= $prod_name ?></h2>
                            <span class="font-semibold text-2xl"><?= $price  . 'đ' ?></span>
                            <div class="rating">
                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                            </div>
                            <span class="font-medium text-2xl">Bảo hành : <span class="font-normal"><?= $warranty_time . ' tháng' ?></span></span>
                            <span class="font-medium text-2xl">Kho hàng : <span class="font-normal"><?php echo $stock > 0 ? "Còn hàng" : "Hết hàng" ?></span></span>

                            <div class="flex justify-start items-center gap-8 text-capitalize">
                                <form action="?page=cart" method="POST">
                                    <div class="flex items-center gap-0 w-full rounded-lg relative bg-transparent my-5">
                                        <label for="" class="text-xl font-medium pr-5">Số lượng:</label>
                                        <button type="button" onclick="changeQty(this,-1)" data-action="decrement" class="btn btn-ghost btn-square btn-md text-2xl align-middle cursor-pointer">-</button>
                                        <input type="number" name="qty" min=1 value=1 class="quantity outline-none focus:outline-none text-center w-10 h-10 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700" name="custom-input-number"></input>
                                        <button type="button" onclick="updateQty(this,1)" data-action="increment" class="btn btn-ghost btn-square btn-md text-2xl align-middle cursor-pointer">+</button>
                                    </div>
                                    <!-- product information form -->
                                    <input type='hidden' name='product_id' value=<?= $id ?>>
                                    <input type='hidden' name='product_name' value="<?php echo $prod_name ?>">
                                    <input type='hidden' name='manu' value="<?php echo $man_name ?>">
                                    <input type='hidden' name='price' value=<?= $price ?>>
                                    <input type='hidden' name='product_img' value=<?= $image ?>>
                                    <input type='hidden' name='qty' value=1>
                                    <input type='hidden' name='warranty' value=<?= $warranty_time ?>>
                                    <!-- submit action -->
                                    <button type='submit' onclick="addCart(this)" class='btn sm:btn-sm hover:btn-primary hover:btn-active'>
                                        <i class="bi bi-cart3 text-2xl"></i>
                                        <span class="indent-2">Mua ngay</span>
                                    </button>
                                    <button type="button" onclick="addCart(this)" class="btn sm:btn-sm hover:btn-primary hover:btn-active">
                                        <i class="bi bi-bag-plus text-2xl"></i>
                                        <span class="indent-2">Thêm vào giỏ hàng</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- product description -->
                    <div class="max-w-full mx-auto my-5"><?= $description ?></div>
                </section>
                <!-- RELATED PRODUCTS  -->
                <section>
                    <h1 class="text-2xl font-semibold mb-10 underline underline-offset-8">Sản phẩm tương tự</h1>
                    <div class="swiper related-product-slider max-w-5xl">
                        <div class="swiper-wrapper">
                            <?php foreach (get_related_product($product['cate_id']) as $product) : extract($product); ?>
                                <div class="swiper-slide">
                                    <?php include("site/components/product-card.php") ?>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </section>

                <!-- comments  -->
                <section class="border-1 border-[#B9B9B9] rounded my-[30px] p-5">
                    <h5 class="font-semibold text-xl mb-10"><i class="bi bi-chat-left-dots"></i> <span>Bình luận</span></h5>
                    <!-- comment list -->
                    <div class="w-full flex flex-col gap-6 h-80 overflow-y-scroll hidden-scrollbar" id="comment-box">
                        <?php foreach ($comments as $cmt) : extract($cmt) ?>
                            <div class="w-full mx-auto flex justify-start items-start gap-3">
                                <!-- user infor -->
                                <picture>
                                    <img src="<?php echo ROOT_AVATAR . $avatar ?>" class="w-[3rem] h-[3rem] rounded-full object-contain center" />
                                </picture>
                                <div>
                                    <div class="alert flex-col justify-between py-2 items-start w-full">
                                        <div class="flex justify-start items-center gap-2">
                                            <span class="text-base font-medium"><?php echo $username ?></span>
                                            <span class="text-sm"><?php echo $comment_date ?></span>
                                        </div>
                                        <p class="break-words truncate"><?php echo $cmt_content ?></p>
                                    </div>
                                    <input type="hidden" value=<?= $pr_comment_id ?>>
                                    <button onclick="reply(this)">Phản hồi</button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- show comment reply -->
                    </div>
                    <!-- post comment form -->
                    <form action="" method="POST" onsubmit="postCommentOnProduct(this,event)">
                        <div class="flex justify-start gap-[30px] items-center py-6 px-5">
                            <img src="<?php echo isset($_COOKIE['auth']) ? ROOT_AVATAR . $auth['avatar'] : ROOT_AVATAR . 'default.png' ?>" class="w-[4rem] h-[4rem] rounded-full object-contain" />
                            <div class="border px-3 py-2 flex justify-between items-center w-full rounded-md">
                                <input type="hidden" name="user" value="<?php echo $auth['id'] ?>">
                                <input type="hidden" name="avatar" value="<?php echo $auth['avatar'] ?>">
                                <input type="hidden" name="username" value="<?php echo $auth['name'] ?>">
                                <input type="hidden" name="product_id" value="<?php echo $_GET['id'] ?>">
                                <input type="hidden" name="REQUEST" value="POST">
                                <input type="text" name="content" id="content" placeholder="Nhập bình luận ..." class="input input-sm w-full border-none focus:outline-none">
                                <button type="submit" name="create_comment">
                                    <i class="bi bi-send"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </main>
    <?php include_once 'site/components/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="site/js/carousel.js"></script>
    <script src="site/js/common.js"></script>
    <script src="site/js/handle-cart.js"></script>
    <script src="site/js/handle-post-request.js"></script>
    <script src="site/js/product-pagination.js"></script>
    <script>
        const updateQty = (btn, unitVal) => {
            const target = btn.parentElement.querySelector(".quantity");
            let value = +target.value; // ảo ma canada
            value += +unitVal;
            if (value < 1) value = 1;
            target.value = value;
        };
    </script>
</body>

</html>
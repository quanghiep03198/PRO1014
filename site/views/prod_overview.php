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
    <link rel="icon" type="image/x-icon" href="/img/settings/logo-footer.ico">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/swal.css">
</head>

<body>
    <?php include_once 'site/components/header.php';  ?>
    <main class="relative bg-white">
        <div class="w-full grid sm:grid-cols-1 lg:grid-cols-[1fr,3fr] gap-10 relative">
            <!-- import side bar from components -->
            <?php include_once 'site/components/sidebar.php' ?>

            <div class="flex flex-col gap-10 px-5">
                <!-- product overview -->
                <section>
                    <div class="container mx-auto grid sm:grid-cols-1 md:grid-cols-[1fr,1.5fr] md:mx-0 lg:grid-cols-[1fr,2.5fr] gap-10">
                        <!-- product image -->
                        <div class="">
                            <img src=<?= ROOT_PRODUCT . $image ?> alt="" class="max-w-full object-cover center">
                        </div>
                        <!-- product information -->
                        <div class="w-full flex flex-col gap-5">
                            <h2 class="text-3xl font-semibold"><?= $prod_name ?></h2>
                            <span class="font-semibold text-2xl text-accent"><?php echo number_format($price, 0, ',', '.') . '₫' ?></span>
                            <div class="rating">
                                <?php foreach (get_reviews_label() as $review) : ?>
                                    <input type="radio" value=<?= $review['id'] ?> <?php if ($review['id'] == get_most_feedback($id)) echo "checked" ?> class="mask mask-star-2 bg-warning" disabled>
                                <?php endforeach; ?>
                            </div>
                            <span class="font-medium text-2xl">Bảo hành : <span class="font-normal"><?= $warranty_time . ' tháng' ?></span></span>
                            <span class="font-medium text-2xl">Kho hàng : <span class="font-normal"><?php echo $stock > 0 ? "Còn hàng" : "Hết hàng" ?></span></span>

                            <div class="flex justify-start items-center gap-8 text-capitalize">
                                <form method="POST">
                                    <div class="flex items-center gap-0 w-full rounded-lg relative bg-transparent my-5">
                                        <label for="" class="text-xl font-medium pr-5">Số lượng:</label>
                                        <button type="button" onclick="updateQty(this,-1)" data-action="decrement" class="btn btn-ghost btn-square btn-md text-2xl align-middle cursor-pointer">-</button>
                                        <input type="number" name="qty" min=1 value=1 class="quantity outline-none focus:outline-none text-center w-10 h-10 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700" name="custom-input-number"></input>
                                        <button type="button" onclick="updateQty(this,1)" data-action="increment" class="btn btn-ghost btn-square btn-md text-2xl align-middle cursor-pointer">+</button>
                                    </div>
                                    <!-- submit action -->
                                    <div class="flex sm:flex-col items-center gap-5">
                                        <!-- product information form -->
                                        <input type='hidden' name='product_id' value=<?= $_GET['id'] ?>>
                                        <input type='hidden' name='product_name' value="<?php echo $prod_name ?>">
                                        <input type='hidden' name='manu' value="<?php echo $man_name ?>">
                                        <input type='hidden' name='price' value=<?= $price ?>>
                                        <input type='hidden' name='stock' value=<?= $stock ?>>
                                        <input type='hidden' name='product_img' value=<?= $image ?>>
                                        <input type='hidden' name='warranty' value=<?= $warranty_time ?>>
                                        <button type='button' actions="goToCart" onclick="addCart(this)" class='btn sm:btn-sm hover:btn-primary hover:btn-active'>
                                            <i class="bi bi-cart3 text-2xl"></i>
                                            <span class="indent-2">Mua ngay</span>
                                        </button>
                                        <button type="button" onclick="addCart(this)" class="btn sm:btn-sm hover:btn-primary hover:btn-active">
                                            <i class="bi bi-bag-plus text-2xl"></i>
                                            <span class="indent-2">Thêm vào giỏ hàng</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="my-5">
                                <h3 class="text-2xl font-medium mb-5 ">Chính sách mua hàng tiện lợi!</h3>
                                <ul class="flex flex-col gap-5">
                                    <li class="text-xl">
                                        <i class="bi bi-arrow-return-left"></i>
                                        <span class="indent-2">Đổi trả trong 7 ngày</span>
                                    </li>
                                    <li class="text-xl">
                                        <i class="bi bi-truck"></i>
                                        <span class="indent-2">Giao hàng tận nơi: 3-5 ngày</span>
                                    </li>
                                    <li class="text-xl">
                                        <i class="bi bi-credit-card"></i>
                                        <span class="indent-2">Hỗ trợ thanh toán nhanh chóng qua cổng VNPay</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- product description -->
                    <div class="max-w-full mx-auto my-5">
                        <h3 class="text-2xl font-semibold underline underline-offset-8 mb-10">Chi tiết sản phẩm</h3>
                        <div><?= $description ?></div>
                    </div>
                </section>


                <!-- RELATED PRODUCTS  -->
                <section>
                    <h1 class="text-2xl font-semibold mb-10 underline underline-offset-8">Sản phẩm tương tự</h1>
                    <div class="swiper related-product-slider sm:max-w-sm md:container lg:max-w-5xl mx-auto md:p-5 lg:p-10 h-auto">
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
                <section class="max-w-5xl mb-10">
                    <h5 class="font-semibold text-xl mb-10"><i class="bi bi-chat-left-dots"></i> <span>Bình luận</span></h5>

                    <!-- comment list -->
                    <div class="flex flex-col gap-6 max-h-80 overflow-y-auto hidden-scrollbar" id="comment-box">
                        <!-- comment list-->
                        <?php foreach ($comments as $cmt) : extract($cmt) ?>
                            <div id="<?= $pr_comment_id ?>">
                                <!-- comment -->
                                <div class="comment card card-side bg-zinc-300 items-start w-auto mb-3" id="">
                                    <figure class="p-2">
                                        <img src="<?php echo ROOT_AVATAR . $avatar ?>" class="w-[3rem] h-[3rem] rounded-full object-cover center" />
                                    </figure>
                                    <div class="card-body justify-start py-2">
                                        <h2 class="card-title text-lg"><?php echo $username ?></h2>
                                        <small><?php echo $comment_date ?></small>
                                        <p><?php echo $cmt_content ?></p>
                                        <div class="card-actions justify-end items-center">
                                            <label class="swap">
                                                <input type="checkbox" />
                                                <div class="swap-on btn btn-sm btn-ghost normal-case" onclick="showReps(document.getElementById('<?= $pr_comment_id ?>'))">Ẩn</div>
                                                <div class="swap-off btn btn-sm btn-ghost normal-case" onclick="hiddenReps(document.getElementById('<?= $pr_comment_id ?>'))"><?php echo get_reply_counter($pr_comment_id) . " phản hồi" ?></div>
                                            </label>
                                            <input type="hidden" value=<?= $pr_comment_id ?>>
                                            <button onclick='reply("<?= $username ?>","<?= $pr_comment_id ?>")' class="btn btn-sm btn-ghost normal-case">
                                                Phản hồi <i class="bi bi-reply px-1"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- reply -->
                                <?php
                                $replies = get_product_reply_comments($pr_comment_id);
                                if (!empty($replies)) :
                                    foreach ($replies as $reply) : extract($reply)
                                ?>
                                        <div class="reply card card-side items-start ml-10 mb-2 bg-gray-200 hidden">
                                            <figure class="p-2">
                                                <img src="<?php echo ROOT_AVATAR . $avatar ?>" class="w-[3rem] h-[3rem] rounded-full object-cover center" />
                                            </figure>
                                            <div class="card-body justify-start py-2">
                                                <h2 class="card-title text-lg"><?php echo $username ?></h2>
                                                <small><?php echo $comment_date ?></small>
                                                <p><?php echo $content ?></p>
                                                <div class="card-actions justify-end">
                                                    <input type="hidden" value=<?= $pr_comment_id ?>>
                                                    <button onclick='reply("<?= $username ?>","<?= $pr_comment_id ?>")' class="btn btn-sm btn-ghost normal-case">
                                                        Phản hồi <i class="bi bi-reply px-1"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </div>
                        <?php endforeach; ?>
                        <!-- show comment reply -->
                    </div>

                    <!-- post comment form -->
                    <form action="" method="POST" onsubmit="postCommentOnProduct(this,event)">
                        <div class="flex justify-start gap-[30px] items-center py-6 px-5 h-32 relative">
                            <img src="<?php echo isset($_COOKIE['auth']) ? ROOT_AVATAR . $auth['avatar'] : ROOT_AVATAR . 'default.png' ?>" class="w-[4rem] h-[4rem] rounded-full object-cover" />
                            <div class="w-full ">
                                <div class="border px-3 py-2 flex justify-between items-center w-full rounded-md">
                                    <input type="hidden" name="user" value="<?php echo $auth['id'] ?>">
                                    <input type="hidden" name="avatar" value="<?php echo ROOT_AVATAR . $auth['avatar'] ?>">
                                    <input type="hidden" name="username" value="<?php echo $auth['name'] ?>">
                                    <input type="hidden" name="product_id" value="<?php echo $_GET['id'] ?>">
                                    <input type="hidden" name="comment_id" id="comment-id">
                                    <input type="hidden" name="REQUEST" id="req">
                                    <input type="text" name="content" id="comment-input" placeholder="Nhập bình luận ..." class="input input-sm w-full border-none focus:outline-none">
                                    <button type="submit" name="create_comment">
                                        <i class="bi bi-send"></i>
                                    </button>
                                </div>
                                <button type="button" onclick="cancelReply(this)" class="btn btn-sm btn-ghost hidden absolute bottom-0" id="cancel-rep__btn"><i class="bi bi-x"></i> Hủy</button>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </main>
    <?php include_once 'site/components/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/js/common.js"></script>
    <script src="js/validate.js"></script>
    <script src="/js/carousel.js"></script>
    <script src="js/handle-comment.js"></script>
    <script src="js/handle-userdata.js"></script>
    <script src="js/handle-cart.js"></script>
    <script>
        const table = document.querySelector("table")
        if (table)
            table.classList.add("table");
        const updateQty = (btn, unitVal) => {
            const target = btn.parentElement.querySelector(".quantity");
            let value = +target.value; // ảo ma canada
            value += +unitVal;
            if (value < 1) value = 1;
            target.value = value;
        };


        const comments = document.querySelectorAll(".comment")
        comments.forEach(cmt => {
            const showRepBtn = cmt.querySelector(".swap-on")
            const hiddenRepBtn = cmt.querySelector(".swap-off")
            showRepBtn.onclick = function() {
                showReps(cmt)
            }
            hiddenRepBtn.onclick = function() {
                hiddenReps(cmt)
            }
        })
    </script>
</body>

</html>
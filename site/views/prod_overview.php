<!-- PRODUCT OVERVIEW  -->
<?php
$product = get_one_product($_GET['id']);

extract($product);
// print_r($product);

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
    <main>
        <div class="grid gap-10 sm:grid-cols-1 lg:grid-cols-[1fr,3fr]">
            <div>
                <?php include_once 'site/components/sidebar.php' ?>
            </div>
            <div class="max-w-full flex flex-col gap-10 px-5">
                <!-- product overview -->
                <section>
                    <div class="container mx-auto grid sm:grid-cols-1 lg:grid-cols-[1fr,2.5fr]">
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
                            <span class="font-medium text-2xl">Bảo hành : <span class="font-normal"><?= $warranty_time . ' năm' ?></span></span>
                            <span class="font-medium text-2xl">Kho hàng : <span class="font-normal"> Còn hàng</span></span>

                            <div class="flex justify-start items-center gap-8 text-capitalize">
                                <form action="?page=cart" method="POST">
                                    <div class="flex items-center gap-0 w-full rounded-lg relative bg-transparent my-5">
                                        <label for="" class="text-xl font-medium pr-5">Số lượng:</label>
                                        <button type="button" onclick="changeQty(this,-1)" data-action="decrement" class="btn btn-ghost btn-square btn-md text-2xl align-middle cursor-pointer">-</button>
                                        <input type="number" name="qty" min=1 value=1 class="quantity outline-none focus:outline-none text-center w-10 h-10 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700" name="custom-input-number"></input>
                                        <button type="button" onclick="changeQty(this,1)" data-action="increment" class="btn btn-ghost btn-square btn-md text-2xl align-middle cursor-pointer">+</button>
                                    </div>
                                    <input type='hidden' name='id' value=<?= $id ?>>
                                    <input type='hidden' name='name' value="<?php echo $prod_name ?>">
                                    <input type='hidden' name='manu' value="<?php echo $man_name ?>">
                                    <input type='hidden' name='price' value=<?= $price ?>>
                                    <input type='hidden' name='img' value=<?= $image ?>>
                                    <input type='hidden' name='warranty' value=<?= $warranty_time ?>>
                                    <input type='hidden' name='total' value=<?= $price * 1 ?>>
                                    <!-- submit action -->
                                    <button type='submit' onclick="addCart(this)" class='btn sm:btn-sm hover:btn-primary hover:btn-active'>
                                        <i class="bi bi-cart3"></i>
                                        <span class="indent-2">Mua ngay</span>
                                    </button>
                                    <button type="button" onclick="addCart(this)" class="btn sm:btn-sm hover:btn-primary hover:btn-active">
                                        <i class="bi bi-bag-plus"></i>
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
                    <h2 class="text-3xl mb-8">Sản phẩm liên quan</h2>
                    <!-- product slider -->

                    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                        <?php foreach (get_related_product($product['cate_id']) as $product) :
                            extract($product);
                            include('site/components/product-card.php');
                        endforeach; ?>
                    </div>
                    <div class="pagination btn-group center p-10"></div>
                </section>
                <!-- comments  -->
                <section class="border-1 border-[#B9B9B9] rounded my-[30px] p-5">
                    <h5 class="font-semibold text-xl mb-10"><i class="bi bi-chat-left-dots"></i> <span>Bình luận</span></h5>
                    <div class="container mx-auto flex justify-start  items-start gap-3">
                        <!-- user infor -->
                        <picture>
                            <img src="https://placeimg.com/192/192/people" class="w-[3rem] h-[3rem] rounded-full object-contain center" />
                        </picture>
                        <div>
                            <div class="alert flex-col items-start w-auto">
                                <span class="text-sm font-bold">Quang Hiệp</span>
                                <p class="break-words truncate">Lorem ipsum, dolor sit amet consectetur adi</p>
                            </div>
                            <a href=<?php echo "?page=prod_overview&id={$product['id']}&comment_id=" ?> class="text-primary">Phản hồi</a>
                        </div>
                    </div>


                    <!-- post comment form -->
                    <form action="" method="post">
                        <div class="flex justify-start gap-[30px] items-center py-6 px-5">
                            <img src="https://placeimg.com/192/192/people" class="w-[4rem] h-[4rem] rounded-full object-contain" />
                            <div class="border px-3 py-2 flex justify-between items-center w-full rounded-md">
                                <input type="text" name="" id="" placeholder="Nhập bình luận ..." class="input input-sm w-full border-none focus:outline-none">
                                <i class="bi bi-send"></i>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </main>
    <?php include_once 'site/components/footer.php'; ?>
    <script src="/site/js/common.js"></script>
    <script src="/site/js/add-cart.js"></script>
    <script src="/site/js/product-pagination.js"></script>
    <script>
        const changeQty = (btn, unitVal) => {
            const target = btn.parentElement.querySelector(".quantity");
            let value = +target.value; // ảo ma canada
            value += +unitVal;
            if (value < 1) value = 1;
            target.value = value;
        };
    </script>
</body>

</html>
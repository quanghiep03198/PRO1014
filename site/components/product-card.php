<div class='product-card card px-0 w-80 rounded-box relative shadow-xl bg-base-100'>
    <?php if ($discount > 0 && $stock > 0) : ?>
        <span class="badge badge-secondary badge-error !p-4 text-xl text-white absolute top-3 left-3 animate-pulse z-20"><?= $discount . '%' ?></span>
    <?php endif;  ?>

    <picture class="max-w-full h-64 relative center">
        <a href=<?php echo "?page=prod_overview&id={$id}" ?>>
            <img src=<?= ROOT_PRODUCT . $image ?> alt="" class="max-w-xs h-60 object-contain">
        </a>
        <?php if ($stock == 0) : ?>
            <span class="badge badge-lg badge-error !p-4 absolute text-xl text-white top-3 left-3">Hết hàng</span>
        <?php endif ?>
    </picture>
    <div class="card-body w-full h-full !p-5">
        <div class="flex flex-col justify-start items-start gap-0">
            <h4 class='text-left text-xl font-semibold w-full truncate '><?= $prod_name ?></h4>
            <span class='text-accent text-xl font-medium'><?php echo number_format($price, 0, '', '.') . '₫' ?></span>
            <div class='rating block'>
                <?php foreach (get_reviews_label() as $review) : ?>
                    <input type="radio" value=<?= $review['id'] ?> <?php if ($review['id'] == get_most_feedback($id)) echo "checked" ?> class="mask mask-star-2 bg-warning" disabled>
                <?php endforeach; ?>
            </div>
            <span><?= get_feedback_counter($id) . ' reviews' ?></span>
        </div>
        <form action='' method='POST' class="w-full card-action">
            <div class="flex justify-around items-center">
                <!-- product information form -->
                <input type='hidden' name='product_id' value=<?= $id ?>>
                <input type='hidden' name='product_name' value="<?php echo $prod_name ?>">
                <input type='hidden' name='manu' value="<?php echo $man_name ?>">
                <input type='hidden' name='price' value=<?= $price ?>>
                <input type='hidden' name='stock' value=<?= $stock ?>>
                <input type='hidden' name='product_img' value=<?= $image ?>>
                <input type='hidden' name='qty' value=1>
                <input type='hidden' name='warranty' value=<?= $warranty_time ?>>
                <input type='hidden' name='total' value=<?= $price * 1 ?>>
                <input type="hidden" name="REQUEST" value="POST">
                <!-- product card button group -->
                <button type='button' actions="goToCart" onclick="addCart(this)" class='btn-square btn-lg p-5 text-3xl hover:animate-pulse hover:text-error'><i class="bi bi-cart3"></i></button>
                <button type="button" onclick="addCart(this)" class="btn-square btn-lg p-5 text-3xl hover:animate-pulse hover:text-error"><i class="bi bi-bag-plus"></i></button>
                <button type="submit" onclick="addWishlist(this,event)" class="btn-square btn-lg p-5 text-3xl hover:animate-pulse hover:text-error"><i class="bi bi-heart"></i></button>
            </div>
        </form>
    </div>
</div>
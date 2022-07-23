<div class='col shadow-lg p-5'>
    <div class='imggg'>
        <a href=<?php echo "?page=prod-overview&id={$id}" ?>>
            <img src=<?= $ROOT_PRODUCT . $image ?> alt="">
        </a>
    </div>
    <div class='ctt'>
        <h4 class='text-[20px]'><?= $name ?></h4>
        <div class='rating'>
            <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' />
            <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' />
            <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' />
            <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' checked />
            <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' />

        </div>

        <p class="text-[16px]"> viewers</p>
        <span class='text-[#407CB4] text-[20px] font-[500]'>$price</span> <span class='text-[#407CB4] text-[20px] font-[500]' đ</span>
    </div>
    <form action='?page=addtocart' method='post'>
        <input type='hidden' name='id' value='$PRODUCT_ID'>
        <input type='hidden' name='name_pro' value=' $PRODUCT_NAME'>
        <input type='hidden' name='price' value='$PRICE'>
        <input type='hidden' name='img' value=''>
        <button type='submit' class='colsa btn w-full mt-[10px]' name='add_btn'>Mua Ngay</button>
    </form>
</div>
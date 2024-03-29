<div class="card bg-base-100 shadow-2xl max-w-xs h-fit">
    <a href="?page=post_detail&id=<?php echo $id ?>">
        <img src="<?php echo ROOT_POST . $img ?>" alt="Shoes" class="center max-w-full h-72 object-cover" />
    </a>
    <div class="card-body px-3 bg-white text-gray-800">
        <h2 class="card-title text-xl font-lg">
            <p class="truncate"><?= $title ?></p>
        </h2>
        <p class="truncate"> <?php echo $short_desc ?></p>
        <div class="flex justify-start items-center gap-5">
            <img src="<?php echo ROOT_AVATAR . $avatar ?>" class="avatar w-12 h-12 rounded-full" />
            <div>
                <span class="text-[15px]">Đăng bởi :</span> <span class="font-[600]"><?= $author ?></span>
                <p class="text-[12px]"><?php echo $posted_date ?></p>
            </div>
        </div>
        <a href="?page=post_detail&id=<?= $id ?>" class="btn btn-block hover:btn-primary">Xem thêm</a>
    </div>
</div>
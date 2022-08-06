<div class="card bg-base-100 shadow-xl">

    <a href="?page=post_detail&id=<?php echo $id ?>">
        <img src="<?php echo ROOT_POST . $img ?>" alt="Shoes" class="center w-full h-72 object-fill" />
    </a>
    <div class="card-body px-3">
        <h2 class="card-title text-xl font-lg"><?= $title ?></h2>
        <p><?php echo $short_desc ?></p>
        <div class="flex justify-start items-center gap-5">
            <img src="<?php echo ROOT_AVATAR . $avatar ?>" class="avatar w-12 h-12 rounded-full" />
            <div>
                <span class="text-[15px]">Đăng bởi :</span> <span class="font-[600]"><?= $author ?></span>
                <p class="text-[12px]"><?php echo $posted_date ?></p>
            </div>
        </div>
        <a href="?page=post&id=" class="btn btn-block hover:btn-primary">Xem thêm</a>
    </div>
</div>
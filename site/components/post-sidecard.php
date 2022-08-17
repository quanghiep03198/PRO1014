<div class="card card-side rounded-box shadow-xl w-fit">
    <figure class="basis-1/3">
        <a href="?page=post&id=<?= $post['id'] ?>"><img src=<?php echo ROOT_POST . $img ?> alt="" class="w-full h-full object-cover"></a>
    </figure>
    <div class="basis-2/3 p-5 card-body ">
        <div class="w-[18rem]">
            <h2 class="font-semibold text-xl truncate"><?php echo $title ?></h2>
            <p class="font-normal truncate"><?php echo $short_desc ?></p>
        </div>
        <p class="text-sm font-bold">Đăng ngày: <span class="font-normal"><?php echo $create_date ?></span></p>
        <p class="text-sm font-bold">Bởi: <span class="font-normal"><?php echo $author_name ?></span></p>
        <div class="card-actions justify-end">
            <a href="?page=post&id=<?= $post['id'] ?>" class="btn hover:btn-primary">Đọc tiếp</a>
        </div>
    </div>
</div>
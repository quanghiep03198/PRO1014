<aside class="sticky top-0 right-0 h-screen bg-white shadow-2xl rounded-box flex flex-col border">
    <div class="flex flex-col gap-5">
        <div class=" p-5 rounded-tl-2xl rounded-tr-2xl">
            <h1 class="text-xl font-medium px-4"><i class="bi bi-list"></i> <span class="indent-2">Danh mục bài viết</span> </h1>
        </div>

        <!-- tìm kiếm sản phẩm -->
        <form action="" class="px-5">
            <input type="hidden" name="page" value="post">
            <div class="input-group">
                <input type="text" placeholder="Tìm kiếm bài viết" name="kw" class="input input-bordered focus:outline-none w-[80%]" />
                <button class="btn btn-square ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
        </form>
        <!-- menu -->
        <div class="container mx-auto px-5">
            <ul class="menu gap-5">
                <li><a href="?page=post">Tất cả bài viết</a></li>
                <?php foreach (get_post_categories() as $cate) : extract($cate) ?>
                    <li><a href="?page=post&cate=<?= $id ?>"><?= $name ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

    </div>
</aside>
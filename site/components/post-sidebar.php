<aside class="sticky top-0 right-0 h-screen bg-white shadow-2xl p-5 rounded-box flex flex-col">

    <div class="flex flex-col gap-5 py-5 rounded-box">
        <h1 class="text-xl font-medium px-4"><i class="bi bi-list"></i> <span class="indent-2">Danh mục bài viết</span> </h1>
        <!-- tìm kiếm sản phẩm -->
        <form action="" class="GET">
            <input type="hidden" name="page" value="post">
            <div class="input-group justify-center">
                <input type="text" placeholder="Tìm kiếm bài viết" name="kw" class="input input-bordered focus:outline-none w-[80%]" />
                <button class="btn btn-square ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
        </form>
        <!-- menu -->
        <div class="container mx-auto ">
            <ul class="menu gap-5">
                <li><a href="?page=post">Tất cả bài viết</a></li>
                <?php foreach (get_post_categories() as $cate) : extract($cate) ?>
                    <li><a href="?page=post&cate=<?= $id ?>"><?= $name ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div>

    </div>


</aside>
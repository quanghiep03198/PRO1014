<?php
if (!isset($_GET['cate']) && !isset($_GET['kw'])) {
    $posts = get_all_posts(0, 6);
    $heading = "Tin tức mới";
}
if (isset($_GET['cate'])) {
    $posts = get_posts_groupby_cate($_GET['cate']);
    $heading = count($posts) > 0 ? $posts[0]['cate_name'] : "Danh mục hiện chưa có bài viết nào!";
}

if (isset($_GET['kw'])) {
    $posts = get_posts_by_kw($_GET['kw']);
    $heading = count($posts) > 0 ? count($posts) . " bài viết" : "Không có kết quả nào phù hợp!";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức</title>
    <link rel="icon" type="image/x-icon" href="/img/settings/logo-footer.ico">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/swal.css">
</head>
<style>
    .swiper-pagination-bullet {
        width: 1rem;
        height: 1rem;
        border: 2px solid white;
        background-color: #570df8;
    }

    .swiper-pagination-bullet-active {
        background-color: #570df8;
    }
</style>

<body class="relative">
    <!-- import header from component -->
    <?php include_once 'site/components/header.php';  ?>
    <!--  -->
    <main class="container mx-auto py-10">
        <div class="flex flex-grow sm:flex-col-reverse md:flex-col-reverse lg:flex-row gap-10">
            <!-- main interface -->
            <div class="basis-2/3 container mx-auto">
                <!-- slider -->

                <div class="swiper post-slider max-w-4xl">
                    <div class="swiper-wrapper">
                        <?php foreach (get_new_posts(0, 3) as $post) : extract($post); ?>
                            <div class="swiper-slide h-96">
                                <div class="hero w-full h-full !place-items-stretch" style="background-image: url(<?php echo ROOT_POST . $img ?>)">
                                    <div class="hero-overlay bg-opacity-60"></div>
                                    <div class="hero-content !justify-start text-left text-neutral-content px-8">
                                        <div class="max-w-md">
                                            <h1 class="mb-5 text-2xl font-bold"><?php echo  $title ?></h1>
                                            <p class="mb-5"><?php echo $short_desc ?></p>
                                            <a href="?page=post_detail&id=<?= $id ?>" class="btn btn-primary">Đọc tiếp</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>

                <!-- tin tức mới -->
                <article>
                    <h2 class="text-center sm:text-2xl md:text-3xl lg:text-4xl font-bold my-10" id="title"><?= $heading ?></h2>
                    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 items-stretch gap-5">
                        <?php
                        foreach ($posts as $post) :
                            extract($post);
                            include "site/components/post-card.php";
                        endforeach;
                        ?>
                    </div>
                    <div class="pagination btn-group center p-10"></div>
                    <!-- hot news -->
                    <div>
                        <h3 class="text-3xl font-semibold mb-5">Bài viết nổi bật</h3>
                        <div class="flex flex-col justify-between gap-5">
                            <?php foreach (get_most_comment_post() as $post) : extract($post); ?>
                                <div class="card card-side rounded-box shadow-xl w-fit">
                                    <figure class="basis-1/3">
                                        <a href="?page=post&id=<?= $post['id'] ?>"><img src=<?php echo ROOT_POST . $img ?> alt="" class="w-full h-full object-cover"></a>
                                    </figure>
                                    <div class="basis-2/3 p-5 card-body ">
                                        <div class="max-w-lg">
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

                            <?php endforeach; ?>
                        </div>
                    </div>
                </article>
            </div>
            <!-- import sidebar -->
            <div class="basis-1/3">
                <?php include_once "site/components/post-sidebar.php" ?>
            </div>
        </div>
    </main>
    <?php include_once 'site/components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="js/common.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/handle-userdata.js"></script>
    <script src="js/product-pagination.js"></script>
    <script src="js/carousel.js"></script>
    <script>
        // const paginationBtns = $(".pagination-button")

        // function visited(button) {
        //     paginationBtns.forEach((btn) => {
        //         btn.classList.remove("btn-primary");
        //     })
        //     button.classList.add("btn-primary")
        // }
        // paginationBtns[0].classList.add("btn-primary");
    </script>
</body>

</html>
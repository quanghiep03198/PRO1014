<?php
if (isset($_GET['id'])) {
    $post = get_one_post($_GET['id']);
    extract($post);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
</head>
<style>
    .reply-btn {
        display: none;
    }
</style>

<body class="relative">
    <?php include_once 'site/components/header.php';  ?>
    <!-- HEADER END  -->
    <main class="container mx-auto">

        <div class="grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-[70%,30%] gap-10 py-10">
            <div>
                <article class="container mx-auto flex flex-col gap-5 ">
                    <h1 class="sm:text-xl md: text-2xl lg:text-4xl font-bold "><?= $title ?></h1>
                    <p class="sm:text-lg text-xl font-medium "><?php echo $short_desc ?></p>
                    <div class="flex sm:flex-col sm:items-start items-center gap-5">
                        <small class="badge badge-outline badge-lg">Đăng bởi: <span class="indent-2 font-semibold"><?= $author ?></span></small>
                        <small class="badge badge-outline badge-lg">Ngày đăng: <span class="indent-2 font-semibold"><?= $posted_date ?></span></small>
                    </div>
                    <div class="text-justify">
                        <?php echo $body ?>
                    </div>
                </article>
                <!-- comments  -->
                <section class="border-1 border-[#B9B9B9] rounded my-[30px] p-5">
                    <h5 class="font-semibold text-xl mb-10"><i class="bi bi-chat-left-dots"></i> <span>Bình luận</span></h5>
                    <!-- comment list -->
                    <div class="w-full flex flex-col gap-6 max-h-80 overflow-y-scroll hidden-scrollbar" id="comment-box">
                        <?php foreach (get_all_post_comments($_GET['id']) as $cmt) : extract($cmt) ?>
                            <div class="w-full mx-auto flex justify-start items-start gap-3">
                                <!-- user infor -->
                                <picture>
                                    <img src="<?php echo ROOT_AVATAR . $avatar ?>" class="w-[3rem] h-[3rem] rounded-full object-contain center" />
                                </picture>
                                <div>
                                    <div class="alert flex-col justify-between py-2 items-start w-full">
                                        <div class="flex justify-start items-center gap-2">
                                            <span class="text-base font-medium"><?php echo $username ?></span>
                                            <span class="text-sm"><?php echo $posted_date ?></span>
                                        </div>
                                        <p class="break-words truncate "><?php echo $content ?></p>
                                    </div>
                                    <input type="hidden" value=<?= $_GET['id'] ?>>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- show comment reply -->
                    </div>
                    <!-- post comment form -->
                    <form action="" method="POST" onsubmit="postCommentOnPost(this,event)">
                        <div class="flex justify-start gap-[30px] items-center py-6 px-5">
                            <img src="<?php echo isset($_COOKIE['auth']) ? ROOT_AVATAR . $auth['avatar'] : ROOT_AVATAR . 'default.png' ?>" class="w-[4rem] h-[4rem] rounded-full object-contain" />
                            <div class="border px-3 py-2 flex justify-between items-center w-full rounded-md">
                                <input type="hidden" name="user" value="<?php echo $auth['id'] ?>">
                                <input type="hidden" name="avatar" value="<?php echo ROOT_AVATAR . $auth['avatar'] ?>">
                                <input type="hidden" name="username" value="<?php echo $auth['name'] ?>">
                                <input type="hidden" name="post_id" value="<?php echo $_GET['id'] ?>">
                                <input type="text" name="content" id="content" placeholder="Nhập bình luận ..." class="input input-sm w-full border-none focus:outline-none">
                                <button type="submit" name="create_comment">
                                    <i class="bi bi-send"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
            <!-- sidebar -->
            <?php include_once "site/components/post-sidebar.php" ?>
        </div>
    </main>
    <?php include_once 'site/components/footer.php'; ?>
    <script src="js/common.js"></script>
    <script src="js/handle-post-request.js"></script>
</body>

</html>
<?php
$error = [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới bài viết</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.tiny.cloud/1/xqzory9nvy597bn74b72f5de86nfknihmi10e9yfgi0fw699/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

</head>

<body>
    <div class="flex justify-start items-stretch">
        <!-- import sidebar -->
        <?php include_once "./admin/components/sidebar.php" ?>
        <!--  -->
        <section class="w-full">
            <div class="bg-primary p-10 w-full mb-10 flex justify-between">
                <h1 class="text-white text-3xl">Thêm mới bài viết</h1>
                <div class="dropdown dropdown-end ">
                    <label tabindex="0" class="text-white"><i class="bi bi-list"></i></label>
                    <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-80">
                        <li><a href="?page=post-list">Danh sách bài viét</a></li>
                        <li><a href="?page=post_cate-list">Danh mục bài viết</a></li>
                    </ul>
                </div>
            </div>
            <form action="/admin/controllers/post.php" method="post" enctype="multipart/form-data" class="w-full sm:p-5 md:p-10 lg:p-10 mx-auto" onsubmit="handleErrorCreateProduct(this,event)">
                <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-10 items-stretch mb-10">
                    <div class="flex flex-col gap-5">
                        <!-- tên sản phẩm -->
                        <div class="form-control">
                            <label class="text-xl">Tiêu đề</label>
                            <input type="text" data-name="tiêu đề" class="input input-bordered" name="title" id="">
                            <small class="text-base text-error error-message font-semibold"></small>
                        </div>
                        <!-- mô tả -->
                        <div class="form-control">
                            <label class="text-xl">Mô tả</label>
                            <input type="text" data-name="mô tả" class="input input-bordered" name="short_description" id="">
                            <small class="text-base text-error error-message font-semibold"></small>
                        </div>
                        <!-- danh mục sản phẩm -->
                        <div class="form-control">
                            <label class="text-xl">Danh mục bài viết</label>
                            <select name="post_category" data-name="danh mục bài viết" class="select select-bordered">
                                <option value="">Chọn danh mục bài viết</option>
                                <?php foreach (get_all_post_cate() as $cate) : extract($cate); ?>
                                    <option value=<?= $id ?>><?= $name ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-base text-error error-message font-semibold"></small>
                        </div>


                        <!-- ảnh sản phẩm -->
                        <div class="form-control">
                            <label class="text-xl">Ảnh thumbnail</label>
                            <input type="file" data-name="ảnh sản phẩm" class="input input-bordered file:hover:btn-primary file:btn px-0" name="thumbnail">
                            <small class="text-base text-error error-message font-semibold"></small>
                        </div>
                    </div>
                    <div class="flex flex-col gap-5">
                        <!-- mô tả -->
                        <div class="form-control">
                            <label class="text-xl">Nội dung bài viết</label>
                            <textarea name="body" data-name="nội dung bài viết"></textarea>
                            <small class="text-base text-error error-message font-semibold"></small>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div>
                    <input type="hidden" name="author" value=<?php echo $auth['id'] ?>>
                    <button type="submit" name="create_post" class="btn btn-lg hover:btn-primary w-auto">Đăng bài viết</button>
                </div>

            </form>
        </section>
    </div>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
            toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
        });
    </script>
    <script src="./js/common.js"></script>
    <script src="./js/validate.js"></script>
    <script>
        const handleErrorCreateProduct = (form, event) => {
            const title = form['title'];
            const shortDesc = form['short_description'];
            const post_cate = form['post_category'];
            const thumbnail = form['thumbnail'];
            const body = form['body'];
            if (areRequired(title, shortDesc, post_cate, thumbnail, body) == false)
                event.preventDefault();
            if (checkLength(body, 100) == false)
                event.preventDefault();
            if (checkLength(title, 10) == false)
                event.preventDefault();
            if (isImage(thumbnail) == false)
                event.preventDefault();
        }
    </script>

</body>

</html>
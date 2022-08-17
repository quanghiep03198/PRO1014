<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/styles/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="/path/or/uri/to/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>
    <div class="flex items-stretch">
        <!-- import sidebar from component  -->
        <?php include_once "./admin/components/sidebar.php" ?>
        <!-- sidebar  end -->
        <section class="w-full">
            <!-- top -->
            <div class="bg-primary px-[50px] py-[30px] flex justify-between items-center">
                <h3 class="text-3xl text-white">Cài đặt website</h3>
            </div>
            <!-- main -->
            <div class="container mx-auto my-10">
                <form action="./admin/controllers/site_setting.php" method="POST" enctype="multipart/form-data" onsubmit="handleUpdateSite(this,event)">
                    <div class="grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-5">
                        <!-- Logo 1 -->
                        <div class="form-control">
                            <label for="">Logo Header</label>
                            <input type="file" data-name="logo header" class=" input input-bordered file:hover:btn-primary file:btn px-0" name="logo_header">
                            <small class="text-error error-message font-semibold"></small>
                        </div>
                        <!-- Logo 2 -->
                        <div class="form-control">
                            <label for="">Logo Footer</label>
                            <input type="file" data-name="logo footer" class=" input input-bordered file:hover:btn-primary file:btn px-0" name="logo_footer">
                            <small class="text-error error-message font-semibold"></small>
                        </div>
                        <!-- Email -->
                        <div class="form-control">
                            <label for="">Email</label>
                            <input class="input input-bordered" type="email" data-name="email" name="email">
                            <small class="text-error error-message font-semibold"></small>
                        </div>
                        <!-- facebook -->
                        <div class="form-control">
                            <label for="">Facebook</label>
                            <input class="input input-bordered" type="text" name="facebook" data-name="facebook">
                            <small class="text-error error-message font-semibold"></small>
                        </div>
                        <!-- hotline -->
                        <div class="form-control">
                            <label for="">Hotline</label>
                            <input class="input input-bordered" type="text" data-name="số điện thoại" name="phone">
                            <small class="text-error error-message font-semibold"></small>
                        </div>
                        <!-- địa chỉ -->
                        <div class="form-control">
                            <label for="">Địa chỉ</label>
                            <input class="input input-bordered" data-name="địa chỉ" name="address" type="text">
                            <small class="text-error error-message font-semibold"></small>
                        </div>
                        <div class="form-control">
                            <button type="submit" name="update_site" class="btn hover:btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <script src="js/common.js"></script>
        <script src="js/validate.js"></script>
        <script>
            const handleUpdateSite = (form, event) => {
                // event.preventDefault();
                const logoHeader = form['logo_header'];
                const logoFooter = form['logo_footer'];
                const email = form['email'];
                const facebook = form['facebook'];
                const hotline = form['phone'];
                const address = form['address'];
                if (areRequired(logoHeader, logoFooter, email, facebook, hotline, address) == false)
                    event.preventDefault()
                if (isImage(logoHeader) == false && isImage(logoFooter) == false)
                    event.preventDefault()
            }
        </script>
</body>

</html>
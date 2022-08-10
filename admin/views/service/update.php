<?php
if (isset($_GET['id']))
    $service = get_one_service($_GET['id']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới sản phẩm</title>
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
                <h1 class="text-white text-3xl">Update dịch vụ</h1>

            </div>
            <form action="" method="post" enctype="multipart/form-data" class="w-full sm:p-5 md:p-10 lg:p-10 mx-auto" onsubmit="handleErrorUpdateService(this,event)">
                <div class="max-w-3xl mx-auto">
                    <div class="flex flex-col gap-5">
                        <div class="form-control">
                            <label class="text-xl">Dịch vụ</label>
                            <input type="text" data-name="dịch vụ" class="input input-bordered" name="service_name" value="<?php echo $service['name'] ?>">
                            <small class="text-base text-error error-message font-semibold"></small>
                        </div>
                        <div class="form-control">
                            <label class="text-xl">Giá</label>
                            <input type="text" data-name="giá dịch vụ" class="input input-bordered" name="cost" value="<?php echo $service['cost'] ?>">
                            <small class="text-base text-error error-message font-semibold"></small>
                        </div>
                        <div class="">
                            <button type="submit" name="create_service" class="btn hover:btn-primary">Thêm mới dịch vụ</button>
                        </div>
                    </div>
                </div>

    </div>s
    <!--  -->
    <div>
        <button type="submit" name="update_product" class="btn btn-lg hover:btn-primary w-auto">Thêm sản phẩm</button>
    </div>

    </form>
    <!-- code ở đây -->
    </section>
    </div>

    <script src="./js/common.js"></script>
    <script src="./js/validate.js"></script>
    <script>
        const handleErrorUpdateService = (form, event) => {
            const serviceName = form['service_name']
            const cost = form['cost']
            if (areRequired(serviceName, cost) == false)
                event.preventDefault();
        }
    </script>

</body>

</html>
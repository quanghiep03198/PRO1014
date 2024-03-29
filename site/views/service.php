<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dịch vụ sửa chữa</title>
    <link rel="icon" type="image/x-icon" href="/img/settings/logo-footer.ico">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>
    <!-- import header component -->
    <?php include_once "site/components/header.php" ?>

    <main>
        <div class="bg-[color:var(--primary-color)] text-white p-5">
            <h1 class="text-center sm:text-base md:text-xl lg:text-3xl">Bảng giá dịch vụ sửa chữa</h1>
        </div>
        <div class="container mx-auto !bg-white">
            <table class="table w-full !bg-white">
                <tr class="border-b">
                    <th class="py-5 text-left">Dịch vụ</th>
                    <th class="py-5 text-left">Chi phí sửa chữa</th>
                </tr>
                <tbody>
                    <?php foreach (get_all_services() as $service) : extract($service) ?>
                        <tr class="table-row bg-white">
                            <td><?= $name ?></td>
                            <td><?= $cost . "₫" ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div id="pagination" class=" btn-group center p-10"></div>
        </div>
    </main>
    <!-- import footer component -->
    <?php include_once "site/components/footer.php" ?>
    <script src="js/common.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/handle-userdata.js"></script>
    <script src="js/pagination.js"></script>
    <script>
        const tablePagination = new Pagination({
            selector: ".table-row",
            perPage: 5,
            style: "table"
        })
        const {
            showPage
        } = tablePagination
        showPage(1)
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dịch vụ sửa chữa</title>
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>
    <!-- import header component -->
    <?php include_once "site/components/header.php" ?>

    <main>
        <div class="bg-[color:var(--primary-color)] text-white p-5">
            <h1 class="text-center sm:text-base md:text-xl lg:text-3xl">Bảng giá dịch vụ sửa chữa</h1>
        </div>
        <div class="container mx-auto">
            <table class="table w-full">
                <thead>
                    <div class="grid">
                        <th class="py-5 text-left">Dịch vụ</th>
                        <th class="py-5 text-left">Chi phí sửa chữa</th>
                    </div>
                </thead>
                <?php foreach (get_all_services() as $service) : extract($service) ?>
                    <tr class="table-row">
                        <td><?= $name ?></td>
                        <td><?= $cost . "₫" ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <div id="pagination" class=" btn-group center p-10"></div>
        </div>
    </main>
    <!-- import footer component -->
    <?php include_once "site/components/footer.php" ?>
    <script src="/site/js/common.js"></script>
    <script src="/site/js/pagination.js"></script>
    <script>
        const tablePagination = new Pagination(".table-row", 5)
        const showPage = tablePagination.showPage.bind(this)
        showPage(1)
    </script>
</body>

</html>
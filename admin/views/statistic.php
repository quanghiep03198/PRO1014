<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/main.css">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <main>
        <div class="flex items-stretch">
            <!-- import sidebar from component -->
            <?php include_once "./admin/components/sidebar.php" ?>
            <div class="flex flex-col gap-10 w-full">
                <section class="container mx-auto p-10">
                    <canvas id="myChart" class="w-screen"></canvas>
                </section>

                <section class="container mx-auto p-10">
                    <div class="flex justify-between items-center mb-10">
                        <h1 class="sm:text-lg md:text-xl lg:text-2xl text-2xl font-semibold">Doanh số sản phẩm hàng tháng</h1>
                        <select name="" id="" class="select select-bordered" onchange="window.location = this.value">
                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                <option value=<?php echo "?page=statistic&month={$i}" ?> <?php
                                                                                            if (isset($_GET['month']) && $_GET['month'] == $i) echo "selected";
                                                                                            if (getdate()['mon'] == $i) echo "selected" ?>><?php echo "Tháng {$i}";
                                                                                                                                            ?>
                                </option>
                            <?php    } ?>
                        </select>
                    </div>
                    <table class="table w-full">
                        <thead>
                            <tr>
                                <th class="text-lg">Sản phẩm</th>
                                <th class="text-lg">Số lượng bán ra</th>
                                <th class="text-lg">Doanh số</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $month = isset($_GET['month']) ? $_GET['month'] : getdate()['mon'];
                            $turnover_stats =  get_turnover_groupby_product($month);
                            if (!empty($turnover_stats)) :
                                foreach ($turnover_stats as $product) : extract($product) ?>
                                    <tr>
                                        <td class="flex items-center gap-3">
                                            <img src=<?= ROOT_PRODUCT . $image ?> alt="" class="w-20 h-20 object-contain">
                                            <div class="flex flex-col gap-3">
                                                <span class="text-xl font-medium"><?= $prod_name ?></span>
                                                <span class="text-lg"><?= $unit_price . "₫" ?></span>
                                            </div>
                                        </td>

                                        <td class="text-lg"><?= $sold ?></td>
                                        <td class="text-lg"><?= $turnover . "₫" ?></td>
                                    </tr>
                            <?php
                                endforeach;
                            endif; ?>
                            <?php if (empty($turnover_stats)) ?>
                            <tr>
                                <td colspan="3" class="text-2xl text-center p-10 text-error">Chưa có dữ liệu doanh số nào !</td>
                            </tr>
                        </tbody>
                    </table>


                </section>
            </div>
        </div>

        <!--  -->
    </main>
    <?php
    $turn_over_stats = get_highest_turnover_groupby_month();

    ?>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    <?php
                    for ($i = 0; $i < count($turn_over_stats) - 1; $i++) {
                        extract($turn_over_stats[$i]);
                        echo  json_encode($month) . ",";
                    }
                    $last_index = array_key_last($turn_over_stats);
                    echo json_encode($turn_over_stats[$last_index]['month']);
                    ?>
                ],
                datasets: [{
                    label: '(₫) Triệu đồng',
                    data: [
                        <?php
                        for ($i = 0; $i < count($turn_over_stats) - 1; $i++) {
                            extract($turn_over_stats[$i]);
                            echo  $turn_over . ',';
                        }
                        $last_index = array_key_last($turn_over_stats);
                        echo $turn_over_stats[$last_index]['turn_over'];
                        ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>

</html>
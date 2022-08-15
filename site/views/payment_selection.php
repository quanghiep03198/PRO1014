<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>
    <?php include_once 'site/components/header.php';  ?>
    <main class="p-10">
        <h1 class="text-center text-3xl">Chọn hình thức thanh toán</h1>
        <div class="max-w-3xl mx-auto rounded-box shadow-lg p-10 flex justify-center items-center gap-10">

            <form action="vnpay_php/">
                <a href="?page=checkout" class="btn sm:btn-sm lg:btn-lg hover:btn-primary">Thanh toán khi nhận hàng</a>
                <button type="submit" class="btn sm:btn-sm lg:btn-lg hover:btn-primary" name="redirect" id="redirect">Thanh toán qua cổng VNPay</button>
            </form>
        </div>
    </main>
    <?php include_once 'site/components/footer.php'; ?>
    <script src="js/common.js"></script>
    <script src="js/handle-userdata.js"></script>
    <script>
        if (JSON.parse(localStorage.getItem("cart")).length == 0)
            window.location = "?page=product";
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
	<link rel="stylesheet" href="styles/main.css">
</head>

<body>
	<?php include_once 'site/components/header.php';  ?>
	<main>
		<div class="w-full bg-[#EDEDED] flex justify-center items-center sm:py-0 lg:py-[50px]">
			<div class="w-full flex justify-center items-stretch sm:flex-col md:flex-col lg:flex-row sm:border-t lg:border-none">
				<!-- cart items -->
				<div class="bg-white basis-4/6 flex flex-col justify-between p-4" style="height:inherit">
					<h1 class="text-2xl font-medium mb-5">Giỏ hàng của bạn</h1>
					<!-- cart items are rendered here -->
					<div class="overflow-y-auto w-full h-60" id="cart-container">
						<table class="table table-compact w-full rounded-none">
							<tbody id="cart-list">
							</tbody>
						</table>
					</div>
					<a href="?page=product" class="hover:underline"><i class="bi bi-arrow-left-short"></i>Tiếp tục mua hàng</a>
				</div>
				<!-- order summary  -->
				<div class="bg-gray-200 p-5 max-w-full flex flex-col gap-5">
					<div class="form-control w-full">
						<label class="text-[16px]  font-[600]">Voucher giảm giá</label>
						<div class="flex w-full items-stretch gap-2">
							<input type="text" placeholder="Gift code ..." class="input focus:outline-none input-bordered" id="gift-code" />
							<button type="button" class="btn btn-outline btn-md">Áp dụng</button>
						</div>
					</div>
					<div class="flex items-center justify-between">
						<p class="text-lg">Tạm tính</p>
						<p class="text-lg" id="temp-payment" data-cash=0></p>
					</div>
					<div class="flex items-center justify-between border-b-2">
						<p class="text-lg">Giảm giá</p>
						<p class="text-lg" id="discount" data-cash=0></p>
					</div>
					<!-- devider -->
					<div class="border-t border-gray-600 py-4">
						<div class=" flex items-center justify-between">
							<p class="font-semibold text-xl">Tổng tiền</p>
							<p class="font-semibold text-xl" id="total-amount" data-cash></p>
							<input id="order-total-amount" type="hidden">
						</div>
						<p class="text-[14px] bb-[30px] ">Số tiền này chưa bao gồm phí vận chuyển</p>
					</div>
					<form action="?page=payment_selection" method="POST" id="cart-form" onsubmit="return checkEmptyCart()">
						<button type="submit" name="check-out" id="check-out-submit" class="btn btn-block btn-lg hover:btn-active hover:btn-primary">Đặt hàng</button>
					</form>
				</div>
			</div>
		</div>
	</main>
	<?php include_once 'site/components/footer.php'; ?>
	<script src="js/common.js"></script>
	<script src="js/handle-cart.js"></script>
	<script>
		if (cartList) renderCart(JSON.parse(localStorage.getItem("cart")));
	</script>
</body>

</html>
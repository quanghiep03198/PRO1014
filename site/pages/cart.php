<!-- cart-container -->
<style>
	input[type='number']::-webkit-inner-spin-button,
	input[type='number']::-webkit-outer-spin-button {
		-webkit-appearance: none;
		margin: 0;
	}
</style>
<form action="?page=checkout" method="POST">
	<div class="w-full bg-[#EDEDED] flex justify-center items-center sm:py-0 lg:py-[50px]">
		<div class="w-full flex justify-center items-stretch sm:flex-col md:flex-col lg:flex-row sm:border-t lg:border-none">
			<!-- cart items -->
			<div class="bg-white basis-4/6 flex flex-col justify-between p-4" style="height:inherit">
				<h1 class="text-2xl font-medium mb-5">Giỏ hàng của bạn</h1>
				<div class="container h-60">
					<!-- cart items -->
					<div class="container flex justify-between items-stretch flex-grow gap-5 border-b py-2">
						<!-- product-infor -->
						<div class="basis-3/4 flex justify-start items-center gap-4">
							<img src=<?= $ROOT_PRODUCT . 'ps4-slim.webp' ?> alt="" class="sm:max-w-[80px] lg:max-w-[100px]">
							<div class="flex justify-between basis-2/3 sm:flex-col md:flex-row lg:flex-row">
								<div>
									<input type="hidden" name="product-id" value=<?php echo "1" ?>>
									<input type="hidden" name="unit-price" value=<?php echo "1" ?>>
									<span class="block font-medium sm:text-base md:text-xl lg:text-xl mb-2" style="word-break:no-break">Playstation 4</span>
									<span class=" block font-medium sm:text-sm md:text-base lg:text-lg text-blue-600">7000000đ</span>
								</div>
								<!-- quantity-counter -->
								<div class="custom-number-input h-full">
									<div class="flex items-center gap-0 w-full rounded-lg relative bg-transparent mt-1">
										<button type="button" data-action="decrement" class="btn btn-ghost btn-square btn-md text-2xl align-middle cursor-pointer">-</button>
										<input type="number" min=1 value=1 class="quantity outline-none focus:outline-none text-center w-10 h-10 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700" name="custom-input-number"></input>
										<button type="button" data-action="increment" class="btn btn-ghost btn-square btn-md text-2xl align-middle cursor-pointer">+</button>
									</div>
								</div>
							</div>
						</div>
						<!--  -->
						<div class="flex flex-col justify-around items-start">
							<span class="block total-price sm:text-base md:text-xl lg:text-lg font-medium">7000000đ</span>
							<button class="btn btn-ghost text-2xl text-gray-500 hover:text-gray-800"><i class="bi bi-trash"></i></button>
						</div>
					</div>

				</div>
				<a href="" class="hover:underline"><i class="bi bi-arrow-left-short"></i> Continue Shopping</a>
			</div>
			<!-- order summary  -->
			<div class="bg-gray-200 p-5 max-w-full flex flex-col gap-5">
				<div class="form-control w-full">
					<label class="text-[16px] text-[#4A4A4A] font-[600]">Voucher giảm giá</label>
					<div class="flex w-full items-stretch gap-2">
						<input type="text" placeholder="Gift code ..." class="input focus:outline-none input-bordered" />
						<button class="btn btn-active btn-md">Áp dụng</button>
					</div>
				</div>
				<div class="flex items-center justify-between">
					<p class="text-[16px] text-[#4A4A4A] font-[600]">Tạm tính</p>
					<p class="font-[600] text-[#4A4A4A]">3300000đ</p>
				</div>
				<div class="flex items-center justify-between border-b-2">
					<p class="text-[16px] text-[#4A4A4A] font-[600]">Giảm giá</p>
					<p class="font-[600] text-[#4A4A4A]">-100000đ</p>
				</div>
				<!-- devider -->
				<div class="border-t border-gray-600 py-4">
					<div class=" flex items-center justify-between">
						<p class="font-medium text-2xl text-[#4A4A4A]">Tổng tiền</p>
						<p class="font-medium text-2xl text-[#4A4A4A]">3.200.000đ</p>
						<input id="total-amount" type="hidden">
					</div>
					<p class="text-[14px] bb-[30px] text-[#4A4A4A]">Số tiền này chưa bao gồm phí vận chuyển</p>
				</div>
				<button type="submit" class="mt-12 h-12 w-full bg-[#4A4A4A] py-[10px] rounded focus:outline-none text-[20px] hover:opacity-80 text-[#fff] font-[500] uppercase">Đặt hàng</button>
			</div>
		</div>
	</div>
</form>
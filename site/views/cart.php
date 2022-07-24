<?php


if (isset($_POST['check-out'])) {
	echo $_POST['cart-item'];
}
?>
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
				<a href="" class="hover:underline"><i class="bi bi-arrow-left-short"></i> Continue Shopping</a>
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
					<p class="text-lg" id="temp-payment" data-cash></p>
				</div>
				<div class="flex items-center justify-between border-b-2">
					<p class="text-lg">Giảm giá</p>
					<p class="text-lg" id="discount" data-cash=0></p>
				</div>
				<!-- devider -->
				<div class="border-t border-gray-600 py-4">
					<div class=" flex items-center justify-between">
						<p class="font-medium text-2xl">Tổng tiền</p>
						<p class="font-medium text-2xl" id="total-amount" data-cash></p>
						<input id="total-amount" type="hidden">
					</div>
					<p class="text-[14px] bb-[30px] ">Số tiền này chưa bao gồm phí vận chuyển</p>
				</div>
				<form action="" method="POST">
					<input type="hidden" name="cart-item" value=<?php echo "<script>localStorage.getItem(</script>" ?>>
					<button type="submit" name="check-out" class="btn btn-block btn-lg">Đặt hàng</button>
				</form>
			</div>
		</div>
	</div>
</main>
<script type="text/javascript">
	$(document).ready(function() {
		// localStorage.clear();
		$("form").on("submit", function() {
			if (window.localStorage !== undefined) {
				var fields = $(this).serialize();
				// localStorage.setItem("eloqua-fields", JSON.stringify(fields));
				alert("Stored Succesfully");
				$(this).find("input").val(""); //this ONLY clears input fields, you also need to reset other fields like select boxes,...
				alert("Now Passing stored data to Server through AJAX jQuery");
				$.ajax({
					type: "POST",
					url: "?page=checkout",
					data: {
						data: fields
					},
					success: function(data) {
						$('#output').html(data);
					}
				});
			} else {
				alert("Storage Failed. Try refreshing");
			}
		});
	});
</script>
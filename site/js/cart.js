const cartList = $("#cart-list");
const showEmptyCart = () => {
	const cartItems = JSON.parse(localStorage.getItem("cart"));
	if (cartItems.length == 0) cartList.innerHTML = /*html */ `<tr><td colspan='5'>Bạn chưa có sản phẩm nào trong giỏ hàng</td></tr>`;
};
/**
 * Tính tiền
 */
const getTotalAmount = (data) => {
	const tempPayment = $("#temp-payment");
	const discount = $("#discount");
	const totalAmount = $("#total-amount");
	const giftcode = $("#gift-code");
	// giftcode.oninput = () => {};
	tempPayment.dataset.cash = data?.reduce((previousValue, currentValue) => {
		return previousValue + currentValue.total;
	}, 0);
	discount.innerText = `${discount.dataset.cash}₫`;
	// tổng tiền tạm tính
	tempPayment.innerText = `${tempPayment.dataset.cash}₫`;
	// tổng tiền thanh toán chưa bao gồm phí ship
	totalAmount.dataset.cash = +tempPayment.dataset.cash + +discount.dataset.cash;
	totalAmount.innerText = `${totalAmount.dataset.cash}₫`;
};

/**
 * render cart items
 */
const renderCart = (data) => {
	const output = data
		?.map(
			(item) => /*html */ `<tr>
									<th>
										<button type="button" class="btn btn-ghost text-2xl text-gray-500 hover:text-gray-800" onclick="removeItem(${item.id})"><i class="bi bi-trash"></i></button>
									</th>
									<td>
										<div class="flex items-center space-x-3">
												<picture class="mask mask-squircle w-12 h-12">
													<img src="img/products/${item.img}" alt="">
												</picture>
											<div>
												<div class="font-bold">
													<span class="block font-medium truncate">${item.name}</span>
												</div>
												<div class="text-sm opacity-50">
													<span class="block font-medium ">${item.manu}</span>
												</div>
											</div>
										</div>
									</td>
									<td>
										<span class=" block font-medium text-blue-600">${item.price}₫</span>
									</td>
									<td>
										<div class="col-span-1 flex justify-start items-center gap-0 w-full rounded-lg relative bg-transparent mt-1">
											<input type="hidden" name="id" value=${item.id}>
											<input type="hidden" name="unit-price" value=${item.price}>
											<input type="hidden" name="qty" value=${item.qty}>
											<input type="hidden" name="qty" value=${item.total}>
											<button type="button" onclick="changeQty(this,-1)" class="btn btn-ghost btn-square btn-sm text-base align-middle cursor-pointer">-</button>
											<input type="number" min=1 value=${item.qty} class="quantity outline-none focus:outline-none text-center w-10 h-10 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700" name="custom-input-number">
											<button type="button" onclick="changeQty(this,1)" class="btn btn-ghost btn-square btn-sm text-base align-middle cursor-pointer">+</button>
										</div>
									</td>
									<th>
										<span class="block total-price font-medium">${item.total}₫</span>
									</th>
								</tr>`,
		)
		.join("");
	countItems();
	cartList.innerHTML = output;
	getTotalAmount(JSON.parse(localStorage.getItem("cart")));
	showEmptyCart();
};
renderCart(JSON.parse(localStorage.getItem("cart")));

/**
 * update cart item
 */
const updateCartItem = (id, qty) => {
	const cartItems = JSON.parse(localStorage.getItem("cart"));
	const item = cartItems.find((item) => item.id == id);
	// update qty & total của sản phẩm trong giỏ hàng
	if (item) {
		item.qty = qty;
		item.total = item.price * item.qty;
		cartItems[cartItems.indexOf(item)] = item;
		// update lại toàn bộ giỏ hàng
		localStorage.setItem("cart", JSON.stringify(cartItems));
		renderCart(JSON.parse(localStorage.getItem("cart"))); // render ra ngoài
	}
	console.log(cartItems);
};
/**
 * delete cart item
 */
const removeItem = (id) => {
	console.log(id);
	const cartItems = JSON.parse(localStorage.getItem("cart"));
	localStorage.setItem("cart", JSON.stringify(cartItems.filter((item) => item.id != id)));
	renderCart(JSON.parse(localStorage.getItem("cart")));
};

/**
 * change item quantity
 */

const changeQty = (btn, unitVal) => {
	const id = btn.parentElement.querySelector(`input[name="id"]`).value;
	const target = btn.parentElement.querySelector(".quantity");
	let value = +target.value; // ảo ma canada
	value += +unitVal;
	if (value < 1) value = 1;
	target.value = value;
	updateCartItem(id, target.value);
};

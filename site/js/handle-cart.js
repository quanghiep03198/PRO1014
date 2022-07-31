/**
 * Thêm sản phẩm vào giỏ hàng
 */
const addCart = (button) => {
	const cartItems = JSON.parse(localStorage.getItem("cart"));
	const product = {
		id: button.parentElement.querySelector(`input[name = "product_id"]`).value,
		name: button.parentElement.querySelector(`input[name = "product_name"]`).value,
		manu: button.parentElement.querySelector(`input[name = "manu"]`).value,
		img: button.parentElement.querySelector(`input[name = "product_img"]`).value,
		price: +button.parentElement.querySelector(`input[name = "price"]`).value,
		qty: +button.parentElement.querySelector(`input[name = "qty"]`).value,
		warranty: +button.parentElement.querySelector(`input[name = "warranty"]`).value,
	};
	product.total = product.price * product.qty;
	// kiểm tra sản phẩm đã có trong giỏ hàng chưa? nếu đã tồn tại => update lại số lượng, thành tiền
	const duplicatedItem = cartItems?.find((item) => item.id == product.id);
	if (duplicatedItem) {
		duplicatedItem.qty += product.qty;
		duplicatedItem.total = duplicatedItem.price * duplicatedItem.qty;
		cartItems[cartItems.indexOf(duplicatedItem)] = duplicatedItem;
		localStorage.setItem("cart", JSON.stringify(cartItems));
	}
	// nếu sản phẩm ko tồn tại trong giỏ hàng thì thêm mới
	else {
		cartItems.push(product);
		localStorage.setItem("cart", JSON.stringify(cartItems));
	}
	countItems();
	showMessage(alert.success.style, alert.success.icon, "Thêm vào giỏ hàng thành công!");
};

const showEmptyCart = () => {
	const cartList = $("#cart-list");
	cartList.innerHTML = /*html */ `
	<tr><td colspan='5' class="text-xl">Bạn chưa có sản phẩm nào trong giỏ hàng!</td></tr>
	`;
};
/**
 * Tính tiền
 */

const getTotalAmount = (data) => {
	const tempPayment = $("#temp-payment");
	const discount = $("#discount");
	const totalAmount = $("#total-amount");
	const giftcode = $("#gift-code");
	if (tempPayment && discount && totalAmount && giftcode) {
		tempPayment.dataset.cash = data.reduce((previousValue, currentValue) => {
			return previousValue + currentValue.total;
		}, 0);
		discount.innerText = `${discount.dataset.cash}₫`;
		// tổng tiền tạm tính
		tempPayment.innerText = `${tempPayment.dataset.cash}₫`;
		// tổng tiền thanh toán chưa bao gồm phí ship
		totalAmount.dataset.cash = +tempPayment.dataset.cash + +discount.dataset.cash;
		totalAmount.innerText = `${totalAmount.dataset.cash}₫`;
	}
};

/**
 * render cart items
 */
const cartList = $("#cart-list");
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
										<input type="hidden" name="total" value=${item.total}>
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
	cartList.innerHTML = output; // render sản phẩm trong giỏ hàng
	getTotalAmount(JSON.parse(localStorage.getItem("cart"))); // tính tổng tiền sản phẩm trong giỏ hàng
	countItems(); // tính tổng số sản phẩm trong giỏ hàng
	const cartItems = JSON.parse(localStorage.getItem("cart"));
	if (cartItems.length == 0) showEmptyCart(); // nếu ko còn sản phẩm nào trong giỏ hàng -> show message
};

/**
 * update cart item
 */
const updateCartItem = (id, qty) => {
	const cartItems = JSON.parse(localStorage.getItem("cart"));
	const item = cartItems.find((item) => item.id == id);
	// update qty & total của sản phẩm trong giỏ hàng
	if (item) {
		item.qty = +qty;
		item.total = +(item.price * item.qty);
		cartItems[cartItems.indexOf(item)] = item;
		// update lại toàn bộ giỏ hàng
		localStorage.setItem("cart", JSON.stringify(cartItems));
		renderCart(JSON.parse(localStorage.getItem("cart"))); // update xong -> rerender ra ngoài
	}
	console.log(cartItems);
};
/**
 * delete cart item
 */
const removeItem = (id) => {
	// console.log(id);
	const cartItems = JSON.parse(localStorage.getItem("cart"));
	localStorage.setItem("cart", JSON.stringify(cartItems.filter((item) => item.id != id)));
	renderCart(JSON.parse(localStorage.getItem("cart"))); // delete xong -> rerender ra ngoài
};

/**
 * change item quantity
 */

const changeQty = (btn, unitVal) => {
	const id = btn.parentElement.querySelector(`input[name="id"]`).value;
	console.log(id);
	const target = btn.parentElement.querySelector(".quantity");
	let value = +target.value;
	value += +unitVal;
	if (value < 1) value = 1;
	target.value = value;
	updateCartItem(id, target.value);
};
/**
 * check
 */
const checkEmptyCart = () => {
	const cartItems = JSON.parse(localStorage.getItem("cart"));
	if (cartItems.length == 0) {
		showMessage(alert.error.style, alert.error.icon, "Bạn chưa có sản phẩm nào trong giở hàng");
		return false;
	}
	document.cookie = `cart=${localStorage.getItem("cart")}`;
};

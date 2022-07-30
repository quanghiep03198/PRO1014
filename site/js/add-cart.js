const alert = {
	success: {
		style: "alert-success",
		icon: "bi bi-check2-circle",
	},

	infor: {
		style: "alert-infor",
		icon: "bi bi-info-circle",
	},

	warning: {
		style: "alert-warning",
		icon: "bi bi-exclamation-triangle",
	},

	error: {
		style: "alert-error",
		icon: "bi bi-x-circle",
	},
};
const showMessage = (style, icon, message) => {
	const toast = document.createElement("div");
	toast.classList.add("animate-[slip_500ms_ease-in-out]", "toast", "toast-bottom", "toast-end", "w-[300px]", "z-50");
	toast.innerHTML = /*html */ ` <div class="alert ${style} text-gray-800 text-xl">
									<div>
										<i class="${icon}"></i>
										<span>${message}</span>
									</div>
								</div>`;
	const main = $("main");
	main.appendChild(toast);
	setTimeout(() => {
		main.removeChild(toast);
	}, 3000);
};
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

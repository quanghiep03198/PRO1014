const $ = (selector) => {
	const elements = document.querySelectorAll(selector);
	return elements.length == 1 ? elements[0] : elements;
};
/**
 * Thêm sản phẩm vào giỏ hàng
 */
const addCart = (button) => {
	const product = {
		id: button.parentElement.querySelector(`input[name = "id"]`).value,
		name: button.parentElement.querySelector(`input[name = "name"]`).value,
		manu: button.parentElement.querySelector(`input[name = "manu"]`).value,
		img: button.parentElement.querySelector(`input[name = "img"]`).value,
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
		cartCounter.innerText = cartItems.length;
	}
};
/**
 *
 */

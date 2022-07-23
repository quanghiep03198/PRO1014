const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
localStorage.setItem("cart", JSON.stringify([]));
// counter button
const decrementButtons = $$(`button[data-action="decrement"]`);
const incrementButtons = $$(`button[data-action="increment"]`);
decrementButtons.forEach((btn) => {
	btn.addEventListener("click", (e) => {
		const btn = e.target.parentElement.querySelector('button[data-action="decrement"]');
		const target = btn.nextElementSibling;
		let value = Number(target.value);
		value--;
		if (value < 1) value = 1;
		target.value = value;
	});
});
incrementButtons.forEach((btn) => {
	btn.addEventListener("click", (e) => {
		const btn = e.target.parentElement.querySelector('button[data-action="decrement"]');
		const target = btn.nextElementSibling;
		let value = Number(target.value);
		value++;
		target.value = value;
	});
});
/**
 * Thêm sản phẩm vào giỏ hàng
 */
let cartItems = JSON.parse(localStorage.getItem("cart"));
console.log(cartItems);
function addCart(button) {
	const product = {
		id: button.parentElement.querySelector(`input[name = "id"]`).value,
		name: button.parentElement.querySelector(`input[name = "name"]`).value,
		img: button.parentElement.querySelector(`input[name = "img"]`).value,
		price: +button.parentElement.querySelector(`input[name = "price"]`).value,
		qty: +button.parentElement.querySelector(`input[name = "qty"]`).value,
	};
	// kiểm tra sản phẩm đã có trong giỏ hàng chưa? nếu đã tồn tại => update lại số lượng
	const duplicatedItem = cartItems.find((item) => item.id == product.id);
	if (duplicatedItem) {
		duplicatedItem["qty"] += product.qty;
		// alert(`Sản phẩm đã tồn tại trong giỏ hàng!`);
	} else cartItems.push(product);
	localStorage.setItem("cart", JSON.stringify(cartItems));
	console.log(JSON.parse(localStorage.getItem("cart")));
}
// render cart item
const renderCart = (data) => {
	return data
		.map(
			(item) => /*html */ `
	`,
		)
		.join("");
};
// update cart item
const name = (params) => {};
// delete cart item

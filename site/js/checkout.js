import $ from "./site/js/common.js";
const form = $("#check-out__form");
console.log(form);
if (form) {
	form.onsubmit = (event) => {
		const customerName = form.querySelector(`input[name="customer_name"]`);
		const phone = form.querySelector(`input[name="phone"]`);
		const email = form.querySelector(`input[name="email"]`);
		const address = form.querySelector(`input[name="address"]`);
		const shipping = form.querySelector(`select[name="shipping_method"]`);
		const payment = form.querySelector(`select[name="payment_method"]`);
		const totalAmount = form.querySelector(`input[name="total_amount"]`);
		// validate thông tin người dùng
		const isNotEmpty = isRequired(customerName, phone, email, address, shipping, payment);
		if (!isNotEmpty) event.preventDefault();
		if (!isEmail(email)) event.preventDefault();
		if (!isPhoneNumber(phone)) event.preventDefault();
		if (isNotEmpty && isEmail(email) && isPhoneNumber(phone)) {
			document.cookie = `cart=${localStorage.getItem("cart")}`;
			const cartItems = JSON.parse(localStorage.getItem("cart"));
			totalAmount.value =
				+cartItems.reduce((previousValue, currentValue) => {
					return previousValue + currentValue.total;
				}, 0) + +shipping.value;
			console.log(totalAmount.value);
			localStorage.setItem("cart", JSON.stringify([]));
		}
	};
}

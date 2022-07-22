import { $, $$ } from "./config.js";

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

// render cart item
const renderCart = (cartItems) => {};
// update cart item
const name = (params) => {};
// delete cart item

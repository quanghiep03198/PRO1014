const $ = (selector) => {
	const elements = document.querySelectorAll(selector);
	return elements.length == 1 ? elements[0] : elements;
};

if (!localStorage.getItem("cart")) localStorage.setItem("cart", JSON.stringify([]));
const countItems = () => {
	const cartCounter = $("#cart-counter");
	cartCounter.innerText = JSON.parse(localStorage.getItem("cart")).length;
};
countItems();

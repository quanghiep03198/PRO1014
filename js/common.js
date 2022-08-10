const $ = (selector) => {
	const elements = document.querySelectorAll(selector);
	return elements.length == 1 ? elements[0] : elements;
};
// nếu trình duyệt để chế độ
const body = $("body");
if (body) {
	body.classList.add("bg-white", "text-gray-800");
}
//#region show số lượng sản phẩm trong giỏ hàng
const cartCounter = $("#cart-counter");
const countItems = () => {
	if (!localStorage.getItem("cart")) localStorage.setItem("cart", JSON.stringify([]));
	cartCounter.innerText = JSON.parse(localStorage.getItem("cart")).length;
};
if (cartCounter) countItems();
//#endregion

// lấy cookie
const getAllCookieObjs = () => {
	const allCookies = document.cookie.split(";");
	const result = [];
	if (allCookies) {
		allCookies.forEach((ck) => {
			const cookieElem = ck.split("=");
			result.push({
				key: cookieElem[0].trim(),
				value: cookieElem[1].trim(),
			});
		});
		return result;
	}
};
// send request
const sendRequest = async (url, data) => {
	const response = await (
		await fetch(url, {
			method: "POST",
			mode: "cors",
			headers: {
				"Content-Type": "application/json",
			},
			body: JSON.stringify(data),
		})
	).text();
	return response;
};

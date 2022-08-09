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

//#region show message
// show message
const alert = {
	style: {
		success: "alert-success",
		infor: "alert-info",
		warning: "alert-warning",
		error: "alert-error",
	},
	icon: {
		success: "bi bi-check2-circle",
		infor: "bi bi-info-circle",
		warning: "bi bi-exclamation-triangle",
		error: "bi bi-x-circle",
	},
};

const showMessage = async (style, icon, message) => {
	const toast = await document.createElement("div");
	await toast.classList.add("toast", "toast-bottom", "toast-end", "animate-[slip_500ms_ease-in-out]", "w-[300px]", "z-50");
	toast.innerHTML = /*html */ ` <div class="alert ${style} text-gray-800 !text-xl ">
										<i class="${icon}"></i>
										<span>${message}</span>
								</div>`;
	const main = $("main");
	await main.appendChild(toast);
	(() => {
		setTimeout(() => {
			main.removeChild(toast);
		}, 2000);
	})();
};
//#endregion

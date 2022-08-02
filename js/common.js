const $ = (selector) => {
	const elements = document.querySelectorAll(selector);
	return elements.length == 1 ? elements[0] : elements;
};

const cartCounter = $("#cart-counter");
const countItems = () => {
	if (!localStorage.getItem("cart")) localStorage.setItem("cart", JSON.stringify([]));
	cartCounter.innerText = JSON.parse(localStorage.getItem("cart")).length;
};
if (cartCounter) countItems();

// show message
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
	toast.classList.add("toast", "toast-bottom", "toast-end", "animate-[slip_500ms_ease-in-out]", "w-[300px]", "z-50");
	toast.innerHTML = /*html */ ` <div class="alert ${style} text-gray-800 text-xl">
										<i class="${icon}"></i>
										<span>${message}</span>
								</div>`;
	const main = $("main");
	main.appendChild(toast);
	setTimeout(() => {
		main.removeChild(toast);
	}, 3000);
};

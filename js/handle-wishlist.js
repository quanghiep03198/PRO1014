// thêm sản phẩm vào wishlist wishlist
const addWishlist = async (button, event) => {
	event.preventDefault();
	const form = button.parentElement.parentElement;
	// lấy các trường dữ liệu sản phẩm
	const product_id = form["product_id"].value;
	const request = form["REQUEST"].value;

	const authCookie = getAllCookieObjs().find((obj) => obj.key == "auth");
	// validate dữ liệu trước khi post request
	if (!authCookie)
		swal({
			title: "Đăng nhập để sử dụng tính năng này!",
			icon: "error",
			timer: 2000,
			button: false,
		});
	else {
		const response = await (
			await fetch("/site/controllers/handle_wishlist.php", {
				method: "POST",
				headers: {
					"Content-Type": "application/json",
				},
				body: JSON.stringify({
					product_id: product_id,
					request: request,
				}),
			})
		).text();
		swal({
			title: "Đã thêm vào danh sách yêu thích!",
			icon: "success",
			timer: 2000,
			button: false,
		});
		console.log(response);
	}
};
// xóa sản phẩm khỏi wishlist
const delWishlistItem = async (form, event) => {
	event.preventDefault();
	const product_id = form["product_id"].value;
	const request = form["REQUEST"].value;
	const response = await sendRequest("/site/controllers/handle_wishlist.php", {
		product_id: product_id,
		request: request,
	});
	await showMessage(alert.success.style, alert.success.icon, "Đã xóa 1 sản phẩm khỏi danh sách!");
	console.log(response);
};

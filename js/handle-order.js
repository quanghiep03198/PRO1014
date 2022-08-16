// gửi thông tin đặt hàng
const place_order = async (form, event) => {
	event.preventDefault();
	const customerName = form["customer_name"];
	const phone = form["phone"];
	const email = form["email"];
	const address = form["address"];
	const shipping = form["shipping_method"];
	const orderNotice = form["order_notice"];
	const cartItems = localStorage.getItem("cart");

	// validate
	if (areRequired(customerName, phone, email, address, shipping) == false) return;
	if (isEmail(email) == false) return;
	if (isPhoneNumber(phone) == false) return;

	// validata -> ok
	// loading present

	Swal.fire({
		title: "Đang xử lý đơn hàng!",
		html: "Vui lòng chờ trong giây lát ...",
		allowEscapeKey: false,
		showConfirmButton: false,
		showLoaderOnConfirm: true,
		willOpen: () => {
			Swal.showLoading();
		},
	});
	await sendRequest("/site/controllers/place_order.php", {
		customer_name: customerName.value,
		phone: phone.value,
		email: email.value,
		address: address.value,
		shipping_method: shipping.value,
		order_notice: orderNotice.value,
		payment: 1,
		order_stt: 1,
		cart_items: cartItems,
	});
	await Swal.fire({
		title: "Đặt hàng thành công!",
		icon: "success",
		button: true,
	}).then(() => {
		location.reload();
	});

	// reset số lượng sản phẩm trong giỏ hàng
	await localStorage.setItem("cart", JSON.stringify([]));
	await countItems();

	// nếu có response trả về (dữ liệu được gửi đi thành công)
};

// send feedback về sản phẩm
const sendFeedback = async (form, event) => {
	event.preventDefault();
	const feedbackLabels = form["feedback"];
	const userId = form["user_id"].value;
	const orderItemId = form["order_item_id"].value;
	let reviewId;
	feedbackLabels.forEach((input) => {
		if (input.checked == true) reviewId = input.value;
	});
	const feedback = {
		pr_review_id: reviewId,
		user_id: userId,
		order_item_id: orderItemId,
	};
	const response = await sendRequest("/site/controllers/handle_feedback.php", feedback);
	console.log(response);
	swal({
		icon: "success",
		title: "Cảm ơn bạn đã gửi feedback về sản phẩm!",
		button: false,
		timer: 2000,
	}).then(() => {
		location.reload();
	});
};

// hủy đơn hàng
const confirmCancelOrder = async (event) => {
	event.preventDefault();
	const form = event.target;
	const order_id = form["order_id"];

	Swal.fire({
		text: "Bạn muốn chắc chắn muốn hủy đơn hàng này?",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Tôi đồng ý!",
		cancelButtonText: "Bỏ",
	})
		.then((result) => {
			if (result.isConfirmed)
				return sendRequest("/site/controllers/cancel_order.php", {
					order_id: order_id.value,
				});
		})
		.then((res) => {
			console.log(res);
		})
		.then(() => {
			Swal.fire({
				title: "Đơn hàng đã được hủy!",
				icon: "success",
				timer: 2000,
			});
		})
		.then(() => {
			location.reload();
		});
};

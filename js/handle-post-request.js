// render comment

const renderComment = (responseData) => {
	const commentBox = $("#comment-box");
	if (commentBox) {
		commentBox.innerHTML += /*html */ `
			<div class="card card-side bg-zinc-100 items-start">
				<figure class="flex items-center gap-3 p-2">
					<img src="${responseData.avatar}" class="w-[3rem] h-[3rem] rounded-full object-contain center" />
				</figure>
				<div class="card-body justify-start py-2">
					<h2 class="card-title">${responseData.username}</h2>
					<small>${responseData.posted_date}</small>
					<p>${responseData.content}</p>
					<div class="card-actions justify-end">
						<input type="hidden" value=${responseData.commentId}>
						<button onclick="reply(${responseData.username},${responseData.commentId})" class="btn btn-sm btn-ghost normal-case">Phản hồi <i class="bi bi-reply px-1"></i></button>
					</div>
				</div>
			</div>`;
	}
};
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
// bình luận bài viết
const postCommentOnPost = async (form, event) => {
	event.preventDefault();
	// lấy các trường dữ liệu muốn gửi đi
	const userid = form["user"].value;
	const username = form["username"].value;
	const postId = form["post_id"].value;
	const content = form["content"];
	const avatar = form["avatar"].value;
	const data = {
		user: userid,
		username: username,
		post: postId,
		content: content.value,
		avatar: avatar,
	};

	// kiểm tra xem có cookie của người dùng đã đăng nhập ko ?
	const authCookie = getAllCookieObjs().find((obj) => obj.key == "auth");
	if (!authCookie)
		await swal({
			title: "Đăng nhập để sử dụng tính năng này!",
			icon: "error",
			timer: 2000,
			button: false,
		});
	if (content.value != "" && authCookie) {
		const response = await sendRequest("/site/controllers/handle_comment.php", data);
		await renderComment(JSON.parse(response));
		console.log(response);
		content.value = "";
	}
};
// bình luận sản phẩm
const postCommentOnProduct = async (form, event) => {
	event.preventDefault();
	// lấy các trường dữ liệu muốn gửi đi
	const userid = form["user"].value;
	const username = form["username"].value;
	const productId = form["product_id"].value;
	const content = form["content"];
	const avatar = form["avatar"].value;
	const commentId = form["comment_id"];
	const req = form["REQUEST"];
	const data = {
		user: userid,
		username: username,
		product: productId,
		content: content.value,
		avatar: avatar,
	};
	if (commentId.value != "" && req.value != "") {
		data.commentId = commentId.value;
		data.req = req.value;
	}
	console.log(data);
	// kiểm tra xem có cookie của người dùng đã đăng nhập ko ?
	const authCookie = getAllCookieObjs().find((obj) => obj.key == "auth");
	if (!authCookie)
		await swal({
			title: "Đăng nhập để sử dụng tính năng này!",
			icon: "error",
			timer: 2000,
			button: false,
		});
	if (content.value != "" && authCookie) {
		const response = await sendRequest("/site/controllers/handle_comment.php", data);
		try {
			await renderComment(JSON.parse(response));
		} catch (error) {
			console.log(error);
		}

		console.log(response);
		content.value = "";
	}
};
// phản hồi bình luận sản phẩm
const reply = (username, commentId) => {
	console.log(username);
	const commentInput = $("#comment-input");
	const _commentId = $("#comment-id");
	const request = $("#req");
	request.value = "reply";
	commentInput.placeholder = `Bạn đang trả lời ${username}`;
	_commentId.value = commentId;
	console.log(_commentId.value);
};
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
		await swal({
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
		await swal({
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
	// event.preventDefault();
	const product_id = form["product_id"].value;
	const request = form["REQUEST"].value;
	const response = await sendRequest("/site/controllers/handle_wishlist.php", {
		product_id: product_id,
		request: request,
	});
	await showMessage(alert.success.style, alert.success.icon, "Đã xóa 1 sản phẩm khỏi danh sách!");
	console.log(response);
};

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
	if (isRequired(customerName, phone, email, address, shipping) == false) return;
	if (isEmail(email) == false) return;
	if (isPhoneNumber(phone) == false) return;

	// validata -> ok
	const response = await sendRequest("/site/controllers/place_order.php", {
		customer_name: customerName.value,
		phone: phone.value,
		email: email.value,
		address: address.value,
		shipping_method: shipping.value,
		order_notice: orderNotice.value,
		cart_items: cartItems,
	});
	console.log(response);
	/**
	 * ! không thể sử dụng alert đoạn này
	 */
	// reset số lượng sản phẩm trong giỏ hàng
	await localStorage.setItem("cart", JSON.stringify([]));
	await countItems();

	// nếu có response trả về (dữ liệu được gửi đi thành công)
	if (response != "") {
		await swal({
			title: "Đặt hàng thành công!",
			text: "Check email để nhận mã đơn hàng!",
			icon: "success",
			button: "Ok!",
		}).then(() => {
			window.location = "?page=product";
		});
	}
};

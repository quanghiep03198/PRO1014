// render comment

const renderComment = (responseData) => {
	const commentBox = $("#comment-box");
	if (commentBox) {
		commentBox.innerHTML += /*html */ `
                <div class="w-full mx-auto flex justify-start items-start gap-3">
                    <picture>
                    <img src="/img/avatars/${responseData.avatar}" class="w-[3rem] h-[3rem] rounded-full object-contain center" />
                    </picture>
                    <div>
                        <div class="alert flex-col justify-between py-2 items-start w-full">
                            <div class="flex justify-start items-center gap-2">
                                <span class="text-base font-medium">${responseData.username}</span>
                                <span class="text-sm">${responseData.create_date}</span>
                            </div>
                            <p class="break-words truncate">${responseData.content}</p>
                        </div>
                        <a href="?page=prod_overview&id=${responseData.product_id}&comment_id=${responseData.comment_id}" class="text-primary">Phản hồi</a>
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

// post comment
const postCommentOnProduct = async (form, event) => {
	event.preventDefault();
	// lấy các trường dữ liệu muốn gửi đi
	const userid = form["user"].value;
	const username = form["username"].value;
	const productId = form["product_id"].value;
	const content = form["content"];
	const avatar = form["avatar"].value;
	let today = new Date();
	const posted_time = `${today.getFullYear()}-${today.getMonth() + 1}-${today.getDay()}`;
	// kiểm tra xem có cookie của người dùng đã đăng nhập ko ?
	const authCookie = getAllCookieObjs().find((obj) => obj.key == "auth");
	if (!authCookie) showMessage(alert.error.style, alert.error.icon, "Bạn chưa đăng nhập để bình luận!");
	if (content.value != "" && authCookie) {
		const response = await (
			await fetch("/site/controllers/handle_comment.php", {
				method: "POST",
				mode: "cors",
				headers: {
					"Content-Type": "application/json",
				},
				body: JSON.stringify({
					user: userid,
					username: username,
					product: productId,
					content: content.value,
					avatar: avatar,
					create_date: posted_time,
				}),
			})
		).text();
		await renderComment(JSON.parse(response));
		content.value = "";
	}
};

const addWishlist = async (button, event) => {
	event.preventDefault();
	const form = button.parentElement.parentElement;
	// lấy các trường dữ liệu sản phẩm
	const product_id = form["product_id"].value;
	const request = form["REQUEST"].value;

	const authCookie = getAllCookieObjs().find((obj) => obj.key == "auth");
	// validate dữ liệu trước khi post request
	if (!authCookie) showMessage(alert.error.style, alert.error.icon, "Bạn chưa đăng nhập để sử dụng chức năng này");
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
	await showMessage(alert.success.style, alert.success.icon, "1 sản phẩm được thêm vào danh sách!");
	console.log(response);
};

const delWishlistItem = async (form, event) => {
	// event.preventDefault();
	const product_id = form["product_id"].value;
	const request = form["REQUEST"].value;
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
	await showMessage(alert.success.style, alert.success.icon, "Đã xóa 1 sản phẩm khỏi danh sách!");
	console.log(response);
};

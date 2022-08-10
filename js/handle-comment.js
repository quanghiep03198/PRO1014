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

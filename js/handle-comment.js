// render comment
const renderComment = (res) => {
	const commentBox = $("#comment-box");
	commentBox.innerHTML += /*html */ `
	<div id="${res.commentId}">
		<div class="card card-side bg-zinc-300 items-start mb-3">
		<figure class="p-2">
		<img src="${res.avatar}" class="w-[3rem] h-[3rem] rounded-full object-cover center" />
		</figure>
		<div class="card-body justify-start py-2">
				<h2 class="card-title text-lg">${res.username} </h2>
				<small>${res.posted_date}</small>
				<p>${res.content}</p>
				<div class="card-actions justify-end">
				<label class="swap">
						<input type="checkbox" />
							<div class="swap-on btn btn-sm btn-ghost normal-case" onclick="showReps(document.getElementById('${res.commentId}'))">Ẩn</div>
							<div class="swap-off btn btn-sm btn-ghost normal-case" onclick="hiddenReps(document.getElementById('${res.commentId}'))">${res.rep_counter} phản hồi</i></div>
						</label>
						<input type="hidden" value=${res.commentId}>
					<button onclick="reply('${res.username}','${res.commentId}')" class="btn btn-sm btn-ghost normal-case"> Phản hồi <i class="bi bi-reply px-1"></i></button>
				</div>
			</div>
		</div>
	</div>`;
};

// render reply
const renderReply = (res, element) => {
	element.innerHTML += /*html */ `<div class="reply card card-side items-start ml-10 mb-2 bg-gray-200">
											<figure class="p-2">
                                               <img src="${res.avatar}" class="w-[3rem] h-[3rem] rounded-full object-cover center" />
											   </figure>
                                            <div class="card-body justify-start py-2">
											<h2 class="card-title text-lg">${res.username} </h2>
												<small>${res.posted_date}</small>
												<p>${res.content}</p>
                                                <div class="card-actions justify-end">
                                                    <input type="hidden" value="${res.commentId}">
                                                    <button onclick='reply("${res.username}","${res.commentId}")' class="btn btn-sm btn-ghost normal-case">
                                                        Phản hồi <i class="bi bi-reply px-1"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>`;
};

// toggle replies
function showReps(cmt) {
	const replies = cmt.querySelectorAll(".reply");
	replies.forEach((rep) => {
		rep.classList.remove("hidden");
	});
}

function hiddenReps(cmt) {
	const replies = cmt.querySelectorAll(".reply");
	replies.forEach((rep) => {
		rep.classList.add("hidden");
	});
}
// xử lý post comment
const handlePostComment = async (data) => {
	// kiểm tra xem có cookie của người dùng đã đăng nhập ko ?
	const authCookie = getAllCookieObjs().find((obj) => obj.key == "auth");
	if (!authCookie) {
		swal({
			title: "Đăng nhập để sử dụng tính năng này!",
			icon: "error",
			timer: 2000,
			button: false,
		});
		return;
	}
	if (data.content != "" && authCookie) {
		const response = await sendRequest("/site/controllers/handle_comment.php", data);
		try {
			if (!data.hasOwnProperty("req")) {
				await renderComment(JSON.parse(response));
			} else {
				const commentContainer = document.getElementById(data.commentId);
				await renderReply(JSON.parse(response), commentContainer);
				const showReplyBtn = commentContainer.querySelector(".swap-off");
				showReplyBtn.innerText = JSON.parse(response).rep_counter + " phản hồi";
				showReps(commentContainer);
			}
		} catch (error) {
			console.log(error);
		}
		console.log(response);
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
	const commentId = form["comment_id"];
	const req = form["REQUEST"];
	const data = {
		user: userid,
		username: username,
		postId: postId,
		content: content.value,
		avatar: avatar,
	};
	if (commentId.value != "" && req.value != "") {
		data.commentId = commentId.value;
		data.req = req.value;
	}
	console.log(data);
	await handlePostComment(data);
	content.value = "";
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
	// kiểm tra xem người dùng có đang phản hồi 1 bình luận nào đó không?
	if (commentId.value != "" && req.value != "") {
		data.commentId = commentId.value;
		data.req = req.value;
	}
	console.log(data);
	await handlePostComment(data);
	content.value = "";
};

// phản hồi bình luận sản phẩm
const reply = (username, commentId) => {
	const commentInput = $("#comment-input");
	commentInput.placeholder = `Bạn đang trả lời ${username}`;
	const _commentId = $("#comment-id");
	const req = $("#req");
	req.value = commentId;
	console.log(req);
	_commentId.value = commentId;
	$("#cancel-rep__btn").classList.remove("hidden");
};
const cancelReply = (button) => {
	const commentInput = $("#comment-input");
	commentInput.placeholder = "Nhập bình luận ...";
	const _commentId = $("#comment-id");
	const req = $("#req");
	req.value = "";
	_commentId.value = "";
	button.classList.add("hidden");
};

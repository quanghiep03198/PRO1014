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
const postCommentOnProduct = (form, event) => {
	event.preventDefault();
	// lấy các trường dữ liệu muốn gửi đi
	const user = form["user"].value;
	const username = form["username"].value;
	const productId = form["product_id"].value;
	const content = form["content"];
	const avatar = form["avatar"].value;
	// khởi tạo request
	const xhr = new XMLHttpRequest();
	xhr.open("POST", "/site/controllers/save_comment.php", true); // mở 1 kết nối đến comment controller
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // kiểu dữ liệu gửi đi/nhận về
	const params = "user=" + user + "&username=" + username + "&product_id=" + productId + "&content=" + content.value + "&avatar=" + avatar;
	const authCookie = getAllCookieObjs().find((obj) => obj.key == "auth");
	if (content.value != "" && authCookie) {
		// nếu có cookie của ng dùng đã đăng nhập -> push vào database và send response về
		xhr.send(params); // gửi dữ liệu đi
		showMessage(alert.success.style, alert.success.icon, "1 bình luận được thêm mới!");
	}
	if (!authCookie) showMessage(alert.error.style, alert.error.icon, "Bạn chưa đăng nhập để bình luận!");
	xhr.onload = function () {
		console.log(this.responseText);
		// render comment
		renderComment(JSON.parse(this.responseText));
	};
	content.value = "";
};

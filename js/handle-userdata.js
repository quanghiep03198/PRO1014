// validate form đổi mật khẩu
const handleErrorChangePassword = (form, event) => {
	const curPassword = form["current_password"];
	const newPassword = form["new_password"];
	const cfmPassword = form["cfm_new_password"];
	if (!areRequired(curPassword, newPassword, cfmPassword)) event.preventDefault();
	if (isMatchingValue(newPassword, cfmPassword) == false) event.preventDefault();
	if (checkLength(newPassword, 8) == false) event.preventDefault();
	return true;
};

// validate form update thông tin người dùng
const handleErrorUpdateProfile = (form, event) => {
	const userName = form["username"];
	const email = form["email"];
	const phone = form["phone"];
	console.log(email);
	const address = form["address"];
	if (areRequired(userName, email, phone, address) === false) event.preventDefault();
	if (isEmail(email) === false) event.preventDefault();
	if (isPhoneNumber(phone) === false) event.preventDefault();
};

// validate form tra cứu đơn hàng
const handleSearchWarranty = async (button) => {
	const form = button.parentElement;
	const email = form["email"];
	const order_key_id = form["order_key_id"];

	// nếu validate thông tin ng dùng nhập hợp lệ -> check xem thông tin đơn hàng ng dùng nhập có tồn tại
	if (areRequired(email, order_key_id) == false) return;
	if (isEmail(email) == false) return;

	// nếu pass qua validate form -> send request
	const response = await sendRequest("/site/controllers/handle_warranty.php", {
		email: email.value,
		order_key_id: order_key_id.value,
	});
	const warrantyInfo = await JSON.parse(response);

	// kiểm tra response gửi về có hợp lệ
	let isValidInfo = true;
	if (warrantyInfo.hasOwnProperty("invalid_email")) {
		showError(email, warrantyInfo.invalid_email);
		isValidInfo = false;
	}

	if (warrantyInfo.hasOwnProperty("invalid_order_key")) {
		showError(order_key_id, warrantyInfo.invalid_order_key);
		isValidInfo = false;
	}
	if (isValidInfo == false) return;
	// show modal & render dữ liệu trả về nếu pass qua các điều kiện
	button.setAttribute("for", "warranty-info");
	const orderItemsList = $("#order-items-list");
	orderItemsList.innerHTML = warrantyInfo
		.map(
			(item) => /*html */ `
				<div class="flex items-center gap-3">
					<img src="/img/products/${item.image}" alt="" class="w-24 h-24 object-cover">
					<div class="flex flex-col justify-center gap-2">
						<span class="font-semibold">${item.prod_name}</span>
						<span class="font-semibold">${item.unit_price}₫</span>
						<span><span class="font-semibold">Ngày tạo đơn: </span>${item.create_date}</span>
						<span><span class="font-semibold">Bảo hành đến: </span>${item.warranty_expire_date}</span>
						</div>
				</div>`,
		)
		.join("");
	$("#close-modal__btn").onclick = () => {
		button.removeAttribute("for");
	};
};

// show image while uploading file
const loadFile = (event) => {
	const photo = $("#user-image");
	photo.style.display = "block";
	photo.src = URL.createObjectURL(event.target.files[0]);
};

// login
const handleLoginError = async (form, event) => {
	event.preventDefault();
	const account = form["account"];
	const password = form["password"];
	const saveAccountCheckbox = form["save-account__checkbox"];
	areRequired(account, password);
	const response = await sendRequest("/site/controllers/handle_login.php", {
		account: account.value,
		password: password.value,
	});
	console.log(JSON.parse(response));
	const resUserData = JSON.parse(response);
	if (resUserData.hasOwnProperty("err_account")) await showError(account, resUserData.err_account);
	if (resUserData.hasOwnProperty("err_password")) await showError(password, resUserData.err_password);
	if (resUserData.hasOwnProperty("account"))
		Swal.fire({
			title: "Đăng nhập thành công!",
			icon: "success",
			button: false,
			timer: 1500,
		})
			.then(() => {
				document.cookie = `auth=${resUserData.id}`;
				if (saveAccountCheckbox.checked == true) localStorage.setItem("account", resUserData.id.toString());
			})
			.then(() => {
				if (resUserData.role_id == 3) window.location = window.location.href;
				else window.location = "admin.php";
			});
};

//  đăng xuất
const logout = () => {
	document.cookie = "auth=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
	localStorage.clear();
	location.reload();
};

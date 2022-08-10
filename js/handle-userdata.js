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

// validate chức năng đăng ký
const handleRegisterError = (form, event) => {
	const account = form["account"];
	const password = form["password"];
	const confirmPassword = form["confirm_password"];
	const username = form["username"];
	const email = form["email"];
	const address = form["address"];
	const phone = form["phone"];
	let isSuccess = true;
	if (areRequired(account, password, confirmPassword, username, email, address, phone) == false) {
		event.preventDefault();
		isSuccess = false;
	}
	if (checkLength(password, 8) == false) {
		event.preventDefault();
		isSuccess = false;
	}
	if (ckMatchingValue(confirmPassword, password) == false) {
		event.preventDefault();
		isSuccess = false;
	}
	if (isEmail(email) == false) {
		event.preventDefault();
		isSuccess = false;
	}
	if (isPhoneNumber(phone) == false) {
		event.preventDefault();
		isSuccess = false;
	}
	if (isSuccess)
		swal({
			title: "Check email để nhận mã xác thực!",
			icon: "info",
			button: true,
		});
};
// validate form tra cứu đơn hàng

const handleErrorWarrantySearch = async (button) => {
	const form = button.parentElement;
	const customer_infor = form["customer_infor"];
	const order_key_id = form["order_key_id"];
	let isSuccess = true;
	if (areRequired(customer_infor, order_key_id) == false) isSuccess = false;
	if (isEmail(customer_infor) == false) isSuccess = false;
	// nếu validate thông tin ng dùng nhập hợp lệ -> check xem thông tin đơn hàng ng dùng nhập có tồn tại
	if (isSuccess) {
		button.setAttribute("for", "warranty-info");
		const response = await sendRequest("/site/controllers/handle_warranty.php", {
			customer_infor: customer_infor.value,
			order_key_id: order_key_id.value,
		});
		const result = JSON.parse(response);
		const orderItemsList = $("#order-items-list");
		orderItemsList.innerHTML = result
			.map(
				(item) => /*html */ `
				<div class="flex items-center gap-3">
					<img src="/img/products/${item.image}" alt="" class="w-24 h-24 object-cover">
					<div class="flex flex-col justify-center gap-2">
						<span class="font-semibold">${item.product_name}</span>
						<span class="font-semibold">${item.unit_price}</span>
						<span class="font-normal">Ngày tạo đơn: ${item.create_date}</span>
						<span class="font-normal">Bảo hành đến: ${item.warranty_expire_date}</span>
						</div>
				</div>`,
			)
			.join("");
		console.log(result);
	}
};
// nguyenngochoang2121998@gmail.com
// f5f96025
const loadFile = (event) => {
	const photo = $("#user-image");
	photo.style.display = "block";
	photo.src = URL.createObjectURL(event.target.files[0]);
};
// validate form gửi mã xác thực lấy lại mật khẩu
const handleGetVerifyCode = (form, event) => {
	const account = form["account"];
	const email = form["email"];
	console.log(email);
	if (areRequired(account, email) == false) event.preventDefault();
	if (isEmail(email) == false) event.preventDefault();
};
const handleResetPassword = (form) => {};

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
		swal({
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
const logout = () => {
	document.cookie = "auth=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
	localStorage.clear();
	sessionStorage.clear();
};

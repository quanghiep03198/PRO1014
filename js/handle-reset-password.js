// validate form gửi mã xác thực lấy lại mật khẩu
const handleGetVerifyCode = async (form, event) => {
	event.preventDefault();
	const account = form["account"];
	const email = form["email"];
	const request = form["get_verify_code"];

	if (areRequired(account, email) == false) return;
	if (isEmail(email) == false) return;
	// loading

	Swal.fire({
		title: "Đang kiểm tra thông tin!",
		html: "Vui lòng chờ trong giây lát ...",
		allowEscapeKey: false,
		showConfirmButton: false,
		showLoaderOnConfirm: true,
		willOpen: () => {
			Swal.showLoading();
		},
	});
	const response = await sendRequest("/site/controllers/handle_reset_password.php", {
		account: account.value,
		email: email.value,
		request: request.dataset.name,
	});
	console.log(response);
	try {
		const result = JSON.parse(response);
		console.log("Thông tin gửi đi: ", result);
		if (result.hasOwnProperty("invalid_account")) {
			await showError(account, result.invalid_account);
			Swal.fire({
				title: "Opps",
				text: "Lấy mã xác thực thất bại!",
				icon: "error",
				button: true,
			});
		} else if (result.hasOwnProperty("invalid_email")) {
			await showError(email, result.invalid_email);
			Swal.fire({
				title: "Opps",
				text: "Lấy mã xác thực thất bại!",
				icon: "error",
				button: true,
			});
		} else {
			Swal.fire({
				title: "Lấy mã xác thực thành công",
				text: "Kiểm tra email để lấy mã xác thực!",
				icon: "success",
				button: true,
			}).then(() => {
				let now = new Date();
				let expires = now.getTime() + 30000;
				now.setTime(expires);

				document.cookie = `account=${account.value};expires=${now.toUTCString()};path=/`;
				window.location = "reset_password.php";
			});
		}
	} catch (error) {
		console.log(error);
	}
};

const handleResetPassword = async (form, event) => {
	event.preventDefault();
	const verifyCode = form["verify_code"];
	const newPassword = form["new_password"];
	const confirmPassword = form["confirm_new_password"];
	const request = form["reset_password"];
	if (areRequired(verifyCode, newPassword, confirmPassword) == false) return;
	if (ckMatchingValue(newPassword, confirmPassword) == false) return;
	if (checkLength(newPassword, 8) == false) return;
	// show loading screen while fetching data
	Swal.fire({
		title: "Đang xử kiểm tra mã xác thực!",
		html: "Vui lòng chờ trong giây lát ...",
		allowEscapeKey: false,
		showConfirmButton: false,
		showLoaderOnConfirm: true,
		willOpen: () => {
			Swal.showLoading();
		},
	});
	const response = await sendRequest("/site/controllers/handle_reset_password.php", {
		verify_code: verifyCode.value,
		new_password: newPassword.value,
		request: request.dataset.name,
	});
	try {
		const result = await JSON.parse(response);
		console.log(result);
		if (result.hasOwnProperty("wrong_verify_code")) {
			await showError(verifyCode, result.wrong_verify_code);
			Swal.fire({
				title: "Oops!",
				text: "Đổi mật khẩu không thành công!",
				icon: "error",
			});
		} else {
			Swal.fire({
				title: "Yepppp!",
				text: "Đổi mật khẩu thành công!",
				icon: "success",
				button: true,
			}).then(() => {
				let now = new Date();
				let expires = now.getTime() - 30000;
				now.setTime(expires);
				document.cookie = `account=account;expires=${now.toUTCString()};path=/`;

				window.location = "index.php";
			});
		}
	} catch (error) {
		console.log(error);
	}
};

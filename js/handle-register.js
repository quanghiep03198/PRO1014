//  đăng ký tài khoản
const handleRegister = async (form, event) => {
	event.preventDefault();
	const account = form["account"];
	const password = form["password"];
	const confirmPassword = form["confirm_password"];
	const username = form["username"];
	const email = form["email"];
	const address = form["address"];
	const phone = form["phone"];
	const request = form["register_submit"];

	if (areRequired(account, password, confirmPassword, username, email, address, phone) == false) return;
	if (checkLength(password, 8) == false) return;
	if (ckMatchingValue(confirmPassword, password) == false) return;
	if (isEmail(email) == false) return;
	if (isPhoneNumber(phone) == false) return;

	Swal.fire({
		title: "Đang xử lý yêu cầu!",
		html: "Vui lòng chờ trong giây lát ...",
		allowEscapeKey: false,
		showConfirmButton: false,
		showLoaderOnConfirm: true,
		willOpen: () => {
			Swal.showLoading();
		},
	});
	const data = {
		account: account.value,
		password: password.value,
		username: username.value,
		email: email.value,
		address: address.value,
		phone: phone.value,
		request: request.dataset.name,
	};
	const response = await sendRequest("/site/controllers/handle_register.php", data);
	try {
		const result = await JSON.parse(response);
		console.log("thông tin tài khoản đăng ký: ", result);
		if (result.hasOwnProperty("existing_account")) {
			await showError(account, result.existing_account);
			Swal.fire({
				title: "Opps",
				text: "Đăng ký không thành công!",
				icon: "error",
				button: true,
			});
		} else {
			Swal.fire({
				title: "Check email để nhận mã xác thực!",
				icon: "info",
				button: true,
			}).then(() => {
				let now = new Date();
				let expires = now.getTime() + 3000;
				now.setTime(expires);
				console.log(now.toUTCString());
				document.cookie = `active_time=300;expires=${now.toUTCString()};path=/`;
				window.location = "verify_account.php";
			});
		}
	} catch (error) {
		console.log(error);
	}
};

// verify account
const handleVerifyAccount = async (form, event) => {
	event.preventDefault();
	const request = form["verify_account"];
	const verifyCode = form["verify_code"];
	if (areRequired(verifyCode) == false) return;
	Swal.fire({
		title: "Đang xử xác thực thông tin!",
		html: "Vui lòng chờ trong giây lát ...",
		allowEscapeKey: false,
		showConfirmButton: false,
		showLoaderOnConfirm: true,
		willOpen: () => {
			Swal.showLoading();
		},
	});
	const response = await (await fetch("/site/controllers/handle_register.php?getcode=")).text();
	try {
		const result = JSON.parse(response);
		console.log("thông tin tài khoản lưu trong session: ", result);
		// thay đổi request
		if (result.hasOwnProperty("request")) {
			result.request = request.dataset.name;
			result.verify_code = verifyCode.value;
		}
		console.log("thông tin tài khoản được save trong db: ", result);

		const reqResult = await sendRequest("/site/controllers/handle_register.php", result);
		const resultMessage = await JSON.parse(reqResult);
		if (resultMessage.hasOwnProperty("verify_code_err")) {
			await showError(verifyCode, resultMessage.verify_code_err);
			Swal.fire({
				title: "Opps",
				text: "Xác thực tài khoản không thành công!",
				icon: "error",
				button: true,
			});
		} else {
			Swal.fire({
				title: "Đăng ký thành công!",
				icon: "success",
				button: true,
			}).then(() => {
				window.location = "index.php";
			});
		}
	} catch (error) {
		console.log(error);
	}
};

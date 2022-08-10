// validate form đổi mật khẩu
const handleErrorChangePassword = (form, event) => {
	const curPassword = form["current_password"];
	const newPassword = form["new_password"];
	const cfmPassword = form["cfm_new_password"];
	if (!isRequired(curPassword, newPassword, cfmPassword)) event.preventDefault();
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
	if (isRequired(userName, email, phone, address) === false) event.preventDefault();
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
	if (!isRequired(account, password, confirmPassword, username, email, address, phone)) event.preventDefault();
	if (checkLength(password, 8) == false) event.preventDefault();
	if (ckMatchingValue(confirmPassword, password) == false) event.preventDefault();
	if (isEmail(email) == false) event.preventDefault();
	if (isPhoneNumber(phone) == false) event.preventDefault();
};
// validate form tra cứu đơn hàng
const handleErrorWarrantySearch = (form, event) => {
	const customer_infor = form["customer_infor"];
	const order_key_id = form["order_key_id"];
	if (!isRequired(customer_infor, order_key_id)) event.preventDefault();
	if (!isEmail(customer_infor)) event.preventDefault();
};

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
	if (!isRequired(account, email)) event.preventDefault();
	if (!isEmail(email)) event.preventDefault();
};
const handleResetPassword = (form) => {};

const handleLoginError = (form, event) => {
	event.preventDefault()
	const account = form['account'];
	const password = form['password']
	sendRequest("")
};
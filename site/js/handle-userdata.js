// validate form đổi mật khẩu
const handleErrorChangePassword = (form) => {
	const curPassword = form["current_password"];
	const newPassword = form["new_password"];
	const cfmPassword = form["cfm_new_password"];
	if (!isRequired(curPassword, newPassword, cfmPassword)) return false;
	if (!isMatchingValue(newPassword, cfmPassword)) return false;
	if (!checkLength(newPassword, 8)) return false;
	return true;
};
// validate form update thông tin người dùng
const handleErrorUpdateProfile = (form) => {
	const userName = form["username"];
	const email = form["email"];
	const phone = form["phone"];
	const address = form["address"];
	if (!isRequired(userName, email, phone, address)) return false;
	if (!isEmail(email)) return false;
	if (!isPhoneNumber(phone)) return false;
};
// validate thông tin đặt hàng
const handleCheckoutError = (form) => {
	const customerName = form["customer_name"];
	const phone = form["phone"];
	const email = form["email"];
	const address = form["address"];
	const shipping = form["shipping_method"];
	if (!isRequired(customerName, phone, email, address, shipping)) return false;
	if (!isEmail(email)) return false;
	if (!isPhoneNumber(phone)) return false;
	// validata -> ok
	localStorage.setItem("cart", JSON.stringify([]));
	countItems();
};
// validate chức năng đăng ký
const handleRegisterError = (form) => {
	const account = form["account"];
	const password = form["password"];
	const confirmPassword = form["confirm_password"];
	const username = form["username"];
	const email = form["email"];
	const address = form["address"];
	const phone = form["phone"];
	if (!isRequired(account, password, confirmPassword, username, email, address, phone)) return false;
	if (!checkLength(password, 8)) return false;
	if (!ckMatchingValue(confirmPassword, password)) return false;
	if (!isEmail(email)) return false;
	if (!isPhoneNumber(phone)) return false;
};
const loadFile = (event) => {
	const photo = $("#user-image");
	photo.style.display = "block";
	photo.src = URL.createObjectURL(event.target.files[0]);
	console.log(photo.src);
};

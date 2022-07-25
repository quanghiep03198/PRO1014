// get name of each field
const getFieldName = (input) => {
	return input.name.charAt(0).toUpperCase() + input.name.slice(1).toLowerCase();
};
// get input element

// show error message
const showError = (input, message) => {
	const errorIcon = /*html */ `<i class="bi bi-x align-center"></i>`;
	const errorMessage = input.parentElement.querySelector(".error-message");
	errorMessage.innerHTML = errorIcon + message;
	errorMessage.style.color = "var(--error)";
	input.classList.add("input-error");
	input.classList.toggle("input-success");
};
// show success if value of the field is valid
const showSuccess = (input, message) => {
	const successMessage = input.parentElement.querySelector(".error-message");
	successMessage.innerHTML = message;
	input.classList.add("input-success");
	input.classList.toggle("input-error");
};

/**
 * các rule thực hiện check các trường input
 */
const isRequired = (...inputs) => {
	let countNullElems = 0;
	inputs.forEach((input) => {
		if (input.value.trim() != "") showSuccess(input, null);
		else {
			countNullElems++;
			showError(input, `Bạn chưa nhập ${getFieldName(input)}`);
		}
		input.oninput = () => {
			if (input.value.trim() != "") showSuccess(input, null);
			else {
				countNullElems++;
				showError(input, `Bạn chưa nhập ${getFieldName(input)}`);
			}
		};
		console.log(countNullElems);
	});
	return countNullElems == 0 ? true : false;
};

const isEmail = (emailInput) => {
	let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	emailInput.oninput = () => {
		regexEmail.test(emailInput.value) ? showSuccess(emailInput, null) : showError(emailInput, "Email không hợp lệ");
	};
	return regexEmail.test(emailInput.value) ? true : false;
};

const ckMatchingValue = (input1, input2) => {
	input1.oninput = () => {
		input1.value == input2.value ? showSuccess(input1, null) : showError(input1, `${getFieldName(input1)} doesn't match !`);
	};
	return input1.value == input2.value ? true : false;
};

const checkLength = (input, minLength) => {
	input.oninput = () => {
		input.value.length >= minLength ? showSuccess(input, null) : showError(input, `${getFieldName(input)} phải có tối thiểu ${minLength} ký tự`);
	};
	return input.value.length >= minLength ? true : false;
};

const isPhoneNumber = (input) => {
	input.oninput = () => {
		input.value == +input.value && input.value.length == 10 ? showSuccess(input, null) : showError(input, `${getFieldName(input)} không hợp lệ`);
	};
	return input.value == +input.value && input.value.length == 10 ? true : false;
};

// get name of each field
const getFieldName = (formControl) => {
	return formControl.getAttribute("data-name");
};
// get input element

// show error message
const showError = (formControl, message) => {
	const errorIcon = /*html */ `<i class="bi bi-x align-center"></i>`;
	const errorMessage = formControl.parentElement.querySelector(".error-message");
	errorMessage.innerHTML = errorIcon + message;
	formControl.classList.add("input-error");
	formControl.classList.toggle("input-success");
};
// show success if value of the field is valid
const showSuccess = (formControl, message) => {
	const successMessage = formControl.parentElement.querySelector(".error-message");
	successMessage.innerHTML = message;
	formControl.classList.add("input-success");
	formControl.classList.remove("input-error");
};

/**
 * các rule thực hiện check các trường input
 */
const isRequired = (...formControls) => {
	let errorCount = 0;
	formControls.forEach((formControl) => {
		if (formControl.value.trim() != "") showSuccess(formControl, null);
		else {
			errorCount++;
			showError(formControl, `Bạn chưa nhập ${getFieldName(formControl)}`);
		}
		formControl.oninput = () => {
			if (formControl.value.trim() != "") showSuccess(formControl, null);
			else {
				errorCount++;
				showError(formControl, `Bạn chưa nhập ${getFieldName(formControl)}`);
			}
		};
		formControl.onchange = () => {
			if (formControl.value.trim() != "") showSuccess(formControl, null);
			else {
				errorCount++;
				showError(formControl, `Bạn chưa nhập ${getFieldName(formControl)}`);
			}
		};
	});
	return errorCount == 0 ? true : false;
};

const isEmail = (formControl) => {
	let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	formControl.oninput = () => {
		regexEmail.test(formControl.value) ? showSuccess(formControl, null) : showError(formControl, "Email không hợp lệ");
	};
	return regexEmail.test(formControl.value) ? true : false;
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

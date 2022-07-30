const products = $(".card");
const pagination = $(".pagination");
const pageSelection = $("#page-selection");
let perPage = pageSelection.value;
const dividePage = (perPage) => {
	const lastIndex = Math.ceil(products.length / perPage); // lastIndex <=> tổng số trang
	for (let i = 1; i <= lastIndex; i++) {
		// nếu số lượng sản phẩm lớn hơn số lượng sản phẩm mỗi trang mới hiển thị pagination
		pagination.innerHTML += /* html */ `<a href="#title" role="button" type="button"onclick="changePage(${i})" class="btn btn-square page-btn">${i}</a>`;
	}
};
pageSelection.onchange = () => {
	pagination.innerHTML = "";
	perPage = pageSelection.value;
	dividePage(perPage);
	changePage(1);
};
dividePage(perPage);
const changePage = (tabindex) => {
	console.log("số sản phẩm mỗi trang hiện tại: ", perPage);
	const btns = $(".page-btn");
	if (products && products.length > 0 && btns.length > 0) {
		// click vào pagination button -> thêm background
		btns.forEach((btn) => {
			btn.classList.remove("btn-active");
		});
		btns[tabindex - 1].classList.add("btn-active");
		// mặc định tất cả item đều ẩn đi
		products.forEach((item) => item.classList.add("!hidden"));
		// show các item trang hiện tại
		const startIndex = (tabindex - 1) * perPage;
		for (let i = startIndex; i < perPage * tabindex; i++) {
			console.log(i);
			products[i].classList.remove("!hidden");
			products[i].classList.add("!block");
			if (i >= products.length) break;
		}
	}
};
changePage(1);

const products = $(".card");
const pagination = $(".pagination");

const perPage = 6;
const lastIndex = Math.ceil(products.length / perPage); // lastIndex <=> tổng số trang
for (let i = 1; i <= lastIndex; i++) {
	// nếu số lượng sản phẩm lớn hơn số lượng sản phẩm mỗi trang mới hiển thị pagination
	if (products.length > perPage) pagination.innerHTML += /* html */ `<a href="#title" role="button" type="button"onclick="showPage(${i})" class="btn btn-square page-btn">${i}</a>`;
}

const showPage = (tabindex) => {
	const btns = $(".page-btn");
	// mặc định tất cả item đều ẩn đi
	if (products.length > 0 && btns.length > 0) {
		// click vào pagination button -> thêm background
		btns.forEach((btn) => {
			btn.classList.remove("btn-active");
		});
		btns[tabindex - 1].classList.add("btn-active");
		products.forEach((item) => (item.style.display = "none"));
		// show các item trang hiện tại
		const startIndex = (tabindex - 1) * perPage;
		for (let i = startIndex; i < perPage * tabindex; i++) {
			products[i].style.display = "flex";
			if (i >= products.length) break;
		}
	}
};
showPage(1);

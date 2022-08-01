function Pagination(selector, perPage) {
	this.elems = $(selector);
	this.pagination = $("#pagination");
	this.perPage = perPage;
	this.totalPage = Math.ceil(this.elems.length / this.perPage);
	// phân trang
	if (this.elems.length > this.perPage)
		// tổng số phần tử > số phần từ mỗi trang mới thực hiện phân trang
		for (let i = 1; i <= this.totalPage; i++) {
			this.pagination.innerHTML += /* html */ `<a href="#" onclick ="showPage(${i})"  type="button" class="btn btn-square pagination-btn">${i}</a>`;
		}

	// show page
	this.showPage = (tabindex) => {
		const btns = $(".pagination-btn");
		if (this.elems && this.elems.length > 0 && btns.length > 0) {
			// click vào pagination button -> thêm background
			btns.forEach((btn) => {
				btn.classList.remove("btn-active");
			});
			btns[tabindex - 1].classList.add("btn-active");
			// mặc định tất cả item đều ẩn đi
			this.elems.forEach((item) => {
				item.classList.remove("!flex", "!block", "flex", "grid");
				item.classList.add("hidden");
			});
			// show các item trang hiện tại
			const startIndex = (tabindex - 1) * this.perPage;
			for (let i = startIndex; i < this.perPage * tabindex; i++) {
				if (i == this.elems.length) break;
				console.log("các sản phẩm hiện tại: ", i);
				this.elems[i].classList.remove("hidden");
				this.elems[i].classList.add("!table");
			}
		}
	};
}

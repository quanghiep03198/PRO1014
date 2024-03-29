class Pagination {
	constructor({ selector, perPage, displayType }) {
		const elems = $(selector);
		const pagination = $("#pagination");
		const totalPage = Math.ceil(elems.length / perPage);

		// tổng số phần tử > số phần từ mỗi trang mới thực hiện phân trang
		if (elems.length > perPage)
			for (let i = 1; i <= totalPage; i++) {
				pagination.innerHTML += /* html */ `<button  onclick ="showPage(${i})" class="btn btn-square pagination-btn">${i}</button>`;
			}

		// show page
		this.showPage = (tabindex) => {
			const btns = $(".pagination-btn");
			if (elems && btns && elems.length > 0 && btns.length > 0) {
				// click vào pagination button -> thêm background
				btns.forEach((btn) => {
					btn.classList.remove("btn-active");
				});
				btns[tabindex - 1].classList.add("btn-active");
				// mặc định tất cả item đều ẩn đi
				elems.forEach((item) => {
					const presentingStyles = ["flex", "block", "table", "inline", "grid", "inline-block", "inline-grid", "flow-root"];
					presentingStyles.forEach((style) => {
						if (item.classList.contains(style)) item.classList.remove(style);
					});
					item.classList.add("hidden");
				});
				// show các item trang hiện tại
				const startIndex = (tabindex - 1) * perPage;
				elems[startIndex].id = "#";
				for (let i = startIndex; i < perPage * tabindex; i++) {
					if (i == elems.length) break;
					elems[i].classList.remove("hidden");
					elems[i].classList.add(displayType);
				}
			}
		};
	}
}

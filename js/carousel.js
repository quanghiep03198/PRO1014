const productSlider = new Swiper(".product-slider", {
	slidesPerView: 1,
	spaceBetween: 10,
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},
	breakpoints: {
		375: {
			slidesPerView: 1,
			spaceBetween: 20,
		},
		768: {
			slidesPerView: 2,
			spaceBetween: 40,
		},
		1366: {
			slidesPerView: 4,
			spaceBetween: 50,
		},
	},
});
const relatedProductSlider = new Swiper(".related-product-slider", {
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},
	breakpoints: {
		375: {
			slidesPerView: 1,
			spaceBetween: 20,
		},
		768: {
			slidesPerView: 2,
			spaceBetween: 40,
		},
		1366: {
			slidesPerView: 3,
			spaceBetween: 50,
		},
	},
});
const postSlider = new Swiper(".post-slider", {
	rewind: true,
	pagination: {
		el: ".swiper-pagination",
		clickable: true,
	},
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},
});
// const productVariantSlider = new Swiper(".product_image", {
// 	spaceBetween: 10,
// 	slidesPerView: 4,
// 	freeMode: true,
// 	watchSlidesProgress: true,
// });
// const gallery = new Swiper(".gallery", {
// 	spaceBetween: 10,
// 	navigation: {
// 		nextEl: ".swiper-button-next",
// 		prevEl: ".swiper-button-prev",
// 	},
// 	thumbs: {
// 		swiper: swiper,
// 	},
// });

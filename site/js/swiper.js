// init Swiper:
const productSlider = new Swiper(".product-slider", {
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},
	breakpoints: {
		"@0.00": {
			slidesPerView: 1,
			spaceBetween: 10,
		},
		"@0.75": {
			slidesPerView: 2,
			spaceBetween: 20,
		},
		"@1.00": {
			slidesPerView: 3,
			spaceBetween: 30,
		},
		"@1.50": {
			slidesPerView: 4,
			spaceBetween: 40,
		},
	},
});

// init Swiper:
const postSlider = new Swiper(".post-slider", {
	pagination: {
		el: ".swiper-pagination",
		clickable: true,
	},
	breakpoints: {
		"@0.00": {
			slidesPerView: 1,
			spaceBetween: 10,
		},
		"@0.75": {
			slidesPerView: 1,
			spaceBetween: 20,
		},
		"@1.00": {
			slidesPerView: 2,
			spaceBetween: 30,
		},
		"@1.50": {
			slidesPerView: 3,
			spaceBetween: 40,
		},
	},
});

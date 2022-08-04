module.exports = {
	content: ["js/**/*.{js}", "./js/common.js", "js/**/*.{js}", "site/**/*.{html,php,js}", "admin/**/*.{html,php}", "register.php", "reset_password.php", "recover_password.php", "verify_account.php"],
	mode: "jit",
	purge: ["js/**/*.{js}", "./js/common.js", "site/**/*.{html,js,php}", "admin/**/*.{html,js,php}", "register.php", "reset_password.php", "recover_password.php", "verify_account.php"],
	theme: {
		extend: {
			important: true,
			keyframes: {
				slip: {
					"0%,50%": {
						transform: "translateX(100%)",
						opacity: "0",
					},
					"50%,100%": {
						transform: "translateX(0%)",
						opacity: "1",
					},
				},
			},
			animation: {
				slip: "slip 600ms ease-in-out",
			},
		},
		screens: {
			sm: { min: "375px", max: "767px" },
			md: { min: "768px", max: "1365px" },
			lg: "1366px",
		},
	},
	plugins: [require("daisyui")],
	daisyui: {
		styled: true,
		themes: true,
		base: true,
		utils: true,
		logs: true,
		rtl: false,
		prefix: "",
	},
};

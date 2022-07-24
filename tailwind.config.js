module.exports = {
	content: ["site/**/*.{html,js,php}", "admin/**/*.{html,js,php}"],
	mode: "jit",
	purge: ["site/**/*.{html,js,php}", "admin/**/*.{html,js,php}"],
	theme: {
		extend: {},
		screens: {
			sm: "375px",
			md: "768px",
			lg: "1366px",
		},
	},
	plugins: [require("daisyui")],
};

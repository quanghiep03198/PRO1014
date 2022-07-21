module.exports = {
	content: ["site/**/*.{html,js,php}", "admin/**/*.{html,js,php}"],
	theme: {
		extend: {},
		screens: {
			sm: "375px",

			md: { min: "600px", max: "1365px" },

			lg: "1366px",
		},
	},
	plugins: [require("daisyui")],
};

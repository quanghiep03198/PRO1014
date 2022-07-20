module.exports = {
	content: ["index.html", "admin.php", "./admin/**/*.{html,js,php}", "site/**/*.{html,js,php}"],
	theme: {
		colors: {
			"primary-color": "var(--primary-color)",
			"secondary-color": "var(--secondary-color)",
		},
		extend: {},
		screens: {
			sm: "375px",

			md: { min: "600px", max: "1365px" },

			lg: "1366px",
		},
	},
	plugins: [require("daisyui")],
};

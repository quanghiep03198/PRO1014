/** @type {import('tailwindcss').Config} */
module.exports = {
	content: ["./index.html", "./index.php", "./admin.php"],
	theme: {
		extend: {},
		screens: {
			sm: "375px",

			md: { min: "600px", max: "1365px" },

			lg: "1366px",
		},
		colors: {
			blue: "#407CB4",
			orange: "#FFB526",
			green: "#64E7A0",
			"gray-dark": "#4A4A4A",
			gray: "#8492a6",
			"gray-light": "#C6C6C6",
		},
	},
	plugins: [require("daisyui")],
};
